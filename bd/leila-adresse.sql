-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 05:52 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leila`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `adr_id` tinyint UNSIGNED NOT NULL,
  `adr_nom` varchar(25) NOT NULL,
  `adr_rue` varchar(75) NOT NULL,
  `adr_ville` varchar(25) NOT NULL,
  `adr_tel` char(10) NOT NULL,
  `adr_carte_gm` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL COMMENT 'URL Google Maps.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`adr_id`, `adr_nom`, `adr_rue`, `adr_ville`, `adr_tel`, `adr_carte_gm`) VALUES
(1, 'Plateau Mont-Royal', '1650 avenue Laurier Est', 'Montréal', '5148745874', 'https://goo.gl/maps/ySYjqq2g8TU6qj51A'),
(2, 'Rosemont', '2524 Rue Beaubien E', 'Montréal', '5142365236', 'https://g.page/sandwicherie-sue?share'),
(3, 'Saint-Roch', '203 Rue Saint-Joseph E', 'Québec', '4184569852', 'https://g.page/ClocherPenche?share'),
(4, 'York', '221 Ossington Ave', 'Toronto', '4169632154', 'https://goo.gl/maps/JutV59bnh3mLV6Dh7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`adr_id`),
  ADD UNIQUE KEY `adr_nom` (`adr_nom`),
  ADD UNIQUE KEY `adr_rue` (`adr_rue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `adr_id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
