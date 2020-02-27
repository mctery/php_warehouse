-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 02:57 AM
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
  `member_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_telephone` varchar(10) NOT NULL,
  `member_img` varchar(255) NOT NULL,
  `member_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_username`, `member_password`, `member_email`, `member_telephone`, `member_img`, `member_create`) VALUES
(002, 'นายอานนท์ ชินแสง', 'nice', '123456', 'nice@gmail.com', '0877744315', 'asdf2020_02_22.jpg', '2020-02-21 18:31:32'),
(004, 'Thanawat Lerdlumyong', 'mctery', '5427', 'asdasdsa@gmail.com', '0871504071', 'mctery2020_02_22.jpg', '2020-02-22 10:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `orders_type_id` varchar(10) NOT NULL,
  `orders_qty` int(4) NOT NULL,
  `orders_price` int(10) NOT NULL,
  `order_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `order_user_submit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_type_id`, `orders_qty`, `orders_price`, `order_update`, `product_id`, `order_user_submit`) VALUES
(0001, '001', 10000, 111, '2020-02-23 16:58:30', 00001, 'Thanawat Lerdlumyong'),
(0002, '006', 30, 14000, '2020-02-24 13:16:56', 00002, 'Thanawat Lerdlumyong'),
(0003, '006', 20, 300, '2020-02-24 14:42:05', 00008, 'Thanawat Lerdlumyong'),
(0004, '006', 30, 9000, '2020-02-24 14:42:45', 00007, 'Thanawat Lerdlumyong'),
(0005, '007', 30, 300, '2020-02-24 14:53:44', 00008, 'Thanawat Lerdlumyong'),
(0006, '007', 20, 30, '2020-02-24 14:53:57', 00007, 'Thanawat Lerdlumyong'),
(0007, '006', 120, 3000, '2020-02-24 18:15:49', 00008, 'Thanawat Lerdlumyong'),
(0008, '006', 60, 300, '2020-02-24 18:16:11', 00008, 'Thanawat Lerdlumyong'),
(0009, '006', 20, 30, '2020-02-24 18:18:17', 00008, 'Thanawat Lerdlumyong'),
(0010, '006', 20, 250, '2020-02-24 18:24:27', 00010, 'Thanawat Lerdlumyong'),
(0011, '007', 10, 250, '2020-02-24 18:42:48', 00010, 'Thanawat Lerdlumyong'),
(0012, '007', 30, 3000, '2020-02-25 07:06:06', 00010, 'Thanawat Lerdlumyong'),
(0013, '006', 60, 300, '2020-02-25 16:24:47', 00010, 'Thanawat Lerdlumyong'),
(0014, '007', 100, 9000, '2020-02-25 16:25:20', 00009, 'Thanawat Lerdlumyong');

-- --------------------------------------------------------

--
-- Table structure for table `orders_type`
--

CREATE TABLE `orders_type` (
  `orders_type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `orders_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_type`
--

INSERT INTO `orders_type` (`orders_type_id`, `orders_type_name`) VALUES
(001, 'ที่ต้องชำระ'),
(002, 'ที่ต้องจัดส่ง'),
(003, 'ที่ต้องได้รับ'),
(004, 'สำเร็จแล้ว'),
(005, 'ยกเลิกแล้ว'),
(006, 'นำเข้า'),
(007, 'ส่งออก');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `product_type_id` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `warehouse_id` varchar(10) NOT NULL,
  `zone_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_type_id`, `product_price`, `product_qty`, `product_img`, `product_update`, `warehouse_id`, `zone_id`) VALUES
(00002, 'Samsung A71', 'จอแสดงผล Super AMOLED 24-bit (16 ล้านสี)\r\n- กล้องหน้าฝังบนจอ (Infinity O)\r\n- จอแสดงผลมีรูสำหรับกล้องหน้า (Punch-Hole Display)\r\n- กว้าง 6.7 นิ้ว (แนวทะแยง)\r\n- ความละเอียด 1080 x 2400 พิกเซล (393 ppi)\r\nระบบเซ็นเซอร์ (Sensor)\r\n- ระบบตรวจสอบลายนิ้วมือ (Finger', '002', 180000, 150, '24_02_2020_022115.jpg', '2020-02-24 13:21:15', '002', '003'),
(00007, 'Samsung Galaxy M31', 'จอแสดงผล Super AMOLED 24-bit (16 ล้านสี)\r\n- หน้าจอทรงหยดน้ำ รูปตัว U (Infinity U)\r\n- หน้าจอหยดน้ำ (Waterdrop Display)\r\n- กว้าง 6.4 นิ้ว (แนวทะแยง)\r\n- ความละเอียด 1080 x 2400 พิกเซล (411 ppi)\r\n- ประเภทจอ หน้าจอกระจกแข็ง\r\nระบบเซ็นเซอร์ (Sensor)\r\n- ระบบตรวจส', '002', 9000, 60, '24_02_2020_022249.jpg', '2020-02-24 13:22:49', '002', '002'),
(00008, 'เสื้อคอกลม M', '', '001', 300, 20, '24_02_2020_025926.jpg', '2020-02-24 13:59:26', '001', '001'),
(00009, 'Redmi Note 8 PRO', 'จอแสดงผล IPS-LCD 24-bit (16 ล้านสี)\r\n- จอแสดงผล HDR\r\n- หน้าจอหยดน้ำ (Waterdrop Display)\r\n- กว้าง 6.53 นิ้ว (แนวทะแยง)\r\n- ความละเอียด 1080 x 2340 พิกเซล (395 ppi)\r\nระบบเซ็นเซอร์ (Sensor)\r\n- ระบบตรวจสอบลายนิ้วมือ (Fingerprint)\r\n- ตรวจจับความเคลื่อนไหวของตัว', '002', 6999, 20, '24_02_2020_072042.jpg', '2020-02-24 18:20:42', '003', '002'),
(00010, 'JAVA OOP อ่านสนุก', 'อ่านง่าย\r\nทำง่าย', '029', 250, 20, '24_02_2020_072246.jpg', '2020-02-24 18:22:46', '002', '002');

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
(002, 'โทรศัพท์'),
(003, 'อุปกรณ์ตกแต่งบ้าน'),
(004, 'เครื่องมือการเกษตร'),
(029, 'หนังสือ'),
(031, 'ผลไม้');

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
(001, 'โกดัง 99', 'หน้าม.', 120, 42, '24_02_2020_035753.jpg'),
(002, 'B2N', 'อบต.เนินหอม', 300, 130, ''),
(003, 'บ้านมีสุข .inc', 'ปราจีนบุรี', 130, 82, '24_02_2020_040051.jpg'),
(007, 'JSC .inc', 'ไม่ทราบ', 400, 0, '23_02_2020_065014.jpg'),
(008, 'Origin .inc', 'ตลาดหน้าม.', 600, 0, '24_02_2020_021251.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `zone_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `zone_name`) VALUES
(001, 'โซน A'),
(002, 'โซน B'),
(003, 'โซน C'),
(004, 'โซน D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`);

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
  MODIFY `member_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_type`
--
ALTER TABLE `orders_type`
  MODIFY `orders_type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
