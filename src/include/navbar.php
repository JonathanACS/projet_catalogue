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
                    <a href="categories.php?categories=categories">categories</a>

                    <ul class="sous-nav">

                        <li><a href="categories.php?categories=pc">pc</a></li>
                        <li><a href="categories.php?categories=playstation">playstation</a></li>
                        <li><a href="categories.php?categories=xbox">xbox</a></li>
                        <li><a href="categories.php?categories=switch">switch</a></li>
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