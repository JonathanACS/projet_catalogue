    <div class="container-nav">

        <nav>
            <div class="accueil">
                <a href="../index.php">Accueil</a>
            </div>

            <ul>
                <li>
                    <!-- <a href="">Catégories</a>
                    <ul>
                        <li><a href="">PC</a></li>
                        <li><a href="">PS4/PS5</a></li>
                        <li><a href="">XBOX</a></li>
                        <li><a href="">SWITCH</a></li>
                    </ul> -->
                </li>
                <?php if(!isset($_SESSION["user"])): ?>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="login.php">Se connecter</a></li>
                <?php else: ?>
                <p>Bonjour <span class="pseudo"><?= ($_SESSION["user"]["pseudo"]) ?></span></p>
                <li><a href="deconnexion.php">Se déconnecter</a></li>
                <?php endif; ?>
                <li><a href="../backoffice/backend_game_list.php">backoffice</a></li>
            </ul>

        </nav>

    </div>