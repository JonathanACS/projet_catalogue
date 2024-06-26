<?php
// Démarrage de la session
session_start();

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {

        // Connexion à la base de données (information de la connexion dans "connect.php")
        require_once("./include/connect.php");

        // Nettoyage des données avant de les envoyer
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["pass"]);

        $_SESSION["error"] = [];

        // Vérification si l'adresse email est correcte
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"][] = "L'adresse email est incorrecte";
        }

        // Vérification si l'email existe déjà dans la base de données
        $sql = "SELECT * FROM `users` WHERE `email` = :email";
        $query = $db->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION["error"][] = "L'adresse email est déjà utilisée";
        }

        if (empty($_SESSION["error"])) {

            // Hachage du mot de passe (pour ne pas le déchiffrer)
            $pass = password_hash($pass, PASSWORD_ARGON2ID);

            // Définir le rôle par défaut
            $roles = 'ROLE_USER';

            // Préparation de la requête pour envoyer les informations dans la base de données
            $sql = "INSERT INTO `users`(`username`, `email`, `pass`, `roles`) VALUES (:username, :email, :pass, :roles)";

            // Préparation de la requête
            $query = $db->prepare($sql);

            // Attribution des valeurs
            $query->bindValue(':username', $username, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':pass', $pass, PDO::PARAM_STR);
            $query->bindValue(':roles', $roles, PDO::PARAM_STR);

            // Exécution de la requête
            $query->execute();

            // Récupération de l'id de l'utilisateur
            $id = $db->lastInsertId();

            // On va stocker dans $_SESSION
            $_SESSION["user"] = [
                "id" => $id,
                "pseudo" => $username,
                "email" => $_POST["email"],
                "roles" => ["ROLE_USER"]
            ];

            unset($pass);

            // Message à afficher 
            $_SESSION["success"] = "Compte créé avec succès!";

            // Redirection vers la page pour la page des profils
            header("Location: index.php");

            // Assurez-vous qu'aucun autre code ne soit exécuté après la redirection
            exit();
        }
    } else {
        $_SESSION["error"] = ["Le formulaire est incomplet"];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre compte</title>
    <link href="./css/inscription.css" rel="stylesheet" />
    <link href="./css/nav-footer.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include_once("./include/navbar.php");?>
    </header>
    <main>
        <?php
            if (!empty($_SESSION["error"])) {
                echo "<h3>" . implode("<br>", $_SESSION["error"]) . "</h3>";
            }
        ?>
        <h1 class="title-center">Remplissez le formulaire pour créer votre compte</h1>
        <form method="post">
            <div class="form">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required placeholder="username">
            </div>
            <div class="form">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="email@online.fr">
            </div>
            <div class="form">
                <label for="pass">Mot de passe</label>
                <input type="password" id="pass" name="pass" required placeholder="password">
            </div>
            <div class="inscription">
                <button type="submit">Créer votre compte</button>
                <a href="login.php">Se connecter</a>
            </div>
        </form>
    </main>

    <?php include_once("./include/footer.php");?>
    <script src="script.js"></script>
</body>

</html>