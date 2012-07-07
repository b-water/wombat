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
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
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
