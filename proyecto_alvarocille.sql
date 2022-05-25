-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2022 a las 21:44:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artículos`
--

CREATE TABLE `artículos` (
  `Referencia` varchar(50) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Descripción` varchar(255) DEFAULT NULL,
  `Familia` varchar(255) DEFAULT NULL,
  `Precio tarifa` decimal(10,2) NOT NULL,
  `Descuento` decimal(10,2) DEFAULT NULL,
  `Precio final` decimal(10,2) NOT NULL,
  `Impuesto` decimal(10,2) DEFAULT NULL,
  `Precio Venta` decimal(10,2) DEFAULT NULL,
  `Proveedores` int(11) DEFAULT NULL,
  `Reparación` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradoras`
--

CREATE TABLE `aseguradoras` (
  `Código` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NIF` int(11) NOT NULL,
  `Dirección` varchar(40) NOT NULL,
  `Código Postal` int(11) NOT NULL,
  `Población` varchar(30) NOT NULL,
  `Teléfono` int(11) NOT NULL,
  `Web` varchar(40) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Otra información` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Particular` tinyint(1) NOT NULL,
  `Código Postal` int(11) NOT NULL,
  `Población` varchar(30) NOT NULL,
  `Teléfono` int(11) DEFAULT NULL,
  `Teléfono 2` int(11) DEFAULT NULL,
  `Correo electrónico` varchar(20) DEFAULT NULL,
  `Banco` varchar(20) DEFAULT NULL,
  `IBAN` varchar(30) DEFAULT NULL,
  `Otra información` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `Nombre`, `Particular`, `Código Postal`, `Población`, `Teléfono`, `Teléfono 2`, `Correo electrónico`, `Banco`, `IBAN`, `Otra información`) VALUES
('1341234234D', 'asdfasdf', 0, 45333, 'Peñafiel', 89994045, 24232344, 'hola@gmail.com', 'qwerqwer', '231443412f', 'askfffsaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Código` int(11) NOT NULL,
  `NIF` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Dirección` varchar(255) NOT NULL,
  `Población` varchar(100) NOT NULL,
  `Código Postal` int(11) NOT NULL,
  `Teléfono` int(11) DEFAULT NULL,
  `Teléfono 2` int(11) DEFAULT NULL,
  `Web` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Banco` varchar(100) DEFAULT NULL,
  `IBAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparación`
--

CREATE TABLE `reparación` (
  `Código` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Vehículo` varchar(10) NOT NULL,
  `Tarifa` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehículos`
--

CREATE TABLE `vehículos` (
  `Matrícula` varchar(10) NOT NULL,
  `Cliente` varchar(30) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Versión` varchar(30) DEFAULT NULL,
  `Kilómetros` int(11) DEFAULT NULL,
  `Última ITV` date DEFAULT NULL,
  `Próxima ITV` date NOT NULL,
  `Otra información` int(11) DEFAULT NULL,
  `Aseguradora` int(11) DEFAULT NULL,
  `Datos seguro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artículos`
--
ALTER TABLE `artículos`
  ADD PRIMARY KEY (`Referencia`),
  ADD KEY `Proveedores` (`Proveedores`),
  ADD KEY `Reparación` (`Reparación`);

--
-- Indices de la tabla `aseguradoras`
--
ALTER TABLE `aseguradoras`
  ADD PRIMARY KEY (`Código`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Código`);

--
-- Indices de la tabla `reparación`
--
ALTER TABLE `reparación`
  ADD PRIMARY KEY (`Código`),
  ADD KEY `Vehículo` (`Vehículo`);

--
-- Indices de la tabla `vehículos`
--
ALTER TABLE `vehículos`
  ADD PRIMARY KEY (`Matrícula`),
  ADD KEY `Cliente` (`Cliente`),
  ADD KEY `Aseguradora` (`Aseguradora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aseguradoras`
--
ALTER TABLE `aseguradoras`
  MODIFY `Código` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Código` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reparación`
--
ALTER TABLE `reparación`
  MODIFY `Código` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`Código`) REFERENCES `artículos` (`Proveedores`);

--
-- Filtros para la tabla `reparación`
--
ALTER TABLE `reparación`
  ADD CONSTRAINT `reparación_ibfk_1` FOREIGN KEY (`Vehículo`) REFERENCES `vehículos` (`Matrícula`),
  ADD CONSTRAINT `reparación_ibfk_2` FOREIGN KEY (`Código`) REFERENCES `artículos` (`Reparación`);

--
-- Filtros para la tabla `vehículos`
--
ALTER TABLE `vehículos`
  ADD CONSTRAINT `vehículos_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `clientes` (`DNI`),
  ADD CONSTRAINT `vehículos_ibfk_2` FOREIGN KEY (`Aseguradora`) REFERENCES `aseguradoras` (`Código`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
