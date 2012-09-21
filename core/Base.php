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
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2012 Nico Schmitz
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
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

    protected $layout;
    protected $config;
    protected $url;
    protected $db;
    protected $auth;

    public function __construct() {
        $this->layout = Registry::get('layout');
        $this->config = Config::getInstance();
        $this->url = Registry::get('url');
        $this->db = Registry::get('db');
        $this->auth = Registry::get('auth');
    }

}
