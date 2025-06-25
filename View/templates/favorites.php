<!-- View/templates/favorites.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorites</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">Library</div>
            <input type="text" class="search-input" placeholder="Search...">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="?page=favorites" class="button-tile">Favorites</a>
                <a href="?page=logout" class="button-tile">Logout</a>
            <?php else: ?>
                <a href="?page=login" class="button-tile">Login</a>
                <a href="?page=register" class="button-tile">Sign Up</a>
            <?php endif; ?>
        </div>

        <div class="section">
            <h2>Favorites</h2>
            <div class="grid-row">
                <?php
                $favorites = [];
                if (isset($favorites) && !empty($favorites)) {
                    foreach ($favorites as $favorite) {
                        $itemType = $favorite['item_type'];
                        $itemId = $favorite['item_id'];
                        if ($itemType === 'book') {
                            // Логіка для книг (потрібно підключити BookController для даних)
                        } elseif ($itemType === 'author') {
                            // Логіка для авторів
                        } elseif ($itemType === 'genre') {
                            // Логіка для жанрів
                        }
                    }
                } else {
                    echo "<p>No favorites yet.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>