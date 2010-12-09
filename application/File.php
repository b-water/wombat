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

    public function __construct() {
        
    }

    public function fetchFromDir($path) {

        $dir = opendir($path);

        while ($file = readdir($dir)) {
            $this->files[] = $file;
        }

        closedir($dir);

        foreach($this->files as $key => $value)
        {
            if ($value == '.' || $value == '..' || $value == '.svn') {
                unset($this->files[$key]);
            }
        }

        return $this->files;
    }
}
?>
