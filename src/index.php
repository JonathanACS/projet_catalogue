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
            <img class="header-jeu" src="../img/header-jeu.jpeg" alt="">
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

    <div class="carousel">
        <button class="btn" id="prev"><img src="../img/fleche-gauche.png" alt="carousel-gauche" width="30px"
                height="30px"></button>
        <button class="btn" id="next"><img src="../img/fleche-droite.png" alt="carousel-droit" width="30px"
                height="30px"></button>
        <ul>
            <li class="slide">
                <img src="../img/jeu-idée/h-9.jpg" alt="img-1">
            </li>
            <li class="slide active">
                <img src="../img/jeu/58Oi9SIfYHx8wFtbBZxs.jpg" alt="img-2">
            </li>
            <li class="slide">
                <img src="../img/jeu/IhlfYzEzNM34M6pTIo5e.jpg" alt="img-3">
            </li>
        </ul>
    </div>

    <script src="script.js"></script>
    <script src="index.js"></script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>