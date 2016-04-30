-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2015 at 06:15 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `beacon`
--

CREATE TABLE IF NOT EXISTS `beacon` (
`id` int(11) NOT NULL,
  `beacon_name` varchar(100) NOT NULL,
  `factory_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beacon`
--

INSERT INTO `beacon` (`id`, `beacon_name`, `factory_id`) VALUES
(1, 'Moj beacon 1', '6HU1-R7XS5'),
(2, 'Moj beacon 2', 'PPCN-QWM7G'),
(3, 'Moj beacon 3', 'MGWV-YJA5J');

-- --------------------------------------------------------

--
-- Table structure for table `chain_store`
--

CREATE TABLE IF NOT EXISTS `chain_store` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chain_store`
--

INSERT INTO `chain_store` (`id`, `name`, `email`) VALUES
(1, 'Konzum', 'konzum@konzum.konzum'),
(2, 'Plodine', 'Plodine@Plodine.Plodine');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
`id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_beacon` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `new_price` float NOT NULL,
  `old_price` float NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `id_store`, `id_beacon`, `name`, `product`, `new_price`, `old_price`, `valid_from`, `valid_to`) VALUES
(1, 1, 2, 'Akcija 12323', 'Stol', 100, 150, '2015-07-01 08:00:00', '2015-07-14 20:00:00'),
(7, 2, 1, 'e', 'e', 0, 0, '2015-06-13 05:34:00', '2015-06-23 17:34:00'),
(8, 4, 1, 'e', 'e', 0, 0, '2015-06-13 05:34:00', '2015-06-23 17:34:00'),
(9, 2, 2, 'ime', 'das', 40, 100, '2015-06-11 00:12:00', '2015-06-12 02:12:00'),
(13, 2, 1, '1', '1', 1, 1, '1111-11-11 11:11:00', '2222-02-22 14:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`id` int(11) NOT NULL,
  `id_chain_store` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `telephone` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `id_chain_store`, `name`, `address`, `telephone`) VALUES
(1, 1, 'Konzum 25', 'Nikole Tesle 9, 51000 Rijeka', '0800 400 000'),
(2, 2, 'Plodine Kostrena', 'Kostrena 4, 51000 Kostrena', '0800 000 001'),
(4, 2, 'Plodine 33', 'Rijeka 5, 51000 Rijeka', '051 051 051'),
(5, 2, 'Plodine 45', 'asd asd ', '323'),
(28, 2, 'q', 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `chain_store` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `chain_store`) VALUES
(1, 'plodine', 'plodine123', 'plodine@plodine.plodine', 2),
(2, 'konzum', 'konzum123', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beacon`
--
ALTER TABLE `beacon`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chain_store`
--
ALTER TABLE `chain_store`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
 ADD PRIMARY KEY (`id`), ADD KEY `id_store` (`id_store`,`id_beacon`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`id`), ADD KEY `id_chain_store` (`id_chain_store`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beacon`
--
ALTER TABLE `beacon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chain_store`
--
ALTER TABLE `chain_store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`id_chain_store`) REFERENCES `chain_store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
