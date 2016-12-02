-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: zf
-- ------------------------------------------------------
-- Server version	5.5.50

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
INSERT INTO `country` VALUES (1,'Россия'),(2,'США');
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(256) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
INSERT INTO `user` VALUES (1,'Иванов Иван Иванович','+7-(900)-456-45-45',1),(2,'Петров Петр Петрович','+7-(900)-477-77-77',2),(3,'Сидоров Сидор Сидорович','+7-(111)-456-78-96',1);
UNLOCK TABLES;
