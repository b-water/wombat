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

    const VIEW_DIR = 'dashboard/';

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        
    }

    public function index() {
        $this->layout->mainnav = $this->layout->getView()->render('mainnav.phtml');
        $this->layout->head = $this->layout->getView()->render('head.phtml');
        $this->layout->foot = $this->layout->getView()->render('foot.phtml');
        $this->layout->setLayout('dashboard');
        echo $this->layout->render();
    }

}

