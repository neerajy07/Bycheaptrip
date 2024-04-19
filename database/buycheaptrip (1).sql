-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 01:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buycheaptrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `image`, `account_name`, `username`, `password`) VALUES
(1, 'Buycheaptrip-logo.png', 'Administrator', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `image`) VALUES
(1, 'bg-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Noida'),
(2, 'Lucknow'),
(3, 'Sultanpur'),
(4, 'Kanpur'),
(5, 'Ayodhya');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `address_1` varchar(500) NOT NULL,
  `address_2` varchar(500) NOT NULL,
  `address_3` varchar(500) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `address_1`, `address_2`, `address_3`, `mobile`, `email`, `web`) VALUES
(1, 'Reg. Office - 5/324 Viram Khand-5', 'Gomati Nagar Lucknow', ' Uttar Pradesh-226010', '7887031889', ' info@apmleeducational.com', 'ampleeducationalsociety.org');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hcity_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hcity_id`) VALUES
(1, 'taj hotel', 1),
(10, 'Delhi Hotels', 3),
(12, 'hotel 1', 5),
(13, 'Noida Hotel', 2),
(14, 'BMDU hoteks', 4),
(15, 'manish hotel', 1),
(16, 'Satyam Hotel', 1),
(17, 'dlf mall', 1),
(18, 'hotel 2', 5),
(19, 'hotel 3', 5),
(20, 'hotel', 2),
(21, 'Lucknow hotel', 2),
(22, 'Lucknow hotel 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `hcategory_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `hc_id` int(10) NOT NULL,
  `prices` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`hcategory_id`, `category_name`, `hc_id`, `prices`) VALUES
(2, 'Economy1', 1, 15000),
(17, 'VIP', 1, 15000),
(18, 'Economy', 1, 1500),
(19, 'Economy', 15, 100),
(20, 'Super DLX', 1, 10000),
(21, 'Economy', 12, 1000),
(22, 'Economy1', 18, 1500),
(23, 'Economy', 19, 750),
(24, 'Economy', 20, 2099),
(25, 'VIP', 12, 2000),
(26, 'Economy', 19, 200),
(27, 'VIP', 19, 300);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(1, 'MANISH2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sightseeing`
--

CREATE TABLE `sightseeing` (
  `sight_id` int(11) NOT NULL,
  `sight_name` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `tsight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sightseeing`
--

INSERT INTO `sightseeing` (`sight_id`, `sight_name`, `prices`, `tsight_id`) VALUES
(1, 'rever Front2', 1520, 1),
(4, 'rever Front2', 15000, 3),
(5, 'rever Front3', 150000, 4),
(6, 'rever Front2', 200, 1),
(7, 'rever Front3', 300, 1),
(8, 'rever Front2', 3000, 2),
(9, 'rever Front3', 150, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thailand_customers`
--

CREATE TABLE `thailand_customers` (
  `cust_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `reff_id` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pax` int(20) NOT NULL,
  `package_inr` double NOT NULL,
  `persion_inr` double NOT NULL,
  `travel_date` varchar(50) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','cancel','confirm','') NOT NULL DEFAULT 'pending',
  `account_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_customers`
--

INSERT INTO `thailand_customers` (`cust_id`, `customer_name`, `reff_id`, `email`, `phone`, `pax`, `package_inr`, `persion_inr`, `travel_date`, `create_date`, `status`, `account_id`) VALUES
(85, 'manish', 'BCT892579', 'satyam@gmail.com', '9454969296', 1, 18190, 18190, '2024-04-21', '2024-04-19', 'pending', ''),
(86, 'manish', 'BCT266119', 'solutionkey@gmail.com', '9454969296', 2, 48000, 24000, '2024-04-27', '2024-04-19', 'pending', ''),
(87, 'Sydney Russell', 'BCT720272', 'qohe@mailinator.com', '22', 3, 0, 0, '1974-06-27', '2024-04-19', 'pending', ''),
(88, 'Jemima Collier', 'BCT225342', 'fakymeca@mailinator.com', '4', 5, 0, 0, '1999-02-13', '2024-04-19', 'pending', 'jay@gmail.com'),
(89, 'manish', 'BCT811781', 'manish01.bmdu@gmail.com', '9454969296', 2, 20450, 10225, '2024-04-23', '2024-04-19', 'pending', 'manish@gmail.com'),
(90, 'pankaj', 'BCT928409', 'pankaj@gmail.com', '9876543210', 2, 7600, 3800, '2024-10-06', '2024-04-19', 'pending', 'manish@gmail.com'),
(91, 'vinod', 'BCT056305', 'vinod@gmail.com', '6393805011', 2, 4550, 2275, '2024-04-27', '2024-04-19', 'pending', 'manish@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_hotel`
--

CREATE TABLE `thailand_hotel` (
  `thailand_hotel_id` int(11) NOT NULL,
  `hotelcity_name` varchar(100) NOT NULL,
  `hotels` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `rooms` int(100) NOT NULL,
  `nights` int(100) NOT NULL,
  `ex_adults` varchar(100) DEFAULT NULL,
  `refer_id` varchar(50) NOT NULL,
  `prices` double DEFAULT NULL,
  `reff_id` varchar(20) NOT NULL,
  `hotel_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hotelCheckinDate` varchar(100) NOT NULL,
  `account_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_hotel`
--

INSERT INTO `thailand_hotel` (`thailand_hotel_id`, `hotelcity_name`, `hotels`, `category_name`, `rooms`, `nights`, `ex_adults`, `refer_id`, `prices`, `reff_id`, `hotel_date`, `hotelCheckinDate`, `account_id`) VALUES
(252, '5', '12', '2000', 1, 1, '0', '', NULL, '', '2024-04-19 15:45:07', '2024-04-21', NULL),
(253, '1', '15', '100', 1, 1, '1', '', NULL, '', '2024-04-19 15:45:07', '2024-04-23', NULL),
(254, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT266119', '2024-04-19 15:40:53', '2024-04-27', NULL),
(255, '1', '1', '15000', 1, 2, '1', '', NULL, 'BCT266119', '2024-04-19 15:40:53', '2024-04-28', NULL),
(256, '2', '20', '2000', 1, 1, '0', '', NULL, 'BCT811781', '2024-04-19 16:02:33', '2024-04-23', 'manish@gmail.com'),
(257, '1', '1', '1500', 2, 2, '1', '', NULL, 'BCT811781', '2024-04-19 16:02:33', '2024-04-25', 'manish@gmail.com'),
(258, '2', '20', '2000', 1, 1, '0', '', NULL, 'BCT928409', '2024-04-19 16:20:05', '2024-10-06', 'manish@gmail.com'),
(259, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT928409', '2024-04-19 16:20:05', '2024-10-07', 'manish@gmail.com'),
(260, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT056305', '2024-04-19 22:51:23', '2024-04-27', 'manish@gmail.com'),
(261, '1', '15', '100', 1, 1, '1', '', NULL, 'BCT056305', '2024-04-19 22:51:23', '2024-04-28', 'manish@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_sightseeing`
--

CREATE TABLE `thailand_sightseeing` (
  `thailand_sight_id` int(255) NOT NULL,
  `sight_city` varchar(255) NOT NULL,
  `sightseeing` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `sight_persion` varchar(255) NOT NULL,
  `sightCheckinDate` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `reff_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_sightseeing`
--

INSERT INTO `thailand_sightseeing` (`thailand_sight_id`, `sight_city`, `sightseeing`, `prices`, `sight_persion`, `sightCheckinDate`, `refer_id`, `account_id`, `reff_id`) VALUES
(164, '2', '3000', '', '1', '2024-04-21', '', NULL, ''),
(165, '1', '1520', '', '2', '2024-04-21', '', NULL, ''),
(166, '1', '200', '', '1', '2024-04-27', '', NULL, 'BCT266119'),
(167, '1', '200', '', '1', '2024-04-27', '', NULL, 'BCT266119'),
(168, '1', '200', '', '1', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(169, '2', '150', '', '2', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(170, '1', '300', '', '4', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(171, '1', '200', '', '1', '2024-10-06', '', 'manish@gmail.com', 'BCT928409'),
(172, '2', '150', '', '2', '2024-10-08', '', 'manish@gmail.com', 'BCT928409'),
(173, '2', '150', '', '1', '2024-04-27', '', 'manish@gmail.com', 'BCT056305'),
(174, '2', '150', '', '1', '2024-04-28', '', 'manish@gmail.com', 'BCT056305');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_transport`
--

CREATE TABLE `thailand_transport` (
  `thailand_transport_id` int(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `transport_city` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `transCheckinDate` varchar(100) DEFAULT NULL,
  `account_id` varchar(100) DEFAULT NULL,
  `trans_pax` varchar(100) NOT NULL,
  `reff_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_transport`
--

INSERT INTO `thailand_transport` (`thailand_transport_id`, `transport`, `prices`, `transport_city`, `refer_id`, `transCheckinDate`, `account_id`, `trans_pax`, `reff_id`) VALUES
(191, '3', '', '1', '', '', NULL, '5000', ''),
(192, '4', '', '1', '', '', NULL, '5000', ''),
(193, '4', '', '1', '', '2024-04-27', NULL, '5000', 'BCT266119'),
(194, '3', '', '1', '', '2024-04-30', NULL, '5000', 'BCT266119'),
(195, '4', '', '1', '', '2024-04-23', 'manish@gmail.com', '5000', 'BCT811781'),
(196, '3', '', '1', '', '2024-04-25', 'manish@gmail.com', '5000', 'BCT811781'),
(197, '4', '', '1', '', '2024-10-06', 'manish@gmail.com', '5000', 'BCT928409'),
(198, '3', '', '1', '', '2024-04-27', 'manish@gmail.com', '2000', 'BCT056305'),
(199, '3', '', '1', '', '2024-04-28', 'manish@gmail.com', '2000', 'BCT056305');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `trans_id` int(11) NOT NULL,
  `transport_name` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `tcity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`trans_id`, `transport_name`, `prices`, `tcity_id`) VALUES
(1, '01 Way Taxi From Phuket to Krabi Hotel', 2000, 1),
(3, '01 Way Taxi From Phuket Airport to Krabi Hotel', 2000, 1),
(4, '01Why Taxi From Phuket Airport to Kharabi Hotel', 1500, 1),
(5, 'Lucknow to Airport', 150, 2),
(6, 'Airport to Lucknow ', 200, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transport_category`
--

CREATE TABLE `transport_category` (
  `tranport_cat_id` int(11) NOT NULL,
  `transport_category` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `transref_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_category`
--

INSERT INTO `transport_category` (`tranport_cat_id`, `transport_category`, `prices`, `transref_id`) VALUES
(2, '1-8PAX', 5000, 3),
(3, '1-10 Pax', 5000, 3),
(4, '1-3PAX', 2000, 3),
(5, '1-3PAX', 200, 5),
(6, '1-8PAX', 400, 5),
(7, '1-10 Pax', 500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created_at` varchar(1000) NOT NULL DEFAULT current_timestamp(),
  `delete_at` varchar(255) NOT NULL,
  `status` enum('active','pending','reject','inactive') DEFAULT 'pending',
  `feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `email`, `password`, `created_at`, `delete_at`, `status`, `feedback`) VALUES
(15, 'Jai', 'male', '9454969291', 'jay@gmail.com', '123456', '2024-03-28 18:50:22', '', 'active', 'good user'),
(16, 'Manish', 'male', '9454969290', 'manish@gmail.com', '12345', '2024-03-29 12:32:14', '', 'active', NULL),
(17, 'Manish', 'male', '9454969298', 'manish1@gmail.com', '123456', '2024-03-29 12:33:59', '', 'reject', 'not carrect user'),
(18, 'Manish', 'male', '9454969250', 'manish12@gmail.com', '123456', '2024-03-29 12:35:19', '', 'pending', NULL),
(19, 'Keegan Macias', 'male', '9876543210', 'tara@mailinator.com', '123456', '2024-04-01 11:00:01', '', 'pending', NULL),
(20, 'Bo Floyd', 'male', '9876542030', 'cevygamor@mailinator.com', '123456', '2024-04-01 11:01:35', '', 'pending', NULL),
(21, 'Bo Floyd', 'male', '9876542031', 'cevygamor1@mailinator.com', '123456', '2024-04-01 11:03:23', '', 'pending', 'not verify');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`hcategory_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sightseeing`
--
ALTER TABLE `sightseeing`
  ADD PRIMARY KEY (`sight_id`);

--
-- Indexes for table `thailand_customers`
--
ALTER TABLE `thailand_customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `reff_id` (`reff_id`);

--
-- Indexes for table `thailand_hotel`
--
ALTER TABLE `thailand_hotel`
  ADD PRIMARY KEY (`thailand_hotel_id`);

--
-- Indexes for table `thailand_sightseeing`
--
ALTER TABLE `thailand_sightseeing`
  ADD PRIMARY KEY (`thailand_sight_id`);

--
-- Indexes for table `thailand_transport`
--
ALTER TABLE `thailand_transport`
  ADD PRIMARY KEY (`thailand_transport_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `transport_category`
--
ALTER TABLE `transport_category`
  ADD PRIMARY KEY (`tranport_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `hcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sightseeing`
--
ALTER TABLE `sightseeing`
  MODIFY `sight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thailand_customers`
--
ALTER TABLE `thailand_customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `thailand_hotel`
--
ALTER TABLE `thailand_hotel`
  MODIFY `thailand_hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `thailand_sightseeing`
--
ALTER TABLE `thailand_sightseeing`
  MODIFY `thailand_sight_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `thailand_transport`
--
ALTER TABLE `thailand_transport`
  MODIFY `thailand_transport_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transport_category`
--
ALTER TABLE `transport_category`
  MODIFY `tranport_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
