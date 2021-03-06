-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 09:44 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_entity`
--

CREATE TABLE `admin_entity` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass_word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_entity`
--

INSERT INTO `admin_entity` (`id`, `username`, `pass_word`) VALUES
(1, 'Posi', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `available` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `product_name`, `price`, `product_description`, `available`) VALUES
(10, 'Shirtandgowns', 'cloth_2.jpg', 'Polo Shirt', '1500', 'GOOD PRODUCT', '5'),
(11, 'Cardigan', 'children1.jpg', 'Kids Cardigan', '2500', 'GOOD PRODUCT', '1'),
(12, 'Sneakersandcaps', 'arrivel_1.png', 'Unisex Cap', '2000', 'GOOD PRODUCT', '2'),
(13, 'Sneakersandcaps', 'arrivel_5.png', 'Nice Sneakers', '1200', 'GOOD PRODUCT', '2'),
(14, 'Cardigan', 'arrivel_4.png', 'Long Sleeve Cardigan', '1200', 'GOOD PRODUCT', '4'),
(15, 'Shirtandgowns', 'arrivel_21.png', 'Men T-shirt', '3500', 'GOOD PRODUCT', '2'),
(16, 'Shirtandgowns', 'arrivel_3.png', 'Shirts', '5000', 'GOOD PRODUCT', '4'),
(17, 'Sneakersandcaps', 'hero_1.png', 'White Sneakers', '10000', 'VERY GOOD PRODUCT', '4'),
(18, 'Cardigan', 'children.jpg', 'Adult Cardigans', '4000', 'ANOTHER GOOD PRODUCT', '4');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `title`) VALUES
(1, 'Shirtandgowns'),
(2, 'Cardigan'),
(3, 'Sneakersandcaps');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(11) NOT NULL,
  `fandl` varchar(100) NOT NULL,
  `add_ress` varchar(150) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state_city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sta_tus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `fandl`, `add_ress`, `postal`, `city`, `state_city`, `phone`, `sta_tus`) VALUES
(1, 'ekf', ' efeg', '555', 'eegg', 'eegeg', '6515', 'ON'),
(2, 'Me and you', ' Behind myself', '201554', 'ibadan', 'Oyo state', '08545265256', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `user_entity`
--

CREATE TABLE `user_entity` (
  `id` int(11) NOT NULL,
  `f_name` varchar(180) NOT NULL,
  `l_name` varchar(180) NOT NULL,
  `sex` varchar(180) NOT NULL DEFAULT 'Undefined',
  `email` varchar(20) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `home_add` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_entity`
--

INSERT INTO `user_entity` (`id`, `f_name`, `l_name`, `sex`, `email`, `pass_word`, `home_add`, `phone`, `zip`) VALUES
(2, 'Myself', 'I', 'Male', 'me@mail.com', 'pass', 'home add', '589509393', '479580553');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_entity`
--
ALTER TABLE `admin_entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_entity`
--
ALTER TABLE `user_entity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_entity`
--
ALTER TABLE `admin_entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_entity`
--
ALTER TABLE `user_entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
