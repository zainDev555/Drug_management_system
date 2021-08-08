-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 01:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `m_id` text NOT NULL,
  `m_name` text NOT NULL,
  `m_qty` int(250) NOT NULL,
  `m_price` int(250) NOT NULL,
  `m_total_price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `salesman_id`, `m_id`, `m_name`, `m_qty`, `m_price`, `m_total_price`) VALUES
(8, 2, '121212', 'Acetaminophen', 8, 200, 1600),
(9, 2, '455445', 'Adderall', 17, 30, 510);

-- --------------------------------------------------------

--
-- Table structure for table `sales_manager`
--

CREATE TABLE `sales_manager` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_manager`
--

INSERT INTO `sales_manager` (`id`, `name`, `cnic`, `phone`, `password`) VALUES
(2, 'ijal', '12345-12345678-4', '123456789', '25d55ad283aa400af464c76d713c07ad'),
(3, 'test', '12345-543216-7', '12345678', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `sales_medicine`
--

CREATE TABLE `sales_medicine` (
  `id` int(11) NOT NULL,
  `sm_name` text NOT NULL,
  `sm_price` int(250) NOT NULL,
  `sm_qty` int(250) NOT NULL,
  `sm_id` int(250) NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_medicine`
--

INSERT INTO `sales_medicine` (`id`, `sm_name`, `sm_price`, `sm_qty`, `sm_id`, `salesman_id`, `created_at`) VALUES
(20, 'Adderall', 0, 0, 455445, 2, '2021-07-25'),
(21, 'Adderall', 30, 1, 455445, 2, '2021-07-25'),
(22, 'Adderall', 60, 2, 455445, 2, '2021-07-25'),
(23, 'Acetaminophen', 400, 2, 121212, 2, '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `sales_m_return`
--

CREATE TABLE `sales_m_return` (
  `id` int(11) NOT NULL,
  `rm_name` text NOT NULL,
  `rm_qty` int(250) NOT NULL,
  `rm_price` int(250) NOT NULL,
  `rm_id` int(250) NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `s_table_r_id` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_m_return`
--

INSERT INTO `sales_m_return` (`id`, `rm_name`, `rm_qty`, `rm_price`, `rm_id`, `salesman_id`, `s_table_r_id`, `created_at`) VALUES
(16, 'Adderall', 1, 30, 455445, 2, 20, '2021-07-25'),
(17, 'Adderall', 1, 30, 455445, 2, 20, '2021-07-25'),
(18, 'Adderall', 1, 30, 455445, 2, 21, '2021-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `store_manager`
--

CREATE TABLE `store_manager` (
  `id` int(250) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`id`, `name`, `email`, `cnic`, `phone`, `password`) VALUES
(1, 'ijal', 'a@a.com', '33521-5487888-2', '0305-4568999', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `s_manager_daily_record`
--

CREATE TABLE `s_manager_daily_record` (
  `id` int(11) NOT NULL,
  `salesman_name` text NOT NULL,
  `salesman_day_Sale` int(250) NOT NULL,
  `salesman_cnic` text NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `s_manager_id` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_manager_daily_record`
--

INSERT INTO `s_manager_daily_record` (`id`, `salesman_name`, `salesman_day_Sale`, `salesman_cnic`, `salesman_id`, `s_manager_id`, `created_at`) VALUES
(1, 'ijal', 400, '12345-12345678-4', 2, 2, '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `s_manager_monthly_record`
--

CREATE TABLE `s_manager_monthly_record` (
  `id` int(11) NOT NULL,
  `salesman_name` text NOT NULL,
  `salesman_month_sale` int(250) NOT NULL,
  `salesman_cnic` text NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `s_manager_id` int(250) NOT NULL,
  `date_1` date NOT NULL,
  `date_2` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_manager_monthly_record`
--

INSERT INTO `s_manager_monthly_record` (`id`, `salesman_name`, `salesman_month_sale`, `salesman_cnic`, `salesman_id`, `s_manager_id`, `date_1`, `date_2`, `created_at`) VALUES
(1, 'ijal', 490, '12345-12345678-4', 2, 1, '2021-07-01', '2021-07-31', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `s_manager_return_record`
--

CREATE TABLE `s_manager_return_record` (
  `id` int(11) NOT NULL,
  `salesman_name` text NOT NULL,
  `amount` int(250) NOT NULL,
  `salesman_cnic` text NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `r_manager_id` int(250) DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_manager_return_record`
--

INSERT INTO `s_manager_return_record` (`id`, `salesman_name`, `amount`, `salesman_cnic`, `salesman_id`, `r_manager_id`, `date_1`, `date_2`, `created_at`) VALUES
(1, 'ijal', 90, '12345-12345678-4', 2, 1, '2021-07-01', '2021-07-27', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `s_manager_weekly_record`
--

CREATE TABLE `s_manager_weekly_record` (
  `id` int(11) NOT NULL,
  `salesman_name` text NOT NULL,
  `salesman_weekly_sale` int(250) NOT NULL,
  `salesman_cnic` text NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `s_manager_id` int(250) NOT NULL,
  `date_1` text NOT NULL,
  `date_2` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_manager_weekly_record`
--

INSERT INTO `s_manager_weekly_record` (`id`, `salesman_name`, `salesman_weekly_sale`, `salesman_cnic`, `salesman_id`, `s_manager_id`, `date_1`, `date_2`, `created_at`) VALUES
(7, 'ijal', 490, '12345-12345678-4', 2, 1, '2021-07-20', '2021-07-27', '2021-07-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_medicine`
--
ALTER TABLE `sales_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_m_return`
--
ALTER TABLE `sales_m_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_manager`
--
ALTER TABLE `store_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_manager_daily_record`
--
ALTER TABLE `s_manager_daily_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_manager_monthly_record`
--
ALTER TABLE `s_manager_monthly_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_manager_return_record`
--
ALTER TABLE `s_manager_return_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_manager_weekly_record`
--
ALTER TABLE `s_manager_weekly_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_manager`
--
ALTER TABLE `sales_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_medicine`
--
ALTER TABLE `sales_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales_m_return`
--
ALTER TABLE `sales_m_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store_manager`
--
ALTER TABLE `store_manager`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_manager_daily_record`
--
ALTER TABLE `s_manager_daily_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_manager_monthly_record`
--
ALTER TABLE `s_manager_monthly_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_manager_return_record`
--
ALTER TABLE `s_manager_return_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_manager_weekly_record`
--
ALTER TABLE `s_manager_weekly_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
