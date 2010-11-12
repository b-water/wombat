<?php

/************************************************************************************************
 * Script Name : Red Wombat
 * Script Author : Nico Schmitz
 * Date : 01.04.2010
 * Copyright : Nico Schmitz 2010, All right reserved!
 ************************************************************************************************/

    // Launching Session
    session_start();

    // prints out all error messages
//    error_reporting(E_ALL);

    // Embedding from Libraries, Classes and other Stuff
    include('library/Smarty/Smarty.class.php');
    include('classes/database.class.php');
    include('classes/user.class.php');
    include('classes/movie.class.php');
    include('config/config.php');
    include('include/functions.php');


    // connect to the database
    $db = Database::getInstance($host, $user, $password, $database);

    // initalize Smarty
    $smarty = new Smarty();

    // checking if the user is loggedin
    if(!isset($user->id))
    {

        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $user = new User();
            $user->login($_REQUEST['username'], $_REQUEST['password']);
        }
    }

    // embedding the script for the acutally website
    if(isset($_REQUEST['menu']) && !empty($_REQUEST['menu']))
    {
        if(file_exists('include/'.$_REQUEST['menu'].'.php'))
        {
            include('include/'.$_REQUEST['menu'].'.php');
        }
        if($_REQUEST['menu'] == 'logout')
        {
            $user = new User();
            $user->logout();
        }
    }

    foreach($config as $key => $value)
    {
        $smarty->assign($key, $config[$key]);
    }

    // define Template file
    if(!isset($_SESSION['user']['loggedin']) || $_SESSION['user']['loggedin'] === false )
    {
        $template = 'login.tpl';
    }
    else
    {
        $template = 'template.tpl';
    }

    // smarty varibales assign
    if(isset($_REQUEST['menu']))
    {
        $smarty->assign('menu', $_REQUEST['menu']);
    }
    $smarty->display($template);

//    echo '<pre style="color:#fff;">';
//    print_r($_SESSION);
//    echo '</pre>';

//    echo '<pre style="color:#fff;">';
//    print_r($_REQUEST);
//    echo '</pre>';

?>
