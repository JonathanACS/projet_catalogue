<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/stylee.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <?php
    include_once("./include/navbar.php");
?>

    <div class="container-login">

        <h1>Page de connexion</h1>

        <div class="login">

            <h2>Connectez-vous !</h2>

            <form class="form-login">
                <label for="username">Pseudo</label><br>
                <input type="text" name="username" id="username" required><br><br>

                <label for="pass">Mot de passe</label><br>
                <input type="password" name="pass" id="pass" required><br><br><br>

                <button>Connexion</button><br><br>
                <button><a href="#">Créer votre compte</a></button>
            </form>

        </div>



        <div class="inscription">

            <h2>Créer votre compte</h2>

            <form>
                <label for="username">Pseudo</label><br>
                <input type="text" name="username" id="username" required><br><br>

                <label for="email">Adresse e-mail</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="pass">Mot de passe</label><br>
                <input type="password" name="pass" id="pass" required><br><br>

                <label for="pass">Confirmation</label><br>
                <input type="password" name="pass" id="pass" required><br><br><br>

                <button>Créer votre compte</button><br><br>
                <button><a href="#">Déjà un compte connectez ? <br>Connectez-vous</a></button>

            </form><br>

        </div>

    </div>

    <?php
    include_once("./include/footer.php");
?>

</body>

</html>