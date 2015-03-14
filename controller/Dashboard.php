<?php

require_once('core/Controller.php');

class DashboardController extends Controller {

    const VIEW_DIR = 'dashboard/';

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        
    }

    public function index() {
        echo $this->view->render(self::VIEW_MAIN);
    }

}

