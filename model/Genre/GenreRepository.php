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
class GenreRepository {

    private $dataMapper = null;

    public function __construct(GenreDataMapper $dataMapper) {
        if (is_null($dataMapper)) {
            throw new GenreException('GenreDataMapper is missing');
        }
        $this->dataMapper = $dataMapper;
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
