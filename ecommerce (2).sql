-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 10:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imane Ajroudi', 'ajroudi.im@gmail.com', '2022-01-12 08:42:57', '$2y$10$6EbV.Vbh4USmlT2FiFbq6OgZ3p/o42Ig/Ij6aFSaAXovavVtvbvqK', '1TFxhvGhKEyelZ5N45DiWxcb89VBJiTpWX2gi1asIvLHY6x2bw58nHBfoiR6', '2022-01-12 08:42:58', '2022-01-12 08:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` decimal(8,2) NOT NULL DEFAULT 0.00,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `cat_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cat_parent`, `created_at`, `updated_at`, `image`) VALUES
(1, 'TVs & Audio', 0, NULL, NULL, 'img/img-menu/tv-menu.jpg'),
(2, 'Smart Phones', 0, NULL, NULL, 'img/img-menu/phone-menu.jpg'),
(3, 'Laptop & Desctps', 0, NULL, NULL, 'img/img-menu/laptop-menu.jpg'),
(4, 'Televisions', 1, NULL, NULL, ''),
(5, 'Smart TVs', 4, NULL, NULL, ''),
(6, 'Full HD TVs', 4, NULL, NULL, ''),
(7, 'Large screen TVs', 4, NULL, NULL, ''),
(8, 'Audio/Video', 1, NULL, NULL, ''),
(9, 'Speakers', 8, NULL, NULL, ''),
(10, 'Projectors', 8, NULL, NULL, ''),
(11, 'Headphones with Mics', 8, NULL, NULL, ''),
(12, 'Mobiles', 2, NULL, NULL, ''),
(13, 'Samsung', 12, NULL, NULL, ''),
(14, 'Huawei', 12, NULL, NULL, ''),
(15, 'Infinix', 12, NULL, NULL, ''),
(16, 'Tablets', 2, NULL, NULL, ''),
(17, 'ipads', 16, NULL, NULL, ''),
(18, 'Lenovo', 16, NULL, NULL, ''),
(19, 'Microsoft Surface', 16, NULL, NULL, ''),
(20, 'Laptops', 3, NULL, NULL, ''),
(21, 'Gaming Laptops', 20, NULL, NULL, ''),
(22, 'Business Laptops', 20, NULL, NULL, ''),
(23, 'Thin & light Laptops', 20, NULL, NULL, ''),
(24, 'Brand', 3, NULL, NULL, ''),
(25, 'Dell', 24, NULL, NULL, ''),
(26, 'Acer', 24, NULL, NULL, ''),
(27, 'Apple', 24, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2022_01_05_101226_add_new_column_to_users_table', 2),
(18, '2022_01_06_210904_add_new_column_to_users_table', 3),
(21, '2014_10_12_000000_create_users_table', 4),
(22, '2014_10_12_100000_create_password_resets_table', 4),
(23, '2019_08_19_000000_create_failed_jobs_table', 4),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(25, '2021_12_16_205309_create_categories_table', 4),
(26, '2021_12_16_220041_create_brands_table', 4),
(29, '2022_01_09_125934_create_orders_table', 4),
(30, '2022_01_12_085730_create_admins_table', 4),
(33, '2022_01_14_083407_add_new_column_to_orders_table', 5),
(34, '2022_01_17_132513_add_multiple_column_to_carts', 6),
(36, '2022_01_18_125915_add_new_column_to_categories_table', 7),
(37, '2022_01_18_205821_create_carts_table', 8),
(39, '2021_12_17_111723_create_products_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paid` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `product_name`, `quantity`, `price`, `status`, `created_at`, `updated_at`, `paid`) VALUES
(6, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '1', '2000.00', 'not delivered', '2022-01-18 11:45:02', '2022-01-18 11:45:02', 'not paid'),
(7, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '1', '194.00', 'not delivered', '2022-01-18 11:45:02', '2022-01-18 11:45:02', 'not paid'),
(8, 'soufiane', '045987632', 'centre ville villa hariss', 'Just another product name', '2', '40.00', 'delivered', '2022-01-18 12:18:01', '2022-01-18 20:26:25', ' paid'),
(9, 'soufiane', '045987632', 'centre ville villa hariss', 'Just another product name', '3', '194.00', 'delivered', '2022-01-18 12:18:02', '2022-01-18 20:26:28', 'paid'),
(11, 'soufiane', '045987632', 'centre ville villa hariss', 'Just another product name', '1', '2000.00', 'not delivered', '2022-01-18 12:18:02', '2022-01-18 12:18:02', 'not paid'),
(12, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '4', '600.00', 'not delivered', '2022-01-18 16:09:51', '2022-01-18 16:09:51', 'not paid'),
(13, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '1', '1000.00', 'delivered', '2022-01-18 16:10:26', '2022-01-18 20:06:08', 'not paid'),
(14, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '1', '1200.00', 'not delivered', '2022-01-18 16:10:26', '2022-01-18 16:10:26', 'not paid'),
(15, 'imane', '0123456789', 'elmassira home 1', 'Just another product name', '1', '800.00', 'not delivered', '2022-01-18 16:10:26', '2022-01-18 16:10:26', 'not paid'),
(16, 'dareen', '01254897632', 'villa hariss', 'Just another product name', '1', '40.00', 'not delivered', '2022-01-18 20:05:28', '2022-01-18 20:05:28', 'not paid'),
(17, 'dareen', '01254897632', 'villa hariss', 'Just another product name', '1', '2000.00', 'not delivered', '2022-01-18 20:05:28', '2022-01-18 20:05:28', 'not paid'),
(18, 'basma', '0124578963', 'villa hariss', 'Just another product name', '5', '40.00', 'not delivered', '2022-01-18 20:12:26', '2022-01-18 20:12:26', 'not paid'),
(19, 'basma', '0124578963', 'villa hariss', 'Just another product name', '1', '194.00', 'not delivered', '2022-01-18 20:12:26', '2022-01-18 20:12:26', 'not paid'),
(20, 'basma', '0124578963', 'villa hariss', 'Just another product name', '1', '1000.00', 'not delivered', '2022-01-18 20:12:26', '2022-01-18 20:12:26', 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `cat_name` bigint(20) UNSIGNED NOT NULL,
  `brand_name` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `remise` int(11) NOT NULL DEFAULT 0,
  `from` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `recommended` int(11) NOT NULL DEFAULT 0,
  `reviews` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `cat_name`, `brand_name`, `quantity`, `remise`, `from`, `recommended`, `reviews`, `created_at`, `updated_at`) VALUES
(3, 'Just another product name', '', '', '194.00', 'img/popItems/pop-product3.jpg', 21, 0, 0, 0, 'Morocco', 0, 23, NULL, NULL),
(4, 'Just another product name', '', '', '2000.00', 'img/popItems/pop-product4.jpg', 21, 0, 0, 0, 'Morocco', 1, 27, NULL, NULL),
(5, 'Just another product name', '', '', '100.00', 'img/newItems/new1.jpg', 26, 0, 0, 10, 'Morocco', 1, 7, NULL, NULL),
(6, 'Just another product name', '', '', '8000.00', 'img/newItems/new2.jpg', 23, 0, 0, 0, 'Morocco', 1, 30, NULL, NULL),
(7, 'Just another product name', '', '', '1200.00', 'img/newItems/new3.jpg', 13, 0, 0, 5, 'Morocco', 1, 4, NULL, NULL),
(8, 'Just another product name', '', '', '600.00', 'img/newItems/new4.jpg', 25, 0, 0, 0, 'Morocco', 1, 13, NULL, NULL),
(9, 'Just another product name', '', '', '6000.00', 'img/recoItems/reco1.jpg', 6, 0, 0, 5, 'Morocco', 0, 19, NULL, NULL),
(10, 'Just another product name', '', '', '800.00', 'img/recoItems/reco2.jpg', 14, 0, 0, 5, 'Morocco', 0, 0, NULL, NULL),
(11, 'Just another product name', '', '', '194.00', 'img/recoItems/reco3.jpg', 11, 0, 0, 0, 'Morocco', 0, 0, NULL, NULL),
(12, 'infinix', '', 'infinix  note', '2000.00', 'images/products/1642542349_1630670181-10427769361320d653dad26-67746657.jpg', 15, NULL, 40, 5, '', 0, 0, '2022-01-18 20:45:49', '2022-01-18 20:46:24'),
(13, 'laptop', '', 'laptop thin', '8000.00', 'images/products/1642542635_laptop.jpg', 23, NULL, 16, 3, '', 0, 0, '2022-01-18 20:50:35', '2022-01-18 20:50:35'),
(14, 'phone', '', 'phone pro', '2500.00', 'images/products/1642542696_iphone-13.jpg', 14, NULL, 60, 15, '', 0, 0, '2022-01-18 20:51:18', '2022-01-18 20:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `gender` tinyint(1) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `code`, `active`, `gender`, `address`, `city`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'imane', 'ajroudi', 'soufiane.dareen@gmail.com', NULL, '$2y$10$WrF1XuKjA6jSYlI9lRPdxer3uUUlc2atQBG46TJnu9MioD1Dj7IrW', NULL, 1, NULL, 'elmassira home 1', 'tanger', '0123456789', NULL, '2022-01-18 11:43:30', '2022-01-18 11:43:57'),
(2, 'soufiane', 'moetaz', 'soufiane@gmail.com', NULL, '$2y$10$tRN01yMJ1/sV3CVZQ2.aXuflv9xiQtKHRBxwa76UuFCGmRRLyMT7m', NULL, 1, NULL, 'centre ville villa hariss', 'casablanca', '045987632', NULL, '2022-01-18 12:16:32', '2022-01-18 12:16:44'),
(3, 'dareen', 'moetaz', 'dareen@gmail.com', NULL, '$2y$10$DTo8qv37gF2gG7a6Mi765eQ1U6EK5HNgUuyS5ZepmHIDbFXxcmjrq', NULL, 1, NULL, 'villa hariss', 'tanger', '01254897632', NULL, '2022-01-18 19:10:16', '2022-01-18 19:10:41'),
(4, 'basma', 'el', 'basma@gmail.com', NULL, '$2y$10$fHyPIazOvbxtDE.G0fXqi.9oU9PgMtuyifKYyrYCe3bUryxLDgmpK', NULL, 1, NULL, 'villa hariss', 'tanger', '0124578963', NULL, '2022-01-18 20:11:31', '2022-01-18 20:11:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_name_foreign` (`cat_name`),
  ADD KEY `products_brand_name_foreign` (`brand_name`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_name_foreign` FOREIGN KEY (`brand_name`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_name_foreign` FOREIGN KEY (`cat_name`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
