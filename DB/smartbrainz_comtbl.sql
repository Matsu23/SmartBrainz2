CREATE DATABASE  IF NOT EXISTS `smartbrainz` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `smartbrainz`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: smartbrainz
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `comtbl`
--

DROP TABLE IF EXISTS `comtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comtbl` (
  `idCom` int NOT NULL AUTO_INCREMENT,
  `idPost` int DEFAULT NULL,
  `idUser` int NOT NULL,
  `contentCom` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `idTopCom` int DEFAULT NULL,
  PRIMARY KEY (`idCom`),
  KEY `post-tbl_idx` (`idPost`),
  KEY `user-com_idx` (`idUser`),
  KEY `com-com_idx` (`idTopCom`),
  CONSTRAINT `com-com` FOREIGN KEY (`idTopCom`) REFERENCES `comtbl` (`idCom`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post-com` FOREIGN KEY (`idPost`) REFERENCES `posttbl` (`idPost`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user-com` FOREIGN KEY (`idUser`) REFERENCES `usertbl` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comtbl`
--

LOCK TABLES `comtbl` WRITE;
/*!40000 ALTER TABLE `comtbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `comtbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-12 16:56:06
