-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 09:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `washigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_id` int(11) NOT NULL,
  `bk_fname` varchar(100) NOT NULL,
  `bk_lname` varchar(100) DEFAULT NULL,
  `bk_email` varchar(100) NOT NULL,
  `bk_phone` varchar(100) NOT NULL,
  `bk_message` varchar(256) DEFAULT NULL,
  `bk_address` varchar(256) NOT NULL,
  `bk_date` datetime NOT NULL,
  `bk_cat_id` varchar(10) NOT NULL,
  `bk_ser_id` varchar(100) NOT NULL,
  `bk_cat_name` varchar(100) NOT NULL,
  `bk_ser_name` varchar(100) DEFAULT NULL,
  `bk_pkage_name` varchar(100) DEFAULT NULL,
  `bk_amt` varchar(100) NOT NULL,
  `bk_status` varchar(10) NOT NULL DEFAULT '1',
  `bk_confirm_email` int(11) NOT NULL DEFAULT 0,
  `bk_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `et_id` int(11) NOT NULL,
  `et_name` varchar(256) NOT NULL,
  `et_subject` varchar(100) NOT NULL,
  `et_body` longtext NOT NULL,
  `et_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`et_id`, `et_name`, `et_subject`, `et_body`, `et_created_date`) VALUES
(1, 'booking', 'Booking Confirmation', '<p>Dear Customer,<p>\r\n\r\n<p>Thank you for choosing Bookigniter<p>\r\n\r\n<p>You appointment has been booked successfully.<p>\r\n\r\n<p>{{details}}<p>\r\n\r\n<p>Our professional and friendly staff are committed to ensuring your travel is both enjoyable and comfortable.<p>\r\n\r\n<p>Should you have any requests prior to your appointment , please do not hesitate to contact us and we will endeavor to assist you whenever possible.<p>\r\n\r\nTest', '2020-08-02 08:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_username` varchar(250) NOT NULL,
  `u_password` varchar(250) NOT NULL,
  `u_role` varchar(100) NOT NULL,
  `u_rolename` varchar(100) NOT NULL,
  `u_resetpass` varchar(11) NOT NULL DEFAULT '1',
  `u_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_username`, `u_password`, `u_role`, `u_rolename`, `u_resetpass`, `u_created_date`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin', '1', '2020-04-01 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `outofservice`
--

CREATE TABLE `outofservice` (
  `oos_id` int(10) NOT NULL,
  `oos_srtdate` varchar(100) NOT NULL,
  `oos_status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `p_time` varchar(100) NOT NULL,
  `p_vt_id` varchar(100) NOT NULL,
  `p_s_list` varchar(256) NOT NULL,
  `p_status` varchar(11) NOT NULL DEFAULT '1',
  `p_created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `py_id` int(11) NOT NULL,
  `bk_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_setting`
--

CREATE TABLE `payment_setting` (
  `ps_id` int(11) NOT NULL,
  `ps_publishable_key` varchar(100) NOT NULL,
  `ps_secret_key` varchar(100) NOT NULL,
  `ps_currency` varchar(100) NOT NULL,
  `ps_status` varchar(10) NOT NULL DEFAULT '1',
  `ps_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_setting`
--

INSERT INTO `payment_setting` (`ps_id`, `ps_publishable_key`, `ps_secret_key`, `ps_currency`, `ps_status`, `ps_type`) VALUES
(1, 'pk_test_mpNaVoSETBgMYKCVkPP5fuAe00Vz1z5sVG', 'sk_test_fKVvk2PFfxozF74iJNy7qBUf00XeHMzPZS', 'USD', '0', 'stripe'),
(2, 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'sb-zc9jk1803891@business.example.com', 'USD', '0', 'paypal'),
(3, '', '', '', '1', 'cash'),
(4, 'Bank ACC: 1231231231231321\r\nBranch : Test1211', '', '', '1', 'bank transfer');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `ser_id` int(11) NOT NULL,
  `ser_name` varchar(200) NOT NULL,
  `ser_desc` varchar(256) NOT NULL,
  `ser_price` varchar(100) NOT NULL,
  `ser_time` varchar(10) NOT NULL,
  `ser_status` varchar(10) NOT NULL DEFAULT '1',
  `ser_visibetofrontend` varchar(11) NOT NULL DEFAULT '1',
  `ser_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings_smtp`
--

CREATE TABLE `settings_smtp` (
  `smtp_host` varchar(100) NOT NULL,
  `smtp_auth` varchar(100) NOT NULL,
  `smtp_uname` varchar(100) NOT NULL,
  `smtp_pwd` varchar(100) NOT NULL,
  `smtp_issecure` varchar(100) NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_emailfrom` varchar(100) NOT NULL,
  `smtp_replyto` varchar(100) NOT NULL,
  `smtp_createddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_smtp`
--

INSERT INTO `settings_smtp` (`smtp_host`, `smtp_auth`, `smtp_uname`, `smtp_pwd`, `smtp_issecure`, `smtp_port`, `smtp_emailfrom`, `smtp_replyto`, `smtp_createddate`) VALUES
('smtp.gmail.com', 'true', 'mysmtp2020@gmail.com', 'tst', 'tls', '587', 'mysmtp2020@gmail.com', 'mysmtp2020@gmail.com', '2020-07-21 14:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `vt_id` int(10) NOT NULL,
  `vt_name` varchar(100) NOT NULL,
  `vt_image` varchar(100) NOT NULL,
  `vt_status` varchar(25) NOT NULL DEFAULT '1',
  `vt_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int(11) NOT NULL,
  `webiste_name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `frontend_show` int(10) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `webiste_name`, `logo`, `created_date`, `frontend_show`) VALUES
(1, 'Washigniter', '1618168347-1584713420-logo.png', '2020-03-20 14:10:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `working_time`
--

CREATE TABLE `working_time` (
  `wk_id` int(11) NOT NULL,
  `time_from` varchar(11) NOT NULL DEFAULT '9',
  `time_to` varchar(11) NOT NULL DEFAULT '6',
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `diff` varchar(100) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_time`
--

INSERT INTO `working_time` (`wk_id`, `time_from`, `time_to`, `updated_date`, `diff`) VALUES
(4, '11', '3', '2021-04-10 14:32:18', '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `outofservice`
--
ALTER TABLE `outofservice`
  ADD PRIMARY KEY (`oos_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`py_id`);

--
-- Indexes for table `payment_setting`
--
ALTER TABLE `payment_setting`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`vt_id`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_time`
--
ALTER TABLE `working_time`
  ADD PRIMARY KEY (`wk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outofservice`
--
ALTER TABLE `outofservice`
  MODIFY `oos_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `py_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_setting`
--
ALTER TABLE `payment_setting`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `vt_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `working_time`
--
ALTER TABLE `working_time`
  MODIFY `wk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
