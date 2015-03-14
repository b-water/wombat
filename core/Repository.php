<?php


interface Repository {

    /**
     * Create a new Object
     */
    public static function create(array $data);

    /**
     * Call DataMapper append Method
     */
    public function append($object);

    /**
     * Call DataMapper delete Method
     */
    public function delete($object);

    /**
     * Call DataMapper update Method
     */
    public function update($object);

    /**
     * Call DataMapper fetch Method
     */
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='');
}
