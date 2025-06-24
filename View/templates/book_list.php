<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Усі книги</title>
    <link rel="stylesheet" href="View/styles/main.css">
</head>
<body>
    <div class="section">
        <a class="button" href="index.php">← Назад</a>
        <h2>Усі книги</h2>
        <?php foreach ($books as $book): ?>
            <a href="index.php?page=book&id=<?= $book['id'] ?>" class="card">
                <img src="/MVC-Library/Public/Images/Covers/<?= htmlspecialchars($book['cover']) ?>" alt="cover">
                <h5><?= htmlspecialchars($book['title']) ?></h5>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>
