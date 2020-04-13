-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 12:42 PM
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
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `leave_purpose` varchar(50) DEFAULT NULL,
  `leave_address` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `duties_carried_by` varchar(40) DEFAULT NULL,
  `supervisor` varchar(40) DEFAULT NULL,
  `hod` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`id`, `employee_name`, `employee_email`, `designation`, `department`, `company_div`, `leave_from`, `leave_to`, `leave_purpose`, `leave_address`, `contact`, `duties_carried_by`, `supervisor`, `hod`) VALUES
(5, 'Dhiman kumar sarker', '', 'programmer', 'software implementation', 'SIL', '0000-00-00', '0000-00-00', 'sick', 'dhaka', '01717677400', 'Ashfakur Rahman', 'Shoikot Chowdhury', 'Shah Jalal'),
(6, 'Dhiman kumar sarker', '', 'programmer', 'software implementation', 'SIL', '0000-00-00', '0000-00-00', 'sick', 'dhaka', '01717677400', 'Ashfakur Rahman', 'Shoikot Chowdhury', 'Shah Jalal'),
(7, 'Dhiman kumar sarker', '', 'programmer', 'software implementation', 'SIL', '0000-00-00', '0000-00-00', 'sick', 'dhaka', '23234234', 'asfak', 'Shoikot Chowdhury', 'Shah Jalal'),
(8, 'sarker', '', 'programmer', 'software implementation', 'SB', '2020-04-09', '2020-04-17', 'sick', 'dhaka', '23234234', 'asfak', 'Shoikot Chowdhury', 'Shah Jalal'),
(9, 'sarker', '', 'programmer', 'software implementation', 'SB', '2020-04-09', '2020-04-17', 'sick', 'dhaka', '23234234', 'asfak', 'Shoikot Chowdhury', 'Shah Jalal'),
(11, 'sagor sarker', '', 'programmer', 'software implementation', 'SIL', '2020-04-13', '2020-04-16', 'sick', 'dhaka', '01717677400', 'Ashfakur Rahman', 'Shoikot Chowdhury', 'Shah Jalal'),
(12, 'sajed ahmed', 'sajed.ahmed@synesisit.com.bd', 'senior programmer', 'software implementation', 'SIL', '2020-04-14', '2020-04-15', 'casual', 'dhaka', '23234234', 'sagor', 'shoikot@gmail.com', 'shahjalal@gmail.com'),
(13, 'Sajed Ahmed', 'sajed.ahmed@synesisit.com.bd', 'programmer', 'software implementation', 'SIL', '2020-04-13', '2020-04-16', 'sick', 'dhaka', '23234234', 'asfak', 'shoikot@gmail.com', 'shahjalal@gmail.com');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
