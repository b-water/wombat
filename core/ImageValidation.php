<?php

/**
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * Description of ImageValidation
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    ImageValidation.php
 * @since   16.06.2011 - 20:58:04
 */

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
