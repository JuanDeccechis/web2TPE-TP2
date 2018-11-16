-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2018 a las 02:41:18
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
-- Base de datos: `web2usuarios`
--
CREATE DATABASE IF NOT EXISTS `web2usuarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2usuarios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosusuario`
--

CREATE TABLE `permisosusuario` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `alta` tinyint(1) NOT NULL,
  `baja` tinyint(1) NOT NULL,
  `modificacion` tinyint(1) NOT NULL,
  `visualizacion` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `altaComentario` tinyint(1) NOT NULL,
  `inmortal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'juan', '$2y$10$ZvhgxzKo3ANSHrHz/XpBXuqXjwFsI1HohsxqC0Tqw6WHWTwH.GPKu'),
(2, 'andres', '$2y$10$sw4HN33NKJ0t67BftE6kVua7xvQFYY8AVLKJPqPv8S7oDVsWXqSQO'),
(3, 'ultimo', '$2y$10$yc5vEHT/xb0Ssv5NT.38a.kWyC3PK4q1qxwJmFPa1QQib5ZtkQOwu'),
(4, 'ljr', '$2y$10$uiXhLZrMPEr9HHV6DdYlt.oJzWqS8hYyuIOYbAnvzuCS2yAPY1j7O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisosusuario`
--
ALTER TABLE `permisosusuario`
  ADD PRIMARY KEY (`id`,`idUsuario`),
  ADD KEY `permisosusuario_ibfk_1` (`idUsuario`);

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
-- AUTO_INCREMENT de la tabla `permisosusuario`
--
ALTER TABLE `permisosusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisosusuario`
--
ALTER TABLE `permisosusuario`
  ADD CONSTRAINT `permisosusuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
