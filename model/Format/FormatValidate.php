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
 * Description of FormatValidate
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    FormatValidate.php
 * @since   18.06.2011 - 20:21:46
 */
class FormatValidate {

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
     * Validates the format object
     * @param Format $format
     * @return type 
     */
    public function isValid(Format $format) {
        // mandatory fields
        $this->success = $this->isId($format->getId());
        $this->success = $this->isType($format->getType());
        $this->success = $this->isName($format->getName());

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

?>
