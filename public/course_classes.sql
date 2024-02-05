-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 09:21 AM
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
-- Table structure for table `course_classes`
--

CREATE TABLE `course_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classyear_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `nextyearclass_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_classes`
--

INSERT INTO `course_classes` (`id`, `classyear_id`, `course_id`, `nextyearclass_id`, `college_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(2, 2, 1, 3, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(3, 3, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(4, 1, 2, 5, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(5, 2, 2, 6, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(6, 3, 2, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(7, 1, 3, 8, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(8, 2, 3, 9, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(9, 3, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(10, 1, 4, 11, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(11, 2, 4, 12, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(12, 3, 4, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(13, 1, 5, 14, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(14, 2, 5, 15, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(15, 3, 5, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(16, 1, 6, 17, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(17, 2, 6, 18, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(18, 3, 6, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(19, 1, 7, 20, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(20, 2, 7, 21, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(21, 3, 7, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(22, 1, 8, 23, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(23, 2, 8, 24, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(24, 3, 8, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(25, 1, 9, 26, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(26, 2, 9, 27, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(27, 3, 9, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(28, 1, 10, 29, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(29, 2, 10, 30, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(30, 3, 10, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(31, 1, 11, 32, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(32, 2, 11, 33, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(33, 3, 11, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(34, 1, 12, 35, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(35, 2, 12, 36, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(36, 3, 12, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(39, 4, 14, 40, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(40, 5, 14, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(41, 4, 15, 42, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(42, 5, 15, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(43, 4, 16, 44, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(44, 5, 16, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(45, 4, 17, 46, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(46, 5, 17, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(47, 4, 18, 48, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(48, 5, 18, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(49, 4, 19, 50, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(50, 5, 19, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(51, 4, 20, 52, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(52, 5, 20, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(53, 4, 21, 54, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(54, 5, 21, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(55, 4, 22, 56, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(56, 5, 22, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(57, 4, 23, 58, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(58, 5, 23, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(59, 4, 24, 60, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(60, 5, 24, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(61, 4, 25, 62, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(62, 5, 25, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(63, 4, 26, 64, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(64, 5, 26, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(65, 4, 27, 66, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(66, 5, 27, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(67, 4, 28, 68, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(68, 5, 28, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(69, 4, 29, 70, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(70, 5, 29, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(71, 4, 30, 72, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(72, 5, 30, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(73, 4, 31, 74, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(74, 5, 31, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(75, 1, 32, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(76, 1, 33, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(77, 1, 34, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(78, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(79, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(80, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(81, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(82, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(83, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(84, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(85, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(86, 1, 1, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(87, 1, 2, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(88, 1, 2, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(89, 1, 2, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(90, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(91, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(92, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(93, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(94, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(95, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL),
(96, 1, 3, NULL, 1, '2024-02-05 08:20:25', '2024-02-05 08:20:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_classes_classyear_id_foreign` (`classyear_id`),
  ADD KEY `course_classes_course_id_foreign` (`course_id`),
  ADD KEY `course_classes_nextyearclass_id_foreign` (`nextyearclass_id`),
  ADD KEY `course_classes_college_id_foreign` (`college_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD CONSTRAINT `course_classes_classyear_id_foreign` FOREIGN KEY (`classyear_id`) REFERENCES `classyears` (`id`),
  ADD CONSTRAINT `course_classes_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `course_classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_classes_nextyearclass_id_foreign` FOREIGN KEY (`nextyearclass_id`) REFERENCES `course_classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
