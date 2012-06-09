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
 * @copyright  Copyright (c) 2010-2012 Nico Schmitz
 * @since 10.06.2012
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
require_once('core/Controller.php');

class ApothecariumController extends Controller {

    const VIEW_DIR = 'apothecarium/';
    const REALM = 'Vek\'lor';
    const LOCALE = 'de_DE';
    const REGION = 'EU';
    const CHARACTER = 'Sharnazadh';
    const USE_CACHE = true;
    const UTF8 = true;
    const CACHE_TTL = 86400; 

    private $armory;

    public function __construct() {
        parent::__construct();
    }

    protected function init() {

        $GLOBALS['wowarmory']['db']['driver'] = $this->config->get('database.driver'); // Dont change. Only mysql supported so far.
        $GLOBALS['wowarmory']['db']['hostname'] = $this->config->get('database.host'); // Hostname of server. 
        $GLOBALS['wowarmory']['db']['dbname'] = $this->config->get('database.dbname'); //Name of your database
        $GLOBALS['wowarmory']['db']['username'] = $this->config->get('database.user'); //Insert your database username
        $GLOBALS['wowarmory']['db']['password'] = $this->config->get('database.password'); //Insert your database password
        // Only use the two below if you have received API keys from Blizzard.
        $GLOBALS['wowarmory']['keys']['private'] = $this->config->get('wow.blizzard.api.private'); // if you have an API key from Blizzard
        $GLOBALS['wowarmory']['keys']['public'] = $this->config->get('wow.blizzard.api.public'); // if you have an API key from Blizzard

        require_once('library/wowarmoryapi/BattlenetArmory.class.php');

        $this->armory = new BattlenetArmory(self::REGION, self::REALM);
        $this->armory->setLocale(self::LOCALE);
        $this->armory->useCache(self::USE_CACHE);
        $this->armory->UTF8(self::UTF8);
        $this->armory->setCharactersCacheTTL(self::CACHE_TTL);
        $this->armory->setGuildsCacheTTL(self::CACHE_TTL);
        $this->armory->setArenaTeamsCacheTTL(self::CACHE_TTL);
        $this->armory->setAchievementsCacheTTL(self::CACHE_TTL);
        $this->armory->setItemsCacheTTL(self::CACHE_TTL);
    }

    public function index() {

        $character = $this->armory->getCharacter(self::CHARACTER);

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

//            var_dump($gear);
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

}
