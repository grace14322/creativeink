-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2016 at 03:40 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativeink`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `br_id` int(11) NOT NULL,
  `br_name` varchar(100) NOT NULL,
  `br_address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `br_name`, `br_address`) VALUES
(1, 'Sucat', '8159 Dr A. Santos Ave, San Dionisio, Sucat, Parañaque, 1700 Metro Manila'),
(2, 'La Huerta', '0475 Quirino avenue, La huerta, 1700 Parañaque, Philippines, Metro manila');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `created_at`, `updated_at`) VALUES
(13, 'Clothes', '2016-04-06 01:56:28', '0000-00-00 00:00:00'),
(14, 'Bag', '2016-04-06 01:56:39', '0000-00-00 00:00:00'),
(15, 'Mug', '2016-04-06 01:59:30', '0000-00-00 00:00:00'),
(16, 'Umbrella', '2016-04-06 02:01:02', '0000-00-00 00:00:00'),
(17, 'Prints', '2016-04-06 02:01:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cu_id` int(11) NOT NULL,
  `cu_firstname` varchar(100) NOT NULL,
  `cu_lastname` varchar(100) NOT NULL,
  `cu_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emailreset`
--

CREATE TABLE IF NOT EXISTS `emailreset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailreset`
--

INSERT INTO `emailreset` (`id`, `user_id`, `email_slug`, `created_at`) VALUES
(1, 9, 'lgGe8nMv5SyXzc5MqlXJ', '2016-03-27 18:22:50'),
(2, 9, 'a78FDxOjGBOF9iJro4DR', '2016-03-27 18:23:45'),
(4, 9, 'gVaC5inYIaSBt0KLfMB9', '2016-03-27 18:35:11'),
(6, 9, 'n5REjnyNNViZab9ri8KR', '2016-03-27 18:38:52'),
(8, 9, 'tTuUZEOlMQskP48cAr5P', '2016-03-27 18:41:36'),
(11, 9, 've9vDsY32giKyDIix2kV', '2016-03-27 18:44:30'),
(12, 9, 'rCzllwvLIjrGwz6reoIR', '2016-03-27 18:44:35'),
(13, 9, 'OrJlJj1M9CMWpP73kUBQ', '2016-03-27 18:44:40'),
(14, 9, 'Oo0jJDbDYJY9ZLzJKlJI', '2016-03-27 18:44:45'),
(16, 9, 'JyEVTZ3IIJ9W9oGWG4Qy', '2016-03-27 18:45:44'),
(20, 8, '3KOYNBPb5ISqhw3Wd2Xr', '2016-03-27 23:50:58'),
(21, 1, 'akDYq1TCFMj57tQYtrYm', '2016-03-28 09:33:11'),
(23, 8, 'Jj78YYuXUM8vxiK9kEzI', '2016-03-28 09:39:31'),
(24, 1, 'fYiX9H1UPEW5YcvAPbH0', '2016-03-28 09:48:18'),
(25, 1, 'EEmUADHSl8j9eBjV70iW', '2016-03-30 01:45:59'),
(26, 8, 'nUhuP4eX6zi8EvGSru7v', '2016-03-30 11:45:35'),
(27, 8, 'WBPS9rvku6oIXacm1K88', '2016-03-30 11:47:07'),
(29, 8, '0zgOOp1OS9E6MvubDFn0', '2016-04-02 06:55:38'),
(30, 1, '1oF22ScghQj9QvQEkA9f', '2016-04-02 07:13:35'),
(31, 8, 'srZaScaV1WrQZTDSnL6v', '2016-04-05 03:46:12'),
(32, 8, 'bWwhyLt5ck6COXTXDxOI', '2016-04-05 10:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `tr_id`, `pr_id`, `item_quantity`) VALUES
(14, 'DUZWajVryRw', 13, 20),
(15, 'DUZWajVryRw', 10, 20),
(16, 'F1klk7UaV2y', 14, 50),
(17, 'J4vAwPJRvPr', 15, 20),
(18, 'J89R1omH4JB', 18, 10),
(19, 'aK8q0n4XpPv', 21, 100),
(20, 'L6pUXkYf7MT', 14, 20),
(21, 'WHgq0hI936v', 18, 20),
(22, 'sKWPW4sFNdl', 17, 10),
(23, 'vnCPaT7qpTK', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pr_id` int(11) NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `pr_quantity` int(11) NOT NULL,
  `pr_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `cat_id`, `pr_name`, `pr_quantity`, `pr_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 17, 'Silkscreen Print-small', 100, 50, '2016-04-08 09:28:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 17, 'Silkscreen Print-Medium', 100, 100, '2016-04-06 02:03:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 17, 'Silkscreen Print-Large', 100, 150, '2016-04-06 02:03:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 'Plain Generic Polo Shirt-Small', 100, 200, '2016-04-06 02:04:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 13, 'Customized Polo Shirt Uniform- Small', 100, 300, '2016-04-06 02:07:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 13, 'Customized Polo Shirt Uniform- Medium', 100, 400, '2016-04-06 02:07:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 14, 'Canvas Bag Plain', 100, 150, '2016-04-06 02:08:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 14, 'Canvas Bag w/ full color Print', 100, 200, '2016-04-06 02:09:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 15, 'Magic mug w/ customized design', 100, 150, '2016-04-06 02:11:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 15, 'Plain Mug', 100, 50, '2016-04-06 02:11:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 13, 'Safety Long Sleeves-Free Size', 100, 300, '2016-04-06 02:14:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 17, 'Business Card', 200, 50, '2016-04-06 02:15:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tr_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tr_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tr_id`, `user_id`, `cu_id`, `br_id`, `total`, `tr_at`) VALUES
('aK8q0n4XpPv', 9, 0, 1, '5000', '2016-03-01 02:22:48'),
('DUZWajVryRw', 9, 0, 1, '5000', '2016-04-06 02:17:08'),
('F1klk7UaV2y', 9, 0, 1, '15000', '2016-02-01 02:18:59'),
('J4vAwPJRvPr', 11, 0, 2, '8000', '2016-02-01 02:19:51'),
('J89R1omH4JB', 12, 0, 2, '1500', '2016-03-01 02:22:10'),
('L6pUXkYf7MT', 9, 0, 1, '6000', '2016-01-01 02:26:07'),
('sKWPW4sFNdl', 9, 0, 1, '2000', '2016-04-05 02:37:40'),
('vnCPaT7qpTK', 12, 0, 2, '400', '2016-04-08 08:09:15'),
('WHgq0hI936v', 11, 0, 2, '3000', '2016-04-06 02:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `br_id` int(10) unsigned DEFAULT NULL,
  `ustype_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`, `br_id`, `ustype_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Grace ', 'Braganza', 'grace14322', 'grace14322@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', '2', 1, 1, '2016-04-02 07:19:55', '2016-04-02 07:19:55', '2016-04-02 07:19:55'),
(8, 'Baby Anne', 'Lutap', 'babyanne', 'babyanne@gmail.com', 'a21810a01d3fe0df4291d7d3e7abbd1c', '2', 1, 2, '2016-04-05 03:29:31', '2016-04-05 03:29:31', '2016-04-05 03:29:31'),
(9, 'Jamir', 'Medina', 'jamir', 'jamir@gmail.com', 'c6f2088059e98c3da5e0f1529e915d09', '1', 1, 3, '2016-04-02 06:04:03', '2016-04-02 06:04:03', '2016-04-02 06:04:03'),
(10, 'Armand', 'Navarro', 'armand', 'armand@yahoo.com', 'd138f04ec7016a21acc2ae19ddc708bc', '1', 2, 2, '2016-03-31 05:00:48', '2016-03-31 05:00:48', '2016-03-31 05:00:48'),
(11, 'Gab', 'Perez', 'gab', 'gab@yahoo.com', '639bee393eecbc62256936a8e64d17b1', '1', 2, 3, '2016-03-27 23:56:47', '2016-03-27 23:56:47', '2016-03-27 23:56:47'),
(12, 'Kristine', 'Robedillo', 'kristine', 'kristine@yahoo.com', '002f48e213c339f5d1d839185dcc8e7f', '2', 2, 3, '2016-04-08 08:27:12', '2016-04-08 08:27:12', '2016-04-08 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `ustype_id` int(11) NOT NULL,
  `ustype_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ustype_id`, `ustype_name`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`br_id`),
  ADD UNIQUE KEY `br_address` (`br_address`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `emailreset`
--
ALTER TABLE `emailreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_4` (`username`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_4` (`email`),
  ADD KEY `username_3` (`username`),
  ADD KEY `email_3` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ustype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emailreset`
--
ALTER TABLE `emailreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ustype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
