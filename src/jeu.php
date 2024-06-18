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
            <img class="header-jeu" src="../img/header-jeu.jpeg" alt="">
        </figure>
    </header>

    <main>
        <h1 class="titre-jeu"><?= $game["title_game"]?></h1>
        <div class="container-jeu">
            <div class="img-text">
                <div class="text">
                    <p><?= $game["text_game"]?></p>
                </div>
                <div class="img-1">
                    <figure>
                        <img class="img-size" src="<?= $game["picture_right"]?>" alt="<?= $game["picture_right_alt"]?>">
                    </figure>
                </div>
            </div>
            <div class="img-plateforme">
                <div class="img-2">
                    <figure>
                        <img class="img-size" src="<?= $game["picture_left"]?>" alt="<?= $game["picture_left_alt"]?>">
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
        </div>
    </main>
    <section>
        <h2>Regarder le trailler de <?= $game["title_game"]?></h2>
        <iframe width="50%" height="500px" src="<?= $game["trailler"]?>" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="description">
            <p><?= $game["desc_game"]?></p>
        </div>
    </section>

    <?php include_once("./include/footer.php");?>
    <script src="script.js"></script>
</body>

</html>