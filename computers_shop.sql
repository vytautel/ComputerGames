-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 m. Lap 04 d. 14:09
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computers_shop`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(10) NOT NULL,
  `pavadinimas` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `aprasas` varchar(1000) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `kategorijos`
--

INSERT INTO `kategorijos` (`id`, `pavadinimas`, `aprasas`) VALUES
(2, 'ss', 'ssssss'),
(3, 'd', '    d');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `paskyros`
--

CREATE TABLE `paskyros` (
  `id` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `pastas` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `teises` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `komentaras` varchar(1000) COLLATE utf8_lithuanian_ci NOT NULL,
  `blokavimas` varchar(10) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `paskyros`
--

INSERT INTO `paskyros` (`id`, `username`, `pastas`, `teises`, `komentaras`, `blokavimas`) VALUES
(4, 'vytautel', 'vyt@kl.lt', 'admin', '    ', 'blokuota'),
(5, 'titas', 't@t.lt', 'admin', '    a', 'aktyvi'),
(6, 'neringa', 'n@d.lt', 'client', '    aa', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `prekes`
--

CREATE TABLE `prekes` (
  `id` int(100) NOT NULL,
  `pavadinimas` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_lithuanian_ci NOT NULL,
  `aprasas` mediumtext CHARACTER SET ucs2 COLLATE ucs2_lithuanian_ci NOT NULL,
  `gavejo_miestas` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_lithuanian_ci NOT NULL,
  `issiuntimo_laikas` datetime NOT NULL,
  `gavimo_laikas` datetime NOT NULL,
  `statuso_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Sukurta duomenų kopija lentelei `prekes`
--

INSERT INTO `prekes` (`id`, `pavadinimas`, `aprasas`, `gavejo_miestas`, `issiuntimo_laikas`, `gavimo_laikas`, `statuso_id`) VALUES
(5, 'Žaidimas 10', '    ', 'Panevėžys', '2021-10-13 00:00:00', '2021-11-20 00:00:00', 2),
(6, 'Žaidimas 2', '    ', 'Vilnius', '2021-10-21 00:00:00', '2021-10-17 00:00:00', 4),
(7, 'Žaidimas 20', '    ', 'Klaipėda', '2021-10-13 00:00:00', '2021-11-17 00:00:00', 2),
(9, 'Žaidimas 21', '    ', 'Klaipėda', '2021-11-25 00:00:00', '2021-11-04 00:00:00', 3),
(10, 'Žaidimas 222', '    ', 'gg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `prisijungimai`
--

CREATE TABLE `prisijungimai` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rights` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Sukurta duomenų kopija lentelei `prisijungimai`
--

INSERT INTO `prisijungimai` (`id`, `username`, `password`, `rights`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee'),
(9, 'client', '62608e08adc29a8d6dbc9754e659f125', 'client');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `statusai`
--

CREATE TABLE `statusai` (
  `stat_id` int(100) NOT NULL,
  `statusas` varchar(120) COLLATE ucs2_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `statusai`
--

INSERT INTO `statusai` (`stat_id`, `statusas`) VALUES
(1, 'ruošiama'),
(2, 'išsiųsta'),
(3, 'laukia atsiėmimo'),
(4, 'pristatyta pirkėjui'),
(5, 'atšaukta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paskyros`
--
ALTER TABLE `paskyros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prisijungimai`
--
ALTER TABLE `prisijungimai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusai`
--
ALTER TABLE `statusai`
  ADD PRIMARY KEY (`stat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paskyros`
--
ALTER TABLE `paskyros`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prekes`
--
ALTER TABLE `prekes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prisijungimai`
--
ALTER TABLE `prisijungimai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusai`
--
ALTER TABLE `statusai`
  MODIFY `stat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
