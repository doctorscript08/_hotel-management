-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: hotel_management
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_admin`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (2);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id_cliente`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edicoes_admins`
--

DROP TABLE IF EXISTS `edicoes_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edicoes_admins` (
  `id_edicao_admin` int NOT NULL AUTO_INCREMENT,
  `alterado_por_tipo` enum('admin') DEFAULT NULL,
  `campo_alterado` varchar(100) NOT NULL,
  `valor_antigo` varchar(255) DEFAULT NULL,
  `valor_novo` varchar(255) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `administrador` int NOT NULL,
  `alterado_por_id` int NOT NULL,
  PRIMARY KEY (`id_edicao_admin`),
  KEY `administrador` (`administrador`),
  KEY `alterado_por_id` (`alterado_por_id`),
  CONSTRAINT `edicoes_admins_ibfk_1` FOREIGN KEY (`administrador`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `edicoes_admins_ibfk_2` FOREIGN KEY (`alterado_por_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edicoes_admins`
--

LOCK TABLES `edicoes_admins` WRITE;
/*!40000 ALTER TABLE `edicoes_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `edicoes_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edicoes_clientes`
--

DROP TABLE IF EXISTS `edicoes_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edicoes_clientes` (
  `id_edicao_cliente` int NOT NULL AUTO_INCREMENT,
  `alterado_por_tipo` enum('cliente','funcionario','admin') DEFAULT NULL,
  `campo_alterado` varchar(100) NOT NULL,
  `valor_antigo` varchar(255) DEFAULT NULL,
  `valor_novo` varchar(255) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `cliente` int NOT NULL,
  `alterado_por_id` int NOT NULL,
  PRIMARY KEY (`id_edicao_cliente`),
  KEY `cliente` (`cliente`),
  KEY `alterado_por_id` (`alterado_por_id`),
  CONSTRAINT `edicoes_clientes_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `edicoes_clientes_ibfk_2` FOREIGN KEY (`alterado_por_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edicoes_clientes`
--

LOCK TABLES `edicoes_clientes` WRITE;
/*!40000 ALTER TABLE `edicoes_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `edicoes_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edicoes_funcionarios`
--

DROP TABLE IF EXISTS `edicoes_funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edicoes_funcionarios` (
  `id_edicao_funcionario` int NOT NULL AUTO_INCREMENT,
  `alterado_por_tipo` enum('cliente','funcionario','admin') DEFAULT NULL,
  `campo_alterado` varchar(100) NOT NULL,
  `valor_antigo` varchar(255) DEFAULT NULL,
  `valor_novo` varchar(255) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `funcionario` int NOT NULL,
  `alterado_por_id` int NOT NULL,
  PRIMARY KEY (`id_edicao_funcionario`),
  KEY `funcionario` (`funcionario`),
  KEY `alterado_por_id` (`alterado_por_id`),
  CONSTRAINT `edicoes_funcionarios_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `edicoes_funcionarios_ibfk_2` FOREIGN KEY (`alterado_por_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edicoes_funcionarios`
--

LOCK TABLES `edicoes_funcionarios` WRITE;
/*!40000 ALTER TABLE `edicoes_funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `edicoes_funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edicoes_reservas`
--

DROP TABLE IF EXISTS `edicoes_reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edicoes_reservas` (
  `id_edicao_reserva` int NOT NULL AUTO_INCREMENT,
  `alterada_por_tipo` enum('cliente','funcionario','admin') DEFAULT NULL,
  `campo_alterado` varchar(100) NOT NULL,
  `valor_antigo` varchar(255) DEFAULT NULL,
  `valor_novo` varchar(255) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `reserva` int NOT NULL,
  `alterada_por_id` int NOT NULL,
  PRIMARY KEY (`id_edicao_reserva`),
  KEY `reserva` (`reserva`),
  KEY `alterada_por_id` (`alterada_por_id`),
  CONSTRAINT `edicoes_reservas_ibfk_1` FOREIGN KEY (`reserva`) REFERENCES `reservas` (`id_reserva`) ON DELETE CASCADE,
  CONSTRAINT `edicoes_reservas_ibfk_2` FOREIGN KEY (`alterada_por_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edicoes_reservas`
--

LOCK TABLES `edicoes_reservas` WRITE;
/*!40000 ALTER TABLE `edicoes_reservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `edicoes_reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `id_funcionario` int NOT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (3,'Balconista');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_pagamentos`
--

DROP TABLE IF EXISTS `historico_pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_pagamentos` (
  `id_pagamento` int NOT NULL AUTO_INCREMENT,
  `data_pagamento` datetime DEFAULT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `cliente` int DEFAULT NULL,
  `reserva` int DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `cliente` (`cliente`),
  KEY `reserva` (`reserva`),
  CONSTRAINT `historico_pagamentos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  CONSTRAINT `historico_pagamentos_ibfk_2` FOREIGN KEY (`reserva`) REFERENCES `reservas` (`id_reserva`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_pagamentos`
--

LOCK TABLES `historico_pagamentos` WRITE;
/*!40000 ALTER TABLE `historico_pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quartos` (
  `id_quarto` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('gemeos','familiar','triplo','casal','solteiro','suite') NOT NULL,
  `status` enum('ocupado','disponível') NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_quarto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartos`
--

LOCK TABLES `quartos` WRITE;
/*!40000 ALTER TABLE `quartos` DISABLE KEYS */;
INSERT INTO `quartos` VALUES (1,'gemeos','disponível',30000.00),(2,'gemeos','disponível',30000.00),(3,'familiar','disponível',60000.00),(4,'familiar','disponível',60000.00),(5,'triplo','disponível',45000.00),(6,'triplo','disponível',45000.00),(7,'casal','disponível',35000.00),(8,'casal','disponível',35000.00),(9,'solteiro','disponível',25000.00),(10,'solteiro','disponível',25000.00),(11,'suite','disponível',80000.00),(12,'suite','disponível',80000.00);
/*!40000 ALTER TABLE `quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `data_registro` datetime NOT NULL,
  `data_check_in` date DEFAULT NULL,
  `data_check_out` date DEFAULT NULL,
  `status` enum('confirmada','cancelada','pendente') NOT NULL,
  `forma_de_pagamento` enum('cartao de credito','cartao de debito','transferencia bancaria') DEFAULT NULL,
  `cliente` int DEFAULT NULL,
  `quarto` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `nome_cliente_temporario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `cliente` (`cliente`),
  KEY `quarto` (`quarto`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`quarto`) REFERENCES `quartos` (`id_quarto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas_servicos`
--

DROP TABLE IF EXISTS `reservas_servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas_servicos` (
  `id_servico_reserva` int NOT NULL AUTO_INCREMENT,
  `reserva` int DEFAULT NULL,
  `servico` int DEFAULT NULL,
  PRIMARY KEY (`id_servico_reserva`),
  KEY `reserva` (`reserva`),
  KEY `servico` (`servico`),
  CONSTRAINT `reservas_servicos_ibfk_1` FOREIGN KEY (`reserva`) REFERENCES `reservas` (`id_reserva`) ON DELETE CASCADE,
  CONSTRAINT `reservas_servicos_ibfk_2` FOREIGN KEY (`servico`) REFERENCES `servicos_extras` (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas_servicos`
--

LOCK TABLES `reservas_servicos` WRITE;
/*!40000 ALTER TABLE `reservas_servicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas_servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_extras`
--

DROP TABLE IF EXISTS `servicos_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicos_extras` (
  `id_servico` int NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_servico`),
  UNIQUE KEY `nome_servico` (`nome_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_extras`
--

LOCK TABLES `servicos_extras` WRITE;
/*!40000 ALTER TABLE `servicos_extras` DISABLE KEYS */;
INSERT INTO `servicos_extras` VALUES (1,'Café da manhã',5000.00),(2,'Estacionamento',3000.00),(3,'Piscina',2500.00);
/*!40000 ALTER TABLE `servicos_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_tel` varchar(16) NOT NULL,
  `bi` varchar(14) NOT NULL,
  `role` enum('admin','funcionario','cliente') NOT NULL,
  `palavra_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `num_tel` (`num_tel`),
  UNIQUE KEY `bi` (`bi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Kelson de Sousa','kelsondesousa99@gmail.com','921578427','008684495HA043','cliente','12345'),(2,'João Silva','joaosilva@gmail.com','923456789','008684495HA044','admin','54321'),(3,'Pedro da Costa','pedrocosta@gmail.com','923789456','008684495HA045','funcionario','789456');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-11 12:07:59
