-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2024 a las 21:41:01
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
-- Base de datos: `prueba_NativeApp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `name`, `description`, `state`) VALUES
(1, 'tos', 'tos con flema', '1'),
(2, 'fiebre', '', '1'),
(3, 'dolor de estomago', '', '1'),
(4, 'dolor de cabeza', 'dolor intenso en la cabeza', '1'),
(5, 'fiebre', 'temperatura corporal elevada', '1'),
(6, 'dolor de garganta', 'sensación dolorosa en la garganta', '1'),
(7, 'dolor abdominal', 'malestar en el área del abdomen', '1'),
(8, 'fatiga', 'cansancio extremo', '1'),
(9, 'náuseas', 'sensación de malestar estomacal', '1'),
(10, 'mareos', 'sensación de desequilibrio o vértigo', '1'),
(11, 'dolor en las articulaciones', 'malestar en las uniones entre huesos', '1'),
(12, 'dolor de espalda', 'malestar en la región dorsal o lumbar', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `document` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `genre` varchar(30) NOT NULL,
  `state` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `document`, `first_name`, `last_name`, `birth_date`, `email`, `phone`, `genre`, `state`) VALUES
(1, '1075278687', 'Johan', 'Montero', '1994-03-31', 'johanPrueba@gamil.com', '3177117005', 'masculino', '1'),
(2, '1075278686', 'Camilo', 'Manrique', '1994-03-31', 'johanPrueba@gamil.com', '3177117005', 'masculino', '1'),
(3, '1075278685', 'Sofia', 'Nieto', '1994-03-31', 'johanPrueba@gamil.com', '3177117005', 'femenino', '1'),
(4, '1075278683', 'Ana Maria', 'Nuñes', '1994-03-31', 'johanPrueba@gamil.com', '3177117005', 'femenino', '1'),
(5, '3052147896', 'Laura', 'Martínez', '2000-07-22', 'laura.prueba@example.com', '3009876543', 'femenino', '1'),
(6, '2154789632', 'Carlos', 'García', '1988-09-15', 'carlos.prueba@gmail.com', '3105698741', 'masculino', '1'),
(7, '4087596321', 'Juan', 'Pérez', '1992-05-10', 'juan_prueba@hotmail.com', '3207418529', 'masculino', '1'),
(8, '5124897532', 'María', 'López', '1985-12-03', 'maria.prueba@example.com', '3159874562', 'femenino', '1'),
(9, '6235741890', 'Andrés', 'Hernández', '1977-11-28', 'andres.prueba@gmail.com', '3006549871', 'masculino', '1'),
(10, '7349865210', 'Ana', 'Gómez', '1998-04-17', 'ana.prueba@example.com', '3187456321', 'femenino', '1'),
(11, '8463259740', 'Pedro', 'Sánchez', '1983-08-09', 'pedro_prueba@yahoo.com', '3149863257', 'masculino', '1'),
(12, '9528740361', 'Diana', 'Rodríguez', '1990-02-25', 'diana.prueba@gmail.com', '3125874906', 'femenino', '1'),
(13, '1057293486', 'Eduardo', 'Gutiérrez', '1986-06-12', 'eduardo.prueba@example.com', '3198657402', 'masculino', '1'),
(14, '1156325874', 'Carolina', 'Fernández', '1995-10-20', 'carolina_prueba@hotmail.com', '3115748963', 'femenino', '1'),
(15, '1254879630', 'Alejandro', 'Díaz', '1980-03-15', 'alejandro.prueba@gmail.com', '3178965420', 'masculino', '0'),
(16, '1357902468', 'Lucía', 'Ramírez', '1993-07-08', 'lucia.prueba@example.com', '3124875036', 'femenino', '1'),
(17, '1452369870', 'Roberto', 'Alvarez', '1978-12-28', 'roberto_prueba@hotmail.com', '3106589743', 'masculino', '1'),
(18, '1547896230', 'Sofía', 'Torres', '1996-04-03', 'sofia.prueba@example.com', '3158742963', 'femenino', '1'),
(19, '1635824907', 'Daniel', 'González', '1987-08-18', 'daniel.prueba@gmail.com', '3189657420', 'masculino', '1'),
(20, '1749203685', 'Marcela', 'Ortega', '1991-11-09', 'marcela_prueba@example.com', '3145876230', 'femenino', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_diagnostico`
--

CREATE TABLE `paciente_diagnostico` (
  `id` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `diagnostic` int(11) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `creation` datetime NOT NULL,
  `state` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente_diagnostico`
--

INSERT INTO `paciente_diagnostico` (`id`, `patient`, `diagnostic`, `observation`, `creation`, `state`) VALUES
(1, 1, 2, NULL, '2024-05-14 12:30:45', '1'),
(2, 1, 1, NULL, '2024-05-14 12:30:45', '1'),
(3, 2, 3, NULL, '2024-05-14 12:30:45', '1'),
(5, 4, 2, NULL, '2024-05-14 12:30:45', '1'),
(6, 5, 6, NULL, '2024-05-14 12:30:45', '1'),
(7, 5, 9, NULL, '2024-05-14 12:30:45', '1'),
(8, 8, 7, NULL, '2024-05-14 12:30:45', '1'),
(9, 8, 3, NULL, '2024-05-14 12:30:45', '1'),
(10, 12, 10, NULL, '2024-05-14 12:30:45', '1'),
(11, 12, 7, NULL, '2024-05-14 12:30:45', '1'),
(12, 15, 7, NULL, '2024-05-14 12:30:45', '0'),
(13, 16, 7, NULL, '2024-05-14 12:30:45', '1'),
(14, 16, 11, NULL, '2022-05-14 12:30:45', '1'),
(15, 20, 10, NULL, '2022-05-14 12:30:45', '1'),
(16, 20, 11, NULL, '2022-05-14 12:30:45', '1'),
(17, 20, 12, NULL, '2022-05-14 12:30:45', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente_diagnostico`
--
ALTER TABLE `paciente_diagnostico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_diagnostico_paciente_FK` (`patient`),
  ADD KEY `paciente_diagnostico_diagnosticos_FK` (`diagnostic`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `paciente_diagnostico`
--
ALTER TABLE `paciente_diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente_diagnostico`
--
ALTER TABLE `paciente_diagnostico`
  ADD CONSTRAINT `paciente_diagnostico_diagnosticos_FK` FOREIGN KEY (`diagnostic`) REFERENCES `diagnosticos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_diagnostico_paciente_FK` FOREIGN KEY (`patient`) REFERENCES `paciente` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
