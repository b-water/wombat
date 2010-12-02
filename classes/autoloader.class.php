<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoloader
 *
 * @author nico
 */
class Autoloader {

    public static $loader;

    public static function init() {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    /**
     *
     */
    public function __construct() {
        spl_autoload_register(array($this, 'classes'));
    }

    /**
     *
     * @param <type> $class 
     */
    public function classes($class) {
        set_include_path(get_include_path() . PATH_SEPARATOR . '/classes/');
        spl_autoload_extensions('.class.php');
        spl_autoload($class);
    }

}

//call
autoloader::init();
?>