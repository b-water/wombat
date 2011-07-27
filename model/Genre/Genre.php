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
require_once('core/Object.php');

class Genre extends Object {

    /**
     * type of genre
     * @var string 
     */
    private $type = null;
    /**
     * name of genre 
     * @var string 
     */
    private $name = null;
    /**
     * genreId from genre_associated
     * @var genreId 
     */
    private $genreId = null;
    /**
     * tableId from genre_associated
     * @var string 
     */
    private $tableId = null;
    /**
     * table from genre_associated
     * @var string 
     */
    private $table = null;

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

    public function setTableId($tableId=null) {
        if ($tableId != null && !empty($tableId)) {
            $this->tableId = $TableId;
        } else {
            throw new GenreException('table is not valid!');
        }
    }

    public function getTableId() {
        return $this->tableId;
    }

    public function setTable($table=null) {
        if ($table != null && !empty($table)) {
            $this->table = $table;
        } else {
            throw new GenreException('table is not valid!');
        }
    }

    public function getTable() {
        return $this->table;
    }

    public function setGenreId($genreId=null) {
        if ($genreId != null && !empty($genreId)) {
            $this->genreId = $genreId;
        } else {
            throw new GenreException('genre id is not valid!');
        }
    }

    public function getGenreId() {
        return $this->genreId;
    }

    public function isValid() {
        require_once('GenreValidate.php');
        $validate = new GenreValidate();
        $success = $validate->isValid($this);
        return $success;
    }

}