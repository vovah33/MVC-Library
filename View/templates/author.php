<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($author['name']) ?></title>
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
            <h1><?= htmlspecialchars($author['name']) ?></h1>
            <div class="item-details">
                <div class="tile">
                    <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="Author photo">
                    <div class="title"><?= htmlspecialchars($author['name']) ?></div>
                </div>
                <div class="text-content">
                    <p><?= htmlspecialchars($author['bio'] ?? 'No bio available') ?></p>
                    <?php if (isset($author['books']) && is_array($author['books']) && !empty($author['books'])): ?>
                        <p><strong>Books by this Author:</strong>
                            <?php foreach ($author['books'] as $index => $book): ?>
                                <a href="index.php?page=book&id=<?= htmlspecialchars($book['id']) ?>"><?= htmlspecialchars($book['title']) ?></a>
                                <?php if ($index < count($author['books']) - 1) echo ", "; ?>
                            <?php endforeach; ?>
                        </p>
                    <?php else: ?>
                        <p>No books available by this author.</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (isset($_SESSION['user'])): ?>
                <form method="POST" class="favorite-form">
                    <button type="submit" name="action" value="add_favorite" class="button-tile">Add to Favorites</button>
                </form>
            <?php endif; ?>
            <a href="/MVC-Library/" class="button-tile">Back to Home</a>
        </div>
    </div>
</body>
</html>