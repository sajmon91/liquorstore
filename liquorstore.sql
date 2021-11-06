-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2021 at 09:24 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liquorstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `best_selling_product`
--

DROP TABLE IF EXISTS `best_selling_product`;
CREATE TABLE IF NOT EXISTS `best_selling_product` (
  `best_id` int(11) NOT NULL AUTO_INCREMENT,
  `best_product_id` int(11) NOT NULL,
  `best_product_qua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `best_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`best_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `best_selling_product`
--

INSERT INTO `best_selling_product` (`best_id`, `best_product_id`, `best_product_qua`, `best_date`) VALUES
(1, 2, '2', '2021-09-08'),
(2, 23, '3', '2021-09-08'),
(3, 8, '4', '2021-09-08'),
(4, 28, '2', '2021-07-07'),
(5, 29, '24', '2021-07-07'),
(6, 29, '1', '2021-09-02'),
(7, 6, '4', '2021-09-07'),
(8, 22, '3', '2021-06-25'),
(9, 22, '3', '2021-06-25'),
(10, 8, '1', '2021-06-25'),
(11, 8, '1', '2021-06-25'),
(12, 8, '2', '2021-06-25'),
(13, 22, '5', '2021-06-29'),
(14, 7, '1', '2021-07-05'),
(15, 29, '2', '2021-07-05'),
(16, 3, '5', '2021-09-07'),
(17, 5, '2', '2021-07-05'),
(18, 8, '3', '2021-07-05'),
(19, 22, '1', '2021-07-05'),
(20, 27, '3', '2021-09-07'),
(21, 21, '2', '2021-09-07'),
(22, 2, '3', '2021-09-09'),
(23, 3, '1', '2021-09-09'),
(24, 23, '1', '2021-09-09'),
(25, 25, '3', '2021-09-10'),
(26, 6, '1', '2021-09-10'),
(27, 26, '2', '2021-09-10'),
(28, 7, '1', '2021-09-10'),
(29, 42, '4', '2021-09-13'),
(30, 42, '1', '2021-09-13'),
(31, 6, '6', '2021-09-13'),
(32, 6, '4', '2021-09-13'),
(33, 30, '7', '2021-09-17'),
(34, 44, '1', '2021-09-17'),
(35, 43, '1', '2021-09-17'),
(36, 42, '1', '2021-09-17'),
(37, 41, '1', '2021-09-17'),
(38, 40, '1', '2021-09-17'),
(39, 39, '1', '2021-09-17'),
(40, 38, '1', '2021-09-17'),
(41, 37, '1', '2021-09-17'),
(42, 36, '1', '2021-09-17'),
(43, 35, '1', '2021-09-17'),
(44, 34, '1', '2021-09-17'),
(45, 33, '1', '2021-09-17'),
(46, 32, '1', '2021-09-17'),
(47, 31, '1', '2021-09-17'),
(48, 30, '1', '2021-09-17'),
(49, 29, '1', '2021-09-17'),
(50, 28, '1', '2021-09-17'),
(51, 27, '1', '2021-09-17'),
(52, 26, '1', '2021-09-17'),
(53, 25, '1', '2021-09-17'),
(54, 24, '1', '2021-09-17'),
(55, 23, '1', '2021-09-17'),
(56, 22, '1', '2021-09-17'),
(57, 21, '1', '2021-09-17'),
(58, 20, '1', '2021-09-17'),
(59, 8, '1', '2021-09-17'),
(60, 7, '1', '2021-09-17'),
(61, 6, '1', '2021-09-17'),
(62, 5, '1', '2021-09-17'),
(63, 3, '1', '2021-09-17'),
(64, 2, '1', '2021-09-17'),
(65, 1, '1', '2021-09-17'),
(66, 38, '1', '2021-09-20'),
(67, 42, '1', '2021-09-20'),
(68, 44, '1', '2021-09-24'),
(69, 43, '1', '2021-09-24'),
(70, 41, '3', '2021-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `buy_now_order`
--

DROP TABLE IF EXISTS `buy_now_order`;
CREATE TABLE IF NOT EXISTS `buy_now_order` (
  `buy_now_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`buy_now_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_now_order`
--

INSERT INTO `buy_now_order` (`buy_now_order_id`, `product_id`, `product_quantity`, `product_price`, `order_status`, `time_stamp`, `full_name`, `address`, `city`, `phone`) VALUES
(1, 28, '2', '40', 'Delivered', '2021-07-07 10:23:31', 'kupac demo', 'Glavna Ulica 33', 'Niš', '987654321'),
(2, 29, '24', '12', 'Delivered', '2021-07-07 10:35:47', 'kupac2 demo2', 'Ulica 12', 'Kruševac', '0147258369'),
(4, 29, '1', '7.5', 'Delivered', '2021-09-02 10:52:55', 'kupac demo', 'Glavna Ulica 33', 'NiÅ¡', '123456789'),
(5, 6, '4', '50', 'Delivered', '2021-09-07 19:27:48', 'Pera Peric', 'Ulica 12', 'Krusevac', '123456789'),
(6, 8, '4', '26', 'Delivered', '2021-09-08 10:58:25', 'kupac Peric', 'Cara Lazara 345', 'Krusevac', '0643584142'),
(9, 1, '5', '35', 'Canceled', '2021-09-10 08:47:20', 'Pera demo2', 'Ulica 12', 'NiÅ¡', '123456789'),
(8, 2, '3', '55', 'Delivered', '2021-09-09 13:17:25', 'kupac2 Peric', 'Glavna Ulica 33', 'Krusevac', '0147258369'),
(10, 42, '4', '200', 'Delivered', '2021-09-13 12:09:22', 'kupac demo', 'Ulica 12', 'Krusevac', '0643584142'),
(11, 6, '4', '50', 'Delivered', '2021-09-13 12:14:01', 'Pera Peric', 'Cara Lazara 345', 'NiÅ¡', '123456789'),
(12, 30, '7', '30', 'Delivered', '2021-09-14 13:34:55', 'Sara Saric', 'Ulica 12', 'Beograd', '0643584142');

-- --------------------------------------------------------

--
-- Table structure for table `buy_now_order_tracking`
--

DROP TABLE IF EXISTS `buy_now_order_tracking`;
CREATE TABLE IF NOT EXISTS `buy_now_order_tracking` (
  `buy_now_order_tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_now_order_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`buy_now_order_tracking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_now_order_tracking`
--

INSERT INTO `buy_now_order_tracking` (`buy_now_order_tracking_id`, `buy_now_order_id`, `status`, `message`, `time_stamp`) VALUES
(1, 1, 'Order sent', 'sent', '2021-09-02 10:12:09'),
(2, 1, 'Delivered', 'del', '2021-09-02 10:12:30'),
(3, 2, 'Delivered', '', '2021-09-02 10:14:02'),
(4, 3, 'Cancelled', '', '2021-09-02 10:26:06'),
(5, 4, 'Order sent', '', '2021-09-07 11:32:24'),
(6, 4, 'Delivered', '', '2021-09-07 11:33:22'),
(7, 5, 'Delivered', '', '2021-09-07 19:28:35'),
(8, 6, 'Delivered', '', '2021-09-08 10:58:51'),
(9, 8, 'Delivered', '', '2021-09-09 13:43:35'),
(10, 9, 'Order sent', '', '2021-09-10 10:05:37'),
(11, 9, 'Cancelled', '', '2021-09-10 10:14:14'),
(12, 9, 'Order sent', '', '2021-09-10 10:18:31'),
(13, 9, 'Canceled', '', '2021-09-10 10:18:38'),
(14, 10, 'Order sent', '', '2021-09-13 12:09:51'),
(15, 10, 'Delivered', '', '2021-09-13 12:10:17'),
(16, 11, 'Delivered', '', '2021-09-13 12:14:31'),
(17, 12, 'Delivered', '', '2021-09-17 13:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `buy_now_total_sale`
--

DROP TABLE IF EXISTS `buy_now_total_sale`;
CREATE TABLE IF NOT EXISTS `buy_now_total_sale` (
  `buy_now_total_sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_now_order_id` int(11) NOT NULL,
  `buy_now_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buy_now_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`buy_now_total_sale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_now_total_sale`
--

INSERT INTO `buy_now_total_sale` (`buy_now_total_sale_id`, `buy_now_order_id`, `buy_now_total`, `buy_now_date`) VALUES
(1, 1, '80', '2021-07-07'),
(2, 2, '288', '2021-07-07'),
(3, 4, '7.5', '2021-09-02'),
(4, 5, '200', '2021-09-07'),
(5, 6, '104', '2021-09-08'),
(6, 8, '165', '2021-09-09'),
(7, 10, '800', '2021-09-13'),
(8, 11, '200', '2021-09-13'),
(9, 12, '210', '2021-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Brandy'),
(2, 'Gin'),
(3, 'Rum'),
(4, 'Tequila'),
(5, 'Vodka'),
(6, 'Whiskey');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_read` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `msg`, `date`, `is_read`) VALUES
(2, 'pera peric', 'demo2@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2021-09-15 11:06:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(11) NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `total_price`, `order_status`, `time_stamp`) VALUES
(1, 1, '105', 'Delivered', '2021-06-25 09:41:41'),
(14, 1, '100', 'Delivered', '2021-09-09 13:14:39'),
(3, 1, '230', 'Delivered', '2021-06-25 09:48:42'),
(13, 1, '290', 'Delivered', '2021-09-08 10:55:31'),
(12, 1, '223', 'Delivered', '2021-09-07 11:31:45'),
(6, 1, '120', 'Delivered', '2021-06-25 10:01:03'),
(11, 1, '139.75', 'Delivered', '2021-07-05 10:45:40'),
(8, 2, '255', 'Delivered', '2021-06-25 10:12:09'),
(9, 1, '52.5', 'Delivered', '2021-06-29 10:10:37'),
(10, 1, '200', 'Delivered', '2021-07-05 10:13:30'),
(15, 1, '84', 'Canceled', '2021-09-10 10:19:09'),
(16, 1, '260', 'Delivered', '2021-09-10 10:31:03'),
(17, 1, '188.5', 'Delivered', '2021-09-10 13:45:48'),
(18, 1, '500', 'Delivered', '2021-09-13 12:12:02'),
(19, 1, '1445', 'Delivered', '2021-09-17 13:45:45'),
(20, 2, '218', 'Delivered', '2021-09-20 14:45:23'),
(21, 4, '311', 'Delivered', '2021-09-24 11:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`order_items_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `product_id`, `product_quantity`, `product_price`, `order_id`) VALUES
(1, 22, '3', '35', 1),
(2, 22, '3', '35', 2),
(3, 22, '3', '35', 3),
(4, 8, '1', '40', 6),
(5, 20, '4', '20', 6),
(6, 8, '1', '40', 7),
(7, 20, '4', '20', 7),
(8, 8, '2', '40', 8),
(9, 22, '5', '35', 8),
(10, 7, '1', '28.5', 9),
(11, 29, '2', '12', 9),
(12, 3, '5', '40', 10),
(13, 5, '2', '19.5', 11),
(14, 8, '3', '26', 11),
(15, 22, '1', '22.75', 11),
(16, 27, '3', '45', 12),
(17, 21, '2', '44', 12),
(18, 2, '2', '55', 13),
(19, 23, '3', '60', 13),
(20, 3, '1', '40', 14),
(21, 23, '1', '60', 14),
(22, 3, '1', '40', 15),
(23, 21, '1', '44', 15),
(24, 25, '3', '70', 16),
(25, 6, '1', '50', 16),
(26, 26, '2', '80', 17),
(27, 7, '1', '28.5', 17),
(28, 42, '1', '200', 18),
(29, 6, '6', '50', 18),
(30, 44, '1', '112', 19),
(31, 43, '1', '100', 19),
(32, 42, '1', '200', 19),
(33, 41, '1', '33', 19),
(34, 40, '1', '30', 19),
(35, 39, '1', '35', 19),
(36, 38, '1', '18', 19),
(37, 37, '1', '15', 19),
(38, 36, '1', '28', 19),
(39, 35, '1', '20', 19),
(40, 34, '1', '15', 19),
(41, 33, '1', '13', 19),
(42, 32, '1', '15', 19),
(43, 31, '1', '31', 19),
(44, 30, '1', '30', 19),
(45, 29, '1', '15', 19),
(46, 28, '1', '40', 19),
(47, 27, '1', '45', 19),
(48, 26, '1', '80', 19),
(49, 25, '1', '70', 19),
(50, 24, '1', '50', 19),
(51, 23, '1', '60', 19),
(52, 22, '1', '35', 19),
(53, 21, '1', '55', 19),
(54, 20, '1', '20', 19),
(55, 8, '1', '40', 19),
(56, 7, '1', '30', 19),
(57, 6, '1', '50', 19),
(58, 5, '1', '30', 19),
(59, 3, '1', '40', 19),
(60, 2, '1', '55', 19),
(61, 1, '1', '35', 19),
(62, 38, '1', '18', 20),
(63, 42, '1', '200', 20),
(64, 44, '1', '112', 21),
(65, 43, '1', '100', 21),
(66, 41, '3', '33', 21);

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

DROP TABLE IF EXISTS `order_tracking`;
CREATE TABLE IF NOT EXISTS `order_tracking` (
  `order_tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_tracking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`order_tracking_id`, `order_id`, `status`, `message`, `time_stamp`) VALUES
(1, 9, 'Delivered', 'pd', '2021-07-04 19:20:19'),
(2, 9, 'Cancelled', 'cl', '2021-07-04 19:20:38'),
(3, 8, 'Order sent', 'sent', '2021-07-04 19:32:43'),
(4, 9, 'Order sent', 'dl', '2021-07-04 19:33:35'),
(5, 9, 'Delivered', 'dl', '2021-07-04 19:33:47'),
(6, 9, 'Order sent', '', '2021-07-05 09:09:09'),
(7, 8, 'Cancelled', '', '2021-07-05 09:33:12'),
(8, 8, 'Cancelled', '', '2021-07-05 09:37:05'),
(9, 8, 'Cancelled', '', '2021-07-05 09:37:26'),
(10, 8, 'Cancelled', '', '2021-07-05 09:39:25'),
(11, 8, 'Cancelled', '', '2021-07-05 09:39:54'),
(12, 8, 'Cancelled', '', '2021-07-05 09:46:13'),
(13, 9, 'Delivered', '', '2021-07-05 09:47:04'),
(14, 8, 'Order sent', '', '2021-07-05 09:49:16'),
(15, 8, 'Order sent', '', '2021-07-05 09:56:06'),
(16, 8, 'Cancelled', '', '2021-07-05 09:56:21'),
(17, 8, 'Delivered', '', '2021-07-05 09:56:25'),
(18, 1, 'Delivered', '', '2021-07-05 10:06:03'),
(19, 10, 'Delivered', '', '2021-07-05 10:13:59'),
(20, 6, 'Delivered', '', '2021-07-05 10:38:21'),
(21, 11, 'Delivered', '', '2021-07-05 10:46:25'),
(22, 1, '', 'aa', '2021-08-30 10:49:06'),
(23, 1, 'Delivered', 'aabb', '2021-08-30 10:49:20'),
(24, 12, 'Order sent', '', '2021-09-07 11:32:11'),
(25, 12, 'Delivered', '', '2021-09-07 11:32:59'),
(26, 13, 'Delivered', '', '2021-09-08 10:55:54'),
(27, 14, 'Order sent', '', '2021-09-09 13:35:46'),
(28, 14, 'Delivered', '', '2021-09-09 13:44:12'),
(29, 15, 'Canceled', '', '2021-09-10 10:19:26'),
(30, 16, 'Order sent', '', '2021-09-10 10:32:07'),
(31, 16, 'Delivered', '', '2021-09-10 13:39:58'),
(32, 17, 'Order sent', '', '2021-09-10 13:46:17'),
(33, 17, 'Delivered', '', '2021-09-10 13:47:02'),
(34, 18, 'Order sent', '', '2021-09-13 12:12:35'),
(35, 18, 'Delivered', '', '2021-09-13 12:12:49'),
(36, 19, 'Delivered', '', '2021-09-17 13:46:16'),
(37, 20, 'Order sent', '', '2021-09-20 14:46:10'),
(38, 20, 'Delivered', '', '2021-09-20 14:46:55'),
(39, 21, 'Order sent', '', '2021-09-24 11:50:56'),
(40, 21, 'Delivered', '', '2021-09-24 11:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_new_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `product_discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `new_badge` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `best_seler_badge` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_img` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_cat`, `product_price`, `product_new_price`, `product_discount`, `new_badge`, `best_seler_badge`, `product_desc`, `product_stock`, `product_img`, `status`) VALUES
(1, 'Citadelle', 2, 35, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 59, 'prod-3.jpg', 1),
(2, 'Jack Daniel`s', 6, 55, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 29, 'prod-10.jpg', 1),
(3, 'Jameson', 6, 40, '', '', 'NEW', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 18, 'prod-8.jpg', 1),
(5, 'Old Monk', 3, 30, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 42, 'prod-7.jpg', 1),
(23, 'Glenfiddich', 6, 60, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 25, 'prod-13.jpg', 1),
(6, 'Black Label', 6, 50, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 4, 'prod-5.jpg', 1),
(7, 'Jim Beam', 6, 30, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 17, 'prod-2.jpg', 1),
(8, 'Bacardi 151', 3, 40, '', '', 'NEW', 'BEST SELLER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 69, 'prod-1.jpg', 1),
(22, 'Plantation', 3, 35, '', '', 'NEW', 'BEST SELLER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 2, 'prod-12.jpg', 1),
(20, 'Absolut Vodka', 5, 20, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 55, 'pexels-ibrahim-unal-3738485.jpg', 1),
(21, 'Gallantry Whiskey', 6, 55, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.\r\n\r\nDonec ullamcorper nunc id ante sodales porta. Curabitur sit amet dolor libero. Aenean eleifend, purus eget pretium porta, erat tortor pulvinar augue, quis pulvinar eros eros eu turpis. Suspendisse potenti. Duis varius congue sem vel vestibulum. Phasellus sollicitudin molestie rutrum. Donec sed justo in', 57, 'pexels-med-yassin-ghaoui-2529468.jpg', 1),
(24, 'Skrewball', 6, 50, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 24, 'prod-9.jpg', 1),
(25, 'Macallan', 6, 70, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 36, 'prod-6.jpg', 1),
(26, 'The Glenlivet', 6, 80, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 12, 'prod-4.jpg', 1),
(27, 'Gran Orendain', 4, 45, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 16, 'kind-4.jpg', 1),
(28, 'Don Ramon', 4, 40, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu ante quis dolor vehicula hendrerit ac ut risus. Nam nunc nisl, posuere et ullamcorper ut, blandit quis quam. Aliquam facilisis lacus dui, vitae laoreet nibh auctor non. Nulla dapibus volutpat metus nec ullamcorper. Curabitur non lacus tellus. Nam sit amet condimentum turpis. Nullam sem nisi, bibendum a mattis at, rhoncus vel turpis. Etiam nisl urna, posuere vitae hendrerit eu, mollis eu enim. Nullam id urna ligula. Quisque a commodo ante, eu vehicula odio. Nulla at leo faucibus, varius eros sit amet, egestas purus. Praesent pretium, metus at posuere rhoncus, enim tortor rhoncus nulla, eget convallis sapien tortor nec turpis. Aenean sed massa ut augue scelerisque aliquam. Curabitur congue ornare condimentum. Aenean rutrum magna sed condimentum consectetur. Curabitur gravida dignissim commodo.\r\n\r\nInteger eget mauris ullamcorper, dignissim magna pulvinar, tristique nisi. Duis egestas lacinia tortor. Nulla facilisi. Nullam a ante mattis, mollis sapien id, accumsan turp', 17, '960x0.jpg', 1),
(29, 'Stock', 1, 15, '', '', '', 'BEST SELLER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed feugiat enim. Vivamus vehicula malesuada lorem, rutrum facilisis diam sagittis ac. Vestibulum mauris turpis, aliquam at volutpat ac, malesuada eget eros. Phasellus leo nulla, feugiat vitae felis sit amet, tincidunt sagittis tortor. Sed vitae ex nec magna laoreet molestie. Ut lacinia neque in fringilla euismod. Sed id mattis mauris. Aenean porttitor nulla quis lacus eleifend, et ultricies turpis malesuada. Pellentesque elementum sem ex, eget semper libero tincidunt non. Aliquam hendrerit fermentum sodales. Nam vel ultricies dui. Nunc in sem vitae tortor condimentum auctor. Nunc nec condimentum nibh. Morbi iaculis nulla sit amet orci fringilla malesuada. Sed et risus ut erat malesuada sagittis.\r\n\r\nProin quis odio gravida, vulputate mauris vitae, maximus eros. Mauris rhoncus libero vitae ante fermentum, sed imperdiet elit accumsan. Cras luctus lorem et arcu aliquam, id h', 9, 'maxresdefault3.jpg', 1),
(30, 'Red Label', 6, 30, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 42, 'eiliv-sonas-aceron-qO2m4HPfXLc-unsplash.jpg', 1),
(31, 'Misunderstood Ginger Spiced', 6, 31, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 29, 'misunderstood-whiskey-UIzcL8G2JnI-unsplash.jpg', 1),
(32, 'Smirnoff', 5, 15, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 34, 'william-warby-nkUtcTb7SOg-unsplash.jpg', 1),
(33, 'Poliakov', 5, 13, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 49, 'paul-einerhand-8xwPoO2rLRM-unsplash.jpg', 1),
(34, 'EsbjÃ¦rg', 5, 15, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 34, 'paul-einerhand-tZDHMFU3Dm0-unsplash.jpg', 1),
(35, 'Jose Cuervo', 4, 20, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 34, 'fidel-fernando-tfLBYGwDews-unsplash.jpg', 1),
(36, 'Espolon', 4, 28, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 29, 'espolon-tequila-oisBatUBtig-unsplash.jpg', 1),
(37, 'Beirao', 1, 15, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 39, 'kind-1.jpg', 1),
(38, 'Havana Club', 3, 18, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 33, 'tim-russmann-z7HzCAdTbfw-unsplash.jpg', 1),
(39, 'Monkey 47', 2, 35, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 29, 'andreas-haslinger-2h0J4-SX2Lg-unsplash.jpg', 1),
(40, 'Hendrick&#39;s', 2, 30, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 24, 'the-blackrabbit-Xp0eirLBKH8-unsplash.jpg', 1),
(41, 'Chivas Regal', 6, 33, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 31, 'josh-appel-iRPK4uSMEmQ-unsplash.jpg', 1),
(42, 'Blue Label', 6, 200, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 13, 'swapnil-dwivedi-0wzTJ_aaA2o-unsplash.jpg', 1),
(43, 'Glenmorangie', 6, 100, '', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 18, 'antonio-castellano-kjmcLq5wIek-unsplash.jpg', 1),
(44, 'Ballantine&#39;s', 6, 140, '112', '20', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie nibh turpis, eu semper mauris eleifend eget. Duis vitae tortor ut libero semper porttitor. Sed orci mauris, egestas in velit sit amet, suscipit vulputate mauris. Integer tincidunt ornare lorem vel dignissim. Pellentesque laoreet erat id nibh accumsan, et imperdiet justo sollicitudin. Donec fringilla hendrerit sollicitudin. Sed eu orci a neque blandit fermentum quis non lorem. Nam pharetra sem id dictum tincidunt.', 23, 'Finest_new_serve.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `testi_id` int(11) NOT NULL AUTO_INCREMENT,
  `testi_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testi_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testi_img` text COLLATE utf8_unicode_ci NOT NULL,
  `testi_text` text COLLATE utf8_unicode_ci NOT NULL,
  `testi_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`testi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testi_id`, `testi_name`, `testi_position`, `testi_img`, `testi_text`, `testi_status`) VALUES
(1, 'John Doe', 'CEO', 'person_1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eum, sint nihil odit reprehenderit dolor eaque?.', 1),
(2, 'Roger Scott', 'Marketing Manager', 'person_2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis tempus ante. Pellentesque tempus, leo nec vestibulum ornare, velit nunc dignissim nulla, vitae accumsan lorem arcu at purus. Donec eget aliquam risus, sit amet pulvinar eros. In ullamcorper suscipit nulla et pulvinar. Nulla eget mauris ut purus', 1),
(3, 'Sarah Parker', 'Menager', 'photo-1544005313-94ddf0286df2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eum, sint nihil odit reprehenderit dolor eaque?.', 1),
(7, 'Mr. Bean', '', 'person_3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eum, sint nihil odit reprehenderit dolor e', 1),
(6, 'John Doe', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eum, sint nihil odit reprehenderit dolor e', 0),
(8, 'Peter Parker', 'Product Manager', 'person_4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eum, sint nihil odit reprehenderit dolor e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_sale`
--

DROP TABLE IF EXISTS `total_sale`;
CREATE TABLE IF NOT EXISTS `total_sale` (
  `total_sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `t_sale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`total_sale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `total_sale`
--

INSERT INTO `total_sale` (`total_sale_id`, `order_id`, `t_sale`, `sale_date`) VALUES
(1, 8, '255', '2021-06-25'),
(2, 1, '105', '2021-06-25'),
(3, 10, '200', '2021-07-05'),
(4, 6, '120', '2021-06-25'),
(5, 11, '139.75', '2021-07-05'),
(6, 1, '105', '2021-09-06'),
(7, 12, '223', '2021-09-07'),
(8, 13, '290', '2021-09-08'),
(9, 14, '100', '2021-09-09'),
(10, 16, '260', '2021-09-10'),
(11, 17, '188.5', '2021-09-10'),
(12, 18, '500', '2021-09-13'),
(13, 19, '1445', '2021-09-17'),
(14, 20, '218', '2021-09-20'),
(15, 21, '311', '2021-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_img` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'head_pete_river.png',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`, `profile_img`) VALUES
(1, 'Stefan', 'Simonovic', 'stefan.sajmon@gmail.com', '$2y$10$pRI1G2xqagfKVqyG75TYc.f3/bCmD9P2wvB8kVOfB.ebTUsjMJKiW', 'admin', 'stefan_simonovic_88957962c6677d3524152876121a07a3d88n.jpeg'),
(2, 'Pera', 'Peric', 'demo@gmail.com', '$2y$10$4D3m5Bs5Md938VLImYR27.xppCFzn1mTeheVJUwEEHsQRMP2r/LYC', 'user', 'bart_sipsons_81422b9ba57950d3900b2c1c3717e12629en.jpeg'),
(4, 'Sara', 'Saric', 'demo3@gmail.com', '$2y$10$RpyKLTIq5cUHYcymCyddH.Jo2K75l.LFvxA7uj4/kK.uLZo/z9Nzq', 'user', 'stefan_simonovic_670ca93c305e86b91bd4d6d4802de776ac4n.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

DROP TABLE IF EXISTS `usersmeta`;
CREATE TABLE IF NOT EXISTS `usersmeta` (
  `usersmeta_id` int(11) NOT NULL AUTO_INCREMENT,
  `usersmeta_user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usersmeta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`usersmeta_id`, `usersmeta_user_id`, `address`, `city`, `phone`) VALUES
(1, 1, 'Ulica 123', 'KruÅ¡evac', '123456789'),
(2, 2, 'Glavna Ulica 33', 'NiÅ¡', '0147258369'),
(3, 4, 'Ulica 12', 'Beograd', '066123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
