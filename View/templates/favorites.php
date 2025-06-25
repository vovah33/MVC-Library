<?php
require_once __DIR__ . '/../../Models/BookModel.php';
require_once __DIR__ . '/../../Models/AuthorModel.php';
require_once __DIR__ . '/../../Models/GenreModel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorites</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">Library</div>
            <?php if (isset($_SESSION['user'])): ?>
                
                <a href="?page=logout" class="button-tile">Logout</a>
            <?php else: ?>

                <a href="?page=login" class="button-tile">Login</a>
                <a href="?page=register" class="button-tile">Sign Up</a>
            <?php endif; ?>
        </div>

        <div class="section">
            <a href="/MVC-Library/" class="button-tile">← Back</a>
            <h2>Favorites</h2>

            <div class="grid-row">
                <?php
                if (isset($favorites) && !empty($favorites)) {
                    foreach ($favorites as $favorite) {
                        $itemType = $favorite['item_type'];
                        $itemId = $favorite['item_id'];
                        if ($itemType === 'book') {
                            $book = (new BookModel($db))->FindByID($itemId);
                            echo "<div class='tile'><a href='?page=book&id={$book->id}'><img src='/MVC-Library/Public/Images/Covers/{$book->cover}' alt='{$book->title}'><div>{$book->title}</div></a></div>";
                        } elseif ($itemType === 'author') {
                            $author = (new AuthorModel($db))->FindByID($itemId);
                            echo "<div class='tile'><a href='?page=author&id={$author->id}'><img src='/MVC-Library/Public/Images/Photos/{$author->photo}' alt='{$author->name}'><div>{$author->name}</div></a></div>";
                        } elseif ($itemType === 'genre') {
                            $genre = (new GenreModel($db))->FindByID($itemId);
                            echo "<div class='tile'><a href='?page=genre&id={$genre->id}'><img src='/MVC-Library/Public/Images/Icons/{$genre->icone}' alt='{$genre->name}'><div>{$genre->name}</div></a></div>";
                        }
                    }
                } else {
                    echo "<p>No favorites yet.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>