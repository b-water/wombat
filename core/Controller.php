<?php

require_once('Base.php');

abstract class Controller extends Base {

    const VIEW_MAIN = 'frame.phtml';

    public function __construct() {
        if ($this->isCancelRequest() === true) {
            unset($_REQUEST['search_value']);
        }
        parent::__construct();
        $this->init();
    }

    protected function isPost() {
        if (isset($_REQUEST['submit'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function isCancelRequest() {
        if (isset($_REQUEST['cancel'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function redirect($controller, $action) {
        $url = $this->config->get('path.base');
        if (!empty($controller)) {
            $url .= $controller . '/';
        }
        if (!empty($action)) {
            $url .= $action . '/';
        }
        header('Location: ' . $url . '');
    }

    protected function getCurrentPage() {
        if (isset($_REQUEST['page']) && intval($_REQUEST['page'] !== 0)) {
            return $_REQUEST['page'];
        } else {
            return 1;
        }
    }

    abstract protected function init();
}
