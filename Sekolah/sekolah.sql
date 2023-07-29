-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2023 pada 17.58
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
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nama_mp` varchar(100) NOT NULL,
  `NIP` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nama_mp`, `NIP`) VALUES
(2, 'Dr. Nendi, S.Pd., M.M.', 'Fisika', 19680106),
(3, 'Marjan, S.Pd., M.Pd.I.	', 'Matematika', 19650506),
(8, 'Hj. Henrina Puspita Permana, S.Pd.', 'Bahasa Inggris', 19661106),
(11, 'Drs. Mohamad Luwisyah', 'Kimia', 19630921),
(12, 'Drs. Dulkodir', 'Biologi', 19670608);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(10) NOT NULL,
  `hari` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `hari`, `jam_mulai`, `jam_selesai`, `nama_mapel`, `nama_guru`, `kelas`, `ruangan`) VALUES
(3, '2023-09-13', '05:40:00', '21:45:00', 'Matematika', 'Drs. Dulkodir', 'I', '1.02.05'),
(6, '2023-07-18', '13:23:00', '14:30:00', 'Pendidikan Jasmani', 'Drs. Mohamad Luwisyah', 'D', '2.01.02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `wali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `wali`) VALUES
(4, 'A', 'Marjan, S.Pd., M.Pd.I.	'),
(5, 'B', 'Dr. Nendi, S.Pd., M.M.'),
(6, 'C', 'Dr. Nendi, S.Pd., M.M.'),
(7, 'D', 'Dr. Nendi, S.Pd., M.M.'),
(8, 'E', 'Marjan, S.Pd., M.Pd.I.	'),
(10, 'H', 'Dr. Nendi, S.Pd., M.M.'),
(11, 'I', 'Drs. Mohamad Luwisyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mp` int(10) NOT NULL,
  `nama_mp` varchar(100) NOT NULL,
  `pengampu` varchar(100) NOT NULL,
  `tingkat_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mp`, `nama_mp`, `pengampu`, `tingkat_kelas`) VALUES
(4, 'Bahasa Inggris', 'Marjan, S.Pd., M.Pd.I.	', 0),
(5, 'Pweb', 'Hj. Henrina Puspita Permana, S.Pd.', 0),
(6, 'Fisika', 'Dr. Nendi, S.Pd., M.M.', 0),
(8, 'Kimia', 'Drs. Mohamad Luwisyah', 0),
(9, 'Biologi', 'Marjan, S.Pd., M.Pd.I.	', 0),
(10, 'Pendidikan Jasmani', 'Marjan, S.Pd., M.Pd.I.	', 0),
(11, 'Seni dan Prakarya', 'Dr. Nendi, S.Pd., M.M.', 0),
(12, 'Matematika', 'Dr. Nendi, S.Pd., M.M.', 0),
(13, 'Pendidikan Kewarganegaraan', 'Dr. Nendi, S.Pd., M.M.', 0),
(14, 'Agama', 'Dr. Nendi, S.Pd., M.M.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id_ruang` int(10) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `kapasitas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
(2, '1.01.01', 40),
(3, '1.01.02', 60),
(4, '1.01.03', 30),
(5, '1.01.04', 20),
(6, '1.01.05', 80),
(7, '1.02.01', 15),
(8, '1.02.02', 10),
(9, '1.02.03', 50),
(10, '1.02.04', 60),
(11, '1.02.05', 35),
(12, '2.01.01', 40),
(13, '2.01.02', 70),
(14, '2.01.03', 30),
(15, '2.01.04', 55),
(16, '2.01.05', 30),
(17, '3.5.0', 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nama_mp` (`nama_mp`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indeks untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id_ruang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
