<?php

class Navigation {

    const TABLE = 'wombat_navigation';
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
    private $db;
    /**
     * View Object
     * @var object 
     */
    private $view;
    /**
     * MySQl Table
     * @var string
     */
    private $url;

    public function __construct() {
        $this->db = Registry::get('db');
        $this->view = Registry::get('view');
        $this->url = Registry::get('url');
    }

    /**
     * Fetches all Data from
     * the mysql table menu
     *
     * @return array data
     */
    public function fetch() {
        $select = $this->db->select();
        $select->from(self::TABLE, $this->fields);
        if (!empty($filter)) {
            $select->where($filter);
        }
        $select->order($this->order);

        $sql = $this->db->query($select);
        $data = $sql->fetchAll();
        if (empty($data)) {
            require_once('core/NavigationException.php');
            throw new NavigationException('(#1) : No Data found!');
        }

        return $data;
    }

    /**
     * Assign the Menu Items
     * to the View
     *
     * @param array $data
     */
    public function create(array $data) {
        if (!empty($data)) {
            $this->view->navigation = $data;
            if (isset($this->urlParser)) {
                $slashpos = strpos($this->url->getUrl(), '/');
                $active = substr($this->url->getUrl(), 0, $slashpos);
                $this->view->active = $active;
            }
        } else {
            throw new NavigationException('(#2) : You must assign the Data for the Menu!');
        }
    }

}
