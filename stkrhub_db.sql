-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:15 AM
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
(595, NULL, 23, 0, NULL, 6, 5, '16mm', 20),
(596, 234, 21, 1, 'uploads/6565bae49376d_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '8.5 x 11', 20),
(597, 239, 23, 0, NULL, 3, 5, '16mm', 21),
(598, 239, 16, 1, 'uploads/6565c3b9e3770_Custom Extra Large Game Box 2 Height.pdf', 9, NULL, '2.75 x 2.75 ', 21),
(599, 239, 21, 1, 'uploads/6565c3c5388a2_Custom Extra Large Game Box 2 Height.pdf', 2, NULL, '8.5 x 11', 21),
(600, 238, 16, 1, 'uploads/6565c4328bcb8_Custom Extra Large Game Box 2 Height.pdf', 9, NULL, '2.75 x 2.75 ', 21),
(601, 238, 23, 0, NULL, 14, 5, '16mm', 21),
(602, 238, 32, 0, NULL, 14, 23, '2.25 x 5.25 inches', 21),
(603, 237, 15, 1, 'uploads/6565c47183e4c_Custom Extra Large Game Box 2 Height.pdf', 6, NULL, '2.5 x 2.5 ', 21),
(604, 237, 17, 1, 'uploads/6565c48040908_Custom Extra Large Game Box 2 Height.pdf', 13, NULL, '3.5 x 1.75', 21),
(605, 237, 48, 1, 'uploads/6565c48bc211e_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '12.5 x 12.5 x 3', 21),
(606, 237, 43, 1, 'uploads/6565c4a44d459_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '20 X 24 inches', 21),
(607, 236, 16, 1, 'uploads/6565c4bc6ed81_Custom Extra Large Game Box 2 Height.pdf', 4, NULL, '2.75 x 2.75 ', 21),
(608, 236, 36, 0, NULL, 6, 27, '1 inches diameter', 21),
(609, 236, 21, 1, 'uploads/6565c4d88b439_Custom Extra Large Game Box 2 Height.pdf', 7, NULL, '8.5 x 11', 21),
(610, 235, 16, 1, 'uploads/6565c5060b90a_Custom Extra Large Game Box 2 Height.pdf', 17, NULL, '2.75 x 2.75 ', 21),
(611, 235, 23, 0, NULL, 11, 5, '16mm', 21),
(612, 240, 15, 1, 'uploads/6565db8c0018e_6558d87cc83d9_12_5x12_5x2 (1).pdf', 5, NULL, '2.5 x 2.5 ', 22),
(613, 240, 25, 0, NULL, 3, 9, '2.5 x 0.5 inches', 22),
(614, 240, 23, 0, NULL, 4, 4, '16mm', 22),
(615, 241, 16, 1, 'uploads/6565dc04b3981_6558d87cc83d9_12_5x12_5x2 (1).pdf', 4, NULL, '2.75 x 2.75 ', 22),
(616, 241, 25, 0, NULL, 1, 9, '2.5 x 0.5 inches', 22),
(617, 241, 23, 0, NULL, 5, 4, '16mm', 22),
(618, 242, 16, 1, 'uploads/6565de8345ca9_6558d87cc83d9_12_5x12_5x2 (1).pdf', 1, NULL, '2.75 x 2.75 ', 23),
(619, 242, 38, 0, NULL, 5, 33, '1 inches', 23),
(620, 242, 48, 0, '', 1, NULL, '12.5 x 12.5 x 3', 23),
(621, 242, 23, 0, NULL, 8, 4, '16mm', 23),
(622, 243, 15, 1, 'uploads/6565dec7aec02_6558d87cc83d9_12_5x12_5x2.pdf', 4, NULL, '2.5 x 2.5 ', 23),
(623, 243, 23, 0, NULL, 5, 4, '16mm', 23),
(624, 243, 23, 0, NULL, 4, 6, '16mm', 23),
(625, 244, 48, 1, 'uploads/6565defdd3403__d41311cb-85b2-4588-8dba-658b9148d61f.jpg', 1, NULL, '12.5 x 12.5 x 3', 23),
(626, 244, 23, 0, NULL, 5, 6, '16mm', 23),
(627, 244, 47, 1, 'uploads/6565df15f0e48_6558d87cc83d9_12_5x12_5x2.pdf', 4, NULL, '12.5 x 10.5 x 2 in', 23),
(628, 248, 15, 1, 'uploads/6565e11320133_6558d87cc83d9_12_5x12_5x2.pdf', 7, NULL, '2.5 x 2.5 ', 24),
(629, 248, 23, 0, NULL, 4, 4, '16mm', 24),
(630, 247, 48, 1, 'uploads/6565e17ead6c9_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '12.5 x 12.5 x 3', 24),
(631, 247, 15, 1, 'uploads/6565e189de849_Custom Extra Large Game Box 2 Height.pdf', 3, NULL, '2.5 x 2.5 ', 24),
(632, 246, 21, 1, 'uploads/6565e19c0929c_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '8.5 x 11', 24),
(633, 246, 23, 0, NULL, 4, 4, '16mm', 24),
(634, 245, 15, 1, 'uploads/6565e1b760560_Custom Extra Large Game Box 2 Height.pdf', 1, NULL, '2.5 x 2.5 ', 24),
(635, 245, 25, 0, NULL, 1, 9, '2.5 x 0.5 inches', 24),
(636, 245, 35, 0, NULL, 5, 26, '0.7 inches diameter', 24),
(637, NULL, 23, 0, NULL, 1, 4, '16mm', 20),
(638, NULL, 23, 0, NULL, 1, 4, '16mm', 20),
(639, NULL, 25, 0, NULL, 1, 9, '2.5 x 0.5 inches', 20),
(640, 249, 40, 1, 'uploads/656b31a5a6c8e_65655de815d06_Custom Game Board 10.pdf', 1, NULL, '10 x 10', 28),
(641, 0, 15, 1, 'uploads/656d6f017e571_1701585094326.jpg', 2, NULL, '2.5 x 2.5 ', 20),
(642, 250, 23, 0, NULL, 1, 4, '16mm', 20),
(643, 250, 24, 0, NULL, 1, 8, ' 2.5 x 0.5', 20),
(644, 250, 18, 0, '', 1, NULL, '1.75 x 1.25', 20),
(645, NULL, 16, 0, '', 1, NULL, '2.75 x 2.75 ', 22);

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
(32, 20, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-11-28 09:56:03'),
(33, 21, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1, '2023-11-28 10:47:22'),
(34, 22, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-11-28 12:25:41'),
(35, 23, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-11-28 12:38:14'),
(36, 24, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-11-28 12:49:44'),
(37, 25, 'Dana Ricci Singson', '123', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1234', 'bangkulasi', 1, '2023-11-28 16:58:15'),
(39, 26, 'Sample User', '09560537312', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Karuhatan', '1441', 'Pedrina Street', 1, '2023-12-01 17:06:30'),
(40, 26, 'User User', '09192937346', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Mapulang Lupa', '1440', 'Modesto', 0, '2023-12-02 02:56:45'),
(41, 28, 'john kevin ilagan', '09263853401', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Coloong', '1445', 'San Miguel', 1, '2023-12-02 05:27:26');

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
  `avatar` varchar(255) DEFAULT NULL,
  `is_super_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `created_at`, `avatar`, `is_super_admin`) VALUES
(8, 'admin2', 'admin@gmail.com', '$2y$10$qIoTf1xPtWmByGuwXqWyCug/tL2ofNbjWyJFu4GOftetwag/.ucjS', '2023-11-12 09:04:28', NULL, 0),
(9, 'admin4', 'ads@gmail.com', '$2y$10$IfY0K22kQQBpADTHmD6kTeBAniZicwe.QKBwEO/Sy2zvv.JDPFdBC', '2023-11-12 14:47:16', 'assets/avatar/656614623711e_stkr_labs.jpg', 1),
(10, 'nicole', 'nicole@gmail.com', '$2y$10$kHkAdnlaxDG4uRahUcsWweGVjOqU.GDnUMUZdcb7TsTGLn2bRwYKG', '2023-11-26 10:32:20', NULL, 0);

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
(92, 9, 'login', '2023-11-28 08:12:52'),
(93, 9, 'login', '2023-11-28 08:31:51'),
(94, 9, 'login', '2023-11-28 12:26:46'),
(95, 9, 'login', '2023-11-28 12:39:30'),
(96, 9, 'login', '2023-11-28 12:50:16'),
(97, 9, 'login', '2023-11-28 13:58:43'),
(98, 9, 'login', '2023-11-28 14:49:26'),
(99, 9, 'login', '2023-11-28 15:36:00'),
(100, 9, 'login', '2023-11-28 17:06:28'),
(101, 9, 'login', '2023-11-29 17:45:40'),
(102, 9, 'login', '2023-11-30 00:14:30'),
(103, 9, 'login', '2023-12-02 05:25:03'),
(104, 9, 'login', '2023-12-02 13:32:01'),
(105, 9, 'login', '2023-12-03 12:36:02'),
(106, 9, 'login', '2023-12-04 02:57:47'),
(107, 0, 'logout', '2023-12-04 08:56:07'),
(108, 8, 'login', '2023-12-04 08:56:16'),
(109, 0, 'logout', '2023-12-04 09:30:57'),
(110, 9, 'login', '2023-12-04 09:31:05'),
(111, 9, 'login', '2023-12-05 12:31:38'),
(112, 9, 'login', '2023-12-05 23:17:56'),
(113, 9, 'login', '2023-12-05 23:32:50'),
(114, 9, 'login', '2023-12-06 05:43:26');

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
(410, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 188', '2023-11-16 01:34:06'),
(411, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 572', '2023-11-16 01:34:06'),
(412, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 147', '2023-11-16 02:18:22'),
(413, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 155', '2023-11-16 02:23:40'),
(414, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 148', '2023-11-16 02:23:40'),
(415, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 149', '2023-11-16 05:50:24'),
(416, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 156', '2023-11-16 05:50:55'),
(417, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 154', '2023-11-16 06:00:08'),
(418, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 153', '2023-11-16 06:00:08'),
(419, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 150', '2023-11-16 07:40:49'),
(420, 15, 'PAY USING STKR WALLET', 'Purchase built_game_id: 152', '2023-11-16 08:35:10'),
(421, 15, 'PAY USING STKR WALLET', 'Purchase ticket_id: 151', '2023-11-16 08:39:12'),
(422, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 152', '2023-11-17 00:45:55'),
(423, 16, 'PAY USING STKR WALLET', 'Purchase ticket_id: 153', '2023-11-17 03:15:24'),
(424, 16, 'PAY USING PAYPAL', 'Purchase ticket_id: 154', '2023-11-17 03:21:04'),
(425, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:22:44'),
(426, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:27:22'),
(427, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:28:34'),
(428, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:29:23'),
(429, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:33:49'),
(430, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:34:23'),
(431, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 158', '2023-11-17 03:35:42'),
(432, 16, 'PAY USING STKR WALLET', 'Purchase ticket_id: 155', '2023-11-17 06:38:31'),
(433, 16, 'PAY USING STKR WALLET', 'Purchase built_game_id: 159', '2023-11-17 06:40:11'),
(434, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 160', '2023-11-17 16:11:07'),
(435, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 156', '2023-11-17 16:15:03'),
(436, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 156', '2023-11-17 16:15:57'),
(437, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 156', '2023-11-17 16:48:30'),
(438, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 157', '2023-11-18 15:38:35'),
(439, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 161', '2023-11-18 15:50:38'),
(440, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 158', '2023-11-18 16:28:47'),
(441, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 161', '2023-11-18 16:29:58'),
(442, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 159', '2023-11-18 16:29:58'),
(443, 3, 'PAY USING STKR WALLET', 'Purchase ticket_id: 160', '2023-11-19 10:27:56'),
(444, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 162', '2023-11-19 10:36:20'),
(445, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 163', '2023-11-19 10:44:12'),
(446, 3, 'PAY USING STKR WALLET', 'Purchase built_game_id: 163', '2023-11-19 10:51:32'),
(447, 15, 'PAY USING STKR WALLET', 'Purchase published_game_id: 190', '2023-11-19 11:34:51'),
(448, 15, 'PAY USING STKR WALLET', 'Purchase published_game_id: 191', '2023-11-19 11:41:06'),
(449, 3, 'PAY USING STKR WALLET', 'Purchase added_component_id: 581', '2023-11-26 08:41:29'),
(450, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 583', '2023-11-27 10:54:11'),
(451, 17, 'PAY USING PAYPAL', 'Purchase ticket_id: 173', '2023-11-27 10:54:12'),
(452, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:01:08'),
(453, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:01:31'),
(454, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:01:54'),
(455, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:02:38'),
(456, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:04:31'),
(457, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 584', '2023-11-27 11:05:07'),
(458, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 585', '2023-11-27 11:12:58'),
(459, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 585', '2023-11-27 11:14:54'),
(460, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 586', '2023-11-27 11:18:24'),
(461, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 586', '2023-11-27 11:19:09'),
(462, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 586', '2023-11-27 11:20:03'),
(463, 17, 'PAY USING PAYPAL', 'Purchase added_component_id: 586', '2023-11-27 11:20:36'),
(464, 17, 'PAY USING PAYPAL', 'Purchase ticket_id: 174', '2023-11-27 11:28:37'),
(465, 17, 'PAY USING STKR WALLET', 'Purchase ticket_id: 175', '2023-11-27 11:43:05'),
(466, 17, 'PAY USING STKR WALLET', 'Purchase built_game_id: 165', '2023-11-27 11:53:54'),
(467, 17, 'PAY USING STKR WALLET', 'Purchase built_game_id: 165', '2023-11-27 11:54:18'),
(468, 3, 'PAY USING STKR WALLET', 'Purchase published_game_id: 190', '2023-11-27 15:06:07'),
(469, 18, 'PAY USING STKR WALLET', 'Purchase ticket_id: 176', '2023-11-28 07:29:07'),
(470, 18, 'PAY USING STKR WALLET', 'Purchase built_game_id: 166', '2023-11-28 07:32:58'),
(471, 20, 'PAY USING PAYPAL', 'Purchase ticket_id: 177', '2023-11-28 10:06:32'),
(472, 20, 'PAY USING STKR WALLET', 'Purchase built_game_id: 169', '2023-11-28 10:09:20'),
(473, 21, 'PAY USING PAYPAL', 'Purchase ticket_id: 182', '2023-11-28 10:47:52'),
(474, 21, 'PAY USING PAYPAL', 'Purchase ticket_id: 181', '2023-11-28 10:47:52'),
(475, 21, 'PAY USING PAYPAL', 'Purchase ticket_id: 180', '2023-11-28 10:47:53'),
(476, 21, 'PAY USING PAYPAL', 'Purchase ticket_id: 179', '2023-11-28 10:47:53'),
(477, 21, 'PAY USING PAYPAL', 'Purchase ticket_id: 178', '2023-11-28 10:47:53'),
(478, 21, 'PAY USING STKR WALLET', 'Purchase built_game_id: 170', '2023-11-28 10:50:26'),
(479, 21, 'PAY USING STKR WALLET', 'Purchase built_game_id: 171', '2023-11-28 10:50:26'),
(480, 21, 'PAY USING STKR WALLET', 'Purchase built_game_id: 172', '2023-11-28 10:50:26'),
(481, 21, 'PAY USING STKR WALLET', 'Purchase built_game_id: 173', '2023-11-28 10:50:26'),
(482, 21, 'PAY USING STKR WALLET', 'Purchase built_game_id: 174', '2023-11-28 10:50:26'),
(483, 22, 'PAY USING PAYPAL', 'Purchase ticket_id: 184', '2023-11-28 12:26:14'),
(484, 22, 'PAY USING PAYPAL', 'Purchase ticket_id: 183', '2023-11-28 12:26:15'),
(485, 22, 'PAY USING PAYPAL', 'Purchase built_game_id: 175', '2023-11-28 12:27:34'),
(486, 22, 'PAY USING PAYPAL', 'Purchase built_game_id: 176', '2023-11-28 12:27:34'),
(487, 23, 'PAY USING PAYPAL', 'Purchase ticket_id: 187', '2023-11-28 12:39:20'),
(488, 23, 'PAY USING PAYPAL', 'Purchase ticket_id: 186', '2023-11-28 12:39:20'),
(489, 23, 'PAY USING PAYPAL', 'Purchase ticket_id: 185', '2023-11-28 12:39:20'),
(490, 23, 'PAY USING PAYPAL', 'Purchase built_game_id: 177', '2023-11-28 12:40:11'),
(491, 23, 'PAY USING PAYPAL', 'Purchase built_game_id: 178', '2023-11-28 12:40:11'),
(492, 23, 'PAY USING PAYPAL', 'Purchase built_game_id: 179', '2023-11-28 12:40:11'),
(493, 24, 'PAY USING PAYPAL', 'Purchase ticket_id: 191', '2023-11-28 12:50:08'),
(494, 24, 'PAY USING PAYPAL', 'Purchase ticket_id: 190', '2023-11-28 12:50:08'),
(495, 24, 'PAY USING PAYPAL', 'Purchase ticket_id: 189', '2023-11-28 12:50:08'),
(496, 24, 'PAY USING PAYPAL', 'Purchase ticket_id: 188', '2023-11-28 12:50:08'),
(497, 24, 'PAY USING PAYPAL', 'Purchase built_game_id: 180', '2023-11-28 12:51:08'),
(498, 24, 'PAY USING PAYPAL', 'Purchase built_game_id: 181', '2023-11-28 12:51:08'),
(499, 24, 'PAY USING PAYPAL', 'Purchase built_game_id: 182', '2023-11-28 12:51:08'),
(500, 24, 'PAY USING PAYPAL', 'Purchase built_game_id: 183', '2023-11-28 12:51:08'),
(501, 20, 'PAY USING STKR WALLET', 'Purchase published_game_id: 206', '2023-11-28 14:40:20'),
(502, 20, 'PAY USING STKR WALLET', 'Purchase added_component_id: 637', '2023-11-30 01:19:12'),
(503, 28, 'PAY USING PAYPAL', 'Purchase ticket_id: 192', '2023-12-02 13:31:50'),
(504, 28, 'PAY USING PAYPAL', 'Purchase built_game_id: 184', '2023-12-02 13:33:15'),
(505, 20, 'PAY USING STKR WALLET', 'Purchase ticket_id: 193', '2023-12-04 06:40:56'),
(506, 20, 'PAY USING STKR WALLET', 'Purchase ticket_id: 194', '2023-12-04 08:28:57'),
(507, 20, 'PAY USING STKR WALLET', 'Purchase added_component_id: 641', '2023-12-04 08:28:57'),
(508, 20, 'PAY USING STKR WALLET', 'Purchase added_component_id: 639', '2023-12-04 08:28:57'),
(509, 20, 'PAY USING STKR WALLET', 'Purchase added_component_id: 638', '2023-12-04 08:28:57'),
(510, 20, 'PAY USING STKR WALLET', 'Purchase published_game_id: 199', '2023-12-04 08:28:57'),
(511, 20, 'PAY USING STKR WALLET', 'Purchase published_game_id: 205', '2023-12-04 08:28:57'),
(512, 20, 'PAY USING STKR WALLET', 'Purchase ticket_id: 195', '2023-12-04 08:47:54'),
(513, 20, 'PAY USING STKR WALLET', 'Purchase published_game_id: 198', '2023-12-05 23:32:29'),
(514, 22, 'PAY USING STKR WALLET', 'Purchase published_game_id: 206', '2023-12-06 05:32:53'),
(515, 22, 'PAY USING STKR WALLET', 'Purchase published_game_id: 206', '2023-12-06 05:39:19'),
(516, 22, 'PAY USING STKR WALLET', 'Purchase published_game_id: 204', '2023-12-06 07:02:49'),
(517, 22, 'PAY USING PAYPAL', 'Purchase added_component_id: 645', '2023-12-06 07:21:23'),
(518, 22, 'PAY USING STKR WALLET', 'Purchase published_game_id: 199', '2023-12-06 08:02:54'),
(519, 22, 'PAY USING PAYPAL', 'Purchase published_game_id: 197', '2023-12-06 08:05:32');

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
(85, 'Arkong Bato', 19),
(86, 'Bagbaguin', 19),
(87, 'Balangkas', 19),
(88, 'Bignay', 19),
(89, 'Bisig', 19),
(90, 'Canumay East\r\n', 19),
(91, 'Canumay West\r\n', 19),
(92, 'Coloong', 19),
(93, 'Dalandanan', 19),
(94, 'Gen T. De Leon', 19),
(95, 'Isla', 19),
(96, 'Karuhatan', 19),
(97, 'Lawang Bato', 19),
(98, 'Lingunan', 19),
(99, 'Mabolo', 19),
(100, 'Malanday', 19),
(101, 'Malinta', 19),
(102, 'Mapulang Lupa', 19),
(103, 'Marulas', 19),
(104, 'Maysan', 19),
(105, 'Palasan', 19),
(106, 'Parada', 19),
(107, 'Pariancillo Villa', 19),
(108, 'Pasolo', 19),
(109, 'Poblacion', 19),
(110, 'Pulo', 19),
(111, 'Punturin', 19),
(112, 'Rincon', 19),
(113, 'Tagalag', 19),
(114, 'Ugong', 19),
(115, 'Veinte Reales', 19),
(116, 'Wawang Pulo', 19),
(118, 'Barangay 288', 2),
(119, 'Barangay 289', 2),
(120, 'Barangay 290', 2),
(121, 'Barangay 291', 2),
(123, 'Barangay 292', 2),
(124, 'Barangay 293', 2),
(125, 'Barangay 294', 2),
(126, 'Barangay 295', 2),
(127, 'Barangay 296', 2),
(128, 'Barangay 297', 2),
(129, 'Barangay 1', 3),
(130, 'Barangay 2', 3),
(131, 'Barangay 3', 3),
(132, 'Barangay 4', 3),
(133, 'Barangay 5', 3),
(134, 'Barangay 6', 3),
(135, 'Barangay 7', 3),
(136, 'Barangay 8', 3),
(137, 'Barangay 9', 3),
(138, 'Barangay 10', 3),
(139, 'Barangay 11', 3),
(140, 'Barangay 12', 3),
(141, 'Barangay 13', 3),
(142, 'Barangay 14', 3),
(143, 'Barangay 15', 3),
(144, 'Barangay 16', 3),
(145, 'Barangay 17', 3),
(146, 'Barangay 18', 3),
(147, 'Barangay 19', 3),
(148, 'Barangay 20', 3),
(149, 'Barangay 21', 3),
(150, 'Barangay 22', 3),
(151, 'Barangay 23', 3),
(152, 'Barangay 24', 3),
(153, 'Barangay 25', 3),
(154, 'Barangay 26', 3),
(155, 'Barangay 27', 3),
(156, 'Barangay 28', 3),
(157, 'Barangay 29', 3),
(158, 'Barangay 30', 3),
(159, 'Barangay 31', 3),
(160, 'Barangay 32', 3),
(161, 'Barangay 33', 3),
(162, 'Barangay 34', 3),
(163, 'Barangay 35', 3),
(164, 'Barangay 36', 3),
(165, 'Barangay 37', 3),
(166, 'Barangay 38', 3),
(167, 'Barangay 39', 3),
(168, 'Barangay 40', 3),
(169, 'Barangay 41', 3),
(170, 'Barangay 42', 3),
(171, 'Barangay 43', 3),
(172, 'Barangay 44', 3),
(173, 'Barangay 45', 3),
(174, 'Barangay 46', 3),
(175, 'Barangay 47', 3),
(176, 'Barangay 48', 3),
(177, 'Barangay 49', 3),
(178, 'Barangay 50', 3),
(179, 'Barangay 51', 3),
(180, 'Barangay 52', 3),
(181, 'Barangay 53', 3),
(182, 'Barangay 54', 3),
(183, 'Barangay 55', 3),
(184, 'Barangay 56', 3),
(185, 'Barangay 57', 3),
(186, 'Barangay 58', 3),
(187, 'Barangay 59', 3),
(188, 'Barangay 60', 3),
(189, 'Barangay 62', 3),
(190, 'Barangay 63', 3),
(191, 'Barangay 64', 3),
(192, 'Barangay 65', 3),
(193, 'Barangay 66', 3),
(194, 'Barangay 67', 3),
(195, 'Barangay 68', 3),
(196, 'Barangay 69', 3),
(197, 'Barangay 70', 3),
(198, 'Barangay 71', 3),
(199, 'Barangay 72', 3),
(200, 'Barangay 73', 3),
(201, 'Barangay 74', 3),
(202, 'Barangay 75', 3),
(203, 'Barangay 76', 3),
(204, 'Barangay 77', 3),
(205, 'Barangay 78', 3),
(206, 'Barangay 79', 3),
(207, 'Barangay 80', 3),
(208, 'Barangay 81', 3),
(209, 'Barangay 82', 3),
(210, 'Barangay 83', 3),
(211, 'Barangay 84', 3),
(212, 'Barangay 85', 3),
(213, 'Barangay 86', 3),
(214, 'Barangay 87', 3),
(215, 'Barangay 88', 3),
(216, 'Barangay 89', 3),
(217, 'Barangay 90', 3),
(218, 'Barangay 91', 3),
(219, 'Barangay 92', 3),
(220, 'Barangay 93', 3),
(221, 'Barangay 94', 3),
(222, 'Barangay 95', 3),
(223, 'Barangay 96', 3),
(224, 'Barangay 97', 3),
(225, 'Barangay 98', 3),
(226, 'Barangay 99', 3),
(227, 'Barangay 100', 3),
(228, 'Barangay 101', 3),
(229, 'Barangay 102', 3),
(230, 'Barangay 103', 3),
(231, 'Barangay 104', 3),
(232, 'Barangay 105', 3),
(233, 'Barangay 106', 3),
(234, 'Barangay 107', 3),
(235, 'Barangay 108', 3),
(236, 'Barangay 109', 3),
(237, 'Barangay 110', 3),
(238, 'Barangay 111', 3),
(239, 'Barangay 112', 3),
(240, 'Barangay 113', 3),
(241, 'Barangay 114', 3),
(242, 'Barangay 115', 3),
(243, 'Barangay 116', 3),
(244, 'Barangay 117', 3),
(245, 'Barangay 118', 3),
(246, 'Barangay 119', 3),
(247, 'Barangay 120', 3),
(248, 'Barangay 121', 3),
(249, 'Barangay 122', 3),
(250, 'Barangay 123', 3),
(251, 'Barangay 124', 3),
(252, 'Barangay 125', 3),
(253, 'Barangay 126', 3),
(254, 'Barangay 127', 3),
(255, 'Barangay 128', 3),
(256, 'Barangay 129', 3),
(257, 'Barangay 130', 3),
(258, 'Barangay 131', 3),
(259, 'Barangay 132', 3),
(260, 'Barangay 133', 3),
(261, 'Barangay 134', 3),
(262, 'Barangay 135', 3),
(263, 'Barangay 136', 3),
(264, 'Barangay 137', 3),
(265, 'Barangay 138', 3),
(266, 'Barangay 139', 3),
(267, 'Barangay 140', 3),
(268, 'Barangay 141', 3),
(269, 'Barangay 142', 3),
(270, 'Barangay 143', 3),
(271, 'Barangay 144', 3),
(272, 'Barangay 145', 3),
(273, 'Barangay 146', 3),
(274, 'Barangay 147', 3),
(275, 'Barangay 148', 3),
(276, 'Barangay 149', 3),
(277, 'Barangay 150', 3),
(278, 'Barangay 151', 3),
(279, 'Barangay 152', 3),
(280, 'Barangay 153', 3),
(281, 'Barangay 154', 3),
(282, 'Barangay 155', 3),
(283, 'Barangay 156', 3),
(284, 'Barangay 157', 3),
(285, 'Barangay 158', 3),
(286, 'Barangay 159', 3),
(287, 'Barangay 160', 3),
(288, 'Barangay 161', 3),
(289, 'Barangay 162', 3),
(290, 'Barangay 163', 3),
(291, 'Barangay 164', 3),
(292, 'Barangay 165', 3),
(293, 'Barangay 166', 3),
(294, 'Barangay 167', 3),
(295, 'Barangay 168', 3),
(296, 'Barangay 169', 3),
(297, 'Barangay 170', 3),
(298, 'Barangay 171', 3),
(299, 'Barangay 172', 3),
(300, 'Barangay 173', 3),
(301, 'Barangay 174', 3),
(302, 'Barangay 175', 3),
(303, 'Barangay 176', 3),
(304, 'Barangay 177', 3),
(305, 'Barangay 178', 3),
(306, 'Barangay 179', 3),
(307, 'Barangay 180', 3),
(308, 'Barangay 181', 3),
(309, 'Barangay 182', 3),
(310, 'Barangay 183', 3),
(311, 'Barangay 184', 3),
(312, 'Barangay 185', 3),
(313, 'Barangay 186', 3),
(314, 'Barangay 187', 3),
(315, 'Barangay 188', 3),
(316, 'Almanza Uno', 4),
(317, 'Almanza Dos', 4),
(318, 'C.A.A. – B. F. International', 4),
(319, 'Daniel Fajardo', 4),
(320, 'Elias Aldana', 4),
(321, 'Ilaya', 4),
(322, 'Manuyo Uno', 4),
(323, 'Manuyo Dos', 4),
(324, 'Pamplona Uno', 4),
(325, 'Pamplona Dos', 4),
(326, 'Pamplona Tres', 4),
(327, 'Pilar Village', 4),
(328, 'Pulang Lupa Uno', 4),
(329, 'Pulang Lupa Dos', 4),
(330, 'Talon Uno', 4),
(331, 'Talon Dos', 4),
(332, 'Talon Tres', 4),
(333, 'Talon Kuatro', 4),
(334, 'Talon Singko', 4),
(335, 'Zapote', 4),
(336, 'Bangkal', 5),
(337, 'Bel-Air', 5),
(338, 'Carmona', 5),
(339, 'Cembo', 5),
(340, 'Comembo', 5),
(341, 'Dasmariñas', 5),
(342, 'Rembo Silangan', 5),
(343, 'Forbes Park', 5),
(344, 'Guadalupe Nuevo', 5),
(345, 'Guadalupe Viejo', 5),
(346, 'Kasilawan', 5),
(347, 'La Paz', 5),
(348, 'Magallanes', 5),
(349, 'Olympia', 5),
(350, 'Palanan', 5),
(351, 'Pembo', 5),
(352, 'Pinagkaisahan', 5),
(353, 'Pio del Pilar', 5),
(354, 'Pitogo', 5),
(355, 'Poblacion', 5),
(356, 'Post Proper Hilaga', 5),
(357, 'Post Proper Timog', 5),
(358, 'Rizal', 5),
(359, 'San Antonio', 5),
(360, 'San Isidro', 5),
(361, 'San Lorenzo', 5),
(362, 'Santa Cruz', 5),
(363, 'Singkamas', 5),
(364, 'Timog Cembo', 5),
(365, 'Tejeros', 5),
(366, 'Urdaneta', 5),
(367, 'Valenzuela', 5),
(368, 'Rembo Kanluran', 5),
(369, 'Acacia', 6),
(370, 'Baritan', 6),
(371, 'Bayan-bayanan', 6),
(372, 'Catmon', 6),
(373, 'Concepcion', 6),
(374, 'Dampalit', 6),
(375, 'Flores', 6),
(376, 'Hulong Duhat', 6),
(377, 'Ibaba', 6),
(378, 'Longos', 6),
(379, 'Maysilo', 6),
(380, 'Muzon', 6),
(381, 'Niugan', 6),
(382, 'Panghulo', 6),
(383, 'Potrero', 6),
(384, 'San Agustin', 6),
(385, 'Santolan', 6),
(386, 'Tañong', 6),
(387, 'Tinajeros', 6),
(388, 'Tonsuya', 6),
(389, 'Tugatog', 6),
(390, 'Addition Hills', 7),
(391, 'Bagong Silang', 7),
(392, 'Barangka Drive', 7),
(393, 'Barangka Ibaba', 7),
(394, 'Barangka Ilaya', 7),
(395, 'Barangka Itaas', 7),
(396, 'Buayang Bato', 7),
(397, 'Burol', 7),
(398, 'Daang Bakal', 7),
(399, 'Hagdan Bato Itaas', 7),
(400, 'Hagdan Bato Libis', 7),
(401, 'Harapin Ang Bukas', 7),
(402, 'Highway Hills', 7),
(403, 'Hulo', 7),
(404, 'Mabini–J.Rizal', 7),
(405, 'Malamig', 7),
(406, 'Mauway', 7),
(407, 'Namayan', 7),
(408, 'New Zañiga', 7),
(409, 'Old Zañiga', 7),
(410, 'Pag-Asa', 7),
(411, 'Plainview', 7),
(412, 'Pleasant Hills', 7),
(413, 'Poblacion', 7),
(414, 'San Jose', 7),
(415, 'Vergara', 7),
(416, 'Wack-Wack Greenhills', 7),
(417, 'Barangay 659', 8),
(418, 'Barangay 660', 8),
(419, 'Barangay 661', 8),
(420, 'Barangay 663', 8),
(421, 'Barangay 664', 8),
(422, 'Barangay 666', 8),
(423, 'Barangay 667', 8),
(424, 'Barangay 668', 8),
(425, 'Barangay 669', 8),
(426, 'Barangay 670', 8),
(427, 'Barangay 671', 8),
(428, 'Barangay 672', 8),
(429, 'Barangay 673', 8),
(430, 'Barangay 674', 8),
(431, 'Barangay 675', 8),
(432, 'Barangay 676', 8),
(433, 'Barangay 677', 8),
(434, 'Barangay 678', 8),
(435, 'Barangay 679', 8),
(436, 'Barangay 680', 8),
(437, 'Barangay 681', 8),
(438, 'Barangay 682', 8),
(439, 'Barangay 683', 8),
(440, 'Barangay 684', 8),
(441, 'Barangay 685', 8),
(442, 'Barangay 686', 8),
(443, 'Barangay 687', 8),
(444, 'Barangay 688', 8),
(445, 'Barangay 689', 8),
(446, 'Barangay 690', 8),
(447, 'Barangka', 9),
(448, 'Calumpang', 9),
(449, 'Concepcion Dos', 9),
(450, 'Concepcion Uno', 9),
(451, 'Fortune', 9),
(452, 'Industrial Valley', 9),
(453, 'Jesus de La Peña', 9),
(454, 'Malanday', 9),
(455, 'Marikina Heights', 9),
(456, 'Nangka', 9),
(457, 'Parang', 9),
(458, 'San Roque', 9),
(459, 'Santa Elena', 9),
(460, 'Santo Niño', 9),
(461, 'Tañong', 9),
(462, 'Tumana', 9),
(467, 'Alabang', 10),
(468, 'Bayanan', 10),
(469, 'Buli', 10),
(470, 'Cupang', 10),
(471, 'New Alabang Village', 10),
(472, 'Poblacion', 10),
(473, 'Putatan', 10),
(474, 'Sucat', 10),
(475, 'Tunasan', 10),
(476, 'Bagumbayan North', 11),
(477, 'Bagumbayan South', 11),
(478, 'Bangculasi', 11),
(479, 'Daanghari', 11),
(480, 'Navotas East', 11),
(481, 'Navotas West', 11),
(482, 'NBBS Dagat-dagatan', 11),
(483, 'NBBS Kaunlaran', 11),
(484, 'NBBS Proper', 11),
(485, 'North Bay Boulevard North', 11),
(486, 'San Jose', 11),
(487, 'San Rafael Village', 11),
(488, 'San Roque', 11),
(489, 'Sipac-Almacen', 11),
(490, 'Tangos North', 11),
(491, 'Tangos South', 11),
(492, 'Tanza 1', 11),
(493, 'Tanza 2', 11),
(494, 'Baclaran', 12),
(495, 'Tambo', 12),
(496, 'Dongalo', 12),
(497, 'Sto. Niño', 12),
(498, 'La Huerta', 12),
(499, 'San Dionisio', 12),
(500, 'San Isidro', 12),
(501, 'Vitalez', 12),
(502, 'San Antonio', 12),
(503, 'B.F. Homes', 12),
(504, 'Sun Valley', 12),
(505, 'Marcelo Green', 12),
(506, 'Don Bosco', 12),
(507, 'Merville', 12),
(508, 'San Martin de Porres', 12),
(509, 'Moonwalk', 12),
(510, 'Barangay 1', 13),
(511, 'Barangay 2', 13),
(512, 'Barangay 3', 13),
(513, 'Barangay 4', 13),
(514, 'Barangay 5', 13),
(515, 'Barangay 6', 13),
(516, 'Barangay 7', 13),
(517, 'Barangay 8', 13),
(518, 'Barangay 9', 13),
(519, 'Barangay 10', 13),
(520, 'Barangay 11', 13),
(521, 'Barangay 12', 13),
(522, 'Barangay 13', 13),
(523, 'Barangay 14', 13),
(524, 'Barangay 15', 13),
(525, 'Barangay 16', 13),
(526, 'Barangay 17', 13),
(527, 'Barangay 18', 13),
(528, 'Barangay 19', 13),
(529, 'Barangay 20', 13),
(530, 'Barangay 21', 13),
(531, 'Barangay 22', 13),
(532, 'Barangay 23', 13),
(533, 'Barangay 24', 13),
(534, 'Barangay 25', 13),
(535, 'Barangay 26', 13),
(536, 'Barangay 27', 13),
(537, 'Barangay 28', 13),
(538, 'Barangay 29', 13),
(539, 'Barangay 30', 13),
(540, 'Barangay 31', 13),
(541, 'Barangay 32', 13),
(542, 'Barangay 33', 13),
(543, 'Barangay 34', 13),
(544, 'Barangay 35', 13),
(545, 'Barangay 36', 13),
(546, 'Barangay 37', 13),
(547, 'Barangay 38', 13),
(548, 'Barangay 39', 13),
(549, 'Barangay 40', 13),
(550, 'Barangay 41', 13),
(551, 'Barangay 42', 13),
(552, 'Barangay 43', 13),
(553, 'Barangay 44', 13),
(554, 'Barangay 45', 13),
(555, 'Barangay 46', 13),
(556, 'Barangay 47', 13),
(557, 'Barangay 48', 13),
(558, 'Barangay 49', 13),
(559, 'Barangay 50', 13),
(560, 'Barangay 51', 13),
(561, 'Barangay 52', 13),
(562, 'Barangay 53', 13),
(563, 'Barangay 54', 13),
(564, 'Barangay 55', 13),
(565, 'Barangay 56', 13),
(566, 'Barangay 57', 13),
(567, 'Barangay 58', 13),
(568, 'Barangay 59', 13),
(569, 'Barangay 60', 13),
(570, 'Barangay 61', 13),
(571, 'Barangay 62', 13),
(572, 'Barangay 63', 13),
(573, 'Barangay 64', 13),
(574, 'Barangay 65', 13),
(575, 'Barangay 66', 13),
(576, 'Barangay 67', 13),
(577, 'Barangay 68', 13),
(578, 'Barangay 69', 13),
(579, 'Barangay 70', 13),
(580, 'Barangay 71', 13),
(581, 'Barangay 72', 13),
(582, 'Barangay 73', 13),
(583, 'Barangay 74', 13),
(584, 'Barangay 75', 13),
(585, 'Barangay 76', 13),
(586, 'Barangay 77', 13),
(587, 'Barangay 78', 13),
(588, 'Barangay 79', 13),
(589, 'Barangay 80', 13),
(590, 'Barangay 81', 13),
(591, 'Barangay 82', 13),
(592, 'Barangay 83', 13),
(593, 'Barangay 84', 13),
(594, 'Barangay 85', 13),
(595, 'Barangay 86', 13),
(596, 'Barangay 87', 13),
(597, 'Barangay 88', 13),
(598, 'Barangay 89', 13),
(599, 'Barangay 90', 13),
(600, 'Barangay 91', 13),
(601, 'Barangay 92', 13),
(602, 'Barangay 93', 13),
(603, 'Barangay 94', 13),
(604, 'Barangay 95', 13),
(605, 'Barangay 96', 13),
(606, 'Barangay 97', 13),
(607, 'Barangay 98', 13),
(608, 'Barangay 99', 13),
(609, 'Barangay 100', 13),
(610, 'Bagong Ilog', 14),
(611, 'Bagong Katipunan', 14),
(612, 'Bambang', 14),
(613, 'Buting', 14),
(614, 'Caniogan', 14),
(615, 'Dela Paz', 14),
(616, 'Kalawaan', 14),
(617, 'Kapasigan', 14),
(618, 'Kapitolyo', 14),
(619, 'Malinao', 14),
(620, 'Manggahan', 14),
(621, 'Maybunga', 14),
(622, 'Oranbo', 14),
(623, 'Palatiw', 14),
(624, 'Pinagbuhatan', 14),
(625, 'Pineda', 14),
(626, 'Rosario', 14),
(627, 'Sagad', 14),
(628, 'San Antonio', 14),
(629, 'San Joaquin', 14),
(630, 'San Jose', 14),
(631, 'San Miguel', 14),
(632, 'San Nicolas', 14),
(633, 'Santa Cruz', 14),
(634, 'Santa Lucia', 14),
(635, 'Santa Rosa', 14),
(636, 'Santo Tomas', 14),
(637, 'Santolan', 14),
(638, 'Sumilang', 14),
(639, 'Ugong', 14),
(640, 'Aguho', 15),
(641, 'Magtanggol', 15),
(642, 'Martires del 96', 15),
(643, 'Poblacion', 15),
(644, 'San Pedro', 15),
(645, 'San Roque', 15),
(646, 'Santa Ana', 15),
(647, 'Santo Rosario-Kanluran', 15),
(648, 'Santo Rosario-Silangan', 15),
(649, 'Tabacalera', 15),
(650, 'Alicia', 16),
(651, 'Amihan', 16),
(652, 'Apolonio Samson', 16),
(653, 'Aurora', 16),
(654, 'Baesa', 16),
(655, 'Bagbag', 16),
(656, 'Bagong Lipunan ng Crame', 16),
(657, 'Bagong Pag-asa', 16),
(658, 'Bagong Silangan', 16),
(659, 'Bagumbayan', 16),
(660, 'Bagumbuhay', 16),
(661, 'Bahay Toro', 16),
(662, 'Balingasa', 16),
(663, 'Balong Bato', 16),
(664, 'Batasan Hills', 16),
(665, 'Bayanihan', 16),
(666, 'Blue Ridge A', 16),
(667, 'Blue Ridge B', 16),
(668, 'Botocan', 16),
(669, 'Bungad', 16),
(670, 'Camp Aguinaldo', 16),
(671, 'Capri', 16),
(672, 'Central', 16),
(673, 'Claro', 16),
(674, 'Commonwealth', 16),
(675, 'Culiat', 16),
(676, 'Damar', 16),
(677, 'Damayan', 16),
(678, 'Damayang Lagi', 16),
(679, 'Del Monte', 16),
(680, 'Dioquino Zobel', 16),
(681, 'Don Manuel', 16),
(682, 'Doña Imelda', 16),
(683, 'Doña Josefa', 16),
(684, 'Duyan-duyan', 16),
(685, 'E. Rodriguez', 16),
(686, 'East Kamias', 16),
(687, 'Escopa I', 16),
(688, 'Escopa II', 16),
(689, 'Escopa III', 16),
(690, 'Escopa IV', 16),
(691, 'Fairview', 16),
(692, 'Greater Lagro', 16),
(693, 'Gulod', 16),
(694, 'Holy Spirit', 16),
(695, 'Horseshoe', 16),
(696, 'Immaculate Concepcion', 16),
(697, 'Kaligayahan', 16),
(698, 'Kalusugan', 16),
(699, 'Kamuning', 16),
(700, 'Katipunan', 16),
(701, 'Kaunlaran', 16),
(702, 'Kristong Hari', 16),
(703, 'Krus na Ligas', 16),
(704, 'Laging Handa', 16),
(705, 'Libis', 16),
(706, 'Lourdes', 16),
(707, 'Loyola Heights', 16),
(708, 'Maharlika', 16),
(709, 'Malaya', 16),
(710, 'Mangga', 16),
(711, 'Manresa', 16),
(712, 'Mariana', 16),
(713, 'Mariblo', 16),
(714, 'Marilag', 16),
(715, 'Masagana', 16),
(716, 'Masambong', 16),
(717, 'Matandang Balara', 16),
(718, 'Milagrosa', 16),
(719, 'N. S. Amoranto', 16),
(720, 'Nagkaisang Nayon', 16),
(721, 'Nayong Kanluran', 16),
(722, 'New Era', 16),
(723, 'North Fairview', 16),
(724, 'Novaliches Proper', 16),
(725, 'Obrero', 16),
(726, 'Old Capitol Site', 16),
(727, 'Paang Bundok', 16),
(728, 'Pag-ibig sa Nayon', 16),
(729, 'Paligsahan', 16),
(730, 'Paltok', 16),
(731, 'Pansol', 16),
(732, 'Paraiso', 16),
(733, 'Pasong Putik Proper', 16),
(734, 'Pasong Tamo', 16),
(735, 'Payatas', 16),
(736, 'Phil-Am', 16),
(737, 'Pinagkaisahan', 16),
(738, 'Pinyahan', 16),
(739, 'Project 6', 16),
(740, 'Quirino 2-A', 16),
(741, 'Quirino 2-B', 16),
(742, 'Quirino 2-C', 16),
(743, 'Quirino 3-A', 16),
(744, 'Ramon Magsaysay', 16),
(745, 'Roxas', 16),
(746, 'Sacred Heart', 16),
(747, 'Saint Ignatius', 16),
(748, 'Saint Peter', 16),
(749, 'Salvacion', 16),
(750, 'San Agustin', 16),
(751, 'San Antonio', 16),
(752, 'San Bartolome', 16),
(753, 'San Isidro', 16),
(754, 'San Isidro Labrador', 16),
(755, 'San Jose', 16),
(756, 'San Martin de Porres', 16),
(757, 'San Roque', 16),
(758, 'San Vicente', 16),
(759, 'Sangandaan', 16),
(760, 'Santa Cruz', 16),
(761, 'Santa Lucia', 16),
(762, 'Santa Monica', 16),
(763, 'Santa Teresita', 16),
(764, 'Santo Cristo', 16),
(765, 'Santo Domingo', 16),
(766, 'Santo Niño', 16),
(767, 'Santol', 16),
(768, 'Sauyo', 16),
(769, 'Sienna', 16),
(770, 'Sikatuna Village', 16),
(771, 'Silangan', 16),
(772, 'Socorro', 16),
(773, 'South Triangle', 16),
(774, 'Tagumpay', 16),
(775, 'Talayan', 16),
(776, 'Talipapa', 16),
(777, 'Tandang Sora', 16),
(778, 'Tatalon', 16),
(779, 'Teachers Village East', 16),
(780, 'Teachers Village West', 16),
(781, 'U.P. Campus', 16),
(782, 'U.P. Village', 16),
(783, 'Ugong Norte', 16),
(784, 'Unang Sigaw', 16),
(785, 'Valencia', 16),
(786, 'Vasra', 16),
(787, 'Veterans Village', 16),
(788, 'Villa Maria Clara', 16),
(789, 'West Kamias', 16),
(790, 'West Triangle', 16),
(791, 'White Plains', 16),
(792, 'Addition Hills', 17),
(793, 'Balong-Bato', 17),
(794, 'Batis', 17),
(795, 'Corazon de Jesus', 17),
(796, 'Ermitaño', 17),
(797, 'Greenhills', 17),
(798, 'Halo-halo', 17),
(799, 'Isabelita', 17),
(800, 'Kabayanan', 17),
(801, 'Little Baguio', 17),
(802, 'Maytunas', 17),
(803, 'Onse', 17),
(804, 'Pasadeña', 17),
(805, 'Pedro Cruz', 17),
(806, 'Progreso', 17),
(807, 'Rivera', 17),
(808, 'Salapan', 17),
(809, 'San Perfecto', 17),
(810, 'Santa Lucia', 17),
(811, 'Tibagan', 17),
(812, 'West Crame', 17),
(813, 'Bagumbayan', 18),
(814, 'Bambang', 18),
(815, 'Calzada', 18),
(816, 'Central Bicutan', 18),
(817, 'Central Signal Village', 18),
(818, 'Fort Bonifacio', 18),
(819, 'Hagonoy', 18),
(820, 'Ibayo-Tipas', 18),
(821, 'Katuparan', 18),
(822, 'Ligid-Tipas', 18),
(823, 'Lower Bicutan', 18),
(824, 'Maharlika Village', 18),
(825, 'Napindan', 18),
(826, 'New Lower Bicutan', 18),
(827, 'North Daang Hari', 18),
(828, 'North Signal Village', 18),
(829, 'Palingon', 18),
(830, 'Pinagsama', 18),
(831, 'San Miguel', 18),
(832, 'Santa Ana', 18),
(833, 'South Daang Hari', 18),
(834, 'South Signal Village', 18),
(835, 'Tanyag', 18),
(836, 'Tuktukan', 18),
(837, 'Upper Bicutan', 18),
(838, 'Ususan', 18),
(839, 'Wawa', 18),
(840, 'Western Bicutan', 18),
(841, 'Agtangao', 94),
(842, 'Angad', 94),
(843, 'Bañacao', 94),
(844, 'Bangbangar', 94),
(845, 'Cabuloan', 94),
(846, 'Calaba', 94),
(847, 'Cosili East', 94),
(848, 'Cosili West', 94),
(849, 'Dangdangla', 94),
(850, 'Lingtan', 94),
(851, 'Lipcan', 94),
(852, 'Lubong', 94),
(853, 'Macarcarmay', 94),
(854, 'Macray', 94),
(855, 'Malita', 94),
(856, 'Maoay', 94),
(857, 'Palao', 94),
(858, 'Patucannay', 94),
(859, 'Sagap', 94),
(860, 'San Antonio', 94),
(861, 'Santa Rosa', 94),
(862, 'Sao-atan', 94),
(863, 'Sappaac', 94),
(864, 'Tablac', 94),
(865, 'Zone 1 Poblacion', 94),
(866, 'Zone 2 Poblacion', 94),
(867, 'Zone 3 Poblacion', 94),
(868, 'Zone 4 Poblacion', 94),
(869, 'Zone 5 Poblacion', 94),
(870, 'Zone 6 Poblacion', 94),
(871, 'Zone 7 Poblacion', 94),
(872, 'Amti', 95),
(873, 'Bao-yan', 95),
(874, 'Danac East', 95),
(875, 'Danac West', 95),
(876, 'Dao-angan', 95),
(877, 'Dumagas', 95),
(878, 'Kilong-Olao', 95),
(879, 'Poblacion', 95),
(880, 'Abang', 96),
(881, 'Bangbangcag', 96),
(882, 'Bangcagan', 96),
(883, 'Banglolao', 96),
(884, 'Bugbog', 96),
(885, 'Calao', 96),
(886, 'Dugong', 96),
(887, 'Labon', 96),
(888, 'Layugan', 96),
(889, 'Madalipay', 96),
(890, 'North Poblacion', 96),
(891, 'Pagala', 96),
(892, 'Pakiling', 96),
(893, 'Palaquio', 96),
(894, 'Patoc', 96),
(895, 'Quimloong', 96),
(896, 'Salnec', 96),
(897, 'San Miguel', 96),
(898, 'Siblong', 96),
(899, 'South Poblacion', 96),
(900, 'Tabiog', 96),
(901, 'Amti', 97),
(902, 'Bao-yan', 97),
(903, 'Danac East', 97),
(904, 'Danac West', 97),
(905, 'Dao-angan', 97),
(906, 'Dumagas', 97),
(907, 'Kilong-Olao', 97),
(908, 'Poblacion', 97),
(909, 'Ableg', 98),
(910, 'Cabaruyan', 98),
(911, 'Pikek', 98),
(912, 'Tui', 98),
(913, 'Abaquid', 99),
(914, 'Cabaruan', 99),
(915, 'Caupasan', 99),
(916, 'Danglas', 99),
(917, 'Nagaparan', 99),
(918, 'Padangitan', 99),
(919, 'Pangal', 99),
(920, 'Bayaan', 100),
(921, 'Cabaroan', 100),
(922, 'Calumbaya', 100),
(923, 'Cardona', 100),
(924, 'Isit', 100),
(925, 'Kimmalaba', 100),
(926, 'Libtec', 100),
(927, 'Lub-lubba', 100),
(928, 'Mudiit', 100),
(929, 'Namit-ingan', 100),
(930, 'Pacac', 100),
(931, 'Poblacion', 100),
(932, 'Salucag', 100),
(933, 'Talogtog', 100),
(934, 'Taping', 100),
(935, 'Benben', 101),
(936, 'Bulbulala', 101),
(937, 'Buli', 101),
(938, 'Canan', 101),
(939, 'Liguis', 101),
(940, 'Malabbaga', 101),
(941, 'Mudeng', 101),
(942, 'Pidipid', 101),
(943, 'Poblacion', 101),
(944, 'San Gregorio', 101),
(945, 'Toon', 101),
(946, 'Udangan', 101),
(957, 'Bacag', 102),
(958, 'Buneg', 102),
(959, 'Guinguinabang', 102),
(960, 'Lan-ag', 102),
(961, 'Pacoc', 102),
(962, 'Poblacion', 102),
(967, 'Aguet', 103),
(968, 'Bacooc', 103),
(969, 'Balais', 103),
(970, 'Cayapa', 103),
(971, 'Dalaguisen', 103),
(972, 'Laang', 103),
(973, 'Lagben', 103),
(974, 'Laguiben', 103),
(975, 'Nagtipulan', 103),
(976, 'Nagtupacan', 103),
(977, 'Paganao', 103),
(978, 'Pawa', 103),
(979, 'Poblacion', 103),
(980, 'Presentar', 103),
(981, 'San Isidro', 103),
(982, 'Tagodtod', 103),
(983, 'Taping', 103),
(984, 'Ba-i', 104),
(985, 'Collago', 104),
(986, 'Pang-ot', 104),
(987, 'Poblacion', 104),
(988, 'Pulot', 104);

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
(169, 234, 'Quantum Quest', '', 20, '2023-11-28 18:08:57', 0, 0, 1, 0, 0, 1, 0, 0, 1, 20.00, 2.00),
(170, 235, 'Nebula Nexus', '', 21, '2023-11-28 18:48:20', 0, 0, 1, 0, 0, 1, 0, 0, 1, 196.00, 19.60),
(171, 236, 'Labyrinth Legends', '', 21, '2023-11-28 18:48:25', 0, 0, 1, 0, 0, 1, 0, 0, 1, 216.00, 21.60),
(172, 237, 'Chrono Conundrum', '', 21, '2023-11-28 18:48:33', 0, 0, 1, 0, 0, 1, 0, 0, 1, 173.00, 17.30),
(173, 238, 'Stellar Syndicate', '', 21, '2023-11-28 18:48:39', 0, 0, 1, 0, 0, 1, 0, 0, 1, 371.00, 37.10),
(174, 239, 'Enigma Escape', '', 21, '2023-11-28 18:48:47', 0, 0, 1, 0, 0, 1, 0, 0, 1, 124.00, 12.40),
(175, 240, 'Galactic Galambit', '', 22, '2023-11-28 20:26:59', 0, 0, 1, 0, 0, 1, 0, 0, 1, 93.00, 9.30),
(176, 241, 'Celestial Cipher', '', 22, '2023-11-28 20:27:04', 0, 0, 1, 0, 0, 1, 0, 0, 1, 73.00, 7.30),
(177, 242, 'Odyssey Oracle', '', 23, '2023-11-28 20:39:38', 0, 0, 1, 0, 0, 1, 0, 0, 1, 138.00, 13.80),
(178, 243, 'Nebulous Negotiations', '', 23, '2023-11-28 20:39:42', 0, 0, 1, 0, 0, 1, 0, 0, 1, 91.00, 9.10),
(179, 244, 'Astral Allies', '', 23, '2023-11-28 20:39:47', 0, 0, 1, 0, 0, 1, 0, 0, 1, 135.00, 13.50),
(180, 245, 'Paradox Puzzles', '', 24, '2023-11-28 20:50:26', 0, 0, 1, 0, 0, 1, 0, 0, 1, 22.00, 2.20),
(181, 246, 'Warp Zone ', '', 24, '2023-11-28 20:50:33', 0, 0, 1, 0, 0, 1, 0, 0, 1, 48.00, 4.80),
(182, 247, 'Warriors Starlight', '', 24, '2023-11-28 20:50:38', 0, 0, 1, 0, 0, 1, 0, 0, 1, 41.00, 4.10),
(183, 248, 'Cosmic Codebreaker', '', 24, '2023-11-28 20:50:44', 0, 0, 1, 0, 0, 1, 0, 0, 1, 77.00, 7.70),
(184, 249, 'snake and ladder', 'this is description', 28, '2023-12-02 13:32:35', 0, 0, 1, 0, 0, 1, 0, 0, 1, 20.00, 2.00);

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
(601, 169, 234, 21, 1, 'uploads/6565bae49376d_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '8.5 x 11'),
(602, 170, 235, 16, 1, 'uploads/6565c5060b90a_Custom Extra Large Game Box 2 Height.pdf', 17, 0, '2.75 x 2.75 '),
(603, 170, 235, 23, 0, '', 11, 5, '16mm'),
(604, 171, 236, 16, 1, 'uploads/6565c4bc6ed81_Custom Extra Large Game Box 2 Height.pdf', 4, 0, '2.75 x 2.75 '),
(605, 171, 236, 36, 0, '', 6, 27, '1 inches diameter'),
(606, 171, 236, 21, 1, 'uploads/6565c4d88b439_Custom Extra Large Game Box 2 Height.pdf', 7, 0, '8.5 x 11'),
(607, 172, 237, 15, 1, 'uploads/6565c47183e4c_Custom Extra Large Game Box 2 Height.pdf', 6, 0, '2.5 x 2.5 '),
(608, 172, 237, 17, 1, 'uploads/6565c48040908_Custom Extra Large Game Box 2 Height.pdf', 13, 0, '3.5 x 1.75'),
(609, 172, 237, 48, 1, 'uploads/6565c48bc211e_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '12.5 x 12.5 x 3'),
(610, 172, 237, 43, 1, 'uploads/6565c4a44d459_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '20 X 24 inches'),
(611, 173, 238, 16, 1, 'uploads/6565c4328bcb8_Custom Extra Large Game Box 2 Height.pdf', 9, 0, '2.75 x 2.75 '),
(612, 173, 238, 23, 0, '', 14, 5, '16mm'),
(613, 173, 238, 32, 0, '', 14, 23, '2.25 x 5.25 inches'),
(614, 174, 239, 23, 0, '', 3, 5, '16mm'),
(615, 174, 239, 16, 1, 'uploads/6565c3b9e3770_Custom Extra Large Game Box 2 Height.pdf', 9, 0, '2.75 x 2.75 '),
(616, 174, 239, 21, 1, 'uploads/6565c3c5388a2_Custom Extra Large Game Box 2 Height.pdf', 2, 0, '8.5 x 11'),
(617, 175, 240, 15, 1, 'uploads/6565db8c0018e_6558d87cc83d9_12_5x12_5x2 (1).pdf', 5, 0, '2.5 x 2.5 '),
(618, 175, 240, 25, 0, '', 3, 9, '2.5 x 0.5 inches'),
(619, 175, 240, 23, 0, '', 4, 4, '16mm'),
(620, 176, 241, 16, 1, 'uploads/6565dc04b3981_6558d87cc83d9_12_5x12_5x2 (1).pdf', 4, 0, '2.75 x 2.75 '),
(621, 176, 241, 25, 0, '', 1, 9, '2.5 x 0.5 inches'),
(622, 176, 241, 23, 0, '', 5, 4, '16mm'),
(623, 177, 242, 16, 1, 'uploads/6565de8345ca9_6558d87cc83d9_12_5x12_5x2 (1).pdf', 1, 0, '2.75 x 2.75 '),
(624, 177, 242, 38, 0, '', 5, 33, '1 inches'),
(625, 177, 242, 48, 0, '', 1, 0, '12.5 x 12.5 x 3'),
(626, 177, 242, 23, 0, '', 8, 4, '16mm'),
(627, 178, 243, 15, 1, 'uploads/6565dec7aec02_6558d87cc83d9_12_5x12_5x2.pdf', 4, 0, '2.5 x 2.5 '),
(628, 178, 243, 23, 0, '', 5, 4, '16mm'),
(629, 178, 243, 23, 0, '', 4, 6, '16mm'),
(630, 179, 244, 48, 1, 'uploads/6565defdd3403__d41311cb-85b2-4588-8dba-658b9148d61f.jpg', 1, 0, '12.5 x 12.5 x 3'),
(631, 179, 244, 23, 0, '', 5, 6, '16mm'),
(632, 179, 244, 47, 1, 'uploads/6565df15f0e48_6558d87cc83d9_12_5x12_5x2.pdf', 4, 0, '12.5 x 10.5 x 2 in'),
(633, 180, 245, 15, 1, 'uploads/6565e1b760560_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '2.5 x 2.5 '),
(634, 180, 245, 25, 0, '', 1, 9, '2.5 x 0.5 inches'),
(635, 180, 245, 35, 0, '', 5, 26, '0.7 inches diameter'),
(636, 181, 246, 21, 1, 'uploads/6565e19c0929c_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '8.5 x 11'),
(637, 181, 246, 23, 0, '', 4, 4, '16mm'),
(638, 182, 247, 48, 1, 'uploads/6565e17ead6c9_Custom Extra Large Game Box 2 Height.pdf', 1, 0, '12.5 x 12.5 x 3'),
(639, 182, 247, 15, 1, 'uploads/6565e189de849_Custom Extra Large Game Box 2 Height.pdf', 3, 0, '2.5 x 2.5 '),
(640, 183, 248, 15, 1, 'uploads/6565e11320133_6558d87cc83d9_12_5x12_5x2.pdf', 7, 0, '2.5 x 2.5 '),
(641, 183, 248, 23, 0, '', 4, 4, '16mm'),
(642, 184, 249, 40, 1, 'uploads/656b31a5a6c8e_65655de815d06_Custom Game Board 10.pdf', 1, 0, '10 x 10');

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
(1042, 20, NULL, 234, NULL, NULL, 177, 1, 2.00, 1, 0, 0),
(1043, 20, NULL, 234, 169, NULL, NULL, 1, 18.00, 1, 0, 1),
(1044, 21, NULL, 239, NULL, NULL, 178, 1, 12.40, 1, 0, 0),
(1045, 21, NULL, 238, NULL, NULL, 179, 1, 37.10, 1, 0, 0),
(1046, 21, NULL, 237, NULL, NULL, 180, 1, 17.30, 1, 0, 0),
(1047, 21, NULL, 236, NULL, NULL, 181, 1, 21.60, 1, 0, 0),
(1048, 21, NULL, 235, NULL, NULL, 182, 1, 19.60, 1, 0, 0),
(1049, 21, NULL, 239, 174, NULL, NULL, 1, 111.60, 1, 0, 1),
(1050, 21, NULL, 238, 173, NULL, NULL, 1, 333.90, 1, 0, 1),
(1051, 21, NULL, 237, 172, NULL, NULL, 1, 155.70, 1, 0, 1),
(1052, 21, NULL, 236, 171, NULL, NULL, 1, 194.40, 1, 0, 1),
(1053, 21, NULL, 235, 170, NULL, NULL, 1, 176.40, 1, 0, 1),
(1054, 22, NULL, 240, NULL, NULL, 183, 1, 9.30, 1, 0, 0),
(1055, 22, NULL, 241, NULL, NULL, 184, 1, 7.30, 1, 0, 0),
(1056, 22, NULL, 241, 176, NULL, NULL, 1, 65.70, 1, 0, 1),
(1057, 22, NULL, 240, 175, NULL, NULL, 1, 83.70, 1, 0, 1),
(1058, 23, NULL, 242, NULL, NULL, 185, 1, 13.80, 1, 0, 0),
(1059, 23, NULL, 243, NULL, NULL, 186, 1, 9.10, 1, 0, 0),
(1060, 23, NULL, 244, NULL, NULL, 187, 1, 13.50, 1, 0, 0),
(1061, 23, NULL, 244, 179, NULL, NULL, 1, 121.50, 1, 0, 1),
(1062, 23, NULL, 243, 178, NULL, NULL, 1, 81.90, 1, 0, 1),
(1063, 23, NULL, 242, 177, NULL, NULL, 1, 124.20, 1, 0, 1),
(1064, 24, NULL, 248, NULL, NULL, 188, 1, 7.70, 1, 0, 0),
(1065, 24, NULL, 247, NULL, NULL, 189, 1, 4.10, 1, 0, 0),
(1066, 24, NULL, 246, NULL, NULL, 190, 1, 4.80, 1, 0, 0),
(1067, 24, NULL, 245, NULL, NULL, 191, 1, 2.20, 1, 0, 0),
(1068, 24, NULL, 248, 183, NULL, NULL, 1, 69.30, 1, 0, 1),
(1069, 24, NULL, 247, 182, NULL, NULL, 1, 36.90, 1, 0, 1),
(1070, 24, NULL, 246, 181, NULL, NULL, 1, 43.20, 1, 0, 1),
(1071, 24, NULL, 245, 180, NULL, NULL, 1, 19.80, 1, 0, 1),
(1072, 20, 206, NULL, NULL, NULL, NULL, 1, 222.00, 1, 0, 0),
(1073, 20, 205, NULL, NULL, NULL, NULL, 1, 548.00, 1, 0, 0),
(1074, 20, NULL, NULL, NULL, 637, NULL, 1, 7.00, 1, 0, 0),
(1075, 20, 199, NULL, NULL, NULL, NULL, 1, 293.00, 1, 0, 0),
(1076, 20, NULL, NULL, NULL, 638, NULL, 1, 7.00, 1, 0, 0),
(1077, 20, NULL, NULL, NULL, 639, NULL, 1, 10.00, 1, 0, 0),
(1078, 28, NULL, 249, NULL, NULL, 192, 1, 2.00, 1, 0, 0),
(1079, 28, NULL, 249, 184, NULL, NULL, 1, 18.00, 0, 1, 1),
(1080, 28, NULL, 249, 184, NULL, NULL, 1, 18.00, 1, 0, 1),
(1081, 29, 207, NULL, NULL, NULL, NULL, 1, 170.00, 1, 1, 0),
(1082, 20, NULL, NULL, NULL, 641, NULL, 2, 7.00, 1, 0, 0),
(1083, 20, NULL, 250, NULL, NULL, 193, 1, 2.40, 1, 0, 0),
(1084, 20, NULL, 250, NULL, NULL, 194, 1, 2.40, 1, 0, 0),
(1085, 20, NULL, 250, NULL, NULL, 195, 1, 2.40, 1, 0, 0),
(1086, 20, 198, NULL, NULL, NULL, NULL, 1, 173.00, 1, 0, 0),
(1087, 22, 206, NULL, NULL, NULL, NULL, 2, 222.00, 1, 0, 0),
(1088, 22, 206, NULL, NULL, NULL, NULL, 1, 222.00, 1, 0, 0),
(1089, 22, 204, NULL, NULL, NULL, NULL, 1, 1041.00, 1, 0, 0),
(1090, 22, NULL, NULL, NULL, 645, NULL, 1, 7.00, 1, 0, 0),
(1091, 22, 199, NULL, NULL, NULL, NULL, 8, 293.00, 1, 0, 0),
(1092, 22, 197, NULL, NULL, NULL, NULL, 77, 396.00, 1, 0, 0);

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
(17, 4, 'assets/component_assets/6558d46f443a8_pastor img larger.jpg', '0'),
(18, 4, 'assets/component_assets/6558d46f45b31_363601451_1030756498245245_6016155764988694683_n.jpg', '1'),
(19, 4, 'assets/component_assets/6558d46f463ec_363601451_861442951963573_5711312933152616667_n (1).jpg', '0'),
(20, 14, 'assets/component_assets/6558d87cc8700_Custom Extra Large Game Box 2 Height.jpg', '1'),
(21, 14, 'assets/component_assets/6558d87cc8a08_closeup 2.jpg', '0'),
(22, 14, 'assets/component_assets/6558d87cc8d51_closeup 1.jpg', '0'),
(23, 15, 'assets/component_assets/65654adc48c65_closeup 1.jpg', '0'),
(24, 15, 'assets/component_assets/65654adc48fda_closeup 2.jpg', '0'),
(25, 15, 'assets/component_assets/65654adc49275_closeup 3.jpg', '0'),
(26, 15, 'assets/component_assets/65654adc495bd_Custom Square 2.5 Inch Game Cards.jpg', '1'),
(27, 16, 'assets/component_assets/65654b3a3e73b_closeup 1.jpg', '0'),
(28, 16, 'assets/component_assets/65654b3a3ea2e_closeup 2.jpg', '0'),
(29, 16, 'assets/component_assets/65654b3a3f03c_closeup 3.jpg', '0'),
(30, 16, 'assets/component_assets/65654b3a3f30a_Custom Square 2.75 Inch Game Cards.jpg', '1'),
(31, 17, 'assets/component_assets/65654c3f889fc_closeup 1.jpg', '0'),
(32, 17, 'assets/component_assets/65654c3f88d50_Domino Deck Custom Blank Cards Horizontal.jpg', '1'),
(33, 17, 'assets/component_assets/65654c3f8a04b_closeup 3.jpg', '0'),
(34, 17, 'assets/component_assets/65654c3f8a2e3_closeup 2.jpg', '0'),
(35, 18, 'assets/component_assets/65654caeb63c5_closeup 1.jpg', '0'),
(36, 18, 'assets/component_assets/65654caeb66cd_closeup 2.jpg', '0'),
(37, 18, 'assets/component_assets/65654caeb6b1a_Horizontal Micro Deck Custom Blank Cards.jpg', '1'),
(38, 19, 'assets/component_assets/65654d81a9cbd_Mini Card Series Custom Cards (Landscape).jpg', '1'),
(39, 19, 'assets/component_assets/65654d81aa1a2_closeup 2.jpg', '0'),
(40, 19, 'assets/component_assets/65654d81aa4a5_closeup 1.jpg', '0'),
(41, 20, 'assets/component_assets/65654de12687b_Small Square Custom Game Cards Deck.jpg', '1'),
(42, 20, 'assets/component_assets/65654de126c23_closeup 2.jpg', '0'),
(43, 20, 'assets/component_assets/65654de126f91_closeup 1.jpg', '0'),
(44, 21, 'assets/component_assets/65655168176e8_thumbnail.png', '1'),
(45, 22, 'assets/component_assets/656551af40735_thumbnail.png', '1'),
(46, 23, 'assets/component_assets/656554de2062b_closeup 2.jpg', '1'),
(47, 23, 'assets/component_assets/656554de20ab1_Round Corners Dice 16mm.jpg', '0'),
(48, 23, 'assets/component_assets/656554de20ee3_closeup 1.jpg', '0'),
(49, 24, 'assets/component_assets/6565574859957_30 Seconds Black Sand Timer.jpg', '1'),
(50, 24, 'assets/component_assets/6565559614df9_closeup 1.jpg', '0'),
(51, 24, 'assets/component_assets/656555961b6a9_closeup 2.jpg', '0'),
(52, 25, 'assets/component_assets/6565567657956_60 Seconds Black Sand Timer.jpg', '1'),
(53, 25, 'assets/component_assets/6565567657fbc_closeup 1.jpg', '0'),
(54, 25, 'assets/component_assets/656556765853b_closeup 2.jpg', '0'),
(55, 26, 'assets/component_assets/65655780d5d47_120 Seconds Black Sand Timer.jpg', '1'),
(56, 26, 'assets/component_assets/65655780d639e_closeup 1.jpg', '0'),
(57, 26, 'assets/component_assets/65655780d690e_closeup 2.jpg', '0'),
(58, 27, 'assets/component_assets/656557e97a2d2_closeup 2.jpg', '1'),
(59, 27, 'assets/component_assets/656557e97a890_Game Tokens.jpg', '0'),
(60, 27, 'assets/component_assets/656557e97ac90_closeup 1.jpg', '0'),
(61, 28, 'assets/component_assets/65655948be62d_Paper Money Fifty Dollars.jpg', '1'),
(62, 29, 'assets/component_assets/656559f81183d_Paper Money Five Dollars.jpg', '1'),
(63, 30, 'assets/component_assets/65655a84bd41e_Paper Money Five Hundreds Dollars.jpg', '1'),
(64, 31, 'assets/component_assets/65655ab28d2b6_Paper Money One Dollar.jpg', '1'),
(65, 32, 'assets/component_assets/65655ae7128f7_Paper Money One Hundred Dollars.jpg', '1'),
(66, 33, 'assets/component_assets/65655b15aa2cd_Paper Money Ten Dollars.jpg', '1'),
(67, 34, 'assets/component_assets/65655b516c7dd_Paper Money Twenty Dollars.jpg', '1'),
(68, 35, 'assets/component_assets/65655bb2c0342_School Money Five Cents.jpg', '1'),
(69, 35, 'assets/component_assets/65655bb2c0753_closeup 2.jpg', '0'),
(70, 35, 'assets/component_assets/65655bb2c0a11_closeup 1.jpg', '0'),
(71, 36, 'assets/component_assets/65655c16b80f8_School Money One Cent.jpg', '1'),
(72, 36, 'assets/component_assets/65655c16b844c_closeup 2.jpg', '0'),
(73, 36, 'assets/component_assets/65655c16b872e_closeup 1.jpg', '0'),
(74, 37, 'assets/component_assets/65655c8501305_Small Headed Wooden Pawn.jpg', '1'),
(75, 37, 'assets/component_assets/65655c85017d3_closeup 1.jpg', '0'),
(76, 37, 'assets/component_assets/65655c8501b68_closeup 2.jpg', '0'),
(77, 38, 'assets/component_assets/65655ce752109_closeup 2.jpg', '1'),
(78, 38, 'assets/component_assets/65655ce7525b3_Square Column & Hollow Plastic Pawn Purple.jpg', '0'),
(79, 38, 'assets/component_assets/65655ce752911_closeup 1.jpg', '0'),
(80, 39, 'assets/component_assets/65655d79c79bb_closeup 2.jpg', '1'),
(81, 39, 'assets/component_assets/65655d79c7ede_closeup 1.jpg', '0'),
(82, 39, 'assets/component_assets/65655d79c82b9_Wooden Pawns 12mmx12mm.jpg', '0'),
(83, 40, 'assets/component_assets/65655de8160bb_Custom Game Board 10.jpg', '1'),
(84, 40, 'assets/component_assets/65655de8163d5_closeup 2.jpg', '0'),
(85, 40, 'assets/component_assets/65655de816686_closeup 1.jpg', '0'),
(86, 41, 'assets/component_assets/65655e71107ff_Custom Game Board 18 X 18.jpg', '1'),
(87, 41, 'assets/component_assets/65655e7110b16_closeup 2.jpg', '0'),
(88, 41, 'assets/component_assets/65655e7110dc6_closeup 1.jpg', '0'),
(89, 43, 'assets/component_assets/65655f250e6d7_Custom Game Board 20 X 24.jpg', '1'),
(90, 43, 'assets/component_assets/65655f250ea16_closeup 2.jpg', '0'),
(91, 43, 'assets/component_assets/65655f250ecca_closeup 1.jpg', '0'),
(92, 44, 'assets/component_assets/656565d4e83f8_Custom Game Board 20 X 24.jpg', '1'),
(93, 45, 'assets/component_assets/65656608641eb_closeup 2.jpg', '1'),
(94, 45, 'assets/component_assets/6565660864675_Custom Game Board 20 X 24.jpg', '0'),
(95, 46, 'assets/component_assets/65656728b4747_closeup 2.jpg', '1'),
(96, 47, 'assets/component_assets/65656e2180c3a_Custom Extra Large Game Box 2 Height.jpg', '1'),
(97, 47, 'assets/component_assets/65656e218113e_closeup 2.jpg', '0'),
(98, 47, 'assets/component_assets/65656e2181523_closeup 1.jpg', '0'),
(99, 48, 'assets/component_assets/65656f05a58f8_Custom Extra Large Game Box 3 Height.jpg', '1'),
(100, 48, 'assets/component_assets/65656f05a5ec8_closeup 2.jpg', '0'),
(101, 48, 'assets/component_assets/65656f05a62ed_closeup 1.jpg', '0'),
(102, 49, 'assets/component_assets/65656f6eea54f_Custom Extra Large Rectangular Game Box.jpg', '1'),
(103, 49, 'assets/component_assets/65656f6eea872_closeup 2.jpg', '0'),
(104, 49, 'assets/component_assets/65656f6eeaaf1_closeup 1.jpg', '0'),
(105, 50, 'assets/component_assets/6565703a6c215_Custom Extra Large Rectangular Game Box 3 Height.jpg', '1'),
(106, 50, 'assets/component_assets/6565703a6c4df_closeup 2.jpg', '0'),
(107, 50, 'assets/component_assets/6565703a6c706_closeup 1.jpg', '0'),
(108, 51, 'assets/component_assets/6565718d773ee_Custom Large Rectangular Game Box 2 Inch.jpg', '1'),
(109, 51, 'assets/component_assets/6565718d776be_closeup1.jpg', '0'),
(110, 51, 'assets/component_assets/6565718d77975_closeup 2.jpg', '0'),
(111, 52, 'assets/component_assets/656571e3b5826_Custom Large Rectangular Game Box 3 Height.jpg', '1'),
(112, 52, 'assets/component_assets/656571e3b5aeb_closeup 2.jpg', '0'),
(113, 52, 'assets/component_assets/656571e3b5d85_closeup 1.jpg', '0'),
(114, 53, 'assets/component_assets/656572a040625_Custom Medium Rectangular Game Box 3 Height.png', '1'),
(115, 54, 'assets/component_assets/656572e9bd663_Custom Medium Square Game Box 2 Height.jpg', '1'),
(116, 54, 'assets/component_assets/656572e9bd998_Close Up 2.jpg', '0'),
(117, 54, 'assets/component_assets/656572e9bdc76_Close Up 1.jpg', '0'),
(118, 55, 'assets/component_assets/656573545f3be_Custom Rectangular Game Box 2 Height.jpg', '1'),
(119, 55, 'assets/component_assets/656573545f6ec_close up 2.jpg', '0'),
(120, 55, 'assets/component_assets/656573545f991_close up 1.jpg', '0'),
(121, 56, 'assets/component_assets/656573a0639ac_Custom Rectangular Game Box 3 Height.jpg', '1'),
(122, 56, 'assets/component_assets/656573a063d14_closeup 2.jpg', '0'),
(123, 56, 'assets/component_assets/656573a063fb3_closeup 1.jpg', '0'),
(124, 57, 'assets/component_assets/6565740a6b265_Custom Square Game Box 2 Height.jpg', '1'),
(125, 57, 'assets/component_assets/6565740a6b59e_closeup2.jpg', '0'),
(126, 57, 'assets/component_assets/6565740a6b86b_closeup 1.jpg', '0'),
(127, 58, 'assets/component_assets/656574c818393_Custom Square Game Box 3 Height.jpg', '1'),
(128, 58, 'assets/component_assets/656574c8186cf_closeup 2.jpg', '0'),
(129, 58, 'assets/component_assets/656574c81898c_closeup 1.jpg', '0');

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
(16, 'Rule Book', '', 1),
(18, 'Boards', '', 1),
(23, 'Dice', '', 0);

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
(3, 3, 'white', '#FFFFFF'),
(4, 23, 'white', '#FFFFFF'),
(5, 23, 'red', '#e01b0a'),
(6, 23, 'blue', '#1e8efe'),
(7, 23, 'black', '#070709'),
(8, 24, 'white', '#ffffff'),
(9, 25, 'white', '#ffffff'),
(10, 26, 'white', '#ffffff'),
(11, 27, 'yelow', '#c9c15f'),
(12, 27, 'red orange', '#c53018'),
(13, 27, 'purple', '#782279'),
(14, 27, 'white', '#ffffff'),
(15, 27, 'blue', '#052a85'),
(16, 27, 'orange', '#c67202'),
(17, 27, 'green', '#18846c'),
(18, 27, 'black', '#000000'),
(19, 28, 'purple', '#019231'),
(20, 29, 'pink', '#e1babd'),
(21, 30, 'yellow orange', '#f6a062'),
(22, 31, 'white', '#ffffff'),
(23, 32, 'yellow', '#e3c997'),
(24, 33, 'blue', '#b1d0e4'),
(25, 34, 'lime', '#d2d4c3'),
(26, 35, 'gray ', '#807e8b'),
(27, 36, 'brown', '#ad6432'),
(28, 37, 'yellow', '#ddc196'),
(29, 37, 'blue', '#b3cde5'),
(30, 37, 'red', '#debfc0 '),
(31, 37, 'purple', '#cbb1d9'),
(32, 38, 'orange', '#ca4234'),
(33, 38, 'green', '#3ca882'),
(34, 38, 'pink', '#d8608e'),
(35, 38, 'blue', '#1d5ab5'),
(36, 39, 'red ', '#c83120'),
(37, 39, 'black', '#000000'),
(38, 39, 'brown', '#a06a51'),
(39, 39, 'green', '#075022'),
(40, 39, 'white', '#c3c1c2'),
(41, 39, 'blue', '#247cae'),
(42, 39, 'pink', '#ff83b5');

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
(3, 2, 'side 3', 'assets\\component_templates/template3.jpg'),
(4, 14, 'Custom Extra Large Game Box 2in Height', 'assets/component_templates/6558d87cc83d9_12_5x12_5x2.pdf'),
(5, 15, 'Custom Square 2.5 Inch Game Cards Template', 'assets/component_templates/65654adc48620_Custom Square 2.5 Inch Game Cards.pdf'),
(6, 16, 'Custom Square 2.75 Inch Game Cards Template', 'assets/component_templates/65654b6e7d791_Custom Square 2.75 Inch Game Cards.pdf'),
(7, 17, 'Domino Deck Custom Blank Cards Template', 'assets/component_templates/65654c3f878e9_Domino Deck Custom Blank Cards Horizontal.pdf'),
(8, 18, 'Micro Deck Custom Blank Cards Template', 'assets/component_templates/65654cc7654e0_Horizontal Micro Deck Custom Blank Cards.pdf'),
(9, 19, 'Mini Card Series Custom Cards', 'assets/component_templates/65654d81a982e_Mini Card Series Custom Cards (Landscape).pdf'),
(10, 20, 'Small Square Custom Game Cards Deck Template', 'assets/component_templates/65654de1263d1_Small Square Custom Game Cards Deck.pdf'),
(11, 21, 'Rule Sheet Brochure Tri-Fold 8.5x11 Template', 'assets/component_templates/656551681687f_Rule Sheet Brochure Tri-Fold 8.5x11.pdf'),
(12, 22, 'Rule Sheet No Fold 8.5x11 Template', 'assets/component_templates/656551af4044d_Rule Sheet No Fold 8.5x11.pdf'),
(14, 40, 'Custom Game Board 10 x 10 Template', 'assets/component_templates/65655de815d06_Custom Game Board 10.pdf'),
(15, 41, 'Custom Game Board 18 X 18 Template', 'assets/component_templates/65655e711037a_Custom Game Board 18x18.pdf'),
(16, 43, 'Custom Game Board 20 X 24 Template', 'assets/component_templates/65655f250e2b0_Custom Game Board 20 X 24.jpg'),
(17, 44, 'kjasd', 'assets/component_templates/656565d4e7f09_Custom Game Board 20 X 24.jpg'),
(18, 45, '', 'assets/component_templates/6565660863c43_Custom Game Board 20 x 24.pdf'),
(19, 46, 'Custom Extra Large Game Box 2in Height', 'assets/component_templates/65656728b3f05_Custom Extra Large Game Box 2 Height.jpg'),
(20, 46, 'Custom Extra Large Game Box 2in Height', 'assets/component_templates/65656728b44be_closeup 2.jpg'),
(21, 47, 'Custom Extra Large Game Box 2in Height Template', 'assets/component_templates/65656e218060c_Custom Extra Large Game Box 2 Height.pdf'),
(22, 48, 'Custom Extra Large Game Box 3 Height Template', 'assets/component_templates/65656f05a53e3_Custom Extra Large Game Box 3 Height.pdf'),
(23, 49, 'Custom Extra Large Rectangular Game Box Template', 'assets/component_templates/65656f6eea129_Custom Extra Large Rectangular Game Box.pdf'),
(24, 50, 'Custom Extra Large Rectangular Game Box 3 Height Template', 'assets/component_templates/6565703a65cd2_Custom Extra Large Rectangular Game Box 3 Height.pdf'),
(25, 51, 'Custom Large Rectangular Game Box 2 Inch Template', 'assets/component_templates/6565718d76de2_Custom Large Rectangular Game Box 2 Inch.pdf'),
(26, 52, 'Custom Large Rectangular Game Box 3 Height Template', 'assets/component_templates/656571e3b543f_Custom Large Rectangular Game Box 3 Height.pdf'),
(27, 53, 'Custom Medium Rectangular Game Box 3 Height Template', 'assets/component_templates/656572a040238_Custom Medium Rectangular Game Box 3 Height.pdf'),
(28, 54, 'Custom Medium Square Game Box 2 Height', 'assets/component_templates/656572f8c8745_Custom Medium Square Game Box 2 Height.pdf'),
(29, 55, 'Custom Rectangular Game Box 2 Height Template', 'assets/component_templates/656573545eff7_Custom Rectangular Game Box 2 Height.pdf'),
(30, 56, 'Custom Rectangular Game Box 3 Height Template', 'assets/component_templates/656573a06358f_Custom Rectangular Game Box 3 Height.pdf'),
(31, 57, 'Custom Square Game Box 2 Height Template', 'assets/component_templates/6565740a6adeb_Custom Square Game Box 2 Height.pdf'),
(32, 58, 'Custom Square Game Box 3 Height Template', 'assets/component_templates/656574d8adf3b_Custom Square Game Box 3 Height.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE `constants` (
  `constant_id` int(11) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `percentage` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`constant_id`, `classification`, `image_path`, `text`, `percentage`) VALUES
(1, 'thumbnail_built_game', 'img/i3.jpg', NULL, NULL),
(2, 'approving_ticket_percentage', NULL, NULL, 10.00),
(3, 'thumbnail_ticket', 'img/constant/656593acd9b6e_ticket.jpg', NULL, NULL),
(4, 'paypal_client_id', NULL, 'AUtrxFWAdHF9RgdAqRcEjzOICrG5WaXVfckhbUYdcTVDVIz-QnvKNoYqEZ9zE-JI5ViTJEy4AoN6iCJL', NULL),
(5, 'cash_out_fee', NULL, NULL, 20.00),
(6, 'minimum_cash_out_amount', NULL, NULL, 30.00),
(7, 'shipping_discount_percent', NULL, NULL, 50.00),
(8, 'theme_background', 'img/Backgrounds/gradient_grainy.png', NULL, NULL),
(9, 'wallet_maximum_limit', NULL, NULL, 25000.00),
(10, 'system_email', NULL, 'marcusdacaymat@gmail.com', NULL),
(11, 'system_email_password', NULL, 'awyy ahng lqzc ixlt', NULL);

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
(2, 'Flash Express', NULL),
(5, 'JRS Express', NULL);

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
(25, 250, 'copyrighted', '0', '2023-12-04 06:41:24'),
(26, 250, 'asdfghjkl', '0', '2023-12-04 08:47:18');

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
(1, 'Game Creation', 1, 'About Game Creations', 'assets/help_assets/6565f27192d0e_game_creation.jpg'),
(2, 'Designing', 1, 'About Designing Components', 'assets/help_assets/6565f28828e03_designing.jpg'),
(3, 'Paypal Set-up', 1, 'About Paypal Account Set up', 'assets/help_assets/6565f29893d33_paypal_bg.jpg'),
(4, 'Frequently Asked Questions', 0, 'About Question Asked', 'assets/help_assets/6565f2ac6a76e_faq.png'),
(5, 'Customer Service', 0, 'About Our Customer Services', 'assets/help_assets/6565f2be16843_customer_service.jpg'),
(6, 'About us', 0, 'Information About STKR HUB', 'assets/help_assets/6565f2caf21cd_stkr_labs.jpg');

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
(234, 'Quantum Quest', '', 20, '2023-11-28 18:02:43', '2023-11-28 10:03:16', 1, 0, 0, 0, 0, 1, 1),
(235, 'Nebula Nexus', '', 21, '2023-11-28 18:11:45', '2023-11-28 10:46:41', 1, 0, 0, 0, 0, 1, 1),
(236, 'Labyrinth Legends', '', 21, '2023-11-28 18:39:35', '2023-11-28 10:45:44', 1, 0, 0, 0, 0, 1, 1),
(237, 'Chrono Conundrum', '', 21, '2023-11-28 18:39:47', '2023-11-28 10:44:52', 1, 0, 0, 0, 0, 1, 1),
(238, 'Stellar Syndicate', '', 21, '2023-11-28 18:39:59', '2023-11-28 10:43:42', 1, 0, 0, 0, 0, 1, 1),
(239, 'Enigma Escape', '', 21, '2023-11-28 18:40:09', '2023-11-28 10:41:25', 1, 0, 0, 0, 0, 1, 1),
(240, 'Galactic Galambit', '', 22, '2023-11-28 20:22:17', '2023-11-28 12:22:56', 1, 0, 0, 0, 0, 1, 1),
(241, 'Celestial Cipher', '', 22, '2023-11-28 20:23:18', '2023-11-28 12:24:54', 1, 0, 0, 0, 0, 1, 1),
(242, 'Odyssey Oracle', '', 23, '2023-11-28 20:34:53', '2023-11-28 12:35:44', 1, 0, 0, 0, 0, 1, 1),
(243, 'Nebulous Negotiations', '', 23, '2023-11-28 20:36:00', '2023-11-28 12:36:41', 1, 0, 0, 0, 0, 1, 1),
(244, 'Astral Allies', '', 23, '2023-11-28 20:37:01', '2023-11-28 12:37:41', 1, 0, 0, 0, 0, 1, 1),
(245, 'Paradox Puzzles', '', 24, '2023-11-28 20:45:22', '2023-11-28 12:49:15', 1, 0, 0, 0, 0, 1, 1),
(246, 'Warp Zone ', '', 24, '2023-11-28 20:45:31', '2023-11-28 12:48:36', 1, 0, 0, 0, 0, 1, 1),
(247, 'Warriors Starlight', '', 24, '2023-11-28 20:45:46', '2023-11-28 12:48:09', 1, 0, 0, 0, 0, 1, 1),
(248, 'Cosmic Codebreaker', '', 24, '2023-11-28 20:45:54', '2023-11-28 12:46:30', 1, 0, 0, 0, 0, 1, 1),
(249, 'snake and ladder', 'this is description', 28, '2023-12-02 13:25:50', '2023-12-02 21:31:17', 1, 0, 0, 0, 0, 1, 1),
(250, 'sample sample', 'sample game sample game', 20, '2023-12-04 06:25:59', '2023-12-04 14:27:06', 0, 0, 1, 1, 1, 0, 1);

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
(1, 'Tarrot Cards', 'sd2', 12.00, 'game cards', NULL, 0, '7x7', 1, 1),
(2, 'Box', 'box box', 11.00, 'box', NULL, 0, '7x7', 1, 1),
(3, 'Dice 2', 'asd', 7.40, 'game piece', NULL, 1, '7x7', 1, 1),
(4, 'Tarrot Card 2jkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'desc', 14.00, 'game cards', NULL, 0, '10x10', 1, 1),
(14, 'Custom Extra Large Game Box 2in Height', 'description', 52.00, 'Box', NULL, 0, '12.5 x 10.5 x 2 in', 1, 1),
(15, 'Custom Square 2.5 Inch Game Cards', 'Custom Square 2.5 Inch Game Cards description', 7.00, 'Game Cards', NULL, 0, '2.5 x 2.5 ', 1, 0),
(16, 'Custom Square 2.75 Inch Game Cards', 'description', 7.00, 'Game Cards', NULL, 0, '2.75 x 2.75 ', 1, 0),
(17, 'Domino Deck Custom Blank Cards', 'Domino Deck Custom Blank Cards description', 7.00, 'Game Cards', NULL, 0, '3.5 x 1.75', 1, 0),
(18, 'Micro Deck Custom Blank Cards', 'Micro Deck Custom Blank Cards desc', 7.00, 'Game Cards', NULL, 0, '1.75 x 1.25', 1, 0),
(19, 'Mini Card Series Custom Cards', 'Mini Card Series Custom Cards descr', 7.00, 'Game Cards', NULL, 0, '2.5 x 1.75', 1, 0),
(20, 'Small Square Custom Game Cards Deck', 'Small Square Custom Game Cards Deck desc', 7.00, 'Game Cards', NULL, 0, '2 x 2', 1, 0),
(21, 'Rule Sheet Brochure Tri-Fold 8.5x11', 'Rule Sheet Brochure Tri-Fold 8.5x11 description', 20.00, 'Rule Book', NULL, 0, '8.5 x 11', 1, 0),
(22, 'Rule Sheet No Fold 8.5x11', 'Rule Sheet No Fold 8.5x11 desc', 20.00, 'Rule Book', NULL, 0, '8.5 x 11', 1, 0),
(23, 'Round Corners Dice 16mm', 'Round Corners Dice 16mm desc', 7.00, 'Dice', NULL, 1, '16mm', 1, 0),
(24, '30 Seconds Black Sand Timer', '30 Seconds Black Sand Timer desc', 10.00, 'Game Piece', NULL, 1, ' 2.5 x 0.5', 1, 0),
(25, '60 Seconds Black Sand Timer', '60 Seconds Black Sand Timer sdescition', 10.00, 'Game Piece', NULL, 1, '2.5 x 0.5 inches', 1, 0),
(26, '120 Seconds Black Sand Timer', '120 Seconds Black Sand Timer desc', 10.00, 'Game Piece', NULL, 1, '3 x 1', 1, 0),
(27, 'Game Tokens', 'Game Tokens desc', 10.00, 'Game Piece', NULL, 1, '1.5 inches diameter', 1, 0),
(28, 'Paper Money Fifty Dollars ', 'Paper Money Fifty Dollars desc', 10.00, 'Game Piece', NULL, 1, '2.2 x 4 inches', 1, 1),
(29, 'Paper Money Five Dollars', 'Paper Money Five Dollars desc', 10.00, 'Game Piece', NULL, 1, '2.2 x 4 inches,', 1, 0),
(30, 'Paper Money Five Hundreds Dollars', 'Paper Money Five Hundreds Dollars desc', 10.00, 'Game Piece', NULL, 1, '2.25 x 5.25 inches', 1, 0),
(31, 'Paper Money One Dollar', 'Paper Money One Dollar desc', 10.00, 'Game Piece', NULL, 1, '2.2 x 4 inches', 1, 0),
(32, 'Paper Money One Hundred Dollars', 'Paper Money One Hundred Dollars desc', 15.00, 'Game Piece', NULL, 1, '2.25 x 5.25 inches', 1, 0),
(33, 'Paper Money Ten Dollars', 'Paper Money Ten Dollars desc', 10.00, 'Game Piece', NULL, 1, '2.2 x 4 inches', 1, 0),
(34, 'Paper Money Twenty Dollars', 'Paper Money Twenty Dollars desc', 11.00, 'Game Piece', NULL, 1, '2.2 x 4 inches', 1, 0),
(35, 'School Money Five Cents', 'School Money Five Cents desc', 1.00, 'Game Piece', NULL, 1, '0.7 inches diameter', 1, 0),
(36, 'School Money One Cent', 'School Money One Cent desc', 8.00, 'Game Piece', NULL, 1, '1 inches diameter', 1, 0),
(37, 'Small Headed Wooden Pawn', 'Small Headed Wooden Pawn desc', 3.00, 'Game Piece', NULL, 1, '1 inches', 1, 0),
(38, 'Square Column & Hollow Plastic Pawn Purple', 'Square Column & Hollow Plastic Pawn Purple desc', 11.00, 'Game Piece', NULL, 1, '1 inches', 1, 0),
(39, 'Wooden Pawns 12mmx12mm', 'Wooden Pawns 12mmx12mm desc', 2.00, 'Game Piece', NULL, 1, '0.7 inches', 1, 0),
(40, 'Custom Game Board 10 x 10', 'Custom Game Board 10 x 10 desc', 20.00, 'Boards', NULL, 0, '10 x 10', 1, 0),
(41, 'Custom Game Board 18 X 18', 'Custom Game Board 18 X 18 desc', 20.00, 'Boards', NULL, 0, '18 X 18', 1, 0),
(43, 'Custom Game Board 20 X 24', 'Custom Game Board 20 X 24 desc', 20.00, 'Boards', NULL, 0, '20 X 24 inches', 1, 0),
(44, 'haha', 'hehe', 2.00, 'Box', NULL, 0, '2 ', 1, 1),
(45, 'sge', 'se sdesc', 2.00, 'Box', NULL, 0, '23', 1, 1),
(46, 'Custom Extra Large Game Box 2in Height', 'asd', 123.00, 'Box', NULL, 0, '123', 1, 1),
(47, 'Custom Extra Large Game Box 2in Height', 'Custom Extra Large Game Box 2in Height description', 20.00, 'Box', NULL, 0, '12.5 x 10.5 x 2 in', 1, 0),
(48, 'Custom Extra Large Game Box 3 Height', 'Custom Extra Large Game Box 3 Height desc', 20.00, 'Box', NULL, 0, '12.5 x 12.5 x 3', 1, 0),
(49, 'Custom Extra Large Rectangular Game Box', 'Custom Extra Large Rectangular Game Box description', 15.00, 'Box', NULL, 0, '18.5 x 9.5 x 2 inche', 1, 1),
(50, 'Custom Extra Large Rectangular Game Box 3 Height', 'Custom Extra Large Rectangular Game Box 3 Height description', 20.00, 'Box', NULL, 0, '18.5 x 9.5 x 3 inche', 1, 1),
(51, 'Custom Large Rectangular Game Box 2 Inch', 'Custom Large Rectangular Game Box 2 Inch description', 4.00, 'Box', NULL, 0, '15 x 10 x 2 inches', 1, 0),
(52, 'Custom Large Rectangular Game Box 3 Height', 'Custom Large Rectangular Game Box 3 Height descripton', 10.00, 'Box', NULL, 0, '15 x 10 x 3 inches', 1, 0),
(53, 'Custom Medium Rectangular Game Box 3 Height', 'Custom Medium Rectangular Game Box 3 Height desc', 10.00, 'Box', NULL, 0, '12.5 x  10.5 x 3 inc', 1, 0),
(54, 'Custom Medium Square Game Box 2 Height', 'Custom Medium Square Game Box 2 Height desc', 1.00, 'Box', NULL, 0, '9.5 x 9.5 x 2 inches', 1, 0),
(55, 'Custom Rectangular Game Box 2 Height', 'Custom Rectangular Game Box 2 Height desc', 2.00, 'Box', NULL, 0, '10.5 x 5.5 x 2 inche', 1, 0),
(56, 'Custom Rectangular Game Box 3 Height', 'Custom Rectangular Game Box 3 Height description', 3.00, 'Box', NULL, 0, '10.5 x 5.5 x 3', 1, 0),
(57, 'Custom Square Game Box 2 Height ', 'Custom Square Game Box 2 Height desc', 90.00, 'Box', NULL, 0, '5.5 x 5.5 x 2 inches', 1, 0),
(58, 'Custom Square Game Box 3 Height', 'Custom Square Game Box 3 Height edsc', 20.00, 'Box', NULL, 0, '5.5 x 5.5 x 3', 1, 0);

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
  `help_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`help_id`, `faq_id`, `help_title`, `help_description`, `help_image_path`) VALUES
(1, 4, 'Frequently Asked Question 2', '     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hah asd asd asdasd as dasd asd asd asda da das da sda sda sdasd asd asd asd asda sd asda sda da sd', 'assets/help_assets/6546a4ed238e9_3.png'),
(2, 4, 'Frequently Asked Question 1', 'Will you marry me ?\r\n', 'assets/help_assets/6566201cac864_designing.jpg'),
(3, 5, 'Terms of Service', 'STKR HUB Website Terms of Service\r\n\r\n1. Acceptance of Terms\r\nBy accessing and using the STKR HUB website (hereinafter referred to as \"the Site\"), you agree to comply with and be bound by the following terms and conditions. If you do not agree to these terms, please refrain from using the Site.\r\n\r\n2. Changes to Terms\r\nWe reserve the right to modify, amend, or update these terms at any time without prior notice. You are responsible for checking the terms regularly for changes. Your continued use of the STKR HUB Site after changes signify your acceptance of the modified terms.\r\n\r\n3. Use of the Site\r\n3.1. You must use the Site in compliance with all applicable laws and regulations.\r\n3.2. You are prohibited from using the Site for any unlawful or fraudulent activities.\r\n3.3. You are responsible for maintaining the confidentiality of your account credentials and are liable for any activities that occur under your account.\r\n\r\n4. User Content\r\n4.1. Any content you submit to the Site, such as comments, reviews, or contributions, must not violate the rights of others, including copyright, trademark, or privacy rights.\r\n4.2. We reserve the right to remove or modify any user-generated content at our discretion.\r\n\r\n5. Intellectual Property\r\n5.1. The Site and its contents are protected by copyright, trademark, and other intellectual property rights. You may not reproduce, distribute, or create derivative works without our permission.\r\n\r\n6. Privacy\r\n6.1. Your use of the Site is also governed by our Privacy Policy [Link to Privacy Policy].\r\n\r\n7. Links to Third-Party Websites\r\n7.1. The Site may contain links to third-party websites. We are not responsible for the content or practices of these third-party sites.\r\n\r\n8. Disclaimers and Limitations of Liability\r\n8.1. We make no warranties or representations about the accuracy or completeness of the Site\'s content. You use the Site at your own risk.\r\n8.2. We are not liable for any direct, indirect, incidental, special, or consequential damages arising from your use of the Site.\r\n\r\n9. Mode of Payment\r\n9.1. STKR HUB accepts payments through the following methods:\r\na. PayPal\r\nb. STKR Wallet\r\n9.2. The terms and conditions of these payment methods are subject to the respective policies of PayPal and STKR Wallet.\r\n\r\n10. Ticketing\r\nSTKR HUB provides ticketing services for various events and activities. By purchasing tickets through STKR HUB, you agree to the terms and conditions specific to each event, as well as the general terms outlined in this agreement.\r\n\r\n11. Refund Policy\r\n11.1. Refund Eligibility\r\nSTKR HUB has a refund policy in place for eligible transactions. Refunds may be granted under the following circumstances:\r\n\r\nEvent Cancellation: In the event of a cancellation of an event for which you have purchased tickets through STKR HUB, you may be eligible for a refund. The specific terms and conditions for each event\'s refund eligibility will be outlined at the time of purchase.\r\n\r\nPayment Errors: If there is a payment error or unauthorized charge on your account due to a technical issue or mistake, please contact STKR HUB\'s customer support within 30 days of the transaction for a review of your case.\r\n\r\n11.2. Refund Process\r\nTo request a refund, you must contact STKR HUB\'s customer support within the specified timeframe. The refund process may require you to provide relevant transaction details and proof of purchase. Refunds will be issued in the original form of payment, or through STKR Wallet if applicable.\r\n\r\n11.3. Non-Refundable Items\r\nCertain purchases, including but not limited to digital goods and services, may be non-refundable. These exceptions will be clearly communicated at the time of purchase.\r\n\r\n12. Indemnification\r\nYou agree to indemnify and hold us harmless from any claims, losses, or damages arising from your violation of these terms or your use of the Site.\r\n\r\n13. Termination\r\nWe reserve the right to terminate your access to the STKR HUB Site for any reason, without notice.\r\n\r\n14. Governing Law\r\nThese terms are governed by and construed in accordance with the laws of [Your Jurisdiction].\r\n\r\n15. Contact Information\r\nIf you have any questions or concerns regarding these terms, please contact us at mnl.stkrlabs@gmail.com.', NULL),
(4, 5, 'Privacy Policy', 'Privacy Policy\r\n\r\n1. INTRODUCTION\r\n\r\n\r\n\r\n1.1 Welcome to the STKR HUB platform run by STKR Labs. STKR Labs has responsibilities under privacy laws and regulations (\"Privacy Laws\") and is compliant on respecting the privacy rights and concerns of all Users in our STKR HUB platform. Users refers to a user who registers for an account with us for use of the Services, including both buyers and designers. We understand the significance of the personal data you\'ve shared with us and consider it our duty to appropriately handle, safeguard, and process this information. This Privacy Policy, also referred to as the Policy, aims to clarify how we gather, utilize, disclose, and handle the personal data you\'ve provided us with or that we may possess about you, both presently and in the future. Its purpose is to aid you in making informed decisions before sharing any of your personal data with us. \r\n\r\n\r\n\r\n1.2 By utilizing our Services, creating an account, visiting our Platform, or accessing our Services, you acknowledge and agree to comply with the practices, guidelines, and policies outlined in this Privacy Policy. You hereby provide consent for us to collect, use, disclose, and process your personal data as detailed herein. If you disagree with the data processing described in this Privacy Policy, we kindly ask that you refrain from using our Services or accessing our Platform. In the event of any changes to our Privacy Policy, we will notify you, which may include posting the updated policy on our Platform. We retain the right to modify this Privacy Policy at any time. By continuing to use our Services or Platform, including making any orders, you affirm and accept the alterations made to this Privacy Policy, to the maximum extent permitted by applicable law..\r\n\r\n\r\n\r\n1.3 \"Personal Data\" or \"personal data\" means data, whether true or not, about an individual who can be identified from that data, or from that data and other information to which an organization has or is likely to have access. Common examples of personal data could include name, identification number and contact information.\r\n\r\n\r\n\r\n1.4 This Policy operates in harmony with other notifications, contractual terms, or consent agreements relevant to the collection, storage, use, disclosure, and processing of your personal data by us. It is not intended to supersede those notifications or clauses unless specifically stated otherwise by us.\r\n\r\n\r\n\r\n1.5 This Policy applies to both buyers and designers who use the Services except where expressly stated otherwise.\r\n\r\n\r\n\r\n2. WHEN WILL STKR HUB COLLECT PERSONAL DATA?\r\n\r\n\r\n\r\n2.1 We collect or may collect your personal data in various instances, including but not limited to:\r\n\r\nWhen you register for or utilize our Services or Platform, or establish an account.\r\n\r\nUpon submission of any forms related to our products/services, whether online or physical.\r\n\r\nIn the course of agreements, documentation, or interactions concerning our services.\r\n\r\nThrough various communication channels such as telephone calls, emails, social media, and in-person meetings, including recordings of these calls.\r\n\r\nDuring your use of electronic services, our application, or our website, which may involve the use of cookies.\r\n\r\nWhen permissions are granted on your device to share information with our application or Platform.\r\n\r\nBy linking your account with external social media or other accounts, following the provider\'s policies.\r\n\r\nWhen engaging in transactions through our Services.\r\nProviding feedback, complaints, participating in contests, or submitting personal data for any other reason.\r\n\r\nThe list above is not exhaustive and represents common scenarios where we may collect personal data about you.\r\n\r\n\r\n\r\n3. WHAT PERSONAL DATA WILL SHOPEE COLLECT?\r\n\r\n\r\n\r\n3.1 The personal data that Shopee may collect includes but is not limited to:\r\n\r\nname;\r\nemail address;\r\ndate of birth;\r\nbilling and/or delivery address;\r\nbank account and payment information;\r\ntelephone number;\r\ninformation sent by or associated with the device(s) used to access our Services or Platform;\r\ninformation about your network and the people and accounts you interact with;\r\nphotographs or audio or video recordings;\r\nlocation data;\r\n\r\nany other information about the User when the User signs up to use our Services or Platform, and when the User uses the Services or Platform, as well as information related to how the User uses our Services or Platform; and\r\naggregate data on content the User engages with.\r\n\r\n\r\n3.2 You agree not to submit any information to us which is inaccurate or misleading, and you agree to inform us of any inaccuracies or changes to such information. We reserve the right at our sole discretion to require further documentation to verify the information provided by you.\r\n\r\n\r\n\r\n3.3 If you do not want us to collect the aforementioned information/personal data, you may opt out at any time by notifying our Data Protection Officer in writing. Further information on opting out can be found in the section below entitled \"How can you withdraw consent, remove, request access to or modify information you have provided to us?\"  Note, however, that opting out or withdrawing your consent for us to collect, use or process your personal data may affect your use of the Services and the Platform.  For example, opting out of the collection of location information will cause its location-based features to be disabled.\r\n\r\n\r\n\r\n4. HOW DO WE USE THE INFORMATION YOU PROVIDE US?\r\n\r\n\r\n\r\n4.1 We may collect, use, disclose and/or process your personal data for one or more of the following purposes:\r\n\r\nto consider and/or process your application/transaction with us or your transactions or communications with third parties via the Services;\r\n\r\nto manage, operate, provide and/or administer your use of and/or access to our Services and our Platform (including, without limitation, remembering your preference), as well as your relationship and user account with us;\r\n\r\nto respond to, process, deal with or complete a transaction and/or to fulfil your requests for certain products and services and notify you of service issues and unusual account actions;\r\nto enforce our Terms of Service or any applicable end user license agreements;\r\nto protect personal safety and the rights, property or safety of others;\r\n\r\nfor identification, verification, due diligence, or know your customer purposes;\r\n\r\nto evaluate and make decisions relating to your credit and risk profile and eligibility for credit products;\r\n\r\nto maintain and administer any software updates and/or other updates and support that may be required from time to time to ensure the smooth running of our Services;\r\n\r\nto deal with or facilitate customer service, carry out your instructions, deal with or respond to any enquiries given by (or purported to be given by) you or on your behalf;\r\n\r\nto contact you or communicate with you via voice call, text message and/or fax message, email and/or postal mail or otherwise for the purposes of administering and/or managing your relationship with us or your use of our Services, such as but not limited to communicating administrative information to you relating to our Services. You acknowledge and agree that such communication by us could be by way of the mailing of correspondence, documents or notices to you, which could involve disclosure of certain personal data about you to bring about delivery of the same as well as on the external cover of envelopes/mail packages;\r\n\r\nto allow other users to interact, connect with you or see some of your activities on the Platform, including to inform you when another User has sent you a private message, posted a comment for you on the Platform or connected with you using the social features on the Platform;\r\n\r\nto conduct research, analysis and development activities (including, but not limited to, data analytics, surveys, product and service development and/or profiling), to analyse how you use our Services, to recommend products and/or services relevant to your interests, to improve our Services or products and/or to enhance your customer experience;\r\n\r\nto allow for audits and surveys to, among other things, validate the size and composition of our target audience, and understand their experience with Shopee’s Services;\r\n\r\nfor marketing and advertising, and in this regard, to send you by various mediums and modes of communication marketing and promotional information and materials relating to products and/or services (including, without limitation, products and/or services of third parties whom Shopee may collaborate or tie up with) that Shopee (and/or its affiliates or related corporations) may be selling, marketing or promoting, whether such products or services exist now or are created in the future. You can unsubscribe from receiving marketing information at any time by using the unsubscribe function within the electronic marketing material. We may use your contact information to send newsletters or marketing materials from us and from our related companies;\r\n\r\nto respond to legal processes or to comply with or as required by any applicable law, governmental or regulatory requirements of any relevant jurisdiction or where we have a good faith belief that such disclosure is necessary, including, without limitation, meeting the requirements to make disclosure under the requirements of any law binding on Shopee or on its related corporations or affiliates (including, where applicable, the display of your name, contact details and company details);\r\n\r\nto produce statistics and research for internal and statutory reporting and/or record-keeping requirements;\r\n\r\nto carry out due diligence or other screening activities (including, without limitation, background checks) in accordance with legal or regulatory obligations or our risk management procedures that may be required by law or that may have been put in place by us;\r\n\r\nto audit our Services or Shopee\'s business;\r\n\r\nto prevent or investigate any actual or suspected violations of our Terms of Service, fraud, unlawful activity, omission or misconduct, whether relating to your use of our Services or any other matter arising from your relationship with us;\r\n\r\nto respond to any threatened or actual claims asserted against Shopee or other claim that any Content violates the rights of third parties;\r\n\r\nto store, host, back up (whether for disaster recovery or otherwise) of your personal data, whether within or outside of your jurisdiction;\r\n\r\nto deal with and/or facilitate a business asset transaction or a potential business asset transaction, where such transaction involves Shopee as a participant or involves only a related corporation or affiliate of Shopee as a participant or involves Shopee and/or any one or more of Shopee\'s related corporations or affiliates as participant(s), and there may be other third party organisations who are participants in such transaction. A “business asset transaction” refers to the purchase, sale, lease, merger, amalgamation or any other acquisition, disposal or financing of an organisation or a portion of an organisation or of any of the business or assets of an organisation; and/or\r\nany other purposes which we notify you of at the time of obtaining your consent.\r\n(collectively, the “Purposes”).\r\n\r\n\r\n\r\n4.2 You acknowledge, consent and agree that STKR Labs may access, preserve and disclose your Account information and Content if required to do so by law or pursuant to an order of a court or by any governmental or regulatory authority having jurisdiction over Shopee or in a good faith belief that such access preservation or disclosure is reasonably necessary to: (a) comply with legal process; (b) comply with a request from any governmental or regulatory authority having jurisdiction over Shopee; (c) enforce the Shopee Terms of Service or this Privacy Policy; (d) respond to any threatened or actual claims asserted against Shopee or other claim that any Content violates the rights of third parties; (e) respond to your requests for customer service; or (f) protect the rights, property or personal safety of Shopee, its users and/or the public.\r\n\r\n\r\n\r\n4.3 As the purposes for which we will/may collect, use, disclose or process your personal data depend on the circumstances at hand, such purpose may not appear above. However, we will notify you of such other purpose at the time of obtaining your consent, unless processing of the applicable data without your consent is permitted by the Privacy Laws.\r\n\r\n\r\n\r\n5. HOW DOES STKR HUB PROTECT AND RETAIN CUSTOMER INFORMATION?\r\n\r\n\r\n\r\n5.1 We implement a variety of security measures and strive to ensure the security of your personal data on our systems. User personal data is contained behind secured networks and is only accessible by a limited number of employees who have special access rights to such systems.  However, there can inevitably be no guarantee of absolute security.\r\n\r\n\r\n\r\n5.2 We will retain personal data in accordance with the Privacy Laws and/or other applicable laws. That is, we will destroy or anonymize your personal data when we have reasonably determined that (i) the purpose for which that personal data was collected is no longer being served by the retention of such personal data; (ii) retention is no longer necessary for any legal or business purposes; and (iii) no other legitimate interests warrant further retention of such personal data. If you cease using the Platform, or your permission to use the Platform and/or the Services is terminated or withdrawn, we may continue storing, using and/or disclosing your personal data in accordance with this Privacy Policy and our obligations under the Privacy Laws. Subject to applicable law, we may securely dispose of your personal data without prior notice to you.\r\n\r\n\r\n\r\n6. QUESTIONS, CONCERNS OR COMPLAINTS? CONTACT US\r\n\r\n\r\n\r\n6.1 If you have any questions or concerns about our privacy practices, we welcome you to contact us by e-mail at mnl.stkrlabs@gmail.com\r\n\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `index_banner`
--

CREATE TABLE `index_banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_showcased` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_banner`
--

INSERT INTO `index_banner` (`id`, `banner_name`, `image_path`, `is_showcased`) VALUES
(1, 'Amogus Banner', 'img/banner/banner2.png', 1),
(5, 'delivery', 'img/banner/656586157d1f5_del.png', 1),
(6, '12.12', 'img/banner/656585825c976_12 12.png', 1),
(7, 'pasko', 'img/banner/656585f2b4d1f_Christmas banner.png', 1),
(8, 'black and purple', 'img/banner/656585ca646b7_banner3.png', 1);

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
(565, '1776565bba8172fa', '2023112811063220', 1042, 20, NULL, NULL, NULL, 177, 1, 2.00, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:06:32', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 2.00, '01H18663C7828653P', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(566, '1696565bc509feb7', '2023112811092020', 1043, 20, NULL, 169, NULL, NULL, 1, 18.00, 0, 0, 0, 1, 0, 0, NULL, 0, '2023-11-28 18:09:20', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 60.50, NULL, NULL, NULL, '2023-11-28 18:09:33', '2023-12-06 15:56:29', '2023-12-06 15:56:42', NULL, NULL, NULL, 42.50),
(567, '1826565c558db9c7', '2023112811475221', 1048, 21, NULL, NULL, NULL, 182, 1, 19.60, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:47:52', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 193.00, '1KU11834EH0551449', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(568, '1816565c558e5b81', '2023112811475221', 1047, 21, NULL, NULL, NULL, 181, 1, 21.60, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:47:52', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 193.00, '1KU11834EH0551449', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(569, '1806565c5590bfaa', '2023112811475221', 1046, 21, NULL, NULL, NULL, 180, 1, 17.30, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:47:53', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 193.00, '1KU11834EH0551449', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(570, '1796565c55914d4c', '2023112811475221', 1045, 21, NULL, NULL, NULL, 179, 1, 37.10, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:47:53', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 193.00, '1KU11834EH0551449', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(571, '1786565c5591b66d', '2023112811475221', 1044, 21, NULL, NULL, NULL, 178, 1, 12.40, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 18:47:53', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 193.00, '1KU11834EH0551449', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(572, '1706565c5f20347d', '2023112811502621', 1053, 21, NULL, 170, NULL, NULL, 1, 176.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 18:50:26', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1014.50, NULL, NULL, NULL, '2023-11-28 18:51:21', NULL, NULL, NULL, NULL, NULL, 42.50),
(573, '1716565c5f208ecf', '2023112811502621', 1052, 21, NULL, 171, NULL, NULL, 1, 194.40, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 18:50:26', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1014.50, NULL, NULL, NULL, '2023-11-28 18:51:21', NULL, NULL, NULL, NULL, NULL, 42.50),
(574, '1726565c5f21273f', '2023112811502621', 1051, 21, NULL, 172, NULL, NULL, 1, 155.70, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 18:50:26', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1014.50, NULL, NULL, NULL, '2023-11-28 18:51:21', NULL, NULL, NULL, NULL, NULL, 42.50),
(575, '1736565c5f216781', '2023112811502621', 1050, 21, NULL, 173, NULL, NULL, 1, 333.90, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 18:50:26', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1014.50, NULL, NULL, NULL, '2023-11-28 18:51:21', NULL, NULL, NULL, NULL, NULL, 42.50),
(576, '1746565c5f21c357', '2023112811502621', 1049, 21, NULL, 174, NULL, NULL, 1, 111.60, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 18:50:26', 0.00, 0.00, 0.00, 0.00, 0, 'Marcus Dacaymat', '09122164336', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Brgy. Malinta', 1014.50, NULL, NULL, NULL, '2023-11-28 18:51:21', NULL, NULL, NULL, NULL, NULL, 42.50),
(577, '1846565dc66d76fe', '2023112813261422', 1055, 22, NULL, NULL, NULL, 184, 1, 7.30, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:26:14', 0.00, 0.00, 0.00, 0.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 101.60, '0W9972857K745893M', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(578, '1836565dc6714b1c', '2023112813261422', 1054, 22, NULL, NULL, NULL, 183, 1, 9.30, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:26:15', 0.00, 0.00, 0.00, 0.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 101.60, '0W9972857K745893M', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(579, '1756565dcb620bd0', '2023112813273422', 1057, 22, NULL, 175, NULL, NULL, 1, 83.70, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:27:34', 0.00, 0.00, 0.00, 0.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 234.40, '0HV90317SU972501E', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:28:50', '2023-12-06 15:34:05', '2023-12-06 15:34:14', '2023-12-06 08:34:50', NULL, NULL, 0.00),
(580, '1766565dcb62a0ad', '2023112813273422', 1056, 22, NULL, 176, NULL, NULL, 1, 65.70, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:27:34', 0.00, 0.00, 0.00, 0.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 234.40, '0HV90317SU972501E', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:28:50', '2023-12-06 15:34:05', '2023-12-06 15:34:14', '2023-12-06 08:34:50', NULL, NULL, 0.00),
(581, '1876565df782639d', '2023112813392023', 1060, 23, NULL, NULL, NULL, 187, 1, 13.50, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:39:20', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 121.40, '711342200G5826747', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(582, '1866565df782f9f9', '2023112813392023', 1059, 23, NULL, NULL, NULL, 186, 1, 9.10, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:39:20', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 121.40, '711342200G5826747', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(583, '1856565df7835e9d', '2023112813392023', 1058, 23, NULL, NULL, NULL, 185, 1, 13.80, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:39:20', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 121.40, '711342200G5826747', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(584, '1776565dfabd6dfa', '2023112813401123', 1063, 23, NULL, 177, NULL, NULL, 1, 124.20, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:40:11', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 412.60, '20R57189FE169932Y', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:40:40', NULL, NULL, NULL, NULL, NULL, 0.00),
(585, '1786565dfabdf686', '2023112813401123', 1062, 23, NULL, 178, NULL, NULL, 1, 81.90, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:40:11', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 412.60, '20R57189FE169932Y', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:40:40', NULL, NULL, NULL, NULL, NULL, 0.00),
(586, '1796565dfabe56ba', '2023112813401123', 1061, 23, NULL, 179, NULL, NULL, 1, 121.50, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:40:11', 0.00, 0.00, 0.00, 0.00, 0, 'John Kevin Ilagan', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 412.60, '20R57189FE169932Y', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:40:40', NULL, NULL, NULL, NULL, NULL, 0.00),
(587, '1916565e2007435d', '2023112813500824', 1067, 24, NULL, NULL, NULL, 191, 1, 2.20, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:50:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 103.80, '2KP79000J4686983K', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(588, '1906565e2007c532', '2023112813500824', 1066, 24, NULL, NULL, NULL, 190, 1, 4.80, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:50:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 103.80, '2KP79000J4686983K', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(589, '1896565e20082aca', '2023112813500824', 1065, 24, NULL, NULL, NULL, 189, 1, 4.10, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:50:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 103.80, '2KP79000J4686983K', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(590, '1886565e2008a83a', '2023112813500824', 1064, 24, NULL, NULL, NULL, 188, 1, 7.70, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-11-28 20:50:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 103.80, '2KP79000J4686983K', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(591, '1806565e23cbccb2', '2023112813510824', 1071, 24, NULL, 180, NULL, NULL, 1, 19.80, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:51:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 254.20, '77917079AR9911921', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:51:23', NULL, NULL, NULL, NULL, NULL, 0.00),
(592, '1816565e23cc4f0f', '2023112813510824', 1070, 24, NULL, 181, NULL, NULL, 1, 43.20, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:51:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 254.20, '77917079AR9911921', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:51:23', NULL, NULL, NULL, NULL, NULL, 0.00),
(593, '1826565e23cc935d', '2023112813510824', 1069, 24, NULL, 182, NULL, NULL, 1, 36.90, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:51:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 254.20, '77917079AR9911921', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:51:23', NULL, NULL, NULL, NULL, NULL, 0.00),
(594, '1836565e23ccef9d', '2023112813510824', 1068, 24, NULL, 183, NULL, NULL, 1, 69.30, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 20:51:08', 0.00, 0.00, 0.00, 0.00, 0, 'Nicole Cabal', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 1', '1440', '8 Doneza St. Balubaran Malinta', 254.20, '77917079AR9911921', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-11-28 20:51:23', NULL, NULL, NULL, NULL, NULL, 0.00),
(595, '2066565fbd485d1e', '2023112815402020', 1072, 20, 206, NULL, NULL, NULL, 1, 222.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-28 22:40:20', 200.00, 40.00, 160.00, 222.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 264.50, NULL, NULL, NULL, '2023-11-28 22:40:36', NULL, NULL, NULL, NULL, NULL, 42.50),
(596, '6376567e3106aed9', '2023113002191220', 1074, 20, NULL, NULL, 637, NULL, 1, 7.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-11-30 09:19:12', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 49.50, NULL, NULL, NULL, '2023-11-30 09:19:29', NULL, NULL, NULL, NULL, NULL, 42.50),
(597, '192656b31c68051e', '2023120213315028', 1078, 28, NULL, NULL, NULL, 192, 1, 2.00, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-12-02 13:31:50', 0.00, 0.00, 0.00, 0.00, 0, 'john kevin ilagan', '09263853401', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Coloong', '1445', 'San Miguel', 87.00, '5PX70125DY191435T', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(599, '193656d747855702', '2023120406405620', 1083, 20, NULL, NULL, NULL, 193, 1, 2.40, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-12-04 06:40:56', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 2.40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(600, '194656d8dc99e77e', '2023120408285720', 1084, 20, NULL, NULL, NULL, 194, 1, 2.40, 0, 0, 0, 0, 1, 0, NULL, 0, '2023-12-04 08:28:57', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 916.90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42.50),
(607, '198656fb30d080cf', '2023120600322920', 1086, 20, 198, NULL, NULL, NULL, 1, 173.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-12-06 07:32:29', 100.00, 20.00, 80.00, 173.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 215.50, NULL, NULL, NULL, '2023-12-06 07:35:50', NULL, NULL, NULL, NULL, NULL, 42.50),
(608, '20665700785b5f92', '2023120606325322', 1087, 22, 206, NULL, NULL, NULL, 2, 222.00, 0, 0, 0, 0, 0, 1, 3, 0, '2023-12-06 13:32:53', 200.00, 40.00, 160.00, 222.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 486.50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-06 13:35:07', NULL, 42.50),
(609, '20665700907e5d2d', '2023120606391922', 1088, 22, 206, NULL, NULL, NULL, 1, 222.00, 0, 0, 0, 0, 0, 1, 1, 0, '2023-12-06 13:39:19', 200.00, 40.00, 160.00, 222.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 264.50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-06 13:39:33', NULL, 42.50),
(610, '20465701c996b794', '2023120608024922', 1089, 22, 204, NULL, NULL, NULL, 1, 1041.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-12-06 15:02:49', 1000.00, 200.00, 800.00, 1041.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 1083.50, NULL, NULL, NULL, '2023-12-06 16:07:04', NULL, NULL, NULL, NULL, NULL, 42.50),
(611, '645657020f3c3c45', '2023120608212322', 1090, 22, NULL, NULL, 645, NULL, 1, 7.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-12-06 15:21:23', 0.00, 0.00, 0.00, 0.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 92.00, '9NJ462819B105472S', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-12-06 16:07:02', NULL, NULL, NULL, NULL, NULL, 0.00),
(612, '19965702aaee62f2', '2023120609025422', 1091, 22, 199, NULL, NULL, NULL, 8, 293.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-12-06 16:02:54', 200.00, 40.00, 160.00, 293.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 2386.50, NULL, NULL, NULL, '2023-12-06 16:03:05', NULL, NULL, NULL, NULL, NULL, 42.50),
(613, '19765702b4c6893a', '2023120609053222', 1092, 22, 197, NULL, NULL, NULL, 77, 396.00, 0, 1, 0, 0, 0, 0, NULL, 0, '2023-12-06 16:05:32', 200.00, 40.00, 160.00, 396.00, 0, 'Jenica Gamboa', '091231231233', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 2', '1440', '8 Doneza St. Balubaran Malinta', 30797.00, '32H15109J9408892S', 'S9QZENZKTVY9A', 'sb-i4hyn27575086@business.example.com', '2023-12-06 16:06:59', NULL, NULL, NULL, NULL, NULL, 0.00);

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
(182, '4NW11762JP717494A', 'CAPTURE', 'COMPLETED', 'PHP', 5000.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '30923398UC4083016', 'COMPLETED', 'PHP', 5000.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 10:04:58', '2023-11-28 10:04:58', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(183, '01H18663C7828653P', 'CAPTURE', 'COMPLETED', 'PHP', 2.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '44G38631VE415315V', 'COMPLETED', 'PHP', 2.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 10:06:31', '2023-11-28 10:06:31', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(184, '1KU11834EH0551449', 'CAPTURE', 'COMPLETED', 'PHP', 193.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '7EK30470JN151360V', 'COMPLETED', 'PHP', 193.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 10:47:52', '2023-11-28 10:47:52', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(185, '5KG459640N496574U', 'CAPTURE', 'COMPLETED', 'PHP', 1000.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '1T602794S4687551W', 'COMPLETED', 'PHP', 1000.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 10:49:46', '2023-11-28 10:49:46', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(186, '6MC49229ST059460X', 'CAPTURE', 'COMPLETED', 'PHP', 5000.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '4RP30507GF2741220', 'COMPLETED', 'PHP', 5000.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 10:50:13', '2023-11-28 10:50:13', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(187, '0W9972857K745893M', 'CAPTURE', 'COMPLETED', 'PHP', 101.60, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2KA258073Y038073E', 'COMPLETED', 'PHP', 101.60, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:26:13', '2023-11-28 12:26:13', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(188, '0HV90317SU972501E', 'CAPTURE', 'COMPLETED', 'PHP', 234.40, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '5RY34753HD837130D', 'COMPLETED', 'PHP', 234.40, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:27:33', '2023-11-28 12:27:33', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(189, '711342200G5826747', 'CAPTURE', 'COMPLETED', 'PHP', 121.40, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2L265302YE888911F', 'COMPLETED', 'PHP', 121.40, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:39:19', '2023-11-28 12:39:19', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(190, '20R57189FE169932Y', 'CAPTURE', 'COMPLETED', 'PHP', 412.60, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '9AG42077CL682313Y', 'COMPLETED', 'PHP', 412.60, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:40:10', '2023-11-28 12:40:10', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(191, '2KP79000J4686983K', 'CAPTURE', 'COMPLETED', 'PHP', 103.80, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '3FY44191AA915411C', 'COMPLETED', 'PHP', 103.80, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:50:07', '2023-11-28 12:50:07', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(192, '77917079AR9911921', 'CAPTURE', 'COMPLETED', 'PHP', 254.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '8AG07923TR704202D', 'COMPLETED', 'PHP', 254.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-11-28 12:51:07', '2023-11-28 12:51:07', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(193, '7G409513696908324', 'CAPTURE', 'COMPLETED', 'PHP', 500.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '3XH43485FS697593X', 'COMPLETED', 'PHP', 500.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-02 13:28:22', '2023-12-02 13:28:22', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(194, '009613031N087691H', 'CAPTURE', 'COMPLETED', 'PHP', 500.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '40H192662C107993T', 'COMPLETED', 'PHP', 500.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-02 13:28:32', '2023-12-02 13:28:32', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(195, '0XF44525BK376971B', 'CAPTURE', 'COMPLETED', 'PHP', 100.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '33M84994YB079063P', 'COMPLETED', 'PHP', 100.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-02 13:28:48', '2023-12-02 13:28:48', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(196, '5PX70125DY191435T', 'CAPTURE', 'COMPLETED', 'PHP', 87.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '4U7908597R376622J', 'COMPLETED', 'PHP', 87.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-02 13:31:49', '2023-12-02 13:31:49', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(197, '1RD09154GN932642B', 'CAPTURE', 'COMPLETED', 'PHP', 103.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '9TC83482N6376454H', 'COMPLETED', 'PHP', 103.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-02 13:33:14', '2023-12-02 13:33:14', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(198, '77D29091VY3487533', 'CAPTURE', 'COMPLETED', 'PHP', 5000.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '6Y061525HK363474F', 'COMPLETED', 'PHP', 5000.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-06 05:32:36', '2023-12-06 05:32:36', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(199, '9NJ462819B105472S', 'CAPTURE', 'COMPLETED', 'PHP', 92.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '75285230L92153010', 'COMPLETED', 'PHP', 92.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-06 07:21:22', '2023-12-06 07:21:22', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(200, '32H15109J9408892S', 'CAPTURE', 'COMPLETED', 'PHP', 30797.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '9DL13625E79934338', 'COMPLETED', 'PHP', 30797.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-12-06 08:05:31', '2023-12-06 08:05:31', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US');

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
  `game_name` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `published_date` datetime NOT NULL DEFAULT current_timestamp(),
  `creator_id` int(11) NOT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `has_pending_update` tinyint(1) DEFAULT 0,
  `is_update_request_denied` tinyint(1) DEFAULT 0,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_hidden` tinyint(1) DEFAULT 0,
  `game_rating` decimal(4,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_built_games`
--

INSERT INTO `published_built_games` (`published_game_id`, `built_game_id`, `game_name`, `category`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `has_pending_update`, `is_update_request_denied`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_hidden`, `game_rating`) VALUES
(192, 173, 'Stellar Syndicate', 'Card Games', 'First Edition', '2023-11-28 19:20:29', 21, 2, 'Nebula Nexus is an epic space conquest game where players vie for supremacy by strategically controlling pivotal nexuses in the vast cosmic arena. Alliances are formed and shattered, fleets deployed, and epic battles waged as players seek to dominate the galaxy.', '<ul style=\"list-style-type: circle;\">\r\n<li>\r\n<p><strong>Area Control and Nexus Domination:</strong> The game centers around a modular board representing sectors of the galaxy. Players deploy fleets to gain control over key nexuses, each providing distinct advantages. Nexus domination is crucial for accumulating points and achieving victory.</p>\r\n</li>\r\n<li>\r\n<p><strong>Alliance Dynamics:</strong> Nebula Nexus introduces a dynamic alliance system. Players can form temporary alliances with others to achieve shared objectives. However, alliances are tenuous and subject to betrayal, adding an element of strategy and negotiation.</p>\r\n</li>\r\n<li>\r\n<p><strong>Fleet Deployment and Tactical Battles:</strong> Players build and deploy fleets composed of different ship types, each with unique strengths and abilities. Tactical battles are resolved through a combination of strategic planning, dice rolls, and potential card play, making each encounter a dynamic and engaging experience.</p>\r\n</li>\r\n<li>\r\n<p><strong>Galactic Events:</strong> Randomized galactic events inject uncertainty into the game, ranging from cosmic anomalies that alter the rules to diplomatic shifts that reshape alliances. Adapting to these events is key to success.</p>\r\n</li>\r\n</ul>', '', 'uploads/6565ca2cbde45__a0c44805-62fa-4578-aa12-db6081ba9243.jpg', 2, 9, 10, 20, 0, 0, 800.00, 160.00, 640.00, 1171.00, 0, 0.00),
(193, 174, 'Enigma Escape', 'Board Games', 'First Edition', '2023-11-28 19:20:53', 21, 1, 'Quantum Quest is a cerebral exploration game set in the enigmatic realm of quantum physics. Players venture through a dynamic maze of shifting dimensions, aiming to solve intricate puzzles and collect rare quantum artifacts while contending with the relentless march of time.', '<ul>\r\n<li>\r\n<ul>\r\n<li>\r\n<h1><strong>Area Control and Nexus Domination:</strong> The game centers around a modular board representing sectors of the galaxy. Players deploy fleets to gain control over key nexuses, each providing distinct advantages. Nexus domination is crucial for accumulating points and achieving victory.</h1>\r\n</li>\r\n<li>\r\n<h1><strong>Alliance Dynamics:</strong> Nebula Nexus introduces a dynamic alliance system. Players can form temporary alliances with others to achieve shared objectives. However, alliances are tenuous and subject to betrayal, adding an element of strategy and negotiation.</h1>\r\n</li>\r\n<li>\r\n<h1><strong>Fleet Deployment and Tactical Battles:</strong> Players build and deploy fleets composed of different ship types, each with unique strengths and abilities. Tactical battles are resolved through a combination of strategic planning, dice rolls, and potential card play, making each encounter a dynamic and engaging experience.</h1>\r\n</li>\r\n<li>\r\n<h1><strong>Galactic Events:</strong> Randomized galactic events inject uncertainty into the game, ranging from cosmic anomalies that alter the rules to diplomatic shifts that reshape alliances. Adapting to these events is key to success</h1>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>', '', 'uploads/6565cc856d392__d41311cb-85b2-4588-8dba-658b9148d61f.jpg', 2, 5, 10, 15, 0, 0, 70.00, 14.00, 56.00, 194.00, 0, 0.00),
(194, 169, 'Quantum ', 'Board Games', 'yu', '2023-11-28 19:34:28', 20, 2, 'sd', '<p>yu</p>', '', 'uploads/6565cf49e2235__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg', 4, 3, 3, 3, 0, 0, 20.00, 4.00, 16.00, 40.00, 1, 0.00),
(195, 172, 'Chrono Conundrum', 'Dice Games', 'First Edition', '2023-11-28 20:05:11', 21, 1, 'Time Manipulation and Timeline Alteration: The central mechanic revolves around the manipulation of time. Players can alter the timeline, affecting past and future events. Actions taken in the past may have repercussions in the present and future, creating a dynamic and interconnected game world.', '<ul>\r\n<li>\r\n<p><strong>Time Manipulation and Timeline Alteration:</strong> The central mechanic revolves around the manipulation of time. Players can alter the timeline, affecting past and future events. Actions taken in the past may have repercussions in the present and future, creating a dynamic and interconnected game world.</p>\r\n</li>\r\n<li>\r\n<p><strong>Puzzle-Solving and Temporal Challenges:</strong> Players encounter a variety of time-based puzzles that require both logical thinking and an understanding of temporal mechanics. Successfully solving puzzles not only advances the narrative but also unlocks new opportunities or resources.</p>\r\n</li>\r\n<li>\r\n<ul>\r\n<li><strong>Time Manipulation and Timeline Alteration:</strong> The central mechanic revolves around the manipulation of time. Players can alter the timeline, affecting past and future events. Actions taken in the past may have repercussions in the present and future, creating a dynamic and interconnected game world.</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<ul>\r\n<li><strong>Time Manipulation and Timeline Alteration:</strong> The central mechanic revolves around the manipulation of time. Players can alter the timeline, affecting past and future events. Actions taken in the past may have repercussions in the present and future, creating a dynamic and interconnected game world.</li>\r\n</ul>\r\n</li>\r\n</ul>', '', 'uploads/6565d636262e4__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg', 8, 10, 8, 10, 0, 0, 700.00, 140.00, 560.00, 873.00, 0, 0.00),
(196, 171, 'Labyrinth Legends', 'Card Games', 'First Edition', '2023-11-28 20:08:57', 21, 2, 'Labyrinth Legends invites players into a fantastical maze filled with mythical creatures and legendary artifacts. As brave adventurers, players explore the labyrinth, face off against mythical foes, and collect powerful relics to claim victory.', '<ul>\r\n<li>\r\n<p><strong>Tile Exploration and Maze Building:</strong> The labyrinth is constructed as players explore, revealing new tiles that represent different chambers and passages. Each turn, players decide how to expand the labyrinth, creating a dynamic and unpredictable game board.</p>\r\n</li>\r\n<li>\r\n<p><strong>Creature Encounter and Combat:</strong> Throughout the labyrinth, players encounter mythical creatures with unique abilities. Combat is resolved through a combination of player skill, character attributes, and possibly acquired artifacts. Overcoming creatures yields rewards and clears the path for further exploration.</p>\r\n</li>\r\n<li>\r\n<p><strong>Resource Management:</strong> Players collect resources, such as gold and magical items, as they progress. These resources are used to enhance character abilities, acquire artifacts, or unlock special actions. Efficient resource management is crucial for success.</p>\r\n</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n</ul>', '', 'uploads/6565d846961f0__a0c44805-62fa-4578-aa12-db6081ba9243.jpg', 10, 20, 40, 50, 0, 0, 100.00, 20.00, 80.00, 316.00, 0, 0.00),
(197, 170, 'Nebula Nexus', 'Card Games', 'First Edition', '2023-11-28 20:12:00', 21, 4, 'Area Control: Players vie for dominance over key areas of the galaxy, each providing unique advantages.\r\nAlliance-Building: Form temporary alliances with other players to achieve common goals, but be wary of betrayal.\r\nStrategic Combat: Deploy fleets with different strengths and abilities, engaging in tactical space battles to gain control of nexuses.', '<p>Area Control: Players vie for dominance over key areas of the galaxy, each providing unique advantages.<br>Alliance-Building: Form temporary alliances with other players to achieve common goals, but be wary of betrayal.<br>Strategic Combat: Deploy fleets with different strengths and abilities, engaging in tactical space battles to gain control of nexuses.</p>\r\n<p>&nbsp;</p>\r\n<p>Area Control: Players vie for dominance over key areas of the galaxy, each providing unique advantages.<br>Alliance-Building: Form temporary alliances with other players to achieve common goals, but be wary of betrayal.<br>Strategic Combat: Deploy fleets with different strengths and abilities, engaging in tactical space battles to gain control of nexuses.</p>\r\n<p>&nbsp;</p>\r\n<p>Area Control: Players vie for dominance over key areas of the galaxy, each providing unique advantages.<br>Alliance-Building: Form temporary alliances with other players to achieve common goals, but be wary of betrayal.<br>Strategic Combat: Deploy fleets with different strengths and abilities, engaging in tactical space battles to gain control of nexuses.</p>', '', 'uploads/6565d906dc9b4__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg', 12, 14, 20, 30, 0, 0, 200.00, 40.00, 160.00, 396.00, 0, 0.00),
(198, 176, 'Celestial Cipher', 'War Games', 'First Edition', '2023-11-28 20:31:35', 22, 4, 'Celestial Cipher immerses players in a mystical world where ancient celestial artifacts hold the key to unimaginable power. As archeologists and explorers, players decipher cryptic codes, navigate treacherous landscapes, and unlock the secrets of these artifacts in a race against time.', '<ul>\r\n<li>\r\n<p><strong>Code Deciphering:</strong> The core mechanic revolves around deciphering celestial codes. Players collect code cards representing fragments of ancient symbols and must strategically assemble these codes to unlock hidden powers, gain knowledge, or overcome obstacles.</p>\r\n</li>\r\n<li>\r\n<p><strong>Exploration and Landscapes:</strong> The game board consists of diverse landscapes, each presenting unique challenges and opportunities. Players navigate through forests, deserts, and mountains, encountering obstacles and collecting code fragments. Exploration is a key element of the game.</p>\r\n</li>\r\n<li>\r\n<p><strong>Artifact Activation:</strong> Deciphered codes unlock the powers of celestial artifacts. These artifacts, represented by unique cards, provide players with special abilities, game-altering effects, or valuable resources. Activating artifacts strategically is essential for success.</p>\r\n</li>\r\n<li>\r\n<p><strong>Time Pressure:</strong> Celestial Cipher introduces a time element. Players race against a countdown represented by a celestial clock. Deciphering codes and activating artifacts efficiently is vital, as the celestial clock imposes penalties for delays and adds a sense of urgency to the gameplay.</p>\r\n</li>\r\n</ul>', '', 'uploads/6565dd46e784d__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg', 2, 3, 2, 4, 0, 0, 100.00, 20.00, 80.00, 173.00, 0, 0.00),
(199, 175, 'Galactic Galambit', 'RPGs', 'First Edition', '2023-11-28 20:31:43', 22, 3, '\r\nCertainly! Lets dive into detailed summaries and mechanics for each of the requested games:\r\n\r\n1. Galactic Gambit:\r\nSummary:\r\nGalactic Gambit is a space-themed strategy game that thrusts players into the heart of an interstellar conflict. As leaders of rival factions, players engage in high-stakes battles, deploy fleets, and vie for control over key celestial territories to establish dominance in the galaxy.', '<p><strong>Fleet Deployment and Tactical Battles:</strong> Players build and deploy fleets with various ship classes, each contributing unique strengths to space battles. Tactical battles are resolved through a combination of strategic planning, dice rolls, and potentially player-controlled card play, ensuring dynamic and engaging encounters.</p>', '', 'uploads/6565dd96eff9c__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg', 1, 2, 3, 4, 0, 0, 200.00, 40.00, 160.00, 293.00, 0, 0.00),
(200, 179, 'Astral Allies', 'Promotional', 'Deluxe Edition', '2023-11-28 20:43:55', 23, 2, 'Army Building and Customization: Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.', '<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>', '', 'uploads/6565e00a67291__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg', 20, 21, 10, 14, 0, 0, 10.00, 2.00, 8.00, 145.00, 0, 0.00),
(201, 178, 'Nebulous Negotiations', 'Dice Games', 'Gold Edition', '2023-11-28 20:43:59', 23, 1, 'Army Building and Customization: Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.', '<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>', '', 'uploads/6565e04ca0924__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg', 1, 10, 10, 20, 0, 0, 200.00, 40.00, 160.00, 291.00, 0, 0.00),
(202, 177, 'Odyssey Oracle', 'Card Games', 'Silver Edition', '2023-11-28 20:44:04', 23, 1, 'Army Building and Customization: Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.', '<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.<strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>\r\n<p><strong>Army Building and Customization:</strong> Players assemble armies composed of celestial beings, each with unique abilities and attributes. Customization options include selecting unit types, assigning special abilities, and strategically building a force tailored to their playstyle.</p>', '', 'uploads/6565e080da427__529fbc61-1800-48ee-968b-fb7486c8f7eb.jpg', 3, 10, 20, 40, 0, 0, 1000.00, 200.00, 800.00, 1138.00, 0, 0.00),
(203, 183, 'Cosmic Codebreaker', 'Board Games', 'First Edition', '2023-11-28 20:55:30', 24, 2, 'Espionage Missions: Players undertake espionage missions to gather information, disrupt opponents plans, or steal valuable resources. These missions involve risk and reward, with success providing strategic advantages and failure potentially leading to setbacks.', '<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n</li>\r\n</ul>', '', 'uploads/6565e2b6963ef__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg', 2, 4, 5, 7, 0, 0, 100.00, 20.00, 80.00, 177.00, 0, 0.00),
(204, 182, 'Warriors Starlight', 'War Games', 'Second Edition', '2023-11-28 20:55:35', 24, 1, 'Espionage Missions: Players undertake espionage missions to gather information, disrupt opponents plans, or steal valuable resources. These missions involve risk and reward, with success providing strategic advantages and failure potentially leading to setbacks.', '<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>', '', 'uploads/6565e2e07b80c__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg', 2, 4, 5, 10, 0, 0, 1000.00, 200.00, 800.00, 1041.00, 0, 0.00),
(205, 181, 'Warp Zone', 'Promotional', 'Judgement Edition', '2023-11-28 20:55:40', 24, 2, 'Espionage Missions: Players undertake espionage missions to gather information, disrupt opponents plans, or steal valuable resources. These missions involve risk and reward, with success providing strategic advantages and failure potentially leading to setbacks.', '<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>', '', 'uploads/6565e30f5dcc1__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg', 20, 40, 50, 70, 0, 0, 500.00, 100.00, 400.00, 548.00, 0, 0.00),
(206, 180, 'Paradox Puzzles', 'Dice Games', 'Leaf Edition', '2023-11-28 20:55:44', 24, 2, 'Espionage Missions: Players undertake espionage missions to gather information, disrupt opponents plans, or steal valuable resources. These missions involve risk and reward, with success providing strategic advantages and failure potentially leading to setbacks.', '<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n<ul>\r\n<li>\r\n<p><strong>Agent Recruitment:</strong> Cosmic Codebreaker introduces a roster of unique agents, each with specialized skills. Players recruit agents to their cause, leveraging their abilities in codebreaking, sabotage, or information gathering. The composition of the agent team influences overall strategy.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hidden Agendas:</strong> Each player has a hidden agenda, representing their long-term goals and objectives. Achieving these secret agendas contributes to victory. Players must deduce opponents hidden agendas while strategically pursuing their own without revealing their intentions.</p>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>', '', 'uploads/6565e33665f79__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg', 20, 40, 50, 60, 0, 0, 200.00, 40.00, 160.00, 222.00, 0, 0.00),
(207, 184, 'cosmic conquest', 'Board Games', '1st', '2023-12-02 13:38:31', 28, 1, '123q213213', '<p>qwewqeqwewq</p>', '', 'uploads/656b3347efc28_white.png', 1, 45, 10, 2, 0, 0, 150.00, 30.00, 120.00, 170.00, 1, 0.00);

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
(287, 192, 173, 21, 'uploads/6565ca2cc02f1__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(288, 192, 173, 21, 'uploads/6565ca2cc071b__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(289, 192, 173, 21, 'uploads/6565ca2cc0b0a__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg'),
(290, 192, 173, 21, 'uploads/6565ca2cc0e95__941f3534-9ee5-4fdc-873b-f38a9a3fe625.jpg'),
(291, 193, 174, 21, 'uploads/6565cc856fd22__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(292, 193, 174, 21, 'uploads/6565cc85701bb__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg'),
(293, 193, 174, 21, 'uploads/6565cc8573ab5__941f3534-9ee5-4fdc-873b-f38a9a3fe625.jpg'),
(294, 193, 174, 21, 'uploads/6565cc8573eba__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg'),
(295, 193, 174, 21, 'uploads/6565cc85741ff__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(296, 193, 174, 21, 'uploads/6565cc85747b3__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(297, 193, 174, 21, 'uploads/6565cc8574d02__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(298, 0, 170, 21, 'uploads/6565cc00c40d0__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg'),
(299, 0, 170, 21, 'uploads/6565cc00c44ac__529fbc61-1800-48ee-968b-fb7486c8f7eb.jpg'),
(300, 0, 170, 21, 'uploads/6565cc00c47f0__9f325090-cffe-467a-9e3f-aa65520ed777.jpg'),
(301, 0, 170, 21, 'uploads/6565cc00c4b14__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(302, 0, 171, 21, 'uploads/6565cb6221914__9f325090-cffe-467a-9e3f-aa65520ed777.jpg'),
(303, 0, 171, 21, 'uploads/6565cb6221ce4__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(304, 0, 171, 21, 'uploads/6565cb62228c0__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(305, 0, 172, 21, 'uploads/6565cad2bf3cb__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(306, 0, 172, 21, 'uploads/6565cad2bf821__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(307, 0, 172, 21, 'uploads/6565ce5762a7a__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg'),
(308, 0, 172, 21, 'uploads/6565ce5762f3e__941f3534-9ee5-4fdc-873b-f38a9a3fe625.jpg'),
(309, 0, 172, 21, 'uploads/6565ce5763847__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg'),
(310, 0, 172, 21, 'uploads/6565ce57641ec__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(311, 194, 169, 20, 'uploads/6565cf49e5492__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(312, 194, 169, 20, 'uploads/6565cf49e5bae__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(313, 194, 169, 20, 'uploads/6565cf49e61ff__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(314, 195, 172, 21, 'uploads/6565d6362879a__941f3534-9ee5-4fdc-873b-f38a9a3fe625.jpg'),
(315, 195, 172, 21, 'uploads/6565d63628c2e__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg'),
(316, 195, 172, 21, 'uploads/6565d63629039__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(317, 196, 171, 21, 'uploads/6565d846979d1__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(318, 196, 171, 21, 'uploads/6565d84697d95__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(319, 196, 171, 21, 'uploads/6565d846980f8__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(320, 196, 171, 21, 'uploads/6565d84698761__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(321, 197, 170, 21, 'uploads/6565d906de6fb__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg'),
(322, 197, 170, 21, 'uploads/6565d906dea9f__529fbc61-1800-48ee-968b-fb7486c8f7eb.jpg'),
(323, 197, 170, 21, 'uploads/6565d906dee16__9f325090-cffe-467a-9e3f-aa65520ed777.jpg'),
(324, 197, 170, 21, 'uploads/6565d906e2c61__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(325, 198, 176, 22, 'uploads/6565dd46e8d68__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg'),
(326, 198, 176, 22, 'uploads/6565dd46e9048__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(327, 198, 176, 22, 'uploads/6565dd46e93a7__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(328, 198, 176, 22, 'uploads/6565dd46e965e__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(329, 199, 175, 22, 'uploads/6565dd96f3797__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(330, 199, 175, 22, 'uploads/6565dd96f3a6c__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(331, 199, 175, 22, 'uploads/6565dd96f3cab__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(332, 199, 175, 22, 'uploads/6565dd96f3ff2__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(333, 200, 179, 23, 'uploads/6565e00a68ff6__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(334, 200, 179, 23, 'uploads/6565e00a69419__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(335, 200, 179, 23, 'uploads/6565e00a69774__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(336, 201, 178, 23, 'uploads/6565e04ca27eb__3c36510c-35dd-4bcf-8a0a-3e3bf941228e.jpg'),
(337, 201, 178, 23, 'uploads/6565e04ca723c__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(338, 201, 178, 23, 'uploads/6565e04ca8be0__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(339, 201, 178, 23, 'uploads/6565e04ca93d9__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(340, 201, 178, 23, 'uploads/6565e04caa047__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(341, 201, 178, 23, 'uploads/6565e04caa51f__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(342, 201, 178, 23, 'uploads/6565e04cb1fe9__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(343, 202, 177, 23, 'uploads/6565e080dc048__a5e80bde-510b-45f7-91b6-7181b0de847c.jpg'),
(344, 202, 177, 23, 'uploads/6565e080dc625__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(345, 202, 177, 23, 'uploads/6565e080dcbeb__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(346, 202, 177, 23, 'uploads/6565e080e54cc__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(347, 202, 177, 23, 'uploads/6565e080e58b6__abbdae4d-7e99-42ce-8e38-2d1ba4ca8b82.jpg'),
(348, 202, 177, 23, 'uploads/6565e080e5cbd__941f3534-9ee5-4fdc-873b-f38a9a3fe625.jpg'),
(349, 203, 183, 24, 'uploads/6565e2b699088__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(350, 203, 183, 24, 'uploads/6565e2b6994dc__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(351, 203, 183, 24, 'uploads/6565e2b699932__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(352, 204, 182, 24, 'uploads/6565e2e07cf9f__6bbcd42d-74a9-4033-8aca-4f9e5882aa11.jpg'),
(353, 204, 182, 24, 'uploads/6565e2e07d49e__ea5d8ea7-7151-4e33-beaa-d7e15f2faeb2.jpg'),
(354, 204, 182, 24, 'uploads/6565e2e07d7fd__658b1237-ded8-45b8-88a4-0e0ca4bd376e.jpg'),
(355, 204, 182, 24, 'uploads/6565e2e082a48__d41311cb-85b2-4588-8dba-658b9148d61f.jpg'),
(356, 205, 181, 24, 'uploads/6565e30f60808__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(357, 206, 180, 24, 'uploads/6565e33668be9__dabfdd11-b869-48c6-81d6-6b21c79e4448.jpg'),
(358, 206, 180, 24, 'uploads/6565e33669179__a0c44805-62fa-4578-aa12-db6081ba9243.jpg'),
(359, 206, 180, 24, 'uploads/6565e3366996b__0f38e7f1-5cce-4a34-a1b7-af507b7b8bc8.jpg'),
(360, 207, 184, 28, 'uploads/656b3347efe59_white.png');

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
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_reported` tinyint(4) NOT NULL DEFAULT 0,
  `was_reported` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings_images`
--

CREATE TABLE `ratings_images` (
  `rating_image_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `rating_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings_images`
--

INSERT INTO `ratings_images` (`rating_image_id`, `rating_id`, `rating_image_path`) VALUES
(8, 80, 'assets/comment_assets/6565fc0376ac3_stkr_labs.jpg'),
(10, 80, 'assets/comment_assets/6565fc0377977_paypal_bg.jpg'),
(11, 80, 'assets/comment_assets/65661aca7772b_designing.jpg');

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
(177, 20, 234, 1, 0, '2023-11-28 10:03:23', 0, 1, 1, 0, 20.00, 2.00, NULL),
(178, 21, 239, 1, 0, '2023-11-28 10:41:36', 0, 1, 1, 0, 124.00, 12.40, NULL),
(179, 21, 238, 1, 0, '2023-11-28 10:43:46', 0, 1, 1, 0, 371.00, 37.10, NULL),
(180, 21, 237, 1, 0, '2023-11-28 10:44:59', 0, 1, 1, 0, 173.00, 17.30, NULL),
(181, 21, 236, 1, 0, '2023-11-28 10:46:12', 0, 1, 1, 0, 216.00, 21.60, NULL),
(182, 21, 235, 1, 0, '2023-11-28 10:46:44', 0, 1, 1, 0, 196.00, 19.60, NULL),
(183, 22, 240, 1, 0, '2023-11-28 12:23:04', 0, 1, 1, 0, 93.00, 9.30, NULL),
(184, 22, 241, 1, 0, '2023-11-28 12:25:03', 0, 1, 1, 0, 73.00, 7.30, NULL),
(185, 23, 242, 1, 0, '2023-11-28 12:35:47', 0, 1, 1, 0, 138.00, 13.80, NULL),
(186, 23, 243, 1, 0, '2023-11-28 12:36:45', 0, 1, 1, 0, 91.00, 9.10, NULL),
(187, 23, 244, 1, 0, '2023-11-28 12:37:46', 0, 1, 1, 0, 135.00, 13.50, NULL),
(188, 24, 248, 1, 0, '2023-11-28 12:46:33', 0, 1, 1, 0, 77.00, 7.70, NULL),
(189, 24, 247, 1, 0, '2023-11-28 12:48:13', 0, 1, 1, 0, 41.00, 4.10, NULL),
(190, 24, 246, 1, 0, '2023-11-28 12:48:40', 0, 1, 1, 0, 48.00, 4.80, NULL),
(191, 24, 245, 1, 0, '2023-11-28 12:49:18', 0, 1, 1, 0, 22.00, 2.20, NULL),
(192, 28, 249, 1, 0, '2023-12-02 13:31:25', 0, 1, 1, 0, 20.00, 2.00, NULL),
(193, 20, 250, 0, 1, '2023-12-04 06:40:37', 0, 1, 1, 0, 24.00, 2.40, 25),
(194, 20, 250, 0, 1, '2023-12-04 08:28:31', 0, 1, 1, 0, 24.00, 2.40, 26),
(195, 20, 250, 0, 0, '2023-12-04 08:47:40', 0, 1, 1, 0, 24.00, 2.40, NULL);

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
(49, '2023120213331528', '1234', 'J&T Express', '2023-12-02 13:35:54'),
(50, '2023112813273422', '900909', 'Flash Express', '2023-12-06 07:34:14'),
(51, '2023112811092020', '1234567890', 'JRS Express', '2023-12-06 07:56:42');

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
(1, 1, 'How to Create a Game ', 'asdasdasd asdasdasd asdasd asdasd asd asd asd asd asd asd asd asd d as d asd as dasd asdasda sd asd asd asd asd  a  ds asd asd a sd asd aasdasd', 'https://www.youtube.com/embed/9UgCLYlLh6M?si=Ny6v1BpLaGhCFffw', 1, '2023-09-12 21:31:52', 'create_game'),
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
(20, 'user-11282023-20', 'denzel', 'Denzel', 'Go', '9770257461', 'denzelgo17@gmail.com', '$2y$10$VfBSzTaMBD5mkwEYO0EHaejolQeOhEIYWKk8MlXOzJ/DKCkyhdNAa', '2023-11-28 08:31:38', NULL, 'uploads/avatars/656fad1771fcb__5c2023bf-9cd0-4313-a4ba-cc36c8379301.jpg', NULL, 1, 0, NULL, NULL),
(21, 'user-11282023-21', 'marcus', 'Marcus', 'Dacaymat', '9122164336', 'marcus@gmail.com', '$2y$10$1H.FbaAAuH4KzKj0UCOkPeuqERkSofovOlFnluIUR1bYH2GV4cbfa', '2023-11-28 10:11:08', NULL, NULL, NULL, 1, 0, NULL, NULL),
(22, 'user-11282023-22', 'jenica', 'Jenica', 'Gamboa', '97702574612', 'jenica@gmail.com', '$2y$10$LnDzKmwl4AcgpZPc1huJwuom4qD9WCiy19gRUsh7EluTEuHoPclhW', '2023-11-28 12:22:00', NULL, NULL, NULL, 1, 0, NULL, NULL),
(23, 'user-11282023-23', 'kevin', 'John Kevin', 'Ilagan', '9770257461', 'kevin@gmail.com', '$2y$10$sQUvcY9zVAhYR9FimYPRFOfrgEufmetqxW1cHNShRTT.yeIi9NeXW', '2023-11-28 12:34:30', NULL, NULL, NULL, 1, 0, NULL, NULL),
(24, 'user-11282023-24', 'nicole', 'Nicole', 'Cabal', '9770257461', 'nicole@gmail.com', '$2y$10$XUzQ7JfPOo/Se.QI7K63dOCWxcs0W8JK..1r6Qq0/kerJGHYhus/G', '2023-11-28 12:44:49', NULL, NULL, NULL, 1, 0, NULL, NULL),
(25, 'user-11282023-25', 'danasaur', 'Dana Ricci', 'Singson', '9994347957', 'dana.ricci@gmail.com', '$2y$10$HMDioqHXHhHfWlHQ7HAxU./ZZYB06IxWgO3ibknGs4gwD2b7znwgK', '2023-11-28 16:56:57', NULL, 'uploads/avatars/65661dffc075b_dana.jpg', NULL, 1, 0, NULL, NULL),
(26, 'user-1212023-26', 'user', 'Sample', 'User', '9560527444', 'sampleuser@gmail.com', '$2y$10$mxEOxVV4aQJHyaUGPn8fh.Eaew5CH0QGfhsJ8m.UeTmqpvuILYIAO', '2023-12-01 15:14:11', NULL, 'uploads/avatars/656a0a92efc10_8099273.png', NULL, 1, 0, '1147384341d72932187ab889373d6cb1f31ac467d572af045ab9d365af1307fd', '2023-12-01 16:42:48'),
(27, 'user-1222023-27', 'tantan', 'tristan ley', 'dabucon', '999999', 'tristan@gmail.com', '$2y$10$zuXUTQIzx8T/UNGzJgc6buWd.sNxT1jns.KowfpZ62pz2Q54PEwNi', '2023-12-02 03:00:19', NULL, 'uploads/avatars/656a9ded0d9a2_TA.png', NULL, 1, 0, NULL, NULL),
(28, 'user-1222023-28', 'kevs', 'kevin', 'ilagan', '9263853401', 'kevin@example.com', '$2y$10$gz1c8wMrHPA0LvBkDpZtludWrP0scbIYeMKwhe8FRn14jCg58Ulbq', '2023-12-02 05:26:10', NULL, NULL, NULL, 1, 0, NULL, NULL),
(29, 'user-1222023-29', 'ryan', 'ryan', 'muniz', '9123456789', '123@example.com', '$2y$10$lCOCqhhlmvvxHRR8ydLNRe6u5TIFtMuP3vZdiaeMpyebiPHiNhsRG', '2023-12-02 13:39:15', NULL, NULL, NULL, 1, 0, NULL, NULL);

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
(308, 19, 'login', '2023-11-28 08:29:29'),
(309, 20, 'login', '2023-11-28 08:31:41'),
(310, 20, 'login', '2023-11-28 10:10:16'),
(311, 21, 'login', '2023-11-28 10:11:13'),
(312, 22, 'login', '2023-11-28 12:22:03'),
(313, 23, 'login', '2023-11-28 12:34:34'),
(314, 24, 'login', '2023-11-28 12:44:53'),
(315, 20, 'login', '2023-11-28 13:26:50'),
(316, 20, 'login', '2023-11-28 13:59:23'),
(317, 21, 'login', '2023-11-28 14:41:30'),
(318, 20, 'login', '2023-11-28 15:32:18'),
(319, 25, 'login', '2023-11-28 16:57:02'),
(320, 20, 'login', '2023-11-29 16:06:05'),
(321, 20, 'login', '2023-11-29 21:47:24'),
(322, 20, 'login', '2023-11-30 14:09:59'),
(323, 20, 'login', '2023-12-01 08:48:56'),
(324, 26, 'login', '2023-12-01 16:20:23'),
(325, 26, 'login', '2023-12-01 16:29:22'),
(326, 26, 'login', '2023-12-01 16:29:22'),
(327, 26, 'login', '2023-12-01 16:57:45'),
(328, 26, 'login', '2023-12-02 02:40:03'),
(329, 27, 'login', '2023-12-02 03:00:24'),
(330, 20, 'login', '2023-12-02 03:17:41'),
(331, 28, 'login', '2023-12-02 05:26:17'),
(332, 28, 'login', '2023-12-02 05:27:47'),
(333, 20, 'login', '2023-12-02 08:44:40'),
(334, 29, 'login', '2023-12-02 13:39:32'),
(335, 20, 'login', '2023-12-02 15:07:12'),
(336, 20, 'login', '2023-12-03 12:29:31'),
(337, 20, 'login', '2023-12-03 12:29:31'),
(338, 20, 'login', '2023-12-03 13:01:50'),
(339, 20, 'login', '2023-12-03 15:19:42'),
(340, 28, 'login', '2023-12-04 03:22:41'),
(341, 20, 'login', '2023-12-04 04:39:59'),
(342, 20, 'login', '2023-12-05 23:06:51'),
(343, 22, 'login', '2023-12-05 23:31:39'),
(344, 20, 'login', '2023-12-05 23:31:56'),
(345, 22, 'login', '2023-12-05 23:36:24'),
(346, 28, 'login', '2023-12-06 08:58:53');

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
(413, 20, 'Cash In', '2023-11-28 10:04:59', 'success', 'Paypal', '4NW11762JP717494A', NULL, NULL, NULL, NULL, 'NTAwMA==', NULL, NULL),
(414, 20, 'Pay', '2023-11-28 10:09:20', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023112811092020', 'NjAuNQ==', NULL, NULL),
(415, 21, 'Cash In', '2023-11-28 10:49:47', 'success', 'Paypal', '5KG459640N496574U', NULL, NULL, NULL, NULL, 'MTAwMA==', NULL, NULL),
(416, 21, 'Cash In', '2023-11-28 10:50:14', 'success', 'Paypal', '6MC49229ST059460X', NULL, NULL, NULL, NULL, 'NTAwMA==', NULL, NULL),
(417, 21, 'Pay', '2023-11-28 10:50:26', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023112811502621', 'MTAxNC41', NULL, NULL),
(418, 20, 'Pay', '2023-11-28 14:40:20', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023112815402020', 'MjY0LjU=', NULL, NULL),
(419, 24, 'Profit', '2023-11-28 14:40:36', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTYw', 206, NULL),
(420, 20, 'Pay', '2023-11-30 01:19:12', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023113002191220', 'NDkuNQ==', NULL, NULL),
(421, 20, 'Cash Out', '2023-12-02 04:34:31', 'success', 'Paypal', '', 'jennicajen0803@gmail.com', '2023-12-04 07:46:19', 20.00, NULL, 'MTIw', NULL, NULL),
(422, 28, 'Cash In', '2023-12-02 13:28:24', 'success', 'Paypal', '7G409513696908324', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(423, 28, 'Cash In', '2023-12-02 13:28:33', 'success', 'Paypal', '009613031N087691H', NULL, NULL, NULL, NULL, 'NTAw', NULL, NULL),
(424, 28, 'Cash In', '2023-12-02 13:28:48', 'success', 'Paypal', '0XF44525BK376971B', NULL, NULL, NULL, NULL, 'MTAw', NULL, NULL),
(425, 20, 'Pay', '2023-12-04 06:40:56', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120406405620', 'Mi40', NULL, NULL),
(426, 20, 'Pay', '2023-12-04 08:28:57', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120408285720', 'OTE2Ljk=', NULL, NULL),
(427, 20, 'Pay', '2023-12-04 08:47:54', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120408475420', 'Mi40', NULL, NULL),
(428, 20, 'Pay', '2023-12-05 23:32:29', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120600322920', 'MjE1LjU=', NULL, NULL),
(429, 22, 'Profit', '2023-12-05 23:35:50', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODA=', 198, NULL),
(430, 22, 'Cash In', '2023-12-06 05:32:37', 'success', 'Paypal', '77D29091VY3487533', NULL, NULL, NULL, NULL, 'NTAwMA==', NULL, NULL),
(431, 22, 'Pay', '2023-12-06 05:32:53', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120606325322', 'NDg2LjU=', NULL, NULL),
(432, 22, 'Cancel', '2023-12-06 05:35:07', 'success', NULL, NULL, NULL, NULL, NULL, '2023120606325322', 'NDQ0', 206, 'Don\'t want to buy anymore'),
(433, 22, 'Pay', '2023-12-06 05:39:19', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120606391922', 'MjY0LjU=', NULL, NULL),
(434, 22, 'Cancel', '2023-12-06 05:39:33', 'success', NULL, NULL, NULL, NULL, NULL, '2023120606391922', 'MjIy', 206, 'Need to change delivery address'),
(435, 22, 'Cash Out', '2023-12-06 05:43:44', 'success', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', '2023-12-06 05:44:57', 20.00, NULL, 'MjIw', NULL, NULL),
(436, 22, 'Cash Out', '2023-12-06 05:46:49', 'pending', 'Paypal', '', 'sb-i4hyn27575086@business.example.com', NULL, 20.00, NULL, 'NjA=', NULL, NULL),
(437, 22, 'Pay', '2023-12-06 07:02:49', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120608024922', 'MTA4My41', NULL, NULL),
(438, 22, 'Pay', '2023-12-06 08:02:54', 'success', 'STKR Wallet Pay', NULL, NULL, NULL, NULL, '2023120609025422', 'MjM4Ni41', NULL, NULL),
(439, 22, 'Profit', '2023-12-06 08:03:05', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTI4MA==', 199, NULL),
(440, 21, 'Profit', '2023-12-06 08:06:59', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'MTIzMjA=', 197, NULL),
(441, 24, 'Profit', '2023-12-06 08:07:04', 'success', NULL, NULL, NULL, NULL, NULL, NULL, 'ODAw', 204, NULL);

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
-- Indexes for table `ratings_images`
--
ALTER TABLE `ratings_images`
  ADD PRIMARY KEY (`rating_image_id`);

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
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=646;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989;

--
-- AUTO_INCREMENT for table `built_games`
--
ALTER TABLE `built_games`
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `cancel_order_reasons`
--
ALTER TABLE `cancel_order_reasons`
  MODIFY `cancel_order_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1093;

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
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `component_category`
--
ALTER TABLE `component_category`
  MODIFY `component_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `component_colors`
--
ALTER TABLE `component_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `component_templates`
--
ALTER TABLE `component_templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `constants`
--
ALTER TABLE `constants`
  MODIFY `constant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `denied_approve_game_requests`
--
ALTER TABLE `denied_approve_game_requests`
  MODIFY `denied_approve_game_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `denied_publish_requests`
--
ALTER TABLE `denied_publish_requests`
  MODIFY `denied_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `denied_update_publish_requests`
--
ALTER TABLE `denied_update_publish_requests`
  MODIFY `denied_update_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `games_reasons`
--
ALTER TABLE `games_reasons`
  MODIFY `games_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `index_banner`
--
ALTER TABLE `index_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `markup_percentage`
--
ALTER TABLE `markup_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=614;

--
-- AUTO_INCREMENT for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `pending_published_built_games`
--
ALTER TABLE `pending_published_built_games`
  MODIFY `pending_published_built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  MODIFY `pending_published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  MODIFY `pending_update_published_built_games_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  MODIFY `pending_update_published_multiple_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `published_built_games`
--
ALTER TABLE `published_built_games`
  MODIFY `published_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  MODIFY `published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `ratings_images`
--
ALTER TABLE `ratings_images`
  MODIFY `rating_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `to_deliver`
--
ALTER TABLE `to_deliver`
  MODIFY `to_deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `user_review_response`
--
ALTER TABLE `user_review_response`
  MODIFY `user_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `wallet_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

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
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
