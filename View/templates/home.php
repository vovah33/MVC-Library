<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
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
         <div class="button-group">
            <a href="?page=login" class="button-tile">Login</a>
            <a href="?page=register" class="button-tile">Sign up</a>
         </div>
    <?php endif; ?>

        </div>
        <div class="section">
            <h2>Welcome to the Library</h2>
            <h3>Books</h3>
            <a href="?page=books" class="button-tile section-link">All Books</a>
            <div class="grid-row">
                <?php foreach ($books as $book): ?>
                    <div class="tile">
                        <a href="?page=book&id=<?= htmlspecialchars($book['id']) ?>">
                            <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover'] ?? '') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                            <div><?= htmlspecialchars($book['title']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <h3>Authors</h3>
            <a href="?page=authors" class="button-tile section-link">All Authors</a>
            <div class="grid-row">
                <?php foreach ($authors as $author): ?>
                    <div class="tile">
                        <a href="?page=author&id=<?= htmlspecialchars($author['id']) ?>">
                            <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="<?= htmlspecialchars($author['name']) ?>">
                            <div><?= htmlspecialchars($author['name']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <h3>Genres</h3>
            <a href="?page=genres" class="button-tile section-link">All Genres</a>
            <div class="grid-row">
                <?php foreach ($genres as $genre): ?>
                    <div class="tile">
                        <a href="?page=genre&id=<?= htmlspecialchars($genre['id']) ?>">
                            <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="<?= htmlspecialchars($genre['name']) ?>">
                            <div><?= htmlspecialchars($genre['name']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>