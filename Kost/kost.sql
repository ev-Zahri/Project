-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2023 pada 06.36
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
-- Database: `kost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_kost`
--

CREATE TABLE `keterangan_kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(128) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `jumlah_kamar` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keterangan_kost`
--

INSERT INTO `keterangan_kost` (`id_kost`, `nama_kost`, `fasilitas`, `harga`, `alamat`, `kelamin`, `jumlah_kamar`) VALUES
(1, 'Kost Merdeka', 'Luas 3x4/Parkiran luas/Ada CCTV/Kamar mandi dalam/Free Wifi, Air dan Listrik/Isian (Kasur, Lemari)', 1000000, 'Jl. Masjid Jogokariyan Mantrijeron, Kec. Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55143', 'Perempuan', 9),
(2, 'Kost Al Jazahir', 'Free Wifi, Air dan Listrik/Indomart,Alfamart dekat/Parkir luas/Ada CCTV/Luas 3x4', 600000, 'Jl. Parangtritis No.176, Krapyak Wetan, Panggungharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55143', 'Laki laki', 8),
(3, 'Kost Bersama', 'Tempat makan, masjid, stasiun dekat/Luas 3x3/Kamar mandi luar/Penjaga kos/Parkiran luas', 550000, 'Jl. Doktor Sutomo No.58, Bausasran, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55211', 'Laki laki', 10),
(4, 'Kost Merapi', 'Parkiran luas/Kamar mandi luar/Luas 3x3/Ada CCTV', 450000, 'Jl. Gayam No.23b, Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166', 'Perempuan', 8),
(5, 'Kost Anugrah', 'Kamar mandi dalam/AC/Parkir luas/Isian/Ada CCTV/Luas 3x4/Free Wifi, Air dan Listrik', 900000, 'Rejowinangun, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55171', 'laki laki', 13),
(6, 'Kost De Bento', 'Luas 3x4/Penjaga kost/Kamar mandi dalam/Isian/Free Wifi, Air dan Listrik', 850000, 'Jalan imogiri barat km 7,5 Gandok RT 05, Jl. Semail, Semail, Bangunharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55188', 'Laki laki', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(128) NOT NULL,
  `nama_kost` varchar(128) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_habis` date NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `no_ktp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keterangan_kost`
--
ALTER TABLE `keterangan_kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keterangan_kost`
--
ALTER TABLE `keterangan_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
