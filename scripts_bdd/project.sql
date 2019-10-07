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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Universitaires'),
(2, 'Professionnelles'),
(3, 'Secondaires'),
(4, 'Moyennes'),
(5, 'Primaires'),
(6, 'Maternelles');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `user_name`, `description`, `id_categorie`, `date`) VALUES
(1, 'loucif', 'Ecrire un commentaire ici...', 1, '2019-01-12 09:50:12'),
(6, 'loucif', 'hello', 2, '2019-01-12 09:50:12'),
(7, 'karim', 'esi2019', 3, '2019-01-12 09:50:12'),
(8, 'kamel', 'esi2018', 4, '2019-01-12 09:50:12'),
(9, 'nabil', 'esi2017', 5, '2019-01-12 09:50:12'),
(10, 'omar', 'esi2016', 6, '2019-01-12 09:50:12'),
(11, 'ahmed', 'Ecrire un commentaire ici...', 2, '2019-01-14 02:04:36'),
(12, 'samir', 'Ecrire un commentaire ici...', 5, '2019-01-16 22:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `domaine` varchar(30) NOT NULL,
  `wilaya` varchar(30) NOT NULL,
  `commune` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `tel` int(30) NOT NULL,
  `fax` int(30) NOT NULL,
  `id_categorie` int(30) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `nom`, `domaine`, `wilaya`, `commune`, `adresse`, `tel`, `fax`, `id_categorie`, `actif`) VALUES
(1, 'Ecole Supérieure de Commerce', 'Commerce et finance', 'Oran', ' Es-Senia', ' 50 Rue des martyrs', 31562570, 31563050, 1, 1),
(2, 'Electronique', 'Boumerdes', 'Boumerdes-centre', ' 3500 Rue de la liberté.', '35562570', 35562570, 35563050, 1, 0),
(3, 'Informatique', 'Informatique', 'Alger', 'Oued Smar', ' 68 rue de la gare.', 23562570, 23563050, 1, 1),
(25, 'hôtellerie et restauration', 'Hôtellerie', 'Tizi-Ouzou', 'Es-Senia', '0 Rue des martyrs.', 21562570, 21563050, 2, 1),
(26, 'El-Falah', '', 'Mostaganem', 'Mansoura', '50 Rue de la liberté.', 21562570, 21563050, 3, 0),
(27, 'Madrassati', '', 'Alger', 'Hussein-Dey', ' 50 rue de la gare.', 23562570, 23563050, 4, 1),
(28, 'El-Nadjihine', '', 'Bouira', 'Lakhdaria', ' 50 Rue des dunes', 26562570, 26563050, 5, 1),
(30, 'mécanique', 'Mécanique', 'Blida', 'Soûmaa', 'Soûmaa', 21562570, 21563050, 2, 1),
(31, 'Les glycines', '', 'Alger', 'Chéraga', '50 Rue de la gare', 21562570, 21563050, 3, 1),
(32, 'La réussite', '', 'Bechar', 'Bechar', ' 50 Rue des dunes', 21562570, 21563050, 4, 1),
(34, 'El-Moustakbel', '', 'El-Moustakbel', 'Sidi Brahim', '50 Rue de la gare', 21562570, 21563050, 6, 1),
(35, 'Ecole Les Poussins', '', 'Alger', ' Dar-El-Beida', '50 Rue de la liberté.', 23562570, 23563050, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`,`commune`),
  ADD UNIQUE KEY `wilaya` (`wilaya`,`commune`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
