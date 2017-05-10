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

--
-- Daten für Tabelle `sets`
--
INSERT INTO `sets` (`setID`, `userFK`, `setName`, `languange1`, `language2`) VALUES
(1, 4, 'testset', 's', 'd');

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
  `username` varchar(32) NOT NULL DEFAULT 'not null',
  `mail` varchar(32) NOT NULL DEFAULT 'not null',
  `pw` varchar(255) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--
INSERT INTO `user` (`userID`, `username`, `mail`, `pw`) VALUES
(4, 'Admin', 'admin@langwizz.ch', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `words`
--

CREATE TABLE `words` (
  `wordID` int(11) NOT NULL,
  `word1` varchar(50) NOT NULL DEFAULT 'not null',
  `word2` varchar(50) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `words`
--
INSERT INTO `words` (`wordID`, `word1`, `word2`) VALUES
(0, 'das Licht', 'light');

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
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
ALTER TABLE `user` CHANGE `userID` `userID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`setID`),
  ADD KEY `userFK` (`userFK`);
ALTER TABLE `sets` CHANGE `setID` `setID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indizes für die Tabelle `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `setFK` (`setFk`),
  ADD KEY `FKuser` (`userFK`);

--
-- Indizes für die Tabelle `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wordID`);
ALTER TABLE `words` CHANGE `wordID` `wordID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indizes für die Tabelle `word_set`
--
ALTER TABLE `word_set`
  ADD KEY `FKset` (`setFK`),
  ADD KEY `wordFK` (`wordFK`);

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
