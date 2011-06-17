<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genre
 *
 * @author nico
 * @since 13:39:59
 */
class Genre extends Object {

    private $type = null;
    private $name = null;

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public function setType($type=null) {
        if ($type != null && !empty($type)) {
            $this->type = $type;
        } else {
            throw new GenreException('type is not valid!');
        }
    }

    public function getType() {
        return $this->type;
    }

    public function setName($name=null) {
        if ($name != null && !empty($name)) {
            $this->name = $name;
        } else {
            throw new GenreException('name is not valid!');
        }
    }

    public function getname() {
        return $this->name;
    }

}

?>
