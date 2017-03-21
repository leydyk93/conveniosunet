-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-03-2017 a las 01:27:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unetconvenios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actaintencion`
--

CREATE TABLE IF NOT EXISTS `actaintencion` (
  `idActaIntencion` int(11) NOT NULL AUTO_INCREMENT,
  `fechaActaIntencion` date DEFAULT NULL,
  `urlActaIntencion` varchar(200) DEFAULT NULL,
  `convenios_idConvenio` varchar(50) NOT NULL,
  PRIMARY KEY (`idActaIntencion`),
  KEY `fk_actaIntencion_convenios1_idx` (`convenios_idConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `actaintencion`
--

INSERT INTO `actaintencion` (`idActaIntencion`, `fechaActaIntencion`, `urlActaIntencion`, `convenios_idConvenio`) VALUES
(1, '2016-11-24', '/UNETConvenios/archivos/convenios/Acta-inglesbasico.pdf', '9'),
(2, '2016-11-10', NULL, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosconvenios`
--

CREATE TABLE IF NOT EXISTS `archivosconvenios` (
  `idArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `convenios_idConvenio` varchar(50) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `folder` varchar(120) NOT NULL,
  `documento` varchar(120) NOT NULL,
  PRIMARY KEY (`idArchivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `archivosconvenios`
--

INSERT INTO `archivosconvenios` (`idArchivo`, `convenios_idConvenio`, `titulo`, `folder`, `documento`) VALUES
(1, '1', 'leydy', 'leydy', '79093-PoliticasSeguridadTodoEsSaludV1.pdf'),
(2, '1', 'leydy2', 'leydy2', '70718-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(3, '1', 'hola', 'hola', '43024-PoliticasSeguridadTodoEsSaludV1.pdf'),
(4, '1', 'jojo', 'jojo', '54870-PoliticasSeguridadTodoEsSaludV1.pdf'),
(5, '1', 'leyy', 'leyy', '17179-PoliticasSeguridadTodoEsSaludV1.pdf'),
(6, '1', 'leydy2', 'leydy2', '98041-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(7, '1', 'prueba', 'prueba', '73190-PoliticasSeguridadTodoEsSaludV1.pdf'),
(8, '1', 'leydy3', 'leydy3', '69702-PoliticasSeguridadTodoEsSaludV1.pdf'),
(9, '1', 'prueba2', 'prueba2', '54420-PoliticasSeguridadTodoEsSaludV1.pdf'),
(10, '1', 'prueba4', 'prueba4', '63706-PoliticasSeguridadTodoEsSaludV1.pdf'),
(11, '1', 'prueba5', 'prueba5', '22620-PoliticasSeguridadTodoEsSaludV1.pdf'),
(12, '1', 'prueba6', 'prueba6', '56856-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(13, '1', 'leydy2', 'leydy2', '43420-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(14, '1', 'lili', 'lili', '75481-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(15, '1', 'lili', 'lili', '81207-procedimientodeconfiguracionutilizandomodosetup.pdf'),
(16, '1', 'popp', 'popp', '34628-PoliticasSeguridadTodoEsSaludV1.pdf'),
(17, '1', 'lkk', 'lkk', '33096-PoliticasSeguridadTodoEsSaludV1.pdf'),
(18, '1', 'pokj', 'pokj', '62465-PoliticasSeguridadTodoEsSaludV1.pdf'),
(19, '1', 'leydy', 'leydy', '94182-Convenio1.pdf'),
(20, '1', 'popo', 'popo', '70762-Convenio1.pdf'),
(21, '1', 'popo', 'popo', '25314-Convenio1.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacionconvenios`
--

CREATE TABLE IF NOT EXISTS `clasificacionconvenios` (
  `idClasificacionConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionConvenio` varchar(150) NOT NULL,
  `descripcionClasificacionConvenio` varchar(200) NOT NULL,
  PRIMARY KEY (`idClasificacionConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clasificacionconvenios`
--

INSERT INTO `clasificacionconvenios` (`idClasificacionConvenio`, `nombreClasificacionConvenio`, `descripcionClasificacionConvenio`) VALUES
(1, 'Academico', ''),
(2, 'Intercambio', ''),
(5, 'Cultural', 'actividades arte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
  `idConvenio` varchar(50) NOT NULL,
  `nombreConvenio` varchar(200) NOT NULL,
  `fechaInicioConvenio` date DEFAULT NULL,
  `fechaCaducidadConvenio` date DEFAULT NULL,
  `objetivoConvenio` text,
  `institucionUNET` varchar(50) DEFAULT NULL,
  `urlConvenio` varchar(100) DEFAULT NULL,
  `clasificacionConvenios_idTipoConvenio` int(11) DEFAULT NULL,
  `tipoConvenios_idTipoConvenio` int(11) DEFAULT NULL,
  `alcanceConvenios` text,
  `dependencias_idDependencia` int(11) DEFAULT NULL,
  `convenios_idConvenio` varchar(50) DEFAULT NULL,
  `caducidadIndefinida` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idConvenio`),
  KEY `fk_convenios_clasificacionConvenios1` (`clasificacionConvenios_idTipoConvenio`),
  KEY `fk_convenios_tipoConvenios1` (`tipoConvenios_idTipoConvenio`),
  KEY `fk_convenios_dependencias1` (`dependencias_idDependencia`),
  KEY `fk_convenios_convenios1` (`convenios_idConvenio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`idConvenio`, `nombreConvenio`, `fechaInicioConvenio`, `fechaCaducidadConvenio`, `objetivoConvenio`, `institucionUNET`, `urlConvenio`, `clasificacionConvenios_idTipoConvenio`, `tipoConvenios_idTipoConvenio`, `alcanceConvenios`, `dependencias_idDependencia`, `convenios_idConvenio`, `caducidadIndefinida`) VALUES
('01', 'convenio 1', '2015-01-01', '2019-11-20', 'ejemplo 1', 'Universidad Nacional Experimental del Tachira', '/UNETConvenios/archivos/convenios/01_Convenio1.pdf', 2, 1, 'lfklekfle', 1, NULL, NULL),
('04', 'convenio 4', '2014-01-01', '2020-01-01', 'ejemplo 4', 'Universidad Nacional Experimental del Tachira', '/UNETConvenios/archivos/convenios/04_SANS Critical security controls - fall-2014-poster.pdf', 2, 1, 'jknjnfkvm', 1, NULL, NULL),
('10', 'convenio leydys', '2016-11-01', '2016-11-30', 'hujj', 'UNET', 'Sin Archivo', 1, 1, 'no definido', 2, NULL, NULL),
('11', 'Ejemplo leydy', '2016-11-15', '2017-11-05', 'el,llsclsclslc,lcs', 'UNET', 'Sin Archivo', 2, 1, 'este es el alcance ', 3, NULL, NULL),
('12', 'convenio por definir', '2016-12-04', '2016-12-23', 'este es el objetivo', 'UNET', 'Sin Archivo', 1, 1, 'definirlo', NULL, NULL, NULL),
('5', 'convenio 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6', 'convenio 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('7', 'convenio 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8', 'convenio ejemplo ', '2016-01-22', '2016-12-08', 'convenio ejemplo objetivo', 'UNET', 'Sin Archivo', 2, 1, 'no definido', 1, NULL, NULL),
('9', 'hijo de convenio ejemplo', '2016-11-02', '2017-01-01', 'ojo', 'UNET', 'Sin Archivo', 1, 2, 'plplpl', 2, '8', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_aportes`
--

CREATE TABLE IF NOT EXISTS `convenio_aportes` (
  `id_convenio_aporte` int(11) NOT NULL AUTO_INCREMENT,
  `convenios_idConvenio` varchar(50) NOT NULL,
  `descripcion_aporte` varchar(100) NOT NULL,
  `monedas_idMoneda` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_convenio_aporte`),
  KEY `fk_convenios_has_aportes_convenios1_idx` (`convenios_idConvenio`),
  KEY `fk_convenio_aportes_monedas1_idx` (`monedas_idMoneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `convenio_aportes`
--

INSERT INTO `convenio_aportes` (`id_convenio_aporte`, `convenios_idConvenio`, `descripcion_aporte`, `monedas_idMoneda`, `valor`, `cantidad`) VALUES
(1, '9', 'economico', 1, '10000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_estados`
--

CREATE TABLE IF NOT EXISTS `convenio_estados` (
  `id_convenio_estado` int(11) NOT NULL AUTO_INCREMENT,
  `convenios_idConvenio` varchar(50) NOT NULL,
  `estadoConvenios_idEstadoConvenio` int(11) NOT NULL,
  `fechaCambioEstado` date NOT NULL,
  `numeroReporte` varchar(10) DEFAULT NULL,
  `observacionCambioEstado` text,
  `dependencias_idDependencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_convenio_estado`),
  UNIQUE KEY `uk_convenio_estados` (`convenios_idConvenio`,`id_convenio_estado`),
  KEY `fk_convenios_has_estadoConvenios_estadoConvenios1_idx` (`estadoConvenios_idEstadoConvenio`),
  KEY `fk_convenios_has_estadoConvenios_convenios1_idx` (`convenios_idConvenio`),
  KEY `fk_convenio_Estados_dependencias1_idx` (`dependencias_idDependencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `convenio_estados`
--

INSERT INTO `convenio_estados` (`id_convenio_estado`, `convenios_idConvenio`, `estadoConvenios_idEstadoConvenio`, `fechaCambioEstado`, `numeroReporte`, `observacionCambioEstado`, `dependencias_idDependencia`) VALUES
(20, '01', 5, '2015-02-02', NULL, NULL, 1),
(23, '04', 5, '2015-03-10', NULL, NULL, 1),
(41, '5', 1, '2016-01-20', NULL, NULL, 1),
(42, '6', 1, '2016-02-10', NULL, NULL, 1),
(43, '7', 1, '2016-03-12', NULL, NULL, 1),
(44, '8', 4, '2016-11-17', NULL, NULL, 1),
(45, '9', 4, '2016-11-18', NULL, NULL, 2),
(48, '5', 2, '2016-05-19', NULL, 'prueba 1', 2),
(49, '5', 3, '2016-07-01', NULL, 'prueba 2', 3),
(53, '6', 2, '2016-07-20', NULL, 'se recibieron los documentos', NULL),
(54, '6', 3, '2016-11-30', NULL, 'se fue a consejo', NULL),
(55, '5', 4, '2016-10-28', NULL, 'hvhfhh', NULL),
(56, '11', 4, '2016-11-23', NULL, NULL, 3),
(62, '5', 1, '2016-10-30', NULL, '', NULL),
(63, '6', 4, '2016-12-01', NULL, '', NULL),
(64, '8', 2, '2017-02-02', NULL, 'cambio de estado', NULL),
(65, '8', 2, '2017-02-02', NULL, 'cambio de estado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE IF NOT EXISTS `dependencias` (
  `idDependencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDependencia` varchar(100) DEFAULT NULL,
  `telefonoDependencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDependencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`idDependencia`, `nombreDependencia`, `telefonoDependencia`) VALUES
(1, 'Rectorado', '0276-3335553'),
(2, 'Secretaria', '0276-4445552'),
(3, 'Docencia', '0276-3234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoconvenios`
--

CREATE TABLE IF NOT EXISTS `estadoconvenios` (
  `idEstadoConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstadoConvenio` varchar(100) NOT NULL,
  `descripcionEstadoConvenio` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstadoConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estadoconvenios`
--

INSERT INTO `estadoconvenios` (`idEstadoConvenio`, `nombreEstadoConvenio`, `descripcionEstadoConvenio`) VALUES
(1, 'Memo S.C Juridica', ''),
(2, 'Memo R.C Juridica', ''),
(3, 'Resolucion C.U Nro1', ''),
(4, 'Memo DICIPREP', ''),
(5, 'Resolucion C.U Aprobado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(100) NOT NULL,
  `paises_idPais` int(11) NOT NULL,
  PRIMARY KEY (`idEstado`),
  KEY `fk_estados_paises` (`paises_idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstado`, `nombreEstado`, `paises_idPais`) VALUES
(1, 'Zulia', 35),
(2, 'Miranda', 35),
(3, 'Distrito Capital', 35),
(4, 'Carabobo', 35),
(5, 'Lara', 35),
(6, 'Aragua', 35),
(7, 'Bolívar', 35),
(8, 'Anzoátegui', 35),
(9, 'Táchira', 35),
(10, 'Sucre', 35),
(11, 'Falcón', 35),
(12, 'Portuguesa', 35),
(13, 'Monagas', 35),
(14, 'Mérida', 35),
(15, 'Barinas', 35),
(16, 'Guárico', 35),
(17, 'Trujillo', 35),
(18, 'Yaracuy', 35),
(19, 'Apure', 35),
(20, 'Nueva Esparta', 35),
(21, 'Vargas', 35),
(22, 'Cojedes', 35),
(23, 'Delta Amacuro', 35),
(24, 'Amazonas', 35),
(25, 'Santiago de Chile', 9),
(26, 'Buenos Aires', 2),
(27, 'Catamarca', 2),
(28, 'chaco', 2),
(29, ' Saint John', 1),
(30, 'Saint George', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicoresponsables`
--

CREATE TABLE IF NOT EXISTS `historicoresponsables` (
  `idHistoricoResponsable` int(11) NOT NULL AUTO_INCREMENT,
  `responsables_idResponsable` int(11) NOT NULL,
  `convenios_idConvenio` varchar(50) DEFAULT NULL,
  `institucion_convenios_idInstitucionConvenio` int(11) DEFAULT NULL,
  `fechaAsignacionResponsable` date NOT NULL,
  `fechaRetiroResponsable` date DEFAULT NULL,
  PRIMARY KEY (`idHistoricoResponsable`),
  KEY `fk_historicoResponsables_responsables1_idx` (`responsables_idResponsable`),
  KEY `fk_historicoResponsables_convenios1_idx` (`convenios_idConvenio`),
  KEY `fk_historicoResponsables_institucion_convenios1_idx` (`institucion_convenios_idInstitucionConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `historicoresponsables`
--

INSERT INTO `historicoresponsables` (`idHistoricoResponsable`, `responsables_idResponsable`, `convenios_idConvenio`, `institucion_convenios_idInstitucionConvenio`, `fechaAsignacionResponsable`, `fechaRetiroResponsable`) VALUES
(1, 1, '01', NULL, '2015-01-01', NULL),
(2, 2, '01', NULL, '2015-01-01', NULL),
(3, 8, NULL, 1, '2015-01-01', NULL),
(4, 9, NULL, 1, '2015-01-01', NULL),
(5, 12, NULL, 2, '2015-01-01', NULL),
(6, 13, NULL, 2, '2015-01-01', NULL),
(17, 1, '04', NULL, '2014-01-01', NULL),
(18, 5, '04', NULL, '2014-01-01', NULL),
(19, 20, NULL, 6, '2014-01-01', NULL),
(20, 21, NULL, 6, '2014-01-01', NULL),
(21, 16, NULL, 7, '2016-01-22', NULL),
(22, 17, NULL, 7, '2016-01-22', NULL),
(23, 1, '8', NULL, '2016-01-22', NULL),
(24, 3, '8', NULL, '2016-01-22', NULL),
(25, 8, NULL, 8, '2016-11-02', NULL),
(26, 9, NULL, 8, '2016-11-02', NULL),
(27, 1, '9', NULL, '2016-11-02', NULL),
(28, 3, '9', NULL, '2016-11-02', NULL),
(29, 12, NULL, 9, '2016-11-15', NULL),
(30, 14, NULL, 9, '2016-11-15', NULL),
(31, 1, '11', NULL, '2016-11-15', NULL),
(32, 4, '11', NULL, '2016-11-15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE IF NOT EXISTS `instituciones` (
  `idInstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreInstitucion` varchar(200) NOT NULL,
  `siglasInstitucion` varchar(50) DEFAULT NULL,
  `estados_idEstado` int(11) NOT NULL,
  `tiposInstituciones_idTipoInstitucion` int(11) NOT NULL,
  PRIMARY KEY (`idInstitucion`),
  KEY `fk_instituciones_estados1` (`estados_idEstado`),
  KEY `fk_instituciones_tiposInstituciones1` (`tiposInstituciones_idTipoInstitucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`idInstitucion`, `nombreInstitucion`, `siglasInstitucion`, `estados_idEstado`, `tiposInstituciones_idTipoInstitucion`) VALUES
(1, 'Universidad de los Andes', 'ULA', 9, 1),
(2, 'Universidad Central de Venezuela', 'UCV', 3, 1),
(3, 'Universidad Nacional Abierta', 'UNA', 9, 1),
(4, 'Universidad de Chile', 'UCHILE', 25, 1),
(5, 'Universidad de los Andes ', 'ULA', 14, 1),
(6, 'Universidad Nacional Experimental del Tachira', 'UNET', 9, 1),
(7, 'gobernacion de tachira', 'gob tachira', 9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_convenios`
--

CREATE TABLE IF NOT EXISTS `institucion_convenios` (
  `idInstitucionConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `instituciones_idInstitucion` int(11) NOT NULL,
  `convenios_idConvenio` varchar(50) NOT NULL,
  `fechaIncorporacion` date NOT NULL,
  PRIMARY KEY (`idInstitucionConvenio`),
  UNIQUE KEY `uk_institucion_convenios` (`instituciones_idInstitucion`,`convenios_idConvenio`),
  KEY `fk_instituciones_has_convenios_convenios1_idx` (`convenios_idConvenio`),
  KEY `fk_instituciones_has_convenios_instituciones1_idx` (`instituciones_idInstitucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `institucion_convenios`
--

INSERT INTO `institucion_convenios` (`idInstitucionConvenio`, `instituciones_idInstitucion`, `convenios_idConvenio`, `fechaIncorporacion`) VALUES
(1, 1, '01', '2016-01-01'),
(2, 2, '01', '2016-01-01'),
(6, 4, '04', '2016-01-01'),
(7, 3, '8', '2016-01-22'),
(8, 1, '9', '2016-11-02'),
(9, 2, '11', '2016-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulo`, `descripcion`) VALUES
(1, 'convenios'),
(2, 'usuarios'),
(3, 'responsables'),
(4, 'tipoResponsable'),
(5, 'tipoConvenios'),
(6, 'clasificacionConvenios'),
(7, 'estadoConvenios'),
(8, 'tiposInstituciones'),
(9, 'instituciones'),
(10, 'estadosProvincias'),
(11, 'Dependencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
  `idMoneda` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionMoneda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMoneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`idMoneda`, `descripcionMoneda`) VALUES
(1, 'Bolivares'),
(2, 'Dolares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE IF NOT EXISTS `operaciones` (
  `idOperacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipoOperaciones_idTipoOperacion` int(11) NOT NULL,
  `modulos_idModulo` int(11) NOT NULL,
  PRIMARY KEY (`idOperacion`),
  KEY `fk_usuario_operaciones` (`usuario_id`),
  KEY `fk_tipoOperaciones_operaciones` (`tipoOperaciones_idTipoOperacion`),
  KEY `fk_modulos_operaciones` (`modulos_idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`idOperacion`, `fecha`, `usuario_id`, `tipoOperaciones_idTipoOperacion`, `modulos_idModulo`) VALUES
(1, '2017-02-01', 1, 3, 1),
(2, '2017-02-01', 1, 3, 1),
(3, '2017-02-01', 1, 3, 2),
(4, '2017-02-01', 1, 1, 2),
(5, '2017-02-01', 1, 2, 2),
(6, '2017-02-01', 2, 2, 2),
(7, '2017-02-02', 1, 1, 3),
(8, '2017-02-02', 1, 2, 3),
(9, '2017-02-02', 1, 3, 3),
(10, '2017-02-02', 1, 1, 4),
(11, '2017-02-02', 1, 2, 4),
(12, '2017-02-02', 1, 3, 4),
(13, '2017-02-02', 1, 1, 7),
(14, '2017-02-02', 1, 2, 7),
(15, '2017-02-02', 1, 3, 7),
(16, '2017-02-02', 1, 1, 6),
(17, '2017-02-02', 1, 2, 6),
(18, '2017-02-02', 1, 3, 6),
(19, '2017-02-02', 1, 1, 5),
(20, '2017-02-02', 1, 3, 5),
(21, '2017-02-02', 1, 1, 5),
(22, '2017-02-02', 1, 2, 5),
(23, '2017-02-02', 1, 3, 5),
(24, '2017-02-02', 1, 1, 11),
(25, '2017-02-02', 1, 2, 11),
(26, '2017-02-02', 1, 3, 11),
(27, '2017-02-02', 1, 1, 10),
(28, '2017-02-02', 1, 2, 10),
(29, '2017-02-02', 1, 3, 10),
(30, '2017-02-02', 1, 1, 9),
(31, '2017-02-02', 1, 2, 9),
(32, '2017-02-02', 1, 3, 9),
(33, '2017-02-02', 1, 1, 8),
(34, '2017-02-02', 1, 2, 8),
(35, '2017-02-02', 1, 3, 8),
(36, '2017-02-02', 1, 5, 1),
(37, '2017-02-02', 1, 5, 1),
(38, '2017-02-02', 1, 4, 1),
(39, '2017-02-05', 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePais` varchar(100) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombrePais`) VALUES
(1, 'Antigua y Barbuda'),
(2, 'Argentina'),
(3, 'Bahamas'),
(4, 'Barbados'),
(5, 'Belice'),
(6, 'Bolivia'),
(7, 'Brasil'),
(8, 'Canadá'),
(9, 'Chile'),
(10, 'Colombia'),
(11, 'Costa Rica'),
(12, 'Cuba'),
(13, 'Dominica'),
(14, 'Ecuador'),
(15, 'El Salvador'),
(16, 'Estados Unidos'),
(17, 'Granada'),
(18, 'Guatemala'),
(19, 'Guyana'),
(20, 'Haití'),
(21, 'Honduras'),
(22, 'Jamaica'),
(23, 'México'),
(24, 'Nicaragua'),
(25, 'Panamá'),
(26, 'Paraguay'),
(27, 'Perú'),
(28, 'República Dominicana'),
(29, 'San Cristóbal y Nieves'),
(30, 'San Vicente y las Granadinas'),
(31, 'Santa Lucía'),
(32, 'Surinam'),
(33, 'Trinidad y Tobago'),
(34, 'Uruguay'),
(35, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovacionprorrogas`
--

CREATE TABLE IF NOT EXISTS `renovacionprorrogas` (
  `idRenovacionProrroga` int(11) NOT NULL AUTO_INCREMENT,
  `fechaFinProrroga` date DEFAULT NULL,
  `observacionProrroga` varchar(200) DEFAULT NULL,
  `convenios_idConvenio` varchar(50) NOT NULL,
  `fechaRenovacion` date DEFAULT NULL,
  `fechaCaducidadModificada` date NOT NULL,
  PRIMARY KEY (`idRenovacionProrroga`),
  KEY `fk_renovacionProrrogas_convenios1_idx` (`convenios_idConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `renovacionprorrogas`
--

INSERT INTO `renovacionprorrogas` (`idRenovacionProrroga`, `fechaFinProrroga`, `observacionProrroga`, `convenios_idConvenio`, `fechaRenovacion`, `fechaCaducidadModificada`) VALUES
(9, '2016-10-30', 'cambio', '01', '2016-10-20', '2016-01-01'),
(10, '2021-12-01', 'AQUI. ', '01', '2016-10-20', '2016-01-01'),
(11, '2022-10-11', 'nueva renkjxjdck', '01', '2016-10-20', '2016-01-01'),
(12, '2022-12-31', 'sxsx', '01', '2016-10-20', '2016-01-01'),
(13, '2019-10-30', 'prueba', '01', '2016-10-20', '2016-01-01'),
(17, '2019-11-20', 'scsc', '01', '2017-02-02', '2019-10-30'),
(18, '2020-01-01', 'prueba', '04', '2017-02-05', '2018-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE IF NOT EXISTS `responsables` (
  `idResponsable` int(11) NOT NULL,
  `primerNombreResponsable` varchar(40) NOT NULL,
  `segundoNombreResponsable` varchar(40) DEFAULT NULL,
  `primerApellidoResponsable` varchar(60) NOT NULL,
  `segundoApellidoResponsable` varchar(60) DEFAULT NULL,
  `correoElectronicoResponsable` varchar(100) DEFAULT NULL,
  `telefonoResponsable` varchar(50) DEFAULT NULL,
  `instituciones_idInstitucion` int(11) DEFAULT NULL,
  `dependencias_idDependencia` int(11) DEFAULT NULL,
  `tipoResponsable_idTipoResponsable` int(11) NOT NULL,
  PRIMARY KEY (`idResponsable`),
  KEY `fk_responsables_instituciones1` (`instituciones_idInstitucion`),
  KEY `fk_responsables_dependencias1` (`dependencias_idDependencia`),
  KEY `fk_responsables_tipoResponsable1` (`tipoResponsable_idTipoResponsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`idResponsable`, `primerNombreResponsable`, `segundoNombreResponsable`, `primerApellidoResponsable`, `segundoApellidoResponsable`, `correoElectronicoResponsable`, `telefonoResponsable`, `instituciones_idInstitucion`, `dependencias_idDependencia`, `tipoResponsable_idTipoResponsable`) VALUES
(1, 'Raúl', 'Alberto', 'Ostos', 'Casanova', 'raul.ostos@unet.edu.ve', '04247564321', 6, 1, 1),
(2, 'Cleo', 'Lenore', 'Mcdowell', 'Klein', 'dolor.vitae@unet.edu.ve', '04247121737', 6, NULL, 2),
(3, 'Wanda', 'Hamish', 'Cole', 'Maldonado', 'varius.orci@unet.edu.ve', '2735111834', 6, NULL, 2),
(4, 'Dalton', 'Jeanette', 'Bonner', 'Nieves', 'hendrerit.neque.In@unet.edu.ve', '8082892872', 6, NULL, 2),
(5, 'Castor', 'Jerome', 'Beach', 'Wolf', 'auctor@unet.edu.ve', '4426781178', 6, NULL, 2),
(6, 'Herman', 'Kenyon', 'Serrano', 'Hoffman', 'Praesent@unet.edu.ve', '5431902095', 6, NULL, 2),
(7, 'Emery', 'Hollee', 'Moon', 'Frederick', 'et@unet.edu.ve', '8328406922', 6, NULL, 2),
(8, 'Mario', '', 'Bonucci', 'Rossini', 'mario.rossini@ula.edu.ve', '04246542390', 1, 1, 1),
(9, 'Alba', 'Lorenia', 'Galaviz', 'Ramírez', 'LR@ula.edu.ve', '9194659053', 1, NULL, 2),
(10, 'Sandra', 'Walkysia', 'Ayala', 'Jiménez', 'ayalajim@ula.edu.ve', '04262657890', 1, 1, 2),
(11, 'Brett', 'Deacon', 'Castillo', 'Alston', 'dapibus.quam@ula.edu.ve', '7506074776', 1, NULL, 2),
(12, 'Cecilia', '', 'García', 'Arocha', 'cecilia.garcia@ucv.edu.ve', '02125689324', 2, 1, 1),
(13, 'Arturo', 'Galindo', 'Galdámez', 'Blanco', 'AB@ucv.edu.ve', '04143869132', 2, NULL, 2),
(14, 'Raúl', 'Edmundo', 'Durán', 'San Vicente', 'EdmRaul@ucv.edu.ve', '04123789041', 2, NULL, 2),
(15, 'Genevieve', 'Kiona', 'Harvey', 'Mendoza', 'Quisque.ornare@ucv.edu.ve', '1337660836', 2, NULL, 2),
(16, 'Manuel', '', 'Castro', 'Pereira', 'Manuel.pereira@una.edu.ve', '04147289051', 3, 1, 1),
(17, 'María de los Ángeles', '', 'Cordero', 'Morales', 'MM@una.edu.ve', '04163764567', 3, NULL, 2),
(18, 'Delia', 'Katherine', 'Espinosa', 'Hernández', 'DEspinos@una.edu.ve', '04247890456', 3, NULL, 2),
(19, 'Cadman', 'Jack', 'Branch', 'Estes', 'Nulla.facilisi@una.edu.ve', '5919754616', 3, NULL, 2),
(20, 'Ennio', '', 'Vivaldi', '', 'Ennio.Vivaldi@uchile.edu.cl', '5688898992', 4, 1, 1),
(21, 'Gabriel', 'Alejandro', 'Coria', 'Martínez', 'GaboA@uchile.edu.cl', '04125247654', 4, NULL, 2),
(22, 'May', 'Ima', 'Sanford', 'Armstrong', 'Duis.a@uchile.edu.cl', '7925752065', 4, 1, 2),
(25, 'maria', 'andreina', 'perez', 'perez', 'maria.perez@gmail.com', '04567892', 3, 1, 2),
(21333, 'camila', 'smith', 'suarez', 'gomez', 'camila.gomez@gmail.com', '0267543', 4, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID`, `NOMBRE`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoconvenios`
--

CREATE TABLE IF NOT EXISTS `tipoconvenios` (
  `idTipoConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionTipoConvenio` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoConvenio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipoconvenios`
--

INSERT INTO `tipoconvenios` (`idTipoConvenio`, `descripcionTipoConvenio`) VALUES
(1, 'Marco'),
(2, 'Especifico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipooperaciones`
--

CREATE TABLE IF NOT EXISTS `tipooperaciones` (
  `idTipoOperacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionTipoOperacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoOperacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipooperaciones`
--

INSERT INTO `tipooperaciones` (`idTipoOperacion`, `descripcionTipoOperacion`) VALUES
(1, 'Crear'),
(2, 'Modificar'),
(3, 'Eliminar'),
(4, 'RenovacionConvenio'),
(5, 'cambioEstadoConvenio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporesponsable`
--

CREATE TABLE IF NOT EXISTS `tiporesponsable` (
  `idTipoResponsable` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionTipoResponsable` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoResponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tiporesponsable`
--

INSERT INTO `tiporesponsable` (`idTipoResponsable`, `descripcionTipoResponsable`) VALUES
(1, 'Legal'),
(2, 'Contacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposinstituciones`
--

CREATE TABLE IF NOT EXISTS `tiposinstituciones` (
  `idTipoInstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoInstitucion` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoInstitucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tiposinstituciones`
--

INSERT INTO `tiposinstituciones` (`idTipoInstitucion`, `nombreTipoInstitucion`) VALUES
(1, 'Educativa'),
(2, 'Salud'),
(3, 'Economica'),
(4, 'Gubernamental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `IdRol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdRol` (`IdRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `clave`, `correo`, `fecha_creacion`, `IdRol`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@example.com', '2016-01-01 00:00:00', 1),
(2, 'leydy', '81dc9bdb52d04dc20036dbd8313ed055', 'leydy@example.com', '2016-01-01 00:00:00', 1),
(3, 'tyson', '81dc9bdb52d04dc20036dbd8313ed055', 'tyson@example.com', '2016-01-01 00:00:00', 1),
(8, 'cocococo', 'd642668f2d463c2ff3e603eba3df672c', 'coco@gmail.com', '2017-02-01 00:00:00', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actaintencion`
--
ALTER TABLE `actaintencion`
  ADD CONSTRAINT `fk_actaIntencion_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `fk_convenios_clasificacionConvenios1` FOREIGN KEY (`clasificacionConvenios_idTipoConvenio`) REFERENCES `clasificacionconvenios` (`idClasificacionConvenio`),
  ADD CONSTRAINT `fk_convenios_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`),
  ADD CONSTRAINT `fk_convenios_dependencias1` FOREIGN KEY (`dependencias_idDependencia`) REFERENCES `dependencias` (`idDependencia`),
  ADD CONSTRAINT `fk_convenios_tipoConvenios1` FOREIGN KEY (`tipoConvenios_idTipoConvenio`) REFERENCES `tipoconvenios` (`idTipoConvenio`);

--
-- Filtros para la tabla `convenio_aportes`
--
ALTER TABLE `convenio_aportes`
  ADD CONSTRAINT `fk_convenios_has_aportes_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenio_aportes_monedas1` FOREIGN KEY (`monedas_idMoneda`) REFERENCES `monedas` (`idMoneda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `convenio_estados`
--
ALTER TABLE `convenio_estados`
  ADD CONSTRAINT `fk_convenios_has_estadoConvenios_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenios_has_estadoConvenios_estadoConvenios1` FOREIGN KEY (`estadoConvenios_idEstadoConvenio`) REFERENCES `estadoconvenios` (`idEstadoConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenio_Estados_dependencias1` FOREIGN KEY (`dependencias_idDependencia`) REFERENCES `dependencias` (`idDependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_estados_paises` FOREIGN KEY (`paises_idPais`) REFERENCES `paises` (`idPais`);

--
-- Filtros para la tabla `historicoresponsables`
--
ALTER TABLE `historicoresponsables`
  ADD CONSTRAINT `fk_historicoResponsables_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historicoResponsables_institucion_convenios1` FOREIGN KEY (`institucion_convenios_idInstitucionConvenio`) REFERENCES `institucion_convenios` (`idInstitucionConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historicoResponsables_responsables1` FOREIGN KEY (`responsables_idResponsable`) REFERENCES `responsables` (`idResponsable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD CONSTRAINT `fk_instituciones_estados1` FOREIGN KEY (`estados_idEstado`) REFERENCES `estados` (`idEstado`),
  ADD CONSTRAINT `fk_instituciones_tiposInstituciones1` FOREIGN KEY (`tiposInstituciones_idTipoInstitucion`) REFERENCES `tiposinstituciones` (`idTipoInstitucion`);

--
-- Filtros para la tabla `institucion_convenios`
--
ALTER TABLE `institucion_convenios`
  ADD CONSTRAINT `fk_instituciones_has_convenios_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instituciones_has_convenios_instituciones1` FOREIGN KEY (`instituciones_idInstitucion`) REFERENCES `instituciones` (`idInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_modulos_operaciones` FOREIGN KEY (`modulos_idModulo`) REFERENCES `modulos` (`idModulo`),
  ADD CONSTRAINT `fk_tipoOperaciones_operaciones` FOREIGN KEY (`tipoOperaciones_idTipoOperacion`) REFERENCES `tipooperaciones` (`idTipoOperacion`),
  ADD CONSTRAINT `fk_usuario_operaciones` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `renovacionprorrogas`
--
ALTER TABLE `renovacionprorrogas`
  ADD CONSTRAINT `fk_renovacionProrrogas_convenios1` FOREIGN KEY (`convenios_idConvenio`) REFERENCES `convenios` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `fk_responsables_dependencias1` FOREIGN KEY (`dependencias_idDependencia`) REFERENCES `dependencias` (`idDependencia`),
  ADD CONSTRAINT `fk_responsables_instituciones1` FOREIGN KEY (`instituciones_idInstitucion`) REFERENCES `instituciones` (`idInstitucion`),
  ADD CONSTRAINT `fk_responsables_tipoResponsable1` FOREIGN KEY (`tipoResponsable_idTipoResponsable`) REFERENCES `tiporesponsable` (`idTipoResponsable`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
