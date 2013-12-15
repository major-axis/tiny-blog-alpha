CREATE DATABASE  IF NOT EXISTS `tiny-blog-demo`;
USE `tiny-blog-demo`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `password_hash` varchar(130) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_nickname` (`nickname`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


LOCK TABLES `users` WRITE;
INSERT INTO `users` (nickname, password_hash, email) VALUES
    ('demo','$pbkdf2-sha512$12000$4pHnK81N.Vwv373GLA4LVA$6YCp4DKGLkK5ZjLM7FG9soRu37GmGo1ZeOix/Tuf1JofZ16A6Y5zCsKlmlmATH35COiGRdPJqwm1HljCnfC0Cg','demo@example.com');
