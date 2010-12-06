<?php

/**
 * Description of MovieController
 *
 * @author nico
 */
class MovieController extends MainController {

    private $movie;
    private $fields;

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        $this->movie = Movie::getInstance();
        $this->fields = 'id,name,genre,rating,format,DATE_FORMAT(DATE,"%d.%c.%Y") AS date';
    }

    public function indexAction() {

        $movies = $this->movie->getMovies($this->fields);

        echo '<pre>';
        print_r($movies);
        echo '</pre>';

        $this->smarty->assign('movies', $movies);

        /* add page title */
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch('searchbar.tpl');
        $content .= $this->smarty->fetch('movie.tpl');
        $content .= $this->smarty->fetch('pager.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    public function searchAction() {

        if (isset($_REQUEST['searchbar'])) {
            $filter = ' WHERE name like "%' . $_REQUEST['searchbar'] . '%"';
            $movies = $this->movie->getMovies($this->fields, $filter);

            $this->smarty->assign('title', 'Filme (Suche)');
            $this->smarty->assign('movies', $movies);

            $content = $this->smarty->fetch('searchbar.tpl');
            $content .= $this->smarty->fetch('movie.tpl');

            $this->smarty->assign('content', $content);

            $this->smarty->display($this->config->get('TEMPLATE_FILE'));
        } else {
            throw new MovieException('Es ist kein Filter gesetzt!');
        }
    }

    public function showAction() {
        $filter = ' WHERE id = "' . $_REQUEST['id'] . '"';
        $movies = $this->movie->getMovies($this->fields, $filter);
        $this->smarty->assign('movies', $movies);
        $this->smarty->display('movie.tpl');
    }

    public function editAction() {

    }

    public function deleteAction() {
        $this->movie->deleteMovie($_REQUEST['id']);
        echo 'Datensatz wurde gelöscht';
    }

}

?>
