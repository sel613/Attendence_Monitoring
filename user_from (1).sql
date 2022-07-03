-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 06:23 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_from`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `at_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `emp_id` int(4) NOT NULL,
  `dept_id` int(2) NOT NULL,
  `shift_id` int(1) NOT NULL,
  `in_time` time NOT NULL,
  `break_out` time NOT NULL,
  `break_in` time NOT NULL,
  `out_time` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`at_id`, `user_name`, `emp_id`, `dept_id`, `shift_id`, `in_time`, `break_out`, `break_in`, `out_time`, `status`, `date`) VALUES
(1, 'sri', 111, 2, 1, '01:20:00', '04:15:00', '04:30:00', '09:20:00', 'P', '2022-06-24'),
(2, 'devi', 112, 2, 1, '01:20:00', '04:15:00', '04:30:00', '09:20:00', 'P', '2022-06-24'),
(3, 'sowmi', 32, 1, 6, '06:00:00', '09:00:00', '09:15:00', '04:00:00', 'P', '2022-06-24'),
(4, 'sowmi', 32, 1, 6, '06:00:00', '09:00:00', '09:15:00', '04:00:00', 'P', '2022-06-24'),
(5, 'sowmi', 32, 1, 6, '06:00:00', '09:00:00', '09:15:00', '04:00:00', 'P', '2022-06-24'),
(6, 'sasi', 31, 2, 5, '07:00:45', '09:45:35', '10:00:00', '05:00:00', 'p', '2022-06-20'),
(7, 'sasi', 31, 2, 5, '07:00:45', '09:45:35', '10:00:00', '05:00:00', 'p', '2022-06-21'),
(8, 'sasi', 31, 2, 5, '07:00:45', '09:45:35', '10:00:00', '05:00:00', 'p', '2022-06-19'),
(9, 'sasi', 31, 2, 5, '07:00:45', '09:45:35', '10:00:00', '05:00:00', 'p', '2022-06-22'),
(10, 'sasi', 31, 2, 5, '07:00:45', '09:45:35', '10:00:00', '05:00:00', 'p', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(3) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `manager_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `manager_id`) VALUES
(1, 'EDP', '100'),
(2, 'SALES', '101'),
(3, 'EMBROIDARY', '100');

-- --------------------------------------------------------

--
-- Table structure for table `employee_shift`
--

CREATE TABLE `employee_shift` (
  `emp_id` int(4) NOT NULL,
  `shift_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_shift`
--

INSERT INTO `employee_shift` (`emp_id`, `shift_id`) VALUES
(100, 1),
(101, 2),
(102, 1),
(103, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `shift_id` int(2) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `gracetime` time NOT NULL,
  `min_workhours` int(2) NOT NULL,
  `shift_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`shift_id`, `start`, `end`, `gracetime`, `min_workhours`, `shift_type`) VALUES
(0, '13:20:00', '21:20:00', '00:15:00', 8, 'Day'),
(1, '08:00:00', '17:00:00', '00:00:00', 0, ''),
(2, '17:00:00', '02:00:00', '00:00:00', 0, ''),
(3, '06:50:00', '15:00:00', '00:20:00', 8, 'Day'),
(4, '01:50:00', '10:00:00', '00:20:00', 8, 'Day'),
(5, '01:20:00', '09:20:00', '00:15:00', 8, 'Day'),
(6, '08:52:00', '16:30:00', '00:15:00', 7, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `position` varchar(20) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `position`, `dept_id`, `image`) VALUES
(30, 'selvapriya_631', 'selva@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', 0, 'IMG-20210206-WA0072 (2).jpg'),
(31, 'sasi', 'sasi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', 0, 'pic-3.png'),
(32, 'sowmi', 'sowmi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', '', 0, 'pic-6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee_shift`
--
ALTER TABLE `employee_shift`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
