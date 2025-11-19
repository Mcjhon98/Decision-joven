-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2025 a las 05:47:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `descision_joven_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos_uy`
--

CREATE TABLE `departamentos_uy` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos_uy`
--

INSERT INTO `departamentos_uy` (`id_departamento`, `nombre`) VALUES
(1, 'Artigas'),
(2, 'Canelones'),
(3, 'Cerro Largo'),
(4, 'Colonia'),
(5, 'Durazno'),
(6, 'Flores'),
(7, 'Florida'),
(8, 'Lavalleja'),
(9, 'Maldonado'),
(10, 'Montevideo'),
(11, 'Paysandú'),
(12, 'Río Negro'),
(13, 'Rivera'),
(14, 'Rocha'),
(15, 'Salto'),
(16, 'San José'),
(17, 'Soriano'),
(18, 'Tacuarembó'),
(19, 'Treinta y Tres'),
(20, 'Anónimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `documento` varchar(8) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `register`
--

INSERT INTO `register` (`id`, `nombre`, `documento`, `telefono`, `id_departamento`) VALUES
(1, 'Pablo', '12345678', '123456789', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento` varchar(8) NOT NULL,
  `testimonio` longtext NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `edad` varchar(99) DEFAULT NULL,
  `imgurl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `nombre`, `documento`, `testimonio`, `id_departamento`, `edad`, `imgurl`) VALUES
(1, 'Martin santana', '57233018', 'Soy ramboooooooooooooooooooooo', 19, '17', 'https://cdn11.bigcommerce.com/s-ydriczk/images/stencil/1500x1500/products/56719/56550/ss2952430_-_photograph_of_this_product_is_deleted_sylvester_stallone_as_john_j_rambo_from_rambo__first_blood_part_ii_available_in_4_sizes_framed_or_unframed_buy_now_at_starstills__08147.1394492721.jpg?c=2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos_uy`
--
ALTER TABLE `departamentos_uy`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `documento_2` (`documento`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_testimonios_departamentos` (`id_departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos_uy`
--
ALTER TABLE `departamentos_uy`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos_uy` (`id_departamento`);

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `fk_testimonios_departamentos` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos_uy` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
