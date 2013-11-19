CREATE DATABASE  IF NOT EXISTS `tiny-blog-demo`;
USE `tiny-blog-demo`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `password_hash` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


LOCK TABLES `users` WRITE;
INSERT INTO `users` (nickname, password_hash, email) VALUES
    ('demo','$2a$13$K4FVq.8WJsTr1iGXN2heo.cE1Io10ytTKcvviFXS.PufJ5RPB23rK','demo@example.com');
