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

    public function appendAssoc() {
        
    }

    public function delete($object) {
        
    }

    public function deleteAssoc($id=null) {
        
    }

    public function update($object) {
        
    }

}