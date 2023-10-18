-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2023 pada 10.51
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
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `judul_kegiatan` varchar(225) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `jenis_permohonan` varchar(100) DEFAULT NULL,
  `stat` varchar(100) DEFAULT NULL,
  `pic` varchar(225) DEFAULT NULL,
  `status_req` int(11) DEFAULT 0,
  `id_user` int(11) DEFAULT 1,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `mulai`, `selesai`, `id_kegiatan`, `judul_kegiatan`, `lokasi`, `deskripsi`, `instansi`, `jenis_permohonan`, `stat`, `pic`, `status_req`, `id_user`, `photo`) VALUES
(43, '2023-09-21 15:08:00', '2023-09-21 15:08:00', NULL, 'Aokweowakewok', NULL, 'asdadaaa', NULL, NULL, NULL, NULL, 0, 7, '404859465_10119189_RezaKurnia.png'),
(44, '2023-09-21 15:22:00', '2023-09-29 15:22:00', NULL, 'Asdnbkj', NULL, 'asdadaaa', NULL, NULL, NULL, NULL, 0, 7, '1387445658_WhatsApp Image 2023-09-17 at 12.43.11.jpeg'),
(45, '2023-09-21 15:22:00', '2023-09-28 15:22:00', NULL, 'Asdnbkj', NULL, 'asdadaaa', NULL, NULL, NULL, NULL, 0, 7, '1865759039_10119203_AlbeeAkbarFillah (1).png'),
(46, '2023-09-21 15:23:00', '2023-09-27 15:23:00', NULL, 'Asdnbkj', NULL, 'asdad', NULL, NULL, NULL, NULL, 0, 7, '657678507_WhatsApp Image 2023-09-17 at 12.43.11.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_kegiatan`, `nama_kegiatan`) VALUES
(1, 'Agenda IKP'),
(2, 'Disposisi'),
(3, 'Permohonan OPD/Eksternal'),
(4, 'Permohonan Bidang/UPTD'),
(5, 'Agenda Pemimpin'),
(8, 'Agenda Bidang IKP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_permohonan`
--

CREATE TABLE `jenis_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `permohonan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_permohonan`
--

INSERT INTO `jenis_permohonan` (`id_permohonan`, `permohonan`) VALUES
(1, 'Internal'),
(2, 'External');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penolakan`
--

CREATE TABLE `penolakan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `status_tolak` int(11) DEFAULT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_kegiatan` varchar(200) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `id_user`, `judul_kegiatan`, `mulai`, `selesai`) VALUES
(3, 6, 'Mabar', '2023-08-30 19:57:00', '2023-08-30 19:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `level` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `jk`, `alamat`, `telp`, `email`, `pass`, `level`) VALUES
(1, 'Triandaru', '12345678', 'L', 'tubagus ismail', 2147483647, 'triandaru123@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin'),
(6, 'felino palafox', '111222', 'L', 'Kp Cilisung RT 01/09', 2147483647, 'ezakurnia50@gmail.com', '202cb962ac59075b964b07152d234b70', 'User'),
(7, 'Reza Kurnia', '123123', 'L', 'Kp Cilisung RT 01/09', 2147483647, 'ezakurnia50@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(8, 'dadasdasdasd', '121312312412414124124124', 'L', 'asdasdasd', 123123, 'awdaqwdq@gmail.com', '202cb962ac59075b964b07152d234b70', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `jenis_permohonan`
--
ALTER TABLE `jenis_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indeks untuk tabel `penolakan`
--
ALTER TABLE `penolakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penolakan_ibfk_1` (`id_user`),
  ADD KEY `penolakan_ibfk_2` (`id_jadwal`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_permohonan`
--
ALTER TABLE `jenis_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penolakan`
--
ALTER TABLE `penolakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `id_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `jenis_kegiatan` (`id_kegiatan`);

--
-- Ketidakleluasaan untuk tabel `penolakan`
--
ALTER TABLE `penolakan`
  ADD CONSTRAINT `penolakan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penolakan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
