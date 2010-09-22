<?php

/************************************************************************************************
 * Skript Name : Red Wombat
 * Skript Author : Nico Schmitz
 * Datum : 01.04.2010
 * Copyright : Nico Schmitz 2010, Alle Rechte vorbehalten!
 ************************************************************************************************/

    // Starten der Session
    session_start();


    // Einbinden von Bibliotheken, Klassen und Skripten
    require_once('libs/Smarty.class.php');
    require_once('classes/database.php');
    include('classes/benutzer.php');
    include('config/config.php');
    include('php/funktionen.php');

    // Datenbank Verbindung herstellen
    $db = Database::getInstance($host, $user, $password);
    $db->select_db($database);

    // Einbinden des Login Skriptes

    // Smarty Initalisieren
    $smarty = new Smarty;

    // Template Datei definieren
    $template = 'template.tpl';

    // Überprüfen auf Login, falls nicht wird das Login Skript eingebunden
    if(!isset($_SESSION['benutzer']['id']))
    {
        if(isset($_REQUEST['benutzername']) && isset($_REQUEST['benutzername']))
        {
            $benutzer = new benutzer();
            $benutzer->anmelden($_REQUEST['benutzername'], $_REQUEST['passwort']);
        }
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
        if($_REQUEST['menu'] == 'abmelden')
        {
            $benutzer = new benutzer();
            $benutzer->abmelden();
        }
    }

//    echo '<pre>';
//    print_r($_SESSION);
//    echo '</pre>';
//
//
//    echo '<pre>';
//    print_r($_REQUEST);
//    echo '</pre>';

    // Smarty Variablen Assign
    $smarty->assign('musik',$musik);
    $smarty->assign('anmeldung',$_SESSION['benutzer']['angemeldet']);
    $smarty->display($template);

?>
