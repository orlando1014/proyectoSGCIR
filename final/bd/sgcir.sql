-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2020 a las 19:47:11
-- Versión del servidor: 5.7.28
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgcir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuestionarios`
--

DROP TABLE IF EXISTS `tbl_cuestionarios`;
CREATE TABLE IF NOT EXISTS `tbl_cuestionarios` (
  `idcuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreproyecto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaelaboracion` date NOT NULL,
  `listaverificacion` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `terminado` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcuestionario`),
  UNIQUE KEY `uk_listaverificacion_cue` (`listaverificacion`),
  KEY `fk_idusuario_cue` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_cuestionarios`
--

INSERT INTO `tbl_cuestionarios` (`idcuestionario`, `nombreproyecto`, `ubicacion`, `fechaelaboracion`, `listaverificacion`, `idusuario`, `terminado`) VALUES
(11, 'cualquiera', 'donde sea', '2020-06-18', 'C-2020-1', 3, 'SI'),
(12, 'sena pedregal', 'Bodega', '2020-06-20', 'C-2020-2', 3, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

DROP TABLE IF EXISTS `tbl_preguntas`;
CREATE TABLE IF NOT EXISTS `tbl_preguntas` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idcuestionario` int(11) NOT NULL,
  `numero` tinyint(4) NOT NULL,
  `pregunta` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombreimagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idpregunta`),
  KEY `fk_idcuestionario_pre` (`idcuestionario`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_preguntas`
--

INSERT INTO `tbl_preguntas` (`idpregunta`, `idcuestionario`, `numero`, `pregunta`, `categoria`, `respuesta`, `observacion`, `imagen`, `nombreimagen`) VALUES
(1, 11, 1, '¿ Se ha verificado que no hayan cables eléctricos expuestos, obstrucciones que puedan sobrecargar o inclinar el andamio colgante al levantarlo o bajarlo, bordes de techos o aberturas antes de usarlo ?', 'Inspección de Materiales y equipo', 'SI', 'p1', 'S', 'IMG-180620-102401'),
(2, 11, 2, '¿Los  tablones (canes) utilizados para la realización de la plataforma, tienen  un espesor mínimo de 5 cm y 26 cm de ancho sin nudos y sin rajaduras?', 'Inspección de Materiales y equipo', 'SI', 'p2', 'S', 'IMG-180620-102822'),
(3, 11, 3, '¿Las “u” del techo  o de las losas, las abrazaderas de los parapetos, las vigas en voladizo u otros dispositivos de suspensión son capaces de soportar la carga nominal del guinche (brazo + polea) con un factor de seguridad igual a cuatro (4).?', 'Inspección de Materiales y equipo', 'NO', 'p3', 'N', ''),
(4, 11, 4, '¿Todos los aparejos (poleas+ cable) se encuentran bien fijos y  no se mueven en ninguna dirección.?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(5, 11, 5, '¿Las guías se encuentran directamente debajo de sus puntos de suspensión y los cables están debidamente instalados. Sin nudos?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(6, 11, 6, '¿ Los grilletes del cable se colocaron  de acuerdo a las instrucciones,y el número de grilletes de 5/8\" que se utilizaron es mínimo 3 y se ubicaron en cada lado libre del cabo tanto en la parte inferior como en la superior?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(7, 11, 7, '¿Se ha diligenciado el permiso para trabajo en alturas?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(8, 11, 8, '¿Se delimitó y señalizó, el área del nivel inferior  del andamio con cinta de peligro y avisos de seguridad ?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(9, 11, 9, '¿ Se instalaron en el nivel superior e inferior protecciones colectivas para la caída de objetos o personas(ej: mallas o entelarados).?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(10, 11, 10, '¿Se utiliza el equipo de protección contra caídas  Arnés, casco, eslinga,línea de vida y de trabajo de vida ) si se está por encima de 1.5 mts .?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(11, 11, 11, '¿Se ha verificado  que el andamio no ha sido alterado después de su construcción.?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(12, 11, 12, '¿Se verificó que  distancia mínima permitida entre el borde de la losa(muro) y el andamio colgante(plataforma) es de 45 cm, en todas las poleas y PTS o Cerchas?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(13, 11, 13, '¿Se verificó que el largo del cable es el adecuado para la tarea a realizar , se hizo la prueba de soporte de carga a 30 cm del piso.?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(14, 11, 14, '¿Se verificó que el punto máximo de trabajo del andamio colgante, hayan mínimo 4 vueltas de este en cada polea ?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(15, 11, 15, '¿Se acordonó el área baja del andamio para realizar el desensamble.?', 'Desensamble', 'N/A', '', 'N', ''),
(16, 11, 16, '¿Todos los elementos sobrantes que están sobre la plataforma de trabajo han sido retirados.?', 'Desensamble', 'N/A', '', 'S', 'IMG-180620-102850'),
(17, 11, 17, '¿Se verificó que cada persona sobre  el andamio colgante esté unida a un Sistema protector contra caídas (línea de vida) que sea independiente al de su compañero.?', 'Desensamble', 'NO', '', 'N', ''),
(18, 11, 18, '¿Los andamios se montan y se desarman bajo la supervisión del encargado de obra, inspector de seguridad o maestro de obra el cual es la persona responsable.?', 'Desensamble', 'N/A', '', 'N', ''),
(19, 11, 19, 'Si es necesario dejar suspendido el andamio para evitar los movimientos oscilattorios se verificó que esté venteado y que no haya residuos de materiales o equipos que puedan caer.?', 'Desensamble', 'N/A', '', 'N', ''),
(20, 11, 20, '¿Si hay elementos en mal estado luego del desensamble se han separado y reportado al inspector y este a su vez al director de obra?', 'Desensamble', 'SI', '', 'S', 'IMG-180620-102913'),
(21, 12, 1, '¿ Se ha verificado que no hayan cables eléctricos expuestos, obstrucciones que puedan sobrecargar o inclinar el andamio colgante al levantarlo o bajarlo, bordes de techos o aberturas antes de usarlo ?', 'Inspección de Materiales y equipo', 'NO', 'no', 'S', 'IMG-190620-091410'),
(22, 12, 2, '¿Los  tablones (canes) utilizados para la realización de la plataforma, tienen  un espesor mínimo de 5 cm y 26 cm de ancho sin nudos y sin rajaduras?', 'Inspección de Materiales y equipo', 'SI', 'si', 'S', 'IMG-240620-111619'),
(23, 12, 3, '¿Las “u” del techo  o de las losas, las abrazaderas de los parapetos, las vigas en voladizo u otros dispositivos de suspensión son capaces de soportar la carga nominal del guinche (brazo + polea) con un factor de seguridad igual a cuatro (4).?', 'Inspección de Materiales y equipo', 'N/A', 'na', 'S', 'IMG-240620-111634'),
(24, 12, 4, '¿Todos los aparejos (poleas+ cable) se encuentran bien fijos y  no se mueven en ninguna dirección.?', 'Inspección de Materiales y equipo', 'SI', 'si', 'S', 'IMG-240620-111656'),
(25, 12, 5, '¿Las guías se encuentran directamente debajo de sus puntos de suspensión y los cables están debidamente instalados. Sin nudos?', 'Inspección de Materiales y equipo', 'N/A', 'na', 'S', 'IMG-240620-111720'),
(26, 12, 6, '¿ Los grilletes del cable se colocaron  de acuerdo a las instrucciones,y el número de grilletes de 5/8\" que se utilizaron es mínimo 3 y se ubicaron en cada lado libre del cabo tanto en la parte inferior como en la superior?', 'Inspección de Materiales y equipo', 'SI', 'si', 'S', 'IMG-240620-111742'),
(27, 12, 7, '¿Se ha diligenciado el permiso para trabajo en alturas?', 'Inspección de Materiales y equipo', 'NO', 'no', 'S', 'IMG-240620-111826'),
(28, 12, 8, '¿Se delimitó y señalizó, el área del nivel inferior  del andamio con cinta de peligro y avisos de seguridad ?', 'Inspección de Materiales y equipo', 'NO', 'no', 'S', 'IMG-240620-111846'),
(29, 12, 9, '¿ Se instalaron en el nivel superior e inferior protecciones colectivas para la caída de objetos o personas(ej: mallas o entelarados).?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(30, 12, 10, '¿Se utiliza el equipo de protección contra caídas  Arnés, casco, eslinga,línea de vida y de trabajo de vida ) si se está por encima de 1.5 mts .?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(31, 12, 13, '¿Se verificó que el largo del cable es el adecuado para la tarea a realizar , se hizo la prueba de soporte de carga a 30 cm del piso.?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(32, 12, 13, '¿Se verificó que el largo del cable es el adecuado para la tarea a realizar , se hizo la prueba de soporte de carga a 30 cm del piso.?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(33, 12, 14, '¿Se verificó que el punto máximo de trabajo del andamio colgante, hayan mínimo 4 vueltas de este en cada polea ?', 'Inspección de Materiales y equipo', 'N/A', '', 'N', ''),
(34, 12, 16, '¿Todos los elementos sobrantes que están sobre la plataforma de trabajo han sido retirados.?', 'Desensamble', 'N/A', '', 'N', ''),
(35, 12, 17, '¿Se verificó que cada persona sobre  el andamio colgante esté unida a un Sistema protector contra caídas (línea de vida) que sea independiente al de su compañero.?', 'Desensamble', 'N/A', '', 'N', ''),
(36, 12, 18, '¿Los andamios se montan y se desarman bajo la supervisión del encargado de obra, inspector de seguridad o maestro de obra el cual es la persona responsable.?', 'Desensamble', 'N/A', '', 'N', ''),
(37, 12, 19, 'Si es necesario dejar suspendido el andamio para evitar los movimientos oscilattorios se verificó que esté venteado y que no haya residuos de materiales o equipos que puedan caer.?', 'Desensamble', 'N/A', '', 'N', ''),
(38, 12, 20, '¿Si hay elementos en mal estado luego del desensamble se han separado y reportado al inspector y este a su vez al director de obra?', 'Desensamble', 'N/A', '', 'N', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

DROP TABLE IF EXISTS `tbl_rol`;
CREATE TABLE IF NOT EXISTS `tbl_rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(14) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`idrol`, `cargo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'INSPECTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(60) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `cedula_usuario` varchar(10) NOT NULL,
  `clave_usuario` varchar(12) NOT NULL,
  `idrol` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_idrol_usu` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`idusuario`, `nombre_usuario`, `correo_usuario`, `cedula_usuario`, `clave_usuario`, `idrol`) VALUES
(2, 'Jeison guisao', 'jeison@hotmail.com', '123456789', '12345', 1),
(3, 'Orlando Cabrera Almanza', 'cabrera@gmail.com', '12122121', 'junior1012', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cuestionarios`
--
ALTER TABLE `tbl_cuestionarios`
  ADD CONSTRAINT `fk_idusuario_cue` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuarios` (`idusuario`);

--
-- Filtros para la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD CONSTRAINT `fk_idcuestionario_pre` FOREIGN KEY (`idcuestionario`) REFERENCES `tbl_cuestionarios` (`idcuestionario`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_idrol_usu` FOREIGN KEY (`idrol`) REFERENCES `tbl_rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
