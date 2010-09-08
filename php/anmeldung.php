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

    if (!isset($_REQUEST['menu']) || empty($_REQUEST['menu']))
    {
        $query = "SELECT * FROM benutzer WHERE benutzername = '".$_POST['benutzername']."' AND passwort = '".$_POST['passwort']."';";

        $result = $db->query($query);

        while ($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                session_regenerate_id();
                $_SESSION['benutzer']['benutzername'] = $row['benutzername'];
                $_SESSION['benutzer']['id'] = $row['id'];
                $_SESSION['benutzer']['angemeldet'] = TRUE;

            }
        }
    }


?>
