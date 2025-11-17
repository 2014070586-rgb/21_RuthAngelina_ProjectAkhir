-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2025 at 01:29 PM
-- Server version: 8.0.43
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `nomor_kamar` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_kamar` enum('Standard','Deluxe','Family suite') COLLATE utf8mb4_general_ci NOT NULL,
  `bed_size` enum('Single','Double','Queen','King') COLLATE utf8mb4_general_ci NOT NULL,
  `max_occupancy` int NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `status` enum('Available','Occupied','Maintenance','Cleaning') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`nomor_kamar`, `tipe_kamar`, `bed_size`, `max_occupancy`, `price_per_night`, `status`) VALUES
('A0001', 'Standard', 'Single', 2, 1000000.00, 'Available'),
('A0002', 'Deluxe', 'Double', 4, 2000000.00, 'Available'),
('A0003', 'Family suite', 'Double', 4, 2000000.00, 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `Full_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sebagai` enum('Owner','Admin') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`Full_name`, `username`, `password`, `email`, `sebagai`) VALUES
('bb', 'Budi001', '$2y$10$aYsw8eBOhIpNY9RzEp.KSeX2kSEqyQcKth/2BDt.1X1tgBjKWMwhS', 'Budi27@gmail.com', 'Admin'),
('cc', 'caca290', '$2y$10$dsb4eBcGt22jWOVVgOManewqHvfw2eXcc5Fyu//K7ggdaY9TeNPHe', 'caca29@gmail.com', 'Admin'),
('dd', 'ddddd', '$2y$10$GjfZpKpW5DTAhLy0aFsm8.tMjQgv447qz83BBpjD5dFgW8kDrKy0e', 'dd@gmail.com', 'Admin'),
('aa', 'Raide27', '$2y$10$U7mAoDfewSwBxF2uZgAv/ea.VIGKqbW4B9iK0RXfD9egmmg9dkD1a', 'ruthangelina28@gmail.com', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`nomor_kamar`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
