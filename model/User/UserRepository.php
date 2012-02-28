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
require_once('core/Repository.php');

class UserRepository implements Repository {

    private $dataMapper;

    /**
     * Constructor, needs UserDataMapper Object
     * @param UserDataMapper $dataMapper 
     */
    public function __construct(UserDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Creates a User Object
     * @param array $data
     * @return User object or throws an Exception 
     */
    public static function create(array $data) {
        require_once('User.php');
        $user = new User();
        $class_methods = array();
        $methods = get_class_methods('User');
        foreach ($methods as $key => $val) {
            if (substr($val, 0, 3) == 'set') {
                $method = $val;
                $field = strtolower(substr($val, 4));
                if (isset($data[$field]) && !empty($data[$field])) {
                    $user->$method($data[$field]);
                }
            }
        }

        if ($user->isValid($user)) {
            return $user;
        } else {
            require_once('UserException.php');
            throw new UserException('User Object is not valid!');
        }

        return $user;
    }

    /**
     * Fetches User Data
     *
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset
     * @return type 
     */
    public function fetch(array $fields, $filter = '', $orderby = '', $limit = '', $offset = '') {
        $movie = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $movie;
    }

    public function count($filter) {
        $count = $this->dataMapper->count($filter);
        return $count;
    }

    /**
     * Fetches Movie Data
     *
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function fetchByPage(array $fields, $filter = '', $orderby = '', $limit = '', $offset = '') {
        $movie = $this->dataMapper->fetchByPage($fields, $filter, $orderby, $limit, $offset);
        return $movie;
    }

    /**
     * Return the Zend_Paginator
     * @return object
     */
    public function getPaginator() {
        $paginator = $this->dataMapper->getPaginator();
        return $paginator;
    }

    /**
     * Updates a Movie
     * @param  object $movie
     * @return bool $success
     */
    public function update($movie) {
        $success = $this->dataMapper->update($movie);
        return $success;
    }

    /**
     * Creates a new User
     * @param  object $movie
     * @return bool $success
     */
    public function append($user) {
        $success = $this->dataMapper->append($user);
        return $success;
    }

    /**
     * Deletes a Movie
     * @param  int $id
     * @return bool $success
     */
    public function delete($id) {
        $success = $this->dataMapper->delete($id);
        return $success;
    }

}