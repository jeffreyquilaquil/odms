-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 01:24 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccess`
--

CREATE TABLE `tblaccess` (
  `access_id` int(11) NOT NULL,
  `access` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccess`
--

INSERT INTO `tblaccess` (`access_id`, `access`) VALUES
(1, 'full'),
(3, 'users'),
(4, 'document'),
(5, 'organization');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `staffID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `indexname` varchar(20) NOT NULL,
  `access` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1 = active; 0 = inactive',
  `designation` int(4) NOT NULL,
  `office` int(4) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`staffID`, `username`, `password`, `firstname`, `middlename`, `lastname`, `indexname`, `access`, `status`, `designation`, `office`, `created`, `updated`) VALUES
(1, 'jnquilaquil', '15bce0effdad0f222f63d61eaf4702e2', 'Jeffrey Noel', 'L', 'Quilaquil', '', 'full,organization', 1, 2, 2, '2018-02-01', '2018-02-01'),
(2, 'admin', '6af35324f6772a1c22ff698432a5a713', 'admin', 'A', 'admin', '', 'full', 1, 5, 3, '2018-08-20', '0000-00-00'),
(3, 'bsurima', '6af35324f6772a1c22ff698432a5a713', 'Brenjelyn', 'N', 'Surima', '', 'full', 1, 5, 3, '2018-09-02', '0000-00-00'),
(4, 'jcgimena', '6af35324f6772a1c22ff698432a5a713', 'John Carlo', 'C', 'Gimena', '', 'full', 0, 5, 2, '2018-08-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

CREATE TABLE `tbldesignation` (
  `desigID` int(6) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldesignation`
--

INSERT INTO `tbldesignation` (`desigID`, `title`) VALUES
(1, 'General Manager'),
(2, 'Head Librarian'),
(3, 'Cashier'),
(4, 'Assistant Accountant'),
(5, 'Head Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `tblfiles`
--

CREATE TABLE `tblfiles` (
  `fileID` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `authorID` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 = active; 0 = inactive',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfiles`
--

INSERT INTO `tblfiles` (`fileID`, `title`, `authorID`, `size`, `status`, `created`) VALUES
(1, 'The Great Depression', 2, 254, 1, '2018-02-08 12:31:37'),
(2, 'The Great Escape', 2, 253, 1, '2018-02-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogaccess`
--

CREATE TABLE `tbllogaccess` (
  `accID` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `userid` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogaccess`
--

INSERT INTO `tbllogaccess` (`accID`, `type`, `userid`, `timestamp`) VALUES
(1, 1, 'jnquilaquil', '2018-02-01 17:49:33'),
(2, 1, 'jnquilaquil', '2018-02-05 09:40:26'),
(3, 1, 'jnquilaquil', '2018-02-08 14:08:40'),
(4, 1, 'jnquilaquil', '2018-02-10 04:03:44'),
(5, 1, 'jnquilaquil', '2018-02-10 13:47:18'),
(6, 1, 'jnquilaquil', '2018-02-13 13:48:37'),
(7, 1, 'jnquilaquil', '2018-02-13 15:15:28'),
(8, 0, 'jnquilaquil', '2018-02-13 15:27:35'),
(9, 1, 'jnquilaquil', '2018-02-13 15:27:44'),
(10, 0, 'jnquilaquil', '2018-02-13 15:27:55'),
(11, 1, 'jnquilaquil', '2018-02-13 15:28:10'),
(12, 0, 'jnquilaquil', '2018-02-13 15:32:31'),
(13, 1, 'jnquilaquil', '2018-02-13 15:32:52'),
(14, 0, 'jnquilaquil', '2018-02-13 15:34:14'),
(15, 1, 'jnquilaquil', '2018-02-13 15:34:23'),
(16, 0, 'jnquilaquil', '2018-02-13 15:35:43'),
(17, 1, 'jnquilaquil', '2018-02-13 15:35:53'),
(18, 0, 'jnquilaquil', '2018-02-13 15:38:22'),
(19, 1, 'jnquilaquil', '2018-02-13 15:38:32'),
(20, 0, 'jnquilaquil', '2018-02-13 15:45:56'),
(21, 1, 'jnquilaquil', '2018-02-13 15:47:09'),
(22, 0, 'jnquilaquil', '2018-02-13 15:48:33'),
(23, 1, 'jnquilaquil', '2018-02-13 15:48:55'),
(24, 0, 'jnquilaquil', '2018-02-13 15:52:56'),
(25, 1, 'jnquilaquil', '2018-02-13 15:53:07'),
(26, 0, 'jnquilaquil', '2018-02-13 15:53:44'),
(27, 1, 'jnquilaquil', '2018-02-13 15:54:09'),
(28, 0, 'jnquilaquil', '2018-02-13 15:57:35'),
(29, 1, 'jnquilaquil', '2018-02-13 15:57:54'),
(30, 0, 'jnquilaquil', '2018-02-13 15:58:22'),
(31, 1, 'jnquilaquil1', '2018-02-13 15:58:37'),
(32, 0, 'jnquilaquil1', '2018-02-13 15:58:42'),
(33, 0, 'jnquilaquil1', '2018-02-13 15:58:43'),
(34, 0, '1', '2018-02-13 16:02:23'),
(35, 1, '1', '2018-02-13 16:02:33'),
(36, 0, '1', '2018-02-13 16:11:48'),
(37, 1, '1', '2018-02-13 16:12:07'),
(38, 1, '1', '2018-02-13 17:16:43'),
(39, 1, '1', '2018-02-15 14:24:15'),
(40, 0, '1', '2018-02-15 16:30:58'),
(41, 1, '1', '2018-02-15 16:31:08'),
(42, 0, '1', '2018-02-15 16:32:22'),
(43, 1, '1', '2018-02-15 16:32:45'),
(44, 1, '1', '2018-02-20 13:47:25'),
(45, 1, '1', '2018-02-21 15:16:44'),
(46, 1, '1', '2018-02-24 13:39:35'),
(47, 1, '1', '2018-02-26 14:38:37'),
(48, 1, '1', '2018-03-03 13:01:00'),
(49, 1, '1', '2018-03-07 14:43:52'),
(50, 1, '1', '2018-03-12 14:27:24'),
(51, 1, '1', '2018-03-12 15:37:39'),
(52, 1, '1', '2018-03-17 08:31:13'),
(53, 1, '1', '2018-03-19 15:22:02'),
(54, 1, '1', '2018-03-20 14:36:29'),
(55, 1, '1', '2018-03-28 19:36:43'),
(56, 1, '1', '2018-03-29 12:42:20'),
(57, 1, '1', '2018-04-05 15:33:53'),
(58, 1, '1', '2018-04-07 10:19:14'),
(59, 1, '1', '2018-04-16 15:50:49'),
(60, 1, '1', '2018-04-17 16:20:47'),
(61, 1, '1', '2018-04-29 14:48:28'),
(62, 1, '1', '2018-05-02 16:06:46'),
(63, 1, '1', '2018-05-06 15:22:34'),
(64, 1, '1', '2018-06-05 14:53:57'),
(65, 1, '1', '2018-08-10 18:19:43'),
(66, 1, '1', '2018-08-13 15:41:23'),
(67, 1, '1', '2018-08-18 06:22:33'),
(68, 1, '1', '2018-08-18 10:24:37'),
(69, 1, '1', '2018-08-20 16:38:10'),
(70, 1, '2', '2018-08-21 07:39:18'),
(71, 1, '2', '2018-08-21 11:14:53'),
(72, 1, '1', '2018-08-21 14:44:59'),
(73, 0, '1', '2018-08-21 15:58:13'),
(74, 1, '1', '2018-08-21 16:19:24'),
(75, 1, '1', '2018-08-25 08:47:39'),
(76, 1, '1', '2018-08-25 15:14:45'),
(77, 1, '1', '2018-08-28 17:09:27'),
(78, 1, '1', '2018-08-30 15:35:48'),
(79, 0, '1', '2018-08-30 15:36:16'),
(80, 1, '2', '2018-08-30 15:36:24'),
(81, 1, '2', '2018-09-01 08:02:52'),
(82, 1, '2', '2018-09-01 11:59:18'),
(83, 1, '2', '2018-09-02 08:52:35'),
(84, 1, '2', '2018-09-02 15:32:32'),
(85, 1, '2', '2018-09-05 18:16:05'),
(86, 1, '2', '2018-09-12 16:50:14'),
(87, 1, '2', '2018-09-13 18:14:21'),
(88, 1, '2', '2018-09-16 08:49:05'),
(89, 1, '2', '2018-09-16 16:59:03'),
(90, 1, '2', '2018-09-18 00:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbloffice`
--

CREATE TABLE `tbloffice` (
  `offID` int(5) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbloffice`
--

INSERT INTO `tbloffice` (`offID`, `title`) VALUES
(1, 'Records'),
(2, 'Accounting'),
(3, 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccess`
--
ALTER TABLE `tblaccess`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `tbldesignation`
--
ALTER TABLE `tbldesignation`
  ADD PRIMARY KEY (`desigID`);

--
-- Indexes for table `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `tbllogaccess`
--
ALTER TABLE `tbllogaccess`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `tbloffice`
--
ALTER TABLE `tbloffice`
  ADD PRIMARY KEY (`offID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccess`
--
ALTER TABLE `tblaccess`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldesignation`
--
ALTER TABLE `tbldesignation`
  MODIFY `desigID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfiles`
--
ALTER TABLE `tblfiles`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogaccess`
--
ALTER TABLE `tbllogaccess`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbloffice`
--
ALTER TABLE `tbloffice`
  MODIFY `offID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
