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
 * Description of DashboardController
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    DashboardController.php
 * @since   13.05.2011 - 23:35:14
 */
require_once('core/Controller.php');
class DashboardAbstractController extends Controller {

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

