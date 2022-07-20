-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 10:39 PM
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
  `date_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`at_id`, `user_name`, `emp_id`, `dept_id`, `shift_id`, `in_time`, `break_out`, `break_in`, `out_time`, `status`, `date_`) VALUES
(1, 'vikram', 101, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(2, 'kala', 103, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(3, 'jaishankar', 105, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(4, 'dhivya', 120, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(5, 'palanisamy', 122, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(6, 'pooja', 123, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(7, 'maanikkam', 102, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(8, 'deepak', 110, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(9, 'senthilraj', 114, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(10, 'maalik', 117, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(11, 'durga', 119, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(12, 'mirudhula', 124, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(13, 'vijaya', 127, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(14, 'prema', 134, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(15, 'raji', 135, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(16, 'yalini', 137, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(17, 'punitha', 138, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(18, 'poornima', 139, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-18'),
(19, 'vikram', 101, 1, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-18'),
(20, 'maalik', 117, 2, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-18'),
(21, 'punitha', 138, 3, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-18'),
(22, 'vikram', 101, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(23, 'maanikkam', 102, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(24, 'kala', 103, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(25, 'sasidharan', 106, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(26, 'dhivya', 119, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(27, 'palanisamy', 122, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(28, 'pooja', 123, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(29, 'senthilraj', 114, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(30, 'maalik', 117, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(31, 'deepak', 110, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(32, 'dilipan', 111, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(33, 'durga', 119, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(34, 'mirudhula', 124, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(35, 'sangeetha', 125, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(36, 'vijaya', 127, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(37, 'raji', 135, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(38, 'punitha', 138, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-19'),
(39, 'vikram', 101, 1, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-19'),
(40, 'punitha', 138, 3, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-19'),
(41, 'vikram', 101, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(42, 'kala', 103, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(43, 'dharani', 107, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(44, 'palanisamy', 122, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(45, 'pooja', 123, 1, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(46, 'senthilraj', 114, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(47, 'maalik', 117, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(48, 'fiza', 116, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(49, 'deepak', 110, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(50, 'dilipan', 111, 2, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(51, 'savithiri', 126, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(52, 'mirudhula', 124, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(53, 'vijaya', 128, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(54, 'moneeshwari', 130, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(55, 'raji', 135, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(56, 'punitha', 138, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(57, 'yalini', 137, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(58, 'poornima', 139, 3, 1, '07:00:00', '10:00:00', '10:15:00', '17:00:00', 'P', '2022-07-20'),
(59, 'vikram', 101, 1, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-20'),
(60, 'punitha', 138, 3, 2, '15:00:00', '18:00:00', '18:15:00', '24:00:00', 'P', '2022-07-20');

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
(1, '07:00:00', '17:00:00', '00:00:15', 8, 'Day'),
(2, '15:00:00', '23:00:00', '00:00:15', 8, 'Day');

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
(1, 'manoj', 'manoj2303@gmail.com', 'manoj1234', 'admin', '', 2, 'profile.jpg'),
(101, 'vikram', 'vikrammani6203@gmail.com', 'bc56533f9b0bbfb8a85ee4ddc785cc44', 'user', '', 1, 'profile.jpg'),
(102, 'Maanikkam', 'maanikam8907@gmail.com', 'a948d4bcc5a5e5162d74ab71217e5544', 'user', '', 1, ''),
(103, 'kala', 'kalamagesh3456@gmail.com', '60f0e43dfe72c6a3d1617ca309c8e8e2', 'user', '', 1, ''),
(104, 'kanmani', 'kanmani5678@gmail.com', 'be94767ecf7001ccb10cbcdbe02dd84d', 'user', '', 1, ''),
(105, 'jaishankar', 'jaishankar2534@gmail.com', '07613fd8f333b033730a1f9c8fae655f', 'user', '', 1, ''),
(106, 'sasidharan', 'sasidharan2635@gmail.com', '2234c3aaaebac9490fc3ac04d21872f5', 'user', '', 1, ''),
(107, 'dharani', 'dharani476@gmail.com', 'dca12af4c79ffe8ba6e5efcaab54614d', 'user', '', 1, ''),
(109, 'dharanisuryan', 'dharnisuryan309@gmail.com', 'dca12af4c79ffe8ba6e5efcaab54614d', 'user', '', 2, ''),
(110, 'deepak', 'deepak765@gmail.com', '97288693489645c57baacf2aea324b0d', 'user', '', 2, ''),
(111, 'dilipan', 'dilipan710@gamil.com', '091287a49e4a9d872a93f615aeb677b0', 'user', '', 2, ''),
(112, 'murugesh', 'murugesh610@gmail.com', '2752facfaca99bfe041b8d53b8f2a86c', 'user', '', 2, ''),
(114, 'senthilraj', 'senthil001@gmail.com', '1bb744d24c0e54b63a604ad1b557b45e', 'user', '', 2, ''),
(115, 'sreedhar', 'sreedhar301@gmail.com', '7514e478fd1bcca7d63311793245b0cc', 'user', '', 2, ''),
(116, 'fiza', 'fiza901@gmail.com', '8ecffd13291e31993fd8ea98ca0bc687', 'user', '', 2, ''),
(117, 'maalik', 'maalik719@gmail.com', 'a948d4bcc5a5e5162d74ab71217e5544', 'user', '', 2, ''),
(118, 'safiq', 'safiq666@gmail.com', '5fc09930ef104ca85d105dc4481db18a', 'user', '', 2, ''),
(119, 'durga', 'durga801@gmail.com', 'b28cea3906a5a5f7d69f3f328d02c0f3', 'user', '', 2, ''),
(120, 'dhivya', 'dhivya5362@gmail.com', '257e823ec35a5f6e487f5639bc6b4474', 'user', '', 1, ''),
(121, 'muniraasu', 'muniraasu132@gmail.com', '2cc4079afabbec34edc22eaf9715313d', 'user', '', 1, ''),
(122, 'palanisamy', 'palanisamy209@gmail.com', 'd13981bbc7ac30455e32bbf63689c7e8', 'user', '', 1, ''),
(123, 'pooja', 'poojakumar@gmail.com', 'a055588216ec2e2d44713f906c7adc2a', 'user', '', 1, ''),
(124, 'mirudhula', 'mirudhula001@gmail.com', 'bd463923d8ef13fd529841e1c2c98172', 'user', '', 3, ''),
(125, 'sangeetha', 'sangeetha312@gmail.com', 'bfce5bba97720e9d403216cfb17c2b67', 'user', '', 3, ''),
(126, 'savithiri', 'savithirikanagam@gmail.com', '3328f03d6e866b6985437481af786a93', 'user', '', 3, ''),
(127, 'vijaya', 'vijayasundharam@gmail.com', 'b5f643e6e9ce8961ea45f78a6eca9821', 'user', '', 3, ''),
(128, 'viveka', 'vivekakanagaraj@gmail.com', '1752eb81cbf28eb0bc09f0dcd04bff9a', 'user', '', 3, ''),
(130, 'moneeshwari', 'moneeshwari999@gmail.com', 'dcd0820d3eb008fc3271f9ee2205d5ba', 'user', '', 3, ''),
(132, 'priya', 'priyaganapathi@gmail.com', '00aa167c00a12344b4e075b1b1d182e4', 'user', '', 3, ''),
(133, 'preethika', 'preethika563@gmail.com', '157c00194d9beb8eae10827d99b363d0', 'user', '', 3, ''),
(135, 'raji', 'rajikishore@gmail.com', 'fb0fc43b61b7796f9ff9a5d8e20b291e', 'user', '', 3, ''),
(137, 'yalini', 'yalini671@gmail.com', '7bcc2b5aeab9e1bfa716963b900779ac', 'user', '', 3, ''),
(138, 'punitha', 'punithaur@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', 3, ''),
(139, 'poornima', 'poornikanmani@gmail.com', 'a055588216ec2e2d44713f906c7adc2a', 'user', '', 3, ''),
(140, 'saranya', 'saranyanagaraj@gmail.com', '341f32a802bcdf9e1d766f5275447f0b', 'user', '', 3, '');

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
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
