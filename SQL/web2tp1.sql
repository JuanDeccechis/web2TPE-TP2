-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2018 a las 02:40:58
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2tp1`
--
CREATE DATABASE IF NOT EXISTS `web2tp1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2tp1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `descripcion`) VALUES
(1, 'carrera1', 'agreg'),
(2, 'car sin cat', 'agregada'),
(3, 'carrera 2', 'agregada'),
(4, 'carrera 3', 'desde frontend');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedra`
--

CREATE TABLE `catedra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL,
  `cant_alumnos` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catedra`
--

INSERT INTO `catedra` (`id`, `nombre`, `link`, `cant_alumnos`, `id_carrera`) VALUES
(2, 'user', 'http/prog_1', 2, 1),
(3, 'catedra 2', 'http/prog_2', 1, 1),
(4, 'catedra 1', 'agregad', 1, 3),
(5, 'con imagen', 'agregada', 1, 1),
(49, 'asdqwr', 'as', 1, 4),
(50, 'ultima', 'asd', 1, 4),
(51, 'lalala', 'sasada', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `idCatedra` int(11) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `idCatedra`, `direccion`) VALUES
(31, 2, 'images/5beb6f7de4a5b.png'),
(32, 2, 'images/5beb6f7de88dc.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `pass` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nickname`, `pass`) VALUES
(1, 'juan', '$2y$10$dC4rtG4juiZKIQ9IYvGpoeeh5x9DPqJ3aW37.tepitqCCRmSqIKn.'),
(2, 'andres', '$2y$10$sw4HN33NKJ0t67BftE6kVua7xvQFYY8AVLKJPqPv8S7oDVsWXqSQO'),
(3, 'ultimo', '$2y$10$yc5vEHT/xb0Ssv5NT.38a.kWyC3PK4q1qxwJmFPa1QQib5ZtkQOwu'),
(4, 'ljr', '$2y$10$uiXhLZrMPEr9HHV6DdYlt.oJzWqS8hYyuIOYbAnvzuCS2yAPY1j7O'),
(5, 'asd', '$2y$10$5AckXuZdE4KbFVnT7ADCXeQLo65EIxOrDxmKpMSe66nS6aFIyMsW6'),
(6, 'zxc', '$2y$10$gx3XTufoWOhrIFk/w1lwjOiiYqwZxYEw1khB6Sr9DHo96EukQty72');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catedra`
--
ALTER TABLE `catedra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`,`idCatedra`),
  ADD KEY `imagen_ibfk_1` (`idCatedra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nickname`),
  ADD UNIQUE KEY `nombre_2` (`nickname`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catedra`
--
ALTER TABLE `catedra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catedra`
--
ALTER TABLE `catedra`
  ADD CONSTRAINT `catedra_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idCatedra`) REFERENCES `catedra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
