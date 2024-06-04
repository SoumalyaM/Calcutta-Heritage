-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calcutta heritage`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `attraction_id` int(2) NOT NULL,
  `attraction_name` varchar(255) NOT NULL,
  `attraction_description` varchar(255) NOT NULL,
  `attraction_image_url` text NOT NULL,
  `attraction_opening_hour` int(2) NOT NULL,
  `attraction_ticket_price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`attraction_id`, `attraction_name`, `attraction_description`, `attraction_image_url`, `attraction_opening_hour`, `attraction_ticket_price`) VALUES
(19, ' Park Street Cemetery', 'This is dummy description', 'ksp_4824-2.webp', 10, 10),
(20, 'Birla Planetarium', 'This is dummy description', 'home_hero-1024x683.jpg', 10, 40),
(21, 'Victoria Memorial', 'This is dummy description', 'victoria-memorial-kolkata-entry-fee-timings-holidays-reviews-header.jpg', 10, 20),
(22, 'St. Paul\'s Cathedral Church', 'This is dummy description', 'stpaulscathedral.jpg', 10, 10),
(24, 'Indian Meuseum', 'This is dummy description', 'banner2.jpg', 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `user_type` int(4) NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attraction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `attraction_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
