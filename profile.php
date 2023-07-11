<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FACEBOOK</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4267B2;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .search-bar {
            background-color: white;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            border-radius: 5px;
        }

        .search-bar input[type="text"] {
            flex-grow: 1;
            padding: 5px;
            border: none;
            outline: none;
        }

        .search-bar button {
            background-color: #4267B2;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .post {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .post .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post .post-header h3 {
            font-size: 1.2rem;
            margin: 0;
        }

        .post .post-content {
            margin-bottom: 10px;
        }

        .post .post-actions {
            display: flex;
            align-items: center;
        }

        .post .post-actions button {
            background-color: #4267B2;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .post .post-actions i {
            margin-right: 5px;
        }

        .footer {
            background-color: #4267B2;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>facebook</h1>
        </div>

        <div class="search-bar">
            <form method="GET" action="recherche.php">
                <input type="text" name="search" placeholder="Rechercher...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="post">
            <div class="post-header">
                <img src="avatar.jpg" alt="Photo de profil">
                <h3>soukeyna daffe</h3>
            </div>
            <div class="post-content">
                <p>Contenu du post...</p>
            </div>
            <div class="post-actions">
                <form method="POST" action="traitement.php">
                    <input type="hidden" name="post_id" value="1">
                    <button type="submit" name="action" value="like"><i class="fas fa-thumbs-up"></i> J'aime</button>
                    <button type="submit" name="action" value="comment"><i class="fas fa-comment"></i> Commenter</button>
                    <button type="submit" name="action" value="share"><i class="fas fa-share"></i> Partager</button>
                </form>
            </div>
        </div>

        <div class="post">
            <div class="post-header">
                <img src="avatar.jpg" alt="Photo de profil">
                <h3>ousmane sarr</h3>
            </div>
            <div class="post-content">
                <p>Contenu du post...</p>
            </div>
            <div class="post-actions">
                <form method="POST" action="traitement.php">
                    <input type="hidden" name="post_id" value="2">
                    <button type="submit" name="action" value="like"><i class="fas fa-thumbs-up"></i> J'aime</button>
                    <button type="submit" name="action" value="comment"><i class="fas fa-comment"></i> Commenter</button>
                    <button type="submit" name="action" value="share"><i class="fas fa-share"></i> Partager</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2023 Réseau social. Tous droits réservés.</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>

