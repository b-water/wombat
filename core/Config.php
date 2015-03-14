<?php

class Config {
    
    
    const FILE = 'config.ini';
    /**
     * Configuration Entry 
     * @var array 
     */
    private $options = array();
    /**
     * The running instance
     * @var object 
     */
    private static $instance;

    /**
     * Constructor, only calls once
     * @param string $file 
     */
    private function __construct() {
        try {
            $this->read(self::FILE);
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
