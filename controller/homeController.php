<?php

/**
 * Description of HomeController
 *
 * @author nico
 */
class HomeController extends MainController {

    //put your code here

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        
    }

    public function indexAction() {
        $this->smarty->assign('title', 'Startseite');
        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

}

?>
