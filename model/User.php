<?php

class User {

    private static $username = 'Administrator';
    private $password;
    private $forename;
    private $name;
    private $email;
    
    private $db;

    public function __construct($id=null) {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
        if ($id != null)
            $this->loadById($id);
    }

    public function loadById($id) {

    }

    /**
     * Sign in a user
     *
     * @author  Nico Schmitz
     * @since   19.07.2010 - 22:33 Uhr
     *
     * @param   string  username
     * @param   string  password
     * @return  bool    
     */
    public function login($username, $password) {
        $this->username = $username;
        $this->password = md5($password);
        $success = true;

        if ($this->smarty == null)
            $this->smarty = new Smarty();

        $query = "SELECT * FROM user WHERE
            username = '" . $this->db->escape_string($this->username) . "'
                AND password = '" . $this->db->escape_string($this->password) . "';";

        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            if (!empty($row)) {
                session_regenerate_id();
                $this->id = $row['id'];
                $this->benutzername = $row['username'];
                $this->email = $row['email'];
                $this->forename = $row['forename'];
                $this->name = $row['name'];
                $this->status = true;
                $_SESSION['user']['loggedin'] = true;
                $_SESSION['user']['session_id'] = session_id();
            } else {
                $success = false;
                $smarty->assign('success', $success);
            }
        }

        return $success;
    }

    /**
     * Meldet den aktuellen
     * Benutzer vom System ab.
     *
     * @author  Nico Schmitz
     * @since   22.09.2010 - 22:23 Uhr
     */
    public function logout() {
        session_destroy();
        $hostname = $_SERVER['HTTP_HOST'];
        $path = dirname($_SERVER['PHP_SELF']);
        header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/index.php');
    }

}

?>
