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
    private $vorname;
    private $nachname;
    private $email;

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
        $this->passwort = md5($passwort);

        $db = Database::getInstance($host, $user, $password);
        $smarty = new Smarty;
//        $smarty->get_registered_object($name); <-- get instance ?

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

    /**
     * Meldet den aktuellen
     * Benutzer vom System ab.
     *
     * @author  Nico Schmitz
     * @since   22.09.2010 - 22:23 Uhr
     */
    public function abmelden()
    {
        session_destroy();
        $hostname = $_SERVER['HTTP_HOST'];
        $path = dirname($_SERVER['PHP_SELF']);
        header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');

    }

    /**
     *
     * @param <type> $data 
     */
    public function registrieren($data)
    {
        $db = Database::getInstance($host, $user, $password);
        $smarty = new Smarty;

        if(array_key_exists('send', $data))
        {

            // Pflichtfeldprüfung
            $pflichtfelder = array('vorname', 'nachname','benutzername','passwort','passwort_repeat','email');
            $error = Pflichtfeldpruefung($data, $pflichtfelder);

            // Wenn die Pflichtfeldprüfung einen fehler fand wird die Error Nachricht generiert
            if(isset($error) && $error === TRUE)
            {
                $error_msg = 'Bitte füllen Sie alle Felder aus!';
            }
            else
            {
                // Überprüfunge ob die Passwörter überein stimmen
                if($data['passwort'] != $data['passwort_repeat'])
                {
                    $error_msg = 'Die Passwörter überstimmen nicht ein!';
                    $error = TRUE;
                }
            }

            /* Falls ein Fehler auftritt werden die Felder des Forms mit den vorher
            eingegeben Daten gefüttert */
            if($error === TRUE)
            {
                // Error Nachricht wird an das Template übergeben
                if(isset($errormsg))
                {
                    $smarty->assign('error',$error);
                    $smarty->assign('errormsg',$errormsg);
                }
                $smarty->assign('vorname',$data['vorname']);
                $smarty->assign('nachname',$data['nachname']);
                $smarty->assign('benutzername',$data['benutzername']);
                $smarty->assign('passwort',$data['passwort']);
                $smarty->assign('passwort_repeat',$data['passwort_repeat']);
                $smarty->assign('email',$data['email']);
            }

            if(!isset($error))
            {
                $this->benutzername = $data['benutzername'];
                $this->passwort = md5($data['passwort']);
                $this->vorname = $data['vorname'];
                $this->nachname = $data['nachname'];
                $this->email = $data['email'];

                $sql = 'INSERT INTO benutzer (vorname,nachname,benutzername,passwort,email)
                        VALUES("'.$this->vorname.'","'.$this->nachname.'",
                        "'.$this->benutzername.'","'.$this->passwort.'",
                        "'.$this->email.'")';
                
                $db->query($sql);
                session_start();
                $this->anmelden($this->benutzername, $this->passwort);
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';
            }
        }
    }

}


?>
