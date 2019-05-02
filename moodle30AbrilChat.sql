-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2019 a las 23:58:08
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `edad` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `edad`, `matricula`, `estatus`, `fecha_alta`, `Fk_usuario`) VALUES
(1, 'JOHN', 12, 'ee345', 1, '2019-04-15', 6),
(2, 'allumnos 2', 20, 'matrocula alumnos 2', 1, '2019-04-02', 8);

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
(1, 1, 100000, 1),
(2, 2, 100000, 1);

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
(5, '2', 'Alumnos hoy no hay cxlase', 901, 'profe3', 1, 0),
(6, '2', 'Gracias! tODO OK?', 1, 'JOHN', 1, 0),
(7, '1', 'Profe dara clase hoy? ', 1, 'JOHN', 1, 0),
(8, '1', 'A que hora llega?', 1, 'JOHN', 1, 0),
(9, '1', 'no llegare lo siento', 901, 'profe3', 1, 1556636574),
(10, '1', '1000 disuclpas', 901, 'profe3', 1, 1556636727),
(11, '1', 'saludos', 901, '', 1, 1556638026),
(12, '2', 'sip, gracias', 901, '', 1, 1556638493),
(13, '1', 'vale', 1, '', 1, 1556641214),
(14, '1', 'saluidos', 1, '', 1, 1556641430),
(15, '2', 'vale, nos vemos! ', 1, '', 1, 1556641444),
(16, '2', 'gracias!', 2, '', 1, 1556641608),
(17, '1', 'duda...', 1, '', 1, 1556641921),
(18, '1', 'con la tarea', 901, '', 1, 1556642515),
(19, '1', 'que pasa?', 1, '', 1, 1556642647),
(20, '1', 'no encuentro la respuesta a B del 27', 901, '', 1, 1556642680),
(21, '1', 'ayuda!', 901, '', 1, 1556642719),
(22, '1', 'donde te atoraste?', 1, '', 1, 1556642875),
(23, '1', 'dinr', 1, '', 1, 1556642973),
(24, '1', 'pagina 67', 901, '', 1, 1556642987),
(25, '1', 'dejame ver...', 1, '', 1, 1556643231),
(26, '1', 'ahira', 1, '', 1, 1556643540),
(27, '1', 'gracias', 901, '', 1, 1556643778),
(28, '1', 'de nada', 1, '', 1, 1556643817),
(29, '1', 'aaaaa', 901, '', 1, 1556643832),
(30, '1', 'voy', 901, '', 1, 1556643947),
(31, '1', 'vaaaa', 1, '', 1, 1556644010),
(32, '1', 'ya vi donde es', 901, '', 1, 1556644030),
(33, '1', 'mira', 901, '', 1, 1556644041),
(34, '1', 'chek', 901, '', 1, 1556644047),
(35, '1', 'vale grax', 1, '', 1, 1556644207),
(36, '1', 'chao', 1, '', 1, 1556644428),
(37, '1', 'bye profe', 1, '', 1, 1556644658),
(38, '1', 'hi', 901, '', 1, 1556644669),
(39, '1', 'pudiste¿', 901, '', 1, 1556644677),
(40, '1', 'hola', 1, '', 1, 1556644921),
(41, '1', 'pusidte?¿', 901, '', 1, 1556645024),
(42, '1', 'si', 1, '', 1, 1556645038),
(43, '1', 'ok', 1, '', 1, 1556645182),
(44, '1', 'dejame checar', 901, '', 1, 1556645196),
(45, '1', 'intenta de nuevo', 901, '', 1, 1556650559),
(46, '1', 'gracias primo', 1, '', 1, 1556650578),
(47, '1', 'de nada prima', 901, '', 1, 1556650715),
(48, '1', 'gordita!!! ', 901, '', 1, 1556650810),
(49, '2', 'Saludos a rtodos', 1, '', 1, 1556656702),
(50, '2', 'hola a todos buen dia', 2, '', 1, 1556656715),
(51, '2', 'ahora que ', 1, '', 1, 1556656820),
(52, '2', 'mandne la tarea oirfa', 1, '', 1, 1556657664),
(53, '2', 'ahorita la subo al drive', 2, '', 1, 1556657677),
(54, '2', 'dame un momento', 1, '', 1, 1556657799),
(55, '2', 'como?', 2, '', 1, 1556657809),
(56, '2', 'perdon, no era para ti', 1, '', 1, 1556657828),
(57, '2', 'haaa ok kajaja', 2, '', 1, 1556657837),
(58, '2', 'chavos no atasquen el chat ', 901, '', 1, 1556657924),
(59, '2', 'jajaja vale, nos vemos', 2, '', 1, 1556658447);

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
(1, 'A_1;P_901', '2019-04-26', 1),
(2, 'PM_100000', '2019-04-26', 1);

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
(4, 'materia_4', 1, '2019-04-24');

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
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `fecha_nac`, `matricula`, `estatus`, `fecha_alta`, `Fk_usuario`) VALUES
(901, 'profe 3', '2019-04-26', 'profe3', 1, '2019-04-26', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `id_pm` int(11) NOT NULL,
  `profesor` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor_materia`
--

INSERT INTO `profesor_materia` (`id_pm`, `profesor`, `materia`, `estatus`) VALUES
(100000, 901, 3, 1);

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
(5, 'alexis@gmail.com', '12345', 1, 2, '2019-04-15'),
(6, 'oscar@gmail.com', 'oscar', 1, 3, '2019-04-15'),
(8, 'alumnos2@gmail.com', 'alumnos2', 1, 3, '2019-04-24'),
(9, 'profe3@gmail.com', 'profe3', 1, 2, '2019-04-26');

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
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `alumno_profesor_materia`
--
ALTER TABLE `alumno_profesor_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `alumno_tareas`
--
ALTER TABLE `alumno_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `mainchat`
--
ALTER TABLE `mainchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=902;
--
-- AUTO_INCREMENT de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  MODIFY `id_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
