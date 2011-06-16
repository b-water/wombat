<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageValidation
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    ImageValidation.php
 * @since   16.06.2011 - 20:58:04
 */

namespace Wombat;

class ImageValidation {
    
    
    public function __construct() {
        
    }

    static public function isValid($params) {
        if ($this->width == null || !ctype_digit($this->width)) {
            throw new ImageException('width ist not valid!');
        }

        if ($this->height == null || !ctype_digit($this->height)) {
            throw new ImageException('width ist not valid!');
        }

        if ($this->cropSize == null || !ctype_digit($this->cropSize)) {
            throw new ImageException('width ist not valid!');
        }

        if ($this->filename == null || !ctype_digit($this->width)) {
            throw new ImageException('width ist not valid!');
        }
    }

}

?>
