<?php

/**
 * Description of Navigation
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Navigation.php
 * @since   26.05.2011 - 18:33:39
 */
class Navigation {

    /* fields to fetch from the mysql table */
    private $fields = array('title', 'url', 'sequence');
    /* mysql setorder */
    private $order = 'sequence';
    /* smarty template to fill */   
    private $tpl = 'navigation.tpl';
    /* db object */
    private $db;
    /* smarty object */
    private $smarty;

    public function __construct() {
        $this->db = Registry::get('db');
        $this->smarty = Registry::get('smarty');
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
            if (isset($_REQUEST['rt']) && !empty($_REQUEST['rt'])) {
                $needle = strpos($_REQUEST['rt'], '/');
                $this->smarty->assign('activ', substr($_REQUEST['rt'], 0, $needle + 1));
            } else {
                $this->smarty->assign('activ', 'dashboard/');
            }
        } else {
            throw new NavigationException('(#2) : You must assign the Data for the Menu!');
        }
    }

}

?>
