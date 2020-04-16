-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:15 PM
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
(118, 1, '2020-03-31', '09:45:00', 0, '22:52:51', 7.25),
(119, 43, '2020-03-31', '09:29:00', 1, '15:45:00', 5.2666666666667),
(131, 31, '2020-04-01', '10:00:00', 0, '11:00:00', 1),
(132, 1, '2020-03-10', '08:26:00', 1, '09:29:39', 0.48333333333333),
(133, 3, '2020-03-31', '09:29:43', 1, '10:50:41', 1.3333333333333),
(134, 42, '2020-04-01', '00:00:00', 1, '00:00:00', 8),
(135, 34, '2020-04-01', '13:45:00', 0, '13:45:00', 0),
(136, 59, '2020-04-01', '09:31:00', 0, '18:00:00', 7.4833333333333),
(137, 1, '2020-04-02', '02:13:51', 1, '21:04:00', 17.833333333333),
(138, 31, '2020-04-02', '20:41:26', 0, '20:43:58', 0.033333333333333),
(139, 161, '2020-04-02', '20:44:11', 0, '20:44:39', 0),
(140, 48, '2020-04-02', '20:44:49', 0, '20:54:16', 0.15),
(141, 91, '2020-04-02', '20:54:52', 0, '00:00:00', 0),
(142, 105, '2020-04-05', '16:27:33', 0, '00:00:00', 0),
(143, 1, '2020-04-05', '16:27:52', 0, '00:00:00', 0),
(144, 1, '2020-04-09', '12:05:10', 0, '18:58:08', 5.8666666666667),
(145, 105, '2020-04-16', '22:37:37', 0, '22:42:19', 0.066666666666667);

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
(18, 'SQA Department', 1),
(20, 'test', 0),
(21, 'uu', 0);

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
(1, 'ABC123456789', 'sajed.ahmed@synesisit.com.bd', '$2y$10$lH9THTVqiEcdUBRUKT/61.inGDhmMX2p3OPAP/AKaB1Nw4RMnv.Ka', 'Sajed', 'Ahmed', 'Brgy. Mambulac, Silay City', '2018-04-02', '01913516135', 'Female', 17, 10, 1, 'photo.jpg', '2018-04-28'),
(3, 'DYE473869250', 'shah.jalal@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Shah', 'Jalal', 'E.B. Magalona', '1992-05-02', '01619888979', 'Female', 17, 9, 1, 'unnamed.jpg', '2018-04-30'),
(31, 'IDK974512063', 'tanvir.alam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tanvir ', 'Alam', '', '0000-00-00', '', 'Male', 6, 7, 1, '', '2020-03-30'),
(32, 'XJS973654210', 'ziaur.rahman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Ziaur', 'Rahman', '', '0000-00-00', '', 'Male', 6, 8, 1, '', '2020-03-30'),
(33, 'XSY401573892', 'bijon@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Bijon', 'Kumar Dhar', '', '0000-00-00', '', 'Male', 18, 7, 1, '', '2020-03-30'),
(34, 'SBU384061579', 'mamun@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Quazi Abdullah ', 'Al Mamun', '', '0000-00-00', '', 'Male', 6, 24, 1, '', '2020-03-30'),
(35, 'BLR987635102', 'sasote.sarker@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sasote Sarker', ' Rumpa', '', '0000-00-00', '', 'Female', 18, 21, 1, '', '2020-03-30'),
(36, 'YKW236458701', 'nusrat.jahan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nusrat ', 'Jahan', '', '0000-00-00', '', 'Female', 18, 21, 1, '', '2020-03-30'),
(37, 'OZS562897103', 'sabiqun.naher@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sabiqun', ' Naher ', '', '0000-00-00', '', 'Female', 18, 21, 1, '', '2020-03-30'),
(38, 'GOF814305967', 'rayhan.aziz@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'ARM ', 'Azizullah', '', '0000-00-00', '', 'Male', 6, 32, 1, '', '2020-03-30'),
(39, 'JNR826714539', 'mosharof@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mosharef', ' Hossain', '', '0000-00-00', '', 'Male', 18, 21, 1, '', '2020-03-30'),
(40, 'GHF891350674', 'noman.foysal@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Noman', ' Ibne Foysal', '', '0000-00-00', '', 'Male', 18, 21, 1, '', '2020-03-30'),
(41, 'LPO713452068', 'faruki@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sharfuddin Ahmed ', 'Faruki', '', '0000-00-00', '', 'Male', 6, 32, 1, '', '2020-03-30'),
(42, 'SVU921738650', 'nargish.sultana@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nargish', ' Sultana', '', '0000-00-00', '', 'Female', 18, 28, 1, '', '2020-03-30'),
(43, 'ABJ734208159', 'khaleda@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Khaleda ', 'Edib Khan', '', '0000-00-00', '', 'Male', 6, 31, 1, '', '2020-03-30'),
(44, 'SZX316749802', 'zunaid@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Zunaid ', ' hossain', '', '0000-00-00', '', 'Male', 6, 27, 1, '', '2020-03-30'),
(45, 'KDC042673518', 'abul.hasan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'KH. Abul Hasan ', ' Nuri', '', '0000-00-00', '', 'Male', 7, 26, 1, '', '2020-03-30'),
(46, 'PKJ314276809', 'simon@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Moshiour Rahaman ', 'Simon', '', '0000-00-00', '', 'Male', 7, 59, 1, '', '2020-03-30'),
(47, 'QBK720683519', 'mustafa@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Golam Mustafa ', ' Sumon', '', '0000-00-00', '', 'Male', 8, 8, 1, '', '2020-03-30'),
(48, 'KTQ350491682', 'shoikat.chowdhury@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Shoikat ', 'Chowdhury', '', '0000-00-00', '', 'Male', 17, 8, 1, '', '2020-03-30'),
(49, 'MJL182093754', 'shajeda.begum@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Shajeda ', ' Begum', '', '0000-00-00', '', 'Female', 8, 45, 1, '', '2020-03-30'),
(50, 'KVJ619850473', 'masudur.rahman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Masudur ', 'Rahman', '', '0000-00-00', '', 'Male', 17, 12, 1, '', '2020-03-30'),
(51, 'OCS195407386', 'tasmery.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tasmery Tazrin ', ' Islam', '', '0000-00-00', '', 'Female', 8, 54, 1, '', '2020-03-30'),
(52, 'TEU759620384', 'wahid.sabbir@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Wahid ', 'Sabbir', '', '0000-00-00', '', 'Male', 17, 11, 1, '', '2020-03-30'),
(53, 'MVO196807254', 'moinul.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Moinul ', 'Islam', '', '0000-00-00', '', 'Male', 17, 11, 1, '', '2020-03-30'),
(54, 'MRZ974612850', 'sarwar@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohammad Sarwar', ' Kamal', '', '0000-00-00', '', 'Male', 17, 11, 1, '', '2020-03-30'),
(55, 'LBJ782954136', 'ferdous.zaman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Ferdous Zaman ', 'Khan', '', '0000-00-00', '', 'Male', 17, 13, 1, '', '2020-03-30'),
(56, 'TIE791345082', 'johura.khatun@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Johura ', ' khatun', '', '0000-00-00', '', 'Female', 8, 55, 1, '', '2020-03-30'),
(57, 'ZWT697520831', 'kulsum.haque@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Kulsum ', 'Haque', '', '0000-00-00', '', 'Female', 8, 56, 1, '', '2020-03-30'),
(58, 'AEL509831762', 'sharmin.shilpi@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mst. Sharmin ', 'Sultana Shilpi', '', '0000-00-00', '', 'Female', 8, 55, 1, '', '2020-03-30'),
(59, 'AWL594208716', 'salma.akter@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Salma ', 'Akter', '', '0000-00-00', '', 'Female', 8, 55, 1, '', '2020-03-30'),
(60, 'JKO936120587', 'rozina.akter@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Rozina ', 'Akter', '', '0000-00-00', '', 'Female', 8, 56, 1, '', '2020-03-30'),
(61, 'RQT014275983', 'jannatul.ferdoush@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Jannatul ', 'Ferdoush', '', '0000-00-00', '', 'Female', 8, 57, 1, '', '2020-03-30'),
(62, 'YXR087943251', 'emon@mail.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Emon ', 'Hossain', '', '0000-00-00', '', 'Male', 8, 58, 1, '', '2020-03-30'),
(63, 'AWM301475968', 'arif@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Saddam ', 'Hossain', '', '0000-00-00', '', 'Female', 8, 58, 1, '', '2020-03-30'),
(64, 'RJU649852071', 'rashed@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohammad Rashed ', 'Musharaf', '', '0000-00-00', '', 'Male', 9, 53, 1, '', '2020-03-30'),
(65, 'GBQ176849352', 'saddam.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Saddam ', 'Hossain', '', '0000-00-00', '', 'Male', 10, 8, 1, '', '2020-03-30'),
(66, 'CLD467325810', 'irfan.quraishy@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Syed Al Irfan ', 'Quraishy', '', '0000-00-00', '', 'Male', 10, 27, 1, '', '2020-03-30'),
(67, 'BMI542687031', 'alamgir.hussain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Alamgir ', 'Hussein ', '', '0000-00-00', '', 'Male', 17, 14, 1, '', '2020-03-30'),
(68, 'JSF632058971', 'sydur.rahman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sydur ', 'Rahman', '', '0000-00-00', '', 'Male', 17, 14, 1, '', '2020-03-30'),
(69, 'VYT918430765', 'ahmed.tanvir@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tanvir ', 'Ahmed ', '', '0000-00-00', '', 'Male', 17, 14, 1, '', '2020-03-30'),
(70, 'ZPF837695214', 'anindya.saha@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Anindya ', 'Saha', '', '0000-00-00', '', 'Male', 17, 14, 1, '', '2020-03-30'),
(71, 'YIG394850162', 'muntaha@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Muntaha Mursalin ', 'Chowdhury', '', '0000-00-00', '', 'Female', 10, 27, 1, '', '2020-03-30'),
(72, 'VSD149826537', 'tanjir.rashid@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tanjir Rashid ', 'Soron', '', '0000-00-00', '', 'Male', 11, 32, 1, '', '2020-03-30'),
(73, 'CNJ452139786', 'saikat.sarwar@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Saikat Sarwar', ' Islam', '', '0000-00-00', '', 'Male', 17, 14, 1, '', '2020-03-30'),
(74, 'EKR932015648', 'arman.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Dr. Arman ', 'Hossain', '', '0000-00-00', '', 'Male', 11, 32, 1, '', '2020-03-30'),
(75, 'ZMT795482301', 'shakil.khan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Shakil ', 'Khan', '', '0000-00-00', '', 'Male', 17, 15, 1, '', '2020-03-30'),
(76, 'HKC976812354', 'farhanaz.boby@synesisitltd.net', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Farhanaz ', 'Boby', '', '0000-00-00', '', 'Female', 11, 26, 1, '', '2020-03-30'),
(77, 'JGN193086542', 'niger.sultana@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Niger ', 'Sultana', '', '0000-00-00', '', 'Female', 17, 16, 1, '', '2020-03-30'),
(78, 'INT342601589', 'karim-us-shan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Akm ', 'Karim-Us-Shan', '', '0000-00-00', '', 'Male', 12, 8, 1, '', '2020-03-30'),
(79, 'JZA415902738', 'mithun.ghosh@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mithun Kumar ', 'Ghosh', '', '0000-00-00', '', 'Male', 17, 10, 1, '', '2020-03-30'),
(80, 'NVB937605241', 'rubaiyat.ahsan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Rubaiyat ', 'Ahsan', '', '0000-00-00', '', 'Male', 12, 32, 1, '', '2020-03-30'),
(81, 'LHG709845163', 'aman.ullah@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Aman Ullah ', 'Aman', '', '0000-00-00', '', 'Male', 17, 10, 1, '', '2020-03-30'),
(82, 'WTK794681052', 'farhan.fuad@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Farhan Fuad ', 'Ronok', '', '0000-00-00', '', 'Male', 17, 10, 1, '', '2020-03-30'),
(83, 'TZN614832507', 'ruhul.amin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ruhul ', 'Amin', '', '0000-00-00', '', 'Male', 12, 27, 1, '', '2020-03-30'),
(84, 'YPX924871305', 'nayeem.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nayeem ', 'Islam', '', '0000-00-00', '', 'Male', 17, 10, 1, '', '2020-03-30'),
(85, 'LYO950764328', 'zahidul.alam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Zahidul ', 'Alam', '', '0000-00-00', '', 'Male', 12, 29, 1, '', '2020-03-30'),
(86, 'BJF693485712', 'ahmed.fahad@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ahmed Anjum ', 'Fahad', '', '0000-00-00', '', 'Male', 17, 10, 1, '', '2020-03-30'),
(88, 'JXL503184769', 'sadaf.fatin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sadaf ', 'Fatin', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(89, 'SJV625041387', 'imran.khan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Imran Ahmed ', 'Khan', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(90, 'BUW781642903', 'jawad.khan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ishmum Jawad', ' Khan', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(91, 'ERN269054813', 'abdullah.mamun@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abdullah Al', ' Mamun', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(92, 'ESP302486951', 'sazidur.rahman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sazidur ', 'Rahman', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(93, 'YCD510428736', 'abdullah.saleh@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abdullah Saleh ', 'Robin ', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(94, 'EHY378092651', 'abu.raihan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abu Raihan ', 'Srabon', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(95, 'VML198756342', 'shoaib.shahriar@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Shoaib ', 'Shahriar', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(96, 'HPA803154269', 'nazmul.tanvir@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Nazmul Huda  ', 'Tanvir', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(97, 'XQD175824609', 'shah.faisal@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Shah ', 'Faisal ', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(98, 'ARS541928607', 'riyad.mahmud@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Riyad ', 'Mahmud', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(99, 'KUW958106723', 'milton.marma@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Uaungchain Marma  ', 'Milton', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(100, 'XZB269713548', 'irteza@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Ishtiaque Bari', ' Irteza', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(101, 'VEG928405637', 'protiva@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Protiva ', 'Ahamed', '', '0000-00-00', '', 'Female', 17, 1, 1, '', '2020-03-30'),
(102, 'NMR684023175', 'minhaz.uddin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Minhaz ', 'Uddin', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(103, 'ZBF697534028', 'mohimenul.kabir@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mohimenul ', 'Kabir', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(104, 'SPV574236910', 'siam.riaz@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Siam ', 'Riaz', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(105, 'MBO589146073', 'dhiman.kumar@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Dhiman Kumar', ' Sarker', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(106, 'FER561270843', 'rezaulkarim@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Rezaul', ' Karim', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(107, 'JXN178932506', 'asadul.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Asadul Islam ', 'Asad', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(108, 'SBP381064597', 'tawhid.noor@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tawhid Abul Khair ', 'Noor', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(109, 'FZM340782519', 'saurav.saha@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Saurav ', 'Saha', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(110, 'FNB704289631', 'tahsin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Syed Tahsin ', 'Ahmed', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(111, 'HBV581062439', 'ashfakur.arju@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Ashfakur Rahman ', 'Arju', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(112, 'WTA308295417', 'habibul.alam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Habibul ', 'Alam', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(113, 'ZAE709684531', 'shakhawat.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Shakhawat ', 'Hossain ', '', '0000-00-00', '', 'Male', 17, 17, 1, '', '2020-03-30'),
(114, 'ZGO540713928', 'tasneem.reza@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Tasneem ', 'Reza', '', '0000-00-00', '', 'Female', 17, 18, 1, '', '2020-03-30'),
(115, 'RSF352061849', 'sifat.noor@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sifat-E-', 'Noor', '', '0000-00-00', '', 'Female', 17, 19, 1, '', '2020-03-30'),
(116, 'FUI756428109', 'alif.ahmed@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Alif ', 'Ahmed', '', '0000-00-00', '', 'Male', 17, 20, 1, '', '2020-03-30'),
(117, 'TNA582467901', 'saifuddin.tareque@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Saifuddin Mohammad ', 'Tareque', '', '0000-00-00', '', 'Male', 17, 20, 1, '', '2020-03-30'),
(118, 'FIK738194562', 'ahmed.hasan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ahmed ', 'Hasan', '', '0000-00-00', '', 'Male', 17, 20, 1, '', '2020-03-30'),
(119, 'ZEV702156943', 'mohasin.miah@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohasin ', 'Miah', '', '0000-00-00', '', 'Male', 17, 20, 1, '', '2020-03-30'),
(120, 'PRE213780469', 'mithu.sarker@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mithu ', 'Sarker', '', '0000-00-00', '', 'Male', 17, 20, 1, '', '2020-03-30'),
(121, 'MWA385126479', 'golam.nobi@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Golam Nobi ', 'Sheikh', '', '0000-00-00', '', 'Male', 17, 1, 1, '', '2020-03-30'),
(122, 'SIO917483620', 'iqbal.hasan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohammad Iqbal Hasan ', 'Ferdous', '', '0000-00-00', '', 'Male', 16, 7, 1, '', '2020-03-30'),
(123, 'EZR407382956', 'manzurul@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohammad Manzurul ', 'Kabir', '', '0000-00-00', '', 'Male', 16, 24, 1, '', '2020-03-30'),
(124, 'YZD568432170', 'nur.alam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Nur-A-', 'Alam', '', '0000-00-00', '', 'Male', 16, 25, 1, '', '2020-03-30'),
(125, 'MKP315860427', 'mahmudul.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mahmudul ', 'Islam', '', '0000-00-00', '', 'Male', 16, 26, 1, '', '2020-03-30'),
(126, 'HBP716528340', 'muktadir.jilanee@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Muhammad Muktadir ', 'Jilanee', '', '0000-00-00', '', 'Male', 16, 27, 1, '', '2020-03-30'),
(127, 'DJP258907146', 'zaman@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mohammad ', 'Shamsuzzaman', '', '0000-00-00', '', 'Male', 16, 28, 1, '', '2020-03-30'),
(128, 'AXN386940251', 'sharuk.ahmed@synesisitltd.net', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Sharuk ', 'Ahmed', '', '0000-00-00', '', 'Male', 16, 29, 1, '', '2020-03-30'),
(129, 'GEK249168075', 'nazia@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nazia ', 'Akter', '', '0000-00-00', '', 'Female', 15, 7, 1, '', '2020-03-30'),
(130, 'FTZ726395841', 'romel@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Khondoker Abu Sayed ', 'Romel', '', '0000-00-00', '', 'Male', 15, 30, 1, '', '2020-03-30'),
(131, 'EHC417325896', 'rakibul.islam@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Rakibul ', 'Islam', '', '0000-00-00', '', 'Male', 15, 8, 1, '', '2020-03-30'),
(132, 'OWE925761348', 'mamun.rashid@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mamun- Ur ', 'Rashid', '', '0000-00-00', '', 'Male', 15, 11, 1, '', '2020-03-30'),
(133, 'TOB580372641', 'farah.obaid@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Farah Sharmin', ' Obaid', '', '0000-00-00', '', 'Female', 15, 31, 1, '', '2020-03-30'),
(134, 'VYH375602189', 'noshin.farzana@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Farzana Noshin ', 'Choudhury', '', '0000-00-00', '', 'Female', 15, 26, 1, '', '2020-03-30'),
(135, 'RBG517046829', 'nafisa.afsana@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nafisa ', 'Afsana', '', '0000-00-00', '', 'Female', 15, 27, 1, '', '2020-03-30'),
(136, 'KDF702531468', 'lazina@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Lazina ', 'Aftab', '', '0000-00-00', '', 'Female', 15, 27, 1, '', '2020-03-30'),
(137, 'XLE083215974', 'mamunur.rashid@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mamunur ', 'Rashid', '', '0000-00-00', '', 'Male', 15, 27, 1, '', '2020-03-30'),
(138, 'VKC352417906', 'fardina@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Fardina Sultana ', 'Kimi', '', '0000-00-00', '', 'Female', 15, 29, 1, '', '2020-03-30'),
(139, 'XPN056719243', 'ahasan@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ahasan Habib ', 'Nirjon', '', '0000-00-00', '', 'Male', 15, 29, 1, '', '2020-03-30'),
(140, 'JZF041538692', 'maliha@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Maliha Monzur', ' Ikra', '', '0000-00-00', '', 'Female', 15, 29, 1, '', '2020-03-30'),
(141, 'BTZ594268170', 'aminul.bari@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Aminul ', 'Bari', '', '0000-00-00', '', 'Male', 14, 7, 1, '', '2020-03-30'),
(142, 'YRG548671092', 'khalid.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Khalid ', 'Hossain', '', '0000-00-00', '', 'Male', 14, 32, 1, '', '2020-03-30'),
(143, 'DIH836572901', 'mahbub.uddin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Mahbub', ' Uddin', '', '0000-00-00', '', 'Male', 14, 33, 1, '', '2020-03-30'),
(144, 'ZWQ467829135', 'arif.rocky@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Arif Fuad', ' Rocky', '', '0000-00-00', '', 'Male', 14, 44, 1, '', '2020-03-30'),
(145, 'EBN185692304', 'abdul.ohab@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abdul', ' Ohab', '', '0000-00-00', '', 'Male', 14, 31, 1, '', '2020-03-30'),
(146, 'USB659074382', 'jannat.nishat@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Jannat Ara ', 'Nishat', '', '0000-00-00', '', 'Female', 14, 46, 1, '', '2020-03-30'),
(147, 'RDI398045167', 'fahad.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Fahad ', 'Hossain', '', '0000-00-00', '', 'Male', 14, 46, 1, '', '2020-03-30'),
(148, 'OCM048972163', 'nazmul@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nazmul ', 'Huda', '', '0000-00-00', '', 'Male', 14, 47, 1, '', '2020-03-30'),
(149, 'GSE314975082', 'nazmul.hossain@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Nazmul ', 'Hossain', '', '0000-00-00', '', 'Male', 14, 48, 1, '', '2020-03-30'),
(150, 'LOG738501924', 'amit@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Amit ', 'Sarker', '', '0000-00-00', '', 'Male', 14, 49, 1, '', '2020-03-30'),
(151, 'EOX856702314', 'jahir.uddin@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Jahir Uddin ', 'Bhuyan', '', '0000-00-00', '', 'Male', 14, 49, 1, '', '2020-03-30'),
(152, 'GTS925314086', 'deep.bhowmik@synesisit.com.bd', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Deep ', 'Bhowmik', '', '0000-00-00', '', 'Male', 14, 29, 1, '', '2020-03-30'),
(154, 'JKE486092713', 'Forkan@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Forkan ', 'Haulader', '', '0000-00-00', '', 'Male', 14, 50, 1, '', '2020-03-30'),
(155, 'BXE576092483', 'Jashim@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Jashim ', 'Bapari', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(156, 'MZN361725840', 'Bapari@gmaIL.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Abdus Salam ', 'Bapari', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(157, 'KVU458710329', 'Hudan@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. ', 'Hudan', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(158, 'NWR692347158', 'Amin@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Ruhul   ', 'Amin', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(159, 'WCH158607243', 'Ismail@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md.  ', 'Ismail', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(160, 'HJY235498610', 'Ali@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Yousuf ', 'Ali', '', '0000-00-00', '', 'Male', 13, 51, 1, '', '2020-03-30'),
(161, 'LOD471395802', 'Gazi@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abdur Rahim ', 'Gazi', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(162, 'LVA985032741', 'Islam@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Asadul ', 'Islam', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(163, 'UWJ403827596', 'Quddus@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Abdul  ', 'Quddus', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(165, 'LGS914053627', 'Islam@gmail.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Mainul ', 'Islam', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(166, 'FZG037528194', 'Hossen@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Shamim ', 'Hossen', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(167, 'UIA237986154', ' Hossain@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Rakib', ' Hossain', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(168, 'FPL359078146', 'Sarker@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Rasel ', 'Sarker', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(169, 'KXT435068912', 'Rabiul@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. Jahid Hasan ', 'Rabiul', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(170, 'ZTQ587629304', 'Elius@email.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'Md. ', 'Elius', '', '0000-00-00', '', 'Male', 13, 52, 1, '', '2020-03-30'),
(172, 'QFH531820974', 'rumpacseuoda@yahoo.com', '$2y$10$HwFhSfyOGbuqqXnEJdWN.uD.2jBpsIzlqbW5BayYCEv4ke2HM1ivC', 'sasote', 'sarker', 'Dhaka', '0000-00-00', '0195412154', 'Female', 18, 21, 1, 'logo - Copy.jpg', '2020-03-31');

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
  `contact` bigint(16) UNSIGNED NOT NULL,
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
(1, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 'Programmer', 'Software Development', 'SIL', '2020-04-19', '2020-04-21', 'casual', 'green road', 1717677400, 1, 48, 3, 'pending', 'pending', 'pending', 'pending'),
(2, 'Dhiman Kumar  Sarker', 'dhiman.kumar@synesisit.com.bd', 'Programmer', 'Software Development', 'SIL', '2020-04-21', '2020-04-22', 'casual', 'dhaka', 1717677400, 1, 48, 3, 'pending', 'pending', 'pending', 'pending');

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
(57, 'Administrative Assistant', 50),
(58, 'Jr. Sales Executive\r\n', 35),
(59, 'Graphics Designer\r\n', 55),
(60, 'sqa', 90);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `buffer_time` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`, `buffer_time`) VALUES
(1, '09:00:00', '18:00:00', 30),
(3, '17:15:00', '23:00:00', 0),
(8, '03:45:00', '00:45:00', 0);

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
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
