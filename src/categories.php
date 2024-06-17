<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="./css/categories.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>

<body>

    <header class="header-index">

        <?php
    include_once("./include/navbar.php");
?>

        <figure>
            <img src="../img/header-categories.jpg" alt="">
        </figure>

    </header>

    <div class="container-categories">

        <div class="titre-categories">

            <h1>Nom de la catégories</h1>

        </div>

        <div class="img-categories">

            <figure>
                <img src="../img/img-categories.jpg" alt="">
            </figure>

        </div>

        <div class="img-1-categories">

            <figure>
                <img src="../img/img-categories.jpg" alt="">
            </figure>

        </div>

    </div>

    <div class="container-categories-1">

        <div class="img-categories-1">

            <figure>
                <img src="../img/img-categories.jpg" alt="">
            </figure>

        </div>

        <div class="img-2-categories">

            <figure>
                <img src="../img/img-categories.jpg" alt="">
            </figure>

        </div>

    </div>


    <?php
    include_once("./include/footer.php");
?>
    <script src="script.js"></script>

</body>

</html>