-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2025 at 04:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int NOT NULL,
  `produk_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `sub_total_harga` int NOT NULL,
  `kode_pembelian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `produk_id`, `jumlah`, `sub_total_harga`, `kode_pembelian`) VALUES
(7, 1, 2, 6000, '20250212162908'),
(8, 1, 1, 3000, '20250213030137'),
(9, 2, 2, 4000, '20250216160821'),
(10, 1, 2, 6000, '20250216160821'),
(11, 1, 2, 6000, '20250216161128'),
(12, 2, 2, 4000, '20250216161128'),
(13, 1, 2, 6000, '20250216161234'),
(14, 2, 2, 4000, '20250216161234'),
(15, 2, 1, 2000, '20250216161346'),
(16, 1, 2, 6000, '20250216161346'),
(17, 3, 1, 4000, '20250217025419'),
(18, 1, 2, 6000, '20250217082633'),
(19, 2, 2, 4000, '20250217082633'),
(20, 3, 2, 8000, '20250217082633');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int NOT NULL,
  `id_produk` int NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_stok`
--

CREATE TABLE `log_stok` (
  `id_log` int NOT NULL,
  `id_produk` int NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_pembelian` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_stok`
--

INSERT INTO `log_stok` (`id_log`, `id_produk`, `keterangan`, `tanggal`, `kode_pembelian`) VALUES
(1, 1, 'stok diubah menjadi 5', '2025-02-12', '20250212162908'),
(2, 1, 'stok diubah menjadi 4', '2025-02-13', '20250213030137'),
(3, 2, 'stok diubah menjadi 2', '2025-02-16', '20250216160821'),
(4, 1, 'stok diubah menjadi 2', '2025-02-16', '20250216160821'),
(5, 1, 'stok diubah menjadi 0', '2025-02-16', '20250216161128'),
(6, 2, 'stok diubah menjadi 0', '2025-02-16', '20250216161128'),
(7, 1, 'stok diubah menjadi -2', '2025-02-16', '20250216161234'),
(8, 2, 'stok diubah menjadi -2', '2025-02-16', '20250216161234'),
(9, 2, 'stok diubah menjadi -3', '2025-02-16', '20250216161346'),
(10, 1, 'stok diubah menjadi -4', '2025-02-16', '20250216161346'),
(11, 3, 'stok diubah menjadi 19', '2025-02-17', '20250217025419'),
(12, 1, 'stok diubah menjadi 18', '2025-02-17', '20250217082633'),
(13, 2, 'stok diubah menjadi 18', '2025-02-17', '20250217082633'),
(14, 3, 'stok diubah menjadi 17', '2025-02-17', '20250217082633'),
(15, 1, 'stok diubah menjadi 8', '2025-02-17', ''),
(16, 1, 'stok diubah menjadi 8', '2025-02-17', '---'),
(17, 1, 'stok diubah menjadi 8', '2025-02-17', '---'),
(18, 1, 'stok diubah menjadi 8', '2025-02-17', '---');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int NOT NULL,
  `harga_jual` int DEFAULT NULL,
  `harga_bayar` int DEFAULT NULL,
  `kembalian` int DEFAULT NULL,
  `kode_pembelian` varchar(150) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `harga_jual`, `harga_bayar`, `kembalian`, `kode_pembelian`, `tanggal_pembelian`, `user_id`) VALUES
(33, 6000, 500000, 494000, '20250212162908', '2025-02-12', 14),
(34, 3000, 500000, 497000, '20250213030137', '2025-02-13', 14),
(35, 10000, 20000, 10000, '20250216160821', '2025-02-16', 14),
(36, 0, 50000, 50000, '20250216160838', '2025-02-16', 14),
(37, 10000, 50000, 40000, '20250216161128', '2025-02-16', 14),
(38, 0, 50000, 50000, '20250216161250', '2025-02-16', 14),
(39, 8000, 20000, 12000, '20250216161346', '2025-02-16', 14),
(40, 4000, 10000, 6000, '20250217025419', '2025-02-17', 11),
(41, 18000, 20000, 2000, '20250217082633', '2025-02-17', 14);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kode_produk` varchar(150) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `stok`, `harga`) VALUES
(1, '11223344', 'kopi susu ', 8, 3000),
(2, '24242424', 'energen', 18, 2000),
(3, '8998667100206', 'paramex', 17, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_temp`, `id_user`, `id_produk`, `jumlah`) VALUES
(1, 9, 1, 2),
(2, 9, 2, 3),
(3, 9, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('petugas','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(11, 'chelsy', 'ffeae4fff153247a64da91d9ba34e44c', 'admin'),
(12, 'desvi', 'ff43ac480a6f27ddbe53e09faed13c2b', 'petugas'),
(13, 'dafin', '2949922502db172fa9ab454a3df0d9cc', 'petugas'),
(14, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_stok`
--
ALTER TABLE `log_stok`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
