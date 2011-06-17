<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieInterface
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieInterface.php
 * @since   08.06.2011 - 18:45:47
 * @version Expression id is undefined on line 13, column 15 in Templates/Scripting/PHPClass.php.
 */
require_once('Movie.php');

class MovieRepository {

    private $dataMapper;

    public function __construct(MovieDataMapper $dataMapper) {
        if (is_null($dataMapper)) {
            throw new MovieException('MovieDataMapper is missing');
        }
        $this->dataMapper = $dataMapper;
    }

    public static function create(array $data) {
        
        $movie = new Movie();
        
        if (!empty($data['title'])) {
            $movie->setTitle($data['title']);
        }

        if (!empty($data['description'])) {
            $movie->setDescription($data['description']);
        }

        if (!empty($data['image'])) {
            $movie->setImage($data['image']);
        }

        if (!empty($data['format'])) {
            $movie->setFormat($data['format']);
        }

        if (!empty($data['rating'])) {
            $movie->setRating($data['rating']);
        }

        if (!empty($data['trailer'])) {
            $movie->setTrailer($data['trailer']);
        }

        if (!empty($data['year'])) {
            $movie->setYear($data['year']);
        }

        if (!empty($data['duration'])) {
            $movie->setDuration($data['duration']);
        }

        if (MovieValidate::isValid($movie)) {
            return $movie;
        } else {
            throw new MovieException('Can´t create Movie Object, data is not valid');
        }
    }

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $movie = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $movie;
    }

    public function update(array $object) {
        
    }

    public function append(Movie $movie) {
        $this->_data_mapper->append($movie);
    }

    public function delete(array $object) {
        
    }

//    public function fetchAll() {
//        $this->dataMapper->fetchAll();
//    }
}

?>
