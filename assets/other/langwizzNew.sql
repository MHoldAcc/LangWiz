-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Apr 2017 um 11:00
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `langwizz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--

CREATE TABLE `sets` (
  `setID` int(11) NOT NULL,
  `userFK` int(11) NOT NULL,
  `setName` varchar(20) NOT NULL DEFAULT 'not null',
  `languange1` varchar(50) NOT NULL DEFAULT 'not null',
  `language2` varchar(50) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statistic`
--

CREATE TABLE `statistic` (
  `userFK` int(11) NOT NULL,
  `setFk` int(11) NOT NULL,
  `wordCorrect` int(11) NOT NULL,
  `wordWrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reportID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT 'not null',
  `mail` varchar(32) NOT NULL DEFAULT 'not null',
  `pw` varchar(32) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `name`, `mail`, `pw`) VALUES
(1, 'not null', 'laura.steiner@nyp.ch', '123456');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `words`
--

CREATE TABLE `words` (
  `wordID` int(11) NOT NULL,
  `word1` varchar(50) NOT NULL DEFAULT 'not null',
  `word2` varchar(50) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `word_set`
--

CREATE TABLE `word_set` (
  `setFK` int(11) NOT NULL,
  `wordFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`setID`),
  ADD KEY `userFK` (`userFK`);

--
-- Indizes für die Tabelle `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `setFK` (`setFk`),
  ADD KEY `FKuser` (`userFK`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indizes für die Tabelle `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wordID`);

--
-- Indizes für die Tabelle `word_set`
--
ALTER TABLE `word_set`
  ADD KEY `FKset` (`setFK`),
  ADD KEY `wordFK` (`wordFK`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`userFK`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `statistic`
--
ALTER TABLE `statistic`
  ADD CONSTRAINT `FKuser` FOREIGN KEY (`userFK`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setFK` FOREIGN KEY (`setFk`) REFERENCES `sets` (`setID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `word_set`
--
ALTER TABLE `word_set`
  ADD CONSTRAINT `FKset` FOREIGN KEY (`setFK`) REFERENCES `sets` (`setID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wordFK` FOREIGN KEY (`wordFK`) REFERENCES `words` (`wordID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
