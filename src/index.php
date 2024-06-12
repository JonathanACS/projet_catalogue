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
    <?php
    include_once("./include/navbar.php");
?>
    <h1>Index</h1>

    <h3>A la une</h3>

    <?php
    include_once("./include/footer.php");
?>

</body>

</html>