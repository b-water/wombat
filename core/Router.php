<?php

/**
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
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * Description of Router
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Router.php
 * @since   13.05.2011 - 23:35:14
 */
require_once('RouterException.php');

class Router {

    /**
     * The Method to Call
     * @var string 
     */
    private $action;
    /**
     * The Controller to call in 
     * the Directory controller/
     * @var string 
     */
    private $controller;
    /**
     * Url Object
     * @var string
     */
    private $url;

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
        $this->url = Registry::get('url');
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
            require_once($controllerpath);
            if (!class_exists($this->controller)) {
                throw new RouterException("(#1) : Controller not found!");
            }

            $controller = new $this->controller();
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