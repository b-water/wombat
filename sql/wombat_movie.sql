CREATE TABLE `wombat_movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `rating` int(4) unsigned NOT NULL,
  `format` int(4) unsigned NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `duration` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `NAME` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=utf8