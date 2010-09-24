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
    include('classes/user.php');
    include('config/config.php');
    include('php/functions.php');

    // Datenbank Verbindung herstellen
    $db = Database::getInstance($host, $user, $password, $database);

    // Content-Handler
    if(!isset($content))
        $content = Array();
    
    // Smarty Initalisieren
    if(!isset($smarty))
        $smarty = new Smarty();

    // Template Datei definieren
    $template = 'template.tpl';

    // Überprüfen auf Login, falls nicht wird das Login Skript eingebunden
    if(!isset($user->id))
    {
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $user = new User();
            $user->login($_REQUEST['username'], $_REQUEST['password']);
        }
    }

    // Einbinden des Skriptes für die aktuelle Webseite
    if(isset($_REQUEST['menu']) && !empty($_REQUEST['menu']))
    {
        $register = false;

        if(file_exists('php/'.$_REQUEST['menu'].'.php'))
        {
            include('php/'.$_REQUEST['menu'].'.php');
        }
        if($_REQUEST['menu'] == 'register')
        {
            $register = true;
            $smarty->assign('register',$register);
            $user = new User();
            $user->register($_REQUEST);
        }
        if($_REQUEST['menu'] == 'logout')
        {
            $user = new User();
            $user->logout();
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
    $smarty->assign('loggedin',$_SESSION['user']['loggedin']);
    $smarty->display($template);

?>
