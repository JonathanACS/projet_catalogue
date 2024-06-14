<?php
// Lancement de la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once("../include/connect.php");

// Vérifier si l'identifiant du jeu est défini dans l'URL
if (isset($_GET["id"])) {
    
    // Récupérer l'identifiant du jeu depuis l'URL
    $id_game = $_GET["id"];

    // Préparer la requête SQL pour récupérer les données du jeu
    $sql = "SELECT * FROM jeux WHERE id_game = :id_game";

    // Préparer la requête
    $query = $db->prepare($sql);

    // Binder les valeurs
    $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);

    // Exécuter la requête
    $query->execute();

    // Récupérer les données du jeu
    $game = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le jeu existe
    if (!$game) {

        // Message à afficher
        $_SESSION["erreur"] = "Jeu introuvable";

        // Redirection vers la page de jeu.php
        header("Location: ../backoffice/backend_game_list.php");
        exit;

    }
} else {
        // Message à afficher
        $_SESSION["erreur"] = "Jeu introuvable";

        // Redirection vers la page de jeu.php
        header("Location: ../backoffice/backend_game_list.php");
        exit;
}

// Vérification si le formulaire est rempli
if ($_POST) {
    // Vérifier chaque champ du formulaire
    if (isset($_POST["id_game"]) && !empty($_POST["id_game"])
        && isset($_POST["title_game"]) && !empty($_POST["title_game"])
        && isset($_POST["text_game"]) && !empty($_POST["text_game"])
        && isset($_POST["picture_right_alt"]) && !empty($_POST["picture_right_alt"])
        && isset($_POST["picture_left_alt"]) && !empty($_POST["picture_left_alt"])
        && isset($_POST["desc_game"]) && !empty($_POST["desc_game"])
        && isset($_POST["trailler"]) && !empty($_POST["trailler"])) {

        // On nettoie les données avant de les envoyer
        $id_game = strip_tags($_POST["id_game"]);
        $title_game = strip_tags($_POST["title_game"]);
        $text_game = strip_tags($_POST["text_game"]);
        $picture_right_alt = strip_tags($_POST["picture_right_alt"]);
        $picture_left_alt = strip_tags($_POST["picture_left_alt"]);
        $desc_game = strip_tags($_POST["desc_game"]);
        $trailler = strip_tags($_POST["trailler"]);
        $pc = isset($_POST["pc"]) ? 1 : 0;
        $playstation = isset($_POST["playstation"]) ? 1 : 0;
        $xbox = isset($_POST["xbox"]) ? 1 : 0;
        $switch = isset($_POST["switch"]) ? 1 : 0;

        // Gestion des fichiers uploadés
        $picture_right = $game['picture_right']; // Valeur par défaut si aucun fichier n'est uploadé
        if (isset($_FILES['picture_right']) && $_FILES['picture_right']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['picture_right']['type'], $allowed_types)) {
                $picture_right = '../img/jeu/' . basename($_FILES['picture_right']['name']);
                move_uploaded_file($_FILES['picture_right']['tmp_name'], $picture_right);
            }
        }

        $picture_left = $game['picture_left']; // Valeur par défaut si aucun fichier n'est uploadé
        if (isset($_FILES['picture_left']) && $_FILES['picture_left']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['picture_left']['type'], $allowed_types)) {
                $picture_left = '../img/jeu/' . basename($_FILES['picture_left']['name']);
                move_uploaded_file($_FILES['picture_left']['tmp_name'], $picture_left);
                unlink($oldFileName['image_filename']);
            }
        }

        // Préparation de la requête pour mettre à jour les informations dans la base de données
        $sql = "UPDATE `jeux` SET `id_game`=:id_game, `title_game`=:title_game, `text_game`=:text_game, `picture_right`=:picture_right, `picture_right_alt`=:picture_right_alt, `picture_left`=:picture_left, `picture_left_alt`=:picture_left_alt, `desc_game`=:desc_game, `trailler`=:trailler, `pc`=:pc, `playstation`=:playstation, `xbox`=:xbox, `switch`=:switch WHERE `id_game`=:id_game;";

        // Préparation de la requête
        $query = $db->prepare($sql);

        // Attribution des valeurs
        $query->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        $query->bindValue(':title_game', $title_game, PDO::PARAM_STR);
        $query->bindValue(':text_game', $text_game, PDO::PARAM_STR);
        $query->bindValue(':picture_right', $picture_right, PDO::PARAM_STR);
        $query->bindValue(':picture_right_alt', $picture_right_alt, PDO::PARAM_STR);
        $query->bindValue(':picture_left', $picture_left, PDO::PARAM_STR);
        $query->bindValue(':picture_left_alt', $picture_left_alt, PDO::PARAM_STR);
        $query->bindValue(':desc_game', $desc_game, PDO::PARAM_STR);
        $query->bindValue(':trailler', $trailler, PDO::PARAM_STR);
        $query->bindValue(':pc', $pc, PDO::PARAM_INT);
        $query->bindValue(':playstation', $playstation, PDO::PARAM_INT);
        $query->bindValue(':xbox', $xbox, PDO::PARAM_INT);
        $query->bindValue(':switch', $switch, PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        // Message à afficher
        $_SESSION["message"] = "Information du jeu modifiée";

        // Déconnexion de la base de données (information de la déconnexion dans "disconnect.php")
        require_once("../include/disconnect.php");

        // Redirection vers la liste de jeux
        header("Location: ../backoffice/backend_game_list.php");

        // Assurez-vous qu'aucun autre code ne soit exécuté après la redirection
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
    <link href="../css/stylee.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include_once("../include/navbar.php")?>
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
    <section class="p-3 mb-2 bg-gradient-secondary text-black">
        <div class="text-center">
            <h1>Modifier un jeu</h1>
            <a class="btn btn-secondary p-2" href="#" onclick="history.go(-1)">Retour</a>
        </div>

        <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="title_game">Titre du jeu</label>
                        <input class="form-control" type="text" id="title_game" name="title_game"
                            value="<?=$game['title_game']?>">
                        <label class="form-label" for="trailler">Lien du trailler</label>
                        <input class="form-control" type="text" id="trailler" name="trailler"
                            value="<?=$game['trailler']?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <label class="form-label" for="picture_right">Lien image droit</label>
                        <input class="form-control" type="file" id="picture_right" name="picture_right"
                            value="<?=$game['picture_right']?>">
                        <label class="form-label" for="picture_right_alt">ALT image droit</label>
                        <input class="form-control" type="text" id="picture_right_alt" name="picture_right_alt"
                            value="<?=$game['picture_right_alt']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="picture_left">Lien image gauche</label>
                        <input class="form-control" type="file" id="picture_left" name="picture_left"
                            value="<?=$game['picture_left']?>">
                        <label class="form-label" for="picture_left_alt">ALT image gauche</label>
                        <input class="form-control" type="text" id="picture_left_alt" name="picture_left_alt"
                            value="<?=$game['picture_left_alt']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="text_game">Texte du jeu</label>
                        <input class="form-control" type="text" id="text_game" name="text_game"
                            value="<?=$game['text_game']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="desc_game">Description du jeu</label>
                        <textarea class="form-control" id="desc_game"
                            name="desc_game"><?=$game['desc_game']?></textarea>
                    </div>
                </div>
                <div class="col">
                    <label class="form-label" for="pc">PC</label>
                    <input class="form-check-input" type="checkbox" id="pc" name="pc" <?=$game['pc'] ? 'checked' : ''?>>
                    <label class="form-label" for="playstation">PlayStation</label>
                    <input class="form-check-input" type="checkbox" id="playstation" name="playstation"
                        <?=$game['playstation'] ? 'checked' : ''?>>
                    <label class="form-label" for="xbox">Xbox</label>
                    <input class="form-check-input" type="checkbox" id="xbox" name="xbox"
                        <?=$game['xbox'] ? 'checked' : ''?>>
                    <label class="form-label" for="switch">Switch</label>
                    <input class="form-check-input" type="checkbox" id="switch" name="switch"
                        <?=$game['switch'] ? 'checked' : ''?>>
                    <input type="hidden" name="id_game" value="<?=$game["id_game"]?>">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary p-2">Modifier</button>
                </div>
            </form>
        </div>
    </section>
    <?php include_once("../include/footer.php")?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>