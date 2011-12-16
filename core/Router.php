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
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
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
     * The Path to the Controller Class
     * @var string
     */
    private $controllerpath;

    /**
     * The real Class name
     * @var string
     */
    private $classname;

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
        $this->action = $this->url->getAction();
        $this->controller = ucfirst($this->url->getController());
        $this->controllerpath = 'controller/' . $this->controller . '.php';
        $this->classname =$this->controller . 'Controller';
    }

    /**
     * Starts the Controller with the method
     * from the Action.
     * @throws RouterException
     */
    public function run() {
        if (file_exists($this->controllerpath)) {
            require_once($this->controllerpath);
            if (!class_exists($this->classname)) {
                throw new RouterException('(#1) : Controller or Package not found!');
            }

            $controller = new $this->classname();
            if (in_array($this->action, get_class_methods($controller))) {
                $controller->{$this->action}();
            } else {
                throw new RouterException('(#2) : Action not found!');
            }
        } else {
            throw new RouterException('(#3) : Controller not found!');
        }
    }

}