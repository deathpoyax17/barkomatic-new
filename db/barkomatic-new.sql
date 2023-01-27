-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 02:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barkomatic-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `accomodation_id` int(30) NOT NULL,
  `ferry_id` int(20) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `price` int(12) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ferries`
--

CREATE TABLE `ferries` (
  `ferry_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacity` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL,
  `alt_passenger_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_info` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `plan_id` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `ticket_id` int(100) NOT NULL,
  `passenger_id` int(100) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `paypent_amount` int(100) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_type` enum('subscription','ticket') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `alt_passenger_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `departure_port` varchar(100) NOT NULL,
  `arrival_port` varchar(100) NOT NULL,
  `ferry_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `route_id` int(100) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ship_owners`
--

CREATE TABLE `ship_owners` (
  `owner_id` int(11) NOT NULL,
  `ship_name` varchar(100) DEFAULT NULL,
  `name` int(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_info` int(100) NOT NULL,
  `plan_id` int(100) DEFAULT NULL,
  `alt_owner_id` int(100) NOT NULL,
  `stats` int(11) NOT NULL,
  `ship_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ship_owners`
--

INSERT INTO `ship_owners` (`owner_id`, `ship_name`, `name`, `address`, `email`, `contact_info`, `plan_id`, `alt_owner_id`, `stats`, `ship_logo`) VALUES
(1, 'TestShip', 0, 'TestShip', 'TestShip@gmail.com', 0, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `alt_staff_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mid_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `contact_info` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_description` text NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`plan_id`, `plan_name`, `plan_description`, `price`) VALUES
(1, 'VIP', 'VIP', 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger`
--

CREATE TABLE `tbl_passenger` (
  `alt_passenger_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_onwer_account`
--

CREATE TABLE `tbl_ship_onwer_account` (
  `alt_owner_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ship_onwer_account`
--

INSERT INTO `tbl_ship_onwer_account` (`alt_owner_id`, `username`, `password`) VALUES
(1, 'TestShip', 'a67b688a59622d1d50645bb7f05a30f3243abae9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_account`
--

CREATE TABLE `tbl_staff_account` (
  `alt_staff_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `schedule_id` int(100) NOT NULL,
  `passenger_id` int(100) NOT NULL,
  `accomodation_id` int(100) NOT NULL,
  `alt_owner_id` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `availability` enum('reservation','Not Available','Available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`accomodation_id`),
  ADD UNIQUE KEY `ferry_id` (`ferry_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ferries`
--
ALTER TABLE `ferries`
  ADD PRIMARY KEY (`ferry_id`),
  ADD UNIQUE KEY `owner_id` (`owner_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`),
  ADD UNIQUE KEY `alt_passenger_id` (`alt_passenger_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `plan_id` (`plan_id`),
  ADD UNIQUE KEY `owner_id` (`owner_id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alt_passenger_id` (`alt_passenger_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`),
  ADD UNIQUE KEY `ferry_id` (`ferry_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD UNIQUE KEY `route_id` (`route_id`);

--
-- Indexes for table `ship_owners`
--
ALTER TABLE `ship_owners`
  ADD PRIMARY KEY (`owner_id`),
  ADD UNIQUE KEY `alt_owner_id` (`alt_owner_id`),
  ADD UNIQUE KEY `plan_id` (`plan_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `owner_id` (`owner_id`),
  ADD UNIQUE KEY `alt_staff_id` (`alt_staff_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_passenger`
--
ALTER TABLE `tbl_passenger`
  ADD PRIMARY KEY (`alt_passenger_id`);

--
-- Indexes for table `tbl_ship_onwer_account`
--
ALTER TABLE `tbl_ship_onwer_account`
  ADD PRIMARY KEY (`alt_owner_id`);

--
-- Indexes for table `tbl_staff_account`
--
ALTER TABLE `tbl_staff_account`
  ADD PRIMARY KEY (`alt_staff_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`),
  ADD UNIQUE KEY `accomodation_id` (`accomodation_id`),
  ADD UNIQUE KEY `alt_owner_id` (`alt_owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `accomodation_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ferries`
--
ALTER TABLE `ferries`
  MODIFY `ferry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ship_owners`
--
ALTER TABLE `ship_owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_passenger`
--
ALTER TABLE `tbl_passenger`
  MODIFY `alt_passenger_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ship_onwer_account`
--
ALTER TABLE `tbl_ship_onwer_account`
  MODIFY `alt_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff_account`
--
ALTER TABLE `tbl_staff_account`
  MODIFY `alt_staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD CONSTRAINT `accommodations_ibfk_1` FOREIGN KEY (`ferry_id`) REFERENCES `ferries` (`ferry_id`);

--
-- Constraints for table `ferries`
--
ALTER TABLE `ferries`
  ADD CONSTRAINT `ferries_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `ship_owners` (`owner_id`);

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`alt_passenger_id`) REFERENCES `tbl_passenger` (`alt_passenger_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `ship_owners` (`owner_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`plan_id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`),
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`alt_passenger_id`) REFERENCES `passengers` (`alt_passenger_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`);

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`ferry_id`) REFERENCES `ferries` (`ferry_id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`);

--
-- Constraints for table `ship_owners`
--
ALTER TABLE `ship_owners`
  ADD CONSTRAINT `ship_owners_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`plan_id`),
  ADD CONSTRAINT `ship_owners_ibfk_2` FOREIGN KEY (`alt_owner_id`) REFERENCES `tbl_ship_onwer_account` (`alt_owner_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `ship_owners` (`owner_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`alt_staff_id`) REFERENCES `tbl_staff_account` (`alt_staff_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`accomodation_id`) REFERENCES `accommodations` (`accomodation_id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`alt_owner_id`) REFERENCES `tbl_ship_onwer_account` (`alt_owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;