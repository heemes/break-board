-- MySQL dump 10.13  Distrib 5.6.48, for Linux (x86_64)
--
-- Host: localhost    Database: breakcheck
-- ------------------------------------------------------
-- Server version	5.6.48-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `breaktracker`
--

DROP TABLE IF EXISTS `breaktracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breaktracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'entry',
  `agent` varchar(20) NOT NULL COMMENT 'agent full name',
  `breaktype` varchar(5) NOT NULL COMMENT 'lunch or break',
  `inORout` varchar(5) NOT NULL COMMENT 'Agent clocking in or out from Break or Lunch',
  `time` varchar(10) NOT NULL COMMENT 'current time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=284 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breaktracker`
--

LOCK TABLES `breaktracker` WRITE;
/*!40000 ALTER TABLE `breaktracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `breaktracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'breakcheck'
--

--
-- Dumping routines for database 'breakcheck'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 17:58:59
