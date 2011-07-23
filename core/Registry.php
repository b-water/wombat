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
 * Description of Registry
 *
 * @author nico
 */

abstract class Registry {

    private static $registry = array();
    protected static $instance = null;

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
            throw new RegistryException('(#1) : Registry Object does not exists!');
        }
    }

}