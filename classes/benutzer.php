<?php

/**
 * 
 */
class benutzer
{
    private $benutzername;
    private $passwort;
    private $id;



    public function __construct($id=null) {
        if ($id != null)
            $this->loadById($id);
    }

    public function loadById($id) {

    }

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

}


?>
