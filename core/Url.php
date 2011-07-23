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
 * Description of Url
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Url.php
 * @since   13.05.2011 - 23:35:14
 */

class Url {

    // URL elements
    private $options = array();
    
    public function __construct(){
        
    }

    /**
     * Parses the /rt/ values of mod_rewrite
     */
    public function parse() {
        if (isset($_GET['rt']) && !empty($_GET['rt'])) {
            $url = explode('/', $_GET['rt']);
        }
        $this->options['controller'] = isset($url[0]) && !empty($url[0]) ? $url[0] : "dashboard";
        $this->options['action'] = isset($url[1]) && !empty($url[1]) ? $url[1] : "index";
        $this->options['key'] = isset($url[2]) && !empty($url[2]) ? $url[2] : '';
        $this->options['value'] = isset($url[3]) && !empty($url[2]) ? $url[3] : '';
    }

    /**
     * Delivers a Url value
     *
     * @param   string $key
     * @return  string $this->options;
     */
    public function get($key) {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        } else {
            return false;
        }
    }

}