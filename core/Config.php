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
 * Description of Config
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Config.php
 * @since   13.05.2011 - 23:35:14
 */
class Config {

    /**
     * Configuration Entry 
     * @var array 
     */
    private $options = array();
    /**
     * The running instance
     * @var object 
     */
    protected static $instance;

    /**
     * Constructor, only calls once
     * @param string $file 
     */
    private function __construct($file) {
        try {
            $this->read($file);
        } catch (ConfigException $configException) {
            die($configException);
        }
    }

    /**
     * Do not Clone
     */
    private function __clone() {
        
    }

    /**
     * Returns the current instance of the class
     * if no one is set it creates one
     * 
     * @return  config
     */
    public static function getInstance($file = null) {
        if (self::$instance == null) {
            self::$instance = new Config($file);
        }
        return self::$instance;
    }

    /**
     * Reads the INI Configuration File
     * @param string $file
     */
    private function read($file = null) {
        if (file_exists($file)) {
            $ini = parse_ini_file($file);
            foreach ($ini as $key => $value) {
                $this->set($key, $value);
            }
        } else {
            throw new ConfigException("Configuration file not found!");
        }
    }

    /**
     * Sets a configuration entry
     * @param string $key
     * @param string $value
     */
    public function set($key, $value) {
        $this->options[$key] = $value;
    }

    /**
     * Gets a configuration entry
     * @param  string $key
     * @return unknown
     */
    public function get($key) {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        } else {
            return false;
        }
    }

}
