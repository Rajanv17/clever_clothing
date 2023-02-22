-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 04:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `crt_id` int(10) NOT NULL,
  `cus_id` int(10) DEFAULT NULL,
  `pro_id` int(10) DEFAULT NULL,
  `qty` int(100) DEFAULT NULL,
  `total` int(200) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL,
  `deleted` enum('Y','N') DEFAULT NULL,
  `ordered` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`crt_id`, `cus_id`, `pro_id`, `qty`, `total`, `active`, `deleted`, `ordered`) VALUES
(1, 5, 1, 1, 800, 'Y', 'N', 'Y'),
(2, 5, 1, 1, 800, 'Y', 'N', 'Y'),
(3, 5, 1, 1, 800, 'Y', 'N', 'Y'),
(4, 5, 1, 1, 800, 'Y', 'N', 'Y'),
(5, 5, 2, 1, 1000, 'Y', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'N',
  `deleted` enum('Y','N') DEFAULT 'Y',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(1, 'Men\'s Collection', 1, 'Y', 'N', '2023-02-16 23:00:00', '2023-02-19 20:14:08'),
(2, 'Women\'s Collection', 1, 'Y', 'N', '2023-02-16 23:00:08', NULL),
(3, 'Children\'s Collection', 1, 'Y', 'N', '2023-02-16 23:00:19', '2023-02-17 22:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `ccsaltedpassword`
--

CREATE TABLE `ccsaltedpassword` (
  `cc_id` int(11) NOT NULL,
  `cc_prefix` varchar(250) NOT NULL,
  `cc_suffix` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ccsaltedpassword`
--

INSERT INTO `ccsaltedpassword` (`cc_id`, `cc_prefix`, `cc_suffix`) VALUES
(1, 'lgjbfg23468902345790sdfbjklsdfty8902345}{}:?p)ujr()#uj%k@#(%p_)', 'holfgQJKWERJKL;ASDFGHKLv;jklBG89023456789234}:{:++i$io*(@#jmn*ddfws*(');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(20) DEFAULT NULL,
  `cus_mob` varchar(10) DEFAULT NULL,
  `cus_email` varchar(20) DEFAULT NULL,
  `cus_city` varchar(20) DEFAULT NULL,
  `cus_state` varchar(20) DEFAULT NULL,
  `cus_password` varchar(1000) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  `deleted` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_mob`, `cus_email`, `cus_city`, `cus_state`, `cus_password`, `createdDate`, `updateDate`, `active`, `deleted`) VALUES
(1, 'Rajan Vasani', '2147483647', 'abc@abc.com', 'RAJKOT', 'Gujarat', '2917f83db808485fb810', '2023-02-18', NULL, 'Y', 'N'),
(2, 'Abhishek Bhojak', '2147483647', 'def@def.com', 'RAJKOT', 'Gujarat', '2917f83db808485fb810', '2023-02-18', NULL, 'Y', 'N'),
(3, 'Kishan Parmar', '2147483647', 'eee@fee.com', 'RAJKOT', 'Gujarat', '2917f83db808485fb810', '2023-02-18', NULL, 'Y', 'N'),
(4, 'Hardik', '4848484848', 'def@def.com', 'RAJKOT', 'Gujarat', '2917f83db808485fb810', '2023-02-18', NULL, 'Y', 'N'),
(5, 'ccuser', '9999999999', 'abc@abc.com', 'RAJKOT', 'Gujarat', '2917f83db808485fb810b83ba76e8b2a6d04387bd004a22eee6977af205684b7cd689a56e948046b334a12412cd036c01f06dab749ad8bfb1776939111fa3797', '2023-02-18', NULL, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `cus_id` int(10) DEFAULT NULL,
  `pro_id` int(10) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `bill_amt` int(100) DEFAULT NULL,
  `ord_date` date DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL,
  `deleted` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pg_id` int(11) NOT NULL,
  `pg_name` varchar(50) NOT NULL,
  `pg_icon` varchar(100) DEFAULT NULL,
  `pg_link` varchar(50) NOT NULL,
  `pg_order` int(2) NOT NULL,
  `pg_listing` enum('Y','N') DEFAULT 'Y',
  `active` enum('Y','N') DEFAULT 'N',
  `deleted` enum('Y','N') DEFAULT 'Y',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pg_id`, `pg_name`, `pg_icon`, `pg_link`, `pg_order`, `pg_listing`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(1, 'Dashboard', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 'index.php', 1, 'Y', 'Y', 'N', '2022-06-22 16:49:55', NULL),
(2, 'Category', '<i class=\"nav-icon fas fa-boxes\"></i>', 'category.php', 2, 'Y', 'Y', 'N', '2022-06-22 16:49:55', NULL),
(3, 'Product', '<i class=\"nav-icon fas fa-tshirt\"></i>', 'product.php', 3, 'Y', 'Y', 'N', '2023-02-16 18:32:35', NULL),
(4, 'Orders', '<i class=\"nav-icon fas fa-box-open\"></i>', 'order.php', 4, 'Y', 'Y', 'N', '2023-02-18 21:38:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `pro_name` varchar(50) DEFAULT NULL,
  `pro_desc` varchar(150) DEFAULT NULL,
  `pro_img` varchar(500) DEFAULT NULL,
  `pro_price` varchar(500) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'N',
  `deleted` enum('Y','N') DEFAULT 'Y',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `c_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(1, 2, 'Product A', 'Product Description', 'uploads/product/IMG-Product_A_16767430721399.jpg', '800', 1, 'Y', 'N', '2023-02-18 23:27:52', NULL),
(2, 1, 'Product B`', 'Product Description', 'uploads/product/IMG-Product_B`_16767436636171.png', '1000', 1, 'Y', 'N', '2023-02-18 23:37:43', NULL),
(3, 3, 'Product C', 'Product Description', 'uploads/product/IMG-Product_C_16767437222845.png', '1500', 1, 'Y', 'N', '2023-02-18 23:38:42', NULL),
(4, 4, 'Shirt', 'Cotton Shirt', 'uploads/product/IMG-Shirt_16768169794693.jpg', '599', 1, 'Y', 'N', '2023-02-19 19:59:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_number` varchar(10) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'N',
  `deleted` enum('Y','N') DEFAULT 'Y',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_number`, `u_password`, `user`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(1, 'User', '9999999999', '2917f83db808485fb810b83ba76e8b2a6d04387bd004a22eee6977af205684b7cd689a56e948046b334a12412cd036c01f06dab749ad8bfb1776939111fa3797', NULL, 'Y', 'N', '2023-02-16 18:07:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`crt_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ccsaltedpassword`
--
ALTER TABLE `ccsaltedpassword`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pg_id`),
  ADD UNIQUE KEY `pg_order` (`pg_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_number` (`u_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `crt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ccsaltedpassword`
--
ALTER TABLE `ccsaltedpassword`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
