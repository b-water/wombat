<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Format
 *
 * @author nico
 * @since 12:59:06
 */
class Format {
    //put your code here
    private $table = 'format';
    private $db = null;


    public function __construct()
    {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
    }

    /**
     * fetchs all formats that are set in the format table
     *
     * @return  array
    */
    public function fetch($type = '*', $fields = 'name',$order='name')
    {
        $select = $this->db->select()->from($this->table,$fields)->where('type = "'.$type.'"')->order($order);
        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if(empty($data))
        {
            throw new FormatException('(#1) : No Formats found!');
        }

        return $data;
    }

}
?>