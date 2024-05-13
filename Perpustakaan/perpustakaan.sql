-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2024 pada 11.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(50) NOT NULL,
  `nm_anggota` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ttl_anggota` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_buku` varchar(40) NOT NULL,
  `kategori_buku` varchar(40) NOT NULL,
  `stok buku` varchar(50) NOT NULL,
  `tahun_buku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `gambar`, `nama`, `kode_buku`, `kategori_buku`, `stok buku`, `tahun_buku`) VALUES
(6, '664130b4b393e.jpeg', 'Waves', '9882718', 'Novel', '20', '2018'),
(7, '664134a5bc094.jpeg', 'The Ring Of Rag', '009009', 'Novel', '5', '2019'),
(8, '664134d9aa502.jpeg', 'Wirausaha', '9900990', 'Pendidikan', '50', '2019'),
(10, '6641cacea199e.jpeg', 'Seni Budaya', '73167726', 'Pendidikan', '10', '2019'),
(11, '6641cae4efbfa.jpeg', 'PKN', '889866', 'Pendidikan', '13', '2020'),
(12, '6641cb0560ac4.jpeg', 'Lithel Book', '55261', 'Novel', '10', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `buku_dipinjam` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `buku_dipinjam`, `jumlah`, `nama`, `alamat`, `kontak`, `tanggal`) VALUES
(3, 'Seni Budaya', '1', 'Riva Satya', 'Cibaduyut', '0895707982020', '13 Mei 202');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjaga_perpus`
--

CREATE TABLE `penjaga_perpus` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjaga_perpus`
--

INSERT INTO `penjaga_perpus` (`id`, `user`, `password`, `role`) VALUES
(4, 'admin', '$2y$10$Csf5YCpbcvbOYAXhVUwxV.eaUf/cBTNUvzxDOKmpsyRE2a1LI4G0u', 'admin'),
(7, 'riva', '$2y$10$ZkA09jsbWp5IphtyLLANluK9QE66xpTrwnA5cEH6ASHaKlrC4u2Sm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjaga_perpus`
--
ALTER TABLE `penjaga_perpus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjaga_perpus`
--
ALTER TABLE `penjaga_perpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
