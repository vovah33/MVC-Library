<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Усі автори</title>
    <link rel="stylesheet" href="View/styles/main.css">
</head>
<body>
    <div class="section">
        <a class="button" href="index.php">← Назад</a>
        <h2>Усі автори</h2>
        <?php foreach ($authors as $author): ?>
            <a href="index.php?page=author&id=<?= $author['id'] ?>" class="item">
                <img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo']) ?>" alt="author">
                <div><?= htmlspecialchars($author['name']) ?></div>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>
