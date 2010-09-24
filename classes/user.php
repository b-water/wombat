<?php

/**
 * 
 */
class User
{
    private $username;
    private $administrator;
    private $password;
    private $id;
    private $forename;
    private $name;
    private $email;
    public $status = false;
    private $db;
    private $smarty = null;

    public function __construct($id=null) {
        $this->db = Database::getInstance($host, $user, $password, $database);
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
     * @param   string  benutzername
     * @param   string  passwort
     * @return  bool    
     */
    public function login($username, $password)
    {
        
        $this->username = $username;
        $this->password = md5($password);

        if ($this->smarty == null)
            $this->smarty = new Smarty();

        $query = "SELECT * FROM user WHERE
            username = '".$this->db->escape_string($this->username)."'
                AND password = '".$this->db->escape_string($this->password)."';";

        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                session_regenerate_id();
                $this->id = $row['id'];
                $this->benutzername = $row['username'];
                $this->email = $row['email'];
                $this->forename = $row['forename'];
                $this->name = $row['name'];
                $this->status = true;
                $_SESSION['user']['loggedin'] = true;
            }
            else
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Meldet den aktuellen
     * Benutzer vom System ab.
     *
     * @author  Nico Schmitz
     * @since   22.09.2010 - 22:23 Uhr
     */
    public function logout()
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
    public function register($data)
    {
        $db = Database::getInstance($host, $user, $password, $database);
        if ($this->smarty == null)
            $this->smarty = new Smarty();

        if(array_key_exists('send', $data))
        {

            // Pflichtfeldprüfung
            $pflichtfelder = array('forename', 'name','username','password','password_repeat','email');
            $error = Pflichtfeldpruefung($data, $pflichtfelder);
            // Wenn die Pflichtfeldprüfung einen fehler fand wird die Error Nachricht generiert
            if($error === TRUE)
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
                        VALUES("'.$this->db->escape_string($this->vorname).'",
                            "'.$this->db->escape_string($this->nachname).'",
                        "'.$this->db->escape_string($this->benutzername).'",
                            "'.$this->db->escape_string($this->passwort).'",
                        "'.$this->db->escape_string($this->email).'")';
                
                $this->db->query($sql);
                session_start();
                $this->anmelden($this->benutzername, $this->passwort);
                
//                Debugger::getInstance()->write(print_r($_SESSION, true));

            }
        }
    }

}


?>
