<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .post-card {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f0f2f5;
            border-radius: 5px;
        }

        .post-card h3 {
            margin-top: 0;
        }

        .post-card p {
            margin-bottom: 10px;
        }

        .post-card .post-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .post-card .likes {
            margin-bottom: 10px;
        }

        .post-card .comments {
            margin-top: 20px;
        }

        .post-card .comment-form {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Posts</h1>
        <?php
        require_once 'db.php';
        $posts = $db->getPosts();
        
        foreach ($posts as $post) {
            echo '<div class="post-card">';
            echo '<h3>' . $post['title'] . '</h3>';
            echo '<p>' . $post['content'] . '</p>';
            
            if ($post['photo'] !== null) {
                echo '<img class="post-image" src="' . $post['photo'] . '" alt="Post Image">';
            }
            
            echo '<div class="likes">';
            echo '<button class="btn btn-primary like-btn" data-post-id="' . $post['id'] . '">Like</button>';
            echo '<span class="like-count">' . $db->getLikesCount($post['id']) . '</span>';
            echo '</div>';
            
            echo '<div class="comments">';
            echo '<h4>Comments</h4>';
            
            $comments = $db->getComments($post['id']);
            
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    echo '<p>' . $comment['content'] . '</p>';
                }
            } else {
                echo '<p>No comments yet.</p>';
            }
            
            echo '<form class="comment-form" method="post" action="process_comment.php">';
            echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
            echo '<textarea name="comment_content" rows="2" placeholder="Add a comment..." required></textarea>';
            echo '<button type="submit" class="btn btn-primary">Post Comment</button>';
            echo '</form>';
            
            echo '</div>';
            
            echo '</div>';
        }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script pour gérer le bouton "Like" de chaque publication
        const likeBtns = document.querySelectorAll('.like-btn');
        likeBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                // Envoyer une requête AJAX pour gérer le like sur le serveur
                // (Vous devez mettre en place le code de gestion du like côté serveur)
            });
        });
    </script>
</body>
</html>
