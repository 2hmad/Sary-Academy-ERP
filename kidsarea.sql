-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 10:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidsarea`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(255) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `hours` int(11) NOT NULL,
  `price` text NOT NULL,
  `date` text NOT NULL,
  `month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounting`
--

INSERT INTO `accounting` (`id`, `code`, `name`, `hours`, `price`, `date`, `month`) VALUES
(1, 'd7436c89', '', 5, '5', '2021-05-24', 'May'),
(2, 'd7436c89', '', 50, '1', '2021-05-24', 'May');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(255) NOT NULL,
  `code` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `code`, `date`, `time`, `tag`) VALUES
(1, 'd7436c89', '2021-05-24', '03:56:03pm', 'Check'),
(2, 'd7436c89', '2021-05-24', '03:56:23pm', 'Check'),
(3, 'd7436c89', '2021-05-24', '03:56:37pm', 'New'),
(4, 'd7436c89', '2021-05-25', '03:56:40pm', 'Check'),
(5, 'd7436c89', '2021-05-24', '05:10:29pm', 'Recharge card'),
(6, 'd7436c89', '2021-05-24', '05:13:58pm', 'Timer Started'),
(7, 'd7436c89', '2021-05-25', '02:20:51am', 'Timer Stopped'),
(8, 'd7436c89', '2021-05-25', '02:20:57am', 'Timer Started');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `type` text NOT NULL,
  `month` text NOT NULL,
  `date` text NOT NULL,
  `present` text NOT NULL,
  `absence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `code`, `name`, `position`, `type`, `month`, `date`, `present`, `absence`) VALUES
(1, 'd7436c89', 'Ahmed Mohamed', '', 'Student', 'May', '2021-05-25', '02:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `phone` text DEFAULT NULL,
  `birthday` text NOT NULL,
  `gender` text NOT NULL,
  `code` text NOT NULL,
  `kind` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `hours` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `phone`, `birthday`, `gender`, `code`, `kind`, `position`, `salary`, `profile_pic`, `hours`) VALUES
(1, 'Ahmed Mohamed', '00000000000', '', 'Male', 'd7436c89', 'Employee', '', '', 'placeholder.jpg', 48),
(2, '', NULL, '', '', 'd7436c88', NULL, NULL, NULL, 'placeholder.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(255) NOT NULL,
  `code` text NOT NULL,
  `date` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `code`, `date`, `start_time`, `end_time`, `status`) VALUES
(1, 'd7436c89', '2021-05-25', '17:13', '2:18', 'Stopped'),
(2, 'd7436c89', '2021-05-25', '02:20', '02:21', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` char(40) NOT NULL,
  `gender` text NOT NULL,
  `phone` text DEFAULT NULL,
  `role` text NOT NULL,
  `per_one` text NOT NULL,
  `per_two` text NOT NULL,
  `per_three` text NOT NULL,
  `per_four` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `role`, `per_one`, `per_two`, `per_three`, `per_four`) VALUES
(1, 'Ahmed Mohamed', 'eng.ahmedmohamed.2002@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Male', '+201275457924', 'Superadmin', 'All', 'Accounting', 'Add hours', 'card verification');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
