-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 10:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `Volume_horaire` int(11) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL,
  `Taxe` int(11) DEFAULT NULL,
  `Nom` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `IDD` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_ecole` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`Volume_horaire`, `Prix`, `Taxe`, `Nom`, `ID`, `IDD`, `id_categorie`, `id_ecole`) VALUES
(1000, 11, 20, 'Bereautique', 1, 1, 1, '1'),
(60, 655, 25, 'Management', 2, 2, 1, '1'),
(50, 800, 20, 'Langues', 3, 3, 1, '2'),
(50, 1000, 15, 'Compabilite', 4, 4, 1, '2'),
(45, 650, 15, 'math', 4, 6, 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `type_formation`
--

CREATE TABLE `type_formation` (
  `st1` varchar(20) DEFAULT NULL,
  `st2` varchar(20) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_formation`
--

INSERT INTO `type_formation` (`st1`, `st2`, `ID`) VALUES
('Bereautique', 'word', 1),
('Management', 'Management1', 2),
('Langues', 'Englais', 3),
('Compabilite', 'Compabilite2', 4),
('Infographie', 'Infographie1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `password`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(11, 'karim', 'f2a47c6809d88e175dade0ef7b16aa13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`IDD`);

--
-- Indexes for table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `IDD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
