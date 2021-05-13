-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 mai 2021 à 21:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondeemploidutemps`
--

-- --------------------------------------------------------

--
-- Structure de la table `cour`
--

DROP TABLE IF EXISTS `cour`;
CREATE TABLE IF NOT EXISTS `cour` (
  `IdC` int(11) NOT NULL AUTO_INCREMENT,
  `IdS` int(11) NOT NULL,
  `IdG` int(11) NOT NULL,
  `IdE` int(11) NOT NULL,
  `DateC` date NOT NULL,
  `DureC` varchar(11) NOT NULL,
  PRIMARY KEY (`IdC`),
  KEY `FKs` (`IdS`),
  KEY `FKG` (`IdG`),
  KEY `FKE` (`IdE`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cour`
--

INSERT INTO `cour` (`IdC`, `IdS`, `IdG`, `IdE`, `DateC`, `DureC`) VALUES
(166, 79, 36, 29, '2021-06-05', '16-18'),
(167, 81, 35, 29, '2021-05-21', '10-12');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `IdE` int(11) NOT NULL AUTO_INCREMENT,
  `NomE` varchar(20) NOT NULL,
  `PrenomE` varchar(20) NOT NULL,
  `EmailE` varchar(40) NOT NULL,
  `PasswordE` varchar(10) NOT NULL,
  `IdM` int(11) NOT NULL,
  PRIMARY KEY (`IdE`),
  KEY `fk` (`IdM`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`IdE`, `NomE`, `PrenomE`, `EmailE`, `PasswordE`, `IdM`) VALUES
(29, 'enseignant', 'loubna', 'enseignant@gmail.com', 'loubna', 43);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `IdG` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleG` varchar(20) NOT NULL,
  `effectifG` int(11) NOT NULL,
  PRIMARY KEY (`IdG`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`IdG`, `LibelleG`, `effectifG`) VALUES
(35, 'grp1', 20),
(36, 'grp3', 10),
(37, 'grp2', 50);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `IdM` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleM` varchar(20) NOT NULL,
  PRIMARY KEY (`IdM`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`IdM`, `LibelleM`) VALUES
(41, 'anglais'),
(42, 'arabe'),
(43, 'franÃ§ais');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `IdS` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleS` varchar(20) NOT NULL,
  `CapasiterS` int(11) NOT NULL,
  PRIMARY KEY (`IdS`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`IdS`, `LibelleS`, `CapasiterS`) VALUES
(79, 'EST', 50),
(80, 'YC', 10),
(81, 'FST', 20);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `NomUser` varchar(20) NOT NULL,
  `PrenomUser` varchar(20) NOT NULL,
  `EmailUser` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `NomUser`, `PrenomUser`, `EmailUser`, `password`) VALUES
(2, 'soussi', 'loubna', 'loubna@gmail.com', 'loubna123');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cour`
--
ALTER TABLE `cour`
  ADD CONSTRAINT `FKE` FOREIGN KEY (`IdE`) REFERENCES `enseignant` (`IdE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKG` FOREIGN KEY (`IdG`) REFERENCES `groupe` (`IdG`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKs` FOREIGN KEY (`IdS`) REFERENCES `salle` (`IdS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `fk` FOREIGN KEY (`IdM`) REFERENCES `matiere` (`IdM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
