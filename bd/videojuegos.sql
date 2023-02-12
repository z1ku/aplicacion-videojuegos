-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2023 a las 20:35:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `juego` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(300) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `plataforma` bigint(20) UNSIGNED NOT NULL,
  `caratula` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `plataforma`, `caratula`, `fecha_lanzamiento`, `activo`) VALUES
(1, 'Counter-Strike', 'Shooter, Multijugador, Tactico', 1, '1.webp', '2000-11-08', 1),
(2, 'Hunt: Showdown', 'Shooter, Multijugador, Extraction', 1, '2.jpg', '2018-02-22', 1),
(3, 'Black Desert Online', 'MMORPG', 1, '3.jpg', '2017-05-16', 1),
(4, 'Devil May Cry', 'Hack and Slash', 1, '4.jpg', '2001-03-16', 1),
(5, 'The Last of Us', 'Aventura, Acción', 3, '5.webp', '2015-02-12', 1),
(6, 'Ratchet and Clank', 'Plataformas, Aventura', 3, '6.webp', '2005-02-12', 1),
(7, 'Need for Speed', 'Coches, Carreras', 3, '7.jpg', '2015-07-04', 1),
(8, 'Resident Evil 2 Remake', 'Zombies, Terror', 3, '8.jpg', '2019-01-25', 1),
(9, 'Halo: Reach', 'Shooter, Futurista', 2, '9.jpg', '2014-10-10', 1),
(10, 'STAR WARS Jedi: Fallen Order', 'Futurista, Aventura, Espacio', 2, '10.jpg', '2018-04-05', 1),
(11, 'Biomutant', 'Aventura, Accion, Mundo abierto', 2, '11.jpg', '2018-07-17', 1),
(12, 'Assasin\'s Creed Unity', 'Acción, Aventura, Histórico', 2, '12.jpg', '2009-02-07', 1),
(13, 'Spellforce', 'Estrategia, 4x', 1, '13.jpg', '2023-02-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `logotipo` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(1, 'PC', 1, '1.png'),
(2, 'XBOX', 1, '2.png'),
(3, 'PS5', 1, '3.png'),
(4, 'Nintendo', 1, '4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nick` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, NULL, 'admin', 'admin', NULL),
(2, 'Richard', 'richar1', 'richar1', 1),
(3, 'Jesus', 'jesus1', 'jesus1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`usuario`,`juego`,`fecha`),
  ADD KEY `ce_com_juego` (`juego`),
  ADD KEY `usuario` (`usuario`,`juego`,`fecha`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ce_juegos_plataforma` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `ce_com_juego` FOREIGN KEY (`juego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `ce_com_usu` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `ce_juegos_plataforma` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
