<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">

    <div class="container">

        <a class="navbar-brand" href="<?php echo URLROOT; ?>">Framework MVC</a>




        <div class="navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URLROOT; ?>">Accueil</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">A propos</a>

                </li>

                <?php if (checkUserLog()) : ?>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index">Les post</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo URLROOT; ?>/posts/addPost">Ajouter un post</a>

                    </li>

                <?php endif; ?>

            </ul>



            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link" href="#">Bienvenue <?= $_SESSION['user_name'] ?? '' ?></a>

                </li>

                <li class="nav-item">

                    <?php if (checkUserLog()) : ?>
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Déconnexion</a>
                    <?php else : ?>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Inscription</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Connexion</a>

                </li>

            <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>