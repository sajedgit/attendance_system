-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 11:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
(1, 'admin', '$2y$10$XA5guoPJ68YiiBFMjQNuEe/iu4yasMZP7EaJusgws5DYss5MJEzUy', 'Admin', '', 'admin@admin.com', 'christmas-toy-1.jpeg', '2018-04-30');

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
(115, 1, '2020-03-30', '00:48:57', 1, '12:42:04', 10.883333333333),
(116, 3, '2020-03-30', '02:08:49', 1, '02:15:55', 0.11666666666667);

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
(3, '2018-05-02', '1', 1000);

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

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `active`) VALUES
(6, 'Solution', 1),
(7, 'VAS', 1),
(8, 'Tenderbazar', 1),
(9, 'Call Center Solution', 1),
(10, 'People & Culture', 1),
(11, 'Synesis Health', 1),
(12, 'Finance & Accounts', 1),
(13, 'General Support Staff', 1),
(14, 'Technoogy Operation', 1),
(15, 'Business Solution', 1),
(16, 'Project Management', 1),
(17, 'Software Development', 1),
(18, 'SQA Department', 1);

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
(1, 'ABC123456789', 'sajed.ahmed@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sajed', 'Ahmed', 'Brgy. Mambulac, Silay City', '2018-04-02', '01913516135', 'Female', 17, 10, 1, 'photo.jpg', '2018-04-28'),
(3, 'DYE473869250', 'shah.jalal@synesisit.com.bd', '$2y$10$55rCrGpYbEWkW.8I7YF5WOFL64A0z4/6qubCjaCGUTIt3azrELHa2', 'Shah', 'Jalal', 'E.B. Magalona', '1992-05-02', '01619888979', 'Female', 17, 9, 1, 'unnamed.jpg', '2018-04-30');

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
(1, 'Programmer', 60),
(4, 'Graphic Designer', 50),
(7, 'GM', 100),
(8, 'AGM', 90),
(9, 'Head Of Department', 80),
(10, 'Sr. Programmer', 70),
(11, 'System Analyst', 60),
(12, 'Sr. System Analyst ', 60),
(13, 'DBA', 55),
(14, 'Analyst Programmer', 55),
(15, 'Associate DBA', 50),
(16, 'Asst. DBA', 40),
(17, 'Implementation Engineer\r\n', 50),
(18, 'Technical  writer\r\n', 45),
(19, 'Ux designer\r\n', 40),
(20, 'Jr. Programmer\r\n', 35),
(21, 'SQA Engineer\r\n', 35),
(22, 'Jr. Business Analyst\r\n', 30),
(24, 'Sr. Manager', 85),
(25, 'Project Manager\r\n', 80),
(26, 'Sr. Executive', 75),
(27, 'Executive\r\n', 70),
(28, 'Business Analyst\r\n', 65),
(29, 'Intern\r\n', 10),
(30, 'DGM\r\n', 90),
(31, 'Asst. Manager\r\n', 75),
(32, 'Manager', 90),
(33, 'Sr. System Administrator\r\n', 85),
(44, 'Supervisor DWASA\r\n', 75),
(45, 'Sr. Executive, Customer Service\r\n', 70),
(46, 'IT & Infrastructure Engineer\r\n', 55),
(47, 'Technical Support\r\n', 55),
(48, 'Supervisor\r\n', 50),
(49, 'Support Engineer\r\n', 45),
(50, 'Electrician\r\n', 30),
(51, 'Driver', 25),
(52, 'General Support Staff', 25),
(53, 'Product Manager\r\n', 45),
(54, 'Executive, Customer Service\r\n', 60),
(55, 'Executive, Operation\r\n', 50),
(56, 'Sr. Executive, Operation\r\n', 55),
(57, 'Administrative Assistant\r\n', 50),
(58, 'Jr. Sales Executive\r\n', 35),
(59, 'Graphics Designer\r\n', 55);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
