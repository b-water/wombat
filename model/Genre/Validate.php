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
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * Description of GenreValidation
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    GenreValidation.php
 * @since   17.06.2011 - 20:47:58
 */
class GenreValidate {

    /**
     * success, true or false
     * @var type 
     */
    public $success = null;
    /**
     * error information
     * @var type 
     */
    public $error_cache = array();

    /**
     * Validates the Genre object
     * @param Genre $genre
     * @return type 
     */
    public function isValid(Genre $genre) {
        $this->success = $this->isId($genre->getId());
        $this->success = $this->isType($genre->getType());
        $this->success = $this->isName($genre->getName());

        return $this->success;
    }

    /**
     * Validates the id
     * @param type $id
     * @return type 
     */
    public function isId($id=null) {
        if (!ctype_digit($id)) {
            return false;
        }
        return true;
    }

    /**
     * Validates the type
     * @param type $type
     * @return type 
     */
    public function isType($type) {
        if (empty($type)) {
            return false;
        }
        return true;
    }

    /**
     * Validates name
     * @param type $name
     * @return type 
     */
    public function isName($name) {
        if (empty($name)) {
            return false;
        }
        return true;
    }

}