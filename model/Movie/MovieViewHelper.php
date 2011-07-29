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

    public function __constructs() {

    }

    public function buildPages($class=null, $tpl=null, array $pageParams) {
        $pages = array();
        for ($index = 1; $index < $pageParams['countPages']+1; $index++) {
            $pages[$index]['url'] = $pageParams['controller'] . '/' . $pageParams['action'] . '/page/' . $index;
            $pages[$index]['name'] = $index;
            if (!empty($class)) {
                $pages[$index]['class'] = $class;
            }
        }
        return $pages;
    }

}

?>
