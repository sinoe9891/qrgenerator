-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2023 a las 01:11:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boleteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(200) NOT NULL,
  `contacto_cliente` varchar(200) NOT NULL,
  `correo_cliente1` varchar(200) NOT NULL,
  `celular1` varchar(20) NOT NULL,
  `correo_cliente2` varchar(200) NOT NULL,
  `celular2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `contacto_cliente`, `correo_cliente1`, `celular1`, `correo_cliente2`, `celular2`) VALUES
(1, 'BMTICKET', 'Kevin Irias', 'kirias@gmail.com', '123', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(200) NOT NULL,
  `ruta_logo_evento` varchar(200) NOT NULL,
  `id_cliente_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `ruta_logo_evento`, `id_cliente_evento`) VALUES
(1, 'THERION', 'img/Logoliverock.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoacceso`
--

CREATE TABLE `tipoacceso` (
  `id_tipoacceso` int(11) NOT NULL,
  `nombreacceso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipoacceso`
--

INSERT INTO `tipoacceso` (`id_tipoacceso`, `nombreacceso`) VALUES
(1, 'PRODUCCIÓN'),
(2, 'THERION'),
(3, 'VENUE'),
(4, 'SEGURIDAD'),
(5, 'TÉCNICOS'),
(6, 'TRANSPORTE'),
(7, 'ACCESOS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `tipoacceso`
--
ALTER TABLE `tipoacceso`
  ADD PRIMARY KEY (`id_tipoacceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipoacceso`
--
ALTER TABLE `tipoacceso`
  MODIFY `id_tipoacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
