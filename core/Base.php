<?php

abstract class Base {
    
    
    const TABLE_MOVIE = 'wombat_movie';
    /**
     * mysql table
     * @var String 
     */

    const TABLE_USER = 'wombat_user';

    /**
     * mysql table
     * @var String 
     */
    const TABLE_GENRE = 'wombat_genre';

    /**
     * mysql table
     * @var String 
     */
    const TABLE_GENRE_ASSOC = 'wombat_genre_assoc';

    /**
     * mysql table
     * @var String 
     */
    const TABLE_FORMAT = 'wombat_format';

    /**
     * mysql table
     * @var String 
     */
    const TABLE_RATING = 'wombat_rating';

    /**
     * Date Timestamp
     * @var string
     */
    const DATE_TIME = 'Y-m-d H:i:s';

    protected $view;
    protected $config;
    protected $url;
    protected $db;
    protected $auth;

    public function __construct() {
        $this->view = Registry::get('view');
        $this->config = Config::getInstance();
        $this->url = Registry::get('url');
        $this->db = Registry::get('db');
        $this->auth = Registry::get('auth');
    }

}
