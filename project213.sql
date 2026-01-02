-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2018 pada 19.45
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project213`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_mekanik`
--

CREATE TABLE `b_mekanik` (
  `id_mekanik` int(3) UNSIGNED NOT NULL,
  `nama_mekanik` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_mekanik`
--

INSERT INTO `b_mekanik` (`id_mekanik`, `nama_mekanik`, `alamat`) VALUES
(4, 'ngadimin', 'sleman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_pembelian`
--

CREATE TABLE `b_pembelian` (
  `no_nota` varchar(10) NOT NULL,
  `id_sparepart` varchar(10) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `subtotal` int(25) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_pembelian`
--

INSERT INTO `b_pembelian` (`no_nota`, `id_sparepart`, `sparepart`, `harga`, `qty`, `subtotal`, `tgl_beli`) VALUES
('P0001', 'SPR002', 'Kampas Kopling', 148000, 1, 148000, '2017-12-18'),
('P0002', 'SPR001', 'Filter Udara', 32000, 1, 32000, '2017-12-18'),
('P0003', 'SPR010', 'Oli Yamalube', 35000, 1, 35000, '2017-12-18'),
('P0004', 'SPR010', 'Oli Yamalube', 35000, 1, 35000, '2017-12-18'),
('P0005', 'SPR003', 'Piston', 38000, 2, 76000, '2017-12-18'),
('P0006', 'SPR011', 'Oli Top One', 40000, 1, 40000, '2017-12-18'),
('P0007', 'SPR007', 'Relay Starter', 40000, 2, 80000, '2017-12-18'),
('P0007', 'SPR018', 'Kampas Rem Belakang', 26000, 1, 26000, '2017-12-18'),
('P0008', 'SPR003', 'Piston', 38000, 1, 38000, '2017-12-18'),
('P0009', 'SPR001', 'Filter Udara', 32000, 1, 32000, '2017-12-18'),
('P0009', 'SPR002', 'Kampas Kopling', 148000, 1, 148000, '2017-12-18'),
('P0010', 'SPR001', 'Filter Udara', 32000, 1, 32000, '2017-12-18'),
('P0011', 'SPR005', 'V-belt', 43000, 1, 43000, '2017-12-28'),
('P0012', 'SPR014', 'Oli Mesran', 35000, 2, 70000, '2017-12-28'),
('P0013', 'SPR007', 'Relay Starter', 40000, 1, 40000, '2017-12-28'),
('P0014', 'SPR013', 'Oli Castroll', 65000, 1, 65000, '2017-12-28'),
('P0015', 'SPR018', 'Kampas Rem Belakang', 26000, 1, 26000, '2017-12-28'),
('P0016', 'SPR007', 'Relay Starter', 40000, 1, 40000, '2018-01-14'),
('P0016', 'SPR015', 'Spion', 25000, 1, 25000, '2018-01-14'),
('P0016', 'SPR016', 'Oli mpx 1', 35000, 1, 35000, '2018-01-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_pengguna`
--

CREATE TABLE `b_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_pengguna`
--

INSERT INTO `b_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`) VALUES
(1, 'ngadimin', 'ngadimin', '1fe03a1717c1c0a4b9695d031385584f'),
(2, 'ngadiman', 'ngadiman', '5449ccea16d1cc73990727cd835e45b5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_penjualansementara`
--

CREATE TABLE `b_penjualansementara` (
  `no_nota` varchar(10) NOT NULL,
  `id_sparepart` varchar(10) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `subtotal` int(25) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_sparepart`
--

CREATE TABLE `b_sparepart` (
  `id_sparepart` varchar(10) NOT NULL,
  `sparepart` varchar(50) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_sparepart`
--

INSERT INTO `b_sparepart` (`id_sparepart`, `sparepart`, `stock`, `harga`) VALUES
('SPR001', 'Filter Udara', 13, '32000'),
('SPR002', 'Kampas Kopling', 4, '148000'),
('SPR003', 'Piston', 0, '38000'),
('SPR004', 'Ring Piston', 3, '60000'),
('SPR005', 'V-belt', 2, '43000'),
('SPR006', 'CDI', 4, '340000'),
('SPR007', 'Relay Starter', 3, '40000'),
('SPR008', 'Sokbreker Belakang', 3, '180000'),
('SPR009', 'Kem', 5, '115000'),
('SPR010', 'Oli Yamalube', 0, '35000'),
('SPR011', 'Oli Top One', 2, '40000'),
('SPR012', 'Kampas Rem Depan', 1, '37000'),
('SPR013', 'Oli Castroll', 4, '65000'),
('SPR014', 'Oli Mesran', 4, '35000'),
('SPR015', 'Spion', 5, '25000'),
('SPR016', 'Oli mpx 1', 15, '35000'),
('SPR017', 'Oli Mpx2', 0, '40000'),
('SPR018', 'Kampas Rem Belakang', 1, '26000'),
('SPR019', 'Rantai', 1, '65000'),
('SPR020', 'Gir Depan', 2, '35000'),
('SPR021', 'Gir belakang', 0, '63000'),
('SPR022', 'Bohlam Depan', 18, '25000'),
('SPR023', 'Bohlam Belakang', 13, '7500'),
('SPR024', 'Kabel Gas', 18, '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_transaksi`
--

CREATE TABLE `b_transaksi` (
  `tgl_beli` datetime NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL,
  `harga_jasa` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `bayar` int(15) NOT NULL,
  `kembali` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_transaksi`
--

INSERT INTO `b_transaksi` (`tgl_beli`, `no_nota`, `jumlah`, `nama_mekanik`, `harga_jasa`, `total`, `bayar`, `kembali`) VALUES
('2017-12-17 00:00:00', 'P0001', 148000, 'ngadimin', 10000, 158000, 160000, 2000),
('2017-12-18 00:00:00', 'P0002', 32000, 'ngadimin', 10000, 42000, 100000, 58000),
('2017-12-18 00:00:00', 'P0003', 35000, 'ngadimin', 10000, 45000, 50000, 5000),
('2017-12-18 00:00:00', 'P0004', 35000, 'ngadimin', 10000, 45000, 50000, 5000),
('2017-12-18 00:00:00', 'P0005', 76000, 'ngadimin', 10000, 86000, 100000, 14000),
('2017-12-18 00:00:00', 'P0006', 40000, 'ngadimin', 10000, 50000, 100000, 50000),
('2017-12-18 00:00:00', 'P0007', 106000, 'ngadimin', 10000, 116000, 120000, 4000),
('2017-12-18 00:00:00', 'P0008', 38000, 'ngadimin', 10000, 48000, 50000, 2000),
('2017-12-18 00:00:00', 'P0009', 180000, 'ngadimin', 10000, 190000, 200000, 10000),
('2017-12-18 00:00:00', 'P0010', 32000, 'ngadimin', 10000, 42000, 50000, 8000),
('2017-12-28 00:00:00', 'P0011', 43000, 'ngadimin', 15000, 58000, 60000, 2000),
('2017-12-28 00:00:00', 'P0012', 70000, 'ngadimin', 10000, 80000, 100000, 20000),
('2017-12-28 00:00:00', 'P0013', 40000, 'ngadimin', 10000, 50000, 50000, 0),
('2017-12-28 22:30:58', 'P0014', 65000, 'ngadimin', 3000, 68000, 70000, 2000),
('2017-12-28 22:32:28', 'P0015', 26000, 'ngadimin', 10000, 36000, 50000, 14000),
('2018-01-14 15:52:26', 'P0016', 100000, 'ngadimin', 20000, 120000, 150000, 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_mekanik`
--
ALTER TABLE `b_mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `b_pengguna`
--
ALTER TABLE `b_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `b_penjualansementara`
--
ALTER TABLE `b_penjualansementara`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `b_sparepart`
--
ALTER TABLE `b_sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `b_transaksi`
--
ALTER TABLE `b_transaksi`
  ADD PRIMARY KEY (`no_nota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_mekanik`
--
ALTER TABLE `b_mekanik`
  MODIFY `id_mekanik` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `b_pengguna`
--
ALTER TABLE `b_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
