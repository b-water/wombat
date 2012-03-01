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

class UserObject extends Object {

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

    public function setUserName($value) {
        $this->user_name = $value;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setFirstName($value) {
        $this->first_name = $value;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setLastName($value) {
        $this->last_name = $value;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setPassword($value) {
        $this->password = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEnabled($value) {
        $this->enabled = $value;
    }

    public function getEnabled() {
        return $this->enabled;
    }
    
    public function setLastLogin($value) {
        $this->last_login = $value;
    }
    
    public function getLastLogin() {
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