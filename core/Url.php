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
 * @since   13.05.2011 - 23:35:14
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
class Url {

    /**
     * The Controller file to load
     * @example /controller/Movie/ShowController.php
     * @var string
     */
    private $controller;
    /**
     * The Action to call
     * @var string
     */
    private $action;
    /**
     * @example /movie/show/index/page/
     * @var string
     */
    private $key;
    /**
     * @example /movie/show/index/page/14
     * @var string
     */
    private $value;
    /**
     * The whole Url
     * @example /movie/show/index/page/14
     * @var type string
     */
    private $url;

    /**
     * Get the Rewrite Params an saves
     * them into the Class variables.
     */
    public function parse() {
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $url = explode('/', $_GET['p']);
        }
        $this->controller = isset($url[0]) && !empty($url[0]) ? $url[0] : "dashboard";
        $this->action = isset($url[1]) && !empty($url[1]) ? $url[1] : "index";
        $this->key = isset($url[2]) && !empty($url[2]) ? $url[2] : '';
        $this->value = isset($url[3]) && !empty($url[3]) ? $url[3] : '';
        $this->url = $this->controller.'/'.$this->action.'/';
    }

    /**
     *  Returns the package
     * @return string
     */
    public function getController() {
        return $this->controller;
    }
    
    public function setController($controller) {
        $this->controller = $controller;
    }

    /**
     *  Returns the package
     * @return string
     */
    public function getAction() {
        return $this->action;
    }
    
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     *  Returns the package
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     *  Returns the package
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * The full Url
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

}