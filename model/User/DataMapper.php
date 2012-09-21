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
require_once('core/DataMapper.php');
require_once('Exception.php');
require_once('core/Base.php');

class UserDataMapper extends Base implements DataMapper {
    /**
     * Path to Cover Images
     * @var string
     */

    const PATH = 'files/user/';

    /**
     * UserDataMapper Constructor
     * @param Zend_Db_Adapter_Pdo_Mysql $db
     */
    public function __construct() {

        parent::__construct();
    }

    public function append($user) {
        $user->setLastLogin(date(self::DATE_TIME));
        $user->setCreated(date(self::DATE_TIME));
        $user->setCreatedUser(1);
        $user->setLastChange(date(self::DATE_TIME));
        $user->setLastChangeUser(1);
        $user->setEnabled(0);
        $user->setPassword(sha1($user->getPassword()));
        $user_array = $user->toArray();
        $this->db->insert(self::TABLE_USER, $user_array);
        if ($this->db->lastInsertId() != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Updates a User Data
     *
     * @param $user object 
     */
    public function update($user) {

        $user->setLastChange(date(self::DATE_TIME));
        $user->setLastChangeUser(1);
        $data = $user->toArray();

        $affectedRows = $this->db->update(self::TABLE_USER, $data, ' id ="' . $user->getId() . '"');

        if ($affectedRows != 1) {
            throw new UserException('(#1) : The dataset coud not habe been updated!');
        }
    }

    /**
     * Deletes a Movie from the
     * Database and the Pictures according
     * to the Movie from files/movie/
     * 
     * @param type $id 
     */
    public function delete($id) {

        /* deleting the movie from the database */
        $affectedRows = $this->db->delete($this->table, 'id ="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('(#2) : The dataset coud not have been deleted!');
        } else {
            /* delete associated genres */
            $affectedRows = $this->genreRepository->deleteAssoc($id);
            /* deleting files according to the movie */
            $di = new DirectoryIterator($this->path);
            $length = strlen($id);
            foreach ($di as $file) {
                if (!$file->isDot() && substr($file->getFilename(), 0, $length) == $id) {
                    $image = $this->path . $file->getFilename();
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
            }
        }
    }

    public function count($filter = '') {
        $select = $this->db->select();

        $select->from(self::TABLE_USER, 'COUNT(*) as count');

        if (!empty($filter)) {
            $select->where($filter);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetch();

        return $data['count'];
    }

    /**
     * Gather Movies from Database
     *
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function fetch(array $fields, $filter = '', $orderby = '', $limit = '', $offset = '') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from(self::TABLE_USER, $fields);
        } else {
            $select->from(self::TABLE_USER, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset) || $offset == 0) {
            $select->limit($limit, $offset);
        }
        $sql = $this->db->query($select);
//        $profiler = $this->db->getProfiler();
//        var_dump($profiler->getLastQueryProfile());
        $data = $sql->fetchAll();
        if (empty($data)) {
            return array();
        } else {
            if (count($data) == 1) {
                $user = $user = UserRepository::create($data[0]);
                return $user;
            } else {
                $users = array();

                for ($index = 0; $index <= count($data) - 1; $index++) {

                    $user = UserRepository::create($data[$index]);
                    $users[] = $user;
                }
                return $users;
            }
        }
    }

    /**
     * Gather Movies from Database
     *
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function fetchByPage(array $fields, $filter = '', $orderby = '', $limit = '', $offset = '') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from(self::TABLE_USER, $fields);
        } else {
            $select->from(self::TABLE_USER, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        $select->joinLeft(self::TABLE_RATING, self::TABLE_RATING . '.id = ' . self::TABLE_USER . '.rating', self::TABLE_RATING . '.name as rating');
        $select->joinLeft(self::TABLE_FORMAT, self::TABLE_FORMAT . '.id = ' . self::TABLE_USER . '.format', self::TABLE_FORMAT . '.name as format');

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        require_once('library/Zend/Paginator/Adapter/DbSelect.php');
        $selectAdapter = new Zend_Paginator_Adapter_DbSelect($select);
        require_once('library/Zend/Paginator.php');

        if ($this->url->getKey() == 'page') {
            $this->currentPageNumber = $this->url->getValue();
        } else {
            $this->currentPageNumber = 1;
        }

        $this->paginator = new Zend_Paginator($selectAdapter);
        $this->paginator->setItemCountPerPage($this->itemCountPerPage);
        $this->paginator->setCurrentPageNumber($this->url->getValue());
        $this->paginator->setPageRange($this->pageRange);

        $this->pageCount = $this->paginator->count();

        $data = $this->paginator->getCurrentItems();

        if (empty($data)) {
            throw new MovieException('(#3) : No Movies found!');
        } else {
            $movies = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {
                $data[$index]['genre'] = $this->genreRepository->fetchAssoc($data[$index]['id']);

                $movie = MovieRepository::create($data[$index]);
                $movies[] = $movie;
            }
        }
        return $movies;
    }

    /**
     * Return Zend_Paginator
     * @return object
     */
    public function getPaginator() {
        return $this->paginator;
    }

}