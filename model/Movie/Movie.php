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
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

/**
 * Description of Movie
 *
 * @author  Nico Schmitz - nschmitz1991@gmail.com
 * @file    Movie.php
 * @since   08.06.2011 - 18:45:38
 */
require_once('core/Object.php');
class Movie extends Object {

    /**
     * Title of the
     * Movie Object
     * @var string
     */
    private $title;
    /**
     * Description of the
     * Movie Object
     * @var string
     */
    private $description;
    /**
     * Key value for star rating
     * @var int
     */
    private $rating;
    /**
     * Key value relation to 
     * mysql table format
     * @var int 
     */
    private $format;
    /**
     * Trailer link of the
     * Movie Object
     * @var string 
     */
    private $trailer;
    /**
     * Path of the Image of the
     * Movie Object
     * @var string
     */
    private $image;
    /**
     * Year of the
     * Movie Object
     * @var int 
     */
    private $year;
    /**
     * Duration of the
     * Movie Object
     * @var type 
     */
    private $duration;
    /**
     * Associated Genres of the
     * Movie Object
     * @var array
     */
    private $genre = array();

    /**
     * Validates the Movie object
     * returns an array with the error
     * messages.
     * @return array error
     */
    public function isValid() {
        require_once('MovieValidate.php');
        $validation = new MovieValidate();
        $output = $validation->isValid($this);
        return $output;
    }

    /**
     * Sets the Duration
     * @param string $value 
     */
    public function setDuration($value) {
        $this->duration = $value;
    }

    /**
     * Gets the Duration
     * @return type string
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Sets the Description
     * @param string $value 
     */
    public function setDescription($value) {
        $this->description = $value;
    }

    /**
     * Gets the Description
     * @return type string
     */
    public function getDescription() {
        return $this->description;
    }

    public function setYear($value) {
        $this->year = $value;
    }

    public function getYear() {
        return $this->year;
    }

    public function setFormat($value) {
        $this->format = $value;
    }

    public function getFormat() {
        return $this->format;
    }

    public function setTrailer($value) {
        $this->trailer = $value;
    }

    public function getTrailer() {
        return $this->trailer;
    }

    public function setImage($value) {
        $this->image = $value;
    }

    public function getImage() {
        return $this->image;
    }

    public function setRating($value) {
        $this->trailer = $value;
    }

    public function getRating() {
        return $this->trailer;
    }

    public function setGenre(array $array) {
        $this->genre = $array;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function getTitle() {
        return $this->title;
    }

}