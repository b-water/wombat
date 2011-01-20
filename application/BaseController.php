<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of maincontroller
 *
 * @author nico
 */
abstract class BaseController {
    //put your code here
    protected $registry;
    protected $smarty;
    protected $config;
    protected $url;

    function __construct ($registry) {
        $this->registry = $registry;
        $this->smarty = $this->registry->get('smarty');
        $this->config = $this->registry->get('config');
        $this->url = $this->registry->get('url');
        $this->init();
    }

    abstract function init();
    abstract function index();
}
?>
