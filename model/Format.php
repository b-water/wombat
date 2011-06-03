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
class Format extends BaseModel {

    //put your code here
    private $table;

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        $this->table = $this->config->get('database.tables.format');
    }

    /**
     * fetchs all formats that are set in the format table
     *
     * @return  array
     */
    public function fetch($type = '*', $fields = '*', $order='name') {
        $select = $this->db->select()->from($this->table, $fields)->where('type = "' . $type . '"')->order($order);
        $sql = $this->db->query($select);
        $data = $sql->fetchAll();

        if (empty($data)) {
            throw new FormatException('(#1) : No Formats found!');
        }

        return $data;
    }

}

?>
