-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 04:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 'Samsung', 'samsung', 0, '2023-02-22 19:07:27', '2023-02-22 19:07:27'),
(4, 6, 'Vivo', 'vivo', 0, '2023-02-22 19:07:50', '2023-02-22 19:07:50'),
(5, 6, 'Infinix', 'infinix', 0, '2023-02-22 19:08:03', '2023-02-22 19:08:03'),
(6, 6, 'Realme', 'realme', 1, '2023-02-22 19:08:27', '2023-02-22 19:08:27'),
(7, 6, 'Red Magic', 'red-magic', 0, '2023-02-22 19:10:21', '2023-02-23 22:11:46'),
(13, 6, 'Poco', 'poco', 0, '2023-02-24 11:38:05', '2023-02-24 11:38:05'),
(15, 6, 'Xiaomi', 'xiaomi', 0, '2023-02-24 11:41:34', '2023-02-24 11:41:34'),
(16, 6, 'Redmi', 'redmi', 0, '2023-02-24 11:43:06', '2023-03-06 16:44:21'),
(17, 6, 'Sony', 'sony', 0, '2023-02-24 11:44:41', '2023-03-06 16:44:05'),
(18, 6, 'OPPO', 'oppo', 0, '2023-02-24 11:45:49', '2023-03-09 08:43:27'),
(19, 8, 'Hobbylink', 'hobbylink', 0, '2023-03-06 16:15:16', '2023-03-06 16:32:57'),
(20, 8, 'Hasbro', 'hasbro', 0, '2023-03-06 16:41:25', '2023-03-06 16:41:25'),
(22, 8, 'McFarlane', 'mcfarlane', 0, '2023-03-06 16:42:16', '2023-03-06 16:42:16'),
(23, 10, 'Jeans', 'jeans', 0, '2023-03-09 09:52:06', '2023-03-09 09:52:06'),
(24, 11, 'Jett3', 'jett3', 0, '2023-03-14 21:15:43', '2023-03-14 21:15:43'),
(25, 9, 'Axioo', 'axioo', 0, '2023-03-24 09:23:00', '2023-03-24 09:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `meta_title` varchar(150) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Mobile', 'mobile', 'This is Mobile description.', 'uploads/category/Mobile-1677060023.jpg', 'Mobile', 'mobile, handphone, android, smartphone.', 'This is Mobile description.', 0, '2023-02-22 17:00:23', '2023-02-22 17:00:23'),
(8, 'Action Figure', 'action-figure', 'This is Action Figure of Anime or Character.', 'uploads/category/Action Figure-1679628573.png', 'Action Figure', 'Action Figure', 'This is Action Figure of Anime or Character.', 0, '2023-02-27 19:50:11', '2023-03-24 09:29:33'),
(9, 'Laptop', 'laptop', 'Laptop', 'uploads/category/Laptop-1679628126.png', 'Laptop', 'Laptop', 'Laptop', 0, '2023-03-05 20:04:24', '2023-03-24 09:22:10'),
(10, 'T-Shirt', 't-shirt', 'T-Shirt', 'uploads/category/T-Shirt-1678022291.jpg', 'T-Shirt', 'T-Shirt', 'T-Shirt', 0, '2023-03-05 20:18:11', '2023-03-05 20:18:11'),
(11, 'Women', 'women', 'all women want.', 'uploads/category/Women-1678079256.jpg', 'women', 'all women want.', 'all women want.', 0, '2023-03-06 11:17:01', '2023-03-06 12:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Coral Black', 'text-white black', 0, '2023-03-01 00:16:56', '2023-03-10 12:21:02'),
(4, 'Blue Sky', 'blue-sky', 0, '2023-03-01 00:17:10', '2023-03-01 00:17:10'),
(5, 'Sea Blue', 'sea-blue', 0, '2023-03-01 00:17:53', '2023-03-01 00:17:53'),
(6, 'Black', 'black', 0, '2023-03-01 00:18:09', '2023-03-01 00:18:09'),
(7, 'Blue Ocean', 'purple', 0, '2023-03-01 00:18:42', '2023-03-10 12:10:03'),
(8, 'Purple', 'purple', 0, '2023-03-01 00:19:04', '2023-03-01 00:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_02_19_021046_add_role_as_columnt_to_users_table', 2),
(16, '2023_02_21_032911_create_categories_table', 3),
(18, '2023_02_22_111605_create_brands_table', 4),
(25, '2023_02_25_021830_create_products_table', 5),
(26, '2023_02_25_023228_create_product_images_table', 5),
(27, '2023_02_28_100612_create_colors_table', 6),
(32, '2023_03_01_024428_create_product_colors_table', 7),
(35, '2023_03_03_051806_create_sliders_table', 8),
(37, '2023_03_06_085935_add_category_id_column_to_brands_table', 9),
(38, '2023_03_10_114831_create_whislists_table', 10),
(40, '2023_03_13_032500_create_carts_table', 11),
(41, '2023_03_15_104239_create_orders_table', 12),
(42, '2023_03_15_104712_create_order_items_table', 12),
(44, '2023_03_28_053517_add_featured_column_to_products_table', 13),
(46, '2023_03_28_125938_create_settings_table', 14),
(48, '2023_03_30_080005_create_user_details_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'LaraEcom-MHMBgMwFNS', 'User', 'danykusuma214@gmail.com', '089601468394', '12345', 'Pare Jawa Timur.', 'in progress', 'Cash on Delivery', NULL, '2023-03-23 19:43:34', '2023-03-23 19:43:34'),
(2, 4, 'LaraEcom-HoX2UDtqsl', 'Zachariah Marvin III', 'nikita35@example.org', '067876151819', '23451', 'Tokyo Japan.', 'complete', 'Cash on Delivery', NULL, '2023-03-24 09:35:55', '2023-03-27 11:26:02'),
(3, 1, 'LaraEcom-6fsOPwopIv', 'Khotibul Umam', 'khotibulumam0306@gmail.com', '081215974237', '59356', 'Ds. Tak tahu Rt G Paham Kec. Pati', 'in progress', 'Cash on Delivery', NULL, '2023-04-02 10:51:37', '2023-04-02 10:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 4, 2, 3500000, '2023-03-23 19:43:34', '2023-03-23 19:43:34'),
(2, 1, 18, 8, 3, 3500000, '2023-03-23 19:43:34', '2023-03-23 19:43:34'),
(3, 1, 21, 19, 3, 4000000, '2023-03-23 19:43:35', '2023-03-23 19:43:35'),
(4, 1, 21, 16, 2, 4000000, '2023-03-23 19:43:35', '2023-03-23 19:43:35'),
(5, 1, 15, NULL, 2, 22000000, '2023-03-23 19:43:35', '2023-03-23 19:43:35'),
(6, 2, 23, NULL, 1, 13500000, '2023-03-24 09:35:57', '2023-03-24 09:35:57'),
(7, 2, 24, 21, 1, 5500000, '2023-03-24 09:35:58', '2023-03-24 09:35:58'),
(8, 2, 24, 20, 2, 5500000, '2023-03-24 09:35:59', '2023-03-24 09:35:59'),
(9, 3, 18, 4, 8, 3500000, '2023-04-02 10:51:37', '2023-04-02 10:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not-trending,1=trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not featured,1=featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(12, 8, 'Jassin Dropkick update', 'jassin-dropkick-update', 'Hobbylink', 'This is Jassin Dropkick action figure.', 'This is Jassin Dropkick action figure.', 1000000, 1300000, 4, 0, 0, 0, 'Jassin Dropkick', 'Jassin Dropkick', 'This is Jassin Dropkick action figure.', '2023-02-27 19:56:16', '2023-03-23 10:13:14'),
(15, 6, 'Samsung S23 Ultra', 'samsung-s23-ultra', 'Samsung', 'Samsung S23 Ultra', 'Samsung S23 Ultra', 20000000, 22000000, 5, 1, 0, 0, 'Samsung S23 Ultra', 'Samsung S23 Ultra', 'Samsung S23 Ultra', '2023-03-02 11:19:35', '2023-03-23 19:43:35'),
(18, 6, 'Poco X5 5G', 'poco-x5-5g', 'Poco', 'Poco X5 5G', 'Poco X5 5Ganime', 3400000, 3500000, 20, 1, 0, 0, 'Poco X5 5G', 'Poco X5 5G', 'Poco X5 5G', '2023-03-02 11:33:20', '2023-03-16 09:03:34'),
(19, 10, 'Gawr Gura T-shirt', 'gawr-gura-t-shirt', 'Xiaomi', 'Gawr Gura T-shirt', 'Gawr Gura T-shirt', 500000, 600000, 100, 1, 0, 0, 'Gawr Gura T-shirt', 'Gawr Gura T-shirt', 'Gawr Gura T-shirt', '2023-03-06 11:13:54', '2023-03-28 09:08:00'),
(20, 10, 'Kawai Fuku onna-noko', 'kawai-fuku-onna-noko', 'Jeans', 'Kawai Fuku onna-noko', 'Kawai Fuku onna-noko', 500000, 600000, 50, 1, 0, 0, 'Kawai Fuku onna-noko', 'Kawai Fuku onna-noko', 'Kawai Fuku onna-noko', '2023-03-06 11:28:19', '2023-03-09 09:52:40'),
(21, 6, 'Oppo Reno 8T 4G', 'oppo-reno-8t-4g', 'OPPO', 'Oppo Reno 8T 4G', 'Oppo Reno 8T 4G', 3500000, 4000000, 18, 1, 0, 0, 'Oppo Reno 8T 4G', 'Oppo Reno 8T 4G', 'Oppo Reno 8T 4G', '2023-03-09 08:45:59', '2023-03-14 07:44:20'),
(22, 11, 'Bra', 'bra', 'Jett3', 'Bra size Big', 'Bra size Big or small', 90000, 100000, 10, 1, 0, 0, 'Bra', 'Bra', 'Bra size Big', '2023-03-14 21:18:04', '2023-03-14 21:18:04'),
(23, 9, 'Axioo Pongo 7', 'axioo-pongo-7', 'Axioo', 'Fakta unik laptop gaming lokal Axioo Pongo.', 'Akhirnyaa setelah belasan tahun malang melintang di dunia laptop Indonesia, Axioo kini mulai berani berinovasi diluar ekspektasi para konsumen laptop Indonesia. Dengan mengeluarkan lineup laptop Axioo Pongo, lini laptop gaming yang telah menggunakan GPU RTX 3070 dan sepertinya akan jadi laptop termurah.', 13000000, 13500000, 99, 1, 0, 0, 'Laptop Gaming', 'Laptop', 'Laptop Gaming Axioo Pongo', '2023-03-24 09:26:55', '2023-03-24 09:35:58'),
(24, 8, 'Spy Kyoushitsu codename hananozo.', 'spy-kyoushitsu-codename-hananozo', 'Hobbylink', 'Action Figure Spy Kyoushitsu', 'Action Figure Spy Kyoushitsu kawaii.', 500000, 5500000, 100, 1, 1, 0, 'Action Figure Spy Kyoushitsu', 'Action Figure', 'Action Figure Spy Kyoushitsu kawaii.', '2023-03-24 09:33:17', '2023-03-28 11:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 18, 3, 0, '2023-03-02 11:33:20', '2023-04-02 10:51:37'),
(6, 18, 5, 10, '2023-03-02 11:33:21', '2023-03-16 09:03:32'),
(8, 18, 4, 7, '2023-03-03 12:11:51', '2023-03-23 19:43:35'),
(9, 19, 4, 40, '2023-03-06 11:13:55', '2023-03-06 11:13:55'),
(10, 19, 5, 30, '2023-03-06 11:13:56', '2023-03-06 11:13:56'),
(11, 19, 7, 30, '2023-03-06 11:13:56', '2023-03-06 11:13:56'),
(12, 20, 4, 10, '2023-03-06 11:28:20', '2023-03-06 11:28:20'),
(13, 20, 5, 16, '2023-03-06 11:28:20', '2023-03-23 10:17:29'),
(14, 20, 8, 19, '2023-03-06 11:28:20', '2023-03-23 10:16:34'),
(15, 21, 4, 9, '2023-03-09 08:45:59', '2023-03-14 07:45:37'),
(16, 21, 5, 8, '2023-03-09 08:45:59', '2023-03-23 19:43:35'),
(17, 22, 5, 5, '2023-03-14 21:18:04', '2023-03-14 21:18:04'),
(18, 22, 6, 5, '2023-03-14 21:18:04', '2023-03-14 21:18:04'),
(19, 21, 6, 7, '2023-03-23 19:39:56', '2023-03-23 19:43:35'),
(20, 24, 3, 48, '2023-03-24 09:33:53', '2023-03-24 09:35:59'),
(21, 24, 6, 49, '2023-03-24 09:33:53', '2023-03-24 09:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(11, 12, 'Jassin Dropkick-16775025761.jpg', '2023-02-27 19:56:16', '2023-02-27 19:56:16'),
(12, 12, 'Jassin Dropkick-16775025762.jpg', '2023-02-27 19:56:16', '2023-02-27 19:56:16'),
(13, 12, 'Jassin Dropkick-16775025763.jpg', '2023-02-27 19:56:16', '2023-02-27 19:56:16'),
(18, 12, 'Jassin Dropkick update-16775707971.jpg', '2023-02-28 14:53:17', '2023-02-28 14:53:17'),
(19, 12, 'Jassin Dropkick update-16775707972.jpg', '2023-02-28 14:53:17', '2023-02-28 14:53:17'),
(34, 19, 'Gawr Gura T-shirt-16780760341.jpg', '2023-03-06 11:13:55', '2023-03-06 11:13:55'),
(35, 19, 'Gawr Gura T-shirt-16780760352.jpg', '2023-03-06 11:13:55', '2023-03-06 11:13:55'),
(36, 19, 'Gawr Gura T-shirt-16780760353.jpg', '2023-03-06 11:13:55', '2023-03-06 11:13:55'),
(37, 20, 'Kawai Fuku onna-noko-16780768991.jpg', '2023-03-06 11:28:19', '2023-03-06 11:28:19'),
(38, 20, 'Kawai Fuku onna-noko-16780768992.jpg', '2023-03-06 11:28:19', '2023-03-06 11:28:19'),
(39, 20, 'Kawai Fuku onna-noko-16780768993.jpg', '2023-03-06 11:28:19', '2023-03-06 11:28:19'),
(40, 18, 'Poco X5 5G-16783261221.jpeg', '2023-03-09 08:42:03', '2023-03-09 08:42:03'),
(41, 21, 'Oppo Reno 8T 4G-16783263591.jpg', '2023-03-09 08:45:59', '2023-03-09 08:45:59'),
(42, 15, 'Samsung S23 Ultra-16788068141.jpeg', '2023-03-14 21:13:35', '2023-03-14 21:13:35'),
(43, 23, 'Axioo Pongo 7-16796284161.png', '2023-03-24 09:26:56', '2023-03-24 09:26:56'),
(44, 23, 'Axioo Pongo 7-16796284162.png', '2023-03-24 09:26:56', '2023-03-24 09:26:56'),
(45, 24, 'Spy Kyoushitsu codename hananozo.-16796287981.png', '2023-03-24 09:33:18', '2023-03-24 09:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `page_title` varchar(100) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `address` text NOT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'LaraEcommerce', 'http://127.0.0.1:8000', 'LaraEcommerce', 'LaraEcommerce shopping webbsite', 'Plus-Utra Ecommerce shopping website', '444, some main road, some area, some street, bangalore, india - 560077', '089601468394', '089601468395', 'ichsanadilaksana@gmail.com', 'ichsanadi804@gmail.com', 'https://web.facebook.com/xerr.xerr.52', NULL, 'https://www.instagram.com/ichsan_adi_laksana/', 'https://www.youtube.com/@ichsanadi1186', '2023-03-28 19:42:09', '2023-04-02 08:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The best deals for all product.', 'Change your mind for this moment.', 'uploads/slider/The best deals for all product.-1678111851.jpg', 0, '2023-03-06 21:10:51', '2023-03-06 21:10:51'),
(2, 'Your humanity wannted somethink.', 'Little step can change anywant.', 'uploads/slider/Your humanity wannted somethink.-1678112018.jpg', 0, '2023-03-06 21:13:38', '2023-03-06 21:13:38'),
(3, 'Become a hero for your love.', 'Now or never changed.', 'uploads/slider/Become a hero for your love.-1678112073.jpg', 0, '2023-03-06 21:14:33', '2023-03-06 21:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$bXFX.iIZXXnpciYr5CrHHe9pyHxQurCUkDJfzn2Qw8Povb5N2cfbW', 0, NULL, '2023-02-17 18:00:38', '2023-03-31 16:17:45'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Nn0hpGQWuEid0c6QWN.bLu9PyMlND7PgxeRyeUH4i/Qa2uFcjiSAO', 1, NULL, '2023-02-19 09:34:48', '2023-02-19 09:34:48'),
(3, 'Joe Reichert MD', 'schmeler.muriel@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IAcms62Dsz', '2023-03-11 18:30:25', '2023-03-11 18:30:25'),
(4, 'Zachariah Marvin III', 'nikita35@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '1FVOWLUiSpRIlqsxFMK8nTU7NwBVu8bU3DJuDMZp3IcFWxQuI889xJcgIbtN', '2023-03-11 18:30:25', '2023-03-11 18:30:25'),
(5, 'Mrs. Carmen Heaney PhD', 'scottie.pouros@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'PabKNv7eu1', '2023-03-11 18:30:25', '2023-03-11 18:30:25'),
(6, 'Cassandra Crooks', 'yhills@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'JHYlsfMSND', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(7, 'Nyah Hill', 'icie39@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '4Nc3KsQhkk', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(8, 'Sarai Welch Jr.', 'ftorphy@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '3playXljvE', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(9, 'Prof. Demario Lehner I', 'adams.casimer@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'OtP48GJevx', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(10, 'Julio Lehner', 'halvorson.norberto@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'hHUuLah8X8', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(11, 'Lola Turcotte', 'treva50@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'C3PC00KpmZ', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(12, 'Jovany Rutherford', 'josiane49@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'zxP5zZ1qhp', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(13, 'Tianna Miller', 'larkin.julio@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '7mesUGMVMO', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(14, 'Paige Shields', 'jarod.pagac@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'MhYoWIlaru', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(15, 'Carter McKenzie', 'jayce.kihn@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '4gIyNh3iZ5', '2023-03-11 18:30:26', '2023-03-11 18:30:26'),
(16, 'Miss Mallie Zulauf PhD', 'sipes.serena@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9qUD2gIR1A', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(17, 'Ms. Ariane Krajcik', 'katherine83@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'NXfdBav1M4', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(18, 'Stanford Paucek', 'amante@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'DCGedqzxOd', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(19, 'Prof. Arno Grady', 'merlin.stamm@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'yxWpoTB85h', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(20, 'Odessa Doyle', 'elwin29@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'gElvLMOJaF', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(21, 'Cathrine Bernier', 'jean90@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'knmBjSlaeW', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(22, 'Dr. Omari Langworth I', 'imckenzie@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'cAGGney7LK', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(23, 'Lempi Kiehn', 'vwiza@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'HLyBsmoKt3', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(24, 'Ada Hermann', 'trempel@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'usdSKdmFwT', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(25, 'Laurel Larson', 'jarret13@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '07dC1tuYjD', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(26, 'Margaret Stanton', 'qcorkery@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'BO3CbcmMh9', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(27, 'Blake Lynch', 'gislason.jarod@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'pLh7g9wPVp', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(28, 'Gerda Green', 'dante73@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IFqySl7UC0', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(29, 'Prof. Nicklaus Kuphal III', 'fbailey@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'w0Qpzh68NW', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(30, 'Miss Felicity O\'Hara', 'mueller.oleta@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'fzdF5vuKHR', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(31, 'Ms. Carmella Cassin PhD', 'ogleichner@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '71orE3lhdx', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(32, 'Uriel Ruecker', 'jeremie.herzog@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'X1fEwCu1w9', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(33, 'Pearlie Trantow', 'roob.mariah@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'gCeTqKdn8T', '2023-03-11 18:30:27', '2023-03-11 18:30:27'),
(34, 'Constance Feil', 'constantin.harber@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'GKok1GUuUC', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(35, 'Lucious Funk', 'davis.juana@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'u7cbiGwpwl', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(36, 'Dr. Letitia Shields IV', 'kris.vesta@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'OzfQFMHJwM', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(37, 'Miss Crystal White', 'jhirthe@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'S6Hbq7Sohw', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(38, 'Lukas Waelchi', 'otho.kessler@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'AvFBwNgqQ5', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(39, 'Mrs. Marta Prosacco DDS', 'vrath@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '0RkvVU8GBb', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(40, 'Burdette Price', 'wzboncak@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'tgzMRqnzbw', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(41, 'Velva Lueilwitz', 'dchristiansen@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '07IIrjeTsX', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(42, 'Ms. Juanita Gleason', 'liliane88@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'mS3TYVCWUM', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(43, 'Dr. Hosea Pacocha DVM', 'igoyette@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IFsGfMC94z', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(44, 'Dr. Maybelle Johnston DDS', 'riley.lemke@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'R9nX9sAzk0', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(45, 'Amira Barton', 'dach.stephany@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'fk0inIwgv1', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(46, 'Rodger Kihn', 'feest.mario@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'Pp9UkkJqQ1', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(47, 'Elza Wunsch', 'oreilly.bonnie@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'bxvGs8wAgB', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(48, 'Laura Yost', 'hans01@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'bd2TwtcfkY', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(49, 'Manley Schmidt', 'zpollich@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'fCHqwAXk23', '2023-03-11 18:30:28', '2023-03-11 18:30:28'),
(50, 'Odessa Armstrong', 'ebaumbach@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'ezXz108fsq', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(51, 'Enola Schuster DDS', 'leffler.keyshawn@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'tVcLdmbDto', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(52, 'Monte Ruecker', 'swaniawski.dedrick@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'wdi2CfMEvz', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(53, 'Ms. Libbie Ondricka V', 'bheathcote@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'vSsbKyiuyw', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(54, 'Mr. Chesley Hintz', 'reyes05@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'ZaBOdlD6sb', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(55, 'Alvina Sporer', 'izabella.gutmann@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '8CEFyqK1Fb', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(56, 'Lelia Hessel', 'anne05@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'F4FFYjnWJx', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(57, 'Zella Gleichner', 'hahn.jaylan@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '678CMwokC5', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(58, 'Bert Gleichner', 'twila52@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'gBKKYLXbpz', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(59, 'Amelie Satterfield', 'gladyce85@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'cZ7tpZ0d9p', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(60, 'Jeanie Koepp', 'rubie24@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'STpQqwTPGf', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(61, 'Zula Lemke MD', 'barbara.fahey@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'h6Ez0FiU5X', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(62, 'Mr. Terrill Beier', 'araceli.cole@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'p1FjUFsNTb', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(63, 'Prof. Baron Swift', 'qquigley@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'Ew9tujYVqK', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(64, 'Karlee Wolff', 'myrtis.graham@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'MVzOkwFd1k', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(65, 'Wendy Parker', 'frances.veum@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'VYuVextDNY', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(66, 'Ms. Genesis Watsica PhD', 'suzanne.sanford@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'neN8zwB46a', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(67, 'Camron Metz', 'daniel.rodrigo@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'LzejDvwjLS', '2023-03-11 18:30:29', '2023-03-11 18:30:29'),
(68, 'Virgie Wisozk', 'ohara.damon@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'qyAUW5HLue', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(69, 'Prof. Denis Kirlin', 'dhane@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'VWraplVN0x', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(70, 'Tressa Batz', 'dwindler@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'jDnEHa1pH6', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(71, 'Gage Thiel', 'rashad71@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '6SxZ9S4SXS', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(72, 'Ardella Barton', 'nat.barton@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'c6KrvxiyRf', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(73, 'Mrs. Haylie Bosco', 'reynolds.genoveva@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'OsmUopJamL', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(74, 'Coleman Larkin', 'jennie.bergnaum@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'FKjagTuG7c', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(75, 'Arianna Morissette', 'wanda.powlowski@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'S2BnnKWOHB', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(76, 'Loren Hauck DVM', 'lelah46@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'cPWaIahjHZ', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(77, 'Dr. Jaquan Bosco V', 'maryse62@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'mSAmODamg0', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(78, 'Dudley Wuckert', 'lang.gabriel@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'jRmNfQUE4Q', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(79, 'Esther Gusikowski', 'uwitting@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'TZmQxhF97n', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(80, 'Ivah Kiehn', 'dakota57@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'wTh0DXugZz', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(81, 'Bud Fay III', 'genoveva.hill@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9TkUHI8Uwp', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(82, 'Sylvan Weber', 'johnson.clark@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'bBCxWFYval', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(83, 'Kassandra Abbott', 'brayan.rath@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'eOrdSOr460', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(84, 'Carolina Muller', 'orn.elvis@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'qJiy8QnIMO', '2023-03-11 18:30:30', '2023-03-11 18:30:30'),
(87, 'Miss Flavie Kuphal', 'zoe10@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'c6xrTOIFj8', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(88, 'Miss Myrtie Armstrong DDS', 'pouros.graciela@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'sK6GsuH0kP', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(89, 'Miss Savanah Champlin Sr.', 'eveline.huels@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'TB5LCMAf62', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(90, 'Ms. Shanie Monahan', 'lexus62@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'v5VXcnGejO', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(91, 'Marielle Rowe I', 'mohr.harmony@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'hKExwW7Epk', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(92, 'Ryder Wintheiser', 'ystark@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'aMZJLyqRIC', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(93, 'Jadon Mosciski', 'fmcclure@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'jdaU4TsA8n', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(94, 'Alexandre Reilly', 'mason.schmidt@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'soXtShJu7t', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(95, 'Russ Thompson', 'dena.kutch@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '4D4zWLb2zD', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(96, 'Myrtle Bailey', 'scotty.rath@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'AkMh8mb7xV', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(97, 'Isadore Mertz', 'vhill@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '8FntfvgDHs', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(98, 'Isadore McDermott', 'marvin29@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'pYoAOzlueu', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(99, 'Paolo Kozey Sr.', 'katarina.borer@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'FYG3Md2axB', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(100, 'Cleta Wisoky', 'conroy.cassandre@example.com', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'B0nPFTH4Wc', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(101, 'Ariel Wuckert', 'jaltenwerth@example.net', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'cCuNrdyzKM', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(102, 'Miss Kelsi O\'Keefe DDS', 'hsteuber@example.org', '2023-03-11 18:30:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '8Bfw5mkB7b', '2023-03-11 18:30:31', '2023-03-11 18:30:31'),
(103, 'Gawr chan', 'gawrgura009@gmail.com', NULL, '$2y$10$J.wpP.Jk2bs25WE1Azp6muQbbREKHc4TBs5Z2B.tglmHETcPUEeBW', 1, NULL, '2023-03-29 10:04:40', '2023-03-29 10:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pin_code` varchar(6) NOT NULL,
  `address` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `pin_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '089601468394', '59356', 'some main road, some area, some street, bangalore, india - 560077', '2023-03-30 14:48:16', '2023-03-30 14:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `whislists`
--

CREATE TABLE `whislists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `whislists`
--
ALTER TABLE `whislists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whislists`
--
ALTER TABLE `whislists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
