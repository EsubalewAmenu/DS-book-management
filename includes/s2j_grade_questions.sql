-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2022 at 02:20 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datascienceplcco_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `s2j_grade_questions`
--

CREATE TABLE `s2j_grade_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `subject` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s2j_grade_questions`
--

INSERT INTO `s2j_grade_questions` (`id`, `company_id`, `grade`, `subject`, `chapter_name`, `logo`, `uc`, `p`, `notes`, `attachment`, `enabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12, 'Biology', 'Unit', NULL, '', '', NULL, NULL, 1, NULL, NULL, NULL),
(2, 1, 11, 'Maths', 'Unit', NULL, '', '', NULL, NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s2j_grade_questions`
--
ALTER TABLE `s2j_grade_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_company_id_index` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s2j_grade_questions`
--
ALTER TABLE `s2j_grade_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
