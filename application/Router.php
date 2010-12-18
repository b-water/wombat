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
    private $url;

    /**
     * 
     */
    public function __construct() {

        $this->registry = Registry::getInstance();
        $this->url = $this->registry->get('url');

        $this->action = $this->url->get('action');
        $this->action .= "Action";
        $this->controller = $this->url->get('controller');
        $this->controller .= 'Controller';

    }

    /**
     *
     */
    public function run() {

        $controllerpath = "controller/" . $this->controller . ".php";

        if (file_exists($controllerpath)) {
            require($controllerpath);
            if (!class_exists($this->controller)) {
                throw new Exception("Controller not found! (1)");
            }

            $controller = new $this->controller(Registry::getInstance());
            if (in_array($this->action, get_class_methods($controller))) {
                $controller->{$this->action}();
            } else {
                throw new Exception("Action not found!");
            }
        } else {
            throw new Exception("Controller not found! (2)");
        }
    }

}