<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-secondary" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html"><span>GT0.1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/projet1/Frontend/index.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Accueil</a>
                </li>
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/formations.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Formations</a></li>
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/about.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">À propos de nous</a></li>
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/actualite.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Actualité</a></li>
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/contact.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Contactez nous</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/login.php"><img src="images/user.svg"></a></li>
                <li><a class="nav-link" href="http://localhost/projet1/Frontend/logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
