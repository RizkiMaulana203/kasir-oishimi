-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2022 pada 05.56
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_detail_order` enum('selesai','proses','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_menu`, `jumlah`, `keterangan`, `status_detail_order`) VALUES
(1, 1, 11, 2, 'pesanan', 'proses'),
(2, 1, 16, 1, 'pesanan 1', 'proses'),
(3, 1, 22, 2, 'pesanan 1', 'proses'),
(4, 2, 16, 2, 'pesanan', 'proses'),
(5, 2, 20, 2, 'pesanan 1', 'proses'),
(6, 2, 7, 2, 'pesanan 1', 'proses'),
(7, 2, 6, 1, 'pesanan 1', 'proses'),
(8, 3, 15, 1, 'pesanan', 'proses'),
(9, 3, 13, 1, 'pesanan 1', 'proses'),
(10, 3, 14, 1, 'pesanan 1', 'proses'),
(11, 3, 22, 1, 'pesanan 1', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admininistrator'),
(2, 'manager'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `aksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `waktu`, `aksi`) VALUES
(1, 1, '2022-03-26 19:17:18', 'Pengguna menghapus order'),
(2, 1, '2022-03-26 19:46:04', 'Pengguna menambahkan order'),
(3, 1, '2022-03-26 23:55:52', 'Pengguna menambahkan order'),
(4, 2, '2022-03-27 00:21:03', 'Pengguna menambahkan order'),
(5, 1, '2022-03-27 00:38:32', 'Pengguna menambahkan order'),
(6, 1, '2022-03-27 00:39:14', 'Pengguna menghapus order'),
(7, 2, '2022-03-27 01:00:51', 'Pengguna menambahkan order'),
(8, 1, '2022-03-27 01:35:11', 'Pengguna menambahkan order'),
(9, 1, '2022-03-27 02:23:03', 'Pengguna menambahkan order'),
(10, 1, '2022-03-27 02:28:46', 'Pengguna menambahkan order'),
(11, 1, '2022-03-27 02:29:54', 'Pengguna menambahkan order'),
(12, 1, '2022-03-27 02:35:02', 'Pengguna menambahkan order'),
(13, 1, '2022-03-27 02:50:31', 'Pengguna menambahkan order'),
(14, 1, '2022-03-27 03:26:19', 'Pengguna menambahkan order'),
(15, 1, '2022-03-27 03:28:19', 'Pengguna menambahkan order'),
(16, 1, '2022-03-27 03:29:56', 'Pengguna menghapus order'),
(17, 3, '2022-03-27 10:40:42', 'Pengguna menambahkan order'),
(18, 3, '2022-03-27 10:43:46', 'Pengguna menambahkan order'),
(19, 3, '2022-03-27 10:45:48', 'Pengguna menambahkan order'),
(20, 3, '2022-03-27 10:53:19', 'Pengguna menambahkan order'),
(21, 3, '2022-03-27 10:54:54', 'Pengguna menghapus order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jenis` enum('makanan','minuman','','') NOT NULL,
  `harga` int(11) NOT NULL,
  `status_masakan` enum('tersedia','habis','','') NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `harga`, `status_masakan`, `foto`) VALUES
(5, 'Sushi ', 'makanan', 80000, 'tersedia', '1648350990_a0535ee77dd6e21f701c.jpg'),
(6, 'Sashimi', 'makanan', 100000, 'tersedia', '1648351248_c937d94f2a3ec6c66711.jpg'),
(7, 'Salmon Onigiri', 'makanan', 20000, 'tersedia', '1648351324_1d80bad681563a268bff.jpg'),
(11, 'Japanese Seafoood Ramen', 'makanan', 95000, 'tersedia', '1648351690_02c7e0cc42eec8934c0a.jpg'),
(12, 'Seafood Udon', 'makanan', 85000, 'tersedia', '1648351749_0eb7102bd7068734a6d6.jpg'),
(13, 'MIso Soup', 'makanan', 25000, 'tersedia', '1648351783_6ca81c1053544be81bfe.jpg'),
(14, 'Yakitori', 'makanan', 20000, 'tersedia', '1648351817_2034932f16962df728f3.jpg'),
(15, 'Chawan Musih', 'makanan', 22000, 'tersedia', '1648351875_9dde7f47b13877d50c64.jpg'),
(16, 'Takoyaki', 'makanan', 30000, 'tersedia', '1648351916_511ad041529b3a296cad.jpg'),
(17, 'Okonomiyaki', 'makanan', 30000, 'tersedia', '1648351951_e276172b22c5351c66d2.jpg'),
(18, 'Tempura', 'makanan', 20000, 'tersedia', '1648351984_a8b37bfe9bb1c266c4be.jpg'),
(19, 'Lemon Tea', 'minuman', 15000, 'tersedia', '1648352024_0155747755445b441722.jpg'),
(20, 'Avocado Juice', 'minuman', 15000, 'tersedia', '1648352094_e470f7c47f6c81824c65.jpg'),
(21, 'Orange Juice', 'minuman', 15000, 'tersedia', '1648352125_4c047561cbddc11a38ae.jpeg'),
(22, 'Matcha Tea', 'minuman', 20000, 'tersedia', '1648352189_941a8347dc0543c40eab.jpg'),
(23, 'Sake', 'minuman', 100000, 'tersedia', '1648352266_51154fe8e429c5680068.jpg'),
(24, 'Oshiruko', 'minuman', 20000, 'tersedia', '1648352300_729e751fb07da106fc29.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(10) NOT NULL,
  `no_meja` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status_order` enum('belum bayar','sudah bayar','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
(1, 4, '2022-03-26', 3, 'pesanan 1', 'sudah bayar'),
(2, 4, '2022-03-26', 3, 'pesanan 1', 'sudah bayar'),
(3, 4, '2022-03-26', 3, 'pesanan 1', 'sudah bayar');

--
-- Trigger `order`
--
DELIMITER $$
CREATE TRIGGER `order_delete` AFTER DELETE ON `order` FOR EACH ROW insert into log(id_user,waktu,aksi) values (old.id_user,now(),'Pengguna menghapus order')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `order_insert` AFTER INSERT ON `order` FOR EACH ROW insert into log(id_user,waktu,aksi) values (new.id_user,now(),'Pengguna menambahkan order')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `uang` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`, `uang`, `kembali`) VALUES
(1, 3, 1, '2022-03-26', 260000, 300000, 40000),
(2, 3, 2, '2022-03-26', 230000, 250000, 20000),
(3, 3, 3, '2022-03-26', 87000, 100000, 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_level` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_level`, `foto`) VALUES
(1, 'Kazuma', 'admin', '$2y$10$foqtOAc9Ww8RpSWzXR00kOFHty2MIc3RhYDErKu2BhrVrniwWm1MS', 1, '1642559933_e96fe7f1b6c4f3a28cbd.png'),
(2, 'Keyaru', 'manager', '$2y$10$stDgsh2cc2mY007jvSwTeO8YkaWxLhYZ8jkKqntOdv9Y323YGYAVW', 2, '1647519594_20aacaab071b3fd5cd0c.jpg'),
(3, 'Shinra', 'kasir', '$2y$10$53WHGU7s5Qh7mQmKi89YSe/RM/aSJdCaTVQUdeX2Oac2/svvbi1.O', 3, '1645170848_ab8632c6b9a5fd579c2d.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_order_2` (`id_order`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_4` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
