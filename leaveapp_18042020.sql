-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 11:36 PM
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
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `company_div` varchar(10) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `leave_purpose` text NOT NULL,
  `leave_address` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `alt_person_id` int(11) UNSIGNED NOT NULL,
  `supervisor_id` int(11) UNSIGNED NOT NULL,
  `dept_head_id` int(11) UNSIGNED NOT NULL,
  `supervisor_approval` enum('PENDING','YES','NO') NOT NULL DEFAULT 'PENDING',
  `hod_approval` enum('PENDING','YES','NO') NOT NULL DEFAULT 'PENDING',
  `hr_approval` enum('PENDING','YES','NO') NOT NULL DEFAULT 'PENDING',
  `final_status` enum('PENDING','YES','NO') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`id`, `employee_name`, `employee_email`, `position_id`, `department_id`, `company_div`, `leave_from`, `leave_to`, `leave_type`, `leave_purpose`, `leave_address`, `contact`, `alt_person_id`, `supervisor_id`, `dept_head_id`, `supervisor_approval`, `hod_approval`, `hr_approval`, `final_status`) VALUES
(8, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 1, 17, 'SIL', '2020-04-08', '2020-04-09', '1', 'casual', 'green road', '01717677400', 1, 48, 0, 'PENDING', 'PENDING', 'PENDING', 'PENDING'),
(9, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 1, 17, 'SIL', '2020-04-22', '2020-04-23', 'Casual', 'casual', 'dhaka', '+8801717677400', 1, 48, 0, 'PENDING', 'PENDING', 'PENDING', 'PENDING'),
(10, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 1, 17, '1', '2020-04-08', '2020-04-24', 'Casual', 'casual', 'green road', '01717677400', 1, 48, 0, 'PENDING', 'PENDING', 'PENDING', 'PENDING'),
(11, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 1, 17, '4', '2020-04-08', '2020-04-24', 'Casual', 'casual', 'green road', '01717677400', 1, 48, 0, 'PENDING', 'PENDING', 'PENDING', 'PENDING'),
(12, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 1, 17, '2', '2020-04-08', '2020-04-24', 'Casual', 'casual', 'green road', '01717677400', 1, 48, 0, 'PENDING', 'PENDING', 'PENDING', 'PENDING');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
