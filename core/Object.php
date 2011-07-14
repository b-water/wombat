<?php


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


?>
