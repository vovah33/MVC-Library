<!-- View/home.php -->
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="View/styles/main.css">
    <style>
        .item img {
            max-width: 100px;
            height: auto;
            border: 1px solid #000;
        }

        .card, .item {
            margin: 10px;
            padding: 10px;
            display: inline-block;
            text-align: center;
        }

        .section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div>
        <input type="text" placeholder="Search...">
    </div>

    <div class="section">
        <h2>Books</h2>
        <?php foreach ($books as $book): ?>
            <div class="card">
                <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover'] ?? '') ?>" alt="cover">
                <h5><?= htmlspecialchars($book['title'] ?? 'No title') ?></h5>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Authors</h2>
        <?php foreach ($authors as $author): ?>
            <div class="item">
                <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="author">
                <div><?= htmlspecialchars($author['name'] ?? 'No name') ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Genres</h2>
        <?php foreach ($genres as $genre): ?>
            <div class="item">
                <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone'] ?? '') ?>" alt="genre">
                <div><?= htmlspecialchars($genre['name'] ?? 'No name') ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
