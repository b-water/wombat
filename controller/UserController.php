<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author nico
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
