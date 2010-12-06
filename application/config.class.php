<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author nico
 */
class config {

    private $options;
    //put your code here
    protected static $instance = null;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    /**
     * Returns the current instance of the class
     * if no one is set it creates one
     * 
     * @return  config
     */
    public function getInstance() {
        if (self::$instance == null)
            self::$instance = new Config();
        return self::$instance;
    }

    /**
     *
     * @param <type> $file
     */
    public function read($file) {

        if (file_exists($file)) {

            $ini = parse_ini_file($file);
            foreach ($ini as $key => $value) {
                $this->set($key, $value);
            }
        } else {
            throw new Exception("Configuration file not found!");
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
