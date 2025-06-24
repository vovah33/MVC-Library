<!-- View/templates/all-genres.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Genres</title>
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
            <h2>All Genres</h2>
            <div class="grid-row">
                <?php foreach ($genres as $genre): ?>
                    <a href="index.php?page=genre&id=<?= $genre['id'] ?>" class="tile">
                        <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="Genre">
                        <div class="title"><?= htmlspecialchars($genre['name'] ?? 'No name') ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>