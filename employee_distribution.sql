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
							 `plant_id` int(11) NOT NULL,
							 PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Short Term',1002,2),(2,'Long Term',815,2);
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
						 `type` varchar(255) NOT NULL,
						 `check_in` datetime NOT NULL,
						 `check_out` datetime NOT NULL,
						 `hours_worked` float NOT NULL,
						 `schedule` varchar(255) NOT NULL,
						 `check_out_by` varchar(255) NOT NULL,
						 `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
						 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scans`
--

LOCK TABLES `scans` WRITE;
/*!40000 ALTER TABLE `scans` DISABLE KEYS */;
INSERT INTO `scans` VALUES (87,'43044',2,'rotating','2022-09-20 13:56:13','2022-09-20 13:57:20',0.0186111,'rot1','Manual','2022-09-20 20:57:20'),(88,'111',2,'rotating','2022-09-20 14:00:43','2022-09-20 14:01:50',0.0186111,'rot1','Manual','2022-09-20 21:01:50'),(89,'111',1,'rotating','2022-09-20 14:01:50','2022-09-20 18:00:00',3.96944,'rot1','System','2022-09-20 21:01:50'),(90,'222',2,'regular','2022-09-20 14:31:42','2022-09-20 14:33:13',0.0252778,'reg1','Manual','2022-09-20 21:33:13'),(91,'222',1,'regular','2022-09-20 14:33:41','2022-09-20 14:34:19',0.0105556,'reg1','Manual','2022-09-20 21:34:19'),(92,'222',2,'regular','2022-09-20 14:34:19','2022-09-20 15:36:00',1.02806,'reg1','System','2022-09-20 21:34:19');
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
