-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 14:10:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_tanques`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenamiento`
--

CREATE TABLE `almacenamiento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tanque_id` int(11) NOT NULL,
  `municion_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `combustible_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `almacen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `combustible`
--

INSERT INTO `combustible` (`id`, `nombre`, `descripcion`, `almacen_id`) VALUES
(1, 'Gasolina', 'Combustible líquido derivado del petróleo', NULL),
(2, 'Diésel', 'Combustible líquido derivado del petróleo con mayor densidad que la gasolina', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_tipo` varchar(20) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municiones`
--

CREATE TABLE `municiones` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municiones`
--

INSERT INTO `municiones` (`id`, `tipo`, `descripcion`, `cantidad`, `precio`) VALUES
(1, 'AP-T', 'Municiones perforantes y trazadoras', 900, 290),
(2, 'HEAT', 'Alto poder explosivo antitanque o high-explosive anti-tank ', 9000, 600),
(3, 'APFSDS', 'Armour Piercing Fin-Stabilised Discarding Sabot', 98100, 1200),
(4, 'HE', 'munición explosiva de alto explosivo , M830 , OF-19, etc ', 20000, 80),
(5, 'APDS ', ' Armor-Piercing Discarding Sabot , BM-15 ,  M392A2, M728, L44, L55, DM13', 9000, 200),
(6, 'APCR  ', 'Armor-Piercing Composite Rigid, La munición APCR se compone de un núcleo de metal duro, generalmente de tungsteno o uranio empobrecido, y un revestimiento exterior de material más suave, como el aluminio o el acero , M313, M346 , BR-350A, BR-350B', 16000, 500),
(7, 'HEI ', 'munición de alto explosivo que está diseñada para destruir aviones y helicópteros. También tiene la capacidad de causar daños a vehículos terrestres , 3UOR6 etc', 40000, 120),
(8, 'HEDP', 'High Explosive Dual Purpose , M430A1  , OFZAB-50 HEDP', 93200, 238),
(9, 'HE-T', 'High Explosive-Tracer , M393A2 , DM12', 2900, 267),
(10, 'HEAT-FS', 'High Explosive Anti-Tank-Fin Stabilized, DM13A1', 1500, 149);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `nombreUsuuario` varchar(255) DEFAULT NULL,
  `tanque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `id_almacenamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanques`
--

CREATE TABLE `tanques` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` enum('IFV','APC','MBT') NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio_unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tanques`
--

INSERT INTO `tanques` (`id`, `nombre`, `tipo`, `stock`, `descripcion`, `precio_unidad`) VALUES
(1, 'T-90a', 'MBT', 2, 'El tanque T-90A es un vehículo blindado de combate de origen ruso, fabricado por la empresa Uralvagonzavod. Es uno de los tanques más avanzados en servicio actualmente en el Ejército ruso', 1000000000),
(2, 'Leopard 2A7', 'MBT', 10, 'Leopard 2A7 es un tanque principal de batalla aleman.', 20000000),
(3, 'BMT-2M', 'IFV', 20, ' es un vehículo de combate de infantería soviético/ruso con capacidad anfibia', 10000),
(4, 'BMP-3', 'IFV', 20, 'Vehículo de combate de infantería ruso con capacidad anfibia, armado con un cañón de 100 mm, ametralladoras y misiles guiados.', 300000),
(5, 'Puma', 'IFV', 2, 'utilizado por el Ejército Alemán, armado con un cañón automático de 30 mm, misiles MELLS y ametralladoras.', 40000000),
(6, 'Bumerang', 'IFV', 12, 'IFV ruso de nueva generación, armado con un cañón de 30 mm, misiles Kornet y ametralladoras.', 400000),
(7, 'K2 Black Panther', 'MBT', 14, 'anque de batalla principal utilizado por el Ejército de Corea del Sur, armado con un cañón de 120 mm, ametralladoras y lanzadores de granadas.', 900000000),
(8, ' ZTZ-98', 'MBT', 8, 'es un tanque de batalla principal desarrollado por China a finales de los años 90. Es uno de los tanques más avanzados que ha desarrollado el Ejército Popular de Liberación Chino (EPL) y se considera un rival del tanque de batalla principal ruso T-90.', 80000000),
(9, 'Challenger 2', 'MBT', 0, 'es un tanque de batalla principal británico diseñado y fabricado por la empresa BAE Systems Land (anteriormente conocida como Vickers Defense Systems). Fue introducido en servicio en el año 1998, y es el sucesor del Challenger 1.', 90000000),
(11, 'Boxer', 'APC', 2, ' vehículo de combate blindado polivalente diseñado por un consorcio internacional para realizar una serie de operaciones mediante el uso de módulos de misión instalables', 300000),
(12, 'BTR-80', 'APC', 60, ' es un vehículo 8x8 con ruedas, blindado anfibio para el transporte de personal de infantería (APC) diseñado en la Unión Soviética', 20000),
(13, 'M113', 'APC', 50, 'es un transporte blindado de personal con orugas que fue desarrollado y producido por la empresa estadounidense FMC Corporation. ', 140000),
(14, 'Stryker ', 'APC', 14, '    Es un vehículo blindado estadounidense utilizado por el ejército de Estados Unidos. Tiene una tripulación de dos personas y puede transportar hasta 9 soldados.\r\n\r\n', 1900000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo_electronico`, `contrasena`) VALUES
(11, 'yankoneitor', 'yankogc03@gmail.com', 'adidas'),
(12, 'yankoneitor', 'yankogc2@gmail.com', 'adidas'),
(14, 'yankoneitor', 'manolinmanolon@gmail.com', 'a'),
(23, '', '', ''),
(24, '', '', ''),
(25, '', '', 'a'),
(26, '', '', 'adidas'),
(27, '', '', ''),
(28, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tanque_id` (`tanque_id`),
  ADD KEY `municion_id` (`municion_id`),
  ADD KEY `combustible_id` (`combustible_id`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `municiones`
--
ALTER TABLE `municiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_id` (`usuario_id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacenamiento` (`id_almacenamiento`);

--
-- Indices de la tabla `tanques`
--
ALTER TABLE `tanques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `municiones`
--
ALTER TABLE `municiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tanques`
--
ALTER TABLE `tanques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  ADD CONSTRAINT `almacenamiento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `almacenamiento_ibfk_2` FOREIGN KEY (`tanque_id`) REFERENCES `tanques` (`id`),
  ADD CONSTRAINT `almacenamiento_ibfk_3` FOREIGN KEY (`municion_id`) REFERENCES `municiones` (`id`),
  ADD CONSTRAINT `almacenamiento_ibfk_4` FOREIGN KEY (`combustible_id`) REFERENCES `combustible` (`id`);

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_almacenamiento`) REFERENCES `almacenamiento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
