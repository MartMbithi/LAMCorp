-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2020 at 03:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_LAMCorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_admin`
--

CREATE TABLE `LAMCorp_admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_admin`
--

INSERT INTO `LAMCorp_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
(11, 'Mart Developers', 'mart@lamcorp.org', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad'),
(12, 'System Administrator', 'admin@lamcorp.org', 'a69681bcf334ae130217fea4505fd3c994f5683f');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_expenses`
--

CREATE TABLE `LAMCorp_expenses` (
  `exp_id` int(20) NOT NULL,
  `exp_code` varchar(200) NOT NULL,
  `exp_type` varchar(200) NOT NULL,
  `exp_from` varchar(200) NOT NULL,
  `exp_to` varchar(200) NOT NULL,
  `exp_amt` varchar(200) NOT NULL,
  `kiosk_number` varchar(200) NOT NULL,
  `exp_desc` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_expenses`
--

INSERT INTO `LAMCorp_expenses` (`exp_id`, `exp_code`, `exp_type`, `exp_from`, `exp_to`, `exp_amt`, `kiosk_number`, `exp_desc`, `created_at`) VALUES
(2, 'LAMCorp-EXP-L09SB', 'Water Points Expenes', '', '', '3000', 'LAMCorp-PHO-821', 'Two thousand and five hundred Kenyan Shillings(Ksh 2500) spend by water point number LAMCorp-PHO-821 on Thursday May 28 2020 to repair water filters and broken water pipes.', '2020-05-28 12:29:04.872461'),
(4, 'LAMCorp-BILL-W2XT4', '', 'LAMCorp-PHO-821', 'Davis and Shirtliff', '1500', '', 'One thousand and five hundred Kenyan Shillings (Ksh 1500) paid to Davis and Shirtliff Kenya Limited for replacement Reverse Osmosis water membranes and filters.', '2020-05-28 12:29:11.454441'),
(5, 'LAMCorp-BILL-79FSC', '', 'LAMCorp-PHO-821', 'Metro Plastics Kenya Ltd', '1500', '', 'One thousand  Kenyan Shillings (Ksh 1000) paid to Metro Plastics Kenya Limited for purchase of PVC Water pipes', '2020-05-28 12:29:17.820238'),
(6, 'LAMCorp-EXP-TLCGJ', 'Staff Benefits', '', '', '9500', 'LAMCorp-PHO-821', '', '2020-06-01 09:17:49.095328');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_notifications`
--

CREATE TABLE `LAMCorp_notifications` (
  `id` int(20) NOT NULL,
  `notification_details` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_notifications`
--

INSERT INTO `LAMCorp_notifications` (`id`, `notification_details`, `created_at`) VALUES
(1, 'Implemented And intergrated LAMCorp Suite dashboard', '2020-05-22 12:30:40.787544');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_passwordresets`
--

CREATE TABLE `LAMCorp_passwordresets` (
  `reset_id` int(20) NOT NULL,
  `wp_number` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_passwordresets`
--

INSERT INTO `LAMCorp_passwordresets` (`reset_id`, `wp_number`, `token`, `reset_code`, `status`, `created_at`) VALUES
(17, 'LAMCorp-ZMP-160', 'd0a12811475d6d79ee40c3d050f6c66452507166', 'VY34N2FE', '1', '2020-06-01 08:05:59.602187'),
(18, 'LAMCorp-PHO-821', '893191694a47cf6618cb66396bf072a7e8ba9536', 'CSLH7V60', '1', '2020-06-01 08:24:34.750492'),
(19, 'LAMCorp-PHO-821', '0e7b74b477cc5866442139aa8954f5332680d8cd', '5NAFQJYE', '1', '2020-06-02 13:55:43.707594'),
(20, 'LAMCorp-ZMP-160', 'fc0b3a6f7811364bc0d182eec032dd5fb41f3030', '1', '0', '2020-06-02 13:53:16.546150'),
(21, 'LAMCorp-ZMP-160', '284e1d2bc58735c570c6769e2a02882b0f0b658f', '2GWLENM6', '1', '2020-06-02 13:55:50.605676'),
(22, 'LAMCorp-LVT-236', '4a7711c784645f6da9adf7979308e70e527bb1e1', 'XB8DCV7P', '1', '2020-06-02 13:55:35.402577');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_payments`
--

CREATE TABLE `LAMCorp_payments` (
  `pay_id` int(20) NOT NULL,
  `pay_number` varchar(200) NOT NULL,
  `kiosk_number` varchar(200) NOT NULL,
  `litres_purchased` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `till_number` varchar(200) NOT NULL,
  `transaction_code` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_payments`
--

INSERT INTO `LAMCorp_payments` (`pay_id`, `pay_number`, `kiosk_number`, `litres_purchased`, `client_name`, `client_phone`, `till_number`, `transaction_code`, `amount`, `created_at`, `description`) VALUES
(1, 'LAMCorp-Payment-851234', 'LAMCorp-LVT-236', '20', 'John Doe', '+254737229776', '936708', 'OER1HMSDQF', '80', '2020-05-27 10:00:06.469025', ''),
(3, 'LAMCorp-Payment-750189', 'LAMCorp-LVT-236', '1000', 'Martin Mbithi', '+254740847563', '936708', 'OE1234ERT6', '4000', '2020-05-27 10:55:13.902111', ''),
(4, 'LAMCorp-Payment-814953', 'LAMCorp-PHO-821', '8906', 'John Doe', '+254737229776', '876125', 'KTHY6754EF', '35624', '2020-06-01 08:26:23.551225', ''),
(5, 'LAMCorp-Payment-418902', 'LAMCorp-PHO-821', '200', 'Martin Mbithi', '+254740847563', '900543', 'HTY4556TRF', '800', '2020-05-27 12:54:32.954254', ''),
(6, 'LAMCorp-Payment-835149', 'LAMCorp-ZMP-160', '150', 'Jane Doe', '+567432190', '936708', 'OER1KFSAQQ', '600', '2020-05-27 12:55:46.399075', ''),
(7, 'LAMCorp-Payment-019423', 'LAMCorp-LVT-236', '2500', 'Jane Doe', '+254740847563', '936708', 'HTY23RF25T', '10000', '2020-05-29 13:02:04.783316', ''),
(8, 'LAMCorp-Payment-524710', 'LAMCorp-PHO-821', '5500', 'Mart Developers Inc', '+567432190', '900543', 'OH90FTGR452D', '22000', '2020-05-29 13:04:44.861468', ''),
(9, 'LAMCorp-Payment-674180', 'LAMCorp-ZMP-160', '1500', 'John Doe', '+254737229776', '876125', 'OER1KFTAQQ', '6000', '2020-06-01 09:31:26.493700', ''),
(10, 'LAMCorp-Payment-031984', 'LAMCorp-ZMP-160', '5000', 'verdurstende', '+1789076543', '936708', 'OER1HMSDHT', '20000', '2020-05-30 10:35:29.195865', ''),
(11, 'LAMCorp-Payment-721509', 'LAMCorp-ZMP-160', '45000', 'Harsey', '+9067542132', '936708', 'OER1HFHDQF', '180000', '2020-05-30 10:35:58.276482', ''),
(12, 'LAMCorp-Payment-587069', 'LAMCorp-ZMP-160', '12340', 'Harry k', '+1789076543', '876125', 'OEHUHMSDQF', '49360', '2020-06-01 09:31:23.882613', ''),
(13, 'LAMCorp-Payment-308542', 'LAMCorp-PHO-821', '190', 'John Doe', '+254737229776', '936708', 'OFR1HGSDQF', '760', '2020-06-01 08:31:05.118070', ''),
(14, 'LAMCorp-Payment-194275', 'LAMCorp-PHO-821', '200', 'Jane Doe', '+254740847563', '900543', 'OFR1KG5DQF', '800', '2020-06-01 09:04:48.773143', ''),
(15, 'LAMCorp-Payment-952180', 'LAMCorp-PHO-821', '1590', 'John Doe', '+254740847563', '900543', 'OF123TF7GH', '6360', '2020-06-01 09:06:01.445758', '');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_payrolls`
--

CREATE TABLE `LAMCorp_payrolls` (
  `payroll_id` int(20) NOT NULL,
  `payroll_code` varchar(200) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_idno` varchar(200) NOT NULL,
  `pay_record` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `taxation` varchar(200) NOT NULL,
  `alw` varchar(200) NOT NULL,
  `comments` longtext NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_acc` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_payrolls`
--

INSERT INTO `LAMCorp_payrolls` (`payroll_id`, `payroll_code`, `staff_id`, `staff_number`, `staff_name`, `staff_email`, `staff_idno`, `pay_record`, `salary`, `taxation`, `alw`, `comments`, `bank_name`, `bank_acc`, `created_at`) VALUES
(1, 'LAMCorpPayroll-RDZ-014', '2', 'LAMCorp-GBW-214', 'John Doe', 'johndoe@gmail.com', '35589760', 'January', '1200', '200', '150', '', 'KCB Bank', '127890076543', '2020-05-27 11:20:21.025400'),
(2, 'LAMCorpPayroll-HBR-486', '2', 'LAMCorp-GBW-214', 'John Doe', 'johndoe@gmail.com', '35589760', 'January', '5000', '2500', '1000', '', 'KCB Bank', '127890076543', '2020-05-27 11:21:28.210239'),
(3, 'LAMCorpPayroll-LGO-475', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'January', '5000', '400', '1000', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:19:41.320730'),
(4, 'LAMCorpPayroll-HOB-108', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'February', '5000', '100', '450', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:20:12.711419'),
(5, 'LAMCorpPayroll-OLU-837', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'March', '5000', '1500', '1000', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:20:37.766216'),
(6, 'LAMCorpPayroll-WHA-890', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'April', '5000', '1864', '590', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:21:13.074262'),
(7, 'LAMCorpPayroll-PJG-581', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'May', '5000', '2560', '3000', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:21:47.595568'),
(8, 'LAMCorpPayroll-JZM-924', '5', 'LAMCorp-GHD-905', 'Carmen C. Titcomb', 'carmenitcomb@dayrep.com', '680-42-9005643', 'June', '5000', '1896', '540', '', 'NIC Bank', '5522 9939 0050 2943', '2020-05-30 10:22:23.947136'),
(9, 'LAMCorpPayroll-JXB-270', '12', 'LAMCorp-LPO-945', 'Darcy Tivey', 'DarcyTivey@teleworm.us', '8609737486', 'January', '6500', '2000', '3000', '', ' GRANDSOUTH BANK ', '06666394052', '2020-05-30 10:27:19.712523'),
(10, 'LAMCorpPayroll-XNA-930', '12', 'LAMCorp-LPO-945', 'Darcy Tivey', 'DarcyTivey@teleworm.us', '8609737486', 'February', '6500', '2000', '4500', '', 'GRANDSOUTH BANK', '06666394052', '2020-05-30 10:27:55.470407'),
(11, 'LAMCorpPayroll-OBT-836', '12', 'LAMCorp-LPO-945', 'Darcy Tivey', 'DarcyTivey@teleworm.us', '8609737486', 'March', '6500', '4500', '1000', '', 'GRANDSOUTH BANK', '06666394052', '2020-05-30 10:28:15.710927'),
(12, 'LAMCorpPayroll-PVH-836', '12', 'LAMCorp-LPO-945', 'Darcy Tivey', 'DarcyTivey@teleworm.us', '8609737486', 'April', '6500', '4500', '3000', '', 'GRANDSOUTH BANK', '06666394052', '2020-05-30 10:28:47.574440'),
(13, 'LAMCorpPayroll-LBQ-154', '12', 'LAMCorp-LPO-945', 'Darcy Tivey', 'DarcyTivey@teleworm.us', '8609737486', 'May', '6500', '100', '5600', '', 'GRANDSOUTH BANK', '06666394052', '2020-05-30 10:29:09.164766'),
(14, 'LAMCorpPayroll-RGC-976', '9', 'LAMCorp-CXM-856', 'Erin Streeten', 'ErinStreeten@jourrapide.com', '8843783637', 'January', '4500', '1200', '1500', '', 'GRANDSOUTH BANK', '06666394090', '2020-05-30 10:30:03.312698'),
(15, 'LAMCorpPayroll-SCY-096', '9', 'LAMCorp-CXM-856', 'Erin Streeten', 'ErinStreeten@jourrapide.com', '8843783637', 'February', '4500', '1200', '1450', '', 'GRANDSOUTH BANK', '06666394090', '2020-05-30 10:30:28.331750'),
(16, 'LAMCorpPayroll-ADO-314', '9', 'LAMCorp-CXM-856', 'Erin Streeten', 'ErinStreeten@jourrapide.com', '8843783637', 'March', '4500', '1200', '2000', '', 'GRANDSOUTH BANK', '06666394090', '2020-05-30 10:30:52.320717');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_staffs`
--

CREATE TABLE `LAMCorp_staffs` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_idno` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_phoneno` varchar(200) NOT NULL,
  `staff_adr` varchar(200) NOT NULL,
  `staff_dob` varchar(200) NOT NULL,
  `staff_num` varchar(200) NOT NULL,
  `staff_icon` varchar(200) NOT NULL,
  `staff_bio` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_staffs`
--

INSERT INTO `LAMCorp_staffs` (`staff_id`, `staff_name`, `staff_idno`, `staff_email`, `staff_phoneno`, `staff_adr`, `staff_dob`, `staff_num`, `staff_icon`, `staff_bio`, `created_at`) VALUES
(2, 'John Doe', '35589760', 'johndoe@gmail.com', '+254 747 697 900', '120 Machakos Kenya', '09-12-1987', 'LAMCorp-GBW-214', 'Orion-1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-06-01 07:27:19.859532'),
(3, 'Mart Developers', '127009089', 'martdevelopers254@gmail.com', '+254 747 697 900', '120 Machakos Kenya', '12-06-1998', 'LAMCorp-XKG-617', 'Orion.jpg', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee ', '2020-05-29 11:30:51.778132'),
(4, 'Jane Doe', '367890876', 'janedoe@gmail.com', '+254 747 697 500', '120 Machakos Kenya', '20-09-1994', 'LAMCorp-ZPW-350', 'Screenshot from 2020-05-29 11-28-59.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-29 10:59:06.787789'),
(5, 'Carmen C. Titcomb', '680-42-9005643', 'carmenitcomb@dayrep.com', '+1702-506-5426', '3579 Hall Street Las Vegas, NV 89101 ', '26-02-1973', 'LAMCorp-GHD-905', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:05:26.826340'),
(6, 'Jerome J. Zavala', '651-12-876432', 'JeromeJZavala@rhyta.com', '+1 303-953-3715', '4979 Roy Alley Denver, CO 80203 ', '05-04-1973', 'LAMCorp-FVD-378', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:07:00.811238'),
(7, 'Will A. Calhoun', '540-62-8765432', 'WillACalhoun@rhyta.com', '+1541-923-3210', '4092 Center Street Redmond, OR 97756 ', '07-07-1980', 'LAMCorp-ZAN-642', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:09:53.115338'),
(8, 'Tracy D. Segarra', '507-50-34567890', 'TracyDSegarra@jourrapide.com', '+1402-419-9568', '3581 Oak Way Lincoln, NE 68501 ', '24-04-1958', 'LAMCorp-YTK-548', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:11:14.344193'),
(9, 'Erin Streeten', '8843783637', 'ErinStreeten@jourrapide.com', '+47488 81 401', 'Valhallvegen 215 3715 SKIEN ', '27-07-1989', 'LAMCorp-CXM-856', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:12:58.675512'),
(10, 'Jesse Cowan', '4466435987', 'JesseCowan@jourrapide.com', '+46 921 28 642', 'Briskeveien 32 1481 HAGAN ', 'October 14, 1990', 'LAMCorp-IYP-189', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:14:48.428431'),
(11, 'Jett Jones', '5044380551', 'JettJones@jourrapide.com', '+39 0315 1971214', 'Via Vico Ferrovia, 65 44012-Ospitale FE ', 'October 14, 1984', 'LAMCorp-BTW-710', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-06-01 07:25:28.614635'),
(12, 'Darcy Tivey', '8609737486', 'DarcyTivey@teleworm.us', '+390385 6682954', 'Via Galvani, 147 00030-San Cesareo RM ', 'September 25, 1984', 'LAMCorp-LPO-945', 'staff.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-05-30 10:17:25.156648'),
(13, 'Ushrt Pankaj', '9087-98765', 'ush@hotmail.com', '+9076540238', '128, Dhaka', '20-09-1994', 'LAMCorp-ZQH-768', 'staff.jpeg', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee ', '2020-06-01 07:47:20.218567');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_taxes`
--

CREATE TABLE `LAMCorp_taxes` (
  `tax_id` int(20) NOT NULL,
  `tax_name` varchar(200) NOT NULL,
  `tax_rate` varchar(200) NOT NULL,
  `tax_code` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `tax_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_taxes`
--

INSERT INTO `LAMCorp_taxes` (`tax_id`, `tax_name`, `tax_rate`, `tax_code`, `created_at`, `tax_type`) VALUES
(2, 'Value Added Tax', '14', 'LAMCorp-Tax-069', '2020-05-28 08:42:35.945134', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_tills`
--

CREATE TABLE `LAMCorp_tills` (
  `till_id` int(20) NOT NULL,
  `till_service_provider` varchar(200) NOT NULL,
  `till_number` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_tills`
--

INSERT INTO `LAMCorp_tills` (`till_id`, `till_service_provider`, `till_number`, `created_at`) VALUES
(1, 'Safaricom', '936708', '2020-05-27 08:28:07.613951'),
(2, 'Airtel', '876125', '2020-05-27 08:28:23.607905'),
(3, 'Telkom', '900543', '2020-05-29 12:30:21.978497');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_vendors`
--

CREATE TABLE `LAMCorp_vendors` (
  `v_id` int(20) NOT NULL,
  `v_number` varchar(200) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_pobox` longtext NOT NULL,
  `v_location` longtext NOT NULL,
  `v_email` varchar(200) NOT NULL,
  `v_phoneno` varchar(200) NOT NULL,
  `v_icon` varchar(200) NOT NULL,
  `v_items` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_vendors`
--

INSERT INTO `LAMCorp_vendors` (`v_id`, `v_number`, `v_name`, `v_pobox`, `v_location`, `v_email`, `v_phoneno`, `v_icon`, `v_items`, `created_at`) VALUES
(1, 'LAMCorp-Vendor-EKB-256', 'Vectus Kenya Limited', 'P.O.Box 2104 â€“ 00606', 'Off Mombasa Road, \r\nBehind London Distillers (K) Ltd, \r\nPast Great Wall Gardens on Shangai Road ,\r\nAthi River - Nairobi - Kenya', 'info@vectuskenyaltd.com', '+254-715-750-633  +254-715-101-061', 'VectusWebLogo.png', 'Rotational Molded Tanks and Blow Molded Water Tanks', '2020-05-26 10:08:07.203048'),
(2, 'LAMCorp-Vendor-QDB-903', 'Davis and Shirtliff', 'P.O. Box: 41762-00100 - Kenya', 'Industrial Area, Dundori Road Nairobi - Kenya', 'contactcenter@dayliff.com', '+254-733 610085  / +254-711 079 000 / +254-727 696800 / +254-736 696800 ', 'Ds.png', '270-db-2 Water pump, DC 50E/DC 50P Engine Water Pump, Lorentz SmartTap.', '2020-05-26 10:21:31.527221'),
(3, 'LAMCorp-Vendor-LMG-208', ' Metro Plastics Kenya Ltd', 'P.O. Box 78485â€“00507  Viwandani, Nairobi, Kenya', ' Nadume Close off Lunga Lunga Road, Industrial Area, Nairobi, Kenya', 'sales@metrogroup.co.ke', '+254 733 608 589, +254 733 608 592, +254 733 550 355, +254 727 533 619 ', 'Metro Plastics.jpg', 'Pressure PVC Pipes and Fittings . The PVC Pressure Pipes are designed to withstand tough climatic and technical conditions, its unique formulation of PVC with the addition of stabilizer pigments guarantees an ultra high level of protection against the effects of harmful Ultra Violet Radiation.', '2020-05-26 10:58:37.570832');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_waterPoints`
--

CREATE TABLE `LAMCorp_waterPoints` (
  `wp_id` int(20) NOT NULL,
  `wp_number` varchar(200) NOT NULL,
  `wp_pass` varchar(200) NOT NULL,
  `wp_phone` varchar(200) NOT NULL,
  `wp_location` varchar(200) NOT NULL,
  `wp_opening_hrs` varchar(200) NOT NULL,
  `wp_closing_hrs` varchar(200) NOT NULL,
  `wp_staff_on_duty` longtext NOT NULL,
  `wp_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_waterPoints`
--

INSERT INTO `LAMCorp_waterPoints` (`wp_id`, `wp_number`, `wp_pass`, `wp_phone`, `wp_location`, `wp_opening_hrs`, `wp_closing_hrs`, `wp_staff_on_duty`, `wp_status`, `created_at`) VALUES
(1, 'LAMCorp-PHO-821', 'cdfb11d89d7f15d5d140ee7ba04b0024f760d525', '+254 737229776', 'Industrial Area, Dundori Road Nairobi - Kenya', '08:00', '21:00', 'Jane Doe LAMCorp-ZPW-350', 'Operational', '2020-06-02 13:55:43.422237'),
(3, 'LAMCorp-ZMP-160', '272c7fd4d3ba9d911df6d3ab9be82f9e0418bb69', '+254 737229776', ' Nadume Close off Lunga Lunga Road, Industrial Area, Nairobi, Kenya', '08:00', '21:00', 'Mart Developers LAMCorp-XKG-617', 'Operational', '2020-06-02 13:55:50.348934'),
(4, 'LAMCorp-LVT-236', '0bab60ebc4c1812a90655248b775f5ac9c61689d', '+254 737229776', 'Off Mombasa Road, Behind London Distillers (K) Ltd, Past Great Wall Gardens on Shangai Road , Athi River - Nairobi - Kenya', '09:00', '21:00', 'Mart Developers LAMCorp-XKG-617', 'Operational', '2020-06-02 13:55:34.978482');

-- --------------------------------------------------------

--
-- Table structure for table `LAMCorp_waterTariffs`
--

CREATE TABLE `LAMCorp_waterTariffs` (
  `t_id` int(20) NOT NULL,
  `t_code` varchar(200) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `cost_per_litre` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LAMCorp_waterTariffs`
--

INSERT INTO `LAMCorp_waterTariffs` (`t_id`, `t_code`, `t_name`, `cost_per_litre`, `created_at`) VALUES
(2, 'LAMCorp-GFV-462', 'Uwezo Tariff', '4.00', '2020-05-26 13:35:17.253782');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `LAMCorp_admin`
--
ALTER TABLE `LAMCorp_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `LAMCorp_expenses`
--
ALTER TABLE `LAMCorp_expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `LAMCorp_notifications`
--
ALTER TABLE `LAMCorp_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LAMCorp_passwordresets`
--
ALTER TABLE `LAMCorp_passwordresets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `LAMCorp_payments`
--
ALTER TABLE `LAMCorp_payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `LAMCorp_payrolls`
--
ALTER TABLE `LAMCorp_payrolls`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `LAMCorp_staffs`
--
ALTER TABLE `LAMCorp_staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `LAMCorp_taxes`
--
ALTER TABLE `LAMCorp_taxes`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `LAMCorp_tills`
--
ALTER TABLE `LAMCorp_tills`
  ADD PRIMARY KEY (`till_id`);

--
-- Indexes for table `LAMCorp_vendors`
--
ALTER TABLE `LAMCorp_vendors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `LAMCorp_waterPoints`
--
ALTER TABLE `LAMCorp_waterPoints`
  ADD PRIMARY KEY (`wp_id`);

--
-- Indexes for table `LAMCorp_waterTariffs`
--
ALTER TABLE `LAMCorp_waterTariffs`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `LAMCorp_admin`
--
ALTER TABLE `LAMCorp_admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `LAMCorp_expenses`
--
ALTER TABLE `LAMCorp_expenses`
  MODIFY `exp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `LAMCorp_notifications`
--
ALTER TABLE `LAMCorp_notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `LAMCorp_passwordresets`
--
ALTER TABLE `LAMCorp_passwordresets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `LAMCorp_payments`
--
ALTER TABLE `LAMCorp_payments`
  MODIFY `pay_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `LAMCorp_payrolls`
--
ALTER TABLE `LAMCorp_payrolls`
  MODIFY `payroll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `LAMCorp_staffs`
--
ALTER TABLE `LAMCorp_staffs`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `LAMCorp_taxes`
--
ALTER TABLE `LAMCorp_taxes`
  MODIFY `tax_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `LAMCorp_tills`
--
ALTER TABLE `LAMCorp_tills`
  MODIFY `till_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `LAMCorp_vendors`
--
ALTER TABLE `LAMCorp_vendors`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `LAMCorp_waterPoints`
--
ALTER TABLE `LAMCorp_waterPoints`
  MODIFY `wp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `LAMCorp_waterTariffs`
--
ALTER TABLE `LAMCorp_waterTariffs`
  MODIFY `t_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
