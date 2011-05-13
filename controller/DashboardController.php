<?php

/**
 * Description of DashboardController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    DashboardController.php
 * @since   13.05.2011 - 23:35:14
 */
class DashboardController extends BaseController {


    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        
    }

    public function index() {
        $this->smarty->assign('title', 'Dashboard');
        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }


}

?>
