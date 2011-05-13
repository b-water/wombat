<?php

/**
 * Description of HomeController
 *
 * @author nico
 */
class DashboardController extends BaseController {

    //put your code here

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        
    }

    public function index() {
        $this->smarty->assign('title', 'Startseite');
        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }


}

?>
