<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .left-section {
            flex: 1;
            padding: 20px;
            text-align: center;
            background-color: #f0f2f5;
        }

        .right-section {
            flex: 1;
            padding: 20px;
            background-color: white;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .connect-text {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: #4267B2;
            color: white;
            cursor: pointer;
        }

        .policy-text {
            margin-top: 20px;
            font-size: 0.9rem;
            text-align: center;
        }

        .policy-text a {
            color: #4267B2;
            font-weight: bold;
            text-decoration: none;
        }

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
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img class="logo" src="logo.png" alt="Logo Facebook">
            <p class="connect-text">Connectez-vous avec des amis et le monde qui vous entoure sur Facebook</p>
        </div>
        <div class="right-section">
            <div class="form-container">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="name">Prénom</label>
                        <input type="text" id="prenom" name="prenom" >
                    </div>
                    <div class="form-group">
                        <label for="name">Téléphone</label>
                        <input type="number" id="tel" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ins" value="S'inscrire">
                    </div>
                </form>
                <p class="policy-text">En cliquant sur S'inscrire, vous acceptez nos <a href="#">Conditions</a>, <a href="#">Politique de confidentialité des données</a> et <a href="#">Politique relative aux cookies</a>.</p>
                <p class="login-link">J'ai déjà un compte, <a href="connexion.php">me connecter</a>.</p>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    
    <?php
    session_start();
    
    if(isset($_POST['ins'])){
        // Récupérer les valeurs saisies dans le formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Connexion à votre base de données (remplacez les valeurs par les vôtres)
        $server = "localhost";
        $username = "root";
        $db = "";
        $dbname = "reseau_social";
        
        $conn = new mysqli($server, $username, $db, $dbname);
        
        // Vérifier la connexion à la base de données
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }
        
        // Préparer et exécuter la requête d'insertion des données
        $stmt = $conn->prepare("INSERT INTO user (nom, prenom, tel, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nom, $prenom, $tel, $email, $password);
        
        if ($stmt->execute() === TRUE) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
        
        // Fermer la connexion à la base de données
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
