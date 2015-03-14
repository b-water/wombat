<?php

abstract class Registry {

    /**
     * Object Container
     * @var array
     */
    private static $registry = array();

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
            require_once('core/RegistryException.php');
            throw new RegistryException('System Error : Registry Object does not exists!');
        }
    }

}
