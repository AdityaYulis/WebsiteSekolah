-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 02:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `keterangan`, `gambar`, `created_at`, `updated_at`, `created_by`) VALUES
(6, 'Libur Hari Pahlawan 10 November', '<p>10 november mempringati hari pahlawan</p>', 'informasi1639818023.png', '2021-12-12 16:49:27', '2021-12-18 16:04:01', 7),
(7, 'Libur Rapat Guru', '<p>Libur karena rapat guru 22 juni 2022</p>', 'informasi1639818073.png', '2021-12-18 09:01:13', '2021-12-18 16:03:34', 7),
(8, 'Libur Hari Raya Idul Fitri', '<p>10 juni 2022 - 20 juni 2022</p>', 'informasi1639818134.png', '2021-12-18 09:02:14', '2021-12-18 16:03:11', 7),
(9, 'Libur Hari Raya Natal', '<p>tanggal 25 Desember 2022</p>', 'informasi1639818164.png', '2021-12-18 09:02:44', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `matapelajaran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `matapelajaran`, `keterangan`, `file`, `created_at`, `updated_at`) VALUES
(16, 'IPA', '<p><strong>Materi Ilmu Pengetahuan Alam</strong></p>', 'materi1639294628.pdf', '2021-12-12 07:37:08', '2021-12-13 00:07:05'),
(17, 'Halo', ' halo menn ', 'materi1639297224.png', '2021-12-12 07:46:37', '2021-12-12 15:25:27'),
(24, 'Sistem Operasi', ' Bab 1', 'materi1643288407.pdf', '2022-01-27 13:00:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `tentang_sekolah` text NOT NULL,
  `foto_sekolah` varchar(50) NOT NULL,
  `google_maps` text NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `foto_kepsek` varchar(50) NOT NULL,
  `sambutan_kepsek` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `email`, `telepon`, `alamat`, `logo`, `favicon`, `tentang_sekolah`, `foto_sekolah`, `google_maps`, `nama_kepsek`, `foto_kepsek`, `sambutan_kepsek`, `created_at`, `updated_at`) VALUES
(1, 'SMP TARUNA IDAMAN ', 'tarunaidaman_juniorhighsch@sch.id', '02745568912', 'Jl. Raya Gandul No.4', 'logo-sekolah.png', 'favicon1639460500.png', '<p>ekekekkeke</p>', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.4298051052197!2d110.66867241489398!3d-7.744151978919444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a47a9b3cf5f6d%3A0x14a3aad7d6fce6a7!2sSMP%20Negeri%201%20Trucuk!5e0!3m2!1sid!2sid!4v1643280718040!5m2!1sid!2sid', 'Bambang Lenendra, S.pd, M.Si, Ph.D', 'kepsek1639479579.png', 'Halo gais, rene daftar ben dadi idamanmu', '2021-12-13 13:31:42', '2022-01-27 17:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','Guru') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Rais Jaya', 'adminahmad', '202cb962ac59075b964b07152d234b70', 'Admin', '2021-12-08 14:27:22', '2022-01-27 19:58:21'),
(5, 'Teuku M Dista', 'admindista', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2021-12-08 14:28:38', '2021-12-08 15:27:56'),
(6, 'Aditya Yulis K', 'adminadit', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2021-12-08 14:29:27', '2021-12-08 15:28:56'),
(7, 'Bambang L', 'guru1', '25d55ad283aa400af464c76d713c07ad', 'Guru', '2021-12-08 14:30:13', '2021-12-08 15:29:41'),
(8, 'Sri Indah', 'guru2', '25d55ad283aa400af464c76d713c07ad', 'Guru', '2021-12-09 12:22:06', '2021-12-09 13:20:08'),
(9, 'Siti Muniati', 'guru4', '25d55ad283aa400af464c76d713c07ad', 'Guru', '2021-12-09 12:22:06', '2021-12-12 15:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(19, '<p>Juara 1 Basket Tingkat Nasional</p>', 'prestasi1639813452.png', '2021-12-12 16:16:21', '2021-12-18 15:18:31'),
(20, '<p>Juara 1 Berenang Tingkat Nasional</p>', 'prestasi1639813462.png', '2021-12-12 16:16:30', '2021-12-18 15:19:30'),
(21, '<p>Juara 1 Lari Tingkat Nasional</p>', 'prestasi1639813477.png', '2021-12-18 07:14:27', '2021-12-18 15:20:10'),
(23, '<p>Juara 1 Taekwondo Tingkat Nasional</p>', 'prestasi1639813487.png', '2021-12-18 07:18:17', '2021-12-18 15:20:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
