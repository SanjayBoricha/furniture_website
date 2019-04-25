-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 10:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(5) NOT NULL,
  `c_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'living room'),
(2, 'entryway & hallway'),
(3, 'kitchen & dining room'),
(4, 'home office'),
(5, 'bedroom'),
(6, 'baby & kids');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `c_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `c_id`, `name`, `price`) VALUES
(1, 1, 'Sofa (2+2+1)', 87000),
(2, 1, 'Sofa (2+2+1)', 82000),
(3, 1, 'Sofa (2+2+1)', 78000),
(4, 1, 'Sofa (2+2+1)', 85000),
(5, 3, 'Lotus Dining Table', 28000),
(6, 3, 'Unique Round Dining Table', 26000),
(7, 2, 'Butterfly Bed', 35000),
(8, 2, 'Daina Bed', 36000),
(9, 2, 'Dalia Bed', 33000),
(10, 2, 'Imperial Bed', 29000),
(11, 2, 'Jerin Bed', 43000),
(13, 2, 'Lotus Bed', 48000),
(14, 2, 'Magnolia Bed', 43000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `sc_id`, `p_name`, `p_image`) VALUES
(1, 1, 'Naples Sofa', 'image/sub_cat/1/1.jpg'),
(2, 1, 'Chronicle Sofa', 'image/sub_cat/1/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `s_id` int(5) NOT NULL,
  `district` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`s_id`, `district`, `location`, `contact_no`) VALUES
(1, 'Dhaka', '75, Kakrail Super Market (2nd floor), Kakrail, Dhaka.', 1711008855),
(2, 'Dhaka', '37, Rampura Market, Rampura, Dhaka.', 1844220055),
(3, 'Dhaka', '22, Sector 6, Uttara, Dhaka.', 1944882200),
(5, 'Dhaka', 'Y Market, Dhanmondi, Dhaka.', 1722885511);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sc_id`, `sc_name`, `category`) VALUES
(1, 'sofas & seating', 'living room'),
(2, 'accent chairs', 'living room'),
(3, 'side tables', 'living room'),
(4, 'coffee tables', 'living room'),
(5, 'TV stands', 'living room'),
(6, 'ottomans', 'living room'),
(7, 'accent stools', 'living room'),
(8, 'console tables', 'entryway & hallway'),
(9, 'cabinets & chests', 'entryway & hallway'),
(10, 'benches', 'entryway & hallway'),
(11, 'dining tables', 'kitchen & dining room'),
(12, 'dining chairs', 'kitchen & dining room'),
(13, 'sideboards & buffets', 'kitchen & dining room'),
(14, 'barstools & counter stools', 'kitchen & dining room'),
(15, 'kitchen & dining sets', 'kitchen & dining room'),
(16, 'desks', 'home office'),
(17, 'desk chairs', 'home office'),
(18, 'bookcases & etageres', 'home office'),
(19, 'filing cabinet', 'home office'),
(20, 'beds', 'bedroom'),
(21, 'nightstands', 'bedroom'),
(22, 'dressers', 'bedroom'),
(23, 'headboards', 'bedroom'),
(24, 'kids beds', 'baby & kids'),
(25, 'kids dressers', 'baby & kids'),
(26, 'gliders & rocking chairs', 'baby & kids'),
(27, 'cribs', 'baby & kids');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` mediumtext NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `email`, `address`, `utype`, `pwd`) VALUES
(1, 'sanjay', 'sanjay@friendfurniture.com', '', 'admin', 'admin'),
(2, 'user', 'user101@gmail.com', '', 'user', 'user123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
