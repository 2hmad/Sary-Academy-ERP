-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 12:50 AM
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
  `hours` int(11) NOT NULL,
  `price` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounting`
--

INSERT INTO `accounting` (`id`, `code`, `hours`, `price`, `date`) VALUES
(1, '5', 5, '50', '05-07-2021'),
(2, '5', 5, '50', '2021-05-07');

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
(1, '5', '2021-05-06', '11:55:10pm', 'New'),
(2, '5', '2021-05-06', '04:18:44pm', 'Timer Started'),
(3, '5', '2021-05-06', '12:35:45am', 'Recharge card'),
(4, '5', '2021-05-06', '02:33:19am', 'Check'),
(5, '6', '2021-05-06', '02:33:39am', 'New'),
(6, '5', '2021-05-06', '11:55:10pm', 'New'),
(7, '5', '2021-05-06', '04:18:44pm', 'Timer Started'),
(8, '5', '2021-05-06', '12:35:45am', 'Recharge card'),
(9, '5', '2021-05-06', '02:33:19am', 'Check'),
(10, '6', '2021-05-06', '02:33:39am', 'New'),
(11, '5', '2021-05-06', '11:55:10pm', 'New'),
(12, '5', '2021-05-06', '04:18:44pm', 'Timer Started'),
(13, '5', '2021-05-06', '12:35:45am', 'Recharge card'),
(14, '5', '2021-05-06', '02:33:19am', 'Check'),
(15, '6', '2021-05-06', '02:33:39am', 'New'),
(16, '5', '2021-05-06', '11:55:10pm', 'New'),
(17, '5', '2021-05-06', '04:18:44pm', 'Timer Started'),
(18, '5', '2021-05-06', '12:35:45am', 'Recharge card'),
(19, '5', '2021-05-06', '02:33:19am', 'Check'),
(20, '6', '2021-05-06', '02:33:39am', 'New');

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
(26, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(27, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(28, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(29, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(30, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(31, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(32, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(33, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(34, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(35, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(36, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(37, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(38, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(39, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(40, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06'),
(41, '5', 'احمد محمد ابراهيم', 'Engineer', 'Employee', 'May', '2021-05-06', '02:55', '03:06');

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
(1, 'احمد محمد ابراهيم', '00000000000', '2021-05-03', 'Male', '5', 'Employee', 'Engineer', '5000', 'placeholder.jpg', 25);

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
(1, '5', '2021-04-28', '04:18:44pm', '07:19:00pm', 'Complete'),
(2, '5', '2021-04-28', '04:18:44pm', '08:04:50pm', 'Complete');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `role`) VALUES
(1, 'Ahmed Mohamed', 'eng.ahmedmohamed.2002@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Male', '+201275457924', 'Superadmin');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
