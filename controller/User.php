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

    private $userDataMapper;
    private $userRepository;

    public function __construct() {
        parent::__construct();
    }

    public function init() {

        require_once('model/User/DataMapper.php');

        try {
            $this->userDataMapper = new UserDataMapper();
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }

        require_once('model/User/Repository.php');

        try {
            $this->userRepository = new UserRepository($this->userDataMapper);
        } catch (UserException $userException) {
            echo $userException->getTraceAsString();
        }
    }

    public function login() {
        if ($this->isPost()) {
            if ($this->auth->verify($_REQUEST['user_name'], $_REQUEST['password'])) {
                $this->redirect('dashboard');
            } else {

                $this->layout->getView()->error_title = 'Authentifizierung fehlgeschlagen!';
                $this->layout->getView()->error_msg = 'Das System konnte keinen Benutzer mit den angegebenen Benutzernamen
                und Passwort finden. Bitte überprüfen Sie das die von Ihnen eingebenen Daten korrekt sind und vergewissern Sie sich das Ihr
                Benutzer auch freigeschaltet ist.';

                $user = $this->userRepository->fetch(array('*'), 'user_name="' . $_POST['user_name'] . '"', '', 1, 0);
                if (is_object($user) && $user->getAttempts() > 0) {
                    if ($user->getAttempts() >= 5 && $user->getAttempts() < 10) {
                        die('aaa');
                        $this->layout->getView()->info = true;
                        $this->layout->getView()->info_title = 'Captcha aktiviert!';
                        $this->layout->getView()->info_msg = 'Zu viele fehlerhafte Versuche. Bitte fülle nun zusätlich das Captcha aus. Das System muss prüfen, ob Du ein Mensch bist!';
                        
                    } elseif ($user->getAttempts() >= 10) {

                        $this->layout->getView()->info = true;
                        $this->layout->getView()->error_title = 'Benutzer gesperrt!';
                        $this->layout->getView()->error_msg = 'Zu viele fehlerhafte Versuche. Dein Benutzerkonto wurde gesperrt!';

                        $user->setEnabled(0);
                        $this->userRepository->update($user);
                    }
                }

                $this->layout->getView()->page_title = 'Login';
                $this->layout->getView()->error = true;
                $this->layout->getView()->page_sub_title = '';
                $this->layout->content = $this->layout->getView()->render(self::VIEW_DIR . 'login.phtml');

                $this->layout->head = $this->layout->getView()->render('head.phtml');
                $this->layout->foot = $this->layout->getView()->render('foot.phtml');
                $this->layout->setLayout('login');
                echo $this->layout->render();
            }
        } else {

            $this->layout->content = $this->layout->getView()->render(self::VIEW_DIR . 'login.phtml');
            $this->layout->head = $this->layout->getView()->render('head.phtml');
            $this->layout->foot = $this->layout->getView()->render('foot.phtml');
            $this->layout->setLayout('login');
            echo $this->layout->render();
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
