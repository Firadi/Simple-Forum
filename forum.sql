-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 nov. 2023 à 19:48
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(600) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `date`) VALUES
(1, 3, 'how can i get 20 in the DS?', '2023-11-21 00:00:00'),
(7, 4, 'what mean ipsiCobi in language R?', '2023-11-21 00:00:00'),
(8, 3, 'how to add a navbar', '2023-11-21 00:00:00'),
(9, 4, 'how to add date in database', '2023-11-22 00:00:00'),
(10, 4, 'how to change the type of the date in database', '2023-11-22 12:11:12'),
(11, 5, 'Is this forum responsive ? ', '2023-11-22 12:11:15'),
(12, 3, 'thas it refrech automatically ', '2023-11-22 12:11:15'),
(13, 5, 'I wish to visit USA', '2023-11-22 12:11:45'),
(14, 5, 'Wher is abdellah ? ', '2023-11-22 12:11:02'),
(15, 6, 'Hello badr', '2023-11-22 12:11:41'),
(16, 5, 'Test', '2023-11-22 01:11:50'),
(17, 7, 'Whaaat ?', '2023-11-22 06:11:41'),
(18, 3, 'Test', '2023-11-22 07:11:30'),
(19, 4, 'hello Salah\r\n', '2023-11-22 07:11:45');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `response` varchar(2500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `user_id`, `question_id`, `response`, `date`) VALUES
(1, 3, 1, 'use chatgpt', '2023-11-21'),
(2, 3, 1, 'studie very hard', '2023-11-21'),
(3, 6, 15, 'Amaykomm ', '2023-11-22'),
(4, 5, 15, 'Hello abdo', '2023-11-22'),
(5, 3, 16, 'test 1\r\n', '2023-11-22'),
(6, 4, 15, 'test', '2023-11-22'),
(7, 4, 19, 'ok salina', '2023-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`) VALUES
(3, 'salah', 'salah@gmail.com', '$2y$10$P3vARRCEdkrNrvBmyV2A..RFyzFXOhp2CzPCBqGygnOip6mvH/xcW'),
(4, 'firadi', 'firadi.firadi@gmail.com', '$2y$10$7yUA3zO78UdeNWA.1ZDWY.fMe9MT6JgIdBDlIASHKlYb0mxVdZLZy'),
(5, 'Badr Firadi', 'Firadi@gmail.com', '$2y$10$8ONh60r6gsTpGMJiCkj9B.WnpahsoytgOjMz9gpL4dtfIMmEoInEK'),
(6, 'Abdellah', 'nait@gmail.com', '$2y$10$J9392tIHSqXd1QnYae422uR6tfKcdt8ogSyEU6OSvp6unPL52C6/.'),
(7, 'khalid', 'khalidlaghribi99@gmail.com', '$2y$10$RZDnbWBDtSlSbfIZkhPoYeKTvQ5mvJmTAPcpmSpkbZpfSLcSHmL4K');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_id` (`user_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_id2` (`user_id`),
  ADD KEY `fk_reponse_id` (`question_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `fk_client_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_reponse_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
