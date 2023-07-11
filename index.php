<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réseau social</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #4267B2; /* Couleur bleue de Facebook */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .navbar-brand h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }

        .user_actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            font-weight: bold;
        }

        .card-body {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body img {
            width: 30px;
            height: 30px;
        }

        .card-body p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" alt="Logo Facebook" width="90" height="30">
                    <h1 class="text-light">FACEBOOK</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="user_actions text-dark">
                    <div>
                        <a class="nav-link btn btn-light" href="connexion.php">Connexion</a>
                    </div>
                    <div>
                        <a class="nav-link btn btn-light" href="inscription.php">Inscription</a>
                    </div>
                    <div>
                        <a class="nav-link btn btn-primary bg-light" href="post.php">post</a>
                    </div>
                    <div>
                        <a class="nav-link btn btn-primary bg-light" href="profile.php">Mon compte</a>
                    </div>
                    <?php
                    session_start();
                    if (isset($_SESSION['utilisateur'])) {
                        $utilisateurConnecte = $_SESSION['utilisateur'];
                        $profilUtilisateur = getProfilUtilisateur($utilisateurConnecte);
                        if ($profilUtilisateur) {
                            $nomUtilisateur = $profilUtilisateur['nom'];
                            $photoProfil = $profilUtilisateur['photo_path'];

                            echo '<div>
                                    <img src="' . $photoProfil . '" alt="Profil" width="30" height="30">
                                    ' . $nomUtilisateur . '
                                </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Section des likes -->
                <div class="card">
                    <div class="card-header">
                        J'aime
                    </div>
                    <div class="card-body">
                        <?php
                        $utilisateur = null; // Déclaration de la variable $utilisateur
                        if (isset($_SESSION['utilisateur'])) {
                            $utilisateurConnecte = $_SESSION['utilisateur'];
                            $profilUtilisateur = getProfilUtilisateur($utilisateurConnecte);
                            if ($profilUtilisateur) {
                                $nomUtilisateur = $profilUtilisateur['nom'];
                                $photoProfil = $profilUtilisateur['photo_path'];
                                echo '<img src="' . $photoProfil . '" alt="Profil">';
                                echo '<p>' . $nomUtilisateur . '</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Section des commentaires -->
                <div class="card">
                    <div class="card-header">
                        Commentaires
                    </div>
                    <div class="card-body">
                        <?php
                        $commentaires = array(); // Initialisation de la variable $commentaires comme un tableau vide

                        foreach ($commentaires as $commentaire) {
                            echo '<p>' . $commentaire['texte'] . '</p>';
                        }
                        ?>

                        <form action="ajouter_commentaire.php" method="post">
                            <div class="mb-3">
                                <label for="commentaire">Ajouter un commentaire :</label>
                                <textarea class="form-control" id="commentaire" name="commentaire"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
