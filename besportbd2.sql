-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2019 a las 22:08:21
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `besportbd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `ID_Almacen` int(11) NOT NULL,
  `ID_Modelo` int(20) NOT NULL,
  `ID_Color` int(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Fecha_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Stock` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Talla` int(11) NOT NULL,
  `ID_Tipo_Producto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`ID_Almacen`, `ID_Modelo`, `ID_Color`, `date_added`, `Fecha_modificacion`, `Stock`, `ID_Seccion`, `ID_Talla`, `ID_Tipo_Producto`) VALUES
(11, 12, 37, '2019-06-09 17:21:01', '2019-06-14 02:48:44', 100, 3, 4, 2),
(12, 12, 3, '2019-06-11 16:33:11', '2019-06-11 16:33:11', 50, 6, 4, 2),
(13, 2, 37, '2019-06-11 16:34:41', '2019-06-11 16:34:41', 100, 5, 4, 3),
(14, 5, 43, '2019-06-11 16:35:06', '2019-06-11 16:35:06', 80, 6, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad_modelo`
--

CREATE TABLE `cantidad_modelo` (
  `ID_cantidad_modelo` int(20) NOT NULL,
  `ID_Modelo` int(20) NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cantidad_modelo`
--

INSERT INTO `cantidad_modelo` (`ID_cantidad_modelo`, `ID_Modelo`, `cantidad`, `descripcion`, `fecha`) VALUES
(1, 2, '150', 'para el dia 20 de junio', '2019-06-11 14:35:40'),
(2, 12, '100', 'para el 25 de junio', '2019-06-11 14:35:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `ID_Color` int(20) NOT NULL,
  `Codigo` varchar(20) NOT NULL,
  `Nombre_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`ID_Color`, `Codigo`, `Nombre_color`) VALUES
(1, '', 'AMARILLO'),
(2, '', 'BLANCO'),
(3, '', 'fUCSIA'),
(4, '', 'GRIS'),
(5, '', 'MAGENTA'),
(6, '', 'NEGRO'),
(7, '', 'CORAL'),
(8, '', 'REY'),
(9, '', 'ROJO'),
(10, '', 'MARINO'),
(11, '', 'VERDE'),
(12, '', 'ROSA'),
(13, '', 'MILITAR'),
(14, '', 'MELON'),
(15, '', 'VINO'),
(16, '', 'LILA'),
(17, '', 'PLATA'),
(18, '', 'VERDE NEON'),
(19, '', 'ROSA NEON'),
(20, '', 'NARANJA'),
(21, '', 'CHOCOLATE'),
(22, '', 'VERDE AGUA'),
(23, '', 'JADE'),
(24, '', 'SANDIA'),
(25, '', 'SALMON'),
(26, '', 'FUCSIA-NARANJA'),
(27, '', 'OXFORD'),
(28, '', 'NEGRO PLATA'),
(29, '', 'NEGRO DORADO'),
(30, '', 'HUESO'),
(31, '', 'MARFIL'),
(32, '', 'UVA'),
(33, '', 'MORADO'),
(34, '', 'PALO DE ROSA'),
(35, '', 'MANDARINA'),
(36, '', 'BUGANBILIA'),
(37, '', 'AZUL'),
(38, '', 'BEIGE'),
(39, '', 'GRIS CLARO'),
(40, '', 'PETROLEO'),
(41, '', 'TERRACOTA'),
(42, '', 'GRIS T-2'),
(43, '', 'FUCSIA-NEON'),
(44, '', 'MAUVE'),
(45, '', 'MOSTAZA'),
(46, '', 'MENTA'),
(47, '', 'PIEL'),
(48, '', 'PLATA-GRIS'),
(49, '', 'SERENITY'),
(50, '', 'SHEDRON'),
(51, '', 'PLATA-NEGRO'),
(52, '', 'VEIGE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `precision`, `thousand_separator`, `decimal_separator`, `code`) VALUES
(1, 'US Dollar', '$', '2', ',', '.', 'USD'),
(2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP'),
(3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR'),
(4, 'South African Rand', 'R', '2', '.', ',', 'ZAR'),
(5, 'Danish Krone', 'kr ', '2', '.', ',', 'DKK'),
(6, 'Israeli Shekel', 'NIS ', '2', ',', '.', 'ILS'),
(7, 'Swedish Krona', 'kr ', '2', '.', ',', 'SEK'),
(8, 'Kenyan Shilling', 'KSh ', '2', ',', '.', 'KES'),
(9, 'Canadian Dollar', 'C$', '2', ',', '.', 'CAD'),
(10, 'Philippine Peso', 'P ', '2', ',', '.', 'PHP'),
(11, 'Indian Rupee', 'Rs. ', '2', ',', '.', 'INR'),
(12, 'Australian Dollar', '$', '2', ',', '.', 'AUD'),
(13, 'Singapore Dollar', 'SGD ', '2', ',', '.', 'SGD'),
(14, 'Norske Kroner', 'kr ', '2', '.', ',', 'NOK'),
(15, 'New Zealand Dollar', '$', '2', ',', '.', 'NZD'),
(16, 'Vietnamese Dong', 'VND ', '0', '.', ',', 'VND'),
(17, 'Swiss Franc', 'CHF ', '2', '\'', '.', 'CHF'),
(18, 'Quetzal Guatemalteco', 'Q', '2', ',', '.', 'GTQ'),
(19, 'Malaysian Ringgit', 'RM', '2', ',', '.', 'MYR'),
(20, 'Real Brasile&ntilde;o', 'R$', '2', '.', ',', 'BRL'),
(21, 'Thai Baht', 'THB ', '2', ',', '.', 'THB'),
(22, 'Nigerian Naira', 'NGN ', '2', ',', '.', 'NGN'),
(23, 'Peso Argentino', '$', '2', '.', ',', 'ARS'),
(24, 'Bangladeshi Taka', 'Tk', '2', ',', '.', 'BDT'),
(25, 'United Arab Emirates Dirham', 'DH ', '2', ',', '.', 'AED'),
(26, 'Hong Kong Dollar', '$', '2', ',', '.', 'HKD'),
(27, 'Indonesian Rupiah', 'Rp', '2', ',', '.', 'IDR'),
(28, 'Peso Mexicano', '$', '2', ',', '.', 'MXN'),
(29, 'Egyptian Pound', '&pound;', '2', ',', '.', 'EGP'),
(30, 'Peso Colombiano', '$', '2', '.', ',', 'COP'),
(31, 'West African Franc', 'CFA ', '2', ',', '.', 'XOF'),
(32, 'Chinese Renminbi', 'RMB ', '2', ',', '.', 'CNY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defectos`
--

CREATE TABLE `defectos` (
  `ID_Defecto` int(20) NOT NULL,
  `Piezas` int(10) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `ID_Modelo` int(100) NOT NULL,
  `ID_Usuario` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `defectos`
--

INSERT INTO `defectos` (`ID_Defecto`, `Piezas`, `Descripcion`, `ID_Modelo`, `ID_Usuario`) VALUES
(1, 2, 'la maquina los rasgo', 5, 24),
(2, 1, 'se cosieron mal', 12, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(237, 3, 1, 200, 0.8),
(236, 3, 8, 200, 0.8),
(235, 3, 9, 100, 0.8),
(234, 3, 3, 100, 0.8),
(233, 3, 5, 50, 0.6),
(232, 3, 7, 50, 1),
(196, 2, 1, 23, 0.8),
(195, 2, 1, 23, 0.8),
(194, 2, 1, 23, 0.8),
(193, 2, 1, 23, 0.8),
(192, 1, 4, 12, 1.4),
(191, 1, 4, 12, 1.4),
(190, 1, 4, 12, 1.4),
(189, 1, 4, 12, 1.4),
(188, 1, 4, 12, 1.4),
(187, 1, 4, 12, 1.4),
(186, 1, 4, 12, 1.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario`
--

CREATE TABLE `detalle_inventario` (
  `ID_Detalle_Inventario` int(200) NOT NULL,
  `ID_Inventario` int(200) NOT NULL,
  `ID_Tela` int(20) NOT NULL,
  `Peso` decimal(7,3) NOT NULL,
  `Stock` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Seccion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_inventario`
--

INSERT INTO `detalle_inventario` (`ID_Detalle_Inventario`, `ID_Inventario`, `ID_Tela`, `Peso`, `Stock`, `fecha`, `ID_Seccion`) VALUES
(24, 34, 2, '200.000', 1, '2019-05-27 19:52:12', 24),
(26, 36, 1, '300.000', 1, '2019-05-27 20:09:05', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(28, 1, '2019-06-09 14:40:28', 24, 0, 'undefined', '117.6', 2),
(29, 2, '2019-06-09 14:40:54', 21, 0, 'undefined', '73.6', 1),
(33, 3, '2019-06-11 15:30:13', 24, 0, 'undefined', '560', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `ID_Incidencia` int(20) NOT NULL,
  `Faltas` int(10) DEFAULT NULL,
  `Descuento` varchar(100) NOT NULL,
  `Resultado` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_tela`
--

CREATE TABLE `inventario_tela` (
  `ID_Inventario` int(20) NOT NULL,
  `ID_Tela` int(20) NOT NULL,
  `Peso` decimal(6,2) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `Fecha_inventario_tela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Seccion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_tela`
--

INSERT INTO `inventario_tela` (`ID_Inventario`, `ID_Tela`, `Peso`, `Stock`, `Fecha_inventario_tela`, `ID_Seccion`) VALUES
(43, 1, '123.00', 1, '2019-06-20 05:43:42', 14),
(44, 1, '250.00', 1, '2019-06-11 15:02:47', 21),
(45, 2, '50.00', 1, '2019-06-20 05:44:42', 5),
(46, 14, '100.00', 1, '2019-06-11 15:03:14', 13),
(47, 17, '80.00', 1, '2019-06-11 15:03:33', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `ID_Maquina` int(20) NOT NULL,
  `Nombre_maquina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`ID_Maquina`, `Nombre_maquina`) VALUES
(1, 'Collareta'),
(2, 'Overlock'),
(3, 'la ferrari'),
(4, 'flat'),
(5, 'Popote'),
(6, 'Escarola'),
(7, 'manual'),
(8, 'maquila'),
(9, 'muestras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `ID_Modelo` int(20) NOT NULL,
  `No_modelo` varchar(200) NOT NULL,
  `Nombre_modelo` varchar(200) NOT NULL,
  `Caracteristicas` varchar(1000) NOT NULL,
  `Imagen` varchar(1000) DEFAULT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`ID_Modelo`, `No_modelo`, `Nombre_modelo`, `Caracteristicas`, `Imagen`, `Fecha`) VALUES
(2, '1100', 'leggs pretina alta', 'Con mesh', '373822.jpg', '2019-04-22 13:19:00'),
(3, '1107', 'Capri bolsa red', 'bolsa de red', '928822.jpeg', '2019-04-22 13:41:12'),
(4, '886', 'short jareta', 'short jareta', '745338.jpeg', '2019-04-22 14:30:12'),
(5, '915', 'body short twist', 'body short twist', '231286.jpeg', '2019-04-22 14:57:34'),
(7, 'varias operaciones', 'varias operaciones', 'varias operaciones', '505857.png', '2019-04-22 16:25:05'),
(8, 'sin numero', 'leggins pretina cintas', 'leggins pretina cintas', '870794.jpeg', '2019-04-22 16:37:47'),
(9, 'sin numero 2', 'top cintas cruces', 'top cintas cruces', '236191.jpeg', '2019-04-22 16:40:52'),
(10, 'sin numero 3', 'top cintas pies', 'top cintas pies', '219796.jpeg', '2019-04-22 16:43:12'),
(11, '827', 'LEGG. sin bolsitas plisadas', 'LEGG. sin bolsitas plisadas', '620929.jpeg', '2019-04-25 14:09:04'),
(12, '1120', 'TOP elastico', 'TOP elastico', '415360.jpeg', '2019-04-25 14:10:36'),
(13, 'MOD ?', 'BLUSA sisa mesh espalda', 'blusa sisa mesh espalda', '9241.jpeg', '2019-04-25 14:12:23'),
(14, 'modelos anteriores', 'modelos anteriores', 'registro de modelos anteriores', '174284.png', '2019-04-25 14:39:54'),
(15, '749472', 'Top red petotwtwatw', 'wtaegagageg', '822320.jpg', '2019-06-20 18:00:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_operacion`
--

CREATE TABLE `modelo_operacion` (
  `ID_Modelo_Operacion` int(20) NOT NULL,
  `ID_Modelo` int(20) NOT NULL,
  `ID_Operacion` int(20) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo_operacion`
--

INSERT INTO `modelo_operacion` (`ID_Modelo_Operacion`, `ID_Modelo`, `ID_Operacion`, `Fecha`) VALUES
(1, 2, 9, '2019-04-22 13:22:48'),
(2, 2, 16, '2019-04-22 13:22:48'),
(3, 2, 12, '2019-04-22 13:22:48'),
(5, 2, 13, '2019-04-22 13:22:48'),
(6, 2, 15, '2019-04-22 13:22:48'),
(7, 2, 14, '2019-04-22 13:22:48'),
(8, 2, 10, '2019-04-22 13:22:48'),
(9, 2, 11, '2019-04-22 13:22:48'),
(10, 2, 21, '2019-04-22 13:22:48'),
(11, 2, 17, '2019-04-22 13:22:48'),
(12, 2, 19, '2019-04-22 13:22:49'),
(13, 2, 18, '2019-04-22 13:22:49'),
(14, 2, 20, '2019-04-22 13:22:49'),
(15, 3, 26, '2019-04-22 13:43:45'),
(16, 3, 9, '2019-04-22 13:43:45'),
(17, 3, 22, '2019-04-22 13:43:45'),
(18, 3, 16, '2019-04-22 13:43:45'),
(19, 3, 12, '2019-04-22 13:43:45'),
(20, 3, 8, '2019-04-22 13:43:45'),
(21, 3, 29, '2019-04-22 13:43:45'),
(22, 3, 24, '2019-04-22 13:43:45'),
(23, 3, 23, '2019-04-22 13:43:45'),
(24, 3, 10, '2019-04-22 13:43:45'),
(25, 3, 25, '2019-04-22 13:43:45'),
(26, 3, 27, '2019-04-22 13:43:45'),
(27, 3, 11, '2019-04-22 13:43:45'),
(28, 3, 28, '2019-04-22 13:43:45'),
(29, 3, 18, '2019-04-22 13:43:45'),
(30, 4, 9, '2019-04-22 14:52:00'),
(31, 4, 32, '2019-04-22 14:52:01'),
(32, 4, 43, '2019-04-22 14:52:01'),
(33, 4, 40, '2019-04-22 14:52:01'),
(34, 4, 35, '2019-04-22 14:52:01'),
(35, 4, 42, '2019-04-22 14:52:01'),
(36, 4, 41, '2019-04-22 14:52:02'),
(37, 4, 44, '2019-04-22 14:52:02'),
(38, 4, 38, '2019-04-22 14:52:03'),
(39, 4, 36, '2019-04-22 14:52:03'),
(40, 4, 11, '2019-04-22 14:52:03'),
(41, 4, 33, '2019-04-22 14:52:03'),
(42, 4, 30, '2019-04-22 14:52:05'),
(43, 4, 31, '2019-04-22 14:52:05'),
(44, 4, 34, '2019-04-22 14:52:06'),
(45, 4, 39, '2019-04-22 14:52:06'),
(46, 4, 37, '2019-04-22 14:52:06'),
(47, 5, 64, '2019-04-22 15:14:25'),
(48, 5, 50, '2019-04-22 15:14:25'),
(49, 5, 53, '2019-04-22 15:14:25'),
(50, 5, 45, '2019-04-22 15:14:25'),
(51, 5, 48, '2019-04-22 15:14:25'),
(52, 5, 47, '2019-04-22 15:14:25'),
(53, 5, 9, '2019-04-22 15:14:25'),
(54, 5, 49, '2019-04-22 15:14:25'),
(55, 5, 62, '2019-04-22 15:14:25'),
(56, 5, 51, '2019-04-22 15:14:26'),
(57, 5, 60, '2019-04-22 15:14:26'),
(58, 5, 57, '2019-04-22 15:14:26'),
(59, 5, 61, '2019-04-22 15:14:26'),
(60, 5, 56, '2019-04-22 15:14:26'),
(61, 5, 54, '2019-04-22 15:14:26'),
(62, 5, 63, '2019-04-22 15:14:26'),
(63, 5, 52, '2019-04-22 15:14:26'),
(64, 5, 58, '2019-04-22 15:14:26'),
(65, 5, 55, '2019-04-22 15:14:26'),
(66, 5, 46, '2019-04-22 15:14:26'),
(67, 5, 39, '2019-04-22 15:14:26'),
(68, 5, 37, '2019-04-22 15:14:26'),
(69, 5, 59, '2019-04-22 15:14:26'),
(85, 7, 83, '2019-04-22 16:28:19'),
(87, 7, 82, '2019-04-22 16:28:19'),
(88, 8, 84, '2019-04-22 16:39:03'),
(89, 9, 85, '2019-04-22 16:41:31'),
(90, 10, 86, '2019-04-22 16:44:23'),
(91, 12, 92, '2019-04-25 14:43:42'),
(92, 12, 97, '2019-04-25 14:43:42'),
(93, 12, 89, '2019-04-25 14:43:42'),
(94, 12, 90, '2019-04-25 14:43:42'),
(95, 12, 113, '2019-04-25 14:43:42'),
(96, 12, 116, '2019-04-25 14:43:42'),
(97, 12, 110, '2019-04-25 14:43:42'),
(98, 12, 114, '2019-04-25 14:43:42'),
(99, 12, 95, '2019-04-25 14:43:42'),
(100, 12, 96, '2019-04-25 14:43:42'),
(101, 12, 108, '2019-04-25 14:43:42'),
(102, 12, 94, '2019-04-25 14:43:42'),
(103, 12, 118, '2019-04-25 14:43:42'),
(104, 12, 119, '2019-04-25 14:43:42'),
(105, 12, 117, '2019-04-25 14:43:42'),
(106, 11, 87, '2019-04-25 14:51:02'),
(107, 11, 9, '2019-04-25 14:51:02'),
(108, 11, 89, '2019-04-25 14:51:02'),
(109, 11, 93, '2019-04-25 14:51:02'),
(110, 11, 3, '2019-04-25 14:51:02'),
(111, 11, 5, '2019-04-25 14:51:02'),
(112, 11, 88, '2019-04-25 14:51:02'),
(113, 11, 91, '2019-04-25 14:51:02'),
(114, 11, 80, '2019-04-25 14:51:02'),
(115, 11, 1, '2019-04-25 14:51:02'),
(116, 11, 10, '2019-04-25 14:51:02'),
(117, 11, 94, '2019-04-25 14:51:03'),
(118, 11, 11, '2019-04-25 14:51:03'),
(119, 11, 2, '2019-04-25 14:51:03'),
(120, 11, 4, '2019-04-25 14:51:03'),
(121, 13, 111, '2019-04-25 14:59:32'),
(122, 13, 102, '2019-04-25 14:59:32'),
(123, 13, 98, '2019-04-25 14:59:32'),
(124, 13, 107, '2019-04-25 14:59:32'),
(125, 13, 109, '2019-04-25 14:59:32'),
(126, 13, 103, '2019-04-25 14:59:32'),
(127, 13, 112, '2019-04-25 14:59:32'),
(128, 13, 104, '2019-04-25 14:59:32'),
(129, 13, 105, '2019-04-25 14:59:32'),
(130, 13, 106, '2019-04-25 14:59:32'),
(131, 13, 100, '2019-04-25 14:59:32'),
(132, 13, 101, '2019-04-25 14:59:32'),
(133, 13, 99, '2019-04-25 14:59:32'),
(147, 14, 125, '2019-04-25 15:06:23'),
(148, 14, 126, '2019-04-25 15:06:23'),
(149, 14, 127, '2019-04-25 15:06:23'),
(150, 14, 120, '2019-04-25 15:06:23'),
(151, 14, 121, '2019-04-25 15:06:23'),
(152, 14, 131, '2019-04-25 15:06:23'),
(153, 14, 132, '2019-04-25 15:06:23'),
(154, 14, 123, '2019-04-25 15:06:23'),
(155, 14, 124, '2019-04-25 15:06:23'),
(156, 14, 133, '2019-04-25 15:06:23'),
(157, 14, 134, '2019-04-25 15:06:23'),
(158, 14, 135, '2019-04-25 15:06:23'),
(159, 14, 128, '2019-04-25 15:06:24'),
(160, 14, 129, '2019-04-25 15:06:24'),
(161, 14, 130, '2019-04-25 15:06:24'),
(162, 7, 122, '2019-04-25 15:11:49'),
(163, 3, 136, '2019-04-25 16:21:03'),
(164, 3, 7, '2019-04-25 16:21:03'),
(166, 7, 81, '2019-04-28 08:49:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `ID_Operacion` int(20) NOT NULL,
  `Nombre_operacion` varchar(250) NOT NULL,
  `Precio` decimal(4,2) NOT NULL,
  `ID_Maquina` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`ID_Operacion`, `Nombre_operacion`, `Precio`, `ID_Maquina`) VALUES
(1, 'Pegar Pico', '0.30', 2),
(2, 'Tramado de pico', '0.30', 1),
(3, 'Cerrar tiro delantero', '0.30', 2),
(4, 'Tramado de tiro delantero', '0.30', 1),
(5, 'Cerrar tiro trasero', '0.30', 2),
(6, 'Tramado de tiro trasero', '0.30', 1),
(7, 'Hacer pretina 4 piezas', '1.40', 2),
(8, 'Elastico a pretina', '1.00', 1),
(9, 'Bastillas', '0.80', 1),
(10, 'Pegar pretina', '0.80', 2),
(11, 'Tramado de contorno cintura', '0.80', 1),
(12, 'Cerrar tiros y picos', '0.80', 2),
(13, 'Pegar mesh a figura', '0.60', 2),
(14, 'Pegar mesh y figura a trasero', '1.00', 2),
(15, 'Pegar mesh y figura a delantero', '1.60', 2),
(16, 'Cerrar entrepierna completo', '0.70', 2),
(17, 'Tramado en mesh y figura', '0.60', 1),
(18, 'Tramado en tiro y pico', '0.80', 1),
(19, 'Tramado en pretina', '0.50', 1),
(20, 'tramado en trasero', '1.20', 1),
(21, 'Tramado en delantero', '1.80', 1),
(22, 'cerrar centro y cuchilla', '0.20', 2),
(23, 'pegar cuchilla trasera', '1.20', 2),
(24, 'pegar costado a delantero', '1.00', 2),
(25, 'sobrehilar contorno cuchilla', '0.50', 2),
(26, 'bastilla a bolsa', '0.60', 1),
(27, 'tramado contorno cuchilla', '1.20', 1),
(28, 'tramado de frente', '1.20', 1),
(29, 'Hacer pretina sencilla', '0.80', 2),
(30, 'tramado en tiro delantero short', '0.30', 1),
(31, 'unir entrepierna', '0.50', 2),
(32, 'cerrar costado en pretina', '0.60', 2),
(33, 'tramado en costado pretina', '0.60', 1),
(34, 'unir entrepierna a short', '0.80', 2),
(35, 'hacer popote', '1.80', 5),
(36, 'pegar jareta interna short (6) pespuntes', '3.60', 3),
(37, 'unir tiro trasero', '0.30', 2),
(38, 'pegar elastico a trasero', '0.60', 2),
(39, 'unir tiro delantero', '0.30', 2),
(40, 'cortar elastico manual', '0.40', 7),
(41, 'maquila recta', '1.00', 8),
(42, 'maquila con hilo', '1.50', 8),
(43, 'cortar cintas', '0.40', 7),
(44, 'maquila sin hilo', '2.00', 8),
(45, '2 agujas en pico', '0.30', 1),
(46, 'unir pico', '0.30', 2),
(47, '2 agujas en trasero', '0.30', 1),
(48, '2 agujas en tiro delantero', '0.30', 1),
(49, 'cerrar costado de short', '0.80', 2),
(50, '2 agujas en costado short', '1.00', 1),
(51, 'cerrar entrepierna short', '0.50', 2),
(52, 'pegar costado mesh a peto (2)', '0.60', 2),
(53, '2 agujas en mesh peto', '0.60', 1),
(54, 'hacer plizado en busto', '0.80', 2),
(55, 'sobrehilar contorno copa', '0.40', 2),
(56, 'fijar mesh a cento copas', '0.60', 2),
(57, 'encajonar mesh con frente y forro copa', '1.20', 2),
(58, 'pegar piezas espalda encajonadas', '0.10', 2),
(59, 'voltear pieza', '0.40', 7),
(60, 'cerrar hombros', '0.60', 2),
(61, 'encajonar pieza espalda trasero', '0.80', 2),
(62, 'cerrar costados en pieza superior e inferior', '1.20', 2),
(63, 'pegar contorno cintura', '0.80', 2),
(64, '2 agujas en cintura', '0.80', 1),
(65, 'cerrar hombros corto', '0.30', 2),
(67, 'Unir forro', '0.50', 2),
(68, 'Sobrehilar forro', '0.30', 2),
(69, 'Sobrehilar si', '0.60', 2),
(70, 'Pegar forro a mesh por costado', '0.40', 2),
(71, 'Armar pretina con elastico', '0.40', 2),
(72, 'Pegar pretina 1', '1.00', 2),
(73, 'Marcar pretina', '0.40', 2),
(74, 'Cinta sisa cuello', '1.00', 1),
(75, 'Cinta cruces a sisa', '1.00', 1),
(76, 'Pespunte en forro', '0.50', 3),
(77, 'Remate en cinta', '1.00', 3),
(78, 'Remate en costado', '1.00', 3),
(80, 'Maquila', '2.00', 8),
(81, 'muestras', '10.00', 9),
(82, 'muestras caro', '30.00', 9),
(83, 'cerrar telas', '1.60', 9),
(84, 'leggins pretinas cintas', '1.70', 1),
(87, 'bastilla bolsa superior', '0.80', 1),
(88, 'elastico', '0.60', 7),
(89, 'cerrar elastico pretina', '0.30', 2),
(90, 'Cerrar triangulo superior', '0.60', 2),
(91, 'elastico trasero', '0.60', 2),
(92, 'CERRAR CENTRO', '0.40', 2),
(93, 'cerrar entrepierna', '0.70', 2),
(94, 'pespunte elastico', '0.30', 3),
(95, 'Olear forro', '0.40', 2),
(96, 'Orlear contorno sisa y espalda', '0.60', 2),
(97, 'Cerrar costados', '0.40', 2),
(98, 'cerrar hombros medio', '0.40', 2),
(99, 'unir piezas delanteras', '0.40', 2),
(100, 'unir espalda', '0.50', 2),
(101, 'unir pieza espalda', '0.50', 2),
(102, 'cerrar costados 2', '0.60', 2),
(103, 'escarola mesh', '0.80', 2),
(104, 'tramado en piezas delanteras', '0.40', 1),
(105, 'tramado en piezas espalda', '0.60', 1),
(106, 'tramado espalda', '0.40', 1),
(107, 'cinta a cuello', '0.70', 1),
(108, 'Pegar elÃ¡stico a top', '0.80', 2),
(109, 'cinta a sisas', '1.40', 1),
(110, 'Hacer tirante', '0.40', 1),
(111, 'bastilla blusa', '1.00', 1),
(112, 'remates', '0.90', 3),
(113, 'Cinta en contorno top', '1.20', 1),
(114, 'Jareta', '0.60', 1),
(116, 'Cortar cinta', '0.40', 3),
(117, 'Unir cintas en recta', '0.20', 3),
(118, 'Pespunte en copa', '0.60', 3),
(119, 'Remates recta', '1.80', 3),
(120, 'legg. antitransparencia 1', '6.80', 2),
(121, 'legg. antitransparencia 2', '6.70', 1),
(122, 'reparaciones', '10.00', 1),
(123, 'legg. pretina cintas 1', '8.20', 2),
(124, 'legg. pretinas cintas 2', '1.70', 1),
(125, 'body short mod. 672', '2.50', 3),
(126, 'body short mod. 673', '6.00', 2),
(127, 'body short mod. 674', '6.00', 1),
(128, 'top cintas cruces 1', '5.80', 2),
(129, 'top cintas cruces 2', '4.20', 1),
(130, 'top cintas cruces 3', '4.20', 3),
(131, 'legg. picasso 1', '10.00', 2),
(132, 'legg. picasso 2', '9.20', 1),
(133, 'top cinta bies 1', '7.00', 2),
(134, 'top cinta bies 2', '6.80', 1),
(135, 'top cinta bies 3', '3.30', 3),
(136, 'Cerrar tiro y picos 1', '0.90', 2),
(137, 'Cortar elastico', '0.40', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_empresa` varchar(150) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) NOT NULL,
  `logo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_empresa`, `direccion`, `ciudad`, `codigo_postal`, `estado`, `telefono`, `email`, `impuesto`, `moneda`, `logo_url`) VALUES
(1, 'Be Sports & Activewear', 'Calle Tlaxcala #67 Col. El Progreso', 'MoroleÃ³n', '38800', 'Guanajuato', '443-170-88-16', 'contacto@besports.com.mx', 0, '$', 'img/1559239134_Logo_Be_Sports_Vector.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_almacen`
--

CREATE TABLE `seccion_almacen` (
  `ID_Seccion` int(11) NOT NULL,
  `Nombre_seccion` varchar(200) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion_almacen`
--

INSERT INTO `seccion_almacen` (`ID_Seccion`, `Nombre_seccion`, `Fecha`) VALUES
(1, 'POR DEFINIR', '2019-05-28 22:18:36'),
(2, 'RACK 8A', '2019-05-28 22:18:36'),
(3, 'RACK 9A', '2019-05-28 22:18:36'),
(4, 'RACK 4A', '2019-05-28 22:18:36'),
(5, 'RACK 1B', '2019-05-28 22:18:36'),
(6, 'RACK 7A', '2019-05-28 22:18:36'),
(7, 'RACK 6A', '2019-05-28 22:18:36'),
(8, 'RACK 7B', '2019-05-28 22:18:36'),
(9, 'RACK 8B', '2019-05-28 22:18:36'),
(10, 'RACK 6B', '2019-05-28 22:18:36'),
(14, 'ABAJO', '2019-05-29 18:39:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_tela`
--

CREATE TABLE `seccion_tela` (
  `ID_Seccion` int(20) NOT NULL,
  `Nombre_seccion` varchar(100) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion_tela`
--

INSERT INTO `seccion_tela` (`ID_Seccion`, `Nombre_seccion`, `Fecha`) VALUES
(1, '7', '2019-05-28 00:32:25'),
(2, '3', '2019-05-28 00:32:25'),
(3, '9', '2019-05-28 00:32:25'),
(4, '1', '2019-05-28 00:32:25'),
(5, '2', '2019-05-28 00:32:25'),
(6, '4', '2019-05-28 00:32:25'),
(7, '5', '2019-05-28 00:32:25'),
(8, '6', '2019-05-28 00:32:25'),
(9, '8', '2019-05-28 00:32:25'),
(13, 'ARRIBA', '2019-05-28 00:32:25'),
(14, 'ESCALERA', '2019-05-28 00:32:25'),
(15, 'M-1', '2019-05-28 00:32:25'),
(16, 'M-3', '2019-05-28 00:32:25'),
(17, 'M6', '2019-05-28 00:32:25'),
(18, 'M-6', '2019-05-28 00:32:25'),
(19, 'M7', '2019-05-28 00:32:25'),
(20, 'PILA', '2019-05-28 00:32:25'),
(21, '10', '2019-05-28 00:32:25'),
(24, '16', '2019-05-28 00:32:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `ID_Talla` int(20) NOT NULL,
  `Talla` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`ID_Talla`, `Talla`) VALUES
(4, 'UNITALLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `ID_Tela` int(20) NOT NULL,
  `Nombre_tela` varchar(100) NOT NULL,
  `ID_Color` int(20) NOT NULL,
  `Caracteristicas` varchar(1000) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`ID_Tela`, `Nombre_tela`, `ID_Color`, `Caracteristicas`, `Fecha`) VALUES
(1, 'ACROBATIC', 11, '0', '2019-04-23 00:00:00'),
(2, 'ACROBATIC', 9, '0', '2019-04-23 00:00:00'),
(3, 'ACROBATIC', 23, '0', '2019-04-23 00:00:00'),
(4, 'ACROBATIC', 13, '0', '2019-04-23 00:00:00'),
(5, 'ACROBATIC', 8, '0', '2019-04-23 00:00:00'),
(6, 'ACROBATIC', 7, '0', '2019-04-23 00:00:00'),
(7, 'ACROBATIC', 6, '0', '2019-04-23 00:00:00'),
(8, 'ACROBATIC', 5, '0', '2019-04-23 00:00:00'),
(9, 'ACROBATIC', 4, '0', '2019-04-23 00:00:00'),
(10, 'ALIZZE', 18, '0', '2019-04-23 00:00:00'),
(11, 'ALIZZE', 7, '0', '2019-04-23 00:00:00'),
(12, 'ALIZZE', 14, '0', '2019-04-23 00:00:00'),
(13, 'ALIZZE', 40, '0', '2019-04-23 00:00:00'),
(14, 'ALIZZE', 9, '0', '2019-04-23 00:00:00'),
(15, 'AMELIETA', 36, '0', '2019-04-23 00:00:00'),
(16, 'AMELIETA', 40, '0', '2019-04-23 00:00:00'),
(17, 'AMELIETA', 6, '0', '2019-04-23 00:00:00'),
(18, 'AMORELA', 9, '0', '2019-04-23 00:00:00'),
(19, 'AMORELA', 12, '0', '2019-04-23 00:00:00'),
(20, 'AMORELA', 13, '0', '2019-04-23 00:00:00'),
(21, 'AMORELA', 14, '0', '2019-04-23 00:00:00'),
(22, 'AMORELA', 15, '0', '2019-04-23 00:00:00'),
(23, 'AMORELA', 16, '0', '2019-04-23 00:00:00'),
(24, 'AMORELA', 17, '0', '2019-04-23 00:00:00'),
(25, 'AMORELA', 18, '0', '2019-04-23 00:00:00'),
(26, 'AMORELA', 11, '0', '2019-04-23 00:00:00'),
(27, 'ANELKA', 5, '0', '2019-04-23 00:00:00'),
(28, 'ANELKA', 9, '0', '2019-04-23 00:00:00'),
(29, 'ATOMIC SILK', 10, '0', '2019-04-23 00:00:00'),
(30, 'AZUNA', 5, '0', '2019-04-23 00:00:00'),
(31, 'BAMB11', 10, '0', '2019-04-23 00:00:00'),
(32, 'BAMB12', 9, '0', '2019-04-23 00:00:00'),
(33, 'BAMB13', 6, '0', '2019-04-23 00:00:00'),
(34, 'BASE', 9, '0', '2019-04-23 00:00:00'),
(35, 'BRILLOSA', 52, '0', '2019-04-23 00:00:00'),
(36, 'BRILLOSA', 55, '0', '2019-04-23 00:00:00'),
(37, 'BRILLOSA ESCAMAS', 9, '0', '2019-04-23 00:00:00'),
(38, 'BRILLOSA ESTRELLAS', 11, '0', '2019-04-23 00:00:00'),
(39, 'BUMGALOW', 11, '0', '2019-04-23 00:00:00'),
(40, 'BUMGALOW', 19, '0', '2019-04-23 00:00:00'),
(41, 'BUMGALOW', 6, '0', '2019-04-23 00:00:00'),
(42, 'BUMGALOW', 10, '0', '2019-04-23 00:00:00'),
(43, 'CANUTILLO', 9, '0', '2019-04-23 00:00:00'),
(44, 'CANUTILLO', 13, '0', '2019-04-23 00:00:00'),
(45, 'CANUTILLO', 5, '0', '2019-04-23 00:00:00'),
(46, 'CAPRIATI', 4, '0', '2019-04-23 00:00:00'),
(47, 'CAPRIATI', 6, '0', '2019-04-23 00:00:00'),
(48, 'CAPRIATI', 8, '0', '2019-04-23 00:00:00'),
(49, 'CAPRIATI', 38, '0', '2019-04-23 00:00:00'),
(50, 'CAPRIATI', 13, '0', '2019-04-23 00:00:00'),
(51, 'CAPRIATI', 23, '0', '2019-04-23 00:00:00'),
(52, 'CAPRIATI', 9, '0', '2019-04-23 00:00:00'),
(53, 'CAPRIATI', 22, '0', '2019-04-23 00:00:00'),
(54, 'CAPRIATI', 18, '0', '2019-04-23 00:00:00'),
(55, 'CARDIGAN', 18, '0', '2019-04-23 00:00:00'),
(56, 'CARDIGAN', 5, '0', '2019-04-23 00:00:00'),
(57, 'CARDIGAN', 37, '0', '2019-04-23 00:00:00'),
(58, 'CARDIGAN', 16, '0', '2019-04-23 00:00:00'),
(59, 'CHELSEY', 4, '0', '2019-04-23 00:00:00'),
(60, 'CHELSEY', 10, '0', '2019-04-23 00:00:00'),
(61, 'CHELSEY', 7, '0', '2019-04-23 00:00:00'),
(62, 'CHELSEY', 9, '0', '2019-04-23 00:00:00'),
(63, 'CHELSEY', 37, '0', '2019-04-23 00:00:00'),
(64, 'CHELSEY', 44, '0', '2019-04-23 00:00:00'),
(65, 'CHELSEY', 11, '0', '2019-04-23 00:00:00'),
(66, 'CHELSEY', 45, '0', '2019-04-23 00:00:00'),
(67, 'CHELSEY', 18, '0', '2019-04-23 00:00:00'),
(68, 'CHIC', 5, '0', '2019-04-23 00:00:00'),
(69, 'CHIC', 7, '0', '2019-04-23 00:00:00'),
(70, 'CHIC', 43, '0', '2019-04-23 00:00:00'),
(71, 'CHIC', 46, '0', '2019-04-23 00:00:00'),
(72, 'CHIC', 9, '0', '2019-04-23 00:00:00'),
(73, 'CIRENTIN', 4, '0', '2019-04-23 00:00:00'),
(74, 'CIRENTIN', 9, '0', '2019-04-23 00:00:00'),
(75, 'CONTROL FIT', 5, '0', '2019-04-23 00:00:00'),
(76, 'CONTROL FIT', 10, '0', '2019-04-23 00:00:00'),
(77, 'CONTROL FIT', 6, '0', '2019-04-23 00:00:00'),
(78, 'CONTROL FIT', 7, '0', '2019-04-23 00:00:00'),
(79, 'CONTROL FIT', 13, '0', '2019-04-23 00:00:00'),
(80, 'CONTROL FIT', 9, '0', '2019-04-23 00:00:00'),
(81, 'CONTROL FIT', 11, '0', '2019-04-23 00:00:00'),
(82, 'CONTROL FIT', 18, '0', '2019-04-23 00:00:00'),
(83, 'COORDIPUNTOS', 9, '0', '2019-04-23 00:00:00'),
(84, 'COORDIPUNTOS', 12, '0', '2019-04-23 00:00:00'),
(85, 'DESGASTE', 7, '0', '2019-04-23 00:00:00'),
(86, 'DIMARE', 5, '0', '2019-04-23 00:00:00'),
(87, 'DIMARE', 8, '0', '2019-04-23 00:00:00'),
(88, 'DIMARE', 13, '0', '2019-04-23 00:00:00'),
(89, 'DIMARE', 9, '0', '2019-04-23 00:00:00'),
(90, 'DINAMICA', 4, '0', '2019-04-23 00:00:00'),
(91, 'DINAMICA', 5, '0', '2019-04-23 00:00:00'),
(92, 'DINAMICA', 10, '0', '2019-04-23 00:00:00'),
(93, 'DINAMICA', 7, '0', '2019-04-23 00:00:00'),
(94, 'DINAMICA', 36, '0', '2019-04-23 00:00:00'),
(95, 'DINAMICA', 9, '0', '2019-04-23 00:00:00'),
(96, 'DINAMICA', 11, '0', '2019-04-23 00:00:00'),
(97, 'DINAMICA', 35, '0', '2019-04-23 00:00:00'),
(98, 'DOLCHE', 18, '0', '2019-04-23 00:00:00'),
(99, 'DOLCHE', 13, '0', '2019-04-23 00:00:00'),
(100, 'DOLCHE', 34, '0', '2019-04-23 00:00:00'),
(101, 'DOLCHE', 5, '0', '2019-04-23 00:00:00'),
(102, 'ESTAMPADO', 17, '0', '2019-04-23 00:00:00'),
(103, 'ESTRELLAS', 9, '0', '2019-04-23 00:00:00'),
(104, 'EXTREME SEC', 5, '0', '2019-04-23 00:00:00'),
(105, 'FORRO', 9, '0', '2019-04-23 00:00:00'),
(106, 'FORRO', 56, '0', '2019-04-23 00:00:00'),
(107, 'FORRO IWEI', 9, '0', '2019-04-23 00:00:00'),
(108, 'FORRO IWEI', 56, '0', '2019-04-23 00:00:00'),
(109, 'FORRO IWEI', 5, '0', '2019-04-23 00:00:00'),
(110, 'IBALSTAR', 18, '0', '2019-04-23 00:00:00'),
(111, 'IBALSTAR', 9, '0', '2019-04-23 00:00:00'),
(112, 'IBALSTAR', 13, '0', '2019-04-23 00:00:00'),
(113, 'INQONET', 40, '0', '2019-04-23 00:00:00'),
(114, 'INQONET', 7, '0', '2019-04-23 00:00:00'),
(115, 'JABON', 5, '0', '2019-04-23 00:00:00'),
(116, 'BUGAMBILIA', 6, '0', '2019-04-23 00:00:00'),
(117, 'BUGAMBILIA', 7, '0', '2019-04-23 00:00:00'),
(118, 'BUGAMBILIA', 13, '0', '2019-04-23 00:00:00'),
(119, 'BUGAMBILIA', 16, '0', '2019-04-23 00:00:00'),
(120, 'BUGAMBILIA', 9, '0', '2019-04-23 00:00:00'),
(121, 'BUGAMBILIA', 11, '0', '2019-04-23 00:00:00'),
(122, 'JOKY', 15, '0', '2019-04-23 00:00:00'),
(123, 'JOKY', 11, '0', '2019-04-23 00:00:00'),
(124, 'JOKY', 9, '0', '2019-04-23 00:00:00'),
(125, 'JOKY', 13, '0', '2019-04-23 00:00:00'),
(126, 'JOKY', 7, '0', '2019-04-23 00:00:00'),
(127, 'JOKY', 6, '0', '2019-04-23 00:00:00'),
(128, 'JOKY', 10, '0', '2019-04-23 00:00:00'),
(129, 'JOKY', 5, '0', '2019-04-23 00:00:00'),
(130, 'JOKY', 4, '0', '2019-04-23 00:00:00'),
(131, 'KAN51', 19, '0', '2019-04-23 00:00:00'),
(132, 'KAN52', 37, '0', '2019-04-23 00:00:00'),
(133, 'KAN53', 15, '0', '2019-04-23 00:00:00'),
(134, 'KIJO', 5, '0', '2019-04-23 00:00:00'),
(135, 'KIJO', 10, '0', '2019-04-23 00:00:00'),
(136, 'KIJO', 7, '0', '2019-04-23 00:00:00'),
(137, 'KIJO', 8, '0', '2019-04-23 00:00:00'),
(138, 'KIJO', 13, '0', '2019-04-23 00:00:00'),
(139, 'KIJO', 9, '0', '2019-04-23 00:00:00'),
(140, 'KIJO', 11, '0', '2019-04-23 00:00:00'),
(141, 'KIJO', 18, '0', '2019-04-23 00:00:00'),
(142, 'LATISHA', 13, '0', '2019-04-23 00:00:00'),
(143, 'LEON TEXTIL 1', 9, '0', '2019-04-23 00:00:00'),
(144, 'LICRA BRILLOSA 2503', 36, '0', '2019-04-23 00:00:00'),
(145, 'LICRA BRILLOSA 2504', 15, '0', '2019-04-23 00:00:00'),
(146, 'LICRA BRILLOSA 2505', 9, '0', '2019-04-23 00:00:00'),
(147, 'LICRA BRILLOSA 2506', 51, '0', '2019-04-23 00:00:00'),
(148, 'LICRA BRILLOSA 2507', 7, '0', '2019-04-23 00:00:00'),
(149, 'LIZARDDTHONS', 11, '0', '2019-04-23 00:00:00'),
(150, 'LIZARDDTHONS', 15, '0', '2019-04-23 00:00:00'),
(151, 'LIZARDDTHONS', 23, '0', '2019-04-23 00:00:00'),
(152, 'LIZARDDTHONS', 9, '0', '2019-04-23 00:00:00'),
(153, 'LIZARDDTHONS', 8, '0', '2019-04-23 00:00:00'),
(154, 'LIZARDDTHONS', 40, '0', '2019-04-23 00:00:00'),
(155, 'LOVEMIX', 8, '0', '2019-04-23 00:00:00'),
(156, 'LOVEMIX', 40, '0', '2019-04-23 00:00:00'),
(157, 'MAGARIZAG', 40, '0', '2019-04-23 00:00:00'),
(158, 'MAGARIZAG', 7, '0', '2019-04-23 00:00:00'),
(159, 'MAGARIZAG', 36, '0', '2019-04-23 00:00:00'),
(160, 'MALLA ASTROS', 9, '0', '2019-04-23 00:00:00'),
(161, 'MANASWIN', 19, '0', '2019-04-23 00:00:00'),
(162, 'MANASWIN', 40, '0', '2019-04-23 00:00:00'),
(163, 'MANASWIN', 6, '0', '2019-04-23 00:00:00'),
(164, 'MATCHCAMU', 16, '0', '2019-04-23 00:00:00'),
(165, 'MATCHCAMU', 9, '0', '2019-04-23 00:00:00'),
(166, 'MATCHCAMU', 13, '0', '2019-04-23 00:00:00'),
(167, 'MESH ESTRELLAS', 12, '0', '2019-04-23 00:00:00'),
(168, 'MESH ESTRELLAS', 9, '0', '2019-04-23 00:00:00'),
(169, 'MESH ESTRELLAS', 33, '0', '2019-04-23 00:00:00'),
(170, 'MESH ESTRELLAS', 32, '0', '2019-04-23 00:00:00'),
(171, 'MESH ESTRELLAS', 31, '0', '2019-04-23 00:00:00'),
(172, 'MESH GRUESO', 9, '0', '2019-04-23 00:00:00'),
(173, 'MESH GRUESO', 23, '0', '2019-04-23 00:00:00'),
(174, 'MESH GRUESO', 13, '0', '2019-04-23 00:00:00'),
(175, 'MESH GRUESO', 7, '0', '2019-04-23 00:00:00'),
(176, 'MESH GRUESO', 5, '0', '2019-04-23 00:00:00'),
(177, 'MESH ROMBOOS', 31, '0', '2019-04-23 00:00:00'),
(178, 'MESH ROMBOOS', 32, '0', '2019-04-23 00:00:00'),
(179, 'MOBOLI', 9, '0', '2019-04-23 00:00:00'),
(180, 'MOBOLI', 13, '0', '2019-04-23 00:00:00'),
(181, 'MORELO', 18, '0', '2019-04-23 00:00:00'),
(182, 'MORELO', 30, '0', '2019-04-23 00:00:00'),
(183, 'MORELO', 9, '0', '2019-04-23 00:00:00'),
(184, 'MORELO', 16, '0', '2019-04-23 00:00:00'),
(185, 'MORELO', 14, '0', '2019-04-23 00:00:00'),
(186, 'MORELO', 7, '0', '2019-04-23 00:00:00'),
(187, 'NICHE PLAY', 9, '0', '2019-04-23 00:00:00'),
(188, 'NICHE PLAY', 13, '0', '2019-04-23 00:00:00'),
(189, 'NOVOPRENO', 9, '0', '2019-04-23 00:00:00'),
(190, 'NOVOPRENO', 5, '0', '2019-04-23 00:00:00'),
(191, 'NYLON', 5, '0', '2019-04-23 00:00:00'),
(192, 'NYLON', 24, '0', '2019-04-23 00:00:00'),
(193, 'NYLON', 10, '0', '2019-04-23 00:00:00'),
(194, 'NYLON', 6, '0', '2019-04-23 00:00:00'),
(195, 'NYLON', 47, '0', '2019-04-23 00:00:00'),
(196, 'NYLON', 43, '0', '2019-04-23 00:00:00'),
(197, 'NYLON', 19, '0', '2019-04-23 00:00:00'),
(198, 'NYLON', 8, '0', '2019-04-23 00:00:00'),
(199, 'MAMEY', 13, '0', '2019-04-23 00:00:00'),
(200, 'MAMEY', 48, '0', '2019-04-23 00:00:00'),
(201, 'MAMEY', 16, '0', '2019-04-23 00:00:00'),
(202, 'MAMEY', 49, '0', '2019-04-23 00:00:00'),
(203, 'MAMEY', 23, '0', '2019-04-23 00:00:00'),
(204, 'MAMEY', 9, '0', '2019-04-23 00:00:00'),
(205, 'MAMEY', 30, '0', '2019-04-23 00:00:00'),
(206, 'MAMEY', 37, '0', '2019-04-23 00:00:00'),
(207, 'MAMEY', 11, '0', '2019-04-23 00:00:00'),
(208, 'MAMEY', 12, '0', '2019-04-23 00:00:00'),
(209, 'MAMEY', 22, '0', '2019-04-23 00:00:00'),
(210, 'MAMEY', 54, '0', '2019-04-23 00:00:00'),
(211, 'MAMEY', 53, '0', '2019-04-23 00:00:00'),
(212, 'MAMEY', 35, '0', '2019-04-23 00:00:00'),
(213, 'MAMEY', 18, '0', '2019-04-23 00:00:00'),
(214, 'NYLONJESS', 23, '0', '2019-04-23 00:00:00'),
(215, 'ONIXA', 5, '0', '2019-04-23 00:00:00'),
(216, 'ONIXA', 9, '0', '2019-04-23 00:00:00'),
(217, 'PACIFIC', 24, '0', '2019-04-23 00:00:00'),
(218, 'PACIFIC', 25, '0', '2019-04-23 00:00:00'),
(219, 'PACIFIC', 17, '0', '2019-04-23 00:00:00'),
(220, 'PACIFIC', 26, '0', '2019-04-23 00:00:00'),
(221, 'PACIFIC', 27, '0', '2019-04-23 00:00:00'),
(222, 'PACIFIC', 6, '0', '2019-04-23 00:00:00'),
(223, 'PACIFIC', 28, '0', '2019-04-23 00:00:00'),
(224, 'PACIFIC', 10, '0', '2019-04-23 00:00:00'),
(225, 'PACIFIC', 4, '0', '2019-04-23 00:00:00'),
(226, 'PACIFIC', 23, '0', '2019-04-23 00:00:00'),
(227, 'PACIFIC', 44, '0', '2019-04-23 00:00:00'),
(228, 'PACIFIC', 8, '0', '2019-04-23 00:00:00'),
(229, 'PACIFIC', 19, '0', '2019-04-23 00:00:00'),
(230, 'PACIFIC', 18, '0', '2019-04-23 00:00:00'),
(231, 'PACIFIC', 38, '0', '2019-04-23 00:00:00'),
(232, 'PACIFIC-NYLON', 29, '0', '2019-04-23 00:00:00'),
(233, 'PARADYSE', 5, '0', '2019-04-23 00:00:00'),
(234, 'PARADYSE', 6, '0', '2019-04-23 00:00:00'),
(235, 'PARADYSE', 13, '0', '2019-04-23 00:00:00'),
(236, 'PARADYSE', 9, '0', '2019-04-23 00:00:00'),
(237, 'PINKRITTY', 50, '0', '2019-04-23 00:00:00'),
(238, 'POLIRRAYON', 9, '0', '2019-04-23 00:00:00'),
(239, 'POWER', 6, '0', '2019-04-23 00:00:00'),
(240, 'POWER', 16, '0', '2019-04-23 00:00:00'),
(241, 'POWER', 11, '0', '2019-04-23 00:00:00'),
(242, 'POWER', 18, '0', '2019-04-23 00:00:00'),
(243, 'PUNTEADA', 4, '0', '2019-04-23 00:00:00'),
(244, 'PUNTEADA', 6, '0', '2019-04-23 00:00:00'),
(245, 'PUNTEADA', 9, '0', '2019-04-23 00:00:00'),
(246, 'PUNTO ROMANIA', 9, '0', '2019-04-23 00:00:00'),
(247, 'RALLAS', 9, '0', '2019-04-23 00:00:00'),
(248, 'RAYIBLUE', 6, '0', '2019-04-23 00:00:00'),
(249, 'RAYIBLUE', 13, '0', '2019-04-23 00:00:00'),
(250, 'RAYIBLUE', 9, '0', '2019-04-23 00:00:00'),
(251, 'RED ANTIGUA', 14, '0', '2019-04-23 00:00:00'),
(252, 'RED BRILLOSA', 33, '0', '2019-04-23 00:00:00'),
(253, 'RED BRILLOSA', 13, '0', '2019-04-23 00:00:00'),
(254, 'RED BRILLOSA', 9, '0', '2019-04-23 00:00:00'),
(255, 'RED BRILLOSA', 15, '0', '2019-04-23 00:00:00'),
(256, 'SABELAS', 5, '0', '2019-04-23 00:00:00'),
(257, 'SABELAS', 16, '0', '2019-04-23 00:00:00'),
(258, 'SABELAS', 9, '0', '2019-04-23 00:00:00'),
(259, 'SABELAS', 37, '0', '2019-04-23 00:00:00'),
(260, 'SABELAS', 11, '0', '2019-04-23 00:00:00'),
(261, 'SABELAS', 12, '0', '2019-04-23 00:00:00'),
(262, 'SHELSEI', 5, '0', '2019-04-23 00:00:00'),
(263, 'SKINKAN', 6, '0', '2019-04-23 00:00:00'),
(264, 'SKINKAN', 50, '0', '2019-04-23 00:00:00'),
(265, 'SKINKAN', 23, '0', '2019-04-23 00:00:00'),
(266, 'SKIPER', 4, '0', '2019-04-23 00:00:00'),
(267, 'SKIPER', 5, '0', '2019-04-23 00:00:00'),
(268, 'SKIPER', 10, '0', '2019-04-23 00:00:00'),
(269, 'SKIPER', 7, '0', '2019-04-23 00:00:00'),
(270, 'SKIPER', 13, '0', '2019-04-23 00:00:00'),
(271, 'SKIPER', 23, '0', '2019-04-23 00:00:00'),
(272, 'SKIPER', 9, '0', '2019-04-23 00:00:00'),
(273, 'SKIPER', 11, '0', '2019-04-23 00:00:00'),
(274, 'SOF BOLL', 5, '0', '2019-04-23 00:00:00'),
(275, 'SOF BOLL', 10, '0', '2019-04-23 00:00:00'),
(276, 'SOF BOLL', 13, '0', '2019-04-23 00:00:00'),
(277, 'SOF BOLL', 11, '0', '2019-04-23 00:00:00'),
(278, 'SOF BOLL', 12, '0', '2019-04-23 00:00:00'),
(279, 'SOFTSKIN', 7, '0', '2019-04-23 00:00:00'),
(280, 'SOFTSKIN', 18, '0', '2019-04-23 00:00:00'),
(281, 'SUPER RACING', 26, '0', '2019-04-23 00:00:00'),
(282, 'SUPER RACING', 13, '0', '2019-04-23 00:00:00'),
(283, 'SUPER RACING', 9, '0', '2019-04-23 00:00:00'),
(284, 'SUPER RACING', 18, '0', '2019-04-23 00:00:00'),
(285, 'TERAPHY FELL', 9, '0', '2019-04-23 00:00:00'),
(286, 'TREZOR', 10, '0', '2019-04-23 00:00:00'),
(287, 'TREZOR', 7, '0', '2019-04-23 00:00:00'),
(288, 'TREZOR', 11, '0', '2019-04-23 00:00:00'),
(289, 'TREZOR', 12, '0', '2019-04-23 00:00:00'),
(290, 'TREZOR', 18, '0', '2019-04-23 00:00:00'),
(291, 'TRIPAEK', 6, '0', '2019-04-23 00:00:00'),
(292, 'TRIPAEK', 9, '0', '2019-04-23 00:00:00'),
(293, 'TRIPAEK', 11, '0', '2019-04-23 00:00:00'),
(294, 'TRIPTON GIM', 9, '0', '2019-04-23 00:00:00'),
(295, 'UZIRGYM', 40, '0', '2019-04-23 00:00:00'),
(296, 'UZIRGYM', 36, '0', '2019-04-23 00:00:00'),
(297, 'UZIRGYM', 12, '0', '2019-04-23 00:00:00'),
(298, 'VALIANA', 4, '0', '2019-04-23 00:00:00'),
(299, 'VALIANA', 5, '0', '2019-04-23 00:00:00'),
(300, 'VALIANA', 10, '0', '2019-04-23 00:00:00'),
(301, 'VALIANA', 6, '0', '2019-04-23 00:00:00'),
(302, 'VALIANA', 26, '0', '2019-04-23 00:00:00'),
(303, 'VALIANA', 19, '0', '2019-04-23 00:00:00'),
(304, 'VALIANA', 8, '0', '2019-04-23 00:00:00'),
(305, 'VALIANA', 13, '0', '2019-04-23 00:00:00'),
(306, 'VALIANA', 9, '0', '2019-04-23 00:00:00'),
(307, 'VALIANA', 11, '0', '2019-04-23 00:00:00'),
(308, 'VALIANA', 12, '0', '2019-04-23 00:00:00'),
(309, 'VALIANA', 22, '0', '2019-04-23 00:00:00'),
(310, 'VALIANA', 21, '0', '2019-04-23 00:00:00'),
(311, 'VALICIA', 5, '0', '2019-04-23 00:00:00'),
(312, 'VALICIA', 10, '0', '2019-04-23 00:00:00'),
(313, 'VALICIA', 6, '0', '2019-04-23 00:00:00'),
(314, 'VALICIA', 9, '0', '2019-04-23 00:00:00'),
(315, 'VALICIA', 11, '0', '2019-04-23 00:00:00'),
(316, 'VALICIA', 22, '0', '2019-04-23 00:00:00'),
(317, 'VALIOSA', 6, '0', '2019-04-23 00:00:00'),
(318, 'VALIOSA', 7, '0', '2019-04-23 00:00:00'),
(319, 'VALIOSA', 21, '0', '2019-04-23 00:00:00'),
(320, 'VELURPUNTOS', 9, '0', '2019-04-23 00:00:00'),
(321, 'VELURPUNTOS', 15, '0', '2019-04-23 00:00:00'),
(322, 'VELURPUNTOS', 14, '0', '2019-04-23 00:00:00'),
(323, 'VINI51', 9, '0', '2019-04-23 00:00:00'),
(324, 'VINI52', 20, '0', '2019-04-23 00:00:00'),
(325, 'VIVEIRO', 4, '0', '2019-04-23 00:00:00'),
(326, 'VIVEIRO', 6, '0', '2019-04-23 00:00:00'),
(327, 'VIVEIRO', 19, '0', '2019-04-23 00:00:00'),
(328, 'VIVEIRO', 23, '0', '2019-04-23 00:00:00'),
(329, 'XAXUWAVE', 13, '0', '2019-04-23 00:00:00'),
(330, 'XAXUWAVE', 16, '0', '2019-04-23 00:00:00'),
(331, 'XAXUWAVE', 18, '0', '2019-04-23 00:00:00'),
(332, 'YURLY', 4, '0', '2019-04-23 00:00:00'),
(333, 'YURLY', 33, '0', '2019-04-23 00:00:00'),
(334, 'YURLY', 13, '0', '2019-04-23 00:00:00'),
(335, 'YURLY', 16, '0', '2019-04-23 00:00:00'),
(336, 'YURLY', 9, '0', '2019-04-23 00:00:00'),
(337, 'YURLY', 11, '0', '2019-04-23 00:00:00'),
(338, 'YURLY', 18, '0', '2019-04-23 00:00:00'),
(339, 'YURLY', 21, '0', '2019-04-23 00:00:00'),
(341, '', 0, '', '2019-05-27 23:48:11'),
(342, '', 0, '', '2019-05-27 23:49:37'),
(343, '', 0, '', '2019-05-27 23:50:10'),
(344, '', 0, '', '2019-05-27 23:50:25'),
(345, '', 0, '', '2019-05-27 23:55:07'),
(346, '', 0, '', '2019-05-27 23:55:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `ID_Tipo_Producto` int(20) NOT NULL,
  `Tipo_producto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`ID_Tipo_Producto`, `Tipo_producto`) VALUES
(2, 'TOP'),
(3, 'LEGGIN'),
(4, 'BLUSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(20) NOT NULL,
  `Codigo_usuario` varchar(100) NOT NULL,
  `Nombre_usuario` varchar(50) NOT NULL,
  `Apellido_paterno` varchar(50) NOT NULL,
  `Apellido_materno` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `Privilegio` int(2) NOT NULL,
  `Fecha_de_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Codigo_usuario`, `Nombre_usuario`, `Apellido_paterno`, `Apellido_materno`, `Usuario`, `Password`, `Puesto`, `Privilegio`, `Fecha_de_creacion`) VALUES
(9, 'Administrador', 'admin', 'admin', 'admin', 'admin', 'admin', 'Gerente', 1, '2019-03-11 21:06:36'),
(17, '5', 'Veronica', 'Ortega', 'Gomez', 'Veronica', '12345', 'Empleado', 7, '2019-04-22 18:50:08'),
(18, '6', 'Josefina ', 'Juarez', 'Alvarez', 'Josefina', '12345', 'Empleado', 7, '2019-04-22 18:50:35'),
(19, '7', 'Agustin', 'Lopez', 'Ayala', 'Agustin', '12345', 'Encargado', 2, '2019-04-22 18:50:58'),
(20, '8', 'Dalia Araceli', 'Rico', 'Aguilar', 'Dalia', '12345', 'Empleado', 7, '2019-04-22 18:51:24'),
(21, '9', 'Mayra', 'Escoto', 'Carrillo', 'Mayra', '12345', 'Encargado', 3, '2019-04-22 18:51:48'),
(22, '10', 'Jesus Francisco', 'Tenorio', 'Corona', 'Jesus', '12345', 'Empleado', 7, '2019-04-22 18:52:23'),
(23, '11', 'Norma Cristina', 'Perez', 'Arriaga', 'Norma', '12345', 'Empleado', 7, '2019-04-22 18:52:44'),
(24, '12', 'Francisco', 'Vieyra', 'Ramirez', 'Francisco', '12345', 'Empleado', 7, '2019-04-22 18:53:13'),
(25, '13', 'Angelica', 'Ortiz', 'Gordillo', 'Angelica', '12345', 'Empleado', 7, '2019-04-22 18:53:34'),
(26, '14', 'Aida del Carmen', 'Guzman', 'Antonio', 'Aida', '12345', 'Encargado', 5, '2019-04-22 18:53:57'),
(27, '15', 'Sara', 'MartÃ­nez', 'Gonzalez', 'Sara', '12345', 'Empleado', 7, '2019-04-22 18:54:13'),
(28, '16', 'Blanca Estela', 'Medina', 'Abrego', 'Blanca', '12345', 'Empleado', 7, '2019-04-22 18:54:44'),
(29, '18', 'Olga Lidia', 'Calderon', 'Alvarez', 'Olga', '12345', 'Empleado', 7, '2019-04-22 18:55:05'),
(30, '19', 'Maria ', 'Rodriguez', '', 'Maria', '12345', 'Empleado', 7, '2019-04-22 18:55:28'),
(31, '23', 'Elva', 'Lucio', 'Lopez', 'Elva', '12345', 'Empleado', 7, '2019-04-22 18:55:49'),
(32, '24', 'Gabriela', 'Duran', 'Corona', 'Gabriela', '12345', 'Empleado', 6, '2019-04-22 18:56:03'),
(33, '26', 'Jesus', 'Lopez', '', 'Jesus L', '12345', 'Empleado', 7, '2019-04-22 18:56:29'),
(34, '43', 'Jose ', 'Alonso', 'Perez', 'Jose', '12345', 'Empleado', 7, '2019-04-22 18:56:50'),
(35, '47', 'Miguel', 'Tenorio', 'Nava', 'Miguel', '12345', 'Empleado', 7, '2019-04-22 18:57:09'),
(36, '54', 'Martha ', 'Jurado', 'Ramirez', 'Martha', '12345', 'Empleado', 7, '2019-04-22 18:57:27'),
(37, '55', 'Isabel', 'Juarez', '', 'Isabel', '12345', 'Empleado', 7, '2019-04-22 18:57:45'),
(38, '56', 'Erik Eduardo', 'NuÃ±ez', 'Juarez', 'Eduardo', '12345', 'Empleado', 7, '2019-04-22 18:58:00'),
(39, '65', 'Javier', 'Villagomez', 'Lopez', 'Javier', '12345', 'Empleado', 7, '2019-04-22 18:58:23'),
(40, '67', 'Jorge Luis', 'Marc', '', 'Jorge', '12345', 'Empleado', 7, '2019-04-22 18:58:47'),
(41, '68', 'Maria Guadalupe', 'Rosales', 'Ortiz', 'Ma Guadalupe', '12345', 'Empleado', 7, '2019-04-22 18:59:09'),
(42, '71', 'David ', 'Ruiz', 'Ruiz', 'David', '12345', 'Empleado', 7, '2019-04-22 18:59:38'),
(43, '72', 'Baltazar', 'Zamudio', 'Vazquez', 'Baltazar', '12345', 'Empleado', 7, '2019-04-22 19:00:10'),
(44, '81', 'Mariana', 'Guillen', '', 'Mariana', '12345', 'Empleado', 7, '2019-04-22 19:00:27'),
(46, '82', 'Ma Irene', 'Rodriguez', 'Alonso', 'Irene', '12345', 'Empleado', 7, '2019-04-22 19:24:36'),
(47, '2a', 'Mayra', 'Moreno', 'Ruiz', 'MayMoreno', '12345', 'Empleado', 7, '2019-04-22 19:26:20'),
(48, '90', 'Xicotenca', 'X', 'X', 'Xicotenca', '12345', 'Empleado', 7, '2019-04-25 22:22:38'),
(49, '91', 'Jenny', 'x', 'x', 'jenny', '12345', 'Empleado', 7, '2019-04-25 22:31:17'),
(50, '92', 'Juanita', 'x', 'X', 'Juanita', '12345', 'Empleado', 7, '2019-04-25 23:23:18'),
(51, '93', 'Dora', 'x', 'x', 'Dora', '12345', 'Empleado', 7, '2019-04-25 23:31:03'),
(52, '94', 'Amelia', 'x', 'X', 'amelia', '12345', 'Empleado', 7, '2019-04-25 23:41:44'),
(53, '95', 'Marina', 'X', 'x', 'marina', '12345', 'Empleado', 7, '2019-04-25 23:43:25'),
(54, '96', 'Laura', 'X', 'X', 'laura', '12345', 'Empleado', 7, '2019-04-25 23:48:23'),
(55, '97', 'Alejandra', 'x', 'x', 'Alejandra', '12345', 'Encargado', 4, '2019-04-26 00:00:43'),
(56, '98', 'Arturo', 'x', 'x', 'Arturo', '12345', 'Empleado', 7, '2019-04-26 00:05:41'),
(57, '99', 'Alda', 'x', 'x', 'Alda', '12345', 'Empleado', 7, '2019-04-26 00:14:50'),
(58, '01', 'lupita', 'abc', 'abc', 'lupita', '12345', 'Vendedor', 10, '2019-06-09 22:50:41'),
(59, '001', 'moises', 'santibaÃ±ez', 'reyes', 'moises', '12345', 'Empleado', 6, '2019-06-14 21:59:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`ID_Almacen`),
  ADD KEY `Codigo_prenda` (`ID_Modelo`) USING BTREE,
  ADD KEY `ID_Talla` (`ID_Talla`) USING BTREE,
  ADD KEY `ID_Tipo_Producto` (`ID_Tipo_Producto`) USING BTREE;

--
-- Indices de la tabla `cantidad_modelo`
--
ALTER TABLE `cantidad_modelo`
  ADD PRIMARY KEY (`ID_cantidad_modelo`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`ID_Color`);

--
-- Indices de la tabla `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `defectos`
--
ALTER TABLE `defectos`
  ADD PRIMARY KEY (`ID_Defecto`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indices de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  ADD PRIMARY KEY (`ID_Detalle_Inventario`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `numero_cotizacion` (`numero_factura`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`ID_Incidencia`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `inventario_tela`
--
ALTER TABLE `inventario_tela`
  ADD PRIMARY KEY (`ID_Inventario`),
  ADD KEY `Nombre_tela` (`ID_Tela`) USING BTREE;

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`ID_Modelo`),
  ADD KEY `No_modelo` (`No_modelo`) USING BTREE;

--
-- Indices de la tabla `modelo_operacion`
--
ALTER TABLE `modelo_operacion`
  ADD PRIMARY KEY (`ID_Modelo_Operacion`),
  ADD KEY `ID_Modelo` (`ID_Modelo`,`ID_Operacion`) USING BTREE;

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`ID_Operacion`),
  ADD KEY `ID_Maquina` (`ID_Maquina`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `seccion_almacen`
--
ALTER TABLE `seccion_almacen`
  ADD PRIMARY KEY (`ID_Seccion`);

--
-- Indices de la tabla `seccion_tela`
--
ALTER TABLE `seccion_tela`
  ADD PRIMARY KEY (`ID_Seccion`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`ID_Talla`);

--
-- Indices de la tabla `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`ID_Tela`),
  ADD KEY `Nombre_tela` (`Nombre_tela`) USING BTREE;

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`ID_Tipo_Producto`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `ID_Almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cantidad_modelo`
--
ALTER TABLE `cantidad_modelo`
  MODIFY `ID_cantidad_modelo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `ID_Color` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `defectos`
--
ALTER TABLE `defectos`
  MODIFY `ID_Defecto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  MODIFY `ID_Detalle_Inventario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `ID_Incidencia` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_tela`
--
ALTER TABLE `inventario_tela`
  MODIFY `ID_Inventario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `ID_Maquina` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `ID_Modelo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `modelo_operacion`
--
ALTER TABLE `modelo_operacion`
  MODIFY `ID_Modelo_Operacion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `ID_Operacion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seccion_almacen`
--
ALTER TABLE `seccion_almacen`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `seccion_tela`
--
ALTER TABLE `seccion_tela`
  MODIFY `ID_Seccion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `ID_Talla` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tela`
--
ALTER TABLE `tela`
  MODIFY `ID_Tela` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `ID_Tipo_Producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
