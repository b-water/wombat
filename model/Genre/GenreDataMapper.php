<?php

/**
 * Description of GenreDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    GenreDataMapper.php
 * @since   17.06.2011 - 20:47:47
 */
class GenreDataMapper implements DataMapper {

    /**
     * mysql table
     * @var String 
     */
    private $tableMovie = null;
    /**
     * mysql table
     * @var String 
     */
    private $tableGenre = null;
    /**
     * mysql table
     * @var String 
     */
    private $db = null;
    private $config = null;
    private $tableGenreAssociated = null;
    
    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        $this->tableGenre = $this->config->get('database.tables.genre');
        $this->tableGenreAssociated = $this->config->get('database.tables.genre_associated');
        $this->tableMovie = $this->config->get('database.tables.movie');
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

        $select->from($this->tableGenreAssociated, array('*'));

        $select->where($this->tableGenreAssociated . '.table = "' . $this->tableMovie . '" AND ' . $this->tableGenreAssociated . '.table_id = "' . $id . '"');

        $select->joinLeft($this->tableGenre, $this->tableGenre . '.id = ' . $this->tableGenreAssociated . '.genre_id', '*');

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

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

}

?>
