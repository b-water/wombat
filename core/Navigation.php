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

    /**
     * Fields
     * @var array 
     */
    private $fields = array('title', 'url', 'sequence');
    /**
     * Setorder
     * @var string 
     */
    private $order = 'sequence';
    /**
     * Template
     * @var string
     */
    private $tpl = 'navigation.tpl';
    /**
     * Database Object
     * @var object 
     */
    private $db = null;
    /**
     * Smarty Object
     * @var object 
     */
    private $smarty = null;
    /**
     * MySQl Table
     * @var string
     */
    private $table = 'wombat_navigation';
    private $urlParser = null;

    public function __construct() {
        $this->db = Registry::get('db');
        $this->smarty = Registry::get('smarty');
        $this->urlParser = Registry::get('urlParser');
    }

    /**
     * Fetches all Data from
     * the mysql table menu
     *
     * @return array data
     */
    public function fetch() {
        $select = $this->db->select();
        $select->from($this->table, $this->fields);
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
            if (isset($this->urlParser)) {
                $slashpos = strpos($this->urlParser->getUrl(),'/');
                $activ = substr($this->urlParser->getUrl(),0,$slashpos);
                $this->smarty->assign('activ', $activ);
            }
        } else {
            throw new NavigationException('(#2) : You must assign the Data for the Menu!');
        }
    }

}