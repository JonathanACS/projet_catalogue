-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 14 juin 2024 à 14:06
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
  `trailler` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_game`, `title_game`, `text_game`, `picture_right`, `picture_right_alt`, `picture_left`, `picture_left_alt`, `desc_game`, `trailler`) VALUES
(39, 'Titre eeeee', 'Titre ', '../img/jeu/VIs5ByTAEEiDdEaHmijJ.jpg', 'Titre ', '../img/jeu/hpENbgQNhfI18LYk5r5g.jpg', 'Titre ', 'Titre ', 'Titre '),
(40, 'test', 'test', '../img/jeu/NRidKi6zFRzs92jQ6GEO.jpg', 'test', '../img/jeu/J1r9pooKAyZcW4f7O679.png', 'test', 'test', 'test'),
(41, 'hollow knightrrrrrrrrr', 'hollow ', '../img/jeu/bP4eWpl92Mu2P8ndupfW.png', 'hollow ', '../img/jeu/Wu9r966zhpqQ4VKG8T3w.png', 'hollow ', 'hollow ', 'hollow '),
(42, 'aaaaaaaa', 'aaaaaaaa', '../img/jeu/pIe6KbtZt8xlH17mOVab.jpg', 'aaaaaaaa', '../img/jeu/OfRO2RrK3WirW39Nucsr.jpg', 'aaaaaaaa', 'aaaaaaaa', 'aaaaaaaa'),
(45, 'mario', 'mario', '../img/jeu/15aEksPsOI9SwUXgKMIt.jpg', 'mario', '../img/jeu/vcCsSkIlBJby72wb4mMw.jpg', 'mario', 'mario', 'mario'),
(46, 'mario2', 'mario2', '../img/jeu/1moThJ8OkVKaB8XM96Rk.jpg', 'mario2', '../img/jeu/cNEpVB0An3pa6mXaUoYJ.jpg', 'mario2', 'mario2', 'mario2'),
(47, 'avion', 'avion', '../img/jeu/hollow_knight.png', 'avion', '../img/jeu/gu5zsJpDwGWjQcQHSO1V.png', 'avion', 'avion', 'https://www.youtube.com/embed/nSPJXlYjENE?si=Fgegkr3vJFjvP6OZ'),
(48, 'hollow knight', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', '../img/jeu/d9CyUJo5LnRH55rKKgw0.png', 'hollow knight game', '../img/jeu/1YI95WvbXghoYNv5wMG0.png', 'hollow knight game', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', 'https://www.youtube.com/embed/nSPJXlYjENE?si=Fgegkr3vJFjvP6OZ');

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

CREATE TABLE `plateforme` (
  `id_plateforme` int NOT NULL,
  `id_game` int NOT NULL,
  `title_game` varchar(255) NOT NULL,
  `pc` tinyint(1) NOT NULL,
  `playstation` tinyint(1) NOT NULL,
  `xbox` tinyint(1) NOT NULL,
  `switch` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`id_plateforme`, `id_game`, `title_game`, `pc`, `playstation`, `xbox`, `switch`) VALUES
(1, 40, '', 1, 1, 1, 1),
(2, 41, '', 1, 1, 1, 1),
(3, 42, '', 1, 0, 0, 0),
(6, 45, '', 0, 0, 0, 1),
(7, 46, '', 0, 0, 0, 1),
(8, 47, '', 1, 1, 1, 1),
(9, 48, 'hollow knight', 1, 1, 1, 1);

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
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id_plateforme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
