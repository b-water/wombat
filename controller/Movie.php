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
    const ITEMS_PER_PAGE = 10;

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
        require_once('model/Movie/DataMapper.php');

        try {
            $movieDataMapper = new MovieDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Movie/Repository.php');
        try {
            $this->movieRepository = new MovieRepository($movieDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Genre/DataMapper.php');
        try {
            $genreDataMapper = new GenreDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Genre/Repository.php');
        try {
            $this->genreRepository = new GenreRepository($genreDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Format/DataMapper.php');

        try {
            $formatDataMapper = new FormatDataMapper($this->db);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Format/Repository.php');
        try {
            $this->formatRepository = new FormatRepository($formatDataMapper);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        require_once('model/Rating/DataMapper.php');

        try {
            $ratingDataMapper = new RatingDataMapper($this->db);
        } catch (RatingException $ratingException) {
            die($ratingException);
        }

        require_once('model/Rating/Repository.php');
        try {
            $this->ratingRepository = new RatingRepository($ratingDataMapper);
        } catch (RatingException $ratingException) {
            die($ratingException);
        }
    }

    public function index() {

        if (isset($_REQUEST['search_value']) && !empty($_REQUEST['search_value'])) {
            $filter = self::TABLE . '.title like "%' . $_REQUEST['search_value'] . '%"';
            $search_value = $_REQUEST['search_value'];
        } else {
            $filter = '';
            $search_value = '';
        }

        $page = $this->getCurrentPage();
        $movies = $this->movieRepository->fetch(array('id', 'title', 'rating', 'year'), $filter, '');

        require_once('library/Zend/Paginator.php');
        require_once('library/Zend/Paginator/Adapter/Array.php');
        $pagination = new Zend_Paginator(new Zend_Paginator_Adapter_Array($movies));
        $pagination->setCurrentPageNumber($page);
        $pagination->setItemCountPerPage(self::ITEMS_PER_PAGE);

        $this->view->pagination = $pagination->getPages();
        $this->view->movies = $pagination->getCurrentItems();
        $this->view->pagetitle = 'Filme';
        $this->view->pagesubtitle = 'Übersicht';
        $this->view->search_value = $search_value;
        $this->view->content = $this->view->render(self::VIEW_DIR . 'index.phtml');
        echo $this->view->render(self::VIEW_MAIN);
    }

    public function add() {
        $this->view->content = $this->view->render(self::VIEW_DIR . 'add.phtml');
        echo $this->view->render(self::VIEW_MAIN);
    }

    public function append() {
        
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

        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';

        $this->view->content = $this->view->render(self::VIEW_DIR . 'delete.phtml');
        echo $this->view->render('frame.phtml');
    }

}
