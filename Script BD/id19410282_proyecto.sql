-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-08-2022 a las 21:59:30
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19410282_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `artId` int(11) NOT NULL,
  `artNombre` varchar(150) NOT NULL,
  `artPrecio` int(11) NOT NULL,
  `artCantidad` int(11) NOT NULL,
  `artVista` varchar(250) NOT NULL,
  `artEstado` varchar(15) NOT NULL,
  `artCategoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`artId`, `artNombre`, `artPrecio`, `artCantidad`, `artVista`, `artEstado`, `artCategoriaId`) VALUES
(1, 'New Ring', 15000, 12, '../Uploads/ImagenPrincipal/21.jpg', 'Disponible', 3),
(2, 'Silver Collar', 25000, 32, '../Uploads/ImagenPrincipal/7.jpg', 'Disponible', 1),
(3, 'Hand Collar', 30000, 10, '../Uploads/ImagenPrincipal/4.jpg', 'Disponible', 1),
(4, 'Old Ring', 145000, 24, '../Uploads/ImagenPrincipal/23.jpg', 'Disponible', 3),
(5, 'Silver Ring', 40000, 23, '../Uploads/ImagenPrincipal/26.jpg', 'Disponible', 3),
(6, 'Golden Ring', 60000, 7, '../Uploads/ImagenPrincipal/30.jpg', 'Disponible', 3),
(7, 'White Wrist', 25000, 27, '../Uploads/ImagenPrincipal/38.jpg', 'Disponible', 2),
(8, 'Silver Wrist', 30000, 27, '../Uploads/ImagenPrincipal/39.jpg', 'Disponible', 2),
(9, 'Black Wrist', 25000, 17, '../Uploads/ImagenPrincipal/43.jpg', 'Disponible', 2),
(10, 'Plate Collar', 27000, 9, '../Uploads/ImagenPrincipal/6.jpg', 'Disponible', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carId` int(11) NOT NULL,
  `sesionId` varchar(250) NOT NULL,
  `articuloId` int(11) NOT NULL,
  `artCarroCant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carId`, `sesionId`, `articuloId`, `artCarroCant`) VALUES
(123, 'u71d2b9tcf7oicuhijbg3g6oot', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoriaId` int(11) NOT NULL,
  `categoriaNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoriaId`, `categoriaNombre`) VALUES
(1, 'COLLARES'),
(2, 'PULSERAS'),
(3, 'ANILLOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `clienteId` int(11) NOT NULL,
  `clienteNombre` varchar(50) NOT NULL,
  `clienteApellido` varchar(50) NOT NULL,
  `clienteTelefono` varchar(10) DEFAULT NULL,
  `clienteEmail` varchar(150) NOT NULL,
  `clienteContraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`clienteId`, `clienteNombre`, `clienteApellido`, `clienteTelefono`, `clienteEmail`, `clienteContraseña`) VALUES
(35, 'ANDRES FELIPE', 'REY PINO', '', 'andresfrey97@gmail.com', '$2y$10$hdoMgLMtDGaPeUCVBpO9v.d2BJ2FQzqwzv3W7vHqi4BjEA7nhFvqO'),
(36, 'MARIA', 'MENDEZ', '', 'mariamendez@gmail.com', '$2y$10$zYg1acWTnNZ/5gtz1OeQOO1YMdNPcLOpTtx2GFqXIA6ruZqSN/wty'),
(37, 'LEDY', 'BUSTOS', '', 'ledybustos@gmail.com', '$2y$10$05hvHN/V6Cx85XTYmLD8w.ndMiP1sonKUyfl6sdJ4LsnSHWuyKlY2'),
(38, 'JUAN', 'PEREZ', '', 'perez_juan@gmail.com', '$2y$10$DDyPkxHcpG5HPxGZdZ.QDOd8uRjwePI/mt.iUTfxSMcl2JB.aR5tS'),
(39, 'ANDRES FELIPE', 'LOPEZ', NULL, 'andresfrey971@gmail.com', '$2y$10$yBHfn39fk.zPuoNJbS0WbO9qCgxQlgrc5LUcwLzQ4lvZgPYA/Ula2'),
(40, 'ANDRES FELIPE', 'SUAREZ', NULL, 'andresfrey9712@gmail.com', '$2y$10$KdYNLdVIzgaQ0M91p94DSek1aL82A0mCGwN3r8IHFNLdk8/LII.Le'),
(41, 'ANDRES FELIPE', 'SUAREZ', NULL, 'andresfrey97123@gmail.com', '$2y$10$CmOz01B.fRy8CeTQCs2/LuhoLxoSyJ8B6hVlxdRT3wd45t1j1JCF2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `despacho` (
  `despachoId` varchar(250) NOT NULL,
  `despachoempresaId` int(11) NOT NULL,
  `despachoPedidoId` int(11) NOT NULL,
  `despachoUsuarioId` int(11) NOT NULL,
  `desp_Unombre` varchar(200) NOT NULL,
  `despachoFecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `despacho`
--

INSERT INTO `despacho` (`despachoId`, `despachoempresaId`, `despachoPedidoId`, `despachoUsuarioId`, `desp_Unombre`, `despachoFecha`) VALUES
('ASDF07SD98F7', 4, 42, 43, 'ANDRES REY', '2022-08-13'),
('S979F8DS7F8D7F', 3, 41, 43, '', '2022-08-13'),
('SD0F9D8F9D8FD', 1, 40, 43, 'ANDRES REY', '2022-08-13'),
('SDF09F8D09F8', 1, 41, 43, '', '2022-08-13'),
('SDF32G1F5489F123', 2, 34, 45, 'DANIELA RODRIGUEZ', '2022-08-11'),
('SDF908SD9F8', 1, 42, 43, 'ANDRES REY', '2022-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionpedido`
--

CREATE TABLE `direccionpedido` (
  `direccionId` int(11) NOT NULL,
  `direccionDep` varchar(35) NOT NULL,
  `direccionCiudad` varchar(50) NOT NULL,
  `direccionDomicilio` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccionpedido`
--

INSERT INTO `direccionpedido` (`direccionId`, `direccionDep`, `direccionCiudad`, `direccionDomicilio`) VALUES
(30, 'SANTANDER', 'Bucaramanga', 'Calle 35 # 7 - 72 Torre 2 202'),
(31, 'CUNDINAMARCA', 'Bogota', 'Calle 30 # 10 - 20 Torre 3 501'),
(32, 'ANTIOQUIA', 'Medellin', 'Calle 10 # 20 - 30 Torre B 502'),
(33, 'ANTIOQUIA', 'Medellin', 'Calle 30 # 10 - 20 Torre B 502'),
(34, 'VALLE DEL CAUCA', 'Cali', 'Calle 10 # 20 - 30 Torre A  Apto 501'),
(35, 'BOYACA', 'Tunja', 'Calle 35 # 7 - 72 Torre B 502'),
(36, 'BOYACA', 'Tunja', 'Calle 35 # 7 - 72 Torre B 502'),
(37, 'BOYACA', 'Tunja', 'Calle 35 # 7 - 72 Torre B 502'),
(38, 'BOYACA', 'Tunja', 'Calle 35 # 7 - 72 Torre B 502'),
(39, 'CUNDINAMARCA', 'Bogota', 'Calle 30 # 10 - 20 Torre B 502'),
(40, 'CUNDINAMARCA', 'Bogota', 'Calle 30 # 10 - 20 Torre B 502'),
(41, 'CUNDINAMARCA', 'Bogota', 'Calle 30 # 10 - 20 Torre B 502'),
(42, 'HUILA', 'Gigante', 'Calle 35 # 7 - 72 Torre B 502');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpto`
--

CREATE TABLE `dpto` (
  `dptoId` int(11) NOT NULL,
  `dptoNombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `dpto`
--

INSERT INTO `dpto` (`dptoId`, `dptoNombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlantico'),
(5, 'Bogotá'),
(6, 'Bolivar'),
(7, 'Boyaca'),
(8, 'Caldas'),
(9, 'Caqueta'),
(10, 'Casanare'),
(11, 'Cauca'),
(12, 'Cesar'),
(13, 'Choco'),
(14, 'Cordoba'),
(15, 'Cundinamarca'),
(16, 'Guainia'),
(17, 'Guaviare'),
(18, 'Huila'),
(19, 'La Guajira'),
(20, 'Magdalena'),
(21, 'Meta'),
(22, 'Nariño'),
(23, 'Norte de Santander '),
(24, 'Putumayo'),
(25, 'Quindío'),
(26, 'Risaralda'),
(27, 'San Andres y Providencia'),
(28, 'Santander'),
(29, 'Sucre'),
(30, 'Tolima'),
(31, 'Valle del Cauca'),
(32, 'Vaupes'),
(33, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresaenvio`
--

CREATE TABLE `empresaenvio` (
  `empresaId` int(11) NOT NULL,
  `empresaNombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresaenvio`
--

INSERT INTO `empresaenvio` (`empresaId`, `empresaNombre`) VALUES
(1, 'INTER RAPIDISIMO'),
(2, 'ENVIA'),
(3, 'COORDINADORA'),
(4, 'SERVIENTREGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `facturaId` int(11) NOT NULL,
  `facturaFecha` date NOT NULL,
  `facturaCostoTotal` int(11) NOT NULL,
  `facturaClienteDoc` varchar(50) NOT NULL,
  `factura_tipoPagoId` int(11) NOT NULL,
  `facturaClienteId` int(11) NOT NULL,
  `facturaClienteDireccion` varchar(250) NOT NULL,
  `facturaClTelefono` varchar(10) NOT NULL,
  `facturaImpuestoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`facturaId`, `facturaFecha`, `facturaCostoTotal`, `facturaClienteDoc`, `factura_tipoPagoId`, `facturaClienteId`, `facturaClienteDireccion`, `facturaClTelefono`, `facturaImpuestoId`) VALUES
(30, '2022-08-04', 55000, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre 2 202 Bucaramanga - SANTANDER', '3154272647', 1),
(31, '2022-08-04', 175000, '1437336', 1, 36, 'Calle 30 # 10 - 20 Torre 3 501 Bogota - CUNDINAMARCA', '3165736791', 1),
(32, '2022-08-04', 285000, '63299825', 1, 37, 'Calle 10 # 20 - 30 Torre B 502 Medellin - ANTIOQUIA', '3155745620', 1),
(33, '2022-08-04', 145000, '63299825', 1, 37, 'Calle 30 # 10 - 20 Torre B 502 Medellin - ANTIOQUIA', '3155745620', 1),
(34, '2022-08-07', 155000, '1062310019', 1, 38, 'Calle 10 # 20 - 30 Torre A  Apto 501 Cali - VALLE DEL CAUCA', '3155745620', 1),
(35, '2022-08-13', 530000, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre B 502 Tunja - BOYACA', '3155745620', 1),
(36, '2022-08-13', 530000, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre B 502 Tunja - BOYACA', '3155745620', 1),
(37, '2022-08-13', 530000, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre B 502 Tunja - BOYACA', '3155745620', 1),
(38, '2022-08-13', 0, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre B 502 Tunja - BOYACA', '3155745620', 1),
(39, '2022-08-13', 55000, '1098813441', 1, 35, 'Calle 30 # 10 - 20 Torre B 502 Bogota - CUNDINAMARCA', '3154272647', 1),
(40, '2022-08-13', 0, '1098813441', 1, 35, 'Calle 30 # 10 - 20 Torre B 502 Bogota - CUNDINAMARCA', '3154272647', 1),
(41, '2022-08-13', 0, '1098813441', 1, 35, 'Calle 30 # 10 - 20 Torre B 502 Bogota - CUNDINAMARCA', '3154272647', 1),
(42, '2022-08-13', 25000, '1098813441', 1, 35, 'Calle 35 # 7 - 72 Torre B 502 Gigante - HUILA', '3154272647', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto`
--

CREATE TABLE `impuesto` (
  `impuestoId` int(11) NOT NULL,
  `impNombre` varchar(10) NOT NULL,
  `impValor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `impuesto`
--

INSERT INTO `impuesto` (`impuestoId`, `impNombre`, `impValor`) VALUES
(1, 'IVA', 0.19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `pedidoId` int(11) NOT NULL,
  `pedidoFechaInicio` date NOT NULL,
  `pedidoFechaFin` date DEFAULT NULL,
  `pedidoEstado` varchar(20) NOT NULL DEFAULT 'Pendiente',
  `pedidoClienteId` int(11) NOT NULL,
  `pedidoClTelefono` varchar(10) NOT NULL,
  `pedidoUsuarioId` int(11) DEFAULT NULL,
  `pedidoFacturaId` int(11) NOT NULL,
  `pedidoCostoTotal` int(11) NOT NULL,
  `pedidoDireccionId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `pedidoFechaInicio`, `pedidoFechaFin`, `pedidoEstado`, `pedidoClienteId`, `pedidoClTelefono`, `pedidoUsuarioId`, `pedidoFacturaId`, `pedidoCostoTotal`, `pedidoDireccionId`) VALUES
(30, '2022-08-04', NULL, 'Cancelado', 35, '3154272647', NULL, 30, 55000, 30),
(31, '2022-08-04', NULL, 'Enviado', 36, '3165736791', NULL, 31, 175000, 31),
(32, '2022-08-04', NULL, 'Enviado', 37, '3155745620', NULL, 32, 285000, 32),
(33, '2022-08-04', NULL, 'Enviado', 37, '3155745620', NULL, 33, 145000, 33),
(34, '2022-08-07', NULL, 'Enviado', 38, '3155745620', NULL, 34, 155000, 34),
(35, '2022-08-13', NULL, 'Pendiente', 35, '3155745620', NULL, 35, 530000, 35),
(36, '2022-08-13', NULL, 'Pendiente', 35, '3155745620', NULL, 36, 530000, 36),
(37, '2022-08-13', NULL, 'Pendiente', 35, '3155745620', NULL, 37, 530000, 37),
(38, '2022-08-13', NULL, 'Pendiente', 35, '3155745620', NULL, 38, 0, 38),
(39, '2022-08-13', NULL, 'Pendiente', 35, '3154272647', NULL, 39, 55000, 39),
(40, '2022-08-13', NULL, 'Cancelado', 35, '3154272647', NULL, 40, 0, 40),
(41, '2022-08-13', NULL, 'Enviado', 35, '3154272647', NULL, 41, 0, 41),
(42, '2022-08-13', NULL, 'Enviado', 35, '3154272647', NULL, 42, 25000, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrs`
--

CREATE TABLE `pqrs` (
  `pqrsId` int(11) NOT NULL,
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
  `pqrsImagen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pqrs`
--

INSERT INTO `pqrs` (`pqrsId`, `pqrsNombre`, `pqrsMail`, `pqrsDescripcion`, `pqrsTelefono`, `pqrsEstado`, `pqrsFecha`, `pqrsClienteId`, `pqrsUsuarioId`, `pqrsOrigenId`, `pqrsPedidoId`, `pqrsImagen`) VALUES
(20, 'LEDY BUSTOS', 'ledybustos@gmail.com', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os', '3165736791', 'Atendida', '2022-08-05', NULL, NULL, 1, 32, '../Uploads/ReclamoImagen/índice.jpg'),
(21, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Buenas tardes, me comunico para saber por qu&eacute; raz&oacute;n mi pedido ha sido cancelado. Gracias.', '3154272647', 'Atendida', '2022-08-05', NULL, NULL, 2, 30, ''),
(22, 'CARLOS PEREZ', 'perezc@gmail.com', 'El trozo de texto est&aacute;ndar de Lorem Ipsum usado desde el a&ntilde;o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot; por Cicero son tambi&eacute;n reproducidas en su forma original exacta, acompa&ntilde;adas por versiones en Ingl&eacute;s de la traducci&oacute;n realizada en 1914 por H. Rackham.', '3001242568', 'Pendiente', '2022-08-05', NULL, NULL, 3, NULL, ''),
(23, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Buenas tardes, me comunico cordialmente con ustedes para consultar si ac&aacute; en Medell&iacute;n - Antioquia disponen de tiendas f&iacute;sicas, para saber su ubicaci&oacute;n sus horarios de atenci&oacute;n, sin m&aacute;s que decir me despido agradeciendo de antemano la atenci&oacute;n brindada.', '3154272647', 'Pendiente', '2022-08-07', NULL, NULL, 3, NULL, ''),
(24, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto', '3001242568', 'Pendiente', '2022-08-13', NULL, NULL, 3, NULL, NULL),
(25, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto', '3001242568', 'Pendiente', '2022-08-13', NULL, NULL, 3, NULL, NULL),
(26, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto', '3001242568', 'Pendiente', '2022-08-13', NULL, NULL, 3, NULL, NULL),
(27, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto', '3001242568', 'Pendiente', '2022-08-13', NULL, NULL, 3, NULL, NULL),
(28, 'ANDRES FELIPE REY PINO', 'andresfrey97@gmail.com', 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto', '3001242568', 'Atendida', '2022-08-13', NULL, NULL, 1, 32, '../Uploads/ReclamoImagen/32.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrstipo`
--

CREATE TABLE `pqrstipo` (
  `pqrsTipoId` int(11) NOT NULL,
  `pqrsTipoNombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pqrstipo`
--

INSERT INTO `pqrstipo` (`pqrsTipoId`, `pqrsTipoNombre`) VALUES
(1, 'GARANTIA'),
(2, 'PEDIDO'),
(3, 'CONSULTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoporfactura`
--

CREATE TABLE `productoporfactura` (
  `prodFact_ArtId` int(11) NOT NULL,
  `prodFact_FactId` int(11) NOT NULL,
  `prodFactCantidad` int(11) NOT NULL,
  `prodFactPrecio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoporfactura`
--

INSERT INTO `productoporfactura` (`prodFact_ArtId`, `prodFact_FactId`, `prodFactCantidad`, `prodFactPrecio`) VALUES
(2, 30, 1, 25000),
(3, 30, 1, 30000),
(3, 31, 1, 30000),
(4, 31, 1, 145000),
(6, 32, 1, 60000),
(3, 32, 1, 30000),
(4, 32, 1, 145000),
(2, 32, 2, 25000),
(6, 33, 2, 60000),
(9, 33, 1, 25000),
(9, 34, 2, 25000),
(8, 34, 1, 30000),
(7, 34, 3, 25000),
(2, 35, 4, 25000),
(3, 35, 2, 30000),
(4, 35, 2, 145000),
(5, 35, 2, 40000),
(3, 39, 1, 30000),
(2, 39, 1, 25000),
(2, 42, 1, 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoporpedido`
--

CREATE TABLE `productoporpedido` (
  `prodPed_artId` int(11) NOT NULL,
  `prodPed_pedidoId` int(11) NOT NULL,
  `prodPedCant` int(11) NOT NULL,
  `prodPedValorArt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoporpedido`
--

INSERT INTO `productoporpedido` (`prodPed_artId`, `prodPed_pedidoId`, `prodPedCant`, `prodPedValorArt`) VALUES
(2, 30, 1, 25000),
(3, 30, 1, 30000),
(3, 31, 1, 30000),
(4, 31, 1, 145000),
(6, 32, 1, 60000),
(3, 32, 1, 30000),
(4, 32, 1, 145000),
(2, 32, 2, 25000),
(6, 33, 2, 60000),
(9, 33, 1, 25000),
(9, 34, 2, 25000),
(8, 34, 1, 30000),
(7, 34, 3, 25000),
(2, 35, 4, 25000),
(3, 35, 2, 30000),
(4, 35, 2, 145000),
(5, 35, 2, 40000),
(3, 39, 1, 30000),
(2, 39, 1, 25000),
(2, 42, 1, 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resolucion`
--

CREATE TABLE `resolucion` (
  `resolucionId` int(11) NOT NULL,
  `resolucionUsuarioId` int(11) NOT NULL,
  `Res_Unombre` varchar(200) NOT NULL,
  `resolucionpqrsId` int(11) NOT NULL,
  `resolucionMensaje` varchar(1000) NOT NULL,
  `resolucionFecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resolucion`
--

INSERT INTO `resolucion` (`resolucionId`, `resolucionUsuarioId`, `Res_Unombre`, `resolucionpqrsId`, `resolucionMensaje`, `resolucionFecha`) VALUES
(21, 42, 'MARIA MENDEZ ', 21, 'Ut volutpat nisi et tellus efficitur fermentum a eget dolor. Mauris posuere odio at erat laoreet sollicitudin. Etiam ullamcorper placerat velit, accumsan interdum velit mollis vitae. Duis ante neque, aliquet non iaculis a, blandit sed ante. Morbi consectetur, est iaculis fringilla iaculis, lorem est sagittis turpis, non condimentum augue erat ut purus. Morbi non dolor et dui placerat condimentum. Proin imperdiet sapien eget tellus facilisis hendrerit.', '2022-08-11'),
(28, 43, 'ANDRES REY ', 28, 'Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una b&uacute;squeda de &quot;Lorem Ipsum&quot; va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo', '2022-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rolId` int(11) NOT NULL,
  `rolNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rolId`, `rolNombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'EMPLEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `tipoPagoId` int(11) NOT NULL,
  `tipoPagoNombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`tipoPagoId`, `tipoPagoNombre`) VALUES
(1, 'DEBITO'),
(2, 'CREDITO'),
(3, 'CONTRA-ENTREGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariotienda`
--

CREATE TABLE `usuariotienda` (
  `usuarioId` int(11) NOT NULL,
  `usuarioNombre` varchar(50) NOT NULL,
  `usuarioApellido` varchar(50) NOT NULL,
  `usuarioDoc` varchar(12) NOT NULL,
  `usuarioRolId` int(11) NOT NULL,
  `usuarioContraseña` varchar(255) NOT NULL,
  `usuarioEstado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariotienda`
--

INSERT INTO `usuariotienda` (`usuarioId`, `usuarioNombre`, `usuarioApellido`, `usuarioDoc`, `usuarioRolId`, `usuarioContraseña`, `usuarioEstado`) VALUES
(43, 'ANDRES', 'REY', '1098813441', 1, '$2y$10$EEPhnK/kh5/DAP/4uxr/XeIz72Fia/Fd2s2vVEcyTr5cY9coRpSHO', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`artId`),
  ADD KEY `fk_artCategoriaId` (`artCategoriaId`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carId`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoriaId`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clienteId`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`despachoId`),
  ADD KEY `despachoempresaId` (`despachoempresaId`),
  ADD KEY `despachoPedidoId` (`despachoPedidoId`),
  ADD KEY `despacho_ibfk_3` (`despachoUsuarioId`);

--
-- Indices de la tabla `direccionpedido`
--
ALTER TABLE `direccionpedido`
  ADD PRIMARY KEY (`direccionId`);

--
-- Indices de la tabla `dpto`
--
ALTER TABLE `dpto`
  ADD PRIMARY KEY (`dptoId`);

--
-- Indices de la tabla `empresaenvio`
--
ALTER TABLE `empresaenvio`
  ADD PRIMARY KEY (`empresaId`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`facturaId`),
  ADD KEY `fk_facturaClienteDoc` (`facturaClienteId`),
  ADD KEY `fk_factura_tipoPagoId` (`factura_tipoPagoId`),
  ADD KEY `impuestoId` (`facturaImpuestoId`);

--
-- Indices de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD PRIMARY KEY (`impuestoId`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedidoId`),
  ADD KEY `fk_pedidoFacturaId` (`pedidoFacturaId`),
  ADD KEY `fk_ordenClienteId` (`pedidoClienteId`),
  ADD KEY `fk_pedidoUsuarioId` (`pedidoUsuarioId`),
  ADD KEY `direccionpedido` (`pedidoDireccionId`);

--
-- Indices de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD PRIMARY KEY (`pqrsId`),
  ADD KEY `fk_pqrsUsuarioId` (`pqrsUsuarioId`),
  ADD KEY `fk_pqrsOrigenId` (`pqrsOrigenId`),
  ADD KEY `fk_pqrsClienteId` (`pqrsClienteId`);

--
-- Indices de la tabla `pqrstipo`
--
ALTER TABLE `pqrstipo`
  ADD PRIMARY KEY (`pqrsTipoId`);

--
-- Indices de la tabla `productoporfactura`
--
ALTER TABLE `productoporfactura`
  ADD KEY `fk_prodFact_ArtId` (`prodFact_ArtId`),
  ADD KEY `fk_prodFact_FactId` (`prodFact_FactId`);

--
-- Indices de la tabla `productoporpedido`
--
ALTER TABLE `productoporpedido`
  ADD KEY `fk_prodPed_artId` (`prodPed_artId`),
  ADD KEY `fk_prodPed_pedidoId` (`prodPed_pedidoId`);

--
-- Indices de la tabla `resolucion`
--
ALTER TABLE `resolucion`
  ADD PRIMARY KEY (`resolucionId`),
  ADD KEY `resolucionpqrsId` (`resolucionpqrsId`),
  ADD KEY `resolucion_ibfk_1` (`resolucionUsuarioId`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolId`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`tipoPagoId`);

--
-- Indices de la tabla `usuariotienda`
--
ALTER TABLE `usuariotienda`
  ADD PRIMARY KEY (`usuarioId`),
  ADD UNIQUE KEY `UQ_usuarioDoc` (`usuarioDoc`),
  ADD KEY `fk_usuarioRolId` (`usuarioRolId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `artId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `dpto`
--
ALTER TABLE `dpto`
  MODIFY `dptoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `empresaenvio`
--
ALTER TABLE `empresaenvio`
  MODIFY `empresaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `facturaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  MODIFY `impuestoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  MODIFY `pqrsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pqrstipo`
--
ALTER TABLE `pqrstipo`
  MODIFY `pqrsTipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariotienda`
--
ALTER TABLE `usuariotienda`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_artCategoriaId` FOREIGN KEY (`artCategoriaId`) REFERENCES `categoria` (`categoriaId`);

--
-- Filtros para la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD CONSTRAINT `despacho_ibfk_1` FOREIGN KEY (`despachoempresaId`) REFERENCES `empresaenvio` (`empresaId`),
  ADD CONSTRAINT `despacho_ibfk_2` FOREIGN KEY (`despachoPedidoId`) REFERENCES `pedido` (`pedidoId`),
  ADD CONSTRAINT `despacho_ibfk_3` FOREIGN KEY (`despachoUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_facturaClienteDoc` FOREIGN KEY (`facturaClienteId`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `fk_factura_tipoPagoId` FOREIGN KEY (`factura_tipoPagoId`) REFERENCES `tipopago` (`tipoPagoId`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_ordenClienteId` FOREIGN KEY (`pedidoClienteId`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `fk_pedidoFacturaId` FOREIGN KEY (`pedidoFacturaId`) REFERENCES `factura` (`facturaId`),
  ADD CONSTRAINT `fk_pedidoUsuarioId` FOREIGN KEY (`pedidoUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`);

--
-- Filtros para la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD CONSTRAINT `fk_pqrsClienteId` FOREIGN KEY (`pqrsClienteId`) REFERENCES `cliente` (`clienteId`),
  ADD CONSTRAINT `fk_pqrsOrigenId` FOREIGN KEY (`pqrsOrigenId`) REFERENCES `pqrstipo` (`pqrsTipoId`),
  ADD CONSTRAINT `fk_pqrsUsuarioId` FOREIGN KEY (`pqrsUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`);

--
-- Filtros para la tabla `productoporfactura`
--
ALTER TABLE `productoporfactura`
  ADD CONSTRAINT `fk_prodFact_ArtId` FOREIGN KEY (`prodFact_ArtId`) REFERENCES `articulo` (`artId`),
  ADD CONSTRAINT `fk_prodFact_FactId` FOREIGN KEY (`prodFact_FactId`) REFERENCES `factura` (`facturaId`);

--
-- Filtros para la tabla `productoporpedido`
--
ALTER TABLE `productoporpedido`
  ADD CONSTRAINT `fk_prodPed_artId` FOREIGN KEY (`prodPed_artId`) REFERENCES `articulo` (`artId`),
  ADD CONSTRAINT `fk_prodPed_pedidoId` FOREIGN KEY (`prodPed_pedidoId`) REFERENCES `pedido` (`pedidoId`);

--
-- Filtros para la tabla `resolucion`
--
ALTER TABLE `resolucion`
  ADD CONSTRAINT `resolucion_ibfk_1` FOREIGN KEY (`resolucionUsuarioId`) REFERENCES `usuariotienda` (`usuarioId`),
  ADD CONSTRAINT `resolucion_ibfk_2` FOREIGN KEY (`resolucionpqrsId`) REFERENCES `pqrs` (`pqrsId`);

--
-- Filtros para la tabla `usuariotienda`
--
ALTER TABLE `usuariotienda`
  ADD CONSTRAINT `fk_usuarioRolId` FOREIGN KEY (`usuarioRolId`) REFERENCES `rol` (`rolId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
