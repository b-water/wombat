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
 * Description of Repository
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Repository.php
 * @since   21.06.2011 - 18:30:53
 */
interface Repository {

    /**
     * Create a new Object
     */
    public static function create(array $data);

    /**
     * Call DataMapper append Method
     */
    public function append($object);

    /**
     * Call DataMapper delete Method
     */
    public function delete($object);

    /**
     * Call DataMapper update Method
     */
    public function update($object);

    /**
     * Call DataMapper fetch Method
     */
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='');
}