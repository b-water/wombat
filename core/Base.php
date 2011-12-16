<?php

/**
 * @name Kitchenhopper
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 26.08.2011
 */
abstract class Base {
    
    protected $view;
    protected $config;
    protected $url;
    protected $db;
    
    public function __construct() {
        $this->view = Registry::get('view');
        $this->config = Config::getInstance();
        $this->url = Registry::get('url');
        $this->db = Registry::get('db');
    }
}
