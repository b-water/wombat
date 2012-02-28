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

    public function set_created($value) {
        $this->created = $value;
    }

    public function get_created($value) {
        return $this->created;
    }

    public function set_created_user($value) {
        $this->created_user = $value;
    }

    public function get_created_user() {
        return $this->created_user;
    }

    public function set_last_change($value) {
        $this->last_change = $value;
    }

    public function get_last_change($value) {
        return $this->last_change;
    }

    public function set_last_change_user($value) {
        $this->last_change_user = $value;
    }

    public function get_last_change_user($value) {
        return $this->last_change_user;
    }
}