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
abstract class Registry {

    private static $registry = array();
    protected static $instance = null;

//    private function __construct() {
//        
//    }
//
//    private function __clone() {
//        
//    }
//
//    /**
//     * Constructs the object if
//     * is not set
//     *
//     * @return instance
//     */
//    public static function getInstance() {
//        if (self::$instance == null)
//            self::$instance = new Registry();
//        return self::$instance;
//    }

    /**
     * Registers a object
     *
     * @param string $index
     * @param object $value
     */
    public static function set($index, $value) {
        self::$registry[$index] = $value;
    }

    /**
     * Returns a object
     *
     * @param string $index
     * @return object
     */
    public static function get($index) {
        if(isset(self::$registry[$index]) && !empty(self::$registry[$index]))
        {
            return self::$registry[$index];
        } else {
            throw new RegistryException('(#1) : Registry Object already exists!');
        }
    }

}

?>
