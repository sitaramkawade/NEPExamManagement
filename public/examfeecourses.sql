-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 09:30 AM
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
-- Database: `nepexamtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `examfeecourses`
--

CREATE TABLE `examfeecourses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee` int(11) NOT NULL DEFAULT 0,
  `sem` int(11) DEFAULT NULL,
  `patternclass_id` bigint(20) UNSIGNED NOT NULL,
  `examfees_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `approve_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examfeecourses`
--

INSERT INTO `examfeecourses` (`fee`, `sem`, `patternclass_id`, `examfees_id`, `active_status`, `approve_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 1, 10, 13, 1, 0, '2024-03-15 01:24:30', '2024-03-15 01:24:30', NULL),
(45, 2, 10, 13, 1, 0, '2024-03-15 01:24:30', '2024-03-15 01:24:30', NULL),
(75, 3, 11, 13, 1, 0, '2024-03-15 01:25:16', '2024-03-15 01:25:16', NULL),
(45, 4, 11, 13, 1, 0, '2024-03-15 01:25:41', '2024-03-15 01:25:41', NULL),
(85, 5, 12, 13, 1, 0, '2024-03-15 01:27:05', '2024-03-15 01:27:05', NULL),
(60, 6, 12, 13, 1, 0, '2024-03-15 01:27:34', '2024-03-15 01:27:34', NULL),
(30, NULL, 10, 1, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1200, NULL, 10, 2, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 10, 3, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 10, 4, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 10, 5, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 10, 6, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(50, NULL, 10, 7, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(20, NULL, 10, 8, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 10, 9, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 10, 10, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(150, NULL, 10, 11, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1000, NULL, 10, 12, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(30, NULL, 97, 1, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1200, NULL, 97, 2, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 97, 3, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 97, 4, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 97, 5, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 97, 6, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(50, NULL, 97, 7, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(20, NULL, 97, 8, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 97, 9, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 97, 10, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(150, NULL, 97, 11, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1000, NULL, 97, 12, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(30, NULL, 11, 1, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1200, NULL, 11, 2, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 11, 3, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 11, 4, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 11, 5, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 11, 6, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(50, NULL, 11, 7, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(20, NULL, 11, 8, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 11, 9, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 11, 10, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(150, NULL, 11, 11, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1000, NULL, 11, 12, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(30, NULL, 12, 1, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1200, NULL, 12, 2, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 12, 3, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 12, 4, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(145, NULL, 12, 5, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 12, 6, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(50, NULL, 12, 7, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(20, NULL, 12, 8, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 12, 9, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(0, NULL, 12, 10, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(150, NULL, 12, 11, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL),
(1000, NULL, 12, 12, 1, 0, '2024-03-15 01:42:11', '2024-03-15 01:42:11', NULL);
-- Indexes for dumped tables
--

--
-- Indexes for table `examfeecourses`
--
ALTER TABLE `examfeecourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examfeecourses_patternclass_id_foreign` (`patternclass_id`),
  ADD KEY `examfeecourses_examfees_id_foreign` (`examfees_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examfeecourses`
--
ALTER TABLE `examfeecourses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examfeecourses`
--
ALTER TABLE `examfeecourses`
  ADD CONSTRAINT `examfeecourses_examfees_id_foreign` FOREIGN KEY (`examfees_id`) REFERENCES `examfeemasters` (`id`),
  ADD CONSTRAINT `examfeecourses_patternclass_id_foreign` FOREIGN KEY (`patternclass_id`) REFERENCES `pattern_classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
