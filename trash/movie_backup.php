<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    // create object
    $movie = Movie::getInstance();

    $fields = 'name,genre,rating,format,date';

    $items = '15';

    if(isset($_REQUEST['name']) && !empty($_REQUEST['name']))
    {
        $filter = $_REQUEST['name'];
    }
    else
    {
        $filter = '';
    }

    if(isset($_REQUEST['search']) && $_REQUEST['search'] == true)
    {
        $pagebar['offset'] = '0';
    }
    else
    {
        // count all movies
        $movie->countMovies($filter);

        $num_rows = $movie->countMovies($filter);

        // create pagebar
        if(isset($_REQUEST['page']) && !empty($_REQUEST['page']))
        {
            $pagebar = craftPagebar($_REQUEST['page'], $num_rows, $items);
            $smarty->assign('current_page',$_REQUEST['page']);
        }
        else
        {
            $pagebar = craftPagebar('1', $num_rows, $items);
            if(!isset($pagebar['limit']) && empty($pagebar['limit']))
            {
                $pagebar['limit'] = '15';
            }
            $smarty->assign('current_page','1');
        }

        $smarty->assign('pages',$pagebar['pages']);
    }

    // get all movies
    $movies = $movie->getMovies('name,genre,rating,format,date',
            $filter, '', $items,$pagebar['offset']);
    $smarty->assign('movies',$movies);


?>
