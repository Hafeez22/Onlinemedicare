-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 11:47 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_doctor`
--

CREATE TABLE IF NOT EXISTS `add_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialist` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `experience` int(2) NOT NULL,
  `file` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `specialist`, `name`, `qualification`, `experience`, `file`, `address`, `mobile`) VALUES
(9, 'heart', 'Kevin', 'MBBS', 2, 'aaa.png', 'sdfsdfsdf', '2525');

-- --------------------------------------------------------

--
-- Table structure for table `add_hospital`
--

CREATE TABLE IF NOT EXISTS `add_hospital` (
  `pharmacy_stocks_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_category` varchar(300) NOT NULL,
  `hosp_name` varchar(300) NOT NULL,
  `file` varchar(500) NOT NULL,
  `hosp_address` varchar(300) NOT NULL,
  `hosp_mob` varchar(10) NOT NULL,
  PRIMARY KEY (`pharmacy_stocks_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `add_hospital`
--

INSERT INTO `add_hospital` (`pharmacy_stocks_id`, `pharmacy_category`, `hosp_name`, `file`, `hosp_address`, `hosp_mob`) VALUES
(24, 'General', 'ABC', 'barimage.bmp', 'Cauvery College', '2525');

-- --------------------------------------------------------

--
-- Table structure for table `add_medical`
--

CREATE TABLE IF NOT EXISTS `add_medical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `mob` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `add_medical`
--

INSERT INTO `add_medical` (`id`, `category`, `mname`, `address`, `mob`) VALUES
(1, '24hrs', 'sdfsf', 'sdf', '25425');

-- --------------------------------------------------------

--
-- Table structure for table `add_medicine`
--

CREATE TABLE IF NOT EXISTS `add_medicine` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `mname` varchar(30) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `add_medicine`
--

INSERT INTO `add_medicine` (`id`, `mname`, `bname`, `address`, `mobile`) VALUES
(4, 'sdfsf', 'sdfsdfsdfs a ', 'sdfsdf', '2525');

-- --------------------------------------------------------

--
-- Table structure for table `add_prescription`
--

CREATE TABLE IF NOT EXISTS `add_prescription` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `symptoms` varchar(30) NOT NULL,
  `tablet_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `add_prescription`
--

INSERT INTO `add_prescription` (`pid`, `symptoms`, `tablet_name`, `doctor_name`) VALUES
(1, 'Cold', 'clksdjf', 'Kevin'),
(2, 'Fever', 'sdfsdf', 'Kevin'),
(3, 'Cold', 'slkdfjslkdfjsldkjf', 'nancy');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_spec`
--

CREATE TABLE IF NOT EXISTS `doctor_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spec` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doctor_spec`
--

INSERT INTO `doctor_spec` (`id`, `spec`) VALUES
(1, 'heart'),
(2, 'ortho');

-- --------------------------------------------------------

--
-- Table structure for table `medical_cat`
--

CREATE TABLE IF NOT EXISTS `medical_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medical_cat`
--

INSERT INTO `medical_cat` (`id`, `cate`) VALUES
(1, '24hrs'),
(2, '12hrs');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_admin`
--

CREATE TABLE IF NOT EXISTS `pharmacy_admin` (
  `pharmacy_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`pharmacy_admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pharmacy_admin`
--

INSERT INTO `pharmacy_admin` (`pharmacy_admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_brand`
--

CREATE TABLE IF NOT EXISTS `pharmacy_brand` (
  `pharmacy_brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_brand` varchar(300) NOT NULL,
  PRIMARY KEY (`pharmacy_brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pharmacy_brand`
--

INSERT INTO `pharmacy_brand` (`pharmacy_brand_id`, `pharmacy_brand`) VALUES
(1, 'Medlife'),
(2, 'Noble Plus Pharmacy & Skincare'),
(3, '98.4 Pharmacy'),
(4, 'Apollo Pharmacy'),
(5, 'Dhanwantary Medicare'),
(6, 'Fortis Healthworld'),
(7, 'Guardian Pharmacy'),
(8, 'MedPlus Health Services'),
(9, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_category`
--

CREATE TABLE IF NOT EXISTS `pharmacy_category` (
  `pharmacy_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_brand` varchar(300) NOT NULL,
  `pharmacy_category` varchar(300) NOT NULL,
  PRIMARY KEY (`pharmacy_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pharmacy_category`
--

INSERT INTO `pharmacy_category` (`pharmacy_category_id`, `pharmacy_brand`, `pharmacy_category`) VALUES
(1, '1', 'General'),
(2, '1', 'ortho'),
(3, '1', 'heart');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_license`
--

CREATE TABLE IF NOT EXISTS `pharmacy_license` (
  `pharmacy_license_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_brand` varchar(500) NOT NULL,
  `address` varchar(1500) NOT NULL,
  `shop_size` varchar(500) NOT NULL,
  `due_period` varchar(500) NOT NULL,
  `start_date` varchar(500) NOT NULL,
  `end_date` varchar(500) NOT NULL,
  PRIMARY KEY (`pharmacy_license_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pharmacy_license`
--

INSERT INTO `pharmacy_license` (`pharmacy_license_id`, `pharmacy_brand`, `address`, `shop_size`, `due_period`, `start_date`, `end_date`) VALUES
(10, 'ABC PHARMACY', '																																													Thillai nagar,Trichy', '1000  feet', '60 days', '01-02-2017', '21-03-2017');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_order_stocks`
--

CREATE TABLE IF NOT EXISTS `pharmacy_order_stocks` (
  `order_stocks_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_stock_id` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `pharmacy_brand` varchar(500) NOT NULL,
  `pharmacy_category` varchar(500) NOT NULL,
  `medicine_brand` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `combination_generics` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `discount` varchar(500) NOT NULL,
  `order_date` varchar(500) NOT NULL,
  `stock_status` varchar(500) NOT NULL,
  PRIMARY KEY (`order_stocks_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `pharmacy_order_stocks`
--

INSERT INTO `pharmacy_order_stocks` (`order_stocks_id`, `pharmacy_stock_id`, `user_id`, `user_name`, `pharmacy_brand`, `pharmacy_category`, `medicine_brand`, `file`, `combination_generics`, `quantity`, `price`, `expiry_date`, `discount`, `order_date`, `stock_status`) VALUES
(80, '16', '1', 'Dinesh', 'demo', '1', 'demo', 'amer.JPG', 'd', '1', '1', '1', '1%', '06/03/2017', 'U06031745303'),
(82, '18', '2', 'vignesh', 'ABC', '2', 'dingo', 'carrot.jpg', '200mcg', '1', '150', '20/12/2017', '12%', '06/03/2017', 'U06031752255'),
(83, '13', '5', 'Kevin', '5', '2', 'Doxycycline', 'med6.jpg', 'chlamydia', '1', '14', '20/02/2018', '12.5%', '29/09/2017', 'U29091711626');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_paid_stocks`
--

CREATE TABLE IF NOT EXISTS `pharmacy_paid_stocks` (
  `paid_stocks_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `payment_date` varchar(500) NOT NULL,
  `payment_mode` varchar(500) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `card_no` varchar(500) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `cvv_no` varchar(500) NOT NULL,
  `card_holder_name` varchar(500) NOT NULL,
  PRIMARY KEY (`paid_stocks_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `pharmacy_paid_stocks`
--

INSERT INTO `pharmacy_paid_stocks` (`paid_stocks_id`, `user_id`, `user_name`, `price`, `payment_date`, `payment_mode`, `order_id`, `card_no`, `bank_name`, `cvv_no`, `card_holder_name`) VALUES
(108, '1', 'Dinesh', '1', '06/03/2017', 'Cash on delivery', 'U06031745303', '', '', '', ''),
(109, '2', 'vignesh', '150', '06/03/2017', 'Cash on delivery', 'U06031752255', '', '', '', ''),
(110, '5', 'Kevin', '14', '29/09/2017', 'Cash on delivery', 'U29091711626', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_register`
--

CREATE TABLE IF NOT EXISTS `pharmacy_register` (
  `pharmacy_register_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  `address` varchar(1500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` varchar(500) NOT NULL,
  PRIMARY KEY (`pharmacy_register_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pharmacy_register`
--

INSERT INTO `pharmacy_register` (`pharmacy_register_id`, `name`, `password`, `email`, `mobile_no`, `address`, `gender`, `dob`) VALUES
(1, 'Dinesh', 'dinesh123', 'dinesh@gmail.com', '7896541230', 'mela pettai,somarasam pet', 'male', '03/09/1992'),
(2, 'vignesh', 'vignesh123', 'vignesh@gmail.com', '9856741230', 'mela pettai,trichy-102', 'male', '11/09/1990'),
(3, 'sathish', 'sathish123', 'sathish@gmail.com', '9875434345', 'trichy', 'male', '3/5/1988'),
(4, 'jaya', 'jaya', 'jaya@gmail.com', '756355435', 'gdfgdgdf', 'female', '28/02/2017'),
(5, 'Kevin', '123', 'casokevin@gmail.com', '9578209101', 'trichy	  ', 'male', '2017-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_bill`
--

CREATE TABLE IF NOT EXISTS `salesman_bill` (
  `salesman_bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` varchar(500) NOT NULL,
  `sale_name` varchar(500) NOT NULL,
  `total_price` varchar(500) NOT NULL,
  `bill_no` varchar(500) NOT NULL,
  `bill_date` varchar(500) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `customer_no` varchar(500) NOT NULL,
  `payment_mode` varchar(500) NOT NULL,
  `card_no` varchar(500) NOT NULL,
  `cvv_no` varchar(500) NOT NULL,
  PRIMARY KEY (`salesman_bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `salesman_bill`
--

INSERT INTO `salesman_bill` (`salesman_bill_id`, `sale_id`, `sale_name`, `total_price`, `bill_no`, `bill_date`, `customer_name`, `customer_no`, `payment_mode`, `card_no`, `cvv_no`) VALUES
(13, 'vinayaga123', 'Vinayaga', '250', 'S06031751024', '06-03-2017', 'dinesh', '7896541230', 'Card', '43456465464', '454'),
(14, 'perumal123', 'perumal', '150', 'S06031752344', '06-03-2017', 'dinesh', '785551211', 'Cash', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_list`
--

CREATE TABLE IF NOT EXISTS `salesman_list` (
  `salesman_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `salesman_name` varchar(500) NOT NULL,
  `salesman_id` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  PRIMARY KEY (`salesman_auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salesman_list`
--

INSERT INTO `salesman_list` (`salesman_auto_id`, `salesman_name`, `salesman_id`, `password`, `mobile_no`) VALUES
(1, 'Vinayaga', 'vinayaga123', 'vinayaga123', '895623111'),
(3, 'perumal', 'perumal123', 'perumal123', '56446');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_order_stocks`
--

CREATE TABLE IF NOT EXISTS `salesman_order_stocks` (
  `salesman_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_stocks_id` varchar(500) NOT NULL,
  `sale_id` varchar(500) NOT NULL,
  `sale_name` varchar(500) NOT NULL,
  `pharmacy_brand` varchar(500) NOT NULL,
  `pharmacy_category` varchar(500) NOT NULL,
  `medicine_brand` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `combination_generics` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `discount` varchar(500) NOT NULL,
  `order_date` varchar(500) NOT NULL,
  `sales_status` varchar(500) NOT NULL,
  PRIMARY KEY (`salesman_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `salesman_order_stocks`
--

INSERT INTO `salesman_order_stocks` (`salesman_order_id`, `pharmacy_stocks_id`, `sale_id`, `sale_name`, `pharmacy_brand`, `pharmacy_category`, `medicine_brand`, `file`, `combination_generics`, `quantity`, `price`, `expiry_date`, `discount`, `order_date`, `sales_status`) VALUES
(29, '15', 'vinayaga123', 'Vinayaga', '9', '3', 'ayurvedic syrup (medicine)', 'syrup.jpg', 'Aceclofenac 100mg + Misoprostol 100mg', '1', '250', '20/12/2017', '12%', '06/03/2017', 'S06031751024'),
(30, '18', 'perumal123', 'perumal', 'ABC PHARMACY', '2', 'dingo', 'carrot.jpg', '200mcg', '1', '150', '20/12/2017', '12%', '06/03/2017', 'S06031752344'),
(31, '7', 'vinayaga123', 'Vinayaga', '1', '1', 'Mesopil', 'med1.jpg', '200mcg', '1', '50', '20/07/2018', '10%', '06/03/2017', '0'),
(32, '18', 'vinayaga123', 'Vinayaga', 'ABC PHARMACY', '2', 'dingo', 'carrot.jpg', '200mcg', '1', '150', '20/12/2017', '12%', '06/03/2017', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `address`, `mob`) VALUES
(1, 'Kevin', '123', 'sdfsdf', '2525'),
(2, 'kevin', '123', 'trichy-1', '98989898'),
(3, 'sdf', 'sdf', 'sdf', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
