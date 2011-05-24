<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author nico
 * @since 19:52:10
 */
class Menu {

    private $db;
    private $registry;
    private $config;
    private $table = 'menu';
    private $fields = array('title','url','layer','sequence');
    private $order = 'sequence';
    private $smarty;
    private $items;

    public function __construct()
    {
        $this->registry = Registry::getInstance();
        $this->db = $this->registry->get('db');
        $this->smarty = $this->registry->get('smarty');

        $select = $this->db->select();
        $select->from($this->table, $this->fields);
        $select->order($this->order);

        $sql = $this->db->query($select);
        $this->items = $sql->fetchAll();

        if(empty($this->items))
            throw new MenuException('(#1) : No Data found!');

        $this->smarty->assign('menu',$this->items);

        return true;
    }
}
?>
