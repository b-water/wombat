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
 * Description of FormatRepository
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    FormatRepository.php
 * @since   18.06.2011 - 20:21:55
 */
require_once('core/Repository.php');

class FormatRepository implements Repository {

    private $dataMapper = null;

    public function __construct(FormatDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    public static function create(array $data) {
        require_once('Object.php');
        $format = new Format();
        $format->setId($data['id']);
        $format->setType($data['type']);
        $format->setName($data['name']);
        
        if ($format->isValid()) {
            return $format;
        } else {
            require_once('Exception.php');
            throw new FormatException('Format Object is not valid!');
        }
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $format = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $format;
    }

}