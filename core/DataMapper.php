<?php


interface DataMapper {

    /**
     * Create new Object in Database
     */
    public function append($object);

    /**
     * Delete Object in Database
     */
    public function delete($object);

    /**
     * Update Object in Database
     */
    public function update($object);

    /**
     * Get Object/s from Database
     */
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='');

 }
