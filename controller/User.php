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

    const VIEW_DIR = 'user/';

    private $dataMapper;
    private $repository;

    public function __construct() {
        parent::__construct();
    }

    public function init() {
//        require_once('model/User/UserDataMapper.php');
//
//        try {
//            $this->dataMapper = new UserDataMapper();
//        } catch (UserException $userException) {
//            echo $userException->getTraceAsString();
//        }
//
//        require_once('model/User/UserRepository.php');
//
//        try {
//            $this->repository = new UserRepository($this->dataMapper);
//        } catch (UserException $userException) {
//            echo $userException->getTraceAsString();
//        }
    }

    public function login() {
        $this->view->pagetitle = 'Login';
        $this->view->pagesubtitle = '';
        $this->view->content = $this->view->render(self::VIEW_DIR . 'login.phtml');
        echo $this->view->render(self::VIEW_DIR . 'frame.phtml');
    }

    public function logout() {
        
    }

    public function register() {
        $this->view->pagetitle = 'Registrierung';
        $this->view->pagesubtitle = '';
        $this->view->content = $this->view->render(self::VIEW_DIR . 'register.phtml');
        echo $this->view->render(self::VIEW_DIR . 'frame.phtml');
    }

}
