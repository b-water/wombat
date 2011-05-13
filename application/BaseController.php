<?php

/**
 * Description of BaseController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    BaseController.php
 * @since   13.05.2011 - 23:35:14
 */

abstract class BaseController {

    // The registry, all system objects
    protected $registry;
    // The smarty template object
    protected $smarty;
    // The configuration object
    protected $config;
    // The url parser object
    protected $url;

    function __construct($registry) {

        $this->registry = $registry;
        $this->smarty = $this->registry->get('smarty');
        $this->config = $this->registry->get('config');
        $this->url = $this->registry->get('url');
        $this->init();
    }

    // Custom constructor
    abstract function init();

    // First load Action
    abstract function index();
}

?>
