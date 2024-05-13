-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2024 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CFS1`
--

-- --------------------------------------------------------

--
-- Table structure for table `doante`
--

CREATE TABLE `doante` (
  `username` varchar(25) NOT NULL,
  `Amount` int(15) NOT NULL,
  `Transaction_id` varchar(35) NOT NULL,
  `Method` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doante`
--

INSERT INTO `doante` (`username`, `Amount`, `Transaction_id`, `Method`) VALUES
('3', 34, '33', '33'),
('ee', 4000, '444444', ''),
('1', 88, '9999', 'Bkash'),
('rahim123', 5000, 'hbvcubckac21466', '');

-- --------------------------------------------------------

--
-- Table structure for table `donatecheck`
--

CREATE TABLE `donatecheck` (
  `username` varchar(40) NOT NULL,
  `amount` int(20) NOT NULL,
  `TrId` varchar(30) NOT NULL,
  `method` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donatecheck`
--

INSERT INTO `donatecheck` (`username`, `amount`, `TrId`, `method`, `status`) VALUES
('1', 12, '', 'Bkash', 'pending'),
('1', 23, '1626dc njdank', 'Nagad', 'pending'),
('2', 2, '2', '2', 'confirm'),
('1', 88, '9999', 'Bkash', 'confirm'),
('1', 12, 'bsbin', 'Bkash', 'confirm'),
('1', 21, 'bvdkvnvka', 'Nagad', 'confirm'),
('1', 23, 'hvjlkk', 'Nagad', 'pending'),
('1', 14, 'v52biko', 'Nagad', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `UserName` varchar(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `ContactNum` int(11) NOT NULL,
  `Role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`UserName`, `Name`, `Password`, `Email`, `ContactNum`, `Role`) VALUES
('1', '1', '1', '1', 1, 'admin'),
('jisab456', 'jisab456', 'jisab456', 'jisab456', 1797515203, 'Admin'),
('jisan12', 'jisan12', 'jisan12', 'jisan12', 461, ''),
('rahim123', 'Rahim', 'rahim123', 'rahim123@gmail.com', 1787945371, '');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `name` varchar(10) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `conNum` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `confirmPassword` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `user_name`, `email`, `conNum`, `gender`, `password`, `confirmPassword`) VALUES
('ukihikn', 'bin', 'vvjb@', '262.', 'male', 'ygkj, ', 'vkubk,');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `SL` int(10) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`SL`, `Amount`, `Date`) VALUES
(8, 9, '9'),
(9, 10, '11'),
(10, 10, '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doante`
--
ALTER TABLE `doante`
  ADD PRIMARY KEY (`Transaction_id`);

--
-- Indexes for table `donatecheck`
--
ALTER TABLE `donatecheck`
  ADD PRIMARY KEY (`TrId`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`SL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `SL` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
