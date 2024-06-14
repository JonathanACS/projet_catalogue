<?php
    //on démare la session, la session sert à envoyer des message d'une page à l'autre
    session_start();
    
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="./css/stylee.css" rel="stylesheet">
</head>

<body>

    <header class="header-index">

        <?php
    include_once("./include/navbar.php");
?>

        <figure>
            <img src="../img/header-jeu.jpeg" alt="">
        </figure>

    </header>

    <div class="container-index">

        <div class="titre-index">

            <h1>A la une</h1>

        </div>

        <div class="img-index">

            <figure>
                <img src="../img/exemple.png" alt="">
            </figure>

        </div>

        <div class="img-1-index">

            <figure>
                <img src="../img/exemple.png" alt="">
            </figure>

        </div>

    </div>


    <div class="container-index-1">

        <div class="img-index-1">

            <figure>
                <img src="../img/exemple.png" alt="">
            </figure>

        </div>

        <div class="img-2-index">

            <figure>
                <img src="../img/exemple.png" alt="">
            </figure>

        </div>

    </div>

    <?php
    include_once("./include/footer.php");
?>

</body>

</html>