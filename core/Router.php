<?php

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
        $this->classname = $this->controller . 'Controller';
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
                throw new RouterException('Controller Class "'.$this->classname.'" not found!');
            }

            $controller = new $this->classname();
            if (in_array($this->action, get_class_methods($controller))) {
                $controller->{$this->action}();
            } else {
                throw new RouterException('Action "'.$this->action.'" not found!');
            }
        } else {
            throw new RouterException('Controller File "'.$this->controllerpath.'" not found!');
        }
    }

}
