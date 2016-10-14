-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2016 at 01:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chillaxr`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(6) NOT NULL AUTO_INCREMENT,
  `eeid` int(11) NOT NULL,
  `announcement_name` varchar(60) NOT NULL,
  `announcement_details` text NOT NULL,
  `announcement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `announcement_img` varchar(100) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `eeid`, `announcement_name`, `announcement_details`, `announcement_date`, `announcement_img`) VALUES
(2, 4, 'Sample Announcement', 'This is a sample announcement', '2016-05-12 18:24:22', 'surf.jpg'),
(3, 4, 'asdasd', 'asdasd', '2016-05-14 18:56:59', 'sunset.jpg'),
(4, 5, 'gh', 'gdgdrdxdzgdrhdfxd', '2016-05-17 07:53:32', 'tiger.jpg'),
(5, 4, 'My Announcement', 'This is my third annoucement This is my third annoucement This is my third annoucement This is my third annoucement This is my third annoucement This is my third annoucement This is my third annoucement', '2016-05-23 02:12:33', '3d43d5410ddcd1012b75a8b5ed15037b.jpg'),
(6, 4, 'fjsdkfdashfkjae', 'xfkjsdfhdskjfsdklvdflvndfgndfklgfkljgfsjgsdfv dijdflvjsdlfgdfiogj vdsnglsvldsjtds lfjsaflsdvlksdaf dfjjdasjlkfsdigjasv vjsogsdlkgasifj fjdshfsfnlskfjsdifjm dslghsjtflkscjslfjn ', '2016-05-23 05:00:56', 'b6130ab71f04b628353f92304ff52419.jpg'),
(7, 6, 'Makapadani', 'hahahah', '2016-05-23 05:14:57', '52ab89698f90922f077831c824e43353.jpg'),
(8, 9, 'Ayet', 'jfdskfjashfkajwhfkjwfwe', '2016-05-23 04:14:06', 'announcement1.jpg'),
(9, 10, 'Victor Frankenstein.', ' Told from Igor''s perspective, we see the troubled young assistant''s dark origins, his redemptive friendship with the young medical   student Viktor Von Frankenstein, and become  eyewitnesses to the emergence of how Frankenstein became the man - and the legend - we know today.', '2016-05-23 04:37:41', 'announcement.jpg'),
(10, 9, 'This is it', 'huhuhu kulba sa life', '2016-05-23 04:54:12', 'announcement1.jpg'),
(11, 9, 'new product', 'new foods all', '2016-05-26 04:36:52', 'nachosalsa.jpg'),
(12, 8, 'Anouncemet', 'This is our new annncement', '2016-09-22 07:45:22', 'homepage_large.fe6d41d4.jpg'),
(13, 12, 'Announcement', 'ka atay', '2016-09-22 10:40:04', '24-nature-photography-sunrise-by-bobfugate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryid_UNIQUE` (`categoryid`),
  KEY `key_1` (`id`,`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryid`) VALUES
(4, 'KTV Studio'),
(2, 'Movie House');

-- --------------------------------------------------------

--
-- Table structure for table `entertainmentestablishment`
--

CREATE TABLE IF NOT EXISTS `entertainmentestablishment` (
  `eeid` int(11) NOT NULL AUTO_INCREMENT,
  `lat` varchar(11) NOT NULL,
  `long` varchar(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subscriptionid` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  `establishment_name` varchar(100) NOT NULL,
  `establishment_contact` varchar(15) NOT NULL,
  `establishment_email` varchar(50) NOT NULL DEFAULT '',
  `establishment_owner` varchar(30) NOT NULL,
  `establishment_address` varchar(100) NOT NULL,
  `establishment_image` varchar(100) NOT NULL,
  `establishment_timeopen` time NOT NULL,
  `establishment_timeclose` time NOT NULL,
  `establishment_paypal` varchar(30) NOT NULL,
  `establishment_status` text NOT NULL,
  `establishment_startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eeid`),
  UNIQUE KEY `establishment_email` (`establishment_email`),
  KEY `entertainmentestablishment_category_fk` (`categoryid`),
  KEY `entertainmentestablishment_subscription_fk` (`subscriptionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `entertainmentestablishment`
--

INSERT INTO `entertainmentestablishment` (`eeid`, `lat`, `long`, `categoryid`, `subscriptionid`, `username`, `password`, `establishment_name`, `establishment_contact`, `establishment_email`, `establishment_owner`, `establishment_address`, `establishment_image`, `establishment_timeopen`, `establishment_timeclose`, `establishment_paypal`, `establishment_status`, `establishment_startdate`) VALUES
(8, '1.2332', '1.123123', 4, 'Premium', 'songhits', '513b44d62a9dc24a9d7f9b76c7e9686f', 'Song Hits', '09234567891', 'songhits@gmail.com', 'Jason Catubig', 'Ground Floor, Two Mango Avenue, General Maxilom Ave, Cebu City, 6000 Cebu', 'songhits.jpg', '04:00:00', '23:00:00', '090dssww', 'ON', '2016-09-24 22:14:03'),
(9, '10.302911', '123.913350', 4, 'Premium', 'myktvstudio', '5c1bd6ffbc11890eb9e868b993f76917', 'My KTV Studio', '05432559', 'myktvstudio@gmail.com', 'Henry Sy', 'Crossroads, Gov. M. Cuenco Avenue, Banilad', 'K1ktvstudio.jpg', '03:00:00', '00:00:00', 'myktvstudio@gmail.com', 'ON', '2016-09-23 19:48:29'),
(13, '', '', 4, '', 'jLkisni', 'f6fdffe48c908deb0f4c3bd36c032e72', 'John', '123456789', 'jLkisni@yahoo.com', 'John', 'mambaling Cebu City', 'Tulips.jpg', '13:00:00', '21:00:00', '', 'ON', '2016-09-24 10:49:20'),
(14, '', '', 4, '', 'dojiemike', 'c775e12c2ddcdcba599e673471231d52', 'Dojie Establishment', '123456789', 'dojie@yahoo.com', 'Dojie', 'Pardo Cebu City', '45300.jpg', '13:00:00', '18:00:00', '', 'ON', '2016-09-25 07:42:37'),
(15, '', '', 2, '', 'halanoh', '06c2461c6d17a6a080d98c06fb51e759', 'HALANOH', '123456789', 'halanoh@yahoo.com', 'Halanoh', 'Cebu City', 'Penguins.jpg', '13:00:00', '18:00:00', '', '', '2016-09-25 07:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `enthusiast`
--

CREATE TABLE IF NOT EXISTS `enthusiast` (
  `EnthusiastID` int(11) NOT NULL AUTO_INCREMENT,
  `enthusiast_username` varchar(50) NOT NULL,
  `enthusiast_password` varchar(50) NOT NULL,
  `enthusiast_name` varchar(50) NOT NULL,
  `enthusiast_contact` varchar(20) NOT NULL,
  `enthusiast_email` varchar(50) NOT NULL,
  `enthusiast_address` varchar(100) NOT NULL,
  `enthusiast_sex` varchar(6) NOT NULL,
  `enthusiast_bday` date NOT NULL,
  `enthusiast_paypal` varchar(50) NOT NULL,
  `enthusiast_image` varchar(100) NOT NULL,
  `enthusiast_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`EnthusiastID`),
  UNIQUE KEY `EnthusiastID` (`EnthusiastID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `enthusiast`
--

INSERT INTO `enthusiast` (`EnthusiastID`, `enthusiast_username`, `enthusiast_password`, `enthusiast_name`, `enthusiast_contact`, `enthusiast_email`, `enthusiast_address`, `enthusiast_sex`, `enthusiast_bday`, `enthusiast_paypal`, `enthusiast_image`, `enthusiast_status`) VALUES
(1, 'asnaui', 'haha', 'bi -i rty', '28434678785', 'mcabotero@gmail.com', 'cebu', 'Female', '1995-09-05', '', '18196.jpg', 1),
(2, 'fafau', 'gsgss', 'xd gd ydhd', '5421', 'gsgsg', 'gsgs', 'Female', '2018-01-02', '', '', 1),
(3, 'zehaha', 'haha', 'Snauigsg gs gsgs', '85545', 'gg', 'sgsg', 'Female', '2013-09-25', '', '18196.jpg', 1),
(4, 'ggk', 'kk', 'Asnaui Optina Pangcatan', '09432380093', 'gagagag@gmail.com', 'Cebu City', 'Male', '1996-08-13', '', '18211.jpg', 1),
(5, 'potato', 'ttt', 'MIN buuu park', '095552489', 'jjj@gmail.com', ';jj cebu', 'Female', '1999-01-08', '', '', 1),
(6, 'buen123', '81dc9bdb52d04dc20036dbd8313ed055', 'Chamz Lopez', '092345385646', 'tiks29@yahoo.com', 'CeBU cITY', 'Male', '1997-01-01', '', 'gravatar.jpg', 0),
(7, 'bunnywa15', '004202f60d192f61ab9b5b49a7e76400', 'Susan Sunkyu', '8319920', 'iamleesusan@gmail.com', 'cebu city', 'Female', '1989-05-15', '', 'gravatar.jpg', 0),
(8, 'jepps123', '2c4ccd92a5bf076789df52afdef80712', 'jeffrey', '09476868271', 'jeffrey@gmail.com', 'cebu city', 'Male', '1994-03-08', '', 'gravatar.jpg', 0),
(9, 'susan', 'susan', 'Christine Gwapa Glipa', '09876453124', 'glipa@gmail.com', 'Tisa, Cebu City', 'Female', '1994-12-06', '', '45296.jpg', 1),
(10, 'ahhyet123', '4b12be44be18e59db5bd1683f8424e7e', 'Clarisse Montemayor Vilvestre', '5349640', 'ahhyet@gmail.com', 'Cebu City', 'Female', '1996-01-01', '', 'tanduayice.JPG', 0),
(11, 'michiii', 'michiii', 'michÃ¨llÃ¨ b baboy', '09434807399', 'michii@gmail.com', 'cebu city', 'Female', '1981-12-04', '', '42342.jpg', 1),
(12, 'dojiemike', 'c775e12c2ddcdcba599e673471231d52', 'dojiemikevillarin', '09423719908', 'demnzmonxter@gmail.com', 'duljo fatima', 'Male', '1996-01-05', '', 'announcement.jpg', 0),
(13, 'bunny', 'yaya', 'JadÃ¨ b carabana', '09434807399', 'jade@gmail.com', 'cÃ¨bu city', 'Female', '1996-03-04', '', '45295.jpg', 1),
(14, 'potatohyomin', '799072e989d2409180f86978be27bba2', 'Michelle Jenn', '075543', 'michelle@gmail.com', 'cebu city guadalupe', 'Female', '1995-09-05', '', 'gravatar.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventbudget`
--

CREATE TABLE IF NOT EXISTS `eventbudget` (
  `eventbudgetid` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `eventbudget_name` varchar(30) NOT NULL,
  `eventbudget_description` text NOT NULL,
  `eventbudget_price` decimal(10,2) NOT NULL,
  `eventbudget_image` varchar(100) NOT NULL,
  `event_owner` int(11) NOT NULL,
  `time_range` int(11) NOT NULL,
  PRIMARY KEY (`eventbudgetid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `eventbudget`
--

INSERT INTO `eventbudget` (`eventbudgetid`, `roomid`, `eventbudget_name`, `eventbudget_description`, `eventbudget_price`, `eventbudget_image`, `event_owner`, `time_range`) VALUES
(16, 135, 'Package A', '2 hawaaiin pizza 2 tanduay ice', '1230.00', 'bigscreen.jpg', 8, 5),
(17, 135, 'Package B', '	2 hawaaiin pizza 2 tanduay ice', '5400.00', 'Penguins.jpg', 8, 5),
(19, 83, 'Package D', '3 hawaain pizza', '1000.00', '', 9, 5),
(20, 71, 'Package C', 'Test Package', '10.00', '', 9, 5),
(21, 84, 'Package E', '3 hawain pizza', '1200.00', '', 9, 4),
(22, 88, 'Package D', '2 tanduay ice\r\n2 hawaaiin pizza', '7654.00', '44994.jpg', 8, 5),
(23, 95, 'Package A', '2 Nacho\r\n2 hawaaiin pizza', '540.00', '', 10, 5),
(24, 46, 'Package C', '2 nacho\r\n2 hawaaiin pizza', '666.00', '', 10, 4),
(26, 108, 'deluxksuu', 'This is a basic room for yoou.', '1200.00', '', 12, 4),
(27, 88, 'package E', 'This is the package E', '400.00', '15850.jpg', 8, 4),
(28, 114, 'dcndsjcn', 'dwdjdnwkf', '90.00', '', 12, 6),
(30, 138, 'Package A', 'Choy kaayu', '200.00', '', 13, 2),
(32, 88, 'Package F', 'asdsadas', '200.00', '38415.jpg', 8, 2),
(33, 88, 'Package G', 'HAHA', '500.00', 'Spicy Hawaiian Pizza.jpg', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EEID` int(11) NOT NULL,
  `EnthusiastID` int(11) NOT NULL,
  `Feedback` text NOT NULL,
  PRIMARY KEY (`FeedbackID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `Date`, `EEID`, `EnthusiastID`, `Feedback`) VALUES
(1, '2016-05-17 00:06:06', 4, 6, 'beautifull movie house :)'),
(4, '2016-05-17 00:25:19', 4, 6, 'nindot gud kaayo dri eyy... mayta sunod japon me mg movie marathon'),
(6, '2016-05-17 00:25:37', 4, 6, 'why'),
(7, '2016-05-17 00:26:45', 4, 6, 'ook'),
(9, '2016-05-17 00:39:14', 4, 6, 'asdasd'),
(11, '2016-05-17 01:42:02', 4, 6, 'kung ano '),
(13, '2016-05-17 01:44:04', 4, 6, 'bulong'),
(14, '2016-05-17 02:27:48', 1, 6, 'wewe'),
(15, '2016-05-22 02:45:43', 1, 6, 'asdsad'),
(16, '2016-05-27 13:48:08', 9, 8, 'this is my feedback'),
(17, '2016-05-25 22:50:43', 9, 8, 'nindot dinhi ai kay lami ila lumpia, ang music system great pa jud!'),
(18, '2016-06-02 14:55:28', 9, 8, 'fuck this shit'),
(19, '2016-09-22 12:43:00', 12, 8, 'annyeonghaseyooo');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `eeid` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user`, `eeid`, `status`) VALUES
(5, 1, 1, 1),
(6, 1, 2, 1),
(7, 4, 1, 0),
(8, 3, 1, 1),
(9, 5, 1, 1),
(10, 8, 4, 1),
(11, 8, 7, 0),
(12, 6, 4, 1),
(13, 8, 10, 1),
(14, 10, 9, 1),
(15, 10, 10, 1),
(16, 8, 9, 1),
(17, 9, 8, 1),
(18, 9, 9, 1),
(19, 12, 9, 1),
(20, 14, 8, 1),
(21, 8, 12, 0),
(22, 10, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `action` varchar(80) NOT NULL,
  `datez` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user`, `action`, `datez`, `time`) VALUES
(1, 8, 'You visit SOGO Hotel', '2016-05-16', '10:00:00'),
(2, 8, 'You visit chuchu', '2016-05-20', '07:00:00'),
(192, 1, 'You are looking for establishment', '0000-00-00', '09:43:46'),
(193, 1, 'You are looking for establishment', '0000-00-00', '09:43:46'),
(194, 1, 'You are looking for establishment', '0000-00-00', '09:43:46'),
(227, 3, 'You logged in', '2016-04-01', '00:08:57'),
(228, 3, 'You are looking for establishment', '2016-04-01', '00:09:02'),
(229, 3, 'You logged out', '2016-04-01', '00:09:00'),
(232, 4, 'You logged out', '2016-04-01', '00:10:00'),
(233, 5, 'You logged in', '2016-04-01', '00:14:03'),
(234, 5, 'You are looking for establishment', '2016-04-01', '00:14:09'),
(235, 5, 'You are looking for establishment', '2016-04-01', '00:14:44'),
(236, 5, 'You visit SOGO Hotel Establishment', '2016-04-01', '00:14:45'),
(237, 5, 'You are searching for packages in SOGO Hotel Establishment', '2016-04-01', '00:14:52'),
(238, 5, 'You reserve package Cosplaying Package in establishment SOGO Hotel', '2016-04-01', '00:15:23'),
(239, 5, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-04-01', '00:15:32'),
(240, 5, 'You made a reservation in room Yagami Light in establishment SOGO Hotel', '2016-04-01', '00:15:49'),
(241, 5, 'You visit map, searching address for SOGO Hotel Establishment', '2016-04-01', '00:15:56'),
(242, 5, 'You are looking for establishment', '2016-04-01', '00:17:03'),
(243, 5, 'You visit Grill and Resto Bar Establishment', '2016-04-01', '00:17:05'),
(244, 5, 'You are searching for packages in Grill and Resto Bar Establishment', '2016-04-01', '00:17:07'),
(245, 5, 'You visit SOGO Hotel Establishment', '2016-04-01', '00:17:15'),
(246, 5, 'You are searching for packages in SOGO Hotel Establishment', '2016-04-01', '00:17:17'),
(247, 5, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-04-01', '00:17:24'),
(248, 5, 'You logged out', '2016-04-01', '00:17:00'),
(249, 1, 'You logged in', '2016-05-17', '02:33:02'),
(250, 1, 'You are looking for establishment', '2016-05-17', '02:33:30'),
(251, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:33:33'),
(252, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '02:33:37'),
(253, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:33:41'),
(254, 1, 'You visit map, searching address for SOGO Hotel Establishment', '2016-05-17', '02:33:49'),
(255, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:33:56'),
(256, 1, 'You are looking for establishment', '2016-05-17', '02:34:22'),
(257, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:34:43'),
(258, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:34:46'),
(259, 1, 'You are looking for establishment', '2016-05-17', '02:35:43'),
(260, 1, 'You are looking for establishment', '2016-05-17', '02:36:21'),
(261, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:36:23'),
(262, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:36:26'),
(263, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '02:36:33'),
(264, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:36:39'),
(265, 1, 'You are looking for available rooms in Blue''s Movie House Establishment', '2016-05-17', '02:36:41'),
(266, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '02:36:48'),
(267, 1, 'You are looking for available rooms in Blue''s Movie House Establishment', '2016-05-17', '02:37:04'),
(268, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '02:37:18'),
(269, 1, 'You are looking for establishment', '2016-05-17', '02:38:07'),
(270, 1, 'You are looking for establishment', '2016-05-17', '02:39:10'),
(271, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:39:31'),
(272, 1, 'You visit map, searching address for SOGO Hotel Establishment', '2016-05-17', '02:39:38'),
(273, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '02:39:54'),
(274, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:39:59'),
(275, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '02:40:03'),
(276, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '02:40:04'),
(277, 1, 'You are looking for available rooms in Blue''s Movie House Establishment', '2016-05-17', '02:40:18'),
(278, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:40:30'),
(279, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '02:40:32'),
(280, 1, 'You reserve package Holaaa Hoop in establishment Blue''s Movie House', '2016-05-17', '02:41:33'),
(281, 1, 'You logged out', '2016-05-17', '02:42:00'),
(282, 1, 'You logged in', '2016-05-17', '02:48:52'),
(283, 1, 'You are looking for establishment', '2016-05-17', '02:49:00'),
(284, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:49:01'),
(285, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:49:04'),
(286, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:49:13'),
(287, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:49:17'),
(288, 1, 'You visit map, searching address for Blue''s Movie House Establishment', '2016-05-17', '02:49:18'),
(289, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:49:22'),
(290, 1, 'You visit map, searching address for SOGO Hotel Establishment', '2016-05-17', '02:49:23'),
(291, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '02:49:26'),
(292, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:49:30'),
(293, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '02:49:35'),
(294, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:49:36'),
(295, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '02:49:48'),
(296, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '02:49:52'),
(297, 1, 'You are looking for available rooms in Blue''s Movie House Establishment', '2016-05-17', '02:49:55'),
(298, 1, 'You made a reservation in room El Toro in establishment Blue''s Movie House', '2016-05-17', '02:50:30'),
(299, 1, 'You update your profile', '2016-05-17', '03:04:49'),
(300, 1, 'You logged in', '2016-05-17', '03:05:13'),
(301, 1, 'You logged in', '2016-05-17', '03:05:27'),
(302, 1, 'You logged in', '2016-05-17', '03:05:43'),
(303, 1, 'You update your profile', '2016-05-17', '03:08:11'),
(304, 1, 'You logged in', '2016-05-17', '03:56:07'),
(305, 1, 'You logged out', '2016-05-17', '03:56:00'),
(306, 1, 'You logged in', '2016-05-17', '05:18:57'),
(307, 1, 'You are looking for establishment', '2016-05-17', '05:19:13'),
(308, 1, 'You visit Bunny Sunshine Establishment', '2016-05-17', '05:19:19'),
(309, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '05:20:28'),
(310, 1, 'You visit map, searching address for SOGO Hotel Establishment', '2016-05-17', '05:20:31'),
(311, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '05:20:35'),
(312, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '05:20:46'),
(313, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '05:20:51'),
(314, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '05:20:53'),
(315, 1, 'You are looking for available rooms in Blue''s Movie House Establishment', '2016-05-17', '05:21:05'),
(316, 1, 'You are looking for establishment', '2016-05-17', '05:24:10'),
(317, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '05:24:12'),
(318, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '05:24:16'),
(319, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '05:24:28'),
(320, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '05:24:30'),
(321, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '05:24:44'),
(322, 1, 'You are looking for establishment', '2016-05-17', '05:25:39'),
(323, 1, 'You visit Bunny Sunshine Establishment', '2016-05-17', '05:25:40'),
(324, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '05:26:00'),
(325, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '05:26:05'),
(326, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '05:26:08'),
(327, 1, 'You logged out', '2016-05-17', '05:30:00'),
(328, 1, 'You logged in', '2016-05-17', '05:38:24'),
(329, 1, 'You are looking for establishment', '2016-05-17', '05:38:29'),
(330, 1, 'You visit SOGO Hotel Establishment', '2016-05-17', '05:38:32'),
(331, 1, 'You are searching for packages in SOGO Hotel Establishment', '2016-05-17', '05:38:34'),
(332, 1, 'You are looking for available rooms in SOGO Hotel Establishment', '2016-05-17', '05:38:48'),
(333, 1, 'You visit map, searching address for SOGO Hotel Establishment', '2016-05-17', '05:38:50'),
(334, 1, 'You are looking for establishment', '2016-05-17', '05:41:45'),
(335, 1, 'You visit Blue''s Movie House Establishment', '2016-05-17', '05:41:47'),
(336, 1, 'You visit map, searching address for Blue''s Movie House Establishment', '2016-05-17', '05:41:49'),
(337, 1, 'You are searching for packages in Blue''s Movie House Establishment', '2016-05-17', '05:41:53'),
(338, 1, 'You visit Bunny Sunshine Establishment', '2016-05-17', '05:42:04'),
(339, 1, 'You are searching for packages in Bunny Sunshine Establishment', '2016-05-17', '05:42:06'),
(340, 1, 'You are looking for available rooms in Bunny Sunshine Establishment', '2016-05-17', '05:42:08'),
(341, 1, 'You are searching for packages in Bunny Sunshine Establishment', '2016-05-17', '05:42:17'),
(365, 11, 'You logged in', '2016-05-23', '01:21:45'),
(366, 11, 'You logged out', '2016-05-23', '01:21:00'),
(367, 11, 'You logged in', '2016-05-23', '01:22:00'),
(368, 11, 'You logged out', '2016-05-23', '01:23:00'),
(369, 11, 'You logged in', '2016-05-23', '01:56:54'),
(370, 11, 'You change your profile picture', '2016-05-23', '01:58:11'),
(371, 11, 'You logged out', '2016-05-23', '01:59:00'),
(398, 9, 'You logged out', '2016-05-26', '10:53:00'),
(399, 9, 'You logged in', '2016-05-26', '10:53:09'),
(400, 9, 'You logged out', '2016-05-26', '10:53:00'),
(401, 1, 'You logged in', '2016-05-26', '10:53:52'),
(402, 1, 'You visit Song Hits Establishment', '2016-05-26', '10:54:03'),
(403, 1, 'You visit map, searching address for Song Hits Establishment', '2016-05-26', '10:54:05'),
(404, 1, 'You are looking for available rooms in Song Hits Establishment', '2016-05-26', '10:54:14'),
(405, 1, 'You visit Song Hits Establishment', '2016-05-26', '10:56:13'),
(406, 1, 'You are searching for packages in Song Hits Establishment', '2016-05-26', '10:56:14'),
(407, 1, 'You reserve package null in establishment Song Hits', '2016-05-26', '10:56:30'),
(408, 1, 'You logged out', '2016-05-26', '10:59:00'),
(409, 1, 'You logged in', '2016-05-26', '10:59:05'),
(410, 1, 'You logged out', '2016-05-26', '10:59:00'),
(411, 9, 'You logged in', '2016-05-26', '10:59:25'),
(412, 9, 'You logged out', '2016-05-26', '11:01:00'),
(413, 9, 'You logged in', '2016-05-26', '11:05:28'),
(414, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:09:39'),
(415, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:09:41'),
(416, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '11:09:51'),
(417, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '11:10:01'),
(418, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '11:10:16'),
(419, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:10:20'),
(420, 9, 'You visit Song Hits Establishment', '2016-05-26', '11:10:31'),
(421, 9, 'You are searching for packages in Song Hits Establishment', '2016-05-26', '11:10:33'),
(422, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:10:41'),
(423, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:10:42'),
(424, 9, 'You logged in', '2016-05-26', '11:25:01'),
(425, 9, 'You visit Song Hits Establishment', '2016-05-26', '11:25:07'),
(426, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:25:09'),
(427, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:25:11'),
(428, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '11:26:34'),
(429, 9, 'You logged in', '2016-05-26', '11:39:50'),
(430, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:39:55'),
(431, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:39:57'),
(432, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '11:39:58'),
(433, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '11:40:06'),
(434, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:40:08'),
(435, 9, 'You reserve package Package B in establishment My KTV Studio', '2016-05-26', '11:40:27'),
(436, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:40:45'),
(437, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:40:55'),
(438, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '11:40:56'),
(439, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:42:18'),
(440, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:43:51'),
(441, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:43:52'),
(442, 9, 'You reserve package Package B in establishment My KTV Studio', '2016-05-26', '11:44:10'),
(443, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '11:45:55'),
(444, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:45:56'),
(445, 9, 'You reserve package Package A in establishment My KTV Studio', '2016-05-26', '11:46:14'),
(446, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '11:47:45'),
(447, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:50:02'),
(448, 9, 'You reserve package Package C in establishment My KTV Studio', '2016-05-26', '11:50:18'),
(449, 9, 'You logged out', '2016-05-26', '11:50:00'),
(450, 9, 'You logged in', '2016-05-26', '11:51:00'),
(451, 9, 'You logged out', '2016-05-26', '11:51:00'),
(452, 13, 'You logged in', '2016-05-26', '11:52:09'),
(453, 13, 'You visit My KTV Studio Establishment', '2016-05-26', '11:52:14'),
(454, 13, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:52:16'),
(455, 13, 'You reserve package Package B in establishment My KTV Studio', '2016-05-26', '11:52:32'),
(456, 13, 'You change your profile picture', '2016-05-26', '11:53:36'),
(457, 13, 'You logged out', '2016-05-26', '11:54:00'),
(458, 13, 'You logged in', '2016-05-26', '11:54:09'),
(459, 13, 'You visit My KTV Studio Establishment', '2016-05-26', '11:54:20'),
(460, 13, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '11:54:21'),
(461, 13, 'You reserve package Package B in establishment My KTV Studio', '2016-05-26', '11:54:33'),
(462, 13, 'You logged out', '2016-05-26', '11:54:00'),
(463, 13, 'You logged in', '2016-05-26', '00:03:10'),
(464, 13, 'You logged out', '2016-05-26', '00:03:00'),
(465, 9, 'You logged in', '2016-05-26', '00:14:54'),
(466, 9, 'You logged out', '2016-05-26', '00:15:00'),
(467, 9, 'You logged in', '2016-05-26', '00:17:23'),
(468, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '00:17:36'),
(469, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '00:17:50'),
(470, 9, 'You visit Song Hits Establishment', '2016-05-26', '00:47:57'),
(471, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '00:48:00'),
(472, 9, 'You visit Song Hits Establishment', '2016-05-26', '00:48:06'),
(473, 9, 'You are searching for packages in Song Hits Establishment', '2016-05-26', '00:48:07'),
(474, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '00:48:15'),
(475, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '00:48:16'),
(476, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '00:48:28'),
(477, 9, 'You logged out', '2016-05-26', '00:49:00'),
(478, 9, 'You logged in', '2016-05-26', '00:49:16'),
(479, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '00:49:32'),
(480, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '00:49:33'),
(481, 9, 'You are looking for available rooms in My KTV Studio Establishment', '2016-05-26', '00:49:36'),
(482, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '00:49:40'),
(483, 9, 'You logged in', '2016-05-26', '01:14:10'),
(484, 9, 'You visit Song Hits Establishment', '2016-05-26', '01:25:23'),
(485, 9, 'You are searching for packages in Song Hits Establishment', '2016-05-26', '01:25:25'),
(486, 9, 'You are looking for available rooms in Song Hits Establishment', '2016-05-26', '01:25:31'),
(487, 9, 'You logged out', '2016-05-26', '01:31:00'),
(488, 9, 'You logged in', '2016-05-26', '01:31:44'),
(489, 9, 'You visit Song Hits Establishment', '2016-05-26', '01:32:04'),
(490, 9, 'You visit map, searching address for Song Hits Establishment', '2016-05-26', '01:32:09'),
(491, 9, 'You are looking for available rooms in Song Hits Establishment', '2016-05-26', '01:32:20'),
(492, 9, 'You are searching for packages in Song Hits Establishment', '2016-05-26', '01:32:29'),
(493, 9, 'You visit My KTV Studio Establishment', '2016-05-26', '01:33:13'),
(494, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '01:33:18'),
(495, 9, 'You reserve package Package B in establishment My KTV Studio', '2016-05-26', '01:33:42'),
(496, 9, 'You reserve package Package A in establishment My KTV Studio', '2016-05-26', '01:35:03'),
(497, 9, 'You reserve package Package A in establishment My KTV Studio', '2016-05-26', '01:40:20'),
(498, 9, 'You visit map, searching address for My KTV Studio Establishment', '2016-05-26', '01:45:43'),
(499, 9, 'You are searching for packages in My KTV Studio Establishment', '2016-05-26', '01:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `ReservationID` int(11) NOT NULL,
  PRIMARY KEY (`invoiceid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `eeid` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `eeid`) VALUES
(2, 'Chippy', 30, '530-quotes-inspire-success.jpg', 4),
(3, 'Chicharon', 100, 'butterfly.jpg', 4),
(6, 'FCCTt', 300, 'butterfly.jpg', 6),
(7, 'Buwad', 23, 'images.jpg', 4),
(9, 'hawaiian Pizza ', 110, 'Spicy Hawaiian Pizza.jpg', 9),
(10, 'hawaiian Pizza ', 110, 'Spicy Hawaiian Pizza.jpg', 10),
(11, 'nacho', 250, 'nachosalsa.jpg', 10),
(12, 'nacho', 400, 'nachosalsa.jpg', 9),
(13, 'tanduay', 35, 'tanduayice.JPG', 9),
(15, 'Burgeee', 12, 'Penguins.jpg', 8),
(16, 'Burgee', 12, 'burger.jpg', 12),
(17, 'tacos', 120, 'tacos.jpg', 12),
(18, 'burger', 90, 'burger.jpg', 9),
(19, 'Burgeee', 12, 'Penguins.jpg', 8),
(20, 'pizza', 700, 'burger.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `eventid` int(11) NOT NULL,
  `reserved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reservation_date` date NOT NULL,
  `reservation_timerange` varchar(50) NOT NULL,
  `reservation_invoice` varchar(100) NOT NULL,
  `reservation_terms` varchar(250) NOT NULL,
  `reservation_status` int(1) NOT NULL DEFAULT '4',
  `EnthusiastID` int(11) NOT NULL,
  `eeid` int(10) NOT NULL,
  `reservation_time` time NOT NULL,
  `roomid` varchar(11) NOT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `eventid`, `reserved_at`, `reservation_date`, `reservation_timerange`, `reservation_invoice`, `reservation_terms`, `reservation_status`, `EnthusiastID`, `eeid`, `reservation_time`, `roomid`) VALUES
(40, 16, '2016-05-26 01:47:26', '2016-05-26', '1 Hour', 'sZ9bSKF1(5', '', 3, 8, 9, '14:00:00', '0'),
(46, 18, '2016-06-01 11:32:30', '2016-05-27', '2 Hours', '1#WK%6*eAG', '', 1, 12, 9, '13:00:00', '0'),
(50, 18, '2016-06-01 11:32:30', '2016-05-27', '2 Hours', 'N(G(Ej2sZ2', '', 1, 8, 9, '15:00:00', '0'),
(63, 17, '2016-05-26 05:33:41', '2016-05-31', '2 Hours', 'McNm3doBVP', '', 4, 9, 0, '15:00:40', '0'),
(64, 16, '2016-05-26 05:35:02', '2016-06-23', '1 Hours', '*LBy^gnN7a', '', 4, 9, 0, '15:00:02', '0'),
(65, 16, '2016-05-26 05:40:19', '2016-08-03', '2 Hours', 'VW%EBhJgwa', '', 4, 9, 0, '12:00:18', '0'),
(66, 16, '2016-06-01 11:32:30', '2016-05-27', '2 Hours', '(RSY5XK2Yy', '', 1, 10, 9, '19:00:00', '0'),
(67, 17, '2016-05-26 05:53:30', '2016-05-25', '1 Hour', 'skwA1CX1Hc', '', 1, 10, 9, '13:00:00', '0'),
(68, 17, '2016-06-01 11:32:30', '2016-05-26', '1 Hour', '2UpH%Pk$aV', '', 1, 8, 9, '20:00:00', '0'),
(69, 16, '2016-06-01 11:32:30', '2016-05-26', '1 Hour', 'dHZ!2jVkj1', '', 1, 8, 9, '20:00:00', '0'),
(70, 16, '2016-06-01 11:32:31', '2016-05-26', '2 Hours', 'e!!tT(nEQw', '', 1, 8, 9, '19:00:00', '0'),
(71, 16, '2016-06-01 11:32:31', '2016-05-27', '2 Hours', '2bJGgU8N3n', '', 1, 8, 9, '20:00:00', '0'),
(113, 20, '2016-09-22 01:03:50', '2016-09-21', '5 Hours', '8aEjPwHL6Z', '', 1, 8, 9, '14:00:00', '0'),
(114, 20, '2016-09-22 00:57:17', '2016-09-21', '3 Hours', 'KO5nk72nI5', '', 2, 8, 9, '20:00:00', '0'),
(115, 20, '2016-09-22 01:03:50', '2016-09-21', '4 Hours', 'TWinMki8DM', '', 1, 8, 9, '07:00:00', '0'),
(116, 20, '2016-09-22 01:03:50', '2016-09-21', '2 Hours', 'g8TykFcL(f', '', 1, 8, 9, '11:00:00', '0'),
(117, 20, '2016-09-22 01:04:22', '2016-09-22', '5 Hours', '0pptCL96Qk', '', 2, 8, 9, '14:00:00', '0'),
(118, 20, '2016-09-22 01:04:24', '2016-09-22', '3 Hours', '7MwgrAjpqI', '', 2, 8, 9, '20:00:00', '0'),
(119, 20, '2016-09-22 01:04:25', '2016-09-22', '4 Hours', 'BW$*Wmq3i5', '', 2, 8, 9, '07:00:00', '0'),
(121, 16, '2016-09-22 04:21:04', '2016-09-21', '3 Hours', '20Z$Qfqg9(', '', 1, 8, 8, '14:00:00', '0'),
(122, 16, '2016-09-23 19:23:09', '2016-09-22', '5 Hours', 'Kc8WPqbOBh', '', 1, 8, 8, '14:00:00', '0'),
(124, 23, '2016-09-22 06:48:25', '2016-09-22', '3 Hours', '9!B%65Em^C', '', 4, 8, 10, '16:00:00', '0'),
(126, 16, '2016-09-23 19:23:09', '2016-09-22', '2 Hours', 'j&SeYZB%Mq', '', 1, 8, 8, '20:00:00', '0'),
(127, 23, '2016-09-22 04:18:16', '2016-09-27', '2 Hours', 'WJuaD4BOqT', '', 4, 8, 10, '14:00:00', '0'),
(128, 16, '2016-09-22 04:31:10', '2016-09-27', '3 Hours', '260BoMyhjo', '', 4, 14, 8, '14:00:00', '0'),
(129, 16, '2016-09-22 04:32:26', '2016-09-27', '2 Hours', 'ar5iRTKpf%', '', 4, 8, 8, '20:00:00', '0'),
(130, 21, '2016-09-22 05:20:02', '2016-09-22', '4 Hours', 'V^0$R81tTk', '', 4, 8, 9, '19:00:00', '0'),
(131, 19, '2016-09-22 05:37:15', '2016-09-22', '3 Hours', 'Yszwi7KvRi', '', 4, 8, 9, '14:00:00', '0'),
(132, 20, '2016-09-22 05:38:21', '2016-09-23', '3 Hours', '3*acjG(b&&', '', 4, 8, 9, '14:00:00', '0'),
(133, 21, '2016-09-22 05:39:27', '2016-09-22', '2 Hours', '(V@EY0Uj41', '', 4, 8, 9, '14:00:00', '0'),
(134, 22, '2016-09-23 19:23:09', '2016-09-23', '3 Hours', 'M4gi3WLgv%', '', 1, 8, 8, '14:00:00', '0'),
(135, 22, '2016-09-22 07:57:15', '2016-09-26', '2 Hours', 'o7Np!EbEpZ', '', 4, 8, 8, '16:00:00', '0'),
(136, 22, '2016-09-22 08:03:47', '2016-09-28', '2 Hours', '(mRgyZyuZ8', '', 4, 8, 8, '16:00:00', '0'),
(137, 17, '2016-09-23 19:23:10', '2016-09-22', '2 Hours', 'vGx7OZW(lC', '', 1, 10, 8, '17:00:00', '0'),
(138, 17, '2016-09-23 19:23:10', '2016-09-23', '2 Hours', 'c4r2nIxyGR', '', 1, 10, 8, '17:00:00', '0'),
(139, 22, '2016-09-23 19:23:10', '2016-09-23', '0 Hour', '#0bp4bn2Le', '', 1, 10, 8, '01:00:00', '0'),
(140, 16, '2016-09-24 19:05:53', '2016-09-24', '2 Hours', 'IoPV6p0J@y', '', 1, 10, 8, '17:00:00', '0'),
(141, 16, '2016-09-24 10:08:36', '2016-09-24', '1 Hour', 'GUxb9%Dl3@', '', 1, 10, 8, '07:00:00', '24'),
(142, 16, '2016-09-24 19:05:54', '2016-09-24', '1 Hour', 'cj#o97DTG%', '', 1, 10, 8, '19:00:00', '24'),
(143, 16, '2016-09-24 10:08:44', '2016-09-24', '3 Hours', 'gazIw&42ik', '', 2, 10, 8, '20:00:00', '24'),
(144, 16, '2016-09-24 19:05:54', '2016-09-24', '1 Hour', 'RDJPlB3n$V', '', 1, 10, 8, '17:00:00', '24'),
(145, 22, '2016-09-24 19:05:54', '2016-09-24', '1 Hour', 'rkZtrybBvQ', '', 1, 10, 8, '15:00:00', '24'),
(146, 0, '2016-09-24 21:40:41', '0000-00-00', '0 Hour', 'K%6*eAGWdN', '', 1, 10, 8, '01:00:00', '88'),
(147, 0, '2016-09-24 21:40:38', '0000-00-00', '0 Hour', '%yLqOLuBw%', '', 1, 10, 8, '01:00:00', '88'),
(148, 17, '2016-09-25 07:21:04', '2016-09-25', '2 Hours', 'ooHhkYARlA', '', 1, 10, 8, '07:00:00', '88'),
(149, 17, '2016-09-24 21:40:32', '2016-09-25', '1 Hour', '4tRZzIYj9R', '', 4, 10, 8, '16:00:00', '88'),
(150, 16, '2016-09-24 21:14:59', '2016-09-25', '1 Hour', 'QoQm1TbIT^', '', 4, 10, 8, '14:00:00', '88'),
(151, 27, '2016-09-24 21:35:37', '2016-09-25', '2 Hours', 'tW84o#HYkn', '', 4, 10, 8, '17:00:00', '88'),
(152, 16, '2016-09-24 21:46:11', '2016-09-25', '2 Hours', 'ozs9q!iG0S', '', 4, 10, 8, '15:00:00', '135'),
(153, 16, '2016-09-25 07:21:05', '2016-09-25', '0 Hour', '&sHm1!AuaK', '', 1, 10, 8, '01:00:00', '135'),
(154, 0, '2016-09-25 09:50:14', '2016-09-25', '1 Hour', 'pB74^V9Fy$', '', 1, 10, 8, '10:00:00', '88'),
(155, 16, '2016-09-25 07:25:05', '2016-09-26', '2 Hours', 'EsrzSWLh3g', '', 4, 10, 8, '08:00:00', '88'),
(156, 0, '2016-09-25 09:50:14', '2016-09-25', '1 Hour', 'EHriX$i&M3', '', 1, 10, 8, '09:00:00', '88'),
(157, 17, '2016-09-25 07:56:38', '2016-09-25', '1 Hour', 'zaHdhyD$Zj', '', 4, 10, 8, '12:00:00', '88'),
(158, 0, '2016-09-25 10:09:34', '2016-09-25', '1 Hour', 'AYDpyE27#c', '', 4, 10, 8, '05:00:00', '88'),
(159, 16, '2016-09-25 09:50:14', '2016-09-25', '1 Hour', 'Wn&oyFhNpc', '', 1, 10, 8, '05:00:00', '88'),
(160, 0, '2016-09-25 10:10:40', '2016-09-25', '0 Hour', 'Yszwi7KvRi', '', 4, 10, 8, '05:00:00', '88'),
(161, 0, '2016-09-25 10:12:27', '2016-09-26', '1 Hour', 'LnFD^FVr1$', '', 4, 10, 8, '05:00:00', '88'),
(162, 0, '2016-09-25 10:13:24', '2016-09-26', '0 Hour', '(V@EY0Uj41', '', 4, 10, 8, '05:00:00', '88'),
(163, 0, '2016-09-25 10:17:37', '2016-09-26', '1 Hour', 'vie0h7&(lY', '', 4, 10, 8, '05:00:00', '88'),
(164, 0, '2016-09-25 10:28:22', '2016-09-26', '2 Hours', '2ZMnZNnir6', '', 4, 10, 8, '11:00:00', '88'),
(165, 0, '2016-09-25 10:57:53', '2016-09-27', '3 Hours', 'BnThSsD!%9', '', 4, 10, 8, '14:00:00', '88'),
(166, 0, '2016-09-25 11:00:16', '2016-09-30', '2 Hours', 'dMU#cRBByK', '', 4, 10, 8, '20:00:00', '88'),
(167, 0, '2016-09-25 11:03:28', '2016-09-27', '8 Hours', '&X$jE*j9KP', '', 4, 10, 8, '08:00:00', '88'),
(168, 0, '2016-09-25 11:09:34', '2016-09-28', '4 Hours', 'knv!#uKWJB', '', 4, 10, 8, '19:00:00', '88'),
(169, 0, '2016-09-25 11:12:51', '2016-09-29', '3 Hours', 'Gkfduq4pmd', '', 4, 10, 8, '14:00:00', '88'),
(170, 0, '2016-09-25 11:16:49', '2016-09-27', '6 Hours', '!qDA3iq@SC', '', 4, 10, 8, '18:00:00', '88'),
(171, 0, '2016-09-25 11:25:39', '2016-09-28', '8 Hours', 'SNeUo7s1$u', '', 4, 10, 8, '05:00:00', '88'),
(172, 0, '2016-09-25 11:33:02', '2016-09-29', '3 Hours', 'AqtgO!PJzd', '', 4, 10, 8, '05:00:00', '88'),
(173, 0, '2016-09-25 11:34:53', '2016-09-29', '4 Hours', 't$h5JbfcBP', '', 4, 10, 8, '18:00:00', '88');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_statuses`
--

CREATE TABLE IF NOT EXISTS `reservation_statuses` (
  `status` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bg-class` varchar(100) NOT NULL,
  PRIMARY KEY (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_statuses`
--

INSERT INTO `reservation_statuses` (`status`, `name`, `bg-class`) VALUES
(1, 'Cancelled', ''),
(2, 'Confirmed', ''),
(3, 'No Show', ''),
(4, 'Reserved', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomid` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) NOT NULL,
  `room_capacity` varchar(100) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `room_status` tinyint(1) NOT NULL DEFAULT '0',
  `room_price` double NOT NULL,
  `eeid` varchar(60) NOT NULL,
  PRIMARY KEY (`roomid`),
  UNIQUE KEY `room_name` (`room_name`),
  UNIQUE KEY `room_capacity` (`room_capacity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `room_name`, `room_capacity`, `room_image`, `room_status`, `room_price`, `eeid`) VALUES
(3, 'asdasd', '12', 'water.jpg', 2, 13, '4'),
(4, 'room la', '6', 'city - Copy.jpg', 4, 500, '5'),
(5, 'my room', '5', 'city - Copy.jpg', 2, 450, '5'),
(7, 'Room Big', '20', 'night.jpg', 2, 2000, '6'),
(23, 'sadasd', '23', '530-quotes-inspire-success.jpg', 2, 23, '7'),
(24, 'Silver', '7', 'flower.jpg', 1, 500, '8'),
(44, 'shet', '50', 'announcement.jpg', 1, 699, '8'),
(45, 'ahhahahahah', '60', 'tanduayice.JPG', 1, 6, '9'),
(46, 'Room Diamond', '9', 'movieroom.jpg', 2, 600, '10'),
(47, 'Harhar', '10', 'movieroom.jpg', 4, 1000, '9'),
(54, 'Room Deluxe', '8', 'bigscreen.jpg', 1, 600, '9'),
(71, 'e-room', '11', 'Spicy Hawaiian Pizza.jpg', 1, 9000, '9'),
(81, 'ret', '89', 'roomms.jpg', 1, 67, '9'),
(82, 'a-room', '18', 'announcement.jpg', 1, 12000, '9'),
(83, 'bigsceen', '15', 'bigscreen.jpg', 1, 4509, '9'),
(84, 'rot', '46', 'cristalla_theater.jpg', 2, 65, '9'),
(88, 'wow', '65', 'Jellyfish.jpg', 2, 54, '8'),
(89, 'wee', '17', 'modern-home-media-room.jpg', 1, 89, '8'),
(93, 'sas', '76', 'modern-home-media-room.jpg', 1, 90, '10'),
(95, 'rao', '543', 'roomms.jpg', 1, 56, '10'),
(96, 'roa', '656', 'cristalla_theater.jpg', 2, 98, '10'),
(97, 'roes', '555', 'harhar.jpg', 2, 55, '10'),
(104, 'dddd', '44', 'harhar.jpg', 1, 13, '11'),
(105, 'roooo', '32', 'roomms.jpg', 1, 22, '8'),
(108, 'woop', '14', 'cristalla_theater.jpg', 1, 900, '12'),
(109, 'waap', '34', 'cristalla_theater.jpg', 2, 120, '9'),
(114, 'mamamoo', '36', 'cristalla_theater.jpg', 1, 980, '12'),
(118, 'sss', '35', 'cristalla_theater.jpg', 2, 200, '9'),
(121, 'bbb', '37', 'cristalla_theater.jpg', 2, 100, '9'),
(127, 'eee', '78', 'burger.jpg', 2, 1000, '9'),
(128, 'sad', '98', 'hamsa.jpg', 2, 2000, '9'),
(129, 'ayt', '90', 'ANONYMOUS.jpg', 2, 3000, '9'),
(130, 'dfi', '80', 'cristalla_theater.jpg', 2, 5000, '9'),
(135, 'edi', '1', 'Koala.jpg', 1, 22, '8'),
(136, 'boom', '3', 'Tulips.jpg', 1, 22, '8'),
(138, 'Room 69', '2', 'Tulips.jpg', 1, 123, '13');

-- --------------------------------------------------------

--
-- Table structure for table `room_statuses`
--

CREATE TABLE IF NOT EXISTS `room_statuses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room_statuses`
--

INSERT INTO `room_statuses` (`id`, `status`) VALUES
(1, 'Occupied'),
(2, 'Vacant'),
(3, 'Under Maintenance'),
(4, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ServicesID` int(11) NOT NULL AUTO_INCREMENT,
  `services_description` longtext NOT NULL,
  `EEID` int(11) NOT NULL,
  PRIMARY KEY (`ServicesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServicesID`, `services_description`, `EEID`) VALUES
(2, 'Every person is looking for new ways to refresh their minds from the never ending stress brought by their respective work. After a long stressful and tiring day, people tend to look for an alternative way to ease the stressful moments, this somehow cause the uncertainty to choose the right decision to hangout and experience genuine what?.</br>\n</br>\nThe study aims to give individual/group of why use uncertain word people the easiest way to look for a place to hang out with. To achieve this study, the system caters entertainment establishment that provide room reservations like Movie House, KTV & Music Studio. To design and develop a web and mobile based software as a service entertainment establishment portal.\n</br>\nNa update naku :) hahhaa', 4),
(3, 'Music Tunnel is the largest KTV in Northern California. It is a KTV that also offered some sweet smoothie and desserts for their customers to enjoy while singing.  The only karaoke place in the bay area where "no-alcohol no smoking" policy is strictly enforced in each karaoke room. The establishment provides service which will make the customer feel as comfortable as staying in their own home. The application of Music Tunnel has two languages it is English and Japanese to translate every words for their Japanese customers.  The room information was detailed and shows the house rules to read for all of their customers before booking. \r\n\r\nMusic Tunnel posted their monthly list of new songs and categorize it according to its language thus customers desire to sing. The MENUS for the list of their available smoothie and desserts. Promos, announcements and discounts are shown in the home page.\r\n', 1),
(4, 'this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first servicethis is my first servicethis is my first servicethis is my first servicethis is my first servicethis is my first servicethis is my first service this is my first service this is my first service this is my first service this is my first servicethis is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service\r\nfirst service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service\r\nfirst service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first servicefirst service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first servicefirst service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service this is my first service', 6),
(5, 'dsadadsasdsad', 7),
(6, ' this is my first service this is my first service this is my first servicethis is my first servicethis is my first service this is my first servicethis is my first service ', 8),
(7, 'Test Establishment ', 9),
(8, 'Our establishment has 60 inches platform tv and blu ray copies of movies has dolby audio that can make you feel that you are in the \r\n\r\nmovie.\r\nfjfajgnafjak', 10);

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

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subid` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `subscriptionid` varchar(50) NOT NULL,
  PRIMARY KEY (`subid`),
  UNIQUE KEY `subscriptionid_UNIQUE` (`subscriptionid`),
  KEY `key_2` (`subid`,`subscriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_resv`
--

CREATE TABLE IF NOT EXISTS `tbl_time_resv` (
  `attr_tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_tr_range` varchar(255) NOT NULL,
  `attr_tr_pk_resv` int(11) NOT NULL,
  PRIMARY KEY (`attr_tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=374 ;

--
-- Dumping data for table `tbl_time_resv`
--

INSERT INTO `tbl_time_resv` (`attr_tr_id`, `attr_tr_range`, `attr_tr_pk_resv`) VALUES
(103, '4-AM', 88),
(104, '5-AM', 88),
(105, '6-AM', 88),
(106, '7-AM', 88),
(107, '8-AM', 88),
(108, '9-AM', 89),
(109, '10-AM', 89),
(110, '11-AM', 89),
(111, '12-PM', 89),
(112, '2-PM', 89),
(113, '3-PM', 90),
(114, '4-PM', 90),
(115, '5-PM', 90),
(116, '6-PM', 90),
(117, '7-PM', 90),
(118, '8-PM', 91),
(119, '9-PM', 91),
(120, '10-PM', 91),
(121, '11-PM', 91),
(122, '12-AM', 91),
(123, '4-AM', 92),
(124, '5-AM', 92),
(125, '6-AM', 92),
(126, '7-AM', 92),
(127, '8-AM', 92),
(128, '9-AM', 93),
(129, '10-AM', 93),
(130, '11-AM', 93),
(131, '12-PM', 93),
(132, '2-PM', 93),
(133, '3-PM', 94),
(134, '4-PM', 94),
(135, '5-PM', 94),
(136, '6-PM', 94),
(137, '7-PM', 94),
(138, '8-PM', 95),
(139, '9-PM', 95),
(140, '10-PM', 95),
(141, '11-PM', 95),
(142, '12-AM', 95),
(143, '4-AM', 96),
(144, '5-AM', 96),
(145, '6-AM', 96),
(146, '7-AM', 96),
(147, '8-AM', 96),
(148, '9-AM', 96),
(149, '10-AM', 96),
(150, '11-AM', 96),
(151, '12-PM', 96),
(152, '2-PM', 96),
(153, '3-PM', 96),
(154, '4-PM', 96),
(155, '5-PM', 96),
(156, '6-PM', 96),
(157, '7-PM', 96),
(158, '8-PM', 96),
(159, '9-PM', 96),
(160, '10-PM', 96),
(161, '11-PM', 96),
(162, '12-AM', 96),
(163, '4-AM', 97),
(164, '5-AM', 97),
(165, '6-AM', 97),
(166, '7-AM', 97),
(167, '8-AM', 97),
(168, '9-AM', 98),
(169, '10-AM', 98),
(170, '11-AM', 98),
(171, '12-PM', 98),
(172, '2-PM', 98),
(173, '3-PM', 99),
(174, '4-PM', 99),
(175, '5-PM', 99),
(176, '6-PM', 99),
(177, '7-PM', 99),
(178, '8-PM', 100),
(179, '9-PM', 100),
(180, '10-PM', 100),
(181, '11-PM', 100),
(182, '12-AM', 100),
(183, '4-AM', 101),
(184, '5-AM', 101),
(185, '6-AM', 101),
(186, '7-AM', 101),
(187, '8-AM', 101),
(188, '8-PM', 102),
(189, '9-PM', 102),
(190, '10-PM', 102),
(191, '11-PM', 102),
(192, '12-AM', 102),
(193, '8-PM', 103),
(194, '9-PM', 103),
(195, '10-PM', 103),
(196, '11-PM', 103),
(197, '12-AM', 103),
(198, '8-PM', 104),
(199, '9-PM', 104),
(200, '10-PM', 104),
(201, '11-PM', 104),
(202, '12-AM', 104),
(203, '4-AM', 105),
(204, '5-AM', 105),
(205, '6-AM', 105),
(206, '7-AM', 105),
(207, '8-AM', 105),
(208, '9-AM', 105),
(209, '10-AM', 105),
(210, '11-AM', 105),
(211, '12-PM', 105),
(212, '2-PM', 105),
(213, '3-PM', 105),
(214, '4-PM', 105),
(215, '5-PM', 105),
(216, '6-PM', 105),
(217, '7-PM', 105),
(218, '8-PM', 105),
(219, '9-PM', 105),
(220, '11-PM', 105),
(221, '4-AM', 106),
(222, '5-AM', 106),
(223, '6-AM', 106),
(224, '7-AM', 106),
(225, '8-AM', 106),
(226, '9-AM', 106),
(227, '10-AM', 106),
(228, '11-AM', 106),
(229, '12-PM', 106),
(230, '2-PM', 106),
(231, '3-PM', 106),
(232, '4-PM', 106),
(233, '5-PM', 106),
(234, '6-PM', 106),
(235, '7-PM', 106),
(236, '8-PM', 106),
(237, '9-PM', 106),
(238, '10-PM', 106),
(239, '11-PM', 106),
(240, '12-AM', 106),
(241, '4-AM', 107),
(242, '5-AM', 107),
(243, '6-AM', 107),
(244, '7-AM', 107),
(245, '8-AM', 107),
(246, '9-AM', 108),
(247, '10-AM', 108),
(248, '11-AM', 108),
(249, '12-PM', 108),
(250, '2-PM', 108),
(251, '3-PM', 109),
(252, '4-PM', 109),
(253, '5-PM', 109),
(254, '6-PM', 109),
(255, '7-PM', 109),
(256, '8-PM', 110),
(257, '9-PM', 110),
(258, '10-PM', 110),
(259, '11-PM', 110),
(260, '12-AM', 110),
(261, '4-AM', 111),
(262, '4-AM', 112),
(263, '5-AM', 112),
(264, '6-AM', 112),
(265, '2-PM', 113),
(266, '3-PM', 113),
(267, '4-PM', 113),
(268, '5-PM', 113),
(269, '6-PM', 113),
(270, '8-PM', 114),
(271, '9-PM', 114),
(272, '10-PM', 114),
(273, '7-AM', 115),
(274, '8-AM', 115),
(275, '9-AM', 115),
(276, '10-AM', 115),
(277, '11-AM', 116),
(278, '12-PM', 116),
(279, '2-PM', 117),
(280, '3-PM', 117),
(281, '4-PM', 117),
(282, '5-PM', 117),
(283, '6-PM', 117),
(284, '8-PM', 118),
(285, '9-PM', 118),
(286, '10-PM', 118),
(287, '7-AM', 119),
(288, '8-AM', 119),
(289, '9-AM', 119),
(290, '10-AM', 119),
(291, '7-PM', 120),
(292, '8-PM', 120),
(293, '2-PM', 121),
(294, '3-PM', 121),
(295, '4-PM', 121),
(296, '2-PM', 122),
(297, '3-PM', 122),
(298, '4-PM', 122),
(299, '5-PM', 122),
(300, '6-PM', 122),
(302, '4-PM', 124),
(303, '5-PM', 124),
(304, '6-PM', 124),
(305, '8-PM', 126),
(306, '9-PM', 126),
(307, '2-PM', 127),
(308, '3-PM', 127),
(309, '2-PM', 128),
(310, '3-PM', 128),
(311, '4-PM', 128),
(312, '8-PM', 129),
(313, '9-PM', 129),
(314, '7-PM', 130),
(315, '2-PM', 132),
(316, '3-PM', 132),
(317, '4-PM', 132),
(318, '2-PM', 134),
(319, '3-PM', 134),
(320, '4-PM', 134),
(321, '4-PM', 135),
(322, '5-PM', 135),
(323, '4-PM', 136),
(324, '5-PM', 136),
(325, '5-PM', 138),
(326, '5-PM', 140),
(327, '6-PM', 140),
(328, '7-AM', 141),
(329, '7-PM', 142),
(330, '8-PM', 143),
(331, '9-PM', 143),
(332, '10-PM', 143),
(333, '3-PM', 145),
(334, '7-AM', 148),
(335, '8-AM', 148),
(336, '4-PM', 149),
(337, '2-PM', 150),
(338, '5-PM', 151),
(339, '3-PM', 152),
(340, '10-AM', 154),
(341, '8-AM', 155),
(342, '9-AM', 155),
(343, '9-AM', 156),
(344, '12-PM', 157),
(345, '5-AM', 158),
(346, '5-AM', 161),
(347, '6-AM', 163),
(348, '11-AM', 164),
(349, '12-PM', 164),
(350, '8-PM', 166),
(351, '9-PM', 166),
(352, '8-AM', 167),
(353, '9-AM', 167),
(354, '10-AM', 167),
(355, '7-PM', 168),
(356, '8-PM', 168),
(357, '2-PM', 169),
(358, '3-PM', 169),
(359, '4-PM', 169),
(360, '6-PM', 170),
(361, '5-AM', 171),
(362, '6-AM', 171),
(363, '7-AM', 171),
(364, '8-AM', 171),
(365, '9-AM', 171),
(366, '10-AM', 171),
(367, '5-AM', 172),
(368, '6-AM', 172),
(369, '7-AM', 172),
(370, '6-PM', 173),
(371, '7-PM', 173),
(372, '8-PM', 173),
(373, '9-PM', 173);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
