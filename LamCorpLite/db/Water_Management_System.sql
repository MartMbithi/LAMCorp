-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2020 at 06:12 AM
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
-- Database: `Water_Management_System`
--

-- --------------------------------------------------------

--
-- Table structure for table `Expenses`
--

CREATE TABLE `Expenses` (
  `Expense_id` int(20) NOT NULL,
  `Expense_code` varchar(200) NOT NULL,
  `Expense_date` varchar(200) NOT NULL,
  `Expense_type` varchar(200) NOT NULL,
  `Expense_amount` varchar(200) NOT NULL,
  `Expense_kiosk_id` int(20) NOT NULL,
  `Expense_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Expenses`
--

INSERT INTO `Expenses` (`Expense_id`, `Expense_code`, `Expense_date`, `Expense_type`, `Expense_amount`, `Expense_kiosk_id`, `Expense_desc`) VALUES
(2, 'NDVH', '2020-08-26', 'Repair Expense', '25000', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu');

-- --------------------------------------------------------

--
-- Table structure for table `Kiosk_Staff_Duty`
--

CREATE TABLE `Kiosk_Staff_Duty` (
  `kiosk_staff_duty_id` int(20) NOT NULL,
  `kiosk_staff_duty_kiosk_id` int(20) NOT NULL,
  `kiosk_staff_duty_staff_id` varchar(200) NOT NULL,
  `kiosk_staff_duty_start_date` varchar(200) NOT NULL,
  `kiosk_staff_duty_end_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Kiosk_Staff_Duty`
--

INSERT INTO `Kiosk_Staff_Duty` (`kiosk_staff_duty_id`, `kiosk_staff_duty_kiosk_id`, `kiosk_staff_duty_staff_id`, `kiosk_staff_duty_start_date`, `kiosk_staff_duty_end_date`) VALUES
(1, 1, '758add1f555a', '26 Aug 2020', '2020-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `login_id` varchar(200) NOT NULL,
  `login_user_name` varchar(200) NOT NULL,
  `login_email` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`login_id`, `login_user_name`, `login_email`, `login_password`, `login_rank`) VALUES
('1', 'James Lamon', 'jameslamon@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Admin'),
('29f5acfc51f9', 'Jane Doe', 'janedoe@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `Passwordresets`
--

CREATE TABLE `Passwordresets` (
  `Reset_id` int(20) NOT NULL,
  `Reset_Wrongpassword_number` varchar(200) NOT NULL,
  `Reset_Kiosk_id` varchar(200) NOT NULL,
  `Reset_code` varchar(200) NOT NULL,
  `Reset_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Passwordresets`
--

INSERT INTO `Passwordresets` (`Reset_id`, `Reset_Wrongpassword_number`, `Reset_Kiosk_id`, `Reset_code`, `Reset_status`) VALUES
(1, '7864', '1', 'W64QP3IS9V', 'Pending'),
(2, '9364', '1', '1O48SYAT7Z', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `Payment_id` int(20) NOT NULL,
  `Payment_number` varchar(200) NOT NULL,
  `Payment_kiosk_id` int(20) NOT NULL,
  `Payment_till_number` varchar(200) NOT NULL,
  `Payment_transaction_code` varchar(200) NOT NULL,
  `Payment_amount` varchar(200) NOT NULL,
  `Payment_date` varchar(200) NOT NULL,
  `Payment_reference_no` varchar(200) NOT NULL,
  `Payment_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payments`
--

INSERT INTO `Payments` (`Payment_id`, `Payment_number`, `Payment_kiosk_id`, `Payment_till_number`, `Payment_transaction_code`, `Payment_amount`, `Payment_date`, `Payment_reference_no`, `Payment_desc`) VALUES
(2, '7652', 1, '936709', 'Q32WPMXNR6', '50000', '2020-08-26', '0357', '');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `Staff_id` varchar(200) NOT NULL,
  `Staff_name` varchar(200) NOT NULL,
  `Staff_id_no` varchar(200) NOT NULL,
  `Staff_login_id` varchar(200) NOT NULL,
  `Staff_phone_no` varchar(200) NOT NULL,
  `Staff_kiosk_id` int(20) NOT NULL,
  `Staff_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_id`, `Staff_name`, `Staff_id_no`, `Staff_login_id`, `Staff_phone_no`, `Staff_kiosk_id`, `Staff_desc`) VALUES
('1', 'James Lamon', '35574881', '1', '+25471234567', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
('758add1f555a', 'Jane Doe', '123456789', '29f5acfc51f9', '+1234567890', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu');

-- --------------------------------------------------------

--
-- Table structure for table `Water_Kiosk`
--

CREATE TABLE `Water_Kiosk` (
  `kiosk_id` int(20) NOT NULL,
  `kiosk_name` varchar(200) NOT NULL,
  `kiosk_no` varchar(200) NOT NULL,
  `kiosk_location` varchar(200) NOT NULL,
  `kiosk_opening_hours` varchar(200) NOT NULL,
  `kiosk_closing_hours` varchar(200) NOT NULL,
  `kiosk_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Water_Kiosk`
--

INSERT INTO `Water_Kiosk` (`kiosk_id`, `kiosk_name`, `kiosk_no`, `kiosk_location`, `kiosk_opening_hours`, `kiosk_closing_hours`, `kiosk_status`) VALUES
(1, 'Lorem Ipsum Kiosk', '6598', 'Localhost 127001', '08:00', '20:00', 'Operational');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Expenses`
--
ALTER TABLE `Expenses`
  ADD PRIMARY KEY (`Expense_id`),
  ADD KEY `Expense_kiosk_id` (`Expense_kiosk_id`);

--
-- Indexes for table `Kiosk_Staff_Duty`
--
ALTER TABLE `Kiosk_Staff_Duty`
  ADD PRIMARY KEY (`kiosk_staff_duty_id`),
  ADD KEY `kiosk_staff_duty_kiosk_id` (`kiosk_staff_duty_kiosk_id`,`kiosk_staff_duty_staff_id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `Passwordresets`
--
ALTER TABLE `Passwordresets`
  ADD PRIMARY KEY (`Reset_id`),
  ADD KEY `Reset_Kiosk_id` (`Reset_Kiosk_id`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Payment_kiosk_id` (`Payment_kiosk_id`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`Staff_id`),
  ADD KEY `Staff_kiosk_id` (`Staff_kiosk_id`);

--
-- Indexes for table `Water_Kiosk`
--
ALTER TABLE `Water_Kiosk`
  ADD PRIMARY KEY (`kiosk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Expenses`
--
ALTER TABLE `Expenses`
  MODIFY `Expense_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Kiosk_Staff_Duty`
--
ALTER TABLE `Kiosk_Staff_Duty`
  MODIFY `kiosk_staff_duty_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Passwordresets`
--
ALTER TABLE `Passwordresets`
  MODIFY `Reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `Payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Water_Kiosk`
--
ALTER TABLE `Water_Kiosk`
  MODIFY `kiosk_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
