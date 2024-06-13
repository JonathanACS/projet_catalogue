<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/stylee.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <!-- <header class="header-index"> -->

    <?php
    include_once("./include/navbar.php");
?>

    <!-- <figure>
            <img src="../img/header-jeu.jpeg" alt="">
        </figure>

    </header> -->

    <div class="container-login">

        <h1>Page de connexion</h1>

        <div class="login">

            <h2>Connectez-vous !</h2>

            <div class="profil-login">

                <figure>
                    <img src="../img/profil.png" alt="">
                </figure>

            </div>

            <form class="form-login">
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" required><br><br>

                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" required><br><br><br>

                <div class="button-login">

                    <button>Connexion</button><br><br>

                </div>

                <button><a href="">Créer votre compte</a></button>
            </form>

        </div>



        <div class="inscription">

            <h2>Créer votre compte</h2>

            <form>
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" required><br><br>

                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" required><br><br>

                <label for="pass">Confirmation</label>
                <input type="password" name="pass" id="pass" required><br><br><br>

                <div class="button-inscription">

                    <button>Créer votre compte</button><br><br>

                </div>

                <button><a href="">Déjà un compte connectez ? <br>Connectez-vous</a></button>

            </form><br>

        </div>

    </div>

    <?php
    include_once("./include/footer.php");
?>

</body>

</html>