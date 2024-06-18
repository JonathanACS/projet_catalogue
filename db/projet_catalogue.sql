-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 18 juin 2024 à 12:27
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
  `picture_header` varchar(255) NOT NULL,
  `picture_header_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_game`, `title_game`, `text_game`, `picture_right`, `picture_right_alt`, `picture_left`, `picture_left_alt`, `desc_game`, `trailler`, `picture_header`, `picture_header_alt`) VALUES
(55, 'hollow knight', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses\">\">', '../img/jeu/ixRKCeHPVGxmGqJU7izx.png', 'hollow knight game', '../img/jeu/WRLS6s1L1ym6qbVfKPGH.png', 'hollow knight game', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', 'https://www.youtube.com/embed/nSPJXlYjENE?si=GcfzVZnFWlYe0pIy', '', ''),
(56, 'dark souls 3', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes', '../img/jeu/YzRUNSUBKfgVuVchzUxc.jpg', 'dark souls 3 game', '../img/jeu/4oO4QVZ0B50t0jHgArrk.jpg', 'dark souls 3 game', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '', ''),
(57, 'Jeu', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', '../img/jeu/vNZU9020kwsTKEtHDOs7.jpg', 'aaaa', '../img/jeu/1J5nmo6yUTHgj2x0hrm9.jpg', 'aaa', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '', ''),
(58, 'aaa', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '../img/jeu/tRnbwqtM2iaAU6FZDHES.png', 'aaa', '../img/jeu/A6JQ0zUjqzkGPYYf6goa.png', 'aaa', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '', ''),
(59, 'avion', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoohttps://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '../img/jeu/gKLttmQB391LnHt0zKDT.jpg', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '../img/jeu/i2CsTAQMDH9iqeTnQvLb.jpg', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoohttps://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '', ''),
(60, 'hollow knight', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', '../img/jeu/x9r60TNvyc4vrquh0qMg.png', 'hollow knight game', '../img/jeu/j1Fw5a9PzC5iRBWuV1tz.png', 'hollow knight game', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', 'https://www.youtube.com/embed/nSPJXlYjENE?si=GcfzVZnFWlYe0pIy', '', ''),
(61, 'dark souls 3', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes', '../img/jeu/tCq4ThJLiWkXhOCpp8O3.jpg', 'dark souls 3 game', '../img/jeu/2KUuAXPdn1sESdl591UV.jpg', 'dark souls 3 game', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '', ''),
(62, 'ze', 'ze', '../img/jeu/sAzi2xE5BoCDwPZ6ne10.jpg', 'ze', '../img/jeu/Ye5rREB4MPYiaubOFvLy.jpg', 'ze', 'ze', 'ze', '', '');

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
(13, 52, 'game_name', 1, 1, 1, 1),
(14, 53, 'test', 1, 0, 0, 0),
(15, 54, 'aaaaa', 0, 1, 0, 0),
(16, 55, 'hollow knight', 1, 1, 1, 1),
(17, 56, 'dark souls 3', 1, 1, 1, 0),
(18, 57, 'Jeu', 1, 1, 1, 1),
(19, 58, 'aaa', 1, 0, 0, 0),
(20, 59, 'avion', 0, 0, 1, 0),
(21, 60, 'hollow knight', 1, 1, 1, 1),
(22, 61, 'dark souls 3', 1, 1, 1, 0),
(23, 62, 'ze', 1, 1, 1, 1);

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
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id_plateforme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
