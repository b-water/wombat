<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genre
 *
 * @author nico
 * @since 13:39:59
 */
class Genre {
    //put your code here
    private $table = 'genre';
    private $db = null;

    public function __construct()
    {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
    }

    /**
     * fetchs all genre types set in the genre table
     *
     * @return  array
     */
    public function fetch($type = '*', $fields = '*', $order = 'name') {

        $select = $this->db->select()->from($this->table, $fields)->where('type = "'.$type.'"')->order($order);
        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if(empty($data))
        {
            throw new GenreException('(#1) : No Genres found!');
        }

        return $data;
    }
}
?>
