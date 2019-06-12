-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 21 mars 2019 à 00:23
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_trombi`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `typeof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `label`, `parent`, `typeof`, `color`, `description`) VALUES
(1, 'Comité de direction', NULL, 'pole', '#EEFFCD', NULL),
(2, 'Conseil de laboratoire', NULL, 'pole', '#B8E55E', NULL),
(3, 'Direction', NULL, 'pole', '#FF5733', NULL),
(4, 'Service d\'appui', 1, 'service', 'grey', NULL),
(5, 'Mécanique', 4, 'service', '#DE94FC', NULL),
(6, 'Electronique', 4, 'service', '#DE94FC', NULL),
(7, 'Instrumentation', 4, 'service', '#DE94FC', NULL),
(8, 'Calcul scientifique', 4, 'service', '#DE94FC', NULL),
(9, 'Service d\'accompagnement', 3, 'service', 'grey', NULL),
(10, 'Administratif et financier', 9, 'service', '#E6FF47', NULL),
(11, 'Ressources informatiques', 9, 'service', '#E6FF47', NULL),
(12, 'Hygiène et sécurité', 9, 'service', '#E6FF47', NULL),
(13, 'Infrastructure', 9, 'service', '#E6FF47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `home_directory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `login`, `password`, `role`, `home_directory`, `startdate`, `enddate`, `activated`) VALUES
(1, 'root@root.com', 'root', 1, 'non', NULL, NULL, 1),
(2, 'test@test.com', 'test', 2, 'non', NULL, NULL, 1),
(4, 'jack@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(5, 'fred@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(6, 'steph@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(7, 'valentin@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(8, 'lea@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(9, 'elise@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(10, 'marlone@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(11, 'alexandre@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(12, 'guillaume@gmail.com', 'test', 2, 'test', NULL, NULL, 1),
(13, 'robert@gmail.com', 'test', 2, 'test', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `personne` int(11) DEFAULT NULL,
  `typeof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homeorganization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `securite_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupinfo`
--

CREATE TABLE `groupinfo` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `placebirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` int(11) DEFAULT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingeeps` tinyint(1) DEFAULT NULL,
  `arrivaldate` datetime DEFAULT NULL,
  `departuredate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `compte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `firstname`, `lastname`, `birthdate`, `placebirth`, `homephone`, `mobilephone`, `mail`, `office`, `building`, `tutelle`, `ingeeps`, `arrivaldate`, `departuredate`, `status`, `compte`) VALUES
(1, 'Aadministrateur', 'jack', NULL, 'Orsay', '0101010101', '0606060606', 'root@root.com', 1, 'LRI', '', 1, NULL, NULL, 1, 1),
(2, 'User', 'jack', NULL, 'Orsay', '0101010101', '0606060606', 'root@root.com', 7, 'Gustave eiffel', '', 1, NULL, NULL, 1, 2),
(5, 'Jack', 'Johnson', NULL, 'Osay', '0101010101', '0606060606', 'jack@gmail.com', 5, 'Bat 32', '', 1, NULL, NULL, 2, 4),
(6, 'Frederique', 'Dupont', NULL, 'Palaiseau', '0101010101', '0606060606', 'fred@gmail.com', 5, 'Bat 2', '', 1, NULL, NULL, 1, 5),
(8, 'Stephane', 'henri', NULL, 'Vitry', '0101010101', '0606060606', 'steph@gmail.com', 5, 'Bat 9', '', 1, NULL, NULL, 1, 6),
(9, 'Valentin', 'Decarse', NULL, 'Orsay', '0101010101', '0606060606', 'val@gmail.com', 5, 'Bat 4', '', 1, NULL, NULL, 1, 7),
(10, 'Léa', 'Jilloru', NULL, 'Gif sur Yvette', '0101010101', '0606060606', 'lea@gmail.com', 5, 'Bat 255', '', 1, NULL, NULL, 2, 8),
(11, 'Elise', 'Reic', NULL, 'Bures', '0101010101', '0606060606', 'elise@gmail.com', 5, 'Bat 8', '', 1, NULL, NULL, 2, 9),
(13, 'Marlone', 'Jazzy', NULL, 'Choisy', '0101010101', '0606060606', 'marlone@gmail.com', 5, 'Bat 65', '', 1, NULL, NULL, 1, 10),
(14, 'Alexandre', 'Dupont', NULL, 'St-Cyr', '0101010101', '0606060606', 'alex@gmail.com', 5, 'Bat 20', '', 1, NULL, NULL, 1, 11),
(15, 'Guillaume', 'Dupont', NULL, 'Orsay', '0101010101', '0606060606', 'guillaume@gmail.com', 5, 'Bat 855', '', 1, NULL, NULL, 1, 12),
(16, 'Robert', 'Dupont', NULL, 'Gif sur Yvette', '0101010101', '0606060606', 'robert@gmail.com', 5, 'Bat 15', '', 1, NULL, NULL, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id` int(11) NOT NULL,
  `responsable` int(11) DEFAULT NULL,
  `personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `label`) VALUES
(1, 'Ingénieur'),
(2, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `typeofcontrat`
--

CREATE TABLE `typeofcontrat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeofcontrat`
--

INSERT INTO `typeofcontrat` (`id`, `name`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Alternance'),
(4, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `workon`
--

CREATE TABLE `workon` (
  `id` int(11) NOT NULL,
  `personne` int(11) DEFAULT NULL,
  `activite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `workon`
--

INSERT INTO `workon` (`id`, `personne`, `activite`) VALUES
(1, 9, 2),
(4, 11, 2),
(5, 5, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFF6526057698A6A` (`role`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_60349993FCEC9EF` (`personne`),
  ADD UNIQUE KEY `UNIQ_603499938CDE5729` (`type`);

--
-- Index pour la table `groupinfo`
--
ALTER TABLE `groupinfo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FCEC9EFCFF65260` (`compte`),
  ADD KEY `IDX_FCEC9EF7B00651C` (`status`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_52520D0752520D07` (`responsable`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeofcontrat`
--
ALTER TABLE `typeofcontrat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `workon`
--
ALTER TABLE `workon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_715C0BA7FCEC9EF` (`personne`),
  ADD KEY `IDX_715C0BA7B8755515` (`activite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupinfo`
--
ALTER TABLE `groupinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `typeofcontrat`
--
ALTER TABLE `typeofcontrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `workon`
--
ALTER TABLE `workon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_CFF6526057698A6A` FOREIGN KEY (`role`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `FK_603499938CDE5729` FOREIGN KEY (`type`) REFERENCES `typeofcontrat` (`id`),
  ADD CONSTRAINT `FK_60349993FCEC9EF` FOREIGN KEY (`personne`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_FCEC9EF7B00651C` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_FCEC9EFCFF65260` FOREIGN KEY (`compte`) REFERENCES `compte` (`id`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `FK_52520D0752520D07` FOREIGN KEY (`responsable`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `workon`
--
ALTER TABLE `workon`
  ADD CONSTRAINT `FK_715C0BA7B8755515` FOREIGN KEY (`activite`) REFERENCES `activite` (`id`),
  ADD CONSTRAINT `FK_715C0BA7FCEC9EF` FOREIGN KEY (`personne`) REFERENCES `personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
