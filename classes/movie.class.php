<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movies
 *
 * @author nico
 */
class movie {

    protected static $instance = null;
    public $movies = array();
    public $numberofmovies;
   
    public function __construct()
    {
        $this->db = Database::getInstance($host, $user, $password, $database);
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new movie();
        return self::$instance;
    }


    /**
     * Gather Movies from Database
     * 
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function getMovies($fields='*',$filter='',$orderby='ORDER BY NAME',$limit='')
    {

        // craft the query
        if(!empty($_REQUEST['genreFilter']) || !empty($_REQUEST['formatFilter']))
        {
            $selection = 'WHERE ';
            $selection .= (!empty($_REQUEST['genreFilter'])) ? ' genre LIKE "%'.$_REQUEST['genreFilter'].'%"' : '';
            $selection .= (!empty($_REQUEST['formatFilter'])) ? 'AND format LIKE "%'.$_REQUEST['genreFormat'].'%"' : '';
        }
        
        $query = 'SELECT '.$fields.' FROM movies '.$filter.' '.$selection.' '.$orderby.' '.$limit.'';
        // gather data
        $result = $this->db->query($query);

        while($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                foreach($row as $key => $value)
                {
                    if($key == 'id')
                    {
                        $array_key = $value;
                    }
                    if($key == 'date')
                    {
                        $this->movies[$array_key][$key] = german_date($value);
                    }
                    else
                    {
                        $this->movies[$array_key][$key] = $value;
                    }
                }
            }
            // count up
        }
        // returns the array with the movies
        $this->numberofmovies = $counter;

        return $this->movies;
    }

}
?>
