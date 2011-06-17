<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataMapper
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    DataMapper.php
 * @since   09.06.2011 - 18:53:06
 */
abstract class DataMapper {

    // The smarty template object
    protected $db;
    // The configuration object
    protected $config;

    public function __construct($db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        $this->init();
    }

    // custom constructor
    abstract function init();

    // main functions
    abstract protected function append($object);

    abstract protected function delete($object);

    abstract protected function update($object);

    abstract protected function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='');
}

?>