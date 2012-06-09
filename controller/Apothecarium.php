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

class ApothecariumController extends Controller {

    const VIEW_DIR = 'apothecarium/';

    private $armory;

    public function __construct() {
        parent::__construct();
    }

    protected function init() {

        $GLOBALS['wowarmory']['db']['driver'] = 'mysql'; // Dont change. Only mysql supported so far.
        $GLOBALS['wowarmory']['db']['hostname'] = '127.0.0.1'; // Hostname of server. 
        $GLOBALS['wowarmory']['db']['dbname'] = 'wombat'; //Name of your database
        $GLOBALS['wowarmory']['db']['username'] = 'root'; //Insert your database username
        $GLOBALS['wowarmory']['db']['password'] = ''; //Insert your database password
        // Only use the two below if you have received API keys from Blizzard.
        $GLOBALS['wowarmory']['keys']['private'] = ''; // if you have an API key from Blizzard
        $GLOBALS['wowarmory']['keys']['public'] = ''; // if you have an API key from Blizzard

        require_once('library/wowarmoryapi/BattlenetArmory.class.php');

        $this->armory = new BattlenetArmory('EU', 'Vek\'lor');
        $this->armory->setLocale('de_DE');
    }

    public function index() {

        $character = $this->armory->getCharacter('Sharnazadh');

        if ($character->isValid()) {

            $gear = array();
            $slots = array('head' => 'Kopf', 'neck' => 'Hals', 'shoulder' => 'Schultern', 'back' => 'Umhang', 'chest' => 'Brust',
                'wrist' => 'Armschienen', 'hands' => 'Handschuhe', 'waist' => 'Taille', 'legs' => 'Beine', 'feet' => 'Füße', 'finger1' => 'Ring', 'finger2' => 'Ring',
                'trinket1' => 'Trinket', 'trinket2' => 'Trinket', 'mainHand' => 'Main Hand', 'offHand' => 'Off Hand', 'ranged' => 'Ranged');

            $wowhead_url = $this->config->get('wow.wowhead.url');
            $this->view->wowhead_url = $wowhead_url;

            foreach ($slots as $slot => $slot_de) {
                $gear[$slot] = $character->getItemSlot($slot);
                $item = $this->armory->getItem($gear[$slot]['id']);
                $gear[$slot]['icon_img'] = $item->getIcon(18);
                $gear[$slot]['slot_en'] = $slot;
                $gear[$slot]['slot_de'] = $slot_de;
                $gear[$slot]['enchant'] = array();
                $gear[$slot]['gems'] = array();
                $gear[$slot]['url'] = $wowhead_url . 'item=' . $gear[$slot]['id'] . '';
                $gear[$slot]['url_gems'] = 'gems=';
                $gear[$slot]['url_enchant'] = 'ench=';
                $gear[$slot]['url_set'] = 'pcs=';
                foreach ($gear[$slot]['tooltipParams'] as $type => $param) {
                    if (substr($type, 0, 3) == 'gem') {
                        $gear[$slot]['url_gems'] .= $param . ':';
                        $gear[$slot]['gems'][] = $this->armory->getItem($param);
                    } elseif ($type == 'enchant') {
                        $gear[$slot]['url_enchant'] .= $param . ':';
                        $gear[$slot]['enchant'] = $this->armory->getItem($param);
                    } elseif (is_array($param) && $type == 'set') {
                        foreach ($param as $set_item) {
                            $gear[$slot]['url_set'] .= $set_item . ':';
                        }
                    }
                }
            }

            var_dump($gear);

//            $talents = $character->getTalents();

//            $speccs = array($talents[0]['name'],$talents[1]['name']);
//            var_dump($gear);

            $this->view->level = $character->getLevel();
            $this->view->gear = $gear;
            $this->view->pagetitle = 'Apothecarium';
            $this->view->pagesubtitle = 'Übersicht';
            $this->view->thumbnail = $character->getProfileInsetURL();
            $this->view->class = $character->getClassName();
            $this->view->race = $character->getRaceName();
            $this->view->content = $this->view->render(self::VIEW_DIR . 'index.phtml');
            echo $this->view->render('frame.phtml');
        }

//        var_dump($raidprogress = $character->getRaidStats());
//        var_dump($stats = $character->getStats());
//        var_dump($headslot = $character->getItemSlot('head'));
//        var_dump($talents = $character->getTalents());
//        var_dump($character);
    }

//
//    public function single() {
//
//        $filter = self::TABLE . '.id = "' . $this->url->getValue() . '"';
//
//        try {
//            $movie = $this->movieRepository->fetch(array('*'), $filter);
//        } catch (MovieException $movieException) {
//            die($movieException);
//        }
//
//        $this->view->movie = $movie[0];
//        $this->view->content = $this->view->render('movie/single.phtml');
//        echo $this->view->render('frame.phtml');
//    }
//
//    public function edit() {
//
////        $this->smarty->assign('title', 'Film Bearbeiten');
//        if (isset($_REQUEST['id']) && intval($_REQUEST['id']) != 0) {
//            $filter = self::TABLE . '.id = "' . $_REQUEST['id'] . '"';
//        } else {
//            throw new MovieException('Id not set!');
//        }
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
//        $this->view->movie = $movie[0];
//        $this->view->format = $format;
//        $this->view->rating = $rating;
//        $this->view->content = $this->view->render(self::VIEW_DIR . 'edit.phtml');
//        echo $this->view->render('frame.phtml');
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
//
//    // delete
////      public function index() {
////        $this->confirm();
////    }
////
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
//    public function delete() {
//
//        $id = $this->url->getValue();
//
////        try {
////            $success = $this->movieRepository->delete($id);
////        } catch (MovieException $movieException) {
////            echo $movieException->getTraceAsString();
////        }
//
//        $text = 'Der Film wurde erfolgreich aus der Datenbank gel&ouml;scht!';
//
//        $this->view->content = $this->view->render(self::VIEW_DIR . 'delete.phtml');
//        echo $this->view->render('frame.phtml');
//    }
}
