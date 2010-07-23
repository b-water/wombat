<?php

function administrator()
{
    $content = '';
    $content .= '<pre>'.print_r($_REQUEST, true).'</pre>';
    $content .= '<pre>'.print_r($_SESSION, true).'</pre>';

    return $content;
}

?>
