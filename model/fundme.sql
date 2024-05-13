-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 09:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundme`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaings`
--

CREATE TABLE `campaings` (
  `id` int(200) NOT NULL,
  `fundfor` varchar(200) NOT NULL,
  `contact_number` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` int(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `bank_type` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_number` int(200) NOT NULL,
  `accepted_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaings`
--

INSERT INTO `campaings` (`id`, `fundfor`, `contact_number`, `email`, `address`, `zipcode`, `reason`, `amount`, `user_type`, `username`, `bank_type`, `bank_name`, `account_number`, `accepted_time`) VALUES
(1, 'palestine', 1912345678, 'bangladesh@gmail.com', 'Gaza, Palestine', 1200, 'gaza', 1000000000, 'Fund Raiser', 'Ikram', 'mobile_bank', 'bkash', 1912345678, '2024-03-18 22:59:55.024645'),
(2, 'yourself', 1812345678, 'tanzim@gmail.com', 'Dhaka, Bangladesh', 1200, 'creative', 50000, 'Fund Raiser', 'Ikram', 'mobile_bank', 'bkash', 1812345678, '2024-03-19 01:03:37.000000'),
(3, 'institute', 1812345679, 'acc@aiub.edu', 'Dhaka, Bangladesh', 1220, 'education', 300000, 'Fund Raiser', 'Ikram', 'mobile_bank', 'nagad', 1812345679, '2024-03-19 01:03:37.000000'),
(4, 'Someone else', 1912345689, 'someone@email.com', 'Cumilla, Bangladesh', 1400, 'Emergencies', 800000, 'Fund Raiser', 'Ikram', 'Bank', 'DBBL', 2147483647, '2024-03-19 01:03:37.000000'),
(5, 'Charity', 1812345679, 'charity@gmail.com', 'Bhola, Bangladesh', 1600, 'Education', 200000, 'Fund Raiser', 'Ikram', 'Bank', 'Brac Bank', 2147483647, '2024-03-20 06:31:50.000000'),
(6, 'Institute Club', 1345678901, 'aec@email.com', 'AIUB, Dhaka, Bangladesh', 1248, 'Events', 500000, 'Fund Raiser', 'Ikram', 'Bank', 'City Bank', 2147483647, '2024-03-25 07:02:04.000000'),
(7, 'Palestine', 1812345679, 'admin@gmail.com', 'Dhaka, Bangladesh', 1245, 'Gaza Relief', 500000000, 'admin', 'Tanzim', 'Bank', 'Brac Bank', 2147483647, '2024-03-27 07:55:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `favcamp`
--

CREATE TABLE `favcamp` (
  `id` int(11) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `campaing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favcamp`
--

INSERT INTO `favcamp` (`id`, `user_type`, `campaing_id`) VALUES
(3, 'admin', 5),
(4, 'admin', 6),
(5, 'admin', 7),
(6, 'Donor', 7),
(7, 'Donor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `giveawayapplication`
--

CREATE TABLE `giveawayapplication` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `posted_by` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giveawayapplication`
--

INSERT INTO `giveawayapplication` (`id`, `name`, `address`, `email`, `phone`, `posted_by`, `item_name`, `item_category`) VALUES
(2, 'Sheikh', 'Dhaka, Bangladesh', 'sheikh@gmail.com', 1512345789, 'Fund Raiser', 'Full Shirt', 'Clothing'),
(3, 'Saif Rohan', 'Kuril, Dhaka', 'rohan@rmail.com', 1456789123, 'Donor', 'Student Burger', 'Food'),
(4, 'Tanzim Ikram', 'Dhaka, Bangladesh', 'tanzim@gmail.com', 1723456789, '', '', ''),
(5, 'John Doe', 'Kuril, Dhaka', 'john@jmail.com', 1512345789, '', '', ''),
(6, 'John Doe', 'Cumilla, Bangladesh', 'john@jmail.com', 1723456789, 'Donor', '', ''),
(7, 'Saif Ali', 'Dhaka, Bangladesh', 'saif.ali@gmail.com', 1512345789, 'Fund Raiser', 'Full Shirt', 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `giveaways`
--

CREATE TABLE `giveaways` (
  `giveaway_id` int(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` int(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `posted_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giveaways`
--

INSERT INTO `giveaways` (`giveaway_id`, `item_category`, `item_name`, `item_quantity`, `posted_by`, `user_type`, `item_image`, `posted_time`) VALUES
(1, 'Clothing', 'Full Shirt', 3, 'Ikram', 'Fund Raiser', '../uploads/shirt_378037390_1000.jpg', '2024-03-20 00:55:16.933046'),
(3, 'Food', 'Student Burger', 50, 'Tanzim', 'Donor', '../uploads/burgers.jpeg', '2024-03-20 06:49:44.000000'),
(4, 'Clothing', '', 0, 'Tanzim', 'admin', '', '2024-04-08 17:13:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tempcamp`
--

CREATE TABLE `tempcamp` (
  `id` int(100) NOT NULL,
  `fundfor` varchar(100) NOT NULL,
  `contact_number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bank_type` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempcamp`
--

INSERT INTO `tempcamp` (`id`, `fundfor`, `contact_number`, `email`, `address`, `zipcode`, `reason`, `amount`, `user_type`, `username`, `bank_type`, `bank_name`, `account_number`) VALUES
(24, 'Charity', 1812345679, 'tanzim@gmail.com', 'Bhola, Bangladesh', 1100, 'Emergencies', 2000000, 'admin', 'Tanzim', 'Bank', 'Brac Bank', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phoneNumber` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `role`, `gender`, `phoneNumber`) VALUES
(1, 'Admin', 'admin', 'admin@1234', 'admin@fundme.com', 'admin', 'male', 1712345678),
(2, 'Tanzim Ikram', 'tanzim', 'abcd@1234', 'tanzim@gmail.com', 'Donor', 'Male', 1712345678),
(3, 'Ikram Sheikh', 'Ikram', 'ikram@1234', 'ikram@email.com', 'Fund Raiser', 'Male', 1723456789),
(17, 'Md Karim', 'karim', 'karim@1234', 'karim@gmail.com', 'Donor', 'Male', 1919905286),
(18, 'Md Fahim', 'fahim', 'fahim@1234', 'fahim@gmail.com', 'Donor', 'Male', 1919905286),
(19, 'Md Rahim', 'rahim', 'rahim@1234', 'rahim@gmail.com', 'Donor', 'Male', 1612345678),
(20, 'Md Abdulla', 'abdulla', 'abdulla@1234', 'abdulla@gmail.com', 'Donor', 'Male', 1812345678);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaings`
--
ALTER TABLE `campaings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favcamp`
--
ALTER TABLE `favcamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giveawayapplication`
--
ALTER TABLE `giveawayapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giveaways`
--
ALTER TABLE `giveaways`
  ADD PRIMARY KEY (`giveaway_id`);

--
-- Indexes for table `tempcamp`
--
ALTER TABLE `tempcamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaings`
--
ALTER TABLE `campaings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favcamp`
--
ALTER TABLE `favcamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giveawayapplication`
--
ALTER TABLE `giveawayapplication`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giveaways`
--
ALTER TABLE `giveaways`
  MODIFY `giveaway_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tempcamp`
--
ALTER TABLE `tempcamp`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
