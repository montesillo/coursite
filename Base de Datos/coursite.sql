-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2018 a las 12:45:35
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coursite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombres`, `a_paterno`, `a_materno`, `correo`, `password`, `intentos`) VALUES
(1, 'Hiram Alfredo', 'Sánchez', 'Montesillo', 'montesillo25@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contesta`
--

CREATE TABLE `contesta` (
  `id_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `escogen` (
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id_examen` int(10) UNSIGNED NOT NULL,
  `rc` text NOT NULL,
  `re1` text NOT NULL,
  `re2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `explicaciones`
--

CREATE TABLE `explicaciones` (
  `id_explicacion` int(10) UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_curso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `explicaciones`
--

INSERT INTO `explicaciones` (`id_explicacion`, `url`, `texto`, `id_curso`) VALUES
(1, 'https://www.youtube.com/embed/EmDlpyn1MUE', 'En este primer tutorial vamos a ver que es php, para que lo usamos y donde podemos encontrar informacion sobre este lenguaje de programacion interpretado por el servidor.', 1),
(2, 'https://www.youtube.com/embed/b4GtxaEqy3A', 'En este tutorial veremos como descargar e instalar el Wamp server para convertir nuestro ordenador en un servidor y poder programar en PHP.', 1),
(3, 'https://www.youtube.com/embed/tMJc8krx2n4', 'En este primer capitulo de la serie de programación para novatos en c++ veremos la estructura general que deben tener nuestros programas, funciones de salida de la librería stdio.h, que significa compilar un código y por ultimo la ejecución del mismo. Crearemos un \"Hola Mundo\" como primer programa en nuestro curso de C++.', 2),
(4, 'https://www.youtube.com/embed/pO7STLF82Ro', 'En este primer video aprenderas a instalar de la manera correcta Android Studio.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id_maestro` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `a_paterno` varchar(35) NOT NULL,
  `a_materno` varchar(35) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `intentos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `nombres`, `a_paterno`, `a_materno`, `correo`, `password`, `intentos`) VALUES
(1, 'Hiram Alfredo', 'Sánchez', 'Montesillo', 'montesillo25@gmail.com', '12345', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_examen`);

--
-- Indices de la tabla `explicaciones`
--
ALTER TABLE `explicaciones`
  ADD PRIMARY KEY (`id_explicacion`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id_maestro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `explicaciones`
--
ALTER TABLE `explicaciones`
  MODIFY `id_explicacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id_maestro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
