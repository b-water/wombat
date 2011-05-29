<?php

/* * **********************************************************************************************
 * @Name wombat
 * @Author Nico Schmitz
 * @Date 01.04.2010
 * @Version 0.1
 * @licence : All Right Reserved
******************************************************************************************* */

/* Launching Session */
session_start();

session_set_cookie_params(7200, '', true);

/* prints out all error messages */
error_reporting(E_ALL);

/* Embedding from libs, classes and some other stuff */
require_once('core/Autoloader.php');
require_once('library/Smarty/Smarty.class.php');
require_once('library/Zend/Db/Adapter/Pdo/Mysql.php');
require_once('library/Zend/File/Transfer.php');

/* call the autoloader */
Autoloader::init();

/* load the configurations */
$config = Config::getInstance('config.ini');

try {
   $db = new Zend_Db_Adapter_Pdo_Mysql(array(
    'host'      => $config->get('HOST'),
    'username'  => $config->get('USER'),
    'password'  => $config->get('PASSWORD'),
    'charset'   => 'utf8',
    'dbname'    => $config->get('DATABASE') ));
} catch (Zend_Db_Exception $dbException) {
    die($dbException);
}

/* initalize Smarty */
$smarty = new Smarty();
$smarty->error_reporting = 'E_ALL & ~E_NOTICE';

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

$navi = new Navigation();
$data = $navi->fetch();
$navi->create($data);

// assign them to smarty
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
