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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikelen: ~6 rows (ongeveer)
INSERT INTO `artikelen` (`id`, `naam`, `info`, `img`, `barcode`) VALUES
	(1, 'Acer', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1038852627053686934/image.png', 1),
	(2, 'Samsung', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1037457101347369060/unknown.png', 2),
	(3, 'Lenovo', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1034563102009720852/unknown.png', 3),
	(4, 'Apple', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1034549292351885422/unknown.png', 4),
	(5, 'Macbook', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1034549292351885422/unknown.png', 5),
	(6, 'Wist geen merk meer', 'Info', 'https://cdn.discordapp.com/attachments/1032390738069159957/1034549292351885422/unknown.png', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikeluit: ~1 rows (ongeveer)
INSERT INTO `artikeluit` (`id`, `barcode`, `naam`, `mail`, `datumuit`, `datumin`, `uitgedoor`) VALUES
	(1, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-27', 'ingelogged user');

-- Structuur van  tabel uitleensysteem.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.users: ~0 rows (ongeveer)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
