-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 20:25:35
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `iddisp` int(5) NOT NULL,
  `fechini` datetime NOT NULL,
  `fechfin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idperf` int(5) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idserv` int(5) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_disp`
--

CREATE TABLE `serv_disp` (
  `idserv` int(5) NOT NULL,
  `iddisp` int(5) NOT NULL,
  `fechpost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_disp`
--

CREATE TABLE `usr_disp` (
  `idusr` int(5) NOT NULL,
  `iddisp` int(5) NOT NULL,
  `fechpost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_perf`
--

CREATE TABLE `usr_perf` (
  `idusr` int(5) NOT NULL,
  `idperf` int(5) NOT NULL,
  `fechpost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_serv`
--

CREATE TABLE `usr_serv` (
  `idusr` int(5) NOT NULL,
  `idserv` int(5) NOT NULL,
  `fechpost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusr` int(5) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusr`, `usuario`, `email`, `contrasena`, `telefono`) VALUES
(1, '', 'claudio@hotmail.com', 'trabajando', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`iddisp`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperf`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idserv`);

--
-- Indices de la tabla `serv_disp`
--
ALTER TABLE `serv_disp`
  ADD PRIMARY KEY (`idserv`,`iddisp`,`fechpost`),
  ADD KEY `iddisp` (`iddisp`);

--
-- Indices de la tabla `usr_disp`
--
ALTER TABLE `usr_disp`
  ADD PRIMARY KEY (`idusr`,`iddisp`,`fechpost`);

--
-- Indices de la tabla `usr_perf`
--
ALTER TABLE `usr_perf`
  ADD PRIMARY KEY (`idusr`,`idperf`,`fechpost`),
  ADD KEY `idperf` (`idperf`);

--
-- Indices de la tabla `usr_serv`
--
ALTER TABLE `usr_serv`
  ADD PRIMARY KEY (`idusr`,`idserv`,`fechpost`),
  ADD KEY `idserv` (`idserv`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `iddisp` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperf` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idserv` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `serv_disp`
--
ALTER TABLE `serv_disp`
  ADD CONSTRAINT `serv_disp_ibfk_1` FOREIGN KEY (`iddisp`) REFERENCES `disponibilidad` (`iddisp`),
  ADD CONSTRAINT `serv_disp_ibfk_2` FOREIGN KEY (`idserv`) REFERENCES `servicio` (`idserv`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usr_disp`
--
ALTER TABLE `usr_disp`
  ADD CONSTRAINT `usr_disp_ibfk_1` FOREIGN KEY (`idusr`) REFERENCES `usuario` (`idusr`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usr_perf`
--
ALTER TABLE `usr_perf`
  ADD CONSTRAINT `usr_perf_ibfk_1` FOREIGN KEY (`idusr`) REFERENCES `usuario` (`idusr`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_perf_ibfk_2` FOREIGN KEY (`idperf`) REFERENCES `perfil` (`idperf`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usr_serv`
--
ALTER TABLE `usr_serv`
  ADD CONSTRAINT `usr_serv_ibfk_1` FOREIGN KEY (`idusr`) REFERENCES `usuario` (`idusr`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_serv_ibfk_2` FOREIGN KEY (`idserv`) REFERENCES `servicio` (`idserv`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
