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
 * Description of Rating
 *
 * @author nico
 * @since 13:11:15
 */
require_once('core/Object.php');
class Rating extends Object {

    /**
     * type of format
     * @var string 
     */
    private $type = null;
    /**
     * name of format
     * @var string 
     */
    private $name = null;

    /**
     * set the type of the rating
     * @param type $type 
     */
    public function setType($type=null) {
        if (!empty($type)) {
            $this->type = $type;
        }
    }

    /**
     * get the type of the type
     * @return type 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * set the name of the name
     * @param type $name 
     */
    public function setName($name=null) {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    /**
     * get the name of the name
     * @return type 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Validates the Rating object
     * returns an array with the error
     * messages.
     * @return array error
     */
    public function isValid() {
        require_once('Validate.php');
        $validation = new RatingValidate();
        $output = $validation->isValid($this);
        return $output;
    }

}

