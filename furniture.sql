-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 07:45 AM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`) VALUES
(1, 'ModShop', 'ModShop offers an eclectic mix of fashion forward furniture for the home. Owners, John and Taryn Bernard design all of the pieces, drawing inspiration from vintage stores, mid-century modern design, architecture, and the glitz and glam of the old Hollywood Regency era. Over the years, ModShop has worked with many of Hollywood\'s hottest celebrities and designers, making fabulous custom furnishings across the country.'),
(2, 'Lexington', '100+ years of furniture-making. Over a dozen collections. Whatever your style, Lexington has furniture to match, from wood to upholstery.');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `Q` mediumtext NOT NULL,
  `A` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `Q`, `A`) VALUES
(1, 'What does this Protection Plan cover?', 'This plan covers all accidental stains as well as accidental damage to your furniture.'),
(2, 'What\'s covered under \"accidental damage?', 'In terms of accidental damage, this plan covers all unintentional stains, rips, tears, burns, punctures, gouges, chips, dents, and water rings.'),
(3, 'Once I\'ve purchased a plan, when does my coverage begin?', 'Coverage for accidental damage begins the day your product is delivered.'),
(4, 'What isn\'t covered by this plan?', 'This plan does not cover damages caused by accumulation, neglect, abuse, or failure to comply with the manufacturer’s warranty. It also does not cover damages caused by natural disasters such as a fire or flooding, or furniture used in commercial settings.'),
(5, 'How do I submit a claim?', 'You can submit a claim to Uniters on their website or app, or give them a call at the phone number listed on your Protection Plan certificate.'),
(6, 'Will I have to pay a deductible?', 'Nope!'),
(7, 'Can I cancel my plan?', 'You can cancel your plan for a full refund within 30 days of purchase. After 30 days, your refund will be prorated. Any previous claims or an administrative fee may be deducted from your refund.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `Product Type` varchar(30) NOT NULL,
  `Design` varchar(30) NOT NULL,
  `Seating Capacity` int(4) NOT NULL,
  `Upholstery Material` varchar(30) NOT NULL,
  `Leg Color` varchar(30) NOT NULL,
  `Pattern` varchar(20) NOT NULL,
  `Frame Material` varchar(30) NOT NULL,
  `Seat Fill Material` varchar(30) NOT NULL,
  `Back Fill Material` varchar(30) NOT NULL,
  `Seat Construction` varchar(30) NOT NULL,
  `Removable Cushions` tinyint(1) NOT NULL,
  `Removable Cushion Location` varchar(30) NOT NULL,
  `Removable Cushion Cover` tinyint(1) NOT NULL,
  `Upholstery Grade` varchar(10) NOT NULL,
  `Seat Style` varchar(30) NOT NULL,
  `Back Type` varchar(30) NOT NULL,
  `Toss Pillows Included` tinyint(1) NOT NULL,
  `Country of Origin` varchar(30) NOT NULL,
  `Weight Capacity` varchar(30) NOT NULL,
  `Commercial Warranty` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `p_id`, `Product Type`, `Design`, `Seating Capacity`, `Upholstery Material`, `Leg Color`, `Pattern`, `Frame Material`, `Seat Fill Material`, `Back Fill Material`, `Seat Construction`, `Removable Cushions`, `Removable Cushion Location`, `Removable Cushion Cover`, `Upholstery Grade`, `Seat Style`, `Back Type`, `Toss Pillows Included`, `Country of Origin`, `Weight Capacity`, `Commercial Warranty`) VALUES
(1, 1, 'Sofa', 'Standard', 4, 'Velvet', 'Walnut', 'Solid', 'Wood', 'Foam; Down', 'Blend Down', 'Sinuous Wire', 1, 'Seat; Back', 0, 'A', 'Single cushion seat', 'Cushion back', 0, 'China', '700 Pounds', 0),
(2, 2, 'Sofa', 'Standard', 4, 'Polyester Blend', 'Nouveau', 'Chevron', 'Wood', 'Ultra Down', 'Blend Down', 'Sinuous Wire', 0, '', 0, '', 'Multiple cushion seat', 'Cushion back', 0, 'United States', '600 Pounds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `more` longtext NOT NULL,
  `p_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `sc_id`, `p_name`, `price`, `brand`, `description`, `more`, `p_image`) VALUES
(1, 1, 'Naples Sofa', 12000, 'ModShop', 'Modern Italian styling meets ModShop eclectic sensibility with the new Naples sofa. The thin frame and luxurious cushions means this sofa carries a light and airy feel, like a Mediterranean breeze, and offers a great level of comfort. Finished here in emerald velvet fabric and the custom walnut cone legs.', 'When you buy a ModShop Naples Sofa online from Perigold, we make it as easy as possible for you to find out when your product will be delivered. Read customer reviews and common Questions and Answers for ModShop Part #: SOF0013 on this page. If you have any questions about your purchase or any other product for sale, our customer service representatives are available to help. Whether you just want to buy a ModShop Naples Sofa or shop for your entire home, Perigold has the perfect piece for you.', 'image/sub_cat/1/1.jpg'),
(2, 1, 'Chronicle Sofa', 11500, 'Lexington', 'The trend in interior design continues to move in a decidedly contemporary direction, while lifestyle aspirations are becoming increasingly casual. This juxtaposition creates a unique opportunity for a fresh approach to styling that blends elements of both. This product features clean lines, a relaxed taupe-gray finish, contemporary hand-forged metal designs in burnished silver leaf, and soft textural fabrics on custom upholstered seating. The result is a sophisticated take on the casual contemporary style. There is an urban edge to the design aesthetic that makes a strong statement, while the casual finish and relaxed fabrics offer elegant restraint.', 'When you buy a Lexington Chronicle Sofa online from Perigold, we make it as easy as possible for you to find out when your product will be delivered. Read customer reviews and common Questions and Answers for Lexington Part #: 01-7910-33-40 / 01-7910-33-41 on this page. If you have any questions about your purchase or any other product for sale, our customer service representatives are available to help. Whether you just want to buy a Lexington Chronicle Sofa or shop for your entire home, Perigold has the perfect piece for you.', 'image/sub_cat/1/2.jpg'),
(3, 2, 'abcd', 9560, '', '', '', 'image/sub_cat/2/3.jpg'),
(4, 1, 'sofa', 7890, '', '', '', 'image/sub_cat/1/4.jpg'),
(5, 7, 'abcd', 8230, '', '', '', 'image/sub_cat/7/5.jpg'),
(6, 7, 'chair', 2000, '', '', '', 'image/sub_cat/7/5.jpg'),
(7, 2, 'chair', 5000, '', '', '', 'image/sub_cat/2/6.jpg'),
(8, 2, 'chair', 5000, '', '', '', 'image/sub_cat/2/8.jpg'),
(9, 2, 'chair', 5000, '', '', '', 'image/sub_cat/2/9.jpg'),
(10, 2, 'chair', 5000, '', '', '', 'image/sub_cat/2/10.jpg'),
(11, 1, 'sofa', 3400, '', '', '', 'image/sub_cat/1/11.jpg'),
(12, 2, 'ironman', 3999, '', '', '', 'image/sub_cat/2/12.jpg'),
(13, 16, 'drawer writing desk', 4700, '', '', '', 'image/sub_cat/16/13.jpg'),
(14, 16, 'athens writing desk', 5700, '', '', '', 'image/sub_cat/16/14.jpg'),
(15, 16, 'bel aire melrose glass writing desk', 5699, '', '', '', 'image/sub_cat/16/15.jpg'),
(16, 16, 'big sur solid wood writing desk', 4399, '', '', '', 'image/sub_cat/16/16.jpg'),
(17, 16, 'carlyle solid wood secretary desk', 5200, '', '', '', 'image/sub_cat/16/17.jpg'),
(18, 16, 'cherry creek executive desk', 3480, '', '', '', 'image/sub_cat/16/18.jpg'),
(19, 16, 'clarendon 5 drawer writing desk', 5999, '', '', '', 'image/sub_cat/16/19.jpg'),
(20, 16, 'claudette 3 drawer writing desk', 4299, '', '', '', 'image/sub_cat/16/20.jpg'),
(21, 16, 'clementine court solid wood credenza desk and chair set', 9000, '', '', '', 'image/sub_cat/16/21.jpg'),
(22, 16, 'colette solid wood executive desk', 8499, '', '', '', 'image/sub_cat/16/22.jpg'),
(23, 16, 'curtis desk', 8200, '', '', '', 'image/sub_cat/16/23.jpg'),
(24, 16, 'danforth 7 drawer secretary desk', 6999, '', '', '', 'image/sub_cat/16/24.jpg'),
(25, 16, 'danforth solid wood writing desk', 5850, '', '', '', 'image/sub_cat/16/25.jpg'),
(26, 16, 'dante desk', 4199, '', '', '', 'image/sub_cat/16/26.jpg'),
(27, 16, 'domaine writing desk', 3400, '', '', '', 'image/sub_cat/16/27.jpg'),
(28, 16, 'easton 2 drawer secretary desk', 6500, '', '', '', 'image/sub_cat/16/28.jpg'),
(29, 16, 'elon adjustable standing desk', 6800, '', '', '', 'image/sub_cat/16/29.jpg'),
(30, 16, 'european renaissance ii solid ', 5300, '', '', '', 'image/sub_cat/16/30.jpg'),
(31, 16, 'grand tour toulon 2 drawer writter desk', 4600, '', '', '', 'image/sub_cat/16/31.jpg'),
(32, 16, 'greystone executive desk', 6200, '', '', '', 'image/sub_cat/16/32.jpg'),
(33, 16, 'hollywood swank 5 drawer executive desk', 4499, '', '', '', 'image/sub_cat/16/33.jpg'),
(34, 16, 'house blend writing desk', 5200, '', '', '', 'image/sub_cat/16/34.jpg'),
(35, 16, 'kidney solid wood oval executive desk', 5600, '', '', '', 'image/sub_cat/16/35.jpg'),
(36, 16, 'kingstown admiralty solid wood desk', 8300, '', '', '', 'image/sub_cat/16/36.jpg'),
(37, 16, 'kingstown admiralty solid wood executive desk', 8300, '', '', '', 'image/sub_cat/16/37.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `weights_dimensions`
--

CREATE TABLE `weights_dimensions` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `Overall` varchar(30) NOT NULL,
  `Seat` varchar(30) NOT NULL,
  `Leg Height - Top to Bottom` varchar(20) NOT NULL,
  `Arm Height - Floor to Arm` varchar(20) NOT NULL,
  `Overall Product Weight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weights_dimensions`
--

INSERT INTO `weights_dimensions` (`id`, `p_id`, `Overall`, `Seat`, `Leg Height - Top to Bottom`, `Arm Height - Floor to Arm`, `Overall Product Weight`) VALUES
(1, 1, '31\'\' H x 96\'\' W x 34\'\' D', '16\'\' H x 90\'\' W x 24\'\' D', '7\'\'', '22\'\'', '150 lb.'),
(2, 2, '37\'\' H x 99\'\' W x 41\'\' D', '19\'\' H x 85\'\' W x 25.5\'\' D', '', '', '152 lb.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `weights_dimensions`
--
ALTER TABLE `weights_dimensions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- AUTO_INCREMENT for table `weights_dimensions`
--
ALTER TABLE `weights_dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
