-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 03:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orangetoolz`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanbanboards`
--

CREATE TABLE `kanbanboards` (
  `id` int(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kanbanboards`
--

INSERT INTO `kanbanboards` (`id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rabiul islam', 3, '2022-10-05 07:03:56', '2022-10-05 07:03:56'),
(2, 'orangetoolz', 3, '2022-10-05 07:04:29', '2022-10-05 07:04:29'),
(3, 'this is rabiul islam', 1, '2022-10-05 07:06:00', '2022-10-05 07:06:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanbanboards`
--
ALTER TABLE `kanbanboards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanbanboards`
--
ALTER TABLE `kanbanboards`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
