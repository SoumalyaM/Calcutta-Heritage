-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:06 AM
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
(19, ' Park Street Cemetery', 'This is dummy description', 'ksp_4824-2.webp', 10, 60),
(20, 'Birla Planetarium', 'This is dummy description', 'home_hero-1024x683.jpg', 10, 70),
(21, 'Victoria Memorial', 'This is dummy description', 'victoria-memorial-kolkata-entry-fee-timings-holidays-reviews-header.jpg', 10, 80),
(22, 'St. Paul\'s Cathedral Church', 'This is dummy description', 'stpaulscathedral.jpg', 10, 90),
(24, 'Indian Meuseum', 'This is dummy description', 'banner2.jpg', 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `payment_customer_id` int(10) NOT NULL,
  `payment_customer_name` varchar(255) NOT NULL,
  `payment_token` varchar(255) NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_attraction_name` varchar(255) NOT NULL,
  `ticket_date` varchar(20) NOT NULL,
  `ticket_url` text NOT NULL,
  `ticket_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_customer_id`, `payment_customer_name`, `payment_token`, `payment_amount`, `payment_date`, `payment_attraction_name`, `ticket_date`, `ticket_url`, `ticket_id`) VALUES
(13, 56, 'test1', 'tok_1POvMn01dKe8QDzvyyljf7dl', 100, '2024-06-07 05:29:39', 'Indian Meuseum', '01/06/2024', 'tickets/Indian Meuseum1717738179.png', 'g1cRnl'),
(17, 56, 'test1', 'tok_1POvvt01dKe8QDzvYncspFhz', 80, '2024-06-07 06:05:52', 'Victoria Memorial', '19/06/2024', 'tickets/Victoria Memorial1717740352.png', 'WemAal');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `user_image`, `email`, `phone_number`, `password_hash`, `user_type`, `create_time`) VALUES
(56, 'test1', 'test1', '', 'test1@test.com', 123456789, '$2y$10$69hellomotherfucker69uctR5y9PDolnAn0qmkLYfFRfHhZgnSEa', 0, '2024-06-06 11:55:20'),
(57, 'test2', 'test2', '', 'test2@test.com', 45678, '$2y$10$69hellomotherfucker69uctR5y9PDolnAn0qmkLYfFRfHhZgnSEa', 0, '2024-06-06 12:00:14'),
(58, 'test3', 'test3', '', 'test3@test.com', 978697834, '$2y$10$69hellomotherfucker69uctR5y9PDolnAn0qmkLYfFRfHhZgnSEa', 0, '2024-06-06 12:01:14'),
(59, 'test4', 'test4', '', 'test4@test.com', 5467651681, '$2y$10$69hellomotherfucker69uctR5y9PDolnAn0qmkLYfFRfHhZgnSEa', 0, '2024-06-06 12:30:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attraction_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
