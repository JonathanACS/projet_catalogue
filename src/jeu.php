<?php 
session_start();

require_once("include/connect.php");

// Vérifier si l'identifiant du jeu est défini dans l'URL
if (isset($_GET["id"])) {
    $id_game = $_GET["id"];

    // Récupérer les données du jeu
    $sql = "SELECT * FROM jeux WHERE id_game = :id_game";
    $query = $db->prepare($sql);
    $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);

        //verification id jeu
        if(!$game){
            $_SESSION["erreur"] = "Vous êtes allé trop loin, aucun jeu ne correspond!";
            header("Location: index.php");
            exit();
        }
    }else{
        $_SESSION["erreur"] = "La page demandée n'existe pas, veuillez réessayer plus tard";
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/jeu.css" rel="stylesheet">
    <link href="./css/nav-footer.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
    <title>Jeu</title>
</head>

<body>

    <header class="header-jeu">
        <?php include_once("./include/navbar.php");?>
        <figure>
            <img src="../img/header-jeu.jpeg" alt="">
        </figure>

    </header>


    <h1 class="titre-jeu"><?= $game["title_game"]?></h1>

    <div class="container-jeu">

        <div class="img-text">

            <div class="text">
                <p>Texte explicatif sur le jeu</p>
            </div>

            <div class="img-1">
                <figure>
                    <img src="../img/exemple.png" alt="">
                </figure>
            </div>

        </div>

        <div class="img-plateforme">

            <div class="img-2">
                <figure>
                    <img src="../img/exemple.png" alt="Image-2">
                </figure>
            </div>

            <div class="plateforme">
                <p>Disponible sur: <br><br> PC <br><br>
                    PS4/PS5 <br><br>
                    SWITCH <br><br>
                    XBOX
                </p>

            </div>
        </div>

        <div class="description">

            <p>Déscription du Jeu</p>

        </div>

        <iframe width="600" height="315" src="<?= $game["trailler"]?>" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <script src="script.js"></script>

        <?php
    include_once("./include/footer.php");
?>
        <script src="script.js"></script>

</body>

</html>