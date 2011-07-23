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
 * Description of DomainModel
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    DomainModel.php
 * @since   09.06.2011 - 19:07:18
 */
abstract class Object
{
    protected $id = null;

    /**
     * Get the ID of this object (unique to the
     * object type)
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the id for this object.
     *
     * @param int $id
     * @return int
     * @throws Exception	If the id on the object is already set
     */
    public function setId($id)
    {
        if (!is_null($this->id)) {
            require_once('ObjectException.php');
            throw new ObjectException('(#1) : ID is immutable');
        }
        $this->id = $id;
    }
}