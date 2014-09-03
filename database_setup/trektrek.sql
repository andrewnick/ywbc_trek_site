-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2014 at 05:35 am
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trek`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account`
--


-- --------------------------------------------------------

--
-- Table structure for table `gear`
--

CREATE TABLE IF NOT EXISTS `gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gear`
--


-- --------------------------------------------------------

--
-- Table structure for table `gearTotramp`
--

CREATE TABLE IF NOT EXISTS `gearTotramp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tramp_id` int(11) NOT NULL,
  `gear_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gearTotramp`
--


-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tramp_id` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xPoint` int(11) NOT NULL,
  `yPoint` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `tramp_id`, `location_name`, `location_type`, `xPoint`, `yPoint`) VALUES
(1, 1, 'Kauri', 'Tramp', 3, 4),
(2, 2, 'Matai', 'Hike', 5, 6),
(3, 4, 'Totra', 'Walk', 7, 2),
(4, 1, 'Hill', 'Walk', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tramp`
--

CREATE TABLE IF NOT EXISTS `tramp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(255) NOT NULL,
  `tramp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tramp`
--

INSERT INTO `tramp` (`id`, `account_id`, `tramp_name`) VALUES
(1, 1, 'Heafy'),
(2, 2, 'Milford'),
(3, 1, 'Family Track'),
(4, 3, 'Milford Tramp'),
(5, 4, 'Abelly');
