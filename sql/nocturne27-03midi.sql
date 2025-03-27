-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 27 mars 2025 à 11:02
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

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `event_name` varchar(75) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `event_adress` varchar(250) NOT NULL,
  `event_emplacement` varchar(75) NOT NULL,
  `event_price` varchar(50) DEFAULT NULL,
  `event_hour` varchar(10) NOT NULL,
  `event_img` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  `genre_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_description`, `event_adress`, `event_emplacement`, `event_price`, `event_hour`, `event_img`, `user_id`, `genre_id`) VALUES
(5, 'azeza', '1995-07-24', 'aa', 'aa', 'aa', '0', '18:00', '67e5103750d23_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 1, 1),
(6, 'gaegea', '2222-02-22', 'feea', 'fefea', 'feaea', '0', '18:00', '67e5208d7dda5_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 1, 1),
(7, 't&#039;goggrl', '1995-02-24', 'hrnoe', 'gierzniogz', 'grenzion', '0', '18:00', '67e529f72706e_cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Concert');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_pseudo` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_mail`, `user_firstname`, `user_lastname`, `user_password`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', 'admin', '$2y$10$Ka6c8F1oPfdHvKOE0QE5MOGG4MtV.eC5Lkqr0QEd43.yzztHDk2xG'),
(2, 'blake', 'aaa@aa.aa', 'barbier', 'théo', '$2y$10$Ws.HvhL4DOEZMeq06/R4q.w8DiMqmpZZz15FVL1j9t2xzov81iTvy');

-- --------------------------------------------------------

--
-- Structure de la table `user_participate_event`
--

CREATE TABLE `user_participate_event` (
  `user_id` int NOT NULL,
  `event_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_participate_event`
--

INSERT INTO `user_participate_event` (`user_id`, `event_id`) VALUES
(2, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_pseudo` (`user_pseudo`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- Index pour la table `user_participate_event`
--
ALTER TABLE `user_participate_event`
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Contraintes pour la table `user_participate_event`
--
ALTER TABLE `user_participate_event`
  ADD CONSTRAINT `user_participate_event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_participate_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
