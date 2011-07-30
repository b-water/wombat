CREATE TABLE `wombat_format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `TYPE` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8