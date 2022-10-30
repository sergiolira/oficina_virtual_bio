-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 22:46:43
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
-- Estructura de tabla para la tabla `web_home_offer`
--

CREATE TABLE `web_home_offer` (
  `id_web_home_offer` int(11) NOT NULL,
  `titulo_h2` varchar(40) NOT NULL,
  `parrafo` varchar(100) NOT NULL,
  `desc_boton` varchar(20) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `imagen_mujer` varchar(150) NOT NULL,
  `span_producto` varchar(100) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_home_offer`
--

INSERT INTO `web_home_offer` (`id_web_home_offer`, `titulo_h2`, `parrafo`, `desc_boton`, `imagen_producto`, `imagen_mujer`, `span_producto`, `enlace`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'OFERTA ÚNICA', 'Tenemos ofertas por tiempo limitado para nuestro producto especial que va con una oferta especial. ¡', 'SOY SOCIO', 'archivos/231022202321_59/231022_2021_47.png', 'archivos/251022224246_62/251022_2246_31.png', 'Oferta', 'dsss', 'ampliar el campo parrafo', 1, '2022-10-18 18:50:46', '2022-10-25 15:42:46', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `web_home_offer`
--
ALTER TABLE `web_home_offer`
  ADD PRIMARY KEY (`id_web_home_offer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `web_home_offer`
--
ALTER TABLE `web_home_offer`
  MODIFY `id_web_home_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
