-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2017 a las 23:07:17
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `inc_id` int(4) NOT NULL,
  `inc_fecha_incidencia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inc_fecha_solucion` datetime NOT NULL,
  `inc_fin` enum('No','Si') NOT NULL,
  `usu_user` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `rec_id` int(4) NOT NULL,
  `inc_descripcion` varchar(280) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`inc_id`, `inc_fecha_incidencia`, `inc_fecha_solucion`, `inc_fin`, `usu_user`, `rec_id`, `inc_descripcion`) VALUES
(18, '2017-11-17 15:33:48', '2017-11-17 15:37:35', 'Si', 'cfernandez', 1, ''),
(19, '2017-11-17 15:37:57', '2017-11-17 15:38:04', 'Si', 'cfernandez', 1, ''),
(20, '2017-11-17 15:38:00', '2017-11-17 15:38:05', 'Si', 'cfernandez', 2, ''),
(21, '2017-11-17 15:44:02', '2017-11-17 15:44:09', 'Si', 'cfernandez', 15, ''),
(22, '2017-11-17 15:53:07', '2017-11-17 15:53:14', 'Si', 'cfernandez', 1, ''),
(23, '2017-11-17 15:53:09', '2017-11-17 15:53:15', 'Si', 'cfernandez', 2, ''),
(24, '2017-11-17 15:53:12', '2017-11-17 15:53:16', 'Si', 'cfernandez', 3, ''),
(25, '2017-11-17 17:46:51', '2017-12-17 01:03:20', 'Si', 'cfernandez', 4, ''),
(26, '2017-12-17 01:04:42', '2017-12-17 01:10:05', 'Si', 'cfernandez', 1, 'no va'),
(27, '2017-12-17 01:13:01', '2017-12-17 01:13:42', 'Si', 'administrador', 2, ''),
(28, '2017-12-17 01:14:51', '2017-12-17 01:15:47', 'Si', 'administrador', 1, ''),
(29, '2017-12-17 01:14:51', '2017-12-17 01:15:50', 'Si', 'aplanssss', 2, ''),
(30, '2017-12-17 01:14:51', '2017-12-17 01:15:52', 'Si', 'ccardenas', 3, ''),
(31, '2017-12-17 01:14:51', '2017-12-17 01:15:54', 'Si', 'cfernandez', 4, ''),
(32, '2017-12-17 01:14:51', '2017-12-17 01:15:56', 'Si', 'dmarin', 5, ''),
(35, '2017-12-17 01:46:32', '2017-12-17 01:46:56', 'Si', 'cfernandez', 1, ''),
(36, '2017-12-17 01:50:01', '2017-12-17 01:57:42', 'Si', 'cfernandez', 1, ''),
(37, '2017-12-17 01:56:09', '2017-12-17 01:57:44', 'Si', 'cfernandez', 2, ''),
(38, '2017-12-17 01:56:11', '2017-12-17 01:57:46', 'Si', 'cfernandez', 2, ''),
(39, '2017-12-17 01:56:11', '2017-12-17 01:57:47', 'Si', 'cfernandez', 2, ''),
(40, '2017-12-17 01:56:11', '2017-12-17 01:57:50', 'Si', 'cfernandez', 2, ''),
(41, '2017-12-17 01:56:11', '2017-12-17 01:57:51', 'Si', 'cfernandez', 2, ''),
(42, '2017-12-17 01:56:11', '2017-12-17 01:57:53', 'Si', 'cfernandez', 2, ''),
(43, '2017-12-17 01:56:11', '2017-12-17 01:57:55', 'Si', 'cfernandez', 2, ''),
(44, '2017-12-17 01:56:11', '2017-12-17 01:57:57', 'Si', 'cfernandez', 2, ''),
(45, '2017-12-17 01:56:11', '2017-12-17 01:58:03', 'Si', 'cfernandez', 2, ''),
(46, '2017-12-17 01:56:11', '2017-12-17 01:58:05', 'Si', 'cfernandez', 2, ''),
(47, '2017-12-17 01:56:13', '2017-12-17 01:58:07', 'Si', 'cfernandez', 2, ''),
(48, '2017-12-17 01:56:13', '2017-12-17 01:58:26', 'Si', 'cfernandez', 2, ''),
(49, '2017-12-17 01:56:13', '2017-12-17 01:58:26', 'Si', 'cfernandez', 2, ''),
(50, '2017-12-17 01:56:13', '2017-12-17 01:58:26', 'Si', 'cfernandez', 2, ''),
(51, '2017-12-17 01:56:13', '2017-12-17 01:58:26', 'Si', 'cfernandez', 2, ''),
(52, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(53, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(54, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(55, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(56, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(57, '2017-12-17 01:56:21', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(58, '2017-12-17 01:56:23', '2017-12-17 01:58:27', 'Si', 'cfernandez', 2, ''),
(59, '2017-12-17 01:56:23', '2017-12-17 01:58:28', 'Si', 'cfernandez', 2, ''),
(60, '2017-12-17 01:56:23', '2017-12-17 01:58:28', 'Si', 'cfernandez', 2, ''),
(61, '2017-12-17 01:56:23', '2017-12-17 01:58:28', 'Si', 'cfernandez', 2, ''),
(62, '2017-12-17 01:57:25', '2017-12-17 01:58:28', 'Si', 'cfernandez', 3, ''),
(63, '2017-12-17 01:57:27', '2017-12-17 01:58:28', 'Si', 'cfernandez', 3, ''),
(64, '2017-12-17 01:57:27', '2017-12-17 01:58:28', 'Si', 'cfernandez', 3, ''),
(65, '2017-12-17 01:57:27', '2017-12-17 01:58:28', 'Si', 'cfernandez', 3, ''),
(66, '2017-12-17 01:57:27', '2017-12-17 01:58:28', 'Si', 'cfernandez', 3, ''),
(67, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(68, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(69, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(70, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(71, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(72, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(73, '2017-12-17 01:57:27', '2017-12-17 01:58:29', 'Si', 'cfernandez', 3, ''),
(74, '2017-12-17 01:57:27', '2017-12-17 01:58:30', 'Si', 'cfernandez', 3, ''),
(75, '2017-12-17 01:57:27', '2017-12-17 01:58:30', 'Si', 'cfernandez', 3, ''),
(76, '2017-12-17 01:57:27', '2017-12-17 01:58:30', 'Si', 'cfernandez', 3, ''),
(77, '2017-12-17 01:58:41', '2017-12-17 02:01:23', 'Si', 'cfernandez', 1, ''),
(78, '2017-12-17 02:01:05', '2017-12-17 02:01:23', 'Si', 'cfernandez', 2, ''),
(79, '2017-12-17 02:01:11', '2017-12-17 02:01:23', 'Si', 'cfernandez', 3, ''),
(80, '2017-12-18 00:00:46', '2017-12-18 00:00:53', 'Si', 'cfernandez', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `rec_id` int(4) NOT NULL,
  `rec_nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rec_estado` enum('Disponible','Deshabilitado','Averiado') COLLATE utf8mb4_spanish_ci NOT NULL,
  `rec_tipo` enum('Aulas','Despachos/Salas','Material de trabajo') COLLATE utf8mb4_spanish_ci NOT NULL,
  `rec_desc` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `resc_foto` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`rec_id`, `rec_nombre`, `rec_estado`, `rec_tipo`, `rec_desc`, `resc_foto`) VALUES
(1, 'Aula 101', 'Disponible', 'Aulas', 'Aula teorica con proyetor', 'aula101.jpg'),
(2, 'Aula 102', 'Disponible', 'Aulas', 'Aula teorica', 'aula102.jpg'),
(3, 'Aula 103', 'Disponible', 'Aulas', 'Aula teorica con proyector', 'aula103.jpg'),
(4, 'Aula 104', 'Disponible', 'Aulas', 'Aula informatica', 'aula104.jpg'),
(5, 'Aula 105', 'Disponible', 'Aulas', 'Aula informatica', 'aula105.jpg'),
(6, 'Despacho 1', 'Disponible', 'Despachos/Salas', 'Despacho situado en el ala izquierda del edificio', 'despacho01.jpg'),
(7, 'Despacho 2', 'Disponible', 'Despachos/Salas', 'Despacho situado en el ala derecha del edificio', 'despacho02.jpg'),
(8, 'Sala de reuniones', 'Disponible', 'Despachos/Salas', 'Sala de reuniones situada al lado del despacho 1', 'saladereuniones.png'),
(9, 'Proyector Portatil', 'Disponible', 'Material de trabajo', 'Proyector portatil HP *Para salas sin proyector', 'proyector_portatil.jpg'),
(10, 'Carro de portatiles', 'Disponible', 'Material de trabajo', 'Carro para guardar los portatiles', 'carrodeportatiles.jpg'),
(11, 'Portatil 1', 'Disponible', 'Material de trabajo', 'Lenovo Thinkpad intel core i5 8gb RAM', 'portatil01.jpg'),
(12, 'Portatil 2', 'Disponible', 'Material de trabajo', 'MSI intel core i7 16gb RAM', 'portatil02.jpg'),
(13, 'Portatil 3', 'Disponible', 'Material de trabajo', 'ASUS ultrabook intel core i5 8gb RAM', 'portatil03.jpg'),
(14, 'Movil 1', 'Disponible', 'Material de trabajo', 'Samsung Galaxy S8', 'SamsungGalaxyS8.png'),
(15, 'Movil 2', 'Disponible', 'Material de trabajo', 'LG G6', 'LGG6.png'),
(17, 'Aula 108', 'Disponible', 'Aulas', 'Aula no tan nueva', 'aula101.jpg'),
(18, 'Despacho 707', 'Disponible', 'Despachos/Salas', 'Despacho muy lejano', 'despacho02.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `res_id` int(4) NOT NULL,
  `res_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `res_fin` datetime NOT NULL,
  `res_acabada` enum('No','Si') COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_user` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rec_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`res_id`, `res_inicio`, `res_fin`, `res_acabada`, `usu_user`, `rec_id`) VALUES
(67, '2018-01-10 10:00:00', '2018-01-11 10:00:00', 'No', 'cfernandez', 15),
(68, '2018-10-10 10:00:00', '2018-10-11 10:00:00', 'No', 'cfernandez', 10),
(69, '2019-12-12 12:12:00', '2019-12-12 12:14:00', 'No', 'cfernandez', 13),
(70, '2018-10-10 10:00:00', '2018-10-11 10:00:00', 'No', 'cfernandez', 14),
(71, '2018-02-17 09:00:00', '2018-02-17 11:00:00', 'No', 'cfernandez', 7),
(72, '2017-12-24 10:00:00', '2017-12-25 10:00:00', 'Si', 'cfernandez', 1),
(73, '2017-12-25 11:00:00', '2017-12-25 17:00:00', 'Si', 'cfernandez', 1),
(74, '2017-12-19 10:00:00', '2017-12-20 23:59:59', 'Si', 'sjimenez', 1),
(75, '2017-12-27 10:00:00', '2017-12-29 10:00:00', 'Si', 'Manolo', 1),
(76, '2018-01-01 10:00:00', '2018-01-02 10:00:00', 'Si', 'Joseman', 1),
(77, '2017-12-26 10:00:00', '2017-12-26 12:00:00', 'No', 'cfernandez', 1),
(78, '2017-12-26 13:00:00', '2017-12-26 17:00:00', 'No', 'cfernandez', 1),
(80, '2017-12-26 18:00:00', '2017-12-26 20:00:00', 'No', 'cfernandez', 1),
(571, '2017-12-26 20:01:00', '2017-12-26 21:00:00', 'No', 'cfernandez', 1),
(572, '2017-12-26 21:01:00', '2017-12-26 22:00:00', 'No', 'cfernandez', 1),
(575, '2017-12-18 17:00:00', '2017-12-19 18:00:00', 'No', 'cfernandez', 6),
(576, '2018-01-02 10:00:00', '2018-01-03 10:00:00', 'No', 'cfernandez', 10),
(577, '2018-01-04 10:00:00', '2018-01-05 10:00:00', 'No', 'cfernandez', 10),
(578, '2018-01-05 11:00:00', '2018-01-05 12:00:00', 'No', 'cfernandez', 10),
(579, '2018-01-05 13:00:00', '2018-01-05 14:00:00', 'No', 'cfernandez', 10),
(612, '2019-04-13 10:00:00', '2019-04-13 12:00:00', 'No', 'dmarin', 1),
(613, '2019-04-13 13:00:00', '2019-04-13 14:00:00', 'No', 'dmarin', 1),
(614, '2019-04-13 15:00:00', '2019-04-13 16:00:00', 'No', 'dmarin', 1),
(615, '2019-04-13 17:00:00', '2019-04-13 18:00:00', 'No', 'dmarin', 1),
(616, '2018-01-12 12:00:00', '2018-01-12 14:00:00', 'No', 'dmarin', 2),
(617, '2018-01-12 14:01:00', '2018-01-12 15:00:00', 'No', 'dmarin', 2),
(618, '2018-03-10 10:00:00', '2018-03-12 15:00:00', 'No', 'dmarin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_user` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_pwd` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_apellido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_telf` int(9) NOT NULL,
  `usu_permisos` enum('leer','modificar','admin','jefaso') COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_habilitado` enum('si','no') COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_foto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_user`, `usu_pwd`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_telf`, `usu_permisos`, `usu_habilitado`, `usu_foto`) VALUES
('administrador', '200820e3227815ed1756a6b531e7e0d2', 'admin', 'istrador', 'administrador@tucartera.es', 123456789, 'admin', 'si', 'img/admin.png'),
('aplanssss', '200820e3227815ed1756a6b531e7e0d2', 'Agnes', 'Plans', 'aplans@gmail.com', 982534865, 'modificar', 'si', 'img/mujer.png'),
('ccardenas', '200820e3227815ed1756a6b531e7e0d2', 'Carlos', 'Cardenas', 'ccardenas@gmail.com', 937639127, 'leer', 'si', 'img/hombre.png'),
('cfernandez', '200820e3227815ed1756a6b531e7e0d2', 'Cristian', 'Fernandez', 'cfernandez@gmail.com', 926345287, 'jefaso', 'si', 'img/admin.png'),
('dmarin', '200820e3227815ed1756a6b531e7e0d2', 'David', 'Marin', 'dmarin@gmail.com', 973428645, 'leer', 'si', 'img/david.png'),
('jmonforte', '200820e3227815ed1756a6b531e7e0d2', 'Juanjo', 'Monforte', 'jmonforte@gmail.com', 932456721, 'leer', 'si', 'img/hombre.png'),
('Joseman', '4a53ed026b5a9b413e2de5f468d55dc5', 'Jose Manuel', 'Garcia', 'jmgarcia@empresa.com', 123321123, 'leer', 'si', 'img/hombre.png'),
('Manolo', '200820e3227815ed1756a6b531e7e0d2', 'Manolo', 'El del Bombo', 'manoliko@hotmail.es', 654789123, 'leer', 'si', 'img/hombre.png'),
('sjimenez', '200820e3227815ed1756a6b531e7e0d2', 'Sergio', 'Jimenez', 'sjimenez@gmail.com', 936452836, 'leer', 'si', 'img/hombre.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`inc_id`),
  ADD KEY `FK_inc_usuario` (`usu_user`),
  ADD KEY `FK_inc_recurso` (`rec_id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `FK_usuario` (`usu_user`),
  ADD KEY `FK_recurso` (`rec_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_user`),
  ADD UNIQUE KEY `usu_mail` (`usu_mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `inc_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `rec_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `res_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `FK_inc_recurso` FOREIGN KEY (`rec_id`) REFERENCES `recursos` (`rec_id`),
  ADD CONSTRAINT `FK_inc_usuario` FOREIGN KEY (`usu_user`) REFERENCES `usuarios` (`usu_user`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `FK_recurso` FOREIGN KEY (`rec_id`) REFERENCES `recursos` (`rec_id`),
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usu_user`) REFERENCES `usuarios` (`usu_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
