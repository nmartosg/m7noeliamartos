-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2020 a las 19:17:55
-- Versión del servidor: 5.7.32-0ubuntu0.16.04.1
-- Versión de PHP: 7.2.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nmartos_a5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nom`) VALUES
(1, 'Alimentacio'),
(2, 'Roba'),
(3, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producte`
--

CREATE TABLE `categoria_producte` (
  `producte_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria_producte`
--

INSERT INTO `categoria_producte` (`producte_id`, `categoria_id`) VALUES
(2, 1),
(1, 2),
(3, 2),
(4, 2),
(7, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imatges`
--

CREATE TABLE `imatges` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `ruta` varchar(200) COLLATE utf8_bin NOT NULL,
  `producte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `imatges`
--

INSERT INTO `imatges` (`id`, `nom`, `ruta`, `producte_id`) VALUES
(10, 'samarreta.jpg', 'imatges/2/samarreta.jpg', 3),
(11, 'pantalones.jpg', 'imatges/2/pantalones.jpg', 4),
(12, 'sudaderua roja.jpg', 'imatges/2/sudaderua roja.jpg', 7),
(13, 'macarrons.jpg', 'imatges/1/macarrons.jpg', 2),
(14, 'movil.jpg', 'imatges/2/movil.jpg', 8),
(16, 'bambas.jpg', 'imatges/2/bambas.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `id` int(11) NOT NULL,
  `nom` varchar(11) COLLATE utf8_bin NOT NULL,
  `preu` float NOT NULL,
  `descripcio` text COLLATE utf8_bin NOT NULL,
  `usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `preu`, `descripcio`, `usuari_id`) VALUES
(1, 'bambes', 51, 'blanques ', 2),
(2, 'macarrons', 1, 'de 1kg', 1),
(3, 'samarreta', 15, 'de maniga curta', 2),
(4, 'pantalons', 33, 'de color grisos', 2),
(7, 'sudadera', 20, 'roja', 2),
(8, 'movil', 700, 'iphone11', 2),
(9, 'chanclas', 10, 'negras', 2),
(12, 'bolsa', 54, 'mf', 2),
(13, 'ordenador', 750, 'huawei', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'normaluser');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `password` varchar(80) COLLATE utf8_bin NOT NULL,
  `rols_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `email`, `password`, `rols_id`) VALUES
(1, 'Noelia', 'noelia@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'noe', 'noe@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(7, 'Martos', 'noeliamartos2001@gmail.com', '226c71e5ceb5183fb5b6db2a7aca6cc6', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_producte`
--
ALTER TABLE `categoria_producte`
  ADD PRIMARY KEY (`producte_id`,`categoria_id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Indices de la tabla `imatges`
--
ALTER TABLE `imatges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producte` (`producte_id`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuari_id` (`usuari_id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rols` (`rols_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imatges`
--
ALTER TABLE `imatges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_producte`
--
ALTER TABLE `categoria_producte`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fl_producte` FOREIGN KEY (`producte_id`) REFERENCES `productes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imatges`
--
ALTER TABLE `imatges`
  ADD CONSTRAINT `fk_producte` FOREIGN KEY (`producte_id`) REFERENCES `productes` (`id`);

--
-- Filtros para la tabla `productes`
--
ALTER TABLE `productes`
  ADD CONSTRAINT `fk_usuari_id` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`id`);

--
-- Filtros para la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD CONSTRAINT `fk_rols` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
