-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ref_l_id` int(11) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_username` varchar(20) NOT NULL,
  `mem_password` varchar(100) NOT NULL,
  `mem_img` varchar(200) NOT NULL,
  `dateinsert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `ref_l_id`, `mem_name`, `mem_username`, `mem_password`, `mem_img`, `dateinsert`) VALUES
(001, 1, 'Admin', '1', '356a192b7913b04c54574d18c28d46e6395428ab', '27100874020210707_113953.png', '2019-09-04 03:40:46'),
(025, 2, 'Member', '2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', '27100874020210707_113953.png', '2021-07-31 15:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(11) NOT NULL,
  `receive_name` varchar(100) NOT NULL COMMENT 'ชื่อผู้รับ',
  `order_status` int(1) NOT NULL,
  `b_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อธนาคาร',
  `pay_amount` float(10,2) DEFAULT NULL,
  `pay_amount2` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `mem_id`, `receive_name`, `order_status`, `b_name`, `pay_amount`, `pay_amount2`, `order_date`) VALUES
(0017, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:18:34'),
(0016, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 108.00, 108.00, '2023-09-13 14:13:11'),
(0015, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 576.00, 576.00, '2023-09-13 14:07:45'),
(0014, 0, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 0.00, 0.00, '2023-09-13 14:03:00'),
(0013, 0, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 0.00, 0.00, '2023-09-13 14:00:39'),
(0012, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 300.00, 300.00, '2023-09-13 13:59:56'),
(0018, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 180.00, 180.00, '2023-09-13 14:22:05'),
(0019, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 72.00, 72.00, '2023-09-13 14:22:15'),
(0020, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:22:33'),
(0021, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:24:59'),
(0022, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 108.00, 108.00, '2023-09-13 14:25:33'),
(0023, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:26:43'),
(0024, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:38:33'),
(0025, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:38:41'),
(0026, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 36.00, 36.00, '2023-09-13 14:38:54'),
(0027, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 72.00, 100.00, '2023-09-13 15:38:20'),
(0028, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 576.00, 1000.00, '2023-09-13 15:42:13'),
(0029, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 324.00, 500.00, '2023-09-14 09:09:21'),
(0030, 1, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 136.00, 200.00, '2023-09-14 14:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_c_qty` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_c_qty`, `total`) VALUES
(28, 16, 7, 1, 36),
(27, 16, 6, 1, 36),
(26, 15, 8, 12, 432),
(25, 15, 7, 2, 72),
(24, 15, 6, 2, 72),
(23, 14, 5, 3, 84),
(22, 14, 6, 3, 108),
(21, 14, 7, 3, 108),
(20, 13, 5, 3, 84),
(19, 13, 6, 3, 108),
(18, 13, 7, 3, 108),
(17, 12, 5, 3, 84),
(16, 12, 6, 3, 108),
(15, 12, 7, 3, 108),
(29, 16, 8, 1, 36),
(30, 17, 7, 1, 36),
(31, 18, 6, 2, 72),
(32, 18, 7, 3, 108),
(33, 19, 6, 1, 36),
(34, 19, 7, 1, 36),
(35, 20, 6, 1, 36),
(36, 21, 6, 1, 36),
(37, 22, 7, 3, 108),
(38, 23, 7, 1, 36),
(39, 24, 7, 1, 36),
(40, 25, 7, 1, 36),
(41, 26, 8, 1, 36),
(42, 27, 6, 2, 72),
(43, 28, 6, 7, 252),
(44, 28, 7, 3, 108),
(45, 28, 8, 6, 216),
(46, 29, 7, 6, 216),
(47, 29, 6, 3, 108),
(48, 30, 8, 1, 36),
(49, 30, 6, 1, 36),
(50, 30, 7, 1, 36),
(51, 30, 5, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` float(10,2) NOT NULL,
  `p_qty` int(5) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_qty`, `p_img`, `p_date_save`) VALUES
(5, 'Sticker PA', '', 28.00, 79, '214571331720230912_083304.jpeg', '2023-09-11 11:23:33'),
(6, 'Sticker PP', '', 36.00, 76, '49847413120230912_083332.jpg', '2023-09-12 01:33:32'),
(7, 'Sticker CL', '', 36.00, 73, '165598289620230912_083351.jpeg', '2023-09-12 01:33:51'),
(8, 'Sticker CF', '', 36.00, 79, '163528944820230912_083408.jpeg', '2023-09-12 01:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
