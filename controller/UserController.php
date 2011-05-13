<?php

/**
 * Description of UserController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    UserController.php
 * @since   13.05.2011 - 23:35:14
 */
class UserController extends BaseController {

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

?>
