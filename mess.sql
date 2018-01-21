-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 08:45 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_name`, `price`) VALUES
('pizza', 50),
('cornetto', 100),
('biriyani', 250);

-- --------------------------------------------------------

--
-- Table structure for table `sconsumption`
--

CREATE TABLE `sconsumption` (
  `rollno` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `tprice` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sconsumption`
--

INSERT INTO `sconsumption` (`rollno`, `date`, `tprice`, `name`, `itemname`) VALUES
(1, '2017-11-18 18:30:00', 50, 'ajanyan', 'pizza'),
(2, '2017-11-18 18:30:00', 100, 'df', 'cornetto'),
(22, '2017-11-18 18:30:00', 100, 'clince', 'pizza'),
(22, '2017-11-18 18:30:00', 200, 'clince', 'cornetto');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(20) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `rollno`) VALUES
('ajanyan', 1),
('df', 2),
('clince', 22),
('jisha', 33),
('akash', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
