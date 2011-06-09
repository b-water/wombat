<?php

/**
 * Description of Bootstrap

 *  * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Bootstrap.php
 * @since   03.06.2011 - 23:58:40
 */
class Bootstrap {

//    public static $registry = null;
    public static $config = null;
    public static $url = null;
    public static $db = null;
    public static $smarty = null;

    public static function run() {
        self::prepare();
    }

    public static function prepare() {
        // include needed files
        require_once('library/Zend/File/Transfer.php');
        self::setupErrorReporting();
        self::setupAutoloader();
        self::setupConfiguration();
        self::setupDatabase();
        self::setupSmarty();
        self::setupUrlParser();
        self::setRegistryObjects();
        self::setupNavigation();
        self::assignSmartyVariables();
        self::setupRouter();
        self::closeDatabaseConnection();
    }

    public static function setupAutoloader() {
        /* call the autoloader */
        require_once('core/Autoloader.php');
        Autoloader::init();
    }

    //Error reporting setting
    public static function setupErrorReporting() {
        /* prints out all error messages */
        error_reporting(E_ALL);
        self::$smarty->error_reporting = 'E_ALL';
    }

    //Date time setting will be done here
    public static function setupDateTime() {
        date_default_timezone_set('Europe/Berlin');
    }

    public static function setupSession() {
        /* Launching Session */
        session_start();
        session_set_cookie_params(7200, '', true);
    }

    //Configuration file reading & setting up configuration will be done using following.
    public function setupConfiguration() {
        /* load the configurations */
        Config::$file = 'config.ini';
        self::$config = Config::getInstance('config.ini');
    }

    // Template Engine setting will be done here
    public static function setupSmarty() {
        /* initalize Smarty */
        require_once('library/Smarty/Smarty.class.php');
        self::$smarty = new Smarty();
    }

    // Databse Setup done here
    public static function setupDatabase() {

        // include zend db pdo
        require_once('library/Zend/Db/Adapter/Pdo/Mysql.php');

        try {
            self::$db = new Zend_Db_Adapter_Pdo_Mysql(array(
                        'host' => self::$config->get('database.params.host'),
                        'username' => self::$config->get('database.params.user'),
                        'password' => self::$config->get('database.params.password'),
                        'charset' => self::$config->get('database.params.charset'),
                        'dbname' => self::$config->get('database.params.database')));
        } catch (Zend_Db_Exception $dbException) {
            die($dbException);
        }
    }

    // Url Parset setup will be done here
    public static function setupUrlParser() {
        // parse the url
        self::$url = new Url();

        try {
            self::$url->parse();
        } catch (UrlException $urlException) {
            die($urlException);
        }
    }

    // navigation setup will be done here
    public static function setupNavigation() {
        $navi = new Navigation();
        $data = $navi->fetch();
        $navi->create($data);
    }

    // registry objects will be set here
    public static function setRegistryObjects() {
        // registers $db and $smarty
        Registry::set('db', self::$db);
        Registry::set('smarty', self::$smarty);
        Registry::set('url', self::$url);
    }

    // smarty variables will be assigned here
    public static function assignSmartyVariables() {
        // assign them to smarty
        self::$smarty->assign('file', 'bootstrap.php');
        self::$smarty->assign('maintitle', self::$config->get('html.title'));
        self::$smarty->assign('author', self::$config->get('html.author'));
        self::$smarty->assign('copyright', self::$config->get('html.copyright'));
        self::$smarty->assign('basepath', self::$config->get('path.base'));
        self::$smarty->assign('controller', self::$url->get('controller'));
    }

    // router setup will be done here
    public static function setupRouter() {
        $router = new Router();

        try {
            $router->run();
        } catch (RouterException $routerException) {
            die($routerException->getMessage());
        }
    }

    // databse connection will be closed here
    public static function closeDatabaseConnection() {
        self::$db->closeConnection();
    }

}

