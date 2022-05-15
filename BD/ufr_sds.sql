-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 15 mai 2022 à 15:07
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ufr_sds`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'TAGNABOU', 'Sylvain', 'sylvat160@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `daten_e` datetime DEFAULT NULL,
  `email_e` varchar(255) DEFAULT NULL,
  `numero_e` varchar(20) NOT NULL,
  `numero_tuteur` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`numero_e`),
  KEY `numero_tuteur` (`numero_tuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`nom`, `prenom`, `daten_e`, `email_e`, `numero_e`, `numero_tuteur`) VALUES
('aphro', 'CG', '2000-05-12 00:00:00', 'aphro@gmail.com', '45578521', '8784965');

-- --------------------------------------------------------

--
-- Structure de la table `tuteurs`
--

DROP TABLE IF EXISTS `tuteurs`;
CREATE TABLE IF NOT EXISTS `tuteurs` (
  `nom` varchar(70) DEFAULT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `numero_t` varchar(20) NOT NULL,
  PRIMARY KEY (`numero_t`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tuteurs`
--

INSERT INTO `tuteurs` (`nom`, `prenom`, `numero_t`) VALUES
('lllll', 'aaaaa', '8784965'),
('Bourei', 'Namou', '8965212');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`numero_tuteur`) REFERENCES `tuteurs` (`numero_t`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
