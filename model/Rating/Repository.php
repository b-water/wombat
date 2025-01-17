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

        require_once('Object.php');
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
            require_once('Exception.php');
            throw new RatingException('Can´t create Rating Object, data is not valid');
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