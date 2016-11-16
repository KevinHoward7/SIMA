-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1:3316
-- Tiempo de generación: 16-11-2016 a las 04:24:33
-- Versión del servidor: 10.1.18-MariaDB
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delimitacion_geografica`
--
-- Creación: 16-11-2016 a las 04:14:34
--

DROP TABLE IF EXISTS `delimitacion_geografica`;
CREATE TABLE IF NOT EXISTS `delimitacion_geografica` (
  `id_delimitacion_geografica` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas` polygon NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_delimitacion` int(11) NOT NULL,
  PRIMARY KEY (`id_delimitacion_geografica`),
  KEY `id_tipo_delimitacion` (`id_tipo_delimitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_distribucion`
--
-- Creación: 16-11-2016 a las 04:13:06
--

DROP TABLE IF EXISTS `puntos_distribucion`;
CREATE TABLE IF NOT EXISTS `puntos_distribucion` (
  `id_punto_distribucion` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas` point NOT NULL,
  PRIMARY KEY (`id_punto_distribucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--
-- Creación: 16-11-2016 a las 04:17:23
--

DROP TABLE IF EXISTS `sectores`;
CREATE TABLE IF NOT EXISTS `sectores` (
  `id_sector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sector` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas` polygon NOT NULL,
  `id_zona` int(11) NOT NULL,
  PRIMARY KEY (`id_sector`),
  KEY `id_zona` (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_delimitacion`
--
-- Creación: 16-11-2016 a las 04:15:20
--

DROP TABLE IF EXISTS `tipo_delimitacion`;
CREATE TABLE IF NOT EXISTS `tipo_delimitacion` (
  `id_tipo_delimitacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_delimitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--
-- Creación: 16-11-2016 a las 04:18:46
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_zona` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas` polygon NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
