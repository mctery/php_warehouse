-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 06:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(3) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_telephone` varchar(10) NOT NULL,
  `member_img` varchar(255) NOT NULL,
  `member_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `orders_type_id` varchar(3) NOT NULL,
  `orders_qty` int(4) NOT NULL,
  `orders_price` int(10) NOT NULL,
  `order_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(10) NOT NULL,
  `order_user_submit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_type`
--

CREATE TABLE `orders_type` (
  `orders_type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `orders_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` text NOT NULL,
  `product_type_id` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `warehouse_id` varchar(10) NOT NULL,
  `zone_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(001, 'เสื้อผ้า'),
(002, 'นำเข้า'),
(003, 'อุปกรณ์ตกแต่งบ้าน'),
(004, 'เครื่องมือการเกษตร');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_location` varchar(255) NOT NULL,
  `warehouse_storage_full` int(100) NOT NULL,
  `warehouse_storage_current` int(100) NOT NULL,
  `warehouse_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_name`, `warehouse_location`, `warehouse_storage_full`, `warehouse_storage_current`, `warehouse_img`) VALUES
(001, 'โกดัง 99', 'หน้าม.', 100, 62, ''),
(002, 'B2N', 'อบต.เนินหอม', 300, 150, '');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `zone_name` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `orders_type`
--
ALTER TABLE `orders_type`
  ADD PRIMARY KEY (`orders_type_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_type`
--
ALTER TABLE `orders_type`
  MODIFY `orders_type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
