-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 09:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_lat` decimal(10,7) NOT NULL,
  `acc_long` decimal(10,7) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`id`, `acc_lat`, `acc_long`, `user_id`, `route_id`, `station_id`, `bus_id`, `driver_id`, `created_at`, `updated_at`, `acc_num`, `station_name`, `user_first`, `user_last`, `bus_number`, `driver_number`, `route_name`) VALUES
(10, '999.9999999', '53.3300000', 1, 10, 9, 37, 49, '2019-08-20 19:38:45', '2019-08-20 19:38:45', '', 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'afjs', 'Dr_01', 'Jigjiga yar');

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '4LicCRvBrBYilHDS9M4IXwGNyTrCnWnN', 1, '2019-04-04 10:33:07', '2019-04-04 10:33:07', '2019-04-04 10:33:07'),
(2, 2, 't1blrJgWkUuNmKqT3WfJ0Iy7dn6DgHXZ', 1, '2019-04-04 10:47:53', '2019-04-04 10:35:06', '2019-04-04 10:47:53'),
(3, 5, 'viddEcKpDAFANzKQyZzURgkR0yeatZCG', 1, '2019-04-14 03:38:55', '2019-04-14 03:36:42', '2019-04-14 03:38:55'),
(4, 6, 'tqLReLKFOIW2wyeGmSmY7Ftw4bG8OZDU', 1, '2019-05-15 04:04:55', '2019-05-15 04:03:45', '2019-05-15 04:04:55'),
(5, 7, 'dhxNOBnhB3AAC0kT89n6JtdBM4JCyn4H', 1, '2019-05-15 05:38:37', '2019-05-15 05:19:43', '2019-05-15 05:38:37'),
(6, 7, 'jfjOtoCJDO1T9VJovOYqTuQvJ15W0bXw', 1, '2019-05-15 05:36:21', '2019-05-15 05:19:43', '2019-05-15 05:36:21'),
(7, 8, 'CIYg7Ca5vtjwBIsJt8RP8uMyqK4XYcCM', 1, '2019-05-18 15:14:57', '2019-05-18 15:04:53', '2019-05-18 15:14:57'),
(8, 8, '58TOnLfXXs3LwncNlSV57KCumCmmxKKJ', 1, '2019-05-18 15:15:23', '2019-05-18 15:04:53', '2019-05-18 15:15:23'),
(9, 9, 'ZnWD8rC8LRh993y5io4CwsYEO14ImFop', 1, '2019-08-03 15:37:41', '2019-08-03 15:37:40', '2019-08-03 15:37:41'),
(10, 10, 'MFutNoKD4tMJ5s7e48DIPRJRhp72BmEG', 1, '2019-08-20 14:37:17', '2019-08-20 14:37:17', '2019-08-20 14:37:17'),
(13, 12, 'dOz7sGegKw0H31bnDTozeq2DlilUm28f', 1, '2019-08-20 17:53:34', '2019-08-20 17:53:34', '2019-08-20 17:53:34'),
(14, 13, '15zQqsL6lkiizIdl0p7gHXR9FTogcDQ3', 1, '2019-08-21 04:21:48', '2019-08-21 04:21:48', '2019-08-21 04:21:48'),
(15, 14, 'JU438IDDhdFfy2Lvu4fc5GK8QALIaAVh', 1, '2019-09-17 13:40:57', '2019-09-17 13:40:57', '2019-09-17 13:40:57'),
(16, 15, 'wOPFpYl2eFfxven4N5PV0QiDJccbVa1C', 1, '2019-09-30 14:33:28', '2019-09-30 14:33:28', '2019-09-30 14:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:34:40', '2019-04-04 10:34:40'),
(2, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:34:45', '2019-04-04 10:34:45'),
(3, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:36:47', '2019-04-04 10:36:47'),
(4, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:45:48', '2019-04-04 10:45:48'),
(5, 'abokor Elmi', 'User Updated by John Doe', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 10:47:54', '2019-04-04 10:47:54'),
(6, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:48:16', '2019-04-04 10:48:16'),
(7, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 10:48:28', '2019-04-04 10:48:28'),
(8, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 10:50:29', '2019-04-04 10:50:29'),
(9, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:52:07', '2019-04-04 10:52:07'),
(10, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-04 10:53:10', '2019-04-04 10:53:10'),
(11, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 10:53:48', '2019-04-04 10:53:48'),
(12, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 11:28:46', '2019-04-04 11:28:46'),
(13, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-04 11:28:46', '2019-04-04 11:28:46'),
(14, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-05 03:26:47', '2019-04-05 03:26:47'),
(15, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-05 03:26:54', '2019-04-05 03:26:54'),
(16, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 12:53:45', '2019-04-06 12:53:45'),
(17, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 12:55:11', '2019-04-06 12:55:11'),
(18, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-06 12:55:43', '2019-04-06 12:55:43'),
(19, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-06 12:55:47', '2019-04-06 12:55:47'),
(20, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 12:59:13', '2019-04-06 12:59:13'),
(21, 'raazi hassan', 'User deleted by John Doe', 3, 'App\\User', 3, 'App\\User', '[]', '2019-04-06 13:00:07', '2019-04-06 13:00:07'),
(22, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 13:01:58', '2019-04-06 13:01:58'),
(23, 'Robert Hamilton', 'Registered', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-06 13:02:31', '2019-04-06 13:02:31'),
(24, 'Robert Hamilton', 'LoggedOut', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-06 13:02:37', '2019-04-06 13:02:37'),
(25, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 13:03:32', '2019-04-06 13:03:32'),
(26, 'Robert Hamilton', 'User Updated by John Doe', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-06 13:08:23', '2019-04-06 13:08:23'),
(27, 'raazi hassan', 'User restored by John Doe', 3, 'App\\User', 3, 'App\\User', '[]', '2019-04-06 13:11:00', '2019-04-06 13:11:00'),
(28, 'raazi hassan', 'User deleted by John Doe', 3, 'App\\User', 3, 'App\\User', '[]', '2019-04-06 13:11:35', '2019-04-06 13:11:35'),
(29, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 14:46:19', '2019-04-06 14:46:19'),
(30, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 15:37:19', '2019-04-06 15:37:19'),
(31, 'Robert Hamilton', 'LoggedIn', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-06 15:38:14', '2019-04-06 15:38:14'),
(32, 'Robert Hamilton', 'LoggedOut', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-06 15:39:38', '2019-04-06 15:39:38'),
(33, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 15:40:36', '2019-04-06 15:40:36'),
(34, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 15:40:55', '2019-04-06 15:40:55'),
(35, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-06 16:35:42', '2019-04-06 16:35:42'),
(36, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 01:48:32', '2019-04-07 01:48:32'),
(37, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 01:56:49', '2019-04-07 01:56:49'),
(38, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 01:57:35', '2019-04-07 01:57:35'),
(39, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 01:57:44', '2019-04-07 01:57:44'),
(40, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:01:34', '2019-04-07 02:01:34'),
(41, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:01:48', '2019-04-07 02:01:48'),
(42, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:02:23', '2019-04-07 02:02:23'),
(43, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:03:02', '2019-04-07 02:03:02'),
(44, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 02:03:48', '2019-04-07 02:03:48'),
(45, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 02:04:03', '2019-04-07 02:04:03'),
(46, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 02:04:40', '2019-04-07 02:04:40'),
(47, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-07 02:05:18', '2019-04-07 02:05:18'),
(48, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:09:05', '2019-04-07 02:09:05'),
(49, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 02:10:52', '2019-04-07 02:10:52'),
(50, 'Robert Hamilton', 'LoggedIn', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-07 02:13:23', '2019-04-07 02:13:23'),
(51, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 04:45:51', '2019-04-07 04:45:51'),
(52, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 07:51:06', '2019-04-07 07:51:06'),
(53, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 10:05:27', '2019-04-07 10:05:27'),
(54, 'John Doe', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-07 12:19:27', '2019-04-07 12:19:27'),
(55, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-08 01:32:37', '2019-04-08 01:32:37'),
(56, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-08 16:29:12', '2019-04-08 16:29:12'),
(57, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-09 02:34:43', '2019-04-09 02:34:43'),
(58, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-09 14:27:07', '2019-04-09 14:27:07'),
(59, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-10 09:56:09', '2019-04-10 09:56:09'),
(60, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-10 14:53:14', '2019-04-10 14:53:14'),
(61, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 02:07:25', '2019-04-11 02:07:25'),
(62, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 02:48:50', '2019-04-11 02:48:50'),
(63, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 03:26:08', '2019-04-11 03:26:08'),
(64, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 03:26:22', '2019-04-11 03:26:22'),
(65, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 03:26:58', '2019-04-11 03:26:58'),
(66, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 03:27:39', '2019-04-11 03:27:39'),
(67, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 07:41:23', '2019-04-11 07:41:23'),
(68, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 11:21:32', '2019-04-11 11:21:32'),
(69, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 11:21:38', '2019-04-11 11:21:38'),
(70, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 11:22:08', '2019-04-11 11:22:08'),
(71, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-11 12:05:30', '2019-04-11 12:05:30'),
(72, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-11 12:05:56', '2019-04-11 12:05:56'),
(73, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-12 00:45:16', '2019-04-12 00:45:16'),
(74, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-12 10:37:11', '2019-04-12 10:37:11'),
(75, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 02:42:59', '2019-04-13 02:42:59'),
(76, 'John Doe', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 08:24:31', '2019-04-13 08:24:31'),
(77, 'John Doe', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 08:27:33', '2019-04-13 08:27:33'),
(78, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 08:27:53', '2019-04-13 08:27:53'),
(79, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-13 08:42:13', '2019-04-13 08:42:13'),
(80, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 11:10:11', '2019-04-13 11:10:11'),
(81, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 11:11:04', '2019-04-13 11:11:04'),
(82, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 11:12:14', '2019-04-13 11:12:14'),
(83, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 11:13:52', '2019-04-13 11:13:52'),
(84, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-13 11:14:35', '2019-04-13 11:14:35'),
(85, 'abokor Elmi', 'User Updated successfully', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-13 11:19:12', '2019-04-13 11:19:12'),
(86, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-13 17:13:40', '2019-04-13 17:13:40'),
(87, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-13 17:14:00', '2019-04-13 17:14:00'),
(88, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-13 17:14:12', '2019-04-13 17:14:12'),
(89, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 00:21:49', '2019-04-14 00:21:49'),
(90, 'Robert Hamilton', 'User deleted by John Doe', 4, 'App\\User', 4, 'App\\User', '[]', '2019-04-14 00:34:58', '2019-04-14 00:34:58'),
(91, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:34:08', '2019-04-14 03:34:08'),
(92, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:35:18', '2019-04-14 03:35:18'),
(93, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:37:57', '2019-04-14 03:37:57'),
(94, 'kaambul yusuf', 'User Updated by John Doe', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:38:55', '2019-04-14 03:38:55'),
(95, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:39:01', '2019-04-14 03:39:01'),
(96, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:39:34', '2019-04-14 03:39:34'),
(97, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:39:56', '2019-04-14 03:39:56'),
(98, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:40:10', '2019-04-14 03:40:10'),
(99, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:40:13', '2019-04-14 03:40:13'),
(100, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:40:40', '2019-04-14 03:40:40'),
(101, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-04-14 03:40:43', '2019-04-14 03:40:43'),
(102, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:41:00', '2019-04-14 03:41:00'),
(103, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:41:40', '2019-04-14 03:41:40'),
(104, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:44:40', '2019-04-14 03:44:40'),
(105, 'abokor Elmi', 'User Updated by John Doe', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-14 03:45:06', '2019-04-14 03:45:06'),
(106, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 03:45:19', '2019-04-14 03:45:19'),
(107, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-14 03:45:42', '2019-04-14 03:45:42'),
(108, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 04:14:28', '2019-04-14 04:14:28'),
(109, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 07:31:24', '2019-04-14 07:31:24'),
(110, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-14 16:16:55', '2019-04-14 16:16:55'),
(111, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-15 00:29:00', '2019-04-15 00:29:00'),
(112, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-15 03:53:58', '2019-04-15 03:53:58'),
(113, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-16 04:39:12', '2019-04-16 04:39:12'),
(114, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-04-16 04:39:22', '2019-04-16 04:39:22'),
(115, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-16 04:39:36', '2019-04-16 04:39:36'),
(116, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-17 04:35:57', '2019-04-17 04:35:57'),
(117, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-18 02:30:58', '2019-04-18 02:30:58'),
(118, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-18 14:47:31', '2019-04-18 14:47:31'),
(119, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-19 03:49:14', '2019-04-19 03:49:14'),
(120, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-20 10:30:07', '2019-04-20 10:30:07'),
(121, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-21 11:23:49', '2019-04-21 11:23:49'),
(122, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-23 08:25:27', '2019-04-23 08:25:27'),
(123, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-25 01:26:08', '2019-04-25 01:26:08'),
(124, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-26 03:40:43', '2019-04-26 03:40:43'),
(125, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-26 11:57:33', '2019-04-26 11:57:33'),
(126, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-26 16:48:11', '2019-04-26 16:48:11'),
(127, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-27 12:03:27', '2019-04-27 12:03:27'),
(128, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-28 02:40:04', '2019-04-28 02:40:04'),
(129, 'yusuf cabdi', 'New User Created by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-04-28 03:10:32', '2019-04-28 03:10:32'),
(130, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-04-28 03:22:28', '2019-04-28 03:22:28'),
(131, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-04-28 03:27:19', '2019-04-28 03:27:19'),
(132, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-28 10:13:20', '2019-04-28 10:13:20'),
(133, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-04-30 12:06:18', '2019-04-30 12:06:18'),
(134, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-01 01:26:42', '2019-05-01 01:26:42'),
(135, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-01 15:30:01', '2019-05-01 15:30:01'),
(136, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-05 03:05:35', '2019-05-05 03:05:35'),
(137, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-05 11:15:02', '2019-05-05 11:15:02'),
(138, 'abokor Elmi', 'User Updated by John Doe', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-05 13:23:12', '2019-05-05 13:23:12'),
(139, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-05 21:30:25', '2019-05-05 21:30:25'),
(140, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-05 21:34:23', '2019-05-05 21:34:23'),
(141, 'yusuf cabdi', 'User deleted by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-05 23:31:32', '2019-05-05 23:31:32'),
(142, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-06 03:41:33', '2019-05-06 03:41:33'),
(143, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-06 10:35:14', '2019-05-06 10:35:14'),
(144, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-07 07:02:14', '2019-05-07 07:02:14'),
(145, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-07 10:43:33', '2019-05-07 10:43:33'),
(146, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-08 02:40:00', '2019-05-08 02:40:00'),
(147, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-09 10:15:55', '2019-05-09 10:15:55'),
(148, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-10 05:02:27', '2019-05-10 05:02:27'),
(149, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-10 10:09:04', '2019-05-10 10:09:04'),
(150, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-10 14:39:36', '2019-05-10 14:39:36'),
(151, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-11 03:43:46', '2019-05-11 03:43:46'),
(152, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-11 22:08:19', '2019-05-11 22:08:19'),
(153, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-12 13:09:52', '2019-05-12 13:09:52'),
(154, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-12 23:19:36', '2019-05-12 23:19:36'),
(155, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-13 02:49:33', '2019-05-13 02:49:33'),
(156, 'abokor Elmi', 'User Updated by John Doe', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-13 05:15:13', '2019-05-13 05:15:13'),
(157, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-13 10:04:37', '2019-05-13 10:04:37'),
(158, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-13 15:13:10', '2019-05-13 15:13:10'),
(159, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-13 23:41:17', '2019-05-13 23:41:17'),
(160, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-14 11:15:33', '2019-05-14 11:15:33'),
(161, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-14 17:20:51', '2019-05-14 17:20:51'),
(162, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-15 01:21:26', '2019-05-15 01:21:26'),
(163, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-15 01:21:33', '2019-05-15 01:21:33'),
(164, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-15 01:36:47', '2019-05-15 01:36:47'),
(165, 'yusuf cabdi', 'User restored by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-15 04:04:01', '2019-05-15 04:04:01'),
(166, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-15 04:04:55', '2019-05-15 04:04:55'),
(167, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-15 05:18:56', '2019-05-15 05:18:56'),
(168, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-15 05:26:33', '2019-05-15 05:26:33'),
(169, 'yusuf cabdi', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-15 05:31:09', '2019-05-15 05:31:09'),
(170, 'yahye hassan', 'LoggedIn', 7, 'App\\User', 7, 'App\\User', '[]', '2019-05-15 05:36:41', '2019-05-15 05:36:41'),
(171, 'yahye hassan', 'User Updated by John Doe', 7, 'App\\User', 7, 'App\\User', '[]', '2019-05-15 05:38:37', '2019-05-15 05:38:37'),
(172, 'yahye hassan', 'LoggedOut', 7, 'App\\User', 7, 'App\\User', '[]', '2019-05-15 06:10:55', '2019-05-15 06:10:55'),
(173, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-05-15 06:11:59', '2019-05-15 06:11:59'),
(174, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-15 10:21:10', '2019-05-15 10:21:10'),
(175, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-15 10:21:24', '2019-05-15 10:21:24'),
(176, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-15 10:56:37', '2019-05-15 10:56:37'),
(177, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-15 10:56:37', '2019-05-15 10:56:37'),
(178, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-15 10:59:02', '2019-05-15 10:59:02'),
(179, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-15 14:18:35', '2019-05-15 14:18:35'),
(180, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-16 03:49:11', '2019-05-16 03:49:11'),
(181, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-16 06:14:57', '2019-05-16 06:14:57'),
(182, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-16 10:22:51', '2019-05-16 10:22:51'),
(183, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-16 10:43:09', '2019-05-16 10:43:09'),
(184, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-16 11:27:08', '2019-05-16 11:27:08'),
(185, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-16 11:28:47', '2019-05-16 11:28:47'),
(186, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-17 03:54:35', '2019-05-17 03:54:35'),
(187, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-17 05:06:59', '2019-05-17 05:06:59'),
(188, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-17 05:07:16', '2019-05-17 05:07:16'),
(189, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-17 10:42:58', '2019-05-17 10:42:58'),
(190, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-18 10:15:30', '2019-05-18 10:15:30'),
(191, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-18 14:42:11', '2019-05-18 14:42:11'),
(192, 'abokor Elmi', 'User Updated successfully', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-18 14:42:23', '2019-05-18 14:42:23'),
(193, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-18 14:56:29', '2019-05-18 14:56:29'),
(194, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-18 15:03:52', '2019-05-18 15:03:52'),
(195, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-18 15:07:19', '2019-05-18 15:07:19'),
(196, 'nasir nimcan', 'User Updated by John Doe', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-18 15:14:57', '2019-05-18 15:14:57'),
(197, 'nasir nimcan', 'User Updated by John Doe', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-18 15:15:23', '2019-05-18 15:15:23'),
(198, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-18 15:21:34', '2019-05-18 15:21:34'),
(199, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-18 16:00:07', '2019-05-18 16:00:07'),
(200, 'nasir nimcan', 'User Updated successfully', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-18 16:01:51', '2019-05-18 16:01:51'),
(201, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-18 18:36:17', '2019-05-18 18:36:17'),
(202, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-18 18:37:39', '2019-05-18 18:37:39'),
(203, 'yusuf cabdi', 'User Updated successfully', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-18 18:43:36', '2019-05-18 18:43:36'),
(204, 'yusuf cabdi', 'User Updated successfully', 6, 'App\\User', 6, 'App\\User', '[]', '2019-05-18 18:43:54', '2019-05-18 18:43:54'),
(205, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-19 03:52:58', '2019-05-19 03:52:58'),
(206, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-19 03:53:34', '2019-05-19 03:53:34'),
(207, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-19 03:56:46', '2019-05-19 03:56:46'),
(208, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-19 13:34:40', '2019-05-19 13:34:40'),
(209, 'nasir nimcan', 'User Updated successfully', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-19 13:34:58', '2019-05-19 13:34:58'),
(210, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-19 13:38:28', '2019-05-19 13:38:28'),
(211, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-19 18:16:54', '2019-05-19 18:16:54'),
(212, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-20 04:16:21', '2019-05-20 04:16:21'),
(213, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-20 04:26:09', '2019-05-20 04:26:09'),
(214, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-20 10:12:58', '2019-05-20 10:12:58'),
(215, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-20 11:17:13', '2019-05-20 11:17:13'),
(216, 'nasir nimcan', 'LoggedOut', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-20 11:30:24', '2019-05-20 11:30:24'),
(217, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-20 11:30:38', '2019-05-20 11:30:38'),
(218, 'abokor Elmi', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-20 13:32:55', '2019-05-20 13:32:55'),
(219, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-20 13:33:10', '2019-05-20 13:33:10'),
(220, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-20 16:57:49', '2019-05-20 16:57:49'),
(221, 'abokor Elmi', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-21 03:58:52', '2019-05-21 03:58:52'),
(222, 'abokor Elmis', 'User Updated successfully', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-21 07:15:07', '2019-05-21 07:15:07'),
(223, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-21 07:36:22', '2019-05-21 07:36:22'),
(224, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-21 07:36:44', '2019-05-21 07:36:44'),
(225, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-21 08:02:54', '2019-05-21 08:02:54'),
(226, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-21 08:03:10', '2019-05-21 08:03:10'),
(227, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-21 14:37:38', '2019-05-21 14:37:38'),
(228, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-05-22 03:29:27', '2019-05-22 03:29:27'),
(229, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-22 03:37:28', '2019-05-22 03:37:28'),
(230, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-22 12:53:38', '2019-05-22 12:53:38'),
(231, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-22 12:54:16', '2019-05-22 12:54:16'),
(232, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 03:45:40', '2019-05-23 03:45:40'),
(233, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 03:46:53', '2019-05-23 03:46:53'),
(234, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 03:47:29', '2019-05-23 03:47:29'),
(235, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 03:48:05', '2019-05-23 03:48:05'),
(236, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 04:58:37', '2019-05-23 04:58:37'),
(237, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 04:59:05', '2019-05-23 04:59:05'),
(238, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 05:02:32', '2019-05-23 05:02:32'),
(239, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 05:03:14', '2019-05-23 05:03:14'),
(240, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 05:07:38', '2019-05-23 05:07:38'),
(241, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 05:07:52', '2019-05-23 05:07:52'),
(242, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 07:05:01', '2019-05-23 07:05:01'),
(243, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 10:44:38', '2019-05-23 10:44:38'),
(244, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 10:45:42', '2019-05-23 10:45:42'),
(245, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-23 14:08:21', '2019-05-23 14:08:21'),
(246, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-23 14:08:43', '2019-05-23 14:08:43'),
(247, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-26 07:20:17', '2019-05-26 07:20:17'),
(248, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-26 10:37:18', '2019-05-26 10:37:18'),
(249, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-26 15:03:22', '2019-05-26 15:03:22'),
(250, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-05-26 19:18:57', '2019-05-26 19:18:57'),
(251, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-27 07:02:54', '2019-05-27 07:02:54'),
(252, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-27 14:12:45', '2019-05-27 14:12:45'),
(253, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-28 14:13:46', '2019-05-28 14:13:46'),
(254, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-28 17:51:21', '2019-05-28 17:51:21'),
(255, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-28 22:14:26', '2019-05-28 22:14:26'),
(256, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-29 03:41:43', '2019-05-29 03:41:43'),
(257, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-29 13:11:54', '2019-05-29 13:11:54'),
(258, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-30 05:08:57', '2019-05-30 05:08:57'),
(259, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-30 11:10:15', '2019-05-30 11:10:15'),
(260, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-05-31 11:55:05', '2019-05-31 11:55:05'),
(261, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-01 03:24:58', '2019-06-01 03:24:58'),
(262, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-01 07:14:34', '2019-06-01 07:14:34'),
(263, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-01 12:02:52', '2019-06-01 12:02:52'),
(264, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-01 18:23:57', '2019-06-01 18:23:57'),
(265, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-02 04:21:27', '2019-06-02 04:21:27'),
(266, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-03 18:50:02', '2019-06-03 18:50:02'),
(267, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-05 11:35:56', '2019-06-05 11:35:56'),
(268, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-05 11:37:22', '2019-06-05 11:37:22'),
(269, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 11:38:06', '2019-06-05 11:38:06'),
(270, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 13:45:44', '2019-06-05 13:45:44'),
(271, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 13:47:36', '2019-06-05 13:47:36'),
(272, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-05 13:47:50', '2019-06-05 13:47:50'),
(273, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-05 13:48:50', '2019-06-05 13:48:50'),
(274, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 13:49:14', '2019-06-05 13:49:14'),
(275, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 13:53:50', '2019-06-05 13:53:50'),
(276, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-05 13:54:01', '2019-06-05 13:54:01'),
(277, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-05 17:30:04', '2019-06-05 17:30:04'),
(278, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-06 03:38:58', '2019-06-06 03:38:58'),
(279, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-06 10:46:45', '2019-06-06 10:46:45'),
(280, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-07 11:21:39', '2019-06-07 11:21:39'),
(281, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-07 11:23:04', '2019-06-07 11:23:04'),
(282, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-07 11:25:43', '2019-06-07 11:25:43'),
(283, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-07 11:53:43', '2019-06-07 11:53:43'),
(284, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-08 04:42:25', '2019-06-08 04:42:25'),
(285, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-08 05:43:39', '2019-06-08 05:43:39'),
(286, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-08 08:04:04', '2019-06-08 08:04:04'),
(287, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-08 10:25:07', '2019-06-08 10:25:07'),
(288, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-08 10:25:18', '2019-06-08 10:25:18'),
(289, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-08 11:59:12', '2019-06-08 11:59:12'),
(290, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-08 15:17:33', '2019-06-08 15:17:33'),
(291, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-09 01:47:07', '2019-06-09 01:47:07'),
(292, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-09 01:47:26', '2019-06-09 01:47:26'),
(293, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-09 11:02:09', '2019-06-09 11:02:09'),
(294, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-09 11:02:15', '2019-06-09 11:02:15'),
(295, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-09 15:12:09', '2019-06-09 15:12:09'),
(296, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-10 02:21:51', '2019-06-10 02:21:51'),
(297, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-10 04:48:20', '2019-06-10 04:48:20'),
(298, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-10 10:28:02', '2019-06-10 10:28:02'),
(299, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-10 10:39:06', '2019-06-10 10:39:06'),
(300, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-10 15:42:54', '2019-06-10 15:42:54'),
(301, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-11 11:44:20', '2019-06-11 11:44:20'),
(302, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-11 17:07:02', '2019-06-11 17:07:02'),
(303, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-12 10:55:40', '2019-06-12 10:55:40'),
(304, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-13 01:55:58', '2019-06-13 01:55:58'),
(305, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-13 02:43:21', '2019-06-13 02:43:21'),
(306, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-13 10:41:06', '2019-06-13 10:41:06'),
(307, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-14 11:28:25', '2019-06-14 11:28:25'),
(308, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-15 03:26:27', '2019-06-15 03:26:27'),
(309, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-15 16:53:24', '2019-06-15 16:53:24'),
(310, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-16 03:14:53', '2019-06-16 03:14:53'),
(311, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 03:25:03', '2019-06-16 03:25:03'),
(312, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-16 03:59:45', '2019-06-16 03:59:45'),
(313, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 04:11:40', '2019-06-16 04:11:40'),
(314, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 04:37:14', '2019-06-16 04:37:14'),
(315, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-16 04:37:27', '2019-06-16 04:37:27'),
(316, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-16 06:04:44', '2019-06-16 06:04:44'),
(317, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 06:05:17', '2019-06-16 06:05:17'),
(318, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 11:03:00', '2019-06-16 11:03:00'),
(319, 'John Doe', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 12:03:03', '2019-06-16 12:03:03'),
(320, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-06-16 12:03:54', '2019-06-16 12:03:54'),
(321, 'yusuf cabdi', 'User Updated by John Doe', 6, 'App\\User', 6, 'App\\User', '[]', '2019-06-16 12:03:54', '2019-06-16 12:03:54'),
(322, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-16 16:17:49', '2019-06-16 16:17:49'),
(323, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-17 02:27:45', '2019-06-17 02:27:45'),
(324, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-17 15:56:25', '2019-06-17 15:56:25'),
(325, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-06-17 16:31:06', '2019-06-17 16:31:06'),
(326, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-06-17 16:32:11', '2019-06-17 16:32:11'),
(327, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-17 16:32:24', '2019-06-17 16:32:24'),
(328, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-17 16:32:32', '2019-06-17 16:32:32'),
(329, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-06-17 16:32:42', '2019-06-17 16:32:42'),
(330, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-18 02:48:53', '2019-06-18 02:48:53'),
(331, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-18 02:50:07', '2019-06-18 02:50:07'),
(332, 'AhmedYasin Ismacil', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-18 03:54:15', '2019-06-18 03:54:15'),
(333, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-18 10:23:31', '2019-06-18 10:23:31'),
(334, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-18 10:24:58', '2019-06-18 10:24:58'),
(335, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-18 10:25:32', '2019-06-18 10:25:32'),
(336, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-18 10:26:50', '2019-06-18 10:26:50'),
(337, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-18 10:27:04', '2019-06-18 10:27:04'),
(338, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-19 06:22:17', '2019-06-19 06:22:17'),
(339, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-19 07:59:58', '2019-06-19 07:59:58'),
(340, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-06-19 08:00:12', '2019-06-19 08:00:12'),
(341, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-19 11:44:00', '2019-06-19 11:44:00'),
(342, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-19 11:48:32', '2019-06-19 11:48:32'),
(343, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-19 11:48:41', '2019-06-19 11:48:41'),
(344, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-19 12:06:20', '2019-06-19 12:06:20'),
(345, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-21 03:28:35', '2019-06-21 03:28:35'),
(346, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-21 15:42:00', '2019-06-21 15:42:00'),
(347, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-21 16:49:17', '2019-06-21 16:49:17'),
(348, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-21 16:49:29', '2019-06-21 16:49:29'),
(349, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-21 16:49:49', '2019-06-21 16:49:49'),
(350, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-21 16:50:09', '2019-06-21 16:50:09'),
(351, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-22 02:59:33', '2019-06-22 02:59:33'),
(352, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-22 05:44:37', '2019-06-22 05:44:37'),
(353, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-22 06:05:51', '2019-06-22 06:05:51'),
(354, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-22 09:46:04', '2019-06-22 09:46:04'),
(355, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-22 16:51:28', '2019-06-22 16:51:28'),
(356, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-23 02:48:08', '2019-06-23 02:48:08'),
(357, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-23 10:17:10', '2019-06-23 10:17:10'),
(358, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-23 11:42:45', '2019-06-23 11:42:45'),
(359, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-23 15:09:38', '2019-06-23 15:09:38'),
(360, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-23 16:31:40', '2019-06-23 16:31:40'),
(361, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-06-23 16:31:51', '2019-06-23 16:31:51'),
(362, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-24 10:51:06', '2019-06-24 10:51:06'),
(363, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-25 03:08:29', '2019-06-25 03:08:29'),
(364, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-25 10:48:56', '2019-06-25 10:48:56'),
(365, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-26 02:29:26', '2019-06-26 02:29:26'),
(366, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-26 11:29:07', '2019-06-26 11:29:07'),
(367, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-27 03:34:51', '2019-06-27 03:34:51'),
(368, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-27 10:33:02', '2019-06-27 10:33:02'),
(369, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-27 13:46:00', '2019-06-27 13:46:00'),
(370, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-29 03:02:42', '2019-06-29 03:02:42'),
(371, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-30 01:22:34', '2019-06-30 01:22:34'),
(372, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-06-30 10:39:34', '2019-06-30 10:39:34'),
(373, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-01 12:11:32', '2019-07-01 12:11:32'),
(374, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-02 02:42:55', '2019-07-02 02:42:55'),
(375, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-02 11:49:43', '2019-07-02 11:49:43'),
(376, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-04 13:15:27', '2019-07-04 13:15:27'),
(377, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-05 10:44:49', '2019-07-05 10:44:49'),
(378, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-05 14:40:24', '2019-07-05 14:40:24'),
(379, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-05 14:40:52', '2019-07-05 14:40:52'),
(380, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-06 03:01:08', '2019-07-06 03:01:08'),
(381, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-06 05:10:07', '2019-07-06 05:10:07'),
(382, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-06 05:13:44', '2019-07-06 05:13:44'),
(383, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-06 11:42:59', '2019-07-06 11:42:59'),
(384, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-06 11:50:58', '2019-07-06 11:50:58'),
(385, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-08 11:50:19', '2019-07-08 11:50:19'),
(386, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-10 03:47:39', '2019-07-10 03:47:39'),
(387, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-11 10:55:11', '2019-07-11 10:55:11'),
(388, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-11 11:38:34', '2019-07-11 11:38:34'),
(389, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-12 10:42:17', '2019-07-12 10:42:17'),
(390, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-12 11:03:05', '2019-07-12 11:03:05'),
(391, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-13 02:27:41', '2019-07-13 02:27:41'),
(392, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 02:28:10', '2019-07-13 02:28:10'),
(393, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-13 07:29:40', '2019-07-13 07:29:40'),
(394, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 10:36:52', '2019-07-13 10:36:52'),
(395, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-13 10:37:47', '2019-07-13 10:37:47'),
(396, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 13:52:22', '2019-07-13 13:52:22'),
(397, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 13:53:07', '2019-07-13 13:53:07'),
(398, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 15:13:01', '2019-07-13 15:13:01'),
(399, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-13 15:13:24', '2019-07-13 15:13:24'),
(400, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-13 15:16:08', '2019-07-13 15:16:08'),
(401, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-13 15:16:19', '2019-07-13 15:16:19'),
(402, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-14 03:09:36', '2019-07-14 03:09:36'),
(403, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-15 02:38:15', '2019-07-15 02:38:15'),
(404, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-15 03:07:53', '2019-07-15 03:07:53'),
(405, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-16 02:23:18', '2019-07-16 02:23:18'),
(406, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-16 10:51:19', '2019-07-16 10:51:19'),
(407, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-17 02:40:36', '2019-07-17 02:40:36'),
(408, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-18 02:04:22', '2019-07-18 02:04:22'),
(409, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-18 10:38:02', '2019-07-18 10:38:02'),
(410, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-19 07:18:19', '2019-07-19 07:18:19'),
(411, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-19 10:28:23', '2019-07-19 10:28:23'),
(412, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-19 10:32:55', '2019-07-19 10:32:55'),
(413, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-19 10:44:57', '2019-07-19 10:44:57'),
(414, 'yahye hassan', 'LoggedIn', 7, 'App\\User', 7, 'App\\User', '[]', '2019-07-19 10:45:08', '2019-07-19 10:45:08'),
(415, 'yahye hassan', 'LoggedOut', 7, 'App\\User', 7, 'App\\User', '[]', '2019-07-19 11:18:30', '2019-07-19 11:18:30'),
(416, 'yahye hassan', 'LoggedIn', 7, 'App\\User', 7, 'App\\User', '[]', '2019-07-19 11:22:46', '2019-07-19 11:22:46'),
(417, 'yahye hassan', 'LoggedOut', 7, 'App\\User', 7, 'App\\User', '[]', '2019-07-19 11:23:10', '2019-07-19 11:23:10'),
(418, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-07-19 11:23:17', '2019-07-19 11:23:17'),
(419, 'yusuf cabdi', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2019-07-19 11:37:37', '2019-07-19 11:37:37'),
(420, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-07-19 11:37:58', '2019-07-19 11:37:58'),
(421, 'nasir nimcan', 'LoggedOut', 8, 'App\\User', 8, 'App\\User', '[]', '2019-07-19 12:01:49', '2019-07-19 12:01:49'),
(422, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-19 12:02:09', '2019-07-19 12:02:09'),
(423, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-19 16:11:42', '2019-07-19 16:11:42'),
(424, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-20 03:31:46', '2019-07-20 03:31:46'),
(425, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-21 03:28:37', '2019-07-21 03:28:37');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(426, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-21 04:52:59', '2019-07-21 04:52:59'),
(427, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-21 04:56:11', '2019-07-21 04:56:11'),
(428, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-21 04:57:09', '2019-07-21 04:57:09'),
(429, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-21 05:07:04', '2019-07-21 05:07:04'),
(430, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-21 05:08:38', '2019-07-21 05:08:38'),
(431, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-21 10:33:30', '2019-07-21 10:33:30'),
(432, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-21 10:36:47', '2019-07-21 10:36:47'),
(433, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-21 10:36:59', '2019-07-21 10:36:59'),
(434, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-21 15:50:33', '2019-07-21 15:50:33'),
(435, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-22 03:29:59', '2019-07-22 03:29:59'),
(436, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-22 08:33:39', '2019-07-22 08:33:39'),
(437, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-23 05:01:19', '2019-07-23 05:01:19'),
(438, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-23 11:30:27', '2019-07-23 11:30:27'),
(439, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-24 04:00:28', '2019-07-24 04:00:28'),
(440, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-24 10:50:40', '2019-07-24 10:50:40'),
(441, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-25 04:49:42', '2019-07-25 04:49:42'),
(442, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-25 10:16:56', '2019-07-25 10:16:56'),
(443, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-25 13:39:00', '2019-07-25 13:39:00'),
(444, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-26 04:35:53', '2019-07-26 04:35:53'),
(445, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-26 05:21:02', '2019-07-26 05:21:02'),
(446, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-26 10:46:48', '2019-07-26 10:46:48'),
(447, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-26 11:23:07', '2019-07-26 11:23:07'),
(448, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-26 15:26:21', '2019-07-26 15:26:21'),
(449, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-27 02:22:39', '2019-07-27 02:22:39'),
(450, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-27 10:38:14', '2019-07-27 10:38:14'),
(451, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-07-28 06:29:21', '2019-07-28 06:29:21'),
(452, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-28 06:33:19', '2019-07-28 06:33:19'),
(453, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-29 03:15:46', '2019-07-29 03:15:46'),
(454, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-29 10:41:55', '2019-07-29 10:41:55'),
(455, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-29 16:20:32', '2019-07-29 16:20:32'),
(456, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-07-31 17:18:58', '2019-07-31 17:18:58'),
(457, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-01 11:42:32', '2019-08-01 11:42:32'),
(458, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-02 03:43:05', '2019-08-02 03:43:05'),
(459, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-02 10:58:05', '2019-08-02 10:58:05'),
(460, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-02 15:46:37', '2019-08-02 15:46:37'),
(461, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 02:44:27', '2019-08-03 02:44:27'),
(462, 'abokor Elmis', 'User Updated successfully', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 02:45:03', '2019-08-03 02:45:03'),
(463, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 03:01:48', '2019-08-03 03:01:48'),
(464, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 14:44:25', '2019-08-03 14:44:25'),
(465, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 15:01:14', '2019-08-03 15:01:14'),
(466, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:01:29', '2019-08-03 15:01:29'),
(467, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:25:30', '2019-08-03 15:25:30'),
(468, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:25:49', '2019-08-03 15:25:49'),
(469, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:26:04', '2019-08-03 15:26:04'),
(470, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 15:26:13', '2019-08-03 15:26:13'),
(471, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 15:27:56', '2019-08-03 15:27:56'),
(472, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:28:09', '2019-08-03 15:28:09'),
(473, 'qali omar', 'New User Created by AhmedYasin Ismacil', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-03 15:37:41', '2019-08-03 15:37:41'),
(474, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-03 15:38:10', '2019-08-03 15:38:10'),
(475, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-03 15:38:23', '2019-08-03 15:38:23'),
(476, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-03 15:38:35', '2019-08-03 15:38:35'),
(477, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-03 15:38:47', '2019-08-03 15:38:47'),
(478, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-04 03:23:43', '2019-08-04 03:23:43'),
(479, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-04 04:10:17', '2019-08-04 04:10:17'),
(480, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-04 04:14:37', '2019-08-04 04:14:37'),
(481, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 04:14:55', '2019-08-04 04:14:55'),
(482, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 07:48:08', '2019-08-04 07:48:08'),
(483, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 07:48:19', '2019-08-04 07:48:19'),
(484, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 07:48:32', '2019-08-04 07:48:32'),
(485, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 07:48:43', '2019-08-04 07:48:43'),
(486, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 10:37:06', '2019-08-04 10:37:06'),
(487, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-04 10:37:17', '2019-08-04 10:37:17'),
(488, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 10:44:48', '2019-08-04 10:44:48'),
(489, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 10:45:12', '2019-08-04 10:45:12'),
(490, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 10:45:19', '2019-08-04 10:45:19'),
(491, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 10:45:26', '2019-08-04 10:45:26'),
(492, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 11:13:15', '2019-08-04 11:13:15'),
(493, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 11:13:32', '2019-08-04 11:13:32'),
(494, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 11:13:51', '2019-08-04 11:13:51'),
(495, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 11:14:04', '2019-08-04 11:14:04'),
(496, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-04 11:14:10', '2019-08-04 11:14:10'),
(497, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-04 11:14:20', '2019-08-04 11:14:20'),
(498, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-04 15:18:48', '2019-08-04 15:18:48'),
(499, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-05 03:19:40', '2019-08-05 03:19:40'),
(500, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-05 03:20:05', '2019-08-05 03:20:05'),
(501, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-05 05:44:52', '2019-08-05 05:44:52'),
(502, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-05 06:16:40', '2019-08-05 06:16:40'),
(503, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-05 07:48:13', '2019-08-05 07:48:13'),
(504, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-05 09:27:17', '2019-08-05 09:27:17'),
(505, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 02:39:50', '2019-08-06 02:39:50'),
(506, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 02:40:25', '2019-08-06 02:40:25'),
(507, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-06 02:40:57', '2019-08-06 02:40:57'),
(508, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-06 03:09:08', '2019-08-06 03:09:08'),
(509, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-06 03:15:19', '2019-08-06 03:15:19'),
(510, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-06 03:38:32', '2019-08-06 03:38:32'),
(511, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 03:38:42', '2019-08-06 03:38:42'),
(512, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 03:40:12', '2019-08-06 03:40:12'),
(513, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 03:40:31', '2019-08-06 03:40:31'),
(514, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-06 03:42:41', '2019-08-06 03:42:41'),
(515, 'qali omar', 'LoggedIn', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-06 03:42:55', '2019-08-06 03:42:55'),
(516, 'qali omar', 'LoggedOut', 9, 'App\\User', 9, 'App\\User', '[]', '2019-08-06 03:45:34', '2019-08-06 03:45:34'),
(517, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-06 04:04:30', '2019-08-06 04:04:30'),
(518, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-06 04:06:44', '2019-08-06 04:06:44'),
(519, 'kaambul yusuf', 'User Updated successfully', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-06 05:52:58', '2019-08-06 05:52:58'),
(520, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-07 02:29:52', '2019-08-07 02:29:52'),
(521, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-07 02:35:42', '2019-08-07 02:35:42'),
(522, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-07 04:09:06', '2019-08-07 04:09:06'),
(523, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-07 04:09:20', '2019-08-07 04:09:20'),
(524, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-07 04:37:31', '2019-08-07 04:37:31'),
(525, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-07 04:37:41', '2019-08-07 04:37:41'),
(526, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-08 02:15:15', '2019-08-08 02:15:15'),
(527, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-08 02:17:57', '2019-08-08 02:17:57'),
(528, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-08 02:18:24', '2019-08-08 02:18:24'),
(529, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-08 04:34:15', '2019-08-08 04:34:15'),
(530, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-08 05:02:18', '2019-08-08 05:02:18'),
(531, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-08-08 05:02:33', '2019-08-08 05:02:33'),
(532, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-08 05:15:03', '2019-08-08 05:15:03'),
(533, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-08 05:15:24', '2019-08-08 05:15:24'),
(534, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-08 05:16:42', '2019-08-08 05:16:42'),
(535, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-08-08 05:16:59', '2019-08-08 05:16:59'),
(536, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-08 10:40:29', '2019-08-08 10:40:29'),
(537, 'nasir nimcan', 'LoggedIn', 8, 'App\\User', 8, 'App\\User', '[]', '2019-08-08 10:40:57', '2019-08-08 10:40:57'),
(538, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-09 02:45:05', '2019-08-09 02:45:05'),
(539, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-09 03:58:46', '2019-08-09 03:58:46'),
(540, 'kaambul yusuf', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-09 10:54:16', '2019-08-09 10:54:16'),
(541, 'kaambul yusuf', 'LoggedOut', 5, 'App\\User', 5, 'App\\User', '[]', '2019-08-09 13:27:33', '2019-08-09 13:27:33'),
(542, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-09 13:27:50', '2019-08-09 13:27:50'),
(543, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 02:50:21', '2019-08-10 02:50:21'),
(544, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 10:27:40', '2019-08-10 10:27:40'),
(545, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 11:53:44', '2019-08-10 11:53:44'),
(546, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-10 11:55:13', '2019-08-10 11:55:13'),
(547, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-10 11:56:28', '2019-08-10 11:56:28'),
(548, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 11:56:43', '2019-08-10 11:56:43'),
(549, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 14:35:46', '2019-08-10 14:35:46'),
(550, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-10 14:35:59', '2019-08-10 14:35:59'),
(551, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-10 14:39:38', '2019-08-10 14:39:38'),
(552, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-10 14:39:59', '2019-08-10 14:39:59'),
(553, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-12 04:51:34', '2019-08-12 04:51:34'),
(554, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-12 10:21:33', '2019-08-12 10:21:33'),
(555, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-12 11:07:38', '2019-08-12 11:07:38'),
(556, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-12 11:07:48', '2019-08-12 11:07:48'),
(557, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-12 11:07:54', '2019-08-12 11:07:54'),
(558, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-12 11:08:02', '2019-08-12 11:08:02'),
(559, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-12 11:11:55', '2019-08-12 11:11:55'),
(560, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-12 11:12:30', '2019-08-12 11:12:30'),
(561, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-13 03:38:16', '2019-08-13 03:38:16'),
(562, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-13 10:09:04', '2019-08-13 10:09:04'),
(563, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-13 11:18:46', '2019-08-13 11:18:46'),
(564, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-13 11:19:08', '2019-08-13 11:19:08'),
(565, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-13 11:19:25', '2019-08-13 11:19:25'),
(566, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-13 11:19:48', '2019-08-13 11:19:48'),
(567, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-13 15:57:26', '2019-08-13 15:57:26'),
(568, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-13 15:57:48', '2019-08-13 15:57:48'),
(569, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-15 05:45:15', '2019-08-15 05:45:15'),
(570, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-16 04:07:35', '2019-08-16 04:07:35'),
(571, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-16 10:43:20', '2019-08-16 10:43:20'),
(572, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-16 10:59:28', '2019-08-16 10:59:28'),
(573, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-16 11:00:27', '2019-08-16 11:00:27'),
(574, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-16 16:59:56', '2019-08-16 16:59:56'),
(575, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-16 17:00:11', '2019-08-16 17:00:11'),
(576, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-16 17:41:17', '2019-08-16 17:41:17'),
(577, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-16 17:41:53', '2019-08-16 17:41:53'),
(578, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 02:07:26', '2019-08-17 02:07:26'),
(579, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 05:21:02', '2019-08-17 05:21:02'),
(580, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 05:24:12', '2019-08-17 05:24:12'),
(581, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 05:24:27', '2019-08-17 05:24:27'),
(582, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 05:24:31', '2019-08-17 05:24:31'),
(583, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 05:24:43', '2019-08-17 05:24:43'),
(584, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 11:09:04', '2019-08-17 11:09:04'),
(585, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 11:13:06', '2019-08-17 11:13:06'),
(586, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 11:13:18', '2019-08-17 11:13:18'),
(587, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 11:15:21', '2019-08-17 11:15:21'),
(588, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 11:20:07', '2019-08-17 11:20:07'),
(589, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 11:31:45', '2019-08-17 11:31:45'),
(590, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 11:41:26', '2019-08-17 11:41:26'),
(591, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 15:43:11', '2019-08-17 15:43:11'),
(592, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 15:43:22', '2019-08-17 15:43:22'),
(593, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 15:43:31', '2019-08-17 15:43:31'),
(594, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 19:23:05', '2019-08-17 19:23:05'),
(595, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 19:23:25', '2019-08-17 19:23:25'),
(596, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 20:28:45', '2019-08-17 20:28:45'),
(597, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 20:29:09', '2019-08-17 20:29:09'),
(598, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-17 20:41:21', '2019-08-17 20:41:21'),
(599, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-17 20:41:37', '2019-08-17 20:41:37'),
(600, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-18 03:24:49', '2019-08-18 03:24:49'),
(601, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-18 16:41:32', '2019-08-18 16:41:32'),
(602, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-19 02:32:29', '2019-08-19 02:32:29'),
(603, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-19 17:30:23', '2019-08-19 17:30:23'),
(604, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-19 17:30:49', '2019-08-19 17:30:49'),
(605, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-19 18:09:49', '2019-08-19 18:09:49'),
(606, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 03:16:22', '2019-08-20 03:16:22'),
(607, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 03:37:18', '2019-08-20 03:37:18'),
(608, 'yusuf cabdi', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2019-08-20 03:37:26', '2019-08-20 03:37:26'),
(609, 'yusuf cabdi', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2019-08-20 03:56:35', '2019-08-20 03:56:35'),
(610, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 04:06:53', '2019-08-20 04:06:53'),
(611, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-20 13:17:30', '2019-08-20 13:17:30'),
(612, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 14:24:14', '2019-08-20 14:24:14'),
(613, 'abokor Elmis', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-20 14:36:38', '2019-08-20 14:36:38'),
(614, 'yasin jirde', 'New User Created by AhmedYasin Ismacil', 10, 'App\\User', 10, 'App\\User', '[]', '2019-08-20 14:37:17', '2019-08-20 14:37:17'),
(615, 'yasin jirde', 'User Updated by AhmedYasin Ismacil', 10, 'App\\User', 10, 'App\\User', '[]', '2019-08-20 14:37:54', '2019-08-20 14:37:54'),
(616, 'yasin jirde', 'LoggedIn', 10, 'App\\User', 10, 'App\\User', '[]', '2019-08-20 14:38:21', '2019-08-20 14:38:21'),
(617, 'yasin jirde', 'LoggedOut', 10, 'App\\User', 10, 'App\\User', '[]', '2019-08-20 14:39:13', '2019-08-20 14:39:13'),
(618, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 14:43:45', '2019-08-20 14:43:45'),
(619, 'AhmedYasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 14:57:56', '2019-08-20 14:57:56'),
(620, 'yasin jirde', 'LoggedIn', 10, 'App\\User', 10, 'App\\User', '[]', '2019-08-20 14:58:34', '2019-08-20 14:58:34'),
(621, 'AhmedYasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 17:16:28', '2019-08-20 17:16:28'),
(622, 'abokor Elmis', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2019-08-20 17:26:58', '2019-08-20 17:26:58'),
(623, 'abokor hassan', 'New User Created by AhmedYasin Ismacil', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-20 17:53:35', '2019-08-20 17:53:35'),
(624, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-20 18:02:38', '2019-08-20 18:02:38'),
(625, 'abokor hassan', 'User Updated by AhmedYasin Ismacil', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-20 18:07:37', '2019-08-20 18:07:37'),
(626, 'A.Yasin Ismacil', 'User Updated by A.Yasin Ismacil', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 18:50:43', '2019-08-20 18:50:43'),
(627, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 21:10:17', '2019-08-20 21:10:17'),
(628, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-20 21:10:35', '2019-08-20 21:10:35'),
(629, 'abokor hassan', 'LoggedOut', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-20 21:13:15', '2019-08-20 21:13:15'),
(630, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 21:13:28', '2019-08-20 21:13:28'),
(631, 'A.Yasin Ismacil', 'User Updated by A.Yasin Ismacil', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-20 21:25:24', '2019-08-20 21:25:24'),
(632, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 03:38:34', '2019-08-21 03:38:34'),
(633, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:16:00', '2019-08-21 04:16:00'),
(634, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:16:29', '2019-08-21 04:16:29'),
(635, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:17:14', '2019-08-21 04:17:14'),
(636, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:18:34', '2019-08-21 04:18:34'),
(637, 'ahmed yasin', 'New User Created by A.Yasin Ismacil', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 04:21:48', '2019-08-21 04:21:48'),
(638, 'ahmed yasin', 'User Updated by A.Yasin Ismacil', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 04:22:36', '2019-08-21 04:22:36'),
(639, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:24:16', '2019-08-21 04:24:16'),
(640, 'ahmed yasin', 'LoggedIn', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 04:24:32', '2019-08-21 04:24:32'),
(641, 'ahmed yasin', 'LoggedOut', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 04:28:14', '2019-08-21 04:28:14'),
(642, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 04:28:44', '2019-08-21 04:28:44'),
(643, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 10:33:16', '2019-08-21 10:33:16'),
(644, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-21 10:33:54', '2019-08-21 10:33:54'),
(645, 'abokor hassan', 'LoggedOut', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-21 10:43:32', '2019-08-21 10:43:32'),
(646, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 11:27:10', '2019-08-21 11:27:10'),
(647, 'abokor hassan', 'User Updated by A.Yasin Ismacil', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-21 11:27:57', '2019-08-21 11:27:57'),
(648, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 11:28:02', '2019-08-21 11:28:02'),
(649, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-21 11:28:10', '2019-08-21 11:28:10'),
(650, 'abokor hassan', 'LoggedOut', 12, 'App\\User', 12, 'App\\User', '[]', '2019-08-21 11:29:25', '2019-08-21 11:29:25'),
(651, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 11:31:07', '2019-08-21 11:31:07'),
(652, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 11:56:32', '2019-08-21 11:56:32'),
(653, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 11:58:24', '2019-08-21 11:58:24'),
(654, 'ahmed yasin', 'LoggedIn', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 12:05:12', '2019-08-21 12:05:12'),
(655, 'ahmed yasin', 'LoggedOut', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 12:05:54', '2019-08-21 12:05:54'),
(656, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 12:06:10', '2019-08-21 12:06:10'),
(657, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-21 12:06:20', '2019-08-21 12:06:20'),
(658, 'ahmed yasin', 'LoggedIn', 13, 'App\\User', 13, 'App\\User', '[]', '2019-08-21 12:06:33', '2019-08-21 12:06:33'),
(659, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-23 02:43:25', '2019-08-23 02:43:25'),
(660, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-26 02:00:34', '2019-08-26 02:00:34'),
(661, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-27 02:35:00', '2019-08-27 02:35:00'),
(662, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-27 07:30:38', '2019-08-27 07:30:38'),
(663, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-29 03:22:03', '2019-08-29 03:22:03'),
(664, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-30 16:42:30', '2019-08-30 16:42:30'),
(665, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-31 04:02:54', '2019-08-31 04:02:54'),
(666, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-08-31 11:38:13', '2019-08-31 11:38:13'),
(667, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 02:38:24', '2019-09-01 02:38:24'),
(668, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 10:29:47', '2019-09-01 10:29:47'),
(669, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 14:00:51', '2019-09-01 14:00:51'),
(670, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 15:21:32', '2019-09-01 15:21:32'),
(671, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 15:42:13', '2019-09-01 15:42:13'),
(672, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-01 17:57:12', '2019-09-01 17:57:12'),
(673, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-02 05:37:57', '2019-09-02 05:37:57'),
(674, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-08 18:44:59', '2019-09-08 18:44:59'),
(675, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-14 17:13:24', '2019-09-14 17:13:24'),
(676, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-15 06:06:12', '2019-09-15 06:06:12'),
(677, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-15 17:15:20', '2019-09-15 17:15:20'),
(678, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 03:17:01', '2019-09-16 03:17:01'),
(679, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 06:38:03', '2019-09-16 06:38:03'),
(680, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 07:02:34', '2019-09-16 07:02:34'),
(681, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 14:17:15', '2019-09-16 14:17:15'),
(682, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 14:24:49', '2019-09-16 14:24:49'),
(683, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 14:26:18', '2019-09-16 14:26:18'),
(684, 'abokor hassan', 'User Updated by A.Yasin Ismacil', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-16 14:27:27', '2019-09-16 14:27:27'),
(685, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-16 14:28:47', '2019-09-16 14:28:47'),
(686, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 14:29:53', '2019-09-16 14:29:53'),
(687, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-16 14:31:55', '2019-09-16 14:31:55'),
(688, 'abokor hassan', 'LoggedOut', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-16 15:11:44', '2019-09-16 15:11:44'),
(689, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 15:14:27', '2019-09-16 15:14:27'),
(690, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-16 15:36:55', '2019-09-16 15:36:55'),
(691, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 18:54:58', '2019-09-16 18:54:58'),
(692, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-16 19:10:23', '2019-09-16 19:10:23'),
(693, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-17 06:23:13', '2019-09-17 06:23:13'),
(694, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-17 13:34:27', '2019-09-17 13:34:27'),
(695, 'yaxye cilmi', 'New User Created by A.Yasin Ismacil', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-17 13:40:57', '2019-09-17 13:40:57'),
(696, 'yaxye cilmi', 'User Updated by A.Yasin Ismacil', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-17 13:41:37', '2019-09-17 13:41:37'),
(697, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-17 13:43:22', '2019-09-17 13:43:22'),
(698, 'yaxye cilmi', 'LoggedIn', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-17 13:43:30', '2019-09-17 13:43:30'),
(699, 'yaxye cilmi', 'LoggedOut', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-17 13:47:35', '2019-09-17 13:47:35'),
(700, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-17 13:50:38', '2019-09-17 13:50:38'),
(701, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-17 21:07:47', '2019-09-17 21:07:47'),
(702, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-18 06:25:30', '2019-09-18 06:25:30'),
(703, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-18 07:43:29', '2019-09-18 07:43:29'),
(704, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-18 07:44:38', '2019-09-18 07:44:38'),
(705, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-18 13:06:03', '2019-09-18 13:06:03'),
(706, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-19 14:12:18', '2019-09-19 14:12:18'),
(707, 'abokor hassan', 'LoggedOut', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-19 16:19:33', '2019-09-19 16:19:33'),
(708, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-19 16:20:14', '2019-09-19 16:20:14'),
(709, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-21 13:18:01', '2019-09-21 13:18:01'),
(710, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-22 06:48:31', '2019-09-22 06:48:31'),
(711, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-22 13:26:10', '2019-09-22 13:26:10'),
(712, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-22 13:26:38', '2019-09-22 13:26:38'),
(713, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-22 18:03:47', '2019-09-22 18:03:47'),
(714, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-23 06:06:31', '2019-09-23 06:06:31'),
(715, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-23 13:23:59', '2019-09-23 13:23:59'),
(716, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-24 04:55:40', '2019-09-24 04:55:40'),
(717, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-24 05:10:05', '2019-09-24 05:10:05'),
(718, 'abokor hassan', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2019-09-24 05:11:02', '2019-09-24 05:11:02'),
(719, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-25 04:17:16', '2019-09-25 04:17:16'),
(720, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-25 06:30:21', '2019-09-25 06:30:21'),
(721, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-25 12:18:20', '2019-09-25 12:18:20'),
(722, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-26 15:25:21', '2019-09-26 15:25:21'),
(723, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-26 19:45:53', '2019-09-26 19:45:53'),
(724, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-27 05:57:08', '2019-09-27 05:57:08'),
(725, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-27 12:49:03', '2019-09-27 12:49:03'),
(726, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-27 15:35:32', '2019-09-27 15:35:32'),
(727, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-27 16:46:05', '2019-09-27 16:46:05'),
(728, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-28 10:39:24', '2019-09-28 10:39:24'),
(729, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-29 16:12:55', '2019-09-29 16:12:55'),
(730, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-29 17:59:22', '2019-09-29 17:59:22'),
(731, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-29 17:59:41', '2019-09-29 17:59:41'),
(732, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-29 18:00:17', '2019-09-29 18:00:17'),
(733, 'yaxye cilmi', 'LoggedIn', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-29 18:00:29', '2019-09-29 18:00:29'),
(734, 'yaxye cilmi', 'LoggedOut', 14, 'App\\User', 14, 'App\\User', '[]', '2019-09-29 18:02:37', '2019-09-29 18:02:37'),
(735, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-29 19:07:34', '2019-09-29 19:07:34'),
(736, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 05:49:27', '2019-09-30 05:49:27'),
(737, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 10:21:05', '2019-09-30 10:21:05'),
(738, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 13:52:43', '2019-09-30 13:52:43'),
(739, 'cabdi adan', 'New User Created by A.Yasin Ismacil', 15, 'App\\User', 15, 'App\\User', '[]', '2019-09-30 14:33:28', '2019-09-30 14:33:28'),
(740, 'cabdi adan', 'User Updated by A.Yasin Ismacil', 15, 'App\\User', 15, 'App\\User', '[]', '2019-09-30 14:34:02', '2019-09-30 14:34:02'),
(741, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 14:34:26', '2019-09-30 14:34:26'),
(742, 'cabdi adan', 'LoggedIn', 15, 'App\\User', 15, 'App\\User', '[]', '2019-09-30 14:34:37', '2019-09-30 14:34:37'),
(743, 'cabdi adan', 'LoggedOut', 15, 'App\\User', 15, 'App\\User', '[]', '2019-09-30 14:51:02', '2019-09-30 14:51:02'),
(744, 'cabdi adan', 'LoggedOut', 15, 'App\\User', 15, 'App\\User', '[]', '2019-09-30 14:51:02', '2019-09-30 14:51:02'),
(745, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 14:51:15', '2019-09-30 14:51:15'),
(746, 'A.Yasin Ismacil', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 15:01:20', '2019-09-30 15:01:20'),
(747, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 16:05:52', '2019-09-30 16:05:52'),
(748, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 16:20:12', '2019-09-30 16:20:12'),
(749, 'A.Yasin Ismacil', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2019-09-30 16:34:05', '2019-09-30 16:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `user_id`, `title`, `slug`, `content`, `image`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'first blog', 'first-blog', '<p>i dont know what im writng</p>\n', NULL, 0, '2019-05-12 15:59:30', '2019-05-12 15:59:30', NULL),
(2, 1, 1, 'second blog', 'second-blog', '<p>ajdfkajdk</p>\n', NULL, 1, '2019-05-12 16:01:47', '2019-05-22 05:29:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blog1', '2019-05-12 15:58:14', '2019-05-12 15:58:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Driver_id` int(11) DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `schedual_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_seats` int(11) NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `model_type`, `bus_number`, `Driver_id`, `station_id`, `user_id`, `route_id`, `schedual_id`, `created_at`, `updated_at`, `number_seats`, `station_name`, `user_first`, `user_last`, `driver_number`) VALUES
(37, 'toyota', 'afjs', 49, 9, 1, NULL, NULL, '2019-08-20 18:34:34', '2019-08-21 04:46:13', 30, 'Jigjiga Yar', 'AhmedYasin', 'Ismacil', 'Dr_01'),
(38, 'freri', 'fjdkjd', 50, 9, 1, NULL, NULL, '2019-08-21 04:03:52', '2019-08-21 04:03:52', 30, 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'Dr_02'),
(39, 'turbo', '93020', 55, 10, 1, NULL, NULL, '2019-08-21 04:05:32', '2019-08-21 04:05:32', 30, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_07'),
(40, '1kz', '40292', 61, 12, 1, NULL, NULL, '2019-08-21 04:06:39', '2019-08-21 04:06:39', 25, 'Siinaay', 'A.Yasin', 'Ismacil', 'Dr_13'),
(41, '1kz', '82929', 51, 9, 1, NULL, NULL, '2019-08-21 04:08:30', '2019-08-21 04:08:30', 30, 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'Dr_03'),
(42, 'turbo', '39392', 52, 9, 1, NULL, NULL, '2019-08-21 04:09:11', '2019-08-21 04:09:11', 30, 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'Dr_04'),
(43, 'fifity i', '93828', 53, 9, 1, NULL, NULL, '2019-08-21 04:09:55', '2019-08-21 04:09:55', 30, 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'Dr_05'),
(44, 'coaster', '38282', 54, 10, 1, NULL, NULL, '2019-08-21 04:12:21', '2019-08-21 04:12:21', 25, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_06'),
(45, 'turbo', '30389', 56, 10, 1, NULL, NULL, '2019-08-21 04:13:07', '2019-08-21 04:13:07', 30, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_08'),
(46, 'fifity i', '28', 57, 10, 1, NULL, NULL, '2019-08-21 04:14:15', '2019-08-21 04:14:15', 30, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_09'),
(47, 'sdkjs', '83483', 58, 10, 1, NULL, NULL, '2019-08-21 04:14:46', '2019-08-21 04:14:46', 39, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_10'),
(48, 'turbo', 'hfis393', 62, 9, 1, NULL, NULL, '2019-08-21 12:04:09', '2019-08-21 12:04:09', 30, 'Jigjiga Yar', 'A.Yasin', 'Ismacil', 'Dr_20'),
(49, 'turubo', 'ajda', 59, 10, 1, NULL, NULL, '2019-09-01 02:39:50', '2019-09-01 02:39:50', 30, 'Idaacada', 'A.Yasin', 'Ismacil', 'Dr_011'),
(50, 'Turubo', 'honf', 63, 15, 1, NULL, NULL, '2019-09-30 14:28:22', '2019-09-30 14:28:22', 31, 'Xero Awr', 'A.Yasin', 'Ismacil', 'Dr_14'),
(51, 'toyota', 'hierf', 64, 15, 1, NULL, NULL, '2019-09-30 14:29:19', '2019-09-30 14:29:19', 30, 'Xero Awr', 'A.Yasin', 'Ismacil', 'Dr_15'),
(52, 'toyota', 'afjks', 65, 15, 1, NULL, NULL, '2019-09-30 14:31:22', '2019-09-30 14:31:22', 31, 'Xero Awr', 'A.Yasin', 'Ismacil', 'Dr_16');

-- --------------------------------------------------------

--
-- Table structure for table `busstops`
--

CREATE TABLE `busstops` (
  `id` int(10) UNSIGNED NOT NULL,
  `bstop_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `sortname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datatables`
--

CREATE TABLE `datatables` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `driver_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `third_name`, `email`, `gender`, `dob`, `pic`, `address`, `license_number`, `ph_number`, `created_at`, `updated_at`, `station_id`, `user_id`, `driver_number`, `station_name`, `user_first`, `user_last`) VALUES
(49, 'jimale', 'abdi', 'adan', 'jimale@moji.com', '', '2018-08-05', 'efKRoVAN4T.jpeg', 'ahmed moge', '4ht57', 4253226, '2019-08-20 18:28:03', '2019-08-20 18:30:19', 9, 1, 'Dr_01', 'Jigjiga Yar', 'AhmedYasin', 'Ismacil'),
(50, 'mawlid', 'sidiq', 'mulani', 'mawlid@gmail.com', '', NULL, NULL, NULL, 'jf4u', 4222321, '2019-08-21 03:48:12', '2019-08-21 03:48:12', 9, 1, 'Dr_02', 'Jigjiga Yar', 'A.Yasin', 'Ismacil'),
(51, 'yusuf', 'abdi', 'adan', 'yusuf@afd.com', '', NULL, 'ha8f2Rpf0e.png', NULL, 'jf4u', 3624222, '2019-08-21 03:49:23', '2019-08-21 03:49:23', 9, 1, 'Dr_03', 'Jigjiga Yar', 'A.Yasin', 'Ismacil'),
(52, 'yaxye', 'garad', 'warfa', 'yaxye@gamil.com', '', NULL, NULL, NULL, 'jfakdj', 343243, '2019-08-21 03:51:56', '2019-08-21 03:51:56', 9, 1, 'Dr_04', 'Jigjiga Yar', 'A.Yasin', 'Ismacil'),
(53, 'turubo', 'gadid', 'sugal', 'adj@gami.com', '', NULL, NULL, NULL, 'jfk3jr', 8789782, '2019-08-21 03:52:36', '2019-08-21 03:52:36', 9, 1, 'Dr_05', 'Jigjiga Yar', 'A.Yasin', 'Ismacil'),
(54, 'khalid', 'axmed', 'caydid', 'khalid@gmai.com', '', NULL, NULL, NULL, 'adjf3', 7234585, '2019-08-21 03:53:37', '2019-08-21 03:53:37', 10, 1, 'Dr_06', 'Idaacada', 'A.Yasin', 'Ismacil'),
(55, 'wadaro', 'umal', 'khlid', 'dkafj@gmail.com', '', NULL, NULL, NULL, 'adjf3', 4535345, '2019-08-21 03:55:40', '2019-08-21 03:55:40', 10, 1, 'Dr_07', 'Idaacada', 'A.Yasin', 'Ismacil'),
(56, 'ibrahim', 'xasan', 'warsam', 'ibrhim@gmial.com', '', NULL, NULL, NULL, 'ajdfk3', 5784755, '2019-08-21 03:57:05', '2019-08-21 03:57:05', 10, 1, 'Dr_08', 'Idaacada', 'A.Yasin', 'Ismacil'),
(57, 'xamse', 'xasan', 'warsam', 'xamse@gmail.com', '', NULL, NULL, NULL, 'ajfdksj', 5345353, '2019-08-21 03:58:19', '2019-08-21 03:58:19', 10, 1, 'Dr_09', 'Idaacada', 'A.Yasin', 'Ismacil'),
(58, 'cabdiqani', 'yusuf', 'axmed', 'cabdi@gmail.com', '', NULL, NULL, NULL, 'fja4', 3453453, '2019-08-21 03:59:16', '2019-08-21 03:59:16', 10, 1, 'Dr_10', 'Idaacada', 'A.Yasin', 'Ismacil'),
(59, 'warfa', 'geedi', 'khalid', 'ajk@gmail.com', '', NULL, NULL, NULL, 'jfadkj', 4548573, '2019-08-21 04:00:07', '2019-08-21 04:00:07', 10, 1, 'Dr_011', 'Idaacada', 'A.Yasin', 'Ismacil'),
(60, 'maxed', 'ahmed', 'ajdk', 'maxe@gmail.com', '', NULL, NULL, NULL, 'ajdfkj', 3574535, '2019-08-21 04:01:17', '2019-08-21 04:01:17', 12, 1, 'Dr_012', 'Siinaay', 'A.Yasin', 'Ismacil'),
(61, 'jimale', 'abdi', 'adan', 'adi@gmail.com', '', NULL, NULL, NULL, 'fj4', 4435354, '2019-08-21 04:03:00', '2019-08-21 04:03:00', 12, 1, 'Dr_13', 'Siinaay', 'A.Yasin', 'Ismacil'),
(62, 'mohamed', 'daud', 'ahmed', 'dksdk@gmail.com', '', NULL, NULL, NULL, 'kjsjasjsjsdjdjdjdjdjd', 4234545, '2019-08-21 12:03:22', '2019-08-21 12:03:22', 9, 1, 'Dr_20', 'Jigjiga Yar', 'A.Yasin', 'Ismacil'),
(63, 'yusuf', 'cabdi', 'adan', 'yusufcabdi@gmail.com', '', NULL, NULL, NULL, '175845fafjkajdfu', 4523424, '2019-09-30 14:24:57', '2019-09-30 14:24:57', 15, 1, 'Dr_14', 'Xero Awr', 'A.Yasin', 'Ismacil'),
(64, 'khalid', 'axmed', 'cali', 'khalid@gmail.com', '', NULL, NULL, NULL, 'ajfk4utkfjkajgkfg', 36474224, '2019-09-30 14:26:34', '2019-09-30 14:26:34', 15, 1, 'Dr_15', 'Xero Awr', 'A.Yasin', 'Ismacil'),
(65, 'yoonis', 'cabdi', 'adan', 'yoonis@gmail.com', '', NULL, NULL, NULL, 'jfkajduv8fjhajfifadj', 4093627, '2019-09-30 14:27:33', '2019-09-30 14:27:33', 15, 1, 'Dr_16', 'Xero Awr', 'A.Yasin', 'Ismacil');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gmaps_geocache`
--

CREATE TABLE `gmaps_geocache` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_taggable_table', 1),
(2, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(3, '2014_10_04_174350_soft_delete_users', 1),
(4, '2014_12_10_011106_add_fields_to_user_table', 1),
(5, '2015_08_09_200015_create_blog_module_table', 1),
(6, '2015_08_11_064636_add_slug_to_blogs_table', 1),
(7, '2015_11_10_140011_create_files_table', 1),
(8, '2016_01_02_062647_create_tasks_table', 1),
(9, '2016_04_26_054601_create_datatables_table', 1),
(10, '2016_10_04_103149_add_fields_datatables_table', 1),
(11, '2017_09_29_113930_create_activity_log_table', 1),
(12, '2017_10_07_070138_create_countries_table', 1),
(13, '2017_10_24_130059_add_country_field', 1),
(14, '2018_02_14_072522_create_news_table', 1),
(15, '2019_04_07_064550_create_tests_table', 2),
(16, '2019_04_12_192221_create_stations_table', 3),
(17, '2019_04_14_055057_add_user_id_to_tests', 4),
(18, '2019_04_14_072038_create_buses_table', 5),
(19, '2019_04_15_090855_create_drivers_table', 6),
(20, '2019_04_20_132213_create_riders_table', 7),
(21, '2019_04_25_044548_create_reserves_table', 8),
(22, '2019_04_25_073720_create_busstops_table', 9),
(23, '2019_04_26_060931_create_accidents_table', 10),
(24, '2019_05_06_113230_modify_user_id_column_to_accespt_null', 11),
(25, '2019_05_06_133020_modify_driver__id_column_to_accespt_null', 12),
(26, '2019_05_08_080347_remove_fields_from_reserve_table', 13),
(27, '2019_05_08_082227_remove_some_fields_from_reserve_table', 14),
(28, '2019_05_10_173233_remove_id_number_from_reservation', 15),
(29, '2019_05_10_174106_add_rider_id_to_reserve', 16),
(30, '2019_05_11_065239_add_somefields_to_rider_model', 17),
(31, '2019_05_11_085759_add_somefields_to_driver_model', 18),
(32, '2019_05_11_165901_adding_driver_number_to_drivers', 19),
(33, '2019_05_11_173941_changing_driver_number_from_integer_to_string', 20),
(34, '2019_05_13_073151_add_station_id_to_users_table', 21),
(35, '2019_05_23_140649_add_acc_num_to_accidents', 22),
(36, '2019_05_26_101832_create_schedules_table', 23),
(37, '2019_05_26_103010_add_fields_schedules_table', 24),
(38, '2019_05_26_175154_remove_schedule_id_from_schedule_table', 25),
(39, '2019_05_26_191514_create_queues_table', 26),
(40, '2019_05_26_211209_remove_wrong_spelled_schedule_id', 27),
(41, '2019_05_28_172856_create_seats_table', 28),
(42, '2019_05_28_181721_add_bus_id_to_the_seat_table', 29),
(43, '2019_05_29_065424_add_number_of_seat_to_the_buses_table', 30),
(44, '2019_05_29_071018_rename_number_of_buses_to_number_of_seats_in_the_buses_table', 31),
(45, '2019_05_29_162819_add_some_fields_to_reserve_table', 32),
(46, '2019_05_29_180258_removing_bus_id_from_reserve_table', 33),
(47, '2019_05_29_182007_removing_schedule_id_from_schedule_table', 34),
(48, '2019_05_30_091530_adding_bus_number_to_queues_table', 35),
(49, '2019_06_05_203923_add_seat_number_to_reserve_table', 36),
(50, '2019_06_06_144439_add_user_id_to_stations_table', 37),
(51, '2019_06_07_144837_add_station_id_to_seats_table', 38),
(52, '2019_06_08_145015_add_user_id_to_seat_table', 39),
(53, '2019_06_11_162556_add_column_deleted_at_to_reserves', 40),
(54, '2019_06_11_174322_remove_deleted_at_from_reserve', 41),
(55, '2019_06_11_174558_add_deleted_at_to_queues', 42),
(56, '2019_06_23_071703_add_some_fields_to_stations_to_station_name', 43),
(57, '2019_06_23_072258_add_some_fields_to_buses', 44),
(58, '2019_06_23_074553_add_some_fields_to_drivers', 45),
(59, '2019_06_23_075057_add_some_fields_to_riders', 46),
(60, '2019_06_23_075344_add_some_fields_to_busstops', 47),
(61, '2019_06_23_080051_add_some_fields_to_stations', 48),
(62, '2019_06_23_080659_add_some_fields_to_accidents', 49),
(63, '2019_06_23_081459_add_some_fields_to_schedules', 50),
(64, '2019_06_23_081909_add_some_fields_to_queues', 51),
(65, '2019_06_23_082533_add_some_fields_to_seats', 52),
(66, '2019_06_23_082945_add_some_fields_to_users', 53),
(67, '2019_06_23_084046_add_some_fields_to_reserves', 54),
(68, '2019_06_23_132500_remove_station_name_from_staions', 55),
(69, '2019_06_27_080813_remove_driver_names_from_buses', 56),
(70, '2019_06_27_081639_add_driver_number_to_buses', 57),
(71, '2019_06_27_082214_remove_driver_names_from_accidents', 58),
(72, '2019_06_27_082630_add_driver_number_to_accidents', 59),
(73, '2019_07_13_061850_create_routes_table', 60),
(74, '2019_07_13_145224_add_route_to_schedules', 61),
(75, '2019_07_13_150355_add_route_to_queue', 62),
(76, '2019_07_13_150938_add_route_to_accident', 63),
(77, '2019_07_13_151640_add_route_to_busstop', 64),
(78, '2019_07_18_083310_add_route_to_reserves', 65),
(79, '2019_07_18_083935_add_route_id_to_reserves', 66),
(80, '2019_07_18_203941_add_seat_id_to_reserve', 67),
(81, '2019_08_02_170036_add_rider_number_to_reserves_table', 68),
(82, '2019_08_03_171655_create_notifications_table', 69),
(83, '2019_08_18_065318_add_start_in_schedules_table', 70),
(84, '2019_08_19_081946_add_full_and_finish_columns_to_queues_table', 71),
(85, '2019_08_19_144607_remove_finish_and_full_from_queues_table', 72),
(86, '2019_08_19_144951_add_again_with_default_null_value_finish_and_full_from_queues_table', 73),
(87, '2019_08_20_073157_create_gmaps_geocache_table', 74),
(88, '2019_09_16_092956_add_driver_number_queues_tabel', 74),
(89, '2019_09_19_211952_add_path_to_the_route', 75),
(90, '2019_09_22_173632_update_the_column_property_to_json', 76),
(91, '2019_09_23_140431_change_path_to_string_again', 77);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `category`, `created_at`, `updated_at`) VALUES
(1, 'a', '<p>fdajfdja</p>\n', 'PYHPapKbPJ.jpeg', 'world', '2019-05-05 04:34:32', '2019-05-05 04:34:32'),
(2, 'jkjkl', '<p>hjhkj</p>\n', 'Pz0shOJBD3.jpeg', 'sports', '2019-05-05 17:15:15', '2019-05-05 17:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0081e9ef-f58d-4e18-af52-2b9d0521f217', 'App\\Notifications\\AccidentRemoved', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"adjkj\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:52:24', '2019-08-06 03:44:53'),
('071f96c7-3492-46d9-bd9f-9b171278a14d', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":14,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"yaxye\",\"user_last_name\":\"cilmi\",\"user_station\":\"Siinaay\"}', NULL, '2019-09-17 13:44:34', '2019-09-17 13:44:34'),
('0c9e9d36-7e28-4063-b5e9-724c711f86d1', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-09-16 15:46:10', '2019-09-16 15:46:10'),
('0db6661b-cff3-4bab-8457-a55857978fda', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-10 11:55:30', '2019-08-09 06:07:18', '2019-08-10 11:55:30'),
('0e110a8d-2db5-4db9-87f9-ddfe45044796', 'App\\Notifications\\RiderDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"delet rider\",\"data\":\"Rd_13\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:39:30', '2019-08-05 13:39:18', '2019-08-05 13:39:30'),
('0e140698-5114-4e73-90d1-0cf6750870d0', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:55', '2019-08-21 04:25:02', '2019-08-26 02:49:55'),
('0f90a9fb-f173-43bb-98fb-a6eeaa96803f', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom02\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-21 12:13:43', '2019-08-21 12:13:43'),
('11f9daba-9803-432f-9518-ad19ce1f4a5f', 'App\\Notifications\\AccidentRemoved', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"adjkj\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:52:36', '2019-08-05 16:52:23', '2019-08-05 16:52:36'),
('12ee896a-dbd7-405f-af20-5a6cbeb6aefe', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-20 03:38:54', '2019-08-20 03:38:54'),
('132f7da5-691f-4b2b-b38d-123e67a4331a', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_jg01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-08 05:03:19', '2019-08-08 05:03:19'),
('19a2fb13-2bb9-4d28-a2b4-f89e8c7534a7', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:57:17', '2019-08-26 02:49:56'),
('1bc5f15e-a115-45e2-a842-8050eadc654c', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-20 18:59:16', '2019-08-20 18:59:16'),
('1c0438f7-c083-4f25-be63-e5ad2aa8db34', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgTo02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-20 03:55:28', '2019-08-20 03:55:28'),
('1de808a7-6810-4e82-a61d-f0056f09e0d7', 'App\\Notifications\\AccidentAdded', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"yews\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:55:05', '2019-08-06 03:44:53'),
('1f0b3fe2-8355-4aca-b8cd-18c28e5c570c', 'App\\Notifications\\RiderCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:42:47', '2019-08-06 03:44:53'),
('1f991ff1-737e-4112-bef3-af0b11118f98', 'App\\Notifications\\RiderDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"removed rider\",\"data\":\"Rd_015\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:58:38', '2019-08-05 16:58:27', '2019-08-05 16:58:38'),
('20e75cb7-c658-4d82-8370-258ff7decf35', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 05:22:50', '2019-08-07 05:22:50'),
('23b47c60-387c-4412-b47c-f7cfa6692578', 'App\\Notifications\\RiderCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:38:52', '2019-08-05 13:38:39', '2019-08-05 13:38:52'),
('26cee7ee-5a5a-4304-b9c0-4a1d6ca4349b', 'App\\Notifications\\BusDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"Deleted bus\",\"data\":\"yuru\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:54', '2019-08-05 08:02:06', '2019-08-06 03:44:54'),
('2912a933-da17-435c-b86e-667a1da65bad', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_sn05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:52', '2019-08-05 17:53:25', '2019-08-06 03:44:52'),
('2ca75b85-b3de-4be6-abd0-54a4226b043f', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgTo01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-09-16 15:06:35', '2019-09-16 15:06:35'),
('2d2e411c-fa3f-4ebb-8c5e-15b22ac40a8e', 'App\\Notifications\\BusCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"7fgs\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 11:35:49', '2019-08-06 03:44:53'),
('30a75195-6d79-4c50-b156-7d63022ec697', 'App\\Notifications\\RiderCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"registered rider\",\"data\":\"Rd_015\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:58:38', '2019-08-05 16:58:21', '2019-08-05 16:58:38'),
('30d51828-a3a1-43ed-806c-0f6332db5003', 'App\\Notifications\\BusCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"urt\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 12:01:14', '2019-08-06 03:44:53'),
('34653350-a1bc-4d23-a696-967a897e8578', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 06:28:30', '2019-08-08 04:34:43'),
('35ba05e9-217f-41f0-a247-764ffad018be', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:58:51', '2019-08-26 02:49:56'),
('39cffe2e-3c94-4352-9aba-278333f480bd', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:53:37', '2019-08-05 17:53:05', '2019-08-05 17:53:37'),
('3bb8e706-a9d0-40e5-a0e7-284c7eb39e35', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 06:31:05', '2019-08-07 06:31:05'),
('3c38a411-c949-44d9-b4ff-fbb526008544', 'App\\Notifications\\DriverCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"created driver\",\"data\":\"Dr_01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:04:20', '2019-08-05 13:04:09', '2019-08-05 13:04:20'),
('3c9f1957-df6d-40a0-bdba-dc550cdb8b99', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 13:22:36', '2019-08-10 11:55:31'),
('3d782d86-370a-404c-ae16-1e31ead71102', 'App\\Notifications\\BusCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"7fgs\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 11:36:02', '2019-08-05 11:35:49', '2019-08-05 11:36:02'),
('3dd77728-1a09-41f4-99ed-a9c6b0e87a13', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom02\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:54', '2019-08-21 12:13:43', '2019-08-26 02:49:54'),
('3f22c2d4-2495-4a0c-b13a-4906869e486d', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jg01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 05:04:03', '2019-08-10 11:55:31'),
('401ddaec-45f8-455d-ad9c-32388012aafd', 'App\\Notifications\\DriverCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"created driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:16:56', '2019-08-05 13:16:19', '2019-08-05 13:16:56'),
('44b8ac86-92b6-4790-8f89-5befa9658f58', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', NULL, '2019-08-08 13:22:47', '2019-08-08 13:22:47'),
('45885e1a-5a6e-4b2f-86d8-e0e2ea03bef1', 'App\\Notifications\\DriverCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"created driver\",\"data\":\"Dr_01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:04:09', '2019-08-06 03:44:53'),
('45902e9b-b863-4fc4-96f5-5452e744bffc', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 04:31:39', '2019-08-08 04:34:43'),
('47b1300c-df76-49ea-b870-6daf589f1e3d', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', NULL, '2019-08-08 13:22:36', '2019-08-08 13:22:36'),
('4ec6084e-5d37-444c-b365-e19a1a427653', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-08 04:19:21', '2019-08-08 04:19:21'),
('5573450a-3fb6-4f35-a482-13fcb2b5db34', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-09-16 15:46:10', '2019-09-16 15:46:10'),
('55936e52-bc76-4d28-94d0-7b94644fb5b2', 'App\\Notifications\\BusDeleted', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"bus_07\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 04:49:49', '2019-08-08 04:34:43'),
('576e0b2e-5fc4-46b6-b731-44f167aeee5f', 'App\\Notifications\\RiderCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"registered rider\",\"data\":\"Rd_015\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:58:21', '2019-08-06 03:44:53'),
('578d8a40-0b0d-404c-b10a-deec2b42c1e2', 'App\\Notifications\\AccidentAdded', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"yews\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:55:14', '2019-08-05 16:55:05', '2019-08-05 16:55:14'),
('5830c63b-2a6b-4119-ae7e-6cc0035f46dc', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-21 04:26:28', '2019-08-21 04:26:28'),
('59a28be6-ac08-41c6-a0cb-1bd585342ee7', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 05:22:50', '2019-08-08 04:34:43'),
('59ff3bae-c590-4a9b-9519-96301e7aeeff', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":15,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_xrFrom01\",\"user_first_name\":\"cabdi\",\"user_last_name\":\"adan\",\"user_station\":\"Xero Awr\"}', NULL, '2019-09-30 14:36:14', '2019-09-30 14:36:14'),
('61ad8a3a-1ae7-4db3-bfd4-ff54ff79e260', 'App\\Notifications\\RiderCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:41:45', '2019-08-06 03:44:53'),
('62aa2c70-1b17-45e8-977d-50742f4b33ca', 'App\\Notifications\\BusCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"ww\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:54', '2019-08-05 07:55:36', '2019-08-06 03:44:54'),
('632ef82c-2093-4184-9d7e-6459c4a97e79', 'App\\Notifications\\RiderDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"deleted rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:42:05', '2019-08-05 13:41:58', '2019-08-05 13:42:05'),
('64bb3d8a-2de3-46e7-888b-3fffea04ec2e', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 04:38:32', '2019-08-10 11:55:31'),
('65b91216-8def-4148-934d-b7e9192a5cb2', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-20 14:13:44', '2019-08-20 14:13:44'),
('6689511c-a500-49ec-9855-f75ee91e3464', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:33:33', '2019-08-26 02:49:56'),
('68d7aa58-3085-4d83-849f-17cf7375b0fa', 'App\\Notifications\\BusCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"urt\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 12:02:03', '2019-08-05 12:01:14', '2019-08-05 12:02:03'),
('6900e0d3-490a-4092-8072-32bb62ce8678', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_jg02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-08 05:03:47', '2019-08-08 05:03:47'),
('696c197f-da76-4d9e-99ea-dd2454b3c8c5', 'App\\Notifications\\AccidentAdded', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"jakd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 15:35:49', '2019-08-06 03:44:53'),
('6dd3c6a4-35b5-4d9f-811c-d720b3028d3b', 'App\\Notifications\\RiderDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"delet rider\",\"data\":\"Rd_13\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:39:18', '2019-08-06 03:44:53'),
('6eaea6e1-2d2c-4434-bd63-6fae7e8dcfcc', 'App\\Notifications\\DriverDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"deleted driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:16:42', '2019-08-06 03:44:53'),
('6f9d9b55-be76-46ab-9c86-dd4d6969fa58', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jg02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-08 05:04:43', '2019-08-08 05:04:43'),
('6fb86d26-d2aa-4651-8b42-10bc6ade3ff3', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:15:43', '2019-08-18 04:15:43'),
('6fccd54a-b6ea-406d-861e-1a36e4aabab1', 'App\\Notifications\\BusDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"Deleted bus\",\"data\":\"yuru\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 11:30:25', '2019-08-05 08:02:06', '2019-08-05 11:30:25'),
('704c4819-9fe5-4cd3-bcb7-e72c94c4ee6a', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-09 06:07:18', '2019-08-09 06:07:18'),
('7257e2b2-49b6-4d69-a121-dfd2b6fd9ff3', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 06:28:34', '2019-08-08 04:34:43'),
('72985bcc-2077-4672-aafb-8b3041178e9c', 'App\\Notifications\\AccidentAdded', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"jakd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 15:34:07', '2019-08-05 15:33:37', '2019-08-05 15:34:07'),
('73ab0c40-a418-4690-9be1-7515338a9c1a', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 04:31:39', '2019-08-07 04:31:39'),
('764d2636-6794-4895-b679-339a5debdbcd', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-19 14:58:53', '2019-08-26 02:49:56'),
('774ed6a1-2074-4782-bca8-9e047ba321dc', 'App\\Notifications\\RiderDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"removed rider\",\"data\":\"Rd_015\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:58:27', '2019-08-06 03:44:53'),
('79ab41e7-f836-4d62-bdee-7061c288ae68', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', '2019-08-10 11:55:30', '2019-08-08 13:23:56', '2019-08-10 11:55:30'),
('7b86c9d3-9833-47c6-89a3-ffacbe157abd', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', NULL, '2019-08-08 13:24:18', '2019-08-08 13:24:18'),
('7bd968bc-de90-4351-8cae-0636e716e12c', 'App\\Notifications\\DriverDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"deleted driver\",\"data\":\"Dr_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:12:27', '2019-08-05 13:11:43', '2019-08-05 13:12:27'),
('7e87ce85-2432-4f2f-a863-e4626e72295a', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo04\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:59:40', '2019-08-26 02:49:56');
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('7edb4e83-c806-44e9-b298-970149e0d26c', 'App\\Notifications\\AccidentRemoved', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"yews\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:57:25', '2019-08-05 16:57:11', '2019-08-05 16:57:25'),
('7ee10252-d380-4914-acb4-29230e4476ff', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:52', '2019-08-05 17:53:05', '2019-08-06 03:44:52'),
('7f433a9f-f3ef-4ff1-9766-895651f0fbbd', 'App\\Notifications\\RiderCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:43:03', '2019-08-05 13:42:47', '2019-08-05 13:43:03'),
('8071eeff-d856-4e27-9204-26c56cf5d87a', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:15:43', '2019-08-26 02:49:56'),
('8a6de192-07d7-4b82-9d3d-a44a1fd1e88b', 'App\\Notifications\\DriverCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"registered driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 17:20:41', '2019-08-06 03:44:53'),
('8dbf59ea-1e96-4a11-a502-39cfc28729c6', 'App\\Notifications\\RiderDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"deleted rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:41:58', '2019-08-06 03:44:53'),
('8e23854d-e69a-4e23-bcd2-82e506f27701', 'App\\Notifications\\AccidentAdded', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"jakd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 15:33:37', '2019-08-06 03:44:53'),
('8e79faa5-52d4-4946-810f-938da380d87f', 'App\\Notifications\\BusDeleted', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"bus_07\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:43', '2019-08-07 04:50:04', '2019-08-08 04:34:43'),
('90169175-ed34-4c83-baee-f524b4c49d29', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_sn05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:53:37', '2019-08-05 17:53:25', '2019-08-05 17:53:37'),
('901fe45f-11d8-437f-b78d-e7a129eed819', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:58:51', '2019-08-18 04:58:51'),
('904b7801-a27e-46da-80cd-9d5512cf340d', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:42', '2019-08-07 06:31:05', '2019-08-08 04:34:42'),
('93d21ce2-8a3a-4b87-b6ae-2b7f21a1ed7b', 'App\\Notifications\\DriverDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"removed driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:20:58', '2019-08-05 17:20:47', '2019-08-05 17:20:58'),
('948028bd-70c4-442d-950e-01a646d131de', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-20 03:38:54', '2019-08-26 02:49:56'),
('9977829e-9baf-475c-ad1d-a38d9967ea43', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgFrom01\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:54', '2019-08-21 04:26:28', '2019-08-26 02:49:54'),
('9b66b07c-07da-4e53-8f4f-4df076ab8f4e', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"sjsd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:52', '2019-08-05 17:48:27', '2019-08-06 03:44:52'),
('9beedd34-f36c-44b1-bd2d-abdebc19ec6b', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_jg01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 05:03:19', '2019-08-10 11:55:31'),
('9ceb7146-fd2c-401a-ad18-4df2b1cd5b2c', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:55', '2019-08-21 04:25:07', '2019-08-26 02:49:55'),
('9e5a7391-48ee-40e1-b0f5-50ec0253842c', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jg01\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', NULL, '2019-08-08 05:04:04', '2019-08-08 05:04:04'),
('a1c0e006-41dd-4c49-9850-9d5c026eab6e', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', NULL, '2019-08-08 13:23:56', '2019-08-08 13:23:56'),
('a586eefc-782e-4229-9b44-a94e38ed3f53', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_sn03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:51:17', '2019-08-05 17:51:05', '2019-08-05 17:51:17'),
('a682a21f-b68a-40f9-89e9-58375de140ec', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn04\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:34:13', '2019-08-18 04:34:13'),
('a9cd9f67-4b06-4493-bac0-ca2b3eb29617', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"sjsd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:48:54', '2019-08-05 17:48:26', '2019-08-05 17:48:54'),
('ad275330-ac8f-4a12-bee6-b8b7744db232', 'App\\Notifications\\BusCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"added bus\",\"data\":\"ajdf\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 17:21:27', '2019-08-06 03:44:53'),
('ae2e5c4c-723e-43b6-a290-37f741905b09', 'App\\Notifications\\DriverDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"removed driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 17:20:47', '2019-08-06 03:44:53'),
('b02192be-982b-49a4-a0b3-ae388864cfb9', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn04\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:34:13', '2019-08-26 02:49:56'),
('b162d95e-b12f-47e4-8ad0-f6724a1a58d9', 'App\\Notifications\\DriverDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"deleted driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:16:56', '2019-08-05 13:16:42', '2019-08-05 13:16:56'),
('b3f06c92-29c9-4b89-8163-3a9052b9c423', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:56', '2019-08-20 18:59:16', '2019-08-26 02:49:56'),
('b6ba3d85-8d28-4bff-8002-7ee9c863eebc', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 06:28:30', '2019-08-07 06:28:30'),
('b86eff3b-8d0d-4a8e-b30d-baaca6d6fa52', 'App\\Notifications\\RiderDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"deleted rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:43:02', '2019-08-05 13:42:52', '2019-08-05 13:43:02'),
('bcd64d9b-6ed6-4a76-9a5f-cfe1c7031ff5', 'App\\Notifications\\BusDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"ajdf\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 17:22:02', '2019-08-06 03:44:53'),
('bdf91cea-b488-4d8c-8b73-448d341884e3', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:33:55', '2019-08-18 04:33:55'),
('bfb0e100-689b-4d16-8ec0-1acb036bc7d4', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgTo01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-09-16 15:06:36', '2019-09-16 15:06:36'),
('bfce4d61-36f0-472d-91af-6ade7bacf042', 'App\\Notifications\\BusDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"Deleted bus\",\"data\":\"urt\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 12:04:36', '2019-08-05 12:04:26', '2019-08-05 12:04:36'),
('c1b3f68c-6dac-4110-9353-44fb3c2a471f', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', '2019-08-10 11:55:30', '2019-08-08 13:22:42', '2019-08-10 11:55:30'),
('c384abd6-6d42-471b-82c3-30c378a331d2', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-21 04:25:07', '2019-08-21 04:25:07'),
('c4ae9d71-09e1-4a74-8d5e-ef75a0c992b7', 'App\\Notifications\\AccidentRemoved', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"adjkj\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:51:17', '2019-08-06 03:44:53'),
('c5dd7b6a-a644-419f-9e96-d60d8af6fd5e', 'App\\Notifications\\RiderDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"deleted rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:42:52', '2019-08-06 03:44:53'),
('c6d920d6-8157-4fa7-b5e1-6511e3611afb', 'App\\Notifications\\RiderCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:38:39', '2019-08-06 03:44:53'),
('c959ab0b-23a4-457d-89a7-aca98c579c56', 'App\\Notifications\\AccidentRemoved', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"adjkj\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 16:51:30', '2019-08-05 16:51:17', '2019-08-05 16:51:30'),
('cf7b1879-6566-4015-a507-537179aac087', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:33:33', '2019-08-18 04:33:33'),
('cfbe99fb-a0e0-4df0-bedd-f0a36f94b8b2', 'App\\Notifications\\BusDeleted', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"bus_07\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 04:49:49', '2019-08-07 04:49:49'),
('d0e95ae3-0899-4e18-bf0d-0d514eb585a5', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":15,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_xrFrom01\",\"user_first_name\":\"cabdi\",\"user_last_name\":\"adan\",\"user_station\":\"Xero Awr\"}', NULL, '2019-09-30 14:36:14', '2019-09-30 14:36:14'),
('d5b8edcb-3e29-45ef-bbf0-b13b38ec2012', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:57:17', '2019-08-18 04:57:17'),
('d5f2e010-d404-4013-864b-3e4940366979', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', '2019-08-26 02:49:56', '2019-08-20 18:38:07', '2019-08-26 02:49:56'),
('d6e04fbe-1005-4cb4-91ef-35e74640da20', 'App\\Notifications\\DriverDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"deleted driver\",\"data\":\"Dr_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:11:43', '2019-08-06 03:44:53'),
('d6ecf3d4-9baf-4a3f-9178-07d3335a341d', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":12,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"hassan\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-20 18:38:07', '2019-08-20 18:38:07'),
('d7e54be8-5e75-46dd-a72f-35b2977853c4', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 06:28:34', '2019-08-07 06:28:34'),
('d82f83ee-71ce-4a98-a595-d731d1e1f9b6', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jgTo02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-20 03:55:28', '2019-08-26 02:49:56'),
('d9118767-bad6-4139-8d3d-5762beb3524c', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-08 04:38:32', '2019-08-08 04:38:32'),
('d92f3f77-4772-4f9f-b35b-306dc834b415', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id01\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', NULL, '2019-08-08 13:22:42', '2019-08-08 13:22:42'),
('d9b0b098-15c8-42df-b63d-538a54e0782b', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":14,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"yaxye\",\"user_last_name\":\"cilmi\",\"user_station\":\"Siinaay\"}', NULL, '2019-09-17 13:44:33', '2019-09-17 13:44:33'),
('dce47e72-cffe-47a4-8abf-7eb0c1af7640', 'App\\Notifications\\AccidentAdded', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_accident_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"had accident\",\"data\":\"jakd\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 15:36:01', '2019-08-05 15:35:49', '2019-08-05 15:36:01'),
('dd4d2769-2389-467e-a2d5-1fbb57ecd6a1', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-20 14:13:44', '2019-08-26 02:49:56'),
('e1419422-3256-4b98-b0bc-0aa6908f1fea', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_sn03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:33:55', '2019-08-26 02:49:56'),
('e23170b5-f6b2-4298-a568-818e5270c24a', 'App\\Notifications\\BusCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"added bus\",\"data\":\"ajdf\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:22:13', '2019-08-05 17:21:27', '2019-08-05 17:22:13'),
('e3f69d18-ab29-40b6-a448-2c42017444a4', 'App\\Notifications\\BusDeleted', 9, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"bus_07\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', NULL, '2019-08-07 04:50:04', '2019-08-07 04:50:04'),
('e52336fa-fd44-44f1-9796-f495225b403d', 'App\\Notifications\\BusDeleted', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.9rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"removed bus\",\"data\":\"ajdf\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:22:13', '2019-08-05 17:22:02', '2019-08-05 17:22:13'),
('e607880c-aad4-41fc-a93f-cb2183ce3747', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":13,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_snTo02\",\"user_first_name\":\"ahmed\",\"user_last_name\":\"yasin\",\"user_station\":\"Jigjiga Yar\"}', NULL, '2019-08-21 04:25:02', '2019-08-21 04:25:02'),
('e64d8937-3435-4231-ae9f-30b14bfdcb08', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', '2019-08-10 11:55:30', '2019-08-08 13:24:18', '2019-08-10 11:55:30'),
('e7545c3d-2286-4b1b-81f7-c4ef18359a79', 'App\\Notifications\\BusCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"created bus\",\"data\":\"ww\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 11:30:25', '2019-08-05 07:55:36', '2019-08-05 11:30:25'),
('e79857ea-9882-49c9-8473-364fc2675039', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:55:15', '2019-08-18 04:55:15'),
('e99df29c-c2eb-4803-8fbf-82ffe792569d', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom01\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-26 02:49:56', '2019-08-18 04:55:15', '2019-08-26 02:49:56'),
('ead7c671-5286-4c32-9eef-6f4132ef9414', 'App\\Notifications\\DeleteSchedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_sn03\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:52', '2019-08-05 17:51:06', '2019-08-06 03:44:52'),
('ee702dd3-5538-41f9-98e8-629450a2d734', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":8,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_id03\",\"user_first_name\":\"nasir\",\"user_last_name\":\"nimcan\",\"user_station\":\"\"}', '2019-08-10 11:55:30', '2019-08-08 13:22:47', '2019-08-10 11:55:30'),
('efea88eb-1d57-4e40-8c69-f7dab6e400a0', 'App\\Notifications\\DriverCreated', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"created driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 13:16:19', '2019-08-06 03:44:53'),
('f2459f73-bb03-4d5a-aa4e-a62cccac83da', 'App\\Notifications\\DeleteSchedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"deleted schedule\",\"data\":\"Sch_jg02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 05:03:46', '2019-08-10 11:55:31'),
('f310dc40-7c2e-4bc0-977b-df3535fb6ba0', 'App\\Notifications\\RiderCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/passenger.png\\\">\\n                            <\\/span>\",\"message\":\"created rider\",\"data\":\"Rd_15\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 13:42:05', '2019-08-05 13:41:45', '2019-08-05 13:42:05'),
('f6e9c41b-6fe2-4457-9d0f-48cc725de731', 'App\\Notifications\\DriverCreated', 1, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.6rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/25\\/000000\\/driver.png\\\">\\n                            <\\/span>\",\"message\":\"registered driver\",\"data\":\"Dr_18\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-05 17:20:58', '2019-08-05 17:20:41', '2019-08-05 17:20:58'),
('f9a34aba-612d-4e16-b5a4-df83c70f9d5f', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snTo04\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-18 04:59:40', '2019-08-18 04:59:40'),
('f9e58891-0226-472e-85cf-1f53c3e9e1ff', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":5,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_id02\",\"user_first_name\":\"kaambul\",\"user_last_name\":\"yusuf\",\"user_station\":\"\"}', '2019-08-08 04:34:42', '2019-08-08 04:19:21', '2019-08-08 04:34:42'),
('f9f8c3ea-19ee-4455-bfa9-fa380665f10d', 'App\\Notifications\\BusDeleted', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img style=\\\"margin-top: 0.9rem; margin-left: 0.7rem;\\\"  src=\\\"https:\\/\\/img.icons8.com\\/color\\/23\\/000000\\/bus.png\\\">\\n                            <\\/span>\",\"message\":\"Deleted bus\",\"data\":\"urt\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 12:04:26', '2019-08-06 03:44:53');
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('fc1d8259-85d3-4320-84ae-de398f838cca', 'App\\Notifications\\AccidentRemoved', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_Deleted animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.7rem; margin-left: 0.7rem;\\\" style=\\\"margin-top: -2%;\\\" src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB\\/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne\\/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds\\/Ukn0\\/xeOV\\/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv\\/GRLOZ75VdD1o0Reo9thz\\/ovA0nn3HMJRhVR5a\\/JM6FRmAFc\\/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC\\/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC\\/wiSOza04k\\/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ\\/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D\\/yDYBrZAOezapDEB2a1y8I\\/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4\\/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE\\/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m\\/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft\\/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==\\\">\\n                            <\\/span>\",\"message\":\"remove accident\",\"data\":\"yews\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', '2019-08-06 03:44:53', '2019-08-05 16:57:12', '2019-08-06 03:44:53'),
('fed8a380-6f82-4d6e-8880-af5d2679b05f', 'App\\Notifications\\Createschedule', 9, 'App\\User', '{\"user_id\":2,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_snFrom05\",\"user_first_name\":\"abokor\",\"user_last_name\":\"Elmis\",\"user_station\":\"\"}', NULL, '2019-08-19 14:58:53', '2019-08-19 14:58:53'),
('ffcf24e7-ffe2-441b-a30b-ccd0ffda65ad', 'App\\Notifications\\Createschedule', 1, 'App\\User', '{\"user_id\":6,\"html_icon\":\"<span class=\\\"circle_created animate_rtl\\\">\\n                                <img  style=\\\"margin-top: 0.5rem; margin-left: 0.5rem;\\\" src=\\\"https:\\/\\/img.icons8.com\\/color\\/26\\/000000\\/overtime.png\\\">\\n                            <\\/span>\",\"message\":\"created schedule\",\"data\":\"Sch_jg02\",\"user_first_name\":\"yusuf\",\"user_last_name\":\"cabdi\",\"user_station\":\"\"}', '2019-08-10 11:55:31', '2019-08-08 05:04:43', '2019-08-10 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 1, 'wlgUzPdl5rDxFogsFhU5qHEbdHrSf1PR', '2019-04-04 10:36:47', '2019-04-04 10:36:47'),
(8, 1, 'gNaAig6TWkwAnCUcYuoCj12YL48YRL0C', '2019-04-06 15:37:19', '2019-04-06 15:37:19'),
(11, 1, 'revX9Oso9wJz52TFxvezbxy33pfxmDqT', '2019-04-06 16:35:41', '2019-04-06 16:35:41'),
(19, 4, 'SEBDXz4xupcusYXTfada5U8IorPVvDV9', '2019-04-07 02:13:23', '2019-04-07 02:13:23'),
(20, 1, 'JVIHpzLDQQPIj8TDwDiECHXUBVVdLGqs', '2019-04-07 04:45:51', '2019-04-07 04:45:51'),
(21, 1, 'bXdtq2vw3QdTYXKvFdzKIKk97AdzCLVN', '2019-04-07 07:51:05', '2019-04-07 07:51:05'),
(22, 1, 'GgmHM8z9k0ncU35Vzw8MRSNJREJpTakj', '2019-04-07 10:05:26', '2019-04-07 10:05:26'),
(23, 1, 'r7lWB5Awq1gbSuD4nIpxpk9nICfgBurg', '2019-04-08 01:32:36', '2019-04-08 01:32:36'),
(24, 1, 'tpNlTEvKWgvGEFxvPGNRjdNMceVQcTIx', '2019-04-08 16:29:11', '2019-04-08 16:29:11'),
(25, 1, '10udh0i8fhxJVSqhp9wWSPS777zMbHKI', '2019-04-09 02:34:41', '2019-04-09 02:34:41'),
(26, 1, '4R9cM5NNj7IhsPRNQeSJBQXMpYgJRCrm', '2019-04-09 14:27:06', '2019-04-09 14:27:06'),
(27, 1, 'LkFuUixzHwlfJRPLPyoc0pa4beKTp43J', '2019-04-10 09:56:08', '2019-04-10 09:56:08'),
(28, 1, 'PLsW4sWxXxSkfcZgBjE2XH6Uq6KsIzVq', '2019-04-10 14:53:13', '2019-04-10 14:53:13'),
(29, 2, '4WLebYyk2WiIJO95QnuqbHINt8ytyJqA', '2019-04-11 02:07:24', '2019-04-11 02:07:24'),
(32, 1, 'Ct49tLaHLBBeKnEjTa4VdZvlGf2meW4H', '2019-04-11 03:27:38', '2019-04-11 03:27:38'),
(33, 1, '5LbeYvoqF86wQ8g7pMxqdLhOo9aOVzPY', '2019-04-11 07:41:23', '2019-04-11 07:41:23'),
(36, 2, '7iy261JxDzLd8KBq423ocwzR3qwq9GIT', '2019-04-11 12:05:55', '2019-04-11 12:05:55'),
(37, 2, 'CwrEHtl6wmgrodNWqczdrDpxQg5N95f2', '2019-04-12 00:45:16', '2019-04-12 00:45:16'),
(38, 2, 'Ca7ppJ4Dw2trRLAxm96RWl9mLMJx8spy', '2019-04-12 10:37:10', '2019-04-12 10:37:10'),
(40, 2, 'uIyP0i0kXodXHxLVLYkhgcaJvvLPjXm9', '2019-04-13 08:42:13', '2019-04-13 08:42:13'),
(43, 2, 'TCiLVYrxDvIoj236easmvNRCa8Txgc9R', '2019-04-13 11:14:35', '2019-04-13 11:14:35'),
(45, 1, 'cq53u5j6zX3wDdly2b7VE2SRnMR782f8', '2019-04-13 17:14:12', '2019-04-13 17:14:12'),
(46, 1, 'mpfmvl0818cT7ZIKrrwzfIJFngfo1Hcm', '2019-04-14 00:21:48', '2019-04-14 00:21:48'),
(54, 2, 'QlgJSSxF7GCrGf9h9aaFLOSJulF9ASnG', '2019-04-14 03:45:42', '2019-04-14 03:45:42'),
(55, 1, 'lfKqpdVikJ2vuXCeTTiXCBNS5kyQk2GS', '2019-04-14 04:14:27', '2019-04-14 04:14:27'),
(56, 1, '1bsJN5cD27MA7qTFOnM7TS1megIzPwPs', '2019-04-14 07:31:23', '2019-04-14 07:31:23'),
(57, 1, 'Binh4msa0UCEM9yBDqcjlyjLSHtBh7b0', '2019-04-14 16:16:53', '2019-04-14 16:16:53'),
(58, 1, 'UVTeFuaDrcIoc5IHrCAtI0lExGhrCfcw', '2019-04-15 00:28:59', '2019-04-15 00:28:59'),
(59, 1, 'GLFUREQwss5S4V14RrkTRNWoxdmoaPy7', '2019-04-15 03:53:57', '2019-04-15 03:53:57'),
(61, 1, 'jxa2i4YWEbktPXKcc00z2egVzPQniInN', '2019-04-16 04:39:36', '2019-04-16 04:39:36'),
(62, 1, 'n7yNQaxjwoL70MNkU5OeZfrN8YNdRRiQ', '2019-04-17 04:35:56', '2019-04-17 04:35:56'),
(63, 1, 'SmxyPcrOBlBGbY9oYwvqTpN7dMNdLSAK', '2019-04-18 02:30:54', '2019-04-18 02:30:54'),
(64, 1, 'nZwpT1JrPmcSJfciQ6AQjjKE3xuHUgys', '2019-04-18 14:47:30', '2019-04-18 14:47:30'),
(65, 1, '0KNtLgMwEEqJDDsmdzfIEp34AneVBuCc', '2019-04-19 03:49:13', '2019-04-19 03:49:13'),
(66, 1, 'dv0b1eCBK9G9FaUtEewriGEgLBEespto', '2019-04-20 10:30:05', '2019-04-20 10:30:05'),
(67, 1, 'Bf4nZ1uhPOaq1u6ziqNwYIoDpL9EaUod', '2019-04-21 11:23:48', '2019-04-21 11:23:48'),
(68, 1, '9m028PYTeruc6XAlEENFZIavfcbV0kJd', '2019-04-23 08:25:25', '2019-04-23 08:25:25'),
(69, 1, 'eOxobTAQYV5nyNKJDvGWwjMknIZZqXlp', '2019-04-25 01:25:55', '2019-04-25 01:25:55'),
(70, 1, '7Td4EEW7n4LpfIzigH8PloNhngme2yPZ', '2019-04-26 03:40:43', '2019-04-26 03:40:43'),
(71, 1, 'QwUgLpMZQAN0MkWlPwMTcFfBbqjVoGql', '2019-04-26 11:57:32', '2019-04-26 11:57:32'),
(72, 1, 'C7DwQVDi0uqHn4J9UhLeHqjsS1iJ4GtZ', '2019-04-26 16:48:10', '2019-04-26 16:48:10'),
(73, 1, 'VTqrdZa8lIf8Q4s3JDhGnb3ZzQwj91n2', '2019-04-27 12:03:26', '2019-04-27 12:03:26'),
(74, 1, 'lKbVTCL8miVCuMtKTWzNzdmwLfV3GuzL', '2019-04-28 02:40:02', '2019-04-28 02:40:02'),
(75, 1, 'uuebhhpvtn6j6ifJcz4PrQGZPv3ajdlg', '2019-04-28 10:13:19', '2019-04-28 10:13:19'),
(76, 1, 'SZeFyZ4EwFF77xO9oODmjlvj2doQAus2', '2019-04-30 12:06:16', '2019-04-30 12:06:16'),
(77, 1, 'LsuogVxGe3ynGNFbpbAGqI06Nxz6aEoj', '2019-05-01 01:26:37', '2019-05-01 01:26:37'),
(78, 1, 'bCmiCYUE94wWwBfnjVYkZ9LaKOnHs9EB', '2019-05-01 15:30:00', '2019-05-01 15:30:00'),
(79, 1, 'TnyS7YRm2XERppak9TEBMHxexo2jnyVF', '2019-05-05 03:05:34', '2019-05-05 03:05:34'),
(80, 1, 'Sphez8k3CHh5nKoGEar7EbVRftAboxNd', '2019-05-05 11:15:01', '2019-05-05 11:15:01'),
(81, 1, 'nI6UErX4Our5BEfSMEEeK6niYXGOoGKR', '2019-05-05 21:30:24', '2019-05-05 21:30:24'),
(82, 1, '0mRjnZ6hbbpSbf3i033Hq1e6GDnVdmss', '2019-05-06 03:41:30', '2019-05-06 03:41:30'),
(83, 1, 'c8yc2U4omb65gdDZHuvT6jF044A51l0b', '2019-05-06 10:35:13', '2019-05-06 10:35:13'),
(84, 1, 'I8qxWADM32Zf1cZnD3WQabZlHKIv0WI5', '2019-05-07 07:02:11', '2019-05-07 07:02:11'),
(85, 1, 'jQjvBMpx1uNYBWkI5bEuWVvlNTNpL4jS', '2019-05-07 10:43:32', '2019-05-07 10:43:32'),
(86, 1, 'VvHwE3hBq9N9eg8g7C0qhYFAkmieXwMk', '2019-05-08 02:39:59', '2019-05-08 02:39:59'),
(87, 1, 'L2yv84SNCN93EvHhhkZ5ZAii88p2Qgk0', '2019-05-09 10:15:54', '2019-05-09 10:15:54'),
(88, 1, 'LCC98k8oZu28QeAWFn6xuxnaa8n5NfKv', '2019-05-10 05:02:27', '2019-05-10 05:02:27'),
(89, 1, 'wCLMmoLqiInvZnV88Od7H4ho3CSz925Y', '2019-05-10 10:09:03', '2019-05-10 10:09:03'),
(90, 1, '1dfUE4xJpaGfN91XzITDH3HBcSX4oUjz', '2019-05-10 14:39:35', '2019-05-10 14:39:35'),
(91, 1, 'akQPirKvDizL0w7ztSy3pJEdorHrUiwa', '2019-05-11 03:43:44', '2019-05-11 03:43:44'),
(92, 1, 'jz59vsBwJmfujNG7mq8AXY0a58pMucXx', '2019-05-11 22:08:18', '2019-05-11 22:08:18'),
(93, 1, 'zj7EEMJFrDHJetii2uFr89Ha28YaE10r', '2019-05-12 13:09:51', '2019-05-12 13:09:51'),
(94, 1, 'XSB1O1m4El2OqAUj92NkjM4KrFS2ksjG', '2019-05-12 23:19:35', '2019-05-12 23:19:35'),
(95, 1, 'FHeqWvAnf8AdsazFIUSEg0ijCnYawoMK', '2019-05-13 02:49:32', '2019-05-13 02:49:32'),
(96, 1, '86dJMvOA11tjSRcUdT00pk8BmsdGIyEd', '2019-05-13 10:04:36', '2019-05-13 10:04:36'),
(97, 1, 'l5kb7jDp5Hj1050I6W8FAtROLbwx6Tyl', '2019-05-13 15:13:09', '2019-05-13 15:13:09'),
(98, 1, 'xpRhAeCS5h4TEH4pFsFDe2iS4K5sXJ0C', '2019-05-13 23:41:16', '2019-05-13 23:41:16'),
(99, 1, 'jLIb1SRH3i03fOJ0pivhd0YiMvlh1qkR', '2019-05-14 11:15:31', '2019-05-14 11:15:31'),
(100, 2, 'BCMIlbDE5l9muwZQTmlrbTjhdI9KEwbw', '2019-05-14 17:20:50', '2019-05-14 17:20:50'),
(101, 1, 'xYAQF1bcbIRLI0RlAWoWZ9XGoZVBd8XM', '2019-05-15 01:21:24', '2019-05-15 01:21:24'),
(102, 1, 'pcZWOKNsHKMSNNPfmcxV0aPreEr287ZC', '2019-05-15 01:21:32', '2019-05-15 01:21:32'),
(106, 5, 'Mj0vkQaoOYXfkeWkNGELUOcOi2jjC4W8', '2019-05-15 06:11:59', '2019-05-15 06:11:59'),
(107, 2, '4W7YNGZdxSlBmjeFmARYgW44Iyx7G320', '2019-05-15 10:21:06', '2019-05-15 10:21:06'),
(109, 2, 'lBV6ZONNFcFKqUS5Hme7mrAts4pviTLM', '2019-05-15 10:59:00', '2019-05-15 10:59:00'),
(110, 2, 'kNCekVobYLccfEDpFHXPeaiNrk7fISFL', '2019-05-15 14:18:34', '2019-05-15 14:18:34'),
(111, 2, 'E3iQ5Tk3LQohjrhJernNxArp3gyrDbZk', '2019-05-16 03:49:10', '2019-05-16 03:49:10'),
(112, 2, 'qFfSo1eiPb0dXWKMlMgF2xHagFauLlIB', '2019-05-16 06:14:55', '2019-05-16 06:14:55'),
(113, 2, 'nT02DcgxNCWVQMZZypFb0yoiOnL0Vrgc', '2019-05-16 10:22:50', '2019-05-16 10:22:50'),
(114, 1, 'jtnUPHRhldX9jBgD9KUpvvZbpD3NWJTj', '2019-05-16 10:43:09', '2019-05-16 10:43:09'),
(115, 1, 'yFAEcZHk1KG1Rth62x9B5Zq4UZANHliR', '2019-05-16 11:27:07', '2019-05-16 11:27:07'),
(116, 1, 'Cg5OMqgwu3zr8QiTNC84t1SOhhWJ05iX', '2019-05-16 11:28:46', '2019-05-16 11:28:46'),
(118, 2, 'eVuzZgWnP4rNlLdQ5pUGN8HZM8EC8Ev7', '2019-05-17 05:07:16', '2019-05-17 05:07:16'),
(119, 2, 'GnHCdBcl9y91HzR1WVPsGgOXyHPg6Nb5', '2019-05-17 10:42:57', '2019-05-17 10:42:57'),
(120, 2, 'WKo34kTD4UG0RL6ecTqBmVS9lMK4yJPI', '2019-05-18 10:15:25', '2019-05-18 10:15:25'),
(123, 1, 'ohafcezAaOSegLCAPey5PgeZbjE4GVaY', '2019-05-18 15:07:19', '2019-05-18 15:07:19'),
(124, 8, 'OGAThoS0noR0UBzrpU9ki6zx5DB0JQ47', '2019-05-18 16:00:07', '2019-05-18 16:00:07'),
(125, 6, 'C060Q1ZW9Eet5oletrSwy6XrmVEqymD5', '2019-05-18 18:36:16', '2019-05-18 18:36:16'),
(126, 1, 'J6PSxEpYGoWxDc8X3opYxeAcVvhhjOlv', '2019-05-18 18:37:39', '2019-05-18 18:37:39'),
(128, 8, 'mUg1KC7SytyoSJHDfUbHD5tlrETeyf3g', '2019-05-19 03:56:46', '2019-05-19 03:56:46'),
(129, 8, 'cgVuIdfo2BgHoxGcrjXGeAGlxswpubGL', '2019-05-19 13:34:38', '2019-05-19 13:34:38'),
(130, 1, 'IJwUoYhwT9i3iadEtmchUHXUkeLXALhN', '2019-05-19 13:38:28', '2019-05-19 13:38:28'),
(131, 1, 'blWwxJjfnqpIYO2Ai8mTYZ1bJ09Ind66', '2019-05-19 18:16:54', '2019-05-19 18:16:54'),
(132, 8, 'NqaZa4mpszUDrj1YreNMhLQTWOnulvWR', '2019-05-20 04:16:20', '2019-05-20 04:16:20'),
(133, 1, 'I3iezDj1nDBnYzmRUoyaNDf09UFX2fZs', '2019-05-20 04:26:08', '2019-05-20 04:26:08'),
(135, 1, 'omjpsXUE2OAyHVCS8qGeOD6Qh6etIxze', '2019-05-20 11:17:11', '2019-05-20 11:17:11'),
(137, 2, 'q7hQpYEHSTZyeIBVY8786q7Nsj9aXRAP', '2019-05-20 13:33:10', '2019-05-20 13:33:10'),
(138, 1, 'ehSli6Op5lHqZ4dIML7u5wGtpZth5RfK', '2019-05-20 16:57:49', '2019-05-20 16:57:49'),
(141, 2, 'oRiMMvS9r2Fd9lxkM1OVW9Fy88iqfPYl', '2019-05-21 08:03:10', '2019-05-21 08:03:10'),
(142, 1, 'Hs6r18cR7lSUb3fKIMoKY4VeBvVHbp2p', '2019-05-21 14:37:37', '2019-05-21 14:37:37'),
(143, 8, 'aXe1ynXoIXmxdrTrUudvTx7Nx0EIVX6B', '2019-05-22 03:29:26', '2019-05-22 03:29:26'),
(144, 1, 'vIbivs051mXOh0NCf0tIQxs0ltqXTOmt', '2019-05-22 03:37:25', '2019-05-22 03:37:25'),
(145, 1, 'rX6rxHeUnnMUCGth9B4bhuiXBkdL1rj6', '2019-05-22 12:53:37', '2019-05-22 12:53:37'),
(146, 2, 'KW5ELq3SnqOl0mWx9VCwaWh0gGnaZB1W', '2019-05-22 12:54:16', '2019-05-22 12:54:16'),
(149, 1, '59bbMKIQP4THvjQlfTrO3EiheiiIRCLr', '2019-05-23 03:48:04', '2019-05-23 03:48:04'),
(152, 2, 'QKG6PBCv4sAyU3sgv3NyAc8U0ioiMsrp', '2019-05-23 05:07:51', '2019-05-23 05:07:51'),
(153, 1, 'IePpMHZuCM8QrX4rSSQbQoFReywINd3b', '2019-05-23 07:05:00', '2019-05-23 07:05:00'),
(154, 1, 'TR9K98l0H7laGdIEtEOfU5Od5xHbBJgR', '2019-05-23 10:44:33', '2019-05-23 10:44:33'),
(155, 2, 'FS9Jqi3sVz7cUrbD8F8NrBzkCbr8RPEI', '2019-05-23 10:45:42', '2019-05-23 10:45:42'),
(156, 2, 'mQL4j2mtzzagiLSbfjjNeSWVtrJb5AaA', '2019-05-23 14:08:19', '2019-05-23 14:08:19'),
(157, 1, 'pVZrDcCVun3mjl24TPIFF11FG2T0tEuM', '2019-05-23 14:08:43', '2019-05-23 14:08:43'),
(158, 1, 'HjX5PRbG6ErfpwKdeJmKdluJZnQz7X8v', '2019-05-26 07:20:15', '2019-05-26 07:20:15'),
(159, 1, 'SWEFo2oelRFP6x4lsNAnbnvjBMaWxoYY', '2019-05-26 10:37:16', '2019-05-26 10:37:16'),
(160, 1, '43O60TLQkkLcDqGa1Pl3QdbuOj9cdzAe', '2019-05-26 15:03:22', '2019-05-26 15:03:22'),
(161, 2, '1cPsat9oxOxwMKb2XTpXkJ8D08Nvt8Il', '2019-05-26 19:18:57', '2019-05-26 19:18:57'),
(162, 1, '4kN0X2Luqykpx1NDLPOiX056lXBD4oxv', '2019-05-27 07:02:53', '2019-05-27 07:02:53'),
(163, 1, 'naQMY7dVh4JwSl1trnVSNmvV3EDGLEZW', '2019-05-27 14:12:44', '2019-05-27 14:12:44'),
(164, 1, 'gGWf4MzQERnQUpIQZZ9E7zwFmxlIr7XV', '2019-05-28 14:13:44', '2019-05-28 14:13:44'),
(165, 1, '8cV8L3Ql5bPmHCrGJ38OzusFo6s3WtaZ', '2019-05-28 17:51:19', '2019-05-28 17:51:19'),
(166, 1, 'fDW19rjqSj0Xmra5C70cldEs3wCGQwQw', '2019-05-28 22:14:22', '2019-05-28 22:14:22'),
(167, 1, '1Pg9N4kPVTXNwSD5lhnmLNeeTzbL5xht', '2019-05-29 03:41:42', '2019-05-29 03:41:42'),
(168, 1, 'rDfbydy13rBaqGAuR3ACoilLkrwg43CQ', '2019-05-29 13:11:52', '2019-05-29 13:11:52'),
(169, 1, 'c6nMfc9Rh9gn5fhs4dqRXvPqfrDY2iYN', '2019-05-30 05:08:56', '2019-05-30 05:08:56'),
(170, 1, 'ouEOOyckIOSkahZfQ9t6wLQ8sdOfMgBA', '2019-05-30 11:10:12', '2019-05-30 11:10:12'),
(171, 1, '0gYaTR9EV8XSHeDDtxrRoVT0pv1iLqg6', '2019-05-31 11:55:03', '2019-05-31 11:55:03'),
(172, 1, 'uS5H7VLZ9oIuBLd9u621p4BWnYcRAAYi', '2019-06-01 03:24:57', '2019-06-01 03:24:57'),
(173, 1, 'bZMKcCC0eBS5aGy3UM7zK8Rhxt48uHrH', '2019-06-01 07:14:23', '2019-06-01 07:14:23'),
(174, 1, 'Cnk8Da0n939JUUAHWMZYGi2Yv6J0eux5', '2019-06-01 12:02:48', '2019-06-01 12:02:48'),
(175, 1, 'CKpvm9jjxNrDCDjWN3y61sYoKeFpR0S0', '2019-06-01 18:23:56', '2019-06-01 18:23:56'),
(176, 1, 'CwbFNogKf0ZVW1w2XD5GlKZssqXpCexm', '2019-06-02 04:21:25', '2019-06-02 04:21:25'),
(177, 1, 'pSHJ84R4CPHnux0juRXtreb1F6NFXHam', '2019-06-03 18:50:01', '2019-06-03 18:50:01'),
(179, 1, '0l4vhwdGbR3saQeyRCtBZXZOvqQ1HoZ2', '2019-06-05 11:38:05', '2019-06-05 11:38:05'),
(183, 2, 'Q1c5n0VABdara6Y5Zn4xtl7uij2aKWnF', '2019-06-05 13:54:01', '2019-06-05 13:54:01'),
(184, 1, 'u9IM77I6GB3x723SrifaddaKjNklRWaQ', '2019-06-05 17:30:03', '2019-06-05 17:30:03'),
(185, 1, 'xi2sDkJ8HYoHHYhecGrCz5FDN99sHtb8', '2019-06-06 03:38:58', '2019-06-06 03:38:58'),
(186, 1, 'b7xhjJ2Jjr86VKUsYmeCcIBQOOzIViOw', '2019-06-06 10:46:44', '2019-06-06 10:46:44'),
(188, 2, 'mwaUH6Fzdg8cmFjZVjBystKn7LVPcvvu', '2019-06-07 11:25:42', '2019-06-07 11:25:42'),
(189, 1, 'DH4LMiaMY4Nb9A84F2siDb6cy47JVNK4', '2019-06-07 11:53:43', '2019-06-07 11:53:43'),
(190, 2, 'D6GMiZJvKbF6QLWjH4Yg8qwvfsOTaSYp', '2019-06-08 04:42:22', '2019-06-08 04:42:22'),
(191, 1, 'cl0jBtzYG6YcxudBEYvS5StRVDDXjPBD', '2019-06-08 05:43:38', '2019-06-08 05:43:38'),
(192, 1, 'L174f6yIiC0dhX3aKOh44HSJcsa3ZgLj', '2019-06-08 08:04:04', '2019-06-08 08:04:04'),
(193, 2, 'Mezfcc9htpJ1GtDgNGVVmneslxld21Gj', '2019-06-08 10:25:07', '2019-06-08 10:25:07'),
(194, 1, 'msshJkEQKzYwcbtCTJWMN22ZV98aQTGU', '2019-06-08 10:25:18', '2019-06-08 10:25:18'),
(195, 1, 'c7PfcpHKWakehJmB4lpBvW1JYuoXnGZs', '2019-06-08 11:59:11', '2019-06-08 11:59:11'),
(196, 1, 'FBLLszVo5zQDl20gp7uZnctn9GHhlOLq', '2019-06-08 15:17:33', '2019-06-08 15:17:33'),
(197, 1, 'lUXeBW2xzWe0mVLggWfRzebwmWxovsgI', '2019-06-09 01:47:06', '2019-06-09 01:47:06'),
(198, 2, 'pov5AbUwk4NDtbnZHdQUpMzQbsZ020uR', '2019-06-09 01:47:26', '2019-06-09 01:47:26'),
(199, 2, '6ytJg5BNjPJ0H4CWJnt8f9IEBOJEpjY8', '2019-06-09 11:02:08', '2019-06-09 11:02:08'),
(200, 1, 'UabtuNwTBHBellSpofKS1mMv5dVJUuxE', '2019-06-09 11:02:15', '2019-06-09 11:02:15'),
(201, 2, 'QRudo7B5KXvqkFaLdRzPvbZzGAY3otOq', '2019-06-09 15:12:08', '2019-06-09 15:12:08'),
(202, 2, 'DtZdo7GVlslTCrt5PjME1AOrFfWEt0Hr', '2019-06-10 02:21:50', '2019-06-10 02:21:50'),
(203, 1, 'Krb4DOmV887MRyVZGpujKEPbjv2Ab00A', '2019-06-10 04:48:20', '2019-06-10 04:48:20'),
(204, 2, 'g35TMA92yD0kAvlm9pollp5pkB7h5idM', '2019-06-10 10:27:51', '2019-06-10 10:27:51'),
(205, 1, 'g5q2OaAwZNJKtR8pyeGstAsmKvszrEXG', '2019-06-10 10:39:05', '2019-06-10 10:39:05'),
(206, 1, 'IeTGtOAcerIwClWZQqKhXHl1uDOBC9Jo', '2019-06-10 15:42:53', '2019-06-10 15:42:53'),
(207, 2, 'ehRNVcPPn0bULyi3vjFF2yUOtGQ6hn4O', '2019-06-11 11:44:19', '2019-06-11 11:44:19'),
(208, 1, 'ue7bFAkNYPEYlFpon946syRwGLXFhyxJ', '2019-06-11 17:07:01', '2019-06-11 17:07:01'),
(209, 2, 'v3fiQ723GOmqRENg1lCZFrGngAOHzbvQ', '2019-06-12 10:55:39', '2019-06-12 10:55:39'),
(210, 2, '1wYbP55nb6ejaL2mWBxEWRriFIVhV4aY', '2019-06-13 01:55:57', '2019-06-13 01:55:57'),
(211, 1, 'Dzy3yiiQB2GdAJXNeyaovwrA7AlQtE9R', '2019-06-13 02:43:20', '2019-06-13 02:43:20'),
(212, 2, 'atdfwE3q9Io2yUiE85DIOQ0OBjevSxzH', '2019-06-13 10:41:05', '2019-06-13 10:41:05'),
(213, 2, '3rE7xRgTvB5YcgbOk4cg8u2L5Bs4SgVD', '2019-06-14 11:28:24', '2019-06-14 11:28:24'),
(214, 2, 'kYVAXzEHJPfnBn01OZXA0wsFDdEK4k55', '2019-06-15 03:26:25', '2019-06-15 03:26:25'),
(215, 2, 'LHMvQdNhIkCkWMpgTR2c62iIUgq7Hifq', '2019-06-15 16:53:23', '2019-06-15 16:53:23'),
(217, 1, 'bHgpCnvJaVWkLkon2LUlco7Wwa9eaXIY', '2019-06-16 03:25:03', '2019-06-16 03:25:03'),
(220, 1, '3EhQRNlwYfT9uplbZSP7Su4yX7Lczr8q', '2019-06-16 06:05:17', '2019-06-16 06:05:17'),
(221, 1, 'fmTrFPi2p5w3Ldwm4dVD4aLsk8wobyC4', '2019-06-16 11:02:59', '2019-06-16 11:02:59'),
(222, 1, 'vS8m7bCEVRvc9aacz4EVhtRkqT0SEqRJ', '2019-06-16 16:17:48', '2019-06-16 16:17:48'),
(223, 1, 'FWQHRiOvVRRg9i2YDZLpXWG7QFZPMx7z', '2019-06-17 02:27:44', '2019-06-17 02:27:44'),
(224, 1, 'X4JihxUf3sJPvZrVZymObIxy7nroZNyg', '2019-06-17 15:56:24', '2019-06-17 15:56:24'),
(227, 5, 'y3kgs8fvvZBV0nJliNkboXP9sfQZ9son', '2019-06-17 16:32:42', '2019-06-17 16:32:42'),
(228, 1, 'CZUQLdMvsjGoKkaffMST00Cpk5r58zU1', '2019-06-18 02:48:53', '2019-06-18 02:48:53'),
(229, 2, 'Zvh84rIRWDuYI37IsI7IYX0Jc4EspAtR', '2019-06-18 02:50:06', '2019-06-18 02:50:06'),
(232, 1, 'jgyEvVC0O2KPqn5hFItkK0zS29G36lgd', '2019-06-18 10:27:04', '2019-06-18 10:27:04'),
(234, 6, 'QOoC2bWCHwUlTG90fmkoUJhIR9v5KNmS', '2019-06-19 08:00:12', '2019-06-19 08:00:12'),
(237, 1, 'AByGULLANnRC3MfDBPLE3KlcZHd35nVo', '2019-06-21 03:28:34', '2019-06-21 03:28:34'),
(240, 1, 'LAZffQFRbx1mVgtShoMh1wAdx5NowPZs', '2019-06-21 16:50:09', '2019-06-21 16:50:09'),
(241, 1, 'qFAw1du1Aq2gXuKAh1yZYVvPIACCwNGV', '2019-06-22 02:59:31', '2019-06-22 02:59:31'),
(242, 1, 'tkfJd8JneUYMfBmNzQ476OMAuuiUF4qe', '2019-06-22 05:44:36', '2019-06-22 05:44:36'),
(243, 2, 'gFviuXCyfLkvRfaYeCqH5XMq3i3xXyMM', '2019-06-22 06:05:51', '2019-06-22 06:05:51'),
(244, 1, 'Zx582cGC9wxh91XZgKeLz5RujX4NLrJ2', '2019-06-22 09:46:03', '2019-06-22 09:46:03'),
(245, 1, 'aCAo9AlPX3HRFo1ZP0jCf4sNmR4DDDkd', '2019-06-22 16:51:27', '2019-06-22 16:51:27'),
(246, 1, 'G7rukdGxIoJz8KsWzztb0g2lOcIfrsVT', '2019-06-23 02:48:07', '2019-06-23 02:48:07'),
(247, 1, 'gd4Gilcb30VDIIo3R0UeNzZIDq1LPCJ6', '2019-06-23 10:17:10', '2019-06-23 10:17:10'),
(248, 2, 'qUGreV33jgdpA4QQCh3szq708URurQ7n', '2019-06-23 11:42:45', '2019-06-23 11:42:45'),
(250, 2, '3J9SnZQu7bzZOP9KQNDIltE5ESDSrA57', '2019-06-23 16:31:51', '2019-06-23 16:31:51'),
(251, 1, 'lmB00qfJnqnx1q7OAfMSHTcslTeb9tP0', '2019-06-24 10:51:05', '2019-06-24 10:51:05'),
(252, 1, 'ZsBo1PeFYInDculXPFhqIXTrPGnUH44g', '2019-06-25 03:08:28', '2019-06-25 03:08:28'),
(253, 1, '0FtobxhItgnmszQDFM3pgzQ33lCfqibT', '2019-06-25 10:48:49', '2019-06-25 10:48:49'),
(254, 1, '0ym5jhHB3saNPSeSdhDaHoeioZehuJXH', '2019-06-26 02:29:25', '2019-06-26 02:29:25'),
(255, 1, 'D58U2cwPQ334b4OKxsYw4IVbraT9MNRz', '2019-06-26 11:29:06', '2019-06-26 11:29:06'),
(256, 1, 'iZeCmeezBHLD4zOnXr4b7V0XL0G3r03b', '2019-06-27 03:34:50', '2019-06-27 03:34:50'),
(257, 1, '9CyIcQq5Tv9aOSxKJoLlsZYY4JubmTEb', '2019-06-27 10:33:01', '2019-06-27 10:33:01'),
(258, 1, 'suKIYTZmBMv8xoqB3dGucEIFKevlyvTQ', '2019-06-27 13:45:59', '2019-06-27 13:45:59'),
(259, 1, 'GHEtn8xnukRA3GBfJgwDaknCRta1TzLX', '2019-06-29 03:02:40', '2019-06-29 03:02:40'),
(260, 1, 'bFosIAojSKKkqLgy3HEyfPGhnqeqm9QG', '2019-06-30 01:22:31', '2019-06-30 01:22:31'),
(261, 1, 'N5FtUcDq9RA2mF2iXmZT8LM2MRqqHCkD', '2019-06-30 10:39:32', '2019-06-30 10:39:32'),
(262, 1, 'NSH9u0aUf2AeeeTai04AoibC1qLHcTfx', '2019-07-01 12:11:23', '2019-07-01 12:11:23'),
(263, 1, 'tojDB2tzghIedohKoZXSB3gJw1Fxht0v', '2019-07-02 02:42:54', '2019-07-02 02:42:54'),
(264, 1, 'ARzPEmDEGHrYmAbuEEqIt9C7wcVnDwKa', '2019-07-02 11:49:40', '2019-07-02 11:49:40'),
(265, 1, '7HhTmQYh4xA71F57kwhobXU5qJj8NB8m', '2019-07-04 13:15:26', '2019-07-04 13:15:26'),
(267, 2, 'n1dByLDbT0aZqYJ6dG4EVJlRImf66h9l', '2019-07-05 14:40:52', '2019-07-05 14:40:52'),
(268, 2, 'nc2O2cgiOGCGVsZKlE9GB3C8M4UPvMDr', '2019-07-06 03:01:07', '2019-07-06 03:01:07'),
(269, 1, 'JO26YXjch0AMAxlapq51nrD9ChtDY2H3', '2019-07-06 05:10:06', '2019-07-06 05:10:06'),
(270, 2, 'fVrFq2b7ZDlTfsBexbeEOvCCLSMcFbzJ', '2019-07-06 05:13:43', '2019-07-06 05:13:43'),
(271, 2, 'lVDuEa2kCIILW5u4wuJO3RblpdGdSUbA', '2019-07-06 11:42:58', '2019-07-06 11:42:58'),
(272, 1, 'IG9ldlfODaECjMBI5UkHFrQUsU0g3FSc', '2019-07-06 11:50:57', '2019-07-06 11:50:57'),
(273, 2, 'OzR9jdJGqJHND2yL6zsN0yGaoVxW5Ioy', '2019-07-08 11:50:17', '2019-07-08 11:50:17'),
(274, 2, '89XlaLbmMyb8hhKy7KkxKFVemkBh6LGT', '2019-07-10 03:47:37', '2019-07-10 03:47:37'),
(275, 2, 'QWznLfnS90060XOxRDs6AMNNc4OdqKvQ', '2019-07-11 10:55:10', '2019-07-11 10:55:10'),
(276, 1, 'VzIJqUrCHISfA1UvCibGrawfwPIiYOVZ', '2019-07-11 11:38:33', '2019-07-11 11:38:33'),
(277, 2, 's7OSjI0TjnKmeDEB9wUI1r6RnCikaz0v', '2019-07-12 10:42:16', '2019-07-12 10:42:16'),
(278, 1, 'sRa0jhKcjcxzLYC8z8ry6hRCVtWggTTI', '2019-07-12 11:03:04', '2019-07-12 11:03:04'),
(280, 2, 'a35pfIFKWwJvjQdGMRKcnim9OarxwKKA', '2019-07-13 02:28:10', '2019-07-13 02:28:10'),
(282, 1, '7FCYJPsEvEbxeFMJYmQryI6vOagizFGD', '2019-07-13 10:37:47', '2019-07-13 10:37:47'),
(285, 2, 'Dq8vyTfHO7tuuMy0TzkzoQ1JJs9Qlvo3', '2019-07-13 15:16:19', '2019-07-13 15:16:19'),
(286, 1, 'CgUN8EAGsSBgSgF06Gbhs2fGT1i6hVOC', '2019-07-14 03:09:35', '2019-07-14 03:09:35'),
(287, 2, 'N7syEdMsRbdOq9eVi7W5ZdJRaxM480on', '2019-07-16 02:23:17', '2019-07-16 02:23:17'),
(288, 2, '3dDOIBpwTEnYejqC8wuExCcJgQlA0aec', '2019-07-16 10:51:17', '2019-07-16 10:51:17'),
(289, 2, 'dx1hw5t3mrVKU9bDUSNs8zkr021lJjNw', '2019-07-17 02:40:34', '2019-07-17 02:40:34'),
(290, 2, 'uk6Wo7mFImD081UK9rQRWPJQWmTRLFqm', '2019-07-18 02:04:20', '2019-07-18 02:04:20'),
(291, 2, 'zAPbPbxCT4X5LKfHEKaaUpYp8Qb6jaOP', '2019-07-18 10:38:00', '2019-07-18 10:38:00'),
(292, 2, 'FARotaX8yryv8ZmFmFBSkow3ioAjdI4v', '2019-07-19 07:18:18', '2019-07-19 07:18:18'),
(294, 1, 'Imm9ib5HdiTxBnvSAt4wFe36XC5YmrHy', '2019-07-19 10:32:55', '2019-07-19 10:32:55'),
(299, 2, 'jwzi8IUC6bprYMr4fyJ4D046egRz3qLM', '2019-07-19 12:02:09', '2019-07-19 12:02:09'),
(300, 2, 'fSSEyaQwkhSoM3BZBzO02SKNbmJE3jy4', '2019-07-19 16:11:41', '2019-07-19 16:11:41'),
(301, 2, 'ZyJYHEbdK2KMxr3nn2DQrvW96WIvtuOR', '2019-07-20 03:31:45', '2019-07-20 03:31:45'),
(302, 2, 'FOngLLCNQ3iB0P0lW6SwekvTFeqcMBQM', '2019-07-21 03:28:36', '2019-07-21 03:28:36'),
(305, 1, '9VZnqwAC7NM0KOJ7R5j2XAtcKV87WoHw', '2019-07-21 05:08:38', '2019-07-21 05:08:38'),
(307, 2, 'WbSKezZXN2ew7PrMJmDtEQpfhkgOgJwk', '2019-07-21 10:36:59', '2019-07-21 10:36:59'),
(308, 2, 'jRX1HtGL57TG7dIsWkM3Lo1g0Szgeswy', '2019-07-21 15:50:31', '2019-07-21 15:50:31'),
(309, 2, 'JMmrPae75R4oRnJboj6YCe275Pw8N0Yi', '2019-07-22 03:29:57', '2019-07-22 03:29:57'),
(310, 2, 'zwcF4h0pM0oS1r3RSOg4KkoWaD6A20HG', '2019-07-22 08:33:39', '2019-07-22 08:33:39'),
(311, 2, '2IAqDmCaMge4g5OABnGruvY11ZiFugep', '2019-07-23 05:01:18', '2019-07-23 05:01:18'),
(312, 2, 'lIhJIZarrY9ZhvrH1VfCCwfKF02nxBFY', '2019-07-23 11:30:26', '2019-07-23 11:30:26'),
(313, 2, 'PvubYCY7yJLSAZujFhaWaN5Vh49f3fN9', '2019-07-24 04:00:27', '2019-07-24 04:00:27'),
(314, 2, 'jEeNsnG2XNuP7qYdgpjDXi6Fxiya2At3', '2019-07-24 10:50:38', '2019-07-24 10:50:38'),
(315, 2, 'dffG7kMCXBVSdmkkAAglTjCiB5KWishv', '2019-07-25 04:49:41', '2019-07-25 04:49:41'),
(316, 2, 'ScnvrY1Jq4IKzeepBg7yNZvKHRcamZc0', '2019-07-25 10:16:55', '2019-07-25 10:16:55'),
(317, 2, 'EIIuMK1nzJi8UFIpVm5gseFFpMh09PEI', '2019-07-25 13:39:00', '2019-07-25 13:39:00'),
(318, 2, 'OaiZaUYz4p06oH0LLjzm6EuEX7S7VKbs', '2019-07-26 04:35:52', '2019-07-26 04:35:52'),
(319, 1, 'wtIibsKGCf1spez79pZiFT5ub63UF96h', '2019-07-26 05:21:01', '2019-07-26 05:21:01'),
(320, 2, 'zxK0fHxbKFauxNHey9uEsFwHOen7FAJ7', '2019-07-26 10:46:48', '2019-07-26 10:46:48'),
(321, 1, 'abtsDbLHLGQDbe0CGRGuplp5HJk9MxUX', '2019-07-26 11:23:07', '2019-07-26 11:23:07'),
(322, 1, 'z05wqBhMiiCrKXJMdsfNUe2fTtSriaoJ', '2019-07-26 15:26:20', '2019-07-26 15:26:20'),
(323, 2, '2jGeigx4Yj8RO9Wyenve5YZSRxz26ORL', '2019-07-27 02:22:38', '2019-07-27 02:22:38'),
(324, 2, 'WZ1OHSR1iuJQioIigF0tEo0pH8CbhqbS', '2019-07-27 10:38:13', '2019-07-27 10:38:13'),
(325, 1, 'hjF5GEAAEnKcYRmMpUvuPIHKL4Fq8TsH', '2019-07-28 06:29:20', '2019-07-28 06:29:20'),
(326, 2, 'BdJFxewH9kdQuXByRHWigVzIWWbp2zv8', '2019-07-28 06:33:19', '2019-07-28 06:33:19'),
(327, 2, 'Wg9rmvftBUH1RWrz7upPxONmprODzN6Y', '2019-07-29 03:15:45', '2019-07-29 03:15:45'),
(328, 2, 'FoP7NQ6XqnNkz29VRBvO2BhANWiBPDDD', '2019-07-29 10:41:54', '2019-07-29 10:41:54'),
(329, 2, '59OIzPUulX14Zmc8yiYX9YF7v9GMOPHy', '2019-07-29 16:20:31', '2019-07-29 16:20:31'),
(330, 2, 'nThYmzdjqnlRmo3TqMJ4wa6ZQ1pgFAuk', '2019-07-31 17:18:57', '2019-07-31 17:18:57'),
(331, 2, '2S1wv05vXb8Rf72zFXxyb29jtvm1gEkg', '2019-08-01 11:42:31', '2019-08-01 11:42:31'),
(332, 2, 'wKTUHWe42sauGKGGmXo0Y7L5p4PmLFp5', '2019-08-02 03:43:02', '2019-08-02 03:43:02'),
(333, 2, '4HgXaNxRl8hH9NtVwJhDJW2heYFdXigN', '2019-08-02 10:58:04', '2019-08-02 10:58:04'),
(334, 1, 'q9bvYyJshf82IV0n2LIK4MrHnqRzagBb', '2019-08-02 15:46:36', '2019-08-02 15:46:36'),
(335, 2, 'o25B9FNFp3QzwwazjzlzVGqmW4STevSo', '2019-08-03 02:44:26', '2019-08-03 02:44:26'),
(336, 1, 'iJRx9RTi8lVRIO7wD7T84UI8P3q8oywL', '2019-08-03 03:01:47', '2019-08-03 03:01:47'),
(343, 2, '8UEPgOKb1CmZPCDJkBFKXOvaFzt1uAjv', '2019-08-03 15:38:47', '2019-08-03 15:38:47'),
(344, 2, 'pvTMRC3JkTNCpZNH9IhfmLlLe94kgnUD', '2019-08-04 03:23:43', '2019-08-04 03:23:43'),
(348, 1, 'rHq6hICjUqehebjKVjAzoGLVE5aUyEzM', '2019-08-04 07:48:43', '2019-08-04 07:48:43'),
(350, 2, 'SjPQUXqCklxK8gACy5j9iVf3UYpanyou', '2019-08-04 10:37:17', '2019-08-04 10:37:17'),
(355, 1, '0OEfxJSOYRtDUxEBzSVFDZkhqK5wEADk', '2019-08-04 11:14:20', '2019-08-04 11:14:20'),
(356, 2, 'ijPa8nPz8Y7AKXonKkVfDgnFJFGO8aRl', '2019-08-04 15:18:46', '2019-08-04 15:18:46'),
(357, 2, 'akEUKDLLjuKhMKPPwz2NiDfuUBfbrD81', '2019-08-05 03:19:36', '2019-08-05 03:19:36'),
(358, 1, '9xMUd5PYUHL7uSx40Nt9ZzyyviHJEfWO', '2019-08-05 03:20:05', '2019-08-05 03:20:05'),
(359, 1, 'FHOyztU1jGsFOzP22zcRRRhLScvyZ8wk', '2019-08-05 05:44:51', '2019-08-05 05:44:51'),
(360, 2, 'YFaVwinlD1kxxeGxpZJBOkLmlMwdJQeW', '2019-08-05 06:16:39', '2019-08-05 06:16:39'),
(361, 1, 'jiieEhFm8M18AXtejO0jLoneHkYhhJ4V', '2019-08-05 07:48:12', '2019-08-05 07:48:12'),
(362, 1, 'hrn5QMdxc5yvO21gCxabUOZaECdZHB59', '2019-08-05 09:27:17', '2019-08-05 09:27:17'),
(369, 1, 'vcmEZrm3p5zIQziKlRcVDuj4HF8aMUrU', '2019-08-06 04:04:30', '2019-08-06 04:04:30'),
(370, 5, 'g0hOfIVBdU0v9sVcGcXMshZ8hkFDydZH', '2019-08-06 04:06:44', '2019-08-06 04:06:44'),
(373, 5, 'FHEJ1A8vDqPl32VpJ2TpI6iGBS29Llbc', '2019-08-07 04:09:20', '2019-08-07 04:09:20'),
(374, 2, 'q7hTLAjsrQNSYIIa50RgXy2PY45lQV0f', '2019-08-07 04:37:41', '2019-08-07 04:37:41'),
(378, 6, 'nZslrtcVxrehmiald6qP7WU6Gy93QQ5C', '2019-08-08 05:02:33', '2019-08-08 05:02:33'),
(380, 8, 'EmztB2OXoMePWzSwwSbidc3O2bAyTp2I', '2019-08-08 05:16:59', '2019-08-08 05:16:59'),
(381, 1, 'ff2IgJvj2foaSA0NsrnqEzxWp3qIYlUQ', '2019-08-08 10:40:28', '2019-08-08 10:40:28'),
(382, 8, '359w6xsbxx0Vd4pID3DaaiEEKKW2uQzP', '2019-08-08 10:40:57', '2019-08-08 10:40:57'),
(383, 5, '3muZJqVNwIcmMCwYxzZiqhPpyX5oxDdW', '2019-08-09 02:45:04', '2019-08-09 02:45:04'),
(384, 1, 'u2b4UbZMPOsDae9OxusP2AGgsMZbfkTg', '2019-08-09 03:58:45', '2019-08-09 03:58:45'),
(386, 2, '0Zc2ORsyPWhEy8tKEdbT2xMdjiTHYWBe', '2019-08-09 13:27:50', '2019-08-09 13:27:50'),
(387, 2, 'k6dTGP2pgdaNYVBLVqX82js6Q9ZcOlHB', '2019-08-10 02:50:20', '2019-08-10 02:50:20'),
(392, 2, 'fCmUII6VSXb9Mw6PiHkQmwcU4H7NrEzx', '2019-08-10 14:39:59', '2019-08-10 14:39:59'),
(393, 2, 'Vq7qM1eWAvSbTpHgcMTsbFPJjce4a3rx', '2019-08-12 04:51:34', '2019-08-12 04:51:34'),
(397, 1, 'VdV47v46ItLfcpCO3xekydm8liF2BoDe', '2019-08-12 11:12:30', '2019-08-12 11:12:30'),
(398, 1, 'K1l1r1XGA6LtY052DMCPYK8ll4DO0mU8', '2019-08-13 03:38:15', '2019-08-13 03:38:15'),
(402, 2, 'QI0MlUBbxhbMzFpSRwVm4sqSv1UqGt6Q', '2019-08-13 15:57:48', '2019-08-13 15:57:48'),
(403, 2, 'CvKs2Ayh3iMDFqcTTPr60y1NCLxmr37A', '2019-08-15 05:45:14', '2019-08-15 05:45:14'),
(404, 2, '6D6lSRoWJsOf3uuRdbfSx6EoQb5La4os', '2019-08-16 04:07:34', '2019-08-16 04:07:34'),
(408, 1, 'r1PvTcAJmohWkYJ5oZyZKG2qFgJRdtJq', '2019-08-16 17:41:53', '2019-08-16 17:41:53'),
(409, 1, 'ayQPhTXtwGDOLH3PWQ3vsFRrTgLtGWHM', '2019-08-17 02:07:25', '2019-08-17 02:07:25'),
(412, 1, 'CJxz1i2I2xzqzYXkwPDNnpmL9Njk5v8J', '2019-08-17 05:24:43', '2019-08-17 05:24:43'),
(416, 1, 'C0W6R022hR8jd0OramlKqx4GnYo7ikN1', '2019-08-17 11:41:26', '2019-08-17 11:41:26'),
(421, 1, '1strSBKjw8BD2BgxLNM0NKIT2ZLULeKg', '2019-08-17 20:41:37', '2019-08-17 20:41:37'),
(422, 2, 'SSSOMlyTREmsmCIZpDYMVCwAxR6nXzb1', '2019-08-18 03:24:48', '2019-08-18 03:24:48'),
(423, 2, 'P0g8EukSuYFxoI0R7uGEMJNJIxD2QDhj', '2019-08-18 16:41:31', '2019-08-18 16:41:31'),
(425, 1, 'VvOu7p43VkILulB8TRWAQJkjYdi0DIaP', '2019-08-19 17:30:48', '2019-08-19 17:30:48'),
(426, 2, 'wHzAta8vlEjeteGrl00gTGcSPv3kkB0P', '2019-08-19 18:09:48', '2019-08-19 18:09:48'),
(427, 1, '5SImKEiV2ItyID13GaLry9GHhKKIhdoH', '2019-08-20 04:06:50', '2019-08-20 04:06:50'),
(429, 1, 'yi96f81FJBYwS2Gx8RN2wQgTb5hEPCxW', '2019-08-20 14:24:14', '2019-08-20 14:24:14'),
(432, 10, 'YmDfjZ1fxLdp3fponKrofLXqcD3b0rsW', '2019-08-20 14:58:34', '2019-08-20 14:58:34'),
(434, 2, '8AvGLPQjCYU0tiQVpnMKJTR8Wsu9BRqL', '2019-08-20 17:26:58', '2019-08-20 17:26:58'),
(435, 12, 'BxNFnNIKnO5ngVXnbx3BblWinmnGxZSL', '2019-08-20 18:02:38', '2019-08-20 18:02:38'),
(437, 1, 'FzaPGs5AKrPXIRpKfuloNGIHxFtsb6uS', '2019-08-20 21:13:28', '2019-08-20 21:13:28'),
(441, 1, 'gWY8PohfEwBizcUswii5vEW6ptSJTyvZ', '2019-08-21 11:58:24', '2019-08-21 11:58:24'),
(444, 13, 'lKnUDXbDvhL0vY0hZRWSURjuRo1AYBMs', '2019-08-21 12:06:33', '2019-08-21 12:06:33'),
(445, 1, 'x0OvnOmOZGip0VLxy3GJuymgfF7kYpCu', '2019-08-23 02:43:24', '2019-08-23 02:43:24'),
(446, 1, '3fZXbRPyRIPvrhBeyZGbOmDKLt5f6aM7', '2019-08-26 02:00:33', '2019-08-26 02:00:33'),
(447, 1, 'Ehfxu3uMtiPbdWNhIpRCiNGPxRN4Ins4', '2019-08-27 02:34:59', '2019-08-27 02:34:59'),
(448, 1, 'ebbpvNOlO1WBPth4TBMYCpKPbNBFAxtA', '2019-08-27 07:30:34', '2019-08-27 07:30:34'),
(449, 1, 'k9569suVNrX1EQW4GHEb9t4aeLPsjarJ', '2019-08-29 03:22:02', '2019-08-29 03:22:02'),
(450, 1, 'Lzf9oB6wFfuF6crpmlLTmXrOUJV5UBLt', '2019-08-30 16:42:29', '2019-08-30 16:42:29'),
(451, 1, 'RslHteHcFOdi8XDj0gESlWn9zMpaQUWF', '2019-08-31 04:02:53', '2019-08-31 04:02:53'),
(452, 1, '7QBxaGshdwf22BLOFIzkV3451fmu9aeA', '2019-08-31 11:38:12', '2019-08-31 11:38:12'),
(453, 1, 'Gc66jrtlQ4IDlw5fgOuOLaGZL94RyHQ8', '2019-09-01 02:38:23', '2019-09-01 02:38:23'),
(454, 1, 'bLggS4smqwxlnqkc9isXbPZRIw3sDXjf', '2019-09-01 10:29:47', '2019-09-01 10:29:47'),
(455, 1, 'eIwv0ROBV9v1VwC6ORLEv4iQecwnvrxW', '2019-09-01 14:00:50', '2019-09-01 14:00:50'),
(456, 1, 'PNYN2PsLjcEMSkZmq03BMpiLFeARqs0y', '2019-09-01 15:21:31', '2019-09-01 15:21:31'),
(457, 1, 'PWSUEiz5t8EJyo0M5tZ1w63HfLfcpyoK', '2019-09-01 15:42:13', '2019-09-01 15:42:13'),
(458, 1, 'n2QoOTy5zJHtMAz7RWQDsGQvqcXUX8rb', '2019-09-01 17:57:12', '2019-09-01 17:57:12'),
(459, 1, 'Mt2fSVr5HJ4twJonSVMyZf55vcOS6KL7', '2019-09-02 05:37:56', '2019-09-02 05:37:56'),
(460, 1, 'fOCBIMIgGzDeNS62Cu1Qg0GWEqQsElkc', '2019-09-08 18:44:54', '2019-09-08 18:44:54'),
(461, 1, 'CgxaVZo3FG2GlINbllD1pI5ooOrnqqeh', '2019-09-14 17:13:24', '2019-09-14 17:13:24'),
(462, 1, 'W2yiKyNNhSkAXlSGgkv0itzH4rWXcatj', '2019-09-15 06:06:11', '2019-09-15 06:06:11'),
(463, 1, 'U9RAzM1D6gJUkhDJsdQW1QcFyI9zY8Oy', '2019-09-15 17:15:19', '2019-09-15 17:15:19'),
(465, 1, 'DMCKucdY8bYBmad42EpwTFOtdfz4RpKh', '2019-09-16 07:02:34', '2019-09-16 07:02:34'),
(468, 12, 'ftPfL5JVHa8LRQeQNDdr0vWKdQ0gqncD', '2019-09-16 14:28:47', '2019-09-16 14:28:47'),
(470, 1, 'kfBJSysBCbB0v9rjdwYcRg9yRSio3WmH', '2019-09-16 15:14:27', '2019-09-16 15:14:27'),
(471, 12, 'x00aaPxxRGhUMccKyOjviA1EG6E9x1ll', '2019-09-16 15:36:54', '2019-09-16 15:36:54'),
(472, 1, 'HMWpKlJEUoSOqpJtVyu9SYz4FXXYhG8N', '2019-09-17 06:23:12', '2019-09-17 06:23:12'),
(475, 1, 'C0OHFTlL9lacUA4iJMAtTeStS9GWEHk9', '2019-09-17 13:50:38', '2019-09-17 13:50:38'),
(476, 1, 'yli6xujENDDLP0QKAUgcu7e2SqVF08en', '2019-09-17 21:07:46', '2019-09-17 21:07:46'),
(478, 12, 'j6ffBGbjf5Niizqr7pxjsQUTCcbpQ1ZS', '2019-09-18 07:44:38', '2019-09-18 07:44:38'),
(479, 12, 'Tykk9lWWuvfoHxQn8cSi3jSWNBVHqN01', '2019-09-18 13:06:03', '2019-09-18 13:06:03'),
(481, 1, 'MMrsDPirc0qgo98sWIhVFpHp2dJfDrxb', '2019-09-19 16:20:14', '2019-09-19 16:20:14'),
(482, 1, 'm7yFgKZk7r3LAlYaOz1WiKVltSJyghaQ', '2019-09-21 13:18:01', '2019-09-21 13:18:01'),
(483, 1, 'wrSbo9OO1LrCErArD3uswY5NZcDGUAze', '2019-09-22 06:48:30', '2019-09-22 06:48:30'),
(484, 1, 'l093gTbf7GQRbAcjqK261VjrGc7Oo3kt', '2019-09-22 13:26:07', '2019-09-22 13:26:07'),
(485, 1, '9EOOxb92c6iiY2CdFR4B4HjDlirZ6AF0', '2019-09-22 13:26:07', '2019-09-22 13:26:07'),
(486, 1, '5VtFwLINd3B80xJtugkaScor7uBfLPOR', '2019-09-22 13:26:37', '2019-09-22 13:26:37'),
(487, 1, 'aJaGi6Nxq859ZPw06C3CBo57ag38k372', '2019-09-22 18:03:47', '2019-09-22 18:03:47'),
(488, 1, 'HAeblBCqe37GWQOv2je7XjtxEZtGeOcU', '2019-09-23 06:06:30', '2019-09-23 06:06:30'),
(489, 1, '9VsOuDGZpq20RYYYp2D4sfinKi1IfOie', '2019-09-23 13:23:58', '2019-09-23 13:23:58'),
(491, 12, 'WaxOVwXTt569J4SawaUI4mUsiQVwpkVf', '2019-09-24 05:11:02', '2019-09-24 05:11:02'),
(492, 1, 'qw2IjxytPiHaFIyDWQClEv3ciQHZYoXJ', '2019-09-25 04:17:16', '2019-09-25 04:17:16'),
(493, 1, 'oVOlCnkPDmKbTg4u8IyUJyahbgCgyMpm', '2019-09-25 06:30:21', '2019-09-25 06:30:21'),
(494, 1, 'jOH8vSWe0VomK4YYy0TarLpc7zUC8fQI', '2019-09-25 12:18:19', '2019-09-25 12:18:19'),
(495, 1, 'aapNhFGMyCPuYdlj1yFWFpE0nNtFXUuj', '2019-09-26 15:25:21', '2019-09-26 15:25:21'),
(496, 1, 'sV0rk0LnZqXSqfKIB6vJVnnzMXvjLUbu', '2019-09-26 19:45:53', '2019-09-26 19:45:53'),
(497, 1, 'Q2cfhbXQCkiY5RnCEj8c5T8ashfZDkWr', '2019-09-27 05:57:06', '2019-09-27 05:57:06'),
(498, 1, 'lqfoNqKtetpWmyJQHW9wxwieGIGopgRN', '2019-09-27 12:49:02', '2019-09-27 12:49:02'),
(499, 1, 'P2hwP4cSp0DJNjsVZKbWQ5Y26uVo25TP', '2019-09-27 15:35:32', '2019-09-27 15:35:32'),
(500, 1, 'o51szrtUoQRSSTDF7IwomqhEpAswwbXB', '2019-09-27 16:46:04', '2019-09-27 16:46:04'),
(501, 1, '8UXu7uvADOhPX8mYbkiWXTjZb1HMorla', '2019-09-28 10:39:23', '2019-09-28 10:39:23'),
(505, 1, 'lEXAs20YDctmUwZoGEXkJHTFlK76daVw', '2019-09-29 19:07:33', '2019-09-29 19:07:33'),
(506, 1, 'ivnB8S7tgKcZ8oX48A2zTJwbBIsZzFVf', '2019-09-30 05:49:26', '2019-09-30 05:49:26'),
(507, 1, 'yVuUSopQ6hgdaPcjC5JCi4hwxZQ3WCDO', '2019-09-30 10:21:05', '2019-09-30 10:21:05'),
(511, 1, 'M4Ts6FoKFj7IV718D5QxnSlKvHcRFPWI', '2019-09-30 16:05:52', '2019-09-30 16:05:52'),
(512, 1, '24vnDD9zeUIH6Kx1B0ymFjOQLB3Bs6Un', '2019-09-30 16:20:12', '2019-09-30 16:20:12'),
(513, 1, 'FXsbq446gtduAH5XSdheuYPxgN6BNPxV', '2019-09-30 16:34:04', '2019-09-30 16:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` int(11) NOT NULL,
  `bus_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id`, `bus_id`, `station_id`, `user_id`, `route_id`, `created_at`, `updated_at`, `schedule_id`, `bus_number`, `deleted_at`, `station_name`, `user_first`, `user_last`, `schedule_number`, `route_name`, `full`, `finish`, `driver_number`) VALUES
(20, 37, 9, 12, 10, '2019-09-16 15:07:40', '2019-09-16 15:55:53', 56, 'afjs', NULL, 'Jigjiga Yar', 'abokor', 'hassan', 'Sch_jgTo01', 'Jigjiga yar', 'full', NULL, 'Dr_01'),
(21, 38, 9, 12, 11, '2019-09-16 15:55:06', '2019-09-16 15:55:37', 57, 'fjdkjd', NULL, 'Jigjiga Yar', 'abokor', 'hassan', 'Sch_jgFrom01', 'Boqol jire', 'full', NULL, 'Dr_02'),
(22, 40, 12, 14, 12, '2019-09-17 13:45:20', '2019-09-17 13:46:36', 58, '40292', NULL, 'Siinaay', 'yaxye', 'cilmi', 'Sch_snFrom01', 'Siinaay', 'full', NULL, 'Dr_13'),
(23, 50, 15, 15, 16, '2019-09-30 14:41:23', '2019-09-30 14:41:23', 59, 'honf', NULL, 'Xero Awr', 'cabdi', 'adan', 'Sch_xrFrom01', 'Xero Awr', NULL, NULL, 'Dr_14'),
(24, 51, 15, 15, 16, '2019-09-30 14:44:44', '2019-09-30 14:44:44', 59, 'hierf', NULL, 'Xero Awr', 'cabdi', 'adan', 'Sch_xrFrom01', 'Xero Awr', NULL, NULL, 'Dr_15'),
(25, 52, 15, 15, 16, '2019-09-30 14:45:23', '2019-09-30 14:45:23', 59, 'afjks', NULL, 'Xero Awr', 'cabdi', 'adan', 'Sch_xrFrom01', 'Xero Awr', NULL, NULL, 'Dr_16');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'acSkkEUlJMDpE5pwaXYFVeRIkz8V3jmb', 1, '2019-04-07 02:12:53', '2019-04-07 02:11:28', '2019-04-07 02:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rider_id` int(11) NOT NULL,
  `reserve_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_id` int(11) NOT NULL,
  `bus_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `seat_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_second` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_third` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`id`, `station_id`, `user_id`, `created_at`, `updated_at`, `rider_id`, `reserve_number`, `queue_id`, `bus_number`, `schedule_id`, `seat_number`, `station_name`, `user_first`, `user_last`, `schedule_number`, `rider_first`, `rider_second`, `rider_third`, `route_name`, `route_id`, `seat_id`, `rider_number`) VALUES
(19, 1, 2, '2019-07-19 07:52:04', '2019-07-19 07:52:04', 15, '', 11, 'jakd', 24, 'A1', 'siinay', 'abokor', 'Elmis', 'Sch_sn01', 'yahye', 'saleeban', 'ahmed', 'Siinay', '3', '1', ''),
(20, 1, 2, '2019-07-19 07:52:22', '2019-07-19 07:52:22', 16, '', 11, 'jakd', 24, 'A2', 'siinay', 'abokor', 'Elmis', 'Sch_sn01', 'sicid', 'mahamed', 'muse', 'Siinay', '3', '2', ''),
(21, 1, 2, '2019-07-19 07:52:41', '2019-07-19 07:52:41', 14, '', 11, 'jakd', 24, 'A3', 'siinay', 'abokor', 'Elmis', 'Sch_sn01', 'adjf', 'jfka', 'ajdk', 'Siinay', '3', '8', ''),
(23, 1, 2, '2019-07-19 07:55:12', '2019-07-19 07:55:12', 18, '', 13, 'Mw0c', 25, 'S1', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'sicid', 'cabdirahamn', 'hasan', 'Half London', '4', '6', ''),
(24, 1, 2, '2019-07-19 07:55:45', '2019-07-19 07:55:45', 19, '', 13, 'Mw0c', 25, 'S2', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'a', 'b', 'c', 'Half London', '4', '7', ''),
(25, 1, 2, '2019-07-19 08:03:24', '2019-07-19 08:03:24', 20, '', 13, 'Mw0c', 25, 'm1', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'abokor', 'ajdka', 'ajdk', 'Half London', '4', '12', ''),
(27, 1, 2, '2019-07-19 08:05:36', '2019-07-19 08:05:36', 22, '', 13, 'Mw0c', 25, 'A3', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'yusfu', 'cabid', 'ajd', 'Half London', '4', '9', ''),
(28, 1, 2, '2019-07-19 08:05:52', '2019-07-19 08:05:52', 23, '', 13, 'Mw0c', 25, 'm2', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'xamse', 'cabdi', 'hashi', 'Half London', '4', '13', ''),
(29, 1, 2, '2019-07-19 08:06:30', '2019-07-19 08:06:30', 24, '', 14, 'yews', 25, 's1', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'qali', 'cabdi', 'ragsaalw', 'Half London', '4', '16', ''),
(30, 1, 2, '2019-07-19 08:06:46', '2019-07-19 08:06:46', 25, '', 14, 'yews', 25, 's2', 'siinay', 'abokor', 'Elmis', 'Sch_sn02', 'nasir', 'sahal', 'warfa', 'Half London', '4', '17', ''),
(70, 3, 8, '2019-08-08 16:28:20', '2019-08-08 16:28:20', 14, '', 47, 'Bus_04', 37, 's2', 'Idaacada', 'nasir', 'nimcan', 'Sch_id01', 'adjf', 'jfka', 'ajdk', 'Dalloodha', '8', '18', 'Rd_03'),
(71, 3, 8, '2019-08-08 16:28:34', '2019-08-08 16:28:34', 15, '', 47, 'Bus_04', 37, 's1', 'Idaacada', 'nasir', 'nimcan', 'Sch_id01', 'yahye', 'saleeban', 'ahmed', 'Dalloodha', '8', '19', 'Rd_01'),
(72, 3, 8, '2019-08-08 16:28:47', '2019-08-08 16:28:47', 16, '', 46, 'bus_07', 38, 's2', 'Idaacada', 'nasir', 'nimcan', 'Sch_id02', 'sicid', 'mahamed', 'muse', 'Sheedaha', '9', '20', 'Rd_02'),
(74, 3, 8, '2019-08-08 16:29:22', '2019-08-08 16:29:22', 18, '', 46, 'bus_07', 38, 'w', 'Idaacada', 'nasir', 'nimcan', 'Sch_id02', 'sicid', 'cabdirahamn', 'hasan', 'Sheedaha', '9', '21', 'Rd_05');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_number` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `id_number`, `first_name`, `last_name`, `third_name`, `ph_number`, `gender`, `user_id`, `created_at`, `updated_at`, `station_id`, `bus_id`, `station_name`, `user_first`, `user_last`) VALUES
(14, 'Rd_03', 'adjf', 'jfka', 'ajdk', 4539804, 'male', 2, '2019-05-22 16:02:02', '2019-05-22 16:02:02', 1, 0, '', '', ''),
(15, 'Rd_01', 'yahye', 'saleeban', 'ahmed', 4236256, 'male', 0, '2019-06-01 19:07:48', '2019-06-01 19:07:48', 0, 0, '', '', ''),
(16, 'Rd_02', 'sicid', 'mahamed', 'muse', 4024393, 'male', 0, '2019-06-02 04:28:04', '2019-06-02 04:28:04', 0, 0, '', '', ''),
(17, 'Rd_04', 'qadan', 'nadir', 'warsame', 4573892, 'female', 0, '2019-06-09 11:10:38', '2019-06-09 11:10:38', 0, 0, '', '', ''),
(18, 'Rd_05', 'sicid', 'cabdirahamn', 'hasan', 4539589, 'male', 0, '2019-06-10 16:30:26', '2019-06-10 16:30:26', 0, 0, '', '', ''),
(19, 'Rd_09', 'a', 'b', 'c', 2849289, 'female', 2, '2019-06-10 17:43:12', '2019-06-10 17:43:12', 1, 0, '', '', ''),
(20, 'Rd_07', 'abokor', 'ajdka', 'ajdk', 4387589, 'female', 2, '2019-06-12 17:14:17', '2019-06-12 17:14:17', 1, 0, '', '', ''),
(21, 'Rd_08', 'nasra', 'ali', 'mohamed', 4587325, 'female', 2, '2019-06-12 17:15:01', '2019-06-12 17:15:01', 1, 0, '', '', ''),
(22, 'Rd_06', 'yusfu', 'cabid', 'ajd', 7248752, 'male', 2, '2019-06-12 17:18:38', '2019-06-12 17:18:38', 1, 0, '', '', ''),
(23, 'Rd_10', 'xamse', 'cabdi', 'hashi', 4538754, 'male', 2, '2019-06-12 17:26:11', '2019-06-12 17:26:11', 1, 0, '', '', ''),
(24, 'Rd_11', 'qali', 'cabdi', 'ragsaalw', 4538783, 'male', 2, '2019-06-12 17:26:57', '2019-06-12 17:26:57', 1, 0, '', '', ''),
(25, 'Rd_12', 'nasir', 'sahal', 'warfa', 5328732, 'male', 2, '2019-06-12 17:27:31', '2019-06-12 17:27:31', 1, 0, '', '', ''),
(26, 'Rd_13', 'hoodo', 'cabdi', 'geele', 3742347, 'female', 2, '2019-06-12 17:28:10', '2019-06-12 17:28:10', 1, 0, '', '', ''),
(27, 'Rd_14', 'sakariye', 'mahamed', 'omar', 4253468, 'male', 0, '2019-07-02 04:56:03', '2019-07-02 05:08:04', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"admin\":1}', '2019-04-04 10:33:07', '2019-04-04 10:33:07'),
(2, 'user', 'User', NULL, '2019-04-04 10:33:07', '2019-04-04 10:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-04 10:33:07', '2019-04-04 10:33:07'),
(2, 2, '2019-04-04 10:35:06', '2019-04-04 10:35:06'),
(3, 2, '2019-04-04 10:51:27', '2019-04-04 10:51:27'),
(4, 2, '2019-04-06 13:02:30', '2019-04-06 13:02:30'),
(5, 2, '2019-04-14 03:36:42', '2019-04-14 03:36:42'),
(6, 2, '2019-04-28 03:10:32', '2019-04-28 03:10:32'),
(7, 2, '2019-05-15 05:19:42', '2019-05-15 05:19:42'),
(8, 2, '2019-05-18 15:04:53', '2019-05-18 15:04:53'),
(9, 1, '2019-08-03 15:37:41', '2019-08-03 15:37:41'),
(10, 2, '2019-08-20 14:37:17', '2019-08-20 14:37:17'),
(11, 2, '2019-08-20 14:40:48', '2019-08-20 14:40:48'),
(12, 2, '2019-08-20 17:53:34', '2019-08-20 17:53:34'),
(13, 2, '2019-08-21 04:21:48', '2019-08-21 04:21:48'),
(14, 2, '2019-09-17 13:40:57', '2019-09-17 13:40:57'),
(15, 2, '2019-09-30 14:33:28', '2019-09-30 14:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `station_id`, `station_name`, `created_at`, `updated_at`, `path`) VALUES
(10, 'Jigjiga yar', '9', 'Jigjiga Yar', '2019-08-20 18:15:42', '2019-09-24 05:04:31', 'ckjy@sl}kG@ZlAEv@pKxDnLxJ|QyA`CcAjGWr@mPpEqBl@yEtDsCrCaAtB}@zBl@xOHn@tArAcHlEu@bEJpARjA|@`@~AjAo@nBLx@Td@PJPvI'),
(11, 'Boqol jire', '9', 'Jigjiga Yar', '2019-08-21 03:43:47', '2019-09-24 05:09:37', 'ikjy@am}kG??Lj@`AIj@hIv@vEjBtEpArCfIbPxD`KjC|OsJhRaChAkN|CcOvCqAz@l@nAxAjAn@bBx@vA|@tA'),
(12, 'Siinaay', '12', 'Siinaay', '2019-08-21 03:44:18', '2019-08-21 03:44:18', ''),
(13, 'Half London', '12', 'Siinaay', '2019-08-21 03:44:38', '2019-08-21 03:44:38', ''),
(14, 'Sheedaha', '10', 'Idaacada', '2019-08-21 03:44:54', '2019-08-21 03:44:54', ''),
(15, 'Dalloodha', '10', 'Idaacada', '2019-08-21 03:45:21', '2019-08-21 03:45:21', ''),
(16, 'Xero Awr', '15', 'Xero Awr', '2019-09-30 11:01:59', '2019-09-30 11:04:18', '{tjy@ky}kGyBO{ApKiBlJrAhS_Fb@}AbBmApBmBnBaBRo@fAWj@Cn@YXL~@zCzIhBbLmBeAyC_@yG@uLHuLT]rRUnh@Mz^LtScQx@aPj@mKh@');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `created_at`, `updated_at`, `schedule_number`, `station_id`, `user_id`, `route_id`, `station_name`, `user_first`, `user_last`, `route_name`, `start`) VALUES
(56, '2019-09-16 15:06:33', '2019-09-16 15:06:33', 'Sch_jgTo01', 9, 12, 10, 'Jigjiga Yar', 'abokor', 'hassan', 'Jigjiga yar', 'To_downtown'),
(57, '2019-09-16 15:46:09', '2019-09-16 15:46:09', 'Sch_jgFrom01', 9, 12, 11, 'Jigjiga Yar', 'abokor', 'hassan', 'Boqol jire', 'From_downtown'),
(58, '2019-09-17 13:44:32', '2019-09-17 13:44:32', 'Sch_snFrom01', 12, 14, 12, 'Siinaay', 'yaxye', 'cilmi', 'Siinaay', 'From_downtown'),
(59, '2019-09-30 14:36:11', '2019-09-30 14:36:11', 'Sch_xrFrom01', 15, 15, 16, 'Xero Awr', 'cabdi', 'adan', 'Xero Awr', 'From_downtown');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `seat_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_number`, `created_at`, `updated_at`, `bus_id`, `bus_number`, `station_id`, `user_id`, `station_name`, `user_first`, `user_last`) VALUES
(1, 'A1', '2019-05-28 22:41:46', '2019-05-28 22:41:46', 23, 'jakd', 1, 2, '', '', ''),
(2, 'A2', '2019-05-29 09:37:18', '2019-05-29 09:37:18', 23, 'jakd', 1, 2, '', '', ''),
(3, 'A3', '2019-06-06 11:00:15', '2019-06-06 11:00:15', 24, 'adjkj', 1, 7, '', '', ''),
(4, 'A4', '2019-06-06 11:00:29', '2019-06-06 11:00:29', 24, 'adjkj', 1, 7, '', '', ''),
(5, 'A5', '2019-06-07 12:01:19', '2019-06-07 12:01:19', 13, 'busjf43r', 2, 6, '', '', ''),
(6, 'S1', '2019-06-10 16:11:06', '2019-06-10 16:11:06', 25, 'Mw0c', 1, 2, '', '', ''),
(7, 'S2', '2019-06-10 16:11:22', '2019-06-10 16:11:22', 25, 'Mw0c', 1, 2, '', '', ''),
(8, 'A3', '2019-06-16 05:48:38', '2019-06-16 05:48:38', 23, 'jakd', 1, 2, '', '', ''),
(9, 'A3', '2019-06-16 05:54:29', '2019-06-16 05:54:29', 25, 'Mw0c', 1, 2, '', '', ''),
(11, 'hhhhh', '2019-07-01 18:08:03', '2019-07-01 18:31:54', 29, 'hhhhhh', 4, 0, 'Xero Awr', '', ''),
(12, 'm1', '2019-07-18 04:54:29', '2019-07-18 04:54:29', 25, 'Mw0c', 1, 2, '', '', ''),
(13, 'm2', '2019-07-18 04:54:44', '2019-07-18 04:54:44', 25, 'Mw0c', 1, 2, '', '', ''),
(16, 's1', '2019-07-18 16:00:38', '2019-07-18 16:00:38', 30, 'yews', 1, 2, '', '', ''),
(17, 's2', '2019-07-18 16:00:53', '2019-07-18 16:00:53', 30, 'yews', 1, 2, '', '', ''),
(18, 's2', '2019-08-07 04:48:32', '2019-08-07 04:48:32', 3, 'Bus_04', 3, 5, 'Idaacada', 'kaambul', 'yusuf'),
(19, 's1', '2019-08-07 04:48:51', '2019-08-07 04:48:51', 3, 'Bus_04', 3, 5, 'Idaacada', 'kaambul', 'yusuf'),
(20, 's2', '2019-08-07 05:16:50', '2019-08-07 05:16:50', 2, 'bus_07', 3, 5, 'Idaacada', 'kaambul', 'yusuf'),
(21, 'w', '2019-08-08 02:47:20', '2019-08-08 02:47:20', 2, 'bus_07', 3, 5, 'Idaacada', 'kaambul', 'yusuf');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `lat`, `long`, `created_at`, `updated_at`, `user_id`, `user_first`, `user_last`) VALUES
(9, 'Jigjiga Yar', '9.5610009', '44.0649734', '2019-08-20 18:00:21', '2019-08-29 04:18:31', 1, 'AhmedYasin', 'Ismacil'),
(10, 'Idaacada', '9.5629085', '44.0673526', '2019-08-20 18:01:18', '2019-08-31 04:07:22', 1, 'AhmedYasin', 'Ismacil'),
(12, 'Siinaay', '9.5599340', '44.0666275', '2019-08-20 18:10:44', '2019-08-31 04:10:49', 1, 'AhmedYasin', 'Ismacil'),
(13, 'Calaamada', '9.5613807', '44.0694515', '2019-08-21 03:43:21', '2019-08-31 04:12:51', 1, 'A.Yasin', 'Ismacil'),
(15, 'Xero Awr', '9.5624948', '44.0667741', '2019-09-30 10:47:37', '2019-09-30 10:49:55', 1, 'A.Yasin', 'Ismacil');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sur_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggable_taggables`
--

CREATE TABLE `taggable_taggables` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggable_taggables`
--

INSERT INTO `taggable_taggables` (`tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Blog', '2019-05-12 15:59:30', '2019-05-12 15:59:30'),
(2, 2, 'App\\Blog', '2019-05-12 16:01:47', '2019-05-12 16:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `taggable_tags`
--

CREATE TABLE `taggable_tags` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalized` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggable_tags`
--

INSERT INTO `taggable_tags` (`tag_id`, `name`, `normalized`, `created_at`, `updated_at`) VALUES
(1, 'dfakjdk', 'dfakjdk', '2019-05-12 15:59:30', '2019-05-12 15:59:30'),
(2, 'ajdkfa', 'ajdkfa', '2019-05-12 16:01:47', '2019-05-12 16:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `finished` tinyint(4) NOT NULL DEFAULT '0',
  `task_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-04-04 10:34:29', '2019-04-04 10:34:29'),
(2, NULL, 'ip', '::1', '2019-04-04 10:34:29', '2019-04-04 10:34:29'),
(3, 1, 'user', NULL, '2019-04-04 10:34:29', '2019-04-04 10:34:29'),
(4, NULL, 'global', NULL, '2019-04-06 15:36:23', '2019-04-06 15:36:23'),
(5, NULL, 'ip', '::1', '2019-04-06 15:36:24', '2019-04-06 15:36:24'),
(6, NULL, 'global', NULL, '2019-04-06 15:36:39', '2019-04-06 15:36:39'),
(7, NULL, 'ip', '::1', '2019-04-06 15:36:39', '2019-04-06 15:36:39'),
(8, NULL, 'global', NULL, '2019-04-06 15:37:07', '2019-04-06 15:37:07'),
(9, NULL, 'ip', '::1', '2019-04-06 15:37:07', '2019-04-06 15:37:07'),
(10, 1, 'user', NULL, '2019-04-06 15:37:07', '2019-04-06 15:37:07'),
(11, NULL, 'global', NULL, '2019-04-06 15:37:14', '2019-04-06 15:37:14'),
(12, NULL, 'ip', '::1', '2019-04-06 15:37:14', '2019-04-06 15:37:14'),
(13, 1, 'user', NULL, '2019-04-06 15:37:14', '2019-04-06 15:37:14'),
(14, NULL, 'global', NULL, '2019-04-06 15:39:55', '2019-04-06 15:39:55'),
(15, NULL, 'ip', '::1', '2019-04-06 15:39:55', '2019-04-06 15:39:55'),
(16, 1, 'user', NULL, '2019-04-06 15:39:55', '2019-04-06 15:39:55'),
(17, NULL, 'global', NULL, '2019-04-06 15:46:17', '2019-04-06 15:46:17'),
(18, NULL, 'ip', '::1', '2019-04-06 15:46:17', '2019-04-06 15:46:17'),
(19, NULL, 'global', NULL, '2019-04-07 02:08:58', '2019-04-07 02:08:58'),
(20, NULL, 'ip', '::1', '2019-04-07 02:08:58', '2019-04-07 02:08:58'),
(21, 1, 'user', NULL, '2019-04-07 02:08:58', '2019-04-07 02:08:58'),
(22, NULL, 'global', NULL, '2019-04-07 02:13:05', '2019-04-07 02:13:05'),
(23, NULL, 'ip', '::1', '2019-04-07 02:13:05', '2019-04-07 02:13:05'),
(24, 4, 'user', NULL, '2019-04-07 02:13:05', '2019-04-07 02:13:05'),
(25, NULL, 'global', NULL, '2019-04-07 02:13:15', '2019-04-07 02:13:15'),
(26, NULL, 'ip', '::1', '2019-04-07 02:13:15', '2019-04-07 02:13:15'),
(27, 4, 'user', NULL, '2019-04-07 02:13:15', '2019-04-07 02:13:15'),
(28, NULL, 'global', NULL, '2019-04-08 01:32:16', '2019-04-08 01:32:16'),
(29, NULL, 'ip', '::1', '2019-04-08 01:32:16', '2019-04-08 01:32:16'),
(30, NULL, 'global', NULL, '2019-04-08 01:32:25', '2019-04-08 01:32:25'),
(31, NULL, 'ip', '::1', '2019-04-08 01:32:25', '2019-04-08 01:32:25'),
(32, NULL, 'global', NULL, '2019-04-08 16:29:02', '2019-04-08 16:29:02'),
(33, NULL, 'ip', '::1', '2019-04-08 16:29:02', '2019-04-08 16:29:02'),
(34, 1, 'user', NULL, '2019-04-08 16:29:02', '2019-04-08 16:29:02'),
(35, NULL, 'global', NULL, '2019-04-11 03:27:17', '2019-04-11 03:27:17'),
(36, NULL, 'ip', '::1', '2019-04-11 03:27:17', '2019-04-11 03:27:17'),
(37, 1, 'user', NULL, '2019-04-11 03:27:17', '2019-04-11 03:27:17'),
(38, NULL, 'global', NULL, '2019-04-11 03:27:28', '2019-04-11 03:27:28'),
(39, NULL, 'ip', '::1', '2019-04-11 03:27:28', '2019-04-11 03:27:28'),
(40, NULL, 'global', NULL, '2019-04-11 11:21:23', '2019-04-11 11:21:23'),
(41, NULL, 'ip', '::1', '2019-04-11 11:21:23', '2019-04-11 11:21:23'),
(42, 2, 'user', NULL, '2019-04-11 11:21:23', '2019-04-11 11:21:23'),
(43, NULL, 'global', NULL, '2019-04-11 11:22:00', '2019-04-11 11:22:00'),
(44, NULL, 'ip', '::1', '2019-04-11 11:22:00', '2019-04-11 11:22:00'),
(45, 1, 'user', NULL, '2019-04-11 11:22:01', '2019-04-11 11:22:01'),
(46, NULL, 'global', NULL, '2019-04-13 11:23:20', '2019-04-13 11:23:20'),
(47, NULL, 'ip', '::1', '2019-04-13 11:23:20', '2019-04-13 11:23:20'),
(48, NULL, 'global', NULL, '2019-04-14 03:17:50', '2019-04-14 03:17:50'),
(49, NULL, 'ip', '::1', '2019-04-14 03:17:50', '2019-04-14 03:17:50'),
(50, 2, 'user', NULL, '2019-04-14 03:17:50', '2019-04-14 03:17:50'),
(51, NULL, 'global', NULL, '2019-04-14 03:17:58', '2019-04-14 03:17:58'),
(52, NULL, 'ip', '::1', '2019-04-14 03:17:58', '2019-04-14 03:17:58'),
(53, 2, 'user', NULL, '2019-04-14 03:17:58', '2019-04-14 03:17:58'),
(54, NULL, 'global', NULL, '2019-04-14 03:18:22', '2019-04-14 03:18:22'),
(55, NULL, 'ip', '::1', '2019-04-14 03:18:22', '2019-04-14 03:18:22'),
(56, 2, 'user', NULL, '2019-04-14 03:18:22', '2019-04-14 03:18:22'),
(57, NULL, 'global', NULL, '2019-04-14 03:18:30', '2019-04-14 03:18:30'),
(58, NULL, 'ip', '::1', '2019-04-14 03:18:30', '2019-04-14 03:18:30'),
(59, 2, 'user', NULL, '2019-04-14 03:18:30', '2019-04-14 03:18:30'),
(60, NULL, 'global', NULL, '2019-04-14 03:19:03', '2019-04-14 03:19:03'),
(61, NULL, 'ip', '::1', '2019-04-14 03:19:03', '2019-04-14 03:19:03'),
(62, 2, 'user', NULL, '2019-04-14 03:19:03', '2019-04-14 03:19:03'),
(63, NULL, 'global', NULL, '2019-04-14 03:19:24', '2019-04-14 03:19:24'),
(64, NULL, 'ip', '::1', '2019-04-14 03:19:24', '2019-04-14 03:19:24'),
(65, 2, 'user', NULL, '2019-04-14 03:19:24', '2019-04-14 03:19:24'),
(66, NULL, 'global', NULL, '2019-04-14 03:35:50', '2019-04-14 03:35:50'),
(67, NULL, 'ip', '::1', '2019-04-14 03:35:50', '2019-04-14 03:35:50'),
(68, 2, 'user', NULL, '2019-04-14 03:35:50', '2019-04-14 03:35:50'),
(69, NULL, 'global', NULL, '2019-04-15 03:53:53', '2019-04-15 03:53:53'),
(70, NULL, 'ip', '::1', '2019-04-15 03:53:53', '2019-04-15 03:53:53'),
(71, 1, 'user', NULL, '2019-04-15 03:53:53', '2019-04-15 03:53:53'),
(72, NULL, 'global', NULL, '2019-04-17 04:35:44', '2019-04-17 04:35:44'),
(73, NULL, 'ip', '::1', '2019-04-17 04:35:44', '2019-04-17 04:35:44'),
(74, 1, 'user', NULL, '2019-04-17 04:35:44', '2019-04-17 04:35:44'),
(75, NULL, 'global', NULL, '2019-04-26 11:56:42', '2019-04-26 11:56:42'),
(76, NULL, 'ip', '::1', '2019-04-26 11:56:43', '2019-04-26 11:56:43'),
(77, NULL, 'global', NULL, '2019-04-26 11:56:55', '2019-04-26 11:56:55'),
(78, NULL, 'ip', '::1', '2019-04-26 11:56:55', '2019-04-26 11:56:55'),
(79, NULL, 'global', NULL, '2019-04-26 11:57:17', '2019-04-26 11:57:17'),
(80, NULL, 'ip', '::1', '2019-04-26 11:57:18', '2019-04-26 11:57:18'),
(81, NULL, 'global', NULL, '2019-05-05 03:05:28', '2019-05-05 03:05:28'),
(82, NULL, 'ip', '::1', '2019-05-05 03:05:28', '2019-05-05 03:05:28'),
(83, 1, 'user', NULL, '2019-05-05 03:05:28', '2019-05-05 03:05:28'),
(84, NULL, 'global', NULL, '2019-05-07 07:02:04', '2019-05-07 07:02:04'),
(85, NULL, 'ip', '::1', '2019-05-07 07:02:04', '2019-05-07 07:02:04'),
(86, 1, 'user', NULL, '2019-05-07 07:02:04', '2019-05-07 07:02:04'),
(87, NULL, 'global', NULL, '2019-05-08 02:39:47', '2019-05-08 02:39:47'),
(88, NULL, 'ip', '::1', '2019-05-08 02:39:48', '2019-05-08 02:39:48'),
(89, 1, 'user', NULL, '2019-05-08 02:39:48', '2019-05-08 02:39:48'),
(90, NULL, 'global', NULL, '2019-05-08 02:39:52', '2019-05-08 02:39:52'),
(91, NULL, 'ip', '::1', '2019-05-08 02:39:53', '2019-05-08 02:39:53'),
(92, 1, 'user', NULL, '2019-05-08 02:39:53', '2019-05-08 02:39:53'),
(93, NULL, 'global', NULL, '2019-05-10 14:37:28', '2019-05-10 14:37:28'),
(94, NULL, 'ip', '::1', '2019-05-10 14:37:28', '2019-05-10 14:37:28'),
(95, 1, 'user', NULL, '2019-05-10 14:37:28', '2019-05-10 14:37:28'),
(96, NULL, 'global', NULL, '2019-05-11 03:43:31', '2019-05-11 03:43:31'),
(97, NULL, 'ip', '::1', '2019-05-11 03:43:31', '2019-05-11 03:43:31'),
(98, 1, 'user', NULL, '2019-05-11 03:43:31', '2019-05-11 03:43:31'),
(99, NULL, 'global', NULL, '2019-05-11 22:08:07', '2019-05-11 22:08:07'),
(100, NULL, 'ip', '::1', '2019-05-11 22:08:07', '2019-05-11 22:08:07'),
(101, 1, 'user', NULL, '2019-05-11 22:08:07', '2019-05-11 22:08:07'),
(102, NULL, 'global', NULL, '2019-05-12 23:19:48', '2019-05-12 23:19:48'),
(103, NULL, 'ip', '::1', '2019-05-12 23:19:48', '2019-05-12 23:19:48'),
(104, 1, 'user', NULL, '2019-05-12 23:19:48', '2019-05-12 23:19:48'),
(105, NULL, 'global', NULL, '2019-05-15 01:36:27', '2019-05-15 01:36:27'),
(106, NULL, 'ip', '::1', '2019-05-15 01:36:27', '2019-05-15 01:36:27'),
(107, 1, 'user', NULL, '2019-05-15 01:36:27', '2019-05-15 01:36:27'),
(108, NULL, 'global', NULL, '2019-05-15 05:20:10', '2019-05-15 05:20:10'),
(109, NULL, 'ip', '::1', '2019-05-15 05:20:10', '2019-05-15 05:20:10'),
(110, NULL, 'global', NULL, '2019-05-15 05:20:26', '2019-05-15 05:20:26'),
(111, NULL, 'ip', '::1', '2019-05-15 05:20:26', '2019-05-15 05:20:26'),
(112, NULL, 'global', NULL, '2019-05-15 10:21:12', '2019-05-15 10:21:12'),
(113, NULL, 'ip', '::1', '2019-05-15 10:21:12', '2019-05-15 10:21:12'),
(114, 1, 'user', NULL, '2019-05-15 10:21:13', '2019-05-15 10:21:13'),
(115, NULL, 'global', NULL, '2019-05-17 03:50:04', '2019-05-17 03:50:04'),
(116, NULL, 'ip', '::1', '2019-05-17 03:50:04', '2019-05-17 03:50:04'),
(117, 1, 'user', NULL, '2019-05-17 03:50:04', '2019-05-17 03:50:04'),
(118, NULL, 'global', NULL, '2019-05-18 15:05:45', '2019-05-18 15:05:45'),
(119, NULL, 'ip', '::1', '2019-05-18 15:05:45', '2019-05-18 15:05:45'),
(120, 1, 'user', NULL, '2019-05-18 15:05:45', '2019-05-18 15:05:45'),
(121, NULL, 'global', NULL, '2019-05-18 15:06:01', '2019-05-18 15:06:01'),
(122, NULL, 'ip', '::1', '2019-05-18 15:06:01', '2019-05-18 15:06:01'),
(123, 1, 'user', NULL, '2019-05-18 15:06:01', '2019-05-18 15:06:01'),
(124, NULL, 'global', NULL, '2019-05-18 18:37:32', '2019-05-18 18:37:32'),
(125, NULL, 'ip', '::1', '2019-05-18 18:37:32', '2019-05-18 18:37:32'),
(126, NULL, 'global', NULL, '2019-05-20 04:25:59', '2019-05-20 04:25:59'),
(127, NULL, 'ip', '::1', '2019-05-20 04:26:00', '2019-05-20 04:26:00'),
(128, 1, 'user', NULL, '2019-05-20 04:26:00', '2019-05-20 04:26:00'),
(129, NULL, 'global', NULL, '2019-05-20 10:12:17', '2019-05-20 10:12:17'),
(130, NULL, 'ip', '::1', '2019-05-20 10:12:17', '2019-05-20 10:12:17'),
(131, NULL, 'global', NULL, '2019-05-20 16:57:34', '2019-05-20 16:57:34'),
(132, NULL, 'ip', '::1', '2019-05-20 16:57:34', '2019-05-20 16:57:34'),
(133, 1, 'user', NULL, '2019-05-20 16:57:34', '2019-05-20 16:57:34'),
(134, NULL, 'global', NULL, '2019-05-21 10:44:10', '2019-05-21 10:44:10'),
(135, NULL, 'ip', '::1', '2019-05-21 10:44:10', '2019-05-21 10:44:10'),
(136, 1, 'user', NULL, '2019-05-21 10:44:10', '2019-05-21 10:44:10'),
(137, NULL, 'global', NULL, '2019-05-22 03:27:45', '2019-05-22 03:27:45'),
(138, NULL, 'ip', '::1', '2019-05-22 03:27:45', '2019-05-22 03:27:45'),
(139, 1, 'user', NULL, '2019-05-22 03:27:45', '2019-05-22 03:27:45'),
(140, NULL, 'global', NULL, '2019-05-23 03:47:41', '2019-05-23 03:47:41'),
(141, NULL, 'ip', '::1', '2019-05-23 03:47:41', '2019-05-23 03:47:41'),
(142, 1, 'user', NULL, '2019-05-23 03:47:41', '2019-05-23 03:47:41'),
(143, NULL, 'global', NULL, '2019-05-23 05:03:03', '2019-05-23 05:03:03'),
(144, NULL, 'ip', '::1', '2019-05-23 05:03:03', '2019-05-23 05:03:03'),
(145, 1, 'user', NULL, '2019-05-23 05:03:03', '2019-05-23 05:03:03'),
(146, NULL, 'global', NULL, '2019-05-23 14:08:33', '2019-05-23 14:08:33'),
(147, NULL, 'ip', '::1', '2019-05-23 14:08:33', '2019-05-23 14:08:33'),
(148, 1, 'user', NULL, '2019-05-23 14:08:33', '2019-05-23 14:08:33'),
(149, NULL, 'global', NULL, '2019-05-23 14:08:37', '2019-05-23 14:08:37'),
(150, NULL, 'ip', '::1', '2019-05-23 14:08:37', '2019-05-23 14:08:37'),
(151, 1, 'user', NULL, '2019-05-23 14:08:37', '2019-05-23 14:08:37'),
(152, NULL, 'global', NULL, '2019-05-26 10:36:43', '2019-05-26 10:36:43'),
(153, NULL, 'ip', '::1', '2019-05-26 10:36:44', '2019-05-26 10:36:44'),
(154, 1, 'user', NULL, '2019-05-26 10:36:44', '2019-05-26 10:36:44'),
(155, NULL, 'global', NULL, '2019-05-28 22:14:04', '2019-05-28 22:14:04'),
(156, NULL, 'ip', '::1', '2019-05-28 22:14:04', '2019-05-28 22:14:04'),
(157, NULL, 'global', NULL, '2019-05-29 03:41:30', '2019-05-29 03:41:30'),
(158, NULL, 'ip', '::1', '2019-05-29 03:41:30', '2019-05-29 03:41:30'),
(159, 1, 'user', NULL, '2019-05-29 03:41:30', '2019-05-29 03:41:30'),
(160, NULL, 'global', NULL, '2019-05-29 03:41:36', '2019-05-29 03:41:36'),
(161, NULL, 'ip', '::1', '2019-05-29 03:41:36', '2019-05-29 03:41:36'),
(162, 1, 'user', NULL, '2019-05-29 03:41:36', '2019-05-29 03:41:36'),
(163, NULL, 'global', NULL, '2019-06-01 03:24:41', '2019-06-01 03:24:41'),
(164, NULL, 'ip', '::1', '2019-06-01 03:24:41', '2019-06-01 03:24:41'),
(165, 1, 'user', NULL, '2019-06-01 03:24:41', '2019-06-01 03:24:41'),
(166, NULL, 'global', NULL, '2019-06-01 03:24:51', '2019-06-01 03:24:51'),
(167, NULL, 'ip', '::1', '2019-06-01 03:24:51', '2019-06-01 03:24:51'),
(168, 1, 'user', NULL, '2019-06-01 03:24:52', '2019-06-01 03:24:52'),
(169, NULL, 'global', NULL, '2019-06-05 13:49:08', '2019-06-05 13:49:08'),
(170, NULL, 'ip', '::1', '2019-06-05 13:49:08', '2019-06-05 13:49:08'),
(171, 1, 'user', NULL, '2019-06-05 13:49:08', '2019-06-05 13:49:08'),
(172, NULL, 'global', NULL, '2019-06-13 02:43:14', '2019-06-13 02:43:14'),
(173, NULL, 'ip', '::1', '2019-06-13 02:43:14', '2019-06-13 02:43:14'),
(174, 1, 'user', NULL, '2019-06-13 02:43:14', '2019-06-13 02:43:14'),
(175, NULL, 'global', NULL, '2019-06-13 10:40:56', '2019-06-13 10:40:56'),
(176, NULL, 'ip', '::1', '2019-06-13 10:40:56', '2019-06-13 10:40:56'),
(177, NULL, 'global', NULL, '2019-06-16 16:17:38', '2019-06-16 16:17:38'),
(178, NULL, 'ip', '::1', '2019-06-16 16:17:38', '2019-06-16 16:17:38'),
(179, 2, 'user', NULL, '2019-06-16 16:17:38', '2019-06-16 16:17:38'),
(180, NULL, 'global', NULL, '2019-06-18 02:48:46', '2019-06-18 02:48:46'),
(181, NULL, 'ip', '::1', '2019-06-18 02:48:46', '2019-06-18 02:48:46'),
(182, 1, 'user', NULL, '2019-06-18 02:48:46', '2019-06-18 02:48:46'),
(183, NULL, 'global', NULL, '2019-06-21 03:28:30', '2019-06-21 03:28:30'),
(184, NULL, 'ip', '::1', '2019-06-21 03:28:30', '2019-06-21 03:28:30'),
(185, 1, 'user', NULL, '2019-06-21 03:28:30', '2019-06-21 03:28:30'),
(186, NULL, 'global', NULL, '2019-06-22 05:44:30', '2019-06-22 05:44:30'),
(187, NULL, 'ip', '::1', '2019-06-22 05:44:30', '2019-06-22 05:44:30'),
(188, 1, 'user', NULL, '2019-06-22 05:44:30', '2019-06-22 05:44:30'),
(189, NULL, 'global', NULL, '2019-06-23 02:47:38', '2019-06-23 02:47:38'),
(190, NULL, 'ip', '::1', '2019-06-23 02:47:39', '2019-06-23 02:47:39'),
(191, NULL, 'global', NULL, '2019-06-23 02:47:48', '2019-06-23 02:47:48'),
(192, NULL, 'ip', '::1', '2019-06-23 02:47:48', '2019-06-23 02:47:48'),
(193, NULL, 'global', NULL, '2019-06-23 02:48:01', '2019-06-23 02:48:01'),
(194, NULL, 'ip', '::1', '2019-06-23 02:48:01', '2019-06-23 02:48:01'),
(195, 1, 'user', NULL, '2019-06-23 02:48:01', '2019-06-23 02:48:01'),
(196, NULL, 'global', NULL, '2019-06-26 02:29:20', '2019-06-26 02:29:20'),
(197, NULL, 'ip', '::1', '2019-06-26 02:29:20', '2019-06-26 02:29:20'),
(198, 1, 'user', NULL, '2019-06-26 02:29:20', '2019-06-26 02:29:20'),
(199, NULL, 'global', NULL, '2019-06-27 13:45:55', '2019-06-27 13:45:55'),
(200, NULL, 'ip', '::1', '2019-06-27 13:45:55', '2019-06-27 13:45:55'),
(201, 1, 'user', NULL, '2019-06-27 13:45:55', '2019-06-27 13:45:55'),
(202, NULL, 'global', NULL, '2019-06-29 03:02:34', '2019-06-29 03:02:34'),
(203, NULL, 'ip', '::1', '2019-06-29 03:02:35', '2019-06-29 03:02:35'),
(204, 1, 'user', NULL, '2019-06-29 03:02:35', '2019-06-29 03:02:35'),
(205, NULL, 'global', NULL, '2019-07-01 12:11:11', '2019-07-01 12:11:11'),
(206, NULL, 'ip', '::1', '2019-07-01 12:11:11', '2019-07-01 12:11:11'),
(207, 1, 'user', NULL, '2019-07-01 12:11:11', '2019-07-01 12:11:11'),
(208, NULL, 'global', NULL, '2019-07-06 03:00:54', '2019-07-06 03:00:54'),
(209, NULL, 'ip', '::1', '2019-07-06 03:00:54', '2019-07-06 03:00:54'),
(210, 1, 'user', NULL, '2019-07-06 03:00:54', '2019-07-06 03:00:54'),
(211, NULL, 'global', NULL, '2019-07-11 10:54:58', '2019-07-11 10:54:58'),
(212, NULL, 'ip', '::1', '2019-07-11 10:54:58', '2019-07-11 10:54:58'),
(213, NULL, 'global', NULL, '2019-07-12 10:41:56', '2019-07-12 10:41:56'),
(214, NULL, 'ip', '::1', '2019-07-12 10:41:56', '2019-07-12 10:41:56'),
(215, 1, 'user', NULL, '2019-07-12 10:41:56', '2019-07-12 10:41:56'),
(216, NULL, 'global', NULL, '2019-07-12 11:02:53', '2019-07-12 11:02:53'),
(217, NULL, 'ip', '::1', '2019-07-12 11:02:53', '2019-07-12 11:02:53'),
(218, 1, 'user', NULL, '2019-07-12 11:02:54', '2019-07-12 11:02:54'),
(219, NULL, 'global', NULL, '2019-07-13 02:27:49', '2019-07-13 02:27:49'),
(220, NULL, 'ip', '::1', '2019-07-13 02:27:49', '2019-07-13 02:27:49'),
(221, 1, 'user', NULL, '2019-07-13 02:27:49', '2019-07-13 02:27:49'),
(222, NULL, 'global', NULL, '2019-07-13 10:37:25', '2019-07-13 10:37:25'),
(223, NULL, 'ip', '::1', '2019-07-13 10:37:25', '2019-07-13 10:37:25'),
(224, 1, 'user', NULL, '2019-07-13 10:37:25', '2019-07-13 10:37:25'),
(225, NULL, 'global', NULL, '2019-07-13 10:37:30', '2019-07-13 10:37:30'),
(226, NULL, 'ip', '::1', '2019-07-13 10:37:31', '2019-07-13 10:37:31'),
(227, 1, 'user', NULL, '2019-07-13 10:37:31', '2019-07-13 10:37:31'),
(228, NULL, 'global', NULL, '2019-07-13 10:37:43', '2019-07-13 10:37:43'),
(229, NULL, 'ip', '::1', '2019-07-13 10:37:43', '2019-07-13 10:37:43'),
(230, 1, 'user', NULL, '2019-07-13 10:37:43', '2019-07-13 10:37:43'),
(231, NULL, 'global', NULL, '2019-07-14 03:09:31', '2019-07-14 03:09:31'),
(232, NULL, 'ip', '::1', '2019-07-14 03:09:31', '2019-07-14 03:09:31'),
(233, 1, 'user', NULL, '2019-07-14 03:09:31', '2019-07-14 03:09:31'),
(234, NULL, 'global', NULL, '2019-07-16 02:22:20', '2019-07-16 02:22:20'),
(235, NULL, 'ip', '::1', '2019-07-16 02:22:20', '2019-07-16 02:22:20'),
(236, 2, 'user', NULL, '2019-07-16 02:22:20', '2019-07-16 02:22:20'),
(237, NULL, 'global', NULL, '2019-07-19 07:17:19', '2019-07-19 07:17:19'),
(238, NULL, 'ip', '::1', '2019-07-19 07:17:19', '2019-07-19 07:17:19'),
(239, NULL, 'global', NULL, '2019-07-19 10:27:27', '2019-07-19 10:27:27'),
(240, NULL, 'ip', '::1', '2019-07-19 10:27:27', '2019-07-19 10:27:27'),
(241, NULL, 'global', NULL, '2019-07-19 10:28:07', '2019-07-19 10:28:07'),
(242, NULL, 'ip', '::1', '2019-07-19 10:28:07', '2019-07-19 10:28:07'),
(243, NULL, 'global', NULL, '2019-07-19 16:10:58', '2019-07-19 16:10:58'),
(244, NULL, 'ip', '::1', '2019-07-19 16:10:58', '2019-07-19 16:10:58'),
(245, NULL, 'global', NULL, '2019-07-20 03:30:56', '2019-07-20 03:30:56'),
(246, NULL, 'ip', '::1', '2019-07-20 03:30:56', '2019-07-20 03:30:56'),
(247, NULL, 'global', NULL, '2019-07-21 04:56:39', '2019-07-21 04:56:39'),
(248, NULL, 'ip', '::1', '2019-07-21 04:56:39', '2019-07-21 04:56:39'),
(249, 1, 'user', NULL, '2019-07-21 04:56:39', '2019-07-21 04:56:39'),
(250, NULL, 'global', NULL, '2019-07-21 04:56:54', '2019-07-21 04:56:54'),
(251, NULL, 'ip', '::1', '2019-07-21 04:56:54', '2019-07-21 04:56:54'),
(252, 1, 'user', NULL, '2019-07-21 04:56:54', '2019-07-21 04:56:54'),
(253, NULL, 'global', NULL, '2019-07-21 10:33:07', '2019-07-21 10:33:07'),
(254, NULL, 'ip', '::1', '2019-07-21 10:33:07', '2019-07-21 10:33:07'),
(255, 1, 'user', NULL, '2019-07-21 10:33:07', '2019-07-21 10:33:07'),
(256, NULL, 'global', NULL, '2019-07-21 10:33:17', '2019-07-21 10:33:17'),
(257, NULL, 'ip', '::1', '2019-07-21 10:33:17', '2019-07-21 10:33:17'),
(258, 1, 'user', NULL, '2019-07-21 10:33:17', '2019-07-21 10:33:17'),
(259, NULL, 'global', NULL, '2019-07-24 10:49:53', '2019-07-24 10:49:53'),
(260, NULL, 'ip', '::1', '2019-07-24 10:49:54', '2019-07-24 10:49:54'),
(261, NULL, 'global', NULL, '2019-07-24 10:50:06', '2019-07-24 10:50:06'),
(262, NULL, 'ip', '::1', '2019-07-24 10:50:06', '2019-07-24 10:50:06'),
(263, NULL, 'global', NULL, '2019-07-24 10:50:23', '2019-07-24 10:50:23'),
(264, NULL, 'ip', '::1', '2019-07-24 10:50:23', '2019-07-24 10:50:23'),
(265, NULL, 'global', NULL, '2019-07-26 04:34:15', '2019-07-26 04:34:15'),
(266, NULL, 'ip', '::1', '2019-07-26 04:34:15', '2019-07-26 04:34:15'),
(267, NULL, 'global', NULL, '2019-07-26 04:35:39', '2019-07-26 04:35:39'),
(268, NULL, 'ip', '::1', '2019-07-26 04:35:39', '2019-07-26 04:35:39'),
(269, NULL, 'global', NULL, '2019-07-26 15:26:06', '2019-07-26 15:26:06'),
(270, NULL, 'ip', '::1', '2019-07-26 15:26:06', '2019-07-26 15:26:06'),
(271, 1, 'user', NULL, '2019-07-26 15:26:06', '2019-07-26 15:26:06'),
(272, NULL, 'global', NULL, '2019-07-26 15:26:16', '2019-07-26 15:26:16'),
(273, NULL, 'ip', '::1', '2019-07-26 15:26:16', '2019-07-26 15:26:16'),
(274, 1, 'user', NULL, '2019-07-26 15:26:16', '2019-07-26 15:26:16'),
(275, NULL, 'global', NULL, '2019-07-27 02:22:13', '2019-07-27 02:22:13'),
(276, NULL, 'ip', '::1', '2019-07-27 02:22:13', '2019-07-27 02:22:13'),
(277, NULL, 'global', NULL, '2019-07-28 06:29:15', '2019-07-28 06:29:15'),
(278, NULL, 'ip', '::1', '2019-07-28 06:29:15', '2019-07-28 06:29:15'),
(279, 1, 'user', NULL, '2019-07-28 06:29:15', '2019-07-28 06:29:15'),
(280, NULL, 'global', NULL, '2019-08-04 03:23:28', '2019-08-04 03:23:28'),
(281, NULL, 'ip', '::1', '2019-08-04 03:23:28', '2019-08-04 03:23:28'),
(282, NULL, 'global', NULL, '2019-08-04 10:45:06', '2019-08-04 10:45:06'),
(283, NULL, 'ip', '::1', '2019-08-04 10:45:06', '2019-08-04 10:45:06'),
(284, 9, 'user', NULL, '2019-08-04 10:45:06', '2019-08-04 10:45:06'),
(285, NULL, 'global', NULL, '2019-08-04 11:14:16', '2019-08-04 11:14:16'),
(286, NULL, 'ip', '::1', '2019-08-04 11:14:16', '2019-08-04 11:14:16'),
(287, 1, 'user', NULL, '2019-08-04 11:14:16', '2019-08-04 11:14:16'),
(288, NULL, 'global', NULL, '2019-08-06 02:40:43', '2019-08-06 02:40:43'),
(289, NULL, 'ip', '::1', '2019-08-06 02:40:43', '2019-08-06 02:40:43'),
(290, NULL, 'global', NULL, '2019-08-08 10:39:41', '2019-08-08 10:39:41'),
(291, NULL, 'ip', '::1', '2019-08-08 10:39:41', '2019-08-08 10:39:41'),
(292, NULL, 'global', NULL, '2019-08-08 10:40:19', '2019-08-08 10:40:19'),
(293, NULL, 'ip', '::1', '2019-08-08 10:40:19', '2019-08-08 10:40:19'),
(294, 1, 'user', NULL, '2019-08-08 10:40:19', '2019-08-08 10:40:19'),
(295, NULL, 'global', NULL, '2019-08-09 03:58:24', '2019-08-09 03:58:24'),
(296, NULL, 'ip', '::1', '2019-08-09 03:58:24', '2019-08-09 03:58:24'),
(297, 1, 'user', NULL, '2019-08-09 03:58:24', '2019-08-09 03:58:24'),
(298, NULL, 'global', NULL, '2019-08-09 03:58:35', '2019-08-09 03:58:35'),
(299, NULL, 'ip', '::1', '2019-08-09 03:58:35', '2019-08-09 03:58:35'),
(300, 1, 'user', NULL, '2019-08-09 03:58:35', '2019-08-09 03:58:35'),
(301, NULL, 'global', NULL, '2019-08-09 10:53:42', '2019-08-09 10:53:42'),
(302, NULL, 'ip', '::1', '2019-08-09 10:53:42', '2019-08-09 10:53:42'),
(303, NULL, 'global', NULL, '2019-08-10 10:27:26', '2019-08-10 10:27:26'),
(304, NULL, 'ip', '::1', '2019-08-10 10:27:26', '2019-08-10 10:27:26'),
(305, NULL, 'global', NULL, '2019-08-10 11:54:33', '2019-08-10 11:54:33'),
(306, NULL, 'ip', '::1', '2019-08-10 11:54:33', '2019-08-10 11:54:33'),
(307, 1, 'user', NULL, '2019-08-10 11:54:33', '2019-08-10 11:54:33'),
(308, NULL, 'global', NULL, '2019-08-10 14:39:53', '2019-08-10 14:39:53'),
(309, NULL, 'ip', '::1', '2019-08-10 14:39:53', '2019-08-10 14:39:53'),
(310, 2, 'user', NULL, '2019-08-10 14:39:53', '2019-08-10 14:39:53'),
(311, NULL, 'global', NULL, '2019-08-12 10:20:56', '2019-08-12 10:20:56'),
(312, NULL, 'ip', '::1', '2019-08-12 10:20:56', '2019-08-12 10:20:56'),
(313, 1, 'user', NULL, '2019-08-12 10:20:56', '2019-08-12 10:20:56'),
(314, NULL, 'global', NULL, '2019-08-12 11:12:09', '2019-08-12 11:12:09'),
(315, NULL, 'ip', '::1', '2019-08-12 11:12:09', '2019-08-12 11:12:09'),
(316, 1, 'user', NULL, '2019-08-12 11:12:09', '2019-08-12 11:12:09'),
(317, NULL, 'global', NULL, '2019-08-12 11:12:19', '2019-08-12 11:12:19'),
(318, NULL, 'ip', '::1', '2019-08-12 11:12:20', '2019-08-12 11:12:20'),
(319, 1, 'user', NULL, '2019-08-12 11:12:20', '2019-08-12 11:12:20'),
(320, NULL, 'global', NULL, '2019-08-13 03:37:58', '2019-08-13 03:37:58'),
(321, NULL, 'ip', '::1', '2019-08-13 03:37:58', '2019-08-13 03:37:58'),
(322, 2, 'user', NULL, '2019-08-13 03:37:59', '2019-08-13 03:37:59'),
(323, NULL, 'global', NULL, '2019-08-13 11:19:37', '2019-08-13 11:19:37'),
(324, NULL, 'ip', '::1', '2019-08-13 11:19:37', '2019-08-13 11:19:37'),
(325, 1, 'user', NULL, '2019-08-13 11:19:37', '2019-08-13 11:19:37'),
(326, NULL, 'global', NULL, '2019-08-16 10:59:49', '2019-08-16 10:59:49'),
(327, NULL, 'ip', '::1', '2019-08-16 10:59:49', '2019-08-16 10:59:49'),
(328, 1, 'user', NULL, '2019-08-16 10:59:49', '2019-08-16 10:59:49'),
(329, NULL, 'global', NULL, '2019-08-16 17:41:32', '2019-08-16 17:41:32'),
(330, NULL, 'ip', '::1', '2019-08-16 17:41:32', '2019-08-16 17:41:32'),
(331, NULL, 'global', NULL, '2019-08-17 20:29:00', '2019-08-17 20:29:00'),
(332, NULL, 'ip', '::1', '2019-08-17 20:29:00', '2019-08-17 20:29:00'),
(333, 2, 'user', NULL, '2019-08-17 20:29:00', '2019-08-17 20:29:00'),
(334, NULL, 'global', NULL, '2019-08-18 03:24:28', '2019-08-18 03:24:28'),
(335, NULL, 'ip', '::1', '2019-08-18 03:24:28', '2019-08-18 03:24:28'),
(336, 2, 'user', NULL, '2019-08-18 03:24:28', '2019-08-18 03:24:28'),
(337, NULL, 'global', NULL, '2019-08-18 03:24:34', '2019-08-18 03:24:34'),
(338, NULL, 'ip', '::1', '2019-08-18 03:24:34', '2019-08-18 03:24:34'),
(339, 2, 'user', NULL, '2019-08-18 03:24:34', '2019-08-18 03:24:34'),
(340, NULL, 'global', NULL, '2019-08-18 16:41:26', '2019-08-18 16:41:26'),
(341, NULL, 'ip', '::1', '2019-08-18 16:41:26', '2019-08-18 16:41:26'),
(342, 2, 'user', NULL, '2019-08-18 16:41:26', '2019-08-18 16:41:26'),
(343, NULL, 'global', NULL, '2019-08-21 04:18:10', '2019-08-21 04:18:10'),
(344, NULL, 'ip', '::1', '2019-08-21 04:18:10', '2019-08-21 04:18:10'),
(345, 1, 'user', NULL, '2019-08-21 04:18:10', '2019-08-21 04:18:10'),
(346, NULL, 'global', NULL, '2019-08-21 04:18:24', '2019-08-21 04:18:24'),
(347, NULL, 'ip', '::1', '2019-08-21 04:18:24', '2019-08-21 04:18:24'),
(348, 1, 'user', NULL, '2019-08-21 04:18:24', '2019-08-21 04:18:24'),
(349, NULL, 'global', NULL, '2019-08-21 11:58:20', '2019-08-21 11:58:20'),
(350, NULL, 'ip', '::1', '2019-08-21 11:58:20', '2019-08-21 11:58:20'),
(351, 1, 'user', NULL, '2019-08-21 11:58:20', '2019-08-21 11:58:20'),
(352, NULL, 'global', NULL, '2019-08-26 02:00:16', '2019-08-26 02:00:16'),
(353, NULL, 'ip', '::1', '2019-08-26 02:00:17', '2019-08-26 02:00:17'),
(354, 12, 'user', NULL, '2019-08-26 02:00:17', '2019-08-26 02:00:17'),
(355, NULL, 'global', NULL, '2019-09-16 06:38:45', '2019-09-16 06:38:45'),
(356, NULL, 'ip', '::1', '2019-09-16 06:38:45', '2019-09-16 06:38:45'),
(357, 12, 'user', NULL, '2019-09-16 06:38:45', '2019-09-16 06:38:45'),
(358, NULL, 'global', NULL, '2019-09-16 06:38:52', '2019-09-16 06:38:52'),
(359, NULL, 'ip', '::1', '2019-09-16 06:38:52', '2019-09-16 06:38:52'),
(360, 12, 'user', NULL, '2019-09-16 06:38:52', '2019-09-16 06:38:52'),
(361, NULL, 'global', NULL, '2019-09-16 06:39:14', '2019-09-16 06:39:14'),
(362, NULL, 'ip', '::1', '2019-09-16 06:39:14', '2019-09-16 06:39:14'),
(363, 12, 'user', NULL, '2019-09-16 06:39:14', '2019-09-16 06:39:14'),
(364, NULL, 'global', NULL, '2019-09-16 06:40:41', '2019-09-16 06:40:41'),
(365, NULL, 'ip', '::1', '2019-09-16 06:40:41', '2019-09-16 06:40:41'),
(366, 12, 'user', NULL, '2019-09-16 06:40:41', '2019-09-16 06:40:41'),
(367, NULL, 'global', NULL, '2019-09-16 06:41:51', '2019-09-16 06:41:51'),
(368, NULL, 'ip', '::1', '2019-09-16 06:41:51', '2019-09-16 06:41:51'),
(369, 13, 'user', NULL, '2019-09-16 06:41:51', '2019-09-16 06:41:51'),
(370, NULL, 'global', NULL, '2019-09-16 14:16:17', '2019-09-16 14:16:17'),
(371, NULL, 'ip', '::1', '2019-09-16 14:16:17', '2019-09-16 14:16:17'),
(372, 12, 'user', NULL, '2019-09-16 14:16:17', '2019-09-16 14:16:17'),
(373, NULL, 'global', NULL, '2019-09-16 14:16:46', '2019-09-16 14:16:46'),
(374, NULL, 'ip', '::1', '2019-09-16 14:16:46', '2019-09-16 14:16:46'),
(375, 12, 'user', NULL, '2019-09-16 14:16:46', '2019-09-16 14:16:46'),
(376, NULL, 'global', NULL, '2019-09-16 14:25:10', '2019-09-16 14:25:10'),
(377, NULL, 'ip', '::1', '2019-09-16 14:25:10', '2019-09-16 14:25:10'),
(378, 12, 'user', NULL, '2019-09-16 14:25:10', '2019-09-16 14:25:10'),
(379, NULL, 'global', NULL, '2019-09-16 14:26:02', '2019-09-16 14:26:02'),
(380, NULL, 'ip', '::1', '2019-09-16 14:26:02', '2019-09-16 14:26:02'),
(381, 12, 'user', NULL, '2019-09-16 14:26:02', '2019-09-16 14:26:02'),
(382, NULL, 'global', NULL, '2019-09-16 14:30:17', '2019-09-16 14:30:17'),
(383, NULL, 'ip', '::1', '2019-09-16 14:30:17', '2019-09-16 14:30:17'),
(384, 1, 'user', NULL, '2019-09-16 14:30:17', '2019-09-16 14:30:17'),
(385, NULL, 'global', NULL, '2019-09-16 14:31:24', '2019-09-16 14:31:24'),
(386, NULL, 'ip', '::1', '2019-09-16 14:31:24', '2019-09-16 14:31:24'),
(387, 1, 'user', NULL, '2019-09-16 14:31:25', '2019-09-16 14:31:25'),
(388, NULL, 'global', NULL, '2019-09-17 13:50:29', '2019-09-17 13:50:29'),
(389, NULL, 'ip', '::1', '2019-09-17 13:50:29', '2019-09-17 13:50:29'),
(390, 1, 'user', NULL, '2019-09-17 13:50:29', '2019-09-17 13:50:29'),
(391, NULL, 'global', NULL, '2019-09-18 06:25:18', '2019-09-18 06:25:18'),
(392, NULL, 'ip', '::1', '2019-09-18 06:25:18', '2019-09-18 06:25:18'),
(393, 1, 'user', NULL, '2019-09-18 06:25:18', '2019-09-18 06:25:18'),
(394, NULL, 'global', NULL, '2019-09-18 13:05:50', '2019-09-18 13:05:50'),
(395, NULL, 'ip', '::1', '2019-09-18 13:05:50', '2019-09-18 13:05:50'),
(396, 12, 'user', NULL, '2019-09-18 13:05:50', '2019-09-18 13:05:50'),
(397, NULL, 'global', NULL, '2019-09-19 16:20:04', '2019-09-19 16:20:04'),
(398, NULL, 'ip', '::1', '2019-09-19 16:20:04', '2019-09-19 16:20:04'),
(399, 1, 'user', NULL, '2019-09-19 16:20:04', '2019-09-19 16:20:04'),
(400, NULL, 'global', NULL, '2019-09-21 13:16:35', '2019-09-21 13:16:35'),
(401, NULL, 'ip', '::1', '2019-09-21 13:16:35', '2019-09-21 13:16:35'),
(402, 1, 'user', NULL, '2019-09-21 13:16:35', '2019-09-21 13:16:35'),
(403, NULL, 'global', NULL, '2019-09-21 13:17:18', '2019-09-21 13:17:18'),
(404, NULL, 'ip', '::1', '2019-09-21 13:17:18', '2019-09-21 13:17:18'),
(405, 1, 'user', NULL, '2019-09-21 13:17:19', '2019-09-21 13:17:19'),
(406, NULL, 'global', NULL, '2019-09-21 13:17:44', '2019-09-21 13:17:44'),
(407, NULL, 'ip', '::1', '2019-09-21 13:17:44', '2019-09-21 13:17:44'),
(408, 1, 'user', NULL, '2019-09-21 13:17:44', '2019-09-21 13:17:44'),
(409, NULL, 'global', NULL, '2019-09-23 13:23:29', '2019-09-23 13:23:29'),
(410, NULL, 'ip', '::1', '2019-09-23 13:23:29', '2019-09-23 13:23:29'),
(411, 1, 'user', NULL, '2019-09-23 13:23:30', '2019-09-23 13:23:30'),
(412, NULL, 'global', NULL, '2019-09-23 13:23:46', '2019-09-23 13:23:46'),
(413, NULL, 'ip', '::1', '2019-09-23 13:23:46', '2019-09-23 13:23:46'),
(414, 1, 'user', NULL, '2019-09-23 13:23:46', '2019-09-23 13:23:46'),
(415, NULL, 'global', NULL, '2019-09-24 05:10:55', '2019-09-24 05:10:55'),
(416, NULL, 'ip', '::1', '2019-09-24 05:10:55', '2019-09-24 05:10:55'),
(417, 12, 'user', NULL, '2019-09-24 05:10:55', '2019-09-24 05:10:55'),
(418, NULL, 'global', NULL, '2019-09-25 04:16:58', '2019-09-25 04:16:58'),
(419, NULL, 'ip', '::1', '2019-09-25 04:16:58', '2019-09-25 04:16:58'),
(420, 1, 'user', NULL, '2019-09-25 04:16:58', '2019-09-25 04:16:58'),
(421, NULL, 'global', NULL, '2019-09-29 16:12:41', '2019-09-29 16:12:41'),
(422, NULL, 'ip', '::1', '2019-09-29 16:12:41', '2019-09-29 16:12:41'),
(423, NULL, 'global', NULL, '2019-09-29 19:07:18', '2019-09-29 19:07:18'),
(424, NULL, 'ip', '::1', '2019-09-29 19:07:18', '2019-09-29 19:07:18'),
(425, 1, 'user', NULL, '2019-09-29 19:07:18', '2019-09-29 19:07:18'),
(426, NULL, 'global', NULL, '2019-09-30 05:49:15', '2019-09-30 05:49:15'),
(427, NULL, 'ip', '::1', '2019-09-30 05:49:16', '2019-09-30 05:49:16'),
(428, 1, 'user', NULL, '2019-09-30 05:49:17', '2019-09-30 05:49:17'),
(429, NULL, 'global', NULL, '2019-09-30 13:52:18', '2019-09-30 13:52:18'),
(430, NULL, 'ip', '::1', '2019-09-30 13:52:18', '2019-09-30 13:52:18'),
(431, 1, 'user', NULL, '2019-09-30 13:52:18', '2019-09-30 13:52:18'),
(432, NULL, 'global', NULL, '2019-09-30 13:52:24', '2019-09-30 13:52:24'),
(433, NULL, 'ip', '::1', '2019-09-30 13:52:24', '2019-09-30 13:52:24'),
(434, 1, 'user', NULL, '2019-09-30 13:52:24', '2019-09-30 13:52:24'),
(435, NULL, 'global', NULL, '2019-09-30 13:52:31', '2019-09-30 13:52:31'),
(436, NULL, 'ip', '::1', '2019-09-30 13:52:31', '2019-09-30 13:52:31'),
(437, 1, 'user', NULL, '2019-09-30 13:52:31', '2019-09-30 13:52:31'),
(438, NULL, 'global', NULL, '2019-09-30 16:28:48', '2019-09-30 16:28:48'),
(439, NULL, 'ip', '::1', '2019-09-30 16:28:48', '2019-09-30 16:28:48'),
(440, 1, 'user', NULL, '2019-09-30 16:28:49', '2019-09-30 16:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `station_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `deleted_at`, `bio`, `gender`, `dob`, `pic`, `country`, `state`, `city`, `address`, `postal`, `station_id`, `station_name`) VALUES
(1, 'admin@admin.com', '$2y$10$GoTAMvndBMZskduhOcPNpeqy5rQKwU9EEYy/9dDsiH8k6o7b0P8a6', NULL, '2019-09-30 16:34:05', 'A.Yasin', 'Ismacil', '2019-04-04 10:33:06', '2019-09-30 16:34:05', NULL, NULL, 'male', '1998-07-08', '2msXzwdg6g.png', NULL, NULL, NULL, 'axmed dhagax', NULL, 0, ''),
(9, 'qali@admin.com', '$2y$10$D6o9L9xDzYr.pWywrJQdeOHmePSHqorAt3Cv8mYhdpG9lexXgRSQC', NULL, '2019-08-06 03:42:55', 'qali', 'omar', '2019-08-03 15:37:40', '2019-08-06 03:42:55', NULL, NULL, 'female', NULL, 'NDL4lAZXZo.jpeg', NULL, NULL, NULL, NULL, NULL, 0, ''),
(12, 'abokorhassan@gmail.com', '$2y$10$NV.hn2mr6yYEGBGKASg1cuLocLEmujffvd.QDV.bCE1.pIF8iJ5Vy', NULL, '2019-09-24 05:11:02', 'abokor', 'hassan', '2019-08-20 17:53:34', '2019-09-24 05:11:02', NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 'Jigjiga Yar'),
(13, 'ahmedkaafi2000@gmail.com', '$2y$10$UBm9Vn.rQf17oIDvykrjW.NsWfCH.ZBl1YHnNfOak/fDcRJxX3jOG', NULL, '2019-08-21 12:06:33', 'ahmed', 'yasin', '2019-08-21 04:21:48', '2019-08-21 12:06:33', NULL, NULL, 'male', NULL, '4XJ6PTyDrt.png', NULL, NULL, NULL, 'hawaadle', NULL, 9, 'Jigjiga Yar'),
(14, 'yaxyecilmi@gmail.com', '$2y$10$50ioC09NuxBRDXks5k4ubeGSTUGSWbe8EoFrdnJyMgi/5Z46SH1ou', NULL, '2019-09-29 18:00:29', 'yaxye', 'cilmi', '2019-09-17 13:40:56', '2019-09-29 18:00:29', NULL, NULL, 'male', '2019-09-02', NULL, NULL, NULL, NULL, 'gantaalaha', NULL, 12, 'Siinaay'),
(15, 'cabdi@gmail.com', '$2y$10$1D5PlMDtu6eXPAEobPLCMucyho6hHddlsA4W4RArQIZDL8goijIPW', NULL, '2019-09-30 14:34:37', 'cabdi', 'adan', '2019-09-30 14:33:27', '2019-09-30 14:34:37', NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, 'Idaacada', NULL, 15, 'Xero Awr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buses_bus_number_unique` (`bus_number`);

--
-- Indexes for table `busstops`
--
ALTER TABLE `busstops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `busstops_bstop_num_unique` (`bstop_num`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatables`
--
ALTER TABLE `datatables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_email_unique` (`email`),
  ADD UNIQUE KEY `drivers_ph_number_unique` (`ph_number`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riders_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `riders_ph_number_unique` (`ph_number`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedules_schedule_number_unique` (`schedule_number`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggable_taggables`
--
ALTER TABLE `taggable_taggables`
  ADD KEY `i_taggable_fwd` (`tag_id`,`taggable_id`),
  ADD KEY `i_taggable_rev` (`taggable_id`,`tag_id`),
  ADD KEY `i_taggable_type` (`taggable_type`);

--
-- Indexes for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `taggable_tags_normalized_index` (`normalized`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_email_unique` (`email`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `busstops`
--
ALTER TABLE `busstops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datatables`
--
ALTER TABLE `datatables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
