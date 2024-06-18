  <!DOCTYPE html>
  <html lang="fr">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
      <link rel="stylesheet" href="navbar.css">
      <title>Navbar</title>
  </head>

  <body>

      <div class="mobile-nav">
          <span class="material-symbols-outlined" onclick="toggler()" id="toggler">menu</span>
          <div class="mobile-accueil">
              <a href="../index.php">Accueil</a>
          </div>
      </div>

      <div class="menu">

          <div class="container-nav">

              <div class="accueil">
                  <a href="../index.php">Accueil</a>
              </div>

              <ul class="menu-nav">
                  <li class="has-sous-nav">
                      <a href="">Catégories</a>
                      <ul class="sous-nav">
                          <li><a href="categories.php">PC</a></li>
                          <li><a href="categories.php">PS4/PS5</a></li>
                          <li><a href="categories.php">XBOX</a></li>
                          <li><a href="categories.php">SWITCH</a></li>
                      </ul>
                  </li>
                  <?php if(!isset($_SESSION["user"])): ?>
                  <li><a href="inscription.php">Inscription</a></li>
                  <li><a href="login.php">Se connecter</a></li>
                  <?php else: ?>
                  <p>Bonjour <span class="pseudo"><?= ($_SESSION["user"]["pseudo"]) ?></span></p>
                  <li><a href="deconnexion.php">Se déconnecter</a></li>
                  <?php endif; ?>
                  <li><a href="../backoffice/backend_game_list.php">Backoffice</a></li>
              </ul>
          </div>

      </div>

      <script src="script.js"></script>

  </body>

  </html>