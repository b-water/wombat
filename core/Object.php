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
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
abstract class Object {

    protected $id;
    protected $last_change;
    protected $last_change_user;
    protected $created;
    protected $created_user;

    /**
     * Get the ID of this object (unique to the
     * object type)
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the id for this object.
     *
     * @param int $id
     * @return int
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setCreated($value) {
        $this->created = $value;
    }
    
    public function getCreated($value) {
        return $this->created;
    }
    
    public function setCreatedUser($value) {
        $this->created_user = $value;
    }
    
    public function getCreatedUser() {
        return $this->created_user;
    }
    
    public function setLastChange($value) {
        $this->last_change = $value;
    }
    
    public function getLastChange($value) {
        return $this->last_change;
    }
    
    public function setLastChangeUser($value) {
        $this->last_change_user = $value;
    }
    
    public function getLastChangeUser($value) {
        return $this->last_change_user;
    }

    /**
     * Converts the Object into an Array
     * 
     * @param type $object
     * @return array 
     */
    public function toArray($object) {
        return get_object_vars($object);
    }

}