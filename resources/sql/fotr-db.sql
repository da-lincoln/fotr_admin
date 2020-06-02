DROP USER IF EXISTS `fotr_dev`@`localhost`;
DROP DATABASE IF EXISTS `fotr_db`;

CREATE DATABASE IF NOT EXISTS `fotr_db` /*!40100 COLLATE 'utf8mb4_general_ci' */;

CREATE USER IF NOT EXISTS `fotr_dev`@`localhost` IDENTIFIED BY 'Password1';
GRANT USAGE ON *.* TO 'fotr_dev'@localhost IDENTIFIED BY 'Password1';
GRANT ALL privileges  ON `fotr_db`.* TO 'fotr_dev'@localhost;

USE fotr_db;
