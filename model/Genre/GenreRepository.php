<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenreRepository
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    GenreRepository.php
 * @since   17.06.2011 - 21:06:10
 */
require_once('Genre.php');
require_once('GenreRepository.php');

class GenreRepository {

    private $dataMapper = null;

    public function __construct(GenreDataMapper $dataMapper) {
        if (is_null($dataMapper)) {
            throw new GenreException('GenreDataMapper is missing');
        }
        $this->dataMapper = $dataMapper;
    }

    public static function create(array $data) {

        $genre = new Genre();

        if (!empty($data['type'])) {
            $genre->setType($data['type']);
        }

        if (!empty($data['name'])) {
            $genre->setName($data['name']);
        }

        if (!empty($data['table'])) {
            $genre->setTable($data['table']);
        }

        if (!empty($data['id'])) {
            $genre->setId($data['id']);
        }

        if (GenreValidate::isValid($genre)) {
            return $genre;
        } else {
            throw new GenreException('Can´t create Movie Object, data is not valid');
        }
    }

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $genre = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $genre;
    }

    public function fetchAssoc($id=null) {
        $genre = $this->dataMapper->fetchAssoc($id);
        return $genre;
    }

}

?>
