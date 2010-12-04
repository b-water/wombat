<?php

/* * **********************************************************************************************
 * @Name Red Wombat
 * @Author Nico Schmitz
 * @Date 01.04.2010
 * @Copyright Nico Schmitz 2010, All right reserved!
 * @Version 0.1
 * ********************************************************************************************** */

// Launching Session
session_start();

// prints out all error messages
error_reporting(E_ALL);

// define the constants
define('application_path', 'application/');
define('include_path', 'include/');
define('template_path', 'templates/');
define('library_path', 'library/');

// database configuration
$host = 'localhost';        // Host oder IP-Adresse
$user = 'dbadmin';          // Datenbank User
$password = '1234';         // Passwort für den User
$database = 'redwombat';    // Datenbank

// Embedding from Libraries, Classes and other Stuff
require_once(application_path . 'autoloader.class.php');
require_once(library_path . 'Smarty/Smarty.class.php');
include_once(include_path . 'functions.php');

// connect to the database
$db = Database::getInstance($host, $user, $password, $database);

// initalize Smarty
$smarty = new Smarty();

// create registry object
$registry = Registry::getInstance();

// registers $db and $smarty
$registry->set('db', $db);
$registry->set('smarty', $smarty);

// checking if the user is loggedin
if (!isset($user->id)) {

    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        $user = new User();
        $user->login($_REQUEST['username'], $_REQUEST['password']);
    }
}

// embedding the script for the acutally website
if (isset($_REQUEST['menu']) && !empty($_REQUEST['menu'])) {
    if (file_exists('include/' . $_REQUEST['menu'] . '.php')) {
        include('include/' . $_REQUEST['menu'] . '.php');
    }
    if ($_REQUEST['menu'] == 'logout') {
        $user = new User();
        $user->logout();
    }
}
//
// define Template file
if (!isset($_SESSION['user']['loggedin']) || $_SESSION['user']['loggedin'] === false) {
    $template = 'login.tpl';
} else {
    $template = 'template.tpl';
}


// fetch all javascript and css files
$js = fetchFiles('js/');
$css = fetchFiles('css/');

// assign them to smarty
$smarty->assign('js', $js);
$smarty->assign('css', $css);

// smarty controller assign
if(isset($_GET['controller']) && !empty($_GET['controller']))
{
    $smarty->assign('controller',$_GET['controller']);
}


$frontController = new FrontController();

try {

    $frontController->run();

} catch (Exception $error) {

    echo $error->getMessage();
}

$smarty->display($template);


/* TODO: Smarty updaten
 */

//    echo '<pre>';
//    print_r($frontController);
//    echo '</pre>';
//    echo '<pre style="color:#fff;">';
//    print_r($_SESSION);
//    echo '</pre>';
//    echo '<pre style="color:#fff;">';
//    print_r($_REQUEST);
//    echo '</pre>';
