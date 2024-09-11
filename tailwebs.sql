-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 12:25 PM
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
-- Database: `tailwebs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'jaiswarrahul66@gmail.com', '2622df862a151244bcaa3c6a80c67e8a', '2024-09-11 02:53:20', '2024-09-11 15:40:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `subject`, `marks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'umesh', 'maths', '56', '2024-09-10 16:34:32', '2024-09-11 15:54:42', NULL),
(2, 'umesh', 'science', '55', '2024-09-10 17:27:19', '2024-09-11 15:54:48', NULL),
(3, 'rahul', 'history', '65', '2024-09-10 17:28:17', '2024-09-11 15:54:51', NULL),
(5, 'yash', 'history', '98', '2024-09-10 17:30:29', '2024-09-11 15:54:54', NULL),
(6, 'yash', 'science', '85', '2024-09-10 17:30:42', '2024-09-11 15:54:58', NULL),
(7, 'pooja', 'Commerce', '23', '2024-09-10 18:28:31', '2024-09-11 15:55:00', NULL),
(8, 'deepak', 'history', '46', '2024-09-10 18:28:52', '2024-09-11 15:55:03', NULL),
(9, 'dharam', 'economics', '55', '2024-09-10 18:29:03', '2024-09-11 15:55:05', NULL),
(10, 'umesh', 'civics', '65', '2024-09-10 18:29:16', '2024-09-11 15:55:09', NULL),
(11, 'rahul', 'civics', '88', '2024-09-10 18:29:28', '2024-09-11 02:43:46', NULL),
(12, 'kajal', 'history', '65', '2024-09-10 18:29:37', '2024-09-11 15:55:12', NULL),
(14, 'kajal', 'science', '45', '2024-09-11 02:41:12', '2024-09-11 15:55:15', NULL),
(15, 'jay yadav', 'maths', '44', '2024-09-11 14:35:42', '2024-09-11 15:55:18', NULL),
(16, 'kamlesh yadav', 'science', '35', '2024-09-11 15:38:22', '2024-09-11 15:38:34', NULL),
(17, 'pooja jadhav', 'science', '25', '2024-09-11 15:39:04', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
