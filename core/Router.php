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
     * The Package
     * @var string
     */
    private $package = null;
    /**
     * The Method to Call
     * @var string 
     */
    private $action = null;
    /**
     * The Controller to call in 
     * the Directory controller/
     * @var string 
     */
    private $controller = null;
    /**
     * Url Object
     * @var string
     */
    private $urlParser = null;
    /**
     * The Path to the Controller Class
     * @var string
     */
    private $controllerpath = null;
    /**
     * The real Class name
     * @var string
     */
    private $classname = null;

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
        $this->urlParser = Registry::get('urlParser');
        $this->action = $this->urlParser->getAction();
        $this->package = ucfirst($this->urlParser->getPackage());
        $this->controller = ucfirst($this->urlParser->getController());
        $this->controllerpath = 'controller/' . $this->package . '/' . $this->controller . '.php';
        $this->classname = $this->package . $this->controller . 'Controller';
    }

    /**
     * Starts the Controller with the method
     * from the Action.
     *
     */
    public function run() {

        if (file_exists($this->controllerpath)) {
            require_once($this->controllerpath);
            if (!class_exists($this->classname)) {
                throw new RouterException('System Error : Controller or Package not found!');
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