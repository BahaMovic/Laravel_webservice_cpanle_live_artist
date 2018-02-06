-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 11:54 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artist`
--

-- --------------------------------------------------------

--
-- Table structure for table `advimage`
--

CREATE TABLE `advimage` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advimage`
--

INSERT INTO `advimage` (`id`, `url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'images\\16-01-18-04-1826169239_1511886985574089_7478743759259231226_n.jpg', 19, '2018-01-16 14:08:18', '2018-01-16 14:08:18'),
(5, 'images\\04-02-18-09-03pexels-photo-695644.jpg', 11, '2018-02-04 07:52:03', '2018-02-04 07:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ord_from` int(11) NOT NULL DEFAULT '0',
  `ord_to` int(11) NOT NULL DEFAULT '0',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `user_id`, `ord_from`, `ord_to`, `code`, `discount`, `created_at`, `updated_at`) VALUES
(2, 2, 0, 0, '1jDc2', '10', '2018-02-01 12:21:49', '2018-02-01 12:21:49'),
(3, 3, 0, 0, '1jDc2', '10', '2018-02-01 12:21:49', '2018-02-01 12:21:49'),
(4, 21, 0, 0, '1jDc2', '10', '2018-02-01 12:21:49', '2018-02-01 12:21:49'),
(5, 2, 0, 0, 'gZdZO', '10', '2018-02-01 13:17:46', '2018-02-01 13:17:46'),
(6, 21, 0, 0, 'gZdZO', '10', '2018-02-01 13:17:46', '2018-02-01 13:17:46'),
(7, 4, 0, 0, 'KzVMK', '10', '2018-02-05 07:39:52', '2018-02-05 07:39:52'),
(8, 2, 1, 50, 'FPqDj', '20', '2018-02-06 08:47:56', '2018-02-06 08:47:56'),
(9, 3, 1, 50, 'FPqDj', '20', '2018-02-06 08:47:56', '2018-02-06 08:47:56'),
(10, 4, 1, 50, 'FPqDj', '20', '2018-02-06 08:47:56', '2018-02-06 08:47:56'),
(11, 17, 1, 50, 'FPqDj', '20', '2018-02-06 08:47:56', '2018-02-06 08:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'http://images.all-free-download.com/images/graphicthumb/hd_flowers_photo_04_hd_picture_169264.jpg', 6, NULL, NULL),
(2, 'http://images.all-free-download.com/images/graphicthumb/hd_flowers_photo_04_hd_picture_169264.jpg', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `seen`, `user_id`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 'bla bla bla bla hello', 0, 9, 0, NULL, NULL),
(2, 'hrllo', 0, 9, 0, '2018-02-01 11:09:28', '2018-02-01 11:09:28'),
(3, 'world', 0, 9, 0, '2018-02-01 11:09:36', '2018-02-01 11:09:36'),
(5, 'hrl', 0, 4, 0, '2018-02-01 11:10:08', '2018-02-01 11:10:08'),
(6, 'hello bahaa', 1, 11, 0, '2018-02-01 11:22:28', '2018-02-05 10:02:18'),
(7, 'hoo', 1, 11, 23, '2018-02-01 11:26:09', '2018-02-05 12:50:48'),
(8, 'helllllo', 1, 3, 23, '2018-02-01 12:33:07', '2018-02-05 12:50:48'),
(9, 'this is hell ', 1, 3, 23, '2018-02-01 12:33:21', '2018-02-05 12:50:48'),
(10, 'bla bla ', 1, 3, 23, '2018-02-01 12:33:26', '2018-02-05 12:50:48'),
(11, 'bla\'', 1, 3, 23, '2018-02-01 12:33:30', '2018-02-05 12:50:48'),
(12, 'bla\'\'', 1, 3, 23, '2018-02-01 12:33:31', '2018-02-05 12:50:48'),
(13, 'bla\'\'\'', 1, 3, 23, '2018-02-01 12:33:31', '2018-02-05 12:50:48'),
(14, 'bla\'\'\'\'', 1, 3, 23, '2018-02-01 12:33:31', '2018-02-05 12:50:48'),
(15, 'bla\'\'\'\'\'', 1, 3, 23, '2018-02-01 12:33:31', '2018-02-05 12:50:48'),
(16, 'bla\'\'\'\'\'\'', 1, 3, 23, '2018-02-01 12:33:32', '2018-02-05 12:50:48'),
(17, '\'l', 1, 3, 23, '2018-02-01 12:33:55', '2018-02-05 12:50:48'),
(18, 'hkjhk', 1, 3, 23, '2018-02-01 12:34:01', '2018-02-05 12:50:48'),
(19, 'h', 1, 11, 23, '2018-02-01 12:39:43', '2018-02-05 12:50:48'),
(20, 'hh', 1, 11, 23, '2018-02-01 12:39:43', '2018-02-05 12:50:48'),
(21, 'hhh', 1, 11, 23, '2018-02-01 12:39:43', '2018-02-05 12:50:48'),
(22, 'hhhh', 1, 11, 23, '2018-02-01 12:39:43', '2018-02-05 12:50:48'),
(23, 'hhhhh', 1, 11, 23, '2018-02-01 12:39:44', '2018-02-05 12:50:48'),
(24, 'hhhhhh', 1, 11, 23, '2018-02-01 12:39:44', '2018-02-05 12:50:48'),
(25, 'c', 1, 11, 23, '2018-02-01 12:39:50', '2018-02-05 12:50:48'),
(26, 'cc', 1, 11, 23, '2018-02-01 12:39:50', '2018-02-05 12:50:48'),
(27, 'ccc', 1, 11, 23, '2018-02-01 12:39:51', '2018-02-05 12:50:48'),
(28, 'cccc', 1, 11, 23, '2018-02-01 12:39:51', '2018-02-05 12:50:48'),
(29, 'ccccc', 1, 11, 23, '2018-02-01 12:39:51', '2018-02-05 12:50:48'),
(30, 'cccccc', 1, 11, 23, '2018-02-01 12:39:51', '2018-02-05 12:50:48'),
(31, 'ccccccc', 1, 11, 23, '2018-02-01 12:39:51', '2018-02-05 12:50:48'),
(32, 'cccccccc', 1, 11, 23, '2018-02-01 12:39:52', '2018-02-05 12:50:48'),
(33, 'ccccccccc', 1, 11, 23, '2018-02-01 12:39:52', '2018-02-05 12:50:48'),
(34, 'cccccccccc', 1, 11, 23, '2018-02-01 12:39:52', '2018-02-05 12:50:48'),
(35, 'ccccccccccc', 1, 11, 23, '2018-02-01 12:39:52', '2018-02-05 12:50:48'),
(36, 'cccccccccccc', 1, 11, 23, '2018-02-01 12:39:52', '2018-02-05 12:50:48'),
(37, 'ccccccccccccc', 1, 11, 23, '2018-02-01 12:39:53', '2018-02-05 12:50:48'),
(38, 'gfff', 1, 23, 11, '2018-02-05 08:12:17', '2018-02-05 12:50:48'),
(39, 'hello', 1, 22, 11, '2018-02-05 08:17:53', '2018-02-05 10:02:18'),
(40, 'hello', 1, 24, 11, '2018-02-05 08:18:35', '2018-02-05 10:02:18'),
(41, 'hello', 1, 24, 11, '2018-02-05 08:18:36', '2018-02-05 10:02:18'),
(42, 'hhh', 1, 24, 11, '2018-02-05 08:19:12', '2018-02-05 10:02:18'),
(43, 'hh', 1, 11, 11, '2018-02-05 08:21:41', '2018-02-05 10:02:18'),
(44, 'ssssss', 1, 11, 11, '2018-02-05 08:22:02', '2018-02-05 10:02:18'),
(45, 'dffddf', 1, 11, 11, '2018-02-05 08:26:26', '2018-02-05 10:02:18'),
(46, 'dssdsd', 1, 11, 11, '2018-02-05 08:26:50', '2018-02-05 10:02:18'),
(47, 'hello', 1, 22, 11, '2018-02-05 08:32:24', '2018-02-05 10:02:18'),
(48, 'hgfhg', 1, 11, 11, '2018-02-05 08:32:40', '2018-02-05 10:02:18'),
(49, 'hello', 1, 23, 23, '2018-02-05 08:44:56', '2018-02-05 12:50:48'),
(50, 'dfgdfgd', 1, 23, 23, '2018-02-05 08:46:05', '2018-02-05 12:50:48'),
(51, 'hell', 1, 23, 23, '2018-02-05 08:46:27', '2018-02-05 12:50:48'),
(52, 'fdsfsdfsd', 1, 23, 23, '2018-02-05 08:47:34', '2018-02-05 12:50:48'),
(53, 'h', 1, 23, 23, '2018-02-05 08:48:46', '2018-02-05 12:50:48'),
(54, 'ggg', 1, 23, 11, '2018-02-05 08:52:24', '2018-02-05 12:50:48'),
(55, 'sds', 1, 23, 11, '2018-02-05 08:56:54', '2018-02-05 12:50:48'),
(56, 'callll', 1, 23, 11, '2018-02-05 08:57:01', '2018-02-05 12:50:48'),
(57, 'hi', 1, 23, 11, '2018-02-05 08:59:58', '2018-02-05 12:50:48'),
(58, 'gdf', 1, 11, 11, '2018-02-05 09:01:19', '2018-02-05 10:02:18'),
(59, 'gdfgd', 1, 11, 11, '2018-02-05 09:02:20', '2018-02-05 10:02:18'),
(60, 'fd', 1, 11, 11, '2018-02-05 09:04:39', '2018-02-05 10:02:18'),
(61, 'gfgf', 1, 11, 11, '2018-02-05 09:11:09', '2018-02-05 10:02:18'),
(62, 'fff', 1, 11, 11, '2018-02-05 09:12:10', '2018-02-05 10:02:18'),
(63, '', 1, 11, 11, '2018-02-05 09:13:03', '2018-02-05 10:02:18'),
(64, '', 1, 11, 11, '2018-02-05 09:13:25', '2018-02-05 10:02:18'),
(65, '', 1, 11, 11, '2018-02-05 09:13:29', '2018-02-05 10:02:18'),
(66, '', 1, 11, 11, '2018-02-05 09:14:00', '2018-02-05 10:02:18'),
(67, '', 1, 11, 23, '2018-02-05 09:15:42', '2018-02-05 12:50:48'),
(68, 'hello admin', 1, 11, 23, '2018-02-05 09:16:41', '2018-02-05 12:50:48'),
(69, 'hello admin 2', 1, 11, 23, '2018-02-05 09:17:22', '2018-02-05 12:50:48'),
(70, 'dd', 1, 11, 23, '2018-02-05 09:19:17', '2018-02-05 12:50:48'),
(71, '', 1, 11, 23, '2018-02-05 09:20:57', '2018-02-05 12:50:48'),
(72, '', 1, 11, 23, '2018-02-05 09:22:23', '2018-02-05 12:50:48'),
(73, 'dfgdfgdf', 1, 23, 11, '2018-02-05 09:24:21', '2018-02-05 12:50:48'),
(74, 'hello supervisor', 1, 11, 23, '2018-02-05 09:24:42', '2018-02-05 12:50:48'),
(75, 'hello admin', 1, 23, 11, '2018-02-05 09:24:57', '2018-02-05 12:50:48'),
(76, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 11, 23, '2018-02-05 09:25:27', '2018-02-05 12:50:48'),
(77, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 1, 23, 11, '2018-02-05 09:25:43', '2018-02-05 12:50:48'),
(78, 'fdgdfdgf', 1, 23, 11, '2018-02-05 10:01:38', '2018-02-05 12:50:48'),
(79, 'ddddddddddddd', 1, 23, 11, '2018-02-05 10:01:58', '2018-02-05 12:50:48'),
(80, 'dsfsdsdfs', 1, 23, 11, '2018-02-05 10:03:19', '2018-02-05 12:50:48'),
(81, 'hello', 1, 23, 11, '2018-02-05 10:04:29', '2018-02-05 12:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2012_01_08_000000_create_serviceType_table', 1),
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_01_08_012134_create_provider_table', 1),
(11, '2018_01_08_012713_create_service_table', 1),
(12, '2018_01_08_013000_create_images_table', 1),
(15, '2018_01_09_192014_create_orderProvider_table', 2),
(16, '2018_01_09_192048_create_orderUser_table', 2),
(18, '2018_01_10_011207_create_sevices_table', 3),
(21, '2018_01_10_013000_create_rate_table', 4),
(22, '2018_01_10_013404_create_notification_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notific`
--

CREATE TABLE `notific` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_ar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `rate_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notific`
--

INSERT INTO `notific` (`id`, `text`, `text_ar`, `user_id`, `order_id`, `rate_id`, `provider_id`, `created_at`, `updated_at`) VALUES
(2, 'new Order', '', 2, 10, 1, 6, '2018-01-15 11:40:28', '2018-01-15 11:40:28'),
(4, 'There is a new service from bahamovic', 'يوجد خدمة جديدة من bahamovic', 2, 11, 1, 6, '2018-01-17 09:31:37', '2018-01-17 09:31:37'),
(6, 'Service completed baham33ovic12312 and your rate 5', 'تم الانتهاء من طلب baham33ovic12312 وتقيمك 5', 3, 1, 8, 6, '2018-01-17 10:25:07', '2018-01-17 10:25:07'),
(10, 'Service completed as rate you 4', 'تم الانتهاء من طلب as وتقيمك 4', 3, 1, 6, 6, '2018-01-21 19:39:21', '2018-01-21 19:39:21'),
(11, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 9, 1, 52, '2018-01-22 01:12:42', '2018-01-22 01:12:42'),
(12, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 10, 1, 52, '2018-01-22 01:49:53', '2018-01-22 01:49:53'),
(13, 'Service completed ahmed rate you 2.5', 'تم الانتهاء من طلب ahmed وتقيمك 2.5', 17, 1, 7, 52, '2018-01-22 01:53:00', '2018-01-22 01:53:00'),
(14, 'There is a new service from baham33ovic12312', 'يوجد خدمة جديدة من baham33ovic12312', 4, 11, 1, 52, '2018-01-22 20:16:13', '2018-01-22 20:16:13'),
(15, 'There is a new service from baham33ovic12312', 'يوجد خدمة جديدة من baham33ovic12312', 4, 12, 1, 52, '2018-01-22 20:22:24', '2018-01-22 20:22:24'),
(16, 'There is a new service from baham33ovic12312', 'يوجد خدمة جديدة من baham33ovic12312', 4, 13, 1, 52, '2018-01-22 20:24:32', '2018-01-22 20:24:32'),
(17, 'There is a new service from baham33ovic12312', 'يوجد خدمة جديدة من baham33ovic12312', 4, 14, 1, 52, '2018-01-22 20:25:48', '2018-01-22 20:25:48'),
(18, 'There is a new service from baham33ovic12312', 'يوجد خدمة جديدة من baham33ovic12312', 4, 15, 1, 52, '2018-01-23 17:06:35', '2018-01-23 17:06:35'),
(19, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 16, 1, 52, '2018-01-25 00:57:41', '2018-01-25 00:57:41'),
(20, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 17, 1, 52, '2018-01-25 01:00:35', '2018-01-25 01:00:35'),
(21, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 18, 1, 52, '2018-01-25 01:04:22', '2018-01-25 01:04:22'),
(22, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 19, 1, 52, '2018-01-25 01:04:36', '2018-01-25 01:04:36'),
(23, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 20, 1, 52, '2018-01-25 02:15:12', '2018-01-25 02:15:12'),
(24, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 21, 1, 52, '2018-01-25 02:15:27', '2018-01-25 02:15:27'),
(25, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 22, 1, 52, '2018-01-25 02:15:39', '2018-01-25 02:15:39'),
(26, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 23, 1, 6, '2018-01-25 23:28:23', '2018-01-25 23:28:23'),
(27, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 24, 1, 6, '2018-01-25 23:34:25', '2018-01-25 23:34:25'),
(28, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 25, 1, 6, '2018-01-25 23:54:33', '2018-01-25 23:54:33'),
(29, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 26, 1, 52, '2018-01-26 00:00:29', '2018-01-26 00:00:29'),
(30, 'There is a new service from مريم', 'يوجد خدمة جديدة من مريم', 21, 27, 1, 6, '2018-01-30 00:22:24', '2018-01-30 00:22:24'),
(31, 'There is a new service from ahmed', 'يوجد خدمة جديدة من ahmed', 17, 28, 1, 6, '2018-01-30 07:53:47', '2018-01-30 07:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notific_user`
--

CREATE TABLE `notific_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_ar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `rate_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notific_user`
--

INSERT INTO `notific_user` (`id`, `text`, `text_ar`, `type`, `user_id`, `order_id`, `rate_id`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'new Rate', 'لسا بدري', 1, 2, 12, 1, 6, '2018-01-17 09:32:07', '2018-01-17 09:32:07'),
(2, 'Your service has been approved by bahamovic', 'تم الموافقة علي خدمتك من bahamovic', 1, 2, 12, 1, 6, '2018-01-17 09:49:41', '2018-01-17 09:49:41'),
(3, 'Your service has been approved by bahamovic', 'تم الموافقة علي خدمتك من bahamovic', 1, 2, 1, 1, 6, '2018-01-17 09:50:34', '2018-01-17 09:50:34'),
(4, 'Service has been canceled by bahamovic', 'تم رفض الخدمة من قبلbahamovic', 1, 2, 3, 1, 6, '2018-01-17 09:54:18', '2018-01-17 09:54:18'),
(5, 'Service has been canceled by bahamovic', 'تم رفض الخدمة من قبلbahamovic', 1, 2, 1, 1, 6, '2018-01-18 21:22:14', '2018-01-18 21:22:14'),
(6, 'Your service has been approved by bahamovic', 'تم الموافقة علي خدمتك من bahamovic', 1, 2, 1, 1, 6, '2018-01-18 21:24:20', '2018-01-18 21:24:20'),
(7, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 3, 6, 1, 52, '2018-01-21 01:05:29', '2018-01-21 01:05:29'),
(8, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 2, 4, 7, 1, 52, '2018-01-21 01:05:43', '2018-01-21 01:05:43'),
(9, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 4, 5, 1, 52, '2018-01-21 01:21:40', '2018-01-21 01:21:40'),
(10, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 4, 5, 1, 52, '2018-01-21 01:33:08', '2018-01-21 01:33:08'),
(11, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 4, 5, 1, 52, '2018-01-21 01:33:23', '2018-01-21 01:33:23'),
(12, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 4, 5, 1, 52, '2018-01-21 01:33:24', '2018-01-21 01:33:24'),
(13, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 2, 3, 6, 1, 52, '2018-01-21 02:10:17', '2018-01-21 02:10:17'),
(14, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 4, 7, 1, 52, '2018-01-22 01:28:38', '2018-01-22 01:28:38'),
(15, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 3, 8, 1, 52, '2018-01-22 01:28:58', '2018-01-22 01:28:58'),
(16, 'Your service has been approved by bahamovic', 'تم الموافقة علي خدمتك من bahamovic', 1, 2, 1, 1, 6, '2018-01-22 01:29:22', '2018-01-22 01:29:22'),
(17, 'Your service has been approved by bahamovic', 'تم الموافقة علي خدمتك من bahamovic', 1, 2, 1, 1, 6, '2018-01-22 01:33:33', '2018-01-22 01:33:33'),
(18, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:34:43', '2018-01-22 01:34:43'),
(19, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:36:21', '2018-01-22 01:36:21'),
(20, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:36:24', '2018-01-22 01:36:24'),
(21, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:37:59', '2018-01-22 01:37:59'),
(22, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:40:11', '2018-01-22 01:40:11'),
(23, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:41:00', '2018-01-22 01:41:00'),
(24, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:43:29', '2018-01-22 01:43:29'),
(25, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:48:28', '2018-01-22 01:48:28'),
(26, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 2, 17, 9, 1, 52, '2018-01-22 01:50:48', '2018-01-22 01:50:48'),
(27, 'Your service has been approved by eng ezzzzz', 'تم الموافقة علي خدمتك من eng ezzzzz', 2, 17, 9, 1, 52, '2018-01-22 01:52:16', '2018-01-22 01:52:16'),
(28, 'Service has been canceled by eng ezzzzz', 'تم رفض الخدمة من قبلeng ezzzzz', 1, 17, 9, 1, 52, '2018-01-22 01:52:24', '2018-01-22 01:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `orderprovider`
--

CREATE TABLE `orderprovider` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderprovider`
--

INSERT INTO `orderprovider` (`id`, `total`, `active`, `provider_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '120', 1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `old_date` int(11) NOT NULL,
  `date` date NOT NULL,
  `services` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disc_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `active`, `old_date`, `date`, `services`, `time`, `address`, `lat`, `long`, `disc_code`, `provider_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '25', 2, 2, '2018-08-05', 'makeup;haircut', '5.6', '17 st', NULL, '', 'dgdfgerg', 6, 2, '2018-01-15 08:02:25', '2018-01-22 01:33:33'),
(2, '25', 2, 1, '2018-08-05', 'makeup;haircut;hair dry;', '5.6', '17 st', NULL, '', 'dgdfgerg', 6, 2, '2018-01-15 17:38:05', '2018-01-15 17:38:05'),
(3, '140', 1, 0, '2018-01-10', ' ميك اب;استشوار;فرد كرياتين', '2', '17 st saaid elnagar', NULL, '', '5245', 52, 3, NULL, NULL),
(4, '100', 1, 0, '2018-01-03', 'علاج شعر بالكيرياتين', '5', 'دار السلام', NULL, '', 'HGSD', 52, 4, NULL, NULL),
(5, '100', 0, 0, '2018-01-03', 'علاج شعر بالكيرياتين', '5', 'دار السلام', NULL, '', 'HGSD', 52, 4, NULL, '2018-01-21 01:33:24'),
(6, '233', 2, 0, '2018-05-05', 'make up;proten', '5', '17 st saaid elnagar', NULL, '', 'BHAA', 52, 3, '2018-01-21 01:00:40', '2018-01-21 02:10:17'),
(7, '233', 2, 0, '2018-05-05', 'make up;proten;data', '6', 'masr elgdida', NULL, '', 'Discount', 52, 4, '2018-01-21 01:03:15', '2018-01-22 01:28:38'),
(8, '150', 2, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', 'Discount', 52, 3, '2018-01-21 01:04:13', '2018-01-22 01:28:58'),
(9, '150', 0, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', 'Discount', 52, 17, '2018-01-22 01:12:42', '2018-01-22 01:52:24'),
(10, '150', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', 'Discount', 52, 17, '2018-01-22 01:49:53', '2018-01-22 01:49:53'),
(11, '0.0033333333333333335', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', '123123', 52, 4, '2018-01-22 20:16:13', '2018-01-22 20:16:13'),
(12, '75', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', '123123123', 52, 4, '2018-01-22 20:22:24', '2018-01-22 20:22:24'),
(13, '10', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', 'abc', 52, 4, '2018-01-22 20:24:32', '2018-01-22 20:24:32'),
(14, '75', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', NULL, '', 'abc', 52, 4, '2018-01-22 20:25:48', '2018-01-22 20:25:48'),
(15, '150', 1, 0, '2018-05-06', 'heavey;metal;lover', '7', 'old egypt', '12521', '252525', 'abc', 52, 4, '2018-01-23 17:06:35', '2018-01-23 17:06:35'),
(16, '1481408', 1, 0, '2018-01-24', 'o;klpos;klpo;', '19:54', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-25 00:57:41', '2018-01-25 00:57:41'),
(17, '1482908', 1, 0, '2018-01-24', 'o;okll;', '19:54', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-25 01:00:35', '2018-01-25 01:00:35'),
(18, '1500', 1, 0, '0000-00-00', 'o;okll;', '', '', '29.9841238', '31.2527692', '', 52, 17, '2018-01-25 01:04:22', '2018-01-25 01:04:22'),
(19, '2500', 1, 0, '0000-00-00', 'o;', '', '', '29.9841238', '31.2527692', '', 52, 17, '2018-01-25 01:04:36', '2018-01-25 01:04:36'),
(20, '1500', 1, 0, '2018-01-24', 'o;okll', '21:15', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-25 02:15:12', '2018-01-25 02:15:12'),
(21, '1000', 1, 0, '2018-01-24', 'o', '21:15', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-25 02:15:27', '2018-01-25 02:15:27'),
(22, '1500', 1, 0, '2018-01-24', 'o;okll', '21:15', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-25 02:15:39', '2018-01-25 02:15:39'),
(23, '137', 1, 0, '2018-01-19', 'meky;okokok', '18:28', 'Passage of Heba, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '', '', '', 6, 17, '2018-01-25 23:28:23', '2018-01-25 23:28:23'),
(24, '137', 1, 0, '2018-01-13', 'meky;okokok', '18:34', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 6, 17, '2018-01-25 23:34:25', '2018-01-25 23:34:25'),
(25, '137', 1, 0, '2018-01-25', 'meky;okokok', '18:54', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 6, 17, '2018-01-25 23:54:33', '2018-01-25 23:54:33'),
(26, '1500', 1, 0, '2018-01-06', 'o;okll', '19:0', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '', '', '', 52, 17, '2018-01-26 00:00:29', '2018-01-26 00:00:29'),
(27, '15', 1, 0, '2018-01-09', 'meky', '19:21', 'الطريق الدائري، الحي العاشر، مدينة نصر، محافظة القاهرة‬، مصر', '', '', '', 6, 21, '2018-01-30 00:22:23', '2018-01-30 00:22:23'),
(28, '137', 1, 0, '2018-01-30', 'meky;okokok', '2:53', 'السياحه، منشأة البكاري، الهرم، الجيزة، مصر', '', '', '', 6, 17, '2018-01-30 07:53:47', '2018-01-30 07:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `orderuser`
--

CREATE TABLE `orderuser` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderuser`
--

INSERT INTO `orderuser` (`id`, `total`, `provider_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '121', 6, 2, NULL, NULL),
(3, '120', 3, 1, '2018-01-09 23:01:54', '2018-01-09 23:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(800) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg',
  `active` int(11) NOT NULL DEFAULT '1',
  `rate` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tradeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `fullName`, `username`, `image`, `active`, `rate`, `password`, `email`, `tradeName`, `phone`, `address`, `lat`, `long`, `about`, `created_at`, `updated_at`) VALUES
(2, 'sdfsd', 'dsfsf', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'fsdfsdfsd', 'sdfsd', 'sdfsdf', 'fsdsdf', '', '1325654985', '1325654985', '', NULL, NULL),
(3, 'ssadfsd', 'dsasfsf', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'fsdsafsdfsd', 'sdfsasd', 'sdfssadf', 'fsdsasdf', '', '1325654985', '1325654985', '', NULL, NULL),
(6, 'full', 'bahamovic', '/public/images/20-01-18-05-4426907798_1726611207402019_22185334445731930_n.jpg', 1, 0, '123123', 'bahaa@gmail.com', 'trade', '123132321', 'wuwuwuwuuw', '13213232', '321332132', 'adasdadasd', '2018-01-09 17:02:33', '2018-02-04 14:08:43'),
(7, 'bahaa eldin mohamed', 'bahamomo', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123123', 'bahaa.lashin@gmail.com', 'dokan', '01060837560', '17 st', '12314122', '48723423', 'text', '2018-01-09 21:40:06', '2018-02-04 14:26:27'),
(10, 'bahaa eldin mohamed', 'bahamomofffdd', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 0, 3, '123123', 'ba@gmail.comdd', 'dokan', '0106083756000', '17 st', '12314122', '48723423', 'text', '2018-01-09 21:43:22', '2018-02-05 14:16:12'),
(11, 'bahaa eldin mohamed', 'bahamomofffddee', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 5, '123123', 'bae@gmail.comdd', 'dokan', '01065083756000', '17 st', '12314122', '48723423', 'text', '2018-01-09 21:44:23', '2018-02-05 14:24:49'),
(13, '01151251565', '123123', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'a', 'a', 'aaaaa', 'a', 'a', '1325654985', '1325654985', 'a', '2018-01-09 21:51:01', '2018-02-05 14:14:34'),
(14, 'nngghjh', 'bgggyyy', 'images\\09-01-18-11-38FB_IMG_1515355121825.jpg', 1, 4, 'hgdhhfhh', 'h@h.com', 'bvchbvvb', '99569888688', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '29.98411225091273', '31.25271387398243', 'hvfhhvcf', '2018-01-09 21:55:38', '2018-02-05 14:24:08'),
(17, 'bahaa eldin mohamed', 'bahamomofffddeess', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123123', 'basse@gmail.comdd', 'dokan', '010650', '17 st', '12314122', '48723423', 'text', '2018-01-09 21:58:36', '2018-01-09 21:58:36'),
(20, '01151251565', '123123aaa', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'a', 'aaaa', 'aaaaa', 'aaaa', 'a', '1325654985', '1325654985', 'a', '2018-01-09 21:59:29', '2018-01-09 21:59:29'),
(21, 'ahmed', 'eng ezz', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123123', 'ahmed.ezz.0093@gmail.com', 'Ahmed ezz', '01154625207', 'Nour El-Nabi, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98387382884651', '31.253282837569717', 'iam hair style', '2018-01-12 07:22:43', '2018-01-12 07:22:43'),
(22, 'Bahaa Eldin123', 'hetest', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123123123', 'bahaa123@gmail.com', 'hello world', '131131', 'i\'m here ', '12312312312', '12312312312', 'this is the end', '2018-01-12 07:38:40', '2018-01-12 07:38:40'),
(23, 'ahmed', 'am', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123123', 'a@a.com', 'qwww', '55555555555', 'Passage of Heba, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98411225091273', '31.25271387398243', 'hhhhjj', '2018-01-12 07:47:52', '2018-01-12 07:47:52'),
(25, 'jo', 'ko', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123456', 'm@m.com', 'ok', '123456789', 'قنصوه الغوري، محافظة القاهرة‬، مصر', '30.056840529068413', '31.44749220460653', 'qw', '2018-01-14 18:11:51', '2018-01-14 18:11:51'),
(26, 'bahaa eldin mohamed55', 'bahamomofffddwweess55', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '5555', 'baddsse@gmail.comdd55', 'dokan55', '0106513055', '17 st55', '1231412255', '4872342355', 'text55', '2018-01-14 22:37:20', '2018-01-14 22:37:20'),
(28, 'bahaa eldin mohamed551', 'bahamomofffddwweess551', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '55551', 'baddsse@gmail.comdd551', 'dokan551', '01065130551', '17 st55', '1231412255', '4872342355', 'text55', '2018-01-14 22:38:44', '2018-01-14 22:38:44'),
(34, '011512515654', '123123aaa3', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'a', 'aaaa1', 'aaaaa2', 'aaaa23', 'a', '1325654985', '1325654985', 'a', '2018-01-15 06:36:59', '2018-01-15 06:36:59'),
(35, '0115125156542', '123123aaa31', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, 'a', 'aaaa11', 'aaaaa21', 'aaaa231', 'a', '1325654985', '1325654985', 'a', '2018-01-15 06:37:51', '2018-01-15 06:37:51'),
(37, 'as', 'qwe', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '12345678', 'aaa@a.com', 'qwr', '12345678', 'Passage of Heba, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98415029384477', '31.252733655273914', 'qwe', '2018-01-15 06:44:21', '2018-01-15 06:44:21'),
(38, 'pol', 'lko', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '0987654', 'm@mn.com', 'polk', '369852147', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '29.984180495856776', '31.25272560864687', 'olkj', '2018-01-15 07:03:17', '2018-01-15 07:03:17'),
(39, 'مريم', 'مريم', '/public/images/29-01-18-12-11IMG-20180127-WA0027.jpg', 1, 0, '01090067479', 'mariemabdelmonem2@gmail.com', 'مريم', '01090067479', 'إبن الوليد، البساتين الشرقية، البساتين، محافظة القاهرة‬، مصر', '29.979568484153283', '31.28783605992794', 'مريم عبد المنعم ابراهيم امام', '2018-01-17 00:32:45', '2018-01-29 19:53:40'),
(40, 'lashin1', 'thisisnew', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '12312312', 'bebo123@gmail.com', 'dukkan123', '0115125888', '17 st saadi maadi cairo egypt', '1325654985', '16512316515', 'this is test', '2018-01-18 17:33:17', '2018-01-18 17:33:17'),
(42, 'lashin1', 'thisisnew12', 'images\\18-01-18-11-03social-media-marketing.png', 1, 0, '12312312', 'beb1212o123@gmail.com', 'dukkan123', '01151258881212', '17 st saadi maadi cairo egypt1212', '13256549851212', '165123165151212', 'this is test1212', '2018-01-18 18:14:03', '2018-01-18 18:14:03'),
(44, 'lashin1', 'thisisnew121212', 'images\\18-01-18-12-14111s.jpg', 1, 0, '123123121212', 'beb1212o1212123@gmail.com', 'dukkan1231212', '011512588812121212', '17 st saadi maadi cairo egypt1212', '13256549851212', '165123165151212', 'this is test1212', '2018-01-18 19:17:14', '2018-01-18 19:17:14'),
(46, 'lashin1', 'thisisnew11', '/public/images/18-01-18-12-08metal-02.jpg', 1, 0, '1231231211', 'beb111212123@gmail.com', 'dukkan1231211', '01151258881212111', '17 st saadi maad1111', '132565498512121', '1651231651512121', 'this is test12121', '2018-01-18 19:24:08', '2018-01-18 19:24:08'),
(52, 'ahmed ezzz', 'eng ezzzzz', '/public/images/20-01-18-08-17IMG_20180119_034147.jpg', 1, 0, '123456', 'mado@gmail.com', 'eng ezzzz', '011546252070', 'Passage of Heba, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98411225091273', '31.25271387398243', 'iam providerr', '2018-01-18 21:58:57', '2018-01-21 03:42:17'),
(54, 'ok', 'ok', 'https://t4.ftcdn.net/jpg/00/78/73/53/240_F_78735333_o3qJe4bT5ciwldLIjVDulFKrDAV3jGYO.jpg', 1, 0, '123456789', 'sa@sq.com', 'okl', '1234567899632584', 'Al Gameya Al Sharaia, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98402309680883', '31.25384945422411', 'oklp', '2018-01-21 05:22:11', '2018-01-21 05:22:11'),
(55, 'sa', 'sa', '/public/images/20-01-18-10-27FB_IMG_1516241085512.jpg', 1, 0, '123456789', 'hokk@mok.com', 'oklp', '963258441', 'Al Gameya Al Sharaia, Ezbet Nafie, El-Basatin, Cairo Governorate, Egypt', '29.98402309680883', '31.25384945422411', 'oklp', '2018-01-21 05:23:27', '2018-01-21 05:23:27'),
(56, 'ahmed', 'plko', '/public/images/24-01-18-04-19FB_IMG_1516241085512.jpg', 1, 0, '1234567890', 'mko@mko.com', 'hokml', '36985214785', 'ممر هبه، عزبة نافع، البساتين، محافظة القاهرة‬، مصر', '29.984123867076747', '31.25276919454336', 'oklo', '2018-01-24 23:10:19', '2018-01-24 23:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` float NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `rate`, `user_id`, `provider_id`, `created_at`, `updated_at`) VALUES
(2, 5, 2, 6, NULL, NULL),
(3, 4.5, 2, 6, '2018-01-11 09:20:13', '2018-01-11 09:20:13'),
(4, 4.3, 2, 6, '2018-01-11 09:20:46', '2018-01-11 09:20:46'),
(5, 2, 3, 52, '2018-01-15 17:31:50', '2018-01-15 17:31:50'),
(6, 4, 3, 52, '2018-01-21 19:39:21', '2018-01-21 19:39:21'),
(7, 2.5, 17, 52, '2018-01-22 01:53:00', '2018-01-22 01:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `provider_id`, `price`, `created_at`, `updated_at`) VALUES
(7, 'bababa', 3, '200', NULL, NULL),
(8, 'bababaddd', 3, '200', NULL, NULL),
(12, 'hellooooooo', 2, '123', '2018-01-08 11:41:59', '2018-01-08 11:41:59'),
(13, 'hellooooooo', 2, '123', '2018-01-08 12:11:11', '2018-01-08 12:11:11'),
(14, 'hoho', 2, '123', '2018-01-08 16:08:37', '2018-01-08 16:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicetype_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `servicetype_id`, `provider_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 'meky', 'descript', 1, 6, '15', '2018-01-18 19:54:49', '2018-01-18 20:29:34'),
(3, 'o', 'ok', 1, 52, '1000', '2018-01-20 09:16:51', '2018-01-21 00:23:32'),
(5, 'okll', 'plkp', 1, 52, '500', '2018-01-20 09:32:07', '2018-01-20 09:33:19'),
(6, 'klpos', 'klpo', 1, 52, '369852', '2018-01-20 09:39:14', '2018-01-30 07:44:18'),
(7, 'klpo', 'klpo', 1, 52, '369852', '2018-01-20 09:40:15', '2018-01-20 09:40:15'),
(8, 'mkllko', 'plko', 1, 52, '369822', '2018-01-20 09:41:36', '2018-01-20 09:48:11'),
(9, 'okokok', 'ok', 1, 6, '122', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

CREATE TABLE `servicetype` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicetype`
--

INSERT INTO `servicetype` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'new service', NULL, '2018-02-06 07:54:20'),
(3, '2makup', '2018-02-06 07:54:32', '2018-02-06 07:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `type_id` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `fullName`, `email`, `phone`, `active`, `type_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nam', 'nam', '', 'nma', 'nms', 1, 1, 'nkjasdnk', 'nfksdnflk', NULL, NULL),
(2, 'bahamovic', 'movic', 'bahamovic movic', 'bahaa@gmail.com', '01151251565', 1, 1, '123123', 'owRs0Fdk6pdvTzQ', '2018-01-09 17:17:22', '2018-02-04 14:02:03'),
(3, 'bahaa', 'ezz', 'as qw', 'mom@gmail.com', '123456789', 0, 1, '123123', 'RXqLjjRMPZzVLCy', '2018-01-14 18:12:29', '2018-02-04 14:02:05'),
(4, 'baham33ovic12312', 'movic1ee23213', 'baham33ovic12312 movic1ee23213', 'bahaa12@gmail.com', '011512dfd515651212', 0, 1, '12323133321212', 'YSPymqvxUAbqMXc', '2018-01-14 22:42:13', '2018-02-05 07:32:40'),
(9, 'ahmed', 'ezz', 'ahmed ezz', 'mbv@m.com', '9123456789', 1, 1, '12345678', '84XCPJBKDr2YYJo', '2018-01-15 07:12:14', '2018-01-15 07:12:14'),
(10, 'ahmed', 'ezz', 'ahmed ezz', 'mn@b.com', '01154625207', 1, 1, '123456789', 'K7S979R5AM64xiu', '2018-01-15 07:13:57', '2018-01-15 07:13:57'),
(11, 'bahamovic', 'lashin', 'bahamovic lashin', 'bullet@gmail.com', '01060060097', 1, 2, '$2y$10$XZ/i7bdW0LJust8fpQqzO.wMsIjpwrQag2NQIMuwdPLATqRKJknC2', 'g4PFkxmGA7DOU1QqR6mq8yL4Sm0yV9CTr1qmRsPfgP7hPqWHp5tQmCDsuOgy', '2018-01-18 17:08:28', '2018-02-05 08:06:33'),
(12, 'bahamovic', 'mov', 'bahamovic mov', 'hello@gmail.com', '0115125156565', 1, 1, 'bhaabhaa', 'wSVEaEurdOVzpbU', '2018-01-21 19:22:59', '2018-01-21 19:22:59'),
(13, 'bahamovicd', 'movd', 'bahamovicd movd', 'hdello@gmail.com', '01151251565654', 1, 1, 'bhaabhaa', 'Mcp590mBmszvGUy', '2018-01-21 19:23:16', '2018-01-21 19:23:16'),
(16, 'ahmed', 'ezz', 'ahmed ezz', 'm@m.com', '001154625207', 1, 1, '123456789', 'o3KCQcQ52G89v6t', '2018-01-21 22:25:39', '2018-01-21 22:25:39'),
(17, 'ahmed', 'ezz', 'ahmed ezz', 'ahmed@gmail.com', '01000501229', 1, 1, '123456', 'qf7YMi47rMQiRYy', '2018-01-21 22:26:37', '2018-01-22 02:21:21'),
(19, 'lo', 'ggf', 'lo ggf', 'l@m.com', '3652369821', 1, 1, 'poiuyffr', 'ZRwgk2B3100De5p', '2018-01-21 23:50:06', '2018-01-21 23:50:06'),
(20, 'kol', 'kol', 'kol kol', 'km@mk.com', '256398741', 1, 1, '12345678', 'iXDBjmoORKPD3AA', '2018-01-21 23:51:57', '2018-01-21 23:51:57'),
(21, 'مريم', 'عبد المنعم', 'مريم عبد المنعم', 'mariemabdelmonem2@gmail.com', '01090067479', 1, 1, '01090067479', '6wP1SSnxBjPEuMO', '2018-01-29 19:09:21', '2018-01-29 19:09:21'),
(22, 'bullet', 'movic', 'bullet movic', 'baddha@gmail.com', 'bullet@gmail.com', 0, 3, 'bhaa5248289', NULL, '2018-01-30 11:56:34', '2018-02-05 07:30:49'),
(23, 'bullet', 'lashin', 'bullet lashin', 'bolo12@gmail.com', '12sdds3123111', 1, 3, 'bhaa5248289', '3CqLDVwwAmwfXiHspxatJKCfOpXmEnSQITp6KJWoxvBila8XQBol5Yz5kW23', '2018-02-01 10:55:45', '2018-02-05 14:00:41'),
(24, 'wewe', 'sfsfsdfsdfds', 'wewe sfsfsdfsdfds', 'dddddddddfffd@gogo', 'fsfdsfdsf', 1, 4, 'bhaa5248289', NULL, '2018-02-01 13:58:34', '2018-02-05 13:58:08'),
(25, 'boboobo', 'bobobo', 'boboobo bobobo', 'bobobo@gmail.com', '13124123543', 1, 2, 'bhaa5248289', NULL, '2018-02-04 12:28:32', '2018-02-04 12:28:32'),
(32, 'سيبسيب', 'سبسيبسي', 'سيبسيب سبسيبسي', 'Samy@bedaya.me444', 'bullet@gmail.comrrr', 1, 2, 'bhaa5248289', NULL, '2018-02-05 13:18:55', '2018-02-05 13:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `provider_id`, `created_at`, `updated_at`) VALUES
(7, 'videos/04-02-18-09-06خخخخخخخخ يا سراج بيه.mp4', 6, '2018-02-04 07:44:06', '2018-02-04 07:44:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advimage`
--
ALTER TABLE `advimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advimage_user_id_foreign` (`user_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notific`
--
ALTER TABLE `notific`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notific_user_id_foreign` (`user_id`),
  ADD KEY `notific_order_id_foreign` (`order_id`),
  ADD KEY `notific_rate_id_foreign` (`rate_id`),
  ADD KEY `notific_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_user_id_foreign` (`user_id`),
  ADD KEY `notification_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `notific_user`
--
ALTER TABLE `notific_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notific_user_user_id_foreign` (`user_id`),
  ADD KEY `notific_user_order_id_foreign` (`order_id`),
  ADD KEY `notific_user_rate_id_foreign` (`rate_id`),
  ADD KEY `notific_user_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `orderprovider`
--
ALTER TABLE `orderprovider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderprovider_provider_id_foreign` (`provider_id`),
  ADD KEY `orderprovider_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_provider_id_foreign` (`provider_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orderuser`
--
ALTER TABLE `orderuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderuser_provider_id_foreign` (`provider_id`),
  ADD KEY `orderuser_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provider_username_unique` (`username`),
  ADD UNIQUE KEY `provider_email_unique` (`email`),
  ADD UNIQUE KEY `provider_phone_unique` (`phone`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_user_id_foreign` (`user_id`),
  ADD KEY `rate_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_servicetype_id_foreign` (`servicetype_id`),
  ADD KEY `services_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_provider_id_foreign` (`provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advimage`
--
ALTER TABLE `advimage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notific`
--
ALTER TABLE `notific`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notific_user`
--
ALTER TABLE `notific_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orderprovider`
--
ALTER TABLE `orderprovider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orderuser`
--
ALTER TABLE `orderuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advimage`
--
ALTER TABLE `advimage`
  ADD CONSTRAINT `advimage_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderprovider`
--
ALTER TABLE `orderprovider`
  ADD CONSTRAINT `orderprovider_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `orderprovider_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderuser`
--
ALTER TABLE `orderuser`
  ADD CONSTRAINT `orderuser_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `orderuser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `rate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`),
  ADD CONSTRAINT `services_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `servicetype` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
