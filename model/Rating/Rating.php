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
require_once('core/Object.php');
class Rating extends Object {

    /**
     * type of format
     * @var string 
     */
    private $type = null;
    /**
     * name of format
     * @var string 
     */
    private $name = null;

    /**
     * set the type of the rating
     * @param type $type 
     */
    public function setType($type=null) {
        if (!empty($type)) {
            $this->type = $type;
        }
    }

    /**
     * get the type of the type
     * @return type 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * set the name of the name
     * @param type $name 
     */
    public function setName($name=null) {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    /**
     * get the name of the name
     * @return type 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Validates the Rating object
     * returns an array with the error
     * messages.
     * @return array error
     */
    public function isValid() {
        require_once('RatingValidate.php');
        $validation = new RatingValidate();
        $output = $validation->isValid($this);
        return $output;
    }

}
//class Rating {
//    //put your code here
//    private $table = 'rating';
//    private $db = null;
//
//    public function __construct()
//    {
//        $this->db = Registry::get('db');
//    }
//
//        /**
//     * fetchs all ratings that are set in the rating table
//     *
//     * @return  array
//     */
//    public function fetch($type = '*', $fields = '*', $order = 'name') {
//
//        $select = $this->db->select()->from($this->table, $fields)->where('type = "'.$type.'"')->order($order);
//        $sql = $this->db->query($select);
//        $data = $sql->fetchAll();
//
//        if(empty($data))
//        {
//            throw new RatingException('(#1) : No Ratings found!');
//        }
//
//        return $data;
//    }
//}
?>
