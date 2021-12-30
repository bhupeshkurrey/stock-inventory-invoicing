-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2019 at 08:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Electronics'),
(2, 'Furnitures'),
(3, 'Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(50) NOT NULL,
  `cl_mobile` varchar(12) DEFAULT NULL,
  `cl_email` varchar(30) DEFAULT NULL,
  `cl_address` varchar(150) DEFAULT NULL,
  `cl_detail` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_name`, `cl_mobile`, `cl_email`, `cl_address`, `cl_detail`) VALUES
(1, 'Cash', NULL, NULL, NULL, NULL),
(2, 'Shekhar', '9907895326', 'shekhar@gmail.com', 'Radhaswami Nagar, Raipur', 'Friend'),
(3, 'Raja Chouhan', '7694985378', 'raja@gmail.com', 'Tilda, Raipur', '');

-- --------------------------------------------------------

--
-- Table structure for table `estimatedetail`
--

DROP TABLE IF EXISTS `estimatedetail`;
CREATE TABLE IF NOT EXISTS `estimatedetail` (
  `est_sno` int(11) NOT NULL AUTO_INCREMENT,
  `est_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_rate` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_discount` int(11) NOT NULL,
  `prod_amount` int(11) NOT NULL,
  PRIMARY KEY (`est_sno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimatedetail`
--

INSERT INTO `estimatedetail` (`est_sno`, `est_id`, `prod_id`, `prod_rate`, `prod_qty`, `prod_discount`, `prod_amount`) VALUES
(1, 1, 2, 34999, 1, 20, 27999),
(2, 1, 5, 150, 4, 5, 570),
(3, 1, 3, 1000, 1, 10, 900);

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

DROP TABLE IF EXISTS `estimates`;
CREATE TABLE IF NOT EXISTS `estimates` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `est_date` varchar(20) NOT NULL,
  `est_amount` int(11) NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`est_id`, `cl_id`, `est_date`, `est_amount`) VALUES
(1, 3, '2019-09-08', 29469);

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

DROP TABLE IF EXISTS `invoicedetail`;
CREATE TABLE IF NOT EXISTS `invoicedetail` (
  `inv_sno` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_rate` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_discount` int(11) NOT NULL,
  `prod_amount` int(11) NOT NULL,
  PRIMARY KEY (`inv_sno`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoicedetail`
--

INSERT INTO `invoicedetail` (`inv_sno`, `inv_id`, `prod_id`, `prod_rate`, `prod_qty`, `prod_discount`, `prod_amount`) VALUES
(1, 1, 1, 24000, 1, 5, 22800),
(2, 1, 3, 1000, 1, 10, 900),
(3, 1, 4, 1500, 1, 15, 1275),
(4, 2, 6, 10, 1, 0, 10),
(5, 2, 5, 150, 1, 0, 150),
(6, 3, 3, 1000, 1, 10, 900),
(7, 3, 4, 1500, 1, 15, 1275),
(8, 4, 2, 34999, 1, 20, 27999);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `inv_date` varchar(20) NOT NULL,
  `inv_amount` int(11) NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`inv_id`, `cl_id`, `inv_date`, `inv_amount`) VALUES
(1, 2, '2019-09-08', 24975),
(2, 1, '2019-08-26', 160),
(3, 3, '2019-09-07', 2175),
(4, 2, '2019-09-07', 27999);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_color` varchar(20) NOT NULL,
  `prod_size` varchar(10) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_uprice` int(11) NOT NULL,
  `prod_uom` varchar(20) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cat_id`, `prod_name`, `prod_desc`, `prod_color`, `prod_size`, `prod_stock`, `prod_uprice`, `prod_uom`) VALUES
(1, 1, 'Oppo F9 Pro Mobile', '4 GB + 128 GB', 'Pink', '6', 9, 24000, 'inch'),
(2, 1, 'HP Laptop', '4GB + i3 + 1TB HDD', 'Black', '15.6', 4, 34999, 'inch'),
(3, 2, 'Study Table', '2 drawer included', 'Orange', '3 X 2', 18, 1000, 'feet'),
(4, 2, 'Seating Chair', '360 Rotate + Height Adjust', 'Blue', '3', 18, 1500, 'feet'),
(5, 3, 'Diary', 'Year 2019', 'Red', 'A4', 29, 150, 'Standard'),
(6, 3, 'Montex Pen', 'Ball Point Pen', 'Blue', '1', 99, 10, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `pur_id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_from` varchar(255) NOT NULL,
  `pur_detail` varchar(255) NOT NULL,
  `pur_billno` varchar(100) NOT NULL,
  `pur_amount` float NOT NULL,
  `pur_date` varchar(30) NOT NULL,
  PRIMARY KEY (`pur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`pur_id`, `pur_from`, `pur_detail`, `pur_billno`, `pur_amount`, `pur_date`) VALUES
(1, 'HP Depot', 'Purchased Mobile and Laptop', 'HPD2501', 150000, '2019-08-08'),
(2, 'Kirti Stationary', 'Montex Pen and Diary 2019', 'KSBILL0521', 10000, '2019-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(5) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_pass`) VALUES
(1, 'admin', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
