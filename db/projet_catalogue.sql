-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 20 juin 2024 à 08:14
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
(60, 'hollow knight', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses\">\">\">', '../img/jeu/x9r60TNvyc4vrquh0qMg.png', 'hollow knight game', '../img/jeu/71UQZy7HEjL._AC_UF1000,1000_QL80_.jpg', 'hollow knight game', 'Hollow Knight est un jeu classique d\'action et d\'aventure en 2D, qui prend place dans un vaste monde souterrain interconnecté. Explorez un labyrinthe de cavernes, de villes ancestrales et de terres désolées dangereuses', 'https://www.youtube.com/embed/nSPJXlYjENE?si=GcfzVZnFWlYe0pIy', '../img/jeu/tumblr_pex178fsYq1x73yfbo8_1280.jpg', 'hollow knight game '),
(61, 'dark souls III', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes\">\">\">', '../img/jeu/tCq4ThJLiWkXhOCpp8O3.jpg', 'dark souls 3 game', '../img/jeu/616p1i6gfxL._AC_UF1000,1000_QL80_.jpg', 'dark souls 3 game', 'L\'Âge du Feu peut être prolongé en se liant au Feu, un rituel dans lequel les grands seigneurs et héros sacrifient leur âme afin de faire perdurer la Première Flamme. Cependant, le Prince Lothric, désigné comme devant se lier au Feu, a abandonné son devoir et choisi d\'observer de loin la mort des flammes', 'https://www.youtube.com/embed/_zDZYrIUgKE?si=uEoFenhmhCP9cEoo', '../img/jeu/2808.jpg', 'dark souls 3 game'),
(64, 'Valorant', 'Valorant est un FPS compétitif développé par Riot Games. Deux équipes de cinq joueurs s\'affrontent sur plusieurs rounds. L\'équipe en Attaque doit poser un Spike (une bombe) sur des sites spécifiques, tandis que l\'équipe en Défense doit l\'empêcher ou le désamorcer.\r\n\r\nChaque joueur choisit un Agent avec des capacités uniques. Les rôles des agents sont :\r\n\r\nDuelists : spécialisés dans l\'attaque et les éliminations.\r\nInitiators : perturbent les défenses ennemies pour créer des ouvertures.\r\nSentinels : protègent les sites et apportent du soutien.\r\nControllers : manipulent le champ de bataille avec des fumées et des murs.\r\nLes joueurs gagnent des crédits en fonction de leur performance (plantation ou désamorçage du Spike, éliminations, etc.) pour acheter des armes, des boucliers et des compétences. La gestion économique est cruciale pour maintenir un avantage sur l\'ennemi.\r\n\r\nLe jeu se déroule sur différentes cartes, chacune avec des configurations uniques et des sites de pose de Spike spécifiques. Les équipes doivent adapter leurs stratégies en fonction de la carte et des agents choisis.\r\n\r\nChaque manche dure 100 secondes, et une partie se joue en 25 manches maximum. Une équipe doit gagner 13 manches pour remporter la partie. Les parties sont intenses et nécessitent une coordination et une stratégie d\'équipe précises.\r\n', '../img/jeu/qDqrV0KSqtVHeTcYnWuc.png', 'valorant game', '../img/jeu/gIMkg7gFQFtHDzzHPdWg.jpg', 'valorant game', 'Valorant est un FPS (First Person Shooter) compétitif édité par Riot Games où deux équipes de cinq joueurs s\'affrontent pendant plusieurs rounds sur des cartes fermées. L\'équipe en Attaque doit poser un Spike (une bombe) sur un des sites d\'explosion donnés. L\'équipe en Défense doit, quant à elle, désamorcer le Spike.', 'https://www.youtube.com/embed/e_E9W2vsRbQ?si=BCU0GAYTkMJR834F', '../img/jeu/QiOpJSWVLA1Tw6OvTnwW.jpg', 'valorant game'),
(65, 'ruined king', 'Ruined King\" est un jeu vidéo développé par Airship Syndicate et édité par Riot Forge, sorti en 2021. C\'est un RPG tactique se déroulant dans l\'univers de League of Legends, célèbre jeu de MOBA. L\'histoire commence après la mort du roi Gangplank de Bilgewater, une île infâme et corrompue. Une malédiction mystérieuse émerge, transformant les morts en êtres hostiles connus sous le nom de revenants.\r\n\r\nLes joueurs incarnent plusieurs champions de League of Legends, dont Miss Fortune, Braum, Illaoi, Pyke, Ahri et Yasuo, chacun avec ses compétences uniques et son style de combat. Ils forment une équipe hétéroclite pour enquêter sur les origines de cette malédiction et restaurer la paix à Bilgewater. Le jeu combine exploration, combat au tour par tour et résolution d\'énigmes dans des environnements détaillés et richement illustrés.\r\n\r\nL\'exploration se déroule sur plusieurs îles, chacune regorgeant de secrets à découvrir et de défis à relever. Les combats tactiques se déroulent au tour par tour, où la stratégie et la coordination des compétences sont essentielles pour vaincre les ennemis variés, y compris des boss redoutables.\r\n\r\nGraphiquement, \"Ruined King\" se distingue par son style visuel dessiné à la main et ses cinématiques immersives qui enrichissent l\'histoire complexe du jeu. Avec une bande-son captivante et une narration immersive, le jeu plonge les joueurs dans un monde sombre et mystérieux, offrant une expérience unique qui ravira à la fois les fans de League of Legends et les nouveaux venus dans l\'univers de Runeterra.', '../img/jeu/bRIMInUuvcXRjoRgyffL.jpg', 'ruined king game', '../img/jeu/zoOQSo8g7Z7q0H39IQgC.png', 'ruined king game', 'Ruined King\" est un RPG tactique se déroulant dans l\'univers de League of Legends, où les joueurs dirigent des champions emblématiques pour enquêter sur une malédiction à Bilgewater. Le jeu combine exploration, combat au tour par tour et résolution d\'énigmes, avec des graphismes dessinés à la main et une narration immersive.', 'https://www.youtube.com/embed/PpRRLYJ5fIQ?si=uldk2VVhVFt6gG2m', '../img/jeu/myv0zSdFQf469KsRfGVY.jpg', 'ruined king game'),
(66, 'pokemon ecarlate et violet', 'Pokémon Écarlate et Violet représentent une nouvelle génération de jeux de rôle Pokémon exclusifs à la Nintendo Switch. Développés par Nintendo, ces titres combinent tradition et innovation en introduisant de nouveaux Pokémon, une région inédite et des mécaniques de jeu revues.\r\n\r\nLes jeux se déroulent dans la région de Carminia, un archipel tropical riche en diversité naturelle et culturelle. Les joueurs commencent leur aventure en choisissant parmi trois Pokémon de départ et explorent une carte détaillée comprenant des environnements variés tels que des jungles luxuriantes, des montagnes escarpées et des villes animées.\r\n\r\nUne des nouveautés notables est le système de capture amélioré, permettant aux joueurs d\'interagir plus activement avec les Pokémon sauvages pour augmenter leurs chances de capture. De plus, les combats ont été enrichis avec de nouvelles attaques et des stratégies avancées.\r\n\r\nL\'histoire principale tourne autour d\'un mystère ancien lié aux légendes locales, mettant en lumière des personnages charismatiques et des énigmes à résoudre tout au long du périple du joueur. Les graphismes sont magnifiés par la puissance de la Nintendo Switch, offrant des animations fluides et des détails visuels saisissants.\r\n\r\nEn résumé, Pokémon Écarlate et Violet visent à séduire à la fois les nouveaux joueurs et les fans de longue date en offrant une expérience riche et immersive tout en conservant l\'essence qui a fait le succès de la franchise Pokémon depuis ses débuts', '../img/jeu/NLprDWLJkNFhHNpQ9rg3.jpg', 'pokemon ecarlate et violet game', '../img/jeu/Ct29Yz62EmE81dgVqmbz.png', 'pokemon ecarlate et violet game', 'Pokémon Écarlate et Violet sont des jeux de rôle développés par Nintendo pour la Nintendo Switch. Ils introduisent de nouveaux Pokémon, des régions inédites et des mécaniques de jeu innovantes, tout en restant fidèles à l\'esprit classique de la franchise', 'https://www.youtube.com/embed/ETAzCS94lrs?si=vlCy31DcyweRnaWx', '../img/jeu/IISZxEZm0ecZ2BoF334L.jpg', 'pokemon ecarlate et violet game'),
(67, 'the last of us part I', 'The Last of Us est un jeu d\'action-aventure acclamé, développé par Naughty Dog exclusivement pour la PlayStation. Situé dans un monde post-apocalyptique ravagé par une pandémie, le jeu suit l\'odyssée de Joel, un trafiquant de marchandises, et Ellie, une adolescente avec un potentiel vital pour l\'humanité.\r\n\r\nL\'histoire commence vingt ans après l\'effondrement de la société moderne. Joel est chargé d\'escorter Ellie à travers les États-Unis, une tâche périlleuse qui les confronte à des hordes de mutants cannibales et à des groupes humains hostiles. Le jeu explore non seulement leur lutte pour la survie mais aussi la construction de leur relation complexe et émotive au fil du voyage.\r\n\r\nLe gameplay combine l\'exploration immersive avec des mécaniques de survie intenses, nécessitant la gestion prudente des ressources limitées. Les combats exigent une approche tactique, souvent favorisant la discrétion et l\'évitement plutôt que l\'affrontement direct.\r\n\r\nGraphiquement impressionnant, The Last of Us est salué pour ses paysages post-apocalyptiques saisissants, ses personnages profondément développés et ses dialogues poignants. La narration captivante et les choix moraux confrontants ajoutent une profondeur émotionnelle et philosophique à l\'expérience globale.\r\n\r\nEn résumé, The Last of Us se distingue comme un chef-d\'œuvre du jeu vidéo, combinant une histoire captivante avec un gameplay innovant et une présentation visuelle impressionnante, offrant aux joueurs une expérience inoubliable dans un monde déchiré par la désolation et l\'humanité en déclin', '../img/jeu/EeKxhVQMt9OzbGxNLsN5.jpg', 'the last of us game', '../img/jeu/r9uEw3lZpfOQkgE5VCcV.jpg', 'the last of us game', 'The Last of Us est un jeu d\'action-aventure développé par Naughty Dog pour PlayStation. Il narre l\'histoire poignante de Joel et Ellie, traversant un monde post-apocalyptique infesté de mutants. Le gameplay allie exploration, survie et combat stratégique', 'https://www.youtube.com/embed/_6v_D3QocIs?si=ovQFiZhICBb91Vd3', '../img/jeu/oqzJyBUJoxGGhxcjxcRV.jpg', 'the last of us game'),
(68, 'elden ring', 'Elden Ring est un jeu d\'action-RPG développé par FromSoftware en collaboration avec George R.R. Martin. Plongé dans un monde fantastique ouvert, les joueurs explorent des terres mythiques, affrontent des ennemis redoutables et découvrent une histoire riche en secrets et en mystères.\">\r\n\r\nL\'histoire se déroule dans le royaume de la Terre Brisée, autrefois dominé par l\'Elden Ring, une force mystique qui maintenait l\'équilibre entre les différentes factions et divinités. Après que l\'Elden Ring a été brisé, le monde a plongé dans le chaos, engendrant des créatures monstrueuses et des conflits sans fin.\r\n\r\nLes joueurs incarnent un personnage personnalisable qui explore librement ce vaste monde, découvrant des donjons, des cités abandonnées et des paysages majestueux, tout en affrontant des ennemis redoutables et en apprenant à maîtriser des compétences et des magies puissantes.\r\n\r\nLe gameplay d\'Elden Ring combine des mécaniques de combat tactiques avec un système de progression basé sur l\'exploration et la découverte. Les choix du joueur influencent non seulement l\'histoire mais aussi le destin des divers personnages rencontrés.\r\n\r\nAvec des visuels impressionnants et une atmosphère dense, Elden Ring promet une expérience immersive et profonde, captivant les joueurs avec une narration complexe et des défis exigeants caractéristiques des œuvres de FromSoftware.\r\n\r\nEn résumé, Elden Ring s\'annonce comme un nouvel opus ambitieux qui mêle la vision de George R.R. Martin à l\'expertise de FromSoftware, promettant une aventure épique et inoubliable dans un univers de fantasy sombre et captivant', '../img/jeu/e3IeFvV7W2mZpO7SbW02.jpg', 'elden ring game', '../img/jeu/xicHVbhkmwPaC1iShiUD.jpg', 'elden ring game', 'Elden Ring est un jeu très attendu d\'action-RPG développé par FromSoftware, connu pour la série Dark Souls, en collaboration avec l\'auteur George R.R. Martin. Situé dans un monde ouvert fantastique et sombre, Elden Ring propose aux joueurs une exploration immersive des terres déchirées par la guerre et le chaos.', 'https://www.youtube.com/embed/M2EZDQ6_jfA?si=9IE4zz-ZfWmoNIxu', '../img/jeu/IzAhzT958p270rQzsdZG.png', 'elden ring game'),
(69, '8', '8', '../img/jeu/DOvixdDtolghZpTNBy4P.jpg', '8', '../img/jeu/JiaIHHtUhzjYk6et2ASM.jpg', '8', '8', '8', '../img/jeu/tuH4YUEYQJaQxl9sh50e.jpg', '8'),
(70, '9', '9', '../img/jeu/MgcU7D0WJ28c4rvMWIvl.jpg', '9', '../img/jeu/jr5rlyOKVuZrACaJiZMW.jpg', '9', '9', '9', '../img/jeu/ZVdnk6li31VPUvZyt5Uy.jpg', '9'),
(71, '10', '10', '../img/jeu/pHA0FzCsmvCE2Dnwz5nZ.jpg', '10', '../img/jeu/lOvx2EDxdvDgPAjcvgDT.jpg', '10', '10', '10', '../img/jeu/2fyHk8H5dsSjDEspBWDf.jpg', '10'),
(72, '11', '11', '../img/jeu/5C8npia0jysnju19wWEY.jpg', '11', '../img/jeu/afMnZl4PxrxTyg8HhR4S.jpg', '11', '11', '11', '../img/jeu/ONZwEzpm6go8YysPPeTl.jpg', '11'),
(73, '12', '12', '../img/jeu/Wrrcya0JMP7uW7ObqAur.jpg', '12', '../img/jeu/9weMW9xeiPlNoyJ0i3UY.jpg', '12', '12', '12', '../img/jeu/gF2oZCnwZ91xv59dEvld.jpg', '12');

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
(21, 60, 'hollow knight', 1, 1, 0, 1),
(22, 61, 'dark souls 3', 1, 1, 1, 1),
(25, 64, 'Valorant', 1, 0, 0, 0),
(26, 65, 'ruined king', 1, 1, 1, 1),
(27, 66, 'pokemon ecarlate et violet', 0, 0, 0, 1),
(28, 67, 'the last of us part I', 1, 1, 0, 0),
(29, 68, 'elden ring', 1, 1, 1, 0),
(30, 69, '8', 1, 0, 0, 0),
(31, 70, '9', 1, 0, 0, 0),
(32, 71, '10', 1, 0, 0, 0),
(33, 72, '11', 1, 0, 0, 0),
(34, 73, '12', 1, 0, 0, 0);

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
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id_plateforme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
