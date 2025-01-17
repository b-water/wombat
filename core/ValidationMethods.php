<?php

class ValidationMethods {

    /**
     * Date Validation
     * @param type $value
     * @param type $field
     * @return boolean 
     */
    public static function isDate($value) {
        $date = explode('.', $value);
        if (!checkdate($date[1], $date[0], $date[2])) {
            return false;
        }

        return true;
    }

    /**
     *  Time Validation
     * @param type $value
     * @param type $field 
     */
    
    /**
     *
     * @param type $value
     * @param type $field
     * @return boolean 
     */
    public static function isTime($value) {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    /**
     * E-Mail Address Validation
     * @param type $value
     * @param type $field 
     */
    public function isMail($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    }

    /**
     * Integer Validation
     * @param type $value
     * @param type $field 
     */
    public function isInt($value, $field) {
        if (empty($value) || !ctype_digit($value)) {
            $this->error[$field] = 'Bitte geben Sie einen gültigen Wert an.';
        }
    }

    /**
     * String Validation
     * @param type $value
     * @param type $field 
     */
    public function isString($value, $field) {
        if (!isset($value) || empty($value)) {
            $this->error[$field] = 'Bitte geben Sie einen gültigen Wert an.';
        }
    }

    /**
     * Currency Validation
     * @param type $value
     * @param type $field 
     */
    public function isCurrency($value, $field) {
        if (strpos($value, ',') || empty($value)) {
            $this->error[$field] = 'Bitte geben Sie eine gültige Währung an.';
        }
    }

    /**
     * Zipcode Validation
     * @param type $value
     * @param type $field 
     */
    public function isZipcode($value, $field) {
        if (strlen($value) > 5 || !ctype_digit($value)) {
            $this->error[$field] = 'Bitte geben Sie eine gültige Postleitzahl an.';
        }
    }

}
