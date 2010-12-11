<?php

/**
 * Description of MovieController
 *
 * @author nico
 */
class MovieController extends BaseController {

    private $movie;
    private $fields;
    private $all_fields;
    private $template_dir = 'movie/';

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function init() {
        $this->movie = Movie::getInstance();
        $this->fields = 'id,name,genre,rating,format,DATE_FORMAT(DATE,"%d.%c.%Y") AS date';
        $this->all_fields = '*';
    }

    public function indexAction() {

        $movies = $this->movie->getMovies($this->fields);

        $this->smarty->assign('movies', $movies);

        /* add page title */
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch('searchbar.tpl');
        $content .= $this->smarty->fetch($this->template_dir . 'all.tpl');
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
        }
    }

    public function showAction() {
        $filter = ' WHERE id = "' . $_REQUEST['id'] . '"';
        $movies = $this->movie->getMovies($this->fields, $filter);
        $this->smarty->assign('movies', $movies);
        $this->smarty->display('movie.tpl');
    }

    public function editAction() {
        
        $this->smarty->assign('title', 'Filme (Bearbeiten)');

        $filter = ' WHERE id = "' . $_REQUEST['id'] . '"';
        $movie = $this->movie->getMovies($this->all_fields, $filter);

        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');

        $this->smarty->assign('content', $content);
        $this->smarty->assign('movie', $movie[0]);

        $this->smarty->display($this->template_dir . 'edit.tpl');
    }

    public function deleteAction() {
        $this->movie->deleteMovie($_REQUEST['id']);
        $this->smarty->display($this->template_dir . 'delete.tpl');
    }

}

?>
