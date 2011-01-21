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
    protected $registry = Registry::getInstance();



    abstract function init();
    abstract function fetchById();
    abstract function fetch();

}

?>
