<?php

session_start();
require_once("include/connect.php");

// Initialiser $result à un tableau vide par défaut
$result = [];

// Vérifier si une plateforme a été sélectionnée
if (isset($_GET['plateforme']) && $_GET['plateforme'] != '') {
    $plateforme = $_GET['plateforme'];

    // Map des colonnes de plateforme
    $plateforme_column = [
        'pc' => 'pc',
        'playstation' => 'playstation',
        'xbox' => 'xbox',
        'switch' => 'switch'
    ];

    if (array_key_exists($plateforme, $plateforme_column)) {
        $column = $plateforme_column[$plateforme];

        // Requête pour obtenir les jeux en fonction de la plateforme sélectionnée
        $sql = "SELECT *
        FROM jeux j
        JOIN plateforme p ON j.id_game = p.id_game
        WHERE p.$column = 1
        ORDER BY j.id_game DESC";

        
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
if (!empty($result)) {
    foreach ($result as $row) {
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $plateforme ?></title>
    <link href="/css/categories.css" rel="stylesheet">
    <link href="/css/nav-footer.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet">
</head>

<body>
    <header class="header-index">
        <?php include_once("./include/navbar.php"); ?>
        <figure>
            <img class="header-jeu" src="../img/header-jeu.jpeg" alt="">
        </figure>
    </header>
    <main>
        <h1>Voici les jeu disponible sur <?= $plateforme ?></h1>
        <div class="jeu-container">
            <?php foreach($result as $game): ?>
            <article class="card">
                <img class="card-img" src="<?= $game["picture_right"] ?>" alt="<?= $game["picture_right_alt"] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $game["title_game"] ?></h3>
                    <p class="card-sub"><?= $game["desc_game"]?></p>
                    <a class="card-btn" href="jeu.php?id=<?=$game["id_game"]?>">Voir</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include_once("./include/footer.php"); ?>
    <script src="script.js"></script>
</body>

</html>