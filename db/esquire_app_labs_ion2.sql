-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2015 a las 01:38:38
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `esquire_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_encuesta`
--

CREATE TABLE IF NOT EXISTS `ct_encuesta` (
  `id_encuesta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `activa` tinyint(4) NOT NULL DEFAULT '0',
  `id_evento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_encuesta`),
  KEY `fk_evento_encuesta_idx` (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ct_encuesta`
--

INSERT INTO `ct_encuesta` (`id_encuesta`, `nombre`, `activa`, `id_evento`) VALUES
(1, 'MESA REDONDA I: LA INDUSTRIA DEL LUJO A LA CONQUISTA DEL HOMBRE DE  HOY', 1, 1),
(2, 'MESA REDONDA II: HOMBRES SIN FRONTERAS', 0, 2),
(3, 'MESA REDONDA III: HÃ‰ROES DE NUESTROS DÃAS', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_eventos`
--

CREATE TABLE IF NOT EXISTS `ct_eventos` (
  `id_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `presentador` varchar(250) DEFAULT NULL,
  `detalles` longtext,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ct_eventos`
--

INSERT INTO `ct_eventos` (`id_evento`, `nombre`, `fecha`, `hora`, `presentador`, `detalles`) VALUES
(1, 'MESA REDONDA I: LA INDUSTRIA DEL LUJO A LA CONQUISTA DEL HOMBRE DE   HOY', '2015-07-08', '09:00:00', 'Presentador', 'El hombre del siglo XXI es mÃ¡s complejo, versÃ¡til y exigente que nunca. Es, tambiÃ©n, un ser mÃ¡s completo. La masculinidad atraviesa por una etapa de redefiniciÃ³n que implica retos inÃ©dito para quienes ofrecen productos y servicios a los hombres. Los estereotipos del pasado no son vÃ¡lidos. Â¿CÃ³mo enfrentan estos desafÃ­os las marcas  del segmento de lujo?'),
(2, 'MESA REDONDA II: HOMBRES SIN FRONTERAS', '2015-07-08', '10:00:00', 'Presentador', 'La globalizaciÃ³n ha expandido las fronteras internas de los seres humanos. Los hombres son mÃ¡s completos en esta era gracias al contacto continuo con otras culturas y sensibilidades. Incorporan lo mejor de otros estilos de vida para enriquecer el Ã¡mbito en el que viven. Estas son las experiencias nÃ³madas de cinco cosmopolitas.'),
(3, 'MESA REDONDA III: HÃ‰ROES DE NUESTROS DÃAS', '2015-07-08', '12:00:00', 'Presentador', 'Admiramos a los hombres que siguen sus sueÃ±os e ideales contra viento y marea. Y los admiramos mÃ¡s cuando triunfan en lo que se proponen y se convierten en una influencia. Â¿CÃ³mo lo lograron? Â¿CuÃ¡les son sus procesos de pensamiento y de operaciÃ³n, sus prioridades y mÃ©todos de trabajo? Â¿CuÃ¡l es su definiciÃ³n de Ã©xito? Â¿Son muy diferentes del resto de nosotros?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_preguntas`
--

CREATE TABLE IF NOT EXISTS `ct_preguntas` (
  `id_pregunta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(10) unsigned NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `activa` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_publicacion` datetime NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `fk_pregunta_encuesta_idx` (`id_encuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `ct_preguntas`
--

INSERT INTO `ct_preguntas` (`id_pregunta`, `id_encuesta`, `pregunta`, `activa`, `fecha_publicacion`) VALUES
(1, 1, 'Â¿A quÃ© le das mÃ¡s importancia cuando compras un producto de lujo?', 1, '2015-07-06 11:13:00'),
(2, 1, 'Â¿CÃ³mo te informas cuando vas a comprar un producto de lujo?', 1, '2015-07-06 11:13:12'),
(4, 1, 'Â¿QuÃ© te atrae de una marca de lujo?', 1, '2015-07-06 11:13:30'),
(5, 2, 'AdemÃ¡s de por turismo y por negocios, Â¿por quÃ© un hombre debe viajar?', 1, '2015-07-06 11:19:01'),
(6, 2, 'Â¿CuÃ¡l de estas cosas no te puede faltar en un viaje?', 1, '2015-07-06 11:19:53'),
(7, 2, 'Â¿CÃ³mo te informas cuando vas a hacer un viaje?', 1, '2015-07-06 11:22:24'),
(8, 3, 'Â¿CÃ³mo defines a un hombre exitoso?', 1, '2015-07-06 11:25:30'),
(9, 3, 'Â¿CuÃ¡l es el valor mÃ¡s importante de un hÃ©roe moderno?', 1, '2015-07-06 11:26:36'),
(10, 3, 'Â¿CuÃ¡l debe ser el cambio mÃ¡s significativo en el rol del hombre moderno?', 1, '2015-07-06 11:27:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_respuesta`
--

CREATE TABLE IF NOT EXISTS `ct_respuesta` (
  `id_respuesta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(10) unsigned NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  PRIMARY KEY (`id_respuesta`),
  KEY `fk_respuesta_pregunta_idx` (`id_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `ct_respuesta`
--

INSERT INTO `ct_respuesta` (`id_respuesta`, `id_pregunta`, `respuesta`) VALUES
(1, 1, 'Al diseÃ±o e innovaciÃ³n'),
(2, 1, 'Al prestigio de la marca'),
(3, 1, 'A las tendencias actuales'),
(4, 1, 'A su utilidad'),
(5, 2, 'A travÃ©s de internet'),
(6, 2, 'Mediante revistas o medios especializados'),
(7, 2, 'Por recomendaciones de conocidos'),
(8, 2, 'Directamente en la boutique o tienda departamental'),
(9, 4, 'Su imagen y/o sus campaÃ±as publicitarias'),
(10, 4, 'Su ADN, historia y los valores que transmite'),
(11, 4, 'El servicio posventa que ofrecen'),
(12, 4, 'La calidad de sus productos'),
(13, 5, 'Para enriquecerse como ser humano'),
(14, 5, 'Para llevar su cultura a otras partes del mundo'),
(15, 5, 'Para desafiar sus creencias sobre el mundo'),
(16, 5, 'Para retomar ejemplos positivos de otras culturas y aplicarlas en su paÃ­s'),
(17, 6, 'Donde capturar memorias (cÃ¡mara de fotos o de video, libreta de viajes...)'),
(19, 6, 'Ir preparado: investigar, llevar apps para viajes, armar tu propia guÃ­a de viaje'),
(21, 6, 'c.Â Entretenimiento para el viaje (playlist, libros,etc)'),
(22, 7, 'A travÃ©s de internet o de apps especializadas'),
(23, 7, 'Mediante revistas o medios especializados'),
(24, 7, 'Por recomendaciones de conocidos'),
(25, 7, 'Directamente en los hoteles o las oficinas de turismo de los lugares a visitar'),
(26, 7, 'Mediante agencia de viajes'),
(27, 8, 'Consigue un equilibrio entre su carrera y su vida personal'),
(28, 8, 'Sus logros tienen trascendencia'),
(31, 8, 'Alcanza los objetivos que se propone '),
(32, 8, 'Logra la estabilidad econÃ³mica, reconocimiento social y una posiciÃ³n'),
(33, 9, 'Honestidad'),
(34, 9, 'EmpatÃ­a'),
(35, 9, 'Tenacidad'),
(36, 9, 'ValentÃ­a'),
(37, 10, 'Reconocimiento pleno de la mujer como una igual en todos los Ã¡mbitos'),
(38, 10, 'Superar los estereotipos existentes sobre la masculinidad (machismo, falta de  inteligencia emocional, etc.)'),
(39, 10, 'Replantear la paternidad como una relaciÃ³n horizontal mÃ¡s que vertical'),
(40, 10, 'Transmitir estos cambios a las nuevas generaciones de');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_usuario`
--

CREATE TABLE IF NOT EXISTS `ct_usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo_electornico` varchar(80) NOT NULL,
  `passwd` varchar(50) NOT NULL COMMENT 'SHA1(MD5(PASSWD))',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_usuario`
--

INSERT INTO `ct_usuario` (`id_usuario`, `nombre`, `correo_electornico`, `passwd`) VALUES
('ioncom', 'ioncom', 'miguel@ioncom.com.mx', '1565113e38aa620557e05615a84e1034f6e153ce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ht_resultado_encuesta`
--

CREATE TABLE IF NOT EXISTS `ht_resultado_encuesta` (
  `id_resultado_encuesta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_respuesta` int(10) unsigned NOT NULL,
  `rango_edad` varchar(50) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`id_resultado_encuesta`),
  KEY `fk_respuesta_idx` (`id_respuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Volcado de datos para la tabla `ht_resultado_encuesta`
--

INSERT INTO `ht_resultado_encuesta` (`id_resultado_encuesta`, `id_respuesta`, `rango_edad`, `sexo`) VALUES
(1, 14, '31-36', 'm'),
(2, 17, '31-36', 'm'),
(3, 24, '31-36', 'm'),
(4, 14, '25-30', 'm'),
(5, 17, '25-30', 'm'),
(6, 25, '25-30', 'm'),
(7, 13, '25-30', 'm'),
(8, 19, '25-30', 'm'),
(9, 23, '25-30', 'm'),
(10, 1, '25-30', 'm'),
(11, 6, '25-30', 'm'),
(12, 12, '25-30', 'm'),
(13, 1, '31-36', 'm'),
(14, 6, '31-36', 'm'),
(15, 11, '31-36', 'm'),
(16, 4, '25-30', 'm'),
(17, 5, '25-30', 'm'),
(18, 9, '25-30', 'm'),
(19, 2, '25-30', 'm'),
(20, 7, '25-30', 'm'),
(21, 9, '25-30', 'm'),
(22, 3, '37+', 'm'),
(23, 7, '37+', 'm'),
(24, 12, '37+', 'm'),
(25, 1, '37+', 'm'),
(26, 6, '37+', 'm'),
(27, 12, '37+', 'm'),
(28, 3, '31-36', 'm'),
(29, 6, '31-36', 'm'),
(30, 10, '31-36', 'm'),
(31, 1, '31-36', 'm'),
(32, 5, '31-36', 'm'),
(33, 9, '31-36', 'm'),
(34, 1, '25-30', 'm'),
(35, 5, '25-30', 'm'),
(36, 9, '25-30', 'm'),
(37, 2, '25-30', 'm'),
(38, 5, '25-30', 'm'),
(39, 9, '25-30', 'm'),
(40, 1, '31-36', 'm'),
(41, 5, '31-36', 'm'),
(42, 9, '31-36', 'm'),
(43, 1, '37+', 'm'),
(44, 6, '37+', 'm'),
(45, 12, '37+', 'm'),
(46, 1, '31-36', 'm'),
(47, 5, '31-36', 'm'),
(48, 12, '31-36', 'm'),
(49, 4, '31-36', 'f'),
(50, 6, '31-36', 'f'),
(51, 12, '31-36', 'f'),
(52, 4, '37+', 'f'),
(53, 6, '37+', 'f'),
(54, 12, '37+', 'f'),
(55, 2, '31-36', 'm'),
(56, 6, '31-36', 'm'),
(57, 12, '31-36', 'm'),
(58, 1, '31-36', 'm'),
(59, 5, '31-36', 'm'),
(60, 9, '31-36', 'm'),
(61, 2, '31-36', 'f'),
(62, 6, '31-36', 'f'),
(63, 12, '31-36', 'f'),
(64, 4, '31-36', 'f'),
(65, 6, '31-36', 'f'),
(66, 10, '31-36', 'f'),
(67, 1, '25-30', 'm'),
(68, 7, '25-30', 'm'),
(69, 10, '25-30', 'm'),
(70, 4, '37+', 'f'),
(71, 6, '37+', 'f'),
(72, 9, '37+', 'f'),
(73, 4, '25-30', 'm'),
(74, 7, '25-30', 'm'),
(75, 10, '25-30', 'm'),
(76, 2, '37+', 'f'),
(77, 6, '37+', 'f'),
(78, 12, '37+', 'f'),
(79, 4, '37+', 'f'),
(80, 7, '37+', 'f'),
(81, 9, '37+', 'f'),
(82, 3, '37+', 'm'),
(83, 8, '37+', 'm'),
(84, 12, '37+', 'm'),
(85, 4, '31-36', 'f'),
(86, 6, '31-36', 'f'),
(87, 10, '31-36', 'f'),
(88, 3, '25-30', 'm'),
(89, 7, '25-30', 'm'),
(90, 10, '25-30', 'm'),
(91, 3, '25-30', 'f'),
(92, 7, '25-30', 'f'),
(93, 10, '25-30', 'f'),
(94, 4, '25-30', 'f'),
(95, 6, '25-30', 'f'),
(96, 9, '25-30', 'f'),
(97, 3, '25-30', 'm'),
(98, 7, '25-30', 'm'),
(99, 10, '25-30', 'm'),
(100, 3, '25-30', 'm'),
(101, 7, '25-30', 'm'),
(102, 11, '25-30', 'm'),
(103, 1, '25-30', 'm'),
(104, 5, '25-30', 'm'),
(105, 9, '25-30', 'm');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ct_encuesta`
--
ALTER TABLE `ct_encuesta`
  ADD CONSTRAINT `fk_evento_encuesta` FOREIGN KEY (`id_evento`) REFERENCES `ct_eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ct_preguntas`
--
ALTER TABLE `ct_preguntas`
  ADD CONSTRAINT `fk_pregunta_encuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `ct_encuesta` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ct_respuesta`
--
ALTER TABLE `ct_respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `ct_preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ht_resultado_encuesta`
--
ALTER TABLE `ht_resultado_encuesta`
  ADD CONSTRAINT `fk_respuesta` FOREIGN KEY (`id_respuesta`) REFERENCES `ct_respuesta` (`id_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
