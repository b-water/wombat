<?php

/**
 * Description of Autoloader
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Autoloader.php
 * @since   13.05.2011 - 23:35:14
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
        spl_autoload_register(array($this,'core'));
        spl_autoload_register(array($this,'model'));
        spl_autoload_register(array($this,'controller'));
}

    /**
     *
     * @param <type> $class 
     */
    public function core($class) {
        set_include_path(get_include_path() . PATH_SEPARATOR . 'core/');
        spl_autoload_extensions('.php');
        spl_autoload($class);
    }


    /**
     *
     * @param <type> $class
     */
    public function model($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'model/');
        spl_autoload_extensions('.php');
        spl_autoload($class);
    }

    /**
     *
     * @param <type> $class 
     */
    public function controller($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'controller/');
        spl_autoload_extensions('Controller.php');
        spl_autoload($class);
    }

}

//call
autoloader::init();
?>