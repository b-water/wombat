<?php

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
        require_once('Format.php');
        $format = new Format();
        $format->setId($data['id']);
        $format->setType($data['type']);
        $format->setName($data['name']);
        
        if ($format->isValid()) {
            return $format;
        } else {
            require_once('FormatException.php');
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

?>
