    <div class="mobile-nav">
        <img src="../img/menu-burger.png" alt="menu-burger-img" id="menu-open" width="30px" height="30px">
        <img src="../img/close-burger.png" alt="close-burger-img" id="menu-close" style="display:none;" width="30px"
            height="30px">
        <div class="mobile-accueil">
            <a href="../index.php">Accueil</a>
        </div>
    </div>
    <div class="menu" id="mobile-menu">

        <div class="container-nav">

            <div class="accueil">
                <a href="../index.php">Accueil</a>
            </div>

            <ul class="menu-nav">
                <li class="has-sous-nav">
                    <a>categories</a>

                    <ul class="sous-nav">

                        <li><a href="categories.php?plateforme=pc">pc</a></li>
                        <li><a href="categories.php?plateforme=playstation">playstation</a></li>
                        <li><a href="categories.php?plateforme=xbox">xbox</a></li>
                        <li><a href="categories.php?plateforme=switch">switch</a></li>
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