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

abstract class Controller {

    /**
     * Smarty Object
     * @var object 
     */
    protected $smarty = null;
    /**
     * Configuration Object
     * @var object 
     */
    protected $config = null;
    /**
     * Url Object
     * @var object
     */
    protected $urlParser = null;
    protected $db = null;

    public function __construct() {

        $this->smarty = Registry::get('smarty');
        $this->config = Config::getInstance();
        $this->urlParser = Registry::get('urlParser');
        $this->db = Registry::get('db');
        $this->init();
    }

    // Custom constructor
    abstract function init();

}
