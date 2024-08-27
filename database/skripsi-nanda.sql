-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jul 2024 pada 16.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-nanda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `configurasi`
--

CREATE TABLE `configurasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria` int(11) NOT NULL,
  `parameter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `configurasi`
--

INSERT INTO `configurasi` (`id`, `kriteria`, `parameter`, `created_at`, `updated_at`) VALUES
(3, 4, 5, '2023-09-28 03:11:36', '2024-07-28 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` char(20) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `bobot_kriteria` decimal(5,2) NOT NULL,
  `jenis_atribut` enum('B','C') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_atribut`, `created_at`, `updated_at`) VALUES
('C1', 'pengetahuan', 30.00, 'B', '2024-07-27 07:08:43', '2024-07-27 07:08:43'),
('C2', 'Keterampilan', 30.00, 'B', '2024-07-27 07:09:00', '2024-07-27 07:09:00'),
('C3', 'sikap', 20.00, 'B', '2024-07-27 07:09:23', '2024-07-27 07:09:23'),
('C4', 'Absensi', 20.00, 'C', '2024-07-27 11:51:42', '2024-07-27 22:51:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter`
--

CREATE TABLE `parameter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` char(20) NOT NULL,
  `nilai_v` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parameter`
--

INSERT INTO `parameter` (`id`, `kode_kriteria`, `nilai_v`, `bobot`, `created_at`, `updated_at`) VALUES
(64, 'C1', '<=54', 1, NULL, NULL),
(65, 'C1', '55-64', 2, NULL, NULL),
(66, 'C1', '65-74', 3, NULL, NULL),
(67, 'C1', '75-84', 4, NULL, NULL),
(68, 'C1', '>=85', 5, NULL, NULL),
(69, 'C2', '<=54', 1, NULL, NULL),
(70, 'C2', '55-64', 2, NULL, NULL),
(71, 'C2', '65-74', 3, NULL, NULL),
(72, 'C2', '75-84', 4, NULL, NULL),
(73, 'C2', '>=85', 5, NULL, NULL),
(74, 'C3', '<=54', 1, NULL, NULL),
(75, 'C3', '55-64', 2, NULL, NULL),
(76, 'C3', '65-74', 3, NULL, NULL),
(77, 'C3', '75-84', 4, NULL, NULL),
(78, 'C3', '>=85', 5, NULL, NULL),
(79, 'C4', '>=15', 1, NULL, NULL),
(80, 'C4', '10-14', 2, NULL, NULL),
(81, 'C4', '5-9', 3, NULL, NULL),
(82, 'C4', '1-4', 4, NULL, NULL),
(83, 'C4', '<=0', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `kode_kriteria` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(30) NOT NULL,
  `status_penilaian` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `kode_kriteria`, `id_user`, `id_siswa`, `nilai`, `status_penilaian`, `created_at`, `updated_at`) VALUES
(23, 'C1', 1, 8, 80, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(24, 'C2', 1, 8, 70, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(25, 'C3', 1, 8, 85, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(27, 'C1', 1, 9, 75, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(28, 'C2', 1, 9, 85, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(29, 'C3', 1, 9, 90, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(30, 'C4', 1, 9, 8, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(31, 'C1', 1, 10, 90, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(32, 'C2', 1, 10, 80, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(33, 'C3', 1, 10, 88, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(34, 'C4', 1, 10, 9, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(35, 'C1', 1, 11, 75, 'Valid', '2024-07-27 12:13:56', '2024-07-27 22:35:33'),
(36, 'C2', 1, 11, 75, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(37, 'C3', 1, 11, 80, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(38, 'C4', 1, 11, 12, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(39, 'C1', 1, 12, 85, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(40, 'C2', 1, 12, 78, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(41, 'C3', 1, 12, 82, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(42, 'C4', 1, 12, 11, 'Valid', '2024-07-27 12:13:56', '2024-07-27 12:13:56'),
(43, 'C4', 1, 8, 10, '', '2024-07-27 13:50:24', '2024-07-27 22:30:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas_siswa` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `jenis_kelamin`, `kelas_siswa`, `created_at`, `updated_at`) VALUES
(8, 'Siswa 1', 'L', 4, '2024-07-27 11:58:54', '2024-07-27 11:58:54'),
(9, 'Siswa 2', 'P', 4, '2024-07-27 11:58:54', '2024-07-27 11:58:54'),
(10, 'Siswa 3', 'L', 4, '2024-07-27 11:58:54', '2024-07-27 11:58:54'),
(11, 'Siswa 4', 'P', 4, '2024-07-27 11:58:54', '2024-07-27 11:58:54'),
(12, 'Siswa 5', 'L', 4, '2024-07-27 11:58:54', '2024-07-27 11:58:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `role` enum('admin','pasien','pegawai') NOT NULL DEFAULT 'pasien',
  `jenis_kelamin` enum('L','P') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `nomor_telepon`, `role`, `jenis_kelamin`, `password`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'myadmin', 'admin@admin.com', '0', 'admin', 'L', '$2y$10$pvDsEPjWW3ZRj3poSWa4A.FzUa7RbteT//7lo3oNyEYCpg/q.BmvO', '2024-04-20 03:45:43', '2024-05-04 06:57:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `configurasi`
--
ALTER TABLE `configurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indeks untuk tabel `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `configurasi`
--
ALTER TABLE `configurasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
