-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 06:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_record`
--

CREATE TABLE `donation_record` (
  `REGISTRATION_ID` varchar(50) NOT NULL,
  `ORGAN_TYPEd` varchar(100) NOT NULL,
  `BLOOD_GROUPd` varchar(50) NOT NULL,
  `QUANTITYd` varchar(100) NOT NULL,
  `short_note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_record`
--

INSERT INTO `donation_record` (`REGISTRATION_ID`, `ORGAN_TYPEd`, `BLOOD_GROUPd`, `QUANTITYd`, `short_note`) VALUES
('0', 'Liver', 'A+', '1', 'urgent'),
('0', 'Liver', 'A+', '1', 'urgent');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `ACCIDENT_DESC` varchar(500) NOT NULL,
  `ACCIDENT_TYPE` varchar(500) NOT NULL,
  `BMI` float NOT NULL,
  `DISEASE_DESC` varchar(500) NOT NULL,
  `DISEASE_TYPE` varchar(500) NOT NULL,
  `OPERATION_DESC` varchar(500) NOT NULL,
  `OPERATION_TYPE` varchar(500) NOT NULL,
  `REGISTRATION_ID` int(10) NOT NULL,
  `WEIGHT` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ_requests`
--

CREATE TABLE `organ_requests` (
  `REGISTRATION_ID` varchar(50) NOT NULL,
  `ORGAN_TYPE` varchar(50) NOT NULL,
  `QUANTITY` varchar(100) NOT NULL,
  `BLOOD_GROUPn` varchar(50) NOT NULL,
  `REQUEST_TYPE` varchar(100) NOT NULL,
  `ADD_RESSn` varchar(100) NOT NULL,
  `ZIP_CODE` varchar(50) NOT NULL,
  `phoneN` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organ_requests`
--

INSERT INTO `organ_requests` (`REGISTRATION_ID`, `ORGAN_TYPE`, `QUANTITY`, `BLOOD_GROUPn`, `REQUEST_TYPE`, `ADD_RESSn`, `ZIP_CODE`, `phoneN`, `FIRST_NAME`, `LAST_NAME`) VALUES
('', 'Heart', '1', 'B+', 'Emergency', '4/209 ,udumalai road, coimbatore', '641671', '7904382862', 'Rashwinth', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `AGE` int(10) NOT NULL,
  `BLOOD_GROUPr` varchar(10) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASS_WORD` varchar(30) NOT NULL,
  `phoneR` varchar(100) NOT NULL,
  `ADD_RESSr` varchar(500) NOT NULL,
  `ZIP_CODE` varchar(20) NOT NULL,
  `REGISTRATION_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`FIRST_NAME`, `LAST_NAME`, `AGE`, `BLOOD_GROUPr`, `Gender`, `EMAIL`, `PASS_WORD`, `phoneR`, `ADD_RESSr`, `ZIP_CODE`, `REGISTRATION_ID`) VALUES
('Rashwinth', 'V', 20, 'A+', 'Male', 'vrashwinth@gmail.com', 'tharun741', '7904382862', '4/209 udumalai road coimbatore', '641671', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`REGISTRATION_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `REGISTRATION_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
