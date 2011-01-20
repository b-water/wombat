<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author nico
 */
class Router {

    private $action;
    private $controller;
    private $registry;
    private $url = array();

    /**
     * 
     */
    public function __construct() {

        $this->registry = Registry::getInstance();
        $this->url = $this->registry->get('url');

        $this->action = $this->url->get('action');
        $this->controller = ucfirst($this->url->get('controller'));
        $this->controller .= 'Controller';

    }

    /**
     *
     */
    public function run() {

        $controllerpath = "controller/" . $this->controller . ".php";

        /* you do not have a chance to escape */
        
        if (file_exists($controllerpath)) {
            require($controllerpath);
            if (!class_exists($this->controller)) {
                throw new RouterException("Controller not found! (1)");
            }

            $controller = new $this->controller(Registry::getInstance());
            if (in_array($this->action, get_class_methods($controller))) {
                $controller->{$this->action}();
            } else {
                throw new RouterException("Action not found!");
            }
        } else {
            throw new RouterException("Controller not found! (2)");
        }
    }

}