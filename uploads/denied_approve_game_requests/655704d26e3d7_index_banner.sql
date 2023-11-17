-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 05:24 PM
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
-- Database: `stkrhub_db`
--

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
(5, 'Lol of Legends Banner', 'img/banner/banner1.png', 1),
(6, 'pokemon', 'img/banner/655266943fdb7_denzuu.jpg', 0),
(7, 'lololol', 'img/banner/65526a49569bb_370064902_1047390753058144_8702064772698236928_n.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `index_banner`
--
ALTER TABLE `index_banner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `index_banner`
--
ALTER TABLE `index_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
