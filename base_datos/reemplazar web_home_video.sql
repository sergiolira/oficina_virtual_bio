-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 23:23:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_bio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_home_video`
--

CREATE TABLE `web_home_video` (
  `id_web_home_video` int(11) NOT NULL,
  `titulo_h2` varchar(40) NOT NULL,
  `parrafo` varchar(100) NOT NULL,
  `imagen_you_poster` varchar(100) NOT NULL,
  `imagen_fondo` varchar(150) NOT NULL,
  `enlace_video` varchar(150) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_home_video`
--

INSERT INTO `web_home_video` (`id_web_home_video`, `titulo_h2`, `parrafo`, `imagen_you_poster`, `imagen_fondo`, `enlace_video`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Sumate a la familia BIO Tree Life', 'Comienza tu propio negocio y conoce las ventajas de tener tu emprendimiento.', 'archivos/251022231336_46/251022_2336_25.png', 'archivos/251022232020_20/251022_2320_85.png', '', '', 1, '2022-10-25 16:13:36', '2022-10-25 16:20:20', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `web_home_video`
--
ALTER TABLE `web_home_video`
  ADD PRIMARY KEY (`id_web_home_video`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `web_home_video`
--
ALTER TABLE `web_home_video`
  MODIFY `id_web_home_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
