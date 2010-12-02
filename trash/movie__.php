<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    // create object
    $movie = Movie::getInstance();

    // setting the fields
    $fields = 'name,genre,rating,format,date';

    // setting the limit of data sets
    $limit = '15';

    $total_records = $movie->countMovies();

    if(filter_has_var(INPUT_GET,"page") == false)
    {
        // no page in GET
        $page = 1;
    }
    // if the page number is not an int or not within range, assign it to page 1
    elseif(filter_var($_GET['page'], FILTER_VALIDATE_INT, array("min_range"=>1, "max_range"=>$_SESSION['total_records'])) == false)
    {
        $page = 1;
    }
    else
    {
        // if all is well, assign it
        $page = (int)$_GET['page'];
    }

    if(isset($total_records) && !empty($total_records) &&
            is_int($total_records))
    {
        /*** feed the variables to the pager class ***/
        $pager = Pager::getPagerData($total_records, $limit, $page);

        /*** retrieve the variables from the pager class ***/
        $offset = $pager->offset;
        $limit = $pager->limit;
        $page = $pager->page;

        /*** begin the menu ***/
        $menu = array();

        /*** if this is page 1 there is no previous link ***/
        if($page != 1)
        {
            $menu['PREV'] = ($page - 1);
        }

        /*** loop over the pages ***/
        for ($i = 1; $i <= $pager->numPages; $i++)
        {
            if ($i == $pager->page)
            {
                $menu .= '<li class="selected">'.$i.'</li>';
            }
            else
            {
                $menu .= '<li><a href="'.$page_name.'?page='.$i.'">'.$i.'</a></li>'."\n";
            }
        }

        /*** if we are on the last page, we do not need the NEXT link ***/
        if ($page < $pager->numPages)
        {
            $menu .= '<li><a href="'.$page_name.'?page='.($page + 1).'"> NEXT &gt;&gt;</a></li>';
        }

    }

    
?>
