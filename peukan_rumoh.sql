-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2025 pada 23.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peukan_rumoh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminapk`
--

CREATE TABLE `adminapk` (
  `id_admin` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adminapk`
--

INSERT INTO `adminapk` (`id_admin`, `username`, `nama`, `email`, `password`) VALUES
('ADM001', 'admin', 'Administrator', 'admin@ecommerce.com', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenpengiriman`
--

CREATE TABLE `agenpengiriman` (
  `id_agen` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agenpengiriman`
--

INSERT INTO `agenpengiriman` (`id_agen`, `username`, `nama`, `email`, `password`) VALUES
('AG001', 'sap_official', 'SAP Express', 'cs@sap.co.id', 'sap123'),
('AG002', 'jnt_official', 'J&T Express', 'cs@jnt.co.id', 'jnt123'),
('AG003', 'abc_official', 'ABC Express', 'cs@abc.com', 'abc123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen_telp`
--

CREATE TABLE `agen_telp` (
  `id_telp` char(50) NOT NULL,
  `telp` char(13) NOT NULL,
  `id_pembeli` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detijual`
--

CREATE TABLE `detijual` (
  `id_detil` char(50) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `no_resi` char(50) DEFAULT NULL,
  `id_produk` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` char(50) NOT NULL,
  `nama_kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
('KAT001', 'Sayuran'),
('KAT002', 'Buah'),
('KAT003', 'Daging dan Ikan'),
('KAT004', 'Bahan Dapur'),
('KAT005', 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metodebayar`
--

CREATE TABLE `metodebayar` (
  `id_metode` char(50) NOT NULL,
  `namaMetode` char(50) NOT NULL,
  `jenisKartu` char(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `metodebayar`
--

INSERT INTO `metodebayar` (`id_metode`, `namaMetode`, `jenisKartu`, `keterangan`) VALUES
('MB001', 'Transfer Bank BCA', 'BCA', 'Transfer via BCA'),
('MB002', 'Transfer Bank Mandiri', 'Mandiri', 'Transfer via Mandiri'),
('MB003', 'GoPay', NULL, 'E-Wallet GoPay'),
('MB004', 'OVO', NULL, 'E-Wallet OVO'),
('MB005', 'COD', NULL, 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `status_pembayaran` char(50) DEFAULT NULL,
  `totalBayar` int(15) NOT NULL,
  `no_resi` char(50) DEFAULT NULL,
  `id_metode` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` char(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli_telp`
--

CREATE TABLE `pembeli_telp` (
  `id_telp` char(50) NOT NULL,
  `telp` char(13) NOT NULL,
  `id_pembeli` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` char(50) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `jalan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `status_pengiriman` varchar(50) DEFAULT NULL,
  `id_agen` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_resi` char(50) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_pembeli` char(50) DEFAULT NULL,
  `id_pengiriman` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(10) DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL,
  `satuan` int(10) DEFAULT NULL,
  `statusPro` varchar(255) DEFAULT NULL,
  `id_toko` char(50) DEFAULT NULL,
  `id_kat` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` char(50) NOT NULL,
  `nilai_rating` int(10) NOT NULL CHECK (`nilai_rating` >= 1 and `nilai_rating` <= 5),
  `review_text` varchar(255) DEFAULT NULL,
  `tgl_rating` date NOT NULL,
  `id_pembeli` char(50) DEFAULT NULL,
  `no_resi` char(50) DEFAULT NULL,
  `id_produk` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `id_retur` char(50) NOT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `tgl_retur` date NOT NULL,
  `status_retur` varchar(255) DEFAULT NULL,
  `dana_pengembalian` varchar(255) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `id_pembeli` char(50) DEFAULT NULL,
  `no_resi` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` char(50) NOT NULL,
  `nama` char(50) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama`, `status`) VALUES
('ST001', 'Menunggu Pembayaran', 'PENDING'),
('ST002', 'Pembayaran Dikonfirmasi', 'PAID'),
('ST003', 'Sedang Dikemas', 'PACKING'),
('ST004', 'Dikirim', 'SHIPPED'),
('ST005', 'Selesai', 'COMPLETED'),
('ST006', 'Dibatalkan', 'CANCELLED');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusjual`
--

CREATE TABLE `statusjual` (
  `id_stat` char(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_resi` char(50) DEFAULT NULL,
  `id_status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` char(50) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adminapk`
--
ALTER TABLE `adminapk`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `agenpengiriman`
--
ALTER TABLE `agenpengiriman`
  ADD PRIMARY KEY (`id_agen`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `agen_telp`
--
ALTER TABLE `agen_telp`
  ADD PRIMARY KEY (`id_telp`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `detijual`
--
ALTER TABLE `detijual`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `no_resi` (`no_resi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `metodebayar`
--
ALTER TABLE `metodebayar`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_metode` (`id_metode`),
  ADD KEY `fk_pembayaran_pesanan` (`no_resi`),
  ADD KEY `idx_pembayaran_tanggal` (`tgl_pembayaran`),
  ADD KEY `idx_pembayaran_status` (`status_pembayaran`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pembeli_telp`
--
ALTER TABLE `pembeli_telp`
  ADD PRIMARY KEY (`id_telp`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_agen` (`id_agen`),
  ADD KEY `idx_pengiriman_tanggal` (`tgl_pengiriman`),
  ADD KEY `idx_pengiriman_status` (`status_pengiriman`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `idx_pesanan_tanggal` (`tgl_pesanan`),
  ADD KEY `idx_pesanan_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `idx_produk_nama` (`nama_produk`),
  ADD KEY `idx_produk_harga` (`harga`),
  ADD KEY `idx_produk_toko` (`id_toko`),
  ADD KEY `idx_produk_kategori` (`id_kat`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `no_resi` (`no_resi`),
  ADD KEY `idx_rating_nilai` (`nilai_rating`),
  ADD KEY `idx_rating_produk` (`id_produk`),
  ADD KEY `idx_rating_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `no_resi` (`no_resi`),
  ADD KEY `idx_retur_tanggal` (`tgl_retur`),
  ADD KEY `idx_retur_status` (`status_retur`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `statusjual`
--
ALTER TABLE `statusjual`
  ADD PRIMARY KEY (`id_stat`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `fk_statusjual_pesanan` (`no_resi`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agen_telp`
--
ALTER TABLE `agen_telp`
  ADD CONSTRAINT `agen_telp_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `agenpengiriman` (`id_agen`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detijual`
--
ALTER TABLE `detijual`
  ADD CONSTRAINT `detijual_ibfk_1` FOREIGN KEY (`no_resi`) REFERENCES `pesanan` (`no_resi`) ON DELETE CASCADE,
  ADD CONSTRAINT `detijual_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pesanan` FOREIGN KEY (`no_resi`) REFERENCES `pesanan` (`no_resi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metodebayar` (`id_metode`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pembeli_telp`
--
ALTER TABLE `pembeli_telp`
  ADD CONSTRAINT `pembeli_telp_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_agen`) REFERENCES `agenpengiriman` (`id_agen`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE SET NULL,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`no_resi`) REFERENCES `pesanan` (`no_resi`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE,
  ADD CONSTRAINT `retur_ibfk_2` FOREIGN KEY (`no_resi`) REFERENCES `pesanan` (`no_resi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `statusjual`
--
ALTER TABLE `statusjual`
  ADD CONSTRAINT `fk_statusjual_pesanan` FOREIGN KEY (`no_resi`) REFERENCES `pesanan` (`no_resi`) ON DELETE CASCADE,
  ADD CONSTRAINT `statusjual_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
