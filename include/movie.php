<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// create object or get the existing object
$movie = Movie::getInstance();

$fields = 'id,name,genre,rating,format,date';

if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    
    if ($_REQUEST['action'] == 'load') {

    }

    if ($_REQUEST['action'] == 'search') {
        
        $filter = ' WHERE name like "%'.$_REQUEST['searchbar'].'%"';
        
        $movies = $movie->getMovies($fields,$filter);
        
    }

    if ($_REQUEST['action'] == 'edit') {

    }

    if ($_REQUEST['action'] == 'delete') {
        $movie->deleteMovie($_REQUEST['id']);
        $smarty->display('delete.tpl');
    }
    
} else {
    
    $movies = $movie->getMovies($fields);

}

if (isset($movies) && !empty($movies)) {

    $smarty->assign('movies', $movies);
}

