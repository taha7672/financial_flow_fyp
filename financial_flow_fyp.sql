-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 03:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_flow_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `state`, `zip`, `country`, `type`, `created_at`, `updated_at`) VALUES
(1, 20, 'street 3', 'bwp', 'bbbb', '1234', 'mmmm', 'client ', '2022-09-23 13:13:46', '2022-09-23 13:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role_id`, `email`, `phone`, `email_verified_at`, `password`, `image`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Alice Spencer', 1, 'pulid@mailinator.com', '+1 (587) 361-6946', NULL, '$2y$10$7zOLnBo9c3PPCGpBYeer3uoSw6gcdeHhVx4H1LiF1lmQv45CoNPeu', 'front.png', NULL, NULL, '2022-09-06 07:36:08', '2023-02-06 07:38:29'),
(5, 'simpllify', 1, 'admin@financialflow.com', '123456789', NULL, '$2y$10$btCXjwLI9e88WhEd4mXLp.3mAhIFIjjBBpZx66N2.V6mQE9WF0PM6', 'vlcsnap-2021-08-20-08h23m26s150.png', NULL, NULL, NULL, '2023-02-08 14:40:13'),
(15, 'testing', 8, 'testing@gmail.com', '1234567889', NULL, '$2y$10$vgFwzdZguOAbJepvdNXkS.ARp/zi5eXDxoLj95mXgfzg9Q7wcOQd6', 'default.png', NULL, '2023-02-08 11:30:33', '2022-10-10 06:26:11', '2023-02-08 11:30:33'),
(16, 'Carla Meyers', 4, 'dulisyfo@mailinator.com', '+1 (969) 908-5297', NULL, '$2y$10$gPW1rB4TFDNgOZS1/sswJ..pEgQlOaUj43VIm2QI0pA5bHkSHd4B2', 'default.png', NULL, NULL, '2022-10-11 04:49:16', '2023-02-08 11:14:01'),
(17, 'Hilary Howard', 4, 'sycen@mailinator.com', '+1 (265) 173-5304', NULL, '$2y$10$mstxY2vWMzIXMSFzizDb8eKuROADWd/pkDp7WgOUEqHDovcArUyBK', 'default.png', NULL, NULL, '2023-02-06 07:40:52', '2023-02-08 10:48:44'),
(18, 'Muhammad Taha', 1, 'taha@gmail.com', '03097672888', NULL, '$2y$10$M4SqJqV3prPt2riXlYBx7eNrkCP8MJM5sZj3yOldJcu0XrGTWR2lW', 'default.png', NULL, NULL, '2023-02-21 09:39:27', '2023-02-21 09:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_body_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `invoice_body_id`, `transaction_id`, `attachment_type`, `attachment_name`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, NULL, NULL, NULL, NULL, '2022-11-28 15:50:27', '2022-11-28 15:50:27'),
(2, 21, NULL, NULL, NULL, NULL, NULL, '2022-11-28 15:52:23', '2022-11-28 15:52:23'),
(3, 23, NULL, NULL, NULL, NULL, NULL, '2022-11-28 15:54:48', '2022-11-28 15:54:48'),
(4, 24, NULL, NULL, NULL, NULL, NULL, '2022-11-28 16:05:46', '2022-11-28 16:05:46'),
(5, 25, NULL, NULL, NULL, NULL, NULL, '2022-11-28 16:21:47', '2022-11-28 16:21:47'),
(6, 28, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:16:07', '2022-11-28 17:16:07'),
(7, 29, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:17:16', '2022-11-28 17:17:16'),
(8, 30, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:20:15', '2022-11-28 17:20:15'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:39:22', '2022-11-28 17:39:22'),
(10, 32, NULL, NULL, 'eeee', NULL, NULL, '2022-11-28 17:40:53', '2022-11-28 17:40:53'),
(11, 40, NULL, NULL, 'eeee', 'showers heads.png', NULL, '2022-11-29 09:55:21', '2022-11-29 09:55:21'),
(12, 41, NULL, NULL, 'eeee', 'showers heads.png', NULL, '2022-11-29 10:01:39', '2022-11-29 10:01:39'),
(13, 41, NULL, NULL, 'absd', 'shower heads logo.png', NULL, '2022-11-29 10:01:39', '2022-11-29 10:01:39'),
(14, 53, NULL, NULL, 'eeee', '1670252412_Best shower head with hose.jpg', NULL, '2022-12-05 15:00:13', '2022-12-05 15:00:13'),
(15, 54, NULL, NULL, 'eeee', '1670252433_Best shower head with hose.jpg', NULL, '2022-12-05 15:00:33', '2022-12-05 15:00:33'),
(16, 54, NULL, NULL, 'absd', '1670252433_shower-line-icon.png', NULL, '2022-12-05 15:00:33', '2022-12-05 15:00:33'),
(17, 55, NULL, NULL, 'eeee', '1670252457_Best shower head with hose.jpg', NULL, '2022-12-05 15:00:57', '2022-12-05 15:00:57'),
(18, 55, NULL, NULL, 'absd', '1670252457_shower-line-icon.png', NULL, '2022-12-05 15:00:57', '2022-12-05 15:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `description`, `email`, `phone`, `address`, `customer_number`, `profile_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zelda Lang', NULL, 'nasoxebo@mailinator.com', '+1 (689) 974-2233', 'Magni repudiandae qu', 'abc123', '584830f5cef1014c0b5e4aa1.png', 1, NULL, '2022-09-12 06:41:22', '2022-09-19 05:18:13'),
(2, 51, 'Calista Lynn', NULL, 'rejom@mailinator.com', '+1 (868) 112-7767', 'Officia esse dolore', 'abc123', 'doruk-bayram-gs3duh5iqkw-unsplash.jpg', 0, NULL, '2022-09-12 07:33:32', '2023-02-06 09:20:37'),
(3, 52, 'Kirestin Reese', NULL, 'rigo@mailinator.com', '+1 (547) 582-1629', 'Anim error libero pa', 'abc123', 'alexander-shatov-Cys3W7_MXDU-unsplash.jpg', 1, NULL, '2022-09-20 08:43:47', '2022-09-20 08:43:47'),
(4, 1, 'zxcb', NULL, 'zxc@gmail.com', '87999765', 'this is  address', '929-551-745', 'default.png', 1, NULL, '2022-10-21 10:17:27', '2022-10-21 10:17:27'),
(5, 1, 'zafer', 'danayal zafer is a singer', 'zafer@gmail.com', '03095687100', 'this is adddress of zafer', '986-410-451', 'default.png', 1, NULL, '2022-11-22 02:49:48', '2022-11-22 03:24:16'),
(6, 1, 'abc', NULL, 'zafer@gmail.com', '03095687100', 'this is adddress of zafer', '317-248-328', 'default.png', 1, NULL, '2022-11-22 03:27:05', '2022-11-22 03:27:05'),
(7, 1, 'abc', NULL, 'zafer@gmail.com', '03095687100', 'this is adddress of zafer', '656-906-556', 'default.png', 1, NULL, '2022-12-06 08:03:32', '2022-12-06 08:03:32'),
(55, 1, 'abc', NULL, 'zafer@gmail.com', '03095687100', 'this is adddress of zafer', '398-369-546', '1670314366_shower heads logo.png', 1, NULL, '2022-12-06 08:12:46', '2022-12-06 08:12:46'),
(57, 1, 'zack', NULL, 'zack@gmail.com', '03095687111', 'this is adddress of zafer', '350-474-716', '', 1, NULL, '2023-02-22 11:15:43', '2023-02-22 11:15:43'),
(58, 1, 'zack', NULL, 'zack@gmail.com', '03095687111', 'this is adddress of zafer', '246-742-345', '1677064656.png', 1, NULL, '2023-02-22 11:17:36', '2023-02-22 11:17:36'),
(59, 1, 'Cherokee Carlson', NULL, 'sydud@mailinator.com', '+1 (298) 424-2325', 'Maxime ut aut et et', 'abc123', 'SampleJPGImage_50kbmb.jpg', 1, NULL, '2023-05-19 18:09:08', '2023-05-19 18:09:08'),
(60, 1, 'David Randall', NULL, 'vevywameva@mailinator.com', '+1 (415) 289-3216', 'Minus animi ut et d', 'abc123', 'declined.png', 0, NULL, '2023-05-19 18:10:05', '2023-05-19 18:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(255) DEFAULT NULL,
  `invoice_number` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_date` date NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `invoice_id`, `invoice_number`, `discount_date`, `amount`, `description`, `attachment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 3, 'INV-0001', '1970-05-09', '2', 'Autem dolores ut lab', '1671785184_btc,.png', NULL, '2022-12-23 08:46:24', '2022-12-23 08:46:24'),
(17, 26, '389', '2023-01-26', '10', 'this discount test', '1674745217_1674714841552.JPEG', NULL, '2023-01-26 15:00:17', '2023-01-26 15:00:17'),
(18, 3, 'INV-0001', '2023-02-21', '19', 'Neque eum mollitia n', '1676897484.jpg', NULL, '2023-02-20 12:51:25', '2023-02-20 12:51:25'),
(19, 3, 'INV-0001', '2023-02-20', '1', 'Dolor qui amet ipsa', '1676897650.jpg', NULL, '2023-02-20 12:54:10', '2023-02-20 12:54:10');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `tax_amount` decimal(8,2) NOT NULL,
  `invoice_discount` decimal(8,2) NOT NULL,
  `inv_total_amount` decimal(8,2) NOT NULL,
  `paid_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Sent','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `inv_uinque_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_id`, `customer_id`, `invoice_date`, `due_date`, `invoice_number`, `sub_total`, `tax_amount`, `invoice_discount`, `inv_total_amount`, `paid_status`, `status`, `inv_uinque_key`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 51, 2, '2022-10-03', '2022-10-10', 'INV-0004', '13140.00', '0.00', '10.00', '13130.00', '1', 'Pending', 'INV-N-6336-CWD', NULL, '2022-10-03 04:06:30', '2022-10-03 04:13:57'),
(2, 51, 2, '2022-10-02', '2022-10-09', 'INV-0002', '2530.00', '10.00', '10.00', '2773.00', '1', 'Pending', 'INV-R-4332-YYI', NULL, '2022-10-03 04:07:52', '2022-10-03 04:16:14'),
(3, 51, 2, '2022-10-03', '2022-10-11', 'INV-0001', '504.00', '0.00', '0.00', '504.00', '0', 'Pending', 'INV-F-6238-IOI', NULL, '2022-10-03 04:08:35', '2022-10-03 04:08:35'),
(4, 1, 3, '2022-10-05', '2022-10-16', 'INV-0008', '1035.00', '0.00', '24.00', '1011.00', '1', 'Pending', 'INV-T-3731-GZZ', NULL, '2022-10-04 08:34:14', '2022-11-30 08:30:23'),
(10, 1, 55, '2022-11-29', NULL, 'INV-7703', '0.00', '0.00', '0.00', '10.00', '1', 'Completed', 'INV-I-9504-OBX', NULL, '2022-11-29 10:01:39', '2023-02-20 14:59:35'),
(23, 1, 55, '2022-12-05', NULL, 'INV-4022', '0.00', '0.00', '0.00', '10.00', '0', 'Pending', 'INV-G-3041-FLV', NULL, '2022-12-05 15:00:33', '2022-12-05 15:00:33'),
(24, 1, 55, '2022-12-05', NULL, 'INV-1514', '0.00', '0.00', '0.00', '10.00', '1', 'Pending', 'INV-W-5468-WWZ', NULL, '2022-12-05 15:00:57', '2022-12-05 15:00:57'),
(25, 1, 5, '2002-03-23', '2006-04-02', 'inv-484', '6174.00', '0.00', '0.00', '6174.00', '0', 'Pending', 'INV-X-9475', NULL, '2023-01-04 11:53:40', '2023-01-04 11:53:40'),
(26, 51, 2, '2002-03-25', '2002-03-31', '389', '219.00', '0.00', '0.00', '219.00', '0', 'Pending', 'INV-E-1627', NULL, '2023-01-26 14:41:44', '2023-01-26 14:41:44'),
(27, 1, 1, '2019-06-22', '1999-05-26', '865', '38.00', '0.00', '0.00', '38.00', '0', 'Pending', 'INV-J-3727', NULL, '2023-01-26 14:47:50', '2023-01-26 14:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_bodies`
--

CREATE TABLE `invoice_bodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_bodies`
--

INSERT INTO `invoice_bodies` (`id`, `invoice_id`, `product_name`, `short_description`, `quantity`, `sale_tax`, `unit_cost`, `total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Casey Berry', 'Rerum rerum quia arc', 12, NULL, '120.00', '1440.00', NULL, '2022-10-03 04:06:30', '2022-10-03 04:06:30'),
(2, 1, 'Ferris Hull', 'Autem at expedita ex', 15, NULL, '780.00', '11700.00', NULL, '2022-10-03 04:06:30', '2022-10-03 04:06:30'),
(3, 2, 'Alexander Rodriguez', 'Impedit sunt id sed', 45, NULL, '40.00', '1800.00', NULL, '2022-10-03 04:07:52', '2022-10-03 04:07:52'),
(4, 2, 'Gwendolyn Greene', 'Rerum rerum quia arc', 16, NULL, '40.00', '640.00', NULL, '2022-10-03 04:07:52', '2022-10-03 04:07:52'),
(5, 2, 'Casey Berry', 'Autem at expedita ex', 9, NULL, '10.00', '90.00', NULL, '2022-10-03 04:07:52', '2022-10-03 04:07:52'),
(6, 3, 'Kelsey Perry', 'Iste sed mollitia au', 56, NULL, '9.00', '504.00', NULL, '2022-10-03 04:08:35', '2022-10-03 04:08:35'),
(7, 4, 'Ferris Hull', 'Rerum rerum quia arc', 45, NULL, '23.00', '1035.00', NULL, '2022-10-04 08:34:14', '2022-10-04 08:34:14'),
(41, 10, '', 'hhfff', 1, NULL, '10.00', '10.00', NULL, '2022-11-29 10:01:39', '2022-11-29 10:01:39'),
(49, 18, '', 'hhfff', 1, NULL, '10.00', '10.00', '2023-01-19 10:59:08', '2022-12-05 14:58:19', '2023-01-19 10:59:08'),
(54, 23, '', 'hhfff', 1, NULL, '10.00', '10.00', NULL, '2022-12-05 15:00:33', '2022-12-05 15:00:33'),
(55, 24, '', 'hhfff', 1, NULL, '10.00', '10.00', NULL, '2022-12-05 15:00:57', '2022-12-05 15:00:57'),
(56, 25, 'Risa Santana', 'Laborum voluptates e', 882, NULL, '7.00', '6174.00', NULL, '2023-01-04 11:53:40', '2023-01-04 11:53:40'),
(57, 26, 'Wyoming Grant', 'Iusto culpa sint cul', 73, NULL, '3.00', '219.00', NULL, '2023-01-26 14:41:44', '2023-01-26 14:41:44'),
(58, 27, 'Shafira Macias', 'Dolor officiis volup', 7, NULL, '4.00', '28.00', NULL, '2023-01-26 14:47:50', '2023-01-26 14:47:50'),
(59, 27, 'Kelsey Perry', 'Magna cumque incidun', 1, NULL, '10.00', '10.00', NULL, '2023-01-26 14:47:50', '2023-01-26 14:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_formats`
--

CREATE TABLE `invoice_formats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_formats`
--

INSERT INTO `invoice_formats` (`id`, `date_format`, `invoice_number_format`, `invoice_prefix`, `created_at`, `updated_at`) VALUES
(1, 'dd/mm/yyyy', 'INV-0001', '#', '2022-09-16 14:28:26', '2022-09-16 14:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `party_type` enum('Client','Customer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `client_id`, `customer_id`, `party_type`, `invoice_id`, `type`, `narration`, `credit`, `debit`, `created_date`, `created_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 55, 'Customer', 23, 'Discount', 'Voluptas Nam qui par', '6.00', '0.00', '2022-12-24 18:23:46', '1', '1', NULL, '2022-12-24 13:23:46', '2022-12-24 13:23:46'),
(2, 1, 55, 'Client', 23, 'Discount', 'Voluptas Nam qui par', '0.00', '6.00', '2022-12-24 18:23:46', '1', '1', NULL, '2022-12-24 13:23:46', '2022-12-24 13:23:46'),
(3, 1, 55, 'Customer', 23, 'Discount', 'Sit id quidem quasi', '5.00', '0.00', '2022-12-24 19:32:26', '1', '1', NULL, '2022-12-24 14:32:26', '2022-12-24 14:32:26'),
(4, 1, 55, 'Client', 23, 'Discount', 'Sit id quidem quasi', '0.00', '5.00', '2022-12-24 19:32:26', '1', '1', NULL, '2022-12-24 14:32:26', '2022-12-24 14:32:26'),
(5, 51, 2, 'Customer', 26, 'Discount', 'this discount test', '10.00', '0.00', '2023-01-26 20:00:17', '5', '1', NULL, '2023-01-26 15:00:17', '2023-01-26 15:00:17'),
(6, 51, 2, 'Client', 26, 'Discount', 'this discount test', '0.00', '10.00', '2023-01-26 20:00:17', '5', '1', NULL, '2023-01-26 15:00:17', '2023-01-26 15:00:17'),
(7, 51, 2, 'Customer', 3, 'Discount', 'Neque eum mollitia n', '19.00', '0.00', '2023-02-20 17:51:25', '5', '1', NULL, '2023-02-20 12:51:25', '2023-02-20 12:51:25'),
(8, 51, 2, 'Client', 3, 'Discount', 'Neque eum mollitia n', '0.00', '19.00', '2023-02-20 17:51:25', '5', '1', NULL, '2023-02-20 12:51:25', '2023-02-20 12:51:25'),
(9, 51, 2, 'Customer', 3, 'Discount', 'Dolor qui amet ipsa', '1.00', '0.00', '2023-02-20 17:54:10', '5', '1', NULL, '2023-02-20 12:54:10', '2023-02-20 12:54:10'),
(10, 51, 2, 'Client', 3, 'Discount', 'Dolor qui amet ipsa', '0.00', '1.00', '2023-02-20 17:54:10', '5', '1', NULL, '2023-02-20 12:54:10', '2023-02-20 12:54:10'),
(11, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '10.00', '2023-02-21 17:27:13', '1', '1', NULL, '2023-02-21 12:27:13', '2023-02-21 12:27:13'),
(12, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '10.00', '0.00', '2023-02-21 17:27:13', '1', '1', NULL, '2023-02-21 12:27:13', '2023-02-21 12:27:13'),
(13, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '10.00', '2023-02-21 17:29:03', '1', '1', NULL, '2023-02-21 12:29:03', '2023-02-21 12:29:03'),
(14, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '10.00', '0.00', '2023-02-21 17:29:03', '1', '1', NULL, '2023-02-21 12:29:03', '2023-02-21 12:29:03'),
(15, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '10.00', '2023-02-21 17:36:36', '1', '1', NULL, '2023-02-21 12:36:36', '2023-02-21 12:36:36'),
(16, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '10.00', '0.00', '2023-02-21 17:36:36', '1', '1', NULL, '2023-02-21 12:36:36', '2023-02-21 12:36:36'),
(17, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '10.00', '2023-02-21 18:01:09', '1', '1', NULL, '2023-02-21 13:01:09', '2023-02-21 13:01:09'),
(18, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '10.00', '0.00', '2023-02-21 18:01:09', '1', '1', NULL, '2023-02-21 13:01:09', '2023-02-21 13:01:09'),
(19, 51, 2, 'Customer', 26, 'Transaction', 'Transaction', '0.00', '5.00', '2023-02-21 18:02:28', '5', '1', NULL, '2023-02-21 13:02:28', '2023-02-21 13:02:28'),
(20, 51, 2, 'Client', 26, 'Transaction', 'Transaction', '5.00', '0.00', '2023-02-21 18:02:28', '5', '1', NULL, '2023-02-21 13:02:28', '2023-02-21 13:02:28'),
(21, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '1.00', '2023-02-21 18:59:28', '1', '1', NULL, '2023-02-21 13:59:28', '2023-02-21 13:59:28'),
(22, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '1.00', '0.00', '2023-02-21 18:59:28', '1', '1', NULL, '2023-02-21 13:59:28', '2023-02-21 13:59:28'),
(23, 51, 2, 'Customer', 26, 'Transaction', 'Transaction', '0.00', '8.00', '2023-02-21 19:00:32', '5', '1', NULL, '2023-02-21 14:00:32', '2023-02-21 14:00:32'),
(24, 51, 2, 'Client', 26, 'Transaction', 'Transaction', '8.00', '0.00', '2023-02-21 19:00:32', '5', '1', NULL, '2023-02-21 14:00:32', '2023-02-21 14:00:32'),
(25, 51, 2, 'Customer', 26, 'Transaction', 'Transaction', '0.00', '90.00', '2023-02-21 19:15:31', '5', '1', NULL, '2023-02-21 14:15:31', '2023-02-21 14:15:31'),
(26, 51, 2, 'Client', 26, 'Transaction', 'Transaction', '90.00', '0.00', '2023-02-21 19:15:31', '5', '1', NULL, '2023-02-21 14:15:31', '2023-02-21 14:15:31'),
(27, 51, 2, 'Customer', 26, 'Transaction', 'Transaction', '0.00', '3.00', '2023-02-21 19:31:51', '5', '1', NULL, '2023-02-21 14:31:51', '2023-02-21 14:31:51'),
(28, 51, 2, 'Client', 26, 'Transaction', 'Transaction', '3.00', '0.00', '2023-02-21 19:31:51', '5', '1', NULL, '2023-02-21 14:31:51', '2023-02-21 14:31:51'),
(29, 51, 2, 'Customer', 26, 'Transaction', 'Transaction', '0.00', '9.00', '2023-02-22 11:57:37', '5', '1', NULL, '2023-02-22 06:57:37', '2023-02-22 06:57:37'),
(30, 51, 2, 'Client', 26, 'Transaction', 'Transaction', '9.00', '0.00', '2023-02-22 11:57:37', '5', '1', NULL, '2023-02-22 06:57:37', '2023-02-22 06:57:37'),
(31, 1, 3, 'Customer', 4, 'Transaction', 'Transaction', '0.00', '1.00', '2023-02-22 11:59:50', '5', '1', NULL, '2023-02-22 06:59:50', '2023-02-22 06:59:50'),
(32, 1, 3, 'Client', 4, 'Transaction', 'Transaction', '1.00', '0.00', '2023-02-22 11:59:50', '5', '1', NULL, '2023-02-22 06:59:50', '2023-02-22 06:59:50');

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
(11, '2022_09_04_130720_create_user_settings_table', 2),
(12, '2022_09_04_130958_create_subscriptions_table', 2),
(13, '2022_09_04_131311_create_subscriber_details_table', 3),
(19, '2014_10_12_000000_create_users_table', 4),
(20, '2014_10_12_100000_create_password_resets_table', 4),
(21, '2019_08_19_000000_create_failed_jobs_table', 4),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(23, '2022_08_31_085614_create_admins_table', 4),
(24, '2022_09_04_131542_create_customers_table', 4),
(25, '2022_09_04_131628_create_addresses_table', 4),
(26, '2022_09_04_131741_create_invoices_table', 4),
(27, '2022_09_04_182930_create_user_details_table', 4),
(28, '2022_09_04_183230_create_invoice_formats_table', 4),
(29, '2022_09_05_124326_create_plans_table', 4),
(30, '2022_09_05_125109_create_subscribers_table', 4),
(31, '2022_09_08_093509_add_price_to_plans_table', 5),
(32, '2022_09_12_104230_create_customers_table', 6),
(33, '2022_09_15_132611_create_taxes_table', 7),
(34, '2022_09_16_063038_create_invoice_bodies_table', 7),
(35, '2022_09_23_082325_create_strip_clients_table', 8),
(36, '2022_09_23_101154_add_country_to_users_table', 8),
(37, '2022_09_29_130139_create_stripe_receipts_table', 9),
(38, '2022_09_16_092039_create_invoices_table', 10),
(39, '2022_09_23_082325_create_stripe_clients_table', 11),
(40, '2022_10_04_095259_create_permission_tables', 11),
(41, '2022_11_22_105811_create_transactions_table', 12),
(42, '2022_11_24_102618_create_attachments_table', 13),
(43, '2022_11_30_120557_create_discounts_table', 14),
(44, '2022_12_01_135231_create_user_settings_table', 15),
(45, '2022_12_22_150533_create_ledgers_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Backend\\Admin', 5),
(1, 'App\\Models\\Backend\\Admin', 18),
(2, 'App\\Models\\Backend\\Admin', 5),
(2, 'App\\Models\\Backend\\Admin', 18),
(3, 'App\\Models\\Backend\\Admin', 5),
(3, 'App\\Models\\Backend\\Admin', 18),
(4, 'App\\Models\\Backend\\Admin', 5),
(4, 'App\\Models\\Backend\\Admin', 18),
(5, 'App\\Models\\Backend\\Admin', 5),
(5, 'App\\Models\\Backend\\Admin', 18),
(6, 'App\\Models\\Backend\\Admin', 5),
(6, 'App\\Models\\Backend\\Admin', 16),
(6, 'App\\Models\\Backend\\Admin', 18),
(7, 'App\\Models\\Backend\\Admin', 5),
(7, 'App\\Models\\Backend\\Admin', 16),
(7, 'App\\Models\\Backend\\Admin', 18),
(8, 'App\\Models\\Backend\\Admin', 5),
(8, 'App\\Models\\Backend\\Admin', 16),
(8, 'App\\Models\\Backend\\Admin', 18),
(9, 'App\\Models\\Backend\\Admin', 5),
(9, 'App\\Models\\Backend\\Admin', 16),
(9, 'App\\Models\\Backend\\Admin', 18),
(10, 'App\\Models\\Backend\\Admin', 5),
(10, 'App\\Models\\Backend\\Admin', 16),
(10, 'App\\Models\\Backend\\Admin', 18),
(11, 'App\\Models\\Backend\\Admin', 5),
(11, 'App\\Models\\Backend\\Admin', 18),
(12, 'App\\Models\\Backend\\Admin', 5),
(12, 'App\\Models\\Backend\\Admin', 18),
(13, 'App\\Models\\Backend\\Admin', 5),
(13, 'App\\Models\\Backend\\Admin', 18),
(14, 'App\\Models\\Backend\\Admin', 5),
(14, 'App\\Models\\Backend\\Admin', 18),
(15, 'App\\Models\\Backend\\Admin', 5),
(15, 'App\\Models\\Backend\\Admin', 18),
(16, 'App\\Models\\Backend\\Admin', 5),
(16, 'App\\Models\\Backend\\Admin', 18),
(17, 'App\\Models\\Backend\\Admin', 5),
(17, 'App\\Models\\Backend\\Admin', 18),
(18, 'App\\Models\\Backend\\Admin', 5),
(18, 'App\\Models\\Backend\\Admin', 18),
(19, 'App\\Models\\Backend\\Admin', 5),
(19, 'App\\Models\\Backend\\Admin', 18),
(20, 'App\\Models\\Backend\\Admin', 5),
(20, 'App\\Models\\Backend\\Admin', 18),
(21, 'App\\Models\\Backend\\Admin', 5),
(21, 'App\\Models\\Backend\\Admin', 18),
(22, 'App\\Models\\Backend\\Admin', 5),
(22, 'App\\Models\\Backend\\Admin', 18),
(23, 'App\\Models\\Backend\\Admin', 5),
(23, 'App\\Models\\Backend\\Admin', 18),
(24, 'App\\Models\\Backend\\Admin', 5),
(24, 'App\\Models\\Backend\\Admin', 18),
(25, 'App\\Models\\Backend\\Admin', 5),
(25, 'App\\Models\\Backend\\Admin', 18),
(26, 'App\\Models\\Backend\\Admin', 5),
(26, 'App\\Models\\Backend\\Admin', 18),
(27, 'App\\Models\\Backend\\Admin', 5),
(27, 'App\\Models\\Backend\\Admin', 18),
(28, 'App\\Models\\Backend\\Admin', 5),
(28, 'App\\Models\\Backend\\Admin', 18),
(29, 'App\\Models\\Backend\\Admin', 5),
(29, 'App\\Models\\Backend\\Admin', 18),
(30, 'App\\Models\\Backend\\Admin', 5),
(30, 'App\\Models\\Backend\\Admin', 18),
(31, 'App\\Models\\Backend\\Admin', 5),
(31, 'App\\Models\\Backend\\Admin', 18),
(32, 'App\\Models\\Backend\\Admin', 5),
(32, 'App\\Models\\Backend\\Admin', 18),
(33, 'App\\Models\\Backend\\Admin', 5),
(33, 'App\\Models\\Backend\\Admin', 18),
(34, 'App\\Models\\Backend\\Admin', 5),
(34, 'App\\Models\\Backend\\Admin', 18),
(35, 'App\\Models\\Backend\\Admin', 5),
(35, 'App\\Models\\Backend\\Admin', 18),
(36, 'App\\Models\\Backend\\Admin', 5),
(36, 'App\\Models\\Backend\\Admin', 18),
(37, 'App\\Models\\Backend\\Admin', 5),
(37, 'App\\Models\\Backend\\Admin', 18),
(38, 'App\\Models\\Backend\\Admin', 5),
(38, 'App\\Models\\Backend\\Admin', 18),
(39, 'App\\Models\\Backend\\Admin', 5),
(39, 'App\\Models\\Backend\\Admin', 18),
(40, 'App\\Models\\Backend\\Admin', 5),
(40, 'App\\Models\\Backend\\Admin', 18),
(41, 'App\\Models\\Backend\\Admin', 5),
(41, 'App\\Models\\Backend\\Admin', 18),
(42, 'App\\Models\\Backend\\Admin', 5),
(42, 'App\\Models\\Backend\\Admin', 18),
(43, 'App\\Models\\Backend\\Admin', 5),
(43, 'App\\Models\\Backend\\Admin', 18),
(44, 'App\\Models\\Backend\\Admin', 5),
(44, 'App\\Models\\Backend\\Admin', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Backend\\Admin', 5),
(1, 'App\\Models\\Backend\\Admin', 18),
(4, 'App\\Models\\Backend\\Admin', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('taha@gmail.com', 'r0JCcVOTqgEu1jXAGPJdgH8jC5VO00jPMgg9MTU5Eon85L2gzVDG01O6Z37YKloY', '2023-01-16 10:03:54'),
('taha@gmail.com', 'rXY7Ae5D0TUi7JeaTuBSNwZQ7NNVyYgBbQjAVT9ZpwnlYCPpsgSGRLAzlZkg3Uom', '2023-01-16 11:10:15'),
('taha@gmail.com', 'WEZEBSNzsPqWz3x4vu4DwoJxziqv9b0J9gviYkZeEFSAdWaoM2M3hbkK8tv4Ube1', '2023-01-16 11:23:12'),
('taha@gmail.com', 'RrLDG09WejdNDNQH1n3A6QcHLcfQGSAGuAWNUHXb4lmmGBsQItSVXQ09tKhTq1el', '2023-01-16 11:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(2, 'Dashboard Rev-list', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(3, 'Total Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(4, 'Active Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(5, 'Total Invoices', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(6, 'Plans', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(7, 'Create Plans', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(8, 'Edit Plans', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(9, 'Delete Plans', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(10, 'View Plans', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(11, 'Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(12, 'View Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(13, 'Create Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(14, 'Edit Clients', 'admin', '2022-10-07 05:31:37', '2022-10-07 05:31:37'),
(15, 'Delete Clients', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(16, 'Customers', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(17, 'Create Customers', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(18, 'Edit Customers', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(19, 'Delete Customers', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(20, 'View Customers', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(21, 'Invoices', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(22, 'Create Invoices', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(23, 'Delete Invoices', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(24, 'View Invoices', 'admin', '2022-10-07 05:31:38', '2022-10-07 05:31:38'),
(25, 'Discounts', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(26, 'Apply Discount', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(27, 'Edit Discount', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(28, 'Delete Discount', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(29, 'Payments', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(30, 'Add Payments', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(31, 'Edit Payments', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(32, 'Delete Payments', 'admin', '2023-02-08 14:03:40', '2023-02-08 14:03:43'),
(33, 'Admin Users', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(34, 'Create Admin', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(35, 'Edit Admin', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(36, 'Delete Admin', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(37, 'Role Manager', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(38, 'Add Role', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(39, 'Edit Role', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(40, 'Delete Role', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(41, 'Receivables', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(42, 'Reports', 'admin', '2023-02-08 14:05:41', '2023-02-08 14:05:44'),
(43, 'Discount Report', 'admin', '2023-02-08 14:02:34', '2023-02-08 14:02:34'),
(44, 'Ledger Reports', 'admin', '2023-02-08 14:05:48', '2023-02-08 14:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'token', 'd05e9ad1587489a3e6ad0790888195d7213e580d0470d90badc2bf7c83d5b4c9', '[\"*\"]', NULL, NULL, '2022-12-02 11:38:09', '2022-12-02 11:38:09'),
(2, 'App\\Models\\User', 1, 'token', '0f0b9df2c9aa0aec638d93cd7c068c25ff2b36af65db94f2bc7702c5f903293c', '[\"*\"]', '2022-12-02 12:17:30', NULL, '2022-12-02 12:03:21', '2022-12-02 12:17:30'),
(3, 'App\\Models\\User', 1, 'token', '5630883519f4004d3f7568d647460777bd3e23411898642715606258646d9068', '[\"*\"]', '2022-12-02 12:37:50', NULL, '2022-12-02 12:21:03', '2022-12-02 12:37:50'),
(6, 'App\\Models\\User', 1, 'token', '79437534f9b9e4a67c0a3decd07d50d5a4207f0d575624be45b208c34b782e55', '[\"*\"]', NULL, NULL, '2022-12-05 08:28:16', '2022-12-05 08:28:16'),
(7, 'App\\Models\\User', 1, 'token', 'fa8f39fe045bc06fe6769225c39adcdfb30b2581e330f93f80b7511424b76071', '[\"*\"]', NULL, NULL, '2022-12-05 14:20:26', '2022-12-05 14:20:26'),
(8, 'App\\Models\\User', 1, 'token', 'd0ec5e8ac5fd76b0f9452a06fbdadba1aec974ed03a7ee3441c306635e2a5e76', '[\"*\"]', NULL, NULL, '2023-01-13 13:59:08', '2023-01-13 13:59:08'),
(9, 'App\\Models\\User', 1, 'token', '3e23cb07598e410747f38ec2a960bc45ce25d6f0dcdba7331892fbaecb553487', '[\"*\"]', NULL, NULL, '2023-01-16 09:19:37', '2023-01-16 09:19:37'),
(10, 'App\\Models\\User', 1, 'token', '937fc0d6308498e74f7ec9f6537af31c26873972d4969078fc4d3e624ae99e2a', '[\"*\"]', '2023-02-22 07:36:49', NULL, '2023-02-21 10:42:41', '2023-02-22 07:36:49'),
(11, 'App\\Models\\User', 1, 'token', '1e74c377acc209ec23bbb6ea66a843b920b98a894112f19b666020fbf8fb7254', '[\"*\"]', NULL, NULL, '2023-02-22 07:37:15', '2023-02-22 07:37:15'),
(12, 'App\\Models\\User', 1, 'token', '7b4eb815fecf8a13477eb8270e504fc9b8e1ba4703015cd6638f6219d18f2b60', '[\"*\"]', NULL, NULL, '2023-02-23 09:48:07', '2023-02-23 09:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_invoices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_postal` tinyint(1) NOT NULL DEFAULT 0,
  `sms` tinyint(1) NOT NULL DEFAULT 0,
  `email` tinyint(1) NOT NULL DEFAULT 0,
  `charge_per_transaction` tinyint(1) NOT NULL DEFAULT 0,
  `charge_per_alert` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `max_allowed_coustomers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `duration_days`, `number_of_invoices`, `send_postal`, `sms`, `email`, `charge_per_transaction`, `charge_per_alert`, `status`, `max_allowed_coustomers`, `deleted_at`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Lucian 1', '25', '814', 0, 1, 1, 1, 1, 1, '760', '2022-09-13 09:05:55', '2022-09-08 04:25:47', '2022-09-13 09:05:55', '10'),
(2, 'Gabriel Chase', '18', '764', 1, 1, 1, 1, 0, 1, '881', NULL, '2022-09-08 04:26:11', '2023-01-20 14:38:19', '10'),
(3, 'Xerxes Hill', '5', '866', 1, 1, 1, 1, 1, 1, '543', NULL, '2022-09-08 04:42:23', '2022-09-13 01:30:46', '134'),
(4, 'Bernard Ayala', '14', '435', 1, 1, 0, 0, 0, 1, '957', '2022-09-19 04:45:10', '2022-09-08 05:07:23', '2022-09-19 04:45:10', '505'),
(5, 'Davis Cunningham', '26', '614', 1, 1, 1, 1, 0, 0, '368', NULL, '2022-09-08 05:09:07', '2023-05-19 17:53:52', '387'),
(7, 'Elit facilis archit', '8', '128', 1, 1, 1, 1, 0, 0, '773', '2023-01-20 14:38:31', '2022-09-09 05:55:12', '2023-01-20 14:38:31', '248'),
(8, 'Ipsum corrupti ear', '18', '133', 0, 0, 0, 0, 1, 0, '174', NULL, '2022-09-09 07:31:26', '2022-09-12 09:48:20', '402'),
(9, 'Velit consectetur pe', '18', '862', 1, 1, 1, 0, 1, 1, '376', NULL, '2022-09-09 08:15:51', '2022-09-12 05:27:43', '148'),
(10, 'Consectetur eos fug', '11', '704', 1, 0, 1, 1, 1, 1, '149', '2022-09-19 04:45:22', '2022-09-09 09:41:47', '2022-09-19 04:45:22', '679'),
(11, 'Distinctio Unde ips', '22', '644', 0, 0, 0, 1, 1, 0, '404', NULL, '2022-09-09 09:44:12', '2023-02-06 07:42:04', '978'),
(12, 'Magni dignissimos ad', '15', '727', 1, 0, 0, 0, 0, 0, '392', NULL, '2022-09-09 09:46:31', '2022-09-13 00:30:47', '904'),
(13, 'Nostrum esse molest', '13', '80', 0, 0, 0, 1, 0, 0, '719', NULL, '2022-09-09 10:09:10', '2022-09-13 00:37:02', '768'),
(14, 'Excepturi dignissimo', '17', '154', 0, 1, 1, 1, 0, 1, '705', NULL, '2022-09-12 03:26:32', '2022-09-13 00:35:57', '882');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2022-10-11 04:47:43', '2022-10-11 04:47:43'),
(4, 'Noelle Anthony', 'admin', '2023-02-08 07:29:14', '2023-02-08 07:29:14'),
(8, 'Victor Miller', 'admin', '2023-02-08 07:41:48', '2023-02-08 07:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 8),
(2, 1),
(2, 8),
(3, 1),
(3, 8),
(4, 1),
(4, 8),
(5, 1),
(5, 8),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stripe_clients`
--

CREATE TABLE `stripe_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_account_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_clients`
--

INSERT INTO `stripe_clients` (`id`, `user_id`, `stripe_account_id`, `stripe_account_status`, `stripe_account_type`, `created_at`, `updated_at`) VALUES
(1, 51, 'acct_1Lmy20Q65KdZNlzJ', 'completed', 'individual', NULL, NULL),
(2, 1, 'abc', 'completed', 'individual', NULL, NULL),
(3, 53, 'acct_1N9X9OQ6xLktRdPm', 'pending', 'individual', '2023-05-19 17:31:57', '2023-05-19 17:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_receipts`
--

CREATE TABLE `stripe_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_charge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_receipt_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_receipt_amount` int(11) NOT NULL,
  `stripe_receipt_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_receipt_created` int(11) NOT NULL,
  `stripe_receipt_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_receipts`
--

INSERT INTO `stripe_receipts` (`id`, `user_id`, `customer_id`, `stripe_charge_id`, `stripe_receipt_url`, `stripe_receipt_amount`, `stripe_receipt_status`, `stripe_receipt_created`, `stripe_receipt_currency`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 51, '3', 'ch_3LnN1tLZABYnJmWo2G3GxwKC', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKJ7C1pkGMgah_wy0rPk6LBYJDZh2iZBDv6ayRi07jZDFH8UwGV6wXqiyUK9SlaT2akiWruxb9CNixU-q', 144300, 'succeeded', 1664459037, 'usd', NULL, '2022-09-29 08:44:00', '2022-09-29 08:44:00'),
(2, 51, '3', 'ch_3LnNVXLZABYnJmWo3ykKMO15', 'stripe_receipts/ch_3LnNVXLZABYnJmWo3ykKMO15.pdf', 144300, 'succeeded', 1664460875, 'usd', NULL, '2022-09-29 09:14:36', '2022-09-29 09:14:36'),
(3, 51, '3', 'ch_3LnNbPLZABYnJmWo1QWRVz9a', 'stripe_receipts/ch_3LnNbPLZABYnJmWo1QWRVz9a.pdf', 144300, 'succeeded', 1664461239, 'usd', NULL, '2022-09-29 09:20:40', '2022-09-29 09:20:40'),
(4, 51, '3', 'ch_3LnNrKLZABYnJmWo1bKBwvs2', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKJTb1pkGMgay7hOrhik6LBYhucqv2vQupqDWnyyXrupT_TPoJ5vc45FAn0-u74GXxRKHeX9ge4LQ3dQX', 144300, 'succeeded', 1664462226, 'usd', NULL, '2022-09-29 09:37:14', '2022-09-29 09:37:14'),
(5, 51, '3', 'ch_3Lnl6sLZABYnJmWo1jnskcgR', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKLOV3JkGMgZrJg45cjw6LBZPoajW_5oKCSt4-Is6JTexwAAYxYmdO0xSGPGU55gKQ-S6W1L8rNrZBLVl', 120, 'succeeded', 1664551602, 'usd', NULL, '2022-09-30 10:26:47', '2022-09-30 10:26:47'),
(6, 51, '3', 'ch_3Lnl9QLZABYnJmWo25x1pKpq', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKNKW3JkGMgZQyZU1kKU6LBadgmqPE6zb9BqE5fNGelptrPUnGYYFGzmucaMZjLdzQv3uNHS_rWafIxph', 120, 'succeeded', 1664551760, 'usd', NULL, '2022-09-30 10:29:22', '2022-09-30 10:29:22'),
(7, 51, '3', 'ch_3LnlAkLZABYnJmWo2YWO70vw', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKKSX3JkGMgYuP_k4S2M6LBZJowqXquCKNFYBawAvCB8H-a22brzzdiWz--eMDQxzdxhcu5fjFbuI2ho_', 120, 'succeeded', 1664551842, 'usd', NULL, '2022-09-30 10:30:44', '2022-09-30 10:30:44'),
(8, 51, '3', 'ch_3LnlCuLZABYnJmWo3HQ2fQvV', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKKqY3JkGMgZol4IzgwU6LBbk59Oovh22xJsXYNBE6DDmI93l7WeBBCawEE4QXz38gGr-se_9hLnrJYXn', 120, 'succeeded', 1664551976, 'usd', NULL, '2022-09-30 10:32:58', '2022-09-30 10:32:58'),
(9, 51, '3', 'ch_3LnzNsLZABYnJmWo0Lj504AK', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKInC35kGMgYm1pudhpY6LBY_vT0hXcN6iEiszUXP44jqRl9qJ4GmAKHv-9CxXNybSb0I_M7lKLO7b-_G', 204, 'succeeded', 1664606472, 'usd', NULL, '2022-10-01 01:41:15', '2022-10-01 01:41:15'),
(10, 51, '3', 'ch_3LnzQNLZABYnJmWo23Ove0Hg', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKKTD35kGMgYlQfZJPv86LBa5E0LKmxkhlxRMSzVd1oO6bZpaN4tDtPjia5xdb1oi9VaCg32BgsIZhggJ', 204, 'succeeded', 1664606627, 'usd', NULL, '2022-10-01 01:43:48', '2022-10-01 01:43:48'),
(11, 51, '3', 'ch_3LokMNLZABYnJmWo03pu6fG9', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKOnE6pkGMgYQThE62qs6LBZalaKkWFy0TVArxTtbFxJ-0tCV_1D2d8ls2NMBuou1XHMVadGQr27yPZ-N', 2615, 'succeeded', 1664787047, 'usd', NULL, '2022-10-03 03:50:50', '2022-10-03 03:50:50'),
(12, 51, '3', 'ch_3LokOALZABYnJmWo1LP2HFeP', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKNfF6pkGMgbEAmsqHC46LBZ6eYj237p7JYSjpEB6yZLJXeXUkK0xvb10EiipmzyoUEWW1COpKL_wyHGE', 2615, 'succeeded', 1664787158, 'usd', NULL, '2022-10-03 03:52:39', '2022-10-03 03:52:39'),
(13, 51, '3', 'ch_3LokigLZABYnJmWo362VqCkF', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKNDP6pkGMgbKGurIeTc6LBYLhUl10rC74YpPvcLUPjQrcGBI9MpoQoeiltiaDgcoBzqYm_L71Vh4KmPD', 13130, 'succeeded', 1664788430, 'usd', NULL, '2022-10-03 04:13:57', '2022-10-03 04:13:57'),
(14, 51, '3', 'ch_3LokkyLZABYnJmWo2IoBJbnW', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTGtQMmdMWkFCWW5KbVdvKN7Q6pkGMgaUKNjfpHQ6LBbABg7m7Y0yriAEFUdxOqSPZ0B7NwsZm0SiMAaR_7Vsd5KAgXEU45vSXSdq', 2773, 'succeeded', 1664788572, 'usd', NULL, '2022-10-03 04:16:14', '2022-10-03 04:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(255) DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `invoice_id`, `invoice_number`, `description`, `payment_date`, `total_amount`, `attachment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'INV-7322', 'this is description', '2022-11-25', 5000, NULL, '2023-02-22 06:59:05', '2022-11-25 07:19:46', '2023-02-22 06:59:05'),
(4, 23, 'INV-0008', 'this is description', '2022-11-29', 1035, '', NULL, '2022-11-29 09:05:59', '2022-11-29 09:05:59'),
(9, 23, 'INV-0009', 'this is description', '2022-11-29', 10, '1669790165_Salary Report.pdf', NULL, '2022-11-30 06:36:05', '2022-11-30 06:36:05'),
(11, 10, 'INV-0008', 'this is description', '2022-11-29', 10, '1669790463_shower-icon.png', '2022-12-21 08:42:38', '2022-11-30 06:41:03', '2022-12-21 08:42:38'),
(24, 10, 'INV-7703', 'this desc', '2022-12-09', 10, '1670579402_cod-removebg-preview (1).png', NULL, '2022-12-09 09:50:02', '2022-12-21 11:44:10'),
(25, 10, 'INV-7703', 'this desc', '2022-12-09', 35, '1670579460_cod-removebg-preview (1).png', NULL, '2022-12-09 09:51:00', '2022-12-09 09:51:00'),
(26, 10, 'INV-7703', 'this desc', '2022-12-09', 35, '1670579727_cod-removebg-preview (1).png', NULL, '2022-12-09 09:55:27', '2022-12-09 09:55:27'),
(27, 10, 'INV-7703', 'this desc', '2022-12-09', 35, '1676905175.jpg', NULL, '2022-12-09 09:56:55', '2023-02-20 14:59:35'),
(30, 4, 'INV-0008', 'this is description', '2022-12-07', 1, '1677049190.png', NULL, '2022-12-23 06:42:12', '2023-02-22 06:59:50'),
(31, 26, '389', 'the test payment', '2023-01-26', 10, '1674745145_1674714841590.JPEG', NULL, '2023-01-26 14:59:06', '2023-01-26 14:59:06'),
(32, 26, '389', 'Ut debitis laboriosa', '2023-02-21', 53, '1676968292.png', NULL, '2023-02-21 08:31:33', '2023-02-21 08:31:33'),
(33, 4, 'INV-0008', 'this is description', '2022-11-29', 10, '1676976180.png', NULL, '2023-02-21 10:43:00', '2023-02-21 10:43:00'),
(34, 4, 'INV-0008', 'this is description', '2022-11-29', 10, '1676982433.png', NULL, '2023-02-21 12:27:13', '2023-02-21 12:27:13'),
(35, 4, 'INV-0008', 'this is description', '2022-11-29', 10, '1676982543.png', NULL, '2023-02-21 12:29:03', '2023-02-21 12:29:03'),
(36, 4, 'INV-0008', 'this is description', '2022-11-29', 10, '1676982996.png', NULL, '2023-02-21 12:36:36', '2023-02-21 12:36:36'),
(37, 4, 'INV-0008', 'this is description', '2022-11-29', 10, '1676984469.png', '2023-02-21 14:18:52', '2023-02-21 13:01:09', '2023-02-21 14:18:52'),
(38, 26, '389', 'Soluta possimus qui', '2023-02-21', 5, '1676984548.png', NULL, '2023-02-21 13:02:28', '2023-02-21 13:02:28'),
(39, 4, 'INV-0008', 'this is description', '2022-11-29', 1, '1676987968.png', NULL, '2023-02-21 13:59:28', '2023-02-21 13:59:28'),
(40, 26, '389', 'Aliquam ut laudantiu', '2023-02-21', 8, '1676988032.png', NULL, '2023-02-21 14:00:32', '2023-02-21 14:00:32'),
(41, 26, '389', 'Amet iure eaque exp', '2023-02-22', 9, '1677049057.png', NULL, '2023-02-21 14:15:31', '2023-02-22 06:57:37'),
(42, 26, '389', 'Sunt quas aliqua Si', '2023-02-21', 3, '1676989911.png', NULL, '2023-02-21 14:31:51', '2023-02-21 14:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy` tinyint(1) DEFAULT 1,
  `terms_of_services` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `address`, `privacy_policy`, `terms_of_services`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'taha', 'yy', '', 'taha@gmail.com', NULL, '$2y$10$M4SqJqV3prPt2riXlYBx7eNrkCP8MJM5sZj3yOldJcu0XrGTWR2lW', 'haram vills Back side Darbar Mahel Bahawalpur', 1, 1, 'tJDJd5G3xrstw6EbG9tlCHWsz5dLVTE1pfpxRqgrIBMc7dhPgOlHoGuSAkbm', '2022-09-06 07:47:40', '2023-01-16 09:16:43'),
(51, 'Dolan', 'dddd', '12015550123', 'dolanx@gmail.com', NULL, '$2y$10$iHybQY0NpY6bBf/uVD8PIeDISfS6WzPYrSfBHBOeTHj3/bT0svejq', 'vvvv', 1, 1, NULL, '2022-09-28 06:02:22', '2022-09-28 06:02:22'),
(53, 'yft', 'gfgj', '12015550123', 'abbbb@gmail.com', NULL, '$2y$10$fRHDzZeUX5lYbv.MUNiZtuuMnzNhn2BSvWEXd3I0FZfrjMWU8Fpnq', '127 South State Street Concord NH 03301', NULL, NULL, NULL, '2023-05-19 17:31:32', '2023-05-19 17:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_notifications` tinyint(1) NOT NULL DEFAULT 1,
  `email_notifications` tinyint(1) NOT NULL DEFAULT 1,
  `auto_apply_sales_tax` tinyint(1) NOT NULL DEFAULT 1,
  `sales_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `auto_gen_invoice_num` tinyint(1) NOT NULL DEFAULT 1,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `invoice_number_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `title`, `display_name`, `logo`, `short_description`, `push_notifications`, `email_notifications`, `auto_apply_sales_tax`, `sales_tax`, `auto_gen_invoice_num`, `date_format`, `status`, `deleted_at`, `invoice_number_format`, `created_at`, `updated_at`) VALUES
(1, 1, 'Et qui numquam ut qu', 'Lisandra Vinson', '5847f5bdcef1014c0b5e489c.png', 'Vero et inventore nu', 1, 1, 1, '79', 0, '2', 1, NULL, '1', '2022-09-13 09:05:05', '2022-09-19 03:45:12'),
(3, 2, 'Cum esse nihil culpa', 'Blossom Burt', 'noimage.jpg', 'Quibusdam ut tempor', 1, 0, 1, '257', 0, '3', 1, NULL, '1', '2022-09-23 07:33:03', '2022-09-23 07:33:03'),
(4, 20, 'Alias vel aspernatur', 'Slade Quinn', 'noimage.jpg', 'Eligendi fugiat at t', 0, 0, 0, '729', 0, '2', 0, NULL, '2', '2022-09-23 08:52:22', '2022-10-01 04:43:38'),
(5, 20, 'Alias vel aspernatur', 'Slade Quinn', 'noimage.jpg', 'Eligendi fugiat at t', 0, 0, 0, '729', 0, '2', 1, NULL, '2', '2022-09-23 08:54:35', '2022-09-23 08:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auto_tax` tinyint(1) NOT NULL DEFAULT 0,
  `tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `auto_inv_number` tinyint(1) NOT NULL DEFAULT 0,
  `inv_number_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INV-',
  `cus_number_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000',
  `setting_updated` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `auto_tax`, `tax_rate`, `auto_inv_number`, `inv_number_format`, `cus_number_format`, `setting_updated`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4', 1, 'inv-0', 'zzz-0', 1, NULL, '2022-12-01 14:30:25', '2022-12-01 14:30:25');

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
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_bodies`
--
ALTER TABLE `invoice_bodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_formats`
--
ALTER TABLE `invoice_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stripe_clients`
--
ALTER TABLE `stripe_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stripe_clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `stripe_receipts`
--
ALTER TABLE `stripe_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stripe_receipts_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
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
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `invoice_bodies`
--
ALTER TABLE `invoice_bodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `invoice_formats`
--
ALTER TABLE `invoice_formats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stripe_clients`
--
ALTER TABLE `stripe_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stripe_receipts`
--
ALTER TABLE `stripe_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stripe_clients`
--
ALTER TABLE `stripe_clients`
  ADD CONSTRAINT `stripe_clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stripe_receipts`
--
ALTER TABLE `stripe_receipts`
  ADD CONSTRAINT `stripe_receipts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
