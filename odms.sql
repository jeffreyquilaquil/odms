-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: odms2
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `tblaccess`
--

DROP TABLE IF EXISTS `tblaccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblaccess` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access` varchar(25) NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblaccess`
--

LOCK TABLES `tblaccess` WRITE;
/*!40000 ALTER TABLE `tblaccess` DISABLE KEYS */;
INSERT INTO `tblaccess` VALUES (1,'full'),(3,'users'),(4,'document'),(5,'organization');
/*!40000 ALTER TABLE `tblaccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblaccount`
--

DROP TABLE IF EXISTS `tblaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblaccount` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `indexname` varchar(20) NOT NULL,
  `access` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1 = active; 0 = inactive',
  `designation` int(4) NOT NULL,
  `office` int(4) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblaccount`
--

LOCK TABLES `tblaccount` WRITE;
/*!40000 ALTER TABLE `tblaccount` DISABLE KEYS */;
INSERT INTO `tblaccount` VALUES (1,'jnquilaquil','15bce0effdad0f222f63d61eaf4702e2','Jeffrey Noel','L','Quilaquil','','full,organization',1,2,2,'2018-02-01','2018-02-01'),(2,'admin','6af35324f6772a1c22ff698432a5a713','admin','A','admin','','full',1,5,3,'2018-08-20','0000-00-00'),(3,'bsurima','6af35324f6772a1c22ff698432a5a713','Brenjelyn','N','Surima','','full',1,5,3,'2018-09-02','0000-00-00'),(4,'jcgimena','6af35324f6772a1c22ff698432a5a713','John Carlo','C','Gimena','','full',0,5,2,'2018-08-25','0000-00-00');
/*!40000 ALTER TABLE `tblaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldesignation`
--

DROP TABLE IF EXISTS `tbldesignation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldesignation` (
  `desigID` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`desigID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldesignation`
--

LOCK TABLES `tbldesignation` WRITE;
/*!40000 ALTER TABLE `tbldesignation` DISABLE KEYS */;
INSERT INTO `tbldesignation` VALUES (1,'General Manager'),(2,'Head Librarian'),(3,'Cashier'),(4,'Assistant Accountant'),(5,'Head Accountant');
/*!40000 ALTER TABLE `tbldesignation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfiles`
--

DROP TABLE IF EXISTS `tblfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfiles` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `authorID` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1 = active; 0 = inactive',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfiles`
--

LOCK TABLES `tblfiles` WRITE;
/*!40000 ALTER TABLE `tblfiles` DISABLE KEYS */;
INSERT INTO `tblfiles` VALUES (1,'The Great Depression',2,254,1,'2018-02-08 12:31:37'),(2,'The Great Escape',2,253,1,'2018-02-10 00:00:00'),(3,'NwSSU_Confirmation_to_EVHRDC5',0,1571,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllogaccess`
--

DROP TABLE IF EXISTS `tbllogaccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllogaccess` (
  `accID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL,
  `userid` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllogaccess`
--

LOCK TABLES `tbllogaccess` WRITE;
/*!40000 ALTER TABLE `tbllogaccess` DISABLE KEYS */;
INSERT INTO `tbllogaccess` VALUES (1,1,'jnquilaquil','2018-02-01 17:49:33'),(2,1,'jnquilaquil','2018-02-05 09:40:26'),(3,1,'jnquilaquil','2018-02-08 14:08:40'),(4,1,'jnquilaquil','2018-02-10 04:03:44'),(5,1,'jnquilaquil','2018-02-10 13:47:18'),(6,1,'jnquilaquil','2018-02-13 13:48:37'),(7,1,'jnquilaquil','2018-02-13 15:15:28'),(8,0,'jnquilaquil','2018-02-13 15:27:35'),(9,1,'jnquilaquil','2018-02-13 15:27:44'),(10,0,'jnquilaquil','2018-02-13 15:27:55'),(11,1,'jnquilaquil','2018-02-13 15:28:10'),(12,0,'jnquilaquil','2018-02-13 15:32:31'),(13,1,'jnquilaquil','2018-02-13 15:32:52'),(14,0,'jnquilaquil','2018-02-13 15:34:14'),(15,1,'jnquilaquil','2018-02-13 15:34:23'),(16,0,'jnquilaquil','2018-02-13 15:35:43'),(17,1,'jnquilaquil','2018-02-13 15:35:53'),(18,0,'jnquilaquil','2018-02-13 15:38:22'),(19,1,'jnquilaquil','2018-02-13 15:38:32'),(20,0,'jnquilaquil','2018-02-13 15:45:56'),(21,1,'jnquilaquil','2018-02-13 15:47:09'),(22,0,'jnquilaquil','2018-02-13 15:48:33'),(23,1,'jnquilaquil','2018-02-13 15:48:55'),(24,0,'jnquilaquil','2018-02-13 15:52:56'),(25,1,'jnquilaquil','2018-02-13 15:53:07'),(26,0,'jnquilaquil','2018-02-13 15:53:44'),(27,1,'jnquilaquil','2018-02-13 15:54:09'),(28,0,'jnquilaquil','2018-02-13 15:57:35'),(29,1,'jnquilaquil','2018-02-13 15:57:54'),(30,0,'jnquilaquil','2018-02-13 15:58:22'),(31,1,'jnquilaquil1','2018-02-13 15:58:37'),(32,0,'jnquilaquil1','2018-02-13 15:58:42'),(33,0,'jnquilaquil1','2018-02-13 15:58:43'),(34,0,'1','2018-02-13 16:02:23'),(35,1,'1','2018-02-13 16:02:33'),(36,0,'1','2018-02-13 16:11:48'),(37,1,'1','2018-02-13 16:12:07'),(38,1,'1','2018-02-13 17:16:43'),(39,1,'1','2018-02-15 14:24:15'),(40,0,'1','2018-02-15 16:30:58'),(41,1,'1','2018-02-15 16:31:08'),(42,0,'1','2018-02-15 16:32:22'),(43,1,'1','2018-02-15 16:32:45'),(44,1,'1','2018-02-20 13:47:25'),(45,1,'1','2018-02-21 15:16:44'),(46,1,'1','2018-02-24 13:39:35'),(47,1,'1','2018-02-26 14:38:37'),(48,1,'1','2018-03-03 13:01:00'),(49,1,'1','2018-03-07 14:43:52'),(50,1,'1','2018-03-12 14:27:24'),(51,1,'1','2018-03-12 15:37:39'),(52,1,'1','2018-03-17 08:31:13'),(53,1,'1','2018-03-19 15:22:02'),(54,1,'1','2018-03-20 14:36:29'),(55,1,'1','2018-03-28 19:36:43'),(56,1,'1','2018-03-29 12:42:20'),(57,1,'1','2018-04-05 15:33:53'),(58,1,'1','2018-04-07 10:19:14'),(59,1,'1','2018-04-16 15:50:49'),(60,1,'1','2018-04-17 16:20:47'),(61,1,'1','2018-04-29 14:48:28'),(62,1,'1','2018-05-02 16:06:46'),(63,1,'1','2018-05-06 15:22:34'),(64,1,'1','2018-06-05 14:53:57'),(65,1,'1','2018-08-10 18:19:43'),(66,1,'1','2018-08-13 15:41:23'),(67,1,'1','2018-08-18 06:22:33'),(68,1,'1','2018-08-18 10:24:37'),(69,1,'1','2018-08-20 16:38:10'),(70,1,'2','2018-08-21 07:39:18'),(71,1,'2','2018-08-21 11:14:53'),(72,1,'1','2018-08-21 14:44:59'),(73,0,'1','2018-08-21 15:58:13'),(74,1,'1','2018-08-21 16:19:24'),(75,1,'1','2018-08-25 08:47:39'),(76,1,'1','2018-08-25 15:14:45'),(77,1,'1','2018-08-28 17:09:27'),(78,1,'1','2018-08-30 15:35:48'),(79,0,'1','2018-08-30 15:36:16'),(80,1,'2','2018-08-30 15:36:24'),(81,1,'2','2018-09-01 08:02:52'),(82,1,'2','2018-09-01 11:59:18'),(83,1,'2','2018-09-02 08:52:35'),(84,1,'2','2018-09-02 15:32:32'),(85,1,'2','2018-09-05 18:16:05'),(86,1,'2','2018-09-12 16:50:14'),(87,1,'2','2018-09-13 18:14:21'),(88,1,'2','2018-09-16 08:49:05'),(89,1,'2','2018-09-16 16:59:03'),(90,1,'2','2018-09-18 00:20:58'),(91,1,'2','2018-09-19 16:00:45'),(92,1,'2','2018-09-20 17:13:38'),(93,1,'2','2018-09-29 10:33:22'),(94,1,'2','2018-10-01 15:22:15'),(95,1,'2','2018-10-05 14:24:12'),(96,1,'2','2018-10-07 12:53:14'),(97,1,'2','2018-10-07 15:56:50'),(98,1,'2','2018-10-09 15:29:33');
/*!40000 ALTER TABLE `tbllogaccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbloffice`
--

DROP TABLE IF EXISTS `tbloffice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbloffice` (
  `offID` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`offID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbloffice`
--

LOCK TABLES `tbloffice` WRITE;
/*!40000 ALTER TABLE `tbloffice` DISABLE KEYS */;
INSERT INTO `tbloffice` VALUES (1,'Records'),(2,'Accounting'),(3,'Cashier');
/*!40000 ALTER TABLE `tbloffice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsignatory`
--

DROP TABLE IF EXISTS `tblsignatory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsignatory` (
  `sigID` int(11) NOT NULL AUTO_INCREMENT,
  `fileID` int(6) NOT NULL,
  `recepientsID` int(11) NOT NULL,
  `signatureStatus` int(11) NOT NULL DEFAULT '0',
  `signed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passKey` varchar(250) NOT NULL,
  PRIMARY KEY (`sigID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsignatory`
--

LOCK TABLES `tblsignatory` WRITE;
/*!40000 ALTER TABLE `tblsignatory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsignatory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-10  0:08:30
