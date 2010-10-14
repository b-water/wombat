<?php

/**
 *
 *
 * 
 */
class Database extends mysqli
{
    protected static $instance = null;
    private function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }
    /**
     *
     * @param   string  $host
     * @param   string  $user
     * @param   string  $password
     * @return  mysqli
     */
    public static function getInstance($host, $user, $password, $database)
    {
        if (self::$instance == null)
            self::$instance = new Database($host, $user, $password, $database);
        return self::$instance;
    }

}

?>
