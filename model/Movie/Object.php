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
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
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
        require_once('Validate.php');
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

    /**
     * Sets the Year
     * @return type string
     */
    public function setYear($value) {
        $this->year = $value;
    }

    /**
     * Gets the Year
     * @return type string
     */
    public function getYear() {
        return $this->year;
    }

    /**
     * Sets the Format
     * @return type string
     */
    public function setFormat($value) {
        $this->format = $value;
    }

    /**
     * Gets the Format
     * @return type string
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * Sets the Trailer
     * @return type string
     */
    public function setTrailer($value) {
        $this->trailer = $value;
    }

    /**
     * Gets the Trailer
     * @return type string
     */
    public function getTrailer() {
        return $this->trailer;
    }

    /**
     * Sets the Image
     * @return type string
     */
    public function setImage($value) {
        $this->image = $value;
    }

    /**
     * Gets the Image
     * @return type string
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Sets the Rating
     * @return type string
     */
    public function setRating($value) {
        $this->rating = $value;
    }

    /**
     * Gets the Rating
     * @return type string
     */
    public function getRating() {
        return $this->rating;
    }

    /**
     * Sets the Genre
     * @return type string
     */
    public function setGenre(array $array) {
        $this->genre = $array;
    }

    /**
     * Gets the Genre
     * @return type string
     */
    public function getGenre() {
        return $this->genre;
    }

    /**
     * Sets the Title
     * @return type string
     */
    public function setTitle($value) {
        $this->title = $value;
    }

    /**
     * Gets the Title
     * @return type string
     */
    public function getTitle() {
        return $this->title;
    }

}