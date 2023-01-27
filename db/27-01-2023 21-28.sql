-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 03:27 PM
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
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(36) DEFAULT NULL,
  `jumlah` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama_bahan`, `jumlah`) VALUES
(2, 'NIKI BINTIK ( P )', '8.6875'),
(4, 'NIKI BINTIK ( S )', '3.7375');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekap`
--

CREATE TABLE `data_rekap` (
  `NO` int(11) NOT NULL,
  `TEMA_DESIGN` varchar(512) DEFAULT NULL,
  `JUMLAH_PESANAN` int(11) DEFAULT NULL,
  `PRODUK` varchar(512) DEFAULT NULL,
  `BAHAN` varchar(512) DEFAULT NULL,
  `JUMLAH_PRODUK` int(11) DEFAULT NULL,
  `DATELINE` varchar(512) DEFAULT NULL,
  `FINISHING` varchar(512) DEFAULT NULL,
  `STATUS` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekap`
--

INSERT INTO `data_rekap` (`NO`, `TEMA_DESIGN`, `JUMLAH_PESANAN`, `PRODUK`, `BAHAN`, `JUMLAH_PRODUK`, `DATELINE`, `FINISHING`, `STATUS`) VALUES
(1, '6332_BANG RACHMAN DIKCAB (DONNY-DIAN)(TOMKET)', 159, 'JERSEY', 'MILANO', 159, '3/7/21', '3/6/21', 'Tepat Waktu'),
(2, '6333_PO LETDA GANI ARTA DADU 3121-2 (DANI)', 68, 'JERSEY', 'POLYMESS', 68, '13/3/2021', '3/12/21', 'Tepat Waktu'),
(3, 'ENLISTED', 70, 'JERSEY', 'BILABONG', 70, '3/9/21', '14/3/2021', 'Terlambat'),
(4, '6345_PO BANG TIRTA (DONNY)(TOMKET)', 90, 'JAKET', 'LOTTO', 90, '3/12/21', '3/14/21', 'Terlambat'),
(5, '6342_PO BANG ANDRIS_MARINE2_OGI (TOMKET)', 8, 'JERSEY', 'LYCRA', 8, '3/3/21', '3/3/21', 'Tepat Waktu'),
(6, 'SHARK TEAM', 70, 'JERSEY', 'MILANO', 70, '3/9/21', '3/5/21', 'Tepat Waktu'),
(7, '6350_PO BANG ANGGA_PASPAMPRESS 3(MADI)(TOMKET)', 9, 'JERSEY', 'POLYMESS', 9, '3/11/21', '3/8/21', 'Tepat Waktu'),
(8, '6351_PO BANG IKO(madi)(TOMKET)', 2, 'JERSEY', 'BILABONG', 2, '3/12/21', '3/13/21', 'Terlambat'),
(9, '6352_PO BAPA AGAN_MUTIARA STREET STELL (SABLON)', 12, 'JERSEY', 'LYCRA', 12, '3/10/21', '3/11/21', 'Terlambat');

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
(29, '2021-03-01', 'Order 1', '0', '251.62', '301.31', '587.11', '940.62', '251.62', '301.31', '587.11', '940.62', '1203.37', '5', '7', '-2', '0'),
(31, '2021-03-01', 'Order 3', '251.62', '301.31', '587.11', '940.62', '1203.37', '362.4', '323.19', '712.94', '1096.25', '1319.05', '5', '9', '-4', '0'),
(32, '2021-03-01', 'Order 2', '362.4', '323.19', '712.94', '1096.25', '1319.05', '470.01', '344.44', '835.17000000', '1247.44', '1431.42', '5', '13', '-8', '0'),
(33, '2021-03-02', 'Order 4', '0', '107.61', '128.86', '251.09000000', '402.28000000', '107.61', '128.86', '251.09000000', '402.28000000', '514.65000000', '4', '2', '2', '2'),
(39, '2021-03-02', 'Order 6', '107.61', '128.86', '251.09000000', '402.28000000', '514.65000000', '218.39', '150.74', '376.92', '557.91', '630.32999999', '2.79', '8', '-5.21', '0'),
(41, '2021-03-02', 'Order 5', '218.39', '150.74', '376.92', '557.91', '630.32999999', '360.82', '178.87', '538.7', '758.01', '779.05999999', '2.84', '11', '-8.16', '0'),
(42, '2021-03-03', 'Order 9', '0', '18.99', '22.74', '44.31', '70.990000000', '18.99', '22.74', '44.31', '70.990000000', '90.820000000', '0.42', '8', '-7.58', '0'),
(43, '2021-03-03', 'Order 7', '18.99', '22.74', '44.31', '70.990000000', '90.820000000', '33.23', '25.549999999', '60.49', '91', '105.69', '0.46', '9', '-8.54', '0'),
(44, '2021-03-03', 'Order 8', '33.23', '25.549999999', '60.49', '91', '105.69', '36.4', '26.179999999', '64.09', '95.45', '109', '0.40', '10', '-9.6', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mesin_jaket`
--

CREATE TABLE `mesin_jaket` (
  `id` int(12) NOT NULL,
  `NO` int(12) DEFAULT NULL,
  `urutan_order` varchar(12) DEFAULT NULL,
  `no_rata` int(12) DEFAULT NULL,
  `desain` varchar(12) DEFAULT NULL,
  `print` varchar(12) DEFAULT NULL,
  `cutting` varchar(12) DEFAULT NULL,
  `press` varchar(12) DEFAULT NULL,
  `jahit` varchar(12) DEFAULT NULL,
  `overdeck` varchar(12) DEFAULT NULL,
  `obras` varchar(12) DEFAULT NULL,
  `qc` varchar(12) DEFAULT NULL,
  `total_cutting` varchar(12) DEFAULT NULL,
  `total_qc` varchar(12) DEFAULT NULL,
  `waktu_total` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin_jaket`
--

INSERT INTO `mesin_jaket` (`id`, `NO`, `urutan_order`, `no_rata`, `desain`, `print`, `cutting`, `press`, `jahit`, `overdeck`, `obras`, `qc`, `total_cutting`, `total_qc`, `waktu_total`) VALUES
(1, 1, 'order 1', 10, '31.5', '6.9', '6.57', '1.25', '7.52', '6.2', '8.02', '5.32', NULL, NULL, NULL),
(2, 2, 'order 2', 10, '29.6', '7.23', '5.81', '1.25', '8.6', '7.1', '5.3', '5.61', NULL, NULL, NULL),
(3, 3, 'order 3', 10, '37.25', '6.33', '6.32', '1.25', '6.27', '5.15', '5.11', '5.27', NULL, NULL, NULL),
(4, 4, 'order 4', 10, '30.32', '5.8', '5.47', '1.25', '8.62', '6.25', '7.14', '5.72', '568.59999999', '484.99999999', '2898.00'),
(5, 5, 'order 5', 10, '29.3', '7.53', '7.27', '1.25', '5.2', '7', '5.05', '5.75', NULL, NULL, NULL),
(6, 6, 'order 6', 10, '30.77', '6.27', '6.53', '1.25', '7.67', '7.32', '722', '5.3', NULL, NULL, NULL),
(7, 7, 'order 7', 10, '39.5', '5.14', '6.58', '1.25', '6.78', '6.1', '6.43', '5.2', NULL, NULL, NULL),
(8, 8, 'order 8', 10, '30.23', '7.57', '6.77', '1.25', '5.46', '6.23', '7.1', '5.4', NULL, NULL, NULL),
(14, 9, 'order 9', 10, '31.32', '6.37', '5.54', '1.25', '6.81', '5.66', '29.12', '4.93', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesin_jersey`
--

CREATE TABLE `mesin_jersey` (
  `id` int(12) NOT NULL,
  `NO` int(12) DEFAULT NULL,
  `urutan_order` varchar(12) DEFAULT NULL,
  `no_rata` int(12) DEFAULT NULL,
  `desain` varchar(121) DEFAULT NULL,
  `print` varchar(12) DEFAULT NULL,
  `cutting` varchar(12) DEFAULT NULL,
  `press` varchar(12) DEFAULT NULL,
  `jahit` varchar(12) DEFAULT NULL,
  `overdeck` varchar(12) DEFAULT NULL,
  `obras` varchar(12) DEFAULT NULL,
  `qc` varchar(12) DEFAULT NULL,
  `total_cutting` varchar(12) DEFAULT NULL,
  `total_qc` varchar(12) DEFAULT NULL,
  `waktu_total` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin_jersey`
--

INSERT INTO `mesin_jersey` (`id`, `NO`, `urutan_order`, `no_rata`, `desain`, `print`, `cutting`, `press`, `jahit`, `overdeck`, `obras`, `qc`, `total_cutting`, `total_qc`, `waktu_total`) VALUES
(16, 1, 'order 1', 9, '30.5', '5.9', '4.8', '1.25', '5.42', '6.2', '8.02', '4.89', '783.33999998', '839.69666666', '1654.23'),
(17, 2, 'order 2', 9, '27.6', '7.3', '3.9', '1.25', '9.6', '5.1', '7.3', '5.51', '335.01333332', '359.11555555', '724.90888888'),
(18, 3, 'order 3', 9, '34.25', '6.25', '5.7', '1.25', '7.27', '6.15', '5.11', '5.77', '344.86666666', '369.67777777', '745.32444443'),
(20, 5, 'order 5', 9, '31.35', '8.63', '6.27', '1.25', '8.2', '7', '7.05', '5.65', '39.413333332', '42.248888888', '112.44222222'),
(21, 6, 'order 6', 9, '25.4', '5.5', '5.73', '1.25', '5.67', '8.32', '8.22', '5.34', '344.86666666', '369.67777777', '745.32444443'),
(22, 7, 'order 7', 9, '37.5', '4.1', '3.27', '1.25', '6.77', '5.1', '5.43', '4.92', '44.339999999', '47.529999999', '122.64999999'),
(23, 8, 'order 8', 9, '28,55', '7.9', '4.77', '1.25', '8.46', '6.23', '6.1', '5.4', '9.8533333332', '10.562222222', '51.195555554'),
(27, 9, 'order 9', 9, '32.82', '6.6', '5.5', '1.25', '5.81', '8.66', '7.12', '4.93', '59.119999999', '63.373333333', '153.27333333'),
(39, 9, 'order 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '492.66666666', '528.11111111', '1051.5577777');

-- --------------------------------------------------------

--
-- Table structure for table `mesin_sorting`
--

CREATE TABLE `mesin_sorting` (
  `id` int(11) NOT NULL,
  `urutan_order` varchar(512) DEFAULT NULL,
  `printer` varchar(12) DEFAULT NULL,
  `press` varchar(12) DEFAULT NULL,
  `jahit` varchar(12) DEFAULT NULL,
  `overdeck` varchar(12) DEFAULT NULL,
  `obras` varchar(12) DEFAULT NULL,
  `dateline` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin_sorting`
--

INSERT INTO `mesin_sorting` (`id`, `urutan_order`, `printer`, `press`, `jahit`, `overdeck`, `obras`, `dateline`) VALUES
(1, 'Order 1', '251.62', '49.69', '285.80', '353.51', '262.75', '7.00'),
(2, 'Order 2', '107.61', '21.25', '122.23', '151.19', '112.37', '13.00'),
(3, 'Order 3', '110.78', '21.88', '125.83', '155.63', '115.68', '9.00'),
(4, 'Order 4', '107.61', '21.25', '122.23', '151.19', '112.37', '2'),
(5, 'Order 5', '142.43', '28.13', '161.78', '200.10', '148.73', '2.00'),
(6, 'Order 6', '110.78', '21.88', '125.83', '155.63', '115.68', '8.00'),
(7, 'Order 7', '14.24', '2.81', '16.18', '20.01', '14.87', '9.00'),
(8, 'Order 8', '3.17', '0.63', '3.60', '4.45', '3.31', '10.00'),
(9, 'Order 9', '18.99', '3.75', '21.57', '26.68', '19.83', '8.00'),
(14, 'order 10', '158.13888888', '31.25', '179.77777777', '166.69444444', '165.24999999', '7');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_bahan`
--

CREATE TABLE `penggunaan_bahan` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `jenis_produk` varchar(36) DEFAULT NULL,
  `nama_bahan` varchar(36) DEFAULT NULL,
  `jumlah_pesanan` int(12) DEFAULT NULL,
  `jumlah_bahan` varchar(11) DEFAULT NULL,
  `total_bahan` varchar(11) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggunaan_bahan`
--

INSERT INTO `penggunaan_bahan` (`id`, `id_bahan`, `jenis_produk`, `nama_bahan`, `jumlah_pesanan`, `jumlah_bahan`, `total_bahan`, `status`) VALUES
(22, 4, 'jersey', '4', 1, '0.25', '0.2625', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(12) NOT NULL,
  `urutan_order` varchar(36) DEFAULT NULL,
  `nama_pelanggan` varchar(36) DEFAULT NULL,
  `tema_desain` varchar(36) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `invoice` varchar(12) DEFAULT NULL,
  `produk` text DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `bahan_baku` text DEFAULT NULL,
  `dateline` varchar(12) DEFAULT NULL,
  `finishing` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `urutan_order`, `nama_pelanggan`, `tema_desain`, `tanggal_pesanan`, `invoice`, `produk`, `jumlah`, `bahan_baku`, `dateline`, `finishing`) VALUES
(10, 'Order 1', 'bang rachman', '6332_BANG RACHMAN DIKCAB (DONNY-DIAN', '2021-03-01', 'lunas', 'jersey', 159, 'MILANO', '7', '5'),
(11, 'Order 2', 'Letda Gani Arta', '6333_PO LETDA GANI ARTA DADU 3121-2 ', '2021-03-01', 'lunas', 'jersey', 68, 'POLYMESS', '12', '6'),
(12, 'Order 3', 'ENLISTED', 'ENLISTED', '2021-03-01', 'lunas', 'jersey', 70, 'BILABONG', '8', '6'),
(13, 'Order 4', 'Bang Tirta', '6345_PO BANG TIRTA (DONNY)(TOMKET)', '2021-03-02', 'lunas', 'jacket', 90, 'LOTTO', '10', '6'),
(14, 'Order 5', 'Bang Andris', '6342_PO BANG ANDRIS_MARINE2_OGI (TOM', '2021-03-02', 'lunas', 'jersey', 8, 'LYCRA', '11', '4.05'),
(15, 'Order 6', 'SHARK TEAM', 'SHARK TEAM', '2021-03-02', 'lunas', 'jersey', 70, 'MILANO', '8', '3'),
(16, 'Order 7', 'Bang Angga', '6350_PO BANG ANGGA_PASPAMPRESS 3(MAD', '2021-03-03', 'lunas', 'jersey', 9, 'POLYMESS', '9', '0'),
(17, 'order 8', 'Bang Iko', '6351_PO BANG IKO(madi)(TOMKET)', '2021-03-03', 'lunas', 'jersey', 2, 'BILABONG', '9', ''),
(18, 'order 9', 'bapa agan ', '6352_PO BAPA AGAN_MUTIARA STREET STE', '2021-03-03', 'lunas', 'jersey', 12, 'LYCRA', '7', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `tanggal_order` date DEFAULT NULL,
  `no_po` int(12) DEFAULT NULL,
  `invoice_po` varchar(20) DEFAULT NULL,
  `customer` varchar(60) DEFAULT NULL,
  `tema_design` text DEFAULT NULL,
  `jumlah_pesanan` int(12) DEFAULT NULL,
  `produk` varchar(12) DEFAULT NULL,
  `bahan` text DEFAULT NULL,
  `jumlah_produk` int(12) DEFAULT NULL,
  `desain` varchar(12) DEFAULT NULL,
  `print` varchar(12) DEFAULT NULL,
  `cutting` varchar(12) DEFAULT NULL,
  `press` varchar(12) DEFAULT NULL,
  `jahit` varchar(12) DEFAULT NULL,
  `overdeck` varchar(12) DEFAULT NULL,
  `obras` varchar(12) DEFAULT NULL,
  `qc` varchar(12) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `id_bahan`, `tanggal_order`, `no_po`, `invoice_po`, `customer`, `tema_design`, `jumlah_pesanan`, `produk`, `bahan`, `jumlah_produk`, `desain`, `print`, `cutting`, `press`, `jahit`, `overdeck`, `obras`, `qc`, `status`) VALUES
(16, 2, '2021-03-01', 6332, '6332', 'bang rachman', '6332_BANG RACHMAN DIKCAB (DONNY-DIAN)(TOMKET)', 159, 'JERSEY', '2', 159, '10', '15', '0', '30', '32', '12', '14', '8', 'Belum Dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `rata_mesin_jersey`
--

CREATE TABLE `rata_mesin_jersey` (
  `id` int(11) NOT NULL,
  `NO` int(12) DEFAULT NULL,
  `desain` varchar(12) DEFAULT NULL,
  `print` varchar(12) DEFAULT NULL,
  `cutting` varchar(12) DEFAULT NULL,
  `press` varchar(12) NOT NULL,
  `jahit` varchar(12) NOT NULL,
  `overdeck` varchar(12) NOT NULL,
  `obras` varchar(12) NOT NULL,
  `qc` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rata_mesin_jersey`
--

INSERT INTO `rata_mesin_jersey` (`id`, `NO`, `desain`, `print`, `cutting`, `press`, `jahit`, `overdeck`, `obras`, `qc`) VALUES
(14, 10, '32.198888888', '6.5711111111', '6.3177777777', '1.25', '6.9922222222', '6.3344444444', '88.363333333', '5.3888888888'),
(15, 9, '30.779999999', '6.3255555555', '4.9266666666', '1.25', '7.1911111111', '6.6677777777', '6.6099999999', '5.2811111111');

-- --------------------------------------------------------

--
-- Table structure for table `status_produksi`
--

CREATE TABLE `status_produksi` (
  `id` int(11) NOT NULL,
  `id_produksi` int(11) DEFAULT NULL,
  `no_po` int(12) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `nama` varchar(36) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jabatan` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `alamat`, `jabatan`) VALUES
(1, 'admin2', 'admin2@mail.com', 'admin', '$2a$04$hywOJEnGI8Ws238bSrM6L.RPlprmjMzIZ5av3raC5EgYuzzf33b9G', 'bandung', 'admin'),
(5, 'mufti', 'cc@mail.com', 'superadmin', '$2y$10$RBBW6DlduY79YJ3ESfeFL.8zZV/Lwo5cxAryCK0OWmPqfU3KXNQ4W', NULL, 'gudang'),
(6, 'gudang', 'gudang@mail.com', 'gudang', '$2y$10$a5EYkR12Q4rBZu4tLU2iZO/YVjU9bl6KU1j.BX0VCVYoejkKy8hdK', 'bandung barat', 'gudang'),
(7, 'kepala produksi', 'kproduksi@mail.c', 'kproduksi', '$2y$10$twfEPegh5bn3o7AUqFgmN.3mMBeGTnp/zhP4voWX4AWHUup9FTM0K', 'bandung', 'kepala_produksi'),
(8, 'oproduksi', 'oproduksi@mail.c', 'oproduksi', '$2y$10$F.sfHpLkQxvP3MI2MT1PNOtxGfTvFWeMAxafsgZu26zG86H6WAlmq', 'soreang', 'operasional_produksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekap`
--
ALTER TABLE `data_rekap`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `estimasi`
--
ALTER TABLE `estimasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin_jaket`
--
ALTER TABLE `mesin_jaket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin_jersey`
--
ALTER TABLE `mesin_jersey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin_sorting`
--
ALTER TABLE `mesin_sorting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rata_mesin_jersey`
--
ALTER TABLE `rata_mesin_jersey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_produksi`
--
ALTER TABLE `status_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estimasi`
--
ALTER TABLE `estimasi`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `mesin_jaket`
--
ALTER TABLE `mesin_jaket`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mesin_jersey`
--
ALTER TABLE `mesin_jersey`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mesin_sorting`
--
ALTER TABLE `mesin_sorting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rata_mesin_jersey`
--
ALTER TABLE `rata_mesin_jersey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status_produksi`
--
ALTER TABLE `status_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
