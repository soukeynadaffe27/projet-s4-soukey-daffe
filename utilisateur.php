<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    require_once('db.php');

    // Récupérer l'ID de l'utilisateur à partir de l'URL
    $user = $_GET['user'];

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM user WHERE id = '$user'";
    $result = $connect->query($sql);

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Récupérer les informations de l'utilisateur
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $tel = $row['tel'];
        $email = $row['email'];

        // Afficher les informations de l'utilisateur
        echo "<h1>Bienvenue, $nom !</h1>";
        echo "<p><strong>Nom :</strong> $nom</p>";
        echo "<p><strong>Prénom :</strong> $prenom</p>";
        echo "<p><strong>tel :</strong> $tel</p>";
        echo "<p><strong>email :</strong> $email</p>";
    } else {
        echo "<p class='error'>Utilisateur non trouvé</p>";
    }

    // Fermer la connexion à la base de données
    $connect->close();
    ?>
</body>
</html>
