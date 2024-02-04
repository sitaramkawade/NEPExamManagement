-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3feb2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `short_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', 'B.Sc.(CS)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(2, 'Electronics', 'B.Sc.(Ele.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(3, 'Physics', 'B.Sc.(CS)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(5, 'Botany', 'B.Sc.(Bot.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(6, 'Chemistry', 'B.Sc.(Chem.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(7, 'Zoology', 'B.Sc.(Zoo.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(8, 'Statistics', 'B.Sc.(Stat.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(9, 'Microbiology', 'B.Sc.(Micro.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(10, 'Mathematics', 'B.Sc.(Math)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(11, 'Commerce', 'B.Com', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(12, 'Marathi', 'B.A(Mar.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(13, 'Hindi', 'B.A(Hin.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(14, 'English', 'B.A(Eng.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(15, 'Geography', 'B.A(Geo.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(16, 'Economics', 'B.A(Eco.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(17, 'Politics', 'B.A(Pol.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(18, 'History', 'B.A(His.)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(19, 'Yoga', 'B.A(Yoga)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(20, 'Sanskrit', 'B.A(Sanskrit)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(21, 'Philosophy', 'B.A(Philosophy)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(22, 'B.Voc. Software Development', 'B.Voc.(SD)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(23, 'B.Voc. Hospitality & Tourism', 'B.Voc.(HT)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(24, 'B.Voc. Dairy', 'B.Voc.(DPP)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(25, 'B.Voc. Agri', 'B.Voc.(ASS)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(26, 'B.Voc. Account', 'B.Voc.(AT)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(27, 'BBA(Computer Application)', 'BBA(CA)', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(28, 'BBA', 'BBA', '2021-05-20 05:32:57', '2021-05-19 05:32:57'),
(29, 'BCA Science', 'BCA', NULL, NULL),
(30, 'PG', NULL, NULL, NULL),
(31, 'Department of Studies & Research in English', 'Department of Studies & Research in English', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(32, 'Exam Department', 'Exam', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(33, 'Phisical Education', 'Phisical Education', '2021-12-08 06:01:04', '2021-12-08 06:01:04'),
(34, 'Library', 'Lib', '2021-12-08 06:01:04', '2021-12-08 06:01:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
