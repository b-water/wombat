<?php

/************************************************************************************************
 * Skript Name : Red Wombat
 * Skript Author : Nico Schmitz
 * Datum : 01.04.2010
 * Copyright : Nico Schmitz 2010, Alle Rechte vorbehalten!
 ************************************************************************************************/

    // Starten der Session
    session_set_cookie_params('', '', '', TRUE);
    session_start();

    // Einbinden von Bibliotheken, Klassen und Skripten
    require_once('libs/Smarty.class.php');
    require_once('classes/database.php');
    include('php/database.php');
    include('php/anmeldung.php');
    include('config/config.php');
   

    // Datenbank Verbindung herstellen

    $db = Database::getInstance($host, $user, $password);
    $db = Database::select_db($database);
    
    dbconnect($host,$user,$password);
    dbselect($database);

    // Smarty Initalisieren
    $smarty = new Smarty;

    // Template Datei definieren
    $template = 'template.tpl';

    // Überprüfen auf Login, falls nicht wird auf Login umgelenkt
    if(!isset($_SESSION) || empty($_SESSION['login']) || $_SESSION['login'] == 0)
    {

        $_SESSION['login'] = FALSE;
        $benutzer = isset($_POST['benutzer']) ? $_POST['benutzer'] : '';
        $passwort = isset($_POST['passwort']) ? $_POST['passwort'] : '';

        // Einbinden des Skriptes zur Anmeldung
        include('php/anmeldung.php');
    } 
    else
    {
        $_SESSION['login'] = TRUE;
    }



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


    $smarty->assign('session',$_SESSION);
    $smarty->assign('request',$_REQUEST);
    $smarty->assign('lorem',$lorem);
    $smarty->assign('musik',$musik);
    $smarty->assign('menu',$_REQUEST['menu']);
    $smarty->assign('login',$_SESSION['login']);
    $smarty->display($template);

?>
