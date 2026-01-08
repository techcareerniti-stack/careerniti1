-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 06:19 AM
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
-- Database: `careerniti`
--

-- --------------------------------------------------------

--
-- Table structure for table `toptoexplore`
--

CREATE TABLE `toptoexplore` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `level` enum('ug','pg') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `logo` varchar(255) DEFAULT 'default-logo.jpg',
  `fees` varchar(50) DEFAULT NULL,
  `exams` varchar(100) DEFAULT NULL,
  `affiliation` varchar(100) DEFAULT NULL,
  `approval` varchar(100) DEFAULT NULL,
  `college_type` varchar(50) DEFAULT NULL,
  `ranking` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toptoexplore`
--

INSERT INTO `toptoexplore` (`id`, `name`, `city`, `course_type`, `level`, `status`, `logo`, `fees`, `exams`, `affiliation`, `approval`, `college_type`, `ranking`) VALUES
(1, 'Walchand College of Engineering', 'sangli', 'engineering', 'ug', 1, 'default.png', '₹1,20,000 / year', 'JEE Main, MHT-CET', 'SPPU', 'AICTE', 'Private', 'Top 50 India'),
(2, 'Walchand College of Engineering', 'sangli', 'engineering', 'pg', 1, 'default.png', '₹95,000 / year', 'MHT-CET', 'MSBTE', 'AICTE', 'Government', 'State Rank 10'),
(3, 'Government Medical College, Miraj', 'sangli', 'medical', 'ug', 1, 'gmc_miraj.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Government Medical College, Miraj', 'sangli', 'medical', 'pg', 1, 'gmc_miraj.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Willington College', 'sangli', 'science', 'ug', 1, 'willington.png', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Willington College', 'sangli', 'science', 'pg', 1, 'willington.png', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Sanjay Bhokare Group of Institutes', 'miraj', 'engineering', 'ug', 1, 'sanjay_bhokare.png', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Sanjay Bhokare Group of Institutes', 'miraj', 'engineering', 'pg', 1, 'sanjay_bhokare.png', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Government Medical College, Miraj Campus', 'miraj', 'medical', 'ug', 1, 'gmc_miraj.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Government College of Engineering, Satara', 'satara', 'engineering', 'ug', 1, 'government_college_of_engineering_karad_official_logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Government College of Engineering, Satara', 'satara', 'engineering', 'pg', 1, 'government_college_of_engineering_karad_official_logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Yashoda Technical Campus', 'satara', 'engineering', 'ug', 1, 'yspm satara.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Chhatrapati Shivaji College, Satara', 'satara', 'science', 'ug', 1, 'chatrpatiClgSatara.png', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Government College of Engineering, Karad', 'karad', 'engineering', 'ug', 1, 'government_college_of_engineering_karad_official_logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Government College of Engineering, Karad', 'karad', 'engineering', 'pg', 1, 'government_college_of_engineering_karad_official_logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Krishna Institute of Medical Sciences (KIMS)', 'karad', 'medical', 'ug', 1, 'Krishna_Institute_of_Medical_Sciences_Logo.png', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Krishna Institute of Medical Sciences (KIMS)', 'karad', 'medical', 'pg', 1, 'Krishna_Institute_of_Medical_Sciences_Logo.png', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Bharati Vidyapeeth Institute of Technology', 'sangli', 'engineering', 'ug', 1, 'bhartiSangli.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Dattajirao Kadam Arts, Science & Commerce College', 'sangli', 'science', 'ug', 1, 'dkte.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Late Adv. Dadasaheb Chavan Memorial Institute', 'miraj', 'engineering', 'ug', 1, 'dadasahebchavan.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Karmaveer Bhaurao Patil College', 'satara', 'science', 'ug', 1, 'karmveerBClgSatara.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Dahiwadi College', 'satara', 'science', 'ug', 1, 'dahiwadiClg.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Smt. Kasturbai Walchand College', 'karad', 'science', 'ug', 1, 'default-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Tilak Maharashtra Vidyapeeth Karad', 'karad', 'science', 'pg', 1, 'default-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Walchand College of Engineering', 'sangli', 'engineering', 'ug', 1, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Walchand College of Engineering', 'sangli', 'engineering', 'pg', 1, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Government Medical College, Miraj', 'sangli', 'medical', 'ug', 1, 'gmc_miraj.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Willington College', 'sangli', 'science', 'ug', 1, 'willington.png', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Rajarambapu Institute of Technology (Islampur)', 'sangli', 'engineering', 'ug', 1, 'rit.png', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Sanjay Bhokare Group of Institutes', 'miraj', 'engineering', 'ug', 1, 'sanjay_bhokare.png', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Government Medical College, Miraj Campus', 'miraj', 'medical', 'ug', 1, 'gmc_miraj.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Government College of Engineering, Satara', 'satara', 'engineering', 'ug', 1, 'government_college_of_engineering_karad_official_logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Yashoda Technical Campus', 'satara', 'engineering', 'ug', 1, 'yspm satara.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Chhatrapati Shivaji College, Satara', 'satara', 'science', 'ug', 1, 'chatrpatiClgSatara.png', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Government College of Engineering, Karad', 'karad', 'engineering', 'ug', 1, 'default-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Krishna Institute of Medical Sciences (KIMS)', 'karad', 'medical', 'ug', 1, 'default-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Yashwantrao Chavan College of Science', 'karad', 'science', 'ug', 1, 'default-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toptoexplore`
--
ALTER TABLE `toptoexplore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toptoexplore`
--
ALTER TABLE `toptoexplore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
