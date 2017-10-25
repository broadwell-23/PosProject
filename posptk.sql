-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 08:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posptk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturans`
--

CREATE TABLE `aturans` (
  `id` int(10) UNSIGNED NOT NULL,
  `isi_aturan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturans`
--

INSERT INTO `aturans` (`id`, `isi_aturan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Surat dari Balai karantina Pertanian Kelas I Pontianak tentang Penerbitan Phytosanitary Certificate (PC) terhadap Kratom (Mitragyna Speciosa)', NULL, '2017-10-17 18:44:00', '2017-10-17 18:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `aturan_barang`
--

CREATE TABLE `aturan_barang` (
  `barang_id` int(11) NOT NULL,
  `aturan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturan_barang`
--

INSERT INTO `aturan_barang` (`barang_id`, `aturan_id`) VALUES
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `keterangan`, `created_at`, `updated_at`) VALUES
(17, 'Kratom (Mitragyna Speciosa)', NULL, '2017-10-19 10:05:10', '2017-10-20 06:55:22'),
(18, 'Batu', NULL, '2017-10-22 06:10:18', '2017-10-22 06:10:18'),
(19, 'Madu', NULL, '2017-10-22 06:19:32', '2017-10-22 06:19:32'),
(20, 'Pasir', NULL, '2017-10-22 06:21:20', '2017-10-22 06:21:20'),
(21, 'Kayu', NULL, '2017-10-22 06:22:28', '2017-10-22 06:22:28'),
(22, 'Buchephalandra', NULL, '2017-10-22 06:23:38', '2017-10-22 06:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengeluar_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `nama_dokumen`, `pengeluar_dokumen`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Material Safety Data Sheet (MSDS)', 'Produsen/Pengirim', NULL, '2017-10-17 18:35:18', '2017-10-17 18:35:18'),
(3, 'Surat Pernyataan Pengirim', 'Kantor Pos', NULL, '2017-10-19 09:46:45', '2017-10-19 09:46:45'),
(4, 'Surat Pengantar', 'Sucofindo', NULL, '2017-10-22 06:03:20', '2017-10-22 06:03:20'),
(5, 'Surat Fumigasi', 'Petugas Fumigasi', NULL, '2017-10-22 06:03:39', '2017-10-22 06:03:39'),
(6, 'Surat Izin Ekspor (untuk kiriman LN)', 'Badan Konservasi Sumber Daya Alam', NULL, '2017-10-22 06:04:17', '2017-10-22 06:04:17'),
(7, 'Surat Karantina Pertanian', 'Balai Karantina Pertanian', NULL, '2017-10-22 06:04:34', '2017-10-22 06:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_barang`
--

CREATE TABLE `dokumen_barang` (
  `barang_id` int(11) NOT NULL,
  `dokumen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_barang`
--

INSERT INTO `dokumen_barang` (`barang_id`, `dokumen_id`) VALUES
(17, 2),
(17, 3),
(18, 2),
(18, 4),
(20, 2),
(20, 4),
(21, 5),
(21, 6),
(22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_15_140954_create_barangs_table', 1),
(4, '2017_10_15_141551_create_tag_barang_table', 1),
(5, '2017_10_15_142140_create_tags_table', 1),
(20, '2017_10_15_144047_create_packings_table', 2),
(21, '2017_10_15_144246_create_packing_barang_table', 2),
(22, '2017_10_15_144335_create_aturans_table', 2),
(23, '2017_10_15_144427_create_aturan_barang_table', 2),
(24, '2017_10_15_144456_create_dokumens_table', 2),
(25, '2017_10_15_144507_create_dokumen_barang_table', 2),
(26, '2017_10_16_082116_create_pesans_table', 2),
(27, '2017_10_16_082653_create_mitras_table', 2),
(29, '2017_10_25_200309_create_transportasis_table', 3),
(30, '2017_10_25_200852_create_transportasi_barang_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mitras`
--

CREATE TABLE `mitras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mitra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitras`
--

INSERT INTO `mitras` (`id`, `nama_mitra`, `alamat`, `telp`, `fax`, `created_at`, `updated_at`) VALUES
(1, 'Badan Konservasi Sumber Daya Alam', 'Jl. Jenderal Ahmad Yani No.121, Bansir Darat, Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78124, Indonesia', '(0561) 735635, 760949', '(0561) 747004', '2017-10-17 14:26:41', '2017-10-17 14:26:41'),
(2, 'Balai Proteksi Tanaman Perkebunan Pontianak', 'Jl. Budi Utomo No. 57', '(0561) 883632, 883637', '(0561) 882784', '2017-10-22 06:26:51', '2017-10-22 06:26:51'),
(3, 'Balai Pengkajian Teknologi Pertanian Kalimantan Barat', 'Jl. Budi Utomo No. 45 Siantan Hulu', '(0561) 882069', '(0561) 884125, 883883', '2017-10-22 06:27:16', '2017-10-22 06:27:16'),
(4, 'Balai Karantina Pertanian Kelas I Pontianak', 'Jl. Pelabuhan Kompleks Pelabuhan', '(0561) 732995', NULL, '2017-10-22 06:27:37', '2017-10-22 06:27:37'),
(5, 'Stasiun Karantina Pertanian Kelas I Entikong', 'Jl. Lintas Malindo No. 22-23 (PPLB) Entikong', '(0564) 31197', NULL, '2017-10-22 06:28:31', '2017-10-22 06:28:31'),
(6, 'Sucofindo', 'Jl. Adisucipto KM.12.9 Arang Limbung Kecamatan Sui Raya Kabupaten Kubu Raya  78115', '(0561) 733334 / 7487748', '(0561) 736319', '2017-10-22 06:28:53', '2017-10-22 06:28:53'),
(7, 'Sucofindo (Unit Pelayanan Ketapang)', 'Jl. Pangeran Cakra No. 52 Kandawangan', '(+62-534) 70120', NULL, '2017-10-22 06:29:18', '2017-10-22 06:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `packings`
--

CREATE TABLE `packings` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_packing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packings`
--

INSERT INTO `packings` (`id`, `nama_packing`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Packing Kotak', NULL, '2017-10-17 17:27:31', '2017-10-17 18:17:06'),
(2, 'Packing Karung', NULL, '2017-10-18 15:12:46', '2017-10-18 15:12:46'),
(3, 'Packing Kayu', NULL, '2017-10-18 15:13:02', '2017-10-18 15:13:02'),
(4, 'Packing Gabus (Styrofoam)', NULL, '2017-10-18 15:13:41', '2017-10-18 15:13:41'),
(5, 'Dikemas dengan Botol Plastik', 'Diberi ruang kosong, jangan diisi sampai penuh.', '2017-10-18 15:14:12', '2017-10-18 15:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `packing_barang`
--

CREATE TABLE `packing_barang` (
  `barang_id` int(11) NOT NULL,
  `packing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packing_barang`
--

INSERT INTO `packing_barang` (`barang_id`, `packing_id`) VALUES
(17, 1),
(18, 1),
(18, 2),
(19, 5),
(20, 1),
(20, 2),
(21, 1),
(22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nama_tag`, `created_at`, `updated_at`) VALUES
(1, 'tumbuhan', '2017-10-17 18:54:05', '2017-10-17 18:55:40'),
(2, 'raw material', '2017-10-17 18:54:21', '2017-10-17 18:54:21'),
(3, 'komoditi', '2017-10-17 18:54:35', '2017-10-17 18:54:35'),
(4, 'hasil alam', '2017-10-22 06:05:44', '2017-10-22 06:05:44'),
(5, 'batu', '2017-10-22 06:05:53', '2017-10-22 06:05:53'),
(6, 'sample batu', '2017-10-22 06:06:02', '2017-10-22 06:06:02'),
(7, 'uji lab', '2017-10-22 06:06:10', '2017-10-22 06:06:10'),
(9, 'madu', '2017-10-22 06:06:32', '2017-10-22 06:06:32'),
(10, 'cairan', '2017-10-22 06:06:39', '2017-10-22 06:06:39'),
(11, 'kayu', '2017-10-22 06:07:12', '2017-10-22 06:07:12'),
(12, 'tumbuhan air', '2017-10-22 06:07:31', '2017-10-22 06:07:31'),
(13, 'aquatic plant', '2017-10-22 06:07:47', '2017-10-22 06:07:47'),
(14, 'tanaman', '2017-10-22 06:08:10', '2017-10-22 06:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `tag_barang`
--

CREATE TABLE `tag_barang` (
  `barang_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_barang`
--

INSERT INTO `tag_barang` (`barang_id`, `tag_id`) VALUES
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(19, 9),
(19, 10),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(21, 4),
(21, 11),
(22, 4),
(22, 12),
(22, 13),
(22, 14);

-- --------------------------------------------------------

--
-- Table structure for table `transportasis`
--

CREATE TABLE `transportasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `moda_transportasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportasis`
--

INSERT INTO `transportasis` (`id`, `moda_transportasi`, `created_at`, `updated_at`) VALUES
(1, 'Udara', '2017-10-25 13:30:34', '2017-10-25 13:30:34'),
(2, 'Darat', '2017-10-25 13:30:40', '2017-10-25 13:30:40'),
(3, 'Laut', '2017-10-25 13:30:47', '2017-10-25 13:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi_barang`
--

CREATE TABLE `transportasi_barang` (
  `barang_id` int(11) NOT NULL,
  `transportasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportasi_barang`
--

INSERT INTO `transportasi_barang` (`barang_id`, `transportasi_id`) VALUES
(18, 2),
(19, 3),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Iky', 'admin@admin.com', '$2y$10$H3TGFuHdiB5iMv7AIOj6teUMPae1E/wA7JU0icse1j8ZHJ2gpAOrG', 'fZS8vRhxc7oRd02bA5icN1F3HhCEjCZKUbL795tyo7kh2IXVkw8blJUrI28e', '2017-10-15 08:12:36', '2017-10-17 09:50:39'),
(3, 'coba', 'coba1@coba.com', '$2y$10$.d1tRfx86FLHPmD2KtFbnO6Fb8TUgmo1dTHLEEXbztSwxBmxXSgby', NULL, '2017-10-25 16:48:09', '2017-10-25 16:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturans`
--
ALTER TABLE `aturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packings`
--
ALTER TABLE `packings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportasis`
--
ALTER TABLE `transportasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturans`
--
ALTER TABLE `aturans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packings`
--
ALTER TABLE `packings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transportasis`
--
ALTER TABLE `transportasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
