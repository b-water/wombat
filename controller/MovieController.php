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

        $movies = $this->movie->fetch($this->fields);

        $this->smarty->assign('movie', $movies);

        /* add page title */
        $this->smarty->assign('title', 'Filme');

        $content = $this->smarty->fetch('toolbar.tpl');
        $content .= $this->smarty->fetch('options.tpl');
        $content .= $this->smarty->fetch($this->template_dir . 'index.tpl');
        $content .= $this->smarty->fetch('pager.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    public function searchAction() {

        $filter = ' WHERE name like "%' . $_REQUEST['searchbar'] . '%"';
        $movies = $this->movie->fetch($this->fields, $filter);

        $this->smarty->assign('title', 'Filme (Suche)');
        $this->smarty->assign('movie', $movies);

        $content = $this->smarty->fetch('toolbar.tpl');
        $content .= $this->smarty->fetch($this->template_dir . 'index.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->config->get('TEMPLATE_FILE'));
    }

    public function showAction() {

        $filter = ' WHERE id = "' . $this->url->get('id') . '"';
        $movies = $this->movie->fetch($this->fields, $filter);
        $this->smarty->assign('movie', $movies);
        $this->smarty->display($this->template_dir . 'show.tpl');
    }

    public function editAction() {

        $this->smarty->assign('title', 'Filme (Bearbeiten)');

        $filter = ' WHERE id = "' . $this->url->get('id') . '"';
        $movie = $this->movie->fetch($this->all_fields, $filter);

        $format = $this->movie->getFormat();
        $genre = $this->movie->getGenre();
        $rating = $this->movie->getRating();

        $content = $this->smarty->fetch($this->template_dir . 'edit.tpl');

        $this->smarty->assign('content', $content);
        $this->smarty->assign('format', $format);
        $this->smarty->assign('genre', $genre);
        $this->smarty->assign('rating', $rating);
        $this->smarty->assign('movie', $movie[0]);

        $this->smarty->display($this->template_dir . 'edit.tpl');
    }

    public function updateAction() {

        $test = $this->movie->update($_REQUEST);
    }

    public function deleteAction() {
        $this->movie->delete($this->url->get('id'));
        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
        $this->smarty->assign('text',$text);
        $this->smarty->display('delete.tpl');
    }

    public function operationsAction() {
        $this->smarty->display('operations.tpl');
    }

}