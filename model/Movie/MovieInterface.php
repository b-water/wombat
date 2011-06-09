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
class MovieInterface {
    
    public static function create() {
        return new Movie();
    }
    
    public function fetch($id = null) {
        $movie = new Movie();
        MovieDataMapper::fetch($movie);
        return $movie;
    }
    
    public function fetchAll() {
        
    }
    
    public function update(array $object) {
        
    }
    
    public function append(array $object) {
        
    }
    
    public function delete(array $object) {
        
    }
}

?>
