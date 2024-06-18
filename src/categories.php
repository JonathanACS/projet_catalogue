<?php
    session_start();
    require_once("include/connect.php");

if (isset($_GET["categories"])) {
    $categories = $_GET["categories"];

    echo $categories;

}
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
    <title>Accueil</title>
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
        <h1>Voici les jeu disponible sur</h1>
        <div class="jeu-container">
            <?php foreach($result as $game): ?>
            <article class="card">
                <img class="card-img" src="<?= $game["picture_right"] ?>" alt="<?= $game["picture_right_alt"] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $game["title_game"] ?></h3>
                    <p class="card-sub"><?= $game["text_game"]?></p>
                    <a class="card-btn" href="jeu.php?id=<?=$game["id_game"]?>">Voir</a>
                </div>

            </article>
            <?php endforeach; ?>
        </div>
    </main>
    <section>

    </section>
    <?php include_once("./include/footer.php"); ?>
    <script src="script.js"></script>
</body>

</html>