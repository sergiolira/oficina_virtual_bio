-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 07:25:17
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
-- Estructura de tabla para la tabla `web_slider_carousel`
--

CREATE TABLE `web_slider_carousel` (
  `id_web_slider_carousel` int(11) NOT NULL,
  `posicion_imagen` varchar(15) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `h1` varchar(20) DEFAULT NULL,
  `span` varchar(20) DEFAULT NULL,
  `parrafo` text DEFAULT NULL,
  `boton_1_desc` varchar(20) DEFAULT NULL,
  `boton_2_desc` varchar(20) DEFAULT NULL,
  `boton_1_enlace` varchar(20) DEFAULT NULL,
  `boton_2_enlace` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_slider_carousel`
--

INSERT INTO `web_slider_carousel` (`id_web_slider_carousel`, `posicion_imagen`, `imagen`, `h1`, `span`, `parrafo`, `boton_1_desc`, `boton_2_desc`, `boton_1_enlace`, `boton_2_enlace`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(4, '1', 'archivos/021122031549_14/021122_0349_40.png', 'Super Convenient', 'ORGANIC SUPPLEMENT', 'This is a handy form of protein on days when you need a little extra! No synthetic coating & safe for all young adults.', 'Purchase', 'More', 'enlace.php', 'enlace.php', 1, '2022-11-01 18:47:22', '2022-11-01 21:15:49', 1, 1),
(5, '2', 'archivos/021122071732_81/021122_0732_21.png', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1, '2022-11-02 01:17:32', '2022-11-02 01:17:32', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `web_slider_carousel`
--
ALTER TABLE `web_slider_carousel`
  ADD PRIMARY KEY (`id_web_slider_carousel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `web_slider_carousel`
--
ALTER TABLE `web_slider_carousel`
  MODIFY `id_web_slider_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
