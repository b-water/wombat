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

if (isset($benutzer) && isset($passwort))
{
    $sql = "SELECT * FROM benutzer WHERE BENUTZER = '".$benutzer."' AND PASSWORT = '".$passwort."';";
    $query = mysql_query($sql);
    while ($row = mysql_fetch_assoc($query))
    {
        if(!empty($row))
        {
            if($row['BENUTZER'] == $benutzer && $row['PASSWORT'] == $passwort)
            {
                $_SESSION['login'] = TRUE;
                $_SESSION['user']['name'] = $row['BENUTZER'];
                $_SESSION['user']['id'] = $row['ID'];
            }
        }
    }
}


?>
