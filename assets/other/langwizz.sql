-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 10:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langwizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `sets`
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
-- Table structure for table `statistic`
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT 'not null',
  `mail` varchar(32) NOT NULL DEFAULT 'not null',
  `pw` varchar(32) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `wordID` int(11) NOT NULL,
  `word1` varchar(50) NOT NULL DEFAULT 'not null',
  `word2` varchar(50) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `word_set`
--

CREATE TABLE `word_set` (
  `setFK` int(11) NOT NULL,
  `wordFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`setID`),
  ADD KEY `userFK` (`userFK`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `setFK` (`setFk`),
  ADD KEY `FKuser` (`userFK`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wordID`);

--
-- Indexes for table `word_set`
--
ALTER TABLE `word_set`
  ADD KEY `FKset` (`setFK`),
  ADD KEY `wordFK` (`wordFK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`userFK`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistic`
--
ALTER TABLE `statistic`
  ADD CONSTRAINT `FKuser` FOREIGN KEY (`userFK`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setFK` FOREIGN KEY (`setFk`) REFERENCES `sets` (`setID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `word_set`
--
ALTER TABLE `word_set`
  ADD CONSTRAINT `FKset` FOREIGN KEY (`setFK`) REFERENCES `sets` (`setID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wordFK` FOREIGN KEY (`wordFK`) REFERENCES `words` (`wordID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
