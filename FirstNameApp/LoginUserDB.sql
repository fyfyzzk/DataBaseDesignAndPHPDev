-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2016 at 02:50 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LoginUserDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `FirstNameTable`
--

DROP TABLE IF EXISTS `FirstNameTable`;
CREATE TABLE `FirstNameTable` (
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `uniqueid` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `confirmpassword` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dateofbirth` date NOT NULL,
  `registrationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FirstNameTable`
--

INSERT INTO `FirstNameTable` (`username`, `firstname`, `lastname`, `uniqueid`, `password`, `confirmpassword`, `email`, `dateofbirth`, `registrationdate`) VALUES
('', '123', '', 14, '75dbf8cd8d95a8b87d23', '', '', '0000-00-00', '0000-00-00'),
('', '123', '', 15, '97be8f4a24f1edb425c8', '', '', '0000-00-00', '0000-00-00'),
('', '123', '', 16, '3b803e52d55602e4749d', '', '', '0000-00-00', '0000-00-00'),
('', '234', '', 17, '948cb2a7ee5b74d7b310', '', '', '0000-00-00', '0000-00-00'),
('', '123', '', 18, '5867d393bea9156ed92a', '', '', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FirstNameTable`
--
ALTER TABLE `FirstNameTable`
  ADD PRIMARY KEY (`uniqueid`),
  ADD KEY `uniqueid` (`uniqueid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
