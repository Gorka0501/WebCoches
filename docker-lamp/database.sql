-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 10, 2021 at 12:24 PM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `alquiler`
--

CREATE TABLE `alquiler` (
  `dni` varchar(9) DEFAULT NULL,
  `id` int(6) NOT NULL,
  `fInicio` date NOT NULL,
  `fFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coche`
--

CREATE TABLE `coche` (
  `id` int(9) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `marca` varchar(10) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `nAsientos` int(1) DEFAULT NULL,
  `kmTraje` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(9) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `valido` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `tlf` int(9) NOT NULL,
  `email` varchar(20) NOT NULL,
  `fNaci` date NOT NULL,
  `contrasena` varchar(80) NOT NULL,
  `nBancario` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`,`fInicio`),
  ADD KEY `dni` (`dni`);

--
-- Indexes for table `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indexes for table `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coche`
--
ALTER TABLE `coche`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`id`) REFERENCES `coche` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

