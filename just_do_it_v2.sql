-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2021 a las 05:19:18
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `just_do_it_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codped` int(11) NOT NULL,
  `codusu` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `fecped` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `dirusuped` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telusuped` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `token` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nompro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `despro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `prepro` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rutimapro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nompro`, `despro`, `prepro`, `estado`, `rutimapro`) VALUES
(1, '\"RUN\" SweatBand', 'Banda para el sudor', '6.50', 1, 'accesorio1.png'),
(2, 'Botella de agua JOJI \"Lava\"', 'Botella de color negro de 300ml', '8.75', 1, 'accesorio2.png'),
(3, 'Botella de agua JOJI', 'Botella de color blanco 300ml', '8.75', 1, 'accesorio3.png'),
(4, 'Taza \"NECTAR\" adn', 'Taza color blanco ', '6.99', 1, 'accesorio4.png'),
(5, 'Gorra JOJI \"NECTAR\" ', 'Gorra negra de malla ', '9.99', 1, 'accesorio5.png'),
(6, 'NECTAR album Cassette', 'Cassette que contiene 11 canciones', '15.99', 1, 'musica2.png'),
(7, 'NECTAR album CD', 'CD que contiene 11 canciones', '10.00', 1, 'musica1.png'),
(8, 'NECTAR album Digital', 'CD en formato digital', '5.20', 1, 'musica3.png'),
(9, 'Polera \"NECTAR\"estatua Negro/Azul', 'Polera con diseño del album NECTAR', '10.50', 1, 'polera2.png'),
(10, 'Polera Nectar invertido Negro/Azul', 'Polera con el efecto de invertido', '10.50', 1, 'polera6.png'),
(11, 'Polera Nectar \"Anatomia\" Negro', 'Polera  con  tematica de cancion Anatomia', '10.50', 1, 'polera4.png'),
(12, 'Polera \"JOJI\" Blanca', 'Polera con logotipo  del artista ', '10.50', 1, 'polera5.png'),
(13, 'Polera Nectar \"Faded\" Negro/Rojo ', 'Polera con  tematica de  cancion Fadded', '10.50', 1, 'polera3.png'),
(14, 'Poleron Alive album NECTAR', 'Poleron con tematica de cancion Alive', '17.99', 1, 'poleron1.png'),
(15, 'Poleron RED album NECTAR', 'Poleron con diseño  de album NECTAR', '17.99', 1, 'poleron2.png'),
(16, 'Poleron \"GIMME LOVE\"', 'Poleron con tematica de cancion GIMME LOVE', '17.99', 1, 'poleron3.png'),
(17, 'Poleron \"GIMME LOVE\"v2', 'Poleron con diseño de cancion GIMME LOVE version 2 ', '17.99', 1, 'poleron4.png'),
(18, 'Chaqueta \"RUN\"', 'Chaqueta con diseño de cancion RUN0', '17.99', 1, 'poleron5.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codusu` int(11) NOT NULL,
  `nomusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apeusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emausu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pasusu` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nomusu`, `apeusu`, `emausu`, `pasusu`, `estado`) VALUES
(1, 'adonino', 'gonzalez', 'adonino@gmail.com', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codped`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
