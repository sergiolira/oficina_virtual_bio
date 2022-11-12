-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 21:10:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

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
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE `afiliado` (
  `id_afiliado` int(11) NOT NULL,
  `ruc_patrocinador` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ruc_usuario` varchar(30) CHARACTER SET utf8 NOT NULL,
  `posicion` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_herramienta`
--

CREATE TABLE `asignacion_herramienta` (
  `id_asignacion_herramienta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_herramienta_tecnologica` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `fecha_liberacion` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion_herramienta`
--

INSERT INTO `asignacion_herramienta` (`id_asignacion_herramienta`, `id_usuario`, `id_herramienta_tecnologica`, `fecha_asignacion`, `fecha_liberacion`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 2, 1, '2022-08-23', '2022-09-01', 'Cmabios', 1, '2022-08-24 21:50:28', '2022-09-01 16:13:53', 1, 1),
(2, 2, 0, '2022-09-01', '0000-00-00', 'nuevosssasda', 1, '2022-09-01 15:34:13', '2022-09-01 15:34:55', 1, 1),
(3, 2, 2, '2022-09-01', '1900-01-01', '', 1, '2022-09-01 15:39:10', '2022-09-01 16:10:07', 1, 1),
(4, 3, 2, '2022-09-08', '1900-01-01', '', 1, '2022-09-08 13:42:14', '2022-09-08 13:42:14', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_licencia`
--

CREATE TABLE `asignacion_licencia` (
  `id_asignacion_licencia` int(11) NOT NULL,
  `id_herramienta_tecnologica` int(11) NOT NULL,
  `id_licencia` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `observacion` varchar(30) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion_licencia`
--

INSERT INTO `asignacion_licencia` (`id_asignacion_licencia`, `id_herramienta_tecnologica`, `id_licencia`, `fecha_asignacion`, `fecha_vencimiento`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 1, '2022-08-15', '2024-08-01', 'Esta licencia es la primera q', 1, '2022-08-15 00:50:27', '2022-08-26 21:48:08', 1, 1),
(2, 3, 2, '2022-09-08', '2024-09-13', '', 1, '2022-09-08 13:45:06', '2022-09-08 13:46:01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio_producto`
--

CREATE TABLE `beneficio_producto` (
  `id_beneficio_producto` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `beneficio_producto`
--

INSERT INTO `beneficio_producto` (`id_beneficio_producto`, `titulo`, `descripcion`, `id_producto`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Primero', 'asd', 31, '', 1, '2022-10-13 16:00:42', '2022-10-13 16:17:31', 1, 1),
(2, 'Segundo', 'asd', 31, '', 0, '2022-10-13 16:04:00', '2022-10-13 16:17:38', 1, 1),
(3, 'Tercero', 'aaaa', 32, '', 1, '2022-10-13 16:04:27', '2022-10-13 16:17:51', 1, 1),
(4, 'asdasfs', 'sad', 32, '', 1, '2022-10-13 16:05:50', '2022-10-13 16:17:19', 1, 1),
(5, 'asd', 'asd', 31, '', 1, '2022-10-13 16:06:31', '2022-10-13 16:06:31', 1, 1),
(6, 'sda', 'asda', 32, '', 1, '2022-10-13 16:06:39', '2022-10-13 16:06:39', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_comisiones_venta`
--

CREATE TABLE `cabecera_comisiones_venta` (
  `id_cabacera_comisiones_venta` int(11) NOT NULL,
  `representante` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `nro_documento` varchar(50) NOT NULL,
  `comision_total` decimal(10,2) NOT NULL,
  `anio` varchar(20) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `semana_inicio` date NOT NULL,
  `semana_fin` date NOT NULL,
  `semana_detalle` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabecera_comisiones_venta`
--

INSERT INTO `cabecera_comisiones_venta` (`id_cabacera_comisiones_venta`, `representante`, `correo`, `id_tipo_documento`, `nro_documento`, `comision_total`, `anio`, `mes`, `semana_inicio`, `semana_fin`, `semana_detalle`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Ruben', 'neburtnt@gmail.com', 2, '75614167', '500.00', '2022', '08', '2022-10-02', '2022-10-15', 'Semana 1', 1, '2022-10-02 21:28:28', '2022-10-02 21:27:35', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_registro_venta`
--

CREATE TABLE `cabecera_registro_venta` (
  `id_cabecera_registro_venta` int(11) NOT NULL,
  `nro_solicitud` varchar(50) DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `nro_documento` varchar(50) NOT NULL,
  `tipo_cliente` varchar(30) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_departamento` varchar(12) NOT NULL,
  `id_provincia` varchar(12) NOT NULL,
  `id_distrito` varchar(12) NOT NULL,
  `direccion` text DEFAULT NULL,
  `referencia` text DEFAULT NULL,
  `enlace_ubigeo` varchar(200) NOT NULL,
  `id_estado_registro_venta` int(11) NOT NULL,
  `total_descuento` decimal(10,2) NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `costo_envio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacion` text DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabecera_registro_venta`
--

INSERT INTO `cabecera_registro_venta` (`id_cabecera_registro_venta`, `nro_solicitud`, `fecha_pedido`, `fecha_entrega`, `correo`, `nro_documento`, `tipo_cliente`, `id_pais`, `id_departamento`, `id_provincia`, `id_distrito`, `direccion`, `referencia`, `enlace_ubigeo`, `id_estado_registro_venta`, `total_descuento`, `impuesto`, `costo_envio`, `total`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'sdasdaa', '2022-10-20 00:00:00', '2022-10-22 00:00:00', 'jhon0003.alexander@gmail.com', '75656443', 'Frecuente', 1, '15', '1501', '150101', 'Mz 32 Lt 29', 'Frente al colegio Maria Reiche', 'https://github.com/', 2, '50.00', '12.00', '12.00', '600.00', 'Estado Pendiente', 1, '2022-08-11 22:40:02', '2022-10-05 03:49:49', 1, 1),
(4, '191022_0159_33', '2022-10-19 00:00:00', '2022-10-19 00:00:00', 'se@gmail.com', '77378490', 'Representante', 1, '01', '0101', '010101', 'Av Huayna Capac', 'hospital', 'mapa', 1, '20.00', '29.00', '30.00', '87.00', '', 1, '2022-10-18 18:18:59', '2022-10-18 18:18:59', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidopaterno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidomaterno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `nro_documento` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_genero` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL DEFAULT 18,
  `patrocinador` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `patrocinador_directo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_rep_usu_registro` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_dep` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_pro` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_dis` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `relacion_candidato_reclutador` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `motiva_negocio` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `experiencia_comercial` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `cartera_cliente_entorno` char(4) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `disponibilidad_gestion_negocio` char(4) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `horario_gestion_negocio` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `nombre`, `apellidopaterno`, `apellidomaterno`, `id_tipo_documento`, `nro_documento`, `telefono`, `correo`, `clave`, `id_genero`, `fecha_nacimiento`, `edad`, `patrocinador`, `patrocinador_directo`, `id_rep_usu_registro`, `id_dep`, `id_pro`, `id_dis`, `relacion_candidato_reclutador`, `motiva_negocio`, `experiencia_comercial`, `cartera_cliente_entorno`, `disponibilidad_gestion_negocio`, `horario_gestion_negocio`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(36, 'Virna Ylya', 'La Torre', 'Orderique', 0, '16649989', '978436248', 'vilto67@hotmail.com', '$2y$10$baDgW8pzo6F6skEg4PqqYu71FooQs198nyfwzvRmiHEfRaYgP5FqW', 0, '1967-03-16', 54, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER GIULIANA FERNANDEZ AGREDA', 2, '2021-10-01 16:35:39', '2021-10-01 16:35:39', 14, 14),
(38, 'Armida Eloisa', 'Castro', 'Salgado', 0, '27745266', '942396545', 'armicastro@hotmail.com', '$2y$10$DKzUemtdHy6UXH3DcbVd9eRxuNEQe8Zh.WIyJ7Hros0L515YlgB/.', 0, '1964-10-29', 56, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 2, '2021-10-01 18:02:16', '2021-10-01 18:02:16', 14, 14),
(40, 'Karin Ivon', 'Collazos', 'Haya', 0, '46832838', '928873121', 'collazoshayakarinivon@gmail.com', '$2y$10$Syw7p5cMn2.zpBKrX6W74.oX9u6ijuW.TrKEm/uwYoZSXkSA6tSz2', 0, '1990-01-01', 31, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 2, '2021-10-01 18:06:18', '2021-10-01 18:06:18', 14, 14),
(41, 'Silvia Lidia', 'Alvarez', 'Serquen', 0, '16674234', '950176550', 'silviaas20@hotmail.com', '$2y$10$1z0kz266jKYdkVOxQmOFsO6brDXXxAh7ufxuOqfEmujyGX020K1/.', 0, '1969-05-20', 52, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 2, '2021-10-01 18:08:46', '2021-10-01 18:08:46', 14, 14),
(42, 'Julia Francisca', 'Lavandera', 'Villalva', 0, '32867400', '997371510', 'julia.lavandera.vi11@gmail.com', '$2y$10$GaquNsqIKWG/.9xwA20vfu5.MaDqd0sIa6tj6WfxB37w7yPkMPdJy', 0, '1967-06-11', 54, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR MARILYN BELTRAN', 0, '2021-10-01 18:39:58', '2021-10-01 18:39:58', 14, 14),
(43, 'Leidy Vanessa', 'Becerra', 'Cansio', 0, '45242097', '949484337', 'leidy_vanessa_22@hotmail.com', '$2y$10$KBLPb1Nam1E5Whris69uFuSOWHgnT2YErVkTgn0X25You4wb5sFGq', 0, '1987-12-30', 33, '10087171294', '10442325478', '10442325478', '', '', '', '', '', '', '', '', '', '', 1, '2021-10-02 12:05:13', '2021-10-02 12:05:13', 1, 1),
(44, 'Raquel', 'Pucse', 'Lozano', 0, '16728876', '928433549', 'raquelpucse@gmail.com', '$2y$10$qM1pNzzPHSJEH2M6eDpS6uc4wy8cH2cjZzLY2NvbSG2ATTGeo63v.', 0, '1974-09-28', 47, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 2, '2021-10-02 13:33:38', '2021-10-02 13:33:38', 14, 14),
(39, 'Carol Regina', 'Alvarado', 'Reyes', 0, '41417633', '980094690', 'carol.alvaradoreyes@gmail.com', '$2y$10$zbTytqfc53B6WtEbHxNHOOrSauhn73KMx0irSbp34q3BfVXtCS2Z6', 0, '1982-08-13', 39, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER GIULIANA FERNANDEZ AGREDA', 3, '2022-01-04 12:13:59', '2021-10-01 18:04:23', 14, 14),
(45, 'Rosario Del Pilar', 'Britto', 'Oblitas', 0, '06138173', '932721115', 'rosariobritto65@gmail.com', '$2y$10$mcdl4/eJlT7aBVrlDykknOKopQkeBXfW/opeLA90jf2ljoj.rb.Yq', 0, '1965-08-06', 56, '20602663320', '20602663320', '20602663320', '', '', '', '', '', '', '', '', '', '', 2, '2021-10-02 18:06:56', '2021-10-02 18:06:56', 1, 1),
(50, 'Clara Ines', 'Montealegre', 'Cuellar', 1, '02561051', '998046291', 'cimc.corporativo@gmail.com', '$2y$10$XvW6PNR3d0teEp.tvV3Vm.5X4d4Pq6alRW/zusi2iNqqUJx.Y/dS.', 1, '1969-10-05', 52, '1', '1', '14', '01', '0101', '010105', 'Amical', 'desea ganar mas dinero', 'Venta de seguros', 'Si', 'Si', 'N', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 1, '2022-09-17 16:01:06', '2021-10-04 11:39:14', 14, 14),
(49, 'Luis Cecilio', 'Salazar', 'Lopez', 0, '16729907', '975421716', 'luchinsl75@hotmail.com', '$2y$10$u6JovwIErNe0fQVBp8x0sOkRsIcXIhw5TcuyKvWvSLLlJH/g..Hn.', 0, '1990-04-02', 31, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR KARIN IVON COLLAZOS(RED LIDIA TORRES)', 1, '2021-10-04 11:35:50', '2021-10-04 11:35:50', 14, 14),
(48, 'Patricia Elizabeth', 'Rodriguez', 'Sifuentes', 0, '16748060', '976500228', 'pattyrodriguezs71@gmail.com', '$2y$10$7SW7tU6OryNoogW5Re.SHuqNpFlQEkbHBxWoW2JqKrNDHt1QWgk1W', 0, '1971-06-09', 50, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDA POR ARMIDA CASTRO SALGADO(RED LIDIA TORRES)', 0, '2021-10-04 11:26:05', '2021-10-04 11:26:05', 14, 14),
(47, 'Paul', 'Alva', 'Nakamine', 0, '09838115', '946198775', 'alvap7542@gmail.com', '$2y$10$LBMXvkdqT/XkOmPAu3hseOl.8Wgmvar1qLPvfO0QeHvm.bIkxwOVq', 0, '1972-03-22', 49, '10415130371', '10066659343', '10066659343', '', '', '', '', '', '', '', '', '', '', 0, '2021-10-03 12:12:17', '2021-10-03 12:12:17', 1, 1),
(46, 'Luz Ximena', 'Cardenas', 'Beramendi', 0, '41099265', '964635921', 'lxcb2004@hotmail.com', '$2y$10$Oh6XPKdCfzH5TDaJAasr6.HwVLB6D2X0tuz9Hyu7RjDcrn3au2tYi', 0, '1981-11-09', 39, '20602663320', '20602663320', '20602663320', '', '', '', '', '', '', '', '', '', '', 0, '2021-10-02 18:32:33', '2021-10-02 18:32:33', 1, 1),
(35, 'Liliana Del Rosario', 'Guevara', 'Cabrera', 0, '16730042', '916609589', 'charogc15@hotmail.com', '$2y$10$mc1xQ6fQa9xzhnv7kDdG0egD.A0O8rMGBDHx6LhzYcjdw96odQ2L.', 0, '1975-05-15', 46, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE REFERIDO POR LIDER LIDIA TORRES', 2, '2021-10-01 13:46:24', '2021-10-01 13:46:24', 14, 14),
(34, 'Jhony Antonio', 'Morales', 'Aguinaga', 0, '10477561', '986227176', 'chicolaice@hotmail.com', '$2y$10$NR0XCg38cR5itiaISai8WeOlVV0b6y1vrcSq1f7GMJvP3uYqT34Cy', 0, '1967-05-02', 54, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', 'REPRESENTANTE VA PARA LA LIDER GIULIANA fFERNANDEZ', 0, '2021-10-01 16:38:39', '2021-10-01 13:21:27', 14, 14),
(33, 'Jose Manuel', 'Barranca', 'Arevalo', 0, '44722258', '945912396', 'josembarrancaa@gmail.com', '$2y$10$IHymoXa8Fx3OxYip7zRJ.uSNcCUtqXBRxsuToep4tw1OTxyq6uuem', 0, '1980-07-14', 41, '10087171294', '10419553056', '10419553056', '', '', '', '', '', '', '', '', '', '', 1, '2021-09-30 21:06:44', '2021-09-30 21:06:44', 1, 1),
(32, 'Edith Ofelia', 'Canchumanya', 'Vilchez', 0, '19926885', '939396776', 'ggaby_55@hotmail.com', '$2y$10$TEoweCtEYMnfdkdW4bBf..WaQCDOA6UGxxhlHRQNvwgy3t.Iy9FJm', 0, '1965-12-28', 55, '10440585448', '10440585448', '14', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-30 17:13:29', '2021-09-30 17:13:29', 14, 14),
(31, 'Yael Estrella', 'Salazar', 'Yauyos', 0, '72618492', '931903865', 'salazaryauyose@gmail.com', '$2y$10$3kPZQo9Xb2o367ILcpdEXOZ09CT2Fm61Ckz3sn7FVCtPRWpvaFena', 0, '1992-09-02', 29, '10415130371', '10430988358', '10430988358', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-29 22:32:25', '2021-09-29 22:32:25', 1, 1),
(30, 'Ana', 'Zubiaur', 'Alvarez', 0, '47090674', '921895254', 'anazubiaur.2102@gmail.com', '$2y$10$45rCubKQdIwWQxBBULGVzuRiYmAcutiHYzsrWg9gwc9beqgVHHx2S', 0, '1992-02-21', 29, '10097594959', '10714145610', '10714145610', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-28 23:48:59', '2021-09-28 23:48:59', 1, 1),
(29, 'Julio Juan', 'Canepa', 'Chavez', 0, '40399716', '924088302', 'julio.canepa79@gmail.com', '$2y$10$b3bywhzZ/4lHzgs9MPn53.WT0Kvzt4dcMpLvfStjjDG01cKBnT6cu', 0, '1979-06-18', 42, '10097594959', '10415863956', '10415863956', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-28 21:15:26', '2021-09-28 21:15:26', 1, 1),
(28, 'Sandra Isabel', 'De La Cruz', 'Andrade', 0, '72664030', '914906866', 'sandrita_delaandrade1@hotmail.com', '$2y$10$HGqlGzBymvq1OHRLqJtK6OjhpGZyPwqIB/ePP5g0vRfMU/UUmJabK', 0, '1994-11-12', 26, '10415130371', '10430988358', '10430988358', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-28 19:34:35', '2021-09-28 19:34:35', 1, 1),
(27, 'Miluska Alexis', 'Estrella', 'Centeno', 0, '46770572', '920376153', 'ale_sk8_3@hotmail.com', '$2y$10$3k3Pkg6ga5JCBa8vPW0Mbuz5uQkGI4BXUusk7AbdCG2.v24osZjuG', 0, '1990-07-03', 31, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', '', 1, '2021-09-28 19:28:41', '2021-09-28 19:28:41', 14, 14),
(26, 'Shanny Maria Esther', 'Zambrano', 'Mora', 0, '72789272', '927688013', 'sha_m_e_013@hotmail.com', '$2y$10$JMqeDRKKn1zJFdvlUB0BQeEgVxMili3K7lz3PoZs.aunUZ/gpMGN2', 0, '1993-09-27', 28, '10415130371', '10106156850', '10415130371', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-28 15:48:35', '2021-09-28 15:48:35', 1, 1),
(25, 'Francesca Yeridel', 'Candiotty', 'Oliva', 0, '72930670', '935635571', 'francescacandiotty@gmail.com', '$2y$10$o306GxLcmIDCDrs6c3/7ceuTMamwOO.dg0fJHURs1frV275MeZtby', 0, '1995-09-22', 26, '10415130371', '10106156850', '10415130371', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-28 12:32:52', '2021-09-28 12:32:52', 1, 1),
(24, 'Lina', 'Pacheco', 'Bustamante', 0, '07432782', '945342117', 'lina13459@gmail.com', '$2y$10$SdAPODQd8HDO2W12lREqtO7SSsDcC3kNE3EdDCyXYRQgLfDOVkVX2', 0, '1959-04-13', 62, '20602663320', '10075056821', '10075056821', '', '', '', '', '', '', '', '', '', '', 3, '2022-02-10 11:35:08', '2021-09-28 12:15:38', 1, 1),
(23, 'Doris Margot', 'Ampuero', 'Ruiz', 0, '08673405', '987569814', 'dorisampuero83@hotmail.com', '$2y$10$v7zq5wPj1jqGvKb.3oYrVeNfTcnbvb1/ixjX6Z88r3KllsjdB95ZG', 0, '1968-03-18', 53, '20602663320', '10075056821', '10075056821', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-28 12:10:08', '2021-09-28 12:10:08', 1, 1),
(22, 'Sandra Fiorella', 'Sueros', 'Rodriguez', 0, '74124567', '953022824', 'sandrasueros05@gmail.com', '$2y$10$0Tb5SjZfYy23GZu7JjQbf.W37mOZYyfCWhiuYrvzKaFzxAg0jLB76', 0, '1993-05-07', 28, '10097594959', '10296067097', '10296067097', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-28 00:02:34', '2021-09-28 00:02:34', 1, 1),
(21, 'Saul', 'Lizarzaburo', 'Rebatta', 0, '43499776', '943170568', 'slizarzaburor@gmail.com', '$2y$10$6S8z5Hg5snsh680jSze09.XWTHIuocB0HQfnQL2DN7scOt1l4hOGC', 0, '1969-12-31', 51, '10415130371', '10430988358', '10430988358', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-27 20:24:34', '2021-09-27 20:24:34', 1, 1),
(20, 'Tania', 'Serra', 'Reyna', 0, '06667532', '954187480', 'taserra@hotmail.com', '$2y$10$P98Fky6MDFu96jQuhaNITObny7Cq/PbKn0nv/vYDgmn5xVsiSbWgS', 0, '1971-09-22', 50, '10097594959', '10772785378', '10097594959', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-27 19:24:12', '2021-09-27 19:24:12', 1, 1),
(19, 'Patricia', 'Sotil', 'Pradinet', 0, '07494082', '987753695', 'patty.sotil@gmail.com', '$2y$10$exVzQu/eDLzir9xcin7I1.uwgeKH28.upqPoXyf3mn0Q9tOsrYRpW', 0, '1973-12-11', 47, '10428115771', '10421265599', '10421265599', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-27 12:39:14', '2021-09-27 12:39:14', 1, 1),
(18, 'Cristina Virginia', 'Varoni', 'Vargas', 0, '00000000', '973832494', 'cvvaroni@gmail.com', '$2y$10$Vh.J6xbZ0mA9Id5svtTYTOTc6V0wSLqJg6zJw3aizgkFnQZloyh4C', 0, '1984-08-01', 37, '10087171294', '10461980541', '10461980541', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-26 21:08:38', '2021-09-26 21:08:38', 1, 1),
(17, 'Karla', 'Godoy', 'Airaldi', 0, '40170844', '983412759', 'karlaairaldi@hotmail.com', '$2y$10$h.pwGcThzK2pqdKH8I4Fm.bWEjfVP38.8IZZzsoB.1Cte7LPuZEta', 0, '1979-01-03', 42, '10097594959', '10258087220', '10258087220', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-25 16:01:55', '2021-09-25 15:55:26', 1, 1),
(16, 'Elba Elena', 'Díaz', 'Chavez', 0, '43491732', '915247747', 'elenadch14@gmail.com', '$2y$10$GbpM.xNtzZjdiv2r057yYOYRgAOQ79QbmBz7na53v6k1V7Q9fCAG6', 0, '1981-06-14', 40, '10087171294', '10419553056', '10419553056', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-24 18:40:41', '2021-09-24 18:40:41', 1, 1),
(15, 'Ana Cecilia', 'Rodriguez', 'De La Torre Bueno', 0, '40132621', '998450837', 'acrodriguez10@hotmail.com', '$2y$10$ghcQ4IZPKLWu8V3txZ0lWOlAej5PvBdkmtYD1IlxVXM.p/Q1GM5Oy', 0, '1979-03-10', 42, '10097594959', '10105869679', '10105869679', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-24 18:12:21', '2021-09-24 18:12:21', 1, 1),
(14, 'Pedro Manuel', 'Gil', 'Espinoza', 0, '46414964', '977978412', 'pgil01239@gmail.com', '$2y$10$RJsCBYjOnEu3Sq7OT7sN/u6Rl4HTe209WrmL9gsCmEoscg6EYbeK6', 0, '1990-06-10', 31, '10087171294', '10479421698', '10479421698', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-24 16:04:27', '2021-09-24 16:04:27', 1, 1),
(12, 'Cristina Virginia', 'Varoni', 'Vargas', 0, '44283187', '973832494', 'cvvaroniv@gmail.com', '$2y$10$UDx/AfzocIz4zASYHvqiZumNVpxsHLk5KzFOEXS41q1YNRIN8DZ22', 0, '1990-01-01', 31, '10087171294', '10479421698', '10479421698', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-23 20:56:18', '2021-09-23 20:56:18', 1, 1),
(9, 'Rolando Alfonso', 'Ruiz', 'Rivera', 0, '07504666', '9410007888', 'alfonsor32@hotmail.com', '$2y$10$vUt52hkWyyBbtbO0kKZwJ.VAleSz.HJPc3IIlxjXIt35xPMKOEh1e', 0, '1975-09-09', 46, '10097594959', '10006828316', '10006828316', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-23 14:09:36', '2021-09-23 14:09:36', 1, 1),
(10, 'Geovana Felipa', 'Aliaga', 'Orihuela', 0, '20062048', '987526534', 'marijomeli@hotmail.com', '$2y$10$VQ4MH/4c7gfLRUP8yY/GpO9vYvWEXW.xPFMJM5YIYXaZifmjhvlya', 0, '1974-03-03', 47, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-23 17:50:22', '2021-09-23 17:50:22', 14, 14),
(11, 'Luisa', 'Luna', 'Aroni', 0, '19918358', '964174610', 'luisa.luna3103@outlook.es', '$2y$10$.R1AHmxuM1iK35PC9yfrUexraMdwIlevPaV6bzilXADtOJ4H4s2Hu', 0, '1956-03-31', 65, 'Lider de Red', 'Lider de Red', '14', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-23 17:53:12', '2021-09-23 17:53:12', 14, 14),
(6, 'Yanet Marisol', 'Seput', 'Rojas', 0, '09529157', '999884329', 'yanetseput25@gmail.com', '$2y$10$66cbIMDV49FN6zLsKc8sIeSPwuk0SjOqN3VsG/rVLrwRqJYcY.qiK', 0, '1969-09-25', 51, '10097594959', '10006828316', '10006828316', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-23 14:05:44', '2021-09-23 14:05:44', 1, 1),
(5, 'Jose Luis', 'Rodriguez', 'Sosa', 0, '00512704', '997701231', 'fc98466446@gmail.com', '$2y$10$jDSVrVGGbiBFpQ/4bMgRi.RKHjtHIx50oqrdWzy90koflHvTJV2D6', 0, '1974-04-29', 47, '10097594959', '10006828316', '10006828316', '', '', '', '', '', '', '', '', '', '', 0, '2021-09-23 14:03:23', '2021-09-23 14:03:23', 1, 1),
(2, 'Mayra', 'Guzman', 'Larroca', 0, '42938605', '989963857', 'mayragl24@hotmail.com', '$2y$10$X0fn/5dS.pzy5F17deWD5OhYHn6DDvZVKN1oJhJ/WCmAN2ue2Lsq2', 0, '1990-02-09', 31, '10087171294', '10087171294', '10087171294', '', '', '', '', '', '', '', '', '', '', 2, '2021-09-22 21:37:41', '2021-09-22 21:37:41', 1, 1),
(4, 'Miguel Angel', 'Cortez', 'Grande', 0, '07766743', '981682964', 'miguel.cortez@brefat.com', '$2y$10$T9hg8VmodEvxpnHAsCoeJOSQjxqtVAde7TlwLFNUKb0vFgn.nzu.C', 0, '1976-10-11', 44, '20602663320', '20600537301', '20600537301', '', '', '', '', '', '', '', '', '', '', 1, '2021-09-23 15:57:08', '2021-09-23 11:00:18', 1, 1),
(1162, 'Alex', 'Ledezma', 'Sanchez', 1, '12245869', '71400026', 'ledezma@gamil.com', '$2y$10$bzauJ0JNaRjoH.kjDK7EvutjOGhlK6G9Dr9GKf4olYK6P1yjkJg22', 1, '1990-01-10', 32, '1', '1', '1', '02', '0202', '020202', 'Familiar', 'El dinero', 'Venta de seguros', 'No', 'No', '', 'ninguna', 1, '2022-10-03 16:44:10', '2022-09-16 01:37:48', 1, 1),
(1163, 'Alexander', 'Ledezma', 'Sanchez', 2, '45524554', '7140026', 'sanche@gmail.com', '$2y$10$Rz.xmt1u/4lKN1bGnf/kj.uxl.TOJ5ZtCbtpHrXzNLYLjzsl4l.CK', 1, '1990-01-06', 32, '1', '1', '1', '02', '0204', '020401', 'Amical', 'dienro', 'Venta de seguros', 'No', 'Si', 'N', 'dasdas', 1, '2022-10-03 17:43:00', '2022-10-03 16:19:28', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL,
  `categoria` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria_producto`, `categoria`, `descripcion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Tecnologia', 'Equipos electronicos', 1, '2022-09-16 19:13:25', '2022-09-16 19:13:25', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_equipo`
--

CREATE TABLE `condicion_equipo` (
  `id_condicion_equipo` int(11) NOT NULL,
  `condicion_equipo` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicion_equipo`
--

INSERT INTO `condicion_equipo` (`id_condicion_equipo`, `condicion_equipo`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Nuevo', 1, '2022-08-15 00:43:13', '2022-08-26 20:28:48', 1, 1),
(2, 'Deteriorado', 1, '2022-08-26 20:28:56', '2022-08-26 20:28:56', 1, 1),
(3, 'Semi nuevo', 1, '2022-08-26 20:29:16', '2022-08-26 20:29:16', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo_envio`
--

CREATE TABLE `costo_envio` (
  `id_costo_envio` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_departamento` varchar(12) NOT NULL,
  `id_provincia` varchar(12) NOT NULL,
  `id_distrito` varchar(12) NOT NULL,
  `monto` double(10,2) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `costo_envio`
--

INSERT INTO `costo_envio` (`id_costo_envio`, `id_pais`, `id_departamento`, `id_provincia`, `id_distrito`, `monto`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(2, 2, '05', '0510', '051011', 1202221.00, 'ninguna', 1, '2022-08-11 22:40:02', '2022-10-01 22:52:56', 1, 1),
(3, 1, '02', '0202', '020201', 22.00, '123312', 1, '2022-10-01 22:02:16', '2022-10-01 22:49:07', 1, 1),
(4, 2, '02', '0203', '020303', 33.00, '21321', 1, '2022-10-01 22:04:41', '2022-10-01 22:49:50', 1, 1),
(5, 3, '03', '0304', '030401', 1123.00, '', 1, '2022-10-01 22:04:53', '2022-10-01 22:49:42', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento_producto`
--

CREATE TABLE `descuento_producto` (
  `id_descuento_producto` int(11) NOT NULL,
  `id_tipo_descuento` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descuento_producto`
--

INSERT INTO `descuento_producto` (`id_descuento_producto`, `id_tipo_descuento`, `monto`, `fecha_inicio`, `fecha_fin`, `id_producto`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, '50.00', '2022-10-18', '2022-10-19', 1, '', 1, '2022-10-18 19:17:54', '2022-10-18 19:17:54', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_comisiones_venta`
--

CREATE TABLE `detalle_comisiones_venta` (
  `id_detalle_comisiones_venta` int(11) NOT NULL,
  `id_cabacera_comisiones_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comision` decimal(10,2) NOT NULL,
  `comision_subtotal` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_comisiones_venta`
--

INSERT INTO `detalle_comisiones_venta` (`id_detalle_comisiones_venta`, `id_cabacera_comisiones_venta`, `id_producto`, `cantidad`, `comision`, `comision_subtotal`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 0, 0, '0.00', '0.00', 1, '2022-10-18 18:33:45', '2022-10-03 00:50:12', 1, 1),
(10, 1, 1, 30, '209.00', '34.00', 1, '2022-10-18 18:33:40', '2022-10-18 18:33:40', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_registro_venta`
--

CREATE TABLE `detalle_registro_venta` (
  `id_detalle_registro_venta` int(11) NOT NULL,
  `nro_solicitud` varchar(50) DEFAULT NULL,
  `id_tipo_venta` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `id_descuento_producto` int(11) NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_registro_venta`
--

INSERT INTO `detalle_registro_venta` (`id_detalle_registro_venta`, `nro_solicitud`, `id_tipo_venta`, `id_paquete`, `id_producto`, `cantidad`, `precio_unitario`, `id_descuento_producto`, `sub_total`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, '051022_0616_53', 2, 0, 0, 2, '2.00', 0, '2.00', '1111111111111', 1, '2022-10-04 23:27:16', '2022-10-04 23:39:46', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisa`
--

CREATE TABLE `divisa` (
  `id_divisa` int(11) NOT NULL,
  `divisa` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `expresion` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) DEFAULT NULL,
  `id_usuarioactualiza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `divisa`
--

INSERT INTO `divisa` (`id_divisa`, `divisa`, `expresion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Dolares', 'USD', 1, '2022-10-04 12:58:33', '2022-10-04 16:19:23', 1, 2),
(2, 'Pesos', 'PON', 1, '2022-10-04 13:17:01', '2022-10-04 16:19:42', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_bancaria`
--

CREATE TABLE `entidad_bancaria` (
  `id_entidad_bancaria` int(11) NOT NULL,
  `entidad_bancaria` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entidad_bancaria`
--

INSERT INTO `entidad_bancaria` (`id_entidad_bancaria`, `entidad_bancaria`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Banco BBVA', 1, '2022-09-30 16:56:21', '2022-10-17 15:32:54', 1, 1),
(2, 'BCP', 1, '2022-10-17 15:32:59', '2022-10-17 15:32:59', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_candidato`
--

CREATE TABLE `estado_candidato` (
  `id_estado_candidato` int(11) NOT NULL,
  `estado_candidato` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_candidato`
--

INSERT INTO `estado_candidato` (`id_estado_candidato`, `estado_candidato`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Registrado', 1, '2022-09-17 14:56:58', '2022-09-17 14:56:58', 1, 1),
(2, 'En charla', 1, '2022-09-17 14:57:32', '2022-09-17 14:57:32', 1, 1),
(3, 'En capacitación', 1, '2022-09-17 14:57:50', '2022-09-17 14:57:50', 1, 1),
(4, 'Desistió', 1, '2022-09-17 15:00:30', '2022-09-17 15:00:30', 1, 1),
(5, 'Activo', 1, '2022-09-17 15:00:39', '2022-09-17 15:00:39', 1, 1),
(6, 'Baja', 1, '2022-09-17 15:00:45', '2022-09-17 15:00:45', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_charla_candidato`
--

CREATE TABLE `estado_charla_candidato` (
  `id_estado_charla_candidato` int(11) NOT NULL,
  `estado_charla_candidato` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_charla_candidato`
--

INSERT INTO `estado_charla_candidato` (`id_estado_charla_candidato`, `estado_charla_candidato`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Pendiente', 1, '2022-09-17 15:50:56', '2022-09-17 15:50:56', 1, 1),
(2, 'Programado', 1, '2022-09-17 15:51:05', '2022-09-17 15:51:05', 1, 1),
(3, 'Reprogramado', 1, '2022-09-17 15:51:12', '2022-09-17 15:51:12', 1, 1),
(4, 'Asistió', 1, '2022-09-17 15:55:15', '2022-09-17 15:55:15', 1, 1),
(5, 'Inasistencia', 1, '2022-09-17 15:55:23', '2022-09-17 15:55:23', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado_civil`, `estado_civil`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Soltero', 1, '2022-08-07 00:59:49', '2022-09-08 13:16:16', 1, 2),
(2, 'Casado', 1, '2022-08-07 00:59:49', '2022-09-08 13:16:22', 1, 2),
(3, 'Viudo', 1, '2022-08-20 16:33:10', '2022-09-08 13:16:31', 1, 2),
(4, 'Divorciado', 1, '2022-09-08 13:16:45', '2022-09-08 13:16:45', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_conexion`
--

CREATE TABLE `estado_conexion` (
  `id_estado_conexion` int(11) NOT NULL,
  `estado_conexion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_conexion`
--

INSERT INTO `estado_conexion` (`id_estado_conexion`, `estado_conexion`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'conexion', 'cone', 1, '2022-06-04 17:41:07', '2022-06-04 17:40:58', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_contrato`
--

CREATE TABLE `estado_contrato` (
  `id_estado_contrato` int(11) NOT NULL,
  `estado_contrato` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_contrato`
--

INSERT INTO `estado_contrato` (`id_estado_contrato`, `estado_contrato`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Activo', 1, '2022-10-17 15:35:32', '2022-10-17 15:35:32', 1, 1),
(2, 'Por firmar', 1, '2022-10-17 15:35:51', '2022-10-17 15:35:51', 1, 1),
(3, 'Culminado', 1, '2022-10-17 21:22:29', '2022-10-17 21:22:29', 1, 1),
(4, 'Firmado', 1, '2022-10-17 21:26:47', '2022-10-17 21:26:47', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_programacion_charla`
--

CREATE TABLE `estado_programacion_charla` (
  `id_estado_programacion_charla` int(11) NOT NULL,
  `estado_programacion_charla` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_programacion_charla`
--

INSERT INTO `estado_programacion_charla` (`id_estado_programacion_charla`, `estado_programacion_charla`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Pendiente', 1, '2022-09-17 19:38:05', '2022-09-17 19:38:05', 1, 1),
(2, 'En proceso', 1, '2022-09-17 19:38:21', '2022-09-17 19:38:21', 1, 1),
(3, 'Cancelado', 1, '2022-09-17 19:38:30', '2022-09-17 19:38:30', 1, 1),
(4, 'Culminado', 1, '2022-09-17 19:39:25', '2022-09-17 19:39:25', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_registro_venta`
--

CREATE TABLE `estado_registro_venta` (
  `id_estado_registro_venta` int(11) NOT NULL,
  `estado_registro_venta` varchar(50) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_registro_venta`
--

INSERT INTO `estado_registro_venta` (`id_estado_registro_venta`, `estado_registro_venta`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Enviado', '', 1, '2022-08-11 22:40:02', '2022-10-01 17:18:57', 1, 1),
(2, 'Pendiente', '', 0, '2022-10-01 12:35:26', '2022-10-01 21:02:02', 1, 1),
(3, 'Pagado', '', 1, '2022-10-01 12:35:36', '2022-10-01 12:35:36', 1, 1),
(4, 'Rechazado', '', 1, '2022-10-01 12:35:44', '2022-10-01 14:51:52', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiado`
--

CREATE TABLE `financiado` (
  `id_financiado` int(11) NOT NULL,
  `financiado` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id_forma_pago` int(11) NOT NULL,
  `forma_pago` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id_forma_pago`, `forma_pago`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'dinero', 'dinero', 1, '2022-06-02 20:23:47', '2022-06-02 20:23:47', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencia`
--

CREATE TABLE `frecuencia` (
  `id_frecuencia` int(11) NOT NULL,
  `frecuencia` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `frecuencia`
--

INSERT INTO `frecuencia` (`id_frecuencia`, `frecuencia`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Anual', 'frecuencia', 1, '2022-08-17 14:17:59', '2022-06-04 17:41:19', 1, 1),
(2, 'Mensual', '', 1, '2022-09-23 16:37:18', '2022-09-23 16:37:18', 1, 1),
(3, 'Trimestral', '', 1, '2022-09-23 16:37:35', '2022-09-23 16:37:35', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Hombre', 1, '2022-08-06 23:41:22', '2022-08-06 23:41:22', 1, 1),
(2, 'Mujer', 1, '2022-08-20 16:32:10', '2022-08-20 16:32:10', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta_tecnologica`
--

CREATE TABLE `herramienta_tecnologica` (
  `id_herramienta_tecnologica` int(11) NOT NULL,
  `id_tipo_equipo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_marca_equipo` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `nro_serial` varchar(50) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_garantia` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_condicion_equipo` int(11) NOT NULL,
  `valor_actual` decimal(10,2) NOT NULL,
  `status_asignacion` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramienta_tecnologica`
--

INSERT INTO `herramienta_tecnologica` (`id_herramienta_tecnologica`, `id_tipo_equipo`, `descripcion`, `id_marca_equipo`, `modelo`, `nro_serial`, `fecha_compra`, `fecha_garantia`, `precio`, `id_condicion_equipo`, `valor_actual`, `status_asignacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 'Gamer I7 de decima generacuon', 2, 'M-LITO-078', '12TR564TU', '2022-06-23', '2022-08-26', '3500.00', 1, '3500.00', 0, 1, '2022-08-15 00:47:50', '2022-08-26 20:32:17', 1, 1),
(2, 2, 'de ultima gama', 1, 'plus', '123rtr4', '2022-09-01', '2030-09-10', '2000.00', 1, '2000.00', 1, 1, '2022-09-01 15:38:36', '2022-09-01 16:21:40', 1, 1),
(3, 1, 'CORE I3 8ta generacion', 1, '1242324', '3242342', '2022-09-08', '2024-09-05', '3500.00', 1, '3500.00', 0, 1, '2022-09-08 13:44:04', '2022-09-08 13:44:04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_producto`
--

CREATE TABLE `imagen_producto` (
  `id_imagen_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `url_imagen` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tamanio_imagen` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `imagen_producto`
--

INSERT INTO `imagen_producto` (`id_imagen_producto`, `id_producto`, `url_imagen`, `tamanio_imagen`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 'archivos/fotos_producto/181022063710_78/fp_181022_0610_43.png', 2350273, 1, '2022-10-17 23:37:10', '2022-10-17 23:37:10', 1, 1),
(2, 1, 'archivos/fotos_producto/181022064112_28/fp_181022_0612_70.png', 4910564, 1, '2022-10-17 23:41:12', '2022-10-17 23:41:12', 1, 1),
(3, 1, 'archivos/fotos_producto/181022070737_71/fp_181022_0737_74.png', 2835847, 1, '2022-10-18 00:07:37', '2022-10-18 00:07:37', 1, 1),
(4, 1, 'archivos/fotos_producto/181022070750_72/fp_181022_0750_91.jpeg', 321940, 1, '2022-10-18 00:07:50', '2022-10-18 00:07:50', 1, 1),
(5, 1, 'archivos/fotos_producto/191022034104_50/fp_191022_0304_43.jpeg', 360187, 1, '2022-10-18 20:41:04', '2022-10-18 20:41:04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id_licencia` int(11) NOT NULL,
  `licencia` varchar(50) NOT NULL,
  `id_tipo_licencia` int(11) NOT NULL,
  `codigo` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id_licencia`, `licencia`, `id_tipo_licencia`, `codigo`, `stock`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Licencia de Office', 1, 'ERGT-45GT-THYU-678S', 18, '', 1, '2022-08-08 16:50:48', '2022-08-26 20:26:48', 1, 1),
(2, 'office', 1, '15165555', 8, 'no lo se', 1, '2022-08-10 01:38:00', '2022-08-26 20:58:35', 1, 1),
(3, 'raton', 2, '5465156', 10, 'dasdas', 1, '2022-08-10 01:47:06', '2022-08-15 00:34:08', 1, 1),
(4, 'windows', 1, '156155665', 4, 'nose', 1, '2022-08-12 09:55:17', '2022-08-12 20:24:56', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_comercial`
--

CREATE TABLE `marca_comercial` (
  `id_marca_comercial` int(11) NOT NULL,
  `marca_comercial` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `marca_comercial`
--

INSERT INTO `marca_comercial` (`id_marca_comercial`, `marca_comercial`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Aunasalud', 'Aunasalud', 1, '2022-06-30 02:06:04', '2022-06-04 17:36:37', 1, 1),
(2, 'Diners', 'Diners', 1, '2022-06-30 02:06:19', '2022-06-15 19:18:04', 1, 1),
(3, 'Mapfre', 'Mapfre', 1, '2022-06-30 02:06:40', '2022-06-30 02:06:40', 1, 1),
(4, 'Oncosalud', 'Oncosalud', 1, '2022-06-30 02:06:55', '2022-06-30 02:06:55', 1, 1),
(5, 'Sunat', 'Sunat', 1, '2022-06-30 02:07:05', '2022-06-30 02:07:05', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_equipo`
--

CREATE TABLE `marca_equipo` (
  `id_marca_equipo` int(11) NOT NULL,
  `marca_equipo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca_equipo`
--

INSERT INTO `marca_equipo` (`id_marca_equipo`, `marca_equipo`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'HP', 1, '2022-08-15 00:41:58', '2022-08-15 00:41:58', 1, 1),
(2, 'Lenovo', 1, '2022-08-26 20:27:12', '2022-08-26 20:27:12', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `id_marca_producto` int(11) NOT NULL,
  `marca_producto` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id_marca_producto`, `marca_producto`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'HP', 1, '2022-09-17 14:33:48', '2022-09-17 14:33:19', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `id_medio_pago` int(11) NOT NULL,
  `medio_pago` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad_pago`
--

CREATE TABLE `modalidad_pago` (
  `id_modalidad_pago` int(11) NOT NULL,
  `modalidad_pago` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modalidad_pago`
--

INSERT INTO `modalidad_pago` (`id_modalidad_pago`, `modalidad_pago`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'tarjeta', 'tarjeta', 1, '2022-06-02 20:23:22', '2022-06-02 20:23:22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `modulo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1,
  `enlace` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `icono` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estilocolor` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) DEFAULT NULL,
  `id_usuarioactualiza` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `modulo`, `nivel`, `enlace`, `icono`, `estilocolor`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Inicio', 1, 'index.php', 'far fa-circle nav-icon', 'text-success', '', 1, '2022-09-28 00:54:02', NULL, NULL, 2),
(2, 'Sistema', 2, '', 'far fa-circle nav-icon', 'text-primary', 'Usuarios y roles', 1, '2022-09-28 00:37:22', '2022-07-31 16:13:35', 1, 2),
(3, 'Rep de ventas', 2, '', 'far fa-circle nav-icon', 'text-warning', 'herramienta de negocio', 1, '2022-09-28 16:58:42', '2022-08-01 20:46:21', 1, 2),
(4, 'Productos', 2, '', 'far fa-circle nav-icon', 'text-info', 'Gestion de herramientas', 1, '2022-09-28 00:47:28', '2022-08-01 20:46:21', 1, 2),
(5, 'Registros de venta', 2, '', 'far fa-circle nav-icon', 'text-success', '', 1, '2022-09-28 00:48:12', '2022-08-15 00:23:50', 1, 2),
(6, 'Comisiones', 2, '', 'far fa-circle nav-icon', 'text-danger', '', 1, '2022-09-28 00:48:31', '2022-08-16 19:27:38', 1, 2),
(11, 'Pagina Web', 2, '', 'far fa-circle nav-icon', 'text-info', '', 1, '2022-09-28 00:53:04', '2022-09-28 00:52:51', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pais`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Perú', 1, '2022-10-01 19:07:57', '2022-10-17 21:28:19', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_detalle_producto`
--

CREATE TABLE `paquete_detalle_producto` (
  `id_paquete_detalle_producto` int(11) NOT NULL,
  `id_paquete_cabecera_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta_unitario` decimal(10,2) NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `paquete_detalle_producto`
--

INSERT INTO `paquete_detalle_producto` (`id_paquete_detalle_producto`, `id_paquete_cabecera_producto`, `id_producto`, `cantidad`, `precio_venta_unitario`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 32, 20, '200.00', '', 1, '2022-10-05 22:37:17', '2022-10-05 22:36:59', 2, 2),
(2, 1, 33, 20, '400.00', '', 1, '2022-10-05 22:42:55', '2022-10-05 22:42:55', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_producto_cabecera`
--

CREATE TABLE `paquete_producto_cabecera` (
  `id_paquete_producto_cabecera` int(11) NOT NULL,
  `nombre_paquete` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `paquete_producto_cabecera`
--

INSERT INTO `paquete_producto_cabecera` (`id_paquete_producto_cabecera`, `nombre_paquete`, `precio_venta`, `cantidad_productos`, `descripcion`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Promocion inicio', '200.00', 200, 'promo inicio', '', 1, '2022-10-05 19:38:42', '2022-10-05 19:38:18', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `ver` int(1) DEFAULT NULL,
  `crear` int(1) DEFAULT NULL,
  `actualizar` int(1) DEFAULT NULL,
  `eliminar` int(1) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) DEFAULT NULL,
  `id_usuarioactualiza` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `id_rol`, `id_modulo`, `ver`, `crear`, `actualizar`, `eliminar`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '2022-07-31 16:13:35', '2022-08-16 21:14:49', 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, '2022-07-24 14:38:10', '2022-08-15 00:29:07', 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1, '2022-08-08 22:46:20', '2022-08-15 00:29:07', 1, 1),
(4, 3, 1, 1, 0, 0, 0, 1, '2022-08-08 22:47:00', '2022-08-08 22:47:00', 1, 1),
(5, 3, 3, 1, 0, 0, 0, 1, '2022-08-08 22:47:02', '2022-08-08 22:47:02', 1, 1),
(6, 2, 2, 0, 1, 1, 0, 1, '2022-08-08 22:48:09', '2022-08-08 22:48:10', 1, 1),
(7, 1, 4, 1, 1, 1, 1, 1, '2022-08-15 00:26:34', '2022-08-24 19:05:28', 1, 1),
(8, 1, 5, 1, 1, 1, 1, 1, '2022-08-16 19:49:11', '2022-08-16 19:49:14', 1, 1),
(9, 1, 6, 1, 1, 1, 1, 1, '2022-08-16 19:59:46', '2022-08-16 19:59:49', 1, 1),
(10, 1, 7, 1, 1, 1, 1, 1, '2022-08-16 21:16:28', '2022-08-16 21:16:30', 1, 1),
(11, 1, 8, 1, 1, 1, 1, 1, '2022-08-20 16:35:27', '2022-08-20 16:35:30', 1, 1),
(12, 1, 9, 1, 1, 1, 1, 1, '2022-09-08 17:15:34', '2022-09-08 17:15:42', 1, 1),
(13, 1, 10, 1, 1, 1, 1, 1, '2022-09-08 17:15:35', '2022-09-08 17:15:43', 1, 1),
(14, 5, 11, 1, 1, 1, 1, 1, '2022-10-18 20:50:04', '2022-10-18 20:50:07', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion_producto` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `stock_inicial` int(11) DEFAULT NULL,
  `stock_actual` int(11) DEFAULT NULL,
  `precio_venta_nuevo` decimal(11,2) DEFAULT NULL,
  `precio_venta_anterior` decimal(11,2) DEFAULT NULL,
  `precio_compra` decimal(11,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `ganancia` int(11) DEFAULT NULL,
  `peso` decimal(11,2) DEFAULT NULL,
  `codigo_barra` varchar(80) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_qr` varchar(80) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `puntos_x_venta` int(11) DEFAULT NULL,
  `comision_x_venta` int(11) DEFAULT NULL,
  `id_tipo_producto` int(11) DEFAULT NULL,
  `id_categoria_producto` int(11) DEFAULT NULL,
  `id_sub_categoria_producto` int(11) DEFAULT NULL,
  `id_marca_producto` int(11) DEFAULT NULL,
  `id_unidad_medida` int(11) DEFAULT NULL,
  `id_divisa` int(11) DEFAULT NULL,
  `observacion` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(2) DEFAULT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion_producto`, `stock_inicial`, `stock_actual`, `precio_venta_nuevo`, `precio_venta_anterior`, `precio_compra`, `descuento`, `ganancia`, `peso`, `codigo_barra`, `codigo_qr`, `puntos_x_venta`, `comision_x_venta`, `id_tipo_producto`, `id_categoria_producto`, `id_sub_categoria_producto`, `id_marca_producto`, `id_unidad_medida`, `id_divisa`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Bio Tree Life', 'Potente estimulante inmunológico a ataques virales en pacientes oncológicos, diabéticos y obesos', 5, 5, '60.00', '80.00', '60.00', 25, 0, '50.00', '123456', '123456', 2, 20, 1, 1, 1, 1, 2, 1, '', 1, '2022-10-17 23:36:28', '2022-10-17 23:37:14', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_compra`
--

CREATE TABLE `registro_compra` (
  `id_registro_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_divisa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_compra`
--

INSERT INTO `registro_compra` (`id_registro_compra`, `id_producto`, `id_divisa`, `cantidad`, `precio_unitario`, `sub_total`, `fecha_ingreso`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 1, 1, 10, '30.00', '300', '2022-10-18', 'nuevo', 1, '2022-10-18 11:01:16', '2022-10-18 11:01:16', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidopaterno` varchar(50) NOT NULL,
  `apellidomaterno` varchar(50) NOT NULL,
  `ruc` varchar(30) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `patrocinador` varchar(30) NOT NULL,
  `patrocinador_directo` varchar(30) NOT NULL DEFAULT '0',
  `posicion` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL DEFAULT 1,
  `id_nivel_categoria` int(11) NOT NULL DEFAULT 1,
  `id_tipo_red_mlm` int(11) NOT NULL DEFAULT 5,
  `observacion` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_conectado`
--

CREATE TABLE `representante_conectado` (
  `id_representante_conectado` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidopaterno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidomaterno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_genero` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL DEFAULT 18,
  `id_estado_civil` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `n_hijos` int(11) NOT NULL DEFAULT 0,
  `n_hijos_7` int(11) NOT NULL DEFAULT 0,
  `n_hijos_8_12` int(11) NOT NULL DEFAULT 0,
  `n_hijos_13_17` int(11) NOT NULL DEFAULT 0,
  `n_hijos_18` int(11) NOT NULL DEFAULT 0,
  `id_otros_dependientes` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_dep` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_pro` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_dis` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `patrocinador` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `patrocinador_directo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ruc` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_entidad_bancaria` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nro_cuenta_bancaria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nro_cuenta_interbancaria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_estado_contrato` int(11) NOT NULL DEFAULT 1,
  `fecha_inicio_contrato` date NOT NULL,
  `fecha_fin_contrato` date NOT NULL,
  `id_estado_segmento_mkf` int(11) NOT NULL DEFAULT 1,
  `id_estado_conexion` int(11) NOT NULL DEFAULT 1,
  `id_zonasupervision` int(11) NOT NULL DEFAULT 1,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado_reingreso` int(11) NOT NULL DEFAULT 1,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) DEFAULT NULL,
  `id_usuarioactualiza` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Administrador', 'Administrador de sistema', 1, '2022-07-28 19:06:23', '2022-07-28 18:41:44', 1, 2),
(2, 'Representante', 'Crea ventas', 1, '2022-09-28 01:50:20', '2022-07-28 18:42:27', 1, 2),
(3, 'Candidato', 'Ejecutivo solo es para listar', 1, '2022-09-28 01:50:31', '2022-08-05 19:47:31', 1, 2),
(4, 'Ejecutivo', '', 1, '2022-09-28 01:50:51', '2022-08-09 19:59:00', 1, 2),
(5, 'Web', '', 1, '2022-10-18 20:49:53', '2022-10-18 20:49:53', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria_producto`
--

CREATE TABLE `sub_categoria_producto` (
  `id_sub_categoria_producto` int(11) NOT NULL,
  `sub_categoria` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_categoria_producto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `fechaactualiza` int(11) NOT NULL,
  `fecharegistro` int(11) NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sub_categoria_producto`
--

INSERT INTO `sub_categoria_producto` (`id_sub_categoria_producto`, `sub_categoria`, `id_categoria_producto`, `descripcion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Laptop', 1, 'Equipos electronicos', 1, 2147483647, 2147483647, 1, 1),
(2, 'Telefono', 1, 'Equipos electronicos', 1, 2147483647, 2147483647, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_modulo`
--

CREATE TABLE `sub_modulo` (
  `id_sub_modulo` int(11) NOT NULL,
  `sub_modulo` varchar(100) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1,
  `sub_x_nivel` int(11) DEFAULT NULL,
  `enlace` varchar(60) NOT NULL,
  `icono` varchar(60) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) DEFAULT NULL,
  `id_usuarioactualiza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_modulo`
--

INSERT INTO `sub_modulo` (`id_sub_modulo`, `sub_modulo`, `id_modulo`, `nivel`, `sub_x_nivel`, `enlace`, `icono`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Usuarios', 2, 1, 0, 'usuarios.php', 'far fa-circle nav-icon', 1, '2022-08-13 23:52:01', '2022-09-28 00:37:09', 1, 2),
(2, 'Roles', 2, 1, 0, 'roles.php', 'far fa-circle nav-icon', 1, '2022-08-14 00:14:29', '2022-09-02 18:20:54', 1, 2),
(3, 'Modulos', 2, 1, 0, 'modulos.php', 'far fa-circle nav-icon', 1, '2022-08-14 00:15:03', '2022-09-02 18:21:10', 1, 2),
(4, 'Tipo de documento', 2, 3, 8, 'tipo_documento.php', 'far fa-circle nav-icon', 1, '2022-08-14 00:15:35', '2022-09-07 20:29:00', 1, 2),
(5, 'Sub modulos', 2, 1, NULL, 'sub_modulos.php', 'far fa-circle nav-icon', 1, '2022-08-14 00:37:12', '2022-08-16 19:39:36', 1, 2),
(6, 'Genero', 2, 3, 8, 'genero.php', 'far fa-circle nav-icon', 1, '2022-08-20 16:31:51', '2022-09-07 20:32:28', 1, 2),
(7, 'Estado Civil', 2, 3, 8, 'estado_civil.php', 'far fa-circle nav-icon', 1, '2022-08-20 16:32:51', '2022-09-07 20:31:30', 1, 2),
(8, 'Configuracion', 2, 2, 0, '', 'far fa-circle nav-icon', 1, '2022-09-07 20:25:06', '2022-09-07 20:27:17', 1, 2),
(93, 'Bio Tree Life', 4, 1, 0, 'producto.php', 'far fa-circle nav-icon', 1, '2022-09-28 01:57:56', '2022-09-28 01:57:56', 1, 1),
(94, 'Representante', 3, 1, 0, 'representante.php', 'far fa-circle nav-icon', 1, '2022-09-28 16:49:11', '2022-09-28 16:49:11', 1, 1),
(95, 'Candidatos', 3, 1, 0, 'candidato.php', 'far fa-circle nav-icon', 1, '2022-09-29 00:11:38', '2022-09-29 00:11:38', 1, 1),
(96, 'Matriz de representantes', 3, 1, 0, 'representante-conectado.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:36:05', '2022-10-06 16:36:05', 1, 1),
(97, 'Entidad bancaria', 2, 3, 8, 'entidad_bancaria.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:39:13', '2022-10-06 16:39:13', 1, 1),
(98, 'Estado contrato', 2, 3, 8, 'estado_contrato.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:40:28', '2022-10-06 16:40:28', 1, 1),
(99, 'Estado conexción', 2, 3, 8, 'estado-conexion.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:41:28', '2022-10-06 16:41:28', 1, 1),
(100, 'Zona supervisión', 2, 3, 8, 'zona_supervision.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:42:19', '2022-10-06 16:42:19', 1, 1),
(101, 'Pais', 2, 3, 8, 'pais.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:50:23', '2022-10-06 16:50:23', 1, 1),
(102, 'Departamento', 2, 3, 8, 'ubigeo_peru_departments.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:51:05', '2022-10-06 16:51:05', 1, 1),
(103, 'Provincia', 2, 3, 8, 'ubigeo_peru_provinces.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:51:29', '2022-10-06 16:51:38', 1, 2),
(104, 'Distrito', 2, 3, 8, 'ubigeo_peru_districts.php', 'far fa-circle nav-icon', 1, '2022-10-06 16:52:01', '2022-10-06 16:52:01', 1, 1),
(105, 'Tipo producto', 2, 3, 8, 'tipo_producto.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:36:22', '2022-10-06 19:36:22', 1, 1),
(106, 'Categoría producto', 2, 3, 8, 'categoria_producto.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:37:34', '2022-10-06 19:37:34', 1, 1),
(107, 'Sub categoria producto', 2, 3, 8, 'sub_categoria_producto.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:38:13', '2022-10-06 19:38:13', 1, 1),
(108, 'Divisa', 2, 3, 8, 'divisa.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:38:47', '2022-10-06 19:38:47', 1, 1),
(109, 'Unidad medida', 2, 3, 8, 'unidad_medida.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:39:22', '2022-10-06 19:39:22', 1, 1),
(110, 'Paquete Cabecera', 4, 1, 0, 'paquete_producto_cabecera.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:40:26', '2022-10-06 19:40:26', 1, 1),
(111, 'Paquete detalle', 4, 1, 0, 'paquete_detalle_producto.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:41:22', '2022-10-06 19:41:22', 1, 1),
(112, 'Registrar compra', 4, 1, 0, 'registro_compra.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:42:55', '2022-10-06 19:42:55', 1, 1),
(113, 'Descuentos', 4, 1, 0, 'descuento_producto.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:58:35', '2022-10-06 19:58:35', 1, 1),
(114, 'Tipo descuento', 2, 3, 8, 'tipo_descuento.php', 'far fa-circle nav-icon', 1, '2022-10-06 19:59:22', '2022-10-06 19:59:22', 1, 1),
(115, 'Estado Reg venta', 2, 3, 8, 'estado_registro_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:01:00', '2022-10-06 20:01:00', 1, 1),
(116, 'Cabecera', 5, 1, 0, 'cabecera_registro_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:03:19', '2022-10-06 20:03:19', 1, 1),
(117, 'Costo de envio', 5, 1, 0, 'costo_envio.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:03:59', '2022-10-06 20:03:59', 1, 1),
(118, 'Detalle', 5, 1, 0, 'detalle_registro_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:18:12', '2022-10-06 20:18:12', 1, 1),
(119, 'Temporal detalle', 5, 1, 0, 'temporal_detalle_registro_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:18:43', '2022-10-06 20:18:43', 1, 1),
(120, 'Tipo venta', 2, 3, 8, 'tipo_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:19:38', '2022-10-06 20:19:38', 1, 1),
(121, 'Tipo comisión', 2, 3, 8, 'tipo_comision.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:20:30', '2022-10-06 20:20:30', 1, 1),
(122, 'Trama', 6, 1, 0, 'trama_comisiones.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:21:39', '2022-10-06 20:36:40', 1, 2),
(123, 'Detalle', 6, 1, 0, 'detalle_comisiones_venta.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:37:21', '2022-10-06 20:39:31', 1, 2),
(124, 'Cabecera', 6, 1, 0, 'cabecera_comisiones.php', 'far fa-circle nav-icon', 1, '2022-10-06 20:37:54', '2022-10-06 20:37:54', 1, 1),
(125, 'Descuento producto', 2, 3, 8, 'descuento_producto.php', 'far fa-circle nav-icon', 1, '2022-10-18 19:16:18', '2022-10-18 19:16:18', 1, 1),
(126, 'Menu', 11, 1, 0, 'web_menu.php', 'far fa-circle nav-icon', 1, '2022-10-18 20:54:12', '2022-10-18 20:54:12', 1, 1),
(127, 'Sub Menu', 11, 1, 0, 'web_sub_menu.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:25:04', '2022-10-19 00:25:04', 1, 1),
(128, 'Header', 11, 1, 0, 'web_header.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:26:11', '2022-10-19 00:26:11', 1, 1),
(129, 'Red Social', 11, 1, 0, 'web_red_social.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:26:57', '2022-10-19 00:26:57', 1, 1),
(130, 'Footer Widget', 11, 1, 0, 'web_footer_widget.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:27:59', '2022-10-19 00:27:59', 1, 1),
(131, 'Descripción Footer', 11, 1, 0, 'web_footer_widget_desc.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:28:44', '2022-10-19 00:28:44', 1, 1),
(132, 'Footer Bottom', 11, 1, 0, 'web_footer_four_bottom_right.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:30:22', '2022-10-19 00:30:22', 1, 1),
(133, 'Banner', 11, 1, 0, 'web_banner_static_left.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:30:46', '2022-10-19 00:30:46', 1, 1),
(134, 'Home Five Service', 11, 1, 0, 'web_home_five_service.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:34:03', '2022-10-19 00:34:03', 1, 1),
(135, 'Home Video', 11, 1, 0, 'web_home_video.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:34:36', '2022-10-19 00:34:36', 1, 1),
(136, 'Home Offer', 11, 1, 0, 'web_home_offer.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:35:00', '2022-10-19 00:35:00', 1, 1),
(137, 'Testimonio', 11, 1, 0, 'web_testimonio.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:35:35', '2022-10-19 00:35:35', 1, 1),
(138, 'Call to Action', 11, 1, 0, 'web_call_action_gray.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:36:27', '2022-10-19 00:37:38', 1, 2),
(139, 'Home Pricing', 11, 1, 0, 'web_home_pricing.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:39:08', '2022-10-19 00:39:08', 1, 1),
(140, 'Consto Envió Desc', 11, 1, 0, 'web_costo_envio_desc.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:39:46', '2022-10-19 00:40:07', 1, 2),
(141, 'Beneficio Producto', 11, 1, 0, 'beneficio_producto.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:40:46', '2022-10-19 00:40:46', 1, 1),
(142, 'Descripción Banner', 11, 1, 0, 'web_banner_descripcion.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:41:12', '2022-10-19 00:41:12', 1, 1),
(143, 'Ubicación', 11, 1, 0, 'web_ubicacion.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:41:44', '2022-10-19 00:41:44', 1, 1),
(144, 'Mensaje Contacto', 11, 1, 0, 'web_mensaje_contacto.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:42:44', '2022-10-19 00:42:44', 1, 1),
(145, 'Quienes Somos', 11, 1, 0, 'web_quienes_somos.php', 'far fa-circle nav-icon', 1, '2022-10-19 00:43:01', '2022-10-19 00:43:01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal_detalle_registro_venta`
--

CREATE TABLE `temporal_detalle_registro_venta` (
  `id_temporal_detalle_registro_venta` int(11) NOT NULL,
  `nro_solicitud` varchar(50) DEFAULT NULL,
  `id_tipo_venta` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `id_descuento_producto` int(11) NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporal_detalle_registro_venta`
--

INSERT INTO `temporal_detalle_registro_venta` (`id_temporal_detalle_registro_venta`, `nro_solicitud`, `id_tipo_venta`, `id_paquete`, `id_producto`, `cantidad`, `precio_unitario`, `id_descuento_producto`, `sub_total`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, '051022_0749_62', 2, 0, 0, 1, '1.00', 0, '1.00', '1', 1, '2022-10-05 00:22:49', '2022-10-05 00:23:41', 1, 1),
(2, '051022_0732_41', 1, 0, 0, 123, '123.00', 0, '123.00', '123', 1, '2022-10-05 00:38:32', '2022-10-05 00:38:41', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_archivo`
--

CREATE TABLE `tipo_archivo` (
  `id_tipo_archivo` int(11) NOT NULL,
  `tipo_archivo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_archivo`
--

INSERT INTO `tipo_archivo` (`id_tipo_archivo`, `tipo_archivo`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'PDF', 'PDF', 1, '2022-06-30 01:56:34', '2022-06-01 19:31:07', 1, 2),
(2, 'Word', 'Word', 1, '2022-06-30 01:56:47', '2022-06-04 17:38:10', 1, 2),
(3, 'Excel', 'Excel', 1, '2022-06-30 01:56:56', '2022-06-11 19:09:47', 1, 2),
(4, 'PPT', 'PPT', 0, '2022-06-30 01:57:46', '2022-06-11 19:11:18', 1, 2),
(5, 'Video', 'Video', 1, '2022-06-30 01:58:20', '2022-06-11 19:15:48', 1, 2),
(6, 'Imagen', 'EXCEL', 1, '2022-06-30 01:58:33', '2022-06-15 19:25:41', 1, 2),
(7, 'Audio', 'Audio', 0, '2022-06-30 01:58:44', '2022-06-30 01:58:44', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comision`
--

CREATE TABLE `tipo_comision` (
  `id_tipo_comision` int(11) NOT NULL,
  `tipocomision` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistra` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_comision`
--

INSERT INTO `tipo_comision` (`id_tipo_comision`, `tipocomision`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistra`, `id_usuarioactualiza`) VALUES
(2, 'Por unidad21', 1, '2022-10-05 22:01:56', '2022-10-05 22:20:56', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_descuento`
--

CREATE TABLE `tipo_descuento` (
  `id_tipo_descuento` int(11) NOT NULL,
  `tipo_descuento` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_descuento`
--

INSERT INTO `tipo_descuento` (`id_tipo_descuento`, `tipo_descuento`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Porecentaje', 1, '2022-10-17 22:04:00', '2022-10-17 22:04:00', 1, 1),
(2, 'Valor', 1, '2022-10-17 22:04:07', '2022-10-17 22:04:07', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `tipo_documento`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Cedula', 1, '2022-08-06 23:34:11', '2022-08-06 23:34:11', 1, 1),
(2, 'DNI', 1, '2022-09-07 19:33:24', '2022-09-07 19:33:24', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL,
  `tipo_equipo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`id_tipo_equipo`, `tipo_equipo`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Laptop', 1, '2022-08-15 00:34:56', '2022-08-15 00:40:01', 1, 1),
(2, 'Celular', 1, '2022-08-26 21:02:01', '2022-08-26 21:02:01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_informacion`
--

CREATE TABLE `tipo_informacion` (
  `id_tipo_informacion` int(11) NOT NULL,
  `tipo_informacion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechaactualiza` datetime NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_informacion`
--

INSERT INTO `tipo_informacion` (`id_tipo_informacion`, `tipo_informacion`, `observacion`, `estado`, `fechaactualiza`, `fecharegistro`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Herramientas de ventas', 'Herramientas de ventas', 1, '2022-06-30 01:53:43', '2022-06-01 19:30:53', 1, 2),
(2, 'Tutoriales y herramientas de apoyo', 'Tutoriales y herramientas de apoyo', 1, '2022-06-30 01:53:56', '2022-06-08 19:26:11', 1, 2),
(3, 'Solicitudes', 'Solicitudes', 1, '2022-06-30 01:54:31', '2022-06-30 01:54:09', 1, 2),
(4, 'Videos', 'Videos', 1, '2022-06-30 01:54:40', '2022-06-30 01:54:40', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_licencia`
--

CREATE TABLE `tipo_licencia` (
  `id_tipo_licencia` int(11) NOT NULL,
  `tipo_licencia` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_licencia`
--

INSERT INTO `tipo_licencia` (`id_tipo_licencia`, `tipo_licencia`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Usuarios', 1, '2022-08-15 00:33:40', '2022-08-15 00:33:40', 1, 1),
(2, 'Grupal', 1, '2022-08-15 00:34:01', '2022-08-15 00:34:01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `tipo_producto` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `tipo_producto`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Nuevo', 1, '2022-09-17 14:59:17', '2022-09-17 14:59:17', 2, 2),
(2, 'Original', 1, '2022-09-17 14:59:38', '2022-09-17 14:59:49', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_venta`
--

CREATE TABLE `tipo_venta` (
  `id_tipo_venta` int(11) NOT NULL,
  `tipo_venta` varchar(50) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_venta`
--

INSERT INTO `tipo_venta` (`id_tipo_venta`, `tipo_venta`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Producto', '', 0, '2022-10-01 14:55:40', '2022-10-01 21:00:29', 1, 1),
(2, 'Paquete', '', 1, '2022-10-01 14:57:15', '2022-10-01 16:16:28', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trama_comsiones_x_venta`
--

CREATE TABLE `trama_comsiones_x_venta` (
  `id_trama_comisiones_x_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipo_comision` int(11) NOT NULL,
  `comision` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecharegistro` date NOT NULL,
  `fechaactualiza` date NOT NULL,
  `id_usuarioregistra` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trama_comsiones_x_venta`
--

INSERT INTO `trama_comsiones_x_venta` (`id_trama_comisiones_x_venta`, `id_producto`, `cantidad`, `tipo_comision`, `comision`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistra`, `id_usuarioactualiza`) VALUES
(4, 41, 22123, 3, 4, 1, '2022-10-05', '2022-10-05', 1, 1),
(5, 2, 2123111, 2, 2, 1, '2022-10-05', '2022-10-05', 1, 1),
(6, 2, 22, 2, 2, 1, '2022-10-05', '2022-10-05', 1, 1),
(7, 1, 23, 2, 23, 1, '2022-10-18', '2022-10-18', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo_peru_departments`
--

CREATE TABLE `ubigeo_peru_departments` (
  `id` varchar(2) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubigeo_peru_departments`
--

INSERT INTO `ubigeo_peru_departments` (`id`, `name`) VALUES
('01', 'Amazonas'),
('02', 'Áncash'),
('03', 'Apurímac'),
('04', 'Arequipa'),
('05', 'Ayacucho'),
('06', 'Cajamarca'),
('07', 'Callao'),
('08', 'Cusco'),
('09', 'Huancavelica'),
('10', 'Huánuco'),
('11', 'Ica'),
('12', 'Junín'),
('13', 'La Libertad'),
('14', 'Lambayeque'),
('15', 'Lima'),
('16', 'Loreto'),
('17', 'Madre de Dios'),
('18', 'Moquegua'),
('19', 'Pasco'),
('20', 'Piura'),
('21', 'Puno'),
('22', 'San Martín'),
('23', 'Tacna'),
('24', 'Tumbes'),
('25', 'Ucayali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo_peru_districts`
--

CREATE TABLE `ubigeo_peru_districts` (
  `id` varchar(6) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `province_id` varchar(4) DEFAULT NULL,
  `department_id` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubigeo_peru_districts`
--

INSERT INTO `ubigeo_peru_districts` (`id`, `name`, `province_id`, `department_id`) VALUES
('010101', 'Chachapoyas', '0101', '01'),
('010102', 'Asunción', '0101', '01'),
('010103', 'Balsas', '0101', '01'),
('010104', 'Cheto', '0101', '01'),
('010105', 'Chiliquin', '0101', '01'),
('010106', 'Chuquibamba', '0101', '01'),
('010107', 'Granada', '0101', '01'),
('010108', 'Huancas', '0101', '01'),
('010109', 'La Jalca', '0101', '01'),
('010110', 'Leimebamba', '0101', '01'),
('010111', 'Levanto', '0101', '01'),
('010112', 'Magdalena', '0101', '01'),
('010113', 'Mariscal Castilla', '0101', '01'),
('010114', 'Molinopampa', '0101', '01'),
('010115', 'Montevideo', '0101', '01'),
('010116', 'Olleros', '0101', '01'),
('010117', 'Quinjalca', '0101', '01'),
('010118', 'San Francisco de Daguas', '0101', '01'),
('010119', 'San Isidro de Maino', '0101', '01'),
('010120', 'Soloco', '0101', '01'),
('010121', 'Sonche', '0101', '01'),
('010201', 'Bagua', '0102', '01'),
('010202', 'Aramango', '0102', '01'),
('010203', 'Copallin', '0102', '01'),
('010204', 'El Parco', '0102', '01'),
('010205', 'Imaza', '0102', '01'),
('010206', 'La Peca', '0102', '01'),
('010301', 'Jumbilla', '0103', '01'),
('010302', 'Chisquilla', '0103', '01'),
('010303', 'Churuja', '0103', '01'),
('010304', 'Corosha', '0103', '01'),
('010305', 'Cuispes', '0103', '01'),
('010306', 'Florida', '0103', '01'),
('010307', 'Jazan', '0103', '01'),
('010308', 'Recta', '0103', '01'),
('010309', 'San Carlos', '0103', '01'),
('010310', 'Shipasbamba', '0103', '01'),
('010311', 'Valera', '0103', '01'),
('010312', 'Yambrasbamba', '0103', '01'),
('010401', 'Nieva', '0104', '01'),
('010402', 'El Cenepa', '0104', '01'),
('010403', 'Río Santiago', '0104', '01'),
('010501', 'Lamud', '0105', '01'),
('010502', 'Camporredondo', '0105', '01'),
('010503', 'Cocabamba', '0105', '01'),
('010504', 'Colcamar', '0105', '01'),
('010505', 'Conila', '0105', '01'),
('010506', 'Inguilpata', '0105', '01'),
('010507', 'Longuita', '0105', '01'),
('010508', 'Lonya Chico', '0105', '01'),
('010509', 'Luya', '0105', '01'),
('010510', 'Luya Viejo', '0105', '01'),
('010511', 'María', '0105', '01'),
('010512', 'Ocalli', '0105', '01'),
('010513', 'Ocumal', '0105', '01'),
('010514', 'Pisuquia', '0105', '01'),
('010515', 'Providencia', '0105', '01'),
('010516', 'San Cristóbal', '0105', '01'),
('010517', 'San Francisco de Yeso', '0105', '01'),
('010518', 'San Jerónimo', '0105', '01'),
('010519', 'San Juan de Lopecancha', '0105', '01'),
('010520', 'Santa Catalina', '0105', '01'),
('010521', 'Santo Tomas', '0105', '01'),
('010522', 'Tingo', '0105', '01'),
('010523', 'Trita', '0105', '01'),
('010601', 'San Nicolás', '0106', '01'),
('010602', 'Chirimoto', '0106', '01'),
('010603', 'Cochamal', '0106', '01'),
('010604', 'Huambo', '0106', '01'),
('010605', 'Limabamba', '0106', '01'),
('010606', 'Longar', '0106', '01'),
('010607', 'Mariscal Benavides', '0106', '01'),
('010608', 'Milpuc', '0106', '01'),
('010609', 'Omia', '0106', '01'),
('010610', 'Santa Rosa', '0106', '01'),
('010611', 'Totora', '0106', '01'),
('010612', 'Vista Alegre', '0106', '01'),
('010701', 'Bagua Grande', '0107', '01'),
('010702', 'Cajaruro', '0107', '01'),
('010703', 'Cumba', '0107', '01'),
('010704', 'El Milagro', '0107', '01'),
('010705', 'Jamalca', '0107', '01'),
('010706', 'Lonya Grande', '0107', '01'),
('010707', 'Yamon', '0107', '01'),
('020101', 'Huaraz', '0201', '02'),
('020102', 'Cochabamba', '0201', '02'),
('020103', 'Colcabamba', '0201', '02'),
('020104', 'Huanchay', '0201', '02'),
('020105', 'Independencia', '0201', '02'),
('020106', 'Jangas', '0201', '02'),
('020107', 'La Libertad', '0201', '02'),
('020108', 'Olleros', '0201', '02'),
('020109', 'Pampas Grande', '0201', '02'),
('020110', 'Pariacoto', '0201', '02'),
('020111', 'Pira', '0201', '02'),
('020112', 'Tarica', '0201', '02'),
('020201', 'Aija', '0202', '02'),
('020202', 'Coris', '0202', '02'),
('020203', 'Huacllan', '0202', '02'),
('020204', 'La Merced', '0202', '02'),
('020205', 'Succha', '0202', '02'),
('020301', 'Llamellin', '0203', '02'),
('020302', 'Aczo', '0203', '02'),
('020303', 'Chaccho', '0203', '02'),
('020304', 'Chingas', '0203', '02'),
('020305', 'Mirgas', '0203', '02'),
('020306', 'San Juan de Rontoy', '0203', '02'),
('020401', 'Chacas', '0204', '02'),
('020402', 'Acochaca', '0204', '02'),
('020501', 'Chiquian', '0205', '02'),
('020502', 'Abelardo Pardo Lezameta', '0205', '02'),
('020503', 'Antonio Raymondi', '0205', '02'),
('020504', 'Aquia', '0205', '02'),
('020505', 'Cajacay', '0205', '02'),
('020506', 'Canis', '0205', '02'),
('020507', 'Colquioc', '0205', '02'),
('020508', 'Huallanca', '0205', '02'),
('020509', 'Huasta', '0205', '02'),
('020510', 'Huayllacayan', '0205', '02'),
('020511', 'La Primavera', '0205', '02'),
('020512', 'Mangas', '0205', '02'),
('020513', 'Pacllon', '0205', '02'),
('020514', 'San Miguel de Corpanqui', '0205', '02'),
('020515', 'Ticllos', '0205', '02'),
('020601', 'Carhuaz', '0206', '02'),
('020602', 'Acopampa', '0206', '02'),
('020603', 'Amashca', '0206', '02'),
('020604', 'Anta', '0206', '02'),
('020605', 'Ataquero', '0206', '02'),
('020606', 'Marcara', '0206', '02'),
('020607', 'Pariahuanca', '0206', '02'),
('020608', 'San Miguel de Aco', '0206', '02'),
('020609', 'Shilla', '0206', '02'),
('020610', 'Tinco', '0206', '02'),
('020611', 'Yungar', '0206', '02'),
('020701', 'San Luis', '0207', '02'),
('020702', 'San Nicolás', '0207', '02'),
('020703', 'Yauya', '0207', '02'),
('020801', 'Casma', '0208', '02'),
('020802', 'Buena Vista Alta', '0208', '02'),
('020803', 'Comandante Noel', '0208', '02'),
('020804', 'Yautan', '0208', '02'),
('020901', 'Corongo', '0209', '02'),
('020902', 'Aco', '0209', '02'),
('020903', 'Bambas', '0209', '02'),
('020904', 'Cusca', '0209', '02'),
('020905', 'La Pampa', '0209', '02'),
('020906', 'Yanac', '0209', '02'),
('020907', 'Yupan', '0209', '02'),
('021001', 'Huari', '0210', '02'),
('021002', 'Anra', '0210', '02'),
('021003', 'Cajay', '0210', '02'),
('021004', 'Chavin de Huantar', '0210', '02'),
('021005', 'Huacachi', '0210', '02'),
('021006', 'Huacchis', '0210', '02'),
('021007', 'Huachis', '0210', '02'),
('021008', 'Huantar', '0210', '02'),
('021009', 'Masin', '0210', '02'),
('021010', 'Paucas', '0210', '02'),
('021011', 'Ponto', '0210', '02'),
('021012', 'Rahuapampa', '0210', '02'),
('021013', 'Rapayan', '0210', '02'),
('021014', 'San Marcos', '0210', '02'),
('021015', 'San Pedro de Chana', '0210', '02'),
('021016', 'Uco', '0210', '02'),
('021101', 'Huarmey', '0211', '02'),
('021102', 'Cochapeti', '0211', '02'),
('021103', 'Culebras', '0211', '02'),
('021104', 'Huayan', '0211', '02'),
('021105', 'Malvas', '0211', '02'),
('021201', 'Caraz', '0212', '02'),
('021202', 'Huallanca', '0212', '02'),
('021203', 'Huata', '0212', '02'),
('021204', 'Huaylas', '0212', '02'),
('021205', 'Mato', '0212', '02'),
('021206', 'Pamparomas', '0212', '02'),
('021207', 'Pueblo Libre', '0212', '02'),
('021208', 'Santa Cruz', '0212', '02'),
('021209', 'Santo Toribio', '0212', '02'),
('021210', 'Yuracmarca', '0212', '02'),
('021301', 'Piscobamba', '0213', '02'),
('021302', 'Casca', '0213', '02'),
('021303', 'Eleazar Guzmán Barron', '0213', '02'),
('021304', 'Fidel Olivas Escudero', '0213', '02'),
('021305', 'Llama', '0213', '02'),
('021306', 'Llumpa', '0213', '02'),
('021307', 'Lucma', '0213', '02'),
('021308', 'Musga', '0213', '02'),
('021401', 'Ocros', '0214', '02'),
('021402', 'Acas', '0214', '02'),
('021403', 'Cajamarquilla', '0214', '02'),
('021404', 'Carhuapampa', '0214', '02'),
('021405', 'Cochas', '0214', '02'),
('021406', 'Congas', '0214', '02'),
('021407', 'Llipa', '0214', '02'),
('021408', 'San Cristóbal de Rajan', '0214', '02'),
('021409', 'San Pedro', '0214', '02'),
('021410', 'Santiago de Chilcas', '0214', '02'),
('021501', 'Cabana', '0215', '02'),
('021502', 'Bolognesi', '0215', '02'),
('021503', 'Conchucos', '0215', '02'),
('021504', 'Huacaschuque', '0215', '02'),
('021505', 'Huandoval', '0215', '02'),
('021506', 'Lacabamba', '0215', '02'),
('021507', 'Llapo', '0215', '02'),
('021508', 'Pallasca', '0215', '02'),
('021509', 'Pampas', '0215', '02'),
('021510', 'Santa Rosa', '0215', '02'),
('021511', 'Tauca', '0215', '02'),
('021601', 'Pomabamba', '0216', '02'),
('021602', 'Huayllan', '0216', '02'),
('021603', 'Parobamba', '0216', '02'),
('021604', 'Quinuabamba', '0216', '02'),
('021701', 'Recuay', '0217', '02'),
('021702', 'Catac', '0217', '02'),
('021703', 'Cotaparaco', '0217', '02'),
('021704', 'Huayllapampa', '0217', '02'),
('021705', 'Llacllin', '0217', '02'),
('021706', 'Marca', '0217', '02'),
('021707', 'Pampas Chico', '0217', '02'),
('021708', 'Pararin', '0217', '02'),
('021709', 'Tapacocha', '0217', '02'),
('021710', 'Ticapampa', '0217', '02'),
('021801', 'Chimbote', '0218', '02'),
('021802', 'Cáceres del Perú', '0218', '02'),
('021803', 'Coishco', '0218', '02'),
('021804', 'Macate', '0218', '02'),
('021805', 'Moro', '0218', '02'),
('021806', 'Nepeña', '0218', '02'),
('021807', 'Samanco', '0218', '02'),
('021808', 'Santa', '0218', '02'),
('021809', 'Nuevo Chimbote', '0218', '02'),
('021901', 'Sihuas', '0219', '02'),
('021902', 'Acobamba', '0219', '02'),
('021903', 'Alfonso Ugarte', '0219', '02'),
('021904', 'Cashapampa', '0219', '02'),
('021905', 'Chingalpo', '0219', '02'),
('021906', 'Huayllabamba', '0219', '02'),
('021907', 'Quiches', '0219', '02'),
('021908', 'Ragash', '0219', '02'),
('021909', 'San Juan', '0219', '02'),
('021910', 'Sicsibamba', '0219', '02'),
('022001', 'Yungay', '0220', '02'),
('022002', 'Cascapara', '0220', '02'),
('022003', 'Mancos', '0220', '02'),
('022004', 'Matacoto', '0220', '02'),
('022005', 'Quillo', '0220', '02'),
('022006', 'Ranrahirca', '0220', '02'),
('022007', 'Shupluy', '0220', '02'),
('022008', 'Yanama', '0220', '02'),
('030101', 'Abancay', '0301', '03'),
('030102', 'Chacoche', '0301', '03'),
('030103', 'Circa', '0301', '03'),
('030104', 'Curahuasi', '0301', '03'),
('030105', 'Huanipaca', '0301', '03'),
('030106', 'Lambrama', '0301', '03'),
('030107', 'Pichirhua', '0301', '03'),
('030108', 'San Pedro de Cachora', '0301', '03'),
('030109', 'Tamburco', '0301', '03'),
('030201', 'Andahuaylas', '0302', '03'),
('030202', 'Andarapa', '0302', '03'),
('030203', 'Chiara', '0302', '03'),
('030204', 'Huancarama', '0302', '03'),
('030205', 'Huancaray', '0302', '03'),
('030206', 'Huayana', '0302', '03'),
('030207', 'Kishuara', '0302', '03'),
('030208', 'Pacobamba', '0302', '03'),
('030209', 'Pacucha', '0302', '03'),
('030210', 'Pampachiri', '0302', '03'),
('030211', 'Pomacocha', '0302', '03'),
('030212', 'San Antonio de Cachi', '0302', '03'),
('030213', 'San Jerónimo', '0302', '03'),
('030214', 'San Miguel de Chaccrampa', '0302', '03'),
('030215', 'Santa María de Chicmo', '0302', '03'),
('030216', 'Talavera', '0302', '03'),
('030217', 'Tumay Huaraca', '0302', '03'),
('030218', 'Turpo', '0302', '03'),
('030219', 'Kaquiabamba', '0302', '03'),
('030220', 'José María Arguedas', '0302', '03'),
('030301', 'Antabamba', '0303', '03'),
('030302', 'El Oro', '0303', '03'),
('030303', 'Huaquirca', '0303', '03'),
('030304', 'Juan Espinoza Medrano', '0303', '03'),
('030305', 'Oropesa', '0303', '03'),
('030306', 'Pachaconas', '0303', '03'),
('030307', 'Sabaino', '0303', '03'),
('030401', 'Chalhuanca', '0304', '03'),
('030402', 'Capaya', '0304', '03'),
('030403', 'Caraybamba', '0304', '03'),
('030404', 'Chapimarca', '0304', '03'),
('030405', 'Colcabamba', '0304', '03'),
('030406', 'Cotaruse', '0304', '03'),
('030407', 'Ihuayllo', '0304', '03'),
('030408', 'Justo Apu Sahuaraura', '0304', '03'),
('030409', 'Lucre', '0304', '03'),
('030410', 'Pocohuanca', '0304', '03'),
('030411', 'San Juan de Chacña', '0304', '03'),
('030412', 'Sañayca', '0304', '03'),
('030413', 'Soraya', '0304', '03'),
('030414', 'Tapairihua', '0304', '03'),
('030415', 'Tintay', '0304', '03'),
('030416', 'Toraya', '0304', '03'),
('030417', 'Yanaca', '0304', '03'),
('030501', 'Tambobamba', '0305', '03'),
('030502', 'Cotabambas', '0305', '03'),
('030503', 'Coyllurqui', '0305', '03'),
('030504', 'Haquira', '0305', '03'),
('030505', 'Mara', '0305', '03'),
('030506', 'Challhuahuacho', '0305', '03'),
('030601', 'Chincheros', '0306', '03'),
('030602', 'Anco_Huallo', '0306', '03'),
('030603', 'Cocharcas', '0306', '03'),
('030604', 'Huaccana', '0306', '03'),
('030605', 'Ocobamba', '0306', '03'),
('030606', 'Ongoy', '0306', '03'),
('030607', 'Uranmarca', '0306', '03'),
('030608', 'Ranracancha', '0306', '03'),
('030609', 'Rocchacc', '0306', '03'),
('030610', 'El Porvenir', '0306', '03'),
('030611', 'Los Chankas', '0306', '03'),
('030701', 'Chuquibambilla', '0307', '03'),
('030702', 'Curpahuasi', '0307', '03'),
('030703', 'Gamarra', '0307', '03'),
('030704', 'Huayllati', '0307', '03'),
('030705', 'Mamara', '0307', '03'),
('030706', 'Micaela Bastidas', '0307', '03'),
('030707', 'Pataypampa', '0307', '03'),
('030708', 'Progreso', '0307', '03'),
('030709', 'San Antonio', '0307', '03'),
('030710', 'Santa Rosa', '0307', '03'),
('030711', 'Turpay', '0307', '03'),
('030712', 'Vilcabamba', '0307', '03'),
('030713', 'Virundo', '0307', '03'),
('030714', 'Curasco', '0307', '03'),
('040101', 'Arequipa', '0401', '04'),
('040102', 'Alto Selva Alegre', '0401', '04'),
('040103', 'Cayma', '0401', '04'),
('040104', 'Cerro Colorado', '0401', '04'),
('040105', 'Characato', '0401', '04'),
('040106', 'Chiguata', '0401', '04'),
('040107', 'Jacobo Hunter', '0401', '04'),
('040108', 'La Joya', '0401', '04'),
('040109', 'Mariano Melgar', '0401', '04'),
('040110', 'Miraflores', '0401', '04'),
('040111', 'Mollebaya', '0401', '04'),
('040112', 'Paucarpata', '0401', '04'),
('040113', 'Pocsi', '0401', '04'),
('040114', 'Polobaya', '0401', '04'),
('040115', 'Quequeña', '0401', '04'),
('040116', 'Sabandia', '0401', '04'),
('040117', 'Sachaca', '0401', '04'),
('040118', 'San Juan de Siguas', '0401', '04'),
('040119', 'San Juan de Tarucani', '0401', '04'),
('040120', 'Santa Isabel de Siguas', '0401', '04'),
('040121', 'Santa Rita de Siguas', '0401', '04'),
('040122', 'Socabaya', '0401', '04'),
('040123', 'Tiabaya', '0401', '04'),
('040124', 'Uchumayo', '0401', '04'),
('040125', 'Vitor', '0401', '04'),
('040126', 'Yanahuara', '0401', '04'),
('040127', 'Yarabamba', '0401', '04'),
('040128', 'Yura', '0401', '04'),
('040129', 'José Luis Bustamante Y Rivero', '0401', '04'),
('040201', 'Camaná', '0402', '04'),
('040202', 'José María Quimper', '0402', '04'),
('040203', 'Mariano Nicolás Valcárcel', '0402', '04'),
('040204', 'Mariscal Cáceres', '0402', '04'),
('040205', 'Nicolás de Pierola', '0402', '04'),
('040206', 'Ocoña', '0402', '04'),
('040207', 'Quilca', '0402', '04'),
('040208', 'Samuel Pastor', '0402', '04'),
('040301', 'Caravelí', '0403', '04'),
('040302', 'Acarí', '0403', '04'),
('040303', 'Atico', '0403', '04'),
('040304', 'Atiquipa', '0403', '04'),
('040305', 'Bella Unión', '0403', '04'),
('040306', 'Cahuacho', '0403', '04'),
('040307', 'Chala', '0403', '04'),
('040308', 'Chaparra', '0403', '04'),
('040309', 'Huanuhuanu', '0403', '04'),
('040310', 'Jaqui', '0403', '04'),
('040311', 'Lomas', '0403', '04'),
('040312', 'Quicacha', '0403', '04'),
('040313', 'Yauca', '0403', '04'),
('040401', 'Aplao', '0404', '04'),
('040402', 'Andagua', '0404', '04'),
('040403', 'Ayo', '0404', '04'),
('040404', 'Chachas', '0404', '04'),
('040405', 'Chilcaymarca', '0404', '04'),
('040406', 'Choco', '0404', '04'),
('040407', 'Huancarqui', '0404', '04'),
('040408', 'Machaguay', '0404', '04'),
('040409', 'Orcopampa', '0404', '04'),
('040410', 'Pampacolca', '0404', '04'),
('040411', 'Tipan', '0404', '04'),
('040412', 'Uñon', '0404', '04'),
('040413', 'Uraca', '0404', '04'),
('040414', 'Viraco', '0404', '04'),
('040501', 'Chivay', '0405', '04'),
('040502', 'Achoma', '0405', '04'),
('040503', 'Cabanaconde', '0405', '04'),
('040504', 'Callalli', '0405', '04'),
('040505', 'Caylloma', '0405', '04'),
('040506', 'Coporaque', '0405', '04'),
('040507', 'Huambo', '0405', '04'),
('040508', 'Huanca', '0405', '04'),
('040509', 'Ichupampa', '0405', '04'),
('040510', 'Lari', '0405', '04'),
('040511', 'Lluta', '0405', '04'),
('040512', 'Maca', '0405', '04'),
('040513', 'Madrigal', '0405', '04'),
('040514', 'San Antonio de Chuca', '0405', '04'),
('040515', 'Sibayo', '0405', '04'),
('040516', 'Tapay', '0405', '04'),
('040517', 'Tisco', '0405', '04'),
('040518', 'Tuti', '0405', '04'),
('040519', 'Yanque', '0405', '04'),
('040520', 'Majes', '0405', '04'),
('040601', 'Chuquibamba', '0406', '04'),
('040602', 'Andaray', '0406', '04'),
('040603', 'Cayarani', '0406', '04'),
('040604', 'Chichas', '0406', '04'),
('040605', 'Iray', '0406', '04'),
('040606', 'Río Grande', '0406', '04'),
('040607', 'Salamanca', '0406', '04'),
('040608', 'Yanaquihua', '0406', '04'),
('040701', 'Mollendo', '0407', '04'),
('040702', 'Cocachacra', '0407', '04'),
('040703', 'Dean Valdivia', '0407', '04'),
('040704', 'Islay', '0407', '04'),
('040705', 'Mejia', '0407', '04'),
('040706', 'Punta de Bombón', '0407', '04'),
('040801', 'Cotahuasi', '0408', '04'),
('040802', 'Alca', '0408', '04'),
('040803', 'Charcana', '0408', '04'),
('040804', 'Huaynacotas', '0408', '04'),
('040805', 'Pampamarca', '0408', '04'),
('040806', 'Puyca', '0408', '04'),
('040807', 'Quechualla', '0408', '04'),
('040808', 'Sayla', '0408', '04'),
('040809', 'Tauria', '0408', '04'),
('040810', 'Tomepampa', '0408', '04'),
('040811', 'Toro', '0408', '04'),
('050101', 'Ayacucho', '0501', '05'),
('050102', 'Acocro', '0501', '05'),
('050103', 'Acos Vinchos', '0501', '05'),
('050104', 'Carmen Alto', '0501', '05'),
('050105', 'Chiara', '0501', '05'),
('050106', 'Ocros', '0501', '05'),
('050107', 'Pacaycasa', '0501', '05'),
('050108', 'Quinua', '0501', '05'),
('050109', 'San José de Ticllas', '0501', '05'),
('050110', 'San Juan Bautista', '0501', '05'),
('050111', 'Santiago de Pischa', '0501', '05'),
('050112', 'Socos', '0501', '05'),
('050113', 'Tambillo', '0501', '05'),
('050114', 'Vinchos', '0501', '05'),
('050115', 'Jesús Nazareno', '0501', '05'),
('050116', 'Andrés Avelino Cáceres Dorregaray', '0501', '05'),
('050201', 'Cangallo', '0502', '05'),
('050202', 'Chuschi', '0502', '05'),
('050203', 'Los Morochucos', '0502', '05'),
('050204', 'María Parado de Bellido', '0502', '05'),
('050205', 'Paras', '0502', '05'),
('050206', 'Totos', '0502', '05'),
('050301', 'Sancos', '0503', '05'),
('050302', 'Carapo', '0503', '05'),
('050303', 'Sacsamarca', '0503', '05'),
('050304', 'Santiago de Lucanamarca', '0503', '05'),
('050401', 'Huanta', '0504', '05'),
('050402', 'Ayahuanco', '0504', '05'),
('050403', 'Huamanguilla', '0504', '05'),
('050404', 'Iguain', '0504', '05'),
('050405', 'Luricocha', '0504', '05'),
('050406', 'Santillana', '0504', '05'),
('050407', 'Sivia', '0504', '05'),
('050408', 'Llochegua', '0504', '05'),
('050409', 'Canayre', '0504', '05'),
('050410', 'Uchuraccay', '0504', '05'),
('050411', 'Pucacolpa', '0504', '05'),
('050412', 'Chaca', '0504', '05'),
('050501', 'San Miguel', '0505', '05'),
('050502', 'Anco', '0505', '05'),
('050503', 'Ayna', '0505', '05'),
('050504', 'Chilcas', '0505', '05'),
('050505', 'Chungui', '0505', '05'),
('050506', 'Luis Carranza', '0505', '05'),
('050507', 'Santa Rosa', '0505', '05'),
('050508', 'Tambo', '0505', '05'),
('050509', 'Samugari', '0505', '05'),
('050510', 'Anchihuay', '0505', '05'),
('050511', 'Oronccoy', '0505', '05'),
('050601', 'Puquio', '0506', '05'),
('050602', 'Aucara', '0506', '05'),
('050603', 'Cabana', '0506', '05'),
('050604', 'Carmen Salcedo', '0506', '05'),
('050605', 'Chaviña', '0506', '05'),
('050606', 'Chipao', '0506', '05'),
('050607', 'Huac-Huas', '0506', '05'),
('050608', 'Laramate', '0506', '05'),
('050609', 'Leoncio Prado', '0506', '05'),
('050610', 'Llauta', '0506', '05'),
('050611', 'Lucanas', '0506', '05'),
('050612', 'Ocaña', '0506', '05'),
('050613', 'Otoca', '0506', '05'),
('050614', 'Saisa', '0506', '05'),
('050615', 'San Cristóbal', '0506', '05'),
('050616', 'San Juan', '0506', '05'),
('050617', 'San Pedro', '0506', '05'),
('050618', 'San Pedro de Palco', '0506', '05'),
('050619', 'Sancos', '0506', '05'),
('050620', 'Santa Ana de Huaycahuacho', '0506', '05'),
('050621', 'Santa Lucia', '0506', '05'),
('050701', 'Coracora', '0507', '05'),
('050702', 'Chumpi', '0507', '05'),
('050703', 'Coronel Castañeda', '0507', '05'),
('050704', 'Pacapausa', '0507', '05'),
('050705', 'Pullo', '0507', '05'),
('050706', 'Puyusca', '0507', '05'),
('050707', 'San Francisco de Ravacayco', '0507', '05'),
('050708', 'Upahuacho', '0507', '05'),
('050801', 'Pausa', '0508', '05'),
('050802', 'Colta', '0508', '05'),
('050803', 'Corculla', '0508', '05'),
('050804', 'Lampa', '0508', '05'),
('050805', 'Marcabamba', '0508', '05'),
('050806', 'Oyolo', '0508', '05'),
('050807', 'Pararca', '0508', '05'),
('050808', 'San Javier de Alpabamba', '0508', '05'),
('050809', 'San José de Ushua', '0508', '05'),
('050810', 'Sara Sara', '0508', '05'),
('050901', 'Querobamba', '0509', '05'),
('050902', 'Belén', '0509', '05'),
('050903', 'Chalcos', '0509', '05'),
('050904', 'Chilcayoc', '0509', '05'),
('050905', 'Huacaña', '0509', '05'),
('050906', 'Morcolla', '0509', '05'),
('050907', 'Paico', '0509', '05'),
('050908', 'San Pedro de Larcay', '0509', '05'),
('050909', 'San Salvador de Quije', '0509', '05'),
('050910', 'Santiago de Paucaray', '0509', '05'),
('050911', 'Soras', '0509', '05'),
('051001', 'Huancapi', '0510', '05'),
('051002', 'Alcamenca', '0510', '05'),
('051003', 'Apongo', '0510', '05'),
('051004', 'Asquipata', '0510', '05'),
('051005', 'Canaria', '0510', '05'),
('051006', 'Cayara', '0510', '05'),
('051007', 'Colca', '0510', '05'),
('051008', 'Huamanquiquia', '0510', '05'),
('051009', 'Huancaraylla', '0510', '05'),
('051010', 'Hualla', '0510', '05'),
('051011', 'Sarhua', '0510', '05'),
('051012', 'Vilcanchos', '0510', '05'),
('051101', 'Vilcas Huaman', '0511', '05'),
('051102', 'Accomarca', '0511', '05'),
('051103', 'Carhuanca', '0511', '05'),
('051104', 'Concepción', '0511', '05'),
('051105', 'Huambalpa', '0511', '05'),
('051106', 'Independencia', '0511', '05'),
('051107', 'Saurama', '0511', '05'),
('051108', 'Vischongo', '0511', '05'),
('060101', 'Cajamarca', '0601', '06'),
('060102', 'Asunción', '0601', '06'),
('060103', 'Chetilla', '0601', '06'),
('060104', 'Cospan', '0601', '06'),
('060105', 'Encañada', '0601', '06'),
('060106', 'Jesús', '0601', '06'),
('060107', 'Llacanora', '0601', '06'),
('060108', 'Los Baños del Inca', '0601', '06'),
('060109', 'Magdalena', '0601', '06'),
('060110', 'Matara', '0601', '06'),
('060111', 'Namora', '0601', '06'),
('060112', 'San Juan', '0601', '06'),
('060201', 'Cajabamba', '0602', '06'),
('060202', 'Cachachi', '0602', '06'),
('060203', 'Condebamba', '0602', '06'),
('060204', 'Sitacocha', '0602', '06'),
('060301', 'Celendín', '0603', '06'),
('060302', 'Chumuch', '0603', '06'),
('060303', 'Cortegana', '0603', '06'),
('060304', 'Huasmin', '0603', '06'),
('060305', 'Jorge Chávez', '0603', '06'),
('060306', 'José Gálvez', '0603', '06'),
('060307', 'Miguel Iglesias', '0603', '06'),
('060308', 'Oxamarca', '0603', '06'),
('060309', 'Sorochuco', '0603', '06'),
('060310', 'Sucre', '0603', '06'),
('060311', 'Utco', '0603', '06'),
('060312', 'La Libertad de Pallan', '0603', '06'),
('060401', 'Chota', '0604', '06'),
('060402', 'Anguia', '0604', '06'),
('060403', 'Chadin', '0604', '06'),
('060404', 'Chiguirip', '0604', '06'),
('060405', 'Chimban', '0604', '06'),
('060406', 'Choropampa', '0604', '06'),
('060407', 'Cochabamba', '0604', '06'),
('060408', 'Conchan', '0604', '06'),
('060409', 'Huambos', '0604', '06'),
('060410', 'Lajas', '0604', '06'),
('060411', 'Llama', '0604', '06'),
('060412', 'Miracosta', '0604', '06'),
('060413', 'Paccha', '0604', '06'),
('060414', 'Pion', '0604', '06'),
('060415', 'Querocoto', '0604', '06'),
('060416', 'San Juan de Licupis', '0604', '06'),
('060417', 'Tacabamba', '0604', '06'),
('060418', 'Tocmoche', '0604', '06'),
('060419', 'Chalamarca', '0604', '06'),
('060501', 'Contumaza', '0605', '06'),
('060502', 'Chilete', '0605', '06'),
('060503', 'Cupisnique', '0605', '06'),
('060504', 'Guzmango', '0605', '06'),
('060505', 'San Benito', '0605', '06'),
('060506', 'Santa Cruz de Toledo', '0605', '06'),
('060507', 'Tantarica', '0605', '06'),
('060508', 'Yonan', '0605', '06'),
('060601', 'Cutervo', '0606', '06'),
('060602', 'Callayuc', '0606', '06'),
('060603', 'Choros', '0606', '06'),
('060604', 'Cujillo', '0606', '06'),
('060605', 'La Ramada', '0606', '06'),
('060606', 'Pimpingos', '0606', '06'),
('060607', 'Querocotillo', '0606', '06'),
('060608', 'San Andrés de Cutervo', '0606', '06'),
('060609', 'San Juan de Cutervo', '0606', '06'),
('060610', 'San Luis de Lucma', '0606', '06'),
('060611', 'Santa Cruz', '0606', '06'),
('060612', 'Santo Domingo de la Capilla', '0606', '06'),
('060613', 'Santo Tomas', '0606', '06'),
('060614', 'Socota', '0606', '06'),
('060615', 'Toribio Casanova', '0606', '06'),
('060701', 'Bambamarca', '0607', '06'),
('060702', 'Chugur', '0607', '06'),
('060703', 'Hualgayoc', '0607', '06'),
('060801', 'Jaén', '0608', '06'),
('060802', 'Bellavista', '0608', '06'),
('060803', 'Chontali', '0608', '06'),
('060804', 'Colasay', '0608', '06'),
('060805', 'Huabal', '0608', '06'),
('060806', 'Las Pirias', '0608', '06'),
('060807', 'Pomahuaca', '0608', '06'),
('060808', 'Pucara', '0608', '06'),
('060809', 'Sallique', '0608', '06'),
('060810', 'San Felipe', '0608', '06'),
('060811', 'San José del Alto', '0608', '06'),
('060812', 'Santa Rosa', '0608', '06'),
('060901', 'San Ignacio', '0609', '06'),
('060902', 'Chirinos', '0609', '06'),
('060903', 'Huarango', '0609', '06'),
('060904', 'La Coipa', '0609', '06'),
('060905', 'Namballe', '0609', '06'),
('060906', 'San José de Lourdes', '0609', '06'),
('060907', 'Tabaconas', '0609', '06'),
('061001', 'Pedro Gálvez', '0610', '06'),
('061002', 'Chancay', '0610', '06'),
('061003', 'Eduardo Villanueva', '0610', '06'),
('061004', 'Gregorio Pita', '0610', '06'),
('061005', 'Ichocan', '0610', '06'),
('061006', 'José Manuel Quiroz', '0610', '06'),
('061007', 'José Sabogal', '0610', '06'),
('061101', 'San Miguel', '0611', '06'),
('061102', 'Bolívar', '0611', '06'),
('061103', 'Calquis', '0611', '06'),
('061104', 'Catilluc', '0611', '06'),
('061105', 'El Prado', '0611', '06'),
('061106', 'La Florida', '0611', '06'),
('061107', 'Llapa', '0611', '06'),
('061108', 'Nanchoc', '0611', '06'),
('061109', 'Niepos', '0611', '06'),
('061110', 'San Gregorio', '0611', '06'),
('061111', 'San Silvestre de Cochan', '0611', '06'),
('061112', 'Tongod', '0611', '06'),
('061113', 'Unión Agua Blanca', '0611', '06'),
('061201', 'San Pablo', '0612', '06'),
('061202', 'San Bernardino', '0612', '06'),
('061203', 'San Luis', '0612', '06'),
('061204', 'Tumbaden', '0612', '06'),
('061301', 'Santa Cruz', '0613', '06'),
('061302', 'Andabamba', '0613', '06'),
('061303', 'Catache', '0613', '06'),
('061304', 'Chancaybaños', '0613', '06'),
('061305', 'La Esperanza', '0613', '06'),
('061306', 'Ninabamba', '0613', '06'),
('061307', 'Pulan', '0613', '06'),
('061308', 'Saucepampa', '0613', '06'),
('061309', 'Sexi', '0613', '06'),
('061310', 'Uticyacu', '0613', '06'),
('061311', 'Yauyucan', '0613', '06'),
('070101', 'Callao', '0701', '07'),
('070102', 'Bellavista', '0701', '07'),
('070103', 'Carmen de la Legua Reynoso', '0701', '07'),
('070104', 'La Perla', '0701', '07'),
('070105', 'La Punta', '0701', '07'),
('070106', 'Ventanilla', '0701', '07'),
('070107', 'Mi Perú', '0701', '07'),
('080101', 'Cusco', '0801', '08'),
('080102', 'Ccorca', '0801', '08'),
('080103', 'Poroy', '0801', '08'),
('080104', 'San Jerónimo', '0801', '08'),
('080105', 'San Sebastian', '0801', '08'),
('080106', 'Santiago', '0801', '08'),
('080107', 'Saylla', '0801', '08'),
('080108', 'Wanchaq', '0801', '08'),
('080201', 'Acomayo', '0802', '08'),
('080202', 'Acopia', '0802', '08'),
('080203', 'Acos', '0802', '08'),
('080204', 'Mosoc Llacta', '0802', '08'),
('080205', 'Pomacanchi', '0802', '08'),
('080206', 'Rondocan', '0802', '08'),
('080207', 'Sangarara', '0802', '08'),
('080301', 'Anta', '0803', '08'),
('080302', 'Ancahuasi', '0803', '08'),
('080303', 'Cachimayo', '0803', '08'),
('080304', 'Chinchaypujio', '0803', '08'),
('080305', 'Huarocondo', '0803', '08'),
('080306', 'Limatambo', '0803', '08'),
('080307', 'Mollepata', '0803', '08'),
('080308', 'Pucyura', '0803', '08'),
('080309', 'Zurite', '0803', '08'),
('080401', 'Calca', '0804', '08'),
('080402', 'Coya', '0804', '08'),
('080403', 'Lamay', '0804', '08'),
('080404', 'Lares', '0804', '08'),
('080405', 'Pisac', '0804', '08'),
('080406', 'San Salvador', '0804', '08'),
('080407', 'Taray', '0804', '08'),
('080408', 'Yanatile', '0804', '08'),
('080501', 'Yanaoca', '0805', '08'),
('080502', 'Checca', '0805', '08'),
('080503', 'Kunturkanki', '0805', '08'),
('080504', 'Langui', '0805', '08'),
('080505', 'Layo', '0805', '08'),
('080506', 'Pampamarca', '0805', '08'),
('080507', 'Quehue', '0805', '08'),
('080508', 'Tupac Amaru', '0805', '08'),
('080601', 'Sicuani', '0806', '08'),
('080602', 'Checacupe', '0806', '08'),
('080603', 'Combapata', '0806', '08'),
('080604', 'Marangani', '0806', '08'),
('080605', 'Pitumarca', '0806', '08'),
('080606', 'San Pablo', '0806', '08'),
('080607', 'San Pedro', '0806', '08'),
('080608', 'Tinta', '0806', '08'),
('080701', 'Santo Tomas', '0807', '08'),
('080702', 'Capacmarca', '0807', '08'),
('080703', 'Chamaca', '0807', '08'),
('080704', 'Colquemarca', '0807', '08'),
('080705', 'Livitaca', '0807', '08'),
('080706', 'Llusco', '0807', '08'),
('080707', 'Quiñota', '0807', '08'),
('080708', 'Velille', '0807', '08'),
('080801', 'Espinar', '0808', '08'),
('080802', 'Condoroma', '0808', '08'),
('080803', 'Coporaque', '0808', '08'),
('080804', 'Ocoruro', '0808', '08'),
('080805', 'Pallpata', '0808', '08'),
('080806', 'Pichigua', '0808', '08'),
('080807', 'Suyckutambo', '0808', '08'),
('080808', 'Alto Pichigua', '0808', '08'),
('080901', 'Santa Ana', '0809', '08'),
('080902', 'Echarate', '0809', '08'),
('080903', 'Huayopata', '0809', '08'),
('080904', 'Maranura', '0809', '08'),
('080905', 'Ocobamba', '0809', '08'),
('080906', 'Quellouno', '0809', '08'),
('080907', 'Kimbiri', '0809', '08'),
('080908', 'Santa Teresa', '0809', '08'),
('080909', 'Vilcabamba', '0809', '08'),
('080910', 'Pichari', '0809', '08'),
('080911', 'Inkawasi', '0809', '08'),
('080912', 'Villa Virgen', '0809', '08'),
('080913', 'Villa Kintiarina', '0809', '08'),
('080914', 'Megantoni', '0809', '08'),
('081001', 'Paruro', '0810', '08'),
('081002', 'Accha', '0810', '08'),
('081003', 'Ccapi', '0810', '08'),
('081004', 'Colcha', '0810', '08'),
('081005', 'Huanoquite', '0810', '08'),
('081006', 'Omachaç', '0810', '08'),
('081007', 'Paccaritambo', '0810', '08'),
('081008', 'Pillpinto', '0810', '08'),
('081009', 'Yaurisque', '0810', '08'),
('081101', 'Paucartambo', '0811', '08'),
('081102', 'Caicay', '0811', '08'),
('081103', 'Challabamba', '0811', '08'),
('081104', 'Colquepata', '0811', '08'),
('081105', 'Huancarani', '0811', '08'),
('081106', 'Kosñipata', '0811', '08'),
('081201', 'Urcos', '0812', '08'),
('081202', 'Andahuaylillas', '0812', '08'),
('081203', 'Camanti', '0812', '08'),
('081204', 'Ccarhuayo', '0812', '08'),
('081205', 'Ccatca', '0812', '08'),
('081206', 'Cusipata', '0812', '08'),
('081207', 'Huaro', '0812', '08'),
('081208', 'Lucre', '0812', '08'),
('081209', 'Marcapata', '0812', '08'),
('081210', 'Ocongate', '0812', '08'),
('081211', 'Oropesa', '0812', '08'),
('081212', 'Quiquijana', '0812', '08'),
('081301', 'Urubamba', '0813', '08'),
('081302', 'Chinchero', '0813', '08'),
('081303', 'Huayllabamba', '0813', '08'),
('081304', 'Machupicchu', '0813', '08'),
('081305', 'Maras', '0813', '08'),
('081306', 'Ollantaytambo', '0813', '08'),
('081307', 'Yucay', '0813', '08'),
('090101', 'Huancavelica', '0901', '09'),
('090102', 'Acobambilla', '0901', '09'),
('090103', 'Acoria', '0901', '09'),
('090104', 'Conayca', '0901', '09'),
('090105', 'Cuenca', '0901', '09'),
('090106', 'Huachocolpa', '0901', '09'),
('090107', 'Huayllahuara', '0901', '09'),
('090108', 'Izcuchaca', '0901', '09'),
('090109', 'Laria', '0901', '09'),
('090110', 'Manta', '0901', '09'),
('090111', 'Mariscal Cáceres', '0901', '09'),
('090112', 'Moya', '0901', '09'),
('090113', 'Nuevo Occoro', '0901', '09'),
('090114', 'Palca', '0901', '09'),
('090115', 'Pilchaca', '0901', '09'),
('090116', 'Vilca', '0901', '09'),
('090117', 'Yauli', '0901', '09'),
('090118', 'Ascensión', '0901', '09'),
('090119', 'Huando', '0901', '09'),
('090201', 'Acobamba', '0902', '09'),
('090202', 'Andabamba', '0902', '09'),
('090203', 'Anta', '0902', '09'),
('090204', 'Caja', '0902', '09'),
('090205', 'Marcas', '0902', '09'),
('090206', 'Paucara', '0902', '09'),
('090207', 'Pomacocha', '0902', '09'),
('090208', 'Rosario', '0902', '09'),
('090301', 'Lircay', '0903', '09'),
('090302', 'Anchonga', '0903', '09'),
('090303', 'Callanmarca', '0903', '09'),
('090304', 'Ccochaccasa', '0903', '09'),
('090305', 'Chincho', '0903', '09'),
('090306', 'Congalla', '0903', '09'),
('090307', 'Huanca-Huanca', '0903', '09'),
('090308', 'Huayllay Grande', '0903', '09'),
('090309', 'Julcamarca', '0903', '09'),
('090310', 'San Antonio de Antaparco', '0903', '09'),
('090311', 'Santo Tomas de Pata', '0903', '09'),
('090312', 'Secclla', '0903', '09'),
('090401', 'Castrovirreyna', '0904', '09'),
('090402', 'Arma', '0904', '09'),
('090403', 'Aurahua', '0904', '09'),
('090404', 'Capillas', '0904', '09'),
('090405', 'Chupamarca', '0904', '09'),
('090406', 'Cocas', '0904', '09'),
('090407', 'Huachos', '0904', '09'),
('090408', 'Huamatambo', '0904', '09'),
('090409', 'Mollepampa', '0904', '09'),
('090410', 'San Juan', '0904', '09'),
('090411', 'Santa Ana', '0904', '09'),
('090412', 'Tantara', '0904', '09'),
('090413', 'Ticrapo', '0904', '09'),
('090501', 'Churcampa', '0905', '09'),
('090502', 'Anco', '0905', '09'),
('090503', 'Chinchihuasi', '0905', '09'),
('090504', 'El Carmen', '0905', '09'),
('090505', 'La Merced', '0905', '09'),
('090506', 'Locroja', '0905', '09'),
('090507', 'Paucarbamba', '0905', '09'),
('090508', 'San Miguel de Mayocc', '0905', '09'),
('090509', 'San Pedro de Coris', '0905', '09'),
('090510', 'Pachamarca', '0905', '09'),
('090511', 'Cosme', '0905', '09'),
('090601', 'Huaytara', '0906', '09'),
('090602', 'Ayavi', '0906', '09'),
('090603', 'Córdova', '0906', '09'),
('090604', 'Huayacundo Arma', '0906', '09'),
('090605', 'Laramarca', '0906', '09'),
('090606', 'Ocoyo', '0906', '09'),
('090607', 'Pilpichaca', '0906', '09'),
('090608', 'Querco', '0906', '09'),
('090609', 'Quito-Arma', '0906', '09'),
('090610', 'San Antonio de Cusicancha', '0906', '09'),
('090611', 'San Francisco de Sangayaico', '0906', '09'),
('090612', 'San Isidro', '0906', '09'),
('090613', 'Santiago de Chocorvos', '0906', '09'),
('090614', 'Santiago de Quirahuara', '0906', '09'),
('090615', 'Santo Domingo de Capillas', '0906', '09'),
('090616', 'Tambo', '0906', '09'),
('090701', 'Pampas', '0907', '09'),
('090702', 'Acostambo', '0907', '09'),
('090703', 'Acraquia', '0907', '09'),
('090704', 'Ahuaycha', '0907', '09'),
('090705', 'Colcabamba', '0907', '09'),
('090706', 'Daniel Hernández', '0907', '09'),
('090707', 'Huachocolpa', '0907', '09'),
('090709', 'Huaribamba', '0907', '09'),
('090710', 'Ñahuimpuquio', '0907', '09'),
('090711', 'Pazos', '0907', '09'),
('090713', 'Quishuar', '0907', '09'),
('090714', 'Salcabamba', '0907', '09'),
('090715', 'Salcahuasi', '0907', '09'),
('090716', 'San Marcos de Rocchac', '0907', '09'),
('090717', 'Surcubamba', '0907', '09'),
('090718', 'Tintay Puncu', '0907', '09'),
('090719', 'Quichuas', '0907', '09'),
('090720', 'Andaymarca', '0907', '09'),
('090721', 'Roble', '0907', '09'),
('090722', 'Pichos', '0907', '09'),
('090723', 'Santiago de Tucuma', '0907', '09'),
('100101', 'Huanuco', '1001', '10'),
('100102', 'Amarilis', '1001', '10'),
('100103', 'Chinchao', '1001', '10'),
('100104', 'Churubamba', '1001', '10'),
('100105', 'Margos', '1001', '10'),
('100106', 'Quisqui (Kichki)', '1001', '10'),
('100107', 'San Francisco de Cayran', '1001', '10'),
('100108', 'San Pedro de Chaulan', '1001', '10'),
('100109', 'Santa María del Valle', '1001', '10'),
('100110', 'Yarumayo', '1001', '10'),
('100111', 'Pillco Marca', '1001', '10'),
('100112', 'Yacus', '1001', '10'),
('100113', 'San Pablo de Pillao', '1001', '10'),
('100201', 'Ambo', '1002', '10'),
('100202', 'Cayna', '1002', '10'),
('100203', 'Colpas', '1002', '10'),
('100204', 'Conchamarca', '1002', '10'),
('100205', 'Huacar', '1002', '10'),
('100206', 'San Francisco', '1002', '10'),
('100207', 'San Rafael', '1002', '10'),
('100208', 'Tomay Kichwa', '1002', '10'),
('100301', 'La Unión', '1003', '10'),
('100307', 'Chuquis', '1003', '10'),
('100311', 'Marías', '1003', '10'),
('100313', 'Pachas', '1003', '10'),
('100316', 'Quivilla', '1003', '10'),
('100317', 'Ripan', '1003', '10'),
('100321', 'Shunqui', '1003', '10'),
('100322', 'Sillapata', '1003', '10'),
('100323', 'Yanas', '1003', '10'),
('100401', 'Huacaybamba', '1004', '10'),
('100402', 'Canchabamba', '1004', '10'),
('100403', 'Cochabamba', '1004', '10'),
('100404', 'Pinra', '1004', '10'),
('100501', 'Llata', '1005', '10'),
('100502', 'Arancay', '1005', '10'),
('100503', 'Chavín de Pariarca', '1005', '10'),
('100504', 'Jacas Grande', '1005', '10'),
('100505', 'Jircan', '1005', '10'),
('100506', 'Miraflores', '1005', '10'),
('100507', 'Monzón', '1005', '10'),
('100508', 'Punchao', '1005', '10'),
('100509', 'Puños', '1005', '10'),
('100510', 'Singa', '1005', '10'),
('100511', 'Tantamayo', '1005', '10'),
('100601', 'Rupa-Rupa', '1006', '10'),
('100602', 'Daniel Alomía Robles', '1006', '10'),
('100603', 'Hermílio Valdizan', '1006', '10'),
('100604', 'José Crespo y Castillo', '1006', '10'),
('100605', 'Luyando', '1006', '10'),
('100606', 'Mariano Damaso Beraun', '1006', '10'),
('100607', 'Pucayacu', '1006', '10'),
('100608', 'Castillo Grande', '1006', '10'),
('100609', 'Pueblo Nuevo', '1006', '10'),
('100610', 'Santo Domingo de Anda', '1006', '10'),
('100701', 'Huacrachuco', '1007', '10'),
('100702', 'Cholon', '1007', '10'),
('100703', 'San Buenaventura', '1007', '10'),
('100704', 'La Morada', '1007', '10'),
('100705', 'Santa Rosa de Alto Yanajanca', '1007', '10'),
('100801', 'Panao', '1008', '10'),
('100802', 'Chaglla', '1008', '10'),
('100803', 'Molino', '1008', '10'),
('100804', 'Umari', '1008', '10'),
('100901', 'Puerto Inca', '1009', '10'),
('100902', 'Codo del Pozuzo', '1009', '10'),
('100903', 'Honoria', '1009', '10'),
('100904', 'Tournavista', '1009', '10'),
('100905', 'Yuyapichis', '1009', '10'),
('101001', 'Jesús', '1010', '10'),
('101002', 'Baños', '1010', '10'),
('101003', 'Jivia', '1010', '10'),
('101004', 'Queropalca', '1010', '10'),
('101005', 'Rondos', '1010', '10'),
('101006', 'San Francisco de Asís', '1010', '10'),
('101007', 'San Miguel de Cauri', '1010', '10'),
('101101', 'Chavinillo', '1011', '10'),
('101102', 'Cahuac', '1011', '10'),
('101103', 'Chacabamba', '1011', '10'),
('101104', 'Aparicio Pomares', '1011', '10'),
('101105', 'Jacas Chico', '1011', '10'),
('101106', 'Obas', '1011', '10'),
('101107', 'Pampamarca', '1011', '10'),
('101108', 'Choras', '1011', '10'),
('110101', 'Ica', '1101', '11'),
('110102', 'La Tinguiña', '1101', '11'),
('110103', 'Los Aquijes', '1101', '11'),
('110104', 'Ocucaje', '1101', '11'),
('110105', 'Pachacutec', '1101', '11'),
('110106', 'Parcona', '1101', '11'),
('110107', 'Pueblo Nuevo', '1101', '11'),
('110108', 'Salas', '1101', '11'),
('110109', 'San José de Los Molinos', '1101', '11'),
('110110', 'San Juan Bautista', '1101', '11'),
('110111', 'Santiago', '1101', '11'),
('110112', 'Subtanjalla', '1101', '11'),
('110113', 'Tate', '1101', '11'),
('110114', 'Yauca del Rosario', '1101', '11'),
('110201', 'Chincha Alta', '1102', '11'),
('110202', 'Alto Laran', '1102', '11'),
('110203', 'Chavin', '1102', '11'),
('110204', 'Chincha Baja', '1102', '11'),
('110205', 'El Carmen', '1102', '11'),
('110206', 'Grocio Prado', '1102', '11'),
('110207', 'Pueblo Nuevo', '1102', '11'),
('110208', 'San Juan de Yanac', '1102', '11'),
('110209', 'San Pedro de Huacarpana', '1102', '11'),
('110210', 'Sunampe', '1102', '11'),
('110211', 'Tambo de Mora', '1102', '11'),
('110301', 'Nasca', '1103', '11'),
('110302', 'Changuillo', '1103', '11'),
('110303', 'El Ingenio', '1103', '11'),
('110304', 'Marcona', '1103', '11'),
('110305', 'Vista Alegre', '1103', '11'),
('110401', 'Palpa', '1104', '11'),
('110402', 'Llipata', '1104', '11'),
('110403', 'Río Grande', '1104', '11'),
('110404', 'Santa Cruz', '1104', '11'),
('110405', 'Tibillo', '1104', '11'),
('110501', 'Pisco', '1105', '11'),
('110502', 'Huancano', '1105', '11'),
('110503', 'Humay', '1105', '11'),
('110504', 'Independencia', '1105', '11'),
('110505', 'Paracas', '1105', '11'),
('110506', 'San Andrés', '1105', '11'),
('110507', 'San Clemente', '1105', '11'),
('110508', 'Tupac Amaru Inca', '1105', '11'),
('120101', 'Huancayo', '1201', '12'),
('120104', 'Carhuacallanga', '1201', '12'),
('120105', 'Chacapampa', '1201', '12'),
('120106', 'Chicche', '1201', '12'),
('120107', 'Chilca', '1201', '12'),
('120108', 'Chongos Alto', '1201', '12'),
('120111', 'Chupuro', '1201', '12'),
('120112', 'Colca', '1201', '12'),
('120113', 'Cullhuas', '1201', '12'),
('120114', 'El Tambo', '1201', '12'),
('120116', 'Huacrapuquio', '1201', '12'),
('120117', 'Hualhuas', '1201', '12'),
('120119', 'Huancan', '1201', '12'),
('120120', 'Huasicancha', '1201', '12'),
('120121', 'Huayucachi', '1201', '12'),
('120122', 'Ingenio', '1201', '12'),
('120124', 'Pariahuanca', '1201', '12'),
('120125', 'Pilcomayo', '1201', '12'),
('120126', 'Pucara', '1201', '12'),
('120127', 'Quichuay', '1201', '12'),
('120128', 'Quilcas', '1201', '12'),
('120129', 'San Agustín', '1201', '12'),
('120130', 'San Jerónimo de Tunan', '1201', '12'),
('120132', 'Saño', '1201', '12'),
('120133', 'Sapallanga', '1201', '12'),
('120134', 'Sicaya', '1201', '12'),
('120135', 'Santo Domingo de Acobamba', '1201', '12'),
('120136', 'Viques', '1201', '12'),
('120201', 'Concepción', '1202', '12'),
('120202', 'Aco', '1202', '12'),
('120203', 'Andamarca', '1202', '12'),
('120204', 'Chambara', '1202', '12'),
('120205', 'Cochas', '1202', '12'),
('120206', 'Comas', '1202', '12'),
('120207', 'Heroínas Toledo', '1202', '12'),
('120208', 'Manzanares', '1202', '12'),
('120209', 'Mariscal Castilla', '1202', '12'),
('120210', 'Matahuasi', '1202', '12'),
('120211', 'Mito', '1202', '12'),
('120212', 'Nueve de Julio', '1202', '12'),
('120213', 'Orcotuna', '1202', '12'),
('120214', 'San José de Quero', '1202', '12'),
('120215', 'Santa Rosa de Ocopa', '1202', '12'),
('120301', 'Chanchamayo', '1203', '12'),
('120302', 'Perene', '1203', '12'),
('120303', 'Pichanaqui', '1203', '12'),
('120304', 'San Luis de Shuaro', '1203', '12'),
('120305', 'San Ramón', '1203', '12'),
('120306', 'Vitoc', '1203', '12'),
('120401', 'Jauja', '1204', '12'),
('120402', 'Acolla', '1204', '12'),
('120403', 'Apata', '1204', '12'),
('120404', 'Ataura', '1204', '12'),
('120405', 'Canchayllo', '1204', '12'),
('120406', 'Curicaca', '1204', '12'),
('120407', 'El Mantaro', '1204', '12'),
('120408', 'Huamali', '1204', '12'),
('120409', 'Huaripampa', '1204', '12'),
('120410', 'Huertas', '1204', '12'),
('120411', 'Janjaillo', '1204', '12'),
('120412', 'Julcán', '1204', '12'),
('120413', 'Leonor Ordóñez', '1204', '12'),
('120414', 'Llocllapampa', '1204', '12'),
('120415', 'Marco', '1204', '12'),
('120416', 'Masma', '1204', '12'),
('120417', 'Masma Chicche', '1204', '12'),
('120418', 'Molinos', '1204', '12'),
('120419', 'Monobamba', '1204', '12'),
('120420', 'Muqui', '1204', '12'),
('120421', 'Muquiyauyo', '1204', '12'),
('120422', 'Paca', '1204', '12'),
('120423', 'Paccha', '1204', '12'),
('120424', 'Pancan', '1204', '12'),
('120425', 'Parco', '1204', '12'),
('120426', 'Pomacancha', '1204', '12'),
('120427', 'Ricran', '1204', '12'),
('120428', 'San Lorenzo', '1204', '12'),
('120429', 'San Pedro de Chunan', '1204', '12'),
('120430', 'Sausa', '1204', '12'),
('120431', 'Sincos', '1204', '12'),
('120432', 'Tunan Marca', '1204', '12'),
('120433', 'Yauli', '1204', '12'),
('120434', 'Yauyos', '1204', '12'),
('120501', 'Junin', '1205', '12'),
('120502', 'Carhuamayo', '1205', '12'),
('120503', 'Ondores', '1205', '12'),
('120504', 'Ulcumayo', '1205', '12'),
('120601', 'Satipo', '1206', '12'),
('120602', 'Coviriali', '1206', '12'),
('120603', 'Llaylla', '1206', '12'),
('120604', 'Mazamari', '1206', '12'),
('120605', 'Pampa Hermosa', '1206', '12'),
('120606', 'Pangoa', '1206', '12'),
('120607', 'Río Negro', '1206', '12'),
('120608', 'Río Tambo', '1206', '12'),
('120609', 'Vizcatan del Ene', '1206', '12'),
('120701', 'Tarma', '1207', '12'),
('120702', 'Acobamba', '1207', '12'),
('120703', 'Huaricolca', '1207', '12'),
('120704', 'Huasahuasi', '1207', '12'),
('120705', 'La Unión', '1207', '12'),
('120706', 'Palca', '1207', '12'),
('120707', 'Palcamayo', '1207', '12'),
('120708', 'San Pedro de Cajas', '1207', '12'),
('120709', 'Tapo', '1207', '12'),
('120801', 'La Oroya', '1208', '12'),
('120802', 'Chacapalpa', '1208', '12'),
('120803', 'Huay-Huay', '1208', '12'),
('120804', 'Marcapomacocha', '1208', '12'),
('120805', 'Morococha', '1208', '12'),
('120806', 'Paccha', '1208', '12'),
('120807', 'Santa Bárbara de Carhuacayan', '1208', '12'),
('120808', 'Santa Rosa de Sacco', '1208', '12'),
('120809', 'Suitucancha', '1208', '12'),
('120810', 'Yauli', '1208', '12'),
('120901', 'Chupaca', '1209', '12'),
('120902', 'Ahuac', '1209', '12'),
('120903', 'Chongos Bajo', '1209', '12'),
('120904', 'Huachac', '1209', '12'),
('120905', 'Huamancaca Chico', '1209', '12'),
('120906', 'San Juan de Iscos', '1209', '12'),
('120907', 'San Juan de Jarpa', '1209', '12'),
('120908', 'Tres de Diciembre', '1209', '12'),
('120909', 'Yanacancha', '1209', '12'),
('130101', 'Trujillo', '1301', '13'),
('130102', 'El Porvenir', '1301', '13'),
('130103', 'Florencia de Mora', '1301', '13'),
('130104', 'Huanchaco', '1301', '13'),
('130105', 'La Esperanza', '1301', '13'),
('130106', 'Laredo', '1301', '13'),
('130107', 'Moche', '1301', '13'),
('130108', 'Poroto', '1301', '13'),
('130109', 'Salaverry', '1301', '13'),
('130110', 'Simbal', '1301', '13'),
('130111', 'Victor Larco Herrera', '1301', '13'),
('130201', 'Ascope', '1302', '13'),
('130202', 'Chicama', '1302', '13'),
('130203', 'Chocope', '1302', '13'),
('130204', 'Magdalena de Cao', '1302', '13'),
('130205', 'Paijan', '1302', '13'),
('130206', 'Rázuri', '1302', '13'),
('130207', 'Santiago de Cao', '1302', '13'),
('130208', 'Casa Grande', '1302', '13'),
('130301', 'Bolívar', '1303', '13'),
('130302', 'Bambamarca', '1303', '13'),
('130303', 'Condormarca', '1303', '13'),
('130304', 'Longotea', '1303', '13'),
('130305', 'Uchumarca', '1303', '13'),
('130306', 'Ucuncha', '1303', '13'),
('130401', 'Chepen', '1304', '13'),
('130402', 'Pacanga', '1304', '13'),
('130403', 'Pueblo Nuevo', '1304', '13'),
('130501', 'Julcan', '1305', '13'),
('130502', 'Calamarca', '1305', '13'),
('130503', 'Carabamba', '1305', '13'),
('130504', 'Huaso', '1305', '13'),
('130601', 'Otuzco', '1306', '13'),
('130602', 'Agallpampa', '1306', '13'),
('130604', 'Charat', '1306', '13'),
('130605', 'Huaranchal', '1306', '13'),
('130606', 'La Cuesta', '1306', '13'),
('130608', 'Mache', '1306', '13'),
('130610', 'Paranday', '1306', '13'),
('130611', 'Salpo', '1306', '13'),
('130613', 'Sinsicap', '1306', '13'),
('130614', 'Usquil', '1306', '13'),
('130701', 'San Pedro de Lloc', '1307', '13'),
('130702', 'Guadalupe', '1307', '13'),
('130703', 'Jequetepeque', '1307', '13'),
('130704', 'Pacasmayo', '1307', '13'),
('130705', 'San José', '1307', '13'),
('130801', 'Tayabamba', '1308', '13'),
('130802', 'Buldibuyo', '1308', '13'),
('130803', 'Chillia', '1308', '13'),
('130804', 'Huancaspata', '1308', '13'),
('130805', 'Huaylillas', '1308', '13'),
('130806', 'Huayo', '1308', '13'),
('130807', 'Ongon', '1308', '13'),
('130808', 'Parcoy', '1308', '13'),
('130809', 'Pataz', '1308', '13'),
('130810', 'Pias', '1308', '13'),
('130811', 'Santiago de Challas', '1308', '13'),
('130812', 'Taurija', '1308', '13'),
('130813', 'Urpay', '1308', '13'),
('130901', 'Huamachuco', '1309', '13'),
('130902', 'Chugay', '1309', '13'),
('130903', 'Cochorco', '1309', '13'),
('130904', 'Curgos', '1309', '13'),
('130905', 'Marcabal', '1309', '13'),
('130906', 'Sanagoran', '1309', '13'),
('130907', 'Sarin', '1309', '13'),
('130908', 'Sartimbamba', '1309', '13'),
('131001', 'Santiago de Chuco', '1310', '13'),
('131002', 'Angasmarca', '1310', '13'),
('131003', 'Cachicadan', '1310', '13'),
('131004', 'Mollebamba', '1310', '13'),
('131005', 'Mollepata', '1310', '13'),
('131006', 'Quiruvilca', '1310', '13'),
('131007', 'Santa Cruz de Chuca', '1310', '13'),
('131008', 'Sitabamba', '1310', '13'),
('131101', 'Cascas', '1311', '13'),
('131102', 'Lucma', '1311', '13'),
('131103', 'Marmot', '1311', '13'),
('131104', 'Sayapullo', '1311', '13'),
('131201', 'Viru', '1312', '13'),
('131202', 'Chao', '1312', '13'),
('131203', 'Guadalupito', '1312', '13'),
('140101', 'Chiclayo', '1401', '14'),
('140102', 'Chongoyape', '1401', '14'),
('140103', 'Eten', '1401', '14'),
('140104', 'Eten Puerto', '1401', '14'),
('140105', 'José Leonardo Ortiz', '1401', '14'),
('140106', 'La Victoria', '1401', '14'),
('140107', 'Lagunas', '1401', '14'),
('140108', 'Monsefu', '1401', '14'),
('140109', 'Nueva Arica', '1401', '14'),
('140110', 'Oyotun', '1401', '14'),
('140111', 'Picsi', '1401', '14'),
('140112', 'Pimentel', '1401', '14'),
('140113', 'Reque', '1401', '14'),
('140114', 'Santa Rosa', '1401', '14'),
('140115', 'Saña', '1401', '14'),
('140116', 'Cayalti', '1401', '14'),
('140117', 'Patapo', '1401', '14'),
('140118', 'Pomalca', '1401', '14'),
('140119', 'Pucala', '1401', '14'),
('140120', 'Tuman', '1401', '14'),
('140201', 'Ferreñafe', '1402', '14'),
('140202', 'Cañaris', '1402', '14'),
('140203', 'Incahuasi', '1402', '14'),
('140204', 'Manuel Antonio Mesones Muro', '1402', '14'),
('140205', 'Pitipo', '1402', '14'),
('140206', 'Pueblo Nuevo', '1402', '14'),
('140301', 'Lambayeque', '1403', '14'),
('140302', 'Chochope', '1403', '14'),
('140303', 'Illimo', '1403', '14'),
('140304', 'Jayanca', '1403', '14'),
('140305', 'Mochumi', '1403', '14'),
('140306', 'Morrope', '1403', '14'),
('140307', 'Motupe', '1403', '14'),
('140308', 'Olmos', '1403', '14'),
('140309', 'Pacora', '1403', '14'),
('140310', 'Salas', '1403', '14'),
('140311', 'San José', '1403', '14'),
('140312', 'Tucume', '1403', '14'),
('150101', 'Lima', '1501', '15'),
('150102', 'Ancón', '1501', '15'),
('150103', 'Ate', '1501', '15'),
('150104', 'Barranco', '1501', '15'),
('150105', 'Breña', '1501', '15'),
('150106', 'Carabayllo', '1501', '15'),
('150107', 'Chaclacayo', '1501', '15'),
('150108', 'Chorrillos', '1501', '15'),
('150109', 'Cieneguilla', '1501', '15'),
('150110', 'Comas', '1501', '15'),
('150111', 'El Agustino', '1501', '15'),
('150112', 'Independencia', '1501', '15'),
('150113', 'Jesús María', '1501', '15'),
('150114', 'La Molina', '1501', '15'),
('150115', 'La Victoria', '1501', '15'),
('150116', 'Lince', '1501', '15'),
('150117', 'Los Olivos', '1501', '15'),
('150118', 'Lurigancho', '1501', '15'),
('150119', 'Lurin', '1501', '15'),
('150120', 'Magdalena del Mar', '1501', '15'),
('150121', 'Pueblo Libre', '1501', '15'),
('150122', 'Miraflores', '1501', '15'),
('150123', 'Pachacamac', '1501', '15'),
('150124', 'Pucusana', '1501', '15'),
('150125', 'Puente Piedra', '1501', '15'),
('150126', 'Punta Hermosa', '1501', '15'),
('150127', 'Punta Negra', '1501', '15'),
('150128', 'Rímac', '1501', '15'),
('150129', 'San Bartolo', '1501', '15'),
('150130', 'San Borja', '1501', '15'),
('150131', 'San Isidro', '1501', '15'),
('150132', 'San Juan de Lurigancho', '1501', '15'),
('150133', 'San Juan de Miraflores', '1501', '15'),
('150134', 'San Luis', '1501', '15'),
('150135', 'San Martín de Porres', '1501', '15'),
('150136', 'San Miguel', '1501', '15'),
('150137', 'Santa Anita', '1501', '15'),
('150138', 'Santa María del Mar', '1501', '15'),
('150139', 'Santa Rosa', '1501', '15'),
('150140', 'Santiago de Surco', '1501', '15'),
('150141', 'Surquillo', '1501', '15'),
('150142', 'Villa El Salvador', '1501', '15'),
('150143', 'Villa María del Triunfo', '1501', '15'),
('150201', 'Barranca', '1502', '15'),
('150202', 'Paramonga', '1502', '15'),
('150203', 'Pativilca', '1502', '15'),
('150204', 'Supe', '1502', '15'),
('150205', 'Supe Puerto', '1502', '15'),
('150301', 'Cajatambo', '1503', '15'),
('150302', 'Copa', '1503', '15'),
('150303', 'Gorgor', '1503', '15'),
('150304', 'Huancapon', '1503', '15'),
('150305', 'Manas', '1503', '15'),
('150401', 'Canta', '1504', '15'),
('150402', 'Arahuay', '1504', '15'),
('150403', 'Huamantanga', '1504', '15'),
('150404', 'Huaros', '1504', '15'),
('150405', 'Lachaqui', '1504', '15'),
('150406', 'San Buenaventura', '1504', '15'),
('150407', 'Santa Rosa de Quives', '1504', '15');
INSERT INTO `ubigeo_peru_districts` (`id`, `name`, `province_id`, `department_id`) VALUES
('150501', 'San Vicente de Cañete', '1505', '15'),
('150502', 'Asia', '1505', '15'),
('150503', 'Calango', '1505', '15'),
('150504', 'Cerro Azul', '1505', '15'),
('150505', 'Chilca', '1505', '15'),
('150506', 'Coayllo', '1505', '15'),
('150507', 'Imperial', '1505', '15'),
('150508', 'Lunahuana', '1505', '15'),
('150509', 'Mala', '1505', '15'),
('150510', 'Nuevo Imperial', '1505', '15'),
('150511', 'Pacaran', '1505', '15'),
('150512', 'Quilmana', '1505', '15'),
('150513', 'San Antonio', '1505', '15'),
('150514', 'San Luis', '1505', '15'),
('150515', 'Santa Cruz de Flores', '1505', '15'),
('150516', 'Zúñiga', '1505', '15'),
('150601', 'Huaral', '1506', '15'),
('150602', 'Atavillos Alto', '1506', '15'),
('150603', 'Atavillos Bajo', '1506', '15'),
('150604', 'Aucallama', '1506', '15'),
('150605', 'Chancay', '1506', '15'),
('150606', 'Ihuari', '1506', '15'),
('150607', 'Lampian', '1506', '15'),
('150608', 'Pacaraos', '1506', '15'),
('150609', 'San Miguel de Acos', '1506', '15'),
('150610', 'Santa Cruz de Andamarca', '1506', '15'),
('150611', 'Sumbilca', '1506', '15'),
('150612', 'Veintisiete de Noviembre', '1506', '15'),
('150701', 'Matucana', '1507', '15'),
('150702', 'Antioquia', '1507', '15'),
('150703', 'Callahuanca', '1507', '15'),
('150704', 'Carampoma', '1507', '15'),
('150705', 'Chicla', '1507', '15'),
('150706', 'Cuenca', '1507', '15'),
('150707', 'Huachupampa', '1507', '15'),
('150708', 'Huanza', '1507', '15'),
('150709', 'Huarochiri', '1507', '15'),
('150710', 'Lahuaytambo', '1507', '15'),
('150711', 'Langa', '1507', '15'),
('150712', 'Laraos', '1507', '15'),
('150713', 'Mariatana', '1507', '15'),
('150714', 'Ricardo Palma', '1507', '15'),
('150715', 'San Andrés de Tupicocha', '1507', '15'),
('150716', 'San Antonio', '1507', '15'),
('150717', 'San Bartolomé', '1507', '15'),
('150718', 'San Damian', '1507', '15'),
('150719', 'San Juan de Iris', '1507', '15'),
('150720', 'San Juan de Tantaranche', '1507', '15'),
('150721', 'San Lorenzo de Quinti', '1507', '15'),
('150722', 'San Mateo', '1507', '15'),
('150723', 'San Mateo de Otao', '1507', '15'),
('150724', 'San Pedro de Casta', '1507', '15'),
('150725', 'San Pedro de Huancayre', '1507', '15'),
('150726', 'Sangallaya', '1507', '15'),
('150727', 'Santa Cruz de Cocachacra', '1507', '15'),
('150728', 'Santa Eulalia', '1507', '15'),
('150729', 'Santiago de Anchucaya', '1507', '15'),
('150730', 'Santiago de Tuna', '1507', '15'),
('150731', 'Santo Domingo de Los Olleros', '1507', '15'),
('150732', 'Surco', '1507', '15'),
('150801', 'Huacho', '1508', '15'),
('150802', 'Ambar', '1508', '15'),
('150803', 'Caleta de Carquin', '1508', '15'),
('150804', 'Checras', '1508', '15'),
('150805', 'Hualmay', '1508', '15'),
('150806', 'Huaura', '1508', '15'),
('150807', 'Leoncio Prado', '1508', '15'),
('150808', 'Paccho', '1508', '15'),
('150809', 'Santa Leonor', '1508', '15'),
('150810', 'Santa María', '1508', '15'),
('150811', 'Sayan', '1508', '15'),
('150812', 'Vegueta', '1508', '15'),
('150901', 'Oyon', '1509', '15'),
('150902', 'Andajes', '1509', '15'),
('150903', 'Caujul', '1509', '15'),
('150904', 'Cochamarca', '1509', '15'),
('150905', 'Navan', '1509', '15'),
('150906', 'Pachangara', '1509', '15'),
('151001', 'Yauyos', '1510', '15'),
('151002', 'Alis', '1510', '15'),
('151003', 'Allauca', '1510', '15'),
('151004', 'Ayaviri', '1510', '15'),
('151005', 'Azángaro', '1510', '15'),
('151006', 'Cacra', '1510', '15'),
('151007', 'Carania', '1510', '15'),
('151008', 'Catahuasi', '1510', '15'),
('151009', 'Chocos', '1510', '15'),
('151010', 'Cochas', '1510', '15'),
('151011', 'Colonia', '1510', '15'),
('151012', 'Hongos', '1510', '15'),
('151013', 'Huampara', '1510', '15'),
('151014', 'Huancaya', '1510', '15'),
('151015', 'Huangascar', '1510', '15'),
('151016', 'Huantan', '1510', '15'),
('151017', 'Huañec', '1510', '15'),
('151018', 'Laraos', '1510', '15'),
('151019', 'Lincha', '1510', '15'),
('151020', 'Madean', '1510', '15'),
('151021', 'Miraflores', '1510', '15'),
('151022', 'Omas', '1510', '15'),
('151023', 'Putinza', '1510', '15'),
('151024', 'Quinches', '1510', '15'),
('151025', 'Quinocay', '1510', '15'),
('151026', 'San Joaquín', '1510', '15'),
('151027', 'San Pedro de Pilas', '1510', '15'),
('151028', 'Tanta', '1510', '15'),
('151029', 'Tauripampa', '1510', '15'),
('151030', 'Tomas', '1510', '15'),
('151031', 'Tupe', '1510', '15'),
('151032', 'Viñac', '1510', '15'),
('151033', 'Vitis', '1510', '15'),
('160101', 'Iquitos', '1601', '16'),
('160102', 'Alto Nanay', '1601', '16'),
('160103', 'Fernando Lores', '1601', '16'),
('160104', 'Indiana', '1601', '16'),
('160105', 'Las Amazonas', '1601', '16'),
('160106', 'Mazan', '1601', '16'),
('160107', 'Napo', '1601', '16'),
('160108', 'Punchana', '1601', '16'),
('160110', 'Torres Causana', '1601', '16'),
('160112', 'Belén', '1601', '16'),
('160113', 'San Juan Bautista', '1601', '16'),
('160201', 'Yurimaguas', '1602', '16'),
('160202', 'Balsapuerto', '1602', '16'),
('160205', 'Jeberos', '1602', '16'),
('160206', 'Lagunas', '1602', '16'),
('160210', 'Santa Cruz', '1602', '16'),
('160211', 'Teniente Cesar López Rojas', '1602', '16'),
('160301', 'Nauta', '1603', '16'),
('160302', 'Parinari', '1603', '16'),
('160303', 'Tigre', '1603', '16'),
('160304', 'Trompeteros', '1603', '16'),
('160305', 'Urarinas', '1603', '16'),
('160401', 'Ramón Castilla', '1604', '16'),
('160402', 'Pebas', '1604', '16'),
('160403', 'Yavari', '1604', '16'),
('160404', 'San Pablo', '1604', '16'),
('160501', 'Requena', '1605', '16'),
('160502', 'Alto Tapiche', '1605', '16'),
('160503', 'Capelo', '1605', '16'),
('160504', 'Emilio San Martín', '1605', '16'),
('160505', 'Maquia', '1605', '16'),
('160506', 'Puinahua', '1605', '16'),
('160507', 'Saquena', '1605', '16'),
('160508', 'Soplin', '1605', '16'),
('160509', 'Tapiche', '1605', '16'),
('160510', 'Jenaro Herrera', '1605', '16'),
('160511', 'Yaquerana', '1605', '16'),
('160601', 'Contamana', '1606', '16'),
('160602', 'Inahuaya', '1606', '16'),
('160603', 'Padre Márquez', '1606', '16'),
('160604', 'Pampa Hermosa', '1606', '16'),
('160605', 'Sarayacu', '1606', '16'),
('160606', 'Vargas Guerra', '1606', '16'),
('160701', 'Barranca', '1607', '16'),
('160702', 'Cahuapanas', '1607', '16'),
('160703', 'Manseriche', '1607', '16'),
('160704', 'Morona', '1607', '16'),
('160705', 'Pastaza', '1607', '16'),
('160706', 'Andoas', '1607', '16'),
('160801', 'Putumayo', '1608', '16'),
('160802', 'Rosa Panduro', '1608', '16'),
('160803', 'Teniente Manuel Clavero', '1608', '16'),
('160804', 'Yaguas', '1608', '16'),
('170101', 'Tambopata', '1701', '17'),
('170102', 'Inambari', '1701', '17'),
('170103', 'Las Piedras', '1701', '17'),
('170104', 'Laberinto', '1701', '17'),
('170201', 'Manu', '1702', '17'),
('170202', 'Fitzcarrald', '1702', '17'),
('170203', 'Madre de Dios', '1702', '17'),
('170204', 'Huepetuhe', '1702', '17'),
('170301', 'Iñapari', '1703', '17'),
('170302', 'Iberia', '1703', '17'),
('170303', 'Tahuamanu', '1703', '17'),
('180101', 'Moquegua', '1801', '18'),
('180102', 'Carumas', '1801', '18'),
('180103', 'Cuchumbaya', '1801', '18'),
('180104', 'Samegua', '1801', '18'),
('180105', 'San Cristóbal', '1801', '18'),
('180106', 'Torata', '1801', '18'),
('180201', 'Omate', '1802', '18'),
('180202', 'Chojata', '1802', '18'),
('180203', 'Coalaque', '1802', '18'),
('180204', 'Ichuña', '1802', '18'),
('180205', 'La Capilla', '1802', '18'),
('180206', 'Lloque', '1802', '18'),
('180207', 'Matalaque', '1802', '18'),
('180208', 'Puquina', '1802', '18'),
('180209', 'Quinistaquillas', '1802', '18'),
('180210', 'Ubinas', '1802', '18'),
('180211', 'Yunga', '1802', '18'),
('180301', 'Ilo', '1803', '18'),
('180302', 'El Algarrobal', '1803', '18'),
('180303', 'Pacocha', '1803', '18'),
('190101', 'Chaupimarca', '1901', '19'),
('190102', 'Huachon', '1901', '19'),
('190103', 'Huariaca', '1901', '19'),
('190104', 'Huayllay', '1901', '19'),
('190105', 'Ninacaca', '1901', '19'),
('190106', 'Pallanchacra', '1901', '19'),
('190107', 'Paucartambo', '1901', '19'),
('190108', 'San Francisco de Asís de Yarusyacan', '1901', '19'),
('190109', 'Simon Bolívar', '1901', '19'),
('190110', 'Ticlacayan', '1901', '19'),
('190111', 'Tinyahuarco', '1901', '19'),
('190112', 'Vicco', '1901', '19'),
('190113', 'Yanacancha', '1901', '19'),
('190201', 'Yanahuanca', '1902', '19'),
('190202', 'Chacayan', '1902', '19'),
('190203', 'Goyllarisquizga', '1902', '19'),
('190204', 'Paucar', '1902', '19'),
('190205', 'San Pedro de Pillao', '1902', '19'),
('190206', 'Santa Ana de Tusi', '1902', '19'),
('190207', 'Tapuc', '1902', '19'),
('190208', 'Vilcabamba', '1902', '19'),
('190301', 'Oxapampa', '1903', '19'),
('190302', 'Chontabamba', '1903', '19'),
('190303', 'Huancabamba', '1903', '19'),
('190304', 'Palcazu', '1903', '19'),
('190305', 'Pozuzo', '1903', '19'),
('190306', 'Puerto Bermúdez', '1903', '19'),
('190307', 'Villa Rica', '1903', '19'),
('190308', 'Constitución', '1903', '19'),
('200101', 'Piura', '2001', '20'),
('200104', 'Castilla', '2001', '20'),
('200105', 'Catacaos', '2001', '20'),
('200107', 'Cura Mori', '2001', '20'),
('200108', 'El Tallan', '2001', '20'),
('200109', 'La Arena', '2001', '20'),
('200110', 'La Unión', '2001', '20'),
('200111', 'Las Lomas', '2001', '20'),
('200114', 'Tambo Grande', '2001', '20'),
('200115', 'Veintiseis de Octubre', '2001', '20'),
('200201', 'Ayabaca', '2002', '20'),
('200202', 'Frias', '2002', '20'),
('200203', 'Jilili', '2002', '20'),
('200204', 'Lagunas', '2002', '20'),
('200205', 'Montero', '2002', '20'),
('200206', 'Pacaipampa', '2002', '20'),
('200207', 'Paimas', '2002', '20'),
('200208', 'Sapillica', '2002', '20'),
('200209', 'Sicchez', '2002', '20'),
('200210', 'Suyo', '2002', '20'),
('200301', 'Huancabamba', '2003', '20'),
('200302', 'Canchaque', '2003', '20'),
('200303', 'El Carmen de la Frontera', '2003', '20'),
('200304', 'Huarmaca', '2003', '20'),
('200305', 'Lalaquiz', '2003', '20'),
('200306', 'San Miguel de El Faique', '2003', '20'),
('200307', 'Sondor', '2003', '20'),
('200308', 'Sondorillo', '2003', '20'),
('200401', 'Chulucanas', '2004', '20'),
('200402', 'Buenos Aires', '2004', '20'),
('200403', 'Chalaco', '2004', '20'),
('200404', 'La Matanza', '2004', '20'),
('200405', 'Morropon', '2004', '20'),
('200406', 'Salitral', '2004', '20'),
('200407', 'San Juan de Bigote', '2004', '20'),
('200408', 'Santa Catalina de Mossa', '2004', '20'),
('200409', 'Santo Domingo', '2004', '20'),
('200410', 'Yamango', '2004', '20'),
('200501', 'Paita', '2005', '20'),
('200502', 'Amotape', '2005', '20'),
('200503', 'Arenal', '2005', '20'),
('200504', 'Colan', '2005', '20'),
('200505', 'La Huaca', '2005', '20'),
('200506', 'Tamarindo', '2005', '20'),
('200507', 'Vichayal', '2005', '20'),
('200601', 'Sullana', '2006', '20'),
('200602', 'Bellavista', '2006', '20'),
('200603', 'Ignacio Escudero', '2006', '20'),
('200604', 'Lancones', '2006', '20'),
('200605', 'Marcavelica', '2006', '20'),
('200606', 'Miguel Checa', '2006', '20'),
('200607', 'Querecotillo', '2006', '20'),
('200608', 'Salitral', '2006', '20'),
('200701', 'Pariñas', '2007', '20'),
('200702', 'El Alto', '2007', '20'),
('200703', 'La Brea', '2007', '20'),
('200704', 'Lobitos', '2007', '20'),
('200705', 'Los Organos', '2007', '20'),
('200706', 'Mancora', '2007', '20'),
('200801', 'Sechura', '2008', '20'),
('200802', 'Bellavista de la Unión', '2008', '20'),
('200803', 'Bernal', '2008', '20'),
('200804', 'Cristo Nos Valga', '2008', '20'),
('200805', 'Vice', '2008', '20'),
('200806', 'Rinconada Llicuar', '2008', '20'),
('210101', 'Puno', '2101', '21'),
('210102', 'Acora', '2101', '21'),
('210103', 'Amantani', '2101', '21'),
('210104', 'Atuncolla', '2101', '21'),
('210105', 'Capachica', '2101', '21'),
('210106', 'Chucuito', '2101', '21'),
('210107', 'Coata', '2101', '21'),
('210108', 'Huata', '2101', '21'),
('210109', 'Mañazo', '2101', '21'),
('210110', 'Paucarcolla', '2101', '21'),
('210111', 'Pichacani', '2101', '21'),
('210112', 'Plateria', '2101', '21'),
('210113', 'San Antonio', '2101', '21'),
('210114', 'Tiquillaca', '2101', '21'),
('210115', 'Vilque', '2101', '21'),
('210201', 'Azángaro', '2102', '21'),
('210202', 'Achaya', '2102', '21'),
('210203', 'Arapa', '2102', '21'),
('210204', 'Asillo', '2102', '21'),
('210205', 'Caminaca', '2102', '21'),
('210206', 'Chupa', '2102', '21'),
('210207', 'José Domingo Choquehuanca', '2102', '21'),
('210208', 'Muñani', '2102', '21'),
('210209', 'Potoni', '2102', '21'),
('210210', 'Saman', '2102', '21'),
('210211', 'San Anton', '2102', '21'),
('210212', 'San José', '2102', '21'),
('210213', 'San Juan de Salinas', '2102', '21'),
('210214', 'Santiago de Pupuja', '2102', '21'),
('210215', 'Tirapata', '2102', '21'),
('210301', 'Macusani', '2103', '21'),
('210302', 'Ajoyani', '2103', '21'),
('210303', 'Ayapata', '2103', '21'),
('210304', 'Coasa', '2103', '21'),
('210305', 'Corani', '2103', '21'),
('210306', 'Crucero', '2103', '21'),
('210307', 'Ituata', '2103', '21'),
('210308', 'Ollachea', '2103', '21'),
('210309', 'San Gaban', '2103', '21'),
('210310', 'Usicayos', '2103', '21'),
('210401', 'Juli', '2104', '21'),
('210402', 'Desaguadero', '2104', '21'),
('210403', 'Huacullani', '2104', '21'),
('210404', 'Kelluyo', '2104', '21'),
('210405', 'Pisacoma', '2104', '21'),
('210406', 'Pomata', '2104', '21'),
('210407', 'Zepita', '2104', '21'),
('210501', 'Ilave', '2105', '21'),
('210502', 'Capazo', '2105', '21'),
('210503', 'Pilcuyo', '2105', '21'),
('210504', 'Santa Rosa', '2105', '21'),
('210505', 'Conduriri', '2105', '21'),
('210601', 'Huancane', '2106', '21'),
('210602', 'Cojata', '2106', '21'),
('210603', 'Huatasani', '2106', '21'),
('210604', 'Inchupalla', '2106', '21'),
('210605', 'Pusi', '2106', '21'),
('210606', 'Rosaspata', '2106', '21'),
('210607', 'Taraco', '2106', '21'),
('210608', 'Vilque Chico', '2106', '21'),
('210701', 'Lampa', '2107', '21'),
('210702', 'Cabanilla', '2107', '21'),
('210703', 'Calapuja', '2107', '21'),
('210704', 'Nicasio', '2107', '21'),
('210705', 'Ocuviri', '2107', '21'),
('210706', 'Palca', '2107', '21'),
('210707', 'Paratia', '2107', '21'),
('210708', 'Pucara', '2107', '21'),
('210709', 'Santa Lucia', '2107', '21'),
('210710', 'Vilavila', '2107', '21'),
('210801', 'Ayaviri', '2108', '21'),
('210802', 'Antauta', '2108', '21'),
('210803', 'Cupi', '2108', '21'),
('210804', 'Llalli', '2108', '21'),
('210805', 'Macari', '2108', '21'),
('210806', 'Nuñoa', '2108', '21'),
('210807', 'Orurillo', '2108', '21'),
('210808', 'Santa Rosa', '2108', '21'),
('210809', 'Umachiri', '2108', '21'),
('210901', 'Moho', '2109', '21'),
('210902', 'Conima', '2109', '21'),
('210903', 'Huayrapata', '2109', '21'),
('210904', 'Tilali', '2109', '21'),
('211001', 'Putina', '2110', '21'),
('211002', 'Ananea', '2110', '21'),
('211003', 'Pedro Vilca Apaza', '2110', '21'),
('211004', 'Quilcapuncu', '2110', '21'),
('211005', 'Sina', '2110', '21'),
('211101', 'Juliaca', '2111', '21'),
('211102', 'Cabana', '2111', '21'),
('211103', 'Cabanillas', '2111', '21'),
('211104', 'Caracoto', '2111', '21'),
('211105', 'San Miguel', '2111', '21'),
('211201', 'Sandia', '2112', '21'),
('211202', 'Cuyocuyo', '2112', '21'),
('211203', 'Limbani', '2112', '21'),
('211204', 'Patambuco', '2112', '21'),
('211205', 'Phara', '2112', '21'),
('211206', 'Quiaca', '2112', '21'),
('211207', 'San Juan del Oro', '2112', '21'),
('211208', 'Yanahuaya', '2112', '21'),
('211209', 'Alto Inambari', '2112', '21'),
('211210', 'San Pedro de Putina Punco', '2112', '21'),
('211301', 'Yunguyo', '2113', '21'),
('211302', 'Anapia', '2113', '21'),
('211303', 'Copani', '2113', '21'),
('211304', 'Cuturapi', '2113', '21'),
('211305', 'Ollaraya', '2113', '21'),
('211306', 'Tinicachi', '2113', '21'),
('211307', 'Unicachi', '2113', '21'),
('220101', 'Moyobamba', '2201', '22'),
('220102', 'Calzada', '2201', '22'),
('220103', 'Habana', '2201', '22'),
('220104', 'Jepelacio', '2201', '22'),
('220105', 'Soritor', '2201', '22'),
('220106', 'Yantalo', '2201', '22'),
('220201', 'Bellavista', '2202', '22'),
('220202', 'Alto Biavo', '2202', '22'),
('220203', 'Bajo Biavo', '2202', '22'),
('220204', 'Huallaga', '2202', '22'),
('220205', 'San Pablo', '2202', '22'),
('220206', 'San Rafael', '2202', '22'),
('220301', 'San José de Sisa', '2203', '22'),
('220302', 'Agua Blanca', '2203', '22'),
('220303', 'San Martín', '2203', '22'),
('220304', 'Santa Rosa', '2203', '22'),
('220305', 'Shatoja', '2203', '22'),
('220401', 'Saposoa', '2204', '22'),
('220402', 'Alto Saposoa', '2204', '22'),
('220403', 'El Eslabón', '2204', '22'),
('220404', 'Piscoyacu', '2204', '22'),
('220405', 'Sacanche', '2204', '22'),
('220406', 'Tingo de Saposoa', '2204', '22'),
('220501', 'Lamas', '2205', '22'),
('220502', 'Alonso de Alvarado', '2205', '22'),
('220503', 'Barranquita', '2205', '22'),
('220504', 'Caynarachi', '2205', '22'),
('220505', 'Cuñumbuqui', '2205', '22'),
('220506', 'Pinto Recodo', '2205', '22'),
('220507', 'Rumisapa', '2205', '22'),
('220508', 'San Roque de Cumbaza', '2205', '22'),
('220509', 'Shanao', '2205', '22'),
('220510', 'Tabalosos', '2205', '22'),
('220511', 'Zapatero', '2205', '22'),
('220601', 'Juanjuí', '2206', '22'),
('220602', 'Campanilla', '2206', '22'),
('220603', 'Huicungo', '2206', '22'),
('220604', 'Pachiza', '2206', '22'),
('220605', 'Pajarillo', '2206', '22'),
('220701', 'Picota', '2207', '22'),
('220702', 'Buenos Aires', '2207', '22'),
('220703', 'Caspisapa', '2207', '22'),
('220704', 'Pilluana', '2207', '22'),
('220705', 'Pucacaca', '2207', '22'),
('220706', 'San Cristóbal', '2207', '22'),
('220707', 'San Hilarión', '2207', '22'),
('220708', 'Shamboyacu', '2207', '22'),
('220709', 'Tingo de Ponasa', '2207', '22'),
('220710', 'Tres Unidos', '2207', '22'),
('220801', 'Rioja', '2208', '22'),
('220802', 'Awajun', '2208', '22'),
('220803', 'Elías Soplin Vargas', '2208', '22'),
('220804', 'Nueva Cajamarca', '2208', '22'),
('220805', 'Pardo Miguel', '2208', '22'),
('220806', 'Posic', '2208', '22'),
('220807', 'San Fernando', '2208', '22'),
('220808', 'Yorongos', '2208', '22'),
('220809', 'Yuracyacu', '2208', '22'),
('220901', 'Tarapoto', '2209', '22'),
('220902', 'Alberto Leveau', '2209', '22'),
('220903', 'Cacatachi', '2209', '22'),
('220904', 'Chazuta', '2209', '22'),
('220905', 'Chipurana', '2209', '22'),
('220906', 'El Porvenir', '2209', '22'),
('220907', 'Huimbayoc', '2209', '22'),
('220908', 'Juan Guerra', '2209', '22'),
('220909', 'La Banda de Shilcayo', '2209', '22'),
('220910', 'Morales', '2209', '22'),
('220911', 'Papaplaya', '2209', '22'),
('220912', 'San Antonio', '2209', '22'),
('220913', 'Sauce', '2209', '22'),
('220914', 'Shapaja', '2209', '22'),
('221001', 'Tocache', '2210', '22'),
('221002', 'Nuevo Progreso', '2210', '22'),
('221003', 'Polvora', '2210', '22'),
('221004', 'Shunte', '2210', '22'),
('221005', 'Uchiza', '2210', '22'),
('230101', 'Tacna', '2301', '23'),
('230102', 'Alto de la Alianza', '2301', '23'),
('230103', 'Calana', '2301', '23'),
('230104', 'Ciudad Nueva', '2301', '23'),
('230105', 'Inclan', '2301', '23'),
('230106', 'Pachia', '2301', '23'),
('230107', 'Palca', '2301', '23'),
('230108', 'Pocollay', '2301', '23'),
('230109', 'Sama', '2301', '23'),
('230110', 'Coronel Gregorio Albarracín Lanchipa', '2301', '23'),
('230111', 'La Yarada los Palos', '2301', '23'),
('230201', 'Candarave', '2302', '23'),
('230202', 'Cairani', '2302', '23'),
('230203', 'Camilaca', '2302', '23'),
('230204', 'Curibaya', '2302', '23'),
('230205', 'Huanuara', '2302', '23'),
('230206', 'Quilahuani', '2302', '23'),
('230301', 'Locumba', '2303', '23'),
('230302', 'Ilabaya', '2303', '23'),
('230303', 'Ite', '2303', '23'),
('230401', 'Tarata', '2304', '23'),
('230402', 'Héroes Albarracín', '2304', '23'),
('230403', 'Estique', '2304', '23'),
('230404', 'Estique-Pampa', '2304', '23'),
('230405', 'Sitajara', '2304', '23'),
('230406', 'Susapaya', '2304', '23'),
('230407', 'Tarucachi', '2304', '23'),
('230408', 'Ticaco', '2304', '23'),
('240101', 'Tumbes', '2401', '24'),
('240102', 'Corrales', '2401', '24'),
('240103', 'La Cruz', '2401', '24'),
('240104', 'Pampas de Hospital', '2401', '24'),
('240105', 'San Jacinto', '2401', '24'),
('240106', 'San Juan de la Virgen', '2401', '24'),
('240201', 'Zorritos', '2402', '24'),
('240202', 'Casitas', '2402', '24'),
('240203', 'Canoas de Punta Sal', '2402', '24'),
('240301', 'Zarumilla', '2403', '24'),
('240302', 'Aguas Verdes', '2403', '24'),
('240303', 'Matapalo', '2403', '24'),
('240304', 'Papayal', '2403', '24'),
('250101', 'Calleria', '2501', '25'),
('250102', 'Campoverde', '2501', '25'),
('250103', 'Iparia', '2501', '25'),
('250104', 'Masisea', '2501', '25'),
('250105', 'Yarinacocha', '2501', '25'),
('250106', 'Nueva Requena', '2501', '25'),
('250107', 'Manantay', '2501', '25'),
('250201', 'Raymondi', '2502', '25'),
('250202', 'Sepahua', '2502', '25'),
('250203', 'Tahuania', '2502', '25'),
('250204', 'Yurua', '2502', '25'),
('250301', 'Padre Abad', '2503', '25'),
('250302', 'Irazola', '2503', '25'),
('250303', 'Curimana', '2503', '25'),
('250304', 'Neshuya', '2503', '25'),
('250305', 'Alexander Von Humboldt', '2503', '25'),
('250401', 'Purus', '2504', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo_peru_provinces`
--

CREATE TABLE `ubigeo_peru_provinces` (
  `id` varchar(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  `department_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubigeo_peru_provinces`
--

INSERT INTO `ubigeo_peru_provinces` (`id`, `name`, `department_id`) VALUES
('0101', 'Chachapoyas', '01'),
('0102', 'Bagua', '01'),
('0103', 'Bongará', '01'),
('0104', 'Condorcanqui', '01'),
('0105', 'Luya', '01'),
('0106', 'Rodríguez de Mendoza', '01'),
('0107', 'Utcubamba', '01'),
('0201', 'Huaraz', '02'),
('0202', 'Aija', '02'),
('0203', 'Antonio Raymondi', '02'),
('0204', 'Asunción', '02'),
('0205', 'Bolognesi', '02'),
('0206', 'Carhuaz', '02'),
('0207', 'Carlos Fermín Fitzcarrald', '02'),
('0208', 'Casma', '02'),
('0209', 'Corongo', '02'),
('0210', 'Huari', '02'),
('0211', 'Huarmey', '02'),
('0212', 'Huaylas', '02'),
('0213', 'Mariscal Luzuriaga', '02'),
('0214', 'Ocros', '02'),
('0215', 'Pallasca', '02'),
('0216', 'Pomabamba', '02'),
('0217', 'Recuay', '02'),
('0218', 'Santa', '02'),
('0219', 'Sihuas', '02'),
('0220', 'Yungay', '02'),
('0301', 'Abancay', '03'),
('0302', 'Andahuaylas', '03'),
('0303', 'Antabamba', '03'),
('0304', 'Aymaraes', '03'),
('0305', 'Cotabambas', '03'),
('0306', 'Chincheros', '03'),
('0307', 'Grau', '03'),
('0401', 'Arequipa', '04'),
('0402', 'Camaná', '04'),
('0403', 'Caravelí', '04'),
('0404', 'Castilla', '04'),
('0405', 'Caylloma', '04'),
('0406', 'Condesuyos', '04'),
('0407', 'Islay', '04'),
('0408', 'La Uniòn', '04'),
('0501', 'Huamanga', '05'),
('0502', 'Cangallo', '05'),
('0503', 'Huanca Sancos', '05'),
('0504', 'Huanta', '05'),
('0505', 'La Mar', '05'),
('0506', 'Lucanas', '05'),
('0507', 'Parinacochas', '05'),
('0508', 'Pàucar del Sara Sara', '05'),
('0509', 'Sucre', '05'),
('0510', 'Víctor Fajardo', '05'),
('0511', 'Vilcas Huamán', '05'),
('0601', 'Cajamarca', '06'),
('0602', 'Cajabamba', '06'),
('0603', 'Celendín', '06'),
('0604', 'Chota', '06'),
('0605', 'Contumazá', '06'),
('0606', 'Cutervo', '06'),
('0607', 'Hualgayoc', '06'),
('0608', 'Jaén', '06'),
('0609', 'San Ignacio', '06'),
('0610', 'San Marcos', '06'),
('0611', 'San Miguel', '06'),
('0612', 'San Pablo', '06'),
('0613', 'Santa Cruz', '06'),
('0701', 'Prov. Const. del Callao', '07'),
('0801', 'Cusco', '08'),
('0802', 'Acomayo', '08'),
('0803', 'Anta', '08'),
('0804', 'Calca', '08'),
('0805', 'Canas', '08'),
('0806', 'Canchis', '08'),
('0807', 'Chumbivilcas', '08'),
('0808', 'Espinar', '08'),
('0809', 'La Convención', '08'),
('0810', 'Paruro', '08'),
('0811', 'Paucartambo', '08'),
('0812', 'Quispicanchi', '08'),
('0813', 'Urubamba', '08'),
('0901', 'Huancavelica', '09'),
('0902', 'Acobamba', '09'),
('0903', 'Angaraes', '09'),
('0904', 'Castrovirreyna', '09'),
('0905', 'Churcampa', '09'),
('0906', 'Huaytará', '09'),
('0907', 'Tayacaja', '09'),
('1001', 'Huánuco', '10'),
('1002', 'Ambo', '10'),
('1003', 'Dos de Mayo', '10'),
('1004', 'Huacaybamba', '10'),
('1005', 'Huamalíes', '10'),
('1006', 'Leoncio Prado', '10'),
('1007', 'Marañón', '10'),
('1008', 'Pachitea', '10'),
('1009', 'Puerto Inca', '10'),
('1010', 'Lauricocha ', '10'),
('1011', 'Yarowilca ', '10'),
('1101', 'Ica ', '11'),
('1102', 'Chincha ', '11'),
('1103', 'Nasca ', '11'),
('1104', 'Palpa ', '11'),
('1105', 'Pisco ', '11'),
('1201', 'Huancayo ', '12'),
('1202', 'Concepción ', '12'),
('1203', 'Chanchamayo ', '12'),
('1204', 'Jauja ', '12'),
('1205', 'Junín ', '12'),
('1206', 'Satipo ', '12'),
('1207', 'Tarma ', '12'),
('1208', 'Yauli ', '12'),
('1209', 'Chupaca ', '12'),
('1301', 'Trujillo ', '13'),
('1302', 'Ascope ', '13'),
('1303', 'Bolívar ', '13'),
('1304', 'Chepén ', '13'),
('1305', 'Julcán ', '13'),
('1306', 'Otuzco ', '13'),
('1307', 'Pacasmayo ', '13'),
('1308', 'Pataz ', '13'),
('1309', 'Sánchez Carrión ', '13'),
('1310', 'Santiago de Chuco ', '13'),
('1311', 'Gran Chimú ', '13'),
('1312', 'Virú ', '13'),
('1401', 'Chiclayo ', '14'),
('1402', 'Ferreñafe ', '14'),
('1403', 'Lambayeque ', '14'),
('1501', 'Lima ', '15'),
('1502', 'Barranca ', '15'),
('1503', 'Cajatambo ', '15'),
('1504', 'Canta ', '15'),
('1505', 'Cañete ', '15'),
('1506', 'Huaral ', '15'),
('1507', 'Huarochirí ', '15'),
('1508', 'Huaura ', '15'),
('1509', 'Oyón ', '15'),
('1510', 'Yauyos ', '15'),
('1601', 'Maynas ', '16'),
('1602', 'Alto Amazonas ', '16'),
('1603', 'Loreto ', '16'),
('1604', 'Mariscal Ramón Castilla ', '16'),
('1605', 'Requena ', '16'),
('1606', 'Ucayali ', '16'),
('1607', 'Datem del Marañón ', '16'),
('1608', 'Putumayo', '16'),
('1701', 'Tambopata ', '17'),
('1702', 'Manu ', '17'),
('1703', 'Tahuamanu ', '17'),
('1801', 'Mariscal Nieto ', '18'),
('1802', 'General Sánchez Cerro ', '18'),
('1803', 'Ilo ', '18'),
('1901', 'Pasco ', '19'),
('1902', 'Daniel Alcides Carrión ', '19'),
('1903', 'Oxapampa ', '19'),
('2001', 'Piura ', '20'),
('2002', 'Ayabaca ', '20'),
('2003', 'Huancabamba ', '20'),
('2004', 'Morropón ', '20'),
('2005', 'Paita ', '20'),
('2006', 'Sullana ', '20'),
('2007', 'Talara ', '20'),
('2008', 'Sechura ', '20'),
('2101', 'Puno ', '21'),
('2102', 'Azángaro ', '21'),
('2103', 'Carabaya ', '21'),
('2104', 'Chucuito ', '21'),
('2105', 'El Collao ', '21'),
('2106', 'Huancané ', '21'),
('2107', 'Lampa ', '21'),
('2108', 'Melgar ', '21'),
('2109', 'Moho ', '21'),
('2110', 'San Antonio de Putina ', '21'),
('2111', 'San Román ', '21'),
('2112', 'Sandia ', '21'),
('2113', 'Yunguyo ', '21'),
('2201', 'Moyobamba ', '22'),
('2202', 'Bellavista ', '22'),
('2203', 'El Dorado ', '22'),
('2204', 'Huallaga ', '22'),
('2205', 'Lamas ', '22'),
('2206', 'Mariscal Cáceres ', '22'),
('2207', 'Picota ', '22'),
('2208', 'Rioja ', '22'),
('2209', 'San Martín ', '22'),
('2210', 'Tocache ', '22'),
('2301', 'Tacna ', '23'),
('2302', 'Candarave ', '23'),
('2303', 'Jorge Basadre ', '23'),
('2304', 'Tarata ', '23'),
('2401', 'Tumbes ', '24'),
('2402', 'Contralmirante Villar ', '24'),
('2403', 'Zarumilla ', '24'),
('2501', 'Coronel Portillo ', '25'),
('2502', 'Atalaya ', '25'),
('2503', 'Padre Abad ', '25'),
('2504', 'Purús', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_unidad_medida` int(11) NOT NULL,
  `unidad_medida` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_unidad_medida`, `unidad_medida`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Libra', 1, '2022-09-17 13:51:40', '2022-09-17 13:54:01', 2, 2),
(2, 'Kilogramo', 1, '2022-09-17 13:51:08', '2022-09-17 13:54:06', 2, 2),
(3, 'Litros', 1, '2022-09-17 13:53:53', '2022-09-17 13:53:53', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  `foto_tamanio` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_departamento` varchar(11) NOT NULL,
  `id_provincia` varchar(11) NOT NULL,
  `id_distrito` varchar(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_inicio_labores` date NOT NULL,
  `fecha_fin_labores` date NOT NULL,
  `nro_hijos` int(3) NOT NULL,
  `id_estado_civil` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`, `clave`, `telefono`, `id_tipo_documento`, `num_documento`, `id_rol`, `foto_perfil`, `foto_tamanio`, `id_genero`, `id_departamento`, `id_provincia`, `id_distrito`, `direccion`, `cv`, `fecha_nac`, `fecha_inicio_labores`, `fecha_fin_labores`, `nro_hijos`, `id_estado_civil`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'SuperAdmin', 'Admin', 'Admin', 'admin@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '999156604', 1, '77378490', 1, 'archivos/foto_perfil/310822020015_13/fp_310822_0215_56.jpg', 25105, 2, '15', '1501', '150101', 'maisanta', 'archivos/CV/290822061437_69/CV_290822_06', '1996-06-07', '2022-08-01', '2023-08-01', 1, 1, '', 1, '2022-08-07 18:33:01', '2022-08-29 00:14:38', 1, 1),
(2, 'Omar Antonio', 'Ortega', 'Perez', 'oomarxzortega4@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '04241333187', 1, '25791259', 1, 'archivos/foto_perfil/080922022304_90/fp_080922_0204_78.png', 75091, 1, '15', '1501', '150101', 'maisanta 23', 'archivos/CV/080922022304_93/CV_080922_0204_25.', '1996-06-07', '2022-06-01', '2022-08-30', 1, 1, '', 1, '2022-08-30 19:35:57', '2022-09-07 19:23:04', 1, 2),
(3, 'Sergio', 'Lira', 'Camacho', 'adminweb@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '999156604', 2, '77378490', 5, 'archivos/foto_perfil/191022035115_33/fp_191022_0315_69.', 0, 1, '15', '1501', '150101', 'Av Huayna Capac', 'archivos/CV/191022035115_34/CV_191022_0315_12.', '1995-02-09', '2022-09-01', '2022-09-08', 1, 1, '', 1, '2022-09-08 13:23:35', '2022-10-18 20:51:15', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_banner_descripcion`
--

CREATE TABLE `web_banner_descripcion` (
  `id_web_banner_descripcion` int(11) NOT NULL,
  `titulo` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `parrafo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_banner_descripcion`
--

INSERT INTO `web_banner_descripcion` (`id_web_banner_descripcion`, `titulo`, `imagen`, `subtitulo`, `parrafo`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'web baner 1', '', 'asd', 'asda asdjadijasdjaksj d', 1, '2022-10-13 17:15:12', '2022-10-13 17:16:56', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_banner_static_left`
--

CREATE TABLE `web_banner_static_left` (
  `id_web_banner_static_left` int(11) NOT NULL,
  `titulo_h1` varchar(20) NOT NULL,
  `titulo_span` varchar(20) NOT NULL,
  `parrafo_uno` varchar(20) NOT NULL,
  `parrafo_dos` varchar(20) NOT NULL,
  `parrafo_tres` varchar(20) NOT NULL,
  `titulo_descarga` varchar(20) NOT NULL,
  `descripcion_boton_descarga` varchar(52) NOT NULL,
  `archivo_descarga` varchar(100) NOT NULL,
  `imagen_hombre` varchar(100) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `imagen_circulo` varchar(100) NOT NULL,
  `imagen_fondo` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_banner_static_left`
--

INSERT INTO `web_banner_static_left` (`id_web_banner_static_left`, `titulo_h1`, `titulo_span`, `parrafo_uno`, `parrafo_dos`, `parrafo_tres`, `titulo_descarga`, `descripcion_boton_descarga`, `archivo_descarga`, `imagen_hombre`, `imagen_producto`, `imagen_circulo`, `imagen_fondo`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'BIO 200 %', 'NATURAL', 'PRODUCTO PERUANO', 'ESENCIA 100% NATURAL', 'ESENCIA 100% NATURAL', 'Obten nuestra tabla', 'CASERO', 'archivos/201022034430_52/201022_0330_45.pdf', 'archivos/201022034430_24/201022_0330_90.png', 'archivos/201022034430_72/201022_0330_67.png', 'archivos/201022034430_16/201022_0330_37.png', 'archivos/201022034430_51/201022_0330_11.png', '', 1, '2022-10-19 20:44:30', '2022-10-19 21:08:03', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_call_action_gray`
--

CREATE TABLE `web_call_action_gray` (
  `id_web_call_action_gray` int(11) NOT NULL,
  `titulo_h2` varchar(20) NOT NULL,
  `parrafo` varchar(100) NOT NULL,
  `desc_boton` varchar(20) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_call_action_gray`
--

INSERT INTO `web_call_action_gray` (`id_web_call_action_gray`, `titulo_h2`, `parrafo`, `desc_boton`, `enlace`, `imagen`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'a', 'parrafo de prueba', 'desc boton de prueba', 'http facebokc punto com', 'archivos/161022032903_56/161022_0303_16.jpg', 'hola soy una observacion', 1, '2022-10-15 20:28:09', '2022-10-15 20:29:03', 1, 1),
(2, 'aaaa', 'aa', 'aaa', 'aaa', 'archivos/161022032958_74/161022_0358_47.jpg', 'aaaa', 1, '2022-10-15 20:29:58', '2022-10-15 20:29:58', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_costo_envio_desc`
--

CREATE TABLE `web_costo_envio_desc` (
  `id_web_costo_envio_desc` int(11) NOT NULL,
  `web_costo_envio_desc` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_costo_envio_desc`
--

INSERT INTO `web_costo_envio_desc` (`id_web_costo_envio_desc`, `web_costo_envio_desc`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'primera web as', 1, '2022-10-13 16:46:07', '2022-10-13 16:46:19', 1, 1),
(2, 'Segunda Web editado', 1, '2022-10-13 16:48:00', '2022-10-13 16:48:15', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_footer_four_bottom_right`
--

CREATE TABLE `web_footer_four_bottom_right` (
  `id_web_footer_four_bottom_right` int(11) NOT NULL,
  `web_footer_four_bottom_right` varchar(50) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_footer_widget`
--

CREATE TABLE `web_footer_widget` (
  `id_web_footer_widget` int(11) NOT NULL,
  `web_footer_widget` varchar(40) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_footer_widget_desc`
--

CREATE TABLE `web_footer_widget_desc` (
  `id_web_footer_widget_desc` int(11) NOT NULL,
  `web_footer_widget_desc` varchar(50) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `id_web_footer_widget` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_header`
--

CREATE TABLE `web_header` (
  `id_web_header` int(11) NOT NULL,
  `marca_comercial` varchar(40) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `logo_blanco` varchar(200) NOT NULL,
  `logo_footer` varchar(200) NOT NULL,
  `celular1` varchar(20) NOT NULL,
  `celular2` varchar(20) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `ruc` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_home_five_service`
--

CREATE TABLE `web_home_five_service` (
  `id_web_home_five_service` int(11) NOT NULL,
  `titulo_h3` varchar(20) NOT NULL,
  `parrafo` varchar(50) NOT NULL,
  `desc_boton` varchar(20) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_home_five_service`
--

INSERT INTO `web_home_five_service` (`id_web_home_five_service`, `titulo_h3`, `parrafo`, `desc_boton`, `enlace`, `tipo`, `imagen`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(2, 'Controla Infecciones', 'Gracias al consumo de la planta de la vida', 'Comprar', 'producto.php', '1', 'archivos/311022032722_32/311022_0322_22.png', '', 1, '2022-10-18 20:02:02', '2022-10-30 21:27:22', 1, 1),
(3, 'Controla Infecciones', 'Gracias al consumo de la planta de la vida', 'Comprar', 'producto.php', '2', 'archivos/311022032814_70/311022_0314_86.png', '', 1, '2022-10-30 21:28:14', '2022-10-30 21:28:14', 1, 1),
(4, 'Elimina El Insomnio', 'Gracias a sus compenentes de la planta', 'Comprar', 'producto.php', '3', 'archivos/311022032921_80/311022_0321_86.png', '', 1, '2022-10-30 21:29:21', '2022-10-30 21:29:21', 1, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_home_pricing`
--

CREATE TABLE `web_home_pricing` (
  `id_web_home_pricing` int(11) NOT NULL,
  `titulo_h3` varchar(20) NOT NULL,
  `span` varchar(100) NOT NULL,
  `icono` varchar(20) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_home_pricing`
--

INSERT INTO `web_home_pricing` (`id_web_home_pricing`, `titulo_h3`, `span`, `icono`, `enlace`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'a', 'a', 'a', 'a', '', 1, '2022-10-18 18:50:56', '2022-10-18 20:11:33', 1, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_mensaje_contacto`
--

CREATE TABLE `web_mensaje_contacto` (
  `id_web_mensaje_contacto` int(11) NOT NULL,
  `nombre_apellido` varchar(150) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `mensaje` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_mensaje_contacto`
--

INSERT INTO `web_mensaje_contacto` (`id_web_mensaje_contacto`, `nombre_apellido`, `correo`, `celular`, `mensaje`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, '1', '1', '1', '1', 1, '2022-10-14 13:28:11', '2022-10-14 15:14:53', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_menu`
--

CREATE TABLE `web_menu` (
  `id_web_menu` int(11) NOT NULL,
  `web_menu` varchar(40) NOT NULL,
  `enlace` varchar(50) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_menu`
--

INSERT INTO `web_menu` (`id_web_menu`, `web_menu`, `enlace`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'INICIO', 'index.php', '', 1, '2022-10-18 20:56:17', '2022-10-30 15:40:15', 1, 1),
(2, 'PRODUCTO', 'producto.php', '', 1, '2022-10-18 20:57:13', '2022-10-30 15:33:12', 1, 1),
(3, 'BENEFICIOS', 'beneficios.php', '', 1, '2022-10-30 15:33:28', '2022-10-30 15:33:28', 1, 1),
(4, 'INICIA TU NEGOCIO', 'inicia-tu-negocio.php', '', 1, '2022-10-30 15:34:01', '2022-10-30 15:34:01', 1, 1),
(5, 'NUESTRA HISTORIA', '#', '', 1, '2022-10-30 15:34:23', '2022-10-30 15:34:23', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_quienes_somos`
--

CREATE TABLE `web_quienes_somos` (
  `id_web_quienes_somos` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `imagen_principal` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `parrafo` text NOT NULL,
  `icono` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_quienes_somos`
--

INSERT INTO `web_quienes_somos` (`id_web_quienes_somos`, `titulo`, `imagen_principal`, `imagen`, `subtitulo`, `parrafo`, `icono`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Test', 'test', 'test', 'test', 'test ', 'test', 1, '2022-10-14 23:05:57', '2022-10-14 23:05:57', 1, 1),
(2, 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 1, '2022-10-14 23:06:40', '2022-10-14 23:06:40', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_red_social`
--

CREATE TABLE `web_red_social` (
  `id_web_red_social` int(11) NOT NULL,
  `web_red_social` varchar(30) NOT NULL,
  `icono` varchar(20) NOT NULL,
  `enlace` varchar(200) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_sub_menu`
--

CREATE TABLE `web_sub_menu` (
  `id_web_sub_menu` int(11) NOT NULL,
  `web_sub_menu` varchar(40) NOT NULL,
  `enlace` varchar(50) NOT NULL,
  `id_web_menu` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_sub_menu`
--

INSERT INTO `web_sub_menu` (`id_web_sub_menu`, `web_sub_menu`, `enlace`, `id_web_menu`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'QUIENES SOMOS', 'quienes-somos.php', 5, '', 1, '2022-10-30 15:34:57', '2022-10-30 15:34:57', 1, 1),
(2, 'CONTACTANOS', 'contactanos.php', 5, '', 1, '2022-10-30 15:37:50', '2022-10-30 15:37:50', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_testimonio`
--

CREATE TABLE `web_testimonio` (
  `id_web_testimonio` int(11) NOT NULL,
  `testimonio` varchar(150) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  `foto_perfil` varchar(100) NOT NULL,
  `imagen_you_poster` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechaactualiza` datetime DEFAULT NULL,
  `id_usuarioregistro` int(11) NOT NULL DEFAULT 1,
  `id_usuarioactualiza` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `web_testimonio`
--

INSERT INTO `web_testimonio` (`id_web_testimonio`, `testimonio`, `nombre`, `apellido_paterno`, `apellido_materno`, `cargo`, `foto_perfil`, `imagen_you_poster`, `video`, `observacion`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Es un producto que me ayuda ala recuperaciones de una operación', 'Jhon', 'Alexander', 'Ares', 'Ingeniero', 'archivos/311022050326_71/311022_0526_16.png', 'archivos/311022050326_85/311022_0526_46.png', 'archivos/181022075124_30/181022_0724_96.mp4', '', 1, '2022-10-18 00:51:24', '2022-10-30 23:03:26', 1, 1);

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

INSERT INTO `web_ubicacion` (`id_web_ubicacion`, `id_pais`, `id_departamento`, `id_provincia`, `id_distrito`, `direccion`, `latitud`, `longitud`, `imagen`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(43, 1, '12', '1201', '120114', 'Calle Lima 166 San Jeronimo De Tunan', '12', '12', '123asdasda', 1, '2022-10-14 21:20:33', '2022-10-14 21:21:29', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_supervision`
--

CREATE TABLE `zona_supervision` (
  `id_zona_supervision` int(11) NOT NULL,
  `zona_supervision` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechaactualiza` datetime NOT NULL,
  `id_usuarioregistro` int(11) NOT NULL,
  `id_usuarioactualiza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona_supervision`
--

INSERT INTO `zona_supervision` (`id_zona_supervision`, `zona_supervision`, `estado`, `fecharegistro`, `fechaactualiza`, `id_usuarioregistro`, `id_usuarioactualiza`) VALUES
(1, 'Zona Central', 1, '2022-09-30 17:35:56', '2022-10-17 21:28:00', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`id_afiliado`),
  ADD UNIQUE KEY `ruc_usuario` (`ruc_usuario`);

--
-- Indices de la tabla `asignacion_herramienta`
--
ALTER TABLE `asignacion_herramienta`
  ADD PRIMARY KEY (`id_asignacion_herramienta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_herramientas_tec` (`id_herramienta_tecnologica`);

--
-- Indices de la tabla `asignacion_licencia`
--
ALTER TABLE `asignacion_licencia`
  ADD PRIMARY KEY (`id_asignacion_licencia`),
  ADD KEY `id_herramientas_tec` (`id_herramienta_tecnologica`),
  ADD KEY `id_licencia` (`id_licencia`);

--
-- Indices de la tabla `beneficio_producto`
--
ALTER TABLE `beneficio_producto`
  ADD PRIMARY KEY (`id_beneficio_producto`);

--
-- Indices de la tabla `cabecera_comisiones_venta`
--
ALTER TABLE `cabecera_comisiones_venta`
  ADD PRIMARY KEY (`id_cabacera_comisiones_venta`);

--
-- Indices de la tabla `cabecera_registro_venta`
--
ALTER TABLE `cabecera_registro_venta`
  ADD PRIMARY KEY (`id_cabecera_registro_venta`);

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`),
  ADD UNIQUE KEY `dni` (`nro_documento`),
  ADD UNIQUE KEY `dni_2` (`nro_documento`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria_producto`);

--
-- Indices de la tabla `condicion_equipo`
--
ALTER TABLE `condicion_equipo`
  ADD PRIMARY KEY (`id_condicion_equipo`);

--
-- Indices de la tabla `costo_envio`
--
ALTER TABLE `costo_envio`
  ADD PRIMARY KEY (`id_costo_envio`);

--
-- Indices de la tabla `descuento_producto`
--
ALTER TABLE `descuento_producto`
  ADD PRIMARY KEY (`id_descuento_producto`);

--
-- Indices de la tabla `detalle_comisiones_venta`
--
ALTER TABLE `detalle_comisiones_venta`
  ADD PRIMARY KEY (`id_detalle_comisiones_venta`);

--
-- Indices de la tabla `detalle_registro_venta`
--
ALTER TABLE `detalle_registro_venta`
  ADD PRIMARY KEY (`id_detalle_registro_venta`);

--
-- Indices de la tabla `divisa`
--
ALTER TABLE `divisa`
  ADD PRIMARY KEY (`id_divisa`);

--
-- Indices de la tabla `entidad_bancaria`
--
ALTER TABLE `entidad_bancaria`
  ADD PRIMARY KEY (`id_entidad_bancaria`);

--
-- Indices de la tabla `estado_candidato`
--
ALTER TABLE `estado_candidato`
  ADD PRIMARY KEY (`id_estado_candidato`);

--
-- Indices de la tabla `estado_charla_candidato`
--
ALTER TABLE `estado_charla_candidato`
  ADD PRIMARY KEY (`id_estado_charla_candidato`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `estado_conexion`
--
ALTER TABLE `estado_conexion`
  ADD PRIMARY KEY (`id_estado_conexion`);

--
-- Indices de la tabla `estado_contrato`
--
ALTER TABLE `estado_contrato`
  ADD PRIMARY KEY (`id_estado_contrato`);

--
-- Indices de la tabla `estado_programacion_charla`
--
ALTER TABLE `estado_programacion_charla`
  ADD PRIMARY KEY (`id_estado_programacion_charla`);

--
-- Indices de la tabla `estado_registro_venta`
--
ALTER TABLE `estado_registro_venta`
  ADD PRIMARY KEY (`id_estado_registro_venta`);

--
-- Indices de la tabla `financiado`
--
ALTER TABLE `financiado`
  ADD PRIMARY KEY (`id_financiado`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indices de la tabla `frecuencia`
--
ALTER TABLE `frecuencia`
  ADD PRIMARY KEY (`id_frecuencia`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `herramienta_tecnologica`
--
ALTER TABLE `herramienta_tecnologica`
  ADD PRIMARY KEY (`id_herramienta_tecnologica`),
  ADD KEY `id_tipo_equipo` (`id_tipo_equipo`),
  ADD KEY `id_marca_equipo` (`id_marca_equipo`),
  ADD KEY `id_condicion_equipo` (`id_condicion_equipo`);

--
-- Indices de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD PRIMARY KEY (`id_imagen_producto`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id_licencia`);

--
-- Indices de la tabla `marca_comercial`
--
ALTER TABLE `marca_comercial`
  ADD PRIMARY KEY (`id_marca_comercial`);

--
-- Indices de la tabla `marca_equipo`
--
ALTER TABLE `marca_equipo`
  ADD PRIMARY KEY (`id_marca_equipo`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD PRIMARY KEY (`id_marca_producto`);

--
-- Indices de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  ADD PRIMARY KEY (`id_medio_pago`);

--
-- Indices de la tabla `modalidad_pago`
--
ALTER TABLE `modalidad_pago`
  ADD PRIMARY KEY (`id_modalidad_pago`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `paquete_detalle_producto`
--
ALTER TABLE `paquete_detalle_producto`
  ADD PRIMARY KEY (`id_paquete_detalle_producto`);

--
-- Indices de la tabla `paquete_producto_cabecera`
--
ALTER TABLE `paquete_producto_cabecera`
  ADD PRIMARY KEY (`id_paquete_producto_cabecera`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `registro_compra`
--
ALTER TABLE `registro_compra`
  ADD PRIMARY KEY (`id_registro_compra`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`),
  ADD UNIQUE KEY `ruc` (`ruc`);

--
-- Indices de la tabla `representante_conectado`
--
ALTER TABLE `representante_conectado`
  ADD PRIMARY KEY (`id_representante_conectado`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `ruc` (`ruc`),
  ADD UNIQUE KEY `dni_2` (`dni`),
  ADD UNIQUE KEY `ruc_2` (`ruc`),
  ADD UNIQUE KEY `dni_3` (`dni`),
  ADD UNIQUE KEY `ruc_3` (`ruc`),
  ADD UNIQUE KEY `dni_4` (`dni`),
  ADD UNIQUE KEY `dni_5` (`dni`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sub_categoria_producto`
--
ALTER TABLE `sub_categoria_producto`
  ADD PRIMARY KEY (`id_sub_categoria_producto`);

--
-- Indices de la tabla `sub_modulo`
--
ALTER TABLE `sub_modulo`
  ADD PRIMARY KEY (`id_sub_modulo`);

--
-- Indices de la tabla `temporal_detalle_registro_venta`
--
ALTER TABLE `temporal_detalle_registro_venta`
  ADD PRIMARY KEY (`id_temporal_detalle_registro_venta`);

--
-- Indices de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  ADD PRIMARY KEY (`id_tipo_archivo`);

--
-- Indices de la tabla `tipo_comision`
--
ALTER TABLE `tipo_comision`
  ADD PRIMARY KEY (`id_tipo_comision`);

--
-- Indices de la tabla `tipo_descuento`
--
ALTER TABLE `tipo_descuento`
  ADD PRIMARY KEY (`id_tipo_descuento`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_informacion`
--
ALTER TABLE `tipo_informacion`
  ADD PRIMARY KEY (`id_tipo_informacion`);

--
-- Indices de la tabla `tipo_licencia`
--
ALTER TABLE `tipo_licencia`
  ADD PRIMARY KEY (`id_tipo_licencia`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  ADD PRIMARY KEY (`id_tipo_venta`);

--
-- Indices de la tabla `trama_comsiones_x_venta`
--
ALTER TABLE `trama_comsiones_x_venta`
  ADD PRIMARY KEY (`id_trama_comisiones_x_venta`);

--
-- Indices de la tabla `ubigeo_peru_departments`
--
ALTER TABLE `ubigeo_peru_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubigeo_peru_districts`
--
ALTER TABLE `ubigeo_peru_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubigeo_peru_provinces`
--
ALTER TABLE `ubigeo_peru_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_unidad_medida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_documento` (`id_tipo_documento`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_distrito` (`id_distrito`),
  ADD KEY `id_estado_civil` (`id_estado_civil`);

--
-- Indices de la tabla `web_banner_descripcion`
--
ALTER TABLE `web_banner_descripcion`
  ADD PRIMARY KEY (`id_web_banner_descripcion`);

--
-- Indices de la tabla `web_banner_static_left`
--
ALTER TABLE `web_banner_static_left`
  ADD PRIMARY KEY (`id_web_banner_static_left`);

--
-- Indices de la tabla `web_call_action_gray`
--
ALTER TABLE `web_call_action_gray`
  ADD PRIMARY KEY (`id_web_call_action_gray`);

--
-- Indices de la tabla `web_costo_envio_desc`
--
ALTER TABLE `web_costo_envio_desc`
  ADD PRIMARY KEY (`id_web_costo_envio_desc`);

--
-- Indices de la tabla `web_footer_four_bottom_right`
--
ALTER TABLE `web_footer_four_bottom_right`
  ADD PRIMARY KEY (`id_web_footer_four_bottom_right`);

--
-- Indices de la tabla `web_footer_widget`
--
ALTER TABLE `web_footer_widget`
  ADD PRIMARY KEY (`id_web_footer_widget`);

--
-- Indices de la tabla `web_footer_widget_desc`
--
ALTER TABLE `web_footer_widget_desc`
  ADD PRIMARY KEY (`id_web_footer_widget_desc`);

--
-- Indices de la tabla `web_header`
--
ALTER TABLE `web_header`
  ADD PRIMARY KEY (`id_web_header`);

--
-- Indices de la tabla `web_home_five_service`
--
ALTER TABLE `web_home_five_service`
  ADD PRIMARY KEY (`id_web_home_five_service`);

--
-- Indices de la tabla `web_home_offer`
--
ALTER TABLE `web_home_offer`
  ADD PRIMARY KEY (`id_web_home_offer`);

--
-- Indices de la tabla `web_home_pricing`
--
ALTER TABLE `web_home_pricing`
  ADD PRIMARY KEY (`id_web_home_pricing`);

--
-- Indices de la tabla `web_home_video`
--
ALTER TABLE `web_home_video`
  ADD PRIMARY KEY (`id_web_home_video`);

--
-- Indices de la tabla `web_mensaje_contacto`
--
ALTER TABLE `web_mensaje_contacto`
  ADD PRIMARY KEY (`id_web_mensaje_contacto`);

--
-- Indices de la tabla `web_menu`
--
ALTER TABLE `web_menu`
  ADD PRIMARY KEY (`id_web_menu`);

--
-- Indices de la tabla `web_quienes_somos`
--
ALTER TABLE `web_quienes_somos`
  ADD PRIMARY KEY (`id_web_quienes_somos`);

--
-- Indices de la tabla `web_red_social`
--
ALTER TABLE `web_red_social`
  ADD PRIMARY KEY (`id_web_red_social`);

--
-- Indices de la tabla `web_sub_menu`
--
ALTER TABLE `web_sub_menu`
  ADD PRIMARY KEY (`id_web_sub_menu`);

--
-- Indices de la tabla `web_testimonio`
--
ALTER TABLE `web_testimonio`
  ADD PRIMARY KEY (`id_web_testimonio`);

--
-- Indices de la tabla `web_ubicacion`
--
ALTER TABLE `web_ubicacion`
  ADD PRIMARY KEY (`id_web_ubicacion`);

--
-- Indices de la tabla `zona_supervision`
--
ALTER TABLE `zona_supervision`
  ADD PRIMARY KEY (`id_zona_supervision`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_herramienta`
--
ALTER TABLE `asignacion_herramienta`
  MODIFY `id_asignacion_herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asignacion_licencia`
--
ALTER TABLE `asignacion_licencia`
  MODIFY `id_asignacion_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `beneficio_producto`
--
ALTER TABLE `beneficio_producto`
  MODIFY `id_beneficio_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cabecera_comisiones_venta`
--
ALTER TABLE `cabecera_comisiones_venta`
  MODIFY `id_cabacera_comisiones_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cabecera_registro_venta`
--
ALTER TABLE `cabecera_registro_venta`
  MODIFY `id_cabecera_registro_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `condicion_equipo`
--
ALTER TABLE `condicion_equipo`
  MODIFY `id_condicion_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `costo_envio`
--
ALTER TABLE `costo_envio`
  MODIFY `id_costo_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `descuento_producto`
--
ALTER TABLE `descuento_producto`
  MODIFY `id_descuento_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_comisiones_venta`
--
ALTER TABLE `detalle_comisiones_venta`
  MODIFY `id_detalle_comisiones_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_registro_venta`
--
ALTER TABLE `detalle_registro_venta`
  MODIFY `id_detalle_registro_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `divisa`
--
ALTER TABLE `divisa`
  MODIFY `id_divisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entidad_bancaria`
--
ALTER TABLE `entidad_bancaria`
  MODIFY `id_entidad_bancaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_candidato`
--
ALTER TABLE `estado_candidato`
  MODIFY `id_estado_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado_charla_candidato`
--
ALTER TABLE `estado_charla_candidato`
  MODIFY `id_estado_charla_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_conexion`
--
ALTER TABLE `estado_conexion`
  MODIFY `id_estado_conexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_contrato`
--
ALTER TABLE `estado_contrato`
  MODIFY `id_estado_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_programacion_charla`
--
ALTER TABLE `estado_programacion_charla`
  MODIFY `id_estado_programacion_charla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_registro_venta`
--
ALTER TABLE `estado_registro_venta`
  MODIFY `id_estado_registro_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `financiado`
--
ALTER TABLE `financiado`
  MODIFY `id_financiado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `frecuencia`
--
ALTER TABLE `frecuencia`
  MODIFY `id_frecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `herramienta_tecnologica`
--
ALTER TABLE `herramienta_tecnologica`
  MODIFY `id_herramienta_tecnologica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  MODIFY `id_imagen_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca_comercial`
--
ALTER TABLE `marca_comercial`
  MODIFY `id_marca_comercial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marca_equipo`
--
ALTER TABLE `marca_equipo`
  MODIFY `id_marca_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  MODIFY `id_marca_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  MODIFY `id_medio_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modalidad_pago`
--
ALTER TABLE `modalidad_pago`
  MODIFY `id_modalidad_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paquete_detalle_producto`
--
ALTER TABLE `paquete_detalle_producto`
  MODIFY `id_paquete_detalle_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paquete_producto_cabecera`
--
ALTER TABLE `paquete_producto_cabecera`
  MODIFY `id_paquete_producto_cabecera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_compra`
--
ALTER TABLE `registro_compra`
  MODIFY `id_registro_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sub_categoria_producto`
--
ALTER TABLE `sub_categoria_producto`
  MODIFY `id_sub_categoria_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_modulo`
--
ALTER TABLE `sub_modulo`
  MODIFY `id_sub_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `temporal_detalle_registro_venta`
--
ALTER TABLE `temporal_detalle_registro_venta`
  MODIFY `id_temporal_detalle_registro_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  MODIFY `id_tipo_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_comision`
--
ALTER TABLE `tipo_comision`
  MODIFY `id_tipo_comision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_descuento`
--
ALTER TABLE `tipo_descuento`
  MODIFY `id_tipo_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_informacion`
--
ALTER TABLE `tipo_informacion`
  MODIFY `id_tipo_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_licencia`
--
ALTER TABLE `tipo_licencia`
  MODIFY `id_tipo_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  MODIFY `id_tipo_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trama_comsiones_x_venta`
--
ALTER TABLE `trama_comsiones_x_venta`
  MODIFY `id_trama_comisiones_x_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_unidad_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `web_banner_descripcion`
--
ALTER TABLE `web_banner_descripcion`
  MODIFY `id_web_banner_descripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_banner_static_left`
--
ALTER TABLE `web_banner_static_left`
  MODIFY `id_web_banner_static_left` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_call_action_gray`
--
ALTER TABLE `web_call_action_gray`
  MODIFY `id_web_call_action_gray` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_costo_envio_desc`
--
ALTER TABLE `web_costo_envio_desc`
  MODIFY `id_web_costo_envio_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_footer_four_bottom_right`
--
ALTER TABLE `web_footer_four_bottom_right`
  MODIFY `id_web_footer_four_bottom_right` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `web_footer_widget`
--
ALTER TABLE `web_footer_widget`
  MODIFY `id_web_footer_widget` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `web_footer_widget_desc`
--
ALTER TABLE `web_footer_widget_desc`
  MODIFY `id_web_footer_widget_desc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `web_header`
--
ALTER TABLE `web_header`
  MODIFY `id_web_header` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `web_home_five_service`
--
ALTER TABLE `web_home_five_service`
  MODIFY `id_web_home_five_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `web_home_offer`
--
ALTER TABLE `web_home_offer`
  MODIFY `id_web_home_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_home_pricing`
--
ALTER TABLE `web_home_pricing`
  MODIFY `id_web_home_pricing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_home_video`
--
ALTER TABLE `web_home_video`
  MODIFY `id_web_home_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_mensaje_contacto`
--
ALTER TABLE `web_mensaje_contacto`
  MODIFY `id_web_mensaje_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_menu`
--
ALTER TABLE `web_menu`
  MODIFY `id_web_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `web_quienes_somos`
--
ALTER TABLE `web_quienes_somos`
  MODIFY `id_web_quienes_somos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_red_social`
--
ALTER TABLE `web_red_social`
  MODIFY `id_web_red_social` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `web_sub_menu`
--
ALTER TABLE `web_sub_menu`
  MODIFY `id_web_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_testimonio`
--
ALTER TABLE `web_testimonio`
  MODIFY `id_web_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_ubicacion`
--
ALTER TABLE `web_ubicacion`
  MODIFY `id_web_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `zona_supervision`
--
ALTER TABLE `zona_supervision`
  MODIFY `id_zona_supervision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
