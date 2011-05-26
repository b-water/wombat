<?php

/**
 * Description of Navigation
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Navigation.php
 * @since   26.05.2011 - 18:33:39
 * @version Expression id is undefined on line 13, column 15 in Templates/Scripting/PHPClass.php.
 */
class Navigation {

    private $db;
    private $registry;
    private $table = 'menu';
    private $fields = array('title', 'url', 'sequence');
    private $order = 'sequence';
    private $smarty;
    private $tpl = 'menu.tpl';
    private $tplitem = 'menuItem.tpl';

    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->db = $this->registry->get('db');

        $this->smarty = $this->registry->get('smarty');

        $select = $this->db->select();
        $select->from($this->table, $this->fields);
        $select->order($this->order);

        $sql = $this->db->query($select);
        $this->items = $sql->fetchAll();

        echo '<pre>';
        print_r($this->items);
        echo '</pre>';

        if(empty($this->items))
            throw new MenuException('(#1) : No Data found!');

        $this->smarty->assign('menu',$this->items);
    }

}

?>
