-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 02:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternative`
--

CREATE TABLE `alternative` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `NIK` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternative`
--

INSERT INTO `alternative` (`id`, `user_id`, `NIK`, `name`, `address`, `gender`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 'pak kaleng', 'dsf', 'pria', '62b1a29c1c4d7.png', '2022-06-21 03:51:08', '2022-06-21 03:51:08'),
(2, 1, 1212, 'Bonjames lor4em', 'alamat kemerdekaan', 'pria', '62bc2edbb4293.png', '2022-06-29 03:52:11', '2022-06-29 03:52:11'),
(3, 1, 10, 'jumm', 'bandengan', 'pria', '62bfa655b1d2d.png', '2022-07-01 18:58:45', '2022-07-01 18:58:45'),
(4, 1, 15, 'qor', 'panjang', 'pria', '62bfa9069b768.png', '2022-07-01 19:10:14', '2022-07-01 19:10:14'),
(5, 1, 121212, 'gento badak', 'fs', 'pria', '62bfc4c524c62.png', '2022-07-01 21:08:37', '2022-07-01 21:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `alternative_value`
--

CREATE TABLE `alternative_value` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `criteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `criteria_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `weight` decimal(8,2) NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternative_value`
--

INSERT INTO `alternative_value` (`id`, `alternative_id`, `criteria_id`, `criteria_option_id`, `weight`, `value`, `created_at`, `updated_at`) VALUES
(21, 1, 6, 12, '2.00', '2.50', '2022-07-01 21:31:50', '2022-07-01 21:31:50'),
(22, 1, 7, 15, '1.50', '1.00', '2022-07-01 21:31:53', '2022-07-01 21:31:53'),
(23, 1, 8, 20, '1.00', '2.50', '2022-07-01 21:31:56', '2022-07-01 21:31:56'),
(24, 1, 9, 23, '1.50', '2.50', '2022-07-01 21:32:00', '2022-07-01 21:32:00'),
(25, 2, 6, 14, '2.00', '7.50', '2022-07-01 21:32:30', '2022-07-01 21:32:30'),
(26, 2, 7, 18, '1.50', '7.50', '2022-07-01 21:32:32', '2022-07-01 21:32:32'),
(27, 2, 8, 22, '1.00', '7.50', '2022-07-01 21:32:35', '2022-07-01 21:32:35'),
(28, 2, 9, 25, '1.50', '7.50', '2022-07-01 21:32:38', '2022-07-01 21:32:38'),
(29, 4, 6, 12, '2.00', '2.50', '2022-07-01 21:33:00', '2022-07-01 21:33:00'),
(30, 4, 7, 19, '1.50', '10.00', '2022-07-01 21:33:03', '2022-07-01 21:33:03'),
(31, 4, 8, 22, '1.00', '7.50', '2022-07-01 21:33:07', '2022-07-01 21:33:07'),
(32, 4, 9, 25, '1.50', '7.50', '2022-07-01 21:33:09', '2022-07-01 21:33:09'),
(33, 5, 6, 12, '2.00', '2.50', '2022-07-01 21:33:57', '2022-07-01 21:33:57'),
(34, 5, 7, 16, '1.50', '2.50', '2022-07-01 21:34:02', '2022-07-01 21:34:02'),
(35, 5, 8, 20, '1.00', '2.50', '2022-07-01 21:34:06', '2022-07-01 21:34:06'),
(36, 5, 9, 23, '1.50', '2.50', '2022-07-01 21:34:09', '2022-07-01 21:34:09'),
(37, 3, 6, 14, '2.00', '7.50', '2022-07-01 21:34:59', '2022-07-01 21:34:59'),
(38, 3, 7, 18, '1.50', '7.50', '2022-07-01 21:35:02', '2022-07-01 21:35:02'),
(39, 3, 8, 22, '1.00', '7.50', '2022-07-01 21:35:05', '2022-07-01 21:35:05'),
(40, 3, 9, 25, '1.50', '7.50', '2022-07-01 21:35:08', '2022-07-01 21:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` enum('benefit','cost') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `name`, `attribute`, `type`, `weight`, `created_at`, `updated_at`) VALUES
(6, 'Penghasilan', 'benefit', NULL, '2.00', '2022-07-01 19:37:48', '2022-07-03 03:10:23'),
(7, 'Luas Rumah', 'benefit', NULL, '1.50', '2022-07-01 19:40:23', '2022-07-03 03:10:16'),
(8, 'Status Kepemilikan Rumah', 'benefit', NULL, '1.00', '2022-07-01 19:43:23', '2022-07-03 03:10:29'),
(9, 'Aset Yang Dimiliki', 'benefit', NULL, '1.50', '2022-07-01 19:45:31', '2022-07-03 03:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_option`
--

CREATE TABLE `criteria_option` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` enum('sangat rendah','rendah','sedang','tinggi','sangat tinggi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria_option`
--

INSERT INTO `criteria_option` (`id`, `criteria_id`, `name`, `klasifikasi`, `value`, `created_at`, `updated_at`) VALUES
(12, 6, '> 2.000.000', 'tinggi', '2.50', '2022-07-01 19:38:35', '2022-07-01 19:38:35'),
(13, 6, '1.500.000', 'sedang', '5.00', '2022-07-01 19:38:52', '2022-07-01 19:38:52'),
(14, 6, '0-1.500.000', 'rendah', '7.50', '2022-07-01 19:39:10', '2022-07-01 19:39:10'),
(15, 7, '>500m2', 'sangat rendah', '1.00', '2022-07-01 19:41:00', '2022-07-01 19:41:00'),
(16, 7, '201-500m', 'rendah', '2.50', '2022-07-01 19:41:18', '2022-07-01 19:41:18'),
(17, 7, '101-200m', 'sedang', '5.00', '2022-07-01 19:41:37', '2022-07-01 19:41:37'),
(18, 7, '51-100m', 'tinggi', '7.50', '2022-07-01 19:41:57', '2022-07-01 19:41:57'),
(19, 7, '0-50m', 'sangat tinggi', '10.00', '2022-07-01 19:42:10', '2022-07-01 19:42:10'),
(20, 8, 'Milik Sendiri', 'rendah', '2.50', '2022-07-01 19:43:53', '2022-07-01 19:43:53'),
(21, 8, 'Sewa', 'sedang', '7.50', '2022-07-01 19:44:08', '2022-07-01 19:44:08'),
(22, 8, 'Menumpang', 'tinggi', '7.50', '2022-07-01 19:44:39', '2022-07-01 19:44:39'),
(23, 9, '>30.000.000', 'tinggi', '2.50', '2022-07-01 19:46:09', '2022-07-01 19:46:09'),
(24, 9, '10.000.000 - 30.000.000', 'sedang', '5.00', '2022-07-01 19:46:30', '2022-07-01 19:46:30'),
(25, 9, '< 10.000.000', 'tinggi', '7.50', '2022-07-01 19:46:47', '2022-07-01 19:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_06_17_025120_criterias', 1),
(20, '2022_06_17_025349_criterias_options', 1),
(21, '2022_06_19_052805_alternative', 1),
(27, '2022_06_19_053228_alternative_value', 2),
(28, '2022_07_02_031155_nilai_minim', 3),
(34, '2022_07_02_033206_result', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_minim`
--

CREATE TABLE `nilai_minim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_minim` decimal(8,2) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_minim`
--

INSERT INTO `nilai_minim` (`id`, `nilai_minim`, `tanggal_keluar`) VALUES
(3, '5.00', '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `alternative_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, '1.65', '2022-07-01 21:13:53', '2022-07-03 05:44:47'),
(2, 5, '1.87', '2022-07-01 21:14:26', '2022-07-03 05:44:47'),
(3, 4, '4.67', '2022-07-01 21:17:37', '2022-07-03 05:44:47'),
(4, 2, '5.63', '2022-07-01 21:18:58', '2022-07-03 05:44:47'),
(5, 3, '5.63', '2022-07-01 21:20:59', '2022-07-03 05:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dr. Joel Halvorson I', 'joshua85@example.com', 'admin', '2022-06-21 03:13:43', '2022-06-21 03:13:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternative`
--
ALTER TABLE `alternative`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_user_id_foreign` (`user_id`);

--
-- Indexes for table `alternative_value`
--
ALTER TABLE `alternative_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_value_alternative_id_index` (`alternative_id`),
  ADD KEY `alternative_value_criteria_id_index` (`criteria_id`),
  ADD KEY `alternative_value_criteria_option_id_index` (`criteria_option_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria_option`
--
ALTER TABLE `criteria_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_option_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_minim`
--
ALTER TABLE `nilai_minim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_alternative_id_foreign` (`alternative_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternative`
--
ALTER TABLE `alternative`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternative_value`
--
ALTER TABLE `alternative_value`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `criteria_option`
--
ALTER TABLE `criteria_option`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nilai_minim`
--
ALTER TABLE `nilai_minim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternative`
--
ALTER TABLE `alternative`
  ADD CONSTRAINT `alternative_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `alternative_value`
--
ALTER TABLE `alternative_value`
  ADD CONSTRAINT `alternative_value_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternative` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternative_value_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternative_value_criteria_option_id_foreign` FOREIGN KEY (`criteria_option_id`) REFERENCES `criteria_option` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criteria_option`
--
ALTER TABLE `criteria_option`
  ADD CONSTRAINT `criteria_option_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternative` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
