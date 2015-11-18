-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2015 a las 11:52:43
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_recursos`
--
CREATE DATABASE IF NOT EXISTS `bd_recursos` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_recursos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurso`
--

CREATE TABLE IF NOT EXISTS `tbl_recurso` (
`id_recurso` int(11) NOT NULL,
  `nombre_recurso` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_bin NOT NULL,
  `veces_usado` int(11) NOT NULL,
  `foto_recurso` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id_recurso`, `nombre_recurso`, `id_tipo_recurso`, `estado`, `veces_usado`, `foto_recurso`) VALUES
(22, 'Teoria T100', 1, 'disponible', 31, '22.jpg'),
(23, 'Teoria T101', 1, 'disponible', 32, '23.jpg'),
(24, 'Teoria T102', 1, 'disponible', 6, '24.jpg'),
(25, 'Teoria T103', 1, 'disponible', 4, '25.jpg'),
(26, 'Informatica I200', 1, 'No disponible', 4, '26.jpg'),
(27, 'Informatica I201', 1, 'disponible', 2, '27.jpg'),
(28, 'Despacho D300', 2, 'disponible', 5, '28.jpg'),
(29, 'Despacho D301', 2, 'disponible', 10, '29.jpg'),
(30, 'Sala S400', 3, 'disponible', 10, '30.jpg'),
(31, 'Proyector P500', 4, 'disponible', 3, '31.jpg'),
(32, 'Portatil P600', 5, 'disponible', 3, '32.jpg'),
(33, 'Portatil P601', 5, 'disponible', 6, '33.jpg'),
(34, 'Portatil P602', 5, 'disponible', 2, '34.jpg'),
(35, 'Movil M700', 6, 'disponible', 1, '35.jpg'),
(36, 'Movil M701', 6, 'disponible', 2, '36.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE IF NOT EXISTS `tbl_reserva` (
`id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `ultima_liberacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ultima_reserva` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `id_usuario`, `id_recurso`, `ultima_liberacion`, `ultima_reserva`) VALUES
(1, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:02:22'),
(2, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:08:35'),
(3, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:09:34'),
(4, NULL, 23, '2015-11-18 09:31:53', '2015-11-16 12:10:02'),
(5, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:10:38'),
(6, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:10:53'),
(7, NULL, 22, '2015-11-18 08:46:50', '2015-11-16 12:14:02'),
(8, NULL, 23, '2015-11-18 09:31:53', '2015-11-16 12:14:16'),
(9, NULL, 32, '2015-11-16 12:16:55', '2015-11-16 12:16:36'),
(10, NULL, 23, '2015-11-18 09:31:53', '2015-11-16 12:16:42'),
(11, NULL, 30, '2015-11-18 08:50:08', '2015-11-16 12:16:46'),
(12, NULL, 29, '2015-11-16 12:20:05', '2015-11-16 12:20:01'),
(13, NULL, 25, '2015-11-18 08:50:03', '2015-11-16 12:20:11'),
(14, NULL, 24, '2015-11-17 17:52:31', '2015-11-16 12:20:16'),
(15, NULL, 36, '2015-11-16 12:27:34', '2015-11-16 12:27:21'),
(16, NULL, 30, '2015-11-18 08:50:08', '2015-11-17 08:37:37'),
(17, NULL, 31, '2015-11-17 17:50:12', '2015-11-17 08:40:11'),
(18, NULL, 22, '2015-11-18 08:46:50', '2015-11-17 08:41:19'),
(19, NULL, 23, '2015-11-18 09:31:53', '2015-11-17 08:42:46'),
(20, NULL, 24, '2015-11-17 17:52:31', '2015-11-17 08:43:44'),
(21, NULL, 25, '2015-11-18 08:50:03', '2015-11-17 11:31:09'),
(22, NULL, 22, '2015-11-18 08:46:50', '2015-11-17 17:52:48'),
(25, NULL, 26, '2015-11-18 09:31:22', '2015-11-18 09:31:14'),
(26, 2, 26, '0000-00-00 00:00:00', '2015-11-18 09:31:36'),
(27, NULL, 23, '2015-11-18 09:31:53', '2015-11-18 09:31:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_recurso`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_recurso` (
`id_tipo_recurso` int(11) NOT NULL,
  `nombre_tipo_recurso` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_tipo_recurso`
--

INSERT INTO `tbl_tipo_recurso` (`id_tipo_recurso`, `nombre_tipo_recurso`) VALUES
(1, 'Aula'),
(2, 'Despacho'),
(3, 'Sala de Reuniones'),
(4, 'Proyectores'),
(5, 'Portatiles'),
(6, 'Moviles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_usuario` (
  `tipo_usuario` varchar(20) COLLATE utf8_bin NOT NULL,
`id_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_tipo_usuario`
--

INSERT INTO `tbl_tipo_usuario` (`tipo_usuario`, `id_tipo_usuario`) VALUES
('Root', 1),
('Usuario', 2),
('Administrador', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
`id_usuario` int(11) NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_tipo_usuario` int(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `password`, `usuario`, `id_tipo_usuario`) VALUES
(1, '1234', 'acamacho', 2),
(2, '1234', 'sayala', 1),
(3, '12345', 'raulC', 2),
(44, 'lolpo12', 'Jaume', 2),
(42, 'hell13', 'Marta', 3),
(41, '09wer', 'aitor', 3),
(40, 'fr4', 'Pedro', 2),
(37, 'pe43', 'Julia', 3),
(36, '1235', 'pepin', 2),
(38, '612', 'Gemma', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
 ADD PRIMARY KEY (`id_recurso`), ADD KEY `fk_tipo` (`id_tipo_recurso`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
 ADD PRIMARY KEY (`id_reserva`), ADD KEY `id_usuario` (`id_usuario`,`id_recurso`);

--
-- Indices de la tabla `tbl_tipo_recurso`
--
ALTER TABLE `tbl_tipo_recurso`
 ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- Indices de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
 ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `id_usuario` (`id_usuario`), ADD KEY `tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_recurso`
--
ALTER TABLE `tbl_tipo_recurso`
MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
MODIFY `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
