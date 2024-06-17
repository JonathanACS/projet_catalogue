<?php

//lancement de la session
session_start();

//verification admin 
if (!isset($_SESSION['user']) || $_SESSION['user']['roles'] !== 'ROLE_ADMIN') {

    header('Location: ../index.php');
    exit();
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include_once("../include/navbar.php")?>

    <section class="p-2 text-black">
        <h1 class="text-center">Liste des jeux</h1>
        <div class="text-center">
            <a class="btn btn-secondary p-2" href="backend_game_add.php">Ajouter un jeux</a>
            <a class="btn btn-secondary p-2" href="#" onclick="history.go(-1)">Retour</a>
        </div>

        <?php
            if (!empty($_SESSION["message"])) {
                echo "<h2 class='text-success'>" . ($_SESSION["message"]) . "</h2>";
                $_SESSION["message"] = ""; 
            }
            if (!empty($_SESSION["erreur"])) {
                echo "<h2 class='text-danger'>" . ($_SESSION["erreur"]) . "</h2>";
                $_SESSION["erreur"] = ""; 
            }
            if (!empty($_SESSION["succes"])) {
                echo "<h2 class='text-danger'>" . ($_SESSION["succes"]) . "</h2>";
                $_SESSION["succes"] = ""; 
            }
        ?>

        <!-- Idea blur effect on hover (or focus) when we put the mouse on a game then show "modif" and "delete"-->
        <div class="row">

            <?php foreach($result as $game): ?>

            <div class="col-md-auto mx-auto">
                <p class="text-center"><?= $game["title_game"] ?></p>
                <img class="picture-game-list-size" src="<?= $game["picture_right"] ?>"
                    alt="<?= $game["picture_right_alt"] ?>">
                <div class="text-center">
                    <a class="btn btn-secondary p-2" href="backend_game_modif.php?id=<?=$game["id_game"]?>">Modifier le
                        jeu <?= $game["title_game"] ?></a>
                    <a class="btn btn-secondary p-2"
                        href="backend_game_delete.php?id=<?=$game["id_game"]?>">Supprimer</a>

                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <?php include_once("../include/footer.php")?>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>