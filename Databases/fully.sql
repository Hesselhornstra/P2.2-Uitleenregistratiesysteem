-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 jan 2023 om 12:05
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uitleensysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikelen`
--

CREATE TABLE `artikelen` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL DEFAULT '0',
  `info` varchar(999) NOT NULL DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `barcode` varchar(14) NOT NULL,
  `cate` varchar(255) NOT NULL DEFAULT 'Overige'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikelen`
--

INSERT INTO `artikelen` (`id`, `naam`, `info`, `img`, `barcode`, `cate`) VALUES
(1, 'Acer laptop', 'goede laptop voor een normale schooldag', 'https://th.bing.com/th/id/OIP.sKHKQa51KvFmiGKB259gKQHaFX?w=279&h=202&c=7&r=0&o=5&dpr=1.3&pid=1.7', '1', '1'),
(3, 'Lenovo laptop', 'goede laptop voor een normale schooldag', 'https://th.bing.com/th/id/OIP.fo5Nz7oAjvmGU3TY0h5AxwHaHa?pid=ImgDet&rs=1', '2', '1'),
(4, 'Dell laptop', 'goede laptop voor een normale schooldag', 'https://www.ituitverkoop.nl//Files/10/215000/215145/ProductPhotos/Source/1875112410.jpg', '3', '1'),
(5, 'Macbook', 'goede laptop voor een normale schooldag', 'https://th.bing.com/th/id/OIP.755wzhwdxHb016IJ3KCVIwHaFc?pid=ImgDet&rs=1', '4', '1'),
(6, 'Asus laptop', 'goede laptop voor een normale schooldag', 'https://th.bing.com/th/id/R.96aa915e6a00d5a006adcaa40331624f?rik=bdJrYbz389LhQA&riu=http%3a%2f%2f1.bp.blogspot.com%2f-p_NeRfUSuSk%2fT7zPgaQPSvI%2fAAAAAAAADeA%2fkqgKFuAE6xI%2fs1600%2fASUS%2bN75SF-DH71.jpg&ehk=F1QyX66MMvpOoFnMHoayicOt1bttwYTJg6jQCVzqCYM%3d&', '5', '1'),
(7, 'monitor 1', 'monitor waarmee je op meerdere schermen kan werken', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '6', '2'),
(8, 'monitor 2', 'monitor waarmee je op meerdere schermen kan werken', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '7', '2'),
(9, 'monitor 3', 'monitor waarmee je op meerdere schermen kan werken', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '8', '2'),
(10, 'monitor 4', 'monitor waarmee je op meerdere schermen kan werken', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '9', '2'),
(11, 'monitor 5', 'monitor waarmee je op meerdere schermen kan werken', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg', '10', '2'),
(12, 'hdmi kabel', 'hdmi kabel, handig als je een presentatie moet geven', 'https://image.allekabels.nl/image/1081345-0/hdmi-kabel-1.4-high-speed-20-meter', '11', '3'),
(13, 'hdmi kabel', 'hdmi kabel, handig als je een presentatie moet geven', 'https://image.allekabels.nl/image/1081345-0/hdmi-kabel-1.4-high-speed-20-meter', '12', '3'),
(14, 'usb kabel', 'usb kabel, voor als je gegevens moet overzetten ', 'https://image.allekabels.nl/image/1165065-0/usb-3.0-kabel-3-meter.jpg', '13', '3'),
(15, 'usb kabel', 'usb kabel, voor als je gegevens moet overzetten ', 'https://image.allekabels.nl/image/1165065-0/usb-3.0-kabel-3-meter.jpg', '14', '3'),
(16, 'usb-c kabel', 'usb-c kabel, voor als je van macbook naar laptop moet overzetten, of vanaf een telefoon', 'https://media.startech.com/cms/products/main/tblt3mmxm.main.jpg', '15', '3'),
(17, 'usb-c kabel', 'usb-c kabel, voor als je van macbook naar laptop moet overzetten, of vanaf een telefoon', 'https://media.startech.com/cms/products/main/tblt3mmxm.main.jpg', '16', '3'),
(18, 'vga/hdmi kabel', 'vga/hdmi kabel, handig als je met een beamer werkt of oude beeldschermen', 'https://media.s-bol.com/qxjYPE343wvy/1200x1173.jpg', '17', '3'),
(19, 'vga/hdmi kabel', 'vga/hdmi kabel, handig als je met een beamer werkt of oude beeldschermen', 'https://media.s-bol.com/qxjYPE343wvy/1200x1173.jpg', '18', '3'),
(20, 'displayport kabel', 'displayport kabel, handig als je monitor geen hdmi kabel aangesloten kan hebben', 'https://image.allekabels.nl/image/3726292-0/displayport-kabel-0.5-meter-0.5-meter.jpg', '19', '3'),
(21, 'displayport kabel', 'displayport kabel, handig als je monitor geen hdmi kabel aangesloten kan hebben', 'https://image.allekabels.nl/image/3726292-0/displayport-kabel-0.5-meter-0.5-meter.jpg', '20', '3'),
(22, 'ethernet kabel', 'ethernet kabel, handig als de wifi niet werkt', 'https://image.allekabels.nl/image/1098116-0/netwerkkabel-cat-5e-u-utp-lengte-1.5-meter.jpg', '21', '3'),
(23, 'ethernet kabel', 'ethernet kabel, handig als de wifi niet werkt', 'https://image.allekabels.nl/image/1098116-0/netwerkkabel-cat-5e-u-utp-lengte-1.5-meter.jpg', '22', '3'),
(24, 'laptop oplader ACER', 'oplader voor ACER laptops, voor als je die van jouw vergeet', 'https://media.s-bol.com/qxjllzBnV7RR/550x360.jpg', '23', '3'),
(25, 'laptop oplader ACER', 'oplader voor ACER laptops, voor als je die van jouw vergeet', 'https://media.s-bol.com/qxjllzBnV7RR/550x360.jpg', '24', '3'),
(26, 'laptop oplader LENOVO', 'oplader voor LENOVO laptops, voor als je die van jouw vergeet', 'https://123adapter.nl/img/product/lenovo-ideapad-gaming-3-15arh05-laptop-adapter-135w/800x800_3493_VIB20675SQUARE-2.jpg', '25', '3'),
(27, 'laptop oplader LENOVO', 'oplader voor LENOVO laptops, voor als je die van jouw vergeet', 'https://123adapter.nl/img/product/lenovo-ideapad-gaming-3-15arh05-laptop-adapter-135w/800x800_3493_VIB20675SQUARE-2.jpg', '26', '3'),
(28, 'laptop oplader DELL', 'oplader voor DELL laptops, voor als je die van jouw vergeet', 'https://viadennis.nl/img/product/dell-latitude-14-7490-originele-adapter/800x800_2751_ODELL1953347450PA2E-4.jpg', '27', '3'),
(31, 'laptop oplader DELL', 'oplader voor DELL laptops, voor als je die van jouw vergeet', 'https://viadennis.nl/img/product/dell-latitude-14-7490-originele-adapter/800x800_2751_ODELL1953347450PA2E-4.jpg', '28', '3'),
(32, 'laptop oplader MACBOOK', 'oplader voor MACBOOK, voor als je die van jouw vergeet', 'https://www.123accu.nl/image/Huawei_USB-C_65W__QC_3.0_oplader_5_V_-_20_V_3.25_A_65_W_123accu_huismerk_AHU00174_medium.jpg', '29', '3'),
(33, 'laptop oplader MACBOOK', 'oplader voor MACBOOK, voor als je die van jouw vergeet', 'https://www.123accu.nl/image/Huawei_USB-C_65W__QC_3.0_oplader_5_V_-_20_V_3.25_A_65_W_123accu_huismerk_AHU00174_medium.jpg', '30', '3'),
(34, 'pringles', 'congrats! you found a easter egg!', 'https://static-images.jumbo.com/product_images/211120221436_472570STK-1_360x360_2.png', '5053990161669', ''),
(35, 'keyboard', 'keyboard, handig als je wat verder van je scherm wil zitten', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '31', '4'),
(36, 'keyboard', 'keyboard, handig als je wat verder van je scherm wil zitten', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '32', '4'),
(37, 'keyboard', 'keyboard, handig als je wat verder van je scherm wil zitten', 'https://www.action.com/_next/image/?url=https%3A%2F%2Faction.com%2Fhostedassets%2FCMSArticleImages%2F47%2F21%2F3006915_4047443458391-112_02.png&w=640&q=75', '33', '4'),
(38, 'muis', 'handig als je vette vingers hebt, of als je touchpad niet meer werkt', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '34', '4'),
(39, 'muis', 'handig als je vette vingers hebt, of als je touchpad niet meer werkt', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '35', '4'),
(40, 'muis', 'handig als je vette vingers hebt, of als je touchpad niet meer werkt', 'https://m.media-amazon.com/images/I/41jt+6hTvwL._AC_SX679_.jpg', '36', '4'),
(41, 'koptelefoon', 'handig voor een luistertoets, of als je muziek wil luisteren', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '37', '4'),
(42, 'koptelefoon', 'handig voor een luistertoets, of als je muziek wil luisteren', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '38', '4'),
(43, 'koptelefoon', 'handig voor een luistertoets, of als je muziek wil luisteren', 'https://i0.wp.com/rkop.nl/wp-content/uploads/Rkop-one-wegwerp-koptelefoon-e1591102057463.png?fit=300%2C264&ssl=1', '39', '4'),
(44, 'koffiezetapperaat', 'handig voor open dagen, of als je een caffeïne tekort hebt', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '40', '4'),
(45, 'koffiezetapperaat', 'handig voor open dagen, of als je een caffeïne tekort hebt', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '41', '4'),
(46, 'koffiezetapperaat', 'handig voor open dagen, of als je een caffeïne tekort hebt', 'https://www.tristar.eu/product/image/medium/cm-1233_0.jpg', '42', '4'),
(47, 'verlengsnoer', 'handig als je ver van een stopcontact moet werken', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '43', '4'),
(48, 'verlengsnoer', 'handig als je ver van een stopcontact moet werken', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '44', '4'),
(49, 'verlengsnoer', 'handig als je ver van een stopcontact moet werken', 'https://www.kabelshop.nl/image/Nedis_Stekkerdoos_3-voudig_%7C_Nedis_%7C_1.5_meter_Schakelaar_Wit_EXSO315F2WTB_K060401069_medium.jpg', '45', '4'),
(50, 'camera 1', 'De D5600 is voorzien van een grote DX-formaat beeldsensor met 24,2 megapixels die fijne patronen scherp vastlegt en beelden produceert met zeer heldere details. Uw vrienden en volgers zien precies wat u voor ogen had, bij elke opname. Een ISO-bereik van 100-25.600 en een uitbreidbare ISO-gevoeligheid van 6400 in de stand Nachtlandschap zorgen ervoor dat slecht verlichte onderwerpen en moeilijke lichtomstandigheden probleemloos worden afgehandeld. De nieuwe EXPEED 4-beeldverwerkingsengine biedt een uitstekende ruisonderdrukking, zelfs bij hoge ISO-waarden. En aangezien een groot aantal verwisselbare NIKKOR-objectieven tot uw beschikking staat, liggen beelden met een prachtig onscherpe achtergrond en rijke contrasten binnen handbereik.', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '46', '5'),
(51, 'camera 2', 'De D5600 is voorzien van een grote DX-formaat beeldsensor met 24,2 megapixels die fijne patronen scherp vastlegt en beelden produceert met zeer heldere details. Uw vrienden en volgers zien precies wat u voor ogen had, bij elke opname. Een ISO-bereik van 100-25.600 en een uitbreidbare ISO-gevoeligheid van 6400 in de stand Nachtlandschap zorgen ervoor dat slecht verlichte onderwerpen en moeilijke lichtomstandigheden probleemloos worden afgehandeld. De nieuwe EXPEED 4-beeldverwerkingsengine biedt een uitstekende ruisonderdrukking, zelfs bij hoge ISO-waarden. En aangezien een groot aantal verwisselbare NIKKOR-objectieven tot uw beschikking staat, liggen beelden met een prachtig onscherpe achtergrond en rijke contrasten binnen handbereik.', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '47', '5'),
(52, 'camera 3', 'De D5600 is voorzien van een grote DX-formaat beeldsensor met 24,2 megapixels die fijne patronen scherp vastlegt en beelden produceert met zeer heldere details. Uw vrienden en volgers zien precies wat u voor ogen had, bij elke opname. Een ISO-bereik van 100-25.600 en een uitbreidbare ISO-gevoeligheid van 6400 in de stand Nachtlandschap zorgen ervoor dat slecht verlichte onderwerpen en moeilijke lichtomstandigheden probleemloos worden afgehandeld. De nieuwe EXPEED 4-beeldverwerkingsengine biedt een uitstekende ruisonderdrukking, zelfs bij hoge ISO-waarden. En aangezien een groot aantal verwisselbare NIKKOR-objectieven tot uw beschikking staat, liggen beelden met een prachtig onscherpe achtergrond en rijke contrasten binnen handbereik.', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '48', '5'),
(53, 'camera 4', 'De D5600 is voorzien van een grote DX-formaat beeldsensor met 24,2 megapixels die fijne patronen scherp vastlegt en beelden produceert met zeer heldere details. Uw vrienden en volgers zien precies wat u voor ogen had, bij elke opname. Een ISO-bereik van 100-25.600 en een uitbreidbare ISO-gevoeligheid van 6400 in de stand Nachtlandschap zorgen ervoor dat slecht verlichte onderwerpen en moeilijke lichtomstandigheden probleemloos worden afgehandeld. De nieuwe EXPEED 4-beeldverwerkingsengine biedt een uitstekende ruisonderdrukking, zelfs bij hoge ISO-waarden. En aangezien een groot aantal verwisselbare NIKKOR-objectieven tot uw beschikking staat, liggen beelden met een prachtig onscherpe achtergrond en rijke contrasten binnen handbereik.', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '49', '5'),
(54, 'camera 5', 'De D5600 is voorzien van een grote DX-formaat beeldsensor met 24,2 megapixels die fijne patronen scherp vastlegt en beelden produceert met zeer heldere details. Uw vrienden en volgers zien precies wat u voor ogen had, bij elke opname. Een ISO-bereik van 100-25.600 en een uitbreidbare ISO-gevoeligheid van 6400 in de stand Nachtlandschap zorgen ervoor dat slecht verlichte onderwerpen en moeilijke lichtomstandigheden probleemloos worden afgehandeld. De nieuwe EXPEED 4-beeldverwerkingsengine biedt een uitstekende ruisonderdrukking, zelfs bij hoge ISO-waarden. En aangezien een groot aantal verwisselbare NIKKOR-objectieven tot uw beschikking staat, liggen beelden met een prachtig onscherpe achtergrond en rijke contrasten binnen handbereik.', 'https://media.s-bol.com/BBB50GjWX37Q/550x521.jpg', '50', '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikelges`
--

CREATE TABLE `artikelges` (
  `id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `mail` varchar(255) NOT NULL DEFAULT '',
  `uitgedoor` varchar(255) NOT NULL DEFAULT '',
  `opmerking` varchar(255) NOT NULL DEFAULT '',
  `ingedoor` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikelges`
--

INSERT INTO `artikelges` (`id`, `barcode`, `naam`, `mail`, `uitgedoor`, `opmerking`, `ingedoor`) VALUES
(1, 1, 'Dimitri', 'dimitri@mail.com', 'King', 'Er zit een kras op de onderkant', 'De boer'),
(2, 1, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', 'Dimitri', 'zit een kras ergens', 'Dimitri'),
(3, 4, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', 'Dimitri', 'BEEE', 'Dimitri'),
(4, 2, 'Thomas', 'thomas@mail.com', 'Hessel', 'geen opmerkingen', 'dimitri'),
(5, 29, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', 'dimitri', 'stuk\r\n', 'dimitri');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikeluit`
--

CREATE TABLE `artikeluit` (
  `id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `mail` varchar(255) NOT NULL DEFAULT '',
  `datumuit` varchar(255) NOT NULL DEFAULT '',
  `datumin` varchar(255) NOT NULL DEFAULT '',
  `uitgedoor` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikeluit`
--

INSERT INTO `artikeluit` (`id`, `barcode`, `naam`, `mail`, `datumuit`, `datumin`, `uitgedoor`) VALUES
(1, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-27', 'Hessel'),
(2, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-15', 'Hessel'),
(3, 5, 'Hessel', 'Hessel@gmail.com', '2022-12-13', '2022-12-14', 'Hessel'),
(11, 2, 'Dimitri van Veenen', 'jdk.v.veenen@outlook.com', '2023-01-07', '2023-01-14', 'bram');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorieen`
--

CREATE TABLE `categorieen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categorieen`
--

INSERT INTO `categorieen` (`id`, `naam`, `img`) VALUES
(1, 'Laptops', 'https://th.bing.com/th/id/R.67af9d30db5892b1471f61b840b38879?rik=G13jlJ4tY%2b1w3Q&pid=ImgRaw&r=0'),
(2, 'monitoren', 'https://www.lg.com/nl/images/monitoren/MD06013996/gallery/medium01.jpg'),
(3, 'kabels', 'https://th.bing.com/th/id/OIP.4xKMLKPQ-XCvCKgCXo39XwHaE8?pid=ImgDet&rs=1'),
(4, 'assesoires', 'https://deac.nl/application/files/1215/8564/3481/Trotse_dealer_van_overige_machines_en_apparatuur.jpg'),
(5, 'cameras', 'https://media.s-bol.com/gkjB8Y6g1JK9/550x375.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Hessel', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi'),
(2, 'Dimitri', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi'),
(3, 'Thomas', '$2y$10$xYZFuxCmjLrIvpOc5xzT6e.EIURa5Xp4VBrKGM/Gb529l3.0bDHKi'),
(4, 'bram', '$2y$10$40fl0lHXPyJPqOAhfFxYeuo2M1myN6Gy7kKyxDBDp4r7H8oW20hpq');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `artikelges`
--
ALTER TABLE `artikelges`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `artikeluit`
--
ALTER TABLE `artikeluit`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT voor een tabel `artikelges`
--
ALTER TABLE `artikelges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `artikeluit`
--
ALTER TABLE `artikeluit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
