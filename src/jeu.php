<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/jeu.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <title>Jeu</title>
</head>

<body>

    <header class="header-jeu">

        <?php
    include_once("./include/navbar.php");
?>

        <figure>
            <img src="../img/header-jeu.jpeg" alt="">
        </figure>

    </header>


    <h1 class="titre-jeu">Titre du jeu</h1>

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

        <div class="trailler">

            <p>Trailler</p>

        </div>

        <?php
    include_once("./include/footer.php");
?>

</body>

</html>