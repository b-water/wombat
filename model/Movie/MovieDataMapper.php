<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieDataMapper
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieDataMapper.php
 * @since   08.06.2011 - 18:46:04
 * @version Expression id is undefined on line 13, column 15 in Templates/Scripting/PHPClass.php.
 */
class MovieDataMapper {

    // mysql table names 
    private $tableMovie;
    private $tableGenre;
    private $tableAssociatedGenre;
    private $tableFormat;
    private $tableRating;
    // file path for a cover image
    private $path;
    // size of thumbnails
    const IMAGE_WIDTH = '193';
    const IMAGE_HEIGHT = '272';
    const IMAGE_CROP = '272';

    const IMAGE_SIZE = '6144kB';
    private $config;
    private $db;

    public function __construct() {
        $this->config = Registry::get('config');
        $this->db = Registry::get('db');
        // get mysql table names
        $this->tableMovie = $this->config->get('database.tables.movie');
        $this->tableGenre = $this->config->get('database.tables.genre');
        $this->tableAssociatedGenre = $this->config->get('database.tables.associatedGenre');
        $this->tableFormat = $this->config->get('database.tables.format');
        $this->tableRating = $this->config->get('database.tables.rating');

        $this->path = $this->config->get('path.files') . 'movie/';
    }
    
    
    public function append($object) {
        
    }

    /**
     * Updates a Movie from the 
     * Movie Database and Uploads a 
     * Picture and generates a Thumbnail for it.
     *
     * @param array $values 
     */
    public function update($object) {
        $this->deleteAssociatedGenre($this->url->get('value'));

        $data = array(
            'name' => $values['name'],
            'format' => $values['format'],
            'year' => $values['year'],
            'duration' => $values['duration'],
            'trailer' => $values['trailer'],
            'rating' => $values['rating'],
            'description' => $values['description']
        );

        foreach ($values['genre'] as $key => $val) {
            $params = array(
                'genre_id' => $val,
                'table_id' => $this->url->get('value'),
                'table' => $this->tableMovie
            );

            $this->createAssociatedGenre($params);
        }



        if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {

            // prepare upload
            $upload = new Zend_File_Transfer();
            $upload->addValidator('Count', false, array('min' => 1, 'max' => 1));
            $upload->addValidator('IsImage', true);
            $upload->addValidator('Size', false, array('max' => $this->imageSize));

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

            $thumb->adaptiveResize(self::IMAGE_WIDTH, $this->imageHeight)->cropFromCenter($this->imageCrop)->save($filename);

            $data['image'] = $filename;
        }

        $affectedRows = $this->db->update($this->tableMovie, $data, $this->url->get('key') . '="' . $this->url->get('value') . '"');
        if ($affectedRows != 1) {
            throw new MovieException('(#1) : The dataset coud not habe been updated!');
        }
    }
    
    public function saveImage($file) {
        
    }

    /**
     * Deletes a Movie from the
     * Database and the Pictures according
     * to the Movie from files/movie/
     * 
     * @param type $id 
     */
    public function delete($object) {

        /* deleting the movie from the database */
        $affectedRows = $this->db->delete($this->tableMovie, $this->url->get('key') . '="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('(#2) : The dataset coud not have been deleted!');
        } else {
            /* delete associated genres */
            $this->deleteAssociatedGenre($id);
            /* deleting files according to the movie */
            $di = new DirectoryIterator($this->path);
            $length = strlen($id);
            foreach ($di as $file) {
                if (!$file->isDot() && substr($file->getFilename(), 0, $length) == $id) {
                    $image = $this->path . $file->getFilename();
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
            }
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
    public function fetch($fields='*', $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->tableMovie, $fields);
        } else {
            $select->from($this->tableMovie);
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

//        $select->joinLeft($this->tableRating, $this->tableRating . '.id = ' . $this->tableMovie . '.rating', $this->tableRating . '.name as rating');
        $select->joinLeft($this->tableFormat, $this->tableFormat . '.id = ' . $this->tableMovie . '.format', $this->tableFormat . '.name as format');

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();
        $test = array();
        if (empty($data)) {
            throw new MovieException('(#3) : No Movies found!');
        } else {
            for ($index = 0; $index <= count($data) - 1; $index++) {
                $data[$index]['genre'] = $this->fetchAssociatedGenre($data[$index]['id']);
            }
        }

        return $data;
    }
//
//    /**
//     * Fetches associated Genre
//     * from a Movie
//     *
//     * @param   type    $id
//     * @param   type    $fields
//     * @return  type    array
//     */
//    public function fetchAssociatedGenre($id=null, $fields='*') {
//        if ($id != null) {
//            $select = $this->db->select();
//            $select->from($this->tableAssociatedGenre, $fields);
//            $select->where($this->tableAssociatedGenre . '.table = "' . $this->tableMovie . '" AND ' . $this->tableAssociatedGenre . '.table_id = "' . $id . '"');
//            $select->joinLeft($this->tableGenre, $this->tableGenre . '.id = ' . $this->tableAssociatedGenre . '.genre_id', $this->tableGenre . '.name as genre');
//            $sql = $this->db->query($select);
//            $genre = $sql->fetchAll();
//            return $genre;
//        } else {
//            throw new MovieException('(#5) : There must be an ID given to fetch Associated Genre!');
//        }
//    }
//
//    /**
//     * Fetches all Genres according
//     * to movies.
//     * 
//     * @param   string  $type
//     * @return  array   $genre
//     */
//    public function fetchGenre($type='movie') {
//        // get all genre options
//        $genreObj = new Genre();
//
//        try {
//            $genre = $genreObj->fetch($type);
//        } catch (GenreException $genreException) {
//            die($genreException);
//        }
//
//        return $genre;
//    }
//
//    /**
//     * Fetches all Formats according
//     * to movies.
//     * 
//     * @param   string  $type
//     * @return  array   $format
//     */
//    public function fetchFormat($type='movie') {
//        // get all format options
//        $formatObj = new Format();
//
//        try {
//            $format = $formatObj->fetch($type);
//        } catch (FormatException $formatException) {
//            die($formatException);
//        }
//
//        return $format;
//    }
//
//    /**
//     * Fetches all Ratings according
//     * to movies.
//     *
//     * @param   string  $type
//     * @return  array   $rating 
//     */
//    public function fetchRating($type='movie') {
//        // get all rating options
//        $ratingObj = new Rating();
//
//        try {
//            $rating = $ratingObj->fetch($type);
//        } catch (RatingException $ratingException) {
//            die($ratingException);
//        }
//
//        return $rating;
//    }
//
//    /**
//     * Deletes all Genre According
//     * to a Movie
//     *
//     * @param   string    $id 
//     */
//    private function deleteAssociatedGenre($id) {
//        if (!empty($id)) {
//            /* deleting the movie from the database */
//            $this->db->delete($this->tableAssociatedGenre, ' table_id ="' . $id . '"');
//        } else {
//            throw new MovieException('(#6) : There must be an ID given to delete Associated Genre!');
//        }
//    }
//
//    /**
//     * Creates a Genre According to a Movie
//     *
//     * @param   array     $params 
//     */
//    private function createAssociatedGenre(array $params) {
//        if (!empty($params)) {
//            $affectedRows = $this->db->insert($this->tableAssociatedGenre, $params);
//            if ($affectedRows != 1) {
//                throw new MovieException('(#7) : Coud not create associated Genre!');
//            }
//        }
//    }

}

?>