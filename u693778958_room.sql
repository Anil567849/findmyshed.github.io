-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2022 at 07:48 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u693778958_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `s_no` int(255) NOT NULL,
  `room_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_phone_number` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `method` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`s_no`, `room_id`, `owner_id`, `owner_name`, `owner_phone_number`, `user_id`, `user_name`, `user_phone_number`, `method`, `date`) VALUES
(432, 130, 32, 'Baldev', '7018348115', 27, 'anil', '8894805830', 'Call', '2021-10-03 20:07:59'),
(433, 0, 0, '', '', 31, 'kishan joshi', '8219409922', 'Call', '2021-12-27 06:10:06'),
(434, 130, 32, 'Baldev', '7018348115', 31, 'kishan joshi', '8219409922', 'Whats App', '2021-12-27 06:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `owner_room`
--

CREATE TABLE `owner_room` (
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `room_owner_name` varchar(255) NOT NULL,
  `room_set` varchar(255) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_address` text NOT NULL,
  `room_village` varchar(255) NOT NULL,
  `room_kitchen` varchar(255) NOT NULL,
  `room_toilet` varchar(255) NOT NULL,
  `owner_phone_number` varchar(255) NOT NULL,
  `room_publish_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_room`
--

INSERT INTO `owner_room` (`room_id`, `owner_id`, `room_owner_name`, `room_set`, `room_price`, `room_address`, `room_village`, `room_kitchen`, `room_toilet`, `owner_phone_number`, `room_publish_date`) VALUES
(130, 32, 'Baldev', 'Single', 2500, 'Sarwari near bus stand', 'Sarwari', 'Yes', 'Inside', '7018348115', '2021-09-19 08:18:07'),
(131, 32, 'Baldev Singh', 'Single', 2500, 'Kullu near bus stand', 'Sarwari', 'Yes', 'Inside', '7018348115', '2021-09-19 08:18:46'),
(132, 32, 'Anil', 'Four', 25000, 'Near dhalpur chalk kullu', 'Devdar', 'Yes', 'Inside', '7018348115', '2021-09-19 08:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `owner_signup`
--

CREATE TABLE `owner_signup` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_email_address` varchar(255) NOT NULL,
  `owner_phone_number` varchar(255) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  `owner_state` varchar(255) NOT NULL,
  `owner_district` varchar(255) NOT NULL,
  `owner_city` varchar(255) NOT NULL,
  `owner_pincode` varchar(255) NOT NULL,
  `onwer_home_address` text NOT NULL,
  `owner_landmark` varchar(255) NOT NULL,
  `owner_signup_time` datetime NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_signup`
--

INSERT INTO `owner_signup` (`owner_id`, `owner_name`, `owner_email_address`, `owner_phone_number`, `owner_password`, `owner_state`, `owner_district`, `owner_city`, `owner_pincode`, `onwer_home_address`, `owner_landmark`, `owner_signup_time`, `reset_token`, `reset_token_expire`) VALUES
(32, 'Anil', 'anilkumar567849@gmail.com', '7018348115', '$2y$10$ueYeYJC5WKIai68F1jQn6OPoVhzQx6AG92aLa/zWbixg7EQ2GBgO6', 'Himachal Pradesh', 'Kullu', 'Kullu', '175131', '', '', '2021-08-08 18:46:27', '1ac79a2ad205adc5c8a769d74c3b8473', '2021-10-01'),
(34, 'thisisgsrana', 'gsrs2002@gmail.com', '+918350890419', '$2y$10$jmsE/cKZWJPakuD5VTGhCODaJgU0Z30nVnZA5OPtfowTb7J8LXJoq', 'Himachal Pradesh', 'Kullu', 'Manali', '175103', '', '', '2021-09-17 14:56:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email_address` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_signup_time` datetime NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`user_id`, `user_name`, `user_email_address`, `user_phone_number`, `user_password`, `user_signup_time`, `reset_token`, `reset_token_expire`) VALUES
(27, 'anil', 'anilkumar567849@gmail.com', '8894805830', '$2y$10$OuAgWe5qENqNqJGgf639keUlS.3HkdJRQ7Miia/C4HUUnhi2z6yNS', '2021-08-08 17:41:58', '0e87140d086be91c0d86c1c2c8487352', '2021-10-01'),
(29, 'thisisgsrana', 'gsrs2002@gmail.com', '+918350890419', '$2y$10$frf7oVR5HIBFsivaiYMhxOXKPbYy7cO8tMM2MjERGkBbnVJ19/DBG', '2021-09-17 14:03:17', NULL, NULL),
(31, 'kishan joshi', 'krishanj788@gmail.com', '8219409922', '$2y$10$nNvol06rn/vbwWUvP1eW2eptKmJO2cUF/MYdwAVDqNTSgQSEEyari', '2021-12-27 06:09:55', NULL, NULL),
(32, 'upcarz.com bbbdnwkdowifhrdokpwoeiyutrieowsowddfbvksodkasofjgiekwskfieghrhjkfejfegigofwkdkbhbgiejfwokdd', 'dimafokin199506780tx+03w1@inbox.ru', '86929134955', '$2y$10$Oekxf90VEDyErRhzPA4uLeBXq071pS.Sl/5ldZ4d6F6SPdxOBRqq6', '2022-02-01 21:24:49', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `owner_room`
--
ALTER TABLE `owner_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `owner_signup`
--
ALTER TABLE `owner_signup`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `owner_room`
--
ALTER TABLE `owner_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `owner_signup`
--
ALTER TABLE `owner_signup`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
