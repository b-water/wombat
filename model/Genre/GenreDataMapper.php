<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenreDataMapper
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    GenreDataMapper.php
 * @since   17.06.2011 - 20:47:47
 */
class GenreDataMapper extends DataMapper {

    private $table = null;

    public function __construct($db) {
        parent::__construct($db);
    }

    public function init() {
        $this->table = $this->config->get('database.tables.genre');
    }

    /**
     * Gathers genre from Database
     * 
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset 
     */
    public function fetch(array $fields, $filter = '', $orderby = '', $limit = '', $offset = '') {
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

        var_dump($data);
    }

    public function fetchAssoc($id=null) {
        if ($id != null && !ctype_digit($id)) {
            throw new GenreException('(#8) : Id is not set or invalid!');
        }

        $select = $this->db->select();

        $select->from($this->tableAssociatedGenre, $fields);

        $select->where($this->tableAssociatedGenre . '.table = "' . $this->tableMovie . '" AND ' . $this->tableAssociatedGenre . '.table_id = "' . $id . '"');

        $select->joinLeft($this->tableGenre, $this->tableGenre . '.id = ' . $this->tableAssociatedGenre . '.genre_id', $this->tableGenre . '.id');

        $sql = $this->db->query($select);
        $genre = $sql->fetchAll();

        if (!empty($genre)) {
            return $genre;
        } else {
            return '';
        }
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

}

?>
