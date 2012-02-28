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
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
require_once('core/Object.php');

class User extends Object {

    private $user_name;
    private $first_name;
    private $last_name;
    private $password;
    private $email;
    private $enabled;
    private $last_login;

    public function isValid() {
        return true;
    }

    public function set_user_name($value) {
        $this->user_name = $value;
    }

    public function get_user_name() {
        return $this->user_name;
    }

    public function set_first_name($value) {
        $this->first_name = $value;
    }

    public function get_first_name() {
        return $this->first_name;
    }

    public function set_last_name($value) {
        $this->last_name = $value;
    }

    public function get_last_name() {
        return $this->last_name;
    }

    public function set_password($value) {
        $this->password = $value;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_email($value) {
        $this->email = $value;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_enabled($value) {
        $this->enabled = $value;
    }

    public function get_enabled() {
        return $this->enabled;
    }
    
    public function set_last_login($value) {
        $this->last_login = $value;
    }
    
    public function get_last_login() {
        return $this->last_login;
    }

    /**
     * Converts the Object into an Array
     * 
     * @param type $object
     * @return array 
     */
    public function toArray() {
        return get_object_vars($this);
    }

}