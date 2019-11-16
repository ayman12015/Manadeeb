-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 02:31 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manadeeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_request`
--

CREATE TABLE `customers_request` (
  `ReqId` int(11) NOT NULL,
  `ReqDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ReqBillDate` varchar(255) NOT NULL,
  `ProdQty` varchar(25) NOT NULL,
  `ProdPrice` decimal(10,0) NOT NULL,
  `ProdName` varchar(255) NOT NULL,
  `SizerName` varchar(255) NOT NULL,
  `ShippingId` int(11) NOT NULL DEFAULT '0',
  `cust_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_request`
--

INSERT INTO `customers_request` (`ReqId`, `ReqDate`, `ReqBillDate`, `ProdQty`, `ProdPrice`, `ProdName`, `SizerName`, `ShippingId`, `cust_id`, `del`) VALUES
(1, '2019-06-16 16:09:46', '30/6/2019', '12', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(2, '2019-06-16 16:10:11', '29/6/2019', '5', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(3, '2019-06-16 16:23:19', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(4, '2019-06-16 16:23:38', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(5, '2019-06-16 16:24:39', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(6, '2019-06-16 16:25:18', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(7, '2019-06-16 16:25:34', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(8, '2019-06-16 16:25:36', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(9, '2019-06-16 16:25:38', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(10, '2019-06-16 16:36:40', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(11, '2019-06-16 16:41:50', '29/6/2019', '1', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(12, '2019-06-16 16:46:46', '29/6/2019', '1', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(13, '2019-06-18 11:58:56', '30/6/2019', '4', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(14, '2019-06-19 13:11:18', '30/6/2019', '5', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0),
(15, '2019-06-20 14:14:53', '30/6/2019', '12', '1500', 'فراخ ميكو - جوال صغير 40ك', 'جوال', 6, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_request`
--
ALTER TABLE `customers_request`
  ADD PRIMARY KEY (`ReqId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_request`
--
ALTER TABLE `customers_request`
  MODIFY `ReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
