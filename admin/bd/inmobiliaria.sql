-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2021 a las 12:33:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(350) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `asesor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `tel`, `correo`, `asesor`) VALUES
(1, 'JUAN PEREZ', 'VINTO KM 18', '+591 74763897', 'cliente@gmail.com', 'ISMAEL FER CALLLE ROJAS'),
(4, 'PEDRO PEREZ MURILLO', 'CPLCAPIRHUA KM 7 1/2', '345543534', 'blanco2723@gmail.com', 'ALVARO BLANCO NINA'),
(5, 'ROSA', 'COCHABAMBA', '73188024', 'rosita@gmail.com', 'ISMAEL CALLLE ROJAS'),
(6, 'EJEMPLO DE ASESOR', 'DIRECCION', '465987987', 'scslcwl@gmail.com', 'ASESOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `iddepartamentos` int(11) NOT NULL,
  `departamento` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`iddepartamentos`, `departamento`) VALUES
(1, 'BENI'),
(2, 'CHUQUISACA'),
(3, 'COCHABAMBA'),
(4, 'LA PAZ'),
(5, 'ORURO'),
(6, 'PANDO'),
(7, 'POTOSI'),
(8, 'SANTA CRUZ'),
(9, 'TARIJA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `id_propiedad` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_propiedad`, `ruta`) VALUES
(1, '582fa063a2b16d8487f1749e6c5330c63b379d27', 'casas/582fa063a2b16d8487f1749e6c5330c63b379d271931.png'),
(4, '582fa063a2b16d8487f1749e6c5330c63b379d27', 'casas/582fa063a2b16d8487f1749e6c5330c63b379d273921.jpg'),
(5, '582fa063a2b16d8487f1749e6c5330c63b379d27', 'casas/582fa063a2b16d8487f1749e6c5330c63b379d277652.png'),
(6, '582fa063a2b16d8487f1749e6c5330c63b379d27', 'casas/582fa063a2b16d8487f1749e6c5330c63b379d272263.jpg'),
(7, '582fa063a2b16d8487f1749e6c5330c63b379d27', 'casas/582fa063a2b16d8487f1749e6c5330c63b379d274171.jpg'),
(8, '0a9bda549062b9a62e40322e470fffee2cecf933', 'casas/0a9bda549062b9a62e40322e470fffee2cecf9337091.jpg'),
(9, '0a9bda549062b9a62e40322e470fffee2cecf933', 'casas/0a9bda549062b9a62e40322e470fffee2cecf9331352.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `propiedad` varchar(200) NOT NULL,
  `consecutivo` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `nombre_cliente` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `fraccionamiento` varchar(100) NOT NULL,
  `calle_num` varchar(100) NOT NULL,
  `numero_int` int(10) NOT NULL,
  `m2t` int(10) NOT NULL,
  `banos` int(2) NOT NULL,
  `plantas` int(2) NOT NULL,
  `caracteristicas` text NOT NULL,
  `m2c` int(10) NOT NULL,
  `recamaras` int(2) NOT NULL,
  `cocheras` int(2) NOT NULL,
  `observaciones` text NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `asesor` varchar(200) NOT NULL,
  `tipo_inmueble` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `comentario_web` text NOT NULL,
  `operacion` varchar(50) NOT NULL,
  `foto_principal` varchar(200) NOT NULL,
  `mapa` varchar(200) NOT NULL,
  `latitud` varchar(200) NOT NULL,
  `longitud` varchar(200) NOT NULL,
  `marcado` varchar(2) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`propiedad`, `consecutivo`, `id_cliente`, `departamento`, `provincia`, `nombre_cliente`, `precio`, `fraccionamiento`, `calle_num`, `numero_int`, `m2t`, `banos`, `plantas`, `caracteristicas`, `m2c`, `recamaras`, `cocheras`, `observaciones`, `forma_pago`, `asesor`, `tipo_inmueble`, `fecha_registro`, `comentario_web`, `operacion`, `foto_principal`, `mapa`, `latitud`, `longitud`, `marcado`, `estatus`) VALUES
('0a9bda549062b9a62e40322e470fffee2cecf933', 538, 1, 'COCHABAMBA', 'BOLIVAR', 'JUAN PEREZ', 20, 'JJJ', 'BBBB', 12, 1, 1, 1, 'JBLV', 67, 2, 1, 'DFCGHBJK', 'JKB', 'ISMAEL FERNANDO CALLE ROJAS', 'TERRENO', '2021-10-12', 'FXJFX', 'TRASPASO', 'casas/principal-8570a9bda549062b9a62e40322e470fffee2cecf933.jpg', 'BBBB JJJ COCHABAMBA, BOLIVAR', '-17.660921', '-62.718803', '', 'ACTIVO'),
('582fa063a2b16d8487f1749e6c5330c63b379d27', 536, 4, 'COCHABAMBA', 'CHAPARE', 'PEDRO PEREZ MURILLO', 100000, 'ENTRE RIOS', '234', 324, 342, 1, 4, 'QUIMICO', 23, 2, 3, 'MUCHA CALOR', 'WERQ', 'ASESOR', 'LOCAL', '2021-10-20', 'NO RECOMENDABLE PARA CLIENTES DEL OCCIDENTE', 'VENTA', 'casas/principal-417582fa063a2b16d8487f1749e6c5330c63b379d27.jpg', '234 ENTRE RIOS COCHABAMBA, CHAPARE', '-17.395716', '-66.300677', '', 'ACTIVO'),
('589daf38b7139cbb90fb98f1e1c7664defc43910', 540, 5, 'COCHABAMBA', 'CERCADO', 'ROSA', 80000, 'PJE. BOLIVAR', 'PJE. BOLIVAR', 192, 500, 2, 1, 'PLAZA', 600, 10, 2, 'AREA VERDE', 'EFECTIVO', 'ISMAEL FERNANDO CALLE ROJAS', 'LOCAL', '2021-10-01', 'RECOMENDABLE', 'RENTA', 'casas/principal-161589daf38b7139cbb90fb98f1e1c7664defc43910.jpg', 'PJE. BOLIVAR PJE. BOLIVAR COCHABAMBA, CERCADO', '-17.395716', '-66.300677', '', 'ACTIVO'),
('726f361d3c41359f057aa2ff58741314d6479b59', 542, 1, 'CHUQUISACA', 'AZURDUY', 'JUAN PEREZ', 250000, 'VINTO', 'LJNVDSVNE&Ntilde;OV', 192, 1234, 2, 2, 'SDFGHJKJHGFDFGVBNHM', 123, 3, 2, 'GFGVHJGFCVBN', 'EFECTIVO', 'ASESOR', 'CASA', '2021-10-20', 'RTHTHTRHRTHTRHTRERHTR', 'VENTA', 'casas/foto_principal.png', 'LJNVDSVNE&Ntilde;OV VINTO CHUQUISACA, AZURDUY', '-17.654123', '-16.123465', '', 'ACTIVO'),
('8f1bea52f3ed56e2e5d0518362d6dc05f2c6bd37', 537, 1, 'LA PAZ', 'ABEL ITURRALDE', 'JUAN PEREZ', 20, 'JJJ', 'BBBB', 12, 1, 1, 1, 'JBLV', 67, 2, 1, 'DFCGHBJK', 'JKB', 'ISMAEL FERNANDO CALLE ROJAS', 'TERRENO', '2021-10-14', 'FXJFX', 'TRASPASO', 'casas/foto_principal.png', 'BBBB JJJ LA PAZ, ABEL ITURRALDE', '-17.395716', '-66.300677', '', 'ACTIVO'),
('d03d4e9a84f28291ab91df15c66a09bc6ca1e64c', 541, 1, 'BENI', 'GRAL. J. BALLIVIAN', 'JUAN PEREZ', 20, 'JH K', 'MGJVK', 45, 123, 1, 2, 'DFGHJKL&Ntilde;', 120, 2, 1, 'SDFGHJKL&Ntilde;', 'SDFGHJKLMN', 'ISMAEL FERNANDO CALLE ROJAS', 'TERRENO', '2021-10-06', 'YHVJBJNB', 'RENTA', 'casas/foto_principal.png', 'MGJVK JH K BENI, GRAL. J. BALLIVIAN', '-17.123465', '-66.205154', '', 'ACTIVO'),
('e49dbfbfaa86b43a427503610f86eb84cffc1edd', 535, 4, 'CHUQUISACA', 'HERNANDO SILES', 'PEDRO PEREZ MURILLO', 123, '234', '234', 2435, 4, 3, 5, 'WERWE', 4, 4, 5, 'WER', 'QWEQEW', 'ALVARO BLANCO NINA', 'TERRENO', '2021-10-20', 'WERWER', 'TRASPASO', 'casas/foto_principal.png', '234 234 CHUQUISACA, HERNANDO SILES', '-17.395716', '-66.300677', '', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `idprovincias` int(11) NOT NULL,
  `iddepartamentos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idprovincias`, `iddepartamentos`, `provincia`) VALUES
(1, '1', 'CERCADO'),
(2, '1', 'GRAL. J. BALLIVIAN'),
(3, '1', 'ITENEZ'),
(4, '1', 'MAMORE'),
(5, '1', 'MARBAN'),
(6, '1', 'MOXOS'),
(7, '1', 'VACA DIEZ'),
(8, '1', 'YACUMA'),
(9, '2', 'AZURDUY'),
(10, '2', 'BELISARIO BOETO'),
(11, '2', 'HERNANDO SILES'),
(12, '2', 'LUIS CALVO'),
(13, '2', 'NOR CINTI'),
(14, '2', 'OROPEZA'),
(15, '2', 'SUD CINTI'),
(16, '2', 'TOMINA'),
(17, '2', 'YAMPARAEZ'),
(18, '2', 'ZUDAÑEZ'),
(19, '3', 'ARANI'),
(20, '3', 'ARQUE'),
(21, '3', 'AYOPAYA'),
(22, '3', 'BOLIVAR'),
(23, '3', 'CAMPERO'),
(24, '3', 'CAPINOTA'),
(25, '3', 'CARRASCO'),
(26, '3', 'CERCADO'),
(27, '3', 'CHAPARE'),
(28, '3', 'ESTEBAN ARCE'),
(29, '3', 'GERMAN JORDAN'),
(30, '3', 'MIZQUE'),
(31, '3', 'PUNATA'),
(32, '3', 'QUILLACOLLO'),
(33, '3', 'TAPACARI'),
(34, '3', 'TIRAQUE'),
(35, '4', 'ABEL ITURRALDE'),
(36, '4', 'AROMA'),
(37, '4', 'BAUTISTA SAAVEDRA'),
(38, '4', 'CAMACHO'),
(39, '4', 'CARANAVI'),
(40, '4', 'FRANZ TAMAYO'),
(41, '4', 'GRAL. J. MANUEL PANDO'),
(42, '4', 'GUALBERTO VILLARROEL'),
(43, '4', 'INGAVI'),
(44, '4', 'INQUISIVI'),
(45, '4', 'LARECAJA'),
(46, '4', 'LOAYZA'),
(47, '4', 'LOS ANDES'),
(48, '4', 'MANCO KAPAC'),
(49, '4', 'MUÑECAS'),
(50, '4', 'MURILLO'),
(51, '4', 'NOR YUNGAS'),
(52, '4', 'OMASUYOS'),
(53, '4', 'PACAJES'),
(54, '4', 'SUR YUNGAS'),
(55, '5', 'ABAROA'),
(56, '5', 'CARANGAS'),
(57, '5', 'CERCADO'),
(58, '5', 'LADISLAO CABRERA'),
(59, '5', 'LITORAL'),
(60, '5', 'MEJILLONES'),
(61, '5', 'NOR CARANGAS'),
(62, '5', 'PANTALEON DALENCE'),
(63, '5', 'POOPO'),
(64, '5', 'S. PEDRO DE TOTORA'),
(65, '5', 'SABAYA'),
(66, '5', 'SAJAMA'),
(67, '5', 'SAUCARI'),
(68, '5', 'SEBASTIAN PAGADOR'),
(69, '5', 'SUR CARANGAS'),
(70, '5', 'TOMAS BARRON'),
(71, '6', 'ABUNA'),
(72, '6', 'GRAL. FEDERICO ROMAN'),
(73, '6', 'MADRE DE DIOS'),
(74, '6', 'MANURIPI'),
(75, '6', 'NICOLAS SUAREZ'),
(76, '7', 'ALONZO DE IBAÑEZ'),
(77, '7', 'ANTONIO QUIJARRO'),
(78, '7', 'CHARCAS'),
(79, '7', 'CHAYANTA'),
(80, '7', 'CORNELIO SAAVEDRA'),
(81, '7', 'DANIEL CAMPOS'),
(82, '7', 'ENRIQUE BALDIVIEZO'),
(83, '7', 'GRAL. B. BILBAO'),
(84, '7', 'JOSE MARIA LINARES'),
(85, '7', 'MODESTO OMISTE'),
(86, '7', 'NOR CHICHAS'),
(87, '7', 'NOR LIPEZ'),
(88, '7', 'RAFAEL BUSTILLO'),
(89, '7', 'SUR CHICHAS'),
(90, '7', 'SUR LIPEZ'),
(91, '7', 'TOMAS FRIAS'),
(92, '8', 'ANDRES IBAÑEZ'),
(93, '8', 'ANGEL SANDOVAL'),
(94, '8', 'CABALLERO'),
(95, '8', 'CHIQUITOS'),
(96, '8', 'CORDILLERA'),
(97, '8', 'FLORIDA'),
(98, '8', 'GERMAN BUSCH'),
(99, '8', 'GUARAYOS'),
(100, '8', 'ICHILO'),
(101, '8', 'ÑUFLO DE CHAVEZ'),
(102, '8', 'OBISPO SANTIESTEVAN'),
(103, '8', 'SARA'),
(104, '8', 'VALLEGRANDE'),
(105, '8', 'VELASCO'),
(106, '8', 'WARNES'),
(107, '9', 'ANICETO ARCE'),
(108, '9', 'BURDET O CONNOR'),
(109, '9', 'CERCADO'),
(110, '9', 'EUSTAQUIO MENDEZ'),
(111, '9', 'GRAN CHACO'),
(112, '9', 'JOSE MARIA AVILES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(2) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `nick` varchar(15) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `bloqueo` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `pass`, `nombre`, `correo`, `nivel`, `bloqueo`, `foto`) VALUES
(7, 'ISMAEL', '7c222fb2927d828af22f592134e8932480637c0d', 'ISMAEL FERNANDO CALLE ROJAS', 'ismaelcallerojas@gmail.com', 'ADMINISTRADOR', 1, 'foto_perfil/perfil.jpg'),
(8, 'ADMINISTRADOR', '3cf230179f2c0bac3e820da6984d039431cbd5e6', 'ISMAEL FERNANDO CALLE ROJAS', 'ismaelcallerojas@gmail.com', 'ADMINISTRADOR', 1, 'foto_perfil/ADMINISTRADOR.png'),
(9, 'ASESOR', '70352f41061eda4ff3c322094af068ba70c3b38b', 'ASESOR', 'asesorejemplo@gmail.com', 'ASESOR', 1, 'foto_perfil/ASESOR.png'),
(11, 'ALVARO', 'eb4cef3a7bd0b7bcac5433b8f1058fe2686beaf3', 'ALVARO BLANCO NINA', 'blanco2723@gmail.com', 'ADMINISTRADOR', 1, 'foto_perfil/ALVARO.jpg'),
(12, 'ALEX', '7c222fb2927d828af22f592134e8932480637c0d', 'ALEX AVERANGA', 'alex.averanga@ejemplo.com', 'ADMINISTRADOR', 1, 'foto_perfil/ALEX.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`iddepartamentos`),
  ADD UNIQUE KEY `iddepartamentos_UNIQUE` (`iddepartamentos`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`propiedad`),
  ADD UNIQUE KEY `consecutivo` (`consecutivo`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`idprovincias`),
  ADD UNIQUE KEY `idprovincias_UNIQUE` (`idprovincias`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `consecutivo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
