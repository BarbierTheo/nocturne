-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 27 mars 2025 à 13:47
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
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(75) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `event_adress` varchar(250) NOT NULL,
  `event_emplacement` varchar(75) NOT NULL,
  `event_price` varchar(50) DEFAULT NULL,
  `event_hour` varchar(10) NOT NULL,
  `event_img` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_ibfk_1` (`user_id`),
  KEY `events_ibfk_2` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_description`, `event_adress`, `event_emplacement`, `event_price`, `event_hour`, `event_img`, `user_id`, `genre_id`) VALUES
(7, 'CEM on Fest', '2025-04-22', 'Super soirée avec plusieurs artistes de prévus', '2 rue Paul Vaillant Couturier, Le Havre', 'CEM', '0', '20:00', '67e529f72706e_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 2, 1),
(8, 'Soirée Jazz', '2025-05-27', 'Une soirée immersive avec des artistes de jazz reconnus, dans un cadre historique unique', '48 rue Général Sarrail', 'Fort de Tourneville', '5', '18:30', '67e5557e374cf_la-rhumerie-soiree-jazz-dimanche-lundi-2022.jpg', 2, 1),
(9, 'Concert Rock', '2025-06-06', 'Un concert en plein air avec des groupes locaux et internationaux de la scène rock', '48 rue Général Sarrail', 'Fort de Tourneville', '0', '21:00', '67e555c3b619d_so-5c99954d66a4bda8445ac20b-ph0.jpg', 3, 1),
(10, 'Théâtre - Le malade imaginaire', '2025-07-24', 'Une représentation moderne du classique de Molière, revisitée par une troupe talentueuse', '2 rue Paul Marion', 'Théâtre des bains douches', '5', '17:00', '67e556076e1d1_théatre-20094-800x400.jpg', 3, 2),
(11, 'DJSET Chiens errants', '2025-03-28', 'Les meilleurs DJ dans ta ville frérot', 'Mairie du Havre, place de l&#039;hôtel de ville', 'Chez Edouard Philippe', '50', '22:30', '67e55666bf903_electro.jpg', 4, 5),
(12, 'Ballet classique - Lac des Cygnes', '2025-08-22', 'Un chef-d&#039;œuvre intemporel interprété par l’un des plus grands ballets internationaux', 'Volcanoraptor', 'Le Volcan', '10', '18:05', '67e556b4d0d63_images.jpg', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`genre_id`),
  UNIQUE KEY `genre_name` (`genre_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(3, 'Cinéma'),
(1, 'Concert'),
(2, 'Culture'),
(4, 'Manifestation'),
(5, 'Soirée');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_mail`, `user_firstname`, `user_lastname`, `user_password`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', 'admin', '$2y$10$Ka6c8F1oPfdHvKOE0QE5MOGG4MtV.eC5Lkqr0QEd43.yzztHDk2xG'),
(2, 'blake', 'aaa@aa.aa', 'barbier', 'théo', '$2y$10$Ws.HvhL4DOEZMeq06/R4q.w8DiMqmpZZz15FVL1j9t2xzov81iTvy'),
(3, 'Primzark', 'primzark@mail.fr', 'Liva', 'Nicolas', '$2y$10$45A8.6i8dJbFfQw80h2.nemWiy3IHY/h2NQmbaDb6TGdoCU3kqrzu'),
(4, 'Darksaid', 'darksaid@mail.fr', 'Fadli', 'Said', '$2y$10$3mXyE93nlkxxxi.wPIkRo.vLHZkDJJcCaQ72s3IRU2m9C2MWUi09e');

-- --------------------------------------------------------

--
-- Structure de la table `user_participate_event`
--

DROP TABLE IF EXISTS `user_participate_event`;
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
(1, 7),
(3, 7),
(1, 8),
(3, 8),
(4, 8),
(1, 9),
(1, 10),
(4, 10),
(1, 12);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_participate_event`
--
ALTER TABLE `user_participate_event`
  ADD CONSTRAINT `user_participate_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
