<?php

//lancement de la session
session_start();

//connexion a la bdd
require_once("include/connect.php");

$sql = "SELECT * FROM `jeux` ORDER BY `jeux`.`id_game` DESC ";

$query = $db->prepare($sql);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="/css/index.css" rel="stylesheet">
    <link href="/css/nav-footer.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet">
</head>

<body class="body-index">
    <header class="header-index">
        <?php include_once("./include/navbar.php"); ?>
        <figure>
            <img class="header-jeu" src="../img/header.jpg" alt="">
        </figure>
    </header>
    <main>
        <h1>Voici notre selection!</h1>
        <div class="jeu-container">
            <?php 
                $count = 0;
                foreach ($result as $game):
                if ($count >= 12) break;
                ?>
            <article class="card">
                <img class="card-img" src="<?= $game["picture_right"] ?>" alt="<?= $game["picture_right_alt"] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $game["title_game"] ?></h3>
                    <p class="card-sub"><?= $game["desc_game"] ?></p>
                    <a class="card-btn" href="jeu.php?id=<?= $game["id_game"] ?>">Voir</a>
                </div>
            </article>
            <?php 
            $count++;
            endforeach; 
            ?>
        </div>
    </main>

    <div class="container">
        <div class="slider-wrapper">
            <img id="prev-slide" src="../img/carousel-gauche.png" alt="slide-button materiel-symbols-rounded">
            <div class="image-list">

                <?php 
                $count = 0;
                foreach ($result as $game):
                if ($count >= 12) break;
                ?>

                <img class="img-carousel" src="<?= $game["picture_left"] ?>" alt="<?= $game["picture_right_alt"] ?>">

                <a class="carousel-lien" href="jeu.php?id=<?=$game["id_game"]?>">Voir</a>

                <?php 
            $count++;
            endforeach; 
            ?>


            </div>
            <img id="next-slide" src="../img/carousel-droit.png" alt="slide-button materiel-symbols-rounded">
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>