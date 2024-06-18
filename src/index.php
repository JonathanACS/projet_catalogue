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
    <link href="./css/index.css" rel="stylesheet">
    <link href="./css/nav-footer.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
</head>

<body>

    <header class="header-index">

        <?php
    include_once("./include/navbar.php");
        ?>
        <figure>
            <img src="../img/header-jeu.jpeg" alt="">
        </figure>

    </header>

    <?php foreach($result as $game): ?>

    <div class="col-md-auto mx-auto">
        <p class="text-center"><?= $game["title_game"] ?></p>
        <img class="picture-game-list-size mx-auto" src="<?= $game["picture_right"] ?>"
            alt="<?= $game["picture_right_alt"] ?>">
    </div>

    <?php endforeach; ?>

    <script src="script.js"></script>

    <?php
        include_once("./include/footer.php");
    ?>

</body>

</html>