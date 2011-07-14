<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Format
 *
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @since 12:59:06
 */
require_once('core/Object.php');
class Format extends Object {

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
     * set the type of the format
     * @param type $type 
     */
    public function setType($type=null) {
        if (!empty($type)) {
            $this->type = $type;
        }
    }

    /**
     * get the type of the format
     * @return type 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * set the name of the format
     * @param type $name 
     */
    public function setName($name=null) {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    /**
     * get the name of the format
     * @return type 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Validates the Movie object
     * returns an array with the error
     * messages.
     * @return array error
     */
    public function isValid() {
        require_once('FormatValidate.php');
        $validation = new FormatValidate();
        $output = $validation->isValid($this);
        return $output;
    }

}

?>
