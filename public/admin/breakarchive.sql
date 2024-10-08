-- MySQL dump 10.13  Distrib 5.6.48, for Linux (x86_64)
--
-- Host: localhost    Database: breakdb
-- ------------------------------------------------------
-- Server version	5.6.48-cll-lve

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
) ENGINE=MyISAM AUTO_INCREMENT=2884 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breaktracker`
--

LOCK TABLES `breaktracker` WRITE;
/*!40000 ALTER TABLE `breaktracker` DISABLE KEYS */;
INSERT INTO `breaktracker` VALUES (2883,'jack parisson','Break',' Out ','08:03'),(2882,'keith early','Break',' In ','06:14'),(2881,'keith early','Break',' Out ','06:08'),(2880,'fernando noriega','Lunch',' In ','20:17'),(2879,'fernando noriega','Lunch',' Out ','19:43'),(2878,'Chris Murri','Lunch',' In ','19:35'),(2877,'Chris Murri','Lunch',' Out ','19:08'),(2876,'Zach Beauchamp','Break',' In ','19:04'),(2875,'Zach Beauchamp','Break',' Out ','18:49'),(2874,'David Jimenez','Break',' In ','18:02'),(2872,'sam f','Lunch',' In ','17:29'),(2873,'John Hollar','Lunch',' Out ','17:49'),(2870,'Zach Beauchamp','Lunch',' In ','16:37'),(2871,'David Jimenez','Lunch',' Out ','17:27'),(2869,'John Hollar','Break',' In ','16:23'),(2867,'Zach Beauchamp','Lunch',' Out ','16:07'),(2868,'John Hollar','Break',' Out ','16:07'),(2866,'Michael Menase','Lunch',' In ','15:47'),(2865,'Michael Menase','Lunch',' Out ','15:25'),(2864,'David Jimenez','Break',' In ','15:16'),(2863,'sam f','Break',' In ','15:16'),(2862,'David Jimenez','Break',' Out ','15:01'),(2861,'sam f','Break',' Out ','15:01'),(2860,'Eduardo Segura','Break',' In ','14:55'),(2859,'Eduardo Segura','Break',' Out ','14:41'),(2858,'Zach Beauchamp','Break',' In ','14:28'),(2857,'John Boyd','Break',' Out ','14:16'),(2848,'John Boyd','Lunch',' In ','12:32'),(2856,'Jeff Nieman','Break',' In ','14:15'),(2855,'Zach Beauchamp','Break',' Out ','14:13'),(2854,'Jeff Nieman','Break',' Out ','13:59'),(2852,'John Hollar','Break',' Out ','13:08'),(2853,'John Hollar','Break',' In ','13:54'),(2851,'sam f','Break',' In ','13:22'),(2850,'sam f','Break',' Out ','13:10'),(2849,'Caleb Ammons','Lunch',' Out ','12:45'),(2847,'scontos','Lunch',' In ','12:09'),(2846,'Paul Hobaica','Lunch',' In ','12:03'),(2845,'John Boyd','Lunch',' Out ','12:02'),(2844,'keith early','Lunch',' In ','11:48'),(2843,'scontos','Lunch',' Out ','23:42'),(2842,'keith early','Lunch',' Out ','11:17'),(2841,'Jeff Nieman','Lunch',' In ','11:10'),(2840,'Paul Hobaica','Lunch',' Out ','11:07'),(2839,'Jeff Nieman','Lunch',' Out ','10:41'),(2838,'Caleb Ammons','Break',' In ','10:25'),(2837,'Caleb Ammons','Break',' Out ','10:15');
/*!40000 ALTER TABLE `breaktracker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08  8:10:45
