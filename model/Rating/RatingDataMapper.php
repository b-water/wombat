<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RatingDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    RatingDataMapper.php
 * @since   18.06.2011 - 20:23:20
 */
require_once('core/DataMapper.php');

class RatingDataMapper implements DataMapper {

    private $db = null;
    private $table = null;
    private $config = null;

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        $this->table = $this->config->get('database.tables.rating');
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if (!empty($data)) {
            $ratings = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {
                require_once('RatingRepository.php');
                $rating = RatingRepository::create($data[$index]);
                $ratings[] = $rating;
            }
        } else {
            throw new RatingException('No Ratings found!');
        }

        return $ratings;
    }

    //    //put your code here
//    private $table = 'rating';
//    private $db = null;
//
//    public function __construct()
//    {
//        $this->db = Registry::get('db');
//    }
//
//        /**
//     * fetchs all ratings that are set in the rating table
//     *
//     * @return  array
//     */
//    public function fetch($type = '*', $fields = '*', $order = 'name') {
//
//        $select = $this->db->select()->from($this->table, $fields)->where('type = "'.$type.'"')->order($order);
//        $sql = $this->db->query($select);
//        $data = $sql->fetchAll();
//
//        if(empty($data))
//        {
//            throw new RatingException('(#1) : No Ratings found!');
//        }
//
//        return $data;
//    }
}

?>
