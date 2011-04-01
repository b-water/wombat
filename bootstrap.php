<?php

/* * **********************************************************************************************
 * @Name RedWombat
 * @Author Nico Schmitz
 * @Date 01.04.2010
 * @Version 0.1
 * @licence : All Right Reserved
 * ********************************************************************************************** */

/* Launching Session */
session_start();

/* fragwürdig */
session_set_cookie_params(7200, '', true);

/* prints out all error messages */
error_reporting(E_ALL);

/* Embedding from libs, classes and some other stuff */
require_once('application/Autoloader.php');
require_once('library/Smarty/Smarty.class.php');
require_once('library/Zend/Db/Adapter/mysqli.php');
//require_once 'Zend/Loader.php';
//require_once('library/Zend/Db.php');
require_once('library/Zend/File/Transfer.php');

/* call the autoloader */
autoloader::init();

/* load the configurations */
$config = Config::getInstance('config.ini');

$params = array(
    'host'      => '127.0.0.1',
    'username'  => 'dbadmin',
    'password'  => '1234',
    'dbname'    => 'redwombat' );

//    $datenbank = Zend_Db::factory('Mysqli', $params);

try {
    
   $db = new Zend_Db_Adapter_Mysqli(array(
    'host'      => '127.0.0.1',
    'username'  => 'dbadmin',
    'password'  => '1234',
    'dbname'    => 'redwombat' ));


} catch (Zend_Db_Exception $dbException) {
    die($dbException);
}

/* initalize Smarty */
$smarty = new Smarty();

// create registry object
$registry = Registry::getInstance();

// parse the url
$url = new Url();

try {
    $url->parse();
} catch (UrlException $urlException) {
    die($urlException);
}

// registers $db and $smarty
$registry->set('db', $db);
$registry->set('smarty', $smarty);
$registry->set('config', $config);
$registry->set('url', $url);

//// fetch all javascript and css files
//$file = File::getInstance();
////$css = $file->fetchDir('css/', 'css');
//$js = $file->fetchDir('js/', 'js');

//$menu = new Menu();

// assign them to smarty
//$smarty->assign('js', $js);
//$smarty->assign('css', $css);
$smarty->assign('file', 'bootstrap.php');
$smarty->assign('maintitle',$config->get('MAINTITLE'));
$smarty->assign('basepath', $config->get('BASE_PATH'));
$smarty->assign('controller',$url->get('controller'));

$router = new Router();

try {
    $router->run();
} catch (RouterException $routerException) {
    die($routerException->getMessage());
}

$db->closeConnection();

/* TODO: Smarty updaten
 * TODO: Exceptions für Error Handling
 */


/* Weiße Print_r ausgabe */
//echo '><pre style="color:#fff;"><h1>Session</h1>';
//print_r($_SESSION);
//echo '<h1>Request</h1>';
//print_r($_REQUEST);
//echo '<h1>Cookie</h1>';
//print_r($_COOKIE);
//echo '</pre>';

/* schwarze Print_r ausgabe */
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';