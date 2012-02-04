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
     * Image Path
     * @var string 
     */

    const VIEW_DIR = 'movie/';

    /**
     * Tablename
     * @var string
     */
    const TABLE = 'wombat_movie';

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

    public function __construct() {
        parent::__construct();
    }

    protected function init() {
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

    public function index() {

        $count = $this->movieRepository->count('');

        if (isset($_REQUEST['page']) && intval($_REQUEST['page'] !== 0)) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }

        require_once('core/Pagination.php');
        $options = array(
            'entriesPerPage' => 15,
            'entriesMax' => $count,
            'currentPage' => $page,
            'pageRange' => 10
        );
        $pagination = new Pagination($options);

        $movies = $this->movieRepository->fetch(array('id', 'title', 'rating', 'year'), '', '', $pagination->getEntriesPerPage(), $pagination->getCurrentEntry());

        $this->view->movies = $movies;
        $this->view->movie_count = count($movies);
        $this->view->pagetitle = 'Filme';
        $this->view->pagesubtitle = 'Übersicht';
        $this->view->content = $this->view->render('movie/index.phtml');
        echo $this->view->render('frame.phtml');
    }

    public function single() {

        $filter = self::TABLE . '.id = "' . $this->url->getValue() . '"';

        try {
            $movie = $this->movieRepository->fetch(array('*'), $filter);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        $this->view->movie = $movie[0];
        $this->view->content = $this->view->render('movie/single.phtml');
        echo $this->view->render('frame.phtml');
    }

    public function edit() {

//        $this->smarty->assign('title', 'Film Bearbeiten');
        if (isset($_REQUEST['id']) && intval($_REQUEST['id']) != 0) {
            $filter = self::TABLE . '.id = "' . $_REQUEST['id'] . '"';
        } else {
            throw new MovieException('Id not set!');
        }

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

        $this->view->movie = $movie[0];
        $this->view->format = $format;
        $this->view->rating = $rating;
        $this->view->content = $this->view->render(self::VIEW_DIR . 'edit.phtml');
        echo $this->view->render('frame.phtml');
    }

    public function update() {
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

    // delete
//      public function index() {
//        $this->confirm();
//    }
//
    public function confirm() {
        $this->smarty->assign('title', 'Film Löschen');
        $filter = $this->table . '.id = "' . $this->urlParser->getValue() . '"';

        try {
            $movie = $this->movieRepository->fetch(array('*'), $filter);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        $this->smarty->assign('movie', $movie[0]);
        $content = $this->smarty->fetch($this->template_dir . 'confirm.tpl');
        $this->smarty->assign('content', $content);
        $this->smarty->display($this->template);
    }

    public function delete() {

        $id = $this->url->getValue();

//        try {
//            $success = $this->movieRepository->delete($id);
//        } catch (MovieException $movieException) {
//            echo $movieException->getTraceAsString();
//        }

        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';

        $this->view->content = $this->view->render(self::VIEW_DIR . 'delete.phtml');
        echo $this->view->render('frame.phtml');
    }

    // update
//        public function index() {
//        $this->single();
//    }
//
//    public function single() {
//
//        $this->smarty->assign('title', 'Film Bearbeiten');
//        $filter = $this->table . '.id = "' . $this->urlParser->getValue() . '"';
//
//        try {
//            $movie = $this->movieRepository->fetch(array('*'), $filter);
//        } catch (MovieException $movieException) {
//            die($movieException);
//        }
//
//        try {
//            $format = $this->formatRepository->fetch(array('*'), 'type="movie"');
//        } catch (FormatException $formatException) {
//            die($formatException);
//        }
//
//        try {
//            $rating = $this->ratingRepository->fetch(array('*'), 'type="movie"');
//        } catch (RatingException $ratingException) {
//            die($ratingException);
//        }
//
//        $this->smarty->assign('movie', $movie[0]);
//        $this->smarty->assign('format', $format);
//        $this->smarty->assign('rating', $rating);
//        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');
//        $this->smarty->assign('content', $content);
//        $this->smarty->display($this->template);
//    }
//
//    public function update() {
//        try {
//            $movie = MovieRepository::create($_REQUEST);
//        } catch (MovieException $movieException) {
//            die($movieException);
//        }
//
//        try {
//            $this->movieRepository->update($movie);
//        } catch (MovieException $movieException) {
//            die($movieException);
//        }
//    }
}
