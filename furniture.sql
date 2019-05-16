-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 12:05 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `p_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `sc_id`, `p_name`, `price`, `p_image`) VALUES
(1, 1, 'Naples Sofa', 12000, 'image/sub_cat/1/1.jpg'),
(2, 1, 'Chronicle Sofa', 11500, 'image/sub_cat/1/2.jpg'),
(3, 2, 'abcd', 9560, 'image/sub_cat/2/3.jpg'),
(4, 1, 'sofa', 7890, 'image/sub_cat/1/4.jpg'),
(5, 7, 'abcd', 8230, 'image/sub_cat/7/5.jpg'),
(6, 7, 'chair', 2000, 'image/sub_cat/7/5.jpg'),
(7, 2, 'chair', 5000, 'image/sub_cat/2/6.jpg'),
(8, 2, 'chair', 5000, 'image/sub_cat/2/8.jpg'),
(9, 2, 'chair', 5000, 'image/sub_cat/2/9.jpg'),
(10, 2, 'chair', 5000, 'image/sub_cat/2/10.jpg'),
(11, 1, 'sofa', 3400, 'image/sub_cat/1/11.jpg'),
(12, 2, 'ironman', 3999, 'image/sub_cat/2/12.jpg'),
(13, 16, 'drawer writing desk', 4700, 'image/sub_cat/16/13.jpg'),
(14, 16, 'athens writing desk', 5700, 'image/sub_cat/16/14.jpg'),
(15, 16, 'bel aire melrose glass writing desk', 5699, 'image/sub_cat/16/15.jpg'),
(16, 16, 'big sur solid wood writing desk', 4399, 'image/sub_cat/16/16.jpg'),
(17, 16, 'carlyle solid wood secretary desk', 5200, 'image/sub_cat/16/17.jpg'),
(18, 16, 'cherry creek executive desk', 3480, 'image/sub_cat/16/18.jpg'),
(19, 16, 'clarendon 5 drawer writing desk', 5999, 'image/sub_cat/16/19.jpg'),
(20, 16, 'claudette 3 drawer writing desk', 4299, 'image/sub_cat/16/20.jpg'),
(21, 16, 'clementine court solid wood credenza desk and chair set', 9000, 'image/sub_cat/16/21.jpg'),
(22, 16, 'colette solid wood executive desk', 8499, 'image/sub_cat/16/22.jpg'),
(23, 16, 'curtis desk', 8200, 'image/sub_cat/16/23.jpg'),
(24, 16, 'danforth 7 drawer secretary desk', 6999, 'image/sub_cat/16/24.jpg'),
(25, 16, 'danforth solid wood writing desk', 5850, 'image/sub_cat/16/25.jpg'),
(26, 16, 'dante desk', 4199, 'image/sub_cat/16/26.jpg'),
(27, 16, 'domaine writing desk', 3400, 'image/sub_cat/16/27.jpg'),
(28, 16, 'easton 2 drawer secretary desk', 6500, 'image/sub_cat/16/28.jpg'),
(29, 16, 'elon adjustable standing desk', 6800, 'image/sub_cat/16/29.jpg'),
(30, 16, 'european renaissance ii solid ', 5300, 'image/sub_cat/16/30.jpg'),
(31, 16, 'grand tour toulon 2 drawer writter desk', 4600, 'image/sub_cat/16/31.jpg'),
(32, 16, 'greystone executive desk', 6200, 'image/sub_cat/16/32.jpg'),
(33, 16, 'hollywood swank 5 drawer executive desk', 4499, 'image/sub_cat/16/33.jpg'),
(34, 16, 'house blend writing desk', 5200, 'image/sub_cat/16/34.jpg'),
(35, 16, 'kidney solid wood oval executive desk', 5600, 'image/sub_cat/16/35.jpg'),
(36, 16, 'kingstown admiralty solid wood desk', 8300, 'image/sub_cat/16/36.jpg'),
(37, 16, 'kingstown admiralty solid wood executive desk', 8300, 'image/sub_cat/16/37.jpg');

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
  `pwd` varchar(100) NOT NULL
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
