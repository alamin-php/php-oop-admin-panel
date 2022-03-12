-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2022 at 04:35 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '3',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `password`, `details`, `image`, `role`, `status`, `created_at`) VALUES
(6, 'Al Amin Sarker', 'admin', 'alamin.php100@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here.', 'upload/5731823e3e.png', 0, 0, '2022-03-12 15:40:23'),
(14, 'Asfiyah Jannat Orin', 'orin', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 1, 0, '2022-03-12 16:08:11'),
(15, 'Mehedi Al Emran Tushar', 'mehedi', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 2, 0, '2022-03-12 16:08:22'),
(16, 'Imam Hassan', 'imam', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 3, 0, '2022-03-12 16:08:34'),
(17, 'Polash Miah', 'polash', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 1, 0, '2022-03-12 16:08:48'),
(18, 'Tuha Chowdhoury', 'tuha', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 2, 0, '2022-03-12 16:09:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
