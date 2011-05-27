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
    private $fields = array('title', 'url', 'sequence');
    private $order = 'sequence';
    private $smarty;
    private $tpl = 'navigation.tpl';

    /**
     *  Constructor
     */
    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->db = $this->registry->get('db');

        $this->smarty = $this->registry->get('smarty');
    }

    /**
     * Fetches all Data from
     * the mysql table menu
     *
     * @return array data
     */
    public function fetch() {
        $select = $this->db->select();
        $select->from('navigation', $this->fields);
        if (!empty($filter)) {
            $select->where($filter);
        }
        $select->order($this->order);

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();
        if (empty($data)) {
            throw new NavigationException('(#1) : No Data found!');
        }

        return $data;
    }

    /**
     * Assign the Menu Items
     * to Smarty
     *
     * @param array $data
     */
    public function create(array $data) {
        if (!empty($data)) {
            $this->smarty->assign('navigation', $data);
            $this->smarty->assign('activ', $_REQUEST['rt']);
        } else {
            throw new NavigationException('(#2) : You must assign the Data for the Menu!');
        }
    }

}

?>
