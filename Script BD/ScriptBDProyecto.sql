-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto
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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `artId` int(11) NOT NULL AUTO_INCREMENT,
  `artNombre` varchar(150) NOT NULL,
  `artPrecio` int(11) NOT NULL,
  `artCantidad` int(11) NOT NULL,
  `artVista` varchar(250) NOT NULL,
  `artEstado` varchar(15) NOT NULL,
  `artCategoriaId` int(11) NOT NULL,
  PRIMARY KEY (`artId`),
  KEY `fk_artCategoriaId` (`artCategoriaId`),
  CONSTRAINT `fk_artCategoriaId` FOREIGN KEY (`artCategoriaId`) REFERENCES `categoria` (`categoriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,'New Ring',15000,15,'../Uploads/ImagenPrincipal/21.jpg','Disponible',3),(2,'Silver Collar',25000,50,'../Uploads/ImagenPrincipal/7.jpg','Disponible',1),(3,'Hand Collar',30000,25,'../Uploads/ImagenPrincipal/4.jpg','Disponible',1),(4,'Old Ring',145000,30,'../Uploads/ImagenPrincipal/23.jpg','Disponible',3),(5,'Silver Ring',40000,25,'../Uploads/ImagenPrincipal/26.jpg','Disponible',3),(6,'Golden Ring',60000,10,'../Uploads/ImagenPrincipal/30.jpg','Disponible',3),(7,'White Wrist',25000,30,'../Uploads/ImagenPrincipal/38.jpg','Disponible',2),(8,'Silver Wrist',30000,30,'../Uploads/ImagenPrincipal/39.jpg','Disponible',2),(9,'Black Wrist',25000,25,'../Uploads/ImagenPrincipal/43.jpg','Disponible',2),(10,'Plate Collar',27000,10,'../Uploads/ImagenPrincipal/6.jpg','Disponible',1),(11,'Gray Collar',15000,15,'../Uploads/ImagenPrincipal/18.jpg','Disponible',1),(12,'White Collar',30000,25,'../Uploads/ImagenPrincipal/8.jpg','Disponible',1);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `carId` int(11) NOT NULL AUTO_INCREMENT,
  `sesionId` varchar(250) NOT NULL,
  `articuloId` int(11) NOT NULL,
  `artCarroCant` int(11) NOT NULL,
  PRIMARY KEY (`carId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (2,'fhrv31f5t593iarvnbo4m0qj6g',1,1),(3,'5upkndhdi0glvquvkaouu5oc9s',1,1),(4,'5upkndhdi0glvquvkaouu5oc9s',2,1);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`categoriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'COLLARES'),(2,'PULSERAS'),(3,'ANILLOS');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `clienteId` int(11) NOT NULL AUTO_INCREMENT,
  `clienteNombre` varchar(50) NOT NULL,
  `clienteApellido` varchar(50) NOT NULL,
  `clienteTelefono` varchar(10) NOT NULL,
  `clienteEmail` varchar(150) NOT NULL,
  `clienteContraseña` varchar(10) NOT NULL,
  PRIMARY KEY (`clienteId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'ANDRES FELIPE','REY PINO','3154272647','andresfrey97@gmail.com','123456');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `facturaId` int(11) NOT NULL AUTO_INCREMENT,
  `facturaFecha` date NOT NULL,
  `facturaCostoTotal` int(11) NOT NULL,
  `facturaClienteDoc` varchar(50) NOT NULL,
  `factura_tipoPagoId` int(11) NOT NULL,
  `facturaClienteId` int(11) NOT NULL,
  PRIMARY KEY (`facturaId`),
  KEY `fk_facturaClienteDoc` (`facturaClienteId`),
  KEY `fk_factura_tipoPagoId` (`factura_tipoPagoId`),
  CONSTRAINT `fk_facturaClienteDoc` FOREIGN KEY (`facturaClienteId`) REFERENCES `cliente` (`clienteId`),
  CONSTRAINT `fk_factura_tipoPagoId` FOREIGN KEY (`factura_tipoPagoId`) REFERENCES `tipopago` (`tipoPagoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,'2022-06-17',15000,'1098813441',1,1),(3,'2022-06-17',15000,'1098813441',1,1),(4,'2022-06-17',40000,'1098813441',1,1);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `pedidoId` int(11) NOT NULL,
  `pedidoFechaInicio` date NOT NULL,
  `pedidoFechaFin` date DEFAULT NULL,
  `pedidoEstado` varchar(20) NOT NULL,
  `pedidoClienteId` int(11) NOT NULL,
  `pedidoUsuarioId` int(11) DEFAULT NULL,
  `pedidoFacturaId` int(11) NOT NULL,
  `pedidoCostoTotal` int(11) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  KEY `fk_pedidoFacturaId` (`pedidoFacturaId`),
  KEY `fk_ordenClienteId` (`pedidoClienteId`),
  KEY `fk_pedidoUsuarioId` (`pedidoUsuarioId`),
  CONSTRAINT `fk_ordenClienteId` FOREIGN KEY (`pedidoClienteId`) REFERENCES `cliente` (`clienteId`),
  CONSTRAINT `fk_pedidoFacturaId` FOREIGN KEY (`pedidoFacturaId`) REFERENCES `factura` (`facturaId`),
  CONSTRAINT `fk_pedidoUsuarioId` FOREIGN KEY (`pedidoUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (2,'2022-06-17',NULL,'',1,NULL,2,15000),(3,'2022-06-17',NULL,'',1,NULL,3,15000),(4,'2022-06-17',NULL,'',1,NULL,4,40000);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqrs`
--

DROP TABLE IF EXISTS `pqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqrs` (
  `pqrsId` int(11) NOT NULL AUTO_INCREMENT,
  `pqrsNombre` varchar(200) NOT NULL,
  `pqrsMail` varchar(200) NOT NULL,
  `pqrsDescripcion` text NOT NULL,
  `pqrsTelefono` varchar(12) NOT NULL,
  `pqrsEstado` varchar(30) NOT NULL,
  `pqrsFecha` date NOT NULL,
  `pqrsClienteId` int(11) NOT NULL,
  `pqrsUsuarioId` int(11) NOT NULL,
  `pqrsOrigenId` int(11) NOT NULL,
  PRIMARY KEY (`pqrsId`),
  KEY `fk_pqrsClienteId` (`pqrsClienteId`),
  KEY `fk_pqrsUsuarioId` (`pqrsUsuarioId`),
  KEY `fk_pqrsOrigenId` (`pqrsOrigenId`),
  CONSTRAINT `fk_pqrsClienteId` FOREIGN KEY (`pqrsClienteId`) REFERENCES `cliente` (`clienteId`),
  CONSTRAINT `fk_pqrsOrigenId` FOREIGN KEY (`pqrsOrigenId`) REFERENCES `pqrstipo` (`pqrsTipoId`),
  CONSTRAINT `fk_pqrsUsuarioId` FOREIGN KEY (`pqrsUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqrs`
--

LOCK TABLES `pqrs` WRITE;
/*!40000 ALTER TABLE `pqrs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqrstipo`
--

DROP TABLE IF EXISTS `pqrstipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqrstipo` (
  `pqrsTipoId` int(11) NOT NULL AUTO_INCREMENT,
  `pqrsTipoNombre` varchar(30) NOT NULL,
  PRIMARY KEY (`pqrsTipoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqrstipo`
--

LOCK TABLES `pqrstipo` WRITE;
/*!40000 ALTER TABLE `pqrstipo` DISABLE KEYS */;
INSERT INTO `pqrstipo` VALUES (1,'GARANTIA'),(2,'PEDIDO'),(3,'CONSULTA');
/*!40000 ALTER TABLE `pqrstipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoporfactura`
--

DROP TABLE IF EXISTS `productoporfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productoporfactura` (
  `prodFactId` int(11) NOT NULL AUTO_INCREMENT,
  `prodFact_ArtId` int(11) NOT NULL,
  `prodFact_FactId` int(11) NOT NULL,
  `prodFactCantidad` int(11) NOT NULL,
  `prodFactPrecio` int(11) NOT NULL,
  PRIMARY KEY (`prodFactId`),
  KEY `fk_prodFact_ArtId` (`prodFact_ArtId`),
  KEY `fk_prodFact_FactId` (`prodFact_FactId`),
  CONSTRAINT `fk_prodFact_ArtId` FOREIGN KEY (`prodFact_ArtId`) REFERENCES `articulo` (`artId`),
  CONSTRAINT `fk_prodFact_FactId` FOREIGN KEY (`prodFact_FactId`) REFERENCES `factura` (`facturaId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoporfactura`
--

LOCK TABLES `productoporfactura` WRITE;
/*!40000 ALTER TABLE `productoporfactura` DISABLE KEYS */;
INSERT INTO `productoporfactura` VALUES (1,1,3,1,15000),(2,1,4,1,15000),(3,2,4,1,25000);
/*!40000 ALTER TABLE `productoporfactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoporpedido`
--

DROP TABLE IF EXISTS `productoporpedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productoporpedido` (
  `prodPedId` int(11) NOT NULL AUTO_INCREMENT,
  `prodPed_artId` int(11) NOT NULL,
  `prodPed_pedidoId` int(11) NOT NULL,
  `prodPedCant` int(11) NOT NULL,
  `prodPedValorArt` int(11) NOT NULL,
  PRIMARY KEY (`prodPedId`),
  KEY `fk_prodPed_artId` (`prodPed_artId`),
  KEY `fk_prodPed_pedidoId` (`prodPed_pedidoId`),
  CONSTRAINT `fk_prodPed_artId` FOREIGN KEY (`prodPed_artId`) REFERENCES `articulo` (`artId`),
  CONSTRAINT `fk_prodPed_pedidoId` FOREIGN KEY (`prodPed_pedidoId`) REFERENCES `pedido` (`pedidoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoporpedido`
--

LOCK TABLES `productoporpedido` WRITE;
/*!40000 ALTER TABLE `productoporpedido` DISABLE KEYS */;
INSERT INTO `productoporpedido` VALUES (1,1,3,1,15000),(2,1,4,1,15000),(3,2,4,1,25000);
/*!40000 ALTER TABLE `productoporpedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolNombre` varchar(45) NOT NULL,
  PRIMARY KEY (`rolId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMINISTRADOR'),(2,'EMPLEADO');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopago` (
  `tipoPagoId` int(11) NOT NULL,
  `tipoPagoNombre` varchar(30) NOT NULL,
  PRIMARY KEY (`tipoPagoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
INSERT INTO `tipopago` VALUES (1,'DEBITO'),(2,'CREDITO'),(3,'CONTRA-ENTREGA');
/*!40000 ALTER TABLE `tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariotienda`
--

DROP TABLE IF EXISTS `usuariotienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariotienda` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioNombre` varchar(50) NOT NULL,
  `usuarioApellido` varchar(50) NOT NULL,
  `usuarioDoc` varchar(12) NOT NULL,
  `usuarioRolId` int(11) NOT NULL,
  `usuarioContraseña` varchar(10) NOT NULL,
  `usuarioEstado` varchar(12) NOT NULL,
  PRIMARY KEY (`usuarioId`),
  UNIQUE KEY `UQ_usuarioDoc` (`usuarioDoc`),
  KEY `fk_usuarioRolId` (`usuarioRolId`),
  CONSTRAINT `fk_usuarioRolId` FOREIGN KEY (`usuarioRolId`) REFERENCES `rol` (`rolId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariotienda`
--

LOCK TABLES `usuariotienda` WRITE;
/*!40000 ALTER TABLE `usuariotienda` DISABLE KEYS */;
INSERT INTO `usuariotienda` VALUES (1,'ANDRES','FELIPE','1098813441',1,'123456','Activo');
/*!40000 ALTER TABLE `usuariotienda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-18  9:02:21
