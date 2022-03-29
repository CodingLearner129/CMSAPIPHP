-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 03:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(8) NOT NULL,
  `company_username` varchar(100) NOT NULL,
  `company_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_username`, `company_password`) VALUES
(1, 'web solution', '$2y$10$ux6vxX1.sFrlFTyFyNc9y.XiJBSM8FssUCd0jtr8Mun.y7xqNMHkG');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(8) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(255) NOT NULL,
  `company` int(8) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `email`, `employee_password`, `phone`, `gender`, `dob`, `profile`, `company`, `timestamp`) VALUES
(1, 'dummy', 'dummy@duumy.com', 'Dummy@123', '9898989898', 'male', '1993-02-01', 'assets/img/profile.png', 1, '2022-03-29 16:07:23'),
(2, 'dummy1', 'dummy1@duumy.com', 'Dummy1@123', '9898989891', 'female', '1994-02-01', 'assets/img/profile.png', 1, '2022-03-29 16:12:48'),
(3, 'dummy2', 'dummy2@duumy.com', 'Dummy2@123', '9898989892', 'male', '1992-03-02', 'assets/img/profile.png', 1, '2022-03-29 16:31:19'),
(5, 'dummy', '', '', '', '', '1993-02-01', '', 0, '2022-03-29 18:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
