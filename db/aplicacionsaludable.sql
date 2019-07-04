-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2019 a las 04:37:27
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aplicacionsaludable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `NOMBRE_MENU` varchar(45) NOT NULL,
  `CALORIAS_MENU` varchar(45) NOT NULL,
  `DESCRIPCION_MENU` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_producto`
--

CREATE TABLE `menu_producto` (
  `ID_MENU` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `ID_PAGO` int(11) NOT NULL,
  `TIPO_PAGO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_PEDIDO` int(11) NOT NULL,
  `RUT_USUARIO` varchar(9) NOT NULL,
  `DESCRIPCION_PEDIDO` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_metodo_pago`
--

CREATE TABLE `pedido_metodo_pago` (
  `ID_PEDIDO` int(11) NOT NULL,
  `PAGO_ID_PAGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `ID_PEDIDO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `PRECIO_FINAL` int(11) NOT NULL,
  `CANTIDAD_PRODUCTO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(45) NOT NULL,
  `PRECIO_PRODUCTO` int(11) NOT NULL,
  `PRECIO_OFERTA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `RUT_USUARIO` varchar(9) NOT NULL,
  `NOMBRE_USUARIO` varchar(45) NOT NULL,
  `APELLIDO_USUARIO` varchar(45) NOT NULL,
  `MONTO_DISPONIBLE` int(11) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `PESO` int(11) NOT NULL,
  `ALTURA` float NOT NULL,
  `PASS` varchar(12) NOT NULL,
  `TELEFONO` int(9) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `rol_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`RUT_USUARIO`, `NOMBRE_USUARIO`, `APELLIDO_USUARIO`, `MONTO_DISPONIBLE`, `FECHA_NACIMIENTO`, `PESO`, `ALTURA`, `PASS`, `TELEFONO`, `EMAIL`, `rol_ID`) VALUES
('123456789', 'Juan', 'j', 245222, '0000-00-00', 123, 123, '123', 123456789, 'admin@sgb.cl', 2),
('admin', 'Juan', 'Uribe', 250000, '2019-07-01', 74, 175, 'admin', 990329292, 'admin@apps.cl', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_menu`
--

CREATE TABLE `usuario_menu` (
  `RUT_USUARIO` varchar(9) NOT NULL,
  `ID_MENU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indices de la tabla `menu_producto`
--
ALTER TABLE `menu_producto`
  ADD PRIMARY KEY (`ID_MENU`,`ID_PRODUCTO`),
  ADD KEY `fk_MENU_has_PRODUCTO_PRODUCTO1_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_MENU_has_PRODUCTO_MENU1_idx` (`ID_MENU`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_PAGO`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`),
  ADD KEY `fk_PEDIDO_USUARIO1_idx` (`RUT_USUARIO`);

--
-- Indices de la tabla `pedido_metodo_pago`
--
ALTER TABLE `pedido_metodo_pago`
  ADD PRIMARY KEY (`ID_PEDIDO`,`PAGO_ID_PAGO`),
  ADD KEY `fk_PEDIDO_has_METODO_PAGO_METODO_PAGO1_idx` (`PAGO_ID_PAGO`),
  ADD KEY `fk_PEDIDO_has_METODO_PAGO_PEDIDO1_idx` (`ID_PEDIDO`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`ID_PEDIDO`,`ID_PRODUCTO`),
  ADD KEY `fk_PEDIDO_has_PRODUCTO_PRODUCTO1_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_PEDIDO_has_PRODUCTO_PEDIDO1_idx` (`ID_PEDIDO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`RUT_USUARIO`);

--
-- Indices de la tabla `usuario_menu`
--
ALTER TABLE `usuario_menu`
  ADD PRIMARY KEY (`RUT_USUARIO`,`ID_MENU`),
  ADD KEY `fk_USUARIO_has_MENU_MENU1_idx` (`ID_MENU`),
  ADD KEY `fk_USUARIO_has_MENU_USUARIO1_idx` (`RUT_USUARIO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_producto`
--
ALTER TABLE `menu_producto`
  ADD CONSTRAINT `fk_MENU_has_PRODUCTO_MENU1` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MENU_has_PRODUCTO_PRODUCTO1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_PEDIDO_USUARIO1` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `usuario` (`RUT_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_metodo_pago`
--
ALTER TABLE `pedido_metodo_pago`
  ADD CONSTRAINT `fk_PEDIDO_has_METODO_PAGO_METODO_PAGO1` FOREIGN KEY (`PAGO_ID_PAGO`) REFERENCES `metodo_pago` (`ID_PAGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEDIDO_has_METODO_PAGO_PEDIDO1` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_PEDIDO_has_PRODUCTO_PEDIDO1` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEDIDO_has_PRODUCTO_PRODUCTO1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_menu`
--
ALTER TABLE `usuario_menu`
  ADD CONSTRAINT `fk_USUARIO_has_MENU_MENU1` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIO_has_MENU_USUARIO1` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `usuario` (`RUT_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
