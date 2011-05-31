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
-- Definition of table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE `format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
 (9,'movie','Krimi');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;


--
-- Definition of table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `genre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `rating` varchar(45) CHARACTER SET latin1 NOT NULL,
  `format` varchar(45) CHARACTER SET latin1 NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `cover` varchar(200) CHARACTER SET latin1 NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`id`,`name`,`genre`,`description`,`rating`,`format`,`size`,`date`,`cover`,`deleted`,`thumbnail`) VALUES 
 (3,'name','genre','description','Episch','format',5000,'2010-12-04','cover',1,''),
 (14,'Beim ersten Mal','Action','Testtqwe','Episch','Blu-Ray',0,'2010-12-04','files/movie/14.jpg',0,'files/movie/thumb/14.jpg'),
 (15,'Berlin Calling','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (16,'Borat','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (17,'Braveheart','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (18,'Brüno','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (19,'Butterfly Effect 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (20,'Chuck & Larry','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (21,'Dreamcatcher','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (22,'Cleaner Sein Geschäft ist der Tod','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (23,'Cloverfield','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (24,'College','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (25,'Constantine','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (26,'Crank 2 High Voltage','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (27,'Das Streben nach Glück','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (28,'Das Haus der Dämonen','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (29,'Defiance Unbeugsam','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (30,'Deja Vu','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (31,'Departed unter Feinden','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (32,'Der Untergang','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (33,'Der Vorleser','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (34,'Der Womanizer','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (35,'Der Ja Sager','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (36,'Der Anschlag','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (37,'Der Knochenjäger','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (38,'Der Tag an dem die Erde Stillstand','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (39,'Die Herzogin','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (40,'Die Entführung der U-Bahn Pelham 123','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (41,'Die Herrschaft des Feuers','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (42,'Die Mumie 3','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (43,'Die nackte Wahrheit','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (44,'Die Reise des chinesischen Trommerls','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (45,'District 9','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (46,'Disturbia','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (47,'Doom der Film','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (48,'Drag Me To Hell','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (49,'Ein Mann im Fadenkreuz','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (51,'Evan Allmächtig','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (52,'Fight Club','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (53,'Final Destination','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (54,'Fluch der Karibik 1','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (55,'Fluch der Karibik 2','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (56,'Fluch der Karibik 3','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (57,'Four Borthers','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (58,'Freitag der 13','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (59,'Gangs of New York','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (60,'Gladiator','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (61,'Gran Torino','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (62,'Hancock','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (63,'Harry Potter und der Stein der Weisen','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (64,'Harry Potter und der Feuerkelch','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (65,'Harry Potter und der Halblutprinz','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (66,'Hellboy 2 Die Goldene Armee','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (67,'Hero','Action','','Episch','1080p BlueRay',0,'2010-12-04','',0,''),
 (68,'Herr der Ringe Die Gefährten','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (69,'Herr der Ringe Die Zwei Türme','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (70,'Herr der Ringe Die Rückkehr des Königs','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (71,'Hitch','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (72,'Hitman Codename 47','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (73,'Hooligans','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (74,'I Am Legend','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (75,'Ich Du und der andere','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (76,'Inglorious Bastards','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (77,'Insider','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (78,'I Robot','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (79,'Iron Man','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (80,'Jagdfieber','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (81,'James Bond Ein Quantum Trost','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (82,'Jumper','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (83,'Kein Bund fürs Leben','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (84,'Kein Ohr Hasen','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (85,'King Kond Extended','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (86,'Klick!','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (87,'Knowing','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (88,'König der Löwen','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (89,'Könige der Wellen','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (90,'Kung Fu Panda','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (91,'Lakeview Terrace','Action','','Episch','480p BlueRay',0,'2010-12-04','',0,''),
 (92,'Leg dich nicht mit Zohan an','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (93,'Little Man','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (94,'Lizenz zum Heiraten','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (95,'LOL','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (96,'Madagaskar','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (97,'Mamma Mia','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (98,'Marley und Ich','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (99,'Meine Frau die Spartaner und Ich','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (100,'Mensch Dave','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (101,'Minority Report','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (102,'Mitten ins Herz','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (103,'Mr und Mrs Smith','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (104,'My Bloody Valentine','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (105,'Nachts im Museum','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (106,'Nachts im Museum 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (107,'Nie wieder Sex mit der Ex','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (108,'Oben','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (109,'Oceans Thirteen','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (110,'Old School','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (111,'P.S Ich Liebe Dich','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (112,'Pulp Fiction','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (113,'Push','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (114,'Ratatouille','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (115,'Ray','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (116,'Reign Over Me / Die Liebe in mir','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (117,'Reine Nervensache','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (118,'Reine Nervensache 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (119,'Requiem for a Dream','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (120,'Rock n Rolla','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (121,'Rush Hour 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (122,'Saw 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (123,'Saw 4','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (124,'Saw 5','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (125,'Selbst ist die Braut','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (126,'Shadowboxer','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (127,'Shrek 1','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (128,'Shrek 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (129,'Shrek 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (130,'Sieben Leben','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (131,'Silent Hill','Action','','Episch','480p BlueRay',0,'2010-12-04','',0,''),
 (132,'Sin City','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (133,'Slumdog Millionär','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (134,'Smoking Aces','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (135,'Star Wars Episode 1','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (136,'Star Wars Episode 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (137,'Star Wars Episode 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (138,'Star Wars Episode 4','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (139,'Star Wars Episode 5','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (140,'Star Wars Episode 6','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (141,'Stirb Langsam 4.0','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (142,'Stirb Langsam jetzt erst recht','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (143,'Superbad','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (144,'Terminator 4 Die Erlösung','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (145,'Thank you for Smoking','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (146,'The Road to Guantanamo','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (147,'The Strangers','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (148,'The Weather Men','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (150,'The Girl Next Door','Action','','Episch','1080p BlueRay',0,'2010-12-04','',0,''),
 (151,'The Good German','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (152,'The Green Mile','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (153,'The Hills Have Eyes','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (154,'The Italian Job','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (155,'The Lucky Ones','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (156,'Tödliches Kommando The Hurt Locker','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (157,'Training Day','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (158,'Transporter 3','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (159,'Twilight Biss zum Morgengrauen','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (160,'Wanted','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (161,'Welcome to the Jungle','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (162,'Wir waren Helden','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (163,'Eagle Eye','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (164,'Fanboys','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (165,'X-Men 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (166,'X-Men Origins Wolverine','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (167,'Oceans Twelve','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (168,'Observe and Report','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (170,'Die Welle','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (171,'Die Ludolfs der Film','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (172,'Die Jagd zum Magischen Berg','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (173,'Prinzessin Mononoke','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (174,'The Reaping','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (175,'The Hills Have Eyes 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (176,'Max Payne Extendet Edition','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (177,'House Bunny','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (178,'Garden State','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (179,'Salvador','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (180,'Last Samurai','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (181,'Iluminati','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (182,'Sex and Death','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (183,'Wall E','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (184,'No Country for Old Men','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (185,'Ein Duke kommt selten alleine','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (186,'Fear and Loathing in Las Vegas','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (187,'Blood The Last Vampire','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (188,'Lost in Translation','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (189,'Der Blutige Pfad Gottes','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (190,'Collateral Damage','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (192,'Der Unglaubliche Hulk','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (193,'Lucky Number Slevin','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (194,'Ong Bak','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (195,'X-Men 3','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (196,'Obsessed','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (197,'Hulk','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (199,'Punisher 2 War Zone','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (200,'Krieg der Welten','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (201,'Fantastic Four 2 Rise of the Silver Surfer','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (202,'Resident Evil Extinction','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (203,'Kaufhaus Cop','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (204,'Resident Evil Apocalypse','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (205,'Public Enemies','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (206,'Get Smart','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (207,'Transformers','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (208,'Ritter aus Leidenschaft','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (209,'Star Trek','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (210,'Stealth unter dem Radar','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (211,'Gamer','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (212,'Gesetz der Rache','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (213,'Party Animals Van Wilder','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (217,'Sweeny Todd','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (224,'Final Destination 4','Action','','Episch','720p BluRay',0,'2010-12-04','',1,''),
 (225,'Hangover','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (226,'Doghouse','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (227,'Final Call','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (228,'Outlander','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (229,'Die Purpurenen Flüsse 1','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (230,'Die Purpurenen Flüsse 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (231,'Saw 6','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (232,'Shoot Em Up','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (233,'Streets of London','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (234,'Unbreakable Unzerbrechlich','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (235,'V wie Vendetta','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (236,'Walk the Line','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (237,'Zatoichi der Blinde Samurai','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (238,'Zombieland','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (239,'Carriers','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (241,'Das Vermächtnis der Tempelritter','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (242,'Flags of our Fathers','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (243,'Forrest Gump','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (244,'Full Metal Jacket','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (245,'Ice Age 3','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (246,'Die Klumps','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (247,'Sunshine','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (248,'Transformers Die Rache','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (249,'Wie das Leben so spielt','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (251,'Collateral','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (252,'Die Ermodung des Jesse James durch den Feigli','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (253,'Dragonheart 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (254,'King Arthur','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (259,'Contract Killers','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (260,'Mr. Deeds','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (261,'Das Karbinett des Dr. Parnassus','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (262,'Das Leben des Brian','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (263,'Der Talentierte Mr. Ripley','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (264,'Der Pate 1','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (265,'Der Pate 2','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (266,'Der Pate 3','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (267,'Der Polarexpress','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (268,'Der Solist','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (269,'Die Monster AG','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (270,'Dragonheart 2 Ein Neuer Anfang','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (271,'Dumm und Dümmer','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (272,'Edward mit den Scherenhänden','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (273,'Freddy vs Jason','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (274,'GI Joe Geheimauftrag Cobra','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (275,'Halloween 2','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (276,'Hannibal','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (277,'Hannibal Rising','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (278,'Happy Gilmore','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (279,'Horsemen','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (280,'Jede Sekunde zählt The Guardian','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (281,'Lieber Verliebt','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (282,'Pathfinder Fährte des Kriegers','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (283,'Pitch Black','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (284,'S Darko eine Donny Darko Saga','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (285,'Scream 1','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (286,'Scream 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (287,'Scream 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (288,'Sherlock Holmes','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (289,'Staunton Hill','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (290,'The Butterfly Effect','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (291,'Street Kings','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (292,'The Core','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (293,'The Good The Bad The Weird','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (294,'The Nightmare before Christmas','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (295,'The Score','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (296,'Timeline','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (297,'Tränen der Sonne','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (298,'Tropic Thunder','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (299,'Van Helsing','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (300,'Whatever Works','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (301,'Willkommen bei den Schtis','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (302,'Wrong Turn 2 Dead End','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (303,'Wrong Turn 3 Left for Dead','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (305,'Jumanji','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (306,'Donnie Darko','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (307,'Eine Handvoll Gras','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (308,'Juno','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (309,'Ghost In The Shell 2','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (310,'Men of Honor','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (311,'Mirrors','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (312,'Monster vs Aliens','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (313,'National Security','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (314,'Operation Kingdom','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (315,'Surrogates','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (316,'The Covenant','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (317,'The Streets of London','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (318,'Titan A.E','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (319,'Troja','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (320,'Skate or Die','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (321,'Clockwork Orange','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (322,'Old Dogs Daddy oder Deal','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (323,'The Blind Side','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (324,'Shutter Island','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (325,'Everbodys Fine','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (326,'From Paris with Love','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (327,'Whatever Works','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (329,'Der Soldat James Ryan','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (330,'Männerherzen','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (331,'Reservoir Dogs','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (332,'Ninja Assasin','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (333,'Ninja Revenge will Rise','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (334,'Number 23','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (335,'Precious Das Leben ist kostbar','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (336,'The Boys are Back','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (338,'Der Blutige Pfad Gottes 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (339,'Der Soldat James Ryan','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (340,'Screamers','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (342,'Blade 1','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (343,'Blade 2','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (344,'Blade 3','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (345,'Der Kautions Cop','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (346,'Hot Fuzz','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (347,'In meinem Himmel','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (348,'Casino Royale','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (349,'Shaun of the Dead','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (350,'Schindlers Liste','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (351,'Gran Torino','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (352,'Underworld','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (353,'Underworld Evolution','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (354,'Underworld Aufstand der Lykaner','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (355,'Zombieland','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (356,'X-Men Origins Wolverine','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (357,'Shutter Island','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (359,'Das Bildnis des Dorian Grey','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (360,'Das Leuchten der Stille','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (361,'Date Night Gangster für eine Nacht','Action','','Episch','R5',0,'2010-12-04','',0,''),
 (362,'Der Club der toten Dichter','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (363,'Die Regeln des Spiels – Rules of Attraction','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (364,'District 9','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (365,'Valentienstag','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (366,'When in Rome','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (367,'Zu Scharf um Wahr zu sein','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (368,'Die Truman Show','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (369,'Gesetz der Rache','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (370,'Die Kinder des Monsiuer Matthieu','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (371,'The Fast and the Furious Tokyo Drift','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (372,'The Book of Eli','Action','','Episch','720p BluRay',0,'2010-12-04','',0,''),
 (373,'Sherlock Holmes','Action','','Episch','1080p BluRay',0,'2010-12-04','',0,''),
 (374,'Cop Out','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (375,'Groupies','Action','','Episch','DVD Rip',0,'2010-12-04','',0,''),
 (376,'Cherrybomb','Action','','Episch','HD Rip',0,'2010-12-04','',0,''),
 (377,'Kiss and Kill','Action','','Episch','Screener',0,'2010-12-04','',0,''),
 (378,'Hardrain','Action','','Episch','720p BluRay',0,'2010-12-04','',0,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` (`id`,`title`,`sequence`,`url`,`primary`) VALUES 
 (1,'Dashboard',1,'dashboard/',1),
 (2,'Filme',20,'movie/',1),
 (3,'Musik',30,'music/',1),
 (4,'Bilder',40,'image/',1);
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;


--
-- Definition of table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
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
