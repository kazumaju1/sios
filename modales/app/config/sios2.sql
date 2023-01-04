-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-12-2022 a las 18:49:59
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19804882_sios1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'martillos'),
(2, 'metro'),
(3, 'pulidora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `consumo_hora` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id_herramienta`, `nombre`, `estado`, `fk_categoria`, `observaciones`, `consumo_hora`, `activo`) VALUES
(1, 'martillo', 1, 1, 'esta bien', 0, 1),
(2, 'metro', 2, 2, 'bueno', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_inventario`
--

CREATE TABLE `historial_inventario` (
  `id_historial_inventario` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `lista_herramienta` varchar(200) DEFAULT NULL,
  `lista_material` varchar(200) DEFAULT NULL,
  `fecha_in` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ordenes`
--

CREATE TABLE `historial_ordenes` (
  `id_historial_orden` int(11) NOT NULL,
  `fk_pedido` int(11) DEFAULT NULL,
  `observaciones` varchar(400) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha_expedicion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pedido`
--

CREATE TABLE `historial_pedido` (
  `id_historial_pedido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `tipo_orden` varchar(20) DEFAULT NULL,
  `nombre_articulo` varchar(30) DEFAULT NULL,
  `lugar` varchar(30) DEFAULT NULL,
  `altura` tinyint(1) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `fecha_in` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `fk_usuario`, `observaciones`, `fecha_in`, `fecha_fin`) VALUES
(1, 1062014256, 'nada', '2022-11-23', '2022-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_herramienta`
--

CREATE TABLE `lista_herramienta` (
  `id_lista_herramienta` int(11) NOT NULL,
  `fk_herramienta` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fk_orden` int(11) DEFAULT NULL,
  `fk_inventario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_herramienta`
--

INSERT INTO `lista_herramienta` (`id_lista_herramienta`, `fk_herramienta`, `cantidad`, `fk_orden`, `fk_inventario`) VALUES
(1, 1, 9, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_material`
--

CREATE TABLE `lista_material` (
  `id_lista_material` int(11) NOT NULL,
  `fk_material` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciototal` int(11) DEFAULT NULL,
  `fk_orden` int(11) DEFAULT NULL,
  `fk_inventario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fk_presentacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `nombre`, `fk_presentacion`, `cantidad`, `observaciones`, `precio`) VALUES
(1, 'electrodo', 1, 1, 'nada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `fk_pedido` int(11) DEFAULT NULL,
  `observaciones` varchar(400) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha_expedicion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `fk_pedido`, `observaciones`, `fecha_entrega`, `estado`, `fecha_expedicion`) VALUES
(1, 1, 'nada', '2022-11-23', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `tipo_orden` varchar(20) DEFAULT NULL,
  `nombre_articulo` varchar(30) DEFAULT NULL,
  `lugar` varchar(30) DEFAULT NULL,
  `altura` tinyint(1) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `fecha`, `fk_cliente`, `descripcion`, `tipo_orden`, `nombre_articulo`, `lugar`, `altura`, `estado`) VALUES
(1, '2022-11-23', NULL, 'jajaja xd', 'reparacion', 'mesa', 'E1', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id_presentacion`, `nombre`) VALUES
(1, 'metros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `ficha` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`, `ficha`, `activo`, `fecha_ingreso`) VALUES
(1062014256, 'Mateo', 'mateohernandez@gmail.com', '1234', 'aprendiz', '2365135', 1, '0000-00-00'),
(1115062129, 'karol diaz', 'kmdiaz92@misena.edu.co', '12345', 'aprendiz', '2365135', 1, '0000-00-00'),
(1116282995, 'Jhon Sebastian Gómez', 'jsgomez599@nisena.edu.co', '12345', 'aprendiz', '2365135', 1, '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id_herramienta`),
  ADD KEY `categoria` (`fk_categoria`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `inventario_usuario` (`fk_usuario`);

--
-- Indices de la tabla `lista_herramienta`
--
ALTER TABLE `lista_herramienta`
  ADD PRIMARY KEY (`id_lista_herramienta`),
  ADD KEY `orden_herramienta` (`fk_orden`),
  ADD KEY `lista_herramienta` (`fk_herramienta`),
  ADD KEY `inventario_herramienta` (`fk_inventario`);

--
-- Indices de la tabla `lista_material`
--
ALTER TABLE `lista_material`
  ADD PRIMARY KEY (`id_lista_material`),
  ADD KEY `orden_herramienta` (`fk_orden`),
  ADD KEY `lista_material` (`fk_material`),
  ADD KEY `inventario_material` (`fk_inventario`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `presentacion` (`fk_presentacion`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `pedido` (`fk_pedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `orden_usuario` (`fk_cliente`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `id_herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_herramienta`
--
ALTER TABLE `lista_herramienta`
  MODIFY `id_lista_herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_material`
--
ALTER TABLE `lista_material`
  MODIFY `id_lista_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `herramienta_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `lista_herramienta`
--
ALTER TABLE `lista_herramienta`
  ADD CONSTRAINT `lista_herramienta_ibfk_1` FOREIGN KEY (`fk_herramienta`) REFERENCES `herramienta` (`id_herramienta`),
  ADD CONSTRAINT `lista_herramienta_ibfk_2` FOREIGN KEY (`fk_inventario`) REFERENCES `inventario` (`id_inventario`),
  ADD CONSTRAINT `lista_herramienta_ibfk_3` FOREIGN KEY (`fk_orden`) REFERENCES `ordenes` (`id_orden`);

--
-- Filtros para la tabla `lista_material`
--
ALTER TABLE `lista_material`
  ADD CONSTRAINT `lista_material_ibfk_1` FOREIGN KEY (`fk_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `lista_material_ibfk_2` FOREIGN KEY (`fk_inventario`) REFERENCES `inventario` (`id_inventario`),
  ADD CONSTRAINT `lista_material_ibfk_3` FOREIGN KEY (`fk_orden`) REFERENCES `ordenes` (`id_orden`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`fk_presentacion`) REFERENCES `presentacion` (`id_presentacion`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`fk_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `orden_usuario` FOREIGN KEY (`fk_cliente`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
