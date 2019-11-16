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
-- Table structure for table `members_problems`
--

CREATE TABLE `members_problems` (
  `prob_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `problem_type` varchar(255) NOT NULL,
  `problem_details` varchar(6000) DEFAULT 'Empty',
  `problem_others` varchar(6000) DEFAULT 'Empty',
  `problem_status` int(11) NOT NULL DEFAULT '0',
  `problem_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_problems`
--

INSERT INTO `members_problems` (`prob_id`, `member_id`, `problem_type`, `problem_details`, `problem_others`, `problem_status`, `problem_date`) VALUES
(1, 1, 'اخري', 'Empty', 'Empty', 0, '2019-06-25 13:47:32'),
(2, 1, 'لا أستطيع إضافة عميل', '12', '', 0, '2019-06-26 08:56:10'),
(3, 1, 'المنتجات / العملاء لايظهرون', '', '', 0, '2019-06-26 09:07:06'),
(4, 1, 'نسيت كلمة المرور', 'Empty', 'Empty', 0, '2019-06-26 09:12:05'),
(5, 1, 'نسيت كلمة المرور', 'Empty', 'Empty', 0, '2019-06-26 09:12:20'),
(6, 1, 'اخري', 'Empty', 'مشكلة كبيرة جدا', 0, '2019-06-26 09:12:38'),
(7, 1, 'لا أستطيع إضافة عميل', 'c', 'مشكلة كبيرة جدا', 0, '2019-06-26 09:13:32'),
(8, 1, 'لا أستطيع إضافة عميل', 'cannot add cus', 'مشكلة كبيرة جدا', 0, '2019-06-26 09:13:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members_problems`
--
ALTER TABLE `members_problems`
  ADD PRIMARY KEY (`prob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_problems`
--
ALTER TABLE `members_problems`
  MODIFY `prob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
