-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:35 PM
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
-- Database: `elms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4', '2017-10-30 11:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblcollectors`
--

CREATE TABLE `tblcollectors` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Points` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcollectors`
--

INSERT INTO `tblcollectors` (`id`, `EmpId`, `FirstName`, `EmailId`, `Password`, `Dob`, `Address`, `Points`, `RegDate`) VALUES
(1, 'EMP10806121', 'Johnny', 'johnny@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '3 February, 1990', 'N NEPO', 0, '2017-11-10 11:29:59'),
(3, '321', '321', '321@com', 'c4ca4238a0b923820dcc509a6f75849b', '', '1', 1, '2020-03-09 18:22:56'),
(4, '321', '321', '321@com', 'caf1a3dfb505ffed0d024130f58c5cfa', '', '321', 1, '2020-03-09 18:23:05'),
(5, '321', '321', '321@com', 'caf1a3dfb505ffed0d024130f58c5cfa', '', '321', 1, '2020-03-09 18:24:50'),
(6, '4', '4', '4@com', 'a87ff679a2f3e71d9181a67b7542122c', '20 March, 2020', '4', 1, '2020-03-09 18:25:56'),
(7, '5', '5', '5@com', 'e4da3b7fbbce2345d7772b0674a318d5', '', '5', 1, '2020-03-09 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblrecyclers`
--

CREATE TABLE `tblrecyclers` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Points` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrecyclers`
--

INSERT INTO `tblrecyclers` (`id`, `EmpId`, `FirstName`, `EmailId`, `Password`, `Dob`, `Address`, `Points`, `RegDate`) VALUES
(1, 'EMP10806121', 'Johnny', 'johnny@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '3 February, 1990', 'N NEPO', 0, '2017-11-10 11:29:59'),
(3, '1', '1', '1@com', 'c4ca4238a0b923820dcc509a6f75849b', '0001-01-01', '1', 1, '2020-03-09 18:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcollectors`
--
ALTER TABLE `tblcollectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrecyclers`
--
ALTER TABLE `tblrecyclers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcollectors`
--
ALTER TABLE `tblcollectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblrecyclers`
--
ALTER TABLE `tblrecyclers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
