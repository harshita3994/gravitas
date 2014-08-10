-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2014 at 11:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas 2014`
--

-- --------------------------------------------------------

--
-- Table structure for table `page2`
--

CREATE TABLE IF NOT EXISTS `page2` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(30) NOT NULL DEFAULT '0',
  `teamlimit` int(1) NOT NULL,
  `seats_total` int(3) NOT NULL,
  `seats_available` int(3) NOT NULL,
  `cost` int(10) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `page2`
--

INSERT INTO `page2` (`srno`, `event_name`, `teamlimit`, `seats_total`, `seats_available`, `cost`, `Type`) VALUES
(1, 'CRIC-O-BOTT 4.0', 3, 200, 200, 100, 'Robomania'),
(4, 'IMPACT''14 - Inspiring More Peo', 1, 750, 750, 250, 'premium'),
(5, 'Innovate', 4, 2000, 2000, 0, 'Premium'),
(12, 'Talk @ Green India', 4, 180, 180, 200, 'Premium'),
(16, 'Grid Follower v.4.0', 3, 50, 50, 300, 'Robomania'),
(17, 'Mini Robo Wars', 5, 200, 200, 500, 'Robomania'),
(18, 'IP Soccer v.3.0', 4, 40, 40, 300, 'Robomania'),
(21, 'Pocket-Tanks', 2, 120, 120, 100, 'Robomania'),
(23, 'MAGNETO', 0, 140, 140, 300, 'Robomania'),
(24, 'Aquabot', 0, 100, 100, 300, 'Robomania'),
(26, 'Under The Hood', 50, 200, 200, 150, 'Workshop'),
(27, 'MATLAB 101', 0, 100, 100, 600, 'Workshop'),
(28, 'ASTROPHOTOGRAPHY WORKSHOP', 0, 250, 250, 200, 'Workshop'),
(29, 'STELLASPHINX', 0, 150, 150, 100, 'Workshop'),
(30, 'The Next CEO', 0, 250, 250, 300, 'Workshop'),
(31, 'Code the JPEG', 0, 100, 100, 300, 'Workshop'),
(32, 'artificial organs and transpla', 0, 100, 100, 150, 'Workshop'),
(33, 'Image Processing', 0, 100, 100, 400, 'Workshop'),
(34, 'UI/UX Workshop', 0, 200, 200, 150, 'Worksop'),
(35, 'Firefox Os App Development', 0, 250, 250, 300, 'Workshop'),
(36, 'Android Application Developmen', 0, 150, 150, 150, 'Workshop'),
(37, 'Python & Google AppEngine Work', 0, 400, 400, 250, 'Workshop'),
(38, 'Odyssey 2.0', 0, 270, 270, 75, 'Workshop'),
(39, 'Drug Discovery 2014', 0, 70, 70, 600, 'Workshop'),
(40, 'Short film workshop', 0, 100, 100, 100, 'Workshop'),
(41, 'ISTE ROBOTIX WORKSHOP', 0, 200, 200, 4000, 'Workshop'),
(42, 'Solidworks', 0, 100, 100, 300, 'Workshop'),
(43, 'Automotive Workshop', 0, 600, 600, 1000, 'Workshop'),
(44, 'Stock Gyaan', 0, 100, 100, 300, 'Workshop'),
(45, 'web commerce', 0, 200, 200, 150, 'Workshop'),
(46, '3D Animation Workshop', 0, 70, 70, 1000, 'Workshop'),
(47, 'VFX and Film Editing', 0, 100, 100, 150, 'Workshop'),
(48, 'Studio to Stage(Game Developme', 0, 150, 150, 150, 'Workshop'),
(49, 'geospatial and transportation ', 0, 200, 200, 400, 'Workshop'),
(50, 'Magneto (Changed from Robotics', 4, 400, 400, 3200, 'Workshop'),
(51, 'Bridge Design Workshop', 0, 250, 250, 100, 'Workshop'),
(53, 'Switch Coding', 0, 240, 240, 100, 'Bits and Bytes'),
(54, 'Reverse Coding', 2, 200, 200, 100, 'Bits and Bytes'),
(55, 'Jumble Coding', 0, 200, 200, 100, 'Bits and Bytes'),
(56, 'Ultimate Code Warfare 2.0', 2, 120, 120, 100, 'Bits and Bytes'),
(57, 'Yuvana', 2, 120, 120, 200, 'Bits and Bytes'),
(58, 'IEEE Programmers League 6.0', 1, 200, 200, 0, 'Bits and Bytes'),
(59, 'Crack Jack 3.0', 2, 150, 150, 100, 'Bits and Bytes'),
(60, 'FTP Maze', 0, 200, 200, 100, 'Bits and Bytes'),
(61, 'C Tycoon', 0, 70, 70, 100, 'Bits and Bytes'),
(64, 'Jenga Reloaded', 0, 300, 300, 50, 'Builtrix'),
(65, 'First Annual Residential and R', 0, 100, 100, 150, 'Builtrix'),
(66, 'BUILD 2 DESTROY', 2, 220, 220, 100, 'Builtrix'),
(67, 'CITY TYCOON', 2, 140, 140, 100, 'Builtrix'),
(68, 'THE DISCOVERER', 2, 140, 140, 100, 'Builtrix'),
(69, 'Bitzer', 0, 90, 90, 100, 'Builtrix'),
(70, 'MAGLEV 3.0', 3, 180, 180, 150, 'Builtrix'),
(71, 'Roller Coaster', 4, 150, 150, 150, 'Builtrix'),
(72, 'ZENITH', 3, 100, 100, 100, 'Builtrix'),
(76, 'Laser Ways', 2, 80, 80, 200, 'Applied Engineering'),
(78, 'CATAPULT', 3, 200, 200, 150, 'Applied Engineering'),
(79, 'Bucket Chute', 3, 100, 100, 150, 'Applied Engineering'),
(80, 'Via-Ropes', 0, 100, 100, 150, 'Applied Engineering'),
(81, 'Water Kraft', 5, 60, 60, 150, 'Applied Engineering'),
(82, 'Hydranoid Accent 2.0', 3, 140, 140, 150, 'Applied Engineering'),
(83, 'Chem-E-Car', 0, 30, 30, 300, 'Applied Engineering'),
(88, 'JUNKYARD ELECTRONICS', 0, 140, 140, 200, 'Circuitrix '),
(89, 'matlab mania', 0, 80, 80, 50, 'Circuitrix '),
(90, 'Greatest Heist 2.0', 2, 200, 200, 100, 'Circuitrix '),
(91, 'Electri-CITY 2.0', 0, 150, 150, 100, 'Circuitrix '),
(92, 'Bomb Diffusion', 3, 100, 100, 100, 'Circuitrix '),
(94, 'BIOTRIX', 2, 100, 100, 100, 'Bioxyn'),
(96, 'BioMimicry', 2, 100, 100, 70, 'Bioxyn'),
(97, 'Chem-O-matics 4.0', 2, 150, 150, 100, 'Bioxyn'),
(99, 'B-Plan', 3, 210, 210, 150, 'Management'),
(100, 'Wolf of Wall Street', 0, 120, 120, 100, 'Management'),
(101, 'Entrengineering', 0, 100, 100, 100, 'Management'),
(102, 'MANAGEMENT MOGUL ', 2, 150, 150, 100, 'Management'),
(103, 'Green Manager', 2, 150, 150, 100, 'Management'),
(104, 'Brain Wave', 0, 70, 70, 100, 'Management'),
(105, 'Promulgate', 2, 100, 100, 100, 'Management'),
(106, 'Management Guru 2.0', 0, 100, 100, 100, 'Management'),
(108, 'The Corporate Scrabble', 2, 120, 120, 100, 'Informals'),
(109, 'The Grandmaster', 1, 200, 200, 50, 'Informals'),
(110, 'House Of Cards', 2, 600, 600, 50, 'Informals'),
(111, 'AGENT X', 0, 100, 100, 100, 'Informals'),
(112, 'FORENSICS', 0, 80, 80, 100, 'Informals'),
(113, 'M.Md(MASTERS OF MORSE DECODING', 2, 70, 70, 150, 'Informals'),
(114, 'Junkyard Genius', 0, 100, 100, 100, 'Informals'),
(115, 'VIT''s Rubik''s Cube Challenge 2', 0, 200, 200, 50, 'Informals'),
(116, 'Beg Borrow Steal', 3, 120, 120, 300, 'Informals'),
(117, 'HUMAN FOOSBALL', 0, 150, 150, 100, 'Informals'),
(118, 'Mammamia Street Taste', 2, 200, 200, 200, 'Informals'),
(120, 'one minute to win it', 0, 100, 100, 50, 'Informals'),
(122, 'B-Quizzed', 2, 100, 100, 100, 'Quiz'),
(123, 'Triviador', 0, 150, 150, 50, 'Quiz'),
(124, 'Gen Quiz', 3, 180, 180, 100, 'Quiz'),
(125, 'LIVE QuizUp', 0, 100, 100, 50, 'Quiz'),
(128, 'graVITas premier league', 2, 1000, 1000, 0, 'Online'),
(130, '11th HOUR', 5, 200, 200, 200, 'Online');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
