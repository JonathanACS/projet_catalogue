-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 14 juin 2024 à 07:22
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id_game` int NOT NULL,
  `title_game` varchar(255) NOT NULL,
  `text_game` text NOT NULL,
  `picture_right` varchar(255) NOT NULL,
  `picture_right_alt` varchar(255) NOT NULL,
  `picture_left` varchar(255) NOT NULL,
  `picture_left_alt` varchar(255) NOT NULL,
  `desc_game` text NOT NULL,
  `trailler` varchar(255) NOT NULL,
  `pc` tinyint(1) NOT NULL,
  `playstation` tinyint(1) NOT NULL,
  `xbox` tinyint(1) NOT NULL,
  `switch` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_game`, `title_game`, `text_game`, `picture_right`, `picture_right_alt`, `picture_left`, `picture_left_alt`, `desc_game`, `trailler`, `pc`, `playstation`, `xbox`, `switch`) VALUES
(31, 'hollow knight', 'hollow knight', '../img/jeu/89SPuKNRQ4yN6TgeCDzu.png', 'hollow knight', '../img/jeu/1DJn8ktD8dDXEYNuPyPx.png', 'hollow knight', 'hollow knight', 'hollow knight', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

CREATE TABLE `plateforme` (
  `id_plateforme` int NOT NULL,
  `pc` int NOT NULL,
  `playstation` int NOT NULL,
  `xbox` int NOT NULL,
  `switch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `roles`) VALUES
(3, 'test', 'test@test.test', '$argon2id$v=19$m=65536,t=4,p=1$M0lrV0pZV0szZUtGTXFMVw$woSbo1VeZM32LbI1FZzV/2yYrFoLDLpKPltM9AvzXhs', 'ROLE_USER'),
(4, 'test2', 'test2@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dDVpeE9vWXpCdHlmdURpNQ$m2ufAKKG3bG+nIcrW2C+o1+CBwqoBfjQFaK5KJLqito', 'ROLE_USER'),
(5, 'jonathan', 'jonathan@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UUJkTHJRaTdXL09qMmpEZA$46t1kjaNuShxcQmzVgSEKqit3yzk8rwGXUItvMDG+sw', 'ROLE_ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id_game`);

--
-- Index pour la table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`id_plateforme`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id_plateforme` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
