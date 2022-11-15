-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 16:17:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `f2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `nivel` int(11) NOT NULL,
  `pw` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `correo`, `nivel`, `pw`) VALUES
(1, 'maruygas', 'cuelloyhruby', 'marucuelloo@gmail.com', 1, 'maru1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `nombre` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slider` int(11) NOT NULL,
  `idioma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `nombre`, `titulo`, `slider`, `idioma`) VALUES
(9, 'Tratamientos Capilares', 'galeria_pelo.jpg', 1, 1),
(10, 'Coloración', 'galeria_PORTAD~3.JPG', 2, 1),
(11, 'Decoloración', 'galeria_pelo2.png', 2, 1),
(12, ' hair treatments', 'galeria_galeria_pelo.jpg', 1, 2),
(13, 'Coloration', 'galeria_galeria_PORTAD~3.JPG', 2, 2),
(14, 'discoloration', 'galeria_galeria_pelo2.png', 2, 2),
(15, 'discoloration', 'galeria_galeria_pelo2.png', 2, 2),
(16, 'discoloration', 'galeria_galeria_pelo2.png', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id_idiona` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id_idiona`, `codigo`, `nombre`) VALUES
(1, 1, 'español'),
(2, 2, 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `fondo` varchar(500) NOT NULL,
  `idioma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `fondo`, `idioma`) VALUES
(42, 'Quiene somos?', 'conocernos.png', 1),
(44, 'About Us', 'conocernos.png\r\n', 2),
(45, 'Servicios', 'servicios.png', 1),
(47, 'Services', 'servicios.png', 2),
(48, 'Salee', 'oferta.png', 2),
(55, 'promoción', 'oferta.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `portada` varchar(1000) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `face` varchar(100) NOT NULL,
  `twiter` varchar(100) NOT NULL,
  `footer` varchar(500) NOT NULL,
  `link` varchar(300) NOT NULL,
  `favicon` varchar(1000) NOT NULL,
  `fuente` varchar(400) NOT NULL,
  `instagran` varchar(300) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `direccion` varchar(350) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `color_contenido` varchar(300) NOT NULL COMMENT 'color de las letras del contenido',
  `color_boton` varchar(500) NOT NULL COMMENT 'color general de botones',
  `titulo` varchar(500) NOT NULL COMMENT 'titulo de la pagina',
  `color_titulo` varchar(500) NOT NULL COMMENT 'color de titulos de session',
  `colorf` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `portada`, `logo`, `face`, `twiter`, `footer`, `link`, `favicon`, `fuente`, `instagran`, `correo`, `direccion`, `telefono`, `color_contenido`, `color_boton`, `titulo`, `color_titulo`, `colorf`) VALUES
(12, 'portadapelu.jpg', 'logo (2) (1).png', 'https://es-la.facebook.com/piculerossueltos/', 'https://twitter.com/maruchacuello', '<span>Laboratorio II</span>', '', 'logo (2) (1).png', '2', 'https://www.instagram.com/piculerossueltos/', 'marucuelloo@gmail.com', 'Córdoba, Argentina', '3516608865', '#726e6e', '#db8f24', 'Hruby Gaston  mat:25087 y Marianela Cuello mat: 25086', '#8a8585', '#202020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE `sessiones` (
  `id_sessiones` int(11) NOT NULL,
  `title_sessiones` varchar(500) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `posicion_y` int(11) NOT NULL,
  `fondo` varchar(500) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `style` int(11) DEFAULT NULL,
  `posicion_x` int(11) DEFAULT NULL,
  `idioma` int(11) NOT NULL,
  `imagenf` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`id_sessiones`, `title_sessiones`, `contenido`, `link`, `posicion_y`, `fondo`, `imagen`, `style`, `posicion_x`, `idioma`, `imagenf`) VALUES
(8, 'Tratamientos Capilares', ' Realizamos todo tipo de tratamientos para que tu cabello este siempre como recien salido del salón...   ', 'servicios', 0, '', 'buzo.png', 1, 1, 1, ''),
(9, 'CHAUU FRIZZZ', '  Olvidate de la humedad, conocenos!    ', 'servicios', 1, 'blue', 'buzo-con-luz.png', 1, 2, 1, ''),
(10, 'Promociones ', ' Siempre hay una super promo para vos! Enterate cuales son...     ', 'promocion', 2, 'video', 'terra.mp4', 1, 1, 1, 'terra.mp4'),
(11, 'Coloración', ' Soy colorista, por ese motivo hacemos todo tipo de trabajos de coloracion, cuidando siempre tu cabello!  ', 'servicios', 3, NULL, 'rov.png', 1, 3, 1, ''),
(12, 'Contactanos', 'Podes seguirnos en nuestras redes!!', '', 4, NULL, '', 3, 3, 1, 'coral.png'),
(15, ' Contact us', 'Content in english', '#', 4, '', 'buzo.png', 1, 1, 2, ''),
(16, 'bye frizz', 'Forget the humidity, meet us!   ', 'services', 1, 'blue', 'buzo-con-luz.png', 1, 2, 2, ''),
(17, ' Hair Treatments', '  Content in\nWe carry out all kinds of treatments so that your hair is always like it just came out of the salon... english  ', 'servicios', 0, '', 'buzo.png', 1, 1, 2, ''),
(19, ' Coloration', 'I am a colorist, for that reason we do all kinds of color work, always taking care of your hair!', 'services', 3, NULL, 'subarinosinluces.png', 1, 3, 2, ''),
(21, 'promotion', 'There is always a super promo for you! Find out which son...', 'proyectos', 2, 'video', 'terra.mp4', 1, 1, 2, 'terra.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgaleria`
--

CREATE TABLE `subgaleria` (
  `id_subgaleria` int(11) NOT NULL,
  `nombre_img` varchar(1000) NOT NULL,
  `id_subgaleria_id_subcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subgaleria`
--

INSERT INTO `subgaleria` (`id_subgaleria`, `nombre_img`, `id_subgaleria_id_subcategoria`) VALUES
(27, 'rov.png', 31),
(28, 'about.png', 17),
(29, 'oferta.png', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodulos`
--

CREATE TABLE `submodulos` (
  `id_submodulos` int(11) NOT NULL,
  `titulo_sub` varchar(500) NOT NULL,
  `icono` varchar(500) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `imagen_sub` varchar(500) NOT NULL,
  `id_modulos_id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submodulos`
--

INSERT INTO `submodulos` (`id_submodulos`, `titulo_sub`, `icono`, `contenido`, `imagen_sub`, `id_modulos_id_sub`) VALUES
(17, 'Soy Maru y brindo servicios de peluquería a domicilio', '', 'Me dedico a brindar servicio de peluquería a domicilio. Así como lo lees, te llevo el salón a tu hogar! Ponete en contacto conmigo y reserva ya!', 'about.png', 42),
(29, 'Hi, My name is Maru and I do hairdressing at home', '', '', 'about.png', 44),
(31, 'Tratamientos, Coloración y cortes', 'galeria_pelo.jpg', 'Otros servicios: Cortes femeninos y a niños. Coloracion como: raices, color completo, balayage, reflejos, falso crecimiento, prepigmentación. Ademas Trtatamientos capilares como: Alisados,Nanoplastia, Antifrizz, Shock de keratina, botox, nutriciones y mucho más', 'servicios.png', 45),
(35, 'Straightening, Nanoplasty, Antifrizz, Keratin shock, botox, nutrition and much more', '', 'This is the content in English', 'servicios2.png', 47),
(38, 'with any service you have a free cut', '', 'This is the content in English', 'oferta.png', 48),
(48, 'Hace click y conoce las promos que tenemos para vos', 'galeria_pelo.jpg', '- Con cualquier servicio, el corte queda a mitad de precio!!!                                       \r\n- Seguinos en redes y conoce cuales son los meses de 2x1 en alisados. \r\n                                               \r\n- Tres servicios en un mismo domicilio tienen un 10% de descuento', 'oferta.png', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id_suscriptores` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id_suscriptores`, `nombre`, `apellido`, `telefono`, `correo`, `fecha`) VALUES
(14, 'marianela', 'cuello', '3516666555', 'maru@maru.com', '2022-10-23 10:10:40'),
(15, 'Cuca', 'Fran', '3516258963', 'cuca@cuca.com', '2022-10-23 17:10:17'),
(16, 'veronica', 'perez', '3516923369', 'vero@hotmail.com', '2022-10-23 17:02:31'),
(18, 'Jose', 'Funes', '3514658896', 'jose@gmail.com', '2022-11-04 19:47:34'),
(19, 'Mariana', 'lopez', '3516965888', 'maru@gmail.com', '2022-11-04 19:47:34'),
(22, 'Jose Manuel', 'Funes', '3514658896', 'josed@gmail.com', '2022-11-04 19:47:34'),
(23, 'Mariana juana', 'lopez', '3516965888', 'marulop@gmail.com', '2022-11-04 19:47:34'),
(24, 'Jorge', 'Funes', '3514658896', 'jor@gmail.com', '2022-11-04 19:47:34'),
(25, 'Marianela', 'lopez', '3516965888', 'marula@gmail.com', '2022-11-04 19:47:34'),
(26, 'matias', 'gomez', '3514658896', 'mati@gmail.com', '2022-11-04 19:47:34'),
(27, 'franca', 'lopez', '3516965888', 'fran@gmail.com', '2022-11-04 19:47:34'),
(28, 'laura', 'farias', '3514658896', 'laura@gmail.com', '2022-11-04 19:47:34'),
(29, 'paula', 'castillo', '3516965888', 'pau@gmail.com', '2022-11-04 19:47:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`),
  ADD KEY `idioma` (`idioma`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_idiona`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `idioma` (`idioma`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indices de la tabla `sessiones`
--
ALTER TABLE `sessiones`
  ADD PRIMARY KEY (`id_sessiones`),
  ADD KEY `idioma` (`idioma`);

--
-- Indices de la tabla `subgaleria`
--
ALTER TABLE `subgaleria`
  ADD PRIMARY KEY (`id_subgaleria`),
  ADD KEY `id_subgaleria_id_subcategoria` (`id_subgaleria_id_subcategoria`);

--
-- Indices de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD PRIMARY KEY (`id_submodulos`),
  ADD KEY `id_modulos_id_sub` (`id_modulos_id_sub`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id_suscriptores`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idiona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sessiones`
--
ALTER TABLE `sessiones`
  MODIFY `id_sessiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `subgaleria`
--
ALTER TABLE `subgaleria`
  MODIFY `id_subgaleria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  MODIFY `id_submodulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id_suscriptores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idioma`) REFERENCES `idioma` (`id_idiona`);

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`idioma`) REFERENCES `idioma` (`id_idiona`);

--
-- Filtros para la tabla `sessiones`
--
ALTER TABLE `sessiones`
  ADD CONSTRAINT `sessiones_ibfk_1` FOREIGN KEY (`idioma`) REFERENCES `idioma` (`id_idiona`);

--
-- Filtros para la tabla `subgaleria`
--
ALTER TABLE `subgaleria`
  ADD CONSTRAINT `subgaleria_ibfk_1` FOREIGN KEY (`id_subgaleria_id_subcategoria`) REFERENCES `submodulos` (`id_submodulos`);

--
-- Filtros para la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD CONSTRAINT `submodulos_ibfk_1` FOREIGN KEY (`id_modulos_id_sub`) REFERENCES `modulos` (`id_modulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
