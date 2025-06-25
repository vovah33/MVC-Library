
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
            <div class="logo">Library</div>
            <input type="text" class="search-input" placeholder="Search...">

            <?php
            if (isset($_SESSION['user'])) {
                echo "<a href='?page=favorites' class='button-tile'>Favorites</a>";
                echo "<a href='?page=logout' class='button-tile'>Logout</a>";
            } else {
                echo "<a href='?page=login' class='button-tile'>Login</a>";
                echo "<a href='?page=register' class='button-tile'>Sign Up</a>";
            }
            ?>
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