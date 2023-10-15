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
-- Temporary view structure for view `pfizer_plan`
--

DROP TABLE IF EXISTS `pfizer_plan`;
/*!50001 DROP VIEW IF EXISTS `pfizer_plan`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_plan` AS SELECT 
 1 AS `plan num`,
 1 AS `contract_num`,
 1 AS `start date`,
 1 AS `finish date`,
 1 AS `quantity`,
 1 AS `plant_code`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_contract_count`
--

DROP TABLE IF EXISTS `pfizer_contract_count`;
/*!50001 DROP VIEW IF EXISTS `pfizer_contract_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_contract_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_inventory_count`
--

DROP TABLE IF EXISTS `pfizer_inventory_count`;
/*!50001 DROP VIEW IF EXISTS `pfizer_inventory_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_inventory_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_contract_count`
--

DROP TABLE IF EXISTS `moderna_contract_count`;
/*!50001 DROP VIEW IF EXISTS `moderna_contract_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_contract_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_inventory_count`
--

DROP TABLE IF EXISTS `moderna_inventory_count`;
/*!50001 DROP VIEW IF EXISTS `moderna_inventory_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_inventory_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_plan_count`
--

DROP TABLE IF EXISTS `moderna_plan_count`;
/*!50001 DROP VIEW IF EXISTS `moderna_plan_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_plan_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_inventory`
--

DROP TABLE IF EXISTS `pfizer_inventory`;
/*!50001 DROP VIEW IF EXISTS `pfizer_inventory`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_inventory` AS SELECT 
 1 AS `inventory_num`,
 1 AS `lot number`,
 1 AS `warehouse_code`,
 1 AS `quantity`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `warehouse_count`
--

DROP TABLE IF EXISTS `warehouse_count`;
/*!50001 DROP VIEW IF EXISTS `warehouse_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `warehouse_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `warehouse_load`
--

DROP TABLE IF EXISTS `warehouse_load`;
/*!50001 DROP VIEW IF EXISTS `warehouse_load`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `warehouse_load` AS SELECT 
 1 AS `warehouse code`,
 1 AS `load quantity`,
 1 AS `capacity`,
 1 AS `load percentage`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_plan`
--

DROP TABLE IF EXISTS `moderna_plan`;
/*!50001 DROP VIEW IF EXISTS `moderna_plan`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_plan` AS SELECT 
 1 AS `plan num`,
 1 AS `contract_num`,
 1 AS `start date`,
 1 AS `finish date`,
 1 AS `quantity`,
 1 AS `plant_code`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_plan_count`
--

DROP TABLE IF EXISTS `pfizer_plan_count`;
/*!50001 DROP VIEW IF EXISTS `pfizer_plan_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_plan_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_inventory`
--

DROP TABLE IF EXISTS `moderna_inventory`;
/*!50001 DROP VIEW IF EXISTS `moderna_inventory`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_inventory` AS SELECT 
 1 AS `inventory_num`,
 1 AS `lot number`,
 1 AS `warehouse_code`,
 1 AS `quantity`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_plant_count`
--

DROP TABLE IF EXISTS `moderna_plant_count`;
/*!50001 DROP VIEW IF EXISTS `moderna_plant_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_plant_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `moderna_prod`
--

DROP TABLE IF EXISTS `moderna_prod`;
/*!50001 DROP VIEW IF EXISTS `moderna_prod`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `moderna_prod` AS SELECT 
 1 AS `plan num`,
 1 AS `contract_num`,
 1 AS `start date`,
 1 AS `finish date`,
 1 AS `quantity`,
 1 AS `plant_code`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_prod`
--

DROP TABLE IF EXISTS `pfizer_prod`;
/*!50001 DROP VIEW IF EXISTS `pfizer_prod`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_prod` AS SELECT 
 1 AS `plan num`,
 1 AS `contract_num`,
 1 AS `start date`,
 1 AS `finish date`,
 1 AS `quantity`,
 1 AS `plant_code`,
 1 AS `company`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pfizer_plant_count`
--

DROP TABLE IF EXISTS `pfizer_plant_count`;
/*!50001 DROP VIEW IF EXISTS `pfizer_plant_count`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pfizer_plant_count` AS SELECT 
 1 AS `COUNT(*)`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `pfizer_plan`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_plan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_plan` AS select `plan`.`plan num` AS `plan num`,`plan`.`contract_num` AS `contract_num`,`plan`.`start date` AS `start date`,`plan`.`finish date` AS `finish date`,`plan`.`quantity` AS `quantity`,`plan`.`plant_code` AS `plant_code`,`plant`.`company` AS `company` from (`production plan` `plan` join `plant` on((`plan`.`plant_code` = `plant`.`plant code`))) where (`plant`.`company` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_contract_count`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_contract_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_contract_count` AS select count(0) AS `COUNT(*)` from `contract` where (`contract`.`supplies` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_inventory_count`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_inventory_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_inventory_count` AS select count(0) AS `COUNT(*)` from (select `inv`.`inventory_num` AS `inventory_num`,`inv`.`lot number` AS `lot number`,`inv`.`warehouse_code` AS `warehouse_code`,`inv`.`quantity` AS `quantity`,`vi`.`company` AS `company` from (`inventory` `inv` join `vaccine information` `vi` on((`inv`.`lot number` = `vi`.`lot num`)))) `pfizer` where (`pfizer`.`company` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_contract_count`
--

/*!50001 DROP VIEW IF EXISTS `moderna_contract_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_contract_count` AS select count(0) AS `COUNT(*)` from `contract` where (`contract`.`supplies` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_inventory_count`
--

/*!50001 DROP VIEW IF EXISTS `moderna_inventory_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_inventory_count` AS select count(0) AS `COUNT(*)` from (select `inv`.`inventory_num` AS `inventory_num`,`inv`.`lot number` AS `lot number`,`inv`.`warehouse_code` AS `warehouse_code`,`inv`.`quantity` AS `quantity`,`vi`.`company` AS `company` from (`inventory` `inv` join `vaccine information` `vi` on((`inv`.`lot number` = `vi`.`lot num`)))) `moderna` where (`moderna`.`company` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_plan_count`
--

/*!50001 DROP VIEW IF EXISTS `moderna_plan_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_plan_count` AS select count(0) AS `COUNT(*)` from (select `plan`.`plan num` AS `plan num`,`plan`.`contract_num` AS `contract_num`,`plan`.`start date` AS `start date`,`plan`.`finish date` AS `finish date`,`plan`.`quantity` AS `quantity`,`plan`.`plant_code` AS `plant_code`,`plant`.`company` AS `company` from (`production plan` `plan` join `plant` on((`plan`.`plant_code` = `plant`.`plant code`)))) `m` where (`m`.`company` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_inventory`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_inventory`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_inventory` AS select `inv`.`inventory_num` AS `inventory_num`,`inv`.`lot number` AS `lot number`,`inv`.`warehouse_code` AS `warehouse_code`,`inv`.`quantity` AS `quantity`,`vi`.`company` AS `company` from (`inventory` `inv` join `vaccine information` `vi` on((`inv`.`lot number` = `vi`.`lot num`))) where (`vi`.`company` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `warehouse_count`
--

/*!50001 DROP VIEW IF EXISTS `warehouse_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `warehouse_count` AS select count(0) AS `COUNT(*)` from `warehouse` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `warehouse_load`
--

/*!50001 DROP VIEW IF EXISTS `warehouse_load`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `warehouse_load` AS select `warehouse`.`warehouse code` AS `warehouse code`,sum(`inv`.`quantity`) AS `load quantity`,`warehouse`.`capacity` AS `capacity`,((sum(`inv`.`quantity`) / `warehouse`.`capacity`) * 100) AS `load percentage` from (`inventory` `inv` join `warehouse` on((`inv`.`warehouse_code` = `warehouse`.`warehouse code`))) group by `warehouse`.`warehouse code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_plan`
--

/*!50001 DROP VIEW IF EXISTS `moderna_plan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_plan` AS select `plan`.`plan num` AS `plan num`,`plan`.`contract_num` AS `contract_num`,`plan`.`start date` AS `start date`,`plan`.`finish date` AS `finish date`,`plan`.`quantity` AS `quantity`,`plan`.`plant_code` AS `plant_code`,`plant`.`company` AS `company` from (`production plan` `plan` join `plant` on((`plan`.`plant_code` = `plant`.`plant code`))) where (`plant`.`company` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_plan_count`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_plan_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_plan_count` AS select count(0) AS `COUNT(*)` from (select `plan`.`plan num` AS `plan num`,`plan`.`contract_num` AS `contract_num`,`plan`.`start date` AS `start date`,`plan`.`finish date` AS `finish date`,`plan`.`quantity` AS `quantity`,`plan`.`plant_code` AS `plant_code`,`plant`.`company` AS `company` from (`production plan` `plan` join `plant` on((`plan`.`plant_code` = `plant`.`plant code`)))) `m` where (`m`.`company` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_inventory`
--

/*!50001 DROP VIEW IF EXISTS `moderna_inventory`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_inventory` AS select `inv`.`inventory_num` AS `inventory_num`,`inv`.`lot number` AS `lot number`,`inv`.`warehouse_code` AS `warehouse_code`,`inv`.`quantity` AS `quantity`,`vi`.`company` AS `company` from (`inventory` `inv` join `vaccine information` `vi` on((`inv`.`lot number` = `vi`.`lot num`))) where (`vi`.`company` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_plant_count`
--

/*!50001 DROP VIEW IF EXISTS `moderna_plant_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_plant_count` AS select count(0) AS `COUNT(*)` from `plant` where (`plant`.`company` = '모더나') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `moderna_prod`
--

/*!50001 DROP VIEW IF EXISTS `moderna_prod`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `moderna_prod` AS select `moderna_plan`.`plan num` AS `plan num`,`moderna_plan`.`contract_num` AS `contract_num`,`moderna_plan`.`start date` AS `start date`,`moderna_plan`.`finish date` AS `finish date`,`moderna_plan`.`quantity` AS `quantity`,`moderna_plan`.`plant_code` AS `plant_code`,`moderna_plan`.`company` AS `company` from `moderna_plan` where (`moderna_plan`.`finish date` is null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_prod`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_prod`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_prod` AS select `pfizer_plan`.`plan num` AS `plan num`,`pfizer_plan`.`contract_num` AS `contract_num`,`pfizer_plan`.`start date` AS `start date`,`pfizer_plan`.`finish date` AS `finish date`,`pfizer_plan`.`quantity` AS `quantity`,`pfizer_plan`.`plant_code` AS `plant_code`,`pfizer_plan`.`company` AS `company` from `pfizer_plan` where (`pfizer_plan`.`finish date` is null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pfizer_plant_count`
--

/*!50001 DROP VIEW IF EXISTS `pfizer_plant_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pfizer_plant_count` AS select count(0) AS `COUNT(*)` from `plant` where (`plant`.`company` = '화이자') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 11:28:27
