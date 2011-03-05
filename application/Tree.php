<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tree
 *
 * @author nico
 * @since 18:17:59
 */
class Tree {

    private $db;
    private $registry;
    private $table = 'menu';
    private $order = 'sequence';
    private $fields = array('title','controller','action','seperator','layer');
    private $tree = array();
    private $config;

    public function __construct()
    {
        $this->registry = Registry::getInstance();
        $this->db = $this->registry->get('db');
        $this->config = $this->registry->get('config');
    }

    public function load()
    {
        $select = $this->db->select();
        $select->from($this->table,$this->fields);
        $select->order($this->order);

        $sql = $this->db->query($select);
        $result = $sql->fetchAll();

        foreach ($result as $item) {
            if (!empty($item)) {
                $this->tree[] = $item;
            }
        }

        if(empty($this->tree))
        {
            throw new TreeException('(#1) : No data found!');
        }

        return true;
    }

    public function callback()
    {
        require_once('library/Zend/Json.php');
//        $json = Zend_Json_Encoder::encode($this->tree);
//        Zend_Json::
        $json = Zend_Json::encode($this->tree);
        echo Zend_Json::prettyPrint($json);
    }


}
?>
