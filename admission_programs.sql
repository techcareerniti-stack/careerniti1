-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 08:16 AM
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
-- Table structure for table `admission_programs`
--

CREATE TABLE `admission_programs` (
  `id` int(11) NOT NULL,
  `program_key` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_programs`
--

INSERT INTO `admission_programs` (`id`, `program_key`, `title`, `image_path`, `alt_text`, `display_order`, `is_active`) VALUES
(1, 'medical', 'Medical', './assets/images/med.png', 'Medical icon', 1, 1),
(2, 'engineering', 'Engineering', './assets/images/eng.png', 'Engineering icon', 2, 1),
(3, 'pure-science', 'Pure Science', './assets/images/pureSc.jpeg', 'Pure Science icon', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_programs`
--
ALTER TABLE `admission_programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_key` (`program_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_programs`
--
ALTER TABLE `admission_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
