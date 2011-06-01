<?php

/**
 * Description of Movie
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieController.php
 * @since   13.05.2011 - 23:35:14
 */
class Movie {

    // mysql table
    private $table = 'movie';
    // database object
    private $db;
    // config object
    private $config;
    // url object
    private $url;
    // file path for a cover image
    private $path = 'files/movie/';
    // size of thumbnails
    private $image_width = '230';
    private $image_height = '230';
    private $image_crop = '230';
    // size of cover image in kB
    private $image_size = '6144kB';

    // meta information for a movie
    private $genre = array();
    private $format = array();
    private $rating = array();

    /**
     * Movie Constructor, gathers from
     * the registry the url, config and the 
     * db objects for further purpose.
     */
    public function __construct() {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
        $this->url = $registry->get('url');
        
        // fetch meta data for the movies
        $this->rating = $this->fetchRating();
        $this->format = $this->fetchFormat();
        $this->genre = $this->fetchGenre();
    }

    /**
     * Updates a Movie from the 
     * Movie Database and Uploads a 
     * Picture and generates a Thumbnail for it.
     *
     * @param array $values 
     */
    public function update($values) {

        $data = array(
            'name' => $values['name'],
            'genre' => $values['genre'],
            'format' => $values['format'],
            'trailer' => $values['trailer'],
            'rating' => $values['rating'],
            'description' => $values['description']
        );

        if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {

            // prepare upload
            $upload = new Zend_File_Transfer();
            $upload->addValidator('Count', false, array('min' => 1, 'max' => 1));
            $upload->addValidator('IsImage', true);
            $upload->addValidator('Size', false, array('max' => $this->image_size));

            /* get the file mimetype for the new name */
            $info = $upload->getFileInfo();
            $point = strpos($info['cover']['name'], '.');
            $ending = substr($info['cover']['name'], $point);
            $filename = $this->path . $this->url->get('value') . $ending;
            $upload->addFilter('Rename', $filename);

            // delete exisiting file
            if (file_exists($filename)) {
                unlink($filename);
            }

            if (!$upload->isValid()) {
                throw new Exception(implode(',', $upload->getMessages()));
            }

            /* upload the file */
            try {
                $upload->receive();
            } catch (Zend_File_Transfer_Exception $zendFileTransferException) {
                die($zendFileTransferException);
            }

            // creating the thumbnail
            require_once('library/phpthumb/ThumbLib.inc.php');

            try {
                $thumb = PhpThumbFactory::create($filename);
            } catch (Exception $thumbnailException) {
                die($thumbnailException);
            }

            $thumb->adaptiveResize($this->image_width, $this->image_height)->cropFromCenter($this->image_crop)->save($filename);

            $data['image'] = $filename;
        }

        $affectedRows = $this->db->update($this->table, $data, $this->url->get('key') . '="' . $this->url->get('value') . '"');
        if ($affectedRows != 1) {
            throw new MovieException('(#1) : The dataset coud not habe been updated!');
        }
    }

    /**
     * Deletes a Movie from the
     * Database and the Pictures according
     * to the Movie from files/movie/
     * 
     * @param type $id 
     */
    public function delete($id) {

        /* deleting files according to the movie */
        $di = new DirectoryIterator($this->path);
        $length = strlen($id);
        foreach ($di as $file) {
            if (!$file->isDot() && substr($file->getFilename(), 0, $length) == $id) {
                $image = $this->path . $file->getFilename();
                $thumb = $this->path . 'thumb/' . $file->getFilename();
                if (file_exists($image)) {
                    unlink($image);
                }
                if (file_exists($thumb)) {
                    unlink($thumb);
                }
            }
        }
        /* deleting the movie from the database */
        $affectedRows = $this->db->delete($this->table, $this->url->get('key') . '="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('(#2) : The dataset coud not have been deleted!');
        }
    }

    /**
     * Gather Movies from Database
     *
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function fetch($fields='*', $filter='', $orderby='movie.name', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table);
        }

        if (!empty($filter)) {
            $select->where($filter);
        }
        
        $select->joinLeft('genre', 'genre.id = movie.genre','genre.name as genre');
        $select->joinLeft('rating', 'rating.id = movie.rating','rating.name as rating');
        $select->joinLeft('format', 'format.id = movie.format','format.name as format');
        

        $select->order($orderby);

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }
        echo $select->assemble();
        $sql = $this->db->query($select);
        $movies = $sql->fetchAll();

        if (empty($movies))
            throw new MovieException('(#3) : No Movies found!');
        
        return $movies;
    }

    /**
     * Fetches all Genres according
     * to movies.
     * 
     * @param   string  $type
     * @return  array   $genre
     */
    public function fetchGenre($type='movie') {
        // get all genre options
        $genreObj = new Genre();

        try {
            $genre = $genreObj->fetch($type);
        } catch (GenreException $genreException) {
            die($genreException);
        }

        return $genre;
    }

    /**
     * Fetches all Formats according
     * to movies.
     * 
     * @param   string  $type
     * @return  array   $format
     */
    public function fetchFormat($type='movie') {
        // get all format options
        $formatObj = new Format();

        try {
            $format = $formatObj->fetch($type);
        } catch (FormatException $formatException) {
            die($formatException);
        }

        return $format;
    }

    /**
     * Fetches all Ratings according
     * to movies.
     *
     * @param   string  $type
     * @return  array   $rating 
     */
    public function fetchRating($type='movie') {
        // get all rating options
        $ratingObj = new Rating();

        try {
            $rating = $ratingObj->fetch($type);
        } catch (RatingException $ratingException) {
            die($ratingException);
        }

        return $rating;
    }
}

?>
