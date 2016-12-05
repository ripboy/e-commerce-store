-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2016 at 02:01 AM
-- Server version: 5.5.40-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ashutosh_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'li50@indiana.edu', 'rui'),
(2, 'ashutosh.malvankar@yahoo.in', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(49, '68.45.18.113', 0),
(56, '68.45.18.113', 0),
(58, '68.45.18.113', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Living Room'),
(2, 'BedRoom'),
(3, 'Dining Room'),
(4, 'Patio'),
(5, 'Kitchen'),
(6, 'Chairs');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(7, '::1', 'Ashutosh', 'ashutosh.malvankar@yahoo.in', 'hello', 'India', 'Mumbai', '8123498357', 'Bloomington', '14352613_10207002934256514_3310340136275827723_o.jpg'),
(8, '::1', 'Ashutosh Malvankar', 'ashu1993@gmail.com', 'hello', 'Select a Country', 'Mumbai', '8123498357', '2661 E. 7TH STREET APT H, IN 47408', '14352613_10207002934256514_3310340136275827723_o.jpg'),
(9, '68.45.18.113', 'Rishikesh Pandey', 'rishikesh.330@gmail.com', 'hello', 'United States', 'Bloomington', '8123498727', '2661 E 7th St Apt H', 'rip.jpg'),
(10, '68.45.18.113', 'Rakesh Sharma', 'rakesh@gmail.com', 'hello', 'United States', 'Bloomington', '1234567890', '2661 E 7th St Apt H', 'rip.jpg'),
(11, '68.51.126.65', 'Harish', 'harish.nallagari@gmail.com', 'loyola', 'India', 'India', '3853209', 'idwohfweofh', 'IMG_1320.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(100) NOT NULL AUTO_INCREMENT,
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `status` text NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_id`, `c_id`, `qty`, `invoice_no`, `status`, `order_date`) VALUES
(19, 61, 9, 1, 1648425820, 'in Progress', '2016-12-04'),
(18, 44, 7, 1, 219814282, 'in Progress', '2016-12-04'),
(17, 59, 7, 1, 815858145, 'Completed', '2016-12-04'),
(14, 15, 7, 1, 212140480, 'Completed', '2016-11-28'),
(15, 14, 0, 1, 672767027, 'in Progress', '2016-12-04'),
(16, 42, 7, 1, 763035864, 'in Progress', '2016-12-04'),
(13, 13, 7, 1, 573508488, 'in Progress', '2016-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(100) NOT NULL AUTO_INCREMENT,
  `amount` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `amount`, `customer_id`, `product_id`, `trx_id`, `currency`, `payment_date`) VALUES
(19, 0, 9, 61, '', '', '2016-12-04'),
(18, 0, 7, 44, '', '', '2016-12-04'),
(17, 70, 7, 59, '76W31971CX738721A', 'USD', '2016-12-04'),
(16, 10, 7, 42, '6MB13723W9983332N', 'USD', '2016-12-04'),
(15, 0, 0, 14, '', '', '2016-12-04'),
(14, 40, 7, 15, '0D2302787X798815J', 'USD', '2016-11-28'),
(13, 50, 7, 13, '19U13899K7096423J', 'USD', '2016-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `seller_email`) VALUES
(12, 1, 0, 'Sofa', 300, '<p>This is nice sofa for living room</p>', 'download (1).jpg', 'sofa,living room', 'pandey'),
(13, 1, 0, 'Chair', 50, '<p>This is a nice pink chair for your living room.</p>', 'download.jpg', 'pink, chair', 'ashutosh.malvankar@yahoo.in'),
(14, 2, 1, 'Bed', 200, '<p>It is a nice bed</p>', 'Furniture-06.jpg', 'bed', ''),
(16, 1, 0, 'Sofa', 500, '<p>good</p>', 'download (1).jpg', 'sofa', ''),
(36, 1, 0, 'Sofa1', 30, '<p>Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa. Sample description text of sofa.  </p>', 'sofa1.jpg', 'sofa,white', ''),
(37, 1, 0, 'Sofa2', 20, '<p>This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.</p>', 'sofa2.JPG', 'sofa,blue', ''),
(38, 1, 0, 'Sofa3', 40, '<p>This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.</p>', 'sofa3.jpg', 'sofa,brown', ''),
(39, 1, 0, 'Sofa4', 20, '<p>This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.</p>', 'sofa4.jpg', 'sofa,black', ''),
(40, 1, 0, 'Sofa5', 15, '<p>This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.</p>', 'sofa5.jpg', 'sofa,white', ''),
(41, 1, 0, 'Sofa6', 24, '<p>This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.This is a sofa.</p>', 'sofa6.jpg', 'sofa', ''),
(43, 2, 0, 'Bed1', 25, '<p>This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.</p>', 'bed1.jpg', 'bed', ''),
(45, 2, 0, 'Bed3', 20, '<p>This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.</p>', 'bed3.jpg', 'bed', ''),
(46, 2, 0, 'Bed4', 10, '<p>This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.</p>', 'bed5.JPG', 'bed', ''),
(47, 2, 0, 'Bed5', 20, '<p>This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.This is a bed.</p>', 'bed6.jpg', 'bed', ''),
(48, 3, 0, 'Set1', 15, '<p>This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.</p>', 'sets1.jpg', 'dining', ''),
(49, 3, 0, 'Set2', 10, '<p>This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.</p>', 'set2.jpg', 'dining', ''),
(50, 3, 0, 'Set3', 50, '<p>This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.</p>', 'set3.jpg', 'dining', ''),
(51, 3, 0, 'Set4', 40, '<p>This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.</p>', 'set5.jpg', 'dining', ''),
(52, 3, 0, 'Set5', 25, '<p>This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.This is a dining set.</p>', 'set4.jpg', 'dining', ''),
(53, 4, 0, 'Patio1', 50, '<p>This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.</p>', 'patio1.JPG', 'patio', ''),
(54, 4, 0, 'Patio2', 30, '<p>This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.</p>', 'patio2.jpg', 'patio', ''),
(55, 4, 0, 'Patio3', 20, '<p>This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture</p>', 'patio3.jpg', 'patio', ''),
(56, 4, 0, 'Patio4', 20, '<p>This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture</p>', 'patio4.jpg', 'patio', ''),
(57, 4, 0, 'Patio5', 29, '<p>This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture.This is patio furniture</p>', 'patio5.jpg', 'patio', ''),
(58, 6, 0, 'Chair1', 10, '<p>This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.</p>', 'chair1.jpg', 'chair,grey', ''),
(60, 6, 0, 'Chair3', 10, '<p>This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.</p>', 'chair3.jpg', 'chair', ''),
(62, 6, 0, 'Chair5', 5, '<p>This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.</p>', 'chair5.jpg', 'chair,green', ''),
(63, 6, 0, 'Chair6', 5, '<p>This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.This is a chair.</p>', 'chair6.jpg', 'chair,white', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `p_id` int(10) NOT NULL,
  `review` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`p_id`, `review`, `rating`) VALUES
(11, 'This is a bed. This is a good bed. Good bed is a bad bed. Bad bed is a good bed. If the good bed is the bad bed and the bad bed is the good bed, what is the definition of ''good bed'' or ''bad bed''? What is the definition of ''good'' or ''bad''? Does true evil exist? Why am I writing pseudo-philosophy when I should actually be working be on this project?', 4.2),
(12, '<p>sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa sofa&nbsp;</p>', 3.2),
(13, '<p>pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa pink sofa&nbsp;</p>', 2.1),
(36, 'This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa. This a nice white sofa.', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `seller_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_ip` varchar(255) NOT NULL,
  `seller_name` text NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_pass` varchar(100) NOT NULL,
  `seller_country` text NOT NULL,
  `seller_city` text NOT NULL,
  `seller_contact` varchar(255) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_image` text NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_ip`, `seller_name`, `seller_email`, `seller_pass`, `seller_country`, `seller_city`, `seller_contact`, `seller_address`, `seller_image`) VALUES
(4, '::1', 'Ashutosh', 'ashutosh.malvankar@yahoo.in', 'hello', 'United States', 'Bloomington', '8123498357', '2661 E. 7TH STREET APT H, IN 47408', '14352613_10207002934256514_3310340136275827723_o.jpg'),
(6, '::1', 'Rishikesh Pandey', 'Pandey', 'hello', 'India', 'Kanpur', 'sadadas', 'sadsadas', 'laptop.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`p_id`, `ip_add`, `qty`) VALUES
(12, '68.51.126.65', 0),
(12, '129.79.38.44', 0),
(14, '129.79.38.44', 0),
(49, '68.45.18.113', 0),
(56, '68.45.18.113', 0),
(58, '68.45.18.113', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
