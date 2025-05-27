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
        <h2>Books</h2>
        
    </div>
        <div class="section">
        <h2>Books</h2>
    </div>
</body>
</html>