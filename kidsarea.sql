-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2021 at 02:35 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14515899_kidsarea`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `code`, `date`, `time`, `tag`) VALUES
(1, '5154', '2021-04-24', '2:35:16am', '');

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
  `profile_pic` varchar(255) DEFAULT NULL,
  `hours` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `phone`, `birthday`, `gender`, `code`, `profile_pic`, `hours`) VALUES
(2, 'Ahmed Mohamed Ibrahim', '+20', '2002-09-11', 'Male', '1', 'itgo-01.jpg', 30),
(3, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'itgo-01.jpg', 29),
(4, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'itgo-01.jpg', 29),
(5, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'placeholder.jpg', 29),
(6, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'itgo-01.jpg', 29),
(7, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'itgo-01.jpg', 29),
(8, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '', 'itgo-01.jpg', 29),
(9, 'Ahmed Mohamed', '+20', '2002-09-11', 'Male', '50651', 'placeholder.jpg', 29),
(12, '', NULL, '', '', '45236', 'placeholder.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(255) NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price`) VALUES
(1, '21');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `code`, `date`, `start_time`, `end_time`, `status`) VALUES
(6, '', '2021-04-24', '01:08:11am', '01:08:11am', 'Complete'),
(7, '', '2021-04-24', '01:08:25am', '01:14:00am', 'Complete'),
(8, '', '2021-04-24', '01:13:16am', '01:16:16am', 'Complete'),
(9, '', '2021-04-24', '01:52:05am', '02:15:05am', 'Complete'),
(11, '45236', '2021-04-25', '04:32:49pm', '05:32:49pm', 'Complete'),
(12, '1', '2021-04-25', '10:57:55pm', '11:57:55pm', 'Complete'),
(13, '1', '2021-04-25', '10:58:50pm', '11:58:50pm', 'Complete');

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
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `role`) VALUES
(1, 'Ahmed Mohamed', 'eng.ahmedmohamed.2002@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Male', '+201275457924', 'Superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
