<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RatingRepository
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    RatingRepository.php
 * @since   18.06.2011 - 20:23:39
 */
require_once('core/Repository.php');

class RatingRepository implements Repository {

    private $dataMapper = null;

    public function __construct(RatingDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    public static function create(array $data) {

        require_once('Rating.php');
        $rating = new Rating();

        if (!empty($data['type'])) {
            $rating->setType($data['type']);
        }

        if (!empty($data['name'])) {
            $rating->setName($data['name']);
        }

        if (!empty($data['table'])) {
            $rating->setTable($data['table']);
        }

        if (!empty($data['id'])) {
            $rating->setId($data['id']);
        }

        if ($rating->isValid()) {
            return $rating;
        } else {
            require_once('RatingException.php');
            throw new RatingException('Can´t create Movie Object, data is not valid');
        }
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    /**
     * Fetches Rating Data
     *
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset
     * @return type 
     */
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $rating = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $rating;
    }

}

?>
