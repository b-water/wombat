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
require_once('controller/Movie/Abstract.php');

class MovieShowController extends MovieAbstractController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        try {
            $movies = $this->movieRepository->fetchByPage(array('id', 'title', 'rating', 'year'));
        } catch (MovieException $movieException) {
            die($movieException);
            $this->smarty->assign('Exception');
            $this->smarty->display('exception template');
        }
        
        $this->view->paginator = $this->movieRepository->getPaginator()->getPages('sliding');
        $this->view->movies = $movies;
        $this->view->pagetitle = 'Filme';
        $this->view->pagesubtitle = 'Übersicht';
        $this->view->content = $this->view->render('movie/index.phtml');
        $this->view->content .= $this->view->render('paginator.phtml');
        echo $this->view->render('index.phtml');
    }

    public function single() {

        $this->smarty->assign('title', 'Film Detailansicht');
        $filter = $this->table . '.' . $this->urlParser->getKey() . ' = "' . $this->urlParser->getValue() . '"';

        try {
            $movie = $this->movieRepository->fetch(array('*'), $filter);
        } catch (MovieException $movieException) {
            die($movieException);
        }

        $this->smarty->assign('movie', $movie[0]);
        $content = $this->smarty->fetch($this->template_dir . 'single.tpl');

        $this->smarty->assign('content', $content);

        $this->smarty->display($this->template);
    }

}
