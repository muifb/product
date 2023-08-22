-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2023 pada 13.52
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_produksi`
--
CREATE DATABASE IF NOT EXISTS `db_produksi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_produksi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_batch`
--

CREATE TABLE `tb_batch` (
  `id_batch` int(11) NOT NULL,
  `nm_batch` varchar(255) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `id_product` varchar(16) NOT NULL,
  `tgl_cetak` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_post` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_batch`
--

INSERT INTO `tb_batch` (`id_batch`, `nm_batch`, `id_shift`, `nik`, `id_product`, `tgl_cetak`, `is_post`) VALUES
(37, 'K00000001', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(38, 'K00000002', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(39, 'K00000003', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(40, 'K00000004', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(41, 'K00000005', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(42, 'K00000006', 3, 202211222, '2001000238', '2023-08-21 12:24:41', 2),
(43, 'K00000007', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2),
(44, 'K00000008', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2),
(45, 'K00000009', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2),
(46, 'K00000010', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2),
(47, 'K00000011', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2),
(48, 'K00000012', 7, 202211224, '2001000225', '2023-08-22 15:51:01', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_losttime`
--

CREATE TABLE `tb_losttime` (
  `id_lost` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `kel_shift` varchar(50) NOT NULL,
  `kategori_lt` varchar(100) NOT NULL,
  `tgl_lostime` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `sebab_lt` varchar(100) NOT NULL,
  `jenis_lostime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_losttime`
--

INSERT INTO `tb_losttime` (`id_lost`, `nik`, `kel_shift`, `kategori_lt`, `tgl_lostime`, `jam_mulai`, `jam_selesai`, `sebab_lt`, `jenis_lostime`) VALUES
(1, 20221121, '1C', 'LOST TIME MAINTENANCE', '2023-08-09', '09:20:00', '10:10:00', 'Perbaikan mesin', 'Breakdown mechanical'),
(2, 20221122, '2B', 'LOST TIME PRODUKSI', '2023-08-08', '08:00:00', '09:00:00', 'CHANGE OVER JOB', 'CHANGE OVER JOB PRODUCT'),
(3, 20221124, '3B', 'LOST TIME PRODUKSI', '2023-08-10', '11:00:00', '11:30:00', 'Kertas putus', 'JOINT MATERIAL'),
(4, 20221125, '1A', 'LOST TIME MAINTENANCE', '2023-08-09', '15:00:00', '18:00:00', 'LISTRIK PADAM', 'PLN'),
(5, 20221127, '2B', 'LOST TIME PRODUKSI', '2023-08-10', '08:40:00', '09:50:00', 'NO MATERIAL NUNGGU TURUN JR', 'NO MATERIAL'),
(6, 20221128, '3C', 'LOST TIME PRODUKSI', '2023-08-10', '11:20:00', '11:50:00', 'NO MATERIAL NUNGGU TURUN JR', 'NO MATERIAL'),
(7, 20221129, '3A', 'LOST TIME MAINTENANCE', '2023-08-11', '09:20:00', '11:50:00', 'Baut Shaft unwinder pecah perbaikan by mtc', 'Mechanical Breakdown Maintenance'),
(8, 20221130, '1B', 'LOST TIME PRODUKSI', '2023-08-01', '09:40:00', '10:20:00', 'Nunggu hasil Moisture content ', 'NO MATERIAL'),
(9, 20221131, '2C', 'LOST TIME PRODUKSI', '2023-08-02', '13:40:00', '14:00:00', 'GANTI JR', 'CHANGE JR/MATERIAL'),
(10, 20221229, '3A', 'LOST TIME MAINTENANCE', '2023-08-12', '08:20:00', '10:50:00', 'Piston rewinder tidak berfungsi perbaikan by mtc', 'Electrical Breakdown Maintenance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` varchar(16) NOT NULL,
  `nm_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `nm_product`) VALUES
('2001000211', 'BRIGHT SLVR 12 MIC 30 GSM-1050 SLIT 10 KDS'),
('2001000212', 'BRIGHT SLVR 12 MIC 30 GSM-1075 SLIT 10 KDS'),
('2001000213', 'BRIGHT SLVR 6.5 MIC 30 GSM-1130 SLIT 7 KDS'),
('2001000217', 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 10 KDS'),
('2001000225', 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 10 KDS'),
('2001000226', 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 10 KDS'),
('2001000227', 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 7 KDS'),
('2001000230', 'BRIGHT RED 9 Mic 30 GSM SLIT 10 KDS'),
('2001000238', 'BRIGHT RED 12 Mic 30 GSM SLIT 7 KDS'),
('2001000239', 'BRIGHT RED 12 Mic 30 GSM SLIT 10 KDS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_report`
--

CREATE TABLE `tb_report` (
  `id_report` int(11) NOT NULL,
  `nm_batch` varchar(255) NOT NULL,
  `material` varchar(25) NOT NULL,
  `mulai_pro` datetime NOT NULL,
  `selesai_pro` datetime NOT NULL,
  `status_pro` varchar(25) NOT NULL,
  `angka` int(11) NOT NULL,
  `kat_defect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_report`
--

INSERT INTO `tb_report` (`id_report`, `nm_batch`, `material`, `mulai_pro`, `selesai_pro`, `status_pro`, `angka`, `kat_defect`) VALUES
(31, 'K00000001', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'OK', 2, 'Defect'),
(32, 'K00000002', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'NC', 2, 'Trim'),
(33, 'K00000003', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'OK', 2, 'Defect'),
(34, 'K00000004', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'OK', 2, 'Startup'),
(35, 'K00000005', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'OK', 2, 'Defect'),
(36, 'K00000006', '321-000025', '2023-08-21 12:28:37', '2023-08-21 16:28:37', 'Reject', 2, 'Material'),
(37, 'K00000007', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect'),
(38, 'K00000008', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect'),
(39, 'K00000009', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect'),
(40, 'K00000010', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect'),
(41, 'K00000011', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect'),
(42, 'K00000012', '321-000025', '2023-08-22 15:51:22', '2023-08-22 17:51:22', 'NC', 2, 'Defect');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_shift`
--

CREATE TABLE `tb_shift` (
  `id_shift` int(11) NOT NULL,
  `kel_shift` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_shift`
--

INSERT INTO `tb_shift` (`id_shift`, `kel_shift`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C'),
(4, '2A'),
(5, '2B'),
(6, '2C'),
(7, '3A'),
(8, '3B'),
(9, '3C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` int(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nik`, `nama`, `alamat`) VALUES
(202211222, 'Octavia Hurley', '710-1247 Diam. Av.'),
(202211223, 'Hashim Nash', 'Ap #803-3522 Lorem St.'),
(202211224, 'Alexander Stein', '745-2151 Aliquam Av.'),
(202211225, 'Moses Faulkner', 'P.O. Box 958, 6840 Lacus. Street');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vismen`
--

CREATE TABLE `tb_vismen` (
  `id_product` int(27) NOT NULL,
  `nm_product` varchar(191) NOT NULL,
  `panjang_qty` varchar(27) NOT NULL,
  `qty_palet` int(11) NOT NULL,
  `mesin` varchar(30) NOT NULL,
  `start_produksi` datetime NOT NULL,
  `finish_produksi` datetime NOT NULL,
  `est_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_vismen`
--

INSERT INTO `tb_vismen` (`id_product`, `nm_product`, `panjang_qty`, `qty_palet`, `mesin`, `start_produksi`, `finish_produksi`, `est_pengiriman`) VALUES
(2001000217, 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 10 KDS', '186', 17, 'SLITTING 7', '2023-08-22 15:49:00', '2023-08-25 15:49:00', '2023-08-30'),
(2001000225, 'DG MATTE GOLD 6.5 MIC 30 GSM SLIT 10 KDS', '372', 34, 'SLITTING 10', '2023-08-21 01:43:00', '2023-08-25 15:49:00', '2023-08-31'),
(2001000230, 'BRIGHT RED 9 Mic 30 GSM SLIT 10 KDS', '186', 16, 'SLITTING 7', '2023-08-21 11:27:00', '2023-08-24 11:27:00', '2023-08-31'),
(2001000238, 'BRIGHT RED 12 Mic 30 GSM SLIT 7 KDS', '203', 33, 'SLITTING 7', '2023-08-21 10:59:00', '2023-08-24 11:36:00', '2023-08-21'),
(2001000239, 'BRIGHT RED 12 Mic 30 GSM SLIT 10 KDS', '272', 33, 'SLITTING 10', '2023-08-23 11:00:00', '2023-08-26 11:21:00', '2023-09-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_batch`
--
ALTER TABLE `tb_batch`
  ADD PRIMARY KEY (`id_batch`);

--
-- Indeks untuk tabel `tb_losttime`
--
ALTER TABLE `tb_losttime`
  ADD PRIMARY KEY (`id_lost`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indeks untuk tabel `tb_shift`
--
ALTER TABLE `tb_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_vismen`
--
ALTER TABLE `tb_vismen`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_batch`
--
ALTER TABLE `tb_batch`
  MODIFY `id_batch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_losttime`
--
ALTER TABLE `tb_losttime`
  MODIFY `id_lost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
