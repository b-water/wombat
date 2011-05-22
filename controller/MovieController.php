<?php

/**
 * Description of MovierController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieController.php
 * @since   13.05.2011 - 23:35:14
 */
class MovieController extends BaseController {

    // The Movie Object
    private $movie;
    private $fields = 'id,name,genre,rating,format,size,DATE_FORMAT(DATE,"%d.%c.%Y") AS date';
    private $all_fields = '*';
    private $template_dir = 'movie/';

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        $this->movie = new Movie();
    }

    public function index() {

        $movies = $this->movie->fetch($this->fields);

        $this->smarty->assign('movie', $movies);

        /* add page title */
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch($this->template_dir . 'overview.tpl');
        $content .= $this->smarty->fetch('pager.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    /**
     * Search through the Movie Database
     */
    public function search() {

        $filter = ' WHERE name like "%' . $_REQUEST['searchbar'] . '%"';
        $movies = $this->movie->fetch($this->fields, $filter);

        $this->smarty->assign('title', 'Filme (Suche)');
        $this->smarty->assign('movie', $movies);

        $content = $this->smarty->fetch('toolbar.tpl');
        $content .= $this->smarty->fetch($this->template_dir . 'index.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    /**
     * Show a single Movie
     */
    public function show() {

        $filter = ' WHERE id = "' . $this->url->get('id') . '"';
        $movies = $this->movie->fetch($this->fields, $filter);
        $this->smarty->assign('movie', $movies);
        $this->smarty->display($this->template_dir . 'single.tpl');
    }

    /**
     * Edit a Movie
     */
    public function edit() {

        $this->smarty->assign('title', 'Film Bearbeiten');

        $filter = 'id = "' . $this->url->get('id') . '"';
        $movie = $this->movie->fetch($this->all_fields, $filter);

        // get all format options
        $formatObj = new Format();

        try {
            $format = $formatObj->fetch('movie');
        } catch (FormatException $formatException) {
            die($formatException);
        }

        // get all rating options
        $ratingObj = new Rating();

        try {
            $rating = $ratingObj->fetch('movie');
        } catch (RatingException $ratingException) {
            die($ratingException);
        }

        // get all genre options
        $genreObj = new Genre();

        try {
            $genre = $genreObj->fetch('movie');
        } catch (GenreException $genreException) {
            die($genreException);
        }

        $this->smarty->assign('format', $format);
        $this->smarty->assign('genre', $genre);
        $this->smarty->assign('rating', $rating);
        $this->smarty->assign('movie', $movie[0]);
//
//        require_once '../library/ckfinder/ckfinder.php' ;
//
//        // You can use the "CKFinder" class to render CKFinder in a page:
//        $finder = new CKFinder() ;
//        $finder->BasePath = '../../' ;	// The path for the installation of CKFinder (default = "/ckfinder/").
//        $finder->SelectFunction = 'ShowFileInfo' ;
//        $finder->Create() ;

        $this->smarty->assign('movie', $movie[0]);

        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');
        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    /**
     * Updates the values of a Movie
     */
    public function update() {
        /* update the dataset */
        try {
            $test = $this->movie->update($_REQUEST);
        } catch (MovieException $movieException) {
            die($movieException);
        }
    }

    /**
     * Deletes a Movie
     */
    public function delete() {
        $this->movie->delete($this->url->get('id'));
        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
        $this->smarty->assign('text', $text);
        $this->smarty->display('delete.tpl');
    }

    public function operations() {
        $this->smarty->display('operations.tpl');
    }

}
