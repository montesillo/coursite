-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2018 a las 21:45:21
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `coursite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(5) NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombres`, `a_paterno`, `a_materno`, `correo`, `password`, `intentos`) VALUES
(1, 'Hiram Alfredo', 'Sánchez', 'Montesillo', 'montesillo25@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contesta`
--

CREATE TABLE IF NOT EXISTS `contesta` (
  `id_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`) VALUES
(1, 'PHP'),
(2, 'C++'),
(3, 'C#'),
(4, 'Android Studio'),
(5, 'Java'),
(6, 'PHP AVANZADO'),
(7, 'Django');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escogen`
--

CREATE TABLE IF NOT EXISTS `escogen` (
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
  `id_examen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rc` text NOT NULL,
  `re1` text NOT NULL,
  `re2` text NOT NULL,
  `pregunta` text NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_examen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id_examen`, `rc`, `re1`, `re2`, `pregunta`, `id_curso`) VALUES
(11, 'Es un lenguaje de programaciÃ³n que funciona del lado del servidor ', 'Es un lenguaje de programaciÃ³n que funciona del lado del cliente ', 'Es un lenguaje de hipertexto ', ' Â¿Que es PHP?', 1),
(12, 'Conectar con la base de datos', 'Borrar una base de datos', 'Exportar una base de datos', 'Â¿Para que sirve mysqli_connect?', 1),
(13, 'Elimina una cookie', 'Crea una cookie', 'Duplica una cookie', 'Para que sirve esta linea setcookie(cookie,null, -1);', 1),
(14, 'Para leer codigos QR', 'Enviar emails', 'Crear PDF', 'En que nos ayuda esta libreria: phpqrcode', 1),
(15, 'Enviar emails', 'Crear PDF', 'Para leer codigos QR', 'En que nos ayuda esta libreria: PHPMailer', 1),
(16, 'Crear PDF', 'Para leer codigos QR', 'Enviar emails', 'En que nos ayuda esta libreria: fpdf', 1),
(17, '$variable;', 'var variable;', 'char variable;', 'Â¿Como se crea una variable en PHP?', 1),
(18, '2', '11', 'Sintax error', 'Que se imprime con esta linea de codigo  $var1 = 1; $var2 = "1"; $var3 = $var1 + $var2; echo $var3;', 1),
(19, 'Sirve para abrir un archivo de texto', 'Sirve para imprimir la pantalla', 'Sirve para agragar contenido a la base de datos', 'Para que sirve fopen', 1),
(20, 'Lista los archivos de una ruta especificada', 'Crea una galeria de imagenes', 'Imprime las imagenes de la ruta especificada', 'Para que sirve scandir', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `explicaciones`
--

CREATE TABLE IF NOT EXISTS `explicaciones` (
  `id_explicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_curso` int(10) NOT NULL,
  PRIMARY KEY (`id_explicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `explicaciones`
--

INSERT INTO `explicaciones` (`id_explicacion`, `url`, `texto`, `id_curso`) VALUES
(1, 'https://www.youtube.com/embed/EmDlpyn1MUE', 'En este primer tutorial vamos a ver que es php, para que lo usamos y donde podemos encontrar informacion sobre este lenguaje de programacion interpretado por el servidor.', 1),
(2, 'https://www.youtube.com/embed/b4GtxaEqy3A', 'En este tutorial veremos como descargar e instalar el Wamp server para convertir nuestro ordenador en un servidor y poder programar en PHP.', 1),
(3, 'https://www.youtube.com/embed/tMJc8krx2n4', 'En este primer capitulo de la serie de programación para novatos en c++ veremos la estructura general que deben tener nuestros programas, funciones de salida de la librería stdio.h, que significa compilar un código y por ultimo la ejecución del mismo. Crearemos un "Hola Mundo" como primer programa en nuestro curso de C++.', 2),
(4, 'https://www.youtube.com/embed/pO7STLF82Ro', 'En este primer video aprenderas a instalar de la manera correcta Android Studio.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE IF NOT EXISTS `maestros` (
  `id_maestro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(60) NOT NULL,
  `a_paterno` varchar(35) NOT NULL,
  `a_materno` varchar(35) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `intentos` int(5) NOT NULL,
  PRIMARY KEY (`id_maestro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `nombres`, `a_paterno`, `a_materno`, `correo`, `password`, `intentos`) VALUES
(1, 'Hiram Alfredo', 'Sánchez', 'Montesillo', 'montesillo25@gmail.com', '12345', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
