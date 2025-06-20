<!-- View/home.php -->
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="View/styles/main.css">
</head>
<body>
    <div>
        <input type="text" placeholder="Search...">
    </div>

    <div class="section">
        <h2>Books</h2>
        <?php foreach ($books as $book): ?>
            <div class="card">
                <img src="assets/books/<?= htmlspecialchars($book['image']) ?>" alt="cover">
                <h5><?= htmlspecialchars($book['title']) ?></h5>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Authors</h2>
        <?php foreach ($authors as $author): ?>
            <div class="item">
                <img src="assets/authors/<?= htmlspecialchars($author['image']) ?>" alt="author">
                <div><?= htmlspecialchars($author['name']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Genres</h2>
        <?php foreach ($genres as $genre): ?>
            <div class="item">
                <img src="assets/genres/<?= htmlspecialchars($genre['icon']) ?>" alt="genre">
                <div><?= htmlspecialchars($genre['name']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
