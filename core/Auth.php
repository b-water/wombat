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

class Auth {

    private static $restricted_controller = array('dashboard', 'movie', 'user');
    private static $restricted_action = array('show', 'delete', 'edit', 'update', 'add', 'index');

    public function __construct() {
        
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

    public function requiresAccess($controller, $action) {
        if (in_array($controller, self::$restricted_controller) && in_array($action, self::$restricted_action)) {
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return true;
        }
        return false;
    }

}

