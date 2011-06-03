<?php

/**
 * Description of Config
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Config.php
 * @since   13.05.2011 - 23:35:14
 */
class Config {

    private $options;
    protected static $instance = null;

    private function __construct($file) {
        try {
            $this->read($file);
        } catch (ConfigException $configException) {
            die($configException);
        }
    }

    private function __clone() {
        
    }

    /**
     * Returns the current instance of the class
     * if no one is set it creates one
     * 
     * @return  config
     */
    public function getInstance($file) {
        if (self::$instance == null)
            self::$instance = new Config($file);
        return self::$instance;
    }

    /**
     *
     * @param <type> $file
     */
    private function read($file) {
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
     *
     * @param <type> $key
     * @param <type> $value
     */
    public function set($key, $value) {
        $this->options[$key] = $value;
    }

    /**
     *
     * @param <type> $key
     * @return <type>
     */
    public function get($key) {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        } else {
            return false;
        }
    }

}
