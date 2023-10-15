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
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contract` (
  `contract num` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantity` int NOT NULL,
  `unit price` decimal(4,2) NOT NULL,
  `supplies` varchar(15) NOT NULL,
  `due date` date NOT NULL,
  PRIMARY KEY (`contract num`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contract`
--

LOCK TABLES `contract` WRITE;
/*!40000 ALTER TABLE `contract` DISABLE KEYS */;
INSERT INTO `contract` VALUES (1,'2021-11-02',2000000,2.50,'화이자','2021-12-18'),(2,'2021-11-03',100000000,3.50,'화이자','2021-12-16'),(3,'2021-11-02',200000000,2.50,'모더나','2021-12-10'),(4,'2021-11-01',200000000,4.50,'모더나','2021-12-07'),(5,'2021-11-02',100000000,4.50,'모더나','2021-12-19'),(6,'2021-11-01',100000000,3.50,'화이자','2021-12-07'),(7,'2021-11-03',200000000,4.50,'화이자','2021-12-10'),(8,'2021-11-01',200000000,2.50,'모더나','2021-12-19'),(9,'2021-11-01',200000000,4.50,'모더나','2021-12-14'),(10,'2021-11-02',1000000,4.50,'화이자','2021-12-15'),(11,'2021-11-01',100000000,2.50,'모더나','2021-12-09'),(12,'2021-11-02',200000000,3.50,'모더나','2021-12-16'),(13,'2021-11-03',1000000,2.50,'화이자','2021-12-18'),(14,'2021-11-03',1000000,2.50,'모더나','2021-12-08'),(15,'2021-11-03',1000000,4.50,'화이자','2021-12-07'),(16,'2021-11-03',200000000,4.50,'모더나','2021-12-09'),(17,'2021-11-02',2000000,3.50,'화이자','2021-12-10'),(18,'2021-11-02',200000000,3.50,'화이자','2021-12-12'),(19,'2021-11-03',200000000,3.50,'모더나','2021-12-10'),(20,'2021-11-01',1000000,4.50,'화이자','2021-12-17'),(21,'2021-11-01',200000000,2.50,'화이자','2021-12-07'),(22,'2021-11-03',1000000,3.50,'모더나','2021-12-08'),(23,'2021-11-01',1000000,3.50,'화이자','2021-12-07'),(24,'2021-11-02',1000000,4.50,'모더나','2021-12-19'),(25,'2021-11-02',2000000,4.50,'모더나','2021-12-12'),(26,'2021-11-03',100000000,2.50,'화이자','2021-12-17'),(27,'2021-11-01',2000000,3.50,'모더나','2021-12-09'),(28,'2021-11-03',200000000,4.50,'모더나','2021-12-08'),(29,'2021-11-01',1000000,2.50,'모더나','2021-12-16'),(30,'2021-11-03',200000000,4.50,'모더나','2021-12-15'),(31,'2021-11-02',200000000,4.50,'화이자','2021-12-14'),(32,'2021-11-01',100000000,3.50,'화이자','2021-12-09'),(33,'2021-11-01',2000000,3.50,'화이자','2021-12-08'),(34,'2021-11-02',100000000,4.50,'모더나','2021-12-12'),(35,'2021-11-03',2000000,3.50,'화이자','2021-12-12'),(36,'2021-11-01',1000000,2.50,'모더나','2021-12-18'),(37,'2021-11-01',1000000,2.50,'모더나','2021-12-09'),(38,'2021-11-03',200000000,2.50,'모더나','2021-12-13'),(39,'2021-11-03',100000000,2.50,'화이자','2021-12-13'),(40,'2021-11-03',1000000,4.50,'모더나','2021-12-09'),(41,'2021-11-02',2000000,3.50,'모더나','2021-12-12'),(42,'2021-11-01',100000000,4.50,'모더나','2021-12-07'),(43,'2021-11-01',2000000,2.50,'화이자','2021-12-08'),(44,'2021-11-02',100000000,4.50,'모더나','2021-12-16'),(45,'2021-11-02',2000000,4.50,'화이자','2021-12-12'),(46,'2021-11-01',200000000,3.50,'모더나','2021-12-07'),(47,'2021-11-02',2000000,3.50,'모더나','2021-12-16'),(48,'2021-11-01',100000000,3.50,'모더나','2021-12-16'),(49,'2021-11-03',100000000,2.50,'화이자','2021-12-12'),(50,'2021-11-01',2000000,3.50,'화이자','2021-12-15'),(51,'2021-11-01',1000000,3.50,'화이자','2021-12-18'),(52,'2021-11-03',2000000,3.50,'화이자','2021-12-17'),(53,'2021-11-02',2000000,2.50,'모더나','2021-12-18'),(54,'2021-11-03',1000000,3.50,'화이자','2021-12-19'),(55,'2021-11-03',2000000,4.50,'화이자','2021-12-13'),(56,'2021-11-01',200000000,4.50,'모더나','2021-12-15'),(57,'2021-11-02',2000000,4.50,'화이자','2021-12-16'),(58,'2021-11-03',1000000,2.50,'모더나','2021-12-18'),(59,'2021-11-01',100000000,2.50,'모더나','2021-12-11'),(60,'2021-11-01',100000000,3.50,'모더나','2021-12-19'),(61,'2021-11-01',200000000,2.50,'모더나','2021-12-09'),(62,'2021-11-01',2000000,4.50,'모더나','2021-12-17'),(63,'2021-11-03',2000000,4.50,'화이자','2021-12-09'),(64,'2021-11-01',1000000,2.50,'모더나','2021-12-08'),(65,'2021-11-03',200000000,3.50,'모더나','2021-12-11'),(66,'2021-11-01',100000000,4.50,'화이자','2021-12-09'),(67,'2021-11-03',1000000,2.50,'모더나','2021-12-12'),(68,'2021-11-02',1000000,2.50,'모더나','2021-12-14'),(69,'2021-11-02',2000000,2.50,'모더나','2021-12-10'),(70,'2021-11-01',2000000,4.50,'화이자','2021-12-19'),(71,'2021-11-02',1000000,2.50,'모더나','2021-12-15'),(72,'2021-11-02',2000000,2.50,'모더나','2021-12-17'),(73,'2021-11-02',200000000,4.50,'화이자','2021-12-12'),(74,'2021-11-02',200000000,2.50,'화이자','2021-12-14'),(75,'2021-11-02',1000000,3.50,'모더나','2021-12-07'),(76,'2021-11-03',200000000,4.50,'화이자','2021-12-09'),(77,'2021-11-01',100000000,4.50,'화이자','2021-12-15'),(78,'2021-11-03',200000000,4.50,'모더나','2021-12-08'),(79,'2021-11-03',100000000,2.50,'화이자','2021-12-14'),(80,'2021-11-01',2000000,3.50,'모더나','2021-12-10'),(81,'2021-11-02',200000000,4.50,'모더나','2021-12-12'),(82,'2021-11-03',1000000,3.50,'화이자','2021-12-19'),(83,'2021-11-02',2000000,4.50,'화이자','2021-12-09'),(84,'2021-11-02',2000000,3.50,'화이자','2021-12-14'),(85,'2021-11-02',200000000,3.50,'화이자','2021-12-16'),(86,'2021-11-02',100000000,2.50,'모더나','2021-12-08'),(87,'2021-11-03',100000000,4.50,'화이자','2021-12-18'),(88,'2021-11-02',100000000,2.50,'화이자','2021-12-11'),(89,'2021-11-02',2000000,3.50,'모더나','2021-12-19'),(90,'2021-11-03',2000000,3.50,'모더나','2021-12-10'),(91,'2021-11-03',2000000,3.50,'모더나','2021-12-16'),(92,'2021-11-02',1000000,2.50,'모더나','2021-12-14'),(93,'2021-11-02',1000000,2.50,'화이자','2021-12-18'),(94,'2021-11-02',2000000,3.50,'화이자','2021-12-11'),(95,'2021-11-01',2000000,4.50,'화이자','2021-12-17'),(96,'2021-11-01',200000000,4.50,'화이자','2021-12-18'),(97,'2021-11-03',1000000,4.50,'화이자','2021-12-17'),(98,'2021-11-01',200000000,2.50,'모더나','2021-12-07'),(99,'2021-11-02',200000000,3.50,'모더나','2021-12-17'),(100,'2021-11-03',1000000,4.50,'화이자','2021-12-13'),(101,'2021-11-29',123123,2.50,'모더나','2021-12-11'),(102,'2021-11-03',12344,2.50,'모더나','2021-12-11'),(103,'2021-11-10',123123,2.50,'화이자','2021-12-10');
/*!40000 ALTER TABLE `contract` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 11:28:26