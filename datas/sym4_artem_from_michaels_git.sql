-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 oct. 2018 à 20:12
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `sym4_artem`
--

CREATE DATABASE IF NOT EXISTS `sym4_artem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sym4_artem`;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `idauthor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thenickname` varchar(80) NOT NULL,
  `thepwd` varchar(80) NOT NULL,
  `thecompletename` varchar(120) NOT NULL,
  PRIMARY KEY (`idauthor`),
  UNIQUE KEY `lenom_UNIQUE` (`thenickname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`idauthor`, `thenickname`, `thepwd`, `thecompletename`) VALUES
(1, 'Trend', 'Trend', 'Reznor Trend'),
(2, 'Alexy', 'Alexy', 'Paralny Alexy');

-- --------------------------------------------------------

--
-- Structure de la table `thepage`
--

DROP TABLE IF EXISTS `thepage`;
CREATE TABLE IF NOT EXISTS `thepage` (
  `idthepage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` varchar(250) NOT NULL,
  `thelongtext` text NOT NULL,
  `thetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `author_idauthor` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idthepage`),
  KEY `fk_thepage_author_idx` (`author_idauthor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thepage`
--

INSERT INTO `thepage` (`idthepage`, `thetitle`, `thelongtext`, `thetime`, `author_idauthor`) VALUES
(1, 'UML', 'Le Langage de Modélisation Unifié, de l\'anglais Unified Modeling Language (UML), est un langage de modélisation graphique à base de pictogrammes conçu pour fournir une méthode normalisée pour visualiser la conception d\'un système. Il est couramment utilisé en développement logiciel et en conception orientée objet.\r\n\r\nL\'UML est le résultat de la fusion de précédents langages de modélisation objet : Booch, OMT, OOSE. Principalement issu des travaux de Grady Booch, James Rumbaugh et Ivar Jacobson, UML est à présent un standard adopté par l\'Object Management Group (OMG).\r\n\r\nUML est utilisé pour spécifier, visualiser, modifier et construire les documents nécessaires au bon développement d\'un logiciel orienté objet. UML offre un standard de modélisation, pour représenter l\'architecture logicielle. Les différents éléments représentables sont :\r\n\r\nActivité d\'un objet/logiciel\r\n\r\nActeurs\r\n\r\nProcessus\r\n\r\nSchéma de base de données\r\n\r\nComposants logiciels\r\n\r\nRéutilisation de composants\r\n\r\nGrâce aux outils de modélisation UML, il est également possible de générer automatiquement tout ou partie du code d\'une application logicielle, par exemple en langage Java, à partir des divers documents réalisés.', '2018-10-21 22:08:08', 2),
(2, 'MongoDB', 'MongoDB (de l\'anglais humongous qui peut être traduit par « énorme ») est un système de gestion de base de données orientée documents, répartissable sur un nombre quelconque d\'ordinateurs et ne nécessitant pas de schéma prédéfini des données. Il est écrit en C++. \r\n\r\nLe serveur et les outils sont distribués sous licence AGPL, les pilotes sous licence Apache et la documentation sous licence Creative Commons. Il fait partie de la mouvance NoSQL.\r\n\r\nMongoDB permet de manipuler des objets structurés au format BSON (JSON binaire), sans schéma prédéterminé. En d\'autres termes, des clés peuvent être ajoutées à tout moment « à la volée », sans reconfiguration de la base.\r\n\r\nLes données prennent la forme de documents enregistrés eux-mêmes dans des collections, une collection contenant un nombre quelconque de documents. Les collections sont comparables aux tables, et les documents aux enregistrements des bases de données relationnelles. \r\n\r\nContrairement aux bases de données relationnelles, les champs d\'un enregistrement sont libres et peuvent être différents d\'un enregistrement à un autre au sein d\'une même collection. \r\n\r\nLe seul champ commun et obligatoire est le champ de clé principale (\"id\"). Par ailleurs, MongoDB ne permet ni les requêtes très complexes standardisées, ni les JOIN, mais permet de programmer des requêtes spécifiques en JavaScript.', '2018-10-21 22:09:30', 2),
(3, 'MariaDB', 'En 2009, à la suite du rachat de MySQL par Sun Microsystems et des annonces du rachat de Sun Microsystems par Oracle Corporation, Michael Widenius, fondateur de MySQL, quitte cette société pour lancer le projet MariaDB, dans une démarche visant à remplacer MySQL tout en assurant l’interopérabilité. Le nom vient de la 2e fille de Michael Widenius, Maria (la première s\'appelant My).\r\n\r\nL’encyclopédie libre Wikipédia annonce, fin 2012, la migration de MySQL à MariaDB. Les distributions GNU/Linux, comme Fedora, openSuse et Debian abandonnent elles aussi MySQL.\r\n\r\nEn septembre 2013 Google annonce l\'adoption de MariaDB en lieu et place de MySQL. Dans la foulée un des ingénieurs de Google est affecté à la Fondation MariaDB.\r\n\r\nUn consortium baptisé « Open Database Alliance » a par ailleurs été créé pour assurer le développement du logiciel (comparable à la fondation Linux avec le noyau Linux).', '2018-10-21 22:11:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `thepage_has_thesection`
--

DROP TABLE IF EXISTS `thepage_has_thesection`;
CREATE TABLE IF NOT EXISTS `thepage_has_thesection` (
  `thepage_idthepage` int(10) UNSIGNED NOT NULL,
  `thesection_idthesection` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`thepage_idthepage`,`thesection_idthesection`),
  KEY `fk_thepage_has_thesection_thesection1_idx` (`thesection_idthesection`),
  KEY `fk_thepage_has_thesection_thepage1_idx` (`thepage_idthepage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thepage_has_thesection`
--

INSERT INTO `thepage_has_thesection` (`thepage_idthepage`, `thesection_idthesection`) VALUES
(2, 1),
(3, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `thesection`
--

DROP TABLE IF EXISTS `thesection`;
CREATE TABLE IF NOT EXISTS `thesection` (
  `idthesection` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thenamesection` varchar(120) NOT NULL,
  `thedescriptif` varchar(500) NOT NULL,
  PRIMARY KEY (`idthesection`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thesection`
--

INSERT INTO `thesection` (`idthesection`, `thenamesection`, `thedescriptif`) VALUES
(1, 'NoSQL', 'En informatique et en bases de données, NoSQL désigne une famille de systèmes de gestion de base de données (SGBD) qui s\'écarte du paradigme classique des bases relationnelles. L\'explicitation du terme la plus populaire de l\'acronyme est Not only SQL (« pas seulement SQL » en anglais) même si cette interprétation peut être discutée.'),
(2, 'SQL', 'SQL (sigle de Structured Query Language, en français langage de requête structurée) est un langage informatique normalisé servant à exploiter des bases de données relationnelles. La partie langage de manipulation des données de SQL permet de rechercher, d\'ajouter, de modifier ou de supprimer des données dans les bases de données relationnelles.'),
(3, 'Modèle de données', 'En informatique, un modèle de données est un modèle qui décrit de façon abstraite comment sont représentées les données dans une organisation métier, un système d\'information ou une base de données.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thepage`
--
ALTER TABLE `thepage`
  ADD CONSTRAINT `fk_thepage_author` FOREIGN KEY (`author_idauthor`) REFERENCES `author` (`idauthor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `thepage_has_thesection`
--
ALTER TABLE `thepage_has_thesection`
  ADD CONSTRAINT `fk_thepage_has_thesection_thepage1` FOREIGN KEY (`thepage_idthepage`) REFERENCES `thepage` (`idthepage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thepage_has_thesection_thesection1` FOREIGN KEY (`thesection_idthesection`) REFERENCES `thesection` (`idthesection`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;