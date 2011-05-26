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
    }

    public function fetch() {
        $select = $this->db->select();
        $select->from($this->table, $this->fields);
        if (!empty($filter)) {
            $select->where($filter);
        }
        $select->order($this->order);

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();
        if (empty($data))
            throw new NavigationException('(#1) : No Data found!');

        return $data;
    }

    public function create(array $data) {
        if (!empty($data)) {

            $this->smarty->assign('menuitems', $data);
            $menu = $this->smarty->fetch($this->tpl);

        } else {
            throw new NavigationException('(#2) : You must assign the Data for the Menu!');
        }
    }

}

?>
