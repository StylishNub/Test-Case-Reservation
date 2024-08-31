-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 03:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logik`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `comments` text DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `reservation_id`, `approver_id`, `status`, `comments`, `approved_at`) VALUES
(1, 6, 6, 'Pending', '', NULL),
(2, 7, 6, 'Pending', '', NULL),
(3, 8, 6, 'Pending', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ujang', '123123', NULL, '2024-08-27 05:11:17', '2024-08-27 05:11:17'),
(2, 'maman', '123123123', NULL, '2024-08-27 10:16:27', '2024-08-27 10:16:27'),
(3, 'aan', '123123', NULL, '2024-08-27 12:05:53', '2024-08-27 12:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `address`, `created_at`) VALUES
(1, 'Kalimantan Utara', 'Jalan Yaman Timur', '2024-08-26 23:06:50'),
(2, 'Bandar Lampung', 'Jalan Selat Sunda Kampung Teluk Semangka', '2024-08-27 10:35:21'),
(3, 'Malang', 'Blimbing malang', '2024-08-28 01:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `approval_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `reservation_date` date NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `purpose` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `vehicle_id`, `admin_id`, `driver_name`, `approval_id`, `status`, `reservation_date`, `start_date`, `end_date`, `purpose`, `created_at`) VALUES
(6, 1, 1, 'ujang', 6, 'Accepted', '2024-08-21', '2024-08-28 00:21:00', '2024-08-31 00:21:00', 'asdasd', '2024-08-27 17:21:31'),
(7, 2, 1, 'maman', 6, 'Rejected', '2024-08-22', '2024-08-28 01:02:00', '2024-08-31 01:02:00', 'kjhghg', '2024-08-27 18:02:56'),
(8, 3, 1, 'aan', 6, 'Accepted', '2024-08-28', '2024-08-28 08:39:00', '2024-08-31 08:39:00', 'asdasd', '2024-08-28 01:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'user', 'user@gmail.com', 'user', 'user'),
(5, 'coba', 'coba@gmail.com', 'coba', 'manager'),
(6, 'approval', 'approval@gmail.com', 'aa', 'approval');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `last_service_date` date DEFAULT NULL,
  `next_service_date` date DEFAULT NULL,
  `fuel_consumption` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `registration_number`, `type`, `ownership`, `fuel_type`, `region_id`, `last_service_date`, `next_service_date`, `fuel_consumption`, `created_at`) VALUES
(1, 'B 1234 XYZ', 'Truk', 'Perusahaan', 'Solar', 1, '2024-08-01', '2024-08-27', '10.00', '2024-08-26 23:26:56'),
(2, 'BE 1231 ABC', 'Sedan', 'Pemerintah', 'Solar', 2, '2024-08-01', '2024-08-31', '20.00', '2024-08-27 10:36:49'),
(3, 'N 1232 BHBH', 'fuso', 'Perusahaan', 'Pertalite', 3, '2024-08-14', '2024-08-29', '10.00', '2024-08-28 01:39:12'),
(4, 'BE 1231 ABD', 'Sedan', 'Perusahaan', 'Pertalite', 2, '2024-08-28', '2024-08-30', '10.00', '2024-08-28 03:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `approval_id` (`approval_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `approval_ibfk_2` FOREIGN KEY (`approver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`approval_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
