<?php

/* * **********************************************************************************************
 * @Name Red Wombat
 * @Author Nico Schmitz
 * @Date 01.04.2010
 * @Version 0.1
 * @licence : licence.txt
 * ********************************************************************************************** */

/* Launching Session */
session_start();

/* prints out all error messages */
error_reporting(E_ALL);

/* embedding the autoloader */
require_once('application/autoloader.class.php');

/* load the configurations */
$config = Config::getInstance();
$config->read('config.ini');

/* define the constants */
define('APPLICATION_PATH', $config->get('APPLICATION_PATH'));
define('INCLUDE_PATH', $config->get('INCLUDE_PATH'));
define('TEMPLATE_PATH', $config->get('TEMPLATE_PATH'));
define('LIBRARY_PATH', $config->get('LIBRARY_PATH'));
define('TEMPLATE_FILE', $config->get('TEMPLATE_FILE'));

/* Embedding from libs, classes and some other stuff */
require_once(LIBRARY_PATH . 'Smarty/Smarty.class.php');
include_once(INCLUDE_PATH . 'functions.php');


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
$js = fetchFiles('js/');
$css = fetchFiles('css/');

// assign them to smarty
$smarty->assign('js', $js);
$smarty->assign('css', $css);

// smarty controller assign
if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $smarty->assign('controller', $_GET['controller']);
}

$router = new Router();

try {

    $router->run();
} catch (Exception $error) {

    echo $error->getMessage();
}



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
