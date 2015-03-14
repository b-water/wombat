<?php

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
        $this->url = $this->controller . '/' . $this->action . '/';
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
     * The full Url
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }
}
