<?php

/**
 * Überprüft ob Benutzer angemeldet ist,
 * wenn nicht wird der Benutzer eingeloggt.
 * 
 * @author  Nico Schmitz
 * @since   19.07.2010 - 22:33 Uhr
 *
 * @param   string  $benutzer
 * @param   string  $passwort
 */

if (isset($_POST['benutzername']) && isset($_POST['passwort']))
{
    $query = "SELECT * FROM benutzer WHERE benutzername = '".$_POST['benutzername']."' AND passwort = '".$_POST['passwort']."';";

    $result = $db->query($query);


    echo 'test';
    $sql = $result->fetch_assoc();

    echo '<pre>';
    print_r($sql);
    echo '</pre>';

    

    while ($row = $result->fetch_assoc())
    {
        echo 'FUUUUCKKK OFFFFF!';
        if(!empty($row))
        {
            if($row['benutzername'] == $benutzer && $row['passwort'] == $passwort)
            {
                $_SESSION['benutzer']['benutzername'] = $row['benutzername'];
                $_SESSION['benutzer']['id'] = $row['id'];
                unset($_SESSION['login']);
            }
        }
    }

}


?>
