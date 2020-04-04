-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 03:30 AM
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
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Points` varchar(200) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `Name`, `Description`, `Points`, `CreationDate`) VALUES
(9, 'Aluminium', 'Aluminium is a chemical element with the symbol Al and atomic number 13. It is a silvery-white, soft, non-magnetic and ductile metal in the boron group', '5', '2020-03-24 08:16:52'),
(10, 'Plastic', 'Plastic is material consisting of any of a wide range of synthetic or semi-synthetic organic compounds that are malleable and so can be molded into solid objects', '7', '2020-03-24 08:17:36'),
(11, 'Steel', 'Steel is an alloy of iron and carbon, and sometimes other elements like chromium. ', '9', '2020-03-24 08:18:11'),
(12, 'Newspaper', 'A newspaper is a periodical publication containing written information about current events and is often typed in black ink with a white or gray background', '2', '2020-03-24 08:18:49'),
(15, 'Test', '1', '1', '2020-03-24 15:27:15'),
(16, 'Test', '2', '2', '2020-03-24 15:58:21'),
(17, 'test', '3', '3', '2020-03-24 15:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `Name` varchar(110) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `TotalPoints` int(11) NOT NULL,
  `Weights` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `Name`, `Description`, `PostingDate`, `AdminRemarkDate`, `Status`, `IsRead`, `TotalPoints`, `Weights`, `uid`) VALUES
(7, 'Metal', '', '2017-11-19 13:11:21', '2017-12-02 23:26:27 ', 2, 1, 0, 0, 6),
(8, 'Medical Leave test', '', '2017-11-20 11:14:14', '2017-12-02 23:24:39 ', 1, 1, 0, 0, 7),
(9, 'Medical Leave test', '', '2017-12-02 18:26:01', '2020-03-25 8:54:07 ', 2, 1, 0, 0, 6),
(12, 'Metal', '', '2020-03-25 04:07:31', '2020-03-29 20:29:32 ', 1, 1, 0, 0, 7),
(55, 'Aluminium', '', '2020-03-29 14:21:41', '2020-03-29 21:28:18 ', 1, 1, 105, 21, 7),
(56, 'Newspaper', '', '2020-03-29 15:59:28', NULL, 0, 0, 46, 23, 2),
(57, 'Newspaper', '', '2020-03-29 15:59:48', NULL, 0, 0, 46, 23, 2),
(58, 'Newspaper', '', '2020-03-29 15:59:51', NULL, 0, 0, 2, 1, 2),
(59, 'Newspaper', '', '2020-03-29 15:59:58', NULL, 0, 0, 4, 2, 2),
(60, 'Newspaper', '', '2020-03-29 16:00:11', NULL, 0, 0, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(150) NOT NULL,
  `username` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Points` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Fullname`, `username`, `Password`, `Address`, `Points`, `Status`, `RegDate`) VALUES
(1, 'Hi', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'KLa', '0', 1, '2017-11-10 13:40:02'),
(2, 'Anuj', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'India', '0', 2, '2017-11-10 11:29:59'),
(3, 'yapsoon keong', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jalan setiajasa', '0', 3, '2020-03-21 06:49:01'),
(4, '32', '32', '6364d3f0f495b6ab9dcf8d3b5c6e0b01', '32', '0', 1, '2020-03-29 07:15:04'),
(5, '43', '43', '17e62166fc8586dfa4d1bc0e1742c08b', '43', '0', 1, '2020-03-29 07:15:35'),
(6, '11', '11', '6512bd43d9caa6e02c990b0a82652dca', '11', '0', 2, '2020-03-29 07:15:58'),
(7, '13', '13', 'c51ce410c124a10e0db5e4b97fc2af39', '13', '0', 2, '2020-03-29 07:18:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
