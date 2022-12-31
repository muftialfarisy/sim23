-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 03:42 PM
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
  `jumlah` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_bahan`
--

CREATE TABLE `penggunaan_bahan` (
  `id` int(11) NOT NULL,
  `jenis_baju` varchar(36) DEFAULT NULL,
  `nama_bahan` varchar(36) DEFAULT NULL,
  `kg` int(12) DEFAULT NULL,
  `jumlah_baju` int(11) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggunaan_bahan`
--

INSERT INTO `penggunaan_bahan` (`id`, `jenis_baju`, `nama_bahan`, `kg`, `jumlah_baju`, `status`) VALUES
(3, 'jersey', 'niki bintik2', 122, 122, 'pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(12) NOT NULL,
  `nama_pesanan` varchar(36) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `produk` text DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `bahan_baku` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pesanan`, `tanggal_pesanan`, `produk`, `jumlah`, `bahan_baku`) VALUES
(2, 'kain', '2022-12-21', 'jersey', 2, 'kain');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
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

INSERT INTO `produksi` (`id`, `tanggal_order`, `no_po`, `invoice_po`, `customer`, `tema_design`, `jumlah_pesanan`, `produk`, `bahan`, `jumlah_produk`) VALUES
(4, '2022-12-20', 123, '123', '123', '123', 123, '123', '123', 123);

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
(5, 'mufti', 'cc@mail.com', 'superadmin', '$2y$10$RBBW6DlduY79YJ3ESfeFL.8zZV/Lwo5cxAryCK0OWmPqfU3KXNQ4W', NULL, 'gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
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
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
