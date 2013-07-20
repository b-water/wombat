-- --------------------------------------------------------
-- Host:                         fluxkompensator
-- Server version:               5.5.31-0ubuntu0.12.04.2-log - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-07-20 18:59:01
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for wombat
DROP DATABASE IF EXISTS `wombat`;
CREATE DATABASE IF NOT EXISTS `wombat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wombat`;


-- Dumping structure for table wombat.wombat_activites
DROP TABLE IF EXISTS `wombat_activites`;
CREATE TABLE IF NOT EXISTS `wombat_activites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `timestamp` datetime NOT NULL,
  `table` varchar(45) CHARACTER SET latin1 NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_activites: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_activites` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_activites` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_artist
DROP TABLE IF EXISTS `wombat_artist`;
CREATE TABLE IF NOT EXISTS `wombat_artist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_artist: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_artist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_artist` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_artist_assoc
DROP TABLE IF EXISTS `wombat_artist_assoc`;
CREATE TABLE IF NOT EXISTS `wombat_artist_assoc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `table` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `TABLE` (`table`) USING BTREE,
  KEY `TABLE_ID` (`table_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_artist_assoc: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_artist_assoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_artist_assoc` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_format
DROP TABLE IF EXISTS `wombat_format`;
CREATE TABLE IF NOT EXISTS `wombat_format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_format: ~6 rows (approximately)
/*!40000 ALTER TABLE `wombat_format` DISABLE KEYS */;
INSERT INTO `wombat_format` (`id`, `type`, `name`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(8, 'movie', 'R5', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(9, 'movie', 'DVD Rip', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(10, 'movie', 'HD Rip', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(13, 'movie', '1080p Blu-Ray', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(14, 'movie', '720p Blu-Ray', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(15, 'movie', '480p Blu-Ray', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `wombat_format` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_genre
DROP TABLE IF EXISTS `wombat_genre`;
CREATE TABLE IF NOT EXISTS `wombat_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE,
  KEY `NAME` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_genre: ~11 rows (approximately)
/*!40000 ALTER TABLE `wombat_genre` DISABLE KEYS */;
INSERT INTO `wombat_genre` (`id`, `type`, `name`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(12, 'movie', 'Action', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(13, 'movie', 'Drama', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(14, 'movie', 'Thriller', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(15, 'movie', 'Science-Fiction', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(16, 'movie', 'Horror', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(17, 'movie', 'Komödie', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(18, 'movie', 'Dokumentation', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(19, 'movie', 'Psycho-Thriller', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(20, 'movie', 'Krimi', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(21, 'movie', 'Abenteuer', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(22, 'movie', 'Romantik', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `wombat_genre` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_genre_assoc
DROP TABLE IF EXISTS `wombat_genre_assoc`;
CREATE TABLE IF NOT EXISTS `wombat_genre_assoc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `table` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TABLE` (`table`) USING BTREE,
  KEY `TABLE_ID` (`table_id`) USING BTREE,
  KEY `GENRE_ID` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_genre_assoc: ~4 rows (approximately)
/*!40000 ALTER TABLE `wombat_genre_assoc` DISABLE KEYS */;
INSERT INTO `wombat_genre_assoc` (`id`, `genre_id`, `table_id`, `table`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(195, 6, 14, 'movie', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(196, 11, 14, 'movie', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(215, 18, 379, 'movie', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(216, 13, 379, 'movie', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `wombat_genre_assoc` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_movie
DROP TABLE IF EXISTS `wombat_movie`;
CREATE TABLE IF NOT EXISTS `wombat_movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `rating` int(4) unsigned NOT NULL,
  `format` int(4) unsigned NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `duration` int(3) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TITLE` (`title`) USING BTREE,
  KEY `USER_ID` (`user_id`),
  KEY `LAST_CHANGE` (`last_change`),
  KEY `CREATED` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=719 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_movie: ~388 rows (approximately)
/*!40000 ALTER TABLE `wombat_movie` DISABLE KEYS */;
INSERT INTO `wombat_movie` (`id`, `user_id`, `title`, `description`, `rating`, `format`, `trailer`, `image`, `year`, `duration`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(379, 0, 'Beim ersten Mal', 'Ben Stone, ein aus Kanada stammender 23-jähriger, der ohne Aufenthaltserlaubnis in den USA wohnt, hat keinen Job und lebt von dem knappen Geld, das er vor 10 Jahren als Entschädigung erhalten hat, als er von einem Post-Fahrzeug angefahren wurde. Der etwas infantile und wenig ehrgeizige Ben lebt in einem Haus zusammen mit seinen Freunden, die, ebenso wie er, in erster Linie nur Spaß haben wollen und Drogen wie Marihuana oder Magic Mushrooms nicht abgeneigt sind. Gemeinsam haben sie den Plan, eine Webseite zu eröffnen, welche die exakte Dauer von Nacktszenen bekannter Schauspielerinnen in Filmen auflistet.\r\n\r\nAlison Scott lebt im Haus von Schwester Debbie, die einen Mann und zwei Kinder hat. Alison ist eine verantwortungsbewusste, ehrgeizige Frau, die beim Fernsehsender E! Entertainment Television arbeitet und gerade befördert wurde: Sie soll anstatt als Assistentin hinter der Kamera von nun an vor der Kamera Prominente interviewen. Alison will das zusammen mit ihrer Schwester feiern und beide gehen am Abend in einen Club.\r\n\r\nDort treffen sie zufällig auf Ben und seine Freunde. Ben und Alison trinken und tanzen gemeinsam und landen schließlich im Bett von Alison, wo es zum One-Night-Stand kommt. Ben soll ein Kondom benutzen, hat aber Probleme mit dem Überstreifen. Nachdem die erregte Alison ungeduldig wird, wirft er es neben das Bett und schläft mit ihr. Am darauffolgenden Morgen beschließen die beiden, getrennte Wege zu gehen, da sie nur wenig gemeinsam haben. Acht Wochen später stellt Alison fest, dass sie schwanger ist und kontaktiert Ben deswegen.\r\n\r\nIn einer Parallelhandlung wird die Geschichte von Alisons Schwester Debbie und deren Problemen mit ihrem Ehemann Pete gezeigt. Debbie verdächtigt Pete der Untreue. Es stellt sich jedoch heraus, dass er nur ab und an eine Auszeit vom Eheleben benötigt und ohne sie ins Kino geht oder mit Freunden Fantasy-Baseball spielt.\r\n\r\nAlison will das Kind behalten und auch der Beziehung mit dem „Loser“ Ben eine Chance geben. Ben will unbedingt ein gemeinsames Leben mit Alison, da er sich inzwischen klar darüber geworden ist, dass er sie liebt. Ben möchte Verantwortung übernehmen und beginnt Schwangerschafts-Literatur zu lesen und findet auch einen Job als Webdesigner. Er schafft es, sich von seinem regelmäßígen Marihuana-Rausch und den kindischen Freunden zu lösen und sucht sich eine eigene Wohnung.\r\n\r\nNachdem Alison ihrem Arbeitgeber ihre Schwangerschaft nicht mehr verheimlichen kann, wird sie zu ihrem Vorgesetzten zitiert. Es folgt überraschenderweise nicht der Rausschmiss, sondern die Beförderung zu einer eigenen „Schwangerschafts-Show“. Zum Happy End kommt es bei der Geburt der gemeinsamen Tochter.', 7, 13, 'http://www.youtube.com/watch?v=1vP1ypnT6yo', 'files/movie/379.jpg', 2007, 129, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(380, 0, 'Berlin Calling', 'Der Berliner DJ und Produzent Martin Karow, genannt Ickarus, tourt mit seiner Managerin und Freundin Mathilde durch die Tanzclubs der Welt. Zudem möchte er bald sein neues Album veröffentlichen. Um die Tage und Nächte durchzuhalten, nimmt er aufputschende Drogen, die er von seinem Freund Erbse bekommt. Nachdem Ickarus jedoch bei einem Auftritt eine PMA-haltige Ecstasy-Tablette konsumiert hat, erleidet er eine drogeninduzierte Psychose. Er bewegt sich alleine durch die Stadt, reißt sich die Kleider vom Leib. Am nächsten Morgen, noch immer unter Drogen stehend, frühstückt er in einem Hotel, wo er mit seinem Essverhalten die Aufmerksamkeit des Hotelpersonals auf sich zieht. Daraufhin wird er in eine Berliner Nervenklinik eingeliefert, was die Veröffentlichung seines Albums und seine nächsten Auftritte stark gefährdet.\r\n\r\nIn der Klinik lernt er unter anderem Patienten kennen, die Crystal Pete und Goa Gebhard genannt werden. Die Ärztin Dr. Paul rät Ickarus dazu, eine Ruhepause unter ihrer Aufsicht einzulegen. Sie betont dabei auch die Freiwilligkeit seines Aufenthalt in der Klinik. Ickarus möchte dennoch an seinem Album weiterarbeiten und lässt sich sein Notebook und seinen MIDI-Controller in die Klinik bringen. Daneben entfernt er sich mehrmals von der Klinik, besucht Veranstaltungen und nimmt weiterhin Drogen zu sich. Alice, die Chefin des Plattenlabels Vinyl Distortion, sagt bei Mathilde die Veröffentlichung des neuen Albums ab. Daraufhin zertrümmert Ickarus ihr Büro.\r\n\r\nMathilde verlässt die gemeinsame Wohnung und tröstet sich mit der lesbischen Türsteherin Corinna. Nachdem Ickarus dies bemerkt hat und zudem das Finanzamt in einem Brief 25.000 Euro an Steuern von ihm nachfordert, versucht er, Mathilde bei Corinna aufzusuchen, aber Mathilde will ihn nicht sehen. Die Klinikleiterin erklärt Ickarus, er könne nicht in der Klinik bleiben, weil er die Therapieanweisungen nicht befolgt und unabgesprochen die Klinik verlässt. Ickarus überredet daraufhin abends einen Zivi, eine Abschiedsparty in der Klinik geben zu dürfen und besorgt dafür Alkohol, Prostituierte und Drogen. Dies hat zur Konsequenz, dass er in die geschlossene Abteilung der Klinik überwiesen wird.\r\n\r\nMathilde und der Vater von Ickarus kämpfen um seine Entlassung. Nachdem sein Label ihn wieder aufnimmt, möchte Ickarus sein Album zunächst unter dem Namen Titten, Techno & Trompeten veröffentlichen. Doch die Plattenfirma entscheidet sich für den Namen Berlin Calling und ein Covershooting für das Album in der Klinik.', 7, 8, '123456789', 'files/movie/15.jpg', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(381, 0, 'Borat', '', 7, 8, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(382, 0, 'Braveheart', '', 4, 4, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(383, 0, 'Brüno', '', 5, 5, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(384, 0, 'Butterfly Effect 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(385, 0, 'Chuck & Larry', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(386, 0, 'Dreamcatcher', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(387, 0, 'Cleaner Sein Geschäft ist der Tod', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(388, 0, 'Cloverfield', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(389, 0, 'College', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(390, 0, 'Constantine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(391, 0, 'Crank 2 High Voltage', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(392, 0, 'Das Streben nach Glück', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(394, 0, 'Defiance Unbeugsam', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(395, 0, 'Deja Vu', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(396, 0, 'Departed unter Feinden', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(397, 0, 'Der Untergang', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(398, 0, 'Der Vorleser', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(399, 0, 'Der Womanizer', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(400, 0, 'Der Ja Sager', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(401, 0, 'Der Anschlag', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(402, 0, 'Der Knochenjäger', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(403, 0, 'Der Tag an dem die Erde Stillstand', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(404, 0, 'Die Herzogin', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(405, 0, 'Die Entführung der U-Bahn Pelham 123', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(406, 0, 'Die Herrschaft des Feuers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(407, 0, 'Die Mumie 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(408, 0, 'Die nackte Wahrheit', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(409, 0, 'Die Reise des chinesischen Trommerls', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(410, 0, 'District 9', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(411, 0, 'Disturbia', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(412, 0, 'Doom der Film', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(413, 0, 'Drag Me To Hell', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(414, 0, 'Ein Mann im Fadenkreuz', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(415, 0, 'Evan Allmächtig', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(416, 0, 'Fight Club', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(417, 0, 'Final Destination', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(418, 0, 'Fluch der Karibik 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(419, 0, 'Fluch der Karibik 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(420, 0, 'Fluch der Karibik 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(421, 0, 'Four Borthers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(422, 0, 'Freitag der 13', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(423, 0, 'Gangs of New York', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(424, 0, 'Gladiator', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(425, 0, 'Gran Torino', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(426, 0, 'Hancock', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(427, 0, 'Harry Potter und der Stein der Weisen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(428, 0, 'Harry Potter und der Feuerkelch', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(429, 0, 'Harry Potter und der Halblutprinz', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(430, 0, 'Hellboy 2 Die Goldene Armee', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(431, 0, 'Hero', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(432, 0, 'Herr der Ringe Die Gefährten', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(433, 0, 'Herr der Ringe Die Zwei Türme', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(434, 0, 'Herr der Ringe Die Rückkehr des Königs', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(435, 0, 'Hitch', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(436, 0, 'Hitman Codename 47', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(437, 0, 'Hooligans', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(438, 0, 'I Am Legend', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(439, 0, 'Ich Du und der andere', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(440, 0, 'Inglorious Bastards', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(441, 0, 'Insider', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(442, 0, 'I Robot', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(443, 0, 'Iron Man', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(444, 0, 'Jagdfieber', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(445, 0, 'James Bond Ein Quantum Trost', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(446, 0, 'Jumper', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(447, 0, 'Kein Bund fürs Leben', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(448, 0, 'Kein Ohr Hasen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(449, 0, 'King Kond Extended', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(450, 0, 'Klick!', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(451, 0, 'Knowing', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(452, 0, 'König der Löwen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(453, 0, 'Könige der Wellen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(454, 0, 'Kung Fu Panda', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(455, 0, 'Lakeview Terrace', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(456, 0, 'Leg dich nicht mit Zohan an', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(457, 0, 'Little Man', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(458, 0, 'Lizenz zum Heiraten', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(459, 0, 'LOL', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(460, 0, 'Madagaskar', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(461, 0, 'Mamma Mia', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(462, 0, 'Marley und Ich', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(463, 0, 'Meine Frau die Spartaner und Ich', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(464, 0, 'Mensch Dave', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(465, 0, 'Minority Report', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(466, 0, 'Mitten ins Herz', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(467, 0, 'Mr und Mrs Smith', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(468, 0, 'My Bloody Valentine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(469, 0, 'Nachts im Museum', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(470, 0, 'Nachts im Museum 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(471, 0, 'Nie wieder Sex mit der Ex', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(472, 0, 'Oben', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(473, 0, 'Oceans Thirteen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(474, 0, 'Old School', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(475, 0, 'P.S Ich Liebe Dich', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(476, 0, 'Pulp Fiction', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(477, 0, 'Push', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(478, 0, 'Ratatouille', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(479, 0, 'Ray', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(480, 0, 'Reign Over Me / Die Liebe in mir', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(481, 0, 'Reine Nervensache', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(482, 0, 'Reine Nervensache 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(483, 0, 'Requiem for a Dream', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(484, 0, 'Rock n Rolla', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(485, 0, 'Rush Hour 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(486, 0, 'Saw 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(487, 0, 'Saw 4', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(488, 0, 'Saw 5', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(489, 0, 'Selbst ist die Braut', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(490, 0, 'Shadowboxer', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(491, 0, 'Shrek 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(492, 0, 'Shrek 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(493, 0, 'Shrek 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(494, 0, 'Sieben Leben', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(495, 0, 'Silent Hill', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(496, 0, 'Sin City', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(497, 0, 'Slumdog Millionär', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(498, 0, 'Smoking Aces', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(499, 0, 'Star Wars Episode 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(500, 0, 'Star Wars Episode 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(501, 0, 'Star Wars Episode 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(502, 0, 'Star Wars Episode 4', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(503, 0, 'Star Wars Episode 5', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(504, 0, 'Star Wars Episode 6', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(505, 0, 'Stirb Langsam 4.0', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(506, 0, 'Stirb Langsam jetzt erst recht', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(507, 0, 'Superbad', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(508, 0, 'Terminator 4 Die Erlösung', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(509, 0, 'Thank you for Smoking', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(510, 0, 'The Road to Guantanamo', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(511, 0, 'The Strangers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(512, 0, 'The Weather Men', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(513, 0, 'The Girl Next Door', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(514, 0, 'The Good German', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(515, 0, 'The Green Mile', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(516, 0, 'The Hills Have Eyes', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(517, 0, 'The Italian Job', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(518, 0, 'The Lucky Ones', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(519, 0, 'Tödliches Kommando The Hurt Locker', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(520, 0, 'Training Day', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(521, 0, 'Transporter 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(522, 0, 'Twilight Biss zum Morgengrauen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(523, 0, 'Wanted', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(524, 0, 'Welcome to the Jungle', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(525, 0, 'Wir waren Helden', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(526, 0, 'Eagle Eye', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(527, 0, 'Fanboys', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(528, 0, 'X-Men 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(529, 0, 'X-Men Origins Wolverine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(530, 0, 'Oceans Twelve', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(531, 0, 'Observe and Report', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(532, 0, 'Die Welle', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(533, 0, 'Die Ludolfs der Film', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(534, 0, 'Die Jagd zum Magischen Berg', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(535, 0, 'Prinzessin Mononoke', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(536, 0, 'The Reaping', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(537, 0, 'The Hills Have Eyes 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(538, 0, 'Max Payne Extendet Edition', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(539, 0, 'House Bunny', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(540, 0, 'Garden State', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(541, 0, 'Salvador', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(542, 0, 'Last Samurai', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(543, 0, 'Iluminati', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(544, 0, 'Sex and Death', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(545, 0, 'Wall E', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(546, 0, 'No Country for Old Men', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(547, 0, 'Ein Duke kommt selten alleine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(548, 0, 'Fear and Loathing in Las Vegas', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(549, 0, 'Blood The Last Vampire', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(550, 0, 'Lost in Translation', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(551, 0, 'Der Blutige Pfad Gottes', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(552, 0, 'Collateral Damage', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(553, 0, 'Der Unglaubliche Hulk', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(554, 0, 'Lucky Number Slevin', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(555, 0, 'Ong Bak', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(556, 0, 'X-Men 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(557, 0, 'Obsessed', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(558, 0, 'Hulk', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(559, 0, 'Punisher 2 War Zone', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(560, 0, 'Krieg der Welten', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(561, 0, 'Fantastic Four 2 Rise of the Silver Surfer', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(562, 0, 'Resident Evil Extinction', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(563, 0, 'Kaufhaus Cop', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(564, 0, 'Resident Evil Apocalypse', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(565, 0, 'Public Enemies', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(566, 0, 'Get Smart', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(567, 0, 'Transformers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(568, 0, 'Ritter aus Leidenschaft', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(569, 0, 'Star Trek', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(570, 0, 'Stealth unter dem Radar', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(571, 0, 'Gamer', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(572, 0, 'Gesetz der Rache', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(573, 0, 'Party Animals Van Wilder', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(574, 0, 'Sweeny Todd', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(575, 0, 'Final Destination 4', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(576, 0, 'Hangover', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(577, 0, 'Doghouse', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(578, 0, 'Final Call', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(579, 0, 'Outlander', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(580, 0, 'Die Purpurenen Flüsse 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(581, 0, 'Die Purpurenen Flüsse 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(582, 0, 'Saw 6', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(583, 0, 'Shoot Em Up', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(584, 0, 'Streets of London', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(585, 0, 'Unbreakable Unzerbrechlich', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(586, 0, 'V wie Vendetta', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(587, 0, 'Walk the Line', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(588, 0, 'Zatoichi der Blinde Samurai', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(589, 0, 'Zombieland', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(590, 0, 'Carriers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(591, 0, 'Das Vermächtnis der Tempelritter', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(592, 0, 'Flags of our Fathers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(593, 0, 'Forrest Gump', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(594, 0, 'Full Metal Jacket', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(595, 0, 'Ice Age 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(596, 0, 'Die Klumps', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(597, 0, 'Sunshine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(598, 0, 'Transformers Die Rache', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(599, 0, 'Wie das Leben so spielt', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(600, 0, 'Collateral', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(601, 0, 'Die Ermodung des Jesse James durch den Feigli', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(602, 0, 'Dragonheart 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(603, 0, 'King Arthur', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(604, 0, 'Contract Killers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(605, 0, 'Mr. Deeds', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(606, 0, 'Das Karbinett des Dr. Parnassus', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(607, 0, 'Das Leben des Brian', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(608, 0, 'Der Talentierte Mr. Ripley', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(609, 0, 'Der Pate 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(610, 0, 'Der Pate 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(611, 0, 'Der Pate 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(612, 0, 'Der Polarexpress', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(613, 0, 'Der Solist', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(614, 0, 'Die Monster AG', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(615, 0, 'Dragonheart 2 Ein Neuer Anfang', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(616, 0, 'Dumm und Dümmer', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(617, 0, 'Edward mit den Scherenhänden', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(618, 0, 'Freddy vs Jason', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(619, 0, 'GI Joe Geheimauftrag Cobra', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(620, 0, 'Halloween 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(621, 0, 'Hannibal', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(622, 0, 'Hannibal Rising', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(623, 0, 'Happy Gilmore', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(624, 0, 'Horsemen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(625, 0, 'Jede Sekunde zählt The Guardian', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(626, 0, 'Lieber Verliebt', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(627, 0, 'Pathfinder Fährte des Kriegers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(628, 0, 'Pitch Black', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(629, 0, 'S Darko eine Donny Darko Saga', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(630, 0, 'Scream 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(631, 0, 'Scream 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(632, 0, 'Scream 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(633, 0, 'Sherlock Holmes', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(634, 0, 'Staunton Hill', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(635, 0, 'The Butterfly Effect', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(636, 0, 'Street Kings', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(637, 0, 'The Core', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(638, 0, 'The Good The Bad The Weird', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(639, 0, 'The Nightmare before Christmas', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(640, 0, 'The Score', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(641, 0, 'Timeline', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(642, 0, 'Tränen der Sonne', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(643, 0, 'Tropic Thunder', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(644, 0, 'Van Helsing', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(645, 0, 'Whatever Works', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(646, 0, 'Willkommen bei den Schtis', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(647, 0, 'Wrong Turn 2 Dead End', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(648, 0, 'Wrong Turn 3 Left for Dead', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(649, 0, 'Jumanji', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(650, 0, 'Donnie Darko', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(651, 0, 'Eine Handvoll Gras', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(652, 0, 'Juno', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(653, 0, 'Ghost In The Shell 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(654, 0, 'Men of Honor', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(655, 0, 'Mirrors', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(656, 0, 'Monster vs Aliens', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(657, 0, 'National Security', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(658, 0, 'Operation Kingdom', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(659, 0, 'Surrogates', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(660, 0, 'The Covenant', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(661, 0, 'The Streets of London', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(662, 0, 'Titan A.E', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(663, 0, 'Troja', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(664, 0, 'Skate or Die', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(665, 0, 'Clockwork Orange', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(666, 0, 'Old Dogs Daddy oder Deal', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(667, 0, 'The Blind Side', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(668, 0, 'Shutter Island', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(669, 0, 'Everbodys Fine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(670, 0, 'From Paris with Love', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(671, 0, 'Whatever Works', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(672, 0, 'Der Soldat James Ryan', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(673, 0, 'Männerherzen', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(674, 0, 'Reservoir Dogs', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(675, 0, 'Ninja Assasin', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(676, 0, 'Ninja Revenge will Rise', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(677, 0, 'Number 23', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(678, 0, 'Precious Das Leben ist kostbar', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(679, 0, 'The Boys are Back', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(680, 0, 'Der Blutige Pfad Gottes 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(681, 0, 'Der Soldat James Ryan', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(682, 0, 'Screamers', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(683, 0, 'Blade 1', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(684, 0, 'Blade 2', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(685, 0, 'Blade 3', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(686, 0, 'Der Kautions Cop', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(687, 0, 'Hot Fuzz', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(688, 0, 'In meinem Himmel', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(689, 0, 'Casino Royale', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(690, 0, 'Shaun of the Dead', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(691, 0, 'Schindlers Liste', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(692, 0, 'Gran Torino', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(693, 0, 'Underworld', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(694, 0, 'Underworld Evolution', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(695, 0, 'Underworld Aufstand der Lykaner', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(696, 0, 'Zombieland', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(697, 0, 'X-Men Origins Wolverine', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(698, 0, 'Shutter Island', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(699, 0, 'Das Bildnis des Dorian Grey', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(700, 0, 'Das Leuchten der Stille', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(701, 0, 'Date Night Gangster für eine Nacht', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(702, 0, 'Der Club der toten Dichter', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(703, 0, 'Die Regeln des Spiels – Rules of Attraction', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(704, 0, 'District 9', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(705, 0, 'Valentienstag', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(706, 0, 'When in Rome', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(707, 0, 'Zu Scharf um Wahr zu sein', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(708, 0, 'Die Truman Show', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(709, 0, 'Gesetz der Rache', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(710, 0, 'Die Kinder des Monsiuer Matthieu', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(711, 0, 'The Fast and the Furious Tokyo Drift', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(712, 0, 'The Book of Eli', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(713, 0, 'Sherlock Holmes', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(714, 0, 'Cop Out', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(715, 0, 'Groupies', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(716, 0, 'Cherrybomb', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(717, 0, 'Kiss and Kill', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(718, 0, 'Hardrain', '', 0, 0, '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `wombat_movie` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_navigation
DROP TABLE IF EXISTS `wombat_navigation`;
CREATE TABLE IF NOT EXISTS `wombat_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sequence` int(10) unsigned NOT NULL,
  `url` varchar(200) CHARACTER SET latin1 NOT NULL,
  `primary` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_navigation: ~2 rows (approximately)
/*!40000 ALTER TABLE `wombat_navigation` DISABLE KEYS */;
INSERT INTO `wombat_navigation` (`id`, `title`, `sequence`, `url`, `primary`) VALUES
	(3, 'Dashboard', 1, 'dashboard', 1),
	(4, 'Filme', 20, 'movie', 1);
/*!40000 ALTER TABLE `wombat_navigation` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_rating
DROP TABLE IF EXISTS `wombat_rating`;
CREATE TABLE IF NOT EXISTS `wombat_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE,
  KEY `NAME` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_rating: ~3 rows (approximately)
/*!40000 ALTER TABLE `wombat_rating` DISABLE KEYS */;
INSERT INTO `wombat_rating` (`id`, `type`, `name`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(7, 'movie', 'Gut', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(8, 'movie', 'Okay', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
	(9, 'movie', 'Schlecht', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `wombat_rating` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_right
DROP TABLE IF EXISTS `wombat_right`;
CREATE TABLE IF NOT EXISTS `wombat_right` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `controller` varchar(45) CHARACTER SET latin1 NOT NULL,
  `action` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_right: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_right` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_right` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_right_assoc
DROP TABLE IF EXISTS `wombat_right_assoc`;
CREATE TABLE IF NOT EXISTS `wombat_right_assoc` (
  `id` int(10) unsigned DEFAULT NULL,
  `right_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_right_assoc: 0 rows
/*!40000 ALTER TABLE `wombat_right_assoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_right_assoc` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_role
DROP TABLE IF EXISTS `wombat_role`;
CREATE TABLE IF NOT EXISTS `wombat_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_role` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_role_assoc
DROP TABLE IF EXISTS `wombat_role_assoc`;
CREATE TABLE IF NOT EXISTS `wombat_role_assoc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_role_assoc: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_role_assoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_role_assoc` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_trash
DROP TABLE IF EXISTS `wombat_trash`;
CREATE TABLE IF NOT EXISTS `wombat_trash` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `created_user` int(10) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `last_change_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_trash: ~0 rows (approximately)
/*!40000 ALTER TABLE `wombat_trash` DISABLE KEYS */;
/*!40000 ALTER TABLE `wombat_trash` ENABLE KEYS */;


-- Dumping structure for table wombat.wombat_user
DROP TABLE IF EXISTS `wombat_user`;
CREATE TABLE IF NOT EXISTS `wombat_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `first_name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `attempts` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `created_user` int(10) unsigned NOT NULL,
  `last_change` datetime NOT NULL,
  `last_change_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USER_NAME` (`user_name`),
  UNIQUE KEY `EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table wombat.wombat_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `wombat_user` DISABLE KEYS */;
INSERT INTO `wombat_user` (`id`, `user_name`, `first_name`, `last_name`, `password`, `email`, `enabled`, `attempts`, `last_login`, `created`, `created_user`, `last_change`, `last_change_user`) VALUES
	(2, 'nicoschmitz', 'Nico', 'Schmitz', 'eb972ac0d7f035535e84f6298bfb342dd8ac176e', 'mail@nicoschmitz.eu', 0, 0, '2012-02-24 22:30:35', '2012-02-24 22:30:35', 0, '2012-02-24 22:30:35', 0);
/*!40000 ALTER TABLE `wombat_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
