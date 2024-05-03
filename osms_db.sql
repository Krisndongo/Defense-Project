-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2022 at 03:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `r_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345678'),
(2, 'amirul', 'amirul@gmail.com', '$2y$10$Gvsqbgu0nvNPae09Ug1ovOvfDoPi3dq493wDw6DVonnMnSYZ5gAa6');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(5, 'monitor', '2021-04-20', 18, 22, 222, 200),
(6, 'mouce', '2021-04-07', 22, 223, 2223, 2003),
(7, 'glass', '2021-04-07', 12, 223, 2223, 2003);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(25, 50, 'Jack and Jones', 'Hello There have you seen this movie', 'Raj', '123', 'Sector Five', 'Bokaro', 'Jharkhand', 123456, 'raj@gmail.com', 234234234, '12', '2021-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(1, 'Shukla', 'Bokaro', 'Mouse', 1, 600, 600, '2018-10-13'),
(2, 'Pandey ji', 'Ranchi', 'Mouse', 2, 600, 600, '2018-10-13'),
(3, 'Musaddi Lal', 'Bokaro', 'Mouse', 5, 600, 3000, '2018-10-13'),
(4, 'Jay Ho', 'Ranchi', 'Mouse', 2, 600, 1200, '2018-10-13'),
(5, 'something', 'somethingadd', 'Mouse', 1, 600, 600, '2018-10-13'),
(6, 'someone', 'someoneadd', 'Keyboard', 1, 500, 500, '2018-10-13'),
(7, 'jay', 'jay ho', 'Keyboard', 1, 500, 500, '2018-10-09'),
(8, 'Jay', 'Bokaro', 'Keyboard', 2, 500, 1000, '2018-10-21'),
(9, 'Kumar', 'Bokaro', 'Keyboard', 1, 500, 500, '2018-10-20'),
(10, 'kkk', 'asdsa', 'Keyboard', 1, 500, 500, '2018-10-20'),
(11, 'Shukla Ji', 'Ranchi', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(19, 'sdsads', 'dasdsa', 'Keyboard', 1, 500, 500, '2018-10-20'),
(20, 'asdas', 'asdsad', 'Keyboard', 1, 500, 500, '2018-10-20'),
(21, 'dsadas', 'asdasd', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(22, 'sdfsdf', 'dfsdf', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(23, 'Ramu', 'sadsad', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(24, 'gfdgfdg', 'fgfdgfdg', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(25, 'rrr', 'fgdf', 'Mouse', 1, 600, 600, '2018-10-20'),
(26, 'Jay', 'ranchi', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(27, 'dfsdfsd', 'sdfdsf', 'Mouse', 1, 600, 600, '2018-10-20'),
(28, 'Kunal', 'Ranchi', 'Rode Mic', 1, 18000, 18000, '2018-10-20'),
(29, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(30, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(31, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(32, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(33, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(34, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(35, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(36, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(37, 'aaa', 'aaaa', 'Keyboard 3', 2, 500, 22, '2021-04-26'),
(38, 'aaa', 'aaaa', 'mouce 2', 10, 200, 3000, '2021-04-20'),
(39, 'amirul', 'dhaka', 'mouce', 12, 200, 3000, '2021-04-26'),
(40, 'amirul', 'aaaa', 'mouce', 2, 200, 3000, '2021-04-08'),
(41, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(42, 'amirul', 'dhaka', 'mouce', 2, 200, 22, '2021-04-19'),
(43, 'amirul', 'aaaa', 'mouce', 222, 2003, 22, '2021-04-22'),
(44, 'amirul', 'aaaa', 'mouce', 222, 2003, 22, '2021-04-22'),
(45, 'amirul', 'aaaa', 'mouce', 222, 2003, 22, '2021-04-22'),
(46, 'amirul', 'aaaa', 'mouce', 222, 2003, 22, '2021-04-22'),
(47, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(48, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(49, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(50, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(51, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(52, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(53, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(54, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(55, 'amirul', 'dhaka', 'mouce', 2, 200, 3000, '2021-04-20'),
(56, 'amirul', 'dhaka', 'mouce', 10, 200, 3000, '2021-04-22'),
(57, 'amirul', 'dhaka', 'mouce', 10, 200, 3000, '2021-04-22'),
(58, 'amirul', 'aaaa', 'mouce2', 2, 200, 3000, '2021-04-27'),
(59, 'anirban', 'dhaka', 'computer', 10, 150, 1500, '2021-04-26'),
(60, 'amirul', 'dhaka', 'amirul', 2, 200, 3000, '2021-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(72, 'amirul islam sabbir', 'anirbancsegub@gmail.com', '$2y$10$D1f.6b7GYdneAWK2dmTDc.pWJrO4xDebS0i4chc7d1gW8Oq1t/LvC'),
(78, 'amirul', 'anirbancsegub@gmail.comsss', '$2y$10$zd6DNAsQn.tOOg/wY11Dl./MfjI9jp2hPU37jEZa4WDU/X98jdLke'),
(79, 'amirul123', 'a@mail.mail', '$2y$10$EGnov7xqdEmDKOTf2TQnpuirpijkE/RxjTo.YjLJC0gNs4r8fm9yS');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(50, 'Jack and Jones', 'Hello There have you seen this movie', 'Raj', '123', 'Sector Five', 'Bokaro', 'Jharkhand', 123456, 'raj@gmail.com', 234234234, '2018-10-13'),
(76, 'pump repair', 'aaaaaaaaaaaaa', 'rahul', 'www', 'e33', 'dhaka', 'ddd', 2311, 'a@mail.mail', 1111111111, '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `empid` int(11) NOT NULL,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(11) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(17, 'amirul', 'dhaka', 1834513106, 'tec1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
