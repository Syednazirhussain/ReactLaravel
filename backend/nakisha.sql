-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2022 at 08:55 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nakisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_09_142807_create_test_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `u_id`, `title`, `description`, `content`, `slug`, `parent_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'kohan', 'Eius reprehenderit c', 'Est quia do ipsum a', 'Quasi tempor et quis', 'Assumenda at itaque', 'Consequatur Optio', 1, 2, '2022-03-10 11:47:04', '2022-03-10 11:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `management` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `u_id`, `title`, `management`, `content`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'paxotewis', 'Labore ratione accus', 'Amet sed possimus', 'Veniam facilis volu', 1, 2, '2022-03-10 10:55:13', '2022-03-10 10:55:13'),
(2, 'paxotewis', 'Labore ratione accus', 'Amet sed possimus', 'Veniam facilis volu', 0, 2, '2022-03-10 10:56:33', '2022-03-10 10:56:33'),
(3, 'paxotewis', 'Labore ratione accus', 'Amet sed possimus', 'Veniam facilis volu', 0, 2, '2022-03-10 10:57:13', '2022-03-10 10:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `intro_shape_svg_1` varchar(255) NOT NULL,
  `intro_shape_svg_2` varchar(255) NOT NULL,
  `cursor_icon_svg` varchar(255) NOT NULL,
  `cursor_circle_size` varchar(255) NOT NULL,
  `cursor_circle_color` varchar(255) NOT NULL,
  `cursor_circle_text` varchar(255) NOT NULL,
  `background_color` varchar(255) NOT NULL,
  `headings_font` varchar(255) NOT NULL,
  `headings_weight` varchar(255) NOT NULL,
  `headings_color` varchar(255) NOT NULL,
  `body_font` varchar(255) NOT NULL,
  `body_weight` varchar(255) NOT NULL,
  `body_color` varchar(255) NOT NULL,
  `links_color` varchar(255) NOT NULL,
  `links_weight` varchar(255) NOT NULL,
  `site_logo_inactive_svg` varchar(255) NOT NULL,
  `site_logo_svg` varchar(255) NOT NULL,
  `cursor_blend_mode` tinyint(1) NOT NULL DEFAULT '0',
  `site_logo_url` varchar(255) DEFAULT NULL,
  `background_image_url` varchar(255) DEFAULT NULL,
  `site_logo_inactive_url` varchar(255) DEFAULT NULL,
  `cursor_icon_url` varchar(255) DEFAULT NULL,
  `intro_shape_url_1` varchar(255) DEFAULT NULL,
  `intro_shape_url_2` varchar(255) DEFAULT NULL,
  `favicon_url` varchar(255) DEFAULT NULL,
  `video_url_1` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `u_id`, `site_name`, `site_desc`, `intro_shape_svg_1`, `intro_shape_svg_2`, `cursor_icon_svg`, `cursor_circle_size`, `cursor_circle_color`, `cursor_circle_text`, `background_color`, `headings_font`, `headings_weight`, `headings_color`, `body_font`, `body_weight`, `body_color`, `links_color`, `links_weight`, `site_logo_inactive_svg`, `site_logo_svg`, `cursor_blend_mode`, `site_logo_url`, `background_image_url`, `site_logo_inactive_url`, `cursor_icon_url`, `intro_shape_url_1`, `intro_shape_url_2`, `favicon_url`, `video_url_1`, `created_at`, `updated_at`) VALUES
(1, 'qosetuwa', 'Jocelyn House', 'Culpa ut sed conseq', 'Ea voluptatum rem au', 'Beatae velit non con', 'Neque duis voluptate', 'Placeat omnis conse', 'Laudantium quia lor', 'Asperiores velit ali', 'Nihil sed quos eum r', 'Maxime dolores modi', 'Sint at ex esse quo', 'Doloribus est assume', 'Aperiam quia nisi la', 'Ut dolore aliqua Pe', 'In fugit eum simili', 'Autem nihil illo fac', 'Sequi ullamco nulla', 'Laborum eiusmod qui', 'Fugiat quaerat moll', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-10 15:31:39', '2022-03-10 15:31:39'),
(2, 'qosetuwa', 'Jocelyn House', 'Culpa ut sed conseq', 'Ea voluptatum rem au', 'Beatae velit non con', 'Neque duis voluptate', 'Placeat omnis conse', 'Laudantium quia lor', 'Asperiores velit ali', 'Nihil sed quos eum r', 'Maxime dolores modi', 'Sint at ex esse quo', 'Doloribus est assume', 'Aperiam quia nisi la', 'Ut dolore aliqua Pe', 'In fugit eum simili', 'Autem nihil illo fac', 'Sequi ullamco nulla', 'Laborum eiusmod qui', 'Fugiat quaerat moll', 0, NULL, 'http://localhost/nakisha-shaikh/public/uploads/setting/2/F1xjissIFHatdu0ZLEVPWLslfAXAygYO7u6eLqlq.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/RPQKgGZu6VDONfJTnEln6vzxLmF2APyjfcAYjFKD.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/QeBZ0DpapbZ83tw5PijfI1yFnYY76jYm1HRXNu4h.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/0xrLnpplIb28FTTefaCnVmYZxHN6On7xbZmseZ8F.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/ofjHYbcwUMJb4hCOCRGRblwEwvmgHO9g8LJE1dKb.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/L3oRVzxs47XvGXb9dEEGM0pwj7qhwIaZSJIaAnTp.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/2/6VKrVrlwXQPUCB0fK9Pwn0Zsc3YSCXa8QOCn4m6g.jpg', '2022-03-10 15:32:29', '2022-03-10 15:32:29'),
(3, 'qosetuwa', 'Jocelyn House', 'Culpa ut sed conseq', 'Ea voluptatum rem au', 'Beatae velit non con', 'Neque duis voluptate', 'Placeat omnis conse', 'Laudantium quia lor', 'Asperiores velit ali', 'Nihil sed quos eum r', 'Maxime dolores modi', 'Sint at ex esse quo', 'Doloribus est assume', 'Aperiam quia nisi la', 'Ut dolore aliqua Pe', 'In fugit eum simili', 'Autem nihil illo fac', 'Sequi ullamco nulla', 'Laborum eiusmod qui', 'Fugiat quaerat moll', 0, NULL, 'http://localhost/nakisha-shaikh/public/uploads/setting/3/7sSatSufJmf4y5MXJyYDTVW8Tv53Cz0E9KqlooNG.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/CVxftDmUMDOAYLA6sd17HkA9E6XbTVUPru3QVAYO.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/PkapVJVJDKF04emMe6GWWWmbaqFqKyut4ZBOzt4q.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/O5pjUBYnML1ZBNOhELsX8nBd7F2NhNsQfmogMrbl.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/KVkV77k0OCEMKMm8kXnCeIk6wh7WfsNQm6uKqTtW.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/69IDKbvLVIyTRnDrT9ppfmkMxFtqF3XTcW576O9y.jpg', 'http://localhost/nakisha-shaikh/public/uploads/setting/3/xxX9ZMlJZviQHgXuSTkW34lZGwAXPA794VPBZ0pM.jpg', '2022-03-10 15:38:05', '2022-03-10 15:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `contact_number`, `location`, `status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Gray Conrad', 'jyju@mailinator.com', NULL, '$2y$10$LKvVzqUV98CZv6Or8lkmxeTcFZ5IxbN.6xVvrJM2k2zgFoeouSBJK', '', '', '', 0, '', NULL, '2022-03-09 09:50:35', '2022-03-09 09:50:35'),
(2, '', 'fazil', 'fazil.ahmed@golpik.com', NULL, '$2y$10$qch89jXesdgIfRMpZXCHHuOcW16G8V4t/0tZwPHXIGu8YtabKpZ/u', '', '', '', 0, '', NULL, '2022-03-09 09:55:30', '2022-03-09 09:55:30'),
(3, 'nawujizob', 'haqozy', 'fidone@mailinator.com', '2012-08-18 19:00:00', '$2y$10$Nn.WDFkX6KTRWzzXVUcQg.jNyHXT4x5lczzk90ZuxU67Sj7YFD.6q', 'Soluta vero at eos', '488', 'Voluptatem possimus', 1, 'http://localhost/nakisha-shaikh/public/uploads/user_images/3/xcmECSnP0q4Qw7ILEhZAWUuStdCsq57vHbvgfaTY.jpg', NULL, '2022-03-10 09:17:17', '2022-03-10 09:38:15'),
(4, 'viryhofo', 'qavevatamo', 'puhuvo@mailinator.com', '2001-03-19 19:00:00', '$2y$10$hx2UW8qzzJqiCahbUMvSye.JPrIkYvcZLv/GcNtB.FD3XPZYupv.C', 'Mollitia repudiandae', '214', 'Quos voluptas commod', 1, 'http://localhost/nakisha-shaikh/public/uploads/user_images/4/XPJFQCZ9FQxKTpCPBLVyzIVxbrPOp8arDDMc1iiH.jpg', NULL, '2022-03-10 09:41:27', '2022-03-10 09:41:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
