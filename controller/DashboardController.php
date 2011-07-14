<?php

/**
 * Description of DashboardController
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    DashboardController.php
 * @since   13.05.2011 - 23:35:14
 */
require_once('core/Controller.php');

class DashboardController extends Controller {

    private $template_dir = 'dashboard/';
    private $template;
    
    public function __construct() {
        parent::__construct();
    }

    public function init() {
        $this->template = $this->config->get('template.mainfile');
    }

    public function index() {
        $this->smarty->assign('title', 'Dashboard');

        $content = $this->smarty->fetch($this->template_dir . 'overview.tpl');
        $this->smarty->assign('content', $content);
        $this->smarty->display($this->template);
    }


}

?>
