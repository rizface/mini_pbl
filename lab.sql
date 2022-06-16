-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 09:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_ruangan`
--

CREATE TABLE `alat_ruangan` (
  `id_alat` int(20) NOT NULL,
  `id_ruangan` int(20) UNSIGNED NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat_ruangan`
--

INSERT INTO `alat_ruangan` (`id_alat`, `id_ruangan`, `nama_alat`, `jumlah`) VALUES
(5, 11, 'Necessitatibus aliqu', 36),
(6, 11, 'Veniam amet error ', 3),
(7, 11, 'Aut consequuntur est', 76),
(8, 11, 'Dolorum praesentium ', 73);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(20) UNSIGNED NOT NULL,
  `nidn` varchar(100) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `username`, `password`) VALUES
(21, '33121010110', 'dosen1', 'dosen1', '$2y$10$sZYUBGXUUlLDcRl2Va512O1MnkFHNwCtgfiEwPe8wsdFMQZa9npdK');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_rusak` int(20) UNSIGNED NOT NULL,
  `id_ruangan` int(20) UNSIGNED DEFAULT NULL,
  `detail_rusak` text NOT NULL,
  `detail_perbaikan` text DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_rusak`, `id_ruangan`, `detail_rusak`, `detail_perbaikan`, `foto`) VALUES
(4, 11, 'asd', NULL, 'assets/uploaded/Ni5wbmcvb3B0L2xhbXBwL3RlbXAvcGhwaWI0djRB.png'),
(5, 11, 'asda', NULL, 'assets/uploaded/My5wbmcvb3B0L2xhbXBwL3RlbXAvcGhwYTU0aVlD.png'),
(6, 11, '<p>wew</p>\r\n', NULL, 'assets/uploaded/NS5wbmcvb3B0L2xhbXBwL3RlbXAvcGhwaWx6Z1Nu.png'),
(7, 11, '<p><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias nisi eos provident quae laboriosam fugit quaerat quam ea sapiente illo laudantium placeat dicta quas iusto, numquam hic natus ducimus quod.</strong></p>\n\n<p><strong>Asperiores temporibus sapiente non deserunt quam ea, ab hic voluptatibus vel excepturi mollitia, voluptates saepe minima id ullam fugit odio sint magni porro possimus. Expedita possimus suscipit reiciendis id dignissimos.</strong></p>\n\n<p><em>Deserunt iure et labore sunt repudiandae velit consequatur molestias pariatur soluta vitae modi, blanditiis nobis culpa possimus molestiae aliquam earum, accusamus voluptatum. Blanditiis sequi voluptates animi consequatur inventore, eveniet ut.</em></p>\n\n<p><em>Nobis optio facilis, dolores at vel consectetur ducimus! Sint consectetur vitae est illo omnis explicabo laudantium voluptatum molestias cumque, sed facilis aut dolorem iste ab repellat itaque repellendus voluptatem nesciunt.</em></p>\n\n<p><s>Cumque similique eligendi culpa natus quidem quasi voluptatem! Enim, magnam placeat! Error rem molestias repellendus tempore sequi exercitationem unde doloremque iste, culpa porro tempora atque id quae, ad enim reiciendis?</s></p>\n\n<ul>\n	<li>Pariatur dolore repudiandae expedita architecto voluptatum tempora iste quos optio, placeat, vel fuga labore unde commodi fugit cupiditate? Eum nulla rerum nostrum esse hic non, est placeat voluptates iure atque.</li>\n	<li>Accusamus eius dignissimos corporis labore distinctio ipsa voluptate. Fuga consequatur fugit dicta tempore nemo quisquam laborum odio rerum perspiciatis tenetur esse sint culpa velit porro totam, nisi nihil consequuntur. Expedita!</li>\n	<li>Dolores culpa in autem eius quia esse ab, facere eveniet voluptatum dolorem vel eaque, mollitia quisquam minima, amet vero soluta sunt placeat. Modi inventore ipsum nemo, sapiente distinctio deserunt exercitationem.</li>\n	<li>Laboriosam nihil odit expedita modi magnam quasi nobis repudiandae dolorum nisi asperiores facere illo deleniti exercitationem, culpa similique assumenda aspernatur iusto dolores ea vero alias omnis corrupti distinctio. Provident, minus!</li>\n	<li>Corrupti provident sint numquam, voluptatibus at placeat saepe molestiae, nesciunt magnam facere culpa. Soluta esse aut tempora commodi sapiente eaque earum. Ipsum, soluta ut quidem temporibus facilis numquam dolorum in</li>\n</ul>\n', 'disiram sama air ya ges ya', 'assets/uploaded/Ni5wbmcvb3B0L2xhbXBwL3RlbXAvcGhwSFdDSWI1.png');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan_sparepart`
--

CREATE TABLE `kerusakan_sparepart` (
  `id_kerusakan` int(11) UNSIGNED NOT NULL,
  `id_sparepart` int(11) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laboran`
--

CREATE TABLE `laboran` (
  `id_laboran` int(20) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboran`
--

INSERT INTO `laboran` (`id_laboran`, `nip`, `username`, `password`) VALUES
(15, '3312101017', 'laboran1', '$2y$10$uQggO7WtoUlSF7tL1HoUbOYZWa.cAbyWR8vCFlQb0DPWehOhcsU7a'),
(16, '3312101017', 'laboran1', '$2y$10$lyog5f3mxOiOnkLcGWpgTuVKlz1iyFDZb71UcUiT07thmirIWDNLK');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `username`, `password`) VALUES
(1, 'muhammad al farizzi', '3312101017', 'mahasiswa1', '$2y$10$hWluQsR7A0ARuSDNJ2lkC.IVR0m6YZHA2/zYu7mO/3ilYRyk3bPVG'),
(2, 'muhammad al farizzi', '3312101017', 'mahasiswa1', '$2y$10$lFs0J2bY/yzEixOnp1mAAO.P0UafVqwwMBEj7/XeMfoVC74me4fL2');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_pinjam` int(20) UNSIGNED NOT NULL,
  `id_ruangan` int(20) UNSIGNED DEFAULT NULL,
  `id_dosen` int(20) UNSIGNED DEFAULT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `waktu_pinjam` varchar(100) NOT NULL,
  `waktu_balik` varchar(100) DEFAULT NULL,
  `persetujuan_dosen` varchar(100) DEFAULT NULL,
  `persetujuan_laboran` varchar(100) DEFAULT NULL,
  `status_ruangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_pinjam`, `id_ruangan`, `id_dosen`, `id_mahasiswa`, `tanggal_pinjam`, `waktu_pinjam`, `waktu_balik`, `persetujuan_dosen`, `persetujuan_laboran`, `status_ruangan`) VALUES
(6, 11, 21, 1, '2005-07-14', '00:55', NULL, 'disetujui', 'disetujui', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(20) UNSIGNED NOT NULL,
  `id_laboran` int(10) UNSIGNED DEFAULT NULL,
  `no_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_laboran`, `no_ruangan`) VALUES
(11, 15, 703),
(12, 15, 704);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_alat` int(20) UNSIGNED NOT NULL,
  `nama_sp` varchar(100) NOT NULL,
  `jumlah_sp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_ruangan`
--
ALTER TABLE `alat_ruangan`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `alat_ruangan` (`id_ruangan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_rusak`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `kerusakan_sparepart`
--
ALTER TABLE `kerusakan_sparepart`
  ADD KEY `PK_kerusakan` (`id_kerusakan`),
  ADD KEY `pk_sparepart` (`id_sparepart`);

--
-- Indexes for table `laboran`
--
ALTER TABLE `laboran`
  ADD PRIMARY KEY (`id_laboran`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `fk_id_dosen` (`id_dosen`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_mahasiswa_pk` (`id_mahasiswa`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `fk_id_laboran` (`id_laboran`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_alat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_ruangan`
--
ALTER TABLE `alat_ruangan`
  MODIFY `id_alat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_rusak` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laboran`
--
ALTER TABLE `laboran`
  MODIFY `id_laboran` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_pinjam` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_alat` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_ruangan`
--
ALTER TABLE `alat_ruangan`
  ADD CONSTRAINT `fk_alat_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE;

--
-- Constraints for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD CONSTRAINT `pk_id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL;

--
-- Constraints for table `kerusakan_sparepart`
--
ALTER TABLE `kerusakan_sparepart`
  ADD CONSTRAINT `kerusakan_sparepart_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `kerusakan` (`id_rusak`) ON DELETE CASCADE,
  ADD CONSTRAINT `kerusakan_sparepart_ibfk_2` FOREIGN KEY (`id_sparepart`) REFERENCES `sparepart` (`id_alat`) ON DELETE CASCADE;

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `fk_id_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE SET NULL,
  ADD CONSTRAINT `id_mahasiswa_pk` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `fk_id_laboran` FOREIGN KEY (`id_laboran`) REFERENCES `laboran` (`id_laboran`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
