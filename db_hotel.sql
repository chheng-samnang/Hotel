-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 11:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_code` varchar(30) NOT NULL,
  `book_status` char(8) NOT NULL,
  `guest_name` varchar(30) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `coun_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_create` varchar(20) NOT NULL,
  `date_create` varchar(20) NOT NULL,
  `user_update` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`book_id`, `booking_code`, `book_status`, `guest_name`, `gender`, `loc_id`, `coun_id`, `phone`, `email`, `address`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, '20170713090629', 'check-in', 'Vann', 0, 3, 1, '070834483', 'vann@gmail.com', 'sg', 'admin', '2017-07-13', '', ''),
(2, '20170713104943', 'check-in', 'boy', 1, 3, 1, '070834493', 'nhorboy90@gmail.com', 'pp', 'admin', '2017-07-13', '', ''),
(3, '20170713113128', 'check-in', 'test', 1, 3, 1, '0967574783', 'tyest@gmail.com', 'testing', 'admin', '2017-07-13', '', ''),
(4, '20170719051850', 'check-in', 'Vorleak', 0, 3, 1, '097834456', 'vorleak@gmail.com', 'pp', 'admin', '2017-07-19', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_detail` (
  `booking_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_code` varchar(30) NOT NULL,
  `room_id` int(11) NOT NULL,
  `quantity_people` tinyint(4) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  PRIMARY KEY (`booking_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_booking_detail`
--

INSERT INTO `tbl_booking_detail` (`booking_detail_id`, `booking_code`, `room_id`, `quantity_people`, `check_in`, `check_out`) VALUES
(1, '20170713090629', 11, 1, '2017-07-13', '2017-07-13'),
(2, '20170713104943', 11, 1, '2017-07-14', '2017-07-15'),
(3, '20170713113128', 14, 0, '2017-07-15', '2017-07-16'),
(4, '20170719051850', 12, 2, '2017-07-20', '2017-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check_in`
--

CREATE TABLE IF NOT EXISTS `tbl_check_in` (
  `check_in_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guest_code` varchar(40) NOT NULL,
  `room_id` int(11) NOT NULL,
  `quantity_people` tinyint(4) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `check_in_status` varchar(50) NOT NULL,
  `check_in_remark` varchar(100) NOT NULL,
  `user_create` varchar(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`check_in_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tbl_check_in`
--

INSERT INTO `tbl_check_in` (`check_in_id`, `guest_code`, `room_id`, `quantity_people`, `check_in`, `check_out`, `check_in_status`, `check_in_remark`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(55, '596300451624a', 11, 2, '2017-07-10', '2017-07-10', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(56, '59643d6a59a5a', 13, 1, '2017-07-11', '2017-07-11', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(57, '596446b454197', 14, 2, '2017-07-11', '2017-07-11', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(58, '59644fbd57da8', 14, 2, '2017-07-11', '2017-07-11', 'check-out', 'remove to room 4', '', '0000-00-00', '', '0000-00-00'),
(59, '5966d2e1b723d', 12, 2, '2017-07-13', '2017-07-13', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(60, '5966d43dec0e4', 13, 1, '2017-07-13', '2017-07-13', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(87, '596b9cb44ed96', 12, 1, '2017-07-17', '2017-07-17', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(89, '596b9dd1d1da5', 14, 1, '2017-07-17', '2017-07-17', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(91, '596ba0568d82d', 13, 3, '2017-07-17', '2017-07-17', 'check-out', '', '', '0000-00-00', '', '0000-00-00'),
(92, '596edef54c29c', 11, 2, '2017-07-20', '2017-07-21', 'check-in', 'change to room1', '', '0000-00-00', '', '0000-00-00'),
(93, '5970745e2ef35', 13, 1, '2017-07-20', '2017-07-20', 'pending', '', '', '0000-00-00', '', '0000-00-00'),
(94, '597075548a813', 15, 2, '2017-07-20', '2017-07-20', 'check-in', '', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `coun_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coun_name` varchar(100) NOT NULL,
  `user_create` varchar(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`coun_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`coun_id`, `coun_name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, 'Khmer', 'admin', '2017-06-15', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exchange_rate`
--

CREATE TABLE IF NOT EXISTS `tbl_exchange_rate` (
  `ex_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` char(20) NOT NULL,
  `from` char(20) NOT NULL,
  `to` char(20) NOT NULL,
  `value` varchar(50) NOT NULL,
  `user_create` varchar(40) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(40) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_exchange_rate`
--

INSERT INTO `tbl_exchange_rate` (`ex_id`, `amount`, `from`, `to`, `value`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, '1', 'dollar', 'riels', '4100', 'admin', '2017-07-20', 'admin', '2017-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE IF NOT EXISTS `tbl_guest` (
  `guest_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guest_code` varchar(40) NOT NULL,
  `guest_name` varchar(30) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `national_num` varchar(30) NOT NULL,
  `visa_num` varchar(30) NOT NULL,
  `passport_num` varchar(30) NOT NULL,
  `age` tinyint(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` char(18) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_create` char(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`guest_id`, `guest_code`, `guest_name`, `gender`, `national_num`, `visa_num`, `passport_num`, `age`, `location`, `country`, `address`, `phone`, `email`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(66, '596300451624a', 'dara', 1, '3223', '3442', '34F33', 23, 'Kom Pot', 'Khmer', 'PP', '070834493', 'dara@gmail.com', 'admin', '2017-07-10', '', '0000-00-00'),
(67, '59643d6a59a5a', 'boy', 1, '322339', '949994', '494949', 23, 'Phnom Penh', 'Khmer', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-11', '', '0000-00-00'),
(68, '596446b454197', 'virak', 1, '6456356`', '73747', '73747', 72, 'Kom Pot', 'Khmer', '', '0708324432', 'nharboy99@gmail.com', 'admin', '2017-07-11', '', '0000-00-00'),
(69, '59644fbd57da8', 'kaka', 0, '22323', '342234', '32232', 19, 'Phnom Penh', 'Khmer', 'pp', '0949494993', 'kaka@gmail.com', 'admin', '2017-07-11', '', '0000-00-00'),
(70, '5966d2e1b723d', 'Thyda', 0, '223', '23123', '332', 23, 'Phnom Penh', 'Khmer', 'from phnom penh', '070855454', 'thyda@gmail.com', 'admin', '2017-07-13', '', '0000-00-00'),
(71, '5966d43dec0e4', 'Sokha', 1, '0895919', '94949', '94949', 29, 'Phnom Penh', 'Khmer', 'from phnom penh', '012954877', 'sokha@mgail.com', 'admin', '2017-07-13', '', '0000-00-00'),
(72, '596890b3dbdc3', 'boy', 1, '099681', '09888', '9949', 25, 'Kom Pot', 'Khmer', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-14', '', '0000-00-00'),
(73, '596890f37ee02', 'boy', 1, '', '', '', 0, 'Phnom Penh', '', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-14', '', '0000-00-00'),
(74, '5968915f8c0ce', 'boy', 1, '', '', '', 0, 'Phnom Penh', '', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-14', '', '0000-00-00'),
(75, '5968926ae2f0c', 'boy', 1, '', '', '', 0, 'Phnom Penh', '', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-14', '', '0000-00-00'),
(76, '59689291c17e9', 'boy', 1, '', '', '', 0, 'Phnom Penh', '', 'pp', '070834493', 'nhorboy90@gmail.com', 'admin', '2017-07-14', '', '0000-00-00'),
(77, '596aed5c3ee10', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', 'Khmer', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(78, '596aed6e974e7', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', 'Khmer', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(79, '596aed7764af3', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', 'Khmer', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(80, '596aedf205769', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(81, '596aee8bd89ad', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(82, '596af502e29ac', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(83, '596af536cc594', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(84, '596af5d5dda52', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(85, '596af622bfcb8', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(86, '596af8836e342', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(87, '596afcca5a88f', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(88, '596b00210c9cd', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(89, '596b0026194e9', 'Vann', 0, '343', '333', '345', 34, 'Phnom Penh', '', 'sg', '070834483', 'vann@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(90, '596b00693e9aa', 'test', 1, '', '', '', 0, 'Phnom Penh', '', 'testing', '0967574783', 'tyest@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(91, '596b09de45238', 'test', 1, '', '', '', 0, 'Phnom Penh', '', 'testing', '0967574783', 'tyest@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(92, '596b0e6da486d', 'test', 1, '', '', '', 0, 'Phnom Penh', '', 'testing', '0967574783', 'tyest@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(93, '596b0f406a7a8', 'test', 1, '', '', '', 0, 'Phnom Penh', '', 'testing', '0967574783', 'tyest@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(94, '596b0ff70c67e', 'test', 1, '', '', '', 0, 'Phnom Penh', '', 'testing', '0967574783', 'tyest@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(95, '596b9a63edd27', 'dara', 1, '22e', 'sfgsf', '3232', 23, 'Phnom Penh', 'Khmer', 'sdf', '070835594', 'dara@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(96, '596b9b080947d', 'ssasa', 0, '1234', '233', '223', 23, 'Phnom Penh', 'Khmer', 'pp', '070945495', 'ss@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(97, '596b9b8cc2143', '3333', 1, '3', '3', '3', 3, 'Phnom Penh', 'Khmer', 'sdf', '070934434', 'ss@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(98, '596b9cb44ed96', 'ds', 1, '123', '12334', '12334', 23, 'Kom Pot', 'Khmer', 'pp', '070844493', 'sd@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(99, '596b9d75f26a6', 'mean', 1, '12', 'dfv44', '3343', 22, 'Phnom Penh', 'Khmer', 'pp', '089675655', 'mena@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(100, '596b9dd1d1da5', 'ssd', 1, '12', 'dfv44', '3343', 22, 'Phnom Penh', 'Khmer', 'pp', '078654494', 'sd@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(101, '596b9ee498df4', '334', 1, '333', 'rwe', 'sd', 0, 'Phnom Penh', 'Khmer', 'pp', '089664455', 'ge@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(102, '596ba0568d82d', 'ddfsd', 1, 'zsdf', 'zdfv', 'zfv', 23, 'Phnom Penh', 'Khmer', 'pp', '070834493', 'ddf@gmail.com', 'admin', '2017-07-16', '', '0000-00-00'),
(103, '596edef54c29c', 'Vorleak', 0, '', '', '', 0, 'Kom Pot', 'Khmer', 'pp', '097834456', 'vorleak@gmail.com', 'admin', '2017-07-19', '', '0000-00-00'),
(104, '5970745e2ef35', 'test2', 1, '123', '453', '345656', 33, 'Kom Pot', 'Khmer', 'ppp', '070834493', 'nharboy99@gmail.com', 'admin', '2017-07-20', '', '0000-00-00'),
(105, '597075548a813', 'tets', 1, '23', '22', '33', 33, 'Phnom Penh', 'Khmer', '', '070834493', 'nhaeboy99@gmail.com', 'admin', '2017-07-20', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `loc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(30) NOT NULL,
  `user_create` varchar(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`loc_id`, `loc_name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, 'Phnom Penh', 'admin', '2017-06-15', '', '0000-00-00'),
(3, 'Kom Pot', 'admin', '2017-06-15', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_code` varchar(50) NOT NULL,
  `guest_code` varchar(30) NOT NULL,
  `cash` varchar(50) NOT NULL,
  `invoice_num` varchar(30) NOT NULL,
  `grand_total` varchar(50) NOT NULL,
  `exchange` varchar(40) NOT NULL,
  `cash_currency` varchar(50) NOT NULL,
  `user_create` varchar(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `pay_code`, `guest_code`, `cash`, `invoice_num`, `grand_total`, `exchange`, `cash_currency`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(30, '5963004b8ee38', '596300451624a', '', '20170710061923', '82000', '', 'r', 'admin', '2017-07-10', '', '0000-00-00'),
(31, '59643d716834d', '59643d6a59a5a', '328000', '20170711045233', '410000', '0', 'r', 'admin', '2017-07-11', '', '0000-00-00'),
(34, '5966d2e9024ed', '5966d2e1b723d', '205000', '20170713035448', '100', '0', 'r', 'admin', '2017-07-13', '', '0000-00-00'),
(35, '5966d44d2f5d7', '5966d43dec0e4', '', '20170713040045', '20', '0', '', 'admin', '2017-07-13', '', '0000-00-00'),
(36, '596b9cc499c48', '596b9cb44ed96', '', '20170716190508', '2000000', '', 'r', 'admin', '2017-07-16', '', '0000-00-00'),
(37, '596b9ddceaffd', '596b9dd1d1da5', '122', '20170716190948', '100', '22', 'd', 'admin', '2017-07-16', '', '0000-00-00'),
(38, '596ba060d40f8', '596ba0568d82d', '89000', '20170716192032', '80000', '9000', 'r', 'admin', '2017-07-16', '', '0000-00-00'),
(39, '596edf099e206', '596edef54c29c', '200000', '20170719062441', '200000', '0', 'r', 'admin', '2017-07-19', '', '0000-00-00'),
(40, '5970757548f92', '597075548a813', '205000', '20170720111845', '50', '0', 'r', 'admin', '2017-07-20', '', '0000-00-00'),
(41, '597076707571a', '597075548a813', '205000', '20170720112256', '205000', '0', 'r', 'admin', '2017-07-20', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_detail` (
  `pay_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_code` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`pay_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tbl_payment_detail`
--

INSERT INTO `tbl_payment_detail` (`pay_detail_id`, `pay_code`, `room_id`, `price`) VALUES
(65, '5963004b8ee38', 14, '20 $'),
(66, '59643d716834d', 13, '20'),
(67, '596446b9cb62c', 14, '100'),
(68, '59644fcd5e7ea', 11, '100'),
(69, '5966d2e9024ed', 12, '50'),
(70, '5966d44d2f5d7', 13, '20'),
(71, '596b9cc499c48', 12, '50'),
(72, '596b9ddceaffd', 14, '100'),
(73, '596ba060d40f8', 13, '20'),
(74, '596edf099e206', 12, '50'),
(75, '5970757548f92', 15, '50'),
(76, '597076707571a', 15, '50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE IF NOT EXISTS `tbl_room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_type_code` varchar(30) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_check_out` varchar(50) NOT NULL,
  `user_crate` varchar(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` varchar(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`room_id`,`room_type_code`,`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_type_code`, `room_name`, `price`, `photo`, `remark`, `status`, `date_check_out`, `user_crate`, `date_create`, `user_update`, `date_update`) VALUES
(11, '3', 'R001', '100', 'download.jpg', 'good family to stay', 'busy', '', '', '0000-00-00', 'admin', '2017-07-19'),
(12, '1', 'R002', '50', '9433917_62_z.jpg', 'double Room friend ly&nbsp;', 'booking', '201707170337', '', '0000-00-00', 'admin', '2017-07-10'),
(13, '2', 'R003', '20', 'download (1).jpg', 'you can stay alone &nbsp;......', 'free', '201707170337', '', '0000-00-00', 'admin', '2017-07-19'),
(14, '3', 'R004', '100', 'download.jpg', 'good&nbsp;', 'prepea', '201707201123', '', '0000-00-00', 'admin', '2017-07-10'),
(15, '2', 'R005', '50', 'download (1).jpg', 'stay alone', 'busy', '', '', '0000-00-00', 'admin', '2017-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE IF NOT EXISTS `tbl_room_type` (
  `room_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_type_code` varchar(30) NOT NULL,
  `room_type_name` char(30) NOT NULL,
  `maximum_people` tinyint(4) NOT NULL,
  `user_create` char(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`room_type_id`, `room_type_code`, `room_type_name`, `maximum_people`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(8, '1', 'Double Room', 2, 'admin', '2017-06-19', 'admin', '2017-06-19'),
(9, '2', 'Single Room', 2, 'admin', '2017-06-19', 'admin', '2017-06-19'),
(10, '3', 'Family Room', 5, 'admin', '2017-06-19', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` tinyint(1) unsigned NOT NULL,
  `user_desc` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_code` (`user_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_code`, `user_name`, `user_pass`, `user_type`, `user_status`, `user_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(4, 'A001', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 1, '<p>This Account for</p>', 'Choumeng', '2017-05-04', 'admin', '2017-06-19'),
(5, 'A002', 'Boy', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', 1, 'sdf', 'admin', '2017-06-19', 'admin', '2017-07-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
