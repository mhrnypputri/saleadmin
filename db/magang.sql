-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2024 pada 15.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc`
--

CREATE TABLE `acc` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acc`
--

INSERT INTO `acc` (`id`, `username`, `password`) VALUES
(2, 'Ran', 'bbb'),
(3, 'bbb', 'aaa'),
(10, 'ppp', 'mmm'),
(11, 'abc', 'abc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `qtt` int(11) NOT NULL,
  `buyer` text NOT NULL,
  `pack` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id`, `tgl`, `qtt`, `buyer`, `pack`) VALUES
(1, '2024-01-24', 569, 'abc', 'ghi'),
(3, '2024-01-23', 653, 'def', 'jkl'),
(4, '2024-01-31', 407, 'mno', 'pqr'),
(6, '2024-01-24', 538, 'stu', 'vwx'),
(8, '2024-01-26', 679, 'yzd', 'plk'),
(9, '2024-01-27', 908, 'def', 'ghi'),
(10, '2024-01-27', 450, 'mno', 'kkk'),
(11, '2024-01-27', 742, 'abc', 'jkl'),
(12, '2024-01-27', 456, 'abc', 'gty'),
(13, '2024-01-31', 950, 'ghi', 'ppp'),
(14, '2024-01-31', 574, 'bsd', 'jkl'),
(15, '2024-01-28', 500, 'ghi', 'mnm'),
(16, '2024-01-26', 456, 'ghi', 'jkl'),
(17, '2024-01-31', 537, 'abc', 'dfw'),
(18, '2024-01-31', 756, 'ghi', 'bbb'),
(19, '2024-01-20', 123, 'opr', 'mio'),
(20, '2024-01-27', 190, 'abc', 'jkl'),
(21, '2024-01-27', 584, 'bde', 'def'),
(22, '2024-01-27', 444, 'mno', 'jkl'),
(25, '2024-01-30', 653, 'ghi', 'hju'),
(26, '2024-02-17', 909, 'ghi', 'pol');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
