-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2024 at 12:09 PM
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
-- Database: `shaklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint DEFAULT NULL,
  `treatmens_id` bigint DEFAULT NULL,
  `quantity` bigint DEFAULT NULL,
  `total_harga` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingtreatmens`
--

CREATE TABLE `bookingtreatmens` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_janji` time DEFAULT NULL,
  `tgl_janji` date DEFAULT NULL,
  `total_price` bigint DEFAULT NULL,
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MIDTRANS',
  `payment_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PROSES',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtreatmens`
--

INSERT INTO `bookingtreatmens` (`id`, `users_id`, `kode`, `nama_pemesan`, `no_hp`, `alamat`, `jam_janji`, `tgl_janji`, `total_price`, `payment`, `payment_url`, `status`, `created_at`, `updated_at`) VALUES
(11, 6, 'INVB-8486', 'Kaori', '08324434544', 'Paal Lima Kota Baru Jambi', '03:00:00', '2024-08-23', 380000, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/cce6a31b-32a3-47eb-b72b-44bafc4e5d41', 'PROSES', '2024-08-18 14:19:26', '2024-08-18 14:19:26'),
(12, 7, 'INVB-5875', 'Ulva', '081271466359', 'Kota Baru', '14:00:00', '2024-08-25', 2200000, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/ed2a5a91-da8e-4807-8804-19517d726637', 'SUCCESS', '2024-08-18 15:59:46', '2024-08-18 16:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtreatmen_items`
--

CREATE TABLE `bookingtreatmen_items` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint DEFAULT NULL,
  `bookingtreatmens_id` bigint DEFAULT NULL,
  `treatments_id` bigint DEFAULT NULL,
  `quantity` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtreatmen_items`
--

INSERT INTO `bookingtreatmen_items` (`id`, `users_id`, `bookingtreatmens_id`, `treatments_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 1, 9, 1, 1, '2023-07-19 19:36:27', '2023-07-19 19:36:27'),
(7, 1, 10, 1, 1, '2024-08-18 14:10:14', '2024-08-18 14:10:14'),
(8, 6, 11, 2, 1, '2024-08-18 14:19:26', '2024-08-18 14:19:26'),
(9, 7, 12, 1, 1, '2024-08-18 15:59:46', '2024-08-18 15:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint NOT NULL,
  `products_id` bigint NOT NULL,
  `quantity` bigint DEFAULT NULL,
  `total_harga` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `kode`, `name`, `created_at`, `updated_at`) VALUES
(1, 'C-991', 'FW', '2023-05-21 16:31:10', '2024-08-18 15:39:16'),
(2, 'C-6854', 'Sunblok', '2023-05-29 04:22:46', '2024-08-18 14:55:32'),
(3, 'C-2055', 'Moisturizer', '2024-08-18 14:55:46', '2024-08-18 14:55:46'),
(4, 'C-6041', 'Serum', '2024-08-18 14:56:15', '2024-08-18 14:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `categorytreatmens`
--

CREATE TABLE `categorytreatmens` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_bagian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorytreatmens`
--

INSERT INTO `categorytreatmens` (`id`, `kode`, `nama_bagian`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CT-0001', 'Injection', NULL, '2023-05-28 23:57:58', '2023-05-28 23:57:58'),
(2, 'CT-9561', 'Surgery', '2024-08-18 15:21:10', '2023-05-29 04:57:55', '2024-08-18 15:21:10'),
(3, 'CT-2936', 'Peeling', NULL, '2023-05-29 05:00:08', '2024-08-18 15:39:29'),
(5, 'CT-5355', 'Others', NULL, '2023-05-29 05:01:25', '2023-05-29 05:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tunggus`
--

CREATE TABLE `daftar_tunggus` (
  `id` bigint UNSIGNED NOT NULL,
  `no_urut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_jadwal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokter_id` bigint DEFAULT NULL,
  `users_id` bigint DEFAULT NULL,
  `treatmen_id` bigint DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jumlah` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_tunggus`
--

INSERT INTO `daftar_tunggus` (`id`, `no_urut`, `kode_jadwal`, `dokter_id`, `users_id`, `treatmen_id`, `jam`, `tgl`, `jumlah`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'JD-4418', 2, 2, 1, '11:26:00', '2023-06-02', 2, '2023-06-01 21:27:06', '2023-06-01 21:26:35', '2023-06-01 21:27:06'),
(2, '1', 'JD-6294', 2, 2, 1, '11:27:00', '2023-06-02', 2, '2023-06-01 21:28:08', '2023-06-01 21:27:19', '2023-06-01 21:28:08'),
(3, 'Nomor Urut - 1', 'JD-4092', 2, 2, 1, '12:29:00', '2023-06-02', 2, '2023-06-01 21:36:07', '2023-06-01 21:28:18', '2023-06-01 21:36:07'),
(4, 'Nomor Urut - 1', 'JD-8373', 2, 2, 1, '13:34:00', '2023-06-02', 2, '2023-06-01 21:36:00', '2023-06-01 21:34:32', '2023-06-01 21:36:00'),
(5, 'Nomor Urut - 1', 'JD-9225', 2, 2, 1, '11:35:00', '2023-06-02', 1, '2023-06-01 21:36:04', '2023-06-01 21:35:02', '2023-06-01 21:36:04'),
(6, '1', 'JD-6319', 2, 2, 1, '11:36:00', '2023-06-02', 1, '2023-06-01 21:39:19', '2023-06-01 21:36:17', '2023-06-01 21:39:19'),
(7, '2', 'JD-3377', 2, 2, 1, '12:36:00', '2023-06-02', 1, '2023-06-01 21:39:23', '2023-06-01 21:36:33', '2023-06-01 21:39:23'),
(8, '3', 'JD-5736', 2, 2, 1, '12:38:00', '2023-06-03', 2, '2023-06-01 21:39:25', '2023-06-01 21:37:27', '2023-06-01 21:39:25'),
(9, '3', 'JD-3386', 2, 2, 2, '12:37:00', '2023-06-03', 2, '2023-06-01 21:39:27', '2023-06-01 21:38:02', '2023-06-01 21:39:27'),
(10, '1', 'JD-9800', 2, 2, 1, '11:39:00', '2023-06-02', 2, '2023-07-20 05:16:52', '2023-06-01 21:39:38', '2023-07-20 05:16:52'),
(11, '2', 'JD-8385', 2, 2, 1, '13:39:00', '2023-06-02', 1, '2023-07-20 05:16:56', '2023-06-01 21:39:52', '2023-07-20 05:16:56'),
(12, '3', 'JD-5125', 2, 2, 4, '12:39:00', '2023-06-03', 1, '2023-06-01 21:42:08', '2023-06-01 21:40:06', '2023-06-01 21:42:08'),
(13, '1', 'JD-9766', 2, 2, 1, '13:41:00', '2023-06-03', 1, '2023-07-20 05:16:59', '2023-06-01 21:41:52', '2023-07-20 05:16:59'),
(15, '3', 'JD-7112', 2, 2, 1, '13:42:00', '2023-06-02', 3, '2023-07-20 05:17:01', '2023-06-01 21:42:55', '2023-07-20 05:17:01'),
(16, '4', 'JD-9768', 2, 2, 1, '15:04:00', '2023-06-02', 2, '2024-08-18 15:43:32', '2023-06-01 22:04:33', '2024-08-18 15:43:32'),
(17, '1', 'JD-6591', 2, 2, 1, '15:04:00', '2023-06-03', 3, '2023-06-01 22:08:18', '2023-06-01 22:04:50', '2023-06-01 22:08:18'),
(18, '2', 'JD-1645', 2, 2, 2, '12:09:00', '2023-06-03', 1, '2024-08-18 15:46:48', '2023-06-01 22:08:34', '2024-08-18 15:46:48'),
(19, '3', 'JD-3820', 2, 2, 2, '15:11:00', '2023-06-03', 1, '2024-08-18 15:46:53', '2023-06-01 22:08:57', '2024-08-18 15:46:53'),
(20, '1', 'JD-9817', 2, 2, 2, '12:12:00', '2023-06-04', 3, '2024-08-18 15:47:04', '2023-06-01 22:09:30', '2024-08-18 15:47:04'),
(21, '1', 'JD-6865', NULL, 4, 1, '10:35:00', '2023-07-28', 1, '2023-07-27 15:35:24', '2023-07-27 15:34:24', '2023-07-27 15:35:24'),
(22, '1', 'JD-2265', 2, 4, 1, '14:35:00', '2023-07-27', 1, '2024-08-18 15:47:10', '2023-07-27 15:35:18', '2024-08-18 15:47:10'),
(23, '2', 'JD-6574', 2, 4, 4, '12:35:00', '2023-07-27', 1, '2024-08-18 15:47:15', '2023-07-27 15:35:46', '2024-08-18 15:47:15'),
(24, '1', 'JD-4092', 3, 6, 2, '15:00:00', '2024-08-24', 1, NULL, '2024-08-18 15:51:23', '2024-08-18 15:51:23'),
(25, '2', 'JD-7773', 4, 7, 1, '14:00:00', '2024-08-24', 1, NULL, '2024-08-18 16:02:31', '2024-08-18 16:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlpn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `kode_dokter`, `nama_dokter`, `foto_dokter`, `no_tlpn`, `alamat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'DT-01234', 'Mario G ', NULL, '082323112313', 'jln suka bumi testing hahaha', '2023-06-01 20:17:45', '2023-06-02 02:57:24', '2023-06-01 20:17:45'),
(3, 'KDT-1702', 'Dr Elisha', NULL, '08132323243', '<p>asdsdasdas</p>', NULL, '2024-08-18 14:05:30', '2024-08-19 05:52:56'),
(4, 'KDT-9499', 'dr Toni', NULL, '0813242335', NULL, NULL, '2024-08-18 15:13:34', '2024-08-18 15:13:34');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_06_035346_create_sessions_table', 1),
(7, '2021_01_17_161413_create_products_table', 1),
(8, '2021_01_17_161427_create_product_galleries_table', 1),
(9, '2021_01_17_161434_create_carts_table', 1),
(16, '2023_05_21_123239_create_treatmens_table', 1),
(17, '2023_05_21_123313_create_categorytreatmens_table', 1),
(20, '2023_05_21_125339_create_bookings_table', 1),
(21, '2023_05_21_155601_create_categories_table', 1),
(22, '2014_10_12_000000_create_users_table', 2),
(23, '2021_01_18_014436_add_roles_to_users_table', 2),
(24, '2021_01_17_161441_create_transactions_table', 3),
(25, '2021_03_10_095604_add_total_price_to_transactions_table', 3),
(26, '2021_03_10_102228_add_status_to_transactions_table', 3),
(27, '2021_03_10_095130_create_transaction_items_table', 4),
(28, '2021_03_10_171018_add_transactions_id_to_transaction_items_table', 4),
(29, '2023_05_21_124430_create_bookingtreatmens_table', 5),
(31, '2023_05_21_124447_create_bookingtreatmen_items_table', 6),
(32, '2023_06_02_021927_create_dokters_table', 7),
(34, '2023_06_02_031720_create_daftar_tunggus_table', 8),
(35, '2023_07_27_221148_add_no_tlp_to_users_table', 9);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` bigint DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode`, `categories_id`, `name`, `price`, `description`, `stock`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'P-0001', 1, 'Facial Wash FWN', 72000, '<p>Sabun Wajah untuk kulit normal</p>', 72, 'facial-wash-fwn', NULL, '2023-05-21 09:32:03', '2024-08-18 16:12:37'),
(3, 'P-0002', 3, 'Moisturizer TXA Mois', 85000, '<p>Pelembab Wajah</p>', 10, 'moisturizer-txa-mois', NULL, '2023-05-21 09:32:03', '2024-08-18 15:20:27'),
(8, 'P-2299', 1, 'Facial Wash Acne', 80000, '<p>Sabun Wajah untuk kulit jerawat</p>', 494, 'facial-wash-acne', NULL, '2023-05-29 04:00:47', '2024-08-19 07:54:18'),
(9, 'P-1362', 1, 'Cream Sha', 150000, '<p>Cream Sha membuat wajah glowing&nbsp;</p>', NULL, 'cream-sha', '2023-08-02 17:16:18', '2023-08-02 17:13:51', '2023-08-02 17:16:18'),
(10, 'P-3710', 2, 'SB White', 90000, '<p>Sunblok Melindungi Kulit dari sinar matahari</p>', 24, 'sb-white', NULL, '2024-08-18 14:57:58', '2024-08-18 14:57:58'),
(11, 'P-4415', 2, 'SB F4', 85000, '<p>Sunblok yang dikhusus kan untuk wajah yang berjerawat</p>', 7, 'sb-f4', NULL, '2024-08-18 14:59:17', '2024-08-18 14:59:17'),
(12, 'P-9412', 4, 'Whitening Serum', 120000, '<p>Untuk Mencerahkan dan mengencangkan kulit wajah</p>', 41, 'whitening-serum', NULL, '2024-08-18 15:00:52', '2024-08-19 07:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `products_id` bigint NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `products_id`, `url`, `is_featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/gallery/uyxv6e1c1beKnAKTYluO1a6MYS0xk3LU7b1A88Eo.png', 0, '2023-05-29 06:07:51', '2023-05-28 16:17:06', '2023-05-29 06:07:51'),
(2, 1, 'public/gallery/8daIBuDdgMOSCDk7Xtpxi7jZMGny1nzOUFIpLXk6.png', 0, '2023-05-29 06:07:53', '2023-05-29 04:13:05', '2023-05-29 06:07:53'),
(3, 1, 'public/gallery/PYpCRDZOrVRaXLnpUoztlEGVsbGQEbRFZVHqjRbz.png', 0, '2023-05-29 06:07:56', '2023-05-29 04:15:26', '2023-05-29 06:07:56'),
(4, 1, 'public/gallery/rvi5d7WCMfxaXXDcOhd56cmkcIXuA8LpHO1vV4Hb.png', 0, '2023-05-29 06:07:58', '2023-05-29 04:16:07', '2023-05-29 06:07:58'),
(5, 1, 'public/gallery/xMhTKJRVFsKRR8Vo1zkIUhuuGTY6F1NalMCTiQPA.png', 0, NULL, '2023-05-29 06:08:07', '2023-05-29 06:08:07'),
(6, 1, 'public/gallery/TeYvumOLUhVdXEouv4xcj7tFqPq0bsyGK7vuReAy.jpg', 0, NULL, '2023-05-29 06:43:51', '2023-05-29 06:43:51'),
(7, 1, 'public/gallery/lvqHlqs0cZ2CahFhVmqGVxmMm4HyUuwL8BbSv284.png', 0, NULL, '2024-08-18 15:34:34', '2024-08-18 15:34:34'),
(8, 3, 'public/gallery/WPZLlZidACX2jGE9KNZAXsQBLZSlpAcWFsxyRtDd.png', 0, NULL, '2024-08-18 15:35:49', '2024-08-18 15:35:49'),
(9, 11, 'public/gallery/awigB0PXDJ3PXVZHNHkyvtofaJ2cI75wrrJf0bfY.png', 0, NULL, '2024-08-18 15:36:47', '2024-08-18 15:36:47'),
(10, 10, 'public/gallery/NNWDhwkLOsDZ942n1h8oF2xVMMMSkaPsqkiFiyo4.png', 0, NULL, '2024-08-18 15:37:17', '2024-08-18 15:37:17'),
(11, 8, 'public/gallery/1euAPgU94xwD9cC862S5lh0Dwi1MUYXh6cMSgurs.png', 0, NULL, '2024-08-18 15:37:49', '2024-08-18 15:37:49'),
(12, 12, 'public/gallery/5KDtnxkB1qn59W4QlBwTDwjxgM4p2sNlGfwyanfr.png', 0, NULL, '2024-08-18 15:38:02', '2024-08-18 15:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('k3lw9hNY6ieIcc7gUlykOaZSLOR2nzRMhBfBLVDL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib09OcDB3YXQyWHNJdWZnQlgzWEpvMmtCQU5GRDE5RUtIeWkxR2VQayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724078479),
('mdijpus1yiYbWikRQxz596r6MiJBRKxdc0rnUEeD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidmxlR0ZqMDJRczNxdERITWp0VlVuYkxsUzQ3SklGMTEzTjNHUTZoUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vc2hha2xpbmlrLnRlc3QvY2hlY2tpbnZvaWNlP190b2tlbj12bGVHRmowMlFzM3F0REhNanRWVW5iTGxTNDdKSUYxMTNOM0dRNmhSJnNlYXJjaF9rZXl3b3JkPUlOVlAtMzY0OSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRhWjFFS0lrODhqNC5LVlpvc1BCZER1OWVWbGUuSmtwMGJ0MDNuanJHNWRFdVNwTEtkWVMuMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkYVoxRUtJazg4ajQuS1Zab3NQQmREdTllVmxlLkprcDBidDAzbmpyRzVkRXVTcExLZFlTLjIiO30=', 1724054291),
('S2UiOlhzq67ScaJlbufP16uhAz1lN61HRfYFzPof', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUR1ZVFxMkx3cVVHbDBsaDl5SjdSQkVhM2IxS1BpdHloU0FIdzFPWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL3NoYWtsaW5pay50ZXN0L2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vc2hha2xpbmlrLnRlc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724078478);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_inv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `courier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MIDTRANS',
  `payment_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` bigint NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `kode_inv`, `users_id`, `name`, `email`, `address`, `phone`, `tgl`, `courier`, `payment`, `payment_url`, `total_price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(18, 'INVP-8054', 7, 'Ulva', 'ulva@gmail.com', 'Kota Baru', '081271466359', '2024-08-18', NULL, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/4caf3a1a-fa1b-4945-bac0-b7e2a782c74f', 72000, 'SUCCESS', NULL, '2024-08-18 16:12:37', '2024-08-18 16:14:19'),
(19, 'INVP-3649', 6, 'Kaori', 'kaori@gmail.com', 'Kota Baru', '6281369649668', '2024-08-19', NULL, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/6b713d26-337d-4ffa-b815-1274a1d98517', 120000, 'SUCCESS', NULL, '2024-08-19 07:44:34', '2024-08-19 07:58:08'),
(20, 'INVP-9814', 1, 'Bimo', 'bimo@gmail.com', 'kota jambi', '081271466359', '2024-08-19', NULL, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/f0cbfa2e-9777-4f9c-9d53-5f22054a1068', 12000, 'PENDING', NULL, '2024-08-19 07:54:18', '2024-08-19 07:54:18'),
(21, 'INVP-2746', 1, 'Facial Wash FWN', 'kaori@gmail.com', 'Kota Baru', '6281369649668', '2024-08-19', NULL, 'MIDTRANS', 'https://app.sandbox.midtrans.com/snap/v4/redirection/a619a63b-400f-48f0-9158-c6aa6e6dacd8', 120000, 'PENDING', NULL, '2024-08-19 07:55:43', '2024-08-19 07:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint NOT NULL,
  `products_id` bigint NOT NULL,
  `transactions_id` bigint NOT NULL,
  `quantity` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `users_id`, `products_id`, `transactions_id`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 13, 4, '2023-05-29 10:52:59', '2023-05-29 10:52:59'),
(14, 5, 1, 14, 3, '2023-07-27 16:54:08', '2023-07-27 16:54:08'),
(15, 1, 1, 15, 1, '2023-08-02 16:51:05', '2023-08-02 16:51:05'),
(16, 7, 1, 18, 1, '2024-08-18 16:12:37', '2024-08-18 16:12:37'),
(17, 6, 12, 19, 1, '2024-08-19 07:44:34', '2024-08-19 07:44:34'),
(18, 1, 8, 20, 1, '2024-08-19 07:54:18', '2024-08-19 07:54:18'),
(19, 1, 12, 21, 1, '2024-08-19 07:55:43', '2024-08-19 07:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `treatmens`
--

CREATE TABLE `treatmens` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jasa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bagians_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarif` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatmens`
--

INSERT INTO `treatmens` (`id`, `kode`, `foto`, `nama_jasa`, `bagians_id`, `deskripsi`, `jenis`, `tarif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'AKK001', 'public/gallery/foto/treatmentfoto/CekctumSNMqhBl2VjxaDn4jvYjOkVC08MzEzFMYM.jpg', 'Whitening Booster', '1', '<p>Untuk Mencerahkan dan melembabkan Kulit tubuh secara merata</p>', 'TINDAKAN', 2200000, NULL, '2023-05-28 23:59:30', '2024-08-18 15:07:14'),
(2, 'AKK-523', 'public/gallery/foto/treatmentfoto/BfWYKdn0WQSQVZd1UryCZYU2r5bDLsn5625YpLPU.jpg', 'Acne Peeling', '3', '<p>Untuk Meredakan peradangan jerawat pada kulit</p>', 'TINDAKAN', 380000, NULL, '2023-05-29 04:38:54', '2024-08-18 15:05:41'),
(4, 'AKK-900', 'public/gallery/foto/treatmentfoto/6qZlEMq8c6WG7rJnxjZRMmV4ZLlFrBQ7Be8MYkGb.jpg', 'Whitening Peeling', '3', '<p>Untuk mengangkat sel kulit mati, mencerahkan kulit wajah dan menghilangkan flek,noda hitam, atau bekas jerawat</p>', 'TINDAKAN', 380000, NULL, '2023-05-29 04:52:30', '2024-08-18 15:04:23'),
(5, 'AKK-780', NULL, 'Rejuran Skin', '5', '<p>untuk memperbaiki tampilan berbagai masalah kulit, seperti kerutan, bekas luka, pori-pori besar, kemerahan, dan pigmentasi.</p>', 'TINDAKAN', 4500000, NULL, '2024-08-18 15:09:58', '2024-08-18 15:09:58'),
(6, 'AKK-694', NULL, 'Premium Fractional Laser', '5', '<p>Mengatasi Scar, Bopeng, Bekas luka, bekas jerawat, atau bekas cacar, mengecilkan pori-pori,</p>', 'TINDAKAN', 1800000, NULL, '2024-08-18 15:12:05', '2024-08-18 15:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `no_tlp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_pasien`, `name`, `umur`, `tgl_lahir`, `alamat`, `no_tlp`, `email`, `roles`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', NULL, NULL, NULL, '6285269076627', 'admin@gmail.com', 'ADMIN', NULL, '$2y$10$aZ1EKIk88j4.KVZosPBdDu9eVle.Jkp0bt03njrG5dEuSpLKdYS.2', NULL, NULL, NULL, '2023-05-28 17:19:03', '2023-05-28 17:19:03'),
(6, 'PS-416', 'Kaori', '25', '1998-12-31', 'Paal Lima Kota Baru Jambi', '628324345644', 'kaori@gmail.com', 'USER', NULL, '$2y$10$eWS6yGmYikhuMUWlV8Yd.OQ0YVT/gm/wUa51/Rc.UmtSV1JvI18YS', NULL, NULL, NULL, '2024-08-18 14:17:36', '2024-08-18 14:17:36'),
(7, 'PS-348', 'Ulva', '23', '2000-12-30', 'Kota Baru', '6281271466359', 'ulva@gmail.com', 'USER', NULL, '$2y$10$L8GQ1B9tc4sPyPshBzRlU.qC8cgaPWfSIKBAZ0P8RXPSk6dSImdPi', NULL, NULL, NULL, '2024-08-18 15:54:49', '2024-08-18 15:54:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtreatmens`
--
ALTER TABLE `bookingtreatmens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtreatmen_items`
--
ALTER TABLE `bookingtreatmen_items`
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
-- Indexes for table `categorytreatmens`
--
ALTER TABLE `categorytreatmens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_tunggus`
--
ALTER TABLE `daftar_tunggus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
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
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatmens`
--
ALTER TABLE `treatmens`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookingtreatmens`
--
ALTER TABLE `bookingtreatmens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookingtreatmen_items`
--
ALTER TABLE `bookingtreatmen_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorytreatmens`
--
ALTER TABLE `categorytreatmens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_tunggus`
--
ALTER TABLE `daftar_tunggus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `treatmens`
--
ALTER TABLE `treatmens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
