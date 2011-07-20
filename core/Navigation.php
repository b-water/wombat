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
 * Description of Navigation
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
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
