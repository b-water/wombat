-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema wombat
--

CREATE DATABASE IF NOT EXISTS wombat;
USE wombat;

--
-- Definition of table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` (`id`,`type`,`name`,`image`) VALUES 
 (1,'movie','Katherine Heigl',''),
 (2,'movie','Seth Rogen','');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;


--
-- Definition of table `associated_artist`
--

DROP TABLE IF EXISTS `associated_artist`;
CREATE TABLE `associated_artist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `table` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TABLE` (`table`) USING BTREE,
  KEY `TABLE_ID` (`table_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associated_artist`
--

/*!40000 ALTER TABLE `associated_artist` DISABLE KEYS */;
/*!40000 ALTER TABLE `associated_artist` ENABLE KEYS */;


--
-- Definition of table `associated_genre`
--

DROP TABLE IF EXISTS `associated_genre`;
CREATE TABLE `associated_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `table` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TABLE` (`table`) USING BTREE,
  KEY `TABLE_ID` (`table_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associated_genre`
--

/*!40000 ALTER TABLE `associated_genre` DISABLE KEYS */;
INSERT INTO `associated_genre` (`id`,`genre_id`,`table_id`,`table`) VALUES 
 (155,6,14,'movie'),
 (156,11,14,'movie');
/*!40000 ALTER TABLE `associated_genre` ENABLE KEYS */;


--
-- Definition of table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE `format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format`
--

/*!40000 ALTER TABLE `format` DISABLE KEYS */;
INSERT INTO `format` (`id`,`type`,`name`) VALUES 
 (1,'movie','Matroska'),
 (2,'movie','R5'),
 (3,'movie','DVD Rip'),
 (4,'movie','HD Rip'),
 (5,'movie','CD Rip'),
 (6,'movie','Blu-Ray');
/*!40000 ALTER TABLE `format` ENABLE KEYS */;


--
-- Definition of table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id`,`type`,`name`) VALUES 
 (1,'movie','Action'),
 (2,'movie','Drama'),
 (3,'movie','Thriller'),
 (4,'movie','Science-Fiction'),
 (5,'movie','Horror'),
 (6,'movie','Komödie'),
 (7,'movie','Dokumentation'),
 (8,'movie','Psycho-Thriller'),
 (9,'movie','Krimi'),
 (10,'movie','Abenteuer'),
 (11,'movie','Romantik');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;


--
-- Definition of table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `rating` int(4) unsigned NOT NULL,
  `format` int(4) unsigned NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `duration` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `NAME` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`id`,`name`,`description`,`rating`,`format`,`trailer`,`image`,`year`,`duration`) VALUES 
 (14,'Beim ersten Mal','Ben Stone, ein aus Kanada stammender 23-jähriger, der ohne Aufenthaltserlaubnis in den USA wohnt, hat keinen Job und lebt von dem knappen Geld, das er vor 10 Jahren als Entschädigung erhalten hat, als er von einem Post-Fahrzeug angefahren wurde. Der etwas infantile und wenig ehrgeizige Ben lebt in einem Haus zusammen mit seinen Freunden, die, ebenso wie er, in erster Linie nur Spaß haben wollen und Drogen wie Marihuana oder Magic Mushrooms nicht abgeneigt sind. Gemeinsam haben sie den Plan, eine Webseite zu eröffnen, welche die exakte Dauer von Nacktszenen bekannter Schauspielerinnen in Filmen auflistet.\r\n\r\nAlison Scott lebt im Haus von Schwester Debbie, die einen Mann und zwei Kinder hat. Alison ist eine verantwortungsbewusste, ehrgeizige Frau, die beim Fernsehsender E! Entertainment Television arbeitet und gerade befördert wurde: Sie soll anstatt als Assistentin hinter der Kamera von nun an vor der Kamera Prominente interviewen. Alison will das zusammen mit ihrer Schwester feiern und beide gehen am Abend in einen Club.\r\n\r\nDort treffen sie zufällig auf Ben und seine Freunde. Ben und Alison trinken und tanzen gemeinsam und landen schließlich im Bett von Alison, wo es zum One-Night-Stand kommt. Ben soll ein Kondom benutzen, hat aber Probleme mit dem Überstreifen. Nachdem die erregte Alison ungeduldig wird, wirft er es neben das Bett und schläft mit ihr. Am darauffolgenden Morgen beschließen die beiden, getrennte Wege zu gehen, da sie nur wenig gemeinsam haben. Acht Wochen später stellt Alison fest, dass sie schwanger ist und kontaktiert Ben deswegen.\r\n\r\nIn einer Parallelhandlung wird die Geschichte von Alisons Schwester Debbie und deren Problemen mit ihrem Ehemann Pete gezeigt. Debbie verdächtigt Pete der Untreue. Es stellt sich jedoch heraus, dass er nur ab und an eine Auszeit vom Eheleben benötigt und ohne sie ins Kino geht oder mit Freunden Fantasy-Baseball spielt.\r\n\r\nAlison will das Kind behalten und auch der Beziehung mit dem „Loser“ Ben eine Chance geben. Ben will unbedingt ein gemeinsames Leben mit Alison, da er sich inzwischen klar darüber geworden ist, dass er sie liebt. Ben möchte Verantwortung übernehmen und beginnt Schwangerschafts-Literatur zu lesen und findet auch einen Job als Webdesigner. Er schafft es, sich von seinem regelmäßígen Marihuana-Rausch und den kindischen Freunden zu lösen und sucht sich eine eigene Wohnung.\r\n\r\nNachdem Alison ihrem Arbeitgeber ihre Schwangerschaft nicht mehr verheimlichen kann, wird sie zu ihrem Vorgesetzten zitiert. Es folgt überraschenderweise nicht der Rausschmiss, sondern die Beförderung zu einer eigenen „Schwangerschafts-Show“. Zum Happy End kommt es bei der Geburt der gemeinsamen Tochter.',5,1,'http://www.youtube.com/watch?v=1vP1ypnT6yo','files/movie/14.jpg',2010,120),
 (15,'Berlin Calling','Der Berliner DJ und Produzent Martin Karow, genannt Ickarus, tourt mit seiner Managerin und Freundin Mathilde durch die Tanzclubs der Welt. Zudem möchte er bald sein neues Album veröffentlichen. Um die Tage und Nächte durchzuhalten, nimmt er aufputschende Drogen, die er von seinem Freund Erbse bekommt. Nachdem Ickarus jedoch bei einem Auftritt eine PMA-haltige Ecstasy-Tablette konsumiert hat, erleidet er eine drogeninduzierte Psychose. Er bewegt sich alleine durch die Stadt, reißt sich die Kleider vom Leib. Am nächsten Morgen, noch immer unter Drogen stehend, frühstückt er in einem Hotel, wo er mit seinem Essverhalten die Aufmerksamkeit des Hotelpersonals auf sich zieht. Daraufhin wird er in eine Berliner Nervenklinik eingeliefert, was die Veröffentlichung seines Albums und seine nächsten Auftritte stark gefährdet.\r\n\r\nIn der Klinik lernt er unter anderem Patienten kennen, die Crystal Pete und Goa Gebhard genannt werden. Die Ärztin Dr. Paul rät Ickarus dazu, eine Ruhepause unter ihrer Aufsicht einzulegen. Sie betont dabei auch die Freiwilligkeit seines Aufenthalt in der Klinik. Ickarus möchte dennoch an seinem Album weiterarbeiten und lässt sich sein Notebook und seinen MIDI-Controller in die Klinik bringen. Daneben entfernt er sich mehrmals von der Klinik, besucht Veranstaltungen und nimmt weiterhin Drogen zu sich. Alice, die Chefin des Plattenlabels Vinyl Distortion, sagt bei Mathilde die Veröffentlichung des neuen Albums ab. Daraufhin zertrümmert Ickarus ihr Büro.\r\n\r\nMathilde verlässt die gemeinsame Wohnung und tröstet sich mit der lesbischen Türsteherin Corinna. Nachdem Ickarus dies bemerkt hat und zudem das Finanzamt in einem Brief 25.000 Euro an Steuern von ihm nachfordert, versucht er, Mathilde bei Corinna aufzusuchen, aber Mathilde will ihn nicht sehen. Die Klinikleiterin erklärt Ickarus, er könne nicht in der Klinik bleiben, weil er die Therapieanweisungen nicht befolgt und unabgesprochen die Klinik verlässt. Ickarus überredet daraufhin abends einen Zivi, eine Abschiedsparty in der Klinik geben zu dürfen und besorgt dafür Alkohol, Prostituierte und Drogen. Dies hat zur Konsequenz, dass er in die geschlossene Abteilung der Klinik überwiesen wird.\r\n\r\nMathilde und der Vater von Ickarus kämpfen um seine Entlassung. Nachdem sein Label ihn wieder aufnimmt, möchte Ickarus sein Album zunächst unter dem Namen Titten, Techno & Trompeten veröffentlichen. Doch die Plattenfirma entscheidet sich für den Namen Berlin Calling und ein Covershooting für das Album in der Klinik.',2,2,'123456789','files/movie/15.jpg',0,0),
 (16,'Borat','',3,3,'','',0,0),
 (17,'Braveheart','',4,4,'','',0,0),
 (18,'Brüno','',5,5,'','',0,0),
 (19,'Butterfly Effect 2','',0,0,'','',0,0),
 (20,'Chuck & Larry','',0,0,'','',0,0),
 (21,'Dreamcatcher','',0,0,'','',0,0),
 (22,'Cleaner Sein Geschäft ist der Tod','',0,0,'','',0,0),
 (23,'Cloverfield','',0,0,'','',0,0),
 (24,'College','',0,0,'','',0,0),
 (25,'Constantine','',0,0,'','',0,0),
 (26,'Crank 2 High Voltage','',0,0,'','',0,0),
 (27,'Das Streben nach Glück','',0,0,'','',0,0),
 (28,'Das Haus der Dämonen','',0,0,'','',0,0),
 (29,'Defiance Unbeugsam','',0,0,'','',0,0),
 (30,'Deja Vu','',0,0,'','',0,0),
 (31,'Departed unter Feinden','',0,0,'','',0,0),
 (32,'Der Untergang','',0,0,'','',0,0),
 (33,'Der Vorleser','',0,0,'','',0,0),
 (34,'Der Womanizer','',0,0,'','',0,0),
 (35,'Der Ja Sager','',0,0,'','',0,0),
 (36,'Der Anschlag','',0,0,'','',0,0),
 (37,'Der Knochenjäger','',0,0,'','',0,0),
 (38,'Der Tag an dem die Erde Stillstand','',0,0,'','',0,0),
 (39,'Die Herzogin','',0,0,'','',0,0),
 (40,'Die Entführung der U-Bahn Pelham 123','',0,0,'','',0,0),
 (41,'Die Herrschaft des Feuers','',0,0,'','',0,0),
 (42,'Die Mumie 3','',0,0,'','',0,0),
 (43,'Die nackte Wahrheit','',0,0,'','',0,0),
 (44,'Die Reise des chinesischen Trommerls','',0,0,'','',0,0),
 (45,'District 9','',0,0,'','',0,0),
 (46,'Disturbia','',0,0,'','',0,0),
 (47,'Doom der Film','',0,0,'','',0,0),
 (48,'Drag Me To Hell','',0,0,'','',0,0),
 (49,'Ein Mann im Fadenkreuz','',0,0,'','',0,0),
 (51,'Evan Allmächtig','',0,0,'','',0,0),
 (52,'Fight Club','',0,0,'','',0,0),
 (53,'Final Destination','',0,0,'','',0,0),
 (54,'Fluch der Karibik 1','',0,0,'','',0,0),
 (55,'Fluch der Karibik 2','',0,0,'','',0,0),
 (56,'Fluch der Karibik 3','',0,0,'','',0,0),
 (57,'Four Borthers','',0,0,'','',0,0),
 (58,'Freitag der 13','',0,0,'','',0,0),
 (59,'Gangs of New York','',0,0,'','',0,0),
 (60,'Gladiator','',0,0,'','',0,0),
 (61,'Gran Torino','',0,0,'','',0,0),
 (62,'Hancock','',0,0,'','',0,0),
 (63,'Harry Potter und der Stein der Weisen','',0,0,'','',0,0),
 (64,'Harry Potter und der Feuerkelch','',0,0,'','',0,0),
 (65,'Harry Potter und der Halblutprinz','',0,0,'','',0,0),
 (66,'Hellboy 2 Die Goldene Armee','',0,0,'','',0,0),
 (67,'Hero','',0,0,'','',0,0),
 (68,'Herr der Ringe Die Gefährten','',0,0,'','',0,0),
 (69,'Herr der Ringe Die Zwei Türme','',0,0,'','',0,0),
 (70,'Herr der Ringe Die Rückkehr des Königs','',0,0,'','',0,0),
 (71,'Hitch','',0,0,'','',0,0),
 (72,'Hitman Codename 47','',0,0,'','',0,0),
 (73,'Hooligans','',0,0,'','',0,0),
 (74,'I Am Legend','',0,0,'','',0,0),
 (75,'Ich Du und der andere','',0,0,'','',0,0),
 (76,'Inglorious Bastards','',0,0,'','',0,0),
 (77,'Insider','',0,0,'','',0,0),
 (78,'I Robot','',0,0,'','',0,0),
 (79,'Iron Man','',0,0,'','',0,0),
 (80,'Jagdfieber','',0,0,'','',0,0),
 (81,'James Bond Ein Quantum Trost','',0,0,'','',0,0),
 (82,'Jumper','',0,0,'','',0,0),
 (83,'Kein Bund fürs Leben','',0,0,'','',0,0),
 (84,'Kein Ohr Hasen','',0,0,'','',0,0),
 (85,'King Kond Extended','',0,0,'','',0,0),
 (86,'Klick!','',0,0,'','',0,0),
 (87,'Knowing','',0,0,'','',0,0),
 (88,'König der Löwen','',0,0,'','',0,0),
 (89,'Könige der Wellen','',0,0,'','',0,0),
 (90,'Kung Fu Panda','',0,0,'','',0,0),
 (91,'Lakeview Terrace','',0,0,'','',0,0),
 (92,'Leg dich nicht mit Zohan an','',0,0,'','',0,0),
 (93,'Little Man','',0,0,'','',0,0),
 (94,'Lizenz zum Heiraten','',0,0,'','',0,0),
 (95,'LOL','',0,0,'','',0,0),
 (96,'Madagaskar','',0,0,'','',0,0),
 (97,'Mamma Mia','',0,0,'','',0,0),
 (98,'Marley und Ich','',0,0,'','',0,0),
 (99,'Meine Frau die Spartaner und Ich','',0,0,'','',0,0),
 (100,'Mensch Dave','',0,0,'','',0,0),
 (101,'Minority Report','',0,0,'','',0,0),
 (102,'Mitten ins Herz','',0,0,'','',0,0),
 (103,'Mr und Mrs Smith','',0,0,'','',0,0),
 (104,'My Bloody Valentine','',0,0,'','',0,0),
 (105,'Nachts im Museum','',0,0,'','',0,0),
 (106,'Nachts im Museum 2','',0,0,'','',0,0),
 (107,'Nie wieder Sex mit der Ex','',0,0,'','',0,0),
 (108,'Oben','',0,0,'','',0,0),
 (109,'Oceans Thirteen','',0,0,'','',0,0),
 (110,'Old School','',0,0,'','',0,0),
 (111,'P.S Ich Liebe Dich','',0,0,'','',0,0),
 (112,'Pulp Fiction','',0,0,'','',0,0),
 (113,'Push','',0,0,'','',0,0),
 (114,'Ratatouille','',0,0,'','',0,0),
 (115,'Ray','',0,0,'','',0,0),
 (116,'Reign Over Me / Die Liebe in mir','',0,0,'','',0,0),
 (117,'Reine Nervensache','',0,0,'','',0,0),
 (118,'Reine Nervensache 2','',0,0,'','',0,0),
 (119,'Requiem for a Dream','',0,0,'','',0,0),
 (120,'Rock n Rolla','',0,0,'','',0,0),
 (121,'Rush Hour 3','',0,0,'','',0,0),
 (122,'Saw 3','',0,0,'','',0,0),
 (123,'Saw 4','',0,0,'','',0,0),
 (124,'Saw 5','',0,0,'','',0,0),
 (125,'Selbst ist die Braut','',0,0,'','',0,0),
 (126,'Shadowboxer','',0,0,'','',0,0),
 (127,'Shrek 1','',0,0,'','',0,0),
 (128,'Shrek 2','',0,0,'','',0,0),
 (129,'Shrek 3','',0,0,'','',0,0),
 (130,'Sieben Leben','',0,0,'','',0,0),
 (131,'Silent Hill','',0,0,'','',0,0),
 (132,'Sin City','',0,0,'','',0,0),
 (133,'Slumdog Millionär','',0,0,'','',0,0),
 (134,'Smoking Aces','',0,0,'','',0,0),
 (135,'Star Wars Episode 1','',0,0,'','',0,0),
 (136,'Star Wars Episode 2','',0,0,'','',0,0),
 (137,'Star Wars Episode 3','',0,0,'','',0,0),
 (138,'Star Wars Episode 4','',0,0,'','',0,0),
 (139,'Star Wars Episode 5','',0,0,'','',0,0),
 (140,'Star Wars Episode 6','',0,0,'','',0,0),
 (141,'Stirb Langsam 4.0','',0,0,'','',0,0),
 (142,'Stirb Langsam jetzt erst recht','',0,0,'','',0,0),
 (143,'Superbad','',0,0,'','',0,0),
 (144,'Terminator 4 Die Erlösung','',0,0,'','',0,0),
 (145,'Thank you for Smoking','',0,0,'','',0,0),
 (146,'The Road to Guantanamo','',0,0,'','',0,0),
 (147,'The Strangers','',0,0,'','',0,0),
 (148,'The Weather Men','',0,0,'','',0,0),
 (150,'The Girl Next Door','',0,0,'','',0,0),
 (151,'The Good German','',0,0,'','',0,0),
 (152,'The Green Mile','',0,0,'','',0,0),
 (153,'The Hills Have Eyes','',0,0,'','',0,0),
 (154,'The Italian Job','',0,0,'','',0,0),
 (155,'The Lucky Ones','',0,0,'','',0,0),
 (156,'Tödliches Kommando The Hurt Locker','',0,0,'','',0,0),
 (157,'Training Day','',0,0,'','',0,0),
 (158,'Transporter 3','',0,0,'','',0,0),
 (159,'Twilight Biss zum Morgengrauen','',0,0,'','',0,0),
 (160,'Wanted','',0,0,'','',0,0),
 (161,'Welcome to the Jungle','',0,0,'','',0,0),
 (162,'Wir waren Helden','',0,0,'','',0,0),
 (163,'Eagle Eye','',0,0,'','',0,0),
 (164,'Fanboys','',0,0,'','',0,0),
 (165,'X-Men 2','',0,0,'','',0,0),
 (166,'X-Men Origins Wolverine','',0,0,'','',0,0),
 (167,'Oceans Twelve','',0,0,'','',0,0),
 (168,'Observe and Report','',0,0,'','',0,0),
 (170,'Die Welle','',0,0,'','',0,0),
 (171,'Die Ludolfs der Film','',0,0,'','',0,0),
 (172,'Die Jagd zum Magischen Berg','',0,0,'','',0,0),
 (173,'Prinzessin Mononoke','',0,0,'','',0,0),
 (174,'The Reaping','',0,0,'','',0,0),
 (175,'The Hills Have Eyes 2','',0,0,'','',0,0),
 (176,'Max Payne Extendet Edition','',0,0,'','',0,0),
 (177,'House Bunny','',0,0,'','',0,0),
 (178,'Garden State','',0,0,'','',0,0),
 (179,'Salvador','',0,0,'','',0,0),
 (180,'Last Samurai','',0,0,'','',0,0),
 (181,'Iluminati','',0,0,'','',0,0),
 (182,'Sex and Death','',0,0,'','',0,0),
 (183,'Wall E','',0,0,'','',0,0),
 (184,'No Country for Old Men','',0,0,'','',0,0),
 (185,'Ein Duke kommt selten alleine','',0,0,'','',0,0),
 (186,'Fear and Loathing in Las Vegas','',0,0,'','',0,0),
 (187,'Blood The Last Vampire','',0,0,'','',0,0),
 (188,'Lost in Translation','',0,0,'','',0,0),
 (189,'Der Blutige Pfad Gottes','',0,0,'','',0,0),
 (190,'Collateral Damage','',0,0,'','',0,0),
 (192,'Der Unglaubliche Hulk','',0,0,'','',0,0),
 (193,'Lucky Number Slevin','',0,0,'','',0,0),
 (194,'Ong Bak','',0,0,'','',0,0),
 (195,'X-Men 3','',0,0,'','',0,0),
 (196,'Obsessed','',0,0,'','',0,0),
 (197,'Hulk','',0,0,'','',0,0),
 (199,'Punisher 2 War Zone','',0,0,'','',0,0),
 (200,'Krieg der Welten','',0,0,'','',0,0),
 (201,'Fantastic Four 2 Rise of the Silver Surfer','',0,0,'','',0,0),
 (202,'Resident Evil Extinction','',0,0,'','',0,0),
 (203,'Kaufhaus Cop','',0,0,'','',0,0),
 (204,'Resident Evil Apocalypse','',0,0,'','',0,0),
 (205,'Public Enemies','',0,0,'','',0,0),
 (206,'Get Smart','',0,0,'','',0,0),
 (207,'Transformers','',0,0,'','',0,0),
 (208,'Ritter aus Leidenschaft','',0,0,'','',0,0),
 (209,'Star Trek','',0,0,'','',0,0),
 (210,'Stealth unter dem Radar','',0,0,'','',0,0),
 (211,'Gamer','',0,0,'','',0,0),
 (212,'Gesetz der Rache','',0,0,'','',0,0),
 (213,'Party Animals Van Wilder','',0,0,'','',0,0),
 (217,'Sweeny Todd','',0,0,'','',0,0),
 (224,'Final Destination 4','',0,0,'','',0,0),
 (225,'Hangover','',0,0,'','',0,0),
 (226,'Doghouse','',0,0,'','',0,0),
 (227,'Final Call','',0,0,'','',0,0),
 (228,'Outlander','',0,0,'','',0,0),
 (229,'Die Purpurenen Flüsse 1','',0,0,'','',0,0),
 (230,'Die Purpurenen Flüsse 2','',0,0,'','',0,0),
 (231,'Saw 6','',0,0,'','',0,0),
 (232,'Shoot Em Up','',0,0,'','',0,0),
 (233,'Streets of London','',0,0,'','',0,0),
 (234,'Unbreakable Unzerbrechlich','',0,0,'','',0,0),
 (235,'V wie Vendetta','',0,0,'','',0,0),
 (236,'Walk the Line','',0,0,'','',0,0),
 (237,'Zatoichi der Blinde Samurai','',0,0,'','',0,0),
 (238,'Zombieland','',0,0,'','',0,0),
 (239,'Carriers','',0,0,'','',0,0),
 (241,'Das Vermächtnis der Tempelritter','',0,0,'','',0,0),
 (242,'Flags of our Fathers','',0,0,'','',0,0),
 (243,'Forrest Gump','',0,0,'','',0,0),
 (244,'Full Metal Jacket','',0,0,'','',0,0),
 (245,'Ice Age 3','',0,0,'','',0,0),
 (246,'Die Klumps','',0,0,'','',0,0),
 (247,'Sunshine','',0,0,'','',0,0),
 (248,'Transformers Die Rache','',0,0,'','',0,0),
 (249,'Wie das Leben so spielt','',0,0,'','',0,0),
 (251,'Collateral','',0,0,'','',0,0),
 (252,'Die Ermodung des Jesse James durch den Feigli','',0,0,'','',0,0),
 (253,'Dragonheart 2','',0,0,'','',0,0),
 (254,'King Arthur','',0,0,'','',0,0),
 (259,'Contract Killers','',0,0,'','',0,0),
 (260,'Mr. Deeds','',0,0,'','',0,0),
 (261,'Das Karbinett des Dr. Parnassus','',0,0,'','',0,0),
 (262,'Das Leben des Brian','',0,0,'','',0,0),
 (263,'Der Talentierte Mr. Ripley','',0,0,'','',0,0),
 (264,'Der Pate 1','',0,0,'','',0,0),
 (265,'Der Pate 2','',0,0,'','',0,0),
 (266,'Der Pate 3','',0,0,'','',0,0),
 (267,'Der Polarexpress','',0,0,'','',0,0),
 (268,'Der Solist','',0,0,'','',0,0),
 (269,'Die Monster AG','',0,0,'','',0,0),
 (270,'Dragonheart 2 Ein Neuer Anfang','',0,0,'','',0,0),
 (271,'Dumm und Dümmer','',0,0,'','',0,0),
 (272,'Edward mit den Scherenhänden','',0,0,'','',0,0),
 (273,'Freddy vs Jason','',0,0,'','',0,0),
 (274,'GI Joe Geheimauftrag Cobra','',0,0,'','',0,0),
 (275,'Halloween 2','',0,0,'','',0,0),
 (276,'Hannibal','',0,0,'','',0,0),
 (277,'Hannibal Rising','',0,0,'','',0,0),
 (278,'Happy Gilmore','',0,0,'','',0,0),
 (279,'Horsemen','',0,0,'','',0,0),
 (280,'Jede Sekunde zählt The Guardian','',0,0,'','',0,0),
 (281,'Lieber Verliebt','',0,0,'','',0,0),
 (282,'Pathfinder Fährte des Kriegers','',0,0,'','',0,0),
 (283,'Pitch Black','',0,0,'','',0,0),
 (284,'S Darko eine Donny Darko Saga','',0,0,'','',0,0),
 (285,'Scream 1','',0,0,'','',0,0),
 (286,'Scream 2','',0,0,'','',0,0),
 (287,'Scream 3','',0,0,'','',0,0),
 (288,'Sherlock Holmes','',0,0,'','',0,0),
 (289,'Staunton Hill','',0,0,'','',0,0),
 (290,'The Butterfly Effect','',0,0,'','',0,0),
 (291,'Street Kings','',0,0,'','',0,0),
 (292,'The Core','',0,0,'','',0,0),
 (293,'The Good The Bad The Weird','',0,0,'','',0,0),
 (294,'The Nightmare before Christmas','',0,0,'','',0,0),
 (295,'The Score','',0,0,'','',0,0),
 (296,'Timeline','',0,0,'','',0,0),
 (297,'Tränen der Sonne','',0,0,'','',0,0),
 (298,'Tropic Thunder','',0,0,'','',0,0),
 (299,'Van Helsing','',0,0,'','',0,0),
 (300,'Whatever Works','',0,0,'','',0,0),
 (301,'Willkommen bei den Schtis','',0,0,'','',0,0),
 (302,'Wrong Turn 2 Dead End','',0,0,'','',0,0),
 (303,'Wrong Turn 3 Left for Dead','',0,0,'','',0,0),
 (305,'Jumanji','',0,0,'','',0,0),
 (306,'Donnie Darko','',0,0,'','',0,0),
 (307,'Eine Handvoll Gras','',0,0,'','',0,0),
 (308,'Juno','',0,0,'','',0,0),
 (309,'Ghost In The Shell 2','',0,0,'','',0,0),
 (310,'Men of Honor','',0,0,'','',0,0),
 (311,'Mirrors','',0,0,'','',0,0),
 (312,'Monster vs Aliens','',0,0,'','',0,0),
 (313,'National Security','',0,0,'','',0,0),
 (314,'Operation Kingdom','',0,0,'','',0,0),
 (315,'Surrogates','',0,0,'','',0,0),
 (316,'The Covenant','',0,0,'','',0,0),
 (317,'The Streets of London','',0,0,'','',0,0),
 (318,'Titan A.E','',0,0,'','',0,0),
 (319,'Troja','',0,0,'','',0,0),
 (320,'Skate or Die','',0,0,'','',0,0),
 (321,'Clockwork Orange','',0,0,'','',0,0),
 (322,'Old Dogs Daddy oder Deal','',0,0,'','',0,0),
 (323,'The Blind Side','',0,0,'','',0,0),
 (324,'Shutter Island','',0,0,'','',0,0),
 (325,'Everbodys Fine','',0,0,'','',0,0),
 (326,'From Paris with Love','',0,0,'','',0,0),
 (327,'Whatever Works','',0,0,'','',0,0),
 (329,'Der Soldat James Ryan','',0,0,'','',0,0),
 (330,'Männerherzen','',0,0,'','',0,0),
 (331,'Reservoir Dogs','',0,0,'','',0,0),
 (332,'Ninja Assasin','',0,0,'','',0,0),
 (333,'Ninja Revenge will Rise','',0,0,'','',0,0),
 (334,'Number 23','',0,0,'','',0,0),
 (335,'Precious Das Leben ist kostbar','',0,0,'','',0,0),
 (336,'The Boys are Back','',0,0,'','',0,0),
 (338,'Der Blutige Pfad Gottes 2','',0,0,'','',0,0),
 (339,'Der Soldat James Ryan','',0,0,'','',0,0),
 (340,'Screamers','',0,0,'','',0,0),
 (342,'Blade 1','',0,0,'','',0,0),
 (343,'Blade 2','',0,0,'','',0,0),
 (344,'Blade 3','',0,0,'','',0,0),
 (345,'Der Kautions Cop','',0,0,'','',0,0),
 (346,'Hot Fuzz','',0,0,'','',0,0),
 (347,'In meinem Himmel','',0,0,'','',0,0),
 (348,'Casino Royale','',0,0,'','',0,0),
 (349,'Shaun of the Dead','',0,0,'','',0,0),
 (350,'Schindlers Liste','',0,0,'','',0,0),
 (351,'Gran Torino','',0,0,'','',0,0),
 (352,'Underworld','',0,0,'','',0,0),
 (353,'Underworld Evolution','',0,0,'','',0,0),
 (354,'Underworld Aufstand der Lykaner','',0,0,'','',0,0),
 (355,'Zombieland','',0,0,'','',0,0),
 (356,'X-Men Origins Wolverine','',0,0,'','',0,0),
 (357,'Shutter Island','',0,0,'','',0,0),
 (359,'Das Bildnis des Dorian Grey','',0,0,'','',0,0),
 (360,'Das Leuchten der Stille','',0,0,'','',0,0),
 (361,'Date Night Gangster für eine Nacht','',0,0,'','',0,0),
 (362,'Der Club der toten Dichter','',0,0,'','',0,0),
 (363,'Die Regeln des Spiels – Rules of Attraction','',0,0,'','',0,0),
 (364,'District 9','',0,0,'','',0,0),
 (365,'Valentienstag','',0,0,'','',0,0),
 (366,'When in Rome','',0,0,'','',0,0),
 (367,'Zu Scharf um Wahr zu sein','',0,0,'','',0,0),
 (368,'Die Truman Show','',0,0,'','',0,0),
 (369,'Gesetz der Rache','',0,0,'','',0,0),
 (370,'Die Kinder des Monsiuer Matthieu','',0,0,'','',0,0),
 (371,'The Fast and the Furious Tokyo Drift','',0,0,'','',0,0),
 (372,'The Book of Eli','',0,0,'','',0,0),
 (373,'Sherlock Holmes','',0,0,'','',0,0),
 (374,'Cop Out','',0,0,'','',0,0),
 (375,'Groupies','',0,0,'','',0,0),
 (376,'Cherrybomb','',0,0,'','',0,0),
 (377,'Kiss and Kill','',0,0,'','',0,0),
 (378,'Hardrain','',0,0,'','',0,0);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;


--
-- Definition of table `navigation`
--

DROP TABLE IF EXISTS `navigation`;
CREATE TABLE `navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sequence` int(10) unsigned NOT NULL,
  `url` varchar(200) CHARACTER SET latin1 NOT NULL,
  `primary` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` (`id`,`title`,`sequence`,`url`,`primary`) VALUES 
 (1,'Dashboard',1,'dashboard/',1),
 (2,'Filme',20,'movie/',1);
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;


--
-- Definition of table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` (`id`,`type`,`name`) VALUES 
 (1,'movie','Awesome!'),
 (2,'movie','Legendär'),
 (3,'movie','Episch'),
 (4,'movie','Mittelmäßig'),
 (5,'movie','Grottenschlecht');
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `forename` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `released` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`password`,`email`,`forename`,`name`,`released`) VALUES 
 (9,'81dc9bdb52d04dc20036dbd8313ed055','cofilew@gmail.com','Nico','Schmitz',0),
 (10,'81dc9bdb52d04dc20036dbd8313ed055','1234','hans','werner',0),
 (11,'81dc9bdb52d04dc20036dbd8313ed055','1234','hans','werner',0),
 (12,'81dc9bdb52d04dc20036dbd8313ed055','1234','christian','lupp',0),
 (13,'81dc9bdb52d04dc20036dbd8313ed055','1234','christian','lupp',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
