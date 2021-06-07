-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 08:41 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `link_url`, `created_at`, `updated_at`) VALUES
(3, 'slide1', 'This is multi-purpose software that can be used for any type of the store.&nbsp;', '1622657403slide-01.jpg', 'http://test', '2021-06-02 12:40:03', '2021-06-02 12:40:03'),
(4, 'slide2', 'This is multi-purpose software that can be used for any type of the store.&nbsp;', '1622657424slide-02.jpg', 'http://test', '2021-06-02 12:40:24', '2021-06-02 12:40:24'),
(5, 'slide3', 'This is multi-purpose software that can be used for any type of the store.&nbsp;', '1622657443slide-03.jpg', 'http://test', '2021-06-02 12:40:43', '2021-06-02 12:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `popularity`, `created_at`, `updated_at`) VALUES
(4, 'Brand 1', 'yy', '1622570885product-04.jpg', 0, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(5, 'Brand 2', 'yy', '1622570885product-04.jpg', 1, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(6, 'Brand 3', 'yy', '1622570885product-04.jpg', 1, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(7, 'Brand 4', 'yy', '1622570885product-04.jpg', 0, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(8, 'Brand 5', 'yy', '1622570885product-04.jpg', 1, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(9, 'Brand 6', 'yy', '1622570885product-04.jpg', 1, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(10, 'Brand 7', 'yy', '1622570885product-04.jpg', 0, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(11, 'Brand 8', 'yy', '1622570885product-04.jpg', 1, '2021-06-01 12:38:05', '2021-06-02 11:57:40'),
(15, 'first', 'd', '1622818515comingsoon-img-01.jpg', 0, '2021-06-04 09:25:15', '2021-06-04 09:25:15'),
(16, 'new brand', 'dd', '1622818564comingsoon-img-01.jpg', 0, '2021-06-04 09:26:04', '2021-06-04 09:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `description`, `in_stock`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'women', '1622654897index10-promo-img-01.jpg', 'dummy2', 1, '2021-06-01 09:40:08', '2021-06-02 11:58:17'),
(2, 'Mens', 'mens', '1622654941index10-promo-img-02.jpg', 'rrr', 1, '2021-06-01 09:40:56', '2021-06-02 11:59:01'),
(4, 'Sports Nutrition', 'sports-nutrition', '1622654970index10-promo-img-03.jpg', 'dd', 1, '2021-06-02 11:59:31', '2021-06-02 12:09:04'),
(5, 'Food & Drink', 'food-drink', '1622655014index10-promo-img-04.jpg', 'dd', 1, '2021-06-02 12:00:14', '2021-06-02 12:09:34'),
(6, 'Health Supplements', 'health-supplements', '1622657792lookbook-03.jpg', 'dd', 1, '2021-06-02 12:46:32', '2021-06-02 12:46:32'),
(7, 'Flash Sales', 'flash-sales', '1622657812lookbook-01.jpg', 'dd', 1, '2021-06-02 12:46:52', '2021-06-02 12:46:52'),
(8, 'Store Under 199', 'store-under-199', '1622657834lookbook-02.jpg', 'dd', 1, '2021-06-02 12:47:14', '2021-06-02 12:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `category_brands`
--

CREATE TABLE `category_brands` (
  `id` bigint(12) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_brands`
--

INSERT INTO `category_brands` (`id`, `brand_id`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 15, 7, '2021-06-04 09:25:15', '2021-06-04 09:25:15'),
(5, 15, 5, '2021-06-04 09:25:15', '2021-06-04 09:25:15'),
(6, 15, 6, '2021-06-04 09:25:15', '2021-06-04 09:25:15'),
(7, 16, 7, '2021-06-04 09:26:04', '2021-06-04 09:26:04'),
(8, 16, 5, '2021-06-04 09:26:04', '2021-06-04 09:26:04'),
(9, 16, 6, '2021-06-04 09:26:04', '2021-06-04 09:26:04'),
(10, 16, 2, '2021-06-04 09:26:04', '2021-06-04 09:26:04'),
(11, 16, 4, '2021-06-04 09:26:04', '2021-06-04 09:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_10_02_162042_create_categories_table', 1),
(4, '2020_10_02_162042_create_sub_categories_table', 1),
(5, '2020_12_02_142435_create_offers_table', 1),
(6, '2020_12_02_142435_create_products_table', 1),
(7, '2020_12_02_162656_create_roles_table', 1),
(8, '2020_12_02_162680_create_users_table', 1),
(9, '2020_12_02_164821_create_banners_table', 1),
(10, '2020_12_02_164821_create_brands_table', 1),
(11, '2020_12_02_165007_create_promo_codes_table', 1),
(12, '2020_12_02_165435_create_product_variants_table', 1),
(13, '2020_12_02_170049_create_orders_table', 1),
(14, '2020_12_02_171416_create_order_items_table', 1),
(15, '2020_12_02_171946_create_track_orders_table', 1),
(16, '2020_12_02_172701_create_favourites_table', 1),
(17, '2020_12_02_172821_create_notifications_table', 1),
(18, '2020_12_02_173516_create_delivery_boys_table', 1),
(19, '2020_12_08_054630_create_users_coupon_table', 1),
(20, '2020_12_10_070244_create_transactions_table', 1),
(21, '2020_12_12_162042_create_wish_list_table', 1),
(22, '2021_05_01_142435_create_product_offers_table', 1),
(23, '2021_05_01_142435_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_seen` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_type` enum('flat','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `image`, `start_date`, `end_date`, `discount_type`, `discount`, `max_discount`, `status`, `created_at`, `updated_at`) VALUES
(8, 'nbvnvnbvb6666666', '1622827982index21-promo-img-02.jpg', '2021-06-02', '2021-06-23', 'flat', 10, 100, 1, '2021-06-01 23:03:28', '2021-06-04 12:03:02'),
(9, 'second offer', '1622828045index21-promo-img-01.jpg', '2021-06-04', '2021-06-11', 'flat', 10, 200, 1, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(10, 'first', '1623005337index06-promo-img-06.jpg', '2021-06-07', '2021-06-07', 'flat', 2, 33, 1, '2021-06-06 13:18:57', '2021-06-06 13:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `actual_price` double(8,2) NOT NULL,
  `final_price` double(8,2) NOT NULL,
  `delivery_charge` double(8,2) NOT NULL,
  `payment_method` enum('cash','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `pincode` int(11) NOT NULL,
  `order_status` enum('booked','shipped','completed','cancelled','returned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('failed','pending','success','cash on delivery') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `status` enum('booked','shipped','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_type` enum('new','top','trend','ordinary') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordinary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `additional_info`, `sku`, `status`, `images`, `sub_category_id`, `brand_id`, `product_type`, `created_at`, `updated_at`) VALUES
(4, 'product 1', 'product-1', 'The best way to avoid confusion is to calculate the average in the controller and send it as a variable, so you don\'t have to manipulate data in the view. You can do it both ways, manually in the view or using the model in the controller.', 'ui', 'dummy text', 1, '1622899673product-06.jpg,1622899673product-06-02.jpg,1622899673product-06-03.jpg,1622899673product-06-04.jpg', 5, 16, 'new', '2021-06-01 22:52:38', '2021-06-05 09:32:58'),
(5, 'product 2', 'product-2', 'kk', 'ui', 'dummy text', 1, '1622901987product-02.jpg,1622901987product-02-02.jpg', 5, 15, 'top', '2021-06-01 22:52:38', '2021-06-05 08:36:32'),
(6, 'product 3', 'product-3', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 5, 4, 'new', '2021-06-01 22:52:38', '2021-06-02 13:16:05'),
(7, 'product 4', 'product-4', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 7, 'top', '2021-06-01 22:52:38', '2021-06-02 13:16:23'),
(8, 'product 5', 'product-5', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 4, 4, 'top', '2021-06-01 22:52:38', '2021-06-02 13:16:27'),
(9, 'product 6', 'product-6', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 5, 9, 'top', '2021-06-01 22:52:38', '2021-06-02 13:16:39'),
(10, 'product 7', 'product-7', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 5, 4, 'top', '2021-06-01 22:52:38', '2021-06-02 13:16:30'),
(11, 'product 8', 'product-8', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 7, 7, 'trend', '2021-06-01 22:52:38', '2021-06-02 13:16:51'),
(12, 'product 9', 'product-9', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 4, 'trend', '2021-06-01 22:52:38', '2021-06-02 13:16:45'),
(13, 'product 10', 'product-10', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 10, 4, 'trend', '2021-06-01 22:52:38', '2021-06-02 13:16:47'),
(14, 'product 11', 'product-11', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 10, 10, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(15, 'product 12', 'product-12', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 9, 7, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(16, 'product 13', 'product-13', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 11, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(17, 'product 14', 'product-14', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 6, 9, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(18, 'product 15', 'product-15', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 7, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(19, 'product 16', 'product-16', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 8, 9, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(20, 'product 17', 'product-17', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 10, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(21, 'product 18', 'product-18', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(22, 'product 19', 'product-19', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 4, 'trend', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(23, 'product 20', 'product-20', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 8, 8, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(24, 'product 21', 'product-21', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 9, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(25, 'product 22', 'product-22', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 7, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(26, 'product 23', 'product-23', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 11, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(27, 'product 24', 'product-24', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 2, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(28, 'product 25', 'product-25', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 9, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(29, 'product 26', 'product-26', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 9, 7, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(30, 'product 27', 'product-27', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 8, 6, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(31, 'product 28', 'product-28', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 4, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(32, 'product 29', 'product-29', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 5, 10, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(33, 'product 30', 'product-30', 'kk', 'ui', 'dummy text', 1, '1622607758product-08.jpg,1622607758product-08-02.jpg,1622607758product-08-03.jpg,1622607758product-08-04.jpg', 7, 4, 'ordinary', '2021-06-01 22:52:38', '2021-06-02 12:37:57'),
(34, 'test product', 'test-product', 'dd', 'dd', 'dd', 1, '1622819422product-01.jpg,1622819422product-01-02.jpg,1622819422product-01-03.jpg,1622819422product-01-04.jpg', 7, 16, 'ordinary', '2021-06-04 09:40:22', '2021-06-04 10:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE `product_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`id`, `offer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 8, 4, '2021-06-04 12:03:02', '2021-06-04 12:03:02'),
(13, 9, 4, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(14, 9, 13, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(15, 9, 14, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(16, 9, 15, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(17, 9, 16, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(18, 9, 24, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(19, 9, 12, '2021-06-04 12:04:05', '2021-06-04 12:04:05'),
(20, 10, 13, '2021-06-06 13:18:57', '2021-06-06 13:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `max_delivery_days` int(11) NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp_price` double(8,2) NOT NULL,
  `selling_price` double(8,2) NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `quantity`, `max_delivery_days`, `variant`, `mrp_price`, `selling_price`, `in_stock`, `created_at`, `updated_at`) VALUES
(17, 20, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(19, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(20, 8, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(21, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(23, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(24, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(25, 28, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(26, 6, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(27, 28, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(28, 8, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(29, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(30, 24, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(31, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(32, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(33, 9, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(34, 26, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(35, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(36, 13, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(37, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(39, 14, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(40, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(41, 26, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(42, 26, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(43, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(44, 30, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(45, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(47, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(48, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(49, 16, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(50, 18, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(51, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(52, 28, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(53, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(55, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(56, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(57, 18, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(58, 9, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(59, 8, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(60, 14, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(61, 9, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(62, 23, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(63, 30, 10, 10, 'green', 800.00, 700.00, 1, NULL, NULL),
(64, 10, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(65, 19, 10, 10, 'gree', 800.00, 700.00, 1, NULL, NULL),
(66, 20, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(68, 34, 22, 2, 'yellow', 150.00, 100.00, 1, NULL, NULL),
(73, 5, 10, 3, 'red', 300.00, 299.00, 1, NULL, NULL),
(77, 4, 10, 3, 'red', 300.00, 199.00, 1, NULL, NULL),
(78, 4, 20, 4, 'green', 500.00, 299.00, 1, NULL, NULL),
(79, 4, 15, 5, 'blue', 1300.00, 1200.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `minimum_order_amount` int(11) DEFAULT NULL,
  `discount_type` enum('flat','discount') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `number_of_usages` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `title`, `start_date`, `end_date`, `minimum_order_amount`, `discount_type`, `discount`, `max_discount`, `number_of_usages`, `status`, `created_at`, `updated_at`) VALUES
(1, 'title', '2021-06-01', '2021-06-04', 120, 'flat', 20, 100, 100, 0, '2021-06-01 09:28:21', '2021-06-01 09:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `description`, `ratings`, `image`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'very good', 'ddd', 4, '1622902724product-41.jpg', 1, 4, '2021-06-05 08:48:45', '2021-06-05 08:48:45'),
(3, 'recommended', 'I know it\'s a bit late but here\'s my way of doing it.\r\nIn Laravel 6+ | 7+ blade (may work on earlier versions also) with Font Awesome 5 and with a base of 5 (five) stars do display:\r\nNote: the $review-&gt;average comes as a float with two decimal points: e.g. 4.70', 5, '1622902806product-21.jpg', 1, 4, '2021-06-05 08:50:06', '2021-06-05 08:50:06'),
(4, 'awesome', '<div><br></div><div>I know it\'s a bit late but here\'s my way of doing it.In Laravel 6+ | 7+ blade (may work on earlier versions also) with Font Awesome 5 and with a base of 5 (five) stars do display:<span>Note: the&nbsp;$review-&gt;average&nbsp;comes as a float with two decimal points: e.g.&nbsp;4.70</span></div>', 4, '1622902843product-32-01.jpg', 1, 4, '2021-06-05 08:50:43', '2021-06-05 08:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'dashboard,products,orders,users,banners,reviews,offers,promos,roles,transactions,delivery-management,brands,categories', '2020-05-12 08:18:38', '2020-12-15 01:06:12'),
(2, 'user', 'home', '2020-12-03 23:26:20', '2020-12-03 23:29:30'),
(3, 'delivery boy', 'orders', '2020-12-03 23:26:20', '2020-12-03 23:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Skin Care', 'skin-care', NULL, 1, '2021-06-01 09:42:11', '2021-06-02 12:04:35'),
(4, 'Hair Care', 'hair-care', NULL, 1, '2021-06-02 12:05:00', '2021-06-02 12:05:00'),
(5, 'Personal Care', 'personal-care', NULL, 7, '2021-06-02 12:05:13', '2021-06-05 07:56:45'),
(6, 'Health Supplements', 'health-supplements', NULL, 1, '2021-06-02 12:05:30', '2021-06-02 12:05:30'),
(7, 'Sports Nutrition', 'sports-nutrition', NULL, 2, '2021-06-02 12:05:44', '2021-06-02 12:05:44'),
(8, 'Grooming Products', 'grooming-products', NULL, 2, '2021-06-02 12:06:00', '2021-06-02 12:06:00'),
(9, 'Skin & Hair Care', 'skin-hair-care', NULL, 2, '2021-06-02 12:06:16', '2021-06-02 12:06:16'),
(10, 'Personal Care', 'personal-care', NULL, 2, '2021-06-02 12:07:13', '2021-06-02 12:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `track_orders`
--

CREATE TABLE `track_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('failed','pending','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `pincode` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `phone`, `city`, `area`, `status`, `pincode`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2020-11-22 15:09:47', '$2y$10$vSb0gPvEHXE1tNbMqdHCSOuBGSo5.RDq2wZmKkW64kpOs1Pognk9i', NULL, 1, '123456789', 'city', 'area', 1, 1111, 'address', '2020-05-12 08:18:38', '2020-10-21 07:04:06'),
(2, 'test', 'test', 'test@gmail.com', NULL, '$2y$10$5WagBKvLBtg9jHKfyqTw0uv/Z8S0hGOZrBnq8Q6BOy9ZZUqBElOkS', NULL, 2, '1234567890', 'test', 'dd', 1, 123, 'dd test 123', '2021-06-01 09:18:00', '2021-06-01 09:19:38'),
(4, 'test', 'test', 'testing@gmail.com', NULL, '$2y$10$4mcowAL7VHBFyEsmP1DNvOCMO8KXV.MA7KrUg6gshEPAwlEDyFS.m', NULL, 2, '43535435', 'est', 'test. teste', 1, 13423, 'test. teste est 13423', '2021-06-05 01:56:11', '2021-06-05 04:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_coupon`
--

CREATE TABLE `users_coupon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promo_code_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_brand_id` (`brand_id`),
  ADD KEY `fk_foreign_category_id` (`category_id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_boys_order_id_foreign` (`order_id`),
  ADD KEY `delivery_boys_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_email_unique` (`email`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_delivery_boy_id_foreign` (`delivery_boy_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_offers_offer_id_foreign` (`offer_id`),
  ADD KEY `product_offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `track_orders`
--
ALTER TABLE `track_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `track_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_coupon`
--
ALTER TABLE `users_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_coupon_user_id_foreign` (`user_id`),
  ADD KEY `users_coupon_promo_code_id_foreign` (`promo_code_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_list_user_id_foreign` (`user_id`),
  ADD KEY `wish_list_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_brands`
--
ALTER TABLE `category_brands`
  MODIFY `id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `track_orders`
--
ALTER TABLE `track_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_coupon`
--
ALTER TABLE `users_coupon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD CONSTRAINT `fk_foreign_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk_foreign_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD CONSTRAINT `delivery_boys_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `delivery_boys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivery_boy_id_foreign` FOREIGN KEY (`delivery_boy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD CONSTRAINT `product_offers_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `track_orders`
--
ALTER TABLE `track_orders`
  ADD CONSTRAINT `track_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_coupon`
--
ALTER TABLE `users_coupon`
  ADD CONSTRAINT `users_coupon_promo_code_id_foreign` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_coupon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_list_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
