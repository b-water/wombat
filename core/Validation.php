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
 * @since   03.11.2011 - 23:12:14
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

class Validation {

    private $error = array();

    public function isValid(array $params) {
        foreach ($params as $validate) {
            $method = 'is' . ucfirst($validate['type']);
            $this->$method($validate['value'], $validate['name']);
        }

        if (!empty($this->error)) {
            return false;
        }
        
        return true;
    }
    
    public function getErrorArray() {
        return $this->error;
    }

    public function isDate($value, $field) {
        $date = explode('.', $value);
        if (!checkdate($date[1], $date[0], $date[2])) {
            $this->error[$field] = 'Bitte geben Sie ein gültiges Datum an.';
        }
    }

    public function isTime($value, $field) {
        if (empty($value)) {
            $this->error[$field] = 'Bitte geben Sie ein gültige Uhrzeit an.';
        }
    }

    public function isMail($value, $field) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->error[$field] = 'Bitte geben Sie eine gültige E-Mail Adresse an.';
        }
    }

    public function isInt($value, $field) {
        if (empty($value) || !ctype_digit($value)) {
            $this->error[$field] = 'Bitte geben Sie einen gültigen Wert an.';
        }
    }

    public function isString($value, $field) {
        if (!isset($value) || empty($value)) {
            $this->error[$field] = 'Bitte geben Sie einen gültigen Wert an.';
        }
    }

    public function isCurrency($value, $field) {
        if (strpos($value, ',') || empty($value)) {
            $this->error[$field] = 'Bitte geben Sie eine gültige Währung an.';
        }
    }

    public function isZip($value, $field) {
        if (strlen($value) > 5 || !ctype_digit($value)) {
            $this->error[$field] = 'Bitte geben Sie eine gültige Postleitzahl an.';
        }
    }

}