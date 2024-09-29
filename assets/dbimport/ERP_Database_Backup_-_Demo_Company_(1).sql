drop DATABASE erp3;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 06:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saleserp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_coa`
--

CREATE TABLE `acc_coa` (
  `id` int(11) NOT NULL,
  `HeadCode` int(11) NOT NULL,
  `HeadName` varchar(100) NOT NULL,
  `PHeadName` varchar(200) NOT NULL,
  `PHeadCode` varchar(50) DEFAULT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `isCashNature` int(11) NOT NULL DEFAULT 0,
  `isBankNature` int(11) NOT NULL DEFAULT 0,
  `HeadType` char(1) NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `supplier_id` varchar(50) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT NULL,
  `service_id` varchar(50) DEFAULT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `isSubType` int(11) NOT NULL DEFAULT 0,
  `subType` int(11) NOT NULL DEFAULT 1,
  `isStock` int(11) NOT NULL DEFAULT 0,
  `isFixedAssetSch` int(11) NOT NULL DEFAULT 0,
  `noteNo` varchar(20) DEFAULT NULL,
  `assetCode` varchar(20) DEFAULT NULL,
  `depCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `acc_coa`
--

INSERT INTO `acc_coa` (`id`, `HeadCode`, `HeadName`, `PHeadName`, `PHeadCode`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `isCashNature`, `isBankNature`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `bank_id`, `service_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `isSubType`, `subType`, `isStock`, `isFixedAssetSch`, `noteNo`, `assetCode`, `depCode`) VALUES
(8, 50202, 'Accounts Payable', 'Current Liabilities', '502', 3, 1, 0, 1, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 12:52:17', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(10, 1, 'Assets', 'COA', '0', 1, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(13, 10201, 'Cash', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 12:07:11', '0', '2015-10-15 15:57:55', 0, 1, 0, 0, NULL, NULL, NULL),
(15, 1020101, 'Cash In Hand', 'Cash', '10201', 4, 1, 1, 1, 1, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-12 08:16:03', '0', '2016-05-23 12:05:43', 0, 1, 0, 0, NULL, NULL, NULL),
(16, 102, 'Current Asset', 'Assets', '1', 2, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '0000-00-00 00:00:00', '0', '2018-07-07 11:23:00', 0, 1, 0, 0, '', '', ''),
(17, 502, 'Current Liabilities', 'Liabilities', '5', 2, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2014-08-30 13:18:20', '0', '2015-10-15 19:49:21', 0, 1, 0, 0, '', '', ''),
(23, 401, 'Cost of Goods Solds', 'Expenses', '4', 2, 1, 1, 1, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-02 10:28:34', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(24, 2, 'Shareholder\'s Equity', 'COA', '0', 1, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(25, 4, 'Expenses', 'COA', '0', 1, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '2', '2019-11-24 05:45:24', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(26, 101, 'Fixed Assets', 'Assets', '1', 2, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '0000-00-00 00:00:00', '0', '2015-10-15 15:29:11', 0, 1, 0, 0, '', '', ''),
(27, 402, 'Over Head Cost', 'Expenses', '4', 2, 1, 1, 1, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-04 10:01:58', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(29, 3, 'Income', 'COA', '0', 1, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(30, 5, 'Liabilities', 'COA', '0', 1, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2013-07-04 12:32:07', '0', '2015-10-15 19:46:54', 0, 1, 0, 0, '', '', ''),
(31, 501, 'Long Term Liabilities', 'Liabilities', '5', 2, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2014-08-30 13:18:20', '0', '2015-10-15 19:49:21', 0, 1, 0, 0, '', '', ''),
(33, 301, 'Direct Income', 'Income', '3', 2, 1, 1, 1, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-02 10:31:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(35, 302, 'Indirect Income', 'Income', '3', 2, 1, 1, 1, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-02 10:55:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '', '', ''),
(36, 5020201, 'Supplier Payable', 'Accounts Payable', '50202', 4, 1, 0, 1, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 12:52:44', '0', '0000-00-00 00:00:00', 1, 4, 0, 0, NULL, NULL, NULL),
(41, 10203, 'Prepaid Expenses', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 06:45:19', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(43, 10204, 'Inventory', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 06:48:32', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(44, 50203, 'Accrued Expenses', 'Current Liabilities', '502', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 06:50:20', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(46, 50101, 'Long-Term Debt', 'Long Term Liabilities', '501', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 06:51:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(47, 50102, 'Other Long-Term  Liabilities', 'Long Term Liabilities', '501', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 06:53:04', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(48, 201, 'Equity', 'Shareholder\'s Equity', '2', 2, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2022-04-10 06:56:38', '0', '2022-04-10 06:56:38', 0, 1, 0, 0, NULL, NULL, NULL),
(49, 20101, 'Equity Capital', 'Equity', '201', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 12:31:33', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(50, 20102, 'Retained Earnings', 'Equity', '201', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 07:01:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(51, 10101, 'Property & Equipment', 'Fixed Assets', '101', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:35:53', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(52, 10102, 'Goodwills', 'Fixed Assets', '101', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-23 06:47:21', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(53, 30101, 'Construction Income', 'Direct Income', '301', 3, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:08:04', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(54, 30102, 'Reimbursement Income', 'Direct Income', '301', 3, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:09:02', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(55, 40101, 'Cost of Goods Sold', 'Cost of Goods Solds', '401', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:13:52', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(56, 40102, 'Job Expenses', 'Cost of Goods Solds', '401', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:14:18', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(57, 40201, 'Automobile', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:14:37', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(58, 40202, 'Bank Service Charges', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:15:32', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(59, 40203, 'Insurance', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:15:58', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(60, 40204, 'Interest Expenses', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:16:36', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(61, 40205, 'Payroll Expenses', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:17:08', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(62, 40206, 'Postage', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:17:26', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(63, 40207, 'Professional Fees', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:17:55', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(64, 40208, 'Repairs', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:18:38', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(65, 40209, 'Tools and Macchnery', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:28:02', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(66, 40210, 'Utilities', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 08:28:42', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(67, 4021001, 'Electic Bill', 'Utilities', '40210', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 09:05:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(68, 4021002, 'House Rent', 'Utilities', '40210', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 09:06:05', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(69, 10205, 'Cash at Bank', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 12:44:19', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(75, 1010201, 'Goodwill', 'Goodwills', '10102', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 15.00, '1', '2022-04-23 06:45:48', '0', '0000-00-00 00:00:00', 0, 1, 0, 1, NULL, 'GD001', NULL),
(77, 5020401, 'property sales', 'Unearned Revenue', '50204', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:40:48', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(78, 5010101, 'Debts', 'Long-Term Debt', '50101', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:41:49', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(79, 5010201, 'Other Long-Term  Liabilities', 'Other Long-Term  Liabilities', '50102', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:42:03', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(80, 2010101, 'Capital Fund', 'Equity Capital', '20101', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:42:36', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(81, 2010201, 'Current year Profit & Loss', 'Retained Earnings', '20102', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:42:53', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(82, 2010202, 'Last year Profit & Loss', 'Retained Earnings', '20102', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:43:03', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(84, 50201, 'Provisions', 'Current Liabilities', '502', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-10 11:46:00', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(85, 5020104, 'Depreciation of Goodwill', 'Depreciations', '50205', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-23 06:47:07', '0', '0000-00-00 00:00:00', 0, 1, 0, 1, NULL, NULL, 'GD001'),
(86, 50204, 'Unearned Revenue', 'Current Liabilities', '502', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 12:53:09', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(88, 10206, 'Advance', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-11 11:56:56', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(89, 1020601, 'Advance against Employee', 'Advance', '10206', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-11 11:57:18', '0', '0000-00-00 00:00:00', 1, 2, 0, 0, NULL, NULL, NULL),
(90, 1020602, 'Advance Against Customer', 'Advance', '10206', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-11 11:57:35', '0', '0000-00-00 00:00:00', 1, 3, 0, 0, NULL, NULL, NULL),
(91, 1020102, 'Petty Cash', 'Cash', '10201', 4, 1, 0, 0, 1, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-12 08:16:19', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(94, 40301, 'Purchase Account', 'Purchase Accounts', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2022-04-16 10:31:43', '0', '2022-04-16 10:31:43', 0, 1, 0, 0, NULL, NULL, NULL),
(95, 4030102, 'Purchase', 'Purchase Account', '40201', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-16 10:33:59', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(96, 30103, 'Sales Accounts', 'Direct Income', '301', 3, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-16 10:34:37', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(97, 3010301, 'Sales Account', 'Sales Accounts', '30103', 4, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-16 10:34:57', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(99, 4020501, 'Salary Expense', 'Payroll Expenses', '40205', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-20 06:24:08', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(104, 5020102, 'Provision for npf contribution', 'Provisions', '50201', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-10 06:19:45', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(106, 5020101, 'Provision for State Income Tax', 'Provisions', '50201', 4, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-26 06:44:29', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(107, 40211, 'State Income Tax', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-26 06:44:46', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(108, 4021101, 'State Income Tax', 'State Income Tax', '40211', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-04-26 06:45:00', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(110, 40212, 'Employeer ICF Expense', 'Over Head Cost', '402', 3, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-10 06:35:37', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(111, 4021201, 'Employeer 1% ICF Expense', 'Employeer ICF Expense', '40212', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 11:34:02', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(112, 50205, 'Depreciations', 'Current Liabilities', '502', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '0', '2022-05-10 09:35:15', '0', '2022-05-10 09:35:15', 0, 1, 0, 0, NULL, NULL, NULL),
(191, 4020502, 'Employee 5 % NPF Expenses', 'Payroll Expenses', '40205', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 11:32:14', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(192, 4020503, 'Employee 10 % NPF Expenses', 'Payroll Expenses', '40205', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-05-17 11:32:36', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(221, 50206, 'Aoounts pay by name supplier', 'Current Liabilities', '502', 3, 1, 0, 0, 0, 0, 'L', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-13 11:51:32', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(229, 10208, 'Accounts Receivable', 'Current Asset', '102', 3, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-16 07:05:42', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(230, 1020801, 'Customer Receivable', 'Accounts Receivable', '10208', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-16 07:07:17', '0', '0000-00-00 00:00:00', 1, 3, 0, 0, NULL, NULL, NULL),
(231, 1020802, 'Employee Receivable', 'Accounts Receivable', '10208', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-16 07:06:58', '0', '0000-00-00 00:00:00', 1, 2, 0, 0, NULL, NULL, NULL),
(232, 1020401, 'Inventory account', 'Inventory', '10204', 4, 1, 0, 0, 0, 0, 'A', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-15 07:53:16', '', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(233, 4010101, 'Cost of Goods Sold Account', 'Cost of Goods Sold', '40101', 4, 1, 0, 0, 0, 0, 'E', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-15 08:58:18', '', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(234, 30104, 'Service Accounts', 'Direct Income', '301', 3, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-15 16:23:37', '', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(235, 3010401, 'Service Account', 'Service Accounts', '30104', 4, 1, 0, 0, 0, 0, 'I', 0, 0, NULL, NULL, NULL, NULL, 0.00, '1', '2022-06-15 16:24:11', '', '0000-00-00 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL),
(236, 1020501, 'Commercial Bank', 'Cash at Bank', '10205', 4, 1, 0, 0, 0, 1, 'A', 0, 0, '0', '0', '0', '0', 0.00, '1', '2024-03-04 20:43:07', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '0', '0', '0'),
(237, 1020502, 'Bank of Ceylon', 'Cash at Bank', '10205', 4, 1, 0, 0, 0, 1, 'A', 0, 0, '0', '0', '0', '0', 0.00, '1', '2024-03-04 20:44:39', '0', '0000-00-00 00:00:00', 0, 1, 0, 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `acc_monthly_balance`
--

CREATE TABLE `acc_monthly_balance` (
  `id` int(11) NOT NULL,
  `fyear` int(11) NOT NULL,
  `COAID` int(11) NOT NULL,
  `balance1` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance2` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance3` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance4` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance5` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance6` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance7` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance8` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance9` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance10` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance11` decimal(18,2) NOT NULL DEFAULT 0.00,
  `balance12` decimal(18,2) NOT NULL DEFAULT 0.00,
  `totalBalance` decimal(18,2) NOT NULL DEFAULT 0.00,
  `updatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_opening_balance`
--

CREATE TABLE `acc_opening_balance` (
  `id` int(11) NOT NULL,
  `fyear` int(11) NOT NULL,
  `COAID` int(11) NOT NULL,
  `subType` int(11) NOT NULL DEFAULT 1,
  `subCode` int(11) DEFAULT NULL,
  `Debit` decimal(10,0) NOT NULL,
  `Credit` decimal(10,0) NOT NULL,
  `openDate` date NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_predefine_account`
--

CREATE TABLE `acc_predefine_account` (
  `id` int(11) NOT NULL,
  `cashCode` int(11) NOT NULL,
  `bankCode` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `fixedAsset` int(11) NOT NULL,
  `purchaseCode` int(11) NOT NULL,
  `salesCode` int(11) NOT NULL,
  `serviceCode` int(11) NOT NULL,
  `customerCode` int(11) NOT NULL,
  `supplierCode` int(11) NOT NULL,
  `costs_of_good_solds` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `inventoryCode` int(11) NOT NULL,
  `CPLCode` int(11) NOT NULL,
  `LPLCode` int(11) NOT NULL,
  `salary_code` int(11) DEFAULT NULL,
  `emp_npf_contribution` int(11) DEFAULT NULL,
  `empr_npf_contribution` int(11) DEFAULT NULL,
  `emp_icf_contribution` int(11) DEFAULT NULL,
  `empr_icf_contribution` int(11) DEFAULT NULL,
  `prov_state_tax` int(11) NOT NULL,
  `state_tax` int(11) NOT NULL,
  `prov_npfcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_predefine_account`
--

INSERT INTO `acc_predefine_account` (`id`, `cashCode`, `bankCode`, `advance`, `fixedAsset`, `purchaseCode`, `salesCode`, `serviceCode`, `customerCode`, `supplierCode`, `costs_of_good_solds`, `vat`, `tax`, `inventoryCode`, `CPLCode`, `LPLCode`, `salary_code`, `emp_npf_contribution`, `empr_npf_contribution`, `emp_icf_contribution`, `empr_icf_contribution`, `prov_state_tax`, `state_tax`, `prov_npfcode`) VALUES
(2, 10201, 10205, 10206, 101, 1020401, 3010301, 3010401, 1020801, 5020201, 4010101, 0, 4021101, 1020401, 2010201, 2010202, 4020501, 4020502, 4020503, 4021201, 0, 5020101, 4021101, 5020102);

-- --------------------------------------------------------

--
-- Table structure for table `acc_subcode`
--

CREATE TABLE `acc_subcode` (
  `id` int(11) NOT NULL,
  `subTypeId` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `referenceNo` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_subcode`
--

INSERT INTO `acc_subcode` (`id`, `subTypeId`, `name`, `referenceNo`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 4, 'Cash Purchase', 1, 1, 0, '2024-03-04', 0, '2024-03-04 19:08:52'),
(2, 3, 'Cash Sale', 1, 1, 0, '2024-03-04', 0, '2024-03-04 19:09:44'),
(3, 3, 'Cash Service', 2, 1, 0, '2024-03-04', 0, '2024-03-04 19:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `acc_subtype`
--

CREATE TABLE `acc_subtype` (
  `id` int(11) NOT NULL,
  `subtypeName` varchar(200) NOT NULL,
  `staus` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_subtype`
--

INSERT INTO `acc_subtype` (`id`, `subtypeName`, `staus`, `created_by`, `created_date`) VALUES
(1, 'None', 1, 1, '2022-04-05 10:19:27'),
(2, 'Employee', 1, 1, '2022-04-06 08:14:48'),
(3, 'Customer', 1, 1, '2022-04-10 08:49:22'),
(4, 'Supplier', 1, 1, '2022-04-10 08:49:22'),
(6, 'Agent', 1, 1, '2022-04-10 08:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `acc_transaction`
--

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `fyear` int(11) NOT NULL,
  `VNo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Vtype` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `referenceNo` varchar(20) DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Narration` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `chequeNo` varchar(30) DEFAULT NULL,
  `chequeDate` date DEFAULT NULL,
  `isHonour` int(11) DEFAULT NULL,
  `ledgerComment` varchar(100) NOT NULL DEFAULT '0',
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `StoreID` int(11) NOT NULL DEFAULT 0,
  `IsPosted` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_opening` int(11) NOT NULL DEFAULT 0,
  `CreateBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `RevCodde` bigint(20) NOT NULL,
  `subType` int(11) NOT NULL DEFAULT 1,
  `subCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_vaucher`
--

CREATE TABLE `acc_vaucher` (
  `id` int(11) NOT NULL,
  `fyear` int(11) NOT NULL,
  `VNo` varchar(50) NOT NULL,
  `Vtype` varchar(50) NOT NULL,
  `referenceNo` varchar(50) DEFAULT NULL,
  `VDate` date NOT NULL,
  `COAID` int(11) NOT NULL,
  `Narration` varchar(255) DEFAULT NULL,
  `chequeno` varchar(30) DEFAULT NULL,
  `chequeDate` date DEFAULT NULL,
  `isHonour` int(11) NOT NULL DEFAULT 0,
  `ledgerComment` varchar(255) DEFAULT NULL,
  `Debit` decimal(18,2) NOT NULL DEFAULT 0.00,
  `Credit` decimal(18,2) NOT NULL DEFAULT 0.00,
  `RevCodde` int(11) NOT NULL,
  `subType` int(11) NOT NULL DEFAULT 1,
  `subCode` int(11) DEFAULT NULL,
  `isApproved` int(11) NOT NULL DEFAULT 0,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  `approvedDate` datetime DEFAULT NULL,
  `isyearClosed` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non yet transfer to transation,  1 = Tranfer to transition'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `activity_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL COMMENT 'for employee , it will save employee_id',
  `type` varchar(30) NOT NULL COMMENT 'ticket, employee, attendnace etc.',
  `action` varchar(15) NOT NULL COMMENT 'create, update, delete',
  `action_id` varchar(15) NOT NULL,
  `table_name` varchar(30) DEFAULT NULL,
  `slug` varchar(150) NOT NULL,
  `form_data` text DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=created, 2=updated, 3=deleted	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`activity_id`, `user_id`, `type`, `action`, `action_id`, `table_name`, `slug`, `form_data`, `create_date`, `status`) VALUES
(0, '1', 'financial_year', 'create', '1', 'financial_year', 'financial_year', '{\"yearName\":\"2024\",\"startDate\":\"2024-01-01\",\"endDate\":\"2024-12-31\",\"status\":\"1\",\"created_by\":\"1\",\"created_date\":\"2024-03-04 08:01:24\"}', '2024-03-05 00:31:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL,
  `localhserver` varchar(250) DEFAULT NULL,
  `onlineserver` varchar(250) DEFAULT NULL,
  `hotspot` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `localhserver`, `onlineserver`, `hotspot`) VALUES
(1, 'https://demo.bdtask.com', 'https://demo.bdtask.com', 'https://demo.bdtask.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sign_in` varchar(30) NOT NULL,
  `sign_out` varchar(30) NOT NULL,
  `staytime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_add`
--

CREATE TABLE `bank_add` (
  `id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(250) DEFAULT NULL,
  `ac_number` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `signature_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank_add`
--

INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES
(1, '1', 'Commercial Bank', 'Demo Company', '123456789', 'Kotahena', '', 1),
(2, 'IM2YUXMNIV', 'Bank of Ceylon', 'Demo Company', '123456789', 'Wellawatta', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `closing_records`
--

CREATE TABLE `closing_records` (
  `id` int(11) NOT NULL,
  `head_code` bigint(20) DEFAULT NULL,
  `opening_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount_in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount_out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `closign_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `company_id` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `cr_no` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`company_id`, `company_name`, `email`, `address`, `mobile`, `website`, `vat_no`, `cr_no`, `status`) VALUES
('1', 'Demo Company', 'demo@mail.com', 'Company Demo Address', '123456', 'https://www.demo.com/', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_tbl`
--

CREATE TABLE `currency_tbl` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `currency_tbl`
--

INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES
(2, 'USD', '$'),
(3, 'LKR', 'LKR');

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE `customer_information` (
  `customer_id` bigint(20) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `address2` text NOT NULL,
  `customer_mobile` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=paid,2=credit',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES
(1, 'Cash Sale', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2024-03-04 19:09:15', '1'),
(2, 'Cash Service', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2024-03-04 19:41:15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `daily_banking_add`
--

CREATE TABLE `daily_banking_add` (
  `banking_id` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_closing`
--

CREATE TABLE `daily_closing` (
  `closing_id` int(11) NOT NULL,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `details`) VALUES
(1, 'sales man', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `id` int(11) NOT NULL,
  `protocol` text NOT NULL,
  `smtp_host` text NOT NULL,
  `smtp_port` text NOT NULL,
  `smtp_user` varchar(35) NOT NULL,
  `smtp_pass` varchar(35) NOT NULL,
  `mailtype` varchar(30) DEFAULT NULL,
  `isinvoice` tinyint(4) NOT NULL,
  `isservice` tinyint(4) NOT NULL,
  `isquotation` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `mailtype`, `isinvoice`, `isservice`, `isquotation`) VALUES
(1, 'ssmtp', 'ssl://ssmtp.gmail.com', '25', 'info@eholol.com', 'demo123456', 'html', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `rate_type` int(11) NOT NULL,
  `hrate` float NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `image` text DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_payment`
--

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(11) NOT NULL,
  `generate_id` int(11) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_salary` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_name` varchar(100) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_month` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_setup`
--

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `is_percentage` int(11) DEFAULT NULL COMMENT 'all amount will add or deduct on percent if true ',
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gross_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_item`
--

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL,
  `expense_item_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` int(11) NOT NULL,
  `yearName` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `isCloseReq` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=active, 0=closed, 2=pending',
  `created_by` int(6) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(6) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`id`, `yearName`, `startDate`, `endDate`, `isCloseReq`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, '2024', '2024-01-01', '2024-12-31', 0, 1, 1, '2024-03-04 08:01:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gmb_salary_advance`
--

CREATE TABLE `gmb_salary_advance` (
  `id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `salary_month` varchar(50) NOT NULL COMMENT 'for the month advance will be deducted',
  `amount` decimal(11,0) NOT NULL,
  `release_amount` decimal(11,0) DEFAULT 0,
  `paid` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'paid_to_employee',
  `CreateDate` date NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `UpdateDate` date DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gmb_salary_generate`
--

CREATE TABLE `gmb_salary_generate` (
  `id` int(11) NOT NULL,
  `sal_month_year` varchar(50) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `tin_no` int(50) DEFAULT NULL COMMENT 'TIN No',
  `total_attendance` varchar(11) DEFAULT NULL COMMENT 'tagret_hours / days',
  `total_count` varchar(11) DEFAULT NULL COMMENT 'weorked_hours / days',
  `atten_allowance` decimal(11,2) DEFAULT NULL COMMENT 'based on taget hours / days',
  `gross` decimal(11,2) NOT NULL COMMENT 'from employee_file table',
  `basic` decimal(11,2) NOT NULL COMMENT 'from employee_file table',
  `transport` decimal(11,2) NOT NULL,
  `house_rent` decimal(11,2) DEFAULT NULL,
  `medical` decimal(11,2) DEFAULT NULL,
  `other_allowance` decimal(11,2) DEFAULT NULL,
  `gross_salary` decimal(11,2) NOT NULL COMMENT 'after adding all allowance with basic',
  `income_tax` decimal(11,2) DEFAULT NULL COMMENT 'from employee_file table it will convert to amount',
  `soc_sec_npf_tax` decimal(11,2) DEFAULT NULL COMMENT 'from employee_file table it will convert to amount',
  `employer_contribution` decimal(11,2) DEFAULT NULL COMMENT '10 % of basic if there soc.sec.tax available ',
  `icf_amount` decimal(11,0) NOT NULL COMMENT 'Id social security tax available',
  `loan_deduct` decimal(11,2) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL COMMENT 'From grand_loan table',
  `salary_advance` decimal(11,2) DEFAULT NULL,
  `salary_adv_id` int(11) DEFAULT NULL COMMENT 'From gmb_salary_advance table',
  `lwp` decimal(11,2) DEFAULT NULL COMMENT 'leave without pay	',
  `pf` decimal(11,2) DEFAULT NULL COMMENT 'providend fund',
  `stamp` decimal(11,2) DEFAULT NULL COMMENT 'deduct type',
  `net_salary` decimal(11,2) DEFAULT NULL COMMENT 'after deduct net amount from gross salary',
  `createDate` date DEFAULT NULL,
  `createBy` varchar(11) NOT NULL,
  `updateDate` date DEFAULT NULL,
  `updateBy` varchar(11) DEFAULT NULL,
  `medical_benefit` decimal(11,2) DEFAULT NULL,
  `family_benefit` decimal(11,2) DEFAULT NULL,
  `transportation_benefit` decimal(11,2) DEFAULT NULL,
  `other_benefit` decimal(11,2) DEFAULT NULL,
  `normal_working_hrs_month` decimal(20,2) DEFAULT NULL,
  `actual_working_hrs_month` decimal(20,2) DEFAULT NULL,
  `hourly_rate_basic` decimal(20,2) DEFAULT NULL,
  `hourly_rate_trasport_allowance` decimal(20,2) DEFAULT NULL,
  `basic_salary_pro_rated` decimal(20,2) DEFAULT NULL,
  `transport_allowance_pro_rated` decimal(20,2) DEFAULT NULL,
  `basic_transport_allowance` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gmb_salary_sheet_generate`
--

CREATE TABLE `gmb_salary_sheet_generate` (
  `ssg_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gdate` varchar(30) DEFAULT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL,
  `generate_by` varchar(30) NOT NULL COMMENT 'user_id',
  `approved` tinyint(1) DEFAULT 0 COMMENT '1 = approved, 0= not approved',
  `approved_by` varchar(20) DEFAULT NULL,
  `approved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prevous_due` decimal(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice` bigint(20) NOT NULL,
  `offline_invoice_no` bigint(20) DEFAULT NULL,
  `invoice_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'invoice discount',
  `total_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'total invoice discount',
  `total_vat_amnt` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'total invoice vat',
  `total_tax` decimal(10,2) DEFAULT 0.00,
  `ret_adjust_amnt` decimal(10,2) DEFAULT NULL,
  `returnable_amount` decimal(10,2) DEFAULT NULL,
  `sales_by` varchar(50) NOT NULL,
  `delivery_note` text DEFAULT NULL,
  `invoice_details` text NOT NULL,
  `is_credit` tinyint(4) DEFAULT NULL,
  `is_fixed` int(11) NOT NULL DEFAULT 0,
  `is_dynamic` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  `is_online` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `ret_invoice_id` bigint(20) DEFAULT NULL,
  `product_id` varchar(30) NOT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `batch_id` varchar(30) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `vat_amnt` decimal(10,2) DEFAULT NULL,
  `vat_amnt_per` varchar(15) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(12,0) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;




-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 'invoice', NULL, NULL, NULL, 1),
(2, 'customer', NULL, NULL, NULL, 1),
(3, 'product', NULL, NULL, NULL, 1),
(4, 'supplier', NULL, NULL, NULL, 1),
(5, 'purchase', NULL, NULL, NULL, 1),
(6, 'stock', NULL, NULL, NULL, 1),
(7, 'return', NULL, NULL, NULL, 1),
(8, 'report', NULL, NULL, NULL, 1),
(9, 'accounts', NULL, NULL, NULL, 1),
(10, 'bank', NULL, NULL, NULL, 1),
(11, 'tax', NULL, NULL, NULL, 1),
(12, 'hrm_management', NULL, NULL, NULL, 1),
(13, 'service', NULL, NULL, NULL, 1),
(15, 'setting', NULL, NULL, NULL, 1),
(16, 'quotation', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_purchase_key`
--

CREATE TABLE `module_purchase_key` (
  `id` int(11) NOT NULL,
  `identity` varchar(100) DEFAULT NULL,
  `purchase_key` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_tax_setup`
--

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(10) UNSIGNED NOT NULL,
  `start_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `end_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `rate` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_loan`
--

CREATE TABLE `personal_loan` (
  `per_loan_id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `person_id` varchar(30) NOT NULL,
  `debit` decimal(12,2) DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `date` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_information`
--

CREATE TABLE `person_information` (
  `id` int(11) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_ledger`
--

CREATE TABLE `person_ledger` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `debit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesonal_loan_information`
--

CREATE TABLE `pesonal_loan_information` (
  `id` int(11) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(30) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `print_setting`
--

CREATE TABLE `print_setting` (
  `id` int(11) NOT NULL,
  `header` int(11) NOT NULL,
  `footer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `print_setting`
--

INSERT INTO `print_setting` (`id`, `header`, `footer`) VALUES
(1, 200, 100);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Mobile', 1),
(2, 'Mobile Accessories', 1),
(3, 'Laptop', 1),
(4, 'Laptop Accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `tax` float DEFAULT NULL COMMENT 'Tax in %',
  `serial_no` varchar(200) DEFAULT NULL,
  `product_vat` float DEFAULT NULL,
  `product_model` varchar(100) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tax0` text DEFAULT NULL,
  `tax1` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `price`, `unit`, `tax`, `serial_no`, `product_vat`, `product_model`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES
(1, '92341254', '1', 'iphone 15', '300000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(2, '49445763', '1', 'iphone 15 Plus', '350000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(3, '775483', '1', 'iphone 15 Pro', '400000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(4, '77787375', '1', 'iphone 15 Pro Max', '450000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(5, '22214752', '2', 'Earphones', '6000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(6, '83018877', '2', 'Screen protectors', '2500', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(7, '48443439', '2', 'Chargers', '7500', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(8, '41026961', '2', 'Phone cases', '2000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(9, '44987197', '3', 'HP EliteBook', '550000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(10, '18017264', '3', 'HP ZBook', '650000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(11, '86171793', '3', 'HP Pavilion', '350000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(12, '14823020', '3', 'HP Spectre', '250000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(13, '93480129', '4', 'Laptop Bag', '3500', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(14, '45493718', '4', 'Laptop Stand', '1500', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(15, '5843757', '4', 'Cooling Pads', '2000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0'),
(16, '63137382', '4', 'Mousepad', '1000', 'Qty', 0, '', 0, '', '', 'my-assets/image/product.png', 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `grand_total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `due_amount` decimal(10,2) DEFAULT 0.00,
  `total_discount` decimal(10,2) DEFAULT NULL,
  `invoice_discount` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'sum of product discount',
  `total_vat_amnt` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'sum of product vat',
  `purchase_date` varchar(50) DEFAULT NULL,
  `purchase_details` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  `is_credit` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase_details`
--

CREATE TABLE `product_purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_detail_id` varchar(100) DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `batch_id` varchar(30) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` float DEFAULT NULL COMMENT 'discount percentage',
  `discount_amnt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vat_amnt_per` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vat_amnt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

CREATE TABLE `product_return` (
  `return_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `invoice_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `purchase_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_purchase` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_return` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `customer_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `deduction` float NOT NULL,
  `total_deduct` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_ret_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `net_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `reason` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usablity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

CREATE TABLE `product_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_vat` float DEFAULT NULL,
  `is_fixed` int(11) NOT NULL DEFAULT 0,
  `is_dynamic` int(11) NOT NULL DEFAULT 0,
  `tax0` text DEFAULT NULL,
  `tax1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`, `service_vat`, `is_fixed`, `is_dynamic`, `tax0`, `tax1`) VALUES
(1, 'Laptop Full Service', '', 500.00, 0, 1, 0, '0', '0'),
(2, 'Mobile Full Service', '', 300.00, 0, 1, 0, '0', '0'),
(3, 'Laptop Repairing', '', 750.00, 0, 1, 0, '0', '0'),
(4, 'Mobile Repairing', '', 650.00, 0, 1, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `quotation_id` varchar(30) NOT NULL,
  `quot_no` varchar(50) NOT NULL,
  `quot_description` text NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `quotdate` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `item_total_amount` decimal(12,2) NOT NULL,
  `item_total_dicount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `item_total_vat` double(10,2) NOT NULL DEFAULT 0.00,
  `item_total_tax` decimal(10,2) DEFAULT 0.00,
  `service_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_vat` double(10,2) NOT NULL DEFAULT 0.00,
  `service_total_tax` decimal(10,2) DEFAULT 0.00,
  `quot_dis_item` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_dis_service` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_fixed` int(11) NOT NULL DEFAULT 0,
  `is_dynamic` int(11) NOT NULL DEFAULT 0,
  `create_by` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `cust_show` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_service_used`
--

CREATE TABLE `quotation_service_used` (
  `id` int(11) NOT NULL,
  `quot_id` varchar(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vat_per` decimal(10,2) DEFAULT 0.00,
  `vat_amnt` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_taxinfo`
--

CREATE TABLE `quotation_taxinfo` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  `tax0` text DEFAULT NULL,
  `tax1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quot_products_used`
--

CREATE TABLE `quot_products_used` (
  `id` int(11) NOT NULL,
  `quot_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  `batch_id` varchar(10) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `used_qty` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `vat_amnt` decimal(10,2) DEFAULT NULL,
  `vat_per` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(2, 2, 1, 0, 0, 0, 0),
(3, 3, 1, 0, 0, 0, 0),
(4, 121, 1, 0, 0, 0, 0),
(5, 122, 1, 0, 0, 0, 0),
(6, 4, 1, 0, 0, 0, 0),
(7, 5, 1, 0, 0, 0, 0),
(8, 10, 1, 0, 0, 0, 0),
(9, 11, 1, 0, 0, 0, 0),
(10, 12, 1, 0, 0, 0, 0),
(11, 13, 1, 0, 0, 0, 0),
(12, 14, 1, 0, 0, 0, 0),
(13, 15, 1, 0, 0, 0, 0),
(14, 16, 1, 0, 0, 0, 0),
(15, 17, 1, 0, 0, 0, 0),
(16, 18, 1, 0, 0, 0, 0),
(17, 21, 1, 0, 0, 0, 0),
(18, 22, 1, 0, 0, 0, 0),
(19, 23, 1, 1, 1, 1, 1),
(20, 24, 1, 0, 0, 0, 0),
(21, 25, 1, 0, 0, 0, 0),
(22, 26, 1, 0, 0, 0, 0),
(23, 27, 1, 0, 0, 0, 0),
(24, 28, 1, 0, 0, 0, 0),
(25, 29, 1, 0, 0, 0, 0),
(26, 30, 1, 0, 0, 0, 0),
(27, 31, 1, 0, 0, 0, 0),
(28, 32, 1, 0, 0, 0, 0),
(29, 33, 1, 0, 0, 0, 0),
(30, 34, 1, 0, 0, 0, 0),
(31, 35, 1, 0, 0, 0, 0),
(32, 36, 1, 0, 0, 0, 0),
(33, 37, 1, 0, 0, 0, 0),
(34, 38, 1, 0, 0, 0, 0),
(35, 39, 1, 0, 0, 0, 0),
(36, 40, 1, 0, 0, 0, 0),
(37, 41, 1, 0, 0, 0, 0),
(38, 42, 1, 0, 0, 0, 0),
(39, 43, 1, 0, 0, 0, 0),
(40, 44, 1, 1, 1, 1, 1),
(41, 45, 1, 1, 1, 1, 1),
(42, 46, 1, 1, 1, 1, 1),
(43, 47, 1, 1, 1, 1, 1),
(44, 48, 1, 1, 1, 1, 1),
(45, 49, 1, 1, 1, 1, 1),
(46, 50, 1, 1, 1, 1, 1),
(47, 51, 1, 1, 1, 1, 1),
(48, 52, 1, 1, 1, 1, 1),
(49, 53, 1, 1, 1, 1, 1),
(50, 54, 1, 1, 1, 1, 1),
(51, 55, 1, 1, 1, 1, 1),
(52, 56, 1, 1, 1, 1, 1),
(53, 57, 1, 1, 1, 1, 1),
(54, 58, 1, 1, 1, 1, 1),
(55, 60, 1, 1, 1, 1, 1),
(56, 123, 1, 1, 1, 1, 1),
(57, 125, 1, 1, 1, 1, 1),
(58, 126, 1, 1, 1, 1, 1),
(59, 127, 1, 1, 1, 1, 1),
(60, 128, 1, 1, 1, 1, 1),
(61, 129, 1, 1, 1, 1, 1),
(62, 130, 1, 1, 1, 1, 1),
(63, 131, 1, 1, 1, 1, 1),
(64, 132, 1, 1, 1, 1, 1),
(65, 133, 1, 1, 1, 1, 1),
(66, 134, 1, 1, 1, 1, 1),
(67, 135, 1, 1, 1, 1, 1),
(68, 136, 1, 1, 1, 1, 1),
(69, 137, 1, 1, 1, 1, 1),
(70, 138, 1, 1, 1, 1, 1),
(71, 139, 1, 1, 1, 1, 1),
(72, 140, 1, 1, 1, 1, 1),
(73, 61, 1, 0, 0, 0, 0),
(74, 62, 1, 0, 0, 0, 0),
(75, 65, 1, 0, 0, 0, 0),
(76, 124, 1, 0, 0, 0, 0),
(77, 70, 1, 0, 0, 0, 0),
(78, 71, 1, 0, 0, 0, 0),
(79, 72, 1, 0, 0, 0, 0),
(80, 73, 1, 0, 0, 0, 0),
(81, 74, 1, 0, 0, 0, 0),
(82, 75, 1, 0, 0, 0, 0),
(83, 76, 1, 0, 0, 0, 0),
(84, 84, 1, 0, 0, 0, 0),
(85, 85, 1, 0, 0, 0, 0),
(86, 86, 1, 0, 0, 0, 0),
(87, 87, 1, 0, 0, 0, 0),
(88, 88, 1, 0, 0, 0, 0),
(89, 89, 1, 0, 0, 0, 0),
(90, 90, 1, 0, 0, 0, 0),
(91, 91, 1, 0, 0, 0, 0),
(92, 92, 1, 0, 0, 0, 0),
(93, 93, 1, 0, 0, 0, 0),
(94, 94, 1, 0, 0, 0, 0),
(95, 95, 1, 0, 0, 0, 0),
(96, 96, 1, 0, 0, 0, 0),
(97, 141, 1, 1, 1, 1, 1),
(98, 142, 1, 1, 1, 1, 1),
(99, 143, 1, 1, 1, 1, 1),
(100, 97, 1, 0, 0, 0, 0),
(101, 98, 1, 0, 0, 0, 0),
(102, 99, 1, 0, 0, 0, 0),
(103, 100, 1, 0, 0, 0, 0),
(104, 102, 1, 0, 0, 0, 0),
(105, 103, 1, 0, 0, 0, 0),
(106, 104, 1, 0, 0, 0, 0),
(107, 105, 1, 0, 0, 0, 0),
(108, 106, 1, 0, 0, 0, 0),
(109, 107, 1, 0, 0, 0, 0),
(110, 108, 1, 0, 0, 0, 0),
(111, 109, 1, 0, 0, 0, 0),
(112, 110, 1, 0, 0, 0, 0),
(113, 111, 1, 0, 0, 0, 0),
(114, 112, 1, 0, 0, 0, 0),
(115, 113, 1, 0, 0, 0, 0),
(116, 114, 1, 0, 0, 0, 0),
(117, 115, 1, 0, 0, 0, 0),
(118, 116, 1, 0, 0, 0, 0),
(119, 117, 1, 0, 0, 0, 0),
(120, 118, 1, 0, 0, 0, 0),
(121, 119, 1, 0, 0, 0, 0),
(122, 120, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_setup_header`
--

CREATE TABLE `salary_setup_header` (
  `s_s_h_id` int(11) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_payable` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `absent_deduct` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tax_manager` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_generate`
--

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gdate` varchar(30) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_type`
--

CREATE TABLE `salary_type` (
  `salary_type_id` int(11) NOT NULL,
  `sal_name` varchar(100) NOT NULL,
  `salary_type` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `emp_sal_type` varchar(50) DEFAULT NULL,
  `default_amount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_role`
--

CREATE TABLE `sec_role` (
  `id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_userrole`
--

CREATE TABLE `sec_userrole` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_userrole`
--

INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES
(1, '615419', 1, '1', '2022-06-16 03:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `seles_termscondi`
--

CREATE TABLE `seles_termscondi` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seles_termscondi`
--

INSERT INTO `seles_termscondi` (`id`, `description`, `status`) VALUES
(5, 'Goods purchased without the original invoice are not to be returned or exchanged', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `id` int(11) NOT NULL,
  `voucher_no` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `customer_id` varchar(30) NOT NULL,
  `total_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `invoice_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_vat_amnt` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'total invoice vat',
  `total_tax` decimal(10,2) DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `previous` decimal(10,2) NOT NULL DEFAULT 0.00,
  `details` varchar(250) NOT NULL,
  `sales_by` varchar(20) DEFAULT NULL,
  `is_fixed` int(11) NOT NULL DEFAULT 0,
  `is_dynamic` int(11) NOT NULL DEFAULT 0,
  `is_credit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_details`
--

CREATE TABLE `service_invoice_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_inv_id` varchar(30) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) DEFAULT 0.00,
  `discount_amount` decimal(10,2) DEFAULT 0.00,
  `vat` decimal(10,2) DEFAULT 0.00,
  `vat_amnt` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(11) NOT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `api_secret` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `isinvoice` int(11) NOT NULL DEFAULT 0,
  `isservice` int(11) NOT NULL DEFAULT 0,
  `isreceive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `api_key`, `api_secret`, `from`, `isinvoice`, `isservice`, `isreceive`) VALUES
(1, '5d6db102011', '456452dfgdf', '8801645452', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `directory` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 1, 'new_invoice', NULL, NULL, 'new_invoice', 1),
(2, 1, 'manage_invoice', NULL, NULL, 'manage_invoice', 1),
(3, 1, 'pos_invoice', NULL, NULL, 'gui_pos', 1),
(4, 2, 'add_customer', NULL, NULL, 'add_customer', 1),
(5, 2, 'manage_customer', NULL, NULL, 'manage_customer', 1),
(6, 0, 'credit_customer', NULL, NULL, 'credit_customer', 1),
(7, 0, 'paid_customer', NULL, NULL, 'paid_customer', 1),
(8, 0, 'customer_ledger', NULL, NULL, 'customer_ledger', 1),
(9, 0, 'customer_advance', NULL, NULL, 'customer_advance', 1),
(10, 3, 'category', NULL, NULL, 'category', 1),
(11, 3, 'manage_category', NULL, NULL, 'manage_category', 1),
(12, 3, 'unit', NULL, NULL, 'unit', 1),
(13, 3, 'manage_unit', NULL, NULL, 'manage_unit', 1),
(14, 3, 'add_product', NULL, NULL, 'create_product', 1),
(15, 3, 'import_product_csv', NULL, NULL, 'add_product_csv', 1),
(16, 3, 'manage_product', NULL, NULL, 'manage_product', 1),
(17, 4, 'add_supplier', NULL, NULL, 'add_supplier', 1),
(18, 4, 'manage_supplier', NULL, NULL, 'manage_supplier', 1),
(19, 0, 'supplier_ledger', NULL, NULL, 'supplier_ledger_report', 1),
(20, 0, 'supplier_advance', NULL, NULL, 'supplier_advance', 1),
(21, 5, 'add_purchase', NULL, NULL, 'add_purchase', 1),
(22, 5, 'manage_purchase', NULL, NULL, 'manage_purchase', 1),
(23, 6, 'stock_report', NULL, NULL, 'stock_report', 1),
(24, 7, 'return', NULL, NULL, 'add_return', 1),
(25, 7, 'stock_return_list', NULL, NULL, 'return_list', 1),
(26, 7, 'supplier_return_list', NULL, NULL, 'supplier_return_list', 1),
(27, 7, 'wastage_return_list', NULL, NULL, 'wastage_return_list', 1),
(28, 8, 'closing', NULL, NULL, 'add_closing', 1),
(29, 8, 'closing_report', NULL, NULL, 'closing_report', 1),
(30, 8, 'todays_report', NULL, NULL, 'all_report', 1),
(31, 8, 'todays_customer_receipt', NULL, NULL, 'todays_customer_receipt', 1),
(32, 8, 'sales_report', NULL, NULL, 'todays_sales_report', 1),
(33, 8, 'due_report', NULL, NULL, 'due_report', 1),
(34, 8, 'purchase_report', NULL, NULL, 'todays_purchase_report', 1),
(35, 8, 'purchase_report_category_wise', NULL, NULL, 'purchase_report_category_wise', 1),
(36, 8, 'sales_report_product_wise', NULL, NULL, 'product_sales_reports_date_wise', 1),
(37, 8, 'sales_report_category_wise', NULL, NULL, 'sales_report_category_wise', 1),
(38, 8, 'shipping_cost_report', NULL, NULL, 'shipping_cost_report', 1),
(39, 8, 'user_wise_sales_report', NULL, NULL, 'user_wise_sales_report', 1),
(40, 8, 'invoice_return', NULL, NULL, 'invoice_return', 1),
(41, 8, 'supplier_return', NULL, NULL, 'supplier_return', 1),
(42, 8, 'tax_report', NULL, NULL, 'tax_report', 1),
(43, 8, 'profit_report', NULL, NULL, 'profit_report', 1),
(44, 9, 'c_o_a', NULL, NULL, 'show_tree', 1),
(45, 9, 'subaccount_list', NULL, NULL, 'subaccount_list', 1),
(46, 9, 'predefined_accounts', NULL, NULL, 'predefined_accounts', 1),
(47, 9, 'financial_year', NULL, NULL, 'financial_year', 1),
(48, 9, 'opening_balance', NULL, NULL, 'opening_balance', 1),
(49, 9, 'credit_voucher', NULL, NULL, 'credit_voucher', 1),
(50, 9, 'voucher_approval', NULL, NULL, 'aprove_v', 1),
(51, 9, 'contra_voucher', NULL, NULL, 'contra_voucher', 1),
(52, 9, 'journal_voucher', NULL, NULL, 'journal_voucher', 1),
(53, 9, 'report', NULL, NULL, 'ac_report', 1),
(54, 9, 'cash_book', NULL, NULL, 'cash_book', 1),
(55, 9, 'Inventory_ledger', NULL, NULL, 'inventory_ledger', 1),
(56, 9, 'bank_book', NULL, NULL, 'bank_book', 1),
(57, 9, 'general_ledger', NULL, NULL, 'general_ledger', 1),
(58, 9, 'trial_balance', NULL, NULL, 'trial_balance', 1),
(60, 9, 'coa_print', NULL, NULL, 'coa_print', 1),
(61, 10, 'add_new_bank', NULL, NULL, 'add_bank', 1),
(62, 10, 'manage_bank', NULL, NULL, 'bank_list', 1),
(63, 0, 'bank_transaction', NULL, NULL, 'bank_transaction', 1),
(64, 0, 'bank_ledger', NULL, NULL, 'bank_ledger', 1),
(65, 11, 'tax_settings', NULL, NULL, 'tax_settings', 1),
(66, 0, 'add_incometax', NULL, NULL, 'add_incometax', 1),
(67, 0, 'manage_income_tax', NULL, NULL, 'manage_income_tax', 1),
(68, 0, 'tax_report', NULL, NULL, 'tax_report', 1),
(69, 0, 'invoice_wise_tax_report', NULL, NULL, 'invoice_wise_tax_report', 1),
(70, 12, 'add_designation', NULL, NULL, 'add_designation', 1),
(71, 12, 'manage_designation', NULL, NULL, 'manage_designation', 1),
(72, 12, 'add_employee', NULL, NULL, 'add_employee', 1),
(73, 12, 'manage_employee', NULL, NULL, 'manage_employee', 1),
(74, 12, 'add_attendance', NULL, NULL, 'add_attendance', 1),
(75, 12, 'manage_attendance', NULL, NULL, 'manage_attendance', 1),
(76, 12, 'attendance_report', NULL, NULL, 'attendance_report', 1),
(77, 0, 'add_benefits', NULL, NULL, 'add_benefits', 1),
(78, 0, 'manage_benefits', NULL, NULL, 'manage_benefits', 1),
(79, 0, 'add_salary_setup', NULL, NULL, 'add_salary_setup', 1),
(80, 0, 'manage_salary_setup', NULL, NULL, 'manage_salary_setup', 1),
(81, 0, 'salary_generate', NULL, NULL, 'salary_generate', 1),
(82, 0, 'manage_salary_generate', NULL, NULL, 'manage_salary_generate', 1),
(83, 0, 'salary_payment', NULL, NULL, 'salary_payment', 1),
(84, 0, 'add_expense_item', NULL, NULL, 'add_expense_item', 1),
(85, 0, 'manage_expense_item', NULL, NULL, 'manage_expense_item', 1),
(86, 0, 'add_expense', NULL, NULL, 'add_expense', 1),
(87, 0, 'manage_expense', NULL, NULL, 'manage_expense', 1),
(88, 0, 'expense_statement', NULL, NULL, 'expense_statement', 1),
(89, 0, 'add_person_officeloan', NULL, NULL, 'add1_person', 1),
(90, 0, 'add_loan_officeloan', NULL, NULL, 'add_office_loan', 1),
(91, 0, 'add_payment_officeloan', NULL, NULL, 'add_loan_payment', 1),
(92, 0, 'manage_loan_officeloan', NULL, NULL, 'manage1_person', 1),
(93, 0, 'add_person_personalloan', NULL, NULL, 'add_person', 1),
(94, 0, 'add_loan_personalloan', NULL, NULL, 'add_loan', 1),
(95, 0, 'add_payment_personalloan', NULL, NULL, 'add_payment', 1),
(96, 0, 'manage_loan_personalloan', NULL, NULL, 'manage_person', 1),
(97, 13, 'add_service', NULL, NULL, 'create_service', 1),
(98, 13, 'manage_service', NULL, NULL, 'manage_service', 1),
(99, 13, 'service_invoice', NULL, NULL, 'service_invoice', 1),
(100, 13, 'manage_service_invoice', NULL, NULL, 'manage_service_invoice', 1),
(102, 15, 'manage_company', NULL, NULL, 'manage_company', 1),
(103, 15, 'add_user', NULL, NULL, 'add_user', 1),
(104, 15, 'manage_users', NULL, NULL, 'manage_user', 1),
(105, 15, 'language', NULL, NULL, 'add_language', 1),
(106, 15, 'currency', NULL, NULL, 'add_currency', 1),
(107, 15, 'setting', NULL, NULL, 'soft_setting', 1),
(108, 15, 'print_setting', NULL, NULL, 'print_setting', 1),
(109, 15, 'mail_setting', NULL, NULL, 'mail_setting', 1),
(110, 15, 'add_role', NULL, NULL, 'add_role', 1),
(111, 15, 'role_list', NULL, NULL, 'role_list', 1),
(112, 15, 'user_assign_role', NULL, NULL, 'user_assign', 1),
(113, 15, 'Permission', NULL, NULL, NULL, 1),
(114, 0, 'sms_configure', NULL, NULL, 'sms_configure', 1),
(115, 15, 'backup_restore', NULL, NULL, 'back_up', 1),
(116, 15, 'import', NULL, NULL, 'sql_import', 1),
(117, 15, 'restore', NULL, NULL, 'restore', 1),
(118, 16, 'add_quotation', NULL, NULL, 'add_quotation', 1),
(119, 16, 'manage_quotation', NULL, NULL, 'manage_quotation', 1),
(120, 16, 'add_to_invoice', NULL, NULL, 'add_to_invoice', 1),
(121, 1, 'terms_list', NULL, NULL, 'terms_list', 1),
(122, 1, 'terms_add', NULL, NULL, 'terms_add', 1),
(123, 9, 'service_payment', NULL, NULL, 'service_payment', 1),
(124, 11, 'vat_tax_setting', NULL, NULL, 'vat_tax_setting', 1),
(125, 9, 'add_payment_method', NULL, NULL, 'add_payment_method', 1),
(126, 9, 'payment_method_list', NULL, NULL, 'payment_method_list', 1),
(127, 9, 'debit_voucher', NULL, NULL, 'debit_voucher', 1),
(128, 9, 'bank_reconciliation', NULL, NULL, 'bank_reconciliation', 1),
(129, 9, 'supplier_payment', NULL, NULL, 'supplier_payment', 1),
(130, 9, 'customer_receive', NULL, NULL, 'customer_receive', 1),
(131, 9, 'cash_adjustment', NULL, NULL, 'cash_adjustment', 1),
(132, 9, 'day_book', NULL, NULL, 'day_book', 1),
(133, 9, 'sub_ledger', NULL, NULL, 'sub_ledger', 1),
(134, 9, 'income_statement_form', NULL, NULL, 'income_statement_form', 1),
(135, 9, 'expenditure_statement', NULL, NULL, 'expenditure_statement', 1),
(136, 9, 'profit_loss_report', NULL, NULL, 'profit_loss_report', 1),
(137, 9, 'balance_sheet', NULL, NULL, 'balance_sheet', 1),
(138, 9, 'fixedasset_schedule', NULL, NULL, 'fixedasset_schedule', 1),
(139, 9, 'receipt_payment', NULL, NULL, 'receipt_payment', 1),
(140, 9, 'bank_reconciliation_report', NULL, NULL, 'bank_reconciliation_report', 1),
(141, 12, 'salary_advance_view', NULL, NULL, 'salary_advance_view', 1),
(142, 12, 'employee_salary_generate', NULL, NULL, 'employee_salary_generate', 1),
(143, 12, 'employee_salary_payment_view', NULL, NULL, 'employee_salary_payment_view', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_information`
--

CREATE TABLE `supplier_information` (
  `supplier_id` bigint(20) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` text NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailnumber` varchar(200) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier_information`
--

INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES
(1, 'Cash Purchase', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `supplier_pr_id` int(11) NOT NULL,
  `product_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_model` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `supplier_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `products_model`, `supplier_id`, `supplier_price`) VALUES
(2, '92341254', '', 1, ''),
(4, '49445763', '', 1, ''),
(5, '775483', '', 1, ''),
(6, '77787375', '', 1, ''),
(7, '22214752', '', 1, ''),
(8, '83018877', '', 1, ''),
(9, '48443439', '', 1, ''),
(10, '41026961', '', 1, ''),
(11, '44987197', '', 1, ''),
(12, '18017264', '', 1, ''),
(13, '86171793', '', 1, ''),
(14, '14823020', '', 1, ''),
(15, '93480129', '', 1, ''),
(16, '45493718', '', 1, ''),
(17, '5843757', '', 1, ''),
(18, '63137382', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `synchronizer_setting`
--

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_collection`
--

CREATE TABLE `tax_collection` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  `tax0` text DEFAULT NULL,
  `tax1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_settings`
--

CREATE TABLE `tax_settings` (
  `id` int(11) NOT NULL,
  `default_value` float NOT NULL,
  `tax_name` varchar(250) NOT NULL,
  `nt` int(11) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES
(3, 'PCS', 1),
(4, 'Qty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES
(1, '1', 'Admin', 'Super', NULL, NULL, NULL, NULL, NULL, './assets/img/user/2024-03-04/9bd8416dbcef83401dca8e48d46ffebd.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `security_code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES
(1, '1', 'admin@gmail.com', '42157191a9bef4f97c5cf1a0faf487de', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vat_tax_setting`
--

CREATE TABLE `vat_tax_setting` (
  `id` int(11) NOT NULL,
  `dynamic_tax` int(11) NOT NULL DEFAULT 0,
  `fixed_tax` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vat_tax_setting`
--

INSERT INTO `vat_tax_setting` (`id`, `dynamic_tax`, `fixed_tax`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `currency_position` varchar(10) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `rtr` varchar(255) DEFAULT NULL,
  `captcha` int(11) DEFAULT 1 COMMENT '0=active,1=inactive',
  `is_qr` int(11) NOT NULL,
  `is_autoapprove_v` int(11) NOT NULL DEFAULT 0,
  `site_key` varchar(250) DEFAULT NULL,
  `secret_key` varchar(250) DEFAULT NULL,
  `discount_type` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`setting_id`, `logo`, `invoice_logo`, `favicon`, `currency`, `timezone`, `currency_position`, `footer_text`, `language`, `rtr`, `captcha`, `is_qr`, `is_autoapprove_v`, `site_key`, `secret_key`, `discount_type`) VALUES
(1, 'assets/img/icons/2024-03-04/fcf4b96327121f3777fff53038db906e.png', 'assets/img/icons/2024-03-04/4d057a4cccbc59da8ed3a90f5064aa85.png', 'assets/img/icons/2024-03-04/09e352017e6eff51690ba7ad1ade0b35.png', 'LKR', 'Asia/Kolkata', '0', 'Powered by iFleex Solutions (Pvt) Ltd', 'english', '0', 1, 0, 1, '6LdiKhsUAAAAAMV4jQRmNYdZy2kXEuFe1HrdP5tt', '6LdiKhsUAAAAAMV4jQRmNYdZy2kXEuFe1HrdP5tt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_coa`
--
ALTER TABLE `acc_coa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `HeadCode` (`HeadCode`),
  ADD KEY `HeadName` (`HeadName`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `PHeadName` (`PHeadName`),
  ADD KEY `HeadLevel` (`HeadLevel`),
  ADD KEY `IsTransaction` (`IsTransaction`),
  ADD KEY `IsGL` (`IsGL`),
  ADD KEY `IsBudget` (`IsBudget`),
  ADD KEY `IsDepreciation` (`IsDepreciation`),
  ADD KEY `isCashNature` (`isCashNature`),
  ADD KEY `isBankNature` (`isBankNature`);

--
-- Indexes for table `acc_monthly_balance`
--
ALTER TABLE `acc_monthly_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_opening_balance`
--
ALTER TABLE `acc_opening_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COAID` (`COAID`),
  ADD KEY `year` (`fyear`);

--
-- Indexes for table `acc_predefine_account`
--
ALTER TABLE `acc_predefine_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COAID` (`cashCode`),
  ADD KEY `cashCode` (`cashCode`);

--
-- Indexes for table `acc_subcode`
--
ALTER TABLE `acc_subcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subTypeId` (`subTypeId`);

--
-- Indexes for table `acc_subtype`
--
ALTER TABLE `acc_subtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `COAID` (`COAID`),
  ADD KEY `VNo` (`VNo`),
  ADD KEY `RevCodde` (`RevCodde`),
  ADD KEY `subType` (`subType`),
  ADD KEY `subCode` (`subCode`),
  ADD KEY `referenceNo` (`referenceNo`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `acc_vaucher`
--
ALTER TABLE `acc_vaucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `VNo` (`VNo`),
  ADD KEY `fyear` (`fyear`),
  ADD KEY `VDate` (`VDate`),
  ADD KEY `COAID` (`COAID`),
  ADD KEY `RevCodde` (`RevCodde`),
  ADD KEY `subType` (`subType`),
  ADD KEY `subCode` (`subCode`),
  ADD KEY `referenceNo` (`referenceNo`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `bank_add`
--
ALTER TABLE `bank_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing_records`
--
ALTER TABLE `closing_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `daily_closing`
--
ALTER TABLE `daily_closing`
  ADD PRIMARY KEY (`closing_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  ADD PRIMARY KEY (`emp_sal_pay_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `generate_id` (`generate_id`);

--
-- Indexes for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  ADD PRIMARY KEY (`e_s_s_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmb_salary_advance`
--
ALTER TABLE `gmb_salary_advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmb_salary_generate`
--
ALTER TABLE `gmb_salary_generate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmb_salary_sheet_generate`
--
ALTER TABLE `gmb_salary_sheet_generate`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_purchase_key`
--
ALTER TABLE `module_purchase_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  ADD PRIMARY KEY (`tax_setup_id`);

--
-- Indexes for table `personal_loan`
--
ALTER TABLE `personal_loan`
  ADD PRIMARY KEY (`per_loan_id`);

--
-- Indexes for table `person_information`
--
ALTER TABLE `person_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_ledger`
--
ALTER TABLE `person_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `pesonal_loan_information`
--
ALTER TABLE `pesonal_loan_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `print_setting`
--
ALTER TABLE `print_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_return`
--
ALTER TABLE `product_return`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_service`
--
ALTER TABLE `product_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quot_no` (`quot_no`),
  ADD KEY `quotation_id` (`quotation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `quotation_service_used`
--
ALTER TABLE `quotation_service_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quot_id` (`quot_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `quotation_taxinfo`
--
ALTER TABLE `quotation_taxinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `quot_products_used`
--
ALTER TABLE `quot_products_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `quot_id` (`quot_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`role_id`);

--
-- Indexes for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `salary_type`
--
ALTER TABLE `salary_type`
  ADD PRIMARY KEY (`salary_type_id`);

--
-- Indexes for table `sec_role`
--
ALTER TABLE `sec_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_userrole`
--
ALTER TABLE `sec_userrole`
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `seles_termscondi`
--
ALTER TABLE `seles_termscondi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `service_invoice_details`
--
ALTER TABLE `service_invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_information`
--
ALTER TABLE `supplier_information`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`supplier_pr_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `tax_collection`
--
ALTER TABLE `tax_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat_tax_setting`
--
ALTER TABLE `vat_tax_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_coa`
--
ALTER TABLE `acc_coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `acc_monthly_balance`
--
ALTER TABLE `acc_monthly_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_opening_balance`
--
ALTER TABLE `acc_opening_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_predefine_account`
--
ALTER TABLE `acc_predefine_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acc_subcode`
--
ALTER TABLE `acc_subcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_vaucher`
--
ALTER TABLE `acc_vaucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_add`
--
ALTER TABLE `bank_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `closing_records`
--
ALTER TABLE `closing_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_information`
--
ALTER TABLE `customer_information`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_closing`
--
ALTER TABLE `daily_closing`
  MODIFY `closing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  MODIFY `emp_sal_pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  MODIFY `e_s_s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_item`
--
ALTER TABLE `expense_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gmb_salary_advance`
--
ALTER TABLE `gmb_salary_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gmb_salary_generate`
--
ALTER TABLE `gmb_salary_generate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gmb_salary_sheet_generate`
--
ALTER TABLE `gmb_salary_sheet_generate`
  MODIFY `ssg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1088;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `module_purchase_key`
--
ALTER TABLE `module_purchase_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  MODIFY `tax_setup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_loan`
--
ALTER TABLE `personal_loan`
  MODIFY `per_loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_information`
--
ALTER TABLE `person_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_ledger`
--
ALTER TABLE `person_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesonal_loan_information`
--
ALTER TABLE `pesonal_loan_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `print_setting`
--
ALTER TABLE `print_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_information`
--
ALTER TABLE `product_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_service`
--
ALTER TABLE `product_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_service_used`
--
ALTER TABLE `quotation_service_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_taxinfo`
--
ALTER TABLE `quotation_taxinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quot_products_used`
--
ALTER TABLE `quot_products_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  MODIFY `ssg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_type`
--
ALTER TABLE `salary_type`
  MODIFY `salary_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_role`
--
ALTER TABLE `sec_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_userrole`
--
ALTER TABLE `sec_userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seles_termscondi`
--
ALTER TABLE `seles_termscondi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_invoice_details`
--
ALTER TABLE `service_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `supplier_information`
--
ALTER TABLE `supplier_information`
  MODIFY `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `supplier_pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tax_collection`
--
ALTER TABLE `tax_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_settings`
--
ALTER TABLE `tax_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vat_tax_setting`
--
ALTER TABLE `vat_tax_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
