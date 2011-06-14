<?php

/**
 * Description of Movie
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    Movie.php
 * @since   08.06.2011 - 18:45:38
 * @version Expression id is undefined on line 13, column 15 in Templates/Scripting/PHPClass.php.
 */
class Movie extends Object {

    /**
     * Primary Key of the
     * Movie Object
     * 
     * @var int
     */
    private $id;
    /**
     * Title of the
     * Movie Object
     * 
     * @var string
     */
    private $title;
    /**
     * Description of the
     * Movie Object
     * 
     * @var string
     */
    private $description;
    /**
     * Key value for star rating
     * 
     * @var int
     */
    private $rating;
    /**
     * Key value relation to 
     * mysql table format
     *
     * @var int 
     */
    private $format;
    /**
     * Trailer link of the
     * Movie Object
     *
     * @var string 
     */
    private $trailer;
    /**
     * Path of the Image of the
     * Movie Object
     *
     * @var string
     */
    private $image;
    /**
     * Year of the
     * Movie Object
     *
     * @var int 
     */
    private $year;
    /**
     * Duration of the
     * Movie Object
     *
     * @var type 
     */
    private $duration;
    /**
     * Associated Genres of the
     * Movie Object
     *
     * @var array
     */
    private $genre = array();

    public function __construct() {
        
    }
    
    public function isValid()
    {
        $validation = new MovieValidate($this);
        $validation->start();
    }

    /**
     * Sets the Duration
     * 
     * @param string $value 
     */
    public function setDuration($value) {
        $this->duration = $value;
    }

    /**
     * Gets the Duration
     * 
     * @return type string
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Sets the Description
     * 
     * @param string $value 
     */
    public function setDescription($value) {
        $this->description = $value;
    }

    /**
     * Gets the Description
     * 
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

    public function setId($value) {
        $this->id = $value;
    }

    public function getId() {
        return $this->id;
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

}

?>
