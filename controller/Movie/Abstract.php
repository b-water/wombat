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
require_once('core/Controller.php');

abstract class MovieAbstractController extends Controller {

    /**
     *  Main Template File
     * @var string 
     */
    protected $template = null;
    /**
     * Image Path
     * @var string 
     */
    protected $template_dir = 'movie/';
    /**
     * Tablename
     * @var string
     */
    protected $table = 'wombat_movie';
    /**
     * Movie Repository
     * @var object
     */
    protected $movieRepository = null;
    /**
     * Genre Repository
     * @var object
     */
    protected $genreRepository = null;
    /**
     * Format Repository
     * @var object 
     */
    protected $formatRepository = null;
    /**
     * Rating Repository
     * @var object 
     */
    protected $ratingRepository = null;

    /**
     * Call parent Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Custom constructor
     */
    public function init() {

        $this->template = $this->config->get('template.mainfile');
        $this->tableMovie = $this->config->get('database.tables.movie');
        

        require_once('model/Movie/MovieDataMapper.php');

        try {
            $movieDataMapper = new MovieDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Movie/MovieRepository.php');
        try {
            $this->movieRepository = new MovieRepository($movieDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Genre/GenreDataMapper.php');
        try {
            $genreDataMapper = new GenreDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Genre/GenreRepository.php');
        try {
            $this->genreRepository = new GenreRepository($genreDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Format/FormatDataMapper.php');

        try {
            $formatDataMapper = new FormatDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Format/FormatRepository.php');
        try {
            $this->formatRepository = new FormatRepository($formatDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Rating/RatingDataMapper.php');

        try {
            $ratingDataMapper = new RatingDataMapper($this->db);
        } catch (RatingException $ratingException) {
            die($ratingException);
        }

        require_once('model/Rating/RatingRepository.php');
        try {
            $this->ratingRepository = new RatingRepository($ratingDataMapper);
        } catch (RatingException $ratingException) {
            die($ratingException);
        }
    }

    abstract function index();
}
