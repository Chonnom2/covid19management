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
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital` (
  `hospital name` varchar(15) NOT NULL,
  `hospital code` varchar(15) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`hospital code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES ('아주대병원','ajuh','수원 영통구 원천동','1688-6114'),('안산병원','asuh','안산 단원구 적금로','1577-7516'),('분당서울대병원','bduh','성남 분당구 구미로','1588-3369'),('부산대병원','bsuh','부산 서구 아미동','051-240-7000'),('충북대병원','cbuh','청주 서원구 1순환로','043-269-6602'),('창원경산국립대병원','cwuh','창원 성산구 성주동','055-214-1000'),('대구병원','dgh','대구 북구 태전동','1433-5324'),('단국대병원','dkuh','천안 동남구 망향로','1588-0063'),('한림대병원','hruh','안양 동안구 관평로','031-380-1500'),('인하대병원','ihuh','인천 중구 신흥동','032-890-2114'),('전북대병원','jbuh','전주 덕진구 금암2동','1577-7877'),('전남대병원','jnuh','광주 동구 학동','062-220-5011'),('경북대병원','kbuh','대구 중구 삼덕동','1666-5114'),('포항성모병원','phh','포항 대잠동 대잠동길','054-272-0151'),('서울대병원','souh','서울 종로구 대학로','1588-5700'),('을지대병원','ujuh','대전 서구 둔산동','1899-0001'),('울산대병원','usuh','울산 동구 전하1동','052-250-7000'),('용인세브란스병원','yih','용인 기흥구 중동','031-331-8888'),('영남대병원','ynuh','대구 남구 대명동','1522-3114');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 11:28:25
