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
                    <a>Categories</a>
                    <ul class="sous-nav">

                        <li><a href="../categories.php?plateforme=pc">pc</a></li>
                        <li><a href="../categories.php?plateforme=playstation">playstation</a></li>
                        <li><a href="../categories.php?plateforme=xbox">xbox</a></li>
                        <li><a href="../categories.php?plateforme=switch">switch</a></li>
                    </ul>
                </li>

                <?php if(!isset($_SESSION["user"])): ?>

                <li class="color-lien"><a href="../inscription.php">Inscription</a></li>
                <li class="color-lien"><a href="../login.php">Se connecter</a></li>

                <?php else: ?>

                <p class="bonjour">Bonjour <span class="pseudo"><?= ($_SESSION["user"]["pseudo"]) ?></span></p>
                <li class="color-lien"><a href="../deconnexion.php">Se déconnecter</a></li>

                <?php if(isset($_SESSION["user"]["roles"]) && $_SESSION["user"]["roles"] === "ROLE_ADMIN"): ?>

                <li class="color-lien"><a href="../backoffice/backend_game_list.php">Backoffice</a></li>

                <?php endif; ?>
                <?php endif; ?>

                <div class="lien-sous-menu">
                    <li class="color-lien"><a href="../categories.php?plateforme=pc">pc</a></li>
                    <li class="color-lien"><a href="../categories.php?plateforme=playstation">playstation</a></li>
                    <li class="color-lien"><a href="../categories.php?plateforme=xbox">xbox</a></li>
                    <li class="color-lien"><a href="../categories.php?plateforme=switch">switch</a></li>
                </div>

            </ul>
        </div>

    </div>