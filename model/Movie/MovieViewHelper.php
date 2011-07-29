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
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @since 29.08.2011 - 22:54
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
class MovieViewHelper {

    private $currentPage = null;
    private $countPages = null;
    private $pageRange = null;
    private $tpl = null;
    private $smarty = null;

    public function __constructs() {
        $this->smarty = Registry::get('smarty');
    }

    public function buildPaginatorControl($class) {
        if (!empty($this->countPages) && !empty($this->currentPage)
                && !empty($this->pageRange) && !empty($this->tpl)) {
            for ($i = 0; $i >= $this->countPages; $i++) {
                
            }
        }
    }

}

?>
