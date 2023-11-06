-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 10:12 AM
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
  `wallet_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_user_id`, `username`, `firstname`, `lastname`, `phone_number`, `email`, `password`, `created_at`, `shipping_address`, `avatar`, `wallet_amount`) VALUES
(3, 'user-1132023-3', 'denzel', 'Denzel', 'Go', '09770257461', 'denzelgo17@gmail.com', '$2y$10$ARZ0Q6SNMcoKJIvaaiGwZeb/T0EtfPk9HMj.XvGnVgdcMYL8ZkwKa', '2023-08-02 09:11:37', 'asd', 'uploads/avatars/6533443489d0c_wp7687177-desktop-hd-gaming-wallpapers.jpg', NULL),
(8, 'user-1132023-8', 'jennica', 'Jenica', 'Gamboa', '09770257461', 'jennica@gmail.com', '$2y$10$WJlhPmUz0xTn8wUpTbDB/eVIbApu/Pnz8m8.Ypk6XCFROFCjw.xZ6', '2023-08-30 05:19:12', NULL, NULL, '0.00'),
(10, 'user-1132023-10', 'nicole', 'Nicole', 'Cabal', '09770257461', 'nicole@gmail.com', '$2y$10$P7TNqwoCy7jqry07RZOiye1j3lzNocu5d1e1NDR89BM8fpsmYgOGi', '2023-09-27 04:35:55', NULL, NULL, '9657.8'),
(30, 'user-1132023-30', 'faufau', 'Fauline', 'Go', '09770257461', 'faufaufau@gmail.com', '$2y$10$nHqBkEXI7FW9D38ox8Rf.OOz3y0BOAerwFfA6aJ.SLOGNJ9/ugPIm', '2023-11-03 07:19:38', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
