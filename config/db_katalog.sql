-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_katalog boneka
CREATE DATABASE IF NOT EXISTS `db_katalog boneka` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_katalog boneka`;

-- Dumping structure for table db_katalog boneka.tb_boneka
CREATE TABLE IF NOT EXISTS `tb_boneka` (
  `id_boneka` int NOT NULL AUTO_INCREMENT,
  `nama boneka` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `bahan` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `harga` decimal(20,6) DEFAULT NULL,
  `id_gambar` int DEFAULT NULL,
  PRIMARY KEY (`id_boneka`),
  KEY `FK_gambar` (`id_gambar`),
  CONSTRAINT `FK_gambar` FOREIGN KEY (`id_gambar`) REFERENCES `tb_gambar` (`id_gambar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_katalog boneka.tb_boneka: ~0 rows (approximately)

-- Dumping structure for table db_katalog boneka.tb_gambar
CREATE TABLE IF NOT EXISTS `tb_gambar` (
  `id_gambar` int NOT NULL AUTO_INCREMENT,
  `id_produk` int DEFAULT NULL,
  `file_produk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `FK_produk` (`id_produk`),
  CONSTRAINT `FK_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_boneka` (`id_boneka`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_katalog boneka.tb_gambar: ~0 rows (approximately)

-- Dumping structure for table db_katalog boneka.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_katalog boneka.tb_kategori: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
