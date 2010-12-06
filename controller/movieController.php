<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movie
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
        $this->fields = 'id,name,genre,rating,format,date';
    }


    public function index_Action() {

        $movies = $this->movie->getMovies($this->fields);

        $this->smarty->assign('movies', $movies);

        /* add page title */
        $this->smarty->assign('title','Filme');

        $content = $this->smarty->fetch('searchbar.tpl');
        $content .= $this->smarty->fetch('movie.tpl');
        $content .= $this->smarty->fetch('pager.tpl');
        
        $this->smarty->assign('content',$content);

        $this->smarty->display(TEMPLATE_FILE);

    }

    public function search_Action() {
        
        $filter = ' WHERE name like "%' . $_REQUEST['searchbar'] . '%"';
        $movies = $this->movie->getMovies($this->fields, $filter);

        $this->smarty->assign('title','Filme');
        $this->smarty->assign('movies', $movies);
        
        $content = $this->smarty->fetch('searchbar.tpl');
        $content .= $this->smarty->fetch('movie.tpl');

        $this->smarty->assign('content',$content);

        $this->smarty->display(TEMPLATE_FILE);
    }

    public function show_Action() {
        $filter = ' WHERE id = "' . $_REQUEST['id'] . '"';
        $movies = $this->movie->getMovies($this->fields,$filter);
        $this->smarty->assign('movies', $movies);
        $this->smarty->display('movie.tpl');
    }
}

?>
