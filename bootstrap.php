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

// parse the url
$url = new Url();

try {
    $url->parse();
} catch (Exception $urlException) {
    die($urlException);
}

// registers $db and $smarty
$registry->set('db', $db);
$registry->set('smarty', $smarty);
$registry->set('config', $config);
$registry->set('url', $url);

// fetch all javascript and css files
$file = File::getInstance();
$css = $file->fetchDir('css/', 'css');
$js = $file->fetchDir('js/', 'js');

// assign them to smarty
$smarty->assign('js', $js);
$smarty->assign('css', $css);
$smarty->assign('file', 'bootstrap.php');
$smarty->assign('basepath', $config->get('BASE_PATH'));

// smarty controller assign
if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $smarty->assign('controller', $_GET['controller']);
}

if (isset($_SESSION['system']['security_key']) && !empty($_SESSION['system']['security_key'])) {
    
} else {
    if ($url->get('controller') != 'user' && $url->get('action') != 'signin') {
        header('Location: ' . $config->get('BASE_PATH') . 'user/signin');
    }
}

$router = new Router();

try {
    $router->run();
} catch (Exception $routerException) {
    die($routerException->getMessage());
}


// disconnect db
$db->close();

/* TODO: Smarty updaten
 * TODO: Exceptions für Error Handling
 */


/* Weiße Print_r ausgabe */
echo '><pre style="color:#fff;"><h1>Session</h1>';
print_r($_SESSION);
echo '<h1>Request</h1>';
print_r($_REQUEST);
echo '<h1>Cookie</h1>';
print_r($_COOKIE);
echo '</pre>';

/* schwarze Print_r ausgabe */
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';