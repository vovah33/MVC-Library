<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Home</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">

        <!-- Top Bar -->
        <div class="top-bar">
            <input type="text" placeholder="Search..." class="search-input">
            <div class="logo">📚</div>
            <div class="profile-icon">👤</div>
        </div>

        <!-- Books Section -->
        <div class="section">
            <div class="section-header">
                <h2>Books</h2>
                <a href="?page=books" class="button-tile">More</a>
            </div>
            <div class="grid-row">
                <?php foreach ($books as $book): ?>
                    <div class="tile">
                        <a href="?page=book&id=<?= $book['id'] ?>">
                            <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover']) ?>" alt="Book cover">
                            <div class="title"><?= htmlspecialchars($book['title']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Authors Section -->
        <div class="section">
            <div class="section-header">
                <h2>Authors</h2>
                <a href="?page=authors" class="button-tile">More</a>
            </div>
            <div class="grid-row">
                <?php foreach ($authors as $author): ?>
                    <div class="tile">
                        <a href="?page=author&id=<?= $author['id'] ?>">
                            <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo']) ?>" alt="Author photo">
                            <div class="title"><?= htmlspecialchars($author['name']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Genres Section -->
        <div class="section">
            <div class="section-header">
                <h2>Genres</h2>
                <a href="?page=genres" class="button-tile">More</a>
            </div>
            <div class="grid-row">
                <?php foreach ($genres as $genre): ?>
                    <div class="tile">
                        <a href="?page=genre&id=<?= $genre['id'] ?>">
                            <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone']) ?>" alt="Genre icon">
                            <div class="title"><?= htmlspecialchars($genre['name']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</body>
</html>
