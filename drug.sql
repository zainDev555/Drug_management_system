-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 11:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE `ceo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ceo`
--

INSERT INTO `ceo` (`id`, `name`, `email`, `cnic`, `phone`, `password`, `country`) VALUES
(1, 'ceo', 'ceo@ceo.com', '33145-5789687-3', '0312345678', '25d55ad283aa400af464c76d713c07ad', 'pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `city_manager`
--

CREATE TABLE `city_manager` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_manager`
--

INSERT INTO `city_manager` (`id`, `name`, `email`, `cnic`, `phone`, `password`, `city`, `country`) VALUES
(1, 'city_manager', 'citymanager@citymanager.com', '11100-5487963-2', '99887544852', '25d55ad283aa400af464c76d713c07ad', 'Lahore', 'pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `city_manager_monthly_record`
--

CREATE TABLE `city_manager_monthly_record` (
  `id` int(11) NOT NULL,
  `city_manager_id` int(250) NOT NULL,
  `store_manager_cnic` text NOT NULL,
  `store_manager_id` int(250) NOT NULL,
  `store_manager_name` text NOT NULL,
  `store_manager_month_Sale` int(250) NOT NULL,
  `date_1` text NOT NULL,
  `date_2` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_manager_monthly_record`
--

INSERT INTO `city_manager_monthly_record` (`id`, `city_manager_id`, `store_manager_cnic`, `store_manager_id`, `store_manager_name`, `store_manager_month_Sale`, `date_1`, `date_2`, `created_at`) VALUES
(1, 1, '33521-5487888-2', 1, 'ijal', 400, '2021-07-27', '2021-08-31', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `city_manager_record`
--

CREATE TABLE `city_manager_record` (
  `id` int(250) NOT NULL,
  `c_m_name` text NOT NULL,
  `s_m_daily_sale` int(250) NOT NULL,
  `s_m_cnic` text NOT NULL,
  `s_m_id` int(250) NOT NULL,
  `city_m_id` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_manager_record`
--

INSERT INTO `city_manager_record` (`id`, `c_m_name`, `s_m_daily_sale`, `s_m_cnic`, `s_m_id`, `city_m_id`, `created_at`) VALUES
(1, 'ijal', 400, '33521-5487888-2', 1, 1, '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `city_manager_weekly_record`
--

CREATE TABLE `city_manager_weekly_record` (
  `id` int(11) NOT NULL,
  `s_m_name` text NOT NULL,
  `s_m_weekly_sale` int(250) NOT NULL,
  `s_m_cnic` text NOT NULL,
  `s_m_id` int(250) NOT NULL,
  `city_manager_id` int(250) NOT NULL,
  `date_1` text NOT NULL,
  `date_2` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_manager_weekly_record`
--

INSERT INTO `city_manager_weekly_record` (`id`, `s_m_name`, `s_m_weekly_sale`, `s_m_cnic`, `s_m_id`, `city_manager_id`, `date_1`, `date_2`, `created_at`) VALUES
(1, 'ijal', 400, '33521-5487888-2', 1, 1, '21-08-04', '21-08-11', '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `country_manager`
--

CREATE TABLE `country_manager` (
  `id` int(250) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_manager`
--

INSERT INTO `country_manager` (`id`, `name`, `email`, `cnic`, `phone`, `password`) VALUES
(1, 'countryManager', 'countryManager@countryManager.com', '33100-5896325-7', '03054789632', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `country_manager_daily_reord`
--

CREATE TABLE `country_manager_daily_reord` (
  `id` int(11) NOT NULL,
  `city_manager_id` int(250) NOT NULL,
  `citymanager_cnic` text NOT NULL,
  `c_m_name` text NOT NULL,
  `city` text NOT NULL,
  `city_m_daily_sale` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_manager_daily_reord`
--

INSERT INTO `country_manager_daily_reord` (`id`, `city_manager_id`, `citymanager_cnic`, `c_m_name`, `city`, `city_m_daily_sale`, `created_at`) VALUES
(3, 1, '11100-5487963-2', 'city_manager', 'Lahore', 400, '2021-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `country_manager_monthly_reord`
--

CREATE TABLE `country_manager_monthly_reord` (
  `id` int(11) NOT NULL,
  `city_manager_id` int(250) NOT NULL,
  `city_manager_cnic` text NOT NULL,
  `city_manager_name` text NOT NULL,
  `city` text NOT NULL,
  `city_manager_month_Sale` int(250) NOT NULL,
  `date_1` text NOT NULL,
  `date_2` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_manager_monthly_reord`
--

INSERT INTO `country_manager_monthly_reord` (`id`, `city_manager_id`, `city_manager_cnic`, `city_manager_name`, `city`, `city_manager_month_Sale`, `date_1`, `date_2`, `created_at`) VALUES
(1, 1, '11100-5487963-2', 'city_manager', 'Lahore', 400, '2021-08-01', '2021-08-31', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `country_manager_weekly_reord`
--

CREATE TABLE `country_manager_weekly_reord` (
  `id` int(11) NOT NULL,
  `city_manager_id` int(250) NOT NULL,
  `city_manager_cnic` text NOT NULL,
  `city_m_name` text NOT NULL,
  `city` text NOT NULL,
  `city_manager_weekly_sale` int(250) NOT NULL,
  `date_1` text NOT NULL,
  `date_2` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_manager_weekly_reord`
--

INSERT INTO `country_manager_weekly_reord` (`id`, `city_manager_id`, `city_manager_cnic`, `city_m_name`, `city`, `city_manager_weekly_sale`, `date_1`, `date_2`, `created_at`) VALUES
(3, 1, '11100-5487963-2', 'city_manager', 'Lahore', 400, '21-08-19', '21-08-26', '2021-08-26');

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
  `m_sale_price` int(250) DEFAULT NULL,
  `m_total_price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `salesman_id`, `m_id`, `m_name`, `m_qty`, `m_price`, `m_sale_price`, `m_total_price`) VALUES
(8, 2, '121212', 'Acetaminophen', 8, 200, 205, 1600),
(9, 2, '455445', 'Adderall', 17, 30, 32, 510),
(11, 1, '54389', 'Atorvastatin', 500, 15, 18, 7500),
(12, 1, '128564', 'Ibuprofen', 496, 140, 142, 69440);

-- --------------------------------------------------------

--
-- Table structure for table `sales_manager`
--

CREATE TABLE `sales_manager` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cnic` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `branch_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_manager`
--

INSERT INTO `sales_manager` (`id`, `name`, `cnic`, `phone`, `password`, `country`, `city`, `branch_name`) VALUES
(2, 'ijal', '12345-12345678-4', '123456789', '25d55ad283aa400af464c76d713c07ad', 'pakistan', 'karachi', 'Gulberg'),
(3, 'test', '12345-543216-7', '12345678', '25d55ad283aa400af464c76d713c07ad', 'pakistan', 'lahore', 'Gulberg'),
(6, 'ali', '2345345345234', '123456789', '25d55ad283aa400af464c76d713c07ad', 'pakistan', 'karachi', 'behriatown');

-- --------------------------------------------------------

--
-- Table structure for table `sales_medicine`
--

CREATE TABLE `sales_medicine` (
  `id` int(11) NOT NULL,
  `sm_name` text NOT NULL,
  `sm_price` int(250) NOT NULL,
  `sm_sale_price` int(250) DEFAULT NULL,
  `sm_qty` int(250) NOT NULL,
  `sm_id` int(250) NOT NULL,
  `salesman_id` int(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_medicine`
--

INSERT INTO `sales_medicine` (`id`, `sm_name`, `sm_price`, `sm_sale_price`, `sm_qty`, `sm_id`, `salesman_id`, `created_at`) VALUES
(25, 'Atorvastatin', 0, NULL, 0, 54389, 2, '2021-09-15'),
(27, 'Ibuprofen', 284, NULL, 2, 128564, 1, '2021-09-16');

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
(19, 'Atorvastatin', 2, 36, 54389, 1, 25, '2021-09-15');

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
  `country` text NOT NULL,
  `password` text NOT NULL,
  `city` text NOT NULL,
  `branch_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`id`, `name`, `email`, `cnic`, `phone`, `country`, `password`, `city`, `branch_name`) VALUES
(1, 'ijal', 'a@a.com', '33521-5487888-2', '0305-4568999', 'pakistan', '25d55ad283aa400af464c76d713c07ad', 'Lahore', 'Gulberg'),
(5, 'zain', 'z@z.com', '12344-55555-4', '123465987', 'pakistan', '25d55ad283aa400af464c76d713c07ad', 'faisalabad', 'Gulberg');

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
(1, 'ijal', 400, '12345-12345678-4', 2, 1, '2021-08-10');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceo`
--
ALTER TABLE `ceo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_manager`
--
ALTER TABLE `city_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_manager_monthly_record`
--
ALTER TABLE `city_manager_monthly_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_manager_record`
--
ALTER TABLE `city_manager_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_manager_weekly_record`
--
ALTER TABLE `city_manager_weekly_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_manager`
--
ALTER TABLE `country_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_manager_daily_reord`
--
ALTER TABLE `country_manager_daily_reord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_manager_monthly_reord`
--
ALTER TABLE `country_manager_monthly_reord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_manager_weekly_reord`
--
ALTER TABLE `country_manager_weekly_reord`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ceo`
--
ALTER TABLE `ceo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city_manager`
--
ALTER TABLE `city_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_manager_monthly_record`
--
ALTER TABLE `city_manager_monthly_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_manager_record`
--
ALTER TABLE `city_manager_record`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city_manager_weekly_record`
--
ALTER TABLE `city_manager_weekly_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_manager`
--
ALTER TABLE `country_manager`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country_manager_daily_reord`
--
ALTER TABLE `country_manager_daily_reord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country_manager_monthly_reord`
--
ALTER TABLE `country_manager_monthly_reord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_manager_weekly_reord`
--
ALTER TABLE `country_manager_weekly_reord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_manager`
--
ALTER TABLE `sales_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_medicine`
--
ALTER TABLE `sales_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sales_m_return`
--
ALTER TABLE `sales_m_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `store_manager`
--
ALTER TABLE `store_manager`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
