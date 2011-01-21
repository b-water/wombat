<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataMapper
 *
 * @author nico
 */
abstract class DataMapper {

    protected $table;
    protected $where;
    protected $limit;
    protected $offset;
    protected $orderby;
    protected $db;
    protected $registry;

    public function __construct()
    {
        $this->registry = Registry::getInstance();
        $this->db = $this->registry->get('db');
    }

    abstract function init();
    abstract function fetchById($id, $fields='*');
    abstract function fetch($fields='*', $filter='', $orderby='name', $limit='', $offset='');

}

?>
