<?php

/**
 * 
 */
class benutzer
{
    private $benutzername;
    private $administrator;
    private $passwort;
    private $id;

    public function __construct($id=null) {
        if ($id != null)
            $this->loadById($id);
    }

    public function loadById($id) {

    }

    /**
     * Meldet einen Benutzer im
     * System an.
     *
     * @author  Nico Schmitz
     * @since   19.07.2010 - 22:33 Uhr
     *
     * @param   string  $benutzername
     * @param   string  $passwort
     */
    public function anmelden($benutzername, $passwort)
    {

        $this->benutzername = $benutzername;
        $this->passwort = $passwort;

        $db = Database::getInstance($host, $user, $password);
        $db->select_db($database);


        $query = "SELECT * FROM benutzer WHERE
            benutzername = '".$this->benutzername."' AND passwort = '".$this->passwort."';";

        $result = $db->query($query);

        while ($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                session_regenerate_id();
                $_SESSION['benutzer']['benutzername'] = $row['benutzername'];
                $_SESSION['benutzer']['id'] = $row['id'];
                $this->id = $row['id'];
                $_SESSION['benutzer']['angemeldet'] = TRUE;
            }
        }
    }

    public function abmelden()
    {
        session_destroy();
        $hostname = $_SERVER['HTTP_HOST'];
        $path = dirname($_SERVER['PHP_SELF']);
        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');

    }

}


?>
