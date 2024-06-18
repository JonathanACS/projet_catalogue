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

<body>
    <header class="header-index">
        <?php include_once("./include/navbar.php"); ?>
        <figure>
            <img class="header-jeu" src="../img/header-jeu.jpeg" alt="">
        </figure>
    </header>
    <main>
        <div class="jeu-container">
            <?php foreach($result as $game): ?>
            <article class="card">
                <img class="card-img" src="<?= $game["picture_right"] ?>" alt="<?= $game["picture_right_alt"] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $game["title_game"] ?></h3>
                    <p class="card-sub"><?= $game["text_game"]?></p>
                    <a class="card-btn" href="jeu.php?id=<?=$game["id_game"]?>">Voir</a>
                </div>

            </article>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include_once("./include/footer.php"); ?>
    <script src="script.js"></script>
</body>

</html>