<!-- View/templates/all_books.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Books</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/main.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/layout.css">
    <link rel="stylesheet" href="/MVC-Library/Public/styles/cards.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">Library</div>
            <div>

                <button class="button-tile">Login</button>

            </div>
        </div>

        <div class="section">
            <a href="/MVC-Library/" class="button-tile">← Back</a>
            <h2>All Books</h2>
            <div class="grid-row">
                <?php foreach ($books as $book): ?>
                    <a href="index.php?page=book&id=<?= $book['id'] ?>" class="tile">
                        <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover'] ?? '') ?>" alt="Cover">
                        <div class="title"><?= htmlspecialchars($book['title'] ?? 'No title') ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>