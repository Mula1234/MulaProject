-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 05:50 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mulacoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `mu_address`
--

CREATE TABLE `mu_address` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `type` char(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_data` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mu_address`
--

INSERT INTO `mu_address` (`ID`, `user_ID`, `type`, `address`, `address_data`, `created_at`, `created_ip`) VALUES
(1, 1, 'eth', '0xCb198FE6c2B40848568835EAD87f293F2319E36A', '{"privateKey":"0xcf03dd2e220f44a58e9d997b1f3d714fcbb5bcdb495daa9b2569bfaffd83703b","defaultGasLimit":1500000,"address":"0xCb198FE6c2B40848568835EAD87f293F2319E36A","mnemonic":"pitch pear spoil medal govern spare kid helmet cat picture tag can","path":"m\\/44\'\\/60\'\\/0\'\\/0\\/0"}', '2018-03-30 11:28:39', '192.168.1.106'),
(2, 2, 'eth', '0x992FfeFEb416498dC5339202328C84e7F7EcdBd0', '{"privateKey":"0xeead16972ac987b58269ac74bfd1fdb908c9ac62c8e201ef894d439dfa446c81","defaultGasLimit":1500000,"address":"0x992FfeFEb416498dC5339202328C84e7F7EcdBd0","mnemonic":"grunt silent pledge seven fossil useless desert morning clerk angle junk inmate","path":"m\\/44\'\\/60\'\\/0\'\\/0\\/0"}', '2018-05-04 17:44:24', '192.168.1.98');

-- --------------------------------------------------------

--
-- Table structure for table `mu_assets`
--

CREATE TABLE `mu_assets` (
  `asset_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `assets_type` char(100) NOT NULL,
  `assets_description` text NOT NULL,
  `auth_comment` text NOT NULL,
  `approved_amount` varchar(20) NOT NULL,
  `market_value` varchar(20) NOT NULL,
  `user_sign` longtext CHARACTER SET utf8mb4 NOT NULL,
  `assets_docs` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 = Requested, 1 = Tokenized, 2 = Rejected',
  `created_at` datetime NOT NULL,
  `tokenized_at` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mu_auth`
--

CREATE TABLE `mu_auth` (
  `auth_ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` char(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mu_auth`
--

INSERT INTO `mu_auth` (`auth_ID`, `username`, `password`, `full_name`, `email`, `phone`, `profile_picture`, `created_at`, `updated_at`, `created_ip`) VALUES
(1, 'authmula', '$2y$10$bOx7dIZFG9sFpmqsQewu3.FlzfKZTVi.ll/vpOVyDBm52sE52lCaK', 'MulaToken V1', 'auth@mulacoin.com', '9876543210', '', '2018-03-09 11:22:00', '2018-03-27 15:29:51', '192.168.1.106');

-- --------------------------------------------------------

--
-- Table structure for table `mu_demo`
--

CREATE TABLE `mu_demo` (
  `id` int(11) NOT NULL,
  `asset_types` varchar(255) NOT NULL,
  `token_name` char(50) NOT NULL,
  `token_symbol` char(20) NOT NULL,
  `token_rate` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `token_benef` varchar(255) NOT NULL,
  `asset_descrip` text NOT NULL,
  `asset_document` varchar(255) NOT NULL,
  `asset_value` varchar(20) NOT NULL,
  `created_ip` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mu_demo`
--

INSERT INTO `mu_demo` (`id`, `asset_types`, `token_name`, `token_symbol`, `token_rate`, `start_date`, `end_date`, `token_benef`, `asset_descrip`, `asset_document`, `asset_value`, `created_ip`, `created_at`) VALUES
(1, 'Equity,Rare Collectible,Property,Product/Service', 'Hemant', 'HMT', '150', '2018-05-04', '2018-05-04', '0x8b6ec46c5e2c8167a70ba569f2a4497fcaa874a3', 'I want to tokenize my choosed asset', 'DEMOS193782348956.png', '15000', '192.168.1.98', '2018-05-04 15:31:05'),
(2, 'Equity,Rare Collectible,Property,Product/Service', 'Hemant', 'HMT', '150', '2018-05-05', '2018-05-26', '0x3eb7bdcf8c865a1564f57ad0d25764dfd9d018ea', 'I want to tokenize my choosed asset', 'DEMOS305662848973.png', '15000', '192.168.1.98', '2018-05-05 13:42:41'),
(3, 'Equity,Product/Service', 'Hemant', 'HMT', '150', '2018-05-10', '2018-05-31', '0x8b6ec46c5e2c8167a70ba569f2a4497fcaa874a3', 'I want to tokenize my choosed asset', 'DEMOS446317028096.png', '15000', '192.168.1.98', '2018-05-10 17:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `mu_options`
--

CREATE TABLE `mu_options` (
  `ID` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mu_options`
--

INSERT INTO `mu_options` (`ID`, `option_name`, `option_value`, `updated_at`) VALUES
(1, 'eth_address', '0x6cb9C3583b7423C75537f280B934aDBEE716cfDb', '2018-03-26 00:00:00'),
(2, 'eth_private', '0x2efc40fd32ec034cc89bbb95802ed0454fbdce25825ab2f5d64fbd359444db88', '2018-03-12 00:00:00'),
(3, 'referral_amount', '90', '2018-03-12 00:00:00'),
(4, 'contract_terms', '<h4>1. Agreement of parties</h4>\n<p>Customer hires Designer to redesign the current website,&nbsp;<strong>bobswebsite.com</strong>, for the estimated total price of&nbsp;<strong>$PRICE</strong>. Designer agrees to provide quality service and to answer to the Customers requests in a timely manner.</p>\n<p>The agreed payment plan is at the end of the document.</p>\n<h4>2. Legal matters and copyrights</h4>\n<p>The Customer will guarantee to the Designer that any elements of text, graphics, photos, trademarks or other artwork that the Customer provides for inclusion in the website are either owned by him or that he has the permission to use them. When the Designer receives the final payment, copyright is automatically assigned as follows: Customer will own the graphics, virtual elements, text content photographs and other data provided, unless someone else owns them. The Designer owns the XHTML markup, CSS and other code and he licenses it to the Customer for use on only this project. Designer can reserve the right to display, with Customer\'s consent, the work as part of the portfolio.</p>\n<h4>3. Force majeure</h4>\n<p>Designer shall not be deemed in breach of this contract if Designer is unable to complete the services or any portion by reason of fire, earthquake, labor dispute, illness, internet breaches or any technical issues that may appear beyond Designer\'s control. Upon occurrence of any Force Majeure Event, Designer shall give notice to the Customer of his inability to perform or of delay in completing the services and shall propose revisions to the schedule for completion of the services.</p>\n<p>Any extra time required outside the project timeline/services mentioned at point 1 of this contract, will be billed at a rate of&nbsp;<strong>$FEE</strong>&nbsp;per hour.</p>', '2018-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mu_referrals`
--

CREATE TABLE `mu_referrals` (
  `ID` int(11) NOT NULL,
  `referral_by` int(11) NOT NULL,
  `referral_to` int(11) NOT NULL,
  `token` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mu_sessions`
--

CREATE TABLE `mu_sessions` (
  `sess_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mu_sessions`
--

INSERT INTO `mu_sessions` (`sess_ID`, `user_ID`, `token`, `created_at`, `updated_at`, `created_ip`) VALUES
(1, 1, '497e7959f3ede07486a5548c70eea229', '2018-05-07 12:09:47', '2018-05-07 12:09:47', '192.168.1.98'),
(2, 1, 'a152dcfa59c4a2dca319c90490b32ea0', '2018-05-09 15:48:05', '2018-05-09 15:48:05', '192.168.1.98'),
(3, 1, '58c96a7fdf4f9dad389f40cd598b997b', '2018-05-11 18:51:27', '2018-05-11 18:51:27', '192.168.1.98');

-- --------------------------------------------------------

--
-- Table structure for table `mu_test_balances`
--

CREATE TABLE `mu_test_balances` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL DEFAULT '0',
  `ether` varchar(20) DEFAULT '0',
  `xlm` int(11) NOT NULL DEFAULT '0',
  `prop` varchar(20) NOT NULL DEFAULT '0',
  `dragon` varchar(20) NOT NULL DEFAULT '0',
  `crypto` varchar(20) NOT NULL DEFAULT '0',
  `buzz` varchar(20) NOT NULL DEFAULT '0',
  `created_ip` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mu_test_balances`
--

INSERT INTO `mu_test_balances` (`id`, `address`, `token`, `ether`, `xlm`, `prop`, `dragon`, `crypto`, `buzz`, `created_ip`, `created_at`) VALUES
(1, '0x8b6ec46c5e2c8167a70ba569f2a4497fcaa874a3', '0', '0', 0, '1', '0', '0', '0', '192.168.1.98', '2018-05-07 08:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `mu_transactions`
--

CREATE TABLE `mu_transactions` (
  `tx_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `by` char(10) NOT NULL COMMENT 'auth = BY Admin, user = BY User, referral = BY Referral',
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `tx_hash` varchar(255) NOT NULL,
  `type` char(100) NOT NULL COMMENT 'mut = For Mula Token, eth = For Ether, btc = For Bitcoin',
  `created_at` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mu_users`
--

CREATE TABLE `mu_users` (
  `user_ID` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` char(100) NOT NULL,
  `referral_link` varchar(20) NOT NULL,
  `secure_hash` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `account_verify` int(1) NOT NULL COMMENT '0 = Not Verified, 1 = Verified',
  `created_ip` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL COMMENT '0 = Not Deleted, 1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for website users';

--
-- Dumping data for table `mu_users`
--

INSERT INTO `mu_users` (`user_ID`, `first_name`, `last_name`, `email_address`, `password`, `user_profile`, `phone`, `country`, `referral_link`, `secure_hash`, `status`, `account_verify`, `created_ip`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Rajat', '', 'rajat@yopmail.com', '$2y$10$wq.C5g4eYHxWxEqea0nOY.E8qlR4/Ee8HAYfVoW9p2yEtbMQx19yS', 'DP0599784621455adeceaf1d63c.jpg', '', '', 'LJ08ECMX6H-RAJA', '7605fb9b7cf3796c65a1f86ac72ae61c6d2a317d', 1, 1, '192.168.1.98', '2018-04-06 11:37:15', '2018-04-18 18:28:06', 0),
(2, 'Tester', '', 'tester@yopmail.com', '$2y$10$UpZGkAqPvxnsqHG1qF7JIehR6nB5rR/0FWgEjMYVaxnC88qilpNk2', '', '', '', '6JBLRBTF2K-TEST', '7dedb7b608b7dae548c91f41a458d3bac193253c', 1, 0, '192.168.1.98', '2018-05-04 17:44:23', '2018-05-04 17:44:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mu_address`
--
ALTER TABLE `mu_address`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mu_assets`
--
ALTER TABLE `mu_assets`
  ADD PRIMARY KEY (`asset_ID`);

--
-- Indexes for table `mu_auth`
--
ALTER TABLE `mu_auth`
  ADD PRIMARY KEY (`auth_ID`);

--
-- Indexes for table `mu_demo`
--
ALTER TABLE `mu_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mu_options`
--
ALTER TABLE `mu_options`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mu_referrals`
--
ALTER TABLE `mu_referrals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mu_sessions`
--
ALTER TABLE `mu_sessions`
  ADD PRIMARY KEY (`sess_ID`);

--
-- Indexes for table `mu_test_balances`
--
ALTER TABLE `mu_test_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mu_transactions`
--
ALTER TABLE `mu_transactions`
  ADD PRIMARY KEY (`tx_ID`);

--
-- Indexes for table `mu_users`
--
ALTER TABLE `mu_users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mu_address`
--
ALTER TABLE `mu_address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mu_assets`
--
ALTER TABLE `mu_assets`
  MODIFY `asset_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mu_auth`
--
ALTER TABLE `mu_auth`
  MODIFY `auth_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mu_demo`
--
ALTER TABLE `mu_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mu_options`
--
ALTER TABLE `mu_options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mu_referrals`
--
ALTER TABLE `mu_referrals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mu_sessions`
--
ALTER TABLE `mu_sessions`
  MODIFY `sess_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mu_test_balances`
--
ALTER TABLE `mu_test_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mu_transactions`
--
ALTER TABLE `mu_transactions`
  MODIFY `tx_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mu_users`
--
ALTER TABLE `mu_users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
