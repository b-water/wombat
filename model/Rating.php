<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rating
 *
 * @author nico
 * @since 13:11:15
 */
class Rating {
    //put your code here
    private $table = 'rating';
    private $db = null;

    public function __construct()
    {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
    }

        /**
     * fetchs all ratings that are set in the rating table
     *
     * @return  array
     */
    public function fetch($type = '*', $fields = '*', $order = 'name') {

        $select = $this->db->select()->from($this->table, $fields)->where('type = "'.$type.'"')->order($order);
        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if(empty($data))
        {
            throw new RatingException('(#1) : No Ratings found!');
        }

        return $data;
    }
}
?>
