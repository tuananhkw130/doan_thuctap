-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2024 at 01:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `totnghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED NOT NULL,
  `productID` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userID`, `productID`, `quantity`, `created_at`, `updated_at`) VALUES
(43, 1, 43, 1, NULL, NULL),
(48, 1, 42, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `describe`, `created_at`, `updated_at`) VALUES
(4, 'Đồ thu đông', 'quần áo mùa thu, đông', '2024-12-13 23:11:01', '2024-12-13 23:11:01'),
(5, 'Đồ xuân hè', 'Quần áo mùa xuân hè', '2024-12-13 23:11:43', '2024-12-13 23:11:43'),
(6, 'Đồ thể thao', 'Quần áo thể thao', '2024-12-13 23:12:35', '2024-12-13 23:12:35'),
(7, 'Phụ kiện', 'Tất, thắt lưng, mũ', '2024-12-13 23:13:34', '2024-12-13 23:13:34'),
(8, 'Áo polo', 'áo nam', '2024-12-14 03:13:38', '2024-12-14 03:13:38'),
(9, 'Quần dài', 'quần dài nam', '2024-12-14 03:14:04', '2024-12-14 03:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'T', 'tuan10c6nd1@gmail.com', 'a', '2023-12-08 01:56:18', '2023-12-08 01:56:18'),
(2, 'T', 'tuan10c6nd1@gmail.com', 'aaa', '2023-12-08 02:00:46', '2023-12-08 02:00:46'),
(3, 'T', 'tuan10c6nd1@gmail.com', 'aaa', '2023-12-08 02:02:37', '2023-12-08 02:02:37'),
(4, 'T', 'tuan10c6nd1@gmail.com', 'acv', '2023-12-08 02:02:46', '2023-12-08 02:02:46'),
(5, 'Tuấn', 'admin@gmail.com', 'aaa', '2023-12-14 00:06:45', '2023-12-14 00:06:45'),
(6, 'Tuấn', 'an@gmail.com', 'abccc', '2024-02-27 01:42:52', '2024-02-27 01:42:52'),
(7, 'T', 'addadad@gmail.com', 'âfsfsfsgsg', '2024-02-27 01:47:39', '2024-02-27 01:47:39'),
(8, 'T', 'addadad@gmail.com', 'âfsfsfsgsg', '2024-02-27 01:49:49', '2024-02-27 01:49:49'),
(9, 'Nguyễn văn a', 'user@gmail.com', 'abc', '2024-12-19 08:06:16', '2024-12-19 08:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED NOT NULL,
  `productID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `userID`, `productID`, `created_at`, `updated_at`) VALUES
(1, 1, 11, '2024-12-13 06:44:03', '2024-12-13 06:44:03'),
(2, 1, 28, '2024-12-14 04:32:51', '2024-12-14 04:32:51'),
(3, 1, 40, '2024-12-14 05:20:29', '2024-12-14 05:20:29'),
(4, 6, 42, '2024-12-19 08:15:56', '2024-12-19 08:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'client.home.index', 1, NULL, '2023-12-07 23:57:25', '2024-12-19 16:50:51'),
(2, 'Liên hệ', 'contact.index', 4, NULL, '2023-12-08 01:27:06', '2023-12-31 21:19:07'),
(3, 'Tin tức thời trang', 'post.index', 3, NULL, '2023-12-15 01:58:16', '2024-12-19 16:51:09'),
(4, 'Sản phẩm', 'product.index', 2, NULL, '2023-12-31 21:18:50', '2023-12-31 21:18:50'),
(5, 'a', 'ae', 8, '2024-12-14 03:34:54', '2024-12-14 03:34:44', '2024-12-14 03:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2023_12_08_045306_create_menus_table', 2),
(7, '2023_12_08_075217_create_contacts_table', 3),
(8, '2023_12_15_074938_create_posts_table', 4),
(9, '2023_12_21_134901_create_categories_table', 5),
(10, '2023_12_24_134833_create_products_table', 6),
(11, '2024_01_04_085735_create_users_table', 7),
(12, '2024_01_07_024221_create_carts_table', 8),
(13, '2024_01_07_024722_create_orders_table', 9),
(14, '2024_01_07_025401_create_order_details_table', 10),
(15, '2024_01_27_035537_add_name_and_image_and_price_columns_to_carts_table', 11),
(19, '2024_11_11_150420_add_google_id_to_users_table', 12),
(20, '2024_11_12_075305_add_facebook_id_to_users_table', 13),
(21, '2024_11_22_021559_create_favorites_table', 13),
(22, '2024_11_30_082545_modify_image_column_in_products_table', 13),
(23, '2024_12_19_122414_add_paymentstatus_to_orders_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `fullname`, `phone`, `address`, `total`, `status`, `message`, `paymentstatus`, `created_at`, `updated_at`) VALUES
(1, 4, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 3, 'a', 1, '2024-02-23 20:53:37', '2024-02-26 11:03:06'),
(2, 4, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 1, 'a', 1, '2024-02-23 21:01:10', '2024-02-27 05:00:23'),
(3, 4, 'ta', '0971559416', 'nd', 180000, 3, 'a', 1, '2024-02-23 21:08:02', '2024-02-26 11:02:59'),
(4, 4, 'ta', '0971559416', 'nd', 100000, 1, 'a', 1, '2024-02-23 21:23:54', '2024-02-26 11:03:13'),
(5, 4, 'Bùi Thị Hoa', '0971559416', 'nd', 130000, 3, 'a', 1, '2024-02-23 21:25:11', '2024-12-14 03:25:47'),
(6, 5, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 90000, 1, 'a', 1, '2024-02-24 03:15:19', '2024-02-26 10:30:29'),
(7, 5, 'tu', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 200000, 1, 'Nguyễn Tuấn Anh đã xác nhận đơn hàng.', 1, '2024-02-26 08:35:28', '2024-02-26 10:21:01'),
(8, 5, 'Bùi Thị Hoa', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 540000, 3, 'aaa', 1, '2024-02-26 10:56:11', '2024-02-26 10:57:15'),
(9, 4, 'tuan', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 500000, 1, 'f', 1, '2024-02-27 04:58:07', '2024-02-27 05:58:04'),
(10, 4, 'tu anh', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 100000, 3, 'a', 1, '2024-02-27 05:36:05', '2024-12-14 03:26:05'),
(11, 1, 'a', '0971559416', 'a', 6850000, 3, 's', 1, '2024-02-27 05:45:20', '2024-12-14 03:26:17'),
(12, 5, 'a', '0971559416', 's', 180000, 3, 'd', 1, '2024-02-27 05:46:16', '2024-12-14 03:25:11'),
(13, 1, 'tuan', '0971559416', 's', 10000000, 1, '2', 1, '2024-12-10 08:12:06', '2024-12-13 07:25:50'),
(14, 6, 'tu', '0971559416', 'àd', 20180000, 1, 's', 1, '2024-12-13 07:24:42', '2024-12-13 07:26:24'),
(15, 6, 'q', 'q', 'q', 1000000, 1, 'q', 1, '2024-12-14 02:00:54', '2024-12-14 03:26:27'),
(16, 1, 'Bùi Thị Hoa', 'd', 'd', 180, 3, 'ư', 1, '2024-12-14 04:49:20', '2024-12-14 05:29:48'),
(17, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 560000, 1, '1', 1, '2024-12-14 05:25:31', '2024-12-14 05:30:18'),
(18, 3, 'Phạm Tú Uyên', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 400000, 3, 'Người dùng đã hủy đặt hàng', 1, '2024-12-14 05:27:02', '2024-12-26 06:40:29'),
(19, 3, 'Phạm Tú Uyên', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 130000, 3, '1', 1, '2024-12-14 05:29:13', '2024-12-14 05:30:57'),
(20, 6, 'Phạm Tú Uyên', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 3, 'Người dùng hủy đặt hàng', 1, '2024-12-16 07:47:40', '2024-12-16 07:48:14'),
(21, 6, 'Phạm Tú Uyên', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 130000, 3, 'Người dùng đã hủy đặt hàng', 1, '2024-12-17 06:33:33', '2024-12-18 08:31:55'),
(22, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 400000, 0, 'giao hàng nhanh giúp mình', 1, '2024-12-17 08:26:23', '2024-12-17 08:26:23'),
(23, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 70000, 1, 'giao hàng nhanh giúp mình', 1, '2024-12-17 08:27:54', '2024-12-26 06:45:48'),
(24, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 130000, 3, 'Người dùng đã hủy đặt hàng', 1, '2024-12-18 06:17:22', '2024-12-18 06:19:43'),
(25, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 3, 'Người dùng đã hủy đặt hàng', 1, '2024-12-18 08:32:41', '2024-12-18 08:33:43'),
(26, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 540000, 3, 'giao hàng nhanh giúp mình', 1, '2024-12-18 08:34:27', '2024-12-19 08:40:58'),
(27, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 130000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-19 05:05:36', '2024-12-19 08:33:46'),
(28, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 20000, 1, 'giao hàng nhanh giúp mình', 1, '2024-12-19 07:57:27', '2024-12-19 08:31:50'),
(29, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 260000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-19 08:14:56', '2024-12-19 08:25:51'),
(30, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 50000, 1, 'giao hàng nhanh giúp mình', 1, '2024-12-19 08:16:36', '2024-12-19 08:33:35'),
(31, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 400000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-19 16:46:33', '2024-12-19 16:48:31'),
(32, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 210000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-19 18:55:41', '2024-12-19 18:56:49'),
(33, 6, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 360000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-19 19:23:56', '2024-12-19 19:26:19'),
(34, 3, 'Nguyễn Văn A', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 20000, 1, 'giao hàng nhanh giúp mình', 2, '2024-12-26 06:39:27', '2024-12-26 06:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `orderID` bigint UNSIGNED NOT NULL,
  `productID` bigint UNSIGNED NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderID`, `productID`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 13, 11, 10000000, 1, NULL, NULL),
(2, 14, 11, 10000000, 2, NULL, NULL),
(3, 14, 7, 90000, 2, NULL, NULL),
(4, 15, 19, 1000000, 1, NULL, NULL),
(5, 16, 29, 180, 1, NULL, NULL),
(6, 17, 42, 20000, 1, NULL, NULL),
(7, 17, 38, 180000, 3, NULL, NULL),
(8, 18, 35, 400000, 1, NULL, NULL),
(9, 19, 36, 130000, 1, NULL, NULL),
(10, 20, 40, 180000, 1, NULL, NULL),
(11, 21, 36, 130000, 1, NULL, NULL),
(12, 22, 35, 400000, 1, NULL, NULL),
(13, 23, 33, 70000, 1, NULL, NULL),
(14, 24, 31, 130000, 1, NULL, NULL),
(15, 25, 38, 180000, 1, NULL, NULL),
(16, 26, 38, 180000, 3, NULL, NULL),
(17, 27, 43, 130000, 1, NULL, NULL),
(18, 28, 42, 20000, 1, NULL, NULL),
(19, 29, 36, 130000, 2, NULL, NULL),
(20, 30, 39, 50000, 1, NULL, NULL),
(21, 31, 35, 400000, 1, NULL, NULL),
(22, 32, 32, 210000, 1, NULL, NULL),
(23, 33, 44, 180000, 2, NULL, NULL),
(24, 34, 42, 20000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, 'SIR Tailor ra mắt bộ sưu tập \'The Blazy Revolution\'', 'http://127.0.0.1:8000/storage/uploads/post/1703064391_bv1.jpg', 'Nhằm tăng thêm tính sang trọng cho sự kiện, toàn bộ khung cảnh show diễn được dựng hoàn toàn bằng hoa tươi đến từ thương hiệu Centella Decor. Show diễn có sự tham gia của hơn 12 người mẫu với 22 thiết kế mới của SIR Tailor, kết hợp cùng giày và phụ kiện CNES Bespoke. Đại diện SIR Tailor cho biết, thương hiệu cải thiện hạn chế lớp lót dày, lớp dựng gây khó cử động, từ đó, tạo nên sản phẩm nhẹ và thoáng khí hơn khoảng 40%-45% so với các thiết kế thông thường. Đại diện thương hiệu cho biết đặt tên cấu trúc này là The Blazy - chơi chữ từ \"blazer\" và \"lazy\" (lười). Trong đó, từ \"lười\" được hiểu theo cách tích cực, tượng trưng cho sự nhanh, gọn và thoải mái, giúp người dùng dễ hoạt động và phối với nhiều loại trang phục. \"Chúng tôi ra mắt dòng sản phẩm này dựa trên sự thấu hiểu khách hàng trong suốt 10 năm đồng hành cùng phái mạnh \", vị đại diện nói thêm. Bên cạnh đó, đội ngũ sáng tạo chú trọng tạo nên phom dáng, đường cắt may, hoạ tiết, màu sắc tinh tế để dung hòa giữa tính ứng dụng và thời trang. Thương hiệu sử dùng các gam màu từ trung tính như như nâu, đen, xanh navy đến màu sắc đặc trưng của mùa hè như đỏ, xanh dương, xanh lam...', 'Nhật Lệ', '2023-12-15 01:25:01', '2024-01-01 09:58:47'),
(2, 'Deal ngon - Giá hời đổ bộ đại tiệc sinh nhật thương hiệu thời trang nam OWEN', 'http://127.0.0.1:8000/storage/uploads/post/1708531995_bv3.webp', 'Đại tiệc nào cũng cần có một nhân vật chính, và lần này \"spotlight\" xin dành trọn cho OWEN Polo Cafe - bộ sưu tập phiên bản giới hạn với 5 tính năng vô cùng hấp dẫn: Làm mát – Khử mùi – Chống tia UV – Chống nhăn – Giữ màu. Chưa kể, vải sợi cafe làm mát, khô nhanh gấp 1,88 lần còn mang lại cảm giác thông thoáng, nhẹ nhàng. Khả năng chống nhăn và giữ màu giúp người mặc đẹp toàn diện trong suốt cả ngày dài. Kết hợp cùng tính năng chống tia UVA, UVB có hại lên tới 98%, OWEN Polo Cafe sẽ là lựa chọn lý tưởng vào ngày hè. Spotlight của buổi tiệc: OWEN Polo Cafe\r\n\r\nDeal ngon - Giá hời đổ bộ đại tiệc sinh nhật thương hiệu thời trang nam OWEN - Ảnh 1.\r\nOWEN Polo Cafe phiên bản giới hạn vừa ra mắt\r\n\r\nĐại tiệc nào cũng cần có một nhân vật chính, và lần này \"spotlight\" xin dành trọn cho OWEN Polo Cafe - bộ sưu tập phiên bản giới hạn với 5 tính năng vô cùng hấp dẫn: Làm mát – Khử mùi – Chống tia UV – Chống nhăn – Giữ màu.\r\n\r\nDeal ngon - Giá hời đổ bộ đại tiệc sinh nhật thương hiệu thời trang nam OWEN - Ảnh 2.\r\nOWEN Polo Cafe có khả năng kiểm soát mùi cơ thể tốt, giúp phái mạnh tự tin hơn trong những ngày nóng bức\r\n\r\nChưa kể, vải sợi cafe làm mát, khô nhanh gấp 1,88 lần còn mang lại cảm giác thông thoáng, nhẹ nhàng. Khả năng chống nhăn và giữ màu giúp người mặc đẹp toàn diện trong suốt cả ngày dài. Kết hợp cùng tính năng chống tia UVA, UVB có hại lên tới 98%, OWEN Polo Cafe sẽ là lựa chọn lý tưởng vào ngày hè.\r\n\r\nDeal ngon - Giá hời đổ bộ đại tiệc sinh nhật thương hiệu thời trang nam OWEN - Ảnh 3.\r\nOWEN Polo Cafe sở hữu những gam màu trẻ trung, dễ dàng phối đồ\r\n\r\nKiểu dáng Body Fit của OWEN Polo Cafe vừa tôn dáng người mặc, vừa đảm bảo sự thoải mái trong từng chuyển động. OWEN Polo Cafe phiên bản giới hạn được thiết kế với các tông màu đa dạng gồm trắng, xám, xanh, nâu và nhiều màu khác. Đây đều là những màu tông màu \"đa-zi-năng\", dễ dàng kết hợp với phụ kiện khác nhau để giúp phái mạnh tự tin khoe cá tính qua ngôn ngữ thời trang. Bộ sưu tập OWEN Polo Cafe là bước đi đầy ấn tượng của thương hiệu OWEN trên hành trình bền bỉ theo đuổi chất liệu công nghệ mới như sợi bạc hà, sợi tre (bamboo), sợi sen, lô hội, ngải cứu...', 'QUANG VŨ', '2024-02-21 09:13:16', '2024-02-21 09:13:16'),
(3, 'THE GMEN ra mắt bộ sưu tập The Jaunt cùng hành trình “xuyên Việt” đặc biệt', 'http://127.0.0.1:8000/storage/uploads/post/1708532219_bv4.webp', 'Với hệ thống cửa hàng phủ rộng trên toàn quốc, THE GMEN là cái tên nổi bật khi nhắc đến thời trang nam lịch lãm, đơn giản nhưng phù hợp với tất cả phái mạnh.\r\nVà gần đây nhất, THE GMEN đã thực hiện chuyến hành trình \"Xuyên Việt\" đầy ấn tượng và đặc biệt. Một hành trình bức phá, một câu chuyện về thương hiệu đi tìm những sản phẩm thời trang ấn tượng chưa từng có.\r\n\r\nNếu là fan trong làng thời trang, chắc có lẽ bạn khó tìm được một thương hiệu \"chịu chơi\" như THE GMEN - với hành trình rong ruổi khắp 5 tỉnh thành từ Phú Yên, Phan Thiết, Vũng Tàu, Đà Lạt đến Sài Gòn, trong khoảng thời gian 2 tháng dài ròng rã. Khao khát về một bước chuyển mình mới của thương hiệu, The Jaunt được ra đời như cuộc dạo chơi đi tìm bản sắc, nét đặc biệt của từng vùng miền để tạo ra những trang phục \"vừa vặn\" nhất, là những outfit với thiết kế đi sâu vào nhu cầu, với chất vải phù hợp và phong cách mang đầy hơi thở khác biệt.', 'Minh huy', '2024-02-21 09:16:59', '2024-02-21 09:16:59'),
(4, 'Hành trình 15 năm khẳng định vị thế thương hiệu của Owen', 'http://127.0.0.1:8000/storage/uploads/post/1708532448_bv5.png', '<p style=\"text-align: justify;\">Trong 15 năm hoạt động, Owen ch&uacute; trọng cải thiện chất lượng v&agrave; hướng tới mục ti&ecirc;u đồng h&agrave;nh c&ugrave;ng ph&aacute;i mạnh Việt trở th&agrave;nh phi&ecirc;n bản tốt hơn. 2023 l&agrave; cột mốc kỷ niệm 15 năm Owen gia nhập thị trường thời trang Việt v&agrave; 30 năm th&agrave;nh lập tập đo&agrave;n Ph&uacute; Th&aacute;i - đơn vị sở hữu thương hiệu. \"Trong h&agrave;nh tr&igrave;nh n&agrave;y, Owen lu&ocirc;n đặt mục ti&ecirc;u trở th&agrave;nh thương hiệu thời trang nam lớn nhất cả nước v&agrave; sẵn s&agrave;ng vươn ra thị trường Đ&ocirc;ng Nam &Aacute;\", b&agrave; Phạm Thị Tuyết - Tổng gi&aacute;m đốc c&ocirc;ng ty Cổ phần Thời trang Kowil Việt Nam (đơn vị sở hữu nh&atilde;n h&agrave;ng Owen) khẳng định. Trong suốt chặng đường 15 năm ph&aacute;t triển thương hiệu,&nbsp;</p>\r\n<p class=\"Normal\">Đ&acirc;y l&agrave; nỗ lực quan trọng mở ra nhiều th&agrave;nh tựu sau n&agrave;y của Owen tr&ecirc;n h&agrave;nh tr&igrave;nh chinh phục thời trang bền vững\", đại diện thương hiệu khẳng định.<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/07/12/image005-5468-1689158155.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=RBuwpKRzYxpP0U_qBja5zw\" alt=\"Owen n&acirc;ng tầm trải nghiệm kh&aacute;ch h&agrave;ng với hệ thống cửa h&agrave;ng hiện đại. Ảnh: Owen\"></p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<figcaption>\r\n<p class=\"Image\">Cửa h&agrave;ng được đầu tư hiện đại của Owen. Ảnh:<em>&nbsp;Owen</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Tới năm 2023, Owen đ&atilde; đưa gần 15 chất liệu xanh v&agrave;o c&aacute;c thiết kế thời trang v&agrave; nhận phản hồi t&iacute;ch cực từ kh&aacute;ch h&agrave;ng. Trong đ&oacute;, sơ mi sợi bạc h&agrave;, b&atilde; c&agrave; ph&ecirc; c&oacute; nhiều đặc t&iacute;nh nổi trội, mang tới trải nghiệm mặc thoải m&aacute;i cho người d&ugrave;ng, đồng thời, th&acirc;n thiện với m&ocirc;i trường.</p>', 'Minh Tú', '2024-02-21 09:20:48', '2024-12-14 07:36:53'),
(5, 'Aristino ra mắt bộ sưu tập đồng hành cùng Quốc Cơ - Quốc Nghiệp', 'http://127.0.0.1:8000/storage/uploads/post/1708532588_bv6.jpg', 'Aristino ra mắt bộ sưu tập Xuân - Hè 2023 với sự đồng hành của Quốc Cơ - Quốc Nghiệp nhằm thể hiện tinh thần tự tôn dân tộc mạnh mẽ.\r\n\r\nTiếp nối \"Amazing Vietnam Collection\", \"The Hanoi\" hay \"Rực rỡ Phương Đông\", qua bộ sưu tập \"Bình minh khát vọng\", thương hiệu muốn lan tỏa cảnh sắc thiên nhiên và tinh thần Việt Nam. \"Chúng tôi muốn vẽ lên bình minh rực rỡ qua từng bộ trang phục, đồng thời, thể hiện nét đẹp tinh tế của đất nước qua phong cách thiết kế tối giản\", đại diện Aristino chia sẻ.Để thể hiện tinh thần của bộ sưu tập, Aristino thực hiện bộ ảnh quảng bá với hành trình đón mặt trời lên trên đảo ngọc Lý Sơn, ghi lại sự đồng hành của hai nghệ sĩ tài hoa Quốc Cơ - Quốc Nghiệp. Thương hiệu cùng hai nghệ sĩ tài hoa có sự gắn kết dựa trên mục tiêu tôn vinh nét đẹp Việt.\r\n\r\nĐại diện thương hiệu chia sẻ thêm, đơn vị nhận thấy sự dũng cảm, ý chí và lòng tự hào dân tộc mạnh mẽ ở Quốc Cơ và Quốc Nghiệp. Nhờ nguồn động lực từ đất nước, hai anh em đã để lại dấu ấn vẻ vang trên trường quốc tế cùng bốn kỷ lục Guinness. Điều này tương đồng với tầm nhìn ghi danh Việt Nam trên bản đồ thời trang quốc tế của Aristino.\r\n\r\n\"Aristino chọn cách thổi hồn dân tộc vào mỗi thiết kế để bảo tồn bản sắc văn hóa Việt và mang những nét đặc trưng ấy đến gần hơn với khán giả đại chúng\", đại diện thương hiệu nói thêm.', 'Thiên Minh', '2024-02-21 09:23:08', '2024-02-21 09:23:08'),
(6, 'Những món đồ giúp đàn ông ghi điểm phong cách', 'http://127.0.0.1:8000/storage/uploads/post/1708532694_bv7.jpg', 'Theo cuộc khảo sát \"Phụ nữ thích đàn ông mặc gì\" của tạp chí Esquire, khi đưa ra bảng màu trang phục mà phụ nữ cho rằng lý tưởng với đàn ông, đa số họ chọn xanh dương (chiếm 42%), màu hồng chiếm 12,9%, số còn lại chia đều cho các màu khác.\r\n\r\nTheo Viện sắc màu Pantone, xanh dương là màu của sự điềm tĩnh, hòa bình. Trong cuộc khảo sát, những cô gái cho biết đàn ông mặc trang phục tông màu này tạo cho họ cảm giác yên bình, nhẹ nhàng khi ở bên.Đàn ông có thể chọn áo polo, quần kaki, áo bomber, áo khoác denim tông xanh dương, nhưng với sơ mi, cuộc khảo sát cho thấy sơ mi trắng chiếm tỷ lệ cao nhất. Theo Elle, khi diện sơ mi trắng bỏ ngỏ vài hàng cúc đầu, đàn ông toát lên vẻ thanh lịch nhưng vẫn quyến rũ. Với áo dáng rộng, bạn nên sơ vin với quần jeans hoặc kaki. Áo dáng ôm có thể bỏ ngoài quần để tạo vẻ phóng khoáng. Cũng trong khảo sát này, đàn ông mặc áo phông trắng với quần ống đứng được cho là hấp dẫn nhất trong mắt phụ nữ so với các cách phối khác. Bộ cánh đơn giản, tôn vóc dáng, chiếm thiện cảm ngay từ cái nhìn đầu tiên. Ngoài ra, đa số phụ nữ cho rằng một chiếc áo phông trắng ôm vừa cơ thể, khoe vẻ khỏe khoắn, săn chắc giúp phái mạnh trở nên cuốn hút hơn so với dáng áo rộng.\r\nTheo Vogue, cách nhanh nhất để đàn ông nâng tầm phong cách là diện suit hoặc tuxedo. Trong mắt phụ nữ, một bộ suit may đo tinh tế, chuẩn xác với người đàn ông đem tới cho họ cảm giác vững chắc, tin cậy.', 'Nhật Lệ', '2024-02-21 09:24:54', '2024-02-21 09:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `id_category` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `describe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_category`, `name`, `image`, `price`, `size`, `quantity`, `describe`, `created_at`, `updated_at`) VALUES
(30, 4, 'Áo phao dày Ultrawarm Puffer', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177143_24cmcw.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177167_24cmcw.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177234_24cmcw.JPG\"]', 180000, 'S', 100, '<p>Đồ thời trang nam</p>', '2024-12-14 04:51:59', '2024-12-14 04:57:25'),
(31, 5, 'T-Shirt chạy bộ Essential', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177280_ao_polo_cam1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177280_ao_polo_cam2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177280_ao_polo_cam3.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177280_ao_polo_cam4.jpg\"]', 130000, 'S', 99, '<p>Đồ thời trang nam</p>', '2024-12-14 04:54:40', '2024-12-18 06:17:22'),
(32, 4, 'Áo khoác dày Ultrawarm Puffer', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177513_ajk.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177535_ajk.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177553_ajk.jpg\"]', 210000, 'S', 99, '<p>Đồ thời trang nam</p>', '2024-12-14 04:58:33', '2024-12-19 18:55:41'),
(33, 5, 'Quần đùi TFF', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177615_duixanh1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177615_duixanh2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177615_duixanh3.jpg\"]', 70000, 'Tất cả', 99, 'Đồ thời trang nam', '2024-12-14 05:00:15', '2024-12-17 08:27:54'),
(34, 6, 'T-Shirt chạy bộ Essential', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177670_aa.webp\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177670_aa1.webp\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177670_aa2.webp\"]', 130000, 'Tất cả', 100, 'Đồ thời trang nam', '2024-12-14 05:01:10', '2024-12-14 05:01:10'),
(35, 4, 'Áo phao dày Ultrawarm Puffer', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177718_phao1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177718_phao2.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177718_phao3.jpg\"]', 400000, 'Tất cả', 98, 'Đồ thời trang nam', '2024-12-14 05:01:58', '2024-12-26 06:40:29'),
(36, 5, 'T-Shirt chạy bộ Essential', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177840_nautt1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177860_natt2.jpg\"]', 130000, 'S', 97, '<p>Đồ thời trang nam</p>', '2024-12-14 05:04:01', '2024-12-19 08:14:56'),
(37, 5, 'Quần short', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177990_duicam1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177990_duicam2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734177990_duicam3.jpg\"]', 70000, 'Tất cả', 100, 'Đồ thời trang nam', '2024-12-14 05:06:30', '2024-12-14 05:06:30'),
(38, 4, 'Quần dài Daily Pants', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178103_24cmaw.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178103_img_3744_662.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178127_24cmaw.JPG\"]', 180000, 'S', 97, '<p>Đồ thời trang nam</p>', '2024-12-14 05:08:23', '2024-12-19 08:40:58'),
(39, 7, 'Mũ lưỡi trai TFF', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178179_g24cmcw.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178211_g24cmcw.jpg\"]', 50000, 'S', 99, '<p>Đồ thời trang nam</p>', '2024-12-14 05:09:39', '2024-12-19 08:16:36'),
(40, 4, 'Áo khoác dày Ultrawarm Puffer', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178284_aokhoactr1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178284_aokhoactr2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178284_aokhoactr3.jpg\"]', 180000, 'Tất cả', 99, 'Đồ thời trang nam', '2024-12-14 05:11:24', '2024-12-16 07:47:40'),
(41, 5, 'Áo thun basic', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178356_b1.webp\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178356_b2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178356_b3.webp\"]', 130000, 'Tất cả', 100, 'Đồ thời trang nam', '2024-12-14 05:12:36', '2024-12-14 05:12:36'),
(42, 7, 'Tất dệt kim', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178451_24cmaw.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178571_24cmaw.jpg\"]', 20000, 'S', 97, '<p>Đồ thời trang nam</p>', '2024-12-14 05:13:43', '2024-12-26 06:39:27'),
(43, 8, 'Áo polo nam basic', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178621_polo_cafe_do_do_1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178621_polo_cafe_do_do2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178621_polo_cafe_do_do_3.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734178621_polo_cafe_do_do_4.jpg\"]', 130000, 'Tất cả', 99, 'Đồ thời trang nam', '2024-12-14 05:17:01', '2024-12-19 05:05:36'),
(44, 9, 'Quần dài Daily Pants', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734657464_quandaix1.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734657466_quandaix2.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734657466_quandaix3.JPG\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1734657466_quandaix4.JPG\"]', 180000, 'Tất cả', 98, 'Đồ thời trang nam', '2024-12-19 18:17:46', '2024-12-19 19:23:56'),
(45, 8, 'Áo polo nam basic', '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1735220927_polo_den1.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1735220929_polo_den2.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1735220929_polo_den3.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/uploads\\/product\\/1735220929_polo_den4.jpg\"]', 100000, 'Tất cả', 0, 'Đồ thời trang nam', '2024-12-26 06:48:49', '2024-12-26 06:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0' COMMENT '0: Admin; 1: User',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`) VALUES
(1, 'Nguyễn Tuấn Anh', 'tuan10c6nd1@gmail.com', NULL, '$2y$12$LqUDjTUPJ17XqS2BlHhnle/od/bgF94mCq2w/NmkETzFQ2AFk19dy', 0, NULL, '2024-01-05 09:34:39', '2024-01-05 21:28:26', NULL, NULL),
(3, 'Phạm Thị Tú Uyên', 'user2@gmail.com', NULL, '$2y$12$Kt0q4WIuB6fPg1WeO6XTuOkCx4yGyBNcOj8us2RAdxYk7SlYf8Aw6', 1, NULL, '2024-01-05 20:01:58', '2024-12-14 05:37:05', NULL, NULL),
(4, 'Tú Uyên', 'uyn@gmail.com', NULL, '$2y$12$9KoAxQji400ZCEfLw9riiOHvdMVGZzqImC6FpVIYtsrg16aNvWhXO', 1, NULL, '2024-01-05 21:21:59', '2024-01-05 21:21:59', NULL, NULL),
(5, 'Tú anh', 'user1@gmail.com', NULL, '$2y$12$U2cI/N6eyfDgdRjMtH38LuznduOXOGa5Z1VZv61ru3aFFTFAy6rtC', 1, NULL, '2024-01-05 21:34:00', '2024-01-05 21:34:00', NULL, NULL),
(6, 'Nguyễn Văn A', 'user@gmail.com', NULL, '$2y$12$AP4y/Da7YjUUd18aj6M1LuzZUlZrjO4gwAUWzdz9kFpxnFQF9Elsa', 1, NULL, '2024-12-05 07:38:42', '2024-12-19 08:31:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_userid_foreign` (`userID`),
  ADD KEY `carts_productid_foreign` (`productID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_userid_foreign` (`userID`),
  ADD KEY `favorites_productid_foreign` (`productID`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_orderid_foreign` (`orderID`),
  ADD KEY `order_details_productid_foreign` (`productID`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_orderid_foreign` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
