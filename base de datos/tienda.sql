-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2015 a las 11:07:16
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `IDJUEGO` int(10) NOT NULL,
  `TIEMPO` int(10) NOT NULL,
  `PAGO` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int(10) NOT NULL,
  `DESCRIPCION` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `DESCRIPCION`) VALUES
(1, 'Deportes'),
(2, 'Accion'),
(3, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CEDULA` decimal(10,0) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `TELEFONO` decimal(10,0) DEFAULT NULL,
  `IMAGEN` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USER` varchar(15) NOT NULL,
  `PASS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE IF NOT EXISTS `juego` (
`IDJUEGO` int(10) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `CANTIDAD` decimal(10,0) DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `PLATAFORMA` varchar(50) DEFAULT NULL,
  `IMAGEN` varchar(100) DEFAULT NULL,
  `VIDEO` varchar(20) NOT NULL,
  `IDCATEGORIA` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`IDJUEGO`, `NOMBRE`, `DESCRIPCION`, `CANTIDAD`, `PRECIO`, `PLATAFORMA`, `IMAGEN`, `VIDEO`, `IDCATEGORIA`) VALUES
(1, 'FIFA15', 'FIFA 15 recrea con todo detalle el f&uacute;tbol para que los aficionados sientan la emoci&oacute;n del deporte rey como nunca antes. S&eacute; testigo de c&oacute;mo el p&uacute;blico anima y corea desde las gradas a sus equipos tal y como pasa en la realidad, adem&aacute;s de escuchar a los comentaristas seguir la trama del juego con las Presentaciones Din&aacute;micas de Partido.', '90', '14500.00', 'XBOX/PS/PC', 'img/Fifa15.jpg', 'TnTYVT6lwBc', 1),
(2, 'Grand Theft Auto V  ', 'Quinta entrega de la afamada saga de juegos sandbox de Rockstar Games. Con una atrevida nueva direcci&oacute;n en la libertad en mundo abierto, la narrativa, tres protagonistas (Michael, Trevor y Franklin), la jugabilidad basada en misiones y el multijugador online, Grand Theft Auto V se centra en la b&uacute;squeda del todopoderoso dinero en un reinventado Sur de California en la actualidad.', '34', '15000.00', 'XBOX/PS/PC', 'img/GTAV.jpg', 'QkkoHAzjnUs', 3),
(3, 'PES 2015', 'Hace realidad el lema -el campo es nuestro-. Gracias a la combinaci&oacute;n de esfuerzos de los equipos de Producci&oacute;n de PES de Tokio y Windsor, han sido recreados perfectamente los momentos de total nerviosismo y emoci&oacute;n del f&uacute;tbol de primera categor&iacute;a.', '77', '12000.00', 'XBOX/PS/PC', 'img/PES2015.jpg', 'Tv13s6WFI-Y', 1),
(4, 'FAR CRY 4', 'Desarrollado y distribuido por Ubisoft para PC, PlayStation 3, PlayStation 4, Xbox 360 y Xbox One, es la cuarta entrega de la saga de acci&oacute;n first person shooter Far Cry en la que viajaremos hasta el Himalaya para luchar contra un tirano amo y se&ntilde;or de sus tierras.', '8', '8000.00', 'XBOX/PS/PC', 'img/FC4.jpg', 'e9al_k8e93I', 2),
(5, 'LEFT 4 DEAD 2', 'Ambientado en el apocalipsis zombi, L4D2 es la secuela largamente esperada del galardonado Left 4 Dead. Jugar&aacute;s como uno de los cuatro nuevos supervivientes, armado con un enorme y devastador arsenal de armas cl&aacute;sicas y mejoradas. Adem&aacute;s de las armas de fuego, tendr&aacute;s la oportunidad de atacar a los infectados con diversas armas de combate cuerpo a cuerpo, desde motosierras hasta hachas, e incluso una mort&iacute;fera sart&eacute;n.', '42', '9000.00', 'XBOX/PS/PC', 'img/L4D2.jpg', '3IbKeAtdOCQ', 2),
(6, 'CALL OF DUTY: ADVANCED WARFARE ', 'Es una nueva entrega de la saga de disparos de Activision ambientado en un futuro 40 a&ntilde;os en el tiempo en el que los contratistas militares privados se han convertido en los grandes actores de la guerra internacional. El juego cuenta con Kevin Spacey como gran estrella, y nos ofrece armamento futurista, incluyendo exoesqueletos, armaduras y otros elementos de ciencia ficci&oacute;n.', '85', '15000.00', 'PC/XBOX/PS', 'img/COD.jpg', 'aoIiPTDz23Y', 2),
(7, 'GEARS OF WAR 3', 'Es el final de la trilog&iacute;a conocida actualmente. Desarrollado por Epic Games en exclusiva para Xbox 360. El jugador se convierte en Marcus Fenix, h&eacute;roe de guerra y l&iacute;der del pelot&oacute;n Delta, quien debe salvar a la humanidad, ya que 18 meses despu&eacute;s de la ca&iacute;da del &uacute;ltimo basti&oacute;n humano, la guerra contra los Locust contin&uacute;a, mientras, bajo la superficie, una temible amenaza infecta el planeta.', '20', '11000.00', 'XBOX/PS', 'img/GOW3.jpg', 'n7Te5fcnrUA', 2),
(8, 'CALL OF DUTY: GHOSTS', 'Desarrollado por Infinity Ward y distribuido por Activision. La acci&oacute;n transcurre  diez a&ntilde;os despu&eacute;s de un evento que devast&oacute; a las masas; por lo que USA ha dejado de ser una superpotencia. Una de las pocas fuerzas especiales de la naci&oacute;n, los Ghosts, tendr&aacute;n que combatir contra un poder global tecnol&oacute;gicamente superior reci&eacute;n surgido. Y no ser&aacute; por la libertad, sino simplemente por sobrevivir.', '7', '9000.00', 'XBOX/PS', 'img/CODG.jpg', 'Zxnx3W-HA18', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
`IDPRESTAMO` int(10) NOT NULL,
  `FECHA1` date DEFAULT NULL,
  `FECHA2` date NOT NULL,
  `PAGO` decimal(10,2) DEFAULT NULL,
  `IDCLIENTE` decimal(10,0) DEFAULT NULL,
  `IDJUEGO` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
 ADD PRIMARY KEY (`IDJUEGO`), ADD KEY `FK` (`IDCATEGORIA`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
 ADD PRIMARY KEY (`IDPRESTAMO`), ADD KEY `IDCLIENTE` (`IDCLIENTE`), ADD KEY `IDJUEGO` (`IDJUEGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
MODIFY `IDJUEGO` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
MODIFY `IDPRESTAMO` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
ADD CONSTRAINT `FK` FOREIGN KEY (`IDCATEGORIA`) REFERENCES `categoria` (`ID`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`IDCLIENTE`) REFERENCES `cliente` (`CEDULA`),
ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`IDJUEGO`) REFERENCES `juego` (`IDJUEGO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
