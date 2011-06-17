<?php

/**
 * Description of MovierController
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieController.php
 * @since   13.05.2011 - 23:35:14
 */
require_once('core/Controller.php');
require_once('model/Movie/MovieRepository.php');
require_once('model/Movie/MovieDataMapper.php');
require_once('model/Genre/GenreRepository.php');
require_once('model/Genre/GenreDataMapper.php');

class MovieController extends Controller {

    // The Movie Object
    private $movie;
    private $template;
    private $template_dir = 'movie/';
    private $tableMovie;
    private $movieRepository;
    private $genreRepository;

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        $this->template = $this->config->get('template.mainfile');
        $this->tableMovie = $this->config->get('database.tables.movie');
        
        $movieDataMapper = new MovieDataMapper(Registry::get('db'));
        $this->movieRepository = new MovieRepository($movieDataMapper);
        
        $genreDataMapper = new GenreDataMapper(Registry::get('db'));
        $this->genreRepository = new GenreRepository($genreDataMapper);
    }

    public function index() {

        $movies = $this->movieRepository->fetch(array('id', 'title', 'rating'));
//        $genre = $this->genreRepository->fetch(array('*'));

        $this->smarty->assign('movies', $movies);
        
        /* add page title */
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch($this->template_dir . 'overview.tpl');
        $content .= $this->smarty->fetch('pager.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->template);
    }

    /**
     * show a single Movie
     */
    public function show() {

        $this->smarty->assign('title', 'Film Detailansicht');
        $filter = $this->tableMovie . '.' . $this->url->get('key') . ' = "' . $this->url->get('value') . '"';
//        $movie = $this->movie->fetch('*', $filter);
        $movie = $this->movieRepository->fetch(array('*'), $filter);

        $this->smarty->assign('movie', $movie[0]);
        $content = $this->smarty->fetch($this->template_dir . 'show.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->template);
    }

    /**
     * Edit a Movie
     */
    public function edit() {

        $this->smarty->assign('title', 'Film Bearbeiten');
        $filter = $this->tableMovie . '.' . $this->url->get('key') . ' = "' . $this->url->get('value') . '"';
        $movie = $this->movieRepository->fetch(array('*'), $filter);

        // gather Meta Information
//        $genre2 = new Genre();
//        $genre = $genre2->fetch('movie');
//        $genre = $this->movie->fetchGenre();
//        $format = $this->movie->fetchFormat();
//        $rating = $this->movie->fetchRating();

        // assign smarty variables
//        $this->smarty->assign('format', $format);
////        $this->smarty->assign('genre', $genre);
//        $this->smarty->assign('rating', $rating);
        $this->smarty->assign('movie', $movie[0]);

        // fetches smarty templates
        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');
        $this->smarty->assign('content', $content);

        // display smarty templates
        $this->smarty->display($this->template);
    }

    /**
     * Updates the values of a Movie
     */
    public function update() {
        /* update the dataset */
        try {
            $this->movie->update($_REQUEST);
        } catch (MovieException $movieException) {
            die($movieException);
        }
    }

    /**
     * Deletes a Movie
     */
    public function delete() {
        $this->movie->delete($this->url->get('value'));
        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
        $this->smarty->assign('text', $text);
        $this->smarty->display('delete.tpl');
    }

    public function autoCompleteGenre() {
//        $genre = $this->movie->fetchGenre();
        $genre = new Genre();
        $genre_data = $genre->fetch('movie');

        var_dump($genre_data);

        foreach ($genre_data as $item) {
//            if (strpos(strtolower($item['title']), $q) !== false) {
//            echo $item['title'] . '|' . $item['id'] . '';
//            if (strpos(strtolower($item['title']), $q) !== false) {
            $key = $item['title'];
            $value = $item['id'];
            echo "$key|$value\n";
//            }
//            }
        }

//        var_dump($data);
    }

}
