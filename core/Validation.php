<?php

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