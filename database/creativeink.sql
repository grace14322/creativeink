-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 05:20 AM
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
  `br_address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `br_name`, `br_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sucat', '8159 Dr A. Santos Ave, San Dionisio, Sucat, Parañaque, 1700 Metro Manila', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'La Huerta', '0475 Quirino avenue, La huerta, 1700 Parañaque, Philippines, Metro manila', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Clothes', '2016-04-06 01:56:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Bag', '2016-04-06 01:56:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Mug', '2016-04-06 01:59:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Umbrella', '2016-04-06 02:01:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Prints', '2016-04-06 02:01:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
(32, 8, 'bWwhyLt5ck6COXTXDxOI', '2016-04-05 10:22:51'),
(33, 1, '7xY6XoCUj6172CLrspX5', '2016-04-12 02:48:58'),
(34, 1, 'rscLkdyIXEEEEgyMhYSP', '2016-04-12 02:49:18'),
(35, 1, 'mmOD8pT9riJ250V2sZyn', '2016-04-12 02:49:54'),
(36, 1, 'NEgR8f7tWJZzbFBvkb98', '2016-04-12 03:00:53'),
(37, 1, 'lRnLHNugnAdZPjLK1zRU', '2016-04-12 03:01:19'),
(38, 1, 'qB5dP32XWMp2CLPabsoy', '2016-04-14 03:43:49'),
(39, 1, 'uQFVSnKuc2gZNihCv6o6', '2016-04-14 03:44:00'),
(40, 1, 'FWGF8MM1f5KoRPcvitdy', '2016-04-14 03:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

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
(23, 'vnCPaT7qpTK', 13, 2),
(24, 'zAh1chAbgir', 21, 1),
(25, 'aczeun18eBV', 14, 1),
(26, 'NS4vTSNSsBm', 11, 5),
(27, 'NS4vTSNSsBm', 17, 5),
(28, 'GNUM2L2ayQI', 10, 5),
(29, 'QKFNdJj78YY', 14, 2),
(30, 'klVp8FCVv5a', 14, 2),
(31, 'MjH10za4ihO', 14, 5),
(32, 'MjH10za4ihO', 14, 1),
(33, 'MjH10za4ihO', 15, 9),
(34, 'MjH10za4ihO', 10, 2),
(35, 'MjH10za4ihO', 20, 3),
(36, 'he0k2Ar04wo', 14, 4),
(37, 'he0k2Ar04wo', 19, 3),
(38, 'he0k2Ar04wo', 13, 8),
(39, 'Jv7uljBmryy', 15, 2),
(40, '4YCpXMvcPFx', 14, 2),
(41, 'ugaZLYrwQ2O', 14, 2),
(42, '8S8ejzgdUTi', 14, 1),
(43, 'LcywzN5gf7L', 13, 2),
(44, '5h4CK1hvWiS', 13, 2),
(45, 'j99QONUGGWG', 14, 2),
(46, 'QfktHO6aTjp', 19, 1),
(47, 'QfktHO6aTjp', 18, 1),
(48, 'gznYU91om5M', 17, 1),
(49, 'pc0lRt7v9ch', 14, 2),
(50, 'DywRxLblwp1', 14, 2),
(51, 'DywRxLblwp1', 13, 1),
(52, 'Wy6srZaScaV', 12, 5),
(53, 'Wy6srZaScaV', 14, 6),
(54, 'hUfLic4Aqbb', 14, 1),
(55, 'hUfLic4Aqbb', 13, 1),
(56, 'hUfLic4Aqbb', 13, 2),
(57, 'mhSCZWaUdF3', 14, 2),
(58, 'mhSCZWaUdF3', 13, 1);

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `cat_id`, `pr_name`, `pr_quantity`, `pr_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 17, 'Silkscreen Print-small', 100, 50, '2016-04-13 08:51:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 17, 'Silkscreen Print-Medium', 100, 100, '2016-04-06 02:03:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 17, 'Silkscreen Print-Large', 100, 150, '2016-04-06 02:03:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 'Plain Generic Polo Shirt-Small', 100, 200, '2016-04-06 02:04:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 13, 'Customized Polo Shirt Uniform- Small', 200, 300, '2016-04-14 06:11:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 13, 'Customized Polo Shirt Uniform- Medium', 100, 400, '2016-04-06 02:07:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 14, 'Canvas Bag Plain', 100, 150, '2016-04-06 02:08:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 14, 'Canvas Bag w/ full color Print', 100, 200, '2016-04-06 02:09:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 15, 'Magic mug w/ customized design', 100, 150, '2016-04-06 02:11:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 15, 'Plain Mug', 100, 50, '2016-04-06 02:11:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 13, 'Safety Long Sleeves-Free Size', 100, 300, '2016-04-06 02:14:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 17, 'Business Card', 205, 50, '2016-04-09 05:52:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 15, 'DU30', 200, 90, '2016-04-13 02:35:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 14, 'Katcha Bag- small', 1, 100, '2016-04-13 09:28:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('4YCpXMvcPFx', 12, 0, 2, '600', '2016-04-13 02:54:52'),
('5h4CK1hvWiS', 11, 0, 2, '400', '2016-04-13 09:53:10'),
('8S8ejzgdUTi', 12, 0, 2, '300', '2016-04-13 02:58:38'),
('aczeun18eBV', 9, 0, 1, '300', '2016-04-09 09:24:43'),
('aK8q0n4XpPv', 9, 0, 1, '5000', '2016-03-01 02:22:48'),
('DUZWajVryRw', 9, 0, 1, '5000', '2016-04-06 02:17:08'),
('DywRxLblwp1', 11, 0, 2, '800', '2016-04-15 02:29:36'),
('F1klk7UaV2y', 9, 0, 1, '15000', '2016-02-01 02:18:59'),
('GNUM2L2ayQI', 9, 0, 1, '250', '2016-04-11 05:58:40'),
('gznYU91om5M', 11, 0, 2, '200', '2016-04-14 06:13:19'),
('he0k2Ar04wo', 9, 0, 1, '2950', '2016-04-13 02:50:15'),
('hUfLic4Aqbb', 9, 0, 1, '900', '2016-04-15 02:52:21'),
('J4vAwPJRvPr', 11, 0, 2, '8000', '2016-02-01 02:19:51'),
('J89R1omH4JB', 12, 0, 2, '1500', '2016-03-01 02:22:10'),
('j99QONUGGWG', 11, 0, 2, '600', '2016-04-14 01:28:41'),
('Jv7uljBmryy', 9, 0, 1, '800', '2016-04-13 02:52:58'),
('klVp8FCVv5a', 9, 0, 1, '600', '2016-04-13 02:37:33'),
('L6pUXkYf7MT', 9, 0, 1, '6000', '2016-01-01 02:26:07'),
('LcywzN5gf7L', 9, 0, 1, '400', '2016-04-13 02:58:38'),
('mhSCZWaUdF3', 11, 0, 2, '800', '2016-04-15 07:23:53'),
('MjH10za4ihO', 9, 0, 1, '6400', '2016-04-13 02:45:33'),
('NS4vTSNSsBm', 9, 0, 1, '1500', '2016-04-11 01:34:54'),
('pc0lRt7v9ch', 11, 0, 2, '600', '2016-04-14 06:45:44'),
('QfktHO6aTjp', 11, 0, 2, '200', '2016-04-14 03:27:14'),
('QKFNdJj78YY', 9, 0, 1, '600', '2016-04-11 11:13:48'),
('sKWPW4sFNdl', 9, 0, 1, '2000', '2016-04-05 02:37:40'),
('ugaZLYrwQ2O', 12, 0, 2, '600', '2016-04-13 02:56:20'),
('vnCPaT7qpTK', 12, 0, 2, '400', '2016-04-08 08:09:15'),
('WHgq0hI936v', 11, 0, 2, '3000', '2016-04-06 02:29:14'),
('Wy6srZaScaV', 11, 0, 2, '2550', '2016-04-15 02:52:18'),
('zAh1chAbgir', 9, 0, 1, '50', '2016-04-09 05:53:36');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`, `br_id`, `ustype_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Grace ', 'Braganza', 'grace14322', 'grace14322@gmail.com', '74a6fdf20393ce90b5321a05feb29182', '2', 1, 1, '2016-04-15 02:32:56', '2016-04-15 02:32:56', '2016-04-15 02:32:56'),
(8, 'Baby Anne', 'Lutap', 'babyanne', 'babyanne@gmail.com', 'a21810a01d3fe0df4291d7d3e7abbd1c', '2', 1, 2, '2016-04-05 03:29:31', '2016-04-05 03:29:31', '2016-04-05 03:29:31'),
(9, 'Jamir', 'Medina', 'jamir', 'jamir@gmail.com', 'c6f2088059e98c3da5e0f1529e915d09', '1', 1, 3, '2016-05-02 06:57:59', '2016-05-02 06:57:59', '2016-05-02 06:57:59'),
(10, 'Armand', 'Navarro', 'armand', 'armand@yahoo.com', 'd138f04ec7016a21acc2ae19ddc708bc', '1', 2, 2, '2016-03-31 05:00:48', '2016-03-31 05:00:48', '2016-03-31 05:00:48'),
(11, 'Gab', 'Perez', 'gab', 'gab@yahoo.com', '639bee393eecbc62256936a8e64d17b1', '1', 2, 3, '2016-03-27 23:56:47', '2016-03-27 23:56:47', '2016-03-27 23:56:47'),
(12, 'Kristine', 'Robedillo', 'kristine', 'kristine@yahoo.com', '002f48e213c339f5d1d839185dcc8e7f', '2', 2, 3, '2016-04-08 08:27:12', '2016-04-08 08:27:12', '2016-04-08 08:27:12'),
(13, 'Jean', 'Villador', 'jean', 'jean@gmail.com', 'b71985397688d6f1820685dde534981b', '2', 1, 3, '2016-04-11 06:03:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ustype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
