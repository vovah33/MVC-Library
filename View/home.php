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
        <?php foreach ($books as $book):?>
            <div class="item">
                <div><?=$book?></div>
            </div>
        <?php endforeach;?>
    </div>
        <div class="section">
        <h2>Authors</h2>
        <?php foreach ($authors as $author):?>
            <div class="item">
                <div><?=$author?></div>
            </div>
        <?php endforeach;?>
    </div>
        <div class="section">
        <h2>Genres</h2>
        <?php foreach ($genres as $genre):?>
            <div class="item">
                <div><?=$genre?></div>
            </div>
        <?php endforeach;?>
    </div>
</body>
</html>