<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author nico
 */
class Database extends mysqli {

    protected static $instance = null;

    /**
     * Create the object
     *
     * @param <type> $host
     * @param <type> $user
     * @param <type> $password
     * @param <type> $database 
     */
    private function __construct($host, $user, $password, $database) {
        parent::__construct($host, $user, $password, $database);
    }

    /**
     * setting the clone method to
     * private
     * 
     */
    private function __clone() {
        
    }

    /**
     * Returns the current instance of the class
     * if no one is set it creates one
     * 
     * @param   string  $host
     * @param   string  $user
     * @param   string  $password
     * @return  mysqli
     */
    public static function getInstance($host, $user, $password, $database) {
        if (self::$instance == null)
            self::$instance = new Database($host, $user, $password, $database);
        return self::$instance;
    }

}

?>
