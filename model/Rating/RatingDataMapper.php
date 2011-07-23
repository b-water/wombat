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
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * Description of RatingDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    RatingDataMapper.php
 * @since   18.06.2011 - 20:23:20
 */
require_once('core/DataMapper.php');

class RatingDataMapper implements DataMapper {

    private $db = null;
    private $table = null;
    private $config = null;

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
        $this->config = Config::getInstance();
        $this->table = $this->config->get('database.tables.rating');
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table, '*');
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        if (!empty($orderby)) {
            $select->order($orderby);
        }

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if (!empty($data)) {
            $ratings = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {
                require_once('RatingRepository.php');
                $rating = RatingRepository::create($data[$index]);
                $ratings[] = $rating;
            }
        } else {
            throw new RatingException('No Ratings found!');
        }

        return $ratings;
    }
}
