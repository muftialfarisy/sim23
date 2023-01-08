-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 10:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim23`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimasi`
--

CREATE TABLE `estimasi` (
  `id` int(12) NOT NULL,
  `tanggal_order` date DEFAULT NULL,
  `urutan_order` varchar(12) DEFAULT NULL,
  `print_sebelum` varchar(12) DEFAULT NULL,
  `press_sebelum` varchar(12) DEFAULT NULL,
  `jahit_sebelum` varchar(12) DEFAULT NULL,
  `overdeck_sebelum` varchar(12) DEFAULT NULL,
  `obras_sebelum` varchar(12) DEFAULT NULL,
  `print_sesudah` varchar(12) DEFAULT NULL,
  `press_sesudah` varchar(12) DEFAULT NULL,
  `jahit_sesudah` varchar(12) DEFAULT NULL,
  `overdeck_sesudah` varchar(12) DEFAULT NULL,
  `obras_sesudah` varchar(12) DEFAULT NULL,
  `ci` varchar(12) DEFAULT NULL,
  `dateline` varchar(12) DEFAULT NULL,
  `lateness` varchar(12) DEFAULT NULL,
  `nj` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimasi`
--

INSERT INTO `estimasi` (`id`, `tanggal_order`, `urutan_order`, `print_sebelum`, `press_sebelum`, `jahit_sebelum`, `overdeck_sebelum`, `obras_sebelum`, `print_sesudah`, `press_sesudah`, `jahit_sesudah`, `overdeck_sesudah`, `obras_sesudah`, `ci`, `dateline`, `lateness`, `nj`) VALUES
(1, '2021-03-01', 'order 1', '0', '251.6175', '301.305', '587.1075', '940.6175', '251.6175', '301.305', '587.1075', '940.6175', '1203.365', '', '7', '', ''),
(2, '2021-03-01', 'order 3', '251.6175', '301.305', '587.1075', '940.6175', '1203.365', '362.3925', '323.18', '712.9325', '1096.250833', '1319.04', '', '9', '', ''),
(3, '2021-03-01', 'order 2', '362.3925', '323.18', '712.9325', '1096.250833', '1319.04', '470.0025', '344.43', '835.1625', '1247.4375', '1431.41', '', '13', '', ''),
(4, '2021-03-02', 'order 4', '0', '107.61', '128.86', '251.09', '402.2766667', '107.61', '128.86', '251.09', '402.2766667', '514.6466667', '', '2', '', ''),
(5, '2021-03-02', 'order 6', '107.61', '128.86', '251.09', '402.2766667', '514.6466667', '218.385', '150.735', '376.915', '557.91', '630.3216667', '', '8', '', ''),
(6, '2021-03-02', 'order 5', '218.385', '150.735', '376.915', '557.91', '630.3216667', '360.81', '178.86', '538.69', '758.01', '779.0466667', '', '11', '', ''),
(7, '2021-03-03', 'order 9', '0', '18.99', '22.74', '44.31', '70.99', '18.99', '22.74', '44.31', '70.99', '90.82', '', '8', '', ''),
(8, '2021-03-03', 'order 7', '18.99', '22.74', '44.31', '70.99', '90.82', '33.2325', '25.5525', '60.4875', '91', '105.6925', '', '9', '', ''),
(9, '2021-03-03', 'order 8', '33.2325', '25.5525', '60.4875', '91', '105.6925', '36.3975', '26.1775', '64.0825', '95.44666667', '108.9975', '', '10', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimasi`
--
ALTER TABLE `estimasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimasi`
--
ALTER TABLE `estimasi`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
