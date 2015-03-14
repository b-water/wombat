<?php

require_once('core/Controller.php');

class GenreController extends Controller {

    /**
     * Main View Directory
     */
    const VIEW_DIR = 'genre/';

    /**
     * Tablename
     */
    const TABLE_GENRE = 'wombat_genre';

    /**
     * Genre Repository
     * @var object
     */
    protected $genreRepository = null;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Custom constructor
     */
    public function init() {

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
    }

    public function index() {
        $this->overview();
    }

    public function overview() {
        
    }

    public function single() {
        
    }

    public function autocomplete() {
        if (!isset($_REQUEST['term']) || empty($_REQUEST['term'])) {
            $filter = 'type="movie"';
        } else {
            $filter = 'type="movie" AND name like "' . $_REQUEST['term'] . '%"';
        }
        $data = $this->genreRepository->fetch(array('name as label', 'id as value'), $filter);
        if (!empty($data)) {
            require_once('library/Zend/Json.php');
            $json = Zend_Json::encode($data);
            echo $json;
        }
    }

}
