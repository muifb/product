-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2023 pada 07.00
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_losttime`
--

CREATE TABLE `tb_losttime` (
  `id_lost` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `kel_shift` varchar(50) NOT NULL,
  `kategori_lt` varchar(100) NOT NULL,
  `tgl_lost` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `sebab_lt` varchar(100) NOT NULL,
  `jenis_lt` varchar(100) NOT NULL,
  `selisih_menit` int(11) DEFAULT NULL,
  `selisih_jam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `material_numb` varchar(191) DEFAULT NULL,
  `customer` varchar(191) DEFAULT NULL,
  `start_produksi` datetime NOT NULL,
  `finish_produksi` datetime NOT NULL,
  `est_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_vismen`
--

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
  MODIFY `id_batch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_losttime`
--
ALTER TABLE `tb_losttime`
  MODIFY `id_lost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
