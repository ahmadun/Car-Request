-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2023 pada 02.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_request`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `alasan` varchar(1000) NOT NULL,
  `keberangkatan` varchar(200) NOT NULL,
  `status_manager` varchar(100) DEFAULT NULL,
  `status_ga` varchar(100) DEFAULT NULL,
  `status_adm` varchar(100) DEFAULT NULL,
  `notif_manager` int(11) NOT NULL DEFAULT 0,
  `notif_ga` int(11) NOT NULL DEFAULT 0,
  `notif_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_data`, `nik`, `nama`, `section`, `posisi`, `tujuan`, `alasan`, `keberangkatan`, `status_manager`, `status_ga`, `status_adm`, `notif_manager`, `notif_ga`, `notif_admin`) VALUES
(159, '211221', 'dia', 'QC', 'karyawan', 'pl', 'we', '17:06', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(160, '211221', 'dia', 'QC', 'karyawan', 'pl', 'we', '17:06', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(161, '522125', 'Nur Aini', 'Assy', 'karyawan', 'ko', 'kl', '09:06', 'Ditolak', 'Ditolak', NULL, 1, 1, 0),
(162, '12221', 'asih', 'CC', 'manager', 'plan 3', 'we', '22:33', NULL, 'Diterima', NULL, 1, 1, 0),
(163, '12221', 'asih', 'CC', 'manager', 'aac', 'op', '18:34', NULL, 'Diterima', NULL, 1, 1, 0),
(164, '1256', 'sa', 'CC', 'manager', 'huj', 'sd', '19:34', NULL, 'Diterima', NULL, 1, 1, 0),
(165, '522125', 'Nur Aini', 'Assy', 'karyawan', 'plan 3', 'we', '13:41', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(166, '522125', 'Nur Aini', 'Assy', 'karyawan', 'plan 3', 'we', '13:41', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(167, '522125', 'Nur Aini', 'Assy', 'karyawan', '12', 'op', '13:52', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(168, '16655', 'uji', 'Assy', 'manager', 'plan 3', 'control', '14:24', NULL, 'Diterima', NULL, 1, 1, 0),
(169, '522125', 'Nur Aini', 'Assy', 'karyawan', 'plan 3', 'dw', '16:25', 'Ditolak', 'Ditolak', NULL, 1, 1, 0),
(170, '522125', 'Nur Aini', 'Assy', 'karyawan', 'plan 3', 'produksi', '16:27', 'Diterima', 'Diterima', NULL, 1, 1, 0),
(171, '12221', 'asih', 'CC', 'manager', 'plan 3', 'meeting', '18:29', NULL, 'Diterima', NULL, 1, 1, 0),
(172, '522125', 'Nur Aini', 'Assy', 'karyawan', 'plan 3', 'produksi', '09:51', 'Ditolak', NULL, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(200) NOT NULL,
  `plan1` varchar(200) NOT NULL,
  `plan3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `plan1`, `plan3`) VALUES
(6, '07:15', '07:30'),
(7, '08:45', '09:00'),
(8, '09:45', '10:00'),
(9, '10:45', '11:00'),
(10, '11:45', '12:00'),
(11, '11:30  ', '11:45 '),
(12, '13:00', '13:15'),
(13, '13:10', '13:25'),
(14, '14:00', '14:15'),
(15, '15:00', '15:15'),
(16, '16:00', '16:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kar` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kar`, `nik`, `nama`, `section`, `posisi`) VALUES
(1, '12221', 'asih', 'CC', 'manager'),
(13, '522125', 'Nur Aini', 'Assy', 'karyawan'),
(14, '522134', 'Indah', 'Assy', 'karyawan'),
(15, '111111', 'saya', 'CC', 'manager'),
(18, '12213', 'imah', 'TC', 'karyawan'),
(20, '211221', 'dian putri', 'QC', 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `hak_akses`) VALUES
(23, 'Nur Aini', 'ainirahayuputri@gmail.com', 'sumitomo', 'admin', '276563'),
(24, 'asmuin', 'asmuin@gmail.com', 'sumitomo', 'manager'),
(25, 'GA sumitomo', 'GASumitomo@gmail.com', 'sumitomo', 'GA'),
(26, 'security', 'securitysws@gmail.com', 'sumitomo', 'security'),
(27, 'incharge2', 'incharge@gmail.com', 'sumitomo', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kar`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
