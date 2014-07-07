-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2014 a las 20:56:24
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ingenieria2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido`, `baja`) VALUES
(7, 'Gato Dumas', '', 1),
(8, 'Maru Botana', '', 0),
(9, 'Karlos ArguiÃ±ano', '', 0),
(10, 'Guillermo Calabrese', '', 0),
(11, 'Romina Saluzzo', '', 0),
(12, 'LOLO', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `id_carrito` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_carrito`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_usuario`, `baja`) VALUES
(20, 33, 0),
(21, 34, 1),
(22, 35, 1),
(23, 36, 0),
(24, 37, 1),
(25, 38, 0),
(26, 39, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_libro`
--

CREATE TABLE IF NOT EXISTS `carrito_libro` (
  `id_carrito` int(5) NOT NULL,
  `id_libro` int(5) NOT NULL,
  `id_carritolibro` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_alta` datetime NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  `cantidad_pedida` int(11) NOT NULL,
  PRIMARY KEY (`id_carritolibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `carrito_libro`
--

INSERT INTO `carrito_libro` (`id_carrito`, `id_libro`, `id_carritolibro`, `fecha_alta`, `baja`, `cantidad_pedida`) VALUES
(20, 34, 1, '0000-00-00 00:00:00', 0, 1),
(20, 35, 2, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`, `baja`) VALUES
(6, 'Santillana', 0),
(7, 'Kairos', 0),
(8, 'Oceano', 1),
(10, 'Atlantida', 0),
(11, 'Tierramerica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_venta`
--

CREATE TABLE IF NOT EXISTS `estado_venta` (
  `nombre_estado` varchar(15) NOT NULL,
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `id_etiqueta` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_etiqueta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`id_etiqueta`, `nombre`, `baja`) VALUES
(54, 'Oriental', 1),
(55, 'Mondongo', 0),
(56, 'Postre', 0),
(57, 'Liviano', 0),
(58, 'Diabeticos', 0),
(59, 'Dieta', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
  `id_idioma` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id_libro` int(5) NOT NULL AUTO_INCREMENT,
  `id_editorial` int(5) NOT NULL,
  `id_etiqueta` int(5) NOT NULL,
  `stock` int(10) NOT NULL,
  `precio` int(10) NOT NULL,
  `isbn` int(14) NOT NULL,
  `cantPag` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baja` int(1) NOT NULL DEFAULT '0',
  `imagen` mediumblob NOT NULL,
  `extension` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `id_editorial`, `id_etiqueta`, `stock`, `precio`, `isbn`, `cantPag`, `nombre`, `fecha_alta`, `baja`, `imagen`, `extension`) VALUES
(34, 6, 55, 10, 50, 1234569999, 10, 'Las Tortas Magicas', '0000-00-00 00:00:00', 0, '', ''),
(35, 6, 55, 50, 25, 2147483647, 100, 'Gourmet Africano', '0000-00-00 00:00:00', 0, '', ''),
(36, 7, 55, 10, 50, 123456, 10, 'Todo parrilla', '0000-00-00 00:00:00', 0, '', ''),
(37, 6, 56, 99, 99, 2147483647, 99, 'Jarry Postre', '0000-00-00 00:00:00', 0, '', ''),
(38, 6, 55, 2147483647, 2147483647, 2147483647, 2147483647, 'Milanesas Legendarias', '0000-00-00 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libroautor`
--

CREATE TABLE IF NOT EXISTS `libroautor` (
  `id_autor` int(5) NOT NULL,
  `id_libro` int(5) NOT NULL,
  `id_libroAutor` int(5) NOT NULL AUTO_INCREMENT,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_libroAutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `libroautor`
--

INSERT INTO `libroautor` (`id_autor`, `id_libro`, `id_libroAutor`, `baja`) VALUES
(8, 34, 4, 0),
(8, 35, 5, 0),
(8, 36, 6, 0),
(9, 37, 7, 0),
(8, 38, 8, 0),
(8, 39, 9, 0),
(8, 41, 10, 0),
(8, 42, 11, 0),
(8, 43, 12, 0),
(9, 44, 13, 0),
(8, 45, 14, 0),
(8, 46, 15, 0),
(8, 47, 16, 0),
(8, 48, 17, 0),
(8, 49, 18, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libroidioma`
--

CREATE TABLE IF NOT EXISTS `libroidioma` (
  `id_libro` int(5) NOT NULL,
  `id_libroidioma` int(5) NOT NULL AUTO_INCREMENT,
  `id_idioma` int(5) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_libroidioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libroventa`
--

CREATE TABLE IF NOT EXISTS `libroventa` (
  `id_venta` int(5) NOT NULL,
  `id_libro` int(5) NOT NULL,
  `id_libroVenta` int(5) NOT NULL AUTO_INCREMENT,
  `baja` int(1) NOT NULL DEFAULT '0',
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id_libroVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `id_permiso` int(5) NOT NULL AUTO_INCREMENT,
  `nombrePermiso` int(5) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `fecha_hasta` datetime NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  `fecha_desde` datetime NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `dni` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(15) NOT NULL,
  `id_permiso` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(10) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`fecha_hasta`, `baja`, `fecha_desde`, `fecha_alta`, `dni`, `nombre`, `apellido`, `email`, `telefono`, `id_permiso`, `id_usuario`, `contrasena`, `nombreUsuario`) VALUES
('2014-05-13 00:00:00', 0, '2014-05-23 00:00:00', '2014-05-15 00:00:00', 33025130, 'Juan', 'Fernandez', 'JuanFernandez@gmail.com', 155796252, 1, 2, '123', 'juan'),
('2014-06-05 00:00:00', 0, '2014-06-05 00:00:00', '2014-06-05 00:00:00', 111111, 'emanuel', 'gonzalez', 'eeee@eeee.com', 1111, 1, 3, 'ema', 'ema'),
('0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 888888888, 'jota', 'jota', 'jota', 123123, 2, 33, '123', 'jota'),
('0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647, 'martin', 'fleitas', 'asasasas', 2147483647, 2, 34, '123', 'martin'),
('0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 99898, 'klnlknkj', 'kjnkjn', 'kkjnkjn', 98989898, 2, 35, '123', 'sarasa'),
('0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647, 'florencia', 'laksmladkmsd', 'alskdmaldskmalkd', 2147483647, 1, 36, '123', 'flor'),
('0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', '', 0, 1, 37, '', ''),
('0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 999999, 'Martin', 'Fleitas', 'fm@lala.com', 9999999, 1, 38, '123', 'fmartin'),
('0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647, 'Julieta', 'Rodrigues', 'juli.vuan@hotmail.com', 2147483647, 2, 39, '123', 'juli');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariolibro`
--

CREATE TABLE IF NOT EXISTS `usuariolibro` (
  `id_usuario` int(5) NOT NULL,
  `id_libro` int(5) NOT NULL,
  `id_usuariolibro` int(5) NOT NULL AUTO_INCREMENT,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuariolibro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `fecha` datetime NOT NULL,
  `numero` int(10) NOT NULL,
  `id_venta` int(5) NOT NULL AUTO_INCREMENT,
  `id_carrito` int(5) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `baja` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
