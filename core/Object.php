<?php

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
}
