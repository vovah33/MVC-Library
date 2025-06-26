<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($genre['name'] ?? 'Genre') ?></title>
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
            <h1><?= htmlspecialchars($genre['name'] ?? 'No name') ?></h1>
            <div class="item-details">
                <div class="tile">
                    <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="Genre icon">
                    <div class="title"><?= htmlspecialchars($genre['name'] ?? 'No name') ?></div>
                </div>
                <div class="text-content">
                    <p><?= htmlspecialchars($genre['description'] ?? 'No description available') ?></p>
                </div>
            </div>
            <h3>Books in this Genre:</h3>
            <div class="grid-row">
                <?php if (isset($genre['books']) && is_array($genre['books']) && !empty($genre['books'])): ?>
                    <?php foreach ($genre['books'] as $book): ?>
                        <div class="tile">
                            <a href="?page=book&id=<?= htmlspecialchars($book['book_id'] ?? '') ?>">
                                <div><?= htmlspecialchars($book['title'] ?? 'No title') ?></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No books available in this genre.</p>
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