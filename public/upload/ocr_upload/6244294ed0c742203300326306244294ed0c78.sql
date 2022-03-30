-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 09:31 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo9dtx_onn`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: home, 2: work, 3: other',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `landmark`, `lat`, `lng`, `state`, `city`, `pin`, `country`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'B/19 HN road', 'deshbandhu park', '22.22', '44.44', 'west benagl', 'kolkata', '700067', NULL, 3, 1, '2022-03-02 07:27:39', '2022-03-25 08:17:09'),
(3, 4, '48 Durgeshwari Walks', 'Cumque occaecati aspernatur ut voluptatibus voluptatem nihil natus.', 'null', 'Corporis voluptates culpa repellendus corrupti molestiae sit itaque recusandae voluptatem.', 'Jammu and Kashmir', 'North Devmouth', '111111', NULL, 1, 1, '2022-03-02 07:36:08', '2022-03-25 08:17:09'),
(4, 1, '38737 Shukla Trace', 'Autem corrupti voluptatem dolore autem nihil iusto optio voluptas.', 'null', 'Libero adipisci repellendus et aspernatur qui voluptatem officiis consequuntur.', 'Uttarakhand', 'East Suryaside', '111111', NULL, 1, 1, '2022-03-02 07:36:29', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Onn Admin', 'admin@admin.com', NULL, '$2y$10$.j4o.At9ccvUQxb8aRAoWeg7rN7G4ZMTXE9N.GDtwdBlR1b/6rGLa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_style_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_variation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `offer_price` double(10,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '1',
  `coupon_code_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `ip`, `product_id`, `product_name`, `product_style_no`, `product_image`, `product_slug`, `product_variation_id`, `price`, `offer_price`, `qty`, `coupon_code_id`, `status`, `created_at`, `updated_at`) VALUES
(35, '127.0.0.1', 13, 'ROUND NECK T-SHIRT', '422', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, NULL, 1, '2022-03-24 13:57:21', '2022-03-25 08:17:09'),
(36, '127.0.0.1', 13, 'ROUND NECK T-SHIRT', '422', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, NULL, 1, '2022-03-24 13:57:33', '2022-03-25 08:17:09'),
(37, '127.0.0.1', 13, 'ROUND NECK T-SHIRT', '422', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, NULL, 1, '2022-03-24 13:58:03', '2022-03-25 08:17:09'),
(38, '103.121.157.14', 32, 'PRINTED SWEATSHIRT', '1021', 'https://demo91.co.in/onn-v2/onn/public/uploads/product/product_images/1021/1021-1.jpg', 'printed-sweatshirt', NULL, 799.00, 799.00, 3, NULL, 1, '2022-03-30 11:43:24', '2022-03-30 12:46:38'),
(39, '103.121.157.14', 67, 'RIBBED 2X1 VEST', '323 White', 'https://demo91.co.in/onn-v2/onn/public/uploads/product/polo_tshirt_front.png', 'ribbed-2x1-vest', NULL, 205.00, 205.00, 2, NULL, 1, '2022-03-30 12:37:05', '2022-03-30 12:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sketch_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `position`, `name`, `parent`, `icon_path`, `sketch_icon`, `image_path`, `banner_image`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 0, 'Boxer', 'Innerwear', 'uploads/category/catago_2.png', 'uploads/category/boxer.png', 'uploads/category/onn_relaxz.png', 'uploads/category/2906652429.banner1.jpg', 'boxer', NULL, 1, '2022-03-07 08:57:08', '2022-03-25 08:17:09'),
(5, 0, 'Vest', 'Innerwear', 'uploads/category/catago_3.png', 'uploads/category/005-tank-top.png', 'uploads/category/onn_platina.png', 'uploads/category/2906652429.banner1.jpg', 'vest', NULL, 1, '2022-03-07 08:57:24', '2022-03-25 08:17:09'),
(6, 0, 'Brief', 'Innerwear', 'uploads/category/catago_4.png', 'uploads/category/brief.png', 'uploads/category/onn_innerwear.png', 'uploads/category/2906652429.banner1.jpg', 'brief', NULL, 1, '2022-03-07 08:57:47', '2022-03-25 08:17:09'),
(9, 0, 'T-Shirt', 'Outerwear', 'uploads/category/catago_5.png', 'uploads/category/polo-shirt.png', 'uploads/category/onn_outerwear.png', 'uploads/category/2906652429.banner1.jpg', 't-shirt', NULL, 1, '2022-03-09 13:24:36', '2022-03-25 08:17:09'),
(10, 0, 'Track Pants', 'Outerwear', 'uploads/category/catago_7.png', 'uploads/category/track-pant.png', 'uploads/category/onn_winter-product.png', 'uploads/category/2906652429.banner1.jpg', 'track-pants', NULL, 1, '2022-03-09 13:24:57', '2022-03-25 08:17:09'),
(11, 0, 'Trunk', 'Innerwear', 'uploads/category/catago_9.png', 'uploads/category/trunk.png', 'uploads/category/onn_platina.png', 'uploads/category/2906652429.banner1.jpg', 'trunk', NULL, 1, '2022-03-09 13:25:30', '2022-03-25 08:17:09'),
(12, 0, 'Joggers', 'Outerwear', 'uploads/category/catago_12.png', 'uploads/category/jogger-pants.png', 'uploads/category/onn_thermal.png', 'uploads/category/2906652429.banner1.jpg', 'joggers', 'adsfasd fsaf s d as', 1, '2022-03-10 07:41:50', '2022-03-25 08:17:09'),
(13, 0, 'Half Pants', 'Outerwear', 'uploads/category/catago_13.png', 'uploads/category/half-pant.png', 'uploads/category/onn_innerwear.png', 'uploads/category/2906652429.banner1.jpg', 'half-pants', NULL, 1, '2022-03-10 08:20:37', '2022-03-25 08:17:09'),
(14, 0, 'Socks', 'Footkins', 'uploads/category/catago_8.png', 'uploads/category/001-socks.png', 'uploads/category/onn_footkins.png', 'uploads/category/2906652429.banner1.jpg', 'socks', NULL, 1, '2022-03-10 08:21:20', '2022-03-25 08:17:09'),
(15, 0, 'Thermal', 'WINTER WEAR', 'uploads/category/catago_6.png', 'uploads/category/clothes.png', 'uploads/category/onn_thermal.png', 'uploads/category/2906652429.banner1.jpg', 'thermal', NULL, 1, '2022-03-10 08:21:20', '2022-03-25 08:17:09'),
(16, 0, 'Jackets', 'WINTER WEAR', 'uploads/category/catago_10.png', 'uploads/category/jacket.png', 'uploads/category/onn_winter-product.png', 'uploads/category/2906652429.banner1.jpg', 'jackets', NULL, 1, '2022-03-10 08:21:21', '2022-03-25 08:17:09'),
(17, 0, 'Sweatshirt', 'WINTER WEAR', 'uploads/category/catago_11.png', 'uploads/category/sweatshirt.png', 'uploads/category/onn_winter-product.png', 'uploads/category/2906652429.banner1.jpg', 'sweatshirt', NULL, 1, '2022-03-10 08:21:21', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sketch_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `position`, `name`, `icon_path`, `sketch_icon`, `image_path`, `banner_image`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 'Footkins', 'uploads/collection/range4.png', 'uploads/collection/1648110294.665818788.footkins.png', 'uploads/collection/onn_footkins.png', 'uploads/collection/1646652429.banner1.jpg', 'footkins', NULL, 1, '2022-03-07 09:30:10', '2022-03-25 08:17:09'),
(3, 0, 'Grandde', 'uploads/collection/range3.png', 'uploads/collection/1648110322.1721975126.grandde.png', 'uploads/collection/onn_innerwear.png', 'uploads/collection/1646652429.banner1.jpg', 'grandde', NULL, 1, '2022-03-07 09:30:24', '2022-03-25 08:17:09'),
(4, 0, 'Acttive', 'uploads/collection/range5.png', 'uploads/collection/1648110335.673340868.acttive.png', 'uploads/collection/onn_outerwear.png', 'uploads/collection/1646652429.banner1.jpg', 'acttive', NULL, 1, '2022-03-07 09:30:36', '2022-03-25 08:17:09'),
(6, 0, 'Thermal', 'uploads/collection/range.png', 'uploads/collection/1648110344.1885323119.thermal.png', 'uploads/collection/onn_thermal.png', 'uploads/collection/1646652429.banner1.jpg', 'thermal', NULL, 1, '2022-03-10 07:42:23', '2022-03-25 08:17:09'),
(7, 0, 'Winter Wear', 'uploads/collection/range1.png', 'uploads/collection/1648110354.1286489689.winter-wear.png', 'uploads/collection/onn_winter-product.png', 'uploads/collection/1646652429.banner1.jpg', 'winter-wear', NULL, 1, '2022-03-10 07:52:10', '2022-03-25 08:17:09'),
(8, 0, 'Relaxz', 'uploads/collection/range6.png', 'uploads/collection/1648110364.1549682793.relaxz.png', 'uploads/collection/onn_relaxz.png', 'uploads/collection/1646652429.banner1.jpg', 'relaxz', NULL, 1, '2022-03-10 07:52:26', '2022-03-25 08:17:09'),
(9, 0, 'Platina', 'uploads/collection/range2.png', 'uploads/collection/1648110379.991784936.platina.png', 'uploads/collection/onn_platina.png', 'uploads/collection/1646652429.banner1.jpg', 'platina', NULL, 1, '2022-03-10 07:52:26', '2022-03-25 08:17:09'),
(11, 0, 'Stretchz', 'uploads/collection/1648068223.509795879.range3.png', 'uploads/collection/1648110389.467029930.stretchz.png', 'uploads/collection/1648068223.379099523.stretchz.png', 'uploads/collection/1648068223.2053266682.banner2.jpg', 'stretchz', NULL, 1, '2022-03-24 02:13:43', '2022-03-25 08:17:09'),
(12, 0, 'Sport', 'uploads/collection/1648068876.960883191.onn-men-s-sports-and-gym-vest-500x500.png', 'uploads/collection/1648110397.2106029333.sport.png', 'uploads/collection/1648068723.482089929.onn_sports.png', 'uploads/collection/1648068723.855994381.banner2.png', 'sport', NULL, 1, '2022-03-24 02:22:03', '2022-03-25 08:17:09'),
(13, 0, 'Comfortz', 'uploads/collection/1648068987.1494204055.relaxz.png', 'uploads/collection/1648110406.283624293.comfortz.png', 'uploads/collection/1648068987.810786002.comfortz.png', 'uploads/collection/1648068987.23204190.banner2.jpg', 'comfortz', NULL, 1, '2022-03-24 02:26:27', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#DB2828', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(2, 'Orange', '#F2711C', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(3, 'Yellow', '#FBBD08', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(4, 'Olive', '#B5CC18', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(5, 'Green', '#21BA45', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(6, 'Teal', '#00B5AD', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(7, 'Blue', '#2185D0', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(8, 'Violet', '#6435C9', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(9, 'Purple', '#A333C8', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(10, 'Pink', '#E03997', 1, '2022-03-03 18:50:47', '2022-03-25 08:17:09'),
(11, 'Black Melange', '#000000', 1, '2022-03-20 21:05:41', '2022-03-25 08:17:09'),
(12, 'White', '#FFFFFF', 1, '2022-03-20 21:07:22', '2022-03-25 08:17:09'),
(13, 'Navy', '#000080', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(14, 'Charcoal', '#36454F', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(15, 'Sea Green', '#2e8b57', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(16, 'LT Blue', '#ADD8E6\r\n', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(17, 'Maroon', '#800000', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(18, 'Royal Blue', '#4169e1', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(19, 'Coffee', '#6f4e37', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(20, 'Cool Yellow', '#ECEA98', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(21, 'Goldfish', '#f98332', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(22, 'Baby Pink', '#f4c2c2', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(23, 'Tel', '#008080', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(24, 'Air Force Blue', '#00308F', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(25, 'Mustard', '#FFDB58', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(26, 'Peacock Blue', '#326872', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(27, 'Forest Green', '#228B22', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(28, 'Bottle Green', '#006A4E', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(29, 'Camel', '#c19a6b', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(30, 'Lemon', '#E7C91B', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(31, 'Bright Blue', '#0096FF', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(32, 'Wine', '#FF5733', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(33, 'Aqua', '#00FFFF', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(34, 'Powder Blue', '#B6D0E2', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(35, 'Tangerine', '#F28500', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(36, 'Smoke Green', '#a8bba2', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(37, 'Fluorescent Green', '#39FF14', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(38, 'Peach', '#FFE5B4', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(39, 'Navy Melange', '#282B57', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(40, 'Pea Green', '#52D017', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(41, 'Canary Yellow', '#FFEF00', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(42, 'Sky Blue', '#87CEEB', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(43, 'grass Green', '#7CFC00', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(44, 'Mouse', '#6B6E6B', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(45, 'Sapphire Blue', '#0F52BA', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(46, 'Dusty Pink', '#E1AD9D', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(47, 'Blue Mist', '#dbe5ef', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(48, 'Azure', '#007fff', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(49, 'Ocean Blue', '#2B65EC', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(50, 'Rose Wood', '#65000b', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(51, 'Dark Sapphire', '#082567', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(52, 'Imperial Blue', '#002395', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(53, 'Slate Grey', '#708090', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(54, 'Java Brown', '#50382E', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(55, 'Turquoise Blue', '#30D5C8', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(56, 'Mocha', '#967969', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(57, 'Steel Grey', '#71797E', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(58, 'Melange Grey', '#afafaf', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09'),
(59, 'Lavender', '#E6E6FA', 1, '2022-03-21 22:51:11', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: flat, 2: offer',
  `amount` double(8,2) NOT NULL,
  `max_time_of_use` bigint(20) NOT NULL,
  `max_time_one_can_use` bigint(20) NOT NULL,
  `no_of_usage` bigint(20) NOT NULL DEFAULT '0',
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `coupon_code`, `type`, `amount`, `max_time_of_use`, `max_time_one_can_use`, `no_of_usage`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Buy now & get 30% instant discount', 'ONNIT30', 1, 800.00, 50, 1, 0, '2022-03-25 08:17:09', '2022-03-09 18:30:00', 1, '2022-03-04 05:19:33', '2022-03-25 08:17:09'),
(2, '50% OFF On minimum purchase of Rs. 500', 'FLIPFLOP', 1, 500.00, 30, 1, 4, '2022-03-25 08:17:09', '2022-04-29 18:30:00', 1, '2022-03-22 05:18:37', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code_id` bigint(20) NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,2) NOT NULL,
  `total_checkout_amount` double(10,2) NOT NULL,
  `final_amount` double(10,2) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `usage_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `coupon_code_id`, `coupon_code`, `discount`, `total_checkout_amount`, `final_amount`, `user_id`, `email`, `ip`, `order_id`, `usage_time`, `created_at`, `updated_at`) VALUES
(1, 2, 'FLIPFLOP', 500.00, 3669.00, 3169.00, 0, 'your.email+fakedata44065@gmail.com', '127.0.0.1', 40, '2022-03-25 11:53:15', '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(2, 2, 'FLIPFLOP', 500.00, 3669.00, 3169.00, 0, 'your.email+fakedata34742@gmail.com', '127.0.0.1', 41, '2022-03-25 11:54:32', '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(3, 2, 'FLIPFLOP', 500.00, 2871.00, 2371.00, 0, 'your.email+fakedata23545@gmail.com', '127.0.0.1', 42, '2022-03-25 12:45:50', '2022-03-25 07:15:50', '2022-03-25 08:17:09');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-03-02 08:06:18', '2022-03-25 08:17:09'),
(3, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2022-03-10 06:14:28', '2022-03-25 08:17:09'),
(4, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 1, '2022-03-10 06:15:05', '2022-03-25 08:17:09'),
(5, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2022-03-10 06:15:05', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/gallery/gallery.jpg', 1, '2022-03-16 14:09:31', '2022-03-25 08:17:09'),
(2, 'uploads/gallery/gallery2.jpg', 1, '2022-03-16 14:09:31', '2022-03-25 08:17:09'),
(3, 'uploads/gallery/gallery3.webp', 1, '2022-03-16 14:10:06', '2022-03-25 08:17:09'),
(4, 'uploads/gallery/gallery4.jpg', 1, '2022-03-16 14:10:06', '2022-03-25 08:17:09'),
(5, 'uploads/gallery/gallery5.png', 1, '2022-03-16 14:10:19', '2022-03-25 08:17:09'),
(6, 'uploads/gallery/gallery6.jpg', 1, '2022-03-16 14:10:19', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `mail_logs`
--

CREATE TABLE `mail_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blade_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_logs`
--

INSERT INTO `mail_logs` (`id`, `from`, `to`, `subject`, `blade_file`, `payload`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"1212\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 10:31:35', '2022-03-25 08:17:09'),
(2, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"123456\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 10:38:49', '2022-03-25 08:17:09'),
(6, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"1111\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 11:41:41', '2022-03-25 08:17:09'),
(7, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"1111\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 11:45:02', '2022-03-25 08:17:09'),
(8, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"1111\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 11:55:07', '2022-03-25 08:17:09'),
(9, 'onenesstechsolution@gmail.com', 'arpanc314@gmail.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"arpanc314@gmail.com\",\"password\":\"4444\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 11:56:33', '2022-03-25 08:17:09'),
(10, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"1111\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 12:04:35', '2022-03-25 08:17:09'),
(11, 'onenesstechsolution@gmail.com', 'suvajit.oneness@gmail.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.oneness@gmail.com\",\"password\":\"123456\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 12:11:34', '2022-03-25 08:17:09'),
(12, 'onenesstechsolution@gmail.com', 'suvajit.oneness@gmail.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.oneness@gmail.com\",\"password\":\"1111\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 12:14:04', '2022-03-25 08:17:09'),
(13, 'onenesstechsolution@gmail.com', 'suvajit.oneness@gmail.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.oneness@gmail.com\",\"password\":\"sdfsdfsdfd\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 12:33:10', '2022-03-25 08:17:09'),
(14, 'onenesstechsolution@gmail.com', 'mail@Mail.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"suvajit bardhan\",\"subject\":\"Onn - New registration\",\"email\":\"mail@Mail.com\",\"password\":\"123456\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-11 13:44:53', '2022-03-25 08:17:09'),
(15, 'onenesstechsolution@gmail.com', 'test@test2.com', 'Onn - New registration', 'front/mail/register', '{\"name\":\"suvajit bardhan\",\"subject\":\"Onn - New registration\",\"email\":\"test@test2.com\",\"password\":\"test@test2.com\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-16 13:30:04', '2022-03-25 08:17:09'),
(16, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit Guha\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"orderNo\":\"ONN2086027772\",\"orderAmount\":6000,\"orderProducts\":[{\"order_id\":25,\"product_id\":7,\"product_name\":\"LOW SHOW SOCKS\",\"product_image\":\"http:\\/\\/localhost:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"low-show-socks\",\"product_variation_id\":null,\"price\":90,\"offer_price\":90,\"qty\":4},{\"order_id\":25,\"product_id\":125,\"product_name\":\"FULL SLEEVES V\\/NECK\",\"product_image\":\"http:\\/\\/localhost:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"full-sleeves-v-neck\",\"product_variation_id\":null,\"price\":610,\"offer_price\":610,\"qty\":7},{\"order_id\":25,\"product_id\":17,\"product_name\":\"FINE VEST\",\"product_image\":\"http:\\/\\/localhost:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"fine-vest-2\",\"product_variation_id\":null,\"price\":280,\"offer_price\":280,\"qty\":3},{\"order_id\":25,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"1\",\"price\":530,\"offer_price\":530,\"qty\":1}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-22 08:53:20', '2022-03-25 08:17:09'),
(17, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit Guha\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"orderNo\":\"ONN557402884\",\"orderAmount\":1060,\"orderProducts\":[{\"order_id\":26,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"7\",\"price\":530,\"offer_price\":530,\"qty\":2}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-22 09:04:28', '2022-03-25 08:17:09'),
(25, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit bardhan\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"orderNo\":\"ONN1687431651\",\"orderAmount\":1060,\"orderProducts\":[{\"order_id\":34,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"7\",\"price\":530,\"offer_price\":530,\"qty\":2}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-22 11:35:08', '2022-03-25 08:17:09'),
(26, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"Suvajit Bardhan\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"password\":\"suvajit.bardhan@onenesstechs.in\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-22 11:38:58', '2022-03-25 08:17:09'),
(27, 'onenesstechsolution@gmail.com', 'suvajit.bardhan2@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"test user\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan2@onenesstechs.in\",\"password\":\"secret\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-23 07:50:31', '2022-03-25 08:17:09'),
(28, 'onenesstechsolution@gmail.com', 'suvajit.bardhan2@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"test user\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan2@onenesstechs.in\",\"password\":\"secret\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-23 07:52:25', '2022-03-25 08:17:09'),
(29, 'onenesstechsolution@gmail.com', 'suvajit.bardhan2@onenesstechs.in', 'Onn - New registration', 'front/mail/register', '{\"name\":\"test user\",\"subject\":\"Onn - New registration\",\"email\":\"suvajit.bardhan2@onenesstechs.in\",\"password\":\"secret\",\"blade_file\":\"front\\/mail\\/register\"}', NULL, '2022-03-23 07:55:11', '2022-03-25 08:17:09'),
(30, 'onenesstechsolution@gmail.com', 'suvajit.bardhan2@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"test user\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan2@onenesstechs.in\",\"orderNo\":\"ONN1568407002\",\"orderAmount\":5529,\"orderProducts\":[{\"order_id\":35,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":null,\"price\":399,\"offer_price\":399,\"qty\":3},{\"order_id\":35,\"product_id\":79,\"product_name\":\"FASHION BRIEF O\\/E\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\262\\\\ONN-Grande-262-1.jpg\",\"product_slug\":\"fashion-brief-o-e\",\"product_variation_id\":null,\"price\":175,\"offer_price\":175,\"qty\":5},{\"order_id\":35,\"product_id\":32,\"product_name\":\"PRINTED SWEATSHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/product_images\\/1021\\/1021-1.jpg\",\"product_slug\":\"printed-sweatshirt\",\"product_variation_id\":null,\"price\":799,\"offer_price\":799,\"qty\":3},{\"order_id\":35,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"3\",\"price\":530,\"offer_price\":530,\"qty\":2}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(31, 'onenesstechsolution@gmail.com', 'suvajit.bardhan2@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"test user\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan2@onenesstechs.in\",\"orderNo\":\"ONN1986548744\",\"orderAmount\":4400,\"orderProducts\":[{\"order_id\":36,\"product_id\":125,\"product_name\":\"FULL SLEEVES V\\/NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"full-sleeves-v-neck\",\"product_variation_id\":null,\"price\":610,\"offer_price\":610,\"qty\":2},{\"order_id\":36,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"5\",\"price\":530,\"offer_price\":530,\"qty\":4},{\"order_id\":36,\"product_id\":38,\"product_name\":\"HALF SLEEVE R\\/ NECK\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/product\\/polo_tshirt_front.png\",\"product_slug\":\"half-sleeve-r-neck\",\"product_variation_id\":\"6\",\"price\":530,\"offer_price\":530,\"qty\":2}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-23 14:43:27', '2022-03-25 08:17:09'),
(32, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit Bardhan\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"orderNo\":\"ONN1731083780\",\"orderAmount\":1622,\"orderProducts\":[{\"order_id\":37,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"17\",\"price\":399,\"offer_price\":399,\"qty\":3},{\"order_id\":37,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"24\",\"price\":425,\"offer_price\":425,\"qty\":1}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-24 13:53:14', '2022-03-25 08:17:09'),
(33, 'onenesstechsolution@gmail.com', 'bardhan@user.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit Bardhan\",\"subject\":\"Onn - New order\",\"email\":\"bardhan@user.com\",\"orderNo\":\"ONN2126371347\",\"orderAmount\":3669,\"orderProducts\":[{\"order_id\":38,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":38,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":38,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":5}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-24 14:05:40', '2022-03-25 08:17:09'),
(34, 'onenesstechsolution@gmail.com', 'suvajit.bardhan@onenesstechs.in', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Suvajit Bardhan\",\"subject\":\"Onn - New order\",\"email\":\"suvajit.bardhan@onenesstechs.in\",\"orderNo\":\"ONN272894762\",\"orderAmount\":3669,\"orderProducts\":[{\"order_id\":39,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":39,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":39,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":5}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 05:52:51', '2022-03-25 08:17:09'),
(35, 'onenesstechsolution@gmail.com', 'your.email+fakedata44065@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Sarla Varrier\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata44065@gmail.com\",\"orderNo\":\"ONN1097170116\",\"orderAmount\":3669,\"orderProducts\":[{\"order_id\":40,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":40,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":40,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":5}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(36, 'onenesstechsolution@gmail.com', 'your.email+fakedata34742@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Atreyi Nehru\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata34742@gmail.com\",\"orderNo\":\"ONN1495017718\",\"orderAmount\":3669,\"orderProducts\":[{\"order_id\":41,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":41,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":41,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":5}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(37, 'onenesstechsolution@gmail.com', 'your.email+fakedata23545@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Rukmin Varman\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata23545@gmail.com\",\"orderNo\":\"ONN1929079053\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":42,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":42,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":42,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:15:50', '2022-03-25 08:17:09'),
(38, 'onenesstechsolution@gmail.com', 'your.email+fakedata16501@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Kalyani Mahajan\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata16501@gmail.com\",\"orderNo\":\"ONN904550126\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":43,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":43,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":43,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:20:08', '2022-03-25 08:17:09'),
(39, 'onenesstechsolution@gmail.com', 'your.email+fakedata31683@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Aatreya Bharadwaj\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata31683@gmail.com\",\"orderNo\":\"ONN549247929\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":44,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":44,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":44,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:20:33', '2022-03-25 08:17:09'),
(40, 'onenesstechsolution@gmail.com', 'your.email+fakedata45947@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Jai Pilla\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata45947@gmail.com\",\"orderNo\":\"ONN1716375495\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":45,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":45,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":45,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:49:35', '2022-03-25 08:17:09'),
(41, 'onenesstechsolution@gmail.com', 'your.email+fakedata94337@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Deenabandhu Bhattathiri\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata94337@gmail.com\",\"orderNo\":\"ONN111264837\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":46,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":46,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":46,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:50:17', '2022-03-25 08:17:09'),
(42, 'onenesstechsolution@gmail.com', 'your.email+fakedata75409@gmail.com', 'Onn - New order', 'front/mail/order-confirm', '{\"name\":\"Dhatri Dwivedi\",\"subject\":\"Onn - New order\",\"email\":\"your.email+fakedata75409@gmail.com\",\"orderNo\":\"ONN280091922\",\"orderAmount\":2871,\"orderProducts\":[{\"order_id\":47,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"95\",\"price\":425,\"offer_price\":425,\"qty\":3},{\"order_id\":47,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"83\",\"price\":399,\"offer_price\":399,\"qty\":1},{\"order_id\":47,\"product_id\":13,\"product_name\":\"ROUND NECK T-SHIRT\",\"product_image\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\\\product\\\\product_images\\\\422\\\\422-1.jpg\",\"product_slug\":\"round-neck-t-shirt\",\"product_variation_id\":\"74\",\"price\":399,\"offer_price\":399,\"qty\":3}],\"blade_file\":\"front\\/mail\\/order-confirm\"}', NULL, '2022-03-25 07:51:03', '2022-03-25 08:17:09');

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
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2022_02_28_100529_create_categories_table', 1),
(18, '2022_03_01_060945_create_admins_table', 1),
(19, '2022_03_01_113157_create_sub_categories_table', 1),
(20, '2022_03_01_113259_create_collections_table', 1),
(21, '2022_03_01_131758_create_coupons_table', 1),
(24, '2022_03_02_075005_create_products_table', 2),
(25, '2022_03_02_120938_create_addresses_table', 3),
(26, '2022_03_02_132406_create_faqs_table', 4),
(27, '2022_03_02_134321_create_settings_table', 5),
(28, '2022_03_02_140807_create_product_images_table', 6),
(49, '2022_03_03_084615_create_product_colors_table', 7),
(50, '2022_03_03_084729_create_product_color_sizes_table', 7),
(51, '2022_03_03_085246_create_colors_table', 7),
(52, '2022_03_03_112136_create_sizes_table', 7),
(53, '2022_03_04_080922_create_orders_table', 8),
(54, '2022_03_04_080937_create_transactions_table', 8),
(55, '2022_03_04_081901_create_order_products_table', 8),
(56, '2022_03_04_082329_create_carts_table', 8),
(58, '2022_03_07_151020_add_banner_image_to_categories_table', 9),
(59, '2022_03_07_163254_add_banner_image_to_collections_table', 10),
(60, '2022_03_08_114708_add_column_to_carts_table', 11),
(66, '2022_03_08_154736_add_columns_to_orders_table', 12),
(67, '2022_03_09_121714_add_columns_to_addresses_table', 13),
(69, '2022_03_09_173649_create_subscription_mails_table', 14),
(70, '2022_03_10_124914_add_columns_to_categories_and_collections_table', 15),
(72, '2022_03_11_152029_create_mail_logs_table', 16),
(74, '2022_03_16_115151_add_new_columns_to_categories_and_collections_table', 17),
(75, '2022_03_16_193141_create_galleries_table', 18),
(76, '2022_03_16_193356_create_wishlists_table', 18),
(77, '2022_03_17_114435_add_new_column_to_galleries_table', 19),
(79, '2022_03_21_171424_add_columns_to_products_table', 20),
(82, '2022_03_22_165852_add_new_column_to_transactions_table', 21),
(83, '2022_03_23_181303_add_new_column_to_carts_table', 22),
(84, '2022_03_24_121204_add_more_columns_to_categories_and_collections_table', 23),
(85, '2022_03_24_195535_create_coupon_usages_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_id` bigint(20) NOT NULL DEFAULT '0',
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingSameAsBilling` tinyint(4) NOT NULL DEFAULT '0',
  `shipping_address_id` bigint(20) NOT NULL DEFAULT '0',
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `shipping_charges` double(10,2) NOT NULL DEFAULT '0.00',
  `shipping_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `tax_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `discount_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `coupon_code_id` bigint(20) NOT NULL DEFAULT '0',
  `final_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `gst_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `is_paid` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: paid, 0: not paid',
  `txn_id` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: new, 2: confirmed, 3: shipped, 4: delivered, 5: cancelled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `ip`, `user_id`, `fname`, `lname`, `email`, `mobile`, `alt_mobile`, `billing_address_id`, `billing_address`, `billing_landmark`, `billing_country`, `billing_state`, `billing_city`, `billing_pin`, `shippingSameAsBilling`, `shipping_address_id`, `shipping_address`, `shipping_landmark`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_pin`, `amount`, `shipping_charges`, `shipping_method`, `tax_amount`, `discount_amount`, `coupon_code_id`, `final_amount`, `gst_no`, `payment_method`, `is_paid`, `txn_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '', 1, 'John', 'Doe', 'user@user.com', '9876543210', NULL, 0, 'B/19 HN road', 'Deshbandhu school', 'India', 'West Bengal', 'Kolkata', '700067', 0, 0, 'B/19 HN road', 'Deshbandhu SChool', 'India', 'West Bengal', 'Kolkata', '700067', 2250.00, 0.00, 'standard', 150.00, 100.00, 0, 2300.00, NULL, 'cash_on_delivery', 0, 0, 2, '2022-03-04 09:45:16', '2022-03-25 08:17:09'),
(2, '', '', 2, 'Suvajit', 'Bardhan', 'email@email.com', '9876543210', NULL, 0, '22 AJC bose Road', 'opposite SK Park', 'India', 'West bengal', 'Kolkata', '700000', 0, 0, '22 AJC bose Road', 'opposite SK Park', 'India', 'West bengal', 'Kolkata', '700000', 2200.00, 0.00, 'standard', 100.00, 0.00, 0, 2300.00, NULL, 'cash_on_delivery', 0, 0, 2, '2022-03-04 14:27:20', '2022-03-25 08:17:09'),
(3, '', '', 1, 'Lisa', 'Kudrow', 'lisa@email.com', '9876543210', NULL, 0, '22 AJC bose Road', 'opposite SK Park', 'India', 'West bengal', 'Kolkata', '700000', 0, 0, '22 AJC bose Road', 'opposite SK Park', 'India', 'West bengal', 'Kolkata', '700000', 2200.00, 0.00, 'standard', 100.00, 0.00, 0, 2300.00, NULL, 'cash_on_delivery', 0, 0, 3, '2022-03-04 14:32:14', '2022-03-25 08:17:09'),
(16, 'ONN3199075', '127.0.0.1', 0, 'Archan', 'Rana', 'your.email+fakedata96849@gmail.com', '528-815-4415', NULL, 0, '44320 Sethi Expressway', 'Odio non distinctio ullam perspiciatis sint et et doloremque.', 'Swaziland', 'Maharashtra', 'North Ujjawal', '501 614', 0, 0, '672 Pilla Viaduct', 'Natus et voluptate officia optio et inventore nulla autem illum.', 'Saint Martin', 'Dadar and Nagar Haveli', 'East Aayushmanmouth', '509 552', 5750.00, 0.00, 'standard_cod', 0.00, 0.00, 0, 5750.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-08 11:44:58', '2022-03-25 08:17:09'),
(17, 'ONN1223462674', '127.0.0.1', 0, 'Archan', 'Rana', 'your.email+fakedata96849@gmail.com', '528-815-4415', NULL, 0, '44320 Sethi Expressway', 'Odio non distinctio ullam perspiciatis sint et et doloremque.', 'Swaziland', 'Maharashtra', 'North Ujjawal', '501 614', 0, 0, '672 Pilla Viaduct', 'Natus et voluptate officia optio et inventore nulla autem illum.', 'Saint Martin', 'Dadar and Nagar Haveli', 'East Aayushmanmouth', '509 552', 5750.00, 0.00, 'standard_cod', 0.00, 0.00, 0, 5750.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-08 11:45:50', '2022-03-25 08:17:09'),
(18, 'ONN646527371', '127.0.0.1', 0, 'Archan', 'Rana', 'your.email+fakedata96849@gmail.com', '528-815-4415', NULL, 0, '44320 Sethi Expressway', 'Odio non distinctio ullam perspiciatis sint et et doloremque.', 'Swaziland', 'Maharashtra', 'North Ujjawal', '501 614', 0, 0, '672 Pilla Viaduct', 'Natus et voluptate officia optio et inventore nulla autem illum.', 'Saint Martin', 'Dadar and Nagar Haveli', 'East Aayushmanmouth', '509 552', 5750.00, 0.00, 'standard_cod', 0.00, 0.00, 0, 5750.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-08 11:46:01', '2022-03-25 08:17:09'),
(19, 'ONN839345327', '127.0.0.1', 0, 'Nanda', 'Gandhi', 'your.email+fakedata68305@gmail.com', '838-634-4897', NULL, 0, '5471 Rakesh Stream', 'Expedita cumque omnis id.', 'Sao Tome and Principe', 'Arunachal Pradesh', 'Rameshstad', '977 707', 0, 0, '1522 Varrier Summit', 'Aliquid itaque ea debitis.', 'Burkina Faso', 'Chhattisgarh', 'Ekalavyaton', '805 437', 5750.00, 0.00, 'standard', 0.00, 0.00, 0, 5750.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-08 11:48:25', '2022-03-25 08:17:09'),
(20, 'ONN1071601917', '127.0.0.1', 4, 'Devasree', 'Dutta', 'test@test.com', '9876543222', NULL, 0, '663 Aadi Ports', 'Libero quidem voluptatem eos perspiciatis aut.', 'Maldives', 'Bihar', 'Port Suryakanta', '500846', 1, 0, '84142 Ahluwalia Highway', 'Dolor totam praesentium molestiae beatae.', 'Bouvet Island (Bouvetoya)', 'Mizoram', 'Sheelatown', '983816', 9200.00, 0.00, 'standard', 0.00, 0.00, 0, 9200.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-09 10:03:20', '2022-03-25 08:17:09'),
(21, 'ONN1835520099', '127.0.0.1', 0, 'Gajaadhar', 'Khatri', 'your.email+fakedata41324@gmail.com', '9163481013', NULL, 0, '730 Butt Green', 'Et pariatur itaque recusandae quibusdam.', 'Niger', 'Uttarakhand', 'Pillaberg', '992305', 1, 0, '706 Purushottam Plains', 'Ex nam est fugiat assumenda quia aliquam totam.', 'Kiribati', 'Andaman and Nicobar Islands', 'North Kartik', '837856', 9200.00, 0.00, 'standard', 0.00, 0.00, 0, 9200.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-09 10:03:56', '2022-03-25 08:17:09'),
(22, 'ONN867946924', '127.0.0.1', 4, 'Devasree', 'Dutta', 'test@test.com', '9876543222', NULL, 0, '324 Lalita Junctions', 'Est nulla tempore in quis nam maiores et repellendus non.', 'Bouvet Island (Bouvetoya)', 'Bihar', 'Anuraagmouth', '295371', 1, 0, '345 Bhattathiri Mountain', 'Molestias enim quia.', 'Gambia', 'Sikkim', 'West Aruntown', '357770', 9200.00, 0.00, 'standard', 0.00, 0.00, 0, 9200.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-09 10:05:43', '2022-03-25 08:17:09'),
(23, 'ONN609971813', '127.0.0.1', 4, 'Devasree', 'Dutta', 'test@test.com', '9876543222', NULL, 0, '69792 Mukesh Stravenue', 'Asperiores dolorem voluptatem.', 'Bouvet Island (Bouvetoya)', 'Andra Pradesh', 'Namboothiriland', '737617', 0, 0, '129 Shwet Pines', 'Maxime voluptatum at quos quo quam voluptates corrupti quam et.', 'Azerbaijan', 'Assam', 'Lake Chandranathberg', '356265', 1725.00, 0.00, 'standard', 0.00, 0.00, 0, 1725.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-09 11:28:43', '2022-03-25 08:17:09'),
(24, 'ONN697270508', '127.0.0.1', 4, 'Devasree', 'Dutta', 'test@test2.com', '9876543222', NULL, 0, '48 Durgeshwari Walks', 'Cumque occaecati aspernatur ut voluptatibus voluptatem nihil natus.,', 'india', 'Jammu and Kashmir', 'North Devmouth', '111111', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4600.00, 0.00, 'standard', 0.00, 0.00, 0, 4600.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-10 05:47:38', '2022-03-25 08:17:09'),
(26, 'ONN557402884', '127.0.0.1', 0, 'Suvajit', 'Guha', 'suvajit.bardhan@onenesstechs.in', '9038775709', NULL, 0, 'B/19 HN road', 'Deshbanhdu school', 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1060.00, 0.00, 'standard', 0.00, 0.00, 0, 1060.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-22 09:04:28', '2022-03-25 08:17:09'),
(34, 'ONN1687431651', '127.0.0.1', 0, 'Suvajit', 'bardhan', 'suvajit.bardhan@onenesstechs.in', '9038775709', NULL, 0, 'B/19 HN road', 'Deshbanhdu school', 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1060.00, 0.00, 'standard', 0.00, 0.00, 0, 1060.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-22 11:35:08', '2022-03-25 08:17:09'),
(35, 'ONN1568407002', '127.0.0.1', 26, 'test', 'user', 'suvajit.bardhan2@onenesstechs.in', '9038775707', NULL, 0, 'B/19 HN road', 'Deshbanhdu school', 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5529.00, 0.00, 'standard', 0.00, 0.00, 0, 5529.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(36, 'ONN1986548744', '127.0.0.1', 26, 'test', 'user', 'suvajit.bardhan2@onenesstechs.in', '9038775707', NULL, 0, 'B/19 HN road', NULL, 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4400.00, 0.00, 'standard', 0.00, 0.00, 0, 4400.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-23 14:43:27', '2022-03-25 08:17:09'),
(37, 'ONN1731083780', '127.0.0.1', 0, 'Suvajit', 'Bardhan', 'suvajit.bardhan@onenesstechs.in', '9038775709', NULL, 0, 'B/19 HN road', 'Deshbanhdu school', 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1622.00, 0.00, 'standard', 0.00, 0.00, 2, 1622.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-24 13:53:14', '2022-03-25 08:17:09'),
(38, 'ONN2126371347', '127.0.0.1', 0, 'Suvajit', 'Bardhan', 'bardhan@user.com', '9876543210', NULL, 0, '177 Anjali Mall', 'Deshbanhdu school', 'Central African Republic', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3669.00, 0.00, 'standard', 0.00, 500.00, 2, 3169.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-24 14:05:40', '2022-03-25 08:17:09'),
(39, 'ONN272894762', '127.0.0.1', 0, 'Suvajit', 'Bardhan', 'suvajit.bardhan@onenesstechs.in', '9876543210', NULL, 0, 'B/19 HN road', 'Deshbanhdu school', 'India', 'West Bengal', 'Kolkata', '700067', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3669.00, 0.00, 'standard', 0.00, 500.00, 2, 3169.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 05:52:51', '2022-03-25 08:17:09'),
(40, 'ONN1097170116', '127.0.0.1', 0, 'Sarla', 'Varrier', 'your.email+fakedata44065@gmail.com', '9876543210', NULL, 0, '6 Tarun Well', 'Ut voluptatem eaque aperiam non cupiditate totam.', 'Cuba', 'Bihar', 'East Chapal', '133194', 0, 0, '6 Tarun Well', 'Ut voluptatem eaque aperiam non cupiditate totam.', 'Cuba', 'Bihar', 'East Chapal', '133194', 3669.00, 0.00, 'express', 0.00, 0.00, 2, 3669.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(41, 'ONN1495017718', '127.0.0.1', 0, 'Atreyi', 'Nehru', 'your.email+fakedata34742@gmail.com', '9038775709', NULL, 0, '5284 Gangesh Tunnel', 'Aut eligendi temporibus et qui amet animi inventore illo laboriosam.', 'South Africa', 'Bihar', 'Indirastad', '561077', 0, 0, '5284 Gangesh Tunnel', 'Aut eligendi temporibus et qui amet animi inventore illo laboriosam.', 'South Africa', 'Bihar', 'Indirastad', '561077', 3669.00, 0.00, 'express', 0.00, 0.00, 2, 3669.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(42, 'ONN1929079053', '127.0.0.1', 0, 'Rukmin', 'Varman', 'your.email+fakedata23545@gmail.com', '9876543210', NULL, 0, '466 Abbott Lodge', 'Pariatur ut rerum pariatur deserunt est quia repellat et illum.', 'Canada', 'Manipur', 'Indraborough', '148108', 0, 0, '466 Abbott Lodge', 'Pariatur ut rerum pariatur deserunt est quia repellat et illum.', 'Canada', 'Manipur', 'Indraborough', '148108', 2871.00, 0.00, 'standard', 0.00, 0.00, 2, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:15:50', '2022-03-25 08:17:09'),
(43, 'ONN904550126', '127.0.0.1', 0, 'Kalyani', 'Mahajan', 'your.email+fakedata16501@gmail.com', '9876543210', NULL, 0, '3874 Chopra Tunnel', 'Ad atque magni non debitis.', 'Honduras', 'Odisha', 'West Chetanaanandfort', '783620', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2871.00, 0.00, 'standard', 0.00, 0.00, 0, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:20:08', '2022-03-25 08:17:09'),
(44, 'ONN549247929', '127.0.0.1', 0, 'Aatreya', 'Bharadwaj', 'your.email+fakedata31683@gmail.com', '9876543210', NULL, 0, '75768 Anila Roads', 'Est necessitatibus consequuntur optio error minima.', 'Swaziland', 'Daman and Diu', 'East Nirbhay', '327361', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2871.00, 0.00, 'express', 0.00, 0.00, 0, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:20:33', '2022-03-25 08:17:09'),
(45, 'ONN1716375495', '127.0.0.1', 0, 'Jai', 'Pilla', 'your.email+fakedata45947@gmail.com', '9876543210', NULL, 0, '44 Bhilangana Harbor', 'Impedit porro nesciunt accusantium voluptatibus minima eos et vel.', 'Tajikistan', 'Madya Pradesh', 'Port Manifort', '601340', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2871.00, 0.00, 'express', 0.00, 0.00, 0, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:49:35', '2022-03-25 08:17:09'),
(46, 'ONN111264837', '127.0.0.1', 0, 'Deenabandhu', 'Bhattathiri', 'your.email+fakedata94337@gmail.com', '9876543210', NULL, 0, '8006 Chandraprabha Lodge', 'Perferendis sunt et et hic.', 'Burundi', 'Goa', 'New Apsara', '430466', 1, 0, '8006 Chandraprabha Lodge', 'Perferendis sunt et et hic.', 'Burundi', 'Goa', 'New Apsara', '430466', 2871.00, 0.00, 'standard', 0.00, 0.00, 0, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:50:17', '2022-03-25 08:17:09'),
(47, 'ONN280091922', '127.0.0.1', 0, 'Dhatri', 'Dwivedi', 'your.email+fakedata75409@gmail.com', '9876543210', NULL, 0, '971 Giri Corner', 'Doloremque itaque sed unde.', 'Solomon Islands', 'Tamil Nadu', 'Nehrufort', '700067', 0, 0, '1715 Susheel Pike', 'Qui corporis qui beatae iste rerum et omnis.', 'Comoros', 'Bihar', 'Arunaside', '600067', 2871.00, 0.00, 'express', 0.00, 0.00, 0, 2871.00, NULL, 'cash_on_delivery', 0, 0, 1, '2022-03-25 07:51:03', '2022-03-25 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_variation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `offer_price` double(10,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: new, 2: confirmed, 3: shipped, 4: delivered, 5: cancelled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_slug`, `product_variation_id`, `price`, `offer_price`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'uploads/product/1646374037.catago_2.png', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry', '4', 999.00, 499.00, 2, 1, '2022-03-04 11:27:29', '2022-03-25 08:17:09'),
(16, 16, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 2, 1, '2022-03-08 11:44:58', '2022-03-25 08:17:09'),
(17, 16, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-08 11:44:58', '2022-03-25 08:17:09'),
(18, 17, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 2, 1, '2022-03-08 11:45:50', '2022-03-25 08:17:09'),
(19, 17, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-08 11:45:50', '2022-03-25 08:17:09'),
(20, 18, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 2, 1, '2022-03-08 11:46:01', '2022-03-25 08:17:09'),
(21, 18, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-08 11:46:01', '2022-03-25 08:17:09'),
(22, 19, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 2, 1, '2022-03-08 11:48:25', '2022-03-25 08:17:09'),
(23, 19, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-08 11:48:25', '2022-03-25 08:17:09'),
(24, 20, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 8, 1, '2022-03-09 10:03:20', '2022-03-25 08:17:09'),
(25, 20, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-09 10:03:20', '2022-03-25 08:17:09'),
(26, 21, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 8, 1, '2022-03-09 10:03:56', '2022-03-25 08:17:09'),
(27, 21, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-09 10:03:56', '2022-03-25 08:17:09'),
(28, 22, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', '8', 575.00, 575.00, 8, 1, '2022-03-09 10:05:43', '2022-03-25 08:17:09'),
(29, 22, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 4, 1, '2022-03-09 10:05:43', '2022-03-25 08:17:09'),
(30, 23, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', '8', 575.00, 575.00, 1, 1, '2022-03-09 11:28:43', '2022-03-25 08:17:09'),
(31, 23, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 1, 1, '2022-03-09 11:28:43', '2022-03-25 08:17:09'),
(32, 24, 2, 'Men Pack of 2 Solid Polo Collar T-shirts', 'http://127.0.0.1:8000/uploads/product/1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 'men-pack-of-2-solid-polo-collar-t-shirts', NULL, 1300.00, 1150.00, 3, 1, '2022-03-10 05:47:38', '2022-03-25 08:17:09'),
(33, 24, 3, 'Men Navy Blue Solid Polo Collar T-shirt', 'http://127.0.0.1:8000/uploads/product/1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'men-navy-blue-solid-polo-collar-t-shirt', NULL, 575.00, 575.00, 2, 1, '2022-03-10 05:47:38', '2022-03-25 08:17:09'),
(34, 25, 7, 'LOW SHOW SOCKS', 'http://localhost:8000/uploads/product/polo_tshirt_front.png', 'low-show-socks', NULL, 90.00, 90.00, 4, 1, '2022-03-22 08:53:20', '2022-03-25 08:17:09'),
(35, 25, 125, 'FULL SLEEVES V/NECK', 'http://localhost:8000/uploads/product/polo_tshirt_front.png', 'full-sleeves-v-neck', NULL, 610.00, 610.00, 7, 1, '2022-03-22 08:53:20', '2022-03-25 08:17:09'),
(36, 25, 17, 'FINE VEST', 'http://localhost:8000/uploads/product/polo_tshirt_front.png', 'fine-vest-2', NULL, 280.00, 280.00, 3, 1, '2022-03-22 08:53:20', '2022-03-25 08:17:09'),
(37, 25, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '1', 530.00, 530.00, 1, 1, '2022-03-22 08:53:20', '2022-03-25 08:17:09'),
(38, 26, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '7', 530.00, 530.00, 2, 1, '2022-03-22 09:04:28', '2022-03-25 08:17:09'),
(46, 34, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '7', 530.00, 530.00, 2, 1, '2022-03-22 11:35:08', '2022-03-25 08:17:09'),
(47, 35, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'round-neck-t-shirt', NULL, 399.00, 399.00, 3, 1, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(48, 35, 79, 'FASHION BRIEF O/E', 'http://127.0.0.1:8000/uploads\\product\\product_images\\262\\ONN-Grande-262-1.jpg', 'fashion-brief-o-e', NULL, 175.00, 175.00, 5, 1, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(49, 35, 32, 'PRINTED SWEATSHIRT', 'http://127.0.0.1:8000/uploads/product/product_images/1021/1021-1.jpg', 'printed-sweatshirt', NULL, 799.00, 799.00, 3, 1, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(50, 35, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '3', 530.00, 530.00, 2, 1, '2022-03-23 08:39:59', '2022-03-25 08:17:09'),
(51, 36, 125, 'FULL SLEEVES V/NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'full-sleeves-v-neck', NULL, 610.00, 610.00, 2, 1, '2022-03-23 14:43:27', '2022-03-25 08:17:09'),
(52, 36, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '5', 530.00, 530.00, 4, 1, '2022-03-23 14:43:27', '2022-03-25 08:17:09'),
(53, 36, 38, 'HALF SLEEVE R/ NECK', 'http://127.0.0.1:8000/uploads/product/polo_tshirt_front.png', 'half-sleeve-r-neck', '6', 530.00, 530.00, 2, 1, '2022-03-23 14:43:27', '2022-03-25 08:17:09'),
(54, 37, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '17', 399.00, 399.00, 3, 1, '2022-03-24 13:53:14', '2022-03-25 08:17:09'),
(55, 37, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '24', 425.00, 425.00, 1, 1, '2022-03-24 13:53:14', '2022-03-25 08:17:09'),
(56, 38, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-24 14:05:40', '2022-03-25 08:17:09'),
(57, 38, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-24 14:05:40', '2022-03-25 08:17:09'),
(58, 38, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 5, 1, '2022-03-24 14:05:40', '2022-03-25 08:17:09'),
(59, 39, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 05:52:51', '2022-03-25 08:17:09'),
(60, 39, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 05:52:51', '2022-03-25 08:17:09'),
(61, 39, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 5, 1, '2022-03-25 05:52:51', '2022-03-25 08:17:09'),
(62, 40, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(63, 40, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(64, 40, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 5, 1, '2022-03-25 06:23:15', '2022-03-25 08:17:09'),
(65, 41, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(66, 41, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(67, 41, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 5, 1, '2022-03-25 06:24:32', '2022-03-25 08:17:09'),
(68, 42, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:15:50', '2022-03-25 08:17:09'),
(69, 42, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:15:50', '2022-03-25 08:17:09'),
(70, 42, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:15:50', '2022-03-25 08:17:09'),
(71, 43, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:20:08', '2022-03-25 08:17:09'),
(72, 43, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:20:08', '2022-03-25 08:17:09'),
(73, 43, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:20:08', '2022-03-25 08:17:09'),
(74, 44, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:20:33', '2022-03-25 08:17:09'),
(75, 44, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:20:33', '2022-03-25 08:17:09'),
(76, 44, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:20:33', '2022-03-25 08:17:09'),
(77, 45, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:49:35', '2022-03-25 08:17:09'),
(78, 45, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:49:35', '2022-03-25 08:17:09'),
(79, 45, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:49:35', '2022-03-25 08:17:09'),
(80, 46, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:50:17', '2022-03-25 08:17:09'),
(81, 46, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:50:17', '2022-03-25 08:17:09'),
(82, 46, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:50:17', '2022-03-25 08:17:09'),
(83, 47, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '95', 425.00, 425.00, 3, 1, '2022-03-25 07:51:03', '2022-03-25 08:17:09'),
(84, 47, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '83', 399.00, 399.00, 1, 1, '2022-03-25 07:51:03', '2022-03-25 08:17:09'),
(85, 47, 13, 'ROUND NECK T-SHIRT', 'http://127.0.0.1:8000/uploads\\product\\product_images\\422\\422-1.jpg', 'round-neck-t-shirt', '74', 399.00, 399.00, 3, 1, '2022-03-25 07:51:03', '2022-03-25 08:17:09');

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
  `cat_id` bigint(20) NOT NULL,
  `sub_cat_id` bigint(20) NOT NULL,
  `collection_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `offer_price` double(10,2) NOT NULL,
  `size_chart` text COLLATE utf8mb4_unicode_ci,
  `pack` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master_pack` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all' COMMENT 'men, women, kids, all',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_trending` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: yes, 0:no',
  `is_best_seller` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: yes, 0:no',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `sub_cat_id`, `collection_id`, `name`, `image`, `short_desc`, `desc`, `price`, `offer_price`, `size_chart`, `pack`, `master_pack`, `only_for`, `slug`, `meta_title`, `meta_desc`, `meta_keyword`, `style_no`, `is_trending`, `is_best_seller`, `status`, `created_at`, `updated_at`) VALUES
(4, 14, 4, 2, 'NO SHOW SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 85.00, 85.00, 'Free size', '1 PC PACK', '1 BOX = 10 PAIR\n', 'all', 'no-show-socks', '', '', '', 'OF 3001 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(6, 14, 4, 2, 'LOW SHOW SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 90.00, 90.00, NULL, NULL, NULL, 'all', 'low-show-socks-2', '', '', '', 'OF 3002 B', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(7, 14, 4, 2, 'LOW SHOW SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 90.00, 90.00, NULL, NULL, NULL, 'all', 'low-show-socks', '', '', '', 'OF 3002 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(8, 14, 4, 2, 'ANKLET SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 95.00, 95.00, NULL, NULL, NULL, 'all', 'anklet-socks-2', '', '', '', 'OF 3003 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(9, 14, 4, 2, 'ANKLET SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 95.00, 95.00, NULL, NULL, NULL, 'all', 'anklet-socks', '', '', '', 'OF 3004 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(11, 14, 4, 2, 'ANKLET PLEATED SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 90.00, 90.00, NULL, NULL, NULL, 'all', 'anklet-pleated-socks', '', '', '', 'OF 3005 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(12, 9, 3, 4, '\"V\" NECK T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed \"V\" neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive color ', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed \"V\" neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive color ', 410.00, 410.00, 'XS: 70-75 | S: 80-85 | M: 90-95 | L: 100-105 | XL: 110-115 | XXL: 120-125 | 3XL: 130-135 | 4XL: 140-145\n', '1 PC\n', '5 PC PACK\n', 'all', 'v-neck-t-shirt', '', '', '', '423', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(13, 9, 3, 4, 'ROUND NECK T-SHIRT', 'uploads\\product\\product_images\\422\\422-1.jpg', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive color', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive color', 399.00, 399.00, 'XS: 70-75 | S: 80-85 | M: 90-95 | L: 100-105 | XL: 110-115 | XXL: 120-125 | 3XL: 130-135 | 4XL: 140-145', '1 PC', '5 PC PACK\n', 'all', 'round-neck-t-shirt', '', '', '', '422', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(14, 9, 14, 4, 'FULL SLEEVES R/N T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive colou', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , To be worn as loungewear or casual tee , Available in attractive colou', 499.00, 499.00, 'XS: 70-75 | S: 80-85 | M: 90-95 | L: 100-105 | XL: 110-115 | XXL: 120-125 | 3XL: 130-135 | 4XL: 140-145\n', '1 PC', '5 PC PACK\n', 'all', 'full-sleeves-rn-t-shirt', '', '', '', '425', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(15, 9, 3, 4, 'POLO T-SHIRT', 'uploads/product/product_images/431/431-1.jpg', 'Premium combed cotton rich fabric , Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive colors', 'Premium combed cotton rich fabric , Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive colors', 575.00, 575.00, 'XS: 70-75 | S: 80-85 | M: 90-95 | L: 100-105 | XL: 110-115 | XXL: 120-125 | 3XL: 130-135 | 4XL: 140-145\n', '1 PC', '5 PC PACK', 'all', 'polo-t-shirt', '', '', '', '431', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(16, 9, 3, 4, 'POLO T-SHIRT (WITH POCKET)', 'uploads/product/product_images/432/432-1.jpg', 'Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee with pocket , Available in attractive color ', 'Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee with pocket , Available in attractive color ', 599.00, 599.00, NULL, NULL, NULL, 'all', 'polo-t-shirt-with-pocket', '', '', '', '432', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(17, 5, 5, 3, 'FINE VEST', 'uploads/product/polo_tshirt_front.png', 'Made from premium 100% pure cotton , Fits body perfectly , Contoured armhole , Round neck scoop for easy wearing , Extended length to ease \'tucking in’ , Double reinforced shoulder strap seams', 'Made from premium 100% pure cotton , Fits body perfectly , Contoured armhole , Round neck scoop for easy wearing , Extended length to ease \'tucking in’ , Double reinforced shoulder strap seams', 280.00, 280.00, NULL, NULL, NULL, 'all', 'fine-vest-2', '', '', '', '121', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(18, 5, 5, 3, 'RIBBED 1X1 VEST', 'uploads/product/polo_tshirt_front.png', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', 199.00, 199.00, NULL, NULL, NULL, 'all', 'ribbed-1x1-vest', '', '', '', '131 White', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(19, 5, 5, 3, 'RIBBED 1X1 VEST', 'uploads\\product\\product_images\\131.jpg', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', 225.00, 225.00, NULL, NULL, NULL, 'all', 'ribbed-1x1-vest-2', '', '', '', '131 Ass', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(22, 5, 5, 8, 'FINE VEST', 'uploads/product/polo_tshirt_front.png', 'Assuring great comfort, ONN brings you this neatly tailored vest that is a great addition to the inner wear collection , This vest is the best choice for regular use , ONN presents this vest that assures great comfort along with a decent fit , Crafted from pure cotton', 'Assuring great comfort, ONN brings you this neatly tailored vest that is a great addition to the inner wear collection , This vest is the best choice for regular use , ONN presents this vest that assures great comfort along with a decent fit , Crafted from pure cotton', 140.00, 140.00, NULL, NULL, NULL, 'all', 'fine-vest-3', '', '', '', '111', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(23, 6, 4, 8, 'BASIC BRIEF', 'uploads/product/polo_tshirt_front.png', 'Made from 100% pure premium combed cotton , Specially designed to fit just above the hip , Super absorbent fabric , Regular brief with snug fit', 'Made from 100% pure premium combed cotton , Specially designed to fit just above the hip , Super absorbent fabric , Regular brief with snug fit', 320.00, 320.00, NULL, NULL, NULL, 'all', 'basic-brief', '', '', '', '152(3Pcs)', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(24, 6, 4, 8, 'BRIEF', 'uploads/product/polo_tshirt_front.png', 'Made with 100% pure premium combed cotton , Specially designed to fit just above the hip , Super absorbent fabric , New ultra soft waistband provised smooth and comfortable grip', 'Made with 100% pure premium combed cotton , Specially designed to fit just above the hip , Super absorbent fabric , New ultra soft waistband provised smooth and comfortable grip', 140.00, 140.00, NULL, NULL, NULL, 'all', 'brief', '', '', '', '153', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(25, 11, 8, 8, 'MINI TRUNK', 'uploads/product/polo_tshirt_front.png', 'Made from 100% pure premium combed cotton , Specially designed to fit when worn just above the hip , Super absorbent fabric , New ultra soft waistband provides smooth and comfortable grip', 'Made from 100% pure premium combed cotton , Specially designed to fit when worn just above the hip , Super absorbent fabric , New ultra soft waistband provides smooth and comfortable grip', 165.00, 165.00, NULL, NULL, NULL, 'all', 'mini-trunk-2', '', '', '', '154', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(26, 11, 8, 8, 'LONG TRUNK', 'uploads/product/polo_tshirt_front.png', 'Made from 100% pure premium combed cotton , Specially designed to fit when worn just above the hip , Super absorbent fabric , New ultra soft waistband provides smooth and comfortable grip', 'Made from 100% pure premium combed cotton , Specially designed to fit when worn just above the hip , Super absorbent fabric , New ultra soft waistband provides smooth and comfortable grip', 185.00, 185.00, NULL, NULL, NULL, 'all', 'long-trunk', '', '', '', '155', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(27, 5, 5, 9, 'FINE VEST', 'uploads/product/polo_tshirt_front.png', 'Made with 100% SuPima cotton imported from United States Of America , Extra soft silk finish , Unique single stitch to give a modern look', 'Made with 100% SuPima cotton imported from United States Of America , Extra soft silk finish , Unique single stitch to give a modern look', 325.00, 325.00, NULL, '1 PC solid color', NULL, 'all', 'fine-vest', '', '', '', '941', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(28, 6, 4, 9, 'FASHION BRIEF', 'uploads/product/polo_tshirt_front.png', '48% Super Soft Combed Cotton , 48% Micro-Modal, 4 % Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', '48% Super Soft Combed Cotton , 48% Micro-Modal, 4 % Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', 275.00, 275.00, NULL, '1 PC', NULL, 'all', 'fashion-brief', '', '', '', '971', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(29, 6, 4, 9, 'BRIEF', 'uploads/product/polo_tshirt_front.png', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', 275.00, 275.00, NULL, '1 PC', NULL, 'all', 'brief-2', '', '', '', '972', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(30, 11, 8, 9, 'MINI TRUNK', 'uploads/product/polo_tshirt_front.png', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', 325.00, 325.00, NULL, '1 PC', NULL, 'all', 'mini-trunk', '', '', '', '973', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(31, 10, 2, 9, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Made from American cotton , Added lycra for stretch and comfort , Both side pocket with one side Zipper , Back side pocket for extra safety , Broad waistband for better fit', 'Made from American cotton , Added lycra for stretch and comfort , Both side pocket with one side Zipper , Back side pocket for extra safety , Broad waistband for better fit', 999.00, 999.00, NULL, '1 PC', NULL, 'all', 'track-pant', '', '', '', '966', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(32, 17, 12, 7, 'PRINTED SWEATSHIRT', 'uploads/product/product_images/1021/1021-1.jpg', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 799.00, 799.00, NULL, NULL, NULL, 'all', 'printed-sweatshirt', '', '', '', '1021', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(33, 17, 12, 7, 'SWEATSHIRT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 750.00, 750.00, NULL, NULL, NULL, 'all', 'sweatshirt ', '', '', '', '1022', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(34, 17, 12, 7, 'PRINTED SWEATSHIRT WITH HOOD', 'uploads\\product\\product_images\\1023.jpg', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 999.00, 999.00, NULL, NULL, NULL, 'all', 'printed-sweatshirt-with-hood', '', '', '', '1023', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(35, 17, 12, 7, 'FASHION SWEATSHIRT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth , Printed fashion sleeves', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth , Printed fashion sleeves', 850.00, 850.00, NULL, NULL, NULL, 'all', 'fashion-sweatshirt', '', '', '', '1026', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(36, 16, 11, 7, 'HOODIE JACKET', 'uploads/product/product_images/1031/1031-1.jpg', 'Super soft cotton , Modern fit for perfect comfort , Cross pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Cross pockets for ease access and comfort , Ribbed cuff and waist hem', 1099.00, 1099.00, NULL, NULL, NULL, 'all', 'hoodie-jacket', '', '', '', '1031', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(37, 16, 11, 7, 'HI-NECK JACKET', 'uploads/product/product_images/1032/1032-1.jpg', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 950.00, 950.00, NULL, NULL, NULL, 'all', 'hi-neck-jacket', '', '', '', '1032', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(38, 9, 14, 6, 'HALF SLEEVE R/ NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 530.00, 530.00, NULL, '1 PC', '5 PC PACK', 'all', 'half-sleeve-r-neck', '', '', '', 'OT 021', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(39, 9, 14, 6, 'HALF SLEEVE R/ NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 520.00, 520.00, NULL, '1 PC', '5 PC PACK', 'all', 'half-sleeve-r-neck-2', '', '', '', 'OT 031', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(40, 9, 14, 6, 'FULL SLEEVES R/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 590.00, 590.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-r-neck', '', '', '', 'OT 032', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(41, 9, 14, 6, 'FULL SLEEVES CREW NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Crew neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort  , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Crew neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort  , Brushed interlock fabric for extra heat', 610.00, 610.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-crew-neck', '', '', '', 'OT 034', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(42, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 599.00, 599.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser', '', '', '', 'OT 026', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(43, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 590.00, 590.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser-2', '', '', '', 'OT 036', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(44, 14, 4, 2, 'HIGH ANKLET HALF TERRY SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 129.00, 129.00, NULL, NULL, NULL, 'all', 'high-anklet-half-terry-socks', '', '', '', 'OF 3006 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(45, 14, 4, 2, 'HIGH ANKLET HALF TERRY SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 129.00, 129.00, NULL, NULL, NULL, 'all', 'high-anklet-half-terry-socks-2', '', '', '', 'OF 3006 B', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(46, 14, 4, 2, 'HIGH ANKLET HALF TERRY FASHION SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 129.00, 129.00, NULL, NULL, NULL, 'all', 'high-anklet-half-terry-fashion-socks', '', '', '', 'OF 3007 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(47, 14, 4, 2, 'HIGH ANKLET HALF TERRY SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 139.00, 139.00, NULL, NULL, NULL, 'all', 'high-anklet-half-terry-socks-3', '', '', '', 'OF 3008 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(48, 14, 4, 2, 'CREW FORMAL SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 109.00, 109.00, NULL, NULL, NULL, 'all', 'crew-formal-socks', '', '', '', 'OF 3009 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(49, 14, 4, 2, 'CREW FORMAL SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 109.00, 109.00, NULL, NULL, NULL, 'all', 'crew-formal-socks-2', '', '', '', 'OF 3009 B', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(50, 14, 4, 2, 'CREW PLEATED SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 109.00, 109.00, NULL, NULL, NULL, 'all', 'crew-pleated-socks', '', '', '', 'OF 3010 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(51, 14, 4, 2, 'CREW FULL TERRY SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 159.00, 159.00, NULL, NULL, NULL, 'all', 'crew-full-terry-socks', '', '', '', 'OF 3011 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(52, 14, 4, 2, 'CREW FULL TERRY SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 159.00, 159.00, NULL, NULL, NULL, 'all', 'crew-full-terry-socks-2', '', '', '', 'OF 3011 B', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(53, 14, 4, 2, 'CREW FULL TERRY FASHION SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 159.00, 159.00, NULL, NULL, NULL, 'all', 'crew-full-terry-fashion-socks', '', '', '', 'OF 3012 A', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(54, 9, 3, 4, 'DUAL TONE T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Premium combed cotton rich fabric , Dual tone colour for the modern man , To be worn as lounge wear or casual tee , Available in attractive colours ', 'Premium combed cotton rich fabric , Dual tone colour for the modern man , To be worn as lounge wear or casual tee , Available in attractive colours ', 599.00, 599.00, 'S: 80-85| M: 90-95 L: 100-105 XL: 110-115 XXL: 120-125\n', '1 PC', '5 PC PACK', 'all', 'dual-tone-t-shirt', '', '', '', '433', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(55, 9, 5, 4, 'PRINTED T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Modem fit for extra comfort , Ribbed crew neck prevents sagging , Fabric tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive prints ', 'Made from 100% premium combed cotton , Modem fit for extra comfort , Ribbed crew neck prevents sagging , Fabric tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive prints ', 450.00, 450.00, 'XS: 70-75 | S: 80-85 | M: 90-95 | L: 100-105 | XL: 110-115 | XXL: 120-125 | 3XL: 130-135 | 4XL: 140-145\n', '1 PC', '5 PC PACK\n', 'all', 'printed-t-shirt', '', '', '', '721', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(56, 9, 5, 4, 'SMART FIT T-SHIRT ', 'uploads/product/polo_tshirt_front.png', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from 100% premium combed cotton , Modem fit for extra comfort , Ribbed crew neck prevents sagging , Fabric tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive prints ', 599.00, 599.00, NULL, NULL, NULL, 'all', 'smart-fit-t-shirt', '', '', '', '731', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(57, 9, 5, 4, 'POLO T-SHIRT ', 'uploads/product/product_images/741/741-1.jpg', 'Premium combed cotton rich fabric , Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive colors', 'Premium combed cotton rich fabric , Modern fit for extra comfort , Twill tape reinforcement on neck for enhanced style and durability , To be worn as loungewear or casual tee , Available in attractive colors', 499.00, 499.00, 'S: 75-80 | M: 85-90 | L: 95 100 |  XL: 105-110 |  XXL: 115-120\n', '1 PC', '5 PC PACK', 'Women', 'polo-t-shirt-2', '', '', '', '741', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(58, 9, 5, 4, 'ROUND NECK T-SHIRT', 'uploads/product/product_images/742/742-1.jpg', 'Premium combed cotton spandex , Modern fit for extra comfort , To be worn as loungewear or casual tee , Available in attractive colors', 'Premium combed cotton spandex , Modern fit for extra comfort , To be worn as loungewear or casual tee , Available in attractive colors', 430.00, 430.00, 'S: 75-80 | M: 85-90 | L: 95 100 |  XL: 105-110 |  XXL: 115-120\n', '1 PC', '5 PC PACK\n', 'Women', 'round-neck-t-shirt-2', '', '', '', '742', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(59, 9, 5, 4, 'POLO T-SHIRT ', 'uploads/product/polo_tshirt_front.png', 'Made from premium combed cotton , Stylish silhouette for better fit , Bi-color tipping applied on sleeve & collar , Embroidery on chest enhances look , Available in attractive colors', 'Made from premium combed cotton , Stylish silhouette for better fit , Bi-color tipping applied on sleeve & collar , Embroidery on chest enhances look , Available in attractive colors', 450.00, 450.00, '3-4 (50cms) | 5-6 (55cms) 7-8 (60cms) 9-10 (65cms) 11-12 (70cms) 13-14 (75cms)\n', '5 PC PACK\n', '5 PC PACK\n', 'all', 'polo-t-shirt-3', '', '', '', '746', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(60, 9, 5, 4, 'PRINTED T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , Fabric tape reinforcement on neck for enhanced style and durability , Available in attractive prints', 'Made from 100% premium combed cotton , Modern fit for extra comfort , Ribbed crew-neck prevents sagging , Fabric tape reinforcement on neck for enhanced style and durability , Available in attractive prints', 320.00, 320.00, '3-4 (50cms) | 5-6 (55cms) 7-8 (60cms) 9-10 (65cms) 11-12 (70cms) 13-14 (75cms)\n', '1 PC', '5 PC PACK\n', 'all', 'printed-t-shirt-2', '', '', '', '747', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(61, 9, 5, 4, 'FASHION T-SHIRT', 'uploads\\product\\product_images\\1121.jpg', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 649.00, 649.00, NULL, NULL, NULL, 'all', 'fashion-t-shirt', '', '', '', '1121', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(62, 9, 5, 4, 'FASHION T-SHIRT', 'uploads\\product\\product_images\\1122.jpg', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 649.00, 649.00, NULL, NULL, NULL, 'all', 'fashion-t-shirt-2', '', '', '', '1122', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(63, 9, 5, 4, 'FASHION T-SHIRT', 'uploads\\product\\product_images\\1123.jpg', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 649.00, 649.00, NULL, NULL, NULL, 'all', 'fashion-t-shirt-3', '', '', '', '1123', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(64, 9, 5, 4, 'FASHION T-SHIRT', 'uploads\\product\\product_images\\1124.jpg', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 649.00, 649.00, NULL, NULL, NULL, 'all', 'fashion-t-shirt-4', '', '', '', '1124', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(65, 9, 5, 4, 'FASHION T-SHIRT', 'uploads\\product\\product_images\\1126.jpg', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 'Made from a perfect blend of cotton rich fabric , Modern yet relaxed fit for all day comfort , Fashion and casual wear , Available in attractive colours , Soft collar rib for neck comfort , Elegant look and easy care', 649.00, 649.00, NULL, NULL, NULL, 'all', 'fashion-t-shirt-5', '', '', '', '1126', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(66, 5, 5, 12, 'DENIM VEST', 'uploads\\product\\product_images\\821.jpg', 'Made from 100% Combed Cotton , High density rib for a better fit , Now wear your Jeans Inside', 'Made from 100% Combed Cotton , High density rib for a better fit , Now wear your Jeans Inside', 325.00, 325.00, NULL, NULL, NULL, 'all', 'denim-vest', '', '', '', '821', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(67, 5, 5, 13, 'RIBBED 2X1 VEST', 'uploads/product/polo_tshirt_front.png', 'Contured armhole for flexibility , Double reinforced shoulder strap seams for durability , Styled for optimum support , 100% Combed Cotton 2x1 Rib fabric', 'Contured armhole for flexibility , Double reinforced shoulder strap seams for durability , Styled for optimum support , 100% Combed Cotton 2x1 Rib fabric', 205.00, 205.00, NULL, NULL, NULL, 'all', 'ribbed-2x1-vest', '', '', '', '323 White', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(68, 5, 5, 13, 'RIBBED 2X1 VEST', 'uploads\\product\\product_images\\323.jpg', 'Contured armhole for flexibility , Double reinforced shoulder strap seams for durability , Styled for optimum support , 100% Combed Cotton 2x1 Rib fabric', 'Contured armhole for flexibility , Double reinforced shoulder strap seams for durability , Styled for optimum support , 100% Combed Cotton 2x1 Rib fabric', 230.00, 230.00, NULL, NULL, NULL, 'all', 'ribbed-2x1-vest-2', '', '', '', '323 Ass', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(69, 5, 5, 3, 'FINE VEST RN', 'uploads/product/product_images/221.jpg', 'Made from 100% premium combed cotton , Extended length for easy tucking , Label free for day long comfort , Double reinforced wider straps , Precise armholes for perfect body fit', 'Made from 100% premium combed cotton , Extended length for easy tucking , Label free for day long comfort , Double reinforced wider straps , Precise armholes for perfect body fit', 175.00, 175.00, NULL, NULL, NULL, 'all', 'fine-vest-rn', '', '', '', '221', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(70, 5, 5, 3, 'FINE VEST RNS', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Extended length for easy tucking , Label free for day long comfort , Double reinforced wider straps , Precise armholes for perfect body fit', 'Made from 100% premium combed cotton , Extended length for easy tucking , Label free for day long comfort , Double reinforced wider straps , Precise armholes for perfect body fit', 195.00, 195.00, NULL, NULL, NULL, 'all', 'fine-vest-rns', '', '', '', '222', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(71, 5, 5, 3, 'MODERN VEST', 'uploads\\product\\product_images\\141\\141-new.jpg', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', '100% premium combed cotton , 1x1 Stretch \"Rib\" fabric , Contoured armhole for flexibility , Double reinforced shoulder strap seams for durability , Soft stitch international machines', 225.00, 225.00, NULL, NULL, NULL, 'all', 'modern-vest', '', '', '', '141', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(72, 6, 4, 3, 'SINKER BRIEF', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Specially designed to fit just above the hip , Super absorbent fabric', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Specially designed to fit just above the hip , Super absorbent fabric', 170.00, 170.00, NULL, NULL, NULL, 'all', 'sinker-brief', '', '', '', '252(1Pc)', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(73, 6, 4, 3, 'SINKER BRIEF', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Specially designed to fit just above the hip , Super absorbent fabric', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Specially designed to fit just above the hip , Super absorbent fabric', 170.00, 170.00, NULL, NULL, NULL, 'all', 'sinker-brief-2', '', '', '', '252(2Pc)', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(74, 4, 6, 3, 'SINKER BOXER', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Double layered contoured pouch for added comfort , Feather Touch Ultra Super Soft waistband , Front piping on the boxer', 'Made from 100% premium combed cotton , Double layered contoured pouch for added comfort , Feather Touch Ultra Super Soft waistband , Front piping on the boxer', 195.00, 195.00, NULL, NULL, NULL, 'all', 'sinker-boxer', '', '', '', '253(1Pc)', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(75, 4, 6, 3, 'SINKER BOXER', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Double layered contoured pouch for added comfort , Feather Touch Ultra Super Soft waistband , Front piping on the boxer', 'Made from 100% premium combed cotton , Double layered contoured pouch for added comfort , Feather Touch Ultra Super Soft waistband , Front piping on the boxer', 365.00, 365.00, NULL, NULL, NULL, 'all', 'sinker-boxer-2', '', '', '', '253(2Pc)', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(76, 4, 6, 3, 'SINKER F/OPEN BOXER', 'uploads/product/polo_tshirt_front.png', 'The front open brief is made from soft 100% cotton yam , The elastic waistband provides a relaxing fit , Double layered contoured pouch design enhances absorbency', 'The front open brief is made from soft 100% cotton yam , The elastic waistband provides a relaxing fit , Double layered contoured pouch design enhances absorbency', 205.00, 205.00, NULL, NULL, NULL, 'all', 'sinker-f-open-boxer', '', '', '', '254', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(77, 4, 6, 3, 'SINKER F/OPEN POCKET BOXER', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Boxer comes with front pocket , Double layered contoured pouch for added comfort', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Boxer comes with front pocket , Double layered contoured pouch for added comfort', 230.00, 230.00, NULL, NULL, NULL, 'all', 'sinker-f-open-pocket-boxer', '', '', '', '260', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(78, 4, 6, 3, 'SINKER F/OPEN LONG BOXER', 'uploads/product/polo_tshirt_front.png', 'The front open brief is made from soft 100% cotton yam , The elastic waistband provides a relaxing fit , Double layered contoured pouch design enhances absorbency', 'The front open brief is made from soft 100% cotton yam , The elastic waistband provides a relaxing fit , Double layered contoured pouch design enhances absorbency', 230.00, 230.00, NULL, NULL, NULL, 'all', 'sinker-f-open-long-boxer', '', '', '', '255', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(79, 6, 4, 3, 'FASHION BRIEF O/E', 'uploads\\product\\product_images\\262\\ONN-Grande-262-1.jpg', 'Made from 100% premium combed cotton , Stylish bicoloured with a soft waist band , Contrast piping at front enhances the style , Super soft elastic waist band for relaxing fit ', 'Made from 100% premium combed cotton , Stylish bicoloured with a soft waist band , Contrast piping at front enhances the style , Super soft elastic waist band for relaxing fit ', 175.00, 175.00, NULL, NULL, NULL, 'all', 'fashion-brief-o-e', '', '', '', '262', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(80, 6, 4, 3, 'FASHION BRIEF ', 'uploads\\product\\product_images\\264\\ONN-Grande-264-1.jpg', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Contrast front piping enhances the style, Double layered contoured pouch for added comfort', 'Made from 100% premium combed cotton , Feather Touch Ultra Super Soft waistband , Contrast front piping enhances the style, Double layered contoured pouch for added comfort', 210.00, 210.00, NULL, NULL, NULL, 'all', 'fashion-brief-2', '', '', '', '264', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(81, 6, 4, 11, 'BIKINI BRIEF', 'uploads\\product\\product_images\\271\\271-1.jpg', '95% Cotton 5% Spandex blend, moves with you , Low rise fit enhances style , Double layered contoured pouch for maximum comfort , Styled comfort seams , Ultra-soft waistband leaves no-mark on the body , Label free for all day comfort', '95% Cotton 5% Spandex blend, moves with you , Low rise fit enhances style , Double layered contoured pouch for maximum comfort , Styled comfort seams , Ultra-soft waistband leaves no-mark on the body , Label free for all day comfort', 190.00, 190.00, NULL, NULL, NULL, 'all', 'bikini-brief', '', '', '', '271', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(82, 6, 4, 11, 'BRIEF', 'uploads\\product\\product_images\\272\\272-1.jpg', '95% Cotton 5% Spandex blend, moves with you , Low rise fit enhances style , Double layered contoured pouch for maximum comfort , Styled comfort seams , Ultra-soft waistband leaves no-mark on the body , Label free for all day comfort', '95% Cotton 5% Spandex blend, moves with you , Low rise fit enhances style , Double layered contoured pouch for maximum comfort , Styled comfort seams , Ultra-soft waistband leaves no-mark on the body , Label free for all day comfort', 199.00, 199.00, NULL, NULL, NULL, 'all', 'brief-3', '', '', '', '272', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(83, 11, 8, 11, 'MINI TRUNK', 'uploads\\product\\product_images\\273\\273-1.jpg', '95% Cotton 5% Spandex blend, moves with you , Mid rise fit add fashion element , Double layered contoured pouch for maximum comfort , Super soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Label free for all day comfort', '95% Cotton 5% Spandex blend, moves with you , Mid rise fit add fashion element , Double layered contoured pouch for maximum comfort , Super soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Label free for all day comfort', 250.00, 250.00, NULL, NULL, NULL, 'all', 'mini-trunk-3', '', '', '', '273', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(84, 4, 6, 11, 'LONG BOXER', 'uploads\\product\\product_images\\274\\274-1.jpg', '95% Cotton 5% Spandex blend, moves with you , Long boxer styling ensures all day comfort , Mid rise fit complements modern clothing , Ultra-soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Tag free for itch-free comfort ', '95% Cotton 5% Spandex blend, moves with you , Long boxer styling ensures all day comfort , Mid rise fit complements modern clothing , Ultra-soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Tag free for itch-free comfort ', 260.00, 260.00, NULL, NULL, NULL, 'all', 'long-boxer', '', '', '', '274', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(85, 6, 4, 11, 'PRINTED BRIEF', 'uploads/product/polo_tshirt_front.png', '95% Cotton 5% Spandex blend. moves with you , Mid rise fit complements modern clothing , Double layered contoured pouch for added comfort , Styled comfort seams , Ultra-soft waistband leaves no mark on the body , Tag free for itch-free comfort', '95% Cotton 5% Spandex blend. moves with you , Mid rise fit complements modern clothing , Double layered contoured pouch for added comfort , Styled comfort seams , Ultra-soft waistband leaves no mark on the body , Tag free for itch-free comfort', 240.00, 240.00, NULL, NULL, NULL, 'all', 'printed-brief', '', '', '', '282', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(86, 11, 8, 11, 'PRINTED MINI TRUNK', 'uploads/product/polo_tshirt_front.png', '95% Cotton 5% Spandex blend, moves with you , Mid rise fit add fashion element , Double layered contoured pouch for maximum comfort , Super soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Label free for all day comfort', '95% Cotton 5% Spandex blend, moves with you , Mid rise fit add fashion element , Double layered contoured pouch for maximum comfort , Super soft waistband leaves no mark on the body , Specially designed leg opening ensures no ride up , Label free for all day comfort', 280.00, 280.00, NULL, NULL, NULL, 'all', 'printed-mini-trunk', '', '', '', '283', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(87, 4, 6, 13, 'RIBBED F/OPEN BOXER', 'uploads\\product\\product_images\\354.jpg', 'Designer attractive waistband , Sleek and comfortable , The ribbed texture ensures proper fit , 100% ribbed cotton ensuring durability  ', 'Designer attractive waistband , Sleek and comfortable , The ribbed texture ensures proper fit , 100% ribbed cotton ensuring durability  ', 220.00, 220.00, NULL, NULL, NULL, 'all', 'ribbed-f-open-boxer', '', '', '', '354', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(88, 4, 6, 13, 'RIBBED F/OPEN BOXER', 'uploads\\product\\product_images\\355.jpg', 'Designer attractive waistband , Sleek and comfortable , The ribbed texture ensures proper fit , 100% ribbed cotton ensuring durability  ', 'Designer attractive waistband , Sleek and comfortable , The ribbed texture ensures proper fit , 100% ribbed cotton ensuring durability  ', 210.00, 210.00, NULL, NULL, NULL, 'all', 'ribbed-f-open-boxer-2', '', '', '', '355', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(89, 4, 6, 13, 'RIBBED F/OPEN BOXER LONG', 'uploads\\product\\product_images\\357.jpg', 'ONN logo finely crafted in waistband , Designed with comfortable contoured pouch , It comnes with soft designer strap for easy fit, comfort and style , 100% pure premium ribbed cotton ensuring durability', 'ONN logo finely crafted in waistband , Designed with comfortable contoured pouch , It comnes with soft designer strap for easy fit, comfort and style , 100% pure premium ribbed cotton ensuring durability', 230.00, 230.00, NULL, NULL, NULL, 'all', 'ribbed-f-open-boxer-long', '', '', '', '357', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(90, 11, 8, 13, 'RIBBED MINI TRUNK', 'uploads/product/polo_tshirt_front.png', 'Designer attractive waistband , Sleek and comfortable , Mid rise fit add fashion element , 100% ribbed cotton ensuring durability', 'Designer attractive waistband , Sleek and comfortable , Mid rise fit add fashion element , 100% ribbed cotton ensuring durability', 230.00, 230.00, NULL, NULL, NULL, 'all', 'ribbed-mini-trunk', '', '', '', '359', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(91, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/751/751-1.jpg', 'Supreme Cotton rich fabric , Relaxed jogger , Ribbed tri color broad waistband with drawstring , Zippered side pockets for added functionality , Contrast shaped side panels with piping bring a sporty vibe , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 'Supreme Cotton rich fabric , Relaxed jogger , Ribbed tri color broad waistband with drawstring , Zippered side pockets for added functionality , Contrast shaped side panels with piping bring a sporty vibe , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK\n', 'Men', 'track-pant-2', '', '', '', '751', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21');
INSERT INTO `products` (`id`, `cat_id`, `sub_cat_id`, `collection_id`, `name`, `image`, `short_desc`, `desc`, `price`, `offer_price`, `size_chart`, `pack`, `master_pack`, `only_for`, `slug`, `meta_title`, `meta_desc`, `meta_keyword`, `style_no`, `is_trending`, `is_best_seller`, `status`, `created_at`, `updated_at`) VALUES
(92, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/752/752-1.jpg', 'Supreme Cotton rich fabric , Modern Fit , Ribbed bi color broad waistband with drawstring , Zippered vertical ribbed pockets with contrast piping add functionality , Contrast horizontal thin patches near bottom hem add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 'Supreme Cotton rich fabric , Modern Fit , Ribbed bi color broad waistband with drawstring , Zippered vertical ribbed pockets with contrast piping add functionality , Contrast horizontal thin patches near bottom hem add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-3', '', '', '', '752', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(93, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/753/753-1.jpg', 'Supreme Cotton rich fabric , Modern Fit , Ribbed bi color broad waistband with drawstring , Zippered vertical ribbed  , Modern Fit , Ribbed bi color broad waistband with drawstring , Utility zipper pocket with modern and sporty design , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear , ', ' , Modern Fit , Ribbed bi color broad waistband with drawstring , Utility zipper pocket with modern and sporty design , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear , ', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC ', '5 PC PACK', 'Men', 'track-pant-4', '', '', '', '753', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(94, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/754/754-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-5', '', '', '', '754', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(95, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/755/755-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1PC', '5 PC PACK', 'Men', 'track-pant-6', '', '', '', '755', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(96, 10, 2, 4, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 849.00, 849.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC ', '5 PC PACK', 'Men', 'track-pant-7', '', '', '', '756', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(97, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/757/757-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 849.00, 849.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-8', '', '', '', '757', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(98, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/758/758-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 849.00, 849.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-9', '', '', '', '758', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(99, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/759/759-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC ', '5 PC PACK', 'Men', 'track-pant-10', '', '', '', '759', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(100, 10, 2, 4, 'TRACK PANT', 'uploads/product/product_images/760/760-1.jpg', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 849.00, 849.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC ', '5 PC PACK', 'Men', 'track-pant-11', '', '', '', '760', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(101, 10, 2, 4, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 899.00, 899.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC ', '5 PC PACK', 'Men', 'track-pant-12', '', '', '', '761', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(102, 10, 2, 4, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 849.00, 849.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-13', '', '', '', '762', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(103, 10, 2, 4, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Relaxed jogger , Durable broad waistband with drawstring , Zippered side pockets for added functionality , Tag free for itch free comfort ,  Versatile styling, can be worn as sportswear and loungewear', 'Relaxed jogger , Durable ribbed broad waistband with drawstring , Dual ribbed cross pockets for added functionality , Contrast shaped front & back panels with decorative stitches add sportiness , Tag free for itch free comfort , Versatile styling, can be worn as sportswear and loungewear', 699.00, 699.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'track-pant-14', '', '', '', '763', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(104, 10, 2, 4, 'HOSIERY SHORTS', 'uploads/product/product_images/771/771-1.jpg', 'Premium combed cotton rich fabric , Dual side pocket , Zipped back pocket , Rib on side pocket , Broad waist band for better fit , Available in attractive color', 'Premium combed cotton rich fabric , Dual side pocket , Zipped back pocket , Rib on side pocket , Broad waist band for better fit , Available in attractive color', 650.00, 650.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'hosiery-shorts', '', '', '', '771', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(105, 4, 6, 4, 'PRINTED BOXER', 'uploads/product/product_images/776/776-1.jpg', 'Made from 100% Combed Cotton for extra durability , Fashionable signature black label , Button placket with front fly opening , Both side pocket, with one side zipper makes for ideal loungewear, casual wear and innerwear', 'Made from 100% Combed Cotton for extra durability , Fashionable signature black label , Button placket with front fly opening , Both side pocket, with one side zipper makes for ideal loungewear, casual wear and innerwear', 499.00, 499.00, NULL, NULL, NULL, 'all', 'printed-boxer', '', '', '', '776', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(106, 4, 6, 4, 'TEXTILE BOXER', 'uploads/product/product_images/777/777-1.jpg', 'Made from 100% Combed Cotton for extra durability. , Fashionable signature black label , Button placket with front fly opening , Velvet finish for extra soft feel. , Both side pocket, with one side zipper makes for ideal loungewear, casual wear and innerwear', 'Made from 100% Combed Cotton for extra durability. , Fashionable signature black label , Button placket with front fly opening , Velvet finish for extra soft feel. , Both side pocket, with one side zipper makes for ideal loungewear, casual wear and innerwear', 499.00, 499.00, NULL, NULL, NULL, 'all', 'textile-boxer', '', '', '', '777', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(107, 4, 6, 8, 'TEXTILE BOXER', 'uploads/product/polo_tshirt_front.png', 'Made from 100% premium Combed Cotton for extra durability , Button placket with front ply , Can be used for casual wear, Lounge wear and Innerwear , Available in different prints', 'Made from 100% premium Combed Cotton for extra durability , Button placket with front ply , Can be used for casual wear, Lounge wear and Innerwear , Available in different prints', 310.00, 310.00, NULL, NULL, NULL, 'all', 'textile-boxer-2', '', '', '', '161', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(108, 17, 12, 9, 'SEMI LONG', 'uploads/product/polo_tshirt_front.png', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', '48% Super-Soft combed cotton , 48% Micro-Modal, 4% Elastane , Ultra-Soft Waistband , Filament stitching thread used for extra durability', 325.00, 325.00, NULL, '1 PC', NULL, 'all', 'semi-long', '', '', '', '974', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(109, 17, 12, 9, 'R/NECK T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made with 100% SuPima cotton imported from United States Of America , Modern fit for extra comfort , To be worn as loungewear , Available in attractive colours ', 'Made with 100% SuPima cotton imported from United States Of America , Modern fit for extra comfort , To be worn as loungewear , Available in attractive colours ', 799.00, 799.00, NULL, '1 PC', NULL, 'all', 'r-neck-t-shirt', '', '', '', '922', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(110, 9, 5, 9, 'POLO T-SHIRT', 'uploads/product/polo_tshirt_front.png', 'Made from American Cotton , 95% Cotton, 5% Elastane , Twill tape reinforcement on nect for enhanced style and durability , Available in attractive colours', 'Made from American Cotton , 95% Cotton, 5% Elastane , Twill tape reinforcement on nect for enhanced style and durability , Available in attractive colours', 899.00, 899.00, NULL, '1 PC', NULL, 'all', 'polo-t-shirt-4', '', '', '', '931', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(111, 13, 10, 9, 'HALF PANT', 'uploads/product/polo_tshirt_front.png', 'Made from American cotton , Added lycra for stretch and comfort , Back side pocket for extra safety , Broad waistband for better fit , Special stitch in crotch area for extra comfort', 'Made from American cotton , Added lycra for stretch and comfort , Back side pocket for extra safety , Broad waistband for better fit , Special stitch in crotch area for extra comfort', 799.00, 799.00, NULL, '1 PC', '3 PC PACK', 'all', 'half-pant', '', '', '', '961', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(112, 10, 2, 9, 'TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Made from American cotton , Added lycra for stretch and comfort , Both side pocket with one side Zipper , Back side pocket for extra safety , Broad waistband for better fit', 'Made from American cotton , Added lycra for stretch and comfort , Both side pocket with one side Zipper , Back side pocket for extra safety , Broad waistband for better fit', 999.00, 999.00, NULL, '1 PC', NULL, 'all', 'track-pant-15', '', '', '', '966', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(113, 17, 12, 7, 'HI-NECK HALF ZIP SWEATSHIRT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Half Zip with Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Half Zip with Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 899.00, 899.00, NULL, NULL, NULL, 'all', 'hi-neck-half-zip-sweatshirt', '', '', '', '1033', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(114, 10, 2, 7, 'WINTER TRACK PANT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Both side pocket with one side zipper , Back pocket for added utility', 'Super soft cotton , Modern fit for perfect comfort , Both side pocket with one side zipper , Back pocket for added utility', 850.00, 850.00, NULL, NULL, NULL, 'all', 'winter-track-pant', '', '', '', '1036', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(115, 12, 9, 7, 'WINTER JOGGERS', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Both side pocket with visible zipper , Back pocket for added utility , Ribbed broad waistband with drawcord', 'Super soft cotton , Modern fit for perfect comfort , Both side pocket with visible zipper , Back pocket for added utility , Ribbed broad waistband with drawcord', 950.00, 950.00, NULL, NULL, NULL, 'all', 'winter-joggers', '', '', '', '1037', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(116, 16, 14, 7, 'PADDED JACKET SLEEVLESS', 'uploads\\product\\product_images\\2121.jpg', 'Winter poly wadding , Nylon Outer Shell , Embroidery brand logo , Bothside pocket , Feather weight , Heavy duty rubber zip', 'Winter poly wadding , Nylon Outer Shell , Embroidery brand logo , Bothside pocket , Feather weight , Heavy duty rubber zip', 1290.00, 1290.00, NULL, NULL, NULL, 'all', 'padded-jacket-sleevess', '', '', '', '2121', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(117, 16, 14, 7, 'PADDED JACKET SLEEVLESS', 'uploads\\product\\product_images\\2122.jpg', 'Winter poly wadding , Nylon Outer Shell , Embroidery brand logo , Bothside pocket , Feather weight , Heavy duty rubber zip', 'Winter poly wadding , Nylon Outer Shell , Embroidery brand logo , Bothside pocket , Feather weight , Heavy duty rubber zip', 1590.00, 1590.00, NULL, NULL, NULL, 'all', 'padded-jacket-sleevess-2', '', '', '', '2122', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(118, 17, 12, 7, 'PRINTED SWEATSHIRT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 799.00, 799.00, NULL, NULL, NULL, 'all', 'printed-sweatshirt-2', '', '', '', '1041', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(119, 17, 12, 7, 'SWEATSHIRT WITH HOOD', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease of access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease of access and comfort , Ribbed cuff and waist hem', 899.00, 899.00, NULL, NULL, NULL, 'all', 'sweatshirt-with-hood', '', '', '', '1043', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(120, 16, 11, 7, 'HOODIE JACKET', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease of access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease of access and comfort , Ribbed cuff and waist hem', 999.00, 999.00, NULL, NULL, NULL, 'all', 'hoodie-jacket-2', '', '', '', '1051', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(121, 17, 12, 7, 'PRINTED SWEATSHIRT', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 'Super soft cotton , Modern fit for perfect comfort , Pocket on each side , Special raising for extra warmth', 550.00, 550.00, NULL, NULL, NULL, 'all', 'printed-sweatshirt-3', '', '', '', '1061', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(122, 17, 12, 7, 'PRINTED SWEATSHIRT WITH HOOD', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 599.00, 599.00, NULL, NULL, NULL, 'all', 'printed-sweatshirt-with-hood-2', '', '', '', '1063', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(123, 17, 11, 7, 'PRINTED HOODIE JACKET', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Cross pockets for ease access and comfort , Ribbed cuff with waist hem', 'Super soft cotton , Modern fit for perfect comfort , Cross pockets for ease access and comfort , Ribbed cuff with waist hem', 750.00, 750.00, NULL, NULL, NULL, 'all', 'printed-hoodie-jacket', '', '', '', '1071', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(124, 16, 11, 7, 'HI-NECK JACKET', 'uploads/product/polo_tshirt_front.png', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 'Super soft cotton , Modern fit for perfect comfort , Kangroo pockets for ease access and comfort , Ribbed cuff and waist hem', 599.00, 599.00, NULL, NULL, NULL, 'all', 'hi-neck-jacket-2', '', '', '', '1072', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(125, 15, 14, 6, 'FULL SLEEVES V/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low ribbed V neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low ribbed V neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 610.00, 610.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-v-neck', '', '', '', 'OT 023', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(126, 15, 14, 6, 'FULL SLEEVES V/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low ribbed V neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low ribbed V neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 599.00, 599.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-v-neck-2', '', '', '', 'OT 033', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(127, 15, 14, 6, 'FULL SLEEVES CREW NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Crew neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort  , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Crew neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort  , Brushed interlock fabric for extra heat', 620.00, 620.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-crew-neck-2', '', '', '', 'OT 024', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(128, 15, 14, 6, '3/4TH SLEEVE U/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 510.00, 510.00, NULL, '1 PC', '5 PC PACK', 'all', '3-4th-sleeve-u-neck', '', '', '', 'OT 041', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(129, 15, 14, 6, '3/4TH SLEEVE U/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 499.00, 499.00, NULL, '1 PC', '5 PC PACK', 'all', '3-4th-sleeve-u-neck-2', '', '', '', 'OT 051', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(130, 15, 14, 6, 'SLEEVELESS SLIP', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 430.00, 430.00, NULL, '1 PC', '5 PC PACK', 'all', 'sleeveless-slip', '', '', '', 'OT 042', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(131, 15, 14, 6, 'SLEEVELESS SLIP', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded U neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Label free for all day comfort , Brushed interlock fabric for extra heat', 420.00, 420.00, NULL, '1 PC', '5 PC PACK', 'all', 'sleeveless-slip-2', '', '', '', 'OT 052', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21'),
(132, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 510.00, 510.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser-3', '', '', '', 'OT 046', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(133, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 499.00, 499.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser-4', '', '', '', 'OT 056', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(134, 9, 14, 6, 'FULL SLEEVES R/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 350.00, 350.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-r-neck-2', '', '', '', 'OT 061', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(135, 9, 14, 6, 'FULL SLEEVES R/NECK', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 'Made from premium Cotton rich supreme fabric , Low self folded round neck design perfect for layering , Ultrasoft texture renders superior comfort & warmth , Full sleeves offer full coverage , Label free for all day comfort , Brushed interlock fabric for extra heat', 340.00, 340.00, NULL, '1 PC', '5 PC PACK', 'all', 'full-sleeves-r-neck-3', '', '', '', 'OT 071', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(136, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 350.00, 350.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser-5', '', '', '', 'OT 066', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(137, 15, 13, 6, 'TROUSER', 'uploads/product/polo_tshirt_front.png', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 'Made from premium Cotton rich supreme fabric , Double layered contoured pouch with fly for added comfort , Durable and soft fabric covered elasticated waistband , Ultrasoft texture renders superior comfort & warmth , Ribbed cuffs prevent riding up , Label free for all day comfort', 340.00, 340.00, NULL, '1 PC', '5 PC PACK', 'all', 'trouser-6', '', '', '', 'OT 076', 0, 0, 1, '2022-03-07 22:39:35', '2022-03-07 22:39:35'),
(138, 14, 4, 2, 'NO SHOW SOCKS', 'uploads/product/polo_tshirt_front.png', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 'Elastane body for maximum comfort and stretch , Elastane welt for a no-sag grip , Ultra soft cotton for smooth feel , Endure freshness', 85.00, 85.00, 'Free size', '1 PC PACK', '1 BOX = 10 PAIR\r\n', 'all', 'no-show-socks-2', '', '', '', 'OF 3001 B', 0, 0, 1, '2022-03-07 22:39:28', '2022-03-07 22:39:28'),
(139, 10, 2, 4, 'HOSIERY HALF PANT\r\n', 'uploads/product/product_images/771/771-1.jpg', 'Supreme combed cotton rich fabric , Both side pocket with one side zipper , Back pocket for extra comfort , Contast side panel , Available in attractive color\r\n', 'Supreme combed cotton rich fabric , Both side pocket with one side zipper , Back pocket for extra comfort , Contast side panel , Available in attractive color\r\n', 549.00, 549.00, 'S: 70-75 M: 80-85 L: 90-95 XL: 100-105 | XXL: 110-115\n', '1 PC', '5 PC PACK', 'Men', 'hosiery-half-pant', '', '', '', '772', 0, 0, 1, '2022-03-07 22:39:21', '2022-03-07 22:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `color_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_color_sizes`
--

CREATE TABLE `product_color_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `color` bigint(20) NOT NULL,
  `size` bigint(20) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `offer_price` double(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL DEFAULT '1',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color_sizes`
--

INSERT INTO `product_color_sizes` (`id`, `product_id`, `color`, `size`, `price`, `offer_price`, `stock`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 38, 11, 1, 530.00, 530.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(2, 38, 11, 2, 530.00, 530.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(3, 38, 11, 3, 530.00, 530.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(4, 38, 11, 4, 530.00, 530.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(5, 38, 11, 5, 550.00, 550.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(6, 38, 11, 6, 550.00, 550.00, 1, NULL, 1, '2022-03-06 20:39:28', '2022-03-25 08:17:10'),
(7, 38, 11, 7, 550.00, 550.00, 1, NULL, 1, '2022-03-06 20:39:28', '2022-03-25 08:17:10'),
(9, 39, 12, 1, 520.00, 520.00, 1, NULL, 1, '2022-03-06 20:39:28', '2022-03-25 08:17:10'),
(10, 39, 12, 2, 520.00, 520.00, 1, NULL, 1, '2022-03-06 20:39:28', '2022-03-25 08:17:10'),
(11, 39, 12, 3, 520.00, 520.00, 1, NULL, 1, '2022-03-06 20:39:28', '2022-03-25 08:17:10'),
(12, 39, 12, 4, 520.00, 520.00, 1, NULL, 1, '2022-03-20 18:00:33', '2022-03-25 08:17:10'),
(13, 39, 12, 5, 540.00, 540.00, 1, NULL, 1, '2022-03-20 18:01:16', '2022-03-25 08:17:10'),
(14, 39, 12, 6, 540.00, 540.00, 1, NULL, 1, '2022-03-20 18:01:16', '2022-03-25 08:17:10'),
(15, 39, 12, 7, 540.00, 540.00, 1, NULL, 1, '2022-03-20 18:01:16', '2022-03-25 08:17:10'),
(17, 13, 12, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(18, 13, 12, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(19, 13, 12, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(20, 13, 12, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(21, 13, 12, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(22, 13, 12, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(23, 13, 12, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(24, 13, 12, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(25, 13, 1, 0, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(26, 13, 1, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(27, 13, 1, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(28, 13, 1, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(29, 13, 1, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(30, 13, 1, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(31, 13, 1, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(32, 13, 1, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(33, 13, 13, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(34, 13, 13, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(35, 13, 13, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(36, 13, 13, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(37, 13, 13, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(38, 13, 13, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(39, 13, 13, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(40, 13, 13, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(41, 13, 14, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(42, 13, 14, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(43, 13, 14, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(44, 13, 14, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(45, 13, 14, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(46, 13, 14, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(47, 13, 14, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(48, 13, 14, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(49, 13, 15, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(50, 13, 15, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(51, 13, 15, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(52, 13, 15, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(53, 13, 15, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(54, 13, 15, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(55, 13, 15, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(56, 13, 15, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(57, 13, 16, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(58, 13, 16, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(59, 13, 16, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(60, 13, 16, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(61, 13, 16, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(62, 13, 16, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(63, 13, 16, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(64, 13, 16, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(65, 13, 17, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(66, 13, 17, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(67, 13, 17, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(68, 13, 17, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(69, 13, 17, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(70, 13, 17, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(71, 13, 17, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(72, 13, 17, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(73, 13, 11, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(74, 13, 11, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(75, 13, 11, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(76, 13, 11, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(77, 13, 11, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(78, 13, 11, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(79, 13, 11, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(80, 13, 11, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(81, 13, 9, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(82, 13, 9, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(83, 13, 9, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(84, 13, 9, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(85, 13, 9, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(86, 13, 9, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(87, 13, 9, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(88, 13, 9, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(89, 13, 5, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(90, 13, 5, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(91, 13, 5, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(92, 13, 5, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(93, 13, 5, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(94, 13, 5, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(95, 13, 5, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(96, 13, 5, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(97, 13, 18, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(98, 13, 18, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(99, 13, 18, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(100, 13, 18, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(101, 13, 18, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(102, 13, 18, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(103, 13, 18, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(104, 13, 18, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(105, 13, 19, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(106, 13, 19, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(107, 13, 19, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(108, 13, 19, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(109, 13, 19, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(110, 13, 19, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(111, 13, 19, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(112, 13, 19, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(113, 13, 20, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(114, 13, 20, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(115, 13, 20, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(116, 13, 20, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(117, 13, 20, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(118, 13, 20, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(119, 13, 20, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(120, 13, 20, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(121, 13, 21, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(122, 13, 21, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(123, 13, 21, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(124, 13, 21, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(125, 13, 21, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(126, 13, 21, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(127, 13, 21, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(128, 13, 21, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(129, 13, 22, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(130, 13, 22, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(131, 13, 22, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(132, 13, 22, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(133, 13, 22, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(134, 13, 22, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(135, 13, 22, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(136, 13, 22, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(137, 13, 23, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(138, 13, 23, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(139, 13, 23, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(140, 13, 23, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(141, 13, 23, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(142, 13, 23, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(143, 13, 23, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(144, 13, 23, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(145, 13, 24, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(146, 13, 24, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(147, 13, 24, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(148, 13, 24, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(149, 13, 24, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(150, 13, 24, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(151, 13, 24, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(152, 13, 24, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(153, 13, 25, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(154, 13, 25, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(155, 13, 25, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(156, 13, 25, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(157, 13, 25, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(158, 13, 25, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(159, 13, 25, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(160, 13, 25, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(161, 13, 26, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(162, 13, 26, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(163, 13, 26, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(164, 13, 26, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(165, 13, 26, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(166, 13, 26, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(167, 13, 26, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(168, 13, 26, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(169, 13, 27, 1, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(170, 13, 27, 2, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(171, 13, 27, 3, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(172, 13, 27, 4, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(173, 13, 27, 5, 399.00, 399.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(174, 13, 27, 6, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(175, 13, 27, 7, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(176, 13, 27, 8, 425.00, 425.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(177, 12, 12, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(178, 12, 12, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(179, 12, 12, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(180, 12, 12, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(181, 12, 12, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(182, 12, 12, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(183, 12, 12, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(184, 12, 12, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(185, 12, 1, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(186, 12, 1, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(187, 12, 1, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(188, 12, 1, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(189, 12, 1, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(190, 12, 1, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(191, 12, 1, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(192, 12, 1, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(193, 12, 13, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(194, 12, 13, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(195, 12, 13, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(196, 12, 13, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(197, 12, 13, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(198, 12, 13, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(199, 12, 13, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(200, 12, 13, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(201, 12, 16, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(202, 12, 16, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(203, 12, 16, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(204, 12, 16, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(205, 12, 16, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(206, 12, 16, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(207, 12, 16, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(208, 12, 16, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(209, 12, 17, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(210, 12, 17, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(211, 12, 17, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(212, 12, 17, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(213, 12, 17, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(214, 12, 17, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(215, 12, 17, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(216, 12, 17, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(217, 12, 11, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(218, 12, 11, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(219, 12, 11, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(220, 12, 11, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(221, 12, 11, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(222, 12, 11, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(223, 12, 11, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(224, 12, 11, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(225, 12, 18, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(226, 12, 18, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(227, 12, 18, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(228, 12, 18, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(229, 12, 18, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(230, 12, 18, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(231, 12, 18, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(232, 12, 18, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(233, 12, 19, 1, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(234, 12, 19, 2, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(235, 12, 19, 3, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(236, 12, 19, 4, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(237, 12, 19, 5, 410.00, 410.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(238, 12, 19, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(239, 12, 19, 7, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(240, 12, 19, 8, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(241, 14, 11, 1, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(242, 14, 11, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(243, 14, 11, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(244, 14, 11, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(245, 14, 11, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(246, 14, 11, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(247, 14, 11, 7, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(248, 14, 11, 8, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(249, 14, 13, 1, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(250, 14, 13, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(251, 14, 13, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(252, 14, 13, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(253, 14, 13, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(254, 14, 13, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(255, 14, 13, 7, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(256, 14, 13, 8, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(257, 14, 12, 1, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(258, 14, 12, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(259, 14, 12, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(260, 14, 12, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(261, 14, 12, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(262, 14, 12, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(263, 14, 12, 7, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(264, 14, 12, 8, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(265, 14, 1, 1, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(266, 14, 1, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(267, 14, 1, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(268, 14, 1, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(269, 14, 1, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(270, 14, 1, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(271, 14, 1, 7, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(272, 14, 1, 8, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(273, 15, 24, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(274, 15, 24, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(275, 15, 24, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(276, 15, 24, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(277, 15, 24, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(278, 15, 24, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(279, 15, 24, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(280, 15, 24, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(281, 15, 11, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(282, 15, 11, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(283, 15, 11, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(284, 15, 11, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(285, 15, 11, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(286, 15, 11, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(287, 15, 11, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(288, 15, 11, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(289, 15, 28, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(290, 15, 28, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(291, 15, 28, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(292, 15, 28, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(293, 15, 28, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(294, 15, 28, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(295, 15, 28, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(296, 15, 28, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(297, 15, 29, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(298, 15, 29, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(299, 15, 29, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(300, 15, 29, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(301, 15, 29, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(302, 15, 29, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(303, 15, 29, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(304, 15, 29, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(305, 15, 19, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(306, 15, 19, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(307, 15, 19, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(308, 15, 19, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(309, 15, 19, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(310, 15, 19, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(311, 15, 19, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(312, 15, 19, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(313, 15, 30, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(314, 15, 30, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(315, 15, 30, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(316, 15, 30, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(317, 15, 30, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(318, 15, 30, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(319, 15, 30, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(320, 15, 30, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(321, 15, 17, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(322, 15, 17, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(323, 15, 17, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(324, 15, 17, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(325, 15, 17, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(326, 15, 17, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(327, 15, 17, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(328, 15, 17, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(329, 15, 25, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(330, 15, 25, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(331, 15, 25, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(332, 15, 25, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(333, 15, 25, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(334, 15, 25, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(335, 15, 25, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(336, 15, 25, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(337, 15, 13, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(338, 15, 13, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(339, 15, 13, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(340, 15, 13, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(341, 15, 13, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(342, 15, 13, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(343, 15, 13, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(344, 15, 13, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(345, 15, 4, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(346, 15, 4, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(347, 15, 4, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(348, 15, 4, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(349, 15, 4, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(350, 15, 4, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(351, 15, 4, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(352, 15, 4, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(353, 15, 31, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(354, 15, 31, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(355, 15, 31, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(356, 15, 31, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(357, 15, 31, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(358, 15, 31, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(359, 15, 31, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(360, 15, 31, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(361, 15, 26, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(362, 15, 26, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(363, 15, 26, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(364, 15, 26, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(365, 15, 26, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(366, 15, 26, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(367, 15, 26, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(368, 15, 26, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(369, 15, 9, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(370, 15, 9, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(371, 15, 9, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(372, 15, 9, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(373, 15, 9, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(374, 15, 9, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(375, 15, 9, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(376, 15, 9, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(377, 15, 1, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(378, 15, 1, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(379, 15, 1, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(380, 15, 1, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(381, 15, 1, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(382, 15, 1, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(383, 15, 1, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(384, 15, 1, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(385, 15, 12, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(386, 15, 12, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(387, 15, 12, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(388, 15, 12, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(389, 15, 12, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(390, 15, 12, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(391, 15, 12, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(392, 15, 12, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(393, 15, 32, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(394, 15, 32, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(395, 15, 32, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(396, 15, 32, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(397, 15, 32, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(398, 15, 32, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(399, 15, 32, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(400, 15, 32, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(401, 15, 33, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(402, 15, 33, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(403, 15, 33, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(404, 15, 33, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(405, 15, 33, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(406, 15, 33, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(407, 15, 33, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(408, 15, 33, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(409, 15, 34, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(410, 15, 34, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(411, 15, 34, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(412, 15, 34, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(413, 15, 34, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(414, 15, 34, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(415, 15, 34, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(416, 15, 34, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(417, 15, 35, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(418, 15, 35, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(419, 15, 35, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(420, 15, 35, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(421, 15, 35, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(422, 15, 35, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(423, 15, 35, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(424, 15, 35, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(425, 15, 36, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(426, 15, 36, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(427, 15, 36, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(428, 15, 36, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(429, 15, 36, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(430, 15, 36, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(431, 15, 36, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(432, 15, 36, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(433, 15, 37, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(434, 15, 37, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(435, 15, 37, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(436, 15, 37, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(437, 15, 37, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(438, 15, 37, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(439, 15, 37, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(440, 15, 37, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(441, 15, 38, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(442, 15, 38, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(443, 15, 38, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(444, 15, 38, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(445, 15, 38, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(446, 15, 38, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(447, 15, 38, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(448, 15, 38, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(449, 15, 15, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(450, 15, 15, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(451, 15, 15, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(452, 15, 15, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(453, 15, 15, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(454, 15, 15, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(455, 15, 15, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(456, 15, 15, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(457, 15, 39, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(458, 15, 39, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(459, 15, 39, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(460, 15, 39, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(461, 15, 39, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(462, 15, 39, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(463, 15, 39, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(464, 15, 39, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(465, 15, 40, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(466, 15, 40, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(467, 15, 40, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(468, 15, 40, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(469, 15, 40, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(470, 15, 40, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(471, 15, 40, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(472, 15, 40, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(473, 15, 41, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(474, 15, 41, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(475, 15, 41, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(476, 15, 41, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(477, 15, 41, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(478, 15, 41, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(479, 15, 41, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(480, 15, 41, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(481, 15, 42, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(482, 15, 42, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(483, 15, 42, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(484, 15, 42, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(485, 15, 42, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(486, 15, 42, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(487, 15, 42, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(488, 15, 42, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(489, 15, 22, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(490, 15, 22, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(491, 15, 22, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(492, 15, 22, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(493, 15, 22, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(494, 15, 22, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(495, 15, 22, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(496, 15, 22, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(497, 15, 43, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(498, 15, 43, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(499, 15, 43, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(500, 15, 43, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(501, 15, 43, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(502, 15, 43, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(503, 15, 43, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(504, 15, 43, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(505, 15, 44, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(506, 15, 44, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(507, 15, 44, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(508, 15, 44, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(509, 15, 44, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(510, 15, 44, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(511, 15, 44, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(512, 15, 44, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(513, 15, 45, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(514, 15, 45, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(515, 15, 45, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(516, 15, 45, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(517, 15, 45, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(518, 15, 45, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(519, 15, 45, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(520, 15, 45, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(521, 15, 46, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(522, 15, 46, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(523, 15, 46, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(524, 15, 46, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(525, 15, 46, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(526, 15, 46, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(527, 15, 46, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(528, 15, 46, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(529, 15, 47, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(530, 15, 47, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(531, 15, 47, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(532, 15, 47, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(533, 15, 47, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(534, 15, 47, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(535, 15, 47, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(536, 15, 47, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(537, 15, 48, 1, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(538, 15, 48, 2, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(539, 15, 48, 3, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(540, 15, 48, 4, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(541, 15, 48, 5, 575.00, 575.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(542, 15, 48, 6, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(543, 15, 48, 7, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(544, 15, 48, 8, 599.00, 599.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(545, 54, 49, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(546, 54, 49, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(547, 54, 49, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(548, 54, 49, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(549, 54, 49, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(550, 54, 49, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(551, 54, 49, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(552, 54, 49, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(553, 54, 50, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(554, 54, 50, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(555, 54, 50, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(556, 54, 50, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(557, 54, 50, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10');
INSERT INTO `product_color_sizes` (`id`, `product_id`, `color`, `size`, `price`, `offer_price`, `stock`, `code`, `status`, `created_at`, `updated_at`) VALUES
(558, 54, 50, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(559, 54, 50, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(560, 54, 50, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(561, 54, 51, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(562, 54, 51, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(563, 54, 51, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(564, 54, 51, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(565, 54, 51, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(566, 54, 51, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(567, 54, 51, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(568, 54, 51, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(569, 54, 52, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(570, 54, 52, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(571, 54, 52, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(572, 54, 52, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(573, 54, 52, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(574, 54, 52, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(575, 54, 52, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(576, 54, 52, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(577, 54, 53, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(578, 54, 53, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(579, 54, 53, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(580, 54, 53, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(581, 54, 53, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(582, 54, 53, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(583, 54, 53, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(584, 54, 53, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(585, 54, 54, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(586, 54, 54, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(587, 54, 54, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(588, 54, 54, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(589, 54, 54, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(590, 54, 54, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(591, 54, 54, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(592, 54, 54, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(593, 54, 55, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(594, 54, 55, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(595, 54, 55, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(596, 54, 55, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(597, 54, 55, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(598, 54, 55, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(599, 54, 55, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(600, 54, 55, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(601, 54, 56, 1, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(602, 54, 56, 2, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(603, 54, 56, 3, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(604, 54, 56, 4, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(605, 54, 56, 5, 590.00, 590.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(606, 54, 56, 6, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(607, 54, 56, 7, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(608, 54, 56, 8, 615.00, 615.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(609, 55, 11, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(610, 55, 11, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(611, 55, 11, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(612, 55, 11, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(613, 55, 11, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(614, 55, 11, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(615, 55, 11, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(616, 55, 11, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(617, 55, 13, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(618, 55, 13, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(619, 55, 13, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(620, 55, 13, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(621, 55, 13, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(622, 55, 13, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(623, 55, 13, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(624, 55, 13, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(625, 55, 17, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(626, 55, 17, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(627, 55, 17, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(628, 55, 17, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(629, 55, 17, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(630, 55, 17, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(631, 55, 17, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(632, 55, 17, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(633, 55, 27, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(634, 55, 27, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(635, 55, 27, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(636, 55, 27, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(637, 55, 27, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(638, 55, 27, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(639, 55, 27, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(640, 55, 27, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(641, 55, 9, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(642, 55, 9, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(643, 55, 9, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(644, 55, 9, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(645, 55, 9, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(646, 55, 9, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(647, 55, 9, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(648, 55, 9, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(649, 55, 12, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(650, 55, 12, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(651, 55, 12, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(652, 55, 12, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(653, 55, 12, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(654, 55, 12, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(655, 55, 12, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(656, 55, 12, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(657, 55, 18, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(658, 55, 18, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(659, 55, 18, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(660, 55, 18, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(661, 55, 18, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(662, 55, 18, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(663, 55, 18, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(664, 55, 18, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(665, 55, 1, 1, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(666, 55, 1, 2, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(667, 55, 1, 3, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(668, 55, 1, 4, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(669, 55, 1, 5, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(670, 55, 1, 6, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(671, 55, 1, 7, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(672, 55, 1, 8, 475.00, 475.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(673, 57, 1, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(674, 57, 1, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(675, 57, 1, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(676, 57, 1, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(677, 57, 1, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(678, 57, 30, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(679, 57, 30, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(680, 57, 30, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(681, 57, 30, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(682, 57, 30, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(683, 57, 13, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(684, 57, 13, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(685, 57, 13, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(686, 57, 13, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(687, 57, 13, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(688, 57, 10, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(689, 57, 10, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(690, 57, 10, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(691, 57, 10, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(692, 57, 10, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(693, 57, 26, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(694, 57, 26, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(695, 57, 26, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(696, 57, 26, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(697, 57, 26, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(698, 57, 11, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(699, 57, 11, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(700, 57, 11, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(701, 57, 11, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(702, 57, 11, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(703, 57, 43, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(704, 57, 43, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(705, 57, 43, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(706, 57, 43, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(707, 57, 43, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(708, 57, 12, 2, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(709, 57, 12, 3, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(710, 57, 12, 4, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(711, 57, 12, 5, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(712, 57, 12, 6, 525.00, 525.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(713, 59, 30, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(714, 59, 30, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(715, 59, 30, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(716, 59, 30, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(717, 59, 30, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(718, 59, 30, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(719, 59, 30, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(720, 59, 30, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(721, 59, 30, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(722, 59, 30, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(723, 59, 30, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(724, 59, 30, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(725, 59, 1, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(726, 59, 1, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(727, 59, 1, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(728, 59, 1, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(729, 59, 1, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(730, 59, 1, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(731, 59, 1, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(732, 59, 1, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(733, 59, 1, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(734, 59, 1, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(735, 59, 1, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(736, 59, 1, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(737, 59, 24, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(738, 59, 24, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(739, 59, 24, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(740, 59, 24, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(741, 59, 24, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(742, 59, 24, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(743, 59, 24, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(744, 59, 24, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(745, 59, 24, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(746, 59, 24, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(747, 59, 24, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(748, 59, 24, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(749, 59, 16, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(750, 59, 16, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(751, 59, 16, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(752, 59, 16, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(753, 59, 16, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(754, 59, 16, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(755, 59, 16, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(756, 59, 16, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(757, 59, 16, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(758, 59, 16, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(759, 59, 16, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(760, 59, 16, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(761, 59, 17, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(762, 59, 17, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(763, 59, 17, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(764, 59, 17, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(765, 59, 17, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(766, 59, 17, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(767, 59, 17, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(768, 59, 17, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(769, 59, 17, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(770, 59, 17, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(771, 59, 17, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(772, 59, 17, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(773, 59, 5, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(774, 59, 5, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(775, 59, 5, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(776, 59, 5, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(777, 59, 5, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(778, 59, 5, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(779, 59, 5, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(780, 59, 5, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(781, 59, 5, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(782, 59, 5, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(783, 59, 5, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(784, 59, 5, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(785, 59, 11, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(786, 59, 11, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(787, 59, 11, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(788, 59, 11, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(789, 59, 11, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(790, 59, 11, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(791, 59, 11, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(792, 59, 11, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(793, 59, 11, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(794, 59, 11, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(795, 59, 11, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(796, 59, 11, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(797, 59, 12, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(798, 59, 12, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(799, 59, 12, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(800, 59, 12, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(801, 59, 12, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(802, 59, 12, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(803, 59, 12, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(804, 59, 12, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(805, 59, 12, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(806, 59, 12, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(807, 59, 12, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(808, 59, 12, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(809, 59, 13, 11, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(810, 59, 13, 12, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(811, 59, 13, 13, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(812, 59, 13, 14, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(813, 59, 13, 15, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(814, 59, 13, 16, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(815, 59, 13, 17, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(816, 59, 13, 18, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(817, 59, 13, 19, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(818, 59, 13, 20, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(819, 59, 13, 21, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(820, 59, 13, 22, 499.00, 499.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(821, 60, 11, 11, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(822, 60, 11, 12, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(823, 60, 11, 13, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(824, 60, 11, 14, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(825, 60, 11, 15, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(826, 60, 11, 16, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(827, 60, 11, 17, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(828, 60, 11, 18, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(829, 60, 11, 19, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(830, 60, 11, 20, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(831, 60, 11, 21, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(832, 60, 11, 22, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(833, 60, 13, 11, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(834, 60, 13, 12, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(835, 60, 13, 13, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(836, 60, 13, 14, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(837, 60, 13, 15, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(838, 60, 13, 16, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(839, 60, 13, 17, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(840, 60, 13, 18, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(841, 60, 13, 19, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(842, 60, 13, 20, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(843, 60, 13, 21, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(844, 60, 13, 22, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(845, 60, 27, 11, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(846, 60, 27, 12, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(847, 60, 27, 13, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(848, 60, 27, 14, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(849, 60, 27, 15, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(850, 60, 27, 16, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(851, 60, 27, 17, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(852, 60, 27, 18, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(853, 60, 27, 19, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(854, 60, 27, 20, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(855, 60, 27, 21, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(856, 60, 27, 22, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(857, 60, 18, 11, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(858, 60, 18, 12, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(859, 60, 18, 13, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(860, 60, 18, 14, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(861, 60, 18, 15, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(862, 60, 18, 16, 320.00, 320.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(863, 60, 18, 17, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(864, 60, 18, 18, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(865, 60, 18, 19, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(866, 60, 18, 20, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(867, 60, 18, 21, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(868, 60, 18, 22, 380.00, 380.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(869, 91, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(870, 91, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(871, 91, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(872, 91, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(873, 91, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(874, 91, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(875, 91, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(876, 91, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(877, 91, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(878, 91, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(879, 91, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(880, 91, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(881, 91, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(882, 91, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(883, 91, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(884, 92, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(885, 92, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(886, 92, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(887, 92, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(888, 92, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(889, 92, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(890, 92, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(891, 92, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(892, 92, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(893, 92, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(894, 92, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(895, 92, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(896, 92, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(897, 92, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(898, 92, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(899, 93, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(900, 93, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(901, 93, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(902, 93, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(903, 93, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(904, 93, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(905, 93, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(906, 93, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(907, 93, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(908, 93, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(909, 93, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(910, 93, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(911, 93, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(912, 93, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(913, 93, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(914, 94, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(915, 94, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(916, 94, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(917, 94, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(918, 94, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(919, 94, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(920, 94, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(921, 94, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(922, 94, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(923, 94, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(924, 94, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(925, 94, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(926, 94, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(927, 94, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(928, 94, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(929, 95, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(930, 95, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(931, 95, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(932, 95, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(933, 95, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(934, 95, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(935, 95, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(936, 95, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(937, 95, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(938, 95, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(939, 95, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(940, 95, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(941, 95, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(942, 95, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(943, 95, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(944, 96, 11, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(945, 96, 11, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(946, 96, 11, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(947, 96, 11, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(948, 96, 11, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(949, 96, 14, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(950, 96, 14, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(951, 96, 14, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(952, 96, 14, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(953, 96, 14, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(954, 96, 13, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(955, 96, 13, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(956, 96, 13, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(957, 96, 13, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(958, 96, 13, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(959, 96, 1, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(960, 96, 1, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(961, 96, 1, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(962, 96, 1, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(963, 96, 1, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(964, 97, 14, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(965, 97, 14, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(966, 97, 14, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(967, 97, 14, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(968, 97, 14, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(969, 97, 13, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(970, 97, 13, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(971, 97, 13, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(972, 97, 13, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(973, 97, 13, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(974, 97, 1, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(975, 97, 1, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(976, 97, 1, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(977, 97, 1, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(978, 97, 1, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(979, 98, 11, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(980, 98, 11, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(981, 98, 11, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(982, 98, 11, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(983, 98, 11, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(984, 98, 14, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(985, 98, 14, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(986, 98, 14, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(987, 98, 14, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(988, 98, 14, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(989, 98, 13, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(990, 98, 13, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(991, 98, 13, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(992, 98, 13, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(993, 98, 13, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(994, 99, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(995, 99, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(996, 99, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(997, 99, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(998, 99, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(999, 99, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1000, 99, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1001, 99, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1002, 99, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1003, 99, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1004, 99, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1005, 99, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1006, 99, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1007, 99, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1008, 99, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1009, 100, 11, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1010, 100, 11, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1011, 100, 11, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1012, 100, 11, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1013, 100, 11, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1014, 100, 14, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1015, 100, 14, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1016, 100, 14, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1017, 100, 14, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1018, 100, 14, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1019, 100, 13, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1020, 100, 13, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1021, 100, 13, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1022, 100, 13, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1023, 100, 13, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1024, 101, 11, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1025, 101, 11, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1026, 101, 11, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1027, 101, 11, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1028, 101, 11, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1029, 101, 14, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1030, 101, 14, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1031, 101, 14, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1032, 101, 14, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1033, 101, 14, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1034, 101, 13, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1035, 101, 13, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1036, 101, 13, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1037, 101, 13, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1038, 101, 13, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1039, 101, 42, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1040, 101, 42, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1041, 101, 42, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1042, 101, 42, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1043, 101, 42, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1044, 101, 57, 2, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1045, 101, 57, 3, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1046, 101, 57, 4, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1047, 101, 57, 5, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1048, 101, 57, 6, 899.00, 899.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1049, 102, 11, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1050, 102, 11, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1051, 102, 11, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1052, 102, 11, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1053, 102, 11, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1054, 102, 58, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1055, 102, 58, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1056, 102, 58, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1057, 102, 58, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1058, 102, 58, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1059, 102, 13, 2, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1060, 102, 13, 3, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1061, 102, 13, 4, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1062, 102, 13, 5, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1063, 102, 13, 6, 849.00, 849.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1064, 103, 11, 2, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1065, 103, 11, 3, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1066, 103, 11, 4, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1067, 103, 11, 5, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1068, 103, 11, 6, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1069, 103, 13, 2, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1070, 103, 13, 3, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1071, 103, 13, 4, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1072, 103, 13, 5, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1073, 103, 13, 6, 699.00, 699.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1074, 104, 11, 2, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1075, 104, 11, 3, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1076, 104, 11, 4, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1077, 104, 11, 5, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1078, 104, 11, 6, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1079, 104, 58, 2, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1080, 104, 58, 3, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1081, 104, 58, 4, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1082, 104, 58, 5, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1083, 104, 58, 6, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1084, 104, 13, 2, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1085, 104, 13, 3, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1086, 104, 13, 4, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1087, 104, 13, 5, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1088, 104, 13, 6, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1089, 104, 39, 2, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1090, 104, 39, 3, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1091, 104, 39, 4, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1092, 104, 39, 5, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1093, 104, 39, 6, 650.00, 650.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1094, 139, 11, 2, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1095, 139, 11, 3, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1096, 139, 11, 4, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1097, 139, 11, 5, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1098, 139, 11, 6, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1099, 139, 58, 2, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1100, 139, 58, 3, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1101, 139, 58, 4, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1102, 139, 58, 5, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1103, 139, 58, 6, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1104, 139, 13, 2, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1105, 139, 13, 3, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1106, 139, 13, 4, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1107, 139, 13, 5, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10');
INSERT INTO `product_color_sizes` (`id`, `product_id`, `color`, `size`, `price`, `offer_price`, `stock`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1108, 139, 13, 6, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1109, 139, 24, 2, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1110, 139, 24, 3, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1111, 139, 24, 4, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1112, 139, 24, 5, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1113, 139, 24, 6, 549.00, 549.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1114, 58, 11, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1115, 58, 11, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1116, 58, 11, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1117, 58, 11, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1118, 58, 11, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1119, 58, 12, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1120, 58, 12, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1121, 58, 12, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1122, 58, 12, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1123, 58, 12, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1124, 58, 13, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1125, 58, 13, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1126, 58, 13, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1127, 58, 13, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1128, 58, 13, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1129, 58, 1, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1130, 58, 1, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1131, 58, 1, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1132, 58, 1, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1133, 58, 1, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1134, 58, 5, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1135, 58, 5, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1136, 58, 5, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1137, 58, 5, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1138, 58, 5, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1139, 58, 30, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1140, 58, 30, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1141, 58, 30, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1142, 58, 30, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1143, 58, 30, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1144, 58, 10, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1145, 58, 10, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1146, 58, 10, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1147, 58, 10, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1148, 58, 10, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1149, 58, 26, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1150, 58, 26, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1151, 58, 26, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1152, 58, 26, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1153, 58, 26, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1154, 58, 59, 2, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1155, 58, 59, 3, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1156, 58, 59, 4, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1157, 58, 59, 5, 430.00, 430.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10'),
(1158, 58, 59, 6, 450.00, 450.00, 1, NULL, 1, '2022-03-03 13:37:17', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/product/2018121750-1646374037.catago_2.png', 1, '2022-03-04 00:37:17', '2022-03-25 08:17:10'),
(2, 1, 'uploads/product/1835149020-1646374037.catago_2.png', 1, '2022-03-04 00:37:17', '2022-03-25 08:17:10'),
(3, 2, 'uploads/product/1297765330-1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 1, '2022-03-07 07:34:52', '2022-03-25 08:17:10'),
(4, 2, 'uploads/product/382303736-1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 1, '2022-03-07 07:34:52', '2022-03-25 08:17:10'),
(5, 2, 'uploads/product/96013214-1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 1, '2022-03-07 07:34:52', '2022-03-25 08:17:10'),
(6, 2, 'uploads/product/1468366963-1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 1, '2022-03-07 07:34:52', '2022-03-25 08:17:10'),
(7, 2, 'uploads/product/592835868-1646658292.11504776804314-ONN-Men-Tshirts-4151504776804028-1.jpg', 1, '2022-03-07 07:34:52', '2022-03-25 08:17:10'),
(8, 3, 'uploads/product/133599693-1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 1, '2022-03-07 07:39:28', '2022-03-25 08:17:10'),
(9, 3, 'uploads/product/1865585589-1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 1, '2022-03-07 07:39:28', '2022-03-25 08:17:10'),
(10, 3, 'uploads/product/286206409-1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 1, '2022-03-07 07:39:28', '2022-03-25 08:17:10'),
(11, 3, 'uploads/product/1256424426-1646658568.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 1, '2022-03-07 07:39:28', '2022-03-25 08:17:10'),
(12, 71, 'uploads\\product\\product_images\\141\\blue.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(13, 71, 'uploads\\product\\product_images\\141\\red.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(14, 71, 'uploads\\product\\product_images\\141\\green.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(15, 71, 'uploads\\product\\product_images\\141\\orange.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(16, 71, 'uploads\\product\\product_images\\141\\yellow.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(17, 71, 'uploads\\product\\product_images\\141\\purple.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(18, 79, 'uploads\\product\\product_images\\262\\ONN-Grande-262-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(19, 79, 'uploads\\product\\product_images\\262\\ONN-Grande-262-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(20, 79, 'uploads\\product\\product_images\\262\\ONN-Grande-262-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(21, 79, 'uploads\\product\\product_images\\262\\ONN-Grande-262-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(22, 80, 'uploads\\product\\product_images\\264\\ONN-Grande-264-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(23, 80, 'uploads\\product\\product_images\\264\\ONN-Grande-264-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(24, 80, 'uploads\\product\\product_images\\264\\ONN-Grande-264-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(25, 80, 'uploads\\product\\product_images\\264\\ONN-Grande-264-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(26, 81, 'uploads\\product\\product_images\\271\\271-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(27, 81, 'uploads\\product\\product_images\\271\\271-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(28, 81, 'uploads\\product\\product_images\\271\\271-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(29, 81, 'uploads\\product\\product_images\\271\\271-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(30, 82, 'uploads\\product\\product_images\\272\\272-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(31, 82, 'uploads\\product\\product_images\\272\\272-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(32, 82, 'uploads\\product\\product_images\\272\\272-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(33, 82, 'uploads\\product\\product_images\\272\\272-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(34, 83, 'uploads\\product\\product_images\\273\\273-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(35, 83, 'uploads\\product\\product_images\\273\\273-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(36, 83, 'uploads\\product\\product_images\\273\\273-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(37, 83, 'uploads\\product\\product_images\\273\\273-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(38, 84, 'uploads\\product\\product_images\\274\\274-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(39, 84, 'uploads\\product\\product_images\\274\\274-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(40, 84, 'uploads\\product\\product_images\\274\\274-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(41, 84, 'uploads\\product\\product_images\\274\\274-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(42, 13, 'uploads\\product\\product_images\\422\\422-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(43, 13, 'uploads\\product\\product_images\\422\\422-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(44, 13, 'uploads\\product\\product_images\\422\\422-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(45, 13, 'uploads\\product\\product_images\\422\\422-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(46, 13, 'uploads\\product\\product_images\\422\\422-6.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(47, 13, 'uploads\\product\\product_images\\422\\422-7.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(48, 13, 'uploads\\product\\product_images\\422\\422-8.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(49, 13, 'uploads\\product\\product_images\\422\\422-9.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(50, 13, 'uploads\\product\\product_images\\422\\422-10.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(51, 13, 'uploads\\product\\product_images\\422\\422-11.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(52, 13, 'uploads\\product\\product_images\\422\\422-12.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(53, 13, 'uploads\\product\\product_images\\422\\422-13.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(54, 15, 'uploads/product/product_images/431/431-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(55, 15, 'uploads/product/product_images/431/431-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(56, 15, 'uploads/product/product_images/431/431-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(57, 15, 'uploads/product/product_images/431/431-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(58, 15, 'uploads/product/product_images/431/431-6.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(59, 15, 'uploads/product/product_images/431/431-7.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(60, 15, 'uploads/product/product_images/431/431-8.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(61, 15, 'uploads/product/product_images/431/431-9.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(62, 15, 'uploads/product/product_images/431/431-10.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(63, 15, 'uploads/product/product_images/431/431-11.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(64, 15, 'uploads/product/product_images/431/431-12.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(65, 15, 'uploads/product/product_images/431/431-13.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(66, 15, 'uploads/product/product_images/431/431-14.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(67, 15, 'uploads/product/product_images/431/431-15.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(68, 15, 'uploads/product/product_images/431/431-16.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(69, 15, 'uploads/product/product_images/431/431-17.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(70, 15, 'uploads/product/product_images/431/431-18.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(71, 15, 'uploads/product/product_images/431/431-19.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(72, 15, 'uploads/product/product_images/431/431-20.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(73, 15, 'uploads/product/product_images/431/431-21.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(74, 15, 'uploads/product/product_images/431/431-22.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(75, 15, 'uploads/product/product_images/431/431-23.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(76, 15, 'uploads/product/product_images/431/431-24.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(77, 15, 'uploads/product/product_images/431/431-25.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(78, 15, 'uploads/product/product_images/431/431-26.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(79, 15, 'uploads/product/product_images/431/431-27.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(80, 15, 'uploads/product/product_images/431/431-28.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(81, 16, 'uploads/product/product_images/432/432-28.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(82, 16, 'uploads/product/product_images/432/432-27.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(83, 16, 'uploads/product/product_images/432/432-26.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(84, 16, 'uploads/product/product_images/432/432-25.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(85, 16, 'uploads/product/product_images/432/432-24.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(86, 16, 'uploads/product/product_images/432/432-23.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(87, 16, 'uploads/product/product_images/432/432-22.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(88, 16, 'uploads/product/product_images/432/432-21.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(89, 16, 'uploads/product/product_images/432/432-20.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(90, 16, 'uploads/product/product_images/432/432-19.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(91, 16, 'uploads/product/product_images/432/432-18.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(92, 16, 'uploads/product/product_images/432/432-17.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(93, 16, 'uploads/product/product_images/432/432-16.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(94, 16, 'uploads/product/product_images/432/432-15.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(95, 16, 'uploads/product/product_images/432/432-14.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(96, 16, 'uploads/product/product_images/432/432-13.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(97, 16, 'uploads/product/product_images/432/432-12.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(98, 16, 'uploads/product/product_images/432/432-11.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(99, 16, 'uploads/product/product_images/432/432-10.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(100, 16, 'uploads/product/product_images/432/432-9.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(101, 16, 'uploads/product/product_images/432/432-8.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(102, 16, 'uploads/product/product_images/432/432-7.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(103, 16, 'uploads/product/product_images/432/432-6.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(104, 16, 'uploads/product/product_images/432/432-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(105, 16, 'uploads/product/product_images/432/432-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(106, 16, 'uploads/product/product_images/432/432-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(107, 16, 'uploads/product/product_images/432/432-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(108, 57, 'uploads/product/product_images/741/741-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(109, 57, 'uploads/product/product_images/741/741-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(110, 57, 'uploads/product/product_images/741/741-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(111, 57, 'uploads/product/product_images/741/741-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(112, 57, 'uploads/product/product_images/741/741-6.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(113, 57, 'uploads/product/product_images/741/741-7.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(114, 57, 'uploads/product/product_images/741/741-8.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(115, 57, 'uploads/product/product_images/741/741-9.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(116, 58, 'uploads/product/product_images/742/742-9.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(117, 58, 'uploads/product/product_images/742/742-8.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(118, 58, 'uploads/product/product_images/742/742-7.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(119, 58, 'uploads/product/product_images/742/742-6.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(120, 58, 'uploads/product/product_images/742/742-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(121, 58, 'uploads/product/product_images/742/742-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(122, 58, 'uploads/product/product_images/742/742-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(123, 58, 'uploads/product/product_images/742/742-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(124, 91, 'uploads/product/product_images/751/751-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(125, 92, 'uploads/product/product_images/752/752-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(126, 93, 'uploads/product/product_images/753/753-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(127, 94, 'uploads/product/product_images/754/754-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(128, 95, 'uploads/product/product_images/755/755-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(129, 97, 'uploads/product/product_images/757/757-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(130, 98, 'uploads/product/product_images/758/758-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(131, 99, 'uploads/product/product_images/759/759-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(132, 100, 'uploads/product/product_images/760/760-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(133, 105, 'uploads/product/product_images/776/776-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(134, 105, 'uploads/product/product_images/776/776-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(135, 105, 'uploads/product/product_images/776/776-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(136, 105, 'uploads/product/product_images/776/776-5.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(137, 32, 'uploads/product/product_images/1021/1021-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(138, 32, 'uploads/product/product_images/1021/1021-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(139, 32, 'uploads/product/product_images/1021/1021-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(140, 36, 'uploads/product/product_images/1031/1031-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(141, 36, 'uploads/product/product_images/1031/1031-3.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(142, 36, 'uploads/product/product_images/1031/1031-4.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10'),
(143, 37, 'uploads/product/product_images/1032/1032-2.jpg', 1, '2022-03-22 09:02:32', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `page_heading`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about', 'About us page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(2, 'terms', 'Terms page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(3, 'privacy', 'Privacy page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(4, 'cancellation_and_refund', 'Cancellation & Refund page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(5, 'return', 'Return page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(6, 'address', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(7, 'contact_no', '9876543210', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(8, 'email_id', 'help@onn.com', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(9, 'google_map_iframe', NULL, 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(10, 'fb_link', 'https://www.facebook.com/LuxInnerwear/', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(11, 'twitter_link', 'https://twitter.com/Lux_Innerwear', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(12, 'youtube_link', 'https://www.youtube.com/channel/UCsHxH5IoJxIipaNcv1Eg1wA', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(13, 'insta_link', 'https://instagram.com/lux_cozi_innerwear?igshid=9ensolghw1cq', 1, '2022-03-02 13:47:50', '2022-03-25 08:17:10'),
(14, 'disclaimer', 'Disclaimer page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-17 07:24:21', '2022-03-25 08:17:10'),
(15, 'security', 'Security page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-17 07:24:21', '2022-03-25 08:17:10'),
(16, 'shipping_delivery', 'Shipping& delivery page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-17 08:07:07', '2022-03-25 08:17:10'),
(17, 'payment_voucher_promotion', 'payment, voucher & promotions page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-17 08:07:44', '2022-03-25 08:17:10'),
(18, 'service_contact', 'services & contacts page Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, '2022-03-17 08:07:44', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XS', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(2, 'S', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(3, 'M', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(4, 'L', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(5, 'XL', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(6, '2XL', 1, '2022-03-04 00:20:48', '2022-03-25 08:17:10'),
(7, '3XL', 1, '2022-03-10 04:30:59', '2022-03-25 08:17:10'),
(8, '4XL', 1, '2022-03-10 04:30:59', '2022-03-25 08:17:10'),
(9, '1 yr', 1, '2022-03-21 08:16:06', '2022-03-25 08:17:10'),
(10, '2 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(11, '3 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(12, '4 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(13, '5 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(14, '6 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(15, '7 yr', 1, '2022-03-21 08:16:33', '2022-03-25 08:17:10'),
(16, '8 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(17, '9 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(18, '10 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(19, '11 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(20, '12 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(21, '13 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10'),
(22, '14 yr', 1, '2022-03-21 08:16:34', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_mails`
--

CREATE TABLE `subscription_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `count` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `image_path`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 'Men\'s Track Pants', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-track-pants-2', NULL, 1, '2022-03-07 06:06:06', '2022-03-25 08:17:10'),
(3, 9, 'Men\'s T-Shirt ', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-t-shirt', NULL, 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(4, 14, 'Men\'s Socks', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-socks', NULL, 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(5, 5, 'Men\'s Vests', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-vests', NULL, 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(6, 4, 'Kid\'s Boxers', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-boxers', 'kids-boxers', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(7, 6, 'Men\'s Briefs', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-briefs', 'mens-briefs', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(8, 11, 'Men\'s Trunks', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-trunks', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(9, 12, 'Cargos', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'cargos', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(10, 13, 'Men\'s Shorts', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-shorts', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(11, 16, 'Men\'s Jackets', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-jackets', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(12, 17, 'Men\'s Sweatshirts', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'mens-sweatshirts', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(13, 15, 'Trouser', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'trouser', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10'),
(14, 15, 'Arm Sleeves', 'uploads/sub-category/1646658462.11497423783864-ONN-Men-Navy-Blue-Solid-Polo-Collar-T-shirt-491497423783695-5.jpg', 'arm-sleeves', '', 1, '2022-03-07 07:37:42', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `transaction`, `online_payment_id`, `amount`, `currency`, `method`, `description`, `bank`, `upi`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'TXN_98473IG5YDYRUY8IDY8', NULL, 2400.00, 'INR', 'upi', '', '', '', 1, '2022-03-04 11:14:07', '2022-03-25 08:17:10'),
(2, 0, 34, 'TXN_NHL0CLQJW0HU0K1LAR1M', 'pay_JA7VqFzh3JejBE', 1060.00, 'INR', '', '', '', '', 1, '2022-03-22 11:35:11', '2022-03-25 08:17:10'),
(3, 26, 35, 'TXN_Y237OET0GPAA1CUNEICC', 'pay_JAT3w1Yb7n7qcj', 5529.00, 'INR', '', '', '', '', 1, '2022-03-23 08:40:03', '2022-03-25 08:17:10'),
(4, 26, 36, 'TXN_JR9JG4KYB6XZ6VVQ3PYV', 'pay_JAZFtErXoUaH2B', 4400.00, 'INR', '', '', '', '', 1, '2022-03-23 14:43:32', '2022-03-25 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0' COMMENT '1: verified, 0: not verified',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `mobile`, `email_verified_at`, `password`, `otp`, `image`, `gender`, `social_id`, `is_verified`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'John', 'Doe', 'user@user.com', '9876543210', NULL, '$2y$10$.j4o.At9ccvUQxb8aRAoWeg7rN7G4ZMTXE9N.GDtwdBlR1b/6rGLa', NULL, NULL, 'male', NULL, 0, 1, NULL, '2022-03-02 00:34:34', '2022-03-02 00:42:59'),
(2, 'Suvajit Bardhan', 'Suvajit', 'Bardhan', 'user2@user.com', '9038775709', NULL, '$2y$10$.j4o.At9ccvUQxb8aRAoWeg7rN7G4ZMTXE9N.GDtwdBlR1b/6rGLa', NULL, NULL, 'female', NULL, 0, 1, NULL, '2022-03-02 00:59:22', '2022-03-02 01:26:50'),
(3, 'Devasree Dutta', 'Devasree', 'Dutta', 'your.email+fakedata33487@gmail.com', '9876543211', NULL, '$2y$10$.j4o.At9ccvUQxb8aRAoWeg7rN7G4ZMTXE9N.GDtwdBlR1b/6rGLa', NULL, NULL, NULL, NULL, 0, 1, NULL, '2022-03-08 14:07:37', '2022-03-08 14:07:37'),
(23, 'Suvajit Bardhan', 'Suvajit', 'Bardhan', 'suvajit.bardhan@onenesstechs.in', '9038775700', NULL, '$2y$10$dRFF5mcJ0mmo68LNpNWoHe0rgL2PVyZX.3vDCTr/Ax/s61nhYHTKW', NULL, NULL, NULL, NULL, 0, 1, NULL, '2022-03-22 11:38:58', '2022-03-22 11:38:58'),
(26, 'test user', 'test', 'user', 'suvajit.bardhan2@onenesstechs.in', '9038775707', NULL, '$2y$10$SKILCMLj2HOEagGoP6vc1uiOuWDcacnwVSm0GOjVWU3i0/lNR6DtC', NULL, NULL, NULL, NULL, 0, 1, NULL, '2022-03-23 07:55:11', '2022-03-23 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `ip`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, '127.0.0.1', 0, 125, '2022-03-17 09:34:40', '2022-03-25 08:17:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_logs`
--
ALTER TABLE `mail_logs`
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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color_sizes`
--
ALTER TABLE `product_color_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_mails`
--
ALTER TABLE `subscription_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mail_logs`
--
ALTER TABLE `mail_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color_sizes`
--
ALTER TABLE `product_color_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1159;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subscription_mails`
--
ALTER TABLE `subscription_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
