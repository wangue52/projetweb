-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2024 at 03:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int NOT NULL,
  `nom_admin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password_admin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `img_admin` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int NOT NULL,
  `nom_evenement` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `lieu` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `date_evenement` date NOT NULL,
  `id_type` int NOT NULL,
  `images_evenements` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(127) COLLATE utf8mb4_general_ci NOT NULL,
  `organisateur` varchar(127) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `lieu`, `date_evenement`, `id_type`, `images_evenements`, `description`, `organisateur`) VALUES
(8, 'mariage de vandi', 'kolofata', '2024-06-28', 1, 'images/DSC_0318_TRIPART.JPG', 'aucun', 'francis '),
(9, 'mariage de pavel', 'baffoussam', '2024-06-30', 1, 'images/IMG-20220103-WA0013.jpg', 'ras', 'jean'),
(10, 'marathon', 'douala', '2024-06-20', 1, 'images/IMG-20220616-WA0000.jpg', 'black en white', 'daniella');

-- --------------------------------------------------------

--
-- Table structure for table `faculte`
--

CREATE TABLE `faculte` (
  `id_faculte` int NOT NULL,
  `nom_faculte` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculte`
--

INSERT INTO `faculte` (`id_faculte`, `nom_faculte`) VALUES
(1, 'Faculte des Sciences'),
(2, 'Faculte des Sciences Juridiques et Politiques');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int NOT NULL,
  `nom_filiere` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_faculte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `id_faculte`) VALUES
(1, 'Informatique', 1),
(2, 'Droit Public', 2);

-- --------------------------------------------------------

--
-- Table structure for table `micro_evenement`
--

CREATE TABLE `micro_evenement` (
  `id_micro_evenement` int NOT NULL,
  `nom_micro_evenement` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `date_micro_evenement` date NOT NULL,
  `lieu_micro_evenement` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id_evenement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisateur`
--

CREATE TABLE `organisateur` (
  `id_organisateur` int NOT NULL,
  `nom_organisateur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password_organjsateur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail_organisateur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel_organisateur` int NOT NULL,
  `img_organisateur` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisateur`
--

INSERT INTO `organisateur` (`id_organisateur`, `nom_organisateur`, `password_organjsateur`, `e-mail_organisateur`, `tel_organisateur`, `img_organisateur`) VALUES
(1, 'Adamou Yougouda Ramadane', 'adamou', 'adamou@gmail.com', 693534265, '');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `noms` varchar(20) NOT NULL,
  `organisateur` varchar(20) NOT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `tel` varchar(127) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL,
  `filiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`noms`, `organisateur`, `nom_utilisateur`, `prenom_utilisateur`, `matricule`, `niveau`, `tel`, `email`, `id`, `filiere`) VALUES
('daniella', 'marathon', 'daniella', 'vbvbvb', '2222222222', 'Licence 3', '6666666', 'adamou@gmail.com', 1, 'vgvgvgv');

-- --------------------------------------------------------

--
-- Table structure for table `participants_evenement`
--

CREATE TABLE `participants_evenement` (
  `id_table_p` int NOT NULL,
  `id_evenement` int NOT NULL,
  `id_organisateur` int NOT NULL,
  `id_personnel` int NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id_personnel` int NOT NULL,
  `nom_personnel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_personnel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail_personnel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel_personnel` int NOT NULL,
  `img_personnel` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `nom_personnel`, `prenom_personnel`, `e-mail_personnel`, `password`, `tel_personnel`, `img_personnel`) VALUES
(1, 'Barka Gadji', '0', '0', '123456', 693534265, '');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `like_pub` int NOT NULL,
  `comment_pub` int NOT NULL,
  `id_organisateur` int NOT NULL,
  `id_evenement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type evenement`
--

CREATE TABLE `type evenement` (
  `id_type` int NOT NULL,
  `nom_type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_evenement`
--

CREATE TABLE `type_evenement` (
  `id_type` smallint NOT NULL,
  `nom_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_evenement`
--

INSERT INTO `type_evenement` (`id_type`, `nom_type`) VALUES
(1, 'fete national'),
(2, 'mariage');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `nom_utilisateur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_utilisateur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `matricule` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `niveau` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `id_filiere` int NOT NULL,
  `img_utilisateur` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `matricule`, `password`, `niveau`, `e-mail`, `tel`, `id_filiere`, `img_utilisateur`) VALUES
(1, 'Mahamat Alhafiz', '0', '20I032IU', '153522', 'Ma', 'mht@gmail.com', 657377527, 1, ''),
(2, 'Barka Gadji', 'Eugène Wilfried', '20A124FS', 'safehunt42', 'Licence 3', 'lhumiliteteprecedelagloire@gmail.com', 693534265, 1, ''),
(3, 'Ngoyong Kogni', 'Danielle', '20A121FS', 'danielle', 'Licence 3', 'ngoyongkognidanielle@gmail.com', 696923049, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id_faculte`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `id_faculte` (`id_faculte`);

--
-- Indexes for table `micro_evenement`
--
ALTER TABLE `micro_evenement`
  ADD PRIMARY KEY (`id_micro_evenement`),
  ADD KEY `id_evenement` (`id_evenement`);

--
-- Indexes for table `organisateur`
--
ALTER TABLE `organisateur`
  ADD PRIMARY KEY (`id_organisateur`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants_evenement`
--
ALTER TABLE `participants_evenement`
  ADD PRIMARY KEY (`id_table_p`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_organisateur` (`id_organisateur`),
  ADD KEY `id_personnel` (`id_personnel`),
  ADD KEY `participants_evenement_ibfk_4` (`id_utilisateur`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_organisateur` (`id_organisateur`),
  ADD KEY `id_evenement` (`id_evenement`);

--
-- Indexes for table `type evenement`
--
ALTER TABLE `type evenement`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `type_evenement`
--
ALTER TABLE `type_evenement`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id_faculte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `micro_evenement`
--
ALTER TABLE `micro_evenement`
  MODIFY `id_micro_evenement` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisateur`
--
ALTER TABLE `organisateur`
  MODIFY `id_organisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participants_evenement`
--
ALTER TABLE `participants_evenement`
  MODIFY `id_table_p` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id_personnel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type evenement`
--
ALTER TABLE `type evenement`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_evenement`
--
ALTER TABLE `type_evenement`
  MODIFY `id_type` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`id_faculte`) REFERENCES `faculte` (`id_faculte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `micro_evenement`
--
ALTER TABLE `micro_evenement`
  ADD CONSTRAINT `micro_evenement_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants_evenement`
--
ALTER TABLE `participants_evenement`
  ADD CONSTRAINT `participants_evenement_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_evenement_ibfk_2` FOREIGN KEY (`id_organisateur`) REFERENCES `organisateur` (`id_organisateur`),
  ADD CONSTRAINT `participants_evenement_ibfk_3` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`),
  ADD CONSTRAINT `participants_evenement_ibfk_4` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_organisateur`) REFERENCES `organisateur` (`id_organisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
