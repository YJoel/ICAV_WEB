-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 18:07:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `icav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aporte`
--

CREATE TABLE `aporte` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aporte`
--

INSERT INTO `aporte` (`id`, `tipo`) VALUES
(1, 'Diezmo'),
(2, 'Ofrenda'),
(3, 'Accion de Gracias'),
(4, 'Pro-templo'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `idescuela` int(11) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id`, `nombre`) VALUES
(1, 'Escuela de Discipulado'),
(2, 'Escuela de Liderazgo'),
(3, 'Escuela de Musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `color` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id` int(11) NOT NULL,
  `idMiembro` int(11) DEFAULT NULL,
  `idAporte` int(11) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `finanzas`
--

INSERT INTO `finanzas` (`id`, `idMiembro`, `idAporte`, `monto`, `fecha`, `idServicio`) VALUES
(4, 1006868718, 1, 10000, '2001-06-06', 2),
(5, 1047495846, 1, 50000, '1997-05-21', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lideres`
--

CREATE TABLE `lideres` (
  `id` int(11) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idMiembro` int(11) DEFAULT NULL,
  `idMinisterio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lideres`
--

INSERT INTO `lideres` (`id`, `idRol`, `idMiembro`, `idMinisterio`) VALUES
(1, 3, 1006868718, 2),
(2, 2, 1047495846, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `identificacion` int(11) NOT NULL,
  `nombres` text DEFAULT NULL,
  `apellidos` text DEFAULT NULL,
  `genero` tinytext DEFAULT NULL,
  `tipo_sangre` tinytext NOT NULL,
  `tipo` tinytext DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `lug_nac` text DEFAULT NULL,
  `nacionalidad` text DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `estado_civil` text DEFAULT NULL,
  `dirección` text DEFAULT NULL,
  `escolaridad` text DEFAULT NULL,
  `profesion` text DEFAULT NULL,
  `indicaciones_medicas` text DEFAULT NULL,
  `iglesia_anterior` text DEFAULT NULL,
  `fecha_baut` date DEFAULT NULL,
  `conyugue` text DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `fecha_matr` date DEFAULT NULL,
  `lug_trab` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`identificacion`, `nombres`, `apellidos`, `genero`, `tipo_sangre`, `tipo`, `fecha_nac`, `lug_nac`, `nacionalidad`, `telefono`, `estado_civil`, `dirección`, `escolaridad`, `profesion`, `indicaciones_medicas`, `iglesia_anterior`, `fecha_baut`, `conyugue`, `numero_hijos`, `correo`, `fecha_matr`, `lug_trab`) VALUES
(1006868718, 'YERSON JOEL', 'GARCIA MERLANO', 'M', '', 'CC', '2001-06-06', 'SAN ANDRES', 'COLOMBIANO', 3245678790, 'Soltero', 'Sector paraíso Manzana k Lote 14', 'Universitario', '', '', '', '0000-00-00', '', 0, 'JOELGARCIA6601@GMAILCOM', '0000-00-00', ''),
(1047495846, 'YESENIA', 'PADILLA PADILLA', 'F', '', 'CC', '1997-05-21', 'SAN ANDRES', 'colombiana', 3153210369, 'Soltero', 'altos de las colinas de villa barraza', 'Universitario', '', '', '', '0000-00-00', '', 0, 'yesepadilla.21@gmail.com', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios`
--

CREATE TABLE `ministerios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ministerios`
--

INSERT INTO `ministerios` (`id`, `nombre`) VALUES
(1, 'Ministerio Pastoral'),
(2, 'Ministerio de Arte y Musica'),
(3, 'Ministerio de Audiovisuales'),
(4, 'Ministerio de Caballeros'),
(5, 'Ministerio de Damas'),
(6, 'Ministerio de Desarollo Social'),
(7, 'Ministerio de Evangelismo'),
(8, 'Ministerio de Infancia'),
(9, 'Ministerio de Jovenes'),
(10, 'Ministerio de Servicio'),
(11, 'Ministerio de Entrenamiento para Padres'),
(12, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Pastores'),
(2, 'Secretaria'),
(3, 'Lider');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `dia`) VALUES
(1, 'Servicio de Escuela Dominical', 'Domingo'),
(2, 'Servicio de Oracion', 'Miercoles'),
(3, 'Ayuno', 'Sabado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `idMiembro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aporte`
--
ALTER TABLE `aporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idescuela` (`idescuela`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMiembro` (`idMiembro`),
  ADD KEY `idAporte` (`idAporte`),
  ADD KEY `idServicio` (`idServicio`);

--
-- Indices de la tabla `lideres`
--
ALTER TABLE `lideres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idMiembro` (`idMiembro`),
  ADD KEY `idMinisterio` (`idMinisterio`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMiembro` (`idMiembro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aporte`
--
ALTER TABLE `aporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lideres`
--
ALTER TABLE `lideres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`idescuela`) REFERENCES `escuelas` (`id`);

--
-- Filtros para la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD CONSTRAINT `finanzas_ibfk_1` FOREIGN KEY (`idMiembro`) REFERENCES `miembros` (`identificacion`),
  ADD CONSTRAINT `finanzas_ibfk_2` FOREIGN KEY (`idAporte`) REFERENCES `aporte` (`id`),
  ADD CONSTRAINT `finanzas_ibfk_3` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `lideres`
--
ALTER TABLE `lideres`
  ADD CONSTRAINT `lideres_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `lideres_ibfk_2` FOREIGN KEY (`idMiembro`) REFERENCES `miembros` (`identificacion`),
  ADD CONSTRAINT `lideres_ibfk_3` FOREIGN KEY (`idMinisterio`) REFERENCES `ministerios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idMiembro`) REFERENCES `miembros` (`identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
