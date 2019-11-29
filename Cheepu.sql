-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 10:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheepu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE `cart_info` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_info`
--

INSERT INTO `cart_info` (`cart_id`, `product_id`, `quantity`, `user_id`, `seller_id`) VALUES
(3, 4, 1, 37, '4'),
(4, 2, 1, 37, '11'),
(5, 5, 1, 37, '4'),
(6, 19, 1, 40, '4');

-- --------------------------------------------------------

--
-- Table structure for table `catogory`
--

CREATE TABLE `catogory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catogory`
--

INSERT INTO `catogory` (`cat_id`, `cat_name`, `s_id`) VALUES
(1, 'BOOKS', 10),
(2, 'mobile and tablets', 10),
(3, 'Appliances', 10),
(4, 'Baby', 10),
(5, 'Bags, Wallets and Luggage', 10),
(6, 'Beauty', 10),
(7, 'Car & Motorbike', 10),
(8, 'Clothing & Accessories', 10),
(9, 'Collectibles & Fine Art', 10),
(10, 'Computers & Accessories', 10),
(11, 'Electronics', 10),
(12, 'Fashion', 10),
(13, 'Grocery & Gourmet Foods', 10),
(14, 'Health & Personal Care', 10),
(15, 'Home & Kitchen', 10),
(16, 'Home Improvement', 10),
(17, 'Industrial & Scientific', 10),
(18, 'Jewellery', 10),
(19, 'Movies & TV Shows', 10),
(20, 'Music', 10),
(21, 'Musical Instruments', 10),
(22, 'Office Products', 10),
(23, 'Outdoor Living', 10),
(24, 'Pet Supplies', 10),
(25, 'Shoes & Handbags', 10),
(26, 'Software', 10),
(27, 'Sports, Fitness & Outdoors', 10),
(28, 'Toys & Games', 10),
(29, 'Video Games', 10),
(30, 'Watches', 10);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_image` varchar(255) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_image`, `posted_at`) VALUES
(14, 'http://localhost/Cheepu/assets/img/offer/Screenshot-from-2019-07-31-20-01-45.png', '2019-08-06 22:10:49'),
(15, 'http://localhost/Cheepu/assets/img/offer/Screenshot-from-2019-07-31-20-21-57.png', '2019-08-06 22:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(111) NOT NULL,
  `order_id` int(111) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `landmark` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `order_id`, `address`, `landmark`, `city`, `state`, `pin_code`, `user_id`, `product_id`, `seller_id`, `status`, `transaction_id`) VALUES
(6, 6, 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', 'Rajasthan', 'Alwar', 'Rajasthan', 301028, 37, 4, 4, 1, ''),
(7, 6, 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', 'Rajasthan', 'Alwar', 'Rajasthan', 301028, 37, 2, 11, 0, ''),
(8, 6, 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', 'Rajasthan', 'Alwar', 'Rajasthan', 301028, 37, 5, 4, 1, ''),
(9, 9, 'LIET', 'Chikani', 'Alwar', 'Rajasthan', 301028, 40, 19, 4, 1, ''),
(10, 10, 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', 'Rajasthan', 'Alwar', 'Rajasthan', 301028, 40, 19, 4, 1, ''),
(11, 11, 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', 'Rajasthan', 'Alwar', 'Rajasthan', 301028, 40, 19, 4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_image5` varchar(255) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `common_name` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL,
  `m_r_p` int(11) NOT NULL,
  `s_p` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `isbn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `type`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_image5`, `sub_cat_id`, `common_name`, `s_id`, `m_r_p`, `s_p`, `description`, `sku`, `author`, `edition`, `language`, `rating`, `isbn`) VALUES
(2, 'ALL IN ONE SOCIAL SCIENCE CLASS 10', 'per-item', 'https://cheepu.in/assets/img/products/ssj.jpg', '', '', '', '', 1, '', 11, 430, 349, '<p><strong>With the regular advancement in the level of academic competition, complete and confident exam preparedness doesn&#39;t come from school textbooks only. Serving as comprehensive study guides for all subjects of CBSE Class 6th to 12th, Arihant&r', 'AIOSSCIENCEX', '', '', '', '0', ''),
(3, 'Ayush', '5656', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-12.png', '', '', '', '', 3, '', 4, 1, 11, '<ol>\r\n	<li>1</li>\r\n	<li>2</li>\r\n	<li>3</li>\r\n	<li>4</li>\r\n	<li>5</li>\r\n</ol>\r\n', '1212', '', '', '', '0', ''),
(4, 'Ayush', '5656', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-12.png', '', '', '', '', 3, '', 4, 1, 11, '<ol>\r\n	<li>1</li>\r\n	<li>2</li>\r\n	<li>3</li>\r\n	<li>4</li>\r\n	<li>5</li>\r\n</ol>\r\n', '1212', '', '', '', '0', ''),
(5, 'Ayush', '5656', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-12.png', '', '', '', '', 3, '', 4, 1, 11, '<ol>\r\n	<li>1</li>\r\n	<li>2</li>\r\n	<li>3</li>\r\n	<li>4</li>\r\n	<li>5</li>\r\n</ol>\r\n', '1212', '', '', '', '0', ''),
(8, 'Satyam', '11', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-13-57-40.png', '', '', '', '', 1, '', 4, 100, 99, '<ul>\r\n	<li>Hey</li>\r\n	<li>how are you?</li>\r\n</ul>\r\n', '9931', 'Satyam', 'Newest', 'Hindi', '0', '17ELDCS044'),
(9, 'Ayus', 'wqw', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-33.png', '', '', '', '', 1, '', 4, 21212, 2112, '<ol>\r\n	<li>erwr</li>\r\n	<li>wer</li>\r\n	<li>w</li>\r\n	<li>erw</li>\r\n	<li>rw</li>\r\n	<li>rw</li>\r\n	<li>r</li>\r\n</ol>\r\n', 'qwqw', 'Satyam', '3232', 'Hindi', '0', 'qwqw'),
(10, 'BOOOOOOK', '212112', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-30.png', '', '', '', '', 1, '', 4, 5665, 12121, '<ol>\r\n	<li>Ayush</li>\r\n	<li>SSS</li>\r\n	<li>WWW<br />\r\n	QQQ</li>\r\n	<li>WWW</li>\r\n	<li>WWW</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n', 'BBBBBBK', 'Satyam', '5', 'Hindi', '0', 'AASASASAS'),
(11, 'l', '8', 'http://localhost/Cheepu/assets/img/products/', '', '', '', '', 1, '', 4, 4, 4, '<p>AYusbhbaubu eiugf wefiw fwf f wf wf8g wfg wf w</p>\r\n\r\n<p>erteege</p>\r\n\r\n<p>et</p>\r\n\r\n<p>ge</p>\r\n\r\n<p>tge</p>\r\n\r\n<p>y</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'l', '4444', '4', 'Hindi', '0', 'j'),
(12, 'TEST', '231', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-23-35.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-24-17-01-03.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-33.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-29-51.png', '', 1, '', 4, 1313, 131, '<p>SEW</p>\r\n\r\n<p>WRW</p>\r\n\r\n<p>RW</p>\r\n\r\n<p>RWR</p>\r\n\r\n<p>W</p>\r\n\r\n<p>R</p>\r\n\r\n<p>W</p>\r\n', '232', 'Satyam', '131', 'Eng', '0', '22231'),
(13, 'Ayush', '500', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-09-44.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-01-45.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-21-57.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-29-51.png', '', 1, '', 4, 35, 90, '<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', '212122', '90', '09', 'Hindi', '0', 'aqaqaq'),
(14, 'Q', 'WEWE', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-29-51.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-42-36.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-21-57.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-06-12.png', '', 1, '', 4, 7, 3, '<p>q</p>\r\n\r\n<p>q</p>\r\n\r\n<p>q</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Q', '90', '1111', 'Hindi', '0', 'Q'),
(15, 'Ayush', 'qqq', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-42-36.png', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', '', 1, '', 4, 22, 11, '<p>212</p>\r\n\r\n<p>12</p>\r\n\r\n<p>&nbsp;</p>\r\n', '121221211111', '222', '222', 'Hindi', '0', '222'),
(16, 'aQ', '1212A', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', 'http://localhost/Cheepu/assets/img/products/', 2, '', 4, 5, 2, '<p>QQ</p>\r\n', 'Q', 'Q', 'Newest', 'Hindi', '0', 'Q'),
(17, 'aQ', '1212A', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-09-441.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-24-17-01-031.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-24-16-47-431.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-331.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-24-141.png', 2, '', 4, 5, 2, '<p>QQ</p>\r\n', 'Q', 'Q', 'Newest', 'Hindi', '0', 'Q'),
(18, 'Ayush', '1111', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-42-36.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-42-361.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-23-35.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-10-00.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-18-55.png', 1, '', 4, 1111, 11, '<p>1111111111</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1111111111111', '11', '1111', 'Hindi', '0', '111111111111111111111111111'),
(19, 'test', '1', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-08-24-21-52-241.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-20-23-20-55.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-24.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-09-44.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-12.png', 4, '', 4, 12, 10, '<ul>\r\n	<li>Best in class</li>\r\n	<li>Good in test</li>\r\n</ul>\r\n', 'asas23e', '', '', '', '0', ''),
(20, 'rtu', '11', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-30.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-21-57.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-121.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-31-20-29-51.png', 'http://localhost/Cheepu/assets/img/products/Screenshot-from-2019-07-15-14-08-33.png', 6, '', 4, 11, 10, '<ul>\r\n	<li>sas</li>\r\n	<li>dad</li>\r\n	<li>ad</li>\r\n	<li>ad</li>\r\n	<li>ad</li>\r\n	<li>a</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 'a223', '', '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `p_info_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `seller_shop_id` int(11) NOT NULL,
  `current_price` int(11) NOT NULL,
  `previous_price` int(11) NOT NULL,
  `suggested_price` int(11) NOT NULL,
  `pin_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`p_info_id`, `product_id`, `sub_category_id`, `seller_shop_id`, `current_price`, `previous_price`, `suggested_price`, `pin_code`) VALUES
(1, 12, 0, 0, 0, 0, 0, ''),
(2, 12, 0, 0, 0, 0, 0, ''),
(3, 14, 4, 0, 0, 0, 0, ''),
(4, 14, 4, 19, 110, 0, 0, ''),
(5, 13, 5, 19, 232, 0, 0, ''),
(6, 16, 4, 0, 2, 0, 0, '301028'),
(7, 14, 4, 12, 1, 0, 0, '301028'),
(8, 14, 4, 19, 21, 0, 0, '301028'),
(9, 14, 4, 19, 23, 0, 0, '301028'),
(10, 13, 5, 19, 12, 0, 0, '301028');

-- --------------------------------------------------------

--
-- Table structure for table `seller_info`
--

CREATE TABLE `seller_info` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_current_password` varchar(255) NOT NULL,
  `seller_previous_password` varchar(255) NOT NULL,
  `seller_mobile` varchar(20) NOT NULL,
  `seller_address` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_pin_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_info`
--

INSERT INTO `seller_info` (`seller_id`, `seller_name`, `seller_current_password`, `seller_previous_password`, `seller_mobile`, `seller_address`, `seller_email`, `seller_pin_code`) VALUES
(4, 'Ayush', '1', '1', '1', '1', 'alalal@ii', '20802`'),
(10, 'Akash Srivastava', 'Akash@123', 'Akash@123', '7017685326', '', '', ''),
(11, 'Maharaj Store', 'Maharaj@123', '', '8461963414', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_info`
--

CREATE TABLE `shop_info` (
  `seller_shop_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `shop_rating` enum('1','2','3','4','5') NOT NULL,
  `shop_delivery_time` varchar(255) NOT NULL,
  `shop_pin_code` varchar(255) NOT NULL,
  `shop_image` varchar(255) NOT NULL,
  `shop_registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_info`
--

INSERT INTO `shop_info` (`seller_shop_id`, `seller_id`, `shop_name`, `shop_address`, `shop_rating`, `shop_delivery_time`, `shop_pin_code`, `shop_image`, `shop_registration_date`) VALUES
(1, 0, 'Ayush Dixt', 'Babanagar Naubasta', '1', '', '', 'ayush.txt', '2019-02-23 09:16:20'),
(2, 0, 'Ayush Dixt', 'Babanagar Naubasta', '1', '', '', 'ayush.txt', '2019-02-23 09:16:59'),
(3, 0, 'Ayush Dixt', 'Babanagar Naubasta', '1', '', '121212', 'ayush.txt', '2019-02-23 09:17:25'),
(4, 0, 'Satyam', '1212122', '1', '', '333', 'hackathon_notice.docx', '2019-02-23 09:26:40'),
(5, 0, 'Satyam', '1212122', '1', '', '333', 'hackathon_notice.docx', '2019-02-23 09:27:09'),
(6, 0, 'example', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '', '301028', '', '2019-02-23 15:25:45'),
(7, 0, 'Ayush Dixt', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '', '6', '', '2019-02-23 15:32:51'),
(8, 0, 'Ayush Dixt', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '', '6', 'hackathon_notice.docx', '2019-02-23 15:38:35'),
(9, 0, 'Satyam', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '13:59', '6', '', '2019-02-23 15:42:35'),
(10, 0, 'Ayush Dixt', 'naya', '1', '12:59', '6', '1902048-bb-home_t1_378.jpg', '2019-02-26 15:27:26'),
(11, 0, 'Satyam', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '00:59', '6', '1902043-bucket-wash_t1_184.jpg', '2019-02-26 15:32:43'),
(12, 0, 'Ayush Dixt', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '12:59', '6', '1902052-baby-skincare_t1_360.jpg', '2019-02-26 15:53:20'),
(13, 0, 'Ayush Dixt', 'ayuhs dixit', '1', '12:59', '6', '1902050-food-feeding_t1_360.jpg', '2019-02-26 15:54:44'),
(14, 0, 'Ayush Dixt', '1111', '1', '12:00', '6', '1902049-diapers-wipes_t1_360.jpg', '2019-02-26 15:56:10'),
(15, 0, 'Ayush Dixt', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '00:59', '6', '1902048-bb-home_t1_378.jpg', '2019-02-26 15:57:38'),
(16, 0, 'Ayu General Store', 'Babanagar Naubasta', '1', '15:00', '6', 'Screenshot (9).png', '2019-03-14 10:14:36'),
(17, 0, 'Kirana Ki dukaan', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '01:59', '212121', 'Screenshot (8).png', '2019-03-14 10:20:44'),
(18, 6, 'Simran Store', 'Babanagar Naubasta', '1', '00:00', '301028', 'Screenshot (7).png', '2019-03-14 10:22:23'),
(19, 1, 'Nilu', 'Laxmi Devi Institute of Engg and Tech.,Chikani, Alwar, Rajasthan', '1', '12:00', '301028', 'Screenshot (9).png', '2019-03-15 11:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_cat_img` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`, `sub_cat_img`, `s_id`) VALUES
(1, 'School Textbooks', 1, 'https://cheepu.in/assets/img/seller/subCat/Textbooks_CB476607959_SY219_.jpg', 10),
(2, 'Children\'s books', 1, 'https://cheepu.in/assets/img/seller/subCat/Children-Books_CB476607956_SY219_.jpg', 10),
(3, 'Exam Central', 1, 'https://cheepu.in/assets/img/seller/subCat/Test-prep_CB476607959_SY219_.jpg', 10),
(4, 'E-Books', 1, 'https://cheepu.in/assets/img/seller/subCat/Kindle-eBooks_CB272214530_SY216_.jpg', 10),
(5, 'eBooks', 1, 'https://cheepu.in/assets/img/seller/subCat/Kindle-eBooks_CB272214530_SY216_.jpg', 10),
(6, 'Heating & Cooling', 3, 'https://cheepu.in/assets/img/seller/subCat/tim-arterbury-g8GfTWqCdFY-unsplash.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `unauth_user`
--

CREATE TABLE `unauth_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unauth_user`
--

INSERT INTO `unauth_user` (`id`, `email`, `status`) VALUES
(1, 'alexthecosta@gmail.com', 0),
(2, 'alexttttthecosta@gmail.com', 0),
(3, 'alexthecosta@gmail.com', 0),
(4, 'alexthecosta@gmail.com', 0),
(5, 'alexthecosta@gmail.com', 0),
(6, 'alwaysayushkd@gmail.com', 0),
(7, 'alwaysayushkd@gmail.com', 0),
(8, 'alwaysayushkd@gmail.com', 0),
(9, 'alwaysayushkd@gmail.com', 0),
(10, 'alwaysayushkd@gmail.com', 0),
(11, 'alwaysayushkd@gmail.com', 0),
(12, 'alwaysayushkd@gmail.com', 0),
(13, 'alwaysayushkd@gmail.com', 1),
(14, 'ayushthejack@gmail.com', 1),
(15, 'ayushthejack@gmail.com', 0),
(16, 'ayushthejack@gmail.com', 0),
(17, 'm1y1nk.amr@gmail.com', 1),
(18, 'm1y1nk.amr@gmail.com', 1),
(19, 'anmol6251@gmail.com', 1),
(20, 'aaaa@', 0),
(21, 'ayushthejack@gmail.com', 0),
(22, 'ayush@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_pic` varchar(255) NOT NULL DEFAULT 'http://localhost/Cheepu/assets/img/logo/user.png',
  `auth` int(11) NOT NULL DEFAULT '0',
  `social_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_current_password` varchar(255) NOT NULL,
  `user_previous_password` varchar(2555) NOT NULL,
  `user_refferal_code` varchar(255) NOT NULL,
  `user_refer_by_code` varchar(255) NOT NULL,
  `number_of_refers` int(111) NOT NULL,
  `total_cashback_earning` int(111) NOT NULL,
  `latitude` decimal(65,20) NOT NULL,
  `longitude` decimal(65,20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_pic`, `auth`, `social_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_current_password`, `user_previous_password`, `user_refferal_code`, `user_refer_by_code`, `number_of_refers`, `total_cashback_earning`, `latitude`, `longitude`) VALUES
(1, 'fa fa-user', 0, NULL, '', 'ayushthejack@gmail.com', '', '', '86s5r9IGCLzmg', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(2, 'fa fa-user', 1, NULL, '', 'mayankkumarrawat69@gmail.com', '', '', 'c2Qhe1hy7NnEs', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(3, 'fa fa-user', 1, NULL, '', 'mayankkumarrawat69@gmail.com', '', '', '25xN9KMCwh/SU', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(6, 'fa fa-user', 0, NULL, '', 'mayankrawat171996@gmail.com', '', '', '25xN9KMCwh/SU', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(7, 'fa fa-user', 0, '2326339297479705', 'Ayush Kumar Dixit', 'dixitayush57@gmail.com', '', '', '', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(8, 'fa fa-user', 0, '2326339297479705', 'Ayush Kumar Dixit', 'dixitayush57@gmail.com', '', '', '', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(9, 'fa fa-user', 0, '2326339297479705', 'Ayush Kumar Dixit', 'dixitayush57@gmail.com', '', '', '', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(10, 'fa fa-user', 0, '2326339297479705', 'Ayush Kumar Dixit', 'dixitayush57@gmail.com', '', '', '', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(11, 'fa fa-user', 0, '2326339297479705', 'Ayush Kumar Dixit', 'dixitayush57@gmail.com', '', '', '', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(12, 'fa fa-user', 0, NULL, 'Anmol', 'abcd@gmail.com', '9999999999', '', 'e1y.tuEXKZRRE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(13, 'fa fa-user', 0, NULL, '', '123qwe@gmail.com', '', '', 'c2Qhe1hy7NnEs', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(14, 'fa fa-user', 0, NULL, '', 'abcd1@gmail.com', '', '', '81CMbBg2r.GBA', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(15, 'fa fa-user', 0, NULL, '', 'asc4@gmail.co', '', '', '81CMbBg2r.GBA', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(16, 'fa fa-user', 0, NULL, '', '123dg@gmail.com', '', '', '82OyeqVyr6D1w', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(17, 'fa fa-user', 0, NULL, '', 'a@g.c', '', '', '20EAfcH0JSFQY', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(18, 'fa fa-user', 0, NULL, '', 'abcd@g.ml', '', '', 'e1y.tuEXKZRRE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(19, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', 'e1y.tuEXKZRRE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(20, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '7afYjBHh0EaiY', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(21, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', 'c7qNpt7pdip2w', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(22, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '0cskgc3AHZvaE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(23, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '0cskgc3AHZvaE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(24, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '76euHDcJdmz3Q', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(25, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '0cskgc3AHZvaE', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(26, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', '03e25BtvpGl4I', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(27, 'fa fa-user', 0, NULL, '', 'a@b.c', '', '', 'a0iKHTAToITk6', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(28, 'fa fa-user', 0, NULL, '', 'ab@gmail.com', '', '', '32QgH0wjYzzkU', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(29, 'fa fa-user', 0, NULL, '', 'ab@gmail.com', '', '', '32QgH0wjYzzkU', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(30, 'fa fa-user', 0, NULL, 'Abhay singh', 'abhaysingh150994@gmail.com', '9161770655', '', '20vqUbv0X416E', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(31, 'fa fa-user', 0, NULL, 'Abhay singh', 'abhaysingh150994@gmail.com', '9161770655', '', '20vqUbv0X416E', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(32, 'fa fa-user', 0, NULL, 'Abhay singh', 'abhaysingh150994@gmail.com', '9161770655', '', '20vqUbv0X416E', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(33, 'fa fa-user', 0, NULL, 'Abhay singh', 'abhaysingh150994@gmail.com', '9161770655', '', '20vqUbv0X416E', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(34, 'fa fa-user', 0, NULL, 'Abhay singh', 'abhaysingh150994@gmail.com', '9161770655', '', '20vqUbv0X416E', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(35, 'fa fa-user', 1, NULL, '', 'mayankkumarrawat69@gmail.com', '', '', 'datZ1Cg4hs2tQ', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(36, 'fa fa-user', 1, NULL, '', 'ayushthejack@gmail.com', '', '', '08vT/HsEjFLLo', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(37, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'Ayush', 'dixitayush5085@gmail.com', '1', '', 'c4l2at07S3atQ', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(38, 'fa fa-user', 0, NULL, 'AKASH SHRIVASTAVA', '7017685326', '7017685326', '', '4597A0zlb6iSs', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(39, 'fa fa-user', 0, NULL, '', '90', '', '', '86s5r9IGCLzmg', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(40, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'Satyam', 'iamsatyam26@gmail.com', '9123284898', '', 'd8Z2CkyW5i1h6', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(41, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qq', 'dixitayush57@gmail.com', '', '', '76euHDcJdmz3Q', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(42, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qq', 'dixitayush57@gmail.com', '', '', '76euHDcJdmz3Q', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(43, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'we', 'dixiitayush57@gmail.com', '9123284898', '', '08IROoNKmNrfc', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(44, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'we', 'dixiitayush57@gmail.com', '9123284898', '', '08IROoNKmNrfc', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(45, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'we', 'dixiitayush57@gmail.com', '9123284898', '', '08IROoNKmNrfc', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(46, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 's', 'iamsatyam26@gmail.com', '9123284898', '', 'd2QmyYkbwuDs.', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(47, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 's', 'iamsatyam26@gmail.com', '9123284898', '', 'd2QmyYkbwuDs.', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(48, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'aa', 'info.satyam678', '9123284898', '', '09wndBEuoNCDg', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(49, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'aa', 'info.satyam678', '9123284898', '', '41xSIc5MEuS7k', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(50, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'xxxxxxxxxx', 'iamsatyam26@gmail.com', '9123284898', '', '16nzX5cIASjew', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(51, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qq', 'iamsatyam26@gmail.com', '9123284898', '', 'ebObQ0QABXT46', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(52, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qq', 'iamsatyam26@gmail.com', '9123284898', '', 'ebObQ0QABXT46', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(53, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qqqqqq', 'iamsatyam26@gmail.com', '9123284898', '', 'c1jvSJR4pNMiA', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(54, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qqqqqq', 'iamsatyam26@gmail.com', '9123284898', '', 'c1jvSJR4pNMiA', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(55, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'qq', 'dixitayush57@gmail.com', '1123284898', '', '02dUqS7fgXy7A', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(56, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'aa', 'dixitayush57@gmail.com', '1905506193', '', '09wndBEuoNCDg', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(57, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'aa', 'dixitayush57@gmail.com', '77905506193', '', '09wndBEuoNCDg', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(58, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'ss', 'dixiitayush57@gmail.com', '', '', '36qQM5W2RzDj2', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(59, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'ss', 'dixiitayush57@gmail.com', '91223284898', '', '36qQM5W2RzDj2', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(60, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'ss', 'dixiitayush57@gmail.com', '9123284898', '', '36qQM5W2RzDj2', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(61, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'q', 'dixitayush57gmail.com', '9123284898', '', '4e5UK94nHVMPo', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(62, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'q', 'dixitayush57@gmailcom', '9123284898', '', '4e5UK94nHVMPo', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(63, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'q', '@dixitayush57@gmail.com', '9123284898', '', '4e5UK94nHVMPo', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000'),
(64, 'http://localhost/Cheepu/assets/img/logo/user.png', 0, NULL, 'q', 'dixitayush57@gmail.com', '9123284898', '', '4e5UK94nHVMPo', '', '', '', 0, 0, '0.00000000000000000000', '0.00000000000000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catogory`
--
ALTER TABLE `catogory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_info_id`);

--
-- Indexes for table `seller_info`
--
ALTER TABLE `seller_info`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `shop_info`
--
ALTER TABLE `shop_info`
  ADD PRIMARY KEY (`seller_shop_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `unauth_user`
--
ALTER TABLE `unauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_info`
--
ALTER TABLE `cart_info`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catogory`
--
ALTER TABLE `catogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seller_info`
--
ALTER TABLE `seller_info`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop_info`
--
ALTER TABLE `shop_info`
  MODIFY `seller_shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unauth_user`
--
ALTER TABLE `unauth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
