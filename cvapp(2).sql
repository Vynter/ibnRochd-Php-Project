-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 mai 2021 à 22:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cvapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_loisir` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_loisir`,`id`),
  KEY `avoircandidat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_loisir`, `id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 3),
(5, 1),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permis` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `prenom`, `nom`, `adresse`, `telephone`, `email`, `permis`) VALUES
(1, 'mohamed amine', 'cheraitia', 'alger', '0665207513', 'amine-cheraitia@hotmail.com', 1),
(2, 'ahmed', 'said', 'bejaia', '0797969593', 'ahmed-said@gmail.com', 0),
(3, 'karim mohamed', 'merouan', 'alger', '021262349', 'karim@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nom_ent` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secteur` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_exp`),
  KEY `expcand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `date_debut`, `date_fin`, `nom_ent`, `secteur`, `poste`, `mission`, `id`) VALUES
(1, '2017-01-02', '2018-09-30', 'Sarl TLA', 'Alger', 'Responsable des finances', '- Analyse des comptes\r\n- Etablir le budget annuel\r\n- Clôture des comptes', 1),
(2, '2019-11-06', '2021-04-26', 'Easy Network', 'Alger', 'Développeur d\'applications', '- Analyse des besoins\r\n- Conception de la base de données\r\n- Conception et implémentation de la base de Données', 1),
(3, '2021-03-24', '2021-04-13', 'nassidjcom', 'blida', 'community manager', ' Développer la notoriété de la marque (de l\'entreprise, de l\'institution, de l\'association) sur le web. ...\r\nAnimer la communauté et renforcer sa cohésion. ...\r\nAccompagner le développement technique et fonctionnel de la plateforme. .', 2),
(4, '2021-03-23', '2021-04-23', 'ent national', 'alger', 'Développeur web', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_diplome` int(11) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `établissement` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_diplome`),
  KEY `candidaformation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_diplome`, `diplome`, `établissement`, `id`) VALUES
(1, 'Licence en science et comptabilité', 'dely ibrahim', 1),
(2, 'Bts en informatique de gestion', 'Mohamed tayeb boucena', 1),
(3, 'Licence en génie civile', ' USTHB', 2),
(4, 'Master en management', 'MDI', 2),
(5, 'Licence en science humaine', 'bouzereha', 3);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `description`) VALUES
(1, 'Arabe'),
(2, 'Français'),
(3, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `logiciel`
--

DROP TABLE IF EXISTS `logiciel`;
CREATE TABLE IF NOT EXISTS `logiciel` (
  `id_logiciel` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_logiciel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `logiciel`
--

INSERT INTO `logiciel` (`id_logiciel`, `description`) VALUES
(1, 'Word'),
(2, 'Excel'),
(3, 'Access'),
(4, 'PowerPoint'),
(5, 'Outlook'),
(6, 'SAP'),
(7, 'Sage'),
(8, 'DLG');

-- --------------------------------------------------------

--
-- Structure de la table `loisir`
--

DROP TABLE IF EXISTS `loisir`;
CREATE TABLE IF NOT EXISTS `loisir` (
  `id_loisir` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_loisir`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loisir`
--

INSERT INTO `loisir` (`id_loisir`, `description`) VALUES
(1, 'Sport'),
(2, 'Voyage'),
(3, 'Cinema '),
(4, 'Lecture'),
(5, 'Jeux video'),
(6, 'Randonnée'),
(7, 'Photographie');

-- --------------------------------------------------------

--
-- Structure de la table `maitrise`
--

DROP TABLE IF EXISTS `maitrise`;
CREATE TABLE IF NOT EXISTS `maitrise` (
  `id_logiciel` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_logiciel`,`id`),
  KEY `candidamaitrise` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maitrise`
--

INSERT INTO `maitrise` (`id_logiciel`, `id`) VALUES
(2, 1),
(3, 1),
(4, 2),
(6, 3),
(7, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parler`
--

DROP TABLE IF EXISTS `parler`;
CREATE TABLE IF NOT EXISTS `parler` (
  `id_langue` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_langue`,`id`),
  KEY `candidparler` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parler`
--

INSERT INTO `parler` (`id_langue`, `id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoircandidat` FOREIGN KEY (`id`) REFERENCES `candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avoirloisir` FOREIGN KEY (`id_loisir`) REFERENCES `loisir` (`id_loisir`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `expcand` FOREIGN KEY (`id`) REFERENCES `candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `candidaformation` FOREIGN KEY (`id`) REFERENCES `candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `maitrise`
--
ALTER TABLE `maitrise`
  ADD CONSTRAINT `candidamaitrise` FOREIGN KEY (`id`) REFERENCES `candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `logicielmaitrse` FOREIGN KEY (`id_logiciel`) REFERENCES `logiciel` (`id_logiciel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `parler`
--
ALTER TABLE `parler`
  ADD CONSTRAINT `candidparler` FOREIGN KEY (`id`) REFERENCES `candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `langueparler` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
