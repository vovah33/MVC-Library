<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($book['title'] ?? 'Book') ?></title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">Library</div>
            <?php if (isset($_SESSION['user'])): ?>
                <div class="button-group">
                    <a href="?page=favorites" class="button-tile">Favorites</a>
                    <a href="?page=logout" class="button-tile">Logout</a>
                </div>
            <?php else: ?>
                <a href="?page=login" class="button-tile">Login</a>
            <?php endif; ?>
        </div>

        <div class="section">
            <h1><?= htmlspecialchars($book['title'] ?? 'No title') ?></h1>
            <div class="item-details">
                <div class="tile">
                    <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover'] ?? '') ?>" alt="Book cover">
                    <div class="title"><?= htmlspecialchars($book['title'] ?? 'No title') ?></div>
                </div>
                <div class="text-content">
                    <p><?= htmlspecialchars($book['description'] ?? 'No description available') ?></p>
                    <p><strong>Author:</strong> 
                        <a href="index.php?page=author&id=<?= htmlspecialchars($book['author_id'] ?? '') ?>">
                            <?= htmlspecialchars($book['author_name'] ?? 'Unknown author') ?>
                        </a>
                    </p>
                    <p><strong>Genre:</strong> 
                        <a href="index.php?page=genre&id=<?= htmlspecialchars($book['genre_id'] ?? '') ?>">
                            <?= htmlspecialchars($book['genre_name'] ?? 'Unknown genre') ?>
                        </a>
                    </p>
                </div>
            </div>
<?php if (isset($_SESSION['user'])): ?>
    <form method="post">
        <?php if ($isFavorite): ?>
            <button type="submit" name="remove_favorite" class="button-tile danger">Remove from Favorites</button>
        <?php else: ?>
            <button type="submit" name="add_favorite" class="button-tile">Add to Favorites</button>
        <?php endif; ?>
    </form>
<?php endif; ?>

            <a href="/MVC-Library/" class="button-tile">Back to Home</a>
        </div>
    </div>
</body>
</html>