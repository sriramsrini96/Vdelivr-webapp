-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 07:33 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `userid`, `password`, `emailid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'adminuser', 'admin', 'admin', 'admin@gmail.com', 1, '2019-02-02 07:59:58', '0000-00-00 00:00:00'),
(2, 'adminuser2', 'admin2', 'admin2', 'admin2@gmail.com', 1, '2019-02-02 08:00:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `citymaster`
--

CREATE TABLE IF NOT EXISTS `citymaster` (
  `id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citymaster`
--

INSERT INTO `citymaster` (`id`, `state_id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'chennai', 1, '2019-02-20 13:40:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `comments` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offer_master`
--

CREATE TABLE IF NOT EXISTS `offer_master` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `offer_price` bigint(20) NOT NULL,
  `offer_valid_till` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `ordered_through` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pincodemaster`
--

CREATE TABLE IF NOT EXISTS `pincodemaster` (
  `id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pincodemaster`
--

INSERT INTO `pincodemaster` (`id`, `state_id`, `city_id`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 605106, 1, '2019-02-20 13:42:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `price_master`
--

CREATE TABLE IF NOT EXISTS `price_master` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statemaster`
--

CREATE TABLE IF NOT EXISTS `statemaster` (
  `id` bigint(20) NOT NULL,
  `state` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statemaster`
--

INSERT INTO `statemaster` (`id`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tamilnadu', 1, '2019-02-20 13:38:29', '2019-02-20 14:10:30'),
(2, 'kerela', 1, '2019-02-20 14:09:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `state` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citymaster`
--
ALTER TABLE `citymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_master`
--
ALTER TABLE `offer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodemaster`
--
ALTER TABLE `pincodemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_master`
--
ALTER TABLE `price_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statemaster`
--
ALTER TABLE `statemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `citymaster`
--
ALTER TABLE `citymaster`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer_master`
--
ALTER TABLE `offer_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pincodemaster`
--
ALTER TABLE `pincodemaster`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `price_master`
--
ALTER TABLE `price_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statemaster`
--
ALTER TABLE `statemaster`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
