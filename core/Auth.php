<?php

class Auth {

    private static $restricted_controller = array('dashboard', 'movie', 'user');
    private static $restricted_action = array('show', 'delete', 'edit', 'update', 'add', 'index');

    public function __construct() {
        
    }

    public function verify($user_name, $password) {

        require_once('model/User/DataMapper.php');

        try {
            $user_data_mapper = new UserDataMapper();
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }

        require_once('model/User/Repository.php');

        try {
            $repository = new UserRepository($user_data_mapper);
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }

        $user = $repository->fetch(array('*'), 'user_name="' . $user_name . '" AND password="' . sha1($password) . '"', '', 1, 0);
        if (is_object($user)) {
            $this->login($user);
            return true;
        } else {
            $user = $repository->fetch(array('*'), 'user_name="' . $user_name . '"', '', 1, 0);
            if (is_object($user)) {
                return true;
            }
            return false;
        }
    }

    private function login(UserObject $user) {
        if ($user !== false) {
            $_SESSION['user'] = $user;
        }
    }

    public function logout() {
        session_destroy();
        foreach ($_COOKIE as $key => $val) {
            setcookie($key, '', time() - 3600, '/');
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

