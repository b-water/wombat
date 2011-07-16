<?php

/* *
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Bootstrap.php
 * @since   03.06.2011 - 23:58:40
 */
class Bootstrap {

    /**
     * Configuration Object
     * @var type object 
     */
    public static $config = null;
    /**
     * Url Object
     * @var type object
     */
    public static $url = null;
    /**
     * Database Object
     * @var type object
     */
    public static $db = null;
    /**
     * Smarty Object
     * @var type object
     */
    public static $smarty = null;

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
        self::setupConfiguration();
        require_once('library/Zend/File/Transfer.php');
        self::setupErrorReporting();
        self::setupDatabase();
        self::setupSmarty();
        self::setupUrlParser();
        self::setRegistryObjects();
        self::setupNavigation();
        self::assignSmartyVariables();
        self::setupRouter();
        self::closeDatabaseConnection();
    }

    /**
     * Error Reporting
     * Print out all Error Messages
     */
    public static function setupErrorReporting() {
        error_reporting(E_ALL);
        self::$smarty->error_reporting = E_ALL;
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
    public function setupConfiguration() {
        require_once('core/Config.php');
//        Config::$file = 'config.ini';
        self::$config = Config::getInstance('config.ini');
    }

    /**
     * Smarty
     */
    public static function setupSmarty() {
        require_once('library/Smarty/Smarty.class.php');
        self::$smarty = new Smarty();
    }

    /**
     * Database
     */
    public static function setupDatabase() {

        require_once('library/Zend/Db/Adapter/Pdo/Mysql.php');

        $params = array(
            'host' => self::$config->get('database.params.host'),
            'username' => self::$config->get('database.params.user'),
            'password' => self::$config->get('database.params.password'),
            'charset' => self::$config->get('database.params.charset'),
            'dbname' => self::$config->get('database.params.database'));

        try {
            self::$db = new \Zend_Db_Adapter_Pdo_Mysql($params);
        } catch (Zend_Db_Exception $dbException) {
            die($dbException);
        }
    }

    /**
     * Url Parser
     */
    public static function setupUrlParser() {
        // parse the url
        require_once('core/Url.php');
        self::$url = new Url();

        try {
            self::$url->parse();
        } catch (UrlException $urlException) {
            die($urlException);
        }
    }

    // navigation setup will be done here
    public static function setupNavigation() {
        require_once('core/Navigation.php');
        $navi = new Navigation();
        $data = $navi->fetch();
        $navi->create($data);
    }

    // registry objects will be set here
    public static function setRegistryObjects() {
        // registers $db and $smarty
        require_once('core/Registry.php');
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
        require_once('core/Router.php');
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

