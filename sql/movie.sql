'movie', 'CREATE TABLE `movie` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=utf8'