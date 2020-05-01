-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 02 Mei 2020 pada 00.44
-- Versi Server: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.2.15-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `stokawal` varchar(100) NOT NULL,
  `pembelian` varchar(100) NOT NULL,
  `penjualan` varchar(100) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `tipe`, `stok`, `stokawal`, `pembelian`, `penjualan`, `harga_beli`, `harga_jual`, `tanggal`) VALUES
('27316', '11111', 'Samsung', 'A37', '61', '100', '21', '60', '320000', '500000', '2018-07-07'),
('32577', '11111', 'HP ', '452-3', '100', '100', '0', '0', '3000', '4000', '2018-07-07'),
('42851', '11111', 'HP', '890', '100', '100', '0', '0', '4000', '5000', '2018-07-05'),
('5509', '44444', 'Hp', 'M860', '100', '100', '0', '0', '1600000', '2000000', '2018-07-17'),
('62293', '33333', 'Thinkpad', '550cv', '100', '100', '0', '0', '100000', '200000', '2018-07-09'),
('6929', '11111', 'Acer', 'E990x', '100', '100', '0', '0', '100000', '200000', '2018-07-07'),
('72219', '11111', 'Asus', 'ROG - g30x', '100', '100', '0', '0', '5000', '6000', '2018-07-05'),
('83078', '11111', 'Maseko', '4444', '100', '100', '0', '0', '100000', '200000', '2018-07-17'),
('85539', '11111', 'tosibah', 'TS-234', '100', '100', '0', '0', '30000', '40000', '2018-07-05'),
('MB990', '11111', 'mkm', 'kmk', '8', '8', '0', '0', '767676', '767676', '2018-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Dpembelian`
--

CREATE TABLE `Dpembelian` (
  `id_dm_pem` varchar(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Dpenjualan`
--

CREATE TABLE `Dpenjualan` (
  `id_dummy` varchar(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Dpenjualan`
--

INSERT INTO `Dpenjualan` (`id_dummy`, `nama_kategori`, `nama`, `tipe`, `harga`, `jumlah`, `total`) VALUES
('21495', 'Asus', 'Samsung', 'A37', '500000', '6', '3000000'),
('2488', 'Asus', 'HP ', '452-3', '4000', '4', '16000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` varchar(5) NOT NULL,
  `id_transaksi` varchar(5) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga_item` varchar(100) NOT NULL,
  `jumlah_item` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `id_transaksi`, `nama_item`, `tipe`, `harga_item`, `jumlah_item`, `total`, `tanggal`) VALUES
('43030', 'TP001', 'Samsung', 'A37', '500000', '50', '25000000', '2018-07-20'),
('74180', 'TP000', 'Samsung', 'A37', '500000', '10', '5000000', '2018-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pem`
--

CREATE TABLE `item_pem` (
  `id_item_pem` varchar(5) NOT NULL,
  `id_pembelian` varchar(5) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga_item` varchar(100) NOT NULL,
  `jumlah_item` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_pem`
--

INSERT INTO `item_pem` (`id_item_pem`, `id_pembelian`, `nama_item`, `tipe`, `harga_item`, `jumlah_item`, `total`, `tanggal`) VALUES
('15780', 'TR001', 'Samsung', 'A37', '500000', '10', '5000000', '2018-07-18'),
('24060', 'TR000', 'Samsung', 'A37', '500000', '11', '5500000', '2018-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('11111', 'Asus'),
('22222', 'Lenovo'),
('33333', 'Thinkpad'),
('44444', 'HP'),
('55555', 'Toshiba'),
('66666', 'Acer'),
('77777', 'Macbook'),
('88888', 'Zyrex'),
('99999', 'Samsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Lpembelian`
--

CREATE TABLE `Lpembelian` (
  `id_pembelian` varchar(5) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `total` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Lpembelian`
--

INSERT INTO `Lpembelian` (`id_pembelian`, `nama_admin`, `nama_barang`, `tipe`, `jumlah`, `harga`, `total`, `tanggal`) VALUES
('45045', 'maseko', 'Acer', 'E990x', '2', '100000', '200000', '2018-07-07'),
('47269', 'maseko', 'HP', '890', '4', '4000', '9999999', '2018-07-05'),
('56592', 'maseko', 'Asus', 'ROG - g30x', '3', '5000', '9999999', '2018-07-05'),
('85382', 'maseko', 'Samsung', 'A37', '5', '320000', '1600000', '2018-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Lpenjualan`
--

CREATE TABLE `Lpenjualan` (
  `id_penjualan` varchar(5) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `totalpembelian` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Tpembelian`
--

CREATE TABLE `Tpembelian` (
  `id_pembelian` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahuang` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Tpembelian`
--

INSERT INTO `Tpembelian` (`id_pembelian`, `nama`, `notelp`, `alamat`, `total`, `tanggal`, `jumlahuang`, `diskon`) VALUES
('TR000', ' Maseko ', '089607244544', 'Jl. Benowo Surabaya ', '5500000', '2018-07-18', '100000000', '1.0'),
('TR001', ' Maseko ', '089607244544', 'Jl. Benowo Surabaya ', '5000000', '2018-07-18', '100000000', '1.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Tpenjualan`
--

CREATE TABLE `Tpenjualan` (
  `id_transaksi` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahuang` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Tpenjualan`
--

INSERT INTO `Tpenjualan` (`id_transaksi`, `nama`, `notelp`, `alamat`, `total`, `tanggal`, `jumlahuang`, `diskon`) VALUES
('TP000', ' maeko ', ' 989898989 ', ' jnjnjnjn ', '5000000', '2018-07-18', '100000000', '1.0'),
('TP001', '  maeko  ', '  989898989  ', '  jnjnjnjn  ', '25000000', '2018-07-20', '100000000', '1.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `status`) VALUES
('40747', 'Iqbal', 'iqbal', 'iqbal', 'kasir'),
('60885', 'fakepanda', 'henshin', '4848', 'superuser'),
('74440', 'Maseko', 'maseko', 'maseko', 'superuser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `Dpembelian`
--
ALTER TABLE `Dpembelian`
  ADD PRIMARY KEY (`id_dm_pem`);

--
-- Indexes for table `Dpenjualan`
--
ALTER TABLE `Dpenjualan`
  ADD PRIMARY KEY (`id_dummy`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `item_pem`
--
ALTER TABLE `item_pem`
  ADD PRIMARY KEY (`id_item_pem`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `Lpembelian`
--
ALTER TABLE `Lpembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `Lpenjualan`
--
ALTER TABLE `Lpenjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `Tpembelian`
--
ALTER TABLE `Tpembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `Tpenjualan`
--
ALTER TABLE `Tpenjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
