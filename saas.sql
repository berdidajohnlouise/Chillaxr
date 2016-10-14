-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 01:16 PM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryid_UNIQUE` (`categoryid`),
  KEY `key_1`(`id`, `categoryid`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subid` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscriptionid` varchar(50) NOT NULL,
  
  PRIMARY KEY (`subid`),
  UNIQUE KEY `subscriptionid_UNIQUE`(`subscriptionid`),
  KEY `key_2`(`subid`, `subscriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------






--
-- Table structure for table `entertainmentestablishment`
--

CREATE TABLE IF NOT EXISTS `entertainmentestablishment` (
  `mem_id` int(3) NOT NULL AUTO_INCREMENT,
  `eeid` varchar(10) NOT NULL DEFAULT '',
   `categoryid` varchar(15) NOT NULL,
   `subscriptionid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `owner` varchar(30) NOT NULL,
  `eelat` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `timeopen` time NOT NULL,
  `timeclose` time NOT NULL,
  `paypal` varchar(30) NOT NULL,
  `status` text NOT NULL,
  `eestartdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eeid`),
  KEY `entertainmentestablishment_category_fk` (`categoryid`),
  CONSTRAINT `entertainmentestablishment_category_fk` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`) ON DELETE RESTRICT ON UPDATE CASCADE,
  KEY `entertainmentestablishment_subscription_fk` (`subscriptionid`),
  CONSTRAINT `entertainmentestablishment_subscription_fk` FOREIGN KEY (`subscriptionid`) REFERENCES `subscription` (`subscriptionid`) ON DELETE RESTRICT ON UPDATE CASCADE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `eeid` (`eeid`),
  UNIQUE KEY `mem_id` (`mem_id`)
  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `enthusiast`
--

INSERT INTO `enthusiast` (`EnthusiastID`, `username`, `password`, `name`, `contact`, `email`, `address`, `sex`, `bday`, `paypal`, `image`, `status`) VALUES
(1, 'michi123', '42ed7cf66390aa7b8aab31b71f64df40', 'Michelle Cabs', '2147483647', 'antit2009@yahoo.com', 'cebu', 'Male', '0000-00-00', 'gfgffdfd', '24-nature-photography-sunrise-by-bobfugate.jpg', 'ON'),
(2, 'antit123', '1ec5d88cfca0e40575a2646a3b2451cc', 'antit pagusara', '09434013536', 'antit2004@yahoo.com', 'lahug', 'Male', '0000-00-00', '34545', 'chairman.jpg', 'ON'),
(3, 'jepps300', '4a519956db9b99d8724184097ffe6146', 'jeffrey', '09326868371', 'jeffrey@gmail.com', 'duljo', 'Male', '1956-10-18', '4tlllflflf', 'gravatar.jpg', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `eventbudget`
--

CREATE TABLE IF NOT EXISTS `eventbudget` (
  `eventbudgetid` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `event_owner` varchar(100) NOT NULL,
  PRIMARY KEY (`eventbudgetid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eventbudget`
--

INSERT INTO `eventbudget` (`eventbudgetid`, `name`, `description`, `price`, `event_owner`) VALUES
(1, 'Package A', 'ayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF ssddsssWEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFEayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF ssddsssWEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFEayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF ssddsssWEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFEWHJWGHAGewje weiuggiuayet jferkgjenr huhuhu sdfwjehfiwuf ewfhwiehffJEFWJEFNEWJF WEFWENFE', '1000.00', '1'),
(2, 'package nmo', 'Mao ni si packageMao ni si packageMao ni si packagevvMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si packageMao ni si package', '10000.00', '1'),
(3, 'package z', 'gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya gwapa kunu siya ', '200.00', '1'),
(4, 'pacage o', 'Akoy isang pinoy may pusong vanilla Akoy isang pinoy may pusng chessecake Akoy isang pinoy may pusng chessecake vAkoy isang pinoy may pusng chessecakeAkoy isang pinoy may pusng chessecakeAkoy isang pinoy may pusng chessecake', '600.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `RatingID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Feedback` varchar(250) NOT NULL,
  `Criteria` varchar(50) NOT NULL,
  `EEID` int(11) NOT NULL,
  `EnthusiastID` int(11) NOT NULL,
  PRIMARY KEY (`RatingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `GraceTime` time NOT NULL,
  `QrCode` int(11) NOT NULL,
  `Terms` varchar(250) NOT NULL,
  `Online_payment` int(11) NOT NULL,
  `EnthusiastID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ServicesID` int(11) NOT NULL AUTO_INCREMENT,
  `Desc` varchar(250) NOT NULL,
  `EEID` int(11) NOT NULL,
  `RoomsID` int(11) NOT NULL,
  `ProductsID` int(11) NOT NULL,
  PRIMARY KEY (`ServicesID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `servicesreservation`
--

CREATE TABLE IF NOT EXISTS `servicesreservation` (
  `SRID` int(11) NOT NULL AUTO_INCREMENT,
  `TotalDue` decimal(10,0) NOT NULL,
  `Balance` decimal(10,0) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `AmountPaid` decimal(10,0) NOT NULL,
  `DatePaid` date NOT NULL,
  `ServicesID` int(11) NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `DateServiceReserve` date NOT NULL,
  PRIMARY KEY (`SRID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


