-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2021 at 07:29 PM
-- Server version: 10.5.9-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KP_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_pinjam`
--

CREATE TABLE `log_pinjam` (
  `id_log` int(11) NOT NULL,
  `no_induk` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_buku` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sirkulasi` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `no_induk` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`no_induk`, `nama`, `id_kelas`, `jenis_kelamin`) VALUES
('ID-DM0005', 'surti mas', 4, 'Laki-Laki'),
('ID-DM0006', 'mas wahid update lee', 1, 'Laki-Laki'),
('ID-DM0007', 'data baru edit', 3, 'Laki-Laki'),
('ID-DM0008', 'input korban baru', 3, 'Laki-Laki'),
('ID-DM0009', 'cek data baru', 2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` enum('hibah','pembelian') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `isbn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `kategori`, `tahun_terbit`, `jumlah`, `isbn`) VALUES
('ID-BK0003', 'cara menyelam minum air', 'itu dia ', 'nah pbe', 'pembelian', '2001', 0, '1129922'),
('ID-BK0004', 'tambahana data baru yang contohnya', 'amburadul al karu', 'al karu corp', 'pembelian', '1993', 2, '9093211'),
('ID-BK0005', 'Teknik stek tanaman', 'ahmad pupuk', 'pupuk kimia', 'pembelian', '2005', 12, '222213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C'),
(4, '1D'),
(5, '1E');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `keperluan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkulasi`
--

CREATE TABLE `tb_sirkulasi` (
  `id_sirkulasi` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_buku` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_induk` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(3, 'ini gua asli', 'tes', 'tes', 'admin'),
(4, 'arnold yess', 'arnold', '123', 'admin'),
(5, 'Bukan Admin', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_sirkulasi` (`id_sirkulasi`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD PRIMARY KEY (`id_sirkulasi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD CONSTRAINT `log_pinjam_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `tb_anggota` (`no_induk`),
  ADD CONSTRAINT `log_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`),
  ADD CONSTRAINT `log_pinjam_ibfk_3` FOREIGN KEY (`id_sirkulasi`) REFERENCES `tb_sirkulasi` (`id_sirkulasi`);

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD CONSTRAINT `tb_pengunjung_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD CONSTRAINT `tb_sirkulasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`),
  ADD CONSTRAINT `tb_sirkulasi_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `tb_anggota` (`no_induk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
