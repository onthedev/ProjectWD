-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 06:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingredient`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_types`
--

CREATE TABLE `ingredient_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient_types`
--

INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 'เนื้อ', '2023-09-20 23:42:53', '2023-09-20 23:47:13', NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 'หมู', '2023-09-20 23:44:22', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 'ไก่', '2023-09-20 23:44:22', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 'อาหารทะเล', '2023-09-20 23:46:45', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(5, 'ผัก', '2023-09-20 23:46:45', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(6, 'ผลไม้', '2023-09-20 23:46:45', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(7, 'ของหวาน', '2023-09-20 23:46:45', NULL, NULL);
INSERT INTO `ingredient_types` (`id`, `name_type`, `created_at`, `updated_at`, `deleted_at`) VALUES(8, 'เครื่องดื่ม', '2023-09-20 23:46:45', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
