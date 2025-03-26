-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 26 mars 2025 à 15:51
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nocturne`
--
CREATE DATABASE IF NOT EXISTS `nocturne` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nocturne`;

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `artist_id` int NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(50) NOT NULL,
  `artist_link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`artist_id`),
  UNIQUE KEY `artist_name` (`artist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `artist_link`) VALUES
(1, 'Ninho', 'https://www.youtube.com/channel/UCXdHJabqwLJ3NvPfx6XmS5Q');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(75) NOT NULL,
  `event_date` date NOT NULL,
  `event_hour` varchar(50) NOT NULL,
  `event_description` text NOT NULL,
  `event_adress` varchar(250) NOT NULL,
  `event_emplacement` varchar(75) NOT NULL,
  `event_price` varchar(50) DEFAULT NULL,
  `event_img` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_hour`, `event_description`, `event_adress`, `event_emplacement`, `event_price`, `event_img`, `user_id`) VALUES
(2, 'gezgz', '2025-03-13', '18:00', 'azerza', 'zafzaeza', 'ezarzae', '12', '67e3f6376d3d1_AFPA.PNG', 5),
(3, 'CEM on Fest', '1995-07-24', '16:00', 'haudfbaebieabveziyauzvhja', 'test', 'CEM', '0', '67e3fc727eb4f_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 5),
(4, 'gezuh', '1995-07-24', '18:00', 'alloallo', 'au cem', 'le havbre', '26', '67e415cfd5b56_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `event_artists`
--

CREATE TABLE IF NOT EXISTS `event_artists` (
  `event_id` int NOT NULL,
  `artist_id` int NOT NULL,
  PRIMARY KEY (`event_id`,`artist_id`),
  KEY `event_artists_ibfk_2` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `event_tags`
--

CREATE TABLE IF NOT EXISTS `event_tags` (
  `event_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`event_id`,`tag_id`),
  KEY `event_tags_ibfk_2` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag`) VALUES
(2, 'Country'),
(1, 'Rap');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_mail`, `user_firstname`, `user_lastname`, `user_password`) VALUES
(1, 'CEM', 'cem@mail.com', 'Jean', 'Noel', 'motdepasse'),
(3, 'darksaid', 'said@fadli.com', 'said', 'fadli', 'motdepasse'),
(4, 'testeur', 'test@gmail.com', 'barbier', 'théo', '$2y$10$q84.YlnvlpuiNN00B.Uswevk5VOynQfoCtB.rd6k7.xD7Ptmghh2u'),
(5, 'admin', 'admin@admin.admin', 'admin', 'admin', '$2y$10$7P6Dn2WekC4x2UmexTGwSexscCD7tC.bcEFVGmvmUWpiA7mlTRSZe'),
(6, 'admin2', 'admin2@admin.admin', 'admin2', 'admin2', '$2y$10$fwlV2jStbRq2cOceqVIdt.PFwE6nRZ4b00WU4YL6NSYAWbFYx3v56'),
(7, 'blake', 'gmail@com.barbier', 'Barbier', 'Théo', '$2y$10$1hUi73cOYjeDE.BK1y5tp.16428qi3qSRQq.ZuhvfWZzIwDdQwjhO');

-- --------------------------------------------------------

--
-- Structure de la table `user_participate_event`
--

CREATE TABLE IF NOT EXISTS `user_participate_event` (
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`event_id`),
  KEY `user_participate_event_ibfk_2` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_participate_event`
--

INSERT INTO `user_participate_event` (`user_id`, `event_id`) VALUES
(7, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `event_artists`
--
ALTER TABLE `event_artists`
  ADD CONSTRAINT `event_artists_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_artists_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event_tags`
--
ALTER TABLE `event_tags`
  ADD CONSTRAINT `event_tags_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_participate_event`
--
ALTER TABLE `user_participate_event`
  ADD CONSTRAINT `user_participate_event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_participate_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
