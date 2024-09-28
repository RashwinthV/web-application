-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 02:12 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminsno` int(7) NOT NULL,
  `adminusername` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminsno`, `adminusername`, `adminpassword`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `cansno` int(7) NOT NULL,
  `elesno` int(7) NOT NULL,
  `sturegno` varchar(10) NOT NULL,
  `canpost` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cansno`, `elesno`, `sturegno`, `canpost`) VALUES
(5, 3, '21CS101', 'President'),
(6, 3, '21CS102', 'President'),
(7, 3, '21CS103', 'President');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `elesno` int(7) NOT NULL,
  `elename` varchar(50) NOT NULL,
  `eledate` date NOT NULL,
  `elestarttime` time NOT NULL,
  `eleendtime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`elesno`, `elename`, `eledate`, `elestarttime`, `eleendtime`) VALUES
(3, 'Youth Club', '2023-04-08', '10:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE IF NOT EXISTS `polling` (
  `pollsno` int(7) NOT NULL,
  `elesno` int(7) NOT NULL,
  `sturegno` varchar(10) NOT NULL,
  `pollsturegno` varchar(10) NOT NULL,
  `polldatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling`
--

INSERT INTO `polling` (`pollsno`, `elesno`, `sturegno`, `pollsturegno`, `polldatetime`) VALUES
(1, 3, '21CS103', '21CS101', '2023-04-08 12:09:04'),
(2, 3, '21CS102', '21CS102', '2023-04-08 12:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `sturegno` varchar(10) NOT NULL,
  `stuname` varchar(50) NOT NULL,
  `stugender` varchar(10) NOT NULL,
  `studob` date NOT NULL,
  `stucourse` varchar(50) NOT NULL,
  `stuyear` varchar(10) NOT NULL,
  `studepartment` varchar(50) NOT NULL,
  `stupassword` varchar(50) NOT NULL,
  `stuthumb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sturegno`, `stuname`, `stugender`, `studob`, `stucourse`, `stuyear`, `studepartment`, `stupassword`, `stuthumb`) VALUES
('21CS101', 'Kumar', 'Male', '2002-01-23', 'B.Sc CS', '3', 'Computer Science', '9976ad087861a6128292435e212ecfa3', '21CS101-6422ac4f0d55d-1679993935.jpg'),
('21CS102', 'Raja', 'Male', '2023-03-14', 'Bsc', '1', 'Computer Science', '3814374184eb010d6a48f525b32566b0', '21CS102-6426818e4d2f2-1680245134.jpg'),
('21CS103', 'Cithra', 'Female', '2023-02-27', 'Bsc', '1', 'Computer Science', '4b6ff70d27c5210088b2dd7452fb1e74', '21CS103-642681ac37df8-1680245164.jpg'),
('21CS104', 'Devi', 'Female', '2023-03-19', 'Bsc', '1', 'Computer Science', 'a1a9b2956078344cbf6344c6b55e86a0', '21CS104-642681cb7f5ae-1680245195.jpg'),
('21CS105', 'Brindha', 'Female', '2002-10-10', 'Bsc', '3', 'Computer Science', '8d6244c51538986680bc2d325e31905a', '21CS105-642681eaac77e-1680245226.jpg'),
('21CS106', 'Saritha', 'Female', '2022-05-04', 'Bsc', '1', 'Computer Science', '67b9c3a92a280f6006134d948f1fe2f2', '21CS106-642682097635e-1680245257.jpg'),
('21CS107', 'Muthu', 'Male', '2002-05-05', 'Bsc', '3', 'Computer Science', '3082158a89669daabeeb0a8118b35a41', '21CS107-642682278508e-1680245287.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminsno`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cansno`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`elesno`);

--
-- Indexes for table `polling`
--
ALTER TABLE `polling`
  ADD PRIMARY KEY (`pollsno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sturegno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminsno` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `cansno` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `elesno` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `polling`
--
ALTER TABLE `polling`
  MODIFY `pollsno` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
