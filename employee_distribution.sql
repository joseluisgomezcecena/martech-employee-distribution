-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: employee_distribution
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
							 `location_id` int(11) NOT NULL AUTO_INCREMENT,
							 `location_name` varchar(255) NOT NULL,
							 `planner_id` int(11) NOT NULL,
							 PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Short Term',1002),(2,'Long Term',815);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scans`
--

DROP TABLE IF EXISTS `scans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scans` (
						 `id` int(11) NOT NULL AUTO_INCREMENT,
						 `emp_number` varchar(255) NOT NULL,
						 `location` int(11) NOT NULL,
						 `created_at` datetime NOT NULL,
						 `type` int(1) NOT NULL,
						 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scans`
--

LOCK TABLES `scans` WRITE;
/*!40000 ALTER TABLE `scans` DISABLE KEYS */;
INSERT INTO `scans` VALUES (1,'146565',1,'2022-08-22 14:57:53',0),(2,'146565146565',1,'2022-08-22 14:57:53',0),(3,'146565',2,'2022-08-22 15:29:19',1),(4,'146565',2,'2022-08-22 15:29:43',2),(5,'146565146565',2,'2022-08-22 15:29:44',1),(6,'146565',2,'2022-08-22 15:42:27',3),(7,'146565146565',2,'2022-08-22 15:42:27',2),(8,'146565',2,'2022-08-22 15:54:05',4),(9,'146565',2,'2022-08-22 15:54:05',5),(10,'146565',2,'2022-08-22 17:07:44',6),(11,'146565146565',2,'2022-08-22 17:07:44',3),(12,'146565146565146565',2,'2022-08-22 17:07:45',1),(13,'46565146565',2,'2022-08-22 17:07:45',1),(14,'46565',2,'2022-08-22 17:07:45',1),(15,'46565146565146565',2,'2022-08-22 17:07:45',1),(16,'46565146565146565146565',2,'2022-08-22 17:07:45',1),(17,'ID100',2,'2022-08-23 13:50:29',1),(18,'%SET',2,'2022-08-23 13:51:10',1),(19,'%SET',2,'2022-08-23 13:51:10',2),(20,'143044',2,'2022-08-23 13:52:06',1),(21,'4',2,'2022-08-23 13:52:06',1),(22,'4143044',2,'2022-08-23 13:52:06',1),(23,'143044',2,'2022-08-23 13:53:49',2),(24,'143044',2,'2022-08-23 13:55:08',3),(25,'143044',2,'2022-08-23 13:56:14',4),(26,'143044143044',2,'2022-08-23 13:56:15',1),(27,'143044',2,'2022-08-23 13:59:21',5),(28,'44',2,'2022-08-23 13:59:22',1),(29,'143044143044',2,'2022-08-23 13:59:22',2),(30,'143044',2,'2022-08-23 14:00:15',6),(31,'143044143044',2,'2022-08-23 14:00:19',3),(32,'143044',2,'2022-08-23 14:02:17',7),(33,'143044143044',2,'2022-08-23 14:02:17',4),(34,'44',2,'2022-08-23 14:02:45',2),(35,'44143044',2,'2022-08-23 14:02:45',1),(36,'44143044143044',2,'2022-08-23 14:02:45',1),(37,'143865',2,'2022-08-23 14:04:42',1),(38,'143044',2,'2022-08-23 14:07:17',8),(39,'143044143044',2,'2022-08-23 14:07:17',5),(40,'143044143044143044',2,'2022-08-23 14:07:18',1),(41,'143044',1,'2022-08-23 14:19:41',9),(42,'143044143044',1,'2022-08-23 14:19:41',6),(43,'143044143044143044',1,'2022-08-23 14:19:41',2),(44,'143044',1,'2022-08-23 14:23:32',10),(45,'143044143044',1,'2022-08-23 14:23:33',7),(46,'143044',1,'2022-08-23 14:24:38',11),(47,'143044143044',1,'2022-08-23 14:24:39',8);
/*!40000 ALTER TABLE `scans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
						 `user_id` int(11) NOT NULL AUTO_INCREMENT,
						 `user_name` varchar(255) NOT NULL,
						 `user_department_id` int(11) NOT NULL,
						 `user_martech_number` int(11) NOT NULL,
						 `email` varchar(255) NOT NULL,
						 `password` varchar(255) NOT NULL,
						 `level` int(1) NOT NULL DEFAULT 0,
						 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jgomez',4,43044,'jgomez@martechmedical.com','$2y$10$1PzU6FeixARZ0ixR1R7SqeO5NjfaIa.ENqaKgBqAulXu4k0L2iXoy',2),(2,'Ingenieria',3,1,'ingenieria@mail.com','$2y$10$zDkYm0CjwoI3.v2PHUQVp.0viLB5CsVihOuDr5yKpbyvI.IpQVMtC',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-23 14:33:31
