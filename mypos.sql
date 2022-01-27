-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 02:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-03 14:42:27', '2021-10-03 14:42:27'),
(2, '2021-10-03 14:42:47', '2021-10-03 14:42:47'),
(3, '2021-10-03 19:51:34', '2021-10-03 19:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `locale`) VALUES
(1, 1, 'Pens', 'en'),
(2, 1, 'أقلام', 'ar'),
(3, 2, 'Notebook', 'en'),
(4, 2, 'كشكول', 'ar'),
(5, 3, 'Mouse', 'en'),
(6, 3, 'فأره كمبيوتر', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', '[\"01069998151\"]', 'Tala', '2021-10-03 11:12:50', '2021-10-03 11:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_02_110203_laratrust_setup_tables', 1),
(5, '2021_09_13_131001_create_categories_table', 1),
(6, '2021_09_22_114159_create_category_translations_table', 1),
(7, '2021_09_23_122040_create_products_table', 1),
(8, '2021_09_23_122452_create_product_translations_table', 1),
(9, '2021_09_29_140545_create_clients_table', 1),
(10, '2021_10_03_121930_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'categories_create', 'Create Categories', 'Create Categories', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(2, 'categories_read', 'Read Categories', 'Read Categories', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(3, 'categories_update', 'Update Categories', 'Update Categories', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(4, 'categories_delete', 'Delete Categories', 'Delete Categories', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(5, 'products_create', 'Create Products', 'Create Products', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(6, 'products_read', 'Read Products', 'Read Products', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(7, 'products_update', 'Update Products', 'Update Products', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(8, 'products_delete', 'Delete Products', 'Delete Products', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(9, 'clients_create', 'Create Clients', 'Create Clients', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(10, 'clients_read', 'Read Clients', 'Read Clients', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(11, 'clients_update', 'Update Clients', 'Update Clients', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(12, 'clients_delete', 'Delete Clients', 'Delete Clients', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(13, 'orders_create', 'Create Orders', 'Create Orders', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(14, 'orders_read', 'Read Orders', 'Read Orders', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(15, 'orders_update', 'Update Orders', 'Update Orders', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(16, 'orders_delete', 'Delete Orders', 'Delete Orders', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(17, 'users_create', 'Create Users', 'Create Users', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(18, 'users_read', 'Read Users', 'Read Users', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(19, 'users_update', 'Update Users', 'Update Users', '2021-10-03 11:12:20', '2021-10-03 11:12:20'),
(20, 'users_delete', 'Delete Users', 'Delete Users', '2021-10-03 11:12:20', '2021-10-03 11:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 2, 'App\\User'),
(2, 2, 'App\\User'),
(3, 2, 'App\\User'),
(4, 2, 'App\\User'),
(5, 2, 'App\\User'),
(6, 2, 'App\\User'),
(7, 2, 'App\\User'),
(8, 2, 'App\\User'),
(9, 2, 'App\\User'),
(10, 2, 'App\\User'),
(11, 2, 'App\\User'),
(12, 2, 'App\\User'),
(13, 2, 'App\\User'),
(14, 2, 'App\\User'),
(15, 2, 'App\\User'),
(16, 2, 'App\\User'),
(18, 2, 'App\\User'),
(2, 3, 'App\\User'),
(6, 3, 'App\\User'),
(9, 3, 'App\\User'),
(10, 3, 'App\\User'),
(11, 3, 'App\\User'),
(13, 3, 'App\\User'),
(14, 3, 'App\\User'),
(15, 3, 'App\\User'),
(16, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Productdefault.png',
  `purchase_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `purchase_price`, `sale_price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'N3NHcKUGbgVRYnXk6tjHg6jBkoHmwvpQVta6SZHs.png', 3.00, 5.00, 30, '2021-10-03 14:49:54', '2021-10-03 19:49:09'),
(2, 2, '9aVZ3sBgrBQ8VR2Wl83Amg3bML1PScZ21uZ5I7C6.jpg', 10.00, 13.00, 20, '2021-10-03 19:43:16', '2021-10-03 19:43:16'),
(3, 1, 'NipxUHKy2cCg0DCZZfapz7cOHQTrHusJgHzYnUfu.png', 3.00, 4.00, 30, '2021-10-03 19:48:51', '2021-10-03 19:48:51'),
(4, 2, 'gPebCPurAn5r8DKHXNzGYNEGMPEUpLS7m68AZP0P.jpg', 35.00, 40.50, 200, '2021-10-07 18:56:09', '2021-10-07 19:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `name`, `description`, `locale`, `created_at`, `updated_at`) VALUES
(1, 1, 'Red Pen', '<p>Red pen</p>', 'en', NULL, NULL),
(2, 1, 'قلم احمر', '<p>قلم احمر&nbsp;</p>', 'ar', NULL, NULL),
(3, 2, 'Black Notebook', '<p>Small black notebook</p>', 'en', NULL, NULL),
(4, 2, 'كشكول اسود', '<p>كشكول اسود صغير</p>', 'ar', NULL, NULL),
(5, 3, 'Blue pen', '<p>Blue pen</p>', 'en', NULL, NULL),
(6, 3, 'قلم ازرق', '<p>قلم ازرق</p>', 'ar', NULL, NULL),
(7, 4, 'Google Note', '<p>Small Google note</p>', 'en', NULL, NULL),
(8, 4, 'مفكره جوجل', '<p>مفكره جوجل صغيره</p>', 'ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2021-10-03 11:12:19', '2021-10-03 11:12:19'),
(2, 'admin', 'Admin', 'Admin', '2021-10-03 11:12:22', '2021-10-03 11:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'admin', 'admin@app.com', 'default.png', NULL, '$2y$10$1EBc/ygLfsByIrMiQDZDJuCzoWgINpiOq0rr0g0FJpyAJ3WbJA6Re', NULL, '2021-10-03 11:12:22', '2021-10-03 11:12:22'),
(2, 'Ahmed', 'Shasha', 'ahmed@app.com', 'ddjA6GVBMlIuDIxcimn6rVhDQH19SBdxh9JfbR29.png', NULL, '$2y$10$cvISPmDvM2HnkD96x3jU9Oz5o.js1viVqUdkexOSYSKVlasGO.Jf2', NULL, '2021-10-03 19:52:24', '2021-10-03 19:53:33'),
(3, 'Hossam', 'Dahab', 'hossam@app.com', 'SMLdxxmXfAh6QwFsiB8gTaY34Hpt2U3c4LXXkHRD.png', NULL, '$2y$10$0o8Ee9ICt6AQIqzMvWB6QOO8JKslikTtpyzlQKFEdb1X6x.o2tRs.', NULL, '2021-10-03 19:53:19', '2021-10-03 19:53:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
