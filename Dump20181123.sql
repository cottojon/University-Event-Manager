CREATE DATABASE  IF NOT EXISTS `Scheduler` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `Scheduler`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: dbschedule.cm0a6cdoupkr.us-east-1.rds.amazonaws.com    Database: Scheduler
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `rsoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  KEY `userIDFK` (`userID`),
  KEY `RSOid_FK` (`rsoID`),
  CONSTRAINT `RSOid_FK` FOREIGN KEY (`rsoID`) REFERENCES `rso` (`rsoid`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `userIDFK` FOREIGN KEY (`userID`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentsAndRating`
--

DROP TABLE IF EXISTS `commentsAndRating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `commentsAndRating` (
  `userID` int(11) DEFAULT NULL,
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `commentText` varchar(300) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentID`),
  KEY `comments_userID_FK` (`userID`),
  KEY `commentsAndRating_eventID_FK` (`eventID`),
  CONSTRAINT `commentsAndRating_eventID_FK` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventid`),
  CONSTRAINT `comments_userID_FK` FOREIGN KEY (`userID`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentsAndRating`
--

LOCK TABLES `commentsAndRating` WRITE;
/*!40000 ALTER TABLE `commentsAndRating` DISABLE KEYS */;
INSERT INTO `commentsAndRating` VALUES (NULL,2,NULL,NULL,1),(NULL,4,'This event was uneventful.',NULL,2),(NULL,5,'This event was uneventful.',NULL,2),(NULL,6,'This event was uneventful.',NULL,2),(NULL,7,'This event was uneventful.',NULL,2),(NULL,8,'This event was uneventful.',NULL,2),(NULL,9,'This event was uneventful.',NULL,2),(NULL,10,'This event was amazing!',NULL,1),(NULL,11,'This event was amazing!',NULL,1),(NULL,12,'This event was amazing!',5,1),(NULL,14,'This event was uneventful.',2,1),(NULL,15,'This event was uneventful.',2,1);
/*!40000 ALTER TABLE `commentsAndRating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(30) DEFAULT NULL,
  `uniID` int(11) DEFAULT NULL,
  `isPublicEvent` tinyint(1) DEFAULT NULL,
  `isPrivateEvent` tinyint(1) DEFAULT NULL,
  `isRSOEvent` tinyint(1) DEFAULT NULL,
  `approvedBySuperAdmin` tinyint(1) DEFAULT NULL,
  `eventDescription` varchar(300) DEFAULT NULL,
  `timeOfEvent` time DEFAULT NULL,
  `dateOfEvent` date DEFAULT NULL,
  `contactEmailAddress` varchar(50) DEFAULT NULL,
  `contactPhone` varchar(15) DEFAULT NULL,
  `rsoID` int(11) DEFAULT NULL,
  `rsoName` varchar(30) DEFAULT NULL,
  `durationOfEvent` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`eventID`),
  KEY `uniID` (`uniID`),
  KEY `events_rsoID_fk` (`rsoID`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uniID`) REFERENCES `university` (`uniID`),
  CONSTRAINT `events_rsoID_fk` FOREIGN KEY (`rsoID`) REFERENCES `rso` (`rsoid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'event 1',1,1,0,0,0,NULL,'00:00:12',NULL,'contact@email.com',NULL,NULL,NULL,NULL,NULL),(2,'q',NULL,NULL,NULL,NULL,NULL,'q',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'event 2',2,1,0,0,0,'an event','08:00:00','2018-11-28','contact@email.com','9998887777',7,'w',120,NULL),(4,'conflict',NULL,1,0,0,NULL,'example public conflicting event.','08:00:00','2018-11-28','conflict@example.com','1234567890',2,'rso 2',60,'123 Example Street');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locationMark`
--

DROP TABLE IF EXISTS `locationMark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `locationMark` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `locationNAME` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locationMark`
--

LOCK TABLES `locationMark` WRITE;
/*!40000 ALTER TABLE `locationMark` DISABLE KEYS */;
INSERT INTO `locationMark` VALUES (2,'UCF','4000 University blvd',0.000000,0.000000);
/*!40000 ALTER TABLE `locationMark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locationMarkForEvents`
--

DROP TABLE IF EXISTS `locationMarkForEvents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `locationMarkForEvents` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `locationNAME` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locationMarkForEvents`
--

LOCK TABLES `locationMarkForEvents` WRITE;
/*!40000 ALTER TABLE `locationMarkForEvents` DISABLE KEYS */;
INSERT INTO `locationMarkForEvents` VALUES (1,'UCF','4000 University blvd',0.000000,0.000000);
/*!40000 ALTER TABLE `locationMarkForEvents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pictures` (
  `pictureID` int(11) DEFAULT NULL,
  `uniID` int(11) DEFAULT NULL,
  KEY `pictures_uniID_FK` (`uniID`),
  CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`uniID`) REFERENCES `university` (`uniID`),
  CONSTRAINT `pictures_uniID_FK` FOREIGN KEY (`uniID`) REFERENCES `university` (`uniID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rso`
--

DROP TABLE IF EXISTS `rso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rso` (
  `rsoID` int(11) NOT NULL AUTO_INCREMENT,
  `rsoName` varchar(30) DEFAULT NULL,
  `rsoType` varchar(30) DEFAULT NULL,
  `numStudents` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `rsoDescription` varchar(100) DEFAULT NULL,
  `durationOfEvent` int(11) DEFAULT NULL,
  PRIMARY KEY (`rsoID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rso`
--

LOCK TABLES `rso` WRITE;
/*!40000 ALTER TABLE `rso` DISABLE KEYS */;
INSERT INTO `rso` VALUES (0,'rso1','public',80,NULL,NULL,NULL),(1,'rso2','public',80,NULL,NULL,NULL),(2,'rso3','public',5,1,NULL,NULL),(3,'','Social',5,1,'This is a test',NULL),(4,'1','Choose...',5,1,'22',NULL),(5,'jasonRSO','Fundraising',5,1,'jason test',NULL),(6,'JTest','Fundraising',5,1,'s',NULL),(7,'w','Tech Talks',5,1,'w',NULL),(8,'more','Career',5,1,'s',NULL);
/*!40000 ALTER TABLE `rso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rsoEvents`
--

DROP TABLE IF EXISTS `rsoEvents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rsoEvents` (
  `rsoID` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  KEY `rsoID` (`rsoID`),
  KEY `rsoEvents_eventID_FK` (`eventID`),
  CONSTRAINT `rsoEvents_eventID_FK` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rsoEvents_ibfk_1` FOREIGN KEY (`rsoID`) REFERENCES `rso` (`rsoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rsoEvents`
--

LOCK TABLES `rsoEvents` WRITE;
/*!40000 ALTER TABLE `rsoEvents` DISABLE KEYS */;
/*!40000 ALTER TABLE `rsoEvents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rsoStudents`
--

DROP TABLE IF EXISTS `rsoStudents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rsoStudents` (
  `rsoStudentID` int(11) NOT NULL,
  `rsoID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`rsoStudentID`),
  KEY `rsoID` (`rsoID`),
  KEY `studentID` (`StudentID`),
  CONSTRAINT `rsoStudents_ibfk_1` FOREIGN KEY (`rsoID`) REFERENCES `rso` (`rsoID`),
  CONSTRAINT `rsoStudents_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rsoStudents`
--

LOCK TABLES `rsoStudents` WRITE;
/*!40000 ALTER TABLE `rsoStudents` DISABLE KEYS */;
INSERT INTO `rsoStudents` VALUES (0,0,35),(1,1,35),(2,0,27);
/*!40000 ALTER TABLE `rsoStudents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `student_studentID_FK` (`userID`),
  CONSTRAINT `student_studentID_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (27,27),(35,35),(50,50),(60,60),(0,73),(75,75),(76,76);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `superAdmin`
--

DROP TABLE IF EXISTS `superAdmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `superAdmin` (
  `superAdminID` int(11) NOT NULL,
  `uniID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`superAdminID`),
  KEY `userID` (`userID`),
  KEY `uniID` (`uniID`),
  CONSTRAINT `superAdmin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `superAdmin_ibfk_2` FOREIGN KEY (`uniID`) REFERENCES `university` (`uniID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `superAdmin`
--

LOCK TABLES `superAdmin` WRITE;
/*!40000 ALTER TABLE `superAdmin` DISABLE KEYS */;
/*!40000 ALTER TABLE `superAdmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `university` (
  `uniID` int(11) NOT NULL AUTO_INCREMENT,
  `uniName` varchar(30) DEFAULT NULL,
  `uniDescription` varchar(300) DEFAULT NULL,
  `numStudents` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `lat` int(11) DEFAULT NULL,
  `lon` int(11) DEFAULT NULL,
  PRIMARY KEY (`uniID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university`
--

LOCK TABLES `university` WRITE;
/*!40000 ALTER TABLE `university` DISABLE KEYS */;
INSERT INTO `university` VALUES (2,'UCF','knights',66000,'4000 Central Florida blvd',NULL,NULL),(3,'USF','bulls',50000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `university` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userEvents`
--

DROP TABLE IF EXISTS `userEvents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `userEvents` (
  `StudentID` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  KEY `eventID` (`eventID`),
  KEY `userEvents_ibfk_1` (`StudentID`),
  CONSTRAINT `userEvents_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`studentid`),
  CONSTRAINT `userEvents_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userEvents`
--

LOCK TABLES `userEvents` WRITE;
/*!40000 ALTER TABLE `userEvents` DISABLE KEYS */;
INSERT INTO `userEvents` VALUES (35,1);
/*!40000 ALTER TABLE `userEvents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(35) DEFAULT NULL,
  `isSuperAdmin` tinyint(1) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `isStudent` tinyint(1) DEFAULT NULL,
  `uniID` int(11) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `uniFK` (`uniID`),
  CONSTRAINT `uniFK` FOREIGN KEY (`uniID`) REFERENCES `university` (`uniID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,'7815696ecbf1c96e6894b779456d33',NULL,NULL,1,NULL,'my-first-user',NULL),(20,'92eb5ffee6ae2fec3ad71c77753157',NULL,NULL,1,NULL,'my-second-user',NULL),(21,'4a8a08f09d37b73795649038408b5f',NULL,NULL,1,NULL,'my-third-user',NULL),(22,'8277e0910d750195b448797616e091',NULL,NULL,1,NULL,'my-fourth-user',NULL),(23,'e1671797c52e15f763380b45e841ec',NULL,NULL,1,NULL,'my-fifth-user',NULL),(24,'8fa14cdd754f91cc6554c9e71929cc',NULL,NULL,1,NULL,'my-sixth-user',NULL),(25,'0cc175b9c0f1b6a831c399e2697726',NULL,NULL,1,NULL,'a',NULL),(26,'92eb5ffee6ae2fec3ad71c777531578f',NULL,NULL,1,NULL,'b',NULL),(27,'4a8a08f09d37b73795649038408b5f33',NULL,NULL,1,NULL,'c',NULL),(28,'8277e0910d750195b448797616e091ad',NULL,NULL,1,NULL,'d',NULL),(29,'e1671797c52e15f763380b45e841ec32',NULL,NULL,1,NULL,'e',NULL),(30,'8fa14cdd754f91cc6554c9e71929cce7',NULL,NULL,1,NULL,'f',NULL),(31,'b2f5ff47436671b6e533d8dc3614845d',NULL,NULL,1,NULL,'g',NULL),(32,'2510c39011c5be704182423e3a695e91',NULL,NULL,1,NULL,'h',NULL),(33,'865c0c0b4ab0e063e5caa3387c1a8741',NULL,NULL,1,NULL,'i',NULL),(34,'363b122c528f54df4a0446b6bab05515',NULL,NULL,1,NULL,'j',NULL),(35,'8ce4b16b22b58894aa86c421e8759df3',NULL,NULL,1,NULL,'k',NULL),(36,'2db95e8e1a9267b7a1188556b2013b33',NULL,NULL,1,NULL,'l',NULL),(37,'6f8f57715090da2632453988d9a1501b',NULL,NULL,1,NULL,'m',NULL),(38,'7b8b965ad4bca0e41ab51de7b31363a1',NULL,NULL,1,NULL,'n',NULL),(39,'d95679752134a2d9eb61dbd7b91c4bcc',NULL,NULL,1,NULL,'o',NULL),(40,'83878c91171338902e0fe0fb97a8c47a',NULL,NULL,1,NULL,'p',NULL),(41,'7694f4a66316e53c8cdd9d9954bd611d',NULL,NULL,1,NULL,'q',NULL),(42,'4b43b0aee35624cd95b910189b3dc231',NULL,NULL,1,NULL,'r',NULL),(43,'03c7c0ace395d80182db07ae2c30f034',NULL,NULL,1,NULL,'s',NULL),(44,'e358efa489f58062f10dd7316b65649e',NULL,NULL,1,NULL,'testInsert',NULL),(45,'7b774effe4a349c6dd82ad4f4f21d34c',NULL,NULL,1,NULL,'u',NULL),(46,'9e3669d19b675bd57058fd4664205d2a',NULL,NULL,1,NULL,'v','v@email.com'),(47,'f1290186a5d0b1ceab27f4e77c0c5d68',NULL,NULL,1,NULL,'w','w@email.com'),(48,'9dd4e461268c8034f5c8564e155c67a6',NULL,NULL,1,NULL,'x','x@email.com'),(49,'415290769594460e2e485922904f345d',NULL,NULL,1,NULL,'y','y@email.com'),(50,'fbade9e36a3f36d3d676c1b808451dd7',NULL,NULL,1,NULL,'z','z@email.com'),(51,'4124bc0a9335c27f086f24ba207a4912',NULL,NULL,1,NULL,'aa','aa@email.com'),(52,'21ad0bd836b90d08f4cf640b4c298e7c',NULL,NULL,1,NULL,'bb','bb@email.com'),(53,'e0323a9039add2978bf5b49550572c7c',NULL,NULL,1,NULL,'cc','cc@email.com'),(54,'1aabac6d068eef6a7bad3fdf50a05cc8',NULL,NULL,1,NULL,'dd','dd@email.com'),(55,'08a4415e9d594ff960030b921d42b91e',NULL,NULL,1,NULL,'ee','ee@email.com'),(56,'633de4b0c14ca52ea2432a3c8a5c4c31',NULL,NULL,1,NULL,'ff','ff@email.com'),(57,'73c18c59a39b18382081ec00bb456d43',NULL,NULL,1,NULL,'gg','gg@email.com'),(58,'5e36941b3d856737e81516acd45edc50',NULL,NULL,1,NULL,'hh','hh@email.com'),(59,'7e98b8a17c0aad30ba64d47b74e2a6c1',NULL,NULL,1,NULL,'ii','ii@email.com'),(60,'bf2bc2545a4a5f5683d9ef3ed0d977e0',NULL,NULL,1,NULL,'jj','jj@email.com'),(61,'dc468c70fb574ebd07287b38d0d0676d',NULL,NULL,1,NULL,'kk','kk@email.com'),(62,'woo',NULL,NULL,NULL,NULL,'woo',NULL),(63,'q',NULL,NULL,NULL,NULL,'blake',NULL),(64,'a',NULL,NULL,NULL,NULL,'blak',NULL),(65,'pppp',NULL,NULL,NULL,NULL,'pppp',NULL),(66,'new',NULL,NULL,NULL,NULL,'new','new@email.com'),(67,'oAV-9an-1of-rgr',0,NULL,NULL,NULL,'Jay','jay@email.com'),(68,'oAV-9an-1of-rgr',1,NULL,NULL,NULL,'Jaywooo','jay@email.com'),(69,'5b54c0a045f179bcbbbc9abcb8b5cd4c',NULL,NULL,1,NULL,'ll','ll@email.com'),(70,'b3cd915d758008bd19d0f2428fbb354a',NULL,NULL,1,NULL,'mm','mm@email.com'),(71,'eab71244afb687f16d8c4f5ee9d6ef0e',NULL,NULL,1,NULL,'nn','nn@email.com'),(72,'e47ca7a09cf6781e29634502345930a7',NULL,NULL,1,NULL,'oo','oo@email.com'),(73,'c483f6ce851c9ecd9fb835ff7551737c',NULL,NULL,1,NULL,'pp','pp@email.com'),(74,'099b3b060154898840f0ebdfb46ec78f',NULL,NULL,1,NULL,'qq','qq@email.com'),(75,'514f1b439f404f86f77090fa9edc96ce',NULL,NULL,1,NULL,'rr','rr@email.com'),(76,'3691308f2a4c2f6983f2880d32e29c84',NULL,NULL,1,NULL,'ss','ss@email.com'),(77,'jbrulez',1,NULL,NULL,NULL,'JusinBieber1','jb@mail.com'),(78,'ZaE-E6K-HLo-JHn',1,NULL,NULL,NULL,'JusinBieber12','jb2@mail.com'),(79,'4Sh-jUL-v9U-IYv',0,NULL,NULL,NULL,'quail','d@d.com'),(80,'tt',0,0,1,NULL,'tt','tt@email.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-23 20:20:37
