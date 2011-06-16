<?php

/**
 * Description of BaseController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    BaseController.php
 * @since   13.05.2011 - 23:35:14
 */

abstract class Controller {

    // The smarty template object
    protected $smarty;
    // The configuration object
    protected $config;
    // The url parser object
    protected $url;

    function __construct() {

        $this->smarty = Registry::get('smarty');
        $this->config = Config::getInstance();
        $this->url = Registry::get('url');
        $this->init();
    }

    // Custom constructor
    abstract function init();

    // First load Action
    abstract function index();
}

?>
