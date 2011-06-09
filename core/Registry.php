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
        if (isset(self::$registry[$index]) && !empty(self::$registry[$index])) {
            return self::$registry[$index];
        } else {
            throw new RegistryException('(#1) : Registry Object does not exists!');
        }
    }

}

?>
