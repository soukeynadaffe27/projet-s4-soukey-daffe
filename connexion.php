<?php
session_start();
require_once 'db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Créer une nouvelle connexion MySQLi
    $mysqli = new mysqli('localhost', 'root', '', 'reseau_social');

    // Vérifier si la connexion a rencontré une erreur
    if ($mysqli->connect_error) {
        die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
    }

    // Préparer et exécuter la requête SQL
    $stmt = $mysqli->prepare('SELECT email, password FROM user WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    $row = $stmt->num_rows;

    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);

            $stmt->bind_result($email, $dbPassword);
            $stmt->fetch();

            if ($dbPassword === $password) {
                $_SESSION['user'] = $email;
                header('Location: index.php');
                exit;
            } else {
                header('Location: index.php?login_err=password');
                exit;
            }
        } else {
            header('Location: index.php?login_err=email');
            exit;
        }
    } else {
        header('Location: index.php?login_err=already');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
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
        
        .create-account-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .create-account-text a {
            color: #4267B2;
            font-weight: bold;
            text-decoration: none;
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
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Se connecter" name="submit">
                    </div>
                </form>
                <p class="policy-text">En cliquant sur Se connecter, vous acceptez nos <a href="#">Conditions</a>, <a href="#">Politique de confidentialité des données</a> et <a href="#">Politique relative aux cookies</a>.</p>
                <p class="create-account-text">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
