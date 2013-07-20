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

class UserAdministration extends Controller {

    const VIEW_DIR = 'user/';

    private $user_data_mapper;
    private $user_repository;

    public function __construct() {
        parent::__construct();
    }

    public function init() {

        require_once('model/User/DataMapper.php');

        try {
            $this->user_data_mapper = new UserDataMapper();
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }

        require_once('model/User/Repository.php');

        try {
            $this->user_repository = new UserRepository($this->user_data_mapper);
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }
    }

    public function login() {
        if ($this->isPost()) {
            if ($this->auth->verify($_REQUEST['user_name'], $_REQUEST['password'])) {
                $this->redirect('dashboard');
            } else {
                $this->view->page_title = 'Login';
                $this->view->error = true;
                $this->view->page_sub_title = '';
                $this->view->content = $this->view->render(self::VIEW_DIR . 'login.phtml');
                echo $this->view->render(self::VIEW_DIR . 'frame.phtml');
            }
        } else {
            $this->view->page_title = 'Login';
            $this->view->page_sub_title = '';
            $this->view->content = $this->view->render(self::VIEW_DIR . 'login.phtml');
            echo $this->view->render(self::VIEW_DIR . 'frame.phtml');
        }
    }

    public function logout() {
        $this->auth->logout();
    }

    public function register() {
        if ($this->isPost()) {
            require_once('core/Validation.php');
            $validation = new Validation($this->db);
            $validation->addField(array('key' => 'email', 'name' => 'E-Mail Adresse', 'value' => $_REQUEST['email'], 'validator' => array('email', 'email_exist')));
            $validation->addField(array('key' => 'first_name', 'name' => 'Vorname', 'value' => $_REQUEST['first_name'], 'validator' => array('empty')));
            $validation->addField(array('key' => 'last_name', 'name' => 'Name', 'value' => $_REQUEST['last_name'], 'validator' => array('empty')));
            $validation->addField(array('key' => 'user_name', 'name' => 'Benutzername', 'value' => $_REQUEST['user_name'], 'validator' => array('empty', 'username_exist')));
            if ($validation->isValid()) {
                $user = UserRepository::create($_REQUEST);
                if ($this->userRepository->append($user) === true) {
                    echo 'ok';
                } else {
                    echo 'fehler';
                }
            } else {
                $this->view->error = $validation->getLog();
            }
        }
        $this->view->pagetitle = 'Registrierung';
        $this->view->pagesubtitle = '';
        $this->view->content = $this->view->render(self::VIEW_DIR . 'register.phtml');
        echo $this->view->render(self::VIEW_DIR . 'frame.phtml');
    }

}
