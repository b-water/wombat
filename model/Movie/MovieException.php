<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieException
 *
 * @author nico
 */
class MovieException extends Exception {
    //put your code here
    public function __construct($registry) {
        parent::__construct($registry);
    }
}
?>
