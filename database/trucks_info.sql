-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 06:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trucks_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `nombre`) VALUES
(1, 'Chevrolet'),
(2, 'Honda'),
(3, 'Ford'),
(4, 'Suzuki'),
(5, 'BMW'),
(6, 'Mazda');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL,
  `correo` varchar(100) NOT NULL,
  `data_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nombre`, `apellido`, `celular`, `genero`, `correo`, `data_create`) VALUES
(6, 'Sebastian', 'Quintero', '2147483647', 'Masculino', 'singingfool01@hotmail.com', '2018-05-15'),
(7, 'Mayra Alejandra', 'Peralta', '2147483647', 'Femenino', 'mayra_peralta@hotmail.com', '2018-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `change_time` varchar(100) NOT NULL,
  `new_vehicle` enum('bus','track','car') NOT NULL,
  `tax` enum('12','36','60') NOT NULL,
  `financiation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `id_client`, `id_vehiculo`, `id_modelo`, `id_linea`, `change_time`, `new_vehicle`, `tax`, `financiation`) VALUES
(6, 6, 5, 11, 14, '3-6', 'car', '60', '1'),
(7, 7, 5, 11, 14, '3-6', 'bus', '36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `nombre`, `id_modelo`) VALUES
(1, '2 puertas', 1),
(2, '4 puertas', 2),
(3, 'HatchBack', 2),
(4, '3 puertas', 3),
(5, 'Sedan', 3),
(6, '3 puertas', 4),
(7, '2 puertas', 5),
(8, '4 puertas', 6),
(9, '4 puertas', 7),
(10, 'Airbag [2012-2013]', 8),
(11, '3 puertas', 8),
(12, '2 puertas', 9),
(13, '4 puertas', 10),
(14, '4 puertas', 11),
(15, 'Airbag [2012-2016]', 12),
(16, 'HatchBack 2 puertas', 13),
(17, 'HatchBack 4 puertas', 14),
(18, 'HatchBack 3 puertas', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `nombre`, `id_vehiculo`) VALUES
(1, 'Aveo', 1),
(2, 'Chevette', 1),
(3, 'Corsa', 1),
(4, 'Concerto', 2),
(5, 'Brio', 2),
(6, 'Fiesta', 3),
(7, 'Fortiva', 3),
(8, 'Falcon', 3),
(9, 'Vitara', 4),
(10, 'Forza', 4),
(11, '6 serie', 5),
(12, '7 serie', 5),
(13, '8 serie', 5),
(14, '3', 6),
(15, '2', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
