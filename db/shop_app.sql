-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2016 at 02:35 PM
-- Server version: 5.5.46
-- PHP Version: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nfc`
--

-- --------------------------------------------------------

--
-- Table structure for table `beacon`
--

CREATE TABLE IF NOT EXISTS `beacon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beacon_name` varchar(100) NOT NULL,
  `factory_id` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `beacon`
--

INSERT INTO `beacon` (`id`, `beacon_name`, `factory_id`) VALUES
(1, 'Beacon 1', 'A4:D8:56:00:D1:2F'),
(2, 'Beacon 2', 'A4:D8:56:00:17:4A'),
(3, 'Beacon 3', 'A4:D8:56:00:14:A2');

-- --------------------------------------------------------

--
-- Table structure for table `chain_store`
--

CREATE TABLE IF NOT EXISTS `chain_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chain_store`
--

INSERT INTO `chain_store` (`id`, `name`, `email`) VALUES
(1, 'Konzum', 'konzum@konzum.konzum'),
(2, 'Plodine', 'Plodine@Plodine.Plodine');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_discount` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `code` varchar(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `id_discount`, `user_id`, `code`, `time`) VALUES
(45, 0, '', 'O3P9-N9S4', '2016-04-16 17:04:45'),
(44, 0, '', 'AR40-TYTP', '2016-04-16 17:04:41'),
(43, 7, '359775052615428', 'R7D9-LW8D', '2016-03-27 23:08:46'),
(42, 7, '356100065629907', 'C8W2-26VL', '2016-03-27 22:47:38'),
(46, 0, '', 'J16U-LPMJ', '2016-04-16 17:04:49'),
(47, 0, '', '88X6-OWX6', '2016-04-16 17:05:40'),
(48, 0, '', 'AHNC-FWI7', '2016-04-16 17:10:11'),
(49, 0, '', 'OLF7-GYNR', '2016-04-16 17:10:24'),
(50, 0, '', 'W1VY-Y69H', '2016-04-16 17:10:59'),
(51, 0, '', 'CW8L-82HP', '2016-04-16 17:11:11'),
(57, 19, '358240055547889', '2XOO-B69B', '2016-04-17 11:50:22'),
(56, 7, '358240055547889', 'UKY2-N7JS', '2016-04-16 19:05:02'),
(59, 9, '358240055547889', 'NXLX-J8UV', '2016-04-20 18:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_store` int(11) NOT NULL,
  `id_beacon` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `new_price` float NOT NULL,
  `old_price` float NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_store` (`id_store`,`id_beacon`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `id_store`, `id_beacon`, `name`, `product`, `new_price`, `old_price`, `valid_from`, `valid_to`) VALUES
(19, 1, 1, 'Čokoladni popust', 'Dorina napolitanka', 15, 20, '2016-01-01 20:00:00', '2016-07-01 20:00:00'),
(7, 2, 1, 'Ljetna akcija', 'Suncobran', 79, 150, '2015-06-13 05:34:00', '2016-06-23 17:34:00'),
(9, 2, 2, 'Francuski tjedan', 'Vino Rose 0,7l', 160, 200, '2016-01-11 00:12:00', '2016-06-12 02:12:00'),
(18, 4, 1, 'Uskršnja šunka', 'Delux šunka', 69, 100, '2016-03-23 20:00:00', '2016-04-01 03:33:00'),
(16, 2, 3, 'Najbolji brijači aparati!', 'Braun WF2S', 330, 400, '2016-03-10 20:20:00', '2016-05-20 20:20:00'),
(17, 4, 1, 'Najpovoljnija igraća konzola!', 'Play Station 4', 3000, 5000, '2016-03-13 11:11:00', '2016-07-20 22:22:00'),
(14, 5, 1, 'Najbolji popust', 'Najbolji proizvod', 120, 150, '2016-01-22 11:11:00', '2016-10-21 11:11:00'),
(15, 5, 1, 'Najgori popust', 'Najgori proizvod', 119, 120, '2015-01-01 01:01:00', '2018-01-01 01:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chain_store` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chain_store` (`id_chain_store`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `id_chain_store`, `name`, `address`, `telephone`) VALUES
(1, 1, 'Super Konzum', 'Osječka 71, 51000 Rijeka', '0800 400 000'),
(2, 2, 'Plodine Kostrena', 'Vrh Martinšćice, 51221 Kostrena', '051 287 314'),
(4, 2, 'Plodine Kukuljanovo', 'Kukuljanovo bb, 51227 Kukuljanovo', '051 051 334'),
(5, 2, 'Plodine Srdoči', 'Uica Mate Lovraka 7, 51000 Rijeka', '051 659 420'),
(30, 1, 'Super Konzum', 'Zagrebačka avenija 108', '0800 400 000'),
(31, 1, 'Konzum', 'Vatroslava Lisinskog 2', '0800 400 000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `chain_store` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `chain_store`) VALUES
(1, 'plodine', 'plodine123', 'plodine@plodine.plodine', 2),
(2, 'konzum', 'konzum123', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
