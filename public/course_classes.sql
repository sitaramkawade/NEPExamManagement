-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 07:10 PM
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
(1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(3, 3, 1, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(6, 3, 2, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(9, 3, 3, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(12, 3, 4, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(15, 3, 5, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(18, 3, 6, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(21, 3, 7, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(24, 3, 8, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(27, 3, 9, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(30, 3, 10, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(33, 3, 11, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(36, 3, 12, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(42, 3, 14, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(45, 3, 15, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(48, 3, 16, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(51, 3, 17, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(54, 3, 18, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(57, 3, 19, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(60, 3, 20, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(63, 3, 21, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(66, 3, 22, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(69, 3, 23, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(72, 3, 24, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(75, 3, 25, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(78, 3, 26, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(81, 3, 27, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(84, 3, 28, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(86, 5, 29, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(88, 5, 30, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(90, 5, 31, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(92, 5, 32, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(94, 5, 33, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL),
(96, 5, 34, NULL, 1, '2023-09-05 21:23:00', '2023-09-05 21:23:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_classes_course_id_foreign` (`course_id`),
  ADD KEY `course_classes_classyear_id_foreign` (`classyear_id`),
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
  ADD CONSTRAINT `course_classes_classyear_id_foreign` FOREIGN KEY (`classyear_id`) REFERENCES `classyears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_classes_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_classes_nextyearclass_id_foreign` FOREIGN KEY (`nextyearclass_id`) REFERENCES `course_classes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
