<!-- View/templates/author.php -->
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
            <div>
                <input type="text" class="search-input" placeholder="Search...">
                <button class="button-tile">Login</button>
                <span class="profile-icon">👤</span>
            </div>
        </div>

        <div class="section">
            <h1><?= htmlspecialchars($author['name']) ?></h1>
            <div class="tile">
                <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="Author">
                <div class="title"><?= htmlspecialchars($author['name']) ?></div>
            </div>
            <p><?= htmlspecialchars($author['bio'] ?? 'No bio available') ?></p>
            <h3>Books by this author:</h3>
            <ul>
                <?php foreach ($author['books'] as $book): ?>
                    <li><a href="book?id=<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a href="/MVC-Library/" class="button-tile">Back to Home</a>
        </div>
    </div>
</body>
</html>