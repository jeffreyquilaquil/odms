-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 06:06 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `odms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE IF NOT EXISTS `tblaccount` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `indexname` varchar(20) NOT NULL,
  `access` enum('full','users','document','organization') NOT NULL,
  `status` int(2) NOT NULL,
  `designation` int(4) NOT NULL,
  `office` int(4) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`staffID`, `username`, `password`, `firstname`, `middlename`, `lastname`, `indexname`, `access`, `status`, `designation`, `office`, `created`, `updated`) VALUES
(1, 'jnquilaquil', '15bce0effdad0f222f63d61eaf4702e2', 'Jeffrey Noel', 'Ladan', 'Quilaquil', '', 'full', 1, 1, 1, '2018-02-01', '2018-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

CREATE TABLE IF NOT EXISTS `tbldesignation` (
  `desigID` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`desigID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `tblfiles` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `authorID` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblfiles`
--

INSERT INTO `tblfiles` (`fileID`, `title`, `authorID`, `size`, `status`, `created`) VALUES
(1, 'The Great Depression', 1, 254, 1, '2018-02-08 12:31:37'),
(2, 'The Great Escape', 1, 253, 1, '2018-02-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogaccess`
--

CREATE TABLE IF NOT EXISTS `tbllogaccess` (
  `accID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL,
  `userid` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

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
(64, 1, '1', '2018-06-05 14:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbloffice`
--

CREATE TABLE IF NOT EXISTS `tbloffice` (
  `offID` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`offID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbloffice`
--

INSERT INTO `tbloffice` (`offID`, `title`) VALUES
(1, 'Records'),
(2, 'Accounting'),
(3, 'Cashier');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
