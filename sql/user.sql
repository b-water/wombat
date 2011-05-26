'user', 'CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `forename` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8'