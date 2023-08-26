-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 12:40 AM
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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `role`, `image`) VALUES
(3, 'ahmed', '123', 1, 'profile.png'),
(4, 'ali ahmed', '123', 2, '1693002951ali.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminalldata`
-- (See below for the actual view)
--
CREATE TABLE `adminalldata` (
`id` int(11)
,`name` varchar(50)
,`image` varchar(50)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminroles`
-- (See below for the actual view)
--
CREATE TABLE `adminroles` (
`id` int(11)
,`name` varchar(50)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'hr'),
(5, 'Network'),
(9, 'is'),
(11, 'pr');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `image` text NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `image`, `department_id`) VALUES
(29, 'ahmed mohamed', 1000, '16926229313baky.jpg', 5),
(31, 'hossam ahmed', 30000, '1692623806hossam.jpg', 5),
(32, 'zeko', 1000, '1692624169ali.jpg', 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeswithdepartement`
-- (See below for the actual view)
--
CREATE TABLE `employeeswithdepartement` (
`id` int(11)
,`empname` varchar(50)
,`salary` int(11)
,`image` text
,`depname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'super admin'),
(2, 'acces employee and department'),
(3, 'department only');

-- --------------------------------------------------------

--
-- Structure for view `adminalldata`
--
DROP TABLE IF EXISTS `adminalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminalldata`  AS SELECT `admin`.`id` AS `id`, `admin`.`name` AS `name`, `admin`.`image` AS `image`, `roles`.`description` AS `description` FROM (`admin` join `roles` on(`admin`.`role` = `roles`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `adminroles`
--
DROP TABLE IF EXISTS `adminroles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminroles`  AS SELECT `admin`.`id` AS `id`, `admin`.`name` AS `name`, `roles`.`description` AS `description` FROM (`admin` join `roles` on(`admin`.`role` = `roles`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeswithdepartement`
--
DROP TABLE IF EXISTS `employeeswithdepartement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeswithdepartement`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `empname`, `employees`.`salary` AS `salary`, `employees`.`image` AS `image`, `department`.`name` AS `depname` FROM (`employees` join `department` on(`employees`.`department_id` = `department`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `role` (`role`),
  ADD KEY `profile_id` (`image`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
