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
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

abstract class Registry {

    /**
     * Object Container
     * @var array
     */
    private static $registry = array();

    /**
     * Registers a object
     *
     * @param string $index
     * @param object $value
     */
    public static function set($index, $value) {
        self::$registry[$index] = $value;
    }

    /**
     * Returns a object
     *
     * @param string $index
     * @return object
     */
    public static function get($index) {
        if (isset(self::$registry[$index]) && !empty(self::$registry[$index])) {
            return self::$registry[$index];
        } else {
            require_once('core/RegistryException.php');
            throw new RegistryException('System Error : Registry Object does not exists!');
        }
    }

}