-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 02:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stkrhub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_game_components`
--

CREATE TABLE `added_game_components` (
  `added_component_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `component_id` int(11) NOT NULL,
  `is_custom_design` tinyint(1) NOT NULL,
  `custom_design_file_path` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `added_game_components`
--

INSERT INTO `added_game_components` (`added_component_id`, `game_id`, `component_id`, `is_custom_design`, `custom_design_file_path`, `quantity`, `color_id`, `size`, `user_id`) VALUES
(574, 0, 2, 1, 'uploads/65546e921f6a7_mbi maginhawa_102223 to 110623.txt', 1, NULL, '7x7', 3),
(575, 0, 2, 1, 'uploads/65546e9fd3a82_FMC Masterlist 110923.xls', 1, NULL, '7x7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `user_id`, `fullname`, `number`, `region`, `province`, `city`, `barangay`, `zip`, `street`, `is_default`, `created_at`) VALUES
(16, 10, 'Denzel Go', '', 'Luzon ', '', 'Valenzuela City', '', '', '8 Doneza St. Balubaran Malinta', 0, '2023-09-27 19:58:48'),
(17, 10, 'Nicole', '09770257461', 'Metro Manila', '', '', '', '', '', 1, '2023-09-27 19:59:00'),
(20, 3, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-10-20 19:18:52'),
(21, 3, 'Denzel Go', '09770257461', 'Luzon', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 0, '2023-10-20 19:18:52'),
(22, 13, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Quezon City', 'Barangay 1', '1400', '8 Doneza St. Balubaran Malinta', 1, '2023-11-08 10:09:18'),
(23, 15, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 1, '2023-11-12 12:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `created_at`, `avatar`) VALUES
(1, 'admin', 'admin@gmail.com', '123', '2023-09-28 15:05:44', NULL),
(2, 'admin2', 'denzelgo@plv.edu.ph', '$2y$10$.YjvhRu54LmdlJxM42P9jemL6XyxomD/qKppQSjKMnu9BNcC4Ij5O', '2023-09-28 15:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`log_id`, `admin_id`, `event_type`, `timestamp`) VALUES
(1, 2, 'login', '2023-09-28 15:33:37'),
(2, 2, 'login', '2023-09-28 15:34:17'),
(3, 0, 'logout', '2023-09-28 15:39:31'),
(4, 2, 'login', '2023-09-28 15:39:43'),
(5, 2, 'login', '2023-09-29 03:11:24'),
(6, 2, 'login', '2023-09-29 07:47:02'),
(7, 0, 'logout', '2023-09-29 09:10:41'),
(8, 2, 'login', '2023-10-02 14:02:46'),
(9, 0, 'logout', '2023-10-02 14:03:16'),
(10, 2, 'login', '2023-10-02 14:03:36'),
(11, 0, 'logout', '2023-10-02 14:04:19'),
(12, 2, 'login', '2023-10-02 14:04:49'),
(13, 0, 'logout', '2023-10-02 14:05:00'),
(14, 2, 'login', '2023-10-02 14:05:44'),
(15, 2, 'login', '2023-10-02 16:50:58'),
(16, 2, 'login', '2023-10-02 16:50:58'),
(17, 2, 'login', '2023-10-02 16:51:12'),
(18, 2, 'login', '2023-10-03 13:42:36'),
(19, 0, 'logout', '2023-10-03 13:43:32'),
(20, 2, 'login', '2023-10-03 13:44:38'),
(21, 2, 'login', '2023-10-08 19:07:39'),
(22, 2, 'login', '2023-10-09 04:46:31'),
(23, 2, 'login', '2023-10-10 14:33:55'),
(24, 2, 'login', '2023-10-10 16:18:32'),
(25, 2, 'login', '2023-10-11 02:27:39'),
(26, 2, 'login', '2023-10-11 05:07:55'),
(27, 2, 'login', '2023-10-11 06:38:07'),
(28, 2, 'login', '2023-10-12 09:51:11'),
(29, 2, 'login', '2023-10-12 14:31:49'),
(30, 2, 'login', '2023-10-13 08:14:05'),
(31, 2, 'login', '2023-10-13 08:33:56'),
(32, 2, 'login', '2023-10-13 16:00:15'),
(33, 2, 'login', '2023-10-14 05:33:57'),
(34, 2, 'login', '2023-10-15 16:34:27'),
(35, 2, 'login', '2023-10-16 05:06:07'),
(36, 2, 'login', '2023-10-16 13:21:55'),
(37, 2, 'login', '2023-10-17 13:46:09'),
(38, 2, 'login', '2023-10-18 02:34:35'),
(39, 2, 'login', '2023-10-18 11:54:59'),
(40, 2, 'login', '2023-10-23 17:58:48'),
(41, 2, 'login', '2023-10-25 01:10:19'),
(42, 2, 'login', '2023-10-25 03:37:34'),
(43, 2, 'login', '2023-10-25 03:40:23'),
(44, 2, 'login', '2023-10-26 16:55:43'),
(45, 2, 'login', '2023-10-27 02:11:53'),
(46, 2, 'login', '2023-10-28 06:20:38'),
(47, 2, 'login', '2023-10-29 08:19:37'),
(48, 2, 'login', '2023-10-29 16:37:38'),
(49, 2, 'login', '2023-10-30 12:58:11'),
(50, 2, 'login', '2023-10-31 03:12:11'),
(51, 2, 'login', '2023-10-31 10:39:39'),
(52, 2, 'login', '2023-10-31 12:16:53'),
(53, 2, 'login', '2023-10-31 18:34:33'),
(54, 2, 'login', '2023-11-01 06:13:59'),
(55, 2, 'login', '2023-11-06 00:07:46'),
(56, 2, 'login', '2023-11-08 10:10:54'),
(57, 2, 'login', '2023-11-09 08:34:24'),
(58, 2, 'login', '2023-11-09 15:32:04'),
(59, 2, 'login', '2023-11-11 07:11:49'),
(60, 2, 'login', '2023-11-11 14:32:41'),
(61, 2, 'login', '2023-11-12 06:31:22'),
(62, 2, 'login', '2023-11-12 12:18:58'),
(63, 2, 'login', '2023-11-12 12:30:32'),
(64, 2, 'login', '2023-11-13 07:58:46'),
(65, 2, 'login', '2023-11-15 05:18:30'),
(66, 2, 'login', '2023-11-15 07:40:54'),
(67, 2, 'login', '2023-11-15 08:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_review_response`
--

CREATE TABLE `admin_review_response` (
  `admin_review_response_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `admin_file_upload` varchar(255) DEFAULT NULL,
  `admin_text_response` text DEFAULT NULL,
  `response_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `age_id` int(11) NOT NULL,
  `age_value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`age_id`, `age_value`) VALUES
(1, '2+'),
(2, '8+'),
(3, '16+'),
(4, '18+');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`log_id`, `user_id`, `action`, `details`, `timestamp`) VALUES
(1, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 18', '2023-10-01 12:08:08'),
(2, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-01 12:08:08'),
(3, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-01 12:08:08'),
(4, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 18', '2023-10-01 12:09:53'),
(5, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-01 12:09:53'),
(6, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-01 12:09:53'),
(7, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 26', '2023-10-02 16:04:55'),
(8, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 27', '2023-10-02 16:29:19'),
(9, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(10, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(11, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(12, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 16:40:01'),
(13, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-02 16:40:01'),
(14, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-02 16:40:01'),
(15, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 28', '2023-10-02 17:12:53'),
(16, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-02 17:12:53'),
(17, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 17:12:53'),
(18, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 17:12:53'),
(19, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 17:12:53'),
(20, 3, 'PAY USING PAYPAL', 'Purchase added_component_id: 463', '2023-10-02 17:42:45'),
(21, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-03 13:44:24'),
(22, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-03 14:24:31'),
(23, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-05 01:53:47'),
(24, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-05 01:53:47'),
(25, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 33', '2023-10-08 17:27:55'),
(26, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:27:55'),
(27, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:27:55'),
(28, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:27:55'),
(29, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-08 17:27:55'),
(30, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-08 17:27:55'),
(31, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-08 17:27:55'),
(32, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-08 17:27:55'),
(33, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-08 17:27:55'),
(34, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-08 17:27:55'),
(35, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:32:46'),
(36, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:36:50'),
(37, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:37:58'),
(38, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:37:58'),
(39, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:57:56'),
(40, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:57:56'),
(41, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:57:56'),
(42, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 36', '2023-10-08 19:10:59'),
(43, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 37', '2023-10-09 06:43:30'),
(44, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 38', '2023-10-09 06:46:27'),
(45, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 58', '2023-10-09 08:28:10'),
(46, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 60', '2023-10-09 08:58:42'),
(47, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 64', '2023-10-09 10:50:25'),
(48, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 67', '2023-10-09 11:08:28'),
(49, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 70', '2023-10-09 11:26:44'),
(50, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 73', '2023-10-09 11:41:47'),
(51, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 76', '2023-10-09 13:19:01'),
(52, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 77', '2023-10-09 13:23:40'),
(53, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 78', '2023-10-09 13:25:53'),
(54, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 80', '2023-10-09 13:32:55'),
(55, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 82', '2023-10-09 13:34:57'),
(56, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 83', '2023-10-09 13:36:53'),
(57, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 14:57:52'),
(58, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 14:57:52'),
(59, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 14:57:52'),
(60, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 14:57:52'),
(61, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:08:15'),
(62, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:08:15'),
(63, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:08:15'),
(64, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:12:47'),
(65, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:12:48'),
(66, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:12:48'),
(67, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:17:42'),
(68, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:25:04'),
(69, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:25:04'),
(70, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:27:33'),
(71, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:27:33'),
(72, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:33:14'),
(73, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:33:14'),
(74, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:33:14'),
(75, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:37:25'),
(76, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:37:25'),
(77, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:38:45'),
(78, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:40:06'),
(79, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:41:02'),
(80, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:41:43'),
(81, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:41:43'),
(82, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:43:42'),
(83, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:44:34'),
(84, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:45:44'),
(85, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:46:43'),
(86, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:46:43'),
(87, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:46:43'),
(88, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:46:43'),
(89, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:46:43'),
(90, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:46:43'),
(91, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:46:43'),
(92, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:50:09'),
(93, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:50:09'),
(94, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:50:09'),
(95, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:52:15'),
(96, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:52:15'),
(97, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:52:15'),
(98, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:52:15'),
(99, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:52:15'),
(100, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:53:01'),
(101, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:53:01'),
(102, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:53:01'),
(103, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:53:01'),
(104, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:53:01'),
(105, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:56:15'),
(106, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:56:15'),
(107, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:56:55'),
(108, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:56:55'),
(109, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:57:43'),
(110, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:57:43'),
(111, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:57:43'),
(112, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:57:43'),
(113, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:57:43'),
(114, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:57:43'),
(115, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:58:35'),
(116, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:58:35'),
(117, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:59:36'),
(118, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:59:36'),
(119, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:59:36'),
(120, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:59:36'),
(121, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:59:36'),
(122, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:59:36'),
(123, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:59:36'),
(124, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:59:36'),
(125, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:59:36'),
(126, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:02:24'),
(127, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:02:24'),
(128, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:02:24'),
(129, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:03:40'),
(130, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:03:40'),
(131, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 16:04:22'),
(132, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 16:04:22'),
(133, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 16:04:22'),
(134, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:06:05'),
(135, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:06:06'),
(136, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:06:06'),
(137, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:07:31'),
(138, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:07:31'),
(139, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:07:31'),
(140, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:07:31'),
(141, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:11:04'),
(142, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:11:04'),
(143, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:11:04'),
(144, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:12:31'),
(145, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:12:31'),
(146, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:13:19'),
(147, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:13:19'),
(148, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:15:40'),
(149, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:15:40'),
(150, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:16:38'),
(151, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:16:38'),
(152, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:17:13'),
(153, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:17:13'),
(154, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 16:32:05'),
(155, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 16:32:26'),
(156, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:34:54'),
(157, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:56:50'),
(158, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:56:50'),
(159, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:56:50'),
(160, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 17:24:32'),
(161, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 17:24:32'),
(162, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 17:25:12'),
(163, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 17:25:12'),
(164, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 17:38:48'),
(165, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 17:38:48'),
(166, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 17:38:48'),
(167, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 86', '2023-10-10 17:39:38'),
(168, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 87', '2023-10-10 17:53:34'),
(169, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 17:53:34'),
(170, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 17:53:34'),
(171, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 17:53:34'),
(172, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 02:25:35'),
(173, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-11 02:25:35'),
(174, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-11 02:25:35'),
(175, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 88', '2023-10-11 02:53:10'),
(176, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-11 02:53:10'),
(177, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-11 02:53:10'),
(178, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-11 02:54:37'),
(179, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-11 02:54:37'),
(180, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 02:54:37'),
(181, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 89', '2023-10-11 02:54:37'),
(182, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-11 02:59:49'),
(183, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-11 02:59:49'),
(184, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 90', '2023-10-11 05:32:06'),
(185, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 91', '2023-10-11 05:35:16'),
(186, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 06:45:09'),
(187, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-11 06:45:09'),
(188, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(189, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(190, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(191, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(192, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(193, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(194, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(195, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(196, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(197, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(198, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(199, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-12 09:50:31'),
(200, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-12 09:50:31'),
(201, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-12 09:54:14'),
(202, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-12 09:54:14'),
(203, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-13 15:55:24'),
(204, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 92', '2023-10-13 15:55:24'),
(205, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-13 15:58:34'),
(206, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-13 16:06:28'),
(207, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-13 16:24:13'),
(208, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-13 16:24:13'),
(209, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-13 16:24:13'),
(210, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-14 06:53:06'),
(211, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-14 06:59:43'),
(212, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-14 06:59:43'),
(213, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 174', '2023-10-16 06:35:12'),
(214, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 177', '2023-10-16 06:38:10'),
(215, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 174', '2023-10-16 06:42:14'),
(216, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-16 06:43:57'),
(217, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 93', '2023-10-16 13:21:42'),
(218, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 94', '2023-10-16 13:26:06'),
(219, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 129', '2023-10-16 14:13:42'),
(220, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 98', '2023-10-16 14:17:34'),
(221, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 130', '2023-10-16 14:18:24'),
(222, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 99', '2023-10-16 14:19:43'),
(223, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 131', '2023-10-16 14:20:19'),
(224, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 101', '2023-10-16 14:32:45'),
(225, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 100', '2023-10-16 14:32:45'),
(226, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 133', '2023-10-16 14:33:53'),
(227, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 132', '2023-10-16 14:33:53'),
(228, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 102', '2023-10-16 14:34:41'),
(229, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 103', '2023-10-16 14:34:56'),
(230, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 134', '2023-10-16 14:35:46'),
(231, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 135', '2023-10-16 14:36:29'),
(232, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 104', '2023-10-16 14:41:50'),
(233, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 133', '2023-10-16 14:41:50'),
(234, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 134', '2023-10-16 14:41:50'),
(235, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 129', '2023-10-16 14:41:50'),
(236, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 131', '2023-10-16 14:41:50'),
(237, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 105', '2023-10-16 14:46:19'),
(238, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 130', '2023-10-16 14:48:28'),
(239, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 129', '2023-10-16 14:48:28'),
(240, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 131', '2023-10-16 14:48:28'),
(241, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 132', '2023-10-16 14:48:28'),
(242, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 134', '2023-10-16 14:48:29'),
(243, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 136', '2023-10-16 14:48:29'),
(244, 10, 'PAY USING STKR WALLET', 'Purchase ticket_id: 106', '2023-10-17 18:01:12'),
(245, 10, 'PAY USING STKR WALLET', 'Purchase built_game_id: 137', '2023-10-17 18:03:22'),
(246, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 138', '2023-10-18 02:35:23'),
(247, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 174', '2023-10-18 02:35:23'),
(248, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 108', '2023-10-18 11:59:00'),
(249, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 139', '2023-10-18 12:13:31'),
(250, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 109', '2023-10-18 13:15:11'),
(251, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 139', '2023-10-18 13:15:11'),
(252, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 140', '2023-10-18 13:16:07'),
(253, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 110', '2023-10-18 13:39:58'),
(254, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 141', '2023-10-18 13:40:42'),
(255, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-18 15:08:02'),
(256, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-18 15:45:55'),
(257, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-23 19:35:42'),
(258, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-23 19:35:42'),
(259, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-23 19:35:42'),
(260, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-24 11:34:06'),
(261, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-24 12:00:47'),
(262, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-24 12:00:47'),
(263, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 111', '2023-10-24 12:33:32'),
(264, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-24 12:33:32'),
(265, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 112', '2023-10-24 12:34:19'),
(266, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-24 12:34:19'),
(267, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-24 13:13:22'),
(268, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 137', '2023-10-24 15:58:30'),
(269, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-24 16:29:01'),
(270, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-24 16:29:01'),
(271, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-24 16:29:01'),
(272, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-24 16:32:07'),
(273, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-24 16:39:15'),
(274, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-24 16:39:15'),
(275, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-24 16:39:15'),
(276, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-24 16:59:40'),
(277, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-24 16:59:40'),
(278, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-24 16:59:40'),
(279, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-24 17:10:30'),
(280, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 113', '2023-10-26 04:08:53'),
(281, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-26 15:57:38'),
(282, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-26 15:57:38'),
(283, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-26 15:57:38'),
(284, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-26 16:02:04'),
(285, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-26 16:29:53'),
(286, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-26 18:17:59'),
(287, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-26 18:19:49'),
(288, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-26 18:23:55'),
(289, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-26 18:23:55'),
(290, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 141', '2023-10-26 18:25:42'),
(291, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 141', '2023-10-26 18:26:28'),
(292, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 128', '2023-10-27 02:11:36'),
(293, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 141', '2023-10-27 02:11:36'),
(294, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 141', '2023-10-27 02:15:06'),
(295, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 128', '2023-10-27 02:15:06'),
(296, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 139', '2023-10-27 02:15:06'),
(297, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-27 02:15:06'),
(298, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-27 02:17:18'),
(299, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-27 02:17:18'),
(300, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 141', '2023-10-27 02:17:18'),
(301, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-27 02:24:35'),
(302, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-27 02:26:56'),
(303, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-27 02:27:45'),
(304, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-27 02:30:57'),
(305, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-27 02:30:58'),
(306, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-27 02:31:50'),
(307, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-27 02:31:50'),
(308, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-27 02:33:11'),
(309, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-27 02:33:11'),
(310, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-27 02:34:46'),
(311, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-27 02:35:11'),
(312, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-27 02:35:11'),
(313, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-27 02:35:11'),
(314, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 139', '2023-10-27 02:38:05'),
(315, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-27 02:38:05'),
(316, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 135', '2023-10-27 02:45:17'),
(317, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 137', '2023-10-27 02:45:17'),
(318, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 128', '2023-10-27 02:46:17'),
(319, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:46:18'),
(320, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 135', '2023-10-27 02:46:18'),
(321, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 128', '2023-10-27 02:48:14'),
(322, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 02:48:14'),
(323, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:48:14'),
(324, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 02:49:53'),
(325, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:49:53'),
(326, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 128', '2023-10-27 02:49:53'),
(327, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:52:32'),
(328, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 02:53:17'),
(329, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:53:17'),
(330, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 02:55:17'),
(331, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 02:55:17'),
(332, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-27 02:59:51'),
(333, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 02:59:51'),
(334, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 139', '2023-10-27 03:02:48'),
(335, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 137', '2023-10-27 03:02:48'),
(336, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-27 03:07:58'),
(337, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 03:07:58'),
(338, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 03:07:58'),
(339, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-27 07:08:51'),
(340, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-27 07:37:09'),
(341, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 139', '2023-10-27 07:37:09'),
(342, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 128', '2023-10-27 07:37:44'),
(343, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 137', '2023-10-27 15:35:14'),
(344, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 15:35:14'),
(345, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 15:35:14'),
(346, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 183', '2023-10-27 15:50:26'),
(347, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-27 15:52:47'),
(348, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-27 15:53:28'),
(349, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 142', '2023-10-28 06:23:49'),
(350, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 114', '2023-10-28 11:48:35'),
(351, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 143', '2023-10-28 11:49:27'),
(352, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 115', '2023-10-28 12:38:54'),
(353, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 144', '2023-10-28 12:38:54'),
(354, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 143', '2023-10-28 12:38:54'),
(355, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 145', '2023-10-28 14:11:57'),
(356, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 116', '2023-10-28 14:37:32'),
(357, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-29 16:37:27'),
(358, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 184', '2023-10-29 16:45:06'),
(359, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-29 17:38:54'),
(360, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-29 17:38:54'),
(361, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 133', '2023-10-29 17:38:54'),
(362, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 137', '2023-10-29 18:51:13'),
(363, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 131', '2023-10-29 18:51:13'),
(364, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 183', '2023-10-29 18:51:13'),
(365, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 184', '2023-10-31 03:47:14'),
(366, 10, 'PAY USING STKR WALLET', 'Purchase published_game_id: 135', '2023-10-31 03:53:11'),
(367, 10, 'PAY USING STKR WALLET', 'Purchase ticket_id: 117', '2023-10-31 04:03:08'),
(368, 10, 'PAY USING STKR WALLET', 'Purchase ticket_id: 118', '2023-10-31 04:24:32'),
(369, 10, 'PAY USING STKR WALLET', 'Purchase built_game_id: 147', '2023-10-31 04:30:47'),
(370, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 185', '2023-10-31 04:40:38'),
(371, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 184', '2023-10-31 05:04:09'),
(372, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 185', '2023-10-31 05:04:09'),
(373, 10, 'PAY USING STKR WALLET', 'Purchase built_game_id: 147', '2023-10-31 05:06:08'),
(374, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 553', '2023-11-01 08:25:05'),
(375, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 119', '2023-11-01 09:23:10'),
(376, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 148', '2023-11-01 09:23:51'),
(377, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 145', '2023-11-01 09:25:35'),
(378, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 148', '2023-11-01 09:25:35'),
(379, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 145', '2023-11-01 09:34:53'),
(380, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 139', '2023-11-01 09:36:14'),
(381, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 140', '2023-11-01 09:36:14'),
(382, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 148', '2023-11-01 09:36:14'),
(383, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 120', '2023-11-06 04:52:11'),
(384, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 121', '2023-11-06 04:54:10'),
(385, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 149', '2023-11-06 04:56:21'),
(386, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 186', '2023-11-06 05:02:34'),
(387, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 145', '2023-11-06 08:09:09'),
(388, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 185', '2023-11-06 08:36:45'),
(389, 13, 'PAY USING STKR WALLET', 'Purchase published_game_id: 185', '2023-11-08 10:10:18'),
(390, 13, 'PAY USING STKR WALLET', 'Purchase ticket_id: 122', '2023-11-09 08:34:14'),
(391, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 560', '2023-11-10 07:22:16'),
(392, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 186', '2023-11-10 07:22:16'),
(393, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 561', '2023-11-10 07:23:51'),
(394, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 562', '2023-11-10 08:00:53'),
(395, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 124', '2023-11-11 07:47:28'),
(396, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 144', '2023-11-11 07:47:28'),
(397, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 185', '2023-11-11 15:18:32'),
(398, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 125', '2023-11-12 12:30:05'),
(399, 15, 'PAY USING PAYPAL', 'Purchase ticket_id: 126', '2023-11-12 12:32:28'),
(400, 15, 'PAY USING PAYPAL', 'Purchase built_game_id: 150', '2023-11-12 12:34:25'),
(401, 15, 'PAY USING PAYPAL', 'Purchase built_game_id: 150', '2023-11-12 12:38:28'),
(402, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 150', '2023-11-12 12:46:22'),
(403, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 127', '2023-11-12 14:32:05'),
(404, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 151', '2023-11-12 15:19:31'),
(405, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 128', '2023-11-12 23:58:16'),
(406, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 150', '2023-11-12 23:58:16'),
(407, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 146', '2023-11-13 09:13:35'),
(408, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 153', '2023-11-13 09:14:10'),
(409, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 145', '2023-11-13 09:14:10'),
(410, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 187', '2023-11-15 06:18:48'),
(411, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 188', '2023-11-15 07:06:21'),
(412, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 575', '2023-11-15 07:09:30'),
(413, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 574', '2023-11-15 07:09:30'),
(414, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 187', '2023-11-15 08:11:24'),
(415, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 187', '2023-11-15 08:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay_name`, `city_id`) VALUES
(1, 'Barangay 287', 2),
(2, 'Barangay 1', 2),
(3, 'Barangay 2', 2),
(4, 'Barangay 3', 2),
(5, 'Barangay 4', 2),
(6, 'Barangay 5', 2),
(7, 'Bagong Barrio', 3),
(8, 'Barangay 12', 3),
(9, 'Barangay 14', 3),
(10, 'Barangay 15', 3),
(11, 'Barangay 16', 3),
(12, 'CAA/BF International', 4),
(13, 'Daniel Fajardo', 4),
(14, 'Elias Aldana', 4),
(15, 'Ilaya', 4),
(16, 'Manuyo', 4),
(17, 'Bangkal', 5),
(18, 'Bel-Air', 5),
(19, 'Carmona', 5),
(20, 'Dasmariñas', 5),
(21, 'Forbes Park', 5),
(22, 'Acacia', 6),
(23, 'Baritan', 6),
(24, 'Bayan-bayanan', 6),
(25, 'Catmon', 6),
(26, 'Concepcion', 6),
(27, 'Addition Hills', 7),
(28, 'Bagong Silang', 7),
(29, 'Barangka Drive', 7),
(30, 'Buayang Bato', 7),
(31, 'Daang Bakal', 7),
(32, '28th Street', 8),
(33, '49th Street', 8),
(34, 'Last Barangay', 8),
(35, 'Barangay 1', 9),
(36, 'Barangay 2', 9),
(37, 'Barangay 3', 9),
(38, 'Barangay 4', 9),
(39, 'Barangay 5', 9),
(40, 'Barangay 1', 10),
(41, 'Barangay 2', 10),
(42, 'Barangay 3', 10),
(43, 'Barangay 4', 10),
(44, 'Barangay 5', 10),
(45, 'Barangay 1', 11),
(46, 'Barangay 2', 11),
(47, 'Barangay 3', 11),
(48, 'Barangay 4', 11),
(49, 'Barangay 5', 11),
(50, 'Barangay 1', 12),
(51, 'Barangay 2', 12),
(52, 'Barangay 3', 12),
(53, 'Barangay 4', 12),
(54, 'Barangay 5', 12),
(55, 'Barangay 1', 13),
(56, 'Barangay 2', 13),
(57, 'Barangay 3', 13),
(58, 'Barangay 4', 13),
(59, 'Barangay 5', 13),
(60, 'Barangay 1', 14),
(61, 'Barangay 2', 14),
(62, 'Barangay 3', 14),
(63, 'Barangay 4', 14),
(64, 'Barangay 5', 14),
(65, 'Barangay 1', 15),
(66, 'Barangay 2', 15),
(67, 'Barangay 3', 15),
(68, 'Barangay 4', 15),
(69, 'Barangay 5', 15),
(70, 'Barangay 1', 16),
(71, 'Barangay 2', 16),
(72, 'Barangay 3', 16),
(73, 'Barangay 4', 16),
(74, 'Barangay 5', 16),
(75, 'Barangay 1', 17),
(76, 'Barangay 2', 17),
(77, 'Barangay 3', 17),
(78, 'Barangay 4', 17),
(79, 'Barangay 5', 17),
(80, 'Barangay 1', 18),
(81, 'Barangay 2', 18),
(82, 'Barangay 3', 18),
(83, 'Barangay 4', 18),
(84, 'Barangay 5', 18),
(85, 'Barangay 1', 19),
(86, 'Barangay 2', 19),
(87, 'Barangay 3', 19),
(88, 'Barangay 4', 19),
(89, 'Barangay 5', 19);

-- --------------------------------------------------------

--
-- Table structure for table `built_games`
--

CREATE TABLE `built_games` (
  `built_game_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `build_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_pending` tinyint(4) DEFAULT 0,
  `is_canceled` tinyint(4) DEFAULT 0,
  `is_approved` tinyint(4) DEFAULT 0,
  `is_at_cart` tinyint(4) NOT NULL DEFAULT 0,
  `is_semi_purchased` tinyint(4) NOT NULL DEFAULT 0,
  `is_purchased` tinyint(4) DEFAULT 0,
  `is_pending_published` tinyint(4) NOT NULL DEFAULT 0,
  `is_request_denied` tinyint(4) NOT NULL DEFAULT 0,
  `is_published` tinyint(4) DEFAULT 0,
  `price` decimal(10,2) NOT NULL,
  `ticket_cost` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games`
--

INSERT INTO `built_games` (`built_game_id`, `game_id`, `name`, `description`, `creator_id`, `build_date`, `is_pending`, `is_canceled`, `is_approved`, `is_at_cart`, `is_semi_purchased`, `is_purchased`, `is_pending_published`, `is_request_denied`, `is_published`, `price`, `ticket_cost`) VALUES
(150, 221, 'Dungeons and Donkeys', 'DND but donkeys', 15, '2023-11-12 20:33:02', 0, 0, 1, 0, 1, 1, 0, 0, 1, 54.40, 5.44),
(151, 221, 'Dungeons and Dsonkeys', 'DND but donkeys', 15, '2023-11-12 22:32:37', 0, 0, 1, 0, 0, 1, 0, 0, 1, 54.40, 5.44),
(152, 221, 'Dungseons ansd Dosssnkeys', 'DND but donkeys', 15, '2023-11-13 07:59:06', 0, 0, 1, 0, 0, 0, 0, 0, 0, 54.40, 5.44),
(153, 221, 'Dunsgeons and Donkeyss', 'DND but jjdonkeys', 15, '2023-11-13 09:37:07', 0, 0, 1, 0, 0, 1, 1, 0, 0, 7.40, 0.74);

-- --------------------------------------------------------

--
-- Table structure for table `built_games_added_game_components`
--

CREATE TABLE `built_games_added_game_components` (
  `added_component_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `is_custom_design` tinyint(4) DEFAULT NULL,
  `custom_design_file_path` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games_added_game_components`
--

INSERT INTO `built_games_added_game_components` (`added_component_id`, `built_game_id`, `game_id`, `component_id`, `is_custom_design`, `custom_design_file_path`, `quantity`, `color_id`, `size`) VALUES
(559, 150, 221, 3, 0, '', 1, 1, '7x7'),
(560, 150, 221, 1, 1, 'uploads/6550c3fae3ef5_IMG_20231112_154523.jpg', 3, 0, '7x7'),
(561, 150, 221, 2, 0, '', 1, 0, '7x7'),
(562, 151, 221, 3, 0, '', 1, 1, '7x7'),
(563, 151, 221, 1, 1, 'uploads/6550c3fae3ef5_IMG_20231112_154523.jpg', 3, 0, '7x7'),
(564, 151, 221, 2, 0, '', 1, 0, '7x7'),
(565, 152, 221, 3, 0, '', 1, 1, '7x7'),
(566, 152, 221, 1, 1, 'uploads/6550c3fae3ef5_IMG_20231112_154523.jpg', 3, 0, '7x7'),
(567, 152, 221, 2, 0, '', 1, 0, '7x7'),
(568, 153, 221, 3, 0, '', 1, 1, '7x7');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_order_reasons`
--

CREATE TABLE `cancel_order_reasons` (
  `cancel_order_reason_id` int(11) NOT NULL,
  `reason_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancel_order_reasons`
--

INSERT INTO `cancel_order_reasons` (`cancel_order_reason_id`, `reason_text`) VALUES
(1, 'Need to change delivery address'),
(2, 'Need to modify order (size, color, quantity, etc.)'),
(3, 'Don\'t want to buy anymore'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `published_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_visible` tinyint(1) DEFAULT 1,
  `is_only_one_quantity` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `published_game_id`, `game_id`, `built_game_id`, `added_component_id`, `ticket_id`, `quantity`, `price`, `is_active`, `is_visible`, `is_only_one_quantity`) VALUES
(932, 15, NULL, 221, NULL, NULL, 125, 1, 5.44, 1, 0, 0),
(933, 15, NULL, 221, NULL, NULL, 126, 1, 5.44, 1, 0, 0),
(934, 15, NULL, 221, 150, NULL, NULL, 1, 48.96, 1, 0, 0),
(935, 15, NULL, 221, 150, NULL, NULL, 1, 48.96, 1, 0, 0),
(936, 15, NULL, 221, 150, NULL, NULL, 1, 54.40, 1, 0, 0),
(937, 15, NULL, 221, NULL, NULL, 127, 1, 5.44, 1, 0, 0),
(938, 15, NULL, 221, 151, NULL, NULL, 10, 48.96, 1, 0, 0),
(939, 15, NULL, 221, 150, NULL, NULL, 1, 54.40, 1, 0, 0),
(940, 15, NULL, 221, NULL, NULL, 128, 1, 5.44, 1, 0, 0),
(967, 15, NULL, 221, NULL, NULL, 145, 1, 0.74, 1, 0, 0),
(968, 3, NULL, 219, NULL, NULL, 146, 1, 19.88, 1, 0, 0),
(969, 15, NULL, 221, 153, NULL, NULL, 2, 6.66, 1, 0, 1),
(970, 15, NULL, 221, 153, NULL, NULL, 2, 7.40, 1, 1, 0),
(971, 3, 187, NULL, NULL, NULL, NULL, 3, 104.40, 1, 0, 0),
(972, 3, 188, NULL, NULL, NULL, NULL, 5, 74.40, 1, 0, 0),
(976, 3, NULL, NULL, NULL, 574, NULL, 1, 11.00, 1, 0, 0),
(977, 3, NULL, NULL, NULL, 575, NULL, 1, 11.00, 1, 0, 0),
(978, 3, 187, NULL, NULL, NULL, NULL, 10, 104.40, 1, 0, 0),
(979, 3, 187, NULL, NULL, NULL, NULL, 2, 104.40, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Board Games'),
(2, 'Card Games'),
(3, 'Dice Games'),
(4, 'Promotional'),
(5, 'RPGs'),
(6, 'War Games');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `province_id`) VALUES
(2, 'Binondo', 1),
(3, 'Caloocan', 1),
(4, 'Las Piñas', 1),
(5, 'Makati', 1),
(6, 'Malabon', 1),
(7, 'Mandaluyong', 1),
(8, 'Manila', 1),
(9, 'Marikina', 1),
(10, 'Muntinlupa', 1),
(11, 'Navotas', 1),
(12, 'Parañaque', 1),
(13, 'Pasay', 1),
(14, 'Pasig', 1),
(15, 'Pateros', 1),
(16, 'Quezon City', 1),
(17, 'San Juan', 1),
(18, 'Taguig', 1),
(19, 'Valenzuela', 1),
(20, 'Butuan City', 2),
(21, 'Cabadbaran', 2),
(22, 'Bayugan', 3),
(23, 'Prosperidad', 3),
(24, 'San Francisco', 3),
(25, 'Talacogon', 3),
(26, 'Trento', 3),
(27, 'Veruela', 3),
(28, 'Basilan', 4),
(29, 'Isabela City', 4),
(30, 'Malaybalay', 5),
(31, 'Valencia', 5),
(32, 'Mambajao', 6),
(33, 'Nabunturan', 7),
(34, 'Tagum', 7),
(35, 'Kidapawan', 8),
(36, 'Panabo', 9),
(37, 'Tagum', 9),
(38, 'Digos', 10),
(39, 'Matanao', 10),
(40, 'Mati', 11),
(41, 'Basilisa', 12),
(42, 'Cagdianao', 12),
(43, 'Dinagat', 12),
(44, 'Libjo', 12),
(45, 'Loreto', 12),
(46, 'San Jose', 12),
(47, 'Tubajon', 12),
(48, 'Iligan', 13),
(49, 'Linamon', 13),
(50, 'Matungao', 13),
(51, 'Pantao Ragat', 13),
(52, 'Pantar', 13),
(53, 'Sapad', 13),
(54, 'Sultan Naga Dimaporo', 13),
(55, 'Tagoloan', 13),
(56, 'Tangcal', 13),
(57, 'Tubod', 13),
(58, 'Marawi', 14),
(59, 'Buldon', 15),
(60, 'Datu Paglas', 15),
(61, 'Datu Saudi Ampatuan', 15),
(62, 'Mamasapano', 15),
(63, 'Mangudadatu', 15),
(64, 'Pagalungan', 15),
(65, 'Paglat', 15),
(66, 'Pandag', 15),
(67, 'Rajah Buayan', 15),
(68, 'Shariff Aguak', 15),
(69, 'South Upi', 15),
(70, 'Sultan Kudarat', 15),
(71, 'Sultan Mastura', 15),
(72, 'Sultan Sa Barongis', 15),
(73, 'Talayan', 15),
(74, 'Upi', 15),
(75, 'Oroquieta', 16),
(76, 'Ozamiz', 16),
(77, 'Tangub', 16),
(78, 'Cagayan de Oro', 17),
(79, 'Gingoog', 17),
(80, 'Kidapawan', 18),
(81, 'Alabel', 19),
(82, 'General Santos', 20),
(83, 'Koronadal', 20),
(84, 'Isulan', 21),
(85, 'Jolo', 22),
(86, 'Siasi', 22),
(87, 'Surigao City', 23),
(88, 'Tandag', 24),
(89, 'Bongao', 25),
(90, 'Dapitan', 26),
(91, 'Dipolog', 26),
(92, 'Pagadian', 27),
(93, 'Ipil', 28),
(94, 'Bangued', 32),
(95, 'Boliney', 32),
(96, 'Bucay', 32),
(97, 'Bucloc', 32),
(98, 'Daguioman', 32),
(99, 'Danglas', 32),
(100, 'Dolores', 32),
(101, 'La Paz', 32),
(102, 'Lacub', 32),
(103, 'Lagangilang', 32),
(104, 'Lagayan', 32),
(105, 'Langiden', 32),
(106, 'Licuan-Baay', 32),
(107, 'Luba', 32),
(108, 'Malibcong', 32),
(109, 'Manabo', 32),
(110, 'Penarrubia', 32),
(111, 'Pidigan', 32),
(112, 'Pilar', 32),
(113, 'Sallapadan', 32),
(114, 'San Isidro', 32),
(115, 'San Juan', 32),
(116, 'San Quintin', 32),
(117, 'Tayum', 32),
(118, 'Tineg', 32),
(119, 'Tubo', 32),
(120, 'Villaviciosa', 32),
(121, 'Bangued', 32),
(122, 'Boliney', 32),
(123, 'Bucay', 32),
(124, 'Bucloc', 32),
(125, 'Daguioman', 32),
(126, 'Danglas', 32),
(127, 'Dolores', 32),
(128, 'La Paz', 32),
(129, 'Lacub', 32),
(130, 'Lagangilang', 32),
(131, 'Lagayan', 32),
(132, 'Langiden', 32),
(133, 'Licuan-Baay', 32),
(134, 'Luba', 32),
(135, 'Malibcong', 32),
(136, 'Manabo', 32),
(137, 'Penarrubia', 32),
(138, 'Pidigan', 32),
(139, 'Pilar', 32),
(140, 'Sallapadan', 32),
(141, 'San Isidro', 32),
(142, 'San Juan', 32),
(143, 'San Quintin', 32),
(144, 'Tayum', 32),
(145, 'Tineg', 32),
(146, 'Tubo', 32),
(147, 'Villaviciosa', 32),
(148, 'Calanasan', 33),
(149, 'Conner', 33),
(150, 'Flora', 33),
(151, 'Kabugao', 33),
(152, 'Luna', 33),
(153, 'Pudtol', 33),
(154, 'Santa Marcela', 33),
(155, 'Atok', 34),
(156, 'Baguio', 34),
(157, 'Bakun', 34),
(158, 'Bokod', 34),
(159, 'Buguias', 34),
(160, 'Itogon', 34),
(161, 'Kabayan', 34),
(162, 'Kapangan', 34),
(163, 'Kibungan', 34),
(164, 'La Trinidad', 34),
(165, 'Mankayan', 34),
(166, 'Sablan', 34),
(167, 'Tuba', 34),
(168, 'Tublay', 34),
(169, 'Abulug', 35),
(170, 'Alcala', 35),
(171, 'Allacapan', 35),
(172, 'Amulung', 35),
(173, 'Aparri', 35),
(174, 'Baggao', 35),
(175, 'Ballesteros', 35),
(176, 'Buguey', 35),
(177, 'Calayan', 35),
(178, 'Camalaniugan', 35),
(179, 'Claveria', 35),
(180, 'Enrile', 35),
(181, 'Gattaran', 35),
(182, 'Gonzaga', 35),
(183, 'Iguig', 35),
(184, 'Lal-lo', 35),
(185, 'Lasam', 35),
(186, 'Pamplona', 35),
(187, 'Peñablanca', 35),
(188, 'Piat', 35),
(189, 'Rizal', 35),
(190, 'Sanchez-Mira', 35),
(191, 'Santa Ana', 35),
(192, 'Santa Praxedes', 35),
(193, 'Santa Teresita', 35),
(194, 'Santo Niño', 35),
(195, 'Solana', 35),
(196, 'Tuao', 35),
(197, 'Tuguegarao', 35),
(198, 'Aguinaldo', 36),
(199, 'Alfonso Lista', 36),
(200, 'Asipulo', 36),
(201, 'Banaue', 36),
(202, 'Hingyon', 36),
(203, 'Hungduan', 36),
(204, 'Kiangan', 36),
(205, 'Lagawe', 36),
(206, 'Lamut', 36),
(207, 'Mayoyao', 36),
(208, 'Tinoc', 36),
(209, 'Adams', 37),
(210, 'Bacarra', 37),
(211, 'Badoc', 37),
(212, 'Bangui', 37),
(213, 'Banna', 37),
(214, 'Batac', 37),
(215, 'Burgos', 37),
(216, 'Carasi', 37),
(217, 'Currimao', 37),
(218, 'Dingras', 37),
(219, 'Dumalneg', 37),
(220, 'Marcos', 37),
(221, 'Nueva Era', 37),
(222, 'Pagudpud', 37),
(223, 'Paoay', 37),
(224, 'Pasuquin', 37),
(225, 'Piddig', 37),
(226, 'Pinili', 37),
(227, 'San Nicolas', 37),
(228, 'Sarrat', 37),
(229, 'Solsona', 37),
(230, 'Vintar', 37),
(231, 'Alilem', 38),
(232, 'Banayoyo', 38),
(233, 'Bantay', 38),
(234, 'Burgos', 38),
(235, 'Cabugao', 38),
(236, 'Candon', 38),
(237, 'Caoayan', 38),
(238, 'Cervantes', 38),
(239, 'Galimuyod', 38),
(240, 'Gregorio Del Pilar', 38),
(241, 'Lidlidda', 38),
(242, 'Magsingal', 38),
(243, 'Nagbukel', 38),
(244, 'Narvacan', 38),
(245, 'Quirino', 38),
(246, 'Salcedo', 38),
(247, 'San Emilio', 38),
(248, 'San Esteban', 38),
(249, 'San Ildefonso', 38),
(250, 'San Juan', 38),
(251, 'San Vicente', 38),
(252, 'Santa', 38),
(253, 'Santa Catalina', 38),
(254, 'Santa Cruz', 38),
(255, 'Santa Lucia', 38),
(256, 'Santa Maria', 38),
(257, 'Santiago', 38),
(258, 'Santo Domingo', 38),
(259, 'Sigay', 38),
(260, 'Sinait', 38),
(261, 'Sugpon', 38),
(262, 'Suyo', 38),
(263, 'Tagudin', 38),
(264, 'Vigan', 38),
(265, 'Alicia', 39),
(266, 'Angadanan', 39),
(267, 'Aurora', 39),
(268, 'Benito Soliven', 39),
(269, 'Burgos', 39),
(270, 'Cabagan', 39),
(271, 'Cabatuan', 39),
(272, 'Cauayan', 39),
(273, 'Cordon', 39),
(274, 'Delfin Albano', 39),
(275, 'Dinapigue', 39),
(276, 'Divilacan', 39),
(277, 'Echague', 39),
(278, 'Gamu', 39),
(279, 'Ilagan', 39),
(280, 'Jones', 39),
(281, 'Luna', 39),
(282, 'Maconacon', 39),
(283, 'Mallig', 39),
(284, 'Naguilian', 39),
(285, 'Palanan', 39),
(286, 'Quezon', 39),
(287, 'Quirino', 39),
(288, 'Ramon', 39),
(289, 'Reina Mercedes', 39),
(290, 'Roxas', 39),
(291, 'San Agustin', 39),
(292, 'San Guillermo', 39),
(293, 'San Isidro', 39),
(294, 'San Manuel', 39),
(295, 'San Mariano', 39),
(296, 'San Mateo', 39),
(297, 'San Pablo', 39),
(298, 'Santa Maria', 39),
(299, 'Santiago', 39),
(300, 'Santo Tomas', 39),
(301, 'Tumauini', 39),
(302, 'Balbalan', 40),
(303, 'Lubuagan', 40),
(304, 'Pasil', 40),
(305, 'Pinukpuk', 40),
(306, 'Rizal', 40),
(307, 'Tabuk', 40),
(308, 'Tanudan', 40),
(309, 'Tinglayan', 40),
(310, 'Agoo', 41),
(311, 'Aringay', 41),
(312, 'Bacnotan', 41),
(313, 'Bagulin', 41),
(314, 'Balaoan', 41),
(315, 'Bangar', 41),
(316, 'Bauang', 41),
(317, 'Burgos', 41),
(318, 'Caba', 41),
(319, 'Luna', 41),
(320, 'Naguilian', 41),
(321, 'Pugo', 41),
(322, 'Rosario', 41),
(323, 'San Fernando', 41),
(324, 'San Gabriel', 41),
(325, 'San Juan', 41),
(326, 'Santo Tomas', 41),
(327, 'Santol', 41),
(328, 'Sudipen', 41),
(329, 'Tubao', 41),
(330, 'Alfonso Castaneda', 42),
(331, 'Ambaguio', 42),
(332, 'Aritao', 42),
(333, 'Bagabag', 42),
(334, 'Bambang', 42),
(335, 'Bayombong', 42),
(336, 'Diadi', 42),
(337, 'Dupax Del Norte', 42),
(338, 'Dupax Del Sur', 42),
(339, 'Kasibu', 42),
(340, 'Kayapa', 42),
(341, 'Quezon', 42),
(342, 'Santa Fe', 42),
(343, 'Solano', 42),
(344, 'Villaverde', 42),
(345, 'Agno', 43),
(346, 'Aguilar', 43),
(347, 'Alaminos', 43),
(348, 'Alcala', 43),
(349, 'Anda', 43),
(350, 'Asingan', 43),
(351, 'Balungao', 43),
(352, 'Bani', 43),
(353, 'Basista', 43),
(354, 'Bautista', 43),
(355, 'Bayambang', 43),
(356, 'Binalonan', 43),
(357, 'Binmaley', 43),
(358, 'Bolinao', 43),
(359, 'Bugallon', 43),
(360, 'Burgos', 43),
(361, 'Calasiao', 43),
(362, 'Dagupan', 43),
(363, 'Dasol', 43),
(364, 'Infanta', 43),
(365, 'Labrador', 43),
(366, 'Laoac', 43),
(367, 'Lingayen', 43),
(368, 'Mabini', 43),
(369, 'Malasiqui', 43),
(370, 'Manaoag', 43),
(371, 'Mangaldan', 43),
(372, 'Mangatarem', 43),
(373, 'Mapandan', 43),
(374, 'Natividad', 43),
(375, 'Pozorrubio', 43),
(376, 'Rosales', 43),
(377, 'San Carlos', 43),
(378, 'San Fabian', 43),
(379, 'San Jacinto', 43),
(380, 'San Manuel', 43),
(381, 'San Nicolas', 43),
(382, 'San Quintin', 43),
(383, 'Santa Barbara', 43),
(384, 'Santa Maria', 43),
(385, 'Santo Tomas', 43),
(386, 'Sison', 43),
(387, 'Sual', 43),
(388, 'Tayug', 43),
(389, 'Umingan', 43),
(390, 'Urbiztondo', 43),
(391, 'Urdaneta', 43),
(392, 'Villasis', 43),
(393, 'Aglipay', 44),
(394, 'Cabarroguis', 44),
(395, 'Diffun', 44),
(396, 'Maddela', 44),
(397, 'Nagtipunan', 44),
(398, 'Saguday', 44),
(399, 'Bacacay', 45),
(400, 'Camalig', 45),
(401, 'Daraga', 45),
(402, 'Guinobatan', 45),
(403, 'Jovellar', 45),
(404, 'Legazpi', 45),
(405, 'Libon', 45),
(406, 'Ligao', 45),
(407, 'Malilipot', 45),
(408, 'Malinao', 45),
(409, 'Manito', 45),
(410, 'Oas', 45),
(411, 'Pio Duran', 45),
(412, 'Polangui', 45),
(413, 'Rapu-Rapu', 45),
(414, 'Santo Domingo', 45),
(415, 'Tiwi', 45),
(416, 'Agoncillo', 46),
(417, 'Alitagtag', 46),
(418, 'Balayan', 46),
(419, 'Balete', 46),
(420, 'Bauan', 46),
(421, 'Calaca', 46),
(422, 'Calatagan', 46),
(423, 'Cuenca', 46),
(424, 'Ibaan', 46),
(425, 'Laurel', 46),
(426, 'Lemery', 46),
(427, 'Lian', 46),
(428, 'Lipa', 46),
(429, 'Lobo', 46),
(430, 'Mabini', 46),
(431, 'Malvar', 46),
(432, 'Mataasnakahoy', 46),
(433, 'Nasugbu', 46),
(434, 'Padre Garcia', 46),
(435, 'Rosario', 46),
(436, 'San Jose', 46),
(437, 'San Juan', 46),
(438, 'San Luis', 46),
(439, 'San Nicolas', 46),
(440, 'San Pascual', 46),
(441, 'Santa Teresita', 46),
(442, 'Santo Tomas', 46),
(443, 'Taal', 46),
(444, 'Talisay', 46),
(445, 'Tanauan', 46),
(446, 'Taysan', 46),
(447, 'Tingloy', 46),
(448, 'Tuy', 46),
(449, 'Basud', 47),
(450, 'Capalonga', 47),
(451, 'Daet', 47),
(452, 'Jose Panganiban', 47),
(453, 'Labo', 47),
(454, 'Mercedes', 47),
(455, 'Paracale', 47),
(456, 'San Lorenzo Ruiz', 47),
(457, 'San Vicente', 47),
(458, 'Santa Elena', 47),
(459, 'Talisay', 47),
(460, 'Vinzons', 47),
(461, 'Baao', 48),
(462, 'Balatan', 48),
(463, 'Bato', 48),
(464, 'Bombon', 48),
(465, 'Buhi', 48),
(466, 'Bula', 48),
(467, 'Cabusao', 48),
(468, 'Calabanga', 48),
(469, 'Camaligan', 48),
(470, 'Canaman', 48),
(471, 'Caramoan', 48),
(472, 'Del Gallego', 48),
(473, 'Gainza', 48),
(474, 'Garchitorena', 48),
(475, 'Goa', 48),
(476, 'Iriga', 48),
(477, 'Lagonoy', 48),
(478, 'Libmanan', 48),
(479, 'Lupi', 48),
(480, 'Magarao', 48),
(481, 'Milaor', 48),
(482, 'Minalabac', 48),
(483, 'Nabua', 48),
(484, 'Naga', 48),
(485, 'Ocampo', 48),
(486, 'Pamplona', 48),
(487, 'Pasacao', 48),
(488, 'Pili', 48),
(489, 'Presentacion', 48),
(490, 'Ragay', 48),
(491, 'Sagnay', 48),
(492, 'San Fernando', 48),
(493, 'San Jose', 48),
(494, 'Sipocot', 48),
(495, 'Siruma', 48),
(496, 'Tigaon', 48),
(497, 'Tinambac', 48),
(498, 'Bagamanoc', 49),
(499, 'Baras', 49),
(500, 'Bato', 49),
(501, 'Caramoran', 49),
(502, 'Gigmoto', 49),
(503, 'Pandan', 49),
(504, 'Panganiban', 49),
(505, 'San Andres', 49),
(506, 'San Miguel', 49),
(507, 'Viga', 49),
(508, 'Virac', 49),
(509, 'Alfonso', 50),
(510, 'Amadeo', 50),
(511, 'Bacoor', 50),
(512, 'Carmona', 50),
(513, 'Cavite City', 50),
(514, 'Dasmariñas', 50),
(515, 'General Emilio Aguinaldo', 50),
(516, 'General Mariano Alvarez', 50),
(517, 'General Trias', 50),
(518, 'Imus', 50),
(519, 'Indang', 50),
(520, 'Kawit', 50),
(521, 'Magallanes', 50),
(522, 'Maragondon', 50),
(523, 'Mendez', 50),
(524, 'Naic', 50),
(525, 'Noveleta', 50),
(526, 'Rosario', 50),
(527, 'Silang', 50),
(528, 'Tagaytay', 50),
(529, 'Tanza', 50),
(530, 'Ternate', 50),
(531, 'Trece Martires', 50),
(532, 'Alaminos', 51),
(533, 'Bay', 51),
(534, 'Biñan', 51),
(535, 'Cabuyao', 51),
(536, 'Calamba', 51),
(537, 'Calauan', 51),
(538, 'Cavinti', 51),
(539, 'Famy', 51),
(540, 'Kalayaan', 51),
(541, 'Liliw', 51),
(542, 'Los Baños', 51),
(543, 'Luisiana', 51),
(544, 'Lumban', 51),
(545, 'Mabitac', 51),
(546, 'Magdalena', 51),
(547, 'Majayjay', 51),
(548, 'Nagcarlan', 51),
(549, 'Paete', 51),
(550, 'Pagsanjan', 51),
(551, 'Pakil', 51),
(552, 'Pangil', 51),
(553, 'Pila', 51),
(554, 'Rizal', 51),
(555, 'San Pablo', 51),
(556, 'San Pedro', 51),
(557, 'Santa Cruz', 51),
(558, 'Santa Maria', 51),
(559, 'Santa Rosa', 51),
(560, 'Siniloan', 51),
(561, 'Victoria', 51),
(562, 'Boac', 52),
(563, 'Buenavista', 52),
(564, 'Gasan', 52),
(565, 'Mogpog', 52),
(566, 'Santa Cruz', 52),
(567, 'Torrijos', 52),
(568, 'Aroroy', 53),
(569, 'Baleno', 53),
(570, 'Balud', 53),
(571, 'Batuan', 53),
(572, 'Cataingan', 53),
(573, 'Cawayan', 53),
(574, 'Claveria', 53),
(575, 'Dimasalang', 53),
(576, 'Esperanza', 53),
(577, 'Mandaon', 53),
(578, 'Masbate City', 53),
(579, 'Milagros', 53),
(580, 'Mobo', 53),
(581, 'Monreal', 53),
(582, 'Palanas', 53),
(583, 'Pio V. Corpuz', 53),
(584, 'Placer', 53),
(585, 'San Fernando', 53),
(586, 'San Jacinto', 53),
(587, 'San Pascual', 53),
(588, 'Uson', 53),
(589, 'Abra de Ilog', 54),
(590, 'Calintaan', 54),
(591, 'Looc', 54),
(592, 'Lubang', 54),
(593, 'Magsaysay', 54),
(594, 'Mamburao', 54),
(595, 'Paluan', 54),
(596, 'Rizal', 54),
(597, 'Sablayan', 54),
(598, 'San Jose', 54),
(599, 'Santa Cruz', 54),
(600, 'Baco', 55),
(601, 'Bansud', 55),
(602, 'Bongabong', 55),
(603, 'Bulalacao', 55),
(604, 'Calapan', 55),
(605, 'Gloria', 55),
(606, 'Mansalay', 55),
(607, 'Naujan', 55),
(608, 'Pinamalayan', 55),
(609, 'Pola', 55),
(610, 'Puerto Galera', 55),
(611, 'Roxas', 55),
(612, 'San Teodoro', 55),
(613, 'Socorro', 55),
(614, 'Victoria', 55),
(615, 'Aborlan', 56),
(616, 'Agutaya', 56),
(617, 'Araceli', 56),
(618, 'Balabac', 56),
(619, 'Bataraza', 56),
(620, 'Brooke\'s Point', 56),
(621, 'Busuanga', 56),
(622, 'Cagayancillo', 56),
(623, 'Coron', 56),
(624, 'Culion', 56),
(625, 'Cuyo', 56),
(626, 'Dumaran', 56),
(627, 'El Nido', 56),
(628, 'Kalayaan', 56),
(629, 'Linapacan', 56),
(630, 'Magsaysay', 56),
(631, 'Narra', 56),
(632, 'Puerto Princesa', 56),
(633, 'Quezon', 56),
(634, 'Rizal', 56),
(635, 'Roxas', 56),
(636, 'San Vicente', 56),
(637, 'Sofronio Española', 56),
(638, 'Taytay', 56),
(639, 'Agdangan', 57),
(640, 'Alabat', 57),
(641, 'Atimonan', 57),
(642, 'Buenavista', 57),
(643, 'Burdeos', 57),
(644, 'Calauag', 57),
(645, 'Candelaria', 57),
(646, 'Catanauan', 57),
(647, 'Dolores', 57),
(648, 'General Luna', 57),
(649, 'General Nakar', 57),
(650, 'Guinayangan', 57),
(651, 'Gumaca', 57),
(652, 'Infanta', 57),
(653, 'Jomalig', 57),
(654, 'Lopez', 57),
(655, 'Lucban', 57),
(656, 'Lucena', 57),
(657, 'Macalelon', 57),
(658, 'Mauban', 57),
(659, 'Mulanay', 57),
(660, 'Padre Burgos', 57),
(661, 'Pagbilao', 57),
(662, 'Panukulan', 57),
(663, 'Patnanungan', 57),
(664, 'Perez', 57),
(665, 'Pitogo', 57),
(666, 'Plaridel', 57),
(667, 'Polillo', 57),
(668, 'Real', 57),
(669, 'Sampaloc', 57),
(670, 'San Andres', 57),
(671, 'San Antonio', 57),
(672, 'San Francisco', 57),
(673, 'San Narciso', 57),
(674, 'Sariaya', 57),
(675, 'Tagkawayan', 57),
(676, 'Tayabas', 57),
(677, 'Tiaong', 57),
(678, 'Unisan', 57),
(679, 'Angono', 58),
(680, 'Antipolo', 58),
(681, 'Baras', 58),
(682, 'Binangonan', 58),
(683, 'Cainta', 58),
(684, 'Cardona', 58),
(685, 'Jalajala', 58),
(686, 'Morong', 58),
(687, 'Pililla', 58),
(688, 'Rodriguez', 58),
(689, 'San Mateo', 58),
(690, 'Tanay', 58),
(691, 'Taytay', 58),
(692, 'Teresa', 58),
(693, 'Alcantara', 59),
(694, 'Banton', 59),
(695, 'Cajidiocan', 59),
(696, 'Calatrava', 59),
(697, 'Concepcion', 59),
(698, 'Corcuera', 59),
(699, 'Ferrol', 59),
(700, 'Looc', 59),
(701, 'Magdiwang', 59),
(702, 'Odiongan', 59),
(703, 'Romblon', 59),
(704, 'San Agustin', 59),
(705, 'San Andres', 59),
(706, 'San Fernando', 59),
(707, 'San Jose', 59),
(708, 'Santa Fe', 59),
(709, 'Barcelona', 60),
(710, 'Bulan', 60),
(711, 'Bulusan', 60),
(712, 'Casiguran', 60),
(713, 'Castilla', 60),
(714, 'Donsol', 60),
(715, 'Gubat', 60),
(716, 'Irosin', 60),
(717, 'Juban', 60),
(718, 'Magallanes', 60),
(719, 'Matnog', 60),
(720, 'Pilar', 60),
(721, 'Prieto Diaz', 60),
(722, 'Santa Magdalena', 60),
(723, 'Sorsogon City', 60),
(724, 'Altavas', 61),
(725, 'Balete', 61),
(726, 'Banga', 61),
(727, 'Batan', 61),
(728, 'Buruanga', 61),
(729, 'Ibajay', 61),
(730, 'Kalibo', 61),
(731, 'Lezo', 61),
(732, 'Libacao', 61),
(733, 'Madalag', 61),
(734, 'Makato', 61),
(735, 'Malay', 61),
(736, 'Malinao', 61),
(737, 'Nabas', 61),
(738, 'New Washington', 61),
(739, 'Numancia', 61),
(740, 'Tangalan', 61),
(741, 'Anini-y', 62),
(742, 'Barbaza', 62),
(743, 'Belison', 62),
(744, 'Bugasong', 62),
(745, 'Caluya', 62),
(746, 'Culasi', 62),
(747, 'Hamtic', 62),
(748, 'Laua-an', 62),
(749, 'Libertad', 62),
(750, 'Pandan', 62),
(751, 'Patnongon', 62),
(752, 'San Jose', 62),
(753, 'San Remigio', 62),
(754, 'Sebaste', 62),
(755, 'Sibalom', 62),
(756, 'Tibiao', 62),
(757, 'Tobias Fornier', 62),
(758, 'Valderrama', 62),
(759, 'Almeria', 63),
(760, 'Biliran', 63),
(761, 'Cabucgayan', 63),
(762, 'Caibiran', 63),
(763, 'Culaba', 63),
(764, 'Kawayan', 63),
(765, 'Maripipi', 63),
(766, 'Naval', 63),
(767, 'Alburquerque', 64),
(768, 'Alicia', 64),
(769, 'Anda', 64),
(770, 'Antequera', 64),
(771, 'Baclayon', 64),
(772, 'Balilihan', 64),
(773, 'Batuan', 64),
(774, 'Bien Unido', 64),
(775, 'Bilar', 64),
(776, 'Buenavista', 64),
(777, 'Calape', 64),
(778, 'Candijay', 64),
(779, 'Carmen', 64),
(780, 'Catigbian', 64),
(781, 'Clarin', 64),
(782, 'Corella', 64),
(783, 'Cortes', 64),
(784, 'Dagohoy', 64),
(785, 'Danao', 64),
(786, 'Dauis', 64),
(787, 'Dimiao', 64),
(788, 'Duero', 64),
(789, 'Garcia Hernandez', 64),
(790, 'Getafe', 64),
(791, 'Guindulman', 64),
(792, 'Inabanga', 64),
(793, 'Jagna', 64),
(794, 'Lila', 64),
(795, 'Loay', 64),
(796, 'Loboc', 64),
(797, 'Loon', 64),
(798, 'Mabini', 64),
(799, 'Maribojoc', 64),
(800, 'Panglao', 64),
(801, 'Pilar', 64),
(802, 'Pres. Carlos P. Garcia', 64),
(803, 'Sagbayan', 64),
(804, 'San Isidro', 64),
(805, 'San Miguel', 64),
(806, 'Sevilla', 64),
(807, 'Sierra Bullones', 64),
(808, 'Sikatuna', 64),
(809, 'Tagbilaran', 64),
(810, 'Talibon', 64),
(811, 'Trinidad', 64),
(812, 'Tubigon', 64),
(813, 'Ubay', 64),
(814, 'Valencia', 64),
(815, 'Alcantara', 65),
(816, 'Alcoy', 65),
(817, 'Alegria', 65),
(818, 'Aloguinsan', 65),
(819, 'Argao', 65),
(820, 'Asturias', 65),
(821, 'Badian', 65),
(822, 'Balamban', 65),
(823, 'Bantayan', 65),
(824, 'Barili', 65),
(825, 'Bogo', 65),
(826, 'Boljoon', 65),
(827, 'Borbon', 65),
(828, 'Carcar', 65),
(829, 'Carmen', 65),
(830, 'Catmon', 65),
(831, 'Cebu City', 65),
(832, 'Compostela', 65),
(833, 'Consolacion', 65),
(834, 'Cordova', 65),
(835, 'Daanbantayan', 65),
(836, 'Dalaguete', 65),
(837, 'Danao', 65),
(838, 'Dumanjug', 65),
(839, 'Ginatilan', 65),
(840, 'Lapu-Lapu', 65),
(841, 'Liloan', 65),
(842, 'Madridejos', 65),
(843, 'Malabuyoc', 65),
(844, 'Mandaue', 65),
(845, 'Medellin', 65),
(846, 'Minglanilla', 65),
(847, 'Moalboal', 65),
(848, 'Naga', 65),
(849, 'Oslob', 65),
(850, 'Pilar', 65),
(851, 'Pinamungajan', 65),
(852, 'Poro', 65),
(853, 'Ronda', 65),
(854, 'Samboan', 65),
(855, 'San Fernando', 65),
(856, 'San Francisco', 65),
(857, 'San Remigio', 65),
(858, 'Santa Fe', 65),
(859, 'Santander', 65),
(860, 'Sibonga', 65),
(861, 'Sogod', 65),
(862, 'Tabogon', 65),
(863, 'Tabuelan', 65),
(864, 'Talisay', 65),
(865, 'Toledo', 65),
(866, 'Tuburan', 65),
(867, 'Tudela', 65),
(868, 'Arteche', 66),
(869, 'Balangiga', 66),
(870, 'Balangkayan', 66),
(871, 'Borongan', 66),
(872, 'Can-avid', 66),
(873, 'Dolores', 66),
(874, 'General MacArthur', 66),
(875, 'Giporlos', 66),
(876, 'Guiuan', 66),
(877, 'Hernani', 66),
(878, 'Jipapad', 66),
(879, 'Lawaan', 66),
(880, 'Llorente', 66),
(881, 'Maslog', 66),
(882, 'Maydolong', 66),
(883, 'Mercedes', 66),
(884, 'Oras', 66),
(885, 'Quinapondan', 66),
(886, 'Salcedo', 66),
(887, 'San Julian', 66),
(888, 'San Policarpo', 66),
(889, 'Sulat', 66),
(890, 'Taft', 66),
(891, 'Buenavista', 67),
(892, 'Jordan', 67),
(893, 'Nueva Valencia', 67),
(894, 'San Lorenzo', 67),
(895, 'Sibunag', 67),
(896, 'Ajuy', 68),
(897, 'Alimodian', 68),
(898, 'Anilao', 68),
(899, 'Badiangan', 68),
(900, 'Balasan', 68),
(901, 'Banate', 68),
(902, 'Barotac Nuevo', 68),
(903, 'Barotac Viejo', 68),
(904, 'Batad', 68),
(905, 'Bingawan', 68),
(906, 'Cabatuan', 68),
(907, 'Calinog', 68),
(908, 'Carles', 68),
(909, 'Concepcion', 68),
(910, 'Dingle', 68),
(911, 'Dueñas', 68),
(912, 'Dumangas', 68),
(913, 'Estancia', 68),
(914, 'Guimbal', 68),
(915, 'Igbaras', 68),
(916, 'Iloilo City', 68),
(917, 'Janiuay', 68),
(918, 'Lambunao', 68),
(919, 'Leganes', 68),
(920, 'Lemery', 68),
(921, 'Leon', 68),
(922, 'Maasin', 68),
(923, 'Miagao', 68),
(924, 'Mina', 68),
(925, 'New Lucena', 68),
(926, 'Oton', 68),
(927, 'Pavia', 68),
(928, 'Pototan', 68),
(929, 'San Dionisio', 68),
(930, 'San Enrique', 68),
(931, 'San Joaquin', 68),
(932, 'San Miguel', 68),
(933, 'San Rafael', 68),
(934, 'Santa Barbara', 68),
(935, 'Sara', 68),
(936, 'Tigbauan', 68),
(937, 'Tubungan', 68),
(938, 'Zarraga', 68),
(939, 'Abuyog', 69),
(940, 'Alangalang', 69),
(941, 'Albuera', 69),
(942, 'Babatngon', 69),
(943, 'Barugo', 69),
(944, 'Bato', 69),
(945, 'Baybay', 69),
(946, 'Burauen', 69),
(947, 'Calubian', 69),
(948, 'Capoocan', 69),
(949, 'Carigara', 69),
(950, 'Dagami', 69),
(951, 'Dulag', 69),
(952, 'Hilongos', 69),
(953, 'Hindang', 69),
(954, 'Inopacan', 69),
(955, 'Isabel', 69),
(956, 'Jaro', 69),
(957, 'Javier', 69),
(958, 'Julita', 69),
(959, 'Kananga', 69),
(960, 'La Paz', 69),
(961, 'Leyte', 69),
(962, 'MacArthur', 69),
(963, 'Mahaplag', 69),
(964, 'Matag-ob', 69),
(965, 'Matalom', 69),
(966, 'Mayorga', 69),
(967, 'Merida', 69),
(968, 'Ormoc', 69),
(969, 'Palo', 69),
(970, 'Palompon', 69),
(971, 'Pastrana', 69),
(972, 'San Isidro', 69),
(973, 'San Miguel', 69),
(974, 'Santa Fe', 69),
(975, 'Sogod', 69),
(976, 'Tabango', 69),
(977, 'Tabontabon', 69),
(978, 'Tacloban', 69),
(979, 'Tanauan', 69),
(980, 'Tolosa', 69),
(981, 'Tunga', 69),
(982, 'Villaba', 69),
(983, 'Bacolod', 70),
(984, 'Bago', 70),
(985, 'Binalbagan', 70),
(986, 'Cadiz', 70),
(987, 'Calatrava', 70),
(988, 'Candoni', 70),
(989, 'Cauayan', 70),
(990, 'Enrique B. Magalona', 70),
(991, 'Escalante', 70),
(992, 'Himamaylan', 70),
(993, 'Hinigaran', 70),
(994, 'Hinoba-an', 70),
(995, 'Ilog', 70),
(996, 'Isabela', 70),
(997, 'Kabankalan', 70),
(998, 'La Carlota', 70),
(999, 'La Castellana', 70),
(1000, 'Manapla', 70),
(1001, 'Moises Padilla', 70),
(1002, 'Murcia', 70),
(1003, 'Pontevedra', 70),
(1004, 'Pulupandan', 70),
(1005, 'Sagay', 70),
(1006, 'Salvador Benedicto', 70),
(1007, 'San Carlos', 70),
(1008, 'San Enrique', 70),
(1009, 'Silay', 70),
(1010, 'Sipalay', 70),
(1011, 'Talisay', 70),
(1012, 'Toboso', 70),
(1013, 'Valladolid', 70),
(1014, 'Victorias', 70),
(1015, 'Amlan', 71),
(1016, 'Ayungon', 71),
(1017, 'Bacong', 71),
(1018, 'Bais', 71),
(1019, 'Basay', 71),
(1020, 'Bayawan', 71),
(1021, 'Bindoy', 71),
(1022, 'Canlaon', 71),
(1023, 'Dauin', 71),
(1024, 'Dumaguete', 71),
(1025, 'Guihulngan', 71),
(1026, 'Jimalalud', 71),
(1027, 'La Libertad', 71),
(1028, 'Mabinay', 71),
(1029, 'Manjuyod', 71),
(1030, 'Pamplona', 71),
(1031, 'San Jose', 71),
(1032, 'Santa Catalina', 71),
(1033, 'Siaton', 71),
(1034, 'Sibulan', 71),
(1035, 'Tanjay', 71),
(1036, 'Tayasan', 71),
(1037, 'Valencia', 71),
(1038, 'Vallehermoso', 71),
(1039, 'Zamboanguita', 71),
(1040, 'Allen', 72),
(1041, 'Biri', 72),
(1042, 'Bobon', 72),
(1043, 'Capul', 72),
(1044, 'Catarman', 72),
(1045, 'Catubig', 72),
(1046, 'Gamay', 72),
(1047, 'Laoang', 72),
(1048, 'Lapinig', 72),
(1049, 'Las Navas', 72),
(1050, 'Lavezares', 72),
(1051, 'Lope de Vega', 72),
(1052, 'Mapanas', 72),
(1053, 'Mondragon', 72),
(1054, 'Palapag', 72),
(1055, 'Pambujan', 72),
(1056, 'Rosales', 72),
(1057, 'San Antonio', 72),
(1058, 'San Isidro', 72),
(1059, 'San Jose', 72),
(1060, 'San Roque', 72),
(1061, 'San Vicente', 72),
(1062, 'Silvino Lobos', 72),
(1063, 'Victoria', 72),
(1064, 'Almagro', 73),
(1065, 'Basey', 73),
(1066, 'Calbayog', 73),
(1067, 'Calbiga', 73),
(1068, 'Catbalogan', 73),
(1069, 'Daram', 73),
(1070, 'Gandara', 73),
(1071, 'Hinabangan', 73),
(1072, 'Jiabong', 73),
(1073, 'Marabut', 73),
(1074, 'Matuguinao', 73),
(1075, 'Motiong', 73),
(1076, 'Pagsanghan', 73),
(1077, 'Paranas', 73),
(1078, 'Pinabacdao', 73),
(1079, 'San Jorge', 73),
(1080, 'San Jose de Buan', 73),
(1081, 'San Sebastian', 73),
(1082, 'Santa Margarita', 73),
(1083, 'Santa Rita', 73),
(1084, 'Santo Niño', 73),
(1085, 'Tagapul-an', 73),
(1086, 'Talalora', 73),
(1087, 'Tarangnan', 73),
(1088, 'Villareal', 73),
(1089, 'Zumarraga', 73),
(1090, 'Enrique Villanueva', 74),
(1091, 'Larena', 74),
(1092, 'Lazi', 74),
(1093, 'Maria', 74),
(1094, 'San Juan', 74),
(1095, 'Siquijor', 74);

-- --------------------------------------------------------

--
-- Table structure for table `component_assets`
--

CREATE TABLE `component_assets` (
  `asset_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `asset_path` varchar(255) DEFAULT NULL,
  `is_thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_assets`
--

INSERT INTO `component_assets` (`asset_id`, `component_id`, `asset_path`, `is_thumbnail`) VALUES
(1, 1, 'assets/component_assets/asset1.jpg', '1'),
(2, 2, 'assets/component_assets/asset2.jpg', '1'),
(3, 3, 'assets/component_assets/asset3.jpg', '1'),
(17, 4, 'assets/component_assets/asset2.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `component_category`
--

CREATE TABLE `component_category` (
  `component_category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `component_image_path` varchar(255) NOT NULL,
  `is_upload_only` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `component_category`
--

INSERT INTO `component_category` (`component_category_id`, `category`, `component_image_path`, `is_upload_only`) VALUES
(1, 'Game Cards', '', 0),
(2, 'Game Piece', '', 0),
(3, 'Box', '', 0),
(16, 'Rule Book', '', 0),
(18, 'Boards', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `component_colors`
--

CREATE TABLE `component_colors` (
  `color_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_colors`
--

INSERT INTO `component_colors` (`color_id`, `component_id`, `color_name`, `color_code`) VALUES
(1, 3, 'red', '#FF0000'),
(2, 3, 'blue', ' #0000FF'),
(3, 3, 'white', '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `component_templates`
--

CREATE TABLE `component_templates` (
  `template_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_templates`
--

INSERT INTO `component_templates` (`template_id`, `component_id`, `template_name`, `template_file_path`) VALUES
(1, 1, 'side 1', 'assets\\component_templates/template1.bin'),
(2, 1, 'side 2', 'assets\\component_templates/template2.png'),
(3, 2, 'side 3', 'assets\\component_templates/template3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE `constants` (
  `constant_id` int(11) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`constant_id`, `classification`, `image_path`, `text`, `percentage`) VALUES
(1, 'thumbnail_built_game', 'img/i3.jpg', NULL, NULL),
(2, 'approving_ticket_percentage', NULL, NULL, 10.00),
(3, 'thumbnail_ticket', 'img/i1.jpg', NULL, NULL),
(4, 'paypal_client_id', NULL, 'AUtrxFWAdHF9RgdAqRcEjzOICrG5WaXVfckhbUYdcTVDVIz-QnvKNoYqEZ9zE-JI5ViTJEy4AoN6iCJL', NULL),
(5, 'cash_out_fee', NULL, NULL, 20.00),
(6, 'minimum_cash_out_amount', NULL, NULL, 50.00),
(7, 'shipping_discount_percent', NULL, NULL, 50.00),
(8, 'theme_background', 'img/Backgrounds/gradient_grainy.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `courier_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `courier_name`, `courier_logo`) VALUES
(1, 'J&T Express', NULL),
(2, 'Flash Express', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `denied_approve_game_requests`
--

CREATE TABLE `denied_approve_game_requests` (
  `denied_approve_game_request_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denied_approve_game_requests`
--

INSERT INTO `denied_approve_game_requests` (`denied_approve_game_request_id`, `game_id`, `reason`, `file_path`, `timestamp`) VALUES
(12, 221, 'plagiarixed', '../uploads/denied_approve_game_requests/6550c599b8642_Popbins Basket (1).png', '2023-11-12 12:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `denied_publish_requests`
--

CREATE TABLE `denied_publish_requests` (
  `denied_publish_request_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denied_update_publish_requests`
--

CREATE TABLE `denied_update_publish_requests` (
  `denied_update_publish_request_id` int(11) NOT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destination_rates`
--

CREATE TABLE `destination_rates` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(50) NOT NULL,
  `weight_price_1` decimal(6,2) NOT NULL,
  `weight_price_2` decimal(6,2) NOT NULL,
  `weight_price_3` decimal(6,2) NOT NULL,
  `weight_price_4` decimal(6,2) NOT NULL,
  `weight_price_5` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_rates`
--

INSERT INTO `destination_rates` (`destination_id`, `destination_name`, `weight_price_1`, `weight_price_2`, `weight_price_3`, `weight_price_4`, `weight_price_5`) VALUES
(1, 'Metro Manila', 85.00, 115.00, 155.00, 225.00, 305.00),
(2, 'Luzon', 95.00, 165.00, 190.00, 280.00, 370.00),
(3, 'Visayas', 100.00, 180.00, 200.00, 300.00, 400.00),
(4, 'Mindanao', 105.00, 195.00, 220.00, 330.00, 440.00),
(5, 'Island', 115.00, 205.00, 230.00, 340.00, 450.00);

-- --------------------------------------------------------

--
-- Table structure for table `dropzone_published_uploads`
--

CREATE TABLE `dropzone_published_uploads` (
  `upload_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `unique_file_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_category` varchar(255) NOT NULL,
  `faq_type` tinyint(4) NOT NULL,
  `faq_description` text NOT NULL,
  `faq_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_category`, `faq_type`, `faq_description`, `faq_image_path`) VALUES
(1, 'Game Creation', 1, 'About Game Creations', '/assets/help_assets/65352f834cd6a_new pokemon.jpg'),
(2, 'Designing', 1, 'About Designing Components', ''),
(3, 'Paypal Set-up', 1, 'About Paypal Account Set up', ''),
(4, 'Frequently Asked Questions', 0, 'About Question Asked', ''),
(5, 'Customer Service', 0, 'About Our Customer Services', ''),
(6, 'About us', 0, 'Information About STKR HUB', '');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT NULL,
  `is_built` tinyint(4) DEFAULT 0,
  `is_pending` tinyint(1) DEFAULT 0,
  `is_purchased` tinyint(1) DEFAULT 0,
  `to_approve` tinyint(1) NOT NULL DEFAULT 0,
  `is_denied` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `description`, `user_id`, `created_at`, `date_modified`, `is_built`, `is_pending`, `is_purchased`, `to_approve`, `is_denied`, `is_approved`, `is_visible`) VALUES
(219, 'Snakes and Ladders \'\'', '\'\'asdasd\'\n', 3, '2023-11-12 14:36:10', '2023-11-12 12:15:33', 0, 0, 1, 1, 0, 0, 1),
(220, 'askdad \' ', '', 3, '2023-11-12 20:02:05', '2023-11-12 12:02:05', 0, 0, 0, 0, 0, 0, 0),
(221, 'Dunsgeons and Donkeyss', 'DND but donkeys', 15, '2023-11-12 20:22:20', '2023-11-13 01:00:02', 1, 0, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `games_reasons`
--

CREATE TABLE `games_reasons` (
  `games_reason_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_components`
--

CREATE TABLE `game_components` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `assets` varchar(255) DEFAULT NULL,
  `has_colors` tinyint(1) DEFAULT 0,
  `size` varchar(20) DEFAULT NULL,
  `is_available` smallint(1) DEFAULT 1,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_components`
--

INSERT INTO `game_components` (`component_id`, `component_name`, `description`, `price`, `category`, `assets`, `has_colors`, `size`, `is_available`, `is_deleted`) VALUES
(1, 'Tarrot Cards', 'sd2', 12.00, 'game cards', NULL, 0, '7x7', 1, 0),
(2, 'Box', 'box box', 11.00, 'box', NULL, 0, '7x7', 1, 0),
(3, 'Dice 2', 'asd', 7.40, 'game piece', NULL, 1, '7x7', 1, 0),
(4, 'Tarrot Card 2jkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'desc', 14.00, 'game cards', NULL, 0, '10x10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_components_backup`
--

CREATE TABLE `game_components_backup` (
  `component_id` int(11) NOT NULL DEFAULT 0,
  `component_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_colors` tinyint(1) DEFAULT 0,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_components_backup`
--

INSERT INTO `game_components_backup` (`component_id`, `component_name`, `description`, `price`, `category`, `assets`, `has_colors`, `size`) VALUES
(1, 'Tarrot Cards', 'sd2', 12.00, 'game cards', NULL, 0, '7x7'),
(2, 'Box', 'box box', 11.00, 'box', NULL, 0, '7x7'),
(3, 'Dice 2', 'asd', 7.40, 'game piece', NULL, 1, '7x7'),
(4, 'Tarrot Card 2jkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'desc', 14.00, 'game cards', NULL, 0, '10x10');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `help_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `help_title` varchar(255) NOT NULL,
  `help_description` text NOT NULL,
  `help_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`help_id`, `faq_id`, `help_title`, `help_description`, `help_image_path`) VALUES
(1, 4, 'yes', '     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hah asd asd asdasd as dasd asd asd asda da das da sda sda sdasd asd asd asd asda sd asda sda da sd', 'assets/help_assets/6546a4ed238e9_3.png'),
(2, 4, 'No', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'asset/help_assets/6547880256a10_9795882ae899f787cab050c271958d85--watercolor-leaves-watercolor-ideas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `index_banner`
--

CREATE TABLE `index_banner` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_banner`
--

INSERT INTO `index_banner` (`id`, `image_path`) VALUES
(1, 'img/banner/banner2.png'),
(5, 'img/banner/banner1.png');

-- --------------------------------------------------------

--
-- Table structure for table `markup_percentage`
--

CREATE TABLE `markup_percentage` (
  `id` int(11) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markup_percentage`
--

INSERT INTO `markup_percentage` (`id`, `percentage`) VALUES
(1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `unique_order_id` varchar(255) DEFAULT NULL,
  `unique_order_group_id` varchar(255) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `published_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `in_production` tinyint(1) DEFAULT 0,
  `to_ship` tinyint(1) DEFAULT 0,
  `to_deliver` tinyint(1) DEFAULT 0,
  `is_received` tinyint(1) DEFAULT 0,
  `is_canceled` tinyint(1) DEFAULT 0,
  `cancel_order_reason_id` int(11) DEFAULT NULL,
  `is_completely_canceled` int(11) DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp(),
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_rated` tinyint(1) DEFAULT 0,
  `fullname` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `total_payment` decimal(10,2) DEFAULT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `order_data_payee_email` varchar(255) DEFAULT NULL,
  `in_production_datetime` datetime DEFAULT NULL,
  `to_ship_datetime` datetime DEFAULT NULL,
  `to_deliver_datetime` datetime DEFAULT NULL,
  `is_received_datetime` datetime DEFAULT NULL,
  `is_canceled_datetime` datetime DEFAULT NULL,
  `is_completely_canceled_datetime` datetime DEFAULT NULL,
  `shipping_discount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `unique_order_id`, `unique_order_group_id`, `cart_id`, `user_id`, `published_game_id`, `built_game_id`, `added_component_id`, `ticket_id`, `quantity`, `price`, `is_pending`, `in_production`, `to_ship`, `to_deliver`, `is_received`, `is_canceled`, `cancel_order_reason_id`, `is_completely_canceled`, `order_date`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_rated`, `fullname`, `number`, `region`, `province`, `city`, `barangay`, `zip`, `street`, `total_payment`, `paypal_transaction_id`, `payer_id`, `order_data_payee_email`, `in_production_datetime`, `to_ship_datetime`, `to_deliver_datetime`, `is_received_datetime`, `is_canceled_datetime`, `is_completely_canceled_datetime`, `shipping_discount`) VALUES
(492, '1256550c54d29f7c', '2023111213300515', 932, 15, NULL, NULL, NULL, 125, 1, 5.44, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-12 20:30:05', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 5.44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(493, '1266550c5dce400c', '2023111213322815', 933, 15, NULL, NULL, NULL, 126, 1, 5.44, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-12 20:32:28', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 5.44, '9BN803141P266883N', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(494, '1506550c65159da1', '2023111213342515', 934, 15, NULL, 150, NULL, NULL, 1, 48.96, 0, 0, 0, 0, 0, 1, 4, 0, '2023-11-12 20:34:25', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 133.96, '1KP04428VT6270546', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, '2023-11-12 20:35:05', NULL, 0.00),
(495, '1506550c74405576', '2023111213382715', 935, 15, NULL, 150, NULL, NULL, 1, 48.96, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-12 20:38:28', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 133.96, '58G625832S291215Y', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-12 13:41:33', NULL, NULL, NULL, NULL, NULL, 0.00),
(496, '1506550c91e7c6a7', '2023111213462215', 936, 15, NULL, 150, NULL, NULL, 1, 54.40, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-12 20:46:22', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 96.90, NULL, NULL, NULL, '2023-11-12 20:47:23', '2023-11-12 20:48:13', '2023-11-12 20:48:43', '2023-11-12 13:52:42', NULL, NULL, 42.50),
(497, '1276550e1e5a50a2', '2023111215320515', 937, 15, NULL, NULL, NULL, 127, 1, 5.44, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-12 22:32:05', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 5.44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(498, '1516550ed0384fe5', '2023111216193115', 938, 15, NULL, 151, NULL, NULL, 1, 48.96, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-12 23:19:31', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 91.46, NULL, NULL, NULL, '2023-11-12 23:19:45', NULL, NULL, NULL, NULL, NULL, 42.50),
(499, '128655166988095d', '2023111300581615', 940, 15, NULL, NULL, NULL, 128, 1, 5.44, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-13 07:58:16', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 102.34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42.50),
(500, '150655166988a5d9', '2023111300581615', 939, 15, NULL, 150, NULL, NULL, 1, 54.40, 1, 0, 0, 0, 0, 0, NULL, 0, '2023-11-13 07:58:16', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 102.34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42.50),
(501, '1466551e8bf5db01', '202311131013353', 968, 3, NULL, NULL, NULL, 146, 1, 19.88, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-13 17:13:35', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 19.88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(502, '1536551e8e268795', '2023111310141015', 969, 15, NULL, 153, NULL, NULL, 1, 6.66, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-13 17:14:10', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 49.90, NULL, NULL, NULL, '2023-11-13 17:14:23', NULL, NULL, NULL, NULL, NULL, 42.50),
(503, '1456551e8e26ee7e', '2023111310141015', 967, 15, NULL, NULL, NULL, 145, 1, 0.74, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-10-03 17:14:10', 0.00, 0.00, 0.00, 0.00, 0, 'Ian Balayan', '09999999999', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', 'Bukid', 49.90, NULL, NULL, NULL, '2023-11-13 17:14:23', NULL, NULL, NULL, NULL, NULL, 42.50),
(504, '187655462c8349e2', '202311150718483', 971, 3, 187, NULL, NULL, NULL, 3, 104.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-04 14:18:48', 50.00, 10.00, 40.00, 104.40, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 355.70, NULL, NULL, NULL, '2023-11-15 14:31:01', NULL, NULL, NULL, NULL, NULL, 42.50),
(505, '18865546ded8dffc', '202311150806213', 972, 3, 188, NULL, NULL, NULL, 5, 74.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-15 15:06:21', 20.00, 4.00, 16.00, 74.40, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 414.50, NULL, NULL, NULL, '2023-11-15 15:06:30', NULL, NULL, NULL, NULL, NULL, 42.50),
(506, '57565546eaa2dd3d', '202311150809303', 977, 3, NULL, NULL, 575, NULL, 1, 11.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-15 15:09:30', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 64.50, NULL, NULL, NULL, '2023-11-15 15:10:26', NULL, NULL, NULL, NULL, NULL, 42.50),
(507, '57465546eaa30a95', '202311150809303', 976, 3, NULL, NULL, 574, NULL, 1, 11.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-15 15:09:30', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 64.50, NULL, NULL, NULL, '2023-11-15 15:10:26', NULL, NULL, NULL, NULL, NULL, 42.50),
(508, '18765547d2c160cc', '202311150911243', 978, 3, 187, NULL, NULL, NULL, 10, 104.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-15 16:11:24', 50.00, 10.00, 40.00, 104.40, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 1086.50, NULL, NULL, NULL, '2023-11-15 16:11:32', NULL, NULL, NULL, NULL, NULL, 42.50),
(509, '18765547ea046936', '202311150917363', 979, 3, 187, NULL, NULL, NULL, 2, 104.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-10-15 16:17:36', 50.00, 10.00, 40.00, 104.40, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'San Juan', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 251.30, NULL, NULL, NULL, '2023-11-15 16:17:50', NULL, NULL, NULL, NULL, NULL, 42.50);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_transactions`
--

CREATE TABLE `paypal_transactions` (
  `payment_id` int(11) NOT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `order_data_intent` varchar(255) DEFAULT NULL,
  `order_data_status` varchar(255) DEFAULT NULL,
  `order_data_currency_code` varchar(255) DEFAULT NULL,
  `order_data_amount` decimal(10,2) DEFAULT NULL,
  `order_data_payee_email` varchar(255) DEFAULT NULL,
  `order_data_payee_merchant_id` varchar(255) DEFAULT NULL,
  `order_data_capture_id` varchar(255) DEFAULT NULL,
  `order_data_capture_status` varchar(255) DEFAULT NULL,
  `order_data_capture_currency_code` varchar(255) DEFAULT NULL,
  `order_data_capture_amount` decimal(10,2) DEFAULT NULL,
  `order_data_capture_final_capture` tinyint(1) DEFAULT NULL,
  `order_data_capture_seller_protection_status` varchar(255) DEFAULT NULL,
  `order_data_capture_dispute_categories` varchar(255) DEFAULT NULL,
  `order_data_capture_create_time` datetime DEFAULT NULL,
  `order_data_capture_update_time` datetime DEFAULT NULL,
  `payer_given_name` varchar(255) DEFAULT NULL,
  `payer_surname` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payer_country_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_transactions`
--

INSERT INTO `paypal_transactions` (`payment_id`, `paypal_transaction_id`, `order_data_intent`, `order_data_status`, `order_data_currency_code`, `order_data_amount`, `order_data_payee_email`, `order_data_payee_merchant_id`, `order_data_capture_id`, `order_data_capture_status`, `order_data_capture_currency_code`, `order_data_capture_amount`, `order_data_capture_final_capture`, `order_data_capture_seller_protection_status`, `order_data_capture_dispute_categories`, `order_data_capture_create_time`, `order_data_capture_update_time`, `payer_given_name`, `payer_surname`, `payer_email`, `payer_id`, `payer_country_code`) VALUES
(156, '778103502H590142R', 'CAPTURE', 'COMPLETED', 'PHP', 50.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2KE97731X26044359', 'COMPLETED', 'PHP', 50.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-12 12:29:20', '2023-11-12 12:29:20', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(157, '9BN803141P266883N', 'CAPTURE', 'COMPLETED', 'PHP', 5.44, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '087933519G5643445', 'COMPLETED', 'PHP', 5.44, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-12 12:32:27', '2023-11-12 12:32:27', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(158, '1KP04428VT6270546', 'CAPTURE', 'COMPLETED', 'PHP', 133.96, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '5D42153591579662B', 'COMPLETED', 'PHP', 133.96, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-12 12:34:23', '2023-11-12 12:34:23', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(159, '58G625832S291215Y', 'CAPTURE', 'COMPLETED', 'PHP', 133.96, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2M0073330N593310N', 'COMPLETED', 'PHP', 133.96, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-12 12:38:26', '2023-11-12 12:38:26', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(160, '2DT826020N6233320', 'CAPTURE', 'COMPLETED', 'PHP', 10000.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0H351553790904138', 'COMPLETED', 'PHP', 10000.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-12 12:45:58', '2023-11-12 12:45:58', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `pending_published_built_games`
--

CREATE TABLE `pending_published_built_games` (
  `pending_published_built_game_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT current_timestamp(),
  `creator_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `has_pending_update` tinyint(1) DEFAULT NULL,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_published_built_games`
--

INSERT INTO `pending_published_built_games` (`pending_published_built_game_id`, `built_game_id`, `game_name`, `category`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `has_pending_update`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_visible`) VALUES
(112, 153, 'unsgeons and Donkeyss', '2', 'unsgeons and Donkeyss', '2023-11-13', 15, 2, 'unsgeons and Donkeyss', '<p>unsgeons and Donkeyss</p>', NULL, 'uploads/655214afe0607_WIN_20231112_15_07_04_Pro.jpg', 2, 123, 13, 123, NULL, 123.00, 24.60, 98.40, 130.40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pending_published_multiple_files`
--

CREATE TABLE `pending_published_multiple_files` (
  `pending_published_file_id` int(11) NOT NULL,
  `pending_published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_published_multiple_files`
--

INSERT INTO `pending_published_multiple_files` (`pending_published_file_id`, `pending_published_built_game_id`, `built_game_id`, `creator_id`, `file_path`) VALUES
(268, 112, 153, 15, 'uploads/655214afe34ad_WIN_20231028_16_21_01_Pro.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `pending_update_published_built_games`
--

CREATE TABLE `pending_update_published_built_games` (
  `pending_update_published_built_games_id` int(11) NOT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_update_published_built_games`
--

INSERT INTO `pending_update_published_built_games` (`pending_update_published_built_games_id`, `published_built_game_id`, `built_game_id`, `game_name`, `category`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`) VALUES
(36, 187, 0, '123', '3', '123', '2023-11-13', 15, 2, '123', '<ul>\n    <li>INIBA KO NA TOH AHntation</a> is a great resource for learning how to configure TinyMCE.</li>\n    <li>Have a specific question? Try the <a href=\"https://stackoverflow.com/questions/tagged/tinymce\" target=\"_blank\" rel=\"noopener\"><code>tinymce</code> tag at Stack Overflow</a>.</li>\n    <li>We also offer enterprise grade support as part of <a href=\"https://www.tiny.cloud/pricing\">TinyMCE premium plans</a>.</li>\n  </ul>\n\n  <h2>A simple table to play with</h2>\n\n  <table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n    <thead>\n      <tr>\n        <th>Product</th>\n        <th>Cost</th>\n        <th>Really?</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>TinyMCE</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n      <tr>\n        <td>Plupload</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n    </tbody>\n  </table>\n\n  <h2>Found a bug?</h2>\n\n  <p>\n    If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.\n  </p>\n\n  <h2>Finally ...</h2>', '', 'uploads/65520770cc6b8_WIN_20231112_15_07_04_Pro.jpg', 123, 123, 123, 123, 123.00, 24.60, 98.40, 177.40);

-- --------------------------------------------------------

--
-- Table structure for table `pending_update_published_multiple_files`
--

CREATE TABLE `pending_update_published_multiple_files` (
  `pending_update_published_multiple_files_id` int(11) NOT NULL,
  `pending_update_published_built_game_id` int(11) DEFAULT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_update_published_multiple_files`
--

INSERT INTO `pending_update_published_multiple_files` (`pending_update_published_multiple_files_id`, `pending_update_published_built_game_id`, `published_built_game_id`, `built_game_id`, `creator_id`, `file_path`) VALUES
(133, 36, 187, 0, 15, 'uploads/65520770cdc1a_WIN_20231028_16_21_01_Pro.mp4'),
(134, 36, 187, 0, 15, 'uploads/65520770cdeca_WIN_20231112_13_59_35_Pro.jpg'),
(135, 36, 187, 0, 15, 'uploads/65520770ce0d0_WIN_20231112_13_59_36_Pro.jpg'),
(136, 36, 187, 0, 15, 'uploads/65520770ce393_WIN_20231112_15_07_04_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_name`, `region_id`) VALUES
(1, 'Metro Manila', 1),
(2, 'Agusan Del Norte', 2),
(3, 'Agusan Del Sur', 2),
(7, 'Basilan', 2),
(8, 'Bukidnon', 2),
(9, 'Camiguin', 2),
(10, 'Compostela Valley', 2),
(11, 'Cotabato', 2),
(12, 'Davao Del Norte', 2),
(13, 'Davao Del Sur', 2),
(14, 'Davao Oriental', 2),
(15, 'Dinagat Islands', 2),
(16, 'Lanao Del Norte', 2),
(17, 'Lanao Del Sur', 2),
(18, 'Maguindanao', 2),
(19, 'Misamis Occidental', 2),
(20, 'Misamis Oriental', 2),
(21, 'North Cotabato', 2),
(22, 'Sarangani', 2),
(23, 'South Cotabato', 2),
(24, 'Sultan Kudarat', 2),
(25, 'Sulu', 2),
(26, 'Surigao Del Norte', 2),
(27, 'Surigao Del Sur', 2),
(28, 'Tawi-Tawi', 2),
(29, 'Zamboanga Del Norte', 2),
(30, 'Zamboanga Del Sur', 2),
(31, 'Zamboanga Sibugay', 2),
(32, 'Abra', 3),
(33, 'Apayao', 3),
(34, 'Benguet', 3),
(35, 'Cagayan', 3),
(36, 'Ifugao', 3),
(37, 'Ilocos Norte', 3),
(38, 'Ilocos Sur', 3),
(39, 'Isabela', 3),
(40, 'Kalinga', 3),
(41, 'La Union', 3),
(42, 'Nueva Vizcaya', 3),
(43, 'Pangasinan', 3),
(44, 'Quirino', 3),
(45, 'Albay', 4),
(46, 'Batangas', 4),
(47, 'Camarines Norte', 4),
(48, 'Camarines Sur', 4),
(49, 'Catanduanes', 4),
(50, 'Cavite', 4),
(51, 'Laguna', 4),
(52, 'Marinduque', 4),
(53, 'Masbate', 4),
(54, 'Occidental Mindoro', 4),
(55, 'Oriental Mindoro', 4),
(56, 'Palawan', 4),
(57, 'Quezon', 4),
(58, 'Rizal', 4),
(59, 'Romblon', 4),
(60, 'Sorsogon', 4),
(61, 'Aklan', 5),
(62, 'Antique', 5),
(63, 'Biliran', 5),
(64, 'Bohol', 5),
(65, 'Cebu', 5),
(66, 'Eastern Samar', 5),
(67, 'Guimaras', 5),
(68, 'Iloilo', 5),
(69, 'Leyte', 5),
(70, 'Negros Occidental', 5),
(71, 'Negros Oriental', 5),
(72, 'Northern Samar', 5),
(73, 'Samar', 5),
(74, 'Siquijor', 5);

-- --------------------------------------------------------

--
-- Table structure for table `published_built_games`
--

CREATE TABLE `published_built_games` (
  `published_game_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `category` text DEFAULT NULL,
  `edition` varchar(255) NOT NULL,
  `published_date` datetime NOT NULL DEFAULT current_timestamp(),
  `creator_id` int(11) NOT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) NOT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `has_pending_update` tinyint(1) DEFAULT 0,
  `is_update_request_denied` tinyint(1) NOT NULL DEFAULT 0,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_built_games`
--

INSERT INTO `published_built_games` (`published_game_id`, `built_game_id`, `game_name`, `category`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `has_pending_update`, `is_update_request_denied`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_hidden`) VALUES
(187, 150, 'DNDonkeys', 'RPGs', 'I', '2023-11-12 21:24:26', 15, 4, 'Dungeons and Dragons but Donkeys', '<ul>\n    <li>Our <a href=\"https://www.tiny.cloud/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\n    <li>Have a specific question? Try the <a href=\"https://stackoverflow.com/questions/tagged/tinymce\" target=\"_blank\" rel=\"noopener\"><code>tinymce</code> tag at Stack Overflow</a>.</li>\n    <li>We also offer enterprise grade support as part of <a href=\"https://www.tiny.cloud/pricing\">TinyMCE premium plans</a>.</li>\n  </ul>\n\n  <h2>A simple table to play with</h2>\n\n  <table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n    <thead>\n      <tr>\n        <th>Product</th>\n        <th>Cost</th>\n        <th>Really?</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>TinyMCE</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n      <tr>\n        <td>Plupload</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n    </tbody>\n  </table>\n\n  <h2>Found a bug?</h2>\n\n  <p>\n    If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.\n  </p>\n\n  <h2>Finally ...</h2>', '', 'uploads/6550d1ecd344b_IMG_20231112_154523.jpg', 1, 4, 60, 180, 1, 0, 50.00, 10.00, 40.00, 104.40, 0),
(188, 151, 'finalfainl', 'Card Games', '123', '2023-11-13 00:54:42', 15, 1, '123', '<ul>\n    <li>Our <a href=\"https://www.tiny.cloud/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\n    <li>Have a specific question? Try the <a href=\"https://stackoverflow.com/questions/tagged/tinymce\" target=\"_blank\" rel=\"noopener\"><code>tinymce</code> tag at Stack Overflow</a>.</li>\n    <li>We also offer enterprise grade support as part of <a href=\"https://www.tiny.cloud/pricing\">TinyMCE premium plans</a>.</li>\n  </ul>\n\n  <h2>A simple table to play with</h2>\n\n  <table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n    <thead>\n      <tr>\n        <th>Product</th>\n        <th>Cost</th>\n        <th>Really?</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>TinyMCE</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n      <tr>\n        <td>Plupload</td>\n        <td>Free</td>\n        <td>YES!</td>\n      </tr>\n    </tbody>\n  </table>\n\n  <h2>Found a bug?</h2>\n\n  <p>\n    If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.\n  </p>\n\n  <h2>Finally ...</h2>', '', 'uploads/6551031fe5c7a_IMG_20231112_154523.jpg', 123, 123, 123, 123, 0, 0, 20.00, 4.00, 16.00, 74.40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `published_multiple_files`
--

CREATE TABLE `published_multiple_files` (
  `published_file_id` int(11) NOT NULL,
  `published_built_game_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_multiple_files`
--

INSERT INTO `published_multiple_files` (`published_file_id`, `published_built_game_id`, `built_game_id`, `creator_id`, `file_path`) VALUES
(255, 187, 150, 15, 'uploads/6550d1ecd9066_sinakal.mp4'),
(256, 187, 150, 15, 'uploads/6550d1ecd9328_6550c599b8642_Popbins Basket (1).png'),
(257, 187, 150, 15, 'uploads/6550d1ecd9547_IMG_20231112_154523.jpg'),
(258, 188, 151, 15, 'uploads/6551031fe7f6a_sinakal.mp4'),
(259, 188, 151, 15, 'uploads/6551031fe81e1_6550c599b8642_Popbins Basket (1).png'),
(260, 188, 151, 15, 'uploads/6551031fe8416_IMG_20231112_154523.jpg'),
(261, 188, 151, 15, 'uploads/6551031fe8691_Untitled.png'),
(262, 188, 151, 15, 'uploads/6551031fe88ac_Popbins Basket (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `published_game_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `order_id`, `published_game_id`, `rating`, `comment`, `user_id`, `date_time`) VALUES
(37, NULL, 188, 3, 'asdasdasd', 3, '2023-11-15 07:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_name`) VALUES
(1, 'Metro Manila'),
(2, 'Mindanao'),
(3, 'North Luzon'),
(4, 'South Luzon'),
(5, 'Visayas');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_denied` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_at_cart` tinyint(1) DEFAULT 0,
  `is_purchased` tinyint(1) DEFAULT 0,
  `is_accepted` tinyint(1) DEFAULT 0,
  `is_canceled` tinyint(1) DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ticket_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `denied_approve_game_request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `user_id`, `game_id`, `is_approved`, `is_denied`, `created_at`, `is_at_cart`, `is_purchased`, `is_accepted`, `is_canceled`, `total_price`, `ticket_price`, `denied_approve_game_request_id`) VALUES
(125, 15, 221, 0, 1, '2023-11-12 12:25:28', 0, 1, 1, 0, 54.40, 5.44, 12),
(126, 15, 221, 1, 0, '2023-11-12 12:32:10', 0, 1, 1, 0, 54.40, 5.44, NULL),
(127, 15, 221, 1, 0, '2023-11-12 14:31:48', 0, 1, 1, 0, 54.40, 5.44, NULL),
(128, 15, 221, 1, 0, '2023-11-12 23:57:47', 0, 1, 1, 0, 54.40, 5.44, NULL),
(144, 15, 221, 0, 0, '2023-11-13 02:42:28', 1, 0, 0, 0, 7.40, 0.74, NULL),
(145, 15, 221, 0, 0, '2023-11-13 08:34:33', 0, 1, 1, 0, 7.40, 0.74, NULL),
(146, 3, 219, 0, 0, '2023-11-13 08:35:22', 0, 1, 1, 0, 198.80, 19.88, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `to_deliver`
--

CREATE TABLE `to_deliver` (
  `to_deliver_id` int(11) NOT NULL,
  `unique_order_group_id` varchar(255) NOT NULL,
  `tracking_number` varchar(255) DEFAULT '0',
  `courier` varchar(255) NOT NULL,
  `date_time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `to_deliver`
--

INSERT INTO `to_deliver` (`to_deliver_id`, `unique_order_group_id`, `tracking_number`, `courier`, `date_time_stamp`) VALUES
(27, '2023111213462215', '1', 'Flash Express', '2023-11-12 12:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `tutorial_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `tutorial_title` varchar(255) DEFAULT NULL,
  `tutorial_description` text DEFAULT NULL,
  `tutorial_link` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `time_added` datetime DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`tutorial_id`, `faq_id`, `tutorial_title`, `tutorial_description`, `tutorial_link`, `is_primary`, `time_added`, `designation`) VALUES
(1, 1, 'How to Create a Game ', 'asdasdasd asdasdasd asdasd asdasd asd asd asd asd asd asd asd asd d as d asd as dasd asdasda sd asd asd asd asd  a  ds asd asd a sd asd aasdasd', 'https://www.youtube-nocookie.com/embed/dSPh9fqZiHc?si=v9Gkjb1kk0JBdr2S', 1, '2023-09-12 21:31:52', 'create_game'),
(2, 2, 'Kisame', 'asdasdads asd as dasd as asd', 'https://www.youtube-nocookie.com/embed/NmFwemHybNE?si=H4IEN0-q4oSaIWgh', 1, '2023-09-22 21:49:30', NULL),
(3, 1, '7/11', ' toneejay', 'https://www.youtube.com/embed/9RJ-oc7cvW0?si=CIeqRHMLI4aRKHpX', 1, '2023-10-22 23:28:01', 'publish_game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_user_id` varchar(255) DEFAULT 'user-',
  `username` varchar(50) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipping_address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `wallet_amount` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_deleted` tinyint(1) DEFAULT 0,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_user_id`, `username`, `firstname`, `lastname`, `phone_number`, `email`, `password`, `created_at`, `shipping_address`, `avatar`, `wallet_amount`, `is_active`, `is_deleted`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(3, 'user-20231017-3', 'denzel', 'Denzel', 'Go', '09770257461', 'denzelgo17@gmail.com', '$2y$10$ARZ0Q6SNMcoKJIvaaiGwZeb/T0EtfPk9HMj.XvGnVgdcMYL8ZkwKa', '2023-08-02 09:11:37', 'asd', 'uploads/avatars/6533443489d0c_wp7687177-desktop-hd-gaming-wallpapers.jpg', NULL, 1, 0, NULL, NULL),
(13, 'user-1182023-13', 'nicole', 'Nicole', 'Cabal', '9770257461', 'nicole@gmail.com', '$2y$10$t2FWeoM34g4PU0qA820.QekiFDuXO21tQfPXEB0xAqhgXVCLoUfiy', '2023-11-08 10:08:15', NULL, 'uploads/avatars/654ca320aad49_this ptr.png', NULL, 1, 0, NULL, NULL),
(15, 'user-11122023-15', 'ian', 'Christopher', 'Balayan', '9770257461', 'ian@gmail.com', '$2y$10$dnsc3N1JT3WoVZRqiYb1kuvGCQ2jNd/9QYLgEZaVyv6a.W4.o2q0u', '2023-11-12 12:19:41', NULL, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` enum('login','logout') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `event_type`, `timestamp`) VALUES
(0, 3, 'login', '2023-11-06 00:03:59'),
(1, 1, 'login', '2023-08-01 03:39:23'),
(2, 1, 'login', '2023-08-01 03:56:32'),
(3, 1, 'login', '2023-08-01 03:59:24'),
(4, 2, 'login', '2023-08-01 05:14:59'),
(5, 1, 'login', '2023-08-01 05:15:36'),
(6, 1, 'login', '2023-08-02 07:25:23'),
(7, 1, 'login', '2023-08-02 07:46:59'),
(8, 2, 'login', '2023-08-02 09:09:55'),
(9, 1, 'login', '2023-08-02 09:10:23'),
(10, 3, 'login', '2023-08-02 09:11:40'),
(11, 4, 'login', '2023-08-02 09:14:24'),
(12, 3, 'login', '2023-08-02 10:03:19'),
(13, 3, 'logout', '2023-08-02 10:04:34'),
(14, 4, 'login', '2023-08-02 10:04:56'),
(15, 4, 'logout', '2023-08-02 10:15:42'),
(16, 3, 'login', '2023-08-02 10:15:49'),
(17, 3, 'login', '2023-08-02 10:28:09'),
(18, 5, 'login', '2023-08-03 05:09:24'),
(19, 3, 'login', '2023-08-03 12:21:02'),
(20, 3, 'login', '2023-08-03 23:51:06'),
(21, 3, 'login', '2023-08-07 00:02:46'),
(22, 3, 'login', '2023-08-07 06:55:28'),
(23, 3, 'logout', '2023-08-07 08:06:42'),
(24, 4, 'login', '2023-08-07 08:06:45'),
(25, 4, 'logout', '2023-08-07 08:07:34'),
(26, 3, 'login', '2023-08-07 08:07:39'),
(27, 3, 'login', '2023-08-07 09:49:50'),
(28, 3, 'login', '2023-08-08 03:29:35'),
(29, 3, 'login', '2023-08-08 23:09:00'),
(30, 3, 'login', '2023-08-10 00:16:07'),
(31, 3, 'login', '2023-08-10 03:53:35'),
(32, 3, 'logout', '2023-08-10 03:53:51'),
(33, 4, 'login', '2023-08-10 03:53:54'),
(34, 3, 'logout', '2023-08-10 08:46:03'),
(35, 6, 'login', '2023-08-10 08:46:17'),
(36, 3, 'login', '2023-08-11 00:27:28'),
(37, 3, 'logout', '2023-08-11 08:30:35'),
(38, 3, 'login', '2023-08-12 05:13:49'),
(39, 3, 'login', '2023-08-12 07:42:35'),
(40, 3, 'login', '2023-08-12 12:10:50'),
(41, 3, 'login', '2023-08-13 03:03:52'),
(42, 3, 'login', '2023-08-13 04:39:49'),
(43, 3, 'login', '2023-08-13 05:58:21'),
(44, 3, 'login', '2023-08-14 14:37:29'),
(45, 3, 'login', '2023-08-14 14:37:43'),
(46, 4, 'login', '2023-08-14 14:38:02'),
(47, 4, 'login', '2023-08-14 14:55:54'),
(48, 3, 'login', '2023-08-14 16:40:55'),
(49, 3, 'login', '2023-08-14 22:43:00'),
(50, 3, 'login', '2023-08-15 14:26:35'),
(51, 3, 'login', '2023-08-16 01:41:54'),
(52, 3, 'login', '2023-08-16 01:46:08'),
(53, 3, 'login', '2023-08-16 07:09:19'),
(54, 4, 'login', '2023-08-16 07:09:54'),
(55, 4, 'login', '2023-08-16 07:12:54'),
(56, 4, 'login', '2023-08-16 07:26:02'),
(57, 3, 'login', '2023-08-16 12:03:59'),
(58, 4, 'login', '2023-08-16 12:36:02'),
(59, 3, 'login', '2023-08-16 13:26:54'),
(60, 3, 'login', '2023-08-17 13:48:15'),
(61, 3, 'login', '2023-08-19 04:41:59'),
(62, 3, 'login', '2023-08-21 13:09:20'),
(63, 3, 'login', '2023-08-23 06:53:31'),
(64, 3, 'login', '2023-08-23 12:32:19'),
(65, 3, 'login', '2023-08-24 12:50:36'),
(66, 3, 'login', '2023-08-24 14:35:32'),
(67, 3, 'login', '2023-08-25 12:53:11'),
(68, 4, 'login', '2023-08-25 13:44:10'),
(69, 3, 'login', '2023-08-25 15:47:41'),
(70, 3, 'login', '2023-08-27 05:13:43'),
(71, 4, 'login', '2023-08-27 13:16:51'),
(72, 4, 'login', '2023-08-28 05:47:08'),
(73, 3, 'login', '2023-08-28 14:09:30'),
(74, 3, 'login', '2023-08-28 14:10:33'),
(75, 3, 'login', '2023-08-28 14:49:32'),
(76, 3, 'login', '2023-08-28 22:08:01'),
(77, 7, 'login', '2023-08-30 03:05:03'),
(78, 8, 'login', '2023-08-30 05:19:26'),
(79, 8, 'login', '2023-08-30 05:33:04'),
(80, 8, 'login', '2023-08-30 05:33:18'),
(81, 9, 'login', '2023-08-30 06:34:39'),
(82, 7, 'login', '2023-08-30 14:50:42'),
(83, 3, 'login', '2023-08-31 03:13:38'),
(84, 7, 'login', '2023-08-31 09:36:13'),
(85, 3, 'login', '2023-08-31 12:15:28'),
(86, 3, 'login', '2023-08-31 13:58:38'),
(87, 3, 'login', '2023-09-02 09:37:17'),
(88, 3, 'login', '2023-09-02 12:14:12'),
(89, 3, 'login', '2023-09-03 05:40:21'),
(90, 3, 'login', '2023-09-03 14:37:32'),
(91, 3, 'login', '2023-09-03 22:25:17'),
(92, 3, 'login', '2023-09-04 12:51:57'),
(93, 3, 'login', '2023-09-04 18:51:30'),
(94, 3, 'login', '2023-09-08 12:32:41'),
(95, 3, 'login', '2023-09-09 14:50:59'),
(96, 3, 'login', '2023-09-10 04:17:19'),
(97, 3, 'login', '2023-09-10 04:17:48'),
(98, 7, 'login', '2023-09-10 04:18:07'),
(99, 3, 'login', '2023-09-11 15:02:00'),
(100, 3, 'login', '2023-09-11 15:42:05'),
(101, 7, 'login', '2023-09-11 15:49:57'),
(102, 3, 'login', '2023-09-11 15:50:37'),
(103, 3, 'login', '2023-09-11 22:33:30'),
(104, 3, 'login', '2023-09-13 03:39:41'),
(105, 3, 'login', '2023-09-13 07:16:10'),
(106, 3, 'login', '2023-09-13 10:01:01'),
(107, 3, 'login', '2023-09-13 10:02:09'),
(108, 3, 'login', '2023-09-13 10:02:48'),
(109, 3, 'login', '2023-09-13 10:03:14'),
(110, 3, 'login', '2023-09-13 10:03:53'),
(111, 3, 'login', '2023-09-13 10:06:03'),
(112, 3, 'login', '2023-09-13 10:23:29'),
(113, 3, 'login', '2023-09-13 11:00:17'),
(114, 3, 'login', '2023-09-13 11:27:55'),
(115, 3, 'login', '2023-09-13 11:28:03'),
(116, 3, 'login', '2023-09-13 11:32:20'),
(117, 3, 'login', '2023-09-13 11:32:51'),
(118, 3, 'login', '2023-09-13 11:38:04'),
(119, 3, 'login', '2023-09-13 11:38:28'),
(120, 3, 'login', '2023-09-13 12:15:26'),
(121, 3, 'login', '2023-09-14 05:24:08'),
(122, 7, 'login', '2023-09-14 05:24:33'),
(123, 3, 'login', '2023-09-14 05:26:55'),
(124, 7, 'login', '2023-09-14 05:36:57'),
(125, 3, 'login', '2023-09-14 05:38:18'),
(126, 7, 'login', '2023-09-14 05:40:35'),
(127, 3, 'login', '2023-09-14 05:49:43'),
(128, 7, 'login', '2023-09-14 05:49:49'),
(129, 3, 'login', '2023-09-14 05:59:21'),
(130, 4, 'login', '2023-09-14 05:59:44'),
(131, 3, 'login', '2023-09-14 09:40:20'),
(132, 3, 'login', '2023-09-14 13:33:33'),
(133, 3, 'login', '2023-09-18 13:15:20'),
(134, 3, 'login', '2023-09-19 15:07:44'),
(135, 3, 'login', '2023-09-20 00:10:30'),
(136, 3, 'login', '2023-09-20 01:29:23'),
(137, 3, 'login', '2023-09-21 04:13:37'),
(138, 3, 'login', '2023-09-21 08:08:50'),
(139, 3, 'login', '2023-09-21 12:06:12'),
(140, 3, 'login', '2023-09-22 01:58:42'),
(141, 3, 'login', '2023-09-23 14:54:43'),
(142, 3, 'login', '2023-09-24 05:29:12'),
(143, 3, 'login', '2023-09-25 12:47:41'),
(144, 3, 'login', '2023-09-26 09:46:20'),
(145, 3, 'login', '2023-09-26 22:28:20'),
(146, 8, 'login', '2023-09-26 23:44:26'),
(147, 3, 'login', '2023-09-26 23:46:38'),
(148, 8, 'login', '2023-09-26 23:48:00'),
(149, 3, 'login', '2023-09-26 23:54:59'),
(150, 8, 'login', '2023-09-27 00:31:20'),
(151, 3, 'login', '2023-09-27 00:32:17'),
(152, 4, 'login', '2023-09-27 03:11:57'),
(153, 3, 'login', '2023-09-27 03:21:04'),
(154, 3, 'login', '2023-09-27 03:39:05'),
(155, 7, 'login', '2023-09-27 04:35:42'),
(156, 10, 'login', '2023-09-27 04:35:58'),
(157, 3, 'login', '2023-09-27 04:54:36'),
(158, 10, 'login', '2023-09-27 04:54:52'),
(159, 3, 'login', '2023-09-27 05:01:01'),
(160, 10, 'login', '2023-09-27 05:14:31'),
(161, 3, 'login', '2023-09-27 05:20:39'),
(162, 10, 'login', '2023-09-27 05:21:36'),
(163, 3, 'login', '2023-09-27 07:09:45'),
(164, 3, 'login', '2023-09-27 11:28:54'),
(165, 10, 'login', '2023-09-27 19:35:28'),
(166, 3, 'login', '2023-09-27 19:42:36'),
(167, 10, 'login', '2023-09-27 19:58:27'),
(168, 3, 'login', '2023-09-29 07:11:26'),
(169, 3, 'login', '2023-09-29 09:10:49'),
(170, 10, 'login', '2023-10-01 11:48:48'),
(171, 3, 'login', '2023-10-01 11:49:08'),
(172, 10, 'login', '2023-10-01 11:49:17'),
(173, 3, 'login', '2023-10-02 14:03:08'),
(174, 3, 'login', '2023-10-02 14:03:47'),
(175, 3, 'login', '2023-10-02 14:04:29'),
(176, 3, 'login', '2023-10-02 14:05:21'),
(177, 10, 'login', '2023-10-02 14:35:26'),
(178, 3, 'login', '2023-10-02 17:12:11'),
(179, 3, 'login', '2023-10-03 09:03:56'),
(180, 10, 'login', '2023-10-03 09:15:21'),
(181, 3, 'login', '2023-10-03 13:43:42'),
(182, 10, 'login', '2023-10-03 13:43:52'),
(183, 3, 'login', '2023-10-05 00:08:44'),
(184, 3, 'login', '2023-10-07 14:59:51'),
(185, 3, 'login', '2023-10-08 08:23:09'),
(186, 3, 'login', '2023-10-09 04:46:20'),
(187, 3, 'login', '2023-10-10 14:33:48'),
(188, 3, 'login', '2023-10-11 02:24:47'),
(189, 3, 'login', '2023-10-11 06:37:04'),
(190, 3, 'login', '2023-10-12 09:19:22'),
(191, 3, 'login', '2023-10-12 09:46:21'),
(192, 3, 'login', '2023-10-12 14:25:33'),
(193, 3, 'login', '2023-10-13 08:13:25'),
(194, 3, 'login', '2023-10-13 14:54:20'),
(195, 3, 'login', '2023-10-14 05:33:30'),
(196, 3, 'login', '2023-10-15 16:32:17'),
(197, 3, 'login', '2023-10-16 04:45:55'),
(198, 3, 'login', '2023-10-16 05:03:56'),
(199, 3, 'login', '2023-10-16 08:26:20'),
(200, 3, 'login', '2023-10-16 11:59:49'),
(201, 3, 'login', '2023-10-16 12:00:28'),
(202, 3, 'login', '2023-10-17 13:25:35'),
(203, 3, 'login', '2023-10-17 13:45:36'),
(204, 10, 'login', '2023-10-17 17:40:57'),
(205, 3, 'login', '2023-10-17 17:45:20'),
(206, 10, 'login', '2023-10-17 17:45:41'),
(207, 10, 'login', '2023-10-17 17:47:21'),
(208, 3, 'login', '2023-10-17 17:48:03'),
(209, 3, 'login', '2023-10-17 17:48:10'),
(210, 10, 'login', '2023-10-17 17:48:16'),
(211, 8, 'login', '2023-10-17 17:48:39'),
(212, 3, 'login', '2023-10-17 17:48:49'),
(213, 10, 'login', '2023-10-17 17:49:01'),
(214, 3, 'login', '2023-10-17 17:51:29'),
(215, 10, 'login', '2023-10-17 17:51:38'),
(216, 3, 'login', '2023-10-17 18:00:23'),
(217, 10, 'login', '2023-10-17 18:00:45'),
(218, 3, 'login', '2023-10-18 02:33:18'),
(219, 3, 'login', '2023-10-18 10:38:03'),
(220, 3, 'login', '2023-10-21 02:30:03'),
(221, 3, 'login', '2023-10-23 09:30:16'),
(222, 3, 'login', '2023-10-23 11:24:20'),
(223, 3, 'login', '2023-10-23 17:41:02'),
(224, 3, 'login', '2023-10-24 09:31:07'),
(225, 3, 'login', '2023-10-25 00:58:47'),
(226, 3, 'login', '2023-10-25 01:44:07'),
(227, 3, 'login', '2023-10-25 03:26:36'),
(228, 3, 'login', '2023-10-26 03:49:08'),
(229, 3, 'login', '2023-10-26 14:43:51'),
(230, 3, 'login', '2023-10-27 02:11:15'),
(231, 3, 'login', '2023-10-27 14:57:20'),
(232, 3, 'login', '2023-10-28 06:19:44'),
(233, 3, 'login', '2023-10-29 08:14:58'),
(234, 3, 'login', '2023-10-29 15:06:02'),
(235, 3, 'login', '2023-10-30 01:53:43'),
(236, 3, 'login', '2023-10-30 12:58:07'),
(237, 3, 'login', '2023-10-31 03:07:52'),
(238, 10, 'login', '2023-10-31 03:53:01'),
(239, 3, 'login', '2023-10-31 04:12:23'),
(240, 10, 'login', '2023-10-31 04:23:02'),
(241, 3, 'login', '2023-10-31 04:42:27'),
(242, 10, 'login', '2023-10-31 05:05:50'),
(243, 3, 'login', '2023-10-31 10:39:00'),
(244, 3, 'login', '2023-10-31 12:16:38'),
(245, 3, 'login', '2023-11-01 08:19:27'),
(246, 3, 'login', '2023-11-06 06:15:04'),
(247, 3, 'login', '2023-11-06 09:00:50'),
(248, 3, 'login', '2023-11-08 09:12:59'),
(249, 13, 'login', '2023-11-08 10:08:23'),
(250, 3, 'login', '2023-11-08 10:11:33'),
(251, 3, 'login', '2023-11-09 02:37:14'),
(252, 13, 'login', '2023-11-09 05:07:10'),
(253, 3, 'login', '2023-11-09 15:31:46'),
(254, 3, 'login', '2023-11-10 05:53:31'),
(255, 3, 'login', '2023-11-10 05:53:57'),
(256, 3, 'login', '2023-11-10 05:54:19'),
(257, 3, 'login', '2023-11-10 05:54:44'),
(258, 3, 'login', '2023-11-11 06:33:00'),
(259, 3, 'login', '2023-11-11 14:26:26'),
(260, 3, 'login', '2023-11-12 06:11:16'),
(261, 3, 'login', '2023-11-12 06:13:06'),
(262, 3, 'login', '2023-11-12 06:15:52'),
(263, 3, 'login', '2023-11-12 06:19:04'),
(264, 3, 'login', '2023-11-12 07:38:37'),
(265, 3, 'login', '2023-11-12 07:39:07'),
(266, 15, 'login', '2023-11-12 12:19:55'),
(267, 3, 'login', '2023-11-12 12:21:17'),
(268, 15, 'login', '2023-11-12 12:21:26'),
(269, 3, 'login', '2023-11-13 07:52:55'),
(270, 3, 'login', '2023-11-13 07:57:07'),
(271, 15, 'login', '2023-11-13 07:57:19'),
(272, 3, 'login', '2023-11-13 08:35:16'),
(273, 3, 'login', '2023-11-13 08:51:50'),
(274, 15, 'login', '2023-11-13 09:13:47'),
(275, 3, 'login', '2023-11-15 05:17:48'),
(276, 3, 'login', '2023-11-15 07:57:11'),
(277, 3, 'login', '2023-11-15 08:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_review_response`
--

CREATE TABLE `user_review_response` (
  `user_review_response_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `user_file_upload` varchar(255) DEFAULT NULL,
  `user_text_response` text DEFAULT NULL,
  `response_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `wallet_transaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text DEFAULT 'pending',
  `mode` varchar(255) DEFAULT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `paypal_email_destination` varchar(255) DEFAULT NULL,
  `cash_out_timestamp` timestamp NULL DEFAULT NULL,
  `cash_out_fee` decimal(10,2) DEFAULT NULL,
  `unique_order_group_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `published_game_id` int(11) DEFAULT NULL,
  `cancel_order_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`wallet_transaction_id`, `user_id`, `transaction_type`, `transaction_date`, `status`, `mode`, `paypal_transaction_id`, `paypal_email_destination`, `cash_out_timestamp`, `cash_out_fee`, `unique_order_group_id`, `amount`, `published_game_id`, `cancel_order_reason`) VALUES
(100, 3, 'Cash In', '2023-10-26 15:06:54', 'success', 'Paypal', '20985979KC597794U', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(101, 3, 'Cash In', '2023-10-26 15:07:18', 'success', 'Paypal', '81K66533VC8468212', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(104, 3, 'Cash In', '2023-10-26 15:16:42', 'success', 'Paypal', '9WJ43871SE013341N', NULL, NULL, NULL, NULL, 'OTAzLjk=', NULL, NULL),
(105, 3, 'Cash In', '2023-10-26 15:20:57', 'success', 'Paypal', '5ME45515JK816113B', NULL, NULL, NULL, NULL, 'MjAw', NULL, NULL),
(106, 3, 'Pay', '2023-10-26 15:57:38', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026175738', '461.5', NULL, NULL),
(107, 3, 'Pay', '2023-10-26 16:02:04', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026180204', 'MTEyLjU=', NULL, NULL),
(108, 3, 'Cash In', '2023-10-26 16:21:21', 'success', 'Paypal', '4X550599LU821930X', NULL, NULL, NULL, NULL, 'MTAw', NULL, NULL),
(109, 3, 'Cash In', '2023-10-26 16:22:23', 'success', 'Paypal', '92X51815G59238831', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(110, 3, 'Cash In', '2023-10-26 16:23:32', 'success', 'Paypal', '1DL753297A1287620', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(111, 3, 'Pay', '2023-10-26 16:29:53', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026182952', 'MjY2LjU=', NULL, NULL),
(113, 3, 'Cash Out', '2023-10-26 16:52:54', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:02:17', 20.00, NULL, 'OTAw', NULL, NULL),
(114, 3, 'Cash Out', '2023-10-26 17:04:21', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:04:31', 20.00, NULL, 'NTAw', NULL, NULL),
(117, 3, 'Cash Out', '2023-10-26 17:07:31', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:09:10', 20.00, NULL, 'NDAw', NULL, NULL),
(118, 3, 'Cash Out', '2023-10-26 17:11:21', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:11:32', 20.00, NULL, 'NTAw', NULL, NULL),
(119, 3, 'Cash Out', '2023-10-26 17:14:43', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:14:55', 20.00, NULL, 'MTAw', NULL, NULL),
(120, 3, 'Cash Out', '2023-10-26 17:15:48', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:15:53', 20.00, NULL, 'NTA=', NULL, NULL),
(121, 3, 'Cash Out', '2023-10-26 17:17:41', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 17:17:47', 20.00, NULL, 'NzA=', NULL, NULL),
(128, 3, 'Profit', '2023-10-26 18:01:01', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNDA=', 183, NULL),
(129, 3, 'Profit', '2023-10-26 18:03:34', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNDA=', 183, NULL),
(130, 3, 'Profit', '2023-10-26 18:09:54', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(136, 3, 'Profit', '2023-10-26 18:10:43', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTk2Ljg=', 183, NULL),
(140, 3, 'Profit', '2023-10-26 18:10:53', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjk1LjI=', 183, NULL),
(143, 3, 'Pay', '2023-10-26 18:17:59', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026201759', 'MjY2LjU=', NULL, NULL),
(144, 3, 'Profit', '2023-10-26 18:18:12', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(145, 3, 'Pay', '2023-10-26 18:19:49', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026201949', 'NDg1LjU=', NULL, NULL),
(146, 3, 'Profit', '2023-10-26 18:20:06', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTk2Ljg=', 183, NULL),
(147, 3, 'Cash In', '2023-10-26 18:21:13', 'success', 'Paypal', '0HJ18448WM988713S', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(148, 3, 'Cash Out', '2023-10-26 18:23:27', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-10-26 18:23:43', 20.00, NULL, 'MjAwMA==', NULL, NULL),
(149, 3, 'Pay', '2023-10-26 18:23:55', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026202355', 'NjgwLjU=', NULL, NULL),
(151, 3, 'Profit', '2023-10-26 18:24:27', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTk2Ljg=', 183, NULL),
(152, 3, 'Pay', '2023-10-26 18:25:42', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026202542', 'MTEyLjU=', NULL, NULL),
(154, 3, 'Pay', '2023-10-26 18:26:28', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231026202628', 'MTEyLjU=', NULL, NULL),
(156, 3, 'Pay', '2023-10-27 02:11:36', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027041136', 'MjYxMi41', NULL, NULL),
(157, 10, 'Profit', '2023-10-27 02:12:29', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODAw', 128, NULL),
(159, 3, 'Pay', '2023-10-27 02:15:06', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027041506', 'Mjc0Mi41', NULL, NULL),
(161, 10, 'Profit', '2023-10-27 02:15:27', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODAw', 128, NULL),
(164, 3, 'Pay', '2023-10-27 02:17:18', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027041718', 'MzA3LjU=', NULL, NULL),
(165, 3, 'Pay', '2023-10-27 02:24:35', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027042435', 'MTEyLjU=', NULL, NULL),
(170, 3, 'Pay', '2023-10-27 02:26:56', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027042656', 'MTEyLjU=', NULL, NULL),
(172, 3, 'Pay', '2023-10-27 02:27:45', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027042745', 'MTEyLjU=', NULL, NULL),
(174, 3, 'Pay', '2023-10-27 02:30:58', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043057', 'MTc3LjU=', NULL, NULL),
(177, 3, 'Pay', '2023-10-27 02:31:50', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043150', 'MTc3LjU=', NULL, NULL),
(180, 3, 'Pay', '2023-10-27 02:33:11', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043311', 'MTc3LjU=', NULL, NULL),
(183, 3, 'Pay', '2023-10-27 02:34:46', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043446', 'MTEyLjU=', NULL, NULL),
(185, 3, 'Pay', '2023-10-27 02:35:11', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043511', 'Mzk2LjU=', NULL, NULL),
(188, 3, 'Profit', '2023-10-27 02:35:21', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(189, 3, 'Pay', '2023-10-27 02:38:05', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027043805', 'MzA3LjU=', NULL, NULL),
(194, 10, 'Profit', '2023-10-27 02:46:29', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODAw', 128, NULL),
(195, 3, 'Profit', '2023-10-27 02:46:29', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(197, 10, 'Profit', '2023-10-27 02:48:22', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MzIwMA==', 128, NULL),
(199, 3, 'Profit', '2023-10-27 02:48:22', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTk2Ljg=', 183, NULL),
(201, 3, 'Profit', '2023-10-27 02:50:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjk1LjI=', 183, NULL),
(202, 10, 'Profit', '2023-10-27 02:50:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTYwMA==', 128, NULL),
(203, 3, 'Profit', '2023-10-27 02:52:36', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(205, 3, 'Profit', '2023-10-27 02:53:23', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjk1LjI=', 183, NULL),
(207, 3, 'Profit', '2023-10-27 02:55:23', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTk2Ljg=', 183, NULL),
(210, 3, 'Profit', '2023-10-27 03:02:56', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(211, 3, 'Profit', '2023-10-27 03:02:56', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(212, 3, 'Profit', '2023-10-27 03:08:16', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(213, 3, 'Profit', '2023-10-27 03:08:16', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(222, 3, 'Profit', '2023-10-27 03:12:35', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(223, 3, 'Profit', '2023-10-27 03:12:35', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(226, 3, 'Profit', '2023-10-27 03:46:37', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(227, 3, 'Profit', '2023-10-27 03:46:37', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(228, 3, 'Profit', '2023-10-27 03:47:35', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(229, 3, 'Profit', '2023-10-27 03:47:35', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(230, 4, 'Profit', '2023-10-27 03:48:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(231, 4, 'Profit', '2023-10-27 03:48:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(236, 5, 'Profit', '2023-10-27 03:51:27', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(237, 5, 'Profit', '2023-10-27 03:51:27', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(258, 2, 'Profit', '2023-10-27 06:02:24', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(259, 2, 'Profit', '2023-10-27 06:02:24', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(260, 2, 'Profit', '2023-10-27 06:02:49', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 139, NULL),
(261, 2, 'Profit', '2023-10-27 06:02:49', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NTAw', 137, NULL),
(262, 2, 'Profit', '2023-10-27 06:04:46', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjg=', 139, NULL),
(263, 2, 'Profit', '2023-10-27 06:04:46', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTQ=', 137, NULL),
(264, 2, 'Profit', '2023-10-27 06:08:18', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjg=', 139, NULL),
(265, 2, 'Profit', '2023-10-27 06:08:18', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTQ=', 137, NULL),
(266, 2, 'Profit', '2023-10-27 06:08:24', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTQ=', 133, NULL),
(267, 3, 'Profit', '2023-10-27 06:08:24', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjk1LjI=', 183, NULL),
(268, 2, 'Profit', '2023-10-27 06:08:24', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Mjg=', 131, NULL),
(269, 3, 'Pay', '2023-10-27 07:08:51', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027090851', 'MTEyLjU=', NULL, NULL),
(270, 3, 'Pay', '2023-10-27 07:37:09', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027093709', 'MzcyLjU=', NULL, NULL),
(271, 3, 'Pay', '2023-10-27 07:37:44', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '20231027093744', 'MjU0Ny41', NULL, NULL),
(272, 3, 'Cancel', '2023-10-27 15:23:16', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MzI1', 139, NULL),
(273, 3, 'Cancel', '2023-10-27 15:44:50', 'success', NULL, NULL, NULL, NULL, NULL, '20231027173514', 'MTA0Nw==', 131, 'Need to modify order (size, color, quantity, etc.)'),
(274, 3, 'Pay', '2023-10-27 15:53:28', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310271753283', 'MTEyLjU=', NULL, NULL),
(275, 3, 'Cancel', '2023-10-27 15:53:47', 'success', NULL, NULL, NULL, NULL, NULL, '202310271753283', 'NjU=', 135, 'Need to change delivery address'),
(276, 3, 'Cancel', '2023-10-27 15:53:57', 'success', NULL, NULL, NULL, NULL, NULL, '202310271752473', 'NjU=', 131, 'Others'),
(277, 3, 'Pay', '2023-10-28 06:23:49', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310280823493', 'NzEuNjI=', NULL, NULL),
(278, 3, 'Pay', '2023-10-28 11:48:35', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310281348353', 'Mi42OA==', NULL, NULL),
(279, 3, 'Pay', '2023-10-28 12:38:54', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310281438543', 'ODIuMTY=', NULL, NULL),
(280, 3, 'Pay', '2023-10-28 14:11:57', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310281611573', 'MTMzLjk=', NULL, NULL),
(281, 3, 'Pay', '2023-10-28 14:37:32', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310281637323', 'MC43NA==', NULL, NULL),
(282, 3, 'Cash In', '2023-10-29 10:00:34', 'success', 'Paypal', '96R40226MS0612738', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(283, 3, 'Pay', '2023-10-29 16:37:27', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310291737273', 'OTIzLjU=', NULL, NULL),
(284, 3, 'Profit', '2023-10-29 16:37:46', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MzkzLjY=', 183, NULL),
(285, 3, 'Pay', '2023-10-29 16:45:06', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310291745063', 'Mjc0LjM=', NULL, NULL),
(286, 3, 'Profit', '2023-10-29 16:45:11', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTYw', 184, NULL),
(287, 3, 'Pay', '2023-10-29 17:38:54', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310291838543', 'MjQyLjU=', NULL, NULL),
(288, 3, 'Pay', '2023-10-29 18:51:13', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310291951133', 'Mzk2LjU=', NULL, NULL),
(289, 3, 'Pay', '2023-10-31 03:47:14', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310310447143', 'NzI3Ljk=', NULL, NULL),
(290, 10, 'Pay', '2023-10-31 03:53:11', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023103104531110', 'MTA3LjU=', NULL, NULL),
(291, 10, 'Pay', '2023-10-31 04:03:08', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023103105030810', 'MS40', NULL, NULL),
(292, 10, 'Pay', '2023-10-31 04:24:32', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023103105243210', 'NC41Mg==', NULL, NULL),
(293, 10, 'Pay', '2023-10-31 04:30:47', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023103105304710', 'ODMuMTg=', NULL, NULL),
(294, 10, 'Profit', '2023-10-31 04:41:09', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NDgw', 185, NULL),
(295, 3, 'Pay', '2023-10-31 05:04:09', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202310310604093', 'MTQ4MS45', NULL, NULL),
(296, 3, 'Profit', '2023-10-31 05:04:32', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MzIw', 184, NULL),
(297, 10, 'Profit', '2023-10-31 05:04:32', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NjQw', 185, NULL),
(298, 10, 'Pay', '2023-10-31 05:06:08', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023103106060810', 'ODcuNw==', NULL, NULL),
(299, 3, 'Pay', '2023-11-01 08:25:05', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311010925053', 'NTguNQ==', NULL, NULL),
(300, 3, 'Pay', '2023-11-01 09:23:51', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311011023513', 'MTE5LjY4', NULL, NULL),
(301, 3, 'Pay', '2023-11-01 09:25:35', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311011025353', 'MjIzLjc=', NULL, NULL),
(302, 3, 'Pay', '2023-11-01 09:34:53', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311011034533', 'MTQzLjU=', NULL, NULL),
(303, 3, 'Pay', '2023-11-01 09:36:14', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311011036143', 'MjQ5Ljc=', NULL, NULL),
(304, 2, 'Profit', '2023-11-06 02:03:55', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 137, NULL),
(305, 2, 'Profit', '2023-11-06 02:03:55', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 135, NULL),
(306, 2, 'Profit', '2023-11-06 02:03:55', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 133, NULL),
(307, 2, 'Profit', '2023-11-06 02:04:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 137, NULL),
(308, 2, 'Profit', '2023-11-06 02:04:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 131, NULL),
(309, 3, 'Profit', '2023-11-06 02:04:00', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'OTguNA==', 183, NULL),
(310, 3, 'Cash In', '2023-11-06 04:51:39', 'success', 'Paypal', '8HL135597T5442912', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(311, 3, 'Pay', '2023-11-06 04:52:11', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311060552113', 'NC4zNA==', NULL, NULL),
(312, 3, 'Pay', '2023-11-06 05:02:34', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311060602343', 'NTkwLjk=', NULL, NULL),
(313, 3, 'Profit', '2023-11-06 05:03:01', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NDAw', 186, NULL),
(322, 3, 'Cancel', '2023-11-06 08:49:01', 'success', NULL, NULL, NULL, NULL, NULL, '202311060936453', 'NzM1LjY=', 185, 'Don\'t want to buy anymore'),
(323, 13, 'Cash In', '2023-11-08 10:10:08', 'success', 'Paypal', '17M89378DC0835132', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(324, 13, 'Pay', '2023-11-08 10:10:18', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023110811101813', 'NTMyLjk=', NULL, NULL),
(325, 10, 'Profit', '2023-11-08 10:11:03', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MzIw', 185, NULL),
(326, 13, 'Cash In', '2023-11-09 08:33:51', 'success', 'Paypal', '89J13059P15240240', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(327, 13, 'Pay', '2023-11-09 08:34:14', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023110909341413', 'MS4y', NULL, NULL),
(328, 3, 'Pay', '2023-11-10 07:22:16', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311100822163', 'NjA5Ljk=', NULL, NULL),
(329, 3, 'Pay', '2023-11-10 07:23:51', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311100823513', 'NDkuOQ==', NULL, NULL),
(330, 3, 'Pay', '2023-11-10 08:00:53', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311100900533', 'NDkuOQ==', NULL, NULL),
(331, 2, 'Profit', '2023-11-11 07:26:47', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 135, NULL),
(332, 2, 'Profit', '2023-11-11 07:33:40', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTQ=', 133, NULL),
(333, 2, 'Profit', '2023-11-11 07:33:40', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MjE=', 131, NULL),
(334, 2, 'Profit', '2023-11-11 07:33:40', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 135, NULL),
(335, 2, 'Profit', '2023-11-11 07:34:09', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTQ=', 133, NULL),
(336, 2, 'Profit', '2023-11-11 07:34:09', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MjE=', 131, NULL),
(337, 2, 'Profit', '2023-11-11 07:34:09', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'Nw==', 135, NULL),
(338, 3, 'Pay', '2023-11-11 07:47:28', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311110847283', 'NTQuMjQ=', NULL, NULL),
(339, 3, 'Profit', '2023-11-11 14:45:55', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NDAw', 186, NULL),
(340, 3, 'Pay', '2023-11-11 15:18:32', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311111618323', 'NTMyLjk=', NULL, NULL),
(341, 15, 'Cash In', '2023-11-12 12:29:21', 'success', 'Paypal', '778103502H590142R', NULL, NULL, NULL, NULL, 'NTA=', NULL, NULL),
(342, 15, 'Pay', '2023-11-12 12:30:05', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111213300515', 'NS40NA==', NULL, NULL),
(343, 15, 'Cancel', '2023-11-12 12:35:05', 'success', NULL, NULL, NULL, NULL, NULL, '2023111213342515', 'NDguOTY=', 0, 'Others'),
(344, 15, 'Cash In', '2023-11-12 12:46:00', 'success', 'Paypal', '2DT826020N6233320', NULL, NULL, NULL, NULL, 'MTAwMDA=', NULL, NULL),
(345, 15, 'Pay', '2023-11-12 12:46:22', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111213462215', 'OTYuOQ==', NULL, NULL),
(346, 15, 'Pay', '2023-11-12 14:32:05', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111215320515', 'NS40NA==', NULL, NULL),
(347, 15, 'Pay', '2023-11-12 15:19:31', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111216193115', 'OTEuNDY=', NULL, NULL),
(348, 15, 'Pay', '2023-11-12 23:58:16', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111300581615', 'MTAyLjM0', NULL, NULL),
(349, 3, 'Pay', '2023-11-13 09:13:35', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311131013353', 'MTkuODg=', NULL, NULL),
(350, 15, 'Pay', '2023-11-13 09:14:10', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023111310141015', 'NDkuOQ==', NULL, NULL),
(351, 3, 'Pay', '2023-11-15 06:18:48', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311150718483', 'MzU1Ljc=', NULL, NULL),
(352, 15, 'Profit', '2023-11-15 06:31:01', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTIw', 187, NULL),
(353, 3, 'Pay', '2023-11-15 07:06:21', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311150806213', 'NDE0LjU=', NULL, NULL),
(354, 15, 'Profit', '2023-11-15 07:06:30', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODA=', 188, NULL),
(355, 3, 'Pay', '2023-11-15 07:09:30', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311150809303', 'NjQuNQ==', NULL, NULL),
(356, 3, 'Pay', '2023-11-15 08:11:24', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311150911243', 'MTA4Ni41', NULL, NULL),
(357, 15, 'Profit', '2023-11-15 08:11:32', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'NDAw', 187, NULL),
(358, 3, 'Pay', '2023-11-15 08:17:36', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '202311150917363', 'MjUxLjM=', NULL, NULL),
(359, 15, 'Profit', '2023-11-15 08:17:50', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODA=', 187, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_game_components`
--
ALTER TABLE `added_game_components`
  ADD PRIMARY KEY (`added_component_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `component_id` (`component_id`),
  ADD KEY `FK_added_game_components_color` (`color_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  ADD PRIMARY KEY (`admin_review_response_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`age_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `built_games`
--
ALTER TABLE `built_games`
  ADD PRIMARY KEY (`built_game_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD PRIMARY KEY (`added_component_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `cancel_order_reasons`
--
ALTER TABLE `cancel_order_reasons`
  ADD PRIMARY KEY (`cancel_order_reason_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `FK_cart_added_game_components` (`added_component_id`),
  ADD KEY `FK_cart_users` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_assets`
--
ALTER TABLE `component_assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `component_category`
--
ALTER TABLE `component_category`
  ADD PRIMARY KEY (`component_category_id`);

--
-- Indexes for table `component_colors`
--
ALTER TABLE `component_colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `component_templates`
--
ALTER TABLE `component_templates`
  ADD PRIMARY KEY (`template_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `constants`
--
ALTER TABLE `constants`
  ADD PRIMARY KEY (`constant_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `denied_approve_game_requests`
--
ALTER TABLE `denied_approve_game_requests`
  ADD PRIMARY KEY (`denied_approve_game_request_id`);

--
-- Indexes for table `denied_publish_requests`
--
ALTER TABLE `denied_publish_requests`
  ADD PRIMARY KEY (`denied_publish_request_id`);

--
-- Indexes for table `denied_update_publish_requests`
--
ALTER TABLE `denied_update_publish_requests`
  ADD PRIMARY KEY (`denied_update_publish_request_id`);

--
-- Indexes for table `destination_rates`
--
ALTER TABLE `destination_rates`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `dropzone_published_uploads`
--
ALTER TABLE `dropzone_published_uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `games_reasons`
--
ALTER TABLE `games_reasons`
  ADD PRIMARY KEY (`games_reason_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `game_components`
--
ALTER TABLE `game_components`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `index_banner`
--
ALTER TABLE `index_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markup_percentage`
--
ALTER TABLE `markup_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `added_component_id` (`added_component_id`);

--
-- Indexes for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_published_built_games`
--
ALTER TABLE `pending_published_built_games`
  ADD PRIMARY KEY (`pending_published_built_game_id`);

--
-- Indexes for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  ADD PRIMARY KEY (`pending_published_file_id`),
  ADD KEY `pending_published_built_game_id` (`pending_published_built_game_id`);

--
-- Indexes for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  ADD PRIMARY KEY (`pending_update_published_built_games_id`);

--
-- Indexes for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  ADD PRIMARY KEY (`pending_update_published_multiple_files_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD PRIMARY KEY (`published_game_id`),
  ADD KEY `age_id` (`age_id`);

--
-- Indexes for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  ADD PRIMARY KEY (`published_file_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `published_game_id` (`published_game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `to_deliver`
--
ALTER TABLE `to_deliver`
  ADD PRIMARY KEY (`to_deliver_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_review_response`
--
ALTER TABLE `user_review_response`
  ADD PRIMARY KEY (`user_review_response_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`wallet_transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_game_components`
--
ALTER TABLE `added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  MODIFY `admin_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `built_games`
--
ALTER TABLE `built_games`
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `cancel_order_reasons`
--
ALTER TABLE `cancel_order_reasons`
  MODIFY `cancel_order_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1096;

--
-- AUTO_INCREMENT for table `component_assets`
--
ALTER TABLE `component_assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `component_category`
--
ALTER TABLE `component_category`
  MODIFY `component_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `component_colors`
--
ALTER TABLE `component_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component_templates`
--
ALTER TABLE `component_templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `constants`
--
ALTER TABLE `constants`
  MODIFY `constant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `denied_approve_game_requests`
--
ALTER TABLE `denied_approve_game_requests`
  MODIFY `denied_approve_game_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `denied_publish_requests`
--
ALTER TABLE `denied_publish_requests`
  MODIFY `denied_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `denied_update_publish_requests`
--
ALTER TABLE `denied_update_publish_requests`
  MODIFY `denied_update_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destination_rates`
--
ALTER TABLE `destination_rates`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dropzone_published_uploads`
--
ALTER TABLE `dropzone_published_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `games_reasons`
--
ALTER TABLE `games_reasons`
  MODIFY `games_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `index_banner`
--
ALTER TABLE `index_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markup_percentage`
--
ALTER TABLE `markup_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `pending_published_built_games`
--
ALTER TABLE `pending_published_built_games`
  MODIFY `pending_published_built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  MODIFY `pending_published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  MODIFY `pending_update_published_built_games_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  MODIFY `pending_update_published_multiple_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `published_built_games`
--
ALTER TABLE `published_built_games`
  MODIFY `published_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  MODIFY `published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `to_deliver`
--
ALTER TABLE `to_deliver`
  MODIFY `to_deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `user_review_response`
--
ALTER TABLE `user_review_response`
  MODIFY `user_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `wallet_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `added_game_components`
--
ALTER TABLE `added_game_components`
  ADD CONSTRAINT `FK_added_game_components_color` FOREIGN KEY (`color_id`) REFERENCES `component_colors` (`color_id`),
  ADD CONSTRAINT `added_game_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  ADD CONSTRAINT `admin_review_response_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `admin_review_response_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD CONSTRAINT `built_games_added_game_components_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `built_games_added_game_components_ibfk_3` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_added_game_components` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`) ON DELETE CASCADE;

--
-- Constraints for table `component_assets`
--
ALTER TABLE `component_assets`
  ADD CONSTRAINT `component_assets_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `component_colors`
--
ALTER TABLE `component_colors`
  ADD CONSTRAINT `component_colors_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `component_templates`
--
ALTER TABLE `component_templates`
  ADD CONSTRAINT `component_templates_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `games_reasons`
--
ALTER TABLE `games_reasons`
  ADD CONSTRAINT `games_reasons_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`);

--
-- Constraints for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  ADD CONSTRAINT `pending_published_multiple_files_ibfk_1` FOREIGN KEY (`pending_published_built_game_id`) REFERENCES `pending_published_built_games` (`pending_published_built_game_id`);

--
-- Constraints for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD CONSTRAINT `published_built_games_ibfk_1` FOREIGN KEY (`age_id`) REFERENCES `age` (`age_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`published_game_id`) REFERENCES `published_built_games` (`published_game_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
