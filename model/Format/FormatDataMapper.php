<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormatDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    FormatDataMapper.php
 * @since   18.06.2011 - 20:21:20
 */
require_once('core/DataMapper.php');

class FormatDataMapper implements DataMapper {

    private $db = null;
    private $config = null;
    private $table = null;

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        // get tablename from config
        $this->table = $this->config->get('database.tables.format');
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    public function fetch(array $fields, $filter='', $orderby='name', $limit='', $offset='') {
        $select = $this->db->select()->from($this->table, $fields)->where($filter)->order($orderby);

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if (empty($data)) {
            throw new FormatException('(#1) : No Formats found!');
        } else {
            $formatContainer = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {

                $format = FormatRepository::create($data[$index]);
                $formatContainer[] = $format;
            }
        }

        return $formatContainer;
    }

}

?>
