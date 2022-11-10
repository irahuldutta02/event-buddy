-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 07:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `event_id` varchar(255) NOT NULL,
  `a_mail` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_sdate` date NOT NULL,
  `event_stime` time NOT NULL,
  `event_edate` date NOT NULL,
  `event_etime` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `event_broc` varchar(300) NOT NULL,
  `c_image1` varchar(300) NOT NULL,
  `c_image2` varchar(300) NOT NULL,
  `c_image3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`event_id`, `a_mail`, `a_name`, `a_password`, `event_name`, `event_sdate`, `event_stime`, `event_edate`, `event_etime`, `event_venue`, `organizer`, `event_desc`, `event_broc`, `c_image1`, `c_image2`, `c_image3`) VALUES
('admin', 'admin@admin.com', 'admin', 'admin', 'Marrige', '2022-09-09', '20:00:00', '2022-09-06', '20:00:00', 'Hotel Royal Palace', 'David', 'Event Description ...fasd', '', '', '', ''),
('AREY0B', 'ghoshlokesh558@gamil.com', 'Ronit Biswas', '789', 'fest', '2022-09-22', '11:33:00', '2022-09-23', '19:34:00', 'auditorium', 'makaut', 'annual tech fest', '', '', '', ''),
('HNK16C', 'demo@demo.com', 'demo', 'demo', 'demo', '2022-11-30', '02:23:00', '2022-11-15', '14:24:00', 'demo', 'demo', 'demo', 'combinatorial optimization ca3pdf.pdf', '', '', ''),
('SD87PQ', 'ranit09@gmail.com', 'Ronit Roy', '789', 'Birthday party', '2022-09-15', '20:54:00', '2022-09-16', '20:55:00', 'Hotel Dolphin', 'Lokesh ghosh', 'This is just a normal birthday party', '', '', '', ''),
('VN7KF9', 'test@gmail.com', 'test', 'test', 'TEST', '2022-11-01', '15:21:00', '2022-11-04', '13:22:00', 'test', 'test', 'Event Description ...test', 'INTERNET TECHNOLOGY PCA-3.pdf', '', '', ''),
('ZMJXOV', 'pghosh9@gmail.com', 'Prakash Ghosh', '230', 'Fair', '2022-09-30', '09:00:00', '2022-10-06', '20:00:00', 'LMET International School Playground', 'LMET International School', 'Annual Science Fair , everyone can join', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `p_email` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`p_email`, `event_id`, `p_name`) VALUES
('fasd@gmail.com', 'asdfasdf', 'Lokesh'),
('dfasdf@gmail.com', 'HNK16C', 'asdfasdfasdf'),
('demopart@gmail.com', 'VN7KF9', 'demo participant'),
('dutta02@gmail.com', 'HNK16C', 'Rahul Dutta'),
('testunion@gmail.com', 'AREY0B', 'union test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
