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
-- Table structure for table `hospital inventory`
--

DROP TABLE IF EXISTS `hospital inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital inventory` (
  `hos_inventory num` int NOT NULL AUTO_INCREMENT,
  `lot_num` varchar(45) NOT NULL,
  `hospital__code` varchar(45) NOT NULL,
  `warehouse__code` varchar(15) NOT NULL,
  `receiving date` date NOT NULL,
  `quantity` varchar(45) NOT NULL,
  PRIMARY KEY (`hos_inventory num`),
  KEY `hospital__code_idx` (`hospital__code`),
  KEY `lot_num_idx` (`lot_num`),
  KEY `warehouse code_idx` (`warehouse__code`),
  CONSTRAINT `hospital_code_ivt` FOREIGN KEY (`hospital__code`) REFERENCES `hospital` (`hospital code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lot num_ivt` FOREIGN KEY (`lot_num`) REFERENCES `vaccine information` (`lot num`),
  CONSTRAINT `warehouse_code_ivt` FOREIGN KEY (`warehouse__code`) REFERENCES `warehouse` (`warehouse code`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital inventory`
--

LOCK TABLES `hospital inventory` WRITE;
/*!40000 ALTER TABLE `hospital inventory` DISABLE KEYS */;
INSERT INTO `hospital inventory` VALUES (1,'754J15G','kbuh','DG-124','2021-11-20','50'),(2,'894S83Y','dkuh','CA-684','2021-11-20','1'),(3,'919Y06X','dgh','DG-124','2021-11-20','41'),(4,'968X86T','bsuh','BS-102','2021-11-20','3'),(5,'613E10Y','bduh','SN-973','2021-11-20','54'),(6,'806R83J','souh','SO-253','2021-11-20','30'),(7,'454F17J','ajuh','SW-489','2021-11-20','10'),(8,'598U62T','asuh','AS-295','2021-11-20','5'),(9,'812F18D','ynuh','DG-124','2021-11-20','24'),(10,'341Y63U','yih','YI-235','2021-11-20','12'),(11,'038D26J','usuh','US-470','2021-11-20','4'),(12,'508W13J','ujuh','DJ-634','2021-11-20','8'),(13,'918E75A','ihuh','IC-976','2021-11-20','16'),(14,'779U86Z','jnuh','GJ-213','2021-11-20','8'),(15,'248P58N','jbuh','JJ-890','2021-11-20','2'),(16,'163B21E','cwuh','CW-678','2021-11-20','5'),(17,'558P04B','cbuh','CJ-457','2021-11-20','3'),(18,'522J63Q','phh','PH-642','2021-11-20','6'),(19,'200D73N','hruh','AY-281','2021-11-20','32');
/*!40000 ALTER TABLE `hospital inventory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 11:28:23
