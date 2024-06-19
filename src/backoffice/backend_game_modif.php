<?php

session_start();

//verification admin 
if (!isset($_SESSION['user']) || $_SESSION['user']['roles'] !== 'ROLE_ADMIN') {
    header('Location: ../index.php');
    exit();
}

require_once("../include/connect.php");

// Vérifier si l'identifiant du jeu est défini dans l'URL
if (isset($_GET["id"])) {
    $id_game = $_GET["id"];

    // Récupérer les données du jeu
    $sql = "SELECT * FROM jeux WHERE id_game = :id_game";
    $query = $db->prepare($sql);
    $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);

    // Récupérer les données de la plateforme
    $sql = "SELECT * FROM plateforme WHERE id_game = :id_game";
    $query = $db->prepare($sql);
    $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query->execute();
    $plateforme = $query->fetch(PDO::FETCH_ASSOC);

    if (!$game || !$plateforme) {
        $_SESSION["erreur"] = "Jeu introuvable";
        header("Location: ../backoffice/backend_game_list.php");
        exit;
    }
} else {
    $_SESSION["erreur"] = "Jeu introuvable";
    header("Location: ../backoffice/backend_game_list.php");
    exit;
}

if ($_POST) {
    // Validation du formulaire
    if (
        isset($_POST["id_game"], $_POST["title_game"], $_POST["text_game"], $_POST["picture_right_alt"],
        $_POST["picture_left_alt"], $_POST["picture_header_alt"], $_POST["desc_game"], $_POST["trailler"], $_POST["id_plateforme"])
    ) {
        // Nettoyage des données du formulaire
        $id_game = strip_tags($_POST["id_game"]);
        $title_game = strip_tags($_POST["title_game"]);
        $text_game = strip_tags($_POST["text_game"]);
        $picture_right_alt = strip_tags($_POST["picture_right_alt"]);
        $picture_left_alt = strip_tags($_POST["picture_left_alt"]);
        $picture_header_alt = strip_tags($_POST["picture_header_alt"]);
        $desc_game = strip_tags($_POST["desc_game"]);
        $trailler = strip_tags($_POST["trailler"]);
        $id_plateforme = strip_tags($_POST["id_plateforme"]);
        $pc = isset($_POST["pc"]) ? 1 : 0;
        $playstation = isset($_POST["playstation"]) ? 1 : 0;
        $xbox = isset($_POST["xbox"]) ? 1 : 0;
        $switch = isset($_POST["switch"]) ? 1 : 0;

        // Gestion des fichiers uploadés
        if (isset($_FILES['picture_right']) && $_FILES['picture_right']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['picture_right']['type'], $allowed_types)) {
                // Supprimer l'ancienne image
                if (file_exists($game['picture_right'])) {
                    unlink($game['picture_right']);
                }
                // Déplacer la nouvelle image
                $picture_right = '../img/jeu/' . basename($_FILES['picture_right']['name']);
                move_uploaded_file($_FILES['picture_right']['tmp_name'], $picture_right);
            }
        } else {
            $picture_right = $game['picture_right'];
        }

        if (isset($_FILES['picture_left']) && $_FILES['picture_left']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['picture_left']['type'], $allowed_types)) {
                // Supprimer l'ancienne image
                if (file_exists($game['picture_left'])) {
                    unlink($game['picture_left']);
                }
                // Déplacer la nouvelle image
                $picture_left = '../img/jeu/' . basename($_FILES['picture_left']['name']);
                move_uploaded_file($_FILES['picture_left']['tmp_name'], $picture_left);
            }
        } else {
            $picture_left = $game['picture_left'];
        }

        if (isset($_FILES['picture_header']) && $_FILES['picture_header']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['picture_header']['type'], $allowed_types)) {
                // Supprimer l'ancienne image
                if (file_exists($game['picture_header'])) {
                    unlink($game['picture_header']);
                }
                // Déplacer la nouvelle image
                $picture_header = '../img/jeu/' . basename($_FILES['picture_header']['name']);
                move_uploaded_file($_FILES['picture_header']['tmp_name'], $picture_header);
            }
        } else {
            $picture_header = $game['picture_header'];
        }

        // Requête SQL pour mettre à jour les informations dans la base de données
        $sql = "UPDATE jeux SET title_game=:title_game, text_game=:text_game, picture_right=:picture_right, picture_right_alt=:picture_right_alt, picture_left=:picture_left, picture_left_alt=:picture_left_alt, desc_game=:desc_game, trailler=:trailler, picture_header=:picture_header, picture_header_alt=:picture_header_alt WHERE id_game=:id_game";
        $query = $db->prepare($sql);
        $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        $query->bindValue(':title_game', $title_game, PDO::PARAM_STR);
        $query->bindValue(':text_game', $text_game, PDO::PARAM_STR);
        $query->bindValue(':picture_right', $picture_right, PDO::PARAM_STR);
        $query->bindValue(':picture_right_alt', $picture_right_alt, PDO::PARAM_STR);
        $query->bindValue(':picture_left', $picture_left, PDO::PARAM_STR);
        $query->bindValue(':picture_left_alt', $picture_left_alt, PDO::PARAM_STR);
        $query->bindValue(':desc_game', $desc_game, PDO::PARAM_STR);
        $query->bindValue(':trailler', $trailler, PDO::PARAM_STR);
        $query->bindValue(':picture_header', $picture_header, PDO::PARAM_STR);
        $query->bindValue(':picture_header_alt', $picture_header_alt, PDO::PARAM_STR);
        $query->execute();

        // Requête SQL pour mettre à jour la plateforme
        $sql = "UPDATE plateforme SET id_plateforme=:id_plateforme, pc=:pc, playstation=:playstation, xbox=:xbox, switch=:switch WHERE id_game=:id_game";
        $query = $db->prepare($sql);
        $query->bindValue(':id_plateforme', $id_plateforme, PDO::PARAM_INT);
        $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        $query->bindValue(':pc', $pc, PDO::PARAM_INT);
        $query->bindValue(':playstation', $playstation, PDO::PARAM_INT);
        $query->bindValue(':xbox', $xbox, PDO::PARAM_INT);
        $query->bindValue(':switch', $switch, PDO::PARAM_INT);
        $query->execute();

        $_SESSION["message"] = "Informations du jeu modifiées";
        require_once("../include/disconnect.php");
        header("Location: ../backoffice/backend_game_list.php");
        exit();
    } else {
        $_SESSION["erreur"] = "Le formulaire est incomplet";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice - Modifier un jeu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/nav-footer.css" rel="stylesheet">
    <link href="../css/backend.css" rel="stylesheet">

</head>

<body>
    <header>
        <?php include_once("../include/navbar.php") ?>
    </header>
    <section class="p-3 mb-2 bg-gradient-secondary text-black">
        <div class="text-center">
            <h1>Modifier un jeu</h1>
            <a class="btn btn-secondary p-2" href="#" onclick="history.go(-1)">Retour</a>
        </div>
        <div class="container d-flex flex-wrap justify-content-center container-modif">
            <div class="mw-25 w-50 p-2" style="width: 18rem;">
                <h5 class="card-title text-center p-3"><?= $game["title_game"] ?></h5>
                <figure>
                    <img src="<?= $game["picture_header"]?>" alt="<?= $game["picture_header_alt"]?>">
                </figure>
                <div class="d-flex justify-content-center">
                    <img class="card picture-game-list-size" src="<?= $game["picture_left"] ?>"
                        alt="<?= $game["picture_left_alt"]?>">
                    <img class="card picture-game-list-size" src="<?= $game["picture_right"] ?>"
                        alt="<?= $game["picture_right_alt"]?>">
                </div>
                <div class="card-body">
                    <p class="card-text p-3"><?= $game["text_game"] ?></p>
                </div>
                <div class="card-body ms-3">
                    <iframe width="600" height="315" src="<?= $game["trailler"]?>" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <form class="text-center w-50 mw-25" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="title_game">Titre du jeu</label>
                        <input class="form-control text-center" type="text" id="title_game" name="title_game"
                            value="<?=$game['title_game']?>">
                        <label class="form-label fw-bolder" for="trailler">Lien du
                            trailler</label>
                        <input class="form-control  text-center" type="text" id="trailler" name="trailler"
                            value="<?=$game['trailler']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="picture_right">Lien image
                            droit</label>
                        <input class="form-control text-center" type="file" id="picture_right" name="picture_right"
                            value="<?=$game['picture_right']?>">
                        <label class="form-label fw-bolder" for="picture_right_alt">ALT image
                            droit</label>
                        <input class="form-control text-center" type="text" id="picture_right_alt"
                            name="picture_right_alt" value="<?=$game['picture_right_alt']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="picture_left">Lien image
                            gauche</label>
                        <input class="form-control text-center" type="file" id="picture_left" name="picture_left"
                            value="<?=$game['picture_left']?>">
                        <label class="form-label fw-bolder" for="picture_left_alt">ALT image
                            gauche</label>
                        <input class="form-control text-center" type="text" id="picture_left_alt"
                            name="picture_left_alt" value="<?=$game['picture_left_alt']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="picture_header">Lien image
                            header</label>
                        <input class="form-control text-center" type="file" id="picture_header" name="picture_header"
                            value="<?=$game['picture_header']?>">
                        <label class="form-label fw-bolder" for="picture_header_alt">ALT image
                            header</label>
                        <input class="form-control text-center" type="text" id="picture_header_alt"
                            name="picture_header_alt" value="<?=$game['picture_header_alt']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="text_game">Texte du jeu</label>
                        <textarea class="form-control" id="text_game"
                            name="text_game"><?=$game['text_game']?>"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label fw-bolder" for="desc_game">Description du
                            jeu</label>
                        <textarea class="form-control" id="desc_game"
                            name="desc_game"><?=$game['desc_game']?></textarea>
                    </div>
                </div>

                <div class="col">
                    <label class="form-label text-uppercase fw-bolder" for="pc">PC</label>
                    <input class="form-check-input" type="checkbox" id="pc" name="pc"
                        <?=$plateforme['pc'] ? 'checked' : ''?>><br>
                    <label class="form-label text-uppercase fw-bolder" for="playstation">PlayStation</label>
                    <input class="form-check-input" type="checkbox" id="playstation" name="playstation"
                        <?=$plateforme['playstation'] ? 'checked' : ''?>><br>
                    <label class="form-label text-uppercase fw-bolder" for="xbox">Xbox</label>
                    <input class="form-check-input" type="checkbox" id="xbox" name="xbox"
                        <?=$plateforme['xbox'] ? 'checked' : ''?>><br>
                    <label class="form-label text-uppercase fw-bolder" for="switch">Switch</label>
                    <input class="form-check-input" type="checkbox" id="switch" name="switch"
                        <?=$plateforme['switch'] ? 'checked' : ''?>>
                    <input type="hidden" name="id_game" value="<?=$plateforme["id_game"]?>">
                    <input type="hidden" name="id_plateforme" value="<?=$plateforme["id_plateforme"]?>">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary p-2">Modifier</button>
                </div>
            </form>
        </div>
    </section>
    <script src="script.js"></script>

    <?php include_once("../include/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>