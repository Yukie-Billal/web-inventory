-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 02:47 AM
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
-- Database: `web-inventor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `serial_number`, `kode_barang`, `nama_barang`, `merek`, `warna`, `satuan`, `kategori_id`, `stok`, `created_at`, `updated_at`) VALUES
(1, '120938', 'L0277-M7210', 'Laptop Modern Age', 'Modern Age', 'Hitam', 'Pcs / Buah', 1, '25', '2023-02-27 02:16:59', '2023-02-27 02:16:59'),
(2, '177821', 'L8204-A1230', 'Laptop 51', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(3, '242351', 'L0533-A3093', 'Laptop 70', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(4, '765814', 'L2276-A0848', 'Laptop 60', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(5, '240585', 'L4639-A9085', 'Laptop 44', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(6, '628267', 'L8698-A9087', 'Laptop 13', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(7, '980727', 'L7518-A8166', 'Laptop 17', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(8, '47280', 'L0432-A2633', 'Laptop 66', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(9, '711739', 'L5502-A4526', 'Laptop 36', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(10, '587827', 'L5670-A4811', 'Laptop 74', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(11, '226916', 'L2908-A4832', 'Laptop 34', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(12, '144394', 'L0896-A5996', 'Laptop 56', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(13, '754041', 'L9867-A7364', 'Laptop 29', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:06', '2023-02-27 02:17:06'),
(14, '153691', 'L4914-A1431', 'Laptop 7', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(15, '980880', 'L8914-A1564', 'Laptop 32', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(16, '311059', 'L7884-A4959', 'Laptop 1', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(17, '216232', 'L5283-A1641', 'Laptop 68', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(18, '725995', 'L8177-A9524', 'Laptop 37', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(19, '77761', 'L1683-A5121', 'Laptop 5', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(20, '690282', 'L6424-A1411', 'Laptop 26', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(21, '901719', 'L8093-A6308', 'Laptop 49', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(22, '335007', 'L7989-A8160', 'Laptop 76', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(23, '952875', 'L3182-A2925', 'Laptop 97', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(24, '462889', 'L4988-A7499', 'Laptop 21', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(25, '328631', 'L3711-A5043', 'Laptop 79', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(26, '220520', 'L7265-A1684', 'Laptop 38', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:07', '2023-02-27 02:17:07'),
(27, '49175', 'L8765-A7942', 'Laptop 52', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(28, '837808', 'L4644-A0060', 'Laptop 53', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(29, '747828', 'L9518-A0246', 'Laptop 24', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(30, '85089', 'L4615-A2496', 'Laptop 82', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(31, '899816', 'L1495-A3332', 'Laptop 4', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(32, '513406', 'L6906-A7089', 'Laptop 20', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(33, '892122', 'L3214-A9465', 'Laptop 31', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(34, '768100', 'L0734-A2547', 'Laptop 11', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(35, '938908', 'L8333-A0797', 'Laptop 47', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:08', '2023-02-27 02:17:08'),
(36, '644890', 'L4516-A0598', 'Laptop 25', 'Asus', 'Hitam', 'Pcs / Buah', 1, '10', '2023-02-27 02:17:09', '2023-02-27 02:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED DEFAULT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_keluar` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar_keranjangs`
--

CREATE TABLE `barang_keluar_keranjangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED DEFAULT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `qty` int NOT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcode_keranjangs`
--

CREATE TABLE `barcode_keranjangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2023-02-27 02:16:59', '2023-02-27 02:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_01_11_064534_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_01_24_070349_create_kategoris_table', 1),
(5, '2023_01_24_081018_create_suppliers_table', 1),
(6, '2023_01_26_024935_create_barangs_table', 1),
(7, '2023_01_26_031730_create_barang_keluars_table', 1),
(8, '2023_01_26_031847_create_barang_masuks_table', 1),
(9, '2023_01_26_101138_create_barang_keluar_keranjangs_table', 1),
(10, '2023_01_27_085657_create_peminjaman_keranjangs_table', 1),
(11, '2023_01_29_081227_create_pinjamans_table', 1),
(12, '2023_01_30_033026_create_pengembalians_table', 1),
(13, '2023_01_30_061030_create_pengembalian_keranjangs_table', 1),
(14, '2023_02_08_072258_create_barcode_keranjangs_table', 1),
(15, '2023_02_21_080545_create_permintaan_pinjamans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_keranjangs`
--

CREATE TABLE `peminjaman_keranjangs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pengembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `lama_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_keranjangs`
--

CREATE TABLE `pengembalian_keranjangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `pinjaman_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pinjamans`
--

CREATE TABLE `permintaan_pinjamans` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL DEFAULT '2023-02-27 00:00:00',
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Di Ajukan',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaan_pinjamans`
--

INSERT INTO `permintaan_pinjamans` (`id`, `tanggal_pengajuan`, `barang_id`, `user_id`, `status`, `read`, `created_at`, `updated_at`) VALUES
(2, '2023-02-27 00:00:00', 1, 2, 'Di Ajukan', 0, '2023-02-27 04:30:17', '2023-02-27 04:30:17'),
(3, '2023-02-27 00:00:00', 23, 2, 'Di Ajukan', 0, '2023-02-27 06:10:23', '2023-02-27 06:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjamans`
--

CREATE TABLE `pinjamans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `barang_id` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `role_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'ADMIN', '2023-02-27 02:16:56', '2023-02-27 02:16:56'),
(2, 'User', 'USER', '2023-02-27 02:16:56', '2023-02-27 02:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `nama_perusahaan`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Prabu Wibisono', 'Tantri Sudiati', '(+62) 29 8110 686', 'Gg. Pelajar Pejuang 45 No. 189, Cimahi 93537, Jabar', '2023-02-27 02:17:09', '2023-02-27 02:17:09'),
(2, 'Arsipatra Wahyudin', 'Anastasia Halima Mandasari M.M.', '(+62) 682 2832 897', 'Ki. Baabur Royan No. 156, Singkawang 97407, Kepri', '2023-02-27 02:17:09', '2023-02-27 02:17:09'),
(3, 'Amelia Usamah', 'Tugiman Wibowo', '0686 9481 063', 'Dk. Kartini No. 951, Administrasi Jakarta Pusat 22742, Lampung', '2023-02-27 02:17:10', '2023-02-27 02:17:10'),
(4, 'Eko Gamblang Mustofa S.T.', 'Kajen Haryanto', '0816 4896 357', 'Gg. Jaksa No. 324, Palangka Raya 70502, NTB', '2023-02-27 02:17:10', '2023-02-27 02:17:10'),
(5, 'Titi Uchita Wijayanti S.I.Kom', 'Lalita Mardhiyah', '(+62) 871 006 423', 'Ds. Monginsidi No. 668, Bandung 93230, Kaltara', '2023-02-27 02:17:10', '2023-02-27 02:17:10'),
(6, 'Daruna Prima Thamrin', 'Hesti Rahayu', '(+62) 421 9813 9325', 'Jr. Dipenogoro No. 480, Bengkulu 20841, Kalsel', '2023-02-27 02:17:10', '2023-02-27 02:17:10'),
(7, 'Bagiya Suryono', 'Lili Suartini', '(+62) 446 1396 5828', 'Kpg. Bhayangkara No. 125, Balikpapan 39658, Banten', '2023-02-27 02:17:10', '2023-02-27 02:17:10'),
(8, 'Galih Nugroho', 'Genta Jamalia Oktaviani M.M.', '(+62) 283 8325 9059', 'Jln. Ekonomi No. 678, Payakumbuh 81921, Papua', '2023-02-27 02:17:11', '2023-02-27 02:17:11'),
(9, 'Queen Rahayu', 'Sari Puspasari', '(+62) 356 2544 616', 'Gg. Gading No. 320, Pariaman 22273, Kalbar', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(10, 'Usyi Permata S.Kom', 'Aurora Hastuti', '0868 2192 2821', 'Psr. Sugiono No. 392, Tanjung Pinang 80064, Banten', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(11, 'Unggul Mandala', 'Rahmi Permata', '(+62) 502 0004 677', 'Kpg. Salak No. 15, Administrasi Jakarta Pusat 47897, Jatim', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(12, 'Prima Nashiruddin S.E.', 'Yance Melani', '(+62) 634 4252 3230', 'Psr. HOS. Cjokroaminoto (Pasirkaliki) No. 742, Administrasi Jakarta Timur 97069, Kaltara', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(13, 'Raditya Halim', 'Caturangga Latupono S.Psi', '021 6413 506', 'Jr. Perintis Kemerdekaan No. 79, Sibolga 65680, Sumut', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(14, 'Samsul Jaka Sinaga', 'Titi Talia Farida S.Ked', '(+62) 341 9211 2451', 'Ki. Tambak No. 89, Bekasi 64059, Sultra', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(15, 'Timbul Koko Permadi M.Kom.', 'Unjani Bella Mulyani S.Kom', '0937 5405 3009', 'Jr. Soekarno Hatta No. 944, Probolinggo 76329, Gorontalo', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(16, 'Bagus Narpati', 'Saka Prabawa Wahyudin', '029 7351 467', 'Ki. Dewi Sartika No. 77, Bima 64249, Sulteng', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(17, 'Padma Wijayanti', 'Tantri Zelda Mayasari S.Sos', '(+62) 725 5964 7974', 'Ds. Baing No. 377, Probolinggo 52559, Kalsel', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(18, 'Oman Sihotang', 'Dina Rahayu', '0404 3532 3036', 'Ds. Kali No. 661, Tangerang 70709, NTB', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(19, 'Panji Kuswoyo', 'Capa Jefri Prasetya', '0344 6610 0478', 'Dk. Bak Mandi No. 23, Bogor 32041, Bali', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(20, 'Banawi Mangunsong S.Ked', 'Gaiman Ibun Sihombing', '0520 7094 287', 'Gg. Basoka Raya No. 674, Parepare 65731, Lampung', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(21, 'Dalimin Napitupulu', 'Naradi Cahyo Maulana S.I.Kom', '(+62) 895 075 752', 'Ds. Laswi No. 97, Pekanbaru 44798, Babel', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(22, 'Karma Hutapea', 'Adika Prasasta M.Kom.', '0946 4872 1871', 'Ki. Panjaitan No. 520, Administrasi Jakarta Selatan 75790, Bali', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(23, 'Eko Hardana Mandala', 'Rafid Waskita S.E.', '(+62) 452 0669 8280', 'Gg. Gading No. 148, Semarang 70722, Jabar', '2023-02-27 02:17:14', '2023-02-27 02:17:14'),
(24, 'Darijan Jaswadi Mandala M.Farm', 'Gaduh Megantara', '(+62) 943 1402 238', 'Dk. Flora No. 863, Jambi 84537, Sumsel', '2023-02-27 02:17:15', '2023-02-27 02:17:15'),
(25, 'Malika Victoria Kusmawati S.Pt', 'Tomi Napitupulu', '023 6968 5048', 'Jr. Baladewa No. 608, Tangerang Selatan 51737, Bali', '2023-02-27 02:17:15', '2023-02-27 02:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `alamat`, `no_tlp`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Email', 'email@gmail.com', '$2y$10$p7lgvguT7inAdoxOC.dFiud2ENHQEI.2C9jsUEYwLJMsz2qrxApe2', 'Indonesia Cimahi Barat', '+6281238812938', 1, '2023-02-27 02:16:58', '2023-02-27 02:16:58'),
(2, 'Yukie M Billal', 'user@gmail.com', '$2y$10$38NzWT9AoOP.qIoHT3DG9eMMNeJLdiIHe6k4EgqaU1pPL/MYliF56', 'Indonesia Cimahi Selatan Cibeber. Pemda 2', '+6281238812938', 2, '2023-02-27 02:16:59', '2023-02-27 08:55:50'),
(3, 'Ihsan Hutasoit', 'cyuniar@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(4, 'Farah Hilda Agustina', 'yolanda.azalea@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(5, 'Elon Usman Waskita', 'warsita11@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(6, 'Fathonah Susanti S.Kom', 'pudjiastuti.sari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(7, 'Anastasia Cornelia Palastri', 'bakianto75@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(8, 'Hasan Embuh Sihotang', 'fathonah71@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(9, 'Alika Hartati', 'hwacana@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(10, 'Febi Anggraini', 'claksmiwati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(11, 'Febi Rahimah', 'vanya39@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(12, 'Elvina Prastuti S.Ked', 'zalindra23@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:16', '2023-02-27 02:17:16'),
(13, 'Adinata Cecep Sitorus S.I.Kom', 'ysihombing@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:17', '2023-02-27 02:17:17'),
(14, 'Gabriella Puspa Yuliarti', 'wulan21@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(15, 'Talia Titi Haryanti S.Farm', 'vsiregar@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(16, 'Jane Maimunah Agustina S.Ked', 'fsaptono@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(17, 'Sari Suartini', 'zmaryadi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(18, 'Empluk Zulkarnain', 'bagus.situmorang@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(19, 'Sadina Mulyani', 'ami.wijayanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(20, 'Usyi Yuniar', 'glaksmiwati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(21, 'Zahra Riyanti', 'gnajmudin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(22, 'Harsaya Capa Manullang S.T.', 'oriyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(23, 'Jarwa Dabukke S.H.', 'natalia92@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(24, 'Hilda Mayasari S.Psi', 'rachel.susanti@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(25, 'Mahesa Pradipta', 'vprasasta@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(26, 'Tri Putu Gunawan', 'hasanah.paiman@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18'),
(27, 'Maimunah Diana Zulaika', 'wkuswandari@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 2, '2023-02-27 02:17:18', '2023-02-27 02:17:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_serial_number_unique` (`serial_number`),
  ADD UNIQUE KEY `barangs_kode_barang_unique` (`kode_barang`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar_keranjangs`
--
ALTER TABLE `barang_keluar_keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuks_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barang_masuks_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `barcode_keranjangs`
--
ALTER TABLE `barcode_keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode_keranjangs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_keranjangs`
--
ALTER TABLE `peminjaman_keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_keranjangs_user_id_foreign` (`user_id`),
  ADD KEY `peminjaman_keranjangs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengembalians_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `pengembalian_keranjangs`
--
ALTER TABLE `pengembalian_keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengembalian_keranjangs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `permintaan_pinjamans`
--
ALTER TABLE `permintaan_pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaan_pinjamans_barang_id_foreign` (`barang_id`),
  ADD KEY `permintaan_pinjamans_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjamans_user_id_foreign` (`user_id`),
  ADD KEY `pinjamans_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_token_unique` (`role_token`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_keluar_keranjangs`
--
ALTER TABLE `barang_keluar_keranjangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barcode_keranjangs`
--
ALTER TABLE `barcode_keranjangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `peminjaman_keranjangs`
--
ALTER TABLE `peminjaman_keranjangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian_keranjangs`
--
ALTER TABLE `pengembalian_keranjangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permintaan_pinjamans`
--
ALTER TABLE `permintaan_pinjamans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjamans`
--
ALTER TABLE `pinjamans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `barcode_keranjangs`
--
ALTER TABLE `barcode_keranjangs`
  ADD CONSTRAINT `barcode_keranjangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_keranjangs`
--
ALTER TABLE `peminjaman_keranjangs`
  ADD CONSTRAINT `peminjaman_keranjangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD CONSTRAINT `pengembalians_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian_keranjangs`
--
ALTER TABLE `pengembalian_keranjangs`
  ADD CONSTRAINT `pengembalian_keranjangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `permintaan_pinjamans`
--
ALTER TABLE `permintaan_pinjamans`
  ADD CONSTRAINT `permintaan_pinjamans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permintaan_pinjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD CONSTRAINT `pinjamans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
