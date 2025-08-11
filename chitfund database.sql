-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2024 at 02:55 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chitfund`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitmaster`
--

CREATE TABLE IF NOT EXISTS `chitmaster` (
  `chit_no` int(11) NOT NULL,
  `chit_type` text NOT NULL,
  `chit_amt` int(11) NOT NULL,
  `tot_mem` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitmaster`
--

INSERT INTO `chitmaster` (`chit_no`, `chit_type`, `chit_amt`, `tot_mem`, `status`) VALUES
(3, 'monthly', 30000, 10, 0),
(1, 'monthly', 1000, 5, 0),
(2, 'weekly', 7000, 7, 0),
(4, 'yearly', 12000, 10, 0),
(5, 'weekly', 5000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitselect`
--

CREATE TABLE IF NOT EXISTS `chitselect` (
  `sel_no` int(11) NOT NULL,
  `sel_date` date NOT NULL,
  `chit_no` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `ch_amt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitselect`
--

INSERT INTO `chitselect` (`sel_no`, `sel_date`, `chit_no`, `mem_id`, `ch_amt`) VALUES
(2, '2023-04-05', 2, 2, 0),
(5, '2023-04-09', 5, 5, 0),
(4, '2023-04-08', 3, 4, 4000),
(3, '2023-04-06', 3, 3, 0),
(6, '2023-05-03', 3, 3, 5000),
(1, '2023-04-26', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE IF NOT EXISTS `installment` (
  `i_id` int(11) NOT NULL,
  `i_date` date NOT NULL,
  `mem_id` int(11) NOT NULL,
  `chit_no` int(11) NOT NULL,
  `ch_amt_paid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `installment`
--

INSERT INTO `installment` (`i_id`, `i_date`, `mem_id`, `chit_no`, `ch_amt_paid`) VALUES
(1, '2023-04-10', 1, 1, 1000),
(2, '2023-04-10', 2, 2, 2000),
(5, '2023-04-12', 5, 5, 5000),
(3, '2023-04-11', 3, 3, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` text NOT NULL,
  `name` text NOT NULL,
  `addr` text NOT NULL,
  `city` text NOT NULL,
  `cont_no` int(11) NOT NULL,
  `altcont_no` int(11) NOT NULL,
  `email_id` text NOT NULL,
  `aadhar` int(11) NOT NULL,
  `pan` int(11) NOT NULL,
  `mem_date` date NOT NULL,
  `fees` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `name`, `addr`, `city`, `cont_no`, `altcont_no`, `email_id`, `aadhar`, `pan`, `mem_date`, `fees`, `status`) VALUES
('3', 'sayali mehrunkar', 'police colony', 'dhule', 2147483647, 2147483647, 'sayali@gmail.com', 2147483647, 741455, '2023-04-03', 3000, 'N'),
('4', 'janhavi kulkarni', 'ram nagar', 'dhule', 2147483647, 2147483647, 'jk@gmail.com', 2147483647, 121212, '2023-04-04', 4000, 'N'),
('2', 'Chaitali Nitin Kulkarni', '49,bhivsan nagar', 'dhule', 2147483647, 2147483647, 'kchaitali788@gmail.com', 2147483647, 548874, '2023-04-02', 2000, 'y'),
('1', 'aakanksha patil', 'anmol nagar', 'dhule', 2147483647, 2147483647, 'paakanksha@gmail.com', 2147483647, 542212, '2023-04-01', 1000, 'y'),
('5', 'Divyesh Joshi', 'nardana', 'nardana', 2147483647, 2147483647, 'dj@gmail.com', 2147483647, 249658, '2023-04-05', 5000, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `email_id` text NOT NULL,
  `cont_no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email_id`, `cont_no`) VALUES
(10, 'ck', 'ck12', 'xyz@gmail.com', 646464646),
(12, 'dj', 'dj@12', 'dj@gmail.com', 2147483647),
(13, 'aj', 'aj12', 'aj@gmail.com', 456982145),
(14, 'sm', 'sm123', 'sayali@gmail.com', 1236547895),
(15, 'vk', 'vk12', 'vaibhav@gmail.com', 2147483647);
