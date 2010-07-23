<?php

/**
 * Erweitert mysqli um das
 * Singleton Pattern Design
 * 
 */
class Database extends mysqli
{
    protected $instance = null;
    private function __construct($host, $user, $password)
    {
        parent::__construct($host, $user, $password);
    }
    /**
     *
     * @param   string  $host
     * @param   string  $user
     * @param   string  $password
     * @return  mysqli
     */
    public function getInstance($host, $user, $password)
    {
        if (self::$instance == null)
            self::$instance = new Database($host, $user, $password);
        return self::$instance;
    }

}

?>
