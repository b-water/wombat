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
require_once('controller/MovieAbstract.php');

class MovieController extends MovieAbstractController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        try {
            $movies = $this->movieRepository->fetchByPage(array('id', 'title', 'rating', 'year'));
        } catch (MovieException $movieException) {
            die($movieException);
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

    // delete
//      public function index() {
//        $this->confirm();
//    }
//
//    public function confirm() {
//        $this->smarty->assign('title', 'Film Löschen');
//        $filter = $this->table . '.id = "' . $this->urlParser->getValue() . '"';
//
//        try {
//            $movie = $this->movieRepository->fetch(array('*'), $filter);
//        } catch (MovieException $movieException) {
//            die($movieException);
//        }
//
//        $this->smarty->assign('movie', $movie[0]);
//        $content = $this->smarty->fetch($this->template_dir . 'confirm.tpl');
//        $this->smarty->assign('content', $content);
//        $this->smarty->display($this->template);
//    }
//
//    public function single() {
//
//        $id = $this->urlParser->getValue();
//
//        try {
//            $success = $this->movieRepository->delete($id);
//        } catch (MovieException $movieException) {
//            echo $movieException->getTraceAsString();
//        }
//
//        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
//        $this->smarty->assign('text', $text);
//        $this->smarty->display('delete.tpl');
//    }
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