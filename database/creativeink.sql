-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2016 at 12:06 PM
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
(1, 'Sucat', 'Sucat, Parañaque City'),
(2, 'La Huerta', 'La Huerta');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Clothes', '2016-03-30 10:05:25', '0000-00-00 00:00:00'),
(2, 'Mug', '2016-03-12 08:33:49', '0000-00-00 00:00:00'),
(3, 'Bag', '2016-02-27 07:26:54', '0000-00-00 00:00:00'),
(11, 'Prints', '2016-03-06 06:50:01', '0000-00-00 00:00:00'),
(12, 'Umbrella', '2016-03-12 08:34:04', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(30, 1, '1oF22ScghQj9QvQEkA9f', '2016-04-02 07:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `tr_id`, `pr_id`, `item_quantity`) VALUES
(1, 'S6V4MOE2rMz', 3, 11),
(2, 'dBk8Isjk8J3', 4, 25);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `cat_id`, `pr_name`, `pr_quantity`, `pr_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'plain generic poloshirt w/ 1-color silkscreen print', 15, 100, '2016-04-02 07:33:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 'Big Canvas/ Katcha bags', 104, 20, '2016-03-26 09:12:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 11, 'Computerized Logo', 51, 180, '2016-03-26 09:13:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 11, 'Business Card', 170, 180, '2016-03-26 09:13:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 11, 'Small Silkscreen Print', 10, 12.75, '2016-03-26 09:14:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Customized Shirt', 50, 250, '2016-03-28 12:33:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'DRESS', 10, 200, '2016-03-30 01:36:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'DRESS Small 12x5', 2, 12, '2016-03-30 09:47:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'DRESS Medium 12x15', 5, 15, '2016-03-30 09:47:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tr_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `tr_details` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tr_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tr_id`, `user_id`, `cu_id`, `br_id`, `tr_details`, `total`, `tr_at`) VALUES
('dBk8Isjk8J3', 11, 0, 2, '', '4500', '2016-04-02 09:21:51'),
('S6V4MOE2rMz', 9, 0, 1, '', '1980', '2016-04-02 09:20:55');

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
(8, 'Baby Anne', 'Lutap', 'babyanne', 'babyanne@gmail.com', '832fffb6f80ba56424734b88c85f78e1', '2', 1, 2, '2016-04-02 06:01:07', '2016-04-02 06:01:07', '2016-04-02 06:01:07'),
(9, 'Jamir', 'Medina', 'jamir', 'jamir@gmail.com', 'c6f2088059e98c3da5e0f1529e915d09', '1', 1, 3, '2016-04-02 06:04:03', '2016-04-02 06:04:03', '2016-04-02 06:04:03'),
(10, 'Armand', 'Navarro', 'armand', 'armand@yahoo.com', 'd138f04ec7016a21acc2ae19ddc708bc', '1', 2, 2, '2016-03-31 05:00:48', '2016-03-31 05:00:48', '2016-03-31 05:00:48'),
(11, 'Gab', 'Perez', 'gab', 'gab@yahoo.com', '639bee393eecbc62256936a8e64d17b1', '1', 2, 3, '2016-03-27 23:56:47', '2016-03-27 23:56:47', '2016-03-27 23:56:47'),
(12, 'Kristine', 'Rose', 'krose', 'krose@yahoo.com', '34259bb17ed44affeaa8e4ba4352bb0b', '2', 2, 3, '2016-03-27 23:49:22', '2016-03-27 23:49:22', '2016-03-27 23:49:22');

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
  ADD PRIMARY KEY (`br_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emailreset`
--
ALTER TABLE `emailreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
