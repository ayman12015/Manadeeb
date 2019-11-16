-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 17, 2019 at 12:11 PM
-- Server version: 10.3.12-MariaDB
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
-- Database: `manadeeb_mico`
--

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `and_shipped_prod`  AS  select `v_shipping`.`ShippingId` AS `ShippingId`,`v_shipping`.`ProdNamePackage` AS `ProdNamePackage`,`v_shipping`.`package_abbreviation` AS `package_abbreviation`,sum(`v_shipping`.`qty`) AS `qty`,`v_shipping`.`ProductPackagePrice` AS `ProductPackagePrice`,`v_shipping`.`owner_id` AS `owner_id` from `v_shipping` where `v_shipping`.`PaymentStatus` <> 2 group by `v_shipping`.`ProdNamePackage`,`v_shipping`.`qty`,`v_shipping`.`package_abbreviation`,`v_shipping`.`ProductPackagePrice`,`v_shipping`.`owner_id` order by `v_shipping`.`ProdNamePackage` ;

-- --------------------------------------------------------

--
-- Structure for view `prod_in_store`
--
DROP TABLE IF EXISTS `prod_in_store`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prod_in_store`  AS  select `ps`.`prod_id` AS `prod_id`,`ps`.`package_id` AS `package_id`,`ps`.`storeId` AS `storeId`,sum(case when `ps`.`Store_type` = 0 then `ps`.`qty` * 1 else `ps`.`qty` * -1 end) AS `QTY_AVALABLE` from ((`product_store` `ps` join `packages` `pg`) join `products` `p`) where `ps`.`prod_id` = `p`.`prod_id` and `ps`.`package_id` = `pg`.`package_id` group by `ps`.`prod_id`,`ps`.`package_id`,`ps`.`storeId` ;

-- --------------------------------------------------------

--
-- Structure for view `v_bills_full_info`
--
DROP TABLE IF EXISTS `v_bills_full_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bills_full_info`  AS  select `customers_bills`.`BillId` AS `BillId`,`customers_bills`.`BillDate` AS `BillDate`,`customers_bills`.`ProdQty` AS `ProdQty`,`customers_bills`.`ProdPrice` AS `ProdPrice`,`customers_bills`.`ProdName` AS `ProdName`,`customers_bills`.`SizerName` AS `SizerName`,`shipping`.`ShippingId` AS `ShippingId`,`customers_bills`.`cust_id` AS `cust_id`,`productprice`.`priceId` AS `priceId`,`productprice`.`ProductCost` AS `ProductCost`,`shipping`.`qty` AS `ShippingQTY`,`shipping`.`ShippingDate` AS `ShippingDate`,`shipping`.`PaymentStatus` AS `PaymentStatus`,`shipping`.`owner_id` AS `owner_id`,`productprice`.`prod_id` AS `prod_id`,`productprice`.`package_id` AS `package_id`,`productprice`.`CurrentPrice` AS `CurrentPrice`,`productprice`.`PriceDate` AS `PriceDate`,`productprice`.`company_id` AS `company_id` from ((`customers_bills` join `shipping`) join `productprice`) where `shipping`.`ShippingId` = `customers_bills`.`ShippingId` and `productprice`.`priceId` = `shipping`.`priceId` ;

-- --------------------------------------------------------

--
-- Structure for view `v_shipping`
--
DROP TABLE IF EXISTS `v_shipping`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_shipping`  AS  select `s`.`ShippingId` AS `ShippingId`,concat(`p`.`prod_name`,' - ',`pg`.`package_name`) AS `ProdNamePackage`,`s`.`qty` AS `qty`,`pp`.`ProductPrice` AS `ProductPackagePrice`,`pp`.`ProductPrice` * `s`.`qty` AS `TotalPrice`,`s`.`ShippingDate` AS `ShippingDate`,case when (select `v_shippingpayment_total`.`PaidAmount` from `v_shippingpayment_total` where `v_shippingpayment_total`.`shippingid` = `s`.`ShippingId`) > 0 then (select `v_shippingpayment_total`.`PaidAmount` from `v_shippingpayment_total` where `v_shippingpayment_total`.`shippingid` = `s`.`ShippingId`) else '0' end AS `PaidAmount`,`pg`.`package_abbreviation` AS `package_abbreviation`,`s`.`PaymentStatus` AS `PaymentStatus`,`s`.`owner_id` AS `owner_id` from ((((`productprice` `pp` join `members` `m`) join `products` `p`) join `packages` `pg`) join `shipping` `s`) where `s`.`priceId` = `pp`.`priceId` and `s`.`owner_id` = `m`.`id` and `pp`.`prod_id` = `p`.`prod_id` and `pp`.`package_id` = `pg`.`package_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_shippingpayment_total`
--
DROP TABLE IF EXISTS `v_shippingpayment_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_shippingpayment_total`  AS  select `shippingpayment`.`ShippingId` AS `shippingid`,sum(`shippingpayment`.`PaidAmount`) AS `PaidAmount` from `shippingpayment` group by `shippingpayment`.`ShippingId` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
