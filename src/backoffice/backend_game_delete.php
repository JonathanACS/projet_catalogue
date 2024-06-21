<?php
session_start();

//verification admin 
if (!isset($_SESSION['user']) || $_SESSION['user']['roles'] !== 'ROLE_ADMIN') {

    header('Location: ../index.php');
    exit();
}

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Connexion à la base de données
    require_once("../include/connect.php");

    // Nettoyage de l'ID
    $id_game = intval($_GET["id"]);

    // Sélection du jeu à supprimer
    $sql_select = "SELECT * FROM `jeux` WHERE `id_game` = :id_game;";
    $query_select = $db->prepare($sql_select);
    $query_select->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query_select->execute();
    $result = $query_select->fetch();

    if (!$result) {
        $_SESSION["erreur"] = "L'ID en question n'existe pas.";
        header("Location: backend_game_list.php");
        exit();
    }

    // Sélection du jeu à supprimer
    $sql_select = "SELECT * FROM `plateforme` WHERE `id_game` = :id_game;";
    $query_select = $db->prepare($sql_select);
    $query_select->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query_select->execute();
    $result_plateforme = $query_select->fetch();

    if (!$result_plateforme) {
        $_SESSION["erreur"] = "L'ID en question n'existe pas.";
        header("Location: backend_game_list.php");
        exit();
    }

    // Récupération des chemins des images à supprimer
    $picture_right = $result['picture_right'];
    $picture_left = $result['picture_left'];
    $picture_header = $result['picture_header'];

    // Suppression des images si elles existent
    if (!empty($picture_right) && file_exists($picture_right)) {
        if (unlink($picture_right));}

    if (!empty($picture_left) && file_exists($picture_left)) {
        if (unlink($picture_left));}

    if (!empty($picture_header) && file_exists($picture_header)) {
        if (unlink($picture_header));}

    // Suppression de l'entrée dans la base de données
    $sql_delete = "DELETE FROM `jeux` WHERE `id_game` = :id_game;";
    $query_delete = $db->prepare($sql_delete);
    $query_delete->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query_delete->execute();

    // Suppression de l'entrée dans la base de données
    $sql_delete = "DELETE FROM `plateforme` WHERE `id_game` = :id_game;";
    $query_delete = $db->prepare($sql_delete);
    $query_delete->bindValue(':id_game', $id_game, PDO::PARAM_INT);
    $query_delete->execute();

    $_SESSION["supprimer"] = "Information du jeu supprimée avec succès.";
    header("Location: backend_game_list.php");
    exit();
} else {
    $_SESSION["erreur"] = "L'ID du jeu à supprimer n'est pas spécifié.";
    header("Location: backend_game_list.php");
    exit();
}
?>