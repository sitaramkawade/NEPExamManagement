-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2024 at 10:10 AM
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
-- Database: `28jan2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `examorderposts`
--

CREATE TABLE `examorderposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examorderposts`
--

INSERT INTO `examorderposts` (`id`, `post_name`, `created_at`, `updated_at`) VALUES
(1, 'Chairman & Moderator ', '2021-12-22 15:46:32', '2021-12-22 15:46:32'),
(2, 'Paper Setter & Moderator', '2021-12-22 15:46:32', '2021-12-22 15:46:32'),
(3, 'Paper Setter', '2021-12-22 15:46:32', '2021-12-22 15:46:32'),
(4, 'Examiner', '2021-12-22 15:46:32', '2021-12-22 15:46:32'),
(6, 'Moderator', '2021-12-22 15:46:32', '2021-12-22 15:46:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examorderposts`
--
ALTER TABLE `examorderposts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examorderposts`
--
ALTER TABLE `examorderposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
