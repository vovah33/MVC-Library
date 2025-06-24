<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Усі жанри</title>
    <link rel="stylesheet" href="View/styles/main.css">
</head>
<body>
    <div class="section">
        <a class="button" href="index.php">← Назад</a>
        <h2>Усі жанри</h2>
        <?php foreach ($genres as $genre): ?>
            <a href="index.php?page=genre&id=<?= $genre['id'] ?>" class="item">
                <img src="/MVC-Library/Public/Images/Icons/<?= htmlspecialchars($genre['icone']) ?>" alt="genre">
                <div><?= htmlspecialchars($genre['name']) ?></div>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>
