<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author nico
 */
Class homeController {

    //put your code here

    private $smarty;
    private $registry;

    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->smarty = $this->registry->get('smarty');
    }

    public function index_Action() {
        $this->smarty->assign('title', 'Startseite');
        $this->smarty->display(TEMPLATE_FILE);
    }

}

?>