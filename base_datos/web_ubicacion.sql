-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2022 a las 17:46:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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
-- Estructura de tabla para la tabla `web_ubicacion`
--

CREATE TABLE `web_ubicacion` (
  `id_web_ubicacion` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_departamento` varchar(20) NOT NULL,
  `id_provincia` varchar(20) NOT NULL,
  `id_distrito` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono_1` varchar(20) DEFAULT NULL,
  `telefono_2` varchar(20) DEFAULT NULL,
  `latitud` varchar(30) NOT NULL,
  `longitud` varchar(30) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_ubicacion`
--

INSERT INTO `web_ubicacion` (`id_web_ubicacion`, `id_pais`, `id_departamento`, `id_provincia`, `id_distrito`, `direccion`, `telefono_1`, `telefono_2`, `latitud`, `longitud`, `imagen`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(45, 1, '01', '0101', '010101', 'AV principal maisanta', '123456', '123456789', '3301123', '95385', 'archivos/foto_web_ubicacion/261022053856_28/fp_261022_0556_56.png', 1, '2022-10-21 12:20:49', '2022-10-25 23:38:57', 1, 2),
(47, 1, '01', '0101', '010108', 'addfd frfdsfsdf', '35465421asda sd', '685465465asd d', '33172asdad', '123456', 'archivos/foto_web_ubicacion/261022171818_30/fp_261022_1718_45.', 1, '2022-10-21 14:12:25', '2022-10-26 11:18:18', 1, 2),
(51, 1, '01', '0101', '010103', 'asda d3d', 'a456', '45645', '45', '456', '', 1, '2022-10-25 22:43:16', '2022-10-25 23:24:04', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `web_ubicacion`
--
ALTER TABLE `web_ubicacion`
  ADD PRIMARY KEY (`id_web_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `web_ubicacion`
--
ALTER TABLE `web_ubicacion`
  MODIFY `id_web_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
