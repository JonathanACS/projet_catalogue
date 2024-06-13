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
        // Rediriger vers une page d'erreur ou afficher un message d'erreur approprié
        header("Location: ../backoffice/backend_game_list.php");
    }
} else {
        // Rediriger vers une page d'erreur ou afficher un message d'erreur approprié si l'identifiant du jeu n'est pas défini dans l'URL
        header("Location: ../backoffice/backend_game_list.php");
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
    <link href="./css/stylee.css" rel="stylesheet">
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

    <h1>Modifier un jeu</h1>

    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="title_game">Titre du jeu</label>
            <input type="text" id="title_game" name="title_game" value="<?=$game['title_game']?>">
        </div>
        <div>
            <label for="text_game">Texte du jeu</label>
            <input type="text" id="text_game" name="text_game" value="<?=$game['text_game']?>">
        </div>
        <div>
            <label for="picture_right">Lien image droit</label>
            <input type="file" id="picture_right" name="picture_right" value="<?=$game['picture_right']?>">
        </div>
        <div>
            <label for="picture_right_alt">ALT image droit</label>
            <input type="text" id="picture_right_alt" name="picture_right_alt" value="<?=$game['picture_right_alt']?>">
        </div>
        <div>
            <label for="picture_left">Lien image gauche</label>
            <input type="file" id="picture_left" name="picture_left" value="<?=$game['picture_left']?>">
        </div>
        <div>
            <label for="picture_left_alt">ALT image gauche</label>
            <input type="text" id="picture_left_alt" name="picture_left_alt" value="<?=$game['picture_left_alt']?>">
        </div>
        <div>
            <label for="desc_game">Description du jeu</label>
            <textarea id="desc_game" name="desc_game"><?=$game['desc_game']?></textarea>
        </div>
        <div>
            <label for="trailler">Lien du trailler</label>
            <input type="text" id="trailler" name="trailler" value="<?=$game['trailler']?>">
        </div>
        <div>
            <label for="pc">PC</label>
            <input type="checkbox" id="pc" name="pc" <?=$game['pc'] ? 'checked' : ''?>>
            <label for="playstation">PlayStation</label>
            <input type="checkbox" id="playstation" name="playstation" <?=$game['playstation'] ? 'checked' : ''?>>
            <label for="xbox">Xbox</label>
            <input type="checkbox" id="xbox" name="xbox" <?=$game['xbox'] ? 'checked' : ''?>>
            <label for="switch">Switch</label>
            <input type="checkbox" id="switch" name="switch" <?=$game['switch'] ? 'checked' : ''?>>
            <input type="hidden" name="id_game" value="<?=$game["id_game"]?>">
        </div>
        <button>Modifier</button>
    </form>
    <a href="#" onclick="history.go(-1)"><button>Retour</button></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>