-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 23, 2019 lúc 09:28 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cowell`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 1, '2019-07-16 02:07:34', '2019-07-16 02:07:34'),
(4, 3, 2, 1, '2019-07-16 02:12:57', '2019-07-16 02:12:57'),
(5, 3, 1, 2, '2019-07-16 02:12:57', '2019-07-16 02:12:57'),
(6, 3, 3, 2, '2019-07-16 02:12:57', '2019-07-16 02:12:57'),
(7, 3, 4, 1, '2019-07-16 02:12:57', '2019-07-16 02:12:57'),
(8, 4, 1, 3, '2019-07-16 20:15:30', '2019-07-16 20:15:30'),
(9, 4, 2, 1, '2019-07-16 20:15:30', '2019-07-16 20:15:30'),
(10, 4, 3, 2, '2019-07-16 20:15:30', '2019-07-16 20:15:30'),
(11, 7, 2, 2, '2019-07-17 03:21:34', '2019-07-17 03:21:34'),
(12, 7, 4, 4, '2019-07-17 03:21:35', '2019-07-17 03:21:35'),
(13, 8, 1, 3, '2019-07-21 21:17:22', '2019-07-21 21:17:22'),
(14, 9, 1, 2, '2019-07-21 21:18:35', '2019-07-21 21:18:35'),
(15, 10, 1, 2, '2019-07-21 21:46:41', '2019-07-21 21:46:41'),
(16, 11, 1, 3, '2019-07-21 23:02:18', '2019-07-21 23:02:18'),
(17, 12, 4, 5, '2019-07-21 23:17:33', '2019-07-21 23:17:33'),
(18, 13, 2, 1, '2019-07-22 02:51:22', '2019-07-22 02:51:22'),
(19, 14, 2, 1, '2019-07-22 02:53:08', '2019-07-22 02:53:08'),
(20, 15, 2, 2, '2019-07-22 03:24:09', '2019-07-22 03:24:09'),
(21, 16, 2, 2, '2019-07-22 03:26:18', '2019-07-22 03:26:18'),
(22, 17, 2, 2, '2019-07-22 03:26:41', '2019-07-22 03:26:41'),
(23, 18, 2, 2, '2019-07-22 03:27:00', '2019-07-22 03:27:00'),
(24, 19, 2, 4, '2019-07-22 03:28:36', '2019-07-22 03:28:36'),
(25, 20, 3, 1, '2019-07-22 03:29:36', '2019-07-22 03:29:36'),
(26, 21, 2, 2, '2019-07-22 18:53:55', '2019-07-22 18:53:55'),
(27, 21, 3, 4, '2019-07-22 18:53:55', '2019-07-22 18:53:55'),
(28, 21, 4, 3, '2019-07-22 18:53:55', '2019-07-22 18:53:55'),
(29, 22, 2, 5, '2019-07-22 19:04:23', '2019-07-22 19:04:23'),
(30, 22, 3, 3, '2019-07-22 19:04:23', '2019-07-22 19:04:23'),
(31, 22, 4, 1, '2019-07-22 19:04:24', '2019-07-22 19:04:24'),
(32, 23, 2, 5, '2019-07-22 19:06:15', '2019-07-22 19:06:15'),
(33, 23, 3, 3, '2019-07-22 19:06:15', '2019-07-22 19:06:15'),
(34, 23, 4, 1, '2019-07-22 19:06:15', '2019-07-22 19:06:15'),
(35, 24, 2, 5, '2019-07-22 19:06:35', '2019-07-22 19:06:35'),
(36, 24, 3, 3, '2019-07-22 19:06:36', '2019-07-22 19:06:36'),
(37, 24, 4, 1, '2019-07-22 19:06:36', '2019-07-22 19:06:36'),
(38, 25, 2, 10, '2019-07-22 19:19:31', '2019-07-22 19:19:31'),
(39, 25, 3, 5, '2019-07-22 19:19:31', '2019-07-22 19:19:31'),
(40, 25, 4, 8, '2019-07-22 19:19:32', '2019-07-22 19:19:32'),
(41, 26, 3, 3, '2019-07-22 19:44:50', '2019-07-22 19:44:50'),
(42, 26, 4, 1, '2019-07-22 19:44:50', '2019-07-22 19:44:50'),
(43, 26, 2, 1, '2019-07-22 19:44:50', '2019-07-22 19:44:50'),
(44, 27, 2, 3, '2019-07-22 19:47:39', '2019-07-22 19:47:39'),
(45, 28, 7, 2, '2019-07-22 21:42:37', '2019-07-22 21:42:37'),
(46, 28, 15, 2, '2019-07-22 21:42:37', '2019-07-22 21:42:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `orders`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', 0, 0, '<p><span style=\"font-size:16px\"><strong>M&ocirc; tả laptop </strong></span></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, magnam amet assumenda porro, iusto quas cum maiores quam velit incidunt! Iste doloremque quas maiores ea, facilis expedita aliquid quo excepturi.</p>', '2019-07-15 23:45:27', '2019-07-16 19:42:19'),
(2, 'Smartphone', 'smartphone', 0, 0, 'Mô tả Smartphone', '2019-07-15 23:45:48', '2019-07-15 23:45:48'),
(3, 'Gaming Gear', 'gaming-gear', 0, 0, 'Mô tả Gaming Gear', '2019-07-15 23:46:04', '2019-07-15 23:46:04'),
(4, 'Link kiện máy tính', 'link-kien-may-tinh', 0, 0, 'Mô tả link kiện máy tính', '2019-07-15 23:46:26', '2019-07-15 23:46:26'),
(5, 'Dell', 'dell', 1, 0, 'Mô tả Dell', '2019-07-15 23:46:43', '2019-07-15 23:46:43'),
(6, 'HP', 'hp', 1, 0, 'Mô tả HP', '2019-07-15 23:46:58', '2019-07-15 23:46:58'),
(7, 'ASUS', 'asus', 1, 0, 'Mô tả ASUS', '2019-07-15 23:47:15', '2019-07-15 23:47:15'),
(8, 'Lenovo', 'lenovo', 1, 0, 'Mô tả Lenovo', '2019-07-15 23:47:29', '2019-07-15 23:51:26'),
(9, 'Iphone', 'iphone', 2, 0, 'Mô tả Iphone', '2019-07-15 23:47:44', '2019-07-15 23:47:44'),
(10, 'Samsung', 'samsung', 2, 0, 'Mô tả Samsung', '2019-07-15 23:47:58', '2019-07-15 23:47:58'),
(11, 'Xiaomi', 'xiaomi', 2, 0, 'Mô tả Xiaomi', '2019-07-15 23:48:16', '2019-07-15 23:48:16'),
(12, 'Huawei', 'huawei', 2, 0, 'Mô tả Huawei', '2019-07-15 23:48:34', '2019-07-15 23:48:34'),
(13, 'Ổ cứng', 'o-cung', 4, 0, 'Mo tả Ổ cứng', '2019-07-15 23:49:10', '2019-07-15 23:49:10'),
(14, 'Màn hình', 'man-hinh', 3, 0, '<p>M&ocirc; tả danh mục m&agrave;n h&igrave;nh</p>', '2019-07-23 00:00:24', '2019-07-23 00:00:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2019_07_09_044742_create_categories_table', 1),
(58, '2019_07_09_044750_create_vendors_table', 1),
(59, '2019_07_09_044800_create_products_table', 1),
(60, '2019_07_13_035631_create_options_table', 1),
(61, '2019_07_15_095120_create_orders_table', 1),
(62, '2019_07_16_020903_create_cart_items_table', 1),
(63, '2019_07_16_100816_add_column_status_orders_table', 2),
(64, '2019_07_23_022401_alter_add_column_email_orders_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'header_logo', '/cowell/uploads/images/logo.jpg', '2019-07-15 23:45:09', '2019-07-15 23:45:09'),
(2, 'header_phone', '0256398417', '2019-07-15 23:45:09', '2019-07-15 23:45:09'),
(3, 'cate_home', '[\"5\",\"7\",\"8\",\"9\",\"11\"]', '2019-07-23 04:24:10', '2019-07-22 21:24:10'),
(4, 'banner_home', '[\"\\/cowell\\/uploads\\/images\\/banner1.jpg\",\"\\/cowell\\/uploads\\/images\\/banner2.png\",\"\\/cowell\\/uploads\\/images\\/banner3.png\",\"\\/cowell\\/uploads\\/images\\/banner.png\"]', '2019-07-22 06:22:31', '2019-07-21 23:22:31'),
(5, 'ft1', '{\"title\":null,\"ctft\":\"<p><img src=\\\"http:\\/\\/localhost:8000\\/cowell\\/client\\/img\\/logo_s.jpg\\\" style=\\\"height:100px; width:100px\\\" \\/><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>\\u00a0\\u0110\\u1ecba ch\\u1ec9:\\u00a0S\\u1ed1 3 Duy T&acirc;n, C\\u1ea7u Gi\\u1ea5y, H&agrave; N\\u1ed9i<\\/li>\\r\\n\\t<li>\\u00a0Email:\\u00a0<a href=\\\"mailto:namnguyen@gmail.com\\\">namnguyen@gmail.com<\\/a><\\/li>\\r\\n\\t<li>\\u00a0S\\u1ed1 \\u0111i\\u1ec7n tho\\u1ea1i:\\u00a0<a href=\\\"tel:0357235648\\\">0357.235.648<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-07-23 05:31:59', '2019-07-22 22:31:59'),
(6, 'facebook', '{\"ctft\":\"<div class=\\\"fb-page\\\" data-href=\\\"https:\\/\\/www.facebook.com\\/FacebookVietnam\\/\\\" data-tabs=\\\"\\\" data-width=\\\"\\\" data-height=\\\"\\\" data-small-header=\\\"false\\\" data-adapt-container-width=\\\"true\\\" data-hide-cover=\\\"false\\\" data-show-facepile=\\\"true\\\"><blockquote cite=\\\"https:\\/\\/www.facebook.com\\/FacebookVietnam\\/\\\" class=\\\"fb-xfbml-parse-ignore\\\"><a href=\\\"https:\\/\\/www.facebook.com\\/FacebookVietnam\\/\\\">Facebook<\\/a><\\/blockquote><\\/div>\"}', '2019-07-22 02:57:10', '2019-07-21 19:57:10'),
(7, 'ft2', '{\"title\":\"QUY \\u0110\\u1ecaNH - CH\\u00cdNH S\\u00c1CH\",\"ctft\":\"<ul>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Ch&iacute;nh s&aacute;ch b\\u1ea3o h&agrave;nh<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Ch&iacute;nh s&aacute;ch b\\u1ea3o m\\u1eadt<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">H\\u01b0\\u1edbng d\\u1eabn mua h&agrave;ng<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">H\\u01b0\\u1edbng d\\u1eabn thanh to&aacute;n<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Li&ecirc;n h\\u1ec7<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-07-22 02:45:47', '2019-07-21 19:45:47'),
(8, 'ft3', '{\"title\":\"LI\\u00caN K\\u1ebeT\",\"ctft\":\"<ul>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Li&ecirc;n k\\u1ebft<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Li&ecirc;n k\\u1ebft<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Li&ecirc;n k\\u1ebft<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"http:\\/\\/localhost:8000\\/#\\\">Li&ecirc;n k\\u1ebft<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-07-21 19:43:19', '2019-07-21 19:43:19'),
(9, 'copyright', 'Cowell Internship', '2019-07-22 03:09:20', '2019-07-21 20:09:20'),
(10, 'target1', '{\"img\":\"\\/cowell\\/uploads\\/images\\/free_shipping.png\",\"content\":\"<p><span style=\\\"font-size:18px\\\"><strong>Mi\\u1ec5n ph&iacute; giao h&agrave;ng<\\/strong><\\/span><\\/p>\\r\\n\\r\\n<p>Mi\\u1ec5n ph&iacute; cho \\u0111\\u01a1n h&agrave;ng t\\u1eeb 500,000 VND tr\\u1edf l&ecirc;n<\\/p>\\r\\n\\r\\n<p>Mi\\u1ec5n ph&iacute; giao h&agrave;ng trong ph\\u1ea1m vi 5km<\\/p>\"}', '2019-07-22 00:02:46', '2019-07-22 00:02:46'),
(11, 'target2', '{\"img\":\"\\/cowell\\/uploads\\/images\\/dolla.jpg\",\"content\":\"<p><span style=\\\"font-size:18px\\\"><strong>Gi&aacute; c\\u1ea3 h\\u1ee3p l&yacute;<\\/strong><\\/span><\\/p>\\r\\n\\r\\n<p>B&aacute;n gi&aacute; r\\u1ebb nh\\u1ea5t cho kh&aacute;ch h&agrave;ng<\\/p>\"}', '2019-07-22 00:02:47', '2019-07-22 00:02:47'),
(12, 'target3', '{\"img\":\"\\/cowell\\/uploads\\/images\\/care.png\",\"content\":\"<p><span style=\\\"font-size:18px\\\"><strong>Ch\\u0103m s&oacute;c kh&aacute;ch h&agrave;ng<\\/strong><\\/span><\\/p>\\r\\n\\r\\n<p>Lu&ocirc;n l\\u1eafng nghe \\u0111\\u1ec3 mang \\u0111\\u1ebfn nh\\u1eefng s\\u1ea3n ph\\u1ea9m c\\u0169ng nh\\u01b0 ch\\u1ea5t l\\u01b0\\u1ee3ng t\\u1ed1t nh\\u1ea5t cho kh&aacute;ch h&agrave;ng<\\/p>\"}', '2019-07-22 00:02:47', '2019-07-22 00:02:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `name`, `email`, `phone`, `address`, `notes`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 12000000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:30:46', '2019-07-16 02:07:34', 1),
(3, 1, 69400000, 'Nam Nguyen', 'admin@127.0.0.1', '0235654859', 'Hà Đông', 'Giao hàng sớm', '2019-07-23 02:31:09', '2019-07-16 02:12:57', 1),
(4, 1, 73500000, 'Hải Long Nguyễn', 'admin@127.0.0.1', '0365289741', 'Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội', 'Giao hàng nhanh', '2019-07-23 02:31:09', '2019-07-16 23:39:02', 2),
(7, 1, 52600000, 'Nam Nguyen', 'admin@127.0.0.1', '032649846968', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-17 03:22:15', 1),
(8, 1, 36000000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', 'a', '2019-07-23 02:31:09', '2019-07-21 21:17:22', 1),
(9, 1, 24000000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-21 21:18:35', 1),
(10, 1, 24000000, 'Bình Nguyễn', 'admin@127.0.0.1', '123658974', 'Hà Nội', NULL, '2019-07-23 02:31:09', '2019-07-21 21:46:41', 1),
(11, 1, 36000000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-21 23:02:17', 1),
(12, 1, 39500000, 'Bình Nguyễn', 'admin@127.0.0.1', '02316541651', 'Hà Nội', 'Giao sớm', '2019-07-23 02:31:09', '2019-07-21 23:17:33', 1),
(13, 1, 10500000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-22 02:51:22', 1),
(14, 1, 10500000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-22 02:53:08', 1),
(15, 1, 21000000, 'Trần Quốc Thắng', 'admin@127.0.0.1', '02626511665', 'Láng Hạ, Đống Đa, Hà Nội', 'Giao hàng sớm', '2019-07-23 02:31:09', '2019-07-22 03:24:08', 1),
(16, 1, 21000000, 'Trần Quốc Thắng', 'admin@127.0.0.1', '02626511665', 'Láng Hạ, Đống Đa, Hà Nội', 'Giao hàng sớm', '2019-07-23 02:31:09', '2019-07-22 03:26:18', 1),
(17, 1, 21000000, 'Trần Quốc Thắng', 'admin@127.0.0.1', '02626511665', 'Láng Hạ, Đống Đa, Hà Nội', 'Giao hàng sớm', '2019-07-23 02:31:09', '2019-07-22 03:26:41', 1),
(18, 1, 21000000, 'Trần Quốc Thắng', 'admin@127.0.0.1', '02626511665', 'Láng Hạ, Đống Đa, Hà Nội', 'Giao hàng sớm', '2019-07-23 02:31:09', '2019-07-22 03:27:00', 1),
(19, 1, 42000000, 'Bình Nguyễn', 'admin@127.0.0.1', '123658974', 'abc', 'ư', '2019-07-23 02:31:09', '2019-07-22 03:28:36', 1),
(20, 1, 13500000, 'Nam Nguyen', 'admin@127.0.0.1', '123658974', 'Mỗ Lao\r\nHà Đông', NULL, '2019-07-23 02:31:09', '2019-07-22 03:29:36', 1),
(21, 3, 98700000, 'Nguyễn Văn Nam', 'admin@127.0.0.1', '03649684986', 'Số 3 Duy Tân, Cầu Giấy, Hà Nội', 'Giao hàng sau 17:30', '2019-07-23 02:31:09', '2019-07-22 18:53:55', 1),
(22, 2, 100900000, 'Trần Văn Khánh', 'admin@127.0.0.1', '0523698741', 'Sô 125A Nguyễn Ngọc Vũ, Cầu Giấy, Hà Nội', 'Giao hàng trong giờ hành chính. Gọi trước 30p khi giao hàng', '2019-07-23 02:31:09', '2019-07-22 19:04:23', 1),
(23, 2, 100900000, 'Trần Văn Khánh', 'admin@127.0.0.1', '0523698741', 'Sô 125A Nguyễn Ngọc Vũ, Cầu Giấy, Hà Nội', 'Giao hàng trong giờ hành chính. Gọi trước 30p khi giao hàng', '2019-07-23 02:31:09', '2019-07-22 19:06:15', 1),
(24, 2, 100900000, 'Trần Văn Khánh', 'admin@127.0.0.1', '0523698741', 'Sô 125A Nguyễn Ngọc Vũ, Cầu Giấy, Hà Nội', 'Giao hàng trong giờ hành chính. Gọi trước 30p khi giao hàng', '2019-07-23 02:31:09', '2019-07-22 19:06:35', 1),
(25, 2, 235700000, 'Nguyễn Hải Long', 'admin@127.0.0.1', '0135256498', 'Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội', 'Giao hàng sau 18h30', '2019-07-23 02:31:09', '2019-07-22 19:19:31', 1),
(26, 3, 58900000, 'Nam Nguyễn', 'namnguyen.pveser@gmail.com', '0256398741', 'Hà Nội', NULL, '2019-07-22 19:44:50', '2019-07-22 19:44:50', 1),
(27, 3, 31500000, 'Nam Nguyễn', 'namnguyen.pveser@gmail.com', '0365897122', 'Hà Nội', NULL, '2019-07-23 02:51:40', '2019-07-22 19:51:40', 2),
(28, 2, 55298000, 'Nguyễn Văn Nam', 'n4m.nv.1997@gmail.com', '0256398741', 'Số 3 Duy Tân, Cầu Giấy, Hà Nội', 'Giao trong giờ hành chính', '2019-07-22 21:42:36', '2019-07-22 21:42:36', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_date_start` timestamp NULL DEFAULT NULL,
  `sale_date_end` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `cate_id`, `vendor_id`, `price`, `quantity`, `sale_date_start`, `sale_date_end`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell Vostro 3558', 'laptop-dell-vostro-3558', 5, 1, 12000000, 258, NULL, NULL, '/cowell/uploads/images/44565_1__small_.png', '<p><span style=\"font-size:14px\"><strong>Lorem ipsum dolor sit amet, </strong></span>consectetur adipisicing elit. Excepturi reprehenderit earum, ab rem accusantium consequuntur fugit nisi, harum amet qui magnam tempora? Porro quo nobis dolore, animi dolorum similique in?</p>', '2019-07-15 23:57:06', '2019-07-21 23:02:18'),
(2, 'Laptop Dell Inpiron 3000', 'laptop-dell-inpiron-3000', 5, 1, 10500000, 300, NULL, NULL, '/cowell/uploads/images/44822_1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi reprehenderit earum, ab rem accusantium consequuntur fugit nisi, harum amet qui magnam tempora? Porro quo nobis dolore, animi dolorum similique in?</p>', '2019-07-15 23:57:47', '2019-07-22 19:47:39'),
(3, 'Laptop Asus TP412UA', 'laptop-asus-tp412ua', 7, 2, 13500000, 300, NULL, NULL, '/cowell/uploads/images/asus.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel Core i3-7020U Processor (2 x 2.3Ghz )</li>\r\n	<li>Bộ nhớ trong 4GB DDR4 (Onboard) (1 slot )</li>\r\n	<li>VGA Intel HD Graphics 620</li>\r\n	<li>Ổ cứng 256GB SSD (M2 2280)</li>\r\n	<li>Ổ quang</li>\r\n	<li>Card Reader Multi-format card reader (SD/SDHC/SDXC)</li>\r\n	<li>Bảo mật, C&ocirc;ng nghệ Fingerprint ; Administrator/User Password ; Set Master/User Password ; HDD Password ; I/O Interface Security: Wireless Network Interface, HD Audio Interface; USB Interface Security: USB Interface, External Ports, Bluetooth, CMOS Camera , Card Reader</li>\r\n	<li>M&agrave;n h&igrave;nh 14.0\" inch (16:9) LED backlit FHD (1920x1080) 60Hz Glossy Panel with 45% NTSC with 178˚ wide-viewing angle</li>\r\n</ul>', '2019-07-16 00:00:43', '2019-07-22 19:44:50'),
(4, 'Điện thoại Xiaomi Redmi Note 7 64GB', 'dien-thoai-xiaomi-redmi-note-7-64gb', 11, 6, 7900000, 300, NULL, NULL, '/cowell/uploads/images/xiaomi-redmi-note7-xanh.jpg', '<h2><a href=\"#\" target=\"_blank\">Xiaomi Redmi Note 7</a> l&agrave; chiếc <a href=\"#\" target=\"_blank\">smartphone</a> gi&aacute; rẻ mới được giới thiệu v&agrave;o đầu năm 2019 với nhiều trang bị đ&aacute;ng gi&aacute; như thiết kế notch giọt nước hay camera l&ecirc;n tới 48 MP.</h2>\r\n\r\n<h3>Hiệu năng mạnh mẽ trải nghiệm game mượt m&agrave;</h3>\r\n\r\n<p>Redmi Note 7 xứng đ&aacute;ng l&agrave; một trong những chiếc smartphone c&oacute; hiệu năng tốt, với điểm Antutu đo được khoảng 137586.</p>', '2019-07-16 00:03:37', '2019-07-22 23:52:38'),
(5, 'Laptop Asus Gaming GL504GV-ES099T', 'laptop-asus-gaming-gl504gv-es099t', 7, 2, 43999999, 485, NULL, NULL, '/cowell/uploads/images/45626_43762_1__small_.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel i7 8750U 2.2Ghz up to 4.1Ghz, 9Mb Cache</li>\r\n	<li>Chipset</li>\r\n	<li>Bộ nhớ trong 16GB DDR4 2666MHz</li>\r\n	<li>VGA</li>\r\n	<li>NVIDIA® GeForce RTX™ 2060 6GB GDDR6</li>\r\n	<li>Ổ cứng 512G PCIE SSD</li>\r\n	<li>Ổ quang</li>\r\n	<li>Card Reader Micro SD</li>\r\n	<li>Bảo mật, C&ocirc;ng nghệ</li>\r\n	<li>M&agrave;n h&igrave;nh 15.6” FHD IPS, 144Hz</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>24 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>43 Th&aacute;i H&agrave; - Đống Đa - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:16:59', '2019-07-22 20:16:59'),
(6, 'Laptop Asus S430FA-EB321T', 'laptop-asus-s430fa-eb321t', 7, 2, 16999999, 128, NULL, NULL, '/cowell/uploads/images/47125_33.png', '<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>24 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>129+131 L&ecirc; Thanh Nghị - HBT - H&agrave; Nội</li>\r\n	<li>43 Th&aacute;i H&agrave; - Đống Đa - H&agrave; Nội</li>\r\n	<li>57 Nguyễn Văn Huy&ecirc;n - Cầu Giấy - H&agrave; Nội</li>\r\n	<li>511+513 Quang Trung - H&agrave; Đ&ocirc;ng - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:18:47', '2019-07-22 20:18:47'),
(7, 'Laptop Asus X407MA-BV039T', 'laptop-asus-x407ma-bv039t', 7, 2, 7099000, 102, NULL, NULL, '/cowell/uploads/images/42780_1__small_.png', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel® Pentium® Silver N5000 Processor (4M Cache, up to 2.7 GHz)</li>\r\n	<li>Chipset Intel</li>\r\n	<li>Bộ nhớ trong 4GB DDR4</li>\r\n	<li>VGA Intel® HD graphics 620</li>\r\n	<li>Ổ cứng 1TB SATA (5400rpm)</li>\r\n	<li>Ổ quang No</li>\r\n	<li>Card Reader Yes</li>\r\n	<li>Bảo mật, c&ocirc;ng nghệ FingerPrint</li>\r\n	<li>M&agrave;n h&igrave;nh 14.0&#39;//Ultra Slim 200nits//HD 1366x768 16:9//Anti-Glare//NTSC:45%</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>24 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Li&ecirc;n hệ</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:24:37', '2019-07-22 21:42:37'),
(8, 'Laptop HP ProBook 445 G6 6XQ03PA', 'laptop-hp-probook-445-g6-6xq03pa', 6, 7, 16499000, 250, NULL, NULL, '/cowell/uploads/images/46347_1.png', '<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>12 Th&aacute;ng </li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>129+131 L&ecirc; Thanh Nghị - HBT - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:27:46', '2019-07-22 20:28:53'),
(9, 'Laptop HP 14-ck0068TU', 'laptop-hp-14-ck0068tu', 6, 7, 9389000, 268, NULL, NULL, '/cowell/uploads/images/44185_44186_lthp615_1.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel® Core i3 7020U(2.3Ghz /3MB)</li>\r\n	<li>Chipset Intel</li>\r\n	<li>Bộ nhớ trong 4 GB DDR4 2133Mhz</li>\r\n	<li>VGA Intel® HD</li>\r\n	<li>Ổ cứng 500GB SATA 5400rpm</li>\r\n	<li>Ổ quang</li>\r\n	<li>Card Reader 1 đầu đọc thẻ phương tiện SD đa định dạng</li>\r\n	<li>Bảo mật, c&ocirc;ng nghệ Kensington MicroSaver® lock slot</li>\r\n	<li>M&agrave;n h&igrave;nh 14.0\" diagonal HD SVA BrightView WLED-backlit (1366 x 768)</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>12 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>129+131 L&ecirc; Thanh Nghị - HBT - H&agrave; Nội</li>\r\n	<li>43 Th&aacute;i H&agrave; - Đống Đa - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:29:58', '2019-07-22 20:29:58'),
(10, 'Laptop Lenovo IdeaPad', 'laptop-lenovo-ideapad', 8, 8, 6499000, 258, NULL, NULL, '/cowell/uploads/images/46724_2__small_.png', '<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>12 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>43 Th&aacute;i H&agrave; - Đống Đa - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 20:32:39', '2019-07-22 20:33:23'),
(11, 'Laptop Lenovo Thinkpad L380', 'laptop-lenovo-thinkpad-l380', 8, 8, 23199000, 130, NULL, NULL, '/cowell/uploads/images/44971_2.png', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel Core i7-8550U Processor (4 x 1.80Ghz ),Max Turbo Frequency: 4.00 GHz</li>\r\n	<li>Bộ nhớ trong 1 x 8GB DDR4, 2400 MHz (2 slots)</li>\r\n	<li>VGA Intel UHD Graphics 620</li>\r\n	<li>Ổ cứng 256GB SSD (M.2 2280)</li>\r\n	<li>Card Reader MicroSD card reader</li>\r\n	<li>Bảo mật; c&ocirc;ng nghệ Fingerprint ; TPM 2.0 ; Supervisor Password, Lock UEFI BIOS Settings ; Power-on Password ; Hard Disk1 Password ; Security-lock slot</li>\r\n	<li>M&agrave;n h&igrave;nh 13.3\" inch FHD (1920 x 1080) with IPS Technology, Anti-Glare</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>36 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>129+131 L&ecirc; Thanh Nghị - HBT - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 21:03:41', '2019-07-22 21:03:41'),
(12, 'Laptop Lenovo Thinkpad E590', 'laptop-lenovo-thinkpad-e590', 8, 8, 16799000, 258, NULL, NULL, '/cowell/uploads/images/44565_1__small_.png', '<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>12 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>43 Th&aacute;i H&agrave; - Đống Đa - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 21:08:06', '2019-07-22 21:08:06'),
(13, 'Laptop Lenovo Thinkpad L380', 'laptop-lenovo-thinkpad-l380-2', 8, 8, 23199000, 154, NULL, NULL, '/cowell/uploads/images/44971_1.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel Core i7-8550U Processor (4 x 1.80Ghz ),Max Turbo Frequency: 4.00 GHz</li>\r\n	<li>Bộ nhớ trong 1 x 8GB DDR4, 2400 MHz (2 slots)</li>\r\n	<li>VGA Intel UHD Graphics 620</li>\r\n	<li>Ổ cứng 256GB SSD (M.2 2280)</li>\r\n	<li>Card Reader MicroSD card reader</li>\r\n	<li>Bảo mật; c&ocirc;ng nghệ Fingerprint ; TPM 2.0 ; Supervisor Password, Lock UEFI BIOS Settings ; Power-on Password ; Hard Disk1 Password ; Security-lock slot</li>\r\n	<li>M&agrave;n h&igrave;nh 13.3\" inch FHD (1920 x 1080) with IPS Technology, Anti-Glare</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>36 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>129+131 L&ecirc; Thanh Nghị - HBT - H&agrave; Nội</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 21:09:58', '2019-07-22 21:09:58'),
(14, 'Laptop Lenovo Thinkpad T480s', 'laptop-lenovo-thinkpad-t480s', 8, 8, 27499000, 365, NULL, NULL, '/cowell/uploads/images/41825_1.jpg', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute; Intel® Core™ i5-8250U Kabylake</li>\r\n	<li>Chipset Intel®</li>\r\n	<li>Bộ nhớ trong 8GB DDR4</li>\r\n	<li>VGA Intel® HD Graphics 620</li>\r\n	<li>Ổ cứng 256Gb SSD M.2</li>\r\n	<li>Bảo mật FingerPrint</li>\r\n	<li>Card Reader</li>\r\n	<li>Bảo mật, c&ocirc;ng nghệ No</li>\r\n	<li>M&agrave;n h&igrave;nh 14\" FHD (1920x1080)</li>\r\n</ul>\r\n\r\n<p>Bảo h&agrave;nh</p>\r\n\r\n<ul>\r\n	<li>36 Th&aacute;ng</li>\r\n</ul>\r\n\r\n<p>Kho h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Li&ecirc;n hệ</li>\r\n</ul>\r\n\r\n<p>Giao h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Giao h&agrave;ng nhanh trong 2h <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng (Trong b&aacute;n k&iacute;nh 20 km) cho đơn h&agrave;ng từ 500.000 đ trở l&ecirc;n <a href=\"#\" target=\"_blank\">(Chi tiết)</a></li>\r\n	<li>Miễn ph&iacute; giao h&agrave;ng 300 km đối với kh&aacute;ch h&agrave;ng Games Net, Doanh Nghiệp, Dự &Aacute;n</li>\r\n	<li>Nhận giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 c&aacute;c ng&agrave;y kể cả ng&agrave;y lễ, thứ 7, CN</li>\r\n</ul>', '2019-07-22 21:11:02', '2019-07-22 21:11:02'),
(15, 'iPhone X 64GB', 'iphone-x-64gb', 9, 3, 20550000, 354, NULL, NULL, '/cowell/uploads/images/iphone_x_64gb.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">iPhone X 64GB</a></strong></h2>\r\n\r\n<p><em>Sản phẩm kỷ niệm 10 năm ra mắt của Apple n&ecirc;n <strong>iPhone X 64GB </strong>c&oacute; sự thay đổi so với bộ đ&ocirc;i <a href=\"#\" target=\"_blank\">iPhone 8, 8 Plus</a> trước đ&oacute; từ t&iacute;nh năng đến thiết kế khiến nhiều người d&ugrave;ng smartphone khao kh&aacute;t. Ngo&agrave;i ra, bạn c&oacute; thể tham khảo phi&ecirc;n bản dung lượng bộ nhớ trong cao hơn l&agrave; <strong><a href=\"#\" target=\"_blank\">iPhone X 256GB</a></strong></em></p>\r\n\r\n<h3><strong>iPhone X m&atilde; VN/A l&agrave; g&igrave;? V&igrave; sao n&ecirc;n chọn iPhone X 64GB ch&iacute;nh h&atilde;ng VN/A?</strong></h3>\r\n\r\n<p>Trước khi ra mắt mỗi sản phẩm cho từng thị trường th&igrave; Apple đ&atilde; nghi&ecirc;n cứu rất kỹ lưỡng để ph&ugrave; hợp nhất với thị trường đ&oacute;. V&iacute; dụ như với Nhật Bản v&agrave; H&agrave;n Quốc đ&oacute; l&agrave; cấm chụp l&eacute;n n&ecirc;n smartphone của 2 thị trường n&agrave;y sẽ kh&ocirc;ng tắt được &acirc;m chụp h&igrave;nh. V&agrave; điện thoại iPhone tại thị trường Việt Nam cũng sẽ như vậy, Apple đ&atilde; nghi&ecirc;n cứu những th&oacute;i quen, quy định của Việt Nam để sản xuất ra <a href=\"#\" target=\"_blank\">iPhone X</a> m&atilde; VN/A.</p>\r\n\r\n<p><img alt=\"iPhone mã VN/A là hành do chính Apple sản xuất cho thị trường Việt Nam\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-1.jpg\" /></p>\r\n\r\n<p>Vậy cụ thể iPhone m&atilde; VA/A l&agrave; g&igrave;? iPhone m&atilde; VN/A l&agrave; h&agrave;nh do ch&iacute;nh Apple sản xuất cho từng thị trường cụ thể v&agrave; đảm bảo chất lượng, kiểm duyệt của Apple. N&ecirc;n khi mua<em> iPhone X 64GB ch&iacute;nh h&atilde;ng m&atilde; VN/A</em> kh&aacute;ch h&agrave;ng sẽ được hưởng nhiều ưu đ&atilde;i hơn so với iPhone cũ, iPhone x&aacute;ch tay. Đ&oacute; l&agrave; ch&iacute;nh s&aacute;ch bảo h&agrave;nh hấp dẫn, nguồn gốc r&otilde; r&agrave;ng, sản phẩm đầy phụ kiện. Đ&acirc;y l&agrave; những điều m&agrave; iPhone X cũ sẽ kh&ocirc;ng thể c&oacute; hoặc c&oacute; kh&ocirc;ng đầy đủ.</p>\r\n\r\n<h3><strong>Bộ nhớ trong 64GB – dung lượng vừa đủ để sử dụng</strong></h3>\r\n\r\n<p>Kh&ocirc;ng nhiều sự lựa chọn về bộ nhớ như c&aacute;c d&ograve;ng iPhone trước, iPhone X chỉ c&oacute; 2 phi&ecirc;n bản dung lượng l&agrave; 64GB v&agrave; 256GB. V&agrave; lựa chọn iPhone X 256GB sẽ thoải m&aacute;i lưu trữ hơn, nhưng kh&ocirc;ng c&oacute; nghĩa iPhone X 64GB kh&ocirc;ng đủ dung lượng sử dụng.</p>\r\n\r\n<p><img alt=\"Bộ nhớ trong 64GB – dung lượng vừa đủ để sử dụng\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-2.jpg\" /></p>\r\n\r\n<p>So với những năm trước th&igrave; Apple từng sản xuất những mẫu smartphone c&oacute; dung lượng chỉ 16GB, 32GB th&igrave; 64GB đ&atilde; l&agrave; một dung lượng lớn, đủ để đ&aacute;p ứng mọi nhu cầu sử dụng của kh&aacute;ch h&agrave;ng. Được chạy tr&ecirc;n một hệ điều h&agrave;nh iOS đ&atilde; được tối ưu h&oacute;a, iPhone X 64GB cho ph&eacute;p người d&ugrave;ng thoải m&aacute;i lưu trữ &acirc;m nhạc, h&igrave;nh ảnh, video hay tải c&aacute;c ứng dụng m&agrave; kh&ocirc;ng lo đầy bộ nhớ.</p>\r\n\r\n<h3><strong>iPhone X 64GB thiết kế đột ph&aacute; với m&agrave;n h&igrave;nh tai thỏ</strong></h3>\r\n\r\n<p>Sau 4 năm trung th&agrave;nh với một kiểu thiết kế, bắt đầu từ iPhone 6/6 Plus đến iPhone 8/8 Plus, th&igrave; m&atilde;i đến iPhone X Apple mới c&oacute; một sự thay đổi ho&agrave;n to&agrave;n trong thiết kế của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Apple iPhone X 64GB thiết kế đột phá với màn hình tai thỏ\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-3.jpg\" /></p>\r\n\r\n<p>Đầu ti&ecirc;n đ&oacute; l&agrave; sự loại bỏ ho&agrave;n to&agrave;n của n&uacute;t Home truyền thống, m&agrave;n h&igrave;nh tr&agrave;n viền với khung tai thỏ chứa cảm biến camera. Phần khung viền tr&ecirc;n iPhone X cũng dược l&agrave;m cứng c&aacute;p v&agrave; bền bỉ với c&aacute;c g&oacute;c được bo cong tạo cảm gi&aacute;c cầm nắm dễ chịu.</p>\r\n\r\n<h3><strong>Camera k&eacute;p 12MP với nhiều t&iacute;nh năng chụp ảnh n&acirc;ng cao</strong></h3>\r\n\r\n<p>Cũng giống với iPhone 8 Plus, iPhone X 64GB được trang bị hai camera sau với c&ugrave;ng độ ph&acirc;n giải l&agrave; 12MP nhưng chức năng kh&aacute;c nhau, một g&oacute;c rộng v&agrave; một tele. Điểm kh&aacute;c biệt lớn nhất l&agrave; iPhone đ&atilde; trang bị chức năng chống rung OIS cho cả hai camera n&agrave;y đồng nghĩa với việc iPhone X c&oacute; thể chụp ảnh sắc n&eacute;t hơn gi&uacute;p bạn dễ d&agrave;ng bắt trọn mọi khoảnh khắc đặc biệt trong cuộc sống.</p>\r\n\r\n<p><img alt=\"Camera kép 12MP với nhiều tính năng chụp ảnh nâng cao\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-4.jpg\" /></p>\r\n\r\n<p>Camera trước độ ph&acirc;n giải 7 MP với khả năng selfie x&oacute;a ph&ocirc;ng cho ra những bức h&igrave;nh tự sướng tuyệt vời. Ngo&agrave;i Portrait Mode Selfie (chụp x&oacute;a ph&ocirc;ng ở camera trước) th&igrave; iPhone X c&ograve;n được trang bị nhiều t&iacute;nh năng hấp dẫn kh&aacute;c như Portrait Lighting, <a href=\"#\" target=\"_blank\">Animoji</a>.</p>\r\n\r\n<h3><strong>Sự biến mất của ID Touch v&agrave; xuất hiện Face ID </strong></h3>\r\n\r\n<p>Đ&aacute;nh đổi với việc loại bỏ n&uacute;t Home truyền thống đ&oacute; l&agrave; sự biến mất của c&ocirc;ng nghệ bảo mật an to&agrave;n v&agrave; phổ biến <a href=\"#\" target=\"_blank\">Touch ID</a>. Nhưng thay v&agrave;o đ&oacute; sẽ l&agrave; sự xuất hiện của một c&ocirc;ng nghệ bảo mật mới - Face ID.</p>\r\n\r\n<p><img alt=\"sự xuất hiện của một công nghệ bảo mật mới - Face ID.\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-5.jpg\" /></p>\r\n\r\n<p>Face ID hoạt động bằng c&aacute;ch sử dụng camera hồng ngoại, m&ocirc;̣t đ&egrave;n chi&ecirc;́u v&agrave; cảm bi&ecirc;́n ch&acirc;́m với hơn 30.000 điểm kh&ocirc;ng nh&igrave;n thấy được để x&acirc;y dựng v&agrave; đ&ocirc;́i chi&ecirc;́u t&acirc;́t cả đường n&eacute;t tr&ecirc;n khu&ocirc;n mặt của người d&ugrave;ng mang lại khả năng nhận diện khu&ocirc;n mặt cực k&igrave; chuẩn x&aacute;c. D&ugrave; người d&ugrave;ng c&oacute; cạo đi r&acirc;u, thay đổi kiểu t&oacute;c th&igrave; Face ID cũng dễ d&agrave;ng nhận ra v&agrave; mở kh&oacute;a iPhone một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n\r\n<h3><strong>Vi xử l&yacute; Apple A11 Bionic đem lại những trải nghiệm d&ugrave;ng tuyệt vời</strong></h3>\r\n\r\n<p>Hiệu năng l&agrave; điều chưa bao giờ phải b&agrave;n c&atilde;i với c&aacute;c sản phẩm từ Apple v&agrave; <em>iPhone X 64Gb</em> cũng kh&ocirc;ng ngoại lệ. <strong>iPhone X 64GB</strong> được trang bị chip xử l&yacute; A11 Bionic s&aacute;u l&otilde;i (Hexa core) 64 bit đem lại tốc độ nhanh hơn 25% so với <a href=\"#\" target=\"_blank\">chip A10</a>, tiết kiệm năng lượng l&ecirc;n tới 70%.</p>\r\n\r\n<p><img alt=\"Vi xử lý Apple A11 Bionic đem lại những trải nghiệm dùng tuyệt vời\" src=\"https://cdn.cellphones.com.vn/media/wysiwyg/mobile/apple/iPhone-X-64GB-chinh-hang-VNA-6.jpg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; <a href=\"#\" target=\"_blank\">chip xử l&yacute; đồ họa GPU M11</a> cũng gi&uacute;p cải thiện tốc độ l&ecirc;n khoảng 30% so với GPU cũ. Nhờ vậy, người d&ugrave;ng c&oacute; thể lướt game nhanh v&agrave; mượt hơn.</p>\r\n\r\n<h3><strong>Mua iPhone X 64GB ch&iacute;nh h&atilde;ng VN/A gi&aacute; tốt tại CellphoneS</strong></h3>\r\n\r\n<p>Smartphone <em><strong>iPhone X 64GB ch&iacute;nh h&atilde;ng</strong></em> l&agrave; một flagship rất đ&aacute;ng để trải nghiệm. Hiện sản phẩm đang được b&aacute;n ch&iacute;nh h&atilde;ng tại hệ thống cửa h&agrave;ng của CellphoneS,nếu bạn quan t&acirc;m đến sản phẩm n&agrave;y th&igrave; h&atilde;y đến c&aacute;c hệ thống cửa h&agrave;ng <a href=\"#\" target=\"_blank\">CellphoneS </a>để được trải nghiệm tận tay. Ngo&agrave;i ra, khi mua iPhone X 64GB ch&iacute;nh h&atilde;ng kh&aacute;ch h&agrave;ng sẽ được hưởng nhiều ch&iacute;nh s&aacute;ch ưu đ&atilde;i mua h&agrave;ng trả g&oacute;p với thẻ t&iacute;n dụng, bảo h&agrave;nh 12 th&aacute;ng ch&iacute;nh h&atilde;ng, 1 đổi 1 trong 30 ng&agrave;y, miễn ph&iacute; giao h&agrave;ng, thu tiền tại nh&agrave;.</p>', '2019-07-22 21:16:44', '2019-07-22 21:42:37'),
(16, 'Apple iPhone 7 Plus 32GB', 'apple-iphone-7-plus-32gb', 9, 3, 12200000, 325, NULL, NULL, '/cowell/uploads/images/600_iphone_7_plus_silver_800x800_1_1.jpg', '<h2><a href=\"#\" target=\"_blank\">iPhone 7 Plus 32GB</a></h2>\r\n\r\n<p><em>Ra đời v&agrave;o năm 2016, <strong><a href=\"#\" target=\"_blank\">iPhone 7 Plus</a></strong> l&agrave; một trong những d&ograve;ng flagship ấn tượng của <a href=\"#\" target=\"_blank\"><strong>Apple</strong></a>. T&iacute;nh đến hiện tại, <strong>iPhone 7 Plus 32GB ch&iacute;nh h&atilde;ng VN/A </strong>vẫn l&agrave; một sự lựa chọn đ&aacute;ng gi&aacute; cho người d&ugrave;ng đang t&igrave;m kiếm một sản phẩm chất lượng, đẳng cấp v&agrave; c&oacute; mức gi&aacute; b&aacute;n ph&ugrave; hợp</em></p>\r\n\r\n<h3><strong>iPhone 7 Plus ch&iacute;nh h&atilde;ng VN/A l&agrave; g&igrave;? <strong>V&igrave; sao n&ecirc;n mua iPhone ch&iacute;nh h&atilde;ng VN/A?</strong></strong></h3>\r\n\r\n<p>iPhone ch&iacute;nh h&atilde;ng VN/A tại CellphoneS l&agrave; c&aacute;c sản phẩm iPhone được Apple sản xuất ri&ecirc;ng cho thị trường Việt Nam v&agrave; ph&acirc;n phối trực tiếp cho những c&ocirc;ng ty đối t&aacute;c tại Việt Nam. Khi mua iPhone ch&iacute;nh h&atilde;ng VN/A, bạn sẽ c&oacute; được những quyền lợi v&agrave; hỗ trợ m&agrave; c&aacute;c d&ograve;ng iPhone x&aacute;ch tay, iPhone cũ kh&ocirc;ng c&oacute;. Những ti&ecirc;u chuẩn về chất lượng sản phẩm cũng như c&aacute;c quyền lợi về bảo h&agrave;nh sản phẩm l&agrave; điều m&agrave; bạn sẽ được trải nghiệm r&otilde; r&agrave;ng nhất khi mua iPhone ch&iacute;nh h&atilde;ng VN/A.</p>', '2019-07-22 23:08:51', '2019-07-22 23:08:51'),
(17, 'iPhone 8 Plus 64GB Chính hãng', 'iphone-8-plus-64gb-chinh-hang', 9, 3, 17500000, 304, NULL, NULL, '/cowell/uploads/images/iphone_8_plus_64gb.jpg', '<p><em>Trong thời buổi hiện đại ng&agrave;y nay, <a href=\"#\" target=\"_blank\">smartphone</a> l&agrave; một trong những thiết bị di động kh&ocirc;ng thể thiếu đối với bất k&igrave; người d&ugrave;ng n&agrave;o. Nổi bật v&agrave; thịnh h&agrave;nh trong c&aacute;c thương hiệu tr&ecirc;n thị trường hiện nay kh&ocirc;ng thể n&agrave;o kh&ocirc;ng kể đến h&atilde;ng <a href=\"#\" target=\"_blank\">Apple</a>. C&aacute;c sản phẩm đến từ Apple đều mang lại chất lượng ho&agrave;n hảo. Như thường lệ, <strong>iPhone 8 Plus</strong> <strong>64GB </strong>ra đời với thiết kế c&ugrave;ng t&iacute;nh năng tuyệt vời sẽ mang đến cho người d&ugrave;ng những trải nghiệm th&uacute; vị nhất.</em></p>\r\n\r\n<h3><strong>Tại sao người d&ugrave;ng n&ecirc;n chọn mua iPhone 8 Plus 64GB ch&iacute;nh h&atilde;ng VN/A?</strong></h3>\r\n\r\n<p>L&yacute; do để người d&ugrave;ng lựa chọn chiếc <a href=\"#\" target=\"_self\">iPhone 8 Plus</a> ch&iacute;nh h&atilde;ng VN/A v&igrave; đ&acirc;y l&agrave; chiếc điện thoại c&oacute; gi&aacute; th&agrave;nh hợp l&yacute; v&agrave; chất lượng đảm bảo. Đ&acirc;y l&agrave; sản phẩm h&agrave;ng ch&iacute;nh h&atilde;ng sản xuất cho thị trường Việt Nam, do đại l&yacute; Apple được ủy quyền tại Việt Nam ph&acirc;n phối. Chất lượng h&agrave;ng h&oacute;a của iPhone 8 Plus 64GB ch&iacute;nh h&atilde;ng VN/A được đảm bảo theo đ&uacute;ng ti&ecirc;u chuẩn nh&agrave; sản xuất. Đặc biệt, tại hệ thống CellphoneS c&oacute; dịch vụ đổi mới 30 ng&agrave;y sau khi mua sản phẩm, bảo hiểm 1 năm hoặc hơn tại c&aacute;c trung t&acirc;m bảo h&agrave;nh ủy quyền. V&agrave; kh&ocirc;ng như iPhone 8 Plus 64gb cũ , iPhone 8 Plus VN/A sẽ được CellphoneS tặng th&ecirc;m 1 năm bảo h&agrave;nh ngo&agrave;i 12 th&aacute;ng bảo h&agrave;nh ch&iacute;nh h&atilde;ng từ Apple.</p>', '2019-07-22 23:10:41', '2019-07-22 23:10:41'),
(18, 'Apple iPhone XS Max 64GB', 'apple-iphone-xs-max-64gb', 9, 3, 28300000, 189, NULL, NULL, '/cowell/uploads/images/iphone_xs_max_64gb.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Điện thoại Apple iPhone Xs Max 64GB ch&iacute;nh h&atilde;ng VN/A</a> </strong><strong>- Chiếc <a href=\"#\" target=\"_blank\">điện thoại</a> đẳng cấp tương lai</strong></h2>\r\n\r\n<p><em>Ch&iacute;nh thức ra mắt v&agrave;o th&aacute;ng 9 năm 2018, <a href=\"#\" target=\"_blank\"><strong>iPhone XS MAX</strong></a> l&agrave; một trong những d&ograve;ng flagship th&agrave;nh c&ocirc;ng nhất của <a href=\"#\" target=\"_blank\"><strong>Apple</strong></a>. Kh&ocirc;ng phụ kỳ vọng của người h&acirc;m mộ, <strong>iPhone XS MAX 64GB ch&iacute;nh h&atilde;ng VN/A</strong> sỡ hữu những c&ocirc;ng nghệ nổi bật như chip A12 mạnh mẽ, m&agrave;n h&igrave;nh rộng đến 6.5 inches, camera k&eacute;p AI, Face ID n&acirc;ng cấp c&ugrave;ng dung lượng bộ nhớ tối ưu.</em></p>\r\n\r\n<h3><strong>iPhone ch&iacute;nh h&atilde;ng VN/A l&agrave; g&igrave;? V&igrave; sao n&ecirc;n mua iPhone ch&iacute;nh h&atilde;ng VN/A?</strong></h3>\r\n\r\n<p>iPhone ch&iacute;nh h&atilde;ng VN/A l&agrave; c&aacute;c sản phẩm iPhone được Apple sản xuất ri&ecirc;ng cho thị trường v&agrave; ph&acirc;n phối trực tiếp cho những c&ocirc;ng ty đối t&aacute;c tại Việt Nam. Khi mua d&ograve;ng sản phẩm n&agrave;y, bạn sẽ c&oacute; được những quyền lợi v&agrave; hỗ trợ m&agrave; c&aacute;c d&ograve;ng iPhone x&aacute;ch tay, iPhone cũ kh&ocirc;ng c&oacute;. Những ti&ecirc;u chuẩn về chất lượng sản phẩm cũng như c&aacute;c quyền lợi về bảo h&agrave;nh sản phẩm l&agrave; điều m&agrave; bạn sẽ được trải nghiệm r&otilde; r&agrave;ng nhất khi mua iPhone ch&iacute;nh h&atilde;ng VN/A.</p>\r\n\r\n<p>Thứ nhất, sản phẩm bạn mua sẽ được đảm bảo đ&uacute;ng c&aacute;c ti&ecirc;u chuẩn về chất lượng v&agrave; an to&agrave;n của Apple v&igrave; c&aacute;c sản phẩm iPhone ch&iacute;nh h&atilde;ng VN/A đều phải l&agrave; h&agrave;ng mới 100%, nguy&ecirc;n seal v&agrave; chưa active. C&aacute;c sản phẩm h&agrave;ng x&aacute;ch tay b&ecirc;n ngo&agrave;i thị trường c&oacute; thể c&oacute; gi&aacute; rẻ hơn nhưng vấn đề chất lượng sẽ kh&ocirc;ng được đảm bảo, tạo cảm gi&aacute;c kh&ocirc;ng y&ecirc;n t&acirc;m khi mua h&agrave;ng.</p>', '2019-07-22 23:12:19', '2019-07-22 23:12:19'),
(19, 'Samsung Galaxy A50', 'samsung-galaxy-a50', 10, 4, 6050000, 385, NULL, NULL, '/cowell/uploads/images/636868742458652464_samsung-galaxy-a50-xanh-1.png', '<h2><strong><a href=\"#\" target=\"_blank\">Điện thoại Samsung Galaxy A50</a> – <a href=\"#\" target=\"_blank\">Smartphone</a> với m&agrave;n h&igrave;nh tr&agrave;n viền, cụm 3 camera ấn tượng</strong></h2>\r\n\r\n<p><em>Sau <a href=\"#\" target=\"_blank\"><strong>Galaxy A20</strong></a> v&agrave; <a href=\"#\" target=\"_blank\"><strong>Galaxy A30</strong></a> th&igrave; mới đ&acirc;y <a href=\"https://cellphones.com.vn/mobile/samsung.html\" target=\"_blank\"><strong>SamSung</strong></a> tiếp tục bổ sung một c&aacute;i t&ecirc;n mới v&agrave;o danh s&aacute;ch <a href=\"#\" target=\"_blank\"><strong>Galaxy A</strong></a> của m&igrave;nh, đ&oacute; ch&iacute;nh l&agrave; <strong>SamSung Galaxy A50</strong>. A50 với nhiều c&ocirc;ng nghệ với v&agrave; hấp dẫn như cảm biến v&acirc;n tay trong m&agrave;n h&igrave;nh, cụm 3 camera hứa hẹn sẽ mang đến trải nghiệm tuyệt vời cho người d&ugrave;ng.</em></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh 6.4 inch – tận hưởng trọn vẹn với m&agrave;n h&igrave;nh v&ocirc; cực</strong></h3>\r\n\r\n<p>Galaxy A50 sở hữu một m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước lớn l&ecirc;n đến 6.4 inch c&ugrave;ng c&ocirc;ng nghệ m&agrave;n h&igrave;nh Infinity-U tr&agrave;n viền mang đến những trải nghiệm tận c&ugrave;ng cho người d&ugrave;ng. C&ugrave;ng với đ&oacute; l&agrave; tấm nền <a href=\"#\" target=\"_self\">Super AMOLED</a> chuẩn FHD+ v&agrave; m&agrave;n h&igrave;nh 16 triệu m&agrave;u nhờ đ&oacute; A50 mang đến những trải nghiệm xem ho&agrave;n to&agrave;n kh&aacute;c biệt với những h&igrave;nh ảnh sắc n&eacute;t, ch&acirc;n thực v&agrave; sống động đến từng chi tiết.</p>', '2019-07-22 23:18:24', '2019-07-22 23:18:24'),
(20, 'Samsung Galaxy S10+ (Plus)', 'samsung-galaxy-s10-plus', 10, 4, 19090000, 450, NULL, NULL, '/cowell/uploads/images/samsung-galaxy-s10-white-600x600.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Samsung Galaxy S10 Plus</a> ch&iacute;nh h&atilde;ng, nhiều ưu đ&atilde;i khi đặt trước</strong></h2>\r\n\r\n<p><em>Vậy l&agrave; <strong><a href=\"#\" target=\"_blank\">Samsung Galaxy S </a></strong>thế hệ thứ 10 đ&atilde; được ra mắt, v&agrave; kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng một ch&uacute;t n&agrave;o. Trong bộ ba si&ecirc;u phẩm d&ograve;ng S năm nay,<strong><a href=\"#\" target=\"_blank\">Samsung Galaxy S10 Plus</a> </strong>l&agrave; thiết bị đắt gi&aacute; cũng như được trang bị những t&iacute;nh năng đ&igrave;nh đ&aacute;m nhất từ <strong><a href=\"#\" target=\"_blank\">Samsung</a></strong>. Đ&acirc;y hứa hẹn sẽ trở th&agrave;nh một trong những smartphone ho&agrave;n hảo nhất năm 2019. Ngo&agrave;i ra, c&aacute;c si&ecirc;u phẩm dự kiến tr&igrave;nh l&agrave;ng của Samsung như <a href=\"#\" target=\"_blank\"><strong>Samsung Galaxy S10e</strong></a>, <a href=\"#\" target=\"_blank\"><strong>Samsung Galaxy Note 10 </strong></a>với những thiết kế c&ugrave;ng t&iacute;nh năng đột ph&aacute; hứa hẹn sẽ b&ugrave;ng nổ giới c&ocirc;ng nghệ trong năm nay. </em></p>\r\n\r\n<h3><strong>Thiết kế thi&ecirc;n hướng <a href=\"#\" target=\"_blank\">Note 9</a>, kiểu m&agrave;n h&igrave;nh Infinity-O độc đ&aacute;o</strong></h3>\r\n\r\n<p>B&agrave;i to&aacute;n về hiển thị full m&agrave;n h&igrave;nh đ&atilde; được Samsung ho&agrave;n th&agrave;nh xuất sắc tr&ecirc;n Samsung Galaxy S10 Plus. Với thiết kế Infinity-O, m&agrave;n h&igrave;nh 6.4 inch tr&ecirc;n Galaxy S10 Plus đ&atilde; gần như chiếm trọn bộ mặt trước, với viền tr&ecirc;n v&agrave; cằm ở dưới rất mỏng. Tai thỏ, cũng như phần viền d&agrave;y đ&atilde; biến mất, thay v&agrave;o đ&oacute; l&agrave; một ‘nốt ruồi’ chứa 2 camera selfie nằm ở g&oacute;c phải m&agrave;n h&igrave;nh.</p>\r\n\r\n<p>Phần nốt ruồi n&agrave;y được Samsung thiết kế rất tỉ mỉ, gọn g&agrave;ng, kh&ocirc;ng g&acirc;y qu&aacute; nhiều sự ch&uacute; &yacute;. B&ecirc;n cạnh đ&oacute;, nh&agrave; sản xuất H&agrave;n Quốc cũng kỹ lưỡng c&agrave;i đặt sẵn tr&ecirc;n m&aacute;y những h&igrave;nh nền mặc định ‘tối dần’ về ph&iacute;a g&oacute;c tr&aacute;i, nhằm gi&uacute;p thiết kế tr&ocirc;ng liền lạc hơn.</p>', '2019-07-22 23:23:18', '2019-07-22 23:23:18'),
(21, 'Samsung Galaxy A30 64GB', 'samsung-galaxy-a30-64gb', 10, 4, 5200000, 368, NULL, NULL, '/cowell/uploads/images/f02bbe83e8987ecd4f2c3d8da6391d57.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Samsung Galaxy A30 64GB</a></strong></h2>\r\n\r\n<p><em><strong>Samsung Galaxy A30 64GB</strong> l&agrave; một chiếc điện thoại mới m&agrave; <strong><a href=\"#\" target=\"_blank\">Samsung</a> </strong>sẽ cho ra mắt v&agrave;o năm 2019 n&agrave;y. Sản phẩm c&oacute; thể n&oacute;i l&agrave; đ&aacute;ng kỳ vọng nhất trong ph&acirc;n kh&uacute;c điện thoại th&ocirc;ng minh tầm trung của h&atilde;ng sản xuất từ xứ sở kim chi n&agrave;y. Ngo&agrave;i ra, Samsung Galaxy A30 c&ograve;n c&oacute; phi&ecirc;n bản bộ nhớ trong thấp hơn l&agrave; <strong><a href=\"#\" target=\"_blank\">Galaxy A30 32GB</a></strong></em></p>\r\n\r\n<h3>Firmware mạnh mẽ hơn</h3>\r\n\r\n<p>Samsung Galaxy A30 64GB được h&atilde;ng n&acirc;ng cấp cho một chế độ Firmware với độ tin cậy cao hơn v&agrave; mạnh mẽ hơn đ&oacute; l&agrave; Firmware Over The Air cho Samsung Knox. Với hệ thống n&agrave;y bạn c&oacute; thể cập nhật hầu như mọi t&iacute;nh năng mới th&ocirc;ng qua kết nối Internet.</p>', '2019-07-22 23:25:25', '2019-07-22 23:25:25'),
(22, 'Samsung Galaxy Note 9 512GB', 'samsung-galaxy-note-9-512gb', 10, 4, 23490000, 266, NULL, NULL, '/cowell/uploads/images/636703751255250068_note9-dong-1_1.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Điện thoại Samsung Galaxy Note 9 512GB</a> - <a href=\"#\" target=\"_blank\">Smartphone</a> thiết kế m&agrave;n h&igrave;nh cong độc đ&aacute;o c&ugrave;ng t&iacute;nh năng vượt trội</strong></h2>\r\n\r\n<p><em>Sau sự th&agrave;nh c&ocirc;ng của Galaxy Note 8 th&igrave; v&agrave;o th&aacute;ng 8/2018, <strong><a href=\"#\" target=\"_blank\">Samsung</a></strong> tr&igrave;nh l&agrave;ng phi&ecirc;n bản tiếp theo với c&aacute;c cải tiến đột ph&aacute; mang t&ecirc;n <strong>Samsung Galaxy Note 9. </strong>D&ograve;ng <a href=\"#\" target=\"_blank\"><strong>Galaxy Note</strong></a> g&acirc;y ấn tượng mạnh mẽ với giới c&ocirc;ng nghệ từ chiếc b&uacute;t S-Pen th&ocirc;ng minh vi diệu cũng như vi&ecirc;n pin dung lượng cực khủng 4.000 mAh.</em></p>\r\n\r\n<h3><strong>Thiết kế sang trọng, tinh tế v&agrave; m&agrave;n h&igrave;nh tr&agrave;n viền ph&aacute; vỡ c&aacute;c khu&ocirc;n khổ giới hạn</strong></h3>\r\n\r\n<p>Thừa kế vẻ đẹp từ đ&agrave;n anh Galaxy Note 8, Samsung Galaxy Note 9 sở hữu thiết kế mạnh mẽ với khung viền kim loại sắc sảo với hai mặt k&iacute;nh cong 3D, đồng thời c&oacute; phần mềm mại với những đường cong c&aacute;ch điệu. Điểm thay đổi đ&aacute;ng ch&uacute; &yacute; ch&iacute;nh l&agrave; cảm biến v&acirc;n tay của Note 9 được đặt ở mặt lưng, ph&iacute;a dưới cụm camera k&eacute;p - đ&acirc;y l&agrave; vị tr&iacute; v&ocirc; c&ugrave;ng thuận lợi để bạn c&oacute; thể mở kh&oacute;a thiết bị dễ d&agrave;ng.</p>', '2019-07-22 23:32:56', '2019-07-22 23:32:56'),
(23, 'Xiaomi Mi 9 SE', 'xiaomi-mi-9-se', 11, 9, 7690000, 268, NULL, NULL, '/cowell/uploads/images/430.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Điện thoại Xiaomi Mi 9 SE </a>độc đ&aacute;o với thiết kế viền m&agrave;n h&igrave;nh cong 2.5D c&ugrave;ng dung lượng pin khủng</strong></h2>\r\n\r\n<p><em><strong>(*) Điện thoại Xiaomi ch&iacute;nh h&atilde;ng, c&oacute; sẵn tiếng Việt, đầy đủ ứng dụng của Google. Bạn c&oacute; thể sử dụng ngay b&igrave;nh thường. Kh&aacute;c với c&aacute;c m&aacute;y h&agrave;ng x&aacute;ch tay: kh&ocirc;ng c&oacute; sẵn rom tiếng Việt, chặn c&aacute;c ứng dụng của Google</strong></em></p>\r\n\r\n<p><em>Trong thời đại ng&agrave;y nay, để sở hữu cho m&igrave;nh một chiếc <a href=\"#\" target=\"_blank\"><strong>smartphone</strong></a> kh&ocirc;ng c&ograve;n l&agrave; điều kh&oacute; khăn nữa. Những l&agrave;m thế n&agrave;o để c&oacute; được một chiếc smartphone với gi&aacute; cả hợp l&iacute; m&agrave; vẫn đảm bảo c&aacute;c tiện &iacute;ch vượt trội mới l&agrave; điều m&agrave; người d&ugrave;ng cần đến. Để đ&aacute;p ứng điều đ&oacute; <a href=\"#\" target=\"_blank\"><strong>Xiaomi</strong></a> đ&atilde; cho ra mắt <strong>Xiaomi Mi 9 SE</strong> với những t&iacute;nh năng hứa hẹn sẽ l&agrave;m h&agrave;i l&ograve;ng người d&ugrave;ng.</em></p>\r\n\r\n<h3><strong>Xiaomi Mi 9 SE c&oacute; m&agrave;n h&igrave;nh giọt nước bắt kịp xu hướng c&ugrave;ng hiệu ứng gradient đẹp mắt</strong></h3>\r\n\r\n<p>Về ngoại h&igrave;nh, m&aacute;y kh&ocirc;ng c&oacute; nhiều kh&aacute;c biệt so với người anh em <a href=\"#\" target=\"_blank\">Xiaomi Mi 9</a>. K&iacute;ch thước của m&agrave;n h&igrave;nh tr&ecirc;n m&aacute;y chỉ c&ograve;n 5.97 inch c&ugrave;ng viền m&agrave;n h&igrave;nh được thiết kế cong 2.5D rất hiện đại. Song song đ&oacute;, bạn sẽ vẫn c&oacute; cơ hội trải nghiệm thiết kế mặt lưng với hiệu ứng đổi m&agrave;u gradient đẹp mắt tr&ecirc;n <strong>Mi 9 SE</strong>. Hiệu ứng gradient l&agrave; sự kết hợp giữa hai hoặc nhiều m&agrave;u sắc kh&aacute;c nhau, được biến chuyển một c&aacute;ch mềm mại m&agrave; kh&ocirc;ng c&oacute; gi&aacute;n đoạn, tr&ocirc;ng nổi bật hơn bất k&igrave; m&agrave;u đơn sắc n&agrave;o kh&aacute;c<strong><em>.</em></strong><strong><em> </em></strong></p>', '2019-07-22 23:38:07', '2019-07-22 23:42:24'),
(24, 'Huawei P30 Lite', 'huawei-p30-lite', 12, 6, 6690000, 258, NULL, NULL, '/cowell/uploads/images/huawei-p30-lite-1-600x600.jpg', '<h2><strong><a href=\"#\" target=\"_blank\">Điện thoại Huawei P30 Lite</a> - <a href=\"#\" target=\"_blank\">Smartphone</a> gi&aacute; rẻ được t</strong>rang bị 3 camera sau, chip Kirin 710</h2>\r\n\r\n<p><em>Tiếp nối sự th&agrave;nh c&ocirc;ng của Huawei P20, thế hệ Huawei P30 sắp được ra mắt bao gồm <strong><a href=\"#\">Huawei P30</a>, <a href=\"#\">P30 Pro</a> v&agrave; P30 Lite</strong>hứa hẹn mang đến một luồng gi&oacute; mới cho thị trường smartphone trong năm 2019. Trong số những sản phẩm sắp ra mắt đ&oacute;, <strong>Huawei P30 Lite</strong> chắc chắn sẽ tiếp tục trở th&agrave;nh thiết bị c&oacute; cấu h&igrave;nh tốt c&ugrave;ng gi&aacute; b&aacute;n dễ tiếp cận nhất đến từ <strong><a href=\"#\" target=\"_blank\">Huawei</a></strong>.</em></p>\r\n\r\n<h3><strong>P30 Lite c&oacute; m&agrave;n h&igrave;nh 6.0 inch Full HD+, thiết kế giọt nước</strong></h3>\r\n\r\n<p>Theo những th&ocirc;ng số r&ograve; rỉ, Huawei P30 Lite sẽ được trang bị một m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước 6.0 inch độ ph&acirc;n giải Full HD+. B&ecirc;n cạnh đ&oacute;, tương tự như P20 Lite, tấm nền m&agrave;n h&igrave;nh tr&ecirc;n P30 Lite vẫn sẽ giữ nguy&ecirc;n l&agrave; IPS LCD. M&agrave;n h&igrave;nh n&agrave;y chắc chắn sẽ mang đến cho người d&ugrave;ng một trải nghiệm tốt với m&agrave;u sắc ch&acirc;n thực c&ugrave;ng độ s&aacute;ng cao.</p>', '2019-07-22 23:55:14', '2019-07-22 23:55:14'),
(25, '( IPS 24\" 75Hz ) Acer R241Y', 'ips-24-75hz-acer-r241y', 14, 10, 3790000, 89, NULL, NULL, '/cowell/uploads/images/27129_acer_r241y.jpg', '<p><strong>Th&ocirc;ng tin chung:</strong></p>\r\n\r\n<p><strong>-Nh&agrave; sản xuất :</strong> Acer</p>\r\n\r\n<p><strong>-M&agrave;u:</strong> Đen. </p>\r\n\r\n<p><strong>-T&igrave;nh trạng :</strong> NEW - 100%</p>\r\n\r\n<p><strong>-Bảo h&agrave;nh :</strong> 36 th&aacute;ng</p>\r\n\r\n<p><strong>- M&atilde; sản phẩm:</strong> R241YB</p>\r\n\r\n<p><strong> Khuyến M&atilde;i Cực Khủng:</strong></p>\r\n\r\n<p><strong>🎁 Tặng k&egrave;m ngay 1 tai nghe gaming <a href=\"#\">Acer Predator Galea 311</a> trị gi&aacute; 2.990.000 VND (&aacute;p dụng cho tất cả c&aacute;c m&atilde; m&agrave;n h&igrave;nh Acer)</strong></p>', '2019-07-23 00:01:58', '2019-07-23 00:01:58'),
(26, 'Kingston SSDNow UV400 120GB', 'kingston-ssdnow-uv400-120gb', 13, 5, 1350000, 256, NULL, NULL, '/cowell/uploads/images/1ac431b6bd2ab93989810af0d5ec1aec.jpg', '<p><strong>Th&ocirc;ng tin chung:</strong><br />\r\n<strong>-Nh&agrave; sản xuất : Kingston</strong><br />\r\n<strong>-T&igrave;nh trạng</strong><strong> :</strong> NEW - 100%</p>\r\n\r\n<p><strong>-Bảo h&agrave;nh</strong><strong> :</strong> 36 th&aacute;ng </p>', '2019-07-23 00:04:40', '2019-07-23 00:04:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `notes`, `remember_token`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@127.0.0.1', '$2y$10$5ex1k.a6mPl0HW6l0jn7HutDJy55/yAbyXCy3dszmuUDWZr38K26m', NULL, NULL, 9, '2019-07-15 23:44:26', '2019-07-23 00:06:37'),
(2, 'Nam Nguyễn', 'n4m.nv.1997@gmail.com', '$2y$10$hu9CapVD2x5RzY5kU8FIv.4nrs5Y.7fxhN3uEqHN3BQmclpOJFN.i', NULL, NULL, 1, '2019-07-16 01:15:00', '2019-07-16 03:22:06'),
(3, 'Nam Nguyễn', 'namnguyen.pveser@gmail.com', '$2y$10$hdg25PimkqxAbVTJcyTRjOndSmXTWNqxpBUns9tVLx8aglErKb87i', NULL, NULL, 8, '2019-07-16 01:27:58', '2019-07-16 01:27:58'),
(4, 'Hoàng Đạt', 'hoangdat@gmail.com', '$2y$10$zU5QeeL54kwtr5StiEuZnOp8zyuZyXonaHnNrH1/kfqlVXPz3j1H2', NULL, NULL, 6, '2019-07-16 03:22:53', '2019-07-16 03:22:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DELL .Inc', NULL, '2019-07-15 23:54:48', '2019-07-15 23:54:48'),
(2, 'ASUS', NULL, '2019-07-15 23:54:58', '2019-07-15 23:54:58'),
(3, 'Apple .Inc', NULL, '2019-07-15 23:55:11', '2019-07-15 23:55:11'),
(4, 'Samsung', NULL, '2019-07-15 23:55:22', '2019-07-15 23:55:22'),
(5, 'Kingston', NULL, '2019-07-15 23:55:34', '2019-07-15 23:55:34'),
(6, 'Huawei .Inc', NULL, '2019-07-15 23:55:47', '2019-07-15 23:55:47'),
(7, 'HP .Inc', 'Mô tả nhà sản xuất HP', '2019-07-22 20:28:31', '2019-07-22 20:28:31'),
(8, 'Lenovo .Inc', 'Mô tả nhà sản xuất Lenovo', '2019-07-22 20:32:59', '2019-07-22 20:32:59'),
(9, 'Xiaomi .Inc', 'Mô tả nhà sản xuất Xiaomi .Inc', '2019-07-22 23:38:41', '2019-07-22 23:38:41'),
(10, 'Acer .Inc', 'Mô tả nhà sản xuất Acer', '2019-07-22 23:57:51', '2019-07-22 23:57:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_order_id_foreign` (`order_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_cate_id_foreign` (`cate_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
