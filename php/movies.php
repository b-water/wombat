<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $movie = new movie();

    // get all kind of movie genres for the genre select box
    $genres = getGenres('movie');
    $smarty->assign('genres',$genres);

    // get all kind of movie formats for the format select box
    $formats = getFormats('movie');
    $smarty->assign('formats',$formats);

    $movies = $movie->getMovies();
    $smarty->assign('movies',$movies);

?>
