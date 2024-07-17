-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2024 at 03:02 PM
-- Server version: 10.11.3-MariaDB-1+rpi1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detendeur`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acquisition`
--

CREATE TABLE `Acquisition` (
  `id-acquisition` int(10) NOT NULL,
  `id-seance` int(10) NOT NULL,
  `pression` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Acquisition`
--

INSERT INTO `Acquisition` (`id-acquisition`, `id-seance`, `pression`) VALUES
(1, 1, 95),
(2, 1, 91),
(3, 1, 87),
(4, 1, 84),
(5, 1, 75),
(6, 1, 69),
(7, 1, 62),
(8, 1, 58),
(9, 1, 54),
(10, 1, 49),
(11, 1, 46),
(12, 1, 48),
(13, 1, 43),
(14, 1, 39),
(15, 1, 40),
(16, 2, 81),
(17, 2, 10),
(18, 2, 9),
(19, 2, 13),
(20, 2, 41),
(21, 2, 67),
(22, 2, 10),
(23, 2, 51),
(24, 2, 24),
(25, 2, 66),
(26, 2, 62),
(27, 2, 10),
(28, 2, 65),
(29, 2, 95),
(30, 2, 79),
(31, 3, 82),
(32, 3, 25),
(33, 3, 79),
(34, 3, 22),
(35, 3, 71),
(36, 3, 91),
(37, 3, 41),
(38, 3, 35),
(39, 3, 53),
(40, 3, 60),
(41, 3, 42),
(42, 3, 32),
(43, 3, 32),
(44, 3, 65),
(45, 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `Groupes`
--

CREATE TABLE `Groupes` (
  `id-groupes` int(10) NOT NULL,
  `nom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Groupes`
--

INSERT INTO `Groupes` (`id-groupes`, `nom`) VALUES
(1, 'Admin'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `Seances`
--

CREATE TABLE `Seances` (
  `id-seance` int(10) NOT NULL,
  `id-utilisateur` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `enregistrement` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Seances`
--

INSERT INTO `Seances` (`id-seance`, `id-utilisateur`, `date`, `enregistrement`) VALUES
(1, 1, '2024-05-24 14:30:00', 'Enregistrement 1'),
(2, 1, '2024-05-25 09:00:00', 'Enregistrement 2'),
(3, 1, '2024-05-26 16:45:00', 'Enregistrement 3'),
(4, 1, '2024-05-27 11:15:00', 'Enregistrement 4'),
(5, 1, '2024-05-28 08:00:00', 'Enregistrement 5');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id_utilisateur` int(10) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_groupe` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `login`, `password`, `id_groupe`) VALUES
(1, 'SOILIHI', 'Kyllian', 'ZeuroHK', 'doublepi', 1),
(2, 'AMARA', 'Hedy', 'renbmp', 'doublepi', 1),
(3, 'HAMADI MONDOHA', 'Idarouss', 'Itake', 'malveillance', 2),
(4, 'GUILIANO', 'Akram', 'HuLk1313', 'walakadaktoubitoubihada', 2),
(12, 'MZE MMADI', 'Habib', 'Sossboy', 'tchiyeyy', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acquisition`
--
ALTER TABLE `Acquisition`
  ADD PRIMARY KEY (`id-acquisition`),
  ADD KEY `FK_AcquisitionSeance` (`id-seance`);

--
-- Indexes for table `Seances`
--
ALTER TABLE `Seances`
  ADD PRIMARY KEY (`id-seance`),
  ADD KEY `FK_SeanceUtilisateur` (`id-utilisateur`);

--
-- Indexes for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acquisition`
--
ALTER TABLE `Acquisition`
  MODIFY `id-acquisition` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `Seances`
--
ALTER TABLE `Seances`
  MODIFY `id-seance` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id_utilisateur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Acquisition`
--
ALTER TABLE `Acquisition`
  ADD CONSTRAINT `FK_AcquisitionSeance` FOREIGN KEY (`id-seance`) REFERENCES `Seances` (`id-seance`);

--
-- Constraints for table `Seances`
--
ALTER TABLE `Seances`
  ADD CONSTRAINT `FK_SeanceUtilisateur` FOREIGN KEY (`id-utilisateur`) REFERENCES `Utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
