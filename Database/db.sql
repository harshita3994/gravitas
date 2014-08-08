-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2013 at 11:14 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas_offline_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `page2`
--

CREATE TABLE IF NOT EXISTS `page2` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL,
  `event_name` varchar(30) NOT NULL DEFAULT '0',
  `teamlimit` int(1) NOT NULL,
  `seats_total` int(3) NOT NULL,
  `seats_available` int(3) NOT NULL,
  `cost` int(10) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `page2`
--

INSERT INTO `page2` (`srno`, `type`, `event_name`, `teamlimit`, `seats_total`, `seats_available`, `cost`) VALUES
(5, 0, 'Bomb the college', 3, 150, 141, 320),
(6, 1, 'Kill the president', 4, 300, 293, 400),
(7, 1, 'I hate our library', 2, 150, 149, 220),
(8, 1, 'qwerty', 2, 200, 200, 300),
(9, 1, 'Die Vishwanathans!!', 3, 210, 209, 300),
(10, 0, 'Meet the Simpsons', 3, 150, 150, 200),
(11, 2, 'Hello World', 1, 150, 150, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
