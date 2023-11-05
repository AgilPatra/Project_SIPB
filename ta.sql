-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 06:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluars`
--

CREATE TABLE `barangkeluars` (
  `id` varchar(20) NOT NULL,
  `id_pbarang` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `tglkeluar` datetime NOT NULL,
  `jmlahkeluar` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Triggers `barangkeluars`
--
DELIMITER $$
CREATE TRIGGER `id_brgkluar` BEFORE INSERT ON `barangkeluars` FOR EACH ROW BEGIN
	DECLARE new_idbrgkluar INT DEFAULT 1;
    
	SELECT IFNULL(MAX(SUBSTR(id,4)),0) + 1 INTO new_idbrgkluar FROM barangkeluars;
	IF new_idbrgkluar = 1 THEN 
		SET NEW.id = 'BK0001';
	ELSE 
		SET NEW.id = CONCAT('BK', LPAD(new_idbrgkluar, 4, '0'));
	END IF;
	
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `barangkeluars` FOR EACH ROW BEGIN

UPDATE barangs SET stok = stok - NEW.jmlahkeluar WHERE kodebarang = NEW.kodebarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuks`
--

CREATE TABLE `barangmasuks` (
  `id` varchar(20) NOT NULL,
  `id_produksi` varchar(20) NOT NULL,
  `tanggal_produksi` datetime NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `tglmasuk` datetime NOT NULL,
  `jmlahmasuk` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Triggers `barangmasuks`
--
DELIMITER $$
CREATE TRIGGER `id_brgmasuk` BEFORE INSERT ON `barangmasuks` FOR EACH ROW BEGIN
	DECLARE new_Id INT DEFAULT 1;
    
	SELECT IFNULL(MAX(SUBSTR(id,4)),0) + 1 INTO new_Id FROM barangmasuks;
	IF new_Id = 1 THEN 
		SET NEW.id = 'BM0001';
	ELSE 
		SET NEW.id = CONCAT('BM', LPAD(new_Id, 4, '0'));
	END IF;
	
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stoktambah` AFTER INSERT ON `barangmasuks` FOR EACH ROW BEGIN

UPDATE barangs SET stok = stok + NEW.jmlahmasuk WHERE kodebarang = NEW.kodebarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` smallint NOT NULL,
  `jenis` enum('Bangku','Cermin','Dekorasi','Lampu','Meja','Rak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Triggers `barangs`
--
DELIMITER $$
CREATE TRIGGER `Id` BEFORE INSERT ON `barangs` FOR EACH ROW BEGIN
	DECLARE new_kd INT DEFAULT 1;
    
	SELECT IFNULL(MAX(SUBSTR(kodebarang,4)),0) + 1 INTO new_kd FROM barangs;
	IF new_kd = 1 THEN 
		SET NEW.kodebarang = 'KD0001';
	ELSE 
		SET NEW.kodebarang = CONCAT('KD', LPAD(new_kd, 4, '0'));
	END IF;
	
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pbarangs`
--

CREATE TABLE `pbarangs` (
  `id` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `tglpermintaan` datetime NOT NULL,
  `jmlpermintaan` smallint NOT NULL,
  `kgudang` enum('Setuju','Belum Disetujui') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Triggers `pbarangs`
--
DELIMITER $$
CREATE TRIGGER `id_pbrg` BEFORE INSERT ON `pbarangs` FOR EACH ROW BEGIN
	DECLARE new_idpbr INT DEFAULT 1;
    
	SELECT IFNULL(MAX(SUBSTR(id,4)),0) + 1 INTO new_idpbr FROM pbarangs;
	IF new_idpbr = 1 THEN 
		SET NEW.id = 'PB0001';
	ELSE 
		SET NEW.id = CONCAT('PB', LPAD(new_idpbr, 4, '0'));
	END IF;
	
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pproduksis`
--

CREATE TABLE `pproduksis` (
  `id` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `tglpermintaan` datetime NOT NULL,
  `jmlpermintaan` smallint NOT NULL,
  `kpimpinan` enum('Setuju','Belum Disetujui') DEFAULT NULL,
  `kproduksi` enum('Setuju','Belum Disetujui') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Triggers `pproduksis`
--
DELIMITER $$
CREATE TRIGGER `id_pprdk` BEFORE INSERT ON `pproduksis` FOR EACH ROW BEGIN
	DECLARE new_idpp INT DEFAULT 1;
    
	SELECT IFNULL(MAX(SUBSTR(id,4)),0) + 1 INTO new_idpp FROM pproduksis;
	IF new_idpp = 1 THEN 
		SET NEW.id = 'PP0001';
	ELSE 
		SET NEW.id = CONCAT('PP', LPAD(new_idpp, 4, '0'));
	END IF;
	
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` enum('Admin','Gudang','Pimpinan') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `nama`, `jabatan`) VALUES
(1, 'admin@gmail.com', '$2y$10$HL96eohpsea5kKkWH54G9uyucLH8rZcnCXAQByZV4RryQ1PgFHEMi', '1', 'marta', 'Admin'),
(2, 'gudang@gmail.com', '$2y$10$9sjQKANdlat7aWpc41nQTuWUbsX11FN.PNdNunAqmYRB6WdYbO2G.', '2', 'dea', 'Gudang'),
(3, 'pimpinan@gmail.com', '$2y$10$5WgDNx8nRtaYxik.wHr.2eIT7.ki5PYrjT0KXF1lsVJjH5ZSDRW4O', '3', 'gatot', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangkeluars`
--
ALTER TABLE `barangkeluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangkeluars_ibfk_2` (`kodebarang`),
  ADD KEY `barangkeluars_ibfk_3` (`id_pbarang`);

--
-- Indexes for table `barangmasuks`
--
ALTER TABLE `barangmasuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangmasuks_ibfk_2` (`kodebarang`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `pbarangs`
--
ALTER TABLE `pbarangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pbarangs_ibfk_1` (`kodebarang`);

--
-- Indexes for table `pproduksis`
--
ALTER TABLE `pproduksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pproduksis_ibfk_1` (`kodebarang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangkeluars`
--
ALTER TABLE `barangkeluars`
  ADD CONSTRAINT `barangkeluars_ibfk_2` FOREIGN KEY (`kodebarang`) REFERENCES `barangs` (`kodebarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barangkeluars_ibfk_3` FOREIGN KEY (`id_pbarang`) REFERENCES `pbarangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barangmasuks`
--
ALTER TABLE `barangmasuks`
  ADD CONSTRAINT `barangmasuks_ibfk_2` FOREIGN KEY (`kodebarang`) REFERENCES `barangs` (`kodebarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pbarangs`
--
ALTER TABLE `pbarangs`
  ADD CONSTRAINT `pbarangs_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `barangs` (`kodebarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pproduksis`
--
ALTER TABLE `pproduksis`
  ADD CONSTRAINT `pproduksis_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `barangs` (`kodebarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
