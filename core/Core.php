<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core
 * Wrapper for the Core Classes Registry, Config, Smarty, Url
 * and Database.
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Core.php
 * @since   03.06.2011 - 23:58:40
 */
abstract class Core {

    // The registry, all system objects
    protected $registry;
    // The smarty template object
    protected $smarty;
    // The configuration object
    protected $config;
    // The url parser object
    protected $url;
    // The database object
    protected $db;

    /**
     * Fetches the Core Objects from the
     * Registry
     */
    public function __construct() {
        $this->registry = Registry::getInstance();
        if (!is_object($this->registry)) {
            throw new CoreException('(#1) : Registry not found!');
        }
        $this->smarty = $this->registry->get('smarty');
        $this->config = $this->registry->get('config');
        $this->url = $this->registry->get('url');
        $this->db = $this->registry->get('db');
        $this->init();
    }

    // Custom constructor
    abstract public function init();
}

?>
