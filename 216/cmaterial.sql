-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 04:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codenair`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectablelist`
--

CREATE TABLE `collectablelist` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Points` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectablelist`
--

INSERT INTO `collectablelist` (`id`, `Name`, `Description`, `Points`, `CreationDate`) VALUES
(6, 'Metal', 'An element that readily forms positive ions (cations) and has metallic bonds', 30, '2020-03-19 13:06:01'),
(7, 'Plastic', 'Material consisting of any of a wide range of synthetic or semi-synthetic organic compounds that are malleable and so can be molded into solid objects.', 13, '2020-03-19 13:06:40'),
(8, 'Aluminium', 'A chemical element with the symbol Al and atomic number 13. It is a silvery-white, soft, non-magnetic and ductile metal in the boron group', 24, '2020-03-19 13:07:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collectablelist`
--
ALTER TABLE `collectablelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collectablelist`
--
ALTER TABLE `collectablelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
