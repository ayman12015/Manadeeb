-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2019 at 09:33 AM
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
-- Database: `manadeeb`
--
CREATE DATABASE IF NOT EXISTS `manadeeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manadeeb`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `and_shipped_prod`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `and_shipped_prod`;
CREATE TABLE IF NOT EXISTS `and_shipped_prod` (
`ShippingId` int(11)
,`ProdNamePackage` varchar(308)
,`package_abbreviation` varchar(30)
,`qty` decimal(32,3)
,`ProductPackagePrice` decimal(10,2)
,`owner_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `cls_configuration`
--

DROP TABLE IF EXISTS `cls_configuration`;
CREATE TABLE IF NOT EXISTS `cls_configuration` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `config_status` int(11) NOT NULL COMMENT '0=active, 1=NotActive',
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cls_configuration`
--

INSERT INTO `cls_configuration` (`config_id`, `config_name`, `cls_id`, `config_status`) VALUES
(1, 'MinimumRegistrationPeriod', 2, 0),
(2, 'MinimumSalesAmount', 2, 0),
(3, 'MinimumSalesConsumed', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_configuration_values`
--

DROP TABLE IF EXISTS `cls_configuration_values`;
CREATE TABLE IF NOT EXISTS `cls_configuration_values` (
  `config_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_id` int(11) NOT NULL,
  `config_value` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `package_id` int(11) NOT NULL DEFAULT '0',
  `config_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cls_configuration_values`
--

INSERT INTO `cls_configuration_values` (`config_value_id`, `config_id`, `config_value`, `prod_id`, `package_id`, `config_type`) VALUES
(1, 1, '33', 0, 0, 0),
(2, 2, '1212', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_customer_classes`
--

DROP TABLE IF EXISTS `cls_customer_classes`;
CREATE TABLE IF NOT EXISTS `cls_customer_classes` (
  `cls_id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_name` varchar(255) NOT NULL,
  `cls_SalesStatus` int(11) NOT NULL COMMENT '0=Allwed, 1=Not Allwed',
  `default_cls` int(11) NOT NULL DEFAULT '0' COMMENT '0=NotDefault, 1=Default',
  `company_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cls_customer_classes`
--

INSERT INTO `cls_customer_classes` (`cls_id`, `cls_name`, `cls_SalesStatus`, `default_cls`, `company_id`, `del`) VALUES
(1, 'New Customers Class', 0, 1, 1, 0),
(2, 'Normal Customer Class', 0, 0, 1, 0),
(3, 'VIP Customer Class', 0, 0, 1, 0),
(4, 'Customer From Company Class', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `tell` varchar(15) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `Country`, `City`, `Address`, `tell`) VALUES
(1, 'ELMOHANDIS PAINTS', 'Sudan', 'Khartoum', 'Arkaweet, Alsalam st', '+249 24594681'),
(2, 'General Company', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `cust_mobile` varchar(15) NOT NULL,
  `cust_shop_name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `weekId` int(11) NOT NULL DEFAULT '0',
  `cls_id` int(11) NOT NULL DEFAULT '0',
  `cls_auto` int(11) NOT NULL DEFAULT '0' COMMENT '0=ِAuto, 1=NotAuto',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `entered_by` int(11) NOT NULL,
  `entered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cust_id`),
  KEY `user_id` (`user_id`),
  KEY `company_id` (`company_id`),
  KEY `entered_by` (`entered_by`),
  KEY `fk_customers_location_id` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_mobile`, `cust_shop_name`, `location_id`, `user_id`, `weekId`, `cls_id`, `cls_auto`, `company_id`, `entered_by`, `entered_date`, `del`) VALUES
(1, 'Mohammed Hassan', '0912300001', 'مركز اركويت للحوم البيضاء', 1, 10, 0, 3, 1, 1, 0, '2018-11-11 10:01:37', 0),
(3, 'Khaled Mohammed', '0912300002', 'مركز الانفال', 24, 10, 0, 4, 1, 1, 3, '2019-05-01 00:43:37', 0),
(4, 'ALshareef Hamed', '0912300003', 'ملاحت امين للدواجن', 25, 10, 0, 1, 1, 1, 5, '2019-05-20 23:58:30', 0),
(5, 'Monub Ali', '0912300004', 'مركز مبيعات ميكو اركويت1', 26, 4, 0, 4, 0, 1, 2, '2019-06-18 16:11:20', 0),
(6, 'ahmed mohammed', '0912300005', 'مركز مبيعات ميكو اركويت2', 27, 4, 0, 1, 0, 1, 8, '2019-06-20 15:05:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_bills`
--

DROP TABLE IF EXISTS `customers_bills`;
CREATE TABLE IF NOT EXISTS `customers_bills` (
  `BillId` int(11) NOT NULL AUTO_INCREMENT,
  `BillDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProdQty` varchar(25) NOT NULL,
  `ProdPrice` decimal(10,0) NOT NULL,
  `ProdName` varchar(255) NOT NULL,
  `SizerName` varchar(255) NOT NULL,
  `ShippingId` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=pending, 1=Paid, 2=Cancelled',
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BillId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_bills`
--

INSERT INTO `customers_bills` (`BillId`, `BillDate`, `ProdQty`, `ProdPrice`, `ProdName`, `SizerName`, `ShippingId`, `cust_id`, `payment_status`, `del`) VALUES
(1, '2019-08-05 12:41:52', '5', '190', 'فراخ ميكو افخاد - كيلو جرام', 'كيلو', 4, 1, 0, 0),
(2, '2019-08-05 12:42:08', '7', '170', 'فراخ ميكو جوال صغير - كيلو جرام', 'كيلو', 1, 3, 0, 0),
(3, '2019-08-05 12:42:22', '8', '200', 'فراخ ميكو صدور - كيلو جرام', 'كيلو', 3, 4, 0, 0),
(4, '2019-08-05 12:45:35', '9', '170', 'فراخ ميكو جوال كبير - كيلو جرام', 'كيلو', 2, 4, 0, 0),
(5, '2019-08-05 12:46:10', '10', '170', 'فراخ ميكو جوال كبير - كيلو جرام', 'كيلو', 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_bills_payment`
--

DROP TABLE IF EXISTS `customers_bills_payment`;
CREATE TABLE IF NOT EXISTS `customers_bills_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_amt` decimal(10,0) NOT NULL,
  `pay_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `BillId` int(11) NOT NULL,
  `pay_type` int(11) NOT NULL COMMENT '0=Cash, 1=Cheack, 2=electronic',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers_bills_payment_checks`
--

DROP TABLE IF EXISTS `customers_bills_payment_checks`;
CREATE TABLE IF NOT EXISTS `customers_bills_payment_checks` (
  `check_id` int(11) NOT NULL AUTO_INCREMENT,
  `checks_amt` decimal(10,3) NOT NULL,
  `checks_no` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `check_dt` date NOT NULL,
  `pay_id` int(11) NOT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers_bills_query`
--

DROP TABLE IF EXISTS `customers_bills_query`;
CREATE TABLE IF NOT EXISTS `customers_bills_query` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `query_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BillId` int(11) NOT NULL,
  `query_type` int(11) NOT NULL COMMENT '0=ProductIsFinished',
  `finish_date` date DEFAULT NULL,
  `available_Qty` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`query_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers_request`
--

DROP TABLE IF EXISTS `customers_request`;
CREATE TABLE IF NOT EXISTS `customers_request` (
  `ReqId` int(11) NOT NULL AUTO_INCREMENT,
  `ReqDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ReqBillDate` varchar(255) NOT NULL,
  `ProdQty` varchar(25) NOT NULL,
  `ProdPrice` decimal(10,0) NOT NULL,
  `ProdName` varchar(255) NOT NULL,
  `SizerName` varchar(255) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pemding, 1=Done',
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ReqId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_request`
--

INSERT INTO `customers_request` (`ReqId`, `ReqDate`, `ReqBillDate`, `ProdQty`, `ProdPrice`, `ProdName`, `SizerName`, `cust_id`, `request_status`, `del`) VALUES
(1, '2019-08-05 12:30:39', '30/8/2019', '20', '190', 'فراخ ميكو افخاد - كيلو جرام', 'كيلو', 1, 0, 0),
(2, '2019-08-05 12:30:47', '30/8/2019', '20', '190', 'فراخ ميكو افخاد - كيلو جرام', 'كيلو', 1, 0, 0),
(3, '2019-08-05 12:30:55', '30/8/2019', '20', '190', 'فراخ ميكو افخاد - كيلو جرام', 'كيلو', 1, 0, 0),
(4, '2019-08-05 12:57:50', '29/8/2019', '2', '170', 'فراخ ميكو جوال صغير - كيلو جرام', 'كيلو', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_banks`
--

DROP TABLE IF EXISTS `customer_banks`;
CREATE TABLE IF NOT EXISTS `customer_banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dump_productcusperday`
--

DROP TABLE IF EXISTS `dump_productcusperday`;
CREATE TABLE IF NOT EXISTS `dump_productcusperday` (
  `PerDay_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `ProductCunsumingPerDay` varchar(100) NOT NULL,
  `WeeklyProposedQuantities` decimal(10,3) NOT NULL,
  `record_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PerDay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(6, '1562580017'),
(6, '1562679270'),
(6, '1562679277'),
(6, '1562743702'),
(6, '1562829508'),
(6, '1562829525'),
(6, '1563193669'),
(6, '1563274610'),
(6, '1563793397'),
(6, '1564056448');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `phone` varchar(14) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL COMMENT '0=Web Admin Accout,\r\n1=Web Sales Administration,\r\n2=Web Financial Management,\r\n3=Web Production Management,\r\n4=Phone AndroidUser',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=Active, 1=Disabled',
  `Login` int(11) NOT NULL DEFAULT '0' COMMENT '0=Out, 1=In',
  `company_id` int(11) NOT NULL,
  `lang` varchar(3) NOT NULL DEFAULT 'EN',
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `phone`, `type`, `status`, `Login`, `company_id`, `lang`, `del`) VALUES
(2, 'Monueb Ali Ahmed', 'siddigalbahi1@gmail.com', '$2y$10$MeIDbCE6RJkXtFr.E0vanuS1TOC38uVwWdWp.zBNd60glFkUq1ePe', '00249924594683', 4, 0, 0, 1, 'EN', 0),
(3, 'Osman Karar', 'siddigalbahi2@gmail.com', '$2y$10$MeIDbCE6RJkXtFr.E0vanuS1TOC38uVwWdWp.zBNd60glFkUq1ePe', '00249924594682', 4, 0, 0, 1, 'EN', 0),
(4, 'Omer Ali Hamad', 'siddigalbahi3@gmail.com', '$2y$10$MeIDbCE6RJkXtFr.E0vanuS1TOC38uVwWdWp.zBNd60glFkUq1ePe', '00249924594680', 4, 0, 0, 1, 'EN', 0),
(5, 'Mohammed Ahmed Ali', 'maoob2@gmail.com', '$2y$10$gjNWKJH0AIb5BNR.3s1YxeMXiY//loVHAIxPAUAq2S8/YjhqklW2q', '0916554412', 4, 0, 0, 1, 'EN', 0),
(6, 'Ali Mohammed', 'Ali@gmail.com', '$2y$10$RZpvcBdLHMSWLbFYFIHG9evya47t3ERum9vfkH.9XQjPv2klJH1wC', '0924594681', 1, 0, 1, 1, 'AR', 0),
(7, 'Hassan Ismail', 'Omer@gmail.com', '$2y$10$2SgstPWXlTfUQ.rLrpS0Q.hPhlFuCM5UN7yc/Dlp2wX2w/i3cE6wO', '0912301763', 2, 0, 0, 1, 'EN', 0),
(8, 'Mohammed Malik', 'mohammed@gmail.com', '$2y$10$qEmbKXtfINpV30qGt7XAXukR/JtpmnVY1FZQJtsh7l2buxsyG7Ak.', '0124049437', 4, 1, 0, 1, 'EN', 0),
(9, 'Hassan Omer', 'OmerAliAli@gmail.com', '$2y$10$IPtR.dolb3ZSbuK9r0Sy9euBjzEVD3srG9bn6gSVUhNbimAC9CxL.', '0912385654', 2, 0, 1, 1, 'EN', 0),
(10, 'Hamed Mohammed Hammed', 'Hamed@gmail.com', '$2y$10$vmW5qB7XFiREZ6bg1zvmNeBZ0AwbtvLUWj32W2TNNTdo7ccYsTxyy', '00249924594681', 4, 0, 0, 1, 'EN', 0),
(11, 'alsiddig001', 'siddig@siddig.com', '$2y$10$Wm.3g4aCm2gZ8nynzBMRcOUxaLMk3Zwek2SkSIuRYtnVe0oaW0N/y', '11111111111111', 1, 1, 0, 1, 'EN', 0),
(12, 'alsiddig002', 'siddig@siddigs.com', '$2y$10$W46xvKqeUnRMN1yit3/8Fe0MeuaSKGwJTONooFhD20pLBsBcCaAje', '123123123', 1, 1, 0, 1, 'EN', 0),
(13, 'siddig ali ali', 'siddig@2siddig.com', '$2y$10$bUL.RBEahVGlnXPydkkEA.QvvOL1lFMPI1OcuPG8vwmNHMdfZkXVC', '123321123', 1, 1, 0, 1, 'EN', 0),
(14, 'alsiddig222', 'siddig@22siddig.com', '$2y$10$XLIcLa/JsB.uDM1tAswMdOAccpAfxkw5y0DeLMxxd9y5xVkwM.RLa', '0924594681', 1, 1, 0, 1, 'EN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members_problems`
--

DROP TABLE IF EXISTS `members_problems`;
CREATE TABLE IF NOT EXISTS `members_problems` (
  `prob_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `problem_type` varchar(255) NOT NULL,
  `problem_details` varchar(6000) DEFAULT 'Empty',
  `problem_others` varchar(6000) DEFAULT 'Empty',
  `problem_status` int(11) NOT NULL DEFAULT '0',
  `problem_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prob_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_problems`
--

INSERT INTO `members_problems` (`prob_id`, `member_id`, `problem_type`, `problem_details`, `problem_others`, `problem_status`, `problem_date`) VALUES
(1, 1, 'اخري', 'Empty', 'Empty', 0, '2019-06-25 10:47:32'),
(2, 1, 'لا أستطيع إضافة عميل', '12', '', 0, '2019-06-26 05:56:10'),
(3, 1, 'المنتجات / العملاء لايظهرون', '', '', 0, '2019-06-26 06:07:06'),
(4, 1, 'نسيت كلمة المرور', 'Empty', 'Empty', 0, '2019-06-26 06:12:05'),
(5, 1, 'نسيت كلمة المرور', 'Empty', 'Empty', 0, '2019-06-26 06:12:20'),
(6, 1, 'اخري', 'Empty', 'مشكلة كبيرة جدا', 0, '2019-06-26 06:12:38'),
(7, 1, 'لا أستطيع إضافة عميل', 'c', 'مشكلة كبيرة جدا', 0, '2019-06-26 06:13:32'),
(8, 1, 'لا أستطيع إضافة عميل', 'cannot add cus', 'مشكلة كبيرة جدا', 0, '2019-06-26 06:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) NOT NULL,
  `package_abbreviation` varchar(30) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_abbreviation`, `del`, `company_id`) VALUES
(1, 'كيلو جرام', 'كيلو', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages_priveleges`
--

DROP TABLE IF EXISTS `pages_priveleges`;
CREATE TABLE IF NOT EXISTS `pages_priveleges` (
  `prev_id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=Allow, 2=Notallowed',
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prev_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_priveleges`
--

INSERT INTO `pages_priveleges` (`prev_id`, `Group_id`, `page_id`, `status`, `del`) VALUES
(1, 2, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages_table`
--

DROP TABLE IF EXISTS `pages_table`;
CREATE TABLE IF NOT EXISTS `pages_table` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `page` varchar(50) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_table`
--

INSERT INTO `pages_table` (`page_id`, `page_name`, `page`, `del`) VALUES
(1, 'Company Main Screen', 'index.php', 0),
(2, 'Add New User (Admin)', 'NewUser.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productprice`
--

DROP TABLE IF EXISTS `productprice`;
CREATE TABLE IF NOT EXISTS `productprice` (
  `priceId` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `ProductCost` decimal(10,2) NOT NULL,
  `CurrentPrice` int(11) NOT NULL DEFAULT '1',
  `PriceDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`priceId`),
  KEY `prod_id` (`prod_id`),
  KEY `package_id` (`package_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productprice`
--

INSERT INTO `productprice` (`priceId`, `prod_id`, `package_id`, `ProductPrice`, `ProductCost`, `CurrentPrice`, `PriceDate`, `company_id`, `del`) VALUES
(1, 1, 1, '170.00', '150.00', 1, '2019-08-04 10:12:51', 1, 0),
(2, 2, 1, '170.00', '150.00', 1, '2019-08-04 10:13:00', 1, 0),
(3, 3, 1, '200.00', '190.00', 1, '2019-08-04 10:13:13', 1, 0),
(4, 4, 1, '190.00', '170.00', 1, '2019-08-04 10:13:22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `manageable` int(11) NOT NULL DEFAULT '0',
  `Descriptions` text NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prod_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `manageable`, `Descriptions`, `vendor_id`, `status`, `featured`, `company_id`, `del`) VALUES
(1, 'فراخ ميكو جوال صغير', 1, '', 7, 1, 0, 1, 0),
(2, 'فراخ ميكو جوال كبير', 1, '', 7, 1, 0, 1, 0),
(3, 'فراخ ميكو صدور', 1, '', 7, 1, 0, 1, 0),
(4, 'فراخ ميكو افخاد', 1, '', 7, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_store`
--

DROP TABLE IF EXISTS `product_store`;
CREATE TABLE IF NOT EXISTS `product_store` (
  `Store_id` int(11) NOT NULL AUTO_INCREMENT,
  `storeId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `tran_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(11) NOT NULL,
  `Store_type` int(11) NOT NULL COMMENT '0=In, 1=Out',
  `ShippingId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_store`
--

INSERT INTO `product_store` (`Store_id`, `storeId`, `qty`, `prod_id`, `package_id`, `tran_date`, `company_id`, `Store_type`, `ShippingId`) VALUES
(1, 1, 250, 1, 1, '2019-08-05 12:17:03', 1, 0, 0),
(2, 1, 250, 2, 1, '2019-08-05 12:17:10', 1, 0, 0),
(3, 1, 250, 3, 1, '2019-08-05 12:17:15', 1, 0, 0),
(4, 1, 250, 4, 1, '2019-08-05 12:17:21', 1, 0, 0),
(5, 1, 50, 1, 1, '2019-08-05 12:25:48', 1, 1, 1),
(6, 1, 50, 2, 1, '2019-08-05 12:25:56', 1, 1, 2),
(7, 1, 25, 3, 1, '2019-08-05 12:26:05', 1, 1, 3),
(8, 1, 25, 4, 1, '2019-08-05 12:26:11', 1, 1, 4),
(9, 1, 66, 1, 1, '2019-08-05 12:57:13', 1, 1, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `prod_in_store`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `prod_in_store`;
CREATE TABLE IF NOT EXISTS `prod_in_store` (
`prod_id` int(11)
,`package_id` int(11)
,`storeId` int(11)
,`QTY_AVALABLE` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `recentactivity`
--

DROP TABLE IF EXISTS `recentactivity`;
CREATE TABLE IF NOT EXISTS `recentactivity` (
  `ACTIVITY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIVITY_DATE_TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVITY_CONTEND` varchar(255) NOT NULL,
  `ACTIVITY_TYPE` int(11) NOT NULL COMMENT '0=LOGIN, 1=SHIPPING, 2=SALES, 3=NEWCUSTOMER,4=SIGNOUT',
  `ACTIVITY_STATUS` int(11) NOT NULL DEFAULT '0' COMMENT '0=ACTIVE, 1=NOTACTVE',
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ACTIVITY_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_test`
--

DROP TABLE IF EXISTS `request_test`;
CREATE TABLE IF NOT EXISTS `request_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `request_notes` text NOT NULL,
  `mRequest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_test`
--

INSERT INTO `request_test` (`id`, `page`, `request_notes`, `mRequest`) VALUES
(4, 'AddRequest.php', 'new Request Bill', 'Array\n(\n)\n'),
(5, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(3, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(6, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(7, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(8, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(9, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 30/8/2019\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(10, 'AddCustBill.php', 'new Cust Bill', 'Array\n(\n    [ShippingId] => 4\n    [qty] => 20\n    [CustSelectedId] => 1\n)\n'),
(11, 'AddCustBill.php', 'new Cust Bill', 'Array\n(\n    [ShippingId] => 1\n    [qty] => 10\n    [CustSelectedId] => 3\n)\n'),
(12, 'AddCustBill.php', 'new Cust Bill', 'Array\n(\n    [ShippingId] => 3\n    [qty] => 2\n    [CustSelectedId] => 4\n)\n'),
(13, 'AddCustBill.php', 'new Cust Bill', 'Array\n(\n    [ShippingId] => 2\n    [qty] => 21\n    [CustSelectedId] => 4\n)\n'),
(14, 'AddCustBill.php', 'new Cust Bill', 'Array\n(\n    [ShippingId] => 2\n    [qty] => 50\n    [CustSelectedId] => 1\n)\n'),
(15, 'login.php', 'new login', 'Array\n(\n    [UserPhone] => 00249924594680\n    [UserPass] => Abc123**\n)\n'),
(16, 'AddRequest.php', 'new Request Bill', 'Array\n(\n    [RequestDate] => 29/8/2019\n    [ShippingId] => 5\n    [qty] => 2\n    [CustSelectedId] => 5\n)\n');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `ShippingId` int(11) NOT NULL AUTO_INCREMENT,
  `priceId` int(11) NOT NULL,
  `qty` decimal(10,3) NOT NULL,
  `ShippingDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PaymentStatus` int(11) NOT NULL DEFAULT '0' COMMENT '1=half, 2=full',
  `owner_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ShippingId`),
  KEY `priceId` (`priceId`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ShippingId`, `priceId`, `qty`, `ShippingDate`, `PaymentStatus`, `owner_id`, `del`) VALUES
(1, 1, '50.000', '2019-08-05 12:25:48', 0, 10, 0),
(2, 2, '50.000', '2019-08-05 12:25:56', 0, 10, 0),
(3, 3, '25.000', '2019-08-05 12:26:05', 0, 10, 0),
(4, 4, '25.000', '2019-08-05 12:26:11', 0, 10, 0),
(5, 1, '66.000', '2019-08-05 12:57:13', 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippingpayment`
--

DROP TABLE IF EXISTS `shippingpayment`;
CREATE TABLE IF NOT EXISTS `shippingpayment` (
  `Payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ShippingId` int(11) NOT NULL,
  `PaidAmount` decimal(10,3) NOT NULL,
  `PaidDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Payment_id`),
  KEY `ShippingId` (`ShippingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shippingreturn`
--

DROP TABLE IF EXISTS `shippingreturn`;
CREATE TABLE IF NOT EXISTS `shippingreturn` (
  `return_id` int(11) NOT NULL,
  `ShippingId` int(11) NOT NULL,
  `ReturnedValue` int(11) NOT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shops_locations`
--

DROP TABLE IF EXISTS `shops_locations`;
CREATE TABLE IF NOT EXISTS `shops_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `LX` double NOT NULL,
  `LY` double NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shops_locations`
--

INSERT INTO `shops_locations` (`location_id`, `LX`, `LY`, `del`) VALUES
(1, 15.55011918, 32.55574711, 0),
(24, 15.55011918, 32.56574711, 0),
(25, 15.55011918, 32.57574711, 0),
(26, 15.55011918, 32.58574711, 0),
(27, 15.55011918, 32.59574711, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `storeId` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `store_type` int(11) NOT NULL DEFAULT '1',
  `store_status` int(11) NOT NULL DEFAULT '1',
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`storeId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeId`, `store_name`, `store_type`, `store_status`, `created_dt`, `company_id`) VALUES
(1, 'مخزن الشحن الرئيسي', 2, 1, '2019-07-05 23:48:54', 1),
(2, 'المخزن الجتوبي', 1, 1, '2019-07-05 23:49:27', 1),
(3, 'مخزن التالف', 3, 1, '2019-07-05 23:49:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_phone` varchar(14) DEFAULT NULL,
  `vendor_tell` varchar(14) DEFAULT NULL,
  `vendor_company_name` varchar(100) DEFAULT NULL,
  `vendor_Company_address` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vendor_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_phone`, `vendor_tell`, `vendor_company_name`, `vendor_Company_address`, `company_id`, `del`) VALUES
(7, 'شركة ميكو للدواجن', '0912300000', '0183757530', 'شركة ميكو للدواجن', 'Khartoum bahry', 1, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bills_full_info`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_bills_full_info`;
CREATE TABLE IF NOT EXISTS `v_bills_full_info` (
`BillId` int(11)
,`BillDate` datetime
,`ProdQty` varchar(25)
,`ProdPrice` decimal(10,0)
,`ProdName` varchar(255)
,`SizerName` varchar(255)
,`ShippingId` int(11)
,`cust_id` int(11)
,`priceId` int(11)
,`ProductCost` decimal(10,2)
,`ShippingQTY` decimal(10,3)
,`ShippingDate` datetime
,`PaymentStatus` int(11)
,`owner_id` int(11)
,`prod_id` int(11)
,`package_id` int(11)
,`CurrentPrice` int(11)
,`PriceDate` datetime
,`company_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_shipping`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_shipping`;
CREATE TABLE IF NOT EXISTS `v_shipping` (
`ShippingId` int(11)
,`ProdNamePackage` varchar(308)
,`qty` decimal(10,3)
,`ProductPackagePrice` decimal(10,2)
,`TotalPrice` decimal(20,5)
,`ShippingDate` datetime
,`PaidAmount` varchar(34)
,`package_abbreviation` varchar(30)
,`PaymentStatus` int(11)
,`owner_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_shippingpayment_total`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_shippingpayment_total`;
CREATE TABLE IF NOT EXISTS `v_shippingpayment_total` (
`shippingid` int(11)
,`PaidAmount` decimal(32,3)
);

-- --------------------------------------------------------

--
-- Structure for view `and_shipped_prod`
--
DROP TABLE IF EXISTS `and_shipped_prod`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `and_shipped_prod`  AS  select `v_shipping`.`ShippingId` AS `ShippingId`,`v_shipping`.`ProdNamePackage` AS `ProdNamePackage`,`v_shipping`.`package_abbreviation` AS `package_abbreviation`,sum(`v_shipping`.`qty`) AS `qty`,`v_shipping`.`ProductPackagePrice` AS `ProductPackagePrice`,`v_shipping`.`owner_id` AS `owner_id` from `v_shipping` where (`v_shipping`.`PaymentStatus` <> 2) group by `v_shipping`.`ProdNamePackage`,`v_shipping`.`qty`,`v_shipping`.`package_abbreviation`,`v_shipping`.`ProductPackagePrice`,`v_shipping`.`owner_id` order by `v_shipping`.`ProdNamePackage` ;

-- --------------------------------------------------------

--
-- Structure for view `prod_in_store`
--
DROP TABLE IF EXISTS `prod_in_store`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prod_in_store`  AS  select `ps`.`prod_id` AS `prod_id`,`ps`.`package_id` AS `package_id`,`ps`.`storeId` AS `storeId`,sum((case when (`ps`.`Store_type` = 0) then (`ps`.`qty` * 1) else (`ps`.`qty` * -(1)) end)) AS `QTY_AVALABLE` from ((`product_store` `ps` join `packages` `pg`) join `products` `p`) where ((`ps`.`prod_id` = `p`.`prod_id`) and (`ps`.`package_id` = `pg`.`package_id`)) group by `ps`.`prod_id`,`ps`.`package_id`,`ps`.`storeId` ;

-- --------------------------------------------------------

--
-- Structure for view `v_bills_full_info`
--
DROP TABLE IF EXISTS `v_bills_full_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bills_full_info`  AS  select `customers_bills`.`BillId` AS `BillId`,`customers_bills`.`BillDate` AS `BillDate`,`customers_bills`.`ProdQty` AS `ProdQty`,`customers_bills`.`ProdPrice` AS `ProdPrice`,`customers_bills`.`ProdName` AS `ProdName`,`customers_bills`.`SizerName` AS `SizerName`,`shipping`.`ShippingId` AS `ShippingId`,`customers_bills`.`cust_id` AS `cust_id`,`productprice`.`priceId` AS `priceId`,`productprice`.`ProductCost` AS `ProductCost`,`shipping`.`qty` AS `ShippingQTY`,`shipping`.`ShippingDate` AS `ShippingDate`,`shipping`.`PaymentStatus` AS `PaymentStatus`,`shipping`.`owner_id` AS `owner_id`,`productprice`.`prod_id` AS `prod_id`,`productprice`.`package_id` AS `package_id`,`productprice`.`CurrentPrice` AS `CurrentPrice`,`productprice`.`PriceDate` AS `PriceDate`,`productprice`.`company_id` AS `company_id` from ((`customers_bills` join `shipping`) join `productprice`) where ((`shipping`.`ShippingId` = `customers_bills`.`ShippingId`) and (`productprice`.`priceId` = `shipping`.`priceId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_shipping`
--
DROP TABLE IF EXISTS `v_shipping`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_shipping`  AS  select `s`.`ShippingId` AS `ShippingId`,concat(`p`.`prod_name`,' - ',`pg`.`package_name`) AS `ProdNamePackage`,`s`.`qty` AS `qty`,`pp`.`ProductPrice` AS `ProductPackagePrice`,(`pp`.`ProductPrice` * `s`.`qty`) AS `TotalPrice`,`s`.`ShippingDate` AS `ShippingDate`,(case when ((select `v_shippingpayment_total`.`PaidAmount` from `v_shippingpayment_total` where (`v_shippingpayment_total`.`shippingid` = `s`.`ShippingId`)) > 0) then (select `v_shippingpayment_total`.`PaidAmount` from `v_shippingpayment_total` where (`v_shippingpayment_total`.`shippingid` = `s`.`ShippingId`)) else '0' end) AS `PaidAmount`,`pg`.`package_abbreviation` AS `package_abbreviation`,`s`.`PaymentStatus` AS `PaymentStatus`,`s`.`owner_id` AS `owner_id` from ((((`productprice` `pp` join `members` `m`) join `products` `p`) join `packages` `pg`) join `shipping` `s`) where ((`s`.`priceId` = `pp`.`priceId`) and (`s`.`owner_id` = `m`.`id`) and (`pp`.`prod_id` = `p`.`prod_id`) and (`pp`.`package_id` = `pg`.`package_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_shippingpayment_total`
--
DROP TABLE IF EXISTS `v_shippingpayment_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_shippingpayment_total`  AS  select `shippingpayment`.`ShippingId` AS `shippingid`,sum(`shippingpayment`.`PaidAmount`) AS `PaidAmount` from `shippingpayment` group by `shippingpayment`.`ShippingId` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customers_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `fk_customers_location_id` FOREIGN KEY (`location_id`) REFERENCES `shops_locations` (`location_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_members_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `fk_packages_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `productprice`
--
ALTER TABLE `productprice`
  ADD CONSTRAINT `fk_productprice_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `fk_productprice_package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`),
  ADD CONSTRAINT `fk_productprice_prod_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `fk_products_vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `fk_shipping_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `fk_shipping_priceId` FOREIGN KEY (`priceId`) REFERENCES `productprice` (`priceId`);

--
-- Constraints for table `shippingpayment`
--
ALTER TABLE `shippingpayment`
  ADD CONSTRAINT `fk_shippingpayment_ShippingId` FOREIGN KEY (`ShippingId`) REFERENCES `shipping` (`ShippingId`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `fk_vendors_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
