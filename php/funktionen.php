<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Überprüft ein Array auf leere Pflichtfelder,
 * dazu muss ein Array $pflichtfelder übergeben werden indem
 * alle Pflichtfelder als key drin stehen.
 *
 * @author  Nico Schmitz cofilew@gmail.com
 * @since   28-08-2010 18:46
 *
 * @param   array   $felder     Array das überprüft werden soll
 * @param   array   $pflichtfelder    Array mit den Pflichtfeldern
 * @return bool
 */
function Pflichtfeldpruefung($felder, $pflichtfelder)
{
    $error = false;
    $error_felder = '';
    foreach($pflichtfelder as $key => $val)
    {
        if($pflichtfelder[$val] == $felder[$val])
        {
            if($felder[$val] == '')
            {
                $error = true;
            }
        }
    }
    return $error;
}


?>
