-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 08:47 AM
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
-- Database: `doan_thuctap`
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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `describe`, `created_at`, `updated_at`) VALUES
(1, 'Áo phông', 'áo phông nam', '2023-12-21 07:15:49', '2024-01-05 20:04:10'),
(2, 'Quần dài', 'quần dài nam', '2023-12-21 07:16:12', '2024-01-03 09:20:10'),
(3, 'Quần short', 'quần đùi nam', '2024-01-03 09:21:02', '2024-01-03 09:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, 'T', 'addadad@gmail.com', 'âfsfsfsgsg', '2024-02-27 01:49:49', '2024-02-27 01:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'client.home.index', 1, NULL, '2023-12-07 23:57:25', '2024-02-27 05:42:27'),
(2, 'Liên hệ', 'contact.index', 4, NULL, '2023-12-08 01:27:06', '2023-12-31 21:19:07'),
(3, 'Bài viết', 'post.index', 3, NULL, '2023-12-15 01:58:16', '2023-12-31 21:19:01'),
(4, 'Sản phẩm', 'product.index', 2, NULL, '2023-12-31 21:18:50', '2023-12-31 21:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(15, '2024_01_27_035537_add_name_and_image_and_price_columns_to_carts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `fullname`, `phone`, `address`, `total`, `status`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 3, 'a', '2024-02-23 20:53:37', '2024-02-26 11:03:06'),
(2, 4, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 180000, 1, 'a', '2024-02-23 21:01:10', '2024-02-27 05:00:23'),
(3, 4, 'ta', '0971559416', 'nd', 180000, 3, 'a', '2024-02-23 21:08:02', '2024-02-26 11:02:59'),
(4, 4, 'ta', '0971559416', 'nd', 100000, 1, 'a', '2024-02-23 21:23:54', '2024-02-26 11:03:13'),
(5, 4, 'Bùi Thị Hoa', '0971559416', 'nd', 130000, 0, 'a', '2024-02-23 21:25:11', '2024-02-23 21:25:11'),
(6, 5, 'ta', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 90000, 1, 'a', '2024-02-24 03:15:19', '2024-02-26 10:30:29'),
(7, 5, 'tu', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 200000, 1, 'Nguyễn Tuấn Anh đã xác nhận đơn hàng.', '2024-02-26 08:35:28', '2024-02-26 10:21:01'),
(8, 5, 'Bùi Thị Hoa', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 540000, 3, 'aaa', '2024-02-26 10:56:11', '2024-02-26 10:57:15'),
(9, 4, 'tuan', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 500000, 1, 'f', '2024-02-27 04:58:07', '2024-02-27 05:58:04'),
(10, 4, 'tu anh', '0971559416', 'Xã Nam Thanh, huyện Nam Đàn, tỉnh Nghệ An', 100000, 0, 'a', '2024-02-27 05:36:05', '2024-02-27 05:36:05'),
(11, 1, 'a', '0971559416', 'a', 6850000, 0, 's', '2024-02-27 05:45:20', '2024-02-27 05:45:20'),
(12, 5, 'a', '0971559416', 's', 180000, 0, 'd', '2024-02-27 05:46:16', '2024-02-27 05:46:16');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 'Hành trình 15 năm khẳng định vị thế thương hiệu của Owen', 'http://127.0.0.1:8000/storage/uploads/post/1708532448_bv5.png', 'Trong 15 năm hoạt động, Owen chú trọng cải thiện chất lượng và hướng tới mục tiêu đồng hành cùng phái mạnh Việt trở thành phiên bản tốt hơn.\r\n\r\n2023 là cột mốc kỷ niệm 15 năm Owen gia nhập thị trường thời trang Việt và 30 năm thành lập tập đoàn Phú Thái - đơn vị sở hữu thương hiệu. \"Trong hành trình này, Owen luôn đặt mục tiêu trở thành thương hiệu thời trang nam lớn nhất cả nước và sẵn sàng vươn ra thị trường Đông Nam Á\", bà Phạm Thị Tuyết - Tổng giám đốc công ty Cổ phần Thời trang Kowil Việt Nam (đơn vị sở hữu nhãn hàng Owen) khẳng định.\r\n\r\nTrong suốt chặng đường 15 năm phát triển thương hiệu, Owen định hướng phát triển thời trang xanh, thời trang bền vững để thể hiện trách nhiệm xã hội của thương hiệu nói riêng, Tập đoàn Phú Thái nói chung.\r\n\r\nTừ năm 2008, Owen bắt đầu thực hiện trọng tâm này. Thời điểm đó, thời trang xanh chưa phổ biến với nhiều người tiêu dùng Việt. Năm 2014, công ty hợp tác cùng Tập đoàn Itochu (Nhật Bản) để nâng cao toàn diện về chất lượng sản phẩm theo tiêu chuẩn Nhật Bản, dịch vụ tận tâm với tiêu chuẩn \"Omotenashi\", dẫn đầu về chất liệu xanh và bền vững...\r\n\r\n\"Đây là nỗ lực quan trọng mở ra nhiều thành tựu sau này của Owen trên hành trình chinh phục thời trang bền vững\", đại diện thương hiệu khẳng định.', 'Minh Tú', '2024-02-21 09:20:48', '2024-02-21 09:20:48'),
(5, 'Aristino ra mắt bộ sưu tập đồng hành cùng Quốc Cơ - Quốc Nghiệp', 'http://127.0.0.1:8000/storage/uploads/post/1708532588_bv6.jpg', 'Aristino ra mắt bộ sưu tập Xuân - Hè 2023 với sự đồng hành của Quốc Cơ - Quốc Nghiệp nhằm thể hiện tinh thần tự tôn dân tộc mạnh mẽ.\r\n\r\nTiếp nối \"Amazing Vietnam Collection\", \"The Hanoi\" hay \"Rực rỡ Phương Đông\", qua bộ sưu tập \"Bình minh khát vọng\", thương hiệu muốn lan tỏa cảnh sắc thiên nhiên và tinh thần Việt Nam. \"Chúng tôi muốn vẽ lên bình minh rực rỡ qua từng bộ trang phục, đồng thời, thể hiện nét đẹp tinh tế của đất nước qua phong cách thiết kế tối giản\", đại diện Aristino chia sẻ.Để thể hiện tinh thần của bộ sưu tập, Aristino thực hiện bộ ảnh quảng bá với hành trình đón mặt trời lên trên đảo ngọc Lý Sơn, ghi lại sự đồng hành của hai nghệ sĩ tài hoa Quốc Cơ - Quốc Nghiệp. Thương hiệu cùng hai nghệ sĩ tài hoa có sự gắn kết dựa trên mục tiêu tôn vinh nét đẹp Việt.\r\n\r\nĐại diện thương hiệu chia sẻ thêm, đơn vị nhận thấy sự dũng cảm, ý chí và lòng tự hào dân tộc mạnh mẽ ở Quốc Cơ và Quốc Nghiệp. Nhờ nguồn động lực từ đất nước, hai anh em đã để lại dấu ấn vẻ vang trên trường quốc tế cùng bốn kỷ lục Guinness. Điều này tương đồng với tầm nhìn ghi danh Việt Nam trên bản đồ thời trang quốc tế của Aristino.\r\n\r\n\"Aristino chọn cách thổi hồn dân tộc vào mỗi thiết kế để bảo tồn bản sắc văn hóa Việt và mang những nét đặc trưng ấy đến gần hơn với khán giả đại chúng\", đại diện thương hiệu nói thêm.', 'Thiên Minh', '2024-02-21 09:23:08', '2024-02-21 09:23:08'),
(6, 'Những món đồ giúp đàn ông ghi điểm phong cách', 'http://127.0.0.1:8000/storage/uploads/post/1708532694_bv7.jpg', 'Theo cuộc khảo sát \"Phụ nữ thích đàn ông mặc gì\" của tạp chí Esquire, khi đưa ra bảng màu trang phục mà phụ nữ cho rằng lý tưởng với đàn ông, đa số họ chọn xanh dương (chiếm 42%), màu hồng chiếm 12,9%, số còn lại chia đều cho các màu khác.\r\n\r\nTheo Viện sắc màu Pantone, xanh dương là màu của sự điềm tĩnh, hòa bình. Trong cuộc khảo sát, những cô gái cho biết đàn ông mặc trang phục tông màu này tạo cho họ cảm giác yên bình, nhẹ nhàng khi ở bên.Đàn ông có thể chọn áo polo, quần kaki, áo bomber, áo khoác denim tông xanh dương, nhưng với sơ mi, cuộc khảo sát cho thấy sơ mi trắng chiếm tỷ lệ cao nhất. Theo Elle, khi diện sơ mi trắng bỏ ngỏ vài hàng cúc đầu, đàn ông toát lên vẻ thanh lịch nhưng vẫn quyến rũ. Với áo dáng rộng, bạn nên sơ vin với quần jeans hoặc kaki. Áo dáng ôm có thể bỏ ngoài quần để tạo vẻ phóng khoáng. Cũng trong khảo sát này, đàn ông mặc áo phông trắng với quần ống đứng được cho là hấp dẫn nhất trong mắt phụ nữ so với các cách phối khác. Bộ cánh đơn giản, tôn vóc dáng, chiếm thiện cảm ngay từ cái nhìn đầu tiên. Ngoài ra, đa số phụ nữ cho rằng một chiếc áo phông trắng ôm vừa cơ thể, khoe vẻ khỏe khoắn, săn chắc giúp phái mạnh trở nên cuốn hút hơn so với dáng áo rộng.\r\nTheo Vogue, cách nhanh nhất để đàn ông nâng tầm phong cách là diện suit hoặc tuxedo. Trong mắt phụ nữ, một bộ suit may đo tinh tế, chuẩn xác với người đàn ông đem tới cho họ cảm giác vững chắc, tin cậy.', 'Nhật Lệ', '2024-02-21 09:24:54', '2024-02-21 09:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `id_category` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_category`, `name`, `image`, `price`, `size`, `quantity`, `describe`, `created_at`, `updated_at`) VALUES
(2, 1, 'T-Shirt chạy bộ Essential', 'http://127.0.0.1:8000/storage/uploads/product/1727405347_ao5.jpg', 100000, 'S', 30, 'áo phông nam', '2023-12-31 20:59:33', '2024-09-26 19:49:07'),
(3, 1, 'T-Shirt chạy bộ Essential', 'http://127.0.0.1:8000/storage/uploads/product/1704087714_sp1.jpg', 180000, 'L', 48, 'áo dài tay', '2023-12-31 22:41:54', '2023-12-31 22:41:54'),
(4, 1, 'Áo polo nam basic', 'http://127.0.0.1:8000/storage/uploads/product/1704298907_ao5.jpg', 130000, 'S', 54, 'áo ngắn tay', '2023-12-31 22:43:33', '2024-01-03 09:21:47'),
(5, 2, 'Quần dài Daily Pants', 'http://127.0.0.1:8000/storage/uploads/product/1704298677_quan1.jpg', 210000, 'M', 50, 'quần nam', '2024-01-03 09:17:57', '2024-01-03 09:17:57'),
(6, 2, 'Quần Kaki Excool', 'http://127.0.0.1:8000/storage/uploads/product/1704298747_quan2.jpg', 250000, 'L', 40, 'quần nam', '2024-01-03 09:19:07', '2024-01-03 09:19:07'),
(7, 3, 'Shorts chạy bộ Advanced', 'http://127.0.0.1:8000/storage/uploads/product/1704299094_quan3.jpg', 90000, 'XL', 40, 'quần đùi thể thao', '2024-01-03 09:24:54', '2024-01-03 09:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0' COMMENT '0: Admin; 1: User',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tuấn Anh', 'tuan10c6nd1@gmail.com', NULL, '$2y$12$LqUDjTUPJ17XqS2BlHhnle/od/bgF94mCq2w/NmkETzFQ2AFk19dy', 0, NULL, '2024-01-05 09:34:39', '2024-01-05 21:28:26'),
(3, 'anh', 'user2@gmail.com', NULL, '$2y$12$Kt0q4WIuB6fPg1WeO6XTuOkCx4yGyBNcOj8us2RAdxYk7SlYf8Aw6', 1, NULL, '2024-01-05 20:01:58', '2024-01-05 20:01:58'),
(4, 'Tú Uyên', 'uyn@gmail.com', NULL, '$2y$12$9KoAxQji400ZCEfLw9riiOHvdMVGZzqImC6FpVIYtsrg16aNvWhXO', 1, NULL, '2024-01-05 21:21:59', '2024-01-05 21:21:59'),
(5, 'Tú anh', 'user1@gmail.com', NULL, '$2y$12$U2cI/N6eyfDgdRjMtH38LuznduOXOGa5Z1VZv61ru3aFFTFAy6rtC', 1, NULL, '2024-01-05 21:34:00', '2024-01-05 21:34:00');

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
