/*
MySQL Backup
Source Server Version: 5.7.19
Source Database: prueba
Date: 18/10/2017 14:38:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `empleador`
-- ----------------------------
DROP TABLE IF EXISTS `empleador`;
CREATE TABLE `empleador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Nacimiento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E9B516FA7C5F9ED6` (`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `empleados`
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `TipoDeComtrato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9EB2266C7C5F9ED6` (`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `empleador` VALUES ('1','ruben','f','234567','1234567','werty45678','5/4/17');
INSERT INTO `empleados` VALUES ('1','pedro martinez','m','123456','345678','indefinido'), ('2','Jose martinez','f','67890','345678','indefinido');
