<?php

class Bootstrap {

    /**
     * Configuration Object
     * @var type object 
     */
    public static $config;

    /**
     * Url Object
     * @var type object
     */
    public static $url;

    /**
     * Database Object
     * @var type object
     */
    public static $db;

    /**
     * View Object
     * @var type object
     */
    public static $view;

    /**
     * Authentication Object
     * @var type object
     */
    public static $auth;

    /**
     * Runs the Application
     */
    public static function run() {
        self::prepare();
    }

    /**
     * Prepares the System
     */
    public static function prepare() {
        self::setupSession();
        self::setupConfiguration();
        self::setupErrorReporting();
        self::setupDatabase();
        self::setupUrl();
        self::setupView();
        self::setRegistryObjects();
        self::setupAuth();
        self::setupRouter();
        self::closeDatabaseConnection();
    }

    /**
     * Error Reporting
     * Print out all Error Messages
     */
    public static function setupErrorReporting() {
        ini_set('display_errors',(int) self::$config->get('generic.display_errors'));
        error_reporting(E_ALL);
    }

    /**
     * Date Time Settings
     * set to Europe Berlin
     */
    public static function setupDateTime() {
        date_default_timezone_set('Europe/Berlin');
    }

    /**
     * Start and configure Session
     */
    public static function setupSession() {
        session_start();
        session_set_cookie_params(7200, '', true);
    }

    /**
     * Configuration
     */
    public static function setupConfiguration() {
        require_once('core/Config.php');
        self::$config = Config::getInstance('config.ini');
    }

    public static function setupView() {
        require_once('library/Zend/View.php');
        self::$view = new Zend_View(array('basePath' => 'public', 'scriptPath' => 'public/view/'));
        self::$view->url = self::$url;
        self::$view->title = self::$config->get('page.title');
        self::$view->author = self::$config->get('page.author');
        self::$view->copyright = self::$config->get('page.copyright');
        self::$view->base = self::$config->get('path.base');
    }

    /**
     * Database
     */
    public static function setupDatabase() {

        $include_path = $_SERVER['DOCUMENT_ROOT'] . '/wombat/library/';
        set_include_path($include_path . PATH_SEPARATOR . get_include_path());

        require_once('library/Zend/Db.php');
        require_once('library/Zend/Loader.php');
        
//        var_dump(self::$config->get('database.adapter'));die;
        
        try {
            self::$db = Zend_Db::factory("Pdo_Mysql", array(
                        'host' => self::$config->get('database.host'),
                        'username' => self::$config->get('database.user'),
                        'password' => self::$config->get('database.password'),
                        'charset' => 'utf8',
                        'dbname' => self::$config->get('database.dbname'),
                        'profiler' => (bool) self::$config->get('database.profiler')
                    ));
        } catch (Zend_Db_Exception $dbException) {
            die($dbException);
        }
    }

    /**
     * Url Parser
     */
    public static function setupUrl() {
        require_once('core/Url.php');
        self::$url = new Url();
        try {
            self::$url->parse();
        } catch (UrlException $urlException) {
            die($urlException->getMessage());
        }
    }

    public static function setupAuth() {
        require_once('core/Auth.php');
        self::$auth = new Auth();
        Registry::set('auth', self::$auth);
        if (self::$auth->requiresAccess(self::$url->getController(), self::$url->getAction())) {
            if (!self::$auth->isLoggedIn()) {
                self::$url->setController('user');
                self::$url->setAction('login');
            }
        }
    }

    /**
     * Registry
     */
    public static function setRegistryObjects() {
        require_once('core/Registry.php');
        Registry::set('db', self::$db);
        Registry::set('view', self::$view);
        Registry::set('url', self::$url);
    }

    /**
     * Router
     */
    public static function setupRouter() {
        require_once('core/Router.php');
        $router = new Router();
        try {
            $router->run();
        } catch (RouterException $routerException) {
            print_r($routerException->getMessage());
            print_r($routerException->getTraceAsString());
//            ExceptionHandler::display($routerException);
        }
    }

    /**
     * Close Database Connection
     */
    public static function closeDatabaseConnection() {
        self::$db->closeConnection();
    }

}
