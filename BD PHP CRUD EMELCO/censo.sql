-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2024 a las 18:37:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `censo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `estado` enum('disponible','ocupado') DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `fecha`, `hora_inicio`, `hora_fin`, `estado`) VALUES
(1, '2024-09-30', '08:00:00', '17:00:00', 'disponible'),
(2, '2024-09-30', '08:00:00', '14:00:00', 'disponible'),
(4, '2024-09-29', '08:00:00', '17:00:00', 'disponible'),
(5, '2024-09-29', '08:00:00', '14:00:00', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `FECNAC` date DEFAULT NULL,
  `DIR` varchar(150) DEFAULT NULL,
  `TFNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`ID`, `DNI`, `NOMBRE`, `FECNAC`, `DIR`, `TFNO`) VALUES
(1, '100', 'Juan Perez', '2001-01-01', 'Calle Falsa 123', 1234567890),
(2, '101', 'Maria Lopez', '2002-02-02', 'Calle Falsa 124', 1234567891),
(3, '102', 'Pepito Perez', '2003-03-03', 'calle falsa 12345', 1234567892),
(4, '103', 'pepitos perez', '2004-04-04', 'calle falsa 123456', 1234567893);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
