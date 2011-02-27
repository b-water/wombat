<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registry
 *
 * @author nico
 */
class Registry {

    private $the_registry = array();
    protected static $instance = null;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    /**
     * Constructs the object if
     * is not set
     *
     * @return instance
     */
    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Registry();
        return self::$instance;
    }

    /**
     * Registers a object
     *
     * @param string $index
     * @param object $value
     */
    public function set($index, $value) {
        $this->the_registry[$index] = $value;
    }

    /**
     * Returns a object
     *
     * @param string $index
     * @return object
     */
    public function get($index) {
        if(isset($this->the_registry[$index]) && !empty($this->the_registry[$index]))
        {
            return $this->the_registry[$index];
        } else {
            return false;
        }
    }

}

?>
