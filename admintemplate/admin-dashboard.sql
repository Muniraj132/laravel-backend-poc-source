-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 01:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `login_time`, `logout_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-09-18 01:24:00', NULL, '2023-09-18 01:24:00', '2023-09-18 01:24:00'),
(2, 1, '2023-09-18 06:58:08', '2023-09-18 01:28:08', '2023-09-18 01:28:08', '2023-09-18 01:28:08'),
(3, 1, '2023-09-18 01:35:39', NULL, '2023-09-18 01:35:39', '2023-09-18 01:35:39'),
(4, 1, '2023-09-18 07:08:19', '2023-09-18 01:38:19', '2023-09-18 01:38:19', '2023-09-18 01:38:19'),
(5, 1, '2023-09-18 01:38:57', NULL, '2023-09-18 01:38:57', '2023-09-18 01:38:57'),
(6, 1, '2023-09-18 07:10:27', '2023-09-18 01:40:27', '2023-09-18 01:40:27', '2023-09-18 01:40:27'),
(7, 1, '2023-09-18 01:42:06', NULL, '2023-09-18 01:42:06', '2023-09-18 01:42:06'),
(8, 1, '2023-09-18 07:22:23', '2023-09-18 01:52:23', '2023-09-18 01:52:23', '2023-09-18 01:52:23'),
(9, 1, '2023-09-18 02:59:51', NULL, '2023-09-18 02:59:51', '2023-09-18 02:59:51'),
(10, 1, '2023-09-18 03:06:35', NULL, '2023-09-18 03:06:35', '2023-09-18 03:06:35'),
(11, 1, '2023-09-18 08:38:14', '2023-09-18 03:08:14', '2023-09-18 03:08:14', '2023-09-18 03:08:14'),
(12, 1, '2023-09-18 03:08:22', NULL, '2023-09-18 03:08:22', '2023-09-18 03:08:22'),
(13, 1, '2023-09-18 03:09:36', NULL, '2023-09-18 03:09:36', '2023-09-18 03:09:36'),
(14, 1, '2023-09-18 03:11:22', NULL, '2023-09-18 03:11:22', '2023-09-18 03:11:22'),
(15, 1, '2023-09-18 03:26:25', NULL, '2023-09-18 03:26:25', '2023-09-18 03:26:25'),
(16, 1, '2023-09-18 09:01:48', '2023-09-18 03:31:48', '2023-09-18 03:31:48', '2023-09-18 03:31:48'),
(17, 1, '2023-09-18 03:34:01', NULL, '2023-09-18 03:34:01', '2023-09-18 03:34:01'),
(18, 1, '2023-09-18 09:07:25', '2023-09-18 03:37:25', '2023-09-18 03:37:25', '2023-09-18 03:37:25'),
(19, 1, '2023-09-18 03:39:53', NULL, '2023-09-18 03:39:53', '2023-09-18 03:39:53'),
(20, 1, '2023-09-18 09:12:59', '2023-09-18 03:42:59', '2023-09-18 03:42:59', '2023-09-18 03:42:59'),
(21, 1, '2023-09-18 03:43:11', NULL, '2023-09-18 03:43:11', '2023-09-18 03:43:11'),
(22, 1, '2023-09-18 09:15:28', '2023-09-18 03:45:28', '2023-09-18 03:45:28', '2023-09-18 03:45:28'),
(23, 1, '2023-09-18 03:45:38', NULL, '2023-09-18 03:45:38', '2023-09-18 03:45:38'),
(24, 1, '2023-09-18 09:17:21', '2023-09-18 03:47:21', '2023-09-18 03:47:21', '2023-09-18 03:47:21'),
(25, 1, '2023-09-18 03:47:49', NULL, '2023-09-18 03:47:49', '2023-09-18 03:47:49'),
(26, 1, '2023-09-18 09:19:07', '2023-09-18 03:49:07', '2023-09-18 03:49:07', '2023-09-18 03:49:07'),
(27, 1, '2023-09-18 03:50:07', NULL, '2023-09-18 03:50:07', '2023-09-18 03:50:07'),
(28, 1, '2023-09-18 09:22:31', '2023-09-18 03:52:31', '2023-09-18 03:52:31', '2023-09-18 03:52:31'),
(29, 1, '2023-09-18 03:52:46', NULL, '2023-09-18 03:52:46', '2023-09-18 03:52:46'),
(30, 1, '2023-09-18 09:25:07', '2023-09-18 03:55:07', '2023-09-18 03:55:07', '2023-09-18 03:55:07'),
(31, 1, '2023-09-18 03:55:31', NULL, '2023-09-18 03:55:31', '2023-09-18 03:55:31'),
(32, 1, '2023-09-18 04:07:25', NULL, '2023-09-18 04:07:25', '2023-09-18 04:07:25'),
(33, 1, '2023-09-18 09:40:44', '2023-09-18 04:10:44', '2023-09-18 04:10:44', '2023-09-18 04:10:44'),
(34, 1, '2023-09-18 04:11:05', NULL, '2023-09-18 04:11:05', '2023-09-18 04:11:05'),
(35, 1, '2023-09-18 09:42:52', '2023-09-18 04:12:52', '2023-09-18 04:12:52', '2023-09-18 04:12:52'),
(36, 1, '2023-09-18 04:13:53', NULL, '2023-09-18 04:13:53', '2023-09-18 04:13:53'),
(37, 1, '2023-09-18 09:48:06', '2023-09-18 04:18:06', '2023-09-18 04:18:06', '2023-09-18 04:18:06'),
(38, 1, '2023-09-18 04:21:38', NULL, '2023-09-18 04:21:38', '2023-09-18 04:21:38'),
(39, 1, '2023-09-18 09:57:18', '2023-09-18 04:27:18', '2023-09-18 04:27:18', '2023-09-18 04:27:18'),
(40, 1, '2023-09-18 04:27:42', NULL, '2023-09-18 04:27:42', '2023-09-18 04:27:42'),
(41, 1, '2023-09-18 10:01:15', '2023-09-18 04:31:15', '2023-09-18 04:31:15', '2023-09-18 04:31:15'),
(42, 1, '2023-09-18 04:37:57', NULL, '2023-09-18 04:37:57', '2023-09-18 04:37:57'),
(43, 1, '2023-09-18 10:10:05', '2023-09-18 04:40:05', '2023-09-18 04:40:05', '2023-09-18 04:40:05'),
(44, 1, '2023-09-18 04:50:23', NULL, '2023-09-18 04:50:23', '2023-09-18 04:50:23'),
(45, 1, '2023-09-18 04:57:23', NULL, '2023-09-18 04:57:23', '2023-09-18 04:57:23'),
(46, 1, '2023-09-18 10:27:31', '2023-09-18 04:57:31', '2023-09-18 04:57:31', '2023-09-18 04:57:31'),
(47, 1, '2023-09-18 04:58:21', NULL, '2023-09-18 04:58:21', '2023-09-18 04:58:21'),
(48, 1, '2023-09-18 10:29:59', '2023-09-18 04:59:59', '2023-09-18 04:59:59', '2023-09-18 04:59:59'),
(49, 1, '2023-09-18 05:01:04', NULL, '2023-09-18 05:01:04', '2023-09-18 05:01:04'),
(50, 1, '2023-09-18 05:01:12', NULL, '2023-09-18 05:01:12', '2023-09-18 05:01:12'),
(51, 1, '2023-09-18 10:34:09', '2023-09-18 05:04:09', '2023-09-18 05:04:09', '2023-09-18 05:04:09'),
(52, 1, '2023-09-18 10:34:12', '2023-09-18 05:04:12', '2023-09-18 05:04:12', '2023-09-18 05:04:12'),
(53, 1, '2023-09-18 05:10:50', NULL, '2023-09-18 05:10:50', '2023-09-18 05:10:50'),
(54, 1, '2023-09-18 10:42:58', '2023-09-18 05:12:58', '2023-09-18 05:12:58', '2023-09-18 05:12:58'),
(55, 1, '2023-09-18 05:13:17', NULL, '2023-09-18 05:13:17', '2023-09-18 05:13:17'),
(56, 1, '2023-09-18 10:44:44', '2023-09-18 05:14:44', '2023-09-18 05:14:44', '2023-09-18 05:14:44'),
(57, 1, '2023-09-18 05:24:39', NULL, '2023-09-18 05:24:39', '2023-09-18 05:24:39'),
(58, 1, '2023-09-18 11:07:20', '2023-09-18 05:37:20', '2023-09-18 05:37:20', '2023-09-18 05:37:20'),
(59, 1, '2023-09-18 05:37:36', NULL, '2023-09-18 05:37:36', '2023-09-18 05:37:36'),
(60, 1, '2023-09-18 11:09:16', '2023-09-18 05:39:16', '2023-09-18 05:39:16', '2023-09-18 05:39:16'),
(61, 1, '2023-09-18 05:40:28', NULL, '2023-09-18 05:40:28', '2023-09-18 05:40:28'),
(62, 1, '2023-09-18 05:42:37', NULL, '2023-09-18 05:42:37', '2023-09-18 05:42:37'),
(63, 1, '2023-09-18 11:18:41', '2023-09-18 05:48:41', '2023-09-18 05:48:41', '2023-09-18 05:48:41'),
(64, 1, '2023-09-18 05:48:46', NULL, '2023-09-18 05:48:46', '2023-09-18 05:48:46'),
(65, 1, '2023-09-18 11:20:05', '2023-09-18 05:50:05', '2023-09-18 05:50:05', '2023-09-18 05:50:05'),
(66, 1, '2023-09-18 05:52:45', NULL, '2023-09-18 05:52:45', '2023-09-18 05:52:45'),
(67, 1, '2023-09-18 11:27:07', '2023-09-18 05:57:07', '2023-09-18 05:57:07', '2023-09-18 05:57:07'),
(68, 1, '2023-09-18 05:57:36', NULL, '2023-09-18 05:57:36', '2023-09-18 05:57:36'),
(69, 1, '2023-09-18 11:29:23', '2023-09-18 05:59:23', '2023-09-18 05:59:23', '2023-09-18 05:59:23'),
(70, 1, '2023-09-18 06:00:09', NULL, '2023-09-18 06:00:09', '2023-09-18 06:00:09'),
(71, 1, '2023-09-18 11:36:52', '2023-09-18 06:06:52', '2023-09-18 06:06:52', '2023-09-18 06:06:52'),
(72, 1, '2023-09-18 06:07:17', NULL, '2023-09-18 06:07:17', '2023-09-18 06:07:17'),
(73, 1, '2023-09-18 11:40:16', '2023-09-18 06:10:16', '2023-09-18 06:10:16', '2023-09-18 06:10:16'),
(74, 1, '2023-09-18 06:25:54', NULL, '2023-09-18 06:25:54', '2023-09-18 06:25:54'),
(75, 1, '2023-09-18 11:59:08', '2023-09-18 06:29:08', '2023-09-18 06:29:08', '2023-09-18 06:29:08'),
(76, 1, '2023-09-18 06:33:20', NULL, '2023-09-18 06:33:20', '2023-09-18 06:33:20'),
(77, 1, '2023-09-18 12:04:36', '2023-09-18 06:34:36', '2023-09-18 06:34:36', '2023-09-18 06:34:36'),
(78, 1, '2023-09-18 06:46:09', NULL, '2023-09-18 06:46:09', '2023-09-18 06:46:09'),
(79, 1, '2023-09-18 12:17:13', '2023-09-18 06:47:13', '2023-09-18 06:47:13', '2023-09-18 06:47:13'),
(80, 1, '2023-09-18 06:49:15', NULL, '2023-09-18 06:49:15', '2023-09-18 06:49:15'),
(81, 1, '2023-09-18 12:56:22', '2023-09-18 07:26:22', '2023-09-18 07:26:22', '2023-09-18 07:26:22'),
(82, 1, '2023-09-18 07:28:02', NULL, '2023-09-18 07:28:02', '2023-09-18 07:28:02'),
(83, 1, '2023-09-18 13:00:13', '2023-09-18 07:30:13', '2023-09-18 07:30:13', '2023-09-18 07:30:13'),
(84, 1, '2023-09-18 08:00:11', NULL, '2023-09-18 08:00:11', '2023-09-18 08:00:11'),
(85, 1, '2023-09-18 22:20:27', NULL, '2023-09-18 22:20:27', '2023-09-18 22:20:27'),
(86, 1, '2023-09-19 03:51:50', '2023-09-18 22:21:50', '2023-09-18 22:21:50', '2023-09-18 22:21:50'),
(87, 1, '2023-09-18 22:24:57', NULL, '2023-09-18 22:24:57', '2023-09-18 22:24:57'),
(88, 1, '2023-09-19 03:57:27', '2023-09-18 22:27:27', '2023-09-18 22:27:27', '2023-09-18 22:27:27'),
(89, 1, '2023-09-18 22:29:23', NULL, '2023-09-18 22:29:23', '2023-09-18 22:29:23'),
(90, 1, '2023-09-19 04:01:27', '2023-09-18 22:31:27', '2023-09-18 22:31:27', '2023-09-18 22:31:27'),
(91, 1, '2023-09-18 22:31:50', NULL, '2023-09-18 22:31:50', '2023-09-18 22:31:50'),
(92, 1, '2023-09-19 04:05:23', '2023-09-18 22:35:23', '2023-09-18 22:35:23', '2023-09-18 22:35:23'),
(93, 1, '2023-09-18 22:36:38', NULL, '2023-09-18 22:36:38', '2023-09-18 22:36:38'),
(94, 1, '2023-09-19 04:13:15', '2023-09-18 22:43:15', '2023-09-18 22:43:15', '2023-09-18 22:43:15'),
(95, 1, '2023-09-18 22:43:35', NULL, '2023-09-18 22:43:35', '2023-09-18 22:43:35'),
(96, 1, '2023-09-19 04:17:27', '2023-09-18 22:47:27', '2023-09-18 22:47:27', '2023-09-18 22:47:27'),
(97, 1, '2023-09-18 22:49:14', NULL, '2023-09-18 22:49:14', '2023-09-18 22:49:14'),
(98, 1, '2023-09-19 04:20:28', '2023-09-18 22:50:28', '2023-09-18 22:50:28', '2023-09-18 22:50:28'),
(101, 1, '2023-09-18 22:51:43', NULL, '2023-09-18 22:51:43', '2023-09-18 22:51:43'),
(102, 1, '2023-09-19 04:24:03', '2023-09-18 22:54:03', '2023-09-18 22:54:03', '2023-09-18 22:54:03'),
(103, 1, '2023-09-18 22:54:25', NULL, '2023-09-18 22:54:25', '2023-09-18 22:54:25'),
(104, 1, '2023-09-18 22:58:01', NULL, '2023-09-18 22:58:01', '2023-09-18 22:58:01'),
(105, 1, '2023-09-18 22:59:03', NULL, '2023-09-18 22:59:03', '2023-09-18 22:59:03'),
(106, 1, '2023-09-19 04:30:19', '2023-09-18 23:00:19', '2023-09-18 23:00:19', '2023-09-18 23:00:19'),
(107, 1, '2023-09-18 23:06:47', NULL, '2023-09-18 23:06:47', '2023-09-18 23:06:47'),
(108, 1, '2023-09-18 23:08:04', NULL, '2023-09-18 23:08:04', '2023-09-18 23:08:04'),
(109, 1, '2023-09-18 23:34:26', NULL, '2023-09-18 23:34:26', '2023-09-18 23:34:26'),
(110, 1, '2023-09-18 23:45:17', NULL, '2023-09-18 23:45:17', '2023-09-18 23:45:17'),
(111, 1, '2023-09-19 00:16:55', NULL, '2023-09-19 00:16:55', '2023-09-19 00:16:55'),
(112, 1, '2023-09-19 00:19:17', NULL, '2023-09-19 00:19:17', '2023-09-19 00:19:17'),
(113, 1, '2023-09-19 01:17:33', NULL, '2023-09-19 01:17:33', '2023-09-19 01:17:33'),
(114, 1, '2023-09-19 01:34:37', NULL, '2023-09-19 01:34:37', '2023-09-19 01:34:37'),
(115, 1, '2023-09-19 03:42:20', NULL, '2023-09-19 03:42:20', '2023-09-19 03:42:20'),
(116, 1, '2023-09-19 03:51:27', NULL, '2023-09-19 03:51:27', '2023-09-19 03:51:27'),
(117, 1, '2023-09-19 22:38:22', NULL, '2023-09-19 22:38:22', '2023-09-19 22:38:22'),
(118, 1, '2023-09-19 23:20:09', NULL, '2023-09-19 23:20:09', '2023-09-19 23:20:09'),
(119, 1, '2023-09-20 05:39:56', '2023-09-20 00:09:56', '2023-09-20 00:09:56', '2023-09-20 00:09:56'),
(120, 1, '2023-09-20 00:10:02', NULL, '2023-09-20 00:10:02', '2023-09-20 00:10:02'),
(121, 1, '2023-09-20 00:25:33', NULL, '2023-09-20 00:25:33', '2023-09-20 00:25:33'),
(122, 1, '2023-09-20 07:29:00', '2023-09-20 01:59:00', '2023-09-20 01:59:00', '2023-09-20 01:59:00'),
(123, 1, '2023-09-20 01:59:06', NULL, '2023-09-20 01:59:06', '2023-09-20 01:59:06'),
(124, 1, '2023-09-20 22:47:21', NULL, '2023-09-20 22:47:21', '2023-09-20 22:47:21'),
(125, 1, '2023-09-21 01:07:05', NULL, '2023-09-21 01:07:05', '2023-09-21 01:07:05'),
(126, 1, '2023-09-21 04:37:22', NULL, '2023-09-21 04:37:22', '2023-09-21 04:37:22'),
(127, 1, '2023-09-21 22:48:09', NULL, '2023-09-21 22:48:09', '2023-09-21 22:48:09'),
(128, 1, '2023-09-22 03:57:55', NULL, '2023-09-22 03:57:55', '2023-09-22 03:57:55'),
(129, 1, '2023-09-22 10:24:51', '2023-09-22 04:54:51', '2023-09-22 04:54:51', '2023-09-22 04:54:51'),
(130, 10, '2023-09-22 04:54:55', NULL, '2023-09-22 04:54:55', '2023-09-22 04:54:55'),
(131, 10, '2023-09-22 10:26:25', '2023-09-22 04:56:25', '2023-09-22 04:56:25', '2023-09-22 04:56:25'),
(132, 1, '2023-09-22 04:56:31', NULL, '2023-09-22 04:56:31', '2023-09-22 04:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content`, `created_at`, `updated_at`) VALUES
(12, '<p>7896541230</p>', '2023-09-22 04:49:25', '2023-09-22 04:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` enum('publish','unpublish') NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `image`, `active_status`, `created_at`, `updated_at`) VALUES
(4, 'test', 'the event id already started', '2023-09-15', 'pexels-pixabay-247599 (1).jpg', 'publish', '2023-09-22 00:30:00', '2023-09-22 04:55:49');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_09_14_045408_create_products_table', 1),
(13, '2023_09_14_141441_create_activity_logs_table', 1),
(14, '2023_09_15_050048_create_contents_table', 1),
(15, '2023_09_19_065353_create_news_table', 2),
(16, '2023_09_19_110133_create_news_events_table', 3),
(17, '2023_09_19_070823_create_sliders_table', 4),
(18, '2023_09_21_055223_create_slides_table', 5),
(19, '2023_09_22_051715_create_events_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resource` varchar(255) NOT NULL,
  `active_status` enum('publish','unpublish') NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `resource`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 'Amount.pdf', 'unpublish', '2023-09-19 03:56:06', '2023-09-20 00:00:40'),
(4, 'Todaymass (15).pdf', 'publish', '2023-09-19 04:01:15', '2023-09-19 04:01:15'),
(5, 'Communicative English Book_Chapters 01-20.pdf', 'publish', '2023-09-19 04:28:34', '2023-09-19 04:28:34'),
(7, 'Member (3).xlsx', 'publish', '2023-09-22 04:53:46', '2023-09-22 04:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `title`, `description`, `date`, `image`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'testing this', '2023-09-22', 'all.webp', '2023-09-19 22:45:04', '2023-09-22 04:44:01'),
(5, 'testing', 'testing this', '2023-09-27', 'transfer.webp', '2023-09-20 00:02:47', '2023-09-20 00:37:20'),
(6, 'testing', 'testing this', '2023-09-27', 'tourrequest.png', '2023-09-20 00:08:43', '2023-09-20 00:37:33');

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
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `product_code`, `description`, `images`, `created_at`, `updated_at`) VALUES
(13, 'testing', '546', '546', 'testing', 'tourrequest-min.png', '2023-09-18 07:22:26', '2023-09-18 07:22:26'),
(14, 'first', '12', '12', 'mgfdhjkhfdk', 'null', '2023-09-18 07:25:09', '2023-09-18 22:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_path`, `width`, `height`, `dimensions`, `published`, `created_at`, `updated_at`) VALUES
(1, 'uploads/1695199830.png', 600, 600, '1920x1080', 1, '2023-09-20 03:20:30', '2023-09-20 03:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `active_status` enum('publish','unpublish') NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `active_status`, `created_at`, `updated_at`) VALUES
(4, 'Cristo-Infograpic-03.jpg', 'unpublish', '2023-09-21 01:54:41', '2023-09-21 01:54:48'),
(7, '1.jpg', 'publish', '2023-09-22 04:51:34', '2023-09-22 04:51:34'),
(8, '081A1577_2_11zon-scaled.jpg', 'publish', '2023-09-22 04:52:27', '2023-09-22 04:52:27');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Muniraj', 'muni20002raj@gmail.com', NULL, '$2y$10$WadsHt8azwijRXDcT5KtjuYtDgL9lPGlPT7guVXMCXl0Tu66ZF/BK', NULL, 'admin', '2023-09-18 01:23:44', '2023-09-18 01:23:44'),
(4, 'ravishnu', 'ravi@gmail.com', NULL, '$2y$10$VEObYLr3Pr7UxGb9W84tYekE26xTCAokBb.e/skOxygnI/liZtztu', NULL, 'admin', '2023-09-20 04:33:00', '2023-09-22 04:48:32'),
(10, 'tester', 'tester@gmail.com', NULL, '$2y$10$vZtb7OWSJ9ro.KxKWEoyA.T5qTbAVYHMx84YJiP0XEhbJt9JxlZb6', NULL, 'admin', '2023-09-22 04:54:25', '2023-09-22 04:54:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
