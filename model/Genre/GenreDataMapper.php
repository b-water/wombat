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
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
require_once('core/DataMapper.php');
class GenreDataMapper implements DataMapper {

    /**
     * mysql table
     * @var String 
     */
    private $tableMovie = 'wombat_movie';
    /**
     * mysql table
     * @var String 
     */
    private $table = 'wombat_genre';
    /**
     * Database Object
     * @var object
     */
    private $db = null;
    /**
     * Genre Assoc Table
     * @var string
     */
    private $tableGenreAssoc = 'wombat_genre_assoc';

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
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

        if (!empty($data)) {
            
        }

        return $data;
    }

    /**
     *
     * @param int $id
     * @return array $genre
     */
    public function fetchAssoc($id=null) {
        if ($id != null && !ctype_digit($id)) {
            throw new GenreException('(#8) : Id is not set or invalid!');
        }

        $select = $this->db->select();

        $select->from($this->tableGenreAssoc, array('*'));

        $select->where($this->tableGenreAssoc . '.table = "movie" AND ' . $this->tableGenreAssoc . '.table_id = "' . $id . '"');

        $select->joinLeft($this->table, $this->table . '.id = ' . $this->tableGenreAssoc . '.genre_id', '*');

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        $result = array();
        if (!empty($data)) {
            foreach ($data as $item) {
                $genre = GenreRepository::create($item);
                $result[] = $genre;
            }
            return $result;
        } else {
            return '';
        }
    }

    /**
     * Deletes a Associated Genre
     * @param int $id 
     */
    public function deleteAssoc($id=null) {
        $this->db->delete($this->tableGenreAssoc, ' table_id ="' . $id . '"');
    }

    public function append($object) {
        
    }

    /**
     *  Appends a Associated Genre
     * @param array $params 
     */
    public function appendAssoc(array $params) {
        if (!empty($params)) {
            $affectedRows = $this->db->insert($this->tableGenreAssoc, $params);
            if ($affectedRows != 1) {
                throw new MovieException('(#7) : Coud not create associated Genre!');
            }
        }
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

}