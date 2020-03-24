-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Mar 2020, 00:55:02
-- Sunucu sürümü: 10.3.15-MariaDB
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `wos`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `canli_destek`
--

CREATE TABLE `canli_destek` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_yazi` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL,
  `oturum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `canli_destek`
--

INSERT INTO `canli_destek` (`id`, `kullanici_adi`, `kullanici_yazi`, `tarih`, `oturum`) VALUES
(203, 'enesdongez@gmail.com', 'asdasdasdasd', '2020-03-24 18:22:33', 1),
(204, 'enesdongez@gmail.com', 'asdasdasdasdasd', '2020-03-24 18:23:01', 1),
(205, 'a@a.a', 'asdasdasdasd', '2020-03-24 18:23:40', 12),
(206, 'enesdongez@gmail.com', 'MErhaba', '2020-03-24 18:28:36', 1),
(207, 'a@a.a', 'asasd', '2020-03-24 18:29:12', 12),
(208, 'a@a.a', 'adasdasdasdasd', '2020-03-24 18:30:05', 12),
(209, 'a@a.a', 'tyutytyu', '2020-03-24 18:30:11', 12),
(210, 'enesdongez@gmail.com', 'asdasasd', '2020-03-24 20:53:29', 1),
(211, 'a@a.a', 'asdasd', '2020-03-24 21:11:27', 12),
(212, 'enesdongez@gmail.com', 'asdasdasdasd', '2020-03-24 21:16:51', 1),
(213, 'enesdongez@gmail.com', 'denemeememe', '2020-03-24 21:44:12', 1),
(214, 'enesdongez@gmail.com', 'asdasdasd', '2020-03-24 22:18:38', 1),
(215, 'enesdongez@gmail.com', 'zsfsdf', '2020-03-24 22:22:29', 1),
(216, 'enes döngez', 'asdasdasdasdasd', '2020-03-24 22:28:15', 1),
(218, 'enes döngez', 'asdasdasdasd', '2020-03-24 23:42:32', 1),
(221, 'enes döngez', 'asdasdasd', '2020-03-25 00:28:58', 1),
(222, 'enes döngez', 'asdasdasd', '2020-03-25 00:54:09', 1),
(223, 'enes döngez', 'asdasdasd', '2020-03-25 00:54:13', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `canli_destek_cevap`
--

CREATE TABLE `canli_destek_cevap` (
  `id` int(11) NOT NULL,
  `oturum` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `cevap` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `canli_destek_cevap`
--

INSERT INTO `canli_destek_cevap` (`id`, `oturum`, `date`, `cevap`) VALUES
(47, 1, '2020-03-24 18:22:56', 'asdasdasdasdas'),
(48, 1, '2020-03-24 20:54:03', 'asasdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kompanentler`
--

CREATE TABLE `kompanentler` (
  `id` int(11) NOT NULL,
  `kompanent_icerik` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tur` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `komp_ayar` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `komp_kod` varchar(2000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `komp_pic` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kompanentler`
--

INSERT INTO `kompanentler` (`id`, `kompanent_icerik`, `tur`, `komp_ayar`, `komp_kod`, `komp_pic`) VALUES
(2, 'Header1', 'header', '<form action=\"AYARheader1.php\" method=\"POST\" enctype=\"multipart/form-data\" >\r\nBaşlık Giriniz: <input type=\"text\" name=\"header1_yazi\"/></br>\r\nResim Seç:<input type=\"file\" name=\"header1_resim\"/></br> \r\nArkaplan: <input type=\"text\" name=\"header1_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$header1_arkaplan.\';\">\'; ?>\r\n<center>\r\n<table border=\"0px\" cellpadding=\"20\">\r\n<tr>\r\n<td>\r\n<center>\r\n<?php echo \'<img src=\"resimler/\'.$header1_resim.\'\" width=\"250px\" height=\"250px\" style=\"\"/>\'; ?>\r\n</center>\r\n</td></tr><tr>\r\n<td>\r\n<center>\r\n<?php echo \'<h1>\'.$header1_yazi.\'</h1>\'; ?>\r\n</center>\r\n</td>\r\n</tr>\r\n</table>\r\n</center>\r\n</div>', 'komp/header1.png'),
(3, 'Header2', 'header', '<form action=\"AYARheader2.php\" method=\"POST\" enctype=\"multipart/form-data\" > \r\nResim Seç:<input type=\"file\" name=\"header2_resim\"/></br>  \r\nLink1: <input type=\"text\" name=\"header2_yazi\"/></br> \r\nLink1 Sayfa İsmi: <input type=\"text\" name=\"header2_yazilink\"/></br> \r\nLink2: <input type=\"text\" name=\"header2_yazi2\"/></br> \r\nLink2 Sayfa İsmi: <input type=\"text\" name=\"header2_yazilink2\"/></br> \r\nLink3: <input type=\"text\" name=\"header2_yazi3\"/></br> \r\nLink3 Sayfa İsmi: <input type=\"text\" name=\"header2_yazilink3\"/></br> \r\nArkaplan: <input type=\"text\" name=\"header2_arkaplan\"/></br> \r\n<button name=\"sayfa_ekle\">Ekle</button> \r\n</form>', '<?php echo \'<div style=\"background-color:\'.$header2_arkaplan.\';\">\'; ?>\r\n<center>\r\n<table border=\"0px\" cellpadding=\"20\">\r\n<td> <?php echo \'<a href=\"?sayfa=content\"><img src=\"resimler/\'.$header2_resim.\'\" width=\"250px\" height=\"250px\" style=\"\"/></a>\'; ?>   </td>\r\n<td>    </td>\r\n<td>    </td>\r\n<td>    </td>\r\n<td> <?php echo \'<h1><a href=\"?sayfa=\'.$header2_yazilink.\'\">\'.$header2_yazi.\'</a></h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1><a href=\"?sayfa=\'.$header2_yazilink2.\'\">\'.$header2_yazi2.\'</a></h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1><a href=\"?sayfa=\'.$header2_yazilink3.\'\">\'.$header2_yazi3.\'</a></h1>\'; ?>   </td>\r\n</table>\r\n</center>\r\n</div>', 'komp/header2.png'),
(4, 'Header3', 'header', '<form action=\"AYARheader3.php\" method=\"POST\" enctype=\"multipart/form-data\" >\r\nResim Seç:<input type=\"file\" name=\"header3_resim\"/></br> \r\nYazı Giriniz: <input type=\"text\" name=\"header3_yazi\"/></br>\r\nYazı Giriniz: <input type=\"text\" name=\"header3_yazi2\"/></br>\r\nYazı Giriniz: <input type=\"text\" name=\"header3_yazi3\"/></br>\r\nYazı Giriniz: <input type=\"text\" name=\"header3_yazi4\"/></br>\r\nYazı Giriniz: <input type=\"text\" name=\"header3_yazi5\"/></br>\r\nArkaplan: <input type=\"text\" name=\"header3_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$header3_arkaplan.\';\">\'; ?>\r\n<center>\r\n<table border=\"0px\" cellpadding=\"20\">\r\n<tr> <?php echo \'<img src=\"resimler/\'.$header3_resim.\'\" width=\"250px\" height=\"250px\" style=\"\"/>\'; ?>   </tr>\r\n<tr>\r\n<td> <?php echo \'<h1>\'.$header3_yazi.\'</h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1>\'.$header3_yazi2.\'</h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1>\'.$header3_yazi3.\'</h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1>\'.$header3_yazi4.\'</h1>\'; ?>   </td>\r\n<td> <?php echo \'<h1>\'.$header3_yazi5.\'</h1>\'; ?>   </td>\r\n</tr\r\n</table>\r\n</center>\r\n</div>', 'komp/header3.png'),
(5, 'Content1', 'content', '<form action=\"AYARcontent1.php\" method=\"POST\" enctype=\"multipart/form-data\"> \r\nAçıklama yazısı: <input type=\"text\" name=\"content1_yazim\"/></br> \r\nAçıklama yazı rengi: <input type=\"text\" name=\"content1_yazim_rengi\"/></br> \r\nResim Seç:<input type=\"file\" name=\"content1_resim\"/></br> \r\nArkaplan: <input type=\"text\" name=\"content1_arkaplan\"/></br> \r\n<button name=\"submit\">Ekle</button> \r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content1_arkaplan.\';\">\'; ?> <center> <table border=\"0px\" cellpadding=\"10\"> <tr> <td> <?php echo \'<img src=\"resimler/\'.$content1_resim.\'\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?> </td> <td style=\"word-wrap:break-word;\"><h3><?php echo \'<a style=\"color:\'.$content1_yazim_rengi.\';\">\'.$content1_yazim.\'</a>\'; ?></h3></td> </tr> </table> </center> </div>', 'komp/content1.png'),
(6, 'Content2', 'content', '<form action=\"AYARcontent2.php\" method=\"POST\">\r\nAçıklama yazısı:<input type=\"text\" name=\"content2_yazim\"/></br>\r\nArkaplan renk:<input type=\"text\" name=\"content2_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content2_arkaplan.\'; word-wrap:break-word;\">\'; ?>\r\n<center>\r\n<h3>\r\n<?php echo \'<div style=\"word-wrap:break-word;\"><h2>\'.$content2_yazim.\'</h2></div>\'; ?>\r\n</h3>\r\n\r\n</center>\r\n</div>\r\n', 'komp/content2.png'),
(7, 'Content3', 'content', '<form action=\"AYARcontent3.php\" method=\"POST\">\r\nArkaplan renk: <input type=\"text\" name=\"content3_arkaplan\"/></br>\r\nResim1: <input type=\"text\" name=\"content3_resim\"/></br>\r\nResim2: <input type=\"text\" name=\"content3_resim2\"/></br>\r\nResim3: <input type=\"text\" name=\"content3_resim3\"/></br>\r\nResim4: <input type=\"text\" name=\"content3_resim4\"/></br>\r\nResim5: <input type=\"text\" name=\"content3_resim5\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content3_arkaplan.\'; margin:auto;\">\'; ?>\r\n<center>\r\n<table border=\"0px\" cellpadding=\"10\">\r\n<tr>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n</tr>\r\n</table>\r\n</center>\r\n</div>\r\n', 'komp/content3.png'),
(8, 'Footer1', 'footer', '', '', 'komp/footer1.png'),
(9, 'Left Banner1', 'leftbanner', '<form action=\"AYARleftbanner1.php\" method=\"POST\">\r\nArkaplan renk: <input type=\"text\" name=\"leftbar1_arkaplan\"/></br>\r\nLink Arkaplan renk: <input type=\"text\" name=\"leftbar1_linkrenk\"/></br>\r\nLink1: <input type=\"text\" name=\"leftbar1_link1\"/></br>\r\nLink2: <input type=\"text\" name=\"leftbar1_link2\"/></br>\r\nLink3: <input type=\"text\" name=\"leftbar1_link3\"/></br>\r\nLink4: <input type=\"text\" name=\"leftbar1_link4\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$leftbar1_arkaplan.\';\">\'; ?>\r\n<center>\r\n<table border=\"0\" width=\"90%\" style=\"text-align:center; font-size:30px;\">\r\n<?php \r\necho \'<tr style=\"background-color:\'.$leftbar1_linkrenk.\';\"><td>\'.$leftbar1_link1.\'</td></tr>\';\r\necho \'<tr style=\"background-color:\'.$leftbar1_linkrenk.\';\"><td>\'.$leftbar1_link2.\'</td></tr>\';\r\necho \'<tr style=\"background-color:\'.$leftbar1_linkrenk.\';\"><td>\'.$leftbar1_link3.\'</td></tr>\';\r\necho \'<tr style=\"background-color:\'.$leftbar1_linkrenk.\';\"><td>\'.$leftbar1_link4.\'</td></tr>\';\r\n?>\r\n</table>\r\n</center>\r\n</div>', 'komp/leftbar1.png'),
(10, 'Left Banner2', 'leftbanner', '<form action=\"AYARleftbanner2.php\" method=\"POST\">\r\nArkaplan renk: <input type=\"text\" name=\"leftbar2_arkaplan\"/></br>\r\nLink1: <input type=\"text\" name=\"leftbar2_link1\"/></br>\r\nLink2: <input type=\"text\" name=\"leftbar2_link2\"/></br>\r\nLink3: <input type=\"text\" name=\"leftbar2_link3\"/></br>\r\nLink4: <input type=\"text\" name=\"leftbar2_link4\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"font-size:30px; background-color:\'.$leftbar2_arkaplan.\'\">\'; ?>\r\n<center>\r\n<ul>\r\n<?php \r\necho \'<li>\'.$leftbar2_link1.\'</li>\'; \r\necho \'<li>\'.$leftbar2_link2.\'</li>\';\r\necho \'<li>\'.$leftbar2_link3.\'</li>\'; \r\necho \'<li>\'.$leftbar2_link4.\'</li>\'; \r\n?>\r\n</ul>\r\n</center>\r\n</div>', 'komp/leftbar2.png'),
(11, 'Header4', 'header', 'ayar/AYARheader4.php', '<div style=\"background-color:pink; width:100%; height:100%; float:left; text-align:center;\"><h1>Header4</h1></div>', 'komp/header4.png'),
(13, 'Content1', 'content1', '<form action=\"AYARcontent1.php\" method=\"POST\" enctype=\"multipart/form-data\"> \r\nAçıklama yazısı: <input type=\"text\" name=\"content1_yazim\"/></br> \r\nAçıklama yazı rengi: <input type=\"text\" name=\"content1_yazim_rengi\"/></br> \r\nResim Seç:<input type=\"file\" name=\"content1_resim\"/></br> \r\nArkaplan: <input type=\"text\" name=\"content1_arkaplan\"/></br> \r\n<button name=\"submit\">Ekle</button> \r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content1_arkaplan.\';\">\'; ?> <center> <table border=\"0px\" cellpadding=\"10\"> <tr> <td> <?php echo \'<img src=\"resimler/\'.$content1_resim.\'\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?> </td> <td style=\"word-wrap:break-word;\"><h3><?php echo \'<a style=\"color:\'.$content1_yazim_rengi.\';\">\'.$content1_yazim.\'</a>\'; ?></h3></td> </tr> </table> </center> </div>', 'komp/content1.png'),
(14, 'Content2', 'content1', '<form action=\"AYARcontent2.php\" method=\"POST\">\r\nAçıklama yazısı:<input type=\"text\" name=\"content2_yazim\"/></br>\r\nArkaplan renk:<input type=\"text\" name=\"content2_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content2_arkaplan.\'; word-wrap:break-word;\">\'; ?>\r\n<center>\r\n<h3>\r\n<?php echo \'<div style=\"word-wrap:break-word;\"><h2>\'.$content2_yazim.\'</h2></div>\'; ?>\r\n</h3>\r\n\r\n</center>\r\n</div>\r\n', 'komp/content2.png'),
(16, 'Content1', 'content2', '<form action=\"AYARcontent1.php\" method=\"POST\" enctype=\"multipart/form-data\"> \r\nAçıklama yazısı: <input type=\"text\" name=\"content1_yazim\"/></br> \r\nAçıklama yazı rengi: <input type=\"text\" name=\"content1_yazim_rengi\"/></br> \r\nResim Seç:<input type=\"file\" name=\"content1_resim\"/></br> \r\nArkaplan: <input type=\"text\" name=\"content1_arkaplan\"/></br> \r\n<button name=\"submit\">Ekle</button> \r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content1_arkaplan.\';\">\'; ?> <center> <table border=\"0px\" cellpadding=\"10\"> <tr> <td> <?php echo \'<img src=\"resimler/\'.$content1_resim.\'\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?> </td> <td style=\"word-wrap:break-word;\"><h3><?php echo \'<a style=\"color:\'.$content1_yazim_rengi.\';\">\'.$content1_yazim.\'</a>\'; ?></h3></td> </tr> </table> </center> </div>', 'komp/content1.png'),
(17, 'Content2', 'content2', '<form action=\"AYARcontent2.php\" method=\"POST\">\r\nAçıklama yazısı:<input type=\"text\" name=\"content2_yazim\"/></br>\r\nArkaplan renk:<input type=\"text\" name=\"content2_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content2_arkaplan.\'; word-wrap:break-word;\">\'; ?>\r\n<center>\r\n<h3>\r\n<?php echo \'<div style=\"word-wrap:break-word;\"><h2>\'.$content2_yazim.\'</h2></div>\'; ?>\r\n</h3>\r\n\r\n</center>\r\n</div>\r\n', 'komp/content2.png'),
(19, 'Content1', 'content_', '<form action=\"AYARcontent1.php\" method=\"POST\" enctype=\"multipart/form-data\"> \r\nAçıklama yazısı: <input type=\"text\" name=\"content1_yazim\"/></br> \r\nAçıklama yazı rengi: <input type=\"text\" name=\"content1_yazim_rengi\"/></br> \r\nResim Seç:<input type=\"file\" name=\"content1_resim\"/></br> \r\nArkaplan: <input type=\"text\" name=\"content1_arkaplan\"/></br> \r\n<button name=\"submit\">Ekle</button> \r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content1_arkaplan.\';\">\'; ?> <center> <table border=\"0px\" cellpadding=\"10\"> <tr> <td> <?php echo \'<img src=\"resimler/\'.$content1_resim.\'\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?> </td> <td style=\"word-wrap:break-word;\"><h3><?php echo \'<a style=\"color:\'.$content1_yazim_rengi.\';\">\'.$content1_yazim.\'</a>\'; ?></h3></td> </tr> </table> </center> </div>', 'komp/content1.png'),
(20, 'Content2', 'content_', '<form action=\"AYARcontent2.php\" method=\"POST\">\r\nAçıklama yazısı:<input type=\"text\" name=\"content2_yazim\"/></br>\r\nArkaplan renk:<input type=\"text\" name=\"content2_arkaplan\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content2_arkaplan.\'; word-wrap:break-word;\">\'; ?>\r\n<center>\r\n<h3>\r\n<?php echo \'<div style=\"word-wrap:break-word;\"><h2>\'.$content2_yazim.\'</h2></div>\'; ?>\r\n</h3>\r\n\r\n</center>\r\n</div>\r\n', 'komp/content2.png'),
(21, 'Content3', 'content_', '<form action=\"AYARcontent3.php\" method=\"POST\">\r\nArkaplan renk: <input type=\"text\" name=\"content3_arkaplan\"/></br>\r\nResim1: <input type=\"text\" name=\"content3_resim\"/></br>\r\nResim2: <input type=\"text\" name=\"content3_resim2\"/></br>\r\nResim3: <input type=\"text\" name=\"content3_resim3\"/></br>\r\nResim4: <input type=\"text\" name=\"content3_resim4\"/></br>\r\nResim5: <input type=\"text\" name=\"content3_resim5\"/></br>\r\n<button name=\"sayfa_ekle\">Ekle</button>\r\n</form>', '<?php echo \'<div style=\"background-color:\'.$content3_arkaplan.\'; margin:auto;\">\'; ?>\r\n<center>\r\n<table border=\"0px\" cellpadding=\"10\">\r\n<tr>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n<td>\r\n<?php echo \'<img src=\"\'.$content3_resim.\'.png\" width=\"200px\" height=\"200px\" style=\"\"/>\'; ?>\r\n</td>\r\n</tr>\r\n</table>\r\n</center>\r\n</div>\r\n', 'komp/content3.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(200) NOT NULL,
  `soyad` varchar(200) NOT NULL,
  `email` varchar(800) NOT NULL,
  `sifre` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `email`, `sifre`) VALUES
(1, 'enes', 'döngez', 'enesdongez@gmail.com', '123'),
(12, 'Ali', 'Veli', 'a@a.a', '123'),
(22, 'deneme', 'deneme', 'dene@a.com', 'dene');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sablonlar`
--

CREATE TABLE `sablonlar` (
  `sablon_id` int(200) NOT NULL,
  `sablon_adi` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sablon_resim` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sablon_kod` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `sablon_tasarimkodu` varchar(10000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sablon_editorkodu` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sablonlar`
--

INSERT INTO `sablonlar` (`sablon_id`, `sablon_adi`, `sablon_resim`, `sablon_kod`, `sablon_tasarimkodu`, `sablon_editorkodu`) VALUES
(1, 'sablon1', 'Desing\\Pictures\\Sablon\\sablon1.png', 'sablon1.php', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head>\r\n	<body>\r\n		<table class=\"data\" id=\"data\" border=\"0\" cellspacing=\"1\" height=\"100%\" width=\"100%\">         \r\n			<tr> 			\r\n				<td valign=\"top\" style=\"word-break:break-all;\"> 			\r\n					<div id=\"content\"> 		\r\n						<?php\r\n\r\n							$sayfalar_klasor=\'./\';\r\n\r\n							if(!empty($_GET[\'sayfa\'])){\r\n								$sayfalar=scandir($sayfalar_klasor,0);\r\n								unset($sayfalar[0],$sayfalar[1]);\r\n								\r\n							$sayfa=$_GET[\'sayfa\'];\r\n							if(in_array($sayfa.\'.php\', $sayfalar)){\r\n								include $sayfa.\'.php\'; \r\n								\r\n								\r\n							}\r\n							else{\r\n								echo \'Aradığınız sayfa bulunamadı\';\r\n							}\r\n							  \r\n						  \r\n							}\r\n							else{\r\n								include \'content.php\';\r\n							}\r\n						?>\r\n                    </div>\r\n					</div> \r\n				</td>\r\n			</tr>\r\n		</table>\r\n    </body>\r\n</html>', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head>\r\n	<body>\r\n		<table class=\"data\" id=\"data\" border=\"1\" cellspacing=\"1\" height=\"100%\" width=\"100%\">         \r\n			<tr> 			\r\n				<td valign=\"top\" style=\"word-break:break-all;\"> 			\r\n					<div id=\"content\"> 		\r\n						<?php\r\n\r\n							$sayfalar_klasor=\'./\';\r\n\r\n							if(!empty($_GET[\'sayfa\'])){\r\n								$sayfalar=scandir($sayfalar_klasor,0);\r\n								unset($sayfalar[0],$sayfalar[1]);\r\n								\r\n							$sayfa=$_GET[\'sayfa\'];\r\n							if(in_array($sayfa.\'.php\', $sayfalar)){\r\n								include $sayfa.\'.php\'; \r\n								\r\n								\r\n							}\r\n							else{\r\n								echo \'Aradığınız sayfa bulunamadı\';\r\n							}\r\n							  \r\n						  \r\n							}\r\n							else{\r\n								include \'content.php\';\r\n							}\r\n						?>\r\n                    </div>\r\n					</div> \r\n				</td>\r\n			</tr>\r\n		</table>\r\n    </body>\r\n</html>'),
(2, 'sablon2', 'Desing\\Pictures\\Sablon\\sablon2.png', 'sablon2.php', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head>\r\n<body>\r\n<table class=\"data\" id=\"data\" border=\"0\" cellspacing=\"1\" height=\"100%\" width=\"100%\">\r\n        <tr height=\"20%\">\r\n            <td id=\"header\" colspan=\"5\">\r\n			<div id=\"header\">\r\n                  <?php include \'header.php\'; ?>\r\n                </div>\r\n			</td>\r\n        </tr>\r\n		 <tr>\r\n			<div>\r\n            <?php\r\n\r\n                $sayfalar_klasor=\'./\';\r\n\r\n                if(!empty($_GET[\'sayfa\'])){\r\n                    $sayfalar=scandir($sayfalar_klasor,0);\r\n                    unset($sayfalar[0],$sayfalar[1]);\r\n                    \r\n                $sayfa=$_GET[\'sayfa\'];\r\n                if(in_array($sayfa.\'.php\', $sayfalar)){\r\n                    include $sayfa.\'.php\'; \r\n                    \r\n                    \r\n                }\r\n                else{\r\n                    echo \'Aradığınız sayfa bulunamadı\';\r\n                }\r\n                  \r\n              \r\n                }\r\n                else{\r\n                    include \'content.php\';\r\n                }\r\n                ?>\r\n		</div>\r\n        </tr>\r\n		<tr height=\"20%\">\r\n            <td id=\"footer\" colspan=\"5\">\r\n			<div id=\"footer\">\r\n			 <?php include \'footer.php\'; ?>\r\n			</div>\r\n			</td>\r\n        </tr>\r\n   </table>\r\n</body>\r\n</html>', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head>\r\n<body>\r\n<table class=\"data\" id=\"data\" border=\"1\" cellspacing=\"1\" height=\"100%\" width=\"100%\">\r\n        <tr height=\"20%\">\r\n            <td id=\"header\" colspan=\"5\">\r\n			<div id=\"header\">\r\n                  <?php include \'header.php\'; ?>\r\n                </div>\r\n			</td>\r\n        </tr>\r\n		 <tr>\r\n			<div>\r\n            <?php\r\n\r\n                $sayfalar_klasor=\'./\';\r\n\r\n                if(!empty($_GET[\'sayfa\'])){\r\n                    $sayfalar=scandir($sayfalar_klasor,0);\r\n                    unset($sayfalar[0],$sayfalar[1]);\r\n                    \r\n                $sayfa=$_GET[\'sayfa\'];\r\n                if(in_array($sayfa.\'.php\', $sayfalar)){\r\n                    include $sayfa.\'.php\'; \r\n                    \r\n                    \r\n                }\r\n                else{\r\n                    echo \'Aradığınız sayfa bulunamadı\';\r\n                }\r\n                  \r\n              \r\n                }\r\n                else{\r\n                    include \'content.php\';\r\n                }\r\n                ?>\r\n		</div>\r\n        </tr>\r\n		<tr height=\"20%\">\r\n            <td id=\"footer\" colspan=\"5\">\r\n			<div id=\"footer\">\r\n			 <?php include \'footer.php\'; ?>\r\n			</div>\r\n			</td>\r\n        </tr>\r\n   </table>\r\n</body>\r\n</html>'),
(3, 'sablon3', 'Desing\\Pictures\\Sablon\\sablon3.png', 'sablon3.php', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head> \r\n<body> \r\n<table class=\"data\" border=\"0px\" id=\"data\" cellspacing=\"0\" height=\"100%\" width=\"100%\">         \r\n<tr height=\"20%\">             \r\n<td id=\"header\" colspan=\"5\" style=\"word-break:break-all;\">                 \r\n<div id=\"header\" style=\"border:1px solid black;\">         \r\n                    <?php include(\'header.php\'); ?>           \r\n</div> 			\r\n</td>         \r\n</tr>         \r\n<tr> 			\r\n<td id=\"leftbanner\"  rowspan=\"4\" width=\"20%\" valign=\"top\" style=\"word-break:break-all;\">\r\n<div id=\"leftbanner\">  \r\n                <?php include(\'leftbanner.php\'); ?>             \r\n</div> 			\r\n</td> 			\r\n  \r\n	<?php\r\n\r\n                    $sayfalar_klasor=\'./\';\r\n\r\n                    if(!empty($_GET[\'sayfa\'])){\r\n                        $sayfalar=scandir($sayfalar_klasor,0);\r\n                        unset($sayfalar[0],$sayfalar[1]);\r\n                        \r\n                    $sayfa=$_GET[\'sayfa\'];\r\n\r\n                    if(in_array($sayfa.\'.php\', $sayfalar)){\r\n                        include($sayfa.\'.php\');\r\n                        \r\n                        \r\n                    }\r\n                    else{\r\n                        echo \'Aradığınız sayfa bulunamadı\';\r\n                    }\r\n                    }\r\n                    else{\r\n                        include(\'content.php\');\r\n\r\n                    }\r\n\r\n\r\n    ?>                                  \r\n           \r\n</tr>    \r\n</table> 	  	 \r\n</body> 	 \r\n</html>\r\n', '<html>\r\n<head>\r\n<script src=\"http://code.jquery.com/jquery-1.11.0.min.js\"></script>\r\n</head> \r\n<body> \r\n<table class=\"data\" border=\"1px\" id=\"data\" cellspacing=\"0\" height=\"100%\" width=\"100%\">         \r\n<tr height=\"20%\">             \r\n<td id=\"header\" colspan=\"5\" style=\"word-break:break-all;\">                 \r\n<div id=\"header\">         \r\n                    <?php include(\'header.php\'); ?>           \r\n</div> 			\r\n</td>         \r\n</tr>         \r\n<tr> 			\r\n<td id=\"leftbanner\"  rowspan=\"4\" width=\"20%\" valign=\"top\" style=\"word-break:break-all;\">\r\n<div id=\"leftbanner\">  \r\n                <?php include(\'leftbanner.php\'); ?>             \r\n</div> 			\r\n</td> 			\r\n  \r\n	<?php\r\n\r\n                    $sayfalar_klasor=\'editorsayfalari/\';\r\n\r\n                    if(!empty($_GET[\'sayfa\'])){\r\n                        $sayfalar=scandir($sayfalar_klasor,0);\r\n                        unset($sayfalar[0],$sayfalar[1]);\r\n                        \r\n                    $sayfa=$_GET[\'sayfa\'];\r\n\r\n                    if(in_array($sayfa.\'.php\', $sayfalar)){\r\n                        include($sayfa.\'.php\');\r\n                        \r\n                        \r\n                    }\r\n                    else{\r\n                        echo \'Aradığınız sayfa bulunamadı\';\r\n                    }\r\n                    }\r\n                    else{\r\n                        include(\'content.php\');\r\n\r\n                    }\r\n\r\n\r\n    ?>                                  \r\n           \r\n</tr>    \r\n</table> 	  	 \r\n</body> 	 \r\n</html>\r\n'),
(4, 'sablon4', 'Desing\\Pictures\\Sablon\\sablon4.png', 'sablon4.php', '', ''),
(5, 'sablon5', 'Desing\\Pictures\\Sablon\\sablon5.png', 'sablon5.php', '', ''),
(6, 'sablon6', 'Desing\\Pictures\\Sablon\\sablon6.png', 'sablon6.php', '', ''),
(7, 'sablon7', 'Desing\\Pictures\\Sablon\\sablon7.png', 'sablon7.php', '', ''),
(8, 'sablon8', 'Desing\\Pictures\\Sablon\\sablon8.png', '', '', ''),
(9, 'sablon9', 'Desing\\Pictures\\Sablon\\sablon9.png', '', '', ''),
(10, 'sablon10', 'Desing\\Pictures\\Sablon\\sablon10.png', '', '', ''),
(11, 'sablon11', 'Desing\\Pictures\\Sablon\\sablon11.png', '', '', ''),
(12, 'sablon12', 'Desing\\Pictures\\Sablon\\sablon12.png', '', '', ''),
(13, 'sablon13', 'Desing\\Pictures\\Sablon\\sablon13.png', '', '', ''),
(14, 'sablon14', 'Desing\\Pictures\\Sablon\\sablon14.png', '', '', ''),
(15, 'sablon15', 'Desing\\Pictures\\Sablon\\sablon15.png', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sablon_altsayfalari`
--

CREATE TABLE `sablon_altsayfalari` (
  `id` int(11) NOT NULL,
  `sablon_id` int(11) NOT NULL,
  `sablon_kod` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sablon_sayfalari`
--

CREATE TABLE `sablon_sayfalari` (
  `id` int(11) NOT NULL,
  `sablon_id` int(11) NOT NULL,
  `sayfa_adi` varchar(2000) NOT NULL,
  `kod` mediumtext NOT NULL,
  `kod_kullanici` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sablon_sayfalari`
--

INSERT INTO `sablon_sayfalari` (`id`, `sablon_id`, `sayfa_adi`, `kod`, `kod_kullanici`) VALUES
(1, 3, 'leftbanner', '', ''),
(2, 3, 'content', '<td id=\"content1\" colspan=\"4\" rowspan=\"4\" valign=\"top\" style=\"word-break:break-all;\">  \r\n               <div id=\"content\" >          \r\n                      <?php include \'content1.php\'; ?>    \r\n                                   </div>         \r\n                                           </td>', '<td id=\"content1\" colspan=\"4\" rowspan=\"4\" valign=\"top\" style=\"word-break:break-all;\">  \r\n               <div id=\"content\" >          \r\n                      <?php include \'content1.php\'; ?>    \r\n                                   </div>         \r\n                                           </td>'),
(3, 3, 'header', '', ''),
(4, 2, 'header', '', ''),
(5, 2, 'content', '<td id=\"content1\" valign=\"top\" style=\"word-break:break-all; width:50%;\">\r\n                <div id=\"content1\" >\r\n                <?php include \'content1.php\'; ?>\r\n                </div>\r\n                </td>\r\n                <td id=\"content2\" valign=\"top\" style=\"word-break:break-all; width:50%;\">\r\n                <div id=\"content2\" >\r\n                <?php include \'content2.php\'; ?>\r\n                </div>\r\n                </td> ', '<td id=\"content1\" valign=\"top\" style=\"word-break:break-all; width:50%;\">\r\n                <div id=\"content1\" >\r\n                <?php include \'content1.php\'; ?>\r\n                </div>\r\n                </td>\r\n                <td id=\"content2\" valign=\"top\" style=\"word-break:break-all; width:50%;\">\r\n                <div id=\"content2\" >\r\n                <?php include \'content2.php\'; ?>\r\n                </div>\r\n                </td> '),
(7, 2, 'footer', '', ''),
(8, 2, 'content1', '', ''),
(9, 2, 'content2', '', ''),
(10, 1, 'content', '', ''),
(12, 3, 'content1', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `canli_destek`
--
ALTER TABLE `canli_destek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `canli_destek_cevap`
--
ALTER TABLE `canli_destek_cevap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kompanentler`
--
ALTER TABLE `kompanentler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sablonlar`
--
ALTER TABLE `sablonlar`
  ADD PRIMARY KEY (`sablon_id`);

--
-- Tablo için indeksler `sablon_altsayfalari`
--
ALTER TABLE `sablon_altsayfalari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sablon_sayfalari`
--
ALTER TABLE `sablon_sayfalari`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `canli_destek`
--
ALTER TABLE `canli_destek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- Tablo için AUTO_INCREMENT değeri `canli_destek_cevap`
--
ALTER TABLE `canli_destek_cevap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `kompanentler`
--
ALTER TABLE `kompanentler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `sablonlar`
--
ALTER TABLE `sablonlar`
  MODIFY `sablon_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `sablon_altsayfalari`
--
ALTER TABLE `sablon_altsayfalari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sablon_sayfalari`
--
ALTER TABLE `sablon_sayfalari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
