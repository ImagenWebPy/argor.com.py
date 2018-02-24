-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-01-2018 a las 11:18:26
-- Versión del servidor: 5.5.47-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `argor_db`
--
CREATE DATABASE IF NOT EXISTS `argor_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `argor_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(60) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `enlace` varchar(80) DEFAULT NULL,
  `texto_enlace` varchar(120) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `banner`
--

TRUNCATE TABLE `banner`;
--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `titulo`, `descripcion`, `enlace`, `texto_enlace`, `mostrar`) VALUES
(1, 'slide01.jpg', '¡Empeña fácil, rápido y seguro!', 'Argor te ofrece interés más bajo del mercado. Vení a cualquiera de nuestras  sucursales para comprobarlo. ', '#', NULL, 1),
(2, 'slide02.jpg', 'En Argor Empeños', 'la tasa de interes más baja y en guaraníes.  ', '#openModal', 'Tasar Ahora', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda_sitio`
--

DROP TABLE IF EXISTS `busqueda_sitio`;
CREATE TABLE IF NOT EXISTS `busqueda_sitio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) NOT NULL,
  `string_busqueda` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `busqueda_sitio`
--

TRUNCATE TABLE `busqueda_sitio`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `url_rewrite` varchar(50) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `orden` int(2) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Truncar tablas antes de insertar `categoria`
--

TRUNCATE TABLE `categoria`;
--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `url_rewrite`, `imagen`, `padre_id`, `orden`, `estado`) VALUES
(1, 'Acc. p/ Vehículos', 'accesorios-vehiculos', '', 0, 7, 1),
(2, 'Climatización', 'climatizacion', '', 0, 4, 1),
(3, 'Electrodomésticos', 'electredomesticos', '', 0, 2, 1),
(4, 'Electrónica', 'electronica', '', 0, 3, 1),
(5, 'Telefonía', 'telefonia', '', 0, 8, 1),
(6, 'Seguridad', 'seguridad', '', 0, 14, 1),
(7, 'Salud y Bienestar', 'salud-bienestar', '', 0, 6, 1),
(8, 'Hogar y Jardin', 'hogar-jardin', '', 0, 5, 1),
(9, 'Instrumentos Musicales', 'instrumentos-musicales', '', 0, 9, 1),
(10, 'Joyas y Relojes', 'joyas-relojes', '', 0, 10, 1),
(11, 'Deportes y Fitness', 'deportes-fitness', '', 0, 11, 1),
(12, 'Aire Libre', 'aire-libre', '', 0, 12, 1),
(13, 'Juguetes', 'juguetes', '', 0, 13, 1),
(14, 'Mascotas', 'mascotas', '', 0, 15, 1),
(15, 'Herramientas', 'herramientas', '', 0, 16, 1),
(16, 'Autoradio', 'autoradio', '', 1, 0, 1),
(17, 'Parlante', 'parlantes', '', 1, 0, 1),
(18, 'Limpieza', 'limpieza', '', 1, 0, 1),
(19, 'Acondicionadores de Aire', 'acondicionadores-aire', '', 2, 0, 1),
(20, 'Estufas', 'estufas', '', 2, 0, 1),
(21, 'Enfriadores', 'enfriadores', '', 2, 0, 1),
(22, 'Ventiladores', 'ventiladores', '', 2, 0, 1),
(23, 'Lavado', 'lavado', '', 3, 0, 1),
(24, 'Heladeras', 'heladeras', '', 3, 0, 1),
(25, 'Cocinas', 'cocinas', '', 3, 0, 1),
(26, 'Hornos Electrícos', 'hornos-electricos', '', 3, 0, 1),
(27, 'Microondas', 'microondas', '', 3, 0, 1),
(28, 'Placas Electrícas', 'placas-electricas', '', 3, 0, 1),
(29, 'Placas a Inducción', 'placas-induccion', '', 3, 0, 1),
(30, 'Pequeños Electrodomésticos', 'pequenos-electrodomesticos', '', 3, 0, 1),
(31, 'Informática', 'informatica', '', 4, 0, 1),
(32, 'Camaras', 'camaras', '', 4, 0, 1),
(33, 'Audio', 'audio', '', 4, 0, 1),
(34, 'Reproductores', 'reproductores', '', 4, 0, 1),
(35, 'Televisores', 'televisores', '', 4, 0, 1),
(36, 'Consolas de Videojuegos', 'consolas-videojuegos', '', 4, 0, 1),
(37, 'Celulares', 'celulares', '', 5, 0, 1),
(38, 'Accesorios', 'accesorios', '', 5, 0, 1),
(39, 'Teléfonos', 'telefonos', '', 5, 0, 1),
(40, 'Teléfonos Inalambricos', 'telefonos-inalambricos', '', 5, 0, 1),
(41, 'Caja de Seguridad', 'caja-seguridad', '', 6, 0, 1),
(42, 'CCTV', 'cctv', '', 6, 0, 1),
(43, 'DVR', 'dvr', '', 6, 0, 1),
(44, 'Contador de Billetes', 'contador-billetes', '', 6, 0, 1),
(45, 'Alarmas', 'alarmas', '', 6, 0, 1),
(46, 'Belleza', 'belleza', '', 7, 0, 1),
(47, 'Bicicletas', 'bicicletas', '', 7, 0, 1),
(48, 'Equipos de Gimnasia', 'equipos-gimnasia', '', 7, 0, 1),
(49, 'Cuidado Personal', 'cuidado-personal', '', 7, 0, 1),
(50, 'Muebles', 'muebles', '', 8, 0, 1),
(51, 'Blanqueria', 'blanqueria', '', 8, 0, 1),
(52, 'Artículos p/ Hogar', 'articulos-hogar', '', 8, 0, 1),
(53, 'Jardín', 'jardin', '', 8, 0, 1),
(54, 'Guitarras', 'guitarras', '', 9, 0, 1),
(55, 'Accesorios', 'accesorios', '', 9, 0, 1),
(56, 'Amplificadores', 'amplificadores', '', 9, 0, 1),
(57, 'Teclados', 'teclados', '', 9, 0, 1),
(58, 'Bateria', 'bateria', '', 9, 0, 1),
(59, 'Otros Instrumentos', 'otros-instrumentos', '', 9, 0, 1),
(60, 'Mujeres', 'mujeres', '', 10, 0, 1),
(61, 'Hombres', 'hombres', '', 10, 0, 1),
(62, 'Suplementos', 'suplementos', '', 11, 0, 1),
(63, 'Accesorios', 'accesorios', '', 11, 0, 1),
(64, 'Caza', 'caza', '', 12, 0, 1),
(65, 'Pezca', 'pezca', '', 12, 0, 1),
(66, 'Niños', 'ninos', '', 13, 0, 1),
(67, 'Niñas', 'ninas', '', 13, 0, 1),
(68, 'Alimentos', 'alimentos', '', 14, 0, 1),
(69, 'Accesorios', 'accesorios', '', 14, 0, 1),
(70, 'Higiene', 'higiene', '', 14, 0, 1),
(71, 'Ofertas', 'ofertas', NULL, 0, 1, 1),
(72, 'Proyectores', 'proyector', NULL, 4, 0, 1),
(73, 'Motosierra', 'motosierra', NULL, 15, 0, 1),
(74, 'Hombres', 'hombres', NULL, 11, 0, 1),
(75, 'Mujeres', 'mujeres', NULL, 11, 0, 1),
(76, 'Congelador', 'congelador', NULL, 3, 0, 1),
(77, 'Lavavajillas', 'lavavajillas', NULL, 3, 0, 1),
(78, 'Balanzas', 'balanzas', NULL, 7, 0, 1),
(79, 'Visicooler', 'visicooler', NULL, 3, 0, 1),
(80, 'Campanas', 'campanas', NULL, 3, 0, 1),
(81, 'Purificadores', 'purificadores', NULL, 3, 0, 1),
(82, 'Termocalefón', 'termocalefon', NULL, 8, 0, 1),
(83, 'Hidrolavadora', 'hidrolavadora', NULL, 8, 0, 1),
(84, 'Aspiradoras', 'aspirasoras', NULL, 8, 0, 1),
(85, 'Subastas', 'subasta', NULL, 0, 0, 0),
(86, 'Promociones', 'promociones', NULL, 0, 0, 0),
(87, 'Pulidora', 'pulidora', NULL, 15, 0, 1),
(88, 'Lijadora', 'lijadora', NULL, 15, 0, 1),
(89, 'Amplificador', 'amplificador', NULL, 1, 0, 1),
(90, 'Soldadores', 'soldadores', NULL, 15, 0, 1),
(91, 'Sierra', 'sierra', NULL, 15, 0, 1),
(92, 'Sopladores', 'sopladores', NULL, 15, 0, 1),
(93, 'Pulidora', 'pulidora-autos', NULL, 1, 0, 1),
(94, 'Taladro', 'taladro', NULL, 15, 0, 1),
(95, 'Motores', 'motores', NULL, 15, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL,
  `url_amigable` varchar(160) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  `filtro` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Truncar tablas antes de insertar `categorias`
--

TRUNCATE TABLE `categorias`;
--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `img`, `url_amigable`, `mostrar`, `filtro`) VALUES
(1, 'Audio y Video', 'audio.jpg', 'audio_video', 1, 'audio'),
(2, 'Cámaras Fotográficas', 'camaras.jpg', 'camaras_fotograficas', 1, 'camaras'),
(3, 'Eletrodomésticos', 'electrodomesticos.jpg', 'electrodomesticos', 1, 'electrodomesticos'),
(4, 'Eletrónica', 'electronica.jpg', 'electronica', 1, 'electronica'),
(5, 'Instrumentos', 'instrumentos.jpg', 'instrumentos', 1, 'instrumentos'),
(6, 'Joyas y Relojes', 'joyas.jpg', 'joyas', 1, 'joyas'),
(7, 'Muebles', 'muebles.jpg', 'muebles', 1, 'muebles'),
(8, 'Bicicletas', 'bicicletas.jpg', 'bicicletas', 1, 'bicicletas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_costo_envio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_departamento_idx` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `ciudad`
--

TRUNCATE TABLE `ciudad`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_left` varchar(160) DEFAULT NULL,
  `titulo_local` varchar(160) DEFAULT NULL,
  `direccion_local` varchar(255) DEFAULT NULL,
  `telefono_local` varchar(60) DEFAULT NULL,
  `email_local` varchar(60) DEFAULT NULL,
  `titulo_horario` varchar(160) DEFAULT NULL,
  `horario_dia` varchar(60) DEFAULT NULL,
  `horario_sabados` varchar(60) DEFAULT NULL,
  `horario_info` varchar(255) DEFAULT NULL,
  `titulo_right` varchar(160) DEFAULT NULL,
  `map_latitude` varchar(30) DEFAULT NULL,
  `map_longitude` varchar(30) DEFAULT NULL,
  `email_formulario` varchar(60) DEFAULT NULL,
  `email_cv` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `contacto`
--

TRUNCATE TABLE `contacto`;
--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `titulo_left`, `titulo_local`, `direccion_local`, `telefono_local`, `email_local`, `titulo_horario`, `horario_dia`, `horario_sabados`, `horario_info`, `titulo_right`, `map_latitude`, `map_longitude`, `email_formulario`, `email_cv`) VALUES
(1, 'Ponte en contacto con nosotros', 'NUESTRA CASA CENTRAL', 'Avda. Eusebio Ayala 4073 c/ R.I.6 Boqueron Asunción - Paraguay', '(021) 328 3400', 'administracion@argor.com.py', 'HORARIO DE ATENCIÓN', 'LUN - VIE 07:30 - 18:00', 'SAB 08:00 - 13:00', 'Algunas de nuestras sucursales podrían tener variación.', 'Escríbenos', '-25.302533', '-57.615657', 'administracion@argor.com.py', 'administracion@argor.com.py');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corporativos_locales`
--

DROP TABLE IF EXISTS `corporativos_locales`;
CREATE TABLE IF NOT EXISTS `corporativos_locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_local` int(11) NOT NULL,
  `corporativo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Truncar tablas antes de insertar `corporativos_locales`
--

TRUNCATE TABLE `corporativos_locales`;
--
-- Volcado de datos para la tabla `corporativos_locales`
--

INSERT INTO `corporativos_locales` (`id`, `id_local`, `corporativo`) VALUES
(1, 9, '0972 - 655 120'),
(2, 5, '0972 - 655 102'),
(3, 6, '0972 - 655 106'),
(4, 14, '0974 - 491 078'),
(5, 7, '0972 - 655 111'),
(6, 13, '0972 - 655 110'),
(7, 1, '0972 - 655 115'),
(8, 8, '0972 - 655 108'),
(9, 16, '0974 - 491 083'),
(10, 2, '0972 - 655 113'),
(11, 2, '0986 - 969 171'),
(12, 2, '0972 - 655 114'),
(13, 17, '0974 - 491 084'),
(14, 3, '0972 - 655 117'),
(15, 4, '0972 - 655 109'),
(16, 12, '0972 - 655 124'),
(17, 10, '0972 - 655 122'),
(18, 15, '0974 - 491 082'),
(19, 11, '0972 - 655 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_moneda`
--

DROP TABLE IF EXISTS `cotizacion_moneda`;
CREATE TABLE IF NOT EXISTS `cotizacion_moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_moneda` int(11) NOT NULL,
  `cotizacion` decimal(2,0) NOT NULL,
  `fecha_cotizacon` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moneda_id_idx` (`id_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `cotizacion_moneda`
--

TRUNCATE TABLE `cotizacion_moneda`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(180) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `mensaje` text,
  `archivo` varchar(60) NOT NULL,
  `leido` int(1) NOT NULL DEFAULT '0',
  `oculto` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=411 ;

--
-- Truncar tablas antes de insertar `cv`
--

TRUNCATE TABLE `cv`;
--
-- Volcado de datos para la tabla `cv`
--

INSERT INTO `cv` (`id`, `nombre`, `email`, `telefono`, `mensaje`, `archivo`, `leido`, `oculto`) VALUES
(1, '360 media logo.pdf', 'raul.chuky@gmail.com', '0976921801', 'aaaaaaaaa', '360 media logo.pdf', 0, 1),
(2, 'CARLOS DARIO BALBUENA CARDOZO', 'stipo1989@hotmail.com', 'STIPO1986@HOTMAIL.COM', 'Buenas Tardes.\r\nMe interesaria mucho trabajar en su empresa, no tengo problema de horario...\r\nEspero su respuesta...\r\nDesde ya muchas gracias..\r\n\r\nATTE.....\r\n\r\n   CARLOS BALBUENA.....', 'miguel 2016 - copia (2).docx', 0, 1),
(3, 'Evelyn Gabriela RuizDiaz Castillo', 'evelynruizdiazcastillo@gmail.com', '0984.804.321     (021) 551.133', 'Me gustaría formar parte del plantel administrativo.', 'Curriculum Vitae.pdf', 0, 1),
(4, 'Liz Marlene Méreles López', 'liz.mereles@gmail.com', '0983.677.776', 'Les envio mi curriculum para que me tengan en cuenta en caso de que exista alguna vacancia para caja o como auxiliar contable. Desde ya gracias por la atencion.', 'Curriculum Liz Mereles.pdf', 0, 1),
(5, 'Rocio Benitez', 'rocio_helman@hotmail.com', '(0961) 269 – 409', '', 'ojo rocio Curriculum.docx', 0, 1),
(6, 'Aldo Joel Villalba Vera', 'mei_mill88@hotmail.com', '0981949932', 'Me gustaría formar parte del gran grupo de trabajo de la empresa. Gracias', 'aldo 2016.docx', 0, 1),
(7, 'Ariel Davalos', 'aridaval90@hotmail.com', '0982704520', 'Quisiera que me den una oportunidad de formar parte de la empresa', 'CURRICULUM VITAE.docx', 0, 1),
(8, 'Cesar alberto lopez rojas', 'cl98637@gmail.com', '0984133752', 'Buenas tardes les dejo mis documentos me gustaria ser parte de su empresa', 'Notas_20160511_133822018.vnt', 0, 1),
(9, 'Cesar alberto lopez rojas', 'cl98637@gmail.com', '0984133752', 'Buenas tardes les dejo mis documentos me gustaria ser parte de su empresa', 'Notas_20160511_133822018.vnt', 0, 1),
(10, 'Cesar alberto lopez rojas', 'cl98637@gmail.com', '0984133752', 'Buenas tardes les dejo mis documentos me gustaria ser parte de su empresa', 'Notas_20160511_133822018.vnt', 0, 1),
(11, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '         Curriculum Vitae\r\n           Datos personales\r\n\r\nNombre          cesar alberto\r\n\r\nApellido         lopez Rojas\r\n\r\nFecha de nacimiento   30/01/1088\r\n\r\nLugar de nacimiento   Asuncion\r\n\r\nNacionalidad     paraguayo \r\n\r\nCedula de identidad    4568537\r\n\r\nDirección      paso de patria e/yasy\r\n\r\nCiudad            san antonio   \r\n\r\nTelefono           0984133752\r\n     \r\n       Estudios  Cursados\r\n\r\nNivel primario \r\nEscuela jorge Alcibiades Gades\r\n\r\nNivel cecundario \r\n1 a 4 Curso Colegio Juan José soler  \r\n5 a 6 Curso Colegio Moisés Bertoni\r\n\r\nTitulo Obtenido   Bachiller Científic\r\n\r\nIdioma\r\n\r\nEspañol   buen manejo\r\n\r\nGuarani  buen manejo\r\n\r\nEXPERIENCIA     LABORAL\r\n\r\nLa Plata Empeños\r\nCargo    encargado cajero \r\nAntigüedad   4 años 3meses\r\n\r\nMuebleria Hd\r\n\r\nCargo        vendedor chofer\r\nAntigüedad         1 año\r\n\r\nEMPRESA JM PULP\r\n\r\nCargo        Repositor \r\nAntigüedad   2 años\r\n\r\nSUPERMECADO LA BOMBA\r\n\r\nCargo          encargad\r\nAntigüedad    2 años\r\n\r\nVERDULERIA VILLA VERDE\r\n\r\nAntiguedad   1 año\r\n\r\nCORPASA PECHUGON\r\n\r\nAntiguedad    1 año\r\n\r\nCAMARA FRIGORIFICA SAPROCAL\r\n\r\nAntiguedad   1', '14629911951611676598607.jpg', 0, 1),
(12, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '         Curriculum Vitae\r\n           Datos personales\r\n\r\nNombre          cesar alberto\r\n\r\nApellido         lopez Rojas\r\n\r\nFecha de nacimiento   30/01/1088\r\n\r\nLugar de nacimiento   Asuncion\r\n\r\nNacionalidad     paraguayo \r\n\r\nCedula de identidad    4568537\r\n\r\nDirección      paso de patria e/yasy\r\n\r\nCiudad            san antonio   \r\n\r\nTelefono           0984133752\r\n     \r\n       Estudios  Cursados\r\n\r\nNivel primario \r\nEscuela jorge Alcibiades Gades\r\n\r\nNivel cecundario \r\n1 a 4 Curso Colegio Juan José soler  \r\n5 a 6 Curso Colegio Moisés Bertoni\r\n\r\nTitulo Obtenido   Bachiller Científic\r\n\r\nIdioma\r\n\r\nEspañol   buen manejo\r\n\r\nGuarani  buen manejo\r\n\r\nEXPERIENCIA     LABORAL\r\n\r\nLa Plata Empeños\r\nCargo    encargado cajero \r\nAntigüedad   4 años 3meses\r\n\r\nMuebleria Hd\r\n\r\nCargo        vendedor chofer\r\nAntigüedad         1 año\r\n\r\nEMPRESA JM PULP\r\n\r\nCargo        Repositor \r\nAntigüedad   2 años\r\n\r\nSUPERMECADO LA BOMBA\r\n\r\nCargo          encargad\r\nAntigüedad    2 años\r\n\r\nVERDULERIA VILLA VERDE\r\n\r\nAntiguedad   1 año\r\n\r\nCORPASA PECHUGON\r\n\r\nAntiguedad    1 año\r\n\r\nCAMARA FRIGORIFICA SAPROCAL\r\n\r\nAntiguedad   1', '14629911951611676598607.jpg', 0, 1),
(13, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', 'Les dejo mis documentos me gustaria ser integrante de su empresa', 'Notas_20160511_131449356.jpg', 0, 1),
(14, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_133822018.vnt', 0, 1),
(15, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_133822018.vnt', 0, 1),
(16, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_133822018.vnt', 0, 1),
(17, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_131449356.jpg', 0, 1),
(18, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_131449356.jpg', 0, 1),
(19, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_131449356.jpg', 0, 1),
(20, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_131449356.jpg', 0, 1),
(21, 'cesar alberto lopez', 'cl98637@gmail.com', '0984133752', 'Para que me tengan en cuenta me gustaria formar parte de su empresa', 'Notas_20160511_133822018.vnt', 0, 1),
(22, 'cesar alberto lopez', 'cl98637@gmail.com', '0984133752', 'Para que me tengan en cuenta me gustaria formar parte de su empresa', 'Notas_20160511_131449356.jpg', 0, 1),
(23, 'cesar alberto lopez', 'cl98637@gmail.com', '0984133752', 'Para que me tengan en cuenta me gustaria formar parte de su empresa', 'Notas_20160511_131449356.jpg', 0, 1),
(24, 'Cesar alberto Lopez rojas', 'cl98637@gmail.com', '0984133752', '', 'Notas_20160511_131449356.jpg', 0, 1),
(25, 'Analia Elizabeth Acosta Meza', 'elizabethe.acosta@gmail.com', '0972624935', '', 'curriculum analia.docx', 0, 1),
(26, 'Gloria Elizabeth Garcete', 'glorianorbert@hotmail.com', '0971 - 596-439', 'Buenos Dias.\r\nAdjunto mi C.V para lo que hubiera lugar', 'Curriculum_Gloria (3).docx', 0, 1),
(27, 'TANIA NAIR GIMENEZ BENITEZ', 'taniag09@gmail.com', '0982966530', '', 'curriculum TANIA.docx', 0, 1),
(28, 'Rodrigo Jose Samaniego Palacios', 'rodrijosama@hotmail.com', '0994983036', '', 'rodrigo.pdf', 0, 1),
(29, 'Mauro Antonio Gonzalez Ojeda', 'mago.gonzalez90@hotmail.com', '0981469515', 'Soy una persona muy responsable en su trabajo y realizarlas en tiempo y forma busco seguir creciendo profesionalmente y seguir aprendiendo seguir cultivando experiencia soy atento honesto y leal con quien me da la oportunidad de conseguir mis objetivos siempre en el marco del respeto hacia los demás y seguir formando vínculos', 'CURRICULUM_VITAE_MAURO_GONZALEZ.pdf', 0, 1),
(30, 'Ruth Carolina Ferreira Meza', 'ruth.ferreira77@hotmail.com', '0985525268', 'Soy estudiante universitaria y estoy en busca de un empleo.', 'linda.docx', 0, 1),
(31, '', '', '', '', 'IVAN DAVID BAUMANN SALDIVAR.doc', 0, 1),
(32, 'Ana Belen Perez Duarte', 'abperez1912@gmail.com', '0961919262', 'Quisiera la oportunidad de trabajar con ustedes, les adjunto mi cv', 'CV belen.docx', 0, 1),
(33, 'Jessica Cecilia Duarte Ramírez', 'ceiramirez997@gmail.com', '(0971)868-705', 'Buenas Tardes\r\nA través de la presente le envió mis saludos y me presento como postulante a algún cargo vacante que se adecue a mi perfil.\r\nAdjunto mi currículum para poder ser tenida en cuenta en el proceso de selección. Agradezco mucho su atención.\r\nAtentamente,\r\nJessica Duarte', 'Jessica Duarte.pdf', 0, 1),
(34, 'Ana belen Arzamendia', 'belenarzamendia94@gmail.com', '0981128162', '', 'CURRICULUM ANA ARZAMENDIA.docx', 0, 1),
(35, 'Marion von Bischhoffshausen', 'marion.heimpell@gmail.com', '0992460567', 'Estimados responsables de RR.HH.:\r\nTengo el agrado de dirigirme a usted con el objeto de participar en búsquedas acordes a mi perfil en su empresa. La experiencia laboral me ha enseñado a priorizar las tareas en función de la urgencia o importancia que estas conllevan, además de ir conociendo la mejor forma de trabajar en equipo y colaborar con los demás en el desarrollo de su trabajo.\r\n\r\nSoy estudiante y me encantaría, estoy muy interesada, en el desarrollo y en búsqueda de nuevos horizontes dentro de su empresa. Estaría encantada de desempeñar un puesto, en cuanto se me indique.\r\n\r\nQuedo a su entera disposición ante una eventual entrevista personal con el objetivo de profundizar aspectos de mi perfil que resulten de su interés. Cuento con disponibilidad completa e inmediata.\r\n\r\nDeseando poner mi experiencia a su disposición, le adjunto mi curriculum vitae.\r\n\r\nAprovecho esta oportunidad para saludarle cordialmente.\r\n\r\nMarion von Bischhoffshausen\r\nC.I.: 3.570.823', 'C.V. Marion von Bischhoffshausen.pdf', 0, 1),
(36, 'Bruno José Netto Tocchetto', 'brunonetto@hotmail.es', '0985176699', 'Envío este curriculum  en busca de alguna vacancia que se adapte a mi perfil.', 'CURRICULUM VITAE - BRUNO NETTO (1).doc', 0, 1),
(37, 'Federico Nicolas Cabral Tilleria', 'nico_cabral77@hotmail.com', '0983692683', 'me gustaria formar parte de la empresa, pondre todo de mi para aprender y poder integrarme. Desde ya, muchas gracias!', 'Curriculum Nicolas Cabral.doc', 0, 1),
(38, 'Fátima Arrua', 'floppy_87@hotmail.com', '0981217108', 'Me gustaría pertenecer al grupo de trabajo de la empresa', 'Curriculum Vitae fatima arrua.docx', 0, 1),
(39, 'Christian Ferreira', 'christian.py85@gmail.com', '0985687774', '', 'Christian Ferreira . curriculum vitae.pdf', 0, 1),
(40, 'Amin Fernando Benitez Galeano', 'aminfer10@hotmail.com', '0985901025', 'Buen día \r\nTengo el agrado de dirigirme a Ustedes con el objeto de participar en búsquedas acordes a mi perfil. Adjunto les remito mi Curriculum Vitae para que me incluyeran en su base de datos por si se produjera alguna vacante o si tuvieran intención de ampliar su Equipo de trabajo. \r\nQuedo a su entera disposición ante una eventual entrevista personal con el objetivo de profundizar aspectos de mi perfil que resulten de su interés. \r\nEstoy buscando empleo, preferentemente en el departamento central. \r\nMe considero una persona muy activa y puedo adecuarme fácilmente a un equipo de trabajo. Soy Analista de Sistemas, poseo mas de 10 años de experiencia en diversas áreas tales como:Atención a Clientes, Planificación de Proyectos, Estrategias de Ventas, Gestión de Cobranzas, Manejo de Grupos de Trabajo, Supervisión, Logro de Objetivos, Rentabilidad, Análisis de Créditos, Control Stock, Inventario, etc. Ademas tengo amplios conocimientos de herramientas informáticas y Registro de conducir vigente. \r\nSi desean saber algo mas acerca de mi perfil no duden en contactarme. \r\nSaludos Cordiales.', 'Curriculum_Amin.pdf', 0, 1),
(41, 'Ricardo Recalde', 'recaldericardo73@hotmail.com', '0985245722', '', 'Curriculum de Ricardo 3.docx', 0, 1),
(42, 'Maria Leticia Meza Figueredo', 'marialeticiameza@hotmail.com', '0976576099', 'Buenos días \r\nMe gustaría formar parte de tan prestigiosa empresa, espero me tengan en cuenta cuando surja una vacante.\r\nSaludos cordiales', 'CV PDF.pdf', 0, 1),
(43, 'Jesús Portela', 'jeporafael@gmail.com', '0983587152', '', 'Curriculum Vitae - Jesus Portela 1.pdf', 0, 1),
(44, 'Rocio Benitez', 'rocio_helman@hotmail.com', '(0961) 269 – 409', '', 'ojo rocio Curriculum.docx', 0, 1),
(45, 'Rodrigo Cassa', 'rodrigocassals2015@gmail.com', '0972512565', '', 'Curriculum RC.docx', 0, 1),
(46, 'Claudia Gissel Benitez Diaz', 'gisselb_@hotmail.com', '0985328840 / 0991232540', 'Buenas Tardes.\r\nAdjunto mi Curriculum Vitae con el fin de recibir alguna propuesta de trabajo.\r\nDesde ya muchas Gracias.', 'C V CLAUDIA BENITEZ.01.doc', 0, 1),
(47, 'Romina Boscarino', 'romiboscabi@hotmail.com', '0972208085', 'Buenos días, \r\n\r\nTengo el agrado de dirigirme a ustedes con el objeto de poner a su disposición mi Currículo. \r\n\r\nDesde ya, muchas gracias.', 'CV_Romi_Boscarino.docx', 0, 1),
(48, 'Angel Ariel Camacho Arellano', 'anitacaceres97@gmail.com', '0981508030', '', 'Ariel Camacho.pdf', 0, 1),
(49, 'Ana Belen Perez Duarte', 'abperez1912@gmail.com', '0961919262', 'Quisiera trabajar con ustedes', 'CV belen.docx', 0, 1),
(50, 'Gladys Velázquez', 'gnves@hotmail.com', '0981 450816', 'Estimados señores.\r\nMe gustaría formar parte de su equipo.\r\nMuchas gracias.', 'CV Gladys Velazquez. res.pdf', 0, 1),
(51, 'Gabriela Arami Florentin Davalos', 'juanida@hotmail.es', '0982639051', 'Me gustaria formar parte de su gran equipo de trabajo.', 'CURRICULUM VITAE -  Gaby.docx', 0, 1),
(52, 'David Daniel Vergara Dure', 'dadaver_93@hotmail.com', '0983378654', '', 'c.v (1).doc', 0, 1),
(53, 'Alice Virginia Gonzalez Aguayo', 'gonzalezalice405@gmail.com', '0986181064', 'Tengo el gusto de dirigirme a Ud. con el fin de acercarle mi currículum vitae para poder participar en búsquedas laborales acordes a mi perfil dentro de la empresa. Un año seis meses me desempeñé como vendedora, cajera  y atención al cliente en un local de comida mexicana en el Shopping del Sol.Me considero proactiva y con capacidad para trabajar en equipo. Actualmente tengo absoluta disponibilidad horaria. Quedo a su disposición para concretar una reunión, si lo cree conveniente, a fin de conocernos personalmente y ampliar cualquier detalle de mi currículum que considere pertinente. A la espera de sus noticias, lo saludo cordiamente.', 'CURRICULUM VITAE alice.docx', 0, 1),
(54, 'Mathias Ferreira Alcaraz', 'mathiasferreira_3dd@hotmail.com', '0985 232669', 'Buenas! Enviado!', 'MATHIAS 2016.docx', 0, 1),
(55, 'Aracelli Noemi Gómez Ramirez', 'aranoemi96@hotmail.com', '0985708599', 'Me creo capaz de aportar un granito de mis conocimientos y seguir aprendiendo algo más dentro de la mejor empresa.-', 'CURRICULUM MODIFICADO.pdf', 0, 1),
(56, 'Athalia Frutos Galeano', 'athaliafrutosg@gmail.com', '0991181123', '', 'athalia frutos cv 2016-2.docx', 0, 1),
(57, 'Ruth Maria Cabañas Rojas', 'ruthmariacaba@hotmail.com', '0972424032', 'Espero puedan contar conmigo', 'Ruth Maria Cabanas Rojas- CV.docx', 0, 1),
(58, 'Jazmín Crespo Dos Santos', 'jazmincre@hotmail.com', '0981253783', 'Buenas! Estoy muy interesada en trabajar con ustedes.\r\nSaludos!', 'CV.pdf', 0, 1),
(59, 'Martina Beatriz Fernández Cabrera', 'martinafernandez198431@hotmail.com', '0983566940', 'Al contratarme tendrán a una persona responsable y comprometida con el trabajo. Tengo muchísimas ganas de formar parte de la empresa.', 'Curriculum Martina (1).doc', 0, 1),
(60, 'Bianca Beatriz Villlalba Medina', 'villalbabianca94@gmail.com', '0961 822 272', '', 'CV.docx', 0, 1),
(61, 'luis carlos bogarin silvero', 'jessica_mariela92@hotmail.com', '0991929621', '', 'CV _Luis Bogarin.docx', 0, 1),
(62, 'Fátima Romero', 'noemi_fa_123@hotmail.com', '0984287418', 'Buenas les envio mi curriculum ojala tenga la oportunidad de trabajar con ustedes gracias', 'FATIMAAAA.docx', 0, 1),
(63, 'Ana Belen Arzamendia', 'belenarzamendia94@gmail.com', '0981129168', '', 'CURRICULUM ANA ARZAMENDIA.docx', 0, 1),
(64, 'Mario Dejesus Diaz Vazquez', 'diazmario2596@gmail.com', '0982348657', 'Me gustaria pertenecer al plantel  de trabajadores me gusta los desafios , de crecer y avanzar..desde ya muchas gracias!', 'CURRICULUM VITAE(1).docx', 0, 1),
(65, 'Leandro Martín Báez Villalba', 'cabezademonitor92@gmail.com', '--------------', 'Muy buenos tardes!\r\nQuien escribe Leandro Báez un saludo cordial.\r\nMe he tomado la libertad y el atrevimiento de escribir mis intenciones para formar parte del plantel de la empresa adjunto mis datos personales y laborales para que tengan un mejor detallado del mismo; Me describo como una persona que no tiene problemas ni complicaciones en lo que me tenga que emplear.\r\nDesde ya, muy agradecido.', 'leandro martin baez (Autoguardado).doc', 0, 1),
(66, 'Daisy Isabel López Cardozo', 'snake7girl7rose7@gmail.com', 'Itauguá', '', 'CV Daisy.docx', 0, 1),
(67, 'Veeronica Cartaman Torres', 'cristianramirez702@gmail.com', '0985881327', 'me gustaria formar parte de la empresa', 'Veronica Cartaman.docx', 0, 1),
(68, 'veronica Cartaman Torres', 'cristianramirez702@gmail.com', '0985881327', 'me gustria formar parte de la empresa', 'Veronica Cartaman.docx', 0, 1),
(69, 'Marcos Antonio Gonzalez Garcia', 'avenegra_ms@hotmail.com', '0971775090', '', 'Marcos Garcia.doc', 0, 1),
(70, 'Nathalia Elizabeth Ortiz Larroza', 'ortizlarroza98@gmail.com', '0981836863', '', 'junio 2016.docx', 0, 1),
(71, 'Ana Victoria Alarcón Jimenéz', 'AnaVictoria_19@outlook.com', '0985190518', 'Adjunto mi curriculum por si necesiten personal con este perfil o para lo que necesiten.  Saludos!', 'Cv. Ana.doc', 0, 1),
(72, 'Edgar Palacio', 'edgarpalacio106@gmail.com', '0975337158', 'Quiero postular para el cargo de Administrador de una sucursal', 'CURRIC-2.pdf', 0, 1),
(73, 'MARIA JOSE GOMEz', 'itamgamarra@gmail.com', '0981521565', '', 'CV MARIA JOSE GOMEZ.docx', 0, 1),
(74, 'JOHANNA GIMENEZ', 'johiramos84@hotmail.com', '0994258875', 'BUENAS TARDES, ADJUNTO CURRICULUM VITAE.\r\nDESDE YA MUCHAS GRACIAS!', 'CURRICULUM VITAE.pdf', 0, 1),
(75, 'DIANA ELIZABETH NÚÑEZ BRITOS', 'diananunez855@gmail.com', '0982 155 159', 'Buenos días, \r\nSe adjunta CV para incluir en la base de datos para una posible oportunidad laboral.\r\nMuchas gracias desde ya.\r\nDiana Núñez', 'DOCUMENTO.pdf', 0, 1),
(76, 'Natalia Alfonso Mereles', 'natymereles@hotmail.com', '0983489559', 'Buenas tardes,  pongo a disposición mi currículum para vacancia futura.', 'CURRICULUM VITAE - Natalia Mereles (1).pdf', 0, 1),
(77, 'Adriana Graciela Sánchez Candia', 'adrusanz1996@gmail.com', '0971253406', '', 'Curriculum Vitae Adriana Sanchez-2 (1).docx', 0, 1),
(78, 'Gianinna Montserrat Aquino Zarate', 'montserrataquinoo1@gmail.com', '0982479392', 'Atc o cajero', 'montse cv.pdf', 0, 1),
(79, 'Andrea Felipa Manuel Riquelme', 'andymanuel92@hotmail.es', '0985 64051', 'Área de Informática - Administracion', 'Curriculum Vitae Andrea Manuel.pdf', 0, 1),
(80, 'María de la Paz Agüero Ramírez', 'agueropaci16@gmail.com', '0981122170', 'Buenas tardes, envio mi CV adjunto por si tengan vacancias disponibles. \r\nMuchas gracias.', 'Curriculum Vitae (PDF).pdf', 0, 1),
(81, 'Omar Mir', 'omi_mir@hotmail.com', '0972203028', 'Buenas tardes:\r\n\r\nAdjunto CV para vacancia disponible en su empresa e incorporacion inmediata.\r\n\r\nSaludos cordiales.\r\n\r\nOmar Mir', 'CV OMAR MIR 2016.pdf', 0, 1),
(82, 'Olga Noemi Samudio Barrios', 'olganoemi015@gmail.com', '0992499791', 'Tengo muchas ganas de trabajar, aprendo rápido, soy muy dedicada y responsable para lograr los objetivos, poniendo dedicanción para el buen desempeño de mis funciones, gracias. Para alguna vacancia como asistente administrativa, cajera, atencion al cliente, recepcionista.', 'CURRICULUM VITAE -  OLGA.docx', 0, 1),
(83, 'Belén Alexandra Gamarra Almada', 'Begamarra_98@hotmail.com', '0983751773', 'Buenas noches, remito mi curriculum vitae en búsqueda de una oportunidad para una primera experiencia laboral que me permita adquirir la mayor cantidad posible de conocimientos y experiencias especialmente en el área de recursos humanos o administrativa. Desde ya, muchas gracias.', 'CV Belen Gamarra (1).pdf', 0, 1),
(84, 'Selmar Iran Denis Pedretti', 'selmarpedretti98@gmail.com', '0982409534', 'Buenas, me gustaría formar parte de su equipo', 'cv.pdf', 0, 1),
(85, 'luis carlos bogarin silvero', 'jessica_mariela92@hotmail.com', '0991929621', 'quisiera trabajar de chofer', 'CV _Luis Bogarin.docx', 0, 1),
(86, 'Vivian Maria Centurion Villalba', 'viv.viv.centurion@gmail.com', '0973752209', 'Buenas tardes. Estoy en busca de un empleo y de haber una vacancia en su empresa me gustaría formar parte de ella. Espero me tengan en cuenta. Desde ya muchas gracias.', 'Curriculum.docx', 0, 1),
(87, 'Rumilda Cuquejo De Los Santos', 'rucucu_28@hotmail.com', '0984 584714', '', 'Documento sin titulo.pdf', 0, 1),
(88, 'Raúl Octavio Cañiza Avalos', 'oticanhiza@gmail.com', '0981387261', '', 'CURRICULUM VITAE - Raul Caniza (3).docx', 0, 1),
(89, 'Esteban Lezcano Yelsi', 'estebanlezcanoyelsi@gmail.com', '0991924459', 'Envío C.V. esperando a ser tenido en cuenta, para cualquier vacancia que hubiere lugar acorde a mi perfil.\r\nBuen resto de jornada.', 'CV ESTEBAN LEZCANO 2016.pdf', 0, 1),
(90, 'Ramon Horacio Valdez Rodriguez', 'trabajoparaguayll@gmail.com', '0961463050', 'Favor considerar CV. Disponibilidad de tiempo completo e incorporación inmediata.\r\nExperiencia en atención al cliente y excelente trato a los demás.\r\nSaludos!', 'Ramon Valdez Rodriguez CV 2016 1.doc', 0, 1),
(91, 'Mario Oscar Mereles Velázquez', 'mereles.okki.20@gmail.com', '0962300010', 'Desearía trabajar con ustedes y aportar mi granito de arena. Gracias.', 'CURRICULUM VITAE Mario Oscar Mereles 2.docx', 0, 1),
(92, 'Chirley Marisol de jesus Stumffs Duarte', 'chimistumffs@gmail.com', '0981113262', 'Me gustaria formar parte del equipo', 'Chirley Stumffs.docx', 0, 1),
(93, 'Ingrid Lorena Garrido Galeano', 'ingridgarrido.97@hotmail.com', '0971202458', 'Les hago llegar mis datos personales curriculum vitae  a fin de ser tenido en cuenta como candidatos un puesto vacante.Gracias!! Turno tarde', 'CURRICULUM  VITAE.2222.docx', 0, 1),
(94, 'César Alberto López rojas', 'lcesarlopez3@gmail.com', '0984133752', 'necesito el trabajo', 'Curriculum Vitae Cesar Lopez.docx', 0, 1),
(95, 'César lopez', 'lcesarlopez3@gmail.com', '0984133752', 'con experiencia en casa de empeños comprobable', 'Curriculum Vitae Cesar Lopez.docx', 0, 1),
(96, 'Maria Leticia Zavan Gonzalez', 'lechuzavan@hotmail.com', '226775', 'Adjunto curriculum vitae para cargos de asistente, auxiliar, o similar de cualquier área de oficina', 'CURRICULUM  Leticia Zavan.pdf', 0, 1),
(97, 'Marian lucia verá leguizamon', 'Veramarian19@gmail.com', '0962173978', '', 'Curriculum Marian Vera 2.docx', 0, 1),
(98, 'Maria Belen Bressi Pintos', 'mbb.bressi@hotmailcom', '0972100973', '', 'Maria Belen Bressi Pintos.docx', 0, 1),
(99, 'Sandra Gomez', 'sandra_gomez20@hotmail.com', '0971980274', 'Les mando m cv', 'CURRICULUM VITAE_Sandra Gomez.doc', 0, 1),
(100, 'Maribel Cabrera Sanabria', 'malucabrera19@hotmail.com', '0981804226', 'Disponibilidad Inmediata!! Cualquier consulta a las ordenes.', 'Curriculum Vitae MARIBEL.pdf', 0, 1),
(101, 'patricia isabel portillo cabrera', 'portillopaty18@gmail.com', '0984817788', 'me gustaria trabajar en esta empresa, me gusta adquirir nuevos conocimientos siempre', 'CURRICULUM_VITAE_PATY1.docx', 0, 1),
(102, 'Viviana Raquel Ortigoza', 'decardozo87@gmail.com', '0994208959', 'Buenas \r\nQUISIERA FORMAR PARTE DE ARGOR NO TENGO EXPERIENCIA PERO APRENDO RÁPIDO\r\n\r\nATTE', 'vivianna.pdf', 0, 1),
(103, 'Ricardo Ruben Alvarez', 'ricky_23.ricky@hotmail.com', '0984403409', 'Buenos dias estoy enviando mi CV por la oferta de trabajo', 'curriculum.docx', 0, 1),
(104, 'Ana Estrella Cino Rotela', 'estrellitarotela@gmail.com', '0984301236', 'Buenas adjunto mi curriculum buscando una oportunidad de formar parte de su gran empresa. Desde ya mucha gracias.', 'CURRICULUM ACTUAL-ANITA.doc', 0, 1),
(105, 'Maria Liz Villalba Alvarez', 'marializvillalbaalvarez@gmail.com', '0972695298', '', 'CURRICULUM VITAE LIZ (Autualizado).docx', 0, 1),
(106, 'Montserrat Aquino', 'montserrataquinoo1@gmail.com', '0982479392', '', 'CURRICULUM MONTSERRAT.odt', 0, 1),
(107, 'Montserrat Aquino', 'montserrataquinoo1@gmail.com', '0982479392', '', 'Cv Montserrat.docx', 0, 1),
(108, 'Libia Yohana Denis Cantero', 'libiadenisca@hotmail.com', '0971917429', 'Buenas tardes \r\nAdjunto mi curriculum vitae\r\nLibia Denis Cantero', 'Curriculum Vitae de Libia Denis Cantero. - sf.docx', 0, 1),
(109, 'José David Rolón BOgado', 'jorolon95@gmail.com', '0972622623', 'Me gustaría formar parte del equipo\r\n\r\nDesde ya, muchas gracias.\r\nJosé Rolón.', 'Cv - Jose Rolon.pdf', 0, 1),
(110, 'Ricardo Jesús Paredes Prats', 'ricardoparedesprats@gmail.com', '0983 790351', 'Soy una persona honesta, proactiva, que siempre busca auto superarse.\r\n\r\nMe gustaría trabajar con ustedes ya que son una de las mejores empresas en su mercado.\r\n\r\nGracias por su tiempo.', 'CURRICULUM VITAE de Ricardo Paredes Prats.pdf', 0, 1),
(111, 'Ricardo Jesús Paredes Prats', 'ricardoparedesprats@gmail.com', '0983 790351', 'Soy una persona honesta, proactiva, que siempre busca auto superarse.\r\n\r\nMe gustaría trabajar con ustedes ya que son una de las mejores empresas en su mercado.\r\n\r\nGracias por su tiempo.', 'CURRICULUM VITAE de Ricardo Paredes Prats.pdf', 0, 1),
(112, 'Carmin Ana María Vega Araujo', 'carminaraujo96@gmail.com', '0991417415', 'Aux. Administrativo', 'Curriculum CARMINVEGA.pdf', 0, 1),
(113, 'Carlos Gilberto Ferreira Valenzuela', 'andreachavez62@hotmail.com', '0981999518', '', 'CURRICULUM VITAE.pdf', 0, 1),
(114, 'Richard Bernardo Arguelles Franco', 'cinthialombardo91@hotmail.com', '0985852521', 'Hola me encantaría trabajar con la empresa de argor empeños siempre quize trabajar con ustedes espero que me tomen en cuenta no se van a arrepentir desde ya muchas gracias!!', 'Richard Arguello.docx', 0, 1),
(115, 'Rodrigo González', 'rodri_emanuel09@hotmail.com', '0982229460', 'Soy estudiante de la carrera de Ing. Comercial del segundo año, me gustaria formar parte de su equipo laboral poseo un promedio de 3,7 en la universidad', 'Curriculum Vitae - Rodrigo Gonzalez.pdf', 0, 1),
(116, 'Maria Liz Villalba Alvarez', 'marializvillalbaalvarez@gmail.com', '0972695298', 'Buenas Tardes Argor Empeños.\r\nEstoy adjuntando mi CV por si tienen alguna vacancia en su empresa ya que me gustaria poder trabajar con ustedes ya que se que es una empresa seria y prestigiosa.', 'CURRICULUM VITAE LIZ (Autualizado).docx', 0, 1),
(117, 'Christian Eduardo Adorno Alfonzo', 'adorch10@gmail.com', '0961506766', 'Estimados Sres. RRHH:\r\n\r\nLes envío adjunto mi CV a fin de que pueda ser considerado dentro del proceso de selección que llevan a cabo, creo disponer de las cualidades necesarias que estan buscando. \r\n\r\nPara más detalles acerca de mis experiencias y hoja de vida quedo atento a contactos.\r\n\r\nSlds. cordiales;', 'CV CH. ADORNO.pdf', 0, 1),
(118, 'Denis Fabian Colman Casco', 'deniscolmaan@hotmail.com', '0985713651', 'Adjunto mi C.V', 'CURRICULUM VITAE denis colman.docx', 0, 1),
(119, 'Daisy Michella Cerdán Rios', 'mcerdan95@outlook.com', '0975911534', 'Me gustaría formar parte de esta empresa.', 'curriculum Daimiche.pdf', 0, 1),
(120, 'Evelin Raquel Muñoz Fretes', 'evelinfretes@gmail.com', '0986823702', 'Buenos días, adjunto a este mensaje les envio mi curriculum vitae, espero que sea de su agrado.\r\n\r\nDesde ya, muchas gracias.\r\n\r\nEvelin Muñoz', 'Curriculum Vitae.docx', 0, 1),
(121, 'Victor Diosnel Villagra Oviedo', 'victor_oviedo66@outlook.es', '0992226359', 'Me gustaría trabajar con/para ustedes en el área de atención al cliente, por que me gusta la empresa.\r\nEspero que me tomen en cuenta desde ya muchas grscias.', 'Curriculum VITAE.docx', 0, 1),
(122, 'Saulo Escobar Mora', 'escobarmorasaulo@gmail.com', '0984582535', 'Tengo mucho interes en formar parte de su selecto plantel cuento con experiencia en manejo de stock inventarios manejo de sistemas', 'CURRICULUM VITAE salo.docx', 0, 1),
(123, 'Saulo Escobar Mora', 'escobarmorasaulo@gmail.com', '0984582535', 'Tengo mucho interes en formar parte de su selecto plantel cuento con experiencia en manejo de stock inventarios manejo de sistemas', 'CURRICULUM VITAE salo.docx', 0, 1),
(124, 'Sany Baez Barreto', 'sanybaez@hotmail.com', '0983343355', 'Buenas.. estoy culmimando mis estudios universitarios de administración de empresas en la UNA y me encuentro buscando una oportunidad para desarrollarme como profesional y adquirir una mayor experiencia. Tengo mucha experiencia en atención al cliente y todo la predisposición de aprender. Por favor solo necesito una oportunidad para demostrar las ganas que tengo. Gracias', 'CVsanybaez.docx', 0, 1),
(125, 'Hector Damian Sosa Silvero', 'damiansilvero0497@gmail.com', '0972133007', 'favor en caso de vacancia considerar', 'CV - copia.pdf', 0, 1),
(126, 'Sergio Emmanuel Arce Pereira', 'arcesergio2002@hotmail.com', '0994881550', 'Disponibilidad inmediata', 'ARCE-2.odt', 0, 1),
(127, 'Sergio Alvarenga', 'alvarengasergioosvaldo@gmail.com', '0991733665', 'Adjunto C.V.\r\nSaludos', 'CV Sergio 2017.pdf', 0, 1),
(128, 'Mirna Elizabeth', 'mear84@hotmail.com', '0984253352', 'Me interesa el trabajo tengo experiencia en ventas..', 'Curriculum Vitae mirna.docx', 0, 1),
(129, 'Richard Alejandro Ledesma Ortiz', 'richardaleortiz@hotmail.com', '0971319481', 'Disponibilidad inmediata\r\nExperiencia laboral: Cervepar S.A', 'CURRICULUM VITAE - RICHARD ALEJANDRO LEDESMA-.pdf', 0, 1),
(130, 'Raul Ramirez', 'raul.chuky@gmail.com', '0976921801', 'ESTO ES UNA PRUEBA DE ENVIO DE CV', 'puebaPDF.pdf', 0, 1),
(131, 'Maria Gisselle Britez Villalba', 'giselbritez1234@gmail.com', '0983676609', '', 'CV Maria Gisselle.docx', 0, 1),
(132, 'María Isabel Báez Ruíz', 'isabelbaez721@gmail.com', '0981348333', 'Me gustaría poder crecer más en el ambiente laboral, ante cualquier cosa estoy a las órdenes.', 'CV Isa Baez (1).doc.pdf', 0, 1),
(133, 'Vanesa Elizabeth Jara López', 'vanesaelizabeth.jara@gmail.com', '0984552440', 'ME gustaria trabajar con ustedes ya que son una empresa seria. Que dan oportunidad a las personas para sobresalir.', 'CV Vane.docx', 0, 1),
(134, 'Andrea Felipa Manuel Riquelme', 'andymanuel92@hotmail.es', '0985641051', 'Me encantaria ser parte de la empresa para demostrar mis capacidades profesionales y laborales', 'Curriculum Vitae Andrea Manuel.docx', 0, 1),
(135, 'Karen Bernal', 'karenbernal021@gmail.com', '0992847685', 'Buenas..vi una publicación en facebook cualquier cosa a las ordenes !!', 'Curriculum-Vita-Karen-Bernal.docx', 0, 1),
(136, 'Diana Belén Machuca Salazar', 'salazardidi@hotmail.com', '0991860012', '', 'Diana Machuca CV.docx', 0, 1),
(137, 'Luz Maria Irigoyen Cristaldo', 'iriluz91@gmail.com', '0983257703', 'Buenas.. Vi su anuncio en su página del facebook.. Estoy buscando trabajo!  \r\nEstoy disponible para cualquier tipo de labor que necesiten!  Espero me tengan en cuenta! \r\nGracias', 'CURRICULUM VITAE.pdf', 0, 1),
(138, 'Rodrigo Moisés Marin Ruiz Diaz', 'marinrodrigo75@gmail.com', '0983414807', '', 'CURRI RODY.pdf', 0, 1),
(139, 'Rocio Del Mar', 'rocio_dlmar13@hotmail.com', '0972672148', 'Tengo todo el tiempo disponible y necesito trabajar quiero estudiar  me gustaría muchistmo formar parte de ustedes ', 'RO.doc', 0, 1),
(140, 'Ana María Isabel Sosa Vera', 'anamariasosa9@gmail.com', '0971130435', '', 'curri.docx', 0, 1),
(141, 'Rubén Nicolás Cabrera Sánchez', 'rubenico018@hotmail.com', '+595991605168', 'Buenos días.\r\n\r\nAdjunto currículum Vitae, espero que llene sus expectativas al cargo que están buscando. \r\nSin otro motivo, me despido.\r\n\r\nSaludos \r\n\r\nRuben Cabrera ', 'CVRubenCabrera 2017.docx', 0, 1),
(142, 'Nelcy Pamela Fernández Cardozo', 'nelpamfercar@gmail.com', '0971630808', 'Quiero ser parte', 'CURRICULUM VITAE - copia.docx', 0, 1),
(143, 'MARIA BELEN CARMONA CUEVAS', 'lilianeliza1276@hotmail.com', '0984348976', 'Buenas tardes..! por este medio les envió mi curriculum porque estoy interesada en el puesto de trabajo..\r\nGracias.!', 'CURRICULUM BELEN.docx', 0, 1),
(144, 'MARIA BELEN CARMONA CUEVAS', 'lilianeliza1276@hotmail.com', '0984348976', 'Buenas tardes.!! estoy interesada en el puesto de trabajo. \r\nGracias.!', 'CURRICULUM BELEN.docx', 0, 1),
(145, 'María del Carmen Gaona Santacruz', 'mdelcgs95@hotmail.com', '0986825318', '', 'CURRICULUM_VITAE_MARIA_DELCARMENGAONa_S.docx', 0, 1),
(146, 'Matías de Jesús', 'matipani1996@gmail.com', '0971875531', 'Quisiera oportunidad laborar', 'CURRICULUM.docx', 0, 1),
(147, 'Valeria rossana lecoski martinez', 'titilecoski@hotmail.com', '0985151224', 'Dejó mi curriculum por si tienen alguna vacancia laboral desde ya gracias!!', 'CURRICULUM VALERIA LECOSKI mm.docx', 0, 1),
(148, 'Ruth Maura Candia González', 'mauracandia44@gmail.com', '0982323157', 'Adjunto mi curriculum para cualquier vacancia, me encantaría formar parte de ese empresa!\r\n Mucha gracias Saludos!', 'Curriculum maura.docx', 0, 1),
(149, 'David Manuel Medina Franco', 'dmedina.franco@gmail.com', '0971783228', 'Buen día.- \r\nTengo mucha experiencia en ATC y manejo muy bien office. Espero tener una oportunidad.', 'CV David Medina 2017.docx', 0, 1),
(150, 'gabriela Anahi Caballero', 'v.b.cp@hotmail.com', '0991815715', 'buenas noches.. me gustaría formar parte de su empresa.. saludos', 'curri gabrie.docx', 0, 1),
(151, 'Dayana Raquel Tomassi', 'tomassidayana@gmail.com', '0986212744', 'Necesito trabajar', 'dayana tomassi.docx', 0, 1),
(152, 'Liz Mabel Villasanti Núñez', 'lizvillasanti2@gmail.com', '+595984151027', 'Buenas tardes,\r\nConforme al pedido de la organización  aquí les dejo mi Currículum Vitae. Estamos a la orden.\r\nSaludos Cordiales\r\n…………………………..................\r\nLiz Mabel Villasanti Núñez', 'CURRICULUM VITAE.docx', 0, 1),
(153, 'Ricardo Arcat Fazio', 'ricardoarcat19@gmail.com', '0972191933', 'Tengo experiencia en manejo y custodia de valores y en operaciones bancarias en general', 'Curriculum Vitae ric 2.1.pdf', 0, 1),
(154, 'Marcos David Jara Santacruz', 'marcos.jara.s@gmail.com', '0961972579', 'Adjunto mi CV para algún puesto que este en vacancias. desde ya muchas Gracias!', 'CV Marcos Jara.docx', 0, 1),
(155, 'Saul Torres Espinola', 'saultorres1991@hotmail.com', '0961425997', 'Les dejo mi curriculum vitae por si haya vacancia en algun puesto de trabajo soy una persona honesta con ganas de trabajar', 'CURRICULUM DE SAUL.docx', 0, 1),
(156, 'osmar roa', 'gabimarcos32@gmail.com', '0983882163', 'buenos días me dirijo a usted con intenciones de trabajar en la empresa, le adjunto mi cv, en caso de vacancia estaré esperando su llamada o sms, gracias', 'CURRICULUM.doc', 0, 1),
(157, 'Alejandro Nicolás Zárate Pasmor', 'alezaratepasmor@gmail.com', '0971561235', 'Hola.\r\nMe gustaría trabar en Argor', 'curriculum.pdf', 0, 1),
(158, 'Sany Baez Barreto', 'sanybaez94@gmail.com', '0983343355', 'Buenas.. le remito mi cv para solicitar una oportunidad laboral.\r\nEstoy estudiando administración de empresas en la universidad nacional de asunción, me encuentro en la busqueda de adquirir experiencia y desarrollo profesional.\r\nCuento con bastante experiencia en el área de atención y recepción de clientes tambien conocimientos básicos en la parte de caja.\r\nNo tengo experiencia administrativa pero si tengo muchísimas ganas de trabajar, por sobre todo me sobra la predisposición de aprender y con ayuda de ustedes insertarme en mi ámbito de estudio para mi futuro.\r\nSolo necesito una oportunidad para demostrarlo por favor\r\nGracias', 'CVsanybaez.docx', 0, 1),
(159, 'Norma Beatriz Enciso Echeverría', 'echeverrianorma6@gmail.com', '0971391835', 'Buenas Noches;\r\n\r\nVista la Oferta Laboral les hago llegar mis datos personales y profesionales en Currículum Vitae a fin de ser tenido en cuenta como candidata.\r\n\r\nCon la convicción de poseer el perfil requerido para un muy buen desempeño en el cargo a cubrir, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente.\r\n\r\nEsperando una respuesta positiva lo saluda atentamente,\r\n\r\nNorma Beatriz Enciso Echeverría', 'Documento.docx', 0, 1),
(160, 'MARTIN ALEXIS ORTIZ MONGELOS', 'MARTINORTIZ9621@GMAIL.COM', '418-8000', 'Estoy necesitando trabajo en horario nocturno, por si tengan vacancia.', 'Curriculum Vitae.docx MO.docx', 0, 1),
(161, 'CELSA DELFINA ZAVÁN VILLALBA', 'baby_clszvn@hotmail.com', '0994389085', 'Me pongo en contacto con ustedes para ofrecerle mi currículum con mis datos personales, profesionales y otros datos de interés, por si necesita cubrir, ahora o en un futuro próximo, algún puesto en el área contable o administrativa.\r\nMi candidatura le puede resultar de interés porque soy una persona pro-activa y me desenvuelvo como pez en el agua cuando de trabajar bajo presión se habla, es decir, soy la candidata apropiada. Como puede observar en el historial adjunto, ya he trabajado profesionalmente como auxiliar administrativa y contable. Estoy dispuesta a seguir aprendiendo y puedo aportar nuevas ideas y frescura a la empresa.\r\n\r\nPueden ustedes ponerse en contacto conmigo mediante mi móvil 0994389085. Espero recibir pronto noticias suyas sobre mi candidatura y sobre las posibilidades de trabajar con usted, mediante una entrevista personal.\r\n\r\nEstoy a su entera disposición, esperando sus noticias.\r\n\r\nUn cordial saludo.\r\n\r\nCelsa Zaván', 'Celsa Zavan_Curriculum Vitae.pdf', 0, 1),
(162, 'Diana Belén Machuca Salazar', 'salazardidi@hotmail.com', '0991860012', '', 'Diana Machuca CV.pdf', 0, 1),
(163, 'Nils Stritzel', 'nils.stritzel@gmx.net', '0984867414', 'A quién corresponda:\r\n\r\nMe gusta trabajar y desarrollar con tecnología y también ayudar, entrenar y educar a otros. Mi experiencia profesional demuestra mi capacidad para trabajar tanto solo como en equipo, tomar decisiones y aceptar responsabilidades. Me considero una persona analítica, trabajadora y con gran voluntad para aprender, por eso en combinación con mi formación en el área de informatica así como mi experiencia adquirida en varios puestos como programador considero que podría encajar en su empresa.\r\n\r\nMe gustaría tener la oportunidad de conversar con usted en una entrevista para comentarle mis conocimientos y experiencia.\r\n\r\nEsperando que estudie mi candidatura y en espera de prontas noticias, le saluda atentamente,\r\n\r\nNils Stritzel', 'Curriculum Vitae + referencias.pdf', 0, 1),
(164, 'Patricia Armoa', 'patriarmoa@gmail.com', '0983115200', 'Poseo experiencia en equipos de trabajo principalmente dentro una organización voluntaria en la cual además he obtenido una visión sobre la RSC. Mi logro académico fue reconocido de manera sobresaliente con la defensa de mi tesis y todo ese conocimiento y experiencia está a disposición de la empresa para aportar a la consecución de los objetivos corporativos.\r\nEstoy segura que mi perfil será de utilidad para su empresa.', 'CV Patricia Armoa.pdf', 0, 1),
(165, 'Liz Paredes', 'isabella.lizania2015@gmail.com', '0994844912', 'Buenas Tardes, adjunto mis datos para futuras contrataciones en la empresa.\r\nGracias.-', 'curriculum liz paredes 2015.docx', 0, 1),
(166, 'Juana Guadalupe Núñez Galeano', 'guadalupenunezgaleano@gmail.com', '0982357815', 'Buenas adjunto currículum Vitae\r\n\r\n\r\nSaludos cordiales \r\nJuana Nuñez', 'C.V Nunez.docx', 0, 1),
(167, 'Julio Benitez', 'eduardobenz87@hotmail.com', '0994560986', 'Buenas tardes, cuento con mucha experiencia en atención al cliente y también en caja. Adjunto mi curriculum\r\nUn cordial saludo.', 'CV EDUARDO 2017.pdf', 0, 1),
(168, 'Diego Ramón', 'diegodieman@gmail.com', '0961 745 033', 'Buenas tardes.. adjunto mi curriculum para alguna vacante disponible..\r\nsaludos!', 'Curriculum Vitae Diego T..docx', 0, 1),
(169, 'Valeria Airaldi Wood', 'valeairaldi@gmail.com', '0981948789', 'Buenos días,\r\nA quien corresponda:\r\nQuisiera remitirle mi currículum vitae para lo que hubiere lugar.\r\nEstudiante de Marketing y Publicidad. Con experiencia en áreas administrativas y ventas.\r\nManejo del idioma inglés.\r\n\r\nDesde ya muchas gracias por la atención.\r\n\r\nMe despido cordialmente,\r\nValeria Airaldi Wood', 'CV Valeria Airaldi Wood.pdf', 0, 1),
(170, 'Ana Gutierrez', 'gabigu466@gmail.com', '0983757640', 'Adjunto CV para cualquier puesto vacante existente. Desde ya muchas gracias!', 'C.V. actual 2017.doc', 0, 1),
(171, 'Ruth Recalde', 'ruth030492@gmail.com', '0971613778', '', 'CV-RECALDE.pdf', 0, 1),
(172, 'Ana Victoria Alarcòn Jimènez', 'AnaVictoria_19@outlook.es', '0985190518', 'Adjunto mi curriculum vitae para cualquier vacancia acorde a mi perfil.\r\nMe despido cordialmente.\r\nMuchas Gracias.', 'Cv Ana.doc', 0, 1),
(173, 'CESAR EDUARDO GOMEZ MEZA', 'cesarcepunk@gmail.com', '0991994564', 'Me gustaria trabajar para su empresa y demostrar mis capacidades. Espero me tomen en cuenta. Gracias', 'CURRICULUM VITAE cg 16 ft con licencia.doc', 0, 1),
(174, 'Emilia Ramoa Martinez', 'emiramoa1975@gmail.com', '0971163671', 'Le saludo cordialmente y adjunto mi curriculum. Para cualquier vacancia en donde les pueda serles util a la empresa.\r\nAtte.', 'Emilia Ramoa 2017.pdf', 0, 1),
(175, 'Higinio Riveros Viveros', 'higinioriveros79@hotmail.com', '0981305703', 'Tengo ganas de trabajar y demostrar mi eficiencia profesional.', 'CV_HiginioRiveros_2017.pdf', 0, 1),
(176, 'Higinio Riveros Viveros', 'higinioriveros79@hotmail.com', '0981305703', 'Tengo ganas de trabajar y demostrar mi eficiencia profesional.', 'CV_HiginioRiveros_2017.pdf', 0, 1),
(177, 'hernan dario', 'hernan_riquelme@hotmail.es', '0994833629', '', 'curriculum vitae-Hernan Riquelme (1).docx', 0, 1),
(178, 'Santiago Rodriguez Baez', 'santirodri7.srg@gmail.com', '0961192471', '', 'CURRICULUM VITAE SANTI.docx', 0, 1),
(179, '', 'Derlys Arevalos Libardi', '0985217030', 'Les envío mis documentos porque deseo formar parte de esta gran empresa.', 'CURRICULUM VITAE.docx', 0, 1),
(180, 'Derlys Arevalos Libardi', 'libardiderlys@gmail.com', '0985217030', 'Les envío mis datos porque deseo formar parte de esta gran empresa.', 'CURRICULUM VITAE.docx', 0, 1),
(181, 'Virginia Aranda', 'virginiaranda.va@gmail.com', '0994608274', 'Buenos días\r\nMe encantaría formar parte del plantel\r\nSoy licenciada en Administracion de empresas\r\nEspero que mi perfil pueda ser adaptado a la vacancia que pudieran necesitar más adelante', 'Virginia Aranda - Hoja de V..pdf', 0, 1),
(182, 'Chofer de camion de gran porte', 'gfeliciano691@gmail.com', '0982271343', 'Buenos dias me gustaria trabajar con ustedes', 'curriculum vitae 2.docx', 0, 1),
(183, 'Regina Flores Montiel', 'reginaflormon86@gmail.com', '0986211626', 'Me gustaria ser parte la empresa trabajar y salir adelante.', 'CV regina flores', 0, 1),
(184, 'Regina Flores Montiel', 'reginaflormon86@gmail.com', '0986211626', 'Me gustaria ser parte la empresa trabajar y salir adelante.', 'CV regina flores', 0, 1),
(185, 'Jessica Gabriela insfran delvalle', 'jessiinsfran654@gmail.com', '0985367453', '', 'curriculum vitae jessi.docx', 0, 1),
(186, 'Tatiana Janet Peralta Jara', 'tatianaperalta98@gmail.com', '0971932762', 'Buenos días, mi nombre es Tatiana Peralta, tengo 19 años y soy estudiante de la carrera de Ingeniería Comercial. Poseo experiencia de 10 meses en atendimiento a clientes con un amplio desenvolvimiento en el área y un excelente desempeño en ello.\r\nActualmente poseo gran disponibilidad de tiempo y me gustaría postularme para algún vacante. Poseo muchas ganas de aprender, para asi poder aportar a la empresa.\r\nDesde ya, le agradezco su tiempo y su atención.\r\nTatiana J. Peralta', 'Tatiana Janet - CV', 0, 1),
(187, 'Tatiana Janet Peralta Jara', 'tatianaperalta98@gmail.com', '0971932762', 'Buenos días, mi nombre es Tatiana Peralta, tengo 19 años y soy estudiante de la carrera de Ingeniería Comercial. Poseo experiencia de 10 meses en atendimiento a clientes con un amplio desenvolvimiento en el área y un excelente desempeño en ello.\r\nActualmente poseo gran disponibilidad de tiempo y me gustaría postularme para algún vacante. Poseo muchas ganas de aprender, para asi poder aportar a la empresa.\r\nDesde ya, le agradezco su tiempo y su atención.\r\nTatiana J. Peralta', 'Tatiana Janet Peralta Jara.pdf', 0, 1),
(188, 'Luis Carlos Caballero Rivas', 'luichicaballero92@gmail.com', '0985149595', 'Me gustaria formar partebde su equipo de trabajo, me considero una persona preparada y pre dispuesta a colaborar siempre para el logro de los objetivos.', 'Curriculum Vitae Luis Caballero.pdf', 0, 1),
(189, 'maria susana urbieta ramirez', 'urbietasusana@gmail.com', '541168323016', 'estimados, adjunto cv para us consideración laboral.\r\ndesde ya muchas gracias,\r\nsaludos.', 'cv_Maria_Susana_Urbieta_Ramrez (5).pdf', 0, 1),
(190, 'Cristhian Andrés Rodrigo Reyes Delvalle', 'cristhianreyesgh1s@gmail.com', '0972907375', 'Me encantaría formar parte del equipo, estoy dispuesto a aprender y crecer.', 'Curriculum Cristhian Reyes.docx', 0, 1),
(191, 'Jose zorrilla', 'juanzorrillaalcaraz@gmail.com.py', '0982638643', '', 'CURRICULUM VITAE.docx', 0, 1),
(192, 'Ricardo Ariel Jordán González', 'arieljord@hotmail.es', '0971234605', 'Con muchas ganas de formar parte de está empresa, y trabajar con el plantel de trabajadores.', 'CURICULUM VITAE.docx', 0, 1),
(193, 'RICHARD DAVID GALEANO PORTILLO', 'richgal200@gmail.com', '0981 109688', 'Buenas. En adjunto envio mi curriculum vitae para algun puesto vacante que requiera la empresa.  \r\nAtte.', 'curriculum vitae richard (2).doc', 0, 1),
(194, 'Nancy Lorena Zaracho Caballero', 'lolena1414@gmail.com', '0982938574', 'Buenas tardes\r\nEstoy sin trabajo tengo dos hijos madre soltera me gustaría pertenecer a su empresa.', 'Curriculumm.docx', 0, 1),
(195, 'Gisela Jazmín Vázquez Rojas', 'Giselavazquez99@gmail.com', '0982575404', 'No estoy trabajando actualmente... sigo la carrera de Ingeniería Comercial turno noche', 'CV Gisela Vazquez.docx', 0, 1),
(196, 'Gisela Jazmín Vázquez Rojas', 'Giselavazquez99@gmail.com', '0982575404', 'No estoy trabajando actualmente, estoy en busca del primer empleo\r\nSigo la carrera de Ingeniería Comercial turno noche', 'CV Gisela Vazquez.docx', 0, 1),
(197, 'Karen Belén Chávez Ojeda', 'karen_belu95@hotmail.com', '0972102380', 'Buenas tardes. \r\nEstoy buscando oportunidades laborales, adjunto envío mi C.V. \r\nSaludos Cordiales. \r\nKaren Chávez.', 'Curriculum Vitae Karen Chavez.docx', 0, 1),
(198, 'Elizabeth Rodas Peña', 'Jenniferrodas07@gmail.com', '0972435542', '', 'Curriculum Vitae eli rodas.docx', 0, 1),
(199, 'Letizia Magali Cristaldo Fernandez', 'letizia782011@hotmail.com', '0983412383', 'El motivo es presentarme y solicitarle una oportunidad de trabajo por este medio le envió mi curriculum vitae para que sea tomado en cuenta en sus vacantes disponibles. Me considero una persona muy trabajadora y dispuesta a aceptar desafíos.\r\nMi aspiración y deseo mas grande es poder desarrollarme en una empresa de calidad como la suya, donde pueda crecer profesionalmente.\r\nQuedo a su consideración gracias por su atención', 'CURRICULUM VITAE lethy.pdf', 0, 1),
(200, 'Vanina Fiorela Rodas Gòmez', 'vaninarodas@gmail.com', '0972458520', 'Mi nombre es Vanina Fiorela Rodas Gòmez. En la actualidad me encuentro activo laboral-mente y estoy buscando nuevas oportunidades de desarrollo en nuevas empresas.\r\nQuedo a entera disposición para hacerle llegar, sea una entrevista personal o por el medio que se me indique.\r\nEsperando una respuesta positiva me despido atentamente.', 'Curriculum Vanina.docx', 0, 1),
(201, 'Juan Rafael Martínez Villasanti', 'elrafa11@gmail.com', '0971 131 889', 'Les hago llegar mis datos personales y profesionales en Currículum Vitae a fin de ser tenido en cuenta como candidato ante posibles selecciones. \r\nCon la convicción de poseer el perfil requerido para un muy buen desempeño en el cargo a cubrir, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente. \r\nEsperando una respuesta positiva lo saluda atentamente,\r\n\r\n\r\nRafael Martínez Villasanti', 'Curriculum_Vitae_Rafael_Martinez.pdf', 0, 1),
(202, 'Alberto Osmar Ruiz Diaz', 'ruizdiazosmar@hotmail.com', '0981430517', 'Buenas tardes,\r\nMe es grato adjuntar mi Curriculum Vitae, a fin de conocer más mis actitudes y experiencias.\r\nSaludos cordiales \r\nOsmar Ruiz Diaz', 'CV Osmar3.pdf', 0, 1),
(203, 'Alejandro Gomez', 'Alejandrogmz48@gmail.com', '0971204677', 'buenas tardes Envio mi cv para postulaciones que pueda tener, tengo conocimientos en call center de 6 años, supervision de call center 1 año y medio y de telecobranzas 1 año estuve como analista senior por 3 años de experiencia y de cartera de analisis morosa, en la telefonia personal (Nucleo S.A) y conocimientos de SAP y facturacion referencias con la sra Guadalupe Pineda 0971735002\r\nAlejandro Gomez\r\n0971204677', 'curriculum Alejandro Gomez actualizad.docx', 0, 1),
(204, 'Vanina Fiorela Rodas Gòmez', 'vaninarodas@gmail.com', '0972458520', 'Mi nombre es Vanina Fiorela Rodas Gòmez. En la actualidad me encuentro activo laboral-mente y estoy buscando nuevas oportunidades de desarrollo en nuevas empresas.\r\nQuedo a entera disposición para hacerle llegar, sea una entrevista personal o por el medio que se me indique.\r\nEsperando una respuesta positiva me despido atentamente.', 'Curriculum Vanina.docx', 0, 1),
(205, 'òscar gabriel chamorro', 'gabrielux29@hotmail.com', '0986472938', 'quiero trabajar', 'CURRICULUM VITAE.docx', 0, 1),
(206, 'Diana Toñanez', 'dianatonanez25@hotmail.com', '0986295797', 'Buenas \r\nEnvio adjunto de mi curriculum vitae', 'Diana Tonanez 2.docx', 0, 1),
(207, 'Karen godoy', 'karogo07@hotmail.com', '0981740242', 'Buenas tardes  envio en adjunto curriculum vitae', 'Curriculum.pdf.pdf', 0, 1),
(208, 'Karen godoy', 'karogo07@hotmail.com', '0981740242', 'Buenas tardes  envio en adjunto curriculum vitae', 'Curriculum.pdf.pdf', 0, 1);
INSERT INTO `cv` (`id`, `nombre`, `email`, `telefono`, `mensaje`, `archivo`, `leido`, `oculto`) VALUES
(209, 'Juan Gabriel Alderete Coronel', 'alderetejuan614@gmail.com', '0982157444', 'LE REMITO MI HOJA DE CURRICULUM VITAE PARA LO QUE SEA NECESARIO..', 'GABRIEL.docx', 0, 1),
(210, 'Claudia Paniagua Servin', 'claupani90@gmail.com.py', '0981735066', 'Envío Currículum Vitae para cargo vacante', 'Currriculum Lic. Claudia Paniagua(1).pdf', 0, 1),
(211, 'Ingrid dahiyana irala carmagnola', 'dahiyana912@gmail.com', '0961403214 o 0994718112', 'Ojala tenga la oportunidad de trabajar con ustedes', 'Ingrid Dahiyana (6)(2).doc', 0, 1),
(212, 'Alcidio Adan Lugo Ojeda', 'lugoa249@gmail.com', '0972560247', 'Buebas pperdón por la molestia. Les envio mis datos a ser tenidos en cuenta  ,para algún puesto.  Tengo 18 años y me gustaría ya trabajar y así tambien poder estudiar, desde ya gracias por \r\nLa atención  y espero alguna respuesta', 'curriculum (adan ).docx', 0, 1),
(213, 'Eusebia Mabel Benitez Gonzalez', 'mabyb11@hotmail.com', '0992685960', '', 'cv.docx', 0, 1),
(214, 'Joel Eduardo Gomez Moreno', 'joelgomez451@gmail.com', '0971628824', '', 'El mejor CV.docx', 0, 1),
(215, 'Diana Amalia Meza Aranda', 'leidi.amalia@gmail.com', '0981300230', '', 'HOJAdeVIDA (1).pdf', 0, 1),
(216, 'Anaida Angelina Aguilera de Benitez', 'anaidaaguilera@gmail.com', '0981148294', 'Para vacancia disponible.', 'Curriculum Vitae foto antecedente.docx', 0, 1),
(217, 'Katherine Servin', 'kathysebs2565@hotmail.com', '0971575919', 'en busca de una oportunidad laboral', 'CURRICULUM VITAE KATHERINE SERVIN.docx', 0, 1),
(218, 'Camila Belén Centurión Franco', 'centurionkaren2@gmail.com', '0985385922', 'Buenas \r\nAdjunto cv para las vacancias disponibles.\r\nEn caso de creer conveniente no tendría problemas en concretar una entrevista.\r\nA las órdenes.', 'Curriculum Vitae camila centurion.pdf', 0, 1),
(219, 'Johanna Andrea Grigolo', 'joha17grigolo@hotmail.com', '0991982214 - 0981774209', 'Buenas tardes\r\n   Adjunto C.V para vacantes.\r\nSaludos Cordiales\r\nATTE. \r\n    Johanna Grigolo', 'CV JOHANNA GRIGOLO PDF.pdf', 0, 1),
(220, 'Hernan Antonio Orue Bareiro', 'her_orue@hotmail.com', '0981 619 718', 'Me gustaría formar parte del plantel de empleado de esta prestigiosa entidad, y poder colaborar para el desarrollo de la misma atraves de mis conocimientos y experiencia..\r\nEn espera de una respuesta favorable. Atte.', 'CURRICULUM VITAE HERNAN ORUE actual.doc', 0, 1),
(221, 'Emilio José Delvalle Jara', 'emiliodelvalle09@gmail.com', '0984844513', 'Pertencer a esta empresa seria brillante, una oportunidad buenisima. Me sentiria agusto y asi poder demostrar mis experiencias e inteligencias.', 'Curriculum Emilio 18.docx', 0, 1),
(222, 'Noelia Elizabeth Jimenez Bareiro', 'elizabethjimenez9670@gmail', '0972534548', '', 'Noelia-C.V.-1', 0, 1),
(223, 'Noelia Elizabeth Jimenez Bareiro', 'elizabethjimenez9670@gmail', '0972534548', '', 'Noelia-C.V.-1', 0, 1),
(224, 'Noelia Elizabeth Jimenez Bareiro', 'elizabethjimenez9670@gmail', '0972534548', '', 'Noelia-C.V.-1', 0, 1),
(225, 'Felicita Elizabeth Rodas Báez', 'rodaselizabeth8@gmail.com', '0981958942', 'Favor tener en cuenta.Tengo muchas ganas de trabajar', 'Elizabeth Rodas.doc-3.docx', 0, 1),
(226, 'Ramón Rodrigo Riveros Camaraza', 'rodrigoriveroscamaraza@yahoo.com', '0961100704', '', 'CURRICULUM Rodrigo Riveros2            (1).docx', 0, 1),
(227, 'Adriana Mora Lopez', 'achilinmora@outlook.es', '0982511549', '', 'Curriculum Vitae AV.docx', 0, 1),
(228, 'Julio Cesar Lopez Mendez', 'jlopezmendez1@hotmail.com', '0981777760', 'Buenas Tardes.\r\nAdjunto Curriculum Vitae para vacancia dentro de dicha entidad.\r\n\r\nSaludos Cordiales.\r\nJulio Lopez.', 'Curriculum Vitae  JLopez (1).pdf', 0, 1),
(229, 'Samuel Gonzalez Davalos', 'samugonzad97@gmail.com', '0991691181', 'Buenas\r\n\r\nMi Nombre es Samuel Gonzalez soy estudiante del primer año de la carrera de Administración de empresas y estoy buscando nuevas oportunidades laborales por lo que me encuentro abierto a las ofertas que me puedan surgir. \r\n\r\nCordiales Saludos', 'C.V.pdf', 0, 1),
(230, 'María José Benítez Fleitas', 'fleittas@gmail.com', '0982892221', 'Buenas noches, envio mi hoja de vida esperando respuestas favorables, muchas gracias.', 'CURRICULUM VITAE.pdf', 0, 1),
(231, 'María José Benítez Fleitas', 'fleittas@gmail.com', '0982892221', 'Buenas noches, envio mi hoja de vida esperando respuestas favorables, muchas gracias.', 'CURRICULUM VITAE.pdf', 0, 1),
(232, 'María José Benítez Fleitas', 'fleittas@gmial.com', '0982892221', 'Buenas noches, envío mi hoja de vida esperando respuestas favorables, gracias.', 'CURRICULUM VITAE.pdf', 0, 1),
(233, 'Alejandro Pena', 'agpena91@gmail.com', '0994700510', 'Estoy interesado en el puesto disponible. Soy egresado de la universidad Pittsburg State University, de Kansas. Me Gradué de dos carreras: International Business y Marketing Strategy. En mi tiempo en Kansas entre a la Asociación Estudiantil Paraguaya (PSA por sus silabas en ingles) donde conseguimos recaudar fondos para poder enviar libros de aprendizaje del idioma inglés a escuelas de bajos recursos en Paraguay.\r\n \r\nMientras en la universidad, también tuve la chance de viajar por varias partes del país Norte Americano y conocer mucha gente internacional de diferentes culturas, y crecí un gran interés en aprender a comunicarme con gente que no me entiende. Ese interés hizo que yo entrara a varios programas de comunicación culturalmente y de diversidad, lo cual me dieron la oportunidad de viajar, a través de la universidad, a Corea y a China y conocer más gente increíble.  \r\n \r\nDespués de mi graduación me mude a Miami, Florida donde me contrato la empresa Marcus Evans como coordinador de negocios LATAM. No estuve mucho tiempo ahí por temas de mi Visa de trabajo, pero si tuve la increíble experiencia de trabajar en una grande multinacional en los Estados Unidos y en un equipo de trabajo excelente.\r\n \r\nActualmente estoy de vuelta en Paraguay trabajando en una importante empresa nacional de logística (un ramo que estudie mucho en la universidad y el que siempre tuve interés) donde estoy como Ejecutivo de Logística Internacional. La empresa esta en proceso de cierre del área comercial y operativo por problemas internos, lo cual concluye a que yo este en búsqueda laboral de vuelta. Mi experiencia en esta empresa fue excelente y me enseño muchas cosas, ahora estoy listo para un nuevo lugar y una nueva experiencia donde pueda ejercer mis estudios y crecer profesionalmente.\r\n \r\n\r\nMe gustaría poder agendar una reunión con ustedes y ver si mis estudios y experiencias son lo que están buscando. ', 'Curriculum Vitae - Gabriel Peña.pdf', 0, 1),
(234, 'Natalia Graciela Benitez Espinoza', 'naty_4114@hotmail.com', '0991844508', 'Deseo postularme a una oferta laboral en wu empresa.\r\nMuchas Gracias.', 'Curriculum Vitae Natalia1.docx', 0, 1),
(235, 'Katherin Marlene Goiburu Ortega', 'goiburukatherin@gmail.com', '0991864071', 'Estimados,\r\n\r\n \r\n\r\nVista la Oferta Laboral les hago llegar mis datos personales en Currículum Vitae a fin de ser tenido en cuenta como candidata.\r\n\r\n \r\n\r\nCon la convicción de poseer el perfil requerido para un muy buen desempeño en el cargo a cubrir, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente.\r\n\r\n \r\n\r\nSaludos cordiales.\r\n\r\n Katherin Goiburu.', 'curriculum vitae.docx', 0, 1),
(236, 'Luis anibal mosqueda', 'lunimos88@gmail.com', '0994342325', 'Buenas tardes ,le adjunto mi Cv esperando una respuestas favorable me despido.', 'curri luis mosqueda.doc', 0, 1),
(237, 'Steven Nicolas Rojas Ayala', 'stevenelkapo@gmail.com', '0994849 784', 'Buenas \r\n\r\nDisculpe la Molestia, Me dirijo a usted  debido a un anuncio que vi en Redes Sociales de que están incorporando gente a su staff , Espero pueda tomarse el Tiempo de dar una Leída a mi Hoja de Vida y si le Interesa me Ofrezca una Oportunidad de Formar parte de su Equipo...\r\n\r\nDesde ya Muchas Gracias \r\n\r\nSaludos Cordiales', 'Cv Steven.docx', 0, 1),
(238, 'Fernando Ariel Almada Diaz', 'falmada521@hotmail.com', '0972396211', 'Por este medio envio mi solicitud de empleo para lo que hubiere lugar \r\nOfrezco honestidad responsabilidad tambien teniendo en cuenta la mision y visión de la empresa.', 'CURRICULUM FERNANDO..docx', 0, 1),
(239, 'MARCOS LAZARO', 'tonny812004@gmail.com', 'tonny812004@gmail.com', '', 'Currimarcos 2017.pdf', 0, 1),
(240, 'Giselle cristaldo', 'giseacdc@gmail.com', '0962303003', 'Señor/es.....\r\nA travez de la presente en primer lugar mis respetos y un cordial saludo.\r\n Es un placer para mi persona de esta manera llegar a usted/es a los afectos de\r\n una ubicacion de mi perfil dentro de su Entidad\r\nDe mi parte garantizo una total y absoluta discreción y por sobre todo el mayor de mis  esfuerzo para un trabajo 100% profesional.\r\n\r\nSin otro particular les expongo mi curriculum y esperando\r\nUna respuesta favorable a mi solicitud me despido con el respeto', 'Curriculum  Vitae. gise.doc', 0, 1),
(241, 'Pablo Giménez', 'pablo.gimenez.zorrilla@gmail.com', '0971138423', '', 'Curriculum Vitae.pdf', 0, 1),
(242, 'Pablo Giménez', 'pablo.gimenez.zorrilla@gmail.com', '0971138423', '', 'Curriculum Vitae.docx', 0, 1),
(243, 'Diego Antonio Segovia Quintana', 'diego.segovia6080@gmail.com', '0983 343 379', 'Espero me den la oportibidad de formar parte de tan prestigiosa empresa. Desde ya muchas gracias!!', 'CURRICULUM VITAE.docx', 0, 1),
(244, 'Diego Antonio Segovia Quintana', 'diego.segovia6080@gmail.com', '0983 343 379', 'Espero me den la oportibidad de formar parte de tan prestigiosa empresa. Desde ya muchas gracias!!', 'CURRICULUM VITAE.docx', 0, 1),
(245, 'Myrian Leticia Alonso de Paranderi', 'diviflores21@gmail.com', '0985888889', 'Buenas Tardes, por este medio solicito un lugar de trabajo para con ustedes desdes ya muchas gracias..\r\nSaludos', 'C.V. Myrian L. Alonso_2017.docx', 0, 1),
(246, 'Juan fernando Escurra Gonzalez', 'juanfernando.escurragonzalez@gmail.com', '0982381922', '', 'CURRICULUM  Fernando Escurra.docx', 0, 1),
(247, 'Lisa Inés Romero Bento', 'lisabento74@gmail.com', '0985692606', 'Muy buenas tardes!', 'CURRICULUM VITAE.docx', 0, 1),
(248, 'Lilian Carolina Espinola Patiño', 'angela.cinthia.91@hotmail.com', '0991674069', 'Necesito trabajar con urgencia', 'LILIAN CAROLINA ESPINOLA PATINO.docx', 0, 1),
(249, 'Ana Laura Cubilla Nuñez', 'analaucubilla94@gmail.com', '0984163118', '', 'CV Ana Laura.docx', 0, 1),
(250, 'Noelia Elizabeth Jimenez Bareiro', 'elizabethjimenez9670@gmail', '0972534548', '', 'Noelia-C.V.-1', 0, 1),
(251, 'YENNY RODRIGUEZ', 'yennyrod013@hotmail.com', '0981198693', 'Buenas le envío mi curriculum, para un puesto en el área de contabilidad, auditoria interna o control interno, espero me tengan en cuenta.\r\nSaludos cordiales.', 'CURRICULUM Yenny.pdf', 0, 1),
(252, 'Juan Miguel Herrero López', 'juami1992@gmail.com', '0972696796', 'Soy estudiante del 2año de lic administración', 'CURRICULUM VITAE juami mandar.docx', 0, 1),
(253, 'Cesar Alberto Arce', 'cesarce92@hotmail.com', '0994140739', 'Me gustaría formar parte de la cultura que mantienen ya que estuve leyendo sobre la misión, visión e historia y por lo visto se ajusta a mi personalidad y mis valores, que generan habilidades para resolver sus problemas y lograr objetivos y si me dan la oportunidad me beneficiare en forma económica, profesional y personal. Ustedes a la par se beneficiaran ya que tendrán un gran impulso en mi futuro y en el suyo que es más valioso.', 'CV Cesar Arce.docx', 0, 1),
(254, 'Alcides Coronel Gimenez', 'alcidescor97@gmail.com', '0984974850', '', 'CURRICULUMVITAE.docx.pdf', 0, 1),
(255, 'Nelson Caballero', 'neildiaz03@gmail.com', '0982245085', 'Buenos Dias,\r\n\r\nMe gustaria preguntar si esta\r\ndisponible alguna vacancia .Soy Universitario de ING.COMERCIAL y\r\nAdministracion de Empresa.Me podrian informar por favor,me urge trabajar urgentemente.Muchas Gracias.', 'Curriculum Nelson.doc', 0, 1),
(256, 'Juan Miguel Herrero López', 'juami1992@gmail.com', '0972696796', 'Postulación para cargos administrativos', 'CURRICULUM VITAE juami mandar.docx.docx', 0, 1),
(257, 'Valeria Villar', 'Valevillar93@hotmail.com', '0985556215', 'UBICADA EN LA CIUDAD DE MARIANO ROQUE ALONSO  NRO ALTERNATIVO 0982926610', 'valeria curriculum enviar.docx', 0, 1),
(258, 'sonia gayoso', 'soniaegayoso@gmail.com', '0972124292', 'Buenos dias!\r\n\r\nMe es grato dirigirme a Ud a los efectos de poner a su disposición mi CV.\r\n\r\nAgradeceria me avisen cuando dispongan de tiempo para una entrevista personal, formal o informal.\r\n\r\nAgradecida de antemano y a las ordenes para cualquier consulta telefonica y/o por correo\r\n\r\nCordiales saludos', 'CV.pdf', 0, 1),
(259, 'gustavo monges', 'gustavomonges@gmail.com', '0981192642', 'Buenos dias!\r\n\r\nMe es grato dirigirme a Ud a los efectos de poner a su disposición mi CV.\r\n\r\nAgradeceria me avisen cuando dispongan de tiempo para una entrevista personal, formal o informal.\r\n\r\nAgradecido de antemano y a las ordenes para cualquier consulta telefonica y/o por correo\r\n\r\nCordiales saludos', 'cv gustavo.pdf', 0, 1),
(260, 'Jesús Peralta', 'chuleperalta24@gmail.com', '0992870545', 'Me gustaria trabajar con ustedes.', 'JESUS PERALTA.pdf', 0, 1),
(261, 'Yanley Mesa', 'yanley.mesa@gmail.com', 'yanley.mesa@gmail.com', '', 'curriculum 4.pdf', 0, 1),
(262, 'Adriana Belen Salinas Vera', 'adrianabelensalinas1997@gmail.com', '0971991415', '', 'CURRICULUM VITAE.docx', 0, 1),
(263, 'Cristhian David Cañete Agüero', 'canetecristhian@gmail.com', '+5950992635565', 'Buenos días me llamo cristhian y me gustaría formar trabajar con ustedes en la empresa.', '(Cristhian_Curriculum_Vitae).pdf', 0, 1),
(264, 'Mónica Analy González Casco', 'moniglzc@gmail.com', '0981368710', '', 'CV Monica Gonzalez.doc', 0, 1),
(265, 'Diego Ariel Flor Nuñez', 'dieguito.ariel@gmail.com', '0992992825', 'Busco Empleo...tengo 20 años..curso los primeros años de la carrera de Contaduría Publica..', 'Curriculum Vitae.docx', 0, 1),
(266, 'cynthia brizuela', 'cynthiacarolinabrizuelarojas@gmail.com', '0992331625', 'Buenos dias aqui adjunto mi cv.', 'curriculum vitae de cynthia brizuela.docx', 0, 1),
(267, 'Noelia Jazmin Aguero', 'noeliajazminaguero@gmail.com', '0228632849', 'Remito C.V', 'curriculum Noe.docx.pdf', 0, 1),
(268, 'Fatima Karina Cabrera Britez', 'cabrerajessi321@gmail.com', '0986871864', 'Necesito un trabajo para poder seguir en la facultad, aquí les dejo algunas experiencias..', 'CV', 0, 1),
(269, 'Fatima Karina Cabrera Britez', 'cabrerajessi321@gmail.com', '0986871864', 'Necesito un trabajo para poder seguir en la facultad, aquí les dejo algunas experiencias..', 'CV', 0, 1),
(270, 'Fatima Karina Cabrera Britez', 'cabrerajessi321@gmail.com', '0986871864', '', 'CV', 0, 1),
(271, 'Fatima Karina Cabrera Britez', 'cabrerajessi321@gmail.com', '0986871864', '', 'CV', 0, 1),
(272, 'Rosana Monserrath Díaz Agüero', 'rmdiaz91@hotmail.com', '0986589194', 'Buenas tardes! Adjunto curriculum para vacancia disponible acorde al perfil.', 'Curriculum Rosana Diaz.docx', 0, 1),
(273, 'Coralia Quenhan', 'coriquenhan@gmail.com', '0981100015', 'Especialista en Planificación Comercial y direccionamiento de estrategias por segmentación de clientes.', 'Curriculum Vitae_Coralia Quenhan.docx', 0, 1),
(274, 'Deisy Sofía Agüero Alfonso', 'deisysofia2010@hotmail.com', '0985412456', 'Busco empleo con disponibilidad inmediata', 'curriculum Deisy sofia.docx', 0, 1),
(275, 'Sonia Gimenez', 'soniagr18@gmail.com', '0961821281', 'Buenas, soy abogada de la promo 2014/15, me gustaría seguir creciendo profesionalmente, si hay algún cargo en lo que les pueda servir  le adjunto  mi CV. Muchas gracias', 'curriculum vitae sonia gimenez.pdf', 0, 1),
(276, 'Lisa Inés Romero Bento', 'lisabento74@gmail.com', '0985692606', 'Muy Buenos Dias.\r\nMi nombre es Lisa, tengo 18 años, soy de la ciudad de Villeta. No tengo experiencia laboral pero si muchas ganas de aprender y salir adelante.', 'CURRICULUM VITAE.docx', 0, 1),
(277, 'Gustavo Andrés Escobar duarte', 'gusandrescobar92@gmail.com', '0992296117', '', 'CURRICULUN VITAE GUS 1.doc', 0, 1),
(278, 'Maria Dejesus Fernandez Santacruz', 'majefersan4@gmail.com', '021-966-821', '+Disponibilidad de tiempo inmediata \r\nMi nombre es Maria Dejesus Fernandez Santacruz, tengo 25 años de edad. Soy Licenciada en Ciencias Contables.\r\n   Estoy interesada en unirme en su equipo de trabajo; con ganas de crecer profesionalmente. Estoy abierta a aprender y progresar. \r\n   Para ello no dude contactar conmigo. Todos mis datos y experiencias actuales están adjuntados en mi curriculum Vitae.\r\n\r\nSaludos Cordiales \r\nLic. Maria Fernandez', 'Curriculum Vitae- Maria Fernandez.pdf', 0, 1),
(279, 'Wilma Zunilda González Núñez', 'gonzalezwilma54@gmail.com', '0972165380', '', 'curriculum vitae.docx', 0, 1),
(280, 'Daisy Suile Isea Franco', 'iseadaisy98@gmail.com', '0971164802', '', 'Curriculum Vitae Daisy Isea vfinal.docx', 0, 1),
(281, 'Eliza duarte', 'elisa0991duarte@gmail.com', '0991916567', 'Me gustaria trabajar con ustedes', 'IMG_20170804_152843.jpg', 0, 1),
(282, 'Eliza duarte', 'elisa0991duarte@gmail.com', '0991916567', 'Me gustaria trabajar con ustedes', 'IMG_20170804_152843.jpg', 0, 1),
(283, 'María Paz Barrientos Denis', 'paci.barrientos@gmail.com', '0981714300', '', 'Maria Paz Barrientos CV .pdf', 0, 1),
(284, 'Aldo Andres', 'Aldoandresperalta@gmail.com', '0972412156', 'Deseando que se me conceda la oportunidad de trabajar en esta prestigiosa empresa, doy mi palabra que me esforzaré y seré muy profesional en cada una de las labores que se me asignen.', 'Curriculum Aldo Andres Peralta.pdf', 0, 1),
(285, 'Amira Isabel Díaz Salomón', 'amira.ds97@outlook.com', '0981774397', 'Flexibilidad de trabajo.\r\nSaludos.', 'Curriculum Vitae.pdf', 0, 1),
(286, 'Jorge Francisco Mercado Lovera', 'jorgemercado1970@gmail.com', '0981555422', 'Busco trabajo en las Áreas de Administración y Logística\r\n\r\nMucha Gracias', 'Curriculum Jorge Mercado.pdf', 0, 1),
(287, 'Claudia Andrea Lopez Vallejos', 'clalopezva@gmail.com', '0986363921', '', 'Claudia Lopez.(2).docx', 0, 1),
(288, 'Leticia Bobadilla', 'lbba1987@hotmail.com', '0986587352', 'Buenas; \r\n\r\nAdjunto remito mi CV para que lo consideren. \r\n\r\nDesde ya muchas gracias.\r\n\r\nSaludos cordiales.\r\n\r\nLeticia Bobadilla.\r\n0986587352', 'CURRICULUM ACTUALIZADO 2013.- (Leh Bobadilla).docx', 0, 1),
(289, 'Maria Jose Casco Ozuna', 'majocasco4@gmail.com', '0992394350', 'Necesito trabajar, soy responsable, activa, y me adecuaré al área en que me pongan', 'CV-maria-jose-casco-ozuna.pdf', 0, 1),
(290, 'Jessica Estefania Segovia Fariña', 'jodriosola@consolidada.com.py', '0991863751', 'envió de C.V. en caso de vacancia, soy responsable y dedicada y con muchas ganas de progresar.', 'JESSICA ESTEFANIA SEGOVIA FARINA CURRICULUM VITAE 2 pdf.pdf', 0, 1),
(291, 'Marco Antonio Lopez Peralta', 'marcoslopez88820@gmail.com', '0992999410', 'Con ganas de trabajar mente positiva ante todo situación y ganas de superacion', 'CURRICULUM FORMATO 2-1.doc', 0, 1),
(292, 'Karina Noemi Servín Morel', 'karina1996servin@gmail.com', '0972427677', 'Buenos días! Adjunto mi CV en caso de que haya alguna vacancia acorde a mi perfil.\r\nMuchas gracias', 'Curriculum vitae Karina Servin 2017.docx', 0, 1),
(293, 'Tahiris Violeta Acosta Chavez', 'vegajuango@gmail.com', '0984698062', '', 'violetaCURRICULUM VITAE.doc - Hword 2014', 0, 1),
(294, 'MAYRA ALEJANDRA FABIANA ESCOBAR VILLALBA', 'mayescobar20@gmail.com', '0981 132004', 'Me gustaría formar parte de su equipo de trabajo, tengo experiencia en el ramo financiero.', 'CURRICULUM  VITAE MAYRA.doc', 0, 1),
(295, 'Alfredo Nicolás Zelaya Garcete', 'nicozelaya99@hotmail.com', '0981 971229', 'Gracias por leer mi correo.', 'cv nico.pdf', 0, 1),
(296, 'Francisca Lucía Domínguez Zarza', 'franciss9715@gmail.com', '0971117622', 'Me gustaría formar parte de su equipo, no sólo para crecer profesionalmente sino también me permita seguir con mis estudios adecuadamente. ¡Muchas gracias!', 'Curriculum Vitae Francisca Dominguez.docx', 0, 1),
(297, 'Armando Juan Pablo Insaurralde Haifuch', 'Juanpabloacahay@hotmail.com', '0982811886', 'Muy bs ds, aqui les envio mi curriculum y me pongo a su disposición para una optener una oportunidad de trabajo, gracias desde ya', 'Curriculum Vitae Armando Juan Pablo 1.docx', 0, 1),
(298, 'Licet Montserrat Rolón Adorno', 'limonro14@gmail.com', '0992350448', 'Hago llegar mis datos personales y profesionales en Currículum Vitae a fin de ser tenido en cuenta como candidato.\r\n\r\nCon la convicción de poseer el perfil requerido para un muy buen desempeño en el cargo a cubrir, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente.\r\n\r\nEsperando una respuesta positiva lo saluda atentamente,\r\n\r\nLicet Montserrat Rolón Adorno', 'Curriculum Vitae Licet Rolon.docx', 0, 1),
(299, 'Edil Rafael Galeano Paiva', 'edilrafaelgaleano@hotmail.com', '0991289880', 'Me interesaría trabajar tengo experiencia como vendedor de créditos trabaja para una financiera si hay alguna vacancia me interesaría trabajar con ustedes', '1501805601073.jpg', 0, 1),
(300, 'VILMA DURE', 'vil_dur86mause@outlook.es', '021680248', 'Buenos dias!\r\n\r\nA traves de este medio, deseo poner a su entero conocimiento que me encuentro interesada en trabajar con ustedes y adjunto envio curricolo vitae para lo que hubiere lugar.\r\n\r\nDesde ya, MUCHAS GRACIAS...\r\n\r\nVilma Duré\r\n021680248\r\n0981 398 126', 'C V Vilma Dure 201611.pdf', 0, 1),
(301, 'Nadia Maribel Lovera Nuñez', 'na.lov103@gmail.com', '0971505025', 'Buenas,\r\n\r\nPor este medio temito mi CV para algun puesto vacante en la empresa.\r\n\r\nDesde ya muchas gracias.\r\n\r\nSaludos.', 'Curriculum vitae Nadia Lovera - 2.pdf', 0, 1),
(302, 'Carlos Daniel Garay  Cabrera', 'ccabrera095@gmail.com', '0972756869', '', 'cv.pdf', 0, 1),
(303, 'Luis Sanabria', 'luissanabria1994@gmail.com', '0992490597', 'Solicitud de Empleo', 'Curriculum Luis Sanabria_1.pdf', 0, 1),
(304, 'Nestor martinez', 'nestormartinez484@gmail.com', '0982206967', 'Buenas estoy en busca de trabajo seguro y estable estoy disponible', '3.681.165 Nestor FAbian MArtinez ESpinola con foto carnet (2', 0, 1),
(305, 'María Paz Pérez Duarte', 'mapazpd@gmail.com', '0982 468 207', 'Buenas tardes,\r\n\r\nAdjunto mi Currículim Vitae para que tengan en cuenta en caso de que tengan algún puesto vacante en el área de administración y derivados.\r\n\r\nMuchas gracias desde ya.', 'CV Maria Paz Perez Duarte 2017.pdf', 0, 1),
(306, 'susana isidora gimenez dure', 'susu198614@gmail.com', '0976391114', 'buenas tardes adjunto envio C.V. para cualquier puesto disponible. gracias', 'CURRICULUM VITAE 2.docx', 0, 1),
(307, 'HERMANN CZAYA MACHUCA', 'ingczaya@gmail.com', '0986488638', 'AJUNTO CURRICULUM', 'CURRICULUM VITAE-ACTUAL HERMANN(1).pdf', 0, 1),
(308, 'Rolando Gaspar Rotela', 'rolirotela@gmail.com', '0992492824', 'Espero poder formar parte de su equipo, desde ya, gracias!', 'CV_Rolando_Rotela.pdf', 0, 1),
(309, 'Juan Daniel Piñanez Otazo', 'yidanbogado@hotmail.com', '0982596940', 'Proactivo y rapido en aprender sobre todo honesto y responsable, me gustaria pertenecer a una empresa tan grande y seria como lo es Argor Empeños, a las ordenes', 'curri-juan.docx', 0, 1),
(310, 'Aída Romina Corbalan Cardozo', 'aida_aida_66@hotmail.com', '0986188584', 'Estudiante de último año de Administración de Empresas', 'Datos Personales.docx', 0, 1),
(311, 'Jorge Luis Sosa Almeida', 'jsosalmeida@hotmail.com', '0981390066', '', 'CvJorge.pdf', 0, 1),
(312, 'María Alejandra Vera', 'alevera-1@hotmail.com', '0972902280', '', 'C.V.-AlejandraVera.doc(2).docx', 0, 1),
(313, 'luis carlos bogarin silvero', 'jessica_mariela92@hotmail.com', '0991929621', 'quiero formar parte de su equipo de trabajo. soy muy responsable y honesto', 'CV _Luis Carlos.docx', 0, 1),
(314, 'Eduardo Sebastián Allende Estigarribia', 'sebas.a74@gmail.com', '0984667384', 'Buenas tardes \r\nEstoy en busca de oportunidades laborales y me encantaría formar parte de su equipo de trabajo', 'curriculum-vitae-DEFINITIVO-S.A..pdf', 0, 1),
(315, 'Miguel Ángel Céspedes', 'cespedesmiguel@outlook.com', '+595 984 830087', 'Muy buenos días!\r\nEs un placer contactar con ustedes, me encantaría formar parte de esta prestigiosa empresa.\r\nAnte cualquier consulta me encuentro a su entera disposición.\r\nAtentamente,\r\n\r\nMiguel Céspedes\r\n+595 984 830087', 'CV, Miguel Angel Cespedes.pdf', 0, 1),
(316, 'Ignacio Erfidio Rios Arias', 'nachorios1993@outlook.es', '0972441062', 'Estoy a las órdenes para lo que hubiera lugar', 'CURRICULUM VITAE ignacioo.docx', 0, 1),
(317, 'Camila Maria Teresa Parra Bruno', 'kami_pb97@hotmail.com', '0981342505', 'Solicitud de empleo', 'CURRICULUM_CAMI.pdf', 0, 1),
(318, 'Rodrigo Fidel Alarcón Medina', 'rodrigoalarcon908@gmail.com', '0982819744', 'Buenos días, \r\n\r\nA continuación adjunto CV para vacancia mencionada.\r\n\r\nAguardo retorno,\r\n\r\nSaludos cordiales.', 'Curriculum Vitae Actual noviembre.pdf', 0, 1),
(319, 'Antonio Caballero Espinola', 'anthonydj099@gmail.com', '0971919394', 'Para cualquier puesto vacante, gracias!', 'Curriculum Vitae (Mio).pdf', 0, 1),
(320, 'Maria Luján Ayala Alderete', 'lujaanayala1@gmail.con', '0983218624', '¡Buenas tardes! \r\nMe encantaría formar parte del equipo. \r\nQuedo atenta.\r\n¡Saludos!', 'Documento (1) (1).docx', 0, 1),
(321, 'Alexis Acosta', 'Redi0808@hotmail.com', '0986849036', 'Me Gustaria Trabajar Con Ustedes', 'curriculum alexis.docx', 0, 1),
(322, 'Mario Oscar Mereles Velázquez', 'mereles.okki.20@gmail.com', '0982295980', 'Me gustaría trabajar con ustedes. Muchas Gracias', 'Curriculum Vitae mario oscar mereles 3.docx', 0, 1),
(323, 'Alma Maria Jazmin Fleitas Mieres', 'almitaf95@gmail.com', '0985305530', 'Buenas tardes,\r\nAdjunto envio mi CV con el deseo de ser tenida en cuenta ante futuras vacancias, principalmente en el área administrativa. \r\nAgradezco desde ya', 'Curriculum Vitae Alma Fleitas.doc-1.pdf', 0, 1),
(324, 'Andrea Carolina Benitez Bogarin', 'andybenitez1992@gmail.com', '0973864039', 'Buenos Días.\r\nConociendo la actividad a la que se dedica su empresa y viendo que responde a mis intereses profesionales, me pongo en contacto con usted para hacerle llegar mi currículum vitae ya que estoy buscando nuevas oportunidades profesionales.\r\nSería un placer para mí poder ampliar la información sobre mi formación profesional y mis competencias tal y como se recogen en el currículum a través de una entrevista personal. Para ello, no dude en contactar conmigo.\r\n \r\nReciba un cordial saludo', 'curriculum de Andrea Benitez Bogarin .pdf', 0, 0),
(325, 'Claudia Gissel Benitez Diaz', 'gisselb_@hotmail.com', '0991232540', '', 'Curriculum Viate..doc', 0, 0),
(326, 'Ronaldo Hermosilla', 'ronalhermosilla1912@gmail.com', '0972219712', '', 'rolo.pdf', 0, 1),
(327, 'Tatiana Belén Gimenez', 'tatianagimenez97@gmail.com', '0972722307', '', 'Curriculum Vital.docx', 0, 0),
(328, 'Fernando Enrique Molas Montalbetti', 'fermolas86@gmail.com', '0961478980', 'Estimado/os,\r\n\r\nLes hago llegar mis datos personales y profesionales en Currículum Vitae a fin de ser tenido en cuenta como candidato.\r\n\r\nCon la convicción de poseer el perfil requerido, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente.\r\n\r\nEsperando una respuesta positiva lo saluda atentamente.\r\n\r\n\r\nFernando Enrique Molas Montalbetti.', 'CV-FernandoMolas.pdf', 0, 1),
(329, 'Elva Beatriz Vega Figueredo', 'vegafigueredoelvabeatriz@gmail.com', '0983212899', '', 'CV. Elva Vega.doc', 0, 0),
(330, 'Maria angelica almada Montiel', 'angiemontielalmada@gmail.com', '0982617952', '', 'cv maria.docx', 0, 0),
(331, 'Sergio Enrique Cardozo Acosta', 'sergiocardozo01@hotmail.com', '0961597793', 'Espero ser llamado', 'CURRICULUM SERGIO CARDOZO.pdf', 0, 1),
(332, 'Daniela Magali ovelar Santacruz', 'ovelarmagali148@gmail.com', '0994507715', '', 'Curriculum.docx', 0, 0),
(333, 'Marcos Encina', 'Mrencina1@gmail.com', '0994114127', '', 'marcos encina.docx', 0, 1),
(334, 'Fatima Herrera Aguero', 'fachu_herrera@hotmail.com', '0986 706 474', 'Buenos Días\r\nMe gustaría que me den la oportunidad para integrar al equipo de trabajo, para demostrar mis ganas de trabajar con responsabilidad y honestidad.', 'CURRICULUM VITAE FATIMA HERRERA 2017.pdf', 0, 0),
(335, 'Vanessa Jazmín Román Bordón', 'vanroman39@gmail.com', '0984520944', 'Oportunidad Laboral', 'curriculum-vanessa MODIFICADO.pdf', 0, 0),
(336, 'Clara karina gonzalez rojas', 'clarakarina88@gmail.com', '+595962-259-694', 'Urgente necesito un lugar de trabajo', 'CURRICULUM VIATAE_Clara Karina Gonzalez Rojas-2.docx', 0, 0),
(337, 'Samuel Gonzalez', 'samugonzad97@gmail.com', '0991691181', '', 'C.V Foto.pdf', 0, 1),
(338, 'Natalia Gabriela Jara Torres', 'natyjarat93@gmail.com', '0994380018', '', 'Curiculum Vitae de natalia.docx', 0, 0),
(339, 'Marcos David Riquelme Vera', 'marcosdariquelme19993@gmail.com', '0971218477', 'Me gustaría formar parte del equipo argor', 'Marcos David.docx', 0, 1),
(340, 'Claudia Josefina Paredes Ayala', 'claup_cj2@hotmail.com', '0976236170', 'Buenos días,\r\nMe encantaría formar parte del plantel de sus colaboradores.\r\n\r\nMuchas gracias', 'CURRICULUM VITAE - ClAUDIA PAREDES (2).docx', 0, 1),
(341, 'Adolfo David Cabrera Zarate', 'adavidcabreraz@gmail.com', '0991737237', 'Muy buenos días:\r\n\r\nEn repuesta a su oferta de empleo para cubrir  un puesto vacante publicada anteriormente. Les adjunto mi hoja de vida actualizada, para el perfil postulado en base a sus necesidades.\r\n\r\nComo podrán comprobar en el mismo, me estuve desempeñando como Administrativo, atención al cliente, ventas y caja actualmente estoy cursando el 3° año de la carrera de Marketing. Tengo experiencia en los puntos mencionados. Cuento con disponibilidad inmediata y la mejor predisposición laboral, entre mis principales actitudes se destacan: la responsabilidad, la puntualidad y la honestidad.\r\n\r\nAgradecería me tengan en cuenta para los puestos que tengan disponibles. Quedo a su disposición para ustedes y aclarar cualquier punto relacionado con mi curriculum.\r\n\r\nAgradezco la oportunidad y la posibilidad de forma parte de su prestigiosa empresa.\r\n\r\nAtentamente.\r\n\r\nAdolfo David Cabrera Z.', 'CV 2017 BR 91.docx', 0, 1),
(342, 'Joel Jesus Perez Resquin', 'Striderjesus725@gmail.com', '(021) 500 - 334', '', 'Curriculum Vitae  1.pdf', 0, 1),
(343, 'Jorge Parcheita', 'parcheitajorge@gmail.com', '+595982498413', 'Buenos dias, le adjunto mi curriculum a vista de la publicación sobre la vacancia disponible. Si les sirve mi perfil estoy disponible y en busca de trabajo. Muchas gracias.\r\nLe saluda coordialmente\r\nJorge Parcheita.', 'Jorge000.pdf', 0, 1),
(344, 'Perla Antonia Ovelar Sapini', 'perlaspaini@hotmail.com', '0991192778', 'Presento mi CV para una oportunidad kaboral', 'Curriculum  Perla Ovelar S.docx', 0, 0),
(345, 'Cynthia Carolina Barua Zaracho', 'carolbarua1993@gmail.com.py', '0983.275.106', '', '20171013_114817.jpg', 0, 0),
(346, 'Cynthia Carolina Barua Zaracho', 'carolbarua1993@gmail.com.py', '0983.275.106', '', '20171013_114817.jpg', 0, 0),
(347, 'Cynthia Carolina Barua Zaracho', 'carolbarua1993@gmail.com.py', '0983.275.106', '', '20171013_114817.jpg', 0, 1),
(348, 'Héctor Adrián Marecos', 'hmarecos.81@gmail.com', '0985631944', 'Adjunto mi CV, para su evaluación, por las experiencias adquiridas estoy capacitado para formar parte de la empresa tanto en áreas logísticas y comerciales.', 'CV.. Hector Marecos.doc', 0, 1),
(349, 'Ana Irias', 'airias13@gmail.com', '981558892', 'Buenas tardes me encuentro interesada en alguna vacancia del área de administración, agradecida.', 'CV Ana Irias -.pdf', 0, 0),
(350, 'Sara Villagra Ojeda', 'sariojeda77@outlook.com', '0982195299', 'Buenas tardes, aquí les envío mis datos y mi currículum, estoy  las órdenes', 'Sara Villagra Ojeda.-.pdf', 0, 0),
(351, 'Rebeca belén Blanco Maldonado', 'silvanamaldonado.py@gmail.com', '0981551187', 'Estoy a la disposición desde ya muchas gran ias.', 'curricculum rebe 2.docx', 0, 0),
(352, 'Guadalupe Ivón', 'lupe_ivon@hotmail.es', '0972-713-755', '', 'Curriculum Vitae nuevo.pdf', 0, 0),
(353, 'Lilian Acosta Ramírez', 'lilyacosta1997@gmail.com', '0975138966', '', 'LILYYYy - CV.docx', 0, 0),
(354, 'Rilsi Yohana Flores Benitez', 'rilsiflo123@gmail.com', '0985796256', 'Buenas tardes', 'RILSI FLORES 1.docx', 0, 0),
(355, 'Alfre caceres', 'alfre-caceres@hotmail.com', '0982924538', 'Buenas tardes les hago llegar mis datos para un puesto bacante', 'mi curriculum.docx', 0, 1),
(356, 'Leticia Belén Yegros Martínez', 'yegrosleticia18belen@gmail.com', '0983643421', '', 'Documento Leti.docx', 0, 0),
(357, 'Luana Magali Lopez  Vera', 'luvera015@gmail.com', '0991903850', 'Buenas tardes', 'LUANA VERA 2017 CV.docx', 0, 0),
(358, 'Cristhian david portillo maciel', 'cristhianmaciel922@gmail.com', '0992263394', '', 'Curriculum Vita.pdf', 0, 1),
(359, 'Edith Morel', 'edithmorel45@gmail.com', '0985575130', 'Buenas tardes! Adjunto envío CV para vacancia. Desde ya muchas gracias', 'CV Edith Morel.docx', 0, 0),
(360, 'angel saturnino tandi villanueva', 'angeltandi160@hotmail.com', '0984-519-466 / 750-060', 'estoy buscando una  oportunidad de trabajo, soy muy responsable y honesto, aprendo rápido tareas que no conozco  y me esmero en realizar mi trabajo con mucha eficiencia', 'curri ANGEL.doc', 0, 1),
(361, 'CARMELO DEFRANCESCO CASTRO', 'carmelodefrancesco@hotmail.com', '0981284128', 'Muy buenas tardes\r\n\r\nPor medio de la presente le remito mi malla curricular.\r\n\r\nEn espera de recibir noticias suyas, me despido de usted.\r\n\r\nDesde ya muchas gracias.', 'CURRICULUM 2017_jullio 2017.pdf', 0, 1),
(362, 'Néstor Fabián Figueredo Martínez', 'tornes326@gmail.com', '0985305203', 'Soy un joven muy trabajador con muchas ganas de progresar en la vida de tal manera quiero trabajar y servir bien en la empresa que trabajo con responsabilidad y respeto', 'curriculum de Nestor .docx', 0, 1),
(363, 'Elizabeth Godoy Arias', 'elisaarias806@gmail.com', '0986 122 121', 'Buenas tardes \r\nAdjunto CV  para el cargo vacante.\r\nSaludos cordiales.', 'ELIZABETH.doc', 0, 0),
(364, 'Andrés Luis Ferreira Coronel', 'andresferreira9847@gmail.com', '0981573831', '', 'CURRICULUM VITAE....01.docx', 0, 1),
(365, 'Ruth Soledad Aquino Piris', 'ruthpiris@gmail.com', '0986746533', 'Buenas!\r\nAdjunto mi curriculum vitae para lo aue hubiere vacancia de acuerdo a mi perfil.\r\nTengo experiencia y disponibilidad inmediata.\r\nSaludos Cordiales\r\nRuth Aquino', 'ruthaquino curriculum original.docx', 0, 0),
(366, 'Jose Ignacio Verdun Cuenca', 'joseverdun1@gmail.com', '0982143035', 'Buenas quisiera ser parte de la empresa', 'Jose Verdun  - Curriculum.docx', 0, 1),
(367, 'Maria Elena Ferreira Sotelo', 'maria.elena.ferreira.sotelo@gmail.com', '0971100034', 'Buenas Noches,\r\nSe adjunta Curriculum Vitae para el puesto vacante.\r\n\r\nSaludos.', 'CURRICULUM VITAE MARIA FERREIRA..docx', 0, 0),
(368, 'Katherin Marlene Goiburú Ortega', 'goiburukatherin@gmail.com', '0991864071', 'Estimados,\r\n\r\n \r\n\r\nVista la Oferta Laboral les hago llegar mis datos personales en Currículum Vitae a fin de ser tenido en cuenta como candidata.\r\n\r\n \r\n\r\nCon la convicción de poseer el perfil requerido para un muy buen desempeño en el cargo a cubrir, quedo a entera disposición para hacerle llegar, sea en una entrevista personal o por el medio que se me indique, las ampliaciones y/o la documentación probatoria correspondiente.\r\n\r\n \r\n\r\nSaludos cordiales.\r\n\r\n \r\n\r\nKatherin Goiburú', 'Curriculum Vitae.docx', 0, 0),
(369, 'Julio Julian Guerrero Manuel', 'juliojguerrero95@gmail.com', '0985417986', 'Adjunto mi C.V.', 'CV-Julio Guerrero.docx', 0, 1),
(370, 'Jose Antonio Falcón Molinas', 'shadowmolinas28@hotmail.com', '0986645696', 'Una persona muy dinamica adaptable a todo tipo de trabajo \r\nTrabajo bajo presion \r\nExperiencia en varios ambitos laborales ya sea de contacto directo via telefonica gestiones y cobranzas \r\nExperiencia en logistica conocimientos de calles de Asunción y Gran Asunción \r\nMovilidad propia \r\nRegistros de conducir de automovil y motocicleta', 'curriculum jose.docx', 0, 1),
(371, 'Daisy Elena Laterra Barreto', 'daysilaterra06@gmail.com', '0991708969', 'Buenos días,\r\n\r\nMe gustaría formar parte de su equipo de trabajo de manera a lograr las metas propuestas por ambas partes. \r\n\r\nSaludos cordiales', 'CV Daisy Laterra.pdf', 0, 0),
(372, 'Víctor Francisco Avalos Cortaza', 'lourdesojeda916@gmail.com', '0991208633/0991208629', '', 'Curriculum Victor Avalos.docx', 0, 1),
(373, 'Sol María Gianina Olmedo Jara', 'olmedo_sol@hotmail.com', '0984538209', '', 'Curriculum Vitae 1.pdf', 0, 1),
(374, 'Elisa Noemí Cáceres', 'cacereselisa96@hotmail.com', '0975419181', '', 'CURRICULUM elii AuxiAdm.docx', 0, 1),
(375, 'Yanina Soledad Escobar Vera', 'yanii123esco@gmail.com', '0982456006', '', 'Perfil - Yanina Soledad Escobar Vera.pdf', 0, 1),
(376, 'Richard Daniel', 'rtrangoni99@hotmail.com', '0992678242', '', 'CURRICULUM VITAE RICHARD.docx', 0, 0),
(377, 'Pedro guzman coronel areco', 'guzmancoronel46@gmail.com', '0984660334', 'Trabajar en equipo', 'CV ACTUALIZADO DE MARKETING.docx', 0, 0),
(378, 'Jennifer Mariel Pereira Melgarejo', 'jp036399@gmail.com', '099249923u', '', '20170816_093251.jpg', 0, 0),
(379, 'Rosa Ana Lia Rojas Maciel', 'analiarojas737@gmail.com', '0991902401', '', 'curriculum', 0, 0),
(380, 'Rosa Ana Lia Rojas Maciel', 'analiarojas737@gmail.com', '0991902401', '', 'curriculum', 0, 0),
(381, 'Denis Oscar Arce', 'arceoscar89@gmail.com', '0982507809', 'Me interesa el trabajo!', 'IMG_20171211_133545.jpg', 0, 0),
(382, 'Matias Careaga', 'mattcareagagonz@gmail.com', '0981619045', 'Soy una persona entusiasta, motivado por el trabajo, me encantan los desafíos, me gusta aprender algo nuevo día tras día, trato de que mis debilidades se conviertan en mi fortaleza y tal forma sea un motivo más de ir para adelante siempre; en todo lo que hago doy todo lo mejor de mi para lograr los mejores resultados, soy feliz', 'MATIAS CAREAGA CURRICULUM VITAE 3.docx', 0, 0),
(383, 'Gabriel Fretes', 'gabrielfretes11@hotmail.com', '0972671121', 'Muy buenas! Adjunto mi hoja de vida ya que me gustaría formar parte de su equipo y de los valores de la empresa, no tengo experiencia laboral aún, pero estoy dispuesto a aprender, tengo conocimiento de herramientas informáticas, Excel, Word, Power point entre otros. Soy muy eficiente, responsable y proactivo, soy estudiante de la carrera Ingeniería Informática, estoy cursando el segundo año de dicha carrera y necesito un trabajo para poder seguir estudiando y ayudar a mi familia económicamente.\r\nMuchas gracias por su atención.', 'Curriculum Vitae.docx', 0, 0),
(384, 'Nestor Damian', 'lachilidivi@gmail.com', '0971726552', 'necesito trabajar urgent en cualquier area', 'IMG-20171010-WA0003.jpeg', 0, 0),
(385, 'Thalia Melissa Sannemann Fretes', 'thaliasannemann@gmail.com', '52', '', 'Curriculum Vitae.pdf', 0, 0),
(386, 'FERNANDO DANIEL RODAS CRESPO', 'fernandorodas2018@gmail.com', '0980802673', 'ME GUSTARIA TRABAJAR PARA USTEDES', '3.-HOJA-DE-VIDA-MINISTERIO-MRL.doc', 0, 0),
(387, 'Ana Karen Almada Augsten', 'karenaugsten1110@gmail.com', '0981233699', 'Buen dia\r\nMe encantaria trabajar con ustedes.\r\nEspero la oportunidad.\r\ngracias', 'curriculum vitae_karen augsten.doc', 0, 0),
(388, 'Adrián Hernán Martínez Carballo', 'adrian9000.ahm@gmai.com', '981942470', '', 'Curriculum vitae ADRIAN.pdf', 0, 0),
(389, 'Sarah Diamela Martinez Herrera', 'saradiamela@hotmail.com', '0971269864', 'Buenos días, quisiera formar parte del equipo de trabajo. -', 'curriculum vitae -Sarah Martinez.doc', 0, 0),
(390, 'Luis Enrique Ullón Fernández', 'ullonluis6@gmail.com', '0982254777', 'Buenas!! Estoy interesado en formar parte de su prestigiosa empresa en cualquier puesto que esté disponible, Muchas Gracias!!!', 'CURRICULUM-LUIS ULLON FERNANDEZ.docx', 0, 0),
(391, 'Sergio Rabel Rojas Gomez', 'rabelrojas10@gmail.com', '0985764834', '', 'Rabel Rojas CV ACTUAL.pdf', 0, 0),
(392, 'Patricia Getto', 'paty_getto@hotmail.com', '0984723354', '', 'CV Patricia Getto.pdf', 0, 0),
(393, 'Camila Beatriz Guarie Villaverde', 'camiiguarie77@gmail.com', '0991410625', 'Me gustaría formar parte de la empresa', 'cv41.docx', 0, 0),
(394, 'Pamela Nicole Cristaldo Acosta', 'pamelacristaldo2000@gmail.com', '+595983199639', '', 'curiculum.docx', 0, 0),
(395, 'Elida Yudith Villalba Veloso', 'elivelozo98@gmail.com', '0991 551 128', '', 'Elida Villalba.docx', 0, 0),
(396, 'Liz Romina Amarilla Paiva', 'RominaAmarilla1998@gmail.com', '0982727529', 'Me gustaria ser parte de esta prestigiosa empresa ', 'Liz Amarilla.pdf', 0, 0),
(397, 'Nora Lissett Samaniego Mora', 'noralissett@hotmail.com', '0972987511', '', 'Curriculum - Nora Samaniego.pdf', 0, 0),
(398, 'Alvaro Alexander Martinez Gonzalez', 'alvaromartinez1999@hotmail.es', '0981393032', 'Buenos Días\r\nA través de la presente le envío mis saludos y me presento como postulante.\r\nAdjunto mi currículum para poder ser tenido en cuenta en el proceso de selección. Agradezco mucho su atención. \r\nAtentamente.\r\nAlvaro Martínez', 'CURRICULUM Alvaro 2017.docx', 0, 0),
(399, 'Tania Elizabeth', 'candiavazqueztania@gmail.com', '0993542985', 'Espero una respuesta favorable muchas gracias', 'Documento.docx', 0, 0),
(400, 'Alfredo Manuel Roa Garcete', 'comando.roa@hotmail.com', '0971493738', 'Espero formar parte de su equipo.. desde ya muchas gracias', 'CURRICULUM VITAE ALFREDO ROA.doc', 0, 0),
(401, 'Yennifer Adriana Vargas Maldonado', 'yenniadri@hotmail.es', '0984206445', '', 'Curriculum Vitae.docx', 0, 0),
(402, 'MARTIN ALEXIS ORTIZ MONGELOS', 'martin.ortiz@py.pwc.com', '021- 418-8042', 'Buenos dias por si tengan vacancia en horario nocturno.', 'Curriculum Vitae.docx MO.docx', 0, 0),
(403, 'Berkis torpelis', 'lanegradivina02@hotmail.com', '8r92816241', 'Hola buenas noches para mi será un agrado pertenecer a este exelente equipo de trabajo donde pueda poner en práctica y reforzar mis conocimientos.', 'Berkis Torpelis Pie 3.docx', 0, 0),
(404, 'Jose Mena', 'fullsales.98@gmail.com', '0982285741', 'Mi nombre es Jose Mena. Estoy buscando nuevas oportunidades de desarrollo.\r\n\r\nSoy una persona comprometida con el trabajo, creativa y entusiasta ante los nuevos retos, por ello me gustaría ser considerado para participar en el proceso de selección y colaborar con su equipo de trabajo.\r\n\r\nAgradezco de antemano su atención y me despido enviándole un cordial saludo.\r\n\r\nAtte. José Felix Mena', 'cv jose mena .docx', 0, 0),
(405, 'Rossel Ramon Roman Alonso', 'rosselalonso99@gmail.com', '0972686912', 'busco trabajo', 'Curriculum vitae.docx', 0, 0),
(406, 'Yenny zenaida villalba benitez', 'yennyvillalba75@gmail.com', '0984361685', 'Disponibilidad inmediata', 'yenny (1)-2 (1).docx', 0, 0),
(407, 'Ana Belen Ramirez Ojeda', 'anabelen.ramirez95@gmail.com', '0993569257', 'Buenas Tardes. Me encantaría trabajar con ustedes y por sobre todo con ganas de crecer profesionalmente.', 'Curriculum Belén Original.doc', 0, 0),
(408, 'Viviana Mariel Báez Recalde', 'vivianamariel@hotmail.com', '0984158510', 'Estimado/a:\r\nRRHH, ARGOR\r\n \r\nEs muy grato para mí, enviar en adjunto mi currículo, mi nombre es Viviana Mariel Báez Recalde, estoy en busca de nuevas oportunidades laborales.\r\n \r\nPongo a su consideración mis datos para lo que hubiere lugar.\r\nAtentamente\r\n \r\nViviana Báez', 'CV Viviana Baez.docx', 0, 0),
(409, 'Clara Jannina Almada Sanchez', 'jannina.ninasanchez@gmail.com', '0981359918', '', 'cv nina.docx', 0, 0),
(410, 'Gustavo Adolfo Sánchez Acosta', 'gasanchez74@gmail.com', '+58 4169707403', 'Saludos, sres. \r\n\r\n\r\n      Soy Gustavo Sánchez. Estoy interesado en trabajar con ustedes.\r\n\r\n\r\n       Soy Oficial retirado del Ejército Venezolano, con el grado de Mayor;  Especialista en Seguridad Física de Instalaciones y Personalidades (desde 1997, 20 años de experiencia comprobable en el área).\r\n\r\n     \r\n\r\n       Actualmente estoy en Caracas Venezuela con todos mis documentos debidamente LEGALIZADOS Y APOSTILLADOS, tengo  DISPONIBILIDAD INMEDIATA (llego a Asunción el 18 de enero 2018) para trabajar y radicarme legalmente (Radicación Permanente).\r\n\r\n\r\n       Agradezco me sea tomado en cuenta para este cargo una vez analizado mi CV y la respectiva entrevista. \r\n\r\n\r\n     Atentamente\r\n\r\n                My. Gustavo Sánchez Acosta\r\n\r\n\r\n\r\nWhatssap +58 4169707403\r\n\r\nmail            gasanchez74@gmail.com\r\n\r\nTwitter       @gasanchezacosta', 'CV GUSTAVO SANCHEZ A OCT17.pdf', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `departamento`
--

TRUNCATE TABLE `departamento`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE IF NOT EXISTS `forma_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `forma_pago`
--

TRUNCATE TABLE `forma_pago`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago_productos`
--

DROP TABLE IF EXISTS `forma_pago_productos`;
CREATE TABLE IF NOT EXISTS `forma_pago_productos` (
  `id` int(11) NOT NULL,
  `id_forma_pago` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_locales` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pago_producto_local_idx` (`id_forma_pago`),
  KEY `idx_producto_pago_local_idx` (`id_producto`),
  KEY `idx_local_producto_pago_idx` (`id_locales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `forma_pago_productos`
--

TRUNCATE TABLE `forma_pago_productos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `la_empresa`
--

DROP TABLE IF EXISTS `la_empresa`;
CREATE TABLE IF NOT EXISTS `la_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo1` varchar(160) DEFAULT NULL,
  `contenido1` text,
  `titulo2` varchar(160) DEFAULT NULL,
  `contenido2` text,
  `mision` text,
  `vision` text,
  `valores` text,
  `pas` text,
  `img` varchar(60) DEFAULT NULL,
  `img_pas` varchar(60) DEFAULT NULL,
  `titulo_pas` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `la_empresa`
--

TRUNCATE TABLE `la_empresa`;
--
-- Volcado de datos para la tabla `la_empresa`
--

INSERT INTO `la_empresa` (`id`, `titulo1`, `contenido1`, `titulo2`, `contenido2`, `mision`, `vision`, `valores`, `pas`, `img`, `img_pas`, `titulo_pas`) VALUES
(1, 'Somos expertos desde 1982', 'ARGOR Préstamos Prendarios nace en el año 1982 con su primer local ubicado en el microcentro de la ciudad de Asunción. A partir de varios años de trabajo intenso, la empresa se empieza a expandir y la familia Argor comienza su crecimiento hacia excelencia mediante las innovaciones en forma de realizar préstamos prendarios. ', 'En desarrollo...', '<p>Proximamente...<br></p>', 'Brindar soluciones de calidad a nuestros clientes a través de la experiencia y dedicación, ofreciendo productos y servicio financieros innovadores.', 'Queremos ser una empresa líder que brinde soluciones financieras de manera eficiente, amigable y sustentable, todo esto con un profundo compromiso social con la comunidad.', '<br><ol><li>Respeto al cliente: para crear una relación duradera y sustentable.&nbsp;<br></li><li>Justicia social: es nuestro deber ayudar al prójimo destinando un porcentaje de las ganancias generadas a entidades que beneficien a las personas más vulnerables de la sociedad.&nbsp;<br></li><li>Cumplimiento de las leyes: somos una institución que opera legalmente dando cumplimiento a las normas vigentes.<br></li><li>Ética: es compromiso de todos los que conformamos la empresa mantener una conducta moral intachable tanto a nivel profesional, como también personal.&nbsp;<br></li><li>Flexibilidad: a la hora de buscar la mejor solución para nuestros clientes.&nbsp;<br></li><li>Seguridad: trabajamos para que nuestros clientes puedan utilizar nuestros servicios de manera segura y confiable.<br></li></ol>', 'Para conocer más sobre nuestro programa escribinos a: <a href="mailto:director@argor.com.py" style="color:#fff;">director@argor.com.py</a>', 'bkg-img6.jpg', 'bkg-img7.jpg', 'P.A.S. (<span>Programa de Acción Social</span>) ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

DROP TABLE IF EXISTS `locales`;
CREATE TABLE IF NOT EXISTS `locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tel1` varchar(30) DEFAULT NULL,
  `tel2` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `google_maps` text,
  `img_local` varchar(60) DEFAULT NULL,
  `latitud` varchar(30) DEFAULT NULL,
  `longitud` varchar(30) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Truncar tablas antes de insertar `locales`
--

TRUNCATE TABLE `locales`;
--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `direccion`, `tel1`, `tel2`, `email`, `google_maps`, `img_local`, `latitud`, `longitud`, `mostrar`) VALUES
(1, 'Trinidad', 'Avda. Artigas 356 c/ Sgto. Martinez', '0972-655 115', '', 'administracion@argor.com.py', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.348156557675!2d-57.589693984989324!3d-25.25887108386752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE1JzMxLjkiUyA1N8KwMzUnMTUuMCJX!5e0!3m2!1ses!2s!4v1482452353548" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'trinidad.jpg', '-25.314739', '-57.578377', 1),
(2, 'Guaraní', 'Avda. Eusebio Ayala c/ Calle 1811', '021-203-040', '0986-969-171', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.7645694226594!2d-57.616930170835325!3d-25.302245998990468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE4JzA4LjEiUyA1N8KwMzYnNTkuMCJX!5e0!3m2!1ses!2spy!4v1474117471981" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(3, 'Fdo. de la Mora', 'Avda. Mcal. Estigarribia 779 c/ Angel Torres', '0972-655-117', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.601790491586!2d-57.55313617081005!3d-25.32411478676161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE5JzI2LjgiUyA1N8KwMzMnMDkuMyJX!5e0!3m2!1ses!2spy!4v1474071896159" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(4, 'Lambaré', 'Avda. Cacique Lambare c/ Luis M. Argana', '021-906 435', '0972-655 109', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.849906198238!2d-57.626073685291374!3d-25.342817135660436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDIwJzM0LjIiUyA1N8KwMzcnMjYuMCJX!5e0!3m2!1ses!2spy!4v1474072671569" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(5, 'Sub 27', 'Transchaco 2190 c/ Inmaculada Concepcion', '0976-655 102', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.846006920876!2d-57.546675684989665!3d-25.242111183875352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE0JzMxLjYiUyA1N8KwMzInNDAuMSJX!5e0!3m2!1ses!2s!4v1482452164589" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'sub27.jpg', NULL, NULL, 1),
(6, 'Loma Pyta', 'Transchaco c/ Ttte. Villalba', '0972-655 106', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.6086501914706!2d-57.55551818498947!3d-25.250102983871617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE1JzAwLjQiUyA1N8KwMzMnMTIuMCJX!5e0!3m2!1ses!2s!4v1482452291021" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'loma_pyta.jpg', NULL, NULL, 1),
(7, 'Villa Hayes', 'Elvio de Felipe c/ Espana', '0226-263-004', '0972-655 111', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.392219936766!2d-57.53277878499275!3d-25.088581083946707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDA1JzE4LjkiUyA1N8KwMzEnNTAuMSJX!5e0!3m2!1ses!2s!4v1482451389569" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'villa_hayes.jpg', NULL, NULL, 1),
(8, 'Limpio', 'Ruta 3 Gral. Aquino c/ Monesenor', '0972-655 108', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.888949870691!2d-57.47469238499097!3d-25.173227283907387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDEwJzIzLjYiUyA1N8KwMjgnMjEuMCJX!5e0!3m2!1ses!2s!4v1482449119642" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'limpio.jpg', NULL, NULL, 1),
(9, 'Brasilia', 'Avda. Brasilia c/ El Escudero', '0972-655 120', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.0411456854536!2d-57.599745784988976!3d-25.269201283862692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE2JzA5LjEiUyA1N8KwMzUnNTEuMiJX!5e0!3m2!1ses!2s!4v1482452420617" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'brasilia.jpg', NULL, NULL, 1),
(10, 'Panchito Ruta 1', 'Ruta 1 Km 17 1/2 Capiata', '0972-655 122', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.7645694226594!2d-57.616930170835325!3d-25.302245998990468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE4JzA4LjEiUyA1N8KwMzYnNTkuMCJX!5e0!3m2!1ses!2spy!4v1474117471981" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(11, 'B. Aceval', 'Transchaco y Yegros', '021-272 829', '0972-544 123', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.1051727155277!2d-57.55830288499454!3d-24.99654198398981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDU5JzQ3LjUiUyA1N8KwMzMnMjIuMCJX!5e0!3m2!1ses!2s!4v1482451716454" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'b_aceval2.jpg', NULL, NULL, 1),
(12, 'Km 14 San Lorenzo', 'Ruta 2 Mcal. Estigarribia y Nanawa', '0972-655 124', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.4707784529093!2d-57.498156170835244!3d-25.34170299898934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDIwJzMwLjEiUyA1N8KwMjknNTEuNCJX!5e0!3m2!1ses!2spy!4v1474118769946" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(13, 'Mariano R. Alonso', 'Transchaco Km. 16 c/ Boqueron', '021-750 910', '0972-655 110', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.7031644854696!2d-57.531184685441886!3d-25.21323098388876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDEyJzQ3LjYiUyA1N8KwMzEnNDQuNCJX!5e0!3m2!1ses!2spy!4v1474119302766" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(14, 'Luque', '14 de Mayo Nro. 273', '021-642 832', '0974-491 078', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.7645694226594!2d-57.616930170835325!3d-25.302245998990468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE4JzA4LjEiUyA1N8KwMzYnNTkuMCJX!5e0!3m2!1ses!2spy!4v1474117471981" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(15, 'Nemby', 'Acceso Sur c/ A. de Figueroa a 2 cuadras del Real Acceso Sur', '0974-491 082', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.7645694226594!2d-57.616930170835325!3d-25.302245998990468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDE4JzA4LjEiUyA1N8KwMzYnNTkuMCJX!5e0!3m2!1ses!2spy!4v1474117471981" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(16, 'Villa Elisa', 'Avda. Def. del Chaco c/ M. J. Troche', '0974-491 083', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d901.4349570264116!2d-57.58960317083529!3d-25.346509998989173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDIwJzQ3LjQiUyA1N8KwMzUnMjAuNiJX!5e0!3m2!1ses!2spy!4v1474120784398" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1),
(17, 'San Lorenzo', 'Julia M. Cueto 788 e/ Saturio Rios', '0974-491 084', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1802.9271757445986!2d-57.50659734203096!3d-25.34266799595715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDIwJzMzLjYiUyA1N8KwMzAnMTkuOCJX!5e0!3m2!1ses!2spy!4v1474121142937" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(80) DEFAULT NULL,
  `alt` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `logo`
--

TRUNCATE TABLE `logo`;
--
-- Volcado de datos para la tabla `logo`
--

INSERT INTO `logo` (`id`, `logo`, `alt`) VALUES
(1, 'logo.png', 'Argor Empeños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- Truncar tablas antes de insertar `marca`
--

TRUNCATE TABLE `marca`;
--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`, `imagen`, `estado`) VALUES
(1, 'Vizio', NULL, 1),
(2, 'Epson', NULL, 1),
(3, 'Polk', NULL, 1),
(4, 'Hugo', NULL, 1),
(5, 'BowFlex', NULL, 1),
(6, 'Apple', NULL, 1),
(7, 'Sennheiser', NULL, 1),
(8, 'Dell', NULL, 1),
(9, 'BenQ', NULL, 1),
(10, 'Yamaha', NULL, 1),
(11, 'Scott', NULL, 1),
(12, 'Sthil', NULL, 1),
(13, 'Trapp', NULL, 1),
(14, 'Citizen', NULL, 1),
(15, 'Adidas', NULL, 1),
(16, 'Sony', NULL, 1),
(17, 'Canon', NULL, 1),
(18, 'Samsung', NULL, 1),
(19, 'Tokyo', NULL, 1),
(20, 'Electrolux', NULL, 1),
(21, 'Midas', NULL, 1),
(22, 'Matsui', NULL, 1),
(23, 'Carrier', NULL, 1),
(24, 'Huawei', NULL, 1),
(25, 'Consul', NULL, 1),
(26, 'Philips', NULL, 1),
(27, 'Whirpool', NULL, 1),
(28, 'Rowenta', NULL, 1),
(29, 'Cannondale', NULL, 1),
(30, 'Frigidaire', NULL, 1),
(31, 'White-Westinghouse', NULL, 1),
(32, 'GT', NULL, 1),
(33, 'Moulinex', NULL, 1),
(34, 'Polo Bike', NULL, 1),
(35, 'Caloi', NULL, 1),
(36, 'Trapp', NULL, 1),
(37, 'Panex', NULL, 1),
(38, 'Krups', NULL, 1),
(39, 'Arno', NULL, 1),
(40, 'Eslabon de Lujo', NULL, 1),
(41, 'Remington', NULL, 1),
(42, 'KDK', NULL, 1),
(43, 'Kitchenaid', NULL, 1),
(44, 'Electrolux', NULL, 1),
(45, 'Drean', NULL, 1),
(46, 'Sin Marca', NULL, 1),
(47, 'Fender', NULL, 1),
(48, 'TCL', NULL, 1),
(49, 'NEC', NULL, 1),
(50, 'Fama', NULL, 1),
(51, 'Megasonic', NULL, 1),
(52, 'Makita', NULL, 1),
(53, 'Forest Garden', NULL, 1),
(54, 'Midea', NULL, 1),
(55, 'Vizcaya', NULL, 1),
(56, 'kraft', NULL, 1),
(57, 'Coleman', NULL, 1),
(58, 'Gafa', NULL, 1),
(59, 'Consumer', NULL, 1),
(60, 'Dayo', NULL, 1),
(61, 'Rock Power', NULL, 1),
(62, 'Montana', NULL, 1),
(63, 'Peavey', NULL, 1),
(64, 'Shamsonic', NULL, 1),
(65, 'Crate', NULL, 1),
(66, 'AOC', NULL, 1),
(67, 'Pangao', NULL, 1),
(68, 'Samick', NULL, 1),
(69, 'Oregon', NULL, 1),
(70, 'kodak', NULL, 1),
(71, 'Panasonic', NULL, 1),
(72, 'Olympus', NULL, 1),
(73, 'Megabass', NULL, 1),
(74, 'HP', NULL, 1),
(75, 'Home', NULL, 1),
(76, 'Aspen', NULL, 1),
(77, 'Dako', NULL, 1),
(78, 'Pioner', NULL, 1),
(79, 'Acer', NULL, 1),
(80, 'LG', NULL, 1),
(81, 'Brisa', NULL, 1),
(82, 'Roadstar', NULL, 1),
(83, 'Gladiator', NULL, 1),
(84, 'Driller', NULL, 1),
(85, 'Envision', NULL, 1),
(86, 'Briket', NULL, 1),
(87, 'Golden Ultra', NULL, 1),
(88, 'Partner', NULL, 1),
(89, 'Metalfrio', NULL, 1),
(90, 'Tedesco', NULL, 1),
(91, 'Profield', NULL, 1),
(92, 'Mabe', NULL, 1),
(93, 'Wenco', NULL, 1),
(94, 'Wattsom', NULL, 1),
(95, 'Goodyear', NULL, 1),
(96, 'Symphony', NULL, 1),
(97, 'Lenovo', NULL, 1),
(98, 'Lux', NULL, 1),
(99, 'Infocus', NULL, 1),
(100, 'Mast', NULL, 1),
(101, 'Bee', NULL, 1),
(102, 'Continental', NULL, 1),
(103, 'Bundes', NULL, 1),
(104, 'Gama', NULL, 1),
(105, 'Famastil', NULL, 1),
(106, 'Vestax', NULL, 1),
(107, 'Texas', NULL, 1),
(108, 'Marshall', NULL, 1),
(109, 'Madison', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

DROP TABLE IF EXISTS `moneda`;
CREATE TABLE IF NOT EXISTS `moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `simbolo` varchar(3) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `moneda`
--

TRUNCATE TABLE `moneda`;
--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `simbolo`, `descripcion`, `estado`) VALUES
(1, 'Gs.', 'Guaraní', 1),
(2, '$', 'Dolar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_interes` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `contenido` text,
  `imagen` varchar(255) DEFAULT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `precio` decimal(20,2) DEFAULT NULL,
  `precio_oferta` decimal(20,2) DEFAULT '0.00',
  `stock` int(4) DEFAULT NULL,
  `tags` text,
  `nuevo` int(1) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `youtube_url` varchar(80) DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_categoria_idx` (`id_categoria`),
  KEY `fk_id_marca_idx` (`id_marca`),
  KEY `fk_id_proveedor_idx` (`id_proveedor`),
  KEY `fk_id_interes_idx` (`id_interes`),
  KEY `fk_id_moneda_idx` (`id_moneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Truncar tablas antes de insertar `producto`
--

TRUNCATE TABLE `producto`;
--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_categoria`, `id_marca`, `id_proveedor`, `id_interes`, `codigo`, `nombre`, `descripcion`, `contenido`, `imagen`, `id_moneda`, `precio`, `precio_oferta`, `stock`, `tags`, `nuevo`, `estado`, `youtube_url`, `fecha_fin`, `id_local`) VALUES
(1, 56, 47, NULL, NULL, '363564', 'Amplificador Frontman', NULL, NULL, 'amplificador_fender_363564_5.jpg', 1, '230000.00', '0.00', 1, 'amplificador, fender', 0, 1, NULL, NULL, 5),
(2, 31, 48, NULL, NULL, '393117', 'Notebook Eximia', '<p>14 Pulgadas <br> 2GB de RAM<br>300GB de disco</p>', NULL, 'notebook_tcl_393117_1.jpg', 1, '750000.00', '0.00', 1, 'notebook, tcl, 14 pulgadas', 0, 1, NULL, NULL, 1),
(3, 72, 49, NULL, NULL, '402487', 'Proyector', '<p>Entrada HDMI</p>', NULL, 'proyector_nec_402487_2.jpg', 1, '1200000.00', '0.00', 1, 'proyector, nec, hdmi', 0, 1, NULL, NULL, 2),
(4, 33, 16, NULL, NULL, '347184', 'Equipo de Sonido', '<p>Con Control<br>5100 Watts</p>', NULL, 'equipo_sonido_sony_347184_13.jpg', 1, '750000.00', '0.00', 1, 'equipo de sonido, minicomponente, sony', 0, 1, NULL, NULL, 13),
(5, 24, 50, NULL, NULL, '346947', 'Heladera 2 puertas', '<p>2 puertas, 280 lts</p>', NULL, 'heladera_fama_346947_13.jpg', 1, '1250000.00', '0.00', 1, 'heladera, fama, 2 puertas', 0, 1, NULL, NULL, 13),
(6, 17, 46, NULL, NULL, '352196', 'Caja trio con amplificador', '<p>caja trio p/auto con amplificador de 2400 watts Roadstar</p>', NULL, 'caja_auto_352196_15.jpg', 1, '1000000.00', '0.00', 1, 'caja, auto, parlante', 0, 1, NULL, NULL, 15),
(7, 33, 51, NULL, NULL, '392419', 'Amplificador', '<p>En caja, con entrada usb, tarjeta SD, 3000 watts</p>\r\n', '', 'amplificador_megasonic_392419_14.jpg', 1, '430000.00', '0.00', 1, 'amplificador,audio,usb', 0, 1, NULL, NULL, 14),
(8, 87, 52, NULL, NULL, '397147', 'Pulidora', NULL, NULL, 'pulidora_makita_397147_13.jpg', 1, '450000.00', '0.00', 1, 'pulidora,makita', 0, 1, NULL, NULL, 13),
(9, 87, 52, NULL, NULL, '392127 ', 'Pulidora', NULL, NULL, 'pulidora_makita_392127_14.jpg', 1, '430000.00', '0.00', 1, 'pulidora,makita', 0, 1, NULL, NULL, 14),
(10, 23, 19, NULL, NULL, '347095', 'Centrifugadora', NULL, NULL, 'centrifugadora_tokyo_347095_13.jpg', 1, '280000.00', '0.00', 1, 'centrifugadra,tokyo', 0, 1, NULL, NULL, 13),
(11, 83, 53, NULL, NULL, '378136', 'Hidrolavadora', NULL, NULL, 'hidrolavadora_forestGarden_378136_7.jpg', 1, '250000.00', '0.00', 1, 'hidrolavora, forest garden', 0, 1, NULL, NULL, 7),
(12, 33, 26, NULL, NULL, '375722', 'Equipo de Sonido', '<p>Modelo FWM417/55<br>\r\nCon control</p>', NULL, 'equipo_sonido_philips_375722_6.jpg', 1, '700000.00', '0.00', 1, 'equipo de sonido, minicomponente, philips', 0, 1, NULL, NULL, 6),
(13, 27, 54, NULL, NULL, '375683', 'Microondas', '<p>31 litros</p>', NULL, 'microonda_midea_375683_6.jpg', 1, '350000.00', '0.00', 1, 'microondas, midea', 0, 1, NULL, NULL, 6),
(14, 54, 55, NULL, NULL, '385737', 'Guitarra Popular', '<p>Con estuche</p>', NULL, 'guitarra_popular_viscaya_385737_2.jpg', 1, '250000.00', '0.00', 1, 'guitarra,popular', 0, 1, NULL, NULL, 2),
(15, 24, 25, NULL, NULL, '375586', 'Heladera una Puerta', '<p>300 litros</p>', NULL, 'heladera_consul_375586_6.jpg', 1, '1000000.00', '0.00', 1, 'heladera, consul', 0, 1, NULL, NULL, 6),
(16, 30, 44, NULL, NULL, '397223', 'Cafetera Chef Cafe', '<p>Sistema antigoteo</p>', NULL, 'cafetera_electrolux_397223_13.jpg', 1, '70000.00', '0.00', 1, 'cafetara,cafe,electrolux', 0, 1, NULL, NULL, 13),
(17, 88, 56, NULL, NULL, '346876', 'Lijadora', '<p>76 x 457 mm</p>', NULL, 'lijadora_kraft_346876_13.jpg', 1, '130000.00', '0.00', 1, 'lijadora, kraft', 0, 1, NULL, NULL, 13),
(18, 52, 57, NULL, NULL, '364600', 'Conservadora', NULL, NULL, 'conservadora_coleman_364600_5.jpg', 1, '150000.00', '0.00', 1, 'conservadora,coleman', 0, 1, NULL, NULL, 5),
(19, 33, 26, NULL, NULL, '392425', 'Equipo de Sonido', '<p>sin control, con entrada usb , bandeja de 3 disco , radio AM FM</p>', NULL, 'equipo_sonido_philips_392425_14.jpg', 1, '430000.00', '0.00', 1, 'philips, equipo de sonido', 0, 1, NULL, NULL, 14),
(20, 23, 45, NULL, NULL, '397255', 'Centrifugadora', '<p>5 kg</p>', NULL, 'centrifugadora_drean_397255_13.jpg', 1, '220000.00', '0.00', 1, 'centrifugadora,drean', 0, 1, NULL, NULL, 13),
(21, 23, 58, NULL, NULL, '346841', 'Centrifugadora', '<p> 5 kg</p>', NULL, 'centrifugadora_gafa_346841_13.jpg', 1, '270000.00', '0.00', 1, 'centrifugadora,gafa', 0, 1, NULL, NULL, 13),
(22, 24, 59, NULL, NULL, '377751', 'Frigobar', '<p>90 litros</p>', NULL, 'frigobar_consumer_377751_1.jpg', 1, '700000.00', '0.00', 1, 'frigobar,consumer', 0, 1, NULL, NULL, 1),
(23, 33, 26, NULL, NULL, '378051', 'Minicomponente', '<p>2 Parlantes y 1 bufer, con control, con entrada usb, cd, y Radio</p>', NULL, 'minicomponente_philips_2.1_378051_8.jpg', 1, '420000.00', '0.00', 1, 'minicomponente, philips, 2.1', 0, 1, NULL, NULL, 8),
(24, 20, 60, NULL, NULL, '373017', 'Estufa', '<p>Nuevo</p>', NULL, 'estufa_dayo_373017_16.jpg', 1, '35000.00', '0.00', 1, 'estufa,calefactor,dayo', 1, 1, NULL, NULL, 16),
(25, 23, 19, NULL, NULL, '392923', 'Centrifugadora', '<p>7 kilos</p>', NULL, 'centrifugadora_tokyo_392923_14.jpg', 1, '350000.00', '0.00', 1, 'centrifugadora,tokyo', 0, 1, NULL, NULL, 14),
(26, 17, 61, NULL, NULL, '373301', 'Parlante Ovalado', '<p>1.500 Watts</p>', NULL, 'parlante_ovalado_rockpower_373301_16.jpg', 1, '80000.00', '0.00', 1, 'parlante, ovalado, rock-power', 0, 1, NULL, NULL, 16),
(27, 52, 62, NULL, NULL, '336004', 'Parrilla Portable', '<p>Con accesorios</p>', NULL, 'parrilla_portable_montana_336004_13.jpg', 1, '120000.00', '0.00', 1, 'parrilla, portable, con accesorios, montana', 0, 1, NULL, NULL, 13),
(28, 56, 63, NULL, NULL, '385494', 'Rage 158', NULL, NULL, 'amplificador_peavey_385494_2.jpg', 1, '220000.00', '0.00', 1, 'amplificador,peavey,rage,158', 0, 1, NULL, NULL, 2),
(29, 56, 64, NULL, NULL, '384118', 'Amplificador', NULL, NULL, 'amplificador_shamsonic_384118_2.jpg', 1, '200000.00', '0.00', 1, 'amplificador,shamsonic', 0, 1, NULL, NULL, 2),
(30, 56, 65, NULL, NULL, '385302', 'Amplificador', NULL, NULL, 'amplificador_crate_385302_2.jpg', 1, '400000.00', '0.00', 1, 'amplificador,crate', 0, 1, NULL, NULL, 2),
(31, 31, 18, NULL, NULL, '390758', 'Monitor led 19''', '<p>En caja</p>', NULL, 'led_samsung_19_390758_12.jpg', 1, '270000.00', '0.00', 1, 'monitor,led,samsung', 0, 1, NULL, NULL, 12),
(32, 31, 66, NULL, NULL, '377349', 'Monitor led 19''', NULL, NULL, 'monitor_aoc_19_377349_12.jpg', 1, '220000.00', '0.00', 1, 'monitor,led,aoc', 0, 1, NULL, NULL, 12),
(33, 49, 67, NULL, NULL, '385730', 'Masajeador', '<p>c/ estuche</p>', NULL, 'masajeador_pangao_385730_12.jpg', 1, '110000.00', '0.00', 1, 'masajeador, con estuche', 0, 1, NULL, NULL, 12),
(34, 54, 68, NULL, NULL, '390958', 'Guitarra Eléctrica Samick Art 1958', '<p>Edicion samick Art, 1958</p>', NULL, 'guitarra_electrica_samick_390958_12.jpg', 1, '700000.00', '0.00', 1, 'guitarra,electrica,samick,1958', 0, 1, NULL, NULL, 12),
(35, 73, 69, NULL, NULL, '378102', 'Motosierra Double Guard', '<p>325"</p>', NULL, 'motosierra_oregon_378102_8.jpg', 1, '520000.00', '0.00', 1, 'motosierra,oregon', 0, 1, NULL, NULL, 8),
(36, 17, 46, NULL, NULL, '377943', 'Caja con Bufer y Amplificador', '<p>Caja para auto con bufer pioneer y amplificador de 1800wats con corneta</p>', NULL, 'caja_auto_377943_8.jpg', 1, '700000.00', '0.00', 1, 'caja,auto,amplificador', 0, 1, NULL, NULL, 8),
(37, 32, 16, NULL, NULL, '331586', 'Cyber-Shot', '<p>7.2 Megapixeles</p>', NULL, 'camara_digital_sony_331586_7.jpg', 1, '100000.00', '0.00', 1, 'camara,digital,sony', 0, 1, NULL, NULL, 7),
(38, 32, 70, NULL, NULL, '366386', 'Easyshare', NULL, NULL, 'camara_digital_kodac_366386_7.jpg', 1, '100000.00', '0.00', 1, 'camara,kodak,digital,easyshare', 0, 1, NULL, NULL, 7),
(39, 32, 72, NULL, NULL, '332771', 'T-100', '<p>12 Megapixeles, 3x zoom optico</p>', NULL, 'camara_digital_olympus_332771_7.jpg', 1, '100000.00', '0.00', 1, 'camara,olympus,t-100', 0, 1, NULL, NULL, 7),
(40, 33, 73, NULL, NULL, '365531', 'Caja Amplificada', NULL, NULL, 'caja_amplificadora_megabass_365531_7.jpg', 1, '600000.00', '0.00', 1, 'caja,megabass', 0, 1, NULL, NULL, 7),
(41, 19, 19, NULL, NULL, '375116', 'Split 18.000 BTU', '<p>18.000 BTU</p>', NULL, 'split_18000_375116_7.jpg', 1, '1300000.00', '0.00', 1, 'split,tokyo,18000,btu', 0, 1, NULL, NULL, 7),
(42, 33, 26, NULL, NULL, '383689', 'Equipo de Sonido', '<p>3000Watts con control, USB, Bluetooth</p>', NULL, 'equipo_sonido_philips_383689_12.jpg', 1, '650000.00', '0.00', 1, 'equipo de sonido, philips, audio,usb', 0, 1, NULL, NULL, 12),
(43, 36, 16, NULL, NULL, '324496', 'PlayStation 3 Super Slim', '<p>250gb</p>', NULL, 'ps3_superslim_324496_4.jpg', 1, '680000.00', '0.00', 1, 'play 3, playstation,ps3,play,superslim', 0, 1, NULL, NULL, 4),
(44, 35, 21, NULL, NULL, '385372', 'TV 21''', '<p>sin control</p>', NULL, 'tv_midas_21_385372_4.jpg', 1, '300000.00', '0.00', 1, 'tv,21,midas', 0, 1, NULL, NULL, 4),
(45, 35, 18, NULL, NULL, '385262', 'LCD 22''', '<p>Con Control</p>', NULL, 'lcd_samsung_22_385262_4.jpg', 1, '600000.00', '0.00', 1, 'lcd,tv,samsung,22', 0, 1, NULL, NULL, 4),
(46, 31, 74, NULL, NULL, '385897', 'Notebook', '<p>Procesador AMD E-300,4 gb de ram,500gb de disco</p>', NULL, 'notebook_hp_385897_4.jpg', 1, '1200000.00', '0.00', 1, 'notebook,hp', 0, 1, NULL, NULL, 4),
(47, 46, 75, NULL, NULL, '365166', 'Secador', NULL, NULL, 'secador_home_365166_11.jpg', 1, '110000.00', '0.00', 1, 'secador,pelo,home', 0, 1, NULL, NULL, 11),
(48, 84, 20, NULL, NULL, '389320', 'Aspiradora GT3000 Pro', '<p></p>', NULL, 'aspiradora_electrolux_389320_10.jpg', 1, '580000.00', '0.00', 1, 'aspiradora,gt 3000,gt3000,pro', 0, 1, NULL, NULL, 10),
(49, 49, 76, NULL, NULL, '365079 ', 'Nebulizador Ultrasonico U320', '<p>Tiempo de nebulizaci&oacute;n: 5 min.<br />\r\nIdeal para ni&ntilde;os y adultos.</p>\r\n', '', 'nebulizador_aspen_365079_11.jpg', 1, '130000.00', '0.00', 1, 'nebulizador,aspen,ultrasonico', 0, 1, NULL, NULL, 11),
(50, 24, 77, NULL, NULL, '382737', 'Heladera  1 puerta', '<p>1 Puerta</p>\r\n', '', 'heladera_dako_382737_9.jpg', 1, '800000.00', '0.00', 0, 'heladera,dako,1 puerta', 0, 1, NULL, NULL, 9),
(51, 33, 78, NULL, NULL, '378147', 'Woofer TS-W311D4', '<p><strong>Tama&ntilde;o:&nbsp;&nbsp;</strong>&nbsp;30 cm<br />\r\n<strong>Potencia de M&uacute;sica M&aacute;x. (Nominal)&nbsp;:&nbsp;&nbsp;</strong>&nbsp;1400 W (400 W)<br />\r\n<strong>Respuesta de frecuencia:&nbsp;&nbsp;&nbsp;</strong>&nbsp;20 Hz a 125 Hz', '', 'woofer_pioner_378147_8.jpg', 1, '250000.00', '0.00', 1, 'wooofer,pioner,parlante', 0, 1, NULL, NULL, 8),
(52, 25, 77, NULL, NULL, '385372', 'Cocina 4 Hornallas', '', '<ul>\r\n	<li>- 4 hornallas</li>\r\n	<li>- Blanco</li>\r\n	<li>- Tapa de vidrio</li>\r\n	<li>- Horno visor</li>\r\n	<li>- Con zocalo</li>\r\n	<li>- Mesada inoxidable</li>\r\n	<li>- Auto limpiante</li>\r\n	<li>- Encendido el&eacute;ctrico</li>\r\n	<li>- Luz | Parrilla deslizante</li>\r\n	<li>- Top Grill | Timer</li>\r\n</ul>\r\n', 'cocina_4hornallas_dako_385372_2.jpg', 1, '450000.00', '0.00', 1, 'cocina,dako,4 hornallas', 0, 1, NULL, NULL, 2),
(53, 33, 51, NULL, NULL, '392388', 'Parlante Amplificado', '<p>800 watts con bateria incorporada, con control sin microfono</p>\r\n', '', 'parlante_amplificado_megasonic_392388_14.jpg', 1, '450000.00', '0.00', 0, 'parlante, amplificado, megasonic', 0, 1, NULL, NULL, 14),
(54, 29, 19, NULL, NULL, '349916 ', 'Cocina eléctrica infrarroja', '<p>Nuevo en caja</p>\r\n', '', 'cocina_infrarroja_tokyo_349916_14.jpg', 1, '220000.00', '0.00', 0, 'placa,induccion,tokyo,neuvp', 1, 1, NULL, NULL, 14),
(55, 17, 46, NULL, NULL, '349912 ', 'Caja de audio trio', '<p>Un buffer, un twister, una corneta, sin amplificafor</p>\r\n', '', 'caja_audio_trio_349912_12.jpg', 1, '450000.00', '0.00', 1, 'caja, aut', 0, 1, NULL, NULL, 12),
(56, 31, 79, NULL, NULL, '391010', 'Notebook', '<p>C/cargador, 6 gb memoria de ram, 640 gb memoria de disco, windows 10</p>\r\n', '', 'notebook_acer_391010_12.jpg', 1, '1100000.00', '0.00', 1, 'notebook,acer, con cargador', 0, 1, NULL, NULL, 12),
(57, 33, 80, NULL, NULL, '384249 ', 'Minicomponente ', '<p>2 entradas usb, entrada auxiliar, lector de cd, con dos bafles, sin control</p>\r\n', '', 'minicomponente_lg_384249_12.jpg', 1, '550000.00', '0.00', 1, 'minicomponente,lg,audio', 0, 1, NULL, NULL, 12),
(58, 26, 81, NULL, NULL, '391009 ', 'Horno electrico', '<p>45 litros</p>\r\n', '', 'horno_electrico_brisa_391009_12.jpg', 1, '250000.00', '0.00', 1, 'horno, electrico,brisa', 0, 1, NULL, NULL, 12),
(59, 0, 16, NULL, NULL, '384640 ', 'LCD 32', '<p>&nbsp;con control, entrada audio video, usb, hdm</p>\r\n', '', 'lcd_sony_32_384640_12.jpg', 1, '800000.00', '0.00', 1, 'sony,tv,lcd,hdmi,usb', 0, 1, NULL, NULL, 11),
(60, 76, 44, NULL, NULL, '390764 ', 'Congeladora vertical', '', '', 'congeladora_vertical_390764_12.jpg', 1, '1400000.00', '0.00', 1, 'congeladora,vertical.electrolux', 0, 1, NULL, NULL, 12),
(61, 89, 82, NULL, NULL, '352336', 'Amplificador', '<p>3500 watts</p>\r\n', '', 'amplifcador_infraton_352337_15.jpg', 1, '480000.00', '0.00', 1, 'amplificador, roadstar', 0, 1, NULL, NULL, 15),
(62, 16, 78, NULL, NULL, '352197 ', 'AVH-X1650DVD', '<p>Receptor Multimedia/DVD para AV 2-Din con Pantalla T&aacute;ctil VGA de 6.1&quot;, MIXTRAX, y Control Directo USB para iPod/iPhone y algunos tel&eacute;fonos Android</p>\r\n', '<p><strong>Reproducci&oacute;n:&nbsp;&nbsp;</strong></p>\r\n\r\n<p><strong>DVD</strong></p>\r\n\r\n<p>CD, CD-R , CD-RW<br />\r\nMP3, WMA, WAV, WMV</p>\r\n\r\n<p>DivX/MPEG -1,-2,-4<br />\r\nUSB (trasero)</p>\r\n\r\n<p>iTunes AAC<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>MIXTRAX:</strong></p>\r\n\r\n<p><strong>MIXTRAX EZ para Reproducci&oacute;n de Mezcla Ininterrumpida R&aacute;pida</strong><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Pantalla</strong>:&nbsp;&nbsp;&nbsp;<br />\r\nPantalla de Panel de Toque VGA de 6.1&quot; con luz de fondo LED</p>\r\n\r\n<p>Color Personable (Pantalla de 5 colores y 112 colores de tecla</p>\r\n\r\n<p>Pantalla de idiomas M&uacute;ltiples</p>\r\n\r\n<p><br />\r\n<strong>CARACTER&Iacute;STICAS- CONEXI&Oacute;N</strong>&nbsp;<br />\r\n<strong>Aux-In:&nbsp;&nbsp;</strong>&nbsp;si (frontal)</p>\r\n\r\n<p><strong>RGB in:</strong>&nbsp;si<br />\r\n<strong>Presalidas &nbsp;RCA&nbsp;:&nbsp;&nbsp;</strong>&nbsp;x 3 (2 V)<br />\r\n<strong>Entrada USB:&nbsp;&nbsp;&nbsp;</strong>trasero, 1 Amp&nbsp;<br />\r\n<strong>Preparado para iPod/iPhone:&nbsp;&nbsp;</strong>si, cable requerido</p>\r\n\r\n<p><strong>Preparado para Android:&nbsp;&nbsp;</strong>si, cable requerido</p>\r\n\r\n<p><strong>App Mode:</strong>&nbsp;si</p>\r\n\r\n<p><strong>AppRadio:</strong>&nbsp;si</p>\r\n\r\n<p><strong>MirrorLink:</strong>&nbsp;si, requiere CD-ML100</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CARACTER&Iacute;STICAS- Tuner</strong></p>\r\n\r\n<p><strong>RDS:&nbsp;</strong><strong>si</strong>&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Control de Centro S&oacute;nico:&nbsp;</strong><strong>si</strong><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n<strong>CARACTER&Iacute;STICAS- AUDIO&nbsp;&nbsp;&nbsp;</strong>&nbsp;<br />\r\n<strong>Potencia m&aacute;x de salida:&nbsp;&nbsp;&nbsp;&nbsp;</strong>MOSFET 50W x 4<br />\r\n<strong>Ecualizador:&nbsp;&nbsp;&nbsp;</strong>Ecualizador Gr&aacute;fico de 8 Bandas</p>\r\n\r\n<p><strong>Ecualizador Automatico:</strong>&nbsp;si, requiere CD-MC20</p>\r\n\r\n<p><strong>Restaurador de Sonido Avanzado:</strong>&nbsp;si<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n<strong>CARACTER&Iacute;STICAS- GENERALES&nbsp;</strong></p>\r\n\r\n<p><strong>Control Remoto:</strong><strong>&nbsp;si</strong><br />\r\n<strong>Listo para camera trasera:&nbsp;&nbsp;</strong>&nbsp;si<br />\r\n<strong>Modo display apagado:&nbsp;&nbsp;&nbsp;</strong>si</p>\r\n\r\n<p><strong>Listo para sintonizador de TV Pioneer:</strong>&nbsp;si</p>\r\n\r\n<p><strong>Proyecci&oacute;n de Diapositivas JPEG:</strong>&nbsp;si</p>\r\n', 'autoradio_pioner_352197_15.jpg', 1, '1000000.00', '0.00', 1, 'autoradio,pioner,dvd,usb', 0, 1, NULL, NULL, 15),
(63, 90, 83, NULL, NULL, '352071', 'Soldador Electrónico', '<p>Soldador Electr&oacute;nico de 150 amp</p>\r\n', '', 'soldador_gladiador_352071_15.jpg', 1, '500000.00', '0.00', 1, 'soldador,electronico,gladiator,150amp', 0, 1, NULL, NULL, 15),
(64, 91, 84, NULL, NULL, '387019', 'Caladora', '', '', 'caladora_driller_387019_1.jpg', 1, '120000.00', '0.00', 1, 'caladora, sierra, circular, driller', 0, 1, NULL, NULL, 1),
(65, 31, 85, NULL, NULL, '378075', 'Monitor Led 16', '<p>16 pulgadas</p>\r\n', '', 'led_envision_16_378075_1.jpg', 1, '150000.00', '0.00', 0, 'led, envision,16', 0, 1, NULL, NULL, 1),
(66, 76, 86, NULL, NULL, '370576', 'Congelador', '<p>300 litros</p>\r\n', '', 'congelador_briket_370576_3.jpg', 1, '1500000.00', '0.00', 1, 'congelador, briket', 0, 1, NULL, NULL, 3),
(67, 33, 87, NULL, NULL, '377907', 'Parlante Amplificado', '', '', 'parlante_amplificado_golden_ultra_377907_3.jpg', 1, '550000.00', '0.00', 1, 'parlante, amplificado, activo', 0, 1, NULL, NULL, 3),
(68, 35, 19, NULL, NULL, '370512', 'LCD 21', '<p>con control</p>\r\n', '', 'lcd_21_tokyo_370512_3.jpg', 1, '580000.00', '0.00', 1, 'lcd,tokyo,con control', 0, 1, NULL, NULL, 3),
(69, 92, 88, NULL, NULL, '384851', 'Soplador', '', '', 'template_fondo_productos_2.jpg', 1, '250000.00', '0.00', 1, 'soplador, hojas, partner', 0, 1, NULL, NULL, 2),
(70, 93, 83, NULL, NULL, '385410 ', 'LC 324', '', '', 'pulidora_gladiator_385410_2.jpg', 1, '220000.00', '0.00', 1, 'pulidora,gladiator,para vehiculos,auto', 0, 1, NULL, NULL, 2),
(72, 79, 86, NULL, NULL, '378346', 'Visicooler', '<p>4200 litros</p>\r\n', '', 'visicooler_briket_378346_8.jpg', 1, '2200000.00', '0.00', 1, 'visicooler,briket,4200 litros', 0, 1, NULL, NULL, 8),
(73, 24, 19, NULL, NULL, '392369', 'Heladera 2 puertas', '', '', 'heladera_tokyo_392369_6.jpg', 1, '1200000.00', '0.00', 1, 'heladera,tokyo,2 puertas', 0, 1, NULL, NULL, 6),
(74, 94, 91, NULL, NULL, '375434 ', 'Taladro Martillete', '', '', 'taladro_martillete_profield_375434_6.jpg', 1, '220000.00', '0.00', 1, 'taladro,martillete,profield', 0, 1, NULL, NULL, 6),
(75, 24, 92, NULL, NULL, '363398', 'Heladera 2 puertas', '<p>310 litros</p>\r\n', '', 'heladera_mabe_363398_5.jpg', 1, '1200000.00', '0.00', 1, 'heladera,mabe,2 puertas', 0, 1, NULL, NULL, 5),
(76, 23, 19, NULL, NULL, '349893 ', 'Lavarropas', '<p>8 kilos, 6 programas de lavado, 2 remojo autom&aacute;tico</p>\r\n', '', 'lavarropas_tokyo_349893_14.jpg', 1, '430000.00', '0.00', 1, 'lavarropas,tokyo', 0, 1, NULL, NULL, 11),
(77, 33, 16, NULL, NULL, '390991', 'Minicomponente', '<p>3.100 Watts PMPO<br />\r\nLector de cd,<br />\r\nradio Am y Fm,<br />\r\ncon &nbsp;control</p>\r\n', '', 'minicomponente_3900991_sony_12.jpg', 1, '350000.00', '0.00', 1, 'sony, autoradio, minicomponente', 0, 1, NULL, NULL, 12),
(78, 31, 18, NULL, NULL, '390758', 'Monitor led', '<p>En caja</p>\r\n', '', 'monitor_led_samsung_390758_12.jpg', 1, '270000.00', '0.00', 1, 'monitor, led,samsung', 0, 1, NULL, NULL, 12),
(79, 52, 93, NULL, NULL, '345731', 'Conservadora', '<p>28 Litros</p>\r\n', '', 'conservadora_wenco_345731_13.jpg', 1, '130000.00', '0.00', 1, 'conservadora,wenco,28 litros,lts', 0, 1, NULL, NULL, 13),
(80, 17, 46, NULL, NULL, '359646', 'Caja con Amplificador', '<p>&nbsp;3.000Watts</p>\r\n', '<p>caja,auto,3000,watts,pioner</p>\r\n', 'caja_3000w_359646_17.jpg', 1, '850000.00', '0.00', 1, '', 0, 1, NULL, NULL, 17),
(81, 33, 26, NULL, NULL, '401122', 'Equipo de Sonido', '<p>&nbsp;con control, con 2 Bafles , Puerto USB ,Bluetooth</p>\r\n', '', 'equipo_philips_401122_2.jpg', 1, '850000.00', '0.00', 1, 'equipo de sonido,philips,audio', 0, 1, NULL, NULL, 2),
(82, 27, 19, NULL, NULL, '392452', 'Microondas', '<p>28 litros</p>\r\n', '', 'microondas_tokyo_392452_14.jpg', 1, '280000.00', '0.00', 1, 'microondas,tokyo', 0, 1, NULL, NULL, 11),
(83, 27, 44, NULL, NULL, '392198 ', 'Microondas', '', '', 'microondas_electrolux_392198_14.jpg', 1, '430000.00', '0.00', 1, 'microondas,electrolux,nuevo', 1, 1, NULL, NULL, 14),
(84, 17, 46, NULL, NULL, '372420', 'Caja', '<p>&nbsp;Caja para Auto con 2 wofeer de 12&quot; cornetas y s&uacute;per twitter. Dimensiones L 90&quot; A 67cm</p>\r\n', '', 'caja_auto_372420_16.jpg', 1, '550000.00', '0.00', 1, 'caja,audio,auto', 0, 1, NULL, NULL, 16),
(85, 83, 44, NULL, NULL, '378135', 'Hidrolavadora', '', '', 'hidrolavadora_lux_378135_8.jpg', 1, '380000.00', '0.00', 1, 'hidrolavadra,electrolux', 0, 1, NULL, NULL, 8),
(86, 36, 16, NULL, NULL, '352385 ', 'PS3', '<p>320 Gb con 1 control y conexion</p>\r\n', '', 'ps3_352385_15.jpg', 1, '680000.00', '0.00', 1, 'ps3,sony,consola,video juego', 0, 1, NULL, NULL, 15),
(87, 16, 78, NULL, NULL, '408198 ', 'Autoradio', '<p>Pantalla Tactil WVGA de 6.2&quot;, MIXTRAX, Bluetooth Integrado , y Control Directo USB para iPod/iPhone y algunos telefonos Android</p>\r\n', '<p>Reproducci&oacute;n:&nbsp;&nbsp;</p>\r\n\r\n<p>DVD</p>\r\n\r\n<p>CD, CD-R , CD-RW<br />\r\nMP3, WMA, WAV, WMV</p>\r\n\r\n<p>DivX/MPEG -1,-2,-4<br />\r\nUSB (trasero)</p>\r\n\r\n<p>iTunes AAC</p>\r\n\r\n<p>MIXTRAX:</p>\r\n\r\n<p>MIXTRAX EZ para Reproducci&oacute;n de Mezcla Ininterrumpida R&aacute;pida</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bluetooth:&nbsp;&nbsp;&nbsp;<br />\r\nBluetooth para Lamada de Manos Libres y Audio Inal&aacute;mbrico</p>\r\n\r\n<p>Siri Eyes Free</p>\r\n\r\n<p>SR Air</p>\r\n\r\n<p>Control Directo para iPod/iPhone (USB/Bluetooth)</p>\r\n\r\n<p>Control Directo para Algunos tel&eacute;fonos Android (USB/Bluetooth)</p>\r\n\r\n<p>Pantalla:&nbsp;&nbsp;&nbsp;<br />\r\nPantalla de Panel de Toque WVGA de 6.2&quot; con luz de fondo LED</p>\r\n\r\n<p>Color Personable (Pantalla de 5 colores y 112 colores de tecla</p>\r\n\r\n<p>Pantalla de idiomas M&uacute;ltiples</p>\r\n\r\n<p>Proyecci&oacute;n de Diapositivas JPEG</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nCARACTER&Iacute;STICAS- CONEXI&Oacute;N&nbsp;<br />\r\n<strong>Aux-In:&nbsp;&nbsp;</strong>&nbsp;si (frontal)</p>\r\n\r\n<p><strong>RGB in:</strong>&nbsp;si<br />\r\n<strong>Presalidas de Alto Voltaje&nbsp;:&nbsp;&nbsp;</strong>&nbsp;x 3 (4V)<br />\r\n<strong>Entrada USB:&nbsp;&nbsp;&nbsp;</strong>trasero, 1 Amp</p>\r\n\r\n<p><strong>App Mode:</strong>&nbsp;si</p>\r\n\r\n<p><strong>AppRadio:</strong>&nbsp;si</p>\r\n\r\n<p><strong>MirrorLink Integrado:</strong>&nbsp;si</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CARACTER&Iacute;STICAS- Tuner</p>\r\n\r\n<p>RDS:&nbsp;si&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\nCARACTER&Iacute;STICAS- AUDIO&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n<strong>Potencia m&aacute;x de salida:&nbsp;&nbsp;&nbsp;&nbsp;</strong>MOSFET 50W x 4<br />\r\n<strong>Ecualizador:&nbsp;&nbsp;&nbsp;</strong>Ecualizador Gr&aacute;fico de 13 Bandas</p>\r\n\r\n<p><strong>Ecualizador Autom&aacute;tico y Ajuste Autom&aacute;tico de Tiempo:</strong>&nbsp;si, requiere CD-MC20</p>\r\n\r\n<p><strong>Restaurador de Sonido Avanzado:</strong>&nbsp;si<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\nCARACTER&Iacute;STICAS- GENERALES&nbsp;</p>\r\n\r\n<p>Control Remoto:&nbsp;si<br />\r\n<strong>Listo para camera trasera:&nbsp;&nbsp;</strong>&nbsp;si<br />\r\n<strong>Modo display apagado:&nbsp;&nbsp;&nbsp;</strong>si</p>\r\n', 'autoradio_pioner_408198_5.jpg', 1, '900000.00', '0.00', 1, 'autoradio,pioner,tactil,pantalla', 1, 1, NULL, NULL, 5),
(88, 33, 94, NULL, NULL, '408179 ', 'Amplificador', '<p>350 watts</p>\r\n', '<p>amplificador</p>\r\n', 'amplificador_wattson_408179_5.jpg', 1, '400000.00', '0.00', 0, 'amplificador', 1, 1, NULL, NULL, 5),
(89, 94, 95, NULL, NULL, '391119 ', 'Taladro Percutor', '', '', 'taladro_goodyear_391119_12.jpg', 1, '170000.00', '0.00', 1, 'taladro,percutor,goodyear,good year', 1, 1, NULL, NULL, 12),
(90, 31, 79, NULL, NULL, '391034', 'Notebook', '<p>3 ram 120 de disco Procesador &nbsp;AMD</p>\r\n', '', 'notebook_acer_391034_12.jpg', 1, '700000.00', '0.00', 1, 'notebook,acer,amd', 0, 1, NULL, NULL, 12),
(91, 19, 96, NULL, NULL, '387273 ', 'Aire portatil ', '<p>Con control</p>\r\n', '', 'aire_portatil_symphony_387273_9.jpg', 1, '280000.00', '0.00', 1, 'aire acondicionado, portatil, symphony', 0, 1, NULL, NULL, 9),
(92, 33, 73, NULL, NULL, '389660 ', 'Parlante Karaoke', '', '', 'template_fondo_productos_10.jpg', 1, '480000.00', '0.00', 1, 'parlante,karaoke,megabass', 0, 1, NULL, NULL, 10),
(93, 17, 46, NULL, NULL, '393128', 'Caja de audio', '<p>2 parlantes con amplificador 3000 Watts</p>\r\n', '', 'caja_auto_393128_1.jpg', 1, '800000.00', '0.00', 1, 'auto,parlante,caja,amplificador', 0, 1, NULL, NULL, 1),
(94, 33, 26, NULL, NULL, '385620', 'Equipo de Sonido', '<p>Con control</p>\r\n', '', 'equipo_philips_385620_9.jpg', 1, '650000.00', '0.00', 1, '', 0, 1, NULL, NULL, 9),
(95, 31, 97, NULL, NULL, '390911 ', 'Notebook', '<p>5 de ram, 500 de disco, procesador AMD</p>\r\n', '', 'notebook_lenovo_390911_12.jpg', 1, '1200000.00', '0.00', 1, 'notebook,lenovo', 0, 1, NULL, NULL, 12),
(96, 76, 89, NULL, NULL, '402949', 'Congelador', '<p>165 Litros, para helados</p>\r\n', '', 'freezer_metalfrio_402949_1.jpg', 1, '1800000.00', '0.00', 1, 'helado,congelador,metalfrio', 0, 1, NULL, NULL, 1),
(97, 52, 46, NULL, NULL, '393250', 'Garrafa', '<p>45 Kg.</p>\r\n', '', 'garrafa_45_393250_6.jpg', 1, '550000.00', '0.00', 1, 'garrafa, 45 kilos,kls,gas', 0, 1, NULL, NULL, 1),
(98, 23, 19, NULL, NULL, '393201', 'Lavarropas', '<p>&nbsp;super automatico, 15 kilos</p>\r\n', '', 'lavarropa_tokyo_393201_6.jpg', 1, '1700000.00', '0.00', 1, 'automatico,lavarropas,tokyo', 0, 1, NULL, NULL, 1),
(99, 84, 98, NULL, NULL, '346928', 'AQUACLEAN ROYAL', '<p>polvo/agua, c/ Accesorios</p>\r\n', '', 'aspiradora_lux_346928_13.jpg', 1, '650000.00', '0.00', 1, 'aspiradora,elextrolux,polvo,agua', 0, 1, NULL, NULL, 13),
(100, 72, 99, NULL, NULL, '347155', 'Proyector', '<p>c/control, accesorios, entrada HDMI, USB</p>\r\n', '', 'proyector_infocus_347155_13.jpg', 1, '900000.00', '0.00', 1, 'infocus,proyector', 0, 1, NULL, NULL, 13),
(101, 30, 100, NULL, NULL, '378236 ', 'Licuadora', '', '', 'licuadora_mast_378236_8.jpg', 1, '100000.00', '0.00', 1, 'licuadora,mast', 0, 1, NULL, NULL, 8),
(102, 31, 79, NULL, NULL, '378260', 'Monitor LCD 20', '', '', 'monitor_acer_378260_8.jpg', 1, '120000.00', '0.00', 1, 'monitor,lcd,20,acer', 0, 0, NULL, NULL, 8),
(103, 35, 19, NULL, NULL, '378237', 'LCD  32''', '<p>Con Control</p>\r\n', '', 'lcd_tokyo_378237_8.jpg', 1, '450000.00', '0.00', 1, 'tv,televisor,tokyo,32,pulgadas', 0, 1, NULL, NULL, 8),
(104, 31, 74, NULL, NULL, '378179 ', 'Notebook', '<p>C/ Cargador</p>\r\n', '', 'notebook_hp_378179_8.jpg', 1, '850000.00', '0.00', 1, 'notebook,hp,cargador', 0, 1, NULL, NULL, 8),
(105, 31, 74, NULL, NULL, '378225', 'Notebook', '<p>C/ Cargador</p>\r\n', '', 'notebook_hp_378225_8.jpg', 1, '1000000.00', '0.00', 1, 'notebook,hp,cargador', 0, 1, NULL, NULL, 8),
(106, 26, 101, NULL, NULL, '378263', 'Horno eléctrico', '', '', 'horno_electrico_bee_378263_8.jpg', 1, '230000.00', '0.00', 1, 'horno,electrico,bee', 0, 1, NULL, NULL, 8),
(107, 24, 102, NULL, NULL, '365275 ', 'Heladera 1 puerta', '<p>280litros</p>\r\n', '', 'heladera_continental_365275_11.jpg', 1, '1100000.00', '0.00', 1, 'heladera,1 puerta,puerta,continental,blanco,blanca', 0, 1, NULL, NULL, 11),
(108, 20, 103, NULL, NULL, '365093 ', 'Estufa FH20A', '<p>2.000 WATTS</p>\r\n', '', 'estufa_bundes_365093_11.jpg', 1, '40000.00', '0.00', 1, 'estufa,bundes,2000,watts', 0, 1, NULL, NULL, 11),
(109, 27, 44, NULL, NULL, '365279 ', 'Microondas Digital', '<p>20 Litros</p>\r\n', '', 'microondas_electrolux_blanco_365279_11.jpg', 1, '280000.00', '0.00', 1, 'microondas,electrolux,digital,20,litros', 0, 1, NULL, NULL, 11),
(110, 30, 106, NULL, NULL, '364724', 'Pizzera', '', '', 'pizzera_vestax_364724_11.jpg', 1, '120000.00', '0.00', 1, 'pizzera,pizza,vestax', 0, 1, NULL, NULL, 11),
(111, 35, 22, NULL, NULL, '365052 ', 'TV 21"', '', '', 'tv_21_matsui_364646_11.jpg', 1, '370000.00', '0.00', 1, 'tv,televisor,matsui,pulgada,21', 0, 1, NULL, NULL, 11),
(112, 94, 105, NULL, NULL, '365199', 'Taladro', '<p>A bater&iacute;a</p>\r\n', '', 'taladro_fmastil_365199_11.jpg', 1, '150000.00', '0.00', 1, 'taladro,bateria,famastil', 0, 1, NULL, NULL, 11),
(113, 54, 107, NULL, NULL, '369115', 'Guitarra Electrica ', '', '', 'guitarra_electrica_369115_3.jpg', 1, '450000.00', '0.00', 1, 'guitarra,electrica,texas', 0, 1, NULL, NULL, 3),
(114, 56, 108, NULL, NULL, '402193', 'Amplificador 30fx', '', '', 'amplificador_marshall_30fx_402193_2.jpg', 1, '580000.00', '0.00', -1, 'amplificador,marshall,30fx,sonido', 0, 1, NULL, NULL, 2),
(115, 52, 46, NULL, NULL, '378230 ', 'Garrafa', '<p>13 Kilos</p>\r\n', '<p>Garrada 13kg</p>\r\n', 'garrafa_13k_378230_8.jpg', 1, '250000.00', '0.00', 1, 'garrada,13k, gas', 0, 1, NULL, NULL, 8),
(116, 33, 109, NULL, NULL, '385025', 'Microfonos inalambrico', '<p>En caja</p>\r\n', '', 'microfino_inalambrico_385025_2.jpg', 1, '350000.00', '0.00', 1, 'microfono, inalambric', 0, 1, NULL, NULL, 2),
(117, 24, 25, NULL, NULL, '399222', 'Heladera 1 puerta', '', '', 'heladera_consul_399222_4.jpg', 1, '1000000.00', '0.00', 1, 'heladera,consul,1 puerta,puerta', 0, 1, NULL, NULL, 4),
(118, 31, 66, NULL, NULL, '378258', 'Monitor 18"', '', '', 'monitor_aoc_18_378258_8.jpg', 1, '150000.00', '0.00', 1, 'aoc, monitor,18 pulgadas,pulgadas', 0, 1, NULL, NULL, 8),
(119, 17, 46, NULL, NULL, '392290', 'Caja con Amplificador', '<p>Caja con un woofer , corneta y twitter con amplificador roadstar de 2400 watts&nbsp;</p>\r\n', '', 'template_fondo_productos_14.jpg', 1, '650000.00', '0.00', 1, 'caja,amplificador,twitter,2400 watts,watts,rms,roadstar', 0, 1, NULL, NULL, 14),
(120, 52, 46, NULL, NULL, '389785 ', 'Garrafa', '<p>13 Kg.</p>\r\n', '', 'garrafa_389785_13k_10.jpg', 1, '250000.00', '0.00', 1, 'garrafa,13 kilos,kilos,k,gas', 0, 1, NULL, NULL, 10),
(121, 31, 74, NULL, NULL, '389152 ', 'Notebook', '<p>3 gb ram 360 disco duro c/cargador</p>\r\n', '', 'notebook_hp_389152_10.jpg', 1, '750000.00', '0.00', 1, 'notebook,hp,cargador', 0, 1, NULL, NULL, 10),
(122, 87, 91, NULL, NULL, '394930', 'Pulidora', '', '', 'pulidora_profield_394930_7.jpg', 1, '130000.00', '0.00', 1, 'pulidora,profield', 0, 1, NULL, NULL, 7),
(123, 30, 19, NULL, NULL, '394448', 'Plancha', '', '', 'plancha_tokyo_394448_7.jpg', 1, '50000.00', '0.00', 1, 'plancha,tokyo', 0, 1, NULL, NULL, 7),
(124, 33, 46, NULL, NULL, '393179', 'Parlante de 15 golpe seco', '', '', 'caja_audio_15_393179_1.jpg', 1, '380000.00', '0.00', 1, 'parlante,caja de audio,golpe seco,15 pulgadas', 0, 1, NULL, NULL, 1),
(125, 17, 78, NULL, NULL, '378147', 'Woofer ', '<p>1400 watts, doble vovina</p>\r\n', '', 'woofer_pioner_378147_1.jpg', 1, '250000.00', '0.00', 1, 'woofer,pioner,doble vovina,1400,watts', 0, 1, NULL, NULL, 1),
(126, 35, 79, NULL, NULL, '393363', 'TV 21"', '<p>sin control, 21 pulgadas</p>\r\n', '', 'tv_21_tokyo_393363_1.jpg', 1, '350000.00', '0.00', 1, 'tv, television, sin control,21 pulgadas', 0, 1, NULL, NULL, 1),
(127, 26, 22, NULL, NULL, '393349', 'Horno electrico', '<p>70 litros</p>\r\n', '', 'horno_electrico_393349_matsui_1.jpg', 1, '500000.00', '0.00', 1, 'horno, electrico,70,litros,matsui', 0, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL,
  `contenido` text,
  `precio` int(20) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Truncar tablas antes de insertar `productos`
--

TRUNCATE TABLE `productos`;
--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `img`, `contenido`, `precio`, `mostrar`) VALUES
(4, 2, 'Prueba', 'camaras.jpg', 'Contenido de prueba 2', 20000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_locales`
--

DROP TABLE IF EXISTS `producto_locales`;
CREATE TABLE IF NOT EXISTS `producto_locales` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_locales` int(11) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `precio` decimal(20,2) DEFAULT NULL,
  `precio_oferta` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_locales_producto_idx` (`id_locales`),
  KEY `idx_producto_locales_idx` (`id_producto`),
  KEY `idx_moneda_producto_local_idx` (`id_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `producto_locales`
--

TRUNCATE TABLE `producto_locales`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_seleccionado`
--

DROP TABLE IF EXISTS `producto_seleccionado`;
CREATE TABLE IF NOT EXISTS `producto_seleccionado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_seccion_producto` int(11) NOT NULL,
  `orden` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_producto_mv_idx` (`id_producto`),
  KEY `fk_id_seccion_index_mv_idx` (`id_seccion_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Truncar tablas antes de insertar `producto_seleccionado`
--

TRUNCATE TABLE `producto_seleccionado`;
--
-- Volcado de datos para la tabla `producto_seleccionado`
--

INSERT INTO `producto_seleccionado` (`id`, `id_producto`, `id_seccion_producto`, `orden`) VALUES
(1, 92, 1, 1),
(2, 88, 1, 2),
(3, 87, 1, 3),
(4, 86, 1, 4),
(5, 5, 2, 1),
(6, 6, 4, 1),
(7, 22, 2, 2),
(8, 13, 2, 3),
(9, 91, 4, 2),
(10, 37, 3, 1),
(11, 38, 3, 2),
(12, 39, 3, 3),
(13, 89, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncar tablas antes de insertar `proveedor`
--

TRUNCATE TABLE `proveedor`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

DROP TABLE IF EXISTS `redes_sociales`;
CREATE TABLE IF NOT EXISTS `redes_sociales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `img` varchar(60) DEFAULT NULL,
  `url` varchar(120) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Truncar tablas antes de insertar `redes_sociales`
--

TRUNCATE TABLE `redes_sociales`;
--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id`, `descripcion`, `img`, `url`, `mostrar`) VALUES
(1, 'Facebook', 'fa fa-facebook-square', '#', 1),
(2, 'Twitter', 'fa fa-twitter', '#', 1),
(3, 'Instagram', 'fa fa-instagram', '#', 1),
(4, 'Dribbble', 'fa fa-dribbble', '#', 0),
(5, 'Flickr', 'fa fa-flickr', '#', 0),
(6, 'YouTube', 'fa fa-youtube', '#', 1),
(7, 'Pinterest', 'fa fa-pinterest-square', '#', 0),
(8, 'Skype', 'fa fa-skype', '#', 0),
(9, 'Linkedin', 'fa fa-linkedin-square', '#', 1),
(10, 'Google +', 'fa fa-google-plus', '#', 0),
(11, 'Tumblr', 'fa fa-tumblr-square', '#', 0),
(12, 'Vimeo', 'fa fa-vimeo-square', '#', 0),
(13, 'SoundCloud', 'fa fa-soundcloud', '#', 0),
(14, 'Reddit', 'fa fa-reddit-square', '#', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remate`
--

DROP TABLE IF EXISTS `remate`;
CREATE TABLE IF NOT EXISTS `remate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(180) DEFAULT NULL,
  `fecha_remate` datetime DEFAULT NULL,
  `contenido` text,
  `fecha` datetime DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `remate`
--

TRUNCATE TABLE `remate`;
--
-- Volcado de datos para la tabla `remate`
--

INSERT INTO `remate` (`id`, `titulo`, `fecha_remate`, `contenido`, `fecha`, `mostrar`) VALUES
(1, 'Próximo Remate:', '2017-12-09 00:00:00', '', '2015-12-13 12:48:43', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secciones` varchar(60) NOT NULL,
  `url_amigable` varchar(80) NOT NULL,
  `titulo_pagina` varchar(160) DEFAULT NULL,
  `descripcion_pagina` varchar(255) DEFAULT NULL,
  `keywords_pagina` varchar(255) DEFAULT NULL,
  `mostrar` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Truncar tablas antes de insertar `secciones`
--

TRUNCATE TABLE `secciones`;
--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `secciones`, `url_amigable`, `titulo_pagina`, `descripcion_pagina`, `keywords_pagina`, `mostrar`) VALUES
(1, 'inicio', '/', 'Inicio - Argor - Préstamos Prendarios - Remates | Paraguay', '¡Empeña fácil, rápido y seguro!', 'empeña, empeños, argor, tu mejor opcion, facil, rapido, seguro, dinero, el interes mas bajo, mayor tiempo de espera', 1),
(2, 'la empresa', 'empresa', 'La Empresa - Argor - Préstamos Prendarios - Remates | Paraguay', 'Argor te ofrece interés más bajo del mercado. Vení a cualquiera de nuestras  sucursales para comprobarlo. ', 'argor, empeños, empenos, empresa', 1),
(3, 'ofertas', 'ofertas', 'Ofertas - Argor - Préstamos Prendarios - Remates | Paraguay', 'La tasa de interes es fija y en guaraníes.  ¡Sin recargos por mora!', 'ofertas, promociones, argor, prestamos, remates', 1),
(4, 'sucursales', 'sucursales', 'Sucursales - Argor - Préstamos Prendarios - Remates | Paraguay', 'En Argor te damos préstamos prendarios sobre Oro, Joyas, Electrodomésticos, Herramientas', 'sucursales, argor', 1),
(5, 'trabaja con nosotros', 'trabaja-con-nosotros', 'Trabaja con Nosotros - Argor - Préstamos Prendarios - Remates | Paraguay', '¿Necesitas una solución urgente a tus problemas?', 'trabaja, empenos, argor', 1),
(6, 'contacto', 'contacto', 'Contacto - Argor - Préstamos Prendarios - Remates | Paraguay', '¿Estás listo para empeñar?', 'contacto, contactanos, argor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_producto`
--

DROP TABLE IF EXISTS `seccion_producto`;
CREATE TABLE IF NOT EXISTS `seccion_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Truncar tablas antes de insertar `seccion_producto`
--

TRUNCATE TABLE `seccion_producto`;
--
-- Volcado de datos para la tabla `seccion_producto`
--

INSERT INTO `seccion_producto` (`id`, `descripcion`, `estado`) VALUES
(1, 'Más Vistos', 1),
(2, 'Electrodomésticos', 1),
(3, 'Climatización', 1),
(4, 'Varios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_1`
--

DROP TABLE IF EXISTS `section_1`;
CREATE TABLE IF NOT EXISTS `section_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `encabezado_1` varchar(180) DEFAULT NULL,
  `encabezado_2` varchar(180) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_1`
--

TRUNCATE TABLE `section_1`;
--
-- Volcado de datos para la tabla `section_1`
--

INSERT INTO `section_1` (`id`, `titulo`, `encabezado_1`, `encabezado_2`, `mostrar`) VALUES
(1, '¿Necesitás Dinero?', 'Argor Empeños te ofrece lo que estas buscando:', '¡El interés más bajo del mercado!', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_1_lista`
--

DROP TABLE IF EXISTS `section_1_lista`;
CREATE TABLE IF NOT EXISTS `section_1_lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(60) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `contenido` text,
  `enlace` varchar(60) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  `fa_icon` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Truncar tablas antes de insertar `section_1_lista`
--

TRUNCATE TABLE `section_1_lista`;
--
-- Volcado de datos para la tabla `section_1_lista`
--

INSERT INTO `section_1_lista` (`id`, `img`, `titulo`, `contenido`, `enlace`, `mostrar`, `fa_icon`) VALUES
(1, 'heart-white.png', '¿Problemas de dinero? Olvidate...', '<p>\r\n                        En Argor empeños contamos con nuestro local abierto las 24 horas. Domingos y feriados. <br></p>', '#', 1, '<i class="fa fa-money listIndexFA" aria-hidden="true"></i>'),
(2, 'leaf-white.png', 'Prestamos prendarios sobre', '<p>\r\n                        Electrodomésticos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instrumentos musicales<br>\r\n                        Oro<br>\r\n                        Herramientas</p><p>y todo objeto de valor.<br></p>', '#', 1, '<i class="fa fa-camera listIndexFA" aria-hidden="true"></i>'),
(3, 'money-bag-white.png', 'Comprá tus electrodomésticos', '<p>pagando mucho menos. En Argor tenemos los mejores precios y la mejor calidad en mercaderias.<br></p>', '#', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_2`
--

DROP TABLE IF EXISTS `section_2`;
CREATE TABLE IF NOT EXISTS `section_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `encabezado` varchar(180) DEFAULT NULL,
  `contenido` text,
  `img1` varchar(30) DEFAULT NULL,
  `img2` varchar(30) DEFAULT NULL,
  `enlace` varchar(60) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_2`
--

TRUNCATE TABLE `section_2`;
--
-- Volcado de datos para la tabla `section_2`
--

INSERT INTO `section_2` (`id`, `titulo`, `encabezado`, `contenido`, `img1`, `img2`, `enlace`, `mostrar`) VALUES
(1, 'Somos expertos desde 1982', '<h5>ARGOR Préstamos Prendarios cuenta con 35 años de experiencia, brindando soluciones rápidas, confiables y seguras a nuestros clientes.<br></h5>', '<p>En desarrollo... <br></p>', 'bkg-img1.jpg', 'bkg-img2.jpg', 'empresa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_3`
--

DROP TABLE IF EXISTS `section_3`;
CREATE TABLE IF NOT EXISTS `section_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `enlace` varchar(120) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_3`
--

TRUNCATE TABLE `section_3`;
--
-- Volcado de datos para la tabla `section_3`
--

INSERT INTO `section_3` (`id`, `titulo`, `enlace`, `img`, `mostrar`) VALUES
(1, 'Nuestras Ventajas', '#', 'bkg-img3.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_3_lista`
--

DROP TABLE IF EXISTS `section_3_lista`;
CREATE TABLE IF NOT EXISTS `section_3_lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Truncar tablas antes de insertar `section_3_lista`
--

TRUNCATE TABLE `section_3_lista`;
--
-- Volcado de datos para la tabla `section_3_lista`
--

INSERT INTO `section_3_lista` (`id`, `descripcion`) VALUES
(1, 'Más meses de espera. Retirá cuando puedas...'),
(2, 'Pagás tu interes cuando quieras y en cualquiera de nuestras suscursales'),
(3, 'Nuestra tasa es fija y en guaraníes.'),
(4, 'Empeña Tranquilo, ¡contamos con seguro contra todo riesgo!'),
(5, 'Resguardo total, en <strong>Argor</strong> cuidamos tus cosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_4`
--

DROP TABLE IF EXISTS `section_4`;
CREATE TABLE IF NOT EXISTS `section_4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `encabezado` varchar(255) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_4`
--

TRUNCATE TABLE `section_4`;
--
-- Volcado de datos para la tabla `section_4`
--

INSERT INTO `section_4` (`id`, `titulo`, `encabezado`, `mostrar`) VALUES
(1, '¡Vení <span>y</span> comprobá!', 'En cualquiera de nuestras sucursales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_5`
--

DROP TABLE IF EXISTS `section_5`;
CREATE TABLE IF NOT EXISTS `section_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `contenido` text,
  `texto_enlace` varchar(80) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  `nro_whatsapp` varchar(30) DEFAULT NULL,
  `texto_whatsapp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_5`
--

TRUNCATE TABLE `section_5`;
--
-- Volcado de datos para la tabla `section_5`
--

INSERT INTO `section_5` (`id`, `titulo`, `contenido`, `texto_enlace`, `img`, `mostrar`, `nro_whatsapp`, `texto_whatsapp`) VALUES
(1, '¿Estás listo para empeñar?', '<p>\n                    Ahora es mucho más fácil tasar tus productos, para ello nos amigamos con la tecnología y ya puedes tasar tus productos enviándonos una foto del mismo.</p>', 'Tasar Ahora', 'bkg-img4.jpg', 1, '0974-530000', 'Obten una tasación al instante con un simple mensaje de Whatsapp. Envia YA las fotos de lo quieras tasar!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_6`
--

DROP TABLE IF EXISTS `section_6`;
CREATE TABLE IF NOT EXISTS `section_6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(180) DEFAULT NULL,
  `contenido` text,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_6`
--

TRUNCATE TABLE `section_6`;
--
-- Volcado de datos para la tabla `section_6`
--

INSERT INTO `section_6` (`id`, `titulo`, `contenido`, `mostrar`) VALUES
(1, 'Préstamos Prendarios', 'En Argor te damos préstamos prendarios sobre Oro, Joyas, Electrodomésticos, Herramientas y todo tipo de objeto de valor. Además rescatamos tu empeño de otras casas.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section_7`
--

DROP TABLE IF EXISTS `section_7`;
CREATE TABLE IF NOT EXISTS `section_7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `nombre_sucursal` varchar(80) DEFAULT NULL,
  `datos_sucursal` text,
  `texto_sucursal` varchar(160) DEFAULT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `section_7`
--

TRUNCATE TABLE `section_7`;
--
-- Volcado de datos para la tabla `section_7`
--

INSERT INTO `section_7` (`id`, `titulo`, `contenido`, `nombre_sucursal`, `datos_sucursal`, `texto_sucursal`, `mostrar`) VALUES
(1, '¿Necesitas una solución urgente a tus problemas?', 'Nosotros te la brindamos. ABRIMOS LAS 24 HORAS', 'Sucursal Asunción', 'Avda. Eusebio Ayala c/ Calle 1811<br>Teléfono: 203 040<br>Domingos y feriados<br><br>', 'Abierto las 24 horas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(180) NOT NULL,
  `mostrar` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Truncar tablas antes de insertar `tags`
--

TRUNCATE TABLE `tags`;
--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `descripcion`, `mostrar`) VALUES
(1, 'Empeños', 1),
(2, '24 Horas', 1),
(3, 'interés bajo', 1),
(4, 'dinero', 1),
(5, 'empeñar', 1),
(6, 'comprar a cuotas', 1),
(7, '5 meses de espera', 1),
(8, 'paga cuando quieras', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabaja_con_nosotros`
--

DROP TABLE IF EXISTS `trabaja_con_nosotros`;
CREATE TABLE IF NOT EXISTS `trabaja_con_nosotros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `contenido` text,
  `encabezado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `trabaja_con_nosotros`
--

TRUNCATE TABLE `trabaja_con_nosotros`;
--
-- Volcado de datos para la tabla `trabaja_con_nosotros`
--

INSERT INTO `trabaja_con_nosotros` (`id`, `titulo`, `contenido`, `encabezado`) VALUES
(1, 'Trabajá con nosotros', '&lt;p&gt;Estamos felices de saber que querés ser parte de nuestro equipo!. Envíanos tus datos y adjuntanos tu CV y pronto estaremos en contacto.&lt;/p&gt;', 'Envíanos tus datos y adjuntá tu CV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(80) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  `verificado` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `users`
--

TRUNCATE TABLE `users`;
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `user`, `pass`, `img`, `verificado`) VALUES
(1, 'raul@imagenwebhq.com', 'master', 'master', '$2a$07$4KF2FF3E07CA59AHCFH2J.apWPqFpUkUmf7Z.wGkiMQDaqfw7bRG2', 'logo-iweb.png', 1),
(2, 'maurichristian@outlook.com', 'Administrador', 'admin', '$2a$07$I31CC3A20JC.1I4AHG./3.7vyAeeOxohgv.jOkUIu/nVlK5fo6uQ2', 'blank-profile.png', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_id_departamento_c` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion_moneda`
--
ALTER TABLE `cotizacion_moneda`
  ADD CONSTRAINT `fk_moneda_id_cm` FOREIGN KEY (`id_moneda`) REFERENCES `moneda` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
