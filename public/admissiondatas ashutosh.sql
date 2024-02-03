-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 04:54 AM
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
-- Table structure for table `admissiondatas`
--

CREATE TABLE `admissiondatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memid` int(11) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patternclass_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `academicyear_id` bigint(20) UNSIGNED NOT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissiondatas`
--
INSERT INTO `admissiondatas` (`id`, `memid`, `stud_name`, `user_id`, `patternclass_id`, `subject_id`, `academicyear_id`, `college_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(120877, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 339, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(120907, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 340, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(120937, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 341, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(120967, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 342, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(120997, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 343, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121027, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 344, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121057, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 345, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121087, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 487, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121117, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 488, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121147, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 489, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121177, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 490, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121207, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 491, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121237, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 492, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121267, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 493, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(121297, 28341, 'PURI ASHUTOSH LAXMAN', 1, 53, 494, 3, NULL, '2022-11-20 06:08:00', '2022-11-20 06:08:00', NULL),
(151250, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1044, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151283, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1045, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151316, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1046, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151349, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1047, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151382, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1048, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151415, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1049, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151448, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1050, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151481, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1051, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL),
(151514, 28341, 'PURI ASHUTOSH LAXMAN', 1, 54, 1052, 4, NULL, '2023-08-26 19:31:00', '2023-08-26 19:31:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissiondatas`
--
ALTER TABLE `admissiondatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admissiondatas_academicyear_id_foreign` (`academicyear_id`),
  ADD KEY `admissiondatas_user_id_foreign` (`user_id`),
  ADD KEY `admissiondatas_college_id_foreign` (`college_id`),
  ADD KEY `admissiondatas_patternclass_id_foreign` (`patternclass_id`),
  ADD KEY `admissiondatas_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissiondatas`
--
ALTER TABLE `admissiondatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198091;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissiondatas`
--
ALTER TABLE `admissiondatas`
  ADD CONSTRAINT `admissiondatas_academicyear_id_foreign` FOREIGN KEY (`academicyear_id`) REFERENCES `academicyears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissiondatas_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissiondatas_patternclass_id_foreign` FOREIGN KEY (`patternclass_id`) REFERENCES `pattern_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissiondatas_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissiondatas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
