-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: gbalg
-- ------------------------------------------------------
-- Server version	5.5.23-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Каталог'),(2,'Одежда'),(3,'Продукты'),(4,'Обувь'),(5,'Купальники'),(6,'Кофе'),(7,'Мука'),(8,'Компьютеры'),(9,'Сланцы'),(10,'Тапочки');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_links`
--

DROP TABLE IF EXISTS `category_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_links` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_links`
--

LOCK TABLES `category_links` WRITE;
/*!40000 ALTER TABLE `category_links` DISABLE KEYS */;
INSERT INTO `category_links` VALUES (1,1,0),(1,2,1),(1,3,1),(1,4,2),(1,5,2),(1,6,2),(1,7,2),(1,8,1),(1,9,3),(1,10,3),(2,2,1),(2,4,2),(2,5,2),(2,9,3),(2,10,3),(3,3,1),(3,6,2),(3,7,2),(4,4,2),(4,9,3),(4,10,3),(5,5,2),(6,6,2),(7,7,2),(8,8,1),(9,9,3),(10,10,3);
/*!40000 ALTER TABLE `category_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nested_sets`
--

DROP TABLE IF EXISTS `nested_sets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nested_sets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `left_UNIQUE` (`left`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nested_sets`
--

LOCK TABLES `nested_sets` WRITE;
/*!40000 ALTER TABLE `nested_sets` DISABLE KEYS */;
INSERT INTO `nested_sets` VALUES (1,'Каталог',1,20,1),(2,'Одежда',2,11,2),(3,'Продукты',12,17,2),(4,'Обувь',3,8,3),(5,'Купальники',9,10,3),(6,'Кофе',13,14,3),(7,'Мука',15,16,3),(8,'Компьютеры',18,19,2),(9,'Сланцы',4,5,4),(10,'Тапочки',6,7,4);
/*!40000 ALTER TABLE `nested_sets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-11 14:52:29
