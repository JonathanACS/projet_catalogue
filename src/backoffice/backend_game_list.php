<?php
//lancement de la session
session_start();

//connexion a la bdd
require_once("../include/connect.php");

$sql = "SELECT * FROM `jeux` ORDER BY `id_game` DESC";

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
</head>

<body>
    <?php include_once("../include/navbar.php")?>
    <h1>GAME LISTE</h1>
    <button><a href="backend_game_add.php">Ajouter un jeux</a></button>
    <button><a href="backend_game_modif.php">Modifier un jeux</a></button>
    <?php
        // Afficher le message de succès s'il y en a un
        if (!empty($_SESSION["message"])) {
            echo "<h2>" . ($_SESSION["message"]) . "</h2>";

            // Réinitialiser le message après l'avoir affiché
            $_SESSION["message"] = ""; 
        }
    ?>
    <tbody>
        <?php 
            // pour chaque information récupéré dans $result, on affiche une nouvelle ligne dans la table HTML
                foreach($result as $game){
            //chaque information récupéré sera identifier en tant que $stage dans le foreach
            ?>
        <div class="grid-cols-3">

            <p><?= $game["title_game"] ?></p>
            <img src="<?= $game["picture_right"] ?>" alt="<?= $game["title_game"] ?>">
        </div>
        <?php
            }
            ?>
    </tbody>
</body>

</html>