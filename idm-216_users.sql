-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2025 at 03:23 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojk25_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `idm-216_users`
--

CREATE TABLE `idm-216_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `idm-216_users`
--

INSERT INTO `idm-216_users` (`id`, `firstname`, `lastname`, `username`, `password`, `created_at`) VALUES
(2, 'Olivia', 'Knestaut', 'ojk25@drexel.edu', '$2y$10$cGWLHjJkKhhpNAOi/qPF1OdXBgpya1GMepYIwlzoXYPHMUmWh6/dW', '2025-01-21 01:37:14'),
(3, 'aaron', 'knestaut', 'aaronknestaut@gmail.com', '$2y$10$t0W4DkEBK21HzTBITIS9weWlDaz.50HFh4k2VkiJbrm3R4dDPr9zm', '2025-01-21 04:04:17'),
(4, 'Hannah', 'Desmond', 'hdesmond913@gmail.com', '$2y$10$lm7N8qI0nzDjbuX90DhpcOaQXzueERx31tVTNi.pYePRBtPRNIFLC', '2025-01-21 04:49:20'),
(5, 'Jervis', 'Thompson', 'jervo@mac.com', '$2y$10$mqoim59bIlzibVZU3iVfUuTPXxJxec6K/jZJCK79L0jtDGZ7j0OPi', '2025-01-21 11:55:43'),
(6, 'Amy', 'Au', 'aa4644@drexel.edu', '$2y$10$YdI.COiWkEWWObT0TvQJb.uRLTYyoo6yo/nqbf7xDHSQ.MNbLKhue', '2025-01-21 14:24:12'),
(7, 'Vy', 'Le', 'vpl26@drexel.edu', '$2y$10$hEX2lviRha6LGkkErgZu9uhJDKbLT.6ULNayMF3Vdnj8FonAn0VMi', '2025-01-21 14:34:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm-216_users`
--
ALTER TABLE `idm-216_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm-216_users`
--
ALTER TABLE `idm-216_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
