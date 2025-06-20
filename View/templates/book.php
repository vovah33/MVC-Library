 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($book['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($book['title']) ?></h1>

    <img src="assets/books/<?= htmlspecialchars($book['cover']) ?>" alt="Book cover" width="200">

    <p><?= htmlspecialchars($book['description']) ?></p>

    <p><strong>Author:</strong> 
        <a href="author?id=<?= $book['author_id'] ?>">
            <?= htmlspecialchars($book['author_name']) ?>
        </a>
    </p>

    <p><strong>Genre:</strong> 
        <a href="genre?id=<?= $book['genre_id'] ?>">
            <?= htmlspecialchars($book['genre_name']) ?>
        </a>
    </p>
</body>
</html>
