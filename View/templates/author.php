<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($author['name'] ?? 'Author') ?></title>
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
            <a href="/MVC-Library/" class="button-tile">← Back to Home</a>
        <div class="section">
            <h1><?= htmlspecialchars($author['name'] ?? 'No name') ?></h1>
            <div class="item-details">
                <div class="tile">
                    <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="Author photo">
                    <div class="title"><?= htmlspecialchars($author['name'] ?? 'No name') ?></div>
                </div>
                <div class="text-content">
                    <p><?= htmlspecialchars($author['bio'] ?? 'No bio available') ?></p>
                </div>
            </div>
            <h3>Books by this Author:</h3>
            <div class="grid-row">
                <?php if (isset($author['books']) && is_array($author['books']) && !empty($author['books'])): ?>
                    <?php foreach ($author['books'] as $book): ?>
                        <div class="tile">
                            <a href="?page=book&id=<?= htmlspecialchars($book['book_id'] ?? '') ?>">
                                <div><?= htmlspecialchars($book['title'] ?? 'No title') ?></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No books available for this author.</p>
                <?php endif; ?>
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


        </div>
    </div>
</body>
</html>