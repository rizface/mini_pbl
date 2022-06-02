-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 08.31
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `lab`
--
CREATE DATABASE IF NOT EXISTS `lab` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lab`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE IF NOT EXISTS `alat` (
  `id_alat` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ruangan` int(20) unsigned DEFAULT NULL,
  `nama_alat` varchar(300) NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `nidn` varchar(100) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE IF NOT EXISTS `kerusakan` (
  `id_rusak` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pinjam` int(20) unsigned DEFAULT NULL,
  `detail_rusak` text NOT NULL,
  PRIMARY KEY (`id_rusak`),
  KEY `fk_id_pinjam` (`id_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboran`
--

CREATE TABLE IF NOT EXISTS `laboran` (
  `id_laboran` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_laboran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `id_pinjam` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_ruangan` int(20) unsigned DEFAULT NULL,
  `id_dosen` int(20) unsigned DEFAULT NULL,
  `id_laboran` int(20) unsigned DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_pinjam` varchar(100) NOT NULL,
  `waktu_balik` varchar(100) NOT NULL,
  `persetujuan_dosen` varchar(100) NOT NULL,
  `persetujuan_laboran` varchar(100) NOT NULL,
  `status_ruangan` varchar(100) NOT NULL,
  `status_pengajuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pinjam`),
  KEY `fk_id_dosen` (`id_dosen`),
  KEY `id_ruangan` (`id_ruangan`),
  KEY `id_laboran` (`id_laboran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `id_ruangan` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_laboran` int(10) unsigned DEFAULT NULL,
  `no_ruangan` int(11) NOT NULL,
  PRIMARY KEY (`id_ruangan`),
  KEY `fk_id_laboran` (`id_laboran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE IF NOT EXISTS `sparepart` (
  `id_sp` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_laboran` int(20) unsigned DEFAULT NULL,
  `nama_sp` varchar(100) NOT NULL,
  `jumlah_sp` int(20) NOT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `id_laboran` (`id_laboran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD CONSTRAINT `fk_id_pinjam` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjam` (`id_pinjam`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `fk_id_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE SET NULL,
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL,
  ADD CONSTRAINT `peminjam_ibfk_2` FOREIGN KEY (`id_laboran`) REFERENCES `laboran` (`id_laboran`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `fk_id_laboran` FOREIGN KEY (`id_laboran`) REFERENCES `laboran` (`id_laboran`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`id_laboran`) REFERENCES `laboran` (`id_laboran`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
