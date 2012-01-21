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
require_once('Base.php');

class Authentication extends Base {

    private $dataMapper;
    private $repository;

    public function __construct() {
        parent::__construct();

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

    public function run() {
    }

    private function getUserData($fbid) {
    }

    private function login() {
        $user = $this->getUserData($this->facebook->getUser());
        if ($user !== false) {
            $this->view->facebook_logout_url = $this->facebook->getLogoutUrl($this->logoutParams);
            $_SESSION['user'] = $user;
            $this->view->fb_id = $_SESSION['user']['fbid'];
//            $this->view->facebook_logout_url = 'https://www.facebook.com/logout.php?next=' . $this->config->get('path.base') . 'user/logout/&access_token=' . $this->facebook->getAccessToken();
            $this->view->user_profil_url = 'user/show_profil/';
        }
    }

    public function logout() {
        session_destroy();
        foreach ($_COOKIE as $key => $val) {
            $test = setcookie($key, '', time() - 3600, '/');
        }
    }

    public function isRegistered($fbid) {

        $user = $this->repository->fetch(array('fbid', 'firstname', 'lastname', 'email'), 'fbid= "' . $fbid . '"', '', 0, 1);
        if (empty($user)) {
            return false;
        }
        return true;
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return true;
        }
        return false;
    }

}

