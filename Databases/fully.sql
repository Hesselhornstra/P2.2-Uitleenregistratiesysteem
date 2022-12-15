-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van uitleensysteem wordt geschreven
CREATE DATABASE IF NOT EXISTS `uitleensysteem` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `uitleensysteem`;

-- Structuur van  tabel uitleensysteem.artikelen wordt geschreven
CREATE TABLE IF NOT EXISTS `artikelen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL DEFAULT '0',
  `info` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `barcode` int(11) NOT NULL,
  `cate` varchar(255) NOT NULL DEFAULT 'Overige',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikelen: ~6 rows (ongeveer)
INSERT INTO `artikelen` (`id`, `naam`, `info`, `img`, `barcode`, `cate`) VALUES
	(1, 'Acer', 'Info', 'https://th.bing.com/th/id/OIP.sKHKQa51KvFmiGKB259gKQHaFX?w=279&h=202&c=7&r=0&o=5&dpr=1.3&pid=1.7', 1, 'Laptops'),
	(2, 'Samsung', 'Info', 'https://th.bing.com/th/id/R.9b32fb545298c9666dd4e83301105f9d?rik=pT%2bls36iah421A&pid=ImgRaw&r=0', 2, 'Laptops'),
	(3, 'Lenovo', 'Info', 'https://th.bing.com/th/id/OIP.fo5Nz7oAjvmGU3TY0h5AxwHaHa?pid=ImgDet&rs=1', 3, 'Laptops'),
	(4, 'Apple', 'Info', 'https://th.bing.com/th/id/OIP.IKcadL2WTD2Aa6_fDbY3VAHaEo?w=256&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 4, 'Laptops'),
	(5, 'Macbook', 'Info', 'https://th.bing.com/th/id/OIP.755wzhwdxHb016IJ3KCVIwHaFc?pid=ImgDet&rs=1', 5, 'Laptops'),
	(6, 'Asus', 'Info', 'https://th.bing.com/th/id/R.96aa915e6a00d5a006adcaa40331624f?rik=bdJrYbz389LhQA&riu=http%3a%2f%2f1.bp.blogspot.com%2f-p_NeRfUSuSk%2fT7zPgaQPSvI%2fAAAAAAAADeA%2fkqgKFuAE6xI%2fs1600%2fASUS%2bN75SF-DH71.jpg&ehk=F1QyX66MMvpOoFnMHoayicOt1bttwYTJg6jQCVzqCYM%3d&', 6, 'Laptops');

-- Structuur van  tabel uitleensysteem.artikelges wordt geschreven
CREATE TABLE IF NOT EXISTS `artikelges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `mail` varchar(255) NOT NULL DEFAULT '',
  `uitgedoor` varchar(255) NOT NULL DEFAULT '',
  `opmerking` varchar(255) NOT NULL DEFAULT '',
  `ingedoor` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikelges: ~2 rows (ongeveer)
INSERT INTO `artikelges` (`id`, `barcode`, `naam`, `mail`, `uitgedoor`, `opmerking`, `ingedoor`) VALUES
	(1, 1, 'Dimitri', 'dimitri@mail.com', 'King', 'Er zit een kras op de onderkant', 'De boer');

-- Structuur van  tabel uitleensysteem.artikeluit wordt geschreven
CREATE TABLE IF NOT EXISTS `artikeluit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `mail` varchar(255) NOT NULL DEFAULT '',
  `datumuit` varchar(255) NOT NULL DEFAULT '',
  `datumin` varchar(255) NOT NULL DEFAULT '',
  `uitgedoor` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikeluit: ~3 rows (ongeveer)
INSERT INTO `artikeluit` (`id`, `barcode`, `naam`, `mail`, `datumuit`, `datumin`, `uitgedoor`) VALUES
	(1, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-27', 'ingelogged user'),
	(2, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-15', 'ingelogged user'),
	(3, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-14', 'ingelogged user'),
	(4, 2, 'Thomas', 'thomas@mail.com', '2022-12-15', '2022-12-29', 'Hessel');

-- Structuur van  tabel uitleensysteem.categorieen wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.categorieen: ~3 rows (ongeveer)
INSERT INTO `categorieen` (`id`, `naam`, `img`) VALUES
	(1, 'Laptops', 'https://th.bing.com/th/id/R.67af9d30db5892b1471f61b840b38879?rik=G13jlJ4tY%2b1w3Q&pid=ImgRaw&r=0'),
	(2, 'Kabels', 'https://th.bing.com/th/id/OIP.4xKMLKPQ-XCvCKgCXo39XwHaE8?pid=ImgDet&rs=1'),
	(3, 'Overige', 'https://deac.nl/application/files/1215/8564/3481/Trotse_dealer_van_overige_machines_en_apparatuur.jpg');

-- Structuur van  tabel uitleensysteem.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.users: ~0 rows (ongeveer)
INSERT INTO `users` (`id`, `name`, `password`) VALUES
	(1, 'Hessel', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
