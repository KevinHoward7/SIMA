/*
Navicat MySQL Data Transfer

Source Server         : MySQL - lcalhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : sima

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-20 15:37:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for delimitacion_geografica
-- ----------------------------
DROP TABLE IF EXISTS `delimitacion_geografica`;
CREATE TABLE `delimitacion_geografica` (
  `id_delimitacion_geografica` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas` polygon NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_delimitacion` int(11) NOT NULL,
  PRIMARY KEY (`id_delimitacion_geografica`),
  KEY `id_tipo_delimitacion` (`id_tipo_delimitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for denuncia
-- ----------------------------
DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_delito` int(2) NOT NULL,
  `des_denuncia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadax_denuncia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `coordenaday_denuncia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha_denuncia` date NOT NULL,
  `imagen_denuncia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `id_persona` (`id_persona`),
  KEY `id_tipo_delito` (`id_tipo_delito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_p` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_m` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cedula_identidad` int(8) NOT NULL,
  `id_procedencia` int(2) NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `id_procedencia` (`id_procedencia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for planificacion_corte
-- ----------------------------
DROP TABLE IF EXISTS `planificacion_corte`;
CREATE TABLE `planificacion_corte` (
  `id_planificacion_corte` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `id_sector` int(11) NOT NULL,
  PRIMARY KEY (`id_planificacion_corte`),
  KEY `id_sector` (`id_sector`),
  CONSTRAINT `planificacion_corte_ibfk_1` FOREIGN KEY (`id_sector`) REFERENCES `sectores` (`id_sector`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for privilegio
-- ----------------------------
DROP TABLE IF EXISTS `privilegio`;
CREATE TABLE `privilegio` (
  `id_privilegio` int(2) NOT NULL AUTO_INCREMENT,
  `des_privilegio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_privilegio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for procedencia
-- ----------------------------
DROP TABLE IF EXISTS `procedencia`;
CREATE TABLE `procedencia` (
  `id_procedencia` int(2) NOT NULL AUTO_INCREMENT,
  `des_procedencia` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_procedencia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for puntos_distribucion
-- ----------------------------
DROP TABLE IF EXISTS `puntos_distribucion`;
CREATE TABLE `puntos_distribucion` (
  `id_punto_distribucion` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas` point NOT NULL,
  PRIMARY KEY (`id_punto_distribucion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for rutas_cbasurero
-- ----------------------------
DROP TABLE IF EXISTS `rutas_cbasurero`;
CREATE TABLE `rutas_cbasurero` (
  `id_ruta_basurero` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` int(11) NOT NULL,
  `placa_basurero` int(7) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `segmentos` polygon NOT NULL,
  PRIMARY KEY (`id_ruta_basurero`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sectores
-- ----------------------------
DROP TABLE IF EXISTS `sectores`;
CREATE TABLE `sectores` (
  `id_sector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sector` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas` polygon DEFAULT NULL,
  `id_zona` int(11) NOT NULL,
  PRIMARY KEY (`id_sector`),
  KEY `id_zona` (`id_zona`),
  CONSTRAINT `sectores_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for tipo_delimitacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_delimitacion`;
CREATE TABLE `tipo_delimitacion` (
  `id_tipo_delimitacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_delimitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for tipo_delito
-- ----------------------------
DROP TABLE IF EXISTS `tipo_delito`;
CREATE TABLE `tipo_delito` (
  `id_tipo_delito` int(2) NOT NULL AUTO_INCREMENT,
  `des_delito` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_delito`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for tipo_dia
-- ----------------------------
DROP TABLE IF EXISTS `tipo_dia`;
CREATE TABLE `tipo_dia` (
  `id_tipo_dia` int(2) NOT NULL AUTO_INCREMENT,
  `des_tipo_dia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_dia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_privilegio` int(2) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_privilegio` (`id_privilegio`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Table structure for zonas
-- ----------------------------
DROP TABLE IF EXISTS `zonas`;
CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_zona` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas` polygon NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
