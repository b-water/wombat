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
require_once('Base.php');

class Validation extends Base {

    const TABLE_USER = 'wombat_user';
    const FIELD_EMAIL = 'email';
    const FIELD_USER_NAME = 'user_name';

    private $log = array();
    private $fields = array();

    public function __construct() {
        require_once('library/Zend/Validate.php');
        require_once('library/Zend/Validate/Db/RecordExists.php');
        parent::__construct();
    }

    /**
     * Add a Field to Validation
     * 
     * Needed Params : key, value, name, validator (array)
     * @param array $params
     * @return boolean 
     */
    public function addField(array $params) {
        if (array_key_exists('key', $params) && array_key_exists('value', $params)
                && array_key_exists('name', $params) && array_key_exists('validator', $params)
                && is_array($params['validator'])) {
            $this->fields[] = $params;
            return true;
        } else {
            return false;
        }
    }

    public function isValid() {
        if (!empty($this->fields)) {
            foreach ($this->fields as $key => $field) {
                var_dump($this->validate($field));
            }
        } else {
            return false;
        }
    }

    /**
     * Validates a Data Field
     * 
     * @param array $field
     * @return boolean 
     */
    private function validate(array $field) {
        foreach ($field['validator'] as $key => $validator) {
            switch ($validator) {
                case 'numeric':
                    break;
                case 'email':
                    break;
                // check if email address is already in use
                case 'email_exist':

                    $params = array(
                        'table' => self::TABLE_USER,
                        'field' => self::FIELD_EMAIL,
                        'adapter' => $this->db
                    );

                    $email_exist = new Zend_Validate_Db_RecordExists($params);

                    if ($email_exist->isValid($field['value'])) {
                        return false;
                    }

                    break;
                case 'empty':
                    break;
                case 'date':
                    break;
                case 'user_name_exist':
                    return $this->emailRecordExists($field['value']);
                    break;
                default:
            }

            return true;
        }
    }

    private function userRecordExists() {
        
    }

    private function emailRecordExists($value) {
        $params = array(
            'table' => self::TABLE_USER,
            'field' => self::FIELD_USER_NAME,
            'adapter' => $this->db
        );

        $user_name_exist = new Zend_Validate_Db_RecordExists($params);

        if ($user_name_exist->isValid($value)) {
            return false;
        }
        break;
    }

    /**
     * Returns the Error Log
     * @return type 
     */
    public function getLog() {
        return $this->log;
    }

}