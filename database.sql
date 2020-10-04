-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2020 at 05:30 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PHP2_STORE`
--

-- --------------------------------------------------------

--
-- Table structure for table `attr`
--

CREATE TABLE `attr` (
  `id` int(10) NOT NULL,
  `attr_name` varchar(30) DEFAULT NULL,
  `attr_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attr__detail`
--

CREATE TABLE `attr__detail` (
  `id` int(10) NOT NULL,
  `attr_id` int(10) DEFAULT NULL,
  `ad_name` varchar(30) DEFAULT NULL,
  `ad_value` varchar(30) DEFAULT NULL,
  `ad_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `gallery_id` int(10) DEFAULT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_desc` varchar(255) DEFAULT NULL,
  `c_slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cites`
--

CREATE TABLE `cites` (
  `id` int(10) NOT NULL,
  `city_name` varchar(30) DEFAULT NULL,
  `city_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) NOT NULL,
  `city_id` int(10) DEFAULT NULL,
  `district_name` varchar(100) DEFAULT NULL,
  `district_slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) NOT NULL,
  `gt_id` int(10) DEFAULT '1',
  `g_slug` varchar(255) DEFAULT NULL,
  `g_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `galleries__types`
--

CREATE TABLE `galleries__types` (
  `id` int(10) NOT NULL,
  `gt_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(10) NOT NULL,
  `g_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders__detail`
--

CREATE TABLE `orders__detail` (
  `order_id` int(10) DEFAULT NULL,
  `p_id` int(10) DEFAULT NULL,
  `p_amount` int(10) DEFAULT NULL,
  `p_unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_sku` varchar(20) DEFAULT NULL,
  `p_desc` text,
  `p_price` double DEFAULT NULL,
  `p_slug` varchar(255) DEFAULT NULL,
  `p_feature_img` int(10) DEFAULT NULL,
  `gender_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product__attr`
--

CREATE TABLE `product__attr` (
  `p_id` int(10) DEFAULT NULL,
  `attr_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `p_id` int(10) DEFAULT NULL,
  `g_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product__in_categories`
--

CREATE TABLE `product__in_categories` (
  `p_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_password` varchar(100) DEFAULT NULL,
  `u_fullname` varchar(50) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `user_phone_num` varchar(15) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attr__detail`
--
ALTER TABLE `attr__detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_slug` (`c_slug`);

--
-- Indexes for table `cites`
--
ALTER TABLE `cites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `g_slug` (`g_slug`);

--
-- Indexes for table `galleries__types`
--
ALTER TABLE `galleries__types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_sku` (`p_sku`),
  ADD UNIQUE KEY `p_slug` (`p_slug`);

--
-- Indexes for table `product__in_categories`
--
ALTER TABLE `product__in_categories`
  ADD PRIMARY KEY (`p_id`,`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_name` (`u_name`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attr`
--
ALTER TABLE `attr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attr__detail`
--
ALTER TABLE `attr__detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cites`
--
ALTER TABLE `cites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries__types`
--
ALTER TABLE `galleries__types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
