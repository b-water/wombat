<?php

require_once('Base.php');

class Validation extends Base {

    const TABLE_USER = 'wombat_user';
    const FIELD_EMAIL = 'email';
    const FIELD_USER_NAME = 'user_name';

    private $log = array();
    private $fields = array();

    public function __construct() {
        require_once('core/ValidationLogObject.php');
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
                $this->validate($field);
            }

            if (!empty($this->log)) {
                return false;
            } else {
                return true;
            }
        } else {
            require_once('ValidationException.php');
            throw new ValidationException('No Fields to validate!');
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
                case 'user_name_exist':
                    if ($this->userRecordExists($field['value']) === false) {
                        $field['message'] = 'Benutzername wird bereits verwendet!';
                        $this->addLogEntry($field);
                    }
                    break;
                case 'empty':
                    if (empty($field['value'])) {
                        $field['message'] = 'Bitte füllen Sie das Feld ' . $field['name'] . '!';
                        $this->addLogEntry($field);
                    }
                    break;
                case 'date':
                    break;
                case 'email_exist':
                    if ($this->emailRecordExists($field['value']) === false) {
                        $field['message'] = 'E-Mail Adresse wird bereits verwendet!';
                        $this->addLogEntry($field);
                    }
                    break;
                default:
            }
        }
    }

    /**
     *
     * @param type $value
     * @return boolean 
     */
    private function userRecordExists($value) {
        $params = array(
            'table' => self::TABLE_USER,
            'field' => self::FIELD_USER_NAME,
            'adapter' => $this->db
        );

        $user_name_exist = new Zend_Validate_Db_RecordExists($params);

        if ($user_name_exist->isValid($value)) {
            return false;
        }

        return true;
    }

    /**
     *
     * @param type $value
     * @return boolean 
     */
    private function emailRecordExists($value) {
        $params = array(
            'table' => self::TABLE_USER,
            'field' => self::FIELD_EMAIL,
            'adapter' => $this->db
        );

        $email_exist = new Zend_Validate_Db_RecordExists($params);

        if ($email_exist->isValid($value)) {
            return false;
        }

        return true;
    }

    private function addLogEntry(array $field) {
        $log_entry = new ValidationLogObject();
        $log_entry->message = $field['message'];
        $log_entry->name = $field['name'];
        $log_entry->field = $field['field'];
        $this->log[] = $log_entry;
    }

    /**
     * Returns the Error Log
     * @return type 
     */
    public function getLog() {
        return $this->log;
    }

}
