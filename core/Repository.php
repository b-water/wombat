<?php

/**
 * Description of Repository
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Repository.php
 * @since   21.06.2011 - 18:30:53
 */
interface Repository {
    
    
    public static function create(array $data);
    
    public function append($object);

    public function delete($object);

    public function update($object);

    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='');
}

?>
