-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 08:26 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal_wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `product_name`, `category`, `stock`, `price`, `photo`, `supplier`, `status`) VALUES
(7, 'flower', 'decoration', '50', '5', 'item_photo/shubh__photography___20200510_175324_0.jpg', 'ak@gmail.com', 1),
(8, 'shagun garden', 'location', '1', '5000', 'item_photo/shubh__photography___20200510_174835_0.jpg', 'abhi@gmail.com', 1),
(9, 'lipstick', 'beuty', '50', '100', 'item_photo/download.jpg', 'omkar@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `mul_price` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `cart_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `user_email`, `supplier`, `product_name`, `product_price`, `qty`, `mul_price`, `event_date`, `cart_status`) VALUES
(33, 'omkar@gmail.com', 'ak@gmail.com', 'flower', '5', '8', '40', '2020-06-13', 2),
(34, 'omkar@gmail.com', 'abhi@gmail.com', 'shagun garden', '5000', '1', '5000', '2020-06-13', 2),
(35, 'omkar@gmail.com', 'omkar@gmail.com', 'lipstick', '100', '5', '500', '2020-06-13', 2),
(36, 'kasalkar16@gmail.com', 'ak@gmail.com', 'flower', '5', '10', '50', '2020-06-11', 0),
(37, 'kasalkar16@gmail.com', 'abhi@gmail.com', 'shagun garden', '5000', '1', '5000', '2020-06-11', 0),
(38, 'kasalkar16@gmail.com', 'omkar@gmail.com', 'lipstick', '100', '10', '1000', '2020-06-11', 0),
(39, 'omkar@gmail.com', 'ak@gmail.com', 'flower', '5', '10', '50', '2020-06-20', 2),
(40, 'omkar@gmail.com', 'abhi@gmail.com', 'shagun garden', '5000', '1', '5000', '2020-06-20', 2),
(41, 'omkar@gmail.com', 'omkar@gmail.com', 'lipstick', '100', '50', '5000', '2020-06-20', 2),
(42, 'omkar@gmail.com', 'ak@gmail.com', 'flower', '5', '5', '25', '2020-06-22', 2),
(43, 'omkar@gmail.com', 'ak@gmail.com', 'flower', '5', '10', '50', '2020-06-27', 1),
(44, 'omkar@gmail.com', 'abhi@gmail.com', 'shagun garden', '5000', '1', '5000', '2020-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` varchar(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
('1', 'decoration'),
('2', 'location'),
('beuty 12', 'beuty '),
('pendal1', 'pendal');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `id` int(5) NOT NULL,
  `event_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`id`, `event_name`) VALUES
(1, 'marrige');

-- --------------------------------------------------------

--
-- Table structure for table `event_reg`
--

CREATE TABLE `event_reg` (
  `event_id` varchar(10) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `event_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_reg`
--

INSERT INTO `event_reg` (`event_id`, `event_name`, `date`, `user_email`, `event_status`) VALUES
('marrige16', 'marrige', '2020-06-20', 'omkar@gmail.com', 1),
('marrige31', 'marrige', '2020-06-11', 'akshay@gmail.com', 0),
('marrige32', 'marrige', '2020-06-12', 'arun@gmail.com', 1),
('marrige40', 'marrige', '2020-06-13', 'arun@gmail.com', 1),
('marrige43', 'marrige', '2020-06-12', 'arun@gmail.com', 1),
('marrige44', 'marrige', '2020-06-27', 'omkar@gmail.com', 1),
('marrige45', 'marrige', '2020-06-11', 'kasalkar16@gmail.com', 1),
('marrige58', 'marrige', '2020-06-13', 'omkar@gmail.com', 1),
('marrige68', 'marrige', '2020-06-22', 'omkar@gmail.com', 1),
('marrige71', 'marrige', '2020-06-20', 'omkar@gmail.com', 1),
('marrige9', 'marrige', '2020-06-19', 'arun@gmail.com', 1),
('marrige98', 'marrige', '2020-06-12', 'ak@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `order_id` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `order_amount` varchar(100) NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`order_id`, `user`, `order_date`, `order_amount`, `event_id`, `event_name`, `event_date`, `order_status`) VALUES
(12, 'omkar@gmail.com', '2020-06-10', '5540', 'marrige58', 'marrige', '2020-06-20', 2),
(13, 'kasalkar16@gmail.com', '2020-06-11', '6050', 'marrige45', 'marrige', '2020-06-11', 2),
(14, 'omkar@gmail.com', '2020-06-11', '10050', 'marrige71', 'marrige', '2020-06-16', 2),
(15, 'omkar@gmail.com', '2020-06-11', '25', 'marrige68', 'marrige', '2020-06-16', 2),
(16, 'omkar@gmail.com', '2020-06-11', '10050', 'marrige16', 'marrige', '0000-00-00', 2),
(17, 'omkar@gmail.com', '2020-06-11', '5050', 'marrige44', 'marrige', '2020-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `email` varchar(100) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_phone` bigint(10) NOT NULL,
  `sup_password` varchar(100) NOT NULL,
  `sup_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`email`, `sup_name`, `sup_phone`, `sup_password`, `sup_category`) VALUES
('a@gmail.com', 'vishal ', 9742526322, '12345', 'wedding'),
('abhi@gmail.com', 'abhishek', 9036109135, '123', 'location'),
('ak@gmail.com', 'akash vijay kasalkar', 9036109136, '123', 'decoration'),
('omkar@gmail.com', 'omkar kasalkar', 9942961125, 'omkar', 'beuty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `phone`, `password`) VALUES
('ak@gmail.com', 'akash123', 9036109135, '123'),
('akshay@gmail.com', 'akshay', 1234567891, '12345'),
('kasalkar16@gmail.com', 'akkya bakkya', 9742526326, '12345'),
('omkar@gmail.com', 'omkar', 9036109135, 'arun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_reg`
--
ALTER TABLE `event_reg`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `event_list`
--
ALTER TABLE `event_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
