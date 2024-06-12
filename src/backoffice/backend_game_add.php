<?php
// Lancement de la session
session_start();

// Connexion à la BDD
require_once("../include/connect.php");

// Fonction pour générer une chaîne de caractères aléatoire
function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Vérification si le formulaire est rempli
if ($_POST) {
    if (isset($_POST["title_game"]) && !empty($_POST["title_game"])
        && isset($_POST["text_game"]) && !empty($_POST["text_game"])
        && isset($_FILES["picture_right"]) && $_FILES["picture_right"]["error"] == 0
        && isset($_FILES["picture_left"]) && $_FILES["picture_left"]["error"] == 0
        && isset($_POST["desc_game"]) && !empty($_POST["desc_game"])
        && isset($_POST["trailler"]) && !empty($_POST["trailler"])) {

        // Nettoyage des données avant de les envoyer
        $title_game = strip_tags($_POST["title_game"]);
        $text_game = strip_tags($_POST["text_game"]);
        $desc_game = strip_tags($_POST["desc_game"]);
        $trailler = strip_tags($_POST["trailler"]);
        $pc = isset($_POST["pc"]) ? 1 : 0;
        $playstation = isset($_POST["playstation"]) ? 1 : 0;
        $xbox = isset($_POST["xbox"]) ? 1 : 0;
        $switch = isset($_POST["switch"]) ? 1 : 0;

        // Gestion des images
        $uploadDir = '../img/jeu/';
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

        // Gestion de picture_right
        $imageFileType = strtolower(pathinfo($_FILES['picture_right']['name'], PATHINFO_EXTENSION));
        if (in_array($imageFileType, $allowedTypes)) {
            $newFileNameRight = generateRandomString(20) . '.' . $imageFileType;
            $picture_right = $uploadDir . $newFileNameRight;
            move_uploaded_file($_FILES['picture_right']['tmp_name'], $picture_right);
        } else {
            $_SESSION["message"] = "Format de l'image droite non autorisé.";
            header("Location: ../backend/backend_game_add.php");
            exit;
        }

        // Gestion de picture_left
        $imageFileType = strtolower(pathinfo($_FILES['picture_left']['name'], PATHINFO_EXTENSION));
        if (in_array($imageFileType, $allowedTypes)) {
            $newFileNameLeft = generateRandomString(20) . '.' . $imageFileType;
            $picture_left = $uploadDir . $newFileNameLeft;
            move_uploaded_file($_FILES['picture_left']['tmp_name'], $picture_left);
        } else {
            $_SESSION["message"] = "Format de l'image gauche non autorisé.";
            header("Location: ../backend/backend_game_add.php");
            exit;
        }

        // Préparation de la requête pour envoyer les informations dans la base de données
        $sql = "INSERT INTO `jeux` (`title_game`, `text_game`, `picture_right`, `picture_left`, `desc_game`, `trailler`, `pc`,
        `playstation`, `xbox`, `switch`) VALUES (:title_game, :text_game, :picture_right, :picture_left, :desc_game, :trailler,
        :pc, :playstation, :xbox, :switch)";

        // Préparation de la requête
        $query = $db->prepare($sql);

        // Attribution des valeurs
        $query->bindValue(':title_game', $title_game, PDO::PARAM_STR);
        $query->bindValue(':text_game', $text_game, PDO::PARAM_STR);
        $query->bindValue(':picture_right', $picture_right, PDO::PARAM_STR);
        $query->bindValue(':picture_left', $picture_left, PDO::PARAM_STR);
        $query->bindValue(':desc_game', $desc_game, PDO::PARAM_STR);
        $query->bindValue(':trailler', $trailler, PDO::PARAM_STR);
        $query->bindValue(':pc', $pc, PDO::PARAM_INT);
        $query->bindValue(':playstation', $playstation, PDO::PARAM_INT);
        $query->bindValue(':xbox', $xbox, PDO::PARAM_INT);
        $query->bindValue(':switch', $switch, PDO::PARAM_INT);

        // Exécution de la requête
        if ($query->execute()) {
            // Message à afficher
            $_SESSION["message"] = "Jeu ajouté";
            // Redirection vers la page stage.php
            header("Location: ../backend/backend_game_list.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice ajouter un jeu</title>
</head>

<body>
    <?php include_once("../include/navbar.php")?>

    <h1>ADD GAME</h1>
    <button><a href="backend_game_add.php">Ajouter un jeu</a></button>
    <button><a href="backend_game_modif.php">Modifier un jeu</a></button>

    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="title_game">Titre du jeu</label>
            <input type="text" id="title_game" name="title_game" required>
        </div>
        <div>
            <label for="text_game">Description du jeu</label>
            <textarea id="text_game" name="text_game" required></textarea>
        </div>
        <div>
            <label for="picture_right">Lien image droit</label>
            <input type="file" id="picture_right" name="picture_right" required>
        </div>
        <div>
            <label for="picture_left">Lien image gauche</label>
            <input type="file" id="picture_left" name="picture_left" required>
        </div>
        <div>
            <label for="desc_game">Description du jeu</label>
            <textarea id="desc_game" name="desc_game" required></textarea>
        </div>
        <div>
            <label for="trailler">Lien du trailler</label>
            <input type="text" id="trailler" name="trailler" required>
        </div>
        <div>
            <label for="pc">PC</label>
            <input type="checkbox" id="pc" name="pc">
            <label for="playstation">PlayStation</label>
            <input type="checkbox" id="playstation" name="playstation">
            <label for="xbox">Xbox</label>
            <input type="checkbox" id="xbox" name="xbox">
            <label for="switch">Switch</label>
            <input type="checkbox" id="switch" name="switch">
        </div>
        <button>Envoyer</button>
    </form>
</body>

</html>