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
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
/**
 * Description of MovieDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    MovieDataMapper.php
 * @since   08.06.2011 - 18:46:04
 */
require_once('core/DataMapper.php');
require_once('MovieException.php');

class MovieDataMapper implements DataMapper {

    /**
     * mysql table
     * @var String 
     */
    private $tableMovie = null;
    /**
     * mysql table
     * @var String 
     */
    private $tableGenre = null;
    /**
     * mysql table
     * @var String 
     */
    private $tableGenreAssociated = null;
    /**
     * mysql table
     * @var String 
     */
    private $tableFormat = null;
    /**
     * mysql table
     * @var String 
     */
    private $tableRating = null;
    /**
     * object from genre repo
     * @var object 
     */
    private $db = null;
    private $config = null;
    private $genreRepository = null;

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        // get tablenames from config
        $this->tableMovie = $this->config->get('database.tables.movie');
        $this->tableGenre = $this->config->get('database.tables.genre');
        $this->tableGenreAssociated = $this->config->get('database.tables.genre_associated');
        $this->tableFormat = $this->config->get('database.tables.format');
        $this->tableRating = $this->config->get('database.tables.rating');

        // setup datamapper for genre
        require_once('model/Genre/GenreDataMapper.php');
        $genreDataMapper = new GenreDataMapper($this->db);
        require_once('model/Genre/GenreRepository.php');
        $this->genreRepository = new GenreRepository($genreDataMapper);
    }

    public function append($object) {
        
    }

    /**
     * Updates a Movie from the 
     * Database and Uploads a 
     * Picture and generates a Thumbnail for it.
     *
     * @param array $values 
     */
    public function update($movie) {

        var_dump($movie);

        $this->deleteAssociatedGenre($movie->getId());

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

            $thumb->adaptiveResize($this->imageWidth, $this->imageHeight)->cropFromCenter($this->imageCrop)->save($filename);

            $data['image'] = $filename;
        }

        $affectedRows = $this->db->update($this->tableMovie, $data, $this->url->get('key') . '="' . $this->url->get('value') . '"');
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
    public function delete($object) {

        if ($id != null && ctype_digit($id)) {
            throw new MovieException('(#8) : Id is not set or invalid!');
        }

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
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->tableMovie, $fields);
        } else {
            $select->from($this->tableMovie, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        $select->joinLeft($this->tableRating, $this->tableRating . '.id = ' . $this->tableMovie . '.rating', $this->tableRating . '.name as rating');
        $select->joinLeft($this->tableFormat, $this->tableFormat . '.id = ' . $this->tableMovie . '.format', $this->tableFormat . '.name as format');

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
     * Deletes all Genre According
     * to a Movie
     *
     * @param   string    $id 
     */
    private function deleteAssocGenre($id) {

    }

}