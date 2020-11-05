-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 06:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinal_plants`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(10) NOT NULL,
  `AdminName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Password`) VALUES
(1, 'Shirshak Das', '123'),
(2, 'Belur RKM', '123');

-- --------------------------------------------------------

--
-- Table structure for table `maingroup`
--

CREATE TABLE `maingroup` (
  `ID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maingroup`
--

INSERT INTO `maingroup` (`ID`, `Name`, `Description`) VALUES
(1, 'Main Group 1', 'This is main group 1'),
(2, 'Main Group 2', 'This is main group 2'),
(3, 'A', 'This is main group A'),
(4, 'B', 'This is main group B');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `CurrentAge` varchar(20) NOT NULL,
  `MaxAge` varchar(20) NOT NULL,
  `WaterAmount` varchar(20) NOT NULL,
  `WaterFrequency` varchar(20) NOT NULL,
  `NutritionAmount` varchar(20) NOT NULL,
  `NutritionFrequency` varchar(20) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Taxonomy` varchar(20) NOT NULL,
  `Row` varchar(20) NOT NULL,
  `Col` varchar(20) NOT NULL,
  `SubgroupID` int(10) NOT NULL,
  `MaingroupID` int(10) NOT NULL,
  `Flag` int(10) NOT NULL DEFAULT 1,
  `NextWater` date DEFAULT NULL,
  `NextNutrition` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`ID`, `Name`, `DOB`, `CurrentAge`, `MaxAge`, `WaterAmount`, `WaterFrequency`, `NutritionAmount`, `NutritionFrequency`, `Photo`, `Taxonomy`, `Row`, `Col`, `SubgroupID`, `MaingroupID`, `Flag`, `NextWater`, `NextNutrition`) VALUES
(1, 'Plant 1', '2020-10-06', '16', '730', '1', '1', '1', '30', '', 'Plant 1 Taxomony', '1', '1', 1, 1, 1, '2020-10-21', '2020-10-21'),
(10, 'asd', '2020-02-24', '241', '570', '4', '2', '1', '30', 'plant10.jpg', 'asd', '1', '2', 1, 1, 1, '2020-10-21', '2020-11-19'),
(11, 'asd', '2019-03-02', '600', '720', '4', '2', '1', '30', 'plant11.jpg', 'asd', '1', '3', 1, 4, 0, '2020-10-22', '2020-11-19'),
(12, 'asd', '2020-02-23', '240', '720', '4', '2', '1', '30', 'plant12.jpg', 'asd', '1', '25', 1, 1, 1, '2020-10-22', '2020-11-19'),
(13, 'asdad ', '2020-02-15', '249', '720', '3.2', '2', '1.25', '30', 'plant13.jpg', 'asda', '1', '20', 1, 3, 1, '2020-10-23', '2020-11-20'),
(14, 'asdad ', '2019-01-31', '630', '720', '5.2', '2', '1.2', '30', 'plant14.jpg', 'asd as', '2', '5', 4, 2, 1, '2020-10-23', '2020-11-20'),
(15, 'asdad ', '2020-01-26', '270', '720', '3.2', '2', '1.25', '30', 'plant15.jpg', 'asda', '3', '10', 1, 3, 1, '2020-10-23', '2020-11-20'),
(19, 'xadaw', '2020-10-21', '1', '720', '0.8', '2', '1.25', '30', 'plant19.jpg', ' awesd', '23', '25', 4, 3, 1, '2020-10-23', '2020-11-20'),
(20, 'xadawad', '2020-06-20', '124', '900', '2.4', '2', '1.25', '30', 'plant20.jpg', ' awesd', '23', '26', 6, 3, 1, '2020-10-24', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `subgroup`
--

CREATE TABLE `subgroup` (
  `ID` int(10) NOT NULL,
  `MainGroupID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subgroup`
--

INSERT INTO `subgroup` (`ID`, `MainGroupID`, `Name`, `Description`) VALUES
(1, 3, 'A1', 'Subgroup of A'),
(2, 3, 'A2', '2nd Subgroup of A'),
(3, 4, 'B1', 'Subgroup of B'),
(4, 4, 'B20', '20th Subgroup of B'),
(5, 1, 'Subgroup C1', 'This is subgroup C1'),
(6, 3, 'A3', '3rd subgroup of A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `maingroup`
--
ALTER TABLE `maingroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subgroup`
--
ALTER TABLE `subgroup`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
