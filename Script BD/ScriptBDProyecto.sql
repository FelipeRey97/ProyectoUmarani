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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,'New Ring',15000,13,'../Uploads/ImagenPrincipal/21.jpg','Disponible',3),(2,'Silver Collar',25000,48,'../Uploads/ImagenPrincipal/7.jpg','Disponible',1),(3,'Hand Collar',30000,25,'../Uploads/ImagenPrincipal/4.jpg','Disponible',1),(4,'Old Ring',145000,30,'../Uploads/ImagenPrincipal/23.jpg','Disponible',3),(5,'Silver Ring',40000,25,'../Uploads/ImagenPrincipal/26.jpg','Disponible',3),(6,'Golden Ring',60000,10,'../Uploads/ImagenPrincipal/30.jpg','Disponible',3),(7,'White Wrist',25000,30,'../Uploads/ImagenPrincipal/38.jpg','Disponible',2),(8,'Silver Wrist',30000,29,'../Uploads/ImagenPrincipal/39.jpg','Disponible',2),(9,'Black Wrist',25000,22,'../Uploads/ImagenPrincipal/43.jpg','Disponible',2),(10,'Plate Collar',27000,10,'../Uploads/ImagenPrincipal/6.jpg','Disponible',1),(11,'Gray Collar',15000,15,'../Uploads/ImagenPrincipal/18.jpg','Disponible',1),(12,'White Collar',30000,25,'../Uploads/ImagenPrincipal/8.jpg','Disponible',1),(13,'Winter Collar',15000,65,'../Uploads/ImagenPrincipal/14.png','Disponible',1),(14,'Summer Ring',50000,70,'../Uploads/ImagenPrincipal/22.jpg','Disponible',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (35,'u8tf64kgbjff3vf621q2dco7v9',1,2),(40,'qb2im5jugoc2cnhgmh43gpdrk5',12,2),(41,'qb2im5jugoc2cnhgmh43gpdrk5',11,2),(42,'qb2im5jugoc2cnhgmh43gpdrk5',8,2),(45,'ed0c1ai165pbdeb06enqeji2os',3,1),(46,'dmdq1oepl21a3glihc90nh377q',3,2),(47,'frd7dagjg8lgitlukbdqps9tl5',3,1),(48,'r7anhp94062ju30esbu38i0qjl',2,2),(49,'u82c9g6fp0rvndcer5ua4jp3p0',2,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'ANDRES FELIPE','REY PINO','3154272647','andresfrey97@gmail.com','123456'),(2,'MARIA','MENDEZ','','mariajosemendezmoros@gmail.com','123456'),(3,'CAMILO','PEREZ','','camiloperes@gmail.com','123456');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despacho`
--

DROP TABLE IF EXISTS `despacho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despacho` (
  `despachoId` varchar(250) NOT NULL,
  `despachoempresaId` int(11) NOT NULL,
  `despachoPedidoId` int(11) NOT NULL,
  `despachoUsuarioId` int(11) NOT NULL,
  `despachoFecha` date NOT NULL,
  PRIMARY KEY (`despachoId`),
  KEY `despachoempresaId` (`despachoempresaId`),
  KEY `despachoPedidoId` (`despachoPedidoId`),
  KEY `despachoUsuarioId` (`despachoUsuarioId`),
  CONSTRAINT `despacho_ibfk_1` FOREIGN KEY (`despachoempresaId`) REFERENCES `empresaenvio` (`empresaId`),
  CONSTRAINT `despacho_ibfk_2` FOREIGN KEY (`despachoPedidoId`) REFERENCES `pedido` (`pedidoId`),
  CONSTRAINT `despacho_ibfk_3` FOREIGN KEY (`despachoUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despacho`
--

LOCK TABLES `despacho` WRITE;
/*!40000 ALTER TABLE `despacho` DISABLE KEYS */;
INSERT INTO `despacho` VALUES ('ASD65F4865D',4,15,1,'0000-00-00'),('ASDF4954DF8',1,16,1,'2022-07-01'),('ASDF6548651',4,15,1,'2022-06-23'),('SD6F5G41F9G8',4,12,1,'2022-06-23'),('SD6F5G4F8',2,10,2,'2022-06-23'),('SDF548F135',3,11,2,'2022-06-23'),('SDF65486Q5',3,13,1,'2022-06-23');
/*!40000 ALTER TABLE `despacho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccionpedido`
--

DROP TABLE IF EXISTS `direccionpedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccionpedido` (
  `direccionId` int(11) NOT NULL,
  `direccionDep` varchar(35) NOT NULL,
  `direccionCiudad` varchar(50) NOT NULL,
  `direccionDomicilio` varchar(250) NOT NULL,
  PRIMARY KEY (`direccionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccionpedido`
--

LOCK TABLES `direccionpedido` WRITE;
/*!40000 ALTER TABLE `direccionpedido` DISABLE KEYS */;
INSERT INTO `direccionpedido` VALUES (2,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(3,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(4,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(7,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(9,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(10,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(11,'SANTANDER','FLORIDABLANCA','Calle 35 # 7-72'),(12,'SANTANDER','BUCARAMANGA','Calle 35 # 7-72 Torre Gardenia 202'),(13,'SANTANDER','FLORIDABLANCA','Calle 35 # 7-72'),(15,'SANTANDER','FLORIDABLANCA','Calle 48 # 21-84 Cañaveral'),(16,'SANTANDER','BUCARAMANGA','Calle 35 # 7 -72 '),(17,'CUNDINAMARCA','BOGOTA','Calle 10 # 20 - 30 ');
/*!40000 ALTER TABLE `direccionpedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpto`
--

DROP TABLE IF EXISTS `dpto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dpto` (
  `dptoId` int(11) NOT NULL AUTO_INCREMENT,
  `dptoNombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`dptoId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpto`
--

LOCK TABLES `dpto` WRITE;
/*!40000 ALTER TABLE `dpto` DISABLE KEYS */;
INSERT INTO `dpto` VALUES (1,'Amazonas'),(2,'Antioquia'),(3,'Arauca'),(4,'Atlantico'),(5,'Bogotá'),(6,'Bolivar'),(7,'Boyaca'),(8,'Caldas'),(9,'Caqueta'),(10,'Casanare'),(11,'Cauca'),(12,'Cesar'),(13,'Choco'),(14,'Cordoba'),(15,'Cundinamarca'),(16,'Guainia'),(17,'Guaviare'),(18,'Huila'),(19,'La Guajira'),(20,'Magdalena'),(21,'Meta'),(22,'Nariño'),(23,'Norte de Santander '),(24,'Putumayo'),(25,'Quindío'),(26,'Risaralda'),(27,'San Andres y Providencia'),(28,'Santander'),(29,'Sucre'),(30,'Tolima'),(31,'Valle del Cauca'),(32,'Vaupes'),(33,'Vichada');
/*!40000 ALTER TABLE `dpto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresaenvio`
--

DROP TABLE IF EXISTS `empresaenvio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresaenvio` (
  `empresaId` int(11) NOT NULL AUTO_INCREMENT,
  `empresaNombre` varchar(200) NOT NULL,
  PRIMARY KEY (`empresaId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresaenvio`
--

LOCK TABLES `empresaenvio` WRITE;
/*!40000 ALTER TABLE `empresaenvio` DISABLE KEYS */;
INSERT INTO `empresaenvio` VALUES (1,'INTER RAPIDISIMO'),(2,'ENVIA'),(3,'COORDINADORA'),(4,'SERVIENTREGA');
/*!40000 ALTER TABLE `empresaenvio` ENABLE KEYS */;
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
  `facturaClienteDireccion` varchar(250) NOT NULL,
  `facturaImpuestoId` int(11) NOT NULL,
  PRIMARY KEY (`facturaId`),
  KEY `fk_facturaClienteDoc` (`facturaClienteId`),
  KEY `fk_factura_tipoPagoId` (`factura_tipoPagoId`),
  KEY `impuestoId` (`facturaImpuestoId`),
  CONSTRAINT `fk_facturaClienteDoc` FOREIGN KEY (`facturaClienteId`) REFERENCES `cliente` (`clienteId`),
  CONSTRAINT `fk_factura_tipoPagoId` FOREIGN KEY (`factura_tipoPagoId`) REFERENCES `tipopago` (`tipoPagoId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,'2022-06-17',15000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(3,'2022-06-17',15000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(4,'2022-06-17',40000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(7,'2022-06-18',30000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(9,'2022-06-18',175000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(10,'2022-06-18',55000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 ',1),(11,'2022-06-19',540000,'1098813441',1,1,'$direccionCompleta',1),(12,'2022-06-19',160000,'1098813441',1,1,'Calle 35 # 7-72 Torre Gardenia 202 BUCARAMANGA - SANTANDER',1),(13,'2022-06-20',72000,'1437336',2,2,'Calle 35 # 7-72  FLORIDABLANCA - SANTANDER',1),(14,'2022-06-22',25000,'1098813441',1,1,'Calle 25 # 14-10 Unilago BOGOTA D.C - CUNDINAMARCA',1),(15,'2022-06-22',75000,'1098813441',1,1,'Calle 48 # 21-84 Cañaveral FLORIDABLANCA - SANTANDER',1),(16,'2022-06-30',60000,'1098813441',1,1,'Calle 35 # 7 -72  BUCARAMANGA - SANTANDER',1),(17,'2022-07-16',25000,'1098813441',1,1,'Calle 10 # 20 - 30  BOGOTA - CUNDINAMARCA',1);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto`
--

DROP TABLE IF EXISTS `impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuesto` (
  `impuestoId` int(11) NOT NULL AUTO_INCREMENT,
  `impNombre` varchar(10) NOT NULL,
  `impValor` float NOT NULL,
  PRIMARY KEY (`impuestoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES (1,'IVA',0.19);
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
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
  `pedidoEstado` varchar(20) NOT NULL DEFAULT 'Pendiente',
  `pedidoClienteId` int(11) NOT NULL,
  `pedidoUsuarioId` int(11) DEFAULT NULL,
  `pedidoFacturaId` int(11) NOT NULL,
  `pedidoCostoTotal` int(11) NOT NULL,
  `pedidoDireccionId` bigint(20) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  KEY `fk_pedidoFacturaId` (`pedidoFacturaId`),
  KEY `fk_ordenClienteId` (`pedidoClienteId`),
  KEY `fk_pedidoUsuarioId` (`pedidoUsuarioId`),
  KEY `direccionpedido` (`pedidoDireccionId`),
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
INSERT INTO `pedido` VALUES (2,'2022-06-17',NULL,'Pendiente',1,NULL,2,15000,2),(3,'2022-06-17',NULL,'Pendiente',1,NULL,3,15000,3),(4,'2022-06-17',NULL,'Pendiente',1,NULL,4,40000,4),(7,'2022-06-18',NULL,'Pendiente',1,NULL,7,30000,7),(9,'2022-06-18',NULL,'Pendiente',1,NULL,9,175000,9),(10,'2022-06-18',NULL,'Enviado',1,NULL,10,55000,10),(11,'2022-06-19',NULL,'Enviado',1,NULL,11,540000,11),(12,'2022-06-19',NULL,'Enviado',1,NULL,12,160000,12),(13,'2022-06-20',NULL,'Enviado',2,1,13,72000,13),(14,'2022-06-22',NULL,'Pendiente',1,NULL,14,25000,0),(15,'2022-06-22',NULL,'Enviado',1,NULL,15,75000,15),(16,'2022-06-30',NULL,'Enviado',1,NULL,16,60000,16),(17,'2022-07-16',NULL,'Pendiente',1,NULL,17,25000,17);
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
  `pqrsEstado` varchar(30) NOT NULL DEFAULT 'Pendiente',
  `pqrsFecha` date NOT NULL,
  `pqrsClienteId` int(11) DEFAULT NULL,
  `pqrsUsuarioId` int(11) DEFAULT NULL,
  `pqrsOrigenId` int(11) NOT NULL,
  `pqrsPedidoId` int(11) DEFAULT NULL,
  `pqrsImagen` varchar(250) NOT NULL,
  PRIMARY KEY (`pqrsId`),
  KEY `fk_pqrsUsuarioId` (`pqrsUsuarioId`),
  KEY `fk_pqrsOrigenId` (`pqrsOrigenId`),
  KEY `fk_pqrsClienteId` (`pqrsClienteId`),
  CONSTRAINT `fk_pqrsClienteId` FOREIGN KEY (`pqrsClienteId`) REFERENCES `cliente` (`clienteId`),
  CONSTRAINT `fk_pqrsOrigenId` FOREIGN KEY (`pqrsOrigenId`) REFERENCES `pqrstipo` (`pqrsTipoId`),
  CONSTRAINT `fk_pqrsUsuarioId` FOREIGN KEY (`pqrsUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqrs`
--

LOCK TABLES `pqrs` WRITE;
/*!40000 ALTER TABLE `pqrs` DISABLE KEYS */;
INSERT INTO `pqrs` VALUES (1,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','quiero realizar una consulta','3154272647','Atendida','2022-06-24',NULL,NULL,3,NULL,''),(2,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','mi pedido esta demorado.','3154272647','Atendida','2022-06-24',1,NULL,2,15,''),(3,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','mi anillo llego malo','3154272647','Atendida','2022-06-24',1,NULL,1,15,'../Uploads/ReclamoImagen/26.jpg'),(4,'ANDRES FELIPE REY PINO','ledypino@outlook.com','quiero realizar una consulta','3154272647','Atendida','2022-06-25',NULL,NULL,3,NULL,''),(5,'ANDRES FELIPE REY PINO','ledypino@outlook.com','quiero realizar una consulta','3154272647','Pendiente','2022-06-25',NULL,NULL,3,NULL,''),(6,'ANDRES FELIPE REY PINO','ledypino@outlook.com','quiero realizar una consulta','3154272647','Pendiente','2022-06-25',NULL,NULL,3,NULL,''),(7,'ANDRES FELIPE REY PINO','ledypino@outlook.com','quiero realizar una consulta','3154272647','Pendiente','2022-06-25',NULL,NULL,3,NULL,''),(8,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','el anillo ha llegado con defectos','3154272647','Pendiente','2022-06-25',1,NULL,1,15,'../Uploads/ReclamoImagen/27.jpg'),(9,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','El anillo me ha llegado con defectos','3154272647','Pendiente','2022-06-25',1,NULL,1,15,'../Uploads/ReclamoImagen/28.jpg'),(10,'ANDRES FELIPE REY PINO','andresfrey97@gmail.com','El pedido está demorado de hace una semana. ','3154272647','Atendida','2022-06-25',1,NULL,2,15,''),(11,'MAURICIO FERNANDEZ','marullas@gmail.com','Donde puedo ubicarlos','3163458908','Atendida','2022-06-29',NULL,NULL,3,NULL,'');
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
  `prodFact_ArtId` int(11) NOT NULL,
  `prodFact_FactId` int(11) NOT NULL,
  `prodFactCantidad` int(11) NOT NULL,
  `prodFactPrecio` int(11) NOT NULL,
  KEY `fk_prodFact_ArtId` (`prodFact_ArtId`),
  KEY `fk_prodFact_FactId` (`prodFact_FactId`),
  CONSTRAINT `fk_prodFact_ArtId` FOREIGN KEY (`prodFact_ArtId`) REFERENCES `articulo` (`artId`),
  CONSTRAINT `fk_prodFact_FactId` FOREIGN KEY (`prodFact_FactId`) REFERENCES `factura` (`facturaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoporfactura`
--

LOCK TABLES `productoporfactura` WRITE;
/*!40000 ALTER TABLE `productoporfactura` DISABLE KEYS */;
INSERT INTO `productoporfactura` VALUES (1,3,1,15000),(1,4,1,15000),(2,4,1,25000),(3,7,1,30000),(3,9,1,30000),(4,9,1,145000),(3,10,1,30000),(2,10,1,25000),(2,11,2,25000),(3,11,1,30000),(4,11,3,145000),(7,11,1,25000),(2,12,2,25000),(1,12,3,15000),(5,12,1,40000),(9,12,1,25000),(10,13,1,27000),(3,13,1,30000),(11,13,1,15000),(2,14,1,25000),(9,15,3,25000),(1,16,2,15000),(8,16,1,30000),(2,17,1,25000);
/*!40000 ALTER TABLE `productoporfactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoporpedido`
--

DROP TABLE IF EXISTS `productoporpedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productoporpedido` (
  `prodPed_artId` int(11) NOT NULL,
  `prodPed_pedidoId` int(11) NOT NULL,
  `prodPedCant` int(11) NOT NULL,
  `prodPedValorArt` int(11) NOT NULL,
  KEY `fk_prodPed_artId` (`prodPed_artId`),
  KEY `fk_prodPed_pedidoId` (`prodPed_pedidoId`),
  CONSTRAINT `fk_prodPed_artId` FOREIGN KEY (`prodPed_artId`) REFERENCES `articulo` (`artId`),
  CONSTRAINT `fk_prodPed_pedidoId` FOREIGN KEY (`prodPed_pedidoId`) REFERENCES `pedido` (`pedidoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoporpedido`
--

LOCK TABLES `productoporpedido` WRITE;
/*!40000 ALTER TABLE `productoporpedido` DISABLE KEYS */;
INSERT INTO `productoporpedido` VALUES (1,3,1,15000),(1,4,1,15000),(2,4,1,25000),(3,7,1,30000),(3,9,1,30000),(4,9,1,145000),(3,10,1,30000),(2,10,1,25000),(2,11,2,25000),(3,11,1,30000),(4,11,3,145000),(7,11,1,25000),(2,12,2,25000),(1,12,3,15000),(5,12,1,40000),(9,12,1,25000),(10,13,1,27000),(3,13,1,30000),(11,13,1,15000),(2,14,1,25000),(9,15,3,25000),(1,16,2,15000),(8,16,1,30000),(2,17,1,25000);
/*!40000 ALTER TABLE `productoporpedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolucion`
--

DROP TABLE IF EXISTS `resolucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resolucion` (
  `resolucionId` int(11) NOT NULL,
  `resolucionUsuarioId` int(11) NOT NULL,
  `resolucionpqrsId` int(11) NOT NULL,
  `resolucionMensaje` varchar(500) NOT NULL,
  `resolucionFecha` date NOT NULL,
  PRIMARY KEY (`resolucionId`),
  KEY `resolucionUsuarioId` (`resolucionUsuarioId`),
  KEY `resolucionpqrsId` (`resolucionpqrsId`),
  CONSTRAINT `resolucion_ibfk_1` FOREIGN KEY (`resolucionUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`),
  CONSTRAINT `resolucion_ibfk_2` FOREIGN KEY (`resolucionpqrsId`) REFERENCES `pqrs` (`pqrsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolucion`
--

LOCK TABLES `resolucion` WRITE;
/*!40000 ALTER TABLE `resolucion` DISABLE KEYS */;
INSERT INTO `resolucion` VALUES (1,2,1,'la acabas de realizar, buen dia. ','2022-06-28'),(2,2,2,'y lo solicito en verde? ','2022-06-28'),(3,1,3,'is simply dummy text of the printing and typesetting industry.','2022-06-29'),(4,2,4,'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing so','2022-06-29'),(10,1,10,'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda ','2022-07-01'),(11,2,11,'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various vers','2022-06-29');
/*!40000 ALTER TABLE `resolucion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariotienda`
--

LOCK TABLES `usuariotienda` WRITE;
/*!40000 ALTER TABLE `usuariotienda` DISABLE KEYS */;
INSERT INTO `usuariotienda` VALUES (1,'ANDRES','FELIPE','1098813441',1,'123456','Activo'),(2,'MARIA','MENDEZ','1437336',2,'123456','Activo'),(3,'LEDY','PINO BUSTOS','63299825',2,'Umarani202','Activo');
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

-- Dump completed on 2022-07-16  9:06:22
