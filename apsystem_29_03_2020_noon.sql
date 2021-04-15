-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 01:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `photo`, `created_on`) VALUES
(1, 'aaa', '$2y$10$8P0oSi.AiAMDdEzQqpd3IOj1aWE5iV1iF6dBpfYXoWuANtkMCo5ku', 'Sajed', 'Ahmed ', '', 'christmas-toy-1.jpeg', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(13, 1, '2018-04-27', '08:00:00', 1, '17:00:00', 8),
(14, 1, '2018-04-28', '08:00:00', 1, '17:00:00', 8),
(15, 1, '2018-05-04', '08:00:00', 1, '17:00:00', 8),
(16, 1, '2018-05-02', '08:00:00', 1, '17:00:00', 8),
(17, 1, '2018-05-01', '08:00:00', 1, '17:00:00', 8),
(18, 1, '2018-05-03', '08:00:00', 1, '17:00:00', 8),
(74, 1, '2018-04-30', '08:00:00', 1, '16:44:23', 7.7333333333333),
(75, 3, '2018-04-18', '08:00:00', 1, '17:00:00', 8),
(76, 4, '2018-04-19', '08:00:00', 1, '17:00:00', 8),
(77, 4, '2018-04-27', '08:00:00', 1, '17:00:00', 7),
(78, 4, '2018-04-28', '08:00:00', 1, '17:00:00', 8),
(79, 4, '2018-05-01', '08:30:00', 1, '17:00:00', 8),
(80, 4, '2018-05-03', '08:00:00', 1, '17:00:00', 0),
(81, 4, '2018-05-05', '08:00:00', 1, '17:00:00', 9),
(83, 4, '2018-05-31', '12:00:00', 0, '18:00:00', 5),
(84, 4, '2018-05-18', '08:00:00', 1, '17:00:00', 7),
(85, 4, '2018-05-09', '09:00:00', 1, '18:00:00', 8),
(86, 5, '2018-07-11', '07:41:00', 1, '16:00:00', 7),
(87, 1, '2018-07-11', '06:27:00', 1, '15:00:00', 6),
(88, 6, '2018-07-11', '07:45:00', 1, '14:48:00', 3.8),
(89, 7, '2018-07-11', '07:56:00', 1, '17:00:00', 8),
(90, 8, '2018-07-11', '06:05:12', 1, '16:00:00', 7),
(91, 9, '2018-07-11', '18:12:06', 0, '00:00:00', 0),
(92, 10, '2018-07-11', '18:13:01', 0, '00:00:00', 0),
(93, 11, '2018-07-11', '18:14:30', 0, '00:00:00', 0),
(94, 12, '2018-07-11', '18:16:14', 0, '00:00:00', 0),
(95, 13, '2018-07-11', '18:17:32', 0, '00:00:00', 0),
(96, 14, '2018-07-11', '18:18:33', 0, '00:00:00', 0),
(97, 15, '2018-07-11', '18:19:26', 0, '00:00:00', 0),
(98, 16, '2018-07-11', '18:20:26', 0, '00:00:00', 0),
(99, 17, '2018-07-11', '18:21:41', 0, '00:00:00', 0),
(100, 18, '2018-07-12', '23:46:31', 1, '00:00:00', 0),
(101, 19, '2018-07-12', '23:50:28', 1, '00:00:00', 0),
(102, 20, '2018-07-12', '23:52:48', 1, '00:00:00', 0),
(103, 21, '2020-03-03', '23:54:50', 0, '00:00:00', 22.9),
(104, 22, '2018-07-12', '23:56:02', 1, '00:00:00', 0),
(105, 23, '2018-07-12', '13:57:00', 0, '00:00:00', 12.95),
(106, 1, '2020-03-25', '19:56:37', 0, '19:57:03', 2.9333333333333),
(107, 1, '2020-03-26', '09:00:00', 1, '18:00:00', 8),
(108, 1, '2020-03-29', '00:59:25', 1, '06:07:44', 2.8666666666667);

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `date_advance` date NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `date_advance`, `employee_id`, `amount`) VALUES
(2, '2018-05-02', '1', 1000),
(3, '2018-05-02', '1', 1000),
(4, '2018-07-12', '5', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(1, 'SSS', 100),
(2, 'Pagibig', 150),
(3, 'PhilHealth', 150),
(4, 'Project Issues', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `email`, `password`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `department_id`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(1, 'ABC123456789', 'sajedaiub@gmail.com', '$2y$10$8P0oSi.AiAMDdEzQqpd3IOj1aWE5iV1iF6dBpfYXoWuANtkMCo5ku', 'Sajed', 'Ahmed', 'Brgy. Mambulac, Silay City', '2018-04-02', '01913516135', 'Female', 0, 1, 1, 'christmas-toy-1.jpeg', '2018-04-28'),
(3, 'DYE473869250', 'DYE473869250', '', 'Julyn', 'Divinagracia', 'E.B. Magalona', '1992-05-02', '09123456789', 'Female', 0, 2, 1, '', '2018-04-30'),
(4, 'JIE625973480', 'JIE625973480', '', 'Gemalyn', 'Cepe', 'Carmen, Bohol', '1995-10-02', '09468029840', 'Female', 0, 2, 1, '', '2018-04-30'),
(5, 'TQO238109674', 'TQO238109674', '', 'Bruno', 'Den', 'Test', '1995-08-23', '5454578965', 'Male', 0, 1, 1, 'thanossmile.jpg', '2018-07-11'),
(6, 'EDQ203874591', 'EDQ203874591', '', 'Henry', 'Doe', 'New St. Esp', '1991-07-25', '9876543210', 'Male', 0, 2, 1, 'male.png', '2018-07-11'),
(7, 'TWY781946302', 'TWY781946302', '', 'Johnny', 'Jr', 'Esp', '1995-07-11', '8467067344', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(8, 'GWZ071342865', 'GWZ071342865', '', 'Tonny', 'Jr', 'Esp 12 South Street', '1994-07-19', '9876543210', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(9, 'HEL079321846', 'HEL079321846', '', 'Jacob', 'Carter', 'St12 N1', '1995-07-18', '5454578965', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(10, 'OCN273564901', 'OCN273564901', '', 'Benjamin', 'Cohen', 'TEST', '1991-07-25', '78548852145', 'Male', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(11, 'PGX413705682', 'PGX413705682', '', 'Ethan', 'Carson', 'DEMO', '1994-07-19', '8467067344', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(12, 'YWX536478912', 'YWX536478912', '', 'Daniel', 'Cooper', 'Test', '1995-07-11', '9876543210', 'Male', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(13, 'ALB590623481', 'ALB590623481', '', 'Emma', 'Wallis', 'Test', '1994-07-19', '9632145655', 'Female', 0, 1, 1, 'female4.jpg', '2018-07-11'),
(14, 'IOV153842976', 'IOV153842976', '', 'Sophia', 'Maguire', 'Test', '1995-07-11', '5454578965', 'Female', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(15, 'CAB835624170', 'CAB835624170', '', 'Mia', 'Hollister', 'Test', '1995-07-18', '9632145655', 'Female', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(16, 'MGZ312906745', 'MGZ312906745', '', 'Emily', 'JK', 'Test', '1996-07-24', '9876543210', 'Female', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(17, 'HSP067892134', 'HSP067892134', '', 'Nakia', 'Grey', 'Test', '1995-10-24', '8467067344', 'Female', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(18, 'BVH081749563', 'BVH081749563', '', 'Dave', 'Cruze', 'Demo', '1990-01-02', '5454578965', 'Male', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(19, 'ZTC714069832', 'ZTC714069832', '', 'Logan', 'Paul', 'Esp 16', '1994-12-30', '0202121255', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(20, 'VFT157620348', 'VFT157620348', '', 'Jack', 'Adler', 'Test', '1991-07-25', '6545698880', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11'),
(21, 'XRF342608719', 'XRF342608719', '', 'Mason', 'Beckett', 'Demo', '1996-07-24', '8467067344', 'Male', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(22, 'LVO541238690', 'LVO541238690', '', 'Lucas', 'Cooper', 'Demo', '1995-07-18', '9632145655', 'Male', 0, 2, 1, 'profile.jpg', '2018-07-11'),
(23, 'AEI036154829', 'AEI036154829', '', 'Alex', 'Cohen', 'Demo', '1995-08-23', '9632145655', 'Male', 0, 1, 1, 'profile.jpg', '2018-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `employee_id`, `hours`, `rate`, `date_overtime`) VALUES
(4, '6', 240, 1500, '2031-11-08'),
(5, '4', 283.33333333333, 3600, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programmer', 100),
(2, 'Writer', 50),
(3, 'Marketing ', 35),
(4, 'Graphic Designer', 75);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '09:00:00', '18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
