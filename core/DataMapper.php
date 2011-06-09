<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataMapper
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    DataMapper.php
 * @since   09.06.2011 - 18:53:06
 */
abstract class DataMapper
{
    /**
     * Create a new instance of the DomainObject that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     * @return DomainObjectAbstract
     */
    public function create(array $data = null) {
        $obj = $this->_create();
        if ($data) {
            $obj = $this->populate($obj, $data);
        }
        return $obj;
    }

    /**
     * Save the DomainObject
     *
     * Store the DomainObject in persistent storage. Either insert
     * or update the store as required.
     *
     * @param DomainObjectAbstract $obj
     */
    public function save(Object $obj)
    {
        if (is_null($obj->getId())) {
            $this->_insert($obj);
        } else {
            $this->_update($obj);
        }
    }

    /**
     * Delete the DomainObject
     *
     * Delete the DomainObject from persistent storage.
     *
     * @param DomainObjectAbstract $obj
     */
    public function delete(Object $obj)
    {
        $this->_delete($obj);
    }

    /**
     * Populate the DomainObject with the values
     * from the data array.
     *
     * To be implemented by the concrete mapper class
     *
     * @param DomainObjectAbstract $obj
     * @param array $data
     * @return DomainObjectAbstract
     */
    abstract public function populate(Object $obj, array $data);

    /**
     * Create a new instance of a DomainObject
     *
     * @return DomainObjectAbstract
     */
    abstract protected function _create();

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _insert(Object $obj);

    /**
     * Update the DomainObject in persistent storage
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _update(Object $obj);

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _delete(Object $obj);
}
