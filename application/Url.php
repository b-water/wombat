<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Url
 *
 * @author nico
 */
class Url {

    private $options = array();

    public function __construct() {
        
    }

    public function parse() {
        if (isset($_GET['rt']) && !empty($_GET['rt'])) {
            $url = explode('/', $_GET['rt']);
        } 
        $this->options['controller'] = isset($url[0]) && !empty($url[0]) ? $url[0] : "home";
        $this->options['action'] = isset($url[1]) && !empty($url[1]) ? $url[1] : "index";
        $this->options['id'] = isset($url[2]) && !empty($url[2]) ? $url[2] : '';
    }

    public function get($key) {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        } else {
            return false;
        }
    }

}

?>
