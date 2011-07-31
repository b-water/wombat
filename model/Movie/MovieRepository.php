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
require_once('core/Repository.php');

class MovieRepository implements Repository {

    private $dataMapper;

    /**
     * Constructor, needs MovieDataMapper Object
     * @param MovieDataMapper $dataMapper 
     */
    public function __construct(MovieDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Creates a Movie Object
     * @param array $data
     * @return Movie object or throws an Exception 
     */
    public static function create(array $data) {
        require_once('Movie.php');

        $movie = new Movie();

        $movie->setId($data['id']);

        (isset($data['title'])) ? $movie->setTitle($data['title']) : '';
        (isset($data['description'])) ? $movie->setDescription($data['description']) : '';
        (isset($data['image'])) ? $movie->setImage($data['image']) : '';
        (isset($data['format'])) ? $movie->setFormat($data['format']) : '';
        (isset($data['rating'])) ? $movie->setRating($data['rating']) : '';
        (isset($data['trailer'])) ? $movie->setTrailer($data['trailer']) : '';
        (isset($data['year'])) ? $movie->setYear($data['year']) : '';
        (isset($data['duration'])) ? $movie->setDuration($data['duration']) : '';
        (isset($data['genre']) && is_array($data['genre'])) ? $movie->setGenre($data['genre']) : '';
        (isset($data['trailer'])) ? $movie->setTrailer($data['trailer']) : '';

        if ($movie->isValid()) {
            return $movie;
        } else {
            require_once('MovieException.php');
            throw new MovieException('Movie Object is not valid!');
        }
    }

    /**
     * Fetches Movie Data
     *
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset
     * @return type 
     */
    public function fetch(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $movie = $this->dataMapper->fetch($fields, $filter, $orderby, $limit, $offset);
        return $movie;
    }

    /**
     * Fetches Movie Data
     *
     * @param array $fields
     * @param type $filter
     * @param type $orderby
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function fetchByPage(array $fields, $filter='', $orderby='', $limit='', $offset='') {
        $movie = $this->dataMapper->fetchByPage($fields, $filter, $orderby, $limit, $offset);
        return $movie;
    }

    /**
     * Return the Zend_Paginator
     * @return object
     */
    public function getPaginator() {
        $paginator = $this->dataMapper->getPaginator();
        return $paginator;
    }

    /**
     * Updates a Movie
     * @param  object $movie
     * @return bool $success
     */
    public function update($movie) {
        $success = $this->dataMapper->update($movie);
        return $success;
    }

    /**
     * Creates a new Movie
     * @param  object $movie
     * @return bool $success
     */
    public function append($movie) {
        $success = $this->dataMapper->append($movie);
        return $success;
    }

    /**
     * Deletes a Movie
     * @param  int $id
     * @return bool $success
     */
    public function delete($id) {
        $success = $this->dataMapper->delete($id);
        return $success;
    }

}