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
 * Description of FormatDataMapper
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    FormatDataMapper.php
 * @since   18.06.2011 - 20:21:20
 */
require_once('core/DataMapper.php');

class FormatDataMapper implements DataMapper {

    /**
     * Database Object
     * @var object
     */
    private $db = null;
    /**
     * MySQL Tablename
     * @var string 
     */
    private $table = 'wombat_format';

    public function __construct(Zend_Db_Adapter_Pdo_Mysql $db) {
        $this->db = $db;
    }

    public function append($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

    public function fetch(array $fields, $filter='', $orderby='name', $limit='', $offset='') {
        $select = $this->db->select()->from($this->table, $fields)->where($filter)->order($orderby);

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if (empty($data)) {
            throw new FormatException('(#1) : No Formats found!');
        } else {
            $formatContainer = array();

            for ($index = 0; $index <= count($data) - 1; $index++) {

                $format = FormatRepository::create($data[$index]);
                $formatContainer[] = $format;
            }
        }

        return $formatContainer;
    }

}