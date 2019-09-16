-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2019 a las 20:20:52
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moodle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `imagen_perfil` varchar(250) DEFAULT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `fecha_nac`, `matricula`, `estatus`, `fecha_alta`, `imagen_perfil`, `Fk_usuario`) VALUES
(2, 'alumno', '1999-06-03', 'alumno', 1, '2019-05-10', '2019-05-21.jpg', 8),
(3, 'alumno2', '1994-02-08', 'alumno2', 1, '2019-05-10', NULL, 10),
(4, 'alumnoprueba', '1991-01-30', 'prueba', 1, '2019-06-06', NULL, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_profesor_materia`
--

CREATE TABLE `alumno_profesor_materia` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno_profesor_materia`
--

INSERT INTO `alumno_profesor_materia` (`id`, `id_alumno`, `id_pm`, `estatus`) VALUES
(19, 2, 100001, 1),
(20, 3, 100001, 1),
(21, 2, 100003, 1),
(22, 3, 100003, 1),
(25, 2, 100004, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_tareas`
--

CREATE TABLE `alumno_tareas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `calificacion` double NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno_tareas`
--

INSERT INTO `alumno_tareas` (`id`, `id_alumno`, `id_tarea`, `archivo`, `calificacion`, `estatus`) VALUES
(1, 2, 13, '', 0, 0),
(2, 3, 13, 'CV.pdf', 9, 3),
(3, 2, 14, '', 0, 0),
(4, 3, 14, 'curp.pdf', 50, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `fk_student` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL,
  `examen` double NOT NULL,
  `tareas` double NOT NULL,
  `calificacion` double NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `fk_student`, `id_pm`, `examen`, `tareas`, `calificacion`, `estatus`) VALUES
(4, 2, 100001, 65, 20, 85, 1),
(5, 3, 100001, 50, 15, 65, 1),
(6, 2, 100003, 50, 30, 80, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `envia` int(11) NOT NULL,
  `tempName` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id`, `id_users`, `message`, `envia`, `tempName`, `estatus`, `timestamp`) VALUES
(1, '2', 'hola profe buen dia', 2, 'allumnos 2', 1, 1558098076),
(2, '2', 'que tal alumnos 2 ', 901, 'profe 3', 1, 1558098087);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_user`
--

CREATE TABLE `chat_user` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `last_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat_user`
--

INSERT INTO `chat_user` (`id`, `id_users`, `id_user`, `estatus`, `last_time`) VALUES
(1, 2, 2, 1, 1558098087),
(2, 2, 901, 1, 1558098087);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_nac` date NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `imagen_perfil` varchar(250) DEFAULT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mainchat`
--

CREATE TABLE `mainchat` (
  `id` int(11) NOT NULL,
  `users` varchar(100) NOT NULL,
  `fecha_alta` date NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mainchat`
--

INSERT INTO `mainchat` (`id`, `users`, `fecha_alta`, `estatus`) VALUES
(2, 'A_2;P_901', '0000-00-00', 1),
(4, 'PM_100001', '0000-00-00', 1),
(5, 'A_1;P_901', '0000-00-00', 1),
(6, 'A_3;P_901', '0000-00-00', 1),
(7, 'A_2;P_902', '0000-00-00', 1),
(8, 'PM_100003', '0000-00-00', 1),
(9, 'PM_100004', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `materia` varchar(150) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`, `estatus`, `fecha_alta`) VALUES
(1, 'Materia_1', 1, '2019-04-23'),
(2, 'Materia_2', 1, '2019-04-23'),
(3, 'materia_3', 1, '2019-04-23'),
(7, 'civica e historia', 1, '2019-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_nac` date NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `imagen_perfil` varchar(250) DEFAULT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `fecha_nac`, `matricula`, `estatus`, `fecha_alta`, `imagen_perfil`, `Fk_usuario`) VALUES
(901, 'profesor', '1980-08-08', 'matricula_profesor', 1, '2019-05-10', 'iconomapa.png', 9),
(902, 'profesor2', '1993-03-03', 'profesor2', 1, '2019-05-10', NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `id_pm` int(11) NOT NULL,
  `profesor` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `grupo` varchar(200) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor_materia`
--

INSERT INTO `profesor_materia` (`id_pm`, `profesor`, `materia`, `grupo`, `estatus`) VALUES
(100001, 901, 1, '1CM5', 1),
(100003, 902, 7, '3CV4', 1),
(100004, 902, 2, '8CM10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `tarea` varchar(200) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `puntos` int(11) NOT NULL,
  `archivo` varchar(200) NOT NULL,
  `estatus` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `tarea`, `fecha_alta`, `fecha_fin`, `puntos`, `archivo`, `estatus`, `id_pm`) VALUES
(13, 'tarea A', '2019-04-05', '2019-11-05', 10, 'curp.pdf', 1, 100001),
(14, 'tarea 2', '2019-06-05', '1970-01-01', 50, 'guia-aso-2017-manual-app-store-optimization.pdf', 1, 100001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `estatus`, `rol`, `fecha_alta`) VALUES
(1, 'nowoscmexico@gmail.com', 'nowoscadm19', 1, 1, '2019-04-09'),
(2, 'cristobaljohn00@gmail.com', 'cristobal12345', 1, 1, '2019-04-09'),
(8, 'alumno@gmail.com', 'alumno', 1, 3, '2019-05-10'),
(9, 'profesor@gmail.com', 'profesor', 1, 2, '2019-05-10'),
(10, 'alumno2@gmail.com', 'alumno2', 1, 3, '2019-05-10'),
(12, 'profesor2@gmail.com', 'profesor2', 1, 2, '2019-05-10'),
(17, 'alumnoprueba@gmail.com', 'alumnoprueba', 1, 3, '2019-06-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_usuario` (`Fk_usuario`);

--
-- Indices de la tabla `alumno_profesor_materia`
--
ALTER TABLE `alumno_profesor_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_pm` (`id_pm`);

--
-- Indices de la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_tarea` (`id_tarea`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student` (`fk_student`),
  ADD KEY `id_pm` (`id_pm`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mainchat`
--
ALTER TABLE `mainchat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_usuario` (`Fk_usuario`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD PRIMARY KEY (`id_pm`),
  ADD KEY `profesor_materia_ibfk_1` (`profesor`),
  ADD KEY `profesor_materia_ibfk_2` (`materia`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tareas_ibfk_1` (`id_pm`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumno_profesor_materia`
--
ALTER TABLE `alumno_profesor_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mainchat`
--
ALTER TABLE `mainchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;

--
-- AUTO_INCREMENT de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  MODIFY `id_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `alumno_profesor_materia`
--
ALTER TABLE `alumno_profesor_materia`
  ADD CONSTRAINT `alumno_profesor_materia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `alumno_profesor_materia_ibfk_2` FOREIGN KEY (`id_pm`) REFERENCES `profesor_materia` (`id_pm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  ADD CONSTRAINT `alumno_tareas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `alumno_tareas_ibfk_2` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`fk_student`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_pm`) REFERENCES `alumno_profesor_materia` (`id_pm`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`Fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `profesor_materia_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_materia_ibfk_2` FOREIGN KEY (`materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_pm`) REFERENCES `profesor_materia` (`id_pm`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
