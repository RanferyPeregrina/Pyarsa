-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 03:05:10
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
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `id_carrito` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `precio_total` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `descripcion_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id_detalle` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(9) NOT NULL,
  `precio_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedido`
--

INSERT INTO `detalles_pedido` (`id_detalle`, `id_pedido`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(1, 10, 10, 24, 560),
(2, 10, 17, 98, 380),
(3, 11, 11, 17, 385),
(4, 11, 18, 682, 280),
(5, 12, 2, 59, 420),
(6, 12, 7, 80, 456),
(7, 13, 1, 147, 385),
(8, 14, 1, 74, 385),
(9, 15, 1, 74, 385),
(10, 15, 6, 261, 343),
(11, 15, 8, 35, 520),
(12, 16, 3, 56, 390),
(13, 17, 11, 17, 385),
(14, 18, 3, 129, 390),
(15, 18, 5, 69, 820),
(16, 18, 1, 56, 385),
(17, 19, 1, 74, 385),
(18, 19, 8, 50, 520),
(19, 20, 1, 1, 385),
(20, 20, 8, 4, 520);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_usuarios`
--

CREATE TABLE `direcciones_usuarios` (
  `id_direccion` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `calle` varchar(10) NOT NULL,
  `ciudad` varchar(12) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `codigo_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `fecha_envio` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `empresa_envio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` int(10) NOT NULL,
  `cantidad_disponible` int(10) NOT NULL,
  `fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `cantidad_disponible`, `fecha_actualizacion`) VALUES
(1, 398, '2024-11-17'),
(2, 400, '2024-11-17'),
(3, 400, '2024-11-17'),
(4, 400, '2024-11-17'),
(5, 400, '2024-11-17'),
(6, 400, '2024-11-17'),
(7, 400, '2024-11-17'),
(8, 392, '2024-11-17'),
(9, 400, '2024-11-17'),
(10, 400, '2024-11-17'),
(11, 400, '2024-11-17'),
(12, 400, '2024-11-17'),
(13, 400, '2024-11-17'),
(14, 400, '2024-11-17'),
(15, 400, '2024-11-17'),
(16, 400, '2024-11-17'),
(17, 400, '2024-11-17'),
(18, 400, '2024-11-17'),
(19, 400, '2024-11-17'),
(20, 400, '2024-11-17'),
(21, 400, '2024-11-17'),
(22, 400, '2024-11-17'),
(23, 400, '2024-11-17'),
(24, 400, '2024-11-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodoPago` int(10) NOT NULL,
  `tipo_metodoPago` varchar(10) NOT NULL,
  `descripcion_metodoPago` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id_metodoPago`, `tipo_metodoPago`, `descripcion_metodoPago`) VALUES
(1, 'Tarjeta de', 'Tarjeta bancaria con valor de crédito.'),
(2, 'Ecectivo', 'Pague en efectivo al recibir o llegar a una sucursal'),
(3, 'Tarjeta de', 'Tarjeta de nómina con ahorro bancario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `id_metodoPago` int(10) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto_pagado` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_pedido`, `id_metodoPago`, `fecha_pago`, `monto_pagado`) VALUES
(6, 15, 0, '2024-11-18', 136213),
(7, 17, 0, '2024-11-18', 6545),
(8, 18, 0, '2024-11-18', 128450),
(9, 19, 0, '2024-11-19', 54490),
(10, 20, 0, '2024-11-19', 2465);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `total_pedido` float NOT NULL,
  `estado_pedido` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `fecha_pedido`, `total_pedido`, `estado_pedido`) VALUES
(20, 3, '2024-11-19', 2465, 'En tránsito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `precio_producto` float NOT NULL,
  `descripcion_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `descripcion_producto`) VALUES
(1, 'Piso Cerámico', 385, 'Material: cerámica. brinda gran recubrimiento en espacios interiores del hogar. Tamaño: 33x33cm'),
(2, 'Piso Olmoso', 420, 'Cerámico esmaltado, para espacios exterior, tamaño: 37x37cm'),
(3, 'Piso Alder', 390, 'cerámica Piso cerámico para cubrir tus espacios en el interior o exterior. Tamaño: 33x33cm'),
(4, 'Piso cerámico león', 385, 'Es resistente a las manchas, productos químicos, la abrasión en grado III, rayos uv y no es flamable'),
(5, 'Piso Maui', 820, 'Material: marmol Puede instalarse en espacios en el interior como exterior. 44x44cm'),
(6, 'Piso Praga', 343, 'absorción de agua de 3-7%, es resistente a las sustancias químicas y manchas. Tamaño: 50x50cm'),
(7, 'Piso Rocalla', 456, 'Recomendado para interior y exterior, para áreas como cocina, recámara y comedor. Tamaño: 55x5'),
(8, 'Piso Allpess Multicolor', 520, 'Porcelana Para uso en piso y pared, recomendado para interior y exterior. Tamaño: 45x45 cm'),
(9, 'Piso Gale', 385, 'Porcelana Para uso en piso y pared, recomendado para interior y exterior. Tamaño: 43x43cm'),
(10, 'Piso Mixtone', 560, 'Cemento, Brinda gran recubrimiento en espacios de uso comercial con tráfico ligero. Tamaño: 50x50cm'),
(11, 'Piso Hábitat', 385, 'Cerámica Apta para instalar en interiores como recámaras, baños, salas. Tamaño: 60x60cm'),
(12, 'Piso época', 400, 'Cemento, Para uso en piso y pared, recomendado para interior y exterior. Tamaño: 20x20 cm'),
(13, 'Piso cerámico tranto', 420, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(14, 'Piso ceramico copana', 560, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(15, 'Piso greta', 460, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 37x37 cm'),
(16, 'Piso cerámico caruzzo', 440, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(17, 'Piso ceramico tamaran', 380, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(18, 'Piso cerámico gutan', 280, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(19, 'Piso morelos', 320, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(20, 'Piso marbele', 385, 'Recubrimiento perfecto para tu hogar, ofrece una excelente cobertura. Con su tamaño de 33x3 cm'),
(21, 'Piso Volkano Grafito', 155, 'Ceramico acabado mate tipo piedra estructurada en diferentes tonos de grises. Tamaño: 45x45cm'),
(22, 'Piso Leira', 125, 'Porcelana Para uso en piso y pared, recomendado para interior y exterior. Tamaño: 43x43cm'),
(23, 'Piso Asis', 135, 'Material: cerámica Piso cerámico marca daltile modelo asis color gris Tamaño: 37x37cm'),
(24, 'Piso Chert', 199, 'Ceramica acabado mate en color anis que brinda gran recubrimiento en espacios. Tamaño: 35.7x35.7 cm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id_usuario` int(10) NOT NULL,
  `id_tipo_usuario` tinyint(10) NOT NULL,
  `descripcion_tipo_usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Contra` varchar(100) NOT NULL,
  `Domicilio` varchar(255) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `Contra`, `Domicilio`, `Telefono`, `tipo_usuario`) VALUES
(1, 'Nombre1', 'Nombre1@ejemplo.com', 'a2', 'asdasdsadasd', '1234', 0),
(3, 'Ranfery', 'correoprueba@hotmail.com', 'asdf', 'Calle de ejemplo, Av. Ejemplo, Num. Ejemplo', '12345678', 0),
(5, 'Ranfery2', 'correo2@hotmail.com', 'asdf', 'Calle de ejemplo. Av Ejemplo, #100, Col. Ejemplo, Ciudad ejemplo, NL.', '8125361954', 0),
(6, 'Admin', 'admin@gmail.com', 'admin', '', '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `direcciones_usuarios`
--
ALTER TABLE `direcciones_usuarios`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodoPago`),
  ADD KEY `id_metodoPago` (`id_metodoPago`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_metodoPago` (`id_metodoPago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_3` (`correo`),
  ADD UNIQUE KEY `correo_4` (`correo`),
  ADD KEY `id` (`id_usuario`),
  ADD KEY `correo_2` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `id_carrito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id_detalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodoPago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
