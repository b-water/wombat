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
 * @copyright  Copyright (c) 2010-2012 Nico Schmitz
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
require_once('core/Controller.php');
class UserController extends Controller {

     private $template_dir = 'user/';

    //put your code here

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {

    }

    public function signin() {
        $this->smarty->assign('title', 'Anmelden');

        $content = $this->smarty->fetch($this->template_dir . 'signin_form.tpl');

        $this->smarty->assign('content',$content);
        $this->smarty->display($this->template_dir . 'signin.tpl');
        
    }

    public function index() {

    }

    public function set() {

    }

}
