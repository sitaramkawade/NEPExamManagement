-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 11:45 AM
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
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seatno` int(11) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `int_marks` int(11) NOT NULL,
  `int_practical_marks` int(11) NOT NULL,
  `ext_marks` int(11) NOT NULL,
  `ext_practical_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `project_marks` int(11) NOT NULL,
  `oral` varchar(255) NOT NULL,
  `subject_grade` varchar(5) DEFAULT NULL,
  `grade` varchar(255) NOT NULL,
  `grade_point` int(11) NOT NULL DEFAULT 0,
  `gpa` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `int_ordinace_flag` tinyint(4) NOT NULL DEFAULT 0,
  `int_ordinance_one_marks` int(11) NOT NULL DEFAULT 0,
  `ext_ordinace_flag` tinyint(4) NOT NULL DEFAULT 0,
  `ext_ordinance_one_marks` int(11) NOT NULL DEFAULT 0,
  `practical_ordinace_flag` tinyint(4) NOT NULL DEFAULT 0,
  `practical_ordinance_one_marks` int(11) NOT NULL DEFAULT 0,
  `total_ordinace_flag` tinyint(4) NOT NULL DEFAULT 0,
  `total_ordinance_one_marks` int(11) NOT NULL DEFAULT 0,
  `total_ordinancefour_marks` int(11) NOT NULL DEFAULT 0,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `patternclass_id` bigint(20) UNSIGNED NOT NULL,
  `performancecancel` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 100, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 101, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 102, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 103, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 104, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 105, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 106, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 107, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 108, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 109, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 110, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL),
(12345, 2, 111, 1, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, NULL, NULL);

INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 112, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 113, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 114, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 115, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 116, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 117, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 118, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 119, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 120, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 121, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 122, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 123, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 124, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL),
(12345, 2, 381, 2, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, NULL, NULL);

INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 683, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 688, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 689, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 690, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 691, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 692, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 693, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 694, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 695, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 696, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL),
(12345, 2, 697, 3, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, NULL, NULL);

INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 698, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 699, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 700, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 701, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 702, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 703, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 704, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 705, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 706, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 707, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL),
(12345, 2, 708, 4, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, NULL, NULL);


INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 1435, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1436, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1437, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1438, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1439, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1440, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1441, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1442, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1443, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL),
(12345, 2, 1445, 5, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 10, 0, NULL, NULL);

INSERT INTO `studentmarks` (`seatno`, `student_id`, `subject_id`, `sem`, `int_marks`, `int_practical_marks`, `ext_marks`, `ext_practical_marks`, `practical_marks`, `project_marks`, `oral`, `subject_grade`, `grade`, `grade_point`, `gpa`, `total`, `int_ordinace_flag`, `int_ordinance_one_marks`, `ext_ordinace_flag`, `ext_ordinance_one_marks`, `practical_ordinace_flag`, `practical_ordinance_one_marks`, `total_ordinace_flag`, `total_ordinance_one_marks`, `total_ordinancefour_marks`, `exam_id`, `patternclass_id`, `performancecancel`, `created_at`, `updated_at`) VALUES
(12345, 2, 1446, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1447, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1448, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1449, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1450, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1451, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1452, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1453, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1454, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1455, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL),
(12345, 2, 1456, 6, 10, 0, 30, 0, 0, 0, 'y', NULL, 'D', 4, 8, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 10, 0, NULL, NULL);

--
-- Triggers `studentmarks`
--
DELIMITER $$
CREATE TRIGGER `insert_studentmarks_trigger` BEFORE INSERT ON `studentmarks` FOR EACH ROW BEGIN
                -- Fetch passing thresholds for the subject
                SELECT 
                    subject_intpassing, 
                    subject_extpassing, 
                    subject_intpractpassing, 
                    subject_totalpassing,
                    subject_credit
                INTO 
                    @passing_intthreshold,
                    @passing_extthreshold,
                    @passing_practthreshold,
                    @passing_totalthreshold,
                    @passing_subject_credit
                FROM subjects
                WHERE id = NEW.subject_id;
            
                -- Calculate total marks
                SET NEW.total = NEW.int_marks + NEW.ext_marks + NEW.int_practical_marks;
            
                -- Check if the subject is passing or failing
                IF NEW.int_marks >= @passing_intthreshold AND 
                NEW.ext_marks >= @passing_extthreshold AND 
                NEW.total >= @passing_totalthreshold THEN
                    -- Calculate grade based on total marks
                    IF NEW.total >= 90 THEN
                        SET NEW.grade = 'O';
                        SET NEW.grade_point = 10;
                    ELSEIF NEW.total >= 75 THEN
                        SET NEW.grade = 'A+';
                        SET NEW.grade_point = 9;
                    ELSEIF NEW.total >= 60 THEN
                        SET NEW.grade = 'A';
                        SET NEW.grade_point = 8;
                    ELSEIF NEW.total >= 55 THEN
                        SET NEW.grade = 'B+';
                        SET NEW.grade_point = 7;
                    ELSEIF NEW.total >= 50 THEN
                        SET NEW.grade = 'B';
                        SET NEW.grade_point = 6;
                    ELSEIF NEW.total >= 45 THEN
                        SET NEW.grade = 'C';
                        SET NEW.grade_point = 5;
                    ELSE
                        SET NEW.grade = 'D';
                        SET NEW.grade_point = 4;
                    END IF;
                    
                    -- Calculate GPA based on grade point and subject credit
                    SET NEW.gpa = NEW.grade_point * @passing_subject_credit;
                ELSE
                    -- Subject is failing
                    SET NEW.grade = 'F';
                    SET NEW.grade_point = 0;
                    SET NEW.gpa = 0;
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_marks_and_grade_trigger` BEFORE UPDATE ON `studentmarks` FOR EACH ROW BEGIN
                DECLARE passing_intthreshold INT;
                DECLARE passing_extthreshold INT;
                DECLARE passing_practthreshold INT;
                DECLARE passing_totalthreshold INT;
                DECLARE passing_subject_credit INT;
                DECLARE positive_int_marks INT;
                DECLARE positive_ext_marks INT;
                DECLARE positive_int_practical_marks INT;
            
                -- Ensure marks are non-negative
                IF NEW.int_marks < 0 THEN
                    SET positive_int_marks = 0;
                ELSE
                    SET positive_int_marks = NEW.int_marks;
                END IF;
            
                IF NEW.ext_marks < 0 THEN
                    SET positive_ext_marks = 0;
                ELSE
                    SET positive_ext_marks = NEW.ext_marks;
                END IF;
            
                IF NEW.int_practical_marks < 0 THEN
                    SET positive_int_practical_marks = 0;
                ELSE
                    SET positive_int_practical_marks = NEW.int_practical_marks;
                END IF;
            
                -- Calculate total marks
                SET NEW.total = positive_int_marks + positive_ext_marks + positive_int_practical_marks;
            
                -- Fetch passing thresholds for the subject from the subjects table
                SELECT 
                    subject_intpassing, 
                    subject_extpassing, 
                    subject_intpractpassing, 
                    subject_totalpassing,
                    subject_credit
                INTO 
                    passing_intthreshold,
                    passing_extthreshold,
                    passing_practthreshold,
                    passing_totalthreshold,
                    passing_subject_credit
                FROM subjects
                WHERE id = NEW.subject_id;
            
                -- Check if the subject is passing or failing
                IF positive_int_marks >= passing_intthreshold AND 
                positive_ext_marks >= passing_extthreshold AND 
                positive_int_practical_marks >= passing_practthreshold AND 
                NEW.total >= passing_totalthreshold THEN
                    -- Calculate grade based on total marks
                    IF NEW.total >= 90 THEN
                        SET NEW.grade = 'O';
                        SET NEW.grade_point = 10;
                        SET NEW.gpa = 10 * passing_subject_credit;
                    ELSEIF NEW.total >= 75 THEN
                        SET NEW.grade = 'A+';
                        SET NEW.grade_point = 9;
                        SET NEW.gpa = 9 * passing_subject_credit;
                    ELSEIF NEW.total >= 60 THEN
                        SET NEW.grade = 'A';
                        SET NEW.grade_point = 8;
                        SET NEW.gpa = 8 * passing_subject_credit;
                    ELSEIF NEW.total >= 55 THEN
                        SET NEW.grade = 'B+';
                        SET NEW.grade_point = 7;
                        SET NEW.gpa = 7 * passing_subject_credit;
                    ELSEIF NEW.total >= 50 THEN
                        SET NEW.grade = 'B';
                        SET NEW.grade_point = 6;
                        SET NEW.gpa = 6 * passing_subject_credit;
                    ELSEIF NEW.total >= 45 THEN
                        SET NEW.grade = 'C';
                        SET NEW.grade_point = 5;
                        SET NEW.gpa = 5 * passing_subject_credit;
                    ELSEIF NEW.total >= 40 THEN
                        SET NEW.grade = 'D';
                        SET NEW.grade_point = 4;
                        SET NEW.gpa = 4 * passing_subject_credit;
                    ELSE
                        SET NEW.grade = 'F';
                        SET NEW.grade_point = 0;
                        SET NEW.gpa = 0;
                    END IF;
                ELSE
                    -- Subject is failing
                    SET NEW.grade = 'F';
                    SET NEW.grade_point = 0;
                    SET NEW.gpa = 0;
                END IF;
            END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentmarks_student_id_subject_id_seatno_exam_id_unique` (`student_id`,`subject_id`,`seatno`,`exam_id`),
  ADD KEY `studentmarks_subject_id_foreign` (`subject_id`),
  ADD KEY `studentmarks_exam_id_foreign` (`exam_id`),
  ADD KEY `studentmarks_patternclass_id_foreign` (`patternclass_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentmarks`
--
ALTER TABLE `studentmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD CONSTRAINT `studentmarks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `studentmarks_patternclass_id_foreign` FOREIGN KEY (`patternclass_id`) REFERENCES `pattern_classes` (`id`),
  ADD CONSTRAINT `studentmarks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `studentmarks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
