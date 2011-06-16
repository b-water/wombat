<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieInterface
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieInterface.php
 * @since   08.06.2011 - 18:45:47
 * @version Expression id is undefined on line 13, column 15 in Templates/Scripting/PHPClass.php.
 */
class MovieRepository {
    
    private $_data_mapper;
    
    public function __construct(MovieDataMapper $data_mapper)
    {
        if (is_null($data_mapper))
        {
            throw new MovieException('MovieDataMapper is missing');
        }
        $this->_data_mapper = $data_mapper;
    }
    
    public static function create($title) {
        $movie = new Movie();
        $movie->setTrailer($title);
        if ($movie->isValid())
        {
            return $movie;
        }
    }
    
    public function fetch($id = null) {
        $dataMapper = new MovieDataMapper();
        $object = $dataMapper->fetch($object,$id);
        return $object;
    }
    
    public function update(array $object) {
        
    }
    
    public function append(Movie $movie) {
        $this->_data_mapper->append($movie);
    }
    
    public function delete(array $object) {
        
    }
    
    public function fetchAll()
    {
        $this->_data_mapper->fetchAll();
    }
}

?>
