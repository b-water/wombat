CREATE TABLE `wombat_genre_assoc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_id` int(10) unsigned NOT NULL,
  `table_id` int(10) unsigned NOT NULL,
  `table` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TABLE` (`table`) USING BTREE,
  KEY `TABLE_ID` (`table_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1