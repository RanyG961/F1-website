-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: f1_website
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pilot_team`
--

DROP TABLE IF EXISTS `pilot_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pilot_team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pilot_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `pilot_number` int(10) unsigned DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilot_team`
--

LOCK TABLES `pilot_team` WRITE;
/*!40000 ALTER TABLE `pilot_team` DISABLE KEYS */;
INSERT INTO `pilot_team` VALUES (1,1,1,44,NULL),(2,3,3,33,NULL),(3,2,1,77,NULL),(4,5,2,5,NULL),(5,4,2,16,NULL),(7,8,3,23,NULL),(8,6,4,55,NULL),(9,11,4,4,NULL),(10,9,5,3,NULL),(11,14,5,60,NULL),(12,12,6,7,NULL),(13,17,6,99,NULL),(14,10,7,11,NULL),(15,15,7,18,NULL),(16,13,8,26,NULL),(17,7,8,10,NULL),(18,18,9,8,NULL),(19,16,9,20,NULL),(20,19,10,63,NULL),(21,20,10,88,NULL),(22,26,1,313,NULL),(23,28,1,961,NULL),(24,29,10,6,NULL),(25,30,5,31,NULL),(26,31,5,3,NULL),(27,32,5,3,NULL),(28,33,1,961,NULL);
/*!40000 ALTER TABLE `pilot_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilots`
--

DROP TABLE IF EXISTS `pilots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pilots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `still_driving` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilots`
--

LOCK TABLES `pilots` WRITE;
/*!40000 ALTER TABLE `pilots` DISABLE KEYS */;
INSERT INTO `pilots` VALUES (1,'Lewis','Hamilton',NULL,NULL,NULL,'HAM',1),(2,'Valtteri','Bottas',NULL,NULL,NULL,'BOT',1),(3,'Max','Verstappen',NULL,NULL,NULL,'VER',1),(4,'Charles','Leclerc',NULL,NULL,NULL,'LEC',1),(5,'Sebastian','Vettel',NULL,NULL,NULL,'VET',1),(6,'Carlos','Sainz Jr',NULL,NULL,NULL,'SAI',1),(7,'Pierre','Gasly',NULL,NULL,NULL,'GAS',1),(8,'Alexander','Albon',NULL,NULL,NULL,'ALB',1),(9,'Daniel','Ricciardio',NULL,NULL,NULL,'RIC',1),(10,'Sergio','Perez',NULL,NULL,NULL,'PER',1),(11,'Lando','Norris',NULL,NULL,NULL,'NOR',1),(12,'Kimi','Raikkonen',NULL,NULL,NULL,'RAI',1),(13,'Daniil','Kvyat',NULL,NULL,NULL,'KVY',1),(14,'Nico','Hulkenberg',NULL,NULL,NULL,'HUL',0),(15,'Lance','Stroll',NULL,NULL,NULL,'STR',1),(16,'Kevin','Magnussen',NULL,NULL,NULL,'MAG',1),(17,'Antonio','Giovinazzi',NULL,NULL,NULL,'GIO',1),(18,'Romain','Grosjean',NULL,NULL,NULL,'GRO',1),(19,'Robert','Kubica',NULL,NULL,NULL,'KUB',0),(20,'Georges','Russel',NULL,NULL,NULL,'RUS',1),(26,'Mohammed-Bashir','Mahdi',NULL,NULL,NULL,'MHD',0),(28,'Rany','Ghazzawi',NULL,NULL,NULL,'GHA',0),(29,'Nicholas','Latifi',NULL,NULL,NULL,'LAT',1),(30,'Esteban','Ocon',NULL,NULL,NULL,'OCO',1);
/*!40000 ALTER TABLE `pilots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prognosis`
--

DROP TABLE IF EXISTS `prognosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prognosis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `race_id` int(10) unsigned DEFAULT NULL,
  `pilot_id` int(10) unsigned DEFAULT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prognosis`
--

LOCK TABLES `prognosis` WRITE;
/*!40000 ALTER TABLE `prognosis` DISABLE KEYS */;
INSERT INTO `prognosis` VALUES (1,25,13,12,1),(2,25,13,5,2),(3,25,13,4,3),(4,25,13,1,4),(5,25,13,6,5),(6,25,13,2,6),(7,25,13,7,7),(8,25,13,8,8),(9,25,13,9,9),(10,25,13,10,10),(12,25,13,11,12),(13,25,13,13,13),(14,25,13,14,14),(15,25,13,15,15),(16,25,13,17,16),(17,25,13,16,17),(18,25,13,18,18),(19,25,13,19,19),(20,25,13,20,20),(21,25,13,1,1),(22,25,13,2,2),(24,25,13,4,4),(25,25,13,5,5),(26,25,13,6,6),(27,25,13,7,7),(28,25,13,8,8),(29,25,13,9,9),(30,25,13,10,10),(31,25,13,11,11),(32,25,13,12,12),(33,25,13,13,13),(34,25,13,14,14),(35,25,13,15,15),(36,25,13,16,16),(37,25,13,17,17),(38,25,13,18,18),(39,25,13,19,19),(40,25,13,20,20),(41,25,1,1,1),(42,25,1,2,2),(44,25,1,4,4),(45,25,1,5,5),(46,25,1,6,6),(47,25,1,7,7),(48,25,1,8,8),(49,25,1,9,9),(50,25,1,10,10),(51,25,1,11,11),(52,25,1,12,12),(53,25,1,13,13),(54,25,1,14,14),(55,25,1,15,15),(56,25,1,16,16),(57,25,1,17,17),(58,25,1,18,18),(59,25,1,19,19),(60,25,1,20,20),(61,25,2,1,1),(62,25,2,2,2),(64,25,2,4,4),(65,25,2,5,5),(66,25,2,6,6),(67,25,2,7,7),(68,25,2,8,8),(69,25,2,9,9),(70,25,2,10,10),(71,25,2,11,11),(72,25,2,12,12),(73,25,2,13,13),(74,25,2,14,14),(75,25,2,15,15),(76,25,2,16,16),(77,25,2,17,17),(78,25,2,18,18),(79,25,2,19,19),(80,25,2,20,20),(81,25,6,12,1),(82,25,6,5,2),(83,25,6,4,3),(84,25,6,2,4),(85,25,6,6,5),(86,25,6,7,6),(87,25,6,9,7),(88,25,6,13,8),(89,25,6,18,9),(90,25,6,1,10),(91,25,6,15,11),(92,25,6,20,12),(93,25,6,17,13),(94,25,6,19,14),(95,25,6,11,15),(96,25,6,14,16),(97,25,6,8,17),(98,25,6,10,18),(99,25,6,16,19),(101,25,7,4,1),(102,25,7,2,2),(103,25,7,5,3),(104,25,7,1,4),(105,25,7,8,5),(106,25,7,10,6),(107,25,7,12,7),(108,25,7,11,8),(109,25,7,18,9),(110,25,7,13,10),(111,25,7,7,11),(112,25,7,20,12),(113,25,7,9,13),(114,25,7,6,14),(115,25,7,19,15),(116,25,7,17,16),(118,25,7,15,18),(119,25,7,16,19),(120,25,7,14,20),(161,1,6,12,1),(162,1,6,4,2),(163,1,6,1,3),(164,1,6,2,4),(165,1,6,5,5),(166,1,6,6,6),(167,1,6,7,7),(168,1,6,8,8),(169,1,6,9,9),(170,1,6,10,10),(171,1,6,11,11),(172,1,6,13,12),(173,1,6,14,13),(174,1,6,15,14),(175,1,6,3,15),(176,1,6,16,16),(177,1,6,17,17),(178,1,6,18,18),(179,1,6,19,19),(180,1,6,20,20),(181,1,1,1,1),(182,1,1,12,2),(183,1,1,2,3),(184,1,1,4,4),(185,1,1,5,5),(186,1,1,6,6),(187,1,1,7,7),(188,1,1,8,8),(189,1,1,9,9),(190,1,1,10,10),(191,1,1,11,11),(192,1,1,13,12),(193,1,1,14,13),(194,1,1,15,14),(195,1,1,16,15),(196,1,1,17,16),(197,1,1,3,17),(198,1,1,18,18),(199,1,1,19,19),(200,1,1,20,20),(201,1,2,1,1),(202,1,2,2,2),(203,1,2,3,3),(204,1,2,4,4),(205,1,2,5,5),(206,1,2,6,6),(207,1,2,7,7),(208,1,2,8,8),(209,1,2,9,9),(210,1,2,10,10),(211,1,2,11,11),(212,1,2,12,12),(213,1,2,13,13),(214,1,2,14,14),(215,1,2,15,15),(216,1,2,16,16),(217,1,2,17,17),(218,1,2,18,18),(219,1,2,19,19),(220,1,2,20,20),(221,1,21,12,1),(222,1,21,1,2),(223,1,21,2,3),(224,1,21,3,4),(225,1,21,4,5),(226,1,21,5,6),(227,1,21,6,7),(228,1,21,7,8),(229,1,21,8,9),(230,1,21,9,10),(231,1,21,10,11),(232,1,21,11,12),(233,1,21,13,13),(234,1,21,14,14),(235,1,21,15,15),(236,1,21,17,16),(237,1,21,18,17),(238,1,21,19,18),(239,1,21,20,19),(240,1,21,16,20),(241,21,1,2,1),(242,21,1,1,2),(243,21,1,3,3),(244,21,1,5,4),(245,21,1,4,5),(246,21,1,16,6),(247,21,1,12,7),(248,21,1,14,8),(249,21,1,15,9),(250,21,1,13,10),(251,21,1,7,11),(252,21,1,11,12),(253,21,1,8,13),(254,21,1,10,14),(255,21,1,17,15),(256,21,1,20,16),(257,21,1,19,17),(258,21,1,9,18),(259,21,1,18,19),(260,21,1,6,20);
/*!40000 ALTER TABLE `prognosis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race_results`
--

DROP TABLE IF EXISTS `race_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race_results` (
  `race_id` int(10) unsigned NOT NULL,
  `pilot_id` int(10) unsigned NOT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  `time` time(3) DEFAULT NULL,
  PRIMARY KEY (`race_id`,`pilot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race_results`
--

LOCK TABLES `race_results` WRITE;
/*!40000 ALTER TABLE `race_results` DISABLE KEYS */;
INSERT INTO `race_results` VALUES (1,1,2,NULL),(1,2,1,NULL),(1,3,3,NULL),(1,4,5,NULL),(1,5,4,NULL),(1,6,20,NULL),(1,7,11,NULL),(1,8,14,NULL),(1,9,19,NULL),(1,10,13,NULL),(1,11,12,NULL),(1,12,8,NULL),(1,13,10,NULL),(1,14,7,NULL),(1,15,9,NULL),(1,16,6,NULL),(1,17,15,NULL),(1,18,18,NULL),(1,19,17,NULL),(1,20,16,NULL),(2,1,1,NULL),(2,2,2,NULL),(2,3,4,NULL),(2,4,3,NULL),(2,5,5,NULL),(2,6,19,NULL),(2,7,8,NULL),(2,8,9,NULL),(2,9,18,NULL),(2,10,10,NULL),(2,11,6,NULL),(2,12,7,NULL),(2,13,12,NULL),(2,14,17,NULL),(2,15,14,NULL),(2,16,13,NULL),(2,17,11,NULL),(2,18,20,NULL),(2,19,16,NULL),(2,20,15,NULL),(3,1,1,NULL),(3,2,2,NULL),(3,3,4,NULL),(3,4,5,NULL),(3,5,3,NULL),(3,6,14,NULL),(3,7,6,NULL),(3,8,10,NULL),(3,9,7,NULL),(3,10,8,NULL),(3,11,18,NULL),(3,12,9,NULL),(3,13,19,NULL),(3,14,20,NULL),(3,15,12,NULL),(3,16,13,NULL),(3,17,15,NULL),(3,18,11,NULL),(3,19,17,NULL),(3,20,16,NULL),(4,1,2,NULL),(4,2,1,NULL),(4,3,4,NULL),(4,4,5,NULL),(4,5,3,NULL),(4,6,7,NULL),(4,7,17,NULL),(4,8,11,NULL),(4,9,20,NULL),(4,10,6,NULL),(4,11,8,NULL),(4,12,10,NULL),(4,13,19,NULL),(4,14,14,NULL),(4,15,9,NULL),(4,16,13,NULL),(4,17,12,NULL),(4,18,18,NULL),(4,19,16,NULL),(4,20,15,NULL),(5,1,1,NULL),(5,2,2,NULL),(5,3,3,NULL),(5,4,5,NULL),(5,5,4,NULL),(5,6,8,NULL),(5,7,6,NULL),(5,8,11,NULL),(5,9,12,NULL),(5,10,15,NULL),(5,11,20,NULL),(5,12,14,NULL),(5,13,9,NULL),(5,14,13,NULL),(5,15,19,NULL),(5,16,7,NULL),(5,17,16,NULL),(5,18,10,NULL),(5,19,18,NULL),(5,20,17,NULL),(6,1,1,NULL),(6,2,3,NULL),(6,3,4,NULL),(6,4,20,NULL),(6,5,2,NULL),(6,6,6,NULL),(6,7,5,NULL),(6,8,8,NULL),(6,9,9,NULL),(6,10,13,NULL),(6,11,11,NULL),(6,12,17,NULL),(6,13,7,NULL),(6,14,14,NULL),(6,15,16,NULL),(6,16,12,NULL),(6,17,19,NULL),(6,18,10,NULL),(6,19,18,NULL),(6,20,15,NULL),(7,1,1,NULL),(7,2,4,NULL),(7,3,5,NULL),(7,4,3,NULL),(7,5,2,NULL),(7,6,11,NULL),(7,7,8,NULL),(7,8,19,NULL),(7,9,6,NULL),(7,10,12,NULL),(7,11,20,NULL),(7,12,15,NULL),(7,13,10,NULL),(7,14,7,NULL),(7,15,9,NULL),(7,16,17,NULL),(7,17,13,NULL),(7,18,14,NULL),(7,19,18,NULL),(7,20,16,NULL),(8,1,1,NULL),(8,2,2,NULL),(8,3,4,NULL),(8,4,3,NULL),(8,5,5,NULL),(8,6,6,NULL),(8,7,10,NULL),(8,8,15,NULL),(8,9,11,NULL),(8,10,12,NULL),(8,11,9,NULL),(8,12,7,NULL),(8,13,14,NULL),(8,14,8,NULL),(8,15,13,NULL),(8,16,17,NULL),(8,17,16,NULL),(8,18,20,NULL),(8,19,18,NULL),(8,20,19,NULL),(9,1,5,NULL),(9,2,3,NULL),(9,3,1,NULL),(9,4,2,NULL),(9,5,4,NULL),(9,6,8,NULL),(9,7,7,NULL),(9,8,15,NULL),(9,9,12,NULL),(9,10,11,NULL),(9,11,6,NULL),(9,12,9,NULL),(9,13,17,NULL),(9,14,13,NULL),(9,15,14,NULL),(9,16,19,NULL),(9,17,10,NULL),(9,18,16,NULL),(9,19,20,NULL),(9,20,18,NULL),(10,1,1,NULL),(10,2,2,NULL),(10,3,5,NULL),(10,4,3,NULL),(10,5,16,NULL),(10,6,6,NULL),(10,7,4,NULL),(10,8,12,NULL),(10,9,7,NULL),(10,10,17,NULL),(10,11,11,NULL),(10,12,8,NULL),(10,13,9,NULL),(10,14,10,NULL),(10,15,13,NULL),(10,16,20,NULL),(10,17,18,NULL),(10,18,19,NULL),(10,19,15,NULL),(10,20,14,NULL),(11,1,9,NULL),(11,2,15,NULL),(11,3,1,NULL),(11,4,17,NULL),(11,5,2,NULL),(11,6,5,NULL),(11,7,14,NULL),(11,8,6,NULL),(11,9,19,NULL),(11,10,20,NULL),(11,11,18,NULL),(11,12,12,NULL),(11,13,3,NULL),(11,14,16,NULL),(11,15,4,NULL),(11,16,8,NULL),(11,17,13,NULL),(11,18,7,NULL),(11,19,10,NULL),(11,20,11,NULL),(12,1,1,NULL),(12,2,8,NULL),(12,3,2,NULL),(12,4,4,NULL),(12,5,3,NULL),(12,6,5,NULL),(12,7,6,NULL),(12,8,10,NULL),(12,9,14,NULL),(12,10,11,NULL),(12,11,9,NULL),(12,12,7,NULL),(12,13,15,NULL),(12,14,12,NULL),(12,15,17,NULL),(12,16,13,NULL),(12,17,18,NULL),(12,18,20,NULL),(12,19,19,NULL),(12,20,16,NULL),(13,1,2,NULL),(13,2,3,NULL),(13,3,20,NULL),(13,4,1,NULL),(13,5,4,NULL),(13,6,19,NULL),(13,7,9,NULL),(13,8,5,NULL),(13,9,14,NULL),(13,10,6,NULL),(13,11,11,NULL),(13,12,16,NULL),(13,13,7,NULL),(13,14,8,NULL),(13,15,10,NULL),(13,16,12,NULL),(13,17,18,NULL),(13,18,13,NULL),(13,19,17,NULL),(13,20,15,NULL),(14,1,3,NULL),(14,2,2,NULL),(14,3,8,NULL),(14,4,1,NULL),(14,5,13,NULL),(14,6,20,NULL),(14,7,11,NULL),(14,8,6,NULL),(14,9,4,NULL),(14,10,7,NULL),(14,11,10,NULL),(14,12,15,NULL),(14,13,19,NULL),(14,14,5,NULL),(14,15,12,NULL),(14,16,18,NULL),(14,17,9,NULL),(14,18,16,NULL),(14,19,17,NULL),(14,20,14,NULL),(15,1,4,NULL),(15,2,5,NULL),(15,3,3,NULL),(15,4,2,NULL),(15,5,1,NULL),(15,6,12,NULL),(15,7,8,NULL),(15,8,6,NULL),(15,9,14,NULL),(15,10,19,NULL),(15,11,7,NULL),(15,12,18,NULL),(15,13,15,NULL),(15,14,9,NULL),(15,15,13,NULL),(15,16,17,NULL),(15,17,10,NULL),(15,18,11,NULL),(15,19,16,NULL),(15,20,20,NULL),(16,1,1,NULL),(16,2,2,NULL),(16,3,4,NULL),(16,4,3,NULL),(16,5,18,NULL),(16,6,6,NULL),(16,7,14,NULL),(16,8,5,NULL),(16,9,19,NULL),(16,10,7,NULL),(16,11,8,NULL),(16,12,13,NULL),(16,13,12,NULL),(16,14,10,NULL),(16,15,11,NULL),(16,16,9,NULL),(16,17,15,NULL),(16,18,20,NULL),(16,19,16,NULL),(16,20,17,NULL),(17,1,3,NULL),(17,2,1,NULL),(17,3,18,NULL),(17,4,6,NULL),(17,5,2,NULL),(17,6,5,NULL),(17,7,7,NULL),(17,8,4,NULL),(17,9,19,NULL),(17,10,8,NULL),(17,11,11,NULL),(17,12,12,NULL),(17,13,10,NULL),(17,14,20,NULL),(17,15,9,NULL),(17,16,15,NULL),(17,17,14,NULL),(17,18,13,NULL),(17,19,17,NULL),(17,20,16,NULL),(18,1,1,NULL),(18,2,3,NULL),(18,3,6,NULL),(18,4,4,NULL),(18,5,2,NULL),(18,6,13,NULL),(18,7,9,NULL),(18,8,5,NULL),(18,9,8,NULL),(18,10,7,NULL),(18,11,20,NULL),(18,12,19,NULL),(18,13,11,NULL),(18,14,10,NULL),(18,15,12,NULL),(18,16,15,NULL),(18,17,14,NULL),(18,18,17,NULL),(18,19,18,NULL),(18,20,16,NULL),(19,1,2,NULL),(19,2,1,NULL),(19,3,3,NULL),(19,4,4,NULL),(19,5,20,NULL),(19,6,8,NULL),(19,7,16,NULL),(19,8,5,NULL),(19,9,6,NULL),(19,10,10,NULL),(19,11,7,NULL),(19,12,11,NULL),(19,13,12,NULL),(19,14,9,NULL),(19,15,13,NULL),(19,16,18,NULL),(19,17,14,NULL),(19,18,15,NULL),(19,19,19,NULL),(19,20,17,NULL),(20,1,7,NULL),(20,2,20,NULL),(20,3,1,NULL),(20,4,18,NULL),(20,5,17,NULL),(20,6,3,NULL),(20,7,2,NULL),(20,8,14,NULL),(20,9,6,NULL),(20,10,9,NULL),(20,11,8,NULL),(20,12,4,NULL),(20,13,10,NULL),(20,14,15,NULL),(20,15,19,NULL),(20,16,11,NULL),(20,17,5,NULL),(20,18,13,NULL),(20,19,16,NULL),(20,20,12,NULL),(21,1,1,NULL),(21,2,4,NULL),(21,3,2,NULL),(21,4,3,NULL),(21,5,5,NULL),(21,6,10,NULL),(21,7,18,NULL),(21,8,6,NULL),(21,9,11,NULL),(21,10,7,NULL),(21,11,8,NULL),(21,12,13,NULL),(21,13,9,NULL),(21,14,12,NULL),(21,15,20,NULL),(21,16,14,NULL),(21,17,16,NULL),(21,18,15,NULL),(21,19,19,NULL),(21,20,17,NULL);
/*!40000 ALTER TABLE `race_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `engine` varchar(255) DEFAULT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `still_racing` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Mercedes-AMG','Mercedes','W11',NULL,'AMG',1),(2,'Scuderia-Ferrari','Ferrari','SF1000',NULL,'SDF',1),(3,'Red-Bull','Honda','RB16',NULL,'RDB',1),(4,'McLaren-F1','Renault','MCL35',NULL,'MCL',1),(5,'Renault-F1','Renault','R.S.20',NULL,'REN',1),(6,'Alfa-Romeo','Ferrari','C39',NULL,'AFR',1),(7,'Racing-point','Mercedes','RP20',NULL,'RPO',1),(8,'AlphaTauri','Honda','AT01',NULL,'SAT',1),(9,'Haas-F1','Ferrari','VF-20',NULL,'HAS',1),(10,'Williams-Racing','Mercedes','FW43',NULL,'WIL',1);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `length` float DEFAULT NULL,
  `turns` int(10) unsigned DEFAULT NULL,
  `circuitID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracks`
--

LOCK TABLES `tracks` WRITE;
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;
INSERT INTO `tracks` VALUES (1,'Circuit de l\'Albert Park','Australie','Melbourne',5.303,58,'albert_park'),(2,'Circuit de Sakhir','Bahrein','Sakhir',5.412,57,'bahrain'),(3,'Circuit de Shanghai','Chine','Shanghai',5.451,56,'shanghai'),(4,'Circuit de Bakou','Azerbaidjan','Bakou',6.003,51,'BAK'),(5,'Circuit de Barcelona-Catalunya','Espagne','Barcelone',4.655,66,'catalunya'),(6,'Circuit de Monaco','Monaco','Monaco',3.337,78,'monaco'),(7,'Circuit Gilles Villeneuve','Canada','Montreal',4.361,70,'villeneuve'),(8,'Circuit Paul Ricard','France','Castellet',5.842,53,'ricard'),(9,'Red Bull Ring','Autriche','Spielberg',4.318,71,'red_bull_ring'),(10,'Circuit de Silverstone','Grande-Bretagne','Silverstone',5.891,52,'silverstone'),(11,'HockenheimRing','Allemagne','Hockenheim',4.574,67,'hockenheimring'),(12,'Hungaroring','Hongrie','Budapest',4.381,70,'hungaroring'),(13,'Circuit de Spa-Francorchamps','Belgique','Francorchamps',7.004,44,'spa'),(14,'Circuit de Monza','Italie','Monza',5.793,53,'monza'),(15,'Circuit de Marina Bay','Singapour','Singapour',5.073,61,'marina_bay'),(16,'Circuit de Sotchi','Russie','Sotchi',5.872,53,'sochi'),(17,'Circuit de Suzuka','Japon','Suzuka',5.807,53,'suzuka'),(18,'Circuit Hermanos Rodriguez','Mexique','Mexico',4.304,71,'rodriguez'),(19,'Circuit des Ameriques','USA','Austin',5.513,56,'americas'),(20,'Circuit d\'Interlagos','Bresil','Sao Paulo',4.309,71,'interlagos'),(21,'Circuit Yas Marina','EAU','Abou Dhabi',5.554,55,'yas_marina');
/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(70) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Rany','Ghazzawi','1996-08-11','76c763ef936c0519e00dc1d80c5d6df8fcafd31a58d5adc2bd2ba7c02da0c3e1','ranyg','ranywwe@hotmail.com',1),(20,'Mel','Ouhaibi','1997-06-24','b54867801f48e0eb0bfd9a896b83013a4e6964687784419cbcb8e2879f7610db','mel313','mel313@hotmail.com',0),(21,'Mohammed-Bashir','Mahdi','1998-01-20','b54867801f48e0eb0bfd9a896b83013a4e6964687784419cbcb8e2879f7610db','momo313','mobash@gmail.com',0),(25,'Abdel','Youbi','2010-01-01','5208870013924dec86081e8507b049c8bca1b9ab6a85889b83ca4c93c4af22b3','youbi212','youbi@hotmail.com',1),(28,'Hala','Zeaiter','1968-11-05','a171be25368d4182dcd29ca87672f7686373ba0680b720604dba0b2779f3aad5','halaz','hala.z@live.fr',0),(32,'Semmy','Baiticle','2000-10-05','1a67e8be1af8ddadc2084fb8dea4fd448c708cd28c992096987e0afb17715bda','zeitouni','baiticle@hotmail.fr',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-08  3:12:00
