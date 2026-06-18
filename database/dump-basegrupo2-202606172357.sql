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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(11,'2026_06_13_202038_add_forma_pago_id_to_ventas_cabecera_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES
(1,'Remera deportiva mujer 1','Remera deportiva femenina',12000.00,9,'mujeres/remeras/remera1.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-18 03:33:20',NULL),
(2,'Remera deportiva mujer 2','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera2.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(3,'Remera deportiva mujer 3','Remera deportiva femenina',12000.00,10,'mujeres/remeras/remera3.jpg','femenino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
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
(36,'Remera deportiva hombre 1','Remera deportiva masculina',12000.00,9,'hombres/remeras/remera1.jpg','masculino',1,1,'2026-06-15 05:06:15','2026-06-17 22:40:14',NULL),
(37,'Remera deportiva hombre 2','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera2.jpg','masculino',1,1,'2026-06-15 05:06:15','2026-06-15 05:06:15',NULL),
(38,'Remera deportiva hombre 3','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera3.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(39,'Remera deportiva hombre 4','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera4.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(40,'Remera deportiva hombre 5','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera5.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(41,'Remera deportiva hombre 6','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera6.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(42,'Remera deportiva hombre 7','Remera deportiva masculina',12000.00,10,'hombres/remeras/remera7.jpg','masculino',1,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
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
(69,'Zapatilla deportiva hombre 2','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla2.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(70,'Zapatilla deportiva hombre 3','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla3.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(71,'Zapatilla deportiva hombre 4','Zapatilla deportiva masculina',25000.00,10,'hombres/zapatillas/zapatilla4.jpg','masculino',4,1,'2026-06-15 05:06:16','2026-06-15 05:06:16',NULL),
(72,'Zapatillas deportivas Nike 05','zapatillas para correr',90000.00,3,'zapatilla1.jpg','femenino',4,1,'2026-06-17 22:43:54','2026-06-17 22:44:38','2026-06-17 22:44:38');
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
('d37M9dOfRCyh3DeSSvnEfDCiyCQUL4pPZZIm05bq',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiJpTktKUUJvWHdaUGVzOFNFc25oTWFDZ3hxWEtTWDFYMmk1eTcyUE1mIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMi50ZXN0XC9jbGllbnRlIiwicm91dGUiOiJjbGllbnRlLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==',1781742382),
('s70r5Ax4UolFjDndMSq1S6cPyq103CA38kWayGW4',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','eyJfdG9rZW4iOiJ3TzR1NzZKWkl2WjdFV0M1d2lEVmFIMXdKWjJHbmQ1MkFsMUczZEY2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMi50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1781738732),
('wg3e6l0KIcT8dnPloklPpIv2sZQ8jwQ6tTryrAPe',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJQMVY3cnFSWWhzTEJVcktZQVlxaXB0YnR2ZWhHSVZvV0UwaDRXcHNCIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8yLnRlc3RcL2xvZ2luIiwicm91dGUiOiJsb2dpbi5mb3JtIn19',1781745767);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(14,NULL,2,NULL,'carrito',0.00,'2026-06-18 04:12:10','2026-06-18 04:12:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(20,13,53,1,15000.00,15000.00,'2026-06-18 04:10:38','2026-06-18 04:10:38');
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

-- Dump completed on 2026-06-17 23:57:46
