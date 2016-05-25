-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 25. maj 2016 ob 09.30
-- Različica strežnika: 10.0.17-MariaDB
-- Različica PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `project_klavz`
--

-- --------------------------------------------------------

--
-- Struktura tabele `appartments`
--

CREATE TABLE `appartments` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_ID` bigint(20) UNSIGNED NOT NULL,
  `city_ID` bigint(20) UNSIGNED NOT NULL,
  `location_ID` bigint(20) UNSIGNED NOT NULL,
  `category_ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `persons` int(11) NOT NULL,
  `ppd` int(11) NOT NULL,
  `year_made` int(11) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `wifi_available` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `categories`
--

CREATE TABLE `categories` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `categories`
--

INSERT INTO `categories` (`ID`, `title`, `description`) VALUES
(1, 'Družinski', 'Apartmaji primerni za družine. Imajo vsaj eno otroško sobo. Ležijo v okolju primernem za otroke.');

-- --------------------------------------------------------

--
-- Struktura tabele `cities`
--

CREATE TABLE `cities` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `cities`
--

INSERT INTO `cities` (`ID`, `title`, `code`) VALUES
(1, 'Adlešiči', 8341),
(2, 'Ajdovščina', 5270),
(3, 'Ankaran/Ancarano', 6280),
(4, 'Apače', 9253),
(5, 'Artiče', 8253),
(6, 'Begunje na Gorenjskem', 4275),
(7, 'Begunje pri Cerknici', 1382),
(8, 'Beltinci', 9231),
(9, 'Benedikt', 2234),
(10, 'Bistrica ob Dravi', 2345),
(11, 'Bistrica ob Sotli', 3256),
(12, 'Bizeljsko', 8259),
(13, 'Blagovica', 1223),
(14, 'Blanca', 8283),
(15, 'Bled', 4260),
(16, 'Blejska Dobrava', 4273),
(17, 'Bodonci', 9265),
(18, 'Bogojina', 9222),
(19, 'Bohinjska Bela', 4263),
(20, 'Bohinjska Bistrica', 4264),
(21, 'Bohinjsko jezero', 4265),
(22, 'Borovnica', 1353),
(23, 'Boštanj', 8294),
(24, 'Bovec', 5230),
(25, 'Branik', 5295),
(26, 'Braslovče', 3314),
(27, 'Breginj', 5223),
(28, 'Brestanica', 8280),
(29, 'Bresternica', 2354),
(30, 'Brezje', 4243),
(31, 'Brezovica pri Ljubljani', 1351),
(32, 'Brežice', 8250),
(33, 'Brnik - Aerodrom', 4210),
(34, 'Brusnice', 8321),
(35, 'Buče', 3255),
(36, 'Bučka ', 8276),
(37, 'Cankova', 9261),
(38, 'Celje ', 3000),
(39, 'Celje - poštni predali', 3001),
(40, 'Cerklje na Gorenjskem', 4207),
(41, 'Cerklje ob Krki', 8263),
(42, 'Cerknica', 1380),
(43, 'Cerkno', 5282),
(44, 'Cerkvenjak', 2236),
(45, 'Ceršak', 2215),
(46, 'Cirkovce', 2326),
(47, 'Cirkulane', 2282),
(48, 'Col', 5273),
(49, 'Čatež ob Savi', 8251),
(50, 'Čemšenik', 1413),
(51, 'Čepovan', 5253),
(52, 'Črenšovci', 9232),
(53, 'Črna na Koroškem', 2393),
(54, 'Črni Kal', 6275),
(55, 'Črni Vrh nad Idrijo', 5274),
(56, 'Črniče', 5262),
(57, 'Črnomelj', 8340),
(58, 'Dekani', 6271),
(59, 'Deskle', 5210),
(60, 'Destrnik', 2253),
(61, 'Divača', 6215),
(62, 'Dob', 1233),
(63, 'Dobje pri Planini', 3224),
(64, 'Dobova', 8257),
(65, 'Dobovec', 1423),
(66, 'Dobravlje', 5263),
(67, 'Dobrna', 3204),
(68, 'Dobrnič', 8211),
(69, 'Dobrova', 1356),
(70, 'Dobrovnik/Dobronak ', 9223),
(71, 'Dobrovo v Brdih', 5212),
(72, 'Dol pri Hrastniku', 1431),
(73, 'Dol pri Ljubljani', 1262),
(74, 'Dole pri Litiji', 1273),
(75, 'Dolenja vas', 1331),
(76, 'Dolenjske Toplice', 8350),
(77, 'Domžale', 1230),
(78, 'Dornava', 2252),
(79, 'Dornberk', 5294),
(80, 'Draga', 1319),
(81, 'Dragatuš', 8343),
(82, 'Dramlje', 3222),
(83, 'Dravograd', 2370),
(84, 'Duplje', 4203),
(85, 'Dutovlje', 6221),
(86, 'Dvor', 8361),
(87, 'Fala', 2343),
(88, 'Fokovci', 9208),
(89, 'Fram', 2313),
(90, 'Frankolovo', 3213),
(91, 'Gabrovka', 1274),
(92, 'Globoko', 8254),
(93, 'Godovič', 5275),
(94, 'Golnik', 4204),
(95, 'Gomilsko', 3303),
(96, 'Gorenja vas', 4224),
(97, 'Gorica pri Slivnici', 3263),
(98, 'Gorišnica', 2272),
(99, 'Gornja Radgona', 9250),
(100, 'Gornji Grad', 3342),
(101, 'Gozd Martuljek', 4282),
(102, 'Gračišče', 6272),
(103, 'Grad', 9264),
(104, 'Gradac', 8332),
(105, 'Grahovo', 1384),
(106, 'Grahovo ob Bači', 5242),
(107, 'Grgar', 5251),
(108, 'Griže', 3302),
(109, 'Grobelno', 3231),
(110, 'Grosuplje', 1290),
(111, 'Hajdina', 2288),
(112, 'Hinje', 8362),
(113, 'Hoče', 2311),
(114, 'Hodoš/Hodos', 9205),
(115, 'Horjul', 1354),
(116, 'Hotedršica', 1372),
(117, 'Hrastnik', 1430),
(118, 'Hruševje', 6225),
(119, 'Hrušica', 4276),
(120, 'Idrija', 5280),
(121, 'Ig', 1292),
(122, 'Ilirska Bistrica', 6250),
(123, 'Ilirska Bistrica-Trnovo', 6251),
(124, 'Ivančna Gorica', 1295),
(125, 'Ivanjkovci', 2259),
(126, 'Izlake', 1411),
(127, 'Izola/Isola', 6310),
(128, 'Jakobski Dol', 2222),
(129, 'Jarenina', 2221),
(130, 'Jelšane', 6254),
(131, 'Jesenice', 4270),
(132, 'Jesenice na Dolenjskem', 8261),
(133, 'Jurklošter', 3273),
(134, 'Jurovski Dol', 2223),
(135, 'Juršinci', 2256),
(136, 'Kal nad Kanalom', 5214),
(137, 'Kalobje', 3233),
(138, 'Kamna Gorica', 4246),
(139, 'Kamnica', 2351),
(140, 'Kamnik', 1241),
(141, 'Kanal', 5213),
(142, 'Kapele', 8258),
(143, 'Kapla', 2362),
(144, 'Kidričevo', 2325),
(145, 'Kisovec', 1412),
(146, 'Knežak', 6253),
(147, 'Kobarid', 5222),
(148, 'Kobilje', 9227),
(149, 'Kočevje', 1330),
(150, 'Kočevska Reka', 1338),
(151, 'Kog', 2276),
(152, 'Kojsko', 5211),
(153, 'Komen', 6223),
(154, 'Komenda', 1218),
(155, 'Koper/Capodistria ', 6000),
(156, 'Koper/Capodistria - poštni predali', 6001),
(157, 'Koprivnica', 8282),
(158, 'Kostanjevica na Krasu', 5296),
(159, 'Kostanjevica na Krki', 8311),
(160, 'Kostel', 1336),
(161, 'Košana', 6256),
(162, 'Kotlje', 2394),
(163, 'Kozina', 6240),
(164, 'Kozje', 3260),
(165, 'Kranj ', 4000),
(166, 'Kranj - poštni predali', 4001),
(167, 'Kranjska Gora', 4280),
(168, 'Kresnice', 1281),
(169, 'Križe', 4294),
(170, 'Križevci', 9206),
(171, 'Križevci pri Ljutomeru', 9242),
(172, 'Krka', 1301),
(173, 'Krmelj', 8296),
(174, 'Kropa', 4245),
(175, 'Krška vas', 8262),
(176, 'Krško', 8270),
(177, 'Kuzma', 9263),
(178, 'Laporje', 2318),
(179, 'Laško', 3270),
(180, 'Laze v Tuhinju', 1219),
(181, 'Lenart v Slovenskih goricah', 2230),
(182, 'Lendava/Lendva', 9220),
(183, 'Lesce', 4248),
(184, 'Lesično', 3261),
(185, 'Leskovec pri Krškem', 8273),
(186, 'Libeliče', 2372),
(187, 'Limbuš', 2341),
(188, 'Litija', 1270),
(189, 'Ljubečna', 3202),
(190, 'Ljubljana ', 1000),
(191, 'Ljubljana - poštni predali', 1001),
(192, 'Ljubljana - Črnuče', 1231),
(193, 'Ljubljana - Dobrunje', 1261),
(194, 'Ljubljana - Polje', 1260),
(195, 'Ljubljana - Šentvid', 1210),
(196, 'Ljubljana - Šmartno', 1211),
(197, 'Ljubno ob Savinji', 3333),
(198, 'Ljutomer', 9240),
(199, 'Loče', 3215),
(200, 'Log pod Mangartom', 5231),
(201, 'Log pri Brezovici', 1358),
(202, 'Logatec', 1370),
(203, 'Logatec', 1371),
(204, 'Loka pri Zidanem Mostu', 1434),
(205, 'Loka pri Žusmu', 3223),
(206, 'Lokev', 6219),
(207, 'Loški Potok', 1318),
(208, 'Lovrenc na Dravskem polju', 2324),
(209, 'Lovrenc na Pohorju', 2344),
(210, 'Luče', 3334),
(211, 'Lukovica', 1225),
(212, 'Mačkovci', 9202),
(213, 'Majšperk', 2322),
(214, 'Makole', 2321),
(215, 'Mala Nedelja', 9243),
(216, 'Malečnik', 2229),
(217, 'Marezige', 6273),
(218, 'Maribor ', 2000),
(219, 'Maribor - poštni predali', 2001),
(220, 'Marjeta na Dravskem polju', 2206),
(221, 'Markovci', 2281),
(222, 'Martjanci', 9221),
(223, 'Materija', 6242),
(224, 'Mavčiče', 4211),
(225, 'Medvode', 1215),
(226, 'Mengeš', 1234),
(227, 'Metlika', 8330),
(228, 'Mežica', 2392),
(229, 'Miklavž na Dravskem polju', 2204),
(230, 'Miklavž pri Ormožu', 2275),
(231, 'Miren', 5291),
(232, 'Mirna', 8233),
(233, 'Mirna Peč', 8216),
(234, 'Mislinja', 2382),
(235, 'Mojstrana', 4281),
(236, 'Mokronog', 8230),
(237, 'Moravče', 1251),
(238, 'Moravske Toplice', 9226),
(239, 'Most na Soči', 5216),
(240, 'Motnik', 1221),
(241, 'Mozirje', 3330),
(242, 'Murska Sobota ', 9000),
(243, 'Murska Sobota - poštni predali', 9001),
(244, 'Muta', 2366),
(245, 'Naklo', 4202),
(246, 'Nazarje', 3331),
(247, 'Notranje Gorice', 1357),
(248, 'Nova Cerkev', 3203),
(249, 'Nova Gorica ', 5000),
(250, 'Nova Gorica - poštni predali', 5001),
(251, 'Nova vas', 1385),
(252, 'Novo mesto', 8000),
(253, 'Novo mesto - poštni predali', 8001),
(254, 'Obrov', 6243),
(255, 'Odranci', 9233),
(256, 'Oplotnica', 2317),
(257, 'Orehova vas', 2312),
(258, 'Ormož', 2270),
(259, 'Ortnek', 1316),
(260, 'Osilnica', 1337),
(261, 'Otočec', 8222),
(262, 'Ožbalt', 2361),
(263, 'Pernica', 2231),
(264, 'Pesnica pri Mariboru', 2211),
(265, 'Petrovci', 9203),
(266, 'Petrovče', 3301),
(267, 'Piran/Pirano', 6330),
(268, 'Pišece', 8255),
(269, 'Pivka', 6257),
(270, 'Planina', 6232),
(271, 'Planina pri Sevnici', 3225),
(272, 'Pobegi', 6276),
(273, 'Podbočje', 8312),
(274, 'Podbrdo', 5243),
(275, 'Podčetrtek', 3254),
(276, 'Podgorci', 2273),
(277, 'Podgorje', 6216),
(278, 'Podgorje pri Slovenj Gradcu', 2381),
(279, 'Podgrad', 6244),
(280, 'Podkum', 1414),
(281, 'Podlehnik', 2286),
(282, 'Podnanos', 5272),
(283, 'Podnart', 4244),
(284, 'Podplat', 3241),
(285, 'Podsreda', 3257),
(286, 'Podvelka', 2363),
(287, 'Pohorje', 2208),
(288, 'Polenšak', 2257),
(289, 'Polhov Gradec', 1355),
(290, 'Poljane nad Škofjo Loko', 4223),
(291, 'Poljčane', 2319),
(292, 'Polšnik', 1272),
(293, 'Polzela', 3313),
(294, 'Ponikva', 3232),
(295, 'Portorož/Portorose', 6320),
(296, 'Postojna', 6230),
(297, 'Pragersko', 2331),
(298, 'Prebold', 3312),
(299, 'Preddvor', 4205),
(300, 'Prem', 6255),
(301, 'Preserje', 1352),
(302, 'Prestranek', 6258),
(303, 'Prevalje', 2391),
(304, 'Prevorje', 3262),
(305, 'Primskovo ', 1276),
(306, 'Pristava pri Mestinju', 3253),
(307, 'Prosenjakovci/Partosfalva', 9207),
(308, 'Prvačina', 5297),
(309, 'Ptuj', 2250),
(310, 'Ptujska Gora', 2323),
(311, 'Puconci', 9201),
(312, 'Rače', 2327),
(313, 'Radeče', 1433),
(314, 'Radenci', 9252),
(315, 'Radlje ob Dravi', 2360),
(316, 'Radomlje', 1235),
(317, 'Radovljica', 4240),
(318, 'Raka', 8274),
(319, 'Rakek', 1381),
(320, 'Rateče - Planica', 4283),
(321, 'Ravne na Koroškem', 2390),
(322, 'Rečica ob Savinji', 3332),
(323, 'Renče', 5292),
(324, 'Ribnica', 1310),
(325, 'Ribnica na Pohorju', 2364),
(326, 'Rimske Toplice', 3272),
(327, 'Rob', 1314),
(328, 'Ročinj', 5215),
(329, 'Rogaška Slatina', 3250),
(330, 'Rogašovci', 9262),
(331, 'Rogatec', 3252),
(332, 'Rovte', 1373),
(333, 'Ruše', 2342),
(334, 'Sava', 1282),
(335, 'Sečovlje/Sicciole', 6333),
(336, 'Selca', 4227),
(337, 'Selnica ob Dravi', 2352),
(338, 'Semič', 8333),
(339, 'Senovo', 8281),
(340, 'Senožeče', 6224),
(341, 'Sevnica', 8290),
(342, 'Sežana', 6210),
(343, 'Sladki Vrh', 2214),
(344, 'Slap ob Idrijci', 5283),
(345, 'Slovenj Gradec', 2380),
(346, 'Slovenska Bistrica', 2310),
(347, 'Slovenske Konjice', 3210),
(348, 'Smlednik', 1216),
(349, 'Soča', 5232),
(350, 'Sodražica', 1317),
(351, 'Solčava', 3335),
(352, 'Solkan', 5250),
(353, 'Sorica', 4229),
(354, 'Sovodenj', 4225),
(355, 'Spodnja Idrija', 5281),
(356, 'Spodnji Duplek', 2241),
(357, 'Spodnji Ivanjci', 9245),
(358, 'Središče ob Dravi', 2277),
(359, 'Srednja vas v Bohinju', 4267),
(360, 'Sromlje ', 8256),
(361, 'Srpenica', 5224),
(362, 'Stahovica', 1242),
(363, 'Stara Cerkev', 1332),
(364, 'Stari trg ob Kolpi', 8342),
(365, 'Stari trg pri Ložu', 1386),
(366, 'Starše', 2205),
(367, 'Stoperce', 2289),
(368, 'Stopiče', 8322),
(369, 'Stranice', 3206),
(370, 'Straža', 8351),
(371, 'Struge', 1313),
(372, 'Studenec', 8293),
(373, 'Suhor', 8331),
(374, 'Sv. Ana v Slovenskih goricah', 2233),
(375, 'Sv. Trojica v Slovenskih goricah', 2235),
(376, 'Sveti Duh na Ostrem Vrhu', 2353),
(377, 'Sveti Jurij ob Ščavnici', 9244),
(378, 'Sveti Štefan', 3264),
(379, 'Sveti Tomaž', 2258),
(380, 'Šalovci', 9204),
(381, 'Šempas', 5261),
(382, 'Šempeter pri Gorici', 5290),
(383, 'Šempeter v Savinjski dolini', 3311),
(384, 'Šenčur', 4208),
(385, 'Šentilj v Slovenskih goricah', 2212),
(386, 'Šentjanž', 8297),
(387, 'Šentjanž pri Dravogradu', 2373),
(388, 'Šentjernej', 8310),
(389, 'Šentjur', 3230),
(390, 'Šentrupert', 3271),
(391, 'Šentrupert', 8232),
(392, 'Šentvid pri Stični', 1296),
(393, 'Škocjan', 8275),
(394, 'Škofije', 6281),
(395, 'Škofja Loka', 4220),
(396, 'Škofja vas', 3211),
(397, 'Škofljica', 1291),
(398, 'Šmarje', 6274),
(399, 'Šmarje - Sap', 1293),
(400, 'Šmarje pri Jelšah', 3240),
(401, 'Šmarješke Toplice', 8220),
(402, 'Šmartno na Pohorju', 2315),
(403, 'Šmartno ob Dreti', 3341),
(404, 'Šmartno ob Paki', 3327),
(405, 'Šmartno pri Litiji', 1275),
(406, 'Šmartno pri Slovenj Gradcu', 2383),
(407, 'Šmartno v Rožni dolini', 3201),
(408, 'Šoštanj', 3325),
(409, 'Štanjel', 6222),
(410, 'Štore', 3220),
(411, 'Tabor', 3304),
(412, 'Teharje', 3221),
(413, 'Tišina', 9251),
(414, 'Tolmin', 5220),
(415, 'Topolšica', 3326),
(416, 'Trbonje', 2371),
(417, 'Trbovlje', 1420),
(418, 'Trebelno ', 8231),
(419, 'Trebnje', 8210),
(420, 'Trnovo pri Gorici', 5252),
(421, 'Trnovska vas', 2254),
(422, 'Trojane', 1222),
(423, 'Trzin', 1236),
(424, 'Tržič', 4290),
(425, 'Tržišče', 8295),
(426, 'Turjak', 1311),
(427, 'Turnišče', 9224),
(428, 'Uršna sela', 8323),
(429, 'Vače', 1252),
(430, 'Velenje ', 3320),
(431, 'Velenje - poštni predali', 3322),
(432, 'Velika Loka', 8212),
(433, 'Velika Nedelja', 2274),
(434, 'Velika Polana', 9225),
(435, 'Velike Lašče', 1315),
(436, 'Veliki Gaber', 8213),
(437, 'Veržej', 9241),
(438, 'Videm - Dobrepolje', 1312),
(439, 'Videm pri Ptuju', 2284),
(440, 'Vinica', 8344),
(441, 'Vipava', 5271),
(442, 'Visoko', 4212),
(443, 'Višnja Gora', 1294),
(444, 'Vitanje', 3205),
(445, 'Vitomarci', 2255),
(446, 'Vodice', 1217),
(447, 'Vojnik', 3212),
(448, 'Volčja Draga', 5293),
(449, 'Voličina', 2232),
(450, 'Vransko', 3305),
(451, 'Vremski Britof', 6217),
(452, 'Vrhnika', 1360),
(453, 'Vuhred', 2365),
(454, 'Vuzenica', 2367),
(455, 'Zabukovje ', 8292),
(456, 'Zagorje ob Savi', 1410),
(457, 'Zagradec', 1303),
(458, 'Zavrč', 2283),
(459, 'Zdole ', 8272),
(460, 'Zgornja Besnica', 4201),
(461, 'Zgornja Korena', 2242),
(462, 'Zgornja Kungota', 2201),
(463, 'Zgornja Ložnica', 2316),
(464, 'Zgornja Polskava', 2314),
(465, 'Zgornja Velka', 2213),
(466, 'Zgornje Gorje', 4247),
(467, 'Zgornje Jezersko', 4206),
(468, 'Zgornji Leskovec', 2285),
(469, 'Zidani Most', 1432),
(470, 'Zreče', 3214),
(471, 'Žabnica', 4209),
(472, 'Žalec', 3310),
(473, 'Železniki', 4228),
(474, 'Žetale', 2287),
(475, 'Žiri', 4226),
(476, 'Žirovnica', 4274),
(477, 'Žužemberk', 8360);

-- --------------------------------------------------------

--
-- Struktura tabele `comments`
--

CREATE TABLE `comments` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `appartment_ID` bigint(20) UNSIGNED NOT NULL,
  `user_ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `images`
--

CREATE TABLE `images` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `appartment_ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `short_description` varchar(250) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `locations`
--

CREATE TABLE `locations` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `locations`
--

INSERT INTO `locations` (`ID`, `title`, `description`) VALUES
(1, 'Obala', 'Aparatma s pogledom na morje. '),
(2, 'Podeželje', 'Apartmaji v umirjeni okolici, obdani z naravo.');

-- --------------------------------------------------------

--
-- Struktura tabele `rentals`
--

CREATE TABLE `rentals` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `appartment_ID` bigint(20) UNSIGNED NOT NULL,
  `user_ID` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `passwrd` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `res_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `passwrd` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `reg_date` date NOT NULL,
  `telephone` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`ID`, `username`, `first_name`, `last_name`, `passwrd`, `reg_date`, `telephone`, `email`, `admin`) VALUES
(1, 'francik', 'Franc', 'Klavž', '7f563bdf0acc97a23768eb113f1567e2932d09e5', '2016-05-18', '030276279', 'franciklavz@gmail.com', 1),
(9, 'markon', 'Marko', 'Novak', 'e6ca2c8ce2b5e6e7576a61ecc23ea0d0e648a7c7', '2016-05-24', '030276279', 'marko.novak@gmail.com', 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `appartments`
--
ALTER TABLE `appartments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `category_ID` (`category_ID`),
  ADD KEY `location_ID` (`location_ID`),
  ADD KEY `city_ID` (`city_ID`);

--
-- Indeksi tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indeksi tabele `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indeksi tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `appartment_ID` (`appartment_ID`);

--
-- Indeksi tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `appartment_ID` (`appartment_ID`);

--
-- Indeksi tabele `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indeksi tabele `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `appartment_ID` (`appartment_ID`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `appartments`
--
ALTER TABLE `appartments`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT tabele `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;
--
-- AUTO_INCREMENT tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `images`
--
ALTER TABLE `images`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `locations`
--
ALTER TABLE `locations`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT tabele `rentals`
--
ALTER TABLE `rentals`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
