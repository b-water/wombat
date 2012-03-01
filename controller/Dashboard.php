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
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

require_once('core/Controller.php');
class DashboardController extends Controller {

    private $template_dir = 'dashboard/';
    private $layout;
    
    public function __construct() {
        parent::__construct();
    }

    public function init() {
        $this->template = $this->config->get('template.mainfile');
    }

    public function index() {
//        $this->smarty->assign('title', 'Dashboard');
//
//        $content = $this->smarty->fetch($this->template_dir . 'index.tpl');
//        $this->smarty->assign('content', $content);
//        $this->smarty->display($this->template);
        echo 'test';
        echo $this->view->render('frame.phtml');
    }


}

