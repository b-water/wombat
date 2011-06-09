<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomainModel
 *
 * @author  Nico Schmitz - cofilew@gmail.com
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
            throw new ObjectException('(#1) : ID is immutable');
        }
        return $this->id = $id;
    }
}


?>
