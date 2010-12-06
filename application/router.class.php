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

    /**
     * 
     */
    public function __construct() {

        $this->action = isset($_GET["action"]) ? strtolower($_GET["action"]) : "index";
        $this->action .= "_Action";
        $this->controller = isset($_GET["controller"]) ? strtolower($_GET["controller"]) : "home";
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