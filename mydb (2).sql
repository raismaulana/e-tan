-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Des 2017 pada 12.54
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khaff_our_etan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `kodeTanah` varchar(45) DEFAULT NULL,
  `luasTanah` varchar(45) DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `sertifikat` varchar(45) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `pbb` varchar(45) DEFAULT NULL,
  `imb` varchar(45) DEFAULT NULL,
  `hakTanggungan` varchar(45) DEFAULT NULL,
  `tangalUpdate` date DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `tipe` text NOT NULL,
  `deskripsi` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `kodeTanah`, `luasTanah`, `lokasi`, `harga`, `sertifikat`, `gambar`, `pbb`, `imb`, `hakTanggungan`, `tangalUpdate`, `Status`, `tipe`, `deskripsi`, `user_id`) VALUES
(24, '123456789', '10000m', 'jember', '12314141', 'ada', '29122017133333Logo Politeknik Negeri Jember.png', 'ada', 'ada', 'ada', '2017-12-29', '1', '', '', 1),
(25, 'coba', 'coba', 'coba', 'coba', 'coba', '29122017133549img3.png', 'coba', 'coba', 'coba', '2017-12-29', '2', '', '', 1),
(26, '199102319', '1000m', 'jember', '19283191', '', '30122017115122img2.PNG', '', '', '', '2017-12-30', '1', 'Tanah Kavling', 'TANAH INI BERADA DEKAT DENGAN PUSAT DI JEMBER', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `TanggalPesan` varchar(45) DEFAULT NULL,
  `barang_idbarang` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penjual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `noTelp` varchar(45) DEFAULT NULL,
  `tempatLahir` varchar(45) DEFAULT NULL,
  `tanggalLahir` varchar(45) DEFAULT NULL,
  `fotoKopiKTP` varchar(45) DEFAULT NULL,
  `jenisKelamin` varchar(45) DEFAULT NULL,
  `kk` varchar(45) DEFAULT NULL,
  `NPWP` varchar(45) DEFAULT NULL,
  `suratNikah` varchar(45) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `hash`, `nama`, `alamat`, `noTelp`, `tempatLahir`, `tanggalLahir`, `fotoKopiKTP`, `jenisKelamin`, `kk`, `NPWP`, `suratNikah`, `level`, `active`) VALUES
(1, 'cahya', 'cahya@gmail.com', 'cahya123', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(2, 'ulan', 'ulandari@gmail.com', 'ulan1234', '', 'ulandari susika', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `fk_barang_user_idx` (`user_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`),
  ADD KEY `fk_pemesanan_barang1_idx` (`barang_idbarang`),
  ADD KEY `fk_pemesanan_user1_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_barang1` FOREIGN KEY (`barang_idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pemesanan_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
