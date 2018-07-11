-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 03:44 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qt64_lar`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_07_06_091159_create_product_table', 1),
('2018_07_06_105954_create_category_table', 1),
('2018_07_09_032403_create_news_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qt64_category`
--

CREATE TABLE `qt64_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qt64_category`
--

INSERT INTO `qt64_category` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Thời sự', 'thoi-su', 0, '2018-07-09 10:06:08', '2018-07-09 10:06:08'),
(4, 'Giải trí', 'giai-tri', 0, '2018-07-09 10:18:52', '2018-07-09 10:18:52'),
(7, 'Học Tập', 'hoc-tap', 0, '2018-07-10 04:15:26', '2018-07-10 04:15:26'),
(8, 'Thế giới', 'the-gioi', 1, '2018-07-10 04:47:10', '2018-07-10 04:47:10'),
(9, 'Du lịch', 'du-lich', 0, '2018-07-10 08:04:01', '2018-07-10 08:04:01'),
(10, 'quận 4', 'quan-4', 9, '2018-07-10 08:46:27', '2018-07-10 08:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `qt64_news`
--

CREATE TABLE `qt64_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `full` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qt64_users`
--

CREATE TABLE `qt64_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qt64_users`
--

INSERT INTO `qt64_users` (`id`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'superadmin', '$2y$10$yFVTA/AMBJb3H/zzU467Lu4EYLLNBX2TRcCf9n4YOmlIgo1tGQuEC', 1, 'yYodZUzNXIs1EGnhxQiQ6tdm0A9irWmQYntd7OSzJ6lYAcDH2L9adgRZbGBd', '2018-07-09 07:00:14', '2018-07-11 01:14:00'),
(3, 'admin', '$2y$10$/s0Q4G1gTYhs.tm9kkdiWuXtd8EwnTNE01y4v7HKNF/PV7W2WEAu2', 1, 'mmKwXCB7JeexPtEKvSnjPrI4p1i40nplPqtJPsLiZV4xgGMLZ03NmtYg5FOt', '2018-07-09 07:00:14', '2018-07-11 01:19:06'),
(4, 'member', '$2y$10$xuDJ9i5A7u1bO4GOjL0fWuAHrTF7QzR6xbKOtZfSqcCZKY/WmA6sC', 2, NULL, '2018-07-09 07:00:14', NULL),
(5, 'user', '$2y$10$F.plmoIhw58rExYs7Sos.e2ST8YCbdugJAU9BAYmTANKRXDqlTPtq', 2, NULL, '2018-07-09 07:00:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qt64_category`
--
ALTER TABLE `qt64_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_category_name_unique` (`name`);

--
-- Indexes for table `qt64_news`
--
ALTER TABLE `qt64_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qt64_news_category_id_foreign` (`category_id`),
  ADD KEY `qt64_news_users_id_foreign` (`users_id`);

--
-- Indexes for table `qt64_users`
--
ALTER TABLE `qt64_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qt64_category`
--
ALTER TABLE `qt64_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `qt64_news`
--
ALTER TABLE `qt64_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qt64_users`
--
ALTER TABLE `qt64_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qt64_news`
--
ALTER TABLE `qt64_news`
  ADD CONSTRAINT `qt64_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qt64_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qt64_news_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `qt64_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
