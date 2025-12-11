-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 06:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_record_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
('M_0001', 'Rebira Alemu', 'rebalem', '1a2a3a4a'),
('M_0002', 'Tsion Yosef', 'tsiyo12', '6CdwfNH9!');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment` varchar(20) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history` int(11) NOT NULL,
  `patient id` int(11) NOT NULL,
  `history id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_requests`
--

CREATE TABLE `lab_requests` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `lab_tests` text NOT NULL,
  `status` enum('Pending','Completed') DEFAULT 'Pending',
  `result` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_requests`
--

INSERT INTO `lab_requests` (`id`, `patient_id`, `doctor_id`, `lab_tests`, `status`, `result`) VALUES
(11, 0, 1, 'Bilirubin Total, ESR', '', NULL),
(12, 0, 1, 'Bilirubin Total, ESR', '', NULL),
(13, 0, 1, 'Bilirubin Total, ESR', '', NULL),
(14, 0, 1, 'Bilirubin Total, ESR', '', NULL),
(15, 0, 1, 'RBS, SGPT, Anti HCV Ab, Hematocrit', '', NULL),
(16, 0, 1, 'FBS, HBsAg', '', NULL),
(17, 0, 1, 'FBS, HBsAg', '', NULL),
(18, 0, 1, 'Alkaline Phosphate', '', NULL),
(19, 0, 1, 'FBS, SGOT, Alkaline Phosphate, Anti HCV Ab, CBC', '', NULL),
(20, 0, 1, 'Alkaline Phosphate, Widal H', '', NULL),
(21, 0, 1, 'Alkaline Phosphate, Widal H', '', NULL),
(22, 0, 1, 'FBS, HBsAg', '', NULL),
(23, 0, 1, 'FBS, HBsAg', '', NULL),
(24, 0, 1, 'Bilirubin Total', '', NULL),
(25, 0, 1, 'Bilirubin Total', '', NULL),
(26, 0, 1, 'SGPT, CBC', '', NULL),
(27, 0, 1, 'SGPT, CBC', 'Completed', 'jhjvjvh'),
(28, 0, 1, 'FBS, RBS, SGOT', '', NULL),
(29, 0, 1, 'FBS, RBS, SGOT', '', NULL),
(30, 0, 1, 'FBS, RBS, SGOT', '', NULL),
(31, 0, 1, 'FBS, Alkaline Phosphate, HBsAg', '', NULL),
(32, 0, 1, 'FBS, Widal H', '', NULL),
(33, 0, 1, 'FBS, Widal H', '', NULL),
(35, 0, 1, 'FBS, Widal H', '', NULL),
(36, 0, 1, 'RBS, Widal H', '', NULL),
(37, 0, 1, 'HBsAg, Widal H', '', NULL),
(38, 0, 1, 'RBS, Widal H', '', NULL),
(39, 0, 1, 'HBsAg, Widal H', '', NULL),
(40, 0, 1, 'SGOT, CBC', 'Completed', 'M,M,M'),
(41, 0, 1, 'SGOT, CBC', 'Completed', 'KWNFLNFRK'),
(42, 0, 1, 'SGOT, CBC', 'Completed', 'NM MN MN M'),
(43, 1, 1, 'HBsAg, CBC, Hemoglobin', 'Completed', 'M M,N,'),
(44, 1, 1, 'HBsAg, CBC, Hemoglobin', 'Completed', 'JNKCCJNK'),
(45, 1, 1, 'FBS, HBsAg, CBC', 'Completed', 'JNDKJN'),
(46, 1, 1, 'FBS, SGOT', 'Completed', 'he got jkjk,'),
(47, 1, 1, 'HBsAg', 'Completed', 'm,m,m ,m ,m '),
(48, 1, 1, 'SGOT, HBsAg', 'Completed', 'kjnk'),
(49, 1, 1, 'FBS, SGOT', 'Completed', 'm m nm m'),
(50, 1, 1, 'FBS, RBS, Anti HCV Ab, Hemoglobin', 'Completed', 'rebi'),
(51, 1, 1, 'FBS, RBS, Anti HCV Ab', 'Completed', 'm ckenn fv rkjvkr rkc  ck c sbcblsbk sjfc sjbfhzh zdf,,jd dfh fdjhdhvdhc jfj,hzjz v,jhz fj,z vzj,h j,'),
(52, 1, 1, 'RBS, SGOT', 'Completed', 'kjkjn'),
(53, 1, 1, 'FBS, RBS', 'Completed', 'jksbkb'),
(54, 1, 1, 'FBS, Anti HCV Ab, Hemoglobin', 'Completed', 'kscbkscbk'),
(55, 1, 1, 'FBS, RBS', 'Completed', 'hvkk'),
(56, 1, 1, 'RBS, HBsAg', 'Completed', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` varchar(20) NOT NULL,
  `patient_name` varchar(25) NOT NULL,
  `patient_age` int(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_age`, `gender`, `phone`) VALUES
('P_0001', 'rebira Alemu', 20, 'Male', '0918928814'),
('P_0002', 'rrr hhh', 14, 'female', '09288982322'),
('P_0006', 'tsion yosf', 18, 'female', '0918949995'),
('P_0007', 'rebira Alme', 45, 'Male', '091894999');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `password`, `department`) VALUES
('ST_0003', 'Tsion Yosef', 'tsiyo12', '6CdwfNH9!', 'Receptionist'),
('ST_0004', 'Thon Nhial', 'thon', '6CdwfNH9!', 'labratorist'),
('st_0011', 'Rebira Alemu', 'rebalem', '6CdwfNH9!', 'DOCTOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history id`);

--
-- Indexes for table `lab_requests`
--
ALTER TABLE `lab_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_requests`
--
ALTER TABLE `lab_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
