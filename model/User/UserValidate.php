<?php

/**
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - mail@nicoschmitz.eu
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
class USerValidate {

    public $status = true;
    public $error_cache = array();

    /**
     * Validates a movie object
     * @param Movie $movie
     * @return type 
     */
    public function isValid(Movie $movie) {
        // mandatory fields
        $this->status = $this->isId($movie->getId());
        $this->status = $this->isTitle($movie->getTitle());
        $this->status = $this->isFormat($movie->getFormat());
        $this->status = $this->isGenre($movie->getGenre());

        // additional fields
        $this->status = $this->isImage($movie->getImage());
        $this->status = $this->isDuration($movie->getDuration());
        $this->status = $this->isYear($movie->getYear());
        
        if($this->status === false) {
            var_dump($this->error_cache);
        }
        
        return $this->status;
    }

    /**
     * Validates the id
     * @param type $id
     * @return type 
     */
    public function isId($id=null) {
        if (!ctype_digit($id)) {
            $this->error_cache['Id'] = 'not set or not an Integer';
            return false;
        }
        return true;
    }

    /**
     * Validates the format
     * @param type $format
     * @return type 
     */
    public function isFormat($format) {
        if (empty($format)) {
            $this->error_cache['Format'] = 'is empty';
            return false;
        }
        return true;
    }

    /**
     *  Validates the genre
     * @param type $genre
     * @return type 
     */
    public function isGenre($genre) {
        if (!empty($genre) && is_object($genre)) {
            $this->error_cache['Genre'] = 'is empty or not an object';
            return false;
        }
        return true;
    }

    /**
     * Validates the title
     * @param type $title
     * @return type 
     */
    public function isTitle($title=null) {
        if (empty($title)) {
            $this->error_cache['Title'] = 'is empty';
            return false;
        }
        return true;
    }

    /**
     * Validates the image
     * @param type $image
     * @return type 
     */
    public function isImage($image=null) {
        if (!empty($image) && !file_exists($image)) {
            $this->error_cache['Genre'] = 'does not exist';
            return false;
        }
        return true;
    }

    /**
     * Validates the duration
     * @param type $duration
     * @return type 
     */
    public function isDuration($duration=null) {
        if (!empty($duration) && !ctype_digit($duration)) {
            $this->error_cache['Genre'] = 'is not an Integer';
            return false;
        }
        return true;
    }

    /**
     * Validates the year
     * @param type $year
     * @return type 
     */
    public function isYear($year=null) {
        if (!empty($year)) {
            if (!ctype_digit($year) || strlen($year) != 4) {
                $this->error_cache['Genre'] = 'not an integer or longer then 4 digits';
                return false;
            }
            return true;
        }
        return true;
    }

}