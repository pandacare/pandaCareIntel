-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2013 at 09:28 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.3.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pandacare`
--

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE IF NOT EXISTS `Members` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Patients_ID` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `actNum` int(11) NOT NULL,
  `NumLoginFail` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `LastLoginFail` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`ID`, `UserName`, `Patients_ID`, `Password`, `actNum`, `NumLoginFail`, `LastLogin`, `LastLoginFail`) VALUES
(1, 'Pandatest1@panda.com', 1, '1234', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pandatest2@panda.com', 2, '1234', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Heart Rate` int(11) NOT NULL,
  `Body Temperature` float NOT NULL,
  `Age` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`ID`, `Name`, `Heart Rate`, `Body Temperature`, `Age`) VALUES
(1, 'Pandatest1', 60, 36.7, 60),
(2, 'Pandatest2', 65, 37.2, 65);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
