-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2015 at 05:53 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `acer`
--

CREATE TABLE IF NOT EXISTS `acer` (
`id` mediumint(8) unsigned NOT NULL,
  `acer_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(45) NOT NULL,
  `price` decimal(5,2) unsigned NOT NULL,
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `details` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acer`
--

INSERT INTO `acer` (`id`, `acer_id`, `name`, `description`, `image`, `price`, `stock`, `date_created`, `details`, `company`) VALUES
(13, 1, 'skull candy', 'file/s5_des.txt', 'file/hn.jpg', '40.00', 12, '2015-03-12 07:06:22', 'file/lappy.txt', 'skull_candy');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address1` varchar(80) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` mediumint(5) unsigned zerofill NOT NULL,
  `u_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `card_no` int(4) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `first_name`, `last_name`, `address1`, `city`, `state`, `zip`, `u_id`, `order_id`, `card_no`, `amount`) VALUES
(3, 'arpit', 'singh', 'dkvlkvl', 'durgapur', 'AL', 45678, 1, 1, 6028, '24'),
(4, 'arpit', 'singh', 'dkvlkvl', 'durgapur', 'KY', 45678, 1, 4, 6028, '24'),
(5, 'arpit', 'singh', 'dkvlkvl', 'durgapur', 'IN', 45678, 1, 4, 6028, '24'),
(6, 'khhh', 'lkjhg', 'polikjuh', 'lkjhgb', 'AL', 12345, 10, 5, 6028, '231792');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
`id` int(10) unsigned NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  `u_id` char(32) NOT NULL,
  `product_type` varchar(45) NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `quantity`, `u_id`, `product_type`, `product_id`, `date_created`, `date_modified`, `subtotal`) VALUES
(34, 1, '1', 'Mobiles', 3, '2015-03-12 07:18:57', '0000-00-00 00:00:00', '45'),
(33, 7, '1', 'Mobiles', 1, '2015-03-12 05:27:12', '0000-00-00 00:00:00', '168'),
(35, 255, '10', 'Mobiles', 1, '2015-03-12 07:44:20', '0000-00-00 00:00:00', '6144'),
(36, 1, '10', 'Mobiles', 3, '2015-03-12 09:10:03', '0000-00-00 00:00:00', '45');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `product_type` varchar(45) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE IF NOT EXISTS `laptops` (
`id` mediumint(8) unsigned NOT NULL,
  `lappy_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(45) NOT NULL,
  `price` decimal(5,2) unsigned NOT NULL,
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `details` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `lappy_id`, `name`, `description`, `image`, `price`, `stock`, `date_created`, `details`, `company`) VALUES
(2, 1, 'lenevo G500', 'file/s5_des.txt', 'file/lenevi.jpeg', '54.00', 44, '2015-03-05 08:00:00', 'file/lappy.txt', 'lenevo'),
(10, 2, 'Dell Insprion', 'file/s5_des.txt', 'file/dell.jpeg', '44.00', 3, '2015-03-12 06:37:58', 'file/lappy.txt', 'DELL'),
(11, 3, 'Toshiba', 'file/s5_des.txt', 'file/toshiba.jpeg', '45.00', 3, '2015-03-12 06:39:52', 'file/lappy.txt', 'Toshiba'),
(12, 4, 'acer', 'file/s5_des.txt', 'file/acer.jpeg', '34.00', 3, '2015-03-12 06:41:44', 'file/lappy.txt', 'acer');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE IF NOT EXISTS `mobiles` (
`id` mediumint(8) unsigned NOT NULL,
  `mob_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(45) NOT NULL,
  `price` decimal(5,2) unsigned NOT NULL,
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `details` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `mob_id`, `name`, `description`, `image`, `price`, `stock`, `date_created`, `details`, `company`) VALUES
(1, 1, 'Titanium S5', 'file/s5_des.txt', 'file/bit.jpeg', '24.00', 10, '2015-03-05 08:00:00', 'file/s5.txt', 'karbonn'),
(3, 2, 'xolo', 'file/s5.txt', 'file/xolo.jpg', '45.00', 44, '2015-03-12 07:00:00', 'file/s5.txt', 'xolo'),
(4, 3, 'mbolt', 'file/s5.txt', 'file/mbolt.jpg', '45.00', 24, '2015-03-12 05:59:03', 'file/s5.txt', 'micromax'),
(5, 4, 'mcanvas', 'file/s5.txt', 'file/mcanvas.jpg', '45.00', 33, '2015-03-12 06:01:38', 'filr/mcanvas.txt', 'micromax'),
(6, 5, 'intex', 'file/s5.txt', 'file/intex.jpg', '34.00', 4, '2015-03-12 06:03:19', 'file/intex.txt', 'Intex'),
(7, 6, 'infocus', 'file/s5.txt', 'file/infocus.jpg', '34.00', 3, '2015-03-12 06:04:33', 'file/infocus.txt', 'intex'),
(8, 7, 'iball', 'file/s5.txt', 'file/iball.jpg', '45.00', 4, '2015-03-12 06:06:03', 'file/iball.txt', 'karbonn'),
(9, 8, 'zen', 'file/s5.txt', 'file/zen.jpg', '999.99', 5, '2015-03-12 06:11:51', 'file/xolo.txt', 'karbonn');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address1` varchar(80) NOT NULL,
  `address2` varchar(80) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip` int(6) unsigned zerofill NOT NULL,
  `phone` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_id` int(10) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `date_created`, `u_id`, `total`) VALUES
(2, 'arpit', 'singh', 'dkvlkvl', 'skkdkdv', 'durgapur', 'AL', 045678, 2147483647, '2015-03-12 04:16:25', 1, '24'),
(3, 'arpit', 'singh', 'dkvlkvl', 'skkdkdv', 'durgapur', 'AL', 045678, 2147483647, '2015-03-12 04:17:01', 1, '24'),
(1, 'Arpit', 'Singh', '37 chandranagar society,ahmedabad', 'nit durgapur hall 3 103', 'durgapur', 'IN', 380008, 2147483647, '2015-03-10 08:45:08', 1, '24'),
(4, 'arpit', 'singh', 'dkvlkvl', 'dddsfs', 'durgapur', 'AL', 045678, 2147483647, '2015-03-12 04:19:31', 1, '24'),
(5, 'Arpit', 'Singh', '37 chandranagar society,ahmedabad', 'nit durgapur hall 3 103', 'durgapur', 'IN', 380008, 2147483647, '2015-03-12 09:05:52', 10, '231792'),
(6, 'Arpit', 'Singh', '37 chandranagar society,ahmedabad', 'nit durgapur hall 3 103', 'durgapur', 'IN', 380008, 2147483647, '2015-03-12 09:07:13', 10, '231792'),
(7, 'Arpit', 'Singh', '37 chandranagar society,ahmedabad', 'nit durgapur hall 3 103', 'durgapur', 'IN', 380008, 2147483647, '2015-03-12 09:47:07', 10, '6189');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `response_code` tinyint(1) unsigned NOT NULL,
  `response_reason` tinytext,
  `transaction_id` bigint(20) unsigned NOT NULL,
  `response` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `type` enum('member','admin') NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pass` varbinary(32) DEFAULT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_expires` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `email`, `pass`, `first_name`, `last_name`, `date_expires`, `date_created`, `date_modified`) VALUES
(1, 'member', 'singharpit', 'arpitsinghnitd@gmail.com', 0x243078adb381510ad758d7456f01c2b96621b318f3997c955dead9046b1737e0, 'Arpit', 'Singh', '2015-03-06', '2015-03-08 00:46:28', '0000-00-00 00:00:00'),
(2, 'member', 'singharpit94', 'singh_topper@yahoo.co.in', 0x243078adb381510ad758d7456f01c2b96621b318f3997c955dead9046b1737e0, 'Arpit', 'Singh', '2015-03-06', '2015-03-08 00:58:16', '0000-00-00 00:00:00'),
(3, 'member', 'surya545', 'asdsd@gmail.com', 0x7fd2424b2556537b2ba057fea4337b764a42cda64aeba2cc931d4cf71f9beee5, 'Surya', 'Singh', '2015-03-06', '2015-03-08 01:02:44', '0000-00-00 00:00:00'),
(4, 'member', 'sudhani', 'jskjdkjdf@gmail.com', 0x243078adb381510ad758d7456f01c2b96621b318f3997c955dead9046b1737e0, 'Arpit', 'Singh', '2015-03-06', '2015-03-08 01:17:58', '0000-00-00 00:00:00'),
(5, 'member', 'insane', 'kumarneetesh24@gmail.com', 0x02efa40f64438cc7e9fe0e20e3a88c0be0b2f387b1408b299be384a90c1b52a4, 'Nk', 'kumar', '2015-03-06', '2015-03-08 07:00:54', '0000-00-00 00:00:00'),
(6, 'member', 'sweetsammy', 'sammy@gmail.com', 0x4a252cd82d0846369f6db7220bfce41c3c07998f24943b0c11e8ef426549c89c, 'Sammita', 'Chakravarti', '2015-03-07', '2015-03-08 10:37:17', '0000-00-00 00:00:00'),
(7, 'member', 'sanmario', 'san@mario.com', 0x888399fd503a21481f004272dd133bd490209b0657f63ce92c77d5ea1ea81574, 'san', 'mario', '2015-03-07', '2015-03-08 23:35:06', '0000-00-00 00:00:00'),
(8, 'member', 'parakh94', 'parakhbansalpbt@gmail.com', 0x25e3c1b7d95cd5f9a3aa2973a5cf58a310998821688d4951039064366a229295, 'Parakh', 'Bansal', '2015-03-08', '2015-03-09 19:03:48', '0000-00-00 00:00:00'),
(9, 'member', 'SHKTImaaaN', 'shikharsrv3@gmail.com', 0x0d9cf6c8f4d64896a2f7931e64cc0a1caaf0da8283d75f6fb4dda11b82d6d295, 'shikhar', 'SRIVASTava', '2015-03-10', '2015-03-11 08:23:57', '0000-00-00 00:00:00'),
(10, 'member', 'skishor444', 'saurabhkishor444@gmail.com', 0xb73e98e3cde8f4d5c8015c7776f4e0fedbf58eb2e1652b0dba0ea5c4bb0c369b, 'saurabh', 'kishor', '2015-03-11', '2015-03-12 07:43:20', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acer`
--
ALTER TABLE `acer`
 ADD PRIMARY KEY (`id`), ADD KEY `non_coffee_category_id` (`acer_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
 ADD PRIMARY KEY (`id`), ADD KEY `product_type` (`product_type`,`product_id`), ADD KEY `user_session_id` (`u_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
 ADD PRIMARY KEY (`id`), ADD KEY `non_coffee_category_id` (`lappy_id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
 ADD PRIMARY KEY (`id`), ADD KEY `non_coffee_category_id` (`mob_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acer`
--
ALTER TABLE `acer`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
