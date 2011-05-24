<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author nico
 */
class File {

    //put your code here
    private $files = array();
    protected static $instance = null;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public function getInstance() {
        if (self::$instance == null)
            self::$instance = new File();
        return self::$instance;
    }

    public function fetchDir($path,$type) {

        $dir = opendir($path);

        while ($file = readdir($dir)) {
            if ($file != '.' && $file != '..' && $file != '.svn') {
                $this->files[$type][] = $file;
            }
        }

        closedir($dir);

        return $this->files[$type];
    }

}

?>
