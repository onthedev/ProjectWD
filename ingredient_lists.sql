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
-- Table structure for table `ingredient_lists`
--

CREATE TABLE `ingredient_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_list` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient_lists`
--

INSERT INTO `ingredient_lists` (`id`, `name_list`, `amount`, `created_at`, `updated_at`, `deleted_at`, `type_id`, `unit_id`) VALUES
(31, 'pork loin', 15, '2023-09-24 02:46:46', '2023-09-24 02:46:46', NULL, 2, 1),
(32, 'corn', 15, '2023-09-24 02:48:14', '2023-09-24 02:48:14', NULL, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient_lists`
--
ALTER TABLE `ingredient_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_lists_type_id_foreign` (`type_id`),
  ADD KEY `ingredient_lists_unit_id_foreign` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient_lists`
--
ALTER TABLE `ingredient_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient_lists`
--
ALTER TABLE `ingredient_lists`
  ADD CONSTRAINT `ingredient_lists_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `ingredient_types` (`id`),
  ADD CONSTRAINT `ingredient_lists_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit_of_measurements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
