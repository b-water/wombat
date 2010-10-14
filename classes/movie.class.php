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
        $query = 'SELECT '.$fields.' FROM movies '.$filter.' '.$orderby.' '.$limit.'';

        // gather data
        $result = $this->db->query($query);

        // id of the movie
        $counter = 1;

        while($row = $result->fetch_assoc())
        {
            if(!empty($row))
            {
                foreach($row as $key => $value)
                {
                    $this->movies[$counter][$key] = $value;
                }
            }
            // count up
            $counter++;
        }
        // returns the array with the movies
        $this->numberofmovies = $counter;
        return $this->movies;
    }

}
?>
