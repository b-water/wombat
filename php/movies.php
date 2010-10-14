<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $movie = new movie();

    $movies = $movie->getMovies();
    $smarty->assign('movies',$movies);

?>
