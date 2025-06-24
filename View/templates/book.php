<!-- View/templates/book.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($book['title']) ?></title>
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
            <h1><?= htmlspecialchars($book['title']) ?></h1>
            <div class="tile">
                <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover'] ?? '') ?>" alt="Book cover">
                <div class="title"><?= htmlspecialchars($book['title']) ?></div>
            </div>
            <p><?= htmlspecialchars($book['description'] ?? 'No description available') ?></p>
            <p><strong>Author:</strong> 
                <a href="author?id=<?= $book['author_id'] ?>">
                    <?= htmlspecialchars($book['author_name'] ?? 'Unknown author') ?>
                </a>
            </p>
            <p><strong>Genre:</strong> 
                <a href="genre?id=<?= $book['genre_id'] ?>">
                    <?= htmlspecialchars($book['genre_name'] ?? 'Unknown genre') ?>
                </a>
            </p>
            <a href="/MVC-Library/" class="button-tile">Back to Home</a>
        </div>
    </div>
</body>
</html>