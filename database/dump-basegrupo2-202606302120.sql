/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: basegrupo2
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_descripcion_unique` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES
(1,'Remeras','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(2,'Joggings','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(3,'Conjuntos','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(4,'Zapatillas','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respuesta` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES
(1,'ejemplo','ejemplo@gmail.com','un asunto','un mensaje','respondido','2026-06-18 22:50:31','2026-07-01 01:16:53','si volvera a reingresar'),
(2,'Jimena-Cliente','js.torreani@outlook.com','reingreso','volverá a reingresar el producto \"ejemploProducto\"','respondido','2026-07-01 01:15:31','2026-07-01 02:54:20','>Sí, cuando este disponible de nuevo el producto, se volverá a mostrar en el catálogo. Muchas gracias por tu consulta'),
(3,'J','js.torreani@outlook.com','ejemplo3','un mensaje 3','respondido','2026-07-01 03:02:51','2026-07-01 03:04:23','>ok');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pagos`
--

DROP TABLE IF EXISTS `forma_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `forma_pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagos`
--

LOCK TABLES `forma_pagos` WRITE;
/*!40000 ALTER TABLE `forma_pagos` DISABLE KEYS */;
INSERT INTO `forma_pagos` VALUES
(1,'Efectivo',NULL,NULL),
(2,'Transferencia',NULL,NULL);
/*!40000 ALTER TABLE `forma_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0000_12_31_235959_create_roles_table',1),
(2,'0001_01_01_000000_create_users_table',1),
(3,'0001_01_01_000001_create_cache_table',1),
(4,'0001_01_01_000002_create_jobs_table',1),
(5,'2026_05_27_025320_create_categorias_table',1),
(6,'2026_05_27_032046_create_productos_table',1),
(7,'2026_06_12_003532_create_ventas_cabecera_table',1),
(8,'2026_06_12_003623_create_ventas_detalle_table',1),
(9,'2026_06_13_011246_create_consultas_table',1),
(10,'2026_06_13_201330_create_forma_pagos_table',1),
(11,'2026_06_13_202038_add_forma_pago_id_to_ventas_cabecera_table',1),
(12,'2026_06_27_000001_add_estado_to_consultas_table',2),
(13,'2026_06_29_204657_add_respuesta_to_consultas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT 0,
  `url_imagen` varchar(255) DEFAULT NULL,
  `genero` enum('masculino','femenino','unisex') NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES
(1,'Remera deportiva mujer 1','Remera deportiva femenina',12000.00,9,'mujeres/remeras/remera1.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-18 03:33:20',NULL),
(2,'Remera deportiva mujer 2','Remera deportiva femenina',12000.00,9,'mujeres/remeras/remera2.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-25 23:53:20',NULL),
(3,'Remera deportiva mujer 3','Remera deportiva femenina',12000.00,8,'mujeres/remeras/remera3.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-25 23:55:06',NULL),
(4,'Remera deportiva mujer 4','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera4.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(5,'Remera deportiva mujer 5','Remera deportiva femenina',12000.00,9,'mujeres/remeras/remera5.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-17 22:50:44',NULL),
(6,'Remera deportiva mujer 6','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera6.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(7,'Remera deportiva mujer 7','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera7.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(8,'Remera deportiva mujer 8','Remera deportiva femenina',12000.00,9,'mujeres/remeras/remera8.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-17 22:50:44',NULL),
(9,'Remera deportiva mujer 9','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera9.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(10,'Remera deportiva mujer 10','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera10.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(11,'Remera deportiva mujer 11','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera11.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(12,'Remera deportiva mujer 12','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera12.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(13,'Remera deportiva mujer 13','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera13.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(14,'Remera deportiva mujer 14','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera14.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(15,'Remera deportiva mujer 15','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera15.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(16,'Conjunto deportivo mujer 1','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto1.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(17,'Conjunto deportivo mujer 2','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto2.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(18,'Conjunto deportivo mujer 3','Conjunto deportivo femenino',18000.00,9,'mujeres/conjuntos/conjunto3.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-18 03:33:20',NULL),
(19,'Conjunto deportivo mujer 4','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto4.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(20,'Conjunto deportivo mujer 5','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto5.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(21,'Conjunto deportivo mujer 6','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto6.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(22,'Conjunto deportivo mujer 7','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto7.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(23,'Conjunto deportivo mujer 8','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto8.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(24,'Conjunto deportivo mujer 9','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto9.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(25,'Conjunto deportivo mujer 10','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto10.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(26,'Conjunto deportivo mujer 11','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto11.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(27,'Conjunto deportivo mujer 12','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto12.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(28,'Conjunto deportivo mujer 13','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto13.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(29,'Conjunto deportivo mujer 14','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto14.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(30,'Conjunto deportivo mujer 15','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto15.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(31,'Conjunto deportivo mujer 16','Conjunto deportivo femenino',18000.00,10,'mujeres/conjuntos/conjunto16.jpg','femenino',3,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(32,'Zapatilla deportiva mujer 1','Zapatilla deportiva femenina',25000.00,9,'mujeres/zapatillas/zapatilla1.jpg','femenino',4,1,'2026-06-15 05:06:15','2026-06-18 03:33:20',NULL),
(33,'Zapatilla deportiva mujer 2','Zapatilla deportiva femenina',25000.00,10,'mujeres/zapatillas/zapatilla2.jpg','femenino',4,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(34,'Zapatilla deportiva mujer 3','Zapatilla deportiva femenina',25000.00,10,'mujeres/zapatillas/zapatilla3.jpg','femenino',4,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(35,'Zapatilla deportiva mujer 4','Zapatilla deportiva femenina',25000.00,10,'mujeres/zapatillas/zapatilla4.jpg','femenino',4,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(36,'Remera deportiva hombre 1','Remera deportiva masculina',12000.00,8,'hombres/remeras/remera1.jpg','masculino',1,1,'2026-06-15 05:06:15','2026-07-01 00:45:18',NULL),
(37,'Remera deportiva hombre 2','Remera deportiva masculina',12000.00,9,'hombres/remeras/remera2.jpg','masculino',1,1,'2026-06-15 05:06:15','2026-07-01 01:39:31',NULL),
(38,'Remera deportiva hombre 3','Remera deportiva masculina',12000.00,8,'hombres/remeras/remera3.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-30 21:45:56',NULL),
(39,'Remera deportiva hombre 4','Remera deportiva masculina',12000.00,9,'hombres/remeras/remera4.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-25 23:53:47',NULL),
(40,'Remera deportiva hombre 5','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera5.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(41,'Remera deportiva hombre 6','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera6.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(42,'Remera deportiva hombre 7','Remera deportiva masculina',12000.00,9,'hombres/remeras/remera7.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-18 22:14:10',NULL),
(43,'Remera deportiva hombre 8','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera8.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(44,'Remera deportiva hombre 9','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera9.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(45,'Remera deportiva hombre 10','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera10.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(46,'Remera deportiva hombre 11','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera11.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(47,'Remera deportiva hombre 12','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera12.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(48,'Remera deportiva hombre 13','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera13.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(49,'Remera deportiva hombre 14','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera14.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(50,'Remera deportiva hombre 15','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera15.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(51,'Remera deportiva hombre 16','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera16.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(52,'Jogging deportivo hombre 1','Jogging deportivo masculino',15000.00,9,'hombres/joggings/jogging1.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-18 04:10:48',NULL),
(53,'Jogging deportivo hombre 2','Jogging deportivo masculino',15000.00,9,'hombres/joggings/jogging2.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-18 04:10:48',NULL),
(54,'Jogging deportivo hombre 3','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging3.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(55,'Jogging deportivo hombre 4','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging4.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(56,'Jogging deportivo hombre 5','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging5.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(57,'Jogging deportivo hombre 6','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging6.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(58,'Jogging deportivo hombre 7','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging7.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(59,'Jogging deportivo hombre 8','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging8.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(60,'Jogging deportivo hombre 9','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging9.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(61,'Jogging deportivo hombre 10','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging10.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(62,'Jogging deportivo hombre 11','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging11.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(63,'Jogging deportivo hombre 12','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging12.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(64,'Jogging deportivo hombre 13','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging13.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(65,'Jogging deportivo hombre 14','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging14.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(66,'Jogging deportivo hombre 15','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging15.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(67,'Jogging deportivo hombre 16','Jogging deportivo masculino',15000.00,10,'hombres/joggings/jogging16.jpg','masculino',2,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(68,'Zapatilla deportiva hombre 1','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla1.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(69,'Zapatilla deportiva hombre 2','Zapatilla deportiva masculina',25000.00,9,'hombres/zapatillas/zapatilla2.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-07-01 01:02:22',NULL),
(70,'Zapatilla deportiva hombre 3','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla3.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(71,'Zapatilla deportiva hombre 4','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla4.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(72,'Zapatillas deportivas Nike 05','zapatillas para correr',90000.00,3,'zapatilla1.jpg','femenino',4,1,'2026-06-17 22:43:54','2026-06-17 22:44:38','2026-06-17 22:44:38'),
(73,'conjunto deportivo mujer','conjunto de dos piezas, mangas más calza larga. Marca nike',170000.00,5,'C:\\Users\\Jimena\\AppData\\Local\\Temp\\phpCA.tmp','femenino',3,1,'2026-06-30 23:07:49','2026-07-01 00:11:23','2026-07-01 00:11:23'),
(74,'conjunto deportivo mujer','conjunto de dos piezas: top mangas cortas más calza larga, ambos en color celeste',200000.00,20,'mujeres/conjuntos/conjunto-deportivo-mujer.jpg','femenino',3,1,'2026-07-01 00:00:07','2026-07-01 00:00:07',NULL),
(75,'conjunto urban','conjunto urbano de pantalon de tela de avion y top en tela de lycra 100% premium color blanco',280000.00,3,'mujeres/conjuntos/conjunto-urban.jpg','femenino',3,1,'2026-07-01 00:09:17','2026-07-01 00:09:17',NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'admin','Administrador del sistema','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(2,'cliente','Cliente del ecommerce','2026-06-15 05:06:15','2026-06-15 05:06:15',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('yrjOYf8JBHkI7FGvEMSiXbLHZj0eV7HhtAAqdt8H',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJIenlySXRUM08yNjljSW1CMVVMc3VBbkxWVEt5eEJ1eERHTTRFRFVNIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8yLnRlc3RcL2FkbWluIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjN9',1782864285);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'María','maria123@gmail.com',NULL,'$2y$12$6VLoWHLHh0ooefeNez3FOOlQK.0PdaNEb5BAkp.TX8rqvX6Pj.Qzy',NULL,2,'2026-06-15 05:13:55','2026-06-15 05:13:55',NULL),
(2,'Jimena','js.torreani@outlook.com',NULL,'$2y$12$u/z3aDkXfWe0JW2bmsO9se6LOk.iuVthWBXpcCJ5kvsibq9AF9hF2',NULL,2,'2026-06-15 21:01:04','2026-06-18 03:25:59',NULL),
(3,'Jimena','jimenatorreani93@gmail.com',NULL,'$2y$12$6KeK9KyDC5SkaKuczauZdu52aLck3qPJslpSFeSLctUtR0Ue5HfwW',NULL,1,'2026-06-15 21:03:05','2026-06-15 21:03:05',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_cabecera`
--

DROP TABLE IF EXISTS `ventas_cabecera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_cabecera` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `forma_pago_id` bigint(20) unsigned DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'carrito',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cabecera_user_id_foreign` (`user_id`),
  KEY `ventas_cabecera_forma_pago_id_foreign` (`forma_pago_id`),
  CONSTRAINT `ventas_cabecera_forma_pago_id_foreign` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pagos` (`id`),
  CONSTRAINT `ventas_cabecera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_cabecera`
--

LOCK TABLES `ventas_cabecera` WRITE;
/*!40000 ALTER TABLE `ventas_cabecera` DISABLE KEYS */;
INSERT INTO `ventas_cabecera` VALUES
(1,'2026-06-16 03:30:45',1,1,'confirmado',49000.00,'2026-06-15 05:14:35','2026-06-16 03:30:45'),
(2,'2026-06-16 04:01:58',1,1,'confirmado',15000.00,'2026-06-16 04:01:47','2026-06-16 04:01:58'),
(3,'2026-06-16 04:24:48',1,2,'confirmado',12000.00,'2026-06-16 04:24:35','2026-06-16 04:24:48'),
(4,'2026-06-16 05:20:07',1,2,'confirmado',12000.00,'2026-06-16 05:19:42','2026-06-16 05:20:07'),
(5,'2026-06-16 05:40:00',1,1,'confirmado',12000.00,'2026-06-16 05:39:47','2026-06-16 05:40:00'),
(6,'2026-06-16 07:15:54',2,1,'confirmado',12000.00,'2026-06-16 07:15:42','2026-06-16 07:15:54'),
(7,'2026-06-16 07:16:40',2,1,'confirmado',12000.00,'2026-06-16 07:16:15','2026-06-16 07:16:40'),
(8,'2026-06-16 23:36:11',2,2,'confirmado',25000.00,'2026-06-16 23:35:57','2026-06-16 23:36:11'),
(9,'2026-06-17 19:35:03',2,1,'confirmado',12000.00,'2026-06-16 23:40:48','2026-06-17 19:35:03'),
(10,'2026-06-17 22:40:14',2,1,'confirmado',12000.00,'2026-06-17 22:40:04','2026-06-17 22:40:14'),
(11,'2026-06-17 22:50:44',2,1,'confirmado',24000.00,'2026-06-17 22:50:24','2026-06-17 22:50:44'),
(12,'2026-06-18 03:33:20',2,2,'confirmado',55000.00,'2026-06-17 22:50:48','2026-06-18 03:33:20'),
(13,'2026-06-18 04:10:49',2,1,'confirmado',30000.00,'2026-06-18 04:10:31','2026-06-18 04:10:49'),
(14,'2026-06-18 22:14:10',2,2,'confirmado',12000.00,'2026-06-18 04:12:10','2026-06-18 22:14:10'),
(15,'2026-06-25 23:53:20',2,1,'confirmado',12000.00,'2026-06-18 22:51:01','2026-06-25 23:53:20'),
(16,'2026-06-25 23:53:47',2,1,'confirmado',12000.00,'2026-06-25 23:53:25','2026-06-25 23:53:47'),
(17,'2026-06-25 23:54:10',2,2,'confirmado',12000.00,'2026-06-25 23:53:51','2026-06-25 23:54:10'),
(18,'2026-06-25 23:54:34',2,2,'confirmado',12000.00,'2026-06-25 23:54:14','2026-06-25 23:54:34'),
(19,'2026-06-25 23:55:06',2,1,'confirmado',12000.00,'2026-06-25 23:54:38','2026-06-25 23:55:06'),
(20,'2026-06-30 21:45:56',2,1,'confirmado',12000.00,'2026-06-25 23:55:09','2026-06-30 21:45:56'),
(21,'2026-07-01 00:45:18',2,1,'confirmado',12000.00,'2026-06-30 21:46:51','2026-07-01 00:45:18'),
(22,'2026-07-01 01:02:22',2,2,'confirmado',25000.00,'2026-07-01 01:01:50','2026-07-01 01:02:22'),
(23,'2026-07-01 01:39:31',2,1,'confirmado',12000.00,'2026-07-01 01:39:03','2026-07-01 01:39:31'),
(24,NULL,2,NULL,'carrito',0.00,'2026-07-01 01:41:06','2026-07-01 01:41:06');
/*!40000 ALTER TABLE `ventas_cabecera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_detalle`
--

DROP TABLE IF EXISTS `ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_detalle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_detalle_venta_id_foreign` (`venta_id`),
  KEY `ventas_detalle_producto_id_foreign` (`producto_id`),
  CONSTRAINT `ventas_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `ventas_detalle_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalle`
--

LOCK TABLES `ventas_detalle` WRITE;
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
INSERT INTO `ventas_detalle` VALUES
(2,1,69,1,25000.00,25000.00,'2026-06-15 21:19:11','2026-06-15 21:19:11'),
(3,1,1,1,12000.00,12000.00,'2026-06-16 02:42:53','2026-06-16 02:42:53'),
(4,1,2,1,12000.00,12000.00,'2026-06-16 02:43:06','2026-06-16 02:43:06'),
(5,2,61,1,15000.00,15000.00,'2026-06-16 04:01:47','2026-06-16 04:01:47'),
(6,3,36,1,12000.00,12000.00,'2026-06-16 04:24:35','2026-06-16 04:24:35'),
(7,4,2,1,12000.00,12000.00,'2026-06-16 05:19:42','2026-06-16 05:19:42'),
(8,5,3,1,12000.00,12000.00,'2026-06-16 05:39:47','2026-06-16 05:39:47'),
(9,6,36,1,12000.00,12000.00,'2026-06-16 07:15:42','2026-06-16 07:15:42'),
(10,7,37,1,12000.00,12000.00,'2026-06-16 07:16:27','2026-06-16 07:16:27'),
(11,8,71,1,25000.00,25000.00,'2026-06-16 23:35:57','2026-06-16 23:35:57'),
(12,9,37,1,12000.00,12000.00,'2026-06-17 19:34:50','2026-06-17 19:34:50'),
(13,10,36,1,12000.00,12000.00,'2026-06-17 22:40:04','2026-06-17 22:40:04'),
(14,11,8,1,12000.00,12000.00,'2026-06-17 22:50:24','2026-06-17 22:50:24'),
(15,11,5,1,12000.00,12000.00,'2026-06-17 22:50:32','2026-06-17 22:50:32'),
(16,12,1,1,12000.00,12000.00,'2026-06-18 03:32:41','2026-06-18 03:32:41'),
(17,12,18,1,18000.00,18000.00,'2026-06-18 03:32:55','2026-06-18 03:32:55'),
(18,12,32,1,25000.00,25000.00,'2026-06-18 03:33:04','2026-06-18 03:33:04'),
(19,13,52,1,15000.00,15000.00,'2026-06-18 04:10:31','2026-06-18 04:10:31'),
(20,13,53,1,15000.00,15000.00,'2026-06-18 04:10:38','2026-06-18 04:10:38'),
(21,14,42,1,12000.00,12000.00,'2026-06-18 22:13:27','2026-06-18 22:13:27'),
(22,15,2,1,12000.00,12000.00,'2026-06-25 23:53:09','2026-06-25 23:53:09'),
(23,16,39,1,12000.00,12000.00,'2026-06-25 23:53:37','2026-06-25 23:53:37'),
(24,17,3,1,12000.00,12000.00,'2026-06-25 23:54:00','2026-06-25 23:54:00'),
(25,18,38,1,12000.00,12000.00,'2026-06-25 23:54:26','2026-06-25 23:54:26'),
(26,19,3,1,12000.00,12000.00,'2026-06-25 23:54:54','2026-06-25 23:54:54'),
(27,20,38,1,12000.00,12000.00,'2026-06-30 21:45:44','2026-06-30 21:45:44'),
(28,21,36,1,12000.00,12000.00,'2026-07-01 00:42:03','2026-07-01 00:42:03'),
(29,22,69,1,25000.00,25000.00,'2026-07-01 01:01:50','2026-07-01 01:01:50'),
(30,23,37,1,12000.00,12000.00,'2026-07-01 01:39:03','2026-07-01 01:39:03');
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'basegrupo2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-06-30 21:20:43
