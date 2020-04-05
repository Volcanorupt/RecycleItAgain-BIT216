-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 05:57 AM
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
-- Database: `ecosave`
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
(10, 'Plastic', 'Plastic is material consisting of any of a wide range of synthetic or semi-synthetic organic compounds that are malleable and so can be molded into solid objects', '7', '2020-03-24 08:17:36'),
(11, 'Steel', 'Steel is an alloy of iron and carbon, and sometimes other elements like chromium. ', '9', '2020-03-24 08:18:11'),
(12, 'Newspaper', 'A newspaper is a periodical publication containing written information about current events and is often typed in black ink with a white or gray background', '2', '2020-03-24 08:18:49'),
(23, 'Metal', 'A metal is a material that, when freshly prepared, polished, or fractured, shows a lustrous appearance, and conducts electricity and heat relatively well.', '15', '2020-04-05 03:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `Name` varchar(110) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CollectDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `TotalPoints` int(11) NOT NULL,
  `Weights` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `Name`, `Description`, `PostingDate`, `CollectDate`, `Status`, `IsRead`, `TotalPoints`, `Weights`, `cid`, `uid`) VALUES
(64, 'Plastic', '', '2020-04-05 03:41:21', '2020-04-05 11:52:28 ', 1, 0, 21, 3, 1, 2),
(65, 'Steel', '', '2020-04-05 03:41:29', '2020-04-05 11:52:35 ', 2, 0, 36, 4, 1, 2),
(66, 'Newspaper', '', '2020-04-05 03:45:14', NULL, 0, 0, 12, 6, NULL, 2),
(67, 'Metal', '', '2020-04-05 03:54:54', NULL, 0, 0, 135, 9, NULL, 10),
(68, 'Newspaper', '', '2020-04-05 03:55:02', NULL, 0, 0, 24, 12, NULL, 10);

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
(1, 'Ho Ken Wye Ryan', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Taman Tun Dr Ismail', '0', 1, '2017-11-10 13:40:02'),
(2, 'Blake Yap Soon Keong', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'Jalan Setiajasa', '0', 2, '2017-11-10 11:29:59'),
(3, 'Admin', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Admin Road', '0', 3, '2020-03-21 06:49:01'),
(9, 'Collector 4', '4', 'a87ff679a2f3e71d9181a67b7542122c', '4th Road', '0', 1, '2020-04-05 03:54:03'),
(10, 'Recycler 5', '5', 'e4da3b7fbbce2345d7772b0674a318d5', '5th Street', '0', 2, '2020-04-05 03:54:33');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
