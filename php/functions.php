<?php

/**
 * Get all genres from the type of
 * genre you want
 *
 * @param   string  the typ of genres you want
 * @return  array   the genres
 */
function getGenres($type)
{
    $db = Database::getInstance($host, $user, $password, $database);

    $query = 'SELECT name FROM genres WHERE type = "'.$type.'"';
    $result = $db->query($query);

    $genres = array();

    while($row = $result->fetch_assoc())
    {
        if(!empty($row))
        {
            foreach($row as $key => $value)
            {
                $genres[] = $value;
            }
        }
    }

    if(isset($genres) && !empty($genres))
    {
        return $genres;
    }
    else
    {
        return false;
    }
}

/**
 * Get all formats from the type of
 * format you want
 *
 * @param   string  the typ of formats you want
 * @return  array   the formats
 */
function getFormats($type)
{
    $db = Database::getInstance($host, $user, $password, $database);

    $query = 'SELECT name FROM formats WHERE type = "'.$type.'"';
    $result = $db->query($query);

    $formats = array();

    while($row = $result->fetch_assoc())
    {
        if(!empty($row))
        {
            foreach($row as $key => $value)
            {
                $formats[] = $value;
            }
        }
    }

    if(isset($formats) && !empty($formats))
    {
        return $formats;
    }
    else
    {
        return false;
    }
}


/**
 * Converts a MySQL Date into
 * the German date format.
 *
 * @param   string          the date in mysql format
 * @return  string or bool
 */
function german_date($date)
{
    if(!empty($date))
    {
        $exploded_date = explode('-',$date);
        $formated_date = $exploded_date['2'].'.'.$exploded_date['1'].'.'.$exploded_date['0'];

        return $formated_date;
    }
    else
    {
        return false;
    }
}

?>
