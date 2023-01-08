-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 01:02 PM
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
-- Table structure for table `mesin_jersey`
--

CREATE TABLE `mesin_jersey` (
  `id` int(12) NOT NULL,
  `NO` int(12) DEFAULT NULL,
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

INSERT INTO `mesin_jersey` (`id`, `NO`, `no_rata`, `desain`, `print`, `cutting`, `press`, `jahit`, `overdeck`, `obras`, `qc`, `total_cutting`, `total_qc`, `waktu_total`) VALUES
(16, 1, 9, '30,5', '5,9', '4,8', '1,25', '5,42', '6,2', '8,02', '4,89', '688.99999999', '741.99999998', '1429159'),
(17, 2, 9, '27,6', '7,3', '3,9', '1,25', '9,6', '5,1', '7,3', '5,51', NULL, NULL, NULL),
(18, 3, 9, '34,25', '6,25', '5,7', '1,25', '7,27', '6,15', '5,11', '5,77', NULL, NULL, NULL),
(19, 4, 9, '29,6', '4,75', '4,4', '1,25', '7,52', '7,25', '5,14', '5,12', NULL, NULL, NULL),
(20, 5, 9, '31,35', '8,63', '6,27', '1,25', '8,2', '7', '7,05', '5,65', NULL, NULL, NULL),
(21, 6, 9, '25,4', '5,5', '5,73', '1,25', '5,67', '8,32', '8,22', '5,34', NULL, NULL, NULL),
(22, 7, 9, '37,5', '4,1', '3,27', '1,25', '6,77', '5,1', '5,43', '4,92', NULL, NULL, NULL),
(23, 8, 9, '28,55', '7,9\n', '4,77\n', '1,25\n', '8,46\n', '6,23\n', '6,1\n', '5,4\n', NULL, NULL, NULL),
(25, 9, 9, '32,82', '6,6', '5,5', '1,25', '5,81', '8,66', '7,12', '4,93', '51.999999999', '55.999999999', '10612');

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
(9, 'order 1', 'alfa', 'dikcab', '2023-01-04', 'lunas', 'jersey', 12, 'milano', '7', '6');

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
  `jumlah_produk` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `id_bahan`, `tanggal_order`, `no_po`, `invoice_po`, `customer`, `tema_design`, `jumlah_pesanan`, `produk`, `bahan`, `jumlah_produk`) VALUES
(12, 2, '2022-12-26', 12, '12', 'alfa', 'kpop', 12, '12', '2', 12),
(13, 4, '2022-12-26', 13, '13', 'alfarisy', '13', 13, '13', '4', 13);

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
(11, 9, '30.333333333', '5.7777777777', '4.3333333333', '1', '6.6666666666', '6.4444444444', '6.4444444444', '4.6666666666');

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
(6, 'gudang', 'gudang@mail.com', 'gudang', '$2y$10$nbNMa3JN86HTlc4PUnHAPuoRARjSKRleDcMXWoYr9FaFRyBLSsK.G', 'bandung barat', 'gudang'),
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
-- Indexes for table `mesin_jersey`
--
ALTER TABLE `mesin_jersey`
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
-- AUTO_INCREMENT for table `mesin_jersey`
--
ALTER TABLE `mesin_jersey`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rata_mesin_jersey`
--
ALTER TABLE `rata_mesin_jersey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
