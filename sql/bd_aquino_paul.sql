-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2025 a las 01:40:34
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
-- Base de datos: `bd_aquino_paul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `venta_id`, `id_producto`, `detalle_cantidad`, `detalle_precio`) VALUES
(4, 4, 5, 1, 50000),
(5, 4, 6, 1, 20000),
(6, 5, 5, 1, 50000),
(7, 6, 5, 1, 50000),
(8, 7, 5, 1, 50000),
(9, 8, 6, 1, 20000),
(10, 9, 6, 1, 20000),
(11, 9, 3, 1, 10000),
(12, 10, 6, 1, 20000),
(13, 10, 3, 1, 10000),
(14, 11, 8, 1, 100000),
(15, 12, 8, 1, 100000),
(16, 12, 9, 2, 200000),
(17, 12, 7, 1, 25000),
(18, 13, 8, 1, 100000),
(19, 13, 9, 1, 200000),
(20, 14, 8, 1, 100000),
(21, 14, 10, 1, 150000),
(22, 14, 7, 1, 25000),
(23, 15, 10, 1, 150000),
(24, 15, 7, 1, 25000),
(25, 16, 8, 16, 100000),
(26, 17, 13, 3, 500000),
(27, 17, 10, 5, 150000),
(28, 18, 10, 1, 150000),
(29, 19, 7, 1, 25000),
(30, 20, 13, 1, 500000),
(31, 21, 9, 7, 200000),
(32, 22, 6, 1, 20000),
(33, 22, 12, 5, 180000),
(34, 23, 10, 2, 150000),
(35, 24, 13, 1, 500000),
(36, 25, 13, 1, 500000),
(37, 25, 12, 1, 180000),
(38, 26, 13, 1, 500000),
(39, 27, 13, 2, 500000),
(40, 28, 15, 1, 170000),
(41, 29, 13, 1, 500000),
(42, 30, 13, 30, 500000),
(43, 31, 16, 2, 200000),
(44, 32, 16, 1, 200000),
(45, 33, 16, 1, 200000),
(46, 34, 16, 16, 200000),
(47, 35, 6, 1, 20000),
(48, 35, 18, 2, 650000),
(49, 36, 18, 8, 650000),
(50, 37, 6, 1, 20000),
(51, 37, 17, 1, 500000),
(52, 38, 13, 1, 500000),
(53, 39, 13, 2, 500000),
(54, 40, 13, 1, 500000),
(55, 41, 13, 1, 500000),
(56, 42, 13, 1, 500000),
(57, 43, 13, 2, 500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--

CREATE TABLE `mensajes_contacto` (
  `id_mensajes_contacto` int(11) NOT NULL,
  `nombre_completo` varchar(40) NOT NULL,
  `correo_electronico` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `asunto` varchar(25) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes_contacto`
--

INSERT INTO `mensajes_contacto` (`id_mensajes_contacto`, `nombre_completo`, `correo_electronico`, `telefono`, `asunto`, `mensaje`, `leido`) VALUES
(8, 'paul aquino', 'aquinopaul2002@gmail.com', '3716400743', 'reclamo', 'La notebook que compre no enciende ', 1),
(9, 'leonel alegre', 'leonel@gmail.com', '3718712312', 'consulta', 'hola buenas, cuando van a tener en stock de procesador intel i3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id_metodo_pago`, `descripcion`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de crédito'),
(3, 'Tarjeta de débito'),
(4, 'Transferencia bancaria'),
(5, 'Billetera virtual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `persona_mail` varchar(150) NOT NULL,
  `persona_pass` varchar(150) NOT NULL,
  `persona_nombre` varchar(100) NOT NULL,
  `persona_apellido` varchar(100) NOT NULL,
  `persona_estado` tinyint(2) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `persona_telefono` varchar(20) NOT NULL,
  `persona_dni` varchar(20) NOT NULL,
  `persona_fecha_nacimiento` date NOT NULL,
  `persona_direccion` varchar(255) NOT NULL,
  `persona_ciudad` varchar(100) NOT NULL,
  `persona_provincia` varchar(100) NOT NULL,
  `persona_codigo_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `persona_mail`, `persona_pass`, `persona_nombre`, `persona_apellido`, `persona_estado`, `perfil_id`, `persona_telefono`, `persona_dni`, `persona_fecha_nacimiento`, `persona_direccion`, `persona_ciudad`, `persona_provincia`, `persona_codigo_postal`) VALUES
(12, 'Leonelfalegre@gmail.com', '$2y$10$saKZi/NTfY5kvHVTiPjYhOUPp/NLgUGzBKfX2XNHRX40WfR2thlu6', 'Leonel Francisco', 'Alegre', 1, 1, '3718529832', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(13, 'dardodavidaguirre93@gmail.com', '$2y$10$bYIdU0DLLNU7pP8v3ogMTuj3CU.yYnAzNCt/0.q/2Pd.Erul.Zk3C', 'David ', 'Aguirre', 1, 2, '3704215487', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(14, 'aquinopaul2002@gmail.com', '$2y$10$tyqUosZEVmr9jbajEwrL4eb.74NTgi2GDc2gv0KHhkb6hm9wFXWvu', 'paul', 'aquino', 1, 1, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(15, 'leonel@gmail.com', '$2y$10$4SIDLALYN93HB2jLAmWF0Ok.PVsgzRZWf4rLH7bTaANn0Xm.Duv82', 'Francisco', 'Alegre', 1, 2, '3716400743', '44464201', '2002-12-09', 'Agustin Pedro Justo', 'Corrientes Capital', 'Corrientes', '3400'),
(16, 'juanperez@gmail.com', '$2y$10$LbKO/JZhcmS6QH.PYFK2BOyiZtnKYhLJ3fMiBZzv/yDRp3AVQK5/m', 'juan', 'perez', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(17, 'pedroprueba@gmail.com', '$2y$10$3//pOx7H61dzq5P/bghjiuKicpVE3eqHCjo.hfIanmG3wsCXyT0OO', 'pedro ', 'prueba', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(18, 'martin@gmail.com', '$2y$10$isksTGB6iz5JM6p4WPfmTe9YH6fpGv7peAm.htLKplNzD3Zlzce3K', 'martin', 'Aquino', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(19, 'pruebaaaa@gmail.com', '$2y$10$npBH1umTJy5ws6zUajYHJ.TW/Amp57uV42iAUwMfK5LwAOXwLfpiS', 'prueba', 'prueba', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(20, 'juanperez@gmail.com', '$2y$10$X1huQ4FmZbJGAELeHRFs2ef4/1cS0Okfvknl7eQxYe0HNtj6nN6JK', 'juan', 'perez', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(21, 'leonel@gmail.com', '$2y$10$g7c73NRId3ul2gRitDXiB.vqmq5oXPFyxNt5z8OtKnevUAqJ7v5b6', 'martin', 'prueba', 1, 2, '3718712312', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(22, 'leonel@gmail.com', '$2y$10$uMy9W5TmHfIz5N2JfOHfWuCwtgyOvJuSB8Ps5UTzoextZGT9aXKtK', 'paul', 'aquino', 1, 2, '3716400743', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(23, 'prueba1@gmail.com', '$2y$10$RqTGXMm.mtI3hHIT76yYCe10dT4Cyuuo8OHNNktIPGVAZul8Z7tyi', 'prueba1', 'prueba1', 1, 2, '3718712312', 'PENDIENTE', '1900-01-01', 'PENDIENTE', 'PENDIENTE', 'PENDIENTE', '0000'),
(24, 'carlos@gmail.com', '$2y$10$1Ml3zG0QPT5y/.sxxgsdI.2PNZHVAXmWLxY/4qbT7INGuVZ57JD4u', 'Carlos', 'Aquino', 1, 2, '3716400743', '44464201', '2002-12-09', 'Agustin Pedro justo 2228', 'Corrientes', 'Corrientes', '3400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `producto_categoria` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `producto_estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `stock`, `producto_categoria`, `imagen`, `producto_estado`) VALUES
(3, 'Mouse', 10000, 'Mouse Gamer2', 20, 1, '1750384566_f8a93a24a4cfa5bc7274.webp', 1),
(4, 'Teclado', 5000, 'Teclado Inalambrico ', 20, 1, '1750384551_b9c79953894a7c625e3e.jpg', 1),
(5, 'Organizador', 50000, 'Mueble Organizador ', 20, 2, '1750384535_b0453312652e781d00ff.jpg', 1),
(6, 'Heladera', 20000, 'Heladera ', 8, 3, '1750384518_782543d06d8c92197e90.webp', 1),
(7, 'Mouse', 25000, 'mouse gamer', 40, 1, '1750289816_ae767f7a026d1fff636c.webp', 1),
(8, 'Heladera', 100000, 'Heladera dream', 0, 3, '1750289858_69cce197e12528a7e66b.webp', 1),
(9, 'Sofa', 200000, 'sofa de tres cuerpos color negro', 20, 2, '1750289887_d71ff1bbdc2acfb83c02.webp', 1),
(10, 'Mesa de comedor ', 150000, 'mesa de algarrobo de 140x210 cm', 0, 2, '1750357191_8640df7a0f0ffa31b7b8.webp', 1),
(11, 'Placard ', 300000, 'placard de melanina, tamaño 1,60 x 2,00 mts', 5, 2, '1750358055_9497af8eac57df0a879d.webp', 1),
(12, 'Silla Gamer', 180000, 'Silla gamer con regulador de altura, marca razer', 34, 2, '1750358113_a05b19a67ebdb5c41049.webp', 1),
(13, 'Fuente ', 500000, 'fuente de energia generica', 42, 1, '1750358149_57abde953aaf465316ca.webp', 1),
(14, 'PC Gamer', 500000, 'PC GAMER AEROCOOL RYZEN 7 5700G 16GB SSD 480 SIN SISTEMA (500W 80 BRONZE)', 20, 1, '1750383056_b2f0da8b04920bb60056.jpg', 1),
(15, 'Monitor LED', 170000, 'MONITOR LED 215 PHILIPS 221V877 - FHD VGA-HDMI 169', 9, 1, '1750383128_ac8b621234c6b106f3ad.jpg', 1),
(16, 'Escritorio', 200000, 'Escritorio flotante', 0, 2, '1750383216_98c4ffb44c784f34e861.jpg', 1),
(17, 'Horno', 500000, 'HORNO MORELLI PAMPA 600 - 60CM ACERO INOX- TAPA CIEGA', 9, 4, '1750383334_3830df87e2966abe4f56.jpg', 1),
(18, 'Cocina', 650000, 'COCINA DREAN CD5603AB0 MULTIGAS CON LUZ CON ENCENDIDO BLANCA', 0, 4, '1750945450_65b3a8cc4c4811d6bc4c.jpg', 1),
(19, 'Pozo de Frio ', 800000, 'Pozo de Frio INELRO FIH-1200', 10, 4, '1750945516_471880650080e81243ab.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id_categoria`, `categoria_descripcion`) VALUES
(1, 'Informatica\r\n'),
(2, 'Muebles\r\n'),
(3, 'Electrodomesticos\r\n'),
(4, 'Linea Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `venta_fecha` datetime NOT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_cliente`, `venta_fecha`, `id_metodo_pago`) VALUES
(4, 15, '2025-06-17 00:00:00', NULL),
(5, 15, '2025-06-17 00:00:00', NULL),
(6, 15, '2025-06-17 00:00:00', NULL),
(7, 15, '2025-06-17 00:00:00', NULL),
(8, 15, '2025-06-17 00:00:00', NULL),
(9, 15, '2025-06-17 00:00:00', NULL),
(10, 15, '2025-06-17 00:00:00', NULL),
(11, 15, '2025-06-19 00:00:00', NULL),
(12, 15, '2025-06-19 00:00:00', NULL),
(13, 15, '2025-06-19 00:00:00', NULL),
(14, 15, '2025-06-19 00:00:00', NULL),
(15, 15, '2025-06-19 21:20:37', NULL),
(16, 15, '2025-06-19 18:47:36', NULL),
(17, 17, '2025-06-19 19:09:55', NULL),
(18, 18, '2025-06-19 20:08:22', NULL),
(19, 18, '2025-06-19 20:11:39', NULL),
(20, 18, '2025-06-19 20:11:47', NULL),
(21, 15, '2025-06-19 20:24:41', NULL),
(22, 15, '2025-06-19 21:34:45', NULL),
(23, 15, '2025-06-19 21:40:11', NULL),
(24, 15, '2025-06-19 21:45:06', NULL),
(25, 15, '2025-06-19 21:51:53', NULL),
(26, 15, '2025-06-19 21:54:18', NULL),
(27, 15, '2025-06-19 22:02:13', NULL),
(28, 15, '2025-06-20 20:47:51', NULL),
(29, 15, '2025-06-25 20:48:57', NULL),
(30, 15, '2025-06-25 20:49:35', NULL),
(31, 15, '2025-06-25 20:50:45', NULL),
(32, 15, '2025-06-26 08:17:13', NULL),
(33, 15, '2025-06-26 08:19:09', NULL),
(34, 15, '2025-06-26 08:31:35', NULL),
(35, 15, '2025-06-26 10:52:55', NULL),
(36, 15, '2025-06-26 10:53:41', NULL),
(37, 15, '2025-06-26 10:55:32', NULL),
(38, 24, '2025-06-26 16:18:00', NULL),
(39, 24, '2025-06-26 16:49:50', NULL),
(40, 24, '2025-06-26 16:51:23', NULL),
(41, 24, '2025-06-26 16:57:26', NULL),
(42, 24, '2025-06-26 17:14:17', NULL),
(43, 15, '2025-06-26 19:56:08', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `venta_id` (`venta_id`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id_mensajes_contacto`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`producto_categoria`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `fk_ventas_metodo_pago` (`id_metodo_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id_mensajes_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`producto_categoria`) REFERENCES `producto_categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_ventas_metodo_pago` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id_metodo_pago`),
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
