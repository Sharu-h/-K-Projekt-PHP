-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jul 2021 um 14:18
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `früchte-dörrung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `frucht` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `fruits`
--

INSERT INTO `fruits` (`id`, `frucht`) VALUES
(1, 'Ananas'),
(2, 'Äpfel'),
(3, 'Aprikosen'),
(4, 'Avocado'),
(5, 'Bananen'),
(6, 'Birnen'),
(7, 'Blondorangen'),
(8, 'Blutorangen'),
(9, 'Brombeeren'),
(10, 'Clementinen'),
(11, 'Erdbeeren'),
(12, 'Feigen frisch'),
(13, 'Grapefruits'),
(14, 'Heidelbeeren'),
(15, 'Himbeeren'),
(16, 'Johannisbeeren'),
(17, 'Kaki'),
(18, 'Kirschen'),
(19, 'Kiwi'),
(20, 'Kiwi Bio Schweiz'),
(21, 'Limetten'),
(22, 'Litschis'),
(23, 'Mango'),
(24, 'Melonen'),
(25, 'Mirabellen'),
(26, 'Nektarinen'),
(27, 'Papaya'),
(28, 'Pfirsiche'),
(29, 'Pflaumen'),
(30, 'Preiselbeeren'),
(31, 'Quitten'),
(32, 'Stachelbeeren'),
(33, 'Trauben'),
(34, 'Kirschen'),
(35, 'Zwetschgen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `Id` int(11) NOT NULL,
  `name` text NOT NULL,
  `telefon` text NOT NULL,
  `email` text NOT NULL,
  `mengenkategorie` text NOT NULL,
  `frucht` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`Id`, `name`, `telefon`, `email`, `mengenkategorie`, `frucht`, `status`, `datum`) VALUES
(12, 'Helmut', '418800922', 'helmutschmidt@gmx.com', '15-20 KG / 18 Dörr Tage(+13)', 12, 0, '2021-08-09'),
(13, 'Martin Luther', '41755607113', 'm.luther@gmx.com', '10-15 KG / 12 Dörr Tage(+7)', 2, 0, '2021-07-28'),
(14, 'Mario', '0793332211', 'super.mario@gmail.com', '15-20 KG / 18 Dörr Tage(+13)', 28, 0, '2021-08-09'),
(15, 'Luigi', '0752010903', 'waluigi@edulu.ch', '5-10 KG / 8 Dörr Tage(+3)', 17, 0, '2021-07-20');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `frucht` (`frucht`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
