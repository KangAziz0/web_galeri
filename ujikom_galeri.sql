-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumId` bigint(20) UNSIGNED NOT NULL,
  `namaAlbum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalDibuat` date NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumId`, `namaAlbum`, `descripsi`, `tanggalDibuat`, `userId`, `created_at`, `updated_at`) VALUES
(8, 'yang mau bole', 'dm aja', '2024-02-16', 5, '2024-02-15 23:53:43', '2024-02-15 23:53:43'),
(10, 'yang Mau Dm', 'aa', '2024-02-16', 2, '2024-02-16 00:18:28', '2024-02-16 00:18:28'),
(12, 'Animee', 'ea', '2024-02-16', 7, '2024-02-16 01:28:24', '2024-02-16 01:28:24'),
(13, 'bagus ga ges', 'bole', '2024-02-18', 8, '2024-02-17 19:48:12', '2024-02-17 19:48:12'),
(16, 'qqa', 'aa', '2024-02-19', 1, '2024-02-18 22:59:38', '2024-02-18 22:59:38'),
(17, 'a', 'aaa', '2024-02-19', 1, '2024-02-18 23:01:35', '2024-02-18 23:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoId` bigint(20) UNSIGNED NOT NULL,
  `judulfoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsiFoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalUnggah` date NOT NULL,
  `lokasiFile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoId`, `judulfoto`, `deskripsiFoto`, `tanggalUnggah`, `lokasiFile`, `albumId`, `userId`, `created_at`, `updated_at`) VALUES
(12, 'yang mau bole', 'dm aja', '2024-02-16', 'image_8.jpg', 8, 5, '2024-02-15 23:53:43', '2024-02-15 23:53:43'),
(13, 'yang mau bole', 'dm aja', '2024-02-16', 'image_27.jpg', 8, 5, '2024-02-15 23:53:43', '2024-02-15 23:53:43'),
(14, 'Kehidupan', 'aa', '2024-02-16', 'image_7.jpg', 10, 2, '2024-02-16 00:18:28', '2024-02-16 00:20:00'),
(15, 'pegunungan', 'Bole', '2024-02-16', 'image_31.jpg', 10, 2, '2024-02-16 00:18:28', '2024-02-16 00:19:41'),
(16, 'Animee', 'ea', '2024-02-16', 'image_2.jpg', 12, 7, '2024-02-16 01:28:24', '2024-02-16 01:28:24'),
(17, 'Animee', 'ea', '2024-02-16', 'image_7.jpg', 12, 7, '2024-02-16 01:28:24', '2024-02-16 01:28:24'),
(18, 'Rumah Impian', 'bole', '2024-02-18', 'image_6.jpg', 13, 8, '2024-02-17 19:48:12', '2024-02-17 19:52:18'),
(19, 'Pelangi', 'Bagus', '2024-02-18', 'image_22.jpg', 13, 8, '2024-02-17 19:48:12', '2024-02-17 19:52:01'),
(26, 'qqa', 'Sungai', '2024-02-19', 'image_1.jpg', 16, 1, '2024-02-18 22:59:38', '2024-02-18 22:59:38'),
(27, 'qqa', 'Anime', '2024-02-19', 'image_97.jpg', 16, 1, '2024-02-18 22:59:38', '2024-02-18 22:59:38'),
(28, 'a', '', '2024-02-19', 'image_16.jpg', 17, 1, '2024-02-18 23:01:35', '2024-02-18 23:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentarId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `fotoId` bigint(20) UNSIGNED NOT NULL,
  `isiKomentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalKomentar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`komentarId`, `userId`, `fotoId`, `isiKomentar`, `tanggalKomentar`, `created_at`, `updated_at`) VALUES
(59, 5, 12, 'yang bener', '2024-02-16', '2024-02-15 23:54:17', '2024-02-15 23:54:17'),
(60, 1, 13, 'bagus uy', '2024-02-16', '2024-02-16 00:14:36', '2024-02-16 00:14:36'),
(64, 2, 12, 'test', '2024-02-16', '2024-02-16 01:02:00', '2024-02-16 01:02:00'),
(65, 7, 16, 'nin', '2024-02-16', '2024-02-16 01:29:41', '2024-02-16 01:29:41'),
(78, 1, 15, 'oi', '2024-02-17', '2024-02-17 00:26:01', '2024-02-17 00:26:01'),
(93, 8, 18, 'bagys', '2024-02-18', '2024-02-17 19:49:08', '2024-02-17 19:49:08'),
(98, 1, 14, 'Minta Dong', '2024-02-19', '2024-02-18 19:57:25', '2024-02-18 19:57:25'),
(100, 9, 14, 'test', '2024-02-19', '2024-02-19 07:06:38', '2024-02-19 07:06:38'),
(101, 5, 14, 'tt', '2024-02-22', '2024-02-22 03:21:45', '2024-02-22 03:21:45');

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`id` bigint(20) unsigned
,`NamaAlbum` varchar(255)
,`deskripsi` text
,`created_at` timestamp
,`updated_at` timestamp
,`userid` bigint(20) unsigned
,`jumlahfoto` bigint(21)
,`jumlahlike` bigint(21)
,`jumlahkomentar` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `likeId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `fotoId` bigint(20) UNSIGNED NOT NULL,
  `tanggalLike` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`likeId`, `userId`, `fotoId`, `tanggalLike`, `created_at`, `updated_at`) VALUES
(39, 2, 15, '2024-02-16', '2024-02-16 00:20:16', '2024-02-16 00:20:16'),
(40, 2, 14, '2024-02-16', '2024-02-16 00:20:22', '2024-02-16 00:20:22'),
(41, 7, 16, '2024-02-16', '2024-02-16 01:29:29', '2024-02-16 01:29:29'),
(57, 1, 16, '2024-02-17', '2024-02-17 06:24:18', '2024-02-17 06:24:18'),
(69, 1, 13, '2024-02-17', '2024-02-17 08:44:05', '2024-02-17 08:44:05'),
(71, 5, 14, '2024-02-17', '2024-02-17 08:49:38', '2024-02-17 08:49:38'),
(74, 5, 17, '2024-02-17', '2024-02-17 08:54:56', '2024-02-17 08:54:56'),
(79, 1, 17, '2024-02-17', '2024-02-17 09:16:06', '2024-02-17 09:16:06'),
(80, 1, 12, '2024-02-17', '2024-02-17 09:16:17', '2024-02-17 09:16:17'),
(82, 1, 15, '2024-02-17', '2024-02-17 09:34:28', '2024-02-17 09:34:28'),
(86, 5, 15, '2024-02-17', '2024-02-17 09:48:49', '2024-02-17 09:48:49'),
(94, 8, 18, '2024-02-18', '2024-02-17 19:48:30', '2024-02-17 19:48:30'),
(95, 8, 19, '2024-02-18', '2024-02-17 19:49:18', '2024-02-17 19:49:18'),
(100, 1, 26, '2024-02-19', '2024-02-18 23:00:55', '2024-02-18 23:00:55'),
(102, 9, 17, '2024-02-19', '2024-02-19 07:08:09', '2024-02-19 07:08:09'),
(105, 5, 27, '2024-02-22', '2024-02-22 02:11:56', '2024-02-22 02:11:56'),
(106, 5, 28, '2024-02-22', '2024-02-22 02:57:02', '2024-02-22 02:57:02'),
(107, 5, 13, '2024-04-03', '2024-04-02 22:46:07', '2024-04-02 22:46:07');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_02_01_120522_create_album_table', 1),
(4, '2024_02_01_120538_create_foto_table', 1),
(5, '2024_02_01_121503_add__user_id_to_album', 1),
(6, '2024_02_01_122038_add_album_id_to_foto', 1),
(7, '2024_02_01_122413_add_user_id_to_foto', 1),
(8, '2024_02_01_123512_create_komentar_foto_table', 1),
(9, '2024_02_01_123533_create_like_foto_table', 1),
(10, '2024_02_01_123841_add_user_id_to_komentar_foto', 1),
(11, '2024_02_01_123920_add_foto_id_to_komentar_foto', 1),
(12, '2024_02_01_123948_add_user_id_to_like_foto', 1),
(13, '2024_02_01_124010_add_foto_id_to_like_foto', 1),
(14, '2024_02_05_013755_create_tkeranjang_table', 1),
(15, '2024_02_05_014155_add_user_id_to_tkeranjang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tkeranjang`
--

CREATE TABLE `tkeranjang` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `lokasiFile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `Foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhamad Aziz', '$2y$12$zoMDJjv7f2wzq5D5/EcGCuoUojL25FH1u0Q5Y/DI4m2W31W31oQTm', 'Muhammadazizabdulaziz35@gmail.com', 'aziz', 'Margaasih', 'image_16.jpg', NULL, '2024-02-11 22:10:56', '2024-02-25 18:53:53'),
(2, 'fadil', '$2y$12$V7qWdYLqRwMMVl6PIy7lOeQsVNb.EvSUO.bnsR298GyCLlmHZvuQu', 'jamal@gmail.com', 'fadil', 'Bandung', 'leo.jpg', NULL, '2024-02-11 22:45:48', '2024-02-11 22:46:29'),
(5, 'aldi', '$2y$12$nb7.YTgpmqTbztc3ubV9o.V29KugknUDp5LuVIWeXOXMuyc.YqrYG', 'aldi@gmail.com', 'aldi', 'Rancamalangg', 'image_27.jpg', NULL, '2024-02-11 23:51:04', '2024-02-22 02:56:17'),
(6, 'test', '$2y$12$Ac6Vsw4H7q1BD5J4ctXrsuHYowb9NiSkwfiY3W2BawMqwz.AU.abC', 'test@gmail.com', 'test', '1', '', NULL, '2024-02-12 01:33:15', '2024-02-12 01:33:15'),
(7, 'faldi', '$2y$12$Fuz68H1Rqv4401UMya0dfOpNNerUAKEB1tz36/N5S.wUtYFmvOePa', 'faldi@gmail.com', 'faldi hai', 'bandung', 'image_5.jpg', NULL, '2024-02-16 01:26:46', '2024-02-16 01:27:39'),
(8, 'admin', '$2y$12$5ngxA8AODf617XoC26cZV.TKeDzR2YrfzzU2rQZ42heVPBBOQ921O', 'admin@gmail.com', 'admin', 'bandu', 'image_11.jpg', NULL, '2024-02-17 19:06:07', '2024-02-17 19:41:14'),
(9, 'epul', '$2y$12$6CNWo5ixUIKHucDEKzLvZe56U0AWdRDn2ntu3grfueAfzVwlItRau', 'epul@gmail.com', 'Epul Maulana', 'Margaasih', 'image_34.jpg', NULL, '2024-02-19 07:01:29', '2024-02-19 07:02:52');

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS SELECT `album`.`albumId` AS `id`, `album`.`namaAlbum` AS `NamaAlbum`, `album`.`descripsi` AS `deskripsi`, `album`.`created_at` AS `created_at`, `album`.`updated_at` AS `updated_at`, `album`.`userId` AS `userid`, ifnull(`foto`.`foto_count`,0) AS `jumlahfoto`, ifnull(`like_foto`.`like_count`,0) AS `jumlahlike`, ifnull(`komentar_foto`.`komentar_count`,0) AS `jumlahkomentar` FROM (((`album` left join (select `foto`.`albumId` AS `Albumid`,count(0) AS `foto_count` from `foto` group by `foto`.`albumId`) `foto` on(`foto`.`Albumid` = `album`.`albumId`)) left join (select `foto`.`albumId` AS `Albumid`,count(0) AS `like_count` from (`like_foto` join `foto` on(`like_foto`.`fotoId` = `foto`.`fotoId`)) group by `foto`.`albumId`) `like_foto` on(`like_foto`.`Albumid` = `album`.`albumId`)) left join (select `foto`.`albumId` AS `Albumid`,count(0) AS `komentar_count` from (`komentar_foto` join `foto` on(`komentar_foto`.`fotoId` = `foto`.`fotoId`)) group by `foto`.`albumId`) `komentar_foto` on(`komentar_foto`.`Albumid` = `album`.`albumId`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumId`),
  ADD KEY `album_userid_foreign` (`userId`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoId`),
  ADD KEY `foto_albumid_foreign` (`albumId`),
  ADD KEY `foto_userid_foreign` (`userId`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentarId`),
  ADD KEY `komentar_foto_userid_foreign` (`userId`),
  ADD KEY `komentar_foto_fotoid_foreign` (`fotoId`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`likeId`),
  ADD KEY `like_foto_userid_foreign` (`userId`),
  ADD KEY `like_foto_fotoid_foreign` (`fotoId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `tkeranjang_userid_foreign` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentarId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `likeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_albumid_foreign` FOREIGN KEY (`albumId`) REFERENCES `album` (`albumId`) ON DELETE CASCADE,
  ADD CONSTRAINT `foto_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`);

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_fotoid_foreign` FOREIGN KEY (`fotoId`) REFERENCES `foto` (`fotoId`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_foto_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`);

--
-- Constraints for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD CONSTRAINT `like_foto_fotoid_foreign` FOREIGN KEY (`fotoId`) REFERENCES `foto` (`fotoId`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_foto_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`);

--
-- Constraints for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  ADD CONSTRAINT `tkeranjang_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
