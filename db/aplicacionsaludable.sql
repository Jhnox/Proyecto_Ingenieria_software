-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-07-2019 a las 16:21:55
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

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`ID_MENU`, `NOMBRE_MENU`, `CALORIAS_MENU`, `DESCRIPCION_MENU`) VALUES
(1, 'Menu Basico', '2500', 'Este es un menu de es para los que van a comenzar a comer\r\n las comidas saludables contiene un total de 2000 calorias.'),
(2, 'Menu Intermedio', '2000', 'Este menu es para los que ya han estado utilizando los menus anteriores, y quieren ir un paso mas alla en el consumo de comidas saludables2'),
(3, 'Menu Avanzado', '1500', 'Este menu es para los que ya han estado utilizando los menus anteriores, \r\ny quieren ir un paso mas alla en el consumo de comidas saludables3'),
(4, 'ejemplo 1', '25000', 'sdv'),
(6, 'Ejemplo 2', '3500', 'Ejemplo 2'),
(7, 'Ejemplo 3', '2200', 'Ejemplo 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_producto`
--

CREATE TABLE `menu_producto` (
  `ID` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu_producto`
--

INSERT INTO `menu_producto` (`ID`, `ID_MENU`, `ID_PRODUCTO`) VALUES
(2, 1, 1),
(8, 1, 1),
(1, 4, 1),
(3, 2, 2),
(4, 3, 3),
(6, 1, 6),
(5, 6, 6);

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
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `peso` int(11) NOT NULL DEFAULT '0',
  `altura` int(11) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `rut_usuario` varchar(10) NOT NULL
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

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `PRECIO_PRODUCTO`, `PRECIO_OFERTA`) VALUES
(1, 'Huevos', 150, 120),
(2, 'Papas', 750, 650),
(3, 'GLLETAS', 750, 650),
(4, 'Peras', 150, 150),
(5, 'Uvas', 450, 450),
(6, 'Ginsen', 120, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `RUT_USUARIO` varchar(12) NOT NULL,
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
('12139961-k', 'edfb', 'df', 123, '0000-00-00', 123, 123, '123', 123456789, 'admin@admin.cl', 2),
('19166137-0', 'Juan', 'Uribe', 152000, '0000-00-00', 75, 175, '123', 990329292, 'admin@admin.cl', 2),
('19166316-0', 'Juan', 'Uribe', 152000, '0000-00-00', 75, 175, '123', 990329292, 'admin@admin.cl', 2),
('20667346-k', 'Juan', 'Uribe', 152000, '0000-00-00', 75, 175, '123', 990329292, 'admin@admin.cl', 2),
('6504098-0', 'Alvaro', 'Llancalahuen', 152000, '0000-00-00', 75, 175, '123', 990329292, 'admin@admin.cl', 2),
('admin', 'admin', 'admin', 0, '0000-00-00', 0, 0, 'admin', 0, 'adin@apps.cl', 1);

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
  ADD PRIMARY KEY (`ID_MENU`,`ID_PRODUCTO`,`ID`),
  ADD KEY `fk_MENU_has_PRODUCTO_PRODUCTO1_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_MENU_has_PRODUCTO_MENU1_idx` (`ID_MENU`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_PAGO`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `FK_participante_usuario` (`rut_usuario`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu_producto`
--
ALTER TABLE `menu_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `FK_participante_usuario` FOREIGN KEY (`rut_usuario`) REFERENCES `usuario` (`RUT_USUARIO`);

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
