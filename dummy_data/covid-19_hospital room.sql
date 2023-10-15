CREATE DATABASE  IF NOT EXISTS `covid-19` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `covid-19`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: covid-19
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hospital room`
--

DROP TABLE IF EXISTS `hospital room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital room` (
  `room num` int NOT NULL,
  `hospital_code` varchar(45) NOT NULL,
  `capacity` int NOT NULL,
  `type` varchar(15) NOT NULL,
  `current number` int DEFAULT NULL,
  PRIMARY KEY (`room num`),
  KEY `hospital code_idx` (`hospital_code`),
  CONSTRAINT `hospital_code` FOREIGN KEY (`hospital_code`) REFERENCES `hospital` (`hospital code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital room`
--

LOCK TABLES `hospital room` WRITE;
/*!40000 ALTER TABLE `hospital room` DISABLE KEYS */;
INSERT INTO `hospital room` VALUES (1,'ynuh',1,'일반병실',0),(2,'ynuh',2,'일반병실',0),(3,'ynuh',3,'일반병실',0),(4,'ynuh',4,'일반병실',1),(5,'ynuh',5,'일반병실',0),(6,'ynuh',1,'중환자실',0),(7,'ynuh',2,'중환자실',0),(8,'ynuh',3,'중환자실',0),(9,'ynuh',4,'중환자실',0),(10,'ynuh',5,'중환자실',0),(11,'kbuh',1,'일반병실',0),(12,'kbuh',2,'일반병실',0),(13,'kbuh',3,'일반병실',0),(14,'kbuh',4,'일반병실',1),(15,'kbuh',5,'일반병실',0),(16,'kbuh',1,'중환자실',0),(17,'kbuh',2,'중환자실',0),(18,'kbuh',3,'중환자실',0),(19,'kbuh',4,'중환자실',0),(20,'kbuh',5,'중환자실',0),(21,'dgh',1,'일반병실',0),(22,'dgh',2,'일반병실',0),(23,'dgh',3,'일반병실',0),(24,'dgh',4,'일반병실',1),(25,'dgh',5,'일반병실',0),(26,'dgh',1,'중환자실',0),(27,'dgh',2,'중환자실',0),(28,'dgh',3,'중환자실',0),(29,'dgh',4,'중환자실',0),(30,'dgh',5,'중환자실',0),(1609,'jnuh',4,'일반병실',1),(1610,'jnuh',4,'중환자실',0),(1637,'souh',4,'일반병실',1),(1638,'souh',4,'중환자실',1),(1675,'bduh',4,'일반병실',0),(1676,'bduh',4,'중환자실',0),(1697,'yih',4,'일반병실',0),(1698,'yih',4,'중환자실',0),(2174,'ihuh',4,'일반병실',0),(2175,'ihuh',4,'중환자실',0),(2813,'phh',4,'일반병실',0),(2814,'phh',4,'중환자실',1),(3193,'ujuh',4,'일반병실',1),(3194,'ujuh',4,'중환자실',0),(4427,'bsuh',4,'일반병실',1),(4428,'bsuh',4,'중환자실',0),(4813,'cwuh',4,'중환자실',0),(4814,'cwuh',4,'일반병실',0);
/*!40000 ALTER TABLE `hospital room` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 11:28:24
