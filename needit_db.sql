-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2017 a las 07:20:40
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `needit_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `Group_Id` varchar(15) NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Group_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Group_User` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mygroups`
--

CREATE TABLE `mygroups` (
  `MyGroup_User` varchar(30) NOT NULL,
  `MyGroup_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MyGroup_Id` varchar(15) NOT NULL,
  `MyGroup_PK` int(11) NOT NULL,
  `MyGroup_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `Prod_Id` varchar(20) NOT NULL,
  `Prod_User` varchar(30) NOT NULL,
  `Prod_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Prod_Status` int(11) NOT NULL DEFAULT '0',
  `Prod_Name` varchar(50) NOT NULL,
  `Prod_Group` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registry`
--

CREATE TABLE `registry` (
  `Reg_User` varchar(30) NOT NULL,
  `Reg_Pass` varchar(200) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Reg_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_Id`);

--
-- Indices de la tabla `mygroups`
--
ALTER TABLE `mygroups`
  ADD PRIMARY KEY (`MyGroup_PK`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Prod_Id`);

--
-- Indices de la tabla `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`Reg_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mygroups`
--
ALTER TABLE `mygroups`
  MODIFY `MyGroup_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
