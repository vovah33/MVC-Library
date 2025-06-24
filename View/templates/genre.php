<!-- View/templates/genre.php -->
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
            <div>
                <input type="text" class="search-input" placeholder="Search...">
                <button class="button-tile">Login</button>
                <span class="profile-icon">👤</span>
            </div>
        </div>

        <div class="section">
            <h1><?= htmlspecialchars($genre['name']) ?></h1>
            <div class="tile">
                <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="Icon">
                <div class="title"><?= htmlspecialchars($genre['name']) ?></div>
            </div>
            <p><?= htmlspecialchars($genre['description'] ?? 'No description available') ?></p>
            <h3>Books in this genre:</h3>
            <ul>
                <?php foreach ($genre['books'] as $book): ?>
                    <li><a href="book?id=<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a href="/MVC-Library/" class="button-tile">Back to Home</a>
        </div>
    </div>
</body>
</html>