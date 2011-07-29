<?php

/**
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
require_once('core/DataMapper.php');
require_once('MovieException.php');

class MovieDataMapper implements DataMapper {

    /**
     * mysql table
     * @var String 
     */
    private $table = 'wombat_movie';
    /**
     * mysql table
     * @var String 
     */
    private $tableGenre = 'wombat_genre';
    /**
     * mysql table
     * @var String 
     */
    private $tableGenreAssoc = 'wombat_genre_assoc';
    /**
     * mysql table
     * @var String 
     */
    private $tableFormat = 'wombat_format';
    /**
     * mysql table
     * @var String 
     */
    private $tableRating = 'wombat_rating';
    /**
     * object from genre repo
     * @var object 
     */
    private $db = null;
    /**
     * Genre Repository
     * @var object
     */
    private $genreRepository = null;
    /**
     * Path to Cover Images
     * @var string
     */
    private $path = 'files/movie/';
    /**
     * Width of the Cropped/Resized Image
     * @var string
     */
    private $imageWidth = 193;
    /**
     * Height of the Cropped/Resized Image
     * @var string
     */
    private $imageHeight = 272;
    /**
     * Where to Crop
     * @var string
     */
    private $imageCrop = 193;
    /**
     * Url Parser
     * @var object
     */
    private $url = null;
    /**
     *
     * @var int
     */
    private $itemCountPerPage = 20;
    private $pageRange = 10;

    /**
     * MovieDataMapper Constructor
     * @param Zend_Db_Adapter_Pdo_Mysql $db
     */
    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {

        $this->db = $db;

        $this->url = Registry::get('url');

        // setup datamapper for genre
        require_once('model/Genre/GenreDataMapper.php');
        $genreDataMapper = new GenreDataMapper($this->db);

        require_once('model/Genre/GenreRepository.php');
        $this->genreRepository = new GenreRepository($genreDataMapper);
    }

    public function append($object) {
        $this->db->select();
    }

    /**
     * Updates a Movie from the 
     * Database and Uploads a 
     * Picture and generates a Thumbnail for it.
     *
     * @param array $values 
     */
    public function update($movie) {

        try {
            $this->genreRepository->deleteAssoc($movie->getId());
        } catch (Exception $exception) {
            die($exception);
        }

        foreach ($movie->getGenre() as $key => $val) {

            $params = array(
                'genre_id' => $val,
                'table_id' => $movie->getId(),
                'table' => 'movie'
            );

            try {
                $this->genreRepository->appendAssoc($params);
            } catch (Exception $exception) {
                die($exception);
            }
        }

        $data = array(
            'title' => $movie->getTitle(),
            'format' => $movie->getFormat(),
            'year' => $movie->getYear(),
            'duration' => $movie->getDuration(),
            'trailer' => $movie->getTrailer(),
            'rating' => $movie->getRating(),
            'description' => $movie->getDescription()
        );

        if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {

            // prepare upload
            $upload = new Zend_File_Transfer();
            $upload->addValidator('Count', false, array('min' => 1, 'max' => 1));
            $upload->addValidator('IsImage', true);
            $upload->addValidator('Size', false, array('max' => '6144kB'));

            /* get the file mimetype for the new name */
            $info = $upload->getFileInfo();
            $point = strpos($info['cover']['name'], '.');
            $ending = substr($info['cover']['name'], $point);
            $filename = $this->path . $movie->getId() . $ending;
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

            $thumb->adaptiveResize($this->imageWidth, $this->imageHeight)->cropFromCenter($this->imageCrop)->save($filename);

            $data['image'] = $filename;
        }

        $affectedRows = $this->db->update($this->table, $data, ' id ="' . $movie->getId() . '"');

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

        /* deleting the movie from the database */
        $affectedRows = $this->db->delete($this->table, 'id ="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('(#2) : The dataset coud not have been deleted!');
        } else {
            /* delete associated genres */
            $affectedRows = $this->genreRepository->deleteAssoc($id);
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
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        $select->joinLeft($this->tableRating, $this->tableRating . '.id = ' . $this->table . '.rating', $this->tableRating . '.name as rating');
        $select->joinLeft($this->tableFormat, $this->tableFormat . '.id = ' . $this->table . '.format', $this->tableFormat . '.name as format');

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }
        $sql = $this->db->query($select);
        $data = $sql->fetchAll();
        if (empty($data)) {
            throw new MovieException('(#3) : No Movies found!');
        } else {
            $movies = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {
                $data[$index]['genre'] = $this->genreRepository->fetchAssoc($data[$index]['id']);

                $movie = MovieRepository::create($data[$index]);
                $movies[] = $movie;
            }
        }
        return $movies;
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
    public function fetchByPage(array $fields, $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        $select->joinLeft($this->tableRating, $this->tableRating . '.id = ' . $this->table . '.rating', $this->tableRating . '.name as rating');
        $select->joinLeft($this->tableFormat, $this->tableFormat . '.id = ' . $this->table . '.format', $this->tableFormat . '.name as format');

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        require_once('library/Zend/Paginator/Adapter/DbSelect.php');
        $selectAdapter = new Zend_Paginator_Adapter_DbSelect($select);
        require_once('library/Zend/Paginator.php');

        $zfPaginator = new Zend_Paginator($selectAdapter);
        $zfPaginator->setItemCountPerPage($this->itemCountPerPage);
        $zfPaginator->setCurrentPageNumber($this->url->get('value'));
        $zfPaginator->getPages();

        $this->currentPageNumber = $this->url->get('value');
        $this->pageCount = $zfPaginator->count();

        $data = $zfPaginator->getCurrentItems();

        if (empty($data)) {
            throw new MovieException('(#3) : No Movies found!');
        } else {
            $movies = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {
                $data[$index]['genre'] = $this->genreRepository->fetchAssoc($data[$index]['id']);

                $movie = MovieRepository::create($data[$index]);
                $movies[] = $movie;
            }
        }
        return $movies;
    }

}