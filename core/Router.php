<?php

/**
 * Description of Router
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Router.php
 * @since   13.05.2011 - 23:35:14
 */
class Router {

    private $action;
    private $controller;
    private $registry;
    private $url = array();

    /**
     * Loads the URL values from the
     * registry and generates the Action
     * and the Controller
     *
     * $this->action = method to start
     * $this->controller = Controller to be load
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
     * Starts the Controller with the method
     * from the Action.
     *
     */
    public function run() {

        $controllerpath = "controller/" . $this->controller . ".php";
        
        if (file_exists($controllerpath)) {
            require($controllerpath);
            if (!class_exists($this->controller)) {
                throw new RouterException("(#1) : Controller not found!");
            }

            $controller = new $this->controller(Registry::getInstance());
            if (in_array($this->action, get_class_methods($controller))) {
                $controller->{$this->action}();
            } else {
                throw new RouterException("(#2) : Action not found!");
            }
        } else {
            throw new RouterException("(#3) : Controller not found!");
        }
    }

}

?>