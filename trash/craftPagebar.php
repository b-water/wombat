<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Create a Navigation for 
 * a lot of Data
 *
 * @param  int $current_page
 * @param  int $num_rows
 * @param  int $items
 * @return array
 */
function craftPagebar($current_page, $num_rows, $items)
{
    if(!empty($num_rows) && !empty($items) && $num_rows > 15)
    {
        // the return array
        $pagination = array();

        // the total number of all pages
        $pages = ceil($num_rows / $items);

        // set the offset
        if($current_page != '1')
        {
            $pagination['offset'] = ($current_page-1) * $items;
        }
        else
        {
            $pagination['offset'] = '0';
        }

        // set the limit
        $pagination['limit'] = $items;

        if($current_page > '4')
        {
            $pagination['pages']['1'] = '1';
            $pagination['pages']['...'] = '...';
        }

        // creating the backward pages
        if(($current_page-3) <= 0)
        {
            for($index = '1'; $index <= $current_page ; $index++)
            {
                $pagination['pages'][$index] = $index;
            }
        }
        else
        {
            for($index = ($current_page-3); $index <= $current_page ; $index++)
            {
                $pagination['pages'][$index] = $index;
            }
        }


        if($current_page+5 <= $pages)
        {
            // creating the forward pages
            for($index = ($current_page+1); $index <= ($current_page+3); $index++)
            {
                $pagination['pages'][$index] = $index;
            }
        }
        else
        {
            for($index = ($current_page+1); $index <= $pages; $index++)
            {
                $pagination['pages'][$index] = $index;
            }
        }

        if($current_page < $pages && ($current_page+4) < $pages)
        {
            $pagination['pages']['...2'] = '...';
            $pagination['pages']['26'] = '26';
        }

        // return the array with all informations about the pagination
        return $pagination;

    }

}

?>
