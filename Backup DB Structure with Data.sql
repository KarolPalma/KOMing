-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_koming
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `Id_Registro` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Detalle` text,
  PRIMARY KEY (`Id_Registro`),
  KEY `FK_Id_Usuario_idx` (`Id_Usuario`),
  CONSTRAINT `FK_Id_Usuario_Bitacora` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (215,'kpalma','2023-02-17','03:56:47','Inserción de nueva tarifa de Boletos: 20: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá., con valor de: 70.00'),(216,'kpalma','2023-02-17','03:58:42','Actualización de tarifa de boleto 19: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá., con nuevo valor de: 80.00'),(217,'kpalma','2023-02-17','04:03:52','Actualización de tarifa de boleto 1: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José'),(218,'kpalma','2023-02-17','04:21:52','Inserción de nueva tarifa de Boletos: 22: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Nicaragua, Terminal Managua., con valor de: 50.00'),(219,'kpalma','2023-02-17','04:22:50','Inserción de nueva tarifa de Boletos: 24: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador., con valor de: 50.00'),(220,'kpalma','2023-02-17','04:23:22','Inserción de nueva tarifa de Boletos: 26: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Guatemala, Terminal Ciudad de Guatemala., con valor de: 50.00'),(221,'kpalma','2023-02-17','04:23:53','Inserción de nueva tarifa de Boletos: 28: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Mexico, Terminal Tapachula., con valor de: 50.00'),(222,'kpalma','2023-02-17','04:26:58','Inserción de nueva tarifa de Encomiendas: 26: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá., con valor de: 50.00'),(223,'kpalma','2023-02-17','04:38:27','Inserción de nueva tarifa de Encomiendas: 28: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Panamá, Terminal Tapachula., con valor de: 50.00'),(224,'kpalma','2023-02-17','04:47:07','Actualización de bus ID AED-1234'),(225,'kpalma','2023-02-17','04:49:29','Inserción de nuevo viaje ID 10 en bus: AED-1234'),(226,'kpalma','2023-02-17','04:52:50','Venta de boleto ID 32 en viaje: 10'),(227,'kpalma','2023-02-17','04:57:47','Inserción de nuevo viaje ID 11 en bus: AED-1234'),(228,'kpalma','2023-02-17','05:00:41','Inserción de nuevo viaje ID 12 en bus: AED-1234'),(229,'kpalma','2023-02-17','05:04:12','Inserción de nuevo viaje ID 13 en bus: AED-1234'),(230,'kpalma','2023-02-17','05:09:49','Venta de boleto ID 33 en viaje: 11'),(231,'kpalma','2023-02-21','09:18:20','Venta de boleto ID 34 en viaje: 12'),(232,'kpalma','2023-02-21','10:19:05','Inserción de nuevo viaje ID 14 en bus: AED-1234'),(233,'kpalma','2023-02-21','11:12:59','Venta de boleto ID 35 en viaje: 10'),(234,'kpalma','2023-02-21','11:28:08','Venta de boleto ID 36 en viaje: 12'),(235,'kpalma','2023-02-21','14:25:38','Actualización de bus ID AED-1234'),(236,'kpalma','2023-02-21','14:25:51','Actualización de bus ID AED-1234'),(237,'kpalma','2023-02-21','14:25:59','Actualización de bus ID BC0-3132'),(238,'kpalma','2023-02-21','14:51:16','Desactivación de bus ID BC0-3132'),(239,'kpalma','2023-02-21','14:51:26','Actualización de bus ID BC0-3132'),(240,'kpalma','2023-02-21','15:37:08','Desactivación de bus ID BC0-3132'),(241,'kpalma','2023-02-21','15:41:30','Actualización de bus ID BC0-3132'),(242,'kpalma','2023-02-24','21:56:11','Venta de boleto ID 37 en viaje: 12'),(243,'kpalma','2023-03-01','14:54:47','Inserción de nuevo usuario ID mespinal para empleado ID: 0801-2000-10222'),(244,'kpalma','2023-03-01','14:57:16','Inserción de nuevo usuario ID jcarias para empleado ID: 0801-2003-10213'),(245,'jcarias','2023-03-01','19:36:13','Actualización de usuario ID kpalma'),(246,'jcarias','2023-03-01','19:37:19','Actualización de usuario ID kpalma'),(247,'jcarias','2023-03-01','19:38:36','Actualización de usuario ID mespinal'),(248,'jcarias','2023-03-01','19:40:09','Actualización de usuario ID mespinal'),(249,'jcarias','2023-03-01','19:43:42','Actualización de usuario ID kpalma'),(250,'kpalma','2023-03-01','19:45:31','Actualización de usuario ID mespinal'),(251,'kpalma','2023-03-01','19:47:05','Actualización de usuario ID jcarias'),(252,'kpalma','2023-03-01','19:51:15','Actualización de usuario ID kpalma'),(253,'kpalma','2023-03-01','19:59:45','Actualización de usuario ID jcarias'),(254,'kpalma','2023-03-01','20:01:16','Actualización de usuario ID jcarias'),(255,'kpalma','2023-03-01','20:11:09','Actualización de usuario ID mespinal'),(256,'kpalma','2023-03-01','20:16:05','Actualización de usuario ID jcarias'),(257,'kpalma','2023-03-01','20:19:50','Inserción de nuevo empleado ID 0801-2001-33928: Romeo Martin Martinez Perez'),(258,'kpalma','2023-03-01','20:20:06','Inserción de nuevo usuario ID rmartinez para empleado ID: 0801-2001-33928'),(259,'rmartinez','2023-03-01','20:29:53','Venta de encomienda ID 1 en viaje: 10'),(260,'rmartinez','2023-03-01','20:34:28','Venta de encomienda ID 2 en viaje: 10'),(261,'rmartinez','2023-03-01','20:49:01','Actualización de viaje ID 10 en bus: AED-1234'),(262,'rmartinez','2023-03-01','20:49:12','Actualización de viaje ID 11 en bus: AED-1234'),(263,'rmartinez','2023-03-01','20:49:20','Actualización de viaje ID 12 en bus: AED-1234'),(264,'jcarias','2023-03-02','10:18:12','Actualización de viaje ID 13 en bus: AED-1234'),(265,'kpalma','2023-03-03','13:28:53','Actualización de viaje ID 13 en bus: AED-1234'),(266,'kpalma','2023-03-03','13:29:53','Actualización de tarifa de encomienda 21: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador, con nuevo valor de: 60.00'),(267,'kpalma','2023-03-03','13:32:43','Venta de encomienda ID 3 en viaje: 14'),(268,'kpalma','2023-03-03','13:41:34','Encomienda ID 0 marcada como reclamada'),(269,'kpalma','2023-03-03','13:41:49','Encomienda ID 0 marcada como reclamada'),(270,'kpalma','2023-03-06','13:39:04','Actualización de viaje ID 14 en bus: AED-1234'),(271,'kpalma','2023-03-06','13:39:47','Inserción de nuevo viaje ID 15 en bus: AED-1234'),(272,'kpalma','2023-03-06','13:40:48','Inserción de nuevo viaje ID 16 en bus: BC0-3132'),(273,'kpalma','2023-03-06','13:41:09','Venta de boleto ID 38 en viaje: 15'),(274,'rmartinez','2023-03-06','15:20:04','Encomienda ID 0 marcada como reclamada'),(275,'kpalma','2023-03-06','15:36:17','Encomienda ID 1 marcada como no reclamada'),(276,'kpalma','2023-03-06','15:36:28','Encomienda ID 1 marcada como reclamada'),(277,'kpalma','2023-03-06','15:36:33','Encomienda ID 2 marcada como reclamada'),(278,'rmartinez','2023-03-06','15:36:51','Encomienda ID 3 marcada como reclamada'),(279,'kpalma','2023-03-06','19:57:45','Boleto ID 38 a sido cancelado'),(280,'kpalma','2023-03-06','19:58:25','Venta de boleto ID 39 en viaje: 15'),(281,'kpalma','2023-03-07','12:17:15','Venta de boleto ID 40 en viaje: 15'),(282,'kpalma','2023-03-07','13:19:44','Venta de boleto ID 41 en viaje: 15'),(283,'kpalma','2023-03-07','14:54:07','Venta de boleto ID 42 en viaje: 15'),(284,'kpalma','2023-03-07','14:56:27','Venta de boleto ID 43 en viaje: 16'),(285,'kpalma','2023-03-07','14:58:50','Venta de boleto ID 44 en viaje: 16'),(286,'kpalma','2023-03-07','15:14:28','Actualización del boleto ID 42'),(287,'kpalma','2023-03-07','15:17:19','Actualización del boleto ID 42'),(288,'kpalma','2023-03-07','16:17:43','Actualización del boleto ID 40'),(289,'kpalma','2023-03-07','16:30:36','Boleto ID 39 a sido cancelado'),(290,'kpalma','2023-03-07','16:43:12','Actualización del boleto ID 40'),(291,'kpalma','2023-03-07','16:43:47','Boleto ID 40 a sido cancelado'),(292,'kpalma','2023-03-08','13:29:06','Actualización de tarifa de encomienda 1: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José, con nuevo valor de: 5.00'),(293,'kpalma','2023-03-08','13:29:14','Actualización de tarifa de encomienda 3: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua, con nuevo valor de: 5.00'),(294,'kpalma','2023-03-08','13:29:30','Actualización de tarifa de encomienda 5: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con nuevo valor de: 10.00'),(295,'kpalma','2023-03-08','13:29:38','Actualización de tarifa de encomienda 5: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con nuevo valor de: 5.00'),(296,'kpalma','2023-03-08','13:29:49','Actualización de tarifa de encomienda 7: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala, con nuevo valor de: 5.00'),(297,'kpalma','2023-03-08','13:30:11','Actualización de tarifa de encomienda 9: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Mexico, Terminal Tapachula, con nuevo valor de: 5.00'),(298,'kpalma','2023-03-08','13:30:21','Actualización de tarifa de encomienda 11: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula, con nuevo valor de: 5.00'),(299,'kpalma','2023-03-08','13:30:31','Actualización de tarifa de encomienda 13: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Honduras, Terminal Tegucigalpa, con nuevo valor de: 5.00'),(300,'kpalma','2023-03-08','13:30:53','Actualización de tarifa de encomienda 15: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Panamá, Terminal Ciudad de Panamá, con nuevo valor de: 5.00'),(301,'kpalma','2023-03-08','13:31:03','Actualización de tarifa de encomienda 17: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Costa Rica, Terminal San José, con nuevo valor de: 5.00'),(302,'kpalma','2023-03-08','13:31:13','Actualización de tarifa de encomienda 19: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Nicaragua, Terminal Managua, con nuevo valor de: 5.00'),(303,'kpalma','2023-03-08','13:31:22','Actualización de tarifa de encomienda 21: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador, con nuevo valor de: 5.00'),(304,'kpalma','2023-03-08','13:31:34','Actualización de tarifa de encomienda 23: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Guatemala, Terminal Ciudad de Guatemala, con nuevo valor de: 5.00'),(305,'kpalma','2023-03-08','13:31:43','Actualización de tarifa de encomienda 25: Tarifa de Encomienda Pequeña de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá., con nuevo valor de: 5.00'),(306,'kpalma','2023-03-08','13:31:57','Actualización de tarifa de encomienda 27: Tarifa de Encomienda Pequeña de Honduras, Terminal San Pedro Sula a Panamá, Terminal Tapachula., con nuevo valor de: 5.00'),(307,'kpalma','2023-03-08','13:34:44','Encomienda ID 2 marcada como reclamada'),(308,'kpalma','2023-03-08','13:35:35','Encomienda ID 2 marcada como no reclamada'),(309,'kpalma','2023-03-08','13:35:39','Encomienda ID 2 marcada como reclamada'),(310,'kpalma','2023-03-08','13:55:30','Inserción de nueva tarifa de Encomiendas: 30: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José, con valor de: 20.00'),(311,'kpalma','2023-03-08','13:56:26','Inserción de nueva tarifa de Encomiendas: 32: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua, con valor de: 20.00'),(312,'kpalma','2023-03-08','13:57:10','Inserción de nueva tarifa de Encomiendas: 34: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con valor de: 20.00'),(313,'kpalma','2023-03-08','13:58:13','Inserción de nueva tarifa de Encomiendas: 36: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala, con valor de: 20.00'),(314,'kpalma','2023-03-08','13:58:40','Inserción de nueva tarifa de Encomiendas: 38: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a México, Terminal Tapachula, con valor de: 20.00'),(315,'kpalma','2023-03-08','13:59:54','Inserción de nueva tarifa de Encomiendas: 40: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula, con valor de: 20.00'),(316,'kpalma','2023-03-08','14:00:24','Inserción de nueva tarifa de Encomiendas: 42: Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá, con valor de: 20.00'),(317,'kpalma','2023-03-08','14:05:40','Inserción de nueva tarifa de Encomiendas: 44: Tarifa de Encomienda Media (5 kg - 10 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con valor de: 30.00'),(318,'kpalma','2023-03-08','14:06:09','Inserción de nueva tarifa de Encomiendas: 46: Tarifa de Encomienda Mediana (10 kg - 15 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con valor de: 40.00'),(319,'kpalma','2023-03-08','14:07:26','Inserción de nueva tarifa de Encomiendas: 48: Tarifa de Encomienda Grande (15 kg - 20 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con valor de: 50.00'),(320,'kpalma','2023-03-08','14:08:11','Inserción de nueva tarifa de Encomiendas: 50: Tarifa de Encomienda Extragrande (20 kg - 25 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador, con valor de: 60.00'),(321,'kpalma','2023-03-08','14:12:12','Venta de encomienda ID 4 en viaje: 15'),(322,'kpalma','2023-03-08','16:12:09','Inserción de nuevo cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(323,'kpalma','2023-03-08','16:35:38','Actualización de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(324,'kpalma','2023-03-08','16:37:17','Desactivación de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(325,'kpalma','2023-03-08','16:37:28','Actualización de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(326,'kpalma','2023-03-14','14:39:10','Inserción de nuevo cliente ID 0801-1999-55331: Mario Fernando Fernandez Castaño'),(327,'rmartinez','2023-03-14','15:02:44','Encomienda ID 4 marcada como reclamada'),(328,'rmartinez','2023-03-14','15:02:56','Actualización de viaje ID 15 en bus: AED-1234'),(329,'rmartinez','2023-03-14','15:03:04','Actualización de viaje ID 16 en bus: BC0-3132'),(330,'kpalma','2023-03-14','15:12:04','Inserción de nuevo viaje ID 17 en bus: AED-1234'),(331,'kpalma','2023-03-14','15:12:39','Inserción de nuevo viaje ID 18 en bus: BC0-3132'),(332,'kpalma','2023-03-14','15:13:18','Venta de boleto ID 45 en viaje: 17'),(333,'kpalma','2023-03-14','15:14:07','Venta de boleto ID 46 en viaje: 17'),(334,'kpalma','2023-03-14','15:14:41','Venta de boleto ID 47 en viaje: 17'),(335,'kpalma','2023-03-14','15:15:18','Venta de encomienda ID 5 en viaje: 17'),(336,'kpalma','2023-03-14','15:16:07','Venta de encomienda ID 6 en viaje: 17'),(337,'rmartinez','2023-03-14','15:21:12','Boleto ID 45 a sido cancelado'),(338,'rmartinez','2023-03-14','18:42:40','Venta de boleto ID 48 en viaje: 18'),(339,'rmartinez','2023-03-16','17:50:39','Boleto ID 46 a sido cancelado'),(340,'kpalma','2023-03-16','21:42:45','Actualización del boleto ID 47'),(341,'kpalma','2023-03-16','22:03:34','Boleto ID 46 a sido cancelado'),(342,'kpalma','2023-03-16','22:05:41','Boleto ID 46 a sido cancelado'),(343,'rmartinez','2023-03-16','22:06:30','Boleto ID 46 a sido cancelado'),(344,'kpalma','2023-03-16','22:25:54','Actualización del boleto ID 46'),(345,'kpalma','2023-03-16','22:26:25','Actualización del boleto ID 46'),(346,'kpalma','2023-03-16','22:27:39','Actualización del boleto ID 46'),(347,'kpalma','2023-03-16','22:31:09','Actualización del boleto ID 46'),(348,'kpalma','2023-03-16','22:33:00','Venta de boleto ID 49 en viaje: 17'),(349,'kpalma','2023-03-16','22:33:38','Actualización del boleto ID 49'),(350,'kpalma','2023-03-16','22:35:49','Venta de boleto ID 50 en viaje: 18'),(351,'kpalma','2023-03-16','22:36:38','Actualización del boleto ID 50'),(352,'kpalma','2023-03-16','22:37:19','Venta de boleto ID 51 en viaje: 18'),(353,'kpalma','2023-03-16','22:38:03','Actualización del boleto ID 51'),(354,'kpalma','2023-03-16','22:38:35','Boleto ID 51 a sido cancelado'),(355,'kpalma','2023-03-17','16:09:06','Encomienda ID 5 marcada como reclamada'),(356,'kpalma','2023-03-17','16:09:54','Encomienda ID 5 marcada como no reclamada'),(357,'kpalma','2023-03-17','16:10:23','Encomienda ID 5 marcada como reclamada'),(358,'kpalma','2023-03-17','16:18:41','Venta de encomienda ID 7 en viaje: 17'),(359,'kpalma','2023-03-17','16:45:47','Actualización de tarifa de boleto 1: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José'),(360,'kpalma','2023-03-17','16:45:55','Actualización de tarifa de boleto 3: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua'),(361,'kpalma','2023-03-17','16:46:00','Actualización de tarifa de boleto 5: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador'),(362,'kpalma','2023-03-17','16:46:06','Actualización de tarifa de boleto 7: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala'),(363,'kpalma','2023-03-17','16:46:29','Actualización de tarifa de boleto 9: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Mexico, Terminal Tapachula'),(364,'kpalma','2023-03-17','16:46:37','Actualización de tarifa de boleto 11: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula'),(365,'kpalma','2023-03-17','16:46:48','Actualización de tarifa de boleto 13: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Honduras, Terminal Tegucigalpa'),(366,'kpalma','2023-03-17','16:46:59','Actualización de tarifa de boleto 15: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Panamá, Terminal Ciudad de Panamá'),(367,'kpalma','2023-03-17','16:47:06','Actualización de tarifa de boleto 17: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Costa Rica, Terminal San José'),(368,'kpalma','2023-03-17','16:47:11','Actualización de tarifa de boleto 19: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá.'),(369,'kpalma','2023-03-17','16:47:26','Actualización de tarifa de boleto 21: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Nicaragua, Terminal Managua.'),(370,'kpalma','2023-03-17','16:47:32','Actualización de tarifa de boleto 23: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador.'),(371,'kpalma','2023-03-17','16:47:37','Actualización de tarifa de boleto 25: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Guatemala, Terminal Ciudad de Guatemala.'),(372,'kpalma','2023-03-17','16:47:41','Actualización de tarifa de boleto 27: Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Mexico, Terminal Tapachula.'),(373,'kpalma','2023-03-17','16:49:33','Encomienda ID 5 marcada como no reclamada'),(374,'kpalma','2023-03-17','16:50:23','Boleto ID 46 a sido cancelado'),(375,'kpalma','2023-03-17','18:11:05','Boleto ID 46 a sido cancelado'),(376,'kpalma','2023-03-17','18:12:32','Desactivación de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(377,'kpalma','2023-03-17','18:12:39','Actualización de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(378,'kpalma','2023-03-17','18:15:13','Desactivación de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(379,'kpalma','2023-03-17','18:15:21','Actualización de cliente ID 0801-2000-12345: Jeimy Maribel Colindres Valle'),(380,'kpalma','2023-03-17','18:15:53','Desactivación de tarifa de Boletos ID 1'),(381,'kpalma','2023-03-17','18:16:01','Actualización de tarifa de boleto 1: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José'),(382,'kpalma','2023-03-17','18:25:29','Desactivación de tarifa de Boletos ID 1'),(383,'kpalma','2023-03-17','18:26:16','Actualización de tarifa de boleto 1: Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José'),(384,'kpalma','2023-03-17','18:26:50','Desactivación de tarifa de Encomiendas ID 1'),(385,'kpalma','2023-03-17','18:27:00','Actualización de tarifa de encomienda 1: Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José'),(386,'kpalma','2023-03-17','18:34:38','Desactivación de bus ID AED-1234'),(387,'kpalma','2023-03-17','18:34:43','Actualización de bus ID AED-1234'),(388,'kpalma','2023-03-17','18:35:32','Actualización de bus ID AED-1234'),(389,'kpalma','2023-03-17','18:35:36','Desactivación de bus ID AED-1234'),(390,'kpalma','2023-03-17','18:35:39','Actualización de bus ID AED-1234'),(391,'kpalma','2023-03-17','18:36:29','Desactivación de empleado ID 0801-2003-10213: Juan Pablo Carias Moreno'),(392,'kpalma','2023-03-17','18:36:33','Actualización de empleado ID 0801-2003-10213: Juan Pablo Carias Moreno'),(393,'kpalma','2023-03-17','18:37:51','Actualización de usuario ID jcarias'),(394,'kpalma','2023-03-17','18:38:02','Desactivación de usuario ID jcarias'),(395,'kpalma','2023-03-17','18:38:11','Actualización de usuario ID jcarias'),(396,'kpalma','2023-03-21','16:16:59','Actualización de viaje ID 17 en bus: AED-1234'),(397,'kpalma','2023-03-21','16:17:06','Actualización de viaje ID 18 en bus: BC0-3132'),(398,'kpalma','2023-03-23','11:43:15','Inserción de nuevo viaje ID 19 en bus: AED-1234'),(399,'kpalma','2023-03-23','11:44:01','Inserción de nuevo viaje ID 20 en bus: BC0-3132'),(400,'kpalma','2023-03-23','12:24:13','Venta de boleto ID 52 en viaje: 19'),(401,'kpalma','2023-03-23','12:28:22','Actualización del boleto ID 52'),(402,'kpalma','2023-03-23','12:29:12','Boleto ID 52 a sido cancelado'),(403,'kpalma','2023-03-23','13:08:33','Venta de boleto ID 53 en viaje: 19'),(404,'kpalma','2023-03-23','13:25:24','Venta de boleto ID 54 en viaje: 19'),(405,'kpalma','2023-03-23','13:26:07','Actualización del boleto ID 54'),(406,'kpalma','2023-03-23','13:26:45','Boleto ID 54 a sido cancelado'),(407,'kpalma','2023-03-23','13:27:47','Venta de encomienda ID 8 en viaje: 19'),(408,'kpalma','2023-03-23','13:28:55','Encomienda ID 8 marcada como reclamada'),(409,'kpalma','2023-03-23','14:47:24','Inserción de nuevo viaje ID 21 en bus: AED-1234'),(410,'rmartinez','2023-03-30','08:41:13','Actualización de viaje ID 20 en bus: BC0-3132'),(411,'rmartinez','2023-03-30','08:41:27','Actualización de viaje ID 19 en bus: AED-1234'),(412,'rmartinez','2023-03-30','08:44:31','Venta de boleto ID 55 en viaje: 21'),(413,'rmartinez','2023-03-30','08:45:30','Actualización del boleto ID 55'),(414,'rmartinez','2023-03-30','08:46:07','Boleto ID 55 a sido cancelado'),(415,'rmartinez','2023-03-30','08:47:08','Venta de encomienda ID 9 en viaje: 21'),(416,'rmartinez','2023-03-30','08:47:51','Encomienda ID 9 marcada como reclamada'),(417,'kpalma','2023-04-12','18:22:02','Actualización de viaje ID 21 en bus: AED-1234'),(418,'kpalma','2023-04-12','18:22:11','Encomienda ID 5 marcada como reclamada'),(419,'kpalma','2023-04-12','18:22:16','Encomienda ID 6 marcada como reclamada'),(420,'kpalma','2023-04-12','18:22:21','Encomienda ID 7 marcada como reclamada'),(421,'kpalma','2023-04-12','18:23:37','Inserción de nuevo viaje ID 22 en bus: AED-1234'),(422,'kpalma','2023-04-12','18:24:13','Inserción de nuevo viaje ID 23 en bus: BC0-3132'),(423,'kpalma','2023-04-12','18:42:49','Inserción de nuevo cliente ID 0801-2000-13928: David José Martinez Velazques'),(424,'kpalma','2023-04-12','18:42:54','Venta de encomienda ID 10 en viaje: 22'),(425,'kpalma','2023-04-12','18:44:21','Venta de boleto ID 56 en viaje: 22'),(426,'kpalma','2023-04-12','18:51:40','Venta de encomienda ID 11 en viaje: 22'),(427,'kpalma','2023-04-12','18:53:09','Venta de boleto ID 57 en viaje: 22'),(428,'kpalma','2023-04-13','12:43:34','Venta de boleto ID 58 en viaje: 23'),(429,'kpalma','2023-04-13','12:46:07','Actualización del boleto ID 58'),(430,'kpalma','2023-04-13','12:47:27','Boleto ID 58 a sido cancelado'),(431,'kpalma','2023-04-13','12:54:50','Venta de encomienda ID 12 en viaje: 22');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boletos`
--

DROP TABLE IF EXISTS `boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletos` (
  `Id_Boleto` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Compra` date DEFAULT NULL,
  `Hora_Compra` time DEFAULT NULL,
  `Numero_Asiento` int(11) DEFAULT NULL,
  `Id_Usuario` varchar(45) DEFAULT NULL,
  `Id_Cliente` varchar(45) DEFAULT NULL,
  `Id_Viaje` int(11) DEFAULT NULL,
  `Id_Tarifa` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Boleto`),
  KEY `FK_Id_Usuario_Boleto_idx` (`Id_Usuario`),
  KEY `FK_Id_Cliente_Boleto_idx` (`Id_Cliente`),
  KEY `FK_Id_Viaje_Boleto_idx` (`Id_Viaje`),
  KEY `FK_Id_Tarifa_Boleto_idx` (`Id_Tarifa`),
  CONSTRAINT `FK_Id_Cliente_Boleto` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Tarifa_Boleto` FOREIGN KEY (`Id_Tarifa`) REFERENCES `tarifas_boletos` (`Id_Tarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Usuario_Boleto` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Viaje_Boleto` FOREIGN KEY (`Id_Viaje`) REFERENCES `viajes` (`Id_Viaje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletos`
--

LOCK TABLES `boletos` WRITE;
/*!40000 ALTER TABLE `boletos` DISABLE KEYS */;
INSERT INTO `boletos` VALUES (32,'2023-02-17','04:52:50',1,'kpalma','0801-1967-23221',10,5),(33,'2023-02-17','05:09:49',2,'kpalma','0801-1967-23221',11,7),(34,'2023-02-21','09:18:20',10,'kpalma','0801-1967-23221',12,3),(35,'2023-02-21','11:12:58',6,'kpalma','0801-1967-23221',10,5),(36,'2023-02-21','11:28:08',13,'kpalma','0801-1967-23221',12,3),(37,'2023-02-24','21:56:10',32,'kpalma','0801-1967-23221',12,3),(38,'2023-03-06','13:41:09',0,'kpalma','0801-1967-23221',15,5),(39,'2023-03-06','19:58:25',0,'kpalma','0801-1989-44492',15,5),(40,'2023-03-07','12:17:15',0,'kpalma','0801-1989-44492',15,5),(41,'2023-03-07','13:19:44',45,'kpalma','0801-1967-23221',15,5),(42,'2023-03-07','14:54:06',30,'kpalma','0801-1989-44492',15,5),(43,'2023-03-07','14:56:27',21,'kpalma','0801-1989-44492',16,11),(44,'2023-03-07','14:58:50',22,'kpalma','0801-1967-23221',16,11),(45,'2023-03-14','15:13:17',0,'kpalma','0801-1999-55331',17,5),(46,'2023-03-14','15:14:07',0,'kpalma','0801-1967-23221',17,5),(47,'2023-03-14','15:14:40',26,'kpalma','0801-1989-44492',17,5),(48,'2023-03-14','18:42:40',30,'rmartinez','0801-1967-23221',18,3),(49,'2023-03-16','22:33:00',49,'kpalma','0801-2000-12345',17,5),(50,'2023-03-16','22:35:49',46,'kpalma','0801-1967-23221',18,3),(51,'2023-03-16','22:37:19',0,'kpalma','0801-1967-23221',18,3),(52,'2023-03-23','12:24:13',0,'kpalma','0801-1967-23221',19,5),(53,'2023-03-23','13:08:33',1,'kpalma','0801-1999-55331',19,5),(54,'2023-03-23','13:25:24',0,'kpalma','0801-1967-23221',19,5),(55,'2023-03-30','08:44:31',0,'rmartinez','0801-1967-23221',21,5),(56,'2023-04-12','18:44:21',30,'kpalma','0801-1967-23221',22,5),(57,'2023-04-12','18:53:09',42,'kpalma','0801-1967-23221',22,5),(58,'2023-04-13','12:43:34',0,'kpalma','0801-1967-23221',23,3);
/*!40000 ALTER TABLE `boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buses` (
  `Id_Bus` varchar(45) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Modelo` varchar(45) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Capacidad_Personas` int(11) DEFAULT NULL,
  `Capacidad_Encomiendas` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buses`
--

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;
INSERT INTO `buses` VALUES ('AED-1234','Blue Bird','801-232','Azul',54,25,1),('BC0-3132','Blue Bird','901-221','Azul',54,25,1);
/*!40000 ALTER TABLE `buses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT,
  `Cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Vendedor'),(2,'Conductor'),(3,'Gerente');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `Id_Ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Ciudad` varchar(45) DEFAULT NULL,
  `Id_Pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Ciudad`),
  KEY `FK_Id_Pais_Ciudad_idx` (`Id_Pais`),
  CONSTRAINT `FK_Id_Pais_Ciudad` FOREIGN KEY (`Id_Pais`) REFERENCES `paises` (`Id_Pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Tegucigalpa',1),(2,'San Pedro Sula',1),(3,'Ciudad Panamá',2),(4,'San José',3),(5,'Managua',4),(6,'San Salvador',5),(7,'Ciudad Guatemala',6),(8,'Tapachula',7);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `Id_Cliente` varchar(45) NOT NULL,
  `Nombres` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Id_Genero` int(11) DEFAULT NULL,
  `Direccion` text,
  `Id_Terminal` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Cliente`),
  KEY `FK_Id_Genero_idx` (`Id_Genero`),
  KEY `FK_Id_Terminal_Cliente_idx` (`Id_Terminal`),
  CONSTRAINT `FK_Id_Genero_Cliente` FOREIGN KEY (`Id_Genero`) REFERENCES `generos` (`Id_Genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Cliente` FOREIGN KEY (`Id_Terminal`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('0801-1967-23221','Camila Juana','Sexta Tercera','2021-04-01','1967-01-10','23542211','bigdeoxys@gmail.com',1,'Col. Ajuterique, Casa 34.',1,1),('0801-1989-44492','Jessica Lourdes','Valeriano Contreras','2023-02-01','1989-09-11','99829281','themisteriustukusama@gmail.com',1,'Col. San Jose, Casa 12.',5,1),('0801-1999-55331','Mario Fernando','Fernandez Castaño','2023-03-14','1999-12-15','33285948','mariofernandez@gmail.com',2,'Col. Hato de Enmedio Sector 3, Bloque 9',1,1),('0801-2000-12345','Jeimy Maribel','Colindres Valle','2023-03-08','2000-08-11','33224123','jeimy32@gmail.com',1,'Col. Centro',2,1),('0801-2000-13928','David José','Martinez Velazques','2023-04-12','2000-05-08','88493849','bluekeikoblack@gmail.com',2,'Col. Hato de Enmedio',1,1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `Id_Empleado` varchar(45) NOT NULL,
  `Nombres` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Fecha_Contratacion` date DEFAULT NULL,
  `Fecha_Finalizacion_Contrato` date DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Id_Cargo` int(11) DEFAULT NULL,
  `Reporta_A` varchar(45) DEFAULT NULL,
  `Id_Genero` int(11) DEFAULT NULL,
  `Direccion` text,
  `Id_Terminal` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Empleado`),
  KEY `FK_Id_Cargo_Empleado_idx` (`Id_Cargo`),
  KEY `FK_Reporta_A_Empleado_idx` (`Reporta_A`),
  KEY `FK_Id_Genero_Empleado_idx` (`Id_Genero`),
  KEY `FK_Id_Terminal_Empleado_idx` (`Id_Terminal`),
  CONSTRAINT `FK_Id_Cargo_Empleado` FOREIGN KEY (`Id_Cargo`) REFERENCES `cargos` (`Id_Cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Genero_Empleado` FOREIGN KEY (`Id_Genero`) REFERENCES `generos` (`Id_Genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Empleado` FOREIGN KEY (`Id_Terminal`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Reporta_A_Empleado` FOREIGN KEY (`Reporta_A`) REFERENCES `empleados` (`Id_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES ('0801-2000-10222','Marcos Dailo','Espinal Paz','2000-04-30','2020-01-02','2030-01-01','9809-9643','marcos@gmailcom',2,'0801-2000-19327',2,'Col. Miraflores',1,1),('0801-2000-16817','Karol Stephany','Palma Ventura','2000-07-03','2021-04-01','2031-06-01','98803121','karolstephpalma@gmail.com',3,NULL,1,'Res. San Juan',1,1),('0801-2001-33928','Romeo Martin','Martinez Perez','2001-08-10','2023-03-01','2027-12-01','92123827','romeomartinez@gmail.com',1,'0801-2000-16817',2,'Col. Bella Oriente',1,1),('0801-2003-10213','Juan Pablo','Carias Moreno','2003-02-24','2021-02-02','2026-02-02','9903-1334','juan@gmail.com',2,NULL,2,'Col. Palmitos Casa 35',1,1);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encomiendas`
--

DROP TABLE IF EXISTS `encomiendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encomiendas` (
  `Id_Guia` int(11) NOT NULL AUTO_INCREMENT,
  `Volumen` int(11) DEFAULT NULL,
  `Fecha_Envio` date DEFAULT NULL,
  `Hora_Envio` time DEFAULT NULL,
  `Id_Usuario` varchar(45) DEFAULT NULL,
  `Id_Emisor` varchar(45) DEFAULT NULL,
  `Id_Receptor` varchar(45) DEFAULT NULL,
  `Id_Viaje` int(11) DEFAULT NULL,
  `Id_Tarifa` int(11) DEFAULT NULL,
  `Reclamada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Guia`),
  KEY `FK_Id_Usuario_Encomienda_idx` (`Id_Usuario`),
  KEY `FK_Id_Receptor_Encomienda_idx` (`Id_Receptor`),
  KEY `FK_Id_Destinatario_Encomienda_idx` (`Id_Emisor`),
  KEY `FK_Id_Viaje_Encomienda_idx` (`Id_Viaje`),
  KEY `FK_Id_Tarifa_Encomienda_idx` (`Id_Tarifa`),
  CONSTRAINT `FK_Id_Destinatario_Encomienda` FOREIGN KEY (`Id_Emisor`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Receptor_Encomienda` FOREIGN KEY (`Id_Receptor`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Tarifa_Encomienda` FOREIGN KEY (`Id_Tarifa`) REFERENCES `tarifas_encomiendas` (`Id_Tarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Usuario_Encomienda` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Viaje_Encomienda` FOREIGN KEY (`Id_Viaje`) REFERENCES `viajes` (`Id_Viaje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encomiendas`
--

LOCK TABLES `encomiendas` WRITE;
/*!40000 ALTER TABLE `encomiendas` DISABLE KEYS */;
INSERT INTO `encomiendas` VALUES (1,1,'2023-03-01','20:29:53','rmartinez','0801-1967-23221','0801-1989-44492',10,5,1),(2,1,'2023-03-01','20:34:28','rmartinez','0801-1967-23221','0801-1989-44492',10,5,1),(3,1,'2023-03-03','13:32:43','kpalma','0801-1967-23221','0801-1989-44492',14,21,1),(4,1,'2023-03-08','14:12:12','kpalma','0801-1967-23221','0801-1989-44492',15,33,1),(5,1,'2023-03-14','15:15:17','kpalma','0801-1967-23221','0801-1989-44492',17,33,1),(6,3,'2023-03-14','15:16:07','kpalma','0801-1999-55331','0801-2000-12345',17,45,1),(7,5,'2023-03-17','16:18:41','kpalma','0801-1967-23221','0801-1989-44492',17,49,1),(8,2,'2023-03-23','13:27:47','kpalma','0801-1967-23221','0801-1989-44492',19,43,1),(9,1,'2023-03-30','08:47:08','rmartinez','0801-1967-23221','0801-1989-44492',21,33,1),(10,1,'2023-04-12','18:42:54','kpalma','0801-1967-23221','0801-2000-13928',22,33,0),(11,4,'2023-04-12','18:51:40','kpalma','0801-1967-23221','0801-1989-44492',22,47,0),(12,2,'2023-04-13','12:54:50','kpalma','0801-1967-23221','0801-1989-44492',22,43,0);
/*!40000 ALTER TABLE `encomiendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_viajes`
--

DROP TABLE IF EXISTS `estados_viajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_viajes` (
  `Id_Estado_Viaje` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Estado_Viaje`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_viajes`
--

LOCK TABLES `estados_viajes` WRITE;
/*!40000 ALTER TABLE `estados_viajes` DISABLE KEYS */;
INSERT INTO `estados_viajes` VALUES (1,'En Espera','El bus aún no ha salido del lugar de origen.'),(2,'En Curso','El bus ya está viajando a su destino.'),(3,'En Destino','El bus ha llegado a su destino.'),(4,'Cancelado','El viaje ha sido cancelado.'),(5,'Retrasado','El bus está retrasado.');
/*!40000 ALTER TABLE `estados_viajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `Id_Genero` int(11) NOT NULL AUTO_INCREMENT,
  `Genero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Genero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Femenino'),(2,'Masculino'),(3,'No definido');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_precios_tarifas_boletos`
--

DROP TABLE IF EXISTS `historico_precios_tarifas_boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_precios_tarifas_boletos` (
  `Id_Tarifa` int(11) NOT NULL,
  `Precio` double(9,2) DEFAULT NULL,
  `Fecha_Inicio` datetime NOT NULL,
  `Fecha_Fin` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Tarifa`,`Fecha_Inicio`),
  CONSTRAINT `FK_Id_Tarifa_Boleto_Historico` FOREIGN KEY (`Id_Tarifa`) REFERENCES `tarifas_boletos` (`Id_Tarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_precios_tarifas_boletos`
--

LOCK TABLES `historico_precios_tarifas_boletos` WRITE;
/*!40000 ALTER TABLE `historico_precios_tarifas_boletos` DISABLE KEYS */;
INSERT INTO `historico_precios_tarifas_boletos` VALUES (1,67.00,'2021-03-14 09:00:00',NULL),(2,10.00,'2021-03-14 09:00:00','2023-02-17 04:03:52'),(2,6.70,'2023-02-17 04:03:52','2023-03-17 16:45:47'),(2,67.00,'2023-03-17 16:45:47',NULL),(3,50.00,'2021-03-14 09:00:00',NULL),(4,10.00,'2021-03-14 09:00:00','2023-03-17 16:45:55'),(4,50.00,'2023-03-17 16:45:55',NULL),(5,50.00,'2021-03-14 09:00:00',NULL),(6,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:00'),(6,50.00,'2023-03-17 16:46:00',NULL),(7,50.00,'2021-03-14 09:00:00',NULL),(8,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:06'),(8,50.00,'2023-03-17 16:46:06',NULL),(9,50.00,'2021-03-14 09:00:00',NULL),(10,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:29'),(10,50.00,'2023-03-17 16:46:29',NULL),(11,50.00,'2021-03-14 09:00:00',NULL),(12,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:37'),(12,50.00,'2023-03-17 16:46:37',NULL),(13,50.00,'2021-03-14 09:00:00',NULL),(14,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:48'),(14,50.00,'2023-03-17 16:46:48',NULL),(15,50.00,'2021-03-14 09:00:00',NULL),(16,10.00,'2021-03-14 09:00:00','2023-03-17 16:46:59'),(16,50.00,'2023-03-17 16:47:00',NULL),(17,50.00,'2021-03-14 09:00:00',NULL),(18,10.00,'2021-03-14 09:00:00','2023-03-17 16:47:06'),(18,50.00,'2023-03-17 16:47:06',NULL),(19,70.00,'2023-02-17 03:56:47','2023-02-17 03:58:42'),(19,80.00,'2023-02-17 03:58:42',NULL),(20,7.00,'2023-02-17 03:56:47','2023-02-17 03:58:42'),(20,8.00,'2023-02-17 03:58:43','2023-03-17 16:47:11'),(20,80.00,'2023-03-17 16:47:11',NULL),(21,50.00,'2023-02-17 04:21:52',NULL),(22,5.00,'2023-02-17 04:21:52','2023-03-17 16:47:26'),(22,50.00,'2023-03-17 16:47:26',NULL),(23,50.00,'2023-02-17 04:22:49',NULL),(24,5.00,'2023-02-17 04:22:49','2023-03-17 16:47:32'),(24,50.00,'2023-03-17 16:47:32',NULL),(25,50.00,'2023-02-17 04:23:21',NULL),(26,5.00,'2023-02-17 04:23:22','2023-03-17 16:47:37'),(26,50.00,'2023-03-17 16:47:37',NULL),(27,50.00,'2023-02-17 04:23:53',NULL),(28,5.00,'2023-02-17 04:23:53','2023-03-17 16:47:41'),(28,50.00,'2023-03-17 16:47:41',NULL);
/*!40000 ALTER TABLE `historico_precios_tarifas_boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_precios_tarifas_encomiendas`
--

DROP TABLE IF EXISTS `historico_precios_tarifas_encomiendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_precios_tarifas_encomiendas` (
  `Id_Tarifa` int(11) NOT NULL,
  `Precio` double(9,2) DEFAULT NULL,
  `Fecha_Inicio` datetime NOT NULL,
  `Fecha_Fin` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Tarifa`,`Fecha_Inicio`),
  CONSTRAINT `FK_Id_Tarifa_Encomienda_Historico` FOREIGN KEY (`Id_Tarifa`) REFERENCES `tarifas_encomiendas` (`Id_Tarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_precios_tarifas_encomiendas`
--

LOCK TABLES `historico_precios_tarifas_encomiendas` WRITE;
/*!40000 ALTER TABLE `historico_precios_tarifas_encomiendas` DISABLE KEYS */;
INSERT INTO `historico_precios_tarifas_encomiendas` VALUES (1,50.00,'2021-03-14 09:00:00','2023-03-08 13:29:06'),(1,5.00,'2023-03-08 13:29:06',NULL),(2,10.00,'2021-03-14 09:00:00','2023-03-08 13:29:07'),(2,0.50,'2023-03-08 13:29:07',NULL),(3,50.00,'2021-03-14 09:00:00','2023-03-08 13:29:14'),(3,5.00,'2023-03-08 13:29:14',NULL),(4,10.00,'2021-03-14 09:00:00','2023-03-08 13:29:15'),(4,0.50,'2023-03-08 13:29:15',NULL),(5,50.00,'2021-03-14 09:00:00','2023-03-08 13:29:30'),(5,10.00,'2023-03-08 13:29:30','2023-03-08 13:29:38'),(5,5.00,'2023-03-08 13:29:38',NULL),(6,10.00,'2021-03-14 09:00:00','2023-03-08 13:29:30'),(6,1.00,'2023-03-08 13:29:30','2023-03-08 13:29:38'),(6,0.50,'2023-03-08 13:29:39',NULL),(7,50.00,'2021-03-14 09:00:00','2023-03-08 13:29:49'),(7,5.00,'2023-03-08 13:29:49',NULL),(8,10.00,'2021-03-14 09:00:00','2023-03-08 13:29:49'),(8,0.50,'2023-03-08 13:29:49',NULL),(9,50.00,'2021-03-14 09:00:00','2023-03-08 13:30:11'),(9,5.00,'2023-03-08 13:30:11',NULL),(10,10.00,'2021-03-14 09:00:00','2023-03-08 13:30:11'),(10,0.50,'2023-03-08 13:30:11',NULL),(11,50.00,'2021-03-14 09:00:00','2023-03-08 13:30:21'),(11,5.00,'2023-03-08 13:30:21',NULL),(12,10.00,'2021-03-14 09:00:00','2023-03-08 13:30:21'),(12,0.50,'2023-03-08 13:30:21',NULL),(13,50.00,'2021-03-14 09:00:00','2023-03-08 13:30:31'),(13,5.00,'2023-03-08 13:30:31',NULL),(14,10.00,'2021-03-14 09:00:00','2023-03-08 13:30:31'),(14,0.50,'2023-03-08 13:30:31',NULL),(15,50.00,'2021-03-14 09:00:00','2023-03-08 13:30:53'),(15,5.00,'2023-03-08 13:30:53',NULL),(16,10.00,'2021-03-14 09:00:00','2023-03-08 13:30:53'),(16,0.50,'2023-03-08 13:30:53',NULL),(17,50.00,'2021-03-14 09:00:00','2023-03-08 13:31:03'),(17,5.00,'2023-03-08 13:31:03',NULL),(18,10.00,'2021-03-14 09:00:00','2023-03-08 13:31:03'),(18,0.50,'2023-03-08 13:31:03',NULL),(19,10.00,'2021-03-14 09:00:00','2023-03-08 13:31:13'),(19,5.00,'2023-03-08 13:31:13',NULL),(20,10.00,'2021-03-14 09:00:00','2023-03-08 13:31:13'),(20,0.50,'2023-03-08 13:31:13',NULL),(21,10.00,'2021-03-14 09:00:00','2023-03-03 13:29:53'),(21,60.00,'2023-03-03 13:29:53','2023-03-08 13:31:22'),(21,5.00,'2023-03-08 13:31:22',NULL),(22,10.00,'2021-03-14 09:00:00','2023-03-03 13:29:53'),(22,6.00,'2023-03-03 13:29:54','2023-03-08 13:31:22'),(22,0.50,'2023-03-08 13:31:22',NULL),(23,10.00,'2021-03-14 09:00:00','2023-03-08 13:31:34'),(23,5.00,'2023-03-08 13:31:34',NULL),(24,10.00,'2021-03-14 09:00:00','2023-03-08 13:31:34'),(24,0.50,'2023-03-08 13:31:34',NULL),(25,50.00,'2023-02-17 04:26:58','2023-03-08 13:31:43'),(25,5.00,'2023-03-08 13:31:43',NULL),(26,5.00,'2023-02-17 04:26:58','2023-03-08 13:31:43'),(26,0.50,'2023-03-08 13:31:43',NULL),(27,50.00,'2023-02-17 04:38:27','2023-03-08 13:31:57'),(27,5.00,'2023-03-08 13:31:57',NULL),(28,5.00,'2023-02-17 04:38:27','2023-03-08 13:31:57'),(28,0.50,'2023-03-08 13:31:57',NULL),(29,20.00,'2023-03-08 13:55:30',NULL),(30,2.00,'2023-03-08 13:55:30',NULL),(31,20.00,'2023-03-08 13:56:26',NULL),(32,2.00,'2023-03-08 13:56:26',NULL),(33,20.00,'2023-03-08 13:57:10',NULL),(34,2.00,'2023-03-08 13:57:10',NULL),(35,20.00,'2023-03-08 13:58:12',NULL),(36,2.00,'2023-03-08 13:58:12',NULL),(37,20.00,'2023-03-08 13:58:40',NULL),(38,2.00,'2023-03-08 13:58:40',NULL),(39,20.00,'2023-03-08 13:59:54',NULL),(40,2.00,'2023-03-08 13:59:54',NULL),(41,20.00,'2023-03-08 14:00:24',NULL),(42,2.00,'2023-03-08 14:00:24',NULL),(43,30.00,'2023-03-08 14:05:40',NULL),(44,3.00,'2023-03-08 14:05:40',NULL),(45,40.00,'2023-03-08 14:06:09',NULL),(46,4.00,'2023-03-08 14:06:09',NULL),(47,50.00,'2023-03-08 14:07:25',NULL),(48,5.00,'2023-03-08 14:07:25',NULL),(49,60.00,'2023-03-08 14:08:11',NULL),(50,6.00,'2023-03-08 14:08:11',NULL);
/*!40000 ALTER TABLE `historico_precios_tarifas_encomiendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `Id_Pais` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Pais`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'Honduras'),(2,'Panamá'),(3,'Costa Rica'),(4,'Nicaragua'),(5,'El Salvador'),(6,'Guatemala'),(7,'México');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifas_boletos`
--

DROP TABLE IF EXISTS `tarifas_boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifas_boletos` (
  `Id_Tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` text,
  `Id_Terminal_Origen` int(11) DEFAULT NULL,
  `Id_Terminal_Destino` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Tarifa`),
  KEY `FK_Id_Terminal_Origen_idx` (`Id_Terminal_Origen`),
  KEY `FK_Id_Terminal_Destino_Tarifa_Boleto_idx` (`Id_Terminal_Destino`),
  CONSTRAINT `FK_Id_Terminal_Destino_Tarifa_Boleto` FOREIGN KEY (`Id_Terminal_Destino`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Origen_Tarifa_Boleto` FOREIGN KEY (`Id_Terminal_Origen`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifas_boletos`
--

LOCK TABLES `tarifas_boletos` WRITE;
/*!40000 ALTER TABLE `tarifas_boletos` DISABLE KEYS */;
INSERT INTO `tarifas_boletos` VALUES (1,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José',1,4,1),(2,'Tarifa de Reajuste',1,4,1),(3,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua',1,5,1),(4,'Tarifa de Reajuste',1,5,1),(5,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(6,'Tarifa de Reajuste',1,6,1),(7,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala',1,7,1),(8,'Tarifa de Reajuste',1,7,1),(9,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Mexico, Terminal Tapachula',1,8,1),(10,'Tarifa de Reajuste',1,8,1),(11,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula',1,2,1),(12,'Tarifa de Reajuste',1,2,1),(13,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Honduras, Terminal Tegucigalpa',2,1,1),(14,'Tarifa de Reajuste',2,1,1),(15,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Panamá, Terminal Ciudad de Panamá',2,3,1),(16,'Tarifa de Reajuste',2,3,1),(17,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Costa Rica, Terminal San José',2,4,1),(18,'Tarifa de Reajuste',2,4,1),(19,'Tarifa de Boleto de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá.',1,3,1),(20,'Tarifa de Reajuste',1,3,1),(21,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Nicaragua, Terminal Managua.',2,5,1),(22,'Tarifa de Reajuste',2,5,1),(23,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador.',2,6,1),(24,'Tarifa de Reajuste',2,6,1),(25,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Guatemala, Terminal Ciudad de Guatemala.',2,7,1),(26,'Tarifa de Reajuste',2,7,1),(27,'Tarifa de Boleto de Honduras, Terminal San Pedro Sula a Mexico, Terminal Tapachula.',2,8,1),(28,'Tarifa de Reajuste',2,8,1);
/*!40000 ALTER TABLE `tarifas_boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifas_encomiendas`
--

DROP TABLE IF EXISTS `tarifas_encomiendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifas_encomiendas` (
  `Id_Tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `Volumen` int(11) DEFAULT NULL,
  `Descripcion` text,
  `Id_Terminal_Origen` int(11) DEFAULT NULL,
  `Id_Terminal_Destino` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Tarifa`),
  KEY `FK_Id_Terminal_Destino_Tarifa_Encomienda_idx` (`Id_Terminal_Origen`),
  KEY `FK_Id_Terminal_Destino_Tarifa_Encomienda_idx1` (`Id_Terminal_Destino`),
  CONSTRAINT `FK_Id_Terminal_Destino_Tarifa_Encomienda` FOREIGN KEY (`Id_Terminal_Destino`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Origen_Tarifa_Encomienda` FOREIGN KEY (`Id_Terminal_Origen`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifas_encomiendas`
--

LOCK TABLES `tarifas_encomiendas` WRITE;
/*!40000 ALTER TABLE `tarifas_encomiendas` DISABLE KEYS */;
INSERT INTO `tarifas_encomiendas` VALUES (1,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José',1,4,1),(2,0,'Tarifa de Reajuste',1,4,1),(3,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua',1,5,1),(4,0,'Tarifa de Reajuste',1,5,1),(5,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(6,0,'Tarifa de Reajuste',1,6,1),(7,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala',1,7,1),(8,0,'Tarifa de Reajuste',1,7,1),(9,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Mexico, Terminal Tapachula',1,8,1),(10,0,'Tarifa de Reajuste',1,8,1),(11,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula',1,2,1),(12,0,'Tarifa de Reajuste',1,2,1),(13,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Honduras, Terminal Tegucigalpa',2,1,1),(14,0,'Tarifa de Reajuste',2,1,1),(15,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Panamá, Terminal Ciudad de Panamá',2,3,1),(16,0,'Tarifa de Reajuste',2,3,1),(17,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Costa Rica, Terminal San José',2,4,1),(18,0,'Tarifa de Reajuste',2,4,1),(19,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Nicaragua, Terminal Managua',2,5,1),(20,0,'Tarifa de Reajuste',2,5,1),(21,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a El Salvador, Terminal San Salvador',2,6,1),(22,0,'Tarifa de Reajuste',2,6,1),(23,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Guatemala, Terminal Ciudad de Guatemala',2,7,1),(24,0,'Tarifa de Reajuste',2,7,1),(25,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá.',1,3,1),(26,0,'Tarifa de Reajuste',1,3,1),(27,0,'Tarifa de Encomienda Extra Pequeña (Menos 1 kg) de Honduras, Terminal San Pedro Sula a Panamá, Terminal Tapachula.',2,8,1),(28,0,'Tarifa de Reajuste',2,8,1),(29,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Costa Rica, Terminal San José',1,4,1),(30,1,'Tarifa de Reajuste',1,4,1),(31,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Nicaragua, Terminal Managua',1,5,1),(32,1,'Tarifa de Reajuste',1,5,1),(33,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(34,1,'Tarifa de Reajuste',1,6,1),(35,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Guatemala, Terminal Ciudad de Guatemala',1,7,1),(36,1,'Tarifa de Reajuste',1,7,1),(37,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a México, Terminal Tapachula',1,8,1),(38,1,'Tarifa de Reajuste',1,8,1),(39,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Honduras, Terminal San Pedro Sula',1,2,1),(40,1,'Tarifa de Reajuste',1,2,1),(41,1,'Tarifa de Encomienda Pequeña (1 kg - 5 kg) de Honduras, Terminal Tegucigalpa a Panamá, Terminal Ciudad de Panamá',1,3,1),(42,1,'Tarifa de Reajuste',1,3,1),(43,2,'Tarifa de Encomienda Media (5 kg - 10 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(44,2,'Tarifa de Reajuste',1,6,1),(45,3,'Tarifa de Encomienda Mediana (10 kg - 15 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(46,3,'Tarifa de Reajuste',1,6,1),(47,4,'Tarifa de Encomienda Grande (15 kg - 20 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(48,4,'Tarifa de Reajuste',1,6,1),(49,5,'Tarifa de Encomienda Extragrande (20 kg - 25 kg) de Honduras, Terminal Tegucigalpa a El Salvador, Terminal San Salvador',1,6,1),(50,5,'Tarifa de Reajuste',1,6,1);
/*!40000 ALTER TABLE `tarifas_encomiendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminales`
--

DROP TABLE IF EXISTS `terminales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminales` (
  `Id_Terminal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Terminal` varchar(45) DEFAULT NULL,
  `Id_Ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Terminal`),
  KEY `FK_Id_Ciudad_Terminal_idx` (`Id_Ciudad`),
  CONSTRAINT `FK_Id_Ciudad_Terminal` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudades` (`Id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminales`
--

LOCK TABLES `terminales` WRITE;
/*!40000 ALTER TABLE `terminales` DISABLE KEYS */;
INSERT INTO `terminales` VALUES (1,'Terminal Tegucigalpa',1),(2,'Terminal San Pedro Sula',2),(3,'Terminal Ciudad de Panamá',3),(4,'Terminal San José',4),(5,'Terminal Managua',5),(6,'Terminal San Salvador',6),(7,'Terminal Ciudad de Guatemala',7),(8,'Terminal Tapachula',8);
/*!40000 ALTER TABLE `terminales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Id_Usuario` varchar(45) NOT NULL,
  `Id_Empleado` varchar(45) DEFAULT NULL,
  `Clave` varchar(255) DEFAULT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Ultima_Fecha_Actualizacion` date DEFAULT NULL,
  `Administrador` tinyint(1) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Clave_Cambiada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `FK_Id_Empleado_Usuario_idx` (`Id_Empleado`),
  CONSTRAINT `FK_Id_Empleado_Usuario` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleados` (`Id_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('jcarias','0801-2003-10213','$2y$10$G.njdhEUgJy9qTF9wNiVdOtFPTd95IdWWyREgxUHkSW6MNXSxBCM6','2023-03-01','2023-03-17',2,1,1),('kpalma','0801-2000-16817','$2y$10$CZskAGXqFP59uvj8ja7zYuAc3m7pwujwF1pyrMe1J4ucagyNk9CJq','2021-04-01','2023-03-01',1,1,1),('mespinal','0801-2000-10222','$2y$10$YCsg5XdFruJ7zjoV3hK1D.hcSErGViOdq0rV1ZsKs6vqrNFUSW2yy','2023-03-01','2023-03-01',2,1,1),('rmartinez','0801-2001-33928','$2y$10$Z2IniDfHf85cQLW.fgbNluB38/S5umZnzHCpl.gqWNkgn9DqDKf9O','2023-03-01','2023-03-01',0,1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_bitacora`
--

DROP TABLE IF EXISTS `v_bitacora`;
/*!50001 DROP VIEW IF EXISTS `v_bitacora`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_bitacora` AS SELECT 
 1 AS `Id_Registro`,
 1 AS `Id_Usuario`,
 1 AS `Fecha`,
 1 AS `Hora`,
 1 AS `Detalle`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_boleto`
--

DROP TABLE IF EXISTS `v_boleto`;
/*!50001 DROP VIEW IF EXISTS `v_boleto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_boleto` AS SELECT 
 1 AS `Id_Boleto`,
 1 AS `Fecha_Compra`,
 1 AS `Hora_Compra`,
 1 AS `Numero_Asiento`,
 1 AS `Id_Empleado`,
 1 AS `Id_Cliente`,
 1 AS `Nombre`,
 1 AS `Correo`,
 1 AS `Id_Viaje`,
 1 AS `Id_Pais_Origen`,
 1 AS `Nombre_Pais_Origen`,
 1 AS `Id_Ciudad_Origen`,
 1 AS `Nombre_Ciudad_Origen`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Nombre_Terminal_Origen`,
 1 AS `Id_Pais_Destino`,
 1 AS `Nombre_Pais_Destino`,
 1 AS `Id_Ciudad_Destino`,
 1 AS `Nombre_Ciudad_Destino`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Nombre_Terminal_Destino`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Fecha_Llegada`,
 1 AS `Hora_Llegada`,
 1 AS `Id_Bus`,
 1 AS `Id_Tarifa`,
 1 AS `Precio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_buses`
--

DROP TABLE IF EXISTS `v_buses`;
/*!50001 DROP VIEW IF EXISTS `v_buses`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_buses` AS SELECT 
 1 AS `Id_Bus`,
 1 AS `Marca`,
 1 AS `Modelo`,
 1 AS `Color`,
 1 AS `Capacidad_Personas`,
 1 AS `Capacidad_Encomiendas`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_cliente`
--

DROP TABLE IF EXISTS `v_cliente`;
/*!50001 DROP VIEW IF EXISTS `v_cliente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_cliente` AS SELECT 
 1 AS `Id_Cliente`,
 1 AS `Nombres`,
 1 AS `Apellidos`,
 1 AS `Fecha_Registro`,
 1 AS `Fecha_Nacimiento`,
 1 AS `Telefono`,
 1 AS `Correo`,
 1 AS `Id_Genero`,
 1 AS `Direccion`,
 1 AS `Id_Pais`,
 1 AS `Id_Ciudad`,
 1 AS `Id_Terminal`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_empleado`
--

DROP TABLE IF EXISTS `v_empleado`;
/*!50001 DROP VIEW IF EXISTS `v_empleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_empleado` AS SELECT 
 1 AS `Id_Empleado`,
 1 AS `Nombres`,
 1 AS `Apellidos`,
 1 AS `Fecha_Nacimiento`,
 1 AS `Fecha_Contratacion`,
 1 AS `Fecha_Finalizacion_Contrato`,
 1 AS `Telefono`,
 1 AS `Correo`,
 1 AS `Id_Cargo`,
 1 AS `Reporta_A`,
 1 AS `Id_Genero`,
 1 AS `Direccion`,
 1 AS `Id_Pais`,
 1 AS `Id_Ciudad`,
 1 AS `Id_Terminal`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_encomienda`
--

DROP TABLE IF EXISTS `v_encomienda`;
/*!50001 DROP VIEW IF EXISTS `v_encomienda`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_encomienda` AS SELECT 
 1 AS `Id_Guia`,
 1 AS `Volumen`,
 1 AS `Fecha_Envio`,
 1 AS `Hora_Envio`,
 1 AS `Id_Empleado`,
 1 AS `Id_Emisor`,
 1 AS `Nombre_Emisor`,
 1 AS `Correo_Emisor`,
 1 AS `Id_Receptor`,
 1 AS `Nombre_Receptor`,
 1 AS `Correo_Receptor`,
 1 AS `Id_Viaje`,
 1 AS `Id_Pais_Origen`,
 1 AS `Nombre_Pais_Origen`,
 1 AS `Id_Ciudad_Origen`,
 1 AS `Nombre_Ciudad_Origen`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Nombre_Terminal_Origen`,
 1 AS `Id_Pais_Destino`,
 1 AS `Nombre_Pais_Destino`,
 1 AS `Id_Ciudad_Destino`,
 1 AS `Nombre_Ciudad_Destino`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Nombre_Terminal_Destino`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Fecha_Llegada`,
 1 AS `Hora_Llegada`,
 1 AS `Id_Bus`,
 1 AS `Id_Tarifa`,
 1 AS `Precio`,
 1 AS `Reclamada`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_tarifas_boletos`
--

DROP TABLE IF EXISTS `v_tarifas_boletos`;
/*!50001 DROP VIEW IF EXISTS `v_tarifas_boletos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_tarifas_boletos` AS SELECT 
 1 AS `Id_Tarifa`,
 1 AS `Descripcion`,
 1 AS `Id_Pais_Origen`,
 1 AS `Id_Ciudad_Origen`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Id_Pais_Destino`,
 1 AS `Id_Ciudad_Destino`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Precio`,
 1 AS `Porcentaje_Reajuste`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_tarifas_encomiendas`
--

DROP TABLE IF EXISTS `v_tarifas_encomiendas`;
/*!50001 DROP VIEW IF EXISTS `v_tarifas_encomiendas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_tarifas_encomiendas` AS SELECT 
 1 AS `Id_Tarifa`,
 1 AS `Volumen`,
 1 AS `Descripcion`,
 1 AS `Id_Pais_Origen`,
 1 AS `Id_Ciudad_Origen`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Id_Pais_Destino`,
 1 AS `Id_Ciudad_Destino`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Precio`,
 1 AS `Porcentaje_Reajuste`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_usuario`
--

DROP TABLE IF EXISTS `v_usuario`;
/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_usuario` AS SELECT 
 1 AS `Id_Usuario`,
 1 AS `Id_Empleado`,
 1 AS `Nombre_Completo`,
 1 AS `Clave`,
 1 AS `Fecha_Registro`,
 1 AS `Ultima_Fecha_Actualizacion`,
 1 AS `Administrador`,
 1 AS `Activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_usuariologin`
--

DROP TABLE IF EXISTS `v_usuariologin`;
/*!50001 DROP VIEW IF EXISTS `v_usuariologin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_usuariologin` AS SELECT 
 1 AS `Id_Usuario`,
 1 AS `Id_Empleado`,
 1 AS `Administrador`,
 1 AS `Nombre`,
 1 AS `Id_Cargo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_viaje`
--

DROP TABLE IF EXISTS `v_viaje`;
/*!50001 DROP VIEW IF EXISTS `v_viaje`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_viaje` AS SELECT 
 1 AS `Id_Viaje`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Fecha_Llegada`,
 1 AS `Hora_Llegada`,
 1 AS `Id_Pais_Origen`,
 1 AS `Nombre_Pais_Origen`,
 1 AS `Id_Ciudad_Origen`,
 1 AS `Nombre_Ciudad_Origen`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Nombre_Terminal_Origen`,
 1 AS `Id_Pais_Destino`,
 1 AS `Nombre_Pais_Destino`,
 1 AS `Id_Ciudad_Destino`,
 1 AS `Nombre_Ciudad_Destino`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Nombre_Terminal_Destino`,
 1 AS `Id_Chofer`,
 1 AS `Nombre_Chofer`,
 1 AS `Id_Estado_Viaje`,
 1 AS `Estado`,
 1 AS `Capacidad_Personas`,
 1 AS `Boletos_Vendidos`,
 1 AS `Capacidad_Encomiendas`,
 1 AS `Encomiendas_Guiadas`,
 1 AS `Volumen_Encomiendas_Guiadas`,
 1 AS `Id_Bus`,
 1 AS `Descripcion_Bus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_viaje_compra_boleto`
--

DROP TABLE IF EXISTS `v_viaje_compra_boleto`;
/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_boleto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_viaje_compra_boleto` AS SELECT 
 1 AS `Id_Viaje`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Origen`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Destino`,
 1 AS `Numero_Asiento`,
 1 AS `Cupos_Boletos`,
 1 AS `Cupos_Volumen_Encomiendas`,
 1 AS `Id_Bus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_viaje_compra_boletos`
--

DROP TABLE IF EXISTS `v_viaje_compra_boletos`;
/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_boletos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_viaje_compra_boletos` AS SELECT 
 1 AS `Id_Viaje`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Origen`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Destino`,
 1 AS `Cupos_Boletos`,
 1 AS `Cupos_Volumen_Encomiendas`,
 1 AS `Id_Bus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_viaje_compra_encomienda`
--

DROP TABLE IF EXISTS `v_viaje_compra_encomienda`;
/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_encomienda`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_viaje_compra_encomienda` AS SELECT 
 1 AS `Id_Viaje`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Origen`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Destino`,
 1 AS `Cupos_Boletos`,
 1 AS `Cupos_Volumen_Encomiendas`,
 1 AS `Id_Bus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_viaje_compra_encomiendas`
--

DROP TABLE IF EXISTS `v_viaje_compra_encomiendas`;
/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_encomiendas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_viaje_compra_encomiendas` AS SELECT 
 1 AS `Id_Viaje`,
 1 AS `Fecha_Salida`,
 1 AS `Hora_Salida`,
 1 AS `Id_Terminal_Origen`,
 1 AS `Origen`,
 1 AS `Id_Terminal_Destino`,
 1 AS `Destino`,
 1 AS `Cupos_Boletos`,
 1 AS `Cupos_Volumen_Encomiendas`,
 1 AS `Id_Bus`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `viajes`
--

DROP TABLE IF EXISTS `viajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viajes` (
  `Id_Viaje` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Salida` date DEFAULT NULL,
  `Hora_Salida` time DEFAULT NULL,
  `Fecha_Llegada` date DEFAULT NULL,
  `Hora_Llegada` time DEFAULT NULL,
  `Id_Terminal_Origen` int(11) DEFAULT NULL,
  `Id_Terminal_Destino` int(11) DEFAULT NULL,
  `Id_Chofer` varchar(45) DEFAULT NULL,
  `Id_Bus` varchar(45) DEFAULT NULL,
  `Id_Estado_Viaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Viaje`),
  KEY `FK_Id_Terminal_Origen_Viaje_idx` (`Id_Terminal_Origen`),
  KEY `FK_Id_Terminal_Destino_Viaje_idx` (`Id_Terminal_Destino`),
  KEY `FK_Id_Chofer_Viaje_idx` (`Id_Chofer`),
  KEY `FK_Id_Bus_Viaje_idx` (`Id_Bus`),
  KEY `FK_Id_Estado_Viaje_idx` (`Id_Estado_Viaje`),
  CONSTRAINT `FK_Id_Bus_Viaje` FOREIGN KEY (`Id_Bus`) REFERENCES `buses` (`Id_Bus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Chofer_Viaje` FOREIGN KEY (`Id_Chofer`) REFERENCES `empleados` (`Id_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Estado_Viaje` FOREIGN KEY (`Id_Estado_Viaje`) REFERENCES `estados_viajes` (`Id_Estado_Viaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Destino_Viaje` FOREIGN KEY (`Id_Terminal_Destino`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Id_Terminal_Origen_Viaje` FOREIGN KEY (`Id_Terminal_Origen`) REFERENCES `terminales` (`Id_Terminal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viajes`
--

LOCK TABLES `viajes` WRITE;
/*!40000 ALTER TABLE `viajes` DISABLE KEYS */;
INSERT INTO `viajes` VALUES (10,'2023-02-27','06:30:00','2023-02-27','15:00:00',1,6,'0801-2000-10222','AED-1234',3),(11,'2023-02-28','06:30:00','2023-02-28','15:00:00',1,7,'0801-2000-10222','AED-1234',3),(12,'2023-03-01','06:30:00','2023-03-01','15:00:00',1,5,'0801-2000-10222','AED-1234',3),(13,'2023-03-02','06:30:00','2023-03-02','13:00:00',1,2,'0801-2000-10222','AED-1234',3),(14,'2023-03-05','08:00:00','2023-03-05','16:00:00',2,6,'0801-2000-10222','AED-1234',3),(15,'2023-03-13','06:00:00','2023-03-13','14:00:00',1,6,'0801-2000-10222','AED-1234',3),(16,'2023-03-14','06:00:00','2023-03-14','14:00:00',1,2,'0801-2003-10213','BC0-3132',3),(17,'2023-03-20','06:00:00','2023-03-20','15:00:00',1,6,'0801-2000-10222','AED-1234',3),(18,'2023-03-22','07:00:00','2023-03-22','15:30:00',1,5,'0801-2003-10213','BC0-3132',3),(19,'2023-03-27','06:00:00','2023-03-27','15:00:00',1,6,'0801-2000-10222','AED-1234',3),(20,'2023-03-28','07:00:00','2023-03-28','15:00:00',1,5,'0801-2003-10213','BC0-3132',3),(21,'2023-04-03','06:00:00','2023-04-03','14:00:00',1,6,'0801-2000-10222','AED-1234',3),(22,'2023-04-24','06:00:00','2023-04-24','15:00:00',1,6,'0801-2000-10222','AED-1234',1),(23,'2023-04-25','07:00:00','2023-04-25','16:00:00',1,5,'0801-2003-10213','BC0-3132',1);
/*!40000 ALTER TABLE `viajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_koming'
--

--
-- Dumping routines for database 'bd_koming'
--
/*!50003 DROP PROCEDURE IF EXISTS `Boleto_Cancelado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Boleto_Cancelado`(
	IN varIdBoleto INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdBoleto = 0 || varIdBoleto = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO MARCADO EN Boletos' AS 'ERROR';
ELSE
	UPDATE Boletos
    SET `Numero_Asiento` = 0
    WHERE Id_Boleto = varIdBoleto;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Boleto ID ', varIdBoleto,' a sido cancelado'));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Bus` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Bus`(
	IN varIdBus varchar(45),
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdBus = '' || varIdBus = NULL  THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN Buses' AS 'ERROR';
ELSE
	UPDATE Buses
    SET `Activo` = 0
    WHERE `Id_Bus` COLLATE utf8_unicode_ci = varIdBus;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de bus ID ', varIdBus));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Cliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Cliente`(
	IN varIdCliente varchar(45),
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdCliente = NULL || varIdCliente = '' THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN Clientes' AS 'ERROR';
ELSE
	UPDATE Clientes
    SET `Activo` = 0
    WHERE `Id_Cliente` COLLATE utf8_unicode_ci = varIdCliente;
    
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de cliente ID ', varIdCliente,': ', 
    (SELECT CONCAT(Nombres, ' ', Apellidos) FROM Clientes WHERE Id_Cliente COLLATE utf8_unicode_ci = varIdCliente)));
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Empleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Empleado`(
	IN varIdEmpleado varchar(45),
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdEmpleado = NULL || varIdEmpleado = '' THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN Empleados' AS 'ERROR';
ELSE
	UPDATE Empleados
    SET `Activo` = 0
    WHERE `Id_Empleado` COLLATE utf8_unicode_ci = varIdEmpleado;
    
    UPDATE Usuarios
    SET `Activo` = 0
    WHERE `Id_Empleado` COLLATE utf8_unicode_ci = varIdEmpleado;
    
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de empleado ID ', varIdEmpleado,': ', 
    (SELECT CONCAT(Nombres, ' ', Apellidos) FROM Empleados WHERE Id_Empleado COLLATE utf8_unicode_ci = varIdEmpleado)));
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Tarifa_Boleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Tarifa_Boleto`(
	IN varIdTarifa INT,
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 IF varIdTarifa = 0 || varIdTarifa = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN TARIFAS DE Boletos' AS 'ERROR';
ELSE
	UPDATE Tarifas_Boletos
	SET `Activo` = 0
	WHERE `Id_Tarifa` = varIdTarifa;
    
    -- Reajuste --
    UPDATE Tarifas_Boletos
	SET `Activo` = 0
	WHERE `Id_Tarifa` = (varIdTarifa + 1);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de tarifa de Boletos ID ', varIdTarifa));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Tarifa_Encomienda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Tarifa_Encomienda`(
	IN varIdTarifa INT,
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 IF varIdTarifa = 0 || varIdTarifa = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN TARIFAS DE Encomiendas' AS 'ERROR';
ELSE
	UPDATE Tarifas_Encomiendas
	SET `Activo` = 0
	WHERE `Id_Tarifa` = varIdTarifa;
    
    -- Reajuste --
    UPDATE Tarifas_Encomiendas
	SET `Activo` = 0
	WHERE `Id_Tarifa` = (varIdTarifa + 1);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de tarifa de Encomiendas ID ', varIdTarifa));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Usuario`(
	IN varIdUsuario varchar(45),
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdUsuario = '' || varIdUsuario = NULL THEN
 SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN Usuarios' AS 'ERROR';
ELSE
	UPDATE Usuarios
    SET `Activo` = 0,
        `Ultima_Fecha_Actualizacion` = CURDATE()
    WHERE `Id_Usuario` COLLATE utf8_unicode_ci = varIdUsuario;

    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de usuario ID ', varIdUsuario));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Deactivate_Viaje` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Deactivate_Viaje`(
	IN varIdViaje INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdViaje = '' || varIdViaje = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO DESACTIVADO EN Viajes' AS 'ERROR';
ELSE
	UPDATE Viajes
    SET `Id_Estado_Viaje` = 4
    WHERE `Id_Viaje` = varIdViaje;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Desactivación de viaje ID ', varIdViaje));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Desmarcar_Encomienda_Reclamada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Desmarcar_Encomienda_Reclamada`(
	IN varIdGuia INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdGuia = 0 || varIdGuia = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO MARCADO EN Encomiendas' AS 'ERROR';
ELSE
	UPDATE Encomiendas
    SET `Reclamada` = 0
    WHERE Id_Guia = varIdGuia;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Encomienda ID ', varIdGuia,' marcada como no reclamada'));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Bitacora` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Bitacora`(
	IN varIdUsuario varchar(45), 
	IN varDetalle TEXT
)
BEGIN
 IF varIdUsuario = '' || varIdUsuario = NULL || varDetalle = '' || varDetalle = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Bitacora' AS 'ERROR';
ELSE
	INSERT INTO Bitacora (`Id_Usuario`, `Fecha`, `Hora`, `Detalle`)
    VALUES(varIdUsuario, CURDATE(), CURTIME(),  varDetalle);
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Bus` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Bus`(
	IN varIdBus varchar(45),
	IN varMarca varchar(45),
    IN varModelo varchar(45),
	IN varColor varchar(45),
    IN varCapacidadPersonas INT,
    IN varCapacidadEncomiendas INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdBus = '' || varIdBus = NULL || varMarca = '' || varMarca = NULL || varModelo = '' || varModelo = NULL  ||
	varColor = '' || varColor = NULL || varCapacidadPersonas = 0 || varCapacidadPersonas = NULL || varCapacidadEncomiendas = 0 || varCapacidadEncomiendas = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Buses' AS 'ERROR';
ELSE
	INSERT INTO Buses (`Id_Bus`, `Marca`, `Modelo`, `Color`, `Capacidad_Personas`, `Capacidad_Encomiendas`, `Activo`)
    VALUES(varIdBus, varMarca, varModelo, varColor, varCapacidadPersonas, varCapacidadEncomiendas, 1);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nuevo bus ID ', varIdBus,' marca: ', varMarca));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Cliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Cliente`(
	IN varIdCliente varchar(45),
	IN varNombres varchar(45),
    IN varApellidos varchar(45),
    IN varFechaNacimiento DATE,
    IN varTelefono varchar(45),
    IN varCorreo varchar(45),
    IN varIdGenero INT,
    IN varDireccion TEXT,
    IN varIdTerminal INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdCliente = NULL || varIdCliente = '' || varNombres = '' || varNombres = NULL || varApellidos = '' || varApellidos = NULL || 
    varFechaNacimiento = '' || varFechaNacimiento = NULL || varIdGenero = 0 || varIdGenero = NULL || varIdTerminal = 0 || varIdTerminal = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Clientes' AS 'ERROR';
 ELSE
 
	INSERT INTO Clientes (`Id_Cliente`, `Nombres`, `Apellidos`, `Fecha_Registro`, `Fecha_Nacimiento`, `Telefono`, `Correo`,`Id_Genero`, `Direccion`, `Id_Terminal`, `Activo`)
    VALUES(varIdCliente, varNombres, varApellidos, CURDATE(), varFechaNacimiento, varTelefono, varCorreo, varIdGenero, varDireccion, varIdTerminal, 1);
	
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nuevo cliente ID ', varIdCliente,': ', varNombres, ' ', varApellidos));
 END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Empleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Empleado`(
	IN varIdEmpleado varchar(45),
	IN varNombres varchar(45),
    IN varApellidos varchar(45),
	IN varFechaNacimiento DATE, 
    IN varFechaContratacion DATE,
    IN varFechaFinalizacion DATE,
    IN varTelefono varchar(45),
    IN varCorreo varchar(45),
    IN varCargo INT,
    IN varReportaA varchar(45),
    IN varIdGenero INT,
    IN varDireccion TEXT,
    IN varIdTerminal INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdEmpleado = NULL || varIdEmpleado = '' || varNombres = '' || varNombres = NULL || varApellidos = '' || varApellidos = NULL || 
    varFechaNacimiento = '' || varFechaNacimiento = NULL || varFechaContratacion = '' || varFechaContratacion = NULL || varCargo = 0 || 
    varCargo = NULL || varIdGenero = 0 || varIdGenero = NULL || varIdTerminal = 0 || varIdTerminal = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Empleados' AS 'ERROR';
 ELSE
	IF varReportaA = '' THEN
		SET varReportaA = NULL;
    END IF;
 
	INSERT INTO Empleados (`Id_Empleado`, `Nombres`, `Apellidos`, `Fecha_Nacimiento`, `Fecha_Contratacion`, 
						   `Fecha_Finalizacion_Contrato`, `Telefono`, `Correo`, `Id_Cargo`, `Reporta_A`, `Id_Genero`, `Direccion`, `Id_Terminal`, `Activo`)
    VALUES(varIdEmpleado, varNombres, varApellidos, varFechaNacimiento, varFechaContratacion, varFechaFinalizacion, varTelefono, varCorreo,
		   varCargo, varReportaA, varIdGenero, varDireccion, varIdTerminal, 1);
	
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nuevo empleado ID ', varIdEmpleado,': ', varNombres, ' ', varApellidos));
 END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Tarifa_Boleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Tarifa_Boleto`(
	IN varDescripcion TEXT, 
    IN varIdOrigen INT, 
    IN varIdDestino INT, 
	IN varPrecio DECIMAL(9,2),
    IN varPorcentajeReajuste DECIMAL(6,5),
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 DECLARE idTarifa INT DEFAULT 0;
 IF varDescripcion = '' || varDescripcion = NULL || varIdOrigen = 0 || varIdOrigen = NULL || varIdDestino = '' || varIdDestino = NULL || varPrecio = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN TARIFAS DE Boletos' AS 'ERROR';
ELSE
	INSERT INTO Tarifas_Boletos (`Descripcion`, `Id_Terminal_Origen`, `Id_Terminal_Destino`, `Activo`)
    VALUES(varDescripcion, varIdOrigen, varIdDestino, 1);
    SET idTarifa = (SELECT DISTINCT LAST_INSERT_ID() FROM Tarifas_Boletos);
    INSERT INTO Historico_Precios_Tarifas_Boletos (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
    VALUES(idTarifa, varPrecio, CURRENT_TIMESTAMP(), NULL);
    
    -- Reajuste --
    INSERT INTO Tarifas_Boletos (`Descripcion`, `Id_Terminal_Origen`, `Id_Terminal_Destino`, `Activo`)
    VALUES ('Tarifa de Reajuste', varIdOrigen, varIdDestino, 1);
    SET idTarifa = (SELECT DISTINCT LAST_INSERT_ID() FROM Tarifas_Boletos);
    INSERT INTO Historico_Precios_Tarifas_Boletos (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
    VALUES(idTarifa, (varPrecio * varPorcentajeReajuste), CURRENT_TIMESTAMP(), NULL);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nueva tarifa de Boletos: ', LAST_INSERT_ID(),': ', varDescripcion, ', con valor de: ', varPrecio));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Tarifa_Encomienda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Tarifa_Encomienda`(
	IN varVolumen INT,
	IN varDescripcion TEXT, 
    IN varIdOrigen INT, 
    IN varIdDestino INT, 
	IN varPrecio DECIMAL(9,2),
    IN varPorcentajeReajuste DECIMAL(6,5),
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 DECLARE idTarifa INT DEFAULT 0;
 IF varVolumen = 0 || varVolumen = NULL || varDescripcion = '' || varDescripcion = NULL || varIdOrigen = 0 || varIdOrigen = NULL || varIdDestino = '' || 
	varIdDestino = NULL || varPrecio = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN TARIFAS DE Encomiendas' AS 'ERROR';
ELSE
	INSERT INTO Tarifas_Encomiendas (`Volumen`, `Descripcion`, `Id_Terminal_Origen`, `Id_Terminal_Destino`, `Activo`)
    VALUES(varVolumen, varDescripcion, varIdOrigen, varIdDestino, 1);
    SET idTarifa = (SELECT DISTINCT LAST_INSERT_ID() FROM Tarifas_Encomiendas);
    INSERT INTO Historico_Precios_Tarifas_Encomiendas (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
    VALUES(idTarifa, varPrecio, CURRENT_TIMESTAMP(), NULL);
    
    -- Reajuste --
    INSERT INTO Tarifas_Encomiendas (`Volumen`, `Descripcion`, `Id_Terminal_Origen`, `Id_Terminal_Destino`, `Activo`)
    VALUES(varVolumen, 'Tarifa de Reajuste', varIdOrigen, varIdDestino, 1);
    SET idTarifa = (SELECT DISTINCT LAST_INSERT_ID() FROM Tarifas_Encomiendas);
    INSERT INTO Historico_Precios_Tarifas_Encomiendas (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
    VALUES(idTarifa, (varPrecio * varPorcentajeReajuste), CURRENT_TIMESTAMP(), NULL);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nueva tarifa de Encomiendas: ', LAST_INSERT_ID(),': ', varDescripcion, ', con valor de: ', varPrecio));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Usuario`(
	IN varIdUsuario varchar(45),
	IN varIdEmpleado varchar(45),
    IN varClave varchar(255),
    IN varAdministrador TINYINT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdUsuario = '' || varIdUsuario = NULL || varIdEmpleado = '' || varIdEmpleado = NULL || varClave = '' || varClave = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Usuarios' AS 'ERROR';
ELSE
	INSERT INTO Usuarios (`Id_Usuario`, `Id_Empleado`, `Clave`, `Fecha_Registro`, `Ultima_Fecha_Actualizacion`, `Administrador`, `Activo`, `Clave_Cambiada`)
    VALUES(varIdUsuario, varIdEmpleado, varClave, CURDATE(), CURDATE(), varAdministrador, 1, 0);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nuevo usuario ID ', varIdUsuario,' para empleado ID: ', varIdEmpleado));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Viaje` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Viaje`(
	IN varFechaSalida DATE,
	IN varHoraSalida TIME,
    IN varFechaLlegada DATE,
	IN varHoraLlegada TIME,
    IN varIdOrigen INT,
    IN varIdDestino INT,
    IN varIdChofer varchar(45),
    IN varIdBus varchar(45),
    IN varIdEstado INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varFechaSalida = '' || varFechaSalida = NULL || varHoraSalida = '' || varHoraSalida = NULL || varFechaLlegada = '' || varFechaLlegada = NULL  ||
	varHoraLlegada = '' || varHoraLlegada = NULL || varIdOrigen = 0 || varIdOrigen = NULL || varIdDestino = 0 || varIdDestino = NULL ||
    varIdChofer = '' || varIdChofer = NULL || varIdBus = '' || varIdBus = NULL || varIdEstado = 0 || varIdEstado = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Viajes' AS 'ERROR';
ELSE
	INSERT INTO Viajes (`Fecha_Salida`, `Hora_Salida`, `Fecha_Llegada`, `Hora_Llegada`, `Id_Terminal_Origen`, `Id_Terminal_Destino`, `Id_Chofer`, `Id_Bus`, `Id_Estado_Viaje`)
    VALUES(varFechaSalida, varHoraSalida, varFechaLlegada, varHoraLlegada, varIdOrigen, varIdDestino, varIdChofer, varIdBus, varIdEstado);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Inserción de nuevo viaje ID ', LAST_INSERT_ID(),' en bus: ', varIdBus));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Marcar_Encomienda_Reclamada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Marcar_Encomienda_Reclamada`(
	IN varIdGuia INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdGuia = 0 || varIdGuia = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO MARCADO EN Encomiendas' AS 'ERROR';
ELSE
	UPDATE Encomiendas
    SET `Reclamada` = 1
    WHERE Id_Guia = varIdGuia;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Encomienda ID ', varIdGuia,' marcada como reclamada'));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Boleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Boleto`(
	IN varIdBoleto INT,
    IN varNumAsiento INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdBoleto = 0 || varIdBoleto = NULL || varNumAsiento = 0 || varNumAsiento = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO MARCADO EN Boletos' AS 'ERROR';
ELSE
	UPDATE Boletos
    SET `Numero_Asiento` = varNumAsiento
    WHERE Id_Boleto = varIdBoleto;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización del boleto ID ', varIdBoleto));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Bus` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Bus`(
	IN varIdBus varchar(45),
	IN varMarca varchar(45),
    IN varModelo varchar(45),
	IN varColor varchar(45),
    IN varCapacidadPersonas INT,
    IN varCapacidadEncomiendas INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdBus = '' || varIdBus = NULL || varMarca = '' || varMarca = NULL || varModelo = '' || varModelo = NULL  ||
	varColor = '' || varColor = NULL || varCapacidadPersonas = 0 || varCapacidadPersonas = NULL || varCapacidadEncomiendas = 0 || varCapacidadEncomiendas = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN Buses' AS 'ERROR';
ELSE
	UPDATE Buses
    SET `Marca` = varMarca,
		`Modelo` = varModelo,
		`Color` = varColor,
        `Capacidad_Personas` = varCapacidadPersonas,
        `Capacidad_Encomiendas` = varCapacidadEncomiendas,
        `Activo` = 1
    WHERE `Id_Bus` COLLATE utf8_unicode_ci = varIdBus;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de bus ID ', varIdBus));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Cliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Cliente`(
	IN varIdCliente varchar(45),
	IN varNombres varchar(45),
    IN varApellidos varchar(45),
    IN varFechaNacimiento DATE,
    IN varTelefono varchar(45),
    IN varCorreo varchar(45),
    IN varIdGenero INT,
    IN varDireccion TEXT,
    IN varIdTerminal INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdCliente = NULL || varIdCliente = '' || varNombres = '' || varNombres = NULL || varApellidos = '' || varApellidos = NULL || 
    varFechaNacimiento = '' || varFechaNacimiento = NULL || varIdGenero = 0 || varIdGenero = NULL || varIdTerminal = 0 || varIdTerminal = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN Clientes' AS 'ERROR';
ELSE
	UPDATE Clientes
    SET `Nombres` = varNombres,
		`Apellidos` = varApellidos,
		`Fecha_Nacimiento` = varFechaNacimiento,
        `Telefono` = varTelefono,
        `Correo` = varCorreo,
		`Id_Genero` = varIdGenero,
		`Direccion` = varDireccion,
		`Id_Terminal` = varIdTerminal,
		`Activo` = 1
	WHERE `Id_Cliente` COLLATE utf8_unicode_ci = varIdCliente;
    
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de cliente ID ', varIdCliente,': ', varNombres, ' ', varApellidos));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Empleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Empleado`(
	IN varIdEmpleado varchar(45),
	IN varNombres varchar(45),
    IN varApellidos varchar(45),
	IN varFechaNacimiento DATE, 
    IN varFechaContratacion DATE,
    IN varFechaFinalizacion DATE,
    IN varTelefono varchar(45),
    IN varCorreo varchar(45),
    IN varCargo INT,
    IN varReportaA varchar(45),
    IN varIdGenero INT,
    IN varDireccion TEXT,
    IN varIdTerminal INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdEmpleado = NULL || varIdEmpleado = '' || varNombres = '' || varNombres = NULL || varApellidos = '' || varApellidos = NULL || 
    varFechaNacimiento = '' || varFechaNacimiento = NULL || varFechaContratacion = '' || varFechaContratacion = NULL || varCargo = 0 || 
    varCargo = NULL || varIdGenero = 0 || varIdGenero = NULL || varIdTerminal = 0 || varIdTerminal = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN Empleados' AS 'ERROR';
ELSE
	IF varReportaA = '' THEN
		SET varReportaA = NULL;
    END IF;
    
	UPDATE Empleados
    SET `Nombres` = varNombres,
		`Apellidos` = varApellidos,
		`Fecha_Nacimiento` = varFechaNacimiento,
		`Fecha_Contratacion` = varFechaContratacion,
		`Fecha_Finalizacion_Contrato` = varFechaFinalizacion,
        `Telefono` = varTelefono,
        `Correo` = varCorreo,
		`Id_Cargo` = varCargo,
		`Reporta_A` = varReportaA,
		`Id_Genero` = varIdGenero,
		`Direccion` = varDireccion,
		`Id_Terminal` = varIdTerminal,
		`Activo` = 1
	WHERE `Id_Empleado` COLLATE utf8_unicode_ci = varIdEmpleado;
    
	CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de empleado ID ', varIdEmpleado,': ', varNombres, ' ', varApellidos));
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Tarifa_Boleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Tarifa_Boleto`(
	IN varIdTarifa INT,
	IN varDescripcion TEXT,
	IN varPrecio DECIMAL(9,2),
    IN varPorcentajeReajuste DECIMAL(6,5),
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 IF varIdTarifa = 0 || varIdTarifa = NULL || varDescripcion = '' || varDescripcion = NULL || varPrecio = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN TARIFAS DE Boletos' AS 'ERROR';
ELSE
	UPDATE Tarifas_Boletos
    SET `Descripcion` = varDescripcion,
        `Activo` = 1
    WHERE `Id_Tarifa` = varIdTarifa;

	-- Reajuste --
    UPDATE Tarifas_Boletos
    SET `Activo` = 1
    WHERE `Id_Tarifa` = (varIdTarifa + 1);
    
	IF varPrecio <> (SELECT Precio FROM Historico_Precios_Tarifas_Boletos WHERE Id_Tarifa = varIdTarifa AND Fecha_Fin IS NULL) THEN
		UPDATE Historico_Precios_Tarifas_Boletos
		SET `Fecha_Fin` = CURRENT_TIMESTAMP()
		WHERE `Id_Tarifa` = varIdTarifa AND Fecha_Fin IS NULL;
        
        INSERT INTO Historico_Precios_Tarifas_Boletos (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
		VALUES(varIdTarifa, varPrecio, CURRENT_TIMESTAMP(), NULL);
        
        CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de tarifa de boleto ', varIdTarifa, ': ', varDescripcion, ', con nuevo valor de: ', varPrecio));
	ELSE
		CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de tarifa de boleto ', varIdTarifa, ': ', varDescripcion));
	END IF;
    
    -- Reajuste --
    IF (varPrecio * varPorcentajeReajuste) <> (SELECT Precio FROM Historico_Precios_Tarifas_Boletos WHERE Id_Tarifa = (varIdTarifa + 1) AND Fecha_Fin IS NULL) THEN
		UPDATE Historico_Precios_Tarifas_Boletos
		SET `Fecha_Fin` = CURRENT_TIMESTAMP()
		WHERE `Id_Tarifa` = (varIdTarifa + 1) AND Fecha_Fin IS NULL;
		
		INSERT INTO Historico_Precios_Tarifas_Boletos (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
		VALUES((varIdTarifa + 1), (varPrecio * varPorcentajeReajuste), CURRENT_TIMESTAMP(), NULL);
	END IF;
    
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Tarifa_Encomienda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Tarifa_Encomienda`(
	IN varIdTarifa INT,
	IN varDescripcion TEXT,
	IN varPrecio DECIMAL(9,2),
    IN varPorcentajeReajuste DECIMAL(6,5),
    IN varUsuarioActual VARCHAR(45)
)
BEGIN
 IF varIdTarifa = 0 || varIdTarifa = NULL || varDescripcion = '' || varDescripcion = NULL || varPrecio = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN TARIFAS DE Encomiendas' AS 'ERROR';
ELSE
	UPDATE Tarifas_Encomiendas
    SET `Descripcion` = varDescripcion,
        `Activo` = 1
    WHERE `Id_Tarifa` = varIdTarifa;

	-- Reajuste --
    UPDATE Tarifas_Encomiendas
    SET `Activo` = 1
    WHERE `Id_Tarifa` = (varIdTarifa + 1);

	IF varPrecio <> (SELECT Precio FROM Historico_Precios_Tarifas_Encomiendas WHERE Id_Tarifa = varIdTarifa AND Fecha_Fin IS NULL) THEN
		UPDATE Historico_Precios_Tarifas_Encomiendas
		SET `Fecha_Fin` = CURRENT_TIMESTAMP()
		WHERE `Id_Tarifa` = varIdTarifa AND Fecha_Fin IS NULL;
		
		INSERT INTO Historico_Precios_Tarifas_Encomiendas (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
		VALUES(varIdTarifa, varPrecio, CURRENT_TIMESTAMP(), NULL);
        
        CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de tarifa de encomienda ', varIdTarifa, ': ', varDescripcion, ', con nuevo valor de: ', varPrecio));
	ELSE
		CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de tarifa de encomienda ', varIdTarifa, ': ', varDescripcion));
	END IF;
    
    -- Reajuste --
    IF (varPrecio * varPorcentajeReajuste) <> (SELECT Precio FROM Historico_Precios_Tarifas_Encomiendas WHERE Id_Tarifa = (varIdTarifa + 1) AND Fecha_Fin IS NULL) THEN
		UPDATE Historico_Precios_Tarifas_Encomiendas
		SET `Fecha_Fin` = CURRENT_TIMESTAMP()
		WHERE `Id_Tarifa` = (varIdTarifa + 1) AND Fecha_Fin IS NULL;
		
		INSERT INTO Historico_Precios_Tarifas_Encomiendas (`Id_Tarifa`, `Precio`, `Fecha_Inicio`, `Fecha_Fin`)
		VALUES((varIdTarifa + 1), (varPrecio * varPorcentajeReajuste), CURRENT_TIMESTAMP(), NULL);
	END IF;
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Usuario`(
	IN varIdUsuario varchar(45),
    IN varClave varchar(255),
    IN varAdministrador TINYINT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdUsuario = '' || varIdUsuario = NULL || varClave = '' || varClave = NULL THEN
 SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN Usuarios' AS 'ERROR';
ELSE
	UPDATE Usuarios
    SET `Clave` = varClave,
		`Ultima_Fecha_Actualizacion` = CURDATE(),
		`Administrador` = varAdministrador,
        `Activo` = 1
    WHERE `Id_Usuario` COLLATE utf8_unicode_ci = varIdUsuario;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de usuario ID ', varIdUsuario));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Viaje` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Viaje`(
	IN varIdViaje INT,
    IN varIdChofer varchar(45),
    IN varIdBus varchar(45),
    IN varIdEstado INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdChofer = '' || varIdChofer = NULL || varIdBus = '' || varIdBus = NULL || varIdEstado = 0 || varIdEstado = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO ACTUALIZADO EN Viajes' AS 'ERROR';
ELSE
	UPDATE Viajes
    SET `Id_Chofer` = varIdChofer,
        `Id_Bus` = varIdBus,
        `Id_Estado_Viaje` = varIdEstado
    WHERE `Id_Viaje` = varIdViaje;
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Actualización de viaje ID ', varIdViaje,' en bus: ', varIdBus));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Vender_Boleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Vender_Boleto`(
    IN varIdCliente varchar(45),
    IN varNumAsiento INT,
    IN varIdViaje INT,
    IN varIdTarifa INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varIdCliente = '' || varIdCliente = NULL || varIdViaje = 0 || varIdViaje = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Boletos' AS 'ERROR';
ELSE
	INSERT INTO Boletos (`Fecha_Compra`, `Hora_Compra`, `Numero_Asiento`, `Id_Usuario`, `Id_Cliente`, `Id_Viaje`, `Id_Tarifa`)
    VALUES(CURDATE(), CURRENT_TIME(), varNumAsiento, varUsuarioActual, varIdCliente, varIdViaje, varIdTarifa);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Venta de boleto ID ', LAST_INSERT_ID(),' en viaje: ', varIdViaje));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Vender_Guia_Encomienda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Vender_Guia_Encomienda`(
	IN varVolumen INT,
    IN varIdEmisor varchar(45),
    IN varIdReceptor varchar(45),
    IN varIdViaje INT,
    IN varIdTarifa INT,
    IN varUsuarioActual varchar(45)
)
BEGIN
 IF varVolumen = 0 || varVolumen = NULL || varIdEmisor = '' || varIdEmisor = NULL || 
	varIdReceptor = '' || varIdReceptor = NULL || varIdViaje = 0 || varIdViaje = NULL THEN
	SELECT 'LOS PARAMETROS NO PUEDEN SER NULOS - NO INSERTADO EN Encomiendas' AS 'ERROR';
ELSE
	INSERT INTO Encomiendas (`Volumen`, `Fecha_Envio`, `Hora_Envio`, `Id_Usuario`, `Id_Emisor`, `Id_Receptor`, `Id_Viaje`, `Id_Tarifa`, `Reclamada`)
    VALUES(varVolumen, CURDATE(), CURRENT_TIME(), varUsuarioActual, varIdEmisor, varIdReceptor, varIdViaje, varIdTarifa, 0);
    
    CALL Insert_Bitacora(varUsuarioActual, CONCAT('Venta de encomienda ID ', LAST_INSERT_ID(),' en viaje: ', varIdViaje));  
END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `v_bitacora`
--

/*!50001 DROP VIEW IF EXISTS `v_bitacora`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bitacora` AS select `bitacora`.`Id_Registro` AS `Id_Registro`,`bitacora`.`Id_Usuario` AS `Id_Usuario`,`bitacora`.`Fecha` AS `Fecha`,`bitacora`.`Hora` AS `Hora`,`bitacora`.`Detalle` AS `Detalle` from `bitacora` order by `bitacora`.`Id_Registro` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_boleto`
--

/*!50001 DROP VIEW IF EXISTS `v_boleto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_boleto` AS select `bo`.`Id_Boleto` AS `Id_Boleto`,`bo`.`Fecha_Compra` AS `Fecha_Compra`,`bo`.`Hora_Compra` AS `Hora_Compra`,`bo`.`Numero_Asiento` AS `Numero_Asiento`,`u`.`Id_Empleado` AS `Id_Empleado`,`bo`.`Id_Cliente` AS `Id_Cliente`,concat(`cl`.`Nombres`,' ',`cl`.`Apellidos`) AS `Nombre`,`cl`.`Correo` AS `Correo`,`bo`.`Id_Viaje` AS `Id_Viaje`,`p1`.`Id_Pais` AS `Id_Pais_Origen`,`p1`.`Nombre_Pais` AS `Nombre_Pais_Origen`,`d1`.`Id_Ciudad` AS `Id_Ciudad_Origen`,`d1`.`Nombre_Ciudad` AS `Nombre_Ciudad_Origen`,`v`.`Id_Terminal_Origen` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Nombre_Terminal_Origen`,`p2`.`Id_Pais` AS `Id_Pais_Destino`,`p2`.`Nombre_Pais` AS `Nombre_Pais_Destino`,`d2`.`Id_Ciudad` AS `Id_Ciudad_Destino`,`d2`.`Nombre_Ciudad` AS `Nombre_Ciudad_Destino`,`v`.`Id_Terminal_Destino` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Nombre_Terminal_Destino`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`v`.`Fecha_Llegada` AS `Fecha_Llegada`,`v`.`Hora_Llegada` AS `Hora_Llegada`,`b`.`Id_Bus` AS `Id_Bus`,`bo`.`Id_Tarifa` AS `Id_Tarifa`,(select `hptb`.`Precio` from `historico_precios_tarifas_boletos` `hptb` where ((`hptb`.`Id_Tarifa` = `bo`.`Id_Tarifa`) and (concat(`bo`.`Fecha_Compra`,' ',`bo`.`Hora_Compra`) >= `hptb`.`Fecha_Inicio`) and (concat(`bo`.`Fecha_Compra`,' ',`bo`.`Hora_Compra`) <= ifnull(`hptb`.`Fecha_Fin`,concat(`bo`.`Fecha_Compra`,' ',`bo`.`Hora_Compra`))))) AS `Precio` from ((((((((((`boletos` `bo` join `viajes` `v` on((`bo`.`Id_Viaje` = `v`.`Id_Viaje`))) join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) join `usuarios` `u` on((`u`.`Id_Usuario` = `bo`.`Id_Usuario`))) join `clientes` `cl` on((`cl`.`Id_Cliente` = `bo`.`Id_Cliente`))) order by `bo`.`Id_Boleto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_buses`
--

/*!50001 DROP VIEW IF EXISTS `v_buses`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_buses` AS select `buses`.`Id_Bus` AS `Id_Bus`,`buses`.`Marca` AS `Marca`,`buses`.`Modelo` AS `Modelo`,`buses`.`Color` AS `Color`,`buses`.`Capacidad_Personas` AS `Capacidad_Personas`,`buses`.`Capacidad_Encomiendas` AS `Capacidad_Encomiendas`,`buses`.`Activo` AS `Activo` from `buses` order by `buses`.`Id_Bus` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_cliente`
--

/*!50001 DROP VIEW IF EXISTS `v_cliente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_cliente` AS select `c`.`Id_Cliente` AS `Id_Cliente`,`c`.`Nombres` AS `Nombres`,`c`.`Apellidos` AS `Apellidos`,`c`.`Fecha_Registro` AS `Fecha_Registro`,`c`.`Fecha_Nacimiento` AS `Fecha_Nacimiento`,`c`.`Telefono` AS `Telefono`,`c`.`Correo` AS `Correo`,`c`.`Id_Genero` AS `Id_Genero`,`c`.`Direccion` AS `Direccion`,`p`.`Id_Pais` AS `Id_Pais`,`d`.`Id_Ciudad` AS `Id_Ciudad`,`c`.`Id_Terminal` AS `Id_Terminal`,`c`.`Activo` AS `Activo` from (((`clientes` `c` join `terminales` `ci` on((`c`.`Id_Terminal` = `ci`.`Id_Terminal`))) join `ciudades` `d` on((`ci`.`Id_Ciudad` = `d`.`Id_Ciudad`))) join `paises` `p` on((`d`.`Id_Pais` = `p`.`Id_Pais`))) order by `c`.`Id_Cliente` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_empleado`
--

/*!50001 DROP VIEW IF EXISTS `v_empleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_empleado` AS select `e`.`Id_Empleado` AS `Id_Empleado`,`e`.`Nombres` AS `Nombres`,`e`.`Apellidos` AS `Apellidos`,`e`.`Fecha_Nacimiento` AS `Fecha_Nacimiento`,`e`.`Fecha_Contratacion` AS `Fecha_Contratacion`,`e`.`Fecha_Finalizacion_Contrato` AS `Fecha_Finalizacion_Contrato`,`e`.`Telefono` AS `Telefono`,`e`.`Correo` AS `Correo`,`e`.`Id_Cargo` AS `Id_Cargo`,ifnull(`e`.`Reporta_A`,'') AS `Reporta_A`,`e`.`Id_Genero` AS `Id_Genero`,`e`.`Direccion` AS `Direccion`,`p`.`Id_Pais` AS `Id_Pais`,`d`.`Id_Ciudad` AS `Id_Ciudad`,`e`.`Id_Terminal` AS `Id_Terminal`,`e`.`Activo` AS `Activo` from (((`empleados` `e` join `terminales` `ci` on((`e`.`Id_Terminal` = `ci`.`Id_Terminal`))) join `ciudades` `d` on((`ci`.`Id_Ciudad` = `d`.`Id_Ciudad`))) join `paises` `p` on((`d`.`Id_Pais` = `p`.`Id_Pais`))) order by `e`.`Id_Empleado` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_encomienda`
--

/*!50001 DROP VIEW IF EXISTS `v_encomienda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_encomienda` AS select `e`.`Id_Guia` AS `Id_Guia`,`e`.`Volumen` AS `Volumen`,`e`.`Fecha_Envio` AS `Fecha_Envio`,`e`.`Hora_Envio` AS `Hora_Envio`,`u`.`Id_Empleado` AS `Id_Empleado`,`e`.`Id_Emisor` AS `Id_Emisor`,concat(`cl1`.`Nombres`,' ',`cl1`.`Apellidos`) AS `Nombre_Emisor`,`cl1`.`Correo` AS `Correo_Emisor`,`e`.`Id_Receptor` AS `Id_Receptor`,concat(`cl2`.`Nombres`,' ',`cl2`.`Apellidos`) AS `Nombre_Receptor`,`cl2`.`Correo` AS `Correo_Receptor`,`e`.`Id_Viaje` AS `Id_Viaje`,`p1`.`Id_Pais` AS `Id_Pais_Origen`,`p1`.`Nombre_Pais` AS `Nombre_Pais_Origen`,`d1`.`Id_Ciudad` AS `Id_Ciudad_Origen`,`d1`.`Nombre_Ciudad` AS `Nombre_Ciudad_Origen`,`v`.`Id_Terminal_Origen` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Nombre_Terminal_Origen`,`p2`.`Id_Pais` AS `Id_Pais_Destino`,`p2`.`Nombre_Pais` AS `Nombre_Pais_Destino`,`d2`.`Id_Ciudad` AS `Id_Ciudad_Destino`,`d2`.`Nombre_Ciudad` AS `Nombre_Ciudad_Destino`,`v`.`Id_Terminal_Destino` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Nombre_Terminal_Destino`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`v`.`Fecha_Llegada` AS `Fecha_Llegada`,`v`.`Hora_Llegada` AS `Hora_Llegada`,`b`.`Id_Bus` AS `Id_Bus`,`e`.`Id_Tarifa` AS `Id_Tarifa`,(select `hpte`.`Precio` from `historico_precios_tarifas_encomiendas` `hpte` where ((`hpte`.`Id_Tarifa` = `e`.`Id_Tarifa`) and (concat(`e`.`Fecha_Envio`,' ',`e`.`Hora_Envio`) >= `hpte`.`Fecha_Inicio`) and (concat(`e`.`Fecha_Envio`,' ',`e`.`Hora_Envio`) <= ifnull(`hpte`.`Fecha_Fin`,concat(`e`.`Fecha_Envio`,' ',`e`.`Hora_Envio`))))) AS `Precio`,`e`.`Reclamada` AS `Reclamada` from (((((((((((`encomiendas` `e` join `viajes` `v` on((`e`.`Id_Viaje` = `v`.`Id_Viaje`))) join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) join `usuarios` `u` on((`u`.`Id_Usuario` = `e`.`Id_Usuario`))) join `clientes` `cl1` on((`cl1`.`Id_Cliente` = `e`.`Id_Emisor`))) join `clientes` `cl2` on((`cl2`.`Id_Cliente` = `e`.`Id_Receptor`))) order by `e`.`Id_Guia` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_tarifas_boletos`
--

/*!50001 DROP VIEW IF EXISTS `v_tarifas_boletos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tarifas_boletos` AS select `tb`.`Id_Tarifa` AS `Id_Tarifa`,`tb`.`Descripcion` AS `Descripcion`,`p1`.`Id_Pais` AS `Id_Pais_Origen`,`d1`.`Id_Ciudad` AS `Id_Ciudad_Origen`,`tb`.`Id_Terminal_Origen` AS `Id_Terminal_Origen`,`p2`.`Id_Pais` AS `Id_Pais_Destino`,`d2`.`Id_Ciudad` AS `Id_Ciudad_Destino`,`tb`.`Id_Terminal_Destino` AS `Id_Terminal_Destino`,`hptb`.`Precio` AS `Precio`,((select `historico_precios_tarifas_boletos`.`Precio` from `historico_precios_tarifas_boletos` where ((`historico_precios_tarifas_boletos`.`Id_Tarifa` = (`tb`.`Id_Tarifa` + 1)) and isnull(`historico_precios_tarifas_boletos`.`Fecha_Fin`))) / `hptb`.`Precio`) AS `Porcentaje_Reajuste`,`tb`.`Activo` AS `Activo` from (((((((`tarifas_boletos` `tb` join `historico_precios_tarifas_boletos` `hptb` on((`tb`.`Id_Tarifa` = `hptb`.`Id_Tarifa`))) join `terminales` `ci1` on((`tb`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`tb`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) where (isnull(`hptb`.`Fecha_Fin`) and ((`tb`.`Id_Tarifa` % 2) <> 0)) order by `tb`.`Id_Tarifa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_tarifas_encomiendas`
--

/*!50001 DROP VIEW IF EXISTS `v_tarifas_encomiendas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tarifas_encomiendas` AS select `te`.`Id_Tarifa` AS `Id_Tarifa`,`te`.`Volumen` AS `Volumen`,`te`.`Descripcion` AS `Descripcion`,`p1`.`Id_Pais` AS `Id_Pais_Origen`,`d1`.`Id_Ciudad` AS `Id_Ciudad_Origen`,`te`.`Id_Terminal_Origen` AS `Id_Terminal_Origen`,`p2`.`Id_Pais` AS `Id_Pais_Destino`,`d2`.`Id_Ciudad` AS `Id_Ciudad_Destino`,`te`.`Id_Terminal_Destino` AS `Id_Terminal_Destino`,`hpte`.`Precio` AS `Precio`,((select `historico_precios_tarifas_encomiendas`.`Precio` from `historico_precios_tarifas_encomiendas` where ((`historico_precios_tarifas_encomiendas`.`Id_Tarifa` = (`te`.`Id_Tarifa` + 1)) and isnull(`historico_precios_tarifas_encomiendas`.`Fecha_Fin`))) / `hpte`.`Precio`) AS `Porcentaje_Reajuste`,`te`.`Activo` AS `Activo` from (((((((`tarifas_encomiendas` `te` join `historico_precios_tarifas_encomiendas` `hpte` on((`te`.`Id_Tarifa` = `hpte`.`Id_Tarifa`))) join `terminales` `ci1` on((`te`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`te`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) where (isnull(`hpte`.`Fecha_Fin`) and ((`te`.`Id_Tarifa` % 2) <> 0)) order by `te`.`Id_Tarifa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_usuario`
--

/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_usuario` AS select `u`.`Id_Usuario` AS `Id_Usuario`,`u`.`Id_Empleado` AS `Id_Empleado`,concat(`e`.`Nombres`,' ',`e`.`Apellidos`) AS `Nombre_Completo`,`u`.`Clave` AS `Clave`,`u`.`Fecha_Registro` AS `Fecha_Registro`,`u`.`Ultima_Fecha_Actualizacion` AS `Ultima_Fecha_Actualizacion`,`u`.`Administrador` AS `Administrador`,`u`.`Activo` AS `Activo` from (`usuarios` `u` join `empleados` `e` on((`u`.`Id_Empleado` = `e`.`Id_Empleado`))) order by `u`.`Id_Usuario` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_usuariologin`
--

/*!50001 DROP VIEW IF EXISTS `v_usuariologin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_usuariologin` AS select `u`.`Id_Usuario` AS `Id_Usuario`,`u`.`Id_Empleado` AS `Id_Empleado`,`u`.`Administrador` AS `Administrador`,concat(`e`.`Nombres`,' ',`e`.`Apellidos`) AS `Nombre`,`e`.`Id_Cargo` AS `Id_Cargo` from (`usuarios` `u` join `empleados` `e` on((`u`.`Id_Empleado` = `e`.`Id_Empleado`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_viaje`
--

/*!50001 DROP VIEW IF EXISTS `v_viaje`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_viaje` AS select `v`.`Id_Viaje` AS `Id_Viaje`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`v`.`Fecha_Llegada` AS `Fecha_Llegada`,`v`.`Hora_Llegada` AS `Hora_Llegada`,`p1`.`Id_Pais` AS `Id_Pais_Origen`,`p1`.`Nombre_Pais` AS `Nombre_Pais_Origen`,`d1`.`Id_Ciudad` AS `Id_Ciudad_Origen`,`d1`.`Nombre_Ciudad` AS `Nombre_Ciudad_Origen`,`v`.`Id_Terminal_Origen` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Nombre_Terminal_Origen`,`p2`.`Id_Pais` AS `Id_Pais_Destino`,`p2`.`Nombre_Pais` AS `Nombre_Pais_Destino`,`d2`.`Id_Ciudad` AS `Id_Ciudad_Destino`,`d2`.`Nombre_Ciudad` AS `Nombre_Ciudad_Destino`,`v`.`Id_Terminal_Destino` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Nombre_Terminal_Destino`,`v`.`Id_Chofer` AS `Id_Chofer`,concat(`ch`.`Nombres`,' ',`ch`.`Apellidos`) AS `Nombre_Chofer`,`v`.`Id_Estado_Viaje` AS `Id_Estado_Viaje`,`ev`.`Estado` AS `Estado`,`b`.`Capacidad_Personas` AS `Capacidad_Personas`,(select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`)) AS `Boletos_Vendidos`,`b`.`Capacidad_Encomiendas` AS `Capacidad_Encomiendas`,(select count(0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`)) AS `Encomiendas_Guiadas`,(select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`)) AS `Volumen_Encomiendas_Guiadas`,`v`.`Id_Bus` AS `Id_Bus`,concat(`b`.`Marca`,' ',`b`.`Modelo`,', ',`b`.`Color`) AS `Descripcion_Bus` from (((((((((`viajes` `v` join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) join `empleados` `ch` on((`v`.`Id_Chofer` = `ch`.`Id_Empleado`))) join `estados_viajes` `ev` on((`v`.`Id_Estado_Viaje` = `ev`.`Id_Estado_Viaje`))) order by `v`.`Id_Viaje` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_viaje_compra_boleto`
--

/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_boleto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_viaje_compra_boleto` AS select `v`.`Id_Viaje` AS `Id_Viaje`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`ci1`.`Id_Terminal` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Origen`,`ci2`.`Id_Terminal` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Destino`,`bo`.`Numero_Asiento` AS `Numero_Asiento`,(`b`.`Capacidad_Personas` - (select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Boletos`,(`b`.`Capacidad_Encomiendas` - (select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Volumen_Encomiendas`,`v`.`Id_Bus` AS `Id_Bus` from ((((((((`viajes` `v` join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `boletos` `bo` on((`bo`.`Id_Viaje` = `v`.`Id_Viaje`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) order by `v`.`Id_Viaje` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_viaje_compra_boletos`
--

/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_boletos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_viaje_compra_boletos` AS select `v`.`Id_Viaje` AS `Id_Viaje`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`ci1`.`Id_Terminal` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Origen`,`ci2`.`Id_Terminal` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Destino`,(`b`.`Capacidad_Personas` - (select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Boletos`,(`b`.`Capacidad_Encomiendas` - (select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Volumen_Encomiendas`,`v`.`Id_Bus` AS `Id_Bus` from (((((((`viajes` `v` join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) where ((`v`.`Id_Estado_Viaje` = 1) and ((`b`.`Capacidad_Personas` - (select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`))) > 0)) order by `v`.`Id_Viaje` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_viaje_compra_encomienda`
--

/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_encomienda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_viaje_compra_encomienda` AS select `v`.`Id_Viaje` AS `Id_Viaje`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`ci1`.`Id_Terminal` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Origen`,`ci2`.`Id_Terminal` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Destino`,(`b`.`Capacidad_Personas` - (select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Boletos`,(`b`.`Capacidad_Encomiendas` - (select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Volumen_Encomiendas`,`v`.`Id_Bus` AS `Id_Bus` from (((((((`viajes` `v` join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) order by `v`.`Id_Viaje` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_viaje_compra_encomiendas`
--

/*!50001 DROP VIEW IF EXISTS `v_viaje_compra_encomiendas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_viaje_compra_encomiendas` AS select `v`.`Id_Viaje` AS `Id_Viaje`,`v`.`Fecha_Salida` AS `Fecha_Salida`,`v`.`Hora_Salida` AS `Hora_Salida`,`ci1`.`Id_Terminal` AS `Id_Terminal_Origen`,`ci1`.`Nombre_Terminal` AS `Origen`,`ci2`.`Id_Terminal` AS `Id_Terminal_Destino`,`ci2`.`Nombre_Terminal` AS `Destino`,(`b`.`Capacidad_Personas` - (select count(0) from `boletos` where (`boletos`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Boletos`,(`b`.`Capacidad_Encomiendas` - (select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`))) AS `Cupos_Volumen_Encomiendas`,`v`.`Id_Bus` AS `Id_Bus` from (((((((`viajes` `v` join `terminales` `ci1` on((`v`.`Id_Terminal_Origen` = `ci1`.`Id_Terminal`))) join `ciudades` `d1` on((`ci1`.`Id_Ciudad` = `d1`.`Id_Ciudad`))) join `paises` `p1` on((`d1`.`Id_Pais` = `p1`.`Id_Pais`))) join `terminales` `ci2` on((`v`.`Id_Terminal_Destino` = `ci2`.`Id_Terminal`))) join `ciudades` `d2` on((`ci2`.`Id_Ciudad` = `d2`.`Id_Ciudad`))) join `paises` `p2` on((`d2`.`Id_Pais` = `p2`.`Id_Pais`))) join `buses` `b` on((`v`.`Id_Bus` = `b`.`Id_Bus`))) where ((`v`.`Id_Estado_Viaje` = 1) and ((`b`.`Capacidad_Encomiendas` - (select ifnull(sum(`encomiendas`.`Volumen`),0) from `encomiendas` where (`encomiendas`.`Id_Viaje` = `v`.`Id_Viaje`))) > 0)) order by `v`.`Id_Viaje` */;
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

-- Dump completed on 2023-09-17 11:50:58
