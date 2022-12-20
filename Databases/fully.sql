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
  `barcode` varchar(14) NOT NULL,
  `cate` varchar(255) NOT NULL DEFAULT 'Overige',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikelen: ~51 rows (ongeveer)
INSERT INTO `artikelen` (`id`, `naam`, `info`, `img`, `barcode`, `cate`) VALUES
	(1, 'Acer', 'Info', 'https://th.bing.com/th/id/OIP.sKHKQa51KvFmiGKB259gKQHaFX?w=279&h=202&c=7&r=0&o=5&dpr=1.3&pid=1.7', '1', '1'),
	(3, 'Lenovo', 'Info', 'https://th.bing.com/th/id/OIP.fo5Nz7oAjvmGU3TY0h5AxwHaHa?pid=ImgDet&rs=1', '2', '1'),
	(4, 'Dell', 'Info', 'https://www.ituitverkoop.nl//Files/10/215000/215145/ProductPhotos/Source/1875112410.jpg', '3', '1'),
	(5, 'Macbook', 'Info', 'https://th.bing.com/th/id/OIP.755wzhwdxHb016IJ3KCVIwHaFc?pid=ImgDet&rs=1', '4', '1'),
	(6, 'Asus', 'Info', 'https://th.bing.com/th/id/R.96aa915e6a00d5a006adcaa40331624f?rik=bdJrYbz389LhQA&riu=http%3a%2f%2f1.bp.blogspot.com%2f-p_NeRfUSuSk%2fT7zPgaQPSvI%2fAAAAAAAADeA%2fkqgKFuAE6xI%2fs1600%2fASUS%2bN75SF-DH71.jpg&ehk=F1QyX66MMvpOoFnMHoayicOt1bttwYTJg6jQCVzqCYM%3d&', '5', '1'),
	(7, 'monitor 1', 'info', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '6', '2'),
	(8, 'monitor 2', 'info', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '7', '2'),
	(9, 'monitor 3', 'info', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '8', '2'),
	(10, 'monitor 4', 'info', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '9', '2'),
	(11, 'monitor 5', 'info', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '10', '2'),
	(12, 'hdmi kabel', 'info', 'https://image.allekabels.nl/image/1081345-0/hdmi-kabel-1.4-high-speed-20-meter', '11', '3'),
	(13, 'hdmi kabel', 'info', 'https://image.allekabels.nl/image/1081345-0/hdmi-kabel-1.4-high-speed-20-meter', '12', '3'),
	(14, 'usb kabel', 'info', 'https://image.allekabels.nl/image/1165065-0/usb-3.0-kabel-3-meter.jpg', '13', '3'),
	(15, 'usb kabel', 'info', 'https://image.allekabels.nl/image/1165065-0/usb-3.0-kabel-3-meter.jpg', '14', '3'),
	(16, 'usb-c kabel', 'info', 'https://media.startech.com/cms/products/main/tblt3mmxm.main.jpg', '15', '3'),
	(17, 'usb-c kabel', 'info', 'https://media.startech.com/cms/products/main/tblt3mmxm.main.jpg', '16', '3'),
	(18, 'vga/hdmi kabel', 'info', 'https://media.s-bol.com/qxjYPE343wvy/1200x1173.jpg', '17', '3'),
	(19, 'vga/hdmi kabel', 'info', 'https://media.s-bol.com/qxjYPE343wvy/1200x1173.jpg', '18', '3'),
	(20, 'displayport kabel', 'info', 'https://image.allekabels.nl/image/3726292-0/displayport-kabel-0.5-meter-0.5-meter.jpg', '19', '3'),
	(21, 'displayport kabel', 'info', 'https://image.allekabels.nl/image/3726292-0/displayport-kabel-0.5-meter-0.5-meter.jpg', '20', '3'),
	(22, 'ethernet kabel', 'info', 'https://image.allekabels.nl/image/1098116-0/netwerkkabel-cat-5e-u-utp-lengte-1.5-meter.jpg', '21', '3'),
	(23, 'ethernet kabel', 'info', 'https://image.allekabels.nl/image/1098116-0/netwerkkabel-cat-5e-u-utp-lengte-1.5-meter.jpg', '22', '3'),
	(24, 'laptop oplader ACER', 'info', 'https://media.s-bol.com/qxjllzBnV7RR/550x360.jpg', '23', '3'),
	(25, 'laptop oplader ACER', 'info', 'https://media.s-bol.com/qxjllzBnV7RR/550x360.jpg', '24', '3'),
	(26, 'laptop oplader LENOVO', 'info', 'https://123adapter.nl/img/product/lenovo-ideapad-gaming-3-15arh05-laptop-adapter-135w/800x800_3493_VIB20675SQUARE-2.jpg', '25', '3'),
	(27, 'laptop oplader LENOVO', 'info', 'https://123adapter.nl/img/product/lenovo-ideapad-gaming-3-15arh05-laptop-adapter-135w/800x800_3493_VIB20675SQUARE-2.jpg', '26', '3'),
	(28, 'laptop oplader DELL', 'info', 'https://viadennis.nl/img/product/dell-latitude-14-7490-originele-adapter/800x800_2751_ODELL1953347450PA2E-4.jpg', '27', '3'),
	(31, 'laptop oplader DELL', 'info', 'https://viadennis.nl/img/product/dell-latitude-14-7490-originele-adapter/800x800_2751_ODELL1953347450PA2E-4.jpg', '28', '3'),
	(32, 'laptop oplader MACBOOK', 'info', 'https://www.123accu.nl/image/Huawei_USB-C_65W__QC_3.0_oplader_5_V_-_20_V_3.25_A_65_W_123accu_huismerk_AHU00174_medium.jpg', '29', '3'),
	(33, 'laptop oplader MACBOOK', 'info', 'https://www.123accu.nl/image/Huawei_USB-C_65W__QC_3.0_oplader_5_V_-_20_V_3.25_A_65_W_123accu_huismerk_AHU00174_medium.jpg', '30', '3'),
	(34, 'pringles', 'congrats! you found a easter egg!', 'https://static-images.jumbo.com/product_images/211120221436_472570STK-1_360x360_2.png', '5053990161669', ''),
	(35, 'keyboard', 'info', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '31', '4'),
	(36, 'keyboard', 'info', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '32', '4'),
	(37, 'keyboard', 'info', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '33', '4'),
	(38, 'muis', 'info', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '34', '4'),
	(39, 'muis', 'info', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '35', '4'),
	(40, 'muis', 'info', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '36', '4'),
	(41, 'koptelefoon', 'info', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '37', '4'),
	(42, 'koptelefoon', 'info', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '38', '4'),
	(43, 'koptelefoon', 'info', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '39', '4'),
	(44, 'koffiezetapperaat', 'info', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '40', '4'),
	(45, 'koffiezetapperaat', 'info', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '41', '4'),
	(46, 'koffiezetapperaat', 'info', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '42', '4'),
	(47, 'verlengsnoer', 'info', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '43', '4'),
	(48, 'verlengsnoer', 'info', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '44', '4'),
	(49, 'verlengsnoer', 'info', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '45', '4'),
	(50, 'camera 1', 'info', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '46', '5'),
	(51, 'camera 2', 'info', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '47', '5'),
	(52, 'camera 3', 'info', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '48', '5'),
	(53, 'camera 4', 'info', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '49', '5'),
	(54, 'camera 5', 'info', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '50', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikelges: ~3 rows (ongeveer)
INSERT INTO `artikelges` (`id`, `barcode`, `naam`, `mail`, `uitgedoor`, `opmerking`, `ingedoor`) VALUES
	(1, 1, 'Dimitri', 'dimitri@mail.com', 'King', 'Er zit een kras op de onderkant', 'De boer'),
	(2, 1, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', 'Dimitri', 'zit een kras ergens', 'Dimitri'),
	(3, 4, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', 'Dimitri', 'BEEE', 'Dimitri');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.artikeluit: ~4 rows (ongeveer)
INSERT INTO `artikeluit` (`id`, `barcode`, `naam`, `mail`, `datumuit`, `datumin`, `uitgedoor`) VALUES
	(1, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-27', 'Hessel'),
	(2, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-15', 'Hessel'),
	(3, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-14', 'Hessel'),
	(4, 2, 'Thomas', 'thomas@mail.com', '2022-12-13', '2022-12-29', 'Hessel');

-- Structuur van  tabel uitleensysteem.categorieen wordt geschreven
CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.categorieen: ~0 rows (ongeveer)
INSERT INTO `categorieen` (`id`, `naam`, `img`) VALUES
	(1, 'Laptops', 'https://th.bing.com/th/id/R.67af9d30db5892b1471f61b840b38879?rik=G13jlJ4tY%2b1w3Q&pid=ImgRaw&r=0'),
	(2, 'monitoren', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg'),
	(3, 'kabels', 'https://th.bing.com/th/id/OIP.4xKMLKPQ-XCvCKgCXo39XwHaE8?pid=ImgDet&rs=1'),
	(4, 'assesoires', 'https://deac.nl/application/files/1215/8564/3481/Trotse_dealer_van_overige_machines_en_apparatuur.jpg'),
	(5, 'cameras', 'https://media.s-bol.com/gkjB8Y6g1JK9/550x375.jpg');

-- Structuur van  tabel uitleensysteem.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel uitleensysteem.users: ~0 rows (ongeveer)
INSERT INTO `users` (`id`, `name`, `password`) VALUES
	(1, 'Hessel', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi'),
	(2, 'Dimitri', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi'),
	(3, 'Thomas', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
