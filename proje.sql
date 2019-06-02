-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Haz 2019, 12:12:49
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

DROP TABLE IF EXISTS `musteriler`;
CREATE TABLE IF NOT EXISTS `musteriler` (
  `musteri_no` int(11) NOT NULL,
  `musteri_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_soyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`musteri_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`musteri_no`, `musteri_adi`, `musteri_soyadi`) VALUES
(1, 'Gamze', 'Kaplan'),
(2, 'Ahmet', 'Karşı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri_personel`
--

DROP TABLE IF EXISTS `musteri_personel`;
CREATE TABLE IF NOT EXISTS `musteri_personel` (
  `musteri_no` int(11) NOT NULL,
  `personel_no` int(11) NOT NULL,
  KEY `musteri_no` (`musteri_no`),
  KEY `personel_no` (`personel_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `musteri_personel`
--

INSERT INTO `musteri_personel` (`musteri_no`, `personel_no`) VALUES
(1, 3),
(2, 4),
(2, 5),
(1, 6),
(2, 8),
(2, 5),
(2, 8),
(2, 6),
(1, 8),
(2, 5),
(2, 5),
(2, 4),
(1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `personel_no` int(11) NOT NULL,
  `personel_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `personel_soyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `personel_cinsiyet` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `diller` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ucret` int(11) NOT NULL,
  `egitim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `calisma_sekli` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`personel_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_no`, `personel_adi`, `personel_soyadi`, `personel_cinsiyet`, `dogum_tarihi`, `diller`, `ucret`, `egitim`, `calisma_sekli`) VALUES
(3, 'Onur', 'Bayram', 'Erkek', '2019-05-02', 'İngilizce,Almanca', 600, 'Lise', 'Yatılı'),
(4, 'Cansu', 'Yılmaz', 'Kadın', '2019-05-09', 'İngilizce', 300, 'Lisans', 'Güniçi'),
(5, 'Aleyna', 'Bozkurt', 'Kadın', '2019-05-08', 'İngilizce,Almanca', 600, 'Lisans', 'Yatılı'),
(6, 'Can', 'Kavlak', 'Erkek', '2019-05-09', 'Almanca', 300, 'Lisans', 'Yatılı'),
(8, 'Dicle', 'Yamanoğlu', 'Kadın', '2019-05-07', 'İngilizce', 300, 'Lisans', 'Güniçi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
CREATE TABLE IF NOT EXISTS `yonetici` (
  `kullanici_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`kullanici_adi`, `sifre`, `adi`, `soyadi`) VALUES
('esrabozkurt', 123, 'Esra', 'Bozkurt');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `musteri_personel`
--
ALTER TABLE `musteri_personel`
  ADD CONSTRAINT `musteri` FOREIGN KEY (`musteri_no`) REFERENCES `musteriler` (`musteri_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personel` FOREIGN KEY (`personel_no`) REFERENCES `personel` (`personel_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
