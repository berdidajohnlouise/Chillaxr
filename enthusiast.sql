-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 10:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saas`
--

-- --------------------------------------------------------

--
-- Table structure for table `enthusiast`
--

CREATE TABLE IF NOT EXISTS `enthusiast` (
  `EnthusiastID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `paypal` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`EnthusiastID`),
  UNIQUE KEY `EnthusiastID` (`EnthusiastID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enthusiast`
--

INSERT INTO `enthusiast` (`EnthusiastID`, `username`, `password`, `name`, `contact`, `email`, `address`, `sex`, `bday`, `paypal`, `image`, `status`) VALUES
(1, 'michi123', '42ed7cf66390aa7b8aab31b71f64df40', 'Michelle Cabs', '2147483647', 'antit2009@yahoo.com', 'cebu', 'Male', '0000-00-00', 'gfgffdfd', 'jesus7.jpg', 'OFF'),
(2, 'antit123', '1ec5d88cfca0e40575a2646a3b2451cc', 'antit pagusara', '09434013536', 'antit2004@yahoo.com', 'lahug', 'Male', '0000-00-00', '34545', 'chairman.jpg', 'ON');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
