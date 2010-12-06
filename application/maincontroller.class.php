<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of maincontroller
 *
 * @author nico
 */
abstract class MainController {
    //put your code here
    protected $registry;
    protected $smarty;

    function __construct ($registry) {
        $this->registry = $registry;
        $this->smarty = $this->registry->get('smarty');
        $this->init();
    }

    abstract function init();
    abstract function index_Action();
}
?>
