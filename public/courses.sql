-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 06:56 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `special_subject` varchar(100) DEFAULT NULL COMMENT 'Major Subject',
  `course_type` varchar(20) NOT NULL COMMENT 'UG or PG',
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `programme_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `fullname`, `special_subject`, `course_type`, `college_id`, `programme_id`, `course_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'B.A.', '101', 'Bachelor of Arts', NULL, 'UG', NULL, NULL, 2, NULL, NULL, NULL),
(2, 'B.Com.', '102', 'Bachelor of Commerce', NULL, 'UG', NULL, NULL, 2, NULL, NULL, NULL),
(3, 'B.Sc.', '103', 'Bachelor of Science', NULL, 'UG', NULL, NULL, 2, NULL, NULL, NULL),
(4, 'B.Sc.(Computer Science )', '104', 'Bachelor of Computer Science', NULL, 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(5, 'B.C.A.(Science)', '105', 'Bachelor of Computer Applications (Science)', NULL, 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(6, 'B.B.A.', '106', 'Bachelor of Business Administration', NULL, 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(7, 'B.B.A.(CA)', '107', 'Bachelor of Business Administration(Computer Application)', NULL, 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(8, 'B.Voc.(Software Development)', '108', 'Bachelor Vocation', 'Software Development', 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(9, 'B.Voc.(Hospitality & Tourism)', '109', 'Bachelor Vocation', 'Hospitality & Tourism', 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(10, 'B.Voc.(Dairy Product & Processing)', '110', 'Bachelor Vocation', 'Dairy Product & Processing', 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(11, 'B.Voc.(Account & Taxation)', '111', 'Bachelor Vocation', 'Account & Taxation', 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(12, 'B.Voc.(Agriculture and soil Science)', '112', 'Bachelor Vocation', 'Agriculture and soil Science', 'UG', NULL, NULL, 1, NULL, NULL, NULL),
(14, 'M.A. ECONOMICS', '114', 'Master of Arts', 'ECONOMICS', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(15, 'M.A. ENGLISH', '115', 'Master of Arts', 'ENGLISH', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(16, 'M.A. HINDI', '116', 'Master of Arts', 'HINDI', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(17, 'M.A. MARATHI', '117', 'Master of Arts', 'MARATHI', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(18, 'M.A. POLITICS', '118', 'Master of Arts', 'POLITICS', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(19, 'M.A. SANSKRIT', '119', 'Master of Arts', 'SANSKRIT', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(20, 'M.Sc. ZOOLOGY', '120', 'Master of Science', 'ZOOLOGY', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(21, 'M.Sc. COMPUTER SCIENCE', '121', 'Master of Science', 'COMPUTER SCIENCE', 'PG', NULL, NULL, 1, NULL, NULL, NULL),
(22, 'M.Sc.BOTANY', '122', 'Master of Science', 'BOTANY', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(23, 'M.Sc. ANALYTICAL CHEMISTRY', '123', 'Master of Science', 'ANALYTICAL CHEMISTRY', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(24, 'M.Sc. ELECTRONICS', '124', 'Master of Science', 'ELECTRONICS', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(25, 'M.Sc. GEOGRAPHY', '125', 'Master of Science', 'GEOGRAPHY', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(26, 'M.Sc. MATHEMATICS', '126', 'Master of Science', 'MATHEMATICS', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(27, 'M.Sc. ORGANIC CHEMISTRY', '127', 'Master of Science', 'ORGANIC CHEMISTRY', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(28, 'M.Sc. PHYSICS', '128', 'Master of Science', 'PHYSICS', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(29, 'M. COM. (ADV. CO. A/CING & COST SYS.)', '129', 'Master Of Commerce', 'ADV. CO. A/CING & COST SYS.', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(30, 'M.COM.  (ADV. A/CING & TAXATION )', '130', 'Master Of Commerce', 'ADV. A/CING & TAXATION ', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(31, 'M.COM. (BUSINESS ADMINISTRATION)', '131', 'Master Of Commerce', 'BUSINESS ADMINISTRATION', 'PG', NULL, NULL, 2, NULL, NULL, NULL),
(32, 'Ph.D.', '1001', 'Doctor of Philosophy', NULL, 'PHD', NULL, NULL, 2, NULL, NULL, NULL),
(33, 'Ph.D.', '1001', 'Doctor of Philosophy', 'MARATHI', 'PHD', NULL, NULL, 2, NULL, NULL, NULL),
(34, 'Ph.D.', '1003', 'Doctor of Philosophy', 'SANSKRIT', 'PHD', NULL, NULL, 2, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_course_category_id_foreign` (`course_category_id`),
  ADD KEY `courses_programme_id_foreign` (`programme_id`),
  ADD KEY `courses_college_id_foreign` (`college_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `coursecategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
