<?php

/**
 * Stellt eine Verbindung zu einer MySQL
 * Datenbank her
 *
 * @author  Nico Schmitz
 * @since   22.07.2010 - 21:20 Uhr
 * 
 * @param   string  $host
 * @param   string  $user
 * @param   string  $password 
 */
function dbconnect($host,$user,$password)
{
    $database['connection'] = mysql_connect($host,$user,$password) or die ("Keine Verbindung zum MySQL Server möglich");
    if(isset($_SESSION))
    {
        $_SESSION['database']['connection'] = $database['connection'];
    }
}

/**
 * Selektiert eine ausgewählte Datenbank
 *
 * @author  Nico Schmitz
 * @since   22.07.2010 - 21:20 Uhr
 *
 * @param   array   $database
 */
function dbselect($database)
{
    $database['database'] = mysql_select_db($database) or die ("Keine Verbindung zur Datenbank möglich");
    if(isset($_SESSION))
    {
        $_SESSION['database']['database'] = $database['database'];
    }

}

?>
