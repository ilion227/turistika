-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 23. maj 2016 ob 21.52
-- Različica strežnika: 10.1.9-MariaDB
-- Različica PHP: 5.6.15

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

-- --------------------------------------------------------

--
-- Struktura tabele `cities`
--

CREATE TABLE `cities` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`ID`, `username`, `first_name`, `last_name`, `passwrd`, `reg_date`, `telephone`, `email`) VALUES
(1, 'francik', 'Franc', 'Klavž', '7f563bdf0acc97a23768eb113f1567e2932d09e5', '2016-05-18', '030276279', 'franciklavz@gmail.com');

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
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `rentals`
--
ALTER TABLE `rentals`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
