-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 03:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaveapp`
--

CREATE TABLE `leaveapp` (
  `id` int(6) UNSIGNED NOT NULL,
  `employee_name` varchar(40) NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `department` varchar(40) NOT NULL,
  `company_div` varchar(10) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_purpose` varchar(50) NOT NULL,
  `leave_address` varchar(50) NOT NULL,
  `contact` int(16) UNSIGNED NOT NULL,
  `alt_person_id` int(4) UNSIGNED NOT NULL,
  `supervisor_id` int(4) UNSIGNED NOT NULL,
  `dept_head_id` int(4) UNSIGNED NOT NULL,
  `supervisor_approval` varchar(10) NOT NULL,
  `hod_approval` varchar(10) NOT NULL,
  `hr_approval` varchar(10) NOT NULL,
  `final_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`id`, `employee_name`, `employee_email`, `designation`, `department`, `company_div`, `leave_from`, `leave_to`, `leave_purpose`, `leave_address`, `contact`, `alt_person_id`, `supervisor_id`, `dept_head_id`, `supervisor_approval`, `hod_approval`, `hr_approval`, `final_status`) VALUES
(1, 'Dhiman Sarker', 'dhiman.kumar@synesisit.com.bd', 'Programmer', 'Software Development', 'SIL', '2020-04-26', '2020-04-28', 'casual', 'dhaka', 1717677400, 1, 3, 3, 'pending', 'pending', 'pending', 'pending'),
(2, 'Dhiman Sarker', 'dhiman.kumar@synesisit.com.bd', 'Programmer', 'Software Development', 'SIL', '2020-04-21', '2020-04-23', 'casual', 'dhaka', 1717677400, 1, 3, 3, 'pending', 'pending', 'pending', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
