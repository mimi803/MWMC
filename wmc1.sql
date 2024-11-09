-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 09:52 AM
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
-- Database: `wmc1`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectordetails`
--

CREATE TABLE `collectordetails` (
  `collector_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_info` varchar(255) DEFAULT NULL,
  `collection_route` text DEFAULT NULL,
  `total_collected_waste` decimal(10,2) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collectordetails`
--

INSERT INTO `collectordetails` (`collector_id`, `user_id`, `vehicle_info`, `collection_route`, `total_collected_waste`, `request_id`) VALUES
(3, 14, 'kby 557p', 'kimbo ruiru', 123.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumerdetails`
--

CREATE TABLE `consumerdetails` (
  `consumer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `purchase_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consumerdetails`
--

INSERT INTO `consumerdetails` (`consumer_id`, `user_id`, `purchase_history`) VALUES
(4, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contributordetails`
--

CREATE TABLE `contributordetails` (
  `contributor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contributordetails`
--

INSERT INTO `contributordetails` (`contributor_id`, `user_id`) VALUES
(2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturerdetails`
--

CREATE TABLE `manufacturerdetails` (
  `manufacturer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `processing_capacity` decimal(10,2) DEFAULT NULL,
  `products_made` enum('biogas','artwork','electricity') DEFAULT NULL,
  `sustainability_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturerdetails`
--

INSERT INTO `manufacturerdetails` (`manufacturer_id`, `user_id`, `processing_capacity`, `products_made`, `sustainability_rating`) VALUES
(1, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification_type` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  `read_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `notification_type`, `message`, `sent_date`, `read_status`) VALUES
(4, 11, NULL, NULL, NULL, 0),
(5, 12, NULL, NULL, NULL, 0),
(6, 13, NULL, NULL, NULL, 0),
(7, 14, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `consumer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Processing','Shipped','Delivered') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `consumer_id`, `order_date`, `total_amount`, `status`) VALUES
(4, NULL, '2024-11-08 16:26:36', 90.02, 'Pending'),
(5, 4, '2024-11-08 16:28:29', 12.00, 'Pending'),
(6, 4, '2024-11-08 16:28:31', 12.00, 'Pending'),
(7, 4, '2024-11-08 16:46:59', 34.00, 'Pending'),
(8, 4, '2024-11-08 16:54:53', 66.01, 'Processing'),
(9, 4, '2024-11-08 16:57:06', 45.02, 'Pending'),
(10, 4, '2024-11-08 23:00:33', 100.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quality` enum('Biogas (kgs)','Art Work','Electricity (kW)') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `product_quality`) VALUES
(1, 4, 1, 'Electricity (kW)'),
(5, 8, 5, ''),
(6, 9, 6, ''),
(7, 10, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_requests`
--

CREATE TABLE `pickup_requests` (
  `request_id` int(11) NOT NULL,
  `contributor_id` int(11) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `pickup_address` varchar(255) DEFAULT NULL,
  `waste_type` varchar(50) DEFAULT NULL,
  `waste_amount` decimal(10,2) DEFAULT NULL,
  `request_status` enum('pending','accepted','completed','canceled') DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_type` enum('Biogas','Art Work','Electricity') DEFAULT NULL,
  `subscription` enum('Weekly','Monthly','Yearly') DEFAULT NULL,
  `fixed_price` decimal(10,2) DEFAULT NULL COMMENT 'Fixed price for subscriptions',
  `unit_of_measure` enum('kgs','kW','open') DEFAULT NULL COMMENT 'Units for Biogas, Electricity, or Art Work',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `subscription`, `fixed_price`, `unit_of_measure`, `created_at`) VALUES
(1, 'Biogas', 'Weekly', 90.02, 'kgs', '2024-11-08 16:26:36'),
(2, 'Biogas', 'Weekly', 12.00, 'kgs', '2024-11-08 16:28:29'),
(5, 'Art Work', 'Weekly', 66.01, '', '2024-11-08 16:54:53'),
(6, 'Electricity', 'Yearly', 45.02, 'kW', '2024-11-08 16:57:06'),
(7, 'Electricity', 'Monthly', 100.00, 'kW', '2024-11-08 23:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_ratings`
--

CREATE TABLE `reviews_ratings` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `target_user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews_ratings`
--

INSERT INTO `reviews_ratings` (`review_id`, `user_id`, `target_user_id`, `rating`, `review_text`, `review_date`) VALUES
(2, 11, NULL, NULL, NULL, NULL),
(3, 12, NULL, NULL, NULL, NULL),
(4, 13, NULL, NULL, NULL, NULL),
(5, 14, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Contributor','Collector','Manufacturer','Consumer') DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role`, `contact_info`, `location`) VALUES
(11, 'john doe', 'doe@gmail.com', '$2y$10$SML78cOc0BL8tl6IdMc34uak/gkEzgi6YqwosM1O4Ei54Xq18J6nq', 'Consumer', '0712345678', 'jkuat exit'),
(12, 'joshua nyamberi ', 'joshua@gmail.com', '$2y$10$ZC1SMeJlVfYHqgnEVQLDUetBrXIhG1odtgPlDtw0HY0ZPPMA14yhm', 'Manufacturer', '07567689022', 'kisii'),
(13, 'Mwene', 'muchiribrianchiri@gmail.com', '$2y$10$4ouxrIWb88IywKlRJm7qUeS5tyKPj9LIPELsWNLdAwkx5UyXKgmYi', 'Contributor', '0717350160', 'k road'),
(14, 'muchiri', 'brian.kang\'ethe@students.piu.ac.ke', '$2y$10$DdWp94Bk6btWOT.OuuI7O.BD03CnTSLFeJzC6SaNIVPtX1nZ.DL7m', 'Collector', '07567689022', 'Ruiru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collectordetails`
--
ALTER TABLE `collectordetails`
  ADD PRIMARY KEY (`collector_id`),
  ADD UNIQUE KEY `uq_request_id` (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `consumerdetails`
--
ALTER TABLE `consumerdetails`
  ADD PRIMARY KEY (`consumer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contributordetails`
--
ALTER TABLE `contributordetails`
  ADD PRIMARY KEY (`contributor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `manufacturerdetails`
--
ALTER TABLE `manufacturerdetails`
  ADD PRIMARY KEY (`manufacturer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `consumer_id` (`consumer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `contributor_id` (`contributor_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `target_user_id` (`target_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collectordetails`
--
ALTER TABLE `collectordetails`
  MODIFY `collector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consumerdetails`
--
ALTER TABLE `consumerdetails`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contributordetails`
--
ALTER TABLE `contributordetails`
  MODIFY `contributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturerdetails`
--
ALTER TABLE `manufacturerdetails`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collectordetails`
--
ALTER TABLE `collectordetails`
  ADD CONSTRAINT `collectordetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `consumerdetails`
--
ALTER TABLE `consumerdetails`
  ADD CONSTRAINT `consumerdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `contributordetails`
--
ALTER TABLE `contributordetails`
  ADD CONSTRAINT `contributordetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `manufacturerdetails`
--
ALTER TABLE `manufacturerdetails`
  ADD CONSTRAINT `manufacturerdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`consumer_id`) REFERENCES `consumerdetails` (`consumer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  ADD CONSTRAINT `fk_pickup_requests_collectordetails` FOREIGN KEY (`request_id`) REFERENCES `collectordetails` (`request_id`),
  ADD CONSTRAINT `pickup_requests_ibfk_1` FOREIGN KEY (`contributor_id`) REFERENCES `contributordetails` (`contributor_id`);

--
-- Constraints for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  ADD CONSTRAINT `reviews_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `reviews_ratings_ibfk_2` FOREIGN KEY (`target_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
