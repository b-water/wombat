<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author nico
 */
class config {

    public $database = 'redwombat';
    public $host = '127.0.0.1';
    public $user = 'dbadmin';
    public $password = '1234';


    
    public function __construct($id=null) {
        $this->db = Database::getInstance($host, $user, $password, $database);
        if ($id != null)
            $this->loadById($id);
    }
//
//    $query = 'SELECT * FROM config';
//    $result = $db->query($query);
//
//    while($row = $result->fetch_assoc()) {
//        echo '<pre>';
//        print_r($row);
//        echo '</pre>';
//    }
//   // Datenbank
//
//    $config = array();
//
//    $config['author'] = 'Nico Schmitz';
//    $config['copyright'] = '2010 Nico Schmitz';
//    $config['title'] = 'Red Wombat - Die Digitale Medienbibliothek';

}
?>
