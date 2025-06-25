<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($genre['name']) ?></title>
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
            <h1><?= htmlspecialchars($genre['name']) ?></h1>
            <div class="item-details">
                <div class="tile">
                    <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="Genre icon">
                    <div class="title"><?= htmlspecialchars($genre['name']) ?></div>
                </div>
                <div class="text-content">
                    <p><?= htmlspecialchars($genre['description'] ?? 'No description available') ?></p>
                    <?php if (isset($genre['books']) && is_array($genre['books']) && !empty($genre['books'])): ?>
                        <p><strong>Books in this Genre:</strong>
                            <?php foreach ($genre['books'] as $index => $book): ?>
                                <a href="index.php?page=book&id=<?= htmlspecialchars($book['id']) ?>"><?= htmlspecialchars($book['title']) ?></a>
                                <?php if ($index < count($genre['books']) - 1) echo ", "; ?>
                            <?php endforeach; ?>
                        </p>
                    <?php else: ?>
                        <p>No books available in this genre.</p>
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