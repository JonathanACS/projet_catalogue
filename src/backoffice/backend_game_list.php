<?php
//lancement de la session
session_start();

//connexion a la bdd
require_once("../include/connect.php");

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
    <title>Backoffice liste de jeux</title>
    <link href="../css/stylee.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="color--bs-secondary-color">

    <?php include_once("../include/navbar.php")?>

    <h1 class="text-center">GAME LISTE</h1>

    <div class="text-center">
        <a class="btn btn-secondary p-2" href="backend_game_add.php">Ajouter un jeux</a>
        <a class="btn btn-secondary p-2" href="../index.php">Accueil</a>
    </div>

    <?php

        // Afficher le message de succès s'il y en a un
        if (!empty($_SESSION["message"])) {
            echo "<h2>" . ($_SESSION["message"]) . "</h2>";

            // Réinitialiser le message après l'avoir affiché
            $_SESSION["message"] = ""; 
        }

        // Afficher le message de succès s'il y en a un
        if (!empty($_SESSION["erreur"])) {
            echo "<h2>" . ($_SESSION["erreur"]) . "</h2>";

            // Réinitialiser le message après l'avoir affiché
            $_SESSION["erreur"] = ""; 
        }
    ?>
    <div class="container text-center">

        <div class="row">

            <?php foreach($result as $game): ?>
            <div class="col-md-auto ">
                <p><?= $game["title_game"] ?></p>
                <img class="picture-game-list-size" src="<?= $game["picture_right"] ?>"
                    alt="<?= $game["picture_right_alt"] ?>">
                <a href="backend_game_modif.php?id=<?=$game["id_game"]?>">Modifier</a>
            </div>

            <?php endforeach; ?>
        </div>

    </div>
    <?php include_once("../include/footer.php")?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>