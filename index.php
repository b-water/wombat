<?php

/************************************************************************************************
 * Skript Name : Red Wombat
 * Skript Author : Nico Schmitz
 * Datum : 01.04.2010
 * Copyright : Nico Schmitz 2010, Alle Rechte vorbehalten!
 ************************************************************************************************/

    // Starten der Session falls noch nicht geschehen
    if(!isset($_SESSION))
    {
        session_set_cookie_params('', '', '', TRUE);
        session_start();
    }

    // Einbinden von Bibliotheken, Klassen und Skripten
    require_once('libs/Smarty.class.php');
    require_once('classes/database.php');
    include('php/anmeldung.php');
    include('config/config.php');
   

    // Datenbank Verbindung herstellen
    $db = Database::getInstance($host, $user, $password);
    $db->select_db($database);

    // Smarty Initalisieren
    $smarty = new Smarty;

    // Template Datei definieren
    $template = 'template.tpl';

    // Überprüfen auf Login, falls nicht wird auf Login umgelenkt
    if(empty($_SESSION['login']))
    {
        $_SESSION['login'] = TRUE;

        // Einbinden des Skriptes zur Anmeldung
        include('php/anmeldung.php');
    }

    // Einbinden des Skriptes für die aktuelle Webseite
    if(isset($_REQUEST['menu']) && !empty($_REQUEST['menu']))
    {
        $registrieren = FALSE;

        if(file_exists('php/'.$_REQUEST['menu'].'.php'))
        {
            include('php/'.$_REQUEST['menu'].'.php');
        }
        if($_REQUEST['menu'] == 'registrieren')
        {
            $registrieren = TRUE;
            $smarty->assign('registrieren',$registrieren);  
        }
    }

    // Smarty Variables Assign
    $smarty->assign('musik',$musik);
    $smarty->assign('anmeldung',$_SESSION['login']);
    $smarty->display($template);

?>
