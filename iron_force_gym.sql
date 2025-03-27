-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 05:03 AM
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
-- Database: `iron_force_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `role` enum('Admin','Manager','Supervisor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `phone`, `role`) VALUES
('Admin', 'admin123@gmail.com', 'Admin123', 1234567890, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `MembershipStatus` enum('Active','Expired','Suspended','') NOT NULL DEFAULT 'Active',
  `JoinDate` date DEFAULT NULL,
  `status` enum('Active','Block','','') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`FirstName`, `LastName`, `email`, `password`, `phone`, `gender`, `dob`, `address`, `MembershipStatus`, `JoinDate`, `status`) VALUES
('Makwana', 'Arun', 'arun123@gmail.com', '12345678', 1234567890, 'male', '2025-04-01', 'a:5:{s:12:\"house-number\";s:2:\"29\";s:9:\"apartment\";s:12:\"Hanumannagar\";s:5:\"suite\";s:12:\"Central Jail\";s:4:\"city\";s:9:\"Ahmedabad\";s:7:\"pincode\";s:6:\"382480\";}', '', '0000-00-00', ''),
('Dainik', 'Makwana', 'dainikmakwana31@gmail.com', '12345678', 1234567890, 'male', '0000-00-00', '', '', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `MemberID` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `membership_type` enum('Class drop-in','12 Month unlimited','6 Month unlimited','') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Active','Expired','Suspended','') NOT NULL DEFAULT 'Active',
  `membership_fee` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `goal` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `medical_condition` varchar(200) DEFAULT NULL,
  `experience` varchar(50) NOT NULL,
  `plan_duration` varchar(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `timing` enum('Morning (6AM-12PM)','Evening (4PM-10PM)','Anytime','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`MemberID`, `email`, `membership_type`, `start_date`, `end_date`, `status`, `membership_fee`, `created_at`, `updated_at`, `goal`, `weight`, `height`, `medical_condition`, `experience`, `plan_duration`, `payment_type`, `timing`) VALUES
(1000, 'dainikmakwana31@gmail.com', '12 Month unlimited', '2025-03-27', '2026-03-26', 'Active', 8500.00, '2025-03-27 00:42:17', '2025-03-27 00:42:17', 'weight-loss', 60, 170, 'xbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'beginner', '12 Months', 'Razorpay', 'Morning (6AM-12PM)');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `MemberID` bigint(10) NOT NULL,
  `Message` text NOT NULL,
  `NotificationDate` datetime NOT NULL,
  `status` enum('Read','Unread','','') NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `MemberID`, `Message`, `NotificationDate`, `status`) VALUES
(1001, 1000, 'Your membership renewal is due in 7 days. Visit the front desk to renew.', '2023-12-15 09:30:00', 'Unread'),
(1002, 1000, 'Congratulations! You have achieved your 50th workout this month. Keep up the great work!', '2023-12-14 18:15:00', 'Read'),
(1003, 1000, 'New yoga classes added to the schedule. Check the app to book your spot.', '2023-12-14 10:00:00', 'Unread'),
(1004, 1000, 'Your personal training session with Coach Mike is confirmed for tomorrow at 5:30 PM.', '2023-12-13 16:45:00', 'Unread'),
(1005, 1000, 'Gym will be closed on December 25th for Christmas. Plan your workouts accordingly.', '2023-12-12 11:20:00', 'Unread'),
(1006, 1000, 'Your body composition scan results are ready. View them in your member portal.', '2023-12-11 14:10:00', 'Unread'),
(1007, 1000, 'You have 3 unused personal training sessions expiring at the end of the month.', '2023-12-10 08:00:00', 'Unread'),
(1008, 1000, '1277', '0000-00-00 00:00:00', 'Unread'),
(1009, 1000, 'Happy Birthday! Enjoy a free smoothie at the juice bar today.', '2023-12-08 00:01:00', 'Unread'),
(1010, 1000, 'Your check-in at 7:15 AM has earned you 50 loyalty points. Current total: 1,250 points.', '2023-12-07 07:30:00', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`TrainerID`, `FirstName`, `LastName`, `Specialization`, `Phone`, `img`) VALUES
(1000, 'John', 'Carter', 'Strength Training, Powerlifting', NULL, 'trainer-1.jpeg'),
(1001, 'Sarah', 'Mitchell', 'HIIT, Functional Fitness', NULL, 'trainer2.jpeg'),
(1002, 'Mike', 'Rodriguez', 'Bodybuilding, Aesthetics', NULL, 'trainer3.jpeg'),
(1003, 'Emily', 'Davis', 'Yoga & Mobility', NULL, 'trainer4.jpeg'),
(1004, 'David', 'Park', 'MMA & Combat Fitness', NULL, 'trainer5.jpeg'),
(1005, 'Jessica', 'Lopez', 'Weight Loss & Nutrition Coaching', NULL, 'trainer6.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`TrainerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `MemberID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
