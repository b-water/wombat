<?php

/* * **********************************************************************************************
 * @Name Mana
 * @Author Nico Schmitz
 * @Date 01.04.2010
 * @Version 0.1
 * @licence : All Right Reserved
 * ********************************************************************************************** */

/* Launching Session */
session_start();

/* prints out all error messages */
error_reporting(E_ALL);

/* Embedding from libs, classes and some other stuff */
require_once('application/Autoloader.php');
require_once('library/Smarty/Smarty.class.php');

/* call the autoloader */
autoloader::init();

/* load the configurations */
$config = Config::getInstance('config.ini');

/* connect to the database */
$db = Database::getInstance($config->get('HOST'), $config->get('USER'),
                $config->get('PASSWORD'), $config->get('DATABASE'));

/* initalize Smarty */
$smarty = new Smarty();

// create registry object
$registry = Registry::getInstance();

// registers $db and $smarty
$registry->set('db', $db);
$registry->set('smarty', $smarty);
$registry->set('config', $config);

// checking if the user is loggedin
//if (!isset($user->id)) {
//
//    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
//        $user = new User();
//        $user->login($_REQUEST['username'], $_REQUEST['password']);
//    }
//}

//// embedding the script for the acutally website
//if (isset($_REQUEST['menu']) && !empty($_REQUEST['menu'])) {
//    if (file_exists('include/' . $_REQUEST['menu'] . '.php')) {
//        include('include/' . $_REQUEST['menu'] . '.php');
//    }
//    if ($_REQUEST['menu'] == 'logout') {
//        $user = new User();
//        $user->logout();
//    }
//}

//// define Template file
//if (!isset($_SESSION['user']['loggedin']) || $_SESSION['user']['loggedin'] === false) {
//    $template = 'login.tpl';
//} else {
//    $template = 'template.tpl';
//}

// fetch all javascript and css files
$file = new File();
$css = $file->fetchFromDir('css/');
$js = $file->fetchFromDir('js/');

// assign them to smarty
$smarty->assign('js', $js);
$smarty->assign('css', $css);
$smarty->assign('file','bootstrap.php');

// smarty controller assign
if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $smarty->assign('controller', $_GET['controller']);
}

$router = new Router();

try {

    $router->run();
} catch (Exception $error) {

    die($error->getMessage());
}



/* TODO: Smarty updaten
 * TODO: Exceptions für Error Handling
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
