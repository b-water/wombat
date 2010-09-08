<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of benutzer
 *
 * @author nico
 */
class benutzer {

    public $benutzername;
    protected $passwort;

    public function anmelden($benutzername, $passwort)
    {
        $query = "SELECT * FROM benutzer WHERE benutzername = '".$benutzername."' AND passwort = '".$passwort."';";

        $result = $db->query($query);

        while ($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                $_SESSION['benutzer']['benutzername'] = $row['benutzername'];
                $_SESSION['benutzer']['id'] = $row['id'];
                $_SESSION['login'] = TRUE;

            }
        }
    }

}
?>
