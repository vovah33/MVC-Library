
<h2><?= htmlspecialchars($genre['name']) ?></h2>
<img src="assets/genres/<?= htmlspecialchars($genre['icon']) ?>" alt="Icon">
<p><?= htmlspecialchars($genre['description']) ?></p>

<h3>Books in this genre:</h3>
<ul>
    <?php foreach ($genre['books'] as $book): ?>
        <li><a href="book?id=<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a></li>
    <?php endforeach; ?>
</ul>
