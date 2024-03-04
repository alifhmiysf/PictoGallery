-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 02:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pictogallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `idalbum` int(10) UNSIGNED NOT NULL,
  `NamaAlbum` varchar(250) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE `album_foto` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_album` int(11) UNSIGNED NOT NULL,
  `id_foto` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `idfoto` int(11) UNSIGNED NOT NULL,
  `Judul` varchar(250) NOT NULL,
  `Deskripsi` varchar(250) NOT NULL,
  `TanggalUnggahan` datetime NOT NULL,
  `LokasiFile` varchar(250) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `JumlahLike` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentar_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `foto_id` int(11) UNSIGNED NOT NULL,
  `isi_komentar` varchar(250) NOT NULL,
  `tanggal_komentar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) UNSIGNED NOT NULL,
  `fotoid` int(11) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-01-28-022024', 'App\\Database\\Migrations\\Auth', 'default', 'App', 1708995651, 1),
(2, '2024-01-28-022133', 'App\\Database\\Migrations\\Album', 'default', 'App', 1708995651, 1),
(3, '2024-02-10-162207', 'App\\Database\\Migrations\\Foto', 'default', 'App', 1708995652, 1),
(4, '2024-02-10-171829', 'App\\Database\\Migrations\\AlbumFoto', 'default', 'App', 1708995653, 1),
(5, '2024-02-12-024204', 'App\\Database\\Migrations\\Like', 'default', 'App', 1708995653, 1),
(6, '2024-02-13-025330', 'App\\Database\\Migrations\\Komentar', 'default', 'App', 1708995653, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `NamaLengkap` varchar(250) NOT NULL,
  `email_token` varchar(255) DEFAULT NULL,
  `is_confirmed` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idalbum`),
  ADD KEY `album_userid_foreign` (`userid`);

--
-- Indexes for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_foto_id_album_foreign` (`id_album`),
  ADD KEY `album_foto_id_foto_foreign` (`id_foto`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idfoto`),
  ADD KEY `foto_userid_foreign` (`userid`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `komentar_foto_user_id_foreign` (`user_id`),
  ADD KEY `komentar_foto_foto_id_foreign` (`foto_id`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `likeFoto_fotoid_foreign` (`fotoid`),
  ADD KEY `likeFoto_userid_foreign` (`userid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `idalbum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `idfoto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentar_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD CONSTRAINT `album_foto_id_album_foreign` FOREIGN KEY (`id_album`) REFERENCES `album` (`idalbum`) ON DELETE CASCADE,
  ADD CONSTRAINT `album_foto_id_foto_foreign` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`idfoto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_foto_id_foreign` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`idfoto`),
  ADD CONSTRAINT `komentar_foto_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likeFoto_fotoid_foreign` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`idfoto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likeFoto_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
