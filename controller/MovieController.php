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

class MovieController extends Controller {

    /**
     *  Main Template File
     * @var string 
     */
    private $template = null;
    /**
     * Image Path
     * @var string 
     */
    private $template_dir = 'movie/';
    /**
     * Tablename
     * @var string
     */
    private $table = 'wombat_movie';
    /**
     * Movie Repository
     * @var object
     */
    private $movieRepository = null;
    /**
     * Genre Repository
     * @var object
     */
    private $genreRepository = null;
    /**
     * Format Repository
     * @var object 
     */
    private $formatRepository = null;
    /**
     * Rating Repository
     * @var object 
     */
    private $ratingRepository = null;

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
        $this->url = Registry::get('url');

        require_once('model/Movie/MovieDataMapper.php');

        try {
            $movieDataMapper = new MovieDataMapper(Registry::get('db'));
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
            $genreDataMapper = new GenreDataMapper(Registry::get('db'));
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
            $formatDataMapper = new FormatDataMapper(Registry::get('db'));
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
            $ratingDataMapper = new RatingDataMapper(Registry::get('db'));
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

    /**
     * @example movie/
     */
    public function index() {


        try {
            $movies = $this->movieRepository->fetchByPage(array('id', 'title', 'rating', 'year'));
        } catch (MovieException $movieException) {
            die($movieException);
            $this->smarty->assign('Exception');
            $this->smarty->display('exception template');
        }

        require_once('model/Movie/MovieViewHelper.php');

        $viewHelper = new MovieViewHelper();
        $pageParams = array('countPages' => $this->movieRepository->getPageCount(),
            'currentPageNumber' => $this->movieRepository->getCurrentPageNumber(),
            'controller' => $this->url->get('controller'),
            'action' => $this->url->get('action'));
        $pages = $viewHelper->buildPages('page', 'dflt_paginator_control.tpl', $pageParams);

        $this->smarty->assign('pages', $pages);
        $this->smarty->assign('movies', $movies);
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch($this->template_dir . 'overview.tpl');
        $content .= $this->smarty->fetch('dflt_paginator_control.tpl');
        $this->smarty->assign('content', $content);

        $this->smarty->display($this->template);
    }

    /**
     * @example movie/show/id/xx
     */
    public function show() {

        $this->smarty->assign('title', 'Film Detailansicht');
        $filter = $this->tableMovie . '.' . $this->url->get('key') . ' = "' . $this->url->get('value') . '"';

        try {
            $movie = $this->movieRepository->fetch(array('*'), $filter);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        $this->smarty->assign('movie', $movie[0]);
        $content = $this->smarty->fetch($this->template_dir . 'show.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->template);
    }

    /**
     * @example movie/edit/id/xx
     */
    public function edit() {

        $this->smarty->assign('title', 'Film Bearbeiten');
        $filter = $this->table . '.id = "' . $this->url->get('value') . '"';

        try {
            $movie = $this->movieRepository->fetch(array('*'), $filter);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        try {
            $format = $this->formatRepository->fetch(array('*'), 'type="movie"');
        } catch (FormatException $formatException) {
            die($formatException);
        }

        try {
            $rating = $this->ratingRepository->fetch(array('*'), 'type="movie"');
        } catch (RatingException $ratingException) {
            die($ratingException);
        }

        $this->smarty->assign('movie', $movie[0]);
        $this->smarty->assign('format', $format);
        $this->smarty->assign('rating', $rating);
        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');
        $this->smarty->assign('content', $content);
        $this->smarty->display($this->template);
    }

    /**
     * @example movie/update/id/xx 
     */
    public function update() {
        /* update the dataset */
        try {
            $movie = MovieRepository::create($_REQUEST);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        try {
            $this->movieRepository->update($movie);
        } catch (MovieException $movieException) {
            die($movieException);
        }
    }

    /**
     * @example movie/delete/id/xx
     */
    public function delete() {

        $id = $this->url->get('value');

        try {
            $success = $this->movieRepository->delete($id);
        } catch (MovieException $movieException) {
            echo $movieException->getTraceAsString();
        }


        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
        $this->smarty->assign('text', $text);
        $this->smarty->display('delete.tpl');
    }

    public function autoComplete() {
        $filter = 'type="movie" AND name like "' . $_REQUEST['q'] . '%"';
        $data = $this->genreRepository->fetch(array('*'), $filter);
        foreach ($data as $item) {
            $name = $item['name'];
            $id = $item['id'];
            echo "$name|$id\n";
        }
    }

}
