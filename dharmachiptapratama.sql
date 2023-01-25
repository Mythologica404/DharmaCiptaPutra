-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2023 at 12:01 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dharmachiptapratama`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(5) NOT NULL,
  `gaji` int(12) NOT NULL,
  `gaji_bersih` int(12) NOT NULL,
  `potongan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `gaji`, `gaji_bersih`, `potongan`) VALUES
(2, 5, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'jabatan 1'),
(5, 'asd'),
(7, 'dsa'),
(9, '2151');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `id_gaji` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenis_kelamin`, `agama`, `alamat`, `no_telp`, `email`, `id_jabatan`, `id_gaji`, `id_user`) VALUES
(2, 'Anjae', 'Wanita', 'Katolik', 'edit alamat', '54321', 'edit@gmail.com', 9, 2, 1),
(4, 'aa', 'Pria', 'Islam', 'aa', '1231', 'aa', 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengawasan`
--

CREATE TABLE `pengawasan` (
  `id_pengawasan` int(5) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kemajuan` text NOT NULL,
  `jenis_proyek` enum('Bangunan','Jalan','Jembatan') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawasan`
--

INSERT INTO `pengawasan` (`id_pengawasan`, `nama_proyek`, `tgl_mulai`, `tgl_selesai`, `kemajuan`, `jenis_proyek`, `keterangan`) VALUES
(2, 'Test Project', '2023-01-25', '2023-01-31', 'awal', 'Jembatan', 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `pengawasan_pegawai`
--

CREATE TABLE `pengawasan_pegawai` (
  `id_pengawasan` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `role` enum('Owner','Pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'user1', 'test1', 'pegawai'),
(2, 'test55', '7e39cfce74d155294619613f42484f18', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengawasan`
--
ALTER TABLE `pengawasan`
  ADD PRIMARY KEY (`id_pengawasan`);

--
-- Indexes for table `pengawasan_pegawai`
--
ALTER TABLE `pengawasan_pegawai`
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pengawasan` (`id_pengawasan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengawasan`
--
ALTER TABLE `pengawasan`
  MODIFY `id_pengawasan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id_gaji`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`);

--
-- Constraints for table `pengawasan_pegawai`
--
ALTER TABLE `pengawasan_pegawai`
  ADD CONSTRAINT `pengawasan_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pengawasan_pegawai_ibfk_2` FOREIGN KEY (`id_pengawasan`) REFERENCES `pengawasan` (`id_pengawasan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
