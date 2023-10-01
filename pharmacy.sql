-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 06:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
`id` int(11) NOT NULL,
  `specialist` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `experience` int(2) NOT NULL,
  `file` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `specialist`, `name`, `Password`, `qualification`, `experience`, `file`, `address`, `mobile`) VALUES
(12, 'General', 'Anish Parveen', 'Anish', 'MBBS', 5, 'Wallpaper 1080p (5).jpg', 'Madurai', '1234'),
(13, 'General', 'Abu', 'Abu', 'MBBS', 3, 'Wallpaper 1080p (50).jpg', 'Madurai', '9988'),
(14, 'General', 'Sathees', 'Sathees', 'MD', 5, 'Wallpaper 1080p (7).jpg', 'Melur', '8110964230'),
(15, 'Opthalmic', 'Raja', 'raja', 'MBBS', 10, 'Wallpaper 1080p (8).jpg', 'Madurai', '6677889901'),
(16, 'ENT', 'farhana', 'far', 'MBBS', 2, 'Wallpaper 1080p (36).jpg', 'east gate', '9791958388'),
(17, 'Heart', 'Uma', 'uma', 'MBBS', 9, 'img4.jpg', 'Madurai', '9876452390');

-- --------------------------------------------------------

--
-- Table structure for table `add_hospital`
--

CREATE TABLE IF NOT EXISTS `add_hospital` (
`pharmacy_stocks_id` int(11) NOT NULL,
  `pharmacy_category` varchar(300) NOT NULL,
  `hosp_name` varchar(300) NOT NULL,
  `file` varchar(500) NOT NULL,
  `hosp_address` varchar(300) NOT NULL,
  `hosp_mob` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_hospital`
--

INSERT INTO `add_hospital` (`pharmacy_stocks_id`, `pharmacy_category`, `hosp_name`, `file`, `hosp_address`, `hosp_mob`) VALUES
(39, 'General', 'RSB Hospital', 'Wallpaper 1080p (6).jpg', 'Madurai', '5566778899'),
(42, 'Ortho', 'Yaseen Hospital', 'Wallpaper 1080p (9).jpg', 'Madurai', '8809878900'),
(43, 'Dental', 'Vasan Dental Care', 'img3.jpg', 'Madurai', '6677889900'),
(44, 'General', 'Meenakshi Mission Hospital', 'Wallpaper 1080p (10).jpg', 'Madurai', '9090908877'),
(45, 'Ortho', 'MIOT Hospital', 'Wallpaper 1080p (12).jpg', 'Madurai', '8899009988'),
(46, 'General', 'Apollo Hospital', 'Wallpaper 1080p (6).jpg', 'Madurai', '7788990077'),
(47, 'General', 'RSB Hospital', '3-d98v.jpg', 'Goriurpalayam,Madurai', '9092698169');

-- --------------------------------------------------------

--
-- Table structure for table `add_medical`
--

CREATE TABLE IF NOT EXISTS `add_medical` (
`id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `mob` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_medical`
--

INSERT INTO `add_medical` (`id`, `category`, `mname`, `address`, `mob`) VALUES
(1, '24hrs', 'Ruba Medicals', 'Sellur', '8970665544'),
(2, '24hrs', 'Appolo Medicals', 'District Court Compl', '0452556677'),
(3, '24 Hrs', 'Vadamalayan Medicals', 'Goripalayam', '8899007766'),
(4, '24 Hrs', 'Vadamalayan Medicals', 'Anna nagar,Madurai', '7766889900'),
(5, '12 Hrs', 'Abu Medicals', 'Thirupuvanam', '9842393852');

-- --------------------------------------------------------

--
-- Table structure for table `add_medicine`
--

CREATE TABLE IF NOT EXISTS `add_medicine` (
`id` int(111) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `available_qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_medicine`
--

INSERT INTO `add_medicine` (`id`, `mname`, `bname`, `price`, `available_qty`) VALUES
(8, 'Ruba Medicals', 'T.DOLO', 1.25, 500),
(9, 'Abu Medicals', 'T.BETALOC', 3.75, 450);

-- --------------------------------------------------------

--
-- Table structure for table `add_prescription`
--

CREATE TABLE IF NOT EXISTS `add_prescription` (
`pid` int(11) NOT NULL,
  `symptoms` varchar(30) NOT NULL,
  `tablet_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_prescription`
--

INSERT INTO `add_prescription` (`pid`, `symptoms`, `tablet_name`, `doctor_name`) VALUES
(1, 'Cold', 'T.DOLO 650', 'Anis'),
(2, 'Fever', 'T.AZAX 500', 'Anis'),
(3, 'Migraine', 'T.BETALOC 20', 'Azar'),
(4, 'Pain, redness and warmth', 'T.CEFPOD CV', 'Uma');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_spec`
--

CREATE TABLE IF NOT EXISTS `doctor_spec` (
`id` int(11) NOT NULL,
  `spec` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_spec`
--

INSERT INTO `doctor_spec` (`id`, `spec`) VALUES
(1, 'Heart'),
(2, 'Ortho'),
(3, 'ENT'),
(4, 'Opthalmic'),
(5, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `medical_cat`
--

CREATE TABLE IF NOT EXISTS `medical_cat` (
`id` int(11) NOT NULL,
  `cate` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_cat`
--

INSERT INTO `medical_cat` (`id`, `cate`) VALUES
(1, '24 Hrs'),
(2, '12 Hrs');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_admin`
--

CREATE TABLE IF NOT EXISTS `pharmacy_admin` (
`pharmacy_admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
`pharmacy_brand_id` int(11) NOT NULL,
  `pharmacy_brand` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
`pharmacy_category_id` int(11) NOT NULL,
  `pharmacy_brand` varchar(300) NOT NULL,
  `pharmacy_category` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_category`
--

INSERT INTO `pharmacy_category` (`pharmacy_category_id`, `pharmacy_brand`, `pharmacy_category`) VALUES
(4, '', 'General'),
(5, '', 'Ortho'),
(6, '', 'Opthalmic'),
(7, '', 'Dental');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `address`, `mob`) VALUES
(1, 'Kevin', '123', 'sdfsdf', '2525'),
(2, 'kevin', '123', 'trichy-1', '98989898'),
(3, 'sdf', 'sdf', 'sdf', '123'),
(4, 'Subha', 'subha', 'Thirunagar, Madurai', '9629772276'),
(5, 'sha', 'sha', 'Goriurpalayam,Madurai', '861001902'),
(6, 'Aslam', 'aslam', 'South Gate, Madurai', '7788990099'),
(7, 'Jeyabalan', 'bala', 'Gomathipuram, Madurai', '6677889900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_doctor`
--
ALTER TABLE `add_doctor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_hospital`
--
ALTER TABLE `add_hospital`
 ADD PRIMARY KEY (`pharmacy_stocks_id`);

--
-- Indexes for table `add_medical`
--
ALTER TABLE `add_medical`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_medicine`
--
ALTER TABLE `add_medicine`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_prescription`
--
ALTER TABLE `add_prescription`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `doctor_spec`
--
ALTER TABLE `doctor_spec`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_cat`
--
ALTER TABLE `medical_cat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_admin`
--
ALTER TABLE `pharmacy_admin`
 ADD PRIMARY KEY (`pharmacy_admin_id`);

--
-- Indexes for table `pharmacy_brand`
--
ALTER TABLE `pharmacy_brand`
 ADD PRIMARY KEY (`pharmacy_brand_id`);

--
-- Indexes for table `pharmacy_category`
--
ALTER TABLE `pharmacy_category`
 ADD PRIMARY KEY (`pharmacy_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_doctor`
--
ALTER TABLE `add_doctor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `add_hospital`
--
ALTER TABLE `add_hospital`
MODIFY `pharmacy_stocks_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `add_medical`
--
ALTER TABLE `add_medical`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `add_medicine`
--
ALTER TABLE `add_medicine`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `add_prescription`
--
ALTER TABLE `add_prescription`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor_spec`
--
ALTER TABLE `doctor_spec`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `medical_cat`
--
ALTER TABLE `medical_cat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy_admin`
--
ALTER TABLE `pharmacy_admin`
MODIFY `pharmacy_admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pharmacy_brand`
--
ALTER TABLE `pharmacy_brand`
MODIFY `pharmacy_brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pharmacy_category`
--
ALTER TABLE `pharmacy_category`
MODIFY `pharmacy_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
