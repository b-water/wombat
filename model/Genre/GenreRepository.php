<?php

/**
 * Description of GenreRepository
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    GenreRepository.php
 * @since   17.06.2011 - 21:06:10
 */
require_once('core/Repository.php');

class GenreRepository implements Repository {

    private $dataMapper = null;

    public function __construct(GenreDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    public static function create(array $data) {

        require_once('Genre.php');

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
        require_once('GenreValidate.php');
        if ($genre->isValid()) {
            return $genre;
        } else {
            throw new GenreException('Can´t create Genre Object, data is not valid');
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

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

}

?>
