<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movies
 *
 * @author nico
 */
class Movie {

    protected static $instance = null;
    private $movies = array();
    private $format = array();
    private $table = 'movie';

    private function __construct() {

        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new movie();
        return self::$instance;
    }

    public function deleteMovie($id) {

        $sql = 'DELETE FROM ' . $this->table . ' WHERE id="' . $id . '"';

        $result = $this->db->query($sql);

        return true;
    }

    public function getFormat() {

        $sql = 'SELECT name FROM format WHERE type="movie"';
        $result = $this->db->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (!empty($row)) {
                $this->format[] = $row;
            }
        }
    }

    /**
     * Gather Movies from Database
     * 
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function getMovies($fields='*', $filter='', $orderby='ORDER BY NAME', $limit='', $offset='') {

        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
        (!empty($filter)) ? $sql .= $filter : '';
        $sql .= ' ' . $orderby;

        // gather data
        $result = $this->db->query($sql);

        while ($row = $result->fetch_assoc()) {
            if (!empty($row)) {
                $this->movies[] = $row;
            }
        }

        // returns the array with the movies
        return $this->movies;
    }

}

?>
