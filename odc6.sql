-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 09:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odc6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `photo`) VALUES
(1, 'mehrael', '123', '1663876397Mehrael..jpeg'),
(4, 'new admin', '123', '1663873014HD wallpaper_ Dr_ Strange New York Sanctum, Doctor Strange, Artwork, Minimal.jpg'),
(5, 'admin3', '456', '1663873050'),
(6, 'nameeeee', '987', '1663878448vlcsnap-2022-08-18-17h43m09s816.png');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`) VALUES
(1, 'IT'),
(2, 'HR'),
(4, 'PR'),
(5, 'FR'),
(6, 'Sales'),
(7, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `photo` varchar(500) NOT NULL,
  `depID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `salary`, `phone`, `photo`, `depID`) VALUES
(6, 'ccc', 1234, '852', '', 2),
(8, 'sdf', 741, '321', '', 4),
(10, 'ppp', 456, '123', '', 6),
(11, 'dd', 1233, '4567', '', 7),
(12, 'aaa', 5, '4562389', '1663858993HD wallpaper_ Dr_ Strange New York Sanctum, Doctor Strange, Artwork, Minimal.jpg', 1),
(13, 'dr strange', 2147483647, '12345679801', '1663859042HD wallpaper_ Dr_ Strange New York Sanctum, Doctor Strange, Artwork, Minimal.jpg', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `emp_view`
-- (See below for the actual view)
--
CREATE TABLE `emp_view` (
`id` int(11)
,`emp_name` varchar(20)
,`salary` int(11)
,`phone` varchar(11)
,`photo` varchar(500)
,`depID` int(11)
,`dep_name` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `emp_view`
--
DROP TABLE IF EXISTS `emp_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_view`  AS SELECT `employees`.`id` AS `id`, `employees`.`emp_name` AS `emp_name`, `employees`.`salary` AS `salary`, `employees`.`phone` AS `phone`, `employees`.`photo` AS `photo`, `employees`.`depID` AS `depID`, `departments`.`dep_name` AS `dep_name` FROM (`employees` join `departments` on(`employees`.`depID` = `departments`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depID` (`depID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`depID`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
