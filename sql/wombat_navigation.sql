CREATE TABLE `wombat_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sequence` int(10) unsigned NOT NULL,
  `url` varchar(200) CHARACTER SET latin1 NOT NULL,
  `primary` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8