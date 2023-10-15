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
-- Table structure for table `information on routes`
--

DROP TABLE IF EXISTS `information on routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `information on routes` (
  `route num` int NOT NULL AUTO_INCREMENT,
  `confirmed case num` int NOT NULL,
  `location` varchar(45) NOT NULL,
  `exposed time` datetime NOT NULL,
  PRIMARY KEY (`route num`),
  KEY `confirmed case num_idx` (`confirmed case num`),
  CONSTRAINT `confirmed case num` FOREIGN KEY (`confirmed case num`) REFERENCES `confirmed case` (`confirmed num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information on routes`
--

LOCK TABLES `information on routes` WRITE;
/*!40000 ALTER TABLE `information on routes` DISABLE KEYS */;
INSERT INTO `information on routes` VALUES (1,14,'대구 국채보상운동기념공원','2021-10-20 13:24:00'),(2,2,'부산 과학체험관','2021-08-14 11:12:00'),(3,6,'부산 송정떡갈비골목','2021-01-15 12:24:00'),(4,9,'인천 쌍문각갈비탕','2020-10-05 20:23:00'),(5,5,'부산 송도구름산책로','2021-09-13 17:46:00'),(6,12,'대구 국채보상운동기념공원','2021-10-20 15:54:00'),(8,18,'울산 스파크랜드','2020-09-22 13:41:00'),(9,4,'창원 유성온천지구','2021-04-12 06:12:00'),(10,10,'용인 소죽도공원','2021-07-02 17:27:00'),(11,11,'대구 국채보상운동기념공원','2021-10-20 21:17:00'),(12,3,'청주 수지외식타운','2021-11-14 19:54:00'),(13,13,'부산 송도구름산책로','2021-09-13 15:42:00'),(14,1,'전주 고현2리회관','2021-05-25 12:42:00'),(15,7,'안양 퍼펙토리소극장','2020-12-12 17:36:00'),(16,20,'성남 시청공원배드민턴장','2021-01-03 10:14:00'),(17,17,'인천 버거킹','2021-07-31 11:59:00'),(19,19,'안산 갈산동상가','2021-05-22 14:41:00'),(20,16,'포항 우이성당','2021-02-24 08:45:00');
/*!40000 ALTER TABLE `information on routes` ENABLE KEYS */;
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
