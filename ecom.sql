-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 08:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Md. Minul Hasan', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cet_id` int(11) NOT NULL,
  `cet_name` varchar(60) NOT NULL,
  `cet_des` text NOT NULL,
  `cet_img` varchar(60) NOT NULL,
  `cet_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cet_id`, `cet_name`, `cet_des`, `cet_img`, `cet_status`) VALUES
(7, 'rokanf', 'rokanf', 'rokanf.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_r_price` int(11) NOT NULL,
  `product_d_price` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_des` text NOT NULL,
  `product_image` varchar(90) NOT NULL,
  `product_status` tinyint(4) NOT NULL DEFAULT 0,
  `product_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_r_price`, `product_d_price`, `product_cat`, `product_des`, `product_image`, `product_status`, `product_created_at`) VALUES
(2, 'fghjfgj', 547, 5875, 7, 'ghjk', 'yui.jpg', 0, '2022-01-27 16:01:42'),
(3, 'yui', 547, 5875, 7, 'ghjk', 'yui.jpg', 1, '2022-01-27 16:02:02'),
(4, 'yui', 547, 5875, 7, 'ghjk', 'yui.jpg', 0, '2022-01-27 16:02:44'),
(6, 'dhu4tru 5dghfdh', 6434, 45756, 7, '45756', 'dh.jpg', 0, '2022-02-01 17:13:37'),
(7, 'dfhfghj ', 6756, 568, 7, 'rty reyrt uyrtuy', 'dfhfghj_.jpg', 0, '2022-02-06 15:58:04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_cat_info`
-- (See below for the actual view)
--
CREATE TABLE `products_cat_info` (
`product_id` int(11)
,`product_name` varchar(200)
,`product_r_price` int(11)
,`product_d_price` int(11)
,`product_des` text
,`product_image` varchar(90)
,`product_status` tinyint(4)
,`product_created_at` timestamp
,`cet_id` int(11)
,`cet_name` varchar(60)
,`cet_status` tinyint(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_f_name` varchar(255) NOT NULL,
  `user_l_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_rules` tinyint(4) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_f_name`, `user_l_name`, `user_email`, `user_pass`, `user_mobile`, `user_rules`) VALUES
(1, 'admin', 'Md. Minul Hasan', 'Rokan', 'minulhasanrokan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01627197089', 5),
(2, 'admin', 'Md. Minul Hasan', 'Rokan', 'minulhasanrokan@gmail.com', '202cb962ac59075b964b07152d234b70', '01627197089', 5),
(3, 'admin', 'Md. Minul Hasan', 'Rokan', 'minulhasanrokan@gmail.com', '202cb962ac59075b964b07152d234b70', '01627197089', 5);

-- --------------------------------------------------------

--
-- Structure for view `products_cat_info`
--
DROP TABLE IF EXISTS `products_cat_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_cat_info`  AS SELECT `products`.`product_id` AS `product_id`, `products`.`product_name` AS `product_name`, `products`.`product_r_price` AS `product_r_price`, `products`.`product_d_price` AS `product_d_price`, `products`.`product_des` AS `product_des`, `products`.`product_image` AS `product_image`, `products`.`product_status` AS `product_status`, `products`.`product_created_at` AS `product_created_at`, `category`.`cet_id` AS `cet_id`, `category`.`cet_name` AS `cet_name`, `category`.`cet_status` AS `cet_status` FROM (`products` join `category`) WHERE `products`.`product_cat` = `category`.`cet_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cet_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
