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
        spl_autoload_register(array($this,'application'));
        spl_autoload_register(array($this,'model'));
        spl_autoload_register(array($this,'controller'));
}

    /**
     *
     * @param <type> $class 
     */
    public function application($class) {
        set_include_path(get_include_path() . PATH_SEPARATOR . 'application/');
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