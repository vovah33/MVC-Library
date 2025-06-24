<!-- View/templates/all-authors.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Authors</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">Library</div>
            <div>
                <input type="text" class="search-input" placeholder="Search...">
                <button class="button-tile">Login</button>
                <span class="profile-icon">👤</span>
            </div>
        </div>

        <div class="section">
            <a href="/MVC-Library/" class="button-tile">← Back</a>
            <h2>All Authors</h2>
            <div class="grid-row">
                <?php foreach ($authors as $author): ?>
                    <a href="index.php?page=author&id=<?= $author['id'] ?>" class="tile">
                        <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="Author">
                        <div class="title"><?= htmlspecialchars($author['name'] ?? 'No name') ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>