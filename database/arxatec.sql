-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2024 a las 20:08:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arxatec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abogado_especialidades`
--

CREATE TABLE `abogado_especialidades` (
  `abogado_id` int(11) NOT NULL,
  `especialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `abogado_especialidades`
--

INSERT INTO `abogado_especialidades` (`abogado_id`, `especialidad_id`) VALUES
(6, 1),
(6, 2),
(7, 3),
(7, 4),
(8, 5),
(8, 6),
(9, 7),
(9, 8),
(10, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `respuesta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `consulta_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`consulta_id`, `titulo`, `descripcion`, `cliente_id`, `fecha_creacion`) VALUES
(1, 'Consulta sobre contrato de alquiler', 'Tengo dudas sobre las cláusulas de mi contrato de alquiler.', 1, '2024-07-21 01:53:55'),
(2, 'Asesoría sobre despido laboral', 'Me despidieron injustamente y necesito asesoría.', 2, '2024-07-21 01:53:55'),
(3, 'Consulta sobre herencia', '¿Qué pasos debo seguir para reclamar una herencia?', 3, '2024-07-21 01:53:55'),
(4, 'Problema con contrato de compraventa', 'El vendedor no quiere cumplir con el contrato.', 4, '2024-07-21 01:53:55'),
(5, 'Consulta sobre acoso laboral', 'Estoy siendo acosado en mi trabajo y necesito ayuda.', 5, '2024-07-21 01:53:55'),
(6, 'Problemas con impuestos', 'Tengo problemas con la declaración de impuestos.', 1, '2024-07-21 01:53:55'),
(7, 'Asesoría sobre matrimonio', 'Quiero casarme y necesito asesoría legal.', 2, '2024-07-21 01:53:55'),
(8, 'Consulta sobre contrato de trabajo', 'Tengo dudas sobre mi contrato de trabajo.', 3, '2024-07-21 01:53:55'),
(9, 'Problemas con vecindad', 'Mi vecino está construyendo en mi terreno.', 4, '2024-07-21 01:53:55'),
(10, 'Consulta sobre derecho digital', 'Quiero saber mis derechos en internet.', 5, '2024-07-21 01:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `especialidad_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`especialidad_id`, `nombre`) VALUES
(5, 'Derecho Administrativo'),
(7, 'Derecho Ambiental'),
(1, 'Derecho Civil'),
(9, 'Derecho de Familia'),
(10, 'Derecho Informático'),
(8, 'Derecho Internacional'),
(3, 'Derecho Laboral'),
(4, 'Derecho Mercantil'),
(2, 'Derecho Penal'),
(6, 'Derecho Tributario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `respuesta_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `abogado_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`respuesta_id`, `contenido`, `consulta_id`, `abogado_id`, `fecha_creacion`) VALUES
(1, 'Debe revisar las cláusulas relacionadas con las penalidades.', 1, 6, '2024-07-21 01:53:55'),
(2, 'Le recomiendo acudir a la autoridad laboral competente.', 2, 7, '2024-07-21 01:53:55'),
(3, 'Debe presentar los documentos necesarios en el juzgado.', 3, 8, '2024-07-21 01:53:55'),
(4, 'Puede demandar al vendedor por incumplimiento de contrato.', 4, 9, '2024-07-21 01:53:55'),
(5, 'Debe documentar los incidentes y acudir a recursos humanos.', 5, 10, '2024-07-21 01:53:55'),
(6, 'Debe contratar a un contador para que revise sus declaraciones.', 6, 6, '2024-07-21 01:53:55'),
(7, 'Debe acudir al registro civil para iniciar los trámites.', 7, 7, '2024-07-21 01:53:55'),
(8, 'Debe revisar las cláusulas relacionadas con la duración y salario.', 8, 8, '2024-07-21 01:53:55'),
(9, 'Debe presentar una denuncia en el municipio correspondiente.', 9, 9, '2024-07-21 01:53:55'),
(10, 'Debe revisar las leyes de protección de datos.', 10, 10, '2024-07-21 01:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_consultas`
--

CREATE TABLE `seguimiento_consultas` (
  `seguimiento_id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `estado` enum('abierta','en progreso','cerrada') NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento_consultas`
--

INSERT INTO `seguimiento_consultas` (`seguimiento_id`, `consulta_id`, `estado`, `comentario`, `fecha_actualizacion`) VALUES
(1, 1, 'en progreso', 'Cliente está revisando las cláusulas.', '2024-07-21 01:53:55'),
(2, 2, 'cerrada', 'Cliente ha acudido a la autoridad laboral.', '2024-07-21 01:53:55'),
(3, 3, 'en progreso', 'Cliente está recopilando documentos.', '2024-07-21 01:53:55'),
(4, 4, 'en progreso', 'Cliente está preparando la demanda.', '2024-07-21 01:53:55'),
(5, 5, 'en progreso', 'Cliente está documentando los incidentes.', '2024-07-21 01:53:55'),
(6, 6, 'cerrada', 'Cliente ha contratado a un contador.', '2024-07-21 01:53:55'),
(7, 7, 'en progreso', 'Cliente está iniciando los trámites en el registro civil.', '2024-07-21 01:53:55'),
(8, 8, 'en progreso', 'Cliente está revisando el contrato.', '2024-07-21 01:53:55'),
(9, 9, 'en progreso', 'Cliente está preparando la denuncia.', '2024-07-21 01:53:55'),
(10, 10, 'en progreso', 'Cliente está revisando las leyes.', '2024-07-21 01:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `additional_phone` varchar(20) DEFAULT NULL,
  `gender` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `usertype`, `profile_image`, `dni`, `address`, `phone_number`, `additional_phone`, `gender`, `date_of_birth`) VALUES
(24, 'Admin12', 'admin@gmail.com', 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Soporte', 'soporte@gmail.com', 'soporte', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'sanes', 'sanes@gmail.com', 'sanes', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Yonatan Alesander Ordoñez Diego', 'alex.od2408@gmail.com', 'arxatec123', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'administrador', 'administrador@GMAIL.PE', 'administrador', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'administrador', 'administrador@GMAIL.PE', 'administrador', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'frank', 'frank@gmailpe', 'frank', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'yens_paredez', 'labasecowork@gmail.com', '123', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '123456789', '123456789@gmail.pe', '123456789', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abogado_especialidades`
--
ALTER TABLE `abogado_especialidades`
  ADD PRIMARY KEY (`abogado_id`,`especialidad_id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `respuesta_id` (`respuesta_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`consulta_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`especialidad_id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`respuesta_id`),
  ADD KEY `consulta_id` (`consulta_id`),
  ADD KEY `abogado_id` (`abogado_id`);

--
-- Indices de la tabla `seguimiento_consultas`
--
ALTER TABLE `seguimiento_consultas`
  ADD PRIMARY KEY (`seguimiento_id`),
  ADD KEY `consulta_id` (`consulta_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `especialidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `respuesta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `seguimiento_consultas`
--
ALTER TABLE `seguimiento_consultas`
  MODIFY `seguimiento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abogado_especialidades`
--
ALTER TABLE `abogado_especialidades`
  ADD CONSTRAINT `abogado_especialidades_ibfk_2` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`especialidad_id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`respuesta_id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consultas` (`consulta_id`);

--
-- Filtros para la tabla `seguimiento_consultas`
--
ALTER TABLE `seguimiento_consultas`
  ADD CONSTRAINT `seguimiento_consultas_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consultas` (`consulta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
