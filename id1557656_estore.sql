-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2017 at 05:37 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1557656_estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands_info`
--

CREATE TABLE `brands_info` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands_info`
--

INSERT INTO `brands_info` (`brand_id`, `brand_title`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Lenovo'),
(4, 'Apple'),
(5, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE `cart_info` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_info`
--

INSERT INTO `cart_info` (`cart_id`, `product_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `quantity`, `price`, `total_amount`) VALUES
(107, 2, '0', 11, 'Apple iphone 5s', 'iphone5s.jpg', 1, 350, 350),
(108, 1, '0', 11, 'Samsung Galaxy', 'Samsung Galaxy.jpg', 1, 300, 300),
(109, 1, '0', 10, 'Samsung Galaxy', 'Samsung Galaxy.jpg', 1, 300, 300),
(110, 2, '0', 10, 'Apple iphone 5s', 'iphone5s.jpg', 1, 350, 350);

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE `category_info` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Mobile Phones'),
(3, 'Furniture'),
(4, 'Home Appliances'),
(5, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(100) NOT NULL,
  `pname` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `uid`, `pid`, `pname`, `qty`, `price`, `total`) VALUES
(1, 10, 0, 'shirt', 0, 30, 0),
(2, 10, 4, 'shirt', 1, 30, 30),
(3, 10, 10, 'Lenovo Yoga', 1, 400, 400),
(4, 10, 1, 'Samsung Gal', 1, 300, 300),
(5, 10, 3, 'brown sofa', 2, 150, 300),
(6, 10, 4, 'shirt', 1, 30, 30),
(7, 10, 24, 'White T-Shi', 2, 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `product_cat`, `product_brand`, `product_price`, `product_desc`, `product_img`, `product_keywords`, `product_title`) VALUES
(1, 2, 1, 300, 'Samsung Galaxy', 'Samsung Galaxy.jpg', 'samsung galaxy', 'Samsung Galaxy'),
(2, 2, 4, 350, 'Apple Iphone 5s', 'iphone5s.jpg', 'iphone apple 5s', 'Apple iphone 5s'),
(3, 3, NULL, 150, 'brown sofa', 'brown sofa.jpeg', 'brown sofa furniture', 'brown sofa'),
(4, 5, NULL, 30, 'shirt', 'shirt.jpg', 'shirt clothing', 'shirt'),
(6, 3, NULL, 520, 'sofa', 'sofa.jpg', 'sofa', 'sofa'),
(8, 4, NULL, 400, 'dining', 'dining.jpg', 'dining', 'dining'),
(9, 1, 4, 1000, 'apple macbook', 'macbook.jpg', 'apple macbook laptop', 'Apple Macbook'),
(10, 1, 3, 400, 'lenovo yoga', 'lenovo.jpg', 'lenovo yoga laptop', 'Lenovo Yoga'),
(11, 1, 5, 450, 'hp notebook', 'hpnotebook.jpg', 'hp notebook laptop', 'HP Notebook'),
(12, 1, NULL, 500, 'dell inspiron', 'inspiron.jpg', 'dell inspiron laptop', 'Dell Inspiron'),
(13, 5, NULL, 45, 'jeans denim', 'jeans.jpg', 'jeans denim blue', 'Denim Jeans'),
(14, 5, NULL, 30, 'shirt', 'shirt2.jpg', 'shirt clothing', 'Shirt'),
(15, 4, 1, 850, 'refrigerator', 'fridge.jpg', 'refrigerator home appliances', 'Smart Refrigerator'),
(16, 4, 1, 500, 'washing machine', 'washing.jpg', 'washing machine  home appliances', 'Washing Mechine'),
(17, 4, NULL, 75, 'toaster', 'toaster.jpg', 'toaster  home appliances', 'Toaster'),
(18, 4, NULL, 375, 'dish washer', 'dishwasher.jpg', 'dish washer  home appliances', 'Dish Washer'),
(19, 4, NULL, 250, 'microwave oven', 'oven.jpg', 'microwave oven home appliances', 'Microwave Oven'),
(20, 4, NULL, 700, 'washer and dryer', 'washerdryer.jpg', 'washer dryer electric home appliances', 'Spacemaker Washer and Electric Dryer'),
(21, 4, NULL, 100, 'mixer', 'mixer.jpg', 'mixer home appliances', 'Mixer'),
(22, 2, NULL, 250, 'motorola moto g4', 'motog4.jpg', 'motorola g4 mobile phone smart', 'Motorola MotoG4'),
(23, 2, NULL, 200, 'BLU smartphone', 'blu.jpg', 'mobile phone smart blu', 'BLU Smartphone'),
(24, 5, NULL, 15, 'tshirt white', 'whitetshirt.jpg', 'tshirt clothing white', 'White T-Shirt'),
(25, 3, NULL, 300, 'sofa three seater', 'sofa3.jpeg', 'sofa furniture ', 'Sofa 3-Seater');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user information';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(10, 'Mahesh', 'Rebba', 'mahesh@gmail.com', '8d6de4d8d0a49877b202993eb938b6fb', 6183036949, 'adrs1', 'adrs2'),
(11, 'John', 'Wick', 'john@gmail.com', '1e590cba2a09847b17afb2cce0deeecf', 6185236948, 'adrs1', 'adrs2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_info`
--
ALTER TABLE `category_info`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_info`
--
ALTER TABLE `cart_info`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `category_info`
--
ALTER TABLE `category_info`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
