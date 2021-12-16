-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 déc. 2021 à 17:35
-- Version du serveur :  5.7.34-log
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdarticles`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `numArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenuArt` text NOT NULL,
  `dateArt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteurArt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`numArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numArticle`, `titre`, `contenuArt`, `dateArt`, `auteurArt`) VALUES
(1, 'Premier article du site', 'Aujourd\'hui est publié le premier article du site nous sommes très contents !', '2021-11-25 00:00:00', 'Geof'),
(2, 'Second article', 'Une personne a écrit un article !', '2021-12-16 00:00:00', 'ArtWriter'),
(3, 'Premier article écrit avec le form', 'Ici le contenu de l\'article !', '2021-12-16 17:23:02', 'Unknown Hat'),
(4, 'Le php pour les nuls', 'Oui !', '2021-12-16 18:24:25', 'Craburg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `numCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenuCom` text NOT NULL,
  `dateCom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numArticle` int(11) NOT NULL,
  `auteurCom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`numCommentaire`),
  KEY `Commentaire_Article_FK` (`numArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`numCommentaire`, `contenuCom`, `dateCom`, `numArticle`, `auteurCom`) VALUES
(1, 'C\'est génial !', '2021-11-25 00:00:00', 1, 'Incognito'),
(8, 'Enorme !', '2021-12-16 00:00:00', 1, 'ComWriter'),
(10, 'Bien joué !', '2021-12-16 17:44:52', 3, 'Unknown Hat'),
(11, 'article pertinent.', '2021-12-16 17:47:47', 3, 'frank'),
(12, 'First !', '2021-12-16 18:24:38', 4, 'Vandeburg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `Commentaire_Article_FK` FOREIGN KEY (`numArticle`) REFERENCES `article` (`numArticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
