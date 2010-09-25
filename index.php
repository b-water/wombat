<?php

/************************************************************************************************
 * Script Name : Red Wombat
 * Script Author : Nico Schmitz
 * Date : 01.04.2010
 * Copyright : Nico Schmitz 2010, All right reserved!
 ************************************************************************************************/

    // Launching Session
    session_start();


    // Embedding from Libraries, Classes and other Stuff
    include('libs/Smarty.class.php');
    include('classes/database.php');
    include('classes/user.php');
    include('config/config.php');
    include('php/functions.php');

    // Datenbank Verbindung herstellen
    $db = Database::getInstance($host, $user, $password, $database);

    // Content-Handler
    if(!isset($content))
        $content = Array();
    
    // initalize Smarty
    $smarty = new Smarty();

    // define Template file
    $template = 'template.tpl';

    // checking if the user is loggedin
    if(!isset($user->id))
    {
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $user = new User();
            $user->login($_REQUEST['username'], $_REQUEST['password']);
        }
    }

    // Embedding the script for the acutally website
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
