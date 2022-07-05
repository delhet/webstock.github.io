-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 07.32
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `for_store_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode_barang`, `nama_barang`, `id_kategori`, `stock`, `unit_satuan`, `harga_beli`, `harga_jual`, `for_store_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'PULSA_INDOSAT_10K', 'Pulsa Indosat - 10.000', 1, 97, 'PCS', 8500, 11000, 1, NULL, '2022-05-12 22:08:54', NULL),
(3, 'PULSA_INDOSAT_25K', 'Pulsa Indosat - 25.000', 1, 88, 'PCS', 23500, 27000, 1, NULL, '2022-07-04 05:05:17', NULL),
(4, 'PULSA_INDOSAT_50K', 'Pulsa Indosat - 50.000', 1, 2, 'PCS', 48500, 52000, 2, NULL, '2022-07-04 05:17:49', NULL),
(5, 'PULSA_INDOSAT_100K', 'Pulsa Indosat - 100.000', 1, 99, 'PCS', 98500, 102000, 1, NULL, '2022-06-20 02:43:05', NULL),
(6, 'KPP_INDOSAT', 'Perdana Indosat', 2, 80, 'PCS', 12500, 15000, 1, NULL, '2022-06-20 02:42:59', NULL),
(7, 'KPP_TELKOMSEL', 'Perdana Telkomsel', 2, 122, 'PCS', 12500, 15000, 1, NULL, '2022-06-20 02:42:13', NULL),
(8, 'KPP_TRI', 'Perdana Tri', 2, 97, 'PCS', 12500, 15000, 1, NULL, '2022-05-12 22:07:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_store_id` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telp`, `posisi`, `email`, `for_store_id`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AdminCell', '1999-01-01', 'L', 'Jl Tj Duren Raya', '08129029022', 'Admin', 'admin@gmail.com', 1, '$2a$12$8601ki3zJND9Gpkvh7hev.nWJ2ZbZBVIPxLNHCvVDqrTn1XzL6DSu', NULL, NULL, NULL),
(2, 'Kazu', '1999-12-20', 'L', 'Test', '0999999', 'Karyawan', 'kazu@gg.com', 1, '$2y$10$iXnf.cmqOzlYerdBhmEQJus5CjFMnil8svj60MGyZVnMrb/8GV1eG', '2021-12-19 17:55:23', '2021-12-20 08:44:20', NULL),
(3, 'Asep', '1998-12-12', 'L', 'Asep Uhuy', '081212121', 'Admin', 'asep@gmail.com', 2, '$2y$10$yYZcfe/57nF0IidhR/0FPuq.6.fePL.4taZolnXss1BJPosZkD5O6', '2022-07-04 02:46:46', '2022-07-04 02:46:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_barang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kode_kategori`, `kategori_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PLS', 'PULSA', '2022-05-12 21:40:54', '2022-05-12 21:40:54', NULL),
(2, 'KPD', 'KARTU PERDANA', '2022-05-12 21:41:00', '2022-05-12 21:41:00', NULL),
(3, 'KKU', 'KARTU KUOTA', '2022-05-12 21:41:05', '2022-05-12 21:41:05', NULL),
(4, 'ACC', 'ACCESSORIES', '2022-05-12 21:41:10', '2022-05-12 21:41:10', NULL),
(5, 'ACK', 'ACCESSORIES KOMPUTER', '2022-05-12 21:41:15', '2022-05-12 21:41:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_11_17_162345_create_karyawans_table', 1),
(2, '2021_11_17_162535_create_kategoris_table', 1),
(3, '2021_11_17_162541_create_spareparts_table', 1),
(4, '2021_11_17_162548_create_pembelian_barangs_table', 1),
(6, '2021_11_17_164816_create_pembelian_barang_details_table', 1),
(8, '2022_06_19_225941_create_stores_table', 2),
(13, '2021_11_17_162555_create_transfer_barangs_table', 3),
(14, '2021_11_17_164904_create_transfer_barang_details_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_ins`
--

CREATE TABLE `stock_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_document` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_document` date NOT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `catatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_ins`
--

INSERT INTO `stock_ins` (`id`, `no_document`, `tanggal_document`, `id_karyawan`, `catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Z1DK8HGSRQ', '2022-05-13', 1, 'Transaksi hari ini', '2022-05-12 21:47:55', '2022-05-12 21:47:55', NULL),
(2, 'VIEJC31TCM', '2022-05-11', 1, 'Pembelian 11 mei 2022', '2022-05-12 22:07:14', '2022-05-12 22:07:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_in_details`
--

CREATE TABLE `stock_in_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_in_id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_in_details`
--

INSERT INTO `stock_in_details` (`id`, `stock_in_id`, `id_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 2, '2022-06-20 02:42:59', '2022-06-20 02:42:59'),
(2, 2, 5, 1, '2022-06-20 02:43:05', '2022-06-20 02:43:05'),
(3, 1, 3, 12, '2022-07-04 05:05:17', '2022-07-04 05:05:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_store` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_store` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stores`
--

INSERT INTO `stores` (`id`, `kode_store`, `nama_store`, `alamat_lengkap`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'STR_JKT1', 'Toko Jakarta 1', 'Jl Apa Adanya - Jakarta Timur', NULL, NULL, NULL),
(2, 'STR_JKT2', 'Toko Jakarta 2', 'Jl Sederhana - Jakarta Pusat', NULL, '2022-06-19 16:46:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_barangs`
--

CREATE TABLE `transfer_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_document` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_document` date NOT NULL,
  `dari_store_id` bigint(20) UNSIGNED NOT NULL,
  `tujuan_store_id` bigint(20) UNSIGNED NOT NULL,
  `catatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_barang_details`
--

CREATE TABLE `transfer_barang_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transfer_barang_id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spareparts_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_barangs_id_karyawan_foreign` (`id_karyawan`);

--
-- Indeks untuk tabel `stock_in_details`
--
ALTER TABLE `stock_in_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_barang_details_id_pembelian_foreign` (`stock_in_id`),
  ADD KEY `pembelian_barang_details_id_sparepart_foreign` (`id_barang`);

--
-- Indeks untuk tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfer_barangs`
--
ALTER TABLE `transfer_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_barangs_dari_store_id_foreign` (`dari_store_id`),
  ADD KEY `transfer_barangs_tujuan_store_id_foreign` (`tujuan_store_id`),
  ADD KEY `transfer_barangs_id_karyawan_foreign` (`id_karyawan`);

--
-- Indeks untuk tabel `transfer_barang_details`
--
ALTER TABLE `transfer_barang_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_barang_details_transfer_barang_id_foreign` (`transfer_barang_id`),
  ADD KEY `transfer_barang_details_id_barang_foreign` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stock_in_details`
--
ALTER TABLE `stock_in_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transfer_barangs`
--
ALTER TABLE `transfer_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transfer_barang_details`
--
ALTER TABLE `transfer_barang_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `spareparts_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`);

--
-- Ketidakleluasaan untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD CONSTRAINT `pembelian_barangs_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id`);

--
-- Ketidakleluasaan untuk tabel `stock_in_details`
--
ALTER TABLE `stock_in_details`
  ADD CONSTRAINT `pembelian_barang_details_id_pembelian_foreign` FOREIGN KEY (`stock_in_id`) REFERENCES `stock_ins` (`id`),
  ADD CONSTRAINT `pembelian_barang_details_id_sparepart_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`);

--
-- Ketidakleluasaan untuk tabel `transfer_barangs`
--
ALTER TABLE `transfer_barangs`
  ADD CONSTRAINT `transfer_barangs_dari_store_id_foreign` FOREIGN KEY (`dari_store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `transfer_barangs_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id`),
  ADD CONSTRAINT `transfer_barangs_tujuan_store_id_foreign` FOREIGN KEY (`tujuan_store_id`) REFERENCES `stores` (`id`);

--
-- Ketidakleluasaan untuk tabel `transfer_barang_details`
--
ALTER TABLE `transfer_barang_details`
  ADD CONSTRAINT `transfer_barang_details_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `transfer_barang_details_transfer_barang_id_foreign` FOREIGN KEY (`transfer_barang_id`) REFERENCES `transfer_barangs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
